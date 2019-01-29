'use strict';

let Participation = function(task){
    this.events_id = task.events_id;
    this.users_id = task.users_id;
};
//post a new participation
Participation.createParticipation = function(new_participation){
//Search the participation in db
    return ["INSERT INTO users_events (events_id, users_id) SELECT * FROM (SELECT ?, ?) AS tmp WHERE NOT EXISTS (SELECT users_id, events_id FROM users_events WHERE users_id = ? AND events_id = ?)", 
    	[new_participation.events_id, new_participation.users_id, new_participation.users_id, new_participation.events_id]];               
};
Participation.getParticipation = function(new_participation){
	if(new_participation!=null){
		if(new_participation.users_id==null && new_participation.events_id==null){
			return["Select * from users_events"];
		}
	    else if(new_participation.users_id==null){
	        return ["Select * from users_events where users_id = ? ", new_participation.events_id];
	    }
	    else if(new_participation.events_id==null){
	    	return["Select * from users_events where events_id = ? ", new_participation.users_id];
	    }
	}
    else{
    	return ["Select * from users_events where events_id = ? AND users_id = ?", 
    		[new_participation.events_id, new_participation.users_id]];
    }
    
};
//delete a participation
Participation.remove = function(new_participation){
    return ["DELETE FROM users_events WHERE users_id = ? AND events_id = ?", 
    	[new_participation.users_id, new_participation.events_id]]; 
};
module.exports= Participation;