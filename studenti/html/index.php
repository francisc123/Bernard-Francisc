<?php 
// Nu există cod PHP specific pentru această pagină în afară de include,
// dar am adăugat tag-ul de deschidere pentru a indica faptul că este un fișier PHP.
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DriveHub | Dealer Auto Premium</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Roboto:wght@300;400&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../css/common-nav.css">
    
    <link rel="stylesheet" href="../css/index.css">
</head>
<body id="top">
    
    <?php include '../server/header.php'; ?>
    
    <div id="main-content-wrapper">
        
        <main>
            <section id="hero">
                <div id="hero-content">
                    <h1>Găsește Mașina Visurilor Tale Astăzi</h1>
                    <p>Descoperă cea mai largă selecție de vehicule noi și rulate, certificate.</p>
                    <a href="#inventory" class="cta-button">Explorează Inventarul</a>
                </div>
            </section>

            <section id="filter-bar">
                <div class="filter-group">
                    <select id="filter-marca">
                        <option value="">Toate Mărcile</option>
                        <option value="BMW">BMW</option>
                        <option value="Audi">Audi</option>
                        <option value="Mercedes">Mercedes</option>
                    </select>
                    <select id="filter-an">
                        <option value="">Toți Anii</option>
                        <option value="2024">2024</option>
                        <option value="2023">2023</option>
                        <option value="2022">2022</option>
                    </select>
                    <input type="number" id="filter-pret-min" placeholder="Preț Min (€)">
                    <input type="number" id="filter-pret-max" placeholder="Preț Max (€)">
                    <button id="search-btn">Caută</button>
                </div>
            </section>

            <section id="inventory">
                <h2>Inventarul Nostru</h2>
                <div class="inventory-grid" id="car-list">
                    
                    <div class="car-card" data-marca="BMW" data-an="2024" data-pret="35000">
                        <img src="https://via.placeholder.com/300x200?text=BMW+Seria+3" alt="BMW Seria 3">
                        <div class="card-body">
                            <h3>BMW Seria 3</h3>
                            <p class="car-card-price">€ 35,000</p>
                            <p>An: 2024 | Km: 5,000</p>
                            <a href="#" class="cta-button" style="display: inline-block; margin-top: 10px;">Detalii</a>
                        </div>
                    </div>
                    
                    <div class="car-card" data-marca="Audi" data-an="2023" data-pret="28500">
                        <img src="https://via.placeholder.com/300x200?text=Audi+A4" alt="Audi A4">
                        <div class="card-body">
                            <h3>Audi A4</h3>
                            <p class="car-card-price">€ 28,500</p>
                            <p>An: 2023 | Km: 15,000</p>
                            <a href="#" class="cta-button" style="display: inline-block; margin-top: 10px;">Detalii</a>
                        </div>
                    </div>
                    
                    <div class="car-card" data-marca="Mercedes" data-an="2022" data-pret="32000">
                        <img src="https://via.placeholder.com/300x200?text=Mercedes+C-Class" alt="Mercedes C-Class">
                        <div class="card-body">
                            <h3>Mercedes C-Class</h3>
                            <p class="car-card-price">€ 32,000</p>
                            <p>An: 2022 | Km: 25,000</p>
                            <a href="#" class="cta-button" style="display: inline-block; margin-top: 10px;">Detalii</a>
                        </div>
                    </div>
                    
                    <div class="car-card" data-marca="BMW" data-an="2022" data-pret="45000">
                        <img src="https://via.placeholder.com/300x200?text=BMW+X5" alt="BMW X5">
                        <div class="card-body">
                            <h3>BMW X5</h3>
                            <p class="car-card-price">€ 45,000</p>
                            <p>An: 2022 | Km: 30,000</p>
                            <a href="#" class="cta-button" style="display: inline-block; margin-top: 10px;">Detalii</a>
                        </div>
                    </div>
                    
                    <div class="car-card" data-marca="Audi" data-an="2024" data-pret="42000">
                        <img src="https://via.placeholder.com/300x200?text=Audi+Q5" alt="Audi Q5">
                        <div class="card-body">
                            <h3>Audi Q5</h3>
                            <p class="car-card-price">€ 42,000</p>
                            <p>An: 2024 | Km: 8,000</p>
                            <a href="#" class="cta-button" style="display: inline-block; margin-top: 10px;">Detalii</a>
                        </div>
                    </div>
                    
                    <div class="car-card" data-marca="Mercedes" data-an="2023" data-pret="55000">
                        <img src="https://via.placeholder.com/300x200?text=Mercedes+GLE" alt="Mercedes GLE">
                        <div class="card-body">
                            <h3>Mercedes GLE</h3>
                            <p class="car-card-price">€ 55,000</p>
                            <p>An: 2023 | Km: 12,000</p>
                            <a href="#" class="cta-button" style="display: inline-block; margin-top: 10px;">Detalii</a>
                        </div>
                    </div>
                    
                </div>
            </section>
        </main>
        
        <aside>
            <h3>Filtre Avansate</h3>
            <p><strong> Căutare Rapidă</strong></p>
            <p>Utilizează filtrele de mai sus pentru a găsi mașina perfectă.</p>
            
            <h3 style="margin-top: 20px;">Statistici</h3>
            <p>✓ Peste 1,245 mașini în stoc</p>
            <p>✓ Prețuri competitive</p>
            <p>✓ Garanție inclusă</p>
            
            <h3 style="margin-top: 20px;"> Sfaturi</h3>
            <p>Compară prețurile și caracteristicile pentru a face alegerea potrivită.</p>
        </aside>

    </div>

    <footer>
        <p>&copy; 2025 DriveHub. Toate drepturile rezervate.</p>
        <p> Str. Exemplului, Nr. 10, București |  021 999 999</p>
    </footer>

    <a href="#top" id="back-to-top">⬆️</a>

    <script>
        // Script pentru filtrare mașini
        document.getElementById('search-btn').addEventListener('click', function() {
            const marca = document.getElementById('filter-marca').value.toLowerCase();
            const an = document.getElementById('filter-an').value;
            const pretMin = parseInt(document.getElementById('filter-pret-min').value) || 0;
            const pretMax = parseInt(document.getElementById('filter-pret-max').value) || Infinity;
            
            const cards = document.querySelectorAll('.car-card');
            
            cards.forEach(card => {
                const cardMarca = card.getAttribute('data-marca').toLowerCase();
                const cardAn = card.getAttribute('data-an');
                const cardPret = parseInt(card.getAttribute('data-pret'));
                
                const matchMarca = !marca || cardMarca.includes(marca);
                const matchAn = !an || cardAn === an;
                const matchPret = cardPret >= pretMin && cardPret <= pretMax;
                
                if (matchMarca && matchAn && matchPret) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
        
        // Reset la încărcare
        window.addEventListener('load', function() {
            document.querySelectorAll('.car-card').forEach(card => {
                card.style.display = 'block';
            });
        });
    </script>
</body>
</html>