<?php
namespace App\Http\Controllers\Api;
use App\Models\Series;
use App\Repositories\SeriesRepository;
use Illuminate\Http\Request;
use App\Http\Requests\SeriesFormRequest;
use Illuminate\Support\Facades\Storage;

class SeriesController
{
    public function __construct(private SeriesRepository $repository) {
        
    }
    public function index()
    {
        return Series::all();
    }

    public function store(SeriesFormRequest $request){
        // dd($request);
        return response()
        ->json($this->repository->add($request), 201);
    }

    public function show(int $seriesId){
        $series = Series::whereId($seriesId)->with("seasons.episodes")->first();
        return $series;
    }
    public function update(Series $series, SeriesFormRequest $request){
        $series->fill($request->all());
        $series->save();
        return $series;
    }
    
    public function destroy(int $series){
        Series::destroy($series);
        return response()->noContent();
    }
    public function upload(Request $request){
        $path = $request->query("path") ? $request->query("path") : "series-cover";
       
        $binaryData = $request->getContent();
    
        $uniqueFileName = md5(uniqid(microtime(),true));

        
        $fileExtension = substr(strrchr(getimagesizefromstring($binaryData)["mime"],"/"),1);
        $fileName = $uniqueFileName.".".$fileExtension;

        Storage::disk("public")->put($path."/".$fileName, $binaryData);

        return $path."/".$fileName ;
    }
}
