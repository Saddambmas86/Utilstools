<?php
// Get the current slug from the URI
$current_uri = $_SERVER['REQUEST_URI'];
$slug = basename(parse_url($current_uri, PHP_URL_PATH));

// SEO Cluster Mapping
$seo_cluster = [
    'compare-two-text-files-online' => [
        'title' => 'Compare Two Text Files Online – Fast & Free Diff Tool',
        'description' => 'Easily compare two text files online. Our free tool highlights differences between documents side-by-side. No signup required.',
        'keywords' => 'compare text files, online diff tool, file comparison, text differences'
    ],
    'compare-text-line-by-line' => [
        'title' => 'Compare Text Line by Line Online – Accurate Diff Checker',
        'description' => 'Compare text line by line to find exact changes, additions, and deletions. Perfect for detailed document review and proofreading.',
        'keywords' => 'line by line comparison, text diff, compare lines, document review'
    ],
    'compare-json-files-online' => [
        'title' => 'Compare JSON Files Online – JSON Diff & Checker',
        'description' => 'Find differences between two JSON objects or files. Our online JSON comparison tool highlights structural and value changes instantly.',
        'keywords' => 'compare json, json diff, online json checker, json comparison'
    ],
    'compare-xml-files-online' => [
        'title' => 'Compare XML Files Online – XML Diff Tool',
        'description' => 'Compare two XML files or strings online. Identify changes in tags, attributes, and content with our specialized XML comparison tool.',
        'keywords' => 'compare xml, xml diff tool, online xml checker, xml differences'
    ],
    'compare-html-files-online' => [
        'title' => 'Compare HTML Files Online – HTML Code Diff Tool',
        'description' => 'Compare HTML code snippets or files. Detect changes in tags and structure with side-by-side highlighting for web developers.',
        'keywords' => 'compare html, html diff, online html checker, code comparison'
    ],
    'compare-css-files-online' => [
        'title' => 'Compare CSS Files Online – CSS Style Diff Checker',
        'description' => 'Quickly compare two CSS files to find changes in styles, selectors, and properties. Ideal for debugging web layouts.',
        'keywords' => 'compare css, css diff, online css checker, style comparison'
    ],
    'compare-code-files-online' => [
        'title' => 'Compare Code Files Online – Developer Diff Tool',
        'description' => 'A powerful online code comparison tool for developers. Compare JS, Python, HTML, CSS, and more with syntax-friendly highlighting.',
        'keywords' => 'compare code, code diff tool, online developer tool, syntax comparison'
    ],
    'online-text-diff-tool' => [
        'title' => 'Online Text Diff Tool – Compare Text for Free',
        'description' => 'Use our reliable online text diff tool to compare any two pieces of text. Fast, secure, and preserves your privacy.',
        'keywords' => 'online diff tool, text diff, compare text online, free diff checker'
    ],
    'text-difference-checker' => [
        'title' => 'Text Difference Checker – Find Changes Instantly',
        'description' => 'The most accurate text difference checker online. Easily detect modified, added, or removed text between two versions.',
        'keywords' => 'text difference checker, change detector, compare versions, diff tool'
    ],
    'compare-text-documents' => [
        'title' => 'Compare Text Documents Online – Legal & Business',
        'description' => 'Compare legal contracts, business reports, or essays. Detect even the smallest changes between document versions with ease.',
        'keywords' => 'compare documents, document diff, legal contract comparison, business document tool'
    ],
    'text-comparison' => [
        'title' => 'Text Comparison Tool – Compare Two Texts',
        'description' => 'Free text comparison tool online. Compare two texts side by side and highlight differences, additions, and deletions. Perfect for proofreading and code review.',
        'keywords' => 'text comparison, text utilities, word counter, case converter, text tool, online text editor, formatting, wordscompare'
    ]
];

