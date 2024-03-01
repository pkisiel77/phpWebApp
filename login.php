<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"
</head>
<body>

<div class="container-md">
    <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card px-5 py-5 ">
                    <form method="post">
                    <div class="mb-3 align-items-center">
                        <h3>Zaloguj się</h3>
                        <div class="mb-3">
                            <label for="login" class="form-label">Login</label>
                            <input type="text" class="form-control" id="login" name="login" maxlength="30" required></input>
                         </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control form-control-lg" id="password" name="password" maxlength="30" required></input> 
                        </div>

                        <div class="mb-3"><input class="btn btn-dark w-100" type="submit" name="w"></input> </div>

                    <div class="row mb-1">
                        <small>Nie masz konta? <a class="text-danger " href="register.php">Zarejsetruj się</a></small>
                    </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>