<?php

    require_once '/var/www/html/namu_darbas/model/ClientsModel.php';

    class Clients {

        public function delete(){

            echo 'Client id:' . "\n";
            $id = trim(fgets(STDIN, 1024));

            $client = new ClientsModel();
            $client->deleteClient($id);
        }

        public function add(){
            $newClient = array();

            echo 'Client first name:' . "\n";
            $newClient['firstName'] = trim(fgets(STDIN, 1024));
            echo 'Client last name:' . "\n";
            $newClient['lastName'] = trim(fgets(STDIN, 1024));
            echo 'Client email:' . "\n";
            $newClient['email'] = trim(fgets(STDIN, 1024));
            echo 'Client phone number:' . "\n";
            $newClient['phoneOne'] = trim(fgets(STDIN, 1024));
            echo 'Clien phone number 2:' . "\n";
            $newClient['phoneTwo'] = trim(fgets(STDIN, 1024));
            echo "Comment:" . "\n";
            $newClient['comment'] = trim(fgets(STDIN, 1024));

            $client = new ClientsModel();
            $client->insertNewClient($newClient);
        }

        public function edit(){
            echo 'Client id:' . "\n";
            $id = trim(fgets(STDIN, 1024));

            $client = new ClientsModel();
            $client->getClientById($id);

            
        }

    }

