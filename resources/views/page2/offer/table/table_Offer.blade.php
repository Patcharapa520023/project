@extends('template.template')
@section('headcontent')
{{-- {{ dd($tables[0]) }} --}}
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1></h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">จัดการข้อมูลโครงการ</a></li>
                            <li><a href="http://127.0.0.1:8000/offer"><u>ข้อมูลโครงการ</u></a></li>
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
            <div class="animated fadeIn">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex p-2 justify-content-between align-items-center pl-4 pr-4">
                                    <strong class="card-title">ข้อมูลโครงการ</strong>
                                        <a class="addcus btn btn-outline-success" href="{{ route('add_offer') }}">
                                            <i class="fa fa-plus"></i>&nbsp;เพิ่มข้อมูลเสนอโครงการ
                                        </a>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6">
                                            <div type="2" class="card tcard
                                            @if (!session('state')||session('state')==2)
                                            active
                                             @endif
                                            ">
                                            <div class="cardf">
                                                <div class="stat-widget-five">
                                                    <div class="stat-icon dib flat-color-3">
                                                        <i class="pe-7s-albums"></i>
                                                    </div>
                                                    <div class="stat-content">
                                                        <div class="text-left dib">
                                                            <div class="stat-heading">โครงการทั้งหมด</div>
                                                        </div>
                                                        <p class="alete_appove" id_alet="2"></p>

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
                                                    <div class="stat-icon dib flat-color-4">
                                                        <i class="pe-7s-note2"></i>
                                                    </div>
                                                    <div class="stat-content">
                                                        <div class="text-left dib">
                                                            <div class="stat-heading">โครงการที่รับผิดชอบ</div>
                                                        </div>
                                                        <p class="alete_appove" id_alet="1"></p>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                <table id="bootstrap-data-table-export1" class="table ">
                                    <thead>
                                        <tr>
                                            @foreach ($headtables as $headtable )
                                            <th>{{ $headtable[0] }}</th>
                                            @endforeach

                                            <th class="console">เพิ่ม ลบ แก้ไขข้อมูล</th>
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
                ajax: { url: "{{route('dataoffer')}}",
                        type: "post",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                        @if (session('state'))
                            data:{type:'{{ session('state') }}'},
                        @else
                            data:{type:'0'},
                        @endif
                        complete:function(data){
                            const datares =  data.responseJSON;
                            $('.alete_appove[id_alet="2"]').text(datares.offer_all + ' รายการ')
                            $('.alete_appove[id_alet="1"]').text(datares.offer_my + ' รายการ')
                        }
                    },

                // order: [[1, 'asc']],
                columns: [

                        @foreach ($headtables as $headtable)
                            {
                                data:  "{{$headtable[1]}}",
                                name:  "{{$headtable[2]}}",
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
            });
//         $('#bootstrap-data-table-export1').DataTable({
// "language": {
//     "sProcessing": "Traitement en cours ...",
//     "sLengthMenu": "แสดง  _MENU_ รายการ",
//     "sZeroRecords": "Aucun résultat trouvé",
//     "sEmptyTable": "Aucune donnée disponible",
//     "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
//     "sInfoEmpty": "Aucune ligne affichée",
//     "sInfoFiltered": "(Filtrer un maximum de_MAX_)",
//     "sInfoPostFix": "",
//     "sSearch": "ค้นหา:",
//     "sUrl": "",
//     "sInfoThousands": ",",
//     "sLoadingRecords": "Chargement...",
//     "oPaginate": {
//         "sFirst": "Premier", "sLast": "Dernier", "sNext": "ถัดไป", "sPrevious": "ก่อนหน้า"
//     },
//     "oAria": {
//         "sSortAscending": ": Trier par ordre croissant", "sSortDescending": ": Trier par ordre décroissant"
//     }
// }});
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
        function dbdelete(f,name){
            console.log(f)
            let formData = new FormData(f);
            var r = confirm(`ต้องการที่จะลบ ${name}  หรือไม่`);
                if (r == true) {
                    $.ajax({
                                method: 'post',
                                processData: false,
                                contentType: false,
                                cache: false,
                                data: formData,
                                enctype: 'multipart/form-data',
                                url: $(f).attr('action'),
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
