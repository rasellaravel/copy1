@extends('back-end.admin-app')
@section('title', 'Custom Size')
@section('style')

@endsection

@section('content')
    <div class="pcoded-content">
        <div class="pcoded-inner-content">
            <div class="main-body">
                <div class="page-wrapper">
                    <div class="page-header">
                        <div class="page-header-title">
                            <h4>Change Admin Password</h4>
                        </div>
                        <div class="page-header-breadcrumb">
                            <ul class="breadcrumb-title">
                                <li class="breadcrumb-item">
                                    <a href="{{ route('admin.dashboard') }}">
                                        <i class="icofont icofont-home"></i>
                                    </a>
                                </li>
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Admin</a>
                                </li>
                                <li class="breadcrumb-item"><a href="javascript:void(0)">Change Password</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="page-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Change password</h5>
                                        <div class="card-header-right">
                                            <i class="icofont icofont-rounded-down"></i>
                                            <i class="icofont icofont-refresh"></i>
                                            <i class="icofont icofont-close-circled"></i>
                                        </div>
                                    </div>
                                    <div class="card-block">
                                        <div id="formData">
                                            <form method="post" action="{{route('admin.changePasswordForm')}}" role="form"
                                                enctype="multipart/form-data" autocomplete="off">
                                                @csrf
                                                @if(Session::has('success'))
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="alert alert-primary" role="alert">
                                                                {{Session::get('success')}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="form-group row">
                                                    <div class="col-sm-6">
                                                        <label for="name" class="col-form-label">Name <b
                                                                class="text-danger"></b></label>
                                                        <input type="text" id="name" name="name"
                                                            class="form-control check-empty" required value="{{auth()->user()->name}}">
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <label for="email" class="col-form-label">Email <b
                                                                class="text-danger"></b></label>
                                                        <input type="email" id="email" name="email"
                                                            class="form-control check-empty" required value="{{auth()->user()->email}}">
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <label for="password" class="col-form-label">Password <b
                                                                class="text-danger"></b></label>
                                                        <input type="password" id="password" name="password"
                                                            class="form-control check-empty"  minlength="8" autocomplete="off">
                                                    </div>
                                                </div>

                                                <div class="form-group row" id="">
                                                    <input type="submit" class=" ml-20 btn btn-primary " value="submit">
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @include('back-end.inc.admin-right-bar')
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            $('#password').val('');
        })
    </script>
@endsection
