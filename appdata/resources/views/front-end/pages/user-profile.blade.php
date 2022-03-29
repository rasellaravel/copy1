@extends('front-end.app')
@php
$description = "Need a functional log cabin, garden office, summer house, an outside lodge? We can provide all the solutions you need.
Everything you need to erect your log cabin is included!";
@endphp
@section('description', $description)
@section('title', Auth::user()->name . ' | BHG WOOD')
@section('css')
    {{-- DataTable --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/responsive.dataTables.min.css') }}">
@stop
@section('content')
    <section class="igo-breadcrump-wrap {{ session()->get('is_screen') == 'app' ? 'mt-4' : 'my-4' }}">
        <div class="page-title text-center mb-2">
            <h1 class="igo-lg-title3">@lang('_lan.my_account')</h1>
        </div>
    </section>
    <section class="igo-contact-us my-4 my-md-5">
        <div class="container">
            @include('front-end.pages.auth.profile-1')
        </div>
    </section>

@endsection

@section('script')
    {{-- datatables --}}
    <script src="{{ asset('assets/vendor/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        showOrderData();
    </script>

@stop
