<?php
namespace App\Http\Controllers;

use App\Models\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EpisodesController
{
    public function index(Season $season){
        // dd($season->episodes());
        return view("episodes.index",[
            "episodes"=> $season->episodes,
            "mensagemSucesso" => session("mensagem.sucesso")
        ]);

    }
    public function update(Request $request, Season $season){
        
        DB::transaction(function () use($request,$season) {
            $watchedEpisodes = $request->episodes;
            
            $season->episodes->each(function ($episode) use($watchedEpisodes) {
                $episode->watched = in_array($episode->id,$watchedEpisodes);
                
            });
            $season->push();
        });

        return to_route("episodes.index", $season->id)->with("mensagem.sucesso", "Episódios marcados como assistidos");
    }
}