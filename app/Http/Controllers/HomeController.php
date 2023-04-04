<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use App\Models\Comment;
use App\Models\Message;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Hamcrest\Core\Set;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
class HomeController extends Controller
{
    public function index()
    {
        $data = Blog::with('category')->simplePaginate(2);
        $category = Category::all();
        $user = User::all();
        return view('home.index', [
            'data' => $data,
            'user' => $user,
            'category' => $category,
        ]);
    }

    public function categoryblogs($id)
    {
        $categories = Category::all();
        $category = Category::find($id);
        $blogs = DB::table('blogs')->where('category_id', $id)->simplePaginate(2);
        return view('home.blogcategory', [
            'category' => $category,
            'blogs' => $blogs,
            'categories' => $categories,
        ]);
    }

    public function blog($id)
    {
        $comment = Comment::where('blog_id',$id)->where('status','True')->get();
        $user = User::all();
        $data = Blog::find($id);
        $other = Blog::limit(6)->get();
        return view('home.blog', [
            'data' => $data,
            'user' => $user,
            'other' => $other,
            'comment' => $comment,
        ]);
    }

    public function search(Request $request)
    {
        // $category = Category::all();
        // $user = User::all();
        // $blog = DB::table('blogs')
        //     ->where('title','like',"%{{$s}}%")->all();
        // return view('home.search',[
        //     'user' => $user,
        //     'category' => $category,
        //     'blog' => $blog,
        // ]);
    }

    public function about()
    {
        return view('home.about');
    }
    public function contact()
    {
        return view('home.contact');
    }
    public function storecomment(Request $request)
    {
        $data = new Comment();
        $data->user_id = Auth::id();
        $data->blog_id = $request->input('blog_id');
        $data->comment = $request->input('comment');
        $data->ip = request()->ip();
        $data->save();
        return redirect()->route('blog',['id' => $request->input('blog_id')])->with('success', 'Your Message has been sent , Thank You.');
    }

    public function storemessage(Request $request)
    {
        //dd($request);
        $data = new Message();
        $data->name = $request->input('name');
        $data->email = $request->input('email');
        $data->message = $request->input('message');
        $data->ip = $request->ip();
        $data->save();

        return redirect()->route('contact')->with('info', 'Your Message has been sent , Thank You.');
    }
    public function loginadmincheck(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/admin');

        }
        return back()->withErrors([
            'error' => 'The provided credentials do not  match  our records.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}