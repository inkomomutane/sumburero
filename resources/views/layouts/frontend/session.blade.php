@if (session('success'))
<div class="alert alert-success alert-dismissible show fade">
        <strong>{{ session('success') }}</strong>
</div>
@endif
@if (session('error'))
<div class="alert alert-danger alert-dismissible show fade">
        <strong>{{ session('error') }}</strong>
  
</div>
@endif
@if (session('errors'))

<div class="alert alert-danger alert-dismissible show fade">
       <ul>
        @foreach ($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach
       </ul>
</div>
@endif