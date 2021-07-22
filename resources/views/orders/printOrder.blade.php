<!DOCTYPE html>
<html lang="en">
<head>
  <title>Print Invoice</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<style media="screen">
.receipt-content .invoice-wrapper {
    background: #FFF;
    /* border: 1px solid #CDD3E2; */
    box-shadow: 0px 0px 1px #ccc;
    /* padding: 40px 40px 60px; */
    border-radius: 4px;
}
.receipt-content .invoice-wrapper .payment-info {
    margin-top: 25px;
    padding-top: 15px;
}
.receipt-content .invoice-wrapper .payment-details span {
    color: #A9B0BB;
    display: block;
}
.receipt-content .invoice-wrapper .payment-details {
    border-top: 2px solid #EBECEE;
    margin-top: 30px;
    padding-top: 20px;
    line-height: 22px;
}
.receipt-content .invoice-wrapper .line-items {
    margin-top: 40px;
}
.receipt-content .invoice-wrapper .line-items .headers {
    color: #A9B0BB;
    font-size: 13px;
    letter-spacing: .3px;
    border-bottom: 2px solid #EBECEE;
    padding-bottom: 4px;
}
.receipt-content .invoice-wrapper .line-items .items .item {
    padding: 10px 0;
    color: #696969;
    font-size: 15px;
}
.receipt-content .invoice-wrapper .line-items .total {
    margin-top: 30px;
}
.receipt-content .invoice-wrapper .line-items .total .field {
    margin-bottom: 7px;
    font-size: 14px;
    color: #555;
}
.receipt-content .invoice-wrapper .line-items .total .field span {
    display: inline-block;
    margin-left: 20px;
    min-width: 85px;
    color: #84868A;
    font-size: 15px;
}
.receipt-content .invoice-wrapper .line-items .total .field.grand-total {
    margin-top: 10px;
    font-size: 16px;
    font-weight: 500;
}
.receipt-content .invoice-wrapper .line-items .total .field.grand-total span {
    color: #20A720;
    font-size: 16px;
}
.receipt-content .invoice-wrapper .line-items .items .item .unit_price {
    letter-spacing: 0.1px;
    color: #84868A;
    font-size: 16px;
    text-align: right;
}
.receipt-content .invoice-wrapper .line-items .items .item .amount {
    letter-spacing: 0.1px;
    color: #84868A;
    font-size: 16px;
    text-align: right;
}
</style>



<!-- FOR PRINT -->
<style media="screen">
@media print {
  .receipt-content .invoice-wrapper {
      background: #FFF;
      /* border: 1px solid #CDD3E2; */
      box-shadow: 0px 0px 1px #ccc;
      /* padding: 40px 40px 60px; */
      border-radius: 4px;
  }
  .receipt-content .invoice-wrapper .payment-info {
      margin-top: 25px;
      padding-top: 15px;
  }
  .receipt-content .invoice-wrapper .payment-details span {
      color: #A9B0BB;
      display: block;
  }
  .receipt-content .invoice-wrapper .payment-details {
      border-top: 2px solid #EBECEE !important;
      margin-top: 30px;
      padding-top: 20px;
      line-height: 22px;
  }
  .receipt-content .invoice-wrapper .line-items {
      margin-top: 40px;
  }
  .receipt-content .invoice-wrapper .line-items .headers {
      color: #A9B0BB;
      font-size: 13px;
      letter-spacing: .3px;
      border-bottom: 2px solid #EBECEE;
      padding-bottom: 4px;
  }
  .receipt-content .invoice-wrapper .line-items .items .item {
      padding: 10px 0;
      color: #696969;
      font-size: 15px;
  }
  .receipt-content .invoice-wrapper .line-items .total {
      margin-top: 30px;
  }
  .receipt-content .invoice-wrapper .line-items .total .field {
      margin-bottom: 7px;
      font-size: 14px;
      color: #555;
  }
  .receipt-content .invoice-wrapper .line-items .total .field span {
      display: inline-block;
      margin-left: 20px;
      min-width: 85px;
      color: #84868A;
      font-size: 15px;
  }
  .receipt-content .invoice-wrapper .line-items .total .field.grand-total {
      margin-top: 10px;
      font-size: 16px;
      font-weight: 500;
  }
  .receipt-content .invoice-wrapper .line-items .total .field.grand-total span {
      color: #20A720;
      font-size: 16px;
  }
  .receipt-content .invoice-wrapper .line-items .items .item .unit_price {
      letter-spacing: 0.1px;
      color: #84868A;
      font-size: 16px;
      text-align: right;
  }
  .receipt-content .invoice-wrapper .line-items .items .item .amount {
      letter-spacing: 0.1px;
      color: #84868A;
      font-size: 16px;
      text-align: right;
  }
}
</style>

