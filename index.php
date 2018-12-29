<?php
session_start();
?>
<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <title>Győr Richárd - házi feladat</title>
    <link rel="stylesheet" href="bootstrap/bootstrap.min.css">
    <script src="bootstrap/jquery.min.js"></script>
    <script src="bootstrap/popper.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="index.php?feladat=1">Feladat 1</a>
            <a class="nav-item nav-link" href="index.php?feladat=2">Feladat 2</a>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row justify-content-center">
        <?php if (isset($_GET["feladat"])) { ?>
            <h1 class="mt-4">Feladat <?php print $_GET["feladat"] ?> </h1>
            <div class="col-md-12">
                <form method="post" action="feladat<?php print $_GET["feladat"] ?>.php">
                    <?php if ($_GET["feladat"] == '1' or $_GET["feladat"] == '2') { ?>
                        <div class="form-check-inline">
                            <label class="form-check-label pr-2 pl-2" for="part1">
                                part one
                            </label>
                            <input class="form-check-input" type="radio" name="part" id="part1" value="1" checked>
                            <label class="form-check-label pr-2 pl-2" for="part2">
                                part two
                            </label>
                            <input class="form-check-input" type="radio" name="part" id="part2" value="2">
                        </div>
                    <?php } ?>
                    <div class="form-group mt-4">
                        <label>input:</label>
                        <textarea name="input" class="form-control"></textarea>
                    </div>
                    <div class="form-group text-right">
                        <button class="btn btn-primary" type="submit">ok</button>
                    </div>
                </form>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        Eredmény
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($_SESSION["eredmeny"])) {
                            print $_SESSION["eredmeny"];
                            unset($_SESSION["eredmeny"]);
                        } ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
</body>
</html>