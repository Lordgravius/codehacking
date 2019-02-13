@if(count($errors))
  <div class="panel panel-danger">
    <div class="panel-heading">
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  </div>
@endif