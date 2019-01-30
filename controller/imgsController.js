'use strict';

//Imports
let user = require('../model/usersModel.js');
let img = require('../model/imgsModel');
let sql = require('../model/db.js');
let jwt = require('../model/model');

module.exports = {
	create_a_img:function(req, res) {
		//getting auth header
	    let headerAuth = req.headers['authorization'];
	    let users = jwt.getUserStatuts(headerAuth);
	    if(users[1]<0 || users[0]==''){
	      return res.status(400).json({'error':'wrong token'});
	    }
	    else{
	    	if(req.body.url==null){
		        return res.status(400).json({ 'error':'missing parameters' });
		    }
		    else{
		        //let new_img = new img(req.body.img);
		        let param = img.createImg(req.body);
		        sql.exec(param[0], param[1], function(err, img) {
		        	//console.log(img.affectedRows) ;
		          	if (err){res.json({'error' : err});}
		          	else if(img.affectedRows==1){
		          		console.log(img.insertId)
		          		res.status(201).json({'img_id' : img.insertId});
		          	}
		          	else{res.status(409).json({'error':'img already exist'});}
		        });
		    }
	    } 
	},
	list_all_imgs:function(req, res) {
	    let param = img.getImg(null);
	    sql.exec(param[0], null, function(err, img) {
	      	if (err){res.json(err);}
	      	//else if(img==null){res.status(404).json({'error':'img not found'});}
	      	else{res.json(img);}
	    });
	},
	read_a_img:function(req, res) {
	    let param = img.getImg(req.params.id);
	    sql.exec(param[0], param[1], function(err, img) {
	      	if (err){res.json(err);}
	    	else if(Object.getOwnPropertyNames(img).length==1){res.status(404).json({'error':'img not found'});}
	   		else{console.log(img);res.json(img);}
	    });
	    
	},
	update_a_img:function(req, res){
		//getting auth header
	    let headerAuth = req.headers['authorization'];
	    let users = jwt.getUserStatuts(headerAuth);
	    if(users[1]<0 || users[0]==''){
	      return res.status(400).json({'error':'wrong token'});
	    }
	    if(users[1]==3 || users[1]==2){
	    	let param = img.update(req.params.id, req.body);
	    	sql.exec(param[0], param[1], function(err, img) {
		      if (err){res.json(err);}
		      else if(Object.getOwnPropertyNames(img).length==1){res.status(404).json({'error':'img not found'});}
		      else{res.status(201).json({ 'message': 'img successfully updated' });}
		    });
	    }
	    else{
	    	return res.status(400).json({'error':'you don t have the authorization'});
	    }
	},
	delete_a_img:function(req, res) {
		//getting auth header
	    let headerAuth = req.headers['authorization'];
	    let users = jwt.getUserStatuts(headerAuth);
	    console.log(users[0]);
	    if(users[1]<0 || users[0]==''){
	      return res.status(400).json({'error':'wrong token'});
	    }
	    if(users[1]==2){
	    	let param = img.remove( req.params.id);
	    	sql.exec(param[0], param[1], function(err, img) {
		      if (err){res.json(err);}
		      else if(Object.getOwnPropertyNames(img).length==1){res.status(404).json({'error':'img not found'});}
		      else{res.status(201).json({ 'message': 'img successfully deleted' });}
		    });
	    }
	    else{
	    	return res.status(400).json({'error':'you don t have the authorization'});
	    }  
	}
}