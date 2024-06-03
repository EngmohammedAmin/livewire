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

                    </div>
                </div>
            </div>
        </div>
        <a href="{{ route('welcome') }}" wire:navigate.hover class="btn btn-sm btn-dark " style="margin-left: 5px"> رجوع
        </a>

        <a class=" btn btn-sm btn-dark dropdown-item" href="{{ route('logout') }}"
            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
    </div>
@endsection
