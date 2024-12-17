<?php

namespace Modules\Admin\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Modules\Core\Repositories\Interfaces\StoreRepositoryInterface;
use Modules\User\Repositories\Interfaces\UserRepositoryInterface;

class AccountsController extends Controller
{
    private $usersRepository;
    private $storeService;

    public function __construct(
        UserRepositoryInterface $usersRepository,
        StoreRepositoryInterface $storeService
    ) {
        $this->usersRepository = $usersRepository;
        $this->storeService = $storeService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->usersRepository->getList(request()->all(), 20);
        $groups = $this->usersRepository->getUserGroups(request()->all(), 20);

        return view('admin::setting.accounts.list', compact('users', 'groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $groups = $this->usersRepository->getUserGroups(request()->all(), 20);
        $stores = $this->storeService->getList(request()->all(), 20);

        return view('admin::setting.accounts.create', compact('groups', 'stores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->usersRepository->create($request->all());

        return redirect()->route('admin.setting.accounts')->with('success', 'User has been created');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = $this->usersRepository->edit($id);
        $groups = $this->usersRepository->getUserGroups(request()->all(), 20);
        $stores = $this->storeService->getList(request()->all(), 20);

        return view('admin::setting.accounts.edit', compact('user', 'groups', 'stores'));
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
        $this->usersRepository->update($request->all(), $id);

        return redirect()->route('admin.setting.accounts')->with('success', 'User has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->usersRepository->destroy($id);

        return redirect()->route('admin.setting.accounts')->with('success', 'User has been deleted');
    }

    public function destroyMultiple(Request $request)
    {
        foreach ($request->user_ids as $id) {
            $this->usersRepository->destroy($id);
        }

        return response()->json(['success' => 'xóa danh mục thành công']);
    }

    public function checkName(Request $request)
    {
        $queryData = $this->usersRepository->findByField($request->field, $request->user['email']);
        echo $queryData == null ? "true" : "false";
    }
}
