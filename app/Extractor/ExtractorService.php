<?php
declare(strict_types=1);
namespace Cornatul\Articles\Extractor;

use Cornatul\Articles\DTO\ArticleDto;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Support\Facades\Config;

class ExtractorService implements ExtractorInterface
{

    public function __construct(protected ClientInterface $client)
    {

    }

    /**
     * @throws GuzzleException
     */
    final public function extract(string $link):ArticleDto
    {

        $response = $this->client->post(Config::get('article.url'), [
            'json' => [
                'link' => $link
            ],
        ]);

        if ($response->getStatusCode() !== 200) {
            throw new \RuntimeException('Error connecting to the API error code: ' .
                $response->getStatusCode());
        }

        $response =  json_decode($response->getBody()->getContents());

        return new ArticleDto(
            title: $response->data->title,
            text: $response->data->text,
            html: $response->data->html,
            markdown: $response->data->markdown,
            spacy: $response->data->spacy,
            spacy_markdown: $response->data->spacy_markdown,
            keywords: $response->data->keywords,
            images: $response->data->images,
            entities: $response->data->entities,
        );
    }
}