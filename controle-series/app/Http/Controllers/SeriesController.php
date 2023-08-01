<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SeriesController extends Controller{
    
    public function show()
    {
        
        $listaDeSeries = [
            "filhos da anarquia",
            "the walking dead",
            "the witcher"
        ];
        
        $html = "<ul>";
        foreach($listaDeSeries as $serie){
            $html .= "<li>".$serie."</li>";
        }
        $html .= "</ul>";
        
        echo $html;
    }
}
