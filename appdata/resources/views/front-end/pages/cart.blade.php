 @extends('front-end.app')

 @section('content')
     @php
         $description = "Need a functional log cabin, garden office, 
                           summer house, an outside lodge? We can provide all the solutions you need.
                                   Everything you need to erect your log cabin is included!";
     @endphp
 @section('description', $description)
 @section('title', __('_lan.cart') . ' | BHG WOOD')
 @section('content')
     <h1 class="d-none">Cart</h1>
     <section class="igo-breadcrump-wrap my-3">
         <div class="page-title text-center">
             <h3 class="igo-lg-title3">@lang('_lan.my_cart')</h3>
         </div>
     </section>
     @include('front-end.pages.cart.web-cart-2')

 @endsection
 @section('script')
     <script>
         window.update_cart_item = "{{ route('cart.item.update') }}";
         window.update_cart_by_id = "{{ route('cart.item.update.byid') }}";
         window.get_price_by_filter = "{{ route('filter.price.get') }}";
     </script>
 @endsection
