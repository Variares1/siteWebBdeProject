'use strict';

//Imports
let user = require('../model/usersModel.js');
let participation = require('../model/users_eventsModel');
let sql = require('../model/db.js');
let jwt = require('../model/model');

module.exports = {
	create_a_participation:function(req, res) {
		//getting auth header
	    let headerAuth = req.headers['authorization'];
	    let users = jwt.getUserStatuts(headerAuth);
	    if(users[1]<0 || users[0]==''){
	      return res.status(400).json({'error':'wrong token'});
	    }
	    if(req.body.users_id==null || req.body.events_id==null){
	        return res.status(400).json({ 'error':'missing parameters' });
	    }
	    else if(users[2]==req.body.users_id){
	        //let new_center = new center(req.body.center);
	        let param = participation.createParticipation(req.body);
	        sql.exec(param[0], param[1], function(err, participation) {
	        	//console.log(centre.affectedRows) ;
	          	if (err){res.json({'error' : err});}
	          	else if(participation.affectedRows==1){
	          		res.status(201).json({'message' : 'success'});
	          	}
	          	else{res.status(409).json({'error':'you are already incript'});}
	        });
	    } 
	    else{
	    	return res.status(400).json({'error':'you don t have the authorization'});
	    }
	},
	list_all_participation:function(req, res) {
	    let param = participation.getParticipation(null);
	    sql.exec(param[0], null, function(err, participation) {
	      	if (err){res.json(err);}
	      	//else if(centre==null){res.status(404).json({'error':'center not found'});}
	      	else{res.json(participation);}
	    });
	},
	read_a_participation:function(req, res) {
	    let param = participation.getParticipation(req.body);
	    sql.exec(param[0], param[1], function(err, participation) {
	      	if (err){res.json(err);}
	    	else if(Object.getOwnPropertyNames(participation).length==1){res.status(404).json({'error':'participation not found'});}
	   		else{console.log(participation);res.json(participation);}
	    });
	    
	},
	delete_a_participation:function(req, res) {
		//getting auth header
	    let headerAuth = req.headers['authorization'];
	    let users = jwt.getUserStatuts(headerAuth);
	    if(users[1]<0 || users[0]==''){
	      return res.status(400).json({'error':'wrong token'});
	    }
	    if(req.body.users_id==null || req.body.events_id==null){
	        return res.status(400).json({ 'error':'missing parameters' });
	    }
	    else if(users[2]==req.body.users_id){
	    	let param = center.remove( req.body);
	    	sql.exec(param[0], param[1], function(err, participation) {
		      if (err){res.json(err);}
		      else if(Object.getOwnPropertyNames(participation).length==1){res.status(404).json({'error':'participation not found'});}
		      else{res.status(201).json({ 'message': 'participation successfully deleted' });}
		    });
	    }
	    else{
	    	return res.status(400).json({'error':'you don t have the authorization'});
	    }  
	}
}