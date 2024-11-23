<?php

namespace APP\Sort;

class MergeSortDiskBased {

    public static function sort($inputFile, $outputFile, $chunkSize = 10000) {
        // Split the input file into sorted chunks
        $chunkFiles = self::splitFileIntoSortedChunks($inputFile, $chunkSize);
        
        // Merge the sorted chunks
        self::mergeSortedChunks($chunkFiles, $outputFile);
        
        // Clean up temporary chunk files
        foreach ($chunkFiles as $file) {
            unlink($file);
        }
    }

    private static function splitFileIntoSortedChunks($inputFile, $chunkSize) {
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

    private static function mergeSortedChunks($chunkFiles, $outputFile) {
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
}
