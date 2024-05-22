<style>
    :root{
        --background: #0f0f0f;
        --card-bg:#232323;
        --chip-bg:#161826;
        --border:#a4a4aa;
        --text:#fbfbfc;
        --text-dark:#010101;
        --primary:#f7c076;
    }
    body{
        background: var(--background);
        display: grid;
        place-items: center;
        height: 100vh;
        font-size: 16px;
        padding: 1.5rem;
        font-family: Poppins, sans-serif;

    }
    *{
        margin: 0;
        padding: 0;
    
    }
    .card{
        display: flex;
        flex-wrap: wrap;
        border-radius: 1.5rem;
        background: var(--card-bg);
        cursor:pointer;
        overflow: hidden;
        color: var(--text);
        max-width: clamp(20rem.70vw,46.25rem);
        min-width: 20rem;
        min-height: 17.5rem; 
    }
    .card:hover{
        box-shadow: rgba(0,0,0,0.35) 0px 5px 15px;
    }
    .background{
        flex:1 1 15rem;
    }
    .background img{
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .content{
        flex: 3 1 22rem;
        display: flex;
        flex-direction: column;
        justify-content: start;
        padding:1rem;
    }
    .content> h2 {
        font-size:clamp(1.3rem ,2.5vw, 1.8rem);
        font-weight: 700;
        margin-bottom: clamp(0.35rem, 2vw, 0.55rem) ;
    }
    .content > p {
        font-size: clamp(1rem, 1.75vw, 1.1rem);
        font-weight: 400;
        margin: 0.4rem 0 ;
    }
    .content a {
        color: var(--text);
    }
    .chips {
        display: flex;
        gap: 0.5rem;
        flex-wrap: wrap;
        list-style-type: none;
        padding: 0.75 0px 1rem 0px;
    }
    .chip {
        border-radius: 0.5rem;
        padding: 0.25rem 0.5rem;
        font-size: 0.9375rem;
        background: var(--chip-bg);
        transition:all 0.3s;
        border: 1px solid var(--border);
        font-weight: 500;
    }
    .chip:hover {
        color: var(--text);
        text-decoration: underline;
    }
    .action-buttons {
        border-top: 1px solid var(--gray) ;
        padding: 1rem;
        gap: 0.75rem;
        display: flex;
        margin-top: auto;
        flex-wrap: wrap;
    }
    .action-buttons a {
        background: var(--primary);
        color: var(--text-dark);
        padding: 0.75rem;
        text-decoration:none;
        border-radius: 0.75rem;
        outline: none;
        border: none;
        font-size: 1.125rem;
        display: flex;
        font-weight: bold;
        justify-content: center;
        align-items: center;
        white-space: nowrap;
        flex: 1 0 15rem;
        max-width: 100%;
    }
    .action-buttons a:hover{
        text-decoration: underline;
    }
    .action-buttons a.secondary{
        background: inherit;
        color: var(--text);
        border:1px solid var(--text);
        flex:1 0 5rem;
    }

</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container" >
        <article class="card" >
            <div class="background" >
                <img src="assets/joao.jpeg" alt="">
            </div>
            <div class="content" >
                <h2>Dominic wills</h2>
                <p>
                    senior full-stack enginer at 
                    <a href="#" title="Google" >
                        guguloo
                    </a>
                </p>
                <p>helping with:</p>
                <ul class="chips" >
                    <li class="chip" >React.js</li>
                    <li class="chip" >node.js</li>
                    <li class="chip" >postgreeSQL</li>
                </ul>
                <div class="action-buttons" >
                    <a href="#">
                        book a lector
                    </a>
                    <a href="#" class="secondary" >
                        learn more
                    </a>
                </div>
            </div>
        </article>
    </div>
</body>
</html>