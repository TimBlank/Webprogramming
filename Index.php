<!DOCTYPE html>
<html lang="de">
<!-- Hauptseite-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>Fahrrad Stellpätze</title>
    <link href="Bilder/IconTransparent.png" rel="icon">
</head>

<body>
    <div id="mainFrame">
    <?php include "php/header.php"; ?>
    <?php include "php/navigation.php"; ?>
    <?php include "php/search.php"; ?>

    <section>
         <article >

            <h1>Über diese Seite</h1>
            Auf dieser Seite kannst du die Fahrradstellplätze in der Nähe der Carl von Ossietzky Universität in Oldenburg finden und regestrierte Benutzer können fehlende Plätze hinzufügen.
        </article>
        <ul>
            <li>
                <h1><a class="card-title" title="W6 West"  >
                             W6 West
                    </a></h1>
                <div class="card-group">
                    <div class="card">
                        <img class="card-img-top" class="img-fluid"  src="Beitraege/W6West/ink.png" alt="Bild des Stellplatzes">
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
                <div style="border: black 1px solid">
                    <h1><a href="Beitraege/Bib_Bruecke_Ulhormsweg/Bib_Bruecke_Ulhormswg.php"  title="Bib Brücke Ulhormsweg">
                            Bib Brücke Ulhormsweg
                        </a></h1>
                    <img src="Beitraege/Bib_Bruecke_Ulhormsweg/ink(1).png" alt="FP2" height='300'>
                    <p>-Haarentor</p>
                    <p>-Überdacht</p>
                    <p>-unter der Brücke</p>
                    <img src="Beitraege/Bib_Bruecke_Ulhormsweg/Anmerkung%202019-04-23%20155113.png" alt="Sterne" height='300'>
                </div>
            </li>


            <li>
                <div style="border: black 1px solid">
                    <h1><a href="Beitraege/A2_Bruecke_Ulhormsweg/A2_Bruecke_Ulhormsweg.php" title="A2 Brücke Ulhormsweg">
                            A2 Brücke Ulhormsweg
                        </a></h1>
                    <img src="Beitraege/A2_Bruecke_Ulhormsweg/ink%20(1).png" alt="Bild des Stellplatzes" height='300'>
                    <p>Haarentor</p>
                    <p>Überdacht</p>
                    <p>Öffentlich</p>
                    <img src="Beitraege/A2_Bruecke_Ulhormsweg/Anmerkung%202019-04-23%20154043.png" alt="Position des Stellplatzes" height='300'>
                </div>
            </li>

        </ul>
    </section>

    <?php include "php/footer.php"; ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </div>
</body>

</html>
