<?php

namespace app\Http\Controllers;

use app\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function create(Request $request)
    {
        echo 11313123;
        die;
    }

    public function update(Request $request)
    {
        $product = Product::findOrFail(1);
        $this->authorize('update', $product);
    }
}
