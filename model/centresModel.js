'use strict';

//centre object constructor
let Centre = function(task){
    this.center = task;
};
//post a new centre
Centre.createCenter = function createCenter(new_center, result, sql){
//Search the centre in db
    sql.query("Select center from centers where center = ? ", new_center.center, function (err, res) {
        if(err){
            console.log("error: ", err);
            result(err, null);
        }   
        else{
            if(Object.getOwnPropertyNames(res).length!=2){//test if the centre exist in db
                //post the new centre
                sql.query("INSERT INTO centers set ?", new_center, function (err, res) {  
                    if(err) {
                        console.log("error: ", err);
                        result(err, null);
                    }
                    else{
                        console.log(res.insertId);
                        result(null, res.insertId);
                    }
                });
            }
            else{
            	console.log(res);
                result(null, null);
            }            
        }
    });               
};
//return all centers
Centre.getAllCenters = function(result, sql) {
    sql.query("Select * from centers", function (err, res) {
        if(err) {
            console.log("error: ", err);
            result(null, err);
        }
        else{
            console.log('centers : ', res);  
            result(null, res);
        }
    });   
};
Centre.getCenterById = function(id, result, sql) {
    sql.query("Select * from centers where id = ? ", id, function (err, res) {             
        if(err) {
            console.log("error: ", err);
           result(err, null);
        }
        else{
            result(null, res);
        }              
    });
};
//delete a center
Centre.remove = function(id, result, sql){
    sql.query("DELETE FROM centers WHERE id = ?", [id], function (err, res) {
        if(err) {
            console.log("error: ", err);
            result(null, err);
        }
        else{
            result(null, res);
        }
    }); 
};
module.exports= Centre;