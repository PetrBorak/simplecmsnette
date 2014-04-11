$(document).ready(function(){
    tinyMCE.init({
        mode: "specific_textareas",
        editor_selector: "mceEditor",
        plugins: "image,jbimages",
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages"
    });
})


