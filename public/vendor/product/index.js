

$(function () {
    $(document).on("click",".action_delete",function() {
        event.preventDefault();
        let urlRequest = $(this).data('url');
        let requestData = $(this).data();
        let that = $(this);
        Swal.fire({
            title: 'Are you sure?',
            text: "Bạn có muốn xóa sản phẩm "+requestData.toggle.name,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {

            if (result.value){
                $.ajax({
                    type:'GET',
                    url: urlRequest,
                    success: function (data) {
                        if (data.code == 200){
                            //delete bằng ajax với $(this) gán bằng biến that và lùi cấp html tại vị trí button delete
                            that.parent().parent().remove();
                            if (result.isConfirmed) {
                                Swal.fire(
                                    'Deleted!',
                                    'Your file has been deleted.',
                                    'success'
                                )
                            }
                        }
                    },
                    error: function (data) {

                    }
                });
            }


        })
    });
    $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
    });
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
    });

});
