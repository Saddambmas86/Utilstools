<?php
// SEO and Page Metadata
$page_title = "Add Watermark to PDF Online Free - WordsCompare"; // You may Change the Title here
$page_description = "Add text or image watermarks to PDF files online for free. Customize opacity, position, and font. Secure, instant, no software required."; // Put your Description here
$page_keywords = "add watermark to pdf, pdf converter, convert pdf, free online pdf tools, pdf to word, pdf to excel, wordscompare";

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
                    <h1 class="h2">Add Watermark to PDF <i class="fas fa-file-pdf text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Protect and brand your PDF documents by adding custom text or image watermarks.</p>
                </header>

                <div id="uploadArea" class="upload-area border-dashed bg-light rounded-3 p-5 text-center mb-4">
                    <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                    <h5 id="upload-heading">Drag & Drop PDF File Here</h5>
                    <p class="text-muted mb-3">or</p>
                    <input type="file" id="pdfUpload" accept=".pdf" class="d-none">
                    <button type="button" class="btn btn-danger" onclick="document.getElementById('pdfUpload').click()">
                        <i class="fas fa-folder-open me-2"></i> Select PDF File
                    </button>
                    <div id="fileInfo" class="mt-3 small text-muted">No file selected.</div>
                </div>

                <div class="options-card card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-cog me-2"></i>Watermark Options</h5>
                    </div>
                    <div class="card-body">
                        <ul class="nav nav-tabs mb-3" id="watermarkTypeTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="text-tab" data-bs-toggle="tab" data-bs-target="#text-watermark" type="button" role="tab" aria-controls="text-watermark" aria-selected="true">
                                    <i class="fas fa-font me-2"></i>Text Watermark
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-watermark" type="button" role="tab" aria-controls="image-watermark" aria-selected="false">
                                    <i class="fas fa-image me-2"></i>Image Watermark
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="watermarkTypeTabContent">
                            <div class="tab-pane fade show active" id="text-watermark" role="tabpanel" aria-labelledby="text-tab">
                                <div class="mb-3">
                                    <label for="watermarkText" class="form-label">Watermark Text</label>
                                    <input type="text" class="form-control" id="watermarkText" placeholder="Enter watermark text (e.g., CONFIDENTIAL)">
                                </div>
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="fontFamily" class="form-label">Font Family</label>
                                        <select id="fontFamily" class="form-select">
                                            <option value="Helvetica" selected>Helvetica</option>
                                            <option value="Times-Roman">Times-Roman</option>
                                            <option value="Courier">Courier</option>
                                            <option value="ZapfDingbats">ZapfDingbats</option>
                                            <option value="Symbol">Symbol</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="fontSize" class="form-label">Font Size</label>
                                        <input type="number" class="form-control" id="fontSize" value="48" min="8" max="100">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="fontColor" class="form-label">Font Color</label>
                                        <input type="color" class="form-control form-control-color" id="fontColor" value="#ff0000">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="opacity" class="form-label">Opacity (%)</label>
                                        <input type="number" class="form-control" id="opacity" value="15" min="0" max="100">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="rotation" class="form-label">Rotation (degrees)</label>
                                        <input type="number" class="form-control" id="rotation" value="-45" step="5" min="-180" max="180">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="position" class="form-label">Position</label>
                                        <select id="position" class="form-select">
                                            <option value="center" selected>Center</option>
                                            <option value="top-left">Top-Left</option>
                                            <option value="top-right">Top-Right</option>
                                            <option value="bottom-left">Bottom-Left</option>
                                            <option value="bottom-right">Bottom-Right</option>
                                            <option value="tile">Tile (Repeat)</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="allPagesCheck" checked>
                                            <label class="form-check-label" for="allPagesCheck">
                                                Apply to all pages
                                            </label>
                                        </div>
                                        <small class="text-muted">Uncheck to apply only to the first page.</small>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="image-watermark" role="tabpanel" aria-labelledby="image-tab">
                                <div class="mb-3">
                                    <label for="imageUpload" class="form-label">Select Watermark Image</label>
                                    <input type="file" class="form-control" id="imageUpload" accept="image/png,image/jpeg,image/gif">
                                    <small class="text-muted">Supported formats: PNG, JPG, GIF. Recommended: PNG with transparency.</small>
                                </div>
                                <div id="imagePreview" class="text-center mb-3">
                                    <img src="#" alt="Image Preview" class="img-thumbnail" loading="lazy" style="max-width: 200px; max-height: 200px; display: none;">
                                </div>
                                <div class="row g-3">
                                     <div class="col-md-6">
                                        <label for="imageOpacity" class="form-label">Opacity (%)</label>
                                        <input type="number" class="form-control" id="imageOpacity" value="20" min="0" max="100">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="imageScale" class="form-label">Scale (%)</label>
                                        <input type="number" class="form-control" id="imageScale" value="50" min="10" max="200">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="imageRotation" class="form-label">Rotation (degrees)</label>
                                        <input type="number" class="form-control" id="imageRotation" value="0" step="5" min="-180" max="180">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="imagePosition" class="form-label">Position</label>
                                        <select id="imagePosition" class="form-select">
                                            <option value="center" selected>Center</option>
                                            <option value="top-left">Top-Left</option>
                                            <option value="top-right">Top-Right</option>
                                            <option value="bottom-left">Bottom-Left</option>
                                            <option value="bottom-right">Bottom-Right</option>
                                        </select>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" id="imageAllPagesCheck" checked>
                                            <label class="form-check-label" for="imageAllPagesCheck">
                                                Apply to all pages
                                            </label>
                                        </div>
                                        <small class="text-muted">Uncheck to apply only to the first page.</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex justify-content-md-center mb-4">
                    <button class="btn btn-danger btn-md px-4" id="convertBtn" disabled>
                        <i class="fas fa-stamp me-2"></i> Add Watermark
                    </button>
                    <button class="btn btn-primary btn-md px-4" id="howToBtn">
                        <i class="fas fa-question-circle me-2"></i> How To
                    </button>
                    <button class="btn btn-secondary btn-md px-2" id="resetBtn">
                        <i class="fas fa-redo me-2"></i> Reset
                    </button>
                    <button class="btn btn-success btn-md px-2" id="downloadBtn" disabled>
                        <i class="fas fa-download me-2"></i> Download PDF
                    </button>
                </div>

                <div id="statusArea" class="text-center"></div>
                
                <div class="preview-area card mt-4">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-file-pdf me-2"></i>PDF Preview (First Page)</h5>
                    </div>
                    <div class="card-body p-0 d-flex justify-content-center align-items-center" style="min-height: 300px;">
                         <canvas id="pdfPreviewCanvas" class="img-fluid border"></canvas>
                         <div id="previewPlaceholder" class="text-muted p-4">Upload a PDF to see preview.</div>
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
                                        <th>Type</th>
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
                <?php include '../../views/content/add-watermark-to-pdf-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf-lib/1.17.1/pdf-lib.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fontkit/1.8.1/fontkit.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js"></script>
