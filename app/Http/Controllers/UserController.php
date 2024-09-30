<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Yajra\DataTables\DataTables;

class UserController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $users = User::query();
            return DataTables::of($users)
                ->editColumn('name', function($data) {
                    return Str::limit($data->name, '8', '...');
                })
                ->addColumn('action', function($row) {
                    return '<form method="POST" action="/users/destroy/'. $row->id .'">
                            '.csrf_field().'
                            <a href="/users/'. $row->id .'" class="btn btn-sm btn-primary">View Posts</a>
                            
                            <button type="submit" class="btn btn-sm btn-danger">Delete User</a>
                            </form>';
                })
                ->toJson();
        }

        return view('layouts.users');
    }

    public function showPosts(Request $request, string $id)
    {
        $posts = Post::where('user_id', $id);

        if($request->ajax())
        {
            return DataTables::of($posts)
                            ->toJson();
        }
        return view('layouts.posts');
    }

    public function destroy(string $id)
    {
        User::find($id)->delete();
        
        return redirect()->back();
    }
}
