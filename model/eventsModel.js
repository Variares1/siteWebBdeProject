'use strict';

//centre object constructor
let Event = function(task){
    this.name = task.name;
    this.description = task.description;
    this.date = task.date;
    this.like = task.like;
    this.price = task.price;
    this.p_r = task.p_r;
    this.p_t = task.p_t;
    this.places_id = task.places_id;
};
//post a new centre
Event.createEvent = function(new_event){
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
Event.update = function(id, new_event){
    return ["UPDATE events SET name = ? WHERE id = ?", [new_event.name, id]];
}
Event.getEvent = function(id){
    if(id){
        return ["Select * from events where id = ? ", id];
    }
    else{return ["Select * from events"];}
    
};
//delete a center
Event.remove = function(id){
    return ["DELETE FROM events WHERE id = ?", id]; 
};
module.exports= Centre;