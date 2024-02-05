<?php
  session_start();
  include_once('./config/function.php');
  $objCon = connectDB("website");

  function getCount($objCon, $table)
  {
      $sql = "SELECT COUNT(*) AS total FROM $table";
      $result = $objCon->query($sql);

      if ($result && $result->num_rows > 0) {
          $row = $result->fetch_assoc();
          return $row["total"];
      } else {
          return 0;
      }
  }

  $totalMember = getCount($objCon, "member");
  $totalStock = getCount($objCon, "stock");
  $totalBuyMember = getCount($objCon, "buy_member");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/styles.css"/>
    <title>Welcome To LXD Developer</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico"/>
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Alert sweetalert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        section {
            display: flex;
            justify-content:center;
        }

        section div {
            text-align: center;
            margin: 89px; /* ปรับระยะห่าง */
        }

        section i {
            margin-bottom: 5px; /* ปรับระยะห่างระหว่างไอคอนและข้อความ */
            display: inline-block;
        }

        section h4 {
            color: #DEDEDE;
            margin-top: 5px; /* ปรับระยะห่างระหว่างข้อความและข้อมูล */
        }
        

        /* เพิ่มคลาส fa-2xl สำหรับขนาดใหญ่ */
        section i.fa-2xl {
            font-size: 48px;
        }
    </style>
</head>
<body>
    <nav>
      <span class="logo-text">
        <img src="./assets/logo.png" height="96" alt="Livernier-LOGO">
      </span>
        <div class="hamburger">
            <div class="line1"></div>
            <div class="line2"></div>
            <div class="line3"></div>
        </div>
        <ul class="nav-links">
            <li><a href="index">Home</a></li>
            <li><a href="shop">Stock</a></li>
            <li><a href="dosc">Doscment</a></li>
            <li><a href="contact">About us</a></li>
            <?php
            if (isset($_SESSION['user_login'])) {
                // ถ้าผู้ใช้ล็อกอินอยู่
                echo '<li><a href="profile">digishop</a></li>';
                echo '<li><a href="./action/logout_action">Log out</a></li>';
              } else {
                // ถ้าผู้ใช้ยังไม่ล็อกอิน
                echo '<li><a href="register">register</a></li>';
                echo '<li><a href="login">log in</a></li>';
            }
            ?>
        </ul>
    </nav>
  <div class="header">
  <div class="inner-header flex">
  <h1 class="uppercase">Welcome To </h1>
  <br>
    <img src="assets/logo_dev_nobg.png" height="400" alt="Livernier-LOGO" />
  </div>
  <div>
  <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
  viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
  <defs>
  <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
  </defs>
  <g class="parallax">
  <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7)" />
  <use xlink:href="#gentle-wave" x="48" y="3" fill="#67D5DA" />
  <use xlink:href="#gentle-wave" x="48" y="5" fill="#3B3A3A" />
  <use xlink:href="#gentle-wave" x="48" y="7" fill="#67D5DA" />
  </g>
  </svg>
  </div>
</div>
    <section>
        <div>
            <i class="fa-regular fa-folder fa-2xl"></i>
            <p><?php echo $totalStock; ?></p>
            <h4>Product</h4>
        </div>
        <div>
            <i class="fa-solid fa-user fa-2xl"></i>
            <p><?php echo $totalMember; ?></p>
            <h4>Member</h4>
        </div>
        <div>
            <i class="fa-regular fa-folder-open fa-2xl"></i>
            <p><?php echo $totalBuyMember; ?></p>
            <h4>Buy</h4>
        </div>
    </section>
<!-- Footer-->
<footer class="bg-primary text-center" id="contact">
  <div class="container px-4 px-lg-5">
    <div class="section">
      <div class="wojo-grid">
        <div class="row align-center"></div>
      </div>
    </div>
  </div>
</footer>
<!-- Copyright Section-->
<div class="copyright py-4 text-center text-white">
  <div class="container"><small>Copyright &copy; ALL Rights Reserved by
    <a href="https://livernier-developer.web.app/">CFX.Livernier-Developer</a>
  </small></div>
  <!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
</div>
  <script src="js/alert.js"></script>
</body>
</html>
