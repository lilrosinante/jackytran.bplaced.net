<?php
$empfaenger = "<jacky.tran@edu.tbz.ch>";
$from = "";
$name = "";
if (isset($_REQUEST["email2"]) AND isset($_REQUEST["nachname"])  ) {
    if ($_REQUEST["email2"]) {
        $from = strip_tags( $_REQUEST["email2"] );
    }
    if ($_REQUEST["nachname"]) {
        $name = strip_tags( $_REQUEST["nachname"] );
    }
        $req = print_r($_REQUEST, true);
        $req = strip_tags($req);
        $req = str_replace(
            array("Array","(",")", "[btn_speichernsenden] =>"),
            array("",      "", "", "" ),
            $req);
        $betreff = "Neue Meldung von jackysbuchshop.ch";
        $from = "From: ".$name." <".$from.">";
        $text = "Nachricht von der Webseite jackysbuchshop.ch".utf8_decode($req);

        mail($empfaenger, $betreff, $text, $from);
        header("location:/model/booklist.php");
}
?>