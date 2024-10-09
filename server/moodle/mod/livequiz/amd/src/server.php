<?php


// Headers to allow CORS and define content type as JSON
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


// Get the HTTP method (GET, POST, PUT, DELETE)
$method = $_SERVER['REQUEST_METHOD'];
$path = explode('/', $_SERVER['REQUEST_URI']);
$resource = isset($path[2]) ? $path[2] : null; // e.g., '/api/users'

// Check if the requested file is a .js, .html, .ico, or .css file
$fileExtension = pathinfo($resource, PATHINFO_EXTENSION);
$allowedExtensions = ['js', 'html', 'ico', 'css'];

if (in_array($fileExtension, $allowedExtensions)) {
    $filePath = __DIR__ . '/browser/' . $resource;
    if (file_exists($filePath)) {
        $fileContent = file_get_contents($filePath);
        switch ($fileExtension) {
            case 'js':
                header('Content-Type: application/javascript');
                break;
            case 'html':
                header('Content-Type: text/html');
                break;
            case 'ico':
                header('Content-Type: image/x-icon');
                break;
            case 'css':
                header('Content-Type: text/css');
                break;
        }
        echo $fileContent;
        exit;
    } else {
        echo json_encode(["message" => "File not found."]);
        exit;
    }
}

switch ($method) {
    case 'GET':
        if ($resource == 'users') {
            getUsers();
        } else {
            echo json_encode(["message" => "Invalid resource."]);
        }
        break;

    case 'POST':
        if ($resource == 'users') {
            $data = json_decode(file_get_contents("php://input"), true);
            createUser($data);
        } else {
            echo json_encode(["message" => "Invalid resource."]);
        }
        break;

    case 'PUT':
        if ($resource == 'users') {
            $data = json_decode(file_get_contents("php://input"), true);
            updateUser($data);
        } else {
            echo json_encode(["message" => "Invalid resource."]);
        }
        break;

    case 'DELETE':
        if ($resource == 'users') {
            $id = $path[3];
            deleteUser($id);
        } else {
            echo json_encode(["message" => "Invalid resource."]);
        }
        break;

    default:
        echo json_encode(["message" => "Method not supported."]);
        break;
}
?>