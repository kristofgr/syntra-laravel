<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Entry;

class EntryController extends Controller
{
    public function index(): View
    {
        return view('entries.index', [
            'entries' => Entry::with('user')->latest()->get(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'message' => 'required|string|max:255',
            'plate' => 'required|string|max:10',
        ]);

        $request->user()->entries()->create($validated);

        return redirect(route('entries.index'));
    }
}
