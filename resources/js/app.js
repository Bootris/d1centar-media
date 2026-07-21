import './bootstrap';

// Mobile menu -----------------------------------------------------------
const menuToggle = document.getElementById('menu-toggle');
const menuClose = document.getElementById('menu-close');
const mobileMenu = document.getElementById('mobile-menu');
const menuOverlay = document.getElementById('menu-overlay');

const setMenu = (open) => {
    if (!mobileMenu) return;
    mobileMenu.classList.toggle('translate-x-full', !open);
    menuOverlay?.classList.toggle('opacity-0', !open);
    menuOverlay?.classList.toggle('pointer-events-none', !open);
    document.body.classList.toggle('overflow-hidden', open);
    menuToggle?.setAttribute('aria-expanded', String(open));
};

menuToggle?.addEventListener('click', () => setMenu(true));
menuClose?.addEventListener('click', () => setMenu(false));
menuOverlay?.addEventListener('click', () => setMenu(false));
mobileMenu?.querySelectorAll('a').forEach((link) => {
    link.addEventListener('click', () => setMenu(false));
});
document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') setMenu(false);
});

// Sticky header shadow --------------------------------------------------
const header = document.getElementById('site-header');

const onScroll = () => {
    header?.classList.toggle('shadow-lg', window.scrollY > 8);
};

onScroll();
window.addEventListener('scroll', onScroll, { passive: true });

// Reveal on scroll ------------------------------------------------------
const revealables = document.querySelectorAll('.reveal, .reveal-group');
const reveal = (el) => el.classList.add('is-visible');

if ('IntersectionObserver' in window && revealables.length) {
    const observer = new IntersectionObserver(
        (entries) => {
            entries.forEach((entry) => {
                if (entry.isIntersecting) {
                    reveal(entry.target);
                    observer.unobserve(entry.target);
                }
            });
        },
        { threshold: 0.12, rootMargin: '0px 0px -5% 0px' },
    );

    // Reveal what's already on screen at load synchronously (robust even if
    // the observer callback is delayed); observe the rest for scroll-in.
    revealables.forEach((el) => {
        const rect = el.getBoundingClientRect();
        if (rect.top < window.innerHeight && rect.bottom > 0) {
            reveal(el);
        } else {
            observer.observe(el);
        }
    });
} else {
    revealables.forEach(reveal);
}

// Auto-hide flash toast -------------------------------------------------
const toast = document.getElementById('flash-toast');

if (toast) {
    setTimeout(() => {
        toast.classList.add('opacity-0', 'translate-y-2');
        setTimeout(() => toast.remove(), 500);
    }, 6000);
}
