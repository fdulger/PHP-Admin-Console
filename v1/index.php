<?php
@session_start();
include './includes/conf/defaults.php';
include './includes/conf/database.php';
include './lib/database/mysql.php';

$lang = $DEFAULT_LANGUAGE;
if(isset($_GET['l']))
    $lang = $_GET['l'];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <script type="text/javascript" src="lib/jquery/jQuery.1.7.js"></script>
        <script type="text/javascript" src="javascript/crud.js"></script>
        <script type="text/javascript" src="javascript/browse.js"></script>
        <link href="style/main.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
<?php
        include "./includes/res/string/".$lang."/".$lang.".php";
        include "./includes/res/string/".$lang."/".$lang."_js.php";
?>
        <script type="text/javascript">window.document.title="<?php echo $TITLE;?>";</script>
        <center>
            <a href='./' id="headerLink" ><h1><?php echo $HEADER;?></h1></a>
            <div id='main'>
<?php
                if(isset($_GET['action']) && isset($_GET['form'])) {
                    $FORM = $_GET['form'];
                    include $_GET['action'].'.php';
                }
                
                else {
?>
                <div id='menu'>
                    <a href="./?action=crud&form=Users">    <span class='bigButton menuButton'>Users</span></a>
                    <a href="./?action=crud&form=Patients"> <span class='bigButton menuButton'>Patients</span></a>
                    <a href="./?action=browse&form=Records"><span class='bigButton menuButton'>Records</span></a>
<?php
                }
?>
            </div>  
        </center>
    </body>
</html>
