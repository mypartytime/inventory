$(function(){
  $(document).on('click','#delete',function(e){
      e.preventDefault();
      var link = $(this).attr("href");


                Swal.fire({
                  title: 'คุณแน่ใจที่ต้องการลบใช่หรือไม่?',
                  text: "ทำการลบ?",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'ใช่ ลบทันที'
                }).then((result) => {
                  if (result.isConfirmed) {
                    window.location.href = link
                    Swal.fire(
                      'ลบเรียบร้อย!',
                      'ข้อมูลถูกลบเรียบร้อย.',
                      'success'
                    )
                  }
                }) 


  });

});