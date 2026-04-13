class GroupForm {
    constructor() {
        this.elements = {
            form: $('#form-create-group'),
            group: {
                image: $('#demo-group-image'),
                name: $('#demo-group-name'),
                category: $('#demo-group-category'),
                description: $('#demo-group-description'),
                icon: $('#icon-group-placeholder-image')
            },
            input: {
                name: $('#name'),
                link: $('#link'),
                description: $('#description'),
                category: $('#category_id')
            },
            warning: $('#alert-create-group'),
            button: {
                submit: $('#btn-submit'),
                text: $('#text'),
                loading: $('#loading')
            },
            steps: {
                first: $('#first-step'),
                second: $('#second-step')
            }
        };

        this.apiMessages = {
            'group_name_required': "Please enter a valid name",
            'group_name_must_be_string': "Please enter a valid name",
            'group_already_created': "This group is already listed",
            'group_name_too_long': "Group name is too long",
            'invite_code_required': "Please enter the invite link",
            'invite_code_must_be_string': "Please enter the invite link",
            'category_required': "Please select a category",
            'category_id_must_be_integer': "Please select a category",
            'category_invalid': "Please select a valid category",
            'invalid_invite_code': "This invite link is invalid or has expired.",
            'group_created': "Group submitted successfully",
            'internal_error': "Internal error. Please refresh the page and try again.",
            'cloudflare_turnstile_token_required': "Captcha required",
            'cloudflare_turnstile_token_invalid': "Invalid or expired captcha"
        };

        this.isLinkValid = false;
        this.setupEventHandlers();
    }

    sanitizeLinkGroup(link) {
        if (!link) return '';
        return link.replace(/^(https?:\/\/)?chat\.whatsapp\.com\/(invite\/)?/i, '').trim();
    }

    toggleButton(enabled) {
        this.elements.button.submit.prop('disabled', !enabled);
        
        this.elements.button.text.toggleClass('d-none', !enabled);
        this.elements.button.loading.toggleClass('d-none', enabled);
    }

    showAlert(message, status = 'warning') {
        UI.setAlert({
            element: this.elements.warning,
            message,
            color: status === 'success' ? 'success' : 'warning'
        });
    }

    closeAlert() {
        UI.closeAlert(this.elements.warning);
    }

    setGroupData({ name, image }) {
        this.elements.group.image.attr('src', image);
        this.elements.group.name.text(name);
        this.elements.input.name.val(name);
        this.elements.input.category.val(1).trigger('change');

        this.elements.group.icon.addClass('d-none');
        this.elements.group.image.removeClass('d-none');
    }

    async validateLinkGroup(invite_code) {
        this.closeAlert();
        this.toggleButton(false);

        try {
            const response = await API.request('GET', `api/groups/invite-code/${invite_code}/validate`);

            if (!response || response.status !== 'success') {
                const errorMsg = this.apiMessages[response?.message] || this.apiMessages['invalid_invite_code'];
                this.showAlert(errorMsg);
                return;
            }

            this.setGroupData(response.group);
            this.isLinkValid = true;

            this.elements.steps.first.addClass('d-none');
            this.elements.steps.second.removeClass('d-none');
            this.elements.button.text.text('Submit Group');

        } catch (error) {
            console.error("Link validation error:", error);
            this.showAlert(this.apiMessages['internal_error']);
        } finally {
            this.toggleButton(true);
        }
    }

    async createGroup(data) {
        this.toggleButton(false);

        try {
            const response = await API.request('POST', 'api/groups', data);
            const status = response?.status ?? 'error';
            
            const message = this.apiMessages[response?.message] || response?.message || 'An error occurred';

            this.showAlert(message, status);
            
            if (status === 'success') {
                this.resetForm();
            }
        } catch (error) {
            console.error("Group creation error:", error);
            this.showAlert(this.apiMessages['internal_error'], 'error');
        } finally {
            this.toggleButton(true);
        }
    }

    resetForm() {
        this.isLinkValid = false;
        
        this.elements.steps.first.removeClass('d-none');
        this.elements.steps.second.addClass('d-none');

        this.elements.group.icon.removeClass('d-none');
        this.elements.group.image.addClass('d-none').attr('src', '');
        
        this.elements.form[0].reset();
        this.elements.input.category.val(null).trigger('change');
        
        if (typeof turnstile !== 'undefined') {
            turnstile.reset();
        }

        this.elements.button.text.text('Verify link');

        this.elements.group.name.text('Group Name');
        this.elements.group.category.text('Category');
        this.elements.group.description.text("Your group's awesome description will appear here...");
    }

    getFormData() {
        const turnstileElement = document.querySelector('[name="cf-turnstile-response"]');
        
        return {
            name: this.elements.input.name.val(),
            description: this.elements.input.description.val() || '',
            category_id: this.elements.input.category.val(),
            invite_code: this.sanitizeLinkGroup(this.elements.input.link.val()),
            cloudflare_turnstile_token: turnstileElement?.value || ''
        };
    }

    setupEventHandlers() {
        this.elements.input.category.select2({
            allowClear: false,
            width: '100%',
            dropdownParent: $('.wrapper-select2')
        });

        this.elements.form.on('submit', async (e) => {
            e.preventDefault();

            const formData = this.getFormData();

            if (!this.isLinkValid) {
                await this.validateLinkGroup(formData.invite_code);
                return;
            }

            await this.createGroup(formData);
        });

        this.elements.input.category.on('change', () => {
            const nameSelected = this.elements.input.category.find('option:selected').text();
            if (nameSelected) {
                this.elements.group.category.text(nameSelected);
            }
        });

        this.elements.input.name.on('input', () => {
            this.elements.group.name.text(this.elements.input.name.val());
        });

        this.elements.input.description.on('input', () => {
            this.elements.group.description.text(this.elements.input.description.val());
        });
    }
}

const GroupPage = new GroupForm();