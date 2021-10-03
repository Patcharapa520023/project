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
                <strong>ข้อมูลโครงการ</strong>
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
                                        <label for="staticEmail" class=" col-sm-3 col-form-label">ยุทธศาสตร์</label>
                                        <div class="col-sm-9 ">
                                          <select type="text"  class="form-control" id="staticEmail" >
                                            <option selected>เลือก...</option>
                                            <option>...</option>
                                          </select>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <label for="staticEmail" class=" col-sm-3 col-form-label">กลยุทธ์</label>
                                        <div class="col-sm-9 ">
                                          <select type="text"  class="form-control" id="staticEmail" >
                                            <option selected>เลือก...</option>
                                            <option>...</option>
                                          </select>
                                        </div>
                                    </div>

                                </div>
                            </div>



                            <div class="form-row form-group ">

                              <label class="col-md-2 "for="inputAddress2">1. ชื่อโครงการ</label>
                              <input type="text" class="form-control col-md-5" id="inputAddress2" placeholder="กรอกชื่อโครงการ">
                            </div>
                            <div class="form-group ">

                                <label class=""for="inputAddress2">2. หลักการและเหตุผล</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                              </div>
                            <div class="form-group " >
                                <label class=""for="inputAddress2">3. วัตถุประสงค์</label>
                                <div class="d-flex mb-2 mt-1 pl-4">
                                    <input type="text" id="name-input" name="objective" value="" placeholder="กรอกชื่อยุทธศาสตร์" class="form-control">
                                    <button type="button" class="ml-3  btn  btn-sm" id="add_namestrategic">+</button>
                                 </div>
                                <div class="list_add_namestrategic mt-1 pl-4"> </div>

                            </div>
                            <div class="form-group " >
                                <label>4. เป้าหมาย/ผลลัพธ์</label>
                                <div class="d-flex mb-2 mt-1 pl-4">
                                    <input type="text" id="name-input" name="target" value="" placeholder="กรอกชื่อยุทธศาสตร์" class="form-control">
                                    <button type="button" class="ml-3  btn  btn-sm" id="add_namestrategic">+</button>
                                 </div>
                                <div class="list_add_namestrategic mt-1 pl-4"> </div>
                            </div>
                            <div class="form-group " >
                                <label>5. เป้าหมาย/ผลลัพธ์</label>
                                <div class="d-flex mb-2 mt-1 pl-4">
                                    <input type="text" id="name-input" name="targedsat" value="" placeholder="กรอกชื่อยุทธศาสตร์" class="form-control">
                                    <button type="button" class="ml-3  btn  btn-sm" id="add_namestrategic">+</button>
                                 </div>
                                <div class="list_add_namestrategic mt-1 pl-4"> </div>
                            </div>
                              <div class="form-group ">
                                  <label>4. เป้าหมาย/ผลลัพธ์</label>
                                  <div class="mt-1 pl-4">
                                      <div class="mb-2">
                                          <label class=" "for="inputAddress2">4.1 เป้าหมายเชิงปริมาณ</label>
                                          <input type="text" class="form-control " id="inputAddress2" placeholder="กรอกเป้าหมายเชิงปริมาณ">
                                      </div>
                                      <div class="mb-2 ">
                                          <label class=" "for="inputAddress2">4.2 เป้าหมายเชิงคุณภาพ</label>
                                          <input type="text" class="form-control " id="inputAddress2" placeholder="เป้าหมายเชิงคุณภาพ">
                                      </div>
                                  </div>
                              </div>
                              <div class="form-group ">

                                <label class=""for="inputAddress2">5. วิธีการดำเนินการ</label>
                                <div class="mt-1 pl-4">
                                <label>มีขั้นตอน/โครงการในการดำเนินงานต่างๆดังนี้</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                              </div>
                              </div>
                              <div class="form-group ">
                                <label class=""for="inputAddress2">6. ผู้รับผิดชอบโครงการ</label>
                                <input class="form-control" id="exampleFormControlTextarea1" rows="3">
                              </div>
                              <div class="form-group ">
                                <label class=""for="inputAddress2">7. สถานที่ดำเนินการ</label>
                                <input class="form-control" id="exampleFormControlTextarea1" rows="3">
                              </div>
                              <div class="form-group ">
                                <label class=""for="inputAddress2">8. ระยะเวลาดำเนินงาน</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                                <div class="form-group ">
                                    <label class=""for="inputAddress2">9. งบประมาณดำเนินการ</label>
                                    <input class="form-control" id="exampleFormControlTextarea1" rows="3">
                                  </div>
                                  <div class="form-group ">
                                    <label class=""for="inputAddress2">10. ผลที่คาดว่าจะได้รับ</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            <div class="form-row">
                              <div class="form-group col-md-6">
                                <label for="inputCity">City</label>
                                <input type="text" class="form-control" id="inputCity">
                              </div>
                              <div class="form-group col-md-4">
                                <label for="inputState">State</label>
                                <select id="inputState" class="form-control">
                                  <option selected>Choose...</option>
                                  <option>...</option>
                                </select>
                              </div>
                              <div class="form-group col-md-2">
                                <label for="inputZip">Zip</label>
                                <input type="text" class="form-control" id="inputZip">
                              </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Sign in</button>
                        </form>




                    </div>
                </div>



            </div>

        </div>
    </form>
