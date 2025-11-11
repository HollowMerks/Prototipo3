<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Campus Market - La Paz, Bolivia</title>
    @vite('resources/css/campus-market.css')
</head>
<body class="container">
    <nav class="navbar">
        <div class="nav-container">
            <div class="logo">
                <svg class="logo-icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443a55.381 55.381 0 0 1 5.25 2.882V15"/>
                </svg>
                <span class="logo-text">CAMPUS MARKET</span>
            </div>
            <div class="nav-links">
                <a href="#inicio">INICIO</a>
                <a href="#nosotros">NOSOTROS</a>
                <a href="#caracteristicas">CARACTERÍSTICAS</a>
                <a href="#contacto">CONTACTO</a>
            </div>
            <div class="flag-badge">
                <div class="bolivia-flag"></div>
                <span class="badge-text">Inicia sesión o registate</span>
                <button onclick="window.location.href='{{ url('/estudiantes/login') }}'">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 36 36"
                    width="36px"
                    height="36px"
                  >
                    <rect width="36" height="36" x="0" y="0" fill="#fdd835"></rect>
                    <path
                      fill="#e53935"
                      d="M38.67,42H11.52C11.27,40.62,11,38.57,11,36c0-5,0-11,0-11s1.44-7.39,3.22-9.59 c1.67-2.06,2.76-3.48,6.78-4.41c3-0.7,7.13-0.23,9,1c2.15,1.42,3.37,6.67,3.81,11.29c1.49-0.3,5.21,0.2,5.5,1.28 C40.89,30.29,39.48,38.31,38.67,42z"
                    ></path>
                    <path
                      fill="#b71c1c"
                      d="M39.02,42H11.99c-0.22-2.67-0.48-7.05-0.49-12.72c0.83,4.18,1.63,9.59,6.98,9.79 c3.48,0.12,8.27,0.55,9.83-2.45c1.57-3,3.72-8.95,3.51-15.62c-0.19-5.84-1.75-8.2-2.13-8.7c0.59,0.66,3.74,4.49,4.01,11.7 c0.03,0.83,0.06,1.72,0.08,2.66c4.21-0.15,5.93,1.5,6.07,2.35C40.68,33.85,39.8,38.9,39.02,42z"
                    ></path>
                    <path
                      fill="#212121"
                      d="M35,27.17c0,3.67-0.28,11.2-0.42,14.83h-2C32.72,38.42,33,30.83,33,27.17 c0-5.54-1.46-12.65-3.55-14.02c-1.65-1.08-5.49-1.48-8.23-0.85c-3.62,0.83-4.57,1.99-6.14,3.92L15,16.32 c-1.31,1.6-2.59,6.92-3,8.96v10.8c0,2.58,0.28,4.61,0.54,5.92H10.5c-0.25-1.41-0.5-3.42-0.5-5.92l0.02-11.09 c0.15-0.77,1.55-7.63,3.43-9.94l0.08-0.09c1.65-2.03,2.96-3.63,7.25-4.61c3.28-0.76,7.67-0.25,9.77,1.13 C33.79,13.6,35,22.23,35,27.17z"
                    ></path>
                    <path
                      fill="#01579b"
                      d="M17.165,17.283c5.217-0.055,9.391,0.283,9,6.011c-0.391,5.728-8.478,5.533-9.391,5.337 c-0.913-0.196-7.826-0.043-7.696-5.337C9.209,18,13.645,17.32,17.165,17.283z"
                    ></path>
                    <path
                      fill="#212121"
                      d="M40.739,37.38c-0.28,1.99-0.69,3.53-1.22,4.62h-2.43c0.25-0.19,1.13-1.11,1.67-4.9 c0.57-4-0.23-11.79-0.93-12.78c-0.4-0.4-2.63-0.8-4.37-0.89l0.1-1.99c1.04,0.05,4.53,0.31,5.71,1.49 C40.689,24.36,41.289,33.53,40.739,37.38z"
                    ></path>
                    <path
                      fill="#81d4fa"
                      d="M10.154,20.201c0.261,2.059-0.196,3.351,2.543,3.546s8.076,1.022,9.402-0.554 c1.326-1.576,1.75-4.365-0.891-5.267C19.336,17.287,12.959,16.251,10.154,20.201z"
                    ></path>
                    <path
                      fill="#212121"
                      d="M17.615,29.677c-0.502,0-0.873-0.03-1.052-0.069c-0.086-0.019-0.236-0.035-0.434-0.06 c-5.344-0.679-8.053-2.784-8.052-6.255c0.001-2.698,1.17-7.238,8.986-7.32l0.181-0.002c3.444-0.038,6.414-0.068,8.272,1.818 c1.173,1.191,1.712,3,1.647,5.53c-0.044,1.688-0.785,3.147-2.144,4.217C22.785,29.296,19.388,29.677,17.615,29.677z M17.086,17.973 c-7.006,0.074-7.008,4.023-7.008,5.321c-0.001,3.109,3.598,3.926,6.305,4.27c0.273,0.035,0.48,0.063,0.601,0.089 c0.563,0.101,4.68,0.035,6.855-1.732c0.865-0.702,1.299-1.57,1.326-2.653c0.051-1.958-0.301-3.291-1.073-4.075 c-1.262-1.281-3.834-1.255-6.825-1.222L17.086,17.973z"
                    ></path>
                    <path
                      fill="#e1f5fe"
                      d="M15.078,19.043c1.957-0.326,5.122-0.529,4.435,1.304c-0.489,1.304-7.185,2.185-7.185,0.652 C12.328,19.467,15.078,19.043,15.078,19.043z"
                    ></path>
                  </svg>
                  <span class="now">ahora!</span>
                  <span class="play">hazlo</span>
                </button>
            </div>
        </div>
    </nav>

    <section id="inicio" class="hero-section">
        <div class="hero-content">
            <div class="hero-glow"></div>
            <h1 class="hero-title">BIENVENIDO</h1>
            <p class="hero-subtitle">La plataforma de los estudiantes de La Paz, Bolivia</p>
            <p class="hero-description">
                Eeeepa gente, ¿cómo andan?<br>
                Les traigo alto proyecto, hecho por el team de J++, papá.<br>
                Acá podés comprar, vender, boludear, charlar, y ver mil cosas más que están facheritas mal.<br>
                Scrolleá tranqui que hay data piola, y si te pinta la curiosidad,<br>
                metele al botón de iniciar sesión y fijate todo lo que armamos…<br>
                una locura, amigo, no te lo podés perder
            </p>

        </div>
        <div class="scroll-indicator">
            <div class="scroll-arrow"></div>
        </div>
    </section>

    <section id="nosotros" class="about-section">
        <div class="container-content">
            <h2 class="section-title">¿Qué es Campus Market?</h2>
            <p class="section-description">
                Campus Market es la plataforma digital diseñada exclusivamente para la comunidad estudiantil de La Paz, Bolivia.
                Nuestro objetivo es crear un espacio seguro y confiable donde los estudiantes puedan conectarse, compartir y crecer juntos.
            </p>
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number">100%</div>
                    <div class="stat-label">Seguro</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">24/7</div>
                    <div class="stat-label">Moderación</div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">🇧🇴</div>
                    <div class="stat-label">Local</div>
                </div>
            </div>
        </div>
    </section>

    <section id="caracteristicas" class="features-section">
        <div class="container-content">
            <h2 class="section-title">Características Principales</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">🛒</div>
                    <h3 class="feature-title">Marketplace Estudiantil</h3>
                    <p class="feature-description">
                        Publica y encuentra productos de segunda mano: libros, apuntes, laptops,
                        calculadoras y todo lo que necesitas para tu vida universitaria.
                    </p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">💬</div>
                    <h3 class="feature-title">Foros de Discusión</h3>
                    <p class="feature-description">
                        Participa en conversaciones sobre materias, carreras, eventos universitarios
                        y comparte tus experiencias con otros estudiantes.
                    </p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🤝</div>
                    <h3 class="feature-title">Red Social Académica</h3>
                    <p class="feature-description">
                        Socializa con compañeros de tu universidad, encuentra grupos de estudio
                        y haz networking con futuros profesionales.
                    </p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🔒</div>
                    <h3 class="feature-title">Moderación Responsable</h3>
                    <p class="feature-description">
                        Equipo boliviano comprometido con la seguridad y el respeto.
                        Verificamos perfiles y monitoreamos el contenido constantemente.
                    </p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📱</div>
                    <h3 class="feature-title">Fácil y Accesible</h3>
                    <p class="feature-description">
                        Diseño intuitivo y responsive. Accede desde cualquier dispositivo
                        y mantente conectado con tu comunidad estudiantil.
                    </p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🎓</div>
                    <h3 class="feature-title">Para Estudiantes</h3>
                    <p class="feature-description">
                        Exclusivamente para la comunidad universitaria paceña.
                        Un espacio hecho por estudiantes, para estudiantes.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section id="beneficios" class="benefits-section">
        <div class="container-content">
            <h2 class="section-title">¿Por Qué Elegirnos?</h2>
            <div class="benefits-list">
                <div class="benefit-item">
                    <span class="benefit-check">✓</span>
                    <div class="benefit-text">
                        <strong>Comunidad Local:</strong> Conecta con estudiantes de la ciudad de La Paz
                    </div>
                </div>
                <div class="benefit-item">
                    <span class="benefit-check">✓</span>
                    <div class="benefit-text">
                        <strong>Economía Circular:</strong> Compra y vende productos de forma sostenible
                    </div>
                </div>
                <div class="benefit-item">
                    <span class="benefit-check">✓</span>
                    <div class="benefit-text">
                        <strong>Apoyo Académico:</strong> Encuentra recursos, apuntes y materiales de estudio
                    </div>
                </div>
                <div class="benefit-item">
                    <span class="benefit-check">✓</span>
                    <div class="benefit-text">
                        <strong>Entorno Seguro:</strong> Moderación activa y estable para proteger a los usuarios

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contacto" class="contact-section">
        <div class="container-content">
            <h2 class="section-title">Conéctate con Nosotros</h2>
            <p class="section-description">Síguenos en nuestras redes sociales y mantente al día con todas las novedades</p>

            <div class="social-container">
                <a href="https://chat.whatsapp.com/DcPCCFz3IDu9FL7k5ELfeJ" class="icon icon-whatsapp" target="_blank">
                    <svg viewBox="0 0 24 24" fill="currentColor" class="h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z"/>
                    </svg>
                </a>
                <a href="https://discord.gg/Tpgg7u5b" class="icon icon-discord" target="_blank">
                    <svg viewBox="0 0 24 24" fill="currentColor" class="h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg">
                        <path d="M20.317 4.3698a19.7913 19.7913 0 00-4.8851-1.5152.0741.0741 0 00-.0785.0371c-.211.3753-.4447.8648-.6083 1.2495-1.8447-.2762-3.68-.2762-5.4868 0-.1636-.3933-.4058-.8742-.6177-1.2495a.077.077 0 00-.0785-.037 19.7363 19.7363 0 00-4.8852 1.515.0699.0699 0 00-.0321.0277C.5334 9.0458-.319 13.5799.0992 18.0578a.0824.0824 0 00.0312.0561c2.0528 1.5076 4.0413 2.4228 5.9929 3.0294a.0777.0777 0 00.0842-.0276c.4616-.6304.8731-1.2952 1.226-1.9942a.076.076 0 00-.0416-.1057c-.6528-.2476-1.2743-.5495-1.8722-.8923a.077.077 0 01-.0076-.1277c.1258-.0943.2517-.1923.3718-.2914a.0743.0743 0 01.0776-.0105c3.9278 1.7933 8.18 1.7933 12.0614 0a.0739.0739 0 01.0785.0095c.1202.099.246.1981.3728.2924a.077.077 0 01-.0066.1276 12.2986 12.2986 0 01-1.873.8914.0766.0766 0 00-.0407.1067c.3604.698.7719 1.3628 1.225 1.9932a.076.076 0 00.0842.0286c1.961-.6067 3.9495-1.5219 6.0023-3.0294a.077.077 0 00.0313-.0552c.5004-5.177-.8382-9.6739-3.5485-13.6604a.061.061 0 00-.0312-.0286zM8.02 15.3312c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9555-2.4189 2.157-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419-.0189 1.3332-.9555 2.4189-2.1569 2.4189zm7.9748 0c-1.1825 0-2.1569-1.0857-2.1569-2.419 0-1.3332.9554-2.4189 2.1569-2.4189 1.2108 0 2.1757 1.0952 2.1568 2.419 0 1.3332-.9555 2.4189-2.1568 2.4189Z"/>
                    </svg>
                </a>
                <a href="https://github.com/Campus-Market-La-Paz" class="icon icon-github" target="_blank">
                    <svg viewBox="0 0 24 24" fill="currentColor" class="h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg">
                        <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5-373-12-12-12z"/>
                    </svg>
                </a>
                <a href="https://t.me/+UxjdJ7LAzOwwYjJh" class="icon icon-telegram" target="_blank">
                    <svg viewBox="0 0 24 24" fill="currentColor" class="h-8 w-8 text-white" xmlns="http://www.w3.org/2000/svg">
                        <path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.83-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/>
                    </svg>
                </a>
            </div>

            <div class="footer-info">
                <p>Campus Market © 2025 - La Paz, Bolivia</p>
                <p class="footer-slogan">Hecho por estudiantes, para estudiantes 🇧🇴</p>
            </div>
        </div>
    </section>
