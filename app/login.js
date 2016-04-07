define(function (require) {
  var http = require('plugins/http'),
      app = require('durandal/app'),
      ko = require('knockout');
 
  return {
     username: ko.observable(),
     password: ko.observable(),
     loginUser: function() {
        return http.jsonp('http://halifaxamalgam.com/api/php_scripts/login.php', {username: this.username(), password: this.password()}, 'jsoncallback').then(function(response) {
          console.log(response);
          if(response > 0){
            location.href="#incidents";
          }
          else
            app.showMessage("Opps! Login Error, please try again.");
       });
     }
   };
});