<!DOCTYPE html>
<html lang="de">
<!-- Vorlage für einen Beitrag -->

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/structure.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fahrrad Stellpätze</title>
    <link href="Bilder/IconTransparent.png" rel="icon">
</head>

<body>
    <?php include "php/header.php"; ?>
    <?php include "php/navigation.php"; ?>
    <?php include "php/functions/userInput.php"; ?>
    <?php include "php/functions/datamanagment/contentmanagmentDao.php"; ?>
    <div id="mainFrame">

        <div class="createEntryPage">
            <section>
                <form method="post" enctype="multipart/form-data">
                    <?php newEntry(); ?>
                    <div class="container border">
                        <div class="row border">
                            <div class="col">
                                <input type="text" class="form-control" id="entryName" name="entryName" placeholder="Beschreibender Name des Stellplatzes">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col border">
                                <img src="Bilder/DummyBild.png" alt="Bild des Stellplatzes" class="img-fluid">
                                <label for="userImage">
                                    Bild hinzufügen
                                </label>
                                <input type="file" id="userImage" name="userImage" accept="image/png, image/jpeg">
                            </div>
                            <div class="col border">
                                <img src="Bilder/DummyMaps.png" alt="Position des Stellplatzes" class="img-fluid">
                            </div>
                        </div>
                        <div class="row border">
                            <div class="container">
                                <div class="row">
                                    <div class="col border">
                                        Öffentlich:
                                    </div>
                                    <div class="col border">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="isPublic" id="public" value="true" checked>
                                            <label class="form-check-label" for="public">Ja</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="isPublic" id="private" value="false">
                                            <label class="form-check-label" for="private">Nein</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col border">
                                        Stellplatzgröße:
                                    </div>
                                    <div class="col border">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="size" id="sizeSmall" value="small" checked>
                                            <label class="form-check-label" for="sizeSmall">Klein (1-30)</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="size" id="sizeMedium" value="medium">
                                            <label class="form-check-label" for="sizeMedium">Mittel (31-99)</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="size" id="sizeLarge" value="large">
                                            <label class="form-check-label" for="sizeLarge">Groß (100+)</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col border">
                                        Überdacht:
                                    </div>
                                    <div class="col border">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="hasRoof" id="covered" value="true">
                                            <label class="form-check-label" for="covered">Ja</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="hasRoof" id="notCovered" value="false" checked>
                                            <label class="form-check-label" for="notCovered">Nein</label>
                                        </div>
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
                                        <div class="form-group">
                                            <select class="form-control" name="holdingType" id="holderType">
                                                <option value="nothingSelectet">(Nichts ausgewählt)</option>
                                                <option value="simpleFrontHolder">Einfache Vorderradhalter</option>
                                                <option value="friendlyFrontHolder">Fahrradgerechte Vorderradhalter</option>
                                                <option value="supportHolder">Anlehnbügel</option>
                                                <option value="angularHolder">Schräghochparker</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col border">
                                        Besonderheiten:
                                    </div>
                                    <div class="col border">
                                        <textarea class="form-control" id="features" name="features" placeholder="Zum Beispiel Zugänglichkeit oder anderes"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="createBtn">
                        <input type="submit" name="submitEntry" value="Erstellen" class="btn btn-default">
                    </div>
                </form>
            </section>
        </div>
    </div>

    <?php include "php/footer.php"; ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
