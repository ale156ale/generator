<div class="table-responsive">
    <table class="table" id="testes-table">
        <thead>
            <tr>
                <th>Title</th>
        <th>Post Date</th>
        <th>Body</th>
        <th>Email</th>
        <th>Author Gender</th>
        <th>Post Type</th>
        <th>Post Visits</th>
        <th>Category</th>
        <th>Category Short</th>
        <th>Is Private</th>
        <th>Writer Id</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($testes as $teste)
            <tr>
                <td>{!! $teste->title !!}</td>
            <td>{!! $teste->post_date !!}</td>
            <td>{!! $teste->body !!}</td>
            <td>{!! $teste->email !!}</td>
            <td>{!! $teste->author_gender !!}</td>
            <td>{!! $teste->post_type !!}</td>
            <td>{!! $teste->post_visits !!}</td>
            <td>{!! $teste->category !!}</td>
            <td>{!! $teste->category_short !!}</td>
            <td>{!! $teste->is_private !!}</td>
            <td>{!! $teste->writer_id !!}</td>
                <td>
                    {!! Form::open(['route' => ['testes.destroy', $teste->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{!! route('testes.show', [$teste->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                        <a href="{!! route('testes.edit', [$teste->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                        {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
