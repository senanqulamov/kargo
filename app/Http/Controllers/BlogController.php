<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Blog;

use Validator;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    public function index(){
        $blogs=Blog::orderBy('created_at','desc')->get();
        $page_title = "Blogs";

        return view('frontend.blogs', compact('blogs' , 'page_title'));
    }

    public function detail($slug){
        $details=Blog::where('slug', $slug)->first();
        $page_title = "Blogs";

        return view('frontend.blog', compact('details' , 'page_title'));
    }

    public function indexAdmin(){
        $blogs=Blog::orderBy('created_at','desc')->get();
        $page_title = "Blogs";

        return view('backend.blogs', compact('blogs' , 'page_title'));
    }

	public function createAdmin(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'inputTitle' => 'required|min:3|max:225',
            'textareaDescription' => 'required|min:3',
            'fileImage' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif|max:10000'
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        } else {
            $services=new Blog;
            $services->category=$request->category;
            $services->title=$request->inputTitle;
            $services->slug=Str::slug($request->inputTitle, '-');
            $services->description=$request->textareaDescription;

            $file_name = time().'.'.$request->fileImage->extension();
            $request->fileImage->move(public_path('frontend/img/blog'), $file_name);
            $services->img=$file_name;

            $services->save();

            return response()->json(['status'=>1, 'msg'=>'Blog was successfully registered', 'state'=>'Congratulations!']);
        }
    }

	public function editAdmin(Request $request)
    {
        $services=Blog::find($request->id);

        return response()->json([
            'status' => 200,
            'data' => $services,
        ]);
    }

    public function updateAdmin(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'inputTitle2' => 'required|min:3|max:225',
            'textareaDescription2' => 'required|min:3',
            'fileImage2' => 'image|mimes:jpeg,png,jpg,gif,svg,jfif|max:10000'
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        } else {

            $id=$request->input('hiddenID');

            $services=Blog::find($id);

            $services->title=$request->inputTitle2;
            $services->category=$request->category;
            $services->slug=Str::slug($request->inputTitle2, '-');
            $services->description=$request->textareaDescription2;

            File::delete('frontend/img/blog/'.$services->img);

            $file_name = time().'.'.$request->fileImage2->extension();
            $request->fileImage2->move(public_path('frontend/img/blog'), $file_name);
            $services->img=$file_name;

            $services->update();

            return response()->json(['status'=>1, 'msg'=>'Services company has been successfully updated', 'state'=>'Congratulations!']);
        }
    }

    public function deleteAdmin($id){

        $image = Blog::findOrFail($id);
        $file= $image->img;

        File::delete('frontend/img/blog/'.$file);

        Blog::where('id', $id)->delete();
        toastr()->success('Blog was successfully deleted', 'Congratulations!');
        return redirect()->route('admin.blogs.index');
    }
}
