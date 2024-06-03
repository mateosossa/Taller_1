<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use App\Models\Category;

class NoteController extends Controller
{
    public function index()
{
    $notes = Note::all();
    $categories = Category::all(); // Obtener todas las categorías
    return view('notes.index', compact('notes', 'categories'));
}

    public function create()
    {
        $categories = Category::all();
        return view('notes.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        Note::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('notes.index')
            ->with('success', 'Nota creada exitosamente.');
    }

    public function show(Note $note)
{
    return view('notes.show', ['note' => $note]);
}


public function edit($id)
{
    $note = Note::findOrFail($id);
    $categories = Category::all(); // Obtener todas las categorías
    return view('notes.edit', compact('note', 'categories'));
}

    public function update(Request $request, Note $note)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category_id' => 'required|exists:categories,id',
        ]);

        $note->update($request->all());

        return redirect()->route('notes.index')
            ->with('success', 'Nota actualizada exitosamente.');
    }

    public function destroy(Note $note)
    {
        $note->delete();

        return redirect()->route('notes.index')
            ->with('success', 'Nota eliminada exitosamente.');
    }
}
