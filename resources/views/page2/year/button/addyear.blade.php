@extends('template.template')
@section('headcontent')
    {{-- {{ dd($tables[0]) }} --}}
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>เพิ่มข้อมูลแผนพัฒนาการศึกษา</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="http://127.0.0.1:8000/admin/year">ข้อมูลปีงบประมาณ</a></li>
                                <li><a href="http://127.0.0.1:8000/admin/add/year"><u>เพิ่มข้อมูลแผนพัฒนาการศึกษา</u></a></li>
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
    <form action="{{ route('add_year_post') }}" method="post" enctype="multipart/form-data" class="form-horizontal"
        autocomplete="off">
        @csrf
        <div class="card">
            <div class="card-header">
                <strong>ข้อมูลแผนพัฒนาการศึกษา</strong>
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
                            <div class="col col-md-5"><label for="name-input" class=" form-control-label">แผนพัฒนาการศึกษา</label></div>
                            <div class="col-12 col-md-5"><input type="text" id="name-input" name="name"
                                    value="{{ old('name') }}" placeholder="กรอกปี"  class="form-control">           
                                @error('atplan')
                                    <small class="help-block form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- จุดเริ่มต้นการกด + แล้วข้อมูลโชว์  -->                                        
                        <div class="form-group row res_c">

<div class="form-group col-md-5">
    <label for="atplan">ปีเริ่มต้น</label>
        </div>


<div class="form-group col-md-5 ">                            
    <input type="text" class="form-control" name="txtSiteName3[]" id="txtSiteName3" autocomplete="off">
</div>
    </form>
@endsection



@section('script')

@endsection
@section('style')

@endsection
