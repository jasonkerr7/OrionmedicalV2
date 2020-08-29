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
                      <h2 class="content-header-title float-left mb-0">Thumb View</h2>
                      <div class="breadcrumb-wrapper col-12">
                          <ol class="breadcrumb">
                              <li class="breadcrumb-item"><a href="index.html">Home</a>
                              </li>
                              <li class="breadcrumb-item"><a href="#">Data List</a>
                              </li>
                              <li class="breadcrumb-item active">Thumb View
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
                  <table class="table data-thumb-view">
                      <thead>
                          <tr>
                              <th></th>
                              <th>Image</th> 
                              <th>NAME</th>
                              <th>CATEGORY</th>
                              <th>POPULARITY</th>
                              <th>STATUS</th>
                              <th>STOCK</th>
                              <th>PRICE</th>
                              <th>ACTION</th>
                          </tr>
                      </thead>
                      <tbody>
                        @foreach($drugs as $drug )
                          <tr>
                              <td></td>
                              <td class="product-img"><img src="../../../app-assets/images/elements/apple-watch.png" alt="Img placeholder">
                              </td> 
                              <td class="product-name">{{ ucwords(strtolower(str_limit($drug->name,30))) }}</td>
                              <td class="product-category">Computers</td>
                              <td>
                                  <div class="progress progress-bar-success">
                                      <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40" aria-valuemax="100" style="width:97%"></div>
                                  </div>
                              </td>
                              <td>
                                @if($drug->expiry_date <= Carbon\Carbon::today())
                                <div class="chip chip-danger">
                                  <div class="chip-body">
                                      <div class="chip-text">Expired</div>
                                  </div>
                              </div>
                                @else
                                    @if($drug->stock === 0)
                                     <div class="chip chip-danger">
                                      <div class="chip-body">
                                          <div class="chip-text">Out of Stock</div>
                                      </div>
                                  </div>
                                    @elseif($drug->stock <= $drug->stock_alert)
                                    <div class="chip chip-primary">
                                      <div class="chip-body">
                                          <div class="chip-text">Low Stock</div>
                                      </div>
                                  </div>
                                    @else
                                    <div class="chip chip-success">
                                      <div class="chip-body">
                                          <div class="chip-text">Available</div>
                                      </div>
                                    </div>
                                    @endif

                                @endif
                                 
                              </td>
                             
                              <td class="product-stock">{{ $drug->stock }}</td>
                              <td class="product-price">{{ $drug->unit_price }}</td>
                              <td class="product-action">
                                  <span class="action-edit"><i class="feather icon-edit"></i></span>
                                  <span class="action-delete"><i class="feather icon-trash"></i></span>
                                  
                                  <a href="#assign-consumable" class="bootstrap-modal-form-open" onclick="getdrugdetail('{{ $drug->id }}')"  id="edit" name="edit" data-toggle="modal" alt="edit"><i class="feather icon-shopping-cart"></i></a>
                              </td>
                          </tr>
                          @endforeach
                         
                      </tbody>
                  </table>
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

