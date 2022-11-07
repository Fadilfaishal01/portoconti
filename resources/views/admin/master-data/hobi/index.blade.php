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
            <table class="table table-striped" id="tableHobi">
               <thead class="tableHeader text-white">
                  <td>#</td>
                  <td>Logo</td>
                  <td>Hobi</td>
                  <td>Status</td>
                  <td>
                     <button class="btn btn-danger text-white" onclick="tambahData()"><i class="fas fa-circle-plus"></i> Tambah Hobi</button>
                  </td>
               </thead>
               <tbody>

               </tbody>
            </table>
         </div>
      </div>
   </div>

   <div class="modal fade" id="modal_add">
      <div class="modal-dialog modal-lg" style="min-width: 90%">
         <div class="modal-content">
            <div class="modal-header">
               <h4 class="modal-title" id="modal-title"></h4>
            </div>
            <div class="modal-body">
               <form id="saveHobi" autocomplete="off">
               <input type="hidden" name="idHobi" id="idHobi">
               @csrf
               <div class="form-group">
                  <label>Nama Hobi</label>
                  <input type="text" name="nama" class="form-control nama" id="nama" placeholder="Masukan Nama Hobi">
                  <div class="messageValidasiNama"></div>
               </div>
               <div class="form-group">
                  <label>Logo Hobi</label>
                  {{-- <input type="file" name="logo" class="form-control logo" id="logo"> --}}
                  <input type="text" name="logo" class="form-control logo" id="logo">
                  <div class="messageValidasiLogo"></div>
               </div>
               <div class="logo-hobi">

               </div>
            </div>
            <div class="modal-footer d-flex justify-content-between">
               <div class="form-check form-check-inline">
                  <input
                     class="form-check-input"
                     type="checkbox"
                     name="status"
                     id="status"
                  />
                  <label class="form-check-label" for="status">Status Hobi</label>
               </div>
               <div class="col-md-6 d-flex justify-content-end">
                  <button type="button" onclick="closeModal()" class="btn btn-danger text-white" style="margin-right: 5px;"><i class="fa fa-times"></i> Tutup</button>
                  <button type="submit" class="btn btn-primary"><i class="fa fa-save text-white"></i> Simpan</button>
               </div>
               </form>
            </div>
         </div>
      </div>
 </div>


@endsection

@section('script-down')
   @include('admin.master-data.hobi.script')
@endsection