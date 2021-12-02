<div class="form-group">
  <label class="control-label">City</label>
  <select name="city_id" class="form-control">
    <option value="" selected hidden disabled>Choose City!</option>
    @foreach ($city as $item)
      <option value="{{$item->id}}">{{$item->city_name}}</option>
    @endforeach
  </select>
</div>