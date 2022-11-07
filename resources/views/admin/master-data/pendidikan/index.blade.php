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
                     <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                     <li class="breadcrumb-item active" aria-current="page"><?php echo $title ?></li>
                  </ol>
               </nav>
            </div>
         </div>
      </div>
   </div>
   
   <div class="container-fluid">
      <div class="card p-2">
         <div class="table-responsive">
            <table class="table table-striped" id="tablePendidikan">
               <thead class="text-center tableHeader text-white">
                  <td>#</td>
                  <td>Tempat Pendidikan</td>
                  <td>Action</td>
               </thead>
               <tbody>

               </tbody>
            </table>
         </div>
      </div>
   </div>

@endsection

@section('script-down')
   @include('admin.master-data.pendidikan.script')
@endsection