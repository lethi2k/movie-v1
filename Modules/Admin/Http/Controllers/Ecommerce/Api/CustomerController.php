<?php

namespace Modules\Admin\Http\Controllers\Ecommerce\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Core\Models\CustomUser;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = CustomUser::all();
        return response()->json([
            'customers' => $customers,
        ], 201);
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
            'name' => 'nullable|string',
        ]);

        $data = $request->only(['email', 'password']);
        $data['name'] = '';

        $customer = CustomUser::updateOrCreate(
            ['email' => $data['email']],
            $data
        );
        return response()->json([
            'success' => true,
            'message' => 'Thêm thành công',
            'customer' => $customer,
        ], 201);
    }
}
