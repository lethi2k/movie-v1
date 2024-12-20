<?php

namespace Modules\Admin\Http\Controllers\Ecommerce\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Core\Models\Tag;

class TagController extends Controller
{
    public function index()
    {
        $tags = Tag::all();
        return response()->json([
            'tags' => $tags,
        ], 201);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
        ]);

        $data = $request->only(['name']);
        $data['alias'] = seo_url($data['name']);
        $data['type'] = 1;
        $data['language_id'] = 1;

        $tag = Tag::updateOrCreate(
            ['name' => $data['name']],
            $data
        );

        return response()->json([
            'success' => true,
            'message' => 'Thêm thành công',
            'tag' => $tag,
        ], 201);
    }
}
