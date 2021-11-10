@extends('template.template')
@section('headcontent')
{{-- {{ dd($tables[0]) }} --}}
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>แก้ไขข้อมูลผู้บริหาร</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="http://127.0.0.1:8000/admin/executive">ผู้บริหาร</a></li>
                            <li><a href="#"><u>แก้ไขข้อมูลผู้บริหาร</u></a></li>
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
<form action="{{route('edit_executive_post')}}" method="post" enctype="multipart/form-data" class="form-horizontal" autocomplete="off">
    @csrf
    <div class="card">
        <div class="card-header">
            <strong>แก้ไขข้อมูลส่วนตัว</strong>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success btn-sm">
                <i class="fa fa-dot-circle-o"></i> ยืนยันข้อมูล
            </button>
            <button type="reset" class="btn btn-danger btn-sm">
                <i class="fa fa-ban"></i> รีเฟรช
            </button>
            <a href='{{   route('editpassword_executive', ['id' => $data->id])  }}'type="button" class="btn btn-primary btn-sm">
                <i class="fa fa-unlock-alt"></i> แก้ไขรหัสผ่าน
            </a>
        </div>
        @if(session('error'))
        <div class="alert alert-success " role="alert">
           <p> {{session('error')}} </p>
        </div>
        @endif
        <div>



        <div class="row">
            <div class="col-lg-6">
                <div class="card-body card-block">
                    <div class="row form-group"></div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label for="username-input" class=" form-control-label">ชื่อผู้ใช้</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input class="form-control" type="text" value="{{ $data->username }}" name="username" >
                                    @error('username')
                                    <small class="help-block form-text text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>
                        {{-- <div class="row form-group">
                            <div class="col col-md-2"><label for="password-input"
                                    class=" form-control-label">รหัสผ่าน</label></div>
                            <div class="col-12 col-md-9">
                                <input class="form-control" type="text" value="{{ $data->password }}" name="password" >
                                    @error('password')
                                    <small class="help-block form-text text-danger">{{ $message }}</small>
                                @enderror
                                </div>
                        </div> --}}
                        <div class="row form-group">
                            <div class="col col-md-2"><label for="select" class=" form-control-label">คำนำหน้า</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input class="form-control" type="text" value="{{ $data->executive->title }}" name="title" >
                                @error('title')
                                <small class="help-block form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label for="name-input" class=" form-control-label">ชื่อ</label></div>
                            <div class="col-12 col-md-9">
                                <input class="form-control" type="text" value="{{ $data->executive->name }}" name="name" >
                                    @error('name')
                                    <small class="help-block form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-2"><label for="lastname-input"
                                    class=" form-control-label">นามสกุล</label></div>
                            <div class="col-12 col-md-9">
                                <input class="form-control" type="text" value="{{ $data->executive->lastname }}" name="lastname" >
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
                            <input class="form-control" type="text" value="{{ $data->executive->telnum }}" name="phone">
                                @error('phone')
                                <small class="help-block form-text text-danger">{{ $message }}</small>
                            @enderror
                            </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-2"><label for="select" class=" form-control-label">ระดับผู้ใช้</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input class="form-control" type="text" value="{{ $data->rolse }}" name="rolse" >
                            @error('rolse')
                            <small class="help-block form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-2"><label for="select" class=" form-control-label">ที่อยู่ปัจจุบัน</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"   style="height: 95px;" name="address">{{ $data->executive->address }} </textarea>
                            @error('rolse')
                            <small class="help-block form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                </div>
            </div>
            <input type="hidden" value="{{ $data->id }}" name="id">



        </div>
    </div>
    </div>
</form>
@endsection



@section('script')

@endsection
@section('style')

@endsection
