<script type="text/javascript">
   const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timerProgressBar: true,
      timer: 3000,
      didOpen: (toast) => {
         toast.addEventListener('mouseenter', Swal.stopTimer)
         toast.addEventListener('mouseleave', Swal.resumeTimer)
      }
   });
   
   function NotifPermissionDenied() {
      return Toast.fire({
         icon: `error`,
         title: `Gagal`,
         html: `Anda tidak memiliki akses ke halaman tersebut!`,
         timer: `4500`,
         showConfirmButton: false,
      })
   }

   function NotifLoginError(params) {
      return Toast.fire({
         icon: `error`,
         title: `Gagal`,
         html: `Masukan email dan kata sandi yang benar!`,
         timer: `4500`,
         showConfirmButton: false,
      })
   }

   function SuccessRegistrasi() {
      return Toast.fire({
         icon: `success`,
         title: `Berhasil`,
         html: `{{ session('success') }}`,
         timer: `4500`,
         showConfirmButton: false,
      })
   }

   function RegisterGagal(params) {
      return Toast.fire({
         icon: `error`,
         title: `Gagal`,
         html: `{{ session('register') }}`,
         timer: `4500`,
         showConfirmButton: false,
      })
   }

   function successLogin() {
      return Toast.fire({
         icon: `success`,
         title: `Halo,`,
         html: `{{ session('loginSuccess') }}`,
         timer: `4500`,
         showConfirmButton: false,
      })
   }

   @if(Session::has('success'))
      SuccessRegistrasi();
   @elseif(Session::has('loginSuccess'))
      successLogin();
   @elseif(Session::has('PermissionDenied'))
      NotifPermissionDenied();
   @elseif(Session::has('loginError'))
      NotifLoginError();
   @elseif(Session::has('register'))
      RegisterGagal();
   @endif
</script>