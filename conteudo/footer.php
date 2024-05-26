


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
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

/*? socials */
.social-wrapper {
    display: flex;
    gap: 0.5rem;
    margin: 0 auto;
    margin-bottom: 2rem;
}

.social-links {
    display: inline-flex;
    gap: 0.5rem;
    align-items: center;
}

.social-links a {
    color: var(--text-color);
    text-decoration: none;
}

.social-links svg {
    width: 2.5rem;
    height: 2.5rem;
    stroke: var(--text-color);
    transition: all 0.2s ease-in-out;
}

.social-links svg:hover {
    stroke: var(--headline-color);
}

.social-links ul {
    display: flex;
    flex-wrap: wrap;
    gap: 0.75rem;
    list-style-type: none;
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
                    <div class="social-wrapper">
                        <div class='social-links'>
                            <ul>
                                <li>
                                    <a href="#" title="Twitter">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-brand-x" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M4 4l11.733 16h4.267l-11.733 -16z" />
                                            <path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772" />
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="GitHub">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-brand-github" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M9 19c-4.3 1.4 -4.3 -2.5 -6 -3m12 5v-3.5c0 -1 .1 -1.4 -.5 -2c2.8 -.3 5.5 -1.4 5.5 -6a4.6 4.6 0 0 0 -1.3 -3.2a4.2 4.2 0 0 0 -.1 -3.2s-1.1 -.3 -3.5 1.3a12.3 12.3 0 0 0 -6.2 0c-2.4 -1.6 -3.5 -1.3 -3.5 -1.3a4.2 4.2 0 0 0 -.1 3.2a4.6 4.6 0 0 0 -1.3 3.2c0 4.6 2.7 5.7 5.5 6c-.6 .6 -.6 1.2 -.5 2v3.5" />
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Discord">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-brand-discord" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M8 12a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
                                            <path d="M14 12a1 1 0 1 0 2 0a1 1 0 0 0 -2 0" />
                                            <path
                                                d="M15.5 17c0 1 1.5 3 2 3c1.5 0 2.833 -1.667 3.5 -3c.667 -1.667 .5 -5.833 -1.5 -11.5c-1.457 -1.015 -3 -1.34 -4.5 -1.5l-.972 1.923a11.913 11.913 0 0 0 -4.053 0l-.975 -1.923c-1.5 .16 -3.043 .485 -4.5 1.5c-2 5.667 -2.167 9.833 -1.5 11.5c.667 1.333 2 3 3.5 3c.5 0 2 -2 2 -3" />
                                            <path d="M7 16.5c3.5 1 6.5 1 10 0" />
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="#" title="Youtube">
                                        <svg xmlns="http://www.w3.org/2000/svg"
                                            class="icon icon-tabler icon-tabler-brand-youtube" width="24" height="24"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path
                                                d="M2 8a4 4 0 0 1 4 -4h12a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-12a4 4 0 0 1 -4 -4v-8z" />
                                            <path d="M10 9l5 3l-5 3z" />
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
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


