<?php
session_start();
require 'AutoRequire.php';

$routeur = new Routeur();
$routeur->routeurRequete();

