<?php

namespace Modules\Movie\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Modules\Customer\Models\Customer as CustomerModel;
use Modules\Movie\Http\Requests\LoginRequest;
use Illuminate\Contracts\Support\Renderable;
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
        $categories = $this->categoryService->getList($request->all(), 100);
        $products_banner = $this->productService->getList([
            'filter' => [
                'viewed' => 'desc',
                'limit' => 9
            ]
        ], 9);

        $products_latest = $this->productService->getList([
            'filter' => [
                'date_added' => 'desc',
                'limit' => 18
            ]
        ], 18);

        $products_anime = $this->productService->getList([
            'filter' => [
                'date_added' => 'desc',
                'category' => [
                    'category_id' => 2
                ],
                'limit' => 18
            ]
        ], 18);

        $products_cartoon = $this->productService->getList([
            'filter' => [
                'date_added' => 'desc',
                'category' => [
                    'category_id' => 3
                ],
                'limit' => 18
            ]
        ], 18);

        $products_rate = $this->productService->getList([
            'filter' => [
                'rate' => 'desc',
                'limit' => 18
            ]
        ], 18);

        $products_trending = $this->productService->getList([
            'filter' => [
                'viewed' => 'desc',
                'limit' => 9
            ]
        ], 12);

        return view('movie::home', [
            'categories' => $categories,
            'products_latest' => $products_latest,
            'products_anime' => $products_anime,
            'products_cartoon' => $products_cartoon,
            'products_rate' => $products_rate,
            'products_trending' => $products_trending,
            'products_banner' => $products_banner
        ]);
    }

    public function request(){
        return view('movie::request');
    }

    public function contact(){
        return view('movie::contact');
    }

    public function faq(){
        return view('movie::faq');
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
    public function show(Request $request, $slug, $episode)
    {
        $url = UrlAlias::where('keyword', $slug)->first();
        if ($url == null) {
            return view("movie::errors.404", ['previous' => route('home.index')]);
        }

        $data = $this->productService->edit(explode("=", $url->query)[1]);
        $option = $data['product']->options->where('episode', $episode)->first();

        if (!$option) {
            return view("movie::errors.404", ['previous' => route('home.index')]);
        }
        $products_trending = $this->productService->getList([
            'filter' => [
                'viewed' => 'desc',
                'not_product_id' => $data['product']->product_id,
                'limit' => 12
            ]
        ], 12);

        $products_latest = $this->productService->getList([
            'filter' => [
                'not_product_id' => $data['product']->product_id,
                'date_added' => 'desc'
            ]
        ], 30);

        $products_related = $this->productService->getList([
            'filter' => [
                'not_product_id' => $data['product']->product_id,
                'categories' => $data['product']->categories->pluck('category_id')->toArray(),
                'date_added' => 'desc'
            ]
        ], 15);

        return view(
            'movie::detail',
            [
                'product' => $data['product'],
                'option' => $option,
                'products_trending' => $products_trending,
                'products_latest' => $products_latest,
                'products_related' => $products_related
            ]
        );
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
