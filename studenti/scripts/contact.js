document.addEventListener('DOMContentLoaded', function() {
            const themeToggle = document.getElementById('themeToggle');
            const savedTheme = localStorage.getItem('theme');

            if (savedTheme) {
                document.body.classList.toggle('dark-mode', savedTheme === 'dark');
                if (themeToggle) themeToggle.checked = savedTheme === 'dark';
            }

            if (themeToggle) {
                themeToggle.addEventListener('change', function() {
                    const isDarkMode = this.checked;
                    document.body.classList.toggle('dark-mode', isDarkMode);
                    localStorage.setItem('theme', isDarkMode ? 'dark' : 'light');
                });
            }

            const submitBtn = document.getElementById('submitBtn');
            const contactForm = document.getElementById('contactForm');
            const statusMessageDiv = document.getElementById('statusMessage');

            if (submitBtn) {
                submitBtn.addEventListener('click', async function(e) {
                    e.preventDefault();

                    const name = document.getElementById('name').value;
                    const email = document.getElementById('email').value;
                    const message = document.getElementById('message').value;

                    if (!name || !email || !message) {
                        statusMessageDiv.textContent = 'Please fill out all fields.';
                        statusMessageDiv.style.color = 'red';
                        return;
                    }

                    console.log('Nume:', name);
                    console.log('Email:', email);
                    console.log('Message:', message);

                    try {
                        const formData = new FormData();
                        formData.append('Name', name);
                        formData.append('Email', email);
                        formData.append('Message', message);

                        const response = await fetch('/Admin/MessagesFromUsers', {
                            method: 'POST',
                            body: formData
                        });

                        if (response.ok) {
                            statusMessageDiv.textContent = 'Your message has been sent successfully!';
                            statusMessageDiv.style.color = 'green';
                            contactForm.reset();
                        } else {
                            statusMessageDiv.textContent = 'Failed to send message. Please try again.';
                            statusMessageDiv.style.color = 'red';
                        }
                    } catch (error) {
                        console.error('Error:', error);
                        statusMessageDiv.textContent = 'An error occurred. Please try again later.';
                        statusMessageDiv.style.color = 'red';
                    }
                });
            }
        });

        async function initMap() {
            const location = { lat: 44.4268, lng: 26.1025 };

            const { Map } = await google.maps.importLibrary("maps");
            const { AdvancedMarkerElement } = await google.maps.importLibrary("marker");

            const map = new Map(document.getElementById("map"), {
                zoom: 13,
                center: location,
                mapId: "YOUR_MAP_ID", 
            });

            new AdvancedMarkerElement({
                map: map,
                position: location,
                title: "AutoDealer Location",
            });
        }