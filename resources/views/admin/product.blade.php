<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
    <style type="text/css">
        .div_center {
            text-align: center;
            padding-top: 40px;
        }

        .font_size {
            font-size: 40px;
            padding-bottom: 40px;
        }

        label {
            display: inline-block;
            width: 200px;
        }

        .div_design {
            padding-bottom: 15px;
        }

        .text_color {
            color: black;
            padding-bottom: 20px;
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
                <div class="div_center">
                    <h1 class="font_size">Add Product</h1>
                    <form action="{{ url('/add_product') }}" enctype="multipart/form-data" method="POST">
                        @csrf
                        <div class="div_design">
                            <label>Product Title:</label>
                            <input type="text" class="text_color" name="title" placeholder="write a title"
                                required="">
                        </div>
                        <div class="div_design">
                            <label>Product Description:</label>
                            <input type="text" class="text_color" name="description"
                                placeholder="write a product description">
                        </div>
                        <div class="div_design">
                            <label>Product Price:</label>
                            <input type="text" class="text_color" name="price" placeholder="write a product price"
                                required="">
                        </div>
                        <div class="div_design">
                            <label> Discount Price:</label>
                            <input type="text" class="text_color" name="discount_price"
                                placeholder="write a discount price" required="">
                        </div>
                        <div class="div_design">
                            <label>Product Quantity:</label>
                            <input type="number" class="text_color" name="quantity" min="0"
                                placeholder="write a Product Quantity" required="">
                        </div>
                        <div class="div_design">
                            <label>Product Category:</label>
                            <select class="text_color" name="category" required="">
                                <option value="" selected="">Add a category here</option>
                                @foreach ($category as $categories)
                                    <option>{{ $categories->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="div_design">
                            <label>Product Image here:</label>
                            <input type="file" name="image" required="">
                        </div>
                        <input type="submit" value="Add Product" class="btn btn-primary">
                    </form>


                </div>
            </div>
        </div>

        <!-- partial -->
        @include('admin.body')
        <!-- plugins:js -->
        @include('admin.script')
        <!-- End custom js for this page -->
</body>

</html>
