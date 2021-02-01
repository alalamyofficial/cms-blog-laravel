@extends('template_admin.home')
@section('sub-title','Categories')
    
@section('content')

{{-- <h1>Categories</h1> --}}


<a type="button" href="{{route('categories.create')}}" class="btn btn-info">Add Category</a><br><br>

    <table class="table table-striped table-hover table-bordered">
        <thead>
          <tr>
              <th scope="col">Num</th>
              <th scope="col">Name</th>
              <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            
                @if ($category->count() == 0 )
            
                    <p>You have no Categories</p>
                    
                @else
                <tr>
                    <td>{{$category->id }}</td>
                    <td>{{$category->name}}</td>
                    <td class="d-flex">

                        <form action="{{route('categories.destroy' , $category->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            
                            <a  href="{{url('categories/'.$category->id.'/edit' )}}" class="btn btn-primary btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>

                    </td>
                </tr>
            @endif
            @endforeach
        </tbody>
      </table>

      {!! $categories->links() !!}
    

@endsection