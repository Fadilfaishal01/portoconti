<script type="text/javascript">
   const table = $('#tableKemampuan').DataTable({
      processing: true,
      serverSide: true,
      searching: true,
      ajax: {
         url: '{{ route("master-data.kemampuan.index") }}',
         type: 'GET',
      },
      columns: [
         {data: null, orderable: false, searchable: false, defaultContent: ''},
         {data: 'sLogo', name: 'sLogo', orderable: false, searchable: false, defaultContent: ''},
         {data: 'sNama', name: 'sNama', orderable: true, searchable: true, defaultContent: ''},
         {data: 'kemampuanStatus', name: 'kemampuanStatus', orderable: false, searchable: false, defaultContent: ''},
         {data: 'action', name: 'action', orderable: false, searchable: false, defaultContent: ''},
      ],
      columnDefs: [
         {targets: 0, searchable: false, orderable: false},
      ],
   });

   table.on('draw.dt', function () {
      var PageInfo = $("#tableKemampuan").DataTable().page.info();

      table.column(0, { page: 'current' }).nodes().each( function (cell, i) {
         cell.innerHTML = i + 1 + PageInfo.start;
      });
   })

   function tambahData() {
      $('#modal_add').modal('show');
      $('#modal-title').text('Tambah Data Kemampuan');
      $('#status').prop('checked', false);
      $('#nama').val('');
   }

   function closeModal() {
      $('#modal_add').modal('hide');
   }

   function editData(idKemampuan) {
      $.ajax({
         type: 'POST',
         url : `{{ route('master-data.kemampuan.getDataById') }}`,
         data: {
            _token: "{{ csrf_token() }}",
            id: idKemampuan
         },
         beforeSend: function(data) {
            Swal.fire({
               html: `Memuat Data...`,
               showConfirmButton: false,
            })
         },
         success: function(data) {
            Swal.close();
            $('#modal_add').modal('show');
            $('#modal-title').text('Ubah Data Kemampuan');
            $('#idKemampuan').val(data.sId);
            $('#nama').val(data.sNama);

            if (data.sStatus == 0) {
               $('#status').prop('checked', true);
            } else {
               $('#status').prop('checked', false);
            }
         },
         error: function(data) {
            Swal.close();
            Swal.fire({
               title: `${data.responseJSON.title}`,
               icon: `${data.responseJSON.status}`,
               html: `${data.responseJSON.message}`,
               timer: `${data.responseJSON.timer}`,
               showConfirmButton: false,
            });
         }
      })
   }

   function deleteData(idKemampuan) {
      Swal.fire({
         title: 'Anda Yakin?',
         text: "Anda Ingin Menghapus Data Ini ?",
         icon: 'warning',
         showCancelButton: true,
         confirmButtonColor: '#3085d6',
         cancelButtonColor: '#d33',
         confirmButtonText: `Ya, saya yakin!`
      }).then((result) => {
         if (result.isConfirmed) {
            $.ajax({
               type: 'POST',
               url: '{{ route("master-data.kemampuan.delete") }}',
               data: {
                  _token: "{{ csrf_token() }}",
                  id : idKemampuan
               },
               beforeSend: function(data) {
                  Swal.fire({
                     html: `Memproses Data...`,
                     showConfirmButton: false,
                  })
               },
               success: function(data) {
                  Toast.fire({
                     icon: `${data.status}`,
                     title: `${data.title}`,
                     html: `${data.message}`,
                     timer: `${data.timer}`,
                     showConfirmButton: false,
                  })

                  table.ajax.reload();
               },
               error: function (data) {
                  Swal.fire({
                     title: `${data.responseJSON.title}`,
                     icon: `${data.responseJSON.status}`,
                     html: `${data.responseJSON.message}`,
                     timer: `${data.responseJSON.timer}`,
                     showConfirmButton: false,
                  });
               }
            })
         }
      })
   }

   $(document).ready(function() {

      $('#saveKemampuan').submit(function(e) {
         e.preventDefault();

         let formData = new FormData(this);

         $.ajax({
            type: 'POST',
            url : "{{ route('master-data.kemampuan.saveOrUpdate') }}",
            data: formData,
            contentType: false,
            processData: false,
            beforeSend: function(data) {
               Swal.fire({
                  html: `Memproses Data...`,
                  showConfirmButton: false,
               })
            },
            success: function(data) {
               Swal.close();
               Toast.fire({
                  title: `${data.title}`,
                  icon: `${data.status}`,
                  html: `${data.message}`,
                  timer: `${data.timer}`,
                  showConfirmButton: false,
               });

               $('#modal_add').modal('hide');
               table.ajax.reload();
            },
            error: function(data) {
               Swal.close();
               if (data.status == 400) {
                  Toast.fire({
                     title: 'Gagal',
                     icon: 'error',
                     html: `Terjadi Kegagalan Validasi!`,
                     timer: 3000,
                     showConfirmButton: false,
                  })       

                  $.each(data.responseJSON, function(kData, vData) {
                     if(kData == 'logo') {
                        $('.messageValidasiLogo').html(`<span class="text-danger">${vData}</span>`)
                        $('#logo').addClass('is-invalid');
                     }

                     if (kData == 'nama') {
                        $('.messageValidasiNama').html(`<span class="text-danger">${vData}</span>`)
                        $('#nama').addClass('is-invalid');
                     }
                  })
               } else {
                  Toast.fire({
                     title: `${data.responseJSON.title}`,
                     icon: `${data.responseJSON.status}`,
                     html: `${data.responseJSON.message}`,
                     timer: `${data.responseJSON.timer}`,
                     showConfirmButton: false,
                  });
               }
            }
         })

      })
   })
</script>