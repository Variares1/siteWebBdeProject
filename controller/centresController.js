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
	    if(users[1]<0 || users[0]==''){
	      return res.status(400).json({'error':'wrong token'});
	    }
	    if(users[1]==3){
	    	if(req.body.center==null){
		        return res.status(400).json({ 'error':'missing parameters' });
		    }
		    else{
		        //let new_center = new center(req.body.center);
		        let param = center.createCenter(req.body);
		        sql.exec(param[0], param[1], function(err, centre) {
		        	//console.log(centre.affectedRows) ;
		          	if (err){res.json({'error' : err});}
		          	else if(centre.affectedRows==1){
		          		console.log(centre.insertId)
		          		res.status(201).json({'center_id' : centre.insertId});
		          	}
		          	else{res.status(409).json({'error':'center already exist'});}
		        });
		    }
	    } 
	    else{
	    	return res.status(400).json({'error':'you don t have the authorization'})
	    }
	},
	list_all_centers:function(req, res) {
	    let param = center.getCenter(null);
	    sql.exec(param[0], null, function(err, centre) {
	      	if (err){res.json(err);}
	      	//else if(centre==null){res.status(404).json({'error':'center not found'});}
	      	else{res.json(centre);}
	    });
	},
	read_a_center:function(req, res) {
	    let param = center.getCenter(req.params.id);
	    sql.exec(param[0], param[1], function(err, centre) {
	      	if (err){res.json(err);}
	    	else if(Object.getOwnPropertyNames(centre).length==1){res.status(404).json({'error':'center not found'});}
	   		else{console.log(centre);res.json(centre);}
	    });
	    
	},
	update_a_center:function(req, res){
		//getting auth header
	    let headerAuth = req.headers['authorization'];
	    let users = jwt.getUserStatuts(headerAuth);
	    if(users[0]<0 || users[1]==''){
	      return res.status(400).json({'error':'wrong token'});
	    }
	    if(users[0]==3){
	    	let param = center.update(req.params.id, req.body.center);
	    	sql.exec(param[0], param[1], function(err, centre) {
		      if (err){res.json(err);}
		      else if(Object.getOwnPropertyNames(centre).length==1){res.status(404).json({'error':'center not found'});}
		      else{res.status(201).json({ 'message': 'center successfully updated' });}
		    });
	    }
	    else{
	    	return res.status(400).json({'error':'you don t have the authorization'})
	    }
	},
	delete_a_center:function(req, res) {
		//getting auth header
	    let headerAuth = req.headers['authorization'];
	    let users = jwt.getUserStatuts(headerAuth);
	    console.log(users[0]);
	    if(users[1]<0 || users[0]==''){
	      return res.status(400).json({'error':'wrong token'});
	    }
	    if(users[1]==3){
	    	let param = center.remove( req.params.id);
	    	sql.exec(param[0], param[1], function(err, centre) {
		      if (err){res.json(err);}
		      else if(Object.getOwnPropertyNames(centre).length==1){res.status(404).json({'error':'center not found'});}
		      else{res.status(201).json({ 'message': 'center successfully deleted' });}
		    });
	    }
	    else{
	    	return res.status(400).json({'error':'you don t have the authorization'})
	    }  
	}
}