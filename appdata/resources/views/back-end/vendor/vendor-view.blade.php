<table id="simpletable" class="table table-striped table-bordered nowrap">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
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
                <td class="td-email-{{ $n }}">
                    {{ $value->email }}
                </td>
                <td>
                    <a class="btn btn-sm btn-info waves-effect"
                        href="{{ route('admin.loginAsVendor', [$value->id]) }}">Login as
                        vendor</a>
                    <button class="btn btn-sm btn-danger" onclick="deleteVendor({{ $value->id }})"><i
                            class="icon-trash"></i></button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
