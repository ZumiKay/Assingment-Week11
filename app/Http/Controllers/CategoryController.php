<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    //
    public function index ($id) {
        $categoryid = $id;
        return ($categoryid);
    }
    public function categoryView () {
        if(Auth::user()) {
            return view('Category');
        } else {
            return view('Login');
        }
    }

    public function createCategory(Request $request){

       Category::create([
           'name' => $request->input('name'),
           'content' => $request->input('content')
       ]);

       return redirect('/category');



    }
    public function getCategory ()
    {
        if(Auth::user()) {
            $category = Category::all();
            return view('Category', ['category' => $category]);
        }
        else {
            return view('Login');
        }

    }
    public function editCategory($id){
        $category = DB::select('select * from category where id=?',[$id]);
        return view('EditCategories' , ['category' => $category]);

    }
    public function updateCategory (Request $request , $id){
        $name = $request->input('name');
        $content = $request->input('content');
        DB::update('update category set name=?,content=? where id=?',[$name , $content , $id]);
        return redirect('/category');

    }
    public function deleteCategory($id){
        DB::delete('delete from category where id = ? ' , [$id]);
        return redirect('/category');

    }

}
