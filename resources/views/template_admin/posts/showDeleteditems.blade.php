@extends('template_admin.home')
@section('sub-title','Trashed Posts')
    
@section('content')


<a type="button" href="{{route('posts.create')}}" class="btn btn-info">Add Post</a><br><br>

    <table class="table table-striped table-hover table-bordered">
        <thead>
          <tr>
              <th scope="col">Num</th>
              <th scope="col">Name</th>
              <th scope="col">Categories</th>
              <th scope="col">Tags</th>
              <th scope="col">Images</th>
              <th scope="col">Content</th>
              <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($deletedPosts as $post)
            
                @if ($deletedPosts->count() === 0 )
            
                    <p>You have no Trashed Posts</p>
                    
                @else
                <tr>
                    <td>{{$post->id }}</td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->category->name}}</td>
                    <td>

                        @foreach ($post->tags as $tag)
                            <strong>{{$tag->name}}<br/></strong>
                        @endforeach

                    </td>
                <td><img src="{{asset($post->image)}}" alt="{{$post->title}}" class="img-thumbnail" width="100px" height="120px"></td>
                
                <td>{{$post->content}}</td>
                
                <td class="d-flex">

                        <form action="{{route('forceDelete' , $post->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            
                            <a  href="{{route('restore', $post->id)}}" class="btn btn-warning btn-sm">Restore</a>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>

                    </td>
                </tr>
            @endif
            @endforeach
        </tbody>
      </table>

      {!! $deletedPosts->links() !!}
    

@endsection