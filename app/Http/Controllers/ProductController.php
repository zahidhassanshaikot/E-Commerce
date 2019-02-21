<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Brand;
use App\Product;
use Image;
use DB;

class ProductController extends Controller
{
    public function index() {
        $categories = Category::where('publication_status', 1)->get();
        $brands = Brand::where('publication_status', 1)->get();

        return view('admin.product.add-product', [
            'categories'    => $categories,
            'brands'        => $brands,
        ]);
    }
    protected function productInfoValidate($request) {
        $this->validate($request, [
//            'category_id' => 'required',
//            'brand_id' => 'required',
            'product_name' => 'required|max:30|min:2',
            'product_price' => 'required|numeric',
            'product_quantity' => 'required|numeric',
            'short_description' => 'required|max:80',
            'long_description' => 'required|min:20',
            'product_image' => 'required',
            'publication_status' => 'required',
        ]);
    }

    protected function productImageUpload($request) {
        $productImage = $request->file('product_image');
        $fileType = $productImage->getClientOriginalExtension();
        $imageName = $request->product_name.'.'.$fileType;
        $directory = 'product-images/';
        $imageUrl = $directory.$imageName;
        Image::make($productImage)->resize(200, 200)->save($imageUrl);
        return $imageUrl;
    }

    protected function saveProductBasicInfo($request, $imageUrl) {
        $product = new Product();
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        $product->product_image = $imageUrl;
        $product->publication_status = $request->publication_status;
        $product->save();
    }

    public function saveProduct(Request $request) {
        $this->productInfoValidate($request);
        $imageUrl = $this->productImageUpload($request);
        $this->saveProductBasicInfo($request, $imageUrl);

        return redirect('/product/add')->with('message', 'Product info save successfully');
    }

    public function manageProduct() {
        $products = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.id')
            ->join('brands', 'products.brand_id', '=', 'brands.id')
            ->select('products.*', 'categories.category_name', 'brands.brand_name')
            ->get();

//        return $products;


        return view('admin.product.manage-product', ['products'=>$products]);
    }

    public function unpublishedProductInfo($id){
        $product=Product::find($id);
        $product->publication_status=0;
        $product->save();
        return redirect('/product/manage')->with('message','product info is Unpublished');
    }
    public function publishedProductInfo($id){
        $product=Product::find($id);
        $product->publication_status=1;
        $product->save();
        return redirect('/product/manage')->with('message','Product info is published');
    }

    public function editProductInfo($id){
        $categories = Category::where('publication_status', 1)->get();
        $brands = Brand::where('publication_status', 1)->get();
        $product=Product::find($id);
        return view('admin.product.edit-product',[
            'product'=>$product,
            'categories'    => $categories,
            'brands'        => $brands,
        ]);
    }

    public function productBasicInfoUpdate( $product,Request $request,$imageUrl=null ){
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->product_name = $request->product_name;
        $product->product_price = $request->product_price;
        $product->product_quantity = $request->product_quantity;
        $product->short_description = $request->short_description;
        $product->long_description = $request->long_description;
        if($imageUrl)
        {
            $product->product_image = $imageUrl;
        }
        $product->publication_status = $request->publication_status;
        $product->save();
    }

    public function updateProduct(Request $request){

//        $productImage=$_FILES['product_image'];

        $product=Product::find($request->product_id);
        $productImage=$request->file('product_image');
        if($productImage){

            unlink($product->product_image);
            $imageUrl = $this->productImageUpload($request);
            $this->productBasicInfoUpdate($product,$request,$imageUrl);

        }else{
            $this->productBasicInfoUpdate($product, $request);
        }
        return redirect('/product/manage')->with('message','product Info Update');
//        $this->productInfoValidate($request);
//        $imageUrl = $this->productImageUpload($request);





    }

    public function deleteProductInfo(Request $request, $id){
        $product=Product::find($id);
        @unlink($product->product_image);
        $product->delete();
        return redirect('product/manage')->with('message','Product Info Delete');
    }

}




//
//    public function saveProduct(Request $request) {
//        $this->validate($request, [
//
//        ]);
//
//        $productImage = $request->file('product_image');
//        $imageName = $productImage->getClientOriginalName();
//        $directory = 'product-images/';
//        $imageUrl = $directory.$imageName;
//        $productImage->move($directory, $imageName);
//
//
//        $product = new Product();
//        $product->category_id = $request->category_id;
//        $product->brand_id = $request->brand_id;
//        $product->product_name = $request->product_name;
//        $product->product_price = $request->product_price;
//        $product->product_quantity = $request->product_quantity;
//        $product->short_description = $request->short_description;
//        $product->long_description = $request->long_description;
//        $product->product_image = $imageUrl;
//        $product->publication_status = $request->publication_status;
//
//        $product->save();
//
//        return redirect('product/add')->with('message','Product Info Save successfully');
//
//    }
//}
