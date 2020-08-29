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
                                          <i class="feather icon-user-check mr-25"></i><span class="d-none d-sm-block">Expired List</span>
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
                                                                     
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                  @foreach($drugs as $drug )
                                                                  <tr>
                                                                    <tr>
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
                                                                    <td>{{ $drug->expiry_date }}</td>
                                                                    
                                                                    
                                                                      @role(['Pharmacist','System Admin']) 
                                        
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



@stop









