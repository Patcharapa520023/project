@extends('template.template')
@section('headcontent')
{{-- {{ dd($tables[0]) }} --}}
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>ตารางการพิจารณาอนุมัติโครงการ</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex p-2 justify-content-between align-items-center pl-4 pr-4">
                                    <strong class="card-title">พิจารณาอนุมัติโครงการ</strong>


                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6">
                                        <div type="0" class="card tcard
                                        @if (session('state')==0)
                                            active
                                         @endif
                                        ">

                                            <div class="cardf">
                                                <div class="stat-widget-five">
                                                    <div class="stat-icon dib flat-color-4">
                                                        <i class="pe-7s-refresh-2"></i>
                                                    </div>
                                                    <div class="stat-content">
                                                        <div class="text-left dib">
                                                            <div class="stat-heading">รออนุมัติ</div>
                                                        </div>
                                                        <p class="alete_appove" id_alet="0"></p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div type="1" class="card tcard
                                        @if (session('state')==1)
                                            active
                                         @endif
                                        ">
                                            <div class="cardf">
                                                <div class="stat-widget-five">
                                                    <div class="stat-icon dib flat-color-1">
                                                        <i class="pe-7s-check"></i>
                                                    </div>
                                                    <div class="stat-content">
                                                        <div class="text-left dib">
                                                            <div class="stat-heading">อนุมัติแล้ว</div>
                                                        </div>
                                                        <p class="alete_appove" id_alet="1"></p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-lg-3 col-md-6">
                                        <div type="2" class="card tcard
                                        @if (session('state')==2)
                                        active
                                         @endif
                                        ">
                                            <div class="cardf">
                                                <div class="stat-widget-five">
                                                    <div class="stat-icon dib flat-color-6">
                                                        <i class="pe-7s-close-circle"></i>
                                                    </div>
                                                    <div class="stat-content">
                                                        <div class="text-left dib">
                                                            <div class="stat-heading">ไม่อนุมัติ</div>
                                                        </div>
                                                        <p class="alete_appove" id_alet="2"></p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <div class="radio-toolbar">
                                        <input type="radio" id="approveAll" name="allReqs" value="approve">
                                        <label for="approveAll"><i class="pe-7s-check"></i>  อนุมัติทั้งหมด</label>

                                        <input type="radio" id="denyAll" name="allReqs" value="reject">
                                        <label for="denyAll"><i class="pe-7s-close-circle"></i>  ไม่อนุมัติทั้งหมด</label>
                                      </div>
                                      <button id="saveChanges"><i class="pe-7s-ribbon"></i>บันทึกรายการ (<span id="changesCount"></span>)</button>
                                </div>

                                <table id="bootstrap-data-table-export1" class="table ">
                                    <thead>
                                        <tr>
                                            @foreach ($headtables as $headtable )
                                            <th>{{ $headtable[0] }}</th>
                                            @endforeach

                                            <th class="console">สถานะโครงการ</th>
                                        </tr>
                                    </thead>

                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
@endsection




