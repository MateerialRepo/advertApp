@extends('layouts.app')
<meta http-equiv="refresh" content="10" />
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ 'Welcome to Our Advert Application' }}</div>
                <div class="card-body text-center">
                    @if (Session::has('status'))
                        <div class="alert alert-warning" role="alert">
                            <h3>{{ Session::get('status') }}</h3>
                        </div>
                    @else
                        <img src="{{asset('adverts/'.$randImage->bannerName)}}" alt="" width="500px" height="250px">
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection