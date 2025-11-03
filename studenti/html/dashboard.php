<?php 
$trafficData = json_encode([50, 75, 90, 110, 150, 130, 80, 120, 180, 200, 160, 100]);
$salesData = json_encode([15, 25, 40, 35, 50, 60, 45, 55, 70, 65, 80, 75]);
$salespersonData = json_encode([12, 8, 5]);
$performanceData = json_encode([20, 30, 15, 40, 25, 35, 50, 45, 60, 55, 70, 65]);
?>
<!DOCTYPE html>
<html lang="ro">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | DriveHub</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"> 
    <link rel="stylesheet" href="../css/dashboard.css">
</head>
<body id="top" class="bg-light">
    
    <!-- HEADER -->
    <header class="main-header">
        <div class="header-container">
            <a href="../html/index.php" class="logo">DriveHub</a>
            <a href="tel:021999999" class="cta-button">021 999 999</a>
        </div>
    </header>
    
    <!-- NAV -->
    <nav class="main-nav-bar">
        <div class="main-nav">
            <a href="../html/index.php">Acasă</a>
            <a href="../html/account.html">Cont</a>
            <a href="#">Setări</a>
            <a href="#">Rapoarte</a>
            <a href="../html/contact.php">Contact</a>
        </div>
    </nav>

    <!-- MAIN CONTENT cu GRID -->
    <div id="grid-wrapper">
    
        <!-- ASIDE (Sidebar) -->
        <aside class="dashboard-sidebar">
            <h5 class="mb-3"> Navigare Rapidă</h5>
            <ul class="list-unstyled">
                <li class="active"><a href="#"> Acasă</a></li>
                <li><a href="#"> Inventar</a></li>
                <li><a href="#"> Rapoarte</a></li>
                <li><a href="#"> Utilizatori</a></li>
                <li><a href="#"> Setări</a></li>
            </ul>
        </aside>

        <!-- MAIN -->
        <main class="dashboard-content">
            <h1 class="dashboard-title text-center text-md-start mb-4"> Dashboard</h1>

            <!-- CARDURI METRICI cu FLEXBOX (Bootstrap Grid) -->
            <div class="row g-4 mb-4">
                <div class="col-md-6 col-lg-3">
                    <div class="metric-card p-3 shadow-sm text-center">
                        <p class="text-muted mb-1"> Mașini în Stoc</p>
                        <h4 class="fw-bold">1,245</h4>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="metric-card p-3 shadow-sm text-center">
                        <p class="text-muted mb-1"> Vânzări Luna Aceasta</p>
                        <h4 class="fw-bold">45</h4>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="metric-card p-3 shadow-sm text-center">
                        <p class="text-muted mb-1">📞 Lead-uri Noi</p>
                        <h4 class="fw-bold text-success">89</h4>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="metric-card p-3 shadow-sm text-center">
                        <p class="text-muted mb-1"> Venit Estimat</p>
                        <h4 class="fw-bold text-info">€ 1.5M</h4>
                    </div>
                </div>
            </div>

            <!-- GRAFICE cu FLEXBOX (Bootstrap Grid) -->
            <div class="row g-4 mb-4">
                <div class="col-lg-6">
                    <div class="card p-4 shadow-sm chart-card">
                        <h5 class="card-title text-muted mb-3"> Trafic pe Site (Ultima Lună)</h5>
                        <canvas id="trafficChart" height="150"></canvas>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card p-4 shadow-sm chart-card">
                        <h5 class="card-title text-muted mb-3">Vânzări Anuale</h5>
                        <canvas id="salesChart" height="150"></canvas>
                    </div>
                </div>
            </div>

            <!-- PERFORMANȚĂ ȘI TABEL -->
            <div class="row g-4 mb-4">
                <div class="col-lg-8">
                    <div class="card p-4 shadow-sm chart-card">
                        <h5 class="card-title text-muted mb-3"> Salesperson Performance Overview</h5>
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h6 class="fw-bold">Performance Summary</h6>
                            <select id="periodSelect" class="form-select form-select-sm w-auto">
                                <option value="1month">Last month</option>
                                <option value="3month">Last 3 months</option>
                                <option value="6month">Last 6 months</option>
                                <option value="12month">Last year</option>
                            </select>
                        </div>
                        <canvas id="performanceChart" height="100"></canvas>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card p-4 shadow-sm table-card">
                        <h5 class="card-title text-muted mb-3"> Top Mărci în Stoc</h5>
                        <table class="table modern-table">
                            <thead>
                                <tr>
                                    <th>Marcă</th>
                                    <th>Unități</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr><td>Mercedes</td><td><strong>1200</strong></td></tr>
                                <tr><td> BMW</td><td><strong>950</strong></td></tr>
                                <tr><td> Volkswagen</td><td><strong>800</strong></td></tr>
                                <tr><td> Audi</td><td><strong>650</strong></td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </main>
    
    </div>

    <!-- FOOTER -->
    <footer class="main-footer">
        <div class="container text-center py-3">
            <p>&copy; 2025 DriveHub. Dashboard Administrativ.</p>
        </div>
    </footer>

    <!-- BUTON MERGI SUS -->
    <a href="#top" id="back-to-top">TOP</a>

    <!-- SCRIPTS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Date PHP în JavaScript
        const trafficData = <?php echo $trafficData; ?>;
        const salesData = <?php echo $salesData; ?>;
        const performanceData = <?php echo $performanceData; ?>;
        
        // GRAFIC TRAFIC
        const trafficCtx = document.getElementById('trafficChart').getContext('2d');
        new Chart(trafficCtx, {
            type: 'line',
            data: {
                labels: ['Ian', 'Feb', 'Mar', 'Apr', 'Mai', 'Iun', 'Iul', 'Aug', 'Sep', 'Oct', 'Noi', 'Dec'],
                datasets: [{
                    label: 'Vizitatori',
                    data: trafficData,
                    borderColor: '#1e3a8a',
                    backgroundColor: 'rgba(30, 58, 138, 0.1)',
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true
            }
        });
        
        // GRAFIC VÂNZĂRI
        const salesCtx = document.getElementById('salesChart').getContext('2d');
        new Chart(salesCtx, {
            type: 'bar',
            data: {
                labels: ['Ian', 'Feb', 'Mar', 'Apr', 'Mai', 'Iun', 'Iul', 'Aug', 'Sep', 'Oct', 'Noi', 'Dec'],
                datasets: [{
                    label: 'Vânzări',
                    data: salesData,
                    backgroundColor: '#ff8c00',
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true
            }
        });
        
        // GRAFIC PERFORMANȚĂ
        const performanceCtx = document.getElementById('performanceChart').getContext('2d');
        new Chart(performanceCtx, {
            type: 'line',
            data: {
                labels: ['Ian', 'Feb', 'Mar', 'Apr', 'Mai', 'Iun', 'Iul', 'Aug', 'Sep', 'Oct', 'Noi', 'Dec'],
                datasets: [{
                    label: 'Performanță',
                    data: performanceData,
                    borderColor: '#28a745',
                    backgroundColor: 'rgba(40, 167, 69, 0.1)',
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true
            }
        });
    </script>
</body>
</html>