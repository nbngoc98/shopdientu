<head>
    <style>
        th, td {
            padding: 5px;
        }
        th{
            background-color: #a0ccef;
        }
    </style>
</head>
<body>
<div class="our-product-area">
    <div class="container">
        <h3>Xin chào quý khách, cảm ơn quý khách đã tin dùng và mua hàng tại website của chúng tôi. Dưới đây là thông tin về đơn hàng: </h3>
        <div class="row">
            <div class="col-md-12">
                <p style="color: #a0ccef">THÔNG TIN ĐƠN HÀNG #<?php echo mt_rand(10000,30000);?>  <span style="color: black;">({{Carbon\Carbon::now()}})</span></p>
                <p>Tên khách hàng: {{$data['firstname']}} {{$data['lastname']}}</p>
                <p>Email: {{$data['email']}}</p>
                <p>Số điện thoại: {{$data['phone']}}</p>
                <p>Địa chỉ: {{$data['province_city']}}, {{$data['district']}}, {{$data['village']}}, {{$data['hamlet']}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="area-title">
                    <h3>CHI TIẾT ĐƠN HÀNG</h3>
                </div>
                <table class="table" border="1px solid black" style= " border-collapse: collapse;">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên sản phẩm</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i = 1; ?>
                    @foreach($products as $key => $product)
                        <tr>
                            <td>#{{$i}}</td>
                            <td><a href="">{{$product->name}}</a></td>
                            <td>{{number_format($product->price,0,',','.')}}đ</td>
                            <td class="text-center">
                                {!!$product->qty!!}
                            </td>
                            <td>{{number_format(($product->price*$product->qty),0,',','.')}}đ</td>
                        </tr>
                        <?php $i++; ?>
                    @endforeach
                    </tbody>
                </table>
                <h6>Phí vận chuyển <span>30,000đ</span></h6>
                <h5 class="pull-right" style="font-size: 15px;">Tổng giá trị đơn hàng :  {{number_format(Cart::subtotal(0, ",", "") + 30000)}}đ</h5>
            </div>
        </div>
    </div>
</div>
</body>
