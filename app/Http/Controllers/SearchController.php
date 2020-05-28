<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Path;
use App\Place;

class SearchController extends Controller
{
    public function search(Request $request){
        
        $from = Place::where("name", $request->from)->first();
        $to = Place::where("name", $request->to)->first();
        
        // return path::first()->places()->get();
        $path = Path::with('places');
        // paths with both from city and to city in them
        $path = $path->whereHas('places', function($query) use ($from, $to) { $query -> whereIn('place_id', [$from->id, $to->id]);}, '=', 2);
        $path = $path->get();
        $journeys = new Collection();
        foreach($path as &$r){
            if ($r->places()->find($from->id)->pivot->ordinal < $r->places()->find($to->id)->pivot->ordinal){
                $path_journeys = $r->journeys; //For now all journeys, later we check date, tickets available, etc.
                $journeys = $journeys->merge($path_journeys);
            }
        }
        return view('search')->with('journeys', $journeys);
    }
}
