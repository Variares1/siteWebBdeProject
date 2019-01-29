'use strict';

//Imports
let user = require('../model/usersModel.js');
let place = require('../model/placesModel');
let sql = require('../model/db.js');
let jwt = require('../model/model');

module.exports = {
	create_a_place:function(req, res) {
		//getting auth header
	    let headerAuth = req.headers['authorization'];
	    let users = jwt.getUserStatuts(headerAuth);
	    //console.log(users);
	    if(users[1]<0 || users[0]==''){
	      return res.status(400).json({'error':'wrong token'});
	    }
	    if(users[1]==3 || users[1]==2){
	    	if(req.body.place==null){
		        return res.status(400).json({ 'error':'missing parameters' });
		    }
		    else{
		        let param = place.createPlace(req.body);
		        sql.exec(param[0], param[1], function(err, place) {
		        	//console.log(centre.affectedRows) ;
		          	if (err){res.json({'error' : err});}
		          	else if(place.affectedRows==1){
		          		console.log(place.insertId)
		          		res.status(201).json({'place_id' : place.insertId});
		          	}
		          	else{res.status(409).json({'error':'place already exist'});}
		        });
		    }
	    } 
	    else{
	    	return res.status(400).json({'error':'you don t have the authorization'})
	    }
	},
	list_all_places:function(req, res) {
	    let param = place.getPlace(null);
	    sql.exec(param[0], null, function(err, place) {
	      	if (err){res.json(err);}
	      	//else if(centre==null){res.status(404).json({'error':'center not found'});}
	      	else{res.json(place);}
	    });
	},
	read_a_place:function(req, res) {
	    let param = place.getPlace(req.params.id);
	    sql.exec(param[0], param[1], function(err, place) {
	      	if (err){res.json(err);}
	    	else if(place==null){res.status(404).json({'error':'place not found'});}
	   		else{console.log(place);res.json(place);}
	    });
	    
	},
	update_a_place:function(req, res){
		//getting auth header
	    let headerAuth = req.headers['authorization'];
	    let users = jwt.getUserStatuts(headerAuth);
	    if(users[0]<0 || users[1]==''){
	      return res.status(400).json({'error':'wrong token'});
	    }
	    if(users[0]==3){
	    	let param = place.update(req.params.id, req.body.place);
	    	sql.exec(param[0], param[1], function(err, place) {
		      if (err){res.json(err);}
		      else if(place==null){res.status(404).json({'error':'place not found'});}
		      else{res.status(201).json({ 'message': 'place successfully updated' });}
		    });
	    }
	    else{
	    	return res.status(400).json({'error':'you don t have the authorization'})
	    }
	},
	delete_a_place:function(req, res) {
		//getting auth header
	    let headerAuth = req.headers['authorization'];
	    let users = jwt.getUserStatuts(headerAuth);
	    if(users[1]<0 || users[0]==''){
	      return res.status(400).json({'error':'wrong token'});
	    }
	    if(users[1]==3 || users[1]==2){
	    	let param = place.remove( req.params.id);
	    	sql.exec(param[0], param[1], function(err, place) {
		      if (err){res.json(err);}
		      else if(place==null){res.status(404).json({'error':'place not found'});}
		      else{res.status(201).json({ 'message': 'place successfully deleted' });}
		    });
	    }
	    else{
	    	return res.status(400).json({'error':'you don t have the authorization'})
	    }  
	}
}