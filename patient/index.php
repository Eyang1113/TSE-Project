<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/animations.css">  
    <link rel="stylesheet" href="../css/main.css">  

        
    <title>Dashboard</title>
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
            background-color: white;
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
        .header .logo img {
       width: 150px; /* Set the desired size */
       height: 100px; /* Make sure the height matches the width */
       border-radius: 50%; /* Make it circular */
       
        object-fit: cover; /* Ensure the image covers the circle without stretching */
}
    </style>
    
    
</head>
<body>
    <?php


    session_start();

    if(isset($_SESSION["user"])){
        if(($_SESSION["user"])=="" or $_SESSION['usertype']!='p'){
            header("location: ../login.php");
        }else{
            $useremail=$_SESSION["user"];
        }

    }else{
        header("location: ../login.php");
    }
    

    //import database
    include("../connection.php");
    $userrow = $database->query("select * from patient where pemail='$useremail'");
    $userfetch=$userrow->fetch_assoc();
    $userid= $userfetch["pid"];
    $username=$userfetch["pname"];


    //echo $userid;
    //echo $username;
    
    ?>

<div class="header">
        <div class="profile-container">
            <img src="../img/user.png" alt="" width="50px">
            <div>
                <p class="profile-title" ><?php echo substr($username,0,13) ?>..</p>
                <p class="profile-subtitle"><?php echo substr($useremail,0,22) ?></p>
                
            </div>
            <div class="logo">
            <img src="../img/MEGA_logo.png" alt="Logo" width="100px">
            </div>
        </div>
        <div class="header-right">
            <a href="index.php">Home</a>
            <a href="ambulances.php">All Ambulance</a>
            <a href="schedule.php">Scheduled Sessions</a>
            <a href="appointment.php">My Bookings</a>
            <a href="settings.php">Settings</a>
            <a href="../logout.php">Log out</a>
        </div>
    </div>
    <div class="container">
        </div>
        <div class="dash-body" style="margin-top: 15px">
            <table border="0" width="100%" style=" border-spacing: 0;margin:0;padding:0;" >
                        
                        <tr >
                            
                            <td colspan="1" class="nav-bar" >
                            <p style="font-size: 23px;padding-left:12px;font-weight: 600;margin-left:10px;">Home</p>
                          
                            </td>
                            <td width="25%">

                            </td>
                            <td width="15%">
                                <p style="font-size: 14px;color: black;padding: 0;margin: 0;text-align: right;">
                                    Today's Date
                                </p>
                                <p class="heading-sub12" style="padding: 0;margin: 0;">
                                    <?php 
                                date_default_timezone_set('Asia/Kolkata');
        
                                $today = date('Y-m-d');
                                echo $today;


                                $patientrow = $database->query("select  * from  patient;");
                                $ambulancerow = $database->query("select  * from  ambulance;");
                                $appointmentrow = $database->query("select  * from  appointment where appodate>='$today';");
                                $schedulerow = $database->query("select  * from  schedule where scheduledate='$today';");


                                ?>
                                </p>
                            </td>
                            <td width="10%">
                                <button  class="btn-label"  style="display: flex;justify-content: center;align-items: center;"><img src="../img/calendar.svg" width="100%"></button>
                            </td>
        
        
                        </tr>
                <tr>
                    <td colspan="4" >
                       
                    
                            
                            <h3 style="font-size: 23px;padding-left:12px;font-weight: 600;margin-left:10px;">Channel a Ambulance Here</h3>
                            <form action="schedule.php" method="post" style="display: flex">

                                <input type="search" name="search" class="input-text " placeholder="Search Ambulance and We will Find The Session Available" list="ambulances" style="margin-left:10px;">&nbsp;&nbsp;
                                
                                <?php
                                    echo '<datalist id="ambulances">';
                                    $list11 = $database->query("select  ambname,ambemail from  ambulance;");
    
                                    for ($y=0;$y<$list11->num_rows;$y++){
                                        $row00=$list11->fetch_assoc();
                                        $d=$row00["ambname"];
                                        
                                        echo "<option value='$d'><br/>";
                                        
                                    };
    
                                echo ' </datalist>';
    ?>
                                
                           
                                <input type="Submit" value="Search" class="login-btn btn-primary btn" style="padding-left: 25px;padding-right: 25px;padding-top: 10px;padding-bottom: 10px;">
                            
                            
                    
                </td>
                </tr>
                <tr>
                    <td colspan="4">
                        <table border="0" width="100%"">
                            <tr>
                                <td width="50%">

                                    




                                    <center>
                                        <table class="filter-container" style="border: none;" border="0">
                                            <tr>
                                                <td colspan="4">
                                                    <p style="font-size: 20px;font-weight:600;padding-left: 12px;">Status</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 25%;">
                                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex">
                                                        <div>
                                                                <div class="h1-dashboard">
                                                                    <?php    echo $ambulancerow->num_rows  ?>
                                                                </div><br>
                                                                <div class="h3-dashboard">
                                                                    All Ambulance &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                </div>
                                                        </div>
                                                                <div class="btn-icon-back dashboard-icons" style="background-image: url('../img/icons/ambulances-hover.svg');"></div>
                                                    </div>
                                                </td>
                                               
                                                </tr>
                        

                                                <td style="width: 25%;">
                                                    <div  class="dashboard-items"  style="padding:20px;margin:auto;width:95%;display: flex;padding-top:21px;padding-bottom:21px;">
                                                        <div>
                                                                <div class="h1-dashboard">
                                                                    <?php    echo $schedulerow ->num_rows  ?>
                                                                </div><br>
                                                                <div class="h3-dashboard" style="font-size: 15px">
                                                                    Today Sessions &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                                </div>
                                                        </div>
                                                                <div class="btn-icon-back dashboard-icons" style="background-image: url('../img/icons/session-iceblue.svg');"></div>
                                                    </div>
                                                </td>
                                                
                                            </tr>
                                        </table>
                                    </center>








                                </td>
                                
                            </tr>
                        </table>
                    </td>
                <tr>
            </table>
        </div>
    </div>
    <td>


                            
