<?php
// SEO and Page Metadata
$page_title = "Offer Letter Generator - Create Job Offer Letters Online Free"; // You may Change the Title here
$page_description = "Free online offer letter generator. Create professional job offer letters quickly. Customize salary, designation, joining date, and company details. Download as PDF."; // Put your Description here
$page_keywords = "offer letter generator, pdf converter, convert pdf, free online pdf tools, pdf to word, pdf to excel, wordscompare";

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
                    <h1 class="h2">Offer Letter Generator <i class="fas fa-file-alt text-danger ms-2"></i></h1>
                    <p class="lead text-muted">100% Free Offer Letter Creator | Professional Templates | No Signup Needed</p>
                </header>

                <div class="row mb-4 text-center">
                    <div class="col-md-3">
                        <div class="card bg-light p-2">
                            <h6 class="mb-0">Letters Generated</h6>
                            <p class="display-6 mb-0" id="lettersGenerated">0</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-light p-2">
                            <h6 class="mb-0">Active Templates</h6>
                            <p class="display-6 mb-0">5</p>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card bg-light p-2">
                            <h6 class="mb-0">Most Used</h6>
                            <p class="display-6 mb-0">Standard</p>
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
                        <h5 class="mb-0"><i class="fas fa-cogs me-2"></i>Create Offer Letter</h5>
                    </div>
                    <div class="card-body">
                        <form id="offerLetterForm">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="templateSelect" class="form-label">Select Template*</label>
                                    <select id="templateSelect" class="form-select" required>
                                        <option value="Standard">Standard</option>
                                        <option value="Executive">Executive</option>
                                        <option value="Modern">Modern</option>
                                        <option value="Minimal">Minimal</option>
                                        <option value="Creative">Creative</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="companyName" class="form-label">Company Name*</label>
                                    <input type="text" id="companyName" class="form-control" placeholder="Acme Corp" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="companyLogoUrl" class="form-label">Company Logo URL</label>
                                    <input type="url" id="companyLogoUrl" class="form-control" placeholder="https://example.com/logo.png">
                                </div>
                                <div class="col-md-6">
                                    <label for="companyAddress" class="form-label">Company Address*</label>
                                    <input type="text" id="companyAddress" class="form-control" placeholder="123 Business Rd, Suite 100, City, State, ZIP" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="candidateName" class="form-label">Candidate Name*</label>
                                    <input type="text" id="candidateName" class="form-control" placeholder="John Doe" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="candidateEmail" class="form-label">Candidate Email*</label>
                                    <input type="email" id="candidateEmail" class="form-control" placeholder="john.doe@example.com" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="candidateAddress" class="form-label">Candidate Address</label>
                                    <input type="text" id="candidateAddress" class="form-control" placeholder="456 Main St, Apt 2B, City, State, ZIP">
                                </div>
                                <div class="col-md-6">
                                    <label for="jobTitle" class="form-label">Job Title*</label>
                                    <input type="text" id="jobTitle" class="form-control" placeholder="Software Engineer" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="department" class="form-label">Department*</label>
                                    <input type="text" id="department" class="form-control" placeholder="Engineering" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="reportingTo" class="form-label">Reporting To*</label>
                                    <input type="text" id="reportingTo" class="form-control" placeholder="Jane Smith, Engineering Manager" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="joiningDate" class="form-label">Joining Date*</label>
                                    <input type="date" id="joiningDate" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="employmentType" class="form-label">Employment Type*</label>
                                    <select id="employmentType" class="form-select" required>
                                        <option value="">Select Type</option>
                                        <option value="Full-time">Full-time</option>
                                        <option value="Part-time">Part-time</option>
                                        <option value="Contract">Contract</option>
                                        <option value="Internship">Internship</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="probationPeriod" class="form-label">Probation Period</label>
                                    <select id="probationPeriod" class="form-select">
                                        <option value="None">None</option>
                                        <option value="1 month">1 month</option>
                                        <option value="3 months">3 months</option>
                                        <option value="6 months">6 months</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="salary" class="form-label">Salary*</label>
                                    <div class="input-group">
                                        <select id="currency" class="form-select flex-grow-0" style="width: auto;" required>
                                            <option value="$">$</option>
                                            <option value="₹">₹</option>
                                            <option value="€">€</option>
                                            <option value="£">£</option>
                                            <option value="¥">¥</option>
                                        </select>
                                        <input type="number" id="salary" class="form-control" placeholder="80000" min="0" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="paymentFrequency" class="form-label">Payment Frequency*</label>
                                    <select id="paymentFrequency" class="form-select" required>
                                        <option value="">Select Frequency</option>
                                        <option value="Monthly">Monthly</option>
                                        <option value="Bi-weekly">Bi-weekly</option>
                                        <option value="Weekly">Weekly</option>
                                        <option value="Annual">Annual</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="bonusPotential" class="form-label">Bonus Potential</label>
                                    <input type="text" id="bonusPotential" class="form-control" placeholder="Up to 10% annual bonus">
                                </div>
                                <div class="col-md-6">
                                    <label for="benefitsPackage" class="form-label">Benefits Package</label>
                                    <input type="text" id="benefitsPackage" class="form-control" placeholder="Health, Dental, Vision, 401k, PTO">
                                </div>
                                <div class="col-md-6">
                                    <label for="workLocation" class="form-label">Work Location*</label>
                                    <input type="text" id="workLocation" class="form-control" placeholder="Company Headquarters, City" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="workHours" class="form-label">Work Hours</label>
                                    <input type="text" id="workHours" class="form-control" placeholder="9:00 AM - 5:00 PM, Monday - Friday">
                                </div>
                                <div class="col-md-6">
                                    <label for="remotePolicy" class="form-label">Remote Policy</label>
                                    <select id="remotePolicy" class="form-select">
                                        <option value="On-site">On-site</option>
                                        <option value="Hybrid">Hybrid</option>
                                        <option value="Remote">Remote</option>
                                    </select>
                                </div>
                                <div class="col-12">
                                    <label for="additionalTerms" class="form-label">Additional Terms</label>
                                    <textarea id="additionalTerms" class="form-control" rows="3" placeholder="Any additional terms or conditions..."></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex justify-content-md-center mb-4">
                    <button class="btn btn-danger btn-md px-4" id="generateOfferLetterBtn">
                        <i class="fas fa-file-signature me-2"></i> Generate Offer Letter
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

                <div class="preview-area card mt-4" id="letterOutputContainer" style="display: none;">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-envelope-open-text me-2"></i>Generated Offer Letter Preview</h5>
                    </div>
                    <div class="card-body p-4" id="letterOutput" style="min-height: 400px; max-height: 800px; overflow: auto; background-color: #f8f9fa;">
                        <p class="text-muted text-center">Your generated offer letter will appear here.</p>
                    </div>
                </div>
            </div>
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
                <?php include '../../views/content/offer-letter-generator-content.php'; ?>    
            </article>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
