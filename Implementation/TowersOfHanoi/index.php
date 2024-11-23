<?php

use APP\TowersOfHanoi\Tower;

require 'vendor/autoload.php';

$n = 3; // Number of disks
$start = microtime(true);
Tower::solve($n, 'A', 'B', 'C');
$end = microtime(true);
$Tower = $start - $end;
echo " Time taken by Solve Tower: " . $Tower . " seconds\n";
echo "<br><br><br>";