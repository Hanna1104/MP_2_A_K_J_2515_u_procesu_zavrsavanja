<?php 

    // $metoda = $_SERVER['REQUEST_METHOD'];
    $data = json_decode(file_get_contents("php://input"));
    if(isset($data->book_id)) {
        $korpa->dodajUKorpu($data->book_id,1);
        echo '{"response": "success"}';
    } else {
        echo '{"response":"error"}';
    }
?>