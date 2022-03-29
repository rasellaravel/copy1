<table id="simpletable" class="table table-striped table-bordered nowrap">
    <thead>
        <tr>
            <th>#</th>
            <th>Img</th>
            <th>Title</th>
            <th>Top Product</th>
            <th>Is Stock</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="data">
        <?php $n = 0; ?>
        @foreach ($data as $value)
            <tr class="tr-{{ ++$n }}" id="product_row_{{ $value->id }}">
                <td>{{ $n }}</td>
                <td class="td-{{ $n }}">
                    @if ($value->product_img)
                        <img src="{{ asset('uploads/product/alt/sm-' . $value->product_img) }}" class="img-fluid"
                            alt="img">
                    @else
                        <img src="{{ asset('uploads/demo.webp') }}" class="img-fluid"
                             alt="img">
                    @endif
                </td>
                <td class="td-{{ $n }}">
                    EN - {{ $value->title_en }} <br>
                    LT - {{ $value->title_lt }} <br>
                    RUS - {{ $value->title_rus }} <br>
                    {{-- PT - {{ $value->title_pt }} <br>
                    ES - {{ $value->title_es }} --}}
                </td>
                <td class="td-{{ $n }}">
                    @if ($value->is_top_product == 1)
                        <span class="fa fa-check text-success"></span>
                    @else
                        <span class="fa fa-times"></span>
                    @endif
                </td>
                <td class="td-{{ $n }}">
                    @if ($value->is_stock)
                        <span class="itm-stock">Item is in stock</span>
                    @else
                        <span class="out-of-stock">Out of stock</span>
                    @endif
                </td>
                <td>
                    <button type="button" onclick="editProduct(<?= $value->id ?>,<?= $n ?>)" class="btn btn-sm btn-info waves-effect md-trigger" data-modal="modal-13"><i class="icon-pencil"></i></button>
                <button class="btn btn-sm btn-danger" onclick="deleteProduct(<?= $value->id ?>)"><i class="icon-trash"></i></button>
                <button class="btn btn-sm btn-secondary" onclick="duplicateProduct(event, <?= $value->id ?>)"><i class="ti-files"></i></button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
