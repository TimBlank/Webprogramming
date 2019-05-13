<!DOCTYPE html>
<html lang="de">
<!-- Seite auf der Stellplätze angzeigt werden, kann auf einen Bereich eingestellt werden(Haarentor, Wechloy, etc.) -->

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" type="text/css" href="css/structure.css">

    <title>Fahrrad Stellpätze</title>
    <link href="Bilder/IconTransparent.png" rel="icon">
</head>

<body>
    <?php include "../php/header.php"; ?>
    <?php include "../php/navigation.php"; ?>
    <?php include "../php/search.php"; ?>

    <section>
        <div id="mainFrame">
            <div class="card">
                <h1><a :class="card-title" title="Standort">
                        Standort
                    </a></h1>
                <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.openstreetmap.org/export/embed.html?bbox=7.756347656250001%2C53.0193631492509%2C8.463592529296877%2C53.23772373999386&amp;layer=mapnik" style="border: 1px solid black"></iframe><br /><small><a href="https://www.openstreetmap.org/#map=11/53.1287/8.1100">Größere Karte anzeigen</a></small>

            </div>
        </div>
    </section>

    <?php include "php/footer.php"; ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
