jQuery.ajaxSetup({
    cache: false,
    dataType: 'json',
    success: function (payload) {
        console.log("vykresluji");
        if (payload.snippets) {
            for (var i in payload.snippets) {
                $('#' + i).html(payload.snippets[i]);
            }
        }
    },
    error: function(jqXHR, textStatus, errorThrown){
        console.log("error ajax");
        console.log(errorThrown);
        console.log(textStatus)
    }
});

// odesílání odkazů
$('a.ajax').live('click', function (event) {
    console.log("ajax");
    event.preventDefault();
    $.get(this.href);
});

// odesílání formulářů
$('form.ajax').live('submit', function (event) {
    event.preventDefault();
    $.post(this.action, $(this).serialize());
});