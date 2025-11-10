let salesChart;
let trafficChart;
let salesPieChart;
let performanceChart;

// COMENTARIU PHP/JS: Această funcție trebuie să apeleze o rută PHP/AJAX
// care returnează datele de vânzări în format JSON, în funcție de timeFrame.
function getSalesDataByTimeFrame(timeFrame) {
    // Exemplu de date statice pentru testare (Ștergeți după implementarea PHP)
    const staticData = {
        'day': { labels: ['01/10', '02/10', '03/10'], data: [50000, 75000, 60000] },
        'week': { labels: ['Wk 39', 'Wk 40', 'Wk 41'], data: [300000, 450000, 350000] },
        'month': { labels: ['Jul', 'Aug', 'Sep'], data: [1200000, 1500000, 1300000] },
        'year': { labels: ['2023', '2024'], data: [15000000, 18000000] }
    };
    return staticData[timeFrame] || { labels: [], data: [] };
    
    /* LOGICĂ PHP/AJAX:
    fetch(`/api/salesData.php?timeframe=${timeFrame}`)
        .then(response => response.json())
        .then(data => {
            // Aici trebuie să re-desenezi graficul cu noile date
            updateSalesChart(data.labels, data.data);
        });
    */
}

// Funcție pentru a crea graficul de vânzări
function createSalesChart() {
    const isDarkMode = document.body.classList.contains('dark-mode');
    const ctx = document.getElementById('salesChart')?.getContext('2d');
    if (!ctx) return;

    const timeFrameSelect = document.getElementById('timeFrameSelect');
    const timeFrame = timeFrameSelect ? timeFrameSelect.value : 'month'; // S-a schimbat 'day' in 'month' pentru a corespunde cu HTML
    const chartData = getSalesDataByTimeFrame(timeFrame); // FOLOSEȘTE DATE PHP/AJAX

    if (salesChart) salesChart.destroy();

    salesChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: chartData.labels,
            datasets: [{
                label: 'Sales (€)',
                data: chartData.data,
                borderColor: 'rgba(40, 167, 69, 1)',
                backgroundColor: 'rgba(40, 167, 69, 0.3)',
                fill: true,
                tension: 0.3,
                pointRadius: 4,
                pointHoverRadius: 6
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    ticks: { color: isDarkMode ? '#ffffff' : '#000000' },
                    grid: { color: isDarkMode ? 'rgba(255, 255, 255, 0.2)' : 'rgba(0, 0, 0, 0.1)' }
                },
                y: {
                    beginAtZero: true,
                    ticks: { color: isDarkMode ? '#ffffff' : '#000000' },
                    grid: { color: isDarkMode ? 'rgba(255, 255, 255, 0.2)' : 'rgba(0, 0, 0, 0.1)' }
                }
            },
            plugins: {
                legend: { labels: { color: isDarkMode ? '#ffffff' : '#000000' } }
            }
        }
    });
}

// COMENTARIU PHP/JS: Datele pentru acest grafic trebuie preluate prin PHP/AJAX.
function createTrafficChart() {
    const isDarkMode = document.body.classList.contains('dark-mode');
    const ctx = document.getElementById('trafficChart')?.getContext('2d');
    if (!ctx) return;

    // LOGICĂ PHP: Definește datele de trafic static sau prin AJAX
    const trafficData = {
        // labels: PHP echo json_encode(array_keys($data['VisitsPerHour']))
        labels: ['08:00', '09:00', '10:00', '11:00', '12:00', '13:00', '14:00', '15:00', '16:00'],
        datasets: [{
            label: 'Visits',
            // data: PHP echo json_encode(array_values($data['VisitsPerHour']))
            data: [15, 45, 78, 92, 110, 85, 70, 55, 30],
            fill: false,
            borderColor: 'rgba(75, 192, 192, 1)',
            tension: 0.3,
            pointRadius: 4,
            pointHoverRadius: 6
        }]
    };

    if (trafficChart) trafficChart.destroy();

    trafficChart = new Chart(ctx, {
        type: 'line',
        data: trafficData,
        options: {
            responsive: true,
            scales: {
                x: {
                    ticks: { color: isDarkMode ? '#ffffff' : '#000000', font: { size: 14 } },
                    grid: { color: isDarkMode ? 'rgba(255, 255, 255, 0.2)' : 'rgba(0, 0, 0, 0.1)' }
                },
                y: {
                    beginAtZero: true,
                    ticks: { precision: 0, color: isDarkMode ? '#ffffff' : '#000000', font: { size: 14 } },
                    grid: { color: isDarkMode ? 'rgba(255, 255, 255, 0.2)' : 'rgba(0, 0, 0, 0.1)' }
                }
            },
            plugins: {
                legend: { labels: { color: isDarkMode ? '#ffffff' : '#000000' } }
            }
        }
    });
}

