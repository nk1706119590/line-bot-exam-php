<?php



require_once './vendor/autoload.php';

require 'firebasephp.php';


use Kreait\Firebase\Factory;
use Kreait\Firebase\ServiceAccount;


$users = new Users();


if (isset($_POST['submit'])) {


   $name = $_POST['name'];

   $email = $_POST['email'];

   $message = $_POST['message'];


   $users - > insert([

       'name' => $name,

       'email' => $email,

       'message' => $message

   ]);



}
