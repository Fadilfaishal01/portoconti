<script type="text/javascript">
   const table = $('#tableHobi').DataTable({
      processing: true,
      serverSide: true,
      searching: true,
      ajax: {
         url: '{{ route("master-data.hobi.index") }}',
         type: 'GET',
      },
      columns: [
         {data: null, orderable: false, searchable: false, defaultContent: ''},
         {data: 'hLogo', name: 'hLogo', orderable: false, searchable: false, defaultContent: ''},
         {data: 'hNama', name: 'hNama', orderable: true, searchable: true, defaultContent: ''},
         {data: 'hobiStatus', name: 'hobiStatus', orderable: false, searchable: false, defaultContent: ''},
         {data: 'action', name: 'action', orderable: false, searchable: false, defaultContent: ''},
      ],
      columnDefs: [
         {targets: 0, searchable: false, orderable: false},
      ],
   });

   table.on('draw.dt', function () {
      var PageInfo = $("#tableHobi").DataTable().page.info();

      table.column(0, { page: 'current' }).nodes().each( function (cell, i) {
         cell.innerHTML = i + 1 + PageInfo.start;
      });
   })

   function tambahData() {
      $('#modal_add').modal('show');
      $('#modal-title').text('Tambah Data Hobi');
      $('#status').prop('checked', false);
      $('#nama').val('');
      $('#logo').val('');
   }

   function closeModal() {
      $('#modal_add').modal('hide');
   }

   function editData(id) {
      $.ajax({
         type: 'POST',
         url : `{{ route('master-data.hobi.getDataById') }}`,
         data: {
            _token: "{{ csrf_token() }}",
            id: id
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
            $('#modal-title').text('Ubah Data Hobi');
            $('#idHobi').val(data.hId);
            $('#nama').val(data.hNama);
            $('#logo').val(data.hLogo);

            if (data.hStatus == 0) {
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

   function deleteData(id) {
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
               url: '{{ route("master-data.hobi.delete") }}',
               data: {
                  _token: "{{ csrf_token() }}",
                  id : id
               },
               beforeSend: function(data) {
                  Swal.fire({
                     html: `Memproses Data...`,
                     showConfirmButton: false,
                  })
               },
               success: function(data) {
                  Toast.fire({
                     icon  : `${data.status}`,
                     title : `${data.title}`,
                     html  : `${data.message}`,
                     timer : `${data.timer}`,
                     showConfirmButton: false,
                  })

                  table.ajax.reload();
               },
               error: function (data) {
                  Swal.fire({
                     title : `${data.responseJSON.title}`,
                     icon  : `${data.responseJSON.status}`,
                     html  : `${data.responseJSON.message}`,
                     timer : `${data.responseJSON.timer}`,
                     showConfirmButton: false,
                  });
               }
            })
         }
      })
   }

   $(document).ready(function() {

      $('#saveHobi').submit(function(e) {
         e.preventDefault();

         let formData = new FormData(this);

         $.ajax({
            type: 'POST',
            url : "{{ route('master-data.hobi.saveOrUpdate') }}",
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
                  title : `${data.title}`,
                  icon  : `${data.status}`,
                  html  : `${data.message}`,
                  timer : `${data.timer}`,
                  showConfirmButton: false,
               });

               $('#modal_add').modal('hide');
               table.ajax.reload();
            },
            error: function(data) {
               Swal.close();
               if (data.status == 400) {
                  Toast.fire({
                     title : 'Gagal',
                     icon  : 'error',
                     html  : `Terjadi Kegagalan Validasi!`,
                     timer : 3000,
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
                     title : `${data.responseJSON.title}`,
                     icon  : `${data.responseJSON.status}`,
                     html  : `${data.responseJSON.message}`,
                     timer : `${data.responseJSON.timer}`,
                     showConfirmButton: false,
                  });
               }
            }
         })
      })
   })
</script>