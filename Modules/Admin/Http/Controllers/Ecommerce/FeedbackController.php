<?php

namespace Modules\Admin\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Customer\Repositories\Interfaces\NewsletterRepositoryInterface;

class FeedbackController extends Controller
{
    private $newsletterService;

    public function __construct(NewsletterRepositoryInterface $newsletterService)
    {
        $this->newsletterService = $newsletterService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feedbacks = $this->newsletterService->getList(request()->all(), 10);

        return view('admin::ecommerce.customer.feedback', compact('feedbacks'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter()
    {
        $feedbacks = $this->newsletterService->getList(request()->all(), 10);
        $filter = request()->all();

        return view('admin::ecommerce.customer.feedback', compact('feedbacks', 'filter'));
    }

    public function status($status)
    {
        $filter = request()->all();
        $filter['viewed'] = $status;
        $feedbacks = $this->newsletterService->getList($filter, 10);

        return view('admin::ecommerce.customer.feedback', compact('feedbacks', 'status'));
    }

    public function confirm($id)
    {
        $this->newsletterService->update(['viewed' => 1], $id);

        return redirect()->back()->with('success', 'Confirmed successfully');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
