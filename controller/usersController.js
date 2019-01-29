'use strict';
//imports
let bcrypt = require('bcryptjs');
//let jwt = require('jsonwebtoken');
let user = require('../model/usersModel.js');
let sql = require('../model/db.js');
let jwt = require('../model/model');

// Constants
const EMAIL_REGEX     = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
const PASSWORD_REGEX  = /^(?=.*\d).{4,8}$/;
//const jwt_sign_secret ='fiqjrovgeqb87fzebhdujfj4r4b83ed4fbn484fz8g4r6f4b48d6s4cdv4t8bsfbfd5dsq64n8484hnb5c';

module.exports = {
  list_all_users:function(req, res) {
    user.getAllUsers(function(err, user) {
      if (err)
        res.json(err);
      res.json(user);
    },sql);
  },

  create_a_user:function(req, res) { 
    if(req.body.name==null || req.body.firstName==null || req.body.email==null || req.body.password==null || req.body.centres_id==null){
        return res.status(400).json({ 'error':'missing parameters' });
    }

    else if (!EMAIL_REGEX.test(req.body.email)) {
        return res.status(400).json({ 'error': 'email is not valid' });
    }

    else if (!PASSWORD_REGEX.test(req.body.password)) {
        return res.status(400).json({ 'error': 'password invalid (must length 4 - 8 and include 1 number at least)' });
    }
    else{
        let new_user = new user(req.body);
        new_user.password=bcrypt.hashSync(req.body.password,10);
        console.log('mp : ', new_user.password);
        user.createUser(new_user.email, new_user, function(err, user) { 
          if (err || (err==null && user==null)){
            res.status(409).json({'error':'user already exist'});
            //res.json(err);
          }
          else{res.status(201).json({'user_id' : user});}
        },sql);
      //});
    }
  },

  read_a_user:function(req, res) {
    let test = EMAIL_REGEX.test(req.params.id);
    user.getUserById(1, /*null,*/ req.params.id, test,  function(err, user) {
      if (err)
        res.json(err);
      res.json(user);
    },sql);
  },

  update_a_user:function(req, res) {
    if(req.body.name!=null|| req.body.firstName!=null || req.body.email!=null){
      if(req.body.email!=null){res.status(400).json({'error':'can not modify your email'});}
      if(req.body.name!=null){res.status(400).json({'error':'can not modify your name'});}
      if(req.body.firstName!=null){res.status(400).json({'error':'can not modify your fisrt name'});}
    }
    else if(req.body.password!=null || req.body.centres_id!=null || req.body.statuts_id!=null){
      if(req.body.password!=null){
        if (!PASSWORD_REGEX.test(req.body.password)) {
          return res.status(400).json({ 'error': 'password invalid (must length 4 - 8 and include 1 number at least)' });
        }
      }
      //bcrypt.hash(req.body.password,5,function(err, bcryptPassword){
        let new_user = new user(req.body);
        if(req.body.password!=null){
          new_user.password=bcrypt.hashSync(req.body.password,10);
        }
        user.updateById(req.params.id, new_user, function(err, user) {
          if (err)
            res.json(err);
          res.status(201).json({'update':'update success'});
        }, sql);
      //});
    }
  },

  delete_a_user:function(req, res) {
    user.remove( req.params.id, function(err, user) {
      if (err)
        res.json(err);
      res.json({ message: 'user successfully deleted' });
    }, sql);
  },
  sign_in:function(req, res){
    if(req.body.password==null || req.body.id==null){
      return res.status(400).json({'error':'missing parameters'});
    }
    else{
      let test = EMAIL_REGEX.test(req.body.id);
      if(test){
        user.getUserById(2,/*req.body.password,*/ req.body.id, test,  function(err, user) {
          if (err){
            res.json(err);
          }
          else if(user[0]==null){
            return res.status(404).json({'error':'Authentication failed. User not found'})
          }
          else{
            let a=bcrypt.compareSync(req.body.password, user[0].password);
            console.log('a : ', a);
            if(!a){
              return res.status(403).json({'error':'Authentication failed. Wrong password'})
            }
            else{
              /*return res.json({token: jwt.sign({ email: req.body.id, statuts_id: user[0].statuts_id}, 
                jwt_sign_secret,
                {
                  expiresIn:'1'
                })});*/
                return res.json({token: jwt.generateToken(req.body.id,user[0].statuts_id)});
            }
          }
        },sql);
      }
      else{
        return res.status(400).json({'error':'invalid email'});
      }
    }
    
  }
}