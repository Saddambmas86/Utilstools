<?php
// SEO and Page Metadata
$page_title = "PDF to JFIF Converter - Convert PDF Pages to JFIF Online Free"; // You may Change the Title here
$page_description = "Convert PDF to JFIF online for free. Transform PDF pages into JFIF image files instantly. High-quality output, adjustable resolution. No software needed."; // Put your Description here
$page_keywords = "pdf to jfif, pdf converter, convert pdf, free online pdf tools, pdf to word, pdf to excel, wordscompare";

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
                    <h1 class="h2">PDF to JFIF Converter <i class="fas fa-image text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Convert your PDF pages into high-quality JFIF (JPEG) image files.</p>
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
                        <h5 class="mb-0"><i class="fas fa-cog me-2"></i>Conversion Options</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="pageRange" class="form-label">Pages to Convert (e.g., 1-3,5)</label>
                                <input type="text" id="pageRange" class="form-control" placeholder="All pages (leave blank)">
                            </div>
                            <div class="col-md-6">
                                <label for="imageQuality" class="form-label">Image Quality (1-100)</label>
                                <input type="number" id="imageQuality" class="form-control" value="90" min="1" max="100">
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
                        <i class="fas fa-download me-2"></i> Download All (ZIP)
                    </button>
                </div>

                <div id="statusArea" class="text-center"></div>

                <div class="preview-area card mt-4" id="previewContainer" style="display: none;">
                    <div class="card-header bg-light d-flex justify-content-between align-items-center">
                        <h5 class="mb-0"><i class="fas fa-image me-2"></i>Image Preview (<span id="previewCount">0</span> JFIFs)</h5>
                    </div>
                    <div class="card-body p-3 d-flex flex-wrap justify-content-center align-items-center gap-3" id="imagePreviewGrid">
                        <p class="text-muted text-center w-100">No images converted yet.</p>
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
                <?php include '../../views/content/pdf-to-jfif-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
<script>
    // Set worker source for PDF.js
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js';
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>

<script>
// JavaScript for PDF to JFIF Converter
let pdfFile = null;
let convertedJfifBlobs = [];
let conversionHistory = JSON.parse(localStorage.getItem('jfifConversionHistory')) || [];

// Initialize elements
const pdfUpload = document.getElementById('pdfUpload');
const uploadArea = document.getElementById('uploadArea');
const fileInfo = document.getElementById('fileInfo');
const convertBtn = document.getElementById('convertBtn');
const downloadBtn = document.getElementById('downloadBtn');
const howToBtn = document.getElementById('howToBtn');
const resetBtn = document.getElementById('resetBtn');
const statusArea = document.getElementById('statusArea');
const imagePreviewGrid = document.getElementById('imagePreviewGrid');
const previewContainer = document.getElementById('previewContainer');
const previewCountSpan = document.getElementById('previewCount');
const historyContainer = document.getElementById('historyContainer');
const historyList = document.getElementById('historyList');

// Event Listeners
pdfUpload.addEventListener('change', handleFileSelect);
uploadArea.addEventListener('dragover', handleDragOver);
uploadArea.addEventListener('dragleave', handleDragLeave);
uploadArea.addEventListener('drop', handleDrop);
convertBtn.addEventListener('click', convertPdfToJfif);
downloadBtn.addEventListener('click', downloadJfifFiles);
howToBtn.addEventListener('click', showHowTo);
resetBtn.addEventListener('click', resetAll);

// Initialize history display
displayHistory();

// How To Button
function showHowTo() {
    Swal.fire({
        title: 'Welcome to PDF to JFIF Converter',
        html: `Follow these steps to convert your PDFs:<br><br>
        <ol class="text-start">
            <li>Upload a PDF file by clicking "Select PDF File" or dragging it into the drop zone.</li>
            <li>Specify the page range (optional, leave blank for all pages) and image quality.</li>
            <li>Click "Convert" to generate the JFIF image(s).</li>
            <li>Download your newly created JFIF images as a ZIP archive.</li>
        </ol>`,
        icon: 'info',
        confirmButtonText: 'Got it!',
        confirmButtonColor: '#0d6efd'
    });
}

