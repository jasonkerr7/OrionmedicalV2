@extends('layouts.default')
@section('content')
<section id="content">
         <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="header-navbar-shadow"></div>
      <div class="content-wrapper">
          <div class="content-header row">
          </div>
          <div class="content-body">
              <!-- users edit start -->

{{-- @extends('layouts.default')
@section('content')
        <section id="content">
          <section class="hbox stretch">
          <aside class="aside-md bg-white b-r" id="subNav">
              <div class="wrapper b-b header">Tariff Manager</div>
              <ul class="nav">
               @role('System Admin','Medical Records Manager')
               <li class="b-b b-light"><a href="/service-charges"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i> Service Charges</a></li>
                <li class="b-b b-light"><a href="/insurance-company"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i> Health Insurance</a></li>

                <li class="b-b b-light"><a href="/insurance-packages"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i> Health Packages / Plans </a></li>


                 <li class="b-b b-light"><a href="/registered-companies"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i> Corporate Clients </a></li>
                <li class="b-b b-light"><a href=""><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Visit Types</a></li>
                <li class="b-b b-light"><a href="/complaints"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Complaint Types </a></li>
                <li class="b-b b-light"><a href="#"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i> Patient History</a></li>
                <li class="b-b b-light"><a href="/departments"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Departments</a></li>
               @endrole
              </ul>
            </aside>
            <aside> --}}

              <section class="users-edit">
                  <div class="card">
                      <div class="card-content">
                          <div class="card-body">
                              <ul class="nav nav-tabs mb-3" role="tablist">
                                  <li class="nav-item">
                                      <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                          <i class="feather icon-user mr-25"></i><span class="d-none d-sm-block">Service Charges</span>
                                      </a>
                                  </li>
                                 
                                  <li class="nav-item">
                                      <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab" href="#information" aria-controls="information" role="tab" aria-selected="false">
                                          <i class="feather icon-share-2 mr-25"></i><span class="d-none d-sm-block">Health Insurance</span>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center" id="social-tab" data-toggle="tab" href="#social" aria-controls="social" role="tab" aria-selected="false">
                                        <i class="feather icon-share-2 mr-25"></i><span class="d-none d-sm-block">Corporate Clients</span>
                                    </a>
                                </li>

                                  <li class="nav-item">
                                    <a class="nav-link d-flex align-items-center" id="social-tab" data-toggle="tab" href="#social" aria-controls="social" role="tab" aria-selected="false">
                                        <i class="feather icon-share-2 mr-25"></i><span class="d-none d-sm-block">Health Packages</span>
                                    </a>
                                </li>
                                
                              <li class="nav-item">
                                <a class="nav-link d-flex align-items-center" id="social-tab" data-toggle="tab" href="#social" aria-controls="social" role="tab" aria-selected="false">
                                    <i class="feather icon-share-2 mr-25"></i><span class="d-none d-sm-block">Visit Types</span>
                                </a>
                            </li>

                                  
                                  <form action="/search-service" method="GET">
                                    <div class="col-12">
                                    
                                              <input type="text" class="form-control" id="search" name="search" placeholder="search...">
                                        
                                  </div>
                                  </form>
                              </ul>

                             
                              <div class="tab-content">
                                  <div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">
                                 @role(['System Admin','Billing','Ophthalmologist'])
                                 
                                 <a href="#new-service" class="bootstrap-modal-form-open btn btn-primary mb-2" data-toggle="modal"><span> Add New Charge Item </span></a>
                                 @endrole
                                      <!-- users edit media object start -->
                                      <div class="row" id="table-hover-animation">
                                        <div class="col-12">
                                            <div class="card">
                                             
                                                <div class="card-content">
                                                    <div class="card-body">
                                                       
                                                        <div class="table-responsive">
                                                            
                                                              <table class="table table-hover mb-0 font-small-2">
                                                                <thead>
                                                                <tr>
                                                                  <th>#</th>
                                                                  <th>Cost Center</th>
                                                                  <th>Name </th>
                                                                  <th>Walk-in charge</th>
                                                                  <th>Corporate Charge</th>
                                                                  <th>Insurance Charge</th>
                                                                  <th>Glico</th>
                                                                  <th>Cosmopolitan</th>
                                                                  <th>Premier</th>
                                                                  <th>Status</th>
                                                                  <th>Added On</th>
                                                                  <th width="20"></th>
                                                                  <th width="20"></th>
                                                                </tr>
                                                              </thead>
                                                              <tbody>
                                                                @foreach( $items as $key => $item )
                                                                <tr>
                                                                  <td>{{ $item->serial }}</td>
                                                                  <td>{{ $item->department }}</td>
                                                                  <td>{{ $item->type }}</td>
                                                                  <td>{{ $item->walkin }}</td>
                                                                  <td>{{ $item->corporate }}</td>
                                                                  <td>{{ $item->insurance }}</td>
                                                                  <td>{{ $item->glico }}</td>
                                                                  <td>{{ $item->cosmopolitan }}</td>
                                                                  <td>{{ $item->premier }}</td>
                                                                  <td>{{ $item->status }}</td>
                                                                  <td>{{ $item->created_on }}</td>
                                                                   @role('System Admin','Laboratory','Ophthalmologist')
                                                                  <td>
                                                                    <a href="#edit-service" class="bootstrap-modal-form-open" onclick="editService('{{ $item->id }}')"  id="edit" name="edit" data-toggle="modal" alt="edit"><i class="fa fa-pencil" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a>
                                                                  </td>
                                                                  <td>
                                                                    <a href="#" class="bootstrap-modal-form-open" onclick="deleteDetails('{{ $item->id }}','{{ $item->name }}')"  id="edit" name="edit" data-toggle="modal" alt="edit"><i class="fa fa-trash"></i></a>
                                                                  </td>
                                                                   @endrole                            
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
                                      <div> Record(s) Found : {{ $items->total() }} {{ str_plural('Item', $items->total()) }}</div>
                                    </div>
                                      <div class="col-sm-12 col-md-7">
                                        {!!$items->render()!!}
                                      </div>
                                        </div>
                                      <!-- users edit media object ends -->
                                      <!-- users edit account form start -->
                                      
                                  </div>
                                  <div class="tab-pane" id="information" aria-labelledby="information-tab" role="tabpanel">
                                      <!-- users edit Info form start -->
                                          @role(['System Admin']) 
                                          <a href="#new-insurer" class="bootstrap-modal-form-open btn btn-primary mb-2" data-toggle="modal"><span> Add New Insurer </span></a>
                                          @endrole
                                                <!-- users edit media object start -->
                                                <div class="row" id="table-hover-animation">
                                                  <div class="col-12">
                                                      <div class="card">
                                                      
                                                          <div class="card-content">
                                                              <div class="card-body">
                                                                
                                                                  <div class="table-responsive">
                                                                      
                                                                        <table class="table table-hover mb-0 font-small-2">
                                                                          <thead>
                                                                          <tr>
                                                                            <th>#</th>
                                                                            <th>Name </th>
                                                                            <th>Address & Contact</th>
                                                                            <th>Contact Person </th>
                                                                            <th>Added On</th>
                                                                            <th width="30"></th>
                                                                          </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                          @foreach( $insurance_companies as $key => $insurance )
                                                                              <tr>
                                                                              <td>{{ $insurance->id }}</td>
                                                                              <td>{{ $insurance->name }}</td>
                                                                              <td>{{ $insurance->address }}</td>
                                                                              <td>{{ $insurance->contactperson }}</td>
                                                                              <td>{{ $insurance->created_on }}</td>
                                                                              <td><a href="#" class="bootstrap-modal-form-open" onclick="deleteInsuranceDetails('{{ $insurance->id }}','{{ $insurance->name }}')"  id="edit" name="edit" data-toggle="modal" alt="edit"><i class="fa fa-trash"></i></a>
                                                                              </td></tr>
                                                                          @endforeach 
                                                                        </tbody> 
                                                                      </table>
                                                                    
                                                                  </div>
                                                                  
                                                              </div>
                                                          </div>
                                                      </div>
                                                  </div>
                                              </div>
                                                  <!-- users edit Info form ends -->
                                  </div>
                                  <div class="tab-pane" id="social" aria-labelledby="social-tab" role="tabpanel">
                                      <!-- users edit socail form start -->
                                      @role(['System Admin'])
                               
                               <a href="#new-company" class="bootstrap-modal-form-open btn btn-primary mb-2" data-toggle="modal"><span> Add New Company </span></a>
                               @endrole
                                    <!-- users edit media object start -->
                                    <div class="row" id="table-hover-animation">
                                      <div class="col-12">
                                          <div class="card">
                                           
                                              <div class="card-content">
                                                  <div class="card-body">
                                                     
                                                      <div class="table-responsive">
                                                          
                                                            <table class="table table-hover mb-0 font-small-2">
                                                              <thead>
                                                              <tr>
                                                                <th>#</th>
                                                                <th>Name </th>
                                                                <th>Address & Contact</th>
                                                                <th>Contact Person </th>
                                                                <th>Added On</th>
                                                                <th width="30"></th>
                                                              </tr>
                                                            </thead>
                                                            <tbody>
                                                              @foreach( $corporate_companies as $key => $company )
                                                                  <tr>
                                                                  <td>{{ $company->id }}</td>
                                                                  <td>{{ $company->name }}</td>
                                                                  <td>{{ $company->address }}</td>
                                                                  <td>{{ $company->contactperson }}</td>
                                                                  <td>{{ $company->created_on }}</td>
                                                                  <td><a href="#" class="bootstrap-modal-form-open" onclick="deleteCorporateDetails('{{ $company->id }}','{{ $company->name }}')"  id="edit" name="edit" data-toggle="modal" alt="edit"><i class="fa fa-trash"></i></a>
                                                                  </td></tr>
                                                              @endforeach 
                                                            </tbody> 
                                                          </table>
                                                         
                                                      </div>
                                                      
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
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





  <div class="modal fade text-left" id="new-service" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-cemodal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">Add Service Charge</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form  class="bootstrap-modal-form" method="post" enctype="multipart/form-data" action="/add-service" class="panel-body wrapper-lg">
                @include('settings/add_service')
                <button type="submit" class="btn btn-primary mb-2 pull-right">Save</button>
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                
              </form>
            </div>
            
          
        </div>
    </div>
  </div>
       
                

                <div class="modal fade text-left" id="edit-service" tabindex="-1" role="dialog"  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-cemodal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h4 class="modal-title" id="myModalLabel17">Update Service Charge</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                            <form  class="bootstrap-modal-form" method="post" enctype="multipart/form-data" action="/update-service" class="panel-body wrapper-lg">
                              @include('settings/edit_service')
                              <button type="submit" class="btn btn-primary mb-2 pull-right">Update</button>
                              <input type="hidden" name="_token" value="{{ Session::token() }}">
                              <input type="hidden" name="myoldid" id="myoldid" value="{{ Request::old('myoldid') ?: '' }}">
                            </form>
                          </div>
                          
                        
                      </div>
                  </div>
                </div>


                <div class="modal fade text-left" id="new-insurer" tabindex="-1" role="dialog"  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-cemodal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h4 class="modal-title" id="myModalLabel17">Add Insurance Company</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                            <form  class="bootstrap-modal-form" method="post" enctype="multipart/form-data" action="/add-insurance-company" class="panel-body wrapper-lg">
                              @include('settings/new_insurance')
                              <button type="submit" class="btn btn-primary mb-2 pull-right">Save</button>
                              <input type="hidden" name="_token" value="{{ Session::token() }}">
                              
                            </form>
                          </div>
                          
                        
                      </div>
                  </div>
                </div>

                <div class="modal fade text-left" id="new-company" tabindex="-1" role="dialog"  aria-hidden="true">
                  <div class="modal-dialog modal-dialog-cemodal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
                      <div class="modal-content">
                          <div class="modal-header">
                              <h4 class="modal-title" id="myModalLabel17">Add Corporate Institution</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                            <form  class="bootstrap-modal-form" method="post" enctype="multipart/form-data" action="/add-company" class="panel-body wrapper-lg">
                              @include('settings/new_insurance')
                              <button type="submit" class="btn btn-primary mb-2 pull-right">Save</button>
                              <input type="hidden" name="_token" value="{{ Session::token() }}">
                              
                            </form>
                          </div>
                          
                        
                      </div>
                  </div>
                </div>



               
            


              @stop





