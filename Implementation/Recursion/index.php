<?php
use APP\Recursion\Recursion;
use APP\Sort\Quick;
use APP\TowersOfHanoi\Tower;
use APP\Stack\Stack;

require 'vendor/autoload.php';


$recursion= new Recursion;

//  use stack data structures 
$n = 40 ;

$start = microtime(true);
echo "factorial=>";
echo $recursion->factorial($n);
$end = microtime(true);
$factorial = $start - $end;
echo " Time taken by factorial: " . $factorial . " seconds\n";
echo "<br><br>";

$start = microtime(true);
echo "fibonacci=>";
echo $recursion->fibonacci($n);
$end = microtime(true);
$fibonacci = $start - $end;
echo " Time taken by fibonacci: " . $fibonacci . " seconds\n";
echo "<br><br>";

$start = microtime(true);
echo "fibonacci=>";
echo $recursion->fibonacciDynamic($n);
$end = microtime(true);
$fibonacci = $start - $end;
echo " Time taken by fibonacci useing dynamic programing principal : " . $fibonacci . " seconds\n";
echo "<br><br><br>";

////////////////////////////////////////////////////////////////////////////////////////////////////////////////

$arr = [10, 7, 8, 9, 1, 5];

$start = microtime(true);
$sortedArrRecursion = Quick::recursion($arr);
$end = microtime(true);
$recursion = $start - $end;
echo "Sorted array using recursion: [".implode(",",$sortedArrRecursion). "]\n";
echo " Time taken by recursion: " . $recursion . " seconds\n";
echo "<br><br><br>";

$start = microtime(true);
$sortedArrNunRecursion = Quick::nunRecursion($arr);
$end = microtime(true);
$nonrecursion = $start - $end;
echo "Sorted array using non-recursion:[".implode(",",$sortedArrNunRecursion). "] \n";
echo " Time taken by non-recursion: " . $nonrecursion . " seconds\n";
echo "<br><br><br>";

