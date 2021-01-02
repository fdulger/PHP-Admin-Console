<?php
include './includes/conf/forms.php';
if(!isset($_GET['form'])) {
    die($ERR_TRY_AGAIN);
}
?>

<h3><?php echo $_GET['form']; ?></h3>
<input type="hidden" id="form_name" value="<?php echo $_GET['form']; ?>"/>
<table border='0'>
    
    <tr><th><?php echo $ADD;?></th><th><?php echo $SELECT;?></th><th><?php echo $EDIT;?></th></tr>
    
    <tr>
        <td class="tblCrudCol borderRight">
            <table id='tblCrudAdd'>
<?php
        $table = $TABLES[$_GET['form']];
        $fields = split("&&",$FORM_FIELDS[$_GET['form']]);
        $display_fields = Array();
        for($i=0;$i<count($fields);$i++) {
            $field = split(";;",$fields[$i]);
            echo "<tr><td>".$field['0'].":";
            echo $field['2']=="1"?"*":"";
            echo "</td><td>";
            if($field['1']=="text") {
                    echo "<input type='".$field['1']."' class='crudInsertFormInput ";
                    echo $field['2']=="1"?" mandatory":"";
                    echo "' id='".$field['4']."'/>";
            } else if($field['1']=="bigtext") {
                    echo "<textarea cols='31' rows='5' class='crudInsertFormInput ";
                    echo $field['2']=="1"?" mandatory":"";
                    echo "' id='".$field['4']."'></textarea>";
            } else if (strstr($field['1'],"option")>-1) {
                $options = str_replace("option[", "",$field['1']);
                $options = str_replace("]", "",$options);
                $optionsarr = explode(",", $options);
                echo "<select class='crudInsertFormInput ";
                echo $field['2']=="1"?" mandatory":"";
                echo "' id='".$field['4']."'>";
                for($i=1;$i<=count($optionsarr);$i++)
                    echo "<option value='".$i."'>".$optionsarr[$i-1]."</option>";
                echo "</select>";
            }
            
            echo"</td></tr>";
            
            if($field['3']=="1")
                $display_fields = explode(",",$field['4']);
        }
?>
                <tr><td colspan='2'><i>*: <?php echo $MANDATORY;?></i></td></tr>
                <tr><td></td><td><input type='button' class='btnCrudFinish midButton' id='btnCrudAdd' value='<?php echo $ADD;?>'/></td></tr>
            </table>
        </td>
    
    <td class="tblCrudCol borderRight paddingLeft">
    
        <?php echo $SEARCH;?>: <input type='text' id='crudSearchByKeyword'/>
        <div id='btnCrudBrowse'>
<?php
                        $sql = "SELECT * FROM ".$table." ORDER BY ".$display_fields['0']." ASC";
                        $result = $database->query($sql);
                        while ($row=$database->fetch_array($result)) {
                            echo "<div class='crudListItem' id='{$row['id']}'>";
                            foreach($display_fields as $display_field)
                                echo $row[$display_field]." ";
                            echo "</div>";
                        }
?>
        </div>
    </td>
    
    <td class="tblCrudCol paddingLeft" id='tblCrudUpdateDelete'><?php echo $SELECT_ITEM_TO_UPDATE;?></td></tr>
    
</table>
<a href="./"><span class='bigButton'><?php echo $BACK;?></span></a>
