<!-- Movietype Field -->
<div class="form-group col-sm-6">
    {!! Form::label('movieType', 'Movietype:') !!}
    {!! Form::select('movieType', ['RAMBO' => 'RAMBO', 'RIO' => 'RIO'], null, ['class' => 'form-control']) !!}
</div>

<!-- Start Field -->
<div class="form-group col-sm-6">
    {!! Form::label('start', 'Start:') !!}
    {!! Form::text('start', null, ['class' => 'form-control','id'=>'start']) !!}
</div>

@push('scripts')
   <script type="text/javascript">
           $('#start').datetimepicker({
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


<!-- Ends Field -->
<div class="form-group col-sm-6">
    {!! Form::label('Ends', 'Ends:') !!}
    {!! Form::text('Ends', null, ['class' => 'form-control','id'=>'Ends']) !!}
</div>

@push('scripts')
   <script type="text/javascript">
           $('#Ends').datetimepicker({
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
    <a href="{{ route('series.index') }}" class="btn btn-secondary">Cancel</a>
</div>
