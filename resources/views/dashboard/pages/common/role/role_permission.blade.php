<div class="table-responsive">
  <p>Permission List</p>
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th>Permission Name</th>
        <th>Permission Route</th>
        <th>Route Type</th>
        <th>Select</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($permission as $item)
        <tr>
          <td>{{$item->name}}</td>
          <td>{{$item->route}}</td>
          <td>{{$item->route_type}}</td>
          <td style="text-align: center">
            <input name="permission_id[]" class="form-check-input" type="checkbox" value="{{$item->id}}" id="{{$item->id}}" {{in_array($item->id, $permission_id) ? 'checked' : ''}}>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>