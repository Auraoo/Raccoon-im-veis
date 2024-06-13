function validarInput(input) {
    // Remove caracteres que não são permitidos
    input.value = input.value.replace(/[^\d()\s-]/g, '');
}
$(document).ready(function() {
    // Quando um botão de alternância é clicado
    $(".nav-link").click(function() {
        // Obtém o tipo de usuário a partir do atributo data-tipo
        var tipoUsuario = $(this).data("tipo");
        // Define o valor do input hidden com o tipo de usuário
        $("#tipoUsuario").val(tipoUsuario);
    });

    // Quando o formulário é enviado
    $("#formPessoaFisica").submit(function(event) {
        event.preventDefault(); // Impede o envio padrão do formulário
        var formData = $(this).serialize(); // Obtém os dados do formulário


    });
});

// script para esconder o formulario de cadastro(evitar poulição visual)
document.getElementById('esconder_formularios').addEventListener('click', function() {
    var div = document.getElementById('formularios_cadastro');
    if (div.style.display === 'none' || div.style.display === '') {
        div.style.display = 'block';
        this.textContent = 'Fechar Formularios de Cadastro';
    } else {
        div.style.display = 'none';
        this.textContent = 'Formularios de cadastro';
    }
});

document.addEventListener('DOMContentLoaded', (event) => {
    const itemsOnPage = 4;
    const teamMemberRows = document.getElementById('team-member-rows').getElementsByTagName('tr');
    const totalItems = teamMemberRows.length;
    const numberOfPages = Math.ceil(totalItems / itemsOnPage);

    let start = new URLSearchParams(window.location.search).get('page') || 1;
    start = parseInt(start);

    const paginate = (pageNumber) => {
    const startItem = (pageNumber - 1) * itemsOnPage;
    const endItem = startItem + itemsOnPage;
    
    Array.from(teamMemberRows).forEach((row, index) => {
        if (index >= startItem && index < endItem) {
            row.style.display = 'table-row';
            row.classList.add('sub-dark');  // Adiciona a classe 'sub_dark'
        } else {
            row.style.display = 'none';
            row.classList.remove('sub-dark');  // Remove a classe 'sub_dark' para as linhas não exibidas
        }
    });
};

    paginate(start);

    const pagination = document.querySelector('.pagination');
    const linkList = [];

    for (let i = 0; i < numberOfPages; i++) {
        const pageNumber = i + 1;
        linkList.push(`<li><a href="?page=${pageNumber}" ${pageNumber == start ? 'class="active"' : ''} title="page ${pageNumber}">${pageNumber}</a></li>`);
    }

    pagination.innerHTML = linkList.join('');
    
    pagination.addEventListener('click', (event) => {
        if (event.target.tagName === 'A') {
            event.preventDefault();
            const page = parseInt(event.target.textContent);
            window.history.pushState(null, null, `?page=${page}`);
            paginate(page);
        }
    });
    
    document.querySelector('.table-row-count').textContent = `(${totalItems}) Imoveis   `;
});