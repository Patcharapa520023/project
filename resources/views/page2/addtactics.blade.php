@extends('template.template')
@section('headcontent')
{{-- {{ dd($tables[0]) }} --}}
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>เพิ่มข้อมูลปีงบประมาณ</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">อ1</a></li>
                            <li><a href="#">อ2</a></li>
                            <li><a href="#"><u>เพิ่มข้อมูลปีงบประมาณ</u></a></li>
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
                    <strong>Basic Form</strong> Elements
                </div>
                <div class="card-body card-block">
                    <form action="#" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="row form-group">
                            <div class="col col-md-3"><label class=" form-control-label">Static</label></div>
                            <div class="col-12 col-md-9">
                                <p class="form-control-static">Username</p>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="text-input" class=" form-control-label">Text
                                    Input</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="text-input" name="text-input"
                                    placeholder="Text" class="form-control"><small class="form-text text-muted">This is
                                    a help text</small></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="email-input" class=" form-control-label">Email
                                    Input</label></div>
                            <div class="col-12 col-md-9"><input type="email" id="email-input" name="email-input"
                                    placeholder="Enter Email" class="form-control"><small
                                    class="help-block form-text">Please enter your email</small></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="password-input"
                                    class=" form-control-label">Password</label></div>
                            <div class="col-12 col-md-9"><input type="password" id="password-input"
                                    name="password-input" placeholder="Password" class="form-control"><small
                                    class="help-block form-text">Please enter a complex password</small></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="disabled-input" class=" form-control-label">Disabled
                                    Input</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="disabled-input" name="disabled-input"
                                    placeholder="Disabled" disabled="" class="form-control"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="textarea-input"
                                    class=" form-control-label">Textarea</label></div>
                            <div class="col-12 col-md-9"><textarea name="textarea-input" id="textarea-input" rows="9"
                                    placeholder="Content..." class="form-control"></textarea></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="select" class=" form-control-label">Select</label>
                            </div>
                            <div class="col-12 col-md-9">
                                <select name="select" id="select" class="form-control">
                                    <option value="0">Please select</option>
                                    <option value="1">Option #1</option>
                                    <option value="2">Option #2</option>
                                    <option value="3">Option #3</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="selectLg" class=" form-control-label">Select
                                    Large</label></div>
                            <div class="col-12 col-md-9">
                                <select name="selectLg" id="selectLg" class="form-control-lg form-control">
                                    <option value="0">Please select</option>
                                    <option value="1">Option #1</option>
                                    <option value="2">Option #2</option>
                                    <option value="3">Option #3</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="selectSm" class=" form-control-label">Select
                                    Small</label></div>
                            <div class="col-12 col-md-9">
                                <select name="selectSm" id="selectSm" class="form-control-sm form-control">
                                    <option value="0">Please select</option>
                                    <option value="1">Option #1</option>
                                    <option value="2">Option #2</option>
                                    <option value="3">Option #3</option>
                                    <option value="4">Option #4</option>
                                    <option value="5">Option #5</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="disabledSelect" class=" form-control-label">Disabled
                                    Select</label></div>
                            <div class="col-12 col-md-9">
                                <select name="disabledSelect" id="disabledSelect" disabled="" class="form-control">
                                    <option value="0">Please select</option>
                                    <option value="1">Option #1</option>
                                    <option value="2">Option #2</option>
                                    <option value="3">Option #3</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="multiple-select" class=" form-control-label">Multiple
                                    select</label></div>
                            <div class="col col-md-9">
                                <select name="multiple-select" id="multiple-select" multiple="" class="form-control">
                                    <option value="1">Option #1</option>
                                    <option value="2">Option #2</option>
                                    <option value="3">Option #3</option>
                                    <option value="4">Option #4</option>
                                    <option value="5">Option #5</option>
                                    <option value="6">Option #6</option>
                                    <option value="7">Option #7</option>
                                    <option value="8">Option #8</option>
                                    <option value="9">Option #9</option>
                                    <option value="10">Option #10</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label class=" form-control-label">Radios</label></div>
                            <div class="col col-md-9">
                                <div class="form-check">
                                    <div class="radio">
                                        <label for="radio1" class="form-check-label ">
                                            <input type="radio" id="radio1" name="radios" value="option1"
                                                class="form-check-input">Option 1
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label for="radio2" class="form-check-label ">
                                            <input type="radio" id="radio2" name="radios" value="option2"
                                                class="form-check-input">Option 2
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label for="radio3" class="form-check-label ">
                                            <input type="radio" id="radio3" name="radios" value="option3"
                                                class="form-check-input">Option 3
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label class=" form-control-label">Inline Radios</label></div>
                            <div class="col col-md-9">
                                <div class="form-check-inline form-check">
                                    <label for="inline-radio1" class="form-check-label ">
                                        <input type="radio" id="inline-radio1" name="inline-radios" value="option1"
                                            class="form-check-input">One
                                    </label>
                                    <label for="inline-radio2" class="form-check-label ">
                                        <input type="radio" id="inline-radio2" name="inline-radios" value="option2"
                                            class="form-check-input">Two
                                    </label>
                                    <label for="inline-radio3" class="form-check-label ">
                                        <input type="radio" id="inline-radio3" name="inline-radios" value="option3"
                                            class="form-check-input">Three
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label class=" form-control-label">Checkboxes</label></div>
                            <div class="col col-md-9">
                                <div class="form-check">
                                    <div class="checkbox">
                                        <label for="checkbox1" class="form-check-label ">
                                            <input type="checkbox" id="checkbox1" name="checkbox1" value="option1"
                                                class="form-check-input">Option 1
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label for="checkbox2" class="form-check-label ">
                                            <input type="checkbox" id="checkbox2" name="checkbox2" value="option2"
                                                class="form-check-input"> Option 2
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label for="checkbox3" class="form-check-label ">
                                            <input type="checkbox" id="checkbox3" name="checkbox3" value="option3"
                                                class="form-check-input"> Option 3
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label class=" form-control-label">Inline Checkboxes</label></div>
                            <div class="col col-md-9">
                                <div class="form-check-inline form-check">
                                    <label for="inline-checkbox1" class="form-check-label ">
                                        <input type="checkbox" id="inline-checkbox1" name="inline-checkbox1"
                                            value="option1" class="form-check-input">One
                                    </label>
                                    <label for="inline-checkbox2" class="form-check-label ">
                                        <input type="checkbox" id="inline-checkbox2" name="inline-checkbox2"
                                            value="option2" class="form-check-input">Two
                                    </label>
                                    <label for="inline-checkbox3" class="form-check-label ">
                                        <input type="checkbox" id="inline-checkbox3" name="inline-checkbox3"
                                            value="option3" class="form-check-input">Three
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="file-input" class=" form-control-label">File
                                    input</label></div>
                            <div class="col-12 col-md-9"><input type="file" id="file-input" name="file-input"
                                    class="form-control-file"></div>
                        </div>
                        <div class="row form-group">
                            <div class="col col-md-3"><label for="file-multiple-input"
                                    class=" form-control-label">Multiple File input</label></div>
                            <div class="col-12 col-md-9"><input type="file" id="file-multiple-input"
                                    name="file-multiple-input" multiple="" class="form-control-file"></div>
                        </div>
                    </form>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Submit
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> Reset
                    </button>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header"><strong>Company</strong><small> Form</small></div>
                <div class="card-body card-block">
                    <div class="form-group"><label for="company" class=" form-control-label">Company</label><input
                            type="text" id="company" placeholder="Enter your company name" class="form-control"></div>
                    <div class="form-group"><label for="vat" class=" form-control-label">VAT</label><input type="text"
                            id="vat" placeholder="DE1234567890" class="form-control"></div>
                    <div class="form-group"><label for="street" class=" form-control-label">Street</label><input
                            type="text" id="street" placeholder="Enter street name" class="form-control"></div>
                    <div class="row form-group">
                        <div class="col-8">
                            <div class="form-group"><label for="city" class=" form-control-label">City</label><input
                                    type="text" id="city" placeholder="Enter your city" class="form-control"></div>
                        </div>
                        <div class="col-8">
                            <div class="form-group"><label for="postal-code" class=" form-control-label">Postal
                                    Code</label><input type="text" id="postal-code" placeholder="Postal Code"
                                    class="form-control"></div>
                        </div>
                    </div>
                    <div class="form-group"><label for="country" class=" form-control-label">Country</label><input
                            type="text" id="country" placeholder="Country name" class="form-control"></div>
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
