@extends('admin.admin_master')
@section('admin')
 <script src="{{asset('backend/assets/js/jquery.min.js')}}"></script>

<div class="page-content">
<div class="container-fluid">

<div class="row">
<div class="col-12">
    <div class="card">
        <div class="card-body">

            <h4 class="card-title">แก้ไขสินค้า</h4><br><br>



 <form method="post" action="{{ route('product.update') }}" id="myForm" >
                @csrf

                <input type="hidden" name="id" value="{{ $product->id }}">

            <div class="row mb-3">
                <label for="example-text-input" class="col-sm-2 col-form-label">ชื่อสินค้า</label>
                <div class="form-group col-sm-10">
                    <input name="name" class="form-control" type="text"  value="{{ $product->name }}"  >
                </div>
            </div>
            <!-- end row -->


            <div class="row mb-3">
        <label class="col-sm-2 col-form-label">ชื่อผู้ขาย</label>
        <div class="col-sm-10">
            <select name="supplier_id" class="form-select" aria-label="Default select example">
                <option selected="" disabled="">โปรดเสือกผู้ชาย</option>
                @foreach($supplier as $supp)
                <option value="{{ $supp->id }}" {{ $supp->id == $product->supplier_id ? 'selected' : '' }}>{{ $supp->name }}</option>
               @endforeach
                </select>
        </div>
    </div>
  <!-- end row -->

      <div class="row mb-3">
        <label class="col-sm-2 col-form-label">หน่วยนับ </label>
        <div class="col-sm-10">
            <select name="unit_id" class="form-select" aria-label="Default select example">
            <option selected="" disabled="">โปรดเสือกหน่วยนับ</option>
                @foreach($unit as $uni)
                <option value="{{ $uni->id }}" {{ $uni->id == $product->unit_id ? 'selected' : '' }} >{{ $uni->name }}</option>
               @endforeach
                </select>
        </div>
    </div>
  <!-- end row -->



      <div class="row mb-3">
        <label class="col-sm-2 col-form-label">หมวดหมู่ </label>
        <div class="col-sm-10">
            <select name="category_id" class="form-select" aria-label="Default select example">
            <option selected="" disabled="">โปรดเสือกหมวดหมู่</option>
                @foreach($category as $cat)
                <option value="{{ $cat->id }}" {{ $cat->id == $product->category_id ? 'selected' : '' }}>{{ $cat->name }}</option>
               @endforeach
                </select>
        </div>
    </div>
  <!-- end row -->


<input type="submit" class="btn btn-info waves-effect waves-light" value="แก้ไข">
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
                 supplier_id: {
                    required : true,
                },
                 unit_id: {
                    required : true,
                },
                 category_id: {
                    required : true,
                },
            },
            messages :{
                name: {
                    required : 'ใส่ชื่อสินค้าด้วย',
                },
                supplier_id: {
                    required : 'เสือกชื่อผู้ขายด้วย',
                },
                unit_id: {
                    required : 'เสือกหน่วยนับห้วย',
                },
                category_id: {
                    required : 'เสือกมวยหมู่ห้วย',
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