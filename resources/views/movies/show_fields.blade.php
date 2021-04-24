<!-- Movie Field -->
<div class="form-group">
    {!! Form::label('movie', 'Movie:') !!}
    <p>{{ $movies->movie }}</p>
</div>

<!-- Moviestart Field -->
<div class="form-group">
    {!! Form::label('moviestart', 'Moviestart:') !!}
    <p>{{ $movies->moviestart }}</p>
</div>

<!-- Movieends Field -->
<div class="form-group">
    {!! Form::label('movieEnds', 'Movieends:') !!}
    <p>{{ $movies->movieEnds }}</p>
</div>

<!-- Created At Field -->
<div class="form-group">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $movies->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $movies->updated_at }}</p>
</div>

