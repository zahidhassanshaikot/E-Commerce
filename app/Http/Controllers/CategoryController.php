<?php

namespace App\Http\Controllers;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(){
        return view('admin.category.add-category');
    }
    public function saveCategoryInfo(Request $request )
    {
        $this->validate($request, [
            'category_name' => 'required|regex:/^[\pL\s\-]+$/u|max:20|min:2',
            'category_description' => 'required',
            'publication_status' => 'required'
        ]);
        $category = new Category();

//        Category::create($request->all());

        $category->category_name = $request->category_name;
        $category->category_description = $request->category_description;
        $category->publication_status = $request->publication_status;
        $category->save();


//        return $request->all();
//        return('success');

//        DB::table('categories')->insert([
//            'category_name'=>$request->category_name,
//            'category_description'=>$request->category_description,
//            'publication_status'=>$request->publication_status,
//
//        ]);

        return redirect('category/add')->with('message','Category Info Save successfully');
    }
    public function manageCategoryInfo(){
        $categories=Category::all();
//        return $categories;
        return view('admin.category.manage-category',['categories'=>$categories]);
    }

    public function unpublishedCategoryInfo($id){
        $category=Category::find($id);
        $category->publication_status=0;
        $category->save();
        return redirect('category/manage')->with('message','Category Info Unpublished');

    }

    public function publishedCategoryInfo($id){
        $category=Category::find($id);
        $category->publication_status=1;
        $category->save();
        return redirect('category/manage')->with('message','Category Info published');

    }
    public function editCategoryInfo($id){
        $category=Category::find($id);

        return view('admin.category.edit-category',['category'=>$category]);

    }

    public function updateCategoryInfo(Request $request){
        $this->validate($request, [
            'category_name' => 'required|regex:/^[\pL\s\-]+$/u|max:20|min:2',
            'category_description' => 'required',
            'publication_status' => 'required'
        ]);
        $category=Category::find($request->category_id);

        $category->category_name=$request->category_name;
        $category->category_description=$request->category_description;
        $category->publication_status=$request->publication_status;
        $category->save();

        return redirect('category/manage')->with('message','Category Info Update');

    }
    public function deleteCategoryInfo($id){
        $category=Category::find($id);
        $category->delete();

        return redirect('category/manage')->with('message','Category Info Delete');

    }

}
