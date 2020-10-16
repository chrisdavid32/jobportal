@if(count($errors) > 0)
    @foreach($errors->all() as $error)
    <div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true"><i class="mdi mdi-close"></i></span>
    </button>
        {{$error}}
        </div>
    @endforeach
@endif

@if(count(session('errorLog')) > 0)
    <div class="alert alert-warning alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true"><i class="mdi mdi-times"></i></span>
    </button>
        {!!session('errorLog')!!}
        </div>
@endif

@if(count(session('stat')) > 0)
    <div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true"><i class="mdi mdi-times"></i></span>
    </button>
        {!!session('stat')!!}
        </div>
@endif