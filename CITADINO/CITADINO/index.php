<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Citadino - Tienda Online de Gorras y Vapers</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* =====================================================================
           ========================= ESTILOS GENERALES Y BASE ====================
           ===================================================================== */
        body {
            margin: 0;
            padding: 0;
            background: #f5f5f5;
            font-family: 'Inter', Arial, Helvetica, sans-serif;
            color: #333;
            user-select: none;
        }
        .page-content { padding: 20px 0; min-height: 70vh; }
        .container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }
        h2 { font-size: 2.2rem; text-align: center; margin-bottom: 30px; color: #111; font-weight: 700; }
        .btn { padding: 10px 18px; border-radius: 8px; cursor: pointer; border: none; font-weight: bold; transition: all 0.3s ease; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        .btn-primary { background: #000; color: white; }
        .btn-primary:hover { background: #333; transform: translateY(-1px); box-shadow: 0 4px 10px rgba(0,0,0,0.2); }
        .btn-secondary { background: #555; color: white; }
        .btn-secondary:hover { background: #777; transform: scale(1.02); }
        .btn-danger { background: #dc3545; color: white; }
        .btn-danger:hover { background: #c82333; }
        .btn-export { background: #007bff; color: #fff; padding: 8px 12px; border-radius: 6px; border: none; cursor: pointer; font-weight: 700; }
        .btn:disabled { background: #ccc; color: #666; cursor: not-allowed; box-shadow: none; transform: none; }

        header {
            background: #000; color: #fff; padding: 15px 20px; font-size: 1.8rem; display:flex; justify-content:space-between; align-items:center; box-shadow:0 4px 10px rgba(0,0,0,.2);
        }
        .logo { font-weight:900; letter-spacing:1px; cursor:pointer; }
        .auth-controls { display:flex; align-items:center; gap:15px; font-size:0.9rem; }
        #welcome-user { color:#ffd700; font-weight:bold; animation:pulse 1s infinite alternate; }
        @keyframes pulse { from {opacity:.8} to {opacity:1} }
        #login-btn,#logout-btn { background:transparent; border:1px solid white; padding:8px 12px; border-radius:6px; color:white; cursor:pointer; transition:background .2s, transform .2s; }
        #login-btn:hover,#logout-btn:hover { background:rgba(255,255,255,.15); transform:scale(1.05); }

        nav { background:#111; padding:15px 20px; display:flex; justify-content:center; gap:40px; font-size:1.1rem; box-shadow:0 2px 5px rgba(0,0,0,0.1); }
        nav a { color:white; text-decoration:none; padding:5px 10px; border-bottom:2px solid transparent; transition:.3s; }
        nav a:hover, nav a.active { color:#ffd700; border-bottom-color:#ffd700; transform:translateY(-2px); }

        /* Carousel & Cards (same as before) */
        .carousel { position:relative; width:100%; height:450px; overflow:hidden; background:#000; }
        .carousel-track { display:flex; height:100%; transition:transform .6s cubic-bezier(.25,.1,.25,1); }
        .carousel-slide { min-width:100%; height:100%; position:relative; }
        .carousel-slide img { width:100%; height:100%; object-fit:cover; opacity:.8; }
        .slide-caption { position:absolute; top:50%; left:50%; transform:translate(-50%,-50%); color:white; text-align:center; background:rgba(0,0,0,.6); padding:30px 40px; border-radius:12px; backdrop-filter: blur(5px); }
        .slide-caption h3 { font-size:2.8rem; color:#ffd700; margin:0 0 10px 0; }
        .slide-caption p { font-size:1.3rem; margin:0 0 20px 0; }
        .carousel-btn { position:absolute; top:50%; transform:translateY(-50%); background:rgba(0,0,0,.7); border:none; color:white; font-size:2.5rem; cursor:pointer; padding:12px 18px; border-radius:50%; z-index:10; }
        .carousel-btn.prev { left:20px } .carousel-btn.next { right:20px }
        .carousel-indicators { position:absolute; bottom:20px; left:50%; transform:translateX(-50%); display:flex; gap:10px; z-index:10; }
        .dot { width:12px; height:12px; background:white; border-radius:50%; opacity:.6; cursor:pointer; border:2px solid rgba(0,0,0,.3); }
        .dot.active { opacity:1; background:#ffd700; transform:scale(1.2); box-shadow:0 0 5px #ffd700; }

        .filter-section { display:flex; justify-content:space-between; align-items:center; flex-wrap:wrap; padding:20px 0; gap:15px; margin-bottom:20px; border-bottom:2px solid #ddd; }
        .search-input input { padding:10px 15px; border-radius:8px; border:1px solid #ccc; width:300px; outline:none; transition:all .3s; }
        .search-input input:focus { border-color:#000; box-shadow:0 0 8px rgba(0,0,0,.15); }
        .filters button { background:#ddd; color:#333; margin-right:8px; padding:8px 15px; transition:all .2s; }
        .filters button.active { background:#000; color:white; font-weight:bold; box-shadow:0 3px 6px rgba(0,0,0,.2); transform:translateY(-1px); }

        .products-grid { display:grid; grid-template-columns:repeat(auto-fit,minmax(280px,1fr)); gap:30px; padding-top:10px; }
        .card { background:#fff; padding:15px; border-radius:12px; box-shadow:0 4px 12px rgba(0,0,0,.1); text-align:center; display:flex; flex-direction:column; justify-content:space-between; transition:transform .3s, box-shadow .3s; position: relative; }
        .card:hover { transform:translateY(-7px); box-shadow:0 10px 25px rgba(0,0,0,.2); }
        .card img { width:100%; height:200px; object-fit:cover; border-radius:10px; margin-bottom:15px; }
        .card h4 { font-size:1.4rem; margin:0 0 5px 0; color:#111; }
        .card p { color:#555; margin-bottom:10px; }
        .card .price { font-size:1.5rem; color:#dc3545; font-weight:700; margin-bottom:15px; }
        .card-actions { display:flex; gap:10px; margin-top:10px; }
        .card-actions .btn { flex-grow:1; padding:12px 0; }
        /* Estilo para producto agotado */
        .agotado-badge { position: absolute; top: 10px; right: 10px; background: #dc3545; color: white; padding: 5px 10px; border-radius: 5px; font-size: 0.9rem; font-weight: bold; z-index: 5; }
        
        /* Estilo para imágenes de productos agotados */
        .card.agotado img {
            opacity: 0.4;
            filter: grayscale(100%);
            transform: scale(0.98);
            transition: all 0.3s ease;
        }

        .offers-section { background:#e0f7fa; padding:30px 0; margin-top:40px; box-shadow:inset 0 5px 10px rgba(0,0,0,.05); }
        .offers { display:flex; gap:20px; overflow-x:auto; padding:10px 0; scrollbar-width:none; }
        .offer { flex:0 0 280px; padding:25px; background:white; border-radius:12px; box-shadow:0 4px 10px rgba(0,0,0,.1); text-align:center; border:2px solid #000; transition:transform .3s }
        .offer:hover { transform:scale(1.05); }
        .offer-title { font-size:1.5rem; color:#000; border-bottom:3px solid #ffd700; padding-bottom:5px; margin-bottom:10px; }
        .offer-text { font-size:1rem; color:#444; }

        #nosotros-page { max-width:800px; margin:40px auto; padding:30px; background:white; border-radius:15px; box-shadow:0 6px 15px rgba(0,0,0,.1); }
        .team-member { display:flex; align-items:center; margin-top:25px; gap:20px; border-top:1px solid #eee; padding-top:15px; transition:background .3s; }
        .team-member img { width:80px; height:80px; border-radius:50%; object-fit:cover; border:3px solid #000; }

        #client-list-container table { width:100%; border-collapse:collapse; margin-top:20px; background:white; border-radius:8px; overflow:hidden; box-shadow:0 4px 10px rgba(0,0,0,.1); }
        #client-list-container th,#client-list-container td { padding:15px; text-align:left; border-bottom:1px solid #eee; vertical-align:top; }
        #client-list-container th { background:#000; color:white; }
        #client-list-container tr:nth-child(even) { background:#f9f9f9; }

        footer { background:#111; color:#fff; padding:45px 20px; margin-top:40px; font-size:1rem; }
        .footer-content { max-width:1200px; margin:0 auto; display:flex; justify-content:space-between; flex-wrap:wrap; gap:30px; }
        .footer-section { flex:1; min-width:200px; }
        .footer-section h4 { font-size:1.2rem; margin-bottom:15px; color:#ffd700; border-bottom:1px solid #333; padding-bottom:5px; }
        .footer-section ul { list-style:none; padding:0; }
        .footer-section ul li a { color:#ccc; text-decoration:none; line-height:1.8; transition:color .2s; }
        .footer-section ul li a:hover { color:#fff; padding-left:5px; }
        .footer-bottom { text-align:center; padding-top:20px; margin-top:20px; border-top:1px solid #333; }
        
        /* Estilo para el switch de administración de productos */
        .stock-switch {
            position: relative;
            display: inline-block;
            width: 50px;
            height: 24px;
        }
        .stock-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }
        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            transition: .4s;
            border-radius: 34px;
        }
        .slider:before {
            position: absolute;
            content: "";
            height: 16px;
            width: 16px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            transition: .4s;
            border-radius: 50%;
        }
        input:checked + .slider {
            background-color: #4CAF50; /* Verde para disponible */
        }
        input:checked + .slider:before {
            transform: translateX(26px);
        }
        .slider-agotado { background-color: #dc3545; } /* Rojo para agotado */


        #cart-wrapper { position:fixed; right:25px; top:120px; z-index:200; cursor:move; }
        #cart-icon { width:65px; height:65px; background:#000; color:white; border-radius:50%; font-size:2rem; display:flex; justify-content:center; align-items:center; cursor:pointer; box-shadow:0 5px 15px rgba(0,0,0,.4); transition:.3s; position:relative; }
        #cart-count { position:absolute; top:-5px; right:-5px; background:#dc3545; color:white; font-size:14px; font-weight:bold; border-radius:50%; padding:4px 8px; min-width:25px; text-align:center; box-shadow:0 2px 5px rgba(0,0,0,.3); display:none; }
        #cart { position:absolute; top:80px; right:0; width:320px; background:white; padding:20px; border-radius:10px; display:none; box-shadow:0 5px 25px rgba(0,0,0,.3); border:1px solid #eee; animation: slideIn .3s ease-out; }
        @keyframes slideIn { from{opacity:0; transform:translateY(-10px)} to{opacity:1; transform:translateY(0)} }
        #cart.open { display:block; }
        #cart h3 { margin-top:0; border-bottom:1px solid #eee; padding-bottom:10px; }
        #cart ul { list-style:none; padding:0; max-height:250px; overflow-y:auto; }
        #cart ul li { display:flex; justify-content:space-between; align-items:center; padding:10px 0; font-size:14px; border-bottom:1px dotted #eee; }
        .item-info { display:flex; align-items:center; flex-grow:1; }
        .item-info img { width:40px; height:40px; object-fit:cover; border-radius:5px; margin-right:10px; }
        .item-controls { display:flex; align-items:center; gap:5px; min-width:130px; justify-content:flex-end; }
        .qty-btn { width:25px; height:25px; background:#000; color:white; border-radius:4px; font-size:1rem; display:flex; justify-content:center; align-items:center; padding:0; transition:background .2s; cursor:pointer; border:none; }
        .qty-btn:hover { background:#ffd700; color:#000; }
        .qty-display { width:20px; text-align:center; font-weight:bold; }
        .remove-btn { background:#dc3545; color:white; padding:5px 8px; border-radius:5px; transition:transform .2s; border:none; cursor:pointer; line-height:1; }
        .remove-btn:hover { background:#c82333; transform:scale(1.1); }
        .cart-total { margin-top:15px; font-size:1.3rem; font-weight:bold; text-align:right; border-top:2px solid #eee; padding-top:10px; color:#000; }

        #modal { position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,.75); display:none; justify-content:center; align-items:center; z-index:999; opacity:0; transition:opacity .3s ease; }
        #modal.show { display:flex; opacity:1; }
        #modal-content { background:white; padding:25px; border-radius:15px; max-width:600px; width:90%; text-align:center; transform:scale(.9); transition:transform .3s ease; position:relative; }
        #modal.show #modal-content { transform:scale(1); }
        #modal-content img { width:100%; height:350px; object-fit:cover; border-radius:12px; margin-bottom:15px; }
        #modal-content h2 { margin-top:0; text-align:center; font-size:2rem; }
        .modal-price { font-size:1.8rem; color:#dc3545; font-weight:bold; margin:10px 0 20px; }
        #modal-descripcion { color: #666; font-size: 1.1rem; padding: 0 10px; }
        #modal-close-btn { position:absolute; top:15px; right:15px; font-size:1.5rem; cursor:pointer; background:none; border:none; color:#333; transition:color .2s; }
        #modal-close-btn:hover { color:#dc3545; transform:rotate(90deg); }

        #auth-modal { position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,.85); display:none; justify-content:center; align-items:center; z-index:1000; }
        #auth-modal.show { display:flex; }
        #auth-content { background:white; width:90%; max-width:450px; padding:30px; border-radius:12px; text-align:center; position:relative; box-shadow:0 10px 30px rgba(0,0,0,.5); }
        .form-switch { display:flex; justify-content:center; margin-bottom:20px; border-radius:8px; overflow:hidden; box-shadow:0 2px 5px rgba(0,0,0,.1); }
        .form-switch button { background:#eee; color:#555; border:none; padding:10px 20px; cursor:pointer; transition:background .3s; font-weight:bold; flex-grow:1; }
        .form-switch button.active { background:#000; color:white; }
        #login-form,#register-form { display:none; text-align:left; }
        #auth-content input { width:100%; padding:12px; margin:8px 0 15px 0; border-radius:8px; border:1px solid #ccc; box-sizing:border-box; }

        #checkout-modal { position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,.75); display:none; justify-content:center; align-items:center; z-index:999; }
        #checkout-modal.show { display:flex; }
        #checkout-content { background:white; padding:30px; border-radius:15px; max-width:550px; width:90%; position:relative; box-shadow:0 10px 30px rgba(0,0,0,.4); max-height:90vh; overflow-y:auto; }
        #checkout-close-btn { position:absolute; top:15px; right:15px; font-size:1.5rem; cursor:pointer; background:none; border:none; color:#333; transition:color .2s; }

        #notification-box { position:fixed; bottom:20px; left:50%; transform:translateX(-50%); padding:15px 25px; border-radius:8px; color:white; font-weight:bold; z-index:2000; display:none; box-shadow:0 4px 15px rgba(0,0,0,.2); opacity:0; transition:opacity .3s ease, bottom .3s ease; }
        #notification-box.show { display:block; opacity:1; bottom:30px; }
        .notification-success { background:#4CAF50; } .notification-error { background:#F44336; } .notification-info { background:#2196F3; }

        @media (max-width:900px) { .filter-section { flex-direction:column; align-items:flex-start; } .search-input input { width:100%; } }
        @media (max-width:600px) {
            header { font-size:1.4rem; flex-direction:column; } .auth-controls { margin-top:10px; } nav { flex-direction:column; gap:10px; } nav a { border-bottom:none; } .carousel { height:300px; } .carousel-btn { font-size:1.5rem; padding:8px 12px; } .products-grid { grid-template-columns:1fr; } .footer-content { flex-direction:column; } #cart { width:280px; right:-10px; } #cart-wrapper { right:15px; } .slide-caption h3 { font-size:1.5rem; } .slide-caption p { font-size:.9rem; } #checkout-content { padding:20px; }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo" onclick="mostrarPagina('home')">CITADINO</div>
        <div class="auth-controls">
            <span id="welcome-user" style="display:none;"></span>
            <button id="login-btn" type="button">Iniciar Sesión / Registro</button>
            <button id="logout-btn" type="button" style="display:none;" onclick="cerrarSesion()">Cerrar Sesión</button>
        </div>
    </header>

    <nav>
        <a href="#" id="nav-home" class="active" onclick="mostrarPagina('home', event)">Inicio</a>
        <a href="#" id="nav-productos" onclick="mostrarPagina('home', event)">Productos</a>
        <a href="#" id="nav-clientes" onclick="mostrarPagina('clientes', event)" style="display: none;">Clientes</a> 
        <a href="#" id="nav-nosotros" onclick="mostrarPagina('nosotros', event)">Nosotros</a>
        <a href="#" id="nav-contacto" onclick="mostrarPagina('contacto', event)">Contacto</a>
    </nav>

    <div id="main-view">
        <div id="home-page" class="page-content">
            <div class="carousel">
                <div class="carousel-track" id="carousel-track"></div>
                <button class="carousel-btn prev" id="carousel-prev">&#10094;</button>
                <button class="carousel-btn next" id="carousel-next">&#10095;</button>
                <div class="carousel-indicators" id="carousel-indicators"></div>
            </div>

            <div class="offers-section">
                <div class="container">
                    <h2>🔥 Productos Destacados </h2>
                    <div class="offers" id="offers-list"></div>
                </div>
            </div>

            <div class="container">
                <h2>Catálogo Completo</h2>
                <div class="filter-section">
                    <div class="filters" id="category-filters"></div>
                    <div class="search-input">
                        <input type="text" id="search-bar" placeholder="Buscar gorras o vapers..." onkeyup="aplicarFiltros()">
                    </div>
                </div>

                <div class="products-grid" id="product-grid"></div>
            </div>
        </div>

        <div id="clientes-page" class="page-content" style="display: none;">
            <div class="container" style="max-width: 1000px; margin-top: 40px;">
                <h1 style="text-align: center; color: #000; font-size: 2.5rem; margin-bottom: 20px; border-bottom: 3px solid #ffd700; padding-bottom: 10px;">Gestión de Clientes y Productos</h1>
                <p style="text-align: center; color: #dc3545; font-weight: bold;" id="admin-warning">Esta sección es solo para uso administrativo.</p>

                <div style="display:flex; justify-content: space-between; align-items:flex-start; gap: 20px;">
                    <div id="client-list-container" style="flex:1;">
                        </div>

                    <div style="min-width: 320px; background:white; padding:15px; border-radius:8px; box-shadow:0 4px 10px rgba(0,0,0,0.06);">
                        <button id="export-clients-btn" class="btn-export" title="Exportar clientes a Excel">Exportar Clientes (.xlsx)</button>
                        <hr style="margin:15px 0;">
                        <h3 style="margin-top:0;">Añadir Producto (Admin)</h3>
                        <div style="display:flex; flex-direction:column; gap:8px;">
                            <input id="new-nombre" placeholder="Nombre del producto" />
                            <select id="new-categoria">
                                <option value="Gorras">Gorras</option>
                                <option value="Vapers">Vapers</option>
                            </select>
                            <input id="new-descripcion" placeholder="Descripción corta" />
                            <input id="new-precio" type="number" placeholder="Precio (número entero)" />
                            <input id="new-img" placeholder="URL imagen (opcional)" />
                            <label style="display:flex; align-items:center; gap:10px; font-weight:bold; margin-top:5px;">
                                <input type="checkbox" id="new-agotado" style="width:auto; margin:0;" />
                                Marcar como Agotado
                            </label>
                            <button id="add-product-btn" class="btn btn-primary">Añadir Producto</button>
                        </div>
                    </div>
                </div>

                <div id="admin-products-panel" style="margin-top:30px; display:none; background:white; padding:15px; border-radius:8px; box-shadow:0 4px 10px rgba(0,0,0,0.06);">
                    <h2 style="margin-top:0;">Administración de Productos</h2>
                    <table style="width:100%; border-collapse: collapse;">
                        <thead>
                            <tr style="background:#111; color:#fff;">
                                <th style="padding:10px; text-align:left;">ID</th>
                                <th style="padding:10px; text-align:left;">Nombre</th>
                                <th style="padding:10px; text-align:left;">Categoría</th>
                                <th style="padding:10px; text-align:right;">Precio</th>
                                <th style="padding:10px; text-align:center;">Stock</th>
                                <th style="padding:10px; text-align:center;">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="admin-products-tbody"></tbody>
                    </table>
                </div>
            </div>
        </div>


        <div id="nosotros-page" class="page-content" style="display: none;">
            <div id="nosotros-page">
                <h1>Nuestra Historia</h1>
                <p>Citadino nació de la pasión por la moda urbana y la necesidad de ofrecer productos de calidad y estilo. Somos una tienda dedicada a la venta de las mejores gorras y la más avanzada tecnología en vapers.</p>
                <h2>Conoce al Equipo</h2>
                <div class="team-member">
                    <img src="https://placehold.co/80x80/6A1B9A/FFFFFF?text=CEO" alt="CEO Citadino">
                    <div><strong>Ricardo Varela, CEO & Fundador</strong><p>Visión de la marca y experto en tendencias de accesorios urbanos.</p></div>
                </div>
                <div class="team-member">
                    <img src="https://placehold.co/80x80/004D40/FFFFFF?text=Curador" alt="Curador de Producto">
                    <div><strong>Andrea Soto, Curadora Principal</strong><p>Lidera la selección de gorras y la validación de calidad de los vapers.</p></div>
                </div>
            </div>
        </div>
        
        <div id="contacto-page" class="page-content" style="display: none;">
            <div class="container" style="max-width: 600px; padding: 40px; background: white; border-radius: 12px; margin-top: 50px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                <h1>Contáctanos</h1>
                <p>¡Estamos aquí para ayudarte! Escríbenos y te responderemos a la brevedad.</p>
                <form onsubmit="mostrarNotificacion('Mensaje de contacto enviado. ¡Gracias!', 'info'); return false;">
                    <label for="c-nombre">Nombre:</label>
                    <input type="text" id="c-nombre" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 8px;">
                    <label for="c-email">Email:</label>
                    <input type="email" id="c-email" required style="width: 100%; padding: 10px; margin-bottom: 15px; border: 1px solid #ccc; border-radius: 8px;">
                    <label for="c-mensaje">Mensaje:</label>
                    <textarea id="c-mensaje" rows="5" required style="width: 100%; padding: 10px; margin-bottom: 20px; border: 1px solid #ccc; border-radius: 8px; resize: vertical;"></textarea>
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Enviar Mensaje</button>
                </form>
            </div>
        </div>

    </div>
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h4>Acerca de Citadino</h4>
                <ul>
                    <li><a href="#" onclick="mostrarPagina('nosotros', event)">Nuestra Misión</a></li>
                    <li><a href="#">Términos y Condiciones</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h4>Atención al Cliente</h4>
                <ul>
                    <li><a href="#" onclick="mostrarPagina('contacto', event)">Atención al Cliente</a></li>
                    </ul>
            </div>
            <div class="footer-section">
                <h4>Síguenos</h4>
                <a href="https://www.instagram.com/citadino_cap?utm_source=ig_web_button_share_sheet&igsh=ZDNlZDc0MzIxNw==" target="_blank" rel="noopener noreferrer" style="color: white; margin-right: 15px; transition: color 0.2s;"><i class="fab fa-instagram"></i></a>
                <a href="https://www.facebook.com/CitadinoCap/" target="_blank" rel="noopener noreferrer" style="color: white; margin-right: 15px; transition: color 0.2s;"><i class="fab fa-facebook-f"></i></a>
                <a href="https://www.twitter.com/tucitadino" target="_blank" rel="noopener noreferrer" style="color: white; transition: color 0.2s;"><i class="fab fa-twitter"></i></a>
            </div>
        </div>
        <div class="footer-bottom">
            &copy; 2025 Citadino | Accesorios Urbanos y Más.
        </div>
    </footer>

    <div id="modal">
        <div id="modal-content">
            <button id="modal-close-btn" aria-label="Cerrar">&times;</button>
            <img id="modal-img" src="" alt="Imagen de producto en modal" onerror="this.src='https://placehold.co/600x350/000000/FFFFFF?text=Producto+Citadino'">
            <h2 id="modal-nombre"></h2>
            <p class="modal-price" id="modal-precio"></p>
            <p id="modal-descripcion" style="color: #666; font-size: 1.1rem; padding: 0 10px;"></p>
            <button id="modal-agregar" class="btn btn-primary"><i class="fas fa-shopping-cart"></i> Añadir al Carrito</button>
        </div>
    </div>

    <div id="auth-modal">
        <div id="auth-content">
            <button id="auth-close-btn" aria-label="Cerrar Modal de Autenticación">&times;</button>
            <div class="form-switch">
                <button id="switch-login" class="active">Iniciar Sesión</button>
                <button id="switch-register">Registrarse</button>
            </div>
            <div id="login-form" style="display:block;">
                <h3>Acceso de Clientes</h3>
                <input type="email" id="log-email" placeholder="Email" required>
                <input type="password" id="log-password" placeholder="Contraseña" required>
                <button type="button" class="btn btn-primary" onclick="iniciarSesion()">Iniciar Sesión</button>
            </div>
            <div id="register-form">
                <h3>Crear Cuenta Citadino</h3>
                <input type="text" id="reg-nombre" placeholder="Nombre Completo" required>
                <input type="date" id="reg-fecha" placeholder="Fecha de Cumpleaños" required>
                <input type="email" id="reg-email" placeholder="Email (Será su Correo)" required>
                <input type="tel" id="reg-telefono" placeholder="Teléfono" required>
                <input type="text" id="reg-direccion" placeholder="Dirección Completa de Envío" required>
                <input type="password" id="reg-password" placeholder="Contraseña" required>
                <button type="button" class="btn btn-primary" onclick="registrarUsuario()">Registrarse</button>
            </div>
        </div>
    </div>
    
    <div id="checkout-modal">
        <div id="checkout-content">
            <button id="checkout-close-btn" aria-label="Cerrar">&times;</button>
            <h2 style="font-size: 2rem; margin-bottom: 25px; color: #000; text-align: center;">Resumen de la Compra</h2>
            <div id="checkout-details" style="text-align: left;"></div>
            
            <h3 style="margin-top: 30px; font-size: 1.5rem; border-bottom: 2px solid #ddd; padding-bottom: 10px; text-align: center;">Método de Pago</h3>
            <div style="text-align: center; background: #fff8e1; border: 1px solid #ffecb3; padding: 15px; border-radius: 8px;">
                <p style="font-size: 1.1rem; font-weight: bold; color: #333;"><i class="fas fa-hand-holding-usd"></i> Pago Contra Entrega</p>
                <p style="font-size: 0.9rem; color: #666;">Pagas en efectivo o con datafono al recibir tu pedido en la dirección de envío.</p>
            </div>

            <button id="btn-confirmar-pago" class="btn btn-primary" style="width: 100%; margin-top: 25px;">
                Confirmar Pedido y Pagar Contra Entrega
            </button>
        </div>
    </div>

    <div id="cart-wrapper">
        <div id="cart-icon" aria-label="Abrir Carrito">
            <i class="fas fa-shopping-cart"></i>
            <span id="cart-count">0</span>
        </div>
        <div id="cart">
            <h3>Tu Carrito</h3>
            <ul id="carrito-items"></ul>
            <p class="cart-total">Subtotal: $<span id="carrito-total">0</span></p>
            <button id="btn-pagar" class="btn btn-primary" style="width: 100%;">Proceder al Pago</button>
        </div>
    </div>

    <div id="notification-box"></div>

    <script src="https://cdn.jsdelivr.net/npm/xlsx@0.18.5/dist/xlsx.full.min.js"></script>

    <script>
        /* =========================================================================
           ==================== JAVASCRIPT - LÓGICA COMPLETA ========================
           ========================================================================= */

        const IVA_RATE = 0.19;
        const SHIPPING_COST = 15000;

        // Productos por defecto con la nueva propiedad 'agotado'
        let productos = [
            {id: 1, nombre:"Gorra Negra Classic", precio:50000, categoria: "Gorras", descripcion:"Gorra clásica negra, estilo minimalista y ajustable.", img:"https://placehold.co/600x400/000000/FFFFFF?text=Gorra+Negra", agotado: false},
            {id: 2, nombre:"Gorra Estampada", precio:65000, categoria: "Gorras", descripcion:"Diseño exclusivo con estampado urbano, visera plana.", img:"https://placehold.co/600x400/9C27B0/FFFFFF?text=Gorra+Estampada", agotado: false},
            {id: 3, nombre:"Gorra Deportiva Azul", precio:45000, categoria: "Gorras", descripcion:"Gorra deportiva azul, ideal para actividades al aire libre.", img:"https://placehold.co/600x400/2196F3/FFFFFF?text=Gorra+Azul", agotado: false},
            {id: 4, nombre:"Gorra Roja", precio:49000, categoria: "Gorras", descripcion:"Gorra llamativa en color rojo, estilo urbano.", img:"https://placehold.co/600x400/F44336/FFFFFF?text=Gorra+Roja", agotado: false},
            {id: 5, nombre:"Gorra Gris", precio:55000, categoria: "Gorras", descripcion:"Elegante gorra gris combinable con cualquier outfit.", img:"https://placehold.co/600x400/607D8B/FFFFFF?text=Gorra+Gris", agotado: true}, // Ejemplo agotado
            {id: 6, nombre:"Gorra Verde", precio:53000, categoria: "Gorras", descripcion:"Gorra verde con visera curva, cómoda para el día a día.", img:"https://placehold.co/600x400/4CAF50/FFFFFF?text=Gorra+Verde", agotado: false},
            {id: 7, nombre:"Vaper Kit Premium", precio:180000, categoria: "Vapers", descripcion:"Kit completo de vaper de alta gama con control de temperatura.", img:"https://placehold.co/600x400/FFC107/000000?text=Vaper+Kit", agotado: false},
            {id: 8, nombre:"Esencia Menta Fresca", precio:35000, categoria: "Vapers", descripcion:"Líquido para vaper sabor menta fresca de 60ml.", img:"https://placehold.co/600x400/00BCD4/FFFFFF?text=Esencia+Menta", agotado: false},
            {id: 9, nombre:"Pod Recargable", precio:70000, categoria: "Vapers", descripcion:"Sistema de pod recargable, discreto y fácil de usar.", img:"https://placehold.co/600x400/795548/FFFFFF?text=Pod+Vaper", agotado: true}, // Ejemplo agotado
        ];
        // Asegura que los productos se carguen desde localStorage si existen, si no usa los valores por defecto
        if (localStorage.getItem('productos')) {
            productos = JSON.parse(localStorage.getItem('productos'));
        } else {
            localStorage.setItem('productos', JSON.stringify(productos));
        }


        // Usuarios por defecto (Admin incluido)
        let usuarios = [
            {id: 'admin', nombre: 'Administrador Citadino', email: 'admin@citadino.com', telefono: 'N/A', direccion: 'N/A', fechaNacimiento: 'N/A', password: 'admin123', rol: 'admin'},
        ];
        // Cargar usuarios desde localStorage
        if (localStorage.getItem('usuarios')) {
            const storedUsers = JSON.parse(localStorage.getItem('usuarios'));
            // Asegura que el admin esté presente si se perdió, o usa la lista completa si el admin ya estaba en local
            const adminExists = storedUsers.some(u => u.id === 'admin');
            if (!adminExists) {
                usuarios = [usuarios[0], ...storedUsers.filter(u => u.id !== 'admin')];
            } else {
                usuarios = storedUsers;
            }
        } else {
            localStorage.setItem('usuarios', JSON.stringify(usuarios));
        }


        // Estado del Carrito y Usuario Actual
        let carrito = JSON.parse(localStorage.getItem('carrito')) || [];
        let usuarioActual = JSON.parse(sessionStorage.getItem('usuarioActual')) || null;
        let filtroCategoriaActual = 'Todos';

        // =====================================================================
        // ======================== FUNCIONES UTILITARIAS ========================
        // =====================================================================

        // Muestra notificaciones temporales
        function mostrarNotificacion(mensaje, tipo) {
            const box = document.getElementById('notification-box');
            box.textContent = mensaje;
            box.className = ''; // Limpia clases anteriores
            box.classList.add('show', 'notification-' + tipo);
            setTimeout(() => {
                box.classList.remove('show');
            }, 3000);
        }

        // Formatea el precio a moneda colombiana (COP)
        function formatCOP(price) {
            return price.toLocaleString('es-CO', { style: 'currency', currency: 'COP', minimumFractionDigits: 0 });
        }

        // Alternar entre páginas y control de visibilidad
        function mostrarPagina(pageId, event = null) {
            if (event) {
                event.preventDefault();
            }

            const pages = ['home-page', 'clientes-page', 'nosotros-page', 'contacto-page'];
            pages.forEach(id => {
                document.getElementById(id).style.display = (id === pageId + '-page') ? 'block' : 'none';
            });

            // Actualizar clase activa en la navegación
            document.querySelectorAll('nav a').forEach(link => {
                link.classList.remove('active');
            });
            const navLink = document.getElementById(`nav-${pageId}`);
            if (navLink) navLink.classList.add('active');

            // Lógica específica al cambiar de página
            if (pageId === 'clientes') {
                if (usuarioActual && usuarioActual.rol === 'admin') {
                    document.getElementById('admin-warning').style.display = 'none';
                    document.getElementById('admin-products-panel').style.display = 'block';
                    renderClientList();
                    renderAdminProducts();
                } else {
                    // Si no es admin, muestra advertencia y oculta contenido
                    document.getElementById('admin-warning').style.display = 'block';
                    document.getElementById('client-list-container').innerHTML = '';
                    document.getElementById('admin-products-panel').style.display = 'none';
                }
            } else if (pageId === 'home') {
                aplicarFiltros();
            }
        }

        // =====================================================================
        // ======================= GESTIÓN DE AUTENTICACIÓN =======================
        // =====================================================================

        function actualizarUI() {
            const welcomeUser = document.getElementById('welcome-user');
            const loginBtn = document.getElementById('login-btn');
            const logoutBtn = document.getElementById('logout-btn');
            const adminNavClientes = document.getElementById('nav-clientes');

            if (usuarioActual) {
                welcomeUser.textContent = `¡Hola, ${usuarioActual.nombre.split(' ')[0]}!`;
                welcomeUser.style.display = 'inline';
                loginBtn.style.display = 'none';
                logoutBtn.style.display = 'inline';
                
                // Mostrar/Ocultar el link de Clientes (Solo para Admin)
                if (usuarioActual.rol === 'admin') {
                    adminNavClientes.style.display = 'block';
                } else {
                    adminNavClientes.style.display = 'none';
                }
            } else {
                welcomeUser.style.display = 'none';
                loginBtn.style.display = 'inline';
                logoutBtn.style.display = 'none';
                adminNavClientes.style.display = 'none';
            }
        }

        function abrirModalAuth() {
            document.getElementById('auth-modal').classList.add('show');
            // Asegurar que el formulario de login esté visible por defecto
            document.getElementById('login-form').style.display = 'block';
            document.getElementById('register-form').style.display = 'none';
            document.getElementById('switch-login').classList.add('active');
            document.getElementById('switch-register').classList.remove('active');
            document.getElementById('auth-content').scrollTop = 0; // Reset scroll
        }
        
        document.getElementById('auth-close-btn').onclick = () => {
            document.getElementById('auth-modal').classList.remove('show');
        };
        
        document.getElementById('login-btn').onclick = abrirModalAuth;

        document.getElementById('switch-login').onclick = () => {
            document.getElementById('login-form').style.display = 'block';
            document.getElementById('register-form').style.display = 'none';
            document.getElementById('switch-login').classList.add('active');
            document.getElementById('switch-register').classList.remove('active');
        };

        document.getElementById('switch-register').onclick = () => {
            document.getElementById('login-form').style.display = 'none';
            document.getElementById('register-form').style.display = 'block';
            document.getElementById('switch-register').classList.add('active');
            document.getElementById('switch-login').classList.remove('active');
        };

        function iniciarSesion() {
            const email = document.getElementById('log-email').value;
            const password = document.getElementById('log-password').value;

            const user = usuarios.find(u => u.email === email && u.password === password);

            if (user) {
                usuarioActual = user;
                sessionStorage.setItem('usuarioActual', JSON.stringify(usuarioActual));
                document.getElementById('auth-modal').classList.remove('show');
                actualizarUI();
                mostrarNotificacion(`Bienvenido, ${usuarioActual.nombre.split(' ')[0]}!`, 'success');
                // Si es admin, redirige a la gestión de clientes
                if (usuarioActual.rol === 'admin') {
                    mostrarPagina('clientes');
                } else {
                    // Si es cliente, asegura que la página de productos esté visible
                    mostrarPagina('home');
                }
            } else {
                mostrarNotificacion('Email o Contraseña incorrectos.', 'error');
            }
        }

        function registrarUsuario() {
            const nombre = document.getElementById('reg-nombre').value;
            const fechaNacimiento = document.getElementById('reg-fecha').value;
            const email = document.getElementById('reg-email').value;
            const telefono = document.getElementById('reg-telefono').value;
            const direccion = document.getElementById('reg-direccion').value;
            const password = document.getElementById('reg-password').value;

            if (usuarios.some(u => u.email === email)) {
                mostrarNotificacion('El email ya está registrado.', 'error');
                return;
            }
            if (!nombre || !fechaNacimiento || !email || !telefono || !direccion || !password) {
                mostrarNotificacion('Por favor, completa todos los campos.', 'error');
                return;
            }

            const nuevoUsuario = {
                id: Date.now().toString(), // ID único basado en timestamp
                nombre,
                fechaNacimiento,
                email,
                telefono,
                direccion,
                password,
                rol: 'cliente' // Rol por defecto
            };

            usuarios.push(nuevoUsuario);
            localStorage.setItem('usuarios', JSON.stringify(usuarios));

            // Iniciar sesión automáticamente
            usuarioActual = nuevoUsuario;
            sessionStorage.setItem('usuarioActual', JSON.stringify(usuarioActual));

            document.getElementById('auth-modal').classList.remove('show');
            actualizarUI();
            mostrarNotificacion(`¡Registro exitoso! Bienvenido, ${nombre.split(' ')[0]}.`, 'success');
            mostrarPagina('home');
        }

        function cerrarSesion() {
            usuarioActual = null;
            sessionStorage.removeItem('usuarioActual');
            actualizarUI();
            mostrarPagina('home');
            mostrarNotificacion('Sesión cerrada correctamente.', 'info');
        }

        // =====================================================================
        // ====================== GESTIÓN DE PRODUCTOS (FRONT) =====================
        // =====================================================================

        // Renderiza la cuadrícula de productos
        function renderProducts(productosAmostrar) {
            const grid = document.getElementById('product-grid');
            grid.innerHTML = '';
            
            if (productosAmostrar.length === 0) {
                 grid.innerHTML = '<p style="grid-column: 1 / -1; text-align: center; font-size: 1.2rem; color: #777; padding: 50px 0;">No se encontraron productos que coincidan con la búsqueda o filtro.</p>';
                 return;
            }

            productosAmostrar.forEach(producto => {
                const isAgotado = producto.agotado;
                const card = document.createElement('div');
                card.className = `card ${isAgotado ? 'agotado' : ''}`;
                card.setAttribute('data-id', producto.id);
                card.innerHTML = `
                    ${isAgotado ? '<div class="agotado-badge">AGOTADO</div>' : ''}
                    <img src="${producto.img}" alt="${producto.nombre}" onerror="this.src='https://placehold.co/600x400/000000/FFFFFF?text=Producto+Citadino'">
                    <h4>${producto.nombre}</h4>
                    <p>${producto.descripcion}</p>
                    <div class="price">${formatCOP(producto.precio)}</div>
                    <div class="card-actions">
                        <button class="btn btn-secondary" onclick="openProductModal(${producto.id})">Ver Detalles</button>
                        <button class="btn btn-primary" ${isAgotado ? 'disabled' : ''} onclick="addToCart(${producto.id})"><i class="fas fa-shopping-cart"></i> Añadir</button>
                    </div>
                `;
                grid.appendChild(card);
            });
        }

        // Crea los botones de filtro por categoría
        function createCategoryFilters() {
            const filtersDiv = document.getElementById('category-filters');
            filtersDiv.innerHTML = '';
            const categories = ['Todos', 'Gorras', 'Vapers'];

            categories.forEach(category => {
                const button = document.createElement('button');
                button.className = 'btn';
                if (category === filtroCategoriaActual) {
                    button.classList.add('active');
                }
                button.textContent = category;
                button.onclick = () => {
                    filtroCategoriaActual = category;
                    createCategoryFilters(); // Para actualizar la clase 'active'
                    aplicarFiltros();
                };
                filtersDiv.appendChild(button);
            });
        }

        // Aplica los filtros (Categoría y Búsqueda)
        function aplicarFiltros() {
            const searchTerm = document.getElementById('search-bar').value.toLowerCase();

            let filteredProducts = productos.filter(p => {
                const matchesCategory = (filtroCategoriaActual === 'Todos' || p.categoria === filtroCategoriaActual);
                const matchesSearch = p.nombre.toLowerCase().includes(searchTerm) || p.descripcion.toLowerCase().includes(searchTerm);
                return matchesCategory && matchesSearch;
            });

            renderProducts(filteredProducts);
        }

        // Abre el modal de detalles del producto
        function openProductModal(productId) {
            const producto = productos.find(p => p.id === productId);
            if (!producto) return;

            document.getElementById('modal-img').src = producto.img;
            document.getElementById('modal-nombre').textContent = producto.nombre;
            document.getElementById('modal-precio').textContent = formatCOP(producto.precio);
            document.getElementById('modal-descripcion').textContent = producto.descripcion;
            
            const addButton = document.getElementById('modal-agregar');
            if (producto.agotado) {
                addButton.disabled = true;
                addButton.textContent = 'AGOTADO';
                addButton.classList.remove('btn-primary');
                addButton.classList.add('btn-danger');
            } else {
                addButton.disabled = false;
                addButton.textContent = 'Añadir al Carrito';
                addButton.classList.add('btn-primary');
                addButton.classList.remove('btn-danger');
                // Reemplazar el listener existente
                addButton.onclick = () => {
                    addToCart(producto.id);
                    document.getElementById('modal').classList.remove('show');
                };
            }

            document.getElementById('modal').classList.add('show');
        }

        document.getElementById('modal-close-btn').onclick = () => {
            document.getElementById('modal').classList.remove('show');
        };
        
        document.getElementById('modal').onclick = (e) => {
            if (e.target.id === 'modal') {
                document.getElementById('modal').classList.remove('show');
            }
        };


        // =====================================================================
        // ======================== GESTIÓN DEL CARRITO ========================
        // =====================================================================

        // Renderiza el contenido del carrito
        function renderCart() {
            const ul = document.getElementById('carrito-items');
            const totalSpan = document.getElementById('carrito-total');
            const countSpan = document.getElementById('cart-count');
            const btnPagar = document.getElementById('btn-pagar');
            ul.innerHTML = '';

            let total = 0;
            let itemCount = 0;

            // Primero, limpiar el carrito de cualquier producto que haya sido eliminado por el admin o marcado como agotado
            carrito = carrito.filter(item => {
                const product = productos.find(p => p.id === item.id);
                return product && !product.agotado;
            });


            if (carrito.length === 0) {
                ul.innerHTML = '<li style="text-align:center; color:#777; font-style:italic;">Tu carrito está vacío.</li>';
                totalSpan.textContent = formatCOP(0);
                countSpan.style.display = 'none';
                btnPagar.disabled = true;
            } else {
                carrito.forEach(item => {
                    const producto = productos.find(p => p.id === item.id);
                    if (!producto) return; // Ya se filtró, pero por seguridad
                    
                    const itemTotal = producto.precio * item.quantity;
                    total += itemTotal;
                    itemCount += item.quantity;

                    const li = document.createElement('li');
                    li.innerHTML = `
                        <div class="item-info">
                            <img src="${producto.img}" alt="${producto.nombre}">
                            <span>${producto.nombre.substring(0, 15)}...</span>
                        </div>
                        <div class="item-controls">
                            <button class="qty-btn" onclick="updateCartQuantity(${producto.id}, -1)">-</button>
                            <span class="qty-display">${item.quantity}</span>
                            <button class="qty-btn" onclick="updateCartQuantity(${producto.id}, 1)">+</button>
                            <button class="remove-btn" onclick="removeFromCart(${producto.id})"><i class="fas fa-trash-alt"></i></button>
                        </div>
                        <span>${formatCOP(itemTotal)}</span>
                    `;
                    ul.appendChild(li);
                });

                totalSpan.textContent = formatCOP(total);
                countSpan.textContent = itemCount;
                countSpan.style.display = 'block';
                btnPagar.disabled = false;
            }

            localStorage.setItem('carrito', JSON.stringify(carrito));
        }

        // Añadir producto al carrito
        function addToCart(productId) {
            const producto = productos.find(p => p.id === productId);

            if (!producto || producto.agotado) {
                mostrarNotificacion('Este producto está agotado.', 'error');
                return;
            }

            const existingItem = carrito.find(item => item.id === productId);

            if (existingItem) {
                existingItem.quantity += 1;
            } else {
                carrito.push({ id: productId, quantity: 1 });
            }

            renderCart();
            mostrarNotificacion(`${producto.nombre} añadido al carrito.`, 'success');
        }

        // Actualizar cantidad de un producto en el carrito
        function updateCartQuantity(productId, change) {
            const item = carrito.find(i => i.id === productId);
            if (!item) return;

            item.quantity += change;

            if (item.quantity <= 0) {
                removeFromCart(productId);
            } else {
                renderCart();
            }
        }

        // Eliminar un producto del carrito
        function removeFromCart(productId) {
            const index = carrito.findIndex(i => i.id === productId);
            if (index > -1) {
                carrito.splice(index, 1);
                renderCart();
                mostrarNotificacion('Producto eliminado del carrito.', 'error');
            }
        }

        // Alternar visibilidad del carrito
        document.getElementById('cart-icon').onclick = () => {
            document.getElementById('cart').classList.toggle('open');
        };

        // Hacer que el carrito sea arrastrable (simple)
        const cartWrapper = document.getElementById('cart-wrapper');
        let isDragging = false;
        let offsetX, offsetY;

        cartWrapper.addEventListener('mousedown', (e) => {
            if (e.target.closest('#cart-icon')) {
                isDragging = true;
                offsetX = e.clientX - cartWrapper.getBoundingClientRect().left;
                offsetY = e.clientY - cartWrapper.getBoundingClientRect().top;
                cartWrapper.style.cursor = 'grabbing';
            }
        });

        document.addEventListener('mousemove', (e) => {
            if (!isDragging) return;
            e.preventDefault();
            const newLeft = e.clientX - offsetX;
            const newTop = e.clientY - offsetY;

            // Limitar para que no se salga de la ventana
            const maxX = window.innerWidth - cartWrapper.offsetWidth;
            const maxY = window.innerHeight - cartWrapper.offsetHeight;

            cartWrapper.style.left = Math.min(Math.max(0, newLeft), maxX) + 'px';
            cartWrapper.style.top = Math.min(Math.max(0, newTop), maxY) + 'px';
            cartWrapper.style.right = 'unset'; // Desactivar right para usar left
        });

        document.addEventListener('mouseup', () => {
            isDragging = false;
            cartWrapper.style.cursor = 'move';
        });


        // =====================================================================
        // ======================== PROCESO DE PAGO (CHECKOUT) =======================
        // =====================================================================

        document.getElementById('btn-pagar').onclick = () => {
            if (!usuarioActual) {
                mostrarNotificacion('Debes iniciar sesión para proceder al pago.', 'info');
                abrirModalAuth();
                return;
            }
            if (carrito.length === 0) {
                mostrarNotificacion('El carrito está vacío.', 'info');
                return;
            }

            if (usuarioActual.rol === 'admin') {
                mostrarNotificacion('El usuario Administrador no puede realizar compras.', 'error');
                return;
            }

            renderCheckoutModal();
            document.getElementById('checkout-modal').classList.add('show');
        };
        
        document.getElementById('checkout-close-btn').onclick = () => {
            document.getElementById('checkout-modal').classList.remove('show');
        };

        function renderCheckoutModal() {
            const detailsDiv = document.getElementById('checkout-details');
            detailsDiv.innerHTML = '';
            let subtotal = 0;

            let html = `
                <h3 style="font-size: 1.5rem; text-align: center; color: #dc3545; margin-bottom: 20px;">
                    ¡Estás a un paso de completar tu pedido!
                </h3>
                
                <div style="background: #f8f8f8; padding: 15px; border-radius: 8px; margin-bottom: 20px; border: 1px solid #eee;">
                    <h4 style="margin-top:0; border-bottom: 1px dashed #ddd; padding-bottom: 8px;">Datos de Envío:</h4>
                    <p><strong>Cliente:</strong> ${usuarioActual.nombre}</p>
                    <p><strong>Email:</strong> ${usuarioActual.email}</p>
                    <p><strong>Teléfono:</strong> ${usuarioActual.telefono}</p>
                    <p><strong>Dirección:</strong> ${usuarioActual.direccion}</p>
                </div>

                <h4 style="border-bottom: 1px dashed #ddd; padding-bottom: 8px; margin-top: 20px;">Artículos (${carrito.length}):</h4>
                <ul style="list-style: none; padding: 0;">
            `;

            carrito.forEach(item => {
                const producto = productos.find(p => p.id === item.id);
                if (!producto) return;
                const itemTotal = producto.precio * item.quantity;
                subtotal += itemTotal;
                html += `
                    <li style="display: flex; justify-content: space-between; padding: 8px 0; font-size: 1rem;">
                        <span>${item.quantity}x ${producto.nombre}</span>
                        <span style="font-weight: bold;">${formatCOP(itemTotal)}</span>
                    </li>
                `;
            });
            
            html += `</ul><hr style="border: 1px solid #ddd;">`;

            const totalConIVA = subtotal * (1 + IVA_RATE);
            const totalFinal = totalConIVA + SHIPPING_COST;
            const ivaAmount = totalConIVA - subtotal;
            
            html += `
                <div style="text-align: right; font-size: 1.1rem;">
                    <p>Subtotal: <strong>${formatCOP(subtotal)}</strong></p>
                    <p>IVA (${IVA_RATE * 100}%): <strong>${formatCOP(ivaAmount)}</strong></p>
                    <p>Costo de Envío: <strong>${formatCOP(SHIPPING_COST)}</strong></p>
                    <p style="font-size: 1.4rem; color: #dc3545; border-top: 2px solid #dc3545; padding-top: 10px;">
                        Total Final: <strong>${formatCOP(totalFinal)}</strong>
                    </p>
                </div>
            `;

            detailsDiv.innerHTML = html;
        }

        document.getElementById('btn-confirmar-pago').onclick = () => {
            mostrarNotificacion('¡Pedido confirmado! Recibirás un email de confirmación en breve.', 'success');
            
            // Simulación de vaciado de carrito y cierre de modal
            carrito = [];
            renderCart();
            document.getElementById('checkout-modal').classList.remove('show');
            document.getElementById('cart').classList.remove('open');
        };

        // =====================================================================
        // ================= GESTIÓN DE CLIENTES Y PRODUCTOS (ADMIN) ================
        // =====================================================================

        // --- GESTIÓN DE CLIENTES ---

        function renderClientList() {
            const listContainer = document.getElementById('client-list-container');
            // Excluir al usuario con rol 'admin' de la lista de clientes a gestionar
            const clientUsers = usuarios.filter(u => u.rol === 'cliente');

            if (clientUsers.length === 0) {
                listContainer.innerHTML = '<h3>Clientes Registrados (0)</h3><p>Aún no hay clientes registrados.</p>';
                return;
            }

            let html = '<h3>Clientes Registrados (' + clientUsers.length + ')</h3>';
            html += '<table><thead><tr><th>Nombre</th><th>Email</th><th>Teléfono</th><th>Dirección</th><th>Reg.</th><th>Acciones</th></tr></thead><tbody>';

            clientUsers.forEach(user => {
                const regDate = user.id !== 'admin' ? new Date(parseInt(user.id)).toLocaleDateString() : 'N/A';
                html += `
                    <tr>
                        <td>${user.nombre}</td>
                        <td>${user.email}</td>
                        <td>${user.telefono}</td>
                        <td>${user.direccion}</td>
                        <td>${regDate}</td>
                        <td>
                            <button class="btn btn-danger" style="padding: 5px 10px; font-size: 0.85rem;" 
                                onclick="deleteClient('${user.id}', '${user.nombre}')">Eliminar</button>
                        </td>
                    </tr>
                `;
            });

            html += '</tbody></table>';
            listContainer.innerHTML = html;
        }

        /**
         * @description Función para eliminar un cliente de la lista de usuarios.
         */
        function deleteClient(id, nombre) {
            if (confirm(`¿Estás seguro de que deseas eliminar al cliente ${nombre}? Esta acción es irreversible.`)) {
                
                // Filtra la lista de usuarios, manteniendo solo los que NO coinciden con el ID
                usuarios = usuarios.filter(u => u.id !== id);
                
                // Actualiza el localStorage
                localStorage.setItem('usuarios', JSON.stringify(usuarios));
                
                // Vuelve a renderizar la lista de clientes y actualiza la UI
                renderClientList();
                mostrarNotificacion(`Cliente ${nombre} eliminado con éxito.`, 'error');
            }
        }


        // --- EXPORTAR CLIENTES A EXCEL ---

        document.getElementById('export-clients-btn').onclick = exportClientsToExcel;

        /**
         * @description Exporta la lista de clientes a un archivo Excel.
         * Se asegura de que el nombre del archivo sea "Gestion_Datos_Clientes.xlsx".
         */
        function exportClientsToExcel() {
            const clientData = usuarios
                .filter(u => u.rol === 'cliente')
                .map(u => ({
                    ID: u.id,
                    Nombre: u.nombre,
                    Email: u.email,
                    Telefono: u.telefono,
                    Direccion: u.direccion,
                    Fecha_Nacimiento: u.fechaNacimiento
                }));

            if (clientData.length === 0) {
                mostrarNotificacion('No hay datos de clientes para exportar.', 'info');
                return;
            }

            const ws = XLSX.utils.json_to_sheet(clientData);
            const wb = XLSX.utils.book_new();
            XLSX.utils.book_append_sheet(wb, ws, "ClientesCitadino");
            
            // *** NOMBRE DEL ARCHIVO SOLICITADO ***
            XLSX.writeFile(wb, "Gestion_Datos_Clientes.xlsx"); 
            mostrarNotificacion('Datos de clientes exportados con éxito.', 'success');
        }

        // --- GESTIÓN DE PRODUCTOS (ADMIN) ---

        // Renderiza la tabla de productos para el panel de administración
        function renderAdminProducts() {
            const tbody = document.getElementById('admin-products-tbody');
            tbody.innerHTML = '';

            productos.forEach(p => {
                const row = tbody.insertRow();
                row.insertCell().textContent = p.id;
                row.insertCell().textContent = p.nombre;
                row.insertCell().textContent = p.categoria;
                row.insertCell().textContent = formatCOP(p.precio);

                // Columna de Stock (Switch)
                const stockCell = row.insertCell();
                stockCell.style.textAlign = 'center';
                stockCell.innerHTML = `
                    <label class="stock-switch">
                        <input type="checkbox" id="stock-switch-${p.id}" ${p.agotado ? '' : 'checked'}
                            onchange="toggleProductStock(${p.id}, this)">
                        <span class="slider ${p.agotado ? 'slider-agotado' : ''}"></span>
                    </label>
                `;

                // Columna de Acciones (Eliminar)
                const actionCell = row.insertCell();
                actionCell.style.textAlign = 'center';
                actionCell.innerHTML = `
                    <button class="btn btn-danger" style="padding: 5px 10px; font-size: 0.85rem;"
                        onclick="deleteProduct(${p.id}, '${p.nombre}')">Eliminar</button>
                `;
            });
        }

        // Alternar el estado de stock de un producto
        function toggleProductStock(productId, checkbox) {
            const producto = productos.find(p => p.id === productId);
            if (!producto) return;
            
            // El checkbox.checked es verdadero si está disponible (no agotado)
            producto.agotado = !checkbox.checked;
            
            // Actualiza el slider visualmente
            const slider = checkbox.nextElementSibling;
            if (producto.agotado) {
                slider.classList.add('slider-agotado');
            } else {
                slider.classList.remove('slider-agotado');
            }

            localStorage.setItem('productos', JSON.stringify(productos));
            renderProducts(productos); // Actualiza la vista de la tienda
            renderCart(); // Asegura que el carrito se actualice si el producto se agota/habilita
            mostrarNotificacion(`Stock de ${producto.nombre} actualizado a: ${producto.agotado ? 'AGOTADO' : 'Disponible'}`, producto.agotado ? 'error' : 'success');
        }

        // Eliminar un producto permanentemente
        function deleteProduct(productId, productName) {
            if (confirm(`¿Estás seguro de que deseas eliminar el producto: ${productName}? Esta acción es irreversible.`)) {
                productos = productos.filter(p => p.id !== productId);
                localStorage.setItem('productos', JSON.stringify(productos));
                
                // Eliminarlo del carrito si estaba allí
                carrito = carrito.filter(item => item.id !== productId);
                localStorage.setItem('carrito', JSON.stringify(carrito));

                renderAdminProducts(); // Actualiza la lista de admin
                renderProducts(productos); // Actualiza la tienda
                renderCart(); // Actualiza el carrito
                mostrarNotificacion(`Producto ${productName} eliminado correctamente.`, 'error');
            }
        }

        // Añadir nuevo producto (desde el formulario)
        document.getElementById('add-product-btn').onclick = () => {
            const nombre = document.getElementById('new-nombre').value;
            const categoria = document.getElementById('new-categoria').value;
            const descripcion = document.getElementById('new-descripcion').value;
            const precio = parseInt(document.getElementById('new-precio').value);
            const img = document.getElementById('new-img').value || `https://placehold.co/600x400/000000/FFFFFF?text=${nombre.replace(/\s/g, '+')}`;
            const agotado = document.getElementById('new-agotado').checked;

            if (!nombre || !categoria || !descripcion || isNaN(precio) || precio <= 0) {
                mostrarNotificacion('Por favor, complete todos los campos requeridos (Nombre, Categoría, Descripción, Precio).', 'error');
                return;
            }

            const newId = productos.length > 0 ? Math.max(...productos.map(p => p.id)) + 1 : 1;

            const nuevoProducto = {
                id: newId,
                nombre,
                precio,
                categoria,
                descripcion,
                img,
                agotado
            };

            productos.push(nuevoProducto);
            localStorage.setItem('productos', JSON.stringify(productos));
            
            // Limpiar formulario y actualizar vistas
            document.getElementById('new-nombre').value = '';
            document.getElementById('new-descripcion').value = '';
            document.getElementById('new-precio').value = '';
            document.getElementById('new-img').value = '';
            document.getElementById('new-agotado').checked = false;

            renderAdminProducts();
            renderProducts(productos);
            mostrarNotificacion(`Producto ${nombre} añadido con éxito. ID: ${newId}`, 'success');
        };

        // =====================================================================
        // ============================ CARRUSEL Y OFERTAS ===========================
        // =====================================================================

        const slides = [
            { title: "¡NUEVA COLECCIÓN!", text: "Gorras y Vapers exclusivos, sé el primero en tenerlos.", img: "https://placehold.co/1200x450/333333/FFFFFF?text=Slide+1%3A+Nueva+Coleccion", cta: "Ver Productos" },
            { title: "VAPER PRO EDITION", text: "Disfruta de la mejor experiencia de vapeo con tecnología avanzada.", img: "https://placehold.co/1200x450/4CAF50/FFFFFF?text=Slide+2%3A+Vapers+Pro", cta: "Comprar Vaper" },
            { title: "ENVÍO GRATIS", text: "En pedidos superiores a $150.000 COP. ¡Aprovecha!", img: "https://placehold.co/1200x450/007bff/FFFFFF?text=Slide+3%3A+Envio+Gratis", cta: "Ver Ofertas" }
        ];

        let currentSlide = 0;
        const track = document.getElementById('carousel-track');
        const indicators = document.getElementById('carousel-indicators');

        function renderCarousel() {
            track.innerHTML = '';
            indicators.innerHTML = '';
            slides.forEach((slide, index) => {
                const slideDiv = document.createElement('div');
                slideDiv.className = 'carousel-slide';
                slideDiv.innerHTML = `
                    <img src="${slide.img}" alt="Slide ${index + 1}">
                    <div class="slide-caption">
                        <h3>${slide.title}</h3>
                        <p>${slide.text}</p>
                        <button class="btn btn-primary" onclick="mostrarPagina('home', event)">${slide.cta}</button>
                    </div>
                `;
                track.appendChild(slideDiv);

                const dot = document.createElement('span');
                dot.className = 'dot';
                dot.onclick = () => moveToSlide(index);
                indicators.appendChild(dot);
            });
            updateCarousel();
        }

        function updateCarousel() {
            if (track.children.length === 0) return;
            const slideWidth = track.children[0].offsetWidth;
            track.style.transform = `translateX(-${currentSlide * slideWidth}px)`;

            document.querySelectorAll('.dot').forEach((dot, index) => {
                dot.classList.toggle('active', index === currentSlide);
            });
        }

        function moveToSlide(index) {
            currentSlide = index;
            if (currentSlide < 0) currentSlide = slides.length - 1;
            if (currentSlide >= slides.length) currentSlide = 0;
            updateCarousel();
        }

        document.getElementById('carousel-prev').onclick = () => moveToSlide(currentSlide - 1);
        document.getElementById('carousel-next').onclick = () => moveToSlide(currentSlide + 1);

        // Auto-slide
        setInterval(() => moveToSlide(currentSlide + 1), 5000);

        // Renderiza las ofertas (muestra 3 productos aleatorios)
        function renderOffers() {
            const offersList = document.getElementById('offers-list');
            offersList.innerHTML = '';

            // Filtrar solo productos que no estén agotados
            const availableProducts = productos.filter(p => !p.agotado);

            // Selecciona 3 productos únicos y disponibles al azar
            const shuffled = availableProducts.sort(() => 0.5 - Math.random());
            const selectedOffers = shuffled.slice(0, 3);

            if (selectedOffers.length === 0) {
                offersList.innerHTML = '<p style="text-align:center;">No hay productos disponibles para destacar.</p>';
                return;
            }

            selectedOffers.forEach(p => {
                const offerDiv = document.createElement('div');
                offerDiv.className = 'offer';
                offerDiv.onclick = () => openProductModal(p.id);
                offerDiv.innerHTML = `
                    <div class="offer-title">${p.nombre}</div>
                    <p class="offer-text">Precio: ${formatCOP(p.precio)}</p>
                    <p class="offer-text">${p.descripcion.substring(0, 50)}...</p>
                    <button class="btn btn-primary" style="margin-top:10px;">¡Comprar Ahora!</button>
                `;
                offersList.appendChild(offerDiv);
            });
        }

        // =====================================================================
        // =============================== INICIALIZACIÓN ==============================
        // =====================================================================

        document.addEventListener('DOMContentLoaded', () => {
            // Ejecutar funciones de inicialización
            actualizarUI();
            renderCart();
            createCategoryFilters();
            renderProducts(productos);
            renderCarousel();
            renderOffers();
            
            // Inicializar la vista
            mostrarPagina('home'); 

            // Manejar el resize del carrusel para corrección visual
            window.addEventListener('resize', updateCarousel);
        });

    </script>
</body>
</html>