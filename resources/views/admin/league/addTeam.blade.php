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
                <div class="col-md-6 justify-content-center">

                <form action="{{ route('addTeam') }}" method="post">
                    @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Team Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="teamName" aria-describedby="emailHelp" required placeholder="">
                            </div>
                            <input type="hidden" name="leagueId" value="{{ $leagueId }}">
                            <br>
                            <button type="submit" class="btn btn-primary">Add</button>
                </form>    
            
                </div>
            </div>
        </div>
    </div>
</div>

@endsection