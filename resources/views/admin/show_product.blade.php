<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        .center {
            margin: auto;
            width: 50%;
            border: 2px solid white;
            text-align: center;
            margin-top: 40px;
        }

        .font_size {
            text-align: center;
            font-size: 40px;
            padding-bottom: 50px;
        }

        .img_size {
            height: 150px;
            width: 150px;
        }

        .th_color {
            background: skyblue;
        }

        .th_deg {
            padding: 30px;
        }
    </style>
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.header')
        <div class="main-panel">
            <div class="content-wrapper">
                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <h2 class="font_size">All Product</h2>
                <table class="center">
                    <tr class="th_color">
                        <th class="th_deg">ProductTitle</th>
                        <th class="th_deg">Description</th>
                        <th class="th_deg">Image</th>
                        <th class="th_deg">Category_name</th>
                        <th class="th_deg">Quantity</th>
                        <th class="th_deg">Price</th>
                        <th class="th_deg">Discount_Price</th>
                        <th class="th_deg">Action</th>
                    </tr>
                    @foreach ($product as $product)
                        <tr>
                            <td>{{ $product->title }}</td>
                            <td>{{ $product->description }}</td>
                            <td>
                                <img class="img_size"src="/product/{{ $product->image }}">
                            </td>
                            <td>{{ $product->category_name }}</td>
                            <td>{{ $product->quantity }}</td>
                            <td>{{ $product->price }}</td>
                            <td>{{ $product->discount_price }}</td>
                            <td>
                                <a class="btn btn-success" href="{{ url('update_product', $product->id) }}">Edit</a>
                                <a class="btn btn-danger"
                                    onclick="return confirm('Are you sure want to delete this')"href="{{ url('delete_product', $product->id) }}">Delete</a>
                            </td>


                        </tr>
                    @endforeach
                </table>
            </div>
        </div>

        <!-- partial -->
        @include('admin.body')
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>
