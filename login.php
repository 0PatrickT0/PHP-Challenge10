<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION['login'] = trim($_POST['username']);
    header('location: index.php');
}
?>

<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
<!DOCTYPE html>
<html lang="fr">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bibliothèque</title>

    <!-- Bootstrap Core CSS -->
    <!--    <link href="css/bootstrap.min.css" rel="stylesheet">-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link href="style.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <!--    Support paging via http://www.tutorialspoint.com/php/mysql_paging_php.htm-->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="/index.php" class="navbar-brand">Bibliothèque</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?php
                if (empty($_SESSION['login'])) {
                ?>
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="/login.php">Login</a>
                        </li>
                        <li class="bienvenue">
                            <?php echo 'Bienvenue Donkey'; ?>
                        </li>
                    </ul>
                <?php
                } else {
                    echo 'Bienvenue ' . $_SESSION['login']; ?>
                    <ul class="nav navbar-nav">
                        <li>
                            <a href="/create_book.php">Ajout/Suppression</a>
                        </li>
                        <li>
                            <a href="/modify_book.php">Modification</a>
                        </li>
                        <li>
                            <a href="/cart.php">Panier</a>
                        </li>
                        <li>
                            <a href="/logout.php">Logout</a>
                        </li>
                        <li class="bienvenue">
                            <?php echo 'Bienvenue ' . $_SESSION['login']; ?>
                        </li>
                    </ul>
                <?php
                }
                ?>
            </div>
        </div>
    </nav>
    <div>
        <form action="" method="post">
            <div class="demo-table">

                <div class="form-head"></div>
                <?php
                if (isset($_SESSION["errorMessage"])) {
                ?>
                    <div class="error-message"><?php echo $_SESSION["errorMessage"]; ?></div>
                <?php
                    unset($_SESSION["errorMessage"]);
                }
                ?>
                <div class="field-column">
                    <div>
                        <label for="username">Identifiant</label><span id="user_info" class="error-info"></span>
                    </div>
                    <div>
                        <input name="username" id="username" type="text" class="demo-input-box">
                    </div>
                </div>
                <div class=field-column>
                    <div>
                        <input type="submit" name="login" value="Login" class="btnLogin"></span>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="container">

        <!--<hr>-->

        <!-- Footer -->
        <!--<footer>
            <div class="row">
                <p>...</p>
            </div>
        </footer>-->

    </div>
</body>

</html>