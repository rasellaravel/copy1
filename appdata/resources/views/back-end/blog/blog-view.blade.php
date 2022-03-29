<table id="simpletable" class="table table-striped table-bordered nowrap">
    <thead>
        <tr>
            <th>#</th>
            <th>Img/Video</th>
            <th>Title</th>
            <th>description</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php $n = 0; ?>
        @foreach ($data as $value)
            <tr class="tr-{{ ++$n }}">
                <td>{{ $n }}</td>
                <td class="td-{{ $n }}">
                    @if ($value->video)
                        <div class="embed-responsive embed-responsive-16by9" style="width: 150px">
                            <iframe class="embed-responsive-item"
                                src="https://www.youtube.com/embed/{{ $value->video }}"></iframe>
                        </div>
                    @elseif($value->img)
                        <img src="{{ asset('uploads/blogs/' . $value->img) }}" class="img-fluid" alt="img">
                    @else
                        N/A
                    @endif
                </td>
                <td class="td-{{ $n }}">
                    {{ $value->title }}
                </td>
                <td class="td-{{ $n }}" style="white-space: normal;">
                    <?= substr(strip_tags($value->description), 0, 50) . '. . . .' ?>
            </td>
            <td>
                <button type="button" onclick="editBlog(<?= $value->id ?>,<?= $n ?>)"
                    class="btn btn-sm btn-info waves-effect md-trigger" data-modal="modal-13"><i
                        class="icon-pencil"></i></button>
                <button class="btn btn-sm btn-danger" onclick="deleteBlog(<?= $value->id ?>)"><i
                        class="icon-trash"></i></button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
