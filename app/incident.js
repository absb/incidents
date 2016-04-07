define(function (require) {
  var http = require('plugins/http'),
      app = require('durandal/app'),
      ko = require('knockout'),
      url = "http://halifaxamalgam.com/api/php_scripts/";
 
  return {
     incidents: ko.observableArray([]),
     incident_summary: ko.observable(),
     activate: function() {
      
      //the router's activator calls this function and waits for it to complete before proceeding
      if (this.incidents().length > 0) {
          return;
      }

      var that = this;
       return http.jsonp(url+'incidents.php', "", 'jsoncallback').then(function(response) {
        if(response == 0){
          location.href="#login";
        } else {
          that.incidents(response);
        }
       });
     },
     addIncident: function() {
        var that = this;
        return http.jsonp(url+'add_incidents.php', {summary: this.incident_summary()}, 'jsoncallback').then(function(response) {
          
          if(response == 1){
            that.incident_summary("");
            // Reload data from databate
             return http.jsonp(url+'incidents.php', "", 'jsoncallback').then(function(response) {
              if(response == 0){
                location.href="#login";
              } else {
                that.incidents(response);
              }
             });
          }
          else
            app.showMessage("Opps! Incident could not be added, please try again.");
       });
     }
   };
});