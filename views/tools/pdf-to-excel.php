<?php
// SEO and Page Metadata
$page_title = "PDF to Excel Converter - Extract PDF Tables to XLS Online"; // You may Change the Title here
$page_description = "Convert PDF to Excel online for free. Extract tables from PDF into editable XLS/XLSX spreadsheets. Accurate data extraction with formatting preserved."; // Put your Description here
$page_keywords = "pdf to excel, pdf converter, convert pdf, free online pdf tools, pdf to word, pdf to excel, wordscompare";

// Include common header
include '../../includes/header.php';
?>

<!-- TOOL -->
<div class="container">
    <div class="row justify-content-center">
        
        <!-- Mobile Toggle Button (Visible only on mobile) -->
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


        <!-- Sidebar Column (Visible on all screens) -->
        <div class="col-lg-2">
            <div class="collapse d-lg-block h-100" id="toolsSidebar">
                <div class="card h-100">
                    <div class="card-body p-2">
                        <!-- Search Box -->
                        <input type="text" id="searchTools" class="form-control border-danger mb-3" placeholder="Search tools...">
                        
                        <!-- Tools List -->
                        <div class="list-group list-group-flush overflow-auto" style="max-height: calc(200vh - 150px);">
                            <div id="toolsList"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-7 border shadow-sm">
            <div class="tool-container rounded-3 p-4 p-md-5">
                <header class="text-center mb-4">
                    <h1 class="h2">PDF to Excel Converter <i class="fas fa-file-excel text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Extract data from PDF tables directly into a clean, editable Excel spreadsheet.</p>
                </header>

                <div id="uploadArea" class="upload-area border-dashed bg-light rounded-3 p-5 text-center mb-4">
                    <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                    <h5 id="upload-heading">Drag & Drop PDF File Here</h5>
                    <p class="text-muted mb-3">or</p>
                    <input type="file" id="pdfUpload" accept=".pdf,application/pdf" class="d-none" multiple>
                    <button type="button" class="btn btn-danger" onclick="document.getElementById('pdfUpload').click()">
                        <i class="fas fa-folder-open me-2"></i> Select PDF Files
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
                                <label for="pageRange" class="form-label">Page Range</label>
                                <input type="text" id="pageRange" class="form-control" placeholder="e.g. 1-3,5" value="1-">
                            </div>
                            <div class="col-md-6">
                                <label for="sheetName" class="form-label">Excel Sheet Name</label>
                                <input type="text" id="sheetName" class="form-control" placeholder="Sheet1" value="Sheet1">
                            </div>
                            <div class="col-md-6">
                                <label for="encoding" class="form-label">Encoding</label>
                                <select id="encoding" class="form-select">
                                    <option value="utf-8" selected>UTF-8 (Recommended)</option>
                                    <option value="windows-1252">Windows-1252</option>
                                    <option value="iso-8859-1">ISO-8859-1</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="outputFormat" class="form-label">Output Format</label>
                                <select id="outputFormat" class="form-select">
                                    <option value="xlsx" selected>Excel (XLSX)</option>
                                    <option value="csv">CSV</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="headerCheck" checked>
                                    <label class="form-check-label" for="headerCheck">
                                        First row of the table is the header
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="enableOCR">
                                    <label class="form-check-label" for="enableOCR">
                                        Enable OCR for scanned PDFs (experimental)
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex justify-content-md-center mb-4">
                    <button class="btn btn-success btn-md px-4" id="convertBtn" disabled>
                        <i class="fas fa-exchange-alt me-2"></i> Convert to Excel
                    </button>
                    <button class="btn btn-primary btn-md px-4" id="howToBtn">
                        <i class="fas fa-question-circle me-2"></i> How To
                    </button>
                    <button class="btn btn-secondary btn-md px-2" id="resetBtn">
                        <i class="fas fa-redo me-2"></i> Reset
                    </button>
                    <button class="btn btn-danger btn-md px-2" id="downloadBtn" disabled>
                        <i class="fas fa-download me-2"></i> Download
                    </button>
                </div>

                <div id="statusArea" class="text-center"></div>

                <div class="preview-area card mt-4">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-table me-2"></i>Excel Preview</h5>
                        <span class="badge bg-info" id="pageCount"></span>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped mb-0" id="previewTable">
                                <thead>
                                    <tr>
                                        <th colspan="5" class="text-center text-muted p-4">Preview will appear here after conversion.</th>
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

    <!-- Sticky sidebar -->
    <div class="col-lg-2 border shadow-sm sticky-top vh-100 p-3">
        
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
                <?php include '../../views/content/pdf-to-excel-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script>
