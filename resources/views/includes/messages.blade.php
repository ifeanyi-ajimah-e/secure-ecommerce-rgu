
@if (session('status'))
<div class="alert alert-success alert-dismissable" role="alert">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>{{ session('status') }}</strong>
</div>
@endif

@if (session('errordata'))
<div class="alert alert-danger alert-dismissable" role="alert">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>{{ session('errordata') }}</strong>
</div>
@endif

@if($errors->any())
    <div class=" alert alert-danger alert-dismissable" role="alert">

        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
        <ul>
            @foreach ($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </ul>
    </div>

@endif

@if (session('error_note'))
<div class="alert alert-danger alert-dismissable" role="alert">
<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
<strong>{{ session('error_note') }}</strong>
</div>
@endif



