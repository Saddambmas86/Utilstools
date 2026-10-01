<?php
$page_title = 'JSON Formatter';
$page_description = 'Format, minify, and validate JSON instantly in your browser.';
$page_keywords = 'json formatter, json minifier, json validator, developer tools';
include '../../includes/header.php';
?>

<main class="container py-3 py-lg-4">
    <div class="row justify-content-center">
        <div class="col-12 d-lg-none mb-3">
            <button class="btn btn-outline-primary w-100 d-flex justify-content-between align-items-center" type="button" data-bs-toggle="collapse" data-bs-target="#toolsSidebar" aria-expanded="false" aria-controls="toolsSidebar">
                <span>Browse Tools</span><i class="fas fa-chevron-down" aria-hidden="true"></i>
            </button>
        </div>

        <aside class="col-lg-2">
            <div class="collapse d-lg-block" id="toolsSidebar">
                <div class="card">
                    <div class="card-body p-2">
                        <label class="visually-hidden" for="searchTools">Search tools</label>
                        <input type="search" id="searchTools" class="form-control mb-3" placeholder="Search tools...">
                        <div class="list-group list-group-flush overflow-auto" style="max-height: min(72vh, 48rem);">
                            <div id="toolsList"></div>
                        </div>
                    </div>
                </div>
            </div>
        </aside>

        <section class="col-12 col-lg-7">
            <div class="tool-container">
                <header>
                    <h1><i class="fas fa-code" aria-hidden="true"></i> JSON Formatter</h1>
                    <p class="lead">Format, minify, and validate JSON locally in your browser.</p>
                </header>

                <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
                    <button class="btn btn-primary btn-sm" type="button" id="formatJsonBtn"><i class="fas fa-wand-magic-sparkles me-1" aria-hidden="true"></i>Format</button>
                    <button class="btn btn-outline-primary btn-sm" type="button" id="minifyJsonBtn"><i class="fas fa-compress me-1" aria-hidden="true"></i>Minify</button>
                    <button class="btn btn-outline-secondary btn-sm" type="button" id="validateJsonBtn"><i class="fas fa-check me-1" aria-hidden="true"></i>Validate</button>
                    <button class="btn btn-outline-secondary btn-sm" type="button" id="copyJsonBtn"><i class="fas fa-copy me-1" aria-hidden="true"></i>Copy output</button>
                    <button class="btn btn-outline-secondary btn-sm" type="button" id="clearJsonBtn"><i class="fas fa-eraser me-1" aria-hidden="true"></i>Clear</button>
                    <label class="d-inline-flex align-items-center gap-2 ms-lg-auto small" for="jsonIndent">
                        Indent
                        <select id="jsonIndent" class="form-select form-select-sm">
                            <option value="2" selected>2 spaces</option>
                            <option value="4">4 spaces</option>
                            <option value="tab">Tabs</option>
                        </select>
                    </label>
                </div>

                <div id="jsonFormatterStatus" class="alert alert-info py-2 mb-3" role="status" aria-live="polite">Paste JSON to begin.</div>

                <div class="row g-3 json-formatter-workspace">
                    <div class="col-12 col-lg-6">
                        <label for="jsonFormatterInput" class="form-label fw-semibold">Input JSON</label>
                        <textarea id="jsonFormatterInput" class="form-control font-monospace" rows="16" spellcheck="false" placeholder='Paste JSON here, e.g. {"name":"Ada","active":true}'></textarea>
                    </div>
                    <div class="col-12 col-lg-6">
                        <label for="jsonFormatterOutput" class="form-label fw-semibold">Formatted output</label>
                        <textarea id="jsonFormatterOutput" class="form-control font-monospace" rows="16" spellcheck="false" readonly placeholder="Formatted JSON will appear here"></textarea>
                    </div>
                </div>
            </div>
        </section>
    </div>
</main>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const input = document.getElementById('jsonFormatterInput');
    const output = document.getElementById('jsonFormatterOutput');
    const status = document.getElementById('jsonFormatterStatus');
    const indent = document.getElementById('jsonIndent');

    function report(type, message) {
        status.className = `alert alert-${type} py-2 mb-3`;
        status.textContent = message;
    }

    function parseInput() {
        const source = input.value.trim();
        if (!source) throw new Error('Paste JSON into the input box first.');
        return JSON.parse(source);
    }

    function formatJson(compact) {
        try {
            const parsed = parseInput();
            const spacing = compact ? 0 : (indent.value === 'tab' ? '\t' : Number(indent.value));
            output.value = JSON.stringify(parsed, null, spacing);
            report('success', compact ? 'Valid JSON minified successfully.' : 'Valid JSON formatted successfully.');
        } catch (error) {
            report('danger', `Invalid JSON: ${error.message}`);
        }
    }

    document.getElementById('formatJsonBtn').addEventListener('click', () => formatJson(false));
    document.getElementById('minifyJsonBtn').addEventListener('click', () => formatJson(true));
    document.getElementById('validateJsonBtn').addEventListener('click', () => {
        try {
            parseInput();
            report('success', 'Valid JSON.');
        } catch (error) {
            report('danger', `Invalid JSON: ${error.message}`);
        }
    });
    document.getElementById('copyJsonBtn').addEventListener('click', async () => {
        if (!output.value) {
            report('warning', 'Format or minify JSON before copying output.');
            return;
        }
        try {
            await navigator.clipboard.writeText(output.value);
            report('success', 'Formatted output copied.');
        } catch (error) {
            output.focus();
            output.select();
            report('warning', 'Clipboard access is unavailable. Select the output and copy it manually.');
        }
    });
    document.getElementById('clearJsonBtn').addEventListener('click', () => {
        input.value = '';
        output.value = '';
        report('info', 'Paste JSON to begin.');
        input.focus();
    });
});
</script>

<?php include '../../includes/toolsfooter.php'; ?>