@extends('layouts.default')
@section('content')


 <!-- BEGIN: Content-->
 <div class="app-content content">
  <div class="content-overlay"></div>
  <div class="header-navbar-shadow"></div>
  <div class="content-wrapper">
      <div class="content-header row">
          <div class="content-header-left col-md-9 col-12 mb-2">
              <div class="row breadcrumbs-top">
                  <div class="col-12">
                      <h2 class="content-header-title float-left mb-0"> Requisitions</h2>
                      <div class="breadcrumb-wrapper col-12">
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="index.html">Store</a>
                              </li>
                              <li class="breadcrumb-item"><a href="#"> List</a>
                              </li>
                              <li class="breadcrumb-item active">Requisitions View
                              </li>
                          </ol>
                      </div>
                  </div>
              </div>
          </div>
          <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
              <div class="form-group breadcrum-right">
                  <div class="dropdown">
                      <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings"></i></button>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="/store-requisitions">My Requisition Cart</a>
                        <a class="dropdown-item" href="#">Email</a>
                        <a class="dropdown-item" href="#">Calendar</a></div>
                  </div>
              </div>
          </div>
      </div>
      <div class="content-body">
          <!-- Data list view starts -->
          <section id="data-thumb-view" class="data-thumb-view-header">
              <div class="action-btns d-none">
                  <div class="btn-dropdown mr-1 mb-1">
                      <div class="btn-group dropdown actions-dropodown">
                          <button type="button" class="btn btn-white px-1 py-1 dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Actions
                          </button>
                          <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" href="#"><i class="feather icon-trash"></i>Delete</a>
                              <a class="dropdown-item" href="#"><i class="feather icon-archive"></i>Archive</a>
                              <a class="dropdown-item" href="#"><i class="feather icon-file"></i>Print</a>
                              <a class="dropdown-item" href="#"><i class="feather icon-save"></i>Another Action</a>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- dataTable starts -->
              <div class="table-responsive">
                  <table class="table data-thumb-view font-small-2">
                      <thead>
                          <tr>
                              <th></th>
                              <th>NAME</th>
                              <th>QTY REQUESTED</th>
                              <th>COST</th>
                              <th>QUANTITY APPROVED</th>
                              <th>COST OF REQUISITION</th>
                              <th>Requested By</th>
                              <th>Requested On</th>
                              <th>Approved By</th>
                              <th>Status</th>
                              <th></th>
                             
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($requisitions as $key => $item )
                            <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ strtoupper($item->consumable) }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->cost }}</td>
                            <td>{{ $item->quantity_approved }}</td>
                            <td>{{ $item->quantity_approved *  $item->cost}}</td>
                            <td>{{ $item->created_by }}</td>
                            <td>{{ $item->created_at }}</td>
                            <td>{{ $item->approved_by }}</td>
                             
                             <td>
                                    @if($item->status=='Approved')
                                      <div class="chip chip-success">
                                        <div class="chip-body">
                                                <div class="chip-text">{{ $item->status }}</div>
                                        </div>
                                      </div>
                                  @else
                                      <div class="chip chip-danger">
                                          <div class="chip-body">
                                              <div class="chip-text">{{ $item->status }}</div>
                                          </div>
                                      </div>
                                  @endif
                              </td>
                            

                            @if($item->status == 'Approved')

                            @else

                            <td class="product-action">
                        

                              <a href="#update-requisition" class="bootstrap-modal-form-open"  id="edit" name="edit" data-toggle="modal" alt="edit"><i class="feather icon-edit"></i></a>
                              <a href="#" class="bootstrap-modal-form-open" onclick="deleterequest('{{ $item->id }}','{{ $item->consumable }}')"  id="delete" name="delete" data-toggle="modal" alt="edit"><i class="feather icon-trash"></i></a>
                              <a href="#" onclick="approverequisition('{{ $item->id }}','{{ $item->consumable }}','{{ $item->consumable_id }}')"><i class="feather icon-thumbs-up"></i></a>
                           </td>

                            @endif
                          
                          </tr>
                         @endforeach
                         
                      </tbody>
                  </table>
                  <div class="row">
                    <div class="col-sm-12 col-md-5">
                    <div> Record(s) Found : {{ $requisitions->total() }} {{ str_plural('Requisitions', $requisitions->total()) }}</div>
                  </div>
                    <div class="col-sm-12 col-md-7">
                      {!!$requisitions->render()!!}
                    </div>
                      </div>
              </div>
              <!-- dataTable ends -->

              <!-- add new sidebar starts -->
              <div class="add-new-data-sidebar">
                  <div class="overlay-bg"></div>
                  <div class="add-new-data">
                      <div class="div mt-2 px-2 d-flex new-data-title justify-content-between">
                          <div>
                              <h4 class="text-uppercase">Thumb View Data</h4>
                          </div>
                          <div class="hide-data-sidebar">
                              <i class="feather icon-x"></i>
                          </div>
                      </div>
                      <div class="data-items pb-3">
                          <div class="data-fields px-2 mt-3">
                              <div class="row">
                                  <div class="col-sm-12 data-field-col">
                                      <label for="data-name">Name</label>
                                      <input type="text" class="form-control" id="data-name">
                                  </div>
                                  <div class="col-sm-12 data-field-col">
                                      <label for="data-category"> Category </label>
                                      <select class="form-control" id="data-category">
                                          <option>Audio</option>
                                          <option>Computers</option>
                                          <option>Fitness</option>
                                          <option>Appliance</option>
                                      </select>
                                  </div>
                                  <div class="col-sm-12 data-field-col">
                                      <label for="data-status">Order Status</label>
                                      <select class="form-control" id="data-status">
                                          <option>Pending</option>
                                          <option>Canceled</option>
                                          <option>Delivered</option>
                                          <option>On Hold</option>
                                      </select>
                                  </div>
                                  <div class="col-sm-12 data-field-col">
                                      <label for="data-price">Price</label>
                                      <input type="text" class="form-control" id="data-price">
                                  </div>
                                  <div class="col-sm-12 data-field-col data-list-upload">
                                      <form action="#" class="dropzone dropzone-area" id="dataListUpload">
                                          <div class="dz-message">Upload Image</div>
                                      </form>
                                  </div>
                              </div>
                          </div>
                      </div>
                      <div class="add-data-footer d-flex justify-content-around px-3 mt-2">
                          <div class="add-data-btn">
                              <button class="btn btn-primary">Add Data</button>
                          </div>
                          <div class="cancel-data-btn">
                              <button class="btn btn-outline-danger">Cancel</button>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- add new sidebar ends -->
          </section>
          <!-- Data list view end -->

      </div>
  </div>
