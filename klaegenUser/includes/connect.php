
<?php
define('SERVER','127.0.0.1');
define('USER','root');  
define('PASSWORD','');
define('DATABASE','klaegensp');
//LEFT THE DEFAUT USER AND PASSWORD CREDENTIALS FOR EASIER ACCESS TO ANY MACHINE. MIGHT NEED TO CHANGE IT AFTER.

$con = mysqli_connect(SERVER,USER,PASSWORD,DATABASE);

if (mysqli_connect_errno()) {
     echo "Connection to the server failed due to: ". mysqli_connect_error();
//    echo"Connected";
}


?>