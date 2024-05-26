<?php

include("database.php");
session_start();


?>


<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>A&DShop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Css/style.css">
    
</head>
<?php 
    include("header1.php"); 
?>
<body>
    
    <section class="category">
        <figure>
          <a href="electronics.php">
          <img src="Images/Electronice.jpg" alt="Electronics">
          <figcaption>Electronics</figcaption>
          </a>
        </figure>
        <figure>
          <a href="appliances.php">
          <img src="Images/electrocasnice.jpg" alt="Appliances">
          <figcaption>Appliances</figcaption>
          </a>
        </figure>
        <figure>
          <a href="office_supplies.php">
          <img src="Images/papetarie.jpg" alt="Office supplies">
          <figcaption>Office supplies</figcaption>
          </a>
        </figure>
    </section>


    
    <section class="Description">
      <p>
        <button class="btn btn-FFFFFF text-white" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
          Despre noi
        </button>
      </p>
      <div style="min-height: 100px;">
        <div class="collapse collapse-vertically" id="collapseWidthExample">
          <div class="card card-body bg-transparent border-0 text-white" style="width: 1000px;">
          Bine ați venit la A&DShop - destinația ta completă pentru experiența perfectă de cumpărături online! La A&DShop, transformăm plăcerea cumpărăturilor într-o aventură captivantă și convenabilă. Ne-am angajat să aducem o colecție vastă și diversă de produse într-un singur loc, pentru a oferi clienților noștri o experiență de cumpărături fără probleme, plină de diversitate și calitate. Ceea ce ne diferențiază este accesul ușor și rapid la sute de mii de produse de la diverse branduri, toate disponibile la doar câteva click-uri distanță. De la modă, accesorii și produse electronice la articole pentru casă, sănătate și frumusețe, avem tot ce îți dorești și mai mult!

Navigarea intuitivă a site-ului nostru facilitează căutarea și găsirea produselor dorite. Fie că ești în căutarea ultimelor tendințe fashion, a gadgeturilor tehnologice sau a articolelor esențiale pentru casă, găsești totul într-un mod simplu și eficient. Avem grijă de fiecare etapă a procesului de cumpărături. De la interfața prietenoasă și ușor de navigat până la sistemul nostru de plată securizat și livrare rapidă, fiecare detaliu este conceput pentru a-ți oferi o experiență excepțională.

A&DShop nu este doar un magazin online, ci o comunitate care aduce oamenii împreună pentru a găsi cele mai bune produse și oferte. Recenziile și evaluările clienților sunt esențiale pentru noi și contribuie la calitatea și selecția noastră de produse. Suntem aici pentru a transforma cumpărăturile tale într-o experiență plăcută și relaxantă. Ești pregătit să descoperi o nouă modalitate de a te bucura de cumpărături online? Alătură-te nouă la A&DShop și explorează lumea plină de posibilități!
          </div>
        </div>
      </div>
    </section>
    <section class="Media">
      <ul>
        <li class="media-container">
          <iframe class="media-item" width="420" height="315"
            src="https://www.youtube.com/embed/zx2UL5pXUow">
          </iframe>
        </li>
        <li class="media-container">
          <video class="media-item" width="420" height="315" controls muted>
             <source src="Video/VideoShopping.mp4" type="video/mp4">
          </video>
        </li>
        <li class="media-container">
          <iframe class="media-item" width="420" height="315"
            src="https://www.youtube.com/embed/watch?v=5rlZ9p6z270&list=PLRl7dddF_ZTHqQKraj2qdC9Zqi3phIDWK" type="video/mp4">

          </iframe>
        </li>
        
      </ul>
    </section>
    <section class="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9122.72182428427!2d27.57773505381999!3d47.17349273371008!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40cafb61af5ef507%3A0x95f1e37c73c23e74!2sAlexandru%20Ioan%20Cuza%20University!5e0!3m2!1sen!2sro!4v1700142560953!5m2!1sen!2sro" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </section>
    
    <?php 
    include("footer.php"); 
    ?>
    
</body>
</html>