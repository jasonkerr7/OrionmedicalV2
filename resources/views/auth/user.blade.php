@extends('layouts.default')
@section('content')
         <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
          <div class="content-header row">
          </div>
          <div class="content-body">
              <!-- users edit start -->
              <section class="users-edit">
                  <div class="card">
                      <div class="card-content">
                          <div class="card-body">
                              <ul class="nav nav-tabs mb-3" role="tablist">
                                  <li class="nav-item">
                                      <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                          <i class="feather icon-user-check mr-25"></i><span class="d-none d-sm-block">Users</span>
                                      </a>
                                  </li>
                                 
                                 
                                  
                                  <form action="/find-user" method="GET">
                                    <div class="col-12">
                                    
                                              <input type="text" class="form-control" id="search" name="search" placeholder="search...">
                                        
                                  </div>
                                  </form>
                                  <a href="/signup"> <button class="btn btn-primary mb-2"><i class="feather icon-plus"></i>&nbsp; Add New User</button></a>
                              </ul>

                             
                              <div class="tab-content">
                                  <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                      <!-- users edit media object start -->
                                      <div class="row" id="table-hover-animation">
                                        <div class="col-12">
                                            <div class="card">
                                             
                                                <div class="card-content">
                                                    <div class="card-body">
                                                       
                                                        <div class="table-responsive">
                                                            <table id="investigationsTable" class="table table-hover mb-0 font-small-3">
                                                                <thead>
                                                                    <tr>
                                                                      <th scope="col">User</th>
                                                                      <th scope="col">Email</th>
                                                                      <th scope="col">Department</th>
                                                                      <th scope="col">Role</th>
                                                                      <th scope="col">Date</th>
                                                                      <th scope="col"></th>
                                                                      <th scope="col"></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                  @foreach($users as $user)
                                                                  <tr>
                                                                    <td>{{ $user->fullname }}</td>
                                                                    <td>{{ $user->email }}</td>
                                                                    <td>{{ $user->location }}</td>
                                                                    <td>{{ $user->usertype }}</td>
                                                                    <td>{{ $user->created_at }}</td>
                                                                    <td><a href="/edit-user/{{ $user->id }}" data-toggle="modal" alt="edit"><i class="fa fa-pencil"></i></a></td>
                                                                    <td><a href="#" onclick="deleteUser('{{ $user->id }}','{{ $user->fullname }}')" ><i class="fa fa-trash"></i></a></td>
                                                                    </tr>
                                                                 @endforeach
                                                                </tbody>
                                                            </table>
                                                           
                                                        </div>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-sm-12 col-md-5">
                                      <div> Record(s) Found : {{ $users->total() }} {{ str_plural('User', $users->total()) }}</div>
                                    </div>
                                      <div class="col-sm-12 col-md-7">
                                        {!!$users->render()!!}
                                      </div>
                                        </div>
                                      <!-- users edit media object ends -->
                                      <!-- users edit account form start -->
                                      
                                  </div>
                                  <div class="tab-pane" id="information" aria-labelledby="information-tab" role="tabpanel">
                                      <!-- users edit Info form start -->
                                     
                                      <!-- users edit Info form ends -->
                                  </div>
                                  <div class="tab-pane" id="social" aria-labelledby="social-tab" role="tabpanel">
                                      <!-- users edit socail form start -->
                                     
                                      <!-- users edit socail form ends -->
                                  </div>
                              </div>
                          </div>
                      </div>
                  </div>
              </section>
              <!-- users edit ends -->

          </div>
      </div>
  </div>
  <!-- END: Content-->

  <div class="sidenav-overlay"></div>
  <div class="drag-target"></div>
@stop

<script src="{{ asset('/event_components/jquery.min.js')}}"></script>
<script>

 function deleteUser(id,name)
   {

    Swal.fire({
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, delete it!',
      confirmButtonClass: 'btn btn-primary',
      cancelButtonClass: 'btn btn-danger ml-1',
      buttonsStyling: false,
        }).then(function (result) {
      if (result.value) 
      {
        $.get('/delete-user',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
               
                    Swal.fire(
                      {
                        type: "success",
                        title: 'Deleted!',
                        text: 'Your file has been deleted.',
                        confirmButtonClass: 'btn btn-success',
                      }
                    )
              location.reload(true);
             }
            else
            { 
              Swal.fire("Cancelled", "Operation failed", "error");
              
            }
           
        });
                                          
          },'json'); 
       
      }
      else {     
          Swal.fire("Cancelled", "Operation failed", "error");   
        }
    });

   }


</script>
