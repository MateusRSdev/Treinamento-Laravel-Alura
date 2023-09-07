<?php
namespace App\Http\Controllers\Api;
use App\Models\Series;

class SeriesController
{
    public function index()
    {
        return Series::all();
    }
}
