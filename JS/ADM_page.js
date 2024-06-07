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