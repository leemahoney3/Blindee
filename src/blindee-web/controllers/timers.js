'use strict';

const timersController = {

    index(request, response) {

        response.render('timers');

    },

    post(request, response) {

        // not actually needed, done through jquery instead.
        response.redirect('/');

    }

};

module.exports = timersController;
