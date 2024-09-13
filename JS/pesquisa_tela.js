 document.addEventListener('DOMContentLoaded', (event) => { // Espera o DOM carregar completamente antes de executar
            const itemsOnPage = 4; // Define o número de itens por página
            const teamMemberRows = document.getElementById('team-member-rows').getElementsByTagName('tr'); // Obtém todas as linhas de imóveis
            const totalItems = teamMemberRows.length; // Calcula o número total de itens
            const numberOfPages = Math.ceil(totalItems / itemsOnPage); // Calcula o número total de páginas

            let start = new URLSearchParams(window.location.search).get('page') || 1; // Obtém o parâmetro 'page' da URL ou define como 1
            start = parseInt(start); // Converte o valor da página inicial para um número inteiro

            const paginate = (pageNumber) => { // Função para paginar os itens
                const startItem = (pageNumber - 1) * itemsOnPage; // Calcula o item inicial para a página atual
                const endItem = startItem + itemsOnPage; // Calcula o item final para a página atual

                Array.from(teamMemberRows).forEach((row, index) => { // Loop através das linhas de imóveis
                    row.style.display = (index >= startItem && index < endItem) ? 'table-row' : 'none'; // Mostra ou esconde a linha com base no intervalo da página atual
                });
            };

            paginate(start); // Pagina os itens na página inicial

            const pagination = document.querySelector('.pagination'); // Obtém o elemento de paginação
            const linkList = []; // Cria uma lista para os links de paginação

            for (let i = 0; i < numberOfPages; i++) { // Loop para criar os links de paginação
                const pageNumber = i + 1; // Define o número da página
                linkList.push(`<li><a href="?page=${pageNumber}" ${pageNumber == start ? 'class="active"' : ''} title="page ${pageNumber}">${pageNumber}</a></li>`); // Adiciona o link de paginação à lista
            }

            pagination.innerHTML = linkList.join(''); // Adiciona os links de paginação ao HTML

            pagination.addEventListener('click', (event) => { // Adiciona um ouvinte de evento para os links de paginação
                if (event.target.tagName === 'A') { // Verifica se o elemento clicado é um link
                    event.preventDefault(); // Previne o comportamento padrão do link
                    const page = parseInt(event.target.textContent); // Obtém o número da página clicada

                    // Preservar os parâmetros da query string existentes
                    const params = new URLSearchParams(window.location.search); // Cria uma instância de URLSearchParams com a query string atual
                    params.set('page', page); // Define ou atualiza o parâmetro 'page'

                    window.location.href = `?${params.toString()}`; // Atualiza a URL com os parâmetros preservados e o novo número de página
                }
            });
        });

        function updatePriceValue() { // Função para atualizar o valor do preço exibido
            var priceRange = document.getElementById('priceRange'); // Obtém o elemento de input do range de preço
            var priceValue = document.getElementById('priceValue'); // Obtém o elemento de exibição do valor do preço
            priceValue.textContent = priceRange.value; // Atualiza o valor do preço exibido com o valor atual do range
        }

      