<?php
require "config.php";

global $db;

$db = new mysqli($hostname,$user,$password,$dbname);