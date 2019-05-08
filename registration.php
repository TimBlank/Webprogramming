<!DOCTYPE html>
<html lang="de">
<!-- Seite für die Registrierung -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="css/struktur.css">

    <title>Fahrrad Stellpätze</title>
    <link href="Bilder/IconTransparent.png" rel="icon">
</head>

<body>
    <div id="mainFrame">
        <?php include "php/header.php"; ?>
        <?php include "php/navigation.php"; ?>
        <?php include "php/search.php"; ?>

        <div class="mx-auto">

            <section>
                <!--Name-->
                <form>
                    <div class="form-row">
                        <div class="col-sm">
                            <label class="form-control">
                                Name:
                            </label>
                        </div>
                        <div class="col">
                            <input type="text" class="form-control" id="name" placeholder="Name">
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
                            <input type="email" class="form-control" id="email" placeholder="Email">
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
                            <input type="password" class="form-control" id="password" placeholder="Passwort">
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
                            <input type="password" class="form-control" id="passwordRepeat" placeholder="Passwort">
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
                            <input type="text" class="form-control" id="accountName" placeholder="Accountname">
                        </div>
                    </div>
                </form>

            </section>

        </div>
    </div>

    <footer class="fixed-bottom">
        <?php include "php/footer.php"; ?>
    </footer>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
