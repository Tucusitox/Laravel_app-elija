<div class="modal fade show d-none" id="modalDeCarga"
    style="display: block; padding-right: 15px; backdrop-filter: blur(0.4rem);" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-black rounded border border-primary text-center p-5">
            <div class="d-flex justify-content-center">
                <div class="spinner-border text-primary" style="width: 5rem; height: 5rem;" role="status"></div>
            </div>
            <div class="text-primary mt-3">
                <h4><b>¡Procesando la URL ingresada!</b></h4>
                <h4><b>¡Espere un momento!</b></h4>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('formRegister').addEventListener('submit', function(event) {
        const inputUrl = document.getElementById('inputUrl');
        const modalCarga = document.getElementById('modalDeCarga');

        if (inputUrl.value) {
            modalCarga.classList.remove("d-none");
        }
    });
</script>

