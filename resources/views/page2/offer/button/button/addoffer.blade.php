@extends('template.template')
@section('headcontent')
    {{-- {{ dd($tables[0]) }} --}}
    <div class="breadcrumbs">
        <div class="breadcrumbs-inner">
            <div class="row m-0">
                <div class="col-sm-4">
                    <div class="page-header float-left">
                        <div class="page-title">
                            <h1>เพิ่มข้อมูลเสนอโครงการ</h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-8">
                    <div class="page-header float-right">
                        <div class="page-title">
                            <ol class="breadcrumb text-right">
                                <li><a href="http://127.0.0.1:8000/admin/offer">เสนอโครงการ</a></li>
                                <li><a href="http://127.0.0.1:8000/admin/add/offer"><u>เพิ่มข้อมูลเสนอโครงการ</u></a></li>
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
    <form action="{{ route('add_offer_post') }}" method="post" enctype="multipart/form-data" class="form-horizontal" id="form_post"
        autocomplete="off">
        @csrf
        <div class="card">
            <div class="card-header">
                <strong>ข้อมูลเสนอโครงการ</strong>
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
                <div class="col-lg">
                    <div class="card-body card-block">

                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                  <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="gridCheck">
                                    <label class="form-check-label" for="gridCheck">สอดคล้องกับแผนพัฒนาการศึกษา</label>
                                  </div>
                                </div>

                                <div class="form-group  col-md-6">
                                    <div class="row form-group">
                                        <label for="strategic" class=" col-sm-3 col-form-label">ยุทธศาสตร์</label>
                                        <div class="col-sm-9 ">
                                          <select type="text"  class="form-control" id="strategic" >
                                            <option selected>เลือก...</option>
                                            <option>...</option>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="tactics" class=" col-sm-3 col-form-label">กลยุทธ์</label>
                                        <div class="col-sm-9 ">
                                          <select type="text"  class="form-control" id="tactics" >
                                            <option selected>เลือก...</option>
                                            <option>...</option>
                                          </select>
                                        </div>
                                    </div>

                                </div>
                            </div>



                            <div class="form-row form-group ">
                              <label class="col-md-2 "for="name">1. ชื่อโครงการ</label>
                              <input type="text" class="form-control col-md-5" id="name" name="name" placeholder="กรอกชื่อโครงการ" value="{{old('name')}}">
                            </div>
                            <div class="form-group ">

                                <label class=""for="raticnal">2. หลักการและเหตุผล</label>
                                <textarea class="form-control" id="raticnal" name="raticnal" rows="3" placeholder="กรอกหลักการและเหตุผล">{{old('raticnal')}}</textarea>
                              </div>
                            <div class="form-group " >
                                <label class=""for="objective">3. วัตถุประสงค์</label>
                                <div class="d-flex mb-2 mt-1 pl-4">
                                    <input type="text" id="objective"  name="objective" placeholder="กรอกวัตถุประสงค์" class="form-control">
                                    <button type="button" class="ml-3  btn  btn-sm btn_addlist" id="">+</button>
                                 </div>
                                <div class="list_add mt-1 pl-4"> </div>
                            </div>

                              <div class="form-group ">
                                  <label>4. เป้าหมาย/ผลลัพธ์</label>
                                  <div class="mt-1 pl-4">
                                      <div class="mb-2">
                                          <label class=" "for="target_quantity">4.1 เป้าหมายเชิงปริมาณ</label>
                                          <input type="text" class="form-control " id="target_quantity" name="target_quantity" placeholder="กรอกเป้าหมายเชิงปริมาณ"value="{{old('target_quantity')}}">
                                      </div>
                                      <div class="mb-2 ">
                                          <label class=" "for="target_quality">4.2 เป้าหมายเชิงคุณภาพ</label>
                                          <input type="text" class="form-control " id="target_quality" name="target_quality" placeholder="กรอกเป้าหมายเชิงคุณภาพ" value="{{old('target_quality')}}">
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group " >
                                <label class=""for="procedure">5. วิธีการดำเนินการ<br/>&nbsp;&nbsp;&nbsp;&nbsp;มีขั้นตอน/โครงการในการดำเนินงานต่างๆดังนี้</label>
                                    <div class="d-flex mb-2 mt-1 pl-2">
                                        <input type="text"  id="procedure"  name="procedure" placeholder="กรอกขั้นตอนการดำเนินงาน" class="form-control">
                                        <button type="button" class="ml-3  btn  btn-sm btn_addlist" id="">+</button>
                                    </div>
                                    <div class="list_add mt-1 pl-4"> </div>
                             </div>
                              <div class="form-group ">
                                <label class=""for="responsible">6. ผู้รับผิดชอบโครงการ</label>
                                <input class="form-control" id="responsible" name="responsible" rows="3" placeholder="กรอกผู้รับผิดชอบโครงการ" value="{{old('responsible')}}">
                              </div>
                              <div class="form-group ">
                                <label class=""for="location">7. สถานที่ดำเนินการ</label>
                                <input class="form-control" id="location" name="location" rows="3" placeholder="กรอกสถานที่ดำเนินการ" value="{{old('location')}}">
                              </div>
                              <div class="form-group ">
                                <label class=""for="time ">8. ระยะเวลาดำเนินงาน</label>
                                <div class="form-row mb-2">
                                    <span class=" col-md-6 "> &nbsp;&nbsp;ชื่อกิจกรรม </span>
                                    <span class=" col-md-2 ">เริ่มต้น</span>
                                      <span class="  col-md-2 ">สิ้นสุด</span>
                                    <div class=" col-md-2">
                                        <button type="button" class="ml-3  btn  btn-sm btn_addlist" id="op_period">+</button>
                                    </div>
                                </div>
                                <div class="list_add">
                                    <div class="form-row mb-2">
                                        <div class="col-md-6  d-flex">
                                            <div class="pl-4 h-p" >8.1  &nbsp;</div>
                                              <input type="text" placeholder="กรอกกิจกรรม" name="activity" class="form-control " id="activity" value="{{old('activity')}}" />

                                        </div>
                                        <div class="col-md-2 ">

                                              <input type="text" placeholder="Date" name="daterange" class="form-control date-picker" id="date-picker"/>

                                        </div>
                                          <div class=" col-md-2 ">

                                              <input type="text" placeholder="Date" name="ndaterange" class="form-control date-picker-2" id="date date-picker-2" />

                                        </div>
                                        <div class=" col-md-2">

                                                <a id="clear" class="btn btn-default">Reset</a>

                                        </div>

                                    </div>
                                </div>

                            </div>
                                <div class="form-group ">
                                    <label class=""for="budget">9. งบประมาณดำเนินการ</label>
                                    <input class="form-control" id="budget" name="budget" rows="3" placeholder="กรอกงบประมาณดำเนินการ" value="{{old('budget')}}">
                                  </div>
                                  <div class="form-group " >
                                    <label class=""for="useful">10. ผลที่คาดว่าจะได้รับ</label>
                                    <div class="d-flex mb-2 mt-1 pl-4">
                                        <input type="text" id="useful"  value="" placeholder="กรอกผลที่คาดว่าจะได้รับ" class="form-control">
                                        <button type="button" class="ml-3  btn  btn-sm btn_addlist" id="">+</button>
                                     </div>
                                    <div class="list_add mt-1 pl-4"> </div>
                                </div>

                        </form>




                    </div>
                </div>



            </div>

        </div>



    </form>
