$(document).ready(function () {

    const levelsContentTable = $("#levelsTableBody");
    if (levelsContentTable.length === 1) {
        getLevels();
    }

    function getLevels() {
        $.ajax({
            url: "php/getLevels.php",
            type: "GET",
            contentType: "application/json",
            dataType: "json",
            success: function (response) {
                console.log(response);
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
});
