<table id="simpletable1" class="table table-striped table-bordered nowrap order-product">
    <thead>
        <tr>
            <th>#</th>
            <th style="max-width: 200px">Product</th>
            <th style="max-width: 200px">Information</th>
            <th>Price</th>
            <th>Quantity</th>
        </tr>
    </thead>
    <tbody class="data">
        <?php $n = 0; ?>
        @foreach ($order->ordered_vendor as $val)
            @foreach ($val->ordered_product as $item)
                <tr class="tr-{{ ++$n }}">
                    <td>{{ $n }}</td>
                    <td class="td-product-{{ $n }}" style="white-space: normal">
                        <a href="{{ url('product-details', [$item->product->id]) }}" target="_blank"
                            style="color: black">
                            <div class="product-n-i">
                                <div class="pro-img">
                                    @if ($item->product->product_img)
                                        <img src="{{ asset('uploads/product/alt/sm-' . $item->product->product_img) }}"
                                            alt="Left Banner" class="img-responsive product-n cover">
                                    @else
                                        <img src="{{ asset('uploads/sm-demo.png') }}" class="img-fluid" alt="img">
                                    @endif
                                </div>
                                <div class="pro-txt" style="font-size: 14px">
                                    {{ $item->product->title_en }}
                                </div>
                            </div>
                        </a>
                    </td>
                    <td class="td-information-{{ $n }}" style="white-space: normal">
                        <div class="pro-info">
                            @if ($item['color_en'])
                                <span class="pro-color">
                                    @lang('home.color'):
                                    {{ $item['color_en'] }}
                                </span>
                            @endif
                            @if ($item['yarn_color'])
                                <span class="pro-yarn-color">
                                    @lang('home.yarn_color'):
                                    {{ $item['yarn_color'] }}
                                </span>
                            @endif
                            @if ($item['size_en'])
                                <span class="pro-size">
                                    &nbsp;Size:
                                    {{ $item['size_en'] }}
                                </span>
                            @endif
                            @if ($item['clasp'])
                                <span class="pro-clasp">
                                    &nbsp;Clasp:
                                    {{ $item['clasp'] }}
                                </span>
                            @endif
                            @if ($item['surface_amber'])
                                <span class="pro-surface-amber">
                                    &nbsp;Surface amber:
                                    {{ $item['surface_amber'] }}
                                </span>
                            @endif
                        </div>
                        <div class="pro-info">
                            @if ($item['certificate'])
                                <span class="pro-certificate">
                                    With Certificate
                                </span>
                            @endif
                        </div>
                    </td>
                    <td class="td-price-{{ $n }}">
                        €{{ number_format((float) $item->total, 2, '.', '') }}
                    </td>
                    <td class="td-quantity-{{ $n }}">
                        {{ $item['quantity'] }}
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="5">
                    <span>
                        {{ $val->vendor->name }}
                        <br />
                        {{ $val->vendor->email }}
                    </span>
                    <span class="ml-3">Shipping Cost :
                        €{{ number_format((float) $val->shipping_cost, 2, '.', '') }}</span>
                    <span class="ml-3">Total : €{{ number_format((float) $val->total, 2, '.', '') }}</span>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
