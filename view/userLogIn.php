<?php include '../view/header.php'; ?>
<?php
session_start();

if (isset($_SESSION['user_session']) != "") {
    header("Location: home.php");
}
?>
<main>
    <h2>User Login</h2>
    <form action="home.php" method="post" id="login-form">
        <label>Register Number:</label>
        <input type="input" placeholder="Register Number" name="register_number" id="register_number"  >
        <br>
        <label>Password: </label>
        <input type="password" placeholder="Register Password" name="password" id="register_password" />
        <br>
        <label>&nbsp;</label>
        <button type="submit" class="btn btn-default" name="btn-login" id="btn-login">
            <i aria-hidden="true"></i> &nbsp; Sign In
        </button> 
        <br> 
    </form>
</main>
<?php include '../view/footer.php'; ?>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://use.fontawesome.com/ee309940e2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="../js/validation.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>