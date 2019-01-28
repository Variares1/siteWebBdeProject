'use strict';
//import
let jwt = require('jsonwebtoken');

//constants
const jwt_sign_secret ='fiqjrovgeqb87fzebhdujfj4r4b83ed4fbn484fz8g4r6f4b48d6s4cdv4t8bsfbfd5dsq64n8484hnb5c';

module.exports = {
	generateToken:function(email, statuts){
		return jwt.sign({ email: email, statuts_id: statuts}, 
                jwt_sign_secret,
                {
                  expiresIn:'1'
                });
	},
	parseAuthorization:function(authorization){
		return (authorization!=null)? authorization.replace('Bearer', ''):null;
	}
}