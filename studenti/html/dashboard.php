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
    <link rel="stylesheet" href="/studenti/css/dashboard.css">
    </head>
<body class="bg-light">

<header class="main-header">
    <div class="container header-container">
        <a href="#" class="logo">DriveHub</a>
        <nav class="main-nav">
            <a href="#hero">Acasă</a>
            <a href="#inventory">Inventar</a>
            <a href="#">Despre Noi</a>
            <a href="/html/contact.html">Contact</a>
            <a href="/html/account.html">Account</a>
            <a href="/html/dashboard.html" class="active-link">Dashboard</a>
        </nav>
        <a href="tel:021999999" class="cta-button">021 999 999</a>
    </div>
</header>

<div class="container-fluid p-4 p-md-5">
    <div class="d-flex justify-content-between align-items-center mb-5">
        <h2 class="dashboard-title">Dashboard Analitic</h2>
        <div class="form-check form-switch">
            <input class="form-check-input" type="checkbox" role="switch" id="themeToggle">
            <label class="form-check-label" for="themeToggle">Dark Mode</label>
        </div>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-md-3">
            <div class="d-grid gap-4">
                <div class="metric-card bg-white shadow-sm p-4 rounded-3 border border-primary-subtle">
                    <p class="text-primary fw-bold mb-1 card-label">Total Visits</p>
                    <p class="display-5 fw-bold mb-0">
                        <?php echo '1.500'; ?>
                    </p>
                </div>

                <div class="metric-card bg-white shadow-sm p-4 rounded-3 border border-success-subtle">
                    <p class="text-success fw-bold mb-1 card-label">Vehicles Sold</p>
                    <p class="display-5 fw-bold mb-0">
                        <?php echo '45'; ?>
                    </p>
                </div>

                <div class="metric-card bg-white shadow-sm p-4 rounded-3 border border-success-subtle">
                    <p class="text-success fw-bold mb-1 card-label">Total Sales</p>
                    <p class="display-5 fw-bold mb-0">
                        <?php echo '1.5M EUR'; ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card p-4 shadow-sm h-100 chart-card">
                <h5 class="card-title text-muted mb-3">Hourly Traffic</h5>
                <canvas id="trafficChart" style="max-height: 200px;"></canvas>
            </div>
        </div>
    </div>
    
    <div class="row g-4 mb-5">
        <div class="col-12 col-md-9">
            <div class="card p-4 shadow-sm chart-card">
                <h5 class="card-title text-muted mb-3">Sales by Time Frame</h5>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="fw-bold">Sales Overview</h6>
                    <select id="timeFrameSelect" class="form-select form-select-sm w-auto">
                        <option value="day">Daily</option>
                        <option value="week">Weekly</option>
                        <option value="month">Monthly</option>
                        <option value="year">Yearly</option>
                    </select>
                </div>
                <canvas id="salesChart" height="150"></canvas>
            </div>
        </div>

        <?php // if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'Admin') { ?>
        <div class="col-12 col-md-3">
            <div class="card p-4 shadow-sm h-100 chart-card">
                <h5 class="card-title text-muted mb-3">Sales by Salesperson</h5>
                <canvas id="salesPieChart" height="200"></canvas>
            </div>
        </div>
        <?php // } ?>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-6">
            <div class="card p-4 shadow-sm table-card">
                <h5 class="card-title text-muted mb-3">Top Viewed Vehicles</h5>
                <table class="table table-hover modern-table">
                    <thead>
                        <tr>
                            <th>Vehicle ID</th>
                            <th>Views</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>Audi A4 (ID:101)</td><td>550</td></tr>
                        <tr><td>BMW X5 (ID:102)</td><td>480</td></tr>
                        <tr><td>VW Golf (ID:103)</td><td>410</td></tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card p-4 shadow-sm table-card">
                <h5 class="card-title text-muted mb-3">Top Viewed Brands</h5>
                <table class="table table-hover modern-table">
                    <thead>
                        <tr>
                            <th>Brand</th>
                            <th>Views</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>Audi</td><td>1200</td></tr>
                        <tr><td>BMW</td><td>950</td></tr>
                        <tr><td>Volkswagen</td><td>800</td></tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <?php // if (isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'Admin') { ?>
    <div class="row g-4 mb-4">
        <div class="col-12">
            <div class="card p-4 shadow-sm chart-card">
                <h5 class="card-title text-muted mb-3">Salesperson Performance Overview</h5>
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h6 class="fw-bold">Performance Summary</h6>
                    <select id="periodSelect" class="form-select form-select-sm w-auto">
                        <option value="1month">Last month</option>
                        <option value="3month">Last 3 months</option>
                        <option value="6month">Last 6 months</option>
                        <option value="12month">Last year</option>
                    </select>
                </div>
                <canvas id="performanceChart" height="150"></canvas>
            </div>
        </div>
    </div>
    <?php // } ?>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script> 
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="/studenti/js/dashboard.js"></script>

</body>
</html>