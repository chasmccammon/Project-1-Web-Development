var express = require('express');
var router = express.Router();
var path = require('path');
const mariadb = require ('mariadb');
const mysql = require ('mysql');
var http = require('http');
var url = require('url');
var fs = require('fs');
var formidable = require('formidable');
var formidablemiddleware = require('express-formidable');

var app = express()

var con = mysql.createConnection({
  host: 'mariadb.ict.op.ac.nz',
  user: 'mccacj3',
  password: 'P@ssw0rd',
  database: 'mccacj3_Checkpoint_Tool'
});

con.connect(function(err) {
  if (err) throw err;
});

var teststudent = {
  studentID: 1,
  studentNumber: 1,
  firstName: 'Chas',
  lastName: 'McCammon',
  userName: 'Chas McCammon' 
};

app.use(formidablemiddleware());

//---------insert statement
//var update = con.query('insert into Students set ?',teststudent,function(err,result){});
//update.sql;

/* GET home page. */
router.get('/', function(req, res, next) {
  res.sendfile(path.join(__dirname + '/Home.html'));
  //var update = con.query('insert into Students set ?',teststudent,function(err,result){});
//console.log(update.sql);
});

router.get('/D3Tool', function(req, res, next) {
  res.sendfile(path.join(__dirname + '/d3.html'));
});
app.post("/D3Tool", function(req,res){
  
  console.log(req.body);
  console.log(req.body);
  /*
  var form = new formidable.IncomingForm();
    form.parse(req, function (err, fields, files) {
     var testdata = {
       dataID: 1,
       toolID: 1,
       labID: 1,
       xValue: req.body.Xvalue,
       yValue: req.body.Yvalue,
       labCompleted: 1,
       responseTime: 1,
     }
       var update = con.query('insert into Data set ?',testdata,function(err,result){});
      update.sql;
       
     
      res.end();
      */
    });
  
  

module.exports = router;
