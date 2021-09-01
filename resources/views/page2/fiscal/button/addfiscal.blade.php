@extends('template.template')
@section('headcontent')
    {{-- {{ dd($tables[0]) }} --}}
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>เพิ่มข้อมูลเจ้าหน้าที่กองการศึกษา</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="http://127.0.0.1:8000/admin/staff">เจ้าหน้าที่กองการศึกษา</a></li>
                                <li><a href="http://127.0.0.1:8000/admin/add/staff"><u>เพิ่มข้อมูลเจ้าหน้าที่กองการศึกษา</u></a></li>
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
    <form action="{{ route('add_staff_post') }}" method="post" enctype="multipart/form-data" class="form-horizontal"
        autocomplete="off">
        @csrf
        <div class="card">
            <div class="card-header">
                <strong>ข้อมูลส่วนตัว</strong>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-success btn-sm">
                    <i class="fa fa-dot-circle-o"></i> ยืนยันข้อมูล
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> รีเฟรช
                </button>
            </div>
            @if (session('error'))
                <div class="alert alert-success " role="alert">
                    <p> {{ session('error') }} </p>
                </div>
            @endif
            <div class="row">
                <div class="col-lg-6">
                    <div class="card-body card-block">
                        <div class="row form-group">
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label for="username-input" class=" form-control-label">ชื่อผู้ใช้</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input type="text" id="username-input" name="username" placeholder="กรอกชื่อผู้ใช้"
                                    value="{{ old('username') }}" class="form-control" autocomplete="off">
                                @error('username')
                                    <small class="help-block form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label for="password-input"
                                    class=" form-control-label">รหัสผ่าน</label></div>
                            <div class="col-12 col-md-9"><input type="password" id="password-input" name="password"
                                    value="{{ old('name') }}" placeholder="กรอกรหัสผ่าน" class="form-control" autocomplete="new-password" >
                                @error('password')
                                    <small class="help-block form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label for="select" class=" form-control-label">คำนำหน้า</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select value="{{ old('title') }}" name="title" id="select"
                                    class="form-control-sm form-control">
                                    <option value="">เลือกคำนำหน้า</option>
                                    <option value="นาย">นาย</option>
                                    <option value="นาง">นาง</option>
                                    <option value="นางสาว">นางสาว</option>
                                </select>
                                @error('title')
                                    <small class="help-block form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label for="name-input" class=" form-control-label">ชื่อ</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="name-input" name="name"
                                    value="{{ old('name') }}" placeholder="กรอกชื่อ" class="form-control">
                                @error('name')
                                    <small class="help-block form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label for="lastname-input"
                                    class=" form-control-label">นามสกุล</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="lastname-input" name="lastname"
                                    value="{{ old('lastname') }}" placeholder="กรอกนามสกุล" class="form-control">
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
                            <div class="col-12 col-md-9"><input type="tel" id="phone-input" name="phone"
                                    value="{{ old('phone') }}" placeholder="กรอกเบอร์โทรศัพท์" class="form-control">
                                @error('phone')
                                    <small class="help-block form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label for="select" class=" form-control-label">ระดับผู้ใช้</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="rolse" id="rolse" class="form-control-sm form-control"
                                    value="{{ old('rolse') }}">
                                    <option value="เจ้าหน้าที่กองการศึกษา">เจ้าหน้าที่กองการศึกษา</option>
                                </select>
                                @error('rolse')
                                    <small class="help-block form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                        </div>
                        {{-- <div class="row form-group">
                        <div class="col col-md-2"><label for="selectSm" class=" form-control-label">ตำแหน่ง</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="position" id="selectSm" class="form-control-sm form-control"  value="{{ old('position') }}">
                                <option value="">เลือกตำแหน่ง</option>
                                <option value="หัวหน้าฝ่ายส่งเสริมการศึกษา">หัวหน้าฝ่ายส่งเสริมการศึกษา</option>
                                <option value="นักวิชาการศึกษาปฏิบัติการ">นักวิชาการศึกษาปฏิบัติการ</option>
                                <option value="เจ้าพนักงานธุรการปฎิบัติงาน">เจ้าพนักงานธุรการปฎิบัติงาน</option>
                                <option value="เจ้าพนักงานการเงินและบัญชีชำนาญงาน">เจ้าพนักงานการเงินและบัญชีชำนาญงาน</option>
                            </select>
                            @error('position')
                            <small class="help-block form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div> --}}



                        <div class="row form-group">
                            <div class="col col-md-2"><label for="exampleFormControlTextarea1"
                                    class=" form-control-label">ที่อยู่ปัจจุบัน</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="address"
                                    style="height: 154px;"></textarea>
                                @error('address')
                                    <small class="help-block form-text text-danger">{{ $message }}</small>
                                @enderror
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
