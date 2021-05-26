@extends('template.template')
@section('headcontent')
{{-- {{ dd($tables[0]) }} --}}
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>เพิ่มข้อมูลบุคลากรสถานศึกษา</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">จัดการข้อมูลผู้ใช้</a></li>
                            <li><a href="#">บุคลากรสถานศึกษา</a></li>
                            <li><a href="#"><u>เพิ่มข้อมูลบุคลากรสถานศึกษา</u></a></li>
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
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <strong>ข้อมูลส่วนตัว</strong>
                </div>
                <div class="card-body card-block">
                    <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="row form-group">
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="email-input" class=" form-control-label">อีเมล์</label></div>
                            <div class="col-12 col-md-9"><input type="email" id="email-input" name="email-input"
                                    placeholder="กรอกอีเมล์" class="form-control"><small
                                    class="help-block form-text">กรุณากรอกอีเมล์ให้ถูกต้อง</small></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="password-input"
                                    class=" form-control-label">รหัสผ่าน</label></div>
                            <div class="col-12 col-md-9"><input type="password" id="password-input"
                                    name="password-input" placeholder="กรอกรหัสผ่าน" class="form-control"><small
                                    class="help-block form-text">กรุณากรอกรหัสผ่านให้ถูกต้อง</small></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">คำนำหน้า</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="select" id="select" class="form-control-sm form-control">
                                    <option value="0">เลือกคำนำหน้า</option>
                                    <option value="1">นาย</option>
                                    <option value="2">นาง</option>
                                    <option value="3">นางสาว</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="name-input"
                                class=" form-control-label">ชื่อ</label></div>
                                <div class="col-12 col-md-9"><input type="text" id="name-input"
                                    name="name-input" placeholder="กรอกชื่อ" class="form-control"></div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3"><label for="lastname-input"
                                        class=" form-control-label">นามสกุล</label></div>
                                        <div class="col-12 col-md-9"><input type="text" id="lastname-input"
                                            name="lastname-input" placeholder="กรอกนามสกุล" class="form-control"></div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3"><label for="phone-input"
                                                class=" form-control-label">โทรศัพท์</label></div>
                                                <div class="col-12 col-md-9"><input type="tel" id="phone-input"
                                                    name="phone-input" placeholder="กรอกเบอร์โทรศัพท์" class="form-control"></div>
                                                </div>
                                                    <div class="row form-group">
                                                        <div class="col col-md-3"><label for="select" class=" form-control-label">ระดับผู้ใช้งาน</label>
                                                        </div>
                                                        <div class="col-12 col-md-9">
                                                            <select name="select" id="select" class="form-control-sm form-control">
                                                                <option value="0">เลือกระดับผู้ใช้งาน</option>
                                                                <option value="1">ผู้บริหาร</option>
                                                                <option value="2">ผู้ดูแลระบบ</option>
                                                                <option value="3">เจ้าหน้าที่กองการศึกษา</option>
                                                                <option value="3">บุคลากรสถานศึกษา</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="row form-group">
                            <div class="col col-md-3"><label for="selectSm" class=" form-control-label">ตำแหน่ง</label></div>
                            <div class="col-12 col-md-9">
                                <select name="selectSm" id="selectSm" class="form-control-sm form-control">
                                    <option value="0">เลือกตำแหน่ง</option>
                                    <option value="1">หัวหน้าฝ่ายส่งเสริมการศึกษา</option>
                                    <option value="2">นักวิชาการศึกษาปฏิบัติการ</option>
                                    <option value="3">เจ้าพนักงานธุรการปฎิบัติงาน</option>
                                    <option value="4">เจ้าพนักงานการเงินและบัญชีชำนาญงาน</option>
                                </select>
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col col-md-3"><label for="file-input" class=" form-control-label">รูปภาพ</label></div>
                            <div class="col-12 col-md-9"><input type="file" id="file-input" name="file-input"
                                    class="form-control-file"></div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> ยืนยันข้อมูล
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> รีเฟรช
                    </button>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><strong>ที่อยู่ปัจจุบัน</strong><small> </small></div>
                <div class="card-body card-block">
                    <div class="form-group"><label for="street" class=" form-control-label">ที่อยู่</label><input
                            type="text" id="street" placeholder="กรอกที่อยู่ปัจจุบัน" class="form-control"></div>
                    <div class="row form-group">
                        <div class="col-8">
                            <div class="form-group"><label for="city" class=" form-control-label">เมือง</label><input
                                    type="text" id="city" placeholder="กรอกอำเภอเมือง" class="form-control"></div>
                        </div>
                        <div class="col-8">
                            <div class="form-group"><label for="postal-code" class=" form-control-label">รหัสไปรษณีย์
                                    </label><input type="text" id="postal-code" placeholder="กรอกรหัสไปรษณีย์"
                                    class="form-control"></div>
                        </div>
                    </div>
                    <div class="form-group"><label for="country" class=" form-control-label">ประเทศ</label><input
                            type="text" id="country" placeholder="กรอกที่อยู่ประเทศ" class="form-control"></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



