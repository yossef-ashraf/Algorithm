<?php

namespace APP\TowersOfHanoi;

class Tower 
{
    public static function solve($n, $source, $auxiliary, $destination) {
        if ($n == 1) {
            echo "Move disk 1 from $source to $destination\n";
            return;
        }
        // Move n-1 disks from source to auxiliary
        self::solve($n - 1, $source, $destination, $auxiliary);
        // Move the nth disk from source to destination
        echo "Move disk $n from $source to $destination\n";
        // Move n-1 disks from auxiliary to destination
        self::solve($n - 1, $auxiliary, $source, $destination);
    }
    
}
// mn=2*n - 1  
// Programming explanation:
// solve($n, $source, $auxiliary, $destination):
// This function takes four parameters:
// $n: number of disks.
// $source: The source column with which disks start.
// $auxiliary: The intermediate column that is used to aid the transfer.
// $destination: The destination column to which disks should be moved.
// If there is only one disk ($n == 1), it is moved directly from the source to the destination.
// If there is more than one disk, the problem is divided into three steps as described in the iterative algorithm.
// Uses of Hanoi Towers:
// Teaching Recursion Concepts: The Hanoi Towers are an excellent example of understanding how repetition works.
// Programming skills test: It can be used as a test task to understand the extent of mastery of basic concepts in programming.
// Performance Analysis: Can be used to understand the complexity of algorithms and how to improve them.
// Towers of Hanoi is a classic problem that is widely used to teach and analyze algorithms in computer science.