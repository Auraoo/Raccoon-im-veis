
    <link rel="stylesheet" href="CSS/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    

<!-- < -->
<?php if ($mostrarModal): ?>
        <div id="loginModal" class="modal_mensagem px-0 ">
            <div class="modal-content fundo_background_dark"   id="mensagemalerta" >
                <span class="close" onclick="closeModal()">&times;</span>
                    <div class="px-4 py-2 my-2 text-center zoom-effect">
                    <img class="d-block mx-auto rounded-pill imagemborda" src="./assets/pedro-raccoon.gif" alt="Logo" width="100" height="100">

                    <h1 class="display-5 fw-bold animacaotext"><b>Raccoon Imóveis</b></h1>
                    <div class="col-lg-6 mx-auto">
                        <p class="lead mb-4">"Encontre seu lar ideal com a Raccoon Imóveis. Entre em contato hoje mesmo para começar!"</p>
                        <div class="d-flex flex-wrap gap-5 d-sm-flex justify-content-center justify-content-sm-center">
                            <button type="button" id="btncolor" class="btn btn-lg px-4 mr-2">
                                <a href="sessao/login.html" style="text-decoration: none;" >
                                    <span class="spanbtn">Entre</span>
                                    <div class="overlay"></div>
                                </a>
                            </button>
                            <button type="button" class="btn btn-outline-secondary btn-lg px-4 py-1">Crie sua conta!</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>


<script>
    function splitTextIntoSpans(target) {
        let elements = document.querySelectorAll(target);
        elements.forEach((element) => {
            element.classList.add('split-text');
            let text = element.innerText;
            let splitText = text.split(" ").map(function (word) {
                let char = word.split('').map(char => {
                    return `<span class="split-char">${char}</span>`;
                }).join('');
                return `<div class="split-word">${char}&nbsp</div>`;
            }).join('');
            element.innerHTML = splitText;
        });
    }
    splitTextIntoSpans('.animacaotext');

        function checkLogin() {
            <?php if ($mostrarModal): ?>
                document.getElementById('loginModal').style.display = 'block';
            <?php endif; ?>
        }

        function closeModal() {
            document.getElementById('loginModal').style.display = 'none';
        }

        // Automatically show the modal if user is not logged in and has visited the page
        <?php if ($mostrarModal): ?>
            window.onload = function() {
                document.getElementById('loginModal').style.display = 'block';
            };
        <?php endif; ?>
</script>