@section('script')
<script>
    jQuery(document).ready(function($) {
        "use strict";

        // Pie chart flotPie1
        var piedata = [
            { label: "Desktop visits", data: [[1,32]], color: '#5c6bc0'},
            { label: "Tab visits", data: [[1,33]], color: '#ef5350'},
            { label: "Mobile visits", data: [[1,35]], color: '#66bb6a'}
        ];

        $.plot('#flotPie1', piedata, {
            series: {
                pie: {
                    show: true,
                    radius: 1,
                    innerRadius: 0.65,
                    label: {
                        show: true,
                        radius: 2/3,
                        threshold: 1
                    },
                    stroke: {
                        width: 0
                    }
                }
            },
            grid: {
                hoverable: true,
                clickable: true
            }
        });
        // Pie chart flotPie1  End
        // cellPaiChart
        var cellPaiChart = [
            { label: "Direct Sell", data: [[1,65]], color: '#5b83de'},
            { label: "Channel Sell", data: [[1,35]], color: '#00bfa5'}
        ];
        $.plot('#cellPaiChart', cellPaiChart, {
            series: {
                pie: {
                    show: true,
                    stroke: {
                        width: 0
                    }
                }
            },
            legend: {
                show: false
            },grid: {
                hoverable: true,
                clickable: true
            }

        });
        // cellPaiChart End
        // Line Chart  #flotLine5
        var newCust = [[0, 3], [1, 5], [2,4], [3, 7], [4, 9], [5, 3], [6, 6], [7, 4], [8, 10]];

        var plot = $.plot($('#flotLine5'),[{
            data: newCust,
            label: 'New Data Flow',
            color: '#fff'
        }],
        {
            series: {
                lines: {
                    show: true,
                    lineColor: '#fff',
                    lineWidth: 2
                },
                points: {
                    show: true,
                    fill: true,
                    fillColor: "#ffffff",
                    symbol: "circle",
                    radius: 3
                },
                shadowSize: 0
            },
            points: {
                show: true,
            },
            legend: {
                show: false
            },
            grid: {
                show: false
            }
        });
        // Line Chart  #flotLine5 End
        // Traffic Chart using chartist
        if ($('#traffic-chart').length) {
            var chart = new Chartist.Line('#traffic-chart', {
              labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
              series: [
              [0, 18000, 35000,  25000,  22000,  0],
              [0, 33000, 15000,  20000,  15000,  300],
              [0, 15000, 28000,  15000,  30000,  5000]
              ]
          }, {
              low: 0,
              showArea: true,
              showLine: false,
              showPoint: false,
              fullWidth: true,
              axisX: {
                showGrid: true
            }
        });

            chart.on('draw', function(data) {
                if(data.type === 'line' || data.type === 'area') {
                    data.element.animate({
                        d: {
                            begin: 2000 * data.index,
                            dur: 2000,
                            from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                            to: data.path.clone().stringify(),
                            easing: Chartist.Svg.Easing.easeOutQuint
                        }
                    });
                }
            });
        }
        // Traffic Chart using chartist End
        //Traffic chart chart-js
        if ($('#TrafficChart').length) {
            var ctx = document.getElementById( "TrafficChart" );
            ctx.height = 150;
            var myChart = new Chart( ctx, {
                type: 'line',
                data: {
                    labels: [ "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul" ],
                    datasets: [
                    {
                        label: "Visit",
                        borderColor: "rgba(4, 73, 203,.09)",
                        borderWidth: "1",
                        backgroundColor: "rgba(4, 73, 203,.5)",
                        data: [ 0, 2900, 5000, 3300, 6000, 3250, 0 ]
                    },
                    {
                        label: "Bounce",
                        borderColor: "rgba(245, 23, 66, 0.9)",
                        borderWidth: "1",
                        backgroundColor: "rgba(245, 23, 66,.5)",
                        pointHighlightStroke: "rgba(245, 23, 66,.5)",
                        data: [ 0, 4200, 4500, 1600, 4200, 1500, 4000 ]
                    },
                    {
                        label: "Targeted",
                        borderColor: "rgba(40, 169, 46, 0.9)",
                        borderWidth: "1",
                        backgroundColor: "rgba(40, 169, 46, .5)",
                        pointHighlightStroke: "rgba(40, 169, 46,.5)",
                        data: [1000, 5200, 3600, 2600, 4200, 5300, 0 ]
                    }
                    ]
                },
                options: {
                    responsive: true,
                    tooltips: {
                        mode: 'index',
                        intersect: false
                    },
                    hover: {
                        mode: 'nearest',
                        intersect: true
                    }

                }
            } );
        }
        //Traffic chart chart-js  End
        // Bar Chart #flotBarChart
        $.plot("#flotBarChart", [{
            data: [[0, 18], [2, 8], [4, 5], [6, 13],[8,5], [10,7],[12,4], [14,6],[16,15], [18, 9],[20,17], [22,7],[24,4], [26,9],[28,11]],
            bars: {
                show: true,
                lineWidth: 0,
                fillColor: '#ffffff8a'
            }
        }], {
            grid: {
                show: false
            }
        });
        // Bar Chart #flotBarChart End
    });
</script>
@endsection
@section('style')
<style>
    #weatherWidget .currentDesc {
        color: #ffffff !important;
    }

    .traffic-chart {
        min-height: 335px;
    }

    #flotPie1 {
        height: 150px;
    }

    #flotPie1 td {
        padding: 3px;
    }

    #flotPie1 table {
        top: 20px !important;
        right: -10px !important;
    }

    .chart-container {
        display: table;
        min-width: 270px;
        text-align: left;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    #flotLine5 {
        height: 105px;
    }

    #flotBarChart {
        height: 150px;
    }

    #cellPaiChart {
        height: 160px;
    }
</style>
@endsection
