<?php

namespace Modules\Admin\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Core\Repositories\Interfaces\SettingRepositoryInterface;

class SettingController extends Controller
{
    private $settingService;

    /**
     * @var SettingRepositoryInterface
     */
    public function __construct(SettingRepositoryInterface $settingService)
    {
        $this->settingService = $settingService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin::setting.setting.list');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        return view('admin::setting.setting.store');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $this->settingService->store($request->all());

        return redirect()->back()->with('success', 'Setting created successfully.');
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
