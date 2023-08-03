<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller{
    
    public function index(Request $request)
    {

        // return $request->url();

        // return redirect("https://google.com");
        
        $series = [
            "filhos da anarquia",
            "the walking dead",
            "the witcher) = >",
            
        ];
        
        // $html = "<ul>";
        // foreach($listaDeSeries as $serie){
        //     $html .= "<li>".$serie."</li>";
        // }
        // $html .= "</ul>";
        
        // return view("listar-series",compact("series"));
        return view("series.index")->with("series",$series);
    }

    public function create(){
        return view("series.create");
    }

    public function store(Request $request){
        
        $nomeSerie = $request->input("nome");

        if(DB::insert("INSERT INTO series (nome) VALUES (?)")){
            return "OK";
        }else{
            return "DEU RUIM";
        }

    }
}