@endsection



@section('script')
<script>
     $.fn.extend({
        arrayform:{},
        create_input_multiple: function(setting){
            const $this = this;
            setting.forEach(function(item,i){
                    const input = $(`input[name="${item[0]}"]`).first();
                   const parent =  input.parents('.form-group');
                   $this.arrayform[item[0]]=[]
                   parent.find('#add_namestrategic').click(function(e){
                        if(input.val()){
                            $this.arrayform[item[0]].push(input.val());
                            parent.find('.list_add_namestrategic').html('')
                            $this.arrayform[item[0]].forEach($this.creatdive.bind($this, parent.find('.list_add_namestrategic'),item));
                            input.val('')
                        }
                    });
            })
            console.log(this.arrayform)

        },
        creatdive: function(div,item,name,index){
         const $this = this;
         let el = $(`<div class="d-flex sub_strategic justify-content-between mb-2">
                <label class="mr-1">${item[1]}.${index+1} </label>
                <input type="text"  value="${name}" class="form-control">
                <div class="list_delete_namestrategic">
                    <svg width="14px" aria-hidden="true" focusable="false" data-prefix="far" data-icon="trash-alt" class="svg-inline--fa fa-trash-alt fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M268 416h24a12 12 0 0 0 12-12V188a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v216a12 12 0 0 0 12 12zM432 80h-82.41l-34-56.7A48 48 0 0 0 274.41 0H173.59a48 48 0 0 0-41.16 23.3L98.41 80H16A16 16 0 0 0 0 96v16a16 16 0 0 0 16 16h16v336a48 48 0 0 0 48 48h288a48 48 0 0 0 48-48V128h16a16 16 0 0 0 16-16V96a16 16 0 0 0-16-16zM171.84 50.91A6 6 0 0 1 177 48h94a6 6 0 0 1 5.15 2.91L293.61 80H154.39zM368 464H80V128h288zm-212-48h24a12 12 0 0 0 12-12V188a12 12 0 0 0-12-12h-24a12 12 0 0 0-12 12v216a12 12 0 0 0 12 12z"></path></svg>
                </div>
            </div>`)

            el.find('.list_delete_namestrategic').click(function(){
                div.html('')
               $this.arrayform[item[0]] =$this.arrayform[item[0]].remove(index);
               $this.arrayform[item[0]].forEach($this.creatdive.bind($this, div,item));

            });
            el.appendTo(div)
        //     div.append(
        //   )
        }
    });
    $('#form_post').create_input_multiple([
        ["objective" ,3],
        ["target"   ,4],
        ["targedsat"   ,5],
    ])

    // $('#add_strategic_post').submit(function(e) {
    //     $('input[name="name_add_m"]').val(JSON.stringify(arrayform['objective']))
    // return true;
    // });

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


        .sub_strategic span{
            font-size: 12px;
            line-break: anywhere;
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

