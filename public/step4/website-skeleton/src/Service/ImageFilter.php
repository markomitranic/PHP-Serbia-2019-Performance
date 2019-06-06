<?php

namespace App\Service;

interface ImageFilter
{
    /**
     * @param string $imagePath
     * @return string
     * @throws \Exception
     */
    public function filter(string $imagePath): string;
}
