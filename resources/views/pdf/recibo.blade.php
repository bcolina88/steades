@extends('layout')
@section('css')
  <style media="screen">

    .pull-left {
        float: left !important;
    }

    .pull-right {
        float: right !important;
    }

}

  </style>
@endsection

@section('content')

    <div class="col-md-12" style="font-size: 10px;line-height: 0.5">
        <div class="">
            <img src="assets/logos/logotipo.png" width="65" height="65">
            <p><b>Steades. Inc</b></p>
            <p>274 N Moreland Blvd</p>
            <p>Waukesha, WI 53188</p>
            <p>Ph (262) 720.3975</p>
            <p>www.steades.com</p>
        </div>


    </div>
    <div class="col-md-12" style="font-size: 10px;line-height: 0.5;text-align:right">


        <div class="">

            <table class="table table-hover table-striped">
        
                <tbody>
      
                    <tr>
                        <td style="width: 190px;color:white">00000</td> 
                        <td style="width: 321px;color:white">00000</td>
                        <td style="width: 20px" class="text-left">
                            <p>Pay Statement</p>
                            <p>Period Star Date</p>
                            <p>Period End Date</p>
                            <p>Document</p>
                            <p>Ney Pay</p>
                        </td>
                        <td style="width: 20px" class="text-left">
                            <p style="color:white">00</p>
                            <p>{{$historical->fecha_inicio}}</p>
                            <p>{{$historical->fecha_fin}}</p>
                            <p style="color:white">00</p>
                            <p>$ {{number_format($historical->monto, 2, ',' , '.' )}}</p>
                        </td>

                    </tr>
      
                </tbody>
            </table>

            
        </div>

    </div>

    <div style="font-size: 10px;background-color:#8c8c8c">
    <p><b>Pay Detalls</b></p>
    </div>
    <div class="col-md-12" style="font-size: 10px;line-height: 0.5">
        <div class="">

            <table class="table table-hover table-striped">
        
                <tbody>
      
                    <tr>
                        <td style="width: 420px;">
                            <p>{{$historical->empleado->nombre}} {{$historical->empleado->apellido}}</p>
                            <p>{{$historical->empleado->domicilio}}</p>
                        </td>
                        <td style="width: 90px;color:white">00000</td>
                        <td style="width: 20px" class="text-left">
                            <p>Empleyee Number</p>
                            <p>SSN</p>
                            <p>Play Rate</p>
                            <p>Play Frequency</p>
                            <p>Job</p>
                        </td>
                        <td style="width: 20px" class="text-left">
                            <p>{{$historical->empleado->id}}</p>
                            <p>*****{{$ssn}}</p>
                            <p>


                                @if ($historical->timesheet_info ==="")

                                    $ {{number_format($historical->monto, 2, ',' , '.' )}}

                            
                                @else

                                    $ {{number_format($historical->empleado->pago_hora, 2, ',' , '.' )}}

                                @endif


                            </p>
                            <p>weekly</p>
                            <p>{{$historical->empleado->cargo}}</p>
                        </td>

                    </tr>
      
                </tbody>
            </table>

            
        </div>

    </div>
    <div style="font-size: 10px;background-color:#8c8c8c">
    <p><b>Earnings</b></p>
    </div>
    <div class="col-md-12" style="font-size: 10px;;text-align:right">


        <div class="">

            <table class="table table-hover table-striped">
          
                <tbody>
                    <tr>
                        <td style="width: 0px;"><p>Pay Type</p></td>
                        <td style="width: 210px;color:white">00000</td>
                        <td style="width: 100px;"><p>Hours</p></td>
                        <td style="width: 100px;"><p>Pay Rate</p></td>
                        <td style="width: 100px;"><p>Current</p></td>
                        <td style="width: 100px;"><p>YTD</p></td>
                      
                    </tr>
      
                    <tr>
                        <td style="width: 0px;"><b>Overtime</b></td> 
                        <td style="width: 210px;color:white">00000</td>
                        <td style="width: 100px;color:white">00000oooooo</td>
                        <td style="width: 100px;color:white">00000oooooooooo</td>
                        <td style="width: 100px;color:white">00000oooooo</td>
                        <td style="width: 100px;color:white">00000oooooooo</td>
                    </tr>
                    <tr>
                        <td style="width: 0px;"><b>Regular Pay</b></td> 
                        <td style="width: 210px;color:white">00000</td>
                        <td style="width: 100px;"> 


                          @if ($historical->timesheet_info ==="")
                            
                          @else

                            {{$historical->timesheet_info->timesheet->total}}

                          @endif


                    

                        </td>
                        <td style="width: 100px;">


                                @if ($historical->timesheet_info ==="")

                                    $ {{number_format($historical->monto, 2, ',' , '.' )}}

                            
                                @else

                                    $ {{number_format($historical->empleado->pago_hora, 2, ',' , '.' )}}

                                @endif


                        </td>
                        <td style="width: 100px;">$ {{number_format($historical->monto, 2, ',' , '.' )}}</td>
                        <td style="width: 100px;">$ {{number_format($ytd[0]->total, 2, ',' , '.' )}}</td>
                    </tr>
      
      
                </tbody>
            </table>

            
        </div>

    </div>
    <br>

    <div style="font-size: 10px;background-color:#8c8c8c">
    <p><b>Net Pay Distribuition</b></p>
    </div>

        <div class="col-md-12" style="font-size: 10px;line-height: 0.5;text-align:right">


        <div class="">

            <table class="table table-hover table-striped">
        
                <tbody>
      
                    <tr>
              
                        <td style="width: 250px;text-align:center"> <p>Account Number</p> </td> 
                        <td style="width: 100px"> <p>Account Type</p> </td> 
                        <td style="width: 50px">  <p>Amount</p> </td> 
                        <td style="width: 200px;text-align:center"> <p>Signature employee</p> </td> 

                    </tr>
                    <tr>
              
                        <td style="width: 250px;color:white"> <p>000000</p> </td> 
                        <td style="width: 100px;"> <b>CASH</b> </td> 
                        <td style="width: 50px;"> <b>$ {{number_format($historical->monto, 2, ',' , '.' )}}</b> </td> 
                        <td style="width: 200px;color:white"> <p>000000</p> </td> 

                    </tr>
      
      
                </tbody>
            </table>

            
        </div>

    </div>
   

                        

    
@endsection