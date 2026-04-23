/**
 * Translation dictionary for the UI and API responses.
 */
const GROUP_FORM_I18N = {
    en: {
        // API Messages
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
        'cloudflare_turnstile_token_invalid': "Invalid or expired captcha",
        'lang_required': "Language not found",
        'lang_invalid': "Invalid language",

        // UI Texts
        'ui_submit_group': "Submit Group",
        'ui_verify_link': "Verify link",
        'ui_default_group_name': "Group Name",
        'ui_default_category': "Category",
        'ui_default_description': "Your group's awesome description will appear here...",
        'ui_error_fallback': "An error occurred"
    },
    pt: {
        // API Messages
        'group_name_required': "Por favor, insira um nome válido",
        'group_name_must_be_string': "Por favor, insira um nome válido",
        'group_already_created': "Este grupo já está listado",
        'group_name_too_long': "O nome do grupo é muito longo",
        'invite_code_required': "Por favor, insira o link de convite",
        'invite_code_must_be_string': "Por favor, insira o link de convite",
        'category_required': "Por favor, selecione uma categoria",
        'category_id_must_be_integer': "Por favor, selecione uma categoria",
        'category_invalid': "Por favor, selecione uma categoria válida",
        'invalid_invite_code': "Este link de convite é inválido ou expirou.",
        'group_created': "Grupo enviado com sucesso",
        'internal_error': "Erro interno. Por favor, atualize a página e tente novamente.",
        'cloudflare_turnstile_token_required': "Captcha obrigatório",
        'cloudflare_turnstile_token_invalid': "Captcha inválido ou expirado",
        'lang_required': "Idioma não encontrado",
        'lang_invalid':  "Idioma inválido",

        // UI Texts
        'ui_submit_group': "Enviar Grupo",
        'ui_verify_link': "Verificar link",
        'ui_default_group_name': "Nome do Grupo",
        'ui_default_category': "Categoria",
        'ui_default_description': "A descrição incrível do seu grupo aparecerá aqui...",
        'ui_error_fallback': "Ocorreu um erro"
    },
    es: {
        // API Messages
        'group_name_required': "Por favor, introduzca un nombre válido",
        'group_name_must_be_string': "Por favor, introduzca un nombre válido",
        'group_already_created': "Este grupo ya está en la lista",
        'group_name_too_long': "El nombre del grupo es demasiado largo",
        'invite_code_required': "Por favor, introduzca el enlace de invitación",
        'invite_code_must_be_string': "Por favor, introduzca el enlace de invitación",
        'category_required': "Por favor, seleccione una categoría",
        'category_id_must_be_integer': "Por favor, seleccione una categoría",
        'category_invalid': "Por favor, seleccione una categoría válida",
        'invalid_invite_code': "Este enlace de invitación es inválido o ha expirado.",
        'group_created': "Grupo enviado con éxito",
        'internal_error': "Error interno. Por favor, actualice la página e inténtelo de nuevo.",
        'cloudflare_turnstile_token_required': "Captcha requerido",
        'cloudflare_turnstile_token_invalid': "Captcha inválido o expirado",
        'lang_required': "Idioma no encontrado",
        'lang_invalid': "Idioma inválido",

        // UI Texts
        'ui_submit_group': "Enviar Grupo",
        'ui_verify_link': "Verificar enlace",
        'ui_default_group_name': "Nombre del Grupo",
        'ui_default_category': "Categoría",
        'ui_default_description': "La increíble descripción de tu grupo aparecerá aquí...",
        'ui_error_fallback': "Ocurrió un error"
    }
};

class GroupForm {
    constructor() {
        // Sets the current language based on the global object (defaults to 'en')
        this.locale = (window.locale && GROUP_FORM_I18N[window.locale]) ? window.locale : 'en';

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

        this.isLinkValid = false;
        this.setupEventHandlers();
    }

    /**
     * Returns the translated string based on the given key.
     * @param {string} key Translation dictionary key.
     * @returns {string} Translated string or the key itself as a fallback.
     */
    t(key) {
        return GROUP_FORM_I18N[this.locale][key] || GROUP_FORM_I18N['en'][key] || key;
    }

    /**
     * Removes the base domain from the WhatsApp invite link.
     * @param {string} link Full invite link.
     * @returns {string} Only the invite code.
     */
    sanitizeLinkGroup(link) {
        if (!link) return '';
        return link.replace(/^(https?:\/\/)?chat\.whatsapp\.com\/(invite\/)?/i, '').trim();
    }

