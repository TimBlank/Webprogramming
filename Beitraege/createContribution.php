<!DOCTYPE html>
<html lang="de">
<!-- Vorlage für einen Beitrag -->

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/structure.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fahrrad Stellpätze</title>
    <link href="../Bilder/IconTransparent.png" rel="icon">
</head>

<body>
    <?php include "../php/header.php"; ?>
    <?php include "../php/navigation.php"; ?>
    <div id="mainFrame">

        <section>
            <div class="container border">
                <div class="row border">
                    <div class="col">
                        <h1>Beschreibender Name des Stellplatzes</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col border">
                        <img src="DummyBild.png" alt="Bild des Stellplatzes" class="img-fluid">
                    </div>
                    <div class="col border">
                        <img src="../Bilder/DummyMaps.png" alt="Position des Stellplatzes" class="img-fluid">
                    </div>
                </div>
                <div class="row border">
                    <div class="container">
                        <div class="row">
                            <div class="col border">
                                Öffentlich:
                            </div>
                            <div class="col border">
                                Ja/Nein
                            </div>
                        </div>
                        <div class="row">
                            <div class="col border">
                                Stellplatzgröße:
                            </div>
                            <div class="col border">
                                Größe des Stellplatzes(Klein,Mittel,Groß)
                            </div>
                        </div>
                        <div class="row">
                            <div class="col border">
                                Überdacht:
                            </div>
                            <div class="col border">
                                Ja/Nein
                            </div>
                        </div>
                        <div class="row">
                            <div class="col border">
                                Art:
                            </div>
                            <div class="col border">
                                Art der Fahrradhalterung siehe
                                <a href="https://de.wikipedia.org/wiki/Fahrradabstellanlage#Bauformen_von_Fahrradhaltern" target="_side" title="Bauformen von Fahrradhaltern">
                                    Wikipedia
                                </a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col border">
                                Besonderheiten:
                            </div>
                            <div class="col border">
                                Zum Beispiel Zugänglichkeit oder anderes
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <?php include "../php/footer.php"; ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
