'use strict';

const express = require('express');
const router = express.Router();

const homeController = require('./controllers/home');
const timersController = require('./controllers/timers');

// Main Route
router.get('/', homeController.index);
router.post('/', homeController.post);

// Timers
router.get('/timers/', timersController.index);
router.post('/timers/', timersController.post);

module.exports = router;
