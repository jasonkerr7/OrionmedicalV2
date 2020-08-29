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
                              <a class="dropdown-item" href="/list-of-drugs-avaliable">Drug Formulary</a>
                              <a class="dropdown-item" href="/expired-drugs">Expired Drugs</a>
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
                                          <i class="feather icon-user-check mr-25"></i><span class="d-none d-sm-block">Drug Formulary</span>
                                      </a>
                                  </li>
                                  
                                  <form action="/find-drugs" method="GET">
                                    <div class="col-12">
                                    
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
                                                            <table id="investigationsTable" class="table table-hover mb-0 font-small-2">
                                                                <thead>
                                                                    <tr>
                                                                      <th scope="col">Display Name</th>
                                                                      <th scope="col">Supplier</th>
                                                                      <th scope="col">Unit</th>
                                                                      <th scope="col">Pack Size</th>
                                                                      <th scope="col">Stock level</th>
                                                                      @role(['System Admin','Pharmacist'])
                                                                      <th scope="col">Current Pack Price</th>
                                                                      <th scope="col">Current Unit Price</th>
                                                                      @endrole
                                                                      <th scope="col">Selling Price</th>
                                                                      <th scope="col">Insurance S.P </th>
                                                                      <th scope="col">Expiry Date</th>
                                                                      <th scope="col"></th>
                                                                      <th scope="col"></th>
                                                                      <th scope="col"></th>
                                                                      <th scope="col"></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                  @foreach($drugs as $drug )
                                                                  <tr>
                                                                          
                                                                   @if($drug->stock === 0)
                                                                    <tr bgcolor="#F48FB1">
                                                                    @elseif($drug->stock <= $drug->stock_alert)
                                                                        <tr bgcolor="#BA68C8">
                                                                    @elseif($drug->expiry_date <= Carbon\Carbon::today())
                                                                    <tr bgcolor="#F1948A">
                                                                   
                                                                    @else
                                                                    <tr>
                                                                    @endif
                                                                    <td>{{ $drug->name }}</td>
                                                                    <td>{{ $drug->supplier }}</td>
                                                                    <td>{{ $drug->drug_application_default }}</td>
                                                                    <td>{{ $drug->drug_quantity_default }}</td>
                                                                    <td>{{ $drug->stock }}</td>
                                                                    @role(['Pharmacist','System Admin'])
                                                                    <td>{{ $drug->sale_price }}</td>
                                                                    <td>{{ $drug->unit_price }}</td>
                                                                    @endrole
                                                                    <td>{{ $drug->unit_price * $drug->walk_margin  }}</td>
                                                                    <td>{{ $drug->unit_price * $drug->insurance_margin }}</td>
                                                                    <td>{{ $drug->expiry_date->diffForHumans() }}</td>
                                                                    
                                                                    <td><a href="#edit-drug" class="bootstrap-modal-form-open" onclick="getdrugdetail('{{ $drug->id }}')"  id="edit" name="edit" data-toggle="modal" alt="edit"><i class="feather icon-edit-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit"></i></a></td>
                                        
                                                                      @role(['Pharmacist','System Admin']) 
                                        
                                                                    <td>
                                                                      <a href="#new-damaged-drug" class="bootstrap-modal-form-open" onclick="getdrugdetailstock('{{ $drug->id }}','{{ $drug->name }}')"  id="delete" name="delete" data-toggle="modal" alt="edit"><i class="fa fa-warning (alias)" data-toggle="tooltip" data-placement="top" title="" data-original-title="Report Damage"></i></a>
                                                                   </td>
                                        
                                                                    <td>
                                                                      <a href="#new-expired-drug" class="bootstrap-modal-form-open" onclick="getdrugdetail('{{ $drug->id }}','{{ $drug->name }}')"  id="delete" name="delete" data-toggle="modal" alt="edit"><i class="fa fa-sign-out" data-toggle="tooltip" data-placement="top" title="" data-original-title="Report Expired"></i></a>
                                                                    </td>
                                        
                                                                    <td>
                                                                        @if($drug->status == 'Active')
                                                                            <a href="#" class="" onclick="deactivateDrug('{{ $drug->id }}','{{ $drug->name }}')" data-toggle="class"><i class="feather icon-thumbs-down" data-toggle="tooltip" data-placement="top" title="" data-original-title="Deactivate"></i> </a>
                                                                        @else
                                                                            <a href="#" class="" onclick="activateDrug('{{ $drug->id }}','{{ $drug->name }}')" data-toggle="class"><i class="feather icon-thumbs-down" data-toggle="tooltip" data-placement="top" title="" data-original-title="Activate"></i></a>
                                                                        @endif
                                                                    </td>
                                                                    <td>
                                                                      <a href="#" class="bootstrap-modal-form-open" onclick="deletedrug('{{ $drug->id }}','{{ $drug->name }}')"  id="delete" name="delete" data-toggle="modal" alt="edit"><i class="feather icon-trash-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"></i></a>
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
                                      <div> Record(s) Found : {{ $drugs->total() }} {{ str_plural('Drug', $drugs->total()) }}</div>
                                    </div>
                                      <div class="col-sm-12 col-md-7">
                                        {!!$drugs->render()!!}
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




  <div class="modal fade" id="edit-drug" tabindex="-1" role="dialog" aria-labelledby="edit-drug" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit-drug">Edit Drug</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
              <form  class="bootstrap-modal-form" method="post" data-validate="parsley" action="/update-drug-details" class="panel-body wrapper-lg">
                @include('pharmacy/edit_drug')
             <input type="hidden" name="_token" value="{{ Session::token() }}">
           </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Accept</button>
            </div>
        </div>
    </div>
