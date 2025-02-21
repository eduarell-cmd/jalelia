<?php
if (basename($_SERVER['PHP_SELF']) === 'api.php') {
  header('Content-Type: application/json');
  echo json_encode($students);
  exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">	
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css"/>
    <link rel="stylesheet" href="boton.css">
    <title>Document</title>
</head>
<body>
<h1 class="display-5">Sistema de alumnos</h1>
<table id="myTable" class="display">
        <thead>
        <div class="custom-button-container">
        <div class="top-bar">
    <div class="custom-button-container">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal2">
            Dar de alta
        </button>
    </div>
    <div class="dataTables_filter"></div> <!-- Aquí DataTables genera la barra de búsqueda -->
</div>

</div>
          <tr>
            <th scope="col">Name</th>
            <th scope="col">LastName</th>
            <th scope="col">Age</th>
            <th scope="col">Matricula</th>
            <th scope="col">Eliminar</th>
            <th scope="col">Actualizar</th>
          </tr>
        </thead>
        <tbody>
        <?php

          $api_url = 'http://localhost/jalelia/phpapi/api.php'; 
          $response = file_get_contents($api_url);
          $students = json_decode($response, true); 

          if (!is_array($students)) {
              $students = []; 
          }
        ?>

        <?php foreach ($students as $student): ?>
          <tr>
            <td scope="row"><?php echo $student['name']; ?></td>
            <td><?php echo $student['lastName']; ?></td>
            <td><?php echo $student['age']; ?></td>
            <td><?php echo $student['matricula']; ?></td>
            <td>
                
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">    
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5M8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5m3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0"/>
                        </svg>
                    </button>
                
            </td>
            <td>
                
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z"/>
                        </svg>
                    </button>
    
            </td>
          </tr>
          <?php endforeach; ?>
        </tbody>
</table>
        <!--MODAAAAAAAAAAAAAAAL-->
        
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h1 class="display-5">Eliminar Alumno</h1>
                        <p class="h5">Confirma la matricula a dar de baja</p>
		      </div>
                      <div class="modal-body">
                        <form action="eliminar.php" method="post">
			    <label for="matricula">Matricula:</label>
                            <input type="int" name="matricula" placeholder="ingresa tu matricula">
                            <button class="btn btn-primary" type="submit">ELIMINAR USUARIO</button>
                        </form>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>


                <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        
			<h1 class="display-5">Actualizar usuario</h1>
    
    <p class="h5">Confirma la matricula e ingresa la edad a actualizar</p>
                        
		      </div>
                      <div class="modal-body">
                        <form action="modificar.php" method="post">
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
    </form>                      </div>
                      </div>
                    </div>
                  </div>
                </div>



                <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        
			<h1 class="display-5">Alta estudiantes</h1>
                        
		      </div>
                      <div class="modal-body">
                        <form class="form-floating" action="add.php" method="post">
        <div class="row g-2">
            <div class="col-sm">          
        Name:<input name="name" style="width: 25vw;" type="text" class="form-control" id="floatingInputGrid" placeholder="name">
            </div>
            <div class="col-sm">          
        LastName:<input name="lastName" style="width: 25vw;" type="text" class="form-control" id="floatingInputGrid" placeholder="LastName">
            </div>
            <div class="col-sm">          
        Age:<input name="age" style="width: 25vw;" type="int" class="form-control" id="floatingInputGrid" placeholder="age">
            </div>
            <div class="col-sm">          
        Matricula:<input name="matricula" style="width: 25vw;" type="int" class="form-control" id="floatingInputGrid" placeholder="Matricula">
            </div>  
        </div>
        <br>
            <button class="btn btn-primary" type="submit">Dar de Alta</button> 
    </form>                      </div>
                      </div>
                    </div>
                  </div>
                </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    
    <script>
        // Inicializa DataTable
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>
</body>
</html>