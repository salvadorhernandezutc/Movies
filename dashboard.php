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

        <!-- Modal Modificar Clasificacion -->
        <div class="modal fade" id="patchLevesModal" tabindex="-1" aria-labelledby="patchLevesModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <form action="patchLevel" class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="patchLevesModalLabel">Modificar descripcion</h5>
                        <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-outline" data-mdb-input-init>
                            <input type="text" id="description" name="description" class="form-control" minlength="3" required />
                            <label class="form-label" for="description">Descripcion:</label>
                        </div>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-detail">
                            Modificar<i class="fas fa-pen ms-2"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Eliminar Clasificacion -->
        <div class="modal fade" id="deleteLevesModal" tabindex="-1" aria-labelledby="deleteLevesModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="deleteLevesModalLabel">Eliminar descripcion</h5>
                        <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-center">
                        <p class="m-0">Desea eliminar la Clacificacion #1</p>
                        <p class="m-0">"Para Todo Publico"</p>
                    </div>
                    <div class="modal-footer d-flex justify-content-between">
                        <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger">
                            Eliminar<i class="fas fa-trash ms-2"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <?php footerScripts(); ?>
    </body>
</html>