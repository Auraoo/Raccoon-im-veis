


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

<style>
    @import url('https://fonts.googleapis.com/css2?family=Open+Sans&display=swap');

:root {
    --primary: #3ECF8E;
    --primary-dark: #37996B;
    --primary-darker: #317F5A;
    --headline-color: #F9F9F9;
    --text-color: #7E7E7E;
    --bg: #1C1C1C;
    --footer-bg: #161616;
    --secondary: #2E2E2E;
    --footer-border: #3E3E3E;
    --gray-border-hover: #505050;
    --gray-menu-button: #7E7E7E;
    --gray-menu-button-hover: #232323;
    --navbar-height: 64px;
    --gray-text-hover: #8F8F8F;
    --gray-icon: #A0A0A0;
    --footer-width: 64rem;
}

/*? footer reset */
*,
*::after,
*::before {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}


/*? footer containers */
footer {
    background-color: var(--footer-bg);
    width: 100%;
    padding-top: 1rem;
    display: flex;
    flex-direction: column;
}

*::selection {
    background: var(--primary);
    color: var(--footer-bg);
}


.footer-wrapper {
    display: flex;
    flex-direction: column;
    max-width: var(--footer-width);
    width: 100%;
    margin: 0 auto;
    padding: 1rem;
}

.footer-columns {
    display: flex;
    flex-direction: row;
    justify-content: space-between;
    gap: 4rem;
    flex-wrap: wrap;
    padding-top: 1rem;
}

.footer-logo-column {
    padding-right: 10%;
}

.footer-logo {
    margin-bottom: 1.5rem;
    width: 14rem;
}

/* columns with links */

.link-columns {
    display: flex;
    flex-wrap: wrap;
    gap: 2rem;

    flex-grow: 1;
}

.link-columns>div {
    flex-grow: 1;
    display: flex;
    gap: 2rem;
}

.link-columns>div>section {
    min-width: 8rem;
    width: 50%;
}

.link-columns ul {
    display: flex;
    gap: 1rem;
    list-style-type: none;
    padding: 0;
    margin: 0;
    flex-direction: column;
    font-weight: 600;
}

.link-columns ul a {
    color: var(--text-color);
    text-decoration: none;
    transition: all 0.2s ease-in-out;
}

.link-columns ul a:hover {
    color: var(--headline-color);
}

.link-columns h3 {
    color: var(--headline-color);
    margin-bottom: 1.5rem;
    font-size: 1.1rem;
}

/*? Footer bottom */
.footer-bottom {
    margin-top: 2rem;
    width: 100%;
    color: var(--text-color);
}

.footer-bottom-wrapper {
    max-width: var(--footer-width);
    margin: 0 auto;
    width: 100%;
    padding: 0.5rem 1rem;
    border-top: 1px solid var(--footer-border);
}

.footer-bottom small {
    font-size: 1rem;
    display: inline;
    white-space: nowrap;
}

.footer-bottom>small {
    font-size: 1rem;
    width: 100%
}

@media screen and (min-width: 600px) {
    .link-columns>div>section {
        min-width: auto;
    }
}
</style>

    <footer>
        <div class="footer-wrapper">
            <div class="footer-columns">
                <div class="footer-logo-column">
                    <a href="#" aria-label="Go to Supabase homepage" title="Go to Supabase Homepage">
                        <img src="assets/logoverbal.png" loading="lazy" alt="Supabase logo" class="footer-logo" width="200">
                    </a>
                </div>
                <div class="link-columns">
                    <div>
                        <section>
                            <h3>Navegação</h3>
                            <ul>
                                <li>
                                    <a href="index.php" title="Features">Home</a>
                                </li>
                                <li>
                                    <a href="index.php#imoveis" title="Auth">Imoveis</a>
                                </li>
                                <li>
                                    <a href="index.php#corretores" title="Functions">Corretores</a>
                                </li>
                                <li>
                                    <a href="index.php#localizacao" title="Realtime">Localização</a>
                                </li>
                            </ul>
                        </section>
                    </div>
                    <div>
                        <section>
                            <h3>Desenvolvedores</h3>
                            <ul>
                                <li>
                                    <a href="#" title="Documentation">Documentação</a>
                                </li>
                                <li>
                                    <a href="https://www.infinityfree.com/" title="Changelog">Site de Hospedagem</a>
                                </li>
                                <li>
                                    <a href="https://github.com/Auraoo/Raccoon-im-veis/tree/main" title="DevTo">GitHub</a>
                                </li>
                                
                            </ul>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <!-- bottom part section -->
        <div class="footer-bottom">
            <div class="footer-bottom-wrapper">
                <small>©<span>2024</span> by Gustavo, Marcos Gean e Pedro.</small>
            </div>
        </div>
    </footer>


