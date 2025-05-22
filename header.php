<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css"> <!-- Include your CSS file -->
</head>

<body>
    <?php
    session_start();

    if (isset($_SESSION["user"])) {
        if (($_SESSION["user"]) == "" or $_SESSION['usertype'] != 'p') {
            header("location: ../login.php");
        } else {
            $useremail = $_SESSION["user"];
        }
    } else {
        header("location: ../login.php");
    }

    // import database
    include("../connection.php");
    $userrow = $database->query("select * from patient where pemail='$useremail'");
    $userfetch = $userrow->fetch_assoc();
    $userid = $userfetch["pid"];
    $username = $userfetch["pname"];
    ?>

    <div class="header">
        <div class="logo">
            <h1>Dashboard</h1>
        </div>
        <div class="user-profile">
            <img src="../img/user.png" alt="User Profile Picture">
            <div class="profile-info">
                <p><?php echo substr($username, 0, 13) ?>..</p>
                <p><?php echo substr($useremail, 0, 22) ?></p>
            </div>
            <a href="../logout.php" class="logout-btn">Log out</a>
        </div>
    </div>
</body>

</html>