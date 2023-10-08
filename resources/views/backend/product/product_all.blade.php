@extends('admin.admin_master')
@section('admin')


 <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                                    <h4 class="mb-sm-0">ข้อมูลสินค้า</h4>



                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('supplier.add')}}" class="btn btn-dark btn-rounded waves-effect waves-light" style="float:right;">เพิ่มข้อมูล</a> <br>  <br>               

                    <h4 class="card-title">ข้อมูลสินค้าทั้งหมด</h4>


                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>ชื่อสินค้า</th> 
                            <th>จำนวน</th>
                            <th>หน่วยนับ</th>
                            <th>หมวดหมู่</th>
                            <th>ผู้ขาย</th> 
                            <th>การดำเนินการ</th>

                        </thead>


                        <tbody>

                        	@foreach($products as $key => $item)
                        <tr>
                            <td> {{ $key+1}} </td>
                            <td> {{ $item->name }} </td> 
                             <td> {{ $item->quantity }} </td> 
                              <td> {{ $item->unit_id }} </td> 
                               <td> {{ $item->category_id }} </td> 
                               <td> {{ $item->supplier_id }} </td> 
                            <td>
   <a href="{{route('supplier.edit',$item->id)}}" class="btn btn-info sm" title="Edit Data">  <i class="fas fa-edit"></i> </a>

     <a href="{{route('supplier.delete',$item->id)}}" class="btn btn-danger sm" title="Delete Data" id="delete" id="delete">  <i class="fas fa-trash-alt"></i> </a>

                            </td>

                        </tr>
                        @endforeach

                        </tbody>
                    </table>

                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->



                    </div> <!-- container-fluid -->
                </div>


@endsection