</body>
</html>

<style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    }

    :root {
    --dark-bg: #0a0e27;
    --darker-bg: #060914;
    --accent-teal: #2d7d7d;
    --accent-light: #3a9d9d;
    --text-primary: #ffffff;
    --text-secondary: #a8b2d1;
    --card-bg: #222222;
    --glow-color: rgba(45, 125, 125, 0.3);
    --color-0: #fff;
    --color-1: #111;
    --color-2: #222;
    --color-3: #333;
    --color-4: #2e2e2e;
    --color-5: #d2b48c;
    --color-6: #b22222;
    --color-7: #871a1a;
    --color-8: #ff6347;
    --color-9: #ff3814;
    }

    html {
    scroll-behavior: smooth;
    }

    body {
    font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
    color: var(--text-primary);
    line-height: 1.6;
    overflow-x: hidden;
    margin: 0;
    padding: 0;
    height: 100vh;
    }

    .container {
    --color-0: #fff;
    --color-1: #111;
    --color-2: #222;
    --color-3: #333;
    --color-4: #2e2e2e;
    --color-5: #d2b48c;
    --color-6: #b22222;
    --color-7: #871a1a;
    --color-8: #ff6347;
    --color-9: #ff3814;
    width: 100%;
    height: 100%;
    background-color: var(--color-1);
    background-image: linear-gradient(
        to top,
        var(--color-2) 5%,
        var(--color-1) 6%,
        var(--color-1) 7%,
        transparent 7%
        ),
        linear-gradient(to bottom, var(--color-1) 30%, transparent 80%),
        linear-gradient(to right, var(--color-2), var(--color-4) 5%, transparent 5%),
        linear-gradient(
        to right,
        transparent 6%,
        var(--color-2) 6%,
        var(--color-4) 9%,
        transparent 9%
        ),
        linear-gradient(
        to right,
        transparent 27%,
        var(--color-2) 27%,
        var(--color-4) 34%,
        transparent 34%
        ),
        linear-gradient(
        to right,
        transparent 51%,
        var(--color-2) 51%,
        var(--color-4) 57%,
        transparent 57%
        ),
        linear-gradient(to bottom, var(--color-1) 35%, transparent 35%),
        linear-gradient(
        to right,
        transparent 42%,
        var(--color-2) 42%,
        var(--color-4) 44%,
        transparent 44%
        ),
        linear-gradient(
        to right,
        transparent 45%,
        var(--color-2) 45%,
        var(--color-4) 47%,
        transparent 47%
        ),
        linear-gradient(
        to right,
        transparent 48%,
        var(--color-2) 48%,
        var(--color-4) 50%,
        transparent 50%
        ),
        linear-gradient(
        to right,
        transparent 87%,
        var(--color-2) 87%,
        var(--color-4) 91%,
        transparent 91%
        ),
        linear-gradient(to bottom, var(--color-1) 37.5%, transparent 37.5%),
        linear-gradient(
        to right,
        transparent 14%,
        var(--color-2) 14%,
        var(--color-4) 20%,
        transparent 20%
        ),
        linear-gradient(to bottom, var(--color-1) 40%, transparent 40%),
        linear-gradient(
        to right,
        transparent 10%,
        var(--color-2) 10%,
        var(--color-4) 13%,
        transparent 13%
        ),
        linear-gradient(
        to right,
        transparent 21%,
        var(--color-2) 21%,
        #1a1a1a 25%,
        transparent 25%
        ),
        linear-gradient(
        to right,
        transparent 58%,
        var(--color-2) 58%,
        var(--color-4) 64%,
        transparent 64%
        ),
        linear-gradient(
        to right,
        transparent 92%,
        var(--color-2) 92%,
        var(--color-4) 95%,
        transparent 95%
        ),
        linear-gradient(to bottom, var(--color-1) 48%, transparent 48%),
        linear-gradient(
        to right,
        transparent 96%,
        var(--color-2) 96%,
        #1a1a1a 99%,
        transparent 99%
        ),
        linear-gradient(
        to bottom,
        transparent 68.5%,
        transparent 76%,
        var(--color-1) 76%,
        var(--color-1) 77.5%,
        transparent 77.5%,
        transparent 86%,
        var(--color-1) 86%,
        var(--color-1) 87.5%,
        transparent 87.5%
        ),
        linear-gradient(
        to right,
        transparent 35%,
        var(--color-2) 35%,
        var(--color-4) 41%,
        transparent 41%
        ),
        linear-gradient(to bottom, var(--color-1) 68%, transparent 68%),
        linear-gradient(
        to right,
        transparent 78%,
        var(--color-3) 78%,
        var(--color-3) 80%,
        transparent 80%,
        transparent 82%,
        var(--color-3) 82%,
        var(--color-3) 83%,
        transparent 83%
        ),
        linear-gradient(
        to right,
        transparent 66%,
        var(--color-2) 66%,
        var(--color-4) 85%,
        transparent 85%
        );
    background-size: 300px 150px;
    background-position: center bottom;
    }

    .container:before {
    content: "";
    width: 100%;
    height: 100%;
    position: absolute;
    inset: 0;
    background-color: var(--color-1);
    background-image: linear-gradient(
        to top,
        var(--color-5) 5%,
        var(--color-1) 6%,
        var(--color-1) 7%,
        transparent 7%
        ),
        linear-gradient(to bottom, var(--color-1) 30%, transparent 30%),
        linear-gradient(to right, var(--color-6), var(--color-7) 5%, transparent 5%),
        linear-gradient(
        to right,
        transparent 6%,
        var(--color-8) 6%,
        var(--color-9) 9%,
        transparent 9%
        ),
        linear-gradient(
        to right,
        transparent 27%,
        #556b2f 27%,
        #39481f 34%,
        transparent 34%
        ),
        linear-gradient(
        to right,
        transparent 51%,
        #fa8072 51%,
        #f85441 57%,
        transparent 57%
        ),
        linear-gradient(to bottom, var(--color-1) 35%, transparent 35%),
        linear-gradient(
        to right,
        transparent 42%,
        #008080 42%,
        #004d4d 44%,
        transparent 44%
        ),
        linear-gradient(
        to right,
        transparent 45%,
        #008080 45%,
        #004d4d 47%,
        transparent 47%
        ),
        linear-gradient(
        to right,
        transparent 48%,
        #008080 48%,
        #004d4d 50%,
        transparent 50%
        ),
        linear-gradient(
        to right,
        transparent 87%,
        #789 87%,
        #4f5d6a 91%,
        transparent 91%
        ),
        linear-gradient(to bottom, var(--color-1) 37.5%, transparent 37.5%),
        linear-gradient(
        to right,
        transparent 14%,
        #bdb76b 14%,
        #989244 20%,
        transparent 20%
        ),
        linear-gradient(to bottom, var(--color-1) 40%, transparent 40%),
        linear-gradient(
        to right,
        transparent 10%,
        #808000 10%,
        #4d4d00 13%,
        transparent 13%
        ),
        linear-gradient(
        to right,
        transparent 21%,
        #8b4513 21%,
        #5e2f0d 25%,
        transparent 25%
        ),
        linear-gradient(
        to right,
        transparent 58%,
        #8b4513 58%,
        #5e2f0d 64%,
        transparent 64%
        ),
        linear-gradient(
        to right,
        transparent 92%,
        #2f4f4f 92%,
        #1c2f2f 95%,
        transparent 95%
        ),
        linear-gradient(to bottom, var(--color-1) 48%, transparent 48%),
        linear-gradient(
        to right,
        transparent 96%,
        #2f4f4f 96%,
        #1c2f2f 99%,
        transparent 99%
        ),
        linear-gradient(
        to bottom,
        transparent 68.5%,
        transparent 76%,
        var(--color-1) 76%,
        var(--color-1) 77.5%,
        transparent 77.5%,
        transparent 86%,
        var(--color-1) 86%,
        var(--color-1) 87.5%,
        transparent 87.5%
        ),
        linear-gradient(
        to right,
        transparent 35%,
        #cd5c5c 35%,
        #bc3a3a 41%,
        transparent 41%
        ),
        linear-gradient(to bottom, var(--color-1) 68%, transparent 68%),
        linear-gradient(
        to right,
        transparent 78%,
        #bc8f8f 78%,
        #bc8f8f 80%,
        transparent 80%,
        transparent 82%,
        #bc8f8f 82%,
        #bc8f8f 83%,
        transparent 83%
        ),
        linear-gradient(
        to right,
        transparent 66%,
        #a52a2a 66%,
        #7c2020 85%,
        transparent 85%
        );
    background-size: 300px 150px;
    background-position: center bottom;
    clip-path: circle(150px at center center);
    animation: flashlight 20s ease infinite;
    }

    .container:after {
    content: "";
    width: 25px;
    height: 10px;
    position: absolute;
    left: calc(50% + 59px);
    bottom: 100px;
    background-repeat: no-repeat;
    background-image: radial-gradient(circle, #fff 50%, transparent 50%),
        radial-gradient(circle, #fff 50%, transparent 50%);
    background-size: 10px 10px;
    background-position: left center, right center;
    animation: eyes 20s infinite;
    }

    @keyframes flashlight {
    0% {
        clip-path: circle(150px at -25% 10%);
    }

    38% {
        clip-path: circle(150px at 60% 20%);
    }

    39% {
        opacity: 1;
        clip-path: circle(150px at 60% 86%);
    }

    40% {
        opacity: 0;
        clip-path: circle(150px at 60% 86%);
    }

    41% {
        opacity: 1;
        clip-path: circle(150px at 60% 86%);
    }

    42% {
        opacity: 0;
        clip-path: circle(150px at 60% 86%);
    }

    54% {
        opacity: 0;
        clip-path: circle(150px at 60% 86%);
    }

    55% {
        opacity: 1;
        clip-path: circle(150px at 60% 86%);
    }

    59% {
        opacity: 1;
        clip-path: circle(150px at 60% 86%);
    }

    64% {
        clip-path: circle(150px at 45% 78%);
    }

    68% {
        clip-path: circle(150px at 85% 89%);
    }

    72% {
        clip-path: circle(150px at 60% 86%);
    }

    74% {
        clip-path: circle(150px at 60% 86%);
    }

    100% {
        clip-path: circle(150px at 150% 50%);
    }
    }

    @keyframes eyes {
    0%,
    38% {
        opacity: 0;
    }

    39%,
    41% {
        opacity: 1;
        transform: scaleY(1);
    }

    40% {
        transform: scaleY(0);
        filter: none;
        background-image: radial-gradient(circle, #fff 50%, transparent 50%),
        radial-gradient(circle, #fff 50%, transparent 50%);
    }

    41% {
        transform: scaleY(1);
        background-image: radial-gradient(circle, #ff0000 50%, transparent 50%),
        radial-gradient(circle, #ff0000 50%, transparent 50%);
        filter: drop-shadow(0 0 4px #ff8686);
    }

    42%,
    100% {
        opacity: 0;
    }
    }

    .navbar {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    background: rgba(10, 14, 39, 0.95);
    backdrop-filter: blur(10px);
    z-index: 1000;
    padding: 1rem 2rem;
    border-bottom: 1px solid rgba(45, 125, 125, 0.2);
    }

    .nav-container {
    max-width: 1400px;
    margin: 0 auto;
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 2rem;
    }

    .logo {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    font-weight: bold;
    font-size: 1.3rem;
    }

    .logo-icon {
    font-size: 1.8rem;
    }

    .logo-text {
    color: var(--accent-light);
    }

    .nav-links {
    display: flex;
    gap: 2rem;
    }

    .nav-links a {
    color: var(--text-secondary);
    text-decoration: none;
    font-size: 0.9rem;
    font-weight: 500;
    transition: color 0.3s ease;
    letter-spacing: 0.5px;
    }

    .nav-links a:hover {
    color: var(--accent-light);
    }

    .flag-badge {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.5rem 1rem;
    background: var(--card-bg);
    border-radius: 20px;
    border: 1px solid var(--accent-teal);
    }

    .bolivia-flag {
    width: 32px;
    height: 24px;
    background: linear-gradient(
        to bottom,
        #d52b1e 0%,
        #d52b1e 33%,
        #fcd116 33%,
        #fcd116 66%,
        #007a3d 66%,
        #007a3d 100%
    );
    border-radius: 3px;
    animation: wave 2s ease-in-out infinite;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
    }

    @keyframes wave {
    0%,
    100% {
        transform: rotate(0deg);
    }
    25% {
        transform: rotate(-3deg);
    }
    75% {
        transform: rotate(3deg);
    }
    }

    .badge-text {
    font-size: 0.75rem;
    color: var(--text-secondary);
    white-space: nowrap;
    }

    .hero-section {
    height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    position: relative;
    }

    .hero-content {
    text-align: center;
    z-index: 2;
    position: relative;
    }

    .hero-glow {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 500px;
    height: 500px;
    background: radial-gradient(circle, var(--glow-color) 0%, transparent 70%);
    border-radius: 50%;
    animation: pulse 4s ease-in-out infinite;
    }

    @keyframes pulse {
    0%,
    100% {
        transform: translate(-50%, -50%) scale(1);
        opacity: 0.5;
    }
    50% {
        transform: translate(-50%, -50%) scale(1.2);
        opacity: 0.8;
    }
    }

    .hero-title {
    font-size: 5rem;
    font-weight: 700;
    letter-spacing: 0.1em;
    margin-bottom: 1rem;
    text-shadow: 0 0 30px var(--glow-color);
    }

    .hero-subtitle {
    font-size: 1.5rem;
    color: var(--text-secondary);
    margin-bottom: 1rem;
    }

    .hero-description {
    font-size: 1.1rem;
    color: var(--accent-light);
    margin-bottom: 2rem;
    }

    .cta-button {
    display: inline-block;
    padding: 1rem 3rem;
    background: var(--accent-teal);
    color: var(--text-primary);
    text-decoration: none;
    border-radius: 50px;
    font-weight: 600;
    font-size: 1rem;
    letter-spacing: 1px;
    transition: all 0.3s ease;
    border: 2px solid var(--accent-teal);
    }

    .cta-button:hover {
    background: transparent;
    box-shadow: 0 0 20px var(--glow-color);
    transform: translateY(-2px);
    }

    .scroll-indicator {
    position: absolute;
    bottom: 2rem;
    left: 50%;
    transform: translateX(-50%);
    }

    .scroll-arrow {
    width: 30px;
    height: 50px;
    border: 2px solid var(--accent-teal);
    border-radius: 15px;
    position: relative;
    }

    .scroll-arrow::before {
    content: "";
    position: absolute;
    top: 10px;
    left: 50%;
    transform: translateX(-50%);
    width: 6px;
    height: 6px;
    background: var(--accent-light);
    border-radius: 50%;
    animation: scroll 2s ease-in-out infinite;
    }

    @keyframes scroll {
    0% {
        top: 10px;
        opacity: 0;
    }
    50% {
        opacity: 1;
    }
    100% {
        top: 30px;
        opacity: 0;
    }
    }

    .about-section,
    .features-section,
    .benefits-section,
    .contact-section {
    min-height: 100vh;
    padding: 6rem 2rem;
    display: flex;
    align-items: center;
    justify-content: center;
    }

    .about-section {
    background: var(--dark-bg);
    }

    .features-section {
    background: var(--darker-bg);
    }

    .benefits-section {
    background: var(--dark-bg);
    }

    .contact-section {
    background: var(--darker-bg);
    }

    .container-content {
    max-width: 1200px;
    margin: 0 auto;
    width: 100%;
    }

    .section-title {
    font-size: 3rem;
    text-align: center;
    margin-bottom: 1.5rem;
    color: var(--text-primary);
    text-shadow: 0 0 20px var(--glow-color);
    }

    .section-description {
    font-size: 1.2rem;
    text-align: center;
    color: var(--text-secondary);
    max-width: 800px;
    margin: 0 auto 3rem;
    line-height: 1.8;
    }

    .stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 2rem;
    margin-top: 3rem;
    }

    .stat-card {
    background: var(--card-bg);
    padding: 2rem;
    border-radius: 15px;
    text-align: center;
    border: 1px solid var(--accent-teal);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px var(--glow-color);
    }

    .stat-number {
    font-size: 3rem;
    font-weight: bold;
    color: var(--accent-light);
    margin-bottom: 0.5rem;
    }

    .stat-label {
    font-size: 1.1rem;
    color: var(--text-secondary);
    }

    .features-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(320px, 1fr));
    gap: 2rem;
    margin-top: 3rem;
    }

    .feature-card {
    background: var(--card-bg);
    padding: 2.5rem;
    border-radius: 15px;
    border: 1px solid rgba(45, 125, 125, 0.3);
    transition: all 0.3s ease;
    }

    .feature-card:hover {
    border-color: var(--accent-teal);
    transform: translateY(-5px);
    box-shadow: 0 10px 30px var(--glow-color);
    }

    .feature-icon {
    font-size: 3rem;
    margin-bottom: 1rem;
    }

    .feature-title {
    font-size: 1.5rem;
    margin-bottom: 1rem;
    color: var(--accent-light);
    }

    .feature-description {
    color: var(--text-secondary);
    line-height: 1.8;
    }

    .benefits-list {
    max-width: 800px;
    margin: 3rem auto 0;
    }

    .benefit-item {
    display: flex;
    align-items: flex-start;
    gap: 1rem;
    padding: 1.5rem;
    margin-bottom: 1rem;
    background: var(--card-bg);
    border-radius: 10px;
    border-left: 4px solid var(--accent-teal);
    transition: transform 0.3s ease;
    }

    .benefit-item:hover {
    transform: translateX(10px);
    }

    .benefit-check {
    font-size: 1.5rem;
    color: var(--accent-light);
    font-weight: bold;
    }

    .benefit-text {
    color: var(--text-secondary);
    line-height: 1.6;
    }

    .benefit-text strong {
    color: var(--text-primary);
    }

    .social-container {
    display: flex;
    justify-content: center;
    column-gap: 28px;
    margin: 3rem 0;
    }

    .icon {
    display: inline-flex;
    width: 60px;
    height: 60px;
    text-decoration: none;
    font-size: 25px;
    outline: 2px solid white;
    border-radius: 50%;
    transition-property: outline-offset, outline-color, background-color;
    transition-duration: 0.25s;
    color: white;
    }

    .icon:hover {
    outline-offset: 4px;
    }

    .icon svg {
    margin: auto;
    width: 31px;
    }

    .icon-whatsapp:hover {
    background-color: #25d366;
    outline-color: #25d366;
    }

    .icon-discord:hover {
    background-color: #5865f2;
    outline-color: #5865f2;
    }

    .icon-github:hover {
    background-color: #333;
    outline-color: #333;
    }

    .icon-telegram:hover {
    background-color: #0088cc;
    outline-color: #0088cc;
    }

    .icon:hover svg {
    animation: shake 0.25s;
    }

    @keyframes shake {
    10% {
        transform: rotate(15deg);
    }
    20% {
        transform: rotate(-15deg);
    }
    30% {
        transform: rotate(15deg);
    }
    40% {
        transform: rotate(-15deg);
    }
    }

    .footer-info {
    text-align: center;
    margin-top: 3rem;
    color: var(--text-secondary);
    }

    .footer-info p {
    margin: 0.5rem 0;
    }

    .footer-slogan {
    font-size: 1.1rem;
    color: var(--accent-light);
    font-weight: 600;
    }

    button {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 10px;
      padding: 0 10px;
      color: white;
      text-shadow: 2px 2px rgb(116, 116, 116);
      text-transform: uppercase;
      cursor: pointer;
      border: solid 2px black;
      letter-spacing: 1px;
      font-weight: 600;
      font-size: 17px;
      background-color: hsl(49deg 98% 60%);
      border-radius: 50px;
      position: relative;
      overflow: hidden;
      transition: all 0.5s ease;
    }

    button:active {
      transform: scale(0.9);
      transition: all 100ms ease;
    }

    button svg {
      transition: all 0.5s ease;
      z-index: 2;
    }

    .play {
      transition: all 0.5s ease;
      transition-delay: 300ms;
    }

    button:hover svg {
      transform: scale(3) translate(50%);
    }

    .now {
      position: absolute;
      left: 0;
      transform: translateX(-100%);
      transition: all 0.5s ease;
      z-index: 2;
    }

    button:hover .now {
      transform: translateX(10px);
      transition-delay: 300ms;
    }

    button:hover .play {
      transform: translateX(200%);
      transition-delay: 300ms;
    }

    .btn-glitch-fill {
      display: inline-block;
      font-family: "VT323", monospace;
      border: 1px solid rgb(255, 255, 255);
      color: rgb(255, 255, 255);
      padding: 10px 13px;
      min-width: 175px;
      line-height: 1.5em;
      white-space: nowrap;
      text-transform: uppercase;
      cursor: pointer;
      border-radius: 15px;
    }

    .btn-glitch-fill .text,
    .btn-glitch-fill .decoration {
      display: inline-block;
    }

    .btn-glitch-fill .decoration {
      display: inline-block;
      float: right;
    }

    .btn-glitch-fill:hover,
    .btn-glitch-fill:focus {
      animation-name: glitch;
      animation-duration: 0.2s;
      background-color: yellow;
      color: black;
      border: 1px solid yellow;
    }

    .btn-glitch-fill:hover .text-decoration,
    .btn-glitch-fill:focus .text-decoration {
      animation-name: blink;
      animation-duration: 0.1s;
      animation-iteration-count: infinite;
    }

    .btn-glitch-fill:hover .decoration,
    .btn-glitch-fill:focus .decoration {
      animation-name: blink;
      animation-duration: 0.1s;
      animation-iteration-count: infinite;
    }

    .btn-glitch-fill:active {
      background: none;
      color: yellow;
    }

    .btn-glitch-fill:active .text-decoration {
      animation-name: none;
    }

    .btn-glitch-fill:active .decoration {
      animation-name: none;
    }

    .btn-glitch-fill:active::before,
    .btn-glitch-fill:active::after {
      display: none;
    }

    @keyframes glitch {
      25% {
        background-color: red;
        transform: translateX(-10px);
        letter-spacing: 10px;
      }

      35% {
        background-color: green;
        transform: translate(10px);
      }

      59% {
        opacity: 0;
      }

      60% {
        background-color: blue;
        transform: translate(-10px);
        filter: blur(5px);
      }

      100% {
        background-color: yellow;
        filter: blur(5px);
      }
    }

    @keyframes blink {
      50% {
        opacity: 0;
      }
    }

    @keyframes shrink {
      100% {
        width: 10%;
      }
    }

    /* Tablet and smaller screens */
    @media (max-width: 1024px) {
    .hero-title {
        font-size: 4rem;
    }

    .section-title {
        font-size: 2.5rem;
    }

    .features-grid {
        grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
        gap: 1.5rem;
    }
    }

    /* Mobile landscape and smaller tablets */
    @media (max-width: 768px) {
    .navbar {
        padding: 1rem 1.5rem;
    }

    .nav-container {
        flex-direction: column;
        gap: 1rem;
        padding: 0.5rem 0;
    }

    .nav-links {
        gap: 1rem;
        flex-wrap: wrap;
        justify-content: center;
    }

    .nav-links a {
        font-size: 0.8rem;
        padding: 0.5rem 1rem;
        background: rgba(45, 125, 125, 0.1);
        border-radius: 20px;
        transition: all 0.3s ease;
    }

    .nav-links a:hover {
        background: var(--accent-teal);
        color: var(--text-primary);
    }

    .flag-badge {
        order: -1;
        padding: 0.4rem 0.8rem;
    }

    .badge-text {
        font-size: 0.7rem;
    }

    .hero-section {
        height: 90vh;
        padding: 2rem 1rem;
    }

    .hero-title {
        font-size: 2.5rem;
        letter-spacing: 0.05em;
        margin-bottom: 0.8rem;
    }

    .hero-subtitle {
        font-size: 1.3rem;
        margin-bottom: 0.8rem;
    }

    .hero-description {
        font-size: 1rem;
        line-height: 1.7;
        margin-bottom: 1.5rem;
        padding: 0 1rem;
    }

    .hero-glow {
        width: 300px;
        height: 300px;
    }

    .section-title {
        font-size: 2rem;
        margin-bottom: 1rem;
    }

    .section-description {
        font-size: 1.1rem;
        margin-bottom: 2rem;
        padding: 0 1rem;
    }

    .about-section,
    .features-section,
    .benefits-section,
    .contact-section {
        padding: 4rem 1rem;
        min-height: auto;
    }

    .container-content {
        max-width: 100%;
        padding: 0 1rem;
    }

    .stats-grid {
        grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
        gap: 1rem;
        margin-top: 2rem;
    }

    .stat-card {
        padding: 1.5rem 1rem;
    }

    .stat-number {
        font-size: 2.5rem;
    }

    .stat-label {
        font-size: 1rem;
    }

    .features-grid {
        grid-template-columns: 1fr;
        gap: 1.5rem;
        margin-top: 2rem;
    }

    .feature-card {
        padding: 2rem 1.5rem;
        text-align: center;
    }

    .feature-icon {
        font-size: 2.5rem;
    }

    .feature-title {
        font-size: 1.3rem;
        margin-bottom: 0.8rem;
    }

    .feature-description {
        font-size: 0.95rem;
        line-height: 1.7;
    }

    .benefits-list {
        margin: 2rem auto 0;
        padding: 0 1rem;
    }

    .benefit-item {
        padding: 1.2rem;
        margin-bottom: 0.8rem;
    }

    .benefit-check {
        font-size: 1.3rem;
    }

    .benefit-text {
        font-size: 0.95rem;
    }

    .social-container {
        column-gap: 20px;
        margin: 2rem 0;
        flex-wrap: wrap;
        justify-content: center;
    }

    .icon {
        width: 50px;
        height: 50px;
    }

    .icon svg {
        width: 25px;
    }

    button {
        font-size: 14px;
        padding: 0 8px;
        min-height: 44px; /* Touch-friendly */
    }

    .footer-info {
        margin-top: 2rem;
        padding: 0 1rem;
    }

    .footer-slogan {
        font-size: 1rem;
    }
    }

    /* Small mobile phones */
    @media (max-width: 480px) {
    .navbar {
        padding: 0.8rem 1rem;
    }

    .nav-container {
        gap: 0.8rem;
    }

    .logo {
        font-size: 1.1rem;
    }

    .logo-icon {
        font-size: 1.5rem;
    }

    .nav-links {
        gap: 0.8rem;
    }

    .nav-links a {
        font-size: 0.75rem;
        padding: 0.4rem 0.8rem;
    }

    .flag-badge {
        padding: 0.3rem 0.6rem;
    }

    .badge-text {
        font-size: 0.65rem;
    }

    .hero-section {
        height: 85vh;
        padding: 1rem 0.5rem;
    }

    .hero-title {
        font-size: 2rem;
        letter-spacing: 0.03em;
        margin-bottom: 0.6rem;
    }

    .hero-subtitle {
        font-size: 1.1rem;
        margin-bottom: 0.6rem;
    }

    .hero-description {
        font-size: 0.95rem;
        line-height: 1.6;
        margin-bottom: 1.2rem;
        padding: 0 0.5rem;
    }

    .hero-glow {
        width: 250px;
        height: 250px;
    }

    .scroll-indicator {
        bottom: 1rem;
    }

    .section-title {
        font-size: 1.8rem;
        margin-bottom: 0.8rem;
    }

    .section-description {
        font-size: 1rem;
        margin-bottom: 1.5rem;
        padding: 0 0.5rem;
    }

    .about-section,
    .features-section,
    .benefits-section,
    .contact-section {
        padding: 3rem 0.5rem;
    }

    .container-content {
        padding: 0 0.5rem;
    }

    .stats-grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 0.8rem;
        margin-top: 1.5rem;
    }

    .stat-card {
        padding: 1.2rem 0.8rem;
    }

    .stat-number {
        font-size: 2rem;
    }

    .stat-label {
        font-size: 0.9rem;
    }

    .features-grid {
        gap: 1rem;
        margin-top: 1.5rem;
    }

    .feature-card {
        padding: 1.5rem 1rem;
    }

    .feature-icon {
        font-size: 2rem;
        margin-bottom: 0.8rem;
    }

    .feature-title {
        font-size: 1.2rem;
        margin-bottom: 0.6rem;
    }

    .feature-description {
        font-size: 0.9rem;
        line-height: 1.6;
    }

    .benefits-list {
        margin: 1.5rem auto 0;
        padding: 0 0.5rem;
    }

    .benefit-item {
        padding: 1rem 0.8rem;
        margin-bottom: 0.6rem;
    }

    .benefit-check {
        font-size: 1.2rem;
    }

    .benefit-text {
        font-size: 0.9rem;
    }

    .social-container {
        column-gap: 15px;
        margin: 1.5rem 0;
        gap: 15px;
    }

    .icon {
        width: 45px;
        height: 45px;
    }

    .icon svg {
        width: 22px;
    }

    button {
        font-size: 13px;
        padding: 0 6px;
        min-height: 40px;
        letter-spacing: 0.5px;
    }

    .footer-info {
        margin-top: 1.5rem;
        padding: 0 0.5rem;
    }

    .footer-info p {
        margin: 0.3rem 0;
    }

    .footer-slogan {
        font-size: 0.95rem;
    }
    }

    /* Very small screens */
    @media (max-width: 360px) {
    .hero-title {
        font-size: 1.8rem;
    }

    .hero-subtitle {
        font-size: 1rem;
    }

    .hero-description {
        font-size: 0.9rem;
    }

    .section-title {
        font-size: 1.6rem;
    }

    .stats-grid {
        grid-template-columns: 1fr;
    }

    .social-container {
        column-gap: 10px;
        gap: 10px;
    }

    .icon {
        width: 40px;
        height: 40px;
    }

    .icon svg {
        width: 20px;
    }

    button {
        font-size: 12px;
        min-height: 38px;
    }
    }



</style>
</html>
