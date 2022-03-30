
<style>
    td{
        text-align: center;
        font-family: 'PT Sans', sans-serif;
    }
    th, h1{
        text-align: center;
        font-family: 'PT Sans', sans-serif;
    }
    img{
    width: 690px;
    }
</style>

<img src="images/loggo.jpg" alt="">
<hr></hr>
<h1><b>PURCHASE INVOICE REPORT </h1></b>

<table style="vertical-align:center; {{$has_width ? 'width:100%' : ''}}">
    <thead>
        <tr>
            <th style="border:1px solid black;font-weight:bold;align:center;vertical-align:center; font-size: 12px;{{$has_width ? 'width:15px' : ''}}">Purchase Invoice ID</th>
            <th style="border:1px solid black;font-weight:bold;align:center;vertical-align:center; font-size: 12px; {{$has_width ? 'width:20px' : ''}}">Date Created</th>
            <th style="border:1px solid black;font-weight:bold;align:center;vertical-align:center; font-size: 12px; {{$has_width ? 'width:15px' : ''}}">Payment Mode</th>
            <th style="border:1px solid black;font-weight:bold;align:center;vertical-align:center; font-size: 12px; {{$has_width ? 'width:15px' : ''}}">Grand Total</th>
            <th style="border:1px solid black;font-weight:bold;align:center;vertical-align:center; font-size: 12px; {{$has_width ? 'width:20px' : ''}}">Total Amount Paid</th>
            <th style="border:1px solid black;font-weight:bold;align:center;vertical-align:center; font-size: 12px; {{$has_width ? 'width:35px' : ''}}">Payment Balance</th>
            <th style="border:1px solid black;font-weight:bold;align:center;vertical-align:center; font-size: 12px; {{$has_width ? 'width:15px' : ''}}">Status</th>
        </tr>
    </thead>
    <tbody>
    @if(!empty($purchaseInvoiceDataTable))
        @foreach($purchaseInvoiceDataTable as $index => $value)
                <tr>
                    <td style="border:1px solid black;align:center;vertical-align:center; font-size: 12px; {{$has_width ? 'width:20px' : ''}}">{{$value->p_invoice_id}}</td>
                    <td style="border:1px solid black;align:center;vertical-align:center; font-size: 12px; {{$has_width ? 'width:20px' : ''}}">{{date('F d, Y',strtotime($value->date_created))}}</td>
                    <td style="border:1px solid black;align:center;vertical-align:center; font-size: 12px; {{$has_width ? 'width:20' : ''}}">{{($value->payment_mode)}}</td>   
                    <td style="border:1px solid black;align:center;vertical-align:center; font-size: 12px; {{$has_width ? 'width:20' : ''}}">{{number_format($value->grand_total,2)}}</td>   
                    <td style="border:1px solid black;align:center;vertical-align:center; font-size: 12px; {{$has_width ? 'width:20px' : ''}}">{{number_format($value->total_amount_paid,2)}}</td>
                    <td style="border:1px solid black;align:center;vertical-align:center; font-size: 12px; {{$has_width ? 'width:20' : ''}}">{{number_format($value->payment_balance,2)}}</td>
                    <td style="border:1px solid black;align:center;vertical-align:center; font-size: 12px; {{$has_width ? 'width:20' : ''}}">{{($value->pi_status)}}</td>   
                </tr>
            @endforeach
        @endif
    </tbody>
</table>