</div>

  

<div class="modal fade" id="add-drug" size="600">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Add New Drug</h4>
        </div>
        <div class="modal-body">
          <p></p>
                      <section class="vbox">
                    <header class="header bg-light bg-gradient">
                      <ul class="nav nav-tabs nav-white">
                          <li class="active"><a href="#equitytab" data-toggle="tab">Drug Details</a></li>
                      </ul>
                    </header>
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="individual">
                           <form  class="bootstrap-modal-form" data-validate="parsley" method="post" action="/save-drug" class="panel-body wrapper-lg">
                           @include('pharmacy/new_drug')
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


 <div class="modal fade" id="update-stock" size="600">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Update Stock</h4>
        </div>
        <div class="modal-body">
          <p></p>
                      <section class="vbox">
                    <header class="header bg-light bg-gradient">
                      <ul class="nav nav-tabs nav-white">
                          <li class="active"><a href="#equitytab" data-toggle="tab">Drug Details</a></li>
                      </ul>
                    </header>
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="individual">
                           <form  class="bootstrap-modal-form" data-validate="parsley" method="post" action="/update-drug-stock-level" class="panel-body wrapper-lg">
                           @include('pharmacy/updatestock')
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


  <div class="modal fade" id="new-damaged-drug" size="300px">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Report Status</h4>
        </div>
        <div class="modal-body">
          <p></p>
                      <section class="vbox scrollable">
                    <header class="header bg-light bg-gradient">
                      <ul class="nav nav-tabs nav-white">
                          <li class="active"><a href="#equitytab" data-toggle="tab">Drug Details</a></li>
                      </ul>
                    </header>
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="individual">
                           <form  class="bootstrap-modal-form" method="post" data-validate="parsley" action="/add-damaged-details" class="panel-body wrapper-lg">
                           @include('pharmacy/new_damaged')
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


 <div class="modal fade" id="new-expired-drug" size="300px">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Add Expired Drug</h4>
        </div>
        <div class="modal-body">
          <p></p>
                      <section class="vbox scrollable">
                    <header class="header bg-light bg-gradient">
                      <ul class="nav nav-tabs nav-white">
                          <li class="active"><a href="#equitytab" data-toggle="tab">Drug Details</a></li>
                      </ul>
                    </header>
                    <section class="scrollable">
                      <div class="tab-content">
                        <div class="tab-pane active" id="individual">
                           <form  class="bootstrap-modal-form" method="post" data-validate="parsley" action="/add-expired-details" class="panel-body wrapper-lg">
                           @include('pharmacy/new_expired')
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

