@if (session()->has('tab'))
    @php
        $tab = session()->get('tab');
    @endphp
@endif
<div class="">
    <div class="igo-user-profile">
        <div class='igo-profile-nav row'>
            <div class="nav nav-pills col-lg-3 d-block d-md-flex" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                <a class="nav-link {{ $tab == 1 ? 'active' : '' }}" id="v-pills-home-tab" data-toggle="pill"
                    href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">
                    @lang('_lan.profile')
                    <span></span></a>
                <a class="nav-link {{ $tab == 2 ? 'active' : '' }}" id="v-pills-profile-tab" data-toggle="pill"
                    href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">
                    @lang('_lan.billing_address')
                    <span></span></a>
                <a class="nav-link {{ $tab == 3 ? 'active' : '' }}" id="v-pills-messages-tab" data-toggle="pill"
                    href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">
                    @lang('_lan.change_password') <span></span></a>
                <a class="nav-link {{ $tab == 4 ? 'active' : '' }}" id="v-pills-settings-tab" data-toggle="pill"
                    href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false"
                    onclick="showOrderData()">
                    @lang('_lan.my_orders') <span></span>
                </a>
                <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="{{ route('logout') }}"
                    onclick="logout(event)" role="tab">@lang('_lan.logout') <span></span>
                </a>
                <form action="{{ route('logout') }}" method="POST" id="logout_form">
                    @csrf
                </form>
            </div>
            <div class="tab-content col-lg-9" id="v-pills-tabContent">
                @if (session()->has('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('success') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session()->get('error') }}
                    </div>
                @endif
                <div class="tab-pane fade {{ $tab == 1 ? 'show active' : '' }}" id="v-pills-home" role="tabpanel"
                    aria-labelledby="v-pills-home-tab">
                    <div class="">
                        <div class="igo-lg-title">
                            @lang('_lan.profile_information')
                        </div>
                        <div class="card-body px-0">
                            <form action="{{ route('profile.update.info') }}" method="POST"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="name" class="normal-text">@lang('_lan.first_name')</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            value="{{ auth()->user()->name }}" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="last_name" class="normal-text">@lang('_lan.last_name')</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name"
                                            value="{{ $user_info->last_name }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="email" class="normal-text">@lang('_lan.email')</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ auth()->user()->email }}" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="image" class="normal-text">@lang('_lan.image')</label>
                                        <input type="file" class="form-control" id="image" name="image"
                                            onchange="readURL('profile_img', this)">
                                        <span class="common-text text-danger d-block">@lang('_lan.image_size_must')
                                            (1 :
                                            1)</span>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="phone" class="normal-text">@lang('_lan.phone')</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            value="{{ $user_info->phone }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="igo-profile-img text-center">
                                            <div class="igo-img-p">
                                                <div class="igo-img-c">
                                                    @if ($user_info->image)
                                                        <img src="{{ asset('uploads/profiles/' . $user_info->image) }}"
                                                            alt="img" class="img-thumbnail" id="profile_img">
                                                    @else
                                                        <img src="{{ asset('uploads/profile.webp') }}" alt="img"
                                                            class="img-thumbnail" id="profile_img">
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn-success btn">@lang('_lan.update')</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade {{ $tab == 2 ? 'show active' : '' }}" id="v-pills-profile" role="tabpanel"
                    aria-labelledby="v-pills-profile-tab">
                    <div class="">
                        <div class="igo-lg-title">
                            @lang('_lan.billing_address')
                        </div>
                        <div class="card-body px-0">
                            <form action="{{ route('profile.update.billing') }}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="first_name" class="normal-text">@lang('_lan.country')</label>
                                        <select name="country" id="" class="form-control">
                                            <option value="#" disabled selected>@lang('_lan.select')</option>
                                            @foreach ($countries as $item)
                                                <option value="{{ $item->name }}"
                                                    {{ $item->name == $user_info->billing_country ? 'selected' : '' }}>
                                                    {{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="district" class="normal-text">@lang('_lan.district')</label>
                                        <input type="text" class="form-control" id="district" name="district"
                                            value="{{ $user_info->billing_district }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="town" class="normal-text">@lang('_lan.town')</label>
                                        <input type="text" class="form-control" id="town" name="town"
                                            value="{{ $user_info->billing_town }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="street_address"
                                            class="normal-text">@lang('_lan.street_address')</label>
                                        <input type="text" class="form-control" id="street_address"
                                            name="street_address" value="{{ $user_info->billing_strt_address }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="apartment" class="normal-text">@lang('_lan.apartment')</label>
                                        <input type="text" class="form-control" id="apartment" name="apartment"
                                            value="{{ $user_info->billing_apartment }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="post_code" class="normal-text">@lang('_lan.post_code')</label>
                                        <input type="text" class="form-control" id="post_code" name="post_code"
                                            value="{{ $user_info->billing_post_code }}">
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="company_name" class="normal-text">@lang('_lan.company_name')</label>
                                        <input type="text" class="form-control" id="company_name" name="company_name"
                                            value="{{ $user_info->company_name }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="company_id" class="normal-text">@lang('_lan.company_id')</label>
                                        <input type="text" class="form-control" id="company_id" name="company_id"
                                            value="{{ $user_info->company_id }}">
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="company_vat" class="normal-text">@lang('_lan.company_vat')</label>
                                        <input type="text" class="form-control" id="company_vat" name="company_vat"
                                            value="{{ $user_info->company_vat }}">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="company_address" class="normal-text">@lang('_lan.company_address')</label>
                                        <input type="text" class="form-control" id="company_address" name="company_address"
                                            value="{{ $user_info->company_address }}">
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label for="others" class="normal-text">@lang('_lan.others')</label>
                                        <textarea class="form-control" id="others" name="others">{{ $user_info->others }}</textarea>
                                    </div>

                                </div>

                                <button type="submit" class="btn-success btn">@lang('_lan.update')</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade {{ $tab == 3 ? 'show active' : '' }}" id="v-pills-messages" role="tabpanel"
                    aria-labelledby="v-pills-messages-tab">
                    <div class="">
                        <div class="igo-lg-title">
                            @lang('_lan.manage_password')
                        </div>
                        <div class="card-body px-0">
                            <form action="{{ route('profile.update.password') }}" method="POST">
                                @csrf
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="old_password"
                                            class="normal-text">@lang('_lan.current_password')</label>
                                        <input type="password" class="form-control" id="old_password"
                                            name="old_password">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="new_password" class="normal-text">@lang('_lan.new_password')</label>
                                        <input type="password" class="form-control" id="new_password"
                                            name="new_password" required>
                                    </div>
                                </div>

                                <button type="submit" class="btn-success btn">@lang('_lan.update')</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade {{ $tab == 4 ? 'show active' : '' }}" id="v-pills-settings" role="tabpanel"
                    aria-labelledby="v-pills-settings-tab">
                    <div class="">
                        <div class="igo-lg-title">
                            @lang('_lan.my_orders')
                        </div>
                        <div class="card-body px-0" id="orderDataTable">
                            @if (count($orders) > 0)
                                <div class="row" id="orderDataTableInr">
                                    <div class="col-lg-12">
                                        <div class="igo-profile-1-table">
                                            <table class="table table-bordered dt-responsive nowrap" id="ordersData"
                                                style="width: 100%;">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>#</th>
                                                        <th> @lang('_lan.name')</th>
                                                        <th> @lang('_lan.email')</th>
                                                        <th> @lang('_lan.phone')</th>
                                                        <th> @lang('_lan.order_id')</th>
                                                        <th> @lang('_lan.date')</th>
                                                        <th> @lang('_lan.status')</th>
                                                        <th> @lang('_lan.action')</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($orders as $order)
                                                        <tr>
                                                            <td>{{ $loop->index + 1 }}</td>
                                                            <td>{{ $order->name }}</td>
                                                            <td>{{ $order->email }}</td>
                                                            <td>{{ $order->phone ?: $order->user->userInfo->phone }}
                                                            </td>
                                                            <td>{{ $order->order_id }}</td>
                                                            <td>{{ date('Y-m-d', strtotime($order->created_at)) }}
                                                            </td>
                                                            <td class="shipping-status-show">
                                                                <span class="pay-status-show">
                                                                    @if ($order->is_paid)
                                                                        <span
                                                                            class="badge badge-pill badge-success">@lang('_lan.paid')</span>
                                                                    @else
                                                                        <span
                                                                            class="badge badge-pill badge-danger">@lang('_lan.unpaid')</span>
                                                                    @endif
                                                                </span>
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('orders.view', [$order->id]) }}"
                                                                    class="btn-success btn">@lang('_lan.view')</a>

                                                                <a href="{{ route('orders.download', [$order->id]) }}"
                                                                    class="btn-info btn mt-2">@lang('_lan.Download')</a> 

                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @else
                                <div class="alert alert-primary" role="alert">
                                    @lang('_lan.No_Order_Found') ):
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
