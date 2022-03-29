@extends('back-end.admin-app')
@section('title','Payments')
@section('style')
<link rel="stylesheet" type="text/css" href="{{asset('admin-assets/assets/css/component.css')}}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/font-awesome/css/font-awesome.min.css')}}">
<!-- jpro forms css -->
<link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/assets/pages/j-pro/css/demo.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/assets/pages/j-pro/css/j-forms.css') }}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.6.6/summernote.min.css">
<style>
    #simpletable img,
    .img-v img {
        width: 100px
    }

    .img-v img {
        margin-top: 15px;
    }

    .select2-dropdown {
        z-index: 9999;
    }

    .select2-search.select2-search--inline {
        padding: 0
    }

    .grand-total {
        float: right;
        padding-right: 36px;
    }

    .order-product .product-n-i {
        display: flex;
        align-items: center;
    }

    .order-product .product-n-i .pro-img {
        width: 55px;
        height: 55px;
        margin-right: 5px;
        overflow: hidden;
    }

    .order-product .product-n-i .pro-img img {
        height: 100%;
        width: 100% !important;
        object-fit: cover;
    }

    #simpletable1_wrapper {
        margin-top: 15px !important;
    }

    @media (min-width: 576px) {
        .modal-dialog {
            max-width: 727px !important;
            margin: 30px auto;
        }
    }
</style>
@endsection

@section('content')
<div class="pcoded-content">
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-header">
                    <div class="page-header-title">
                        <h4>Order List</h4>
                    </div>
                    <div class="page-header-breadcrumb">
                        <ul class="breadcrumb-title">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">
                                    <i class="icofont icofont-home"></i>
                                </a>
                            </li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Pages</a>
                            </li>
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Order List</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div id="history-modal"></div>
                <div class="page-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Order List</h5>
                                    <div class="card-header-right">
                                        <i class="icofont icofont-rounded-down"></i>
                                        <i class="icofont icofont-refresh"></i>
                                        <i class="icofont icofont-close-circled"></i>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div class="dt-responsive table-responsive">
                                        <table id="simpletable" class="table table-striped table-bordered nowrap">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Phone</th>
                                                    <th>Order Id</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="data">
                                                @if(count($orders) > 0)
                                                @foreach($orders as $order)
                                                <tr id="id_{{$order->id}}">
                                                    <td>{{$loop->index + 1}}</td>
                                                    <td>{{$order->name}}</td>
                                                    <td>{{$order->email}}</td>
                                                    <td>{{$order->phone ?: $order->user->userInfo->phone}}</td>
                                                    <td>{{$order->order_id}}</td>
                                                    <td>{{date('Y-m-d',strtotime($order->created_at))}}</td>
                                                    <td class="shipping-status-show">
                                                        @if ($order->status == 0)
                                                        <span class="badge badge-pill badge-secondary">Pending</span>
                                                        @elseif($order->status == 1)
                                                        <span class="badge badge-pill badge-primary">Confirmed</span>
                                                        @elseif($order->status == 2)
                                                        <span class="badge badge-pill badge-info">Shipped</span>
                                                        @elseif($order->status == 3)
                                                        <span class="badge badge-pill badge-success">Delivered</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-info btn-sm"
                                                            onclick="orderDetails({{$order->id}})">View</button>
                                                        &ensp;
                                                        <span class="pay-status-show">
                                                            @if ($order->is_paid)
                                                            <span class="badge badge-pill badge-success">Paid</span>
                                                            @else
                                                            <span class="badge badge-pill badge-danger">Unpaid</span>
                                                            @endif
                                                        </span>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                        </table>
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
<script type="text/javascript" src="{{ asset('admin-assets/assets/js/modal.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin-assets/assets/js/modalEffects.js') }}"></script>
<!-- j-pro js -->
<script type="text/javascript" src="{{ asset('admin-assets/assets/pages/j-pro/js/jquery.ui.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('admin-assets/assets/pages/j-pro/js/jquery.maskedinput.min.js') }}">
</script>
<script type="text/javascript" src="{{ asset('admin-assets/assets/pages/j-pro/js/jquery-cloneya.min.js') }}"></script>

{{-- cloned form --}}
<script type="text/javascript" src="{{ asset('admin-assets/assets/pages/j-pro/js/custom/cloned-form.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.6.6/summernote.min.js"></script>
<script>
    $(function() {
        $("#simpletable").DataTable();
        $('.js-example-tokenizer-c').select2();

        $('.close-modal').on("click", function() {
            $("#modal-13").modal('hide');
        });
    });
    window.base_url = '<?= url('/') ?>';
    window.insert_mm_description = '<?= url('admin/insert-menu-main-description') ?>';
    window.insert_menu = '<?= url('admin/insert-menu') ?>';
    window.edit_menu = '<?= url('admin/get-menu') ?>';
    window.delete_menu = '<?= url('admin/delete-menu') ?>';
    window.update_menu = '<?= url('admin/update-menu') ?>';
</script>
<script>
    function orderDetails(id)
 	{
 		var data = new FormData();
		data.append('id',id);
		data.append('_token',"{{csrf_token()}}");
		$.ajax({
		    processData: false,
		    contentType: false,
		    data: data,
		    type: 'POST',
		    url: "{{route('admin.payment.history.details')}}",
		    success: function(response) {
		    	$('#history-modal').html(response);
		    	$('#orderDetailsModal').modal('show');
		    }
		});
 	}

function isPaid() {
    let is_paid = $('[name=is_paid]:checked').val();    
    let order_id = $('[name=order_id]').val();    
    $.ajax({
        data: {
            is_paid : is_paid,
            order_id : order_id,
            _token: "{{csrf_token()}}"
        },
        type: 'POST',
        url: "{{route('admin.payment.history.is_paid')}}",
        success: function(response) {
            if(is_paid == 1) {
                $("#id_" + order_id + " .pay-status-show").html('<span class="badge badge-pill badge-success">Paid</span>');
            }else {
                $("#id_" + order_id + " .pay-status-show").html('<span class="badge badge-pill badge-danger">Unpaid</span>');
            }
        }
    });
}
function shippingStatusChange() {
    let status = $('[name=shipping_status]:checked').val();    
    let order_id = $('[name=order_id]').val();    
    $.ajax({
        data: {
            status : status,
            order_id : order_id,
            _token: "{{csrf_token()}}"
        },
        type: 'POST',
        url: "{{route('admin.payment.history.shipping_status')}}",
        success: function(response) {
            if(status == 1) {
                $("#id_" + order_id + " .shipping-status-show").html('<span class="badge badge-pill badge-primary">Confirmed</span>');
            }else if(status == 2) {
                $("#id_" + order_id + " .shipping-status-show").html('<span class="badge badge-pill badge-info">Shipped</span>');
            }else if(status == 3) {
                $("#id_" + order_id + " .shipping-status-show").html('<span class="badge badge-pill badge-success">Delivered</span>');
            }else {
                $("#id_" + order_id + " .shipping-status-show").html('<span class="badge badge-pill badge-secondary">Pending</span>');
            }
        }
    });
}
</script>
@endsection