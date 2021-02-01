@extends('template_admin.home')
@section('sub-title','Edit User')
    
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


<form action="{{route('user.update' , $user->id) }}" method="POST">

    @csrf
    @method('patch')
    <div class="form-group">

      <label>Username or Name</label>
        <input type="text" class="form-control" style="width: 400px" name="name" value="{{$user->name}}" required><br><br>

      <label>Email</label>
        <input type="email" class="form-control" style="width: 400px" name="email" value="{{$user->email}}" required><br><br>

      <label>User Type</label>
        <select class="form-control" id="exampleFormControlSelect1" name="type" style="width: 400px">
            
            
            <option value="" holder>Choose Type</option><br>

                <option value="1" 
                
                    @if($user->type == 1)
                        selected
                    @endif
                 >Administrator</option>
                <option value="0"
                
                    @if($user->type == 0)

                        selected
                    @endif

                >Author</option>


        </select><br><br>

      <label>Password</label>
        <input type="password" class="form-control" style="width: 400px" name="password" ><br><br>

      <button class="btn btn-success">Update</button>
  
    </div>
</form>
    

@endsection