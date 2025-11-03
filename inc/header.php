

<?php
if(!isset($title)) $title='EliteServiceSet';
require_once __DIR__ . '/functions.php';
?>
<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width,initial-scale=1">
<title><?=$title?></title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700&family=Poppins:wght@600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBogGzSgRt+0FQnc1+7lvTg7lkUE7iyjN9z4I8m71Vd9+AX2" crossorigin="anonymous"></script>





<!-- Modern Luxury Theme -->
<link rel="stylesheet" href="assets/css/theme.css">
<script src="assets\js\theme.js"></script>
<script src="assets/js/counters.js"></script>

<style>
  .navbar{
    padding:2px;
    z-index: 1;
    position:sticky;
    top:0px;
    border-bottom:4px solid #a00092;
  }
  .navbar .nav-item{
    padding:15px 10px
  }
  .navbar .nav-item a{
    color:#000;
    font-weight:bold;
    border-bottom:1px dotted #C8A165;
  }
  .navbar .nav-item a:hover{
    color:#fff;
  }


  .navbar .nav-item:hover{
    background-color:#C8A165;
  }
  

  .navbar .dropdown-menu{
    margin-top:-4px;
  }

  .navbar .dropdown-menu > li > .dropdown-item {
    color: #333;
    font-weight:bold;
  
}


.navbar  .dropdown-menu  li .dropdown-item:hover {
    color: #C8A165;
     
}
.dropdown .dropdown-menu{
  background:#C8A165;

}
</style>

</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
  <div class="container">
    <a class="navbar-brand fw-bold" href="index.php">EliteServiceSet</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu"><span class="navbar-toggler-icon"></span></button>
    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>

        <li class="nav-item dropdown">
  <a class="nav-link dropdown-toggle" href="#" id="aboutDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
    About Us
  </a>
  <ul class="dropdown-menu" aria-labelledby="aboutDropdown">
    <li><a class="dropdown-item" href="about.php">« About Our Company</a></li>
    <li><a class="dropdown-item" href="background.php">« Our Company Background</a></li>
    <li><a class="dropdown-item" href="team.php">« Our Team</a></li>
  </ul>
</li>

       
        <li class="nav-item"><a class="nav-link" href="services.php">Our Services</a></li>
        <li class="nav-item"><a class="nav-link" href="projects.php">Projects</a></li>      
        
        <li class="nav-item"><a class="nav-link" href="contact.php">Contact Us</a></li>
       
      </ul>
    </div>
  </div>
</nav>
<main class="py-4">
  <div class="container">
