@extends('template_admin.home')
@section('sub-title','Create Categories')
    
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (Session::has('success'))

    <div class="alert alert-success">

        
        {{alert(Session('success'))}}

    </div>
        
@endif


<form action="{{route('categories.store')}}" method="POST">

    @csrf
    <div class="form-group">
      <label>Create Category</label>
      <input type="text" class="form-control" style="width: 400px" name="name" required><br>
      <button class="btn btn-primary">Create</button>
  
    </div>
</form>
    

@endsection