// =============================================
// Base URL Configuration
// =============================================
// Dynamically determine the base URL.
// This assumes your script.js is in the root of your application,
// or you are consistent with relative paths.
// If your application is always in a subfolder (e.g., /my-app/),
// you might explicitly set: const baseURL = '/my-app/';
const baseURL = window.location.origin + window.location.pathname.substring(0, window.location.pathname.lastIndexOf('/') + 1);

// =============================================
// Search Module
// =============================================
const Search = (() => {
    let searchTimeout;
    let allTools = []; // Cache for all tools from homepage

    const fetchAllTools = async () => {
        try {
            // Fetch the homepage HTML using the base URL
            const response = await fetch(baseURL);
            const html = await response.text();
            
            // Parse the HTML to extract tools
            const parser = new DOMParser();
            const doc = parser.parseFromString(html, 'text/html');
            
            const tools = [];
            doc.querySelectorAll('.card-link').forEach(card => {
                // Ensure URLs are relative to the base URL or absolute if needed
                const rawUrl = card.getAttribute('href') || '#';
                const fullUrl = new URL(rawUrl, baseURL).pathname; // Construct full path relative to origin

                tools.push({
                    name: card.querySelector('.card-title')?.textContent?.trim() || '',
                    description: card.querySelector('.card-text')?.textContent?.trim() || '',
                    url: fullUrl, // Store the full relative path
                    icon: card.querySelector('.icon-wrapper i')?.className.match(/fa-(.*?)(?=\s|$)/)?.[1] || 'tools'
                });
            });
            
            return tools;
        } catch (error) {
            console.error('Error fetching tools from homepage:', error);
            return [];
        }
    };

    const displayResults = (results, container) => {
        if (results.length === 0) {
            container.innerHTML = '<div class="search-loading">No tools found matching your search</div>';
            return;
        }
        
        let html = '';
        results.forEach(item => {
            html += `
                <div class="search-result-item" onclick="window.location.href='${item.url}'">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-${item.icon} text-primary me-3"></i>
                        <div>
                            <h6 class="mb-1">${item.name}</h6>
                            <p class="text-muted small mb-0">${item.description}</p>
                        </div>
                    </div>
                </div>
            `;
        });
        
        container.innerHTML = html;
    };

    const init = async () => {
        const searchToggle = document.getElementById('searchToggle');
        const searchToggleMobile = document.getElementById('searchToggleMobile');
        const searchBar = document.getElementById('searchBar');
        const searchInput = document.getElementById('searchInput');
        const searchResults = document.getElementById('searchResults');
        
        if (!searchToggle || !searchBar || !searchInput || !searchResults) return;

        // Pre-fetch all tools from homepage
        allTools = await fetchAllTools();

        // Toggle search bar (desktop)
        searchToggle.addEventListener('click', function(e) {
            e.stopPropagation();
            searchBar.classList.toggle('d-none');
            if (!searchBar.classList.contains('d-none')) {
                searchInput.focus();
            } else {
                searchInput.value = '';
                searchResults.innerHTML = '';
            }
        });

        // Toggle search bar (mobile)
        if (searchToggleMobile) {
            searchToggleMobile.addEventListener('click', function(e) {
                e.stopPropagation();
                searchBar.classList.toggle('d-none');
                if (!searchBar.classList.contains('d-none')) {
                    searchInput.focus();
                } else {
                    searchInput.value = '';
                    searchResults.innerHTML = '';
                }
            });
        }

        // Search as you type
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            
            const query = this.value.trim();
            searchResults.innerHTML = '<div class="search-loading"><i class="fas fa-spinner fa-spin me-2"></i>Searching...</div>';
            
            if (query.length < 1) {
                searchResults.innerHTML = '<div class="search-loading">Type at least 1 character</div>';
                return;
            }
            
            searchTimeout = setTimeout(() => {
                const results = allTools.filter(tool => 
                    tool.name.toLowerCase().includes(query.toLowerCase()) || 
                    tool.description.toLowerCase().includes(query.toLowerCase())
                );
                displayResults(results, searchResults);
            }, 300);
        });

        // Close search when clicking outside
        document.addEventListener('click', function(e) {
            if (!searchBar.contains(e.target)) {
                const isSearchToggle = e.target === searchToggle || e.target === searchToggleMobile || 
                                     searchToggle.contains(e.target) || (searchToggleMobile && searchToggleMobile.contains(e.target));
                
                if (!isSearchToggle) {
                    searchBar.classList.add('d-none');
                    searchInput.value = '';
                    searchResults.innerHTML = '';
                }
            }
        });

        // Prevent search bar from closing when clicking inside it
        searchBar.addEventListener('click', function(e) {
            e.stopPropagation();
        });
    };

    return { init };
})();

