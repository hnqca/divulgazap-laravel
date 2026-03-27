const API = {

    async request(method, endpoint, data = null) {
        const options = {
            method,
            headers: {
                'Accept':           'application/json',
                'Content-Type':     'application/json',
                'X-Requested-With': 'XMLHttpRequest',
            }
        };

        if (data) {
            options.body = JSON.stringify(data);
            options.headers['Content-Type'] = 'application/json';
        }

        const response = await fetch(`/${endpoint}`, options);
        const json     = await response.json();

        return json;
    }
};


const UI = {

    setAlert({ element, message, color, closeInSeconds = false }) {

        this.closeAlert(element);
        
        element.removeClass().addClass(`alert alert-${color} alert-dismissible text-center`).text(message);

        if (closeInSeconds) {
            setTimeout(() => this.closeAlert(element), closeInSeconds * 1000);
        }
    },

    closeAlert(element) {
        element.removeClass().addClass('d-none').text('');
    }
};