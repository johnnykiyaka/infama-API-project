<!-- Movie Field -->
<div class="form-group col-sm-6">
    {!! Form::label('movie', 'Movie:') !!}
    {!! Form::select('movie', ['RAMBO' => 'RAMBO', 'RIO' => 'RIO'], null, ['class' => 'form-control']) !!}
</div>

<!-- Moviestart Field -->
<div class="form-group col-sm-6">
    {!! Form::label('moviestart', 'Moviestart:') !!}
    {!! Form::text('moviestart', null, ['class' => 'form-control','id'=>'moviestart']) !!}
</div>

@push('scripts')
   <script type="text/javascript">
           $('#moviestart').datetimepicker({
               format: 'YYYY-MM-DD HH:mm:ss',
               useCurrent: true,
               icons: {
                   up: "icon-arrow-up-circle icons font-2xl",
                   down: "icon-arrow-down-circle icons font-2xl"
               },
               sideBySide: true
           })
       </script>
@endpush


<!-- Movieends Field -->
<div class="form-group col-sm-6">
    {!! Form::label('movieEnds', 'Movieends:') !!}
    {!! Form::text('movieEnds', null, ['class' => 'form-control','id'=>'movieEnds']) !!}
</div>

@push('scripts')
   <script type="text/javascript">
           $('#movieEnds').datetimepicker({
               format: 'YYYY-MM-DD HH:mm:ss',
               useCurrent: true,
               icons: {
                   up: "icon-arrow-up-circle icons font-2xl",
                   down: "icon-arrow-down-circle icons font-2xl"
               },
               sideBySide: true
           })
       </script>
@endpush


<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('movies.index') }}" class="btn btn-secondary">Cancel</a>
</div>
