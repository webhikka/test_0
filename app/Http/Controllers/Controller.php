<?php

namespace App\Http\Controllers;

use App\Events\NewsCreatedEvent;
use App\Events\ProductCreatedEvent;
use App\Models\CompanyNews;
use App\Models\CompanyProduct;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

/**
 * Class Controller
 * @package App\Http\Controllers
 */
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /** @var CompanyNews */
    private $companyNews;
    /** @var CompanyProduct */
    private $companyProduct;

    /**
     * Controller constructor.
     * @param CompanyNews $companyNews
     * @param CompanyProduct $companyProduct
     */
    public function __construct(CompanyNews $companyNews, CompanyProduct $companyProduct)
    {
        $this->companyNews = $companyNews;
        $this->companyProduct = $companyProduct;
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function createNews(Request $request): bool
    {
        $created = $this->companyNews::create([
            'title' => $request->title,
            'content' => $request->news_content,
        ]);

        // laravel-echo-server - к сожалению сейчас не разбираюсь в нем, поэтому решил делать иначе:
        if ($created !== null) {
            event(new NewsCreatedEvent($created, Auth::id()));
        }

        return $created !== null;
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function createProduct(Request $request): bool
    {
        $created = $this->companyProduct::create([
            'name' => $request->name,
            'price' => $request->price,
        ]);

        if ($created !== null) {
            event(new ProductCreatedEvent($created, Auth::id()));
        }

        return $created !== null;
    }
}
