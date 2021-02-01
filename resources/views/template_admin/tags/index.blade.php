@extends('template_admin.home')
@section('sub-title','Tags')
    
@section('content')

{{-- <h1>Categories</h1> --}}


<a type="button" href="{{route('tags.create')}}" class="btn btn-info">Add Tag</a><br><br>

    <table class="table table-striped table-hover table-bordered">
        <thead>
          <tr>
              <th scope="col">Num</th>
              <th scope="col">Name</th>
              <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tags as $tag)
            
                @if ($tag->count() == 0 )
            
                    <p>You have no Categories</p>
                    
                @else
                <tr>
                    <td>{{$tag->id }}</td>
                    <!-- <td>{{$tag->name}}</td> -->
                    <td>
                        <h5><span class="badge badge-info">{{$tag->name}}</span></h5>
                    </td>
                    <td class="d-flex">

                        <form action="{{route('tags.destroy' , $tag->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            
                            <a  href="{{url('tags/'.$tag->id.'/edit' )}}" class="btn btn-primary btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>

                    </td>
                </tr>
            @endif
            @endforeach
        </tbody>
      </table>

      {!! $tags->links() !!}
    

@endsection