'use strict';
//import
let express = require('express');
let usersCtrl = require('../controller/usersController');
let centresCtrl = require('../controller/centresController');
let placesCtrl = require('../controller/placesController');
let statutsCtrl = require('../controller/statutsController');
let eventsCtrl = require('../controller/eventsController');
let productsCtrl = require('../controller/productsController');
let participationsCtrl = require('../controller/usersEventsController');
let cartCtrl = require('../controller/usersProductsController');
let imgCtrl = require('../controller/imgsController');
let commentCtrl = require('../controller/commentsController');

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

    apiRouter.route('/status')
      .get(statutsCtrl.list_all_statuts);

    apiRouter.route('/status/:id')
      .get(statutsCtrl.read_a_statut);

    apiRouter.route('/events')
      .get(eventsCtrl.list_all_events)
      .post(eventsCtrl.create_a_event);

    apiRouter.route('/events/:id')
      .get(eventsCtrl.read_a_event)
      .put(eventsCtrl.update_a_event)
      .delete(eventsCtrl.delete_a_event);

    apiRouter.route('/products')
      .get(productsCtrl.list_all_products)
      .post(productsCtrl.create_a_product);

    apiRouter.route('/products/common')
      .get(productsCtrl.common_product);

    apiRouter.route('/products/:id')
      .get(productsCtrl.read_a_product)
      .put(productsCtrl.update_a_product)
      .delete(productsCtrl.delete_a_product);

    apiRouter.route('/participation')
      .get(participationsCtrl.list_all_participation)
      .post(participationsCtrl.create_a_participation);

    apiRouter.route('/participation/delete')
      .post(participationsCtrl.delete_a_participation);

    apiRouter.route('/participation/list')
      .post(participationsCtrl.read_a_participation);

    apiRouter.route('/carts')
      .get(cartCtrl.list_all_cart)
      .post(cartCtrl.create_a_cart);

    apiRouter.route('/carts/delete')
      .post(cartCtrl.delete_a_cart);

    apiRouter.route('/carts/read')
      .post(cartCtrl.read_a_cart);

    apiRouter.route('/carts/update')
      .post(cartCtrl.update_a_cart);

    apiRouter.route('/imgs')
      .get(imgCtrl.list_all_imgs)
      .post(imgCtrl.create_a_img);

    apiRouter.route('/imgs/:id')
      .get(imgCtrl.read_a_img)
      .put(imgCtrl.update_a_img)
      .delete(imgCtrl.delete_a_img);

    apiRouter.route('/comments')
      .get(commentCtrl.list_all_comments)
      .post(commentCtrl.create_a_comment);

    apiRouter.route('/comments/:id')
      .get(commentCtrl.read_a_comment)
      .put(commentCtrl.update_a_comment)
      .delete(commentCtrl.delete_a_comment);
  return apiRouter;
})();