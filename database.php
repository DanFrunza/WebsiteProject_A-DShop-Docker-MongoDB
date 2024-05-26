<?php
try {
    // Inițializează conexiunea cu MongoDB
    $client = new MongoDB\Driver\Manager("mongodb://root:toor@mongo:27017/");
    

} catch (MongoDB\Driver\Exception\Exception $e) {
    echo "Nu s-a putut conecta la serverul MongoDB: " . $e->getMessage();
    exit();
}
?>
