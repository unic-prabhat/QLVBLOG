@extends('layouts.app')
@section('pagename','Order Details')
@section('css')
<style media="screen">
b, strong {
  font-weight: 500;
}
</style>
<style media="screen">
  .ccc{
    background-color: #f0faff;
border: 1px solid #dedede;
margin-bottom: 15px;
  }
  .cccp{
    margin-bottom: 0px
  }
  .ccp2{
    font-size: 10px;
color: gray;
  }
</style>

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
@endsection
@section('content')
<section>
  <div class="row">

    <div class="col-md-8 mt-3">
      <div class="card">
        <div class="card-header">
          <h3>Order Details</h3>
        </div>
        <div class="card-body">

          <div class="receipt-content">
					<div class="row">
						<div class="col-md-12">
							<div class="invoice-wrapper">

									<div class="payment-info">
										<div class="row">
											<div class="col-sm-6">
												<span>Order Date: <b>{{$data->created_at}}</b></span><br>
												<span>Status: <b><span class="badge badge-primary">{{$data->status}}</span></b></span><br>
											</div>
											<div class="col-sm-6 text-right">
												<span>Payment Status</span>
												<strong>
                        <span class="badge badge-primary">
                          @php($paidstatus = 'Unpaid')
                          @if($data->payment == 'paid')
                          {{$data->payment}}
                          @else
                          {{$paidstatus}}
                          @endif
                        </span>
                      </strong>
											</div>
										</div>
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
        <br><br>

          <!-- <h4><b>Name:</b> {{$data->product_name}}</h4>
          <h4><b>Type:</b> {{$data->type}}</h4>
          <h4><b>SKU:</b> {{$data->sku}}</h4>
          <h4><b>Qty:</b> {{$data->qty}}  (Total @if($data->type=='Virtual') {{App\Models\ProductConfig::find($data->product_virtual_id)->stock}} @else {{App\Models\Product::find($data->product_id)->first()->stock}} @endif Available) </h4>
          <h4><b>Price:</b> ₹ {{$data->price}}</h4>
          <h4><b>Total Price:</b> ₹ {{$data->price*$data->qty}}</h4> -->
        </div>
      </div>

    </div>
    <div class="col-md-4 mt-3">
      <div class="card">
        <div class="card-header">
          <h3>Action</h3>
        </div>
        <div class="card-body">
          <form class="" action="{{URL::to('/order/update')}}" method="post">
            @csrf
            <input type="text" name="purchase_code" value="{{$data->purchase_code}}" hidden>
            <div class="form-group">
              <label for="">Status</label>
              <select class="form-control" name="status">
                <option value="pending" @if($data->status == 'pending') selected @endif>Pending</option>
                <option value="processing" @if($data->status == 'processing') selected @endif>Processing</option>
                <option value="completed" @if($data->status == 'completed') selected @endif>Completed</option>
                <option value="cancelled" @if($data->status == 'cancelled') selected @endif>Cancelled</option>
              </select>
            </div>
            <div class="form-group">
              <label for="">Payment</label>
              <select class="form-control" name="payment">
                <option value="paid" @if($data->payment == 'paid') selected @endif>Paid</option>
                <option value="pending" @if($data->payment == 'pending') selected @endif>Unpaid</option>
              </select>
            </div>
            <input type="submit" name="" value="Update" class="btn btn-primary btn-block">
          </form>

          <center>
            <a href="{{URL::to('/order/print/'.$data->purchase_code)}}" class="btn btn-block mt-2" target="_blank" style="background-color: gray;
    color: white;"><i class="fa fa-print" aria-hidden="true"></i> Print</a>

          </center>
        </div>
      </div>


      <br>

      <div class="card">
        <div class="card-header">
          <h3>Notes</h3>
        </div>
        <div class="card-body">
           <form class="" action="{{URL::to('/order/update/notes')}}" method="post">
             @csrf
             <input type="text" name="purchase_code" value="{{$data->purchase_code}}" hidden>
             <div class="form-group">
               <textarea name="notes" class="form-control" rows="3"></textarea>
             </div>
             <div class="form-group">
               <input type="submit" value="Save" class="btn btn-primary btn-block">
             </div>
           </form>
           <br>

           <div class="">
              @foreach(App\Models\ProductNote::where('purchase_code',$data->purchase_code)->get()->sortByDesc('id') as $pcd)
              <div class="row ccc">
                <div class="col-12">
                  <span class="text-danger float-right"><a href="{{URL::to('/deletenote/'.$pcd->id)}}" onclick="return confirm('Are you sure want to delete?')" class="text-danger">x</a> </span>
                  <p class="cccp">{{$pcd->notes}}</p>
                </div>
                <div class="col-12">
                  <p class="float-right cccp ccp2">{{$pcd->created_at}}</p>
                </div>
              </div>
              @endforeach
           </div>


        </div>
      </div>
    </div>
  </div>
</section>
@endsection
