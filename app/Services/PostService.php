<?php

namespace App\Services;

class PostService {
    public function getExcerpt($text, $length) {
        if (mb_strlen($text) > $length) {
            return mb_substr($text, 0, $length) . '...';
        } else {
            return $text;
        }
    }
}