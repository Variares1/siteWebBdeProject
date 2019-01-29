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
//post a new event
Event.createEvent = function(new_event, choix){
//Search the event in db
	if (choix==1) {
		return ["INSERT INTO  events Set ?", new_event]; 
	}
	else{
		return ["INSERT INTO events (name, description, date, price, p_r, p_t, places_id) SELECT * FROM (SELECT ?, ?, ?, ?, ?, ?, ?) AS tmp WHERE NOT EXISTS (SELECT name, date FROM events WHERE name = ? && date = ?)",
			[new_event.name, new_event.description, new_event.date, new_event.price, new_event.p_t, new_event.p_t, new_event.places_id, new_event.name, new_event.date]];

	}
    
                 
};
Event.update = function(id, new_event){
    return ["UPDATE events SET ? WHERE id = ?", [new_event, id]];
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
module.exports= Event;