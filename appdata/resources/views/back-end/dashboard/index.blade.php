@extends('back-end.admin-app')
@section('title','Dashboard')
@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/assets/css/component.css')}}">
@endsection

@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-header">
                    <div class="page-header-title">
                        <h4>Dashboard</h4>
                    </div>
                    <div class="page-header-breadcrumb">
                        <ul class="breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="{{ url('admin') }}">
                                    <i class="icofont icofont-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashhoard</a>
                            </li>
                        </ul>
                    </div>
                </div>
                
            </div>
            @include('back-end.inc.admin-right-bar')
        </div>
    </div>
</div>

</div>
@endsection

@section('script')
<script type="text/javascript" src="{{asset('admin-assets/assets/js/modal.js')}}"></script>
<script type="text/javascript" src="{{asset('admin-assets/assets/js/modalEffects.js')}}"></script>
<script>
    $(function(){
        
    });
</script>
@endsection
