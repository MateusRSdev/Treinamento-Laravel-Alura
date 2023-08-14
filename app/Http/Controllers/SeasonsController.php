<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use App\Models\Series;
use Illuminate\Http\Request;

class SeasonsController extends Controller
{
    public function index(Series $serie){
        $seasons = $serie->seasons()->with("episodes")->get();
        // dd($seasons->all());
        return view("seasons.index")->with("seasons",$seasons)->with("series",$serie);
    }
}
