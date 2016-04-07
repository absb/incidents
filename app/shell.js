define(function (require) {
  var router = require('plugins/router');
 
  return {
     router: router,
     activate: function () {
       router.map([
         { route:'incidents', title:'All Incidents', moduleId:'incident', nav:true },
         { route:'', title:'', moduleId:'login', nav:true }
       ]).buildNavigationModel();
 
       return router.activate();
     }
   };
});