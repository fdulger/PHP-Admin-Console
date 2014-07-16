<?php

//names of the forms
$FORMS = Array(
    "Users",
    "Patients",
    "Records"
);

//corresponding database tables for the forms
$TABLES = Array(
    $FORMS["0"]=>"vo_users", 
    $FORMS["1"]=>"vo_patients", 
    $FORMS["2"]=>"vo_records"
);

//field definitions for the forms
//format: form_name => field_name;;field_type;;mandatory_or_not;;displayed_or_not;;column_name&&...
//field types: text, bigtext, option[option 1, option 2,...]
$FORM_FIELDS = Array(
    $FORMS["0"] => "Name;;text;;1;;1;;name"
                    ."&&Username;;text;;1;;0;;username"
                    ."&&Job;;option[Doctor,Secretary,Admin];;1;;0;;role",
    $FORMS["1"] => "Name;;text;;1;;1;;name"
                    ."&&ID Number;;text;;1;;0;;tc_kimlik_no"
                    ."&&Details;;text;;0;;0;;details",
    $FORMS["2"] => "Date;;text;;1;;1;;date"
                    ."&&Patient;;text;;1;;1;;patientname"
                    ."&&Examination;;text;;0;;0;;examination"
                    ."&&Filename;;text;;0;;0;;filename"
);

?>
