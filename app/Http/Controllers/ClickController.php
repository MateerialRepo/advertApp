<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClickController extends Controller
{

    function updateClicks($id){
        DB::table('adverts')->where('id', $id)->increment('clicks', 1);
    }
}
