<?php
// SEO and Page Metadata
$page_title = "Excel to PDF Converter - Convert XLS/XLSX to PDF Online Free"; // You may Change the Title here
$page_description = "Convert Excel to PDF online for free. Transform XLS and XLSX spreadsheets into PDF documents. Preserve formatting, charts, and formulas. Fast and secure."; // Put your Description here
$page_keywords = "excel to pdf, pdf converter, convert pdf, free online pdf tools, pdf to word, pdf to excel, wordscompare";

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
            <div class="tool-container rounded-3 p-4 p-md-5">
                <header class="text-center mb-4">
                    <h1 class="h2">Excel to PDF Converter <i class="fas fa-file-pdf text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Effortlessly convert your Excel spreadsheets into high-quality, professional PDF documents.</p>
                </header>

                <div id="uploadArea" class="upload-area border-dashed bg-light rounded-3 p-5 text-center mb-4">
                    <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                    <h5 id="upload-heading">Drag & Drop Excel File Here</h5>
                    <p class="text-muted mb-3">or</p>
                    <input type="file" id="excelUpload" accept=".xls,.xlsx,.ods" class="d-none" multiple>
                    <button type="button" class="btn btn-danger" onclick="document.getElementById('excelUpload').click()">
                        <i class="fas fa-folder-open me-2"></i> Select Excel Files
                    </button>
                    <div id="fileInfo" class="mt-3 small text-muted">No file selected.</div>
                </div>

                <div class="options-card card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-cog me-2"></i>Conversion Options</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="sheetSelect" class="form-label">Select Sheet</label>
                                <select id="sheetSelect" class="form-select" disabled>
                                    <option value="" selected disabled>Load Excel first</option>
                                </select>
                            </div>
                             <div class="col-md-6">
                                <label for="pageSize" class="form-label">Page Size</label>
                                <select id="pageSize" class="form-select">
                                    <option value="A4" selected>A4</option>
                                    <option value="Letter">Letter</option>
                                    <option value="Legal">Legal</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="orientation" class="form-label">Orientation</label>
                                <select id="orientation" class="form-select">
                                    <option value="portrait" selected>Portrait</option>
                                    <option value="landscape">Landscape</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="addPageNumbers">
                                    <label class="form-check-label" for="addPageNumbers">
                                        Add page numbers to PDF
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="fitToPage" checked>
                                    <label class="form-check-label" for="fitToPage">
                                        Fit content to page width
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex justify-content-md-center mb-4">
                    <button class="btn btn-danger btn-md px-4" id="convertBtn" disabled>
                        <i class="fas fa-exchange-alt me-2"></i> Convert
                    </button>
                    <button class="btn btn-primary btn-md px-4" id="howToBtn">
                        <i class="fas fa-question-circle me-2"></i> How To
                    </button>
                    <button class="btn btn-secondary btn-md px-2" id="resetBtn">
                        <i class="fas fa-redo me-2"></i> Reset
                    </button>
                    <button class="btn btn-success btn-md px-2" id="downloadBtn" disabled>
                        <i class="fas fa-download me-2"></i> Download
                    </button>
                </div>

                <div id="statusArea" class="text-center"></div>

                <div class="preview-area card mt-4">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-table me-2"></i>Excel Data Preview</h5>
                        <span class="badge bg-info" id="rowCount"></span>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped mb-0" id="previewTable">
                                <thead>
                                    <tr>
                                        <th colspan="5" class="text-center text-muted p-4">Upload Excel to see preview.</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <div class="history-area card mt-4" id="historyContainer" style="display: none;">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-history me-2"></i>Conversion History (Last 10 Files)</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0" id="historyTable">
                                <thead>
                                    <tr>
                                        <th width="5%"></th>
                                        <th>File Name</th>
                                        <th>Date</th>
                                        <th>Format</th>
                                        <th width="15%" class="text-end">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="historyList"></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php include '../../includes/sharer.php'; ?>

<!-- Content -->
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 border shadow-sm">
            <article>
                <header class="mb-5 text-center">
                    <h2 class="display-5"><?php echo $page_title; ?></h2>
                    <p class="lead"><?php echo $page_description; ?></p>
                </header>
                <?php include '../../views/content/excel-to-pdf-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.3.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.14/jspdf.plugin.autotable.min.js"></script>