<script>
// Set workerSrc for pdf.js
pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js';

let originalPdfBytes = null;
let watermarkedPdfBlob = null;
let conversionHistory = JSON.parse(localStorage.getItem('watermarkConversionHistory')) || [];

// Element references
const pdfUpload = document.getElementById('pdfUpload');
const uploadArea = document.getElementById('uploadArea');
const fileInfo = document.getElementById('fileInfo');
const convertBtn = document.getElementById('convertBtn');
const downloadBtn = document.getElementById('downloadBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const statusArea = document.getElementById('statusArea');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');
const pdfPreviewCanvas = document.getElementById('pdfPreviewCanvas');
const previewPlaceholder = document.getElementById('previewPlaceholder');

// Text Watermark Options
const watermarkText = document.getElementById('watermarkText');
const fontFamily = document.getElementById('fontFamily');
const fontSize = document.getElementById('fontSize');
const fontColor = document.getElementById('fontColor');
const opacity = document.getElementById('opacity');
const rotation = document.getElementById('rotation');
const position = document.getElementById('position');
const allPagesCheck = document.getElementById('allPagesCheck');

// Image Watermark Options
const imageUpload = document.getElementById('imageUpload');
const imagePreview = document.getElementById('imagePreview').querySelector('img');
const imageOpacity = document.getElementById('imageOpacity');
const imageScale = document.getElementById('imageScale');
const imageRotation = document.getElementById('imageRotation');
const imagePosition = document.getElementById('imagePosition');
const imageAllPagesCheck = document.getElementById('imageAllPagesCheck');

