<?php
// required headers
header("Access-Control-Allow-Origin: http://localhost/Tema6B2/");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

function utf8ize($d) {
    if (is_array($d)) {
        foreach ($d as $k => $v) {
            $d[$k] = utf8ize($v);
        }
    } else if (is_string ($d)) {
        return utf8_encode($d);
    }
    return $d;
}

// files needed to connect to database
include_once 'config/database.php';
include_once 'objects/image.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// instantiate product object
$user = new Image($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// set product property values
$in=$data->ID;
$stmt = $db->query("SELECT * FROM image where ID=$in");
$row = $stmt->fetch();
    // prepare the query
// create the user
if(
    !empty($in)
){
 
    // set response code
    http_response_code(200);
 
    // display message: user was created
    echo json_encode(array("ID" => $row['ID'], "Filename" => $row['Filename'], "Path" => $row['Path'], "Resolution" => $row['Resolution'], "Transforms" => $row['Transforms']));
}
 
// message if unable to create user
else{
 
    // set response code
    http_response_code(400);
 
    // display message: unable to create user
    echo json_encode(array("message" => "Unable to get image."));
}
?>