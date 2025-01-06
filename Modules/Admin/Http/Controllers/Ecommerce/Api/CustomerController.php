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
            'email' => 'required',
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

    public function destroy($id)
    {
        $customer = CustomUser::find($id);
        if ($customer) {
            $customer->delete();
            return response()->json([
                'success' => true,
                'message' => 'Xóa thành công',
            ], 201);
        }

        return response()->json([
            'success' => false,
            'message' => 'Không tìm thấy khách hàng',
        ], 404);
    }
    
    public function destroyMultiple(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'ids' => 'required|array|min:1',
            'ids.*' => 'integer|exists:users,id',
        ]);

        // Perform the deletion
        try {
            CustomUser::whereIn('id', $validated['ids'])->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Customers removed successfully.',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'An error occurred while removing customers.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
