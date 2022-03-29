@extends('front-end.app')
@php
$description = "Need a functional log cabin, garden office, summer house, an outside lodge? We can provide all the solutions you need.
Everything you need to erect your log cabin is included!";
@endphp
@section('description', $description)
@section('title', __('_lan.checkout') . ' | BHG WOOD')
@section('content')
<h1 class="d-none">Checkout</h1>

<section class="igo-breadcrump-wrap {{ session()->get('is_screen') == 'app' ? 'mt-135' : 'my-4' }}">
    <div class="page-title text-center mb-2">
        <h3 class="igo-lg-title3">@lang('_lan.checkout')</h3>
    </div>
</section>

<section class="pb-5">
    <div class="container">
        @include('front-end.pages.cart.checkout-1')
    </div>
</section>

@endsection
@section('script')
<script>
    window.filter_cart = "{{ route('cart.filter') }}";
</script>
<script type="text/javascript">
    $(document).ready(function(){
        var val = $.trim($( ".ship1_2 option:selected" ).text());
        hideShow(val)
    })
    $(document).on('change','.ship1_2',function(){
        var val = $.trim($( ".ship1_2 option:selected" ).text());
        console.log(val)
        hideShow(val)
    })
    function hideShow(val){
        if(val =='LPExpress'){
            $('.igo-box1').hide();
            $('.igo-box2').show();
            
        }else{
            $('.igo-box2').hide();
            $('.igo-box1').show();
        }
    }
    
</script>

<script type="text/javascript">
    $(document).ready(function(){
        $("#paymentBtn").click(function(){        
        $("#paymentForm").submit(); // Submit the form
    });
    });
</script>
@endsection
