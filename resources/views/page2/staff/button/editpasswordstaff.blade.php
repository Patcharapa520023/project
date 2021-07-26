@extends('template.template')
@section('headcontent')
{{-- {{ dd($tables[0]) }} --}}
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>แก้ไขข้อมูลเจ้าหน้าที่กองการศึกษา</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="http://127.0.0.1:8000/admin/personnel#">บุคลากรสถานศึกษา</a></li>
                            <li><a href="http://127.0.0.1:8000/admin/edit/MQ==/personnel#">แก้ไขข้อมูลบุคลากรสถานศึกษา</a></li>
                            <li><a href="http://127.0.0.1:8000/admin/editpassword/MQ==/personnel"><u>แก้ไขรหัสผ่าน</u></a></li>
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
<form action="{{route('editpassword_personnel_post')}}" method="post" enctype="multipart/form-data" class="form-horizontal"  autocomplete="off">
    @csrf
    <div class="card">
        <div class="card-header">
            <strong>แก้ไขรหัสผ่าน</strong>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-success btn-sm">
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




        <div class="row">
            <div class="col-lg-6">
                <div class="card-body card-block">
                    <div class="row form-group"></div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="username-input" class=" form-control-label">ชื่อผู้ใช้</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input class="form-control" type="text" value="{{ $data->username }}" name="username" readonly >
                                    @error('username')
                                    <small class="help-block form-text text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="password-input"
                                    class=" form-control-label">แก้ไขรหัสผ่าน</label></div>
                            <div class="col-12 col-md-9">
                                <input class="form-control" type="password" value="" name="password" autocomplete="new-password">
                                    @error('password')
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
                        <div class="col col-md-3"><label for="lastname-input"
                                class=" form-control-label">ชื่อ</label></div>
                        <div class="col-12 col-md-9">
                            <input class="form-control" type="text" value="{{ $data->personnel->title.$data->personnel->name." ".$data->personnel->lastname }}" name="" readonly>
                                @error('lastname')
                                <small class="help-block form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="password-input"
                                class=" form-control-label">ยืนยันรหัสผ่าน</label></div>
                        <div class="col-12 col-md-9">
                            <input class="form-control" type="password" value="" name="password_confirmation" >
                                @error('password_confirmation')
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
