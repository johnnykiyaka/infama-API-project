<div class="table-responsive-sm">
    <table class="table table-striped" id="clientels-table">
        <thead>
            <tr>
                <th>Movietype</th>
        <th>Start</th>
        <th>Ends</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($clientels as $clientel)
            <tr>
                <td>{{ $clientel->movieType }}</td>
            <td>{{ $clientel->start }}</td>
            <td>{{ $clientel->Ends }}</td>
                <td>
                    {!! Form::open(['route' => ['clientels.destroy', $clientel->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('clientels.show', [$clientel->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('clientels.edit', [$clientel->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>