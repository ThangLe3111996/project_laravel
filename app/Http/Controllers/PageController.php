<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products as AppProducts;
use App\Categories as AppCategories;

class PageController extends Controller
{
    public function getIndex() {
        $categories = AppCategories::get();
        $arr = array();
        foreach($categories as $cate) {
            $productHome = AppProducts::where(['categories_id' => $cate->id])->paginate(3);
            $arr[$cate->id] = $productHome;
        }
        return view('home', compact('productHome', 'arr', 'categories'));
    }

    public function getCategories($categories) {
        $categoryView = AppProducts::where('id',$categories)->get();
        $productView = AppProducts::where('categories_id',$categories)->get();
        $typeproductView = AppCategories::where('id',$categories)->get();
        return view('view_categories',compact('categoryView','typeproductView','productView'));
    }

    public function getProduct($data) {
        $productDetail = AppProducts::where('id',$data)->first();
        return view('product_detail',compact('productDetail'));
    }

    public function getSearch(Request $result) {
        $itemSearch = AppProducts::where('name','like','%'. $result->key.'%')
                                ->orWhere('unit_price',$result->key)
                                ->get();
        return view('search_result',compact('itemSearch'));
    }
}
