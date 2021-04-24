<!-- Movietype Field -->
<div class="form-group">
    {!! Form::label('movieType', 'Movietype:') !!}
    <p>{{ $series->movieType }}</p>
</div>

<!-- Start Field -->
<div class="form-group">
    {!! Form::label('start', 'Start:') !!}
    <p>{{ $series->start }}</p>
</div>

<!-- Ends Field -->
<div class="form-group">
    {!! Form::label('Ends', 'Ends:') !!}
    <p>{{ $series->Ends }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $series->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $series->updated_at }}</p>
</div>

