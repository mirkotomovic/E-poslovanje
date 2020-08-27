<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use App\Path;
use App\Place;
use Carbon\Carbon;

class SearchController extends Controller
{
    public function search(Request $request) {
        $placeNames = Place::orderBy('name')->pluck('name', 'id');
        if (!isset($request->placeFrom)) {
            return view('search')->with('placeNames', $placeNames);
        }
        $placeFrom = Place::find($request->placeFrom);
        $placeTo = Place::find($request->placeTo);
        $date = new Carbon($request->date);
        
        // return path::first()->places()->get();
        $path = Path::with('places');
        // paths with both from city and to city in them
        $path = $path->whereHas('places', function($query) use ($placeFrom, $placeTo) { $query -> whereIn('place_id', [$placeFrom->id, $placeTo->id]);}, '=', 2);
        $path = $path->get();
        $journeys = new Collection();
        foreach($path as &$r){
            $pathPlaceFrom = $r->places()->find($placeFrom->id);
            $pathPlaceTo = $r->places()->find($placeTo->id);
            if ($pathPlaceFrom && $pathPlaceTo && $pathPlaceFrom->pivot->ordinal <= $pathPlaceTo->pivot->ordinal){
                $path_journeys = $r->journeys;
                $path_journeys = $path_journeys->filter(function ($item) use ($date) {
                    return (data_get($item, 'depart_time') > $date->startOfDay()) && (data_get($item, 'depart_time') < $date->endOfDay());
                });
                $journeys = $journeys->merge($path_journeys);
            }
        }
        $journeys = $journeys->sortBy('depart_time');
        return view('search')->with('journeys', $journeys)->with('placeNames', $placeNames);
    }
}
