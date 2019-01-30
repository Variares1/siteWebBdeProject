'use strict';

let user = require('../model/usersModel.js');
let statuts = require('../model/statutsModel');
let sql = require('../model/db.js');
let jwt = require('../model/model');

module.exports = {
	create_a_statut:function(req, res) {
		//getting auth header
	    let headerAuth = req.headers['authorization'];
	    let users = jwt.getUserStatuts(headerAuth);
	    if(users[1]<0 || users[0]==''){
	      return res.status(400).json({'error':'wrong token'});
	    }
	    if(users[1]==3){
	    	if(req.body.statut==null){
		        return res.status(400).json({ 'error':'missing parameters' });
		    }
		    else{
		        //let new_statut = new statut(req.body.statut);
		        let param = statuts.createStatut(req.body);
		        sql.exec(param[0], param[1], function(err, statut) {
		        	//console.log(centre.affectedRows) ;
		          	if (err){res.json({'error' : err});}
		          	else if(statut.affectedRows==1){
		          		console.log(statut.insertId)
		          		res.status(201).json({'statuts_id' : statut.insertId});
		          	}
		          	else{res.status(409).json({'error':'statut already exist'});}
		        });
		    }
	    } 
	    else{
	    	return res.status(400).json({'error':'you don t have the authorization'});
	    }
	},
	list_all_statuts:function(req, res) {
	    let param = statuts.getStatut(null);
	    sql.exec(param[0], null, function(err, statut) {
	      	if (err){res.json(err);}
	      	//else if(centre==null){res.status(404).json({'error':'statut not found'});}
	      	else{res.json(statut);}
	    });
	},
	read_a_statut:function(req, res) {
	    let param = statuts.getStatut(req.params.id);
	    sql.exec(param[0], param[1], function(err, statut) {
	    	console.log(Object.getOwnPropertyNames(statut).length);
	      	if (err){res.json(err);}
	    	else if(Object.getOwnPropertyNames(statut).length==1){res.status(404).json({'error':'statut not found'});}
	   		else{console.log(statut);res.json(statut);}
	    });   
	},
	update_a_statut:function(req, res){
		//getting auth header
	    let headerAuth = req.headers['authorization'];
	    let users = jwt.getUserStatuts(headerAuth);
	    if(users[1]<0 || users[0]==''){
	      return res.status(400).json({'error':'wrong token'});
	    }
	    if(users[1]==3){
	    	let param = statuts.update(req.params.id, req.body.statut);
	    	sql.exec(param[0], param[1], function(err, statut) {
		      if (err){res.json(err);}
		      else if(Object.getOwnPropertyNames(statut).length==1){res.status(404).json({'error':'statut not found'});}
		      else{res.status(201).json({ 'message': 'statut successfully updated' });}
		    });
	    }
	    else{
	    	return res.status(400).json({'error':'you don t have the authorization'});
	    }
	},
	delete_a_statut:function(req, res) {
		//getting auth header
	    let headerAuth = req.headers['authorization'];
	    let users = jwt.getUserStatuts(headerAuth);
	    console.log(users[0]);
	    if(users[1]<0 || users[0]==''){
	      return res.status(400).json({'error':'wrong token'});
	    }
	    if(users[1]==3){
	    	let param = statuts.remove( req.params.id);
	    	sql.exec(param[0], param[1], function(err, statut) {
		      if (err){res.json(err);}
		      else if(Object.getOwnPropertyNames(statut).length==1){res.status(404).json({'error':'statut not found'});}
		      else{res.status(201).json({ 'message': 'statut successfully deleted' });}
		    });
	    }
	    else{
	    	return res.status(400).json({'error':'you don t have the authorization'});
	    }  
	}
}