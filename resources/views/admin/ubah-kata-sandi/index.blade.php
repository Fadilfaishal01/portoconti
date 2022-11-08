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
          <div class="row">
               <div class="card p-4">
                    <div class="row">
                         <div class="col-md-6">
                              <form id="formUbahKataSandi">
                                   @csrf
                                   <div class="form-group">
                                        <label>Kata Sandi Baru</label>
                                        <input type="password" name="passwordBaru" id="passwordBaru" class="form-control" placeholder="Masukan Kata Sandi Baru">
                                        <div class="messageErrorValidasiKataSandi"></div>
                                   </div>
                                   <div class="form-group">
                                        <label>Konfirmasi Kata Sandi Baru</label>
                                        <input type="password" name="konfirmasiPasswordBaru" id="konfirmasiPasswordBaru" class="form-control" placeholder="Konfirmasi Kata Sandi Baru">
                                        <div class="messageErrorValidasiKonfirmasiKataSandi"></div>
                                   </div>
                                   <div class="form-group">
                                        <button class="btn btn-info text-white" type="submit"><i class="fas fa-save"></i> Simpan</button>
                                   </div>
                              </form>
                         </div>
                         <div class="col-md-6">
                              <div class="row p-4">
                                   <div class="col pr-0 align-self-center">
                                        <h4>Halo, {{ Auth::user()->getProfile->pNama }}</h4>
                                        <h5 class="text-muted">Dimohon untuk menggunakan kata sandi yang mudah diingat dan tidak memakai simbol atau karakter khusus.</h5>
                                   </div>
                                   <div class="col text-end align-self-center">
                                        <i class="fas fa-circle-info fa-4x"></i>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>

@endsection

@section('script-down')
     @include('admin.ubah-kata-sandi.script')
@endsection