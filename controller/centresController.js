'use strict';

//Imports
let user = require('../model/usersModel.js');
let center = require('../model/centresModel');
let sql = require('../model/db.js');
let jwt = require('../model/model');

module.exports = {
	create_a_center:function(req, res) {
		//getting auth header
	    let headerAuth = req.headers['authorization'];
	    let users = jwt.getUserStatuts(headerAuth);
	    //console.log(users);
	    if(users[1]<0 || users[0]==''){
	      return res.status(400).json({'error':'wrong token'});
	    }
	    if(users[1]==3){
	    	if(req.body.center==null){
		        return res.status(400).json({ 'error':'missing parameters' });
		    }
		    else{
		        //let new_center = new center(req.body.center);
		        center.createCenter(req.body, function(err, centre) { 
		          if (err || (err==null && centre==null)){
		            res.status(409).json({'error':'center already exist'});
		          }
		          else{res.status(201).json({'center_id' : centre});}
		        },sql);
		    }
	    } 
	    else{
	    	return res.status(400).json({'error':'you don t have the authorization'})
	    }
	},
	list_all_centers:function(req, res) {
	    center.getAllCenters(function(err, user) {
	      if (err)
	        res.status(404).json({'error':'center not found'});
	      res.json(user);
	    },sql);
	},
	read_a_center:function(req, res) {
	    center.getCenterById(req.params.id,  function(err, user) {
	      if (err)
	        res.status(404).json({'error':'center not found'});
	      res.json(user);
	    },sql);
	},
	delete_a_center:function(req, res) {
		//getting auth header
	    let headerAuth = req.headers['authorization'];
	    let users = jwt.getUserStatuts(headerAuth);
	    if(users[0]<0 || users[1]==''){
	      return res.status(400).json({'error':'wrong token'});
	    }
	    if(users[1].statuts_id==3){
	    	center.remove( req.params.id, function(err, user) {
		      if (err)
		        res.json(err);
		      res.status(201).json({ 'message': 'center successfully deleted' });
		    }, sql);
	    }
	    else{
	    	return res.status(400).json({'error':'you don t have the authorization'})
	    }  
	}
}