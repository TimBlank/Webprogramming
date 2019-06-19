<!DOCTYPE html>
<!-- Vorlage für einen Beitrag -->

<html lang="de">

<head>
    <?php include_once "php/head.php";?>
    <script>
        //Quelle: https://stackoverflow.com/questions/14791247/how-to-create-image-uploader-with-preview
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#imagePreview').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

    </script>
</head>

<body>
    <?php include_once "php/header.php"; ?>
    <?php include_once "php/navigation.php"; ?>
    <div id="background">
        <?php   $entryID = null;
        if (isset($_GET["EntryID"])){
            $entryID =htmlspecialchars($_GET["EntryID"]);
        }
        $content = $contentmanager->loadEntry($entryID);
        if($content==false){
            $content = new entry(null);
        }
    ?>
        <?php include_once "php/functions/userInput.php"; ?>
        <div id="mainFrame">

            <section>
                <div class="row">
                    <div class="col col-auto" id="sideSearch">
                        <div>
                            <?php include "php/search.php"; ?>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card">
                            <div class="container border">
                                <div class="row border">
                                    <div class="col">
                                        <h1><?php echo $content->getName(); ?></h1>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col border">
                                        <img src="<?php echo $content->getImage(); ?>" alt="Bild des Stellplatzes" class="img-fluid" id="myImg" onclick="openImgModal(this.src);">
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
                                    <?php if($content->getId()!==null && isset($_SESSION["User"])): ?>
                                    <a href="createEntryPage.php?EntryID=<?php echo $entryID; ?>" class="btn btn-primary" title="VorlageBeitrag">Bearbeiten</a>
                                    <form action="redirect.php" method="post">
                                        <input type="hidden" name="EntryID" value="<?php echo $entryID;?>">
                                        <input type="submit" name="DeleteEntry" value="Löschen" class="btn btn-primary" />
                                    </form>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

            <div id="marginTop">
                <?php if($content->getId() !== null): ?>
                <div class="card">
                    <section>
                        <div class="card">
                            <h1>Kommentare</h1>
                        </div>
                        <ul class="list-group list-group-flush">
                            <?php foreach($contentmanager->loadEntryComments($entryID) as $comment): ?>
                            <li class="list-group-item">
                                <div class="card">
                                    <div class="commentImage">
                                        <?php if($comment->getImage()!=""): ?>
                                        <img src="<?php echo $comment->getImage(); ?>" class="card-img-top" alt="Bild des Stellplatzes" onclick="openImgModal(this.src);">
                                        <?php endif ?>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $comment->getAuthor(); ?></h5>
                                        <p class="card-text"><?php echo $comment->getText(); ?></p>
                                        <?php if(isset($_SESSION["User"])&& $_SESSION["User"] == $comment->getAuthor()): ?>
                                        <form action="redirect.php" method="post">
                                            <input type="hidden" name="EntryID" value="<?php echo $entryID;?>">
                                            <input type="hidden" name="CommentID" value="<?php echo $comment->getCommentID(); ?>">
                                            <input type="submit" name="DeleteComment" value="Kommentar Löschen" class="btn btn-default" />
                                        </form>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </li>

                            <?php endforeach;?>

                            <li class="list-group-item" id="addCommentSection">


                                <form action="redirect.php" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="EntryID" value="<?php echo $entryID;?>">
                                    <div class="form-group">
                                        <img src="pictures/IconTransparent.png" id="imagePreview" alt="Bild des Kommentares" class="img-fluid"><br>
                                        <label for="userImage">
                                            Bild hinzufügen
                                        </label><br>
                                        <input type="file" id="userImage" onchange="readURL(this);" name="commentImg" accept="image/png, image/jpeg">
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="commentText">
                                                Schreibe etwas:
                                            </label>
                                            <!--<input type="text" class="form-control" id="commentText" name="ct" value="" placeholder="Kommentar" autocomplete="off" />-->
                                            <textarea class="form-control" id="commentText" name="commentText" placeholder="Kommentar" cols="30" rows="2" required></textarea>
                                        </div>
                                        <input type="submit" name="SubmitComment" value="Kommentieren" class="btn btn-default" />
                                    </div>
                                </form>

                            </li>

                        </ul>
                    </section>
                </div>
                <?php endif; ?>

            </div>
        </div>
    </div>

    <?php include_once "php/footer.php"; ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
