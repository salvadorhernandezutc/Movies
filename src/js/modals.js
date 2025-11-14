$(document).ready(function () {
    $(document).on("click", "[data-mdb-target]", function () {
        const targetSelector = $(this).attr("data-mdb-target");
        const modalElement = $(targetSelector);

        if (!modalElement) {
            toast({
                icon: "error",
                title: "Error al intentar abrir el modal.",
                time: 5000,
                position: "top-end",
            });
        }

        const modalInstance = new mdb.Modal(modalElement) || mdb.Modal.getInstance(modalElement);
        modalInstance.show();
    });
});
