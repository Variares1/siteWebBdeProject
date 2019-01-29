'use strict';

//centre object constructor
let Centre = function(task){
    this.center = task;
};
//post a new centre
Centre.createCenter = function(new_center){
//Search the centre in db
    return [/*sql.query(*/"INSERT INTO centers (center) SELECT * FROM (SELECT ?) AS tmp WHERE NOT EXISTS (SELECT center FROM centers WHERE center = ?) LIMIT 1", [new_center.center,new_center.center]];/*, function (err, res) {
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
    });*/               
};
Centre.update = function(id, new_center){
    return ["UPDATE centers SET center = ? WHERE id = ?", [new_center.center, id]];
}
Centre.getCenter = function(id){
    if(id){
        return ["Select * from centers where id = ? ", id];
    }
    else{return ["Select * from centers"];}
    
};
//delete a center
Centre.remove = function(id){
    return ["DELETE FROM centers WHERE id = ?", id]; 
};
module.exports= Centre;