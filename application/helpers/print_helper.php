<?php
// function dd($first = '', $second = '', $third = '')
// {
//     echo "<pre>";
//     if ($first != '') {
//         print_r($first);
//     } else if ($second != '') {
//         print_r($second);
//     } else if ($third != '') {
//         print_r($third);
//     }
//     die;
// }

if (!function_exists('dd')) {
    function dd(...$vars)
    {
        echo "<body style='background-color: black;'>";
        foreach ($vars as $v) {
            echo "<pre style='color: #0cf62d; background-color: black;'>";
            print_r($v);
            echo '<pre>';
        }
        echo "<body>";
        exit(1);
    }
}
?>