// JavaScript for PDF to Excel Converter
let files = [];
let excelData = [];
let columnMappings = [];
let conversionHistory = JSON.parse(localStorage.getItem('pdfConversionHistory')) || [];

// Initialize PDF.js
pdfjsLib = window['pdfjs-dist/build/pdf'];
pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js';

// Initialize elements
const pdfUpload = document.getElementById('pdfUpload');
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

// Event Listeners
pdfUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
convertBtn.addEventListener('click', convertPDF);
downloadBtn.addEventListener('click', downloadFile);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);

// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to PDF to Excel Converter',
        html: `Follow these steps to convert your PDFs:<br><br>
        <ol class="text-start">
            <li>Upload PDFs by clicking "Select PDF Files" or dragging them into the drop zone.</li>
            <li>Choose your conversion options (page range, sheet name, etc.).</li>
            <li>Click "Convert to Excel" to process your file.</li>
            <li>Preview the extracted data in the table.</li>
            <li>Download your Excel file when ready.</li>
        </ol>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

// Reset Button
function resetAll() {
    files = [];
    excelData = [];
    columnMappings = [];
    pdfUpload.value = '';
    fileInfo.textContent = 'No file selected.';
    previewTable.innerHTML = '<thead><tr><th colspan="5" class="text-center text-muted p-4">Preview will appear here after conversion.</th></tr></thead><tbody></tbody>';
    statusArea.textContent = '';
    convertBtn.disabled = true;
    downloadBtn.disabled = true;
    
    // Reset options
    document.getElementById('pageRange').value = '1-';
    document.getElementById('sheetName').value = 'Sheet1';
    document.getElementById('encoding').value = 'utf-8';
    document.getElementById('outputFormat').value = 'xlsx';
    document.getElementById('headerCheck').checked = true;
    document.getElementById('enableOCR').checked = false;
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
        if (file.type !== 'application/pdf') {
            showError('Please upload only PDF files.');
            return false;
        }
        if (file.size > 50 * 1024 * 1024) {
            showError('Each file must be less than 50MB.');
            return false;
        }
        return true;
    });

    if (files.length > 0) {
        fileInfo.textContent = `${files.length} file(s) selected: ${files.map(f => f.name).join(', ')}`;
        convertBtn.disabled = false;
        showStatus('Files ready for conversion.', 'success');
        
        Swal.fire({
            title: 'Files Added',
            text: `${files.length} PDF file(s) have been selected for conversion.`,
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });
    }
}

// Convert PDF to Excel with Advanced Column Snapping and Layout Fidelity
async function convertPDF() {
    if (files.length === 0) {
        Swal.fire({ title: 'Error', text: 'Please upload at least one PDF file.', icon: 'error' });
        return;
    }

    const outputFormat = document.getElementById('outputFormat').value;
    const enableOCR = document.getElementById('enableOCR').checked;
    const pageRange = document.getElementById('pageRange').value;

    showStatus(`Extractive structural layout for ${outputFormat.toUpperCase()}...`, 'info');
    convertBtn.disabled = true;

    const swalInstance = Swal.fire({
        title: `High-Fidelity ${outputFormat.toUpperCase()} Extraction`,
        html: 'Preserving exact alignment and spacing...',
        timerProgressBar: true,
        didOpen: () => Swal.showLoading()
    });

    try {
        excelData = [];

        for (const file of files) {
            let resultBlob;
            let finalRows = [];
            let columnWidths = [];
            let fileName = file.name.replace(/\.pdf$/i, `.${outputFormat}`);
            let conversionMethod = 'api-fidelity';

            // ── PATH A: PROFESSIONAL API (FIDELITY-FIRST) ──────────────────
            try {
                const formData = new FormData();
                formData.append('File', file);
                formData.append('StoreFile', 'true');
                formData.append('SingleSheet', 'true');
                formData.append('IncludeFormatting', 'true');
                if (pageRange && pageRange !== '1-') formData.append('PageRange', pageRange);
                if (enableOCR) formData.append('Ocr', 'true');

                // Use XLSX as the high-fidelity source regardless of outputFormat
                const apiUrl = `https://v2.convertapi.com/convert/pdf/to/xlsx?Secret=3AxumLNq9MGIgsdLYLAb1gNcvZirrSBX`;
                const response = await fetch(apiUrl, { method: 'POST', body: formData });
                const result = await response.json();

                if (response.ok && result.Files && result.Files.length > 0) {
                    const dlResponse = await fetch(result.Files[0].Url);
                    const excelBlob = await dlResponse.blob();
                    
                    // Extract data from XLSX for preview and potential CSV conversion
                    const arrayBuffer = await excelBlob.arrayBuffer();
                    const wb = XLSX.read(arrayBuffer, { type: 'array' });
                    const ws = wb.Sheets[wb.SheetNames[0]];
                    finalRows = XLSX.utils.sheet_to_json(ws, { header: 1, defval: '' });

                    if (outputFormat === 'csv') {
                        const csvText = XLSX.utils.sheet_to_csv(ws);
                        resultBlob = new Blob([csvText], { type: 'text/csv' });
                    } else {
                        resultBlob = excelBlob;
                    }

                    if (finalRows.length < 3) throw new Error('API result too sparse.');
                    conversionMethod = 'api-fidelity';
                } else {
                    throw new Error(result.Message || 'API Error');
                }

            } catch (apiErr) {
                console.warn('API Fidelity Path failed, falling back to local:', apiErr.message);
                conversionMethod = 'layout-fidelity';
                
                const fileBuffer = await file.arrayBuffer();
                const pdfDoc = await pdfjsLib.getDocument({ data: fileBuffer }).promise;

                for (let p = 1; p <= pdfDoc.numPages; p++) {
                    const page = await pdfDoc.getPage(p);
                    const textContent = await page.getTextContent();
                    
                    const items = textContent.items.filter(item => item.str.trim() !== '').map(item => ({
                        x: item.transform[4],
                        y: item.transform[5],
                        text: item.str,
                        width: item.width || (item.str.length * 7),
                        isBold: item.fontName ? (item.fontName.toLowerCase().includes('bold') || item.fontName.toLowerCase().includes('black')) : false
                    }));

                    if (items.length === 0) continue;

                    // 1. Column Detection
                    const xSorted = items.map(it => Math.round(it.x)).sort((a, b) => a - b);
                    const columnSnaps = [];
                    let currentSnap = xSorted[0];
                    columnSnaps.push(currentSnap);
                    for (let i = 1; i < xSorted.length; i++) {
                        if (xSorted[i] - currentSnap > 12) { 
                            currentSnap = xSorted[i];
                            columnSnaps.push(currentSnap);
                        }
                    }

                    // 2. Column Widths
                    const pageCols = columnSnaps.map((snap, i) => {
                        const nextSnap = columnSnaps[i + 1] || (snap + 150);
                        return { wch: Math.max(5, (nextSnap - snap) / 6) };
                    });
                    if (pageCols.length > columnWidths.length) columnWidths = pageCols;

                    // 3. Row Grouping & Grid Mapping
                    items.sort((a, b) => b.y - a.y);
                    const lineGroups = [];
                    let currentLine = [items[0]];
                    for (let i = 1; i < items.length; i++) {
                        if (Math.abs(items[i].y - items[i-1].y) < 8) {
                            currentLine.push(items[i]);
                        } else {
                            lineGroups.push(currentLine);
                            currentLine = [items[i]];
                        }
                    }
                    lineGroups.push(currentLine);

                    let lastY = -1;
                    for (const line of lineGroups) {
                        const currentY = line[0].y;
                        if (lastY !== -1) {
                            const yGap = Math.abs(lastY - currentY);
                            if (yGap > 25) {
                                const emptyRows = Math.min(5, Math.floor(yGap / 20));
                                for (let r = 0; r < emptyRows; r++) finalRows.push([]);
                            }
                        }
                        lastY = currentY;

                        const row = new Array(columnSnaps.length).fill('');
                        for (const item of line) {
                            let snapIdx = 0;
                            let minDiff = Infinity;
                            for (let c = 0; c < columnSnaps.length; c++) {
                                const diff = Math.abs(item.x - columnSnaps[c]);
                                if (diff < minDiff) { minDiff = diff; snapIdx = c; }
                            }
                            row[snapIdx] += (row[snapIdx] ? ' ' : '') + item.text;
                        }
                        finalRows.push(row);
                    }
                }

                const wb = XLSX.utils.book_new();
                const ws = XLSX.utils.aoa_to_sheet(finalRows);
                ws['!cols'] = columnWidths;
                XLSX.utils.book_append_sheet(wb, ws, 'Sheet1');
                const wbout = XLSX.write(wb, { bookType: outputFormat === 'xlsx' ? 'xlsx' : 'csv', type: 'array' });
                resultBlob = new Blob([wbout], { type: outputFormat === 'xlsx' ? 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' : 'text/csv' });
            }

            excelData.push({
                name: fileName,
                data: finalRows.slice(0, 1000), 
                blobUrl: URL.createObjectURL(resultBlob),
                format: outputFormat,
                method: conversionMethod
            });
        }

        displayPreview(excelData[0].data);
        downloadBtn.disabled = false;

        const methodNote = excelData[0].method === 'local' ? ' (Full text extraction used)' : '';
        showStatus(`Conversion complete!${methodNote}`, 'success');

        addToHistory({
            fileName: excelData[0].name,
            date: new Date().toLocaleString(),
            format: outputFormat,
            data: excelData[0].data,
            blobUrl: excelData[0].blobUrl
        });

        swalInstance.close();
        Swal.fire({
            title: 'Conversion Complete!',
            text: `Your PDF has been converted to ${outputFormat.toUpperCase()}.`,
            icon: 'success',
            confirmButtonText: 'Great!',
            timer: 1500,
            timerProgressBar: true
        });

    } catch (error) {
        showError(`Error: ${error.message}`);
        convertBtn.disabled = false;
        swalInstance.close();
        Swal.fire({ title: 'Conversion Error', text: error.message, icon: 'error' });
    }
}

