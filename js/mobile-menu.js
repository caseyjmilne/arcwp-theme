/**
 * Mobile Menu Toggle for Header and Footer
 */
document.addEventListener('DOMContentLoaded', function() {
    const body = document.body;

    // Header Menu
    const headerMenuToggle = document.getElementById('header-menu-toggle');
    const headerMenuOverlay = document.getElementById('header-menu-overlay');
    const headerMenuClose = document.getElementById('header-menu-close');

    if (headerMenuToggle && headerMenuOverlay && headerMenuClose) {
        headerMenuToggle.addEventListener('click', function() {
            headerMenuOverlay.classList.remove('hidden');
            headerMenuOverlay.classList.add('flex');
            body.style.overflow = 'hidden';
        });

        function closeHeaderMenu() {
            headerMenuOverlay.classList.add('hidden');
            headerMenuOverlay.classList.remove('flex');
            body.style.overflow = '';
        }

        headerMenuClose.addEventListener('click', closeHeaderMenu);

        headerMenuOverlay.addEventListener('click', function(e) {
            if (e.target === headerMenuOverlay) {
                closeHeaderMenu();
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !headerMenuOverlay.classList.contains('hidden')) {
                closeHeaderMenu();
            }
        });
    }

    // Footer Menu
    const footerMenuToggle = document.getElementById('mobile-menu-toggle');
    const footerMenuOverlay = document.getElementById('mobile-menu-overlay');
    const footerMenuClose = document.getElementById('mobile-menu-close');

    if (footerMenuToggle && footerMenuOverlay && footerMenuClose) {
        footerMenuToggle.addEventListener('click', function() {
            footerMenuOverlay.classList.remove('hidden');
            footerMenuOverlay.classList.add('flex');
            body.style.overflow = 'hidden';
        });

        function closeFooterMenu() {
            footerMenuOverlay.classList.add('hidden');
            footerMenuOverlay.classList.remove('flex');
            body.style.overflow = '';
        }

        footerMenuClose.addEventListener('click', closeFooterMenu);

        footerMenuOverlay.addEventListener('click', function(e) {
            if (e.target === footerMenuOverlay) {
                closeFooterMenu();
            }
        });

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && !footerMenuOverlay.classList.contains('hidden')) {
                closeFooterMenu();
            }
        });
    }
});
