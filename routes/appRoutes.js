'use strict';
//import
let express = require('express');
let usersCtrl = require('../controller/usersController');
exports.router = (function() {
  let apiRouter = express.Router();

  // users Routes
  apiRouter.route('/users')
    .get(usersCtrl.list_all_users)
    .post(usersCtrl.create_a_user);
   
  apiRouter.route('/users/:id')
    .get(usersCtrl.read_a_user)
    .put(usersCtrl.update_a_user)
    .delete(usersCtrl.delete_a_user);
  apiRouter.route('/users/signin')
    .post(usersCtrl.sign_in);

  return apiRouter;
})();