// RFC-4180 compliant CSV parser — handles quoted fields, embedded commas, bullet points, etc.
function parseCSV(text) {
    const rows = [];
    let row = [];
    let field = '';
    let inQuotes = false;
    let i = 0;

    // Normalize line endings
    text = text.replace(/\r\n/g, '\n').replace(/\r/g, '\n');

    while (i < text.length) {
        const ch = text[i];

        if (inQuotes) {
            if (ch === '"') {
                // Check for escaped quote ("")
                if (text[i + 1] === '"') {
                    field += '"';
                    i += 2;
                } else {
                    inQuotes = false;
                    i++;
                }
            } else {
                field += ch;
                i++;
            }
        } else {
            if (ch === '"') {
                inQuotes = true;
                i++;
            } else if (ch === ',') {
                row.push(field.trim());
                field = '';
                i++;
            } else if (ch === '\n') {
                row.push(field.trim());
                if (row.some(c => c !== '')) rows.push(row); // skip blank lines
                row = [];
                field = '';
                i++;
            } else {
                field += ch;
                i++;
            }
        }
    }

    // Push last field and row
    if (field.trim() || row.length > 0) {
        row.push(field.trim());
        if (row.some(c => c !== '')) rows.push(row);
    }

    return rows;
}

// Basic table extraction from PDF text content
function extractTablesFromText(textContent) {
    const items = textContent.items;
    const lines = {};
    
    // Group text items by their y-position (assuming same y = same line)
    for (const item of items) {
        const y = Math.round(item.transform[5]);
        if (!lines[y]) lines[y] = [];
        lines[y].push(item);
    }
    
    // Sort lines from top to bottom
    const sortedLines = Object.keys(lines)
        .sort((a, b) => b - a) // PDF y-coordinates are from bottom to top
        .map(y => lines[y]);
    
    // Sort items in each line from left to right
    for (const line of sortedLines) {
        line.sort((a, b) => a.transform[4] - b.transform[4]);
    }
    
    // Convert to table format (array of rows, each row is array of cells)
    const table = sortedLines.map(line => {
        return line.map(item => item.str);
    });
    
    return [table]; // Return array of tables (we're just returning one table here)
}

