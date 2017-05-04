'use strict';

const express = require('express');
const handlebars = require('express-handlebars');

const path = require('path');
const routes = require('./routes');
const bodyParser = require('body-parser');

const app = express();

app.use(bodyParser.urlencoded({ extended: false }));
app.use(express.static(path.join(__dirname, '/assets')));
app.use('/', routes);

app.engine('.hbs', handlebars({
    extname: '.hbs',
    defaultLayout: 'main'
}));

app.set('view engine', '.hbs');

const listener = app.listen(process.env.PORT || 4040, function () {
    console.info(`Blindee-Web started on port ${listener.address().port}`);
});
