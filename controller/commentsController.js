//Imports
let user = require('../model/usersModel.js');
let comment = require('../model/commentsModel');
let sql = require('../model/db.js');
let jwt = require('../model/model');

module.exports = {
	create_a_comment:function(req, res) {
		//getting auth header
	    let headerAuth = req.headers['authorization'];
	    let users = jwt.getUserStatuts(headerAuth);
	    if(users[1]<0 || users[0]==''){
	      return res.status(400).json({'error':'wrong token'});
	    }
	    if((users[1]==3 || users[1]==2 || users[1]==3) && users[2]==req.body.users_id){
	    	if(req.body.comment==null || req.body.users_id==null || req.body.events_id==null){
		        return res.status(400).json({ 'error':'missing parameters' });
		    }
		    else{
		        //let new_comment = new comment(req.body.comment);
		        let param = comment.createComment(req.body);
		        sql.exec(param[0], param[1], function(err, comment) {
		        	//console.log(comment.affectedRows) ;
		          	if (err){res.json({'error' : err});}
		          	else if(comment.affectedRows==1){
		          		console.log(comment.insertId)
		          		res.status(201).json({'comment_id' : comment.insertId});
		          	}
		          	//else{res.status(409).json({'error':'comment already exist'});}
		        });
		    }
	    } 
	    else{
	    	return res.status(400).json({'error':'you don t have the authorization'});
	    }
	},
	list_all_comments:function(req, res) {
	    let param = comment.getComment(null);
	    sql.exec(param[0], null, function(err, comment) {
	      	if (err){res.json(err);}
	      	//else if(comment==null){res.status(404).json({'error':'comment not found'});}
	      	else{res.json(comment);}
	    });
	},
	read_a_comment:function(req, res) {
	    let param = comment.getComment(req.params.id);
	    sql.exec(param[0], param[1], function(err, comment) {
	      	if (err){res.json(err);}
	    	else if(Object.getOwnPropertyNames(comment).length==1){res.status(404).json({'error':'comment not found'});}
	   		else{console.log(comment);res.json(comment);}
	    });
	    
	},
	update_a_comment:function(req, res){
		//getting auth header
	    let headerAuth = req.headers['authorization'];
	    let users = jwt.getUserStatuts(headerAuth);
	    if(users[1]<0 || users[0]==''){
	      return res.status(400).json({'error':'wrong token'});
	    }
	    if(users[1]==2){
	    	if(req.body==null){
	    		return res.status(400).json({ 'error':'missing parameters' });
	    	}
	    	else{
	    		let param = comment.update(req.params.id, req.body);
		    	sql.exec(param[0], param[1], function(err, comment) {
			      if (err){res.json(err);}
			      else if(Object.getOwnPropertyNames(comment).length==1){res.status(404).json({'error':'comment not found'});}
			      else{res.status(201).json({ 'message': 'comment successfully updated' });}
			    });
	    	}
	    }
	    else{
	    	return res.status(400).json({'error':'you don t have the authorization'});
	    }
	},
	delete_a_comment:function(req, res) {
		//getting auth header
	    let headerAuth = req.headers['authorization'];
	    let users = jwt.getUserStatuts(headerAuth);
	    console.log(users[0]);
	    if(users[1]<0 || users[0]==''){
	      return res.status(400).json({'error':'wrong token'});
	    }
	    if(users[1]==2){
	    	let param = comment.remove( req.params.id);
	    	sql.exec(param[0], param[1], function(err, comment) {
		      if (err){res.json(err);}
		      else if(Object.getOwnPropertyNames(comment).length==1){res.status(404).json({'error':'comment not found'});}
		      else{res.status(201).json({ 'message': 'comment successfully deleted' });}
		    });
	    }
	    else{
	    	return res.status(400).json({'error':'you don t have the authorization'});
	    }  
	}
}