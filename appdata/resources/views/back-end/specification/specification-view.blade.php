<table id="simpletable" class="table table-striped table-bordered nowrap">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @php $n = 0; @endphp
        @foreach ($data as $value)
            <tr class="tr-{{ ++$n }}">
                <td>{{ $n }}</td>
                <td class="td-{{ $n }}">
                    EN - {{ $value->name_en }} <br>
                    LT - {{ $value->name_lt }} <br>
                    RUS - {{ $value->name_rus }} <br>
                    {{-- PT - {{ $value->name_pt }} <br>
                    ES - {{ $value->name_es }} --}}
                </td>
                <td>
                    <button type="button" onclick="editSpecification({{ $value->id }},{{ $n }})"
                        class="btn btn-sm btn-info waves-effect md-trigger" data-modal="modal-13"><i
                            class="icon-pencil"></i></button>
                    <button class="btn btn-sm btn-danger" onclick="deleteSpecification({{ $value->id }})"><i
                            class="icon-trash"></i></button>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
