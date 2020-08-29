
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
                                      <a class="nav-link d-flex align-items-center active" id="haematology-tab" data-toggle="tab" href="#haematology" aria-controls="account" role="tab" aria-selected="true">
                                          <i class="feather icon-align-justify mr-25"></i><span class="d-none d-sm-block"> Images </span>
                                      </a>
                                  </li>
                                  
                              </ul>

                              <div class="content-header-left col-md-9 col-12 mb-2">
                                <div class="row breadcrumbs-top">
                                    <div class="col-12">
                                     
                                     
                                      <h2 class="content-header-title float-left mb-0">{{ $patients->fullname }}</h2>
                                        
                                         
                                        <div class="breadcrumb-wrapper col-12">
                                            <ol class="breadcrumb">
                                                <li class="breadcrumb-item"><a href="#">{{ $patients->gender }}</a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="#">{{ $patients->date_of_birth->age }}</a>
                                                </li>
                                                <li class="breadcrumb-item"><a href="#"> {{ $visitdetails->care_provider }}</a>
                                                </li>
                                                <li class="breadcrumb-item active"><i class="feather icon-phone-call"></i> {{ $patients->mobile_number }}
                                                </li>
                                            </ol>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                           
                            <div class="alert alert-warning mt-1 p-1">
                              <p> @foreach($tests as $val)  <label class="badge @if($val->status=="Ready") badge-success badge-sm mr-1 mb-1 @else badge-danger badge-sm mr-1 mb-1 @endif"> {{ $val->investigation }} </label> <a href="#" class="bootstrap-modal-form-open" onclick="removeinvestigation('{{  $val->id }}','{{ $val->investigation }}')"  id="edit" name="edit" data-toggle="modal" alt="edit"><i class="feather icon-trash"></i></a>  @endforeach </p>
                              {{-- Diagnosis : @foreach($mydiagnosis as $val) <code> {{ $val->diagnosis }} </code>  @endforeach  --}}
                            </div> 

                              <div class="tab-pane" id="social" aria-labelledby="social-tab" role="tabpanel">
                                <!-- users edit socail form start -->
                               
                                <!-- users edit socail form ends -->
                             </div>


                              </div>
                          </div>
                      </div>
                  
              </section>
              <!-- users edit ends -->


              <section class="users-edit">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                          <div class="col-lg-12 col-12">
                            <div class="card">
                                <div class="card-header">
                                  <a href="#attach_document" data-toggle="modal"> <button class="btn btn-primary mb-2"><i class="feather icon-plus"></i>&nbsp; Upload </button></a>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                      @foreach($images as $keys => $image)
     

                                      <div class="col-md-4 col-6 user-latest-img">
                     
                                       @if($image->mime == 'docx')
                                      <a href="{!! '/uploads/images/'.$image->filepath !!}" target="_blank">
                                                 <img  class="img-fluid mb-1 rounded-sm media-object img-xl rounded-circle" src="{!! '/images/ms_word.png' !!}">
                                                 </a>  {{ $image->filename }}  <a href="#" class="img-fluid mb-1 rounded-sm" onclick="deleteImage('{{  $image->id }}','{{ $image->filename }}')"><i class="fa fa-trash"></i></a>
                                       @elseif($image->mime == 'pdf')
                                        <a href="{!! '/uploads/images/'.$image->filepath !!}" target="_blank">
                                                 <img class="img-fluid mb-1 rounded-sm media-object img-xl rounded-circle" src="{!! '/images/pdf.png' !!}" >
                                                 </a>{{ $image->filename }} <a href="#" class="img-fluid mb-1 rounded-sm" onclick="deleteImage('{{  $image->id }}','{{ $image->filename }}')"><i class="fa fa-trash"></i></a> <span class="label label-default btn-rounded" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{ $image->created_on}}">{{ $image->created_on->diffForHumans() }}</span>
                                         @else 
                                        <a href="{!! '/uploads/images/'.$image->filepath !!}" target="_blank">
                                                 <img class="img-fluid mb-1 rounded-sm media-object img-xl rounded-circle" src="{!! '/uploads/images/'.$image->filepath !!}">
                                                 </a> {{ $image->filename }}  <a href="#" class="img-fluid mb-1 rounded-sm" onclick="deleteImage('{{  $image->id }}','{{ $image->filename }}')"><i class="fa fa-trash"></i></a>
                                       @endif        
                                         </div>
                                       @endforeach
                                        
                                            
                                        </div>
                                       
                                    </div>
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

  <div class="modal fade text-left" id="attach_document" tabindex="-1" role="dialog"  aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel17">Attach Document</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post"  enctype="multipart/form-data" action="/bulkupload">
              <div class="modal-body">
                <input type="text" class="form-control" width="1000px" height="40px" name="filename" id="filename" placeholder="Enter file name" /><br>
                <input type="file" class="form-control dropbox" width="500px" height="40px" name="images[]" multiple /><br>
                {{-- <input type="submit" name="submit"  class="btn btn-success btn-s-xs" value="upload" /> --}}
                <input type="hidden" name="_token" value="{{ Session::token() }}">
                <input type="hidden" name="selectedid" id="selectedid" value="{{ $visitdetails->patient_id }}">
                <input type="hidden" name="visitid" id="visitid" value="{{ $visitdetails->opd_number }}">
                <input type="hidden" name="file_source" id="file_source" value="Radiology">
              </div>
              <div class="modal-footer">
                  <button type="submit" name="submit" class="btn btn-primary waves-effect waves-light">Upload</button>
              </div>
              </form>
            
            
        </div>
    </div>
  </div> 
 
  @stop

  <script src="{{ asset('/event_components/jquery.min.js')}}"></script>

  <script type="text/javascript">

 function deleteImage(id,name)
   {
    Swal.fire({   
        title: "Are you sure?",   
        text: "Do you want to remove "+name+" from the file list?",   
        type: "warning",   
        showCancelButton: true,   
        confirmButtonColor: "#DD6B55",   
        confirmButtonText: "Yes, delete it!",   
        cancelButtonText: "No, cancel plx!",   
        closeOnConfirm: false   
       }, 
        function(isConfirm){   
          if (isConfirm) 
          { 
          $.get('/delete-image-request',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              Swal.fire("Deleted!", name +" was removed from file list.", "success"); 
               location.reload(true);
             }
            else
            { 
              Swal.fire("Cancelled", name +" failed to be removed from list.", "error");
              
            }
           
        });
                                          
          },'json');    
           
             } 
        else {     
          Swal.fire("Cancelled", name +" failed to be removed from list.", "error");   
        } });

    
   }



      </script>

{{-- 
     <div class="modal fade" id="attach_document" size="600">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Attach Document</h4>
        </div>

        <div class="modal-body">
         <div class="fallback">
          <form method="post"  enctype="multipart/form-data" action="/bulkupload">
          <input type="text" class="form-control" width="1000px" height="40px" name="filename" id="filename" placeholder="Enter file name" /><br>
          <input type="file" class="form-control dropbox" width="500px" height="40px" name="images[]" multiple /><br>
          <input type="submit" name="submit"  class="btn btn-success btn-s-xs" value="upload" />
          <input type="hidden" name="_token" value="{{ Session::token() }}">
          <input type="hidden" name="selectedid" id="selectedid" value="{{ $visitdetails->patient_id }}">
          <input type="hidden" name="visitid" id="visitid" value="{{ $visitdetails->opd_number }}">
          <input type="hidden" name="file_source" id="file_source" value="Radiology">
        </form>
        </div>
          <br>
          <br>
          <br>
              <div class="jumbotron how-to-create">
                <ul>
                    <li>Documents/Images are uploaded as soon as you drop them</li>
                    <li>Maximum allowed size of image is 8MB</li>
                </ul>

            </div>

      </div>
      </div>
      </div>
      </div> --}}


