<header class="bg-light">
    <div class="row" id="headerRow">
        <div id="smallWeatherlWidget" class="col col-auto weatherWidget">
            <!-- Quelle: https://www.wetter.com/apps_und_mehr/website/homepagewidget/ -->
            <div id="wcom-787daf86d62ad2487d987c0b10510398" style="border: 1px solid rgb(0, 123, 255); background-color: rgb(255, 255, 255); border-radius: 5px;" class="wcom-default w150x150">
                <link rel="stylesheet" href="//cs3.wettercomassets.com/woys/5/css/w.css" media="all">
                <div class="wcom-city"><a style="color: #000" href="https://www.wetter.com/deutschland/oldenburg/DE0007952.html" target="_blank" rel="nofollow" aria-label="Wetter Berlin" title="Wetter Oldenburg">Wetter Oldenburg</a></div>
                <div id="wcom-787daf86d62ad2487d987c0b10510398-weather"></div>
                <script type="text/javascript" src="//cs3.wettercomassets.com/woys/5/js/w.js"></script>
                <script type="text/javascript">
                    _wcomWidget({
                        id: 'wcom-787daf86d62ad2487d987c0b10510398',
                        location: 'DE0007952',
                        format: '150x150',
                        type: 'summary'
                    });

                </script>
            </div>
        </div>
        <noscript>
            <style>
                .weatherWidget {
                    display: none;
                }

            </style>
        </noscript>
        <div class="col">
            <h1>Fahrrad Stellplätze</h1>
            <h2>Universität Oldenburg</h2>
            <noscript>
                <label class="noScr">Zur vollständingen Benutzung der Navigationsleiste wird JavaScript benötigt.</label> <br>
                <a href="../../Index.php">
                    <button class="btn btn-default noScr">
                        Start
                    </button>
                </a>
                <a href="../../map.php">
                    <button class="btn btn-default noScr">
                        Karte
                    </button>
                </a>
                <?php include_once "php/htmlElements/noscriptLogInOut.php" ?>
                <div class="navSearch">
                    <?php include_once "php/htmlElements/search.php" ?>
                </div>
            </noscript>
        </div>
    </div>
    <?php include_once "php/htmlElements/modals.php"; ?>
</header>
