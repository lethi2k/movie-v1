<?php

namespace Modules\Admin\Http\Controllers\Ecommerce;

use App\Http\Controllers\Controller;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\User\Models\User as ModelsUser;
use Session;

class AuthenticationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('admin::authentication.login');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function singup()
    {
        return view('admin::authentication.singup');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function forgot()
    {
        return view('admin::authentication.forgot');
    }

    public function verifyAccount(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $remember = request('remember');
        $data['email'] = request('email');
        $data['password'] = request('password');

        $user = ModelsUser::where('email', $data['email'])
        ->where(function ($query) use ($data) {
            $query->where('password', 'SHA1(CONCAT(salt, SHA1(CONCAT(salt, SHA1(' . htmlspecialchars($data['password'], ENT_QUOTES) . '))))')
                ->Orwhere('password', md5($data['password']))
                ->Orwhere('password', Hash::make($data['password']));
        })->first();

        if ($user == null) {
            session()->flash('error', 'Login details are not valid');

            return redirect()->back();
        }

        auth()->guard('admin')->login($user, $remember);
        if (auth()->guard('admin')->user()->status == 0) {
            session()->flash('warning', 'Tài khoản đã bị ngừng hoạt động');
            auth()->guard('admin')->logout();

            return redirect("auth/admin/login");
        }

        return redirect()->intended('admin/dashboard')->withSuccess('Signed in');
    }

    public function signOut()
    {
        Session::flush();
        Auth::logout();

        return redirect("auth/admin/login");
    }
}
