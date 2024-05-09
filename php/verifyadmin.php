<?php

$password = "123";

if(isset($_POST['submit'])) {
    $password = $_POST['123'];
     // Redirect to admin panel page after successful login as admin	
   
}

header("Location: ./admin.html");
     exit;

?>