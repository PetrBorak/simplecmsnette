(function($) {
  var ajax = $.ajax;
  var pendingRequests = {};
    $.ajax = function(settings) {
      // create settings for compatibility with ajaxSetup
      settings = $.extend(settings, $.extend({}, $.ajaxSettings, settings));
      var port = settings.port;
      if (settings.mode == "abort") {
        if ( pendingRequests[port] ) {
          pendingRequests[port].abort()
      }
   return (pendingRequests[port] = ajax.apply(this, arguments));
     }
     return ajax.apply(this, arguments);
   };
   var pendingRequests = {};
   if ($.ajaxPrefilter) {
     $.ajaxPrefilter(function (settings, original, jqXHR) {
       var port = settings.port;
       if (settings.mode == "abort") {
         if ( pendingRequests[port] ) {
           pendingRequests[port].abort();
         }
         pendingRequests[port] = jqXHR;
       }
     });
   } else {
     var ajax = $.ajax;
     $.ajax = function(settings) {
       // create settings for compatibility with ajaxSetup
       settings = $.extend(settings, $.extend({}, $.ajaxSettings, settings));
       var port = settings.port;
       if (settings.mode == "abort") {
         if ( pendingRequests[port] ) {
           pendingRequests[port].abort();
         }
         return (pendingRequests[port] = ajax.apply(this, arguments));
       }
       return ajax.apply(this, arguments);
     };
   }
  })(jQuery);
