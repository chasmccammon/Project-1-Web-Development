var express = require('express');
var router = express.Router();

/* GET user page. */
router.get('/', function(req, res, next) {
  res.render('user_page', { title: 'User' });
});

module.exports = router;
