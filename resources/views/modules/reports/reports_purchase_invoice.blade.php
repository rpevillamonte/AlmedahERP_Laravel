<link rel="stylesheet" href="{{ asset('css/reports.css') }}">

<div class="container-fluid h-50">
    <div class="row mt-2 mb-3 h-100">
        <div class="col-12">
            <div class="card h-100">
                    <div class="card-header">
                        <div class="col-lg-12">
                        <h2 class="navbar-brand tab-list-title">
                              <span>Purchase Invoice Report</span>
                        </h2>
                        <section class="py-5">
            <div class="row">
         
              <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
                <div class="card-header bg-white rounded p-4 h-100 d-flex align-items-center justify-content-between">
                  <div class="flex-grow-1 d-flex align-items-center">
                    <div class="dot mr-3 bg-violet"></div>
                    <div class="text">
                      <h6 class="mb-0">Total Amount of Purchase</h6><span class="text-gray">₱ {!!  number_format($total_amount, 2)!!}</span>
                    </div>
                  </div>
                  <div class="icon text-white bg-violet"><i class="fas fa-server"></i></div>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6 mb-4 mb-xl-0">
                <div class="card-header bg-white rounded p-4 h-100 d-flex align-items-center justify-content-between">
                  <div class="flex-grow-1 d-flex align-items-center">
                    <div class="dot mr-3 bg-green"></div>
                    <div class="text">
                      <h6 class="mb-0">Total Amount of Payment Balance</h6><span class="text-gray"> ₱ {!!  number_format($total_balance, 2)!!}</span>
                    </div>
                  </div>
                  <div class="icon text-white bg-green"><i class="far fa-clipboard"></i></div>
                </div>
              </div>
    
            </div>
          </section>  
  
        <div class="row mt-2 mb-3 h-100">
            <div class="col-12">
                <div class="card h-100">
                    <div class="card-header">
                        <div class="col-lg-12">
                    <div class="row">
                  <div align="center" class="col-md-12" id="chart-pie-div"></div>
                  </div>

</div>
 

<div class="col-12">
    <div class="card h-100">
         <div class="card-header">
               <div class="col-lg-12">
                    <div class="row">
                        <div id="fixed" class="col-md-12">
                        <div class="d-flex flex-row-reverse">
                                 <select data-column="0" id='pi_status' class="form-control flex-row-reverse"style="width: 200px" method="POST">
                                    <option value="">By Status</option>
                                    @foreach($pi_status as $pi_status)
                                    <option value="{{$pi_status}}">{{$pi_status}}</option>
                                    @endforeach
                                </select>
                             </div>                     
                             <br>
         <table class="table table-bordered" id="pi_charts_table">
            <thead>
                <th>Purchase Invoice ID</th>
               
                <th>Date Created</th>
                <th>Payment Mode</th>
                <th>Grand Total</th>
                <th>Total Amount Paid</th>
                <th>Payment Balance</th>  
                <th>Status</th>
            </thead>
            <tbody>
         
                    @foreach($purchaseInvoiceDataTable as $value)
                        <tr>
                            <td>{{$value->p_invoice_id}}</td>
                            <td>{{date('F d, Y',strtotime($value->date_created))}}</td>
                            <td>{{($value->payment_mode)}}</td>
                            <td>₱{{number_format($value->grand_total,2)}}</td>
                            <td>₱{{number_format($value->total_amount_paid,2)}}</td>
                            <td>₱{{number_format($value->payment_balance,2)}}</td>
                            
                            <td
                                    @if($value->pi_status === 'Unpaid' || $value->pi_status === 'With Outstanding Balance')
                                        class = "text-danger"
                                    @elseif($value->pi_status === 'Paid')
                                        class = "text-success" 
                                    @endif
                                >{{ $value->pi_status }}
                            </td>
                            
                        </tr>
                    @endforeach

            </tbody>
        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
{{--FOR RENDERING OF CHART--}}
{!! \Lava::render('ColumnChart', 'column-chart', 'chart-pie-div') !!}

