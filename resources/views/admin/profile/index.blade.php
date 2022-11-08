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
                              <form id="formUbahProfile">
                                   @csrf
                                   <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" name="email" id="email" class="form-control" placeholder="Masukan Email" value="{{ Auth::user()->email }}" readonly>
                                   </div>
                                   <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama" value="{{ Auth::user()->getProfile->pNama }}">
                                   </div>
                                   <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="text" name="tanggalLahir" id="tanggalLahir" class="form-control" placeholder="Masukan Tangga Lahir" value="{{ (Auth::user()->getProfile->pTanggalLahir != 'null') ? Auth::user()->getProfile->pTanggalLahir : '' }}">
                                   </div>
                                   <div class="form-group">
                                        <label>Telepon</label>
                                        <input type="text" name="telepon" id="telepon" class="form-control" placeholder="Masukan Nomor Telepon" value="{{ (Auth::user()->getProfile->pTelepon != 'null') ? Auth::user()->getProfile->pTelepon : '' }}">
                                   </div>
                                   <div class="form-group">
                                        <label>Jenis Kelamin</label>
                                        <select name="jenisKelamin" id="jenisKelamin" class="form-control">
                                             <option value="0" disabled>- Pilih Jenis Kelamin -</option>
                                             <option value="L" @if(Auth::user()->getProfile->pJenisKelamin == 'L') selected @endif>Laki - Laki</option>
                                             <option value="P" @if(Auth::user()->getProfile->pJenisKelamin == 'P') selected @endif>Perempuan</option>
                                        </select>
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
                                        <h5 class="text-muted">Selamat datang di Aplikasi Contiporto, Silahkan lengkapi data profile yang belum lengkap.</h5>
                                   </div>
                                   <div class="col text-end align-self-center">
                                        <i class="fas fa-users fa-4x"></i>
                                   </div>
                              </div>
                         </div>
                    </div>
               </div>
          </div>
     </div>

@endsection

@section('script-down')
     @include('admin.profile.script')
@endsection