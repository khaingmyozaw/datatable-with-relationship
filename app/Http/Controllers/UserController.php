<?php

namespace App\Http\Controllers;

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
                    return '<a href="#" class="btn btn-sm btn-primary">View Posts</a>';
                })
                ->toJson();
        }

        return view('layouts.users');
    }
}
