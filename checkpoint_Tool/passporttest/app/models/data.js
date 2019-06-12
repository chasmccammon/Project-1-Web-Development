const Sequelize = require('sequelize');
const db = require('./db');

// Assessment table
const data = db.define('Data', {
    dataID: {
        type: Sequelize.INTEGER
    },
    toolID: {
        type: Sequelize.INTEGER
    },
    studentID: {
        type: Sequelize.STRING
    },
    labID: {
        type: Sequelize.INTEGER
    },
    xValue: {
        type: Sequelize.INTEGER
    },
    yValue: {
        type: Sequelize.INTEGER
    },
    labCompleted: {
        type: Sequelize.INTEGER
    },


});

module.exports = data;