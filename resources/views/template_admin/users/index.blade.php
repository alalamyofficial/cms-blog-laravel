@extends('template_admin.home')
@section('sub-title','Users')
    
@section('content')



<a type="button" href="{{route('user.create')}}" class="btn btn-info">Add User</a><br><br>

    <table class="table table-striped table-hover table-bordered">
        <thead>
          <tr>
              <th scope="col">Num</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Type</th>
              <th scope="col">Created At</th>
              <th scope="col">Status</th>
              <th scope="col">Last Seen</th>
              <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            
                @if ($user->count() == 0 )
            
                    <p>You have no users</p>
                    
                @else
                <tr>
                    <td>{{$user->id }}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                    
                        @if($user->type)

                        <span class="badge badge-info">Administrator</span>

                        @else

                        <span class="badge badge-dark">Author</span>

                        @endif

                    </td>
                    <td>{{$user->created_at->diffForHumans()}}</td>

                    <td>
                    
                        @if(Cache::has('user-is-online-' . $user->id))
                            <span class="text-success">Online</span>
                        @else
                            <span class="text-secondary">Offline</span>
                        @endif

                    </td>
                    <td>
                    
                         {{ \Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}
                    
                    </td>

                    <td class="d-flex justify-content-around ">

                        <form action="{{route('user.destroy' , $user->id) }}" method="POST">
                            @csrf
                            @method('delete')
                            
                            <a  href="{{url('user/'.$user->id.'/edit' )}}" class="btn btn-primary btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </form>

                    </td>
                </tr>
            @endif
            @endforeach
        </tbody>
      </table>

      {!! $users->links() !!}
    

@endsection