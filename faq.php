<!DOCTYPE html>
<!-- Impressum-->

<html lang="de">

<head>
    <?php include_once "php/htmlElements/head.php";?>
    <link rel="stylesheet" href="css/noSearchWeather.css">
</head>

<body>
    <?php include_once "php/htmlElements/header.php"; ?>
    <?php include_once "php/htmlElements/navigation.php"; ?>

    <div id="background">
        <div id="mainFrame">
            <section>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Wie kann ich mich registrieren?
                        </h5>
                        <div class="card-text">
                            Ein Link zur Registrierung ist in der Navigationsleiste unter Login zu finden.
                            Alternativ über diesen <a href="registration.php">Link.</a>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Wie kann ich mich einloggen?
                        </h5>
                        <div class="card-text">
                            Wenn du dich Registriert hast, kannst du dich in der Navigationsleiste unter Login einloggen.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Was kann ich machen wenn ich eingeloggt bin?
                        </h5>
                        <div class="card-text">
                            Als eingeloggter Nutzer kan man Beiträge erstellen, vorhandene Beiträge bearbeiten oder Löschen, Kommentare unter Beiträgen schreiben und seine eigenen Kommentare löschen.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Wo erstelle ich einen neuen Beitrag?
                        </h5>
                        <div class="card-text">
                            Zur <a href="createEntryPage.php">Erstellungsseite</a> kommt man über die einzelen Karten von <a href="map.php?campusSite=Haarentor">Haarentor</a>, <a href="map.php?campusSite=Wechloy">Wechloy</a> oder <a href="map.php?campusSite=Johann-Justus-Weg">Johan-Justus-Weg</a>, <a href="map.php?campusSite=Botanischer Garten">Botanischer Garten</a> und <a href="map.php?campusSite=Offis">Offis</a> unter Weitere in der Navigationsleiste.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Wo kann ich Beiträge bearbeiten oder Löschen?
                        </h5>
                        <div class="card-text">
                            Die Buttons fürs Bearbeiten und Löschen findet man bei den Beitragsseiten.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Wo kann ich Kommentare schreiben?
                        </h5>
                        <div class="card-text">
                            Kommentare können unter den Beitragsseiten verfasst werden. Auch Bilder können dort Angefügt werden.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Muss ich für die Nutzung der Seite Java-Script erlauben?
                        </h5>
                        <div class="card-text">
                            Für die Nutzung der Seite wird es nicht benötigt, aber ohne sind einige Funktionen nicht verfügbar. Darunter die integration mit der Google-Maps und die Einsicht auf das lokale Wetter. Erstellen, Bearbeiten, Kommentieren und Einsehen sind trotzdem möglich.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            In was für ein Format müssen die Bilder sein die ich hochladen möchte?
                        </h5>
                        <div class="card-text">
                            Wir unterstützen Bilder in einem Seitenverhältnis zwischen 1:1 bis 2,5:1. Die maximale Größe von Bildern ist 4000x3000 Pixel.
                            Bilder in Hochformat sind also nicht unterstützt.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Was bedueten die ganzen Halterungsarten?
                        </h5>
                        <div class="card-text">
                            Wir benutzen die Halterungsarten von Wikipedia. Diese kann man <a href="https://de.wikipedia.org/wiki/Fahrradabstellanlage#Bauformen_von_Fahrradhaltern" target="_side" title="Bauformen von Fahrradhaltern">hier</a> nachlesen.
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">
                            Was bedeuten die Größen wie "Klein" "Mittel" und "Groß"?
                        </h5>
                        <div class="card-text">
                            Die größen stehen für ca. 1-30 Stellplätze bei "Klein", ca. 31-99 bei "Mittel" und alles ab 100 ist "Groß".
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <?php include_once "php/htmlElements/footer.php"; ?>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>
