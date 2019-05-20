var createError = require('http-errors');
var express = require('express');
var path = require('path');
var cookieParser = require('cookie-parser');
var logger = require('morgan');
var http = require('http').Server(app);
var io = require('socket.io')(http);

var indexRouter = require('./routes/index');
var usersRouter = require('./routes/users');
var surveyRouter = require('./routes/checkpoint_survey');
var adminRouter = require('./routes/admin_page');
var userRouter = require('./routes/user');

var app = express();

// view engine setup
app.set('views', path.join(__dirname, 'views'));
app.set('view engine', 'pug');

app.use(logger('dev'));
app.use(express.json());
app.use(express.urlencoded({ extended: false }));
app.use(cookieParser());
app.use(express.static(path.join(__dirname, 'public')));

app.use('/', indexRouter);
app.use('/users', usersRouter);
app.use('/survey', surveyRouter);
app.use('/admin', adminRouter);
app.use('/user', userRouter);

// catch 404 and forward to error handler
app.use(function(req, res, next) {
  next(createError(404));
});

// error handler
app.use(function(err, req, res, next) {
  // set locals, only providing error in development
  res.locals.message = err.message;
  res.locals.error = req.app.get('env') === 'development' ? err : {};

  // render the error page
  res.status(err.status || 500);
  res.render('error');
});

// print out chat message for all users
io.on('connection', function(socket){
  console.log('a user connected');
  
  socket.on('user connected', function(msg){
      io.emit('user connected', msg);
  })

  socket.on('chat message', function(msg){
      console.log('a message was sent');    

      var i = msg.search('help');
      var help = msg.substring(i, i+4);

      var j = msg.search(':');
      var name = msg.substring(0, j);

      if(help == 'help')
      {
          console.log(name + ' needs help');
          io.emit('admin message', name);
      }

      io.emit('chat message', msg);
  });

  socket.on('disconnect', function(){
      console.log('user disconnected');
  });
});

app.listen(3000, function(){
  console.log('listening on *:3000');
});

module.exports = app;
