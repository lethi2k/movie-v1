@extends('admin::layouts.index')
@section('content')
<div class="page-content">
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0 font-size-18">Thêm mới tài khoản ngân hàng</h4>

                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Thương mại điện tử</a></li>
                            <li class="breadcrumb-item active">Thêm mới tài khoản ngân hàng</li>
                        </ol>
                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <form action="{{action('Modules\Admin\Http\Controllers\Ecommerce\CardsController@store')}}" method="post" enctype="multipart/form-data" class="customer-group-validation">
            @csrf
            @include('admin::elements.form.action', ['pre' => URL::asset('admin/portal/finance/cards') ])
            
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            
                            <div class="row">
                                <div class="col-md-4">
                                    <h4 class="card-title">Xem trước</h4>
                                    <p class="card-title-desc">Fill all information below</p>
    
                                    <div class="card bg-success text-white visa-card mb-0">
                                        <div class="card-body">
                                            <div>
                                                <i class="bx bxl-mastercard visa-pattern"></i>
            
                                                <div class="float-end">
                                                    {{-- <i class="bx bxl-mastercard visa-logo display-3"></i> --}}
                                                    <img src="https://trustweb.vn/wp-content/uploads/2016/11/the-napas-la-gi-cong-thanh-toan-napas-la-gi-2411-7383.png" alt="" class="avatar-sm">
                                                </div>
            
                                                <div>
                                                    {{-- <i class="bx bx-chip h1 text-warning"></i> --}}
                                                    <img class="rounded avatar-card" src="https://api.vietqr.io/img/VBA.d72a0e06.png" alt="Generic placeholder image">
                                                </div>
                                            </div>
            
                                            <div class="row mt-5">
                                                <div class="col-3">
                                                    <p class="font-size-22 fw-bold">
                                                        9704
                                                    </p>
                                                </div>
                                                <div class="col-3">
                                                    <p class="font-size-22 fw-bold">
                                                        0507
                                                    </p>
                                                </div>
                                                <div class="col-3">
                                                    <p class="font-size-22 fw-bold">
                                                        4902
                                                    </p>
                                                </div>
                                                <div class="col-3">
                                                    <p class="font-size-22 fw-bold">
                                                        9901
                                                    </p>
                                                </div>
                                            </div>
            
                                            <div class="mt-5">
                                                <h5 class="text-white float-end mb-0">05/18</h5>
                                                <h5 class="text-white mb-0">LE DINH THI</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h4 class="card-title">Thông tin dịch vụ thẻ</h4>
                                    <p class="card-title-desc">Fill all information below</p>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="owner">Tên chủ tài khoản (Viết in hoa, không dấu - NGUYEN VAN A)</label>
                                                <input id="owner" name="card[owner]" type="text" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="account_number">Số CMND</label>
                                                <input id="account_number" name="card[account_number]" type="number" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label for="effective_date">Ngày hiệu lực</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control datepicker" name="card[effective_date]" placeholder="MM/YY" >
                                                    <button type="button" class="btn btn-secondary docs-datepicker-trigger" disabled="">
                                                        <i class="mdi mdi-calendar" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label for="type">Loại thẻ</label>
                                                <select name="card[type]" id="type" class="form-control select2-search-disable">
                                                    <option value="mastercard">Master card</option>
                                                    <option value="napas">Napas</option>
                                                    <option value="visa">Visa</option>
                                                </select>
                                            </div>
                                        </div>
            
                                        <div class="col-sm-6">
                                            <div class="mb-3">
                                                <label for="bank_name">Tên ngân Hàng</label>
                                                <select name="card[bank_name]" id="bank_name" class="select2">
                                                    @foreach ($banks as $bank)
                                                        <option data-logo="{{ $bank->id }}" value="{{ $bank->id }}">{{ $bank->short_name . ' - '. $bank->name }} </option>
                                                    @endforeach
                                                </select>
                                            </div>
            
                                            <div class="mb-3">
                                                <label for="card_number">Số thẻ</label>
                                                <input id="card_number" name="card[card_number]" type="number" class="form-control">
                                            </div>
            
                                            <div class="mb-3">
                                                <label for="expiration_date">Ngày hết hạn</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control datepicker" name="card[expiration_date]" placeholder="MM/YY" autocomplete="off">
                                                    <button type="button" class="btn btn-secondary docs-datepicker-trigger" disabled="">
                                                        <i class="mdi mdi-calendar" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>
            
                                            <div class="mb-3">
                                                <label for="branch">Chi nhánh</label>
                                                <input id="branch" name="card[branch]" type="text" class="form-control">
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- end row -->

    </div> <!-- container-fluid -->
</div>
@endsection

@section('js')
<script>
    $('.datepicker').datepicker({
        format: "mm/yy",
        startView: 1,
        minViewMode: 1,
        language: "vi"
    });

</script>
@endsection