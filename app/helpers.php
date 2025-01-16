<?php

if (!function_exists('CurrentDate')) {
    function CurrentDate($format = 'd/m/Y')
    {
        return date($format);
    }
}
