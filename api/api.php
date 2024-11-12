<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$users = [
    ['id' => 1, 'nombre'=> 'Pepe', 'email' => 'hola@gmail.com', 'edad' => 21, 'contraseña' => '1234'],
    ['id' => 2, 'nombre'=> 'Aniol', 'email' => 'aniol@gmail.com', 'edad' => 19, 'contraseña' => '1234'],
    ['id' => 3, 'nombre'=> 'Adolfo', 'email' => 'adolfo@gmail.com', 'edad' => 122, 'contraseña' => '1234']
];

$metodo = $_SERVER['REQUEST_METHOD'];

switch($metodo){
    case 'GET':
        $existe=false;
        if(isset($_GET['id'])){
            foreach($users as $user){
                if($user['id'] == $_GET['id']){
                    echo json_encode([
                        'estado' => 'Exito',
                        'data' => $user
                    ]);
                    $existe=true;
                    break;
                }
            }
        }

        if($existe==false){
            http_response_code(402);
        }
            /*echo(json_encode([
                'estado' => 'Exito',
                'data' => $users
            ]));*/
        break;

        case 'POST':
            $data = json_decode(file_get_contents("php://input"), true);
            array_push($users, ['id'=>4, 'nombre'=>$data["nombre"], 'email' => "oliver@gmail.com", 'edad' => 18, 'contraseña' => 1234]);
            print_r($users);
            break;
}
?>