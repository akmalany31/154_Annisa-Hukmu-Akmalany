<?php

namespace Modules\Shop\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Shop\App\Models\Product;
use Modules\Shop\Repositories\Front\Interfaces\ProductRepositoryInterface;
use Modules\Shop\Repositories\Front\Interfaces\CategoryRepositoryInterface;
use Illuminate\Support\Arr;

class ProductController extends Controller
{
    protected $productRepository;
    protected $categoryRepository;
    protected $defaultPriceRange;
    protected $sortingQuery;

    public function __construct(ProductRepositoryInterface $productRepository, CategoryRepositoryInterface $categoryRepository)
    {
        parent::__construct();

        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->defaultPriceRange = [
            'min' => 10000,
            'max' => 75000,
        ];

        $this->data['categories'] = $this->categoryRepository->findAll();
        $this->data['filter']['price'] = $this->defaultPriceRange;

        $this->sortingQuery = null;
        $this->data['sortingQuery'] = $this->sortingQuery;
        $this->data['sortingOptions'] = [
            '' => '-- Sort Products --',
            '?sort=price&order=asc' => 'Price: Low to High',
            '?sort=price&order=desc' => 'Price: High to Low',
            '?sort=publish_date&order=desc' => 'Newest Item',
        ];
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index(Request $request)
    {
        $priceFilter = $this->getPriceRangeFilter($request);

        $options = [
            'per_page' => $this->perPage,
            'filter' => [
                'price' => $priceFilter,
            ],
        ];

        if ($request->get('price')) {
            $this->data['filter']['price'] = $priceFilter;
        }

        if ($request->get('sort')) {
            $sort = $this->sortingRequest($request);
            $options['sort'] = $sort;

            $this->sortingQuery = '?sort=' . $sort['sort'] . '&order=' . $sort['order'];

            $this->data['sortingQuery'] = $this->sortingQuery;
        }



        $this->data['products'] = $this->productRepository->findAll($options);
        //dd('products');
        return $this->loadTheme('products.index', $this->data);
    }

    public function show($categorySlug, $productSlug)
    {
        $sku = Arr::last(explode('-', $productSlug));

        $product = $this->productRepository->findBySKU($sku);

        $this->data['product'] = $product;

        return $this->loadTheme('products.show', $this->data);
    }
    /**
     * Show the form for creating a new resource.
     */

    public function category($categorySlug)
    {
        $category = $this->categoryRepository->findBySlug($categorySlug);

        $options = [
            'per_page' => $this->perPage,
            'filter' => [
                'category' => $categorySlug,
            ]
        ];

        $this->data['products'] = $this->productRepository->findAll($options);
        $this->data['category'] = $category;

        return $this->loadTheme('products.category', $this->data);
    }

    function getPriceRangeFilter($request)
    {
        if (!$request->get('price')) {
            return [];
        }

        $prices = explode(' - ', $request->get('price'));
        if (count($prices) < 0) {
            return $this->defaultPriceRange;
        }

        return [
            'min' => (int) $prices[0],
            'max' => (int) $prices[1],
        ];
    }

    function sortingRequest(Request $request)
    {
        $sort = [];

        if ($request->get('sort') && $request->get('order')) {
            $sort = [
                'sort' => $request->get('sort'),
                'order' => $request->get('order'),
            ];
        } else if ($request->get('sort')) {
            $sort = [
                'sort' => $request->get('sort'),
                'order' => 'desc',
            ];
        }

        return $sort;
    }
}
