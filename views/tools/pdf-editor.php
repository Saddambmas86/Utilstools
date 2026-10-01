<?php
// SEO and Page Metadata
$page_title = "PDF Editor Online Free - Edit PDF Files in Your Browser"; // You may Change the Title here
$page_description = "Free PDF editor online. Edit PDF text, images, and pages directly in your browser. Add annotations, fill forms, and modify PDF files without software."; // Put your Description here
$page_keywords = "pdf editor, pdf converter, convert pdf, free online pdf tools, pdf to word, pdf to excel, wordscompare";

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
                    <h1 class="h2">Free PDF Editor <i class="fas fa-edit text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Modify your PDF documents directly in your browser.</p>
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

                <div class="options-card card mb-4 d-none" id="editorControls">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-tools me-2"></i>Editor Tools</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-4">
                                <label for="editorMode" class="form-label">Mode</label>
                                <select id="editorMode" class="form-select">
                                    <option value="view">View/Select Page</option>
                                    <option value="addText">Add Text</option>
                                    <option value="addImage">Add Image</option>
                                    <option value="reorderDelete">Reorder/Delete Pages</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="currentPage" class="form-label">Current Page</label>
                                <select id="currentPage" class="form-select"></select>
                            </div>
                            <div class="col-md-4 d-flex align-items-end">
                                <button class="btn btn-primary w-100" id="rotatePageBtn" title="Rotate Current Page 90 degrees clockwise">
                                    <i class="fas fa-sync-alt me-2"></i> Rotate Page
                                </button>
                            </div>
                        </div>

                        <div id="addTextOptions" class="mt-4 d-none">
                            <h6><i class="fas fa-font me-2"></i>Add Text Options</h6>
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="textInput" class="form-label">Text to add</label>
                                    <input type="text" id="textInput" class="form-control" placeholder="Enter text...">
                                </div>
                                <div class="col-md-6">
                                    <label for="fontSize" class="form-label">Font Size</label>
                                    <input type="number" id="fontSize" class="form-control" value="12" min="6" max="72">
                                </div>
                                <div class="col-md-6">
                                    <label for="fontColor" class="form-label">Font Color</label>
                                    <input type="color" id="fontColor" class="form-control form-control-color" value="#000000">
                                </div>
                                <div class="col-12">
                                    <small class="text-muted">Click on the PDF preview to place text.</small>
                                </div>
                            </div>
                        </div>

                        <div id="addImageOptions" class="mt-4 d-none">
                            <h6><i class="fas fa-image me-2"></i>Add Image Options</h6>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="imageUpload" accept="image/*">
                                <button class="btn btn-outline-secondary" type="button" id="clearImageUpload">Clear</button>
                            </div>
                            <div id="imagePreview" class="text-center mb-3 d-none">
                                <img src="" alt="Image Preview" loading="lazy" style="max-width: 150px; max-height: 150px; border: 1px solid #ccc;">
                            </div>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="imageWidth" class="form-label">Width (px)</label>
                                    <input type="number" id="imageWidth" class="form-control" value="100" min="10">
                                </div>
                                <div class="col-md-6">
                                    <label for="imageHeight" class="form-label">Height (px)</label>
                                    <input type="number" id="imageHeight" class="form-control" value="100" min="10">
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <small class="text-muted">Click on the PDF preview to place image.</small>
                            </div>
                        </div>

                        <div id="reorderDeleteOptions" class="mt-4 d-none">
                            <h6><i class="fas fa-sort-numeric-down me-2"></i>Reorder & Delete Pages</h6>
                            <p class="text-muted">Drag and drop thumbnails to reorder. Click <i class="fas fa-trash-alt text-danger"></i> to delete a page.</p>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex justify-content-md-center mb-4">
                    <button class="btn btn-danger btn-md px-4" id="loadPdfBtn" disabled>
                        <i class="fas fa-file-pdf me-2"></i> Load PDF
                    </button>
                    <button class="btn btn-primary btn-md px-4" id="howToBtn">
                        <i class="fas fa-question-circle me-2"></i> How To
                    </button>
                    <button class="btn btn-secondary btn-md px-2" id="resetBtn">
                        <i class="fas fa-redo me-2"></i> Reset
                    </button>
                    <button class="btn btn-success btn-md px-2" id="downloadPdfBtn" disabled>
                        <i class="fas fa-download me-2"></i> Download Edited PDF
                    </button>
                </div>

                <div id="statusArea" class="text-center mb-4"></div>

                <div class="pdf-viewer card mt-4 d-none" id="pdfViewerContainer">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-file-alt me-2"></i>PDF Preview</h5>
                    </div>
                    <div class="card-body p-0">
                        <div id="pdfThumbnails" class="pdf-thumbnails d-flex flex-wrap justify-content-center p-3 border-bottom bg-light" style="max-height: 200px; overflow-y: auto;">
                            </div>
                        <div id="pdfCanvasContainer" class="position-relative d-flex justify-content-center align-items-center p-3 overflow-auto" style="min-height: 400px; background-color: #f0f0f0;">
                            <canvas id="pdfCanvas" class="shadow-sm border"></canvas>
                             <div id="pdfOverlay" class="position-absolute" style="top: 0; left: 0; pointer-events: none;"></div>
                        </div>
                    </div>
                </div>

                <div class="history-area card mt-4" id="historyContainer" style="display: none;">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-history me-2"></i>Edit History (Last 10 Files)</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0" id="historyTable">
                                <thead>
                                    <tr>
                                        <th width="5%"></th>
                                        <th>File Name</th>
                                        <th>Date</th>
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
                <?php include '../../views/content/pdf-editor-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf-lib/1.17.1/pdf-lib.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.min.css" />

