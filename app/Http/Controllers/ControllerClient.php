<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\View;
use App\Category;
use App\CategoryDetail;

class ControllerClient extends Controller
{
    public function __construct()
    {
        $this->getMenu();
    }
    public function getMenu()
    {
    	$categories = Category::all();
        $category_detail = [];
        foreach ($categories as $key => $category) {
        	$category_detail[$key] = CategoryDetail::where('fk_category_detail_id', $category->pk_category_id)->get(); 
        }
        $array = ['categories' => $categories, 'category_detail' => $category_detail];
        View::share('menu', $array);
    }

}
