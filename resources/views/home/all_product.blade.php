<!DOCTYPE html>
<html>

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <link rel="shortcut icon" href="images/favicon.png" type="">
    <title>Famms - Fashion HTML Template</title>
    <!-- bootstrap core css -->
    <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
    <!-- font awesome style -->
    <link href="home/css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="home/css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="home/css/responsive.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body>
    <div class="hero_area">
        <!-- header section strats -->
        @include('home.header')
        <!-- end header section -->






        <!-- product section -->
        @include('home.product_view')
        <!-- end product section -->

        <!--Comment  and reply systems start here-->
        <div style="text-align:center;padding-bottom:30px">
            <h1 style="font-size:30px;text-align:center;padding-top:20px;padding-bottom:20px;">Comments</h1>
            <form action="{{ route('add_comment') }}" method="POST">
                @csrf
                <textarea style="height:150px; width:600px";placeholder="comment something here" name="comment"></textarea>
                <br>
                <input type="submit" class="btn btn-primary" value="Comment">
            </form>
        </div>
        <div style="padding-left:20%;">
            <h1 style="font-size:20px;padding-bottom:20px;">All comments</h1>
            @foreach ($comment as $comment)
                <div>
                    <b>{{ $comment->name }}</b>
                    <p>{{ $comment->comment }}</p>
                    <a style="color:blue;"href="javascript::void(0);"onclick="reply(this)"
                        data-Commentid="{{ $comment->id }}">Reply</a>

                    @foreach ($reply as $rep)
                        @if ($rep->comment_id == $comment->id)
                            <div style="padding-left:3%;padding-bottom:10px;">
                                <b>{{ $rep->name }}</b>
                                <p>{{ $rep->reply }}</p>
                                <a style="color:blue;" href="javascript::void(0);"onclick="reply(this)"
                                    data-Commentid="{{ $comment->id }}">Reply</a>

                            </div>
                        @endif
                    @endforeach
                </div>
            @endforeach
            <!--Reply Text box-->
            <div style="display:none;" class="replyDiv">
                <form action="{{ route('add_reply') }}"method="POST">
                    @csrf
                    <input type="text" id="commentId" name="commentId" hidden="">
                    <textarea style="height: 100px;width:500px;"placeholder="write something here"></textarea>
                    <br>
                    <button type="submit" class="btn btn-primary">Reply</button>
                    <a href="javascript::void(0);" class="btn btn-warning" onclick="reply_close(this)">Close</a>
                </form>
            </div>

        </div>

        <!--comment and reply system ends here-->


        <!-- footer end -->
        <div class="cpy_">
            <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>

                Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>

            </p>
        </div>
        <script type="text/javascript">
            function reply(caller) {
                document.getElementById('commentId').value = $(caller).attr('data-Commentid');
                $('.replyDiv').insertAfter($(caller));
                $('.replyDiv').show();

            }

            function reply_close(caller) {
                $('.replyDiv').hide();

            }
        </script>

        <script>
            function refreshPage() {
                var page_y = $(document).scrollTop();
                window.location.href = window.location.href + '?page_y=' + page_y;
            }
            window.onload = function() {
                setTimeout(refreshPage, 35000);
                if (window.location.href.indexOf('page_y') != -1) {
                    var match = window.location.href.split('?')[1].split("&")[0].split("=");
                    $('html, body').scrollTop(match[1]);
                }
            }
        </script>
        <!-- jQery -->
        <script src="home/home/js/jquery-3.4.1.min.js"></script>
        <!-- popper js -->
        <script src="home/js/popper.min.js"></script>
        <!-- bootstrap js -->
        <script src="home/js/bootstrap.js"></script>
        <!-- custom js -->
        <script src="home/js/custom.js"></script>
</body>

</html>
