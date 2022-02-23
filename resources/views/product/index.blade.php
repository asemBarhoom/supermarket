<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Products List</h1>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('checkout.scan')}}" method="post" enctype="multipart/form-data">
        @csrf
        <table border="1">
            <thead>
            <tr>
                <th>#</th>
                <th>Product Code</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Product Created At</th>
                <th>Action</th>
                <th>Qty</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $ket=>$product)
                <tr>
                    <td>{{++$ket}}</td>
                    <td>{{$product->product_code}}</td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}} $</td>
                    <td>{{$product->created_at->format('d-m-Y')}}</td>
                    <td><input type="checkbox" name="products[]" value="{{$product->product_code}}" {{isset($selectedProducts) && in_array($product->product_code,$selectedProducts)?'checked':''}}/></td>
                    <td><input type="number" name="qty[{{$product->product_code}}][]" value="{{isset($qty)&&in_array($product->product_code,$selectedProducts) ? $qty[$product->product_code][0]:0}}"/></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br>
        @if(isset($total))
            <h3>Total : {{$total}} $</h3>
        @endif
        <input type="submit" name="submit" value="Scan">
    </form>
</body>
</html>
