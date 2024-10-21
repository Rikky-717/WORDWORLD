<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Word;
use Illuminate\Support\Facades\Auth;

class WordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = Auth::user();

        $search = $request->search;

        $query = Word::search($search);

        $words = $query->where('user_id', $user->id)->paginate(10)->appends(['search' => $search]);

        // $words = Word::where('user_id', $user->id)->get();

        return view('list', compact('words'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'word' => ['required', 'string', 'max:50'],
            'meaning' => ['required', 'string', 'max:255'],
            'other' => ['string', 'nullable','max:255'],
        ]);

        $user = Auth::user();
        Word::create([
            'user_id' => $user->id,
            'word' => $request->word,
            'meaning' => $request->meaning,
            'other' => $request->other,
            'learned' => 1,
        ]);

        return to_route('words.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $word = Word::find($id);
        return view('detail', compact('word'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $word = Word::find($id);
        return view('edit', compact('word'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $word = Word::find($id);
        $word->word = $request->word;
        $word->meaning = $request->meaning;
        $word->other = $request->other;
        $word->save();

        return to_route('words.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $word = Word::find($id);
        $word->delete();
        return to_route('words.index');
    }

    public function setCheck(Request $request)
    {
        $user = Auth::user();
        $how = $request->how;
        $checkCount = 0;
        $words = Word::where('user_id', $user->id)->inRandomOrder()->take($how)->get();
        session(['randomWords' => $words]);
        return to_route('words.check', ['count' => $checkCount]);
    }

    public function check(int $count)
    {
        $words = session('randomWords');
        $word = $words[$count];
        return view('check', compact('word', 'count'));
    }

    public function resultCheck()
    {
        $words = session('randomWords');
        return view('check-result', compact('words'));
    }
}
