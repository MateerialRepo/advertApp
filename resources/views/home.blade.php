@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h3>{{ __('Dashboard') }}</h3></div>
                <div class="card-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('success') }}
                        </div>
                    @endif

                    @if (Session::has('update'))
                        <div class="alert alert-success" role="alert">
                            {{ Session::get('update') }}
                        </div>
                    @endif

                    <table class="table table-responsive table-striped mt-3">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Campaign Name</th>
                                <th>Picture</th>
                                <th>Display number</th>
                                <th>No of views</th>
                                <th>No of clicks</th>                            
                                <th class="text-center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $count = 0 ?>
                                @foreach ($adverts as $advert)
                                <tr>
                                    <td scope="row">{{++$count}}</td>
                                    <td>{{$advert->advertName}}</td>
                                    <td><img src="{{asset('adverts/'.$advert->bannerName)}}" alt="" width="100px" height="50px"></td>
                                    <td>{{$advert->displayNum}}</td>
                                    <td>{{$advert->views}}</td>
                                    <td>{{$advert->clicks}}</td>
                                    <td class="text-center">
                                        <a href="edit_advert/{{$advert->id}}"><button class="btn btn-success mr-2">Edit</button></a>
                                        <a href="delete_advert/{{$advert->id}}"><button class="btn btn-danger">Delete</button></a>                        
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
