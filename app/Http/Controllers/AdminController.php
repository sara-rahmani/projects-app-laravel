<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    //
    public function index()
    {
        $loggedInUser=Auth::user();
        return view('admin.index')
        ->with('projects', Project::all())
        ->with('users', User::all())
        ->with('categories',Category::all())
        ->with('tags',Tag::all())

        ->with('loggedInUser', $loggedInUser->getAuthIdentifier());

    }
  
    public function show(Project $project)
    {
        return view('projects.project',['project' => $project]);
    }
}
