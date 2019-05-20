var express = require('express');
var app = express();
var router = express.Router();
var path = require('path');
const mariadb = require ('mariadb');
const mysql = require ('mysql');
var http = require('http');
var url = require('url');
var fs = require('fs');
var formidable = require('formidable');
var formidablemiddleware = require('express-formidable');
var bodyParser = require('body-parser');
var urlencodedParser = bodyParser.urlencoded({ extended:false})
app.use(bodyParser.urlencoded({
  extended: true
}));

app.use(bodyParser.json());

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

router.get('/test', function(req, res, next) {
  res.sendfile(path.join(__dirname + '/formtest.html'));

});

router.post("/posttest",urlencodedParser, function(req,res){
//res.send(req.body);
//console.log(req.body.dataid);

var testdata = {
  dataID: 3,
  toolID: 1,
  //studentID: 1,
  labID: 1,
  xValue: req.body.xvalue,
  yValue: req.body.yvalue,
  labcompleted: 1,
}

res.send(testdata);
  var update = con.query('insert into Data2 set ?',testdata,function(err,result){});
 update.sql;
  
});

router.post("/D3Toolsubmit",urlencodedParser, function(req,res){
  
  var testdata = {
    dataID: 1,
    toolID: 1,
    studentID: 1,
    labID: 1,
    xValue: req.body.setX,
    yValue: req.body.setY,
    labcompleted: 1,
  }
  
  res.send(testdata);
    var update = con.query('insert into Data set ?',testdata,function(err,result){
      if (err) throw err;
      console.log("1 record inserted");
    });
   update.sql;
       
     
     
      
    });
  
  

module.exports = router;
