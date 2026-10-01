<?php
// SEO and Page Metadata
$page_title = "Income Tax Calculator FY 2026-27";
$page_description = "Estimate resident individual tax on normal-rate income for India's Tax Year 2026-27. Choose old or new regime; includes rebate and 4% cess.";
$page_keywords = "income tax calculator, calculator, online calculator, free math tools, age calculator, bmi calculator, conversion calculator, wordscompare";

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
                    <h1 class="h2 fw-bold text-gray-800 mb-2">Income Tax Calculator</h1>
                    <p class="lead text-gray-500 mx-auto" style="max-width: 700px">
                        Estimate tax on normal slab-rate income for Tax Year 2026-27 (1 April 2026 to 31 March 2027).
                    </p>
                </div>

                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="p-4 rounded border">
                            <h3 class="h4 fw-bold text-gray-700 mb-4">Your Income Details</h3>
                            <div class="space-y-4">
                                <div>
                                    <label for="annual-income" class="form-label mb-1">Net taxable income (INR)</label>
                                    <div class="input-group">
                                        <span class="input-group-text">₹</span>
                                        <input type="number" id="annual-income" min="0" max="5000000" step="1" value="800000" class="form-control" oninput="updateCalculator()">
                                    </div>
                                    <small class="form-text text-muted">Enter income after deductions and exemptions permitted under the selected regime.</small>
                                </div>

                                <div>
                                    <label for="tax-regime" class="form-label mb-1">Tax regime</label>
                                    <select id="tax-regime" class="form-select" onchange="updateCalculator()">
                                        <option value="new" selected>New regime (default)</option>
                                        <option value="old">Old regime</option>
                                    </select>
                                </div>

                                <div>
                                    <label for="age-group" class="form-label mb-1">Age group (old regime only)</label>
                                    <select id="age-group" class="form-select" onchange="updateCalculator()">
                                        <option value="below60">Below 60 years</option>
                                        <option value="60to80">60 to under 80 years (Senior Citizen)</option>
                                        <option value="above80">80 years or older (Super Senior Citizen)</option>
                                    </select>
                                    <small class="form-text text-muted">Age does not change the new-regime slabs.</small>
                                </div>
                                <p class="small text-muted mb-0">Resident individuals only. Special-rate income and surcharge are not included; estimates above ₹50 lakh are outside this calculator's scope.</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
                        <div class="text-center">
                            <p class="h5 text-gray-600">Net Taxable Income</p>
                            <p id="net-taxable-income-result" class="display-6 fw-bold text-gray-800 mb-3">0</p>
                            <div class="d-flex justify-content-center gap-4">
                                <div class="text-start">
                                    <p class="small text-gray-500">Estimated tax (including cess)</p>
                                    <p id="total-tax-result" class="h4 fw-semibold text-primary">0</p>
                                </div>
                                <div class="text-start">
                                    <p class="small text-gray-500">Average Tax Rate</p>
                                    <p id="average-tax-rate-result" class="h4 fw-semibold text-gray-800">0 %</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="row g-4 py-5">
            <h3 class="text-2xl font-bold text-gray-800 text-center mb-4">Estimated tax breakdown</h3>
            <div class="col-12 px-0"> <div class="table-responsive"> <table class="table table-bordered table-hover mb-0"> <thead class="thead-light"> <tr>
                                <th class="text-left py-3 px-4 text-xs font-medium text-gray-500 uppercase">Income Slab</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Tax Rate</th>
                                <th class="text-right py-3 px-4 text-xs font-medium text-gray-500 uppercase">Tax Amount</th>
                            </tr>
                        </thead>
                        <tbody id="tax-breakdown-table-body" class="bg-white">
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
                <?php include '../../views/content/income-tax-calculator-content.php'; ?>
            
                </article>
        </div>
    </div>
</div>

<script>
// JavaScript for Income Tax Calculator

// Get DOM elements
const annualIncomeInput = document.getElementById('annual-income');
const taxRegimeSelect = document.getElementById('tax-regime');
const ageGroupSelect = document.getElementById('age-group');

const netTaxableIncomeResult = document.getElementById('net-taxable-income-result');
const totalTaxResult = document.getElementById('total-tax-result');
const averageTaxRateResult = document.getElementById('average-tax-rate-result');
const taxBreakdownTableBody = document.getElementById('tax-breakdown-table-body');

