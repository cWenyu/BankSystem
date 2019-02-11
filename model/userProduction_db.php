<?php

function get_products() {
    global $db;
    $query = 'SELECT * FROM finacial_products
              ORDER BY product_code';
    $statement = $db->prepare($query);
    $statement->execute();
    return $statement;
}

function delete_product($productCode) {
    global $db;
    $query = 'DELETE FROM finacial_products
              WHERE product_code = :productCode';
    $statement = $db->prepare($query);
    $statement->bindValue(':productCode', $productCode);
    $statement->execute();
    $statement->closeCursor();
}

function add_product($productName, $productDescription, $productPrice) {
    global $db;
    $query = 'INSERT INTO finacial_products
                 (product_name, product_descriptione, product_price)
              VALUES
                 (:productName, :productDescription, :productPrice)';
    $statement = $db->prepare($query);
    $statement->bindValue(':productName', $productName);
    $statement->bindValue(':productDescription', $productDescription);
    $statement->bindValue(':productPrice', $productPrice);
    $statement->execute();
    $statement->closeCursor();
}

function update_product_description($productCode, $productDescription) {
    global $db;
    $query = 'UPDATE finacial_products
              SET product_description = :productDescription
               WHERE product_code = :productCode';
    $statement = $db->prepare($query);
    $statement->bindValue(':productDescription', $productDescription);
    $statement->bindValue(':productCode', $productCode);
    $statement->execute();
    $statement->closeCursor();
}

?>