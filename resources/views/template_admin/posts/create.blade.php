@extends('template_admin.home')
@section('sub-title','Create Posts')
    
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

<div class="container">
    <div class="row justify-content-center">

        <form action="{{route('posts.store')}}" method="POST" style="background-color:white; padding:20px" enctype="multipart/form-data">
        
            @csrf
            <div class="form-group">
              <label>Title</label>
              <input type="text" class="form-control" style="width: 400px" name="title" required style="width: 400px"><br><br>
        
                <label>Category</label>
                <select class="form-control" id="exampleFormControlSelect1" name="category_id" style="width: 400px">
                    
                    <option value="" holder>Choose Category</option><br>
                    @foreach ($categories as $category)

                        <option value="{{$category->id}}">{{$category->name}}</option>

                    @endforeach

                </select><br><br>
 
                  <div class="form-group">
                    <label>Select Tags</label><br>
                    <select class="form-control" id="exampleFormControlSelect1" style="height: 100px" name="tags[]" multiple>
                        @foreach ($tags as $tag)
                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                        @endforeach
                    </select>
                  </div><br><br>        
                  
        
                <label>Content</label>
                <textarea class="form-control" style="height: 100px"  id="exampleFormControlTextarea1" name="content" rows="5" style="width: 400px"></textarea>
                    <br><br>
        
                <label>Upload Image</label>
                <input type="file" class="form-control" style="width: 400px" name="image" required><br><br>

                <button class="btn btn-primary btn-lg">Create</button> 
        
            </div>
          
        
        </form>
            
    </div>
</div>



@endsection