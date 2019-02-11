<?php

function user_login($registerNumber, $registerPassword) {
    global $db;
    $query = 'SELECT register_number,card_holder as users,balance
              FROM users_account
              where register_number =:registerNumber
              and register_password =:registerPassword';
    $statement = $db->prepare($query);
    $statement->bindValue(':registerNumber', $registerNumber);
    $statement->bindValue(':registerPassword', $registerPassword);
    $statement->execute();
}

function new_register_user($cardNumber, $cardHolder, $balance, $registerPassword) {
    global $db;
    $query = 'INSERT INTO users_account
                 (card_number, card_holder, balance,register_password)
              VALUES
                 (:cardNumber, :cardHolder, :balance,:registerPassword)';
    $statement = $db->prepare($query);
    $statement->bindValue(':cardNumber', $cardNumber);
    $statement->bindValue(':cardHolder', $cardHolder);
    $statement->bindValue(':balance', $balance);    
    $statement->bindValue(':registerPassword', $registerPassword);
}

?>