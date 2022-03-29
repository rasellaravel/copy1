<table id="simpletable" class="table table-striped table-bordered nowrap">
    <thead>
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="data">
        <?php $n = 0; ?>
        @foreach ($data as $value)
            <tr class="tr-{{ ++$n }}">
                <td>{{ $n }}</td>
                <td class="td-image-{{ $n }}">
                    @if (@$value->menuInfo->img)
                        <img src="{{ asset('uploads/menus/xs-' . $value->menuInfo->img) }}" class="img-fluid"
                            alt="img">
                    @else
                        <img src="{{ asset('uploads/demo.webp') }}" class="img-fluid"
                            style="filter: blur(3px);-webkit-filter: blur(3px);" alt="img">
                    @endif
                </td>
                <td class="td-{{ $n }}">
                    EN - {{ $value->menu_en }} <br>
                    LT - {{ $value->menu_lt }} <br>
                    RUS - {{ $value->menu_rus }} <br>
                    {{-- PT - {{ $value->menu_pt }} <br>
                    ES - {{ $value->menu_es }} --}}
                </td>
                <td>
                    <button type="button" onclick="editMenu(<?= $value->id ?>,<?= $n ?>)" class="btn btn-sm btn-info waves-effect md-trigger" data-modal="modal-13"><i class="icon-pencil"></i></button>
                <button class="btn btn-sm btn-danger" onclick="deleteMenu(<?= $value->id ?>)"><i class="icon-trash"></i></button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
