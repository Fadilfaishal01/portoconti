@extends('layouts.admin')

@section('main-content')
     <div class="page-breadcrumb">
          <div class="row align-items-center">
               <div class="col-md-6 col-8 align-self-center">
                    <h3 class="page-title mb-0 p-0"><?php echo $title; ?></h3>
                    <div class="d-flex align-items-center">
                         <nav aria-label="breadcrumb">
                              <ol class="breadcrumb">
                                   <li class="breadcrumb-item"><a href="#">Contiporto</a></li>
                                   <li class="breadcrumb-item active" aria-current="page"><?php echo $title ?></li>
                              </ol>
                         </nav>
                    </div>
               </div>
          </div>
     </div>
     
     <div class="container-fluid">
          Ini dashboard
     </div>

@endsection

@section('script-down')
     @include('admin.dashboard.script')
@endsection