<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    public function createpost (Request $request)
    {
        if(Auth::user()) {
            $request->validate([
                'title' => 'required',
                'description' => 'required',


            ]);
            $userid = Auth::id();
            $author = User::findOrFail($userid)->name;


            Post::create([
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'user_id' => $userid,
                'category_id' => $request->input('category'),
                'author' =>  $author
            ]);

            return redirect('/post');
        }
        else {
            return redirect('/login');
        }

    }

    public function editpost ($id){
        $post = DB::select('select * from post where id=?',[$id]);
        $category = Category::get('name' , 'id');
        return view('Edit-Form' , ['editdata' => $post , 'categories' => $category]);


     }

     public function update (Request $request , $id) {
        $title = $request->input('title');
        $description = $request->input('description');
        $category_id = $request->input('category_id');
         DB::update('update post set title=?,description=?,category_id=? where id=?',[$title , $description,$category_id , $id]);
        return redirect('/post');
     }

     public function deletedpost ($id) {
        DB::delete('delete from post where id = ? ' , [$id]);
        return redirect('/post');
    }

    public function postview (){
        if(Auth::user()) {
            return view('post');
        } else {
            return redirect('/login');
        }
    }


    public function getpost(){
        if(Auth::user()) {
            $data = Post::all();
            $category = Category::get('name' , 'id');
            return view('post', ['data' => $data , 'categories' => $category]);
        }
        else {
            return redirect('/login');
        }
    }
}