// =============================================
// Scroll To Top Module
// =============================================
const ScrollToTop = (() => {
    const init = () => {
        const scrollToTopBtn = document.getElementById('scrollToTop');
        
        if (!scrollToTopBtn) return;

        window.addEventListener('scroll', function() {
            scrollToTopBtn.classList.toggle('visible', window.scrollY > 300);
        });
        
        scrollToTopBtn.addEventListener('click', function() {
            window.scrollTo({ top: 0, behavior: 'smooth' });
        });
    };

    return { init };
})();

// =============================================
// Favorites, recent tools, and personal tool list
// =============================================
const ToolCollections = (() => {
    const storageKeys = {
        favorites: 'wcToolFavorites',
        recent: 'wcRecentTools',
        'my-tools': 'wcMyTools'
    };
    const collectionTitles = {
        favorites: 'Favorites',
        recent: 'Recent Tools',
        'my-tools': 'My Tools List'
    };
    const excludedRoutes = new Set([
        'about', 'api-testing-tools', 'calculators', 'contact', 'developer-tools',
        'disclaimer', 'devops-tools', 'pdf-tools', 'privacy', 'qa-tools', 'text-tools'
    ]);

    let dialog;
    let activeView = 'favorites';
    let currentTool = null;

    const normalizeEntry = entry => {
        if (!entry || typeof entry.name !== 'string' || typeof entry.url !== 'string') return null;

        try {
            const url = new URL(entry.url, window.location.origin);
            if (url.origin !== window.location.origin) return null;
            return {
                name: entry.name.trim().slice(0, 120) || 'Untitled Tool',
                url: url.pathname + url.search,
                icon: typeof entry.icon === 'string' ? entry.icon : 'fa-toolbox'
            };
        } catch (error) {
            return null;
        }
    };

    const readCollection = collection => {
        try {
            const stored = JSON.parse(localStorage.getItem(storageKeys[collection]) || '[]');
            return Array.isArray(stored) ? stored.map(normalizeEntry).filter(Boolean) : [];
        } catch (error) {
            return [];
        }
    };

    const writeCollection = (collection, entries) => {
        try {
            localStorage.setItem(storageKeys[collection], JSON.stringify(entries));
            return true;
        } catch (error) {
            return false;
        }
    };

    const isInCollection = (collection, entry) =>
        readCollection(collection).some(item => item.url === entry.url);

    const toggleCollectionEntry = (collection, entry) => {
        const entries = readCollection(collection);
        const existingIndex = entries.findIndex(item => item.url === entry.url);
        if (existingIndex >= 0) {
            entries.splice(existingIndex, 1);
        } else {
            entries.unshift(entry);
        }
        writeCollection(collection, entries);
    };

    const detectCurrentTool = () => {
        const basePath = new URL(window.BASE_URL || '/', window.location.origin).pathname;
        const currentPath = window.location.pathname;
        const route = currentPath.startsWith(basePath) ? currentPath.slice(basePath.length) : currentPath.replace(/^\//, '');
        const slug = route.replace(/^\/+|\/+$/g, '');

        if (!slug || excludedRoutes.has(slug) || slug.startsWith('guides/')) return null;

        const heading = document.querySelector('main h1')?.textContent?.trim();
        const title = heading || document.title.split('|')[0].trim();
        return normalizeEntry({ name: title, url: currentPath, icon: 'fa-toolbox' });
    };

    const recordCurrentTool = () => {
        currentTool = detectCurrentTool();
        if (!currentTool) return;

        const recent = readCollection('recent').filter(item => item.url !== currentTool.url);
        recent.unshift(currentTool);
        writeCollection('recent', recent.slice(0, 12));
    };

    const render = () => {
        if (!dialog) return;

        const title = dialog.querySelector('[data-tool-collection-title]');
        const list = dialog.querySelector('[data-tool-collection-items]');
        const clearButton = dialog.querySelector('[data-tool-collection-clear]');
        const currentActions = dialog.querySelector('[data-tool-current-actions]');

        title.textContent = collectionTitles[activeView];
        dialog.querySelectorAll('[data-tool-collection-tab]').forEach(tab => {
            const selected = tab.dataset.toolCollectionTab === activeView;
            tab.setAttribute('aria-selected', String(selected));
            tab.classList.toggle('is-active', selected);
        });

        currentActions.hidden = !currentTool;
        if (currentTool) {
            dialog.querySelector('[data-tool-current-name]').textContent = currentTool.name;
            dialog.querySelectorAll('[data-tool-current-toggle]').forEach(button => {
                const collection = button.dataset.toolCurrentToggle;
                const saved = isInCollection(collection, currentTool);
                button.textContent = `${saved ? 'Remove from' : 'Add to'} ${collectionTitles[collection]}`;
                button.setAttribute('aria-pressed', String(saved));
            });
        }

        const entries = readCollection(activeView);
        clearButton.hidden = activeView !== 'recent' || entries.length === 0;
        list.replaceChildren();

        if (entries.length === 0) {
            const empty = document.createElement('p');
            empty.className = 'tool-collection-empty';
            empty.textContent = activeView === 'recent' ? 'No recently opened tools.' : 'This list is empty.';
            list.appendChild(empty);
            return;
        }

        entries.forEach(entry => {
            const row = document.createElement('div');
            row.className = 'tool-collection-item';
            const link = document.createElement('a');
            link.className = 'tool-collection-item-link';
            link.href = entry.url;
            link.textContent = entry.name;
            const remove = document.createElement('button');
            remove.type = 'button';
            remove.className = 'tool-collection-remove';
            remove.setAttribute('aria-label', `Remove ${entry.name} from ${collectionTitles[activeView]}`);
            remove.innerHTML = '<i class="fas fa-times" aria-hidden="true"></i>';
            remove.addEventListener('click', () => {
                writeCollection(activeView, readCollection(activeView).filter(item => item.url !== entry.url));
                render();
            });
            row.append(link, remove);
            list.appendChild(row);
        });
    };

    const open = view => {
        activeView = storageKeys[view] ? view : 'favorites';
        render();
        if (typeof dialog.showModal === 'function') {
            if (!dialog.open) dialog.showModal();
        } else {
            dialog.setAttribute('open', '');
        }
    };

    const init = () => {
        dialog = document.getElementById('tool-collections-dialog');
        if (!dialog) return;

        recordCurrentTool();
        dialog.addEventListener('click', event => {
            if (event.target === dialog) dialog.close();
        });
        dialog.querySelector('[data-tool-collection-close]').addEventListener('click', () => dialog.close());
        dialog.querySelectorAll('[data-tool-collection-tab]').forEach(tab => {
            tab.addEventListener('click', () => {
                activeView = tab.dataset.toolCollectionTab;
                render();
            });
        });
        dialog.querySelectorAll('[data-tool-current-toggle]').forEach(button => {
            button.addEventListener('click', () => {
                if (!currentTool) return;
                toggleCollectionEntry(button.dataset.toolCurrentToggle, currentTool);
                render();
            });
        });
        dialog.querySelector('[data-tool-collection-clear]').addEventListener('click', () => {
            writeCollection('recent', []);
            render();
        });
        document.addEventListener('click', event => {
            const trigger = event.target.closest('[data-wc-collection-open]');
            if (!trigger) return;
            event.preventDefault();
            open(trigger.dataset.wcCollectionOpen);
        });
        window.addEventListener('storage', event => {
            if (Object.values(storageKeys).includes(event.key)) render();
        });
    };

    return { init };
})();

// =============================================
// Collapsible application sidebar
// =============================================
const SidebarToggle = (() => {
    const storageKey = 'wcSidebarCollapsed';
    let shell;
    let sidebar;
    let button;
    let icon;

    const isMobile = () => window.matchMedia('(max-width: 991.98px)').matches;

    const updateControl = () => {
        const mobile = isMobile();
        const expanded = mobile ? shell.classList.contains('sidebar-open') : !shell.classList.contains('sidebar-collapsed');
        const label = mobile ? (expanded ? 'Close navigation' : 'Open navigation') : (expanded ? 'Collapse sidebar' : 'Expand sidebar');

        button.setAttribute('aria-expanded', String(expanded));
        button.setAttribute('aria-label', label);
        button.setAttribute('title', label);
        icon.classList.remove('fa-bars', 'fa-xmark', 'fa-chevron-left', 'fa-chevron-right', 'fa-angles-left', 'fa-angles-right');
        icon.classList.add(mobile ? (expanded ? 'fa-xmark' : 'fa-bars') : (expanded ? 'fa-chevron-left' : 'fa-chevron-right'));
        sidebar.setAttribute('aria-hidden', String(mobile && !expanded));
        sidebar.inert = mobile && !expanded;

        sidebar.querySelectorAll('.app-sidebar-link').forEach(link => {
            const labelElement = link.querySelector('span');
            if (labelElement) link.title = shell.classList.contains('sidebar-collapsed') && !mobile ? labelElement.textContent.trim() : '';
        });
    };

    const setMobileOpen = open => {
        shell.classList.toggle('sidebar-open', open);
        updateControl();
        if (open) sidebar.querySelector('.app-sidebar-link')?.focus();
        else button.focus();
    };

    const init = () => {
        shell = document.querySelector('body.app-shell');
        sidebar = document.getElementById('app-sidebar');
        button = document.getElementById('app-sidebar-toggle');
        if (!shell || !sidebar || !button) return;
        icon = button.querySelector('i');

        try {
            shell.classList.toggle('sidebar-collapsed', localStorage.getItem(storageKey) === 'true');
        } catch (error) {
            shell.classList.remove('sidebar-collapsed');
        }
        updateControl();

        button.addEventListener('click', () => {
            if (isMobile()) {
                setMobileOpen(!shell.classList.contains('sidebar-open'));
                return;
            }

            const collapsed = shell.classList.toggle('sidebar-collapsed');
            try {
                localStorage.setItem(storageKey, String(collapsed));
            } catch (error) {
                // The current page can still use the collapsed state without storage.
            }
            updateControl();
        });

        document.addEventListener('click', event => {
            if (isMobile() && shell.classList.contains('sidebar-open') && !sidebar.contains(event.target) && !button.contains(event.target)) {
                setMobileOpen(false);
            }
        });
        document.addEventListener('keydown', event => {
            if (event.key === 'Escape' && shell.classList.contains('sidebar-open')) setMobileOpen(false);
        });
        sidebar.addEventListener('click', event => {
            if (isMobile() && event.target.closest('a')) setMobileOpen(false);
        });
        window.addEventListener('resize', () => {
            if (!isMobile()) shell.classList.remove('sidebar-open');
            updateControl();
        });
    };

    return { init };
})();

// =============================================
// Color theme toggle
// =============================================
const ThemeToggle = (() => {
    const storageKey = 'wcColorTheme';

    const apply = (theme, button) => {
        const isDark = theme === 'dark';
        const label = `Switch to ${isDark ? 'light' : 'dark'} theme`;
        document.documentElement.setAttribute('data-bs-theme', isDark ? 'dark' : 'light');
        document.querySelector('meta[name="theme-color"]')?.setAttribute('content', isDark ? '#101820' : '#176b87');
        button.setAttribute('aria-label', label);
        button.setAttribute('title', label);
        button.setAttribute('aria-pressed', String(isDark));
        button.querySelector('i').classList.toggle('fa-moon', !isDark);
        button.querySelector('i').classList.toggle('fa-sun', isDark);

        try {
            localStorage.setItem(storageKey, isDark ? 'dark' : 'light');
        } catch (error) {
            // Keep the current theme for this page if storage is unavailable.
        }
    };

    const init = () => {
        const button = document.getElementById('theme-toggle');
        if (!button) return;

        let theme = 'light';
        try {
            theme = localStorage.getItem(storageKey) === 'dark' ? 'dark' : 'light';
        } catch (error) {
            theme = 'light';
        }
        apply(theme, button);

        button.addEventListener('click', () => {
            const nextTheme = document.documentElement.getAttribute('data-bs-theme') === 'dark' ? 'light' : 'dark';
            apply(nextTheme, button);
        });
    };

    return { init };
})();

// =============================================
// Application back navigation
// =============================================
const AppBackButton = (() => {
    const init = () => {
        const button = document.getElementById('app-back-button');
        if (!button) return;

        button.addEventListener('click', () => {
            let sameSiteReferrer = false;
            try {
                sameSiteReferrer = Boolean(document.referrer) && new URL(document.referrer).origin === window.location.origin;
            } catch (error) {
                sameSiteReferrer = false;
            }

            if (sameSiteReferrer && window.history.length > 1) {
                window.history.back();
                return;
            }

            window.location.assign(button.dataset.homeUrl || '/');
        });
    };

    return { init };
})();

// =============================================
// Main Initialization
// =============================================
document.addEventListener('DOMContentLoaded', function() {
    Search.init();
    ScrollToTop.init();
    ToolCollections.init();
    SidebarToggle.init();
    ThemeToggle.init();
    AppBackButton.init();
});