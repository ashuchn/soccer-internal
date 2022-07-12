@extends('admin.layout.app')
@section('content')

<div class="content-wrapper">

    @if (session('status'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
    {{Session('status')}}
    <!-- <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button> -->
    </div>
	@endif

    <div class="content">
        <div class="container-fluid ">
            <div class="row">
                <div class="col-md-12 ">

                <hr>
                @include('admin.partials.navbar')
                    
                </div>
            
            
            </div>
        </div>
    </div>
</div>

@endsection