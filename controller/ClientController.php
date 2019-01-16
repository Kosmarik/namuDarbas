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
            $email = trim(fgets(STDIN, 1024));
                if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                    $unique = $this->checkEmailUnique($email);
                    if($unique == true){
                        $newClient['email'] = $email;
                    }else{
                        echo 'email already in use' . "\n";
                        die();
                    }
                }else{
                    echo 'wrong email format' . "\n";
                    die();
                }
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


                echo "Choose a parameter: \n 'firstName' \n 'lastName' \n 'email' \n 'phoneOne' \n 'phoneTwo' \n 'comment' \n 'all' \n";
                $parameter = trim(fgets(STDIN, 1024));

                if ($parameter === 'all') {

                    echo 'Client first name:' . "\n";
                    $editedClient['firstName'] = trim(fgets(STDIN, 1024));
                    echo 'Client last name:' . "\n";
                    $editedClient['lastName'] = trim(fgets(STDIN, 1024));
                    echo 'Client email:' . "\n";
                    $email = trim(fgets(STDIN, 1024));
                        if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                            $unique = $this->checkEmailUnique($email);
                            if($unique == true){
                                $editedClient['email'] = $email;
                            }else{
                                echo 'email already in use' . "\n";
                                die();
                            }
                        }else{
                            echo 'wrong email format' . "\n";
                            die();
                        }
                    echo 'Client phone number:' . "\n";
                    $editedClient['phoneOne'] = trim(fgets(STDIN, 1024));
                    echo 'Clien phone number 2:' . "\n";
                    $editedClient['phoneTwo'] = trim(fgets(STDIN, 1024));
                    echo "Comment:" . "\n";
                    $editedClient['comment'] = trim(fgets(STDIN, 1024));

                    $client->updateClient($id, $editedClient);

                } else if ($parameter === 'firstName') {

                    echo 'Client first name:' . "\n";
                    $firstName = trim(fgets(STDIN, 1024));

                    $client->editClientFirstName($id, $firstName);
                    echo 'firstName changed successfully' . "\n";

                } else if ($parameter === 'lastName') {

                    echo 'Client last name:' . "\n";
                    $lastName = trim(fgets(STDIN, 1024));

                    $client->editClientLastName($id, $lastName);
                    echo 'lastName changed successfully' . "\n";

                } else if ($parameter === 'email') {

                    echo 'Client email:' . "\n";
                    $clientEmail = trim(fgets(STDIN, 1024));

                    if(filter_var($clientEmail, FILTER_VALIDATE_EMAIL)){
                        $email = $clientEmail;
                    }else{
                        echo 'wrong email format' . "\n";
                        die();
                    }

                    $unique = $this->checkEmailUnique($email);


                    if ($unique == true) {
                        $client->editClientEmail($id, $email);
                        echo 'email changed successfully' . "\n";
                    }

                } else if ($parameter == 'phoneOne') {

                    echo 'Client phone number:' . "\n";
                    $phoneOne = trim(fgets(STDIN, 1024));

                    $client->editClientPhoneOne($id, $phoneOne);
                    echo 'phoneOne changed successfully' . "\n";

                } else if ($parameter === 'phoneTwo') {

                    echo 'Client phone number 2:' . "\n";
                    $phoneTwo = trim(fgets(STDIN, 1024));

                    $client->editClientPhoneTwo($id, $phoneTwo);
                    echo 'phoneTwo changed successfully' . "\n";

                } else if ($parameter === 'comment') {

                    echo "Comment:" . "\n";
                    $comment = trim(fgets(STDIN, 1024));

                    $client->editClientComment($id, $comment);
                    echo 'comment changed successfully' . "\n";

                } else {

                    echo 'Incorrect operation' . "\n";

                }

        }

        public function checkEmailUnique($var){

            $emails = new ClientsModel();
            $emails->emailUnique($var);

            if (!empty($emails)){
                return true;
            }else{
                return false;
            }
        }

    }
