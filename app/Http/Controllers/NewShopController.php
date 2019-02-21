<?php

namespace App\Http\Controllers;

use App\Category;

use App\Product;
use Illuminate\Http\Request;

class NewShopController extends Controller
{
    public function index(){
//        $categories=Category::where('publication_status',1)->get();
        $newProducts=Product::where('publication_status',1)
                            ->orderBy('id','DESC')
                            ->take(8)
                            ->get();
//        return $newProducts;
        return view('front-end.home.home',[
//            'categories'=>$categories,
            'newProducts'=>$newProducts
        ]);
    }



    public function categoryProduct($id){
//        $categories=Category::where('publication_status',1)->get();
        $categoryProducts=Product::where('category_id',$id)
                ->where('publication_status',1)
                ->get();

        return view('front-end.product.category-product',[
//        'categories'=>$categories
            'categoryProducts'=>$categoryProducts,

            ]);
    }
    public function brandProduct($id){
//        $categories=Category::where('publication_status',1)->get();
        $brandProducts=Product::where('brand_id',$id)
                ->where('publication_status',1)
                ->get();

        return view('front-end.product.brand-product',[
//        'categories'=>$categories
            'brandProducts'=>$brandProducts
            ]);
    }


    public function code(){
        return view('front-end.code');
    }

    public function femaleProduct(){
        return view('front-end.category.female-product');
    }
    public function maleProduct(){
        return view('front-end.category.male-product');
    }

    public function mailUs(){
        return view('front-end.mail-us');
    }
    public function singleProduct($id){
        $product=Product::find($id);
        
        return view('front-end.category.single-product',['product'=>$product]);
    }
    public function login(){
        return view('front-end.login');
    }

}
