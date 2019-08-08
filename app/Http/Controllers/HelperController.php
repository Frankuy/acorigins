<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelperController extends Controller
{
    public static function paginate($page, $max_pages) {
        $format_pages = [];
        if ($max_pages > 7) {
            if ($page <= 2) {
                $format_pages = ['1', '2', '3', '4', '...', strval($max_pages-1), strval($max_pages)];
            }
            else if ($page >= $max_pages-1) {
                $format_pages = ['1', '2', '...', strval($max_pages-3), strval($max_pages-2), strval($max_pages-1), strval($max_pages)];
            }
            else {
                $format_pages[] = '1';
                $format_pages[] = '...';
                $format_pages[] = strval($page - 1);
                $format_pages[] = strval($page);
                $format_pages[] = strval($page + 1);
                $format_pages[] = '...';
                $format_pages[] = strval($max_pages);
            }
        }
        else {
            for ($i = 1; $i <= $max_pages; $i++) {
                $format_pages[] = strval($i);
            }
        }

        return $format_pages;
    }
}
