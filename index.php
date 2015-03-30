<?php

// instantiating an object of the Client class
$client = new Client();

$client->username = "profemzy";
$client->password = "pwd.001";

print_r($client); echo "<br>";

// call to methods in the Client class
$client->save_user();
echo  $client->save_user();
echo "<br>";
echo  $client->get_password();
echo "<br>";

// call to static method in Client class using (scope resolution operator)
Client::pwd_string();



class Client
{
    public $username, $password;

    function save_user(){
        return $this->username;
    }

    function get_password(){
        return $this->password;
    }

    // static method
    static function pwd_string(){
        echo "Please enter password";
    }
}
