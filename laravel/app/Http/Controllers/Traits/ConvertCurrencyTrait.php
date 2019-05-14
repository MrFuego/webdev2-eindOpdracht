<?php

namespace App\Http\Controllers\Traits;

trait ConvertCurrencyTrait {

    public function convertWithEnvRate($amount, $from = 'credits', $to = 'eur', $precision = 2){

        $ratio = env('CREDIT_RATIO');

        if($from == 'credits') {
            $convert = round($amount * $ratio, $precision);
        }else{
            $convert = round($amount / $ratio, $precision);
        }

        return $convert;
    }
}
