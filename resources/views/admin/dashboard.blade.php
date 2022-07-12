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
                            <div class="col">My Leagues</div>
                            <div class="col">
                                <a href="{{ route('addLeague') }}" class="btn btn-primary">Add league</a>
                            </div>
                        </div>
                        </div>
                        <div class="card-body">
                        @forelse($myleague as $my)
                            <p><a href="{{ route('leagueDashboard', ['leagueId' => $my->id] ) }}">{{ $my->leagueName }}</a></p>
                        @empty
                            <p class="text-danger">No Leagues</p>
                        @endforelse
                        </div>
                    </div>
                    
                </div>
                
                <div class="col-md-6   justify-content-center">
                    <div class="card">
                        <div class="card-header">
                        Other Leagues
                        </div>
                        <div class="card-body">
                        @forelse($otherLeague as $other)
                            <p><a href="{{ route('leagueDashboard'  , ['leagueId' => $other->id]) }}">{{ $other->leagueName}}</a></p>
                        @empty
                            <p class="text-danger">No Leagues</p>
                        @endforelse
                        </div>
                    </div>
                </div>
            
            
            </div>
        </div>
    </div>
</div>

@endsection