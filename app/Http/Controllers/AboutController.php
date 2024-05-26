<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AboutController extends Controller
{
    public function show()
    {
        $user = auth()->user();
        $aboutContent = $user ? $user->about : 'Tell me about yourself.';

        return Inertia::render('Portfolio', [
            'aboutContent' => $aboutContent,
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $user = User::find(auth()->id());

        if ($user) {
            $user->about = $request->content;
            $user->save();
        }

        return redirect()->back()->with('success', 'Content updated successfully.');
    }
}
