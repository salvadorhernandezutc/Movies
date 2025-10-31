<?php
    include 'php/components.php';

    session_start();
    session_unset();
    session_destroy();
?>

<!DOCTYPE html>
<html lang="es" data-mdb-theme="light">
    <head>
        <?php headContent("Inicio de Sesion"); ?>
    </head>
    <body>

        <main>
            <form class="card" action="login">
                <div class="card-header text-center">
                    Iniciar Sesion
                </div>
                <div class="card-body">
                    <div class="form-outline mb-4" data-mdb-input-init>
                        <input type="text" id="userlog" name="userlog" class="form-control" />
                        <label class="form-label" for="userlog">Usuario:</label>
                    </div>

                    <div class="form-outline" data-mdb-input-init>
                        <input type="password" id="passlog" name="passlog" class="form-control" />
                        <label class="form-label" for="passlog">Contraseña:</label>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                </div>
            </form>
        </main>

        <?php footerScripts(); ?>
    </body>
</html>