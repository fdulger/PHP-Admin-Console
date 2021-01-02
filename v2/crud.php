<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $strJsonFileContents = file_get_contents("data.json");
    $data = json_decode($strJsonFileContents, true);
    echo json_encode($data[$_GET["form"]]);
}

else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $request = json_decode(file_get_contents('php://input'));

    $strJsonFileContents = file_get_contents("data.json");
    $data = json_decode($strJsonFileContents, true);


    $request->{"newElement"}->{"uuid"} = uniqid();

    array_push($data[$request->{"form"}], $request->{"newElement"});

    $res = json_encode($data);

    $storage = fopen("data.json", "w") or die("Unable to open file!");
    fwrite($storage, $res);
    fclose($storage);

    echo $res;
}

?>