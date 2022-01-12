<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Books::latest()->paginate(5);

        return view('books.index', compact('data'), ['title' => 'Book list', "menu" => "list_book"])
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('books.create', ['title' => 'Add Book', "menu" => "add_book"]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'ISBN' => 'required',
            'revisionNo' => 'required',
            'publishedDate' => 'required',
            'publisher' => 'required',
            'author' => 'required',
            'genre' => 'nullable',
            'cover' => 'image|nullable|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        //Declared variable to all the incoming request
        $input = $request->all();
        // Condition to check if the user has uploaded the file or not
        if ($request->hasFile('image')) :
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // Get Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Get just Extension
            $extension = $request->file('image')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = $filename . '_' . time() . '.' . $extension;
            // Upload Image
            $path = $request->file('image')->storeAs('public/image', $fileNameToStore);
            $input['cover'] = $fileNameToStore;
        else :
            //Add book cover default file name
            $input['cover'] = 'noimage.jpg';
        endif;
        //die(json_encode($input));
        //$input['title'] =  strtoupper($input['title']);
        //$data = array_merge($input,array('book'=>"fuck",'cover'=>'fuck'));
        //die(json_encode($input));
        $save =   Books::create($input);
        //die($save);
        return redirect()->route('books.index')->with('success', 'Book added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function show(Books $books)
    {
        //
        return view('books.show', compact('books'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function edit(Books $books)
    {
        //
        //$book=Books::findOrFail($books->id);
        die(json_encode($books));
        return view('books.edit', compact('books'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Books $books)
    {
        //
        $request->validate([
            'title' => 'required',
            'ISBN' => 'required',
            'revisionNo' => 'required',
            'publishedDate' => 'required',
            'publisher' => 'required',
            'author' => 'required',
            'genre' => 'nullable',
            'cover' => 'image|nullable|max: 1999'
        ]);

        $books->update($request->all());

        return redirect()->route('books.index')
            ->with('success', 'Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Books  $books
     * @return \Illuminate\Http\Response
     */
    public function destroy(Books $books)
    {
        $books->delete();

        return redirect()->route('books.index')
            ->with('success', 'Book deleted successfully');
    }
}
