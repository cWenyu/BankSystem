<?php
session_start();

if(!isset($_SESSION['user_session']))
{
	header("Location: index.php");
}

include_once '../model/database.php';

$stmt = $db->prepare("SELECT card_holder FROM users_accounts WHERE register_number=:register_number");
$stmt->execute(array(":register_number"=>$_SESSION['user_session']));
$row=$stmt->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login Form using jQuery Ajax and PHP MySQL</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="style.css" rel="stylesheet" media="screen">
</head>

<body>
   

<div class="container small-container">
    <h2>Hi '<?php echo $row['card_holder']; ?>' Welcome to the members page.</h2>
    <hr>
    <a href="logout.php" class="btn btn-warning"><i class="fa fa-sign-out" aria-hidden="true"></i> &nbsp;Sign Out</a></li>
</div>

<script src="https://use.fontawesome.com/ee309940e2.js"></script>

</body>
</html>