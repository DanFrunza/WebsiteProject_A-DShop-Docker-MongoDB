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
    <h1 class="admin-title">Admin page</h1>
    <h2 class="admin-title">Inserarea si stergerea produselor</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    Daca doriti sa modificati adaugati id-ul produsului. Daca doriti sa adaugati un produs nou, lasati campul id-ului gol:<br>
    <input type="text" name="id_produs" id="id_produs"><br>
    Numele produsului:<br>
    <input type="text" name="nume_produs" id="nume_produs"><br>
    Descrierea produsului:<br>
    <input type="text" name="descriere_produs" id="descriere_produs"><br>
    Selectează imaginea pentru încărcare a produsului:<br>
    <input type="file" name="imagine_produs" id="imagine_produs"><br>
    Pretul produsului:<br>
    <input type="text" name="pret_produs" id="pret_produs"><br>
    Categorie: <br>
    <select id="categorie_produs" name="categorie_produs">
        <option value="electronics">Electronics</option>
        <option value="appliances">Appliances</option>
        <option value="office_supplies">Office Supplies</option>
    </select><br>
    <input type="submit" value="Inserare/modificare produs" name="submit">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_produs = isset($_POST['id_produs']) ? $_POST['id_produs'] : null;
    $nume = filter_input(INPUT_POST, "nume_produs", FILTER_SANITIZE_SPECIAL_CHARS);
    $descriere = filter_input(INPUT_POST, "descriere_produs", FILTER_SANITIZE_SPECIAL_CHARS);
    $imagine = isset($_FILES['imagine_produs']['tmp_name']) && !empty($_FILES['imagine_produs']['tmp_name']) ? file_get_contents($_FILES['imagine_produs']['tmp_name']) : null;
    $pret = filter_input(INPUT_POST, "pret_produs", FILTER_VALIDATE_FLOAT);
    $categorie = filter_input(INPUT_POST, "categorie_produs", FILTER_SANITIZE_SPECIAL_CHARS);

    if (!empty($id_produs)) {
        // Caută produsul în MongoDB folosind id-ul
        $query = new MongoDB\Driver\Query(['_id' => new MongoDB\BSON\ObjectId($id_produs)]);
        $rows = $client->executeQuery("database1.produse", $query);
        $produs = current($rows->toArray());
    
        if ($produs) {
            $bulk = new MongoDB\Driver\BulkWrite();
    
            if (!empty($nume) && $nume !== $produs->nume) {
                $bulk->update(['_id' => new MongoDB\BSON\ObjectId($id_produs)], ['$set' => ['nume' => $nume]]);
            }
            if (!empty($descriere) && $descriere !== $produs->descriere) {
                $bulk->update(['_id' => new MongoDB\BSON\ObjectId($id_produs)], ['$set' => ['descriere' => $descriere]]);
            }
            if (!empty($pret) && $pret !== $produs->pret) {
                $bulk->update(['_id' => new MongoDB\BSON\ObjectId($id_produs)], ['$set' => ['pret' => $pret]]);
            }
            if (!empty($imagine)) {
                $bulk->update(['_id' => new MongoDB\BSON\ObjectId($id_produs)], ['$set' => ['imagine' => new MongoDB\BSON\Binary($imagine, MongoDB\BSON\Binary::TYPE_GENERIC)]]);
            }
            if (!empty($categorie) && $categorie !== $produs->categorie) {
                $bulk->update(['_id' => new MongoDB\BSON\ObjectId($id_produs)], ['$set' => ['categorie' => $categorie]]);
            }

            $client->executeBulkWrite("database1.produse", $bulk);
            echo "<p>Produs modificat cu succes.</p>";

        } else {
            echo "<p class='error-message'>Id invalid.</p>";
        }
    } else {
        // Inserează un nou produs în MongoDB
        if (!empty($nume) && !empty($imagine) && !empty($pret)) {
            $bulk = new MongoDB\Driver\BulkWrite();
            $insertData = [
                'nume' => $nume,
                'descriere' => $descriere,
                'imagine' => new MongoDB\BSON\Binary($imagine, MongoDB\BSON\Binary::TYPE_GENERIC),
                'pret' => $pret,
                'categorie' => $categorie
            ];
            $bulk->insert($insertData);
            $client->executeBulkWrite("database1.produse", $bulk);
            echo "<p>Produs adăugat cu succes.</p>";
        } else {
            echo "<p class='error-message'>Nume, imagine și preț sunt necesare pentru a adăuga sau modifica un produs.</p>";
        }
    }
}
?>


    <br><br><br><br>
    <h2 class="admin-title">Stergere produs</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    Daca doriti sa stergeti un produs, adaugatii id-ul:<br>
    <input type="text" name="id_produs1" id="id_produs1"><br>
    <input type="submit" value="Stergere produs" name="submit">
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_produs1 = isset($_POST['id_produs1']) ? trim($_POST['id_produs1']) : null; 
        if (!empty($id_produs1)) {
            $bulk = new MongoDB\Driver\BulkWrite();
            $bulk->delete(['_id' => new MongoDB\BSON\ObjectId($id_produs1)]);
            $result = $client->executeBulkWrite('database1.produse', $bulk);

            if ($result->getDeletedCount() > 0) {
                echo "Produs șters cu succes.";
            } else {
                echo "Produsul nu a putut fi șters pentru că nu există în baza de date.";
            }
        } else {
            echo "ID-ul produsului este gol.";
        }
    }
    ?>
    <br><br><br>

<h2 class="admin-title">Stergere utilizator</h2>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
Daca doriti sa stergeti un utilizator, adaugatii id-ul:<br>
<input type="text" name="id_utilizator" id="id_utilizator"><br>
<input type="submit" value="Stergere utilizator" name="delete_user">
</form>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete_user'])) {
    $id_utilizator = isset($_POST['id_utilizator']) ? trim($_POST['id_utilizator']) : null; 
    if (!empty($id_utilizator)) {
        $bulk = new MongoDB\Driver\BulkWrite();
        $bulk->delete(['_id' => new MongoDB\BSON\ObjectId($id_utilizator)]);
        $result = $client->executeBulkWrite('database1.users', $bulk);

        if ($result->getDeletedCount() > 0) {
            echo "Utilizator șters cu succes.";
        } else {
            echo "Utilizatorul nu a putut fi șters pentru că nu există în baza de date.";
        }
    } else {
        echo "ID-ul utilizatorului este gol.";
    }
}
?>
<br><br><br>

</body>
</html>
