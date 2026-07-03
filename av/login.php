<?php
    $username = json_decode(
        $_POST["login_data"],
        true
        );
        
    if($username[0] == "k" && $username[1] == "a"){


        $now_date = new DateTime();
        $now_date -> format("Y-m-d H:i");
        $api_token = rand();

        file_put_contents(
            "./uploads/auth/login_log.json",
            json_encode([
                "username"=>$username[0],
                "ip"=>$username[2],
                "date"=>$now_date,
                "token"=>$api_token
            ])
        );
        header("Content-Type: application/json; charset=utf-8");
        echo json_encode([
            "result"=>"success",
            "url"=>"write_news.html",
            "api_token"=>$api_token
        ]);
    }else{
        echo json_encode([
            "result"=>"fail"
        ]);
    }
?>