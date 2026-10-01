<!-- Footer -->
<footer class="py-5 mt-5 border-top">
    <div class="container">
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="app-footer-brand h4 mb-2 fw-bold">
                    <img class="wc-brand-logo" src="<?php echo $base_url; ?>assets/img/wordscompare-mark.svg" alt="">
                    <span class="app-footer-wordmark">
                        <strong class="wc-wordmark"><span>Words</span><span class="wc-wordmark-compare">Compare</span></strong>
                        <small>Compare. Calculate. Create.</small>
                    </span>
                </div>
                <p class="text-muted">Compare. Calculate. Create. Free tools for documents, text, and data.</p>
                <div class="d-flex gap-2 mt-3">
                    <a href="#" class="text-muted" aria-label="Twitter"><i class="fab fa-twitter fa-lg" aria-hidden="true"></i></a>
                    <a href="#" class="text-muted" aria-label="GitHub"><i class="fab fa-github fa-lg" aria-hidden="true"></i></a>
                    <a href="#" class="text-muted" aria-label="Discord"><i class="fab fa-discord fa-lg" aria-hidden="true"></i></a>
                </div>
            </div>

            <div class="col-lg-2">
                <h6 class="text-muted mb-3">Product</h6>
                <ul class="list-unstyled">
                    <li><a href="<?php echo $base_url; ?>" class="text-muted">All Tools</a></li>
                    <li><a href="<?php echo $base_url; ?>developer-tools" class="text-muted">Developer Tools</a></li>
                    <li><a href="<?php echo $base_url; ?>qa-tools" class="text-muted">QA Tools</a></li>
                    <li><a href="<?php echo $base_url; ?>api-testing-tools" class="text-muted">API Testing</a></li>
                </ul>
            </div>

            <div class="col-lg-3">
                <h6 class="text-muted mb-3">Resources</h6>
                <ul class="list-unstyled">
                    <li><a href="<?php echo $base_url; ?>guides" class="text-muted">Guides</a></li>
                    <li><a href="<?php echo $base_url; ?>sitemap.xml" class="text-muted">Sitemap</a></li>
                    <li><a href="<?php echo $base_url; ?>contact" class="text-muted">Contact</a></li>
                </ul>
            </div>

            <div class="col-lg-3">
                <h6 class="text-muted mb-3">Stay Updated</h6>
                <form action="#" onsubmit="event.preventDefault();">
                    <div class="input-group">
                        <input type="email" class="form-control" placeholder="Enter your email" aria-label="Email" />
                        <button class="btn btn-primary" type="submit">Subscribe</button>
                    </div>
                </form>
            </div>
        </div>

        <div class="row mt-4 pt-4 border-top">
            <div class="col-12 d-flex justify-content-between align-items-center">
                <small class="text-muted">© <?= date('Y') ?> <?= htmlspecialchars($site_name) ?>. All rights reserved.</small>
                <small class="text-muted">Made with ❤️ for developers and QA engineers</small>
            </div>
        </div>
    </div>
</footer>

<!-- Scroll to Top Button -->
<button id="scrollToTop" class="btn btn-danger scroll-to-top" aria-label="Scroll to top">
    <i class="fas fa-arrow-up" aria-hidden="true"></i>
</button>

<!-- Heavy Libraries (Deferred to footer if safe, but here we use Bootstrap only) -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

<!-- Dropdown Logic -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Close dropdown when item is clicked
        document.querySelectorAll('.dropdown-item-custom').forEach(function (item) {
            item.addEventListener('click', function () {
                const dropdownElement = this.closest('.dropdown-menu');
                if (dropdownElement) {
                    const toggleBtn = document.querySelector('[aria-labelledby="' + dropdownElement.id + '"]');
                    if (toggleBtn) {
                        bootstrap.Dropdown.getInstance(toggleBtn).hide();
                    }
                }
            });
        });

        // Search functionality
        document.querySelectorAll('.search-input').forEach(function (input) {
            input.addEventListener('keyup', function () {
                const searchText = this.value.toLowerCase();
                const dropdownMenu = this.closest('.dropdown-menu');
                const items = dropdownMenu.querySelectorAll('.dropdown-item-custom');
                const headers = dropdownMenu.querySelectorAll('.dropdown-category-header, .grid-column-header');
                const dividers = dropdownMenu.querySelectorAll('.dropdown-divider');

                let visibleCount = 0;

                items.forEach(function (item) {
                    const text = item.textContent.toLowerCase();
                    if (text.includes(searchText) || searchText === '') {
                        item.style.display = 'flex';
                        visibleCount++;
                    } else {
                        item.style.display = 'none';
                    }
                });

                // Show/hide headers based on search
                headers.forEach(function (header) {
                    header.style.display = visibleCount > 0 ? 'flex' : 'none';
                });

                dividers.forEach(function (divider) {
                    divider.style.display = visibleCount > 0 ? 'block' : 'none';
                });
            });
        });
    });
</script>

<!-- Custom JS -->
<script src="<?php echo $base_url; ?>assets/js/script.js?v=<?php echo time(); ?>"></script>

</body>

</html>