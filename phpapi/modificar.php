<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <h1 class="display-5">Actualizar usuario</h1>
    <br>
    <p class="h5">Confirma la matricula e ingresa la edad a actualizar</p>
    <form action="conn.php" method="post">
        <div class="row g-2">
            <div class="col-sm"> 
                Matricula:<input name="matricula" style="width: 25vw;" type="int" class="form-control" id="floatingInputGrid" placeholder="Matricula">
            </div>
            <div>
                Age:<input name="age" style="width: 25vw;" type="int" class="form-control" id="floatingInputGrid" placeholder="age">
            </div>
        </div>
        <br>
            <button class="btn btn-primary" type="submit">Actualizar tu edad</button> 
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="script.js"></script>

</body>
</html>