<?php
include './includes/conf/forms.php';
if(!isset($_GET['form'])) {
    die($ERR_TRY_AGAIN);
}

$table = $TABLES[$_GET['form']];
$out ="";
$out .= "<h3>".$_GET['form']."</h3><div style='display:inline-block;'>";
$gto = 1;
$lpp = 20;
if(isset($_GET['gtp'])) $gto = $_GET['gtp'];
if(isset($_GET['lpp'])) $lpp = $_GET['lpp'];
$sql = "select count(*) as cnt from ".$table;
$res = $database->query($sql);
$row = $database->fetch_assoc($res);
$pageCount = intval($row['cnt']/$lpp)+1;
if($pageCount<$gto) $gto = $pageCount;
$sql = "select * from ".$table." order by id desc limit ".($gto-1)*$lpp.",$lpp";
$res = $database->query($sql);
$out .= "<b>".  str_replace("{NUMBER}", $row['cnt'], $SHOWING_N_LINES)."</b>";
$out .="<table border='1' style='border-collapse:collapse;' cellpadding='3px'><tr>";

$fieldsarr = explode("&&",$FORM_FIELDS[$_GET['form']]);
foreach ($fieldsarr as $value) {
    $fieldarr = explode(";;", $value);
    $out .="<th>".$fieldarr[0]."</th>";
}

$out .="</tr>";
while($row=$database->fetch_assoc($res)) {
        $out .= "<tr>";
        foreach ($fieldsarr as $value) {
            $fieldarr = explode(";;", $value);
            $out .="<td class='browsetbltd'>".$row[$fieldarr[4]]."</td>";
        }
        $out .= "</tr>";
}
$out .= "</table>";
$out .= "<span style='float:left;'>$GO_TO <select id='gtp'>".getPagingOptions($gto,$pageCount)."</select></span>";
$out .= "<span style='float:right;'><select id='lpp'>".getPagingLPP($lpp)."</select> $LINES_PER_PAGE</span>";
$out .= "</div>";
echo $out;
?>

<br/>
<input type="hidden" id="form_info"
       data-formname="<?php echo $_GET['form']; ?>"/>
<a href="./"><span class='bigButton'><?php echo $BACK;?></span></a>


<?php
function getPagingOptions($selected,$lenght) {
    $out = "";
    for($i=1;$i<=$lenght;$i++) {
        if($selected==$i) $ss = "selected='selected'"; else $ss = "";
        $out .= "<option value='$i' $ss>$i</option>";
    }
    return $out;
}
function getPagingLPP($selected) {
    $out = "";
    $arr = Array(20,50,100);
    for($i=0;$i<count($arr);$i++) {
        if($selected==$arr[$i]) $ss = "selected='selected'"; else $ss = "";
        $out .= "<option value='$arr[$i]' $ss>$arr[$i]</option>";
    }
    return $out;
}
?>
