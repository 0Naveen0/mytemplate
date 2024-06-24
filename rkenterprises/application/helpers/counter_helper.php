<?php defined('BASEPATH') OR exit('No direct script access allowed.');

if ( ! function_exists('count_visitor')) {
    function count_visitor()
    {
        $filecounter=(APPPATH . 'logs/counter.txt');
        $count=file($filecounter);
        $count[0]++;
        $file=fopen($filecounter, 'w');
        fputs($file, $count[0]);
        fclose($file);
        return $count[0];
    }
}