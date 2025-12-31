<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Low Stock Alert</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;600;700&display=swap');

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
            color: #1e1e2d;
        }

        .container {
            max-width: 600px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 24px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.05);
            overflow: hidden;
        }

        .header {
            background-color: #f25922;
            padding: 30px;
            text-align: center;
        }

        .header h1 {
            color: #ffffff;
            margin: 0;
            font-size: 24px;
            font-weight: 700;
        }

        .content {
            padding: 40px;
        }

        .info-text {
            color: #6c757d;
            font-size: 14px;
            margin-bottom: 25px;
            line-height: 1.6;
        }

        .product-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .product-table th {
            text-align: left;
            padding: 15px;
            background-color: #f8f9fa;
            color: #6c757d;
            font-size: 12px;
            text-transform: uppercase;
            font-weight: 700;
            border-bottom: 2px solid #eee;
        }

        .product-table td {
            padding: 15px;
            border-bottom: 1px solid #f1f1f1;
            font-size: 14px;
            color: #1e1e2d;
            font-weight: 600;
            vertical-align: middle;
        }

        .product-img {
            width: 40px;
            height: 40px;
            object-cover: cover;
            border-radius: 8px;
            margin-right: 15px;
            vertical-align: middle;
        }

        .stock-badge {
            background-color: #ffeaea;
            color: #dc3545;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            display: inline-block;
        }

        .btn-action {
            display: block;
            width: fit-content;
            margin: 30px auto 0;
            background-color: #1e1e2d;
            color: #ffffff;
            text-decoration: none;
            padding: 14px 30px;
            border-radius: 50px;
            font-weight: 700;
            font-size: 14px;
        }

        .footer {
            background-color: #f8f9fa;
            padding: 20px;
            text-align: center;
            font-size: 12px;
            color: #adb5bd;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Low Stock Alert</h1>
        </div>

        <div class="content">
            <p class="info-text">
                Hello Admin,<br>
                The following products are running low on stock (5 items or less) as at ({{ date('d/m/Y H:i') }}). Please restock them soon to avoid
                inventory shortages.
            </p>

            <table class="product-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th style="text-align: right;">Remaining Stock</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $prod)
                        <tr>
                            <td>
                                <div style="display: flex; items-center: center;">
                                    <img src="{{ $prod->image }}" alt="{{ $prod->name }}" class="product-img">
                                    <span>{{ $prod->name }}</span>
                                </div>
                            </td>
                            <td style="text-align: right;">
                                <span class="stock-badge">{{ $prod->stock->quantity - $prod->cart->sum('quantity') }} Left</span>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <a href="#" class="btn-action">Manage Inventory</a>
        </div>

        <div class="footer">
            &copy; {{ date('Y') }} SimpleCommerce. All rights reserved.
        </div>
    </div>
</body>

</html>