<table id="simpletable" class="table table-striped table-bordered nowrap">
    <thead>
        <tr>
            <th>#</th>
            <th>Cagegory Name</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="data">
        <?php $n = 0; ?>
        @foreach ($data as $value)
            <tr class="tr-{{ ++$n }}">
                <td>{{ $n }}</td>
                <td class="td-{{ $n }}">
                    {{ $value->name }}
                </td>
                <td class="td-status-{{ $n }}">
                    @if ($value->status)
                        <span class="itm-stock">Active</span>
                    @else
                        <span class="out-of-stock">Deactive</span>
                    @endif
                </td>
                <td class="align-middle">
                    <button type="button" onclick="editShippingCategory({{ $value->id }}, {{ $n }})"
                        class="btn btn-sm btn-info waves-effect md-trigger" data-modal="modal-13"><i
                            class="icon-pencil"></i></button>
                    <button class="btn btn-sm btn-danger" onclick="deleteShippingCategory({{ $value->id }})"><i
                            class="icon-trash"></i></button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
