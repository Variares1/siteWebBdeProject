'use strict';

//Imports
let user = require('../model/usersModel.js');
let product = require('../model/productsModel');
let sql = require('../model/db.js');
let jwt = require('../model/model');

module.exports = {
	create_a_product:function(req, res) {
		//getting auth header
	    let headerAuth = req.headers['authorization'];
	    let users = jwt.getUserStatuts(headerAuth);
	    if(users[1]<0 || users[0]==''){
	      return res.status(400).json({'error':'wrong token'});
	    }
	    if(users[1]==3 || users[1]==2){
	    	if(req.body.name==null || req.body.description==null || req.body.price==null || req.body.stock==null){
		        return res.status(400).json({ 'error':'missing parameters' });
		    }
		    else{
		        //let new_center = new center(req.body.center);
		        let param = product.createProduct(req.body);
		        sql.exec(param[0], param[1], function(err, product) {
		        	console.log(product.affectedRows) ;
		          	if (err){res.json({'error' : err});}
		          	else if(product.affectedRows==1){
		          		console.log(product.insertId)
		          		res.status(201).json({'product_id' : product.insertId});
		          	}
		          	else{res.status(409).json({'error':'product already exist'});}
		        });
		    }
	    } 
	    else{
	    	return res.status(400).json({'error':'you don t have the authorization'});
	    }
	},
	list_all_products:function(req, res) {
	    let param = product.getProduct(null);
	    sql.exec(param[0], null, function(err, product) {
	      	if (err){res.json(err);}
	      	//else if(centre==null){res.status(404).json({'error':'center not found'});}
	      	else{res.json(product);}
	    });
	},
	read_a_product:function(req, res) {
	    let param = product.getProduct(req.params.id);
	    sql.exec(param[0], param[1], function(err, product) {
	      	if (err){res.json(err);}
	    	else if(Object.getOwnPropertyNames(product).length==1){res.status(404).json({'error':'product not found'});}
	   		else{console.log(product);res.json(product);}
	    });
	    
	},
	update_a_product:function(req, res){
		if(req.body.nb_com!=null && req.body.name==null && req.body.description==null && req.body.price==null && req.body.stock==null){
			let param = product.update(req.params.id, req.body, 'nb_com');
	    	sql.exec(param[0], param[1], function(err, product) {
		      if (err){res.json(err);}
		      else if(Object.getOwnPropertyNames(product).length==1){res.status(404).json({'error':'product not found'});}
		      else{res.status(201).json({ 'message': 'product successfully updated' });}
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
		    	if(req.body.nb_com==null && req.body.name==null && req.body.description==null && req.body.price!=null && req.body.stock==null){
					let param = product.update(req.params.id, req.body, 'price');
			    	sql.exec(param[0], param[1], function(err, product) {
				      if (err){res.json(err);}
				      else if(Object.getOwnPropertyNames(product).length==1){res.status(404).json({'error':'product not found'});}
				      else{res.status(201).json({ 'message': 'product successfully updated' });}
				    });
				}
				else if(req.body.nb_com==null && req.body.name==null && req.body.description==null && req.body.price==null && req.body.stock!=null){
					let param = product.update(req.params.id, req.body, 'stock');
			    	sql.exec(param[0], param[1], function(err, product) {
				      if (err){res.json(err);}
				      else if(Object.getOwnPropertyNames(product).length==1){res.status(404).json({'error':'product not found'});}
				      else{res.status(201).json({ 'message': 'product successfully updated' });}
				    });
				}
		    }
		    else{
		    	return res.status(400).json({'error':'you don t have the authorization'});
		    }
		}
	},
	delete_a_product:function(req, res) {
		//getting auth header
	    let headerAuth = req.headers['authorization'];
	    let users = jwt.getUserStatuts(headerAuth);
	    console.log(users[0]);
	    if(users[1]<0 || users[0]==''){
	      return res.status(400).json({'error':'wrong token'});
	    }
	    if(users[1]==3 || users[1]==2){
	    	let param = product.remove( req.params.id);
	    	sql.exec(param[0], param[1], function(err, product) {
		      if (err){res.json(err);}
		      else if(Object.getOwnPropertyNames(product).length==1){res.status(404).json({'error':'product not found'});}
		      else{res.status(201).json({ 'message': 'product successfully deleted' });}
		    });
	    }
	    else{
	    	return res.status(400).json({'error':'you don t have the authorization'});
	    }  
	},
	common_product:function(req, res){
		let param = product.orderBy();
		sql.exec(param[0], null, function(err, product){
			if (err){res.json(err);}
		    else{res.status(201).json(product);}
		});
	}
}