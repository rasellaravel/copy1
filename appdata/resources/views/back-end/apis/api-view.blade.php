<table id="simpletable" class="table table-striped table-bordered nowrap">
    <thead>
        <tr>
            <th>#</th>
            <th>User name</th>
            <th>Key</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="data">
        <?php $n = 0; ?>
        @foreach ($data as $value)
            <tr class="tr-{{ ++$n }}">
                <td>{{ $n }}</td>
                <td class="td-{{ $n }}">
                    {{ $value->user->name }}
                </td>
                <td class="td-key-{{ $n }}">
                    {{ $value->api_key }}
                </td>
                <td>
                    <button class="btn btn-sm btn-danger" onclick="deleteApi(<?= $value->id ?>)"><i
                        class="icon-trash"></i></button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