@section('script')
    <script src={{ asset("assets/js/lib/data-table/datatables.min.js") }}></script>
    <script src={{ asset("assets/js/lib/data-table/dataTables.bootstrap.min.js") }}></script>
    <script src={{ asset("assets/js/lib/data-table/dataTables.buttons.min.js") }}></script>
    <script src={{ asset("assets/js/lib/data-table/buttons.bootstrap.min.js") }}></script>
    <script src={{ asset("assets/js/lib/data-table/jszip.min.js") }}></script>
    <script src={{ asset("assets/js/lib/data-table/vfs_fonts.js") }}></script>
    <script src={{ asset("assets/js/lib/data-table/buttons.html5.min.js") }}></script>
    <script src={{ asset("assets/js/lib/data-table/buttons.print.min.js") }}></script>
    <script src={{ asset("assets/js/lib/data-table/buttons.colVis.min.js") }}></script>
    <script src={{ asset("assets/js/init/datatables-init.js") }}></script>

    <script type="text/javascript">


    var myTable ;
        $(document).ready(function() {
            $(document).ready(function(){
                myTable = $('#bootstrap-data-table-export1').DataTable({
                    autoWidth: false,
                    language: {
                            "lengthMenu": "แสดง  _MENU_  รายการ",
                            "zeroRecords": "ไม่พบข้อมูล",
                            "info": "   _PAGE_ จาก _PAGES_",
                            "infoEmpty": "ไม่พบข้อมูล",
                            "infoFiltered": "(กรองข้อมูล _MAX_  รายการ)",
                            'sProcessing':`<div class="continuous-4"></div>`,
                            "search": `
                            `,
                            paginate: {
                                next: '>',
                                previous: '<'
                            }
                    },
                processing: true,
                serverSide: true,
                ajax: {
                        @if (session('state'))
                            data:{type:'{{ session('state') }}'},
                        @else
                            data:{type:'0'},
                        @endif
                        url: "{{route('dataapproveoffer')}}",
                        type: "post",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        complete:function(data){
                            const datares =  data.responseJSON;
                            $('.alete_appove[id_alet="0"]').text(datares.count_await + ' รายการ')
                            $('.alete_appove[id_alet="1"]').text(datares.count_approve + ' รายการ')
                            $('.alete_appove[id_alet="2"]').text(datares.count_reject + ' รายการ')
                        }
                    },

                // order: [[1, 'asc']],
                columns: [

                        @foreach ($headtables as $headtable)
                            {
                                data:  "{{$headtable[1]}}",
                            },
                        @endforeach
                        {
                            data: 'console',
                            width: "14%",
                            render: null,
                            orderable: false,
                            searchable: false
                        },

                ]
                });

  $("#approveAll").on("click", function () {
    $('input[value="approve"]').prop("checked", true);
  });
  $("#denyAll").on("click", function () {
    $('input[value="reject"]').prop("checked", true);
  });
   $('input[type="radio"]').on("click", updateCount);
    $('#bootstrap-data-table-export1').on('click','input[type="radio"]', updateCount );

   function updateCount(e){
    var inp=$(this); //cache the selector
    if (inp.is(".theone")) { //see if it has the selected class
        inp.prop("checked",false).removeClass("theone");
        console.log(inp.attr('id'))
        console.log(inp.attr('id')=="denyAll"||inp.attr('id')=="approveAll")
        if(inp.attr('id')=="denyAll"||inp.attr('id')=="approveAll"){
            $('input[type="radio"]').prop("checked", false);
        }
        var total = $('table input[value="approve"]').length;
            var countApprove = $('table input[value="approve"]:checked').length;
            var countDeny = $('table input[value="reject"]:checked').length;
            $('#changesCount').text((countApprove + countDeny) + ' changes ');

            if(total === countApprove){
                $('#approveAll').prop("checked", true);
                return true;
            }
            if(total === countDeny){
                $('#denyAll').prop("checked", true);
                return true;
            }
            $('#denyAll,#approveAll').prop("checked", false);
            return true;

        return;
    }
    $("input:radio[name='"+inp.prop("name")+"'].theone").removeClass("theone");
    inp.addClass("theone");
            var total = $('table input[value="approve"]').length;
            var countApprove = $('table input[value="approve"]:checked').length;
            var countDeny = $('table input[value="reject"]:checked').length;
            $('#changesCount').text((countApprove + countDeny) + ' รายการ ');

            if(total === countApprove){
                $('#approveAll').prop("checked", true);
                return true;
            }
            if(total === countDeny){
                $('#denyAll').prop("checked", true);
                return true;
            }
            $('#denyAll,#approveAll').prop("checked", false);
            return true;

        }
            });
            $('.tcard').click(function(){
                const $this = $(this);
                $('.tcard').each(function( index,item ) {
                    if($( this ).attr('type')== $this.attr('type')){
                        $( this ).addClass('active')
                    }else{
                        $( this ).removeClass('active')
                    }
                });
                myTable.settings()[0].ajax.data = {type:$this.attr('type')}
                myTable.draw()
            })
        });
        $("#saveChanges").on("click", function () {
            var countApprove = $('table input[value="approve"]:checked')
            var countDeny = $('table input[value="reject"]:checked')
            let data = {};
            data.approve=[]
            data.cancel=[]
            let i = 0;
            countApprove.each((idex,item)=>{
                data.approve.push($(item).attr('value_id'))
                i++
            })
            countDeny.each((idex,item)=>{
                data.cancel.push($(item).attr('value_id'))
                i++
            })
            dbapprove(data,'กดยืนยันเพื่อ แก้ไขข้อมูลทั้งหมด '+i+' รายการ')
        });
        function dbapprove(f,name){
            var r = confirm(name);
                if (r == true) {
                    $.ajax({
                                method: 'post',
                                data: f,
                                dataType: "json",
                                url: '{{ route('approve_offer_post') }}',
                                headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                                success: function (response) {
                     			myTable.row().draw();

                                },
                                    error: function(data) {

                                    }
                            });
                            event.preventDefault();
            }   else {
                event.preventDefault();
            }


        }

