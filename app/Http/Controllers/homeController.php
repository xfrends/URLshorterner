<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\shorturl;
use DB;
use Illuminate\Support\Str;

class homeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function postNewUrl(Request $request) {
        $request->validate([
            'url' => 'required|active_url',
        ]);

        $shorturl = new shorturl;

        DB::beginTransaction();
        $shorturl->full_url = $request->url;
        $shorturl->short_url = Str::random(5);
        $shorturl->save();
        DB::commit();
        
        $dataurl = $shorturl->where('full_url', $request->url)->first();

        return view('home')->with(['dataurl' => $dataurl]);
    }
}
