<?php
$page_title = 'JSON Viewer';
$page_description = 'Inspect, validate, format, and navigate JSON data with the free online JSON Viewer.';
$page_keywords = 'JSON viewer, JSON tree, JSON formatter, JSON validator';
include '../../includes/header.php';
?>
    <style>
        .json-viewer-page *,
        .json-viewer-page *::before,
        .json-viewer-page *::after {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body.app-shell > main.json-viewer-page {
            width: 100%;
            max-width: none;
            margin: 0;
            padding: 0.25rem 0.5rem 0.75rem;
        }

        .json-viewer-page .main-container {
            width: 100%;
            height: auto;
            min-height: 26rem;
            font-family: var(--wc-font-family);
            background: var(--wc-surface);
            border: 1px solid var(--wc-border);
            border-radius: var(--wc-radius-lg);
            box-shadow: var(--wc-shadow-xs);
            color: var(--wc-text-primary);
            padding: 12px 14px 10px;
            display: flex;
            flex-direction: column;
        }

        .header {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 8px;
            flex-shrink: 0;
        }

        .header h1 {
            font-size: 1rem;
            font-weight: 700;
            letter-spacing: 0;
            color: var(--wc-text-primary);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .header h1 i {
            color: var(--wc-primary);
            font-size: 26px;
        }

        .two-col {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 18px;
            flex: 1;
            min-height: 16rem;
        }

        @media (max-width: 860px) {
            .two-col {
                grid-template-columns: 1fr;
                gap: 12px;
            }
        }

        .panel {
            background: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(6px);
            border-radius: 16px;
            padding: 12px 14px 14px;
            border: 1px solid #718592;
            box-shadow: inset 0 1px 4px rgba(0,0,0,0.02);
            display: flex;
            flex-direction: column;
            min-height: 16rem;
        }

        .panel-title {
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            color: #3c6b7a;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 6px;
            flex-shrink: 0;
        }

        .panel-title i {
            font-size: 13px;
        }

        #jsonInput {
            width: 100%;
            flex: 1 1 auto;
            background: transparent;
            border: none;
            resize: vertical;
            overflow: auto;
            font-family: 'SF Mono', 'Fira Code', 'Menlo', monospace;
            font-size: 13px;
            line-height: 1.5;
            padding: 4px 2px;
            color: #0b232f;
            outline: none;
            min-height: 12rem;
        }

        #jsonInput::placeholder {
            color: #a0bcc8;
            font-family: 'Segoe UI', sans-serif;
            font-weight: 400;
        }

        .tree-output {
            flex: 1 1 auto;
            overflow: auto;
            resize: vertical;
            font-family: 'SF Mono', 'Fira Code', 'Menlo', monospace;
            font-size: 12.5px;
            line-height: 1.6;
            color: #0a202b;
            padding: 4px 2px;
            cursor: default;
            min-height: 12rem;
        }

        .tree-output::-webkit-scrollbar {
            width: 4px;
            height: 4px;
        }
        .tree-output::-webkit-scrollbar-thumb {
            background: #c5dae3;
            border-radius: 4px;
        }
        .tree-output::-webkit-scrollbar-track {
            background: transparent;
        }

        .tree-output .tree-node {
            display: block;
            padding: 0;
            cursor: pointer;
            user-select: none;
            border-radius: 2px;
            transition: background 0.08s;
        }

        .tree-output .tree-node:hover {
            background: rgba(30, 110, 120, 0.04);
        }

        .tree-output .tree-node .node-content {
            display: inline;
        }

        .tree-output .tree-node .toggle-icon {
            display: inline-block;
            width: 14px;
            font-size: 9px;
            color: #3f8590;
            text-align: left;
            transition: transform 0.12s;
            font-weight: 700;
        }

        .tree-output .tree-node .toggle-icon.collapsed {
            transform: rotate(-90deg);
        }

        .tree-output .tree-node.collapsed > .node-children {
            display: none;
        }

        .tree-output .tree-node .node-children {
            padding-left: 24px;
        }

        .tree-output .tree-leaf {
            display: block;
            padding: 0 0 0 4px;
            border-radius: 2px;
            transition: background 0.08s;
            cursor: pointer;
        }

        .tree-output .tree-leaf:hover {
            background: rgba(30, 110, 120, 0.04);
        }

        .tree-output .json-key {
            color: #006b7a;
            font-weight: 600;
        }

        .tree-output .json-string {
            color: #156b3c;
        }

        .tree-output .json-number {
            color: #a55d2b;
        }

        .tree-output .json-boolean {
            color: #a53f6b;
            font-weight: 500;
        }

        .tree-output .json-null {
            color: #8a6e8a;
            font-weight: 500;
        }

        .tree-output .json-punctuation {
            color: #3f5f6b;
        }

        .tree-output .json-bracket {
            color: #1a6d7a;
            font-weight: 500;
        }

        .tree-output .json-type-badge {
            display: inline-block;
            font-size: 9px;
            font-weight: 600;
            color: #5f7e8a;
            background: rgba(60, 107, 122, 0.08);
            padding: 0 5px;
            border-radius: 6px;
            margin-left: 2px;
            font-family: 'Segoe UI', sans-serif;
        }

        .tree-output .json-array-badge {
            color: #a55d2b;
            background: rgba(165, 93, 43, 0.08);
        }

        .tree-output .json-index {
            color: #8a6e8a;
            font-weight: 500;
        }

        .empty-tree {
            color: #8da5b0;
            font-family: 'Segoe UI', sans-serif;
            font-weight: 400;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            height: 100%;
            opacity: 0.7;
            font-size: 13px;
        }

        .empty-tree i {
            font-size: 24px;
            color: #b8d0da;
        }

        .path-display {
            background: rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(4px);
            border-radius: 10px;
            padding: 6px 12px;
            border: 1px solid rgba(255, 255, 255, 0.4);
            margin-top: 8px;
            font-family: 'SF Mono', 'Fira Code', 'Menlo', monospace;
            font-size: 11.5px;
            color: #1f4c5a;
            min-height: 32px;
            display: flex;
            align-items: center;
            gap: 6px;
            flex-wrap: wrap;
            flex-shrink: 0;
        }

        .path-display .path-label {
            font-family: 'Segoe UI', sans-serif;
            font-weight: 600;
            font-size: 10px;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            color: #3c6b7a;
            background: rgba(60, 107, 122, 0.08);
            padding: 1px 8px;
            border-radius: 12px;
        }

        .path-display .path-value {
            color: #0b2f3a;
            word-break: break-all;
            flex: 1;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .path-display .path-value .path-segment {
            color: #006b7a;
            font-weight: 500;
        }

        .path-display .path-value .path-segment-array {
            color: #a55d2b;
        }

        .toolbar {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 6px 10px;
            margin-top: 4px;
            margin-bottom: 10px;
            flex-shrink: 0;
        }

        .toolbar .btn {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(4px);
            border: 1px solid rgba(200, 215, 225, 0.25);
            padding: 5px 14px;
            border-radius: 30px;
            font-size: 11.5px;
            font-weight: 500;
            color: #1b3f4e;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            cursor: pointer;
            transition: 0.2s;
        }

        .toolbar .btn i {
            color: #2a6e7a;
            font-size: 12px;
        }

        .toolbar .btn:hover {
            background: white;
            box-shadow: 0 4px 12px -6px rgba(20, 70, 90, 0.15);
            border-color: rgba(30, 110, 120, 0.2);
        }

        .toolbar .btn-primary {
            background: #1b6f7a;
            border-color: #1b6f7a;
            color: white;
        }

        .toolbar .btn-primary i {
            color: white;
        }

        .toolbar .btn-primary:hover {
            background: #135a63;
            border-color: #135a63;
        }

        .toolbar .btn-success {
            background: #1f8a6b;
            border-color: #1f8a6b;
            color: white;
        }

        .toolbar .btn-success i {
            color: white;
        }

        .toolbar .btn-success:hover {
            background: #16755a;
            border-color: #16755a;
        }

        .btn-purple {
            background: #7c3aed;
            border-color: #7c3aed;
            color: white;
        }

        .btn-purple i {
            color: white;
        }

        .btn-purple:hover {
            background: #6d28d9;
            border-color: #6d28d9;
        }

        .status-bar {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 12px;
            padding-top: 8px;
            border-top: 1px solid rgba(180, 200, 210, 0.2);
            color: #1f4c5a;
            flex-shrink: 0;
        }

        .status-bar i {
            font-size: 14px;
        }

        .status-valid {
            color: #1f8a6b;
        }

        .status-invalid {
            color: #bf6a5a;
        }

        @media (max-width: 600px) {
            body.app-shell > main.json-viewer-page { width: min(100% - 1rem, 88rem); padding-top: 0.75rem; }
            .json-viewer-page .main-container { padding: 9px; min-height: 0; }
            .header h1 { font-size: 20px; }
        }

        .json-viewer-page .header { margin-bottom: 6px; }
        .json-viewer-page .header h1 { font-size: 0.9rem; }
        .json-viewer-page .header h1 i { font-size: 1rem; }
        .json-viewer-page .two-col { gap: 8px; }
        .json-viewer-page .panel { padding: 8px 10px; border-radius: 8px; }
        .json-viewer-page .panel-title { margin-bottom: 4px; font-size: 10px; }
        .json-viewer-page #jsonInput { font-size: 11px; line-height: 1.4; }
        .json-viewer-page .tree-output { font-size: 10.5px; line-height: 1.4; }
        .json-viewer-page .tree-output .node-children { padding-left: 16px; }
        .json-viewer-page .path-display { gap: 5px; min-height: 27px; margin-top: 4px; padding: 3px 7px; font-size: 10px; }
        .json-viewer-page .path-display .path-label { padding: 1px 6px; font-size: 9px; }
        .json-viewer-page .toolbar { gap: 4px 6px; margin: 2px 0 6px; }
        .json-viewer-page .toolbar .btn { padding: 4px 8px; border-radius: 5px; font-size: 10px; }
        .json-viewer-page .status-bar { gap: 6px; padding-top: 5px; font-size: 10px; }

        @media (max-width: 600px) {
            body.app-shell > main.json-viewer-page { width: 100%; padding: 0.25rem 0.35rem 0.5rem; }
            .json-viewer-page .main-container { height: auto; min-height: 0; padding: 9px; }
            .json-viewer-page .two-col { flex: none; min-height: 0; grid-template-rows: none; grid-auto-rows: minmax(13rem, auto); }
            .json-viewer-page .panel { min-height: 13rem; }
            .json-viewer-page #jsonInput,
            .json-viewer-page .tree-output { min-height: 10rem; }
            .json-viewer-page .toolbar .btn { padding-inline: 6px; }
        }
    </style>

<main class="json-viewer-page">
<div class="main-container">
    <div class="header">
        <h1><i class="fas fa-code-branch"></i> JSON VIEWER</h1>
    </div>

    <div class="two-col">
        <div class="panel">
            <div class="panel-title"><i class="fas fa-pen-to-square"></i> JSON Input</div>
            <textarea id="jsonInput" spellcheck="false" placeholder='Paste your JSON here …'></textarea>
        </div>

        <div class="panel">
            <div class="panel-title"><i class="fas fa-diagram-project"></i> JSON Tree</div>
            <div id="treeOutput" class="tree-output">
                <div class="empty-tree"><i class="fas fa-tree"></i><span>Tree will appear here</span></div>
            </div>
            <div class="path-display" id="pathDisplay">
                <span class="path-label"><i class="fas fa-location-dot"></i> Path</span>
                <span class="path-value" id="pathValue">Click any element to see its path</span>
            </div>
        </div>
    </div>

    <div class="toolbar">
        <button class="btn" id="validateBtn"><i class="fas fa-check-double"></i> Validate</button>
        <button class="btn" id="expandBtn"><i class="fas fa-expand"></i> Expand All</button>
        <button class="btn btn-purple" id="partialExpandBtn"><i class="fas fa-expand-arrows-alt"></i> Partly Expand</button>
        <button class="btn" id="collapseBtn"><i class="fas fa-compress"></i> Collapse All</button>
        <button class="btn btn-success" id="downloadBtn"><i class="fas fa-download"></i> Download</button>
        <button class="btn" id="copyBtn"><i class="fas fa-copy"></i> Copy</button>
        <button class="btn" id="clearBtn"><i class="fas fa-eraser"></i> Clear</button>
    </div>

    <div class="status-bar" id="statusBar">
        <i class="fas fa-circle-check" style="color: #1f8a6b;"></i>
        <span id="statusText">✓ Valid JSON</span>
    </div>
</div>

<script>
    (function() {
        const inputArea = document.getElementById('jsonInput');
        const treeDiv = document.getElementById('treeOutput');
        const pathValue = document.getElementById('pathValue');
        const statusText = document.getElementById('statusText');
        const statusIcon = document.querySelector('#statusBar i');

        let nodeCounter = 0;

        function escapeHtml(str) {
            const div = document.createElement('div');
            div.textContent = str;
            return div.innerHTML;
        }

        // Render tree with level tracking
        function renderTree(obj, path = '$', level = 0) {
            if (obj === null) {
                return `<span class="json-null">null</span>`;
            }
            if (typeof obj === 'boolean') {
                return `<span class="json-boolean">${obj}</span>`;
            }
            if (typeof obj === 'number') {
                return `<span class="json-number">${obj}</span>`;
            }
            if (typeof obj === 'string') {
                return `<span class="json-string">"${escapeHtml(obj)}"</span>`;
            }

            const nodeId = 'node-' + (++nodeCounter);

            if (Array.isArray(obj)) {
                if (obj.length === 0) {
                    return `<span class="json-bracket">[]</span>`;
                }
                let childrenHtml = '';
                for (let i = 0; i < obj.length; i++) {
                    const childPath = path + '[' + i + ']';
                    const child = renderTree(obj[i], childPath, level + 1);
                    childrenHtml += `<div class="tree-leaf" data-path="${escapeHtml(childPath)}" data-level="${level + 1}"><span class="json-index">${i}</span> : ${child}</div>`;
                }
                const typeBadge = `<span class="json-type-badge json-array-badge">[${obj.length}]</span>`;
                return `<div class="tree-node" data-path="${escapeHtml(path)}" data-nodeid="${nodeId}" data-level="${level}">
                            <span class="toggle-icon">▼</span>
                            <span class="node-content"><span class="json-bracket">[</span>${typeBadge}</span>
                            <div class="node-children">${childrenHtml}</div>
                            <span class="node-content"><span class="json-bracket">]</span></span>
                        </div>`;
            }

            const keys = Object.keys(obj);
            if (keys.length === 0) {
                return `<span class="json-bracket">{}</span>`;
            }
            let childrenHtml = '';
            for (let i = 0; i < keys.length; i++) {
                const k = keys[i];
                const val = obj[k];
                const childPath = path + '.' + k;
                const renderedVal = renderTree(val, childPath, level + 1);
                childrenHtml += `<div class="tree-leaf" data-path="${escapeHtml(childPath)}" data-level="${level + 1}"><span class="json-key">${escapeHtml(k)}</span> : ${renderedVal}</div>`;
            }
            const typeBadge = `<span class="json-type-badge">{${keys.length}}</span>`;
            return `<div class="tree-node" data-path="${escapeHtml(path)}" data-nodeid="${nodeId}" data-level="${level}">
                        <span class="toggle-icon">▼</span>
                        <span class="node-content"><span class="json-bracket">{</span>${typeBadge}</span>
                        <div class="node-children">${childrenHtml}</div>
                        <span class="node-content"><span class="json-bracket">}</span></span>
                    </div>`;
        }

        function renderJSON(raw) {
            const trimmed = raw.trim();
            if (!trimmed) {
                treeDiv.innerHTML = `<div class="empty-tree"><i class="fas fa-tree"></i><span>Tree will appear here</span></div>`;
                pathValue.textContent = 'Click any element to see its path';
                statusText.textContent = '⏳ Waiting for input';
                statusIcon.className = 'fas fa-circle-info';
                statusIcon.style.color = '#8ba3ae';
                return;
            }

            try {
                const parsed = JSON.parse(trimmed);
                nodeCounter = 0;
                const treeHtml = renderTree(parsed);
                treeDiv.innerHTML = treeHtml;
                attachClickListeners();

                statusText.textContent = '✓ Valid JSON';
                statusIcon.className = 'fas fa-circle-check';
                statusIcon.style.color = '#1f8a6b';
                
                // Default: Expand all
                expandAllNodes();
            } catch (e) {
                treeDiv.innerHTML = `<div style="color:#b34a4a; padding:6px 0; font-family:'Segoe UI',sans-serif; font-size:12px;">
                    <i class="fas fa-exclamation-triangle" style="margin-right:6px;"></i> 
                    <span>Invalid JSON · ${escapeHtml(e.message)}</span>
                </div>`;
                statusText.textContent = '✗ Invalid JSON';
                statusIcon.className = 'fas fa-circle-exclamation';
                statusIcon.style.color = '#bf6a5a';
                pathValue.textContent = 'Click any element to see its path';
            }
        }

        function attachClickListeners() {
            const nodes = treeDiv.querySelectorAll('.tree-node');
            nodes.forEach(node => {
                node.removeEventListener('click', nodeClickHandler);
                node.addEventListener('click', nodeClickHandler);
            });

            const leaves = treeDiv.querySelectorAll('.tree-leaf');
            leaves.forEach(leaf => {
                leaf.removeEventListener('click', leafClickHandler);
                leaf.addEventListener('click', leafClickHandler);
            });
        }

        function nodeClickHandler(e) {
            e.stopPropagation();
            const node = this;
            const children = node.querySelector('.node-children');
            const toggleIcon = node.querySelector('.toggle-icon');
            if (children) {
                node.classList.toggle('collapsed');
                if (toggleIcon) {
                    toggleIcon.classList.toggle('collapsed');
                }
            }
            const path = node.getAttribute('data-path');
            if (path) {
                showPath(path);
            }
        }

        function leafClickHandler(e) {
            e.stopPropagation();
            const path = this.getAttribute('data-path');
            if (path) {
                showPath(path);
            }
        }

        function showPath(path) {
            let display = '';
            const parts = path.split(/[\.\[\]]/).filter(p => p !== '');
            for (let i = 0; i < parts.length; i++) {
                const part = parts[i];
                if (i === 0) {
                    display += `<span class="path-segment">${part}</span>`;
                } else if (path.includes('[' + part + ']')) {
                    display += `<span class="path-segment-array">[${part}]</span>`;
                } else {
                    display += `<span class="path-segment">.${part}</span>`;
                }
            }
            pathValue.innerHTML = display || '<span style="color:#8ba3ae;">$</span>';
        }

        // ===== EXPAND FUNCTIONS =====
        
        // Expand all nodes
        function expandAllNodes() {
            const nodes = treeDiv.querySelectorAll('.tree-node');
            nodes.forEach(node => {
                node.classList.remove('collapsed');
                const icon = node.querySelector('.toggle-icon');
                if (icon) icon.classList.remove('collapsed');
            });
        }

        // Collapse all nodes
        function collapseAllNodes() {
            const nodes = treeDiv.querySelectorAll('.tree-node');
            nodes.forEach(node => {
                const isRoot = !node.parentElement.closest('.tree-node');
                if (!isRoot) {
                    node.classList.add('collapsed');
                    const icon = node.querySelector('.toggle-icon');
                    if (icon) icon.classList.add('collapsed');
                }
            });
        }

        // ===== PARTLY EXPAND - Expand first 2 levels =====
        function partialExpandNodes() {
            // First, collapse all nodes
            const allNodes = treeDiv.querySelectorAll('.tree-node');
            allNodes.forEach(node => {
                node.classList.add('collapsed');
                const icon = node.querySelector('.toggle-icon');
                if (icon) icon.classList.add('collapsed');
            });

            // Then expand nodes at level 0 and 1 (first and second hierarchy)
            const nodes = treeDiv.querySelectorAll('.tree-node');
            nodes.forEach(node => {
                const level = parseInt(node.getAttribute('data-level') || '0');
                // Expand level 0 (root) and level 1 (first children)
                if (level === 0 || level === 1) {
                    node.classList.remove('collapsed');
                    const icon = node.querySelector('.toggle-icon');
                    if (icon) icon.classList.remove('collapsed');
                }
            });
        }

        // Button actions
        document.getElementById('validateBtn').addEventListener('click', function() {
            const raw = inputArea.value.trim();
            if (!raw) { alert('Paste some JSON first.'); return; }
            try {
                JSON.parse(raw);
                alert('✅ Valid JSON!');
            } catch (e) {
                alert('❌ Invalid JSON: ' + e.message);
            }
        });
        document.getElementById('expandBtn').addEventListener('click', expandAllNodes);
        document.getElementById('collapseBtn').addEventListener('click', collapseAllNodes);
        document.getElementById('partialExpandBtn').addEventListener('click', partialExpandNodes);
        document.getElementById('downloadBtn').addEventListener('click', function() {
            const raw = inputArea.value.trim();
            if (!raw) { alert('Nothing to download.'); return; }
            try {
                const parsed = JSON.parse(raw);
                const pretty = JSON.stringify(parsed, null, 2);
                const blob = new Blob([pretty], { type: 'application/json' });
                const url = URL.createObjectURL(blob);
                const a = document.createElement('a');
                a.href = url;
                a.download = 'data.json';
                document.body.appendChild(a);
                a.click();
                document.body.removeChild(a);
                URL.revokeObjectURL(url);
            } catch (e) {
                alert('Cannot download invalid JSON.');
            }
        });
        document.getElementById('copyBtn').addEventListener('click', function() {
            const raw = inputArea.value.trim();
            if (!raw) { alert('Nothing to copy.'); return; }
            navigator.clipboard.writeText(raw).then(() => {
                const btn = document.getElementById('copyBtn');
                const orig = btn.innerHTML;
                btn.innerHTML = '<i class="fas fa-check"></i> Copied!';
                setTimeout(() => btn.innerHTML = orig, 1200);
            }).catch(() => alert('Unable to copy.'));
        });
        document.getElementById('clearBtn').addEventListener('click', function() {
            inputArea.value = '';
            treeDiv.innerHTML = `<div class="empty-tree"><i class="fas fa-tree"></i><span>Tree will appear here</span></div>`;
            pathValue.textContent = 'Click any element to see its path';
            statusText.textContent = '⏳ Waiting for input';
            statusIcon.className = 'fas fa-circle-info';
            statusIcon.style.color = '#8ba3ae';
        });

        let timer = null;
        inputArea.addEventListener('input', function() {
            clearTimeout(timer);
            timer = setTimeout(() => {
                renderJSON(inputArea.value);
            }, 350);
        });

        // Load example
        function loadExample() {
            const example = {
                "person": {
                    "name": "John Doe",
                    "age": 30,
                    "email": "john@example.com",
                    "address": {
                        "city": "New York",
                        "zip": 10001,
                        "coordinates": {
                            "lat": 40.7128,
                            "lng": -74.0060
                        }
                    },
                    "skills": ["JavaScript", "Python", "SQL"],
                    "active": true,
                    "metadata": null
                }
            };
            const pretty = JSON.stringify(example, null, 2);
            inputArea.value = pretty;
            renderJSON(pretty);
        }

        loadExample();
    })();
</script>

</main>
<?php include '../../includes/footer.php'; ?>