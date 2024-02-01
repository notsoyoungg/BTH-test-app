<?php

namespace App\Http\Controllers;

use App\Mail\ProductCreated;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rule;

class ProductController extends Controller
{
    public function index()
    {
        return view('index', ['products' => Product::available()->get()]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
        $request->validate([
            'article' => 'required|unique:products|regex:/^[a-zA-Z0-9]+$/',
            'name' => 'required|min:10',
        ]);
        $attrs = $request->all();
        if ($request->attribute_name && $request->attribute_value) {
            $keys = $request->attribute_name;
            $values = $request->attribute_value;

            $result = array_combine($keys, $values);
            dump($result);
            $attrs['data'] = json_encode($result);

        }
        $product = Product::create($attrs);
        // отправка письма
        $email = config('product.email');
        Mail::to($email)->queue(new ProductCreated($product));

        return redirect()->back();
    }

    public function show($id)
    {
        return view('show-product', ['product' => Product::find($id) ?? null]);
    }

    public function edit($id)
    {
        info('edit');
        $product = Product::find($id);
        if ($product)
            $body = (string) view()->make('modal-edit-product', [
                'product' => $product,
            ])->render();
        return response()->json(['response' => 0, 'body' => $body ?? ""]);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'article' => [
                'required',
                'regex:/^[a-zA-Z0-9]+$/',
                Rule::unique('products')->ignore($id),
            ],
            'name' => 'required|min:10',
        ]);
        $attrs = $request->all();
        if ($request->attribute_name && $request->attribute_value) {
            $keys = $request->attribute_name;
            $values = $request->attribute_value;

            $result = array_combine($keys, $values);
            dump($result);
            $attrs['data'] = json_encode($result);

        }
        $product = Product::find($id);
        $product?->update($attrs);

        return redirect()->back();
    }

    public function destroy(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect(route('product.index'));
    }
}
