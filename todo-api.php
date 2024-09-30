<?php

header("Content-Type: application/json");


//LOG function in PHP
function write_log($action, $data) {
    $log = fopen ('log.txt', 'a');
    $timestamp = date('Y-m-d H:i:s');
    fwrite($log, "timestamp - $action: " . json_decode($data) . "\n");
    fclose(($log));
    
}


switch ($_SERVER["REQUEST_METHOD"]) {
    case "GET":
        //Get Todo,s (READ)
       $todos = [
            ["id" => "uniqueID", "title" => "First TODO"]
       ];
       echo json_encode($todos);
       write_log("READ", null);
        break;
    case "POST":
        $data = json_decode(file_get_contents('php://input'), true);
        if (!empty($data['title'])) {
            $new_todo = [
                "id" => uniqid(),
                "title" => $data['title']
            ];
            write_log("CREATE", $new_todo);
            echo json_encode($new_todo);
        } else {
            echo json_encode(["error" => "Invalid data"]);
        }
        break;       
    case "PUT":
        //Change Todo (UPDATE)
        break;
    case "DELETE":
        //Remove Todo (DELETE)
        write_log("DELETE", null);
        break;

}

?>