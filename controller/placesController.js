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
		        //let new_center = new center(req.body.center);
		        place.createPlace(req.body, function(err, place) { 
		          if (err || (err==null && place==null)){
		            res.status(409).json({'error':'place already exist'});
		          }
		          else{res.status(201).json({'place_id' : place});}
		        },sql);
		    }
	    } 
	    else{
	    	return res.status(400).json({'error':'you don t have the authorization'})
	    }
	},
	list_all_places:function(req, res) {
	    place.getAllPlaces(function(err, place) {
	      if (err)
	        res.status(404).json({'error':'place not found'});
	      res.json(place);
	    },sql);
	},
	read_a_place:function(req, res) {
	    place.getPlaceById(req.params.id,  function(err, place) {
	      if (err)
	        res.status(404).json({'error':'place not found'});
	      res.json(place);
	    },sql);
	},
	delete_a_place:function(req, res) {
		//getting auth header
	    let headerAuth = req.headers['authorization'];
	    let users = jwt.getUserStatuts(headerAuth);
	    if(users[1]<0 || users[0]==''){
	      return res.status(400).json({'error':'wrong token'});
	    }
	    if(users[1]==3 || users[1]==2){
	    	place.remove( req.params.id, function(err, user) {
		      if (err)
		        res.json(err);
		      res.status(201).json({ 'message': 'place successfully deleted' });
		    }, sql);
	    }
	    else{
	    	return res.status(400).json({'error':'you don t have the authorization'})
	    }  
	}
}