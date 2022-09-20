<?php
session_start();
include_once("lib/condb.php");
include_once("lib/inc.php");

include_once("header.php");
include_once("leftmenu.php");

$Node = isset($_GET['Node']) ?  $_GET['Node'] : "";
include_once(ViewContent($Node));


include_once("footer.php");

?>