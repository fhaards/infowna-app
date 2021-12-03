@extends('layouts.app')

@section('content')
    <div class="container mx-auto max-w-7xl">
        <div class="px-4 py-16 mx-auto max-w-screen-xl">
            <div class="card-header">{{ __('Dashboard') }}</div>

            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif

                {{ __('You are logged in!') }}
            </div>
        </div>
    </div>
@endsection
