/**
 * AJAX Nette Framwork plugin for jQuery
 *
 * @copyright   Copyright (c) 2009 Jan Marek
 * @license     MIT
 * @link        http://nettephp.com/cs/extras/jquery-ajax
 * @version     0.2
 */

jQuery.extend({
	nette: {
		updateSnippet: function (id, html) {
			jQuery("#" + id).html(html);
		},

		success: function (payload) {
			// redirect
			if (payload.redirect) {
				window.location.href = payload.redirect;
				return;
			}

			// snippets
			if (payload.snippets) {
				for (var i in payload.snippets) {
					jQuery.nette.updateSnippet(i, payload.snippets[i]);
          jQuery("#" + i + ' form').each(function(i, val) {
            Nette.initForm(val);
          });
				}
			}
      if(jQuery.dependentselectbox !== undefined)
        jQuery.dependentselectbox.hideSubmits();
      if(jQuery.productFilter !== undefined)
        jQuery.productFilter.initialize();
		}
	}
});

jQuery.ajaxSetup({
	success: jQuery.nette.success,
	dataType: "json",
  error: function (xhr, status, thrownError) {
    if(xhr.status !== 200)
      alert('AJAX Fatal Error! (' + xhr.status + ') ' + xhr.statusText);
  }
});

/**
 * AJAX form plugin for jQuery
 *
 * @copyright  Copyright (c) 2009 Jan Marek
 * @license    MIT
 * @link       http://nettephp.com/cs/extras/ajax-form
 * @version    0.1
 */

jQuery.fn.extend({
	ajaxSubmit: function (callback, ajaxOptions) {
		var form;
		var sendValues = {};

    if (ajaxOptions === undefined) {
      ajaxOptions = {};
    }

		// submit button
		if (this.is(":submit")) {
			form = this.parents("form");
			sendValues[this.attr("name")] = this.val() || "";

		// form
		} else if (this.is("form")) {
			form = this;

		// invalid element, do nothing
		} else {
			return null;
		}

		// validation
		if (form.get(0).onsubmit && !form.get(0).onsubmit()) return null;

		// get values
		var values = form.serializeArray();

		for (var i = 0; i < values.length; i++) {
			var name = values[i].name;

			// multi
			if (name in sendValues) {
				var val = sendValues[name];

				if (!(val instanceof Array)) {
					val = [val];
				}

				val.push(values[i].value);
				sendValues[name] = val;
			} else {
				sendValues[name] = values[i].value;
			}
		}

    // send ajax request
    ajaxOptions.url = form.attr("action");
    ajaxOptions.data = sendValues;
    ajaxOptions.type = form.attr("method") || "get";

		if (callback) {
			ajaxOptions.success = callback;
		}

		return jQuery.ajax(ajaxOptions);
	}
});

/**
 * @author Daniel Robenek
 * @license MIT
 */

/**
 * 	$(document).ready(function() {
 *		$.dependentselectbox.initialize();
 *	});
 *
 *	Add to jquery.nette.js at the end of $.nette.success:
 *	$.dependentselectbox.hideSubmits();
 *	or use livequery
 */
jQuery.extend({
	dependentselectbox: {
		controlClass: 'dependentControl',

		buttonSuffix: '_submit',

		hideSubmits: function() {
			// Here hide all you want. Default is to hide <tr> of button
			$('.'+$.dependentselectbox.controlClass+$.dependentselectbox.buttonSuffix).parent().parent().hide();
		},

		initialize: function() {
			$.dependentselectbox.hideSubmits();
			$('.'+$.dependentselectbox.controlClass).live('change', function() {
				// Nette form validation
				button = document.getElementById(($(this).attr('id'))+$.dependentselectbox.buttonSuffix);
				button.form["nette-submittedBy"] = button;
				// ----
				$('#'+($(this).attr('id'))+$.dependentselectbox.buttonSuffix).ajaxSubmit($.dependentselectbox.jsonResponse);
			});
		},

		updateSelectBox: function(id, selectedKey, items) {
			$("#" + id + " option").remove();
			var select = $("#" + id);
			for(var i in items) {
				var item = $("<option></option>").attr("value", i).html(items[i]);
				if(i == selectedKey)
					item.attr("selected", "selected");
				if(i == "")
				  select.prepend(item);
				else
				  select.append(item);
			}
		},

		jsonResponse: function(payload) {
			if(!(payload["type"] && payload["type"] == "JsonDependentSelectBoxResponse")) {
				$.nette.success(payload);
				return;
			}
			var items = payload["items"];
			for(var i in items) {
				$.dependentselectbox.updateSelectBox(i, items[i]["selected"], items[i]["items"]);
			}
		}
	}
});

$(document).ready(function() {
	$.dependentselectbox.initialize();
});