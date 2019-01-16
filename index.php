<?php

    require_once '/var/www/html/namu_darbas/controller/ClientController.php';


    echo "Hello, choose operation: 'add' or 'edit' or 'delete'", "\n";

    $event = trim(fgets(STDIN, 1024));

    $client = new Clients();

    if($event === 'add'){
        $client->add();
    }else if($event === 'edit'){
        $client->edit();
    }else if($event === 'delete'){
        $client->delete();
    }else{
        echo "Sorry, incorrect operation.. Choose 'add', 'edit' or 'delete'" . "\n";
    }
?>