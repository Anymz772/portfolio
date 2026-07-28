<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroContent;
use Illuminate\Http\Request;

class HeroController extends Controller
{
    public function edit()
    {
        $hero = HeroContent::firstOrCreate([]);

        return view('admin.hero.edit', compact('hero'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'title_line1' => 'required|string|max:255',
            'title_line2' => 'required|string|max:255',
            'title_line3' => 'required|string|max:255',
            'description' => 'required|string',
            'typing_texts' => 'nullable|string',
        ]);

        $hero = HeroContent::firstOrCreate([]);

        if ($request->typing_texts) {
            $validated['typing_texts'] = array_map('trim', explode(',', $request->typing_texts));
        }

        if ($request->hasFile('profile_image')) {
            $validated['profile_image'] = $request->file('profile_image')->store('hero', 'public');
        }

        $hero->update($validated);

        return redirect()->route('admin.hero.edit')->with('success', 'Hero section updated successfully!');
    }
}
