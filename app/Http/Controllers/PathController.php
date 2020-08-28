<?php

namespace App\Http\Controllers;

use App\Path;
use App\Place;
use Illuminate\Http\Request;

class PathController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paths = Path::orderBy('name')->get();
        return view('paths.index', compact('paths'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $placeNames = Place::orderBy('name')->pluck('name', 'id');
        return view("paths.create")->with('placeNames', $placeNames);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'stops' => 'required|array|min:2',
            'stops.*' => 'required|exists:App\Place,id|distinct',
        ]);
        $pathPlaces = [];
        $pathName = "";
        foreach($request->get('stops') as &$placeId) {
            $place = Place::find($placeId);
            array_push($pathPlaces, $place);
            $pathName = $pathName == "" ? $place->name : $pathName." - ".$place->name;
        }
        $newPath = Path::create(["name" => $pathName]);
        $count = 0;
        foreach($pathPlaces as &$place) {
            echo $place->name;
            $newPath->places()->attach([$place->id => ['ordinal' => $count]]);
            $count++;
        }
        return back()->with('success', 'Path \''.$newPath->name.'\' added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Path  $path
     * @return \Illuminate\Http\Response
     */
    public function show(Path $path)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Path  $path
     * @return \Illuminate\Http\Response
     */
    public function edit(Path $path)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Path  $path
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Path $path)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Path  $path
     * @return \Illuminate\Http\Response
     */
    public function destroy(Path $path)
    {
        $name = $path->name;
        $path->delete();
        return back()->with('success', "Path '" . $name . "' deleted successfully.");
    }
}
