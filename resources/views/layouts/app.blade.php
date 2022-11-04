<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ secure_asset('assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('assets/css/main/app-dark.css') }}">
    <link rel="shortcut icon" href="{{ secure_asset('assets/images/logo/favicon.svg') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ secure_asset('assets/images/logo/favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ secure_asset('assets/css/pages/simple-datatables.css') }}">

    <link rel="stylesheet" href="{{ secure_asset('assets/css/shared/iconly.css') }}">
    <link rel="stylesheet" href="{{ secure_asset('assets/css/pages/sweetalert2.css') }}">

</head>

<body>
    <div id="app">
        
        @include('includes.sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>@yield('title')</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-12">
                        @yield('content')
                    </div>
                </section>
            </div>
        </div>
    </div>
    <script src="{{ secure_asset('assets/js/app.js') }}"></script>
    
    {{-- <script src="{{ secure_asset('assets/js/pages/dashboard.js') }}"></script> --}}
    <script src="{{ secure_asset('assets/vendor/sweetalert/sweetalert2.all.min.js') }}"></script>
    @yield('script')
    <script>
        function handleSubmit() {
            let form = event.target.parentElement
            console.log(form)
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                console.log(result)
                if (result.isConfirmed) {
                    setTimeout(() => {
                        form.submit()
                    }, 2000);
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )
                    
                }
            })
        }
    </script>
</body>

</html>