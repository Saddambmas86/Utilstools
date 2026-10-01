<?php
// SEO and Page Metadata
$page_title = "SVG to PDF Converter - Convert Vector Graphics to PDF Online"; // You may Change the Title here
$page_description = "Convert SVG to PDF online for free. Transform scalable vector graphics into PDF documents. Preserve vector quality and design. Instant, secure, free conversion."; // Put your Description here
$page_keywords = "svg to pdf, pdf converter, convert pdf, free online pdf tools, pdf to word, pdf to excel, wordscompare";

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
                    <h1 class="h2">SVG to PDF Converter <i class="fas fa-file-pdf text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Transform your SVG vector graphics into high-quality, print-ready PDF documents.</p>
                </header>

                <div id="uploadArea" class="upload-area border-dashed bg-light rounded-3 p-5 text-center mb-4">
                    <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                    <h5 id="upload-heading">Drag & Drop SVG File Here</h5>
                    <p class="text-muted mb-3">or</p>
                    <input type="file" id="svgUpload" accept=".svg,image/svg+xml" class="d-none" multiple>
                    <button type="button" class="btn btn-danger" onclick="document.getElementById('svgUpload').click()">
                        <i class="fas fa-folder-open me-2"></i> Select SVG Files
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
                                <label for="imageQuality" class="form-label">Image Quality (DPI)</label>
                                <input type="number" id="imageQuality" class="form-control" value="300" min="72" max="600" step="10">
                                <small class="form-text text-muted">Higher DPI results in larger, but clearer PDFs.</small>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="centerImage" checked>
                                    <label class="form-check-label" for="centerImage">
                                        Center SVG on page
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
                        <h5 class="mb-0"><i class="fas fa-image me-2"></i>SVG Preview</h5>
                    </div>
                    <div class="card-body text-center d-flex align-items-center justify-content-center" style="min-height: 200px; background-color: #f8f9fa;">
                        <img id="svgPreviewImage" class="img-fluid" style="max-height: 180px; width: auto; display: none;" loading="lazy" alt="SVG Preview">
                        <p id="noPreviewText" class="text-muted">Upload SVG to see preview.</p>
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
                <?php include '../../views/content/svg-to-pdf-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://unpkg.com/canvg@3.0.10/lib/umd.js"></script>
<script>
// JavaScript for SVG to PDF Converter
let files = [];
let svgContent = null; // Store SVG content as string
let conversionHistory = JSON.parse(localStorage.getItem('svgConversionHistory')) || [];

// Initialize elements
const svgUpload = document.getElementById('svgUpload');
const uploadArea = document.getElementById('uploadArea');
const fileInfo = document.getElementById('fileInfo');
const convertBtn = document.getElementById('convertBtn');
const downloadBtn = document.getElementById('downloadBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const statusArea = document.getElementById('statusArea');
const svgPreviewImage = document.getElementById('svgPreviewImage');
const noPreviewText = document.getElementById('noPreviewText');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');


// Event Listeners
svgUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
convertBtn.addEventListener('click', convertSvgToPdf);
downloadBtn.addEventListener('click', downloadPdf);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);

// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to SVG to PDF Converter',
        html: `Follow these steps to convert your SVGs:<br><br>
        <ol class="text-start">
            <li>Upload SVG by clicking "Select SVG Files" or dragging it into the drop zone.</li>
            <li>Choose your desired page size, orientation, and image quality (DPI).</li>
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
    svgContent = null;
    svgUpload.value = '';
    fileInfo.textContent = 'No file selected.';
    svgPreviewImage.style.display = 'none';
    noPreviewText.style.display = 'block';
    statusArea.textContent = '';
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    // Reset conversion options
    document.getElementById('pageSize').value = 'A4';
    document.getElementById('orientation').value = 'portrait';
    document.getElementById('imageQuality').value = '300';
    document.getElementById('centerImage').checked = true;
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
        if (file.type !== 'image/svg+xml' && !file.name.endsWith('.svg')) {
            showError('Please upload only SVG files.');
            return false;
        }
        if (file.size > 5 * 1024 * 1024) { // Max 5MB for SVG
            showError('Each file must be less than 5MB.');
            return false;
        }
        return true;
    });

    if (files.length > 0) {
        // We will process only the first file for now
        fileInfo.textContent = `${files[0].name} selected.`;
        readSvgFile(files[0]);
        showStatus('File ready for conversion. Previewing...', 'info');
        
        // Show success message
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

function readSvgFile(file) {
    const reader = new FileReader();
    reader.onload = function(e) {
        svgContent = e.target.result;
        displaySvgPreview(svgContent);
        convertBtn.disabled = false;
        showStatus('SVG preview loaded. Click Convert to create PDF.', 'success');
    };
    reader.onerror = function() {
        showError('Failed to read SVG file.');
        convertBtn.disabled = true;
        Swal.fire({
            title: 'File Read Error',
            text: 'Failed to read SVG file.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    };
    reader.readAsText(file);
}

// Display SVG Preview
function displaySvgPreview(svgString) {
    svgPreviewImage.src = 'data:image/svg+xml;base64,' + btoa(svgString);
    svgPreviewImage.style.display = 'block';
    noPreviewText.style.display = 'none';
}


// Convert SVG to PDF
async function convertSvgToPdf() {
    if (!svgContent) {
        showError('No SVG file loaded. Please upload a file first.');
        Swal.fire({
            title: 'Error',
            text: 'No SVG file loaded. Please upload a file first.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Converting SVG to PDF...', 'info');
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    // Show loading alert
    const swalInstance = Swal.fire({
        title: 'Creating PDF',
        html: 'Please wait while we generate your PDF document...',
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    try {
        const pageSize = document.getElementById('pageSize').value;
        const orientation = document.getElementById('orientation').value;
        const imageQualityDPI = parseInt(document.getElementById('imageQuality').value);
        const centerImage = document.getElementById('centerImage').checked;

        const { jsPDF } = window.jspdf;
        const doc = new jsPDF(orientation, 'pt', pageSize);

        // Calculate page dimensions in points (1 pt = 1/72 inch)
        // jsPDF's internal units are 'pt'
        const pageDimensions = doc.internal.pageSize;
        const pageWidth = pageDimensions.getWidth();
        const pageHeight = pageDimensions.getHeight();

        // Create a canvas to render SVG onto
        const canvas = document.createElement('canvas');
        document.body.appendChild(canvas); // Append temporarily to get dimensions

        // Use canvg to render SVG to canvas
        const ctx = canvas.getContext('2d');
        const v = canvg.Canvg.fromString(ctx, svgContent);
        await v.render();

        // Get SVG's natural dimensions from canvas
        let svgWidth = canvas.width;
        let svgHeight = canvas.height;

        if (svgWidth === 0 || svgHeight === 0) {
            // Fallback for SVGs without explicit width/height in SVG tag but have content
            // Try to infer from viewbox or apply a default reasonable size
            const tempImg = new Image();
            tempImg.src = 'data:image/svg+xml;base64,' + btoa(svgContent);
            await new Promise(resolve => tempImg.onload = resolve);
            svgWidth = tempImg.naturalWidth || 600; // Default if not found
            svgHeight = tempImg.naturalHeight || 400; // Default if not found
        }
        
        // Scale factor for image quality (DPI)
        const scaleFactor = imageQualityDPI / 72; // Convert DPI to points per pixel for rendering
        canvas.width = svgWidth * scaleFactor;
        canvas.height = svgHeight * scaleFactor;
        
        // Re-render SVG to scaled canvas for higher quality
        const v2 = canvg.Canvg.fromString(ctx, svgContent);
        v2.resize(canvas.width, canvas.height);
        await v2.render();

        const imgData = canvas.toDataURL('image/png', 1.0); // Convert canvas to PNG data URL

        // Calculate image dimensions for PDF to fit within page with margins
        const margin = 20; // pt
        const usableWidth = pageWidth - 2 * margin;
        const usableHeight = pageHeight - 2 * margin;

        let imgPdfWidth;
        let imgPdfHeight;

        // Calculate dimensions to fit image within usable page area
        const aspectRatio = svgWidth / svgHeight;
        if (usableWidth / usableHeight > aspectRatio) {
            // Page is wider than image, fit by height
            imgPdfHeight = usableHeight;
            imgPdfWidth = usableHeight * aspectRatio;
        } else {
            // Page is taller than image, fit by width
            imgPdfWidth = usableWidth;
            imgPdfHeight = usableWidth / aspectRatio;
        }

        let xOffset = margin;
        let yOffset = margin;

        if (centerImage) {
            xOffset = (pageWidth - imgPdfWidth) / 2;
            yOffset = (pageHeight - imgPdfHeight) / 2;
        }
        
        doc.addImage(imgData, 'PNG', xOffset, yOffset, imgPdfWidth, imgPdfHeight);
        
        document.body.removeChild(canvas); // Remove canvas from DOM

        // Save the PDF content temporarily
        const fileName = files[0].name.replace('.svg', '.pdf');
        
        // Add to history (store svgContent to regenerate PDF on download/preview)
        addToHistory({
            fileName: fileName,
            date: new Date().toLocaleString(),
            format: 'pdf',
            svgContent: svgContent, // Store the raw SVG content
            options: { // Store options needed for regeneration
                pageSize: pageSize,
                orientation: orientation,
                imageQualityDPI: imageQualityDPI,
                centerImage: centerImage
            }
        });
        
        showStatus('Conversion complete! Click Download PDF.', 'success');
        convertBtn.disabled = false;
        downloadBtn.disabled = false;
        
        swalInstance.close();
        Swal.fire({
            title: 'Conversion Complete!',
            text: 'Your SVG has been successfully converted to PDF.',
            icon: 'success',
            confirmButtonText: 'Great!',
            timer: 1000,  // Auto-close after 1 seconds
            timerProgressBar: true  // Show a progress bar
        });
        
    } catch (error) {
        // Clean up canvas if it was added
        const canvas = document.querySelector('canvas');
        if (canvas && canvas.parentNode) {
            canvas.parentNode.removeChild(canvas);
        }

        showError(`Error during PDF generation: ${error.message}. Please ensure your SVG is valid.`);
        convertBtn.disabled = false;
        downloadBtn.disabled = true;
        
        swalInstance.close();
        Swal.fire({
            title: 'Conversion Error',
            html: `Error during PDF generation: ${error.message}. Please ensure your SVG is valid.`,
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }
}

// Download PDF
function downloadPdf() {
    if (!svgContent) {
        showError('No PDF to download. Please convert first.');
        Swal.fire({
            title: 'No Data',
            text: 'No PDF to download. Please convert first.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Preparing PDF for download...', 'info');
    
    // Show loading alert
    Swal.fire({
        title: 'Preparing PDF File',
        html: `Please wait while we generate your PDF file...`,
        timer: 1500,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    setTimeout(async () => {
        try {
            // Regenerate PDF on download to ensure options are applied correctly
            const pageSize = document.getElementById('pageSize').value;
            const orientation = document.getElementById('orientation').value;
            const imageQualityDPI = parseInt(document.getElementById('imageQuality').value);
            const centerImage = document.getElementById('centerImage').checked;

            const { jsPDF } = window.jspdf;
            const doc = new jsPDF(orientation, 'pt', pageSize);

            const pageDimensions = doc.internal.pageSize;
            const pageWidth = pageDimensions.getWidth();
            const pageHeight = pageDimensions.getHeight();

            const canvas = document.createElement('canvas');
            // No need to append to document body for direct toDataURL
            const ctx = canvas.getContext('2d');
            const v = canvg.Canvg.fromString(ctx, svgContent);
            await v.render();

            let svgWidth = canvas.width;
            let svgHeight = canvas.height;

            if (svgWidth === 0 || svgHeight === 0) {
                const tempImg = new Image();
                tempImg.src = 'data:image/svg+xml;base64,' + btoa(svgContent);
                await new Promise(resolve => tempImg.onload = resolve);
                svgWidth = tempImg.naturalWidth || 600;
                svgHeight = tempImg.naturalHeight || 400;
            }

            const scaleFactor = imageQualityDPI / 72;
            canvas.width = svgWidth * scaleFactor;
            canvas.height = svgHeight * scaleFactor;
            
            const v2 = canvg.Canvg.fromString(ctx, svgContent);
            v2.resize(canvas.width, canvas.height);
            await v2.render();

            const imgData = canvas.toDataURL('image/png', 1.0);

            const margin = 20;
            const usableWidth = pageWidth - 2 * margin;
            const usableHeight = pageHeight - 2 * margin;

            let imgPdfWidth;
            let imgPdfHeight;

            const aspectRatio = svgWidth / svgHeight;
            if (usableWidth / usableHeight > aspectRatio) {
                imgPdfHeight = usableHeight;
                imgPdfWidth = usableHeight * aspectRatio;
            } else {
                imgPdfWidth = usableWidth;
                imgPdfHeight = usableWidth / aspectRatio;
            }

            let xOffset = margin;
            let yOffset = margin;

            if (centerImage) {
                xOffset = (pageWidth - imgPdfWidth) / 2;
                yOffset = (pageHeight - imgPdfHeight) / 2;
            }
            
            doc.addImage(imgData, 'PNG', xOffset, yOffset, imgPdfWidth, imgPdfHeight);
            
            const fileName = files[0].name.replace('.svg', '.pdf');
            doc.save(fileName);
            
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
            showError(`Error during PDF download generation: ${error.message}`);
            Swal.fire({
                title: 'Download Error',
                text: error.message,
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    }, 1500);
}

// History Functions
function addToHistory(item) {
    const historyItem = {
        id: Date.now(),
        fileName: item.fileName,
        date: item.date,
        format: item.format,
        svgContent: item.svgContent, // Store raw SVG content
        options: item.options // Store conversion options
    };

    conversionHistory.unshift(historyItem);
    if (conversionHistory.length > 10) {
        conversionHistory.pop();
    }

    localStorage.setItem('svgConversionHistory', JSON.stringify(conversionHistory));
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
            localStorage.setItem('svgConversionHistory', JSON.stringify(conversionHistory));
            displayHistory();
        }
    });
}

async function downloadHistoryItem(id) {
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

    setTimeout(async () => {
        try {
            // Regenerate PDF using stored data and options
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF(item.options.orientation, 'pt', item.options.pageSize);

            const pageDimensions = doc.internal.pageSize;
            const pageWidth = pageDimensions.getWidth();
            const pageHeight = pageDimensions.getHeight();

            const canvas = document.createElement('canvas');
            const ctx = canvas.getContext('2d');
            const v = canvg.Canvg.fromString(ctx, item.svgContent);
            await v.render();

            let svgWidth = canvas.width;
            let svgHeight = canvas.height;

            if (svgWidth === 0 || svgHeight === 0) {
                const tempImg = new Image();
                tempImg.src = 'data:image/svg+xml;base64,' + btoa(item.svgContent);
                await new Promise(resolve => tempImg.onload = resolve);
                svgWidth = tempImg.naturalWidth || 600;
                svgHeight = tempImg.naturalHeight || 400;
            }

            const scaleFactor = item.options.imageQualityDPI / 72;
            canvas.width = svgWidth * scaleFactor;
            canvas.height = svgHeight * scaleFactor;
            
            const v2 = canvg.Canvg.fromString(ctx, item.svgContent);
            v2.resize(canvas.width, canvas.height);
            await v2.render();

            const imgData = canvas.toDataURL('image/png', 1.0);

            const margin = 20;
            const usableWidth = pageWidth - 2 * margin;
            const usableHeight = pageHeight - 2 * margin;

            let imgPdfWidth;
            let imgPdfHeight;

            const aspectRatio = svgWidth / svgHeight;
            if (usableWidth / usableHeight > aspectRatio) {
                imgPdfHeight = usableHeight;
                imgPdfWidth = usableHeight * aspectRatio;
            } else {
                imgPdfWidth = usableWidth;
                imgPdfHeight = usableWidth / aspectRatio;
            }

            let xOffset = margin;
            let yOffset = margin;

            if (item.options.centerImage) {
                xOffset = (pageWidth - imgPdfWidth) / 2;
                yOffset = (pageHeight - imgPdfHeight) / 2;
            }
            
            doc.addImage(imgData, 'PNG', xOffset, yOffset, imgPdfWidth, imgPdfHeight);
            
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

        } catch (error) {
            showError(`Error during history PDF download: ${error.message}`);
            Swal.fire({
                title: 'Download Error',
                text: error.message,
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    }, 1500);
}

function previewHistoryItem(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item) return;

    svgContent = item.svgContent; // Load historical SVG content
    displaySvgPreview(svgContent);

    // Update options fields to reflect historical settings for user clarity
    document.getElementById('pageSize').value = item.options.pageSize || 'A4';
    document.getElementById('orientation').value = item.options.orientation || 'portrait';
    document.getElementById('imageQuality').value = item.options.imageQualityDPI || '300';
    document.getElementById('centerImage').checked = item.options.centerImage !== undefined ? item.options.centerImage : true;

    showStatus(`Previewing ${item.fileName}`, 'info');
    
    // Scroll to preview area
    svgPreviewImage.scrollIntoView({ behavior: 'smooth' });
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