'user strict';

var mysql = require('mysql');

//local mysql db connection
var connection = mysql.createConnection({
    host     : 'localhost',
    user     : 'root',
    password : '',
    database : 'db_web_project'
});

connection.connect(function(err) {
    if (err) throw err;
});

connection.exec = function(sql, param, result){
	connection.query(sql, param, function (err, res) {
	    if(err) {
	        console.log("error: ", err);
	        result(err, null);
	    }
	    else{
	        //console.log('res1 : ',res);  
	        result(null, res);
	    }
    });
    //console.log('param : ', result._results);
    //return result;
};

module.exports = connection;