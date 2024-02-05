<?php
session_start();

$user = ["username" => "    "];

if (isset($_SESSION["user_id"])) {
  $mysqli = require __DIR__ . "/database.php";

  $sql = "SELECT * FROM tb_login
            WHERE id = {$_SESSION["user_id"]}";

  $result = $mysqli->query($sql);

  $user = $result->fetch_assoc();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pergudangan</title>
  <style>
    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
      font-family: 'Poppins', sans-serif;
    }

    body {
      min-height: 100vh;
      background-image: linear-gradient(to left,
          rgba(0, 0, 0, 0.3),
          rgba(0, 0, 0, 0.3)),
        url(tree-838667_1280.jpg);
      background-size: cover;
      background-position: center;
    }

    .header {
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      padding: 1.3rem 10%;
      display: flex;
      align-items: center;
      justify-content: space-between;
      z-index: 100;
    }

    .header::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(225, 225, 225, .15);
      backdrop-filter: blur(50px);
      -webkit-backdrop-filter: blur(50px);
      z-index: -1;
    }

    span {
      color: rgba(0, 99, 219, 1);
    }

    .name {
      font-size: 2.5rem;
      color: white;
      text-decoration: none;
      font-weight: 520;
      display: flex;
      align-items: center;
    }

    .name img {
      width: 60px;
      height: auto;
      margin-right: 5px;
    }




    .navbar a {
      font-size: 1.15rem;
      color: white;
      text-decoration: none;
      font-weight: 500;
      margin-left: 2.5rem;
      transition: 0.5s ease;
    }

    .navbar a:hover {
      color: rgba(0, 99, 219, 1);
      padding-right: 10px;
    }

    #check {
      display: none;
    }

    .menu {
      position: absolute;
      right: 5%;
      color: white;
      font-size: 2rem;
      cursor: pointer;
      display: none;
    }

    @media (max-width: 992px) {
      .header {
        padding: 1.3rem 5%;
      }
    }

    @media (max-width: 760px) {
      .menu {
        display: inline-flex;
      }

      #check:checked~.menu #icon-menu {
        display: none;
      }

      .menu #close-menu {
        display: none;
      }

      #check:checked~.menu #close-menu {
        display: block;
      }

      .navbar {
        top: 100%;
        left: 0;
        width: 100%;
        height: 0;
        background: rgba(225, 225, 225, .15);
        backdrop-filter: blur(50px);
        -webkit-backdrop-filter: blur(50px);
        overflow: hidden;
        transition: .2s ease;
      }

      #check:checked~.navbar {
        height: 17.7rem;
      }

      .navbar a {
        display: block;
        font-size: 1rem;
        margin: 1.5rem 0;
        text-align: center;
        transform: translateY(-50px);
        transition: .2s ease;
      }

      #check:checked~.navbar a {
        transform: translateY(0);
      }
    }

    .container {
      background-color: rgba(0, 0, 0, 0.7);
      border-radius: 5px;
      padding: auto;
      margin: auto;
      width: auto;
      color: white;
    }

    .container::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.3);
      z-index: -1;
    }


    /* .container h2,
    .container h3 {
      background-color: white;
      border-radius: 5px;
      padding: auto;
      margin: auto;
      width: auto;
    }

    .section {
      background-color: #fff;
      border-radius: 5px;
      padding: 20px;
      margin: 10px;
      width: 300px;
    } */


    .container2 {
      background-color: rgba(0, 0, 0, 0.7);
      border-radius: 5px;
      padding: 20px;
      margin: 20px auto;
      width: 80%;
      color: white;
      position: relative;
    }

    .container2::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.3);
      z-index: -1;
    }

    .section {
      background-color: #333;
      border-radius: 5px;
      padding: 20px;
      margin-bottom: 20px;
    }

    .section h3 {
      color: #fff;
      margin-bottom: 10px;
    }

    .section p {
      color: #ccc;
      line-height: 1.6;
    }
  </style>
</head>

<body>
  <header class="header">
    <div class="logo-container">
      <a href="#" class="name"><img src="foto2/dimana-saja-logo-transparent.png" alt="">Wayaw<span> We</span></a>
    </div>

    <input type="checkbox" id="check">

    <label for="check" class="menu">
      <i class='bxbx-menu' id="icon-menu"></i>
      <i class='bx bx-x' id="close-menu"></i>
    </label>

    <nav class="navbar">
      <a href="index.php">Home</a>
      <?php if (!isset($_SESSION["user_id"])) : ?>
        <a href="login-regist.php">Login/Register</a>
      <?php else : ?>
        <a href="logout.php">Log out</a>
      <?php endif; ?>
      <a href="CS.php">Costumer Service</a>
    </nav>
  </header>
  <br><br><br><br><br><br>

  <div class="container">
    <h2>Halo <?= htmlspecialchars($user["username"] . ",") ?> Selamat datang di halaman utama</h2>




</body>

</html>