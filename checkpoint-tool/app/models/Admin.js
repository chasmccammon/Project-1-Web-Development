const Sequelize = require('sequelize');
const db = require('./db');


const Admin = db.define('Admin', {
    adminID: {
        type: Sequelize.INTEGER,
        primaryKey: true
    },
    firstName: {
        type: Sequelize.STRING
    },
    lastName: {
        type: Sequelize.STRING
    },
    userName: {
        type: Sequelize.STRING
    
    },
    password: {
        type: Sequelize.STRING
    }
    ,
    adminpassword: {
        type: Sequelize.STRING
    }
    },
 {
    timestamps: false
});


module.exports = Admin;