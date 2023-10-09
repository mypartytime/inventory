@extends('admin.admin_master')
@section('admin')


<div class="page-content">
<div class="container-fluid">

<!-- start page title -->
<div class="row">
<div class="col-12">
<div class="page-title-box d-sm-flex align-items-center justify-content-between">
    <h4 class="mb-sm-0">Dashboard</h4>

    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="javascript: void(0);">Mike</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </div>

</div>
</div>
</div>
<!-- end page title -->

@php
  $customers = App\Models\Customer::latest()->get();
  $totalinvoices = App\Models\InvoiceDetail::where('status','1')->sum('selling_price');
  $products = App\Models\Product::latest()->get();

  $allData = App\Models\InvoiceDetail::orderBy('date','desc')->orderBy('selling_price','desc')->take(10)->get();

  $today = Carbon\Carbon::now()->toDateString();
  $todayinvoice = App\Models\InvoiceDetail::whereDate('created_at',$today)->where('status','1')->sum('selling_price');
@endphp

<div class="row">
<div class="col-xl-3 col-md-6">
<div class="card">
    <div class="card-body">
        <div class="d-flex">
            <div class="flex-grow-1">
                <p class="text-truncate font-size-14 mb-2">ยอดขายรวม</p>
                <h4 class="mb-2">{{ $totalinvoices }} บาท</h4>
                
            </div>
            <div class="avatar-sm">
                <span class="avatar-title bg-light text-primary rounded-3">
                    <i class="ri-shopping-cart-2-line font-size-24"></i>  
                </span>
            </div>
        </div>                                            
    </div><!-- end cardbody -->
</div><!-- end card -->
</div><!-- end col -->
<div class="col-xl-3 col-md-6">
<div class="card">
    <div class="card-body">
        <div class="d-flex">
            <div class="flex-grow-1">
                <p class="text-truncate font-size-14 mb-2">ยอดขายวันนี้</p>
                <h4 class="mb-2">{{ $todayinvoice }} บาท</h4>
                
            </div>
            <div class="avatar-sm">
                <span class="avatar-title bg-light text-primary rounded-3">
                    <i class="ri-user-3-line font-size-24"></i>  
                </span>
            </div>
        </div>                                              
    </div><!-- end cardbody -->
</div><!-- end card -->
</div><!-- end col -->
<div class="col-xl-3 col-md-6">
<div class="card">
    <div class="card-body">
        <div class="d-flex">
            <div class="flex-grow-1">
                <p class="text-truncate font-size-14 mb-2">จำนวนลูกค้ารวม</p>
                <h4 class="mb-2">{{ count($customers) }} ท่าน</h4>
                
            </div>
            <div class="avatar-sm">
                <span class="avatar-title bg-light text-success rounded-3">
                    <i class="mdi mdi-currency-usd font-size-24"></i>  
                </span>
            </div>
        </div>                                              
    </div><!-- end cardbody -->
</div><!-- end card -->
</div><!-- end col -->

<div class="col-xl-3 col-md-6">
<div class="card">
    <div class="card-body">
        <div class="d-flex">
            <div class="flex-grow-1">
                <p class="text-truncate font-size-14 mb-2">สินค้าพร้อมขาย</p>
                <h4 class="mb-2">{{ count($products) }} รายการ</h4>
                
            </div>
            <div class="avatar-sm">
                <span class="avatar-title bg-light text-success rounded-3">
                    <i class="mdi mdi-currency-btc font-size-24"></i>  
                </span>
            </div>
        </div>                                              
    </div><!-- end cardbody -->
</div><!-- end card -->
</div><!-- end col -->
</div><!-- end row -->

<div class="row">
 

<div class="row">
<div class="col-xl-12">
<div class="card">
    <div class="card-body">
        <div class="dropdown float-end">
            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="mdi mdi-dots-vertical"></i>
            </a>
         
        </div>

        <h4 class="card-title mb-4">สินค้าขายดี</h4>

        <div class="table-responsive">
            <table class="table table-centered mb-0 align-middle table-hover table-nowrap">
                <thead class="table-light">
                    <tr>
                            <th>ลำดับ</th>
                            <th>ชื่อสินค้า</th> 
                            <th>หมวดหมู่</th> 
                            <th>Invoice No </th>
                            <th>วันที่สั่งซื้อ </th>
                            <th>ยอดรวม</th>
                            <th>สถานะ</th>
                            
                    </tr>
                </thead><!-- end thead -->
                <tbody>
                @foreach($allData as $key => $item)
                    <tr>
                        <td> {{ $key+1}} </td>
                        <td> {{ $item['product']['name'] }} </td> 
                        <td> {{ $item['category']['name'] }} </td>
                        <td> #{{ $item['invoice']['invoice_no'] }} </td> 
                        <td> {{ date('d-m-Y',strtotime($item->date))  }} </td> 


                       

                        <td>{{ $item->selling_price }} บาท</td>

                        <td> @if($item->status == '0')
                            <span class="btn btn-warning">Pending</span>
                            @elseif($item->status == '1')
                            <span class="btn btn-success">Approved</span>
                            @endif </td>

                       

                    </tr>
                @endforeach
                     <!-- end -->
                     
                     
                     
                     
                     
                     
                     <!-- end -->
                </tbody><!-- end tbody -->
            </table> <!-- end table -->
        </div>
    </div><!-- end card -->
</div><!-- end card -->
</div>
<!-- end col -->
 


</div>
<!-- end row -->
</div>

</div>

@endsection