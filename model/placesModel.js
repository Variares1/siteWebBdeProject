'use strict';

//place object constructor
let Place = function(task){
    this.place = task;
};
//post a new place
Place.createPlace = function(new_place){
//Search the place in db
    return [/*sql.query(*/"INSERT INTO places (place) SELECT * FROM (SELECT ?) AS tmp WHERE NOT EXISTS (SELECT place FROM places WHERE place = ?) LIMIT 1", [new_place.place,new_place.place]];/*, function (err, res) {

    /*sql.query("Select place from places where place = ? ", new_place.place, function (err, res) {
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
    });*/               
};
Place.update = function(id, new_place){
    return ["UPDATE places SET place = ? WHERE id = ?", [new_place.place, id]];
}
Place.getPlace = function(id){
    if(id){
        return ["Select * from places where id = ? ", id];
    }
    else{return ["Select * from places"];}
    
};
//delete a place
Place.remove = function(id){
    return ["DELETE FROM places WHERE id = ?", id]; 
};
module.exports= Place;