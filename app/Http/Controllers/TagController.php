<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Models\Tag;

class TagController extends Controller
{
    public function getTagsJSON()
    {
        $tags = Tag::all();
        return response()->json($tags);
    }
    public function create() {
        return view('admin.tags.create')
        ->with('tag', null);
        
    }
    public function store() {
        $attributes = request()->validate([
            'name' => 'required'
        ]);
        $attributes['slug'] = Str::slug($attributes['name']);

        Tag::create($attributes);

        session()->flash('success','Tag Created Successfully');
        return redirect('/admin');
    }
    public function edit(Tag $tag) {
        return view('admin.tags.create')
        ->with('tag', $tag);    }

    public function update(Tag $tag, Request $request) {
        // ddd(request()->all());

        $attributes = request()->validate([
            'name' => ['required','unique:tags,name,'.$tag->id],
        ]);

        $attributes['slug'] = Str::slug($attributes['name']);
      $tag->update($attributes);

      session()->flash('success','Tag Updated Successfully');
       return redirect('/admin');

    }


    public function destroy(Tag $tag) {
        //  ddd(request()->all());
        $tag->delete();

        // Set a flash message
        session()->flash('success','Tag Deleted Successfully');

        // Redirect to the Admin Dashboard
        return redirect('/admin');
    }
}