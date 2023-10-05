<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use App\Models\User;
use DB;

class CustomerController extends Controller
{
    
    public function __construct() {



    }

    public function customers() {

        return view('admin.customers');

    }

    public function get_customers(Request $request) {

        try {

            $blogs = DB::table('users')
                    ->select('users.id', 'users.name', 'users.email', 'users.crt_on', 'users.status', DB::raw('COUNT(posts.id) as total_posts'))
                    ->leftJoin('posts', 'posts.crt_by', 'users.id')
                    ->groupBy('users.id', 'users.name', 'users.email', 'users.crt_on', 'users.status')
                    ->get();

            return DataTables::of($blogs)
                    ->addIndexColumn()
                    ->editColumn('crt_on', function($row) {
                        return date('d M Y', strtotime($row->crt_on));
                    })
                    ->editColumn('status', function($row){
                        $sts = ($row->status == 1) ? '<span class="btn btn-sm btn-success">Active</span>' : '<span class="btn btn-sm btn-danger">De-active</span>';
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
