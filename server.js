//Imports
const express = require('express');
let bodyParser = require('body-parser');
let routes = require('./routes/approutes').router;

//instantiate server
let app = express();

//body parser config
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

//config routes
app.use('/', routes);

app.listen(8080, function(){
    console.log('API server started');
});