<script>
// JavaScript for Excel to PDF Converter
let files = [];
let workbook = null; // Stores the Excel workbook object
let currentSheetData = []; // Stores data of the currently selected sheet
let conversionHistory = JSON.parse(localStorage.getItem('excelConversionHistory')) || [];

// Initialize elements
const excelUpload = document.getElementById('excelUpload');
const uploadArea = document.getElementById('uploadArea');
const fileInfo = document.getElementById('fileInfo');
const convertBtn = document.getElementById('convertBtn');
const downloadBtn = document.getElementById('downloadBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const previewTable = document.getElementById('previewTable');
const statusArea = document.getElementById('statusArea');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');
const sheetSelect = document.getElementById('sheetSelect');
const rowCountSpan = document.getElementById('rowCount');

// Event Listeners
excelUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
convertBtn.addEventListener('click', convertExcelToPdf);
downloadBtn.addEventListener('click', downloadPdf);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);
sheetSelect.addEventListener('change', displaySelectedSheet);

// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to Excel to PDF Converter',
        html: `Follow these steps to convert your Excels:<br><br>
        <ol class="text-start">
            <li>Upload Excel files (.xlsx, .xls) by clicking "Select Excel Files" or dragging them into the drop zone.</li>
            <li>Select the desired sheet from the dropdown if your Excel has multiple sheets.</li>
            <li>Choose your desired page size, orientation, and other options.</li>
            <li>Click "Convert" to generate a professional PDF with high-fidelity formatting.</li>
            <li>Download your newly created, perfectly formatted PDF document.</li>
        </ol>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

// Reset Button
function resetAll() {
    files = [];
    workbook = null;
    currentSheetData = [];
    excelUpload.value = '';
    fileInfo.textContent = 'No file selected.';
    previewTable.innerHTML = '<thead><tr><th colspan="5" class="text-center text-muted p-4">Upload Excel to see preview.</th></tr></thead><tbody></tbody>';
    rowCountSpan.textContent = '';
    statusArea.textContent = '';
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    // Reset options
    sheetSelect.innerHTML = '<option value="" selected disabled>Load Excel first</option>';
    sheetSelect.disabled = true;
    document.getElementById('pageSize').value = 'A4';
    document.getElementById('orientation').value = 'portrait';
    document.getElementById('addPageNumbers').checked = false;
    document.getElementById('fitToPage').checked = true;
}

// Drag and Drop Handlers
function handleDragOver(event) {
    event.preventDefault();
    event.stopPropagation();
    uploadArea.classList.add('dragover');
}

function handleDragLeave(event) {
    event.preventDefault();
    event.stopPropagation();
    uploadArea.classList.remove('dragover');
}

function handleDrop(event) {
    event.preventDefault();
    event.stopPropagation();
    uploadArea.classList.remove('dragover');
    handleFiles(event.dataTransfer.files);
}

// File Selection Handler
function handleFileSelect(event) {
    handleFiles(event.target.files);
}

function handleFiles(selectedFiles) {
    if (selectedFiles.length === 0) return;

    files = Array.from(selectedFiles).filter(file => {
        const fileExtension = file.name.split('.').pop().toLowerCase();
        if (!['xls', 'xlsx', 'ods'].includes(fileExtension)) {
            showError('Please upload only Excel files (.xls, .xlsx, .ods).');
            return false;
        }
        if (file.size > 50 * 1024 * 1024) { // Max 50MB
            showError('Each file must be less than 50MB.');
            return false;
        }
        return true;
    });

    if (files.length > 0) {
        // We will process only the first file for now, consistent with previous behavior
        fileInfo.textContent = `${files[0].name} selected.`;
        showStatus('File ready for conversion. Reading Excel...', 'info');
        readExcelFile(files[0]);
        
        Swal.fire({
            title: 'File Added',
            text: `${files[0].name} has been selected for conversion.`,
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,  // Auto-close after 1 seconds
            timerProgressBar: true  // Show a progress bar
        });
    }
}

function readExcelFile(file) {
    const reader = new FileReader();
    reader.onload = function(e) {
        const data = new Uint8Array(e.target.result);
        workbook = XLSX.read(data, { type: 'array' });
        populateSheetDropdown(workbook.SheetNames);
        sheetSelect.disabled = false;
        // Automatically select the first sheet and display its preview
        if (workbook.SheetNames.length > 0) {
            sheetSelect.value = workbook.SheetNames[0];
            displaySelectedSheet();
        }
        showStatus('Excel file loaded. Select a sheet and click Convert.', 'success');
        convertBtn.disabled = false; // Enable convert button after file is loaded
    };
    reader.onerror = function(err) {
        showError(`Failed to read Excel file: ${err.message}`);
        Swal.fire({
            title: 'File Read Error',
            text: `Failed to read Excel file: ${err.message}`,
            icon: 'error',
            confirmButtonText: 'OK'
        });
        convertBtn.disabled = true;
        sheetSelect.disabled = true;
    };
    reader.readAsArrayBuffer(file);
}

function populateSheetDropdown(sheetNames) {
    sheetSelect.innerHTML = '';
    sheetNames.forEach(sheetName => {
        const option = document.createElement('option');
        option.value = sheetName;
        option.textContent = sheetName;
        sheetSelect.appendChild(option);
    });
}

function displaySelectedSheet() {
    if (!workbook) return;

    const selectedSheetName = sheetSelect.value;
    const worksheet = workbook.Sheets[selectedSheetName];
    currentSheetData = XLSX.utils.sheet_to_json(worksheet, { header: 1 }); // Get data as array of arrays

    displayPreview(currentSheetData);
    showStatus(`Previewing sheet: ${selectedSheetName}`, 'info');
}

// Display Preview
function displayPreview(data) {
    const thead = previewTable.querySelector('thead');
    const tbody = previewTable.querySelector('tbody');
    thead.innerHTML = '';
    tbody.innerHTML = '';

    if (data && data.length > 0) {
        rowCountSpan.textContent = `Rows: ${data.length}`;
        const headerRow = data[0];
        const dataRows = data.slice(1);

        // Create header
        const headerTr = document.createElement('tr');
        headerRow.forEach(cell => {
            const th = document.createElement('th');
            th.textContent = cell;
            headerTr.appendChild(th);
        });
        thead.appendChild(headerTr);

        // Create body rows (limit to first 100 rows for preview performance)
        dataRows.slice(0, 100).forEach(row => {
            const tr = document.createElement('tr');
            row.forEach(cell => {
                const td = document.createElement('td');
                td.textContent = cell;
                tr.appendChild(td);
            });
            tbody.appendChild(tr);
        });
    } else {
        rowCountSpan.textContent = 'Rows: 0';
        thead.innerHTML = '<thead><tr><th colspan="5" class="text-center text-muted p-4">Upload Excel to see preview.</th></tr></thead>';
    }
}


// Global reference for the generated PDF blob to avoid regeneration
let currentPdfBlob = null;

// Convert Excel to PDF with Professional API & Local Fallback
async function convertExcelToPdf() {
    if (files.length === 0) {
        Swal.fire({ title: 'Error', text: 'Please upload an Excel file.', icon: 'error' });
        return;
    }

    const file = files[0];
    const pageSize = document.getElementById('pageSize').value;
    const orientation = document.getElementById('orientation').value;
    const addPageNumbers = document.getElementById('addPageNumbers').checked;
    const fitToPage = document.getElementById('fitToPage').checked;

    showStatus('Converting Excel to Professional PDF...', 'info');
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    const swalInstance = Swal.fire({
        title: 'High-Fidelity PDF Generation',
        html: 'Rendering spreadsheet layouts and styles with professional accuracy...',
        timerProgressBar: true,
        didOpen: () => Swal.showLoading()
    });

    try {
        let resultBlob;
        let conversionMethod = 'api-fidelity';

        // ── PATH A: PROFESSIONAL API (FIDELITY-FIRST) ──────────────────
        try {
            const formData = new FormData();
            formData.append('File', file);
            formData.append('StoreFile', 'true');
            
            const fileExtension = file.name.split('.').pop().toLowerCase();
            const selectedSheet = sheetSelect.value;
            
            // API Parameters for High Fidelity
            formData.append('PageSize', pageSize);
            formData.append('PageOrientation', orientation);
            
            if (selectedSheet) {
                formData.append('WorksheetName', selectedSheet);
            }
            
            if (fitToPage) {
                // Some ConvertAPI engines support auto-fitting
                formData.append('AutoColumnFit', 'true'); 
                formData.append('AutoPageFit', 'true');
            }
            
            // Set margins for professional look
            formData.append('MarginTop', '30');       
            formData.append('MarginLeft', '30');
            formData.append('MarginRight', '30');
            formData.append('MarginBottom', '30');

            const apiUrl = `https://v2.convertapi.com/convert/${fileExtension}/to/pdf?Secret=3AxumLNq9MGIgsdLYLAb1gNcvZirrSBX`;
            const response = await fetch(apiUrl, { method: 'POST', body: formData });
            const result = await response.json();

            if (response.ok && result.Files && result.Files.length > 0) {
                const dlResponse = await fetch(result.Files[0].Url);
                resultBlob = await dlResponse.blob();
                conversionMethod = 'api-fidelity';
            } else {
                throw new Error(result.Message || 'API Error');
            }
        } catch (apiErr) {
            console.warn('API Path failed, falling back to local:', apiErr.message);
            conversionMethod = 'layout-fallback';

            // Local Fallback using jsPDF-AutoTable
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF(orientation, 'pt', pageSize);

            let tableHeaders = currentSheetData[0] || [];
            let tableBody = currentSheetData.slice(1) || [];
            
            let autoTableOptions = {
                head: [tableHeaders],
                body: tableBody,
                startY: 40,
                styles: {
                    fontSize: 8,
                    cellPadding: 3,
                    valign: 'middle',
                    overflow: 'linebreak',
                },
                headStyles: {
                    fillColor: [220, 53, 69], // Bootstrap danger color
                    textColor: 255,
                    fontStyle: 'bold',
                    halign: 'center'
                },
                theme: 'striped',
                didDrawPage: function(data) {
                    if (addPageNumbers) {
                        let str = "Page " + doc.internal.getNumberOfPages();
                        doc.setFontSize(8);
                        doc.text(str, doc.internal.pageSize.width - data.settings.margin.right, doc.internal.pageSize.height - 10);
                    }
                }
            };

            if (fitToPage) {
                autoTableOptions.autoTableWidth = 'wrap';
            }
            
            doc.autoTable(autoTableOptions);
            resultBlob = doc.output('blob');
        }

        currentPdfBlob = resultBlob;
        const fileName = file.name.replace(/\.(xls|xlsx|ods)$/i, '.pdf');
        
        // Add to history
        addToHistory({
            fileName: fileName,
            date: new Date().toLocaleString(),
            format: 'pdf',
            data: currentSheetData.slice(0, 100), // Store partial data for preview
            options: {
                pageSize: pageSize,
                orientation: orientation,
                addPageNumbers: addPageNumbers,
                fitToPage: fitToPage,
                sheetName: sheetSelect.value,
                method: conversionMethod
            }
        });
        
        showStatus('Conversion complete! Click Download PDF.', 'success');
        convertBtn.disabled = false;
        downloadBtn.disabled = false;
        
        swalInstance.close();
        Swal.fire({
            title: 'Conversion Complete!',
            text: conversionMethod === 'api-fidelity' 
                ? 'Your Excel sheet has been converted with high-fidelity formatting.' 
                : 'Your Excel sheet has been converted using the standard layout engine.',
            icon: 'success',
            confirmButtonText: 'Great!',
            timer: 1500,
            timerProgressBar: true
        });
        
    } catch (error) {
        showError(`Error during PDF generation: ${error.message}`);
        convertBtn.disabled = false;
        downloadBtn.disabled = true;
        
        swalInstance.close();
        Swal.fire({
            title: 'Conversion Error',
            text: error.message,
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }
}

// Download PDF
function downloadPdf() {
    if (!currentPdfBlob) {
        showError('No PDF to download. Please convert first.');
        Swal.fire({
            title: 'No Data',
            text: 'No PDF to download. Please convert first.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    const fileName = files[0].name.replace(/\.(xls|xlsx|ods)$/i, '.pdf');
    const url = URL.createObjectURL(currentPdfBlob);
    const a = document.createElement('a');
    a.href = url;
    a.download = fileName;
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    
    showStatus('PDF file downloaded!', 'success');
    Swal.fire({
        title: 'Download Complete',
        text: 'Your PDF file has been downloaded.',
        icon: 'success',
        confirmButtonText: 'OK',
        timer: 1000,
        timerProgressBar: true
    });
}

// History Functions
function addToHistory(item) {
    const historyItem = {
        id: Date.now(),
        fileName: item.fileName,
        date: item.date,
        format: item.format,
        data: item.data, // Store raw sheet data
        options: item.options // Store conversion options
    };

    conversionHistory.unshift(historyItem);
    if (conversionHistory.length > 10) {
        conversionHistory.pop();
    }

    localStorage.setItem('excelConversionHistory', JSON.stringify(conversionHistory));
    displayHistory();
}

function displayHistory() {
    if (conversionHistory.length === 0) {
        historyContainer.style.display = 'none';
        return;
    }

    historyList.innerHTML = '';
    conversionHistory.forEach(item => {
        const tr = document.createElement('tr');
        tr.innerHTML = `
            <td>
                <button class="btn btn-sm btn-outline-danger delete-history" data-id="${item.id}" title="Delete">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </td>
            <td>${item.fileName}</td>
            <td>${item.date}</td>
            <td>${item.format.toUpperCase()}</td>
            <td class="text-end">
                <button class="btn btn-sm btn-outline-primary download-history" data-id="${item.id}" title="Download">
                    <i class="fas fa-download"></i>
                </button>
                <button class="btn btn-sm btn-outline-secondary preview-history ms-1" data-id="${item.id}" title="Preview">
                    <i class="fas fa-eye"></i>
                </button>
            </td>
        `;
        historyList.appendChild(tr);
    });

    // Add event listeners for history actions
    document.querySelectorAll('.delete-history').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const id = parseInt(e.currentTarget.getAttribute('data-id'));
            deleteHistoryItem(id);
        });
    });

    document.querySelectorAll('.download-history').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const id = parseInt(e.currentTarget.getAttribute('data-id'));
            downloadHistoryItem(id);
        });
    });

    document.querySelectorAll('.preview-history').forEach(btn => {
        btn.addEventListener('click', (e) => {
            const id = parseInt(e.currentTarget.getAttribute('data-id'));
            previewHistoryItem(id);
        });
    });

    historyContainer.style.display = 'block';
}

