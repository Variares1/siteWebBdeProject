'use strict';

//Imports
let user = require('../model/usersModel.js');
let cart = require('../model/users_productsModel');
let sql = require('../model/db.js');
let jwt = require('../model/model');

module.exports = {
	create_a_cart:function(req, res) {
		//getting auth header
	    let headerAuth = req.headers['authorization'];
	    let users = jwt.getUserStatuts(headerAuth);
	    if(users[1]<0 || users[0]==''){
	      return res.status(400).json({'error':'wrong token'});
	    }
	    if(req.body.users_id==null || req.body.products_id==null || req.body.qty==null){
	        return res.status(400).json({ 'error':'missing parameters' });
	    }
	    else if(users[2]==req.body.users_id/* || users[0]==req.body.email*/){
	        //let new_center = new center(req.body.center);
	        let param = cart.createCart(req.body);
	        sql.exec(param[0], param[1], function(err, cart) {
	        	//console.log(centre.affectedRows) ;
	          	if (err){res.json({'error' : err});}
	          	else if(cart.affectedRows==1){
	          		res.status(201).json({'message' : 'success'});
	          	}
	          	else{res.status(409).json({'error':'products already in your cart'});}
	        });
	    } 
	    else{
	    	return res.status(400).json({'error':'you don t have the authorization'});
	    }
	},
	list_all_cart:function(req, res) {
		let headerAuth = req.headers['authorization'];
	    let users = jwt.getUserStatuts(headerAuth);
	    if(users[1]<0 || users[0]==''){
	      return res.status(400).json({'error':'wrong token'});
	    }
	    if(users[1]==2){
	    	let param = cart.getCart(null);
		    sql.exec(param[0], null, function(err, cart) {
		      	if (err){res.json(err);}
		      	//else if(centre==null){res.status(404).json({'error':'center not found'});}
		      	else{res.json(cart);}
		    });
	    }
	    else{
	    	return res.status(400).json({'error':'you don t have the authorization'});
	    }
	},
	read_a_cart:function(req, res) {
		console.log("bonjour");
		let headerAuth = req.headers['authorization'];
	    let users = jwt.getUserStatuts(headerAuth);
	    if(users[1]<0 || users[0]==''){
	      return res.status(400).json({'error':'wrong token'});
	    }
	    if(users[1]==2 || users[2]==req.body.users_id){
	    	let param = cart.getCart(req.body);
		    sql.exec(param[0], param[1], function(err, cart) {
		    	console.log(Object.getOwnPropertyNames(cart).length);
		      	if (err){res.json(err);}
		    	else if(Object.getOwnPropertyNames(cart).length==1){res.status(404).json({'error':'cart not found'});}
		   		else{console.log(cart);res.json(cart);}
		    });
	    }
	    else{
	    	return res.status(400).json({'error':'you don t have the authorization'});
	    }	    
	},
	update_a_cart:function(req, res){
		let headerAuth = req.headers['authorization'];
	    let users = jwt.getUserStatuts(headerAuth);
	    if(users[1]<0 || users[0]==''){
	      return res.status(400).json({'error':'wrong token'});
	    }
	    if(req.body.users_id==null && req.body.products_id==null &&(req.body.qty==null || req.body.statut==null)){
	    	return res.status(400).json({ 'error':'missing parameters' });
	    }
	    if(users[1]==2){
	    	let param = cart.update( req.body);
	    	sql.exec(param[0], param[1], function(err, cart) {
	    		console.log(cart);
		      if (err){res.json(err);}
		      else if(Object.getOwnPropertyNames(cart).length==1){res.status(404).json({'error':'cart not found'});}
		      else{res.status(201).json({ 'message': 'cart successfully updated' });}
		    });
	    }
	    else if(users[2]==req.body.users_id && req.body.qty!=null && req.body.statut==null){
	    	let param = cart.remove( req.body);
	    	sql.exec(param[0], param[1], function(err, cart) {
		      if (err){res.json(err);}
		      else if(Object.getOwnPropertyNames(cart).length==1){res.status(404).json({'error':'cart not found'});}
		      else{res.status(201).json({ 'message': 'cart successfully updated' });}
		    });
	    }
	    else{
	    	return res.status(400).json({'error':'you don t have the authorization'});
	    }
	},
	delete_a_cart:function(req, res) {
		//getting auth header
	    let headerAuth = req.headers['authorization'];
	    let users = jwt.getUserStatuts(headerAuth);
	    if(users[1]<0 || users[0]==''){
	      return res.status(400).json({'error':'wrong token'});
	    }
	    if(req.body.users_id==null || req.body.products_id==null){
	        return res.status(400).json({ 'error':'missing parameters' });
	    }
	    else if(users[2]==req.body.users_id){
	    	let param = cart.remove( req.body);
	    	sql.exec(param[0], param[1], function(err, cart) {
		      if (err){res.json(err);}
		      else if(Object.getOwnPropertyNames(cart).length==1){res.status(404).json({'error':'cart not found'});}
		      else{res.status(201).json({ 'message': 'cart successfully deleted' });}
		    });
	    }
	    else{
	    	return res.status(400).json({'error':'you don t have the authorization'});
	    }  
	}
}