// Set metadata based on slug
if (isset($seo_cluster[$slug])) {
    $page_title = $seo_cluster[$slug]['title'];
    $page_description = $seo_cluster[$slug]['description'];
    $page_keywords = $seo_cluster[$slug]['keywords'];
} else {
    // Default values
    $page_title = "Compare Two Text Files Online – Free Text Comparison Tool";
    $page_description = "Free text comparison tool online. Compare two texts side by side and highlight differences, additions, and deletions. Perfect for proofreading and code review.";
    $page_keywords = "text comparison, text utilities, word counter, case converter, text tool, online text editor, formatting, wordscompare";
}

$page_key = 'text-comparison';
include '../../includes/header.php';
?>

<main class="container-fluid px-1 py-1">
    <!-- Header -->
    <div class="text-center mb-1">
        <h1 class="h6 mb-0"><i class="fas fa-exchange-alt text-success"></i> <?php echo isset($seo_cluster[$slug]) ? explode(' –', $page_title)[0] : 'Text Compare!'; ?></h1>
        <p class="text-muted" style="font-size: 10px; margin-bottom: 2px;">
            <?php echo isset($seo_cluster[$slug]) ? $page_description : 'Compare two versions of a text to find differences.'; ?>
        </p>
    </div>

    <!-- Comparison Results (shown after compare) -->
    <div id="resultsArea" class="mb-4" style="display: none;">
        <div class="d-flex justify-content-between align-items-center mb-2">
            <h5 class="m-0">Comparison Results</h5>
            <div class="diff-nav">
                <button id="prevDiff" class="btn btn-xs btn-outline-secondary" title="Previous difference">
                    <i class="fas fa-chevron-up"></i>
                </button>
                <span id="diffCounter" class="mx-2 text-muted small">0/0</span>
                <button id="nextDiff" class="btn btn-xs btn-outline-secondary" title="Next difference">
                    <i class="fas fa-chevron-down"></i>
                </button>
            </div>
        </div>
        <div class="comparison-table-wrapper border rounded">
            <table class="comparison-table w-100">
                <thead>
                    <tr class="header-row">
                        <th class="line-num-col">#</th>
                        <th class="indicator-col"></th>
                        <th class="content-col">Original Text</th>
                        <th class="line-num-col">#</th>
                        <th class="indicator-col"></th>
                        <th class="content-col">Modified Text</th>
                    </tr>
                </thead>
                <tbody id="comparisonBody"></tbody>
            </table>
        </div>
    </div>

    <!-- Input Area -->
    <div class="row g-0 mb-1">
        <!-- Left Text Area -->
        <div class="col-6">
            <div
                class="text-area-header bg-light border border-end-0 p-2 d-flex justify-content-between align-items-center">
                <span class="small fw-bold text-muted">Original Text</span>
                <small class="text-muted">Chars: <span id="char1">0</span></small>
            </div>
            <textarea id="text1" class="form-control border-end-0 rounded-0" rows="8"
                placeholder="Paste one version of a text here."
                style="font-family: 'Consolas', 'Monaco', 'Courier New', monospace; resize: vertical; font-size: 12px; padding: 4px;"></textarea>
        </div>

        <!-- Right Text Area -->
        <div class="col-6">
            <div class="text-area-header bg-light border p-2 d-flex justify-content-between align-items-center">
                <span class="small fw-bold text-muted">Modified Text</span>
                <small class="text-muted">Chars: <span id="char2">0</span></small>
            </div>
            <textarea id="text2" class="form-control border rounded-0" rows="8"
                placeholder="Paste another version of the text here."
                style="font-family: 'Consolas', 'Monaco', 'Courier New', monospace; resize: vertical; font-size: 12px; padding: 4px;"></textarea>
        </div>
    </div>

    <!-- Control Buttons -->
    <div class="row align-items-center mb-2">
        <div class="col-md-8">
            <div class="d-flex flex-wrap gap-2">
                <button id="compareBtn" class="btn btn-success btn-sm">
                    <i class="fas fa-check me-1"></i>Compare!
                </button>
                <button id="swapBtn" class="btn btn-outline-secondary btn-sm">
                    <i class="fas fa-exchange-alt me-1"></i>Switch
                </button>
                <button id="clearBtn" class="btn btn-outline-secondary btn-sm">
                    <i class="fas fa-trash-alt me-1"></i>Clear
                </button>
            </div>
            <small class="text-muted mt-1 d-block">
                <i class="fas fa-keyboard me-1"></i>Shortcuts: Ctrl+Alt+C = Compare, Ctrl+Alt+S = Switch, Ctrl+Alt+R =
                Clear
            </small>
        </div>
        <div class="col-md-4 text-md-end mt-2 mt-md-0">
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="ignoreCase">
                <label class="form-check-label small" for="ignoreCase">Ignore case</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="ignoreSpaces">
                <label class="form-check-label small" for="ignoreSpaces">Ignore spaces</label>
            </div>
        </div>
    </div>

    <!-- Inline Preview -->
    <div id="inlinePreview" class="mb-2" style="display: none;">
        <div class="border rounded p-1 bg-light">
            <h6 class="text-muted" style="font-size: 10px; margin-bottom: 1px;"><i class="fas fa-eye me-2"></i>Quick
                Preview</h6>
            <div id="previewContent" class="font-monospace" style="font-size: 11px;"></div>
        </div>
    </div>
