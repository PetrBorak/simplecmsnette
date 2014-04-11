$.fn.fwr = function(options){
				var options = options;
				var _this = $(this);
				var action = _this.attr('action');
				var submit = _this.find("*[type='submit']");
				var tobind = function(event){
							$.getJSON(action, _this.serialize(), function(response){
											if($('#alertmodalform').length != 0){
												$('#alertmodalform').animate({'opacity':0},{
																duration: 500,
																queue: true,
																complete: function(){
																$(this).remove();
																$(options.messageparent).append('<div id="alertmodalform" class="build">'+response[options.messageid]+'</div>');
												}
											});															
										}else{
												$(options.messageparent).append('<div id="alertmodalform" class="build">'+response[options.messageid]+'</div>');														
										}
										for (var i in response.snippets) {
                $('#' + i).html(response.snippets[i]);
            }										
							});
							event.preventDefault();
				};
				submit.bind('click',tobind);
}

$.fn.modwr = function(options){
				var options = options;
				var _this = $(this);
				var action = _this.attr('href');
				var submit = _this.find("*[type='submit']");
				var tobind = function(event){
							$.getJSON(action, _this.serialize(), function(response){
											if($('#alertmodalform').length != 0){
												$('#alertmodalform').animate({'opacity':0},{
																duration: 500,
																queue: true,
																complete: function(){
																$(this).remove();
																$(options.messageparent).append('<div id="alertmodalform" class="build">'+response[options.messageid]+'</div>');
												}
											});															
										}else{
												$(options.messageparent).append('<div id="alertmodalform" class="build">'+response[options.messageid]+'</div>');														
										}
										for (var i in response.snippets) {
                $('#' + i).html(response.snippets[i]);
            }										
							});
							event.preventDefault();
				};
				submit.bind('click',tobind);
}

$.fn.removeuserset = function(options){
				var options = options;
				var _this = $(this);
				var action = options.action;
				var tobind = function(event){
							$.getJSON(action, _this.serialize(), function(response){
											if($('#alertmodalform').length != 0){
												$('#alertmodalform').animate({'opacity':0},{
																duration: 500,
																queue: true,
																complete: function(){
																$(this).remove();
																$(options.messageparent).append('<div id="alertmodalform" class="build">'+response[options.messageid]+'</div>');
												}
											});															
										}else{
												$(options.messageparent).append('<div id="alertmodalform" class="build">'+response[options.messageid]+'</div>');														
										}
										for (var i in response.snippets) {
                $('#' + i).html(response.snippets[i]);
            }
							});
							event.preventDefault();
				};
				_this.bind('click',tobind);				
}

