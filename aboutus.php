<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>About Us - MEGA Ambulance</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

        *{  
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        body {
            background: url("img/ambulance2.jpg") no-repeat center center fixed;
            background-size: cover;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 110vh;
            background: rgba(39, 39, 39, 0.4);
            flex-direction: column;
        }
        .nav {
            position: fixed;
            top: 0;
            display: flex;
            justify-content: space-around;
            width: 100%;
            height: 100px;
            line-height: 100px;
            background: linear-gradient(rgba(39,39,39, 0.6), transparent);
            z-index: 100;
        }
        .nav-logo p {
            color: white;
            font-size: 25px;
            font-weight: 600;
        }
        .nav-menu ul {
            display: flex;
        }
        .nav-menu ul li {
            list-style-type: none;
        }
        .nav-menu ul li .link {
            text-decoration: none;
            font-weight: 500;
            color: #fff;
            padding-bottom: 15px;
            margin: 0 100px;
        }
        .link:hover, .active {
            border-bottom: 2px solid #fff;
        }
        .about-content {
            text-align: center;
            color: #fff;
            padding: 20px;
        }
        .about-content h1 {
            margin-bottom: 20px;
        }
        .about-images {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }
        .about-images img {
            width: 300px;
            height: 200px;
            border-radius: 10px;
            transition: transform 0.5s ease-in-out;
        }
        .about-images img:hover {
            transform: scale(1.1);
        }
        @media only screen and (max-width: 786px) {
            .nav-menu-btn {
                display: block;
            }
            .nav-menu-btn i {
                font-size: 25px;
                color: #fff;
                padding: 10px;
                background: rgba(255, 255, 255, 0.2);
                border-radius: 50%;
                cursor: pointer;
                transition: .3s;
            }
            .nav-menu-btn i:hover {
                background: rgba(255, 255, 255, 0.15);
            }
            .nav-menu {
                position: absolute;
                top: -800px;
                display: flex;
                justify-content: center;
                background: rgba(255, 255, 255, 0.2);
                width: 100%;
                height: 90vh;
                backdrop-filter: blur(20px);
                transition: .3s;
            }
            .nav-menu ul {
                flex-direction: column;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <nav class="nav">
            <div class="nav-logo">
                <p>MEGA Ambulance</p>
            </div>
            <div class="nav-menu" id="navMenu">
                <ul>
                    <li><a href="login.php" class="link">Ambulance Appointment (24 Hours Services)</a></li>
                    <li><a href="aboutus.php" class="link active">About Us</a></li>
                </ul>
            </div>
        </nav>
        <div class="about-content">
            <h1>About Us</h1>
            <p>
                MEGA Ambulance is dedicated to providing top-notch ambulance services around the clock. 
            </p>
            <p>Our team of skilled professionals is committed to ensuring the safety and well-being of our patients during medical emergencies.We pride ourselves on our prompt response times, advanced medical equipment, and compassionate care.
      </p>
            <div class="about-images">
                <img src="img/about.jpg" alt="Ambulance Service">
                <img src="img/about.webp" alt="Emergency Team">
                <img src="img/about2.webp" alt="Medical Equipment">
            </div>

        </div>
    </div>
</body>
</html>
