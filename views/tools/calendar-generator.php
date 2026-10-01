<?php
// SEO and Page Metadata
$page_title = "Calendar Generator - Create Printable Calendars Online Free"; // You may Change the Title here
$page_description = "Free online calendar generator. Create and download printable monthly or yearly calendars in PDF format. Customize with events and holidays instantly."; // Put your Description here
$page_keywords = "calendar generator, pdf converter, convert pdf, free online pdf tools, pdf to word, pdf to excel, wordscompare";

// Include common header
include '../../includes/header.php';
?>

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
            <div class="tool-container rounded-3 p-4 p-md-5">
                <header class="text-center mb-4">
                    <h1 class="h2">Calendar Generator <i class="fas fa-calendar-alt text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Fully Customizable | 🖨️ Ready to Print | 🗓️ Monthly & Yearly Templates</p>
                </header>

                <div class="row mb-4 text-center">
                    <div class="col-md-3">
                        <div class="card bg-light p-2">
                            <h6 class="mb-0">Calendars Generated</h6>
                            <p class="display-6 mb-0" id="calendarsGenerated">0</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-light p-2">
                            <h6 class="mb-0">Countries Supported</h6>
                            <p class="display-6 mb-0">5</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-light p-2">
                            <h6 class="mb-0">Total Holidays</h6>
                            <p class="display-6 mb-0" id="totalHolidays">0</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-light p-2">
                            <h6 class="mb-0">Last Generated</h6>
                            <p class="display-6 mb-0" id="lastGenerated">-</p>
                        </div>
                    </div>
                </div>

                <div class="options-card card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-cogs me-2"></i>Create Your Holiday Calendar</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="year" class="form-label">Year*</label>
                                <input type="number" id="year" class="form-control" value="2025" min="1900" max="2100">
                            </div>
                            <div class="col-md-6">
                                <label for="country" class="form-label">Country*</label>
                                <select id="country" class="form-select">
                                    <option value="worldwide">Worldwide</option>
                                    <option value="us">United States</option>
                                    <option value="ca">Canada</option>
                                    <option value="gb">United Kingdom</option>
                                    <option value="in">India</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="calendarFormat" class="form-label">Calendar Format*</label>
                                <select id="calendarFormat" class="form-select">
                                    <option value="year-at-a-glance">Year-at-a-Glance</option>
                                    <option value="monthly">Monthly</option>
                                    <option value="grid-view">Grid View (All Months)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="colorTheme" class="form-label">Color Theme*</label>
                                <select id="colorTheme" class="form-select">
                                    <option value="corporate">Corporate</option>
                                    <option value="modern">Modern</option>
                                    <option value="classic">Classic</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="showHolidayNames" checked>
                                    <label class="form-check-label" for="showHolidayNames">
                                        Show holiday names
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="compactView">
                                    <label class="form-check-label" for="compactView">
                                        Compact view
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="options-card card mb-4">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-plus-circle me-2"></i>Add Custom Holidays</h5>
                        <button class="btn btn-sm btn-outline-success" id="addCustomHolidayBtn">
                            <i class="fas fa-plus me-2"></i>Add Another Holiday
                        </button>
                    </div>
                    <div class="card-body" id="customHolidaysContainer">
                        <div class="row g-3 custom-holiday-item mb-3">
                            <div class="col-md-5">
                                <label for="holidayName1" class="form-label">Holiday Name</label>
                                <input type="text" id="holidayName1" class="form-control" placeholder="Holiday Name">
                            </div>
                            <div class="col-md-4">
                                <label for="holidayDate1" class="form-label">Date</label>
                                <input type="text" id="holidayDate1" class="form-control" placeholder="dd-mm-yyyy">
                            </div>
                            <div class="col-md-2">
                                <label for="holidayType1" class="form-label">Type</label>
                                <select id="holidayType1" class="form-select">
                                    <option value="public">Public Holiday</option>
                                    <option value="observance">Observance</option>
                                </select>
                            </div>
                            <div class="col-md-1 d-flex align-items-end">
                                <button class="btn btn-outline-danger remove-holiday-btn w-100" type="button">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="options-card card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-building me-2"></i>Company Details (Optional)</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="companyName" class="form-label">Company Name</label>
                                <input type="text" id="companyName" class="form-control" placeholder="Your company name">
                            </div>
                            <div class="col-md-6">
                                <label for="logoUrl" class="form-label">Logo URL</label>
                                <input type="url" id="logoUrl" class="form-control" placeholder="https://example.com/logo.png">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="options-card card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-file-export me-2"></i>Output Settings</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label for="outputFormat" class="form-label">Output Format*</label>
                                <select id="outputFormat" class="form-select">
                                    <option value="pdf">PDF Document</option>
                                    <option value="image">Image (PNG)</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="paperSize" class="form-label">Paper Size</label>
                                <select id="paperSize" class="form-select">
                                    <option value="letter">Letter</option>
                                    <option value="a4">A4</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="orientation" class="form-label">Orientation</label>
                                <select id="orientation" class="form-select">
                                    <option value="portrait">Portrait</option>
                                    <option value="landscape">Landscape</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex justify-content-md-center mb-4">
                    <button class="btn btn-danger btn-md px-4" id="generateCalendarBtn">
                        <i class="fas fa-calendar-plus me-2"></i> Generate Calendar
                    </button>
                    <button class="btn btn-primary btn-md px-4" id="howToBtn">
                        <i class="fas fa-question-circle me-2"></i> How To
                    </button>
                    <button class="btn btn-secondary btn-md px-2" id="resetBtn">
                        <i class="fas fa-redo me-2"></i> Reset
                    </button>
                </div>
                
                <div class="d-grid gap-3 d-md-flex justify-content-md-center mb-4" id="downloadButtons" style="display: none;">
                    <button class="btn btn-success btn-md px-4" id="downloadPdfBtn">
                        <i class="fas fa-file-pdf me-2"></i> Download PDF
                    </button>
                    <button class="btn btn-info btn-md px-4" id="downloadImageBtn">
                        <i class="fas fa-image me-2"></i> Download Image
                    </button>
                </div>

                <div id="statusArea" class="text-center"></div>

                <div class="preview-area card mt-4" id="calendarOutputContainer" style="display: none;">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-calendar-check me-2"></i>Generated Calendar Preview</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="m-0 p-3 bg-light text-center" id="calendarOutput" style="min-height: 200px; max-height: 600px; overflow: auto;">
                            <p class="text-muted">Your generated calendar will appear here.</p>
                        </div>
                    </div>
                </div>

                <div class="holiday-list-card card mt-4" id="holidayListContainer" style="display: none;">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-list me-2"></i>Holiday List</h5>
                    </div>
                    <div class="card-body">
                        <ul id="holidayList" class="list-group list-group-flush">
                            </ul>
                    </div>
                </div>
            </div>
        </div>


    <!-- Sticky sidebar -->
    <div class="col-lg-2 border shadow-sm sticky-top vh-100 p-3">
        
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
                <?php include '../../views/content/calendar-generator-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