// Reset Button
function resetAll() {
    pdfFile = null;
    convertedJfifBlobs = [];
    pdfUpload.value = '';
    fileInfo.textContent = 'No file selected.';
    imagePreviewGrid.innerHTML = '<p class="text-muted text-center w-100">No images converted yet.</p>';
    previewCountSpan.textContent = '0';
    previewContainer.style.display = 'none';
    statusArea.textContent = '';
    convertBtn.disabled = true;
    downloadBtn.disabled = true;

    // Reset conversion options
    document.getElementById('pageRange').value = '';
    document.getElementById('imageQuality').value = '90';
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

    const file = selectedFiles[0];

    if (file.type !== 'application/pdf') {
        showError('Please upload only PDF files.');
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

    pdfFile = file;
    fileInfo.textContent = `${file.name} selected.`;
    convertBtn.disabled = false;
    showStatus('PDF file ready for conversion.', 'info');
    
    // Show success message
    Swal.fire({
        title: 'File Added',
        text: `${file.name} has been selected for conversion.`,
        icon: 'success',
        confirmButtonText: 'OK',
        timer: 1000,  // Auto-close after 1 seconds
        timerProgressBar: true  // Show a progress bar
    });
}

async function convertPdfToJfif() {
    if (!pdfFile) {
        showError('No PDF file selected. Please upload a file first.');
        Swal.fire({
            title: 'Error',
            text: 'No PDF file selected. Please upload a file first.',
            icon: 'error',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Converting PDF to JFIF...', 'info');
    convertBtn.disabled = true;
    downloadBtn.disabled = true;
    imagePreviewGrid.innerHTML = '<p class="text-muted text-center w-100">Converting...</p>';
    previewCountSpan.textContent = '0';
    previewContainer.style.display = 'block';
    convertedJfifBlobs = [];

    const pageRangeInput = document.getElementById('pageRange').value;
    const imageQuality = parseFloat(document.getElementById('imageQuality').value) / 100;

    // Show loading alert
    const swalInstance = Swal.fire({
        title: 'Generating JFIF Images',
        html: 'Please wait while we convert your PDF pages...',
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    try {
        const fileReader = new FileReader();
        fileReader.readAsArrayBuffer(pdfFile);

        fileReader.onload = async () => {
            const pdfData = new Uint8Array(fileReader.result);
            const loadingTask = pdfjsLib.getDocument({ data: pdfData });
            const pdf = await loadingTask.promise;

            let pagesToConvert = [];
            if (pageRangeInput.trim() === '') {
                // All pages
                for (let i = 1; i <= pdf.numPages; i++) {
                    pagesToConvert.push(i);
                }
            } else {
                // Parse page range input (e.g., "1-3,5")
                const parts = pageRangeInput.split(',').map(s => s.trim());
                for (const part of parts) {
                    if (part.includes('-')) {
                        const [start, end] = part.split('-').map(Number);
                        for (let i = start; i <= end; i++) {
                            if (i >= 1 && i <= pdf.numPages) {
                                pagesToConvert.push(i);
                            }
                        }
                    } else {
                        const pageNum = Number(part);
                        if (pageNum >= 1 && pageNum <= pdf.numPages) {
                            pagesToConvert.push(pageNum);
                        }
                    }
                }
                pagesToConvert = [...new Set(pagesToConvert)].sort((a, b) => a - b); // Remove duplicates and sort
            }

            if (pagesToConvert.length === 0) {
                showError('No valid pages selected for conversion. Please check your page range input.');
                swalInstance.close();
                convertBtn.disabled = false;
                Swal.fire({
                    title: 'No Pages Selected',
                    text: 'No valid pages selected for conversion. Please check your page range input.',
                    icon: 'warning',
                    confirmButtonText: 'OK'
                });
                return;
            }

            imagePreviewGrid.innerHTML = ''; // Clear "Converting..." text
            let currentImageCount = 0;

            for (const pageNum of pagesToConvert) {
                const page = await pdf.getPage(pageNum);
                const viewport = page.getViewport({ scale: 1.5 }); // Adjust scale for better quality
                const canvas = document.createElement('canvas');
                const canvasContext = canvas.getContext('2d');
                canvas.height = viewport.height;
                canvas.width = viewport.width;

                await page.render({ canvasContext, viewport }).promise;

                // Convert canvas to JFIF (JPEG) Blob
                const jfifBlob = await new Promise(resolve => canvas.toBlob(resolve, 'image/jpeg', imageQuality));
                convertedJfifBlobs.push({ blob: jfifBlob, pageNum: pageNum });

                // Display preview thumbnail
                const imgUrl = URL.createObjectURL(jfifBlob);
                const imgWrapper = document.createElement('div');
                imgWrapper.className = 'col-auto text-center';
                imgWrapper.innerHTML = `
                    <img src="${imgUrl}" class="img-thumbnail" style="max-width: 150px; max-height: 150px; object-fit: contain;" loading="lazy" width="150" height="150" alt="Page ${pageNum}">
                    <p class="small text-muted mt-1 mb-0">Page ${pageNum}</p>
                `;
                imagePreviewGrid.appendChild(imgWrapper);
                currentImageCount++;
                previewCountSpan.textContent = currentImageCount;
            }

            if (convertedJfifBlobs.length > 0) {
                showStatus(`Conversion complete! Converted ${convertedJfifBlobs.length} page(s). Click Download All (ZIP).`, 'success');
                downloadBtn.disabled = false;
                
                // Add to history
                addToHistory({
                    fileName: pdfFile.name.replace('.pdf', ''),
                    date: new Date().toLocaleString(),
                    format: 'jfif',
                    blobs: convertedJfifBlobs.map(b => ({
                        dataUrl: URL.createObjectURL(b.blob), // Store URL, not blob directly for localStorage
                        pageNum: b.pageNum
                    })),
                    options: {
                        pageRange: pageRangeInput,
                        imageQuality: imageQuality * 100 // Store as 1-100 for display
                    }
                });
            } else {
                showError('No JFIF images were generated. Please check your PDF and options.');
                previewContainer.style.display = 'none';
            }
            
            swalInstance.close();
            Swal.fire({
                title: 'Conversion Complete!',
                text: `Successfully converted ${convertedJfifBlobs.length} page(s) to JFIF.`,
                icon: 'success',
                confirmButtonText: 'Awesome!',
                timer: 1500,
                timerProgressBar: true
            });
        };

        fileReader.onerror = () => {
            throw new Error('Failed to read PDF file.');
        };

    } catch (error) {
        showError(`Error during conversion: ${error.message}`);
        previewContainer.style.display = 'none';
        swalInstance.close();
        Swal.fire({
            title: 'Conversion Error',
            text: error.message,
            icon: 'error',
            confirmButtonText: 'OK'
        });
    } finally {
        convertBtn.disabled = false;
    }
}

async function downloadJfifFiles() {
    if (convertedJfifBlobs.length === 0) {
        showError('No JFIF images to download. Please convert a PDF first.');
        Swal.fire({
            title: 'No Data',
            text: 'No JFIF images to download. Please convert a PDF first.',
            icon: 'warning',
            confirmButtonText: 'OK'
        });
        return;
    }

    showStatus('Preparing ZIP for download...', 'info');
    downloadBtn.disabled = true;

    const zip = new JSZip();
    const baseFileName = pdfFile ? pdfFile.name.replace('.pdf', '') : 'converted_pdf';

    // Show loading alert
    const swalInstance = Swal.fire({
        title: 'Creating ZIP File',
        html: 'Please wait while we package your JFIF images...',
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    try {
        for (let i = 0; i < convertedJfifBlobs.length; i++) {
            const blobInfo = convertedJfifBlobs[i];
            const fileName = `${baseFileName}_page_${blobInfo.pageNum}.jfif`;
            zip.file(fileName, blobInfo.blob);
        }

        const zipBlob = await zip.generateAsync({ type: 'blob' });
        saveAs(zipBlob, `${baseFileName}_jfif.zip`);

        showStatus('ZIP file downloaded successfully!', 'success');
        swalInstance.close();
        Swal.fire({
            title: 'Download Complete',
            text: 'Your JFIF images have been downloaded as a ZIP file.',
            icon: 'success',
            confirmButtonText: 'Great!',
            timer: 1500,
            timerProgressBar: true
        });
    } catch (error) {
        showError(`Error creating ZIP: ${error.message}`);
        swalInstance.close();
        Swal.fire({
            title: 'Download Error',
            text: `Failed to create ZIP file: ${error.message}`,
            icon: 'error',
            confirmButtonText: 'OK'
        });
    } finally {
        downloadBtn.disabled = false;
    }
}


// History Functions
function addToHistory(item) {
    const historyItem = {
        id: Date.now(),
        fileName: item.fileName,
        date: item.date,
        format: item.format,
        blobs: item.blobs, // Array of { dataUrl, pageNum }
        options: item.options
    };

    conversionHistory.unshift(historyItem);
    if (conversionHistory.length > 10) {
        conversionHistory.pop();
    }

    localStorage.setItem('jfifConversionHistory', JSON.stringify(conversionHistory));
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
            <td>${item.fileName}.${item.format}</td>
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
            localStorage.setItem('jfifConversionHistory', JSON.stringify(conversionHistory));
            displayHistory();
        }
    });
}

async function downloadHistoryItem(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item || !item.blobs || item.blobs.length === 0) {
        showError('No data found for this history item.');
        Swal.fire('Error', 'No data found for this history item.', 'error');
        return;
    }

    showStatus(`Downloading ${item.fileName}.zip...`, 'info');
    
    // Show loading alert
    const swalInstance = Swal.fire({
        title: 'Preparing Download',
        html: `Preparing ${item.fileName}.zip for download...`,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    try {
        const zip = new JSZip();
        for (const blobInfo of item.blobs) {
            // Fetch the blob from its URL to add to zip
            const response = await fetch(blobInfo.dataUrl);
            const blob = await response.blob();
            const fileName = `${item.fileName}_page_${blobInfo.pageNum}.jfif`;
            zip.file(fileName, blob);
        }

        const zipBlob = await zip.generateAsync({ type: 'blob' });
        saveAs(zipBlob, `${item.fileName}_jfif.zip`);

        showStatus('ZIP file downloaded successfully!', 'success');
        swalInstance.close();
        Swal.fire({
            title: 'Download Complete',
            text: `The ZIP file for ${item.fileName} has been downloaded.`,
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1500,
            timerProgressBar: true
        });
    } catch (error) {
        showError(`Error downloading history item: ${error.message}`);
        swalInstance.close();
        Swal.fire({
            title: 'Download Error',
            text: `Failed to download history item: ${error.message}`,
            icon: 'error',
            confirmButtonText: 'OK'
        });
    }
}

function previewHistoryItem(id) {
    const item = conversionHistory.find(item => item.id === id);
    if (!item || !item.blobs || item.blobs.length === 0) {
        showError('No preview data found for this history item.');
        Swal.fire('Error', 'No preview data found for this history item.', 'error');
        return;
    }

    imagePreviewGrid.innerHTML = '';
    item.blobs.forEach(blobInfo => {
        const imgWrapper = document.createElement('div');
        imgWrapper.className = 'col-auto text-center';
        imgWrapper.innerHTML = `
            <img src="${blobInfo.dataUrl}" class="img-thumbnail" style="max-width: 150px; max-height: 150px; object-fit: contain;" loading="lazy" width="150" height="150" alt="Page ${blobInfo.pageNum}">
            <p class="small text-muted mt-1 mb-0">Page ${blobInfo.pageNum}</p>
        `;
        imagePreviewGrid.appendChild(imgWrapper);
    });

    previewCountSpan.textContent = item.blobs.length;
    previewContainer.style.display = 'block';
    showStatus(`Previewing ${item.fileName}.${item.format}`, 'info');
    
    // Scroll to preview area
    previewContainer.scrollIntoView({ behavior: 'smooth' });
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