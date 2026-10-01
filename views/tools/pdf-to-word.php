<?php
// SEO and Page Metadata
$page_title = "PDF to Word Converter - Convert PDF to DOCX Online Free"; // You may Change the Title here
$page_description = "Convert PDF to Word (DOCX) online for free. Transform PDF documents into editable Microsoft Word files. Preserve text, tables, and formatting accurately."; // Put your Description here
$page_keywords = "pdf to word, pdf converter, convert pdf, free online pdf tools, pdf to word, pdf to excel, wordscompare";

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
                    <h1 class="h2">PDF to Word Converter <i class="fas fa-file-word text-danger ms-2"></i></h1>
                    <p class="lead text-muted">Transform PDF documents into fully editable Word files while preserving formatting.</p>
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
                                <label for="outputFormat" class="form-label">Output Format</label>
                                <select id="outputFormat" class="form-select">
                                    <option value="docx" selected>Word Document (DOCX)</option>
                                    <option value="doc">Word 97-2003 (DOC)</option>
                                    <option value="rtf">Rich Text Format (RTF)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="contentMode" class="form-label">Content Mode</label>
                                <select id="contentMode" class="form-select">
                                    <option value="text" selected>Text Only</option>
                                    <option value="textAndImages">Text + Images</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="layoutMode" class="form-label">Layout Mode</label>
                                <select id="layoutMode" class="form-select">
                                    <option value="flow" selected>Flow Layout (Editable)</option>
                                    <option value="fixed">Fixed Layout (Preserve PDF Appearance)</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="preserveFormatting" checked>
                                    <label class="form-check-label" for="preserveFormatting">
                                        Preserve original formatting
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-grid gap-3 d-md-flex justify-content-md-center mb-4">
                    <button class="btn btn-danger btn-md px-4" id="convertBtn" disabled>
                        <i class="fas fa-exchange-alt me-2"></i> Convert to Word
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
                        <h5 class="mb-0"><i class="fas fa-file-word me-2"></i>Word Document Preview</h5>
                        <span class="badge bg-info" id="pageCount"></span>
                    </div>
                    <div class="card-body p-0">
                        <div class="preview-content p-3" id="wordPreview">
                            <div class="text-center text-muted p-4">
                                <i class="fas fa-file-word fa-3x mb-3"></i>
                                <p>Preview will appear here after conversion.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="history-area card mt-4" id="historyContainer" style="display: none;">
                    <div class="card-header bg-light">
                        <h5 class="mb-0"><i class="fas fa-history me-2"></i>Conversion History (Last 5 Files)</h5>
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
                <?php include '../../views/content/pdf-to-word-content.php'; ?>
            </article>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/docx@7.8.2/build/index.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>