// JavaScript for Calendar Generator
let calendarsGeneratedCount = 0;
let totalHolidaysCount = 0;
let lastGeneratedDate = '-';
let customHolidayCounter = 1;

// Initialize elements
const calendarsGeneratedDisplay = document.getElementById('calendarsGenerated');
const totalHolidaysDisplay = document.getElementById('totalHolidays');
const lastGeneratedDisplay = document.getElementById('lastGenerated');
const yearInput = document.getElementById('year');
const countrySelect = document.getElementById('country');
const calendarFormatSelect = document.getElementById('calendarFormat');
const colorThemeSelect = document.getElementById('colorTheme');
const showHolidayNamesCheckbox = document.getElementById('showHolidayNames');
const compactViewCheckbox = document.getElementById('compactView');
const addCustomHolidayBtn = document.getElementById('addCustomHolidayBtn');
const customHolidaysContainer = document.getElementById('customHolidaysContainer');
const companyNameInput = document.getElementById('companyName');
const logoUrlInput = document.getElementById('logoUrl');
const outputFormatSelect = document.getElementById('outputFormat');
const paperSizeSelect = document.getElementById('paperSize');
const orientationSelect = document.getElementById('orientation');
const generateCalendarBtn = document.getElementById('generateCalendarBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const statusArea = document.getElementById('statusArea');
const calendarOutputContainer = document.getElementById('calendarOutputContainer');
const calendarOutput = document.getElementById('calendarOutput');
const downloadButtons = document.getElementById('downloadButtons');
const downloadPdfBtn = document.getElementById('downloadPdfBtn');
const downloadImageBtn = document.getElementById('downloadImageBtn');
const holidayListContainer = document.getElementById('holidayListContainer'); // New
const holidayList = document.getElementById('holidayList'); // New


// Event Listeners
addCustomHolidayBtn.addEventListener('click', addCustomHolidayField);
generateCalendarBtn.addEventListener('click', generateCalendar);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);
downloadPdfBtn.addEventListener('click', () => downloadPdf(calendarOutput, paperSizeSelect.value, orientationSelect.value, companyNameInput.value));
downloadImageBtn.addEventListener('click', () => downloadImage(calendarOutput, companyNameInput.value));


// Initial display updates
updateStatsDisplay();
document.addEventListener('DOMContentLoaded', () => {
    // Set current year as default
    yearInput.value = new Date().getFullYear();
});

function updateStatsDisplay() {
    calendarsGeneratedDisplay.textContent = calendarsGeneratedCount;
    totalHolidaysDisplay.textContent = totalHolidaysCount;
    lastGeneratedDisplay.textContent = lastGeneratedDate;
}

function addCustomHolidayField() {
    customHolidayCounter++;
    const newHolidayField = document.createElement('div');
    newHolidayField.className = 'row g-3 custom-holiday-item mb-3';
    newHolidayField.innerHTML = `
        <div class="col-md-5">
            <label for="holidayName${customHolidayCounter}" class="form-label">Holiday Name</label>
            <input type="text" id="holidayName${customHolidayCounter}" class="form-control" placeholder="Holiday Name">
        </div>
        <div class="col-md-4">
            <label for="holidayDate${customHolidayCounter}" class="form-label">Date</label>
            <input type="text" id="holidayDate${customHolidayCounter}" class="form-control" placeholder="dd-mm-yyyy">
        </div>
        <div class="col-md-2">
            <label for="holidayType${customHolidayCounter}" class="form-label">Type</label>
            <select id="holidayType${customHolidayCounter}" class="form-select">
                <option value="public">Public Holiday</option>
                <option value="observance">Observance</option>
            </select>
        </div>
        <div class="col-md-1 d-flex align-items-end">
            <button class="btn btn-outline-danger remove-holiday-btn w-100" type="button">
                <i class="fas fa-times"></i>
            </button>
        </div>
    `;
    customHolidaysContainer.appendChild(newHolidayField);

    // Add event listener for the new remove button
    newHolidayField.querySelector('.remove-holiday-btn').addEventListener('click', (e) => {
        e.currentTarget.closest('.custom-holiday-item').remove();
        updateTotalHolidaysCount();
    });
    updateTotalHolidaysCount();
}

