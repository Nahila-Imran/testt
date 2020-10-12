<?php
include("config.php");
include("header.php");
session_start();

if(isset($_POST['submit'])) 
{
	$username = isset($_POST['username'])?$_POST['username']:'';
    $email = isset($_POST['email'])?$_POST['email']:'';
    
    echo $username;
    echo $email;
    
    $sql = "SELECT * FROM users" ;
    $result = $conn->query($sql);
    if ($result->num_rows > 0) 
    {
        while($row = $result->fetch_assoc()) 
        {
            echo $row['username'];
            if($username == $row['username'] && $email == $row['email'])
            {
                echo '<script>alert("Order Placed Successfully!!!")</script>';
                echo '<script>window.location="index.php"</script>';
            }
            else if($username != $row['username'] && $email != $row['email'])
            {
                 echo '<script>alert("Invalid Login Details!!!")</script>';
                 echo '<script>window.location="contact.php"</script>';
            }
                
        }
    }
}
?>

