Merge sort is a divide-and-conquer algorithm that divides the input array into two halves, recursively sorts them, and then merges the sorted halves. Here is a PHP implementation of the merge sort algorithm:

```php
<?php
// Function to merge two subarrays of $arr
// First subarray is $arr[$left..$mid]
// Second subarray is $arr[$mid+1..$right]
function merge(&$arr, $left, $mid, $right) {
    $n1 = $mid - $left + 1;
    $n2 = $right - $mid;

    // Create temporary arrays
    $L = array_fill(0, $n1, 0);
    $R = array_fill(0, $n2, 0);

    // Copy data to temporary arrays L[] and R[]
    for ($i = 0; $i < $n1; $i++) {
        $L[$i] = $arr[$left + $i];
    }
    for ($j = 0; $j < $n2; $j++) {
        $R[$j] = $arr[$mid + 1 + $j];
    }

    // Merge the temporary arrays back into $arr[$left..$right]
    $i = 0; // Initial index of first subarray
    $j = 0; // Initial index of second subarray
    $k = $left; // Initial index of merged subarray

    while ($i < $n1 && $j < $n2) {
        if ($L[$i] <= $R[$j]) {
            $arr[$k] = $L[$i];
            $i++;
        } else {
            $arr[$k] = $R[$j];
            $j++;
        }
        $k++;
    }

    // Copy the remaining elements of L[], if any
    while ($i < $n1) {
        $arr[$k] = $L[$i];
        $i++;
        $k++;
    }

    // Copy the remaining elements of R[], if any
    while ($j < $n2) {
        $arr[$k] = $R[$j];
        $j++;
        $k++;
    }
}

// Function to sort an array $arr using merge sort
function mergeSort(&$arr, $left, $right) {
    if ($left < $right) {
        // Find the middle point
        $mid = $left + (int)(($right - $left) / 2);

        // Sort first and second halves
        mergeSort($arr, $left, $mid);
        mergeSort($arr, $mid + 1, $right);

        // Merge the sorted halves
        merge($arr, $left, $mid, $right);
    }
}

// Example usage
$arr = [12, 11, 13, 5, 6, 7];
$length = count($arr);

echo "Given array is:\n";
echo implode(" ", $arr) . "\n";

mergeSort($arr, 0, $length - 1);

echo "\nSorted array is:\n";
echo implode(" ", $arr) . "\n";
?>
```

This code defines two functions:

1. `merge()`: Merges two sorted subarrays into a single sorted subarray.
2. `mergeSort()`: Recursively divides the array into two halves, sorts them, and merges them.

The example usage demonstrates how to sort an array using merge sort.