<?php

namespace Cornatul\Articles\Extractor;

use Cornatul\Articles\DTO\ArticleDto;

/**
 * Interface ExtractorInterface
 * @package Cornatul\Articles\Interfaces
 */
interface ExtractorInterface
{
    public function extract(string $link): ArticleDto;
}