// Event Listeners
annualIncomeInput.addEventListener('input', updateCalculator);
taxRegimeSelect.addEventListener('change', updateCalculator);
ageGroupSelect.addEventListener('change', updateCalculator);

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
    return new Intl.NumberFormat('en-IN', {
        style: 'currency',
        currency: 'INR',
        minimumFractionDigits: 0,
        maximumFractionDigits: 0
    }).format(amount);
}

/**
 * Updates the tax calculation and display.
 */
function updateCalculator() {
    const netTaxableIncome = Math.max(0, Number(annualIncomeInput.value) || 0);
    const regime = taxRegimeSelect.value;

    netTaxableIncomeResult.textContent = formatCurrency(netTaxableIncome);
    ageGroupSelect.disabled = regime === 'new';

    calculateTax(netTaxableIncome, ageGroupSelect.value, regime);
}

/**
 * Calculates the income tax based on taxable income and age group.
 * @param {number} taxableIncome The calculated net taxable income.
 * @param {string} ageGroup The selected age group for the old regime.
 * @param {string} regime The selected regime (new or old).
 */
function calculateTax(taxableIncome, ageGroup, regime) {
    if (taxableIncome > 5000000) {
        totalTaxResult.textContent = 'Not estimated';
        averageTaxRateResult.textContent = 'Out of scope';
        taxBreakdownTableBody.innerHTML = '<tr><td colspan="3" class="text-center py-2 px-4">Surcharge is not included above ₹50 lakh.</td></tr>';
        return;
    }

    let slabs;
    if (regime === 'new') {
        slabs = [
            { limit: 400000, rate: 0 },
            { limit: 800000, rate: 0.05 },
            { limit: 1200000, rate: 0.10 },
            { limit: 1600000, rate: 0.15 },
            { limit: 2000000, rate: 0.20 },
            { limit: 2400000, rate: 0.25 },
            { limit: Infinity, rate: 0.30 }
        ];
    } else if (ageGroup === '60to80') {
        slabs = [
            { limit: 300000, rate: 0 },
            { limit: 500000, rate: 0.05 },
            { limit: 1000000, rate: 0.20 },
            { limit: Infinity, rate: 0.30 }
        ];
    } else if (ageGroup === 'above80') {
        slabs = [
            { limit: 500000, rate: 0 },
            { limit: 1000000, rate: 0.20 },
            { limit: Infinity, rate: 0.30 }
        ];
    } else {
        slabs = [
            { limit: 250000, rate: 0 },
            { limit: 500000, rate: 0.05 },
            { limit: 1000000, rate: 0.20 },
            { limit: Infinity, rate: 0.30 }
        ];
    }

    let tax = 0;
    let previousLimit = 0;
    const taxBreakdown = [];
    for (const slab of slabs) {
        const incomeInSlab = Math.max(0, Math.min(taxableIncome, slab.limit) - previousLimit);
        if (incomeInSlab > 0) {
            const taxInSlab = incomeInSlab * slab.rate;
            tax += taxInSlab;
            taxBreakdown.push({
                slab: slab.limit === Infinity
                    ? `Above ${formatCurrency(previousLimit)}`
                    : previousLimit === 0
                        ? `Up to ${formatCurrency(slab.limit)}`
                        : `${formatCurrency(previousLimit + 1)} to ${formatCurrency(slab.limit)}`,
                rate: `${(slab.rate * 100).toFixed(0)}%`,
                amount: taxInSlab
            });
        }
        previousLimit = slab.limit;
        if (taxableIncome <= slab.limit) break;
    }

    let rebate87A = 0;
    if (regime === 'new') {
        const rebateThreshold = 1200000;
        rebate87A = Math.min(tax, 60000);
        if (taxableIncome > rebateThreshold) {
            rebate87A = Math.min(rebate87A, Math.max(0, tax - (taxableIncome - rebateThreshold)));
        }
    } else if (taxableIncome <= 500000) {
        rebate87A = Math.min(tax, 12500);
    }

    const taxAfterRebate = Math.max(0, tax - rebate87A);
    const cess = taxAfterRebate * 0.04;
    const totalTax = taxAfterRebate + cess;

    totalTaxResult.textContent = formatCurrency(totalTax);
    const averageTaxRate = taxableIncome > 0 ? (totalTax / taxableIncome) * 100 : 0;
    averageTaxRateResult.textContent = `${averageTaxRate.toFixed(2)} %`;

    populateTaxBreakdownTable(taxBreakdown, rebate87A, cess, totalTax);
}

