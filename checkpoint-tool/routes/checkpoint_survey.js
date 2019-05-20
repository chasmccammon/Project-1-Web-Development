var express = require('express');
var router = express.Router();

/* GET checkpoint survey page. */
router.get('/', function(req, res, next) {
  res.render('checkpoint_survey', { title: 'Survey' });
});

module.exports = router;
