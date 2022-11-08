<script type="text/javascript">
   const table = $('#tablePendidikan').DataTable({
      processing: true,
      serverSide: true,
      searching: true,
      ajax: {
         url: '{{ route("master-data.pendidikan.index") }}',
         type: 'GET',
      },
      columns: [
         {data: null, orderable: true, searchable: true, defaultContent: ''},
         {data: 'pddkTempat', name: 'pddkTempat', orderable: true, searchable: true, defaultContent: ''},
         {data: 'action', name: 'action', orderable: true, searchable: true, defaultContent: ''},
      ],
      columnDefs: [
         {targets: 0, searchable: false, orderable: false},
      ],
   });

   table.on('draw.dt', function () {
      var PageInfo = $("#tablePendidikan").DataTable().page.info();

      table.column(0, { page: 'current' }).nodes().each( function (cell, i) {
         cell.innerHTML = i + 1 + PageInfo.start;
      });
   })
</script>