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
    <div class="row">
        <div class="col-lg-6">
            <div class="card-body card-block">
                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
                    <div class="row form-group">
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-2"><label for="email-input" class=" form-control-label">อีเมล์</label>
                        </div>
                        <div class="col-12 col-md-9"><input type="email" id="email-input" name="email-input"
                                placeholder="กรอกอีเมล์" class="form-control"><small
                                class="help-block form-text">กรุณากรอกอีเมล์ให้ถูกต้อง</small></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-2"><label for="password-input"
                                class=" form-control-label">รหัสผ่าน</label></div>
                        <div class="col-12 col-md-9"><input type="password" id="password-input" name="password-input"
                                placeholder="กรอกรหัสผ่าน" class="form-control"><small
                                class="help-block form-text">กรุณากรอกรหัสผ่านให้ถูกต้อง</small></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-2"><label for="select" class=" form-control-label">คำนำหน้า</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="select" id="select" class="form-control-sm form-control">
                                <option value="0">เลือกคำนำหน้า</option>
                                <option value="1">นาย</option>
                                <option value="2">นาง</option>
                                <option value="3">นางสาว</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-2"><label for="name-input" class=" form-control-label">ชื่อ</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="name-input" name="name-input"
                                placeholder="กรอกชื่อ" class="form-control"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-2"><label for="lastname-input"
                                class=" form-control-label">นามสกุล</label></div>
                        <div class="col-12 col-md-9"><input type="text" id="lastname-input" name="lastname-input"
                                placeholder="กรอกนามสกุล" class="form-control"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-2"><label for="phone-input" class=" form-control-label">โทรศัพท์</label>
                        </div>
                        <div class="col-12 col-md-9"><input type="tel" id="phone-input" name="phone-input"
                                placeholder="กรอกเบอร์โทรศัพท์" class="form-control"></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-2"><label for="select" class=" form-control-label">ระดับผู้ใช้งาน</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="select" id="select" class="form-control-sm form-control">
                                <option value="0">เลือกระดับผู้ใช้งาน</option>
                                <option value="1">ผู้บริหาร</option>
                                <option value="2">ผู้ดูแลระบบ</option>
                                <option value="3">เจ้าหน้าที่กองการศึกษา</option>
                                <option value="3">บุคลากรสถานศึกษา</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-2"><label for="selectSm" class=" form-control-label">ตำแหน่ง</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="selectSm" id="selectSm" class="form-control-sm form-control">
                                <option value="0">เลือกตำแหน่ง</option>
                                <option value="1">หัวหน้าฝ่ายส่งเสริมการศึกษา</option>
                                <option value="2">นักวิชาการศึกษาปฏิบัติการ</option>
                                <option value="3">เจ้าพนักงานธุรการปฎิบัติงาน</option>
                                <option value="4">เจ้าพนักงานการเงินและบัญชีชำนาญงาน</option>
                            </select>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col col-md-2"><label for="file-input" class=" form-control-label">รูปภาพ</label>
                        </div>
                        <div class="col-12 col-md-9"><input type="file" id="file-input" name="file-input"
                                class="form-control-file"></div>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card-body card-block">
                <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">

                    <div class="row form-group">
                        <div class="col col-md-2"><label for="street" class=" form-control-label">ที่อยู่</label></div>
                        <div class="col-12 col-md-9"> <input type="text" id="street" placeholder="กรอกที่อยู่ปัจจุบัน" class="form-control">
                        <small class="help-block form-text">กรุณากรอกรหัสผ่านให้ถูกต้อง</small></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-2"><label for="city" class=" form-control-label">เมือง</label></div>
                        <div class="col-12 col-md-9"> <input type="text" id="city" placeholder="กรอกอำเภอเมือง" class="form-control">
                        <small class="help-block form-text">กรุณากรอกรหัสผ่านให้ถูกต้อง</small></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-2"><label for="postal-code" class=" form-control-label">รหัสไปรษณีย์</label></div>
                        <div class="col-12 col-md-9"> <input type="text" id="postal-code" placeholder="กรอกรหัสไปรษณีย์"class="form-control">
                        <small class="help-block form-text">กรุณากรอกรหัสผ่านให้ถูกต้อง</small></div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-2"><label for="country" class=" form-control-label">ประเทศ</label></div>
                        <div class="col-12 col-md-9"> <input type="text" id="country" placeholder="กรอกที่อยู่ประเทศ" class="form-control">
                        <small class="help-block form-text">กรุณากรอกรหัสผ่านให้ถูกต้อง</small></div>
                    </div>
                </form>
            </div>
        </div>



    </div>

</div>

@endsection



@section('script')

@endsection
@section('style')

@endsection
