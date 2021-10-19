@extends('template.template')
@section('headcontent')
    {{-- {{ dd($tables[0]) }} --}}
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>แก้ไขข้อมูลกลยุทธ์</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="http://127.0.0.1:8000/admin/">กลยุทธ์</a></li>
                                <li><a href="http://127.0.0.1:8000/admin/add/strategic"><u>เพิ่มข้อมูลกลยุทธ์</u></a></li>
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

    <form id="add_tactics_post" action="{{ route('edit_tactics_post') }}" method="post" enctype="multipart/form-data" class="form-horizontal"
        autocomplete="off">
        @csrf
        <input type="hidden" name="id" value="{{ $data->id }}">

        <div class="card">
            <div class="card-header">
                <strong>ข้อมูลกลยุทธ์</strong>
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
                                    <select value="{{ old('title') }}" name="year" id="year_select"
                                    class=" form-control">
                                    <option value="">เลือกปีงบประมาณ</option>
                                        @foreach ($listyear as $year)
                                        <option {{ ($year->id==$data['year_id'])?"selected='selected'":false }} value="{{ $year->id }}">{{ $year->start.'-'.$year->stop.' ('.$year->atplan.' ปี)' }}</option>
                                        @endforeach
                                    </select>
                                    @error('title')
                                        <small class="help-block form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                        </div>
                        <div class="row form-group row res_c ">
                            <div class="col col-md-2"><label for="select" class=" form-control-label">ชื่อยุทธศาสตร์</label>
                            </div>
                            <div class=" col-12 col-md-5">
                                <select value="{{ old('title') }}" name="name_yut" id="yut"
                                    class=" form-control " >
                                    <option value="">เลือกปีงบประมาณ</option>
                                    @foreach ($liststrategic as $strategic)
                                    <option {{ ($strategic->id==$data['strategic_id'])?"selected='selected'":false }} value="{{ $strategic->id }}">{{ $strategic->name }}</option>
                                    @endforeach
                                    </select>
                                    @error('title')
                                        <small class="help-block form-text text-danger">{{ $message }}</small>
                                    @enderror
                            </div>
                        </div>
                        <div class="row form-group row res_c">
                            <div class="col col-md-2"><label for="name-input" class=" form-control-label">ชื่อกลยุทธ์</label></div>
                            <div class="d-flex col-12 col-md-8">
                                <div class=""><input type="text" id="name-input" name="name_add"
                                        value="{{ $data->name }}" placeholder="กรอกชื่อกลยุทธ์" class="form-control">
                                    @error('name')
                                        <small class="help-block form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                            </div>
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
    <script>

$('#year_select').change(function() {
    let year_id =  $( this ).val();
    let ops = $('#yut');
    if(!year_id) {
        ops.html('')
        ops.attr('readonly',true)
        ops.append(`<option value="">เลือกปีงบประมาณ</option>`)

        return;
    }
    $.ajax({
        data:{id:year_id},
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: "POST",
        url: "{{ route('optionName_year') }}",
        success: function(result) {
            if(result.length){
                ops.removeAttr('readonly')
                if(ops.find('option').length)ops.html('')
                ops.append(`<option value="">เลือกยุทธศาสตร์</option>`)

                result.forEach((optiondata)=>{
                    ops.append(`<option value="${optiondata.id}">${optiondata.name}</option>`)
                })
            }
        }
    });

});
        let arrayname = [];
        $('#add_tactics_post').submit(function(e) {
            $('input[name="name_add_m"]').val(JSON.stringify(arrayname))
        return true;
        });
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
                <div class="list_delete_namestrategic" idkey="${index}">
                    <svg width="14px" aria-hidden="true" focusable="false" data-prefix="far" data-icon="trash-alt" class="svg-inline--fa fa-trash-alt fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M268 416h24a12 12 0 0 0 12-12V188a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v216a12 12 0 0 0 12 12zM432 80h-82.41l-34-56.7A48 48 0 0 0 274.41 0H173.59a48 48 0 0 0-41.16 23.3L98.41 80H16A16 16 0 0 0 0 96v16a16 16 0 0 0 16 16h16v336a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128h16a16 16 0 0 0 16-16V96a16 16 0 0 0-16-16zM171.84 50.91A6 6 0 0 1 177 48h94a6 6 0 0 1 5.15 2.91L293.61 80H154.39zM368 464H80V128h288zm-212-48h24a12 12 0 0 0 12-12V188a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v216a12 12 0 0 0 12 12z"></path></svg>
                </div>
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
        .list_delete_namestrategic svg path{
            fill: #ff6a78
        }
        .sub_strategic .list_delete_namestrategic{
            max-height: 28px;
            padding: 0 4px;
            margin: 0 2px 0 14px;
            background:#ffeded;
            border-radius: 4px;
            font-size: 14px;
            cursor: pointer;
            color: #ffffff;
        }
        .sub_strategic{

            border: 1px solid #28a745;
            margin-right: 10px;
            height: fit-content;
            padding: 4px 8px;
        }
        .sub_strategic span{
            font-size: 12px;
            line-break: anywhere;
        }
        .list_add_namestrategic{
            max-width: 800.250px;
            grid-gap: 10px;
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
