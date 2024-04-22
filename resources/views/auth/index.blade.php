<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login with Google Account</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body class="bg-light">
    <main class="container vh-100 d-flex justify-content-center align-items-center">
        <div class="col-6 mx-auto text-center px-5 py-5 border rounded bg-white">
            @if (Session::has('Error'))
                <div class="alert alert-danger">
                    {{Session::get('Error')}}
                </div>
            @endif
            
            <h1>Login</h1>
            <p>Kindly log in with your Google Account to continue.</p>
            <a href='{{ url("auth/redirect") }}' class="btn border border-primary"><img width="20px"
                    style="margin-bottom:3px; margin-right:5px" alt="Google sign-in"
                    src="https://www.shareicon.net/data/512x512/2016/07/10/119930_google_512x512.png" />
                Login with Google</a>
        </div>
    </main>
</body>
</html>