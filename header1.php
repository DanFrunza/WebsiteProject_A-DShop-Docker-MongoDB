<?php
include("database.php");
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';
$isAdmin = $username === "admin"; 

if (isset($_COOKIE['remember_username']) && empty($username)) {
    $remembered_username = $_COOKIE['remember_username'];

    if ($remembered_username === "admin") {
        $isAdmin = true;
    }

    $username = $remembered_username;
    $_SESSION['username'] = $username; 
}

echo "<script>var username = '$username';</script>";
?>
<head>
<script src="Scripts/StareLogin.js?v=1"></script>

</head>
<header>
  
<link rel="stylesheet" href="Css/style.css">

<nav class="navbar navbar-expand-lg navbar-light #0000ffff">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">
    <ul>
                <li class="logo">Logo</li>
                <li class="navTitle">A&DShop</li>
                
            </ul>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Pagina principala</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="contact.php">Contact</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="Canvas.php">Canvas page</a>
        </li>
        <li class="nav-item" id="stare-logare">
          <a class="nav-link" href="login.php">Login/Sign in</a>
        </li>
        <?php
        if ($isAdmin) {
            echo '<li class="nav-item"><a class="nav-link" href="pagina-admin.php">Pagina Admin</a></li>';
        }
        ?>
      </ul>
      <span class="navbar-item">
              <audio controls muted >
                Sunet autentic de supermarket
                <source src="Video/supermarket-17142.mp3" type="audio/ogg">
              </audio>
    </span>
    </div>
  </div>
</nav>
    
</header>