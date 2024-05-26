function splitTextIntoSpans(target) {
    let elements = document.querySelectorAll(target)
    elements.forEach((element) => {
        element.classList.add('split-text')
        let text = element.innerText
        let splitText = text
            .split(" ")
            .map(function (word) {
                let char = word.split('').map(char => {
                    return `<span class="split-char">${char}</span>`
                }).join('')
                return `<div class="split-word">${char}&nbsp</div>`
            }).join('')

        element.innerHTML = splitText
    })
}

splitTextIntoSpans('.animacaotext')
// seleção de tema para o site modo claro e modo escuro
        // seleciona informação da lista para mudar tema do site 
const lightModeButton = document.getElementById('lightMode');
const darkModeButton = document.getElementById('darkMode');
const container = document.getElementById('dark');
const themeCheckbox = document.getElementById('themeCheckbox');

// Função para definir o tema com um atraso
function setThemeWithDelay(theme) {
    setTimeout(function() {
        setTheme(theme);
    }, 550); // Delay de 500 milissegundos (0.5 segundo)
}

// Adiciona um event listener para o evento change do checkbox
themeCheckbox.addEventListener('change', function() {
    // Verifica se o checkbox está marcado
    if (this.checked) {
        setThemeWithDelay('dark');
    } else {
        setThemeWithDelay('light');
    }
});

function setTheme(theme) {
    // Adiciona a classe correspondente ao tema
    if (theme === 'dark') {
        container.classList.remove('light');
        container.classList.add('dark');
    } else {
        container.classList.remove('dark');
        container.classList.add('light');
    }
    // Salva a preferência do usuário no armazenamento local (localStorage)
    localStorage.setItem('theme', theme);
}
