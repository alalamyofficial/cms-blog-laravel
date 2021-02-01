@extends('template_admin.home')
@section('sub-title','Edit Categories')
    
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


<form action="{{route('categories.update' , $category->id) }}" method="POST">

    @csrf
    @method('patch')
    <div class="form-group">
      <label>Update Category</label>
    <input type="text" class="form-control" style="width: 400px" name="name" value="{{$category->name}}" required><br>
      <button class="btn btn-success">Update</button>
  
    </div>
</form>
    

@endsection