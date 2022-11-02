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
                     <form class="form-horizontal mt-4 pt-4 needs-validation" novalidate action="{{ route('registerAccount') }}" method="POST">
                        @csrf
                        <div class="form-floating mb-3">
                           <input
                              type="text"
                              class="form-control form-input-bg @if($errors->register->first('fullname')) is-invalid @endif"
                              id="tb-rfname"
                              placeholder="john deo"
                              required
                              name="fullname"
                           />
                           <label for="tb-rfname">Full Name</label>
                           @if($errors->register->first('fullname'))
                              <div class="invalid-feedback">{{ $errors->register->first('fullname') }}</div>
                           @endif
                        </div>
                        <div class="form-floating mb-3">
                           <input
                              type="email"
                              class="form-control form-input-bg @if($errors->register->first('emailRegister')) is-invalid @endif"
                              id="tb-remail"
                              placeholder="john@gmail.com"
                              required
                              name="emailRegister"
                           />
                           <label for="tb-remail">Email</label>
                           @if($errors->register->first('emailRegister'))
                              <div class="invalid-feedback">{{ $errors->register->first('emailRegister') }}</div>
                           @endif
                        </div>
                        <div class="form-floating mb-3">
                           <input
                              type="password"
                              class="form-control form-input-bg @if($errors->register->first('passwordRegister')) is-invalid @endif"
                              id="text-rpassword"
                              placeholder="*****"
                              required
                              name="passwordRegister"
                           />
                           <label for="text-rpassword">Password</label>
                           @if($errors->register->first('passwordRegister'))
                              <div class="invalid-feedback">{{ $errors->register->first('passwordRegister') }}</div>
                           @endif
                        </div>
                        <div class="form-floating mb-3">
                           <input
                              type="password"
                              class="form-control form-input-bg @if($errors->register->first('passwordKonfirmasiRegister')) is-invalid @endif"
                              id="text-rcpassword"
                              placeholder="*****"
                              required
                              name="passwordKonfirmasiRegister"
                           />
                           <label for="text-rcpassword">Confirm Password</label>
                           @if($errors->register->first('passwordKonfirmasiRegister'))
                              <div class="invalid-feedback">{{ $errors->register->first('passwordKonfirmasiRegister') }}</div>
                           @endif
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
                     <form class="form-horizontal mt-4 pt-4 needs-validation" method="POST" novalidate action="{{ route('authLogin') }}">
                        @csrf
                        <div class="form-floating mb-3">
                           <input
                              type="email"
                              class="form-control form-input-bg @if($errors->login->first('email')) is-invalid @endif"
                              id="tb-email"
                              placeholder="name@example.com"
                              name="email"
                              required
                           />
                           <label for="tb-email">Email</label>
                           @if($errors->login->first('email'))
                              <div class="invalid-feedback">{{ $errors->login->first('email') }}</div>
                           @endif
                        </div>
                        <div class="form-floating mb-3">
                           <input
                              type="password"
                              class="form-control form-input-bg @if($errors->login->first('password')) is-invalid @endif"
                              id="text-password"
                              placeholder="*****"
                              name="password"
                              required
                           />
                           <label for="text-password">Password</label>
                           @if($errors->login->first('password'))
                              <div class="invalid-feedback">{{ $errors->login->first('password') }}</div>
                           @endif
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
                              href="javascript:void(0)"
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
                              href="javascript:void(0)"
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
                              <label for="tb-email">Email</label>
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
      $(".preloader").fadeOut();
      
      @if(Session::has('register'))
         $("#loginform").hide();
         $("#registerform").fadeIn();
      @endif
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

      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function () {
         "use strict";

         // Fetch all the forms we want to apply custom Bootstrap validation styles to
         var forms = document.querySelectorAll(".needs-validation");

         // Loop over them and prevent submission
         Array.prototype.slice.call(forms).forEach(function (form) {
            form.addEventListener(
               "submit",
               function (event) {
                  if (!form.checkValidity()) {
                     event.preventDefault();
                     event.stopPropagation();
                  }

                  form.classList.add("was-validated");
               },
               false
            );
         });
      })();
   </script>
@endsection