<!DOCTYPE html>
<!-- Seite für die Registrierung -->

<html lang="de">
<head>
<?php include "php/head.php";?>
        <style type="text/css">
        #navSearch {
            display: none;
        }

    </style>
</head>

<body>
    <?php include "php/header.php"; ?>
    <?php include "php/navigation.php"; ?>
    <?php include "php/functions/userInput.php"; ?>
    <?php include "php/functions/datamanagment/usermanagmentDao.php"; ?>
    <div id="background">
        <div id="mainFrame">
            <div class="regis">
                <section>
                    <form action="redirect.php" method="post">

                        <?php //register(); ?>

                        <!--Name-->
                        <div class="form-row">
                            <div class="col-sm">
                                <label class="form-control">
                                    Name:
                                </label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                            </div>
                        </div>

                        <!--Email-->
                        <div class="form-row">
                            <div class="col-sm">
                                <label class="form-control">
                                    Email:
                                </label>
                            </div>
                            <div class="col">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                            </div>
                        </div>

                        <!--Passwort-->
                        <div class="form-row">
                            <div class="col-sm">
                                <label class="form-control">
                                    Passwort:
                                </label>
                            </div>
                            <div class="col">
                                <input type="password" class="form-control" name="password" id="password" placeholder="Passwort">
                            </div>
                        </div>

                        <!--Passwort wiederholen-->
                        <div class="form-row">
                            <div class="col-sm">
                                <label class="form-control">
                                    Passwort wiederholen:
                                </label>
                            </div>
                            <div class="col">
                                <input type="password" class="form-control" name="passwordRepeat" id="passwordRepeat" placeholder="Passwort">
                            </div>
                        </div>

                        <!--Acountname-->
                        <div class="form-row">
                            <div class="col-sm">
                                <label class="form-control">
                                    Accountname:
                                </label>
                            </div>
                            <div class="col">
                                <input type="text" class="form-control" name="accountName" id="accountName" placeholder="Accountname">
                            </div>
                        </div>

                        <div class="registerButton">
                            <input type="submit" name="registerBtn" value="Registrieren" class="btn btn-default">
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>


    <?php include "php/footer.php"; ?>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
