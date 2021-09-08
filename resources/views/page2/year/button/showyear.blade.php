@extends('template.template')
@section('headcontent')
{{-- {{ dd($tables[0]) }} --}}
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>ดูข้อมูลข้อมูลแผนพัฒนาการศึกษา</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="http://127.0.0.1:8000/admin/year">ปีงบประมาณ</a></li>
                            <li><a href="#"><u>ดูข้อมูลปีงบประมาณ</u></a></li>
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
            <strong>ข้อมูลปีงบประมาณ</strong>
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
                            <div class="col col-md-2"><label for="name-input" class=" form-control-label">แผนพัฒนาการศึกษา(ปี)</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <input class="form-control" type="text" placeholder="{{ $data->atplan}}" readonly>
                                    @error('$atplan')
                                    <small class="help-block form-text text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>
                    
                        <div class="row form-group">
                            <div class="col col-md-2"><label for="start-input"
                                    class=" form-control-label">ปีที่เรื่ม/label></div>
                            <div class="col-12 col-md-9">
                                <input class="form-control" type="text" placeholder="{{ $data->year->start }}" readonly>
                                    @error('start')
                                    <small class="help-block form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                        </div>

                </div>
            </div>




        </div>
    </div>
    </div>
@endsection



@section('script')

@endsection
@section('style')

@endsection
