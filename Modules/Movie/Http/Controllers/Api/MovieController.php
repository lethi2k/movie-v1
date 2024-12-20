<?php

namespace Modules\Movie\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Modules\Customer\Models\Customer as CustomerModel;
use Modules\Movie\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Category\Repositories\Interfaces\CategoryRepositoryInterface;
use Modules\Core\Models\UrlAlias;
use Modules\Movie\Http\Requests\RegisterRequest;
use Modules\Product\Repositories\Interfaces\ProductRepositoryInterface;

class MovieController extends Controller
{
    private $categoryService;
    private $productService;

    public function __construct(
        CategoryRepositoryInterface $categoryService,
        ProductRepositoryInterface $productService
    ) {
        $this->categoryService = $categoryService;
        $this->productService = $productService;
    }

    public function index(Request $request)
    {
        $filter = [
            'filter' => $request->only(['keyword', 'categories'])
        ];

        $filter['filter']['date_added'] = 'desc';
        $filter['filter']['category'] = [
            'category_id' => 2
        ];

        if ($request->category) {
            $categories = $this->categoryService->getList(['category_name' => slugToTitle($request->category)], 20);
            $filter['filter']['categories'] = $categories->pluck('category_id')->toArray();
        }

        if ($request->keyword) {
            $filter['filter']['product'] = [
                'key' => 'name',
                'value' => $request->keyword
            ];
        }

        $products = $this->productService->getList($filter, 24);

        return response()->json([
            'products' => $products,
        ]);
    }

    public function lastUpdate()
    {
        $products = $this->productService->getList([
            'filter' => [
                'date_added' => 'desc',
                'limit' => 9
            ]
        ], 18);

        return response()->json([
            'products' => $products,
        ]);
    }

    public function productsTrend()
    {
        $products = $this->productService->getList([
            'filter' => [
                'viewed' => 'desc',
                'limit' => 9
            ]
        ], 12);

        return response()->json([
            'products' => $products,
        ]);
    }

    public function categories(Request $request)
    {
        $categories = $this->categoryService->getList($request->all(), 100);
        return response()->json([
            'categories' => $categories,
        ]);
    }

    public function products(Request $request)
    {
        $filter = [
            'filter' => $request->only(['keyword', 'categories'])
        ];

        $filter['filter']['date_added'] = 'desc';

        if ($request->category) {
            $categories = $this->categoryService->getList(['category_name' => slugToTitle($request->category)], 20);
            $filter['filter']['categories'] = $categories->pluck('category_id')->toArray();
        }

        if ($request->keyword) {
            $filter['filter']['product'] = [
                'key' => 'name',
                'value' => $request->keyword
            ];
        }

        $products = $this->productService->getList($filter, 30);

        return response()->json([
            'products' => $products,
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category(Request $request)
    {
        $category_parents = $this->categoryService->getList([], 100);
        $filter = [
            'filter' => $request->only(['keyword', 'categories', 'countries', 'years'])
        ];

        $filter['filter']['date_added'] = 'desc';

        if ($request->category) {
            $categories = $this->categoryService->getList(['category_name' => slugToTitle($request->category)], 20);
            $filter['filter']['categories'] = $categories->pluck('category_id')->toArray();
        }

        if ($request->keyword) {
            $filter['filter']['product'] = [
                'key' => 'name',
                'value' => $request->keyword
            ];
        }

        $products_latest = $this->productService->getList($filter, 30);
        $products_trending = $this->productService->getList([
            'filter' => [
                'viewed' => 'desc',
                'limit' => 9
            ]
        ], 12);

        return view('movie::category', [
            'products_latest' => $products_latest,
            'products_trending' => $products_trending,
            'category_parents' => $category_parents,
            'filter' => $filter
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $url = UrlAlias::where('keyword', $slug)->first();
        if ($url == null) {
            return response()->json([
                'error' => 'Not Found',
                'message' => 'The requested URL does not exist.',
                'previous' => route('home.index'),
            ], 404);
        }

        $data = $this->productService->edit(explode("=", $url->query)[1]);
        $option = $data['product']->options->first();

        if (!$option) {
            return response()->json([
                'error' => 'Not Found',
                'message' => 'The product option does not exist.',
                'previous' => route('home.index'),
            ], 404);
        }

        return response()->json([
            'product' => $data['product'],
        ]);
    }

    public function preview($slug, Request $request)
    {
        $url = UrlAlias::where('keyword', $slug)->first();
        if ($url == null) {
            return view("admin::error.404", ['previous' => route('home')]);
        }

        $data = $this->productService->edit(explode("=", $url->query)[1]);
        $products_latest = $this->productService->getList([
            'filter' => [
                'not_product_id' => $data['product']->product_id,
                'date_added' => 'desc'
            ]
        ], 30);

        return view(
            'movie::preview',
            [
                'product' => $data['product'],
                'products_latest' => $products_latest
            ]
        );
    }

    public function login()
    {
        return view('movie::auth.login');
    }

    public function verifyAccount(LoginRequest $request)
    {
        $user = CustomerModel::where('email', $request['email'])
            ->where(function ($query) use ($request) {
                $query->where('password', 'SHA1(CONCAT(salt, SHA1(CONCAT(salt, SHA1(' . htmlspecialchars($request['password'], ENT_QUOTES) . '))))')
                    ->Orwhere('password', md5($request['password']))
                    ->Orwhere('password', Hash::make($request['password']));
            })->first();

        if ($user == null) {
            session()->flash('error', 'Chi tiết đăng nhập không hợp lệ');

            return redirect()->back();
        }

        auth()->guard('customer')->login($user);
        if (auth()->guard('customer')->user()->status == 0) {
            session()->flash('warning', 'Tài khoản đã bị ngừng hoạt động');
            auth()->guard('customer')->logout();

            return redirect()->route('/login');
        }

        return redirect()->intended('/')->withSuccess('Đăng nhập thành công');
    }

    public function forgotPassword()
    {
        return view('movie::auth.forgot-password');
    }

    public function register()
    {
        return view('movie::auth.register');
    }

    public function signUp(RegisterRequest $request)
    {
        $data = [
            'customer_group_id' => 1,
            'store_id' => 0,
            'language_id' => 1,
            'name' => $request['username'],
            'email' => $request['email'],
            'telephone' => 0,
            'fax' => 0,
            'newsletter' => 0,
            'address_id' => 0,
            'custom_field' => '[]',
            'ip' => $request->ip(),
            'status' => 1,
            'approved' => 0,
            'safe' => 0,
            'token' => '',
            'code' => '',
            'note' => null,
            'gender' => 1,
            'birthday' => date('Y-m-d', strtotime("now")),
            'password' => md5($request['password']),
        ];

        CustomerModel::create($data);

        return redirect()->action([MovieController::class, 'login'])->withSuccess('Đăng nhập thành công');;
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return redirect("/");
    }
}
