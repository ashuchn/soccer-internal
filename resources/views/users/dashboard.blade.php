@extends('users.layout.app')
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
                <a href="{{ route('chat-window') }}" >
                    <button class="btn btn-primary">Chats</button>
                </a>
                <!-- <div class="col-md-6  justify-content-center">

                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col">Users</div>
                            </div>
                        </div> 
                        
                    </div>
                </div>
                <div class="col-md-6  justify-content-center">

                    <div class="card">
                        <div class="card-header">
                        <div class="row">
                            <div class="col">Users</div>
                        </div>
                    </div>
                    
                </div> -->
            </div>
        </div>
    </div>
</div>


@endsection