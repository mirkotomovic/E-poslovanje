<?php

namespace App\Http\Controllers;

use App\Journey;
use App\Path;
use App\Company;
use Illuminate\Http\Request;

class JourneyController extends Controller
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
        $pathNames = Path::orderBy('name')->pluck('name', 'id');
        $companyNames = Company::orderBy('name')->pluck('name', 'id');
        return view("journeys.create")->with('pathNames', $pathNames)->with('companyNames', $companyNames);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['depart_time'] = $request['date'].' '.$request['time'];
        $validatedData = $request->validate([
            'path_id' => 'required|exists:App\Path,id',
            'company_id' => 'required|exists:App\Company,id',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i:s',
            'depart_time' => 'after:now',
            'tickets_available' => 'required|numeric|integer|min:1',
        ]);
        $newJourney = Journey::create($request->all());
        return back()->with('success', 'Journey \''.$newJourney->path->name.'\' at '.$newJourney->depart_time.' added successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Journey  $journey
     * @return \Illuminate\Http\Response
     */
    public function show(Journey $journey)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Journey  $journey
     * @return \Illuminate\Http\Response
     */
    public function edit(Journey $journey)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Journey  $journey
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Journey $journey)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Journey  $journey
     * @return \Illuminate\Http\Response
     */
    public function destroy(Journey $journey)
    {
        //
    }
}