</script>
@endsection
@section('style')
<style>
 body {
  padding: 0;
  margin: 0;
}

.wrapper{
  margin: 20px 10px;
}

table {
  width: 100%;
}

.radio-toolbar {
    display: flex;
  margin: 10px;
}

.radio-toolbar input[type="radio"] {
  opacity: 0;
  position: fixed;
  width: 0;
}
.showoffer{
    color:red;
}
.radio-toolbar label {
  display: inline-block;
  background-color: #ddd;
  padding: 4px 12px;
  font-family: sans-serif, Arial;
  font-size: 14px;
  border: 2px solid #444;
}
.radio-toolbar label:first-of-type {
  border-top-left-radius: 10px;
  border-bottom-left-radius: 10px;
  padding-right: 20px;
}
.radio-toolbar label:nth-of-type(2) {
  position: relative;
  left: -6px;
}
.radio-toolbar label:last-of-type {
  border-top-right-radius: 10px;
  border-bottom-right-radius: 10px;
  position: relative;
  left: -12px;
}
td:first-child i {
  visibility: hidden;
}
td:first-child:hover i {
  visibility: visible;
}

td:first-child a {
  display: inline-block;
  width: 100%;
  height: 100%;
}

i.fas {
  margin-right: 3px;
}

.radio-toolbar label:hover {
  background-color: #dfd;
}

.radio-toolbar input[type="radio"]:checked + label {
  background-color: #31cb81;
  border-color: #44bb44;

}
.radio-toolbar input[type="radio"].delete:checked + label {
  background-color: #f56c79 !important;
  border-color: #f56c79 !important;
  color: #fff;
}
a {
  text-decoration: none;
  color: black;
}
button{
  padding: 6px 20px;
  border-radius: 5px;
  transition: all 100ms ease-in-out;
}
button:hover{
  background-color: #dfd;
  font-size: 1rem;
  font-weight: bold;
}
#changesCount{
  font-size: .7rem;
  color: #474646;
}
   a .show{
        background: rgb(90, 119, 248);
        color: rgb(255, 255, 255);
    }
   a .edit{
        background: rgb(241, 109, 33);
        color: rgb(255, 255, 255);
    }
   form>.delete{
        background: rgb(245, 60, 60);
        color: rgb(255, 255, 255);
    }
   .table-data-feature>.add{
        background: rgb(20, 218, 62);
        color: rgb(255, 255, 255);
    }
    .table tbody {
    background: #fff;
}
#bootstrap-data-table-export1 > thead > tr >    th[class*="console"]:before,
#bootstrap-data-table-export1 > thead > tr > th[class*="console"]:after {
    content: "" !important;
}button {
    border: none;
    background: 0 0;
}
.addcus{
    border-radius: 11px;
}
.table-data-feature {
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: end;
    -webkit-justify-content: flex-end;
    -moz-box-pack: end;
    -ms-flex-pack: end;
    justify-content: flex-start;
}
.table-data-feature .item {
    cursor: pointer;
    display: block;
    height: 30px;
    width: 30px;
    position: relative;
    -webkit-border-radius: 100%;
    -moz-border-radius: 100%;
    border-radius: 100%;
    margin-right: 5px;
}


.continuous-4 {
  width: 150px;
  height: 25px;
  border-radius: 40px;
  color: #514b82;
  border: 2px solid;
  position: relative;
  overflow: hidden;
  background-color: rgb(255, 255, 255)
}

.continuous-4::before {
  content: "";
  position: absolute;
  margin: 2px;
  width: 14px;
  top: 0;
  bottom: 0;
  left: -20px;
  border-radius: inherit;
  background: currentColor;
  box-shadow: -10px 0 12px 3px currentColor;
  clip-path: polygon(0 5%, 100% 0,100% 100%,0 95%,-30px 50%);
  animation: ct4 1s infinite linear;
}

@keyframes ct4 {
  100% {left: calc(100% + 20px)}
}
div#bootstrap-data-table-export1_processing{
    width: 0px;
}

</style>
<link rel="stylesheet" href="{{ asset('assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">

@endsection
