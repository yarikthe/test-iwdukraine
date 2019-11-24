@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card text-center">
                <div class="card-header">Page SUPER Admin</div>
                <a href="/home" class="m-1 btn btn-outline-info btn-lg"><- back</a>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <br> <h3>Page access to you <strong>{{ Auth::user()->name }}</strong></h3>
                    <hr>
                    @can('admin-only')
                         <a href="/about" class="btn btn-danger btn-lg">Page About</a>
                   
                         <a href="/blog" class="btn btn-warning btn-lg">Page Blog</a>
                    
                         <a href="/page" class="btn btn-success btn-lg">Page Page</a>
                    @endcan
                </div>
                <hr>
                <div class='col-md-12'>
                    <h4 class="m-2">List of User</h4> 
                    <hr>
                    <div class="col-md-6 text-center p-2">                     
                        <p>
                            add permission - access to some page
                        </p><br>
                        <button type="button" class="m-2 btn btn-success" data-toggle="modal" data-target="#exampleModalAdd">
                          ADD Permission
                        </button>
                    </div>
                                    <table class="table">
                                      <thead>
                                        <tr>
                                          <th scope="col">#</th>
                                          <th scope="col">ID</th>
                                          <th scope="col">Name</th>
                                          <th scope="col">Role</th>
                                          <th scope="col">Premission</th>
                                          <th scope="col">Action</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        @foreach($users as $key => $user)
                                        <tr>
                                          <th scope="row">{{ $key + 1}}</th>
                                          <td>{{ $user->id }}</td>
                                          <td>{{ $user->name }}</td>
                                          <td>
                                            @foreach($user->roles as $role)
                                            
                                                {{ $role->name }} 

                                            @endforeach
                                          </td>
                                          <td>
                                            @foreach($user->perm as $per)
                                                        
                                                - [{{ $per->id }}] {{ $per->name }}  <br> 
                                                                                   
                                            @endforeach                                            
                                          </td>
                                          <td>
                                              
                                                @foreach($permUser as $pUser)
                                                @foreach($user->perm as $per)

                                                    @if($pUser->user_id == $user->id and 
                                                        $per->id == $pUser->perm_id  
                                                        )
                                                          
                                                        <a href="{{ route('perm.del', $pUser->id) }}" class="btn btn-outline-danger">delete 
                                                            permission ID:{{$pUser->id}} - {{ $per->name }}</a>

                                                    @endif
                                                @endforeach  
                                                @endforeach
                                          </td>
                                        </tr> 
                                        @endforeach                                       
                                      </tbody>
                                    </table>

                                        <hr>
                                       
                                        &copy 2019 <a href="http://lukyanchuk.kl.com.ua">Lukyanchuk</a>

                </div>
                
            </div>
        </div>
    </div>
</div>


<!-- Modal ADD Permission-->
<div class="modal fade" id="exampleModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Permission ADD</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="/add_permission" enctype="multipart/form-data">
                          @csrf
                        
                          <div class="form-group"><label>User</label>
                            
                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="user_id" required>
                                          <option value="0" disabled="true" selected="true">- Choose user -</option>
                                          @foreach($users as $key => $value)
                                            
                                                <option value="{{ $value->id }}">{{ $value->name }} </option>
                             
                                          @endforeach
                                    </select>

                          </div>
                          <div class="form-group"><label>Permission</label>

                                    <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="perm_id" required>
                                          <option value="0" disabled="true" selected="true">- Choose premission -</option>
                                            @foreach($perm as $key => $value)
                                              
                                              <option value="{{ $value->id }}">{{ $value->name }} </option>                                       
                                              
                                            @endforeach
                                    </select>

                          </div>

                          <button type="submit" class="btn btn-success">Add</button>
            </form>
      </div>
      <div class="modal-footer">
        <p>superadmin</p>
      </div>
    </div>
  </div>
</div>
@endsection
