<?php
declare(strict_types=1);

namespace Cornatul\Articles\Http\Controllers;


use Cornatul\Articles\Crud\CrudService;
use Cornatul\Articles\Extractor\ExtractorInterface;
use Cornatul\Articles\Interfaces\CrudInterface;
use Cornatul\Articles\Models\Article;
use Cornatul\Articles\Models\Link;
use Cornatul\Articles\Search\SearchInterface;
use Cornatul\Articles\Search\SearchService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;


class ArticleController extends Controller
{

    protected CrudService $articleCrud;
    protected CrudService $linkCrud;

    protected SearchService $searchLink;
    protected SearchService $searchArticle;


    public function __construct(protected ExtractorInterface $extractor)
    {
        $this->articleCrud = new CrudService(new Article());

        $this->linkCrud = new CrudService(new Link());

        $this->searchLink = new SearchService(new Link());

        $this->searchArticle = new SearchService(new Article());

    }


    /**
     * @throws ValidationException
     */

    final public function extract(Request $request): JsonResponse
    {
        $this->validate($request, [
            'link' => 'required|string',
        ]);


        if (!$this->searchLink->exists('link', $request->get('link'))) {

            $link = $this->linkCrud->create([
                'link' => $request->get('link')
            ])->save();

            $response = $this->extractor->extract($request->get('link'));

            return response()->json([
                'data' => $response->toArray()
            ]);
        }

        return response()->json([
            'data' => $this->searchLink->search('link', $request->get('link'))->toArray()
        ]);

    }

    final public function extractAsync(Request $request): JsonResponse
    {
        $this->validate($request, [
            'link' => 'required|string',
        ]);

        if (!$this->searchLink->exists('link', $request->get('link'))) {

            $link = $this->linkCrud->create([
                'link' => $request->get('link')
            ])->save();

            ProcessLink::dispatch($request->get('link'));

            return response()->json([
                'data' => [
                    'message' => 'The link has been sent to processing'
                ]
            ]);
        }

        return response()->json([
            'data' => $this->searchLink->search('link', $request->get('link'))->toArray()
        ]);

    }

}
