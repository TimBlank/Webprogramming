<!DOCTYPE html>
<html lang="de">
<!-- Vorlage für einen Beitrag -->

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="css/structure.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Fahrrad Stellpätze</title>
    <link href="pictures/IconTransparent.png" rel="icon">
</head>

<body>
    <?php include "php/header.php"; ?>
    <?php include "php/navigation.php"; ?>
    <?php
        include "php/functions/datamanagment/contentmanagmentDao.php";

        //entryID muss noch richtig gesetzt werden
        $entryID =0;
        if (isset($_GET["EntryID"])){
            $entryID =$_GET["EntryID"];
        }

        $content = loadEntry($entryID);
    ?>
    <?php include "php/functions/userInput.php"; ?>
    <div id="mainFrame">

        <section>
            <div class="row">
                <div class="col col-auto">
                    <div id="sideSearch">
                        <?php include "php/search.php"; ?>
                    </div>
                </div>
                <div class="col">
                    <div class="container border">
                        <div class="row border">
                            <div class="col">
                                <h1><?php echo $content->getName(); ?></h1>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col border">
                                <img src="<?php echo $content->getImage(); ?>" alt="Bild des Stellplatzes" class="img-fluid">
                            </div>
                            <div class="col border">
                                <img src="pictures/DummyMaps.png" alt="Position des Stellplatzes" class="img-fluid">
                                <!-- Hier muss noch irgendwie die Position richtig eingebunden werden -->
                            </div>
                        </div>
                        <div class="row border">
                            <div class="container">
                                <div class="row">
                                    <div class="col border">
                                        Öffentlich/Privat:
                                    </div>
                                    <div class="col border">
                                        <?php echo $content->stringIsPublic() ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col border">
                                        Stellplatzgröße:
                                    </div>
                                    <div class="col border">
                                        <?php echo $content->getSize() ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col border">
                                        Überdacht:
                                    </div>
                                    <div class="col border">
                                        <?php echo $content->stringHasRoof() ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col border">
                                        Art:
                                    </div>
                                    <div class="col border">
                                        <?php echo $content->getHolderType() ?>
                                        <!-- https://de.wikipedia.org/wiki/Fahrradabstellanlage#Bauformen_von_Fahrradhaltern -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col border">
                                        Besonderheiten:
                                    </div>
                                    <div class="col border">
                                        <?php echo $content->getDescription() ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section>
            <h1>Kommentare</h1>
            <ul class="list-group list-group-flush">
                <?php foreach(loadEntryComments($entryID) as $comment): ?>
                <li class="list-group-item">
                    <div class="card">
                        <?php if($comment->getImage()!=""): ?>
                        <img src="<?php echo $comment->getImage(); ?>" class="card-img-top" alt="Bild des Stellplatzes">
                        <?php endif ?>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $comment->getAuthor(); ?></h5>
                            <p class="card-text"><?php echo $comment->getText(); ?></p>
                        </div>
                    </div>
                </li>
                <?php endforeach; ?>

                <li class="list-group-item">

                    <div class="card">
                        <form method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <?php comment(); ?>
                                <label for="userImage">
                                    Bild hinzufügen
                                </label>
                                <input type="file" id="userImage" name="commentImg" accept="image/png, image/jpeg" >
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="commentText">
                                        Schreibe etwas:
                                    </label>
                                    <!--<input type="text" class="form-control" id="commentText" name="ct" value="" placeholder="Kommentar" autocomplete="off" />-->
                                    <textarea class="form-control" id="commentText" name="commentText" placeholder="Kommentar" cols="30" rows="2"></textarea>
                                </div>
                                <input type="submit" name="SubmitComment" value="Kommentieren" class="btn btn-default"/>
                            </div>
                        </form>
                    </div>
                </li>
            </ul>
        </section>
    </div>

    <?php include "php/footer.php"; ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>