// JavaScript for Offer Letter Generator
let lettersGeneratedCount = 0;
let lastGeneratedDate = '-';

// Initialize elements
const lettersGeneratedDisplay = document.getElementById('lettersGenerated');
const lastGeneratedDisplay = document.getElementById('lastGenerated');
const offerLetterForm = document.getElementById('offerLetterForm');
const generateOfferLetterBtn = document.getElementById('generateOfferLetterBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const statusArea = document.getElementById('statusArea');
const letterOutputContainer = document.getElementById('letterOutputContainer');
const letterOutput = document.getElementById('letterOutput');
const downloadButtons = document.getElementById('downloadButtons');
const downloadPdfBtn = document.getElementById('downloadPdfBtn');
const downloadImageBtn = document.getElementById('downloadImageBtn');

// Event Listeners
generateOfferLetterBtn.addEventListener('click', generateOfferLetter);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);
downloadPdfBtn.addEventListener('click', () => downloadPdf(letterOutput, 'letter', 'portrait', document.getElementById('companyName').value));
downloadImageBtn.addEventListener('click', () => downloadImage(letterOutput, document.getElementById('companyName').value));

// Initial display updates
updateStatsDisplay();

function updateStatsDisplay() {
    lettersGeneratedDisplay.textContent = lettersGeneratedCount;
    lastGeneratedDisplay.textContent = lastGeneratedDate;
}

