@extends('layouts.master')
@section('noidung')
    <main class="app-content">
      {{-- <div class="app-title">
        <div>
          <h1><i class="fa fa-th-list"></i> Thêm attribute</h1>
          
        </div>
        
      </div> --}}
      <div class="col-md-4">
      <h3>Add Size</h3>
      <input type="text" name="newatt" class="newatt">
      <button type="submit" class="btn btn-success addNew"><i class="fa fa-plus" aria-hidden="true"></i>&nbsp;Add</button>
    </div>
      
      {{-- <div class="row"> --}}
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="table-responsive">
              <table class="table table-hover" id="sizes-table">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Created_at</th>
                    <th>Updated_at</th>
                    <th>Action</th>
                  </tr>
                </thead>
            
              </table>
            </div>
            </div>
          </div>
        {{-- </div> --}}
        <input type="hidden" name="" value="" placeholder=""> 
      </div>
    </main>



@endsection
@section('foot')
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript">
  $.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});
  $(function(){
    $('#sizes-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{{ asset('') }}admin/size/list',
        columns: [
        { data: 'id', name: 'id' },
        { data: 'name', name: 'name' },
        { data: 'created_at', name: 'created_at' },
        { data: 'updated_at', name: 'updated_at' },
        { data: 'action', name: 'action' }
        ]
      });


    $('.addNew').on('click', function(e){
        e.preventDefault();
        var link="{{ asset('') }}admin/size";
        
        $.ajax({
          url:link,
          type:'POST',
          data:{
            name:$('.newatt').val()
          },
          success:function(){
            toastr.success('Thêm mới thành công');
            $('#sizes-table').DataTable().ajax.reload(null, false);       
          },
          error:function(jqXHR,textStatus,errorThrown){
            if (jqXHR.responseJSON.errors.name!==undefined){
              toastr.error(jqXHR.responseJSON.errors.name[0]);
            }

          }
        });
      });

    $(document).on('click','.btn-danger',function(){
        var id=$(this).data('id');
        alert
        swal({
          title: "Bạn có muốn xóa không?",
          text: "Sau khi xóa bạn sẽ không thể khôi phục được tệp!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
        .then((willDelete) => {
          if (willDelete) {
            $.ajax({
              type: 'delete',
              url: "{{ asset('') }}admin/size/"+id,
              success: function(response){
                $('#sizes-table').DataTable().ajax.reload(null, false);
              }
            }); 
            swal("Tệp của bạn đã được xóa!", {
              icon: "success",
            });
          } else {
            swal("Hủy xóa thành công!!");
          }
        });
      });


  });
</script>

@endsection