{{-- <section id="content">
          <section class="vbox">          
            <section class="scrollable padder">
              <ul class="breadcrumb no-border no-radius b-b b-light pull-in">
                <li><a href="index.html"><i class="fa fa-home"></i> Home </a></li>
                <li class="active"> Medical Store Manager </li>
              </ul>

           
             <section class="panel panel-default">
                <div class="row m-l-none m-r-none bg-light lter">
                  
                   @role(['Pharmacist','System Admin'])
                  <div class="col-sm-6 col-md-3 padder-v b-r b-light">
                     <img src="/images/1404394.svg" width="15%" class="pull-left">
                    <a class="clear" href="/list-of-drugs-avaliable"  data-toggle="modal" class="btn btn-sm btn-default bootstrap-modal-form-open">
                      <span class="h3 block m-t-xs"><strong>0</strong></span>
                      <small class="text-muted text-uc">Drugs In Stock </small>
                    </a>
                  </div>
                  @endrole

                  <div class="col-sm-6 col-md-3 padder-v b-r b-light lt">
                     <img src="/images/138268.svg" width="15%" class="pull-left">
                    </span>
                    <a class="clear" href="/consumables-list">
                      <span class="h3 block m-t-xs"><strong id="bugs">{{ $drugs->total() }}</strong></span>
                      <small class="text-muted text-uc">Medical Store </small>
                    </a>
                  </div>

                    <div class="col-sm-6 col-md-3 padder-v b-r b-light">
                    <img src="/images/1188525.svg" width="15%" class="pull-left">
                    <a class="clear" href="/drug-reports">
                      <span class="h3 block m-t-xs"><strong>0</strong></span>
                      <small class="text-muted text-uc">Reports</small>
                    </a>
                  </div>

                     @role(['Pharmacist','System Admin'])
                   <div class="col-sm-6 col-md-3 padder-v b-r b-light lt">
                     <img src="/images/214342.svg" width="15%" class="pull-left">
                    </span>
                    <a class="clear" href="/drug-settings">
                      <span class="h3 block m-t-xs"><strong id="bugs">0</strong></span>
                      <small class="text-muted text-uc">Drug Settings</small>
                    </a>
                  </div>
                  @endrole

                 
                </div>
              </section>


              <section>
              <div>
               <p class="text-muted m-t pull-center">
                      
                     
                      <a href="/fac-business/{{ 'Consumables' }}"><span class="label bg-danger">Medical Consumables</span></a>
                      <a href="/fac-business/{{ 'Laboratory' }}"><span class="label bg-primary">Laboratory Consumables</span></a>
                      <a href="/fac-business/{{ 'Eye Frames' }}"><span class="label bg-success">Eye Frames & Consumables</span></a>
                      <a href="/fac-business/{{ 'Engineering Insurance' }}"><span class="label bg-info">Dental Items & Consumables</span></a>
                      <a href="/fac-business/{{ 'General Accident Insurance' }}"><span class="label bg-dark">General Items</span></a>
                      <a href="/fac-business/{{ 'Marine Insurance' }}"><span class="label bg-warning">Administrative Items</span></a>
                       <a href="/fac-business/{{ 'Liability Insurance' }}"><span class="label bg-danger">Liability</span></a> ||
                      <a href="/fac-business-status/{{ 'Retained' }}"><span class="label bg-dark">Retained</span></a>
                      <a href="/fac-business-status/{{ 'Disposed' }}"><span class="label bg-dark">Disposed</span></a> 
                      </p>
              </div>
              </section>
             

              <div class="row">

                <div class="col-md-12">
 
                  <section class="panel panel-default">
                  <header class="panel-heading">
                    <form action="/find-consumable" method="GET">
                      <div class="input-group text-ms">
                        <input type="text" name='search' id='search' class="input-sm form-control" placeholder="Search by consumable name, brand, category, status">
                        <div class="input-group-btn">
                           <button class="btn btn-sm btn-success" type="submit">Search!</button>
                        </div>
                      </div>
                      </form>
                    </header>
                    <div class="table-responsive">

                      <table class="table table-striped m-b-none text-sm" width="100%">
                          <thead>
                          <tr>
                            
                           
                           
                            <th>Item Name</th>
                             <th>Supplier</th>
                             <th>Stock Level</th>
                             @role(['Pharmacist','System Admin','Pharmacy Technician'])
                            <th>Current Pack Price</th>
                            <th>Current Unit Price</th>
                            <th>Expiry Date</th>
                            <th></th>
                             <th></th>
                             <th></th>
                             <th></th>
                             @endrole
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>

                        @foreach($drugs as $drug )
                          <tr>
                           
                            <td>{{ $drug->name }}</td>
                            <td>{{ $drug->supplier }}</td>
                            <td>{{ $drug->stock }}</td>
                             @role(['Pharmacist','System Admin','Pharmacy Technician','Nurse'])
                            <td>{{ $drug->sale_price }}</td>
                            <td>{{ $drug->unit_price }}</td>
                        
                            
                           
                            <td>{{ $drug->expiry_date->diffForHumans() }}</td>
                            <td>
                                
                            </td>
                            <td><a href="#update-stock" class="bootstrap-modal-form-open" onclick="getdrugdetailstock('{{ $drug->id }}')"  id="edit" name="edit" data-toggle="modal" alt="edit"><i class="fa fa-pencil"></i></a></td>

                            <td><a href="#" class="bootstrap-modal-form-open" onclick="deletedrug('{{ $drug->id }}','{{ $drug->name }}')"  id="delete" name="delete" data-toggle="modal" alt="edit"><i class="fa fa-trash"></i></a></td>
                            @endrole
                             <td><a href="#assign-consumable" class="bootstrap-modal-form-open" onclick="getdrugdetail('{{ $drug->id }}')"  id="edit" name="edit" data-toggle="modal" alt="edit"><i class="fa fa-shopping-cart"></i></a></td>
                          </tr>
                         @endforeach
                        </tbody>
 
                      </table>
                    </div>
                  </section>
         
                </div>
              </div>

            </section>

             <footer class="footer bg-white b-t">
                                    
                         <a href="#add-consumable" class="bootstrap-modal-form-open float" data-toggle="modal">
<i class="fa fa-plus my-float"></i><i class="fa fa-tasks my-float"></i>
</a>
                  <div class="row text-center-xs">
                    <div class="col-md-6 hidden-sm">
                      <p class="text-muted m-t pull-center">
                      <span class="badge badge-info">Record(s) Found : {{ $drugs->total() }} {{ str_plural('Store Item', $drugs->total()) }}</span>

                       <span class="badge badge-info">Total Cost  : {{ $totalcost }} </span>
                      </p>
                    </div>
                    {!!$drugs->render()!!}
                    <div class="col-md-6 col-sm-12 text-right text-center-xs">                
                     
                        
                        
                    </div>
                  </div>


                </footer>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section> --}}




        <div class="modal fade" id="edit-drug" size="600">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Edit Store Item</h4>
              </div>
              <div class="modal-body">
                <p></p>
                            <section class="vbox scrollable">
                          <header class="header bg-light bg-gradient">
                            <ul class="nav nav-tabs nav-white">
                                <li class="active"><a href="#equitytab" data-toggle="tab">Store Item Details</a></li>
                            </ul>
                          </header>
                          <section class="scrollable">
                            <div class="tab-content">
                              <div class="tab-pane active" id="individual">
                                 <form  class="bootstrap-modal-form" method="post" data-validate="parsley" action="/update-consumable-details" class="panel-body wrapper-lg">
                                 @include('pharmacy/edit_consumable')
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
      
      
      <div class="modal fade" id="add-consumable" size="600">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Add New Item to Store</h4>
              </div>
              <div class="modal-body">
                <p></p>
                            <section class="vbox">
                          <header class="header bg-light bg-gradient">
                            <ul class="nav nav-tabs nav-white">
                                <li class="active"><a href="#equitytab" data-toggle="tab">Store Item Details</a></li>
                            </ul>
                          </header>
                          <section class="scrollable">
                            <div class="tab-content">
                              <div class="tab-pane active" id="individual">
                                 <form  class="bootstrap-modal-form" data-validate="parsley" method="post" action="/save-consumable" class="panel-body wrapper-lg">
                                 @include('pharmacy/new_consumable')
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
                <h4 class="modal-title">Update Items in Store</h4>
              </div>
              <div class="modal-body">
                <p></p>
                            <section class="vbox">
                          <header class="header bg-light bg-gradient">
                            <ul class="nav nav-tabs nav-white">
                                <li class="active"><a href="#equitytab" data-toggle="tab">Consumable Details</a></li>
                            </ul>
                          </header>
                          <section class="scrollable">
                            <div class="tab-content">
                              <div class="tab-pane active" id="individual">
                                 <form  class="bootstrap-modal-form" data-validate="parsley" method="post" action="/update-consumable-details" class="panel-body wrapper-lg">
                                 @include('pharmacy/edit_consumable')
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
      
      

      <div class="modal fade text-left" id="assign-consumable" tabindex="-1" role="dialog"  aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel17">Requisition Details</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                  <form  class="bootstrap-modal-form" method="post" enctype="multipart/form-data" action="/assign-consumable" class="panel-body wrapper-lg">
                    @include('pharmacy/assign_consumable')
                  </form>
                </div>
            </div>
        </div>
      </div>
