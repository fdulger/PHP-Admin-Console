$(document).ready(function() {
    $('#gtp').live('change',function(){refresh();});
    $('#lpp').live('change',function(){refresh();});
    function refresh() {
        window.location="./?action=browse&form="+$("#form_info").data("formname")+"&gtp="+$("#gtp").val()+"&lpp="+$("#lpp").val();
    }
});


