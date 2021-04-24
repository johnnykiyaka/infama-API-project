<div class="table-responsive-sm">
    <table class="table table-striped" id="series-table">
        <thead>
            <tr>
                <th>Movietype</th>
        <th>Start</th>
        <th>Ends</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($series as $series)
            <tr>
                <td>{{ $series->movieType }}</td>
            <td>{{ $series->start }}</td>
            <td>{{ $series->Ends }}</td>
                <td>
                    {!! Form::open(['route' => ['series.destroy', $series->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('series.show', [$series->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('series.edit', [$series->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>