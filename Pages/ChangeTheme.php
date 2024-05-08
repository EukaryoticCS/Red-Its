<?php
session_start();
$_SESSION["MyTheme"] = "StyleSheet";

if(!isset($_SESSION["CurrentThemeIndex"])) {
    $_SESSION["CurrentThemeIndex"] = 0;
}
header('Content-Type: application/json');


$_SESSION["CurrentThemeIndex"] = $_SESSION["CurrentThemeIndex"] + 1;

if($_SESSION["CurrentThemeIndex"] > 2){
    $_SESSION["CurrentThemeIndex"] = 0;
    $_SESSION["MyTheme"] = "StyleSheet";

}
else{
    if ($_SESSION["CurrentThemeIndex"] == 1) {
        $_SESSION["MyTheme"] = "StyleSheet2";
    }
    if ($_SESSION["CurrentThemeIndex"] == 2) {
        $_SESSION["MyTheme"] = "StyleSheetRad";
    }
}
?>