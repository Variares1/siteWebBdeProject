'use strict';
//import
let express = require('express');
let usersCtrl = require('../controller/usersController');
let centresCtrl = require('../controller/centresController');
let placesCtrl = require('../controller/placesController');
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

  //centres Routes
  apiRouter.route('/centre')
    .post(centresCtrl.create_a_center)
    .get(centresCtrl.list_all_centers);

  apiRouter.route('/centre/:id')
    .delete(centresCtrl.delete_a_center)
    .get(centresCtrl.read_a_center);

  apiRouter.route('/places')
    .get(placesCtrl.list_all_places)
    .post(placesCtrl.create_a_place)

  apiRouter.route('/places/:id')
    .get(placesCtrl.read_a_place)
    .delete(placesCtrl.delete_a_place);

  return apiRouter;
})();