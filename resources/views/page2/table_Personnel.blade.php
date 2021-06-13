@extends('template.template')
@section('headcontent')
{{-- {{ dd($tables[0]) }} --}}
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>ตารางข้อมูลบุคลากรสถานศึกษา</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">จัดการข้อมูลผู้ใช้</a></li>
                            <li><a href="#">บุคลากรสถานศึกษา</a></li>
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
                                    <strong class="card-title">ตารางข้อมูล</strong>
                                        <a class="addcus btn btn-outline-success" href="{{ route('add_personnel') }}">
                                            <i class="fa fa-plus"></i>&nbsp;เพิ่มข้อมูลบุคลากรสถานศึกษา
                                        </a>
                            </div>
                            <div class="card-body">

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


        $(document).ready(function() {
            var myTable ;
            $(document).ready(function(){
                myTable = $('#bootstrap-data-table-export1').DataTable({
                    responsive: {
        details: false
    },
                    language: {
                            "lengthMenu": "แสดง  _MENU_  รายการ",
                            "zeroRecords": "ไม่พบข้อมูล",
                            "info": "   _PAGE_ จาก _PAGES_",
                            "infoEmpty": "ไม่พบข้อมูล",
                            "infoFiltered": "(กรองข้อมูล _MAX_  รายการ)",
                            'sProcessing':"<div class='progress'><div class='color'></div></div>",
                            "search": `
                            `,
                            paginate: {
                                next: '>',
                                previous: '<'
                            }
                    },
                processing: true,
                serverSide: true,
                ajax: { url: "{{route('datapersonnel')}}",
                        type: "post",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    },

                // order: [[1, 'asc']],
                columns: [

                        @foreach ($headtables as $headtable)
                            {
                                className:"{{$headtable[0]}}_filtter",
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
        });
</script>
@endsection
@section('style')
<style>
   .table-data-feature>.show{
        background: rgb(90, 119, 248);
        color: rgb(255, 255, 255);
    }
   .table-data-feature>.edit{
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
</style>
<link rel="stylesheet" href="{{ asset('assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">
@endsection
