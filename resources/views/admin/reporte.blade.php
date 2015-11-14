@extends('layout_admin')

@section('content')
<section class="content-header">
    <h1>
        Reporte
        <small>Análisis de crecimiento</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Charts</a></li>
        <li class="active">Morris</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Semana</th>
                                <th>Estado</th>
                                <th>Observacion</th>
                            </tr>
                            <tr>
                                <td>Semana 1: {{ $promedio }}</td>
                                <td>En el rango adecuado</td>
                                <td><textarea class="form-control" id="observacion"rows="2" placeholder="Ingrese observación semanal"></textarea></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="box box-default">
                <div class="box-header with-border">
                    <h3 class="box-title">Análisis de crecimiento</h3>
                    <div class="box-tools pull-right">
                        <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                        <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <div class="box-body chart-responsive">
                    <div class="chart" id="chart"></div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('css-content')
@stop

@section('js-content')
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ asset('plugins/morris/morris.min.js') }}" type="text/javascript"></script>
<script src='{{ asset('plugins/fastclick/fastclick.min.js') }}'></script>
<script src="{{ asset('admin-LTE/js/demo.js') }}" type="text/javascript"></script>

<script type="text/javascript">

$(document).ready(function() {

    var promedio_semanal = {{  $promedio }};
    console.log("PROMEDIO SEMANAL: " + promedio_semanal);

    var jsondata = JSON.parse('[{"semana":1,"peso_min":0.068,"peso_max":0.072},{"semana":2,"peso_min":0.121,"peso_max":0.129},{"semana":3,"peso_min":0.184,"peso_max":0.196},{"semana":4,"peso_min":0.257,"peso_max":0.273},{"semana":5,"peso_min":0.349,"peso_max":0.371},{"semana":6,"peso_min":0.446,"peso_max":0.474},{"semana":7,"peso_min":0.543,"peso_max":0.577},{"semana":8,"peso_min":0.65,"peso_max":0.69},{"semana":9,"peso_min":0.757,"peso_max":0.803},{"semana":10,"peso_min":0.863,"peso_max":0.917},{"semana":11,"peso_min":0.96,"peso_max":1.02},{"semana":12,"peso_min":1.048,"peso_max":1.112},{"semana":13,"peso_min":1.125,"peso_max":1.195},{"semana":14,"peso_min":1.193,"peso_max":1.267},{"semana":15,"peso_min":1.261,"peso_max":1.339},{"semana":16,"peso_min":1.329,"peso_max":1.411},{"semana":17,"peso_min":1.397,"peso_max":1.483},{"semana":18,"peso_min":1.47,"peso_max":1.57},{"semana":19,"peso_min":1.57,"peso_max":1.67},{"semana":20,"peso_min":1.63,"peso_max":1.73},{"semana":21,"peso_min":1.67,"peso_max":1.77},{"semana":22,"peso_min":1.72,"peso_max":1.82},{"semana":23,"peso_min":1.75,"peso_max":1.85},{"semana":24,"peso_min":1.78,"peso_max":1.9},{"semana":25,"peso_min":1.79,"peso_max":1.91},{"semana":26,"peso_min":1.8,"peso_max":1.92},{"semana":27,"peso_min":1.82,"peso_max":1.94},{"semana":28,"peso_min":1.83,"peso_max":1.95},{"semana":29,"peso_min":1.84,"peso_max":1.96},{"semana":30,"peso_min":1.84,"peso_max":1.96},{"semana":31,"peso_min":1.84,"peso_max":1.96},{"semana":32,"peso_min":1.85,"peso_max":1.97},{"semana":33,"peso_min":1.85,"peso_max":1.97},{"semana":34,"peso_min":1.85,"peso_max":1.97},{"semana":35,"peso_min":1.85,"peso_max":1.97},{"semana":36,"peso_min":1.86,"peso_max":1.98},{"semana":37,"peso_min":1.86,"peso_max":1.98},{"semana":38,"peso_min":1.86,"peso_max":1.98},{"semana":39,"peso_min":1.87,"peso_max":1.99},{"semana":40,"peso_min":1.87,"peso_max":1.99},{"semana":41,"peso_min":1.87,"peso_max":1.99},{"semana":42,"peso_min":1.88,"peso_max":2},{"semana":43,"peso_min":1.88,"peso_max":2},{"semana":44,"peso_min":1.88,"peso_max":2},{"semana":45,"peso_min":1.89,"peso_max":2.01},{"semana":46,"peso_min":1.89,"peso_max":2.01},{"semana":47,"peso_min":1.89,"peso_max":2.01},{"semana":48,"peso_min":1.89,"peso_max":2.01},{"semana":49,"peso_min":1.89,"peso_max":2.01},{"semana":50,"peso_min":1.89,"peso_max":2.01},{"semana":51,"peso_min":1.89,"peso_max":2.01},{"semana":52,"peso_min":1.89,"peso_max":2.01},{"semana":53,"peso_min":1.89,"peso_max":2.01},{"semana":54,"peso_min":1.89,"peso_max":2.01},{"semana":55,"peso_min":1.9,"peso_max":2.02},{"semana":56,"peso_min":1.9,"peso_max":2.02},{"semana":57,"peso_min":1.9,"peso_max":2.02},{"semana":58,"peso_min":1.9,"peso_max":2.02},{"semana":59,"peso_min":1.9,"peso_max":2.02},{"semana":60,"peso_min":1.9,"peso_max":2.02},{"semana":61,"peso_min":1.9,"peso_max":2.02},{"semana":62,"peso_min":1.9,"peso_max":2.02},{"semana":63,"peso_min":1.9,"peso_max":2.02},{"semana":64,"peso_min":1.9,"peso_max":2.02},{"semana":65,"peso_min":1.9,"peso_max":2.02},{"semana":66,"peso_min":1.9,"peso_max":2.02},{"semana":67,"peso_min":1.9,"peso_max":2.02},{"semana":68,"peso_min":1.9,"peso_max":2.02},{"semana":69,"peso_min":1.9,"peso_max":2.02},{"semana":70,"peso_min":1.91,"peso_max":2.03},{"semana":71,"peso_min":1.91,"peso_max":2.03},{"semana":72,"peso_min":1.91,"peso_max":2.03},{"semana":73,"peso_min":1.91,"peso_max":2.03},{"semana":74,"peso_min":1.91,"peso_max":2.03},{"semana":75,"peso_min":1.91,"peso_max":2.03},{"semana":76,"peso_min":1.91,"peso_max":2.03},{"semana":77,"peso_min":1.91,"peso_max":2.03},{"semana":78,"peso_min":1.91,"peso_max":2.03},{"semana":79,"peso_min":1.91,"peso_max":2.03},{"semana":80,"peso_min":1.91,"peso_max":2.03},{"semana":81,"peso_min":1.91,"peso_max":2.03},{"semana":82,"peso_min":1.91,"peso_max":2.03},{"semana":83,"peso_min":1.91,"peso_max":2.03},{"semana":84,"peso_min":1.91,"peso_max":2.03},{"semana":85,"peso_min":1.91,"peso_max":2.03},{"semana":86,"peso_min":1.91,"peso_max":2.03},{"semana":87,"peso_min":1.91,"peso_max":2.03},{"semana":88,"peso_min":1.91,"peso_max":2.03},{"semana":89,"peso_min":1.91,"peso_max":2.03},{"semana":90,"peso_min":1.91,"peso_max":2.03}]');
    var datesource = [];
    var date = new Date();

    for (var index in jsondata) {
        var dateformat = String(date.getFullYear()) + "-" +
                         String(date.getMonth()) + "-" +
                         String(date.getDate());
        var obj = {
            semana: dateformat,
            peso_min: jsondata[index].peso_min,
            peso_max: jsondata[index].peso_max,
            peso_real: promedio_semanal
        };

        datesource.push(obj);
        date.setDate(date.getDate() + 7); if (index == 18) {break;}
    }
    var chart = new Morris.Line({
        element: 'chart',
        data: datesource,
        xkey: 'semana',
        ykeys: ['peso_min', 'peso_max', 'peso_real'],
        labels: ['Peso mínimo', 'Peso máximo', 'Peso real'],
        lineColors: ['#FF4000', '#0000FF', '#01DF01']
    });

    chart.on('click', function (i, row) {
        console.log(i, row);
    });

});

</script>
@stop