let selectedWatermarkImage = null; // To store selected image file or base64

// Event Listeners
pdfUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
convertBtn.addEventListener('click', addWatermarkToPdf);
downloadBtn.addEventListener('click', downloadWatermarkedPdf);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);
imageUpload.addEventListener('change', handleImageUpload);

// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'How to Add a Watermark to your PDF',
        html: `Follow these simple steps:<br><br>
        <ol class="text-start">
            <li><strong>Upload your PDF:</strong> Drag and drop your PDF or click "Select PDF File".</li>
            <li><strong>Choose Watermark Type:</strong> Select either "Text Watermark" or "Image Watermark".</li>
            <li><strong>Customize:</strong> Adjust settings like text, font, color, opacity, position, or upload your image and set its properties.</li>
            <li><strong>Add Watermark:</strong> Click "Add Watermark". The processing happens in your browser.</li>
            <li><strong>Download:</strong> Once complete, click "Download PDF" to save your watermarked document.</li>
        </ol>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

// Reset Button
function resetAll() {
    originalPdfBytes = null;
    watermarkedPdfBlob = null;
    selectedWatermarkImage = null;
    pdfUpload.value = '';
    imageUpload.value = '';
    fileInfo.textContent = 'No file selected.';
    imagePreview.style.display = 'none';
    imagePreview.src = '#';
    statusArea.textContent = '';
    convertBtn.disabled = true;
    downloadBtn.disabled = true;
    
    // Reset Text Watermark options
    watermarkText.value = '';
    fontFamily.value = 'Helvetica';
    fontSize.value = '48';
    fontColor.value = '#ff0000';
    opacity.value = '15';
    rotation.value = '-45';
    position.value = 'center';
    allPagesCheck.checked = true;

    // Reset Image Watermark options
    imageOpacity.value = '20';
    imageScale.value = '50';
    imageRotation.value = '0';
    imagePosition.value = 'center';
    imageAllPagesCheck.checked = true;

    // Reset preview
    const canvasContext = pdfPreviewCanvas.getContext('2d');
    canvasContext.clearRect(0, 0, pdfPreviewCanvas.width, pdfPreviewCanvas.height);
    pdfPreviewCanvas.style.display = 'none';
    previewPlaceholder.style.display = 'block';
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

async function handleDrop(event) {
    event.preventDefault();
    event.stopPropagation();
    uploadArea.classList.remove('dragover');
    await handleFiles(event.dataTransfer.files);
}

// File Selection Handler
async function handleFileSelect(event) {
    await handleFiles(event.target.files);
}

async function handleFiles(selectedFiles) {
    if (selectedFiles.length === 0) return;

    const file = selectedFiles[0];

    if (file.type !== 'application/pdf') {
        showError('Please upload a PDF file.');
        Swal.fire({
            title: 'Invalid File Type',
            text: 'Please upload only PDF files.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }
    if (file.size > 50 * 1024 * 1024) { // Max 50MB
        showError('File must be less than 50MB.');
        Swal.fire({
            title: 'File Too Large',
            text: 'The PDF file must be less than 50MB.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    fileInfo.textContent = `${file.name} selected.`;
    showStatus('PDF file loaded. Configure watermark options and click "Add Watermark".', 'info');
    convertBtn.disabled = false;
    downloadBtn.disabled = true;

    const reader = new FileReader();
    reader.onload = async (e) => {
        originalPdfBytes = new Uint8Array(e.target.result);
        await renderPdfPreview(originalPdfBytes);
        Swal.fire({
            title: 'File Loaded',
            text: `${file.name} has been loaded.`,
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });
    };
    reader.onerror = () => {
        showError('Failed to read PDF file.');
        convertBtn.disabled = true;
        Swal.fire({
            title: 'Error',
            text: 'Failed to read PDF file.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    };
    reader.readAsArrayBuffer(file);
}

// Handle Image Watermark Upload
function handleImageUpload(event) {
    const file = event.target.files[0];
    if (!file) {
        selectedWatermarkImage = null;
        imagePreview.style.display = 'none';
        imagePreview.src = '#';
        return;
    }

    if (!file.type.startsWith('image/')) {
        showError('Please upload an image file (PNG, JPG, GIF).');
        Swal.fire({
            title: 'Invalid Image Type',
            text: 'Please upload an image file (PNG, JPG, GIF).',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        selectedWatermarkImage = null;
        imageUpload.value = '';
        imagePreview.style.display = 'none';
        imagePreview.src = '#';
        return;
    }

    const reader = new FileReader();
    reader.onload = (e) => {
        selectedWatermarkImage = e.target.result; // Store as base64 data URL
        imagePreview.src = selectedWatermarkImage;
        imagePreview.style.display = 'block';
    };
    reader.onerror = () => {
        showError('Failed to read image file.');
        selectedWatermarkImage = null;
        imageUpload.value = '';
        imagePreview.style.display = 'none';
        imagePreview.src = '#';
        Swal.fire({
            title: 'Error',
            text: 'Failed to read image file.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
    };
    reader.readAsDataURL(file);
}


// Render PDF Preview (first page)
async function renderPdfPreview(pdfBytes) {
    if (!pdfBytes) {
        pdfPreviewCanvas.style.display = 'none';
        previewPlaceholder.style.display = 'block';
        return;
    }

    try {
        const loadingTask = pdfjsLib.getDocument({ data: pdfBytes });
        const pdf = await loadingTask.promise;
        const page = await pdf.getPage(1); // Get the first page

        const viewport = page.getViewport({ scale: 1 });
        const scaleToFit = pdfPreviewCanvas.clientWidth / viewport.width; // Scale to fit canvas width
        const scaledViewport = page.getViewport({ scale: scaleToFit });

        pdfPreviewCanvas.height = scaledViewport.height;
        pdfPreviewCanvas.width = scaledViewport.width;

        const renderContext = {
            canvasContext: pdfPreviewCanvas.getContext('2d'),
            viewport: scaledViewport
        };
        await page.render(renderContext).promise;
        pdfPreviewCanvas.style.display = 'block';
        previewPlaceholder.style.display = 'none';
    } catch (error) {
        console.error('Error rendering PDF preview:', error);
        showError('Failed to render PDF preview.');
        pdfPreviewCanvas.style.display = 'none';
        previewPlaceholder.style.display = 'block';
    }
}


// Add Watermark to PDF
async function addWatermarkToPdf() {
    if (!originalPdfBytes) {
        showError('Please upload a PDF file first.');
        Swal.fire({
            title: 'Error',
            text: 'Please upload a PDF file first.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Adding watermark...', 'info');
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    const swalInstance = Swal.fire({
        title: 'Applying Watermark',
        html: 'Please wait while your PDF is being watermarked...',
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    try {
        const { PDFDocument, rgb, StandardFonts } = PDFLib;
        const pdfDoc = await PDFDocument.load(originalPdfBytes);
        const pages = pdfDoc.getPages();

        const currentTab = document.querySelector('#watermarkTypeTab .nav-link.active').id;

        if (currentTab === 'text-tab') {
            const text = watermarkText.value.trim();
            if (!text) {
                throw new Error('Please enter text for the watermark.');
            }

            const selectedFont = fontFamily.value;
            let font;
            if (selectedFont === 'Helvetica') font = await pdfDoc.embedFont(StandardFonts.Helvetica);
            else if (selectedFont === 'Times-Roman') font = await pdfDoc.embedFont(StandardFonts.TimesRoman);
            else if (selectedFont === 'Courier') font = await pdfDoc.embedFont(StandardFonts.Courier);
            else if (selectedFont === 'ZapfDingbats') font = await pdfDoc.embedFont(StandardFonts.ZapfDingbats);
            else if (selectedFont === 'Symbol') font = await pdfDoc.embedFont(StandardFonts.Symbol);
            else font = await pdfDoc.embedFont(StandardFonts.Helvetica); // Default

            const size = parseFloat(fontSize.value);
            const color = hexToRgb(fontColor.value);
            const alpha = parseFloat(opacity.value) / 100;
            const rotationDegrees = parseFloat(rotation.value);
            const pos = position.value;
            const applyToAll = allPagesCheck.checked;

            for (let i = 0; i < pages.length; i++) {
                if (!applyToAll && i > 0) continue; // Apply only to first page if unchecked

                const page = pages[i];
                const { width, height } = page.getSize();
                const textWidth = font.widthOfTextAtSize(text, size);
                const textHeight = font.heightAtSize(size, { scale: 1 });

                let x, y;
                // Calculate position based on selection
                switch (pos) {
                    case 'top-left':
                        x = 50;
                        y = height - 50;
                        break;
                    case 'top-right':
                        x = width - textWidth - 50;
                        y = height - 50;
                        break;
                    case 'bottom-left':
                        x = 50;
                        y = 50 + textHeight;
                        break;
                    case 'bottom-right':
                        x = width - textWidth - 50;
                        y = 50 + textHeight;
                        break;
                    case 'center':
                        x = (width - textWidth) / 2;
                        y = (height - textHeight) / 2;
                        break;
                    case 'tile':
                        // Create a tile pattern
                        const gridSize = Math.max(textWidth, textHeight) * 1.5; // Spacing for tiles
                        for (let tileX = -width; tileX < width * 2; tileX += gridSize) {
                            for (let tileY = -height; tileY < height * 2; tileY += gridSize) {
                                page.drawText(text, {
                                    x: tileX + (Math.random() - 0.5) * (gridSize * 0.2), // Slight randomness for organic feel
                                    y: tileY + (Math.random() - 0.5) * (gridSize * 0.2),
                                    font,
                                    size,
                                    color: rgb(color.r, color.g, color.b),
                                    opacity: alpha,
                                    rotate: PDFLib.degrees(rotationDegrees),
                                    lineHeight: size * 1.2,
                                    wordSapcing: 0,
                                    // Optionally add `xSkew` and `ySkew` for more distortion
                                });
                            }
                        }
                        continue; // Skip the single drawText below for tile
                    default:
                        x = (width - textWidth) / 2;
                        y = (height - textHeight) / 2;
                }

                page.drawText(text, {
                    x,
                    y,
                    font,
                    size,
                    color: rgb(color.r, color.g, color.b),
                    opacity: alpha,
                    rotate: PDFLib.degrees(rotationDegrees),
                });
            }
        } else if (currentTab === 'image-tab') {
            if (!selectedWatermarkImage) {
                throw new Error('Please select an image for the watermark.');
            }

            let embedImage;
            const imageBytes = await fetch(selectedWatermarkImage).then(res => res.arrayBuffer());
            const imageType = selectedWatermarkImage.split(';')[0].split(':')[1];

            if (imageType === 'image/png') {
                embedImage = await pdfDoc.embedPng(imageBytes);
            } else if (imageType === 'image/jpeg') {
                embedImage = await pdfDoc.embedJpg(imageBytes);
            } else if (imageType === 'image/gif') {
                 // PDF-LIB doesn't directly support GIF embedding. Need to convert or find another library.
                 // For now, let's provide a fallback or error.
                 throw new Error('GIF image watermarks are not directly supported by PDF-LIB. Please use PNG or JPG.');
            } else {
                throw new Error('Unsupported image format for watermark. Please use PNG, JPG, or GIF.');
            }
           
            const imageDims = embedImage.scale(parseFloat(imageScale.value) / 100);
            const imgOpacity = parseFloat(imageOpacity.value) / 100;
            const imgRotationDegrees = parseFloat(imageRotation.value);
            const imgPos = imagePosition.value;
            const applyToAll = imageAllPagesCheck.checked;

            for (let i = 0; i < pages.length; i++) {
                if (!applyToAll && i > 0) continue;

                const page = pages[i];
                const { width, height } = page.getSize();

                let x, y;
                switch (imgPos) {
                    case 'top-left':
                        x = 50;
                        y = height - imageDims.height - 50;
                        break;
                    case 'top-right':
                        x = width - imageDims.width - 50;
                        y = height - imageDims.height - 50;
                        break;
                    case 'bottom-left':
                        x = 50;
                        y = 50;
                        break;
                    case 'bottom-right':
                        x = width - imageDims.width - 50;
                        y = 50;
                        break;
                    case 'center':
                    default:
                        x = (width - imageDims.width) / 2;
                        y = (height - imageDims.height) / 2;
                        break;
                }

                page.drawImage(embedImage, {
                    x,
                    y,
                    width: imageDims.width,
                    height: imageDims.height,
                    opacity: imgOpacity,
                    rotate: PDFLib.degrees(imgRotationDegrees)
                });
            }
        } else {
            throw new Error('No watermark type selected.');
        }

        const pdfBytes = await pdfDoc.save();
        watermarkedPdfBlob = new Blob([pdfBytes], { type: 'application/pdf' });
        
        const originalFileName = pdfUpload.files[0] ? pdfUpload.files[0].name : 'document.pdf';
        const watermarkedFileName = originalFileName.replace(/\.pdf$/, '_watermarked.pdf');

        // Add to history
        addToHistory({
            fileName: watermarkedFileName,
            date: new Date().toLocaleString(),
            type: currentTab === 'text-tab' ? 'Text Watermark' : 'Image Watermark',
            pdfBlob: watermarkedPdfBlob // Store the blob directly
        });

        showStatus('Watermark added successfully!', 'success');
        downloadBtn.disabled = false;
        
        swalInstance.close();
        Swal.fire({
            title: 'Watermark Applied!',
            text: 'Your PDF has been successfully watermarked.',
            icon: 'success',
            confirmButtonText: 'Great!',
            timer: 1500,
            timerProgressBar: true
        });

    } catch (error) {
        showError(`Error adding watermark: ${error.message}`);
        convertBtn.disabled = false;
        downloadBtn.disabled = true;
        
        swalInstance.close();
        Swal.fire({
            title: 'Watermark Error',
            text: error.message,
            icon: 'error',
            confirmButtonText: 'OK'
        });
        console.error(error);
    }
}

// Download Watermarked PDF
function downloadWatermarkedPdf() {
    if (!watermarkedPdfBlob) {
        showError('No watermarked PDF to download. Please add a watermark first.');
        Swal.fire({
            title: 'No PDF to Download',
            text: 'No watermarked PDF to download. Please add a watermark first.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    const originalFileName = pdfUpload.files[0] ? pdfUpload.files[0].name : 'document.pdf';
    const watermarkedFileName = originalFileName.replace(/\.pdf$/, '_watermarked.pdf');

    const url = URL.createObjectURL(watermarkedPdfBlob);
    const a = document.createElement('a');
    a.href = url;
    a.download = watermarkedFileName;
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    URL.revokeObjectURL(url); // Clean up
    
    showStatus('Watermarked PDF downloaded!', 'success');
    Swal.fire({
        title: 'Download Complete',
        text: 'Your watermarked PDF file has been downloaded.',
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
        type: item.type,
        pdfBlob: item.pdfBlob // Store the blob directly for easy re-download/preview
    };

    conversionHistory.unshift(historyItem);
    if (conversionHistory.length > 10) {
        conversionHistory.pop();
    }

    localStorage.setItem('watermarkConversionHistory', JSON.stringify(conversionHistory.map(item => {
        // Convert Blob to Base64 for localStorage storage.
        // NOTE: This can be very large and impact performance/storage.
        // For large files, consider only storing metadata and re-processing
        // or using IndexedDB. For this example, we'll use Base64 for simplicity.
        return new Promise(resolve => {
            const reader = new FileReader();
            reader.onloadend = () => resolve({
                ...item,
                pdfBlob: reader.result // Store as Base64 string
            });
            reader.readAsDataURL(item.pdfBlob);
        });
    })));
    displayHistory();
}

// Re-fetch blobs from Base64 for display/download
async function getHistoryItemBlob(item) {
    return new Promise((resolve) => {
        if (typeof item.pdfBlob === 'string' && item.pdfBlob.startsWith('data:application/pdf;base64,')) {
            fetch(item.pdfBlob)
                .then(res => res.blob())
                .then(blob => resolve(blob))
                .catch(err => {
                    console.error("Error converting base64 to blob:", err);
                    resolve(null); // Resolve with null on error
                });
        } else {
            resolve(item.pdfBlob); // Already a blob or unexpected type
        }
    });
}


async function displayHistory() {
    if (conversionHistory.length === 0) {
        historyContainer.style.display = 'none';
        return;
    }

    // Wait for all blobs to be converted from base64 if necessary
    const processedHistory = await Promise.all(conversionHistory.map(async item => {
        if (typeof item.pdfBlob === 'string' && item.pdfBlob.startsWith('data:application/pdf;base64,')) {
            // Need to convert Base64 back to Blob for actual use
            const blob = await fetch(item.pdfBlob).then(res => res.blob());
            return { ...item, pdfBlob: blob };
        }
        return item; // Already a blob or not a base64 string
    }));
    conversionHistory = processedHistory; // Update global history with actual blobs


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
            <td>${item.type}</td>
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
            localStorage.setItem('watermarkConversionHistory', JSON.stringify(conversionHistory.map(item => {
                // Convert Blob to Base64 for localStorage storage.
                // NOTE: This can be very large and impact performance/storage.
                // For large files, consider only storing metadata and re-processing
                // or using IndexedDB. For this example, we'll use Base64 for simplicity.
                return new Promise(resolve => {
                    const reader = new FileReader();
                    reader.onloadend = () => resolve({
                        ...item,
                        pdfBlob: reader.result // Store as Base64 string
                    });
                    reader.readAsDataURL(item.pdfBlob);
                });
            })));
            displayHistory();
            Swal.fire({
                title: 'Deleted!',
                text: 'Your file has been deleted from history.',
                icon: 'success',
                timer: 1000,
                timerProgressBar: true
            });
        }
    });
}

async function downloadHistoryItem(id) {
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
        const blob = await getHistoryItemBlob(item);
        if (blob) {
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = item.fileName;
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
            
            showStatus(`${item.fileName} downloaded!`, 'success');
            Swal.fire({
                title: 'Download Complete',
                text: `Your file has been downloaded.`,
                icon: 'success',
                confirmButtonText: 'OK',
                timer: 1000,
                timerProgressBar: true
            });
        } else {
            showError(`Failed to download ${item.fileName}.`);
            Swal.fire({
                title: 'Error',
                text: `Failed to download ${item.fileName}.`,
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    }, 1500);
}

async function previewHistoryItem(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item) return;

    showStatus(`Previewing ${item.fileName}...`, 'info');
    
    Swal.fire({
        title: 'Loading Preview',
        html: `Loading preview for ${item.fileName}...`,
        timer: 1500,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    setTimeout(async () => {
        const blob = await getHistoryItemBlob(item);
        if (blob) {
            const reader = new FileReader();
            reader.onload = async (e) => {
                await renderPdfPreview(new Uint8Array(e.target.result));
                showStatus(`Previewing ${item.fileName}`, 'info');
                pdfPreviewCanvas.scrollIntoView({ behavior: 'smooth' });
                Swal.fire({
                    title: 'Preview Loaded',
                    text: `Preview for ${item.fileName} is ready.`,
                    icon: 'success',
                    confirmButtonText: 'OK',
                    timer: 1000,
                    timerProgressBar: true
                });
            };
            reader.onerror = () => {
                showError('Failed to preview history item.');
                Swal.fire({
                    title: 'Error',
                    text: 'Failed to preview history item.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            };
            reader.readAsArrayBuffer(blob);
        } else {
            showError(`Failed to load preview for ${item.fileName}.`);
            Swal.fire({
                title: 'Error',
                text: `Failed to load preview for ${item.fileName}.`,
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    }, 1500);
}


// Helper Functions
function showStatus(message, type) {
    statusArea.textContent = message;
    statusArea.className = `text-center text-${type}`;
}

function showError(message) {
    showStatus(message, 'danger');
}

function hexToRgb(hex) {
    const bigint = parseInt(hex.slice(1), 16);
    const r = (bigint >> 16) & 255;
    const g = (bigint >> 8) & 255;
    const b = bigint & 255;
    return { r: r / 255, g: g / 255, b: b / 255 }; // Return as 0-1 range for PDF-LIB
}
</script>

<?php include '../../includes/footer.php'; ?>