@extends('layouts.default')
@section('content')
        <section id="content">
          <section class="hbox stretch">
          <aside class="aside-md bg-white b-r" id="subNav">
              <div class="wrapper b-b header">Setting Manager</div>
              <ul class="nav">
            
                <li class="b-b b-light"><a href="/service-charges"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i> Service Charges</a></li>
                <li class="b-b b-light"><a href="/insurance-company"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i> Health Insurance</a></li>

                 <li class="b-b b-light"><a href="/insurance-packages"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i> Health Packages / Plans </a></li>
                 
                 <li class="b-b b-light"><a href="/registered-companies"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i> Corporate Clients </a></li>
                <li class="b-b b-light"><a href=""><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Visit Types</a></li>
                <li class="b-b b-light"><a href="/complaints"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Complaint Types </a></li>
                <li class="b-b b-light"><a href="#"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i> Patient History</a></li>
                <li class="b-b b-light"><a href="/departments"><i class="fa fa-chevron-right pull-right m-t-xs text-xs icon-muted"></i>Departments</a></li>
              
              </ul>
            </aside>
            <aside>

              <section class="vbox">
                <header class="header bg-white b-b clearfix">
                  <div class="row m-t-sm">
                    <div class="col-sm-8 m-b-xs">
                    <a href="#" data-toggle="modal" class="btn btn-sm btn-default"><i class="fa fa-print"></i> Print List</a>
                     <span class="badge badge-info">Record(s) Found :  {{ $items->total() }} {{ str_plural('Insurer', $items->total()) }}</span>
                    </div>

                  <form action="/#" method="GET">
                    <div class="col-sm-4 m-b-xs">
                      <div class="input-group">
                        <input type="text" name='search' id='search' class="input-sm form-control" placeholder="Search ...">
                        <span class="input-group-btn">
                          <button class="btn btn-sm btn-default" type="submit">Go!</button>
                        </span>
                      </div>
                    </div>
                     </form>
                    </div>
            
                </header>
                <section class="scrollable wrapper w-f">
                  <section class="panel panel-default">
                  <header class="panel-heading font-bold">Insurance Company
                                 <a href="#new-item" class="bootstrap-modal-form-open" data-toggle="modal"><span class="badge bg-info pull-right">+</span></a>
                                </header>
                    <div class="table-responsive">
                      <table class="table table-striped m-b-none text-sm" width="100%">
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
                          @foreach( $items as $key => $item )
                             <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->contactperson }}</td>
                            <td>{{ $item->created_on }}</td>
                            <td><a href="#" class="bootstrap-modal-form-open" onclick="deleteDetails('{{ $item->id }}','{{ $item->name }}')"  id="edit" name="edit" data-toggle="modal" alt="edit"><i class="fa fa-trash"></i></a>
                            </td></tr>
                         @endforeach 
                        </tbody>
 
                      </table>
                    </div>
                  </section>
                </section>
                <footer class="footer bg-white b-t">
                  <div class="row text-center-xs">
                    <div class="col-md-6 hidden-sm">
                      <p class="text-muted m-t">
                      </p>
                    </div>
                    <div class="col-md-6 col-sm-12 text-right text-center-xs">                
                     
                        {!!$items->render()!!}
                        
                    </div>
                  </div>
                </footer>
              </section>
            </aside>
          </section>
          <a href="#" class="hide nav-off-screen-block" data-toggle="class:nav-off-screen" data-target="#nav"></a>
        </section>
@stop








