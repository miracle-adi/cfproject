@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                    
                    <div class="pt-3">
                        <a href="{{ route('usr.show',Auth::user()->id) }}" class="btn btn-success">Profile Page</a>
                    </div>
                    <div class="pt-3">
                        <a href="{{ route('coop.index') }}" class="btn btn-primary">Coop List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
