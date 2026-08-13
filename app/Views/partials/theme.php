<!-- Shared brand theme: single source of truth for colours and section styling -->
<script src="https://cdn.tailwindcss.com"></script>
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    brand: {
                        50:  '#e6fafb',
                        100: '#c2f2f5',
                        200: '#8ce6ec',
                        300: '#4fd6e0',
                        400: '#16becc',
                        500: '#02aeba',
                        600: '#019faa',
                        700: '#017f8a',
                        800: '#04656e',
                        900: '#08535a',
                        950: '#01353b',
                    }
                },
                fontFamily: {
                    sans: ['Inter', 'system-ui', 'sans-serif'],
                }
            }
        }
    }
</script>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

<style>
    :root {
        --brand-50:  #e6fafb;
        --brand-100: #c2f2f5;
        --brand-200: #8ce6ec;
        --brand-300: #4fd6e0;
        --brand-400: #16becc;
        --brand-500: #02aeba;
        --brand-600: #019faa;
        --brand-700: #017f8a;
        --brand-800: #04656e;
        --brand-900: #08535a;
        --brand-950: #01353b;
    }

    /* ─── Shared section rhythm (public site) ───────────── */
    .section          { padding-top: 4rem; padding-bottom: 4rem; border-top: 1px solid #f1f5f9; }
    .section-light    { background: #ffffff; }
    .section-muted    { background: #f8fafc; }
    .section-brand    { background: var(--brand-600); }
    .section-dark     { background: var(--brand-950); }
    .section-inner    { max-width: 80rem; margin: 0 auto; padding-left: 1rem; padding-right: 1rem; }
    @media (min-width: 640px) { .section-inner { padding-left: 1.5rem; padding-right: 1.5rem; } }
    @media (min-width: 1024px) { .section-inner { padding-left: 2rem; padding-right: 2rem; } }

    .section-head     { text-align: center; margin-bottom: 3rem; }
    .section-badge {
        display: inline-block;
        font-size: 0.75rem;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.1em;
        color: var(--brand-700);
        background: var(--brand-50);
        border: 1px solid var(--brand-200);
        padding: 0.25rem 0.75rem;
        border-radius: 9999px;
        margin-bottom: 0.75rem;
    }
    .section-title    { font-size: 1.875rem; line-height: 2.25rem; font-weight: 900; color: #0f172a; letter-spacing: -0.025em; }
    @media (min-width: 768px) { .section-title { font-size: 2.25rem; line-height: 2.5rem; } }
    .section-sub      { font-size: 0.875rem; color: #64748b; margin: 0.75rem auto 0; max-width: 36rem; line-height: 1.6; }

    .section-dark .section-badge { color: var(--brand-200); background: rgba(1,127,138,0.35); border-color: var(--brand-800); }
    .section-dark .section-title { color: #ffffff; }
    .section-dark .section-sub   { color: var(--brand-200); }

    /* Inner page hero — identical header treatment on every page */
    .page-hero        { background: var(--brand-700); color: #ffffff; padding-top: 3.5rem; padding-bottom: 3.5rem; text-align: center; }
    .page-hero h1,
    .page-hero-title  { font-size: 1.875rem; line-height: 2.25rem; font-weight: 900; letter-spacing: -0.025em; color: #ffffff; }
    @media (min-width: 768px) { .page-hero h1, .page-hero-title { font-size: 2.25rem; line-height: 2.5rem; } }
    .page-hero p      { font-size: 0.875rem; color: var(--brand-100); max-width: 36rem; margin: 0.75rem auto 0; line-height: 1.6; }
    .page-hero .section-badge { background: rgba(255,255,255,0.15); color: #ffffff; border-color: rgba(255,255,255,0.35); }

    /* Headers sitting on brand/dark backgrounds invert automatically */
    .section-brand .section-title,
    .section-dark  .section-title { color: #ffffff; }
    .section-brand .section-sub,
    .section-dark  .section-sub   { color: var(--brand-100); }
    .section-brand .section-badge,
    .section-dark  .section-badge { background: rgba(255,255,255,0.15); color: #ffffff; border-color: rgba(255,255,255,0.35); }

    /* ─── Shared cards & buttons ────────────────────────── */
    .ui-card {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 1rem;
        box-shadow: 0 1px 2px rgba(15,23,42,0.04);
        transition: box-shadow 0.3s, transform 0.3s, border-color 0.3s;
    }
    .ui-card:hover { box-shadow: 0 12px 28px rgba(15,23,42,0.08); border-color: var(--brand-300); transform: translateY(-4px); }

    /* Static content panel — same shell as .ui-card, without the hover lift */
    .ui-panel {
        background: #ffffff;
        border: 1px solid #e2e8f0;
        border-radius: 1rem;
        box-shadow: 0 1px 2px rgba(15,23,42,0.04);
    }

    .btn-primary {
        display: inline-flex; align-items: center; justify-content: center; gap: 0.5rem;
        background: var(--brand-600); color: #ffffff; font-weight: 700;
        padding: 0.625rem 1.5rem; border-radius: 0.75rem; font-size: 0.875rem;
        transition: background 0.2s;
    }
    .btn-primary:hover { background: var(--brand-700); }

    .btn-outline {
        display: inline-flex; align-items: center; justify-content: center; gap: 0.5rem;
        border: 1px solid var(--brand-300); color: var(--brand-700); font-weight: 700;
        padding: 0.625rem 1.5rem; border-radius: 0.75rem; font-size: 0.875rem;
        transition: background 0.2s, color 0.2s;
    }
    .btn-outline:hover { background: var(--brand-50); }

    /* ─── Admin: identical section shell across all pages ─ */
    .admin-section { display: flex; flex-direction: column; gap: 1.5rem; }
    .admin-head    { display: flex; align-items: center; justify-content: space-between; gap: 1rem; flex-wrap: wrap; }
    .admin-head-title { font-size: 0.875rem; font-weight: 700; color: #334155; text-transform: uppercase; letter-spacing: 0.05em; }
    .admin-panel-title { font-size: 0.75rem; font-weight: 700; color: #334155; text-transform: uppercase; letter-spacing: 0.05em; padding: 1rem 1.5rem; border-bottom: 1px solid #e2e8f0; background: #f8fafc; }
    .admin-table-head { background: #f8fafc; color: #64748b; font-weight: 700; text-transform: uppercase; border-bottom: 1px solid #e2e8f0; }
    .admin-panel   { background: #ffffff; border: 1px solid #e2e8f0; border-radius: 1rem; box-shadow: 0 1px 2px rgba(15,23,42,0.04); overflow: hidden; }
    .admin-panel-pad { padding: 1.5rem; }

    .btn-admin {
        display: inline-flex; align-items: center; gap: 0.375rem;
        background: var(--brand-600); color: #ffffff; font-weight: 700;
        font-size: 0.75rem; padding: 0.5rem 1rem; border-radius: 0.5rem;
        transition: background 0.2s;
    }
    .btn-admin:hover { background: var(--brand-700); }

    .form-input {
        width: 100%; padding: 0.625rem 1rem; border-radius: 0.5rem;
        border: 1px solid #cbd5e1; background: #ffffff; outline: none;
        transition: border-color 0.15s, box-shadow 0.15s;
    }
    .form-input:focus { border-color: var(--brand-600); box-shadow: 0 0 0 2px var(--brand-200); }
    .form-label { display: block; font-size: 0.75rem; font-weight: 700; color: #334155; text-transform: uppercase; letter-spacing: 0.03em; margin-bottom: 0.25rem; }

    .btn-row {
        display: inline-flex; align-items: center; gap: 0.25rem;
        background: var(--brand-50); color: var(--brand-700); font-weight: 700;
        font-size: 11px; padding: 0.375rem 0.75rem; border-radius: 0.375rem;
        border: 1px solid var(--brand-100); transition: background 0.2s;
    }
    .btn-row:hover { background: var(--brand-100); }

    .btn-row-danger {
        display: inline-flex; align-items: center; gap: 0.25rem;
        background: #fef2f2; color: #dc2626; font-weight: 700;
        font-size: 11px; padding: 0.375rem 0.75rem; border-radius: 0.375rem;
        border: 1px solid #fee2e2; transition: background 0.2s;
    }
    .btn-row-danger:hover { background: #fee2e2; }
</style>
