<?php
// SEO and Page Metadata
$page_title = "Word to PDF Converter - Convert DOCX to PDF Online Free"; 
$page_description = "Convert Word documents (DOCX, DOC) to PDF online for free. Preserve layout, formatting, and fonts accurately without losing quality."; 
$page_keywords = "word to pdf, docx to pdf, doc to pdf, convert word, free online pdf tools, wordscompare";

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
                    <h1 class="h2">Word to PDF Converter <i class="fas fa-file-pdf text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Transform fully editable Word files into secure PDF documents while preserving formatting.</p>
                </header>

                <div id="uploadArea" class="upload-area border-dashed bg-light rounded-3 p-5 text-center mb-4">
                    <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                    <h5 id="upload-heading">Drag & Drop Word File Here</h5>
                    <p class="text-muted mb-3">or</p>
                    <input type="file" id="wordUpload" accept=".docx,.doc,.rtf" class="d-none" multiple>
                    <button type="button" class="btn btn-danger" onclick="document.getElementById('wordUpload').click()">
                        <i class="fas fa-folder-open me-2"></i> Select Word File
                    </button>
                    <div id="fileInfo" class="mt-3 small text-muted">No file selected. Supported formats: DOCX, DOC, RTF.</div>
                </div>

                <div class="options-card card mb-4">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-cog me-2"></i>Conversion Options</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="outputFormat" class="form-label">Output Format</label>
                                <select id="outputFormat" class="form-select">
                                    <option value="pdf" selected>Portable Document Format (PDF)</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="preserveFormatting" checked>
                                    <label class="form-check-label" for="preserveFormatting">
                                        Preserve original formatting & fonts
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex justify-content-md-center mb-4">
                    <button class="btn btn-danger btn-md px-4" id="convertBtn" disabled>
                        <i class="fas fa-exchange-alt me-2"></i> Convert to PDF
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
                        <h5 class="mb-0"><i class="fas fa-file-pdf me-2"></i>PDF Document Preview</h5>
                        <span class="badge bg-info" id="pageCount"></span>
                    </div>
                    <div class="card-body p-0">
                        <div class="preview-content p-3" id="pdfPreview">
                            <div class="text-center text-muted p-4">
                                <i class="fas fa-file-pdf fa-3x mb-3"></i>
                                <p>Preview will appear here after conversion.</p>
                            </div>
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
                <?php include '../../views/content/word-to-pdf-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script>
    let files = [];
    let currentFile = null;

    document.addEventListener('DOMContentLoaded', function() {
        const uploadArea = document.getElementById('uploadArea');
        
        uploadArea.addEventListener('dragover', function(e) {
            e.preventDefault();
            e.stopPropagation();
            this.classList.add('border-primary');
            document.getElementById('upload-heading').textContent = 'Drop your Word file here';
        });

        uploadArea.addEventListener('dragleave', function(e) {
            e.preventDefault();
            e.stopPropagation();
            this.classList.remove('border-primary');
            document.getElementById('upload-heading').textContent = 'Drag & Drop Word File Here';
        });

        uploadArea.addEventListener('drop', function(e) {
            e.preventDefault();
            e.stopPropagation();
            this.classList.remove('border-primary');
            document.getElementById('upload-heading').textContent = 'Drag & Drop Word File Here';
            
            if (e.dataTransfer.files.length) {
                handleFiles(e.dataTransfer.files);
            }
        });

        document.getElementById('wordUpload').addEventListener('change', function(e) {
            if (this.files.length) {
                handleFiles(this.files);
            }
        });

        // Initialize buttons
        document.getElementById('convertBtn').addEventListener('click', convertWordToPDF);
        document.getElementById('resetBtn').addEventListener('click', resetAll);
        document.getElementById('downloadBtn').addEventListener('click', downloadFile);
    });

    function handleFiles(selectedFiles) {
        files = Array.from(selectedFiles).filter(file => {
            return file.name.toLowerCase().endsWith('.docx') || 
                   file.name.toLowerCase().endsWith('.doc') || 
                   file.name.toLowerCase().endsWith('.rtf') ||
                   file.type === 'application/vnd.openxmlformats-officedocument.wordprocessingml.document' ||
                   file.type === 'application/msword';
        });
        
        if (files.length === 0) {
            Swal.fire('Invalid Files', 'Please upload DOCX, DOC, or RTF files only.', 'error');
            return;
        }

        // For simplicity, we'll work with the first file
        currentFile = files[0];
        
        // Update file info
        document.getElementById('fileInfo').textContent = `${currentFile.name} (${(currentFile.size / 1024 / 1024).toFixed(2)} MB)`;
        
        // Enable convert button
        document.getElementById('convertBtn').disabled = false;
        
        // Disable download button until conversion
        document.getElementById('downloadBtn').disabled = true;
        
        // Clear preview
        document.getElementById('pdfPreview').innerHTML = `
            <div class="text-center text-muted p-4">
                <i class="fas fa-file-pdf fa-3x mb-3"></i>
                <p>Preview will appear here after conversion.</p>
            </div>
        `;

        // Show success message
        Swal.fire({
            title: 'File Added',
            text: 'Word file has been selected for conversion.',
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });
    }

    async function convertWordToPDF() {
        if (!currentFile) {
            Swal.fire('No File', 'Please upload a Word file first.', 'error');
            return;
        }

        const convertBtn = document.getElementById('convertBtn');
        const originalBtnText = convertBtn.innerHTML;
        convertBtn.disabled = true;

        // Show loading alert
        let timerInterval;
        const swalInstance = Swal.fire({
            title: 'Converting Word to PDF',
            html: 'Please wait while we process your file...',
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading();
            },
            willClose: () => {
                clearInterval(timerInterval);
            }
        });

        try {
            await convertWithConvertAPI(currentFile, swalInstance);
        } catch (error) {
            console.error('Conversion error:', error);
            Swal.fire('Error', 'Failed to convert the Word file: ' + error.message, 'error');
            convertBtn.innerHTML = originalBtnText;
            convertBtn.disabled = false;
            swalInstance.close();
        }
    }
    
    async function convertWithConvertAPI(file, swalInstance) {
        // Direct browser-to-Cloud API call completely bypasses Hostinger limits
        const formData = new FormData();
        formData.append('File', file);
        formData.append('StoreFile', 'true');
        
        let fileExtension = file.name.split('.').pop().toLowerCase();
        if (fileExtension !== 'docx' && fileExtension !== 'doc' && fileExtension !== 'rtf') {
            fileExtension = 'docx'; // Fallback
        }
        
        const apiUrl = `https://v2.convertapi.com/convert/${fileExtension}/to/pdf?Secret=3AxumLNq9MGIgsdLYLAb1gNcvZirrSBX`;
        
        const response = await fetch(apiUrl, {
            method: 'POST',
            body: formData
        });
        
        const result = await response.json();
        
        if (!response.ok) {
            console.error('Server conversion error:', result);
            throw new Error(result.Message || 'Server conversion failed');
        }
        
        if (result.Files && result.Files.length > 0) {
            const fileUrl = result.Files[0].Url;
            
            // Download the converted file
            const dlResponse = await fetch(fileUrl);
            const blob = await dlResponse.blob();
            
            currentFile.outputBlob = blob;
            currentFile.outputFormat = 'pdf';
            
            // Update preview
            document.getElementById('pdfPreview').innerHTML = `
                <div class="p-3">
                    <div class="border p-3 bg-light rounded" style="max-height: 300px; overflow: auto;">
                        <p class="text-success"><i class="fas fa-check-circle me-2"></i>File converted successfully using high-fidelity conversion.</p>
                        <p class="text-muted">Click the download button below to save your new PDF document.</p>
                    </div>
                </div>
            `;
            
            document.getElementById('downloadBtn').disabled = false;
            document.getElementById('convertBtn').disabled = false;
            
            swalInstance.close();
            Swal.fire({
                title: 'Success!',
                text: 'Word converted to PDF successfully with high fidelity!',
                icon: 'success',
                confirmButtonText: 'OK',
                timer: 1500,
                timerProgressBar: true
            });
        } else {
            throw new Error('Conversion failed');
        }
    }
    
    function downloadFile() {
        if (!currentFile || !currentFile.outputBlob) {
            Swal.fire('No File', 'Please convert a file first.', 'error');
            return;
        }

        const a = document.createElement('a');
        a.href = URL.createObjectURL(currentFile.outputBlob);
        a.download = currentFile.name.replace(/\.[^/.]+$/, "") + '.pdf';
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);

        Swal.fire({
            title: 'Download Started',
            text: 'Your PDF file is being downloaded.',
            icon: 'success',
            timer: 1000,
            timerProgressBar: true
        });
    }

    function resetAll() {
        files = [];
        currentFile = null;
        document.getElementById('wordUpload').value = '';
        document.getElementById('fileInfo').textContent = 'No file selected. Supported formats: DOCX, DOC, RTF.';
        document.getElementById('convertBtn').disabled = true;
        document.getElementById('downloadBtn').disabled = true;
        document.getElementById('outputFormat').value = 'pdf';
        document.getElementById('preserveFormatting').checked = true;
        document.getElementById('pageCount').textContent = '';
        
        document.getElementById('pdfPreview').innerHTML = `
            <div class="text-center text-muted p-4">
                <i class="fas fa-file-pdf fa-3x mb-3"></i>
                <p>Preview will appear here after conversion.</p>
            </div>
        `;
    }
</script>

<?php include '../../includes/footer.php'; ?>