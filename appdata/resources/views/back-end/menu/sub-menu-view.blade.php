<table id="simpletable" class="table table-striped table-bordered nowrap">
    <thead>
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Menu</th>
            <th>Sub Menu</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="data">
        <?php $n = 0; ?>
        @foreach ($data as $value)
            <tr class="tr-{{ ++$n }}">
                <td>{{ $n }}</td>
                <td class="td-image-{{ $n }}">
                    @if (@$value->subMenuInfo->img)
                        <img src="{{ asset('uploads/sub_menus/xs-' . $value->subMenuInfo->img) }}" class="img-fluid"
                            alt="img">
                    @else
                        <img src="{{ asset('uploads/demo.webp') }}" class="img-fluid"
                            style="filter: blur(3px);-webkit-filter: blur(3px);" alt="img">
                    @endif
                </td>
                <td class="td-m-{{ $n }}">
                    @if ($value->menu)
                        EN - {{ $value->menu->menu_en }} <br>
                        LT - {{ $value->menu->menu_lt }} <br>
                        RUS - {{ $value->menu->menu_rus }} <br>
                        {{-- PT - {{ $value->menu->menu_pt }} <br>
                        ES - {{ $value->menu->menu_es }} --}}
                    @endif
                </td>
                <td class="td-{{ $n }}">
                    EN - {{ $value->sub_menu_en }} <br>
                    LT - {{ $value->sub_menu_lt }} <br>
                    RUS - {{ $value->sub_menu_rus }} <br>
                    {{-- PT - {{ $value->sub_menu_pt }} <br>
                    ES - {{ $value->sub_menu_es }} --}}
                </td>
                <td>
                    <button type="button" onclick="editSubMenu(<?= $value->id ?>, <?= $n ?>)" class="btn btn-sm btn-info waves-effect md-trigger" data-modal="modal-13"><i class="icon-pencil"></i></button>
                <button class="btn btn-sm btn-danger" onclick="deleteSubMenu(<?= $value->id ?>)"><i class="icon-trash"></i></button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
