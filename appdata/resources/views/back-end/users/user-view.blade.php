<table id="simpletable" class="table table-striped table-bordered nowrap">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Discount</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="data">
        <?php $n = 0; ?>
        @foreach($data as $value)
        <tr class="tr-{{++$n}}">
            <td>{{$n}}</td>
            <td class="td-name-{{$n}}">
                {{$value->name}}
            </td>
            <td class="td-email-{{$n}}">
                {{$value->email}}
            </td>
            <td class="td-phone-{{$n}}">
                {{$value->userInfo->phone}}
            </td>
            <td class="td-discount-{{$n}}">
                @if ($value->userInfo->discount)
                {{$value->userInfo->discount}}%
                @else
                N/A
                @endif
            </td>
            <td class="align-middle">
                <button type="button" onclick="editUser(<?= $value->id ?>,<?= $n ?>)"
                    class="btn btn-sm btn-info waves-effect md-trigger" data-modal="modal-13">
                    <i class="icon-pencil"></i>
                </button>
                <button class="btn btn-sm btn-danger" onclick="deleteUser(<?= $value->id ?>)">
                    <i class="icon-trash"></i>
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>