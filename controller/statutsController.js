'use strict';

//let user = require('../model/usersModel.js');
let statuts = require('../model/statutsModel');
let sql = require('../model/db.js');
//let jwt = require('../model/model');

module.exports = {
	list_all_statuts:function(req, res) {
	    let param = statuts.getStatut(null);
	    sql.exec(param[0], null, function(err, statut) {
	      	if (err){res.json(err);}
	      	//else if(centre==null){res.status(404).json({'error':'center not found'});}
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
	    
	}
}