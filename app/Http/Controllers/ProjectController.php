<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    //
    public function getProjectsJSON()
    {
        $projects = Project::with(['category','tags'])->get();
        return response()->json($projects);
    }
    public function summaries()
    {
        return view('home')
        ->with('projects', Project::latest('published_date')->paginate(3)->withQueryString());

    }
    
    public function index()
    {
        return view('projects.index')
        ->with('projects', Project::latest('published_date')->paginate(5)->withQueryString())
       ->with('category', null);

    }
    public function listByCategory(Category $category)
    {
        return view('projects.byCategory')
        ->with('projects', $category->projects)
        ->with('category', $category);
    }
    public function show(Project $project)
    {
        return view('projects.project',['project' => $project]);
    }
    public function create() {
        return view('admin.projects.create')
        ->with('categories', Category::all())
        ->with('tags', Tag::all())

        ->with('project', null);
    }
    public function store( Request $request) {
         //ddd() is Die, Dump, Debug. to check what the form passed
        // ddd(request()->all());
        $attributes = request()->validate([
            'title' => 'required',
            'excerpt' => 'required',
            'body' => 'required',
            'url' => ['nullable','sometimes','url'],
            'published_date' => ['nullable','sometimes','date'],
            'category_id' => ['nullable','sometimes','exists:categories,id'],
            'image' => ['nullable','sometimes','image'],
            'thumb' => ['nullable','sometimes','image'],
        ]);
        // Generate the slug from the title
 $attributes['slug'] = Str::slug($attributes['title']);
           // Save upload in public storage and set path attributes 
$image_path = $request->file('image')?->storeAs('images',$request->image->getClientOriginalName(), 'public');
$attributes['image'] = $image_path;
$thumb_path = $request->file('thumb')?->storeAs('images', $request->thumb->getClientOriginalName(), 'public');
$attributes['thumb'] = $thumb_path;
     $project = Project::create($attributes);
    
        $project->tags()->attach($request['tags']);
// Set a flash message
session()->flash('success','Project Created Successfully');

// Redirect to the Admin Dashboard
return redirect('/admin');

    }

    public function edit(Project $project) {
        return view('admin.projects.create')
        ->with('project', $project)
        ->with('categories', Category::all());
    }

    public function update(Project $project, Request $request) {
        // ddd(request()->all());

        $attributes = request()->validate([
            'title' => ['required','unique:projects,title,'.$project->id],
            'excerpt' => 'required',
            'body' => 'required',
            'url' => ['nullable','sometimes','url'],
            'published_date' => ['nullable','sometimes','date'],
            'category_id' => ['nullable','sometimes','exists:categories,id'],
            'image' => ['nullable','sometimes','image'],
            'thumb' => ['nullable','sometimes','image'],
        ]);

        $attributes['slug'] = Str::slug($attributes['title']);

        // Save updates to the DB
// Save upload in public storage and set path attributes 
$image_path = $request->file('image')?->storeAs('images',$request->image->getClientOriginalName(), 'public');
$attributes['image'] = $image_path;
$thumb_path = $request->file('thumb')?->storeAs('images', $request->thumb->getClientOriginalName(), 'public');
$attributes['thumb'] = $thumb_path;

$project->update($attributes);

session()->flash('success','Project Updated Successfully');


// Redirect to the Admin Dashboard
return redirect('/admin');
    }

    public function destroy(Project $project) {
        $project->delete();

        // Set a flash message
        session()->flash('success','Project Deleted Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }
 
}