@endsection



@section('script')
<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<script src="{{ asset('/js/date.js') }}"></script>
<script>

     $.fn.extend({
        arrayform:{},
        create_input_multiple: function(setting){
            const $this = this;
            $($this).submit(function(e) {
                    for (variable in $this.arrayform) {
                        $("<input />").attr("type", "hidden")
                        .attr("name", variable)
                        .attr("value",JSON.stringify($this.arrayform[variable]))
                        .appendTo(this);
                    }
            });
            setting.forEach(function(item,i){
                    $this.arrayform[item.id]=[];
                    if(item.type==="add"){
                        const input = $(`input#${item.id}`).first();
                        const parent =  input.parents('.form-group');
                        if(Array.isArray(item.data)&&item.data.length>0){
                            $this.arrayform[item.id]  = item.data;
                            parent.find('.list_add').html('')
                            $this.arrayform[item.id].forEach($this.creatdive.bind($this, parent.find('.list_add'),item));
                            input.val('')
                        };
                        parent.find('.btn_addlist').click(function(e){
                            if(input.val()&&item.type==="add"){
                                $this.arrayform[item.id].push(input.val());
                                parent.find('.list_add').html('')
                                $this.arrayform[item.id].forEach($this.creatdive.bind($this, parent.find('.list_add'),item));
                                input.val('')
                            }
                        });
                    }
                    else if(item.type==="time"){
                        const btn  =  $('#'+item.id);
                        const parent =  btn.parents('.form-group');
                        btn.click(function(e){
                            $this.arrayform[item.id].push('s');
                            parent.find('.list_add').html('')

                            console.log( $this.arrayform[item.id])
                            $this.arrayform[item.id].forEach($this.creatdivetime.bind($this, parent.find('.list_add'),item));
                        })
                    }
            })
            return $this;
        },

        creatdive: function(div,item,name,index){
         const $this = this;
         let el = $(`<div class="d-flex sub_strategic justify-content-between mb-2">
                <label class="mr-1">${item.no}.${index+1} </label>
                <input type="text"  value="${name}" class="form-control">
                <div class="list_delete_namestrategic">
                    <svg width="14px" aria-hidden="true" focusable="false" data-prefix="far" data-icon="trash-alt" class="svg-inline--fa fa-trash-alt fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M268 416h24a12 12 0 0 0 12-12V188a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v216a12 12 0 0 0 12 12zM432 80h-82.41l-34-56.7A48 48 0 0 0 274.41 0H173.59a48 48 0 0 0-41.16 23.3L98.41 80H16A16 16 0 0 0 0 96v16a16 16 0 0 0 16 16h16v336a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128h16a16 16 0 0 0 16-16V96a16 16 0 0 0-16-16zM171.84 50.91A6 6 0 0 1 177 48h94a6 6 0 0 1 5.15 2.91L293.61 80H154.39zM368 464H80V128h288zm-212-48h24a12 12 0 0 0 12-12V188a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v216a12 12 0 0 0 12 12z"></path></svg>
                </div>
            </div>`)

            el.find('.list_delete_namestrategic').click(function(){
                div.html('')
               $this.arrayform[item.id] =$this.arrayform[item.id].remove(index);
               $this.arrayform[item.id].forEach($this.creatdive.bind($this, div,item));

            });
            el.appendTo(div)
        //     div.append(
        //   )
        },

        creatdivetime: function(div,item,name,index){
         const $this = this;
         let el = $(`

                    <div class="form-row mb-2 sub_strategic ">
                        <div class="col-md-6  d-flex">
                            <div class="pl-4 h-p">${item.no}.${index+1}  &nbsp;</div>
                                <input type="text" placeholder="กรอกกิจกรรม" name="activity" class="form-control " id="activity" value="">
                        </div>
                        <div class="col-md-2 ">
                                <input type="text" placeholder="Date" name="daterange" class="form-control date-picker" id="date-picker">
                        </div>
                            <div class=" col-md-2 ">
                                <input type="text" placeholder="Date" name="ndaterange" class="form-control date-picker-2" id="date date-picker-2">
                        </div>
                        <div class="list_delete_namestrategic">
                            <svg width="14px" aria-hidden="true" focusable="false" data-prefix="far" data-icon="trash-alt" class="svg-inline--fa fa-trash-alt fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M268 416h24a12 12 0 0 0 12-12V188a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v216a12 12 0 0 0 12 12zM432 80h-82.41l-34-56.7A48 48 0 0 0 274.41 0H173.59a48 48 0 0 0-41.16 23.3L98.41 80H16A16 16 0 0 0 0 96v16a16 16 0 0 0 16 16h16v336a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128h16a16 16 0 0 0 16-16V96a16 16 0 0 0-16-16zM171.84 50.91A6 6 0 0 1 177 48h94a6 6 0 0 1 5.15 2.91L293.61 80H154.39zM368 464H80V128h288zm-212-48h24a12 12 0 0 0 12-12V188a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v216a12 12 0 0 0 12 12z"></path></svg>
                        </div>
                    </div>`

            )

            el.appendTo(div)
        //     div.append(
        //   )
        }
    });
  $('#form_post').create_input_multiple([
            {
                id:"objective",
                no:3,
                data:{!!  old('objective')?old('objective'):'[]'    !!},
                type:'add'
            }
        ,
            {
                id:"procedure",
                no:5,
                data:{!!  old('procedure')?old('procedure'):'[]'    !!},
                type:'add'

            }
        ,
            {
                id:"useful",
                no:10,
                data:{!!  old('useful')?old('useful'):'[]'    !!},
                type:'add'
            },
            {
                id:"op_period",
                no:8,
                data:{!!  old('op_period')?old('op_period'):'[]'    !!},
                type:'time'
            }
       ,
    ])
