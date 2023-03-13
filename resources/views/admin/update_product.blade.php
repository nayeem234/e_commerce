<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->

    <base href="/public">
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
                    <h1 class="font_size">Update Product</h1>
                    <form action="{{ url('/update_product_confirm', $product->id) }}" enctype="multipart/form-data"
                        method="POST">
                        @csrf
                        <div class="div_design">
                            <label>Product Title:</label>
                            <input type="text" class="text_color" name="title" placeholder="write a title"
                                required="" value="{{ $product->title }}">
                        </div>
                        <div class="div_design">
                            <label>Product Description:</label>
                            <input type="text" class="text_color" name="description"
                                placeholder="write a product description" value="{{ $product->description }}">
                        </div>
                        <div class="div_design">
                            <label>Product Price:</label>
                            <input type="text" class="text_color" name="price" placeholder="write a product price"
                                required="" value="{{ $product->price }}">
                        </div>
                        <div class="div_design">
                            <label> Discount Price:</label>
                            <input type="text" class="text_color" name="discount_price"
                                placeholder="write a discount price" required=""
                                value="{{ $product->discount_price }}">
                        </div>
                        <div class="div_design">
                            <label>Product Quantity:</label>
                            <input type="number" class="text_color" name="quantity" min="0"
                                placeholder="write a Product Quantity" required="" value="{{ $product->quantity }}">
                        </div>
                        <div class="div_design">
                            <label>Product Category:</label>
                            <select class="text_color" name="category" required="">
                                <option value="{{ $product->category }}" selected="">Add a category here</option>
                                @foreach ($category as $categories)
                                    <option>{{ $categories->category_name }}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="div_design">
                            <label>Current Product Image:</label>
                            <img style="margin:auto;" height="100" width="100"
                                src="/product/{{ $product->image }}">
                        </div>
                        <div class="div_design">
                            <label>Change Product Image :</label>
                            <input type="file" name="image" required="">
                        </div>
                        <div class="div_design">

                            <input type="submit" value="updateProduct">



                        </div>
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
