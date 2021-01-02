$(document).ready(function() {

    //insert
    $('#btnCrudAdd').live('click', function() {
        var err = 0;
        $(".mandatory").each(function() {
            if ($(this).val() == "") {
                $(this).addClass("missing_required_field");
                err = 1;
            }
        });
        var data = "crudInsert=1&form=" + $("#form_name").val();
        $(".crudInsertFormInput").each(function() {
            data += "&" + $(this).attr('id') + "=" + $(this).val();
        });
        if (err == 0) {
            $.ajax({
                type: 'POST',
                url: 'includes/data/crud.php',
                data: data,
                cache: false,
                success: function(cvp) {
                    alert(cvp);
                    if(cvp.indexOf($("#ERROR").val())<0) {
                        $(".crudInsertFormInput").val("");
                        $('#crudSearchByKeyword').val("");
                        $('#crudSearchByKeyword').trigger("keyup");
                    }
                }
            });
        } else if (err == 1) {
            alert($("#MISSING_REQUIRED_FIELD").val());
        }
    });
    
    //read
    $('.crudListItem').live('click', function() {
        var data = "crudRead=1&form=" + $("#form_name").val() + "&item_id=" + $(this).attr('id');
        $.ajax({
            type: 'POST',
            url: 'includes/data/crud.php',
            data: data,
            cache: false,
            success: function(cvp) {
                $("#tblCrudUpdateDelete").html(cvp);
            }
        });
    });

    //update
    $('#btnCrudUpdate').live('click', function() {
        var err = 0;
        $(".mandatoryU").each(function() {
            if ($(this).val() == "") {
                $(this).addClass("missing_required_field");
                err = 1;
            }
        });
        var data = "crudUpdate=1&form=" + $("#form_name").val()+ "&item_id=" + $(this).data('itemid');
        $(".crudUpdateFormInput").each(function() {
            data += "&" + $(this).attr('id') + "=" + $(this).val();
        });
        if (err == 0) {
            $.ajax({
                type: 'POST',
                url: 'includes/data/crud.php',
                data: data,
                cache: false,
                success: function(cvp) {
                    alert(cvp);
                    if(cvp.indexOf($("#ERROR").val())<0) {
                        $('#crudSearchByKeyword').val("");
                        $('#crudSearchByKeyword').trigger("keyup");
                    }
                }
            });
        } else if (err == 1) {
            alert($("#MISSING_REQUIRED_FIELD").val());
        }
    });

    //delete
    $('#btnCrudDelete').live('click', function() {
        if(confirm($("#CONFIRM_DELETE_ITEM").val())){
            var data = "crudDelete=1&form=" + $("#form_name").val() + "&item_id=" + $(this).data('itemid');
            $.ajax({
                type: 'POST',
                url: 'includes/data/crud.php',
                data: data,
                cache: false,
                success: function(cvp) {
                    alert(cvp);
                    if(cvp.indexOf($("#ERROR").val())<0) {
                        $('#crudSearchByKeyword').val("");
                        $('#crudSearchByKeyword').trigger("keyup");
                        $("#tblCrudUpdateDelete").html($("#SELECT_ITEM_TO_UPDATE").val());
                    }
                }
            });
        }
    });

    //search
    $('#crudSearchByKeyword').live('keyup', function() {
        var data = "crudSearch=1&form=" + $("#form_name").val() + "&keyword=" + $(this).attr('value');
        $.ajax({
            type: 'POST',
            url: 'includes/data/crud.php',
            data: data,
            cache: false,
            success: function(cvp) {
                $('#btnCrudBrowse').html(cvp);
            }
        });
    });


});

