<?php

namespace App\Http\Controllers;

use App\Models\Horse;
use Illuminate\Http\Request;

class HorseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('horses.index', ['horses' => Horse::orderBy('name')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('horses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->runs < $request->wins) {
            return redirect()->route('horse.create')->with('status_error', 'Horse addition failed. Number of runs cannot be greater than number of wins.');
        }
        $horse = new Horse();
        $horse->fill($request->all());
        $horse->save();
        return ($horse->save() == 1)
            ? redirect()->route('horse.index')->with('status_success', 'Horse added successfully!')
            : redirect()->route('horse.index')->with('status_error', 'Horse addition failed.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Horse  $horse
     * @return \Illuminate\Http\Response
     */
    public function show(Horse $horse)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Horse  $horse
     * @return \Illuminate\Http\Response
     */
    public function edit(Horse $horse)
    {
        return view('horses.edit', ['horse' => $horse]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Horse  $horse
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Horse $horse)
    {
        if ($request->runs < $request->wins) {
            return redirect()->route('horse.index')->with('status_error', 'Horse update failed. Number of runs cannot be greater than number of wins.');
        }
        $horse->fill($request->all());
        return ($horse->save() == 1)
            ? redirect()->route('horse.index')->with('status_success', 'Horse updated successfully!')
            : redirect()->route('horse.index')->with('status_error', 'Horse update failed.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Horse  $horse
     * @return \Illuminate\Http\Response
     */
    public function destroy(Horse $horse)
    {
        $horse->delete();
        return redirect()->route('horse.index')->with('status_success', 'Horse removed from database successfully!');
    }
}
