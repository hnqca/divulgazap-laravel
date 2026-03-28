class GroupForm {

    constructor() {

        this.elements = {
            form: $('#form-create-group'),
            group: {
                image: $('.group-image'),
                name: $('.group-name'),
                category: $('.group-category-name'),
                description: $('.group-description')
            },
            input: {
                name: $('#name'),
                link: $('#link'),
                description: $('#description'),
                category: $('#id_category')
            },
            warning: $('#warning-create-group'),
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

        this.api_messages = {
            'group_name_required':                 "Informe um nome válido",
            'group_name_must_be_string':           "Informe um nome válido",
            'group_already_created':               "Este grupo já está sendo divulgado",
            'group_name_too_long':                 "Nome do grupo é muito grande",
            'invite_code_required':                "Informe o link de convite",
            'invite_code_must_be_string':          "Informe o link de convite",
            'category_required':                   "Selecione uma categoria",
            'category_id_must_be_integer':         "Selecione uma categoria",
            'category_invalid':                    "Selecione uma categoria",
            'invalid_invite_code':                 "Link de convite inválido",
            'group_created':                       "Grupo enviado com sucesso",
            'internal_error':                      "Erro interno. Por favor, atualize a página e tente novamente.",
            'cloudflare_turnstile_token_required': "Captcha não realizado",
            'cloudflare_turnstile_token_invalid':  "Captcha inválido ou expirado"
        };

        this.isLinkValid = false;

        this.setupEventHandlers();
    }

    sanitizeLinkGroup(link) {

        if (!link) {
            return '';
        };
                
        return link.replace(/https?:\/\/chat\.whatsapp\.com\//, '').trim();
    }

    toggleButton(enabled) {

        this.elements.button.submit.prop('disabled', !enabled);

        if (enabled) {
            this.elements.button.text.removeClass('d-none');
            this.elements.button.loading.addClass('d-none');
        } else {
            this.elements.button.text.addClass('d-none');
            this.elements.button.loading.removeClass('d-none');
        }
    }

    showAlert(message, status = 'warning') {

        UI.setAlert({
            element: this.elements.warning,
            message,
            color: status === 'success' ? 'success' : 'warning'
        });
    }

    closeAlert() {
        UI.closeAlert(this.elements.warning)
    }

    setGroupData({ name, image }) {

        this.elements.group.image.attr('src', image);
        this.elements.group.name.text(name);
        this.elements.input.name.val(name);
        this.elements.input.category.val(1).change();
    }

    async validateLinkGroup(invite_code) {

        this.closeAlert();

        const response = await API.request('GET',`api/groups/invite-code/${invite_code}/validate`);

        this.toggleButton(true);

        if (!response || response.status !== 'success') {
            this.showAlert(this.api_messages[response?.message] || this.api_messages['invalid_invite_code']);
            return;
        }

        this.setGroupData(response.group);

        this.isLinkValid = true;

        this.elements.steps.first.addClass('d-none');
        this.elements.steps.second.removeClass('d-none');

        this.elements.button.text.text('Enviar Grupo');

    }

    async createGroup(data) {

        const response = await API.request('POST', 'api/groups', data);

        this.toggleButton(true);

        const status = response?.status ?? 'error';

        this.showAlert(this.api_messages[response?.message], status);
        this.resetForm();
    }

    resetForm() {
        this.isLinkValid = false;
        this.elements.steps.first.removeClass('d-none');
        this.elements.steps.second.addClass('d-none');
        this.elements.form[0].reset();
        turnstile.reset();
    }

    getFormData() {
        return {
            name: this.elements.input.name.val(),
            description: this.elements.input.description.val() || '',
            category_id: this.elements.input.category.val(),
            invite_code: this.sanitizeLinkGroup(
                this.elements.input.link.val()
            ),
            cloudflare_turnstile_token: document.querySelector('[name="cf-turnstile-response"]').value || ''
        };
    }

    setupEventHandlers() {

        this.elements.form.on('submit', async (e) => {

            e.preventDefault();

            const formData = this.getFormData();

            this.toggleButton(false);

            if (!this.isLinkValid) {
                await this.validateLinkGroup(formData.invite_code);
                return;
            }

            await this.createGroup(formData);
        });


        this.elements.input.category.on('change', () => {
            const nameSelected =
                this.elements.input.category.find('option:selected').text();
                this.elements.group.category.text(nameSelected);
        });

        this.elements.input.name.on('input', () => {
            this.elements.group.name.text(
                this.elements.input.name.val()
            );
        });

        this.elements.input.description.on('input', () => {
            this.elements.group.description.text(
                this.elements.input.description.val()
            );

        });
    }
}

const GroupPage = new GroupForm();