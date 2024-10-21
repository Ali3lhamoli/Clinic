<?php

// namespace App\Helpers;

// class FileHelper {
//     public static function get_file_url(?string $path = null) {
//          return ($path) ? asset($path) : asset('uploads/default.jpg');
//     }
// }

function get_file_url(?string $path = null) {
    return ($path) ? asset($path) : asset('uploads/default.jpg');
}