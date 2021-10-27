@extends('template.template')
@section('headcontent')
    {{-- {{ dd($tables[0]) }} --}}

    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>เพิ่มแผนพัฒนาท้องถิ่นและกองการศึกษา</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="http://127.0.0.1:8000/admin/year">แผนพัฒนาท้องถิ่นและกองการศึกษา</a></li>
                                <li><a href="http://127.0.0.1:8000/admin/add/year"><u>เพิ่มแผนพัฒนาท้องถิ่นและกองการศึกษา</u></a></li>
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
                <strong>แผนพัฒนาท้องถิ่นและกองการศึกษา</strong>
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


                        <div class="row form-group row res_c">
                            <div class="col col-md-5"><label for="a_and_d_year" class=" form-control-label">แผนพัฒนาท้องถิ่นและกองการศึกษา</label></div>
                            <div class="col-12 col-md-7">
                                <div class="row">
                                    <button id="delete_year" class="btn_ad col-3" type="button">-</button>
                                    <input type="text" class="col-4" id="a_and_d_year" name="atplan"
                                    value="{{ old('name')|5 }}" placeholder="กรอกปี" class="form-control" >
                                    <button id="add_year" class="btn_ad col-3" type="button" >+</button>
                                    <div class="col-2">ปี </div>
                                </div>
                                @error('name')
                                    <small class="help-block form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="year_list">
                        @for ($i = 1; $i <= 5; $i++)
                            <div class="row form-group res_cc">
                                <div class="col col-md-2">
                                    <label for="name-input[]">
                                        ปีที่ {{ $i }}
                                    </label>
                                </div>
                                <div class="col-12 col-md-9">
                                    <input {{($i!=1?'readonly':false)  }} compleate="{{  strlen((string) date("Y")+543)  }}" type="text" id="name-input" {{($i==1?'name=start':false) }}  value="" placeholder="" class="form-control {{($i==1?'compleate-bf':'show_year_att')  }}">
                                   @if ($i==1)
                                     <div class="mt-2">  <span class='lenght_key'>0</span>/{{  strlen((string) date("Y")+543)  }} (พ.ศ.)</div>
                                   @endif
                                </div>
                            </div>
                            @endfor
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
        $('#add_year').click(function(e){
            let constyear = parseInt($('#a_and_d_year').val())  +1;
            $('#a_and_d_year').val(constyear)
            $('.year_list').html(createdivlis_year(constyear))
        })
        $('#delete_year').click(function(e){
            let constyear = parseInt($('#a_and_d_year').val()) ;
            if(constyear>1){
                $('#a_and_d_year').val(constyear-1)
                $('.year_list').html(createdivlis_year(constyear-1))
            }
        })
        function createdivlis_year(count){
            let divlist = ''
            let intyear  = (parseInt(new Date().getFullYear(), 10) + 543);
            for (let i = 1; i <=count; i++) {
                if(i==1){
                    divlist +=   `
                <div class="row form-group res_cc">
                                    <div class="col col-md-2">
                                        <label for="name-input[]">
                                            ปีที่ ${i}
                                        </label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" compleate='${intyear.toString().length}' id="name-input" name="start" value="" placeholder="" class="form-control compleate-bf">
                                        <div class="mt-2"><span class='lenght_key'>0</span>/${intyear.toString().length} (พ.ศ.)</div>
                                    </div>
                                </div>
                `;
                }else{
                    divlist +=   `
                <div class="row form-group res_cc">
                                    <div class="col col-md-2">
                                        <label for="name-input[]">
                                            ปีที่ ${i}
                                        </label>
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <input type="text" id="name-input" name="lastname" readonly value="" placeholder="" class="form-control show_year_att">
                                    </div>
                                </div>
                `;

                }
            }
            return divlist;
        }
        $(".year_list").delegate(".compleate-bf", "keyup", function(e){
            $('.lenght_key').text($(this).val().length);
            let vulyear = $(this).val();
            if($(this).val().length==$(this).attr('compleate')){
               $('.show_year_att').each(function(e,item){
                vulyear++
                   $(item).val(vulyear);
               })
            }else{
                $('.show_year_att').val('')
            }
        });
        $(".year_list").delegate(".compleate-bf", "keydown", function(e){
            if(/^[0-9]$/i.test(e.key)&&$(this).val().length+1<=$(this).attr('compleate')){
                return e.key
            }
            else if(e.key=='Backspace'){
                return true
            }
            return false
        });
    </script>
@endsection
@section('style')
<style>
    #a_and_d_year{
        border: 1px solid;
        text-align: center;
        border-right: none;
        border-left: none;
    }
    .btn_ad{
        cursor: pointer;
        background: #fff;
        border: 1px solid;
    }
    .btn_ad#delete_year:active{
        background: rgb(255, 34, 34);
        color: #fff;
    }
    .btn_ad#add_year:active{
        background: rgb(103, 216, 108);
        color: #fff;
    }
</style>
@endsection
