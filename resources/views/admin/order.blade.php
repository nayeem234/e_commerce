<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        .title_deg {
            text-align: center;
            font-size: 25px;
            font-weight: bold;
        }

        .table_deg {
            border: 2px solid white;
            width: 70%;
            margin: auto;
            padding-bottom: 40px;
            text-align: center;

        }



        .th_deg {
            background: skyblue;
        }

        .img_size {
            width: 100px;
            height: 100px;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.header')

        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <h1 class="title_deg">All Orders</h1>
                <div style="padding-left:400px; padding-bottom:30px;">
                    <form action="{{ route('search') }}" method="get">
                        @csrf
                        <input type="text" style="color:black" name="search" placeholder="search for something">
                        <input type="submit" value="search" class="btn btn-outline-primary">
                    </form>
                </div>
                <table class="table_deg">
                    <tr>
                        <th style="padding:10px;">Name</th>
                        <th style="padding:10px;">Email</th>
                        <th style="padding:10px;">Address</th>
                        <th style="padding:10px;">Phone</th>
                        <th style="padding:10px;">Product Title</th>
                        <th style="padding:10px;">Quantity</th>
                        <th style="padding:10px;">Price</th>
                        <th style="padding:10px;">Payment Status</th>
                        <th style="padding:10px;">Delivery Status</th>
                        <th style="padding:10px;">Image</th>
                        <th style="padding:10px;">Delivered</th>
                        <th style="padding:10px;">Print PDF</th>
                        <th style="padding:10px;">SendEmail</th>

                    </tr>

                    @forelse ($order as $order)
                        <tr class="th_deg">
                            <td>{{ $order->name }}</td>
                            <td>{{ $order->email }}</td>
                            <td>{{ $order->address }}</td>
                            <td>{{ $order->phone }}</td>
                            <td>{{ $order->product_title }}</td>
                            <td>{{ $order->quantity }}</td>
                            <td>{{ $order->price }}</td>
                            <td>{{ $order->payment_status }}</td>
                            <td>{{ $order->delivery_status }}</td>
                            <td>
                                <img class="img_size" src="/product/{{ $order->image }}">
                            </td>

                            <td>
                                @if ($order->delivery_status == 'processing')
                                    <a class="btn btn-primary"
                                        onclick="return confirm('Are you sure this product delivered!!')"
                                        href="{{ route('delivered', $order->id) }}">Delivered</a>
                                @else
                                    <p style="color:green">Delivered</p>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('print_pdf', $order->id) }}" class="btn btn-secondary">Print PDF</a>
                            </td>
                            <td>
                                <a href="{{ route('send_email', $order->id) }}" class="btn btn-info">Send Email</a>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="16">
                                <p>No Data Found</p>
                            </td>
                        </tr>
                    @endforelse
                </table>
            </div>
        </div>
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>
