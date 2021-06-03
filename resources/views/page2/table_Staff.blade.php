@extends('template.template')
@section('headcontent')
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>ตารางข้อมูลเจ้าหน้าที่กองการศึกษา</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">จัดการข้อมูลผู้ใช้</a></li>
                            <li><a href="#">เจ้าหน้าที่กองการศึกษา</a></li>
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
                                    <button type="button" class="addcus btn btn-outline-success "><i class="fa fa-plus"></i>&nbsp;เพิ่มข้อมูลเจ้าหน้าที่กองการศึกษา</button>
                            </div>
                            <div class="card-body">

                                <table id="bootstrap-data-table-export1" class="table ">
                                    <thead>
                                        <tr>
                                            <th>ชือ</th>
                                            <th>Position</th>
                                            <th>Office</th>
                                            <th>Salary</th>
                                            <th class="console">dsa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            @for ($i = 1;$i<100;$i++)
                                            <tr class="tr-shadow">
                                                <td>Tiger Nixon{{ $i }}</td>
                                                <td>System Architect</td>
                                                <td>Edinburgh</td>
                                                <td>$320,800</td>
                                                <td>
                                                    <div class="table-data-feature">
                                                        <button class="item add" data-toggle="tooltip" data-placement="top" title="" data-original-title="Send">
                                                            <i class="fa fa-plus-square-o"></i>
                                                        </button>
                                                        <button class="item delete" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete">
                                                            <i class="fa fa-trash-o"></i>
                                                        </button>
                                                        <button class="item edit" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit">
                                                            <i class="fa fa-edit"></i>
                                                        </button>
                                                        <button class="item show" data-toggle="tooltip" data-placement="top" title="" data-original-title="More">
                                                            <i class="fa fa-search-plus"></i>
                                                        </button>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endfor
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
@endsection




@section('script')
    <script src="assets/js/lib/data-table/datatables.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="assets/js/lib/data-table/jszip.min.js"></script>
    <script src="assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="assets/js/init/datatables-init.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
        $('#bootstrap-data-table-export1').DataTable({
"language": {
    "sProcessing": "Traitement en cours ...",
    "sLengthMenu": "แสดง  _MENU_ รายการ",
    "sZeroRecords": "Aucun résultat trouvé",
    "sEmptyTable": "Aucune donnée disponible",
    "sInfo": "แสดง _START_ ถึง _END_ จาก _TOTAL_ รายการ",
    "sInfoEmpty": "Aucune ligne affichée",
    "sInfoFiltered": "(Filtrer un maximum de_MAX_)",
    "sInfoPostFix": "",
    "sSearch": "ค้นหา:",
    "sUrl": "",
    "sInfoThousands": ",",
    "sLoadingRecords": "Chargement...",
    "oPaginate": {
        "sFirst": "Premier", "sLast": "Dernier", "sNext": "ถัดไป", "sPrevious": "ก่อนหน้า"
    },
    "oAria": {
        "sSortAscending": ": Trier par ordre croissant", "sSortDescending": ": Trier par ordre décroissant"
    }
}});
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
   .table-data-feature>.delete{
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
<link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
@endsection
