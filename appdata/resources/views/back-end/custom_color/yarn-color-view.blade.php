<table id="simpletable" class="table table-striped table-bordered nowrap">
    <thead>
        <tr>
            <th>#</th>
            <th>Color</th>
            <th>Code</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $n = 0; ?>
        @foreach($data as $value)
        <tr class="tr-{{++$n}}">
            <td>{{$n}}</td>
            <td class="td-{{$n}}">
                EN - {{$value->color_en}} <br>
                LT - {{$value->color_lt}} <br>
                RUS - {{$value->color_rus}} <br>
                PT - {{$value->color_pt}} <br>
                ES - {{$value->color_es}}
            </td>
            <td class="td-code-{{ $n }}">
                {{$value->code}}
            </td>
            <td>
                <button type="button" onclick="editYarnColor(<?= $value->id ?>,<?= $n ?>)"
                    class="btn btn-sm btn-info waves-effect md-trigger" data-modal="modal-13"><i
                        class="icon-pencil"></i></button>
                <button class="btn btn-sm btn-danger" onclick="deleteYarnColor(<?= $value->id ?>)"><i
                        class="icon-trash"></i></button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>