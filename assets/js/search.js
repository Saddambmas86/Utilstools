// Lightweight site search for WordsCompare
(function(){
  const base = (window.BASE_URL || '/')
  function $(sel, ctx){ return (ctx||document).querySelector(sel); }
  function $all(sel, ctx){ return Array.from((ctx||document).querySelectorAll(sel)); }

  // create UI container
  const container = document.createElement('div');
  container.id = 'wc-search-container';
  container.hidden = true;
  container.innerHTML = `
    <section id="wc-search-box" role="dialog" aria-modal="true" aria-label="Search tools">
      <header class="wc-search-header">
        <div>
          <span class="wc-search-eyebrow">TOOL DIRECTORY</span>
          <h2>Find a tool</h2>
        </div>
        <button type="button" id="wc-search-close" aria-label="Close search" title="Close search">
          <i class="fas fa-times" aria-hidden="true"></i>
        </button>
      </header>
      <label class="wc-search-field">
        <i class="fas fa-search" aria-hidden="true"></i>
        <input id="wc-search-input" aria-label="Search tools" placeholder="Search by name, category, or use" aria-controls="wc-search-results" aria-expanded="false" />
        <kbd>ESC</kbd>
      </label>
      <div id="wc-search-results" role="listbox" aria-expanded="false"></div>
      <div id="wc-search-status" role="status" aria-live="polite" class="wc-visually-hidden"></div>
    </section>
  `;
  document.body.appendChild(container);

  const input = document.getElementById('wc-search-input');
  const resultsBox = document.getElementById('wc-search-results');
  const box = document.getElementById('wc-search-box');
  const searchDebug = new URLSearchParams(window.location.search).get('debugSearch') === '1';
  let returnFocusTo = null;
  let activeIndex = -1; // flattened index
  let items = [];

  function debugSearch(event, details) {
    if (searchDebug && window.console) console.debug('[WCSearch]', event, details || {});
  }

  function debounce(fn,wait){ let t; return function(){ clearTimeout(t); t=setTimeout(()=>fn.apply(this,arguments),wait); }; }

  function highlight(text, q){ if(!q) return text; const r = new RegExp('('+q.replace(/[.*+?^${}()|[\]\\]/g,'\\$&')+')','ig'); return text.replace(r,'<mark>$1</mark>'); }

  function renderEmpty(){ resultsBox.innerHTML = '<div class="wc-empty">Type to search tools by name, category, or use case.</div>'; resultsBox.setAttribute('aria-expanded','true'); input.setAttribute('aria-expanded','true'); items=[]; activeIndex=-1; }
  function renderNoResults(q){ resultsBox.innerHTML = '<div class="wc-noresults">No results found for "'+escapeHtml(q)+'"</div>'; resultsBox.setAttribute('aria-expanded','true'); input.setAttribute('aria-expanded','true'); items=[]; activeIndex=-1; }

  function escapeHtml(s){ return s.replace(/[&"'<>]/g,function(c){ return {'&':'&amp;','"':'&quot;',"'":"&#39;","<":"&lt;",">":"&gt;"}[c]; }); }

  function renderGroups(data,q){
    items = [];
    let html = '';
    const groups = data.groups || {};
    const keys = Object.keys(groups);
    if (keys.length===0) { renderNoResults(q); return; }
    keys.forEach(function(ck){
      const cat = groups[ck];
      html += '<div class="wc-group">';
      html += '<div class="wc-group-title">'+escapeHtml(cat.category_title)+'</div>';
      html += '<div class="wc-group-items">';
      cat.items.forEach(function(it){
        const title = highlight(escapeHtml(it.title), q);
        const desc = highlight(escapeHtml(it.description || ''), q);
        html += '<a href="'+base+it.slug+'" class="wc-item" role="option" tabindex="-1" id="wc-item-'+items.length+'" aria-selected="false">';
        html += '<div class="wc-item-title">'+title+'</div>';
        html += '<div class="wc-item-desc">'+desc+'</div>';
        html += '</a>';
        items.push({slug:it.slug, el:null});
      });
      html += '</div></div>';
    });
    resultsBox.innerHTML = html;
    // attach elements
    const els = resultsBox.querySelectorAll('.wc-item');
    els.forEach((el,i)=>{ items[i].el = el; el.dataset.index = i; });
    resultsBox.setAttribute('aria-expanded','true');
    input.setAttribute('aria-expanded','true');
    activeIndex = -1;
    // update live status
    const status = document.getElementById('wc-search-status');
    if(status) status.textContent = items.length + ' results';
  }

  const doSearch = debounce(function(){
    const q = input.value.trim();
    if (!q) { renderEmpty(); return; }
    fetch(base + 'search.php?q=' + encodeURIComponent(q)).then(r=>r.json()).then(function(data){ renderGroups(data, q); }).catch(function(){ renderNoResults(q); });
  }, 180);

  input.addEventListener('input', doSearch);

  // keyboard navigation
  input.addEventListener('keydown', function(e){
    if (e.key === 'ArrowDown' || e.key === 'ArrowUp') {
      const dir = e.key === 'ArrowDown' ? 1 : -1;
      e.preventDefault();
      if (items.length===0) return;
      activeIndex = Math.max(0, Math.min(items.length - 1, (activeIndex === -1 ? (dir>0?0:items.length-1) : activeIndex + dir)));
      updateActive();
    } else if (e.key === 'Enter') {
      if (activeIndex >=0 && items[activeIndex] && items[activeIndex].el) {
        window.location = items[activeIndex].el.href; e.preventDefault();
      }
    } else if (e.key === 'Escape') {
      closeSearch(true);
    }
  });

  function updateActive(){ items.forEach((it,idx)=>{ if(it.el) it.el.classList.toggle('active', idx===activeIndex); }); if(activeIndex>=0 && items[activeIndex].el) items[activeIndex].el.scrollIntoView({block:'nearest'}); }

  // set aria-activedescendant and aria-selected on update
  (function(){
    const originalUpdate = updateActive;
    updateActive = function(){
      originalUpdate();
      const status = document.getElementById('wc-search-status');
      if (activeIndex >= 0 && items[activeIndex] && items[activeIndex].el) {
        const id = items[activeIndex].el.id;
        input.setAttribute('aria-activedescendant', id);
        items.forEach((it,idx)=>{ if(it.el) it.el.setAttribute('aria-selected', idx===activeIndex ? 'true' : 'false'); });
        if(status) status.textContent = (activeIndex+1) + ' of ' + items.length + ' selected';
      } else {
        input.removeAttribute('aria-activedescendant');
        items.forEach((it)=>{ if(it.el) it.el.setAttribute('aria-selected','false'); });
        if(status) status.textContent = items.length + ' results';
      }
    };
  })();

  function closeResults(){ resultsBox.innerHTML=''; resultsBox.setAttribute('aria-expanded','false'); input.setAttribute('aria-expanded','false'); items=[]; activeIndex=-1; }

  function openSearch(trigger){
    if (trigger && trigger.matches && trigger.matches('[data-wc-search]')) returnFocusTo = trigger;
    const wasHidden = container.hidden;
    debugSearch('open requested', { wasHidden: wasHidden, trigger: trigger && (trigger.id || trigger.getAttribute('aria-label')), expanded: trigger && trigger.getAttribute('aria-expanded') });
    container.hidden = false;
    document.body.classList.add('wc-search-open');
    document.querySelectorAll('[data-wc-search]').forEach(function(el){ el.setAttribute('aria-expanded','true'); });
    if (wasHidden) renderEmpty();
    updateSearchTop();
    input.focus();
    debugSearch('opened', { hidden: container.hidden, focusedElement: document.activeElement && document.activeElement.id });
  }

  function closeSearch(restoreFocus, reason){
    debugSearch('close requested', { reason: reason || 'api', wasHidden: container.hidden, restoreFocus: restoreFocus });
    container.hidden = true;
    document.body.classList.remove('wc-search-open');
    document.querySelectorAll('[data-wc-search]').forEach(function(el){ el.setAttribute('aria-expanded','false'); });
    input.value = '';
    closeResults();
    if (restoreFocus !== false && returnFocusTo && document.contains(returnFocusTo)) returnFocusTo.focus();
    debugSearch('closed', { hidden: container.hidden, triggerExpanded: returnFocusTo && returnFocusTo.getAttribute('aria-expanded') });
  }

  function toggleSearch(trigger){
    const isOpen = trigger
      ? trigger.getAttribute('aria-expanded') === 'true'
      : !container.hidden;
    if (!isOpen) openSearch(trigger);
    else {
      if (trigger && trigger.matches && trigger.matches('[data-wc-search]')) returnFocusTo = trigger;
      closeSearch(true);
    }
  }

  document.getElementById('wc-search-close').addEventListener('click', function(){ closeSearch(true, 'close-button'); });
  document.addEventListener('click', function(e){
    const trigger = e.target.closest && e.target.closest('[data-wc-search]');
    if (trigger) {
      debugSearch('outside click ignored for search trigger', { id: trigger.id, hidden: container.hidden });
      return;
    }
    if (!container.hidden && !box.contains(e.target)) {
      debugSearch('outside click dismisses popup', { target: e.target && (e.target.id || e.target.tagName) });
      closeSearch(false, 'outside-click');
    }
  });
  document.addEventListener('keydown', function(e){
    if (e.key === 'Escape' && !container.hidden) {
      e.preventDefault();
      closeSearch(true, 'escape');
    }
  });

  // Ctrl/Cmd+K to open and focus
  window.addEventListener('keydown', function(e){ if ((e.ctrlKey||e.metaKey) && e.key.toLowerCase()==='k') { e.preventDefault(); openSearch(); input.select(); } });

  // small CSS
  // compute top offset from navbar to avoid overlap
  function updateSearchTop() {
    if (!box) return;
    const nav = document.querySelector('.navbar');
    const navHeight = nav ? nav.getBoundingClientRect().height : 56;
    const top = Math.max(12, Math.round(navHeight + 12));
    box.style.top = top + 'px';
  }

  // create CSS; top removed to be set dynamically
  const css = `
  #wc-search-container[hidden]{display:none!important}
  body.wc-search-open{overflow:hidden}
  #wc-search-container{position:fixed;inset:0;z-index:1080;padding:0 16px;background:var(--wc-overlay,rgba(15,31,40,.48));backdrop-filter:blur(3px)}
  #wc-search-box{position:absolute;left:50%;transform:translateX(-50%);width:min(590px,calc(100vw - 32px));max-height:min(76vh,680px);display:flex;flex-direction:column;gap:14px;padding:18px;border:1px solid var(--wc-border,#d7e5df);border-radius:var(--wc-radius-xl,14px);background:var(--wc-surface,#fbfdfc);color:var(--wc-text-primary,#173344);box-shadow:var(--wc-shadow-lg,0 24px 70px rgba(12,31,39,.28));animation:wc-search-appear 160ms ease-out}
  .wc-search-header{display:flex;align-items:center;justify-content:space-between;gap:16px}
  .wc-search-eyebrow{display:block;margin-bottom:3px;color:var(--wc-primary,#176b87);font-size:10px;font-weight:700}
  .wc-search-header h2{margin:0;color:var(--wc-text-primary,#173344);font-size:20px;line-height:1.25}
  #wc-search-close{display:grid;place-items:center;width:36px;height:36px;flex:0 0 auto;border:1px solid var(--wc-border,#d7e5df);border-radius:var(--wc-radius-md,8px);background:var(--wc-surface,#fff);color:var(--wc-text-secondary,#516b70);cursor:pointer}
  #wc-search-close:hover{border-color:var(--wc-danger);background:var(--wc-danger-soft);color:var(--wc-danger)}
  .wc-search-field{display:flex;align-items:center;gap:10px;min-height:50px;padding:0 12px;border:1px solid var(--wc-border-strong,#b8d4c9);border-radius:var(--wc-radius-lg,9px);background:var(--wc-surface,#fff);color:var(--wc-primary,#317b71);box-shadow:0 0 0 3px var(--wc-focus-ring,rgba(61,154,131,.08))}
  #wc-search-input{width:100%;min-width:0;padding:10px 0;border:0;outline:0;background:transparent;color:var(--wc-text-primary,#173344);font-size:15px}
  #wc-search-input::placeholder{color:var(--wc-text-muted,#81938c)}
  .wc-search-field kbd{flex:0 0 auto;padding:3px 6px;border:1px solid var(--wc-border,#dce8e2);border-radius:var(--wc-radius-sm,4px);background:var(--wc-surface-subtle,#f4f8f5);color:var(--wc-text-muted,#70837b);font-size:10px}
  #wc-search-results{min-height:80px;max-height:calc(76vh - 150px);overflow:auto;border:1px solid var(--wc-border,#e0e9e4);border-radius:var(--wc-radius-lg,9px);background:var(--wc-surface,#fff);box-shadow:var(--wc-shadow-sm,0 6px 18px rgba(28,77,66,.06));overscroll-behavior:contain}
  .wc-group{padding:8px}
  .wc-group-title{padding:7px 9px;color:var(--wc-text-secondary,#47776d);font-size:11px;font-weight:700}
  .wc-item{display:block;padding:10px;border-radius:var(--wc-radius-md,7px);color:var(--wc-text-primary,#284c4a);text-decoration:none;transition:background-color 140ms ease}
  .wc-item:hover,.wc-item.active{background:var(--wc-primary-soft,#edf6f1);color:var(--wc-primary-hover,#176b70)}
  .wc-item-title{font-size:14px;font-weight:650}
  .wc-item-desc{margin-top:3px;color:var(--wc-text-muted,#71877f);font-size:12px;line-height:1.4}
  .wc-empty,.wc-noresults{padding:20px;color:var(--wc-text-muted,#71877f);font-size:13px;text-align:center}
  #wc-search-close:focus-visible,#wc-search-input:focus-visible,.wc-item:focus-visible{outline:3px solid var(--wc-focus-ring,rgba(46,167,184,.45));outline-offset:2px}
  @keyframes wc-search-appear{from{opacity:0;transform:translate(-50%,6px)}to{opacity:1;transform:translate(-50%,0)}}
  @media(max-width:576px){#wc-search-box{padding:14px;gap:11px;max-height:82vh}#wc-search-results{max-height:calc(82vh - 145px)}}`;
  const s = document.createElement('style'); s.appendChild(document.createTextNode(css)); document.head.appendChild(s);
  // set initial top and update on resize/scroll
  updateSearchTop();
  window.addEventListener('resize', function(){ updateSearchTop(); });
  // also update after bootstrap navbar transition (if any) and on scroll
  window.addEventListener('scroll', function(){ updateSearchTop(); });

  // expose for tests
  window.WCSearch = { input: input, resultsBox: resultsBox, open: openSearch, close: closeSearch, toggle: toggleSearch };
})();
