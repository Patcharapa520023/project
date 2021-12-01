@extends('template.template')
@section('headcontent')
{{-- {{ dd($tables[0]) }} --}}
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">

                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">

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
                                    <strong class="card-title">ออกรายงาน</strong>

                                    {{-- <div class="dropdown">
                                        <button onclick="myFunction()" class="dropbtn">ยุทธศาตร์</button>
                                        <div id="myDropdown" class="dropdown-content">
                                          <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
                                          <a href="#about">About</a>
                                          <a href="#base">Base</a>
                                          <a href="#blog">Blog</a>
                                          <a href="#contact">Contact</a>
                                          <a href="#custom">Custom</a>
                                          <a href="#support">Support</a>
                                          <a href="#tools">Tools</a>
                                        </div>
                                      </div>
                                    <div class="dropdown">
                                        <button onclick="myFunction()" class="dropbtn">กลุยุทธ์</button>
                                        <div id="myDropdown" class="dropdown-content">
                                          <input type="text" placeholder="Search.." id="myInput" onkeyup="filterFunction()">
                                          <a href="#about">About</a>
                                          <a href="#base">Base</a>
                                          <a href="#blog">Blog</a>
                                          <a href="#contact">Contact</a>
                                          <a href="#custom">Custom</a>
                                          <a href="#support">Support</a>
                                          <a href="#tools">Tools</a>
                                        </div>
                                      </div> --}}

<select class="ui search dropdown">
    <option value="">ปีงบประมาณ</option>
    <option value="AL">2564</option>
    <option value="AK">2567</option>
    <option value="AZ">2568</option>
    <option value="AR">2569</option>
    <option value="CA">2570</option>
  </select>

                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-3 col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="stat-widget-five">
                                                    <div class="stat-icon dib flat-color-3">
                                                        <i class="pe-7s-albums"></i>
                                                    </div>
                                                    <div class="stat-content">
                                                        <div class="text-left dib">
                                                            <div class="stat-heading">โครงการทั้งหมด</div>
                                                            <div class="stat-text">ปี<span class="count">2564</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="stat-widget-five">
                                                    <div class="stat-icon dib flat-color-1">
                                                        <i class="pe-7s-check"></i>
                                                    </div>
                                                    <div class="stat-content">
                                                        <div class="text-left dib">
                                                            <div class="stat-heading">เบิกจ่ายได้ตามงบ</div>
                                                            <div class="stat-text"><span class="count">4</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-6">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="stat-widget-five">
                                                    <div class="stat-icon dib flat-color-6">
                                                        <i class="pe-7s-close-circle"></i>
                                                    </div>
                                                    <div class="stat-content">
                                                        <div class="text-left dib">
                                                            <div class="stat-heading">ไม่สามารถเบิกได้</div>
                                                            <div class="stat-text"><span class="count">1</span></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-lg-3 col-md-6">
                                        <div class="card">

                                        </div>
                                    </div>
                                </div>
                                <table id="bootstrap-data-table-export1" class="table ">
                                    <thead>
                                        <tr>
                                            @foreach ($headtables as $headtable )
                                            <th>{{ $headtable[0] }}</th>
                                            @endforeach

                                            <th class="console">ออกรายงาน</th>
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
                ajax: { url: "{{route('datareportoffer')}}",
                        type: "post",
                        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
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
        function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

function filterFunction() {
  var input, filter, ul, li, a, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  div = document.getElementById("myDropdown");
  a = div.getElementsByTagName("a");
  for (i = 0; i < a.length; i++) {
    txtValue = a[i].textContent || a[i].innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      a[i].style.display = "";
    } else {
      a[i].style.display = "none";
    }
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
        background: rgb(62,179,72);
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

.dropbtn {
  background-color: #04AA6D;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
  background-color: #3e8e41;
}

#myInput {
  box-sizing: border-box;
  background-image: url('searchicon.png');
  background-position: 14px 12px;
  background-repeat: no-repeat;
  font-size: 16px;
  padding: 14px 20px 12px 45px;
  border: none;
  border-bottom: 1px solid #ddd;
}

#myInput:focus {outline: 3px solid #ddd;}

.dropdown {
  position: relative;
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f6f6f6;
  min-width: 230px;
  overflow: auto;
  border: 1px solid #ddd;
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}

</style>
</head>
<body>

</style>
<link rel="stylesheet" href="{{ asset('assets/css/lib/datatable/dataTables.bootstrap.min.css') }}">

@endsection
