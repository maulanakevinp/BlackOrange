<?php

if (! function_exists('phone_format')) {
    function phone_format($str)
    {
        $number = chunk_split($str,4,"-");
        $split = str_split($number);
        for($i = 0; $i < count($split)-1; $i++ ){
            $array[$i] = $split[$i];
        }
        return implode($array);
    }
}

if (! function_exists('whatsapp')) {
    function whatsapp($nomor)
    {
        $split = str_split($nomor);
        if ($split[0] == 0) {
            $split[0] = 62;
        }
        return implode($split);
    }
}
