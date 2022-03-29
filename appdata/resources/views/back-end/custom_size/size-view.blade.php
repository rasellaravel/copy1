<table id="simpletable" class="table table-striped table-bordered nowrap">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Sizes</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody class="data">
        <?php $n = 0; ?>
        @foreach($data as $value)
        @php
        $s_size_en = [];
        $s_size_lt = [];
        $s_size_rus = [];
        $s_size_pt = [];
        $s_size_es = [];
        @endphp
        @foreach ($value->sizes as $val)
        @php
        $s_size_en[] = $val->size_en;
        $s_size_lt[] = $val->size_lt;
        $s_size_rus[] = $val->size_rus;
        $s_size_pt[] = $val->size_pt;
        $s_size_es[] = $val->size_es;
        @endphp
        @endforeach
        <tr class="tr-{{++$n}}">
            <td>{{$n}}</td>
            <td class="td-{{$n}}">
                EN - {{$value->name_en}} <br>
                LT - {{$value->name_lt}} <br>
                RUS - {{$value->name_rus}} <br>
                {{-- PT - {{$value->name_pt}} <br>
                ES - {{$value->name_es}} --}}
            </td>
            <td class="td-size-{{ $n }}" style="max-width: 400px;white-space: inherit;">
                EN - {!! implode(', ', $s_size_en)!!} <br>
                LT - {!! implode(', ', $s_size_lt)!!} <br>
                RUS - {!! implode(', ', $s_size_rus)!!} <br>
                {{-- PT - {!! implode(', ', $s_size_pt)!!} <br>
                ES - {!! implode(', ', $s_size_es)!!} --}}
            </td>
            <td class="align-middle">
                <button type="button" onclick="editCustomSize(<?= $value->id ?>,<?= $n ?>)"
                    class="btn btn-sm btn-info waves-effect md-trigger" data-modal="modal-13"><i
                        class="icon-pencil"></i></button>
                <button class="btn btn-sm btn-danger" onclick="deleteCustomSize(<?= $value->id ?>)"><i
                        class="icon-trash"></i></button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>