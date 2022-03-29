<table id="simpletable" class="table table-striped table-bordered nowrap">
    <thead>
        <tr>
            <th>#</th>
            <th>Country</th>
            <th>Type</th>
            <th>Category</th>
            <th>Shipping Price</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="data">
        <?php $n = 0; ?>
        @foreach ($data as $value)
            <tr class="tr-{{ ++$n }}">
                <td>{{ $n }}</td>
                <td class="td-country-{{ $n }}">
                    {{ $value->country->name }}
                </td>
                <td class="td-type-{{ $n }}">
                    {{ $value->shippingType->type }}
                </td>
                <td class="td-category-{{ $n }}">
                    {{ $value->shippingCategory->name }}
                </td>
                <td class="td-price-{{ $n }}">
                    {{ number_format((float) $value->price, 2, '.', '') }} EUR
                </td>
                <td class="align-middle">
                    <button type="button" onclick="editShipping(<?= $value->id ?>,<?= $n ?>)"
                    class="btn btn-sm btn-info waves-effect md-trigger" data-modal="modal-13"><i
                        class="icon-pencil"></i></button>
                <button class="btn btn-sm btn-danger" onclick="deleteShipping(<?= $value->id ?>)"><i
                        class="icon-trash"></i></button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
