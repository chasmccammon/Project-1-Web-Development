const mariadb = require ('mariadb');
const mysql = require ('mysql');

var connection = mysql.createConnection({
    host: 'mariadb.ict.op.ac.nz',
    user: 'mccacj3',
    password: 'P@ssw0rd',
    database: 'mccacj3_Checkpoint_Tool'
});

connection.connect(function(err) {
    if (err) throw err;
});

    var teststudent = {
      studentID: 1,
      studentNumber: 1,
      firstName: 'Chas',
      lastName: 'McCammon',
      userName: 'Chas McCammon' 
    };

    //---------insert statement
//var update = connection.query('insert into Students set ?',teststudent,function(err,result){});
//console.log(update.sql);


    //-------- select statement
    
    connection.query("SELECT firstName, lastName FROM Students where firstName =\'Chas\' ", function (err, result, fields) {
      if (err) throw err;
      console.log(result);
    });

    
    //-------- delete  statement
    
    var sql = "DELETE FROM Students WHERE firstName = 'Chas'";
    connection.query(sql, function (err, result) {
      if (err) throw err;
      console.log("Number of records deleted: " + result.affectedRows);
    });
    
  