<script src="{{ asset('/event_components/jquery.min.js')}}"></script>

<script type="text/javascript">
$(function () {
  $('#add-drug input[name="expiry_date"]').daterangepicker({
     "minDate": moment(),
      "singleDatePicker":true,
      "autoApply": true,
      "showDropdowns": true,
      "locale": {
      "format": "DD/MM/YYYY",
      "separator": " - ",
    }
  });
});


</script>
<script type="text/javascript">
$(function () {
  $('#edit-drug input[name="expiry_date"]').daterangepicker({
     "minDate": moment(),
      "singleDatePicker":true,
      "autoApply": true,
      "showDropdowns": true,
      "locale": {
      "format": "DD/MM/YYYY",
      "separator": " - ",
    }
  });
});


</script>

<script type="text/javascript">
$(function () {
  $('#update-stock input[name="expiry_date"]').daterangepicker({
     "minDate": moment(),
      "singleDatePicker":true,
      "autoApply": true,
      "showDropdowns": true,
      "locale": {
      "format": "DD/MM/YYYY",
      "separator": " - ",
    }
  });
});


</script>

<script type="text/javascript">
  $(document).ready(function() {

                  $('#add-drug select[name="classification"]').select2({
                  tags: true
                  });
                  $('#add-drug select[name="supplier"]').select2({
                  tags: true
                  });
                   $('#add-drug select[name="drug_form"]').select2({
                  tags: true
                  });
                    $('#add-drug select[name="brand"]').select2({
                  tags: true
                  });
   



  });
</script>

<script>

function getdrugdetail(id)
{ 

  $.get("/get-drug-detail",
          {"id":id},
          function(json)
          {
            

                $('#edit-drug input[name="drugid"]').val(json.drugid);
                $('#edit-drug input[name="drug_number"]').val(json.drug_number);
                $('#edit-drug select[name="supplier"]').val(json.supplier);
                $('#edit-drug input[name="drug_name"]').val(json.drug_name);
                $('#edit-drug input[name="generic_name"]').val(json.generic_name);
                $('#edit-drug input[name="drug_description"]').val(json.drug_description);
                $('#edit-drug select[name="classification"]').val(json.classification);
                $('#edit-drug select[name="brand"]').val(json.brand);
                $('#edit-drug input[name="stock"]').val(json.stock);
                $('#edit-drug input[name="buy_price"]').val(json.buy_price);
                $('#edit-drug input[name="sale_price"]').val(json.sale_price);
                $('#edit-drug input[name="unit_price"]').val(json.unit_price);
                $('#edit-drug select[name="drug_form"]').val(json.drug_form);
                $('#edit-drug input[name="pack_size"]').val(json.pack_size);
                $('#edit-drug input[name="store_box"]').val(json.store_box);
                $('#edit-drug input[name="expiry_date"]').val(json.expiry_date);
                $('#edit-drug input[name="stock_alert"]').val(json.stock_alert);

                $('#edit-drug input[name="walk_margin"]').val(json.walk_margin);
                $('#edit-drug input[name="insurance_margin"]').val(json.insurance_margin);


                $('#new-expired-drug input[name="stock"]').val(json.stock);
                $('#new-expired-drug input[name="drugid"]').val(json.drugid);
                $('#new-expired-drug select[name="drug_name"]').val(json.drug_name);
                $('#new-expired-drug select[name="drug_name"]').select2({tags: true });

                
                $('#edit-drug textarea[name="effects"]').val(json.effects);
                
                 $('#edit-drug select[name="classification"]').select2({
                  tags: true
                  });
                  $('#edit-drug select[name="supplier"]').select2({
                  tags: true
                  });
                   $('#edit-drug select[name="drug_form"]').select2({
                  tags: true
                  });
                    $('#edit-drug select[name="brand"]').select2({
                  tags: true
                  });
                 
              //}
          },'json').fail(function(msg) {
          alert(msg.status + " " + msg.statusText);
        });

}



