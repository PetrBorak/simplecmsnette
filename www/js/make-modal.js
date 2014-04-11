$.fn.makemodal = function(data){
  var _this = $(this);
		var action = _this.attr('href');
		/*
		var userid = /[\d\D]*userid=(\d+)/gi.exec(_this.attr('href'))[1];
		*/
		var userid  = _this.attr('data-userid');
		
		console.log(userid);
		
		var formtemp = formtemplates[data.modalbody];
		var formtemplate = data.langs ? data.preklad ? formtemp({action:action, userid: userid, langs: data.langs, preklad: data.preklad}) : formtemp({action:action, userid: userid, langs: data.langs}) :  formtemp({action:action, userid: userid});
		var modaltemplategen = modaltemplate({modaltitle:data.title,modalbody: formtemplate});
		
				if(!data.noform){
								_this.bind('click',function(event){
												$('#main-modal').remove();
												$('body').append(modaltemplategen);
												$('#main-modal').modal();
												$('#main-modal form').fwr({messageparent:'.ajaxwithresponseform', messageid: 'formresponse'});						
												event.preventDefault();
								});								
				} else {
								_this.bind('click', function(event){
												event.preventDefault();
												$('#main-modal').remove();
												$('body').append(modaltemplategen);
												$('#main-modal').modal();
												$('#main-modal '+data.sendbut).modwr({messageparent:'.ajaxwithresponse', messageid: 'response'});
	
								})
				}

}

$.fn.makemodal02 = function(data){
  var _this = $(this);
		var action = _this.attr('href');
		var userid = /[\d\D]*userid=(\d+)/gi.exec(_this.attr('href'))[1];
		var formtemplate = formtemplates.removeuser();
		var modaltemplategen = modaltemplate({modaltitle:data.title,modalbody:formtemplate});

		_this.bind('click',function(event){
						$('#main-modal').remove();
						$('body').append(modaltemplategen);
						$('#main-modal').modal();
						$('#main-modal #removeuserbtn').removeuserset({messageparent:'#main-modal .modal-body', messageid: 'removeuserresponse',action: $(this).attr('href')});						
						event.preventDefault();
		});
}
$.fn.adduserset = function(){
				var form = $(this);
				var action = this.attr('action');
				var subbut = this.find('*[type="submit"]');
				subbut.click(function(event){
								event.preventDefault();
								return false;
								$.ajax({
												url: action,
												method: "POST",
								}).done(function(data){
												console.log('data returned');
												console.log(data);
								});
				});
}
$.fn.makemodal03 = function(data){
  var _this = $(this);
		var action = _this.attr("href");
		var formtemplate = formtemplates.adduser({action: action});
		var modaltemplategen = modaltemplate({modaltitle:data.title,modalbody:formtemplate});
		

		_this.bind('click',function(event){
						$('#main-modal').remove();
						$('body').append(modaltemplategen);
						$('#main-modal').modal();
						
						$('#main-modal form').fwr({messageparent:'.ajaxwithresponseform', messageid: 'formresponse'});						
						event.preventDefault();
		});
}



