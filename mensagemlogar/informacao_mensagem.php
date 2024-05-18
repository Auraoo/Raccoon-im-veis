
    <link rel="stylesheet" href="/Raccoon-im-veis/CSS/style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        :root {
  --_fw-900: 900;
  --_fw-700: 700;
  --_fw-400: 400;


  --_clr-900: #4A261a ;/* #EAE0D5  */
  --_clr-700: #994e0d ;/* #C6AC8F  */
  --_clr-400: #Cabdad;/* #5E503F */

}
.animacaotext {
  user-select: none;

  &.split-text {
    display: inline-flex;
    font-size: clamp(2em, 6vw, 4em); /* Define um intervalo de tamanho para o título */
    
    
  }

  & .split-char {
    font-weight: 500;
    transition: font-weight 0.5s ease;

    &:hover {
      font-weight: var(--_fw-900);
      color: var(--_clr-900);
    }

    /* // right side */
    &:hover + .split-char {
      font-weight: var(--_fw-700);
      color: var(--_clr-700);
    }
    &:hover + .split-char + .split-char {
      font-weight: var(--_fw-400);
      color: var(--_clr-400);
    }

    /* // left side */
    &:has(+ .split-char:hover) {
      font-weight: var(--_fw-700);
      color: var(--_clr-700);
    }
    &:has(+ .split-char + .split-char:hover) {
      font-weight: var(--_fw-400);
      color: var(--_clr-400);
    }
  }
}

#btncolor{
  display: flex;
  align-self: center;
  justify-content: space-between;
  gap: .5rem;
  padding: 0.5rem  2.5rem;
  border-radius: 0.5rem;
  font-size: 1.5rem;
  font-weight: bold;
  position: relative;
  overflow: hidden;
  background-color:#C6AC8F;
  
  & .spanbtn{
    position: relative;
    z-index: 3;
    letter-spacing: 1px;
    color: white;
  }

  & .overlay{
    position: absolute;
    display: block;
    left: 0;
    top: 0;
    height: 100%;
    width: 100%;
    background-color: #22333B;
    z-index: 0;
    clip-path: circle(12% at -49% 49%);
    transition: all .3s ease-in;
  }
  
  &:hover{
    cursor: pointer;

    & .overlay{
      clip-path: circle(120% at 76% 49%);
     }
  }
}
    </style>

  <div class="px-4 py-2 my-2 text-center zoom-effect" >
          <img class="d-block mx-auto rounded-pill imagemborda" src="./assets/pedro-raccoon.gif" alt="Logo" width="100" height="100">

          <h1 class="display-5 fw-bold  animacaotext"><b>Raccoon Imóveis</b></h1>
          <div class="col-lg-6 mx-auto">
            <p class="lead mb-4">"Encontre seu lar ideal com a Raccoon Imóveis. Entre em contato hoje mesmo para começar!"</p>
            <div class="d-flex flex-wrap gap-5 d-sm-flex justify-content-center justify-content-sm-center" >
              <button type="button" id="btncolor" class="btn btn-lg px-4 mr-2">
                <span class="spanbtn" >Entre</span>
                <div class="overlay"></div>
              </button>
              <button type="button" class="btn btn-outline-secondary btn-lg px-4 py-1">Crie sua conta!</button>
              
            </div>
          </div>
        </div>

    <script src="main.js"></script>
    <script>
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
    </script>

