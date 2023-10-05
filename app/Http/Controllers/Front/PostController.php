<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Category;
use App\Models\Post;
use Auth;

class PostController extends Controller
{
    
    public function __construct() {

    }

    public function home() {

        $offset = isset($_GET['ofs']) ? intval($_GET['ofs']) : 0;
        $total_posts = Post::select('id')->where('status', 1)->count();
        $limit = 1;
        $has_prev = ($offset < $total_posts-1) ? true : false;
        $has_next = ($offset > 0) ? true : false;
        $prev_offset = ($has_prev) ? $offset+1 : null;
        $next_offset = ($offset > 0) ? $offset-1 : null;
        // $has_new = 
        // dd($offset, $total_posts, $limit);
        $posts = $recent= Post::select('posts.*', 'u.name')->leftJoin('users as u', 'u.id', 'posts.crt_by')->where('posts.status', 1)->orderBy('posts.id', 'desc')->limit($limit)->offset($offset)->get();
        return view('front.home', compact('posts', 'recent', 'has_prev', 'has_next', 'prev_offset', 'next_offset'));

    }

    public function new_blog() {

        return view('front.blog.create');

    }

    public function get_cats() {

        $categories = Category::select('*')->where('status', 1)->get();

        return response()->json(['success' => 1, 'data' => $categories]);

    }

    public function post_create_new_blog(Request $request) {

        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255|unique:posts,title',
            'content' => 'required|string|',
            'category' => 'required|string',
        ],
        [
            'title.required' => 'Please enter title',
            'title.unique' => 'Blog with this title already exists!',
            'content.required' => 'Please enter content',
            'category.required' => 'Please enter category',
        ]);

        if ($validator->passes()) {

            $title = (isset($request->title)) ? trim($request->title) : '';
            $content = (isset($request->content)) ? trim($request->content) : '';
            $category = (isset($request->category)) ? trim($request->category) : '';
            $type = (isset($request->type)) ? intval($request->type) : 0;
            $cat_id = $this->get_cat_id_by_name($category);

            if ($cat_id <= 0) {
                $cat_id = $this->create_new_category($category);
            }

            $now_date = date('Y-m-d H:i:s'); 

            $post = new Post();
            $post->title = $title;
            $post->content = $content;
            $post->image = '';
            $post->status = $type;
            $post->cat_id = $cat_id;
            $post->crt_on = $now_date;
            $post->crt_by = Auth::user()->id;
            $post->updt_on = $now_date;
            $post->updt_by = Auth::user()->id;

            if ($post->save()) {
                if ($type == 1) {
                    return response()->json(['success' => 1, 'msg' => 'Blog published successfully!']);
                }
                return response()->json(['success' => 1, 'msg' => 'Blog saved successfully!']);
            } else {
                return response()->json(['success' => 0, 'msg' => 'Something went wrong! Please try again.']);
            }

        } else {
            return response()->json(['success' => 2, 'msgs' => $validator->errors()]);
        }

    }

    public function get_cat_id_by_name($category) {

        $details = Category::select('id')->where('name', $category)->first();
        
        return (isset($details) && $details->id != null) ? $details->id : 0;

    }

    public function create_new_category($category) {

        $now_date = date('Y-m-d H:i:s');

        $cat = new Category();
        $cat->name = $category;
        $cat->status = 1;
        $cat->crt_by = Auth::user()->id;
        $cat->crt_on = $now_date;
        
        return ($cat->save()) ? $cat->id : 0;

    }

    public function get_cat_blogs(Request $request, $slug) {

        $recent = Post::select('posts.*', 'u.name')->leftJoin('users as u', 'u.id', 'posts.crt_by')->where('posts.status', 1)->orderBy('posts.id', 'desc')->limit('5')->get();
        $cat_id = $this->get_cat_id_by_name($slug);
        $posts = Post::select('posts.*', 'u.name')->leftJoin('users as u', 'u.id', 'posts.crt_by')->where('posts.status', 1)->where('posts.cat_id', $cat_id)->orderBy('posts.id', 'desc')->limit('5')->get();
        return view('front.home', compact('posts', 'recent'));

    }
    
}
