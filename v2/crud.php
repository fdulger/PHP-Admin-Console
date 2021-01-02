<?php



if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $strJsonFileContents = file_get_contents("data.json");
    $data = json_decode($strJsonFileContents, true);
    if (!isset($data[$_GET["form"]])) {
        echo "[]";
    } else {
        echo json_encode($data[$_GET["form"]]);
    }
}

else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $request = json_decode(file_get_contents('php://input'));

    $strJsonFileContents = file_get_contents("data.json");
    $data = json_decode($strJsonFileContents, true);

    $request->{"newElement"}->{"uuid"} = uniqid();

    if(!isset($data[$request->{"form"}])) {
        $data[$request->{"form"}] = array();
    }

    array_push($data[$request->{"form"}], $request->{"newElement"});

    $res = json_encode($data);

    $storage = fopen("data.json", "w") or die("Unable to open file!");
    fwrite($storage, $res);
    fclose($storage);

    echo $res;
}


else if ($_SERVER["REQUEST_METHOD"] == "PUT") {
    $request = json_decode(file_get_contents('php://input'));

    $strJsonFileContents = file_get_contents("data.json");
    $data = json_decode($strJsonFileContents, true);

    if(!isset($data[$request->{"form"}])) {
        echo "{}";
    } else {

        $items = $data[$request->{"form"}];
        function update($item) {
            global $request;
            $id = $request->{"updatedElement"}->{"ID"};
            if($item["uuid"] === $id) {
                foreach($item as $key => $value) {
                    if(isset($request->{"updatedElement"}->{$key}))
                        $item[$key] = $request->{"updatedElement"}->{$key};
                }
            }
            return $item;
        }

        $updated = array_map('update', $items);

        $data[$request->{"form"}] = $updated;

        $res = json_encode($data);

        $storage = fopen("data.json", "w") or die("Unable to open file!");
        fwrite($storage, $res);
        fclose($storage);

        echo $res;
    }
}

else if ($_SERVER["REQUEST_METHOD"] == "DELETE") {
    $request = json_decode(file_get_contents('php://input'));

    $strJsonFileContents = file_get_contents("data.json");
    $data = json_decode($strJsonFileContents, true);

    if(!isset($data[$request->{"form"}])) {
        echo "{}";
    } else {

        $items = $data[$request->{"form"}];
        function delete($item) {
            global $request;
            $id = $request->{"deletedElement"}->{"ID"};
            return $item["uuid"] !== $id;
        }

        $updated = array_filter($items, 'delete');

        $data[$request->{"form"}] = $updated;

        $res = json_encode($data);

        $storage = fopen("data.json", "w") or die("Unable to open file!");
        fwrite($storage, $res);
        fclose($storage);

        echo $res;
    }
}

?>