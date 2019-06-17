const Sequelize = require('sequelize');
const db = require('./db');

const Student = db.define('Students', {
    StudentID: {
        type: Sequelize.INTEGER,
        primaryKey: true
    },
    studentnumber: {
        type: Sequelize.INTEGER
    },
    firstName: {
        type: Sequelize.STRING
    },
    lastName: {
        type: Sequelize.STRING
    },
    userName: {
        type: Sequelize.STRING
    }
},
{
    timestamps: false
});


module.exports = Student;