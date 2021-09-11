@extends('template.template')
@section('headcontent')
    {{-- {{ dd($tables[0]) }} --}}
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>เพิ่มข้อมูลยุทธ์ศาสตร์</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="http://127.0.0.1:8000/admin/strategic">ยุทธ์ศาสตร์</a></li>
                                <li><a href="http://127.0.0.1:8000/admin/add/strategic"><u>เพิ่มข้อมูลยุทธ์ศาสตร์</u></a></li>
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
    <form action="{{ route('add_strategic_post') }}" method="post" enctype="multipart/form-data" class="form-horizontal"
        autocomplete="off">
        @csrf
        <div class="card">
            <div class="card-header">
                <strong>ข้อมูลยุทธ์ศาสตร์</strong>
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
                <div class="col-lg-9">
                    <div class="card-body card-block">

                        <div class="row form-group row res_c ">
                            <div class="col col-md-2"><label for="select" class=" form-control-label">ปีงบประมาณ</label>
                            </div>
                                <div class="col-12 col-md-5">
                                    <select value="{{ old('title') }}" name="title" id="select"
                                    class=" form-control">
                                    <option value="">เลือกปีงบประมาณ</option>
                                    @foreach ($listyear as $year)
                                        <option value="ปี">{{ $year->start.'-'.$year->stop.' ('.$year->atplan.' ปี)' }}</option>
                                        @endforeach

                                    </select>
                                    @error('title')
                                        <small class="help-block form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                        </div>
                        <div class="row form-group row res_c">
                            <div class="col col-md-2"><label for="name-input" class=" form-control-label">ชื่อยุทธศาสตร์</label></div>
                            <div class="d-flex col-12 col-md-8">
                                <div class=""><input type="text" id="name-input" name="name_add"
                                        value="{{ old('name') }}" placeholder="กรอกชื่อยุทธศาสตร์" class="form-control">
                                    @error('name')
                                        <small class="help-block form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <button type="button" class="ml-3  btn  btn-sm" id="add_namestrategic">+</button>

                            </div>
                        </div>
                            <div class="list_add_namestrategic d-flex">


                            </div>

                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card-body card-block">
                        <div class="row form-group">
                        </div>




                    </div>
                </div>



            </div>

        </div>
    </form>
@endsection



@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        Array.prototype.remove = function(index) {
            return this.filter(function(element, ine) {
            return ine != index;
        })
    }
        let arrayname = [];
        $('#add_namestrategic').click(function(e){
            let vul =$('input[name="name_add"]').val();
            if(vul){
                arrayname.push(vul)
                $('.list_add_namestrategic').html('')
                arrayname.forEach(creatdive);
                $('input[name="name_add"]').val('')
            }
        })
        function creatdive(name,index){
            $('.list_add_namestrategic ').append(
              `<div class="d-flex sub_strategic">
                <span>${name}</span>
                <div class="list_delete_namestrategic" idkey="${index}">ลบ</div>
            </div>`)
        }
        $('.list_add_namestrategic').on('click', '.list_delete_namestrategic', function(e) {
            $('.list_add_namestrategic').html('')
            arrayname = arrayname.remove($(this).attr('idkey'));
            arrayname.forEach(creatdive);
        });


    </script>
@endsection
@section('style')
    <style>
        .sub_strategic .list_delete_namestrategic{
            padding: 0 4px;
            margin: 0 2px 0 14px;
            background: red;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
            color: #ffffff;
        }
        .sub_strategic{
            border: 1px solid;
            margin-right: 10px;
            height: fit-content;
            padding: 4px 8px;
        }
        .list_add_namestrategic{
            display: flex;
            flex-wrap: wrap;
            border: 1px solid #d8cdcd;
            min-height: 165px;
            padding: 15px;
        }
        #add_namestrategic{        background: #00b551;

    border-radius: 8px;
    box-shadow: 10px 1px 0px #fffff;
    color: #fff;
    box-shadow: -1px 3px 2px 1px #18312b21;
    line-height: 0px;
    height: 28px;
    place-self: center;
}#add_namestrategic:active{
    background: #054924;
    box-shadow: -1px 3px 2px 1px #18312b21;

}
    </style>
@endsection
