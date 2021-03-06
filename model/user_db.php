<?php

function new_register_user($registerPassword, $cardNumber, $cardHolder, $balance) {
    global $db;
    $query = 'INSERT INTO users_accounts
                 (register_password,card_number,card_holder,balance)
              VALUES
                 (:registerPassword,:cardNumber,:cardHolder,:balance)';
    $statement = $db->prepare($query);
    $statement->bindValue(':registerPassword', $registerPassword);
    $statement->bindValue(':cardHolder', $cardHolder);
    $statement->bindValue(':cardNumber', $cardNumber);
    $statement->bindValue(':balance', $balance);
    $statement->execute();
    $statement->closeCursor();
}

function delete_register($registerNumber, $registerPassword) {
    global $db;
    $query = 'DELETE FROM users_accounts
              WHERE register_number = :registerNumber
              and register_password = :registerPassword';
    $statement = $db->prepare($query);
    $statement->bindValue(':registerNumber', $registerNumber);
    $statement->bindValue(':registerPassword', $registerPassword);
    $statement->execute();
    $statement->closeCursor();
}

function register_number($registerPassword, $cardNumber, $cardHolder, $balance) {
    global $db;
    $query = 'SELECT register_number FROM users_accounts
                 WHERE register_password = :registerPassword
                 AND card_number = :cardNumber
                 AND card_holder = :cardHolder
                 AND balance = :balance';
    $statement = $db->prepare($query);
    $statement->bindValue(':registerPassword', $registerPassword);
    $statement->bindValue(':cardHolder', $cardHolder);
    $statement->bindValue(':cardNumber', $cardNumber);
    $statement->bindValue(':balance', $balance);
    $statement->execute();
    $registerNumber = $statement->fetch()[0];
    $statement->closeCursor();
    return $registerNumber;
}

function get_card_holder($registerNumber, $registerPassword) {
    global $db;
    $query = 'SELECT card_holder FROM users_accounts
              WHERE register_number = :registerNumber
              AND register_password = :registerPassword';
    $statement = $db->prepare($query);
    $statement->bindValue(':registerNumber', $registerNumber);
    $statement->bindValue(':registerPassword', $registerPassword);
    $statement->execute();
    $userNameA = $statement->fetch()[0];
    $statement->closeCursor();
    return $userNameA;
}

function buy_product($registerNumber, $cardHolder, $productCode, $productName, $quantity) {
    global $db;
    $query = 'INSERT INTO users_production
                 (register_number,card_holder,product_code,product_name,quantity)
              VALUES
                 (:registerNumber,:cardHolder,:productCode,:productName,:quantity)';
    $statement = $db->prepare($query);
    $statement->bindValue(':registerNumber', $registerNumber);
    $statement->bindValue(':cardHolder', $cardHolder);
    $statement->bindValue(':productCode', $productCode);
    $statement->bindValue(':productName', $productName);
    $statement->bindValue(':quantity', $quantity);
    $statement->execute();
    $statement->closeCursor();
}

function buy_product_change_balance($registerNumber, $cost) {
    global $db;
    $query = 'UPDATE users_accounts
              SET balance = (balance - :cost)
               WHERE register_number = :registerNumber';
    $statement = $db->prepare($query);
    $statement->bindValue(':registerNumber', $registerNumber);
    $statement->bindValue(':cost', $cost);
    $statement->execute();
    $statement->closeCursor();
}

function user_production($registerNumber) {
    global $db;
    $query = 'SELECT * FROM users_production
              WHERE register_number = :registerNumber';
    $statement = $db->prepare($query);
    $statement->bindValue(':registerNumber', $registerNumber);
    $statement->execute();
    $userProducrs = $statement->fetchAll();
    $statement->closeCursor();
    return $userProducrs;
}

?>