var express = require('express');
var app = express();
var passport   = require('passport')
var session    = require('express-session')
var bodyParser = require('body-parser')
var env = require('dotenv')
var exphbs = require('express-handlebars')
var expresslayouts = require('express-ejs-layouts')
var path = require('path')
const createError = require('http-errors');
const cookieParser = require('cookie-parser');
const logger = require('morgan');
const expressValidator = require('express-validator');
const flash = require('connect-flash');
require('./config/passport')(passport);

const hbs = exphbs.create({
    extname      :'hbs',
    layoutsDir   :  path.join(__dirname, '/app/views/layouts'),
    defaultLayout: 'signup',
});
app.engine('hbs', hbs.engine);
app.set('view engine', 'hbs');
app.set('views', path.join(__dirname, '/app/views/layouts'));

app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());
 
app.use(session({ secret: 'keyboard cat',resave: true, saveUninitialized:true})); // session secret
app.use(passport.initialize());
app.use(passport.session()); // persistent login sessions
require('./config/passport')(passport);
app.get('/', function(req, res) {
 
    res.send('Welcome to Passport with Sequelize');
 
});
 
 
app.listen(5000, function(err) {
 
    if (!err)
        console.log("Site is live");
    else console.log(err)
 
});
//Models
//var models = require("./models");
var authRoute = require('./routes/auth.js')(app);

 
//Sync Database
/*
models.sequelize.sync().then(function() {
 
    console.log('Nice! Database looks fine')
 
}).catch(function(err) {
 
    console.log(err, "Something went wrong with the Database Update!")
 
});
*/

function isLoggedIn(req, res, next) {
    if (req.isAuthenticated())
        return next();

    // Otago Polytechnic single sign on
    res.redirect('https://idp.op-bit.nz/auth/login.php?site=moderation&token=token');


}
