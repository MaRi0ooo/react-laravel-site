<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Books;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Books::all();
        return response()->json($books, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $books = new Books;
        $books->name = ($request->name) ? $request->name : "";
        $books->author = ($request->author) ? $request->author : "";
        $books->publish_date = ($request->publish_date) ? $request->publish_date : "";
        $books->save();
        return response()->json([
            'success' => 'Book created successfully',
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $book = Books::find($id);
        if (!empty($book)) {
            return response()->json($book, 200);
        } else {
            return response()->json([
                'error' => 'Book not found',
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $book = Books::find($id);
        if (!empty($book)) {
            $book->name = $request->name ? $request->name : $book->name;
            $book->author = $request->author ? $request->author : $book->author;
            $book->publish_date = $request->publish_date ? $request->publish_date : $book->publish_date;
            $book->save();

            return response()->json([
                'success' => 'Book updated successfully',
            ], 200);
        } else {
            return response()->json([
                'error' => 'Book not found',
            ], 404);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (Books::where('id', $id)->exists()) {
            $book = Books::find($id);
            $book->delete();

            return response()->json([
                'success' => 'Book deleted successfully',
            ], 202);
        } else {
            return response()->json([
                'error' => 'Book not found',
            ], 404);
        }
    }
}
