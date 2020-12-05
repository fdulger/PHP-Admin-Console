<?php

function item($name) {
    return array("name" => $name);
}

$db = array(
    "Users" => array(
        "items" => array(
            item("Ahmet"),
            item("Mehmet")
        )
    ),
    "Cars" => array(
        "items" => array(
            item("Volvo"),
            item("BMW"),
            item("Toyota")
        )
    )
);

echo json_encode($db[$_GET["form"]]);

?>