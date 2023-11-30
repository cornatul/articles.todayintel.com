<?php

namespace tests\Unit;

use Cornatul\Articles\Services\ExtractorService;
use Tests\TestCase;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Psr7\Response;
use GuzzleHttp\Exception\GuzzleException;

class ExtractorTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_can_extract()
    {
        // Create a mock for the ClientInterface
        $mockHttpClient = $this->createMock(ClientInterface::class);

        // Set up a sample response for the mock client
        $responseBody = '{"title": "Sample Title", "content": "Sample Content"}';
        $mockHttpClient->method('post')->willReturn(new Response(200, [], $responseBody));

        // Create an instance of ExtractorService with the mock client
        $extractorService = new ExtractorService($mockHttpClient);

        // Call the extract method with a sample link
        $link = 'https://example.com';
        $articleDto = $extractorService->extract($link);

        // Assert that the returned value is an instance of ArticleDto
        $this->assertInstanceOf(ArticleDto::class, $articleDto);

        // Assert the values in the ArticleDto
        $this->assertEquals('Sample Title', $articleDto->getTitle());
        $this->assertEquals('Sample Content', $articleDto->getContent());
    }
}