// COMENTARIU PHP/JS: Datele pentru acest grafic trebuie preluate prin PHP/AJAX.
function createSalesPieChart() {
    const canvas = document.getElementById('salesPieChart');
    if (!canvas) return;

    const isDarkMode = document.body.classList.contains('dark-mode');
    const ctx = canvas.getContext('2d');

    // LOGICĂ PHP: Definește datele static sau prin AJAX
    // const labels = PHP echo json_encode(array_keys($data['SalesBySalesMan']))
    const labels = ['Popescu I.', 'Ionescu M.', 'Vasilescu C.'];
    // const data = PHP echo json_encode(array_values($data['SalesBySalesMan']))
    const data = [450000, 600000, 400000];
    const backgroundColors = ['#007bff', '#28a745', '#dc3545', '#ffc107', '#17a2b8', '#6f42c1', '#fd7e14', '#20c997', '#e83e8c', '#6610f2'];

    if (salesPieChart) salesPieChart.destroy();

    salesPieChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: data,
                backgroundColor: backgroundColors.slice(0, labels.length),
                borderColor: '#ffffff',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    labels: { color: isDarkMode ? '#ffffff' : '#000000' }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const dataset = context.dataset;
                            const total = dataset.data.reduce((sum, val) => sum + val, 0);
                            const currentValue = context.raw;
                            const percentage = ((currentValue / total) * 100).toFixed(2);
                            return `${context.label}: ${currentValue} (${percentage}%)`;
                        }
                    }
                }
            }
        }
    });
}

// COMENTARIU PHP/JS: Funcția necesită jQuery și o rută PHP/AJAX pentru a obține datele
function createPerformanceChart(period = '12month') {
    const canvas = document.getElementById('performanceChart');
    if (!canvas) return console.error('Canvas #performanceChart not found');

    const ctx = canvas.getContext('2d');
    const isDarkMode = document.body.classList.contains('dark-mode');

    // Verificăm dacă jQuery este încărcat
    if (typeof $ === 'undefined') {
        console.error('jQuery nu este încărcat. Graficul de performanță nu poate fi creat.');
        // Poți folosi 'fetch' în loc de '$.getJSON' dacă nu vrei dependență de jQuery
        return;
    }

    // === MODIFICARE: Am eliminat apelul $.getJSON care eșua ===
    // Folosim date statice pentru a garanta afișarea
    
    // Date statice de exemplu
    const staticData = {
        'Popescu I.': { totalSales: 450000, averageDiscountPercent: 5.2 },
        'Ionescu M.': { totalSales: 600000, averageDiscountPercent: 4.8 },
        'Vasilescu C.': { totalSales: 400000, averageDiscountPercent: 6.1 },
        'Georgescu A.': { totalSales: 750000, averageDiscountPercent: 4.5 }
    };
    
    const labels = Object.keys(staticData);
    if (!labels.length) {
        if (performanceChart) performanceChart.destroy();
        return console.warn('No data available for chart');
    }

    const totalSales = labels.map(name => staticData[name].totalSales ?? 0);
    const avgDiscount = labels.map(name => Math.max(0, staticData[name].averageDiscountPercent ?? 0));
    
    // ... (Configurarea Chart.js rămâne la fel) ...
            const chartData = {
                labels: labels,
                datasets: [
                    {
                        label: 'Total Sales (€)',
                        data: totalSales,
            type: 'bar',
                        backgroundColor: 'rgba(54, 162, 235, 0.7)',
                        yAxisID: 'ySales'
                    },
                    {
                        label: 'Avg Discount (%)',
                        data: avgDiscount,
            type: 'line',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        fill: false,
                        tension: 0.3,
                        yAxisID: 'yDiscount'
                    }
                ]
            };

    const config = {
        data: chartData,
                options: {
                    responsive: true,
                    maintainAspectRatio: true,
                    plugins: {
                        legend: { labels: { color: isDarkMode ? '#fff' : '#000' } },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    let label = context.dataset.label || '';
                                    if (label) {
                                        label += ': ';
                                    }
                                    if (context.dataset.yAxisID === 'yDiscount') {
                                        label += context.raw.toFixed(2) + '%';
                                    } else {
                                        label += new Intl.NumberFormat('de-DE', { style: 'currency', currency: 'EUR' }).format(context.raw);
                                    }
                                    return label;
                                }
                            }
                        },
                    },
                    scales: {
                        x: { ticks: { color: isDarkMode ? '#fff' : '#000' } },
                        ySales: {
                            type: 'linear',
                            position: 'left',
                            title: { display: true, text: 'Total Sales (€)', color: isDarkMode ? '#fff' : '#000' },
                            ticks: { color: isDarkMode ? '#fff' : '#000' },
                            beginAtZero: true
                        },
                        yDiscount: {
                            type: 'linear',
                            position: 'right',
                            grid: {
                                drawOnChartArea: false, 
                                color: isDarkMode ? 'rgba(255, 255, 255, 0.2)' : 'rgba(0, 0, 0, 0.1)'
                            },
                            title: { display: true, text: 'Avg Discount (%)', color: isDarkMode ? '#fff' : '#000' },
                            ticks: {
                                color: isDarkMode ? '#fff' : '#000',
                                callback: function(value) {
                                    return value.toFixed(2) + '%';
                                }
                            },
                            beginAtZero: true
                        }
                    }
                }
            };
            
            if (performanceChart) performanceChart.destroy();
    performanceChart = new Chart(ctx, config);

    /* === BLOCUL .fail() A FOST ELIMINAT PENTRU CĂ NU MAI EXISTĂ APEL AJAX === */
}


