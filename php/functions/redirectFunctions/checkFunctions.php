<?php

function checkImage($check) {
    if($check == false) {
        $_SESSION["Message"] = $_SESSION["Message"] . "Das war kein Bild. <br>";
        return false;
    } else {
        if($check[0] <= 4000 && $check[1]<= 3000) {
            return isInAspectRatio($check[0], $check[1]);
        } else {
            $_SESSION["Message"] = $_SESSION["Message"] . "Das Bild ist zu groß. <br>";
            return false;
        }
    }
}

function isInAspectRatio($nA, $nB) {
    if($nB > $nA) {
        $_SESSION["Message"] = $_SESSION["Message"] . "Bilder im Hochformat werden nicht unterstützt. <br>";
        return false;
    } elseif($nA < $nB * 2.5) {
        return true;
    } else {
        $_SESSION["Message"] = $_SESSION["Message"] . "Das Bild ist in einem zu breiten Seitenverhältnis. <br>";
        return false;
    }
}

?>
