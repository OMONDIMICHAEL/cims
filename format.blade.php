@extends('layouts.app')

@section('title', 'Sales')
@section('content')
    <div name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__("Sales And Order")}}
        </h2>
    </div>
    <div class="flex max-w-9xl max-auto sm:px-6 lg:px-8 p-4 bg-white shadow-sm sm:rounded-lg m-6">
        <div class="w-1/4 p-4 hidden sm:block break-words ">
            {{__('left')}}
        </div>
        <div class="w-full sm:w-1/2 p-4 break-words">
            {{__('Center prod det.')}}
        </div>
        <div class="w-1/4 p-4 hidden sm:block break-words">
            {{__('right')}}
        </div>
    </div>
@endsection