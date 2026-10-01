<?php
// SEO and Page Metadata
$page_title = "PPF Calculator - Public Provident Fund Calculator Online"; // You may Change the Title here
$page_description = "Free PPF calculator online. Calculate Public Provident Fund maturity amount, yearly interest, and 15-year returns. Tax-free investment under Section 80C."; // Put your Description here
$page_keywords = "ppf calculator, calculator, online calculator, free math tools, age calculator, bmi calculator, conversion calculator, wordscompare";

// Include common header
include '../../includes/header.php';
?>

<!-- TOOL -->
<div class="container">
    <div class="row justify-content-center">
        
        <div class="d-lg-none mb-3">
            <button class="btn btn-outline-danger w-100 d-flex justify-content-between align-items-center collapsed" 
                    type="button" 
                    data-bs-toggle="collapse" 
                    data-bs-target="#toolsSidebar" 
                    aria-expanded="false">
                <span>Browse Tools</span>
                <i class="fas fa-chevron-down"></i>
            </button>
        </div>

        <div class="col-lg-2">
            <div class="collapse d-lg-block h-100" id="toolsSidebar">
                <div class="card h-100">
                    <div class="card-body p-2">
                        <input type="text" id="searchTools" class="form-control border-danger mb-3" placeholder="Search tools...">
                        
                        <div class="list-group list-group-flush overflow-auto" style="max-height: calc(200vh - 150px);">
                            <div id="toolsList"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
<div class="col-lg-8 border shadow-sm">
    <main class="pt-5">
        <div class="row justify-content-center px-2">
            <div class="col-12 p-3 p-md-4 rounded shadow">
                <div class="text-center mb-4 mb-md-5">
                    <h1 class="h2 fw-bold text-gray-800 mb-2">PPF Calculator</h1>
                    <p class="lead text-gray-500 mx-auto" style="max-width: 700px">
                        Estimate the maturity amount of your Public Provident Fund (PPF) investments.
                    </p>
                </div>
                
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="p-4 rounded border">
                            <h3 class="h4 fw-bold text-gray-700 mb-4">Investment Details</h3>
                            <div class="space-y-4">
                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="annual-investment" class="form-label mb-1">Annual Investment</label>
                                        <div class="d-flex align-items-center">
                                            <select id="currency-select" class="form-select form-select-sm me-2">
                                                <option value="USD" selected>$ (USD)</option>
                                                <option value="EUR">EUR (€)</option>
                                                <option value="INR">INR (₹)</option>
                                                <option value="GBP">GBP (£)</option>
                                                <option value="JPY">JPY (¥)</option>
                                                <option value="AUD">AUD ($)</option>
                                                <option value="CAD">CAD ($)</option>
                                                <option value="CHF">CHF (Fr.)</option>
                                                <option value="CNY">CNY (¥)</option>
                                                <option value="SEK">SEK (kr)</option>
                                                <option value="NZD">NZD ($)</option>
                                                <option value="MXN">MXN ($)</option>
                                                <option value="SGD">SGD ($)</option>
                                                <option value="HKD">HKD ($)</option>
                                                <option value="NOK">NOK (kr)</option>
                                                <option value="KRW">KRW (₩)</option>
                                                <option value="TRY">TRY (₺)</option>
                                                <option value="RUB">RUB (₽)</option>
                                                <option value="BRL">BRL (R$)</option>
                                                <option value="ZAR">ZAR (R)</option>
                                            </select>
                                            <span class="h5 fw-semibold text-primary"><span id="annual-investment-text">1,00,000</span></span>
                                        </div>
                                    </div>
                                    <input type="range" id="annual-investment" min="500" max="150000" step="500" value="100000" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="interest-rate" class="form-label mb-1">Current Interest Rate</label>
                                        <span class="h5 fw-semibold text-primary"><span id="interest-rate-text">7.1</span> %</span>
                                    </div>
                                    <input type="range" id="interest-rate" min="5" max="9" step="0.1" value="7.1" class="form-range mt-2">
                                </div>

                                <div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <label for="tenure" class="form-label mb-1">Investment Tenure (Years)</label>
                                        <span class="h5 fw-semibold text-primary"><span id="tenure-text">15</span> Years</span>
                                    </div>
                                    <input type="range" id="tenure" min="15" max="50" step="1" value="15" class="form-range mt-2">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="w-75 mb-4" style="max-width: 256px; height: 256px;">
                            <canvas id="ppf-chart"></canvas>
                        </div>
                        <div class="text-center">
                            <p class="h5 text-gray-600">Maturity Amount</p>
                            <p id="maturity-amount-result" class="display-6 fw-bold text-gray-800 mb-3">0</p>
                            <div class="d-flex justify-content-center gap-4">
                                <div class="text-start">
                                    <p class="small text-gray-500">Total Investment</p>
                                    <p id="total-investment-result" class="h4 fw-semibold text-primary">0</p>
                                </div>
                                <div class="text-start">
                                    <p class="small text-gray-500">Total Interest Earned</p>
                                    <p id="total-interest-earned-result" class="h4 fw-semibold text-gray-800">0</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                    
        <div class="row g-4 py-5">
            <h3 class="text-2xl font-bold text-gray-800 text-center mb-4">Year-wise Growth</h3>
            <div class="col-12 px-0"> <div class="table-responsive"> <table class="table table-bordered table-hover mb-0"> <thead class="thead-light"> <tr>
                                <th class="text-left py-3 px-4 text-xs font-medium text-gray-500 uppercase">Year</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Opening Balance</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Deposited Amount</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Interest Earned</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Closing Balance</th>
                            </tr>
                        </thead>
                        <tbody id="ppf-table-body" class="bg-white">
                            </tbody>
                    </table>
                </div>
            </div>
        </div>

            </main>
        </div>

    </div>