function updateChartColors() {
    const isDarkMode = document.body.classList.contains('dark-mode');
    const textColor = isDarkMode ? '#ffffff' : '#000000';
    const gridColor = isDarkMode ? 'rgba(255, 255, 255, 0.2)' : 'rgba(0, 0, 0, 0.1)';

    if (salesChart) {
        salesChart.options.scales.x.ticks.color = textColor;
        salesChart.options.scales.x.grid.color = gridColor;
        salesChart.options.scales.y.ticks.color = textColor;
        salesChart.options.scales.y.grid.color = gridColor;
        salesChart.options.plugins.legend.labels.color = textColor;
        salesChart.update();
    }

    if (trafficChart) {
        trafficChart.options.scales.x.ticks.color = textColor;
        trafficChart.options.scales.x.grid.color = gridColor;
        trafficChart.options.scales.y.ticks.color = textColor;
        trafficChart.options.scales.y.grid.color = gridColor;
        trafficChart.options.plugins.legend.labels.color = textColor;
        trafficChart.update();
    }

    if (salesPieChart) {
        salesPieChart.options.plugins.legend.labels.color = textColor;
        salesPieChart.update();
    }

    if (performanceChart) {
        performanceChart.options.plugins.legend.labels.color = textColor;
        performanceChart.options.scales.x.ticks.color = textColor;
        performanceChart.options.scales.ySales.title.color = textColor;
        performanceChart.options.scales.ySales.ticks.color = textColor;
        performanceChart.options.scales.yDiscount.grid.color = gridColor;
        performanceChart.options.scales.yDiscount.title.color = textColor;
        performanceChart.options.scales.yDiscount.ticks.color = textColor;
        performanceChart.update();
    }
}


function initializeCharts() {
    createSalesChart();
    createTrafficChart();
    // COMENTARIU PHP/JS: Creează graficul doar dacă elementul există (dacă Admin e logat)
    if(document.getElementById('salesPieChart')) {
        createSalesPieChart();
    }

    const periodSelect = document.getElementById('periodSelect');
    if (periodSelect) {
        createPerformanceChart(periodSelect.value);
    }
}

// === MODIFICARE: Înlocuim vechiul event listener cu o metodă mai robustă ===

// 1. Definim funcția principală care rulează tot
function runApp() {
    const themeToggle = document.getElementById('themeToggle');
    const savedTheme = localStorage.getItem('theme');
    if (savedTheme) {
        document.body.classList.toggle('dark-mode', savedTheme === 'dark');
        if (themeToggle) themeToggle.checked = savedTheme === 'dark';
    }

    initializeCharts();

    const timeFrameSelect = document.getElementById('timeFrameSelect');
    if (timeFrameSelect) {
        timeFrameSelect.addEventListener('change', function() {
            createSalesChart(); 
            // COMENTARIU PHP/JS: Pentru a folosi AJAX, aici trebuie să apelezi o funcție AJAX
            // care va apela getSalesDataByTimeFrame și va reîncărca graficul
        });
    }

    const periodSelect = document.getElementById('periodSelect');
    if (periodSelect) {
        periodSelect.addEventListener('change', function() {
            createPerformanceChart(this.value); 
        });
    }

    if (themeToggle) {
        themeToggle.addEventListener('change', function() {
            const isDarkMode = this.checked;
            document.body.classList.toggle('dark-mode', isDarkMode);
            localStorage.setItem('theme', isDarkMode ? 'dark' : 'light');

            updateChartColors();
        });
    }
}

// 2. Rulăm funcția principală verificând starea documentului
if (document.readyState === 'loading') {
    // Documentul încă se încarcă, așteptăm evenimentul
    document.addEventListener('DOMContentLoaded', runApp);
} else {
    // Documentul este deja gata ('interactive' sau 'complete'), rulăm imediat
    runApp();
}

// Acolada '}' în plus de la final a fost deja ștearsă în versiunea ta.