function updateTotalHolidaysCount() {
    totalHolidaysCount = document.querySelectorAll('.custom-holiday-item').length;
    totalHolidaysDisplay.textContent = totalHolidaysCount;
}

function showHowTo() {
    Swal.fire({
        title: 'Welcome to Calendar Generator',
        html: `Follow these steps to create your custom calendar:<br><br>
        <ol class="text-start">
            <li>Select the year and country for which you want to generate the calendar.</li>
            <li>Choose your preferred calendar format (Year-at-a-Glance, Monthly, or Grid View) and color theme.</li>
            <li>Optionally, add custom holidays with their names, dates (dd-mm-yyyy), and types.</li>
            <li>Enter your company name and logo URL if you wish to brand the calendar.</li>
            <li>Select the desired output format (PDF or Image), paper size, and orientation.</li>
            <li>Click "Generate Calendar" to create and preview your calendar.</li>
            <li>After generation, use the "Download PDF" or "Download Image" buttons to save your calendar.</li>
        </ol>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

function resetAll() {
    yearInput.value = new Date().getFullYear();
    countrySelect.value = 'worldwide';
    calendarFormatSelect.value = 'year-at-a-glance';
    colorThemeSelect.value = 'corporate';
    showHolidayNamesCheckbox.checked = true;
    compactViewCheckbox.checked = false;
    companyNameInput.value = '';
    logoUrlInput.value = '';
    outputFormatSelect.value = 'pdf';
    paperSizeSelect.value = 'letter';
    orientationSelect.value = 'portrait';

    // Clear custom holidays, keeping one blank field
    customHolidaysContainer.innerHTML = `
        <div class="row g-3 custom-holiday-item mb-3">
            <div class="col-md-5">
                <label for="holidayName1" class="form-label">Holiday Name</label>
                <input type="text" id="holidayName1" class="form-control" placeholder="Holiday Name">
            </div>
            <div class="col-md-4">
                <label for="holidayDate1" class="form-label">Date</label>
                <input type="text" id="holidayDate1" class="form-control" placeholder="dd-mm-yyyy">
            </div>
            <div class="col-md-2">
                <label for="holidayType1" class="form-label">Type</label>
                <select id="holidayType1" class="form-select">
                    <option value="public">Public Holiday</option>
                    <option value="observance">Observance</option>
                </select>
            </div>
            <div class="col-md-1 d-flex align-items-end">
                <button class="btn btn-outline-danger remove-holiday-btn w-100" type="button">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
    `;
    customHolidayCounter = 1;
    // Add event listener for the initial remove button
    customHolidaysContainer.querySelector('.remove-holiday-btn').addEventListener('click', (e) => {
        e.currentTarget.closest('.custom-holiday-item').remove();
        updateTotalHolidaysCount();
    });

    calendarOutput.innerHTML = '<p class="text-muted">Your generated calendar will appear here.</p>';
    calendarOutputContainer.style.display = 'none';
    downloadButtons.style.display = 'none'; // Hide download buttons on reset
    statusArea.textContent = '';
    
    holidayList.innerHTML = ''; // Clear holiday list
    holidayListContainer.style.display = 'none'; // Hide holiday list container

    calendarsGeneratedCount = 0;
    lastGeneratedDate = '-';
    updateTotalHolidaysCount(); // Recalculate after reset
    updateStatsDisplay();
}

async function generateCalendar() {
    const year = yearInput.value;
    const country = countrySelect.value;
    const calendarFormat = calendarFormatSelect.value;
    const colorTheme = colorThemeSelect.value;
    const showHolidayNames = showHolidayNamesCheckbox.checked;
    const compactView = compactViewCheckbox.checked;
    const companyName = companyNameInput.value;
    const logoUrl = logoUrlInput.value;
    const outputFormat = outputFormatSelect.value; // Not directly used here, but for download buttons

    // Basic validation
    if (!year || isNaN(year) || year < 1900 || year > 2100) {
        showError('Please enter a valid year between 1900 and 2100.');
        Swal.fire({
            title: 'Error',
            text: 'Please enter a valid year between 1900 and 2100.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Generating calendar...', 'info');
    calendarOutput.innerHTML = '<div class="text-center"><div class="spinner-border text-danger" role="status"><span class="visually-hidden">Loading...</span></div><p class="mt-2">Generating calendar...</p></div>';
    calendarOutputContainer.style.display = 'block';
    downloadButtons.style.display = 'none'; // Hide download buttons during generation
    holidayList.innerHTML = ''; // Clear previous holiday list
    holidayListContainer.style.display = 'none'; // Hide holiday list during generation

    // Gather custom holidays
    const customHolidays = [];
    document.querySelectorAll('.custom-holiday-item').forEach(item => {
        const nameInput = item.querySelector('[id^="holidayName"]');
        const dateInput = item.querySelector('[id^="holidayDate"]');
        const typeSelect = item.querySelector('[id^="holidayType"]');

        const name = nameInput ? nameInput.value.trim() : '';
        const date = dateInput ? dateInput.value.trim() : '';
        const type = typeSelect ? typeSelect.value : 'public';

        if (name && date) {
            // Basic date format validation (dd-mm-yyyy)
            const dateRegex = /^\d{2}-\d{2}-\d{4}$/;
            if (!dateRegex.test(date)) {
                showError(`Invalid date format for custom holiday "${name}". Please use dd-mm-yyyy.`);
                Swal.fire({
                    title: 'Error',
                    text: `Invalid date format for custom holiday "${name}". Please use dd-mm-yyyy.`,
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
                calendarOutput.innerHTML = '<p class="text-muted">Your generated calendar will appear here.</p>';
                return;
            }
            customHolidays.push({ name, date, type });
        }
    });

    // Simulate API call for holidays (replace with actual API call if available)
    const holidays = await fetchHolidays(year, country);
    const allHolidays = [...holidays, ...customHolidays];
    totalHolidaysCount = allHolidays.length;

    // Generate HTML for the calendar
    let calendarHtml = '';
    if (calendarFormat === 'year-at-a-glance') {
        calendarHtml = generateYearAtAGlance(year, allHolidays, colorTheme, showHolidayNames, compactView, companyName, logoUrl);
    } else if (calendarFormat === 'monthly') {
        calendarHtml = generateMonthlyCalendar(year, allHolidays, colorTheme, showHolidayNames, compactView, companyName, logoUrl);
    } else if (calendarFormat === 'grid-view') {
        calendarHtml = generateGridView(year, allHolidays, colorTheme, showHolidayNames, compactView, companyName, logoUrl);
    }


    calendarOutput.innerHTML = calendarHtml;
    
    // Populate and show holiday list
    if (allHolidays.length > 0) {
        allHolidays.sort((a, b) => {
            const [d1, m1, y1] = a.date.split('-').map(Number);
            const [d2, m2, y2] = b.date.split('-').map(Number);
            const dateA = new Date(y1, m1 - 1, d1);
            const dateB = new Date(y2, m2 - 1, d2);
            return dateA - dateB;
        });

        allHolidays.forEach(holiday => {
            const listItem = document.createElement('li');
            listItem.className = `list-group-item d-flex justify-content-between align-items-center ${holiday.type === 'public' ? 'text-danger' : ''}`;
            listItem.innerHTML = `
                <span>${holiday.name}</span>
                <span class="badge bg-secondary">${holiday.date}</span>
            `;
            holidayList.appendChild(listItem);
        });
        holidayListContainer.style.display = 'block';
    }


    // Increment stats
    calendarsGeneratedCount++;
    lastGeneratedDate = new Date().toLocaleString();
    updateStatsDisplay();
    updateTotalHolidaysCount(); // Ensure custom holidays are counted

    showStatus('Calendar generated successfully! Use download buttons below.', 'success');
    downloadButtons.style.display = 'flex'; // Show download buttons after generation
    
    Swal.fire({
        title: 'Calendar Generated!',
        text: 'Your calendar has been created and is ready for preview. Use the download buttons to save.',
        icon: 'success',
        confirmButtonText: 'OK',
        timer: 2000,
        timerProgressBar: true
    });
}

async function fetchHolidays(year, countryCode) {
    // This is a placeholder. In a real application, you would call a holiday API.
    // Example: https://date.nager.at/api/v3/PublicHolidays/2025/US
    // For demonstration, we'll return some mock data.
    showStatus(`Fetching holidays for ${countryCode.toUpperCase()}...`, 'info');
    return new Promise(resolve => {
        setTimeout(() => {
            let holidays = [];
            if (countryCode === 'us') {
                holidays = [
                    { name: 'New Year\'s Day', date: `01-01-${year}`, type: 'public' },
                    { name: 'Martin Luther King, Jr. Day', date: `01-20-${year}`, type: 'public' },
                    { name: 'Presidents\' Day', date: `02-17-${year}`, type: 'public' },
                    { name: 'Memorial Day', date: `05-26-${year}`, type: 'public' },
                    { name: 'Juneteenth National Independence Day', date: `06-19-${year}`, type: 'public' },
                    { name: 'Independence Day', date: `07-04-${year}`, type: 'public' },
                    { name: 'Labor Day', date: `09-01-${year}`, type: 'public' },
                    { name: 'Columbus Day', date: `10-13-${year}`, type: 'public' },
                    { name: 'Veterans Day', date: `11-11-${year}`, type: 'public' },
                    { name: 'Thanksgiving Day', date: `11-27-${year}`, type: 'public' },
                    { name: 'Christmas Day', date: `12-25-${year}`, type: 'public' }
                ];
            } else if (countryCode === 'in') {
                holidays = [
                    { name: 'Republic Day', date: `01-26-${year}`, type: 'public' },
                    { name: 'Holi', date: `03-14-${year}`, type: 'public' }, // Example, date varies
                    { name: 'Good Friday', date: `04-18-${year}`, type: 'public' }, // Example, date varies
                    { name: 'Eid al-Fitr', date: `05-01-${year}`, type: 'public' }, // Example, date varies
                    { name: 'Independence Day', date: `08-15-${year}`, type: 'public' },
                    { name: 'Gandhi Jayanti', date: `10-02-${year}`, type: 'public' },
                    { name: 'Diwali', date: `10-20-${year}`, type: 'public' }, // Example, date varies
                    { name: 'Christmas Day', date: `12-25-${year}`, type: 'public' }
                ];
            } else {
                // Default worldwide or other countries
                holidays = [
                    { name: 'New Year\'s Day', date: `01-01-${year}`, type: 'public' },
                    { name: 'International Workers\' Day', date: `05-01-${year}`, type: 'public' },
                    { name: 'Christmas Day', date: `12-25-${year}`, type: 'public' }
                ];
            }
            resolve(holidays);
        }, 500); // Simulate network delay
    });
}

function getThemeColors(theme) {
    switch (theme) {
        case 'corporate':
            return {
                primary: '#dc3545', // Danger red
                secondary: '#6c757d', // Secondary grey
                accent: '#0d6efd', // Primary blue
                text: '#212529', // Dark text
                background: '#ffffff', // White background
                border: '#dee2e6' // Light grey border
            };
        case 'modern':
            return {
                primary: '#007bff',
                secondary: '#6c757d',
                accent: '#28a745',
                text: '#343a40',
                background: '#f8f9fa',
                border: '#e9ecef'
            };
        case 'classic':
            return {
                primary: '#343a40',
                secondary: '#6c757d',
                accent: '#ffc107',
                text: '#212529',
                background: '#f0f0f0',
                border: '#ced4da'
            };
        default:
            return getThemeColors('corporate');
    }
}

function generateYearAtAGlance(year, holidays, theme, showHolidayNames, compactView, companyName, logoUrl) {
    const colors = getThemeColors(theme);
    let html = `
        <style>
            .calendar-container {
                font-family: 'Inter', sans-serif;
                color: ${colors.text};
                background-color: ${colors.background};
                padding: 20px;
                border: 1px solid ${colors.border};
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                max-width: 100%;
                overflow-x: auto;
            }
            .calendar-header {
                text-align: center;
                margin-bottom: 20px;
                border-bottom: 2px solid ${colors.primary};
                padding-bottom: 10px;
            }
            .calendar-header h2 {
                color: ${colors.primary};
                font-size: 2.5em;
                margin-bottom: 5px;
            }
            .calendar-header p {
                color: ${colors.secondary};
                font-size: 1.2em;
            }
            .company-info {
                display: flex;
                align-items: center;
                justify-content: center;
                margin-top: 10px;
            }
            .company-info img {
                max-height: 40px;
                margin-right: 10px;
                border-radius: 4px;
            }
            .months-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 20px;
            }
            .month-card {
                border: 1px solid ${colors.border};
                border-radius: 8px;
                overflow: hidden;
                box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            }
            .month-name {
                background-color: ${colors.primary};
                color: ${colors.background};
                padding: 10px;
                text-align: center;
                font-weight: bold;
                font-size: 1.1em;
            }
            .days-grid {
                display: grid;
                grid-template-columns: repeat(7, 1fr);
                text-align: center;
                padding: 10px;
            }
            .day-header {
                font-weight: bold;
                color: ${colors.accent};
                padding: 5px 0;
                font-size: ${compactView ? '0.75em' : '0.9em'};
            }
            .day-cell {
                padding: ${compactView ? '3px 0' : '8px 0'};
                border: 1px solid ${colors.border};
                font-size: ${compactView ? '0.7em' : '0.85em'};
                position: relative;
                min-height: ${compactView ? '25px' : '40px'};
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .day-cell.holiday {
                background-color: ${colors.accent}20; /* Light accent color */
                font-weight: bold;
            }
            .day-cell.holiday-public {
                background-color: ${colors.primary}20; /* Light primary color */
                font-weight: bold;
            }
            .day-cell.weekend {
                background-color: ${colors.secondary}10; /* Light secondary color */
            }
            .holiday-name {
                position: absolute;
                bottom: 2px;
                left: 0;
                right: 0;
                font-size: 0.6em;
                color: ${colors.accent};
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                padding: 0 2px;
                display: ${showHolidayNames ? 'block' : 'none'};
            }
            .day-cell.holiday-public .holiday-name {
                 color: ${colors.primary};
            }
            @media (max-width: 768px) {
                .months-grid {
                    grid-template-columns: 1fr;
                }
            }
        </style>
        <div class="calendar-container">
            <div class="calendar-header">
                <h2>${year} Calendar</h2>
                <p>${companyName ? companyName : 'Your Annual Calendar'}</p>
                ${logoUrl ? `<div class="company-info"><img src="${logoUrl}" alt="${companyName || 'Company'} Logo" loading="lazy" onerror="this.style.display='none'"><span>${companyName}</span></div>` : ''}
            </div>
            <div class="months-grid">
    `;

    const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    const dayNames = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];

    for (let i = 0; i < 12; i++) {
        const month = i;
        const firstDay = new Date(year, month, 1).getDay(); // 0 for Sunday, 1 for Monday, etc.
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        html += `
            <div class="month-card">
                <div class="month-name">${monthNames[month]}</div>
                <div class="days-grid">
                    ${dayNames.map(day => `<div class="day-header">${day}</div>`).join('')}
        `;

        // Empty cells for the start of the month
        for (let j = 0; j < firstDay; j++) {
            html += `<div class="day-cell"></div>`;
        }

        // Days of the month
        for (let day = 1; day <= daysInMonth; day++) {
            const currentDate = new Date(year, month, day);
            const isWeekend = currentDate.getDay() === 0 || currentDate.getDay() === 6; // Sunday (0) or Saturday (6)
            
            const formattedDate = `${String(day).padStart(2, '0')}-${String(month + 1).padStart(2, '0')}-${year}`;
            const holiday = holidays.find(h => h.date === formattedDate);
            
            let cellClass = 'day-cell';
            let holidayText = '';

            if (holiday) {
                cellClass += holiday.type === 'public' ? ' holiday holiday-public' : ' holiday';
                holidayText = `<span class="holiday-name">${holiday.name}</span>`;
            }
            if (isWeekend) {
                cellClass += ' weekend';
            }

            html += `<div class="${cellClass}">${day}${holidayText}</div>`;
        }

        html += `
                </div>
            </div>
        `;
    }

    html += `
            </div>
        </div>
    `;
    return html;
}

function generateMonthlyCalendar(year, holidays, theme, showHolidayNames, compactView, companyName, logoUrl) {
    const colors = getThemeColors(theme);
    let html = `
        <style>
            .calendar-container-monthly {
                font-family: 'Inter', sans-serif;
                color: ${colors.text};
                background-color: ${colors.background};
                padding: 20px;
                border: 1px solid ${colors.border};
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                max-width: 100%;
                overflow-x: auto;
            }
            .calendar-header-monthly {
                text-align: center;
                margin-bottom: 20px;
                border-bottom: 2px solid ${colors.primary};
                padding-bottom: 10px;
            }
            .calendar-header-monthly h2 {
                color: ${colors.primary};
                font-size: 2.5em;
                margin-bottom: 5px;
            }
            .calendar-header-monthly p {
                color: ${colors.secondary};
                font-size: 1.2em;
            }
            .company-info-monthly {
                display: flex;
                align-items: center;
                justify-content: center;
                margin-top: 10px;
            }
            .company-info-monthly img {
                max-height: 40px;
                margin-right: 10px;
                border-radius: 4px;
            }
            .month-section {
                margin-bottom: 30px;
                border: 1px solid ${colors.border};
                border-radius: 8px;
                overflow: hidden;
                box-shadow: 0 2px 4px rgba(0,0,0,0.05);
            }
            .month-title {
                background-color: ${colors.primary};
                color: ${colors.background};
                padding: 15px;
                text-align: center;
                font-weight: bold;
                font-size: 1.5em;
            }
            .days-grid-monthly {
                display: grid;
                grid-template-columns: repeat(7, 1fr);
                text-align: center;
                padding: 10px;
            }
            .day-header-monthly {
                font-weight: bold;
                color: ${colors.accent};
                padding: 10px 0;
                font-size: 1em;
                border-bottom: 1px solid ${colors.border};
            }
            .day-cell-monthly {
                padding: ${compactView ? '5px' : '15px'};
                border: 1px solid ${colors.border};
                font-size: ${compactView ? '0.9em' : '1.1em'};
                position: relative;
                min-height: ${compactView ? '60px' : '100px'};
                display: flex;
                flex-direction: column;
                align-items: flex-start;
                justify-content: flex-start;
                text-align: left;
            }
            .day-number {
                font-weight: bold;
                margin-bottom: 5px;
                align-self: flex-end; /* Align day number to top-right */
            }
            .day-cell-monthly.holiday {
                background-color: ${colors.accent}20;
                font-weight: bold;
            }
            .day-cell-monthly.holiday-public {
                background-color: ${colors.primary}20;
                font-weight: bold;
            }
            .day-cell-monthly.weekend {
                background-color: ${colors.secondary}10;
            }
            .holiday-list {
                list-style: none;
                padding: 0;
                margin: 0;
                font-size: 0.75em;
                max-height: ${compactView ? '30px' : '60px'};
                overflow: hidden;
                text-overflow: ellipsis;
            }
            .holiday-list li {
                color: ${colors.accent};
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                display: ${showHolidayNames ? 'block' : 'none'};
            }
            .day-cell-monthly.holiday-public .holiday-list li {
                color: ${colors.primary};
            }
            @media (max-width: 768px) {
                .day-cell-monthly {
                    min-height: ${compactView ? '40px' : '80px'};
                    padding: ${compactView ? '3px' : '10px'};
                }
                .holiday-list {
                    font-size: 0.65em;
                }
            }
        </style>
        <div class="calendar-container-monthly">
            <div class="calendar-header-monthly">
                <h2>${year} Calendar</h2>
                <p>${companyName ? companyName : 'Monthly Calendar'}</p>
                ${logoUrl ? `<div class="company-info-monthly"><img src="${logoUrl}" alt="${companyName || 'Company'} Logo" loading="lazy" onerror="this.style.display='none'"><span>${companyName}</span></div>` : ''}
            </div>
    `;

    const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
    const dayNames = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

    for (let i = 0; i < 12; i++) {
        const month = i;
        const firstDay = new Date(year, month, 1).getDay(); // 0 for Sunday, 1 for Monday, etc.
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        html += `
            <div class="month-section">
                <div class="month-title">${monthNames[month]} ${year}</div>
                <div class="days-grid-monthly">
                    ${dayNames.map(day => `<div class="day-header-monthly">${day}</div>`).join('')}
        `;

        // Empty cells for the start of the month
        for (let j = 0; j < firstDay; j++) {
            html += `<div class="day-cell-monthly"></div>`;
        }

        // Days of the month
        for (let day = 1; day <= daysInMonth; day++) {
            const currentDate = new Date(year, month, day);
            const isWeekend = currentDate.getDay() === 0 || currentDate.getDay() === 6; // Sunday (0) or Saturday (6)
            
            const formattedDate = `${String(day).padStart(2, '0')}-${String(month + 1).padStart(2, '0')}-${year}`;
            const holidaysOnThisDay = holidays.filter(h => h.date === formattedDate);
            
            let cellClass = 'day-cell-monthly';
            let holidayListHtml = '';

            if (holidaysOnThisDay.length > 0) {
                const hasPublicHoliday = holidaysOnThisDay.some(h => h.type === 'public');
                cellClass += hasPublicHoliday ? ' holiday holiday-public' : ' holiday';
                
                holidayListHtml = `<ul class="holiday-list">`;
                holidaysOnThisDay.forEach(h => {
                    holidayListHtml += `<li>${h.name}</li>`;
                });
                holidayListHtml += `</ul>`;
            }
            if (isWeekend) {
                cellClass += ' weekend';
            }

            html += `
                <div class="${cellClass}">
                    <span class="day-number">${day}</span>
                    ${holidayListHtml}
                </div>
            `;
        }

        html += `
                </div>
            </div>
        `;
    }

    html += `
            </div>
    `;
    return html;
}

function generateGridView(year, holidays, theme, showHolidayNames, compactView, companyName, logoUrl) {
    const colors = getThemeColors(theme);
    let html = `
        <style>
            .calendar-container-grid {
                font-family: 'Inter', sans-serif;
                color: ${colors.text};
                background-color: ${colors.background};
                padding: 20px;
                border: 1px solid ${colors.border};
                border-radius: 8px;
                box-shadow: 0 4px 8px rgba(0,0,0,0.1);
                max-width: 100%;
                overflow-x: auto;
            }
            .calendar-header-grid {
                text-align: center;
                margin-bottom: 20px;
                border-bottom: 2px solid ${colors.primary};
                padding-bottom: 10px;
            }
            .calendar-header-grid h2 {
                color: ${colors.primary};
                font-size: 2.5em;
                margin-bottom: 5px;
            }
            .calendar-header-grid p {
                color: ${colors.secondary};
                font-size: 1.2em;
            }
            .company-info-grid {
                display: flex;
                align-items: center;
                justify-content: center;
                margin-top: 10px;
            }
            .company-info-grid img {
                max-height: 40px;
                margin-right: 10px;
                border-radius: 4px;
            }
            .months-grid-all {
                display: grid;
                grid-template-columns: repeat(3, 1fr); /* 3 months per row for a compact look */
                gap: 15px;
                padding: 10px;
            }
            .month-card-grid {
                border: 1px solid ${colors.border};
                border-radius: 6px;
                overflow: hidden;
                box-shadow: 0 1px 3px rgba(0,0,0,0.08);
            }
            .month-name-grid {
                background-color: ${colors.primary};
                color: ${colors.background};
                padding: 7px;
                text-align: center;
                font-weight: bold;
                font-size: 0.9em;
            }
            .days-grid-inner {
                display: grid;
                grid-template-columns: repeat(7, 1fr);
                text-align: center;
                padding: 5px;
            }
            .day-header-grid {
                font-weight: bold;
                color: ${colors.accent};
                padding: 3px 0;
                font-size: 0.6em; /* Smaller font for headers */
            }
            .day-cell-grid {
                padding: 2px 0;
                border: 1px solid ${colors.border};
                font-size: 0.6em; /* Smaller font for day numbers */
                position: relative;
                min-height: ${compactView ? '18px' : '22px'};
                display: flex;
                align-items: center;
                justify-content: center;
            }
            .day-cell-grid.holiday {
                background-color: ${colors.accent}20;
                font-weight: bold;
            }
            .day-cell-grid.holiday-public {
                background-color: ${colors.primary}20;
                font-weight: bold;
            }
            .day-cell-grid.weekend {
                background-color: ${colors.secondary}10;
            }
            .holiday-name-grid {
                position: absolute;
                bottom: 1px;
                left: 0;
                right: 0;
                font-size: 0.5em; /* Even smaller font for holiday names */
                color: ${colors.accent};
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis;
                padding: 0 1px;
                display: ${showHolidayNames ? 'block' : 'none'};
            }
            .day-cell-grid.holiday-public .holiday-name-grid {
                 color: ${colors.primary};
            }
            @media (max-width: 768px) {
                .months-grid-all {
                    grid-template-columns: repeat(2, 1fr); /* 2 months on smaller screens */
                }
            }
             @media (max-width: 480px) {
                .months-grid-all {
                    grid-template-columns: 1fr; /* 1 month on very small screens */
                }
            }
        </style>
        <div class="calendar-container-grid">
            <div class="calendar-header-grid">
                <h2>${year} Annual Grid Calendar</h2>
                <p>${companyName ? companyName : 'Compact Calendar View'}</p>
                ${logoUrl ? `<div class="company-info-grid"><img src="${logoUrl}" alt="${companyName || 'Company'} Logo" loading="lazy" onerror="this.style.display='none'"><span>${companyName}</span></div>` : ''}
            </div>
            <div class="months-grid-all">
    `;

    const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    const dayNames = ["S", "M", "T", "W", "T", "F", "S"]; // Abbreviated day names for compact view

    for (let i = 0; i < 12; i++) {
        const month = i;
        const firstDay = new Date(year, month, 1).getDay(); // 0 for Sunday, 1 for Monday, etc.
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        html += `
            <div class="month-card-grid">
                <div class="month-name-grid">${monthNames[month]}</div>
                <div class="days-grid-inner">
                    ${dayNames.map(day => `<div class="day-header-grid">${day}</div>`).join('')}
        `;

        // Empty cells for the start of the month
        for (let j = 0; j < firstDay; j++) {
            html += `<div class="day-cell-grid"></div>`;
        }

        // Days of the month
        for (let day = 1; day <= daysInMonth; day++) {
            const currentDate = new Date(year, month, day);
            const isWeekend = currentDate.getDay() === 0 || currentDate.getDay() === 6; // Sunday (0) or Saturday (6)
            
            const formattedDate = `${String(day).padStart(2, '0')}-${String(month + 1).padStart(2, '0')}-${year}`;
            const holiday = holidays.find(h => h.date === formattedDate);
            
            let cellClass = 'day-cell-grid';
            let holidayText = '';

            if (holiday) {
                cellClass += holiday.type === 'public' ? ' holiday holiday-public' : ' holiday';
                holidayText = `<span class="holiday-name-grid">${holiday.name}</span>`;
            }
            if (isWeekend) {
                cellClass += ' weekend';
            }

            html += `<div class="${cellClass}">${day}${holidayText}</div>`;
        }

        html += `
                </div>
            </div>
        `;
    }

    html += `
            </div>
        </div>
    `;
    return html;
}

async function downloadPdf(element, paperSize, orientation, companyName) {
    showStatus('Preparing PDF for download...', 'info');
    const { jsPDF } = window.jspdf;
    
    // Store original styles
    const originalMaxHeight = element.style.maxHeight;
    const originalOverflow = element.style.overflow;

    // Temporarily remove max-height and overflow to capture full content
    element.style.maxHeight = 'none';
    element.style.overflow = 'visible';

    try {
        // Calculate dimensions based on paper size and orientation
        let widthInPts, heightInPts; // Dimensions in points (1pt = 1/72 inch)
        if (paperSize === 'letter') {
            widthInPts = 612; // 8.5 inches * 72 points/inch
            heightInPts = 792; // 11 inches * 72 points/inch
        } else { // A4
            widthInPts = 595.28; // 210 mm * (72 points/inch / 25.4 mm/inch)
            heightInPts = 841.89; // 297 mm * (72 points/inch / 25.4 mm/inch)
        }

        const docOrientation = orientation === 'landscape' ? 'landscape' : 'portrait';
        const doc = new jsPDF({
            orientation: docOrientation,
            unit: 'pt',
            format: paperSize
        });

        // Capture the entire content, including scrollable areas
        const canvas = await html2canvas(element, {
            scale: 2, // Increase scale for better resolution
            useCORS: true, // Important for images from external URLs (like logo)
            windowWidth: element.scrollWidth, // Capture full width
            windowHeight: element.scrollHeight, // Capture full height
            scrollX: 0,
            scrollY: 0
        });

        const imgData = canvas.toDataURL('image/png');
        const imgWidth = doc.internal.pageSize.getWidth(); // Use PDF page width
        const imgHeight = (canvas.height * imgWidth) / canvas.width; // Calculate image height to maintain aspect ratio

        let heightLeft = imgHeight;
        let position = 0;

        // Add image to PDF, splitting into multiple pages if necessary
        doc.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
        heightLeft -= doc.internal.pageSize.getHeight();

        while (heightLeft >= 0) {
            position = heightLeft - imgHeight;
            doc.addPage();
            doc.addImage(imgData, 'PNG', 0, position, imgWidth, imgHeight);
            heightLeft -= doc.internal.pageSize.getHeight();
        }

        doc.save(`${companyName ? companyName.replace(/\s/g, '-') + '-' : ''}calendar-${yearInput.value}.pdf`);
        showStatus('PDF downloaded successfully!', 'success');
    } catch (error) {
        showError('Error generating PDF: ' + error.message);
        console.error('PDF generation error:', error);
    } finally {
        // Revert styles
        element.style.maxHeight = originalMaxHeight;
        element.style.overflow = originalOverflow;
    }
}

async function downloadImage(element, companyName) {
    showStatus('Preparing image for download...', 'info');
    
    // Store original styles
    const originalMaxHeight = element.style.maxHeight;
    const originalOverflow = element.style.overflow;

    // Temporarily remove max-height and overflow to capture full content
    element.style.maxHeight = 'none';
    element.style.overflow = 'visible';

    try {
        // Capture the entire content, including scrollable areas
        const canvas = await html2canvas(element, {
            scale: 2, // Increase scale for better resolution
            useCORS: true, // Important for images from external URLs (like logo)
            windowWidth: element.scrollWidth, // Capture full width
            windowHeight: element.scrollHeight, // Capture full height
            scrollX: 0,
            scrollY: 0
        });
        const imgData = canvas.toDataURL('image/png');
        const link = document.createElement('a');
        link.href = imgData;
        link.download = `${companyName ? companyName.replace(/\s/g, '-') + '-' : ''}calendar-${yearInput.value}.png`;
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
        showStatus('Image downloaded successfully!', 'success');
    } catch (error) {
        showError('Error generating Image: ' + error.message);
        console.error('Image generation error:', error);
    } finally {
        // Revert styles
        element.style.maxHeight = originalMaxHeight;
        element.style.overflow = originalOverflow;
    }
}

// Helper Functions
function showStatus(message, type) {
    statusArea.textContent = message;
    statusArea.className = `text-center text-${type}`;
}

function showError(message) {
    showStatus(message, 'danger');
}
</script>

<?php include '../../includes/footer.php'; ?>