function deleteHistoryItem(id) {
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Yes, delete it!'
    }).then((result) => {
        if (result.isConfirmed) {
            conversionHistory = conversionHistory.filter(item => item.id !== id);
            localStorage.setItem('excelConversionHistory', JSON.stringify(conversionHistory));
            displayHistory();
        }
    });
}

function downloadHistoryItem(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item) return;

    showStatus(`Downloading ${item.fileName}...`, 'info');
    
    // Show loading alert
    Swal.fire({
        title: 'Preparing Download',
        html: `Preparing ${item.fileName} for download...`,
        timer: 1000,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    setTimeout(() => {
        // For history items, we usually just regenerate using local logic if we don't store the blob
        // (Storing blobs in localStorage is not practical)
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF(item.options.orientation, 'pt', item.options.pageSize);

        let tableHeaders = item.data[0] || [];
        let tableBody = item.data.slice(1) || [];
        
        let autoTableOptions = {
            head: [tableHeaders],
            body: tableBody,
            startY: 40,
            styles: {
                fontSize: 8,
                cellPadding: 3,
                valign: 'middle',
                overflow: 'linebreak',
            },
            headStyles: {
                fillColor: [220, 53, 69], // Bootstrap danger color
                textColor: 255,
                fontStyle: 'bold',
                halign: 'center'
            },
            theme: 'striped',
            didDrawPage: function(data) {
                if (item.options.addPageNumbers) {
                    let str = "Page " + doc.internal.getNumberOfPages();
                    doc.setFontSize(8);
                    doc.text(str, doc.internal.pageSize.width - data.settings.margin.right, doc.internal.pageSize.height - 10);
                }
            }
        };

        if (item.options.fitToPage) {
            autoTableOptions.autoTableWidth = 'wrap';
        }
        
        doc.autoTable(autoTableOptions);
        
        doc.save(item.fileName);
        
        showStatus(`${item.fileName} downloaded!`, 'success');
        Swal.fire({
            title: 'Download Complete',
            text: `Your PDF file has been downloaded.`,
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });
    }, 1000);
}

function previewHistoryItem(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item) return;

    // Display the historical data in the preview table
    displayPreview(item.data); // Re-use displayPreview function
    showStatus(`Previewing ${item.fileName} (Sheet: ${item.options.sheetName})`, 'info');
    
    // Scroll to preview area
    previewTable.scrollIntoView({ behavior: 'smooth' });
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