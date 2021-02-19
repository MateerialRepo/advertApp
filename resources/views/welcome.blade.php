@extends('layouts.app')
<meta http-equiv="refresh" content="10" />
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center"><h3>{{ 'Welcome to Our Advert Application' }}</h3></div>
                <div class="card-body text-center">
                    @if (Session::has('status'))
                        <div class="alert alert-warning" role="alert">
                            <h4>{{ Session::get('status') }}</h4>
                        </div>
                    @else
                    <form>
                        <input type="hidden" id="imageId" value="{{$randImage->id}}">
                    </form>
                        
                        <img src="{{asset('adverts/'.$randImage->bannerName)}}" width="500px" height="250px">
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

    $("img").click(function(){
        
        let id = $('#imageId').val()
        //alert(id);
        let url = "{{ url('clicks')}}/"+id
        //alert(url);

        $.ajax({
            type: "GET",
            url: url,
            data: {
                id: id,
            }
        })
    })

        
    

</script>
@endsection