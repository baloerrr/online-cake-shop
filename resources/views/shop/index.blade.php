@extends('layouts.mainUser')

@section('contentUser')
    <div class="mx-10 md:mx-20 lg:mx-24">
        @if(session()->has('AddCart'))

    <div class="alert alert-success">
        {{ session()->get('AddCart') }}
    </div>
@endif

        @include('shop.header')
        @include('shop.catagory')
        @include('shop.product')
    </div>
@endsection
