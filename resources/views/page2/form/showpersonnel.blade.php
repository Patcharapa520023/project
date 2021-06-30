@extends('template.template')
@section('headcontent')
{{-- {{ dd($tables[0]) }} --}}
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>เพิ่มข้อมูลบุคลากรสถานศึกษา</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">จัดการข้อมูลผู้ใช้</a></li>
                            <li><a href="#">บุคลากรสถานศึกษา</a></li>
                            <li><a href="#"><u>เพิ่มข้อมูลบุคลากรสถานศึกษา</u></a></li>
                            {{-- <li class="active">Data table</li> --}}
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<form action="{{route('add_personnel_post')}}" method="post" enctype="multipart/form-data" class="form-horizontal">
    @csrf
    <div class="card">
        <div class="card-header">
            <strong>ข้อมูลส่วนตัว</strong>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-dot-circle-o"></i> ยืนยันข้อมูล
            </button>
            <button type="reset" class="btn btn-danger btn-sm">
                <i class="fa fa-ban"></i> รีเฟรช
            </button>
        </div>
        @if(session('error'))
        <div class="alert alert-success " role="alert">
           <p> {{session('error')}} </p>
        </div>
        @endif
        <div>
                <div class="d-flex justify-content-center pt-3">
                    <img src="{{ asset('images/ad3.png') }}" alt="" style="width: 250px;">
                </div>



        <div class="row">
            <div class="col-lg-6">
                <div class="card-body card-block">
                    <div class="row form-group"></div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label for="email-input" class=" form-control-label">อีเมล์</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input class="form-control" type="text" placeholder="{{ $data->email }}" readonly>
                                    @error('email')
                                    <small class="help-block form-text text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label for="password-input"
                                    class=" form-control-label">รหัสผ่าน</label></div>
                            <div class="col-12 col-md-9">
                                <input class="form-control" type="text" placeholder="{{ $data->password }}" readonly>
                                    @error('password')
                                    <small class="help-block form-text text-danger">{{ $message }}</small>
                                @enderror
                                </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label for="select" class=" form-control-label">คำนำหน้า</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input class="form-control" type="text" placeholder="{{ $data->personnel->title }}" readonly>
                                @error('title')
                                <small class="help-block form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label for="name-input" class=" form-control-label">ชื่อ</label></div>
                            <div class="col-12 col-md-9">
                                <input class="form-control" type="text" placeholder="{{ $data->personnel->name }}" readonly>
                                    @error('name')
                                    <small class="help-block form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label for="lastname-input"
                                    class=" form-control-label">นามสกุล</label></div>
                            <div class="col-12 col-md-9">
                                <input class="form-control" type="text" placeholder="{{ $data->personnel->lastname }}" readonly>
                                    @error('lastname')
                                    <small class="help-block form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                        </div>


                </div>
            </div>
            <div class="col-lg-6">
                <div class="card-body card-block">
                    <div class="row form-group">
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-2"><label for="phone-input" class=" form-control-label">โทรศัพท์</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input class="form-control" type="text" placeholder="{{ $data->personnel->telnum }}" readonly>
                                @error('phone')
                                <small class="help-block form-text text-danger">{{ $message }}</small>
                            @enderror
                            </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-2"><label for="select" class=" form-control-label">ระดับผู้ใช้</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input class="form-control" type="text" placeholder="{{ $data->rolse }}" readonly>
                            @error('rolse')
                            <small class="help-block form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-2"><label for="select" class=" form-control-label">ที่อยู่ปัจจุบัน</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder="{{ $data->personnel->address }}" readonly style="height: 165px;"></textarea>
                            @error('rolse')
                            <small class="help-block form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>




        </div>
    </div>
    </div>
</form>
@endsection



@section('script')

@endsection
@section('style')

@endsection