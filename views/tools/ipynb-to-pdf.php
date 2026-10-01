<?php
// SEO and Page Metadata
$page_title = "IPYNB to PDF - Convert Jupyter Notebook to PDF Online Free"; // You may Change the Title here
$page_description = "Convert IPYNB to PDF online for free. Transform Jupyter Notebook files into PDF documents. Preserve code cells, outputs, and markdown. Fast and secure."; // Put your Description here
$page_keywords = "ipynb to pdf, pdf converter, convert pdf, free online pdf tools, pdf to word, pdf to excel, wordscompare";

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
                    <h1 class="h2">IPYNB to PDF Converter <i class="fas fa-file-pdf text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Transform your Jupyter Notebooks into shareable and static PDF documents.</p>
                </header>

                <div id="uploadArea" class="upload-area border-dashed bg-light rounded-3 p-5 text-center mb-4">
                    <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                    <h5 id="upload-heading">Drag & Drop IPYNB File Here</h5>
                    <p class="text-muted mb-3">or</p>
                    <input type="file" id="ipynbUpload" accept=".ipynb" class="d-none" multiple>
                    <button type="button" class="btn btn-danger" onclick="document.getElementById('ipynbUpload').click()">
                        <i class="fas fa-folder-open me-2"></i> Select IPYNB Files
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
                                    <input class="form-check-input" type="checkbox" id="includeCode" checked>
                                    <label class="form-check-label" for="includeCode">
                                        Include Code Cells
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="includeOutput" checked>
                                    <label class="form-check-label" for="includeOutput">
                                        Include Cell Outputs
                                    </label>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="addPageNumbers">
                                    <label class="form-check-label" for="addPageNumbers">
                                        Add page numbers to PDF
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
                        <h5 class="mb-0"><i class="fas fa-file-alt me-2"></i>IPYNB Content Preview (Limited)</h5>
                        <span class="badge bg-info" id="cellCount"></span>
                    </div>
                    <div class="card-body p-0">
                        <div class="preview-content p-3" style="max-height: 300px; overflow-y: auto; background-color: #f8f9fa;">
                            <p class="text-center text-muted p-4">Upload IPYNB to see preview of first few cells.</p>
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
                <?php include '../../views/content/ipynb-to-pdf-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/dompurify@2.3.6/dist/purify.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script>
// JavaScript for IPYNB to PDF Converter
let files = [];
let parsedIpynbData = null; // Store the parsed JSON content of the IPYNB
let conversionHistory = JSON.parse(localStorage.getItem('ipynbConversionHistory')) || [];

// Initialize elements
const ipynbUpload = document.getElementById('ipynbUpload');
const uploadArea = document.getElementById('uploadArea');
const fileInfo = document.getElementById('fileInfo');
const convertBtn = document.getElementById('convertBtn');
const downloadBtn = document.getElementById('downloadBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const previewContent = document.querySelector('.preview-content');
const statusArea = document.getElementById('statusArea');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');
const cellCountSpan = document.getElementById('cellCount');

// Event Listeners
ipynbUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
convertBtn.addEventListener('click', convertIpynbToPdf);
downloadBtn.addEventListener('click', downloadPdf);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);

// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to IPYNB to PDF Converter',
        html: `Follow these steps to convert your Jupyter Notebooks:<br><br>
        <ol class="text-start">
            <li>Upload IPYNB files by clicking "Select IPYNB Files" or dragging them into the drop zone.</li>
            <li>Choose your desired page size, orientation, and include/exclude code/outputs.</li>
            <li>Click "Convert" to generate the PDF.</li>
            <li>Download your newly created PDF.</li>
        </ol>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

// Reset Button
function resetAll() {
    files = [];
    parsedIpynbData = null;
    generatedPdfDoc = null;
    generatedFileName = '';
    ipynbUpload.value = '';
    fileInfo.textContent = 'No file selected.';
    previewContent.innerHTML = '<p class="text-center text-muted p-4">Upload IPYNB to see preview of first few cells.</p>';
    cellCountSpan.textContent = '';
    statusArea.textContent = '';
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    // Reset conversion options
    document.getElementById('pageSize').value = 'A4';
    document.getElementById('orientation').value = 'portrait';
    document.getElementById('includeCode').checked = true;
    document.getElementById('includeOutput').checked = true;
    document.getElementById('addPageNumbers').checked = false;
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
        if (!file.name.endsWith('.ipynb')) {
            showError('Please upload only Jupyter Notebook (.ipynb) files.');
            return false;
        }
        if (file.size > 50 * 1024 * 1024) { // Max 50MB for IPYNB
            showError('Each file must be less than 50MB.');
            return false;
        }
        return true;
    });

    if (files.length > 0) {
        // Only process the first file for simplicity
        fileInfo.textContent = `${files[0].name} selected.`;
        readIpynbFile(files[0]);
        showStatus('File ready for conversion. Previewing...', 'info');
        
        Swal.fire({
            title: 'File Added',
            text: `${files[0].name} has been selected for conversion.`,
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });
    }
}

function readIpynbFile(file) {
    const reader = new FileReader();
    reader.onload = (e) => {
        try {
            parsedIpynbData = JSON.parse(e.target.result);
            displayIpynbPreview(parsedIpynbData);
            convertBtn.disabled = false;
            showStatus('IPYNB preview loaded. Click Convert to create PDF.', 'success');
        } catch (error) {
            showError(`Error parsing IPYNB file: ${error.message}`);
            convertBtn.disabled = true;
            Swal.fire({
                title: 'Parsing Error',
                text: `Error parsing IPYNB file: ${error.message}`,
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    };
    reader.onerror = () => {
        showError('Failed to read IPYNB file.');
        convertBtn.disabled = true;
        Swal.fire({
            title: 'File Read Error',
            text: 'Failed to read IPYNB file.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    };
    reader.readAsText(file);
}

// Display IPYNB Preview (limited)
function displayIpynbPreview(data) {
    previewContent.innerHTML = ''; // Clear previous content
    cellCountSpan.textContent = `Cells: ${data.cells ? data.cells.length : 0}`;

    if (!data || !data.cells || data.cells.length === 0) {
        previewContent.innerHTML = '<p class="text-center text-muted p-4">No content found in IPYNB file.</p>';
        return;
    }

    // Display first few cells for preview
    const cellsToPreview = Math.min(data.cells.length, 5); // Show max 5 cells
    for (let i = 0; i < cellsToPreview; i++) {
        const cell = data.cells[i];
        const cellDiv = document.createElement('div');
        cellDiv.classList.add('mb-3', 'p-2', 'border', 'rounded');

        if (cell.cell_type === 'markdown') {
            cellDiv.innerHTML = `<small class="text-muted">Markdown Cell:</small><hr class="my-1">` + DOMPurify.sanitize(marked.parse(cell.source.join('')));
        } else if (cell.cell_type === 'code') {
            cellDiv.innerHTML = `<small class="text-muted">Code Cell:</small><hr class="my-1">` + `<pre class="mb-0"><code>${DOMPurify.sanitize(cell.source.join(''))}</code></pre>`;
            if (cell.outputs && cell.outputs.length > 0) {
                cellDiv.innerHTML += `<small class="text-muted mt-2 d-block">Output:</small><hr class="my-1">`;
                cell.outputs.forEach(output => {
                    if (output.output_type === 'stream' && output.text) {
                        cellDiv.innerHTML += `<pre class="mb-0 text-success"><code>${DOMPurify.sanitize(output.text.join(''))}</code></pre>`;
                    } else if (output.output_type === 'execute_result' && output.data && output.data['text/plain']) {
                        cellDiv.innerHTML += `<pre class="mb-0 text-primary"><code>${DOMPurify.sanitize(output.data['text/plain'].join(''))}</code></pre>`;
                    } else if (output.output_type === 'display_data' && output.data && output.data['image/png']) {
                        cellDiv.innerHTML += `<img src="data:image/png;base64,${output.data['image/png']}" class="img-fluid my-2" loading="lazy" alt="Output Image">`;
                    }
                    // Add more output types as needed (e.g., text/html, image/jpeg, etc.)
                });
            }
        }
        previewContent.appendChild(cellDiv);
    }

    if (data.cells.length > cellsToPreview) {
        const moreDiv = document.createElement('div');
        moreDiv.classList.add('text-center', 'text-muted', 'mt-3');
        moreDiv.textContent = `...and ${data.cells.length - cellsToPreview} more cells.`;
        previewContent.appendChild(moreDiv);
    }
}


// Helper to sanitize text for PDF (handle special characters)
function sanitizeTextForPdf(text) {
    if (!text) return '';
    return String(text)
        .replace(/[\u2018\u2019\u201A\u201B]/g, "'")  // Various single quotes
        .replace(/[\u201C\u201D\u201E\u201F]/g, '"')  // Various double quotes
        .replace(/[\u2013\u2014\u2015]/g, '-')  // En dash, em dash, horizontal bar
        .replace(/[\u00A0\u2000-\u200A\u202F\u205F]/g, ' ')  // Various spaces
        .replace(/[\u200B-\u200D\uFEFF]/g, '')  // Zero-width characters
        .replace(/\u2026/g, '...')  // Ellipsis
        .replace(/\u00AD/g, '')  // Soft hyphen
        .replace(/[\u20AC]/g, 'EUR')  // Euro sign
        .replace(/[\u00A3]/g, 'GBP')  // Pound sign
        .replace(/[\u00A5]/g, 'JPY')  // Yen sign
        .replace(/[\u00A9]/g, '(C)')  // Copyright
        .replace(/[\u00AE]/g, '(R)')  // Registered trademark
        .replace(/[\u2122]/g, '(TM)') // Trademark
        .replace(/[^\x00-\x7F]/g, '?'); // Replace any other non-ASCII with ?
}

// Store generated PDF for download
let generatedPdfDoc = null;
let generatedFileName = '';

// Convert IPYNB to PDF
async function convertIpynbToPdf() {
    if (!parsedIpynbData) {
        showError('No IPYNB data to convert. Please upload a file first.');
        Swal.fire({
            title: 'Error',
            text: 'No IPYNB data to convert. Please upload a file first.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Converting IPYNB to PDF...', 'info');
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    const swalInstance = Swal.fire({
        title: 'Creating PDF',
        html: 'Please wait while we generate your PDF document from the notebook content...',
        timerProgressBar: true,
        allowOutsideClick: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    try {
        const pageSize = document.getElementById('pageSize').value;
        const orientation = document.getElementById('orientation').value;
        const includeCode = document.getElementById('includeCode').checked;
        const includeOutput = document.getElementById('includeOutput').checked;
        const addPageNumbers = document.getElementById('addPageNumbers').checked;

        const { jsPDF } = window.jspdf;
        const doc = new jsPDF(orientation, 'pt', pageSize);

        let yOffset = 40;
        const margin = 30; // Left/Right margin
        const pageWidth = doc.internal.pageSize.getWidth();
        const lineHeight = 12; // Base line height
        const codeFontSize = 8;
        const textFontSize = 10;
        const outputFontSize = 8;
        const maxTextWidth = pageWidth - (2 * margin);

        for (const cell of parsedIpynbData.cells) {
            // Check for new page needed
            if (yOffset + lineHeight > doc.internal.pageSize.getHeight() - margin) {
                doc.addPage();
                yOffset = margin;
            }

            if (cell.cell_type === 'markdown' && cell.source) {
                doc.setFontSize(textFontSize);
                doc.setTextColor(0, 0, 0); // Black for text
                const text = cell.source.join('');
                
                // Simple markdown to plain text conversion
                let plainText = text
                    .replace(/#{1,6}\s+/g, '') // Remove headers
                    .replace(/\*\*|__/g, '') // Remove bold/italic markers
                    .replace(/\*|_/g, '')
                    .replace(/`{3}[\s\S]*?`{3}/g, '[Code Block]') // Code blocks
                    .replace(/`([^`]+)`/g, '$1') // Inline code
                    .replace(/\[([^\]]+)\]\([^)]+\)/g, '$1') // Links
                    .replace(/!\[([^\]]*)\]\([^)]+\)/g, '[Image: $1]') // Images
                    .replace(/>\s*/g, '') // Blockquotes
                    .replace(/\n{3,}/g, '\n\n'); // Normalize newlines
                
                // Sanitize text for PDF
                plainText = sanitizeTextForPdf(plainText);
                
                const lines = doc.splitTextToSize(plainText, maxTextWidth);
                
                // Check if we need a new page
                const textHeight = lines.length * (textFontSize + 2);
                if (yOffset + textHeight > doc.internal.pageSize.getHeight() - margin) {
                    doc.addPage();
                    yOffset = margin;
                }
                
                doc.text(lines, margin, yOffset);
                yOffset += textHeight + 10;
                
            } else if (cell.cell_type === 'code') {
                if (includeCode && cell.source) {
                     // Add Code Cell label
                    doc.setFontSize(textFontSize - 2);
                    doc.setTextColor(100, 100, 100); // Gray for labels
                    doc.text("Code Cell:", margin, yOffset);
                    yOffset += lineHeight;

                    doc.setFontSize(codeFontSize);
                    doc.setTextColor(0, 0, 150); // Dark blue for code
                    const code = sanitizeTextForPdf(cell.source.join(''));
                    const splitCode = doc.splitTextToSize(code, maxTextWidth);
                    doc.text(splitCode, margin, yOffset);
                    yOffset += (splitCode.length * (codeFontSize + 2)); // Line height for code
                }

                if (includeOutput && cell.outputs && cell.outputs.length > 0) {
                    for (const output of cell.outputs) {
                        if (yOffset + lineHeight > doc.internal.pageSize.getHeight() - margin) {
                            doc.addPage();
                            yOffset = margin;
                        }

                        if (output.output_type === 'stream' && output.text) {
                            // Add Output label
                            doc.setFontSize(textFontSize - 2);
                            doc.setTextColor(100, 100, 100); // Gray for labels
                            doc.text("Output:", margin, yOffset);
                            yOffset += lineHeight;

                            doc.setFontSize(outputFontSize);
                            doc.setTextColor(0, 128, 0); // Green for stream output
                            const outputText = sanitizeTextForPdf(output.text.join(''));
                            const splitOutput = doc.splitTextToSize(outputText, maxTextWidth);
                            doc.text(splitOutput, margin, yOffset);
                            yOffset += (splitOutput.length * (outputFontSize + 2));
                        } else if (output.output_type === 'execute_result' && output.data) {
                            // Add Output label
                            doc.setFontSize(textFontSize - 2);
                            doc.setTextColor(100, 100, 100); // Gray for labels
                            doc.text("Output:", margin, yOffset);
                            yOffset += lineHeight;

                            if (output.data['text/plain']) {
                                doc.setFontSize(outputFontSize);
                                doc.setTextColor(0, 0, 200); // Blue for execute result text
                                const outputText = sanitizeTextForPdf(output.data['text/plain'].join(''));
                                const splitOutput = doc.splitTextToSize(outputText, maxTextWidth);
                                doc.text(splitOutput, margin, yOffset);
                                yOffset += (splitOutput.length * (outputFontSize + 2));
                            }
                            if (output.data['image/png']) {
                                // Add image
                                const imgData = 'data:image/png;base64,' + output.data['image/png'];
                                const imgProps = doc.getImageProperties(imgData);
                                const imgWidth = pageWidth - (2 * margin);
                                const imgHeight = (imgProps.height * imgWidth) / imgProps.width;

                                if (yOffset + imgHeight + 10 > doc.internal.pageSize.getHeight() - margin) {
                                    doc.addPage();
                                    yOffset = margin;
                                }
                                doc.addImage(imgData, 'PNG', margin, yOffset, imgWidth, imgHeight);
                                yOffset += imgHeight;
                            }
                            // Handle other output types like HTML, SVG if needed
                        }
                    }
                }
            }
            yOffset += 15; // Add some padding between cells
        }

        // Add page numbers
        if (addPageNumbers) {
            const pageCount = doc.internal.getNumberOfPages();
            for (let i = 1; i <= pageCount; i++) {
                doc.setPage(i);
                doc.setFontSize(8);
                doc.setTextColor(150, 150, 150); // Light gray for page numbers
                doc.text(`Page ${i} of ${pageCount}`, doc.internal.pageSize.width - margin, doc.internal.pageSize.height - 10, null, null, 'right');
            }
        }

        const fileName = files[0].name.replace('.ipynb', '.pdf');
        
        // Store generated PDF
        generatedPdfDoc = doc;
        generatedFileName = fileName;
        
        // Add to history
        addToHistory({
            fileName: fileName,
            date: new Date().toLocaleString(),
            format: 'pdf',
            data: parsedIpynbData,
            options: { 
                pageSize: pageSize,
                orientation: orientation,
                includeCode: includeCode,
                includeOutput: includeOutput,
                addPageNumbers: addPageNumbers
            }
        });
        
        showStatus('Conversion complete! Click Download PDF.', 'success');
        convertBtn.disabled = false;
        downloadBtn.disabled = false;
        
        swalInstance.close();
        Swal.fire({
            title: 'Conversion Complete!',
            text: 'Your Jupyter Notebook has been successfully converted to PDF.',
            icon: 'success',
            confirmButtonText: 'Great!',
            timer: 1000,
            timerProgressBar: true
        });
        
    } catch (error) {
        showError(`Error during PDF generation: ${error.message}`);
        convertBtn.disabled = false;
        downloadBtn.disabled = true;
        
        swalInstance.close();
        Swal.fire({
            title: 'Conversion Error',
            text: `An error occurred during PDF generation: ${error.message}`,
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }
}

// Download PDF
function downloadPdf() {
    if (!generatedPdfDoc) {
        showError('No PDF to download. Please convert first.');
        Swal.fire({
            title: 'No Data',
            text: 'No PDF to download. Please convert first.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Downloading PDF...', 'info');
    
    try {
        generatedPdfDoc.save(generatedFileName);
        
        showStatus('PDF file downloaded!', 'success');
        Swal.fire({
            title: 'Download Complete',
            text: 'Your PDF file has been downloaded.',
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });
    } catch (error) {
        console.error('Download Error:', error);
        showError(`Error downloading PDF: ${error.message}`);
        Swal.fire({
            title: 'Download Error',
            text: error.message,
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }
}


// History Functions
function addToHistory(item) {
    const historyItem = {
        id: Date.now(),
        fileName: item.fileName,
        date: item.date,
        format: item.format,
        data: item.data, 
        options: item.options 
    };

    conversionHistory.unshift(historyItem);
    if (conversionHistory.length > 10) {
        conversionHistory.pop();
    }

    localStorage.setItem('ipynbConversionHistory', JSON.stringify(conversionHistory));
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
            localStorage.setItem('ipynbConversionHistory', JSON.stringify(conversionHistory));
            displayHistory();
        }
    });
}

async function downloadHistoryItem(id) { // Make async to await doc.html
    const item = conversionHistory.find(item => item.id === id);
    if (!item) return;

    showStatus(`Downloading ${item.fileName}...`, 'info');
    
    Swal.fire({
        title: 'Preparing Download',
        html: `Preparing ${item.fileName} for download...`,
        timer: 1500,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    setTimeout(async () => {
        const { jsPDF } = window.jspdf;
        const doc = new jsPDF(item.options.orientation, 'pt', item.options.pageSize);

        let yOffset = 40;
        const margin = 30;
        const pageWidth = doc.internal.pageSize.getWidth();
        const lineHeight = 12;
        const codeFontSize = 8;
        const textFontSize = 10;
        const outputFontSize = 8;
        const maxTextWidth = pageWidth - (2 * margin);

        for (const cell of item.data.cells) {
            if (yOffset + lineHeight > doc.internal.pageSize.getHeight() - margin) {
                doc.addPage();
                yOffset = margin;
            }

            if (cell.cell_type === 'markdown' && cell.source) {
                doc.setFontSize(textFontSize);
                doc.setTextColor(0, 0, 0);
                const text = cell.source.join('');
                const htmlContent = DOMPurify.sanitize(marked.parse(text));

                await doc.html(htmlContent, {
                    startY: yOffset,
                    startX: margin,
                    html2canvas: {
                        scale: 0.7
                    },
                    callback: function(pdf) {
                        yOffset = pdf.lastAutoTable.finalY + 10 || pdf.internal.getCurrentPageInfo().pageContext.cursorY + 10;
                    },
                    width: maxTextWidth,
                    autoPaging: 'text',
                    margin: [yOffset, margin, margin, margin]
                });
            } else if (cell.cell_type === 'code') {
                if (item.options.includeCode && cell.source) {
                    doc.setFontSize(textFontSize - 2);
                    doc.setTextColor(100, 100, 100);
                    doc.text("Code Cell:", margin, yOffset);
                    yOffset += lineHeight;

                    doc.setFontSize(codeFontSize);
                    doc.setTextColor(0, 0, 150);
                    const code = cell.source.join('');
                    const splitCode = doc.splitTextToSize(code, maxTextWidth);
                    doc.text(splitCode, margin, yOffset);
                    yOffset += (splitCode.length * (codeFontSize + 2));
                }

                if (item.options.includeOutput && cell.outputs && cell.outputs.length > 0) {
                    for (const output of cell.outputs) {
                        if (yOffset + lineHeight > doc.internal.pageSize.getHeight() - margin) {
                            doc.addPage();
                            yOffset = margin;
                        }

                        if (output.output_type === 'stream' && output.text) {
                            doc.setFontSize(textFontSize - 2);
                            doc.setTextColor(100, 100, 100);
                            doc.text("Output:", margin, yOffset);
                            yOffset += lineHeight;

                            doc.setFontSize(outputFontSize);
                            doc.setTextColor(0, 128, 0);
                            const outputText = output.text.join('');
                            const splitOutput = doc.splitTextToSize(outputText, maxTextWidth);
                            doc.text(splitOutput, margin, yOffset);
                            yOffset += (splitOutput.length * (outputFontSize + 2));
                        } else if (output.output_type === 'execute_result' && output.data) {
                            doc.setFontSize(textFontSize - 2);
                            doc.setTextColor(100, 100, 100);
                            doc.text("Output:", margin, yOffset);
                            yOffset += lineHeight;

                            if (output.data['text/plain']) {
                                doc.setFontSize(outputFontSize);
                                doc.setTextColor(0, 0, 200);
                                const outputText = output.data['text/plain'].join('');
                                const splitOutput = doc.splitTextToSize(outputText, maxTextWidth);
                                doc.text(splitOutput, margin, yOffset);
                                yOffset += (splitOutput.length * (outputFontSize + 2));
                            }
                            if (output.data['image/png']) {
                                const imgData = 'data:image/png;base64,' + output.data['image/png'];
                                const imgProps = doc.getImageProperties(imgData);
                                const imgWidth = pageWidth - (2 * margin);
                                const imgHeight = (imgProps.height * imgWidth) / imgProps.width;

                                if (yOffset + imgHeight + 10 > doc.internal.pageSize.getHeight() - margin) {
                                    doc.addPage();
                                    yOffset = margin;
                                }
                                doc.addImage(imgData, 'PNG', margin, yOffset, imgWidth, imgHeight);
                                yOffset += imgHeight;
                            }
                        }
                    }
                }
            }
            yOffset += 15;
        }

        if (item.options.addPageNumbers) {
            const pageCount = doc.internal.getNumberOfPages();
            for (let i = 1; i <= pageCount; i++) {
                doc.setPage(i);
                doc.setFontSize(8);
                doc.setTextColor(150, 150, 150);
                doc.text(`Page ${i} of ${pageCount}`, doc.internal.pageSize.width - margin, doc.internal.pageSize.height - 10, null, null, 'right');
            }
        }
        
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
    }, 1500);
}

function previewHistoryItem(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item) return;

    // Display the historical IPYNB data in the preview area
    displayIpynbPreview(item.data);
    showStatus(`Previewing ${item.fileName}`, 'info');
    
    // Scroll to preview area
    previewContent.scrollIntoView({ behavior: 'smooth' });
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/marked/4.0.0/marked.min.js"></script>

<?php include '../../includes/footer.php'; ?>