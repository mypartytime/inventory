<div class="vertical-menu">


@php
    $id = Auth::user()->id;
    $adminData = App\Models\User::find($id);
@endphp

                <div data-simplebar class="h-100">

                    <!-- User details -->
                    <div class="user-profile text-center mt-3">
                        <div class="">
                            <img src="{{ (!empty($adminData->profile_image))? url('upload/admin_images/'.$adminData->profile_image):url('upload/no_image.jpg') }}" alt="" class="avatar-md rounded-circle">
                        </div>
                        <div class="mt-3">
                            <h4 class="font-size-16 mb-1">{{$adminData->name}}</h4>
                            <span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i> Online</span>
                        </div>
                    </div>

                    <!--- Sidemenu -->
                    <div id="sidebar-menu">
                        <!-- Left Menu Start -->
                        <ul class="metismenu list-unstyled" id="side-menu">
                            <li class="menu-title">Menu</li>

                            <li>
                                <a href="{{ url('/dashboard') }}" class="waves-effect">
                                    <i class="ri-home-fill"></i> 
                                    <span>Dashboard</span>
                                </a>
                            </li>

                            

                          

                            <li class="menu-title">ข้อมูล</li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-account-circle-line"></i>
                                    <span>ผู้ขาย</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{route('supplier.all')}}">แสดงข้อมูลทั้งหมด</a></li>
                                    
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-user-heart-line"></i>
                                    <span>ลูกค้า</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{route('customer.all')}}">แสดงข้อมูลทั้งหมด</a></li>
                                    <li><a href="{{ route('credit.customer') }}">ลูกค้าเครดิต</a></li>
                                    <li><a href="{{ route('paid.customer') }}">ลูกค้าชำระเงินแล้ว</a></li>
                                    <li><a href="{{ route('customer.wise.report') }}">ลูกค้าที่ซื้อสินค้า</a></li>
                                    
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-shopping-bag-2-line"></i>
                                    <span>สินค้า</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{route('product.all')}}">แสดงข้อมูลทั้งหมด</a></li>
                                   
                                    
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-scales-2-line"></i>
                                    <span>หน่วยนับ</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{route('unit.all')}}">แสดงข้อมูลทั้งหมด</a></li>
                                    
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-gift-2-line"></i>
                                    <span>หมวดหมู่สินค้า</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{route('category.all')}}">แสดงข้อมูลทั้งหมด</a></li>
                                    
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-scales-2-line"></i>
                                    <span>จัดซื้อ</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{route('purchase.all')}}">แสดงข้อมูลทั้งหมด</a></li>
                                    <li><a href="{{ route('purchase.pending') }}">อนุมัติจัดซื้อ</a></li>
                                    <li><a href="{{ route('daily.purchase.report') }}">รายงานจัดซื้อ</a></li>
                                    
                                </ul>
                            </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-mail-send-line"></i>
                                    <span>จัดการใบแจ้งหนี้</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="{{ route('invoice.all') }}">อนุมัติแล้ว</a></li>
                                    <li><a href="{{ route('invoice.pending.list') }}">รออนุมัติ</a></li>
                                    <li><a href="{{ route('print.invoice.list') }}">พิมพ์ใบแจ้งหนี้</a></li>
                                    <li><a href="{{ route('daily.invoice.report') }}">รายงานใบแจ้งหนี้รายวัน</a></li>

                                </ul>
                            </li>

                            <li class="menu-title">คลังสินค้า</li>

                                <li>
                                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                                        <i class="ri-account-circle-line"></i>
                                        <span>จัดการคลังสินค้า</span>
                                    </a>
                                    <ul class="sub-menu" aria-expanded="false">
                                        <li><a href="{{ route('stock.report') }}">รายงาน</a></li>
                                        <li><a href="{{ route('stock.supplier.wise') }}">ผู้ขายและสินค้า</a></li>

                                    </ul>
                                </li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-profile-line"></i>
                                    <span>Utility</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="pages-starter.html">Starter Page</a></li>
                                    <li><a href="pages-timeline.html">Timeline</a></li>
                                    <li><a href="pages-directory.html">Directory</a></li>
                                    <li><a href="pages-invoice.html">Invoice</a></li>
                                    <li><a href="pages-404.html">Error 404</a></li>
                                    <li><a href="pages-500.html">Error 500</a></li>
                                </ul>
                            </li>

                            <li class="menu-title">Components</li>

                            <li>
                                <a href="javascript: void(0);" class="has-arrow waves-effect">
                                    <i class="ri-pencil-ruler-2-line"></i>
                                    <span>UI Elements</span>
                                </a>
                                <ul class="sub-menu" aria-expanded="false">
                                    <li><a href="ui-alerts.html">Alerts</a></li>
                                    <li><a href="ui-buttons.html">Buttons</a></li>
                                    <li><a href="ui-cards.html">Cards</a></li>
                                    <li><a href="ui-carousel.html">Carousel</a></li>
                                    <li><a href="ui-dropdowns.html">Dropdowns</a></li>
                                    <li><a href="ui-grid.html">Grid</a></li>
                                    <li><a href="ui-images.html">Images</a></li>
                                    <li><a href="ui-lightbox.html">Lightbox</a></li>
                                    <li><a href="ui-modals.html">Modals</a></li>
                                    <li><a href="ui-offcanvas.html">Offcavas</a></li>
                                    <li><a href="ui-progressbars.html">Progress Bars</a></li>
                                    <li><a href="ui-tabs-accordions.html">Tabs & Accordions</a></li>
                                    <li><a href="ui-typography.html">Typography</a></li>
                                    <li><a href="ui-video.html">Video</a></li>
                                    <li><a href="ui-general.html">General</a></li>
                        
                                </ul>
                            </li>

                            

                        </ul>
                    </div>
                    <!-- Sidebar -->
                </div>
            </div>