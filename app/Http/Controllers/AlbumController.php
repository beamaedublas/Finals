<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    public function index()
    {
        // Get the current logged in user's ID
        $user_id = auth()->user()->id ?? null;

        // Get only the albums created by the current user
        $album = Album::where('user_id', $user_id)
                        ->orderBy('id')
                        ->get();

        return inertia('Album', ['album' => $album]);
    }

    public function create()
    {
        return inertia("Create");
    }

    public function store(Request $request)
    {
        $request->validate([
            'imageUrl' => 'required',
            'title' => 'required',
            'description' => 'required'
        ]);

        $user_id = auth()->user()->id ?? null;
        $request->merge(['user_id' => $user_id]);

        Album::create($request->all());
        return redirect('/album');
    }

    public function destroy(Album $album)
    {
        $album->delete();

        return redirect('/album')->with('success', 'Album deleted successfully.');
    }

    public function edit(Album $album)
    {
        return inertia('Edit', ['album' => $album]);
    }

    public function update(Request $request, Album $album)
    {
        $fields = $request->validate([
            'title' => 'required',
            'description' => 'required',
            'imageUrl' => 'required'
        ]);

        $album->update($fields);

        return redirect('/album')->with('success', 'Album updated successfully.');
    }
}
