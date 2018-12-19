<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CategoriesController extends Controller
{

    public function index()
    {
        $title = "Список Торгов";
        $categories = Category::defaultOrder('id')->withDepth()->paginate(20);
        $users = User::orderBy('id')->where('role', User::ROLE_USER)->get();
        return view('admin.categories.index', compact('title', 'categories', 'users'));
    }

    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'number' => 'nullable|string|max:255',
            'date_expiration' => 'nullable|string|max:255',
            'slug' => 'required|string|max:255',
            'parent' => 'nullable|integer|exists:categories,id',
            'user_id' => 'nullable|integer|exists:users,id',
        ]);

        if ($request['user_id'] == null) {
            $user = 1;
        } else {
            $user = $request['user_id'];
        }
        Category::create([
            'name' => $request['name'],
            'number' => $request['number'],
            'date_expiration' => $request['date_expiration'],
            'slug' => $request['slug'],
            'parent_id' => $request['parent'],
            'user_id' => $user,
        ]);

        return redirect()->route('admin.categories.index');
    }


    public function show(Category $category)
    {
        $products = Product::orderBy('id')->where('category_id', $category->id)->paginate(15);
        return view('admin.categories.show', compact('category', 'products'));
    }


    public function edit(User $user, $id)
    {
        if ($user->isAdmin()) {
            return view('admin.categories.edit');
        } return redirect()->route('admin.categories.index')->with('error', 'У Вас нет прав для редактирования');
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
