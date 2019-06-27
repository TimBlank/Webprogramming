<?php

function checkImage($check) {
    if($check == false){
        $_SESSION["Message"] = "Das war kein Bild";
        return false;
    }else {
        if($check[0] <= 3840 && $check[1]<= 2160) {
            if(isInAspectRatio($check[0], $check[1])) {
                return true;
            }else{
                return false;
            }
        }else{
            $_SESSION["Message"] = "Das Bild ist zu groß.";
            return false;
        }
    }
}

function isInAspectRatio($nA, $nB) {
    if($nB > $nA) {
        $_SESSION["Message"] = "Bilder im Hochformat werden nicht unterstützt.";
        return false;
    }elseif($nA < $nB * 2.5) {
        return true;
    }else{
        $_SESSION["Message"] = "Das Bild ist in einem zu breiten Seitenverhältnis." . "Breite: " . $nB . "Höhe: " . $nA;
        return false;
    }
}

?>
