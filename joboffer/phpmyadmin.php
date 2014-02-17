<?php

namespace phpMyAdmin;

$con = mysql_connect("localhost", "root", "");
if (!$con) {
    die("Connection failed:" . mysql . error());
}
mysql_select_db("nfq", $con);