<script>
    // Set worker source for pdf.js
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.10.377/pdf.worker.min.js';

    let pdfDoc = null;
    let pdfPages = []; // Array to store page data and edits for regeneration
    let currentPageNum = 1;
    let editorMode = 'view'; // 'view', 'addText', 'addImage', 'reorderDelete'
    let currentImageBlob = null;

    // Elements
    const pdfUpload = document.getElementById('pdfUpload');
    const uploadArea = document.getElementById('uploadArea');
    const fileInfo = document.getElementById('fileInfo');
    const loadPdfBtn = document.getElementById('loadPdfBtn');
    const howToBtn = document.getElementById('howToBtn');
    const resetBtn = document.getElementById('resetBtn');
    const downloadPdfBtn = document.getElementById('downloadPdfBtn');
    const statusArea = document.getElementById('statusArea');
    const editorControls = document.getElementById('editorControls');
    const pdfViewerContainer = document.getElementById('pdfViewerContainer');
    const pdfCanvas = document.getElementById('pdfCanvas');
    const pdfOverlay = document.getElementById('pdfOverlay');
    const pdfThumbnails = document.getElementById('pdfThumbnails');
    const currentPageSelect = document.getElementById('currentPage');
    const rotatePageBtn = document.getElementById('rotatePageBtn');
    const editorModeSelect = document.getElementById('editorMode');

    // Add Text Elements
    const addTextOptions = document.getElementById('addTextOptions');
    const textInput = document.getElementById('textInput');
    const fontSizeInput = document.getElementById('fontSize');
    const fontColorInput = document.getElementById('fontColor');

    // Add Image Elements
    const addImageOptions = document.getElementById('addImageOptions');
    const imageUpload = document.getElementById('imageUpload');
    const imagePreview = addImageOptions.querySelector('#imagePreview img');
    const imagePreviewContainer = document.getElementById('imagePreview');
    const clearImageUploadBtn = document.getElementById('clearImageUpload');
    const imageWidthInput = document.getElementById('imageWidth');
    const imageHeightInput = document.getElementById('imageHeight');

    // Reorder/Delete Pages Elements
    const reorderDeleteOptions = document.getElementById('reorderDeleteOptions');

    // History Elements
    const historyContainer = document.getElementById('historyContainer');
    const historyList = document.getElementById('historyList');
    let editHistory = JSON.parse(localStorage.getItem('pdfEditHistory')) || [];

    // Initialize history display
    displayHistory();

    // Event Listeners
    pdfUpload.addEventListener('change', handleFileSelect);
    uploadArea.addEventListener('dragover', handleDragOver);
    uploadArea.addEventListener('dragleave', handleDragLeave);
    uploadArea.addEventListener('drop', handleDrop);
    loadPdfBtn.addEventListener('click', loadPdf);
    howToBtn.addEventListener('click', showHowTo);
    resetBtn.addEventListener('click', resetAll);
    downloadPdfBtn.addEventListener('click', downloadEditedPdf);
    currentPageSelect.addEventListener('change', renderCurrentPage);
    rotatePageBtn.addEventListener('click', rotateCurrentPage);
    editorModeSelect.addEventListener('change', changeEditorMode);
    pdfCanvas.addEventListener('click', handleCanvasClick); // For text/image placement
    imageUpload.addEventListener('change', handleImageUpload);
    clearImageUploadBtn.addEventListener('click', clearImageUpload);

    // Dragula for reordering thumbnails
    let drake = null;

    function initDragula() {
        if (drake) drake.destroy(); // Destroy previous instance if exists
        drake = dragula([pdfThumbnails], {
            moves: function (el, source, handle, sibling) {
                return editorMode === 'reorderDelete'; // Only allow drag in reorder mode
            }
        });
        drake.on('drop', function (el, target, source, sibling) {
            reorderPdfPages();
        });
    }

    function reorderPdfPages() {
        const newOrder = [];
        const thumbnailElements = Array.from(pdfThumbnails.children);
        const oldPdfPages = [...pdfPages]; // Create a copy of current pages

        thumbnailElements.forEach(thumb => {
            const originalIndex = parseInt(thumb.dataset.pageIndex);
            newOrder.push(oldPdfPages[originalIndex]);
        });
        pdfPages = newOrder;

        // Re-render current page to ensure correct visual representation
        currentPageNum = 1; // Reset to first page
        updateCurrentPageSelect(); // Update dropdown with new order
        renderCurrentPage(); // Render the new first page
        showStatus('Pages reordered successfully.', 'success');
    }

    // How To Button
    function showHowTo() {
        Swal.fire({
            title: 'Welcome to PDF Editor',
            html: `Follow these steps to edit your PDFs:<br><br>
            <ol class="text-start">
                <li>Upload a PDF file by clicking "Select PDF File" or dragging it into the drop zone.</li>
                <li>Click "Load PDF" to display the document in the editor.</li>
                <li>Choose an "Editor Mode" from the dropdown:
                    <ul>
                        <li><strong>View/Select Page:</strong> Browse pages.</li>
                        <li><strong>Add Text:</strong> Type text and click on the canvas to place it.</li>
                        <li><strong>Add Image:</strong> Upload an image and click on the canvas to place it.</li>
                        <li><strong>Reorder/Delete Pages:</strong> Drag thumbnail to reorder or click trash icon to delete.</li>
                    </ul>
                </li>
                <li>Use the "Rotate Page" button to rotate the current page.</li>
                <li>Click "Download Edited PDF" to save your changes.</li>
            </ol>`,
            icon: 'info',
            confirmButtonText: 'Got it!',
            confirmButtonColor: '#0d6efd'
        });
    }

    // Reset Button
    function resetAll() {
        pdfDoc = null;
        pdfPages = [];
        currentPageNum = 1;
        editorMode = 'view';
        currentImageBlob = null;

        pdfUpload.value = '';
        fileInfo.textContent = 'No file selected.';
        statusArea.textContent = '';
        loadPdfBtn.disabled = true;
        downloadPdfBtn.disabled = true;
        editorControls.classList.add('d-none');
        pdfViewerContainer.classList.add('d-none');
        pdfCanvas.getContext('2d').clearRect(0, 0, pdfCanvas.width, pdfCanvas.height);
        pdfOverlay.innerHTML = '';
        pdfThumbnails.innerHTML = '';
        currentPageSelect.innerHTML = '';
        editorModeSelect.value = 'view';
        addTextOptions.classList.add('d-none');
        addImageOptions.classList.add('d-none');
        reorderDeleteOptions.classList.add('d-none');
        imageUpload.value = '';
        imagePreviewContainer.classList.add('d-none');
        imagePreview.src = '';

        showStatus('Editor reset. Upload a new PDF to start.', 'info');
        if (drake) drake.destroy(); // Clean up Dragula
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
                text: 'File must be less than 50MB.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            return;
        }

        files = [file];
        fileInfo.textContent = `${file.name} selected.`;
        loadPdfBtn.disabled = false;
        showStatus('File selected. Click "Load PDF" to start editing.', 'info');

        Swal.fire({
            title: 'File Ready',
            text: `${file.name} is ready to be loaded.`,
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });
    }

    // Load PDF
    async function loadPdf() {
        if (!files || files.length === 0) {
            showError('No PDF file selected.');
            Swal.fire({
                title: 'Error',
                text: 'No PDF file selected.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            return;
        }

        const file = files[0];
        showStatus('Loading PDF...', 'info');
        loadPdfBtn.disabled = true;
        downloadPdfBtn.disabled = true;

        const swalInstance = Swal.fire({
            title: 'Loading PDF',
            html: 'Please wait while your PDF is being loaded...',
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading();
            },
            allowOutsideClick: false,
            allowEscapeKey: false
        });

        try {
            const fileReader = new FileReader();
            fileReader.onload = async function() {
                const typedarray = new Uint8Array(this.result);
                pdfDoc = await pdfjsLib.getDocument({ data: typedarray }).promise;

                pdfPages = []; // Clear previous pages
                for (let i = 1; i <= pdfDoc.numPages; i++) {
                    const page = await pdfDoc.getPage(i);
                    const viewport = page.getViewport({ scale: 1 });
                    pdfPages.push({
                        page: page,
                        width: viewport.width,
                        height: viewport.height,
                        rotation: page.rotation, // Store initial rotation
                        edits: [] // Array to store text/image edits for this page
                    });
                }

                updateCurrentPageSelect();
                currentPageNum = 1;
                renderCurrentPage();
                renderAllThumbnails();
                editorControls.classList.remove('d-none');
                pdfViewerContainer.classList.remove('d-none');
                downloadPdfBtn.disabled = false;
                showStatus('PDF loaded successfully. Select an editing mode.', 'success');
                swalInstance.close();
                Swal.fire({
                    title: 'PDF Loaded!',
                    text: 'Your PDF is ready for editing.',
                    icon: 'success',
                    confirmButtonText: 'Start Editing',
                    timer: 1500,
                    timerProgressBar: true
                });
                initDragula(); // Initialize Dragula after thumbnails are rendered
            };
            fileReader.readAsArrayBuffer(file);

        } catch (error) {
            showError(`Error loading PDF: ${error.message}`);
            loadPdfBtn.disabled = false;
            swalInstance.close();
            Swal.fire({
                title: 'Error Loading PDF',
                text: error.message,
                icon: 'error',
                confirmButtonText: 'OK'
            });
        }
    }

    function updateCurrentPageSelect() {
        currentPageSelect.innerHTML = '';
        pdfPages.forEach((pageData, index) => {
            const option = document.createElement('option');
            option.value = index + 1;
            option.textContent = `Page ${index + 1}`;
            currentPageSelect.appendChild(option);
        });
        currentPageSelect.value = currentPageNum;
    }

    async function renderCurrentPage() {
        if (!pdfDoc || pdfPages.length === 0) return;

        currentPageNum = parseInt(currentPageSelect.value);
        const pageData = pdfPages[currentPageNum - 1];
        const page = pageData.page;

        const scale = 1.5; // Adjust scale for better quality
        const viewport = page.getViewport({ scale: scale, rotation: pageData.rotation });
        const context = pdfCanvas.getContext('2d');

        pdfCanvas.height = viewport.height;
        pdfCanvas.width = viewport.width;

        pdfCanvas.style.width = '100%';
        pdfCanvas.style.height = 'auto'; // Adjust canvas display size to fit container

        const renderContext = {
            canvasContext: context,
            viewport: viewport
        };

        try {
            await page.render(renderContext).promise;
            renderPageOverlays(currentPageNum - 1); // Render text/image edits on top
        } catch (error) {
            console.error('Error rendering PDF page:', error);
            showError('Error rendering PDF page. Please try again.');
        }
    }

    async function renderAllThumbnails() {
        pdfThumbnails.innerHTML = '';
        for (let i = 0; i < pdfPages.length; i++) {
            const pageData = pdfPages[i];
            const page = pageData.page;
            const thumbnailScale = 0.2; // Adjust scale for thumbnails
            const viewport = page.getViewport({ scale: thumbnailScale, rotation: pageData.rotation });

            const thumbnailWrapper = document.createElement('div');
            thumbnailWrapper.classList.add('pdf-thumbnail-item', 'm-2', 'border', 'rounded', 'position-relative');
            thumbnailWrapper.dataset.pageIndex = i; // Store original index

            const thumbnailCanvas = document.createElement('canvas');
            thumbnailCanvas.width = viewport.width;
            thumbnailCanvas.height = viewport.height;

            const context = thumbnailCanvas.getContext('2d');
            const renderContext = {
                canvasContext: context,
                viewport: viewport
            };
            await page.render(renderContext).promise;

            const pageNumberLabel = document.createElement('span');
            pageNumberLabel.classList.add('page-number-label', 'badge', 'bg-danger', 'position-absolute', 'top-0', 'start-0', 'm-1');
            pageNumberLabel.textContent = i + 1;

            thumbnailWrapper.appendChild(thumbnailCanvas);
            thumbnailWrapper.appendChild(pageNumberLabel);

            // Delete button for reorder/delete mode
            const deleteBtn = document.createElement('button');
            deleteBtn.classList.add('btn', 'btn-sm', 'btn-danger', 'position-absolute', 'bottom-0', 'end-0', 'm-1', 'delete-page-btn', 'd-none');
            deleteBtn.innerHTML = '<i class="fas fa-trash-alt"></i>';
            deleteBtn.title = `Delete Page ${i + 1}`;
            deleteBtn.onclick = (e) => {
                e.stopPropagation();
                deletePage(i);
            };
            thumbnailWrapper.appendChild(deleteBtn);

            thumbnailWrapper.addEventListener('click', () => {
                currentPageSelect.value = i + 1; // Update dropdown
                renderCurrentPage(); // Render clicked page in main view
            });

            pdfThumbnails.appendChild(thumbnailWrapper);
        }
        updateReorderDeleteVisibility(); // Update visibility of delete buttons
    }

    function renderPageOverlays(pageIndex) {
        pdfOverlay.innerHTML = '';
        pdfOverlay.style.width = `${pdfCanvas.width}px`;
        pdfOverlay.style.height = `${pdfCanvas.height}px`;
        pdfOverlay.style.pointerEvents = editorMode === 'addText' || editorMode === 'addImage' ? 'auto' : 'none';

        const pageData = pdfPages[pageIndex];
        const scaleX = pdfCanvas.width / pageData.width;
        const scaleY = pdfCanvas.height / pageData.height;

        pageData.edits.forEach(edit => {
            if (edit.type === 'text') {
                const textElement = document.createElement('div');
                textElement.textContent = edit.text;
                textElement.style.position = 'absolute';
                textElement.style.left = `${edit.x * scaleX}px`;
                textElement.style.top = `${edit.y * scaleY}px`;
                textElement.style.fontSize = `${edit.fontSize * scaleY}px`; // Scale font size
                textElement.style.color = edit.color;
                textElement.style.whiteSpace = 'nowrap';
                textElement.style.transformOrigin = 'top left'; // For accurate positioning
                // Optional: add a draggable behavior if needed for finer tuning
                pdfOverlay.appendChild(textElement);
            } else if (edit.type === 'image') {
                const imgElement = document.createElement('img');
                imgElement.src = edit.src;
                imgElement.style.position = 'absolute';
                imgElement.style.left = `${edit.x * scaleX}px`;
                imgElement.style.top = `${edit.y * scaleY}px`;
                imgElement.style.width = `${edit.width * scaleX}px`;
                imgElement.style.height = `${edit.height * scaleY}px`;
                imgElement.style.objectFit = 'contain';
                pdfOverlay.appendChild(imgElement);
            }
        });
    }

    // PDF Editing Actions
    function rotateCurrentPage() {
        if (!pdfDoc || pdfPages.length === 0) {
            showError('No PDF loaded.');
            return;
        }
        const pageIndex = currentPageNum - 1;
        let currentRotation = pdfPages[pageIndex].rotation || 0;
        currentRotation = (currentRotation + 90) % 360; // Rotate by 90 degrees clockwise
        pdfPages[pageIndex].rotation = currentRotation;
        renderCurrentPage(); // Re-render main canvas
        renderAllThumbnails(); // Re-render thumbnails to show new rotation
        showStatus(`Page ${currentPageNum} rotated.`, 'info');
    }

    async function downloadEditedPdf() {
        if (!pdfDoc || pdfPages.length === 0) {
            showError('No PDF loaded for download.');
            Swal.fire({
                title: 'Error',
                text: 'No PDF loaded for download.',
                icon: 'error',
                confirmButtonText: 'OK'
            });
            return;
        }

        showStatus('Generating edited PDF...', 'info');
        downloadPdfBtn.disabled = true;

        const swalInstance = Swal.fire({
            title: 'Generating PDF',
            html: 'Applying edits and creating your new PDF...',
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading();
            },
            allowOutsideClick: false,
            allowEscapeKey: false
        });

        try {
            const { PDFDocument, rgb, StandardFonts } = PDFLib;
            const newPdfDoc = await PDFDocument.create();
            const font = await newPdfDoc.embedFont(StandardFonts.Helvetica);

            for (let i = 0; i < pdfPages.length; i++) {
                const pageData = pdfPages[i];
                const originalPage = pageData.page;

                // Fetch original page content as bytes
                const originalPdfBytes = await fetch(originalPage.ownerDocument.baseURI).then(res => res.arrayBuffer()); // This is problematic if original is a Blob
                // Better approach: Use PDFDocument.load with original PDF bytes
                const originalLoadedPdf = await PDFDocument.load(files[0]); // Reload the original PDF

                const [copiedPage] = await newPdfDoc.copyPages(originalLoadedPdf, [originalPage.pageIndex -1 ]); // pageIndex is 1-based

                // Rotate the copied page as per stored rotation
                copiedPage.setRotation(PDFLib.degrees(pageData.rotation));

                const newPage = newPdfDoc.addPage(copiedPage);

                // Apply text edits
                for (const edit of pageData.edits) {
                    if (edit.type === 'text') {
                        // Coordinates need to be adjusted for PDFLib
                        // PDFLib uses Y-coordinates from bottom-left
                        // Canvas uses Y-coordinates from top-left
                        const pdfHeight = newPage.getHeight();
                        const pdfX = edit.x;
                        const pdfY = pdfHeight - edit.y - (edit.fontSize * 0.7); // Adjust for font baseline

                        newPage.drawText(edit.text, {
                            x: pdfX,
                            y: pdfY,
                            font: font,
                            size: edit.fontSize,
                            color: rgb(
                                parseInt(edit.color.substring(1, 3), 16) / 255,
                                parseInt(edit.color.substring(3, 5), 16) / 255,
                                parseInt(edit.color.substring(5, 7), 16) / 255
                            ),
                            rotate: PDFLib.degrees(pageData.rotation) // Apply page rotation to text
                        });
                    } else if (edit.type === 'image') {
                        const imgBytes = await fetch(edit.src).then(res => res.arrayBuffer());
                        let embeddedImage;
                        if (edit.src.startsWith('data:image/png')) {
                            embeddedImage = await newPdfDoc.embedPng(imgBytes);
                        } else if (edit.src.startsWith('data:image/jpeg')) {
                            embeddedImage = await newPdfDoc.embedJpg(imgBytes);
                        }

                        if (embeddedImage) {
                            const pdfHeight = newPage.getHeight();
                            const pdfX = edit.x;
                            const pdfY = pdfHeight - edit.y - edit.height; // Adjust for image top-left

                            newPage.drawImage(embeddedImage, {
                                x: pdfX,
                                y: pdfY,
                                width: edit.width,
                                height: edit.height,
                                rotate: PDFLib.degrees(pageData.rotation) // Apply page rotation to image
                            });
                        }
                    }
                }
            }

            const pdfBytes = await newPdfDoc.save();
            const blob = new Blob([pdfBytes], { type: 'application/pdf' });
            const url = URL.createObjectURL(blob);
            const a = document.createElement('a');
            a.href = url;
            a.download = files[0].name.replace('.pdf', '_edited.pdf');
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);

            addToHistory({
                fileName: a.download,
                date: new Date().toLocaleString()
            });

            swalInstance.close();
            showStatus('Edited PDF downloaded successfully!', 'success');
            downloadPdfBtn.disabled = false;
            Swal.fire({
                title: 'Download Complete!',
                text: 'Your edited PDF has been downloaded.',
                icon: 'success',
                confirmButtonText: 'OK',
                timer: 1500,
                timerProgressBar: true
            });

        } catch (error) {
            showError(`Error generating PDF: ${error.message}`);
            downloadPdfBtn.disabled = false;
            swalInstance.close();
            Swal.fire({
                title: 'PDF Generation Error',
                text: error.message,
                icon: 'error',
                confirmButtonText: 'OK'
            });
            console.error(error);
        }
    }


    // Editor Mode Management
    function changeEditorMode() {
        editorMode = editorModeSelect.value;
        addTextOptions.classList.add('d-none');
        addImageOptions.classList.add('d-none');
        reorderDeleteOptions.classList.add('d-none');
        pdfOverlay.style.pointerEvents = 'none'; // Default to no pointer events

        if (editorMode === 'addText') {
            addTextOptions.classList.remove('d-none');
            pdfOverlay.style.pointerEvents = 'auto'; // Enable clicks for text placement
        } else if (editorMode === 'addImage') {
            addImageOptions.classList.remove('d-none');
            pdfOverlay.style.pointerEvents = 'auto'; // Enable clicks for image placement
        } else if (editorMode === 'reorderDelete') {
            reorderDeleteOptions.classList.remove('d-none');
        }
        updateReorderDeleteVisibility();
    }

    function updateReorderDeleteVisibility() {
        const deleteButtons = document.querySelectorAll('.delete-page-btn');
        const pageNumberLabels = document.querySelectorAll('.page-number-label');

        if (editorMode === 'reorderDelete') {
            deleteButtons.forEach(btn => btn.classList.remove('d-none'));
            pageNumberLabels.forEach(label => label.classList.add('d-none')); // Hide page numbers in reorder mode
        } else {
            deleteButtons.forEach(btn => btn.classList.add('d-none'));
            pageNumberLabels.forEach(label => label.classList.remove('d-none'));
        }
    }

    function handleCanvasClick(event) {
        if (editorMode === 'addText') {
            addTextToPage(event);
        } else if (editorMode === 'addImage') {
            addImageToPage(event);
        }
        // No action for 'view' or 'reorderDelete' modes
    }

    function addTextToPage(event) {
        const text = textInput.value.trim();
        if (!text) {
            showError('Please enter text to add.');
            Swal.fire('Input Required', 'Please enter text to add.', 'warning');
            return;
        }

        const fontSize = parseInt(fontSizeInput.value) || 12;
        const fontColor = fontColorInput.value;

        const rect = pdfCanvas.getBoundingClientRect();
        const scaleX = pdfCanvas.width / rect.width;
        const scaleY = pdfCanvas.height / rect.height;

        const x = (event.clientX - rect.left) * scaleX;
        const y = (event.clientY - rect.top) * scaleY;

        const pageIndex = currentPageNum - 1;
        if (!pdfPages[pageIndex].edits) {
            pdfPages[pageIndex].edits = [];
        }
        pdfPages[pageIndex].edits.push({
            type: 'text',
            text: text,
            x: x,
            y: y,
            fontSize: fontSize,
            color: fontColor
        });
        renderCurrentPage(); // Re-render to show the new text
        showStatus('Text added to page.', 'success');
    }

    function handleImageUpload(event) {
        const file = event.target.files[0];
        if (file) {
            if (!file.type.startsWith('image/')) {
                showError('Please upload an image file.');
                Swal.fire('Invalid File', 'Please upload an image file.', 'warning');
                imageUpload.value = '';
                imagePreviewContainer.classList.add('d-none');
                imagePreview.src = '';
                currentImageBlob = null;
                return;
            }
            if (file.size > 5 * 1024 * 1024) { // Max 5MB for images
                showError('Image file must be less than 5MB.');
                Swal.fire('File Too Large', 'Image file must be less than 5MB.', 'warning');
                imageUpload.value = '';
                imagePreviewContainer.classList.add('d-none');
                imagePreview.src = '';
                currentImageBlob = null;
                return;
            }

            const reader = new FileReader();
            reader.onload = (e) => {
                imagePreview.src = e.target.result;
                imagePreviewContainer.classList.remove('d-none');
                currentImageBlob = e.target.result; // Store as Data URL for PDFLib
            };
            reader.readAsDataURL(file);
        } else {
            clearImageUpload();
        }
    }

    function clearImageUpload() {
        imageUpload.value = '';
        imagePreviewContainer.classList.add('d-none');
        imagePreview.src = '';
        currentImageBlob = null;
        showStatus('Image cleared.', 'info');
    }

    function addImageToPage(event) {
        if (!currentImageBlob) {
            showError('Please select an image to add first.');
            Swal.fire('No Image Selected', 'Please select an image to add first.', 'warning');
            return;
        }

        const width = parseInt(imageWidthInput.value) || 100;
        const height = parseInt(imageHeightInput.value) || 100;

        const rect = pdfCanvas.getBoundingClientRect();
        const scaleX = pdfCanvas.width / rect.width;
        const scaleY = pdfCanvas.height / rect.height;

        const x = (event.clientX - rect.left) * scaleX;
        const y = (event.clientY - rect.top) * scaleY;

        const pageIndex = currentPageNum - 1;
        if (!pdfPages[pageIndex].edits) {
            pdfPages[pageIndex].edits = [];
        }
        pdfPages[pageIndex].edits.push({
            type: 'image',
            src: currentImageBlob,
            x: x,
            y: y,
            width: width,
            height: height
        });
        renderCurrentPage(); // Re-render to show the new image
        showStatus('Image added to page.', 'success');
    }

    function deletePage(indexToDelete) {
        Swal.fire({
            title: 'Are you sure?',
            text: `You are about to delete Page ${indexToDelete + 1}. This action cannot be undone.`,
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                pdfPages.splice(indexToDelete, 1);
                if (pdfPages.length === 0) {
                    resetAll();
                    Swal.fire('PDF Empty', 'All pages deleted. Please upload a new PDF.', 'info');
                    return;
                }
                // Adjust current page if the deleted page was the current one or before it
                if (currentPageNum > pdfPages.length) {
                    currentPageNum = pdfPages.length;
                }
                if (currentPageNum <= 0) { // Should not happen with above logic, but for safety
                    currentPageNum = 1;
                }
                updateCurrentPageSelect();
                renderCurrentPage();
                renderAllThumbnails(); // Re-render all thumbnails after deletion
                showStatus(`Page ${indexToDelete + 1} deleted.`, 'success');
                Swal.fire('Deleted!', 'The page has been deleted.', 'success', { timer: 1000 });
                initDragula(); // Re-initialize Dragula after DOM changes
            }
        });
    }

    // History Functions
    function addToHistory(item) {
        const historyItem = {
            id: Date.now(),
            fileName: item.fileName,
            date: item.date
            // We don't store the actual PDF data in history to avoid localStorage bloat.
            // Regenerating on download/preview from a complex editor might be too slow.
            // For this basic editor, we assume the user downloads immediately.
            // A more robust solution would involve IndexedDB or server-side storage.
        };

        editHistory.unshift(historyItem);
        if (editHistory.length > 10) {
            editHistory.pop();
        }

        localStorage.setItem('pdfEditHistory', JSON.stringify(editHistory));
        displayHistory();
    }

    function displayHistory() {
        if (editHistory.length === 0) {
            historyContainer.style.display = 'none';
            return;
        }

        historyList.innerHTML = '';
        editHistory.forEach(item => {
            const tr = document.createElement('tr');
            tr.innerHTML = `
                <td>
                    <button class="btn btn-sm btn-outline-danger delete-history" data-id="${item.id}" title="Delete">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
                <td>${item.fileName}</td>
                <td>${item.date}</td>
                <td class="text-end">
                    <button class="btn btn-sm btn-outline-primary download-history" data-id="${item.id}" title="Download Last Edited Version" disabled>
                        <i class="fas fa-download"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-secondary preview-history ms-1" data-id="${item.id}" title="Preview Last Edited Version" disabled>
                        <i class="fas fa-eye"></i>
                    </button>
                </td>
            `;
            historyList.appendChild(tr);
        });

        // Add event listeners for history actions (delete only for this limited history)
        document.querySelectorAll('.delete-history').forEach(btn => {
            btn.addEventListener('click', (e) => {
                const id = parseInt(e.currentTarget.getAttribute('data-id'));
                deleteHistoryItem(id);
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
                editHistory = editHistory.filter(item => item.id !== id);
                localStorage.setItem('pdfEditHistory', JSON.stringify(editHistory));
                displayHistory();
                Swal.fire('Deleted!', 'The history item has been deleted.', 'success', { timer: 1000 });
            }
        });
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