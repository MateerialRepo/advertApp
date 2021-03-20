<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClickController extends Controller
{
    //
    // function updateClicks(Request $request){
    //     DB::table('adverts')->where('id', $request->id)->increment('clicks', 1);
    // }

    function updateClicks($id){
        DB::table('adverts')->where('id', $id)->increment('clicks', 1);
    }
}
