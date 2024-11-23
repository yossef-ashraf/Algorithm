Implementing a disk-based merge sort in PHP involves handling large datasets that cannot fit into memory. The core idea is to split the large dataset into smaller chunks that can be sorted in memory, then merge these sorted chunks back together using temporary files stored on disk. Here’s a step-by-step guide:

1. **Split the large dataset into manageable chunks**: Read the input data and write it into smaller, sorted temporary files.
2. **Sort each chunk in memory**: Sort these chunks using any in-memory sorting algorithm (like quicksort or PHP's built-in `sort()` function).
3. **Merge the sorted chunks**: Use a k-way merge algorithm to merge the sorted chunks into a single sorted output.

Here's a complete implementation in PHP:

```php
<?php

function merge_sort_disk_based($inputFile, $outputFile, $chunkSize = 10000) {
    // Split the input file into sorted chunks
    $chunkFiles = split_file_into_sorted_chunks($inputFile, $chunkSize);
    
    // Merge the sorted chunks
    merge_sorted_chunks($chunkFiles, $outputFile);
    
    // Clean up temporary chunk files
    foreach ($chunkFiles as $file) {
        unlink($file);
    }
}

function split_file_into_sorted_chunks($inputFile, $chunkSize) {
    $chunkFiles = [];
    $handle = fopen($inputFile, 'r');
    
    if ($handle) {
        $chunk = [];
        $chunkIndex = 0;

        while (($line = fgets($handle)) !== false) {
            $chunk[] = trim($line);
            
            if (count($chunk) >= $chunkSize) {
                $chunkFile = "chunk_$chunkIndex.txt";
                sort($chunk, SORT_STRING);
                file_put_contents($chunkFile, implode(PHP_EOL, $chunk) . PHP_EOL);
                $chunkFiles[] = $chunkFile;
                $chunk = [];
                $chunkIndex++;
            }
        }
        
        if (!empty($chunk)) {
            $chunkFile = "chunk_$chunkIndex.txt";
            sort($chunk, SORT_STRING);
            file_put_contents($chunkFile, implode(PHP_EOL, $chunk) . PHP_EOL);
            $chunkFiles[] = $chunkFile;
        }

        fclose($handle);
    }
    
    return $chunkFiles;
}

function merge_sorted_chunks($chunkFiles, $outputFile) {
    $fileHandles = [];
    $outputHandle = fopen($outputFile, 'w');
    
    if ($outputHandle) {
        foreach ($chunkFiles as $file) {
            $fileHandles[] = fopen($file, 'r');
        }
        
        $currentLines = [];
        foreach ($fileHandles as $index => $handle) {
            if (($line = fgets($handle)) !== false) {
                $currentLines[$index] = trim($line);
            }
        }
        
        while (!empty($currentLines)) {
            $minValue = min($currentLines);
            $minIndex = array_search($minValue, $currentLines);
            
            fwrite($outputHandle, $minValue . PHP_EOL);
            
            if (($line = fgets($fileHandles[$minIndex])) !== false) {
                $currentLines[$minIndex] = trim($line);
            } else {
                fclose($fileHandles[$minIndex]);
                unset($currentLines[$minIndex]);
            }
        }
        
        fclose($outputHandle);
    }
}

// Usage
$inputFile = 'large_input.txt';
$outputFile = 'sorted_output.txt';
$chunkSize = 10000;  // Adjust chunk size based on available memory

merge_sort_disk_based($inputFile, $outputFile, $chunkSize);

echo "Sorting completed. Sorted file: $outputFile\n";
?>
```

### Explanation:

1. **`merge_sort_disk_based` function**: Coordinates the sorting process by calling functions to split the input file into sorted chunks and then merge those chunks back together.
2. **`split_file_into_sorted_chunks` function**: Reads the input file in chunks, sorts each chunk, and writes the sorted chunks to temporary files.
3. **`merge_sorted_chunks` function**: Merges the sorted chunks using a k-way merge, reading from each chunk file and writing the smallest element to the output file.

### Notes:
- Ensure you have enough disk space for the temporary files.
- Adjust the `chunkSize` parameter based on the available memory to optimize performance.
- This example assumes the input file is a plain text file with one item per line. Adjustments may be needed for different file formats.