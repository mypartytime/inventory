@extends('admin.admin_master')
@section('admin')

<script src="{{asset('backend/assets/js/jquery.min.js')}}"></script>


<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">เพิ่มข้อมูลผู้ขาย </h4><br><br>



            <form id= "myForm" method="post" action="{{ route('update.password') }}" >
                @csrf

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">ชื่อผู้ขาย </label>
                <div class="col-sm-10 form-group">
                    <input name="name" class="form-control" type="text"    >
                </div>
            </div>
            <!-- end row -->


              <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">เบอร์โทรติดต่อ </label>
                <div class="col-sm-10 form-group">
                    <input name="mobile_no" class="form-control" type="text"    >
                </div>
            </div>
            <!-- end row -->


  <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">อีเมลล์ </label>
                <div class="col-sm-10 form-group">
                    <input name="email" class="form-control" type="email"  >
                </div>
            </div>
            <!-- end row -->


  <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">ที่อยู่ </label>
                <div class="col-sm-10 form-group">
                    <input name="address" class="form-control" type="text"  >
                </div>
            </div>
            <!-- end row -->





<input type="submit" class="btn btn-info waves-effect waves-light" value="เพิ่มข้อมูล">
            </form>



        </div>
    </div>
</div> <!-- end col -->
</div>



</div>
</div>

<script type="text/javascript">
    $(document).ready(function (){
        $('#myForm').validate({
            rules: {
                name: {
                    required : true,
                }, 
                 mobile_no: {
                    required : true,
                },
                 email: {
                    required : true,
                },
                 address: {
                    required : true,
                },
            },
            messages :{
                name: {
                    required : 'ชื่อผู้ขาย ต้องไม่เป็นค่าว่าง',
                },
                mobile_no: {
                    required : 'เบอร์โทร ต้องไม่เป็นค่าว่าง',
                },
                email: {
                    required : 'อีเเมลล์ ต้องไม่เป็นค่าว่าง',
                },
                address: {
                    required : 'ที่อยู่ ต้องไม่เป็นค่าว่าง',
                },
            },
            errorElement : 'span', 
            errorPlacement: function (error,element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight : function(element, errorClass, validClass){
                $(element).addClass('is-invalid');
            },
            unhighlight : function(element, errorClass, validClass){
                $(element).removeClass('is-invalid');
            },
        });
    });
    
</script>





@endsection 