<script type="text/javascript">
$(document).ready(function () {
   
  $('#new_department').select2();
    $('#department').select2();
    

  });
</script>


<script>
  function deleteDetails(id,name)
   {
    Swal.fire({
      title: 'Are you sure?',
      text: "Do you want to deactivate "+name+" ?",  
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, deactivate it!',
      confirmButtonClass: 'btn btn-primary',
      cancelButtonClass: 'btn btn-danger ml-1',
      buttonsStyling: false,
        }).then(function (result) {
      if (result.value) 
      { 
          $.get('/delete-service-charge',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              Swal.fire("Deleted!", name +" was removed from list.", "success"); 
               location.reload(true);
             }
            else
            { 
              Swal.fire("Cancelled","Failed to be removed from list.", "error");
              
            }
           
        });
                                          
          },'json');    
           
             } 
        else {     
          Swal.fire("Cancelled","Failed to be removed from list.", "error");   
        } });

    
   }




function editService(id)
{ 
   //alert(id);
  $.get("/edit-service",
          {"id":id},
          function(json)
          {
            
              $('#edit-service input[name="myoldid"]').val(json.myoldid);
                $('#edit-service input[name="service"]').val(json.service);
                $('#edit-service input[name="description"]').val(json.remark);
                 $('#edit-service input[name="charge"]').val(json.charge);
                $('#edit-service input[name="walk_margin"]').val(json.charge);
                $('#edit-service input[name="corporate_margin"]').val(json.corporate_margin);
                $('#edit-service input[name="insurance_margin"]').val(json.insurance_margin);
                
                $('#edit-service input[name="glico_margin"]').val(json.glico_margin);
                $('#edit-service input[name="cosmopolitan_margin"]').val(json.cosmopolitan_margin);
                $('#edit-service input[name="premier_margin"]').val(json.premier_margin);

                $('#edit-service input[name="metropolitan_margin"]').val(json.metropolitan_margin);
                $('#edit-service input[name="apex_margin"]').val(json.apex_margin);
                $('#edit-service input[name="acacia_margin"]').val(json.acacia_margin);

                $('#edit-service input[name="universal_margin"]').val(json.universal_margin);
                $('#edit-service input[name="nationwide_margin"]').val(json.nationwide_margin);

                
                $('#edit-service select[name="department"]').val(json.department);
                 $('#edit-service select[name="department"]').select2();

              //}
          },'json').fail(function(msg) {
          alert(msg.status + " " + msg.statusText);
        });

}
</script>

