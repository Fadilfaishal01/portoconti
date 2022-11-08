@extends('layouts.login')

@section('login')
<div class="main-wrapper">
   <!-- -------------------------------------------------------------- -->
   <!-- Preloader - style you can find in spinners.css -->
   <!-- -------------------------------------------------------------- -->
   <div class="preloader">
      <div class="lds-ripple">
          <div class="lds-pos"></div>
          <div class="lds-pos"></div>
      </div>
  </div>
   <!-- -------------------------------------------------------------- -->
   <!-- Preloader - style you can find in spinners.css -->
   <!-- -------------------------------------------------------------- -->
   <!-- -------------------------------------------------------------- -->
   <!-- Login box.scss -->
   <!-- -------------------------------------------------------------- -->
   <div class="row auth-wrapper gx-0">
      <div class="col-lg-4 col-xl-3 bg-info auth-box-2 on-sidebar">
         <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="row justify-content-center text-center">
               <div class="col-md-7 col-lg-12 col-xl-9">
                  <div>
                     <span class="db"
                     ><img src="../../assets/images/logo-light-icon.png" alt="logo"
                     /></span>
                     <span class="db"
                     ><img src="{{ asset('assets/images/logo-siarsi.png') }}" alt="logo" width="80px"
                     /></span>
                  </div>
                  <h2 class="text-white mt-4 fw-light">
                     Build
                     <span class="font-weight-medium">Fast & Responsive</span> Web
                     Portofolio with Contiporto
                  </h2>
                  <p class="op-5 text-white fs-4 mt-4">
                     Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                     do eiusmod tempor incididunt.
                  </p>
               </div>
            </div>
         </div>
      </div>
      <div class="col-lg-8 col-xl-9 d-flex align-items-center justify-content-center">
         <div class="row justify-content-center w-100 mt-4 mt-lg-0">
            <div class="col-lg-6 col-xl-3 col-md-7">
               <div class="card" id="registerform">
                  <div class="card-body">
                     <h2>Sign Up Form</h2>
                     <p class="text-muted fs-4">
                     Enter given details for new account
                     </p>
                     <form class="form-horizontal mt-4 pt-4 needs-validation" novalidate id="formRegistrasi" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                           <input
                              type="text"
                              class="form-control form-input-bg"
                              id="registrasiFullname"
                              placeholder="john deo"
                              required
                              name="fullname"
                           />
                           <label for="tb-rfname">Full Name</label>
                           <div class="messageErrorValidasiFullnameRegistrasi"></div>
                        </div>
                        <div class="form-floating mb-3">
                           <input
                              type="email"
                              class="form-control form-input-bg"
                              id="registrasiEmail"
                              placeholder="contiporto@gmail.com"
                              required
                              name="emailRegister"
                           />
                           <label for="registrasiEmail">Email</label>
                           <div class="messageErrorValidasiEmailRegistrasi"></div>
                        </div>
                        <div class="form-floating mb-3">
                           <input
                              type="password"
                              class="form-control form-input-bg"
                              id="registrasiPassword"
                              placeholder="*****"
                              required
                              name="passwordRegister"
                           />
                           <label for="registrasiPassword">Password</label>
                           <div class="messageErrorValidasiPasswordRegistrasi"></div>
                        </div>
                        <div class="form-floating mb-3">
                           <input
                              type="password"
                              class="form-control form-input-bg"
                              id="registrasiPasswordKonfirmasi"
                              placeholder="*****"
                              required
                              name="passwordKonfirmasiRegister"
                           />
                           <label for="registrasiPasswordKonfirmasi">Confirm Password</label>
                           <div class="messageErrorValidasiPasswordKKonfirmasiRegistrasi"></div>
                        </div>
                        <div class="d-flex align-items-stretch button-group">
                           <button type="submit" class="btn btn-info btn-lg px-4">
                              Submit
                           </button>
                           <a
                              href="javascript:void(0)"
                              id="to-login2"
                              class="
                              btn btn-lg btn-light-secondary
                              text-secondary
                              font-weight-medium
                              "
                              >Cancel</a
                           >
                        </div>
                     </form>
                  </div>
               </div>
               <div class="card" id="loginform">
                  <div class="card-body">
                     <h2>Welcome to Contiporto</h2>
                     <p class="text-muted fs-4"> New Here? <a href="javascript:void(0)" id="to-register">Create an account</a></p>
                     <form class="form-horizontal mt-4 pt-4 needs-validation" method="POST" id="formLogin" novalidate>
                        @csrf
                        <div class="form-floating mb-3">
                           <input
                              type="email"
                              class="form-control form-input-bg"
                              id="loginEmail"
                              placeholder="name@example.com"
                              name="email"
                              required
                           />
                           <label for="loginEmail">Email</label>
                           <div class="messageErrorValidasiEmailLogin"></div>
                        </div>
                        <div class="form-floating mb-3">
                           <input
                              type="password"
                              class="form-control form-input-bg"
                              id="loginPassword"
                              placeholder="*****"
                              name="password"
                              required
                           />
                           <label for="text-password">Password</label>
                           <div class="messageErrorValidasiPasswordLogin"></div>
                        </div>

                        <div class="d-flex align-items-center mb-3">
                           <div class="ms-auto">
                              <a
                              href="javascript:void(0)"
                              id="to-recover"
                              class="fw-bold"
                              >Forgot Password?</a
                              >
                           </div>
                        </div>
                        <div class="d-flex align-items-stretch button-group mt-4 pt-2">
                           <button type="submit" class="btn btn-info btn-lg px-4">
                              Sign in
                           </button>
                           <a
                           href="{{ route('loginGoogle') }}" 
                              class="
                              btn btn-lg btn-light-danger
                              text-danger
                              d-flex
                              align-items-center
                              justify-content-center
                              font-weight-medium
                              "
                              ><i class="fa fa-google"></i
                           ></a>
                           <a
                              href="{{ route('redirectFacebook') }}"
                              class="
                              btn btn-lg btn-light-info
                              text-info
                              d-flex
                              align-items-center
                              justify-content-center
                              font-weight-medium
                              "
                              ><i class="fa fa-facebook"></i
                           ></a>
                        </div>
                     </form>
                  </div>
               </div>
               <div class="card" id="recoverform">
                  <div class="card-body">
                     <div class="logo">
                        <h3>Recover Password</h3>
                        <p class="text-muted fs-4">
                           Enter your Email and instructions will be sent to you!
                        </p>
                     </div>
                     <div class="mt-4 pt-4">
                        <!-- Form -->
                        <form action="#">
                           <!-- email -->
                           <div class="mb-4 pb-2">
                              <div class="form-floating">
                              <input
                                 class="form-control form-input-bg"
                                 type="email"
                                 required=""
                                 placeholder="Email address"
                              />
                              <label>Email</label>
                              </div>
                           </div>
                           <div class="d-flex align-items-stretch button-group">
                              <button type="submit" class="btn btn-info btn-lg px-4">Submit</button>
                              <a href="javascript:void(0)" id="to-login" class="btn btn-lg btn-light-secondary text-secondary font-weight-medium">Cancel</a>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- -------------------------------------------------------------- -->
   <!-- Login box.scss -->
   <!-- -------------------------------------------------------------- -->
 </div>