</main>

<style>
    /* Text Compare Styles - matching text-compare.com */
    .text-area-header {
        border-bottom: none;
        background: #f8f9fa !important;
        padding: 2px 8px !important;
    }

    .comparison-table-wrapper {
        background: #fff;
    }

    .comparison-table {
        border-collapse: collapse;
        font-family: 'Consolas', 'Monaco', 'Courier New', monospace;
        font-size: 11px;
        line-height: 1.1;
        table-layout: fixed;
        width: 100%;
    }

    .comparison-table th,
    .comparison-table td {
        padding: 3px !important;
        border: 1px solid #e0e0e0;
        vertical-align: top;
        line-height: 1;
    }

    .comparison-table .content-cell {
        white-space: pre-wrap;
        word-break: break-all;
        min-height: 14px;
    }

    .comparison-table .header-row {
        background: #f5f5f5;
        font-weight: bold;
    }

    .comparison-table .header-row th {
        text-align: center;
        padding: 2px;
        border-bottom: 2px solid #ddd;
    }

    .comparison-table .line-num-col {
        width: 30px;
        text-align: right;
        background: #f8f8f8;
        color: #666;
        font-size: 10px;
    }

    .comparison-table .indicator-col {
        width: 15px;
        text-align: center;
        background: #f8f8f8;
        font-size: 10px;
    }

    .comparison-table .content-col {
        width: calc(50% - 45px);
        background: #fff;
    }

    /* Line number styling */
    .comparison-table .line-num {
        color: #999;
        text-align: right;
    }

    .comparison-table .line-num.has-diff {
        background: #d4edda;
        color: #155724;
        font-weight: bold;
    }

    .comparison-table .line-num-link {
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 2px;
    }

    .comparison-table .line-num-link:hover {
        color: #ff9800;
    }

    .comparison-table .line-num-link i {
        font-size: 10px;
        color: #ff9800;
    }

    /* Indicator arrows */
    .comparison-table .indicator {
        color: #28a745;
        font-weight: bold;
    }

    .comparison-table .indicator.removed {
        color: #dc3545;
    }

    .comparison-table .diff-arrow {
        color: #ff9800;
        cursor: pointer;
        font-size: 10px;
        margin-left: 2px;
        display: block;
        margin-top: 2px;
    }

    .comparison-table .diff-arrow:hover {
        color: #f57c00;
        transform: scale(1.2);
    }

    /* Content cells with differences */
    .comparison-table .content-cell {
        background: #fff;
    }

    .comparison-table .content-cell.has-diff-left {
        background: #ffebee;
    }

    .comparison-table .content-cell.has-diff-right {
        background: #e8f5e9;
    }

    /* Difference highlighting */
    .diff-highlight {
        background-color: #A9D0F5;
        padding: 0 1px;
    }

    .diff-added {
        background-color: #a5d6a7;
        padding: 0 1px;
    }

    .diff-removed {
        background-color: #ef9a9a;
        text-decoration: line-through;
        padding: 0 1px;
    }

    .empty-line-strike {
        position: relative;
        height: 6px;
    }

    .empty-line-strike::after {
        content: "";
        position: absolute;
        top: 50%;
        left: 0;
        right: 0;
        height: 1px;
        background-color: #ef9a9a;
    }

    /* Navigation buttons */
    .diff-nav button {
        width: 24px;
        height: 24px;
        padding: 0;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 10px;
    }

    .btn-xs {
        padding: 1px 5px;
        font-size: 10px;
        border-radius: 2px;
    }

    /* Textarea focus */
    textarea:focus {
        box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
        border-color: #28a745;
    }

    /* Dark mode support */
    [data-bs-theme="dark"] .text-area-header {
        background: #212529 !important;
        border-color: #495057 !important;
    }

    [data-bs-theme="dark"] .comparison-table-wrapper {
        background: #1a1d20;
    }

    [data-bs-theme="dark"] .comparison-table th,
    [data-bs-theme="dark"] .comparison-table td {
        border-color: #495057;
    }

    [data-bs-theme="dark"] .comparison-table .header-row {
        background: #2d333b;
    }

    [data-bs-theme="dark"] .comparison-table .line-num-col,
    [data-bs-theme="dark"] .comparison-table .indicator-col {
        background: #2d333b;
        color: #8b949e;
    }

    [data-bs-theme="dark"] .comparison-table .line-num.has-diff {
        background: #238636;
        color: #fff;
    }

    [data-bs-theme="dark"] .comparison-table .content-cell {
        background: #1a1d20;
        color: #c9d1d9;
    }

    [data-bs-theme="dark"] .comparison-table .content-cell.has-diff-left {
        background: rgba(248, 81, 73, 0.15);
    }

    [data-bs-theme="dark"] .comparison-table .content-cell.has-diff-right {
        background: rgba(46, 160, 67, 0.15);
    }

    [data-bs-theme="dark"] .diff-highlight {
        background-color: rgba(56, 139, 253, 0.4);
    }

    [data-bs-theme="dark"] .diff-added {
        background-color: rgba(46, 160, 67, 0.4);
    }

    [data-bs-theme="dark"] .diff-removed {
        background-color: rgba(248, 81, 73, 0.4);
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const text1 = document.getElementById('text1');
        const text2 = document.getElementById('text2');
        const compareBtn = document.getElementById('compareBtn');
        const swapBtn = document.getElementById('swapBtn');
        const clearBtn = document.getElementById('clearBtn');
        const resultsArea = document.getElementById('resultsArea');
        const comparisonBody = document.getElementById('comparisonBody');
        const prevDiffBtn = document.getElementById('prevDiff');
        const nextDiffBtn = document.getElementById('nextDiff');
        const diffCounter = document.getElementById('diffCounter');
        const inlinePreview = document.getElementById('inlinePreview');
        const previewContent = document.getElementById('previewContent');

        let diffLocations = [];
        let currentDiffIndex = -1;

        // Update character count
        function updateCount() {
            document.getElementById('char1').textContent = text1.value.length;
            document.getElementById('char2').textContent = text2.value.length;
        }

        text1.addEventListener('input', updateCount);
        text2.addEventListener('input', updateCount);

        // Swap texts
        swapBtn.addEventListener('click', function () {
            const temp = text1.value;
            text1.value = text2.value;
            text2.value = temp;
            updateCount();
            if (resultsArea.style.display !== 'none') {
                compareTexts();
            }
        });

        // Clear all
        clearBtn.addEventListener('click', function () {
            text1.value = '';
            text2.value = '';
            resultsArea.style.display = 'none';
            inlinePreview.style.display = 'none';
            updateCount();
            text1.focus();
        });

        // Compare button
        compareBtn.addEventListener('click', function () {
            compareTexts();
        });

        // Keyboard shortcuts
        document.addEventListener('keydown', function (e) {
            if (e.ctrlKey && e.altKey) {
                switch (e.key.toLowerCase()) {
                    case 'c':
                        e.preventDefault();
                        compareTexts();
                        break;
                    case 's':
                        e.preventDefault();
                        swapBtn.click();
                        break;
                    case 'r':
                        e.preventDefault();
                        clearBtn.click();
                        break;
                }
            }
        });

        // Navigation buttons
        prevDiffBtn.addEventListener('click', function () {
            if (diffLocations.length > 0) {
                currentDiffIndex = (currentDiffIndex - 1 + diffLocations.length) % diffLocations.length;
                scrollToDiff(currentDiffIndex);
            }
        });

        nextDiffBtn.addEventListener('click', function () {
            if (diffLocations.length > 0) {
                currentDiffIndex = (currentDiffIndex + 1) % diffLocations.length;
                scrollToDiff(currentDiffIndex);
            }
        });

        function scrollToDiff(index) {
            const rows = comparisonBody.querySelectorAll('tr');
            if (rows[diffLocations[index]]) {
                rows[diffLocations[index]].scrollIntoView({ behavior: 'smooth', block: 'center' });
                updateDiffCounter();
            }
        }

        function updateDiffCounter() {
            diffCounter.textContent = diffLocations.length > 0 ?
                `${currentDiffIndex + 1}/${diffLocations.length}` : '0/0';
        }

        function compareTexts() {
            if (!text1.value && !text2.value) {
                alert('Please enter text in at least one field');
                return;
            }

            const lines1 = text1.value.split('\n');
            const lines2 = text2.value.split('\n');

            // Apply options for comparison logic
            const ignoreCase = document.getElementById('ignoreCase').checked;
            const ignoreSpaces = document.getElementById('ignoreSpaces').checked;

            function normalize(str) {
                if (str === undefined) return undefined;
                let s = str;
                if (ignoreCase) s = s.toLowerCase();
                if (ignoreSpaces) s = s.replace(/\s+/g, ' ').trim();
                return s;
            }

            const compareLines1 = lines1.map(normalize);
            const compareLines2 = lines2.map(normalize);

            // Longest Common Subsequence based Diff
            function getDiff(a, b) {
                const m = a.length;
                const n = b.length;
                const matrix = Array.from({ length: m + 1 }, () => new Int32Array(n + 1));

                for (let i = 1; i <= m; i++) {
                    for (let j = 1; j <= n; j++) {
                        if (a[i - 1] === b[j - 1]) {
                            matrix[i][j] = matrix[i - 1][j - 1] + 1;
                        } else {
                            matrix[i][j] = Math.max(matrix[i - 1][j], matrix[i][j - 1]);
                        }
                    }
                }

                const diff = [];
                let i = m, j = n;
                while (i > 0 || j > 0) {
                    if (i > 0 && j > 0 && a[i - 1] === b[j - 1]) {
                        diff.unshift({ type: 'equal', value1: lines1[i - 1], value2: lines2[j - 1], index1: i - 1, index2: j - 1 });
                        i--; j--;
                    } else if (j > 0 && (i === 0 || matrix[i][j - 1] >= matrix[i - 1][j])) {
                        diff.unshift({ type: 'add', value: lines2[j - 1], index: j - 1 });
                        j--;
                    } else {
                        diff.unshift({ type: 'remove', value: lines1[i - 1], index: i - 1 });
                        i--;
                    }
                }
                return diff;
            }

            const diffResult = getDiff(compareLines1, compareLines2);

            // Check if texts are identical
            const isIdentical = !diffResult.some(item => item.type !== 'equal');
            if (isIdentical) {
                Swal.fire({
                    icon: 'success',
                    title: '<span style="color: #28a745;">Perfect Match!</span>',
                    html: '<div style="font-size: 1.1rem; color: #555;">Both side texts are <strong style="color: #28a745;">exactly the same</strong>.</div>',
                    confirmButtonText: '<i class="fas fa-check-circle me-1"></i> Understood',
                    confirmButtonColor: '#28a745',
                    background: '#fff',
                    customClass: {
                        popup: 'shadow-lg border-0 rounded-4',
                        title: 'fw-bold',
                        confirmButton: 'btn btn-success px-4 rounded-pill'
                    },
                    buttonsStyling: false,
                    showClass: {
                        popup: 'animate__animated animate__fadeInDown'
                    },
                    hideClass: {
                        popup: 'animate__animated animate__fadeOutUp'
                    }
                });
            }

            let html = '';
            diffLocations = [];
            let displayIndex = 0;

            diffResult.forEach((item, i) => {
                const hasDiff = item.type !== 'equal';
                if (hasDiff) {
                    diffLocations.push(displayIndex);
                }

                let leftLineNum = '', leftIndicator = '', leftContent = '', leftClass = '';
                let rightLineNum = '', rightIndicator = '', rightContent = '', rightClass = '';

                if (item.type === 'equal') {
                    leftLineNum = item.index1 + 1;
                    leftContent = escapeHtml(item.value1);
                    rightLineNum = item.index2 + 1;
                    rightContent = escapeHtml(item.value2);
                } else if (item.type === 'remove') {
                    leftLineNum = item.index + 1;
                    leftIndicator = '<span class="indicator removed">-</span>';
                    leftContent = escapeHtml(item.value);
                    leftClass = 'has-diff-left';
                    leftLineNum = `<span class="line-num-link" data-display-index="${displayIndex}">${leftLineNum}</span>`;
                } else if (item.type === 'add') {
                    rightLineNum = item.index + 1;
                    rightIndicator = '<span class="indicator">+</span>';
                    rightContent = escapeHtml(item.value);
                    rightClass = 'has-diff-right';
                    rightLineNum = `<span class="line-num-link" data-display-index="${displayIndex}">${rightLineNum}</span>`;
                }

                // Look ahead to see if we can pair a removal with an addition for inline highlighting
                if (item.type === 'remove' && diffResult[i + 1] && diffResult[i + 1].type === 'add') {
                    // This will be handled in the next iteration or we could handle it here.
                    // For simplicity in a side-by-side view, we often just show them as a row if they were meant to be a replacement.
                    // However, LCS naturally separates them if they are too different.
                    // Let's try to pair them if they are adjacent in the diff result.
                }

                html += `
                <tr data-display-index="${displayIndex}">
                    <td class="line-num ${hasDiff && item.type === 'remove' ? 'has-diff' : ''}">${leftLineNum}</td>
                    <td class="indicator-col">${leftIndicator}</td>
                    <td class="content-cell ${leftClass}">${leftContent || (item.type === 'add' ? '&nbsp;' : '')}</td>
                    <td class="line-num ${hasDiff && item.type === 'add' ? 'has-diff' : ''}">${rightLineNum}</td>
                    <td class="indicator-col">${rightIndicator}</td>
                    <td class="content-cell ${rightClass}">${rightContent || (item.type === 'remove' ? '&nbsp;' : '')}</td>
                </tr>
            `;
                displayIndex++;
            });

            // Refined pass to pair removals and additions that are likely replacements
            // Actually, let's keep it simple first: just follow the LCS output.
            // But the user's screenshot shows them side-by-side. 
            // LCS 'remove' followed by 'add' is a common pattern for "changed line".

            const refinedDiff = [];
            let i = 0;
            while (i < diffResult.length) {
                if (diffResult[i].type === 'equal') {
                    refinedDiff.push(diffResult[i]);
                    i++;
                } else {
                    // Collect contiguous removals and additions
                    const removals = [];
                    const additions = [];

                    while (i < diffResult.length && diffResult[i].type !== 'equal') {
                        if (diffResult[i].type === 'remove') {
                            removals.push(diffResult[i]);
                        } else {
                            additions.push(diffResult[i]);
                        }
                        i++;
                    }

                    // Pair them as changes
                    const commonCount = Math.min(removals.length, additions.length);
                    for (let j = 0; j < commonCount; j++) {
                        refinedDiff.push({
                            type: 'change',
                            value1: removals[j].value,
                            value2: additions[j].value,
                            index1: removals[j].index,
                            index2: additions[j].index
                        });
                    }

                    // Add remaining removals
                    for (let j = commonCount; j < removals.length; j++) {
                        refinedDiff.push(removals[j]);
                    }

                    // Add remaining additions
                    for (let j = commonCount; j < additions.length; j++) {
                        refinedDiff.push(additions[j]);
                    }
                }
            }

            html = '';
            diffLocations = [];
            refinedDiff.forEach((item, i) => {
                const hasDiff = item.type !== 'equal';
                const displayIdx = i;
                if (hasDiff) {
                    diffLocations.push(displayIdx);
                }

                let leftLineNum = '', leftIndicator = '', leftContent = '', leftClass = '';
                let rightLineNum = '', rightIndicator = '', rightContent = '', rightClass = '';

                // Calculate next diff for navigation
                const diffIdx = diffLocations.indexOf(displayIdx);
                const isActuallyLast = hasDiff && diffIdx === diffLocations.length - 1;
                // Note: diffLocations isn't full yet, so we'll need a different way to handle "next" arrows if we want them inside the row.
                // Let's add the arrows after generating the whole thing or use a post-processing step.

                if (item.type === 'equal') {
                    leftLineNum = item.index1 + 1;
                    leftContent = escapeHtml(item.value1);
                    rightLineNum = item.index2 + 1;
                    rightContent = escapeHtml(item.value2);
                } else if (item.type === 'remove') {
                    leftLineNum = item.index + 1;
                    leftIndicator = '<span class="indicator removed">-</span>';
                    leftContent = highlightDiffChars(item.value, '', true);
                    leftClass = 'has-diff-left';
                } else if (item.type === 'add') {
                    rightLineNum = item.index + 1;
                    rightIndicator = '<span class="indicator">+</span>';
                    rightContent = highlightDiffChars(item.value, '', false);
                    rightClass = 'has-diff-right';
                } else if (item.type === 'change') {
                    leftLineNum = item.index1 + 1;
                    leftIndicator = '<span class="indicator removed">-</span>';
                    leftContent = highlightDiffChars(item.value1, item.value2, true);
                    leftClass = 'has-diff-left';

                    rightLineNum = item.index2 + 1;
                    rightIndicator = '<span class="indicator">+</span>';
                    rightContent = highlightDiffChars(item.value2, item.value1, false);
                    rightClass = 'has-diff-right';
                }

                html += `<tr data-display-index="${displayIdx}">` +
                    `<td class="line-num ${hasDiff && (item.type === 'remove' || item.type === 'change') ? 'has-diff' : ''}">` +
                    `${hasDiff && (item.type === 'remove' || item.type === 'change') ? `<span class="line-num-link" data-display-index="${displayIdx}">${leftLineNum}</span>` : leftLineNum}` +
                    `</td>` +
                    `<td class="indicator-col">${leftIndicator}</td>` +
                    `<td class="content-cell ${leftClass}">${leftContent || (item.type === 'add' ? '<div class="empty-line-strike"></div>' : '')}</td>` +
                    `<td class="line-num ${hasDiff && (item.type === 'add' || item.type === 'change') ? 'has-diff' : ''}">` +
                    `${hasDiff && (item.type === 'add' || item.type === 'change') ? `<span class="line-num-link" data-display-index="${displayIdx}">${rightLineNum}</span>` : rightLineNum}` +
                    `</td>` +
                    `<td class="indicator-col">${rightIndicator}</td>` +
                    `<td class="content-cell ${rightClass}">${rightContent || (item.type === 'remove' ? '<div class="empty-line-strike"></div>' : '')}</td>` +
                    `</tr>`;
            });

            comparisonBody.innerHTML = html;

            // Post-process to add navigation arrows to indicators
            diffLocations.forEach((loc, idx) => {
                const row = comparisonBody.querySelector(`tr[data-display-index="${loc}"]`);
                if (row) {
                    const nextLoc = diffLocations[(idx + 1) % diffLocations.length];
                    const isLast = idx === diffLocations.length - 1;
                    const arrowIcon = isLast ? 'fa-arrow-up' : 'fa-arrow-down';
                    const arrowTitle = isLast ? 'Back to first difference' : 'Next difference';

                    const indicators = row.querySelectorAll('.indicator-col');
                    indicators.forEach(col => {
                        if (col.innerHTML.trim() !== '') {
                            col.innerHTML += `<i class="fas ${arrowIcon} diff-arrow" data-next-display-index="${nextLoc}" title="${arrowTitle}"></i>`;
                        }
                    });

                    // Also update line-num-link with next data
                    row.querySelectorAll('.line-num-link').forEach(link => {
                        link.dataset.nextDisplayIndex = nextLoc;
                        link.innerHTML += ` <i class="fas ${isLast ? 'fa-caret-up' : 'fa-caret-down'}"></i>`;
                        link.title = isLast ? 'Back to first difference' : 'Go to next difference';
                    });
                }
            });

            resultsArea.style.display = 'block';
            currentDiffIndex = diffLocations.length > 0 ? 0 : -1;
            updateDiffCounter();

            // Add click handlers for diff arrows
            document.querySelectorAll('.diff-arrow, .line-num-link').forEach(el => {
                el.addEventListener('click', function () {
                    const nextDisplayIdx = parseInt(this.dataset.nextDisplayIndex);
                    if (!isNaN(nextDisplayIdx)) {
                        const nextInternalIdx = diffLocations.indexOf(nextDisplayIdx);
                        if (nextInternalIdx !== -1) {
                            currentDiffIndex = nextInternalIdx;
                            scrollToDiff(currentDiffIndex);
                        }
                    }
                });
            });

            // Show inline preview for first 3 differences
            showInlinePreview(refinedDiff);

            // Scroll to results
            resultsArea.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        }

        function highlightDiffChars(str1, str2, isLeft) {
            let result = '';
            const maxLen = Math.max(str1.length, str2.length);
            let inDiff = false;

            for (let i = 0; i < maxLen; i++) {
                const c1 = str1[i];
                const c2 = str2[i];

                if (c1 !== c2) {
                    if (!inDiff) {
                        result += isLeft ? '<span class="diff-removed">' : '<span class="diff-added">';
                        inDiff = true;
                    }
                    result += escapeHtml(c1 || ' ');
                } else {
                    if (inDiff) {
                        result += '</span>';
                        inDiff = false;
                    }
                    result += escapeHtml(c1 || '');
                }
            }

            if (inDiff) {
                result += '</span>';
            }

            return result;
        }

        function showInlinePreview(refinedDiff) {
            let preview = '';
            let count = 0;

            for (let i = 0; i < refinedDiff.length && count < 3; i++) {
                const item = refinedDiff[i];
                if (item.type === 'remove') {
                    preview += `<div class="mb-1"><span class="text-danger">- ${escapeHtml(item.value.substring(0, 80))}</span></div>`;
                    count++;
                } else if (item.type === 'add') {
                    preview += `<div class="mb-2"><span class="text-success">+ ${escapeHtml(item.value.substring(0, 80))}</span></div>`;
                    count++;
                } else if (item.type === 'change') {
                    preview += `<div class="mb-1"><span class="text-danger">- ${escapeHtml(item.value1.substring(0, 80))}</span></div>`;
                    preview += `<div class="mb-2"><span class="text-success">+ ${escapeHtml(item.value2.substring(0, 80))}</span></div>`;
                    count++;
                }
            }

            if (preview) {
                previewContent.innerHTML = preview;
                inlinePreview.style.display = 'block';
            } else {
                inlinePreview.style.display = 'none';
            }
        }

        function escapeHtml(text) {
            const map = {
                '&': '&amp;',
                '<': '&lt;',
                '>': '&gt;',
                '"': '&quot;',
                "'": '&#039;'
            };
            return text.replace(/[&<>"']/g, m => map[m]);
        }
    });

</script>

<?php include '../../includes/toolsfooter.php'; ?>