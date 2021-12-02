<div class="table-responsive">
  <p>Role List</p>
  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
      <tr>
        <th>Role Name</th>
        <th>Role Group</th>
        <th>Select</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($role as $item)
        <tr>
          <td>{{$item->name}}</td>
          <td>{{$item->group->name}}</td>
          <td style="text-align: center">
            <input name="role_id[]" class="form-check-input" type="checkbox" value="{{$item->id}}" id="{{$item->id}}">
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>