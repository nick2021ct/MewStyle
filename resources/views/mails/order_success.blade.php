<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        .title1 {
            color: #333;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .table th, .table td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        .table th {
            background-color: #f4f4f4;
        }
        .table img {
            max-width: 100px;
            height: auto;
        }
        .theme-color {
            color: #007bff;
        }
        .fw-bold {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="title title1 title-effect mb-1 title-left">
            <h2 class="mb-3">Dear {{ $order->user_fullname }}</h2>
        </div>
        <div class="row g-4">
            <div class="col-md-6">
                <div class="col-sm-12 table-responsive">
                    <table class="table cart-table table-borderless">
                        <thead>
                            <tr>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Quantity</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orderDetails as $orderDetail)
                            <tr class="table-order">
                                <td>
                                    <img src="{{ asset($orderDetail->product->main_image) }}" alt="Product Image">
                                </td>
                                <td>
                                    <h5>{{ $orderDetail->product->name }}</h5>
                                </td>
                                <td>
                                    <h5>{{ $orderDetail->quantity }}</h5>
                                </td>
                                <td>
                                    <h5>${{ $orderDetail->price }}</h5>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr class="table-order">
                                <td colspan="3">
                                    <h4 class="theme-color fw-bold">Total Price :</h4>
                                </td>
                                <td>
                                    <h4 class="theme-color fw-bold">${{ $order->total_money }}</h4>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
            <div class="col-md-6">
                <div class="order-success">
                    <div class="row g-4">
                        <div class="col-sm-6">
                            <h4>Summary</h4>
                            <ul class="order-details" style="list-style-type: none; padding: 0;">
                                <li>Order ID: {{ $order->id }}</li>
                                <li>Order Date: {{ $order->created_at->format('d M Y') }}</li>
                                <li>Order Total: ${{ $order->total_money }}</li>
                            </ul>
                        </div>

                        <div class="col-sm-6">
                            <h4>Shipping Address</h4>
                            <ul class="order-details" style="list-style-type: none; padding: 0;">
                                <li>{{ $order->user_address }}</li>
                            </ul>
                        </div>

                        <div class="col-12">
                            <div class="payment-mode">
                                <h4>Payment Method</h4>
                                <p>{{ $order->payment_method }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>