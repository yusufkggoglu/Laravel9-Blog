<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Blog::all();
        $user = User::all();
        return view('admin.blog.index', [
            'data' => $data,
            'user' => $user,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Category::all();
        return view('admin.blog.create', [
            'data' => $data,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Blog();
        $data->category_id = $request->category_id;
        $data->user_id =1; //$request->user_id;
        $data->title = $request->title;
        $data->keywords = $request->keywords;
        $data->description = $request->description;
        $data->detail = $request->detail;
        $data->status = $request->status;
        if ($request->file('image')) {
            $data->image = $request->file('image')->store('image');
        }
        $data->save();
        return redirect('admin/blog');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog , $id)
    {
        $data = Blog::find($id);
        return view('admin.blog.show', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog,$id)
    {
        $data = Blog::find($id);
        $datalist = Category::all();
        return view('admin.blog.edit', [
            'data' => $data,
            'datalist' => $datalist,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Blog $blog, $id)
    {
        $data = Blog::find($id);
        $data->category_id = $request->category_id;
        $data->user_id =$request->user_id;
        $data->title = $request->title;
        $data->keywords = $request->keywords;
        $data->description = $request->description;
        $data->detail = $request->detail;
        $data->status = $request->status;
        if ($request->file('image')) {
            $data->image = $request->file('image')->store('images');
        }
        $data->save();
        return redirect('admin/blog');
    }

    public function updatestatus(Request $request, Blog $blog, $id)
    {
        $data = Blog::find($id);
        $data->status = $request->status;
        $data->save();
        return redirect('admin/blog');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Blog $blog
     * @return \Illuminate\Http\Response
     */
    public function destroy( Blog $blog,$id)
    {
        $data = Blog::find($id);
        if ($data->image && Storage::disk('public')->exists($data->image)) {
            Storage::delete("$data->image");
        }
        $data->delete();
        return redirect('admin/blog');
    }
}
