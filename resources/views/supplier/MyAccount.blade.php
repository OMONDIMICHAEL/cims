@extends('layouts.app')

@section('title', 'Account')
@section('content')
    <div name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{__("My Account")}}
        </h2>
    </div>
    <div class="flex max-w-9xl max-auto sm:px-6 lg:px-8 p-4 bg-white shadow-sm sm:rounded-lg m-6">
        <div class="w-1/4 p-4 hidden sm:block break-words ">
            {{__('left')}}
        </div>
        <div class="w-full sm:w-1/2 p-4 break-words">
            <div class="col-md-8 col-lg-8 col-xl-8 mx-auto mb-4" id="bodyGridDiv">
                <div class="container-fluid text-center text-md-start mt-5">
                    <div class="" id="">
                        <span style="color:red;">still under construction</span><br>
                        <span style="color:red;">it will calculate profit, expenses e.t.c</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="w-1/4 p-4 hidden sm:block break-words">
            {{__('right')}}
        </div>
    </div>
@endsection