<p style="font-size: 20px;font-weight:600;padding-left: 40px;" class="anime">Your Upcoming Booking</p>
<center>
    <div class="abc scroll" style="height: 500px;padding: 0;margin: 0;">
    <table width="80%" class="sub-table scrolldown" border="0" >
    <thead>
        
    <tr>
    <th class="table-headin">
                
            
                Appoint. Number
                
                </th>
            <th class="table-headin">
                
            
            Session Title
            
            </th>
            
            <th class="table-headin">
                Ambulance
            </th>
            <th class="table-headin">
                
                Sheduled Date & Time
                
            </th>
                
            </tr>
    </thead>
    <tbody>
    
        <?php
        $nextweek=date("Y-m-d",strtotime("+1 week"));
            $sqlmain= "select * from schedule inner join appointment on schedule.scheduleid=appointment.scheduleid inner join patient on patient.pid=appointment.pid inner join ambulance on schedule.ambid=ambulance.ambid  where  patient.pid=$userid  and schedule.scheduledate>='$today' order by schedule.scheduledate asc";
            //echo $sqlmain;
            $result= $database->query($sqlmain);

            if($result->num_rows==0){
                echo '<tr>
                <td colspan="4">
                <br><br><br><br>
                <center>
                <img src="../img/OIP.png" width="30%">
                
                <br>
                <p class="heading-main12" style="margin-left: 45px;font-size:20px;color:rgb(49, 49, 49)">Nothing to show here!</p>
                <a class="non-style-link" href="schedule.php"><button  class="login-btn btn-primary-soft btn"  style="display: flex;justify-content: center;align-items: center;margin-left:20px;">&nbsp; Channel a Ambulance &nbsp;</font></button>
                </a>
                </center>
                <br><br><br><br>
                </td>
                </tr>';
                
            }
            else{
            for ( $x=0; $x<$result->num_rows;$x++){
                $row=$result->fetch_assoc();
                $scheduleid=$row["scheduleid"];
                $title=$row["title"];
                $apponum=$row["apponum"];
                $ambname=$row["ambname"];
                $scheduledate=$row["scheduledate"];
                $scheduletime=$row["scheduletime"];
               
                echo '<tr>
                    <td style="padding:30px;font-size:25px;font-weight:700;"> &nbsp;'.
                    $apponum
                    .'</td>
                    <td style="padding:20px;"> &nbsp;'.
                    substr($title,0,30)
                    .'</td>
                    <td>
                    '.substr($ambname,0,20).'
                    </td>
                    <td style="text-align:center;">
                        '.substr($scheduledate,0,10).' '.substr($scheduletime,0,5).'
                    </td>


                   
                </tr>';
                
            }
        }
             
        ?>

        </tbody>

    </table>
    </div>
    </center>



</body>
</html>