<?php
include '../conf/database.php';
include '../conf/defaults.php';
include '../conf/forms.php';
include '../../lib/database/mysql.php';

$lang = $DEFAULT_LANGUAGE;
if(isset($_POST['l']))
    $lang = $_POST['l'];

include "../res/string/".$lang."/".$lang.".php";

if(isset($_POST['crudSearch'])) {
    $form = $_POST['form'];
    $keyword = $_POST['keyword'];
    $all_fields = explode("&&",$FORM_FIELDS[$form]);
    $fields = Array();
    foreach ($all_fields as $x) {
        $ff = explode(";;",$x);
        if($ff[3]==1) {
            $fields[] = $ff[4];
        }
    }
    $select = "";
    $where = "";
    foreach ($fields as $f) {
        $select .= $f.",";
        $where .= $f." like '%".$keyword."%' and";
    }
    $select = substr($select, 0, strlen($select)-1);
    $where = substr($where, 0, strlen($where)-4);
    $sql = "select id,".$select." from ". $TABLES[$form]. " where ".$where. " order by ".$select. " asc";
    $res = $database->query($sql);
    $out = "";
    while ($row=$database->fetch_assoc($res)) {
        $out .= "<div class='crudListItem' id='{$row['id']}'>";
        foreach ($fields as $f) {
            $out .= $row[$f]." ";
        }
        $out .= "</div>";
    }
    if($out=="")
            echo "<br/>".$NO_RESULTS;
    else
        echo $out;
}

else if(isset($_POST['crudRead'])) {
    $form = $_POST['form'];
    $item_id = $_POST['item_id'];
    $sql = "select * from ". $TABLES[$form]. " where id=".$item_id;
    $res = $database->query($sql);
    $row = $database->fetch_assoc($res);
    
    $table = $TABLES[$form];
    $fields = split("&&",$FORM_FIELDS[$form]);
    $display_fields = Array();
    $out = "<table>";
    for($i=0;$i<count($fields);$i++) {
        $field = split(";;",$fields[$i]);
        $out .= "<tr><td>".$field['0'].":";
        $out .= $field['2']=="1"?"*":"";
        $out .=  "</td><td>";
        if($field['1']=="text") {
                $out .= "<input type='".$field['1']."' class='crudUpdateFormInput ";
                $out .= $field['2']=="1"?" mandatory":"";
                $out .= "' id='".$field['4']."' value='".$row[$field['4']]."'/>";
        } else if($field['1']=="bigtext") {
                $out .= "<textarea cols='31' rows='5' class='crudUpdateFormInput ";
                $out .= $field['2']=="1"?" mandatory":"";
                $out .= "' id='".$field['4']."'>".$row[$field['4']]."</textarea>";
        } else if (strstr($field['1'],"option")>-1) {
            $options = str_replace("option[", "",$field['1']);
            $options = str_replace("]", "",$options);
            $optionsarr = explode(",", $options);
            $out .= "<select class='crudUpdateFormInput ";
            $out .= $field['2']=="1"?" mandatory":"";
            $out .= "' id='".$field['4']."'>";
            for($i=1;$i<=count($optionsarr);$i++) {
                $out .= "<option value='".$i."'";
                if($i==$row[$field['4']])
                    $out .= " selected='selected' ";
                $out .= ">".$optionsarr[$i-1]."</option>";
            }
            $out .= "</select>";
        }

        $out .="</td></tr>";
    }
    $out .= "<tr><td colspan='2'><i>*: ".$MANDATORY."</i></td></tr>";
    $out .= "<tr><td></td><td><input type='button' class='btnCrudFinish midButton' id='btnCrudUpdate' data-itemid='".$item_id."' value='$SAVE'/></td></tr>";
    $out .= "<tr><td></td><td><input type='button' class='btnCrudFinish midButton' id='btnCrudDelete' data-itemid='".$item_id."' value='$DELETE'/></td></tr>";
    
    echo $out;
}

else if(isset($_POST['crudInsert'])) {
    $form = $_POST['form'];
    $columns = ""; $values = "";
    foreach ($_POST as $key => $data) {
        if($key!='crudInsert' && $key!='form') {
            $columns .= $key.",";
            $values .= "'".$data."',";
        }
    }
    $columns = substr($columns, 0, strlen($columns)-1);
    $values = substr($values, 0, strlen($values)-1);
    $sql = "insert into ".$TABLES[$form]." (".$columns.") values (".$values.")";
    $database->query($sql);
    if(mysql_error()!="")
        echo $ERROR.": ".mysql_error();
    else
        echo $ITEM_INSERTED;
}

else if(isset($_POST['crudDelete'])) {
    $form = $_POST['form'];
    $item_id = $_POST['item_id'];
    $sql = "delete from ".$TABLES[$form]." where id = '".$item_id."'";
    $database->query($sql);
    if(mysql_error()!="")
        echo $ERROR.": ".mysql_error();
    else
        echo $ITEM_DELETED;
}

else if(isset($_POST['crudUpdate'])) {
    $form = $_POST['form'];
    $item_id = $_POST['item_id'];
    $columns = "";
    foreach ($_POST as $key => $data) {
        if($key!='crudUpdate' && $key!='form' && $key!='item_id') {
            $columns .= $key."='".$data."',";
        }
    }
    $columns = substr($columns, 0, strlen($columns)-1);
    $sql = "update ".$TABLES[$form]." set ".$columns." where id = '".$item_id."'";
    $database->query($sql);
    if(mysql_error()!="")
        echo $ERROR.": ".mysql_error();
    else
        echo $ITEM_UPDATED;
}

?>
