<option>--- Select ubicacion---</option>
@if(!empty($ubicaciones))
  @foreach($ubicaciones as $key => $value)
    <option value="{{ $key }}">{{ $value }}</option>
  @endforeach
@endif