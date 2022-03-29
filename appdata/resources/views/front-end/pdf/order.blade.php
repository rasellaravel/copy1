<!DOCTYPE html>
<html>
    <head>
        <title>Copypro order invocie</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <style>
            table {
                border-collapse: collapse;
                width: 100%;
            }

            th, td {
                padding: 8px;
                text-align: left;
                border-bottom: 1px solid #DDD;
            }
            tr:hover {background-color: #D6EEEE;}
        </style>
    </head>
<body>

    <div style="text-align:center; font-sixe:20px; font-width:bold; margin-top:20px; margin-bottom:30px"><b>@lang('_lan.order_id'): {{$order->order_id}}</b></div>

    <div style="width: 100%; height:auto; margin-bottom: 50px">
        <div style="float:left; width: 45%;">
            <h5>@lang('_lan.From')</h5>
            <div style="">
                <p style="line-height: 4px"><b>UAB</b>"COPY PRO"</p>
                <p style="line-height: 4px">Gedimino pr. 33 Vilnius</p>
                <p style="line-height: 4px"><b>@lang('_lan.Tel'): </b>+370 5 260 0522 </p>
                <p style="line-height: 4px"><b>@lang('_lan.Mob'): </b>+370 688 02 504 </p>
                <p style="line-height: 4px"><b>@lang('_lan.email'): </b>copypro@copypro.lt</p>
            </div>
        </div>
        <div style="float: right;width: 45%;">
            <h5>@lang('_lan.To')</h5>
            <div class="client-info" style="">
                <p style="line-height: 4px;"><b>{{$order->name}}</b></p>
                <p style="line-height: 4px;">
                    @if($order->apartment)
                        {{$order->apartment.' '}}
                    @endif
                    @if($order->street_address)
                        {{$order->street_address.' '}}
                    @endif
                    @if($order->town)
                        {{$order->town.' '}}
                    @endif
                    @if($order->district)
                        {{$order->district.' '}}
                    @endif
                    @if($order->post_code)
                        {{$order->post_code.' '}}
                    @endif
                    @if($order->country)
                        {{$order->country.' '}}
                    @endif    
                </p>
                <p style="line-height: 4px;"><b>{{$order->phone}}</b></p>
                <p style="line-height: 4px;"><b>{{$order->email}}</b></p>
                
            </div>
        </div>
    </div>
    <table>
        <tr>
            <th>@lang('_lan.product')</th>
            <th>@lang('_lan.information')</th>
            <th>@lang('_lan.price')</th>
            <th>@lang('_lan.qty')</th>
            <th>@lang('_lan.total')</th>
        </tr>
        @php $shipping = 0.00; @endphp
        @foreach ($order->ordered_vendor as $val)
            @php $shipping  = $val->shipping_cost; @endphp
            @foreach ($val->ordered_product as $item)
                <tr>
                    <td>@php echo $item->product->{'title_' . app()->getLocale()} @endphp</td>
                    <td>
                        @if ($item->{'size_' . app()->getLocale()})
                            @php echo $item->{'size_' . app()->getLocale()} @endphp
                        @endif
                        @if ($item->{'color_' . app()->getLocale()})
                            <br />
                            @php echo $item->{'color_' . app()->getLocale()} @endphp
                        @endif
                    </td>
                    <td>${{ number_format((float) $item->price, 2, '.', '') }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>${{ number_format((float) $item->total, 2, '.', '') }}</td>
                </tr>
            @endforeach
        @endforeach        
    </table>
    <div style="height:auto; width: 25%; float: right; maring-top: 50px">
		<div style="width: 100%; height: auto; margin-top:5px; margin-bottom: 10px;">
			<table>
				<tr>
					<td style="padding: 5px;"><b>@lang('_lan.Shipping'): </b></td>
					<td style="padding: 5px;"><b>${{ number_format($shipping,2) }}</b></td>
				</tr>
                <tr>
					<td style="padding: 5px;"><b>@lang('_lan.total'): </b></td>
					<td style="padding: 5px;"><b>${{ number_format($order->total,2) }}</b></td>
				</tr>
			</table>
		</div>
    </div>    
</body>
</html>



