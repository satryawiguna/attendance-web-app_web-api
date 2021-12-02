<div class="form-group">
  <label class="control-label">State</label>
  <select name="state_id" id="state_create" class="form-control">
    <option value="" selected hidden disabled>Choose State!</option>
    @foreach ($state as $item)
      <option value="{{$item->id}}">{{$item->state_name}}</option>
    @endforeach
  </select>
</div>

<script>
  $('#state_create').on('change', function () {
    $.ajax({
      type: 'post',
      data: {
        _token: '{{ csrf_token() }}',
        state_id: $('#state_create').val(),
        from: 'create'
      },
      url: '{{route("master-work-area-get-city")}}',
      success: function (data) {
        $("#city_ajax").html(data)
        $('#city_default').css('display', 'none');
      }
    })
  })
</script>