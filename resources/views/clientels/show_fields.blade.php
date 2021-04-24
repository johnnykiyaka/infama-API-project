<!-- Movietype Field -->
<div class="form-group">
    {!! Form::label('movieType', 'Movietype:') !!}
    <p>{{ $clientel->movieType }}</p>
</div>

<!-- Start Field -->
<div class="form-group">
    {!! Form::label('start', 'Start:') !!}
    <p>{{ $clientel->start }}</p>
</div>

<!-- Ends Field -->
<div class="form-group">
    {!! Form::label('Ends', 'Ends:') !!}
    <p>{{ $clientel->Ends }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $clientel->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $clientel->updated_at }}</p>
</div>

