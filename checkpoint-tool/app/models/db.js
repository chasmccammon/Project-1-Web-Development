const Sequelize = require('sequelize');
const db = new Sequelize('mccacj3_Checkpoint_Tool2', 'mccacj3', 'P@ssw0rd', {
    host: 'mariadb.ict.op.ac.nz',
    dialect: 'mysql',
    operatorsAliases: false,
    /*pool: {
        max: 5,
        min: 0,
        acquire: 30000,
        idle: 10000
    }
    */
});

module.exports = db;

const Admin = require('./Admin');
const Student = require('./Student');
//const lab = require('./Lab');
//const student_subject = require('./models/Students_Subject');
//const subject = require('./models/Subject');
//const subject_admin = require('./models/Subject_Admin');
//const tool = require('./models/Tool');
const data = require('./Data');
const bcrypt = require('bcrypt');
const saltRounds = 10;
const myPlaintextPassword = 'test';


//saltedpassword = bcrypt.gensalt(saltRounds, function(err,salt){
    //bcrypt.hash(myPlaintextPassword, salt, function(err, hash) {
    //});

    


//})
/*
Admin.create({
    adminID: 2,
    firstName: 'test',
    lastName: 'test',
    userName: 'testadmin',
    password: 'P@ssw0rd',
    adminpassword: 'P@ssw0rd',
});


Student.create({
    StudentID: 1,
    firstName: 'test',
    lastName: 'test',
    studentnumber: 2,
    userName: 'P@ssw0rd',
});
*/






