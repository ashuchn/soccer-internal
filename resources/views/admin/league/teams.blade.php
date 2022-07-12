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
                <div class="col-md-6  justify-content-center">

                    <div class="card">
                        <div class="card-header">
                        <div class="row">
                            <div class="col"><strong>{{ $league->leagueName }}</strong></div>
                            <div class="col">
                                <a href="{{ route('addTeam', ['leagueId' => $league->id ]) }}" class="btn btn-primary">Add Team</a>
                            </div>
                        </div>
                        </div>
                        <div class="card-body">
                        @forelse($teams as $team)
                            <p><a href="{{ route('mainDashboard' , ['leagueId' => $league->id, 'teamId' => $team->id ]) }}">{{ $team->teamName }}</a></p>
                        @empty
                            <p class="text-danger">No Teams</p>
                        @endforelse
                        </div>
                    </div>
                    
                </div>
            
            
            </div>
        </div>
    </div>
</div>

@endsection