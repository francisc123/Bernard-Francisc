<?php 
// Nu există cod PHP specific pentru această pagină în afară de include
// dar este necesar să fie un fișier .php pentru a rula include
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DriveHub | Contact</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&family=Montserrat:wght@700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="../css/contact.css">
    
    <link rel="stylesheet" href="../css/common-nav.css">
</head>
<body id="top">
    
    <?php include '../server/header.php'; ?>
    
    <div id="grid-wrapper">

        <main class="main-content">
            <h2>Contactează-ne</h2>
            <div class="contact-card-content">
                
                <div class="contact-form-col">
                    <h3>Trimite-ne un mesaj</h3>
                    <div id="statusMessage"></div>
                    <form id="contactForm">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="name">Nume și Prenume</label>
                                <input type="text" id="name" name="name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Adresa de Email</label>
                                <input type="email" id="email" name="email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="subject">Subiect</label>
                            <input type="text" id="subject" name="subject" required>
                        </div>
                        <div class="form-group">
                            <label for="message">Mesaj</label>
                            <textarea id="message" name="message" required></textarea>
                        </div>
                        <button type="submit" class="submit-button">Trimite Mesajul</button>
                    </form>
                </div>
                
                <div class="contact-map-col">
                    <div class="map-container">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1533.9213075276682!2d26.07928739198305!3d44.43729864239845!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40b201f8d4e42001%3A0xf6f6f6f6f6f6f6f6!2sBucuresti!5e0!3m2!1sro!2sro!4v1625078400000!5m2!1sro!2sro" 
                            allowfullscreen="" 
                            loading="lazy">
                        </iframe>
                    </div>
                </div>

            </div>
        </main>

        <aside class="side-info">
            <h3>Contact Direct</h3>
            <div class="contact-details">
                <p><strong>Telefon Vânzări:</strong><br><a href="tel:021999999">021 999 999</a></p>
                <p><strong>Email Suport:</strong><br><a href="mailto:contact@drivehub.ro">contact@drivehub.ro</a></p>
            </div>
            
            <h3 style="margin-top: 30px;">Adresa Showroom</h3>
            <div class="contact-details">
                <p><strong>Showroom Principal:</strong><br>Bulevardul Exemplului, Nr. 10,<br>Sector 1, București</p>
            </div>
            
            <h3 style="margin-top: 30px;">Orar de Lucru</h3>
            <div class="contact-details">
                <p><strong>Luni - Vineri:</strong><br>9:00 - 18:00</p>
                <p><strong>Sâmbătă:</strong><br>9:00 - 14:00</p>
                <p><strong>Duminică:</strong><br>Închis</p>
            </div>
        </aside>

    </div>

    <footer class="footer">
        <p>© 2025 DriveHub. Toate drepturile rezervate.</p>
    </footer>

    <a href="#top" id="back-to-top">TOP</a>

    <script>
        // Script simplu pentru formular
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const name = document.getElementById('name').value;
            // Simulare trimitere mesaj
            document.getElementById('statusMessage').innerHTML = 
                '✅ Mulțumim, ' + name + '! Mesajul tău a fost trimis cu succes!';
            
            // Reset formular
            this.reset();
            
            // Ascunde mesajul după 5 secunde
            setTimeout(() => {
                document.getElementById('statusMessage').innerHTML = '';
            }, 5000); 
        });
    </script>
</body>
</html>