@stop

<script src="{{ asset('/event_components/jquery.min.js')}}"></script>

<script type="text/javascript">
$(function () {
  $('#add-consumable input[name="expiry_date"]').daterangepicker({
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
$(function () {
  $('#assign-consumable input[name="assigned_on"]').daterangepicker({
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

                  $('#add-consumable select[name="classification"]').select2({
                  tags: true
                  });
                  $('#add-consumable select[name="supplier"]').select2({
                  tags: true
                  });

                   $('#add-consumable select[name="supplier"]').select2({
                  tags: true
                  });
                   $('#add-consumable select[name="drug_form"]').select2({
                  tags: true
                  });
                    $('#add-consumable select[name="brand"]').select2({
                  tags: true
                  });
   



  });
</script>

<script>

function getdrugdetail(id)
{ 

  $.get("/get-consumable-detail",
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


function getdrugdetail(id)
{ 

  $.get("/get-consumable-detail",
          {"id":id},
          function(json)
          {
            

                $('#assign-consumable input[name="drugid"]').val(json.drugid);
                $('#assign-consumable input[name="drug_number"]').val(json.drug_number);
                $('#assign-consumable input[name="item_requested"]').val(json.drug_name);
                $('#assign-consumable input[name="stock"]').val(json.stock);
                $('#assign-consumable input[name="item_price"]').val(json.unit_price);

               
              
                 
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
          $.get('/delete-consumable',
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
</script>


<script>

function getdrugdetailstock(id)
{ 

  $.get("/get-consumable-detail",
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