<script>
  function deleteInsuranceDetails(id,name)
   {
    Swal.fire({
      title: 'Are you sure?',
      text: "Do you want to deactivate "+name+" ?",  
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, deactivate it!',
      confirmButtonClass: 'btn btn-primary',
      cancelButtonClass: 'btn btn-danger ml-1',
      buttonsStyling: false,
        }).then(function (result) {
      if (result.value) 
        { 
          $.get('/delete-insurer',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              Swal.fire("Deleted!", name +" was removed from list.", "success"); 
               location.reload(true);
             }
            else
            { 
              Swal.fire("Cancelled","Failed to be removed from list.", "error");
              
            }
           
        });
                                          
          },'json');    
           
             } 
        else {     
          Swal.fire("Cancelled","Failed to be removed from list.", "error");   
        } });

    
   }


   function deleteCorporateDetails(id,name)
   {
    Swal.fire({
      title: 'Are you sure?',
      text: "Do you want to deactivate "+name+" ?",  
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes, deactivate it!',
      confirmButtonClass: 'btn btn-primary',
      cancelButtonClass: 'btn btn-danger ml-1',
      buttonsStyling: false,
        }).then(function (result) {
      if (result.value) 
        { 
          $.get('/delete-company',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Deleted!", name +" was removed from list.", "success"); 
               location.reload(true);
             }
            else
            { 
              swal("Cancelled","Failed to be removed from list.", "error");
              
            }
           
        });
                                          
          },'json');    
           
             } 
        else {     
          swal("Cancelled","Failed to be removed from list.", "error");   
        } });
    
   }
</script>





