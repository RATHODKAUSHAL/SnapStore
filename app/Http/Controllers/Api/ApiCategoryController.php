<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\categoryMaster;
use Illuminate\Http\Request;

class ApiCategoryController extends Controller
{
    //
    public function index() {
        $category = categoryMaster::get();

        if ($category->count() > 0) {
            return response()->json([
                'status' => 200,
                'category' => $category->toArray(),
                'success' => true
            ], 200);
        } else {
            return  response()->json([
                'status' => 404,
                'message' => 'No category found'
            ], 404);
        }
    }
}
