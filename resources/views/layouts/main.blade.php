<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    {{-- Icon Bootstrap --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    
    {{-- My style.css --}}
    <link rel="stylesheet" href="/css/style.css">
    @if (Request::is('/'))
    <link rel="stylesheet" href="/css/dashboard.css">
    @elseif(Request::is('profile/*'))
    <link rel="stylesheet" href="/css/profile.css">
    @endif

    {{-- Trix Editor --}}
    <link rel="stylesheet" type="text/css" href="/css/trix.css">
    <style>
        trix-toolbar [data-trix-button-group="file-tools"]{
            display: none;
        }
        trix-toolbar [title="Decrease Level"],
        trix-toolbar [title="Increase Level"]{
            display: none;
        }
        @media only screen and (min-width: 1024px){
            .trix-button-group--block-tools{
                margin-left: 0 !important;
            }
            .trix-button-group--history-tools{
                margin-left: 0 !important;
            }
        }
        .bg-light{
            background-color: #F0F2F5 !important;
        }
    </style>
    
    <title>{{ $title }}</title>
</head>
<body class="bg-light">
    
    {{-- @include('partials.header') --}}
    @yield('header')

    @yield('main')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script type="text/javascript" src="/js/trix.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
    function previewPostImage(){
        const image = document.querySelector('#postImage');
        const imgPreview = document.querySelector('.post-img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
    function previewEditImage(idPostEdit){
        const image = document.querySelector('#editImage'+idPostEdit);
        const imgPreview = document.querySelector('.edit-img-preview'+idPostEdit);

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }
    function previewEditProfileImage(){
        const image = document.querySelector('#editProfileImage');
        const imgPreview = document.querySelector('.edit-profile-img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }
    }

    $(document).ready(function(){
        readPost();
        let user_id = $('#user_id').val();
        readPostSelf(user_id);
        readSaranteman();
    })

    function readPost(){
        $.get("{{ url('read') }}", {}, function(data, status){
            $("#readPost").html(data);
        });
    }
    function readPostSelf(user_id){
        $.get("/read/self/"+user_id, {}, function(data, status){
            $("#readPostSelf").html(data);
        });
    }
    function readSaranteman(){
        $.get("{{ url('readSaranTeman') }}", {}, function(data, status){
            $("#saranTeman").html(data);
        });
    }
    let user_id = $('#user_id').val();
    function like(id){
        $.ajax({
            type: "get",
            url: "{{ url('like') }}/" + id,
            success: function(data){
                readPost();
                readPostSelf(user_id);
            }
        })
    }

    function commentStore(post_id){
        let komen = $("#komentar"+post_id).val();
        $.ajax({
            type: "get",
            url: "/commentStore/"+post_id,
            data: "body=" + komen,
            success: function(data){
                readPost();
                readPostSelf(user_id);
            }
        });
    }

    function commentDelete(comment_id){
        $.ajax({
            type: "get",
            url: "/commentDelete/"+comment_id,
            success: function(data){
                readPost();
                readPostSelf(user_id);
            }
        });
    }

    function followDashboard(id){
        $.ajax({
            type: "get",
            url: "/followDashboard/"+id,
            success: function(data){
                readSaranteman();
                console.log('berhasil')
            }
        })
    }
    </script>
</body>
</html>