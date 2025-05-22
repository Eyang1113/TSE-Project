<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  

        
    <title>Ambulance</title>
    <style>
        .dashbord-tables{
            animation: transitionIn-Y-over 0.5s;
        }
        .filter-container{
            animation: transitionIn-Y-bottom  0.5s;
        }
        .sub-table,.anime{
            animation: transitionIn-Y-bottom 0.5s;
        }

        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: grey;
            color: black;
        }
        .header {
            background-color: black;
            overflow: hidden;
        }
        .header a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        .header a:hover {
            background-color: #ddd;
            color: black;
        }
        .header-right {
            float: right;
        }

        .profile-title{
            color: white;
            font: bold;
        }
        .profile-subtitle{
            color:white
        }
        .profile-container {
            display: flex;
            align-items: center;
            padding: 10px;
        }
        .profile-container img {
            border-radius: 50%;
            margin-right: 10px;
        }
        .profile-container p {
            margin: 0;
        }

        .header .logo {
            flex: 1;
            display: flex;
            justify-content: right;
            margin-left: 20px;
        }
        .dashbord-tables{
            animation: transitionIn-Y-over 0.5s;
        }
        .filter-container{
            animation: transitionIn-X  0.5s;
        }
        .sub-table{
            animation: transitionIn-Y-bottom 0.5s;
        }
        .popup{
            animation: transitionIn-Y-bottom 0.5s;
        }
        body {
    font-family: 'Arial', sans-serif;
    margin: 0;
    padding: 0;
    background-color: white;
    color: black;
}
</style>
</head>
<body>
    <?php

    //learn from w3schools.com

    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='a'){
            header("location: ../login.php");
        }

    }else{
        header("location: ../login.php");
    }
    
    

    //import database
    include("../connection.php");



    if($_POST){
        //print_r($_POST);
        $result= $database->query("select * from webuser");
        $name=$_POST['name'];
        $nic=$_POST['nic'];
        $spec=$_POST['spec'];
        $email=$_POST['email'];
        $tele=$_POST['Tele'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];
        
        if ($password==$cpassword){
            $error='3';
            $result= $database->query("select * from webuser where email='$email';");
            if($result->num_rows==1){
                $error='1';
            }else{

                $sql1="insert into ambulance(ambemail,ambname,ambpassword,ambnic,ambtel,specialties) values('$email','$name','$password','$nic','$tele',$spec);";
                $sql2="insert into webuser values('$email','d')";
                $database->query($sql1);
                $database->query($sql2);

                //echo $sql1;
                //echo $sql2;
                $error= '4';
                
            }
            
        }else{
            $error='2';
        }
    
    
        
        
    }else{
        //header('location: signup.php');
        $error='3';
    }
    

    header("location: ambulances.php?action=add&error=".$error);
    ?>
    
   

</body>
</html>