<?php
namespace App\Http\Controllers;

class SeriesController{
    
    public function ListarSeries()
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