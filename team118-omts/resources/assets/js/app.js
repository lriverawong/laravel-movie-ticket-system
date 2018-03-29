
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('showtimes', require('./components/Showtimes.vue'));
Vue.component('chat-message', require('./components/ChatMessage.vue'));
Vue.component('chat-log', require('./components/ChatLog.vue'));
Vue.component('chat-composer', require('./components/ChatComposer.vue'));
// Vue.component('theatre-complex-form', require('./components/TheatreComplexForm.vue'));

const app = new Vue({
    el: '#showtimes'
});

const chat_app = new Vue({
    el: '#chat_room',
    data: {
        messages: [
            {
                message: 'Hey!',
                user: "John Doe"
            },
            {
                message: 'Hello!',
                user: "Jane Doe"
            }
        ]
    },
    methods: {
        addMessage(message) {
            // Add to existing messages
            this.messages.push(message);
            // Persist to the database etc
        }
    }
});

// =========================================================
class Errors {
    /**
     * Create a new Errors instance.
     */
    constructor() {
        this.errors = {};
    }


    /**
     * Determine if an errors exists for the given field.
     *
     * @param {string} field
     */
    has(field) {
        return this.errors.hasOwnProperty(field);
    }


    /**
     * Determine if we have any errors.
     */
    any() {
        return Object.keys(this.errors).length > 0;
    }


    /**
     * Retrieve the error message for a field.
     *
     * @param {string} field
     */
    get(field) {
        if (this.errors[field]) {
            return this.errors[field][0];
        }
    }


    /**
     * Record the new errors.
     *
     * @param {object} errors
     */
    record(errors) {
        this.errors = errors;
    }


    /**
     * Clear one or all error fields.
     *
     * @param {string|null} field
     */
    clear(field) {
        if (field) {
            delete this.errors[field];

            return;
        }

        this.errors = {};
    }
}

class Form {
    /**
     * Create a new Form instance.
     *
     * @param {object} data
     */
    constructor(data) {
        this.originalData = data;

        for (let field in data) {
            this[field] = data[field];
        }

        this.errors = new Errors();
    }

    /**
     * Fetch all relevant data for the form.
     */
    data() {
        let data = {};

        for (let property in this.originalData) {
            data[property] = this[property];
        }
        console.log(data);
        for(i in data) {
            console.log(typeof(data[i]))
        }
        return data;
    }


    /**
     * Reset the form fields.
     */
    reset() {
        for (let field in this.originalData) {
            this[field] = '';
        }

        this.errors.clear();
    }


    /**
     * Send a POST request to the given URL.
     * .
     * @param {string} url
     */
    post(url) {
        return this.submit('post', url);
    }


    /**
     * Send a PUT request to the given URL.
     * .
     * @param {string} url
     */
    put(url) {
        return this.submit('put', url);
    }


    /**
     * Send a PATCH request to the given URL.
     * .
     * @param {string} url
     */
    patch(url) {
        return this.submit('patch', url);
    }


    /**
     * Send a DELETE request to the given URL.
     * .
     * @param {string} url
     */
    delete(url) {
        return this.submit('delete', url);
    }


    /**
     * Submit the form.
     *
     * @param {string} requestType
     * @param {string} url
     */
    submit(requestType, url) {
        return new Promise((resolve, reject) => {
            axios[requestType](url, this.data())
                .then(response => {
                    this.onSuccess(response.data);

                    resolve(response.data);
                })
                .catch(error => {
                    this.onFail(error.response.data);

                    reject(error.response.data);
                });
        });
    }


    /**
     * Handle a successful form submission.
     *
     * @param {object} data
     */
    onSuccess(data) {
        alert(data.message); // temporary

        this.reset();
    }


    /**
     * Handle a failed form submission.
     *
     * @param {object} errors
     */
    onFail(errors) {
        this.errors.record(errors);
    }
}

const theatre_complex_app = new Vue({
    el: '#theatre-complex-form',
    data: {
        form: new Form({
            name: '',
            phone_num: '',
            street_num: '',
            street_name: '',
            city: '',
            province: '',
            country: '',
            postal_code: ''
        })
    },
    methods: {
        onSubmit() {
            this.form.post('/theatre_complexes')
                .then(response => alert('Wahoo!'));
        }
    }
});

const theatre_app = new Vue({
    el: '#theatre-form',
    data: {
        form: new Form({
            theatre_num: '',
            max_num_seats: 0,
            screen_size: 0,
            theatre_complex_id: ''
        })
    },
    methods: {
        onSubmit() {
            this.form.post('/theatres')
        }
    }
});


const director_app = new Vue({
    el: '#director-form',
    data: {
        form: new Form({
            first_name: '',
            last_name: ''
        })
    },
    methods: {
        onSubmit() {
            this.form.post('/directors')
        }
    }
});

const supplier_form_app = new Vue({
    el: '#supplier-form',
    data: {
        form: new Form({
            name: '',
            phone_num: '',
            contact_first_name: '',
            contact_last_name: '',
            apt_num: '',
            street_num: '',
            street_name: '',
            city: '',
            province: '',
            country: '',
            postal_code: ''
        })
    },
    methods: {
        onSubmit() {
            this.form.post('/suppliers')
        }
    }
});

const production_company_app = new Vue({
    el: '#production-company-form',
    data: {
        form: new Form({
            name: ''
        })
    },
    methods: {
        onSubmit() {
            this.form.post('/production_companies')
        }
    }
});

const movie_form_app = new Vue({
    el: '#movie-form',
    data: {
        form: new Form({
            title: '',
            running_time: 0,
            rating: 0,
            plot_synopsis: '',
            director_id: 0,
            prod_comp_id: 0,
            supplier_id: 0,
        })
    },
    methods: {
        onSubmit() {
            this.form.post('/movies')
        }
    }
});
