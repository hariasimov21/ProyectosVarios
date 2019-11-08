<?php

$config = [



    'callback' => 'http://localhost:8080/login2/callback.php',

    

    "providers" => [
        "Twitter" => [
            "enabled" => true,
            "keys" => [
                "key" => "JMFkFaMqBjWfki2DKJL54D0LH",
                "secret" => "UafDdrkrkYKQ1vyyn2mNvV5ZOVL93fzxpwVRcn4sTnfvQnWed0",
        ],
            "includedEmail" => true
    ],

     

        "Facebook" => [
            "enabled" => true,
            "keys" => [
                "id" => "1209433705896761",
                "secret" => "7ee3230a3e62adb84919a78d4d27410a"
            ],
            "scope" => "email"
        ],
    ],
];



    
        
    

?>