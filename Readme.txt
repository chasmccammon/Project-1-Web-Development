Student Checkpoint Tool.

***************************************************
* Which Directory to use                          *
***************************************************

1) checkpoint_Tool: is the old php tool designed by previous project students, it exists to use as a reference/basic template for future additions
2) checkpoint-tool: the new express project that is currently in development

All work should be done in the 'checkpoint-tool' directory


***************************************************
* Node Modules + .gitignore                       *
***************************************************

You don't want to push your node_modules folder to the repo. Make sure your .gitignore includes: /checkpoint-tool/node_modules/

To install the node modules run: npm install


***************************************************
* Running the app                                 *
***************************************************

1) Open cmd in the checkpoint-tool directory
2) Enter command: node app.js
3) In the browser navigate to localhost:3000


***************************************************
* Adding new html pages                           *
***************************************************

1) New .html files belong in the 'views' directory
2) A .js file for the route will need to be added to the 'routes' directory (refer to the existing .js routes for syntax)
3) In app.js set a var to require the path to the new route .js file (near top of file, designated by appropriate comment)
   Example: var indexRouter = require('./routes/index');
4) Set the route for the app to use.
   Example: app.use('/', indexRouter);
