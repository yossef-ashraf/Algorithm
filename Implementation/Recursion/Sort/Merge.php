<?php

namespace APP\Sort;

class Merge {

    // Public method to perform merge sort recursively
    static public function recursion($arr) {
        if (count($arr) <= 1) {
            return $arr;
        }

        $mid = count($arr) / 2;

        // Divide the array into two halves
        $left = array_slice($arr, 0, $mid);
        $right = array_slice($arr, $mid);

        // Recursively sort both halves
        $left = self::recursion($left);
        $right = self::recursion($right);

        // Merge the sorted halves
        return self::merge($left, $right);
    }

    // Public method to perform merge sort using an iterative approach
    static public function nonRecursion($arr) {
        $n = count($arr);
        for ($currSize = 1; $currSize < $n; $currSize *= 2) {
            for ($leftStart = 0; $leftStart < $n - 1; $leftStart += 2 * $currSize) {
                // Calculate mid and rightEnd
                $mid = min($leftStart + $currSize - 1, $n - 1);
                $rightEnd = min($leftStart + 2 * $currSize - 1, $n - 1);

                // Merge subarrays arr[leftStart...mid] and arr[mid+1...rightEnd]
                $arr = self::merge(
                    array_slice($arr, $leftStart, $mid - $leftStart + 1),
                    array_slice($arr, $mid + 1, $rightEnd - $mid)
                );
            }
        }
        return $arr;
    }

    // Private method to merge two sorted arrays
    static private function merge($left, $right) {
        $result = [];
        $i = 0;
        $j = 0;

        // Merge while there are elements in both arrays
        while ($i < count($left) && $j < count($right)) {
            if ($left[$i] <= $right[$j]) {
                $result[] = $left[$i];
                $i++;
            } else {
                $result[] = $right[$j];
                $j++;
            }
        }

        // Collect remaining elements
        while ($i < count($left)) {
            $result[] = $left[$i];
            $i++;
        }

        while ($j < count($right)) {
            $result[] = $right[$j];
            $j++;
        }

        return $result;
    }
}
