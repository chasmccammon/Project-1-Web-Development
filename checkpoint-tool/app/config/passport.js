const LocalStrategy = require('passport-local').Strategy;
// Load up the user model
const User = require('../models/Admin');

module.exports = function (passport) {

    // This is required for persistent login sessions. passport
    // needs to serialize and deserialize users out of a session

    // Used to serialize the user for the session
    passport.serializeUser((user, done) => {
        done(null, user.userName);
    });

    // Used to deserialize the user
    passport.deserializeUser((userName, done) => {
        User.findOne({
            where: {
                userName
            }
        }).then(user => {
            done(null, user);
        });
    });
    console.log("using passport");
    // Local strategy 
    passport.use('local-login', new LocalStrategy({
        // By default, local strategy uses username 
        // and password, we will override with username
        usernameField: 'username',
        passwordField: 'username',
        passReqToCallback: true // Allow us to pass in the req from our 
        // route (lets us check if a user is logged in or not)

    }, (req, userName, password, done) => {
        if (userName)
            userName = userName.toLowerCase();
          
        // Asynchronous
        process.nextTick(() => {
            console.log("here!!");
            User.findOne({
                where: {
                    userName
                }
            }).then(user => {
                // If no user is found, return the message
                if (!user)
                    return done(null, false, req.flash('loginMessage', 'No user found.'));
                else
                    return done(null,user);
            });
        });
        console.log("username is"+userName+"password is"+passwordField)  }));
    
   
  
};
