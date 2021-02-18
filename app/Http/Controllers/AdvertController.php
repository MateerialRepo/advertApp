<?php

namespace App\Http\Controllers;

use App\Models\Advert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class AdvertController extends Controller
{

    function index(){

    }

    function showAdvert(){
        $adverts = Advert::all();
        return view('home',['adverts'=>$adverts]);
        
    }

    function showSingleAdvert(){
        //$adverts = Advert::all();
        //$randImage = $adverts[rand(0, count($adverts)-1)];
        //return view('welcome',['randImage'=>$randImage]);
            $adverts = Advert::whereColumn('displayNum', '>', 'views')->get();
            //dd($adverts);
            if(count($adverts) != 0){
                $randImage = $adverts[rand(0, count($adverts)-1)];
                DB::table('adverts')->where('advertName','=', $randImage->advertName)->increment('views', 1);
                return view('welcome',['randImage'=>$randImage]);
            } else{ 
                Session::flash('status', 'There are no valid adverts at the moment');
                return view('welcome');
            }
    }

    function create(){
        return view('addAdvert');
    }

    function store(Request $req){

        $req->validate([
            'advertname' => 'required|max:200|string', 
            'banner' => 'required|image',
            'displaynum' => 'required|max:30|numeric',
            ]);

        $banner_new_name = time().'.'.$req->banner->extension();

        $req->banner->move(public_path('adverts'), $banner_new_name);

        Advert::create([
            'advertName' => $req->advertname,
            'bannerName' => $banner_new_name,
            'displayNum' => $req->displaynum,
            'views' => $req->views
            ]);

        Session::flash('success', 'Your Advert has been created');

        return redirect()->route('home');
    }


    function editAdvert($id){

    }

    function updateAdvert(Request $req){

    }

    function delete($id){
        $advert = Advert::find($id);
        $advert->delete();

        session()->flash('status', 'Advert Record Successfully Deleted');
        return redirect('/home');
    }
}