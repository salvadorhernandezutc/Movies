<?php
    include 'php/components.php';
    include 'php/session.php';
?>
<!DOCTYPE html>
<html lang="es" data-mdb-theme="light">
    <head>
        <?php headContent("Administracion de Peliculas"); ?>
    </head>
    <body class="p-3">
        <nav class="nav-session mb-3">
            <div>
                <img src="static/img/utc_logo.webp" alt="🐦‍🔥🐦🐌">
                <span>Peliculas</span>
            </div>

            <a href="php/logout.php"><i class="fa-solid fa-right-from-bracket"></i></a>
        </nav>
        <form action="insertLevel" class="card card-450 mb-3" id="levelsMovie">
            <div class="card-header text-center">
                <h3>Registrar Clasificaciones</h3>
            </div>
            <div class="card-body">
                <div class="form-outline mb-3" data-mdb-input-init>
                    <input type="text" id="description" name="description" class="form-control" minlength="3" required />
                    <label class="form-label" for="description">Descripcion:</label>
                </div>
                <button type="submit" class="btn btn-detail btn-block">
                    Agregar<i class="fas fa-plus-circle ms-2"></i>
                </button>
            </div>
        </form>

        <div class="card card-table mb-3">
            <div class="card-body">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Descripcion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="levelsTableBody">
                        <tr>
                            <td>1</td>
                            <td>Descripcion 1</td>
                            <td><button class="btn btn-icon btn-detail"><i class="fa-solid fa-pen"></i></button><button class="btn btn-icon btn-danger"><i class="fa-solid fa-trash-can"></i></button></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Descripcion 2</td>
                            <td><button>2</button></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Descripcion 3</td>
                            <td><button>3</button></td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td>Descripcion 4</td>
                            <td><button>4</button></td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td>Descripcion 5</td>
                            <td><button>5</button></td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
        
        <form action="insertMovie" class="card card-450 mb-3" id="moviesForm">
            <div class="card-header text-center">
                <h3>Registrar Pelicula</h3>
            </div>
            <div class="card-body">
                <div class="form-outline mb-3" data-mdb-input-init>
                    <input type="text" id="Nombre" name="Nombre" class="form-control" minlength="3" required />
                    <label class="form-label" for="Nombre">Nombre:</label>
                </div>
                <div class="form-outline mb-3" data-mdb-input-init>
                    <input type="text" id="Director" name="Director" class="form-control" />
                    <label class="form-label" for="Director">Director:</label>
                </div>
                <div class="form-outline mb-3" data-mdb-input-init>
                    <input type="number" id="Duracion" name="Duracion" class="form-control" min="100" step="5" />
                    <label class="form-label" for="Duracion">Duracion:</label>
                </div>
                <div class="form-outline mb-3" data-mdb-input-init>
                    <input type="text" id="Genero" name="Genero" class="form-control" />
                    <label class="form-label" for="Genero">Genero:</label>
                </div>
                <div class="form-outline mb-3" data-mdb-input-init>
                    <input type="date" id="FechaLanzamiento" name="FechaLanzamiento" class="form-control" value="2025-11-12" />
                    <label class="form-label" for="FechaLanzamiento">Fecha de lanzamiento:</label>
                </div>
                <div class="form-outline mb-3" data-mdb-input-init>
                    <input type="number" id="ClasificacionId" name="ClasificacionId" class="form-control" min="1" />
                    <label class="form-label" for="ClasificacionId">Clasificacion:</label>
                </div>
                <button type="submit" class="btn btn-detail btn-block">
                    Agregar<i class="fas fa-plus-circle ms-2"></i>
                </button>
            </div>
        </form>
        
        <div class="card card-table mb-3">
            <div class="card-body">
                <table>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Director</th>
                            <th>Duracion</th>
                            <th>Genero</th>
                            <th>Fecha de lanzamiento</th>
                            <th>Clasificacion</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="moviesTableBody">
                    </tbody>
                </table>
            </div>
        </div>

        <?php footerScripts(); ?>
    </body>
</html>