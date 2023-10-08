@extends('admin.admin_master')
@section('admin')

<script src="{{asset('backend/assets/js/jquery.min.js')}}"></script>


<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">เพิ่มข้อมูลหน่วยนับ </h4><br><br>



            <form id= "myForm" method="post" action="{{ route('unit.store') }}" >
                @csrf

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">ชื่อหน่วยนับ </label>
                <div class="col-sm-10 form-group">
                    <input name="name" class="form-control" type="text"    >
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
                 
            },
            messages :{
                name: {
                    required : 'ชื่อหน่วยนับ ต้องไม่เป็นค่าว่าง',
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