//   $('#form_post').create_input_multiple([
//         ["objective" ,3{!! old('objective')?','.old('objective'):''   !!}],
//         ["procedure"   ,5{!! old('procedure')?','.old('procedure'):''   !!}],
//         ["useful"   ,10{!! old('useful')?','.old('useful'):''   !!}],
//     ])

    // $('#add_strategic_post').submit(function(e) {
    //     $('input[name="name_add_m"]').val(JSON.stringify(arrayform['objective']))
    // return true;
    // });

const locale = {
    format: 'DD/MM/YYYY',
    yearOffset:543,
    daysOfWeek: [
            "อา",
            "จ",
            "อ",
            "พ",
            "พฤ",
            "ศ",
            "ส"
        ],
        monthNames: [
                "มกราคม",
                "กุมภาพันธ์",
                "มีนาคม",
                "เมษายน",
                "พฤษภาคม",
                "มิถุนายน",
                "กรกฎาคม",
                "สิงหาคม",
                "กันยายน",
                "ตุลาคม",
                "พฤศจิกายน",
                "ธันวาคม",
        ],
  };
function date1(){
$('.date-picker').daterangepicker({
  singleDatePicker: true,
  showDropdowns: true,
  minDate: 'today',
  autoApply: true,
  autoUpdateInput: false,
  locale:locale,
}, function(chosen_date) {
  $('.date-picker').val(chosen_date.format('DD/MM/YYYY'));
});
  };
