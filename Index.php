<!DOCTYPE html>
<html lang="de">
<!-- Hauptseite-->

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="css/structure.css">

    <title>Fahrrad Stellpätze</title>
    <link href="Bilder/IconTransparent.png" rel="icon">
</head>

<body>

    <div id="background">
        <?php include "php/header.php"; ?>
        <?php include "php/navigation.php"; ?>
        <?php include "php/functions/datamanagment/contentmanagmentDao.php";

            $contents = searchResult();

        ?>



        <div id="mainFrame">
            <article class="card border-0">

                <h1> <a class="card-title" title="Über diese Seite">
                        Über diese Seite
                    </a></h1>
                <div class="card-body">
                    Auf dieser Seite kannst du die Fahrradstellplätze in der Nähe der Carl von Ossietzky Universität in Oldenburg finden und regestrierte Benutzer können fehlende Plätze hinzufügen.
                </div>

            </article>
            <div class="row">
                <div class="col col-auto">
                    <div id="sideSearch">
                        <?php include "php/search.php"; ?>
                    </div>
                </div>
                <div class="col">
                    <div class="card-group">
                        <div class="card">
                            <ul class="list-unstyled">
                                <li>
                                    <h1><a class="card-title" title="W6 West">
                                            W6 West
                                        </a></h1>
                                    <div class="card-group">
                                        <div class="card">
                                            <img class="card-img-top" class="img-fluid" src="Beitraege/W6West/ink.png" alt="Bild des Stellplatzes">
                                            <div class="card-body">
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Infos</h5>
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">Wechloy</li>
                                                    <li class="list-group-item">Überdacht</li>
                                                    <li class="list-group-item">Öffentlich</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <img class="card-img-top" class="img-fluid" src="Beitraege/W6West/BildDerKarte.png" alt="Position des Stellplatzes">
                                        </div>
                                    </div>
                                    <a href="Beitraege/W6West/W6West.php" class="btn btn-primary">Mehr informationen</a>
                                </li>


                                <li>
                                    <h1><a class="card-title" title="Bib Brücke Ulhormsweg">
                                            Bib Brücke Ulhormsweg
                                        </a></h1>
                                    <div class="card-group">
                                        <div class="card">
                                            <img class="card-img-top" class="img-fluid" src="Beitraege/Bib_Bruecke_Ulhormsweg/ink%20(1).png" alt="FP2">
                                            <div class="card-body">
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Infos</h5>
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">Haarentor</li>
                                                    <li class="list-group-item">Überdacht</li>
                                                    <li class="list-group-item">unter der Brücke</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <img class="card-img-top" class="img-fluid" src="Beitraege/Bib_Bruecke_Ulhormsweg/Anmerkung%202019-04-23%20155113.png" alt="Sterne">
                                        </div>
                                    </div>
                                    <a href="Beitraege/Bib_Bruecke_Ulhormsweg/Bib_Bruecke_Ulhormswg.php" class="btn btn-primary">Mehr informationen</a>
                                </li>


                                <li>
                                    <h1><a class="card-title" title="Bib Brücke Ulhormsweg">
                                            A2 Brücke Ulhormsweg
                                        </a></h1>
                                    <div class="card-group">
                                        <div class="card">
                                            <img class="card-img-top" class="img-fluid" src="Beitraege/A2_Bruecke_Ulhormsweg/ink%20(1).png" alt="Bild des Stellplatzes">
                                            <div class="card-body">
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="card-title">Infos</h5>
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">Haarentor</li>
                                                    <li class="list-group-item">Überdacht</li>
                                                    <li class="list-group-item">Öffentlich</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <img class="card-img-top" class="img-fluid" src="Beitraege/A2_Bruecke_Ulhormsweg/Anmerkung%202019-04-23%20154043.png" alt="Position des Stellplatzes">
                                        </div>
                                    </div>
                                    <a href="Beitraege/A2_Bruecke_Ulhormsweg/A2_Bruecke_Ulhormsweg.php" class="btn btn-primary">Mehr informationen</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include "php/footer.php"; ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>

</html>
