@if ($errors->any())
    @foreach ($errors->all() as $error)
        {{ $error }}
    @endforeach

@endif


{{--show alert dismissable alert of bootstrap--}}

@if(session()->has('success'))
    <div class="alert alert-success  no-border">
        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span>
        </button>
        <h4><i class="icon fa fa-check"></i> Success:</h4>
        {{ session('success')  }}
    </div>
@endif


@if(session()->has('error'))
    <div class="alert alert-danger  no-border">
        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span>
        </button>
        <h4><i class="icon fa fa-check"></i> Danger:</h4>
        {{ session('error')  }}
    </div>
@endif


{{-- @if(session()->has('error'))
    {{ session('error') }}
@endif --}}