// Display Preview
function displayPreview(data) {
    const tbody = previewTable.querySelector('tbody');
    tbody.innerHTML = '';

    if (data && data.length > 0) {
        data.forEach((row, rowIndex) => {
            const tr = document.createElement('tr');
            row.forEach((cell, cellIndex) => {
                const td = document.createElement('td');
                td.textContent = cell;
                // Make header row cells editable
                if (rowIndex === 0 && document.getElementById('headerCheck').checked) {
                    const input = document.createElement('input');
                    input.type = 'text';
                    input.value = cell;
                    input.className = 'form-control form-control-sm';
                    input.addEventListener('change', (e) => {
                        columnMappings[0][cellIndex] = e.target.value;
                    });
                    td.innerHTML = '';
                    td.appendChild(input);
                }
                tr.appendChild(td);
            });
            tbody.appendChild(tr);
        });
    }
}

// Download File (handles both XLSX and CSV)
function downloadFile() {
    if (excelData.length === 0 || !excelData[0].blobUrl) {
        showError('No data to download. Please convert first.');
        Swal.fire({
            title: 'No Data',
            text: 'No data to download. Please convert first.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    const outputFormat = excelData[0].format || 'xlsx';
    
    // Show loading alert
    Swal.fire({
        title: `Preparing ${outputFormat.toUpperCase()} File`,
        html: `Please wait while we generate your ${outputFormat.toUpperCase()} file...`,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    const url = excelData[0].blobUrl;
    const a = document.createElement('a');
    a.href = url;
    a.download = excelData[0].name;
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    
    showStatus(`${outputFormat.toUpperCase()} file downloaded!`, 'success');
    
    Swal.fire({
        title: 'Download Complete',
        text: `Your ${outputFormat.toUpperCase()} file has been downloaded.`,
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
        data: item.data, // Minimal preview
        blobUrl: item.blobUrl // Actual file to download instantly
    };

    conversionHistory.unshift(historyItem);
    if (conversionHistory.length > 10) {
        conversionHistory.pop();
    }

    localStorage.setItem('pdfConversionHistory', JSON.stringify(conversionHistory));
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
            localStorage.setItem('pdfConversionHistory', JSON.stringify(conversionHistory));
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
        timer: 1500,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    setTimeout(() => {
        if (item.blobUrl) {
            const a = document.createElement('a');
            a.href = item.blobUrl;
            a.download = item.fileName;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        } else {
            showError('File data is no longer available. Please convert again.');
        }
        
        showStatus(`${item.fileName} downloaded!`, 'success');
        Swal.fire({
            title: 'Download Complete',
            text: `Your ${item.format.toUpperCase()} file has been downloaded.`,
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });
    }, 1500);
}

function previewHistoryItem(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item) return;

    // Clear existing preview
    const tbody = previewTable.querySelector('tbody');
    tbody.innerHTML = '';

    // Display the historical data in the preview table
    if (item.data && item.data.length > 0) {
        item.data.forEach((row, rowIndex) => {
            const tr = document.createElement('tr');
            row.forEach((cell, cellIndex) => {
                const td = document.createElement('td');
                td.textContent = cell;
                tr.appendChild(td);
            });
            tbody.appendChild(tr);
        });
    }

    showStatus(`Previewing ${item.fileName}`, 'info');
    
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