/**
 * Populates the tax breakdown table.
 * @param {Array} breakdownData Array of objects with slab, rate, and amount.
 * @param {number} rebate87A The rebate amount under Section 87A.
 * @param {number} cess The health and education cess amount.
 * @param {number} finalTax The final total tax liability.
 */
function populateTaxBreakdownTable(breakdownData, rebate87A, cess, finalTax) {
    taxBreakdownTableBody.innerHTML = ''; // Clear previous data

    let cumulativeTaxBeforeRebate = 0;

    if (breakdownData.length === 0 && finalTax === 0) { // Added finalTax === 0 check
        const row = document.createElement('tr');
        row.innerHTML = `<td colspan="3" class="text-center py-2 px-4">No tax liability for this income.</td>`;
        taxBreakdownTableBody.appendChild(row);
        return;
    }

    breakdownData.forEach(item => {
        const row = document.createElement('tr');
        row.className = 'hover:bg-gray-100';
        row.innerHTML = `
            <td class="py-2 px-4 border-b text-left text-sm text-gray-800">${item.slab}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${item.rate}</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">${formatCurrency(item.amount)}</td>
        `;
        taxBreakdownTableBody.appendChild(row);
        cumulativeTaxBeforeRebate += item.amount;
    });

    // Add rebate row if applicable
    if (rebate87A > 0) {
        const rebateRow = document.createElement('tr');
        rebateRow.className = 'hover:bg-gray-100';
        rebateRow.innerHTML = `
            <td class="py-2 px-4 border-b text-left text-sm text-gray-800 fw-bold">Less: Rebate u/s 87A</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800"></td>
            <td class="py-2 px-4 border-b text-right text-sm text-danger fw-bold">- ${formatCurrency(rebate87A)}</td>
        `;
        taxBreakdownTableBody.appendChild(rebateRow);
    }

    // Add row for tax before cess
    // Ensure taxBeforeCess is not negative
    const taxBeforeCess = Math.max(0, cumulativeTaxBeforeRebate - rebate87A);
    const taxBeforeCessRow = document.createElement('tr');
    taxBeforeCessRow.className = 'hover:bg-gray-100';
    taxBeforeCessRow.innerHTML = `
        <td class="py-2 px-4 border-b text-left text-sm text-gray-800 fw-bold">Tax Before Cess</td>
        <td class="py-2 px-4 border-b text-right text-sm text-gray-800"></td>
        <td class="py-2 px-4 border-b text-right text-sm text-gray-800 fw-bold">${formatCurrency(taxBeforeCess)}</td>
    `;
    taxBreakdownTableBody.appendChild(taxBeforeCessRow);


    // Add cess row only if taxBeforeCess is positive or there's some other reason to show it
    if (taxBeforeCess > 0 || cess > 0) { // Only show cess if there's tax before cess or cess itself is calculated
        const cessRow = document.createElement('tr');
        cessRow.className = 'hover:bg-gray-100';
        cessRow.innerHTML = `
            <td class="py-2 px-4 border-b text-left text-sm text-gray-800 fw-bold">Add: Health and Education Cess (4%)</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800">4%</td>
            <td class="py-2 px-4 border-b text-right text-sm text-gray-800 fw-bold">${formatCurrency(cess)}</td>
        `;
        taxBreakdownTableBody.appendChild(cessRow);
    }

    // Add total tax row
    const totalTaxRow = document.createElement('tr');
    totalTaxRow.className = 'hover:bg-gray-100';
    totalTaxRow.innerHTML = `
        <td class="py-2 px-4 border-b text-left text-sm text-gray-800 fw-bold">Total Tax Liability</td>
        <td class="py-2 px-4 border-b text-right text-sm text-gray-800"></td>
        <td class="py-2 px-4 border-b text-right text-sm text-primary fw-bold">${formatCurrency(finalTax)}</td>
    `;
    taxBreakdownTableBody.appendChild(totalTaxRow);
}
</script>

<?php include '../../includes/footer.php'; ?>