function showHowTo() {
    Swal.fire({
        title: 'Welcome to Offer Letter Generator',
        html: `Follow these steps to create your custom offer letter:<br><br>
        <ol class="text-start">
            <li>Select your preferred template from the dropdown.</li>
            <li>Fill in all the required fields marked with an asterisk (*).</li>
            <li>Provide optional details like Company Logo URL, Candidate Address, Bonus Potential, and Benefits Package.</li>
            <li>Click "Generate Offer Letter" to create and preview your document.</li>
            <li>After generation, use the "Download PDF" or "Download Image" buttons to save your letter.</li>
        </ol>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

function resetAll() {
    offerLetterForm.reset();
    letterOutput.innerHTML = '<p class="text-muted text-center">Your generated offer letter will appear here.</p>';
    letterOutputContainer.style.display = 'none';
    downloadButtons.style.display = 'none';
    statusArea.textContent = '';
    
    lettersGeneratedCount = 0;
    lastGeneratedDate = '-';
    updateStatsDisplay();
}

async function generateOfferLetter() {
    // Basic validation for required fields
    const requiredFields = offerLetterForm.querySelectorAll('[required]');
    let allFieldsFilled = true;
    requiredFields.forEach(field => {
        if (!field.value.trim()) {
            field.classList.add('is-invalid');
            allFieldsFilled = false;
        } else {
            field.classList.remove('is-invalid');
        }
    });

    if (!allFieldsFilled) {
        showError('Please fill in all required fields.');
        Swal.fire({
            title: 'Error',
            text: 'Please fill in all required fields.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Generating offer letter...', 'info');
    letterOutput.innerHTML = '<div class="text-center"><div class="spinner-border text-danger" role="status"><span class="visually-hidden">Loading...</span></div><p class="mt-2">Generating letter...</p></div>';
    letterOutputContainer.style.display = 'block';
    downloadButtons.style.display = 'none';

    // Gather all input values
    const template = document.getElementById('templateSelect').value;
    const companyName = document.getElementById('companyName').value;
    const companyLogoUrl = document.getElementById('companyLogoUrl').value;
    const companyAddress = document.getElementById('companyAddress').value;
    const candidateName = document.getElementById('candidateName').value;
    const candidateEmail = document.getElementById('candidateEmail').value;
    const candidateAddress = document.getElementById('candidateAddress').value;
    const jobTitle = document.getElementById('jobTitle').value;
    const department = document.getElementById('department').value;
    const reportingTo = document.getElementById('reportingTo').value;
    const joiningDate = document.getElementById('joiningDate').value;
    const employmentType = document.getElementById('employmentType').value;
    const probationPeriod = document.getElementById('probationPeriod').value;
    const currency = document.getElementById('currency').value;
    const salary = document.getElementById('salary').value;
    const paymentFrequency = document.getElementById('paymentFrequency').value;
    const bonusPotential = document.getElementById('bonusPotential').value;
    const benefitsPackage = document.getElementById('benefitsPackage').value;
    const workLocation = document.getElementById('workLocation').value;
    const workHours = document.getElementById('workHours').value;
    const remotePolicy = document.getElementById('remotePolicy').value;
    const additionalTerms = document.getElementById('additionalTerms').value;

    const letterData = {
        template, companyName, companyLogoUrl, companyAddress, candidateName, candidateEmail,
        candidateAddress, jobTitle, department, reportingTo, joiningDate, employmentType,
        probationPeriod, currency, salary, paymentFrequency, bonusPotential, benefitsPackage,
        workLocation, workHours, remotePolicy, additionalTerms
    };

    // Simulate letter generation
    setTimeout(() => {
        const generatedHtml = generateLetterHtml(letterData);
        letterOutput.innerHTML = generatedHtml;

        lettersGeneratedCount++;
        lastGeneratedDate = new Date().toLocaleString();
        updateStatsDisplay();

        showStatus('Offer letter generated successfully! Use download buttons below.', 'success');
        downloadButtons.style.display = 'flex';

        Swal.fire({
            title: 'Offer Letter Generated!',
            text: 'Your offer letter has been created and is ready for preview. Use the download buttons to save.',
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 2000,
            timerProgressBar: true
        });
    }, 1000); // Simulate processing time
}

function generateLetterHtml(data) {
    const today = new Date().toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
    const formattedSalary = `${data.currency}${parseFloat(data.salary).toLocaleString()} ${data.paymentFrequency}`;
    const formattedJoiningDate = new Date(data.joiningDate + 'T00:00:00').toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });

    let letterContent = '';
    let letterStyle = '';

    switch (data.template) {
        case 'Standard':
            letterStyle = `
                <style>
                    .offer-letter-standard { font-family: 'Times New Roman', serif; font-size: 11pt; line-height: 1.6; color: #333; }
                    .offer-letter-standard h3 { text-align: center; color: #000; font-size: 16pt; margin-bottom: 20px; }
                    .offer-letter-standard .header-info { text-align: right; margin-bottom: 30px; }
                    .offer-letter-standard .company-logo { max-width: 150px; margin-bottom: 20px; display: block; margin-left: auto; margin-right: auto;}
                    .offer-letter-standard p { margin-bottom: 10px; }
                    .offer-letter-standard ul { margin-bottom: 10px; padding-left: 20px; }
                    .offer-letter-standard strong { font-weight: bold; }
                    .offer-letter-standard .closing { margin-top: 30px; }
                    .offer-letter-standard .signature { margin-top: 40px; border-top: 1px solid #ccc; padding-top: 5px; width: 200px; }
                </style>
            `;
            letterContent = `
                <div class="offer-letter-standard">
                    ${data.companyLogoUrl ? `<img src="${data.companyLogoUrl}" alt="${data.companyName} Logo" class="company-logo" loading="lazy" onerror="this.style.display='none'">` : ''}
                    <div class="header-info">
                        <strong>${data.companyName}</strong><br>
                        ${data.companyAddress}<br>
                        ${today}
                    </div>
                    
                    <p><strong>${data.candidateName}</strong><br>
                    ${data.candidateAddress || data.candidateEmail}</p>

                    <h3>OFFER OF EMPLOYMENT</h3>

                    <p>Dear ${data.candidateName},</p>
                    <p>We are pleased to offer you the position of <strong>${data.jobTitle}</strong> in the <strong>${data.department}</strong> Department at ${data.companyName}. You will be reporting directly to ${data.reportingTo}.</p>

                    <p>This is a ${data.employmentType.toLowerCase()} position, with an anticipated start date of <strong>${formattedJoiningDate}</strong>.</p>

                    <p>Your compensation for this role will be <strong>${formattedSalary}</strong>. ${data.probationPeriod !== 'None' ? `This offer includes a probation period of ${data.probationPeriod}.` : ''}</p>

                    <p>In addition to your salary, you will be eligible for:</p>
                    <ul>
                        ${data.bonusPotential ? `<li><strong>Bonus Potential:</strong> ${data.bonusPotential}</li>` : ''}
                        ${data.benefitsPackage ? `<li><strong>Benefits Package:</strong> ${data.benefitsPackage}</li>` : ''}
                    </ul>

                    <p>Your primary work location will be at <strong>${data.workLocation}</strong>. ${data.workHours ? `Your standard work hours will be ${data.workHours}.` : ''} The company's remote policy for this role is <strong>${data.remotePolicy.toLowerCase()}</strong>.</p>

                    ${data.additionalTerms ? `<p><strong>Additional Terms:</strong> ${data.additionalTerms}</p>` : ''}

                    <p>We believe your skills and experience will be a valuable asset to our team. We are excited about the prospect of you joining ${data.companyName}.</p>

                    <p class="closing">Sincerely,</p>
                    <p><strong>[Hiring Manager Name/HR Department]</strong><br>
                    ${data.companyName}</p>
                    
                    <p>To accept this offer, please sign and return a copy of this letter by [Acceptance Date - e.g., 7 days from today].</p>
                    <p>_________________________<br>
                    ${data.candidateName}<br>
                    Date: _____________</p>
                </div>
            `;
            break;

        case 'Executive':
            letterStyle = `
                <style>
                    .offer-letter-executive { font-family: 'Georgia', serif; font-size: 12pt; line-height: 1.7; color: #222; max-width: 800px; margin: auto; padding: 30px; border: 1px solid #ddd; box-shadow: 0 0 10px rgba(0,0,0,0.05); }
                    .offer-letter-executive h2 { text-align: center; color: #4a4a4a; font-size: 20pt; margin-bottom: 30px; border-bottom: 2px solid #4a4a4a; padding-bottom: 10px; }
                    .offer-letter-executive .company-header { text-align: center; margin-bottom: 40px; }
                    .offer-letter-executive .company-header img { max-width: 200px; margin-bottom: 15px; }
                    .offer-letter-executive .company-header .address { font-size: 10pt; color: #666; }
                    .offer-letter-executive .date { text-align: right; margin-bottom: 20px; font-weight: bold; }
                    .offer-letter-executive p { margin-bottom: 15px; }
                    .offer-letter-executive strong { color: #000; }
                    .offer-letter-executive ul { list-style-type: disc; margin-left: 25px; margin-bottom: 15px; }
                    .offer-letter-executive .section-title { font-size: 14pt; font-weight: bold; color: #4a4a4a; margin-top: 25px; margin-bottom: 15px; border-bottom: 1px solid #eee; padding-bottom: 5px; }
                    .offer-letter-executive .signature-block { margin-top: 50px; display: flex; justify-content: space-between; align-items: flex-end; }
                    .offer-letter-executive .signature-line { flex: 1; border-top: 1px solid #4a4a4a; padding-top: 5px; margin-right: 20px; }
                    .offer-letter-executive .signature-name { font-weight: bold; }
                    .offer-letter-executive .acceptance-block { margin-top: 50px; border-top: 1px dashed #ccc; padding-top: 20px; }
                </style>
            `;
            letterContent = `
                <div class="offer-letter-executive">
                    <div class="company-header">
                        ${data.companyLogoUrl ? `<img src="${data.companyLogoUrl}" alt="${data.companyName} Logo" loading="lazy" onerror="this.style.display='none'">` : ''}
                        <h1>${data.companyName}</h1>
                        <div class="address">${data.companyAddress}</div>
                    </div>

                    <div class="date">${today}</div>
                    
                    <p><strong>${data.candidateName}</strong><br>
                    ${data.candidateAddress || data.candidateEmail}</p>

                    <h2>EXECUTIVE OFFER OF EMPLOYMENT</h2>

                    <p>Dear ${data.candidateName},</p>
                    <p>On behalf of ${data.companyName}, I am delighted to extend this offer of employment for the position of <strong>${data.jobTitle}</strong> within our <strong>${data.department}</strong> Department. You will report directly to ${data.reportingTo}.</p>

                    <div class="section-title">Key Terms:</div>
                    <ul>
                        <li><strong>Start Date:</strong> ${formattedJoiningDate}</li>
                        <li><strong>Employment Type:</strong> ${data.employmentType}</li>
                        ${data.probationPeriod !== 'None' ? `<li><strong>Probation Period:</strong> ${data.probationPeriod}</li>` : ''}
                        <li><strong>Compensation:</strong> Your annual compensation will be <strong>${formattedSalary}</strong>, paid ${data.paymentFrequency.toLowerCase()}.</li>
                        ${data.bonusPotential ? `<li><strong>Bonus Potential:</strong> ${data.bonusPotential}</li>` : ''}
                        ${data.benefitsPackage ? `<li><strong>Benefits:</strong> Comprehensive benefits package including ${data.benefitsPackage}. Full details will be provided upon commencement of employment.</li>` : ''}
                        <li><strong>Work Location:</strong> ${data.workLocation} (${data.remotePolicy} policy).</li>
                        ${data.workHours ? `<li><strong>Work Hours:</strong> ${data.workHours}.</li>` : ''}
                    </ul>

                    ${data.additionalTerms ? `<div class="section-title">Additional Provisions:</div><p>${data.additionalTerms}</p>` : ''}

                    <p>We are confident that your leadership and expertise will significantly contribute to the strategic objectives and continued success of ${data.companyName}. We eagerly anticipate your positive impact.</p>

                    <p>Please indicate your acceptance of this offer by signing below and returning this letter by [Acceptance Date - e.g., 7 days from today].</p>

                    <div class="signature-block">
                        <div>
                            <div class="signature-line"></div>
                            <div class="signature-name">[Hiring Manager Name/CEO]</div>
                            <div>[Title]</div>
                            <div>${data.companyName}</div>
                        </div>
                        <div>
                            <div class="signature-line"></div>
                            <div class="signature-name">${data.candidateName}</div>
                            <div>Date</div>
                        </div>
                    </div>
                </div>
            `;
            break;

        case 'Modern':
            letterStyle = `
                <style>
                    .offer-letter-modern { font-family: 'Segoe UI', sans-serif; font-size: 10.5pt; line-height: 1.6; color: #3a3a3a; padding: 25px; background-color: #f9f9f9; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.08); }
                    .offer-letter-modern .header { text-align: center; margin-bottom: 30px; padding-bottom: 15px; border-bottom: 3px solid #007bff; }
                    .offer-letter-modern .header h1 { color: #007bff; font-size: 24pt; margin-bottom: 5px; }
                    .offer-letter-modern .header .tagline { color: #666; font-size: 11pt; }
                    .offer-letter-modern .company-logo { max-width: 120px; margin-bottom: 15px; display: block; margin-left: auto; margin-right: auto;}
                    .offer-letter-modern .date-address { display: flex; justify-content: space-between; margin-bottom: 20px; font-size: 10pt; }
                    .offer-letter-modern .recipient-info { margin-bottom: 25px; }
                    .offer-letter-modern .section { margin-bottom: 20px; }
                    .offer-letter-modern .section-heading { font-size: 13pt; color: #007bff; margin-bottom: 10px; border-bottom: 1px solid #e0e0e0; padding-bottom: 5px; }
                    .offer-letter-modern ul { list-style-type: none; padding: 0; margin: 0; }
                    .offer-letter-modern ul li { margin-bottom: 8px; }
                    .offer-letter-modern strong { color: #000; }
                    .offer-letter-modern .footer { margin-top: 40px; text-align: center; font-size: 9pt; color: #888; }
                    .offer-letter-modern .signature-line { border-top: 1px solid #aaa; width: 250px; margin: 30px auto 5px auto; }
                    .offer-letter-modern .acceptance-section { margin-top: 30px; padding-top: 20px; border-top: 1px dashed #ccc; text-align: center; }
                </style>
            `;
            letterContent = `
                <div class="offer-letter-modern">
                    <div class="header">
                        ${data.companyLogoUrl ? `<img src="${data.companyLogoUrl}" alt="${data.companyName} Logo" class="company-logo" loading="lazy" onerror="this.style.display='none'">` : ''}
                        <h1>${data.companyName}</h1>
                        <div class="tagline">${data.companyAddress}</div>
                    </div>

                    <div class="date-address">
                        <div>${today}</div>
                        <div></div>
                    </div>
                    
                    <div class="recipient-info">
                        <strong>${data.candidateName}</strong><br>
                        ${data.candidateAddress || data.candidateEmail}
                    </div>

                    <p>Dear ${data.candidateName},</p>
                    <p>We are excited to formally offer you the position of <strong>${data.jobTitle}</strong> within our dynamic <strong>${data.department}</strong> team at ${data.companyName}. You will report directly to ${data.reportingTo}.</p>

                    <div class="section">
                        <div class="section-heading">Position Details</div>
                        <ul>
                            <li><strong>Employment Type:</strong> ${data.employmentType}</li>
                            <li><strong>Start Date:</strong> ${formattedJoiningDate}</li>
                            <li><strong>Work Location:</strong> ${data.workLocation} (${data.remotePolicy})</li>
                            ${data.workHours ? `<li><strong>Work Hours:</strong> ${data.workHours}</li>` : ''}
                            ${data.probationPeriod !== 'None' ? `<li><strong>Probation Period:</strong> ${data.probationPeriod}</li>` : ''}
                        </ul>
                    </div>

                    <div class="section">
                        <div class="section-heading">Compensation & Benefits</div>
                        <ul>
                            <li><strong>Base Salary:</strong> ${formattedSalary}</li>
                            ${data.bonusPotential ? `<li><strong>Bonus Potential:</strong> ${data.bonusPotential}</li>` : ''}
                            ${data.benefitsPackage ? `<li><strong>Benefits:</strong> Our comprehensive benefits package includes ${data.benefitsPackage}.</li>` : ''}
                        </ul>
                    </div>

                    ${data.additionalTerms ? `<div class="section"><div class="section-heading">Additional Terms</div><p>${data.additionalTerms}</p></div>` : ''}

                    <p>We believe your unique skills and passion will be a significant asset to our mission. We look forward to welcoming you to our team.</p>

                    <p>Please review this offer carefully. To accept, kindly sign and return this letter by [Acceptance Date - e.g., 7 days from today].</p>

                    <div class="signature-line"></div>
                    <p><strong>[Hiring Manager Name/HR Department]</strong><br>
                    [Title]<br>
                    ${data.companyName}</p>

                    <div class="acceptance-section">
                        <p>I accept this offer of employment and agree to the terms and conditions outlined above.</p>
                        <div class="signature-line"></div>
                        <p><strong>${data.candidateName}</strong><br>
                        Date: _____________</p>
                    </div>
                </div>
            `;
            break;

        case 'Minimal':
            letterStyle = `
                <style>
                    .offer-letter-minimal { font-family: 'Arial', sans-serif; font-size: 10pt; line-height: 1.5; color: #444; padding: 20px; }
                    .offer-letter-minimal .header-minimal { text-align: center; margin-bottom: 25px; }
                    .offer-letter-minimal .header-minimal h1 { font-size: 18pt; color: #555; margin-bottom: 5px; }
                    .offer-letter-minimal .header-minimal p { font-size: 9pt; color: #777; }
                    .offer-letter-minimal .company-logo { max-width: 100px; margin-bottom: 10px; display: block; margin-left: auto; margin-right: auto;}
                    .offer-letter-minimal .date { text-align: right; margin-bottom: 15px; }
                    .offer-letter-minimal p { margin-bottom: 8px; }
                    .offer-letter-minimal strong { font-weight: bold; }
                    .offer-letter-minimal .signature-area { margin-top: 30px; }
                    .offer-letter-minimal .signature-line { border-top: 1px solid #ddd; width: 180px; margin-top: 20px; }
                    .offer-letter-minimal .acceptance-minimal { margin-top: 25px; padding-top: 15px; border-top: 1px dashed #eee; }
                </style>
            `;
            letterContent = `
                <div class="offer-letter-minimal">
                    <div class="header-minimal">
                        ${data.companyLogoUrl ? `<img src="${data.companyLogoUrl}" alt="${data.companyName} Logo" class="company-logo" loading="lazy" onerror="this.style.display='none'">` : ''}
                        <h1>OFFER LETTER</h1>
                        <p>${data.companyName} | ${data.companyAddress}</p>
                    </div>

                    <div class="date">${today}</div>
                    
                    <p>Dear ${data.candidateName},</p>
                    <p>We are pleased to offer you the position of <strong>${data.jobTitle}</strong> in the ${data.department} Department, reporting to ${data.reportingTo}.</p>

                    <p>This is a ${data.employmentType.toLowerCase()} position, starting on <strong>${formattedJoiningDate}</strong>.</p>

                    <p>Your compensation will be <strong>${formattedSalary}</strong>. ${data.probationPeriod !== 'None' ? `A probation period of ${data.probationPeriod} applies.` : ''}</p>

                    <p>Work Location: ${data.workLocation} (${data.remotePolicy}).</p>
                    ${data.workHours ? `<p>Work Hours: ${data.workHours}.</p>` : ''}
                    ${data.bonusPotential ? `<p>Bonus Potential: ${data.bonusPotential}.</p>` : ''}
                    ${data.benefitsPackage ? `<p>Benefits: ${data.benefitsPackage}.</p>` : ''}
                    ${data.additionalTerms ? `<p>Additional Terms: ${data.additionalTerms}</p>` : ''}

                    <p>We look forward to your contribution to ${data.companyName}.</p>

                    <div class="signature-area">
                        <p>Sincerely,</p>
                        <div class="signature-line"></div>
                        <p>[Hiring Manager Name/HR Department]<br>
                        ${data.companyName}</p>
                    </div>

                    <div class="acceptance-minimal">
                        <p>I accept this offer:</p>
                        <div class="signature-line"></div>
                        <p>${data.candidateName}<br>
                        Date: _____________</p>
                    </div>
                </div>
            `;
            break;

        case 'Creative':
            letterStyle = `
                <style>
                    .offer-letter-creative { font-family: 'Verdana', sans-serif; font-size: 10.5pt; line-height: 1.6; color: #4a4a4a; padding: 30px; background: linear-gradient(to bottom right, #e6f7ff, #f0f8ff); border-radius: 15px; box-shadow: 0 5px 20px rgba(0,0,0,0.15); }
                    .offer-letter-creative .header-creative { text-align: center; margin-bottom: 40px; padding-bottom: 20px; border-bottom: 4px solid #ff6347; }
                    .offer-letter-creative .header-creative h1 { color: #ff6347; font-size: 28pt; margin-bottom: 10px; text-shadow: 1px 1px 2px rgba(0,0,0,0.1); }
                    .offer-letter-creative .header-creative .company-tagline { font-style: italic; color: #666; font-size: 12pt; }
                    .offer-letter-creative .company-logo { max-width: 180px; margin-bottom: 20px; display: block; margin-left: auto; margin-right: auto;}
                    .offer-letter-creative .date-creative { text-align: right; margin-bottom: 25px; font-weight: bold; color: #555; }
                    .offer-letter-creative p { margin-bottom: 12px; }
                    .offer-letter-creative strong { color: #000; font-weight: bold; }
                    .offer-letter-creative .highlight { background-color: #ffe0b2; padding: 2px 5px; border-radius: 3px; }
                    .offer-letter-creative ul { list-style-type: '🌟 '; padding-left: 25px; margin-bottom: 15px; }
                    .offer-letter-creative ul li { margin-bottom: 8px; }
                    .offer-letter-creative .closing-creative { margin-top: 40px; text-align: center; }
                    .offer-letter-creative .signature-creative { margin-top: 50px; border-top: 2px dashed #ff6347; padding-top: 15px; }
                    .offer-letter-creative .signature-creative p { margin-bottom: 5px; }
                    .offer-letter-creative .acceptance-creative { margin-top: 40px; padding-top: 25px; border-top: 2px solid #a0d9ff; text-align: center; }
                </style>
            `;
            letterContent = `
                <div class="offer-letter-creative">
                    <div class="header-creative">
                        ${data.companyLogoUrl ? `<img src="${data.companyLogoUrl}" alt="${data.companyName} Logo" class="company-logo" onerror="this.style.display='none'">` : ''}
                        <h1>A New Journey Awaits!</h1>
                        <p class="company-tagline">An Offer from ${data.companyName}</p>
                    </div>

                    <div class="date-creative">${today}</div>
                    
                    <p>Hello <span class="highlight">${data.candidateName}</span>,</p>
                    <p>We're thrilled to extend an invitation for you to join our innovative team at ${data.companyName} as a <strong>${data.jobTitle}</strong> in the <strong>${data.department}</strong> Department. You'll be a key player, reporting directly to the insightful ${data.reportingTo}.</p>

                    <p>Your adventure with us is set to begin on <strong>${formattedJoiningDate}</strong>, as a ${data.employmentType.toLowerCase()} team member.</p>

                    <p>Here’s a glimpse of what awaits you:</p>
                    <ul>
                        <li><strong>Compensation:</strong> A competitive ${formattedSalary} package.</li>
                        ${data.probationPeriod !== 'None' ? `<li><strong>Probation Period:</strong> A ${data.probationPeriod} period to ensure a smooth transition.</li>` : ''}
                        ${data.bonusPotential ? `<li><strong>Growth Incentives:</strong> Exciting bonus potential of ${data.bonusPotential}.</li>` : ''}
                        ${data.benefitsPackage ? `<li><strong>Wellness & Support:</strong> A robust benefits package including ${data.benefitsPackage}.</li>` : ''}
                        <li><strong>Work Environment:</strong> You'll be based at our vibrant ${data.workLocation} location, with a flexible <strong>${data.remotePolicy.toLowerCase()}</strong> policy.</li>
                        ${data.workHours ? `<li><strong>Work-Life Balance:</strong> Enjoy standard work hours of ${data.workHours}.</li>` : ''}
                    </ul>

                    ${data.additionalTerms ? `<p><strong>Beyond the Basics:</strong> ${data.additionalTerms}</p>` : ''}

                    <p>We believe your unique talents and fresh perspective will significantly enrich our culture and drive our collective success. We can't wait to see the amazing things you'll achieve with us!</p>

                    <p class="closing-creative">Warmly,</p>
                    <div class="signature-creative">
                        <p><strong>[Hiring Manager Name/HR Department]</strong></p>
                        <p>[Title]</p>
                        <p>${data.companyName}</p>
                    </div>

                    <div class="acceptance-creative">
                        <p>Ready to embark on this journey? Please sign below to accept this exciting offer by [Acceptance Date - e.g., 7 days from today].</p>
                        <div class="signature-creative"></div>
                        <p><strong>${data.candidateName}</strong><br>
                        Date: _____________</p>
                    </div>
                </div>
            `;
            break;
    }

    return letterStyle + letterContent;
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

        doc.save(`${companyName ? companyName.replace(/\s/g, '-') + '-' : ''}offer-letter-${document.getElementById('candidateName').value.replace(/\s/g, '-')}.pdf`);
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
        link.download = `${companyName ? companyName.replace(/\s/g, '-') + '-' : ''}offer-letter-${document.getElementById('candidateName').value.replace(/\s/g, '-')}.png`;
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
