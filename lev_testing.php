<?php

require_once 'levenshtein_dis.php';

//Testing for levenshtein:
echo '<br>';
echo '<br>';

$case1 = new Leven("this is a test","this is test");

echo '<br>';
echo '<br>';

$case2 = new Leven("this is test","the is test");

echo '<br>';
echo '<br>';