<?php
namespace App\Http\Controllers\Api;
use App\Models\Series;
use Illuminate\Http\Request;
use App\Http\Requests\SeriesFormRequest;
use Illuminate\Support\Facades\Storage;

class SeriesController
{
    public function index()
    {
        return Series::all();
    }

    public function store(SeriesFormRequest $request){
        return response()->json(Series::create($request->all()), 201);
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