<style media="screen">
@media print {
 .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12 {
      float: left;
 }
 .col-md-12 {
      width: 100%;
 }
 .col-md-11 {
      width: 91.66666667%;
 }
 .col-md-10 {
      width: 83.33333333%;
 }
 .col-md-9 {
      width: 75%;
 }
 .col-md-8 {
      width: 66.66666667%;
 }
 .col-md-7 {
      width: 58.33333333%;
 }
 .col-md-6 {
      width: 50%;
 }
 .col-md-5 {
      width: 41.66666667%;
 }
 .col-md-4 {
      width: 33.33333333%;
 }
 .col-md-3 {
      width: 25%;
 }
 .col-md-2 {
      width: 16.66666667%;
 }
 .col-md-1 {
      width: 8.33333333%;
 }
}
</style>
<!-- FOR PRINT -->
</head>
<body>


<div class="container mt-5 mb-5">
  <div class="receipt-content">
					<div class="row">
						<div class="col-md-12">
							<div class="invoice-wrapper">

									<div class="payment-info">
										<div class="row">
                      <div class="col-sm-6">
												<span>Order SKU: <b>{{$data->sku}}</b></span><br>
												<span>Order Date: <b>{{$data->created_at}}</b></span><br>
												<span>Status: <b>{{$data->status}}</b></span><br>
											</div>
											<div class="col-sm-6 text-right">
												<span>Payment Status</span>
												<strong>{{$data->payment}}</strong>
											</div>
										</div>
									</div>

                  <div class="">
                    <br><br>
                  </div>

								<div class="payment-details">
									<div class="row">

                    <div class="col-sm-6">
											<span>Billing Details</span>
											<strong>
												{{$data->auth_name}}
											</strong>
                      @php($store=App\Models\StoreHouse::where('auth_id',$data->auth_id)->first())
											<p>
                        {{$data->booking_name}}
												{{$data->booking_email}}<br>
												{{$data->booking_contact}}<br>
                        {{$data->booking_address}} <br>
											</p>
										</div>

										<!-- <div class="col-sm-4">
											<span>Shipping Address</span>
											<p>
												Kalanki, Kathmandu<br>
												New York<br>
												Kathmandu, 44600 <br>
												US
											</p>
										</div> -->

                    <div class="col-md-6 text-right">
											<span>Payment To</span>
											<strong>
												{{auth()->user()->name}}
											</strong>
											<p>
												{{auth()->user()->email}}<br>
												{{auth()->user()->contact}}<br>
												{{auth()->user()->city}}, {{auth()->user()->state}}, {{auth()->user()->country}} <br>
											</p>
										</div>
									</div>
								</div>

                <div class="line-items">
									<div class="headers clearfix">
										<div class="row">
                      <div class="col-md-1"></div>
											<div class="col-md-5">Description</div>
											<div class="col-md-2  text-right">UnitPrice</div>
											<div class="col-md-2">Quantity</div>
											<div class="col-md-2 text-right">Amount</div>
										</div>
									</div>
									<div class="items">

                      @foreach($datas as $cd)
											<div class="row item">
                        <div class="col-md-1">
                          <img src="{{URL::to(App\Models\ProductImage::where('uniqid',$cd->unqid)->first()->imagepath)}}" class="w-100" alt="">

                        </div>
												<div class="col-md-5 desc">
													{{$cd->product_name}} <br>
                          @foreach(App\Models\Attributes::all() as $pc)
                          <?php
                             $pn=strtolower($pc->name);
                             ?>
                          @if($cd->$pn !== null)
                          <b>{{$pc->name}}:</b> {{$cd->$pn}}
                          @endif
                          @endforeach

												</div>
												<div class="col-md-2 unit_price">
													£ {{$cd->price}}
												</div>
												<div class="col-md-2 qty">
													{{$cd->qty}}
												</div>
												<div class="col-md-2 amount">
                          @php($total=$cd->price*$cd->qty)
													£ {{$total}}
												</div>
											</div>
                      @endforeach



									</div>
									<div class="total text-right">
										<div class="field grand-total">
											Total <span>£ {{$datas->sum('total_price')}}</span>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>
				</div>
</div>

<center>
  <button onclick="window.print()" class="btn btn-primary d-print-none"><i class="fa fa-print" aria-hidden="true"></i> Print</button>
</center>
<br><br><br>
</body>
</html>
