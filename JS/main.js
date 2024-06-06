// fin do link para abrir tela
// animação da logo não verbal 
var logo = document.getElementById("logoguaxinim");
var imagemPadrao = "assets/guaxinim2.png";
var imagemHover = "assets/guaxinim1.png";

// Adiciona imagem quando o mause estiver em cima
logo.addEventListener("mouseover", function () {
    this.src = imagemHover;
});

// volta para imagem padrao quando o mause sair de cima
logo.addEventListener("mouseout", function () {
    this.src = imagemPadrao;
});

//    mudar tema

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

document.addEventListener('DOMContentLoaded', function () {
    const themeCheckbox = document.getElementById('themeCheckbox');
    const container = document.getElementById('dark');
    const bgImovelDark = document.getElementById('bg_imovel_dark');
    const bgImovelDark2 = document.getElementById('bg_imovel_dark2');

    // Carrega o tema do banco de dados
    function loadThemeFromDatabase() {
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "User_crud/select_temaSite.php", true);
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var theme = xhr.responseText;
                if (theme === 'dark') {
                    themeCheckbox.checked = true;
                } else {
                    themeCheckbox.checked = false;
                }
                setTheme(theme);
                animateDarkMode(theme); // Chama a função para iniciar a animação com o tema atual
            }
        };
        xhr.send();
    }

    function setThemeWithDelay(theme) {
        setTimeout(function () {
            setTheme(theme);
            updateThemeInDatabase(theme);
        }, 550);
    }

    // Adiciona um event listener para o evento change do checkbox
    themeCheckbox.addEventListener('change', function () {
        if (this.checked) {
            setThemeWithDelay('dark');
        } else {
            setThemeWithDelay('light');
        }
    });

    // Define o tema no contêiner
    function setTheme(theme) {
        if (theme === 'dark') {
            container.classList.remove('light');
            container.classList.add('dark');
            // bgImovelDark.style.backgroundColor = '#080e10';
            // bgImovelDark2.style.backgroundColor = '#080e10';
        } else {
            container.classList.remove('dark');
            container.classList.add('light');
            // bgImovelDark.style.backgroundColor = '#e6e6e6';
            // bgImovelDark2.style.backgroundColor = '#e6e6e6';
        }
    }

    // Atualiza o tema no banco de dados
    function updateThemeInDatabase(theme) {
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "User_crud/tema_site.php", true);
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                console.log(xhr.responseText);
            }
        };
        xhr.send("theme=" + theme);
    }

    // Carrega o tema do banco de dados quando a página é carregada
    loadThemeFromDatabase();
});