</div>
<!-- END: Content-->

<div class="sidenav-overlay"></div>
<div class="drag-target"></div>


<div class="modal fade" id="update-requisition" size="00">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Update Requisition</h4>
      </div>
      <div class="modal-body">
        <p></p>
                    <section class="vbox">
                  <header class="header bg-light bg-gradient">
                    <ul class="nav nav-tabs nav-white">
                        <li class="active"><a href="#equitytab" data-toggle="tab">Assignment Details</a></li>
                    </ul>
                  </header>
                  <section class="scrollable">
                    <div class="tab-content">
                      <div class="tab-pane active" id="individual">
                         <form  class="bootstrap-modal-form" data-validate="parsley" method="post" action="/update-requisition" class="panel-body wrapper-lg">
                         @include('stores/update_request')
                      <input type="hidden" name="_token" value="{{ Session::token() }}">
                    </form>
                      </div>
                    </div>
                  </section>
                </section>
      
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
</div>


@stop

<script type="text/javascript">
  function deleterequest(id,name)
  {

      //alert(id);

      swal({   
        title: "Are you sure?",   
        text: "Do you want to delete "+name+" ?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, delete it!",   
        cancelButtonText: "No, cancel !",   
        closeOnConfirm: false,   
        closeOnCancel: false }, 
        function(isConfirm){   
          if (isConfirm) 
          { 
          $.get('/delete-requisition',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Deleted!", name +" was successfully deleted from store.", "success"); 
              location.reload(true);
             }
            else
            { 
              swal("Cancelled", name +" failed to delete.", "error");
              
            }
           
        });
                                          
          },'json');    
           
             } 
        else {     
          swal("Cancelled", name +" failed to delete.", "error");   
        } });

  }



  function approverequisition(id,name,consumable_id)
   {
    swal({
  title: "Are you sure?",
  text: "Please enter quantity to approve for "+ name,
  type: "input",
  showCancelButton: true,
  closeOnConfirm: false,
  animation: "slide-from-top",
  inputPlaceholder: "Write something"
},
function(inputValue){
  if (inputValue === false) return false;

  if (inputValue === "") {
    swal.showInputError("You need to write something!");
    return false
  }

alert(consumable_id);

  $.get('/approve-requisition',
          {
             "ID": id,
             "approved_quantity" : inputValue,
             "consumable_id" : consumable_id
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Success!", name +" was removed from list.", "success"); 
               location.reload(true);
             }
            else
            { 
              swal("Cancelled","Failed to be removed from list.", "error");
              
            }
            });
                                          
          },'json');  

    


});


   }

</script>





