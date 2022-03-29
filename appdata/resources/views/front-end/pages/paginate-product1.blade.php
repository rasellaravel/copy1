@if(@$productsSR)
<div class="product-list">
    <div class="row mar-0">
        @foreach ($productsSR as $product)
        <div class="col-6 col-md-4 col-lg-3">
            <div class="product">
                <div class="single-product single-product-show">
                    <div class="product-img">
                        <a href="{{url('/product-details/'.$product->id)}}">
                            @if($product->product_img)
                            <img src="{{ asset('proAltImg/' . $product->product_img)  }}" alt="Left Banner" class="img-responsive product-n">
                            <img src="{{ asset('proAltImg/' . $product->product_img)  }}" alt="Left Banner" class="img-responsive product-h d-none">
                            @else
                            <img src="{{ asset('assets/img/logo.png') }}" class="img-fluid" alt="img">
                            @endif
                        </a>
                    </div>
                    <div class="product-info">
                        <h6 class="product-name"><a href="{{url('/product-details/'.$product->id)}}"><?=$product->{'title_'.app()->getLocale()} ?></a></h6>
                        <div class="rating">
                            <span class="fa fa-stack active"><i class="fa fa-star fa-stack-1x"></i></span>
                            <span class="fa fa-stack active"><i class="fa fa-star fa-stack-1x"></i></span>
                            <span class="fa fa-stack active"><i class="fa fa-star fa-stack-1x"></i></span>
                            <span class="fa fa-stack active"><i class="fa fa-star fa-stack-1x"></i></span>
                            <span class="fa fa-stack"><i class="fa fa-star fa-stack-1x"></i></span>
                        </div>
                        <span class="price">
                            <span class="amount"><span class="currencySymbol">$</span>{{$product->productPrice->price}}
                                <!-- @if($product->productPrices)
                                @foreach($product->productPrices as $productPr)
                                @if($productPr->price){{$productPr->price}} @else {{0}} @endif 
                                @endforeach 
                                @else {{0}} @endif -->
                            </span>
                        </span>
                        <div class="button-group d-none">
                            <div class="wishlist" title="Add to Wishlist" onclick="adToFavourite('<?= $product->id ?>')"><a href="#"><span>wishlist</span></a></div>
                            <!-- <div class="quickview"><a href="#"><span>Quick View</span></a></div> -->
                            <div class="compare"><a href="#"><span>Compare</span></a></div>
                            <div class="add-to-cart" title="Add to Cart" onclick="adTocart('<?= $product->id ?>')"><a href="#"><span>Add to cart</span></a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
<div class="product-pagination text-center">
    {{$productsSR->links()}}
</div>
@else
<div class="text-center text-danger">No Product Found</div>
@endif