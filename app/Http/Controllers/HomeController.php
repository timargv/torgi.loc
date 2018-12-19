<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $title = "Товары";
        $title_category = "Торги";

        $query = Product::orderByDesc('id');

        if (!empty($value = $request->get('title'))) {
            $query->where('title', 'like', '%' . $value . '%');
        }
        $products = $query->paginate(5);

        $categories = Category::defaultOrder('id')->withDepth()->paginate(5);
        $users = User::orderBy('id')->where('role', User::ROLE_USER)->get();
        return view('home', compact('title', 'categories', 'users', 'products', 'title_category'));
    }
}
