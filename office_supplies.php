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
    <?php
    // Definirea filtrului pentru a selecta produsele din categoria Office Supplies
    $filter = ['categorie' => 'office_supplies'];
    $options = [];
    $query = new MongoDB\Driver\Query($filter, $options);

    // Executarea interogării și afișarea produselor
    $cursor = $client->executeQuery('database1.produse', $query);
    
    $products = $cursor->toArray();

    if (empty($products)) {
        echo "<p>Nu există produse în categoria Office Supplies.</p>";
    } else {
        echo "<section class='category'>";

        foreach ($products as $document) {
            echo "<figure>";
            echo "<a href='detalii_produs.php?id=" . $document->_id . "'>";
            echo "<img src='data:image/jpeg;base64," . base64_encode($document->imagine->getData()) . "' alt='" . $document->nume . "'>";
            echo "<figcaption>" . $document->nume . "</figcaption>";
            echo "<p>" . $document->descriere . "</p>";
            echo "<p>Pret: $" . $document->pret . "</p>";
            echo "<p>Id: " . $document->_id . "</p> </a>";
            echo "</figure>";
        }

        echo "</section>";
    }
    ?>
    </section>
</body>
</html>
