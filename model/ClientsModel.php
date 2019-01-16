<?php

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    require_once '/var/www/html/namu_darbas/libs/dbConnect.php';

    class ClientsModel extends dbConnect
    {
        public function getAllClients(){
            $sql = "SELECT * FROM clients";
            $result = $this->conn->query($sql);
            $clients = mysqli_fetch_all($result);
            return $clients;
        }

        public function getClientById($id)
        {
            $sql = "SELECT * FROM clients WHERE id = $id ";
            $result = $this->conn->query($sql);
            $clients = mysqli_fetch_all($result);

            foreach ($clients as $client) {

                $clientInfo = [
                    "id" => $client[0],
                    "firstname" => $client[1],
                    "lastname" => $client[2],
                    "email" => $client[3],
                    "phone1" => $client[4],
                    "phone2" => $client[5],
                    "comment" => $client[6]
                ];
            }
            print_r($clientInfo);


        }

        public function insertNewClient($array)
        {
            $firstName = $array['firstName'];
            $lastName = $array['lastName'];
            $email = $array['email'];
            $phoneOne = $array['phoneOne'];
            $phoneTwo = $array['phoneTwo'];
            $comment = $array['comment'];

            $sql = "INSERT INTO `clients` (`firstName`, `lastName`, `email`, `phoneNumberOne`, `phoneNumberTwo`, `comment`) VALUES ('$firstName', '$lastName', '$email', '$phoneOne', '$phoneTwo', '$comment')" ;
            if(!$this->conn->query($sql)){
                die($this->conn->error);
            }
        }

        public function updateClient($id, $array){
            $firstName = $array['firstName'];
            $lastName = $array['lastName'];
            $email = $array['email'];
            $phoneOne = $array['phoneOne'];
            $phoneTwo = $array['phoneTwo'];
            $comment = $array['comment'];

            $sql = "UPDATE `clients` SET `firstName` = '$firstName', `lastName` = '$lastName', `email` = '$email', `phoneNumberOne` = $phoneOne, `phoneNumberTwo` = '$phoneTwo', `comment` = '$comment' WHERE id = $id";
            if(!$this->conn->query($sql)){
                die($this->conn->error);
            }
        }

        public function deleteClient($id){
            $sql = "DELETE FROM `clients` WHERE id = $id";
            if(!$this->conn->query($sql)){
                die($this->conn->error);
            }
        }

        public function editClientFirstName($id, $firstName){


            $sql = "UPDATE `clients` SET `firstName` = '$firstName' WHERE id = $id";
            if(!$this->conn->query($sql)){
                die($this->conn->error);
            }
        }

        public function editClientLastName($id, $lastName){


            $sql = "UPDATE `clients` SET `lastName` = '$lastName' WHERE id = $id";
            if(!$this->conn->query($sql)){
                die($this->conn->error);
            }
        }

        public function editClientEmail($id, $email){


            $sql = "UPDATE `clients` SET `email` = '$email' WHERE id = $id";
            if(!$this->conn->query($sql)){
                die($this->conn->error);
            }
        }

        public function editClientPhoneOne($id, $phoneOne){


            $sql = "UPDATE `clients` SET `phoneNumberOne` = '$phoneOne' WHERE id = $id";
            if(!$this->conn->query($sql)){
                die($this->conn->error);
            }
        }

        public function editClientPhoneTwo($id, $phoneTwo){

            $sql = "UPDATE `clients` SET `phoneNumberTwo` = '$phoneTwo' WHERE id = $id";
            if(!$this->conn->query($sql)){
                die($this->conn->error);
            }
        }

        public function editClientComment($id, $comment){

            $sql = "UPDATE `clients` SET `comment` = '$comment' WHERE id = $id";
            if(!$this->conn->query($sql)){
                die($this->conn->error);
            }
        }

        public function emailUnique($userEmail){

            $sql = "SELECT `email` FROM `clients`";
            $result = $this->conn->query($sql);
            $emails = mysqli_fetch_all($result);

            $array = array();

            foreach($emails as $emailArray){
                foreach ($emailArray as $email){
                    if($email === $userEmail){
                       $array[] = $email;
                    }
                }
            }

            if(count($array) == 0){
                return true;
            }else{
                die();
            }
        }

        public function checkClient($userId){
            $sql = "SELECT `id` FROM `clients`";
            $result = $this->conn->query($sql);
            $idData = mysqli_fetch_all($result);

            $array = array();

            foreach($idData as $idArray){
                foreach($idArray as $id){
                    if($id === $userId){
                        $array[] = $userId;
                    }
                }
            }

            if(count($array) == 1){
                return true;
            }else{
                die();
            }
        }
    }

