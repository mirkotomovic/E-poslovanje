<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Route;
use App\Place;

class SearchController extends Controller
{
    public function search(Request $request){
        


        $from = Place::where("name", $request->from)->first();
        $to = Place::where("name", $request->to)->first();
        
        // return Route::first()->places()->get();
        $route = Route::with('places');
        //Routes with both from city and to city in them
        $route = $route->whereHas('places', function($query) use ($from, $to) { $query -> whereIn('place_id', [$from->id, $to->id]);}, '=', 2);
        $route = $route->get();
        $valid_routes = [];
        foreach($route as &$r){
            if ($r->places()->find($from->id)->pivot->ordinal < $r->places()->find($to->id)->pivot->ordinal){
                array_push($valid_routes, $r);
                echo $r->name."<hr>";
            }
        }
        dd($valid_routes[0]->journeys()->get());
    }
}
