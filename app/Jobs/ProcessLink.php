<?php

namespace Cornatul\Articles\Jobs;


use Cornatul\Articles\Interfaces\ExtractorInterface;
use Cornatul\Articles\Repositories\LinkCrud;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessLink implements ShouldQueue
{
    use InteractsWithQueue, Queueable, SerializesModels;

    protected string $link;

    public function __construct(string $link)
    {
        $this->link = $link;
    }

    public function handle(LinkCrud $linkCrudRepository, ExtractorInterface $extractor)
    {
        // Create the link in the repository
        $linkModel = $linkCrudRepository->create(['link' => $this->link]);
        $linkModel->save();

        // Extract data using the extractor
        $response = $extractor->extract($this->link);

        // You can do further processing with the $response if needed

        // For example, associate the extracted data with the link model
        $linkModel->linkable()->associate($response)->save();
    }
}
