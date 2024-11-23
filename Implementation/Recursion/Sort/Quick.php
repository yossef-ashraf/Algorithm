<?php

namespace APP\Sort;

class Quick {

    static public function recursion($arr){
        $len = count($arr);
        if($len <= 1){
            return $arr;
        } else {
            $pivot = $arr[0];
            $left = [];
            $right = [];
            for($i = 1; $i < $len; $i++){
                if($arr[$i] < $pivot){
                    $left[] = $arr[$i];
                } else {
                    $right[] = $arr[$i];
                }
            }
            return array_merge(self::recursion($left), [$pivot], self::recursion($right));
        }
    }

    static public function nunRecursion($arr){
        // Create an auxiliary stack
        $stack = [];

        // Initialize the stack
        array_push($stack, 0);
        array_push($stack, count($arr) - 1);

        // Keep popping from stack while it's not empty
        while (!empty($stack)) {
            // Pop high and low
            $high = array_pop($stack);
            $low = array_pop($stack);

            // Set pivot element at its correct position
            $p = self::partition($arr, $low, $high);

            // If there are elements on the left side of the pivot, push them onto the stack
            if ($p - 1 > $low) {
                array_push($stack, $low);
                array_push($stack, $p - 1);
            }

            // If there are elements on the right side of the pivot, push them onto the stack
            if ($p + 1 < $high) {
                array_push($stack, $p + 1);
                array_push($stack, $high);
            }
        }

        return $arr;
    }

    static private function partition(&$arr, $low, $high){
        // Pivot (element to be placed at the right position)
        $pivot = $arr[$high];

        $i = $low - 1; // Index of smaller element

        for ($j = $low; $j <= $high - 1; $j++) {
            // If current element is smaller than or equal to pivot
            if ($arr[$j] <= $pivot) {
                $i++; // Increment index of smaller element
                self::swap($arr, $i, $j);
            }
        }
        self::swap($arr, $i + 1, $high);
        return $i + 1;
    }

    static private function swap(&$arr, $i, $j){
        $temp = $arr[$i];
        $arr[$i] = $arr[$j];
        $arr[$j] = $temp;
    }
}




