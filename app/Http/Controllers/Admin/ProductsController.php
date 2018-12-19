<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    public function index(Request $request)
    {
        $title = "Товары";

        $query = Product::defaultOrder('id');

        if (!empty($value = $request->get('title'))) {
            $query->where('title', 'like', '%' . $value . '%');
        }

        $products = $query->paginate(10);

        $categories = Category::defaultOrder('id')->withDepth()->paginate(5);
        $users = User::orderBy('id')->where('role', User::ROLE_USER)->get();
        return view('admin.products.index', compact('title', 'categories', 'users', 'products'));
    }

    public function create()
    {
        //
        //
        //

    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:255',
            'date_expiration' => 'nullable|string|max:255',
            'unit' => 'required|string|max:255',
            'pcs' => 'required|string|max:255',
            'price' => 'required|string|max:255',
            'parent' => 'nullable|string|exists:products,id',
            'price_two' => 'nullable|string||max:255',
            'price_three' => 'nullable|string||max:255',
            'links' => 'nullable|string||max:255',
            'status' => 'nullable|string||max:255',
            'user_id' => 'nullable|integer|exists:users,id',
            'category_id' => 'nullable|integer|exists:categories,id',
        ]);

        if ($request['user_id'] == null) {
            $user = 1;
        } else {
            $user = $request['user_id'];
        }

        if ($request['category_id'] == null) {
            $category_id = 1;
        } else {
            $category_id = $request['category_id'];
        }
        Product::create([

            'title' => $request['title'],
            'date_expiration' => $request['date_expiration'],
            'unit' => $request['unit'],
            'pcs' => $request['pcs'],
            'price' => $request['price'],
            'parent' => $request['parent'],
            'price_two' => $request['price_two'],
            'price_three' => $request['price_three'],
            'links' => $request['links'],
            'status' => $request['status'],
            'category_id' => $category_id,
            'user_id' => $user,
        ]);


        return redirect()->route('admin.products.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy(User $user, $product)
    {
        if ($user->isAdmin()) {
            $product = Product::findOrFail($product);
            $product->delete();
            return redirect()->route('admin.products.index');
        } return redirect()->route('admin.products.index')->with('error', 'У Вас нет прав для Удаления');
    }
}
