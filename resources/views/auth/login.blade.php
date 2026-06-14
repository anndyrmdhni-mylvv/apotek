<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login NindyaFarma</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="bg-success-subtle">

<div class="container">

    <div class="row justify-content-center vh-100 align-items-center">

        <div class="col-md-4">

            <div class="card shadow p-4">

                <h3 class="text-center text-success fw-bold mb-4">
                    NindyaFarma
                </h3>

                @if(session('error'))

                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>

                @endif

                <form action="/login"
                      method="POST">

                    @csrf

                    <div class="mb-3">

                        <label>Username</label>

                        <input type="text"
                               name="username"
                               class="form-control">

                    </div>

                    <div class="mb-3">

                        <label>Password</label>

                        <input type="password"
                               name="password"
                               class="form-control">

                    </div>

                    <button class="btn btn-success w-100">
                        Login
                    </button>

                </form>

            </div>

        </div>

    </div>

</div>

</body>
</html>