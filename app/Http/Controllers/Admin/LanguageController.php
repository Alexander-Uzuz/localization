<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SaveLanguageRequest;
use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.languages.index', [
            'languages' => \App\Models\Language::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.languages.create', [
            'language' => new Language,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveLanguageRequest $request)
    {
        $validated = $request->validated();

        Language::query()->create($validated);

        return to_route('admin.languages.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Language $language)
    {
        return view('admin.languages.edit', [
            'language' => $language
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveLanguageRequest $request, Language $language)
    {
        $validated = $request->validated();

        $language->update(array_merge($validated, [
            'active' => $validated['active'] ?? false,
            'default' => $validated['default'] ?? false,
            'fallback' => $validated['fallback'] ?? false
        ]));

        return to_route('admin.languages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Language $language)
    {
        $language->delete();

        return back();
    }
}
