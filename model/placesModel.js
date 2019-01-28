'use strict';

//place object constructor
let Place = function(task){
    this.place = task;
};
//post a new place
Place.createPlace = function(new_place, result, sql){
//Search the place in db
    sql.query("Select place from places where place = ? ", new_place.place, function (err, res) {
        if(err){
            console.log("error: ", err);
            result(err, null);
        }   
        else{
            if(Object.getOwnPropertyNames(res).length!=2){//test if the user exist in db
                //post the new user
                sql.query("INSERT INTO places set ?", new_place, function (err, res) {  
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
//return all places
Place.getAllPlaces = function(result, sql) {
    sql.query("Select * from places", function (err, res) {
        if(err) {
            console.log("error: ", err);
            result(null, err);
        }
        else{
            console.log('places : ', res);  
            result(null, res);
        }
    });   
};
Place.getPlaceById = function(id, result, sql) {
    sql.query("Select * from places where id = ? ", id, function (err, res) {             
        if(err) {
            console.log("error: ", err);
           result(err, null);
        }
        else{
            result(null, res);
        }              
    });
};
//delete a place
Place.remove = function(id, result, sql){
    sql.query("DELETE FROM places WHERE id = ?", [id], function (err, res) {
        if(err) {
            console.log("error: ", err);
            result(null, err);
        }
        else{
            result(null, res);
        }
    }); 
};
module.exports= Place;