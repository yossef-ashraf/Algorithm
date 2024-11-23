<?php

namespace APP\Recursion;

class Recursion 
{
    public function factorial($n){
        if($n==0){
            return 1;
        }else{
            return $n * $this->factorial($n-1);
        }
    }
    public function fibonacci($n){
        if($n==0){ 
            return 0;
        }elseif($n==1){
            return 1;
        }else{
            return $this->fibonacci($n-1) + $this->fibonacci($n-2);
        }
        // Fn = Fn-1 + Fn-2
        // stack save tree lavel not value  
    }

    // example for dynamic programing
    public function fibonacciDynamic($n){
        if ($n <= 0) {
            return 0;
        } elseif ($n == 1) {
            return 1;
        }
        $f = [];
        $f[0] = 0;
        $f[1] = 1;
        for ($i = 2; $i <= $n; $i++){
            $f[$i] = $f[$i-1] + $f[$i-2];
        }

        return $f[$n];
    }
        
}
