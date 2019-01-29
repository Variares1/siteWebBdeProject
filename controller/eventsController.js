'use strict';

//Imports
let user = require('../model/usersModel.js');
let event = require('../model/eventsModel');
let sql = require('../model/db.js');
let jwt = require('../model/model');

module.exports = {
	create_a_event:function(req, res) {
		//getting auth header
	    let headerAuth = req.headers['authorization'];
	    let users = jwt.getUserStatuts(headerAuth);
	    let choix = 1;
	    if(req.body.name!=null && req.body.description!=null && req.body.date!=null && req.body.price!=null && req.body.p_t!=null && req.body.p_r==null && req.body.places_id!=null){
	    	choix = 0;
	    }
		if(req.body.name==null || req.body.description==null){
			return res.status(400).json({ 'error':'missing parameters' });
		}
	    if(users[1]<0 || users[0]==''){
	      return res.status(400).json({'error':'wrong token'});
	    }
	    else if(users[1]==3 || user[1]==2){
	        //let new_center = new center(req.body.center);
	        let param = event.createEvent(req.body, choix);
	        sql.exec(param[0], param[1], function(err, event) {
	        	//console.log(centre.affectedRows) ;
	          	if (err){res.json({'error' : err});}
	          	else if(event.affectedRows==1){
	          		console.log(event.insertId)
	          		res.status(201).json({'event_id' : event.insertId});
	          	}
	          	else{res.status(409).json({'error':'event already exist'});}
	        });   
	    }
	    else if((users[1]==1 || users[1]==3 || user[1]==2)&& choix==1){
	        //let new_center = new center(req.body.center);
	        let param = event.createEvent(req.body, 1);
	        sql.exec(param[0], param[1], function(err, event) {
	        	//console.log(centre.affectedRows) ;
	          	if (err){res.json({'error' : err});}
	          	else if(event.affectedRows==1){
	          		console.log(event.insertId)
	          		res.status(201).json({'event_id' : event.insertId});
	          	}
	          	else{res.status(409).json({'error':'event already exist'});}
	        });
	    }
	    else{
	    	return res.status(400).json({'error':'you don t have the authorization'});
	    }	    
	},
	list_all_events:function(req, res) {
	    let param = event.getEvent(null);
	    sql.exec(param[0], null, function(err, event) {
	      	if (err){res.json(err);}
	      	//else if(centre==null){res.status(404).json({'error':'center not found'});}
	      	else{res.json(event);}
	    });
	},
	read_a_event:function(req, res) {
	    let param = event.getEvent(req.params.id);
	    sql.exec(param[0], param[1], function(err, event) {
	      	if (err){res.json(err);}
	    	else if(Object.getOwnPropertyNames(event).length==1){res.status(404).json({'error':'event not found'});}
	   		else{console.log(event);res.json(event);}
	    });    
	},
	update_a_event:function(req, res){
		if(req.body.like!=null && req.body.date==null && req.body.price==null && req.body.p_t==null && req.body.p_r && req.body.places_id==null){
			let param = event.update(req.params.id, req.body.like);
	    	sql.exec(param[0], param[1], function(err, event) {
		      if (err){res.json(err);}
		      else if(Object.getOwnPropertyNames(event).length==1){res.status(404).json({'error':'event not found'});}
		      else{res.status(201).json({ 'message': 'event successfully updated' });}
		    });
		}
		else{
			//getting auth header
		    let headerAuth = req.headers['authorization'];
		    let users = jwt.getUserStatuts(headerAuth);
		    if(users[1]<0 || users[0]==''){
		      return res.status(400).json({'error':'wrong token'});
		    }
		    if(users[1]==3 || users[1]==2){
		    	let param = event.update(req.params.id, req.body);
		    	sql.exec(param[0], param[1], function(err, event) {
			      if (err){res.json(err);}
			      else if(Object.getOwnPropertyNames(event).length==1){res.status(404).json({'error':'event not found'});}
			      else{res.status(201).json({ 'message': 'event successfully updated' });}
			    });
		    }
		    else{
		    	return res.status(400).json({'error':'you don t have the authorization'});
		    }
		}
		
	},
	delete_a_event:function(req, res) {
		//getting auth header
	    let headerAuth = req.headers['authorization'];
	    let users = jwt.getUserStatuts(headerAuth);
	    console.log(users[0]);
	    if(users[1]<0 || users[0]==''){
	      return res.status(400).json({'error':'wrong token'});
	    }
	    if(users[1]==3 || users[1]==2){
	    	let param = event.remove( req.params.id);
	    	sql.exec(param[0], param[1], function(err, event) {
		      if (err){res.json(err);}
		      else if(Object.getOwnPropertyNames(event).length==1){res.status(404).json({'error':'event not found'});}
		      else{res.status(201).json({ 'message': 'event successfully deleted' });}
		    });
	    }
	    else{
	    	return res.status(400).json({'error':'you don t have the authorization'});
	    }  
	}
}