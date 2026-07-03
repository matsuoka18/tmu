<?php

$post_data = json_decode(
    $_POST["login_auth"],
    true
    );

$json_data = json_decode(
    file_get_contents("./uploads/auth/login_log.json"),
    true
);
        $now_date = new DateTime();
        $now_date -> format("Y-m-d H:i");
        $past_date = new DateTime($json_data["date"]["date"]);
        $diff = $now_date->diff($past_date);
        $hours = (int)$diff->format('%H');

if($post_data[0] == $json_data["token"] && $post_data[1] == $json_data["username"] && $hour < 1){
    echo json_encode([
        "result"=>"success"
    ]);
}else{
    echo json_encode([
        "result"=>"fail",
        "token"=>$post_data[0]
    ]);
}
?>  