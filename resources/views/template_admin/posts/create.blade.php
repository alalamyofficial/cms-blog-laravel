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



<!-- <div class="container">
    <div class="row"> -->

        <form action="{{route('posts.store')}}" method="POST" style="background-color:#eef2f7; padding:20px" enctype="multipart/form-data">
        
            @csrf
            <div class="form-group">
              <label>Title</label>
              <input type="text" class="form-control"  name="title" required><br><br>
        
                <label>Category</label>
                <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                    
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
                <textarea class="form-control" style="height:300px"  id="textarea" name="content" rows="5"></textarea>
                    <br><br>
        
                <!-- <label>Upload Image</label>
                <input type="file" class="form-control" name="image" required><br><br> -->

                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image" id="inputGroupFile04">
                        <label class="custom-file-label" for="inputGroupFile04">Upload Image</label>
                    </div>
                </div><br><br>

                <button class="btn btn-primary btn-lg">Create</button> 
        
            </div>
          
        
        </form>
            
    <!-- </div>
</div> -->



@endsection