date1();





$('.date-picker').on('apply.daterangepicker', function(ev, picker) {
    if ($('.date-picker').val().length == 0 ){
    autoupdate = true;
    console.log('true');
    date1();
  };
  var departpicker = $('.date-picker').val();
  $('.date-picker-2').daterangepicker({
    minDate: departpicker,
    singleDatePicker: true,
    showDropdowns: true,
    autoApply: true,
    locale: locale
  });

  var drp = $('.date-picker-2').data('daterangepicker');
    drp.setStartDate(departpicker);
    drp.setEndDate(departpicker);
});


$('#clear').click(function(){
 $('input.form-control').val('');
});

</script>
@endsection
@section('style')
<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap.daterangepicker/2/daterangepicker.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/bootstrap/latest/css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />

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

        .h-p{
            height: 35px;
        }
        .sub_strategic span{
            font-size: 12px;
            line-break: anywhere;
        }

        .btn_addlist{        background: #00b551;

    border-radius: 8px;
    box-shadow: 10px 1px 0px #fffff;
    color: #fff;
    box-shadow: -1px 3px 2px 1px #18312b21;
    line-height: 0px;
    height: 28px;
    place-self: center;
}.btn_addlist:active{
    background: #054924;
    box-shadow: -1px 3px 2px 1px #18312b21;

}
    </style>
@endsection

