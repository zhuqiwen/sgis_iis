<?php

namespace App\Http\Controllers;

use App\Models\TestAutocomplete;
use Illuminate\Http\Request;

class TestAutocompleteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TestAutocomplete  $testAutocomplete
     * @return \Illuminate\Http\Response
     */
    public function show(TestAutocomplete $testAutocomplete)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TestAutocomplete  $testAutocomplete
     * @return \Illuminate\Http\Response
     */
    public function edit(TestAutocomplete $testAutocomplete)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TestAutocomplete  $testAutocomplete
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TestAutocomplete $testAutocomplete)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TestAutocomplete  $testAutocomplete
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestAutocomplete $testAutocomplete)
    {
        //
    }


    public function search()
    {
	    return view('test_search');
    }

    public function autocomplete(Request $request)
    {
	    $data = TestAutocomplete::select("title as name")->where("title", "LIKE", "%{$request->input('query')}%")->get();
	    return response()->json($data);
    }
}
