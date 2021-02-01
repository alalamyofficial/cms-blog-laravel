@extends('template_admin.home')
@section('sub-title','Edit Tags')
    
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


<form action="{{route('tags.update' , $tag->id) }}" method="POST">

    @csrf
    @method('patch')
    <div class="form-group">
      <label>Update Tag</label>
    <input type="text" class="form-control" style="width: 400px" name="name" value="{{$tag->name}}" required><br>
      <button class="btn btn-success">Update</button>
  
    </div>
</form>
    

@endsection