function deletedrug(id,name)
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
          $.get('/delete-drug',
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


  function activateDrug(id,name)
  {

      //alert(id);

      swal({   
        title: "Are you sure?",   
        text: "Do you want to activate "+name+" ?",   
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
          $.get('/activate-drug',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Deleted!", name +" was successfully activated in store.", "success"); 
              location.reload(true);
             }
            else
            { 
              swal("Cancelled", name +" failed to activate.", "error");
              
            }
           
        });
                                          
          },'json');    
           
             } 
        else {     
          swal("Cancelled", name +" failed to activate.", "error");   
        } });

  }



  function deactivateDrug(id,name)
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
          $.get('/deactivate-drug',
          {
             "ID": id 
          },
          function(data)
          { 
            
            $.each(data, function (key, value) 
            {
            if(value == "OK")
            {
              swal("Deleted!", name +" was successfully deactivated from store.", "success"); 
              location.reload(true);
             }
            else
            { 
              swal("Cancelled", name +" failed to deactivate.", "error");
              
            }
           
        });
                                          
          },'json');    
           
             } 
        else {     
          swal("Cancelled", name +" failed to deactivate.", "error");   
        } });

  }

</script>


<script>

function getdrugdetailstock(id)
{ 

  $.get("/get-drug-detail",
          {"id":id},
          function(json)
          {
            

                $('#update-stock input[name="drugid"]').val(json.drugid);
                $('#update-stock input[name="drug_number"]').val(json.drug_number);
                $('#update-stock select[name="supplier"]').val(json.supplier);
                $('#update-stock input[name="drug_name"]').val(json.drug_name);
                $('#update-stock input[name="generic_name"]').val(json.generic_name);
                $('#update-stock input[name="drug_description"]').val(json.drug_description);
                $('#update-stock select[name="classification"]').val(json.classification);
                $('#update-stock select[name="brand"]').val(json.brand);
                $('#update-stock input[name="stock"]').val(json.stock);
                $('#update-stock input[name="buy_price"]').val(json.buy_price);
                $('#update-stock input[name="sale_price"]').val(json.sale_price);
                $('#update-stock input[name="unit_price"]').val(json.unit_price);
                $('#update-stock select[name="drug_form"]').val(json.drug_form);
                $('#update-stock input[name="pack_size"]').val(json.pack_size);
                $('#update-stock input[name="store_box"]').val(json.store_box);
                $('#update-stock input[name="stock_alert"]').val(json.stock_alert);
                $('#update-stock  input[name="expiry_date"]').val(json.expiry_date);
                $('#update-stock select[name="drug_form"]').val(json.drug_form);
               
                $('#new-damaged-drug input[name="stock"]').val(json.stock);
                $('#new-damaged-drug input[name="drugid"]').val(json.drugid);
                $('#new-damaged-drug select[name="drug_name"]').val(json.drug_name);
                $('#new-damaged-drug select[name="drug_name"]').select2({tags: true });
                
                $('#update-stock textarea[name="effects"]').val(json.effects);
                
                $('#update-stock select[name="classification"]').select2({
                  tags: true
                  });
                $('#update-stock select[name="supplier"]').select2({
                  tags: true
                  });
                $('#update-stock select[name="drug_form"]').select2({
                  tags: true
                  });
                $('#update-stock select[name="brand"]').select2({
                  tags: true
                  });

                   
                 
              //}
          },'json').fail(function(msg) {
          alert(msg.status + " " + msg.statusText);
        });

}
</script>








