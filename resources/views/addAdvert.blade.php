@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ 'Add Advert Campaign' }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                            Hello
                        </div>
                    @endif

                    <form method="post" action="" enctype="multipart/form-data">
                        @csrf
                        
                        <input type="hidden" name="views" value="0">
                        <div class="form-group">
                            <input type="text" class="form-control mb-3" name="advertname" placeholder="Enter the Advert/Campaign Name" 
                            value="{{old('advertname')}}">
                            @error('advertname')<small class="alert alert-danger">{{$message}}</small> @enderror
                        </div>

                        <div class="custom-file mb-3">
                            <input type="file" class="custom-file-input" id="inputGroupFile01" name="banner" aria-describedby="inputGroupFileAddon01">
                            <label class="custom-file-label" for="inputGroupFile01">Choose Advert Banner</label>
                            @error('banner')<small class="alert alert-danger">{{$message}}</small> @enderror
                          </div>
                    
                        <div class="form-group">
                            <input type="num" class="form-control mb-3" name="displaynum" placeholder="Number of times to display advert" value="{{old('displaynum')}}">
                            @error('displaynum')<small class="alert alert-danger">{{$message}}</small> @enderror
                        </div>
            
                        <!-- Submit button -->
                        <button type="submit" class="btn btn-block btn-primary" name="" value="">Submit</button>
                    
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).on('change', '.custom-file-input', function (event) {
    $(this).next('.custom-file-label').html(event.target.files[0].name);
})
</script>
@endsection