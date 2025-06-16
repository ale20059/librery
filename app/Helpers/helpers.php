<?php

if (!function_exists('randomColor')) {
    function randomColor()
    {
        $colors = ['#6f42c1', '#198754', '#0d6efd', '#dc3545', '#fd7e14', '#20c997', '#6610f2', '#ffc107'];
        return $colors[array_rand($colors)];
    }
}
