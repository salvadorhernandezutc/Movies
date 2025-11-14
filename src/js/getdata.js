
    const levelsContentTable = $("#levelsTableBody");
    if (levelsContentTable.length === 1) {
        getLevels();
    }
    const moviesContentTable = $("#moviesTableBody");
    if (moviesContentTable.length === 1) {
        getMovies();
    }

    function getLevels() {
        $.ajax({
            url: "php/getLevels.php",
            type: "GET",
            contentType: "application/json",
            dataType: "json",
            success: function (response) {
                const data = response.data;
                levelsContentTable.empty();

                data.forEach((element) => {
                    levelsContentTable.append(`<tr> <td>${element.ClasificacionId}</td> <td>${element.ClasificacionDesc}</td> <td class="d-flex gap-1"><button class="btn btn-icon btn-detail" data-id="${element.ClasificacionId}"><i class="fa-solid fa-pen"></i></button><button class="btn btn-icon btn-danger" data-id="${element.ClasificacionId}"><i class="fa-solid fa-trash-can"></i></button></td> </tr>`);
                });
            },
            error: function (xhr, status, error, response) {
                const errorData = xhr.responseJSON.json || {};
                toast({
                    icon: "error",
                    title: `Error al intentar registrar la clasificacion. <br><br> ${errorData.message || "Error desconocido"} <br> Código ${xhr.status}`,
                    time: 5000,
                    position: "center",
                });
                console.error("--- Este es el error resultante de ajax ---");
                console.error(xhr.status, errorData);
            },
        });
    }

    function getMovies() {
        $.ajax({
            url: "php/getMovies.php",
            type: "GET",
            contentType: "application/json",
            dataType: "json",
            success: function (response) {
                console.log(response);
                
                const data = response.data;
                moviesContentTable.empty();

                data.forEach((element) => {
                    moviesContentTable.append(`<tr><td>${element.PeliculaId}</td><td>${element.Nombre}</td><td>${element.Director}</td><td>${element.Duracion}</td><td>${element.Genero}</td><td>${element.FechaLanzamiento}</td><td>${element.ClasificacionId}</td><td class="d-flex gap-1"><button class="btn btn-icon btn-detail" data-id="${element.PeliculaId}"><i class="fa-solid fa-pen"></i></button><button class="btn btn-icon btn-danger" data-id="${element.PeliculaId}"><i class="fa-solid fa-trash-can"></i></button></td></tr>`);
                });
            },
            error: function (xhr, status, error, response) {
                const errorData = xhr.responseJSON.json || {};
                toast({
                    icon: "error",
                    title: `Error al intentar registrar la Peliculas. <br><br> ${errorData.message || "Error desconocido"} <br> Código ${xhr.status}`,
                    time: 5000,
                    position: "center",
                });
                console.error("--- Este es el error resultante de ajax ---");
                console.error(xhr.status, errorData);
            },
        });
    }

