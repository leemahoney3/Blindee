'use strict';

const homeController = {

    index(request, response) {

        response.render('home');

    },

    post(request, response) {

        // not actually needed, done through jquery instead.
        response.redirect('/');

    }

};

module.exports = homeController;
