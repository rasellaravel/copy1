@extends('front-end.app')
@php
$description = "Need a functional log cabin, garden office, summer house, an outside lodge? We can provide all the solutions you need.
Everything you need to erect your log cabin is included!";
@endphp
@section('description', $description)
@section('title', __('_lan.profile_details') . ' | BHG WOOD')
@section('css')
    {{-- DataTable --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/responsive.dataTables.min.css') }}">
@stop
@section('content')

    <section class="igo-breadcrump-wrap my-4">
        <div class="container">
            <div class="row">
                {{-- @include('front-end.igonet_module.breadcrumb.web-breadcrumb-2', $items) --}}
            </div>
        </div>
    </section>

    <section class="igo-order-details-wrap pt-15 pb-60">
        @include('front-end.pages.auth.profile-2')
    </section>
@endsection

@section('script')
    {{-- datatables --}}
    <script src="{{ asset('assets/vendor/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/dataTables.bootstrap4.min.js') }}"></script>
    <script>


    </script>
@stop