@endsection

@section('script-down')
   <script type="text/javascript">
      @if(Session::has('errorLogin'))
         return Toast.fire({
            title: `Gagal`,
            icon: `error`,
            html: `{{ session('errorLogin') }}`,
            timer: `5000`,
            showConfirmButton: false,
         });
      @endif

      $(".preloader").fadeOut();

      // ---------------------------
      // Login and Recover Password
      // ---------------------------
      $("#to-recover").on("click", function () {
         $("#loginform").hide();
         $("#recoverform").fadeIn();
      });

      $("#to-login").on("click", function () {
         $("#loginform").fadeIn();
         $("#recoverform").hide();
      });

      $("#to-register").on("click", function () {
         $("#loginform").hide();
         $("#registerform").fadeIn();
      });

      $("#to-login2").on("click", function () {
         $("#loginform").fadeIn();
         $("#registerform").hide();
      });

      // Auth Login
      $('#formLogin').submit(function(e) {
         $('#loginEmail').removeClass('is-invalid');
         $('#loginPassword').removeClass('is-invalid');
         $('.messageErrorValidasiEmailLogin').html('');
         $('.messageErrorValidasiPasswordLogin').html('');

         e.preventDefault();
         let formData = new FormData(this);

         $.ajax({
            type: 'POST',
            url : "{{ route('authLogin') }}",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
               Toast.fire({
                  title: `${data.title}`,
                  icon: `${data.status}`,
                  html: `${data.message}`,
                  timer: `${data.timer}`,
                  showConfirmButton: false,
               });

               setTimeout(() => {
                  window.location.href = "{{ route('dashboard.index') }}";
               }, data.timer + 500);
            },
            error: function(data) {
               $.each(data.responseJSON.errorValidasi, function(kData, vData) {
                  if (kData == 'email') {
                     $('#loginEmail').addClass('is-invalid');
                     $('.messageErrorValidasiEmailLogin').html(`
                        <span class="text-danger">${vData[0]}</span>
                     `);
                  }

                  if (kData == 'password') {
                     $('#loginPassword').addClass('is-invalid');
                     $('.messageErrorValidasiPasswordLogin').html(`
                        <span class="text-danger">${vData[0]}</span>
                     `);
                  }
               })

               Toast.fire({
                  title: `${data.responseJSON.title}`,
                  icon: `${data.responseJSON.status}`,
                  html: `${data.responseJSON.message}`,
                  timer: `${data.responseJSON.timer}`,
                  showConfirmButton: false,
               });
            }
         })
      })

      // Auth Registrasi
      $('#formRegistrasi').submit(function(e) {
         $('#registrasiFullname').removeClass('is-invalid');
         $('#registrasiEmail').removeClass('is-invalid');
         $('#registrasiPassword').removeClass('is-invalid');
         $('#registrasiPasswordKonfirmasi').removeClass('is-invalid');
         $('.messageErrorValidasiFullnameRegistrasi').html('');
         $('.messageErrorValidasiEmailRegistrasi').html('');
         $('.messageErrorValidasiPasswordRegistrasi').html('');
         $('.messageErrorValidasiPasswordKKonfirmasiRegistrasi').html('');

         e.preventDefault();
         let formData = new FormData(this);

         $.ajax({
            type: 'POST',
            url : "{{ route('registerAccount') }}",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
               $("#loginform").fadeIn();
               $("#recoverform").hide();
               $("#registerform").hide();
               Toast.fire({
                  title: `${data.title}`,
                  icon: `${data.status}`,
                  html: `${data.message}`,
                  timer: `${data.timer}`,
                  showConfirmButton: false,
               });
            },
            error: function(data) {
               $.each(data.responseJSON.errorValidasi, function(kData, vData) {
                  if (kData == 'fullname') {
                     $('#registrasiFullname').addClass('is-invalid');
                     $('.messageErrorValidasiFullnameRegistrasi').html(`
                        <span class="text-danger">${vData[0]}</span>
                     `);
                  }

                  if (kData == 'emailRegister') {
                     $('#registrasiEmail').addClass('is-invalid');
                     $('.messageErrorValidasiEmailRegistrasi').html(`
                        <span class="text-danger">${vData[0]}</span>
                     `);
                  }

                  if (kData == 'passwordRegister') {
                     $('#registrasiPassword').addClass('is-invalid');
                     $('.messageErrorValidasiPasswordRegistrasi').html(`
                        <span class="text-danger">${vData[0]}</span>
                     `);
                  }

                  if (kData == 'passwordKonfirmasiRegister') {
                     $('#registrasiPasswordKonfirmasi').addClass('is-invalid');
                     $('.messageErrorValidasiPasswordKKonfirmasiRegistrasi').html(`
                        <span class="text-danger">${vData[0]}</span>
                     `);
                  }
               })

               Toast.fire({
                  title: `${data.responseJSON.title}`,
                  icon: `${data.responseJSON.status}`,
                  html: `${data.responseJSON.message}`,
                  timer: `${data.responseJSON.timer}`,
                  showConfirmButton: false,
               });
            }
         })
      })

   </script>
@endsection