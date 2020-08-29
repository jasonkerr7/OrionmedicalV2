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

              <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                         
                        </div>
                    </div>
                </div>
      
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                  
                    <div class="form-group breadcrum-right">
                      
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings"></i></button>
                            <div class="dropdown-menu dropdown-menu-right">
                              <a class="dropdown-item" href="/list-of-drugs-avaliable">Drug List</a>
                              <a class="dropdown-item" href="/list-of-drugs-avaliable">Expired Drugs</a>
                              <a class="dropdown-item" href="/list-of-drugs-avaliable">Low Stock Drugs</a>


                            
                            </div>
                        </div>
                    </div>
                </div>
            </div>
              
              <section class="users-edit">
                  <div class="card">
                      <div class="card-content">
                          <div class="card-body">
                              <ul class="nav nav-tabs mb-3" role="tablist">
                                  <li class="nav-item">
                                      <a class="nav-link d-flex align-items-center active" id="account-tab" data-toggle="tab" href="#account" aria-controls="account" role="tab" aria-selected="true">
                                          <i class="feather icon-user-check mr-25"></i><span class="d-none d-sm-block">Pending Request</span>
                                      </a>
                                  </li>
                                  <li class="nav-item">
                                      <a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab" href="#information" aria-controls="information" role="tab" aria-selected="false">
                                          <i class="feather icon-user-x mr-25"></i><span class="d-none d-sm-block">Done</span>
                                      </a>
                                  </li>
                                
                                 
                                  
                                  <form action="/find-test-result" method="GET">
                                    <div class=" col-12">
                                        <input type="text" class="form-control" id="search" name="search" placeholder="search...">
                                  </div>
                                  </form>
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
                                                            <table class="table table-hover mb-0 font-small-3">
                                                                <thead>
                                                                    <tr>                               
                                                                      <th scope="col">Visit Number</th>
                                                                      <th scope="col">Patient Name</th>
                                                                      <th scope="col">Requested By</th>
                                                                      <th scope="col">Request Type</th>
                                                                      <th scope="col">Date</th>
                                                                      <th scope="col"></th>
                                                                      
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                  @foreach($myrequests as $lab)
                                                                    <tr>
                                                                      <td>{{ $lab->visitid }}</td>
                                                                      <td>{{ $lab->patient_name }}</td>
                                                                      <td>{{ $lab->created_by }}</td>
                                                                      <td>{{ $lab->investigation }}</td>
                                                                      <td>{{ $lab->created_on }}</td>
                                                                      <td>
                                                                        @if (str_contains($lab->status, ['Pending','Not Ready']) !== FALSE)
                                                                        <a href="/perform-analysis/{{ $lab->visitid }}" ><span class="btn btn-sm btn-danger ml-50"> Not Ready </span></a>
                                                                        @elseif (str_contains($lab->status, ['Pending','Ready']) !== FALSE)
                                                                        <a href="/perform-analysis/{{ $lab->visitid }}" ><span class="btn btn-sm btn-success ml-50">  Ready </span></a>
                                                                        @endif
                                                                      </td>
                                                                         
                                                                      
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
                                      <div> Record(s) Found : {{ $myrequests->total() }} {{ str_plural('Request', $myrequests->total()) }}</div>
                                    </div>
                                      <div class="col-sm-12 col-md-7">
                                        {!!$myrequests->render()!!}
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


<script type="text/javascript">
$(document).ready(function () {
   
    $('#investigation').select2();
    $('#patient_id').select2();
    loadInvestigation();
    

  });
</script>

<script type="text/javascript">

function getVisitDetails()
{

 if($('#request_name').val() != "")
 {


 $.get('/get-visit-details-laboratory',
        {

          "id": $('#request_visitid').val(),
          "fullname": $('#request_name').val(),
         
        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        
            //sweetAlert("Employee SSF : ", data["PatientName"], "info");
            $('#accounttype').val(data.AccountType);
            $('#request_patient_id').val(data.PatientID);
            //$('#request_name').val(data.PatientName);
            $('#request_visitid').val(data.VisitID);
       
      });
                                        
        },'json');

}

else
{
   sweetAlert("Please enter patient name!");

}


}
  
function addInvestigation()
{
if($('#investigation').val()!= "")
{

    $.get('/add-investigation',
        {
          "patient_id": $('#request_patient_id').val(),
           "accounttype": $('#accounttype').val(),
          "opd_number": $('#request_visitid').val(),
          "investigation": $('#investigation').val(),
          "fullname":  $('#request_name').val()                      
        },
        function(data)
        { 
          
          $.each(data, function (key, value) {
        if(data["OK"])
        {
         
          loadInvestigation();
          $('#investigation').val()!= ""
        }
        else
        {
          sweetAlert("Investigation failed to be added!");
        }
      });
                                        
        },'json');
  }
  else
    {sweetAlert("Please select an Investigation!");}
}


function loadInvestigation()
   {
         
        
        $.get('/patient-investigation',
          {
            "opd_number": $('#request_visitid').val()
          },
          function(data)
          { 

            $('#investigationsTable tbody').empty();
            $.each(data, function (key, value) 
            {           
           $('#investigationsTable tbody').append('<tr><td>'+ value['investigation'] +'</td><td>'+ value['cost'] +'</td><td>'+ value['created_on'] +'</td><td>'+ value['status'] +'</td><td><a a href="/view-lab-request/'+value['id']+'"><i onclick="" class="fa fa-eye"></i></a></td><td><a a href="#"><i onclick="removeinvestigation(\''+value['id']+'\',\''+value['investigation']+'\')" class="fa fa-trash-o"></i></a></td></tr>');
            });
                                          
         },'json');      
    }


    function removeinvestigation(id,name)
   {
      swal({   
        title: "Are you sure?",   
        text: "Do you want to remove "+name+" from the list?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, delete it!",   
        cancelButtonText: "No, cancel plx!",   
        closeOnConfirm: false,   
        closeOnCancel: false }, 
        function(isConfirm){   
          if (isConfirm) 
          { 
          $.get('/delete-investigation',
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
              loadInvestigation();
             }
            else
            { 
              swal("Cancelled", name +" failed to be removed from list.", "error");
              
            }
           
        });
                                          
          },'json');    
           
             } 
        else {     
          swal("Cancelled", name +" failed to be removed from list.", "error");   
        } });

    
   }

</script>

