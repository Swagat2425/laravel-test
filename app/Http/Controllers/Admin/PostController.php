<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Models\Post;

class PostController extends Controller
{
    
    public function __construct() {

        

    }

    public function blogs() {

        return view('admin.blogs');

    }

    public function get_blogs(Request $request) {

        try {

            $blogs = Post::select('posts.id', 'posts.title', 'u.name', 'posts.crt_on', 'posts.status')->leftJoin('users as u', 'u.id', 'posts.crt_by')->where('posts.status', '!=', 2)->get();

            return DataTables::of($blogs)
                    ->addIndexColumn()
                    ->editColumn('crt_on', function($row) {
                        return date('d M Y', strtotime($row->crt_on));
                    })
                    ->editColumn('status', function($row){
                        $sts = ($row->status == 1) ? '<span class="btn btn-sm btn-success">Published</span>' : '<span class="btn btn-sm btn-danger">Deleted</span>';
                        return $sts;
                    })
                    ->rawColumns(['crt_on', 'status'])
                    ->make(true);

        } catch(Exception $e) {
            return null;
        }

        return null;

    }

}