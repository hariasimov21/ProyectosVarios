<?php

return

array(
    "base_url" => "http://localhost:8080/login/hybridauth.php",

    "providers" => array(
        "Twitter" => array(
            "enabled" => true,
            "keys" => array(
                "key" => "JMFkFaMqBjWfki2DKJL54D0LH",
                "secret" => "UafDdrkrkYKQ1vyyn2mNvV5ZOVL93fzxpwVRcn4sTnfvQnWed0"
            ),
            "includedEmail" => true
        ),

        "Google" => array(
            "enabled" => true,
            "keys" => array(
                "key" => "",
                "secret" => ""
            ),
            "includedEmail" => true
        ),

        "Facebook" => array(
            "enabled" => true,
            "keys" => array(
                "key" => "489382871649835",
                "secret" => "ba17fd40033469e5b74c87972babda49"
            ),
            "scope" => "email"
        ),



        

        
    )

)


?>