    /**
     * Toggles the main button state between loading and active.
     * @param {boolean} enabled
     */
    toggleButton(enabled) {
        this.elements.button.submit.prop('disabled', !enabled);
        this.elements.button.text.toggleClass('d-none', !enabled);
        this.elements.button.loading.toggleClass('d-none', enabled);
    }

    /**
     * Displays an alert in the UI.
     * @param {string} message Message to display.
     * @param {string} [status='warning'] 'warning', 'success', 'error'.
     */
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

    /**
     * Fills the group preview with data from the API.
     * @param {Object} data Group data returned by the API.
     */
    setGroupData({ name, image }) {
        this.elements.group.image.attr('src', image);
        this.elements.group.name.text(name);
        this.elements.input.name.val(name);

        this.elements.input.category.val(1).trigger('change');

        this.elements.group.icon.addClass('d-none');
        this.elements.group.image.removeClass('d-none');
    }

    /**
     * Validates the group link via the API.
     * @param {string} invite_code Sanitized invite code.
     */
    async validateLinkGroup(invite_code) {
        this.closeAlert();
        this.toggleButton(false);

        try {
            const response = await API.request('GET', `api/groups/invite-code/${invite_code}/validate`);

            if (!response || response.status !== 'success') {
                const errorMsg = this.t('invalid_invite_code');
                this.showAlert(errorMsg);
                return;
            }

            this.setGroupData(response.group);
            this.isLinkValid = true;

            // Visual transition to the second step
            this.elements.steps.first.addClass('d-none');
            this.elements.steps.second.removeClass('d-none');
            this.elements.button.text.text(this.t('ui_submit_group'));

        } catch (error) {
            console.error("Link validation error:", error);
            this.showAlert(this.t('internal_error'));
        } finally {
            this.toggleButton(true);
        }
    }

    /**
     * Submits the full form to create the group.
     * @param {Object} data Consolidated form data.
     */
    async createGroup(data) {
        this.toggleButton(false);

        try {
            const response = await API.request('POST', 'api/groups', data);
            const status = response?.status ?? 'error';

            // Attempts to translate the message. If no mapping is found, uses the raw message or a fallback.
            const message = GROUP_FORM_I18N[this.locale][response?.message]
                ? this.t(response.message)
                : this.t('ui_error_fallback');

            this.showAlert(message, status);

            if (status === 'success') {
                this.resetForm();
            }
        } catch (error) {
            console.error("Group creation error:", error);
            this.showAlert(this.t('internal_error'), 'error');
        } finally {
            this.toggleButton(true);
        }
    }


    /**
     * Resets the form and preview to the initial state.
     */
    resetForm() {
        this.isLinkValid = false;

        // Reset steps
        this.elements.steps.first.removeClass('d-none');
        this.elements.steps.second.addClass('d-none');

        // Reset images
        this.elements.group.icon.removeClass('d-none');
        this.elements.group.image.addClass('d-none').attr('src', '');

        // Reset native inputs and select2
        this.elements.form[0].reset();
        this.elements.input.category.val(null).trigger('change');

        if (typeof turnstile !== 'undefined') {
            turnstile.reset();
        }

        // Reset UI text via i18n
        this.elements.button.text.text(this.t('ui_verify_link'));
        this.elements.group.name.text(this.t('ui_default_group_name'));
        this.elements.group.category.text(this.t('ui_default_category'));
        this.elements.group.description.text(this.t('ui_default_description'));
    }

    /**
     * Collects and formats data for API submission.
     * @returns {Object} Final payload.
     */
    getFormData() {
        const turnstileElement = document.querySelector('[name="cf-turnstile-response"]');

        return {
            name: this.elements.input.name.val(),
            description: this.elements.input.description.val() || '',
            category_id: this.elements.input.category.val(),
            invite_code: this.sanitizeLinkGroup(this.elements.input.link.val()),
            cloudflare_turnstile_token: turnstileElement?.value || '',
            lang: this.locale
        };
    }

    /**
     * Initializes dependencies and DOM event listeners.
     */
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
            this.elements.group.name.text(this.elements.input.name.val() || this.t('ui_default_group_name'));
        });

        this.elements.input.description.on('input', () => {
            this.elements.group.description.text(this.elements.input.description.val() || this.t('ui_default_description'));
        });
    }
}

// Initialization
const GroupPage = new GroupForm();