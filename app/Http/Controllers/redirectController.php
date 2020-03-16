<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\shorturl;

class redirectController extends Controller
{
    public function __invoke($parameter) {
        $shorturl = new shorturl;
        $dataurl = $shorturl->where('short_url', $parameter)->first();
        return redirect($dataurl->full_url);
    }
}