<script>
// JavaScript for PDF to Word Converter - High Fidelity Version
// Uses pdf2docx Python library on server for best results
    pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js';

    let files = [];
    let currentFile = null;
    let conversionHistory = JSON.parse(localStorage.getItem('pdfToWordHistory')) || [];
    
    // Check if server-side conversion is available
    const USE_SERVER_CONVERSION = true; // Set to true to use Python pdf2docx

    // Initialize drag and drop
    document.addEventListener('DOMContentLoaded', function() {
        const uploadArea = document.getElementById('uploadArea');
        
        uploadArea.addEventListener('dragover', function(e) {
            e.preventDefault();
            e.stopPropagation();
            this.classList.add('border-primary');
            document.getElementById('upload-heading').textContent = 'Drop your PDF file here';
        });

        uploadArea.addEventListener('dragleave', function(e) {
            e.preventDefault();
            e.stopPropagation();
            this.classList.remove('border-primary');
            document.getElementById('upload-heading').textContent = 'Drag & Drop PDF File Here';
        });

        uploadArea.addEventListener('drop', function(e) {
            e.preventDefault();
            e.stopPropagation();
            this.classList.remove('border-primary');
            document.getElementById('upload-heading').textContent = 'Drag & Drop PDF File Here';
            
            if (e.dataTransfer.files.length) {
                handleFiles(e.dataTransfer.files);
            }
        });

        document.getElementById('pdfUpload').addEventListener('change', function(e) {
            if (this.files.length) {
                handleFiles(this.files);
            }
        });

        // Initialize buttons
        document.getElementById('convertBtn').addEventListener('click', convertPDF);
        document.getElementById('resetBtn').addEventListener('click', resetAll);
        document.getElementById('downloadBtn').addEventListener('click', downloadFile);
        document.getElementById('howToBtn').addEventListener('click', showHowTo);

        // Initialize history display
        displayHistory();
    });

    function handleFiles(selectedFiles) {
        files = Array.from(selectedFiles).filter(file => file.type === 'application/pdf');
        
        if (files.length === 0) {
            Swal.fire('Invalid Files', 'Please upload PDF files only.', 'error');
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
        document.getElementById('wordPreview').innerHTML = `
            <div class="text-center text-muted p-4">
                <i class="fas fa-file-word fa-3x mb-3"></i>
                <p>Preview will appear here after conversion.</p>
            </div>
        `;

        // Show success message
        Swal.fire({
            title: 'File Added',
            text: 'PDF file has been selected for conversion.',
            icon: 'success',
            confirmButtonText: 'OK',
            timer: 1000,
            timerProgressBar: true
        });
    }

    async function convertPDF() {
        if (!currentFile) {
            Swal.fire('No File', 'Please upload a PDF file first.', 'error');
            return;
        }

        const convertBtn = document.getElementById('convertBtn');
        const originalBtnText = convertBtn.innerHTML;
        convertBtn.disabled = true;

        const pageRange = document.getElementById('pageRange').value;
        const outputFormat = document.getElementById('outputFormat').value;
        const contentMode = document.getElementById('contentMode').value;
        const layoutMode = document.getElementById('layoutMode').value;
        const preserveFormatting = document.getElementById('preserveFormatting').checked;

        // Show loading alert
        let timerInterval;
        const swalInstance = Swal.fire({
            title: 'Converting PDF to Word',
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
            // Try server-side conversion first for better fidelity
            if (USE_SERVER_CONVERSION) {
                try {
                    await convertWithServer(currentFile, pageRange, outputFormat, swalInstance);
                    return;
                } catch (serverError) {
                    console.log('Server conversion failed, falling back to client-side:', serverError);
                    // Show warning about fallback
                    Swal.fire({
                        title: 'Using Fallback Mode',
                        text: 'High-fidelity conversion unavailable. Using basic conversion mode. For best results, ensure pdf2docx is properly installed.',
                        icon: 'warning',
                        timer: 3000,
                        timerProgressBar: true
                    });
                    // Fall back to client-side conversion
                }
            }
            
            // Client-side fallback conversion
            await convertWithClientSide(currentFile, pageRange, outputFormat, contentMode, preserveFormatting, swalInstance);
            
        } catch (error) {
            console.error('Conversion error:', error);
            Swal.fire('Error', 'Failed to convert the PDF file: ' + error.message, 'error');
            convertBtn.innerHTML = originalBtnText;
            convertBtn.disabled = false;
            swalInstance.close();
        }
    }
    
    async function convertWithServer(file, pageRange, outputFormat, swalInstance) {
        const formData = new FormData();
        formData.append('pdfFile', file);
        if (pageRange && pageRange !== '1-') {
            formData.append('PageRange', pageRange);
        }
        formData.append('StoreFile', 'true');
        
        const apiUrl = window.BASE_URL + 'api/convert-pdf-to-word.php';
        
        const response = await fetch(apiUrl, {
            method: 'POST',
            body: formData
        });
        
        const result = await response.json();
        
        if (!response.ok) {
            console.error('Server conversion error:', result);
            throw new Error(result.Message || 'Server conversion failed');
        }
        
        if (result.success && result.downloadUrl) {
            const fileUrl = result.downloadUrl;
            
            // Download the converted file
            const dlResponse = await fetch(fileUrl);
            const blob = await dlResponse.blob();
            
            currentFile.outputBlob = blob;
            currentFile.outputFormat = outputFormat;
            currentFile.convertedText = 'Document successfully converted via Cloud. Click download to view.';
            
            // Update preview
            document.getElementById('wordPreview').innerHTML = `
                <div class="p-3">
                    <h6 class="mb-3">Document Preview</h6>
                    <div class="border p-3 bg-light rounded" style="max-height: 300px; overflow: auto;">
                        <p class="text-success"><i class="fas fa-check-circle me-2"></i>File converted successfully using high-fidelity conversion.</p>
                        <p class="text-muted">Download to view the full document.</p>
                    </div>
                </div>
            `;
            
            // Add to history
            addToHistory({
                fileName: currentFile.name.replace('.pdf', `.${outputFormat}`),
                date: new Date().toLocaleString(),
                format: outputFormat,
                content: 'Server conversion'
            });
            
            document.getElementById('downloadBtn').disabled = false;
            document.getElementById('convertBtn').disabled = false;
            
            swalInstance.close();
            Swal.fire({
                title: 'Success!',
                text: 'PDF converted to Word successfully with high fidelity!',
                icon: 'success',
                confirmButtonText: 'OK',
                timer: 1500,
                timerProgressBar: true
            });
        } else {
            throw new Error('Conversion failed');
        }
    }
    
    async function convertWithClientSide(file, pageRange, outputFormat, contentMode, preserveFormatting, swalInstance) {
        return new Promise((resolve, reject) => {
            const fileReader = new FileReader();
            
            fileReader.onload = async function() {
                try {
                    const arrayBuffer = new Uint8Array(this.result);
                    const pdf = await pdfjsLib.getDocument(arrayBuffer).promise;
                    const pagesToProcess = pageRange ? parsePageRange(pageRange, pdf.numPages) : Array.from({ length: pdf.numPages }, (_, i) => i + 1);
                    
                    // Update page count
                    document.getElementById('pageCount').textContent = `${pagesToProcess.length} pages`;
                    
                    // Build document children array
                    const docChildren = [];
                    let fullText = '';

                    for (const pageNum of pagesToProcess) {
                        const page = await pdf.getPage(pageNum);
                        const textContent = await page.getTextContent();
                        const viewport = page.getViewport({ scale: 1 });
                        
                        // Extract text with positioning to preserve layout
                        const pageParagraphs = extractTextWithLayout(textContent, viewport, preserveFormatting);
                        
                        // Add paragraphs to document
                        for (const para of pageParagraphs) {
                            const textRuns = [];
                            let currentRun = null;
                            
                            for (const run of para.runs) {
                                // Merge consecutive runs with same formatting
                                if (currentRun && 
                                    currentRun.bold === run.bold && 
                                    currentRun.italic === run.italic &&
                                    Math.abs(currentRun.fontSize - run.fontSize) < 2) {
                                    currentRun.text += run.text;
                                } else {
                                    if (currentRun) {
                                        textRuns.push(new docx.TextRun({
                                            text: currentRun.text,
                                            bold: currentRun.bold,
                                            italics: currentRun.italic,
                                            size: currentRun.fontSize * 2,
                                            font: currentRun.fontName || 'Calibri',
                                        }));
                                    }
                                    currentRun = {
                                        text: run.text,
                                        bold: run.bold,
                                        italic: run.italic,
                                        fontSize: run.fontSize,
                                        fontName: run.fontName,
                                    };
                                }
                            }
                            
                            if (currentRun) {
                                textRuns.push(new docx.TextRun({
                                    text: currentRun.text,
                                    bold: currentRun.bold,
                                    italics: currentRun.italic,
                                    size: currentRun.fontSize * 2,
                                    font: currentRun.fontName || 'Calibri',
                                }));
                            }
                            
                            docChildren.push(
                                new docx.Paragraph({
                                    children: textRuns,
                                    alignment: para.alignment,
                                    spacing: {
                                        before: para.spacingBefore || 60,
                                        after: para.spacingAfter || 60,
                                        line: para.lineHeight || 240,
                                    },
                                })
                            );
                            
                            fullText += para.text + '\n';
                        }
                        
                        fullText += '\n';
                        
                        // Add page break between pages (except last)
                        if (pageNum < pagesToProcess[pagesToProcess.length - 1]) {
                            docChildren.push(new docx.Paragraph({ children: [], pageBreakBefore: true }));
                        }
                    }

                    // Create document
                    const doc = new docx.Document({
                        sections: [{
                            properties: {
                                page: {
                                    margin: { top: 1440, right: 1440, bottom: 1440, left: 1440 },
                                },
                            },
                            children: docChildren,
                        }],
                    });

                    // Update preview
                    document.getElementById('wordPreview').innerHTML = `
                        <div class="p-3">
                            <h6 class="mb-3">Document Preview</h6>
                            <div class="border p-3 bg-light rounded" style="max-height: 300px; overflow: auto; white-space: pre-wrap; font-family: monospace;">
                                ${escapeHtml(fullText)}
                            </div>
                        </div>
                    `;

                    const outputBlob = await docx.Packer.toBlob(doc);

                    currentFile.outputBlob = outputBlob;
                    currentFile.outputFormat = outputFormat;
                    currentFile.convertedText = fullText;

                    addToHistory({
                        fileName: currentFile.name.replace('.pdf', `.${outputFormat}`),
                        date: new Date().toLocaleString(),
                        format: outputFormat,
                        content: fullText
                    });

                    document.getElementById('downloadBtn').disabled = false;
                    document.getElementById('convertBtn').disabled = false;
                    
                    swalInstance.close();
                    Swal.fire({
                        title: 'Success!',
                        text: 'PDF converted to Word successfully!',
                        icon: 'success',
                        confirmButtonText: 'OK',
                        timer: 1000,
                        timerProgressBar: true
                    });
                    
                    resolve();
                } catch (error) {
                    reject(error);
                }
            };

            fileReader.onerror = () => reject(new Error('Failed to read file'));
            fileReader.readAsArrayBuffer(file);
        });
    }

    // Helper function to escape HTML for preview
    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    // Extract text with layout preservation
    function extractTextWithLayout(textContent, viewport, preserveFormatting) {
        const items = textContent.items;
        if (items.length === 0) return [{ text: '', runs: [{ text: '' }] }];
        
        // Sort items by vertical position (y), then horizontal (x)
        const sortedItems = items.map(item => {
            const transform = item.transform;
            const x = transform[4];
            const y = transform[5];
            const fontHeight = item.height || 12;
            const fontName = item.fontName || '';
            
            // Estimate font size (PDF uses different units, approximate conversion)
            const fontSize = Math.round(fontHeight * 0.75) || 11;
            
            // Detect text properties from font name
            const fontNameLower = fontName.toLowerCase();
            const isBold = fontNameLower.includes('bold') || 
                          fontNameLower.includes('black') ||
                          fontNameLower.includes('heavy') ||
                          fontNameLower.includes('demi') ||
                          fontNameLower.includes('medium') ||
                          fontNameLower.includes('semibold') ||
                          fontNameLower.includes('extrabold') ||
                          fontNameLower.includes('ultrabold');
            const isItalic = fontNameLower.includes('italic') || 
                            fontNameLower.includes('oblique');
            
            // Detect headings based on font size (larger than 14pt is likely a heading)
            const isHeading = fontSize >= 14;
            
            return {
                text: item.str,
                x: x,
                y: y,
                fontSize: fontSize,
                fontName: fontName,
                bold: isBold,
                italic: isItalic,
                width: item.width || 0,
            };
        }).sort((a, b) => {
            // Group by lines (within 3 pixels vertically)
            const yDiff = Math.abs(a.y - b.y);
            if (yDiff > 3) {
                return b.y - a.y; // Higher y first (PDF coords: origin at bottom)
            }
            return a.x - b.x; // Left to right
        });
        
        // Group items into lines based on vertical position (use smaller threshold for precision)
        const lines = [];
        let currentLine = [];
        let currentY = sortedItems[0]?.y;
        
        for (const item of sortedItems) {
            // Use 2 pixels threshold for more precise line grouping
            if (Math.abs(item.y - currentY) > 2) {
                // New line
                if (currentLine.length > 0) {
                    lines.push(currentLine);
                }
                currentLine = [item];
                currentY = item.y;
            } else {
                currentLine.push(item);
            }
        }
        if (currentLine.length > 0) {
            lines.push(currentLine);
        }
        
        // Group lines into paragraphs based on spacing
        const paragraphs = [];
        let currentParagraph = [];
        let prevLineY = null;
        
        for (let i = 0; i < lines.length; i++) {
            const line = lines[i];
            const lineY = line[0].y;
            
            // Check if this is a new paragraph (larger gap or first line)
            if (prevLineY !== null) {
                const gap = prevLineY - lineY;
                const avgFontSize = line.reduce((sum, item) => sum + item.fontSize, 0) / line.length;
                
                // If gap is significantly larger than line height, start new paragraph
                // Use 1.5x factor for better paragraph detection
                if (gap > avgFontSize * 1.5) {
                    if (currentParagraph.length > 0) {
                        paragraphs.push(currentParagraph);
                    }
                    currentParagraph = [line];
                } else {
                    currentParagraph.push(line);
                }
            } else {
                currentParagraph.push(line);
            }
            prevLineY = lineY;
        }
        
        if (currentParagraph.length > 0) {
            paragraphs.push(currentParagraph);
        }
        
        // Convert paragraphs to our format
        return paragraphs.map(paraLines => {
            const runs = [];
            let paraText = '';
            
            for (const line of paraLines) {
                let lineText = '';
                for (let i = 0; i < line.length; i++) {
                    const item = line[i];
                    const prevItem = line[i - 1];
                    
                    // Add space if there's a significant gap between items
                    // Use smaller threshold (0.15) to better preserve original spacing
                    if (prevItem) {
                        const gap = item.x - (prevItem.x + prevItem.width);
                        const spaceThreshold = item.fontSize * 0.15;
                        if (gap > spaceThreshold) {
                            // Add multiple spaces for larger gaps to preserve spacing
                            const spacesNeeded = Math.max(1, Math.round(gap / (item.fontSize * 0.4)));
                            lineText += ' '.repeat(spacesNeeded);
                        }
                    }
                    
                    lineText += item.text;
                    
                    // Create run for this text segment
                    // Handle special characters and preserve them
                    let cleanText = item.text;
                    
                    runs.push({
                        text: cleanText,
                        bold: item.bold || item.fontSize >= 14, // Treat larger text as bold (headings)
                        italic: item.italic,
                        fontSize: item.fontSize,
                        fontName: item.fontName,
                    });
                }
                paraText += lineText + ' ';
            }
            
            // Detect alignment based on item positions
            const firstLine = paraLines[0];
            const lastItem = firstLine[firstLine.length - 1];
            const firstItem = firstLine[0];
            const contentWidth = lastItem.x + lastItem.width - firstItem.x;
            const pageWidth = viewport.width;
            const leftMargin = firstItem.x;
            const rightMargin = pageWidth - (lastItem.x + lastItem.width);
            
            let alignment = docx.AlignmentType.LEFT;
            if (preserveFormatting) {
                // More precise alignment detection with adjusted thresholds
                const centerThreshold = pageWidth * 0.08; // 8% of page width
                if (Math.abs(leftMargin - rightMargin) < centerThreshold && leftMargin > 50) {
                    alignment = docx.AlignmentType.CENTER;
                } else if (rightMargin < 80 && leftMargin > pageWidth * 0.3) {
                    alignment = docx.AlignmentType.RIGHT;
                } else if (contentWidth > pageWidth * 0.75 && leftMargin < pageWidth * 0.15) {
                    alignment = docx.AlignmentType.JUSTIFIED;
                }
            }
            
            // Calculate paragraph spacing based on actual layout
            const firstLineFontSize = paraLines[0][0].fontSize;
            const lastLineFontSize = paraLines[paraLines.length - 1][0].fontSize;
            
            // Check if this is a heading paragraph (all runs are bold or large font)
            const isHeadingPara = paraLines.every(line => 
                line.every(item => item.fontSize >= 14 || item.bold)
            );
            
            return {
                text: paraText.trim(),
                runs: runs,
                alignment: alignment,
                spacingBefore: isHeadingPara ? firstLineFontSize * 16 : firstLineFontSize * 10,
                spacingAfter: isHeadingPara ? lastLineFontSize * 12 : lastLineFontSize * 6,
                lineHeight: 240, // Single line spacing (240 twips = 1.0 line height)
            };
        });
    }

    function downloadFile() {
        if (!currentFile || !currentFile.outputBlob) {
            Swal.fire('No File', 'Please convert a file first.', 'error');
            return;
        }

        const a = document.createElement('a');
        a.href = URL.createObjectURL(currentFile.outputBlob);
        a.download = currentFile.name.replace('.pdf', '') + '.' + currentFile.outputFormat;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);

        Swal.fire({
            title: 'Download Started',
            text: 'Your Word file is being downloaded.',
            icon: 'success',
            timer: 1000,
            timerProgressBar: true
        });
    }

    function resetAll() {
        files = [];
        currentFile = null;
        document.getElementById('pdfUpload').value = '';
        document.getElementById('fileInfo').textContent = 'No file selected.';
        document.getElementById('convertBtn').disabled = true;
        document.getElementById('downloadBtn').disabled = true;
        document.getElementById('pageRange').value = '1-';
        document.getElementById('outputFormat').value = 'docx';
        document.getElementById('contentMode').value = 'text';
        document.getElementById('layoutMode').value = 'flow';
        document.getElementById('preserveFormatting').checked = true;
        document.getElementById('pageCount').textContent = '';
        
        document.getElementById('wordPreview').innerHTML = `
            <div class="text-center text-muted p-4">
                <i class="fas fa-file-word fa-3x mb-3"></i>
                <p>Preview will appear here after conversion.</p>
            </div>
        `;
    }

    function showHowTo() {
        Swal.fire({
            title: 'How to Convert PDF to Word',
            html: `
                <ol class="text-start">
                    <li>Drag and drop your PDF file into the upload area or click "Select PDF Files"</li>
                    <li>Adjust conversion options if needed (page range, output format, etc.)</li>
                    <li>Click "Convert to Word" button</li>
                    <li>Once conversion is complete, click "Download" to save your Word file</li>
                </ol>
                <p class="mt-3"><strong>High-Fidelity Mode:</strong> This converter uses Python's pdf2docx library for best results, preserving text, symbols, spacing, and layout exactly as in the original PDF.</p>
                <p class="text-muted small">If high-fidelity mode is unavailable, it will fall back to basic conversion.</p>
            `,
            icon: 'info',
            confirmButtonText: 'Got it!'
        });
    }

    function parsePageRange(range, totalPages) {
        const pages = new Set();
        const parts = range.split(',');
        
        for (const part of parts) {
            if (part.includes('-')) {
                const [start, end] = part.split('-').map(Number);
                const realStart = start || 1;
                const realEnd = end || totalPages;
                
                for (let i = Math.max(1, realStart); i <= Math.min(totalPages, realEnd); i++) {
                    pages.add(i);
                }
            } else {
                const page = Number(part);
                if (page >= 1 && page <= totalPages) {
                    pages.add(page);
                }
            }
        }
        
        return Array.from(pages).sort((a, b) => a - b);
    }

    // History Functions
    function addToHistory(item) {
        const historyItem = {
            id: Date.now(),
            fileName: item.fileName,
            date: item.date,
            format: item.format,
            content: item.content
        };

        conversionHistory.unshift(historyItem);
        if (conversionHistory.length > 5) {
            conversionHistory.pop();
        }

        localStorage.setItem('pdfToWordHistory', JSON.stringify(conversionHistory));
        displayHistory();
    }

    function displayHistory() {
        if (conversionHistory.length === 0) {
            document.getElementById('historyContainer').style.display = 'none';
            return;
        }

        const historyList = document.getElementById('historyList');
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

        document.getElementById('historyContainer').style.display = 'block';
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
                localStorage.setItem('pdfToWordHistory', JSON.stringify(conversionHistory));
                displayHistory();
                Swal.fire('Deleted!', 'The conversion has been removed from history.', 'success');
            }
        });
    }

    function downloadHistoryItem(id) {
        const item = conversionHistory.find(item => item.id === id);
        if (!item) return;

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
            try {
                const blob = new Blob([item.content], { type: 'text/plain' });
                const url = URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = item.fileName.replace('.docx', '.txt').replace('.doc', '.txt').replace('.rtf', '.txt');
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);

                Swal.fire({
                    title: 'Download Complete',
                    text: 'Your file has been downloaded.',
                    icon: 'success',
                    confirmButtonText: 'OK',
                    timer: 1000,
                    timerProgressBar: true
                });
            } catch (error) {
                Swal.fire({
                    title: 'Download Error',
                    text: 'Failed to download the file.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        }, 1500);
    }

    function previewHistoryItem(id) {
        const item = conversionHistory.find(item => item.id === id);
        if (!item) return;

        document.getElementById('wordPreview').innerHTML = `
            <div class="p-3">
                <h6 class="mb-3">Preview of ${item.fileName}</h6>
                <div class="border p-3 bg-light rounded" style="max-height: 300px; overflow: auto;">
                    ${item.content.replace(/\n/g, '<br>')}
                </div>
            </div>
        `;

        Swal.fire({
            title: 'History Preview',
            text: `Showing preview of ${item.fileName}`,
            icon: 'info',
            timer: 1000,
            timerProgressBar: true
        });
    }
</script>



<?php include '../../includes/footer.php'; ?>