</div>

<?php include '../../includes/sharer.php'; ?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 border shadow-sm">
            <article>
                <header class="mb-5 text-center">
                    <h2 class="display-5"><?php echo $page_title; ?></h2>
                    <p class="lead"><?php echo $page_description; ?></p>
                </header>
                <?php include '../../views/content/ppf-calculator-content.php'; ?>
            
                </article>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// JavaScript for PPF Calculator
let ppfChart; // Variable to hold the Chart.js instance

// Get DOM elements
const annualInvestmentSlider = document.getElementById('annual-investment');
const annualInvestmentText = document.getElementById('annual-investment-text');
const interestRateSlider = document.getElementById('interest-rate');
const interestRateText = document.getElementById('interest-rate-text');
const tenureSlider = document.getElementById('tenure');
const tenureText = document.getElementById('tenure-text');

const maturityAmountResult = document.getElementById('maturity-amount-result');
const totalInvestmentResult = document.getElementById('total-investment-result');
const totalInterestEarnedResult = document.getElementById('total-interest-earned-result');
const ppfTableBody = document.getElementById('ppf-table-body');
const ppfChartCanvas = document.getElementById('ppf-chart');
const currencySelect = document.getElementById('currency-select'); // Get the currency select element


// Event Listeners for sliders and currency select
annualInvestmentSlider.addEventListener('input', updateCalculator);
interestRateSlider.addEventListener('input', updateCalculator);
tenureSlider.addEventListener('input', updateCalculator);
currencySelect.addEventListener('change', updateCalculator); // Add event listener for currency select

// Initial calculation on page load
window.onload = function() {
    updateCalculator();
};

/**
 * Formats a number as currency based on the selected currency.
 * @param {number} amount The number to format.
 * @returns {string} The formatted currency string.
 */
function formatCurrency(amount) {
    const selectedCurrency = currencySelect.value; // Get selected currency
    return new Intl.NumberFormat('en-IN', { // 'en-IN' locale is good for number formatting, currency symbol changes with 'currency' option
        style: 'currency',
        currency: selectedCurrency,
        minimumFractionDigits: 0, // No decimal places for whole rupees
        maximumFractionDigits: 0
    }).format(amount);
}

/**
 * Updates the displayed values for sliders and triggers PPF calculation.
 */
function updateCalculator() {
    // Update slider text displays
    // The formatCurrency function will now handle the currency symbol
    annualInvestmentText.textContent = new Intl.NumberFormat('en-IN').format(annualInvestmentSlider.value); //
    interestRateText.textContent = interestRateSlider.value;
    tenureText.textContent = tenureSlider.value;

    calculatePPF();
}

/**
 * Calculates the PPF maturity amount and updates the UI.
 */
function calculatePPF() {
    const annualInvestment = parseFloat(annualInvestmentSlider.value);
    const annualInterestRate = parseFloat(interestRateSlider.value) / 100; // Convert to decimal
    const tenureYears = parseInt(tenureSlider.value);

    let totalInvestment = 0;
    let totalInterestEarned = 0;
    let maturityAmount = 0;
    let openingBalance = 0;

    ppfTableBody.innerHTML = ''; // Clear previous schedule

    for (let year = 1; year <= tenureYears; year++) {
        const depositedAmount = annualInvestment;
        totalInvestment += depositedAmount;

        // Interest calculation: Interest is calculated on the minimum balance between 5th and last day of month.
        // For annual deposits, assuming deposit is made by April 5th, interest is on (Opening Balance + Annual Investment)
        const principalForInterest = openingBalance + depositedAmount;
        const interestEarned = principalForInterest * annualInterestRate;
        
        const closingBalance = openingBalance + depositedAmount + interestEarned;

        totalInterestEarned += interestEarned;
        maturityAmount = closingBalance; // The final closing balance is the maturity amount

        const row = document.createElement('tr');
        row.className = 'hover:bg-gray-100';
        row.innerHTML = `
            <td class="py-2 px-4 border-b text-left text-sm text-gray-800">${year}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(openingBalance)}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(depositedAmount)}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(interestEarned)}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(closingBalance)}</td>
        `;
        ppfTableBody.appendChild(row);

        openingBalance = closingBalance; // Set opening balance for next year
    }

    // Update results in UI
    maturityAmountResult.textContent = formatCurrency(maturityAmount);
    totalInvestmentResult.textContent = formatCurrency(totalInvestment);
    totalInterestEarnedResult.textContent = formatCurrency(totalInterestEarned);

    // Update chart
    updateChart(totalInvestment, totalInterestEarned);
}

/**
 * Updates the Chart.js pie chart with investment and interest data.
 * @param {number} totalInvestment The total principal invested.
 * @param {number} totalInterestEarned The total interest earned.
 */
function updateChart(totalInvestment, totalInterestEarned) {
    const ctx = ppfChartCanvas.getContext('2d');

    if (ppfChart) {
        ppfChart.destroy(); // Destroy existing chart before creating a new one
    }

    ppfChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Total Investment', 'Total Interest Earned'],
            datasets: [{
                data: [totalInvestment, totalInterestEarned],
                backgroundColor: ['#4F46E5', '#f59e0b'], // Indigo 600 and Orange 500
                borderWidth: 0,
                hoverOffset: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            cutout: '60%', // Creates the doughnut hole
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: {
                        font: {
                            size: 14
                        }
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const label = context.label || '';
                            const value = context.parsed || 0;
                            return `${label}: ${formatCurrency(value)}`; // Use formatCurrency for tooltip
                        }
                    }
                }
            }
        },
        plugins: [{
            id: 'centerCircle',
            beforeDraw: function(chart) {
                const width = chart.width;
                const height = chart.height;
                const ctx = chart.ctx;
                
                ctx.restore();
                const fontSize = (height / 8).toFixed(2);
                ctx.font = fontSize + "px sans-serif";
                ctx.textBaseline = "middle";
                
                // Draw white circle
                const centerX = width / 2;
                const centerY = height / 2;
                const radius = height * 0; // Adjust size of the white circle
                
                ctx.beginPath();
                ctx.arc(centerX, centerY, radius, 0, 2 * Math.PI);
                ctx.fillStyle = 'white';
                ctx.fill();
                ctx.strokeStyle = 'white';
                ctx.stroke();
                
                ctx.save();
            }
        }]
    });
}
</script>

<?php include '../../includes/footer.php'; ?>