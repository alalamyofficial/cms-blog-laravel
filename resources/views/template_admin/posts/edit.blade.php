@extends('template_admin.home')
@section('sub-title','Edit Posts')
    
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


<form action="{{route('posts.update' , $post->id )}}" method="POST" style="background-color:white; padding:20px" enctype="multipart/form-data">
        
    @csrf
    @method('PATCH')
    <div class="form-group">
      <label>Title</label>
        <input type="text" class="form-control" value="{{$post->title}}" style="width: 400px" name="title" required style="width: 400px"><br><br>

        <label>Category</label>
        <select class="form-control" id="exampleFormControlSelect1" name="category_id" style="width: 400px">
            
            <option value="" holder>Choose Category</option><br>
            @foreach ($categories as $category)

                <option value="{{$category->id}}"
                    
                    @if ($category->id == $post->category_id)

                        selected
                        
                    @endif

                    >{{$category->name}}</option>

            @endforeach

          </select><br><br>

          <div class="form-group">
            <label>Select Tags</label><br>
            <select class="form-control" id="exampleFormControlSelect1" style="height: 100px" name="tags[]"  multiple>
                @foreach ($tags as $tag)
                    <option value="{{$tag->id}}"
                        
                        @foreach ($post->tags as $item)
    
                            @if ($tag->id == $item->id)
    
                                selected
                                
                            @endif
                            
                        @endforeach
                        >{{$tag->name}}</option>
                @endforeach
            </select>
          </div><br><br>        
          

        <label>Content</label>
        <textarea class="form-control" value="{{$post->content}}" style="height: 300px"  id="textarea" name="content" rows="5" style="width: 400px">{{$post->content}}</textarea>
            <br><br>

        <label>Upload Image</label>
        <input type="file" class="form-control" src="{{$post->image}}" style="width: 400px" name="image"><br><br>

        <button class="btn btn-success btn-lg">Update</button> 

    </div>
  

</form>


@endsection