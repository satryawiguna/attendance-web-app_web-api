<div class="form-group">
  <label class="control-label">Country</label>
  <select name="country_id" id="country_id" class="form-control">
    <option value="{{$country->id}}">{{$country->country_name}}</option>
  </select>
</div>

<div class="form-group" id="state_update_ajax">
  <label class="control-label">State</label>
  <select name="state_id" id="state_id" class="form-control">
    <option value="{{$state->id}}">{{$state->state_name}}</option>
  </select>
</div>

<div class="form-group" id="city_update_ajax">
  <label class="control-label">City</label>
  <select name="city_id" id="city_id" class="form-control">
    <option value="{{$city->id}}">{{$city->city_name}}</option>
  </select>
</div>

<script>
  $(function() {
    var state_selected = '{{$state->id}}'
    var city_selected = '{{$city->id}}'

    $.ajax({
      type: 'post',
      data: {
        _token: '{{ csrf_token() }}',
        country_id: $('#country_id').val(),
        from: 'update',
      },
      url: '{{route("master-work-area-get-state")}}',
      success: function (data) {
        $("#state_id").empty()
        for (let index = 0; index < data.length; index++) {
          var id = data[index]['id']
          var name = data[index]['state_name']
          var selected = state_selected == id ? 'selected' : ''

          $("#state_id").append("<option "+selected+" value='"+id+"'>"+name+"</option>")
        }
      }
    })

    $.ajax({
      type: 'post',
      data: {
        _token: '{{ csrf_token() }}',
        state_id: $('#state_id').val(),
        from: 'update',
      },
      url: '{{route("master-work-area-get-city")}}',
      success: function (data) {
        $("#city_id").empty()
        for (let index = 0; index < data.length; index++) {
          var id = data[index]['id']
          var name = data[index]['city_name']
          var selected = city_selected == id ? 'selected' : ''

          $("#city_id").append("<option "+selected+" value='"+id+"'>"+name+"</option>")
        }
      }
    })
  })

  $('#country_id').on('change', function () {
    var state_selected = '{{$state->id}}'
    $.ajax({
      type: 'post',
      data: {
        _token: '{{ csrf_token() }}',
        country_id: $('#country_id').val(),
        from: 'update',
      },
      url: '{{route("master-work-area-get-state")}}',
      success: function (data) {
        $("#state_id").empty()
        for (let index = 0; index < data.length; index++) {
          var id = data[index]['id']
          var name = data[index]['state_name']
          var selected = state_selected == id ? 'selected' : ''

          $("#state_id").append("<option "+selected+" value='"+id+"'>"+name+"</option>")
        }
      }
    })
  })

  $('#state_id').on('change', function () {
    var city_selected = '{{$city->id}}'
    $.ajax({
      type: 'post',
      data: {
        _token: '{{ csrf_token() }}',
        state_id: $('#state_id').val(),
        from: 'update',
      },
      url: '{{route("master-work-area-get-city")}}',
      success: function (data) {
        $("#city_id").empty()
        for (let index = 0; index < data.length; index++) {
          var id = data[index]['id']
          var name = data[index]['city_name']
          var selected = city_selected == id ? 'selected' : ''

          $("#city_id").append("<option "+selected+" value='"+id+"'>"+name+"</option>")
        }
      }
    })
  })
</script>