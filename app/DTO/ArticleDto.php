<?php

namespace Cornatul\Articles\DTO;
use Spatie\LaravelData\Data;

class ArticleDto extends Data
{
    public function __construct(
     public string $title,
     public string $text,
     public string $html,
     public string $markdown,
     public string $spacy,
     public string $spacy_markdown,
     public array $keywords,
     public array $images,
     public array $entities,
    ){}

}