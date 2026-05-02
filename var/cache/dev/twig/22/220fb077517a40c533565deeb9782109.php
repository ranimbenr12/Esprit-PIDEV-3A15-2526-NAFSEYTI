<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* base.html.twig */
class __TwigTemplate_f02aaa46a7c8322659cb1c8f5a7b0291 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'meta_description' => [$this, 'block_meta_description'],
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'navbar' => [$this, 'block_navbar'],
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">

<head>
    <meta charset=\"UTF-8\">
    <meta name=\"description\" content=\"";
        // line 6
        yield from $this->unwrap()->yieldBlock('meta_description', $context, $blocks);
        yield "\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>";
        // line 8
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>

    <link href=\"";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/favicon.ico"), "html", null, true);
        yield "\" rel=\"icon\">

    <!-- Google Fonts - Elegant Psychology Theme -->
    <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
    <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>
    <link href=\"https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=DM+Sans:wght@300;400;500&family=Cormorant+Garamond:ital,wght@0,300;0,400;1,300&display=swap\" rel=\"stylesheet\">

    <!-- Icons -->
    <link href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css\" rel=\"stylesheet\">
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css\" rel=\"stylesheet\">

    <!-- CSS -->
    <link href=\"";
        // line 22
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("lib/animate/animate.min.css"), "html", null, true);
        yield "\" rel=\"stylesheet\">
    <link href=\"";
        // line 23
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("lib/owlcarousel/assets/owl.carousel.min.css"), "html", null, true);
        yield "\" rel=\"stylesheet\">
    <link href=\"";
        // line 24
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/bootstrap.min.css"), "html", null, true);
        yield "\" rel=\"stylesheet\">

    <style>
        :root {
            --green-deep: #2D5016;
            --green-mid: #4A7C2F;
            --green-sage: #7BA05B;
            --green-light: #A8C68F;
            --green-pale: #D4E6C3;
            --beige-dark: #C4A882;
            --beige-mid: #D9C4A0;
            --beige-light: #EDE3D0;
            --beige-cream: #F7F2E8;
            --beige-white: #FDFAF5;
            --text-dark: #1A2E0A;
            --text-mid: #3D5C28;
            --shadow-green: rgba(45, 80, 22, 0.15);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--beige-white);
            color: var(--text-dark);
            overflow-x: hidden;
        }

        /* ── SPINNER ── */
        #spinner {
            opacity: 0; visibility: hidden;
            transition: opacity .5s ease-out, visibility 0s linear .5s;
            z-index: 99999;
            background: var(--beige-cream);
        }
        #spinner.show {
            transition: opacity .5s ease-out, visibility 0s linear 0s;
            visibility: visible; opacity: 1;
        }
        .spinner-leaf {
            width: 50px; height: 50px;
            border: 3px solid var(--green-pale);
            border-top-color: var(--green-mid);
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }
        @keyframes spin { to { transform: rotate(360deg); } }

        /* ── TOPBAR ── */
        .topbar {
            background: var(--green-deep);
            padding: 0 60px;
            height: 72px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
        }
        .topbar::after {
            content: '';
            position: absolute;
            bottom: 0; left: 0; right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--green-sage), var(--beige-mid), var(--green-sage), transparent);
        }
        .topbar-logo {
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .logo-symbol {
            width: 38px; height: 38px;
            background: var(--green-sage);
            border-radius: 50% 50% 50% 0;
            transform: rotate(-45deg);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .logo-symbol::after {
            content: '';
            width: 16px; height: 16px;
            background: var(--beige-cream);
            border-radius: 50%;
            transform: rotate(45deg);
        }
        .logo-text {
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem;
            color: var(--beige-cream);
            letter-spacing: 1px;
        }
        .logo-text span { color: var(--green-light); }

        .topbar-contacts {
            display: flex;
            gap: 40px;
        }
        .contact-item {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .contact-icon {
            width: 36px; height: 36px;
            background: rgba(168, 198, 143, 0.2);
            border: 1px solid var(--green-sage);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--green-light);
            font-size: 0.75rem;
        }
        .contact-label {
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--green-light);
            display: block;
        }
        .contact-value {
            font-size: 0.85rem;
            color: var(--beige-light);
        }

        /* ── NAVBAR ── */
        .navbar-wrap {
            background: var(--beige-cream);
            border-bottom: 1px solid var(--beige-mid);
            padding: 0 60px;
            position: sticky;
            top: 0;
            z-index: 1000;
            backdrop-filter: blur(10px);
        }
        .navbar-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 64px;
        }
        .nav-links {
            display: flex;
            gap: 0;
            list-style: none;
        }
        .nav-links a {
            display: block;
            padding: 0 24px;
            height: 64px;
            line-height: 64px;
            font-size: 0.82rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--text-mid);
            text-decoration: none;
            transition: all 0.3s;
            position: relative;
            font-weight: 500;
        }
        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0; left: 50%; right: 50%;
            height: 2px;
            background: var(--green-sage);
            transition: all 0.3s;
        }
        .nav-links a:hover, .nav-links a.active {
            color: var(--green-deep);
        }
        .nav-links a:hover::after, .nav-links a.active::after {
            left: 24px; right: 24px;
        }
        .nav-cta {
            background: #c8ad7f;
            color: var(--beige-cream) !important;
            padding: 0 28px !important;
            border-radius: 4px;
            height: 40px !important;
            line-height: 40px !important;
            margin-top: 12px;
            margin-bottom: 12px;
            transition: background 0.3s !important;
        }
        .nav-cta:hover { background: var(--green-deep) !important; color: white !important; }
        .nav-cta::after { display: none !important; }

        /* ── HERO / CAROUSEL ── */
        .hero-section {
            background: linear-gradient(135deg, var(--beige-cream) 0%, var(--beige-light) 60%, var(--green-pale) 100%);
            min-height: 80vh;
            position: relative;
            display: flex;
            align-items: center;
            overflow: hidden;
            padding: 100px 60px;
        }
        .hero-bg-pattern {
            position: absolute;
            inset: 0;
            background-image: radial-gradient(circle at 20% 50%, rgba(168,198,143,0.12) 0%, transparent 50%),
                              radial-gradient(circle at 80% 20%, rgba(212,230,195,0.08) 0%, transparent 40%),
                              radial-gradient(circle at 60% 80%, rgba(196,168,130,0.06) 0%, transparent 40%);
        }
        .hero-organic-shape {
            position: absolute;
            right: -100px; top: -100px;
            width: 600px; height: 600px;
            border-radius: 40% 60% 70% 30% / 50% 30% 60% 40%;
            background: rgba(24, 216, 24, 0.12);
            animation: morphing 12s ease-in-out infinite;
        }
        .hero-organic-shape-2 {
            position: absolute;
            left: -80px; bottom: -80px;
            width: 400px; height: 400px;
            border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
            background: rgba(196,168,130,0.08);
            animation: morphing 15s ease-in-out infinite reverse;
        }
        @keyframes morphing {
            0%, 100% { border-radius: 40% 60% 70% 30% / 50% 30% 60% 40%; }
            25% { border-radius: 60% 40% 30% 70% / 60% 40% 30% 60%; }
            50% { border-radius: 30% 70% 50% 50% / 40% 60% 40% 50%; }
            75% { border-radius: 50% 50% 60% 40% / 30% 60% 50% 70%; }
        }
        .hero-content { position: relative; z-index: 2; max-width: 1200px; margin: 0 auto; width: 100%; }
        .hero-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(168,198,143,0.4);
            border-radius: 100px;
            padding: 8px 20px;
            font-size: 0.75rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--green-light);
            margin-bottom: 32px;
        }
        .hero-tag::before { content: ''; width: 6px; height: 6px; background: var(--green-light); border-radius: 50%; }
        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.5rem, 6vw, 5rem);
            color: #2f2318;
            line-height: 1.1;
            margin-bottom: 28px;
            font-weight: 400;
        }
        .hero-title em {
            font-style: italic;
            color: var(--green-light);
        }
        .hero-subtitle {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.3rem;
            color: rgba(237,227,208,0.8);
            line-height: 1.8;
            max-width: 560px;
            margin-bottom: 48px;
            font-weight: 300;
        }
        .hero-actions { display: flex; gap: 16px; flex-wrap: wrap; }
        .btn-primary-custom {
            background: var(--beige-mid);
            color: var(--green-deep);
            border: none;
            padding: 16px 36px;
            font-size: 0.82rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s;
            border-radius: 4px;
            display: inline-block;
        }
        .btn-primary-custom:hover {
            background: var(--beige-cream);
            color: var(--green-deep);
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0,0,0,0.2);
        }
        .btn-ghost {
            background: transparent;
            color: #2f2318;
            border: 1px solid #2f2318;
            padding: 16px 36px;
            font-size: 0.82rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            text-decoration: none;
            transition: all 0.3s;
            border-radius: 4px;
            display: inline-block;
        }
        .btn-ghost:hover {
            background: rgba(255,255,255,0.1);
            color: var(--beige-cream);
            border-color: var(--green-light);
        }
        .hero-stats {
            display: flex;
            gap: 48px;
            margin-top: 64px;
            padding-top: 48px;
            border-top: 1px solid rgba(168,198,143,0.25);
        }
        .stat-item { text-align: left; }
        .stat-number {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            color: #2f2318;
            line-height: 1;
        }
        .stat-label {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--green-light);
            margin-top: 6px;
        }

        /* ── ABOUT ── */
        .about-section {
            padding: 120px 60px;
            background: var(--beige-white);
        }
        .section-eyebrow {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 4px;
            color: var(--green-sage);
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .section-eyebrow::before {
            content: '';
            width: 32px;
            height: 1px;
            background: var(--green-sage);
        }
        .section-title-new {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2rem, 4vw, 3.2rem);
            color: var(--text-dark);
            line-height: 1.2;
            margin-bottom: 24px;
            font-weight: 400;
        }
        .section-title-new em { font-style: italic; color: var(--green-mid); }
        .about-text {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.2rem;
            color: #5A6B4A;
            line-height: 1.9;
            margin-bottom: 32px;
            font-weight: 300;
        }
        .about-img-wrap {
            position: relative;
        }
        .about-img-wrap img {
            width: 100%;
            border-radius: 2px;
            display: block;
        }
        .about-img-accent {
            position: absolute;
            top: -20px; right: -20px;
            width: 120px; height: 120px;
            border: 2px solid var(--green-pale);
            border-radius: 2px;
            z-index: -1;
        }
        .about-img-badge {
            position: absolute;
            bottom: 30px; left: -30px;
            background: var(--green-deep);
            color: var(--beige-cream);
            padding: 20px 24px;
            border-radius: 2px;
            text-align: center;
        }
        .badge-number {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            display: block;
            line-height: 1;
        }
        .badge-label {
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--green-light);
            margin-top: 6px;
            display: block;
        }
        .mission-points { list-style: none; margin-top: 24px; }
        .mission-points li {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            padding: 12px 0;
            border-bottom: 1px solid var(--beige-light);
            font-size: 0.95rem;
            color: var(--text-mid);
        }
        .mission-points li:last-child { border-bottom: none; }
        .point-icon {
            width: 24px; height: 24px;
            background: var(--green-pale);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            margin-top: 2px;
            color: var(--green-deep);
            font-size: 0.65rem;
        }

        /* ── SERVICES ── */
        .services-section {
            padding: 120px 60px;
            background: var(--beige-cream);
        }
        .services-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2px;
            margin-top: 60px;
            background: var(--beige-mid);
        }
        .service-card {
            background: var(--beige-white);
            padding: 48px 36px;
            transition: all 0.4s;
            position: relative;
            overflow: hidden;
        }
        .service-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0;
            width: 4px; height: 0;
            background: var(--green-sage);
            transition: height 0.4s;
        }
        .service-card:hover::before { height: 100%; }
        .service-card:hover { background: var(--green-deep); }
        .service-card:hover .service-name,
        .service-card:hover .service-desc,
        .service-card:hover .service-link { color: var(--beige-cream); }
        .service-card:hover .service-icon { background: rgba(255,255,255,0.1); color: var(--green-light); }
        .service-icon {
            width: 56px; height: 56px;
            background: var(--green-pale);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--green-deep);
            font-size: 1.2rem;
            margin-bottom: 24px;
            transition: all 0.4s;
        }
        .service-name {
            font-family: 'Playfair Display', serif;
            font-size: 1.3rem;
            color: var(--text-dark);
            margin-bottom: 14px;
            transition: color 0.4s;
        }
        .service-desc {
            font-size: 0.88rem;
            color: #6B7D5A;
            line-height: 1.7;
            margin-bottom: 24px;
            transition: color 0.4s;
        }
        .service-link {
            font-size: 0.72rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--green-mid);
            text-decoration: none;
            transition: color 0.4s;
        }

        /* ── FEATURES / STATS ── */
        .features-section {
            padding: 120px 60px;
            background: var(--beige-white);
        }
        .stats-mosaic {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: 1fr 1fr;
            gap: 3px;
            border-radius: 4px;
            overflow: hidden;
        }
        .stat-tile {
            padding: 48px 36px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .stat-tile:nth-child(1) { background: var(--green-deep); }
        .stat-tile:nth-child(2) { background: var(--green-mid); }
        .stat-tile:nth-child(3) { background: var(--green-sage); }
        .stat-tile:nth-child(4) { background: var(--green-light); }
        .tile-number {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            color: var(--beige-cream);
            line-height: 1;
        }
        .tile-unit {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            color: rgba(237,227,208,0.7);
        }
        .tile-label {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: rgba(237,227,208,0.8);
            margin-top: 10px;
        }
        .tile-icon {
            font-size: 1.5rem;
            color: rgba(237,227,208,0.5);
            margin-bottom: 12px;
        }
        .features-list { margin-top: 40px; }
        .feature-item {
            display: flex;
            align-items: flex-start;
            gap: 20px;
            padding: 20px 0;
            border-bottom: 1px solid var(--beige-light);
        }
        .feature-item:last-child { border-bottom: none; }
        .feature-num {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            color: var(--green-pale);
            font-style: italic;
            flex-shrink: 0;
            width: 36px;
        }
        .feature-content h4 {
            font-family: 'Playfair Display', serif;
            font-size: 1.05rem;
            color: var(--text-dark);
            margin-bottom: 6px;
            font-weight: 600;
        }
        .feature-content p {
            font-size: 0.87rem;
            color: #6B7D5A;
            line-height: 1.6;
        }

        /* ── DONATIONS ── */
        .donations-section {
            padding: 120px 60px;
            background: var(--beige-cream);
        }
        .donation-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-top: 60px;
        }
        .donation-card {
            background: var(--beige-white);
            border: 1px solid var(--beige-light);
            padding: 32px;
            transition: all 0.4s;
            position: relative;
        }
        .donation-card:hover {
            border-color: var(--green-sage);
            box-shadow: 0 20px 60px var(--shadow-green);
            transform: translateY(-4px);
        }
        .donation-category {
            display: inline-block;
            background: var(--green-pale);
            color: var(--green-deep);
            font-size: 0.65rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 5px 14px;
            border-radius: 100px;
            margin-bottom: 20px;
        }
        .donation-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 2px;
            margin-bottom: 20px;
        }
        .donation-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.3rem;
            color: var(--text-dark);
            margin-bottom: 12px;
            font-weight: 600;
        }
        .donation-desc {
            font-size: 0.87rem;
            color: #6B7D5A;
            line-height: 1.7;
            margin-bottom: 24px;
        }
        .progress-wrap { margin-bottom: 24px; }
        .progress-labels {
            display: flex;
            justify-content: space-between;
            font-size: 0.78rem;
            color: var(--text-mid);
            margin-bottom: 8px;
        }
        .progress-bar-wrap {
            height: 6px;
            background: var(--beige-mid);
            border-radius: 100px;
            overflow: hidden;
        }
        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--green-mid), var(--green-sage));
            border-radius: 100px;
            transition: width 1.5s ease;
        }
        .progress-percent {
            font-family: 'Playfair Display', serif;
            font-size: 0.9rem;
            color: var(--green-mid);
            font-style: italic;
            margin-top: 4px;
        }
        .donate-btn {
            display: block;
            text-align: center;
            background: var(--green-deep);
            color: var(--beige-cream);
            padding: 14px;
            text-decoration: none;
            font-size: 0.75rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            border-radius: 2px;
            transition: all 0.3s;
            font-weight: 500;
        }
        .donate-btn:hover {
            background: var(--green-mid);
            color: var(--beige-cream);
        }

        /* ── BANNER CTA ── */
        .cta-banner {
            background: var(--green-deep);
            padding: 100px 60px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .cta-banner::before {
            content: '';
            position: absolute;
            top: 0; left: 0;
            width: 200px; height: 200px;
            border-bottom-right-radius: 100%;
            background: rgba(122,160,91,0.15);
        }
        .cta-banner::after {
            content: '';
            position: absolute;
            bottom: 0; right: 0;
            width: 300px; height: 300px;
            border-top-left-radius: 100%;
            background: rgba(196,168,130,0.08);
        }
        .cta-content { position: relative; z-index: 1; max-width: 700px; margin: 0 auto; }
        .cta-banner h2 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2rem, 4vw, 3rem);
            color: var(--beige-cream);
            margin-bottom: 20px;
            font-weight: 400;
        }
        .cta-banner h2 em { font-style: italic; color: var(--green-light); }
        .cta-banner p {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.2rem;
            color: rgba(237,227,208,0.75);
            margin-bottom: 48px;
            line-height: 1.8;
            font-weight: 300;
        }

        /* ── EVENTS ── */
        .events-section {
            padding: 120px 60px;
            background: var(--beige-white);
        }
        .events-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-top: 60px;
        }
        .event-card {
            border: 1px solid var(--beige-light);
            overflow: hidden;
            transition: all 0.4s;
        }
        .event-card:hover { border-color: var(--green-sage); }
        .event-card img {
            width: 100%; height: 200px;
            object-fit: cover;
            display: block;
        }
        .event-body { padding: 28px; }
        .event-meta {
            display: flex;
            flex-direction: column;
            gap: 6px;
            margin-bottom: 16px;
        }
        .event-meta span {
            font-size: 0.78rem;
            color: #3816b3;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .event-meta i { color: var(--green-sage); width: 14px; }
        .event-name {
            font-family: 'Playfair Display', serif;
            font-size: 1.15rem;
            color: var(--text-dark);
            text-decoration: none;
            display: block;
            margin-bottom: 12px;
            font-weight: 600;
        }
        .event-name:hover { color: var(--green-mid); }
        .event-desc { font-size: 0.87rem; color: #6B7D5A; line-height: 1.7; }

        /* ── DONATE FORM ── */
        .donate-section {
            padding: 120px 60px;
            background: var(--beige-cream);
        }
        .donate-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0;
            border: 1px solid var(--beige-mid);
        }
        .donate-text-side {
            padding: 64px;
            background: var(--green-deep);
            position: relative;
            overflow: hidden;
        }
        .donate-text-side::before {
            content: '\"';
            font-family: 'Playfair Display', serif;
            font-size: 20rem;
            color: rgba(255,255,255,0.03);
            position: absolute;
            top: -60px; left: 20px;
            line-height: 1;
        }
        .donate-text-side h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            color: var(--beige-cream);
            font-weight: 400;
            line-height: 1.3;
            margin-bottom: 24px;
            position: relative;
        }
        .donate-text-side h2 em { font-style: italic; color: var(--green-light); }
        .donate-text-side p {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.15rem;
            color: rgba(237,227,208,0.75);
            line-height: 1.8;
            font-weight: 300;
            position: relative;
        }
        .donate-form-side {
            padding: 64px;
            background: var(--beige-white);
        }
        .form-group { margin-bottom: 20px; }
        .form-label-custom {
            display: block;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--green-mid);
            margin-bottom: 8px;
        }
        .form-input-custom {
            width: 100%;
            border: 1px solid var(--beige-mid);
            background: var(--beige-cream);
            padding: 14px 18px;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.9rem;
            color: var(--text-dark);
            outline: none;
            transition: border-color 0.3s;
            border-radius: 2px;
        }
        .form-input-custom:focus { border-color: var(--green-sage); background: white; }
        .amount-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 8px;
            margin-bottom: 24px;
        }
        .amount-btn {
            border: 1px solid var(--beige-mid);
            background: var(--beige-cream);
            color: var(--text-mid);
            padding: 12px 8px;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.2s;
            font-family: 'DM Sans', sans-serif;
            border-radius: 2px;
        }
        .amount-btn:hover, .amount-btn.active {
            background: var(--green-deep);
            color: var(--beige-cream);
            border-color: var(--green-deep);
        }
        .submit-btn {
            width: 100%;
            background: var(--green-mid);
            color: var(--beige-cream);
            border: none;
            padding: 18px;
            font-size: 0.8rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.3s;
            font-family: 'DM Sans', sans-serif;
            font-weight: 600;
            border-radius: 2px;
        }
        .submit-btn:hover { background: var(--green-deep); }

        /* ── TEAM ── */
        .team-section {
            padding: 120px 60px;
            background: var(--beige-white);
        }
        .team-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-top: 60px;
        }
        .team-card {
            position: relative;
            overflow: hidden;
            border: 1px solid var(--beige-light);
        }
        .team-card img {
            width: 100%; height: 280px;
            object-fit: cover;
            display: block;
            filter: grayscale(30%);
            transition: all 0.4s;
        }
        .team-card:hover img { filter: grayscale(0%); }
        .team-info {
            padding: 24px 28px;
            background: var(--beige-white);
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }
        .team-name {
            font-family: 'Playfair Display', serif;
            font-size: 1.15rem;
            color: var(--text-dark);
            font-weight: 600;
        }
        .team-role {
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--green-sage);
            margin-top: 4px;
        }
        .team-socials {
            display: flex;
            gap: 8px;
        }
        .team-social-btn {
            width: 32px; height: 32px;
            background: var(--beige-light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--green-mid);
            font-size: 0.7rem;
            text-decoration: none;
            transition: all 0.3s;
        }
        .team-social-btn:hover {
            background: var(--green-deep);
            color: var(--beige-cream);
        }

        /* ── TESTIMONIALS ── */
        .testimonials-section {
            padding: 120px 60px;
            background: var(--beige-cream);
        }
        .testimonial-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-top: 60px;
        }
        .testimonial-card {
            background: var(--beige-white);
            padding: 40px;
            border-left: 3px solid var(--green-sage);
            position: relative;
        }
        .quote-mark {
            font-family: 'Playfair Display', serif;
            font-size: 4rem;
            color: var(--green-pale);
            line-height: 0.5;
            margin-bottom: 20px;
            display: block;
        }
        .testimonial-text {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.1rem;
            color: var(--text-mid);
            line-height: 1.8;
            margin-bottom: 28px;
            font-style: italic;
            font-weight: 300;
        }
        .stars { color: var(--green-sage); font-size: 0.7rem; margin-bottom: 16px; }
        .testimonial-author { display: flex; align-items: center; gap: 14px; }
        .author-avatar {
            width: 44px; height: 44px;
            border-radius: 50%;
            object-fit: cover;
        }
        .author-name {
            font-family: 'Playfair Display', serif;
            font-size: 1rem;
            color: var(--text-dark);
            font-weight: 600;
        }
        .author-title { font-size: 0.72rem; color: var(--green-sage); text-transform: uppercase; letter-spacing: 1px; }

        /* ── NEWSLETTER ── */
        .newsletter-section {
            padding: 100px 60px;
            background: var(--green-sage);
            text-align: center;
        }
        .newsletter-section h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            color: var(--beige-cream);
            margin-bottom: 16px;
            font-weight: 400;
        }
        .newsletter-section p {
            color: rgba(237,227,208,0.8);
            margin-bottom: 40px;
            font-size: 1rem;
        }
        .newsletter-form {
            display: flex;
            max-width: 480px;
            margin: 0 auto;
            gap: 0;
        }
        .newsletter-input {
            flex: 1;
            border: none;
            padding: 16px 24px;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.9rem;
            background: rgba(255,255,255,0.95);
            color: var(--text-dark);
            outline: none;
            border-radius: 2px 0 0 2px;
        }
        .newsletter-btn {
            background: var(--green-deep);
            color: var(--beige-cream);
            border: none;
            padding: 16px 28px;
            font-size: 0.75rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
            font-weight: 600;
            transition: background 0.3s;
            border-radius: 0 2px 2px 0;
        }
        .newsletter-btn:hover { background: var(--text-dark); }

        /* ── FOOTER ── */
        .footer {
            background: var(--text-dark);
            padding: 80px 60px 0;
            color: rgba(237,227,208,0.6);
        }
        .footer-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr 1.5fr;
            gap: 60px;
            padding-bottom: 60px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }
        .footer-brand p {
            margin-top: 20px;
            font-size: 0.87rem;
            line-height: 1.8;
        }
        .footer-socials {
            display: flex;
            gap: 10px;
            margin-top: 24px;
        }
        .footer-social {
            width: 36px; height: 36px;
            background: rgba(168,198,143,0.1);
            border: 1px solid rgba(168,198,143,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--green-light);
            font-size: 0.75rem;
            text-decoration: none;
            border-radius: 4px;
            transition: all 0.3s;
        }
        .footer-social:hover {
            background: var(--green-mid);
            border-color: var(--green-mid);
            color: white;
        }
        .footer-heading {
            font-family: 'Playfair Display', serif;
            font-size: 1rem;
            color: var(--beige-light);
            margin-bottom: 24px;
            font-weight: 600;
        }
        .footer-links { list-style: none; }
        .footer-links li { margin-bottom: 10px; }
        .footer-links a {
            font-size: 0.87rem;
            color: rgba(237,227,208,0.6);
            text-decoration: none;
            transition: color 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .footer-links a::before {
            content: '';
            width: 16px; height: 1px;
            background: var(--green-sage);
            flex-shrink: 0;
        }
        .footer-links a:hover { color: var(--green-light); }
        .footer-contact p {
            font-size: 0.87rem;
            margin-bottom: 10px;
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }
        .footer-contact i { color: var(--green-sage); margin-top: 3px; flex-shrink: 0; }
        .footer-hours .hour-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid rgba(255,255,255,0.05);
            font-size: 0.82rem;
        }
        .hour-day { color: rgba(237,227,208,0.6); }
        .hour-time { color: var(--green-light); }
        .footer-bottom {
            padding: 24px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.8rem;
            color: rgba(237,227,208,0.4);
        }
        .footer-bottom a { color: var(--green-light); text-decoration: none; }

        /* ── UTILS ── */
        .container-custom { max-width: 1200px; margin: 0 auto; width: 100%; }
        .row-flex { display: flex; gap: 60px; align-items: center; }
        .col-half { flex: 1; }

        /* ── VIDEO BANNER ── */
        .video-banner {
            background: var(--green-mid);
            padding: 40px 60px;
        }
        .video-inner {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            gap: 40px;
        }
        .play-btn {
            width: 64px; height: 64px;
            background: var(--beige-cream);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            cursor: pointer;
            border: none;
            transition: all 0.3s;
            position: relative;
        }
        .play-btn::before {
            content: '';
            position: absolute;
            inset: -6px;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,0.3);
            animation: pulse-ring 2s ease infinite;
        }
        @keyframes pulse-ring {
            0% { transform: scale(1); opacity: 1; }
            100% { transform: scale(1.4); opacity: 0; }
        }
        .play-btn i { color: var(--green-deep); font-size: 1rem; margin-left: 4px; }
        .play-btn:hover { background: var(--green-deep); }
        .play-btn:hover i { color: var(--beige-cream); }
        .video-quote {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.3rem;
            color: var(--beige-cream);
            font-style: italic;
            font-weight: 300;
        }

        @media (max-width: 1024px) {
            .topbar { padding: 0 24px; }
            .navbar-wrap { padding: 0 24px; }
            .hero-section, .about-section, .services-section, .features-section,
            .donations-section, .cta-banner, .events-section, .donate-section,
            .team-section, .testimonials-section, .newsletter-section { padding-left: 24px; padding-right: 24px; }
            .footer { padding: 60px 24px 0; }
            .topbar-contacts { display: none; }
            .services-grid { grid-template-columns: 1fr 1fr; }
            .donation-cards, .events-grid, .team-grid, .testimonial-cards { grid-template-columns: 1fr; }
            .footer-grid { grid-template-columns: 1fr 1fr; }
            .row-flex { flex-direction: column; }
            .donate-grid { grid-template-columns: 1fr; }
            .stats-mosaic { width: 100%; }
            .hero-stats { gap: 24px; }
        }
        .logo-img {
    width: 50px;
    height: 50px;
    object-fit: contain;
}
element.style {
    display: flex;
    align-items: center;
    gap: 10px;
    cursor: pointer;
    padding: 8px 12px;
    border-radius: 8px;
    transition: background 0.2s;
    background: transparent;
}
    </style>

    ";
        // line 1243
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 1244
        yield "</head>

<body>

    <!-- Spinner -->
    <div id=\"spinner\" class=\"show position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center\">
        <div class=\"spinner-leaf\"></div>
    </div>

    <!-- Topbar -->
    <div class=\"topbar\">
        <a href=\"";
        // line 1255
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\" class=\"topbar-logo\">
    <img src=\"";
        // line 1256
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/logo.png"), "html", null, true);
        yield "\" alt=\"Nafseyti Logo\" class=\"logo-img\">
    <span class=\"logo-text\">N<span>afseyti</span></span>
</a>
        <div class=\"topbar-contacts d-none d-lg-flex\">
            <div class=\"contact-item\">
                <div class=\"contact-icon\"><i class=\"fas fa-phone\"></i></div>
                <div>
                    <span class=\"contact-label\">Appelez-nous</span>
                    <span class=\"contact-value\">+216 70 000 000</span>
                </div>
            </div>
            <div class=\"contact-item\">
                <div class=\"contact-icon\"><i class=\"fas fa-envelope\"></i></div>
                <div>
                    <span class=\"contact-label\">Écrivez-nous</span>
                    <span class=\"contact-value\">contact@nafseyti.tn</span>
                </div>
            </div>
            <div class=\"contact-item\">
                <div class=\"contact-icon\"><i class=\"fas fa-map-marker-alt\"></i></div>
                <div>
                    <span class=\"contact-label\">Adresse</span>
                    <span class=\"contact-value\">Tunis, Tunisie</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    ";
        // line 1285
        yield from $this->unwrap()->yieldBlock('navbar', $context, $blocks);
        // line 1392
        yield "
     

    <!-- BODY -->
    ";
        // line 1396
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 1397
        yield "
    <!-- Footer -->
<div class=\"footer\">
    <div class=\"footer-grid\">

        <!-- Logo + description -->
        <div class=\"footer-brand\">
            <div style=\"display:flex;align-items:center;gap:10px;\">
                <div style=\"width:32px;height:32px;background:var(--green-sage);border-radius:50% 50% 50% 0;transform:rotate(-45deg);display:flex;align-items:center;justify-content:center;flex-shrink:0;\">
                    <div style=\"width:12px;height:12px;background:var(--text-dark);border-radius:50%;transform:rotate(45deg);\"></div>
                </div>
                <span style=\"font-family:'Playfair Display',serif;font-size:1.4rem;color:var(--beige-light);\">
                    NAFSEY<span style=\"color:var(--green-light);\">TI</span>
                </span>
            </div>

            <p>
                Une plateforme dédiée au bien-être psychologique des étudiants,
                enseignants et universités tunisiennes.
            </p>

            <div class=\"footer-socials\">
                <a href=\"#!\" class=\"footer-social\"><i class=\"fab fa-facebook-f\"></i></a>
                <a href=\"#!\" class=\"footer-social\"><i class=\"fab fa-instagram\"></i></a>
                <a href=\"#!\" class=\"footer-social\"><i class=\"fab fa-linkedin-in\"></i></a>
            </div>
        </div>

        <!-- Liens -->
        <div>
            <h4 class=\"footer-heading\">Liens Rapides</h4>
            <ul class=\"footer-links\">
                <li><a href=\"#!\">Accueil</a></li>
                <li><a href=\"#!\">Contenu Psychologique</a></li>
                <li><a href=\"#!\">Tests Psychologiques</a></li>
                <li><a href=\"#!\">Rendez-vous</a></li>
                <li><a href=\"#\">Evenements</a></li>
                <li><a href=\"#\">Suivi Personnel</a></li>
            </ul>
        </div>

        <!-- Disponibilité -->
        <div class=\"footer-hours\">
            <h4 class=\"footer-heading\">Disponibilité</h4>
            <div class=\"hour-row\">
                <span class=\"hour-day\">Lundi – Vendredi</span>
                <span class=\"hour-time\">08h – 18h</span>
            </div>
            <div class=\"hour-row\">
                <span class=\"hour-day\">Samedi</span>
                <span class=\"hour-time\">09h – 13h</span>
            </div>
            <div class=\"hour-row\">
                <span class=\"hour-day\">Support en ligne</span>
                <span class=\"hour-time\">24/7</span>
            </div>
        </div>

        <!-- Contact -->
        <div class=\"footer-contact\">
            <h4 class=\"footer-heading\">Contact</h4>
            <p><i class=\"fas fa-map-marker-alt\"></i> Tunis, Tunisie</p>
            <p><i class=\"fas fa-phone\"></i> +216 70 000 000</p>
            <p><i class=\"fas fa-envelope\"></i> contact@nafseyti.tn</p>
        </div>
    </div>

    <!-- Bottom -->
    <div class=\"footer-bottom\">
        <span>&copy; ";
        // line 1466
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "Y"), "html", null, true);
        yield " NAFSEYTI — Tous droits réservés</span>
        <span>Conçu pour le bien-être universitaire ♥</span>
    </div>
</div>

    <!-- JS -->
    <script src=\"https://code.jquery.com/jquery-3.4.1.min.js\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js\"></script>
    <script src=\"";
        // line 1474
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("lib/wow/wow.min.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 1475
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("lib/easing/easing.min.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 1476
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("lib/waypoints/waypoints.min.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 1477
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("lib/owlcarousel/owl.carousel.min.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 1478
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("lib/counterup/counterup.min.js"), "html", null, true);
        yield "\"></script>
    <script src=\"";
        // line 1479
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/main.js"), "html", null, true);
        yield "\"></script>

    <script>
        // Spinner
        window.addEventListener('load', function() {
            document.getElementById('spinner').classList.remove('show');
        });

        // Amount buttons
        document.querySelectorAll('.amount-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.amount-btn').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
            });
        });

        // Animate progress bars on scroll
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    const fill = e.target;
                    const target = fill.getAttribute('data-width');
                    fill.style.width = target + '%';
                }
            });
        }, { threshold: 0.3 });
        document.querySelectorAll('.progress-fill').forEach(el => observer.observe(el));
    </script>
      <script>
function toggleProfileDropdown() {
    const dropdown = document.getElementById('profileDropdown');
    dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
}

document.addEventListener('click', function(e) {
    const wrap = document.getElementById('profileDropdownWrap');
    if (wrap && !wrap.contains(e.target)) {
        document.getElementById('profileDropdown').style.display = 'none';
    }
});
</script>

    ";
        // line 1521
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 1522
        yield "</body>
</html>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 6
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_meta_description(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "meta_description"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "meta_description"));

        yield "MindCare - Soutien Psychologique & Bien-être";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 8
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "MindCare";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 1243
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 1285
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_navbar(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "navbar"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "navbar"));

        // line 1286
        yield "    <div class=\"navbar-wrap\">
        <div class=\"navbar-inner\">
            <ul class=\"nav-links\">
                <li>
                    <a href=\"";
        // line 1290
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\"
                    ";
        // line 1291
        yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 1291, $this->source); })()), "request", [], "any", false, false, false, 1291), "attributes", [], "any", false, false, false, 1291), "get", ["_route"], "method", false, false, false, 1291) == "app_home")) ? ("class=\"active\"") : (""));
        yield ">
                        Accueil
                    </a>
                </li>

                <li><a href=\"#\">Contenu Psychologique</a></li>

               <li>
                <a href=\"";
        // line 1299
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 1299, $this->source); })()), "user", [], "any", false, false, false, 1299) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 1299, $this->source); })()), "user", [], "any", false, false, false, 1299), "role", [], "any", false, false, false, 1299) == "etudiant"))) {
            // line 1300
            yield "                            ";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_test_list");
            yield "
                        ";
        } else {
            // line 1302
            yield "                            javascript:void(0)
                        ";
        }
        // line 1303
        yield "\"
                class=\"";
        // line 1304
        if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 1304, $this->source); })()), "request", [], "any", false, false, false, 1304), "attributes", [], "any", false, false, false, 1304), "get", ["_route"], "method", false, false, false, 1304) == "front_test_list")) {
            yield "active";
        }
        yield "\">
                    Tests
                </a>
            </li>

                <li>
                    <a href=\"
                        ";
        // line 1311
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 1311, $this->source); })()), "user", [], "any", false, false, false, 1311)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 1312
            yield "                            ";
            if ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 1312, $this->source); })()), "user", [], "any", false, false, false, 1312), "role", [], "any", false, false, false, 1312) == "etudiant")) {
                // line 1313
                yield "                                ";
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("rdv_index");
                yield "
                            ";
            } elseif (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,             // line 1314
(isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 1314, $this->source); })()), "user", [], "any", false, false, false, 1314), "role", [], "any", false, false, false, 1314) == "psychologue") || (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 1314, $this->source); })()), "user", [], "any", false, false, false, 1314), "role", [], "any", false, false, false, 1314) == "coach_vie"))) {
                // line 1315
                yield "                                ";
                yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("psy_dashboard");
                yield "
                            ";
            } else {
                // line 1317
                yield "                                javascript:void(0)
                            ";
            }
            // line 1319
            yield "                        ";
        } else {
            // line 1320
            yield "                            javascript:void(0)
                        ";
        }
        // line 1322
        yield "                    \"
                    class=\"";
        // line 1323
        if (CoreExtension::inFilter(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 1323, $this->source); })()), "request", [], "any", false, false, false, 1323), "attributes", [], "any", false, false, false, 1323), "get", ["_route"], "method", false, false, false, 1323), ["rdv_index", "psy_dashboard"])) {
            yield "active";
        }
        yield "\">
                        Rendez-vous
                    </a>
                </li>

                <li><a href=\"";
        // line 1328
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("client_events_index");
        yield "\" class=\"";
        yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 1328, $this->source); })()), "request", [], "any", false, false, false, 1328), "attributes", [], "any", false, false, false, 1328), "get", ["_route"], "method", false, false, false, 1328) == "client_events_index")) ? ("active") : (""));
        yield "\">Evenements</a></li>
                <li><a href=\"#\">Suivi Personnel</a></li>
            </ul>
            
            ";
        // line 1332
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 1332, $this->source); })()), "user", [], "any", false, false, false, 1332)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 1333
            yield "    <div style=\"position:relative; display:flex; align-items:center;\" id=\"profileDropdownWrap\">
        <div onclick=\"toggleProfileDropdown()\" 
             style=\"display:flex; align-items:center; gap:10px; cursor:pointer; padding:8px 12px; border-radius:8px; transition:background 0.2s;\"
             onmouseover=\"this.style.background='rgba(0,0,0,0.05)'\" 
             onmouseout=\"this.style.background='transparent'\">
            
            ";
            // line 1339
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 1339, $this->source); })()), "user", [], "any", false, false, false, 1339), "profile_photo", [], "any", false, false, false, 1339)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 1340
                yield "              <img src=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 1340, $this->source); })()), "user", [], "any", false, false, false, 1340), "profile_photo", [], "any", false, false, false, 1340)), "html", null, true);
                yield "\"
     alt=\"Photo de profil\"
     style=\"width:38px; height:38px; border-radius:50%; object-fit:cover; border:2px solid #4a7c3f;\">
            ";
            } else {
                // line 1344
                yield "                <div style=\"width:38px; height:38px; border-radius:50%; background:#4a7c3f; display:flex; align-items:center; justify-content:center; border:2px solid #4a7c3f;\">
                    <i class=\"fas fa-user\" style=\"color:white; font-size:1rem;\"></i>
                </div>
            ";
            }
            // line 1348
            yield "
            <div style=\"line-height:1.2;\">
                <div style=\"font-size:0.85rem; font-weight:600; color:#2d3a1e;\">
                    ";
            // line 1351
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 1351, $this->source); })()), "user", [], "any", false, false, false, 1351), "firstname", [], "any", false, false, false, 1351), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 1351, $this->source); })()), "user", [], "any", false, false, false, 1351), "lastname", [], "any", false, false, false, 1351), "html", null, true);
            yield "
                </div>
                <div style=\"font-size:0.7rem; color:#6B7D5A; text-transform:uppercase; letter-spacing:1px;\">
                    ";
            // line 1354
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 1354, $this->source); })()), "user", [], "any", false, false, false, 1354), "role", [], "any", false, false, false, 1354), "html", null, true);
            yield "
                </div>
            </div>
            <i class=\"fas fa-chevron-down\" style=\"font-size:0.7rem; color:#6B7D5A;\"></i>
        </div>
        </div> 

        <!-- Dropdown -->
        <div id=\"profileDropdown\"
             style=\"display:none; position:absolute; top:calc(100% + 8px); right:0; background:white; border-radius:12px; box-shadow:0 10px 40px rgba(45,80,22,0.15); min-width:200px; overflow:hidden; z-index:9999; border:1px solid #e8e0d0;\">
            
            <div style=\"padding:16px 20px; border-bottom:1px solid #f0ebe0; background:#fafaf7;\">
                <div style=\"font-size:0.75rem; color:#6B7D5A; text-transform:uppercase; letter-spacing:1px;\">Connecté en tant que</div>
                <div style=\"font-size:0.9rem; font-weight:600; color:#2d3a1e; margin-top:2px;\">";
            // line 1367
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 1367, $this->source); })()), "user", [], "any", false, false, false, 1367), "firstname", [], "any", false, false, false, 1367), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 1367, $this->source); })()), "user", [], "any", false, false, false, 1367), "lastname", [], "any", false, false, false, 1367), "html", null, true);
            yield "</div>
            </div>

            <a href=\"";
            // line 1370
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile");
            yield "\" 
               style=\"display:flex; align-items:center; gap:12px; padding:14px 20px; text-decoration:none; color:#2d3a1e; font-size:0.9rem; transition:background 0.2s;\"
               onmouseover=\"this.style.background='#f5f0e8'\" onmouseout=\"this.style.background='transparent'\">
                <i class=\"fas fa-user-circle\" style=\"color:#4a7c3f; width:16px;\"></i>
                Mon Profil
            </a>

            <a href=\"";
            // line 1377
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
            yield "\" 
               style=\"display:flex; align-items:center; gap:12px; padding:14px 20px; text-decoration:none; color:#991b1b; font-size:0.9rem; transition:background 0.2s; border-top:1px solid #f0ebe0;\"
               onmouseover=\"this.style.background='#fee2e2'\" onmouseout=\"this.style.background='transparent'\">
                <i class=\"fas fa-sign-out-alt\" style=\"color:#991b1b; width:16px;\"></i>
                Se déconnecter
            </a>
        </div>
    </div>
";
        } else {
            // line 1386
            yield "    <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
            yield "\" class=\"nav-cta nav-links a\">Se connecter</a>
";
        }
        // line 1388
        yield "        
            </div>
        </div>
    ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 1396
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 1521
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "base.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  1846 => 1521,  1824 => 1396,  1810 => 1388,  1804 => 1386,  1792 => 1377,  1782 => 1370,  1774 => 1367,  1758 => 1354,  1750 => 1351,  1745 => 1348,  1739 => 1344,  1731 => 1340,  1729 => 1339,  1721 => 1333,  1719 => 1332,  1710 => 1328,  1700 => 1323,  1697 => 1322,  1693 => 1320,  1690 => 1319,  1686 => 1317,  1680 => 1315,  1678 => 1314,  1673 => 1313,  1670 => 1312,  1668 => 1311,  1656 => 1304,  1653 => 1303,  1649 => 1302,  1643 => 1300,  1641 => 1299,  1630 => 1291,  1626 => 1290,  1620 => 1286,  1607 => 1285,  1585 => 1243,  1562 => 8,  1539 => 6,  1526 => 1522,  1524 => 1521,  1479 => 1479,  1475 => 1478,  1471 => 1477,  1467 => 1476,  1463 => 1475,  1459 => 1474,  1448 => 1466,  1377 => 1397,  1375 => 1396,  1369 => 1392,  1367 => 1285,  1335 => 1256,  1331 => 1255,  1318 => 1244,  1316 => 1243,  94 => 24,  90 => 23,  86 => 22,  71 => 10,  66 => 8,  61 => 6,  54 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">

<head>
    <meta charset=\"UTF-8\">
    <meta name=\"description\" content=\"{% block meta_description %}MindCare - Soutien Psychologique & Bien-être{% endblock %}\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>{% block title %}MindCare{% endblock %}</title>

    <link href=\"{{ asset('img/favicon.ico') }}\" rel=\"icon\">

    <!-- Google Fonts - Elegant Psychology Theme -->
    <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
    <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>
    <link href=\"https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=DM+Sans:wght@300;400;500&family=Cormorant+Garamond:ital,wght@0,300;0,400;1,300&display=swap\" rel=\"stylesheet\">

    <!-- Icons -->
    <link href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css\" rel=\"stylesheet\">
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css\" rel=\"stylesheet\">

    <!-- CSS -->
    <link href=\"{{ asset('lib/animate/animate.min.css') }}\" rel=\"stylesheet\">
    <link href=\"{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}\" rel=\"stylesheet\">
    <link href=\"{{ asset('css/bootstrap.min.css') }}\" rel=\"stylesheet\">

    <style>
        :root {
            --green-deep: #2D5016;
            --green-mid: #4A7C2F;
            --green-sage: #7BA05B;
            --green-light: #A8C68F;
            --green-pale: #D4E6C3;
            --beige-dark: #C4A882;
            --beige-mid: #D9C4A0;
            --beige-light: #EDE3D0;
            --beige-cream: #F7F2E8;
            --beige-white: #FDFAF5;
            --text-dark: #1A2E0A;
            --text-mid: #3D5C28;
            --shadow-green: rgba(45, 80, 22, 0.15);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'DM Sans', sans-serif;
            background: var(--beige-white);
            color: var(--text-dark);
            overflow-x: hidden;
        }

        /* ── SPINNER ── */
        #spinner {
            opacity: 0; visibility: hidden;
            transition: opacity .5s ease-out, visibility 0s linear .5s;
            z-index: 99999;
            background: var(--beige-cream);
        }
        #spinner.show {
            transition: opacity .5s ease-out, visibility 0s linear 0s;
            visibility: visible; opacity: 1;
        }
        .spinner-leaf {
            width: 50px; height: 50px;
            border: 3px solid var(--green-pale);
            border-top-color: var(--green-mid);
            border-radius: 50%;
            animation: spin 0.8s linear infinite;
        }
        @keyframes spin { to { transform: rotate(360deg); } }

        /* ── TOPBAR ── */
        .topbar {
            background: var(--green-deep);
            padding: 0 60px;
            height: 72px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: relative;
        }
        .topbar::after {
            content: '';
            position: absolute;
            bottom: 0; left: 0; right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, var(--green-sage), var(--beige-mid), var(--green-sage), transparent);
        }
        .topbar-logo {
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .logo-symbol {
            width: 38px; height: 38px;
            background: var(--green-sage);
            border-radius: 50% 50% 50% 0;
            transform: rotate(-45deg);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        .logo-symbol::after {
            content: '';
            width: 16px; height: 16px;
            background: var(--beige-cream);
            border-radius: 50%;
            transform: rotate(45deg);
        }
        .logo-text {
            font-family: 'Playfair Display', serif;
            font-size: 1.6rem;
            color: var(--beige-cream);
            letter-spacing: 1px;
        }
        .logo-text span { color: var(--green-light); }

        .topbar-contacts {
            display: flex;
            gap: 40px;
        }
        .contact-item {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .contact-icon {
            width: 36px; height: 36px;
            background: rgba(168, 198, 143, 0.2);
            border: 1px solid var(--green-sage);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--green-light);
            font-size: 0.75rem;
        }
        .contact-label {
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--green-light);
            display: block;
        }
        .contact-value {
            font-size: 0.85rem;
            color: var(--beige-light);
        }

        /* ── NAVBAR ── */
        .navbar-wrap {
            background: var(--beige-cream);
            border-bottom: 1px solid var(--beige-mid);
            padding: 0 60px;
            position: sticky;
            top: 0;
            z-index: 1000;
            backdrop-filter: blur(10px);
        }
        .navbar-inner {
            display: flex;
            align-items: center;
            justify-content: space-between;
            height: 64px;
        }
        .nav-links {
            display: flex;
            gap: 0;
            list-style: none;
        }
        .nav-links a {
            display: block;
            padding: 0 24px;
            height: 64px;
            line-height: 64px;
            font-size: 0.82rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--text-mid);
            text-decoration: none;
            transition: all 0.3s;
            position: relative;
            font-weight: 500;
        }
        .nav-links a::after {
            content: '';
            position: absolute;
            bottom: 0; left: 50%; right: 50%;
            height: 2px;
            background: var(--green-sage);
            transition: all 0.3s;
        }
        .nav-links a:hover, .nav-links a.active {
            color: var(--green-deep);
        }
        .nav-links a:hover::after, .nav-links a.active::after {
            left: 24px; right: 24px;
        }
        .nav-cta {
            background: #c8ad7f;
            color: var(--beige-cream) !important;
            padding: 0 28px !important;
            border-radius: 4px;
            height: 40px !important;
            line-height: 40px !important;
            margin-top: 12px;
            margin-bottom: 12px;
            transition: background 0.3s !important;
        }
        .nav-cta:hover { background: var(--green-deep) !important; color: white !important; }
        .nav-cta::after { display: none !important; }

        /* ── HERO / CAROUSEL ── */
        .hero-section {
            background: linear-gradient(135deg, var(--beige-cream) 0%, var(--beige-light) 60%, var(--green-pale) 100%);
            min-height: 80vh;
            position: relative;
            display: flex;
            align-items: center;
            overflow: hidden;
            padding: 100px 60px;
        }
        .hero-bg-pattern {
            position: absolute;
            inset: 0;
            background-image: radial-gradient(circle at 20% 50%, rgba(168,198,143,0.12) 0%, transparent 50%),
                              radial-gradient(circle at 80% 20%, rgba(212,230,195,0.08) 0%, transparent 40%),
                              radial-gradient(circle at 60% 80%, rgba(196,168,130,0.06) 0%, transparent 40%);
        }
        .hero-organic-shape {
            position: absolute;
            right: -100px; top: -100px;
            width: 600px; height: 600px;
            border-radius: 40% 60% 70% 30% / 50% 30% 60% 40%;
            background: rgba(24, 216, 24, 0.12);
            animation: morphing 12s ease-in-out infinite;
        }
        .hero-organic-shape-2 {
            position: absolute;
            left: -80px; bottom: -80px;
            width: 400px; height: 400px;
            border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
            background: rgba(196,168,130,0.08);
            animation: morphing 15s ease-in-out infinite reverse;
        }
        @keyframes morphing {
            0%, 100% { border-radius: 40% 60% 70% 30% / 50% 30% 60% 40%; }
            25% { border-radius: 60% 40% 30% 70% / 60% 40% 30% 60%; }
            50% { border-radius: 30% 70% 50% 50% / 40% 60% 40% 50%; }
            75% { border-radius: 50% 50% 60% 40% / 30% 60% 50% 70%; }
        }
        .hero-content { position: relative; z-index: 2; max-width: 1200px; margin: 0 auto; width: 100%; }
        .hero-tag {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: rgba(255,255,255,0.1);
            border: 1px solid rgba(168,198,143,0.4);
            border-radius: 100px;
            padding: 8px 20px;
            font-size: 0.75rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--green-light);
            margin-bottom: 32px;
        }
        .hero-tag::before { content: ''; width: 6px; height: 6px; background: var(--green-light); border-radius: 50%; }
        .hero-title {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2.5rem, 6vw, 5rem);
            color: #2f2318;
            line-height: 1.1;
            margin-bottom: 28px;
            font-weight: 400;
        }
        .hero-title em {
            font-style: italic;
            color: var(--green-light);
        }
        .hero-subtitle {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.3rem;
            color: rgba(237,227,208,0.8);
            line-height: 1.8;
            max-width: 560px;
            margin-bottom: 48px;
            font-weight: 300;
        }
        .hero-actions { display: flex; gap: 16px; flex-wrap: wrap; }
        .btn-primary-custom {
            background: var(--beige-mid);
            color: var(--green-deep);
            border: none;
            padding: 16px 36px;
            font-size: 0.82rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s;
            border-radius: 4px;
            display: inline-block;
        }
        .btn-primary-custom:hover {
            background: var(--beige-cream);
            color: var(--green-deep);
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(0,0,0,0.2);
        }
        .btn-ghost {
            background: transparent;
            color: #2f2318;
            border: 1px solid #2f2318;
            padding: 16px 36px;
            font-size: 0.82rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            text-decoration: none;
            transition: all 0.3s;
            border-radius: 4px;
            display: inline-block;
        }
        .btn-ghost:hover {
            background: rgba(255,255,255,0.1);
            color: var(--beige-cream);
            border-color: var(--green-light);
        }
        .hero-stats {
            display: flex;
            gap: 48px;
            margin-top: 64px;
            padding-top: 48px;
            border-top: 1px solid rgba(168,198,143,0.25);
        }
        .stat-item { text-align: left; }
        .stat-number {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            color: #2f2318;
            line-height: 1;
        }
        .stat-label {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--green-light);
            margin-top: 6px;
        }

        /* ── ABOUT ── */
        .about-section {
            padding: 120px 60px;
            background: var(--beige-white);
        }
        .section-eyebrow {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 4px;
            color: var(--green-sage);
            margin-bottom: 16px;
            display: flex;
            align-items: center;
            gap: 12px;
        }
        .section-eyebrow::before {
            content: '';
            width: 32px;
            height: 1px;
            background: var(--green-sage);
        }
        .section-title-new {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2rem, 4vw, 3.2rem);
            color: var(--text-dark);
            line-height: 1.2;
            margin-bottom: 24px;
            font-weight: 400;
        }
        .section-title-new em { font-style: italic; color: var(--green-mid); }
        .about-text {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.2rem;
            color: #5A6B4A;
            line-height: 1.9;
            margin-bottom: 32px;
            font-weight: 300;
        }
        .about-img-wrap {
            position: relative;
        }
        .about-img-wrap img {
            width: 100%;
            border-radius: 2px;
            display: block;
        }
        .about-img-accent {
            position: absolute;
            top: -20px; right: -20px;
            width: 120px; height: 120px;
            border: 2px solid var(--green-pale);
            border-radius: 2px;
            z-index: -1;
        }
        .about-img-badge {
            position: absolute;
            bottom: 30px; left: -30px;
            background: var(--green-deep);
            color: var(--beige-cream);
            padding: 20px 24px;
            border-radius: 2px;
            text-align: center;
        }
        .badge-number {
            font-family: 'Playfair Display', serif;
            font-size: 2rem;
            display: block;
            line-height: 1;
        }
        .badge-label {
            font-size: 0.65rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--green-light);
            margin-top: 6px;
            display: block;
        }
        .mission-points { list-style: none; margin-top: 24px; }
        .mission-points li {
            display: flex;
            align-items: flex-start;
            gap: 14px;
            padding: 12px 0;
            border-bottom: 1px solid var(--beige-light);
            font-size: 0.95rem;
            color: var(--text-mid);
        }
        .mission-points li:last-child { border-bottom: none; }
        .point-icon {
            width: 24px; height: 24px;
            background: var(--green-pale);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            margin-top: 2px;
            color: var(--green-deep);
            font-size: 0.65rem;
        }

        /* ── SERVICES ── */
        .services-section {
            padding: 120px 60px;
            background: var(--beige-cream);
        }
        .services-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 2px;
            margin-top: 60px;
            background: var(--beige-mid);
        }
        .service-card {
            background: var(--beige-white);
            padding: 48px 36px;
            transition: all 0.4s;
            position: relative;
            overflow: hidden;
        }
        .service-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0;
            width: 4px; height: 0;
            background: var(--green-sage);
            transition: height 0.4s;
        }
        .service-card:hover::before { height: 100%; }
        .service-card:hover { background: var(--green-deep); }
        .service-card:hover .service-name,
        .service-card:hover .service-desc,
        .service-card:hover .service-link { color: var(--beige-cream); }
        .service-card:hover .service-icon { background: rgba(255,255,255,0.1); color: var(--green-light); }
        .service-icon {
            width: 56px; height: 56px;
            background: var(--green-pale);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--green-deep);
            font-size: 1.2rem;
            margin-bottom: 24px;
            transition: all 0.4s;
        }
        .service-name {
            font-family: 'Playfair Display', serif;
            font-size: 1.3rem;
            color: var(--text-dark);
            margin-bottom: 14px;
            transition: color 0.4s;
        }
        .service-desc {
            font-size: 0.88rem;
            color: #6B7D5A;
            line-height: 1.7;
            margin-bottom: 24px;
            transition: color 0.4s;
        }
        .service-link {
            font-size: 0.72rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            color: var(--green-mid);
            text-decoration: none;
            transition: color 0.4s;
        }

        /* ── FEATURES / STATS ── */
        .features-section {
            padding: 120px 60px;
            background: var(--beige-white);
        }
        .stats-mosaic {
            display: grid;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: 1fr 1fr;
            gap: 3px;
            border-radius: 4px;
            overflow: hidden;
        }
        .stat-tile {
            padding: 48px 36px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .stat-tile:nth-child(1) { background: var(--green-deep); }
        .stat-tile:nth-child(2) { background: var(--green-mid); }
        .stat-tile:nth-child(3) { background: var(--green-sage); }
        .stat-tile:nth-child(4) { background: var(--green-light); }
        .tile-number {
            font-family: 'Playfair Display', serif;
            font-size: 3rem;
            color: var(--beige-cream);
            line-height: 1;
        }
        .tile-unit {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            color: rgba(237,227,208,0.7);
        }
        .tile-label {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: rgba(237,227,208,0.8);
            margin-top: 10px;
        }
        .tile-icon {
            font-size: 1.5rem;
            color: rgba(237,227,208,0.5);
            margin-bottom: 12px;
        }
        .features-list { margin-top: 40px; }
        .feature-item {
            display: flex;
            align-items: flex-start;
            gap: 20px;
            padding: 20px 0;
            border-bottom: 1px solid var(--beige-light);
        }
        .feature-item:last-child { border-bottom: none; }
        .feature-num {
            font-family: 'Playfair Display', serif;
            font-size: 1.5rem;
            color: var(--green-pale);
            font-style: italic;
            flex-shrink: 0;
            width: 36px;
        }
        .feature-content h4 {
            font-family: 'Playfair Display', serif;
            font-size: 1.05rem;
            color: var(--text-dark);
            margin-bottom: 6px;
            font-weight: 600;
        }
        .feature-content p {
            font-size: 0.87rem;
            color: #6B7D5A;
            line-height: 1.6;
        }

        /* ── DONATIONS ── */
        .donations-section {
            padding: 120px 60px;
            background: var(--beige-cream);
        }
        .donation-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-top: 60px;
        }
        .donation-card {
            background: var(--beige-white);
            border: 1px solid var(--beige-light);
            padding: 32px;
            transition: all 0.4s;
            position: relative;
        }
        .donation-card:hover {
            border-color: var(--green-sage);
            box-shadow: 0 20px 60px var(--shadow-green);
            transform: translateY(-4px);
        }
        .donation-category {
            display: inline-block;
            background: var(--green-pale);
            color: var(--green-deep);
            font-size: 0.65rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 5px 14px;
            border-radius: 100px;
            margin-bottom: 20px;
        }
        .donation-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 2px;
            margin-bottom: 20px;
        }
        .donation-title {
            font-family: 'Playfair Display', serif;
            font-size: 1.3rem;
            color: var(--text-dark);
            margin-bottom: 12px;
            font-weight: 600;
        }
        .donation-desc {
            font-size: 0.87rem;
            color: #6B7D5A;
            line-height: 1.7;
            margin-bottom: 24px;
        }
        .progress-wrap { margin-bottom: 24px; }
        .progress-labels {
            display: flex;
            justify-content: space-between;
            font-size: 0.78rem;
            color: var(--text-mid);
            margin-bottom: 8px;
        }
        .progress-bar-wrap {
            height: 6px;
            background: var(--beige-mid);
            border-radius: 100px;
            overflow: hidden;
        }
        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, var(--green-mid), var(--green-sage));
            border-radius: 100px;
            transition: width 1.5s ease;
        }
        .progress-percent {
            font-family: 'Playfair Display', serif;
            font-size: 0.9rem;
            color: var(--green-mid);
            font-style: italic;
            margin-top: 4px;
        }
        .donate-btn {
            display: block;
            text-align: center;
            background: var(--green-deep);
            color: var(--beige-cream);
            padding: 14px;
            text-decoration: none;
            font-size: 0.75rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            border-radius: 2px;
            transition: all 0.3s;
            font-weight: 500;
        }
        .donate-btn:hover {
            background: var(--green-mid);
            color: var(--beige-cream);
        }

        /* ── BANNER CTA ── */
        .cta-banner {
            background: var(--green-deep);
            padding: 100px 60px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }
        .cta-banner::before {
            content: '';
            position: absolute;
            top: 0; left: 0;
            width: 200px; height: 200px;
            border-bottom-right-radius: 100%;
            background: rgba(122,160,91,0.15);
        }
        .cta-banner::after {
            content: '';
            position: absolute;
            bottom: 0; right: 0;
            width: 300px; height: 300px;
            border-top-left-radius: 100%;
            background: rgba(196,168,130,0.08);
        }
        .cta-content { position: relative; z-index: 1; max-width: 700px; margin: 0 auto; }
        .cta-banner h2 {
            font-family: 'Playfair Display', serif;
            font-size: clamp(2rem, 4vw, 3rem);
            color: var(--beige-cream);
            margin-bottom: 20px;
            font-weight: 400;
        }
        .cta-banner h2 em { font-style: italic; color: var(--green-light); }
        .cta-banner p {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.2rem;
            color: rgba(237,227,208,0.75);
            margin-bottom: 48px;
            line-height: 1.8;
            font-weight: 300;
        }

        /* ── EVENTS ── */
        .events-section {
            padding: 120px 60px;
            background: var(--beige-white);
        }
        .events-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-top: 60px;
        }
        .event-card {
            border: 1px solid var(--beige-light);
            overflow: hidden;
            transition: all 0.4s;
        }
        .event-card:hover { border-color: var(--green-sage); }
        .event-card img {
            width: 100%; height: 200px;
            object-fit: cover;
            display: block;
        }
        .event-body { padding: 28px; }
        .event-meta {
            display: flex;
            flex-direction: column;
            gap: 6px;
            margin-bottom: 16px;
        }
        .event-meta span {
            font-size: 0.78rem;
            color: #3816b3;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .event-meta i { color: var(--green-sage); width: 14px; }
        .event-name {
            font-family: 'Playfair Display', serif;
            font-size: 1.15rem;
            color: var(--text-dark);
            text-decoration: none;
            display: block;
            margin-bottom: 12px;
            font-weight: 600;
        }
        .event-name:hover { color: var(--green-mid); }
        .event-desc { font-size: 0.87rem; color: #6B7D5A; line-height: 1.7; }

        /* ── DONATE FORM ── */
        .donate-section {
            padding: 120px 60px;
            background: var(--beige-cream);
        }
        .donate-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 0;
            border: 1px solid var(--beige-mid);
        }
        .donate-text-side {
            padding: 64px;
            background: var(--green-deep);
            position: relative;
            overflow: hidden;
        }
        .donate-text-side::before {
            content: '\"';
            font-family: 'Playfair Display', serif;
            font-size: 20rem;
            color: rgba(255,255,255,0.03);
            position: absolute;
            top: -60px; left: 20px;
            line-height: 1;
        }
        .donate-text-side h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.2rem;
            color: var(--beige-cream);
            font-weight: 400;
            line-height: 1.3;
            margin-bottom: 24px;
            position: relative;
        }
        .donate-text-side h2 em { font-style: italic; color: var(--green-light); }
        .donate-text-side p {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.15rem;
            color: rgba(237,227,208,0.75);
            line-height: 1.8;
            font-weight: 300;
            position: relative;
        }
        .donate-form-side {
            padding: 64px;
            background: var(--beige-white);
        }
        .form-group { margin-bottom: 20px; }
        .form-label-custom {
            display: block;
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--green-mid);
            margin-bottom: 8px;
        }
        .form-input-custom {
            width: 100%;
            border: 1px solid var(--beige-mid);
            background: var(--beige-cream);
            padding: 14px 18px;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.9rem;
            color: var(--text-dark);
            outline: none;
            transition: border-color 0.3s;
            border-radius: 2px;
        }
        .form-input-custom:focus { border-color: var(--green-sage); background: white; }
        .amount-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 8px;
            margin-bottom: 24px;
        }
        .amount-btn {
            border: 1px solid var(--beige-mid);
            background: var(--beige-cream);
            color: var(--text-mid);
            padding: 12px 8px;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.2s;
            font-family: 'DM Sans', sans-serif;
            border-radius: 2px;
        }
        .amount-btn:hover, .amount-btn.active {
            background: var(--green-deep);
            color: var(--beige-cream);
            border-color: var(--green-deep);
        }
        .submit-btn {
            width: 100%;
            background: var(--green-mid);
            color: var(--beige-cream);
            border: none;
            padding: 18px;
            font-size: 0.8rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            cursor: pointer;
            transition: all 0.3s;
            font-family: 'DM Sans', sans-serif;
            font-weight: 600;
            border-radius: 2px;
        }
        .submit-btn:hover { background: var(--green-deep); }

        /* ── TEAM ── */
        .team-section {
            padding: 120px 60px;
            background: var(--beige-white);
        }
        .team-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-top: 60px;
        }
        .team-card {
            position: relative;
            overflow: hidden;
            border: 1px solid var(--beige-light);
        }
        .team-card img {
            width: 100%; height: 280px;
            object-fit: cover;
            display: block;
            filter: grayscale(30%);
            transition: all 0.4s;
        }
        .team-card:hover img { filter: grayscale(0%); }
        .team-info {
            padding: 24px 28px;
            background: var(--beige-white);
            display: flex;
            justify-content: space-between;
            align-items: flex-end;
        }
        .team-name {
            font-family: 'Playfair Display', serif;
            font-size: 1.15rem;
            color: var(--text-dark);
            font-weight: 600;
        }
        .team-role {
            font-size: 0.72rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: var(--green-sage);
            margin-top: 4px;
        }
        .team-socials {
            display: flex;
            gap: 8px;
        }
        .team-social-btn {
            width: 32px; height: 32px;
            background: var(--beige-light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--green-mid);
            font-size: 0.7rem;
            text-decoration: none;
            transition: all 0.3s;
        }
        .team-social-btn:hover {
            background: var(--green-deep);
            color: var(--beige-cream);
        }

        /* ── TESTIMONIALS ── */
        .testimonials-section {
            padding: 120px 60px;
            background: var(--beige-cream);
        }
        .testimonial-cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 24px;
            margin-top: 60px;
        }
        .testimonial-card {
            background: var(--beige-white);
            padding: 40px;
            border-left: 3px solid var(--green-sage);
            position: relative;
        }
        .quote-mark {
            font-family: 'Playfair Display', serif;
            font-size: 4rem;
            color: var(--green-pale);
            line-height: 0.5;
            margin-bottom: 20px;
            display: block;
        }
        .testimonial-text {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.1rem;
            color: var(--text-mid);
            line-height: 1.8;
            margin-bottom: 28px;
            font-style: italic;
            font-weight: 300;
        }
        .stars { color: var(--green-sage); font-size: 0.7rem; margin-bottom: 16px; }
        .testimonial-author { display: flex; align-items: center; gap: 14px; }
        .author-avatar {
            width: 44px; height: 44px;
            border-radius: 50%;
            object-fit: cover;
        }
        .author-name {
            font-family: 'Playfair Display', serif;
            font-size: 1rem;
            color: var(--text-dark);
            font-weight: 600;
        }
        .author-title { font-size: 0.72rem; color: var(--green-sage); text-transform: uppercase; letter-spacing: 1px; }

        /* ── NEWSLETTER ── */
        .newsletter-section {
            padding: 100px 60px;
            background: var(--green-sage);
            text-align: center;
        }
        .newsletter-section h2 {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            color: var(--beige-cream);
            margin-bottom: 16px;
            font-weight: 400;
        }
        .newsletter-section p {
            color: rgba(237,227,208,0.8);
            margin-bottom: 40px;
            font-size: 1rem;
        }
        .newsletter-form {
            display: flex;
            max-width: 480px;
            margin: 0 auto;
            gap: 0;
        }
        .newsletter-input {
            flex: 1;
            border: none;
            padding: 16px 24px;
            font-family: 'DM Sans', sans-serif;
            font-size: 0.9rem;
            background: rgba(255,255,255,0.95);
            color: var(--text-dark);
            outline: none;
            border-radius: 2px 0 0 2px;
        }
        .newsletter-btn {
            background: var(--green-deep);
            color: var(--beige-cream);
            border: none;
            padding: 16px 28px;
            font-size: 0.75rem;
            letter-spacing: 2px;
            text-transform: uppercase;
            cursor: pointer;
            font-family: 'DM Sans', sans-serif;
            font-weight: 600;
            transition: background 0.3s;
            border-radius: 0 2px 2px 0;
        }
        .newsletter-btn:hover { background: var(--text-dark); }

        /* ── FOOTER ── */
        .footer {
            background: var(--text-dark);
            padding: 80px 60px 0;
            color: rgba(237,227,208,0.6);
        }
        .footer-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr 1fr 1.5fr;
            gap: 60px;
            padding-bottom: 60px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }
        .footer-brand p {
            margin-top: 20px;
            font-size: 0.87rem;
            line-height: 1.8;
        }
        .footer-socials {
            display: flex;
            gap: 10px;
            margin-top: 24px;
        }
        .footer-social {
            width: 36px; height: 36px;
            background: rgba(168,198,143,0.1);
            border: 1px solid rgba(168,198,143,0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--green-light);
            font-size: 0.75rem;
            text-decoration: none;
            border-radius: 4px;
            transition: all 0.3s;
        }
        .footer-social:hover {
            background: var(--green-mid);
            border-color: var(--green-mid);
            color: white;
        }
        .footer-heading {
            font-family: 'Playfair Display', serif;
            font-size: 1rem;
            color: var(--beige-light);
            margin-bottom: 24px;
            font-weight: 600;
        }
        .footer-links { list-style: none; }
        .footer-links li { margin-bottom: 10px; }
        .footer-links a {
            font-size: 0.87rem;
            color: rgba(237,227,208,0.6);
            text-decoration: none;
            transition: color 0.3s;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        .footer-links a::before {
            content: '';
            width: 16px; height: 1px;
            background: var(--green-sage);
            flex-shrink: 0;
        }
        .footer-links a:hover { color: var(--green-light); }
        .footer-contact p {
            font-size: 0.87rem;
            margin-bottom: 10px;
            display: flex;
            align-items: flex-start;
            gap: 10px;
        }
        .footer-contact i { color: var(--green-sage); margin-top: 3px; flex-shrink: 0; }
        .footer-hours .hour-row {
            display: flex;
            justify-content: space-between;
            padding: 8px 0;
            border-bottom: 1px solid rgba(255,255,255,0.05);
            font-size: 0.82rem;
        }
        .hour-day { color: rgba(237,227,208,0.6); }
        .hour-time { color: var(--green-light); }
        .footer-bottom {
            padding: 24px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.8rem;
            color: rgba(237,227,208,0.4);
        }
        .footer-bottom a { color: var(--green-light); text-decoration: none; }

        /* ── UTILS ── */
        .container-custom { max-width: 1200px; margin: 0 auto; width: 100%; }
        .row-flex { display: flex; gap: 60px; align-items: center; }
        .col-half { flex: 1; }

        /* ── VIDEO BANNER ── */
        .video-banner {
            background: var(--green-mid);
            padding: 40px 60px;
        }
        .video-inner {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            gap: 40px;
        }
        .play-btn {
            width: 64px; height: 64px;
            background: var(--beige-cream);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            cursor: pointer;
            border: none;
            transition: all 0.3s;
            position: relative;
        }
        .play-btn::before {
            content: '';
            position: absolute;
            inset: -6px;
            border-radius: 50%;
            border: 1px solid rgba(255,255,255,0.3);
            animation: pulse-ring 2s ease infinite;
        }
        @keyframes pulse-ring {
            0% { transform: scale(1); opacity: 1; }
            100% { transform: scale(1.4); opacity: 0; }
        }
        .play-btn i { color: var(--green-deep); font-size: 1rem; margin-left: 4px; }
        .play-btn:hover { background: var(--green-deep); }
        .play-btn:hover i { color: var(--beige-cream); }
        .video-quote {
            font-family: 'Cormorant Garamond', serif;
            font-size: 1.3rem;
            color: var(--beige-cream);
            font-style: italic;
            font-weight: 300;
        }

        @media (max-width: 1024px) {
            .topbar { padding: 0 24px; }
            .navbar-wrap { padding: 0 24px; }
            .hero-section, .about-section, .services-section, .features-section,
            .donations-section, .cta-banner, .events-section, .donate-section,
            .team-section, .testimonials-section, .newsletter-section { padding-left: 24px; padding-right: 24px; }
            .footer { padding: 60px 24px 0; }
            .topbar-contacts { display: none; }
            .services-grid { grid-template-columns: 1fr 1fr; }
            .donation-cards, .events-grid, .team-grid, .testimonial-cards { grid-template-columns: 1fr; }
            .footer-grid { grid-template-columns: 1fr 1fr; }
            .row-flex { flex-direction: column; }
            .donate-grid { grid-template-columns: 1fr; }
            .stats-mosaic { width: 100%; }
            .hero-stats { gap: 24px; }
        }
        .logo-img {
    width: 50px;
    height: 50px;
    object-fit: contain;
}
element.style {
    display: flex;
    align-items: center;
    gap: 10px;
    cursor: pointer;
    padding: 8px 12px;
    border-radius: 8px;
    transition: background 0.2s;
    background: transparent;
}
    </style>

    {% block stylesheets %}{% endblock %}
</head>

<body>

    <!-- Spinner -->
    <div id=\"spinner\" class=\"show position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center\">
        <div class=\"spinner-leaf\"></div>
    </div>

    <!-- Topbar -->
    <div class=\"topbar\">
        <a href=\"{{ path('app_home') }}\" class=\"topbar-logo\">
    <img src=\"{{ asset('img/logo.png') }}\" alt=\"Nafseyti Logo\" class=\"logo-img\">
    <span class=\"logo-text\">N<span>afseyti</span></span>
</a>
        <div class=\"topbar-contacts d-none d-lg-flex\">
            <div class=\"contact-item\">
                <div class=\"contact-icon\"><i class=\"fas fa-phone\"></i></div>
                <div>
                    <span class=\"contact-label\">Appelez-nous</span>
                    <span class=\"contact-value\">+216 70 000 000</span>
                </div>
            </div>
            <div class=\"contact-item\">
                <div class=\"contact-icon\"><i class=\"fas fa-envelope\"></i></div>
                <div>
                    <span class=\"contact-label\">Écrivez-nous</span>
                    <span class=\"contact-value\">contact@nafseyti.tn</span>
                </div>
            </div>
            <div class=\"contact-item\">
                <div class=\"contact-icon\"><i class=\"fas fa-map-marker-alt\"></i></div>
                <div>
                    <span class=\"contact-label\">Adresse</span>
                    <span class=\"contact-value\">Tunis, Tunisie</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Navbar -->
    {% block navbar %}
    <div class=\"navbar-wrap\">
        <div class=\"navbar-inner\">
            <ul class=\"nav-links\">
                <li>
                    <a href=\"{{ path('app_home') }}\"
                    {{ app.request.attributes.get('_route') == 'app_home' ? 'class=\"active\"' }}>
                        Accueil
                    </a>
                </li>

                <li><a href=\"#\">Contenu Psychologique</a></li>

               <li>
                <a href=\"{% if app.user and app.user.role == 'etudiant' %}
                            {{ path('front_test_list') }}
                        {% else %}
                            javascript:void(0)
                        {% endif %}\"
                class=\"{% if app.request.attributes.get('_route') == 'front_test_list' %}active{% endif %}\">
                    Tests
                </a>
            </li>

                <li>
                    <a href=\"
                        {% if app.user %}
                            {% if app.user.role == 'etudiant' %}
                                {{ path('rdv_index') }}
                            {% elseif app.user.role == 'psychologue' or app.user.role == 'coach_vie' %}
                                {{ path('psy_dashboard') }}
                            {% else %}
                                javascript:void(0)
                            {% endif %}
                        {% else %}
                            javascript:void(0)
                        {% endif %}
                    \"
                    class=\"{% if app.request.attributes.get('_route') in ['rdv_index', 'psy_dashboard'] %}active{% endif %}\">
                        Rendez-vous
                    </a>
                </li>

                <li><a href=\"{{ path('client_events_index') }}\" class=\"{{ app.request.attributes.get('_route') == 'client_events_index' ? 'active' }}\">Evenements</a></li>
                <li><a href=\"#\">Suivi Personnel</a></li>
            </ul>
            
            {% if app.user %}
    <div style=\"position:relative; display:flex; align-items:center;\" id=\"profileDropdownWrap\">
        <div onclick=\"toggleProfileDropdown()\" 
             style=\"display:flex; align-items:center; gap:10px; cursor:pointer; padding:8px 12px; border-radius:8px; transition:background 0.2s;\"
             onmouseover=\"this.style.background='rgba(0,0,0,0.05)'\" 
             onmouseout=\"this.style.background='transparent'\">
            
            {% if app.user.profile_photo %}
              <img src=\"{{ asset(app.user.profile_photo) }}\"
     alt=\"Photo de profil\"
     style=\"width:38px; height:38px; border-radius:50%; object-fit:cover; border:2px solid #4a7c3f;\">
            {% else %}
                <div style=\"width:38px; height:38px; border-radius:50%; background:#4a7c3f; display:flex; align-items:center; justify-content:center; border:2px solid #4a7c3f;\">
                    <i class=\"fas fa-user\" style=\"color:white; font-size:1rem;\"></i>
                </div>
            {% endif %}

            <div style=\"line-height:1.2;\">
                <div style=\"font-size:0.85rem; font-weight:600; color:#2d3a1e;\">
                    {{ app.user.firstname }} {{ app.user.lastname }}
                </div>
                <div style=\"font-size:0.7rem; color:#6B7D5A; text-transform:uppercase; letter-spacing:1px;\">
                    {{ app.user.role }}
                </div>
            </div>
            <i class=\"fas fa-chevron-down\" style=\"font-size:0.7rem; color:#6B7D5A;\"></i>
        </div>
        </div> 

        <!-- Dropdown -->
        <div id=\"profileDropdown\"
             style=\"display:none; position:absolute; top:calc(100% + 8px); right:0; background:white; border-radius:12px; box-shadow:0 10px 40px rgba(45,80,22,0.15); min-width:200px; overflow:hidden; z-index:9999; border:1px solid #e8e0d0;\">
            
            <div style=\"padding:16px 20px; border-bottom:1px solid #f0ebe0; background:#fafaf7;\">
                <div style=\"font-size:0.75rem; color:#6B7D5A; text-transform:uppercase; letter-spacing:1px;\">Connecté en tant que</div>
                <div style=\"font-size:0.9rem; font-weight:600; color:#2d3a1e; margin-top:2px;\">{{ app.user.firstname }} {{ app.user.lastname }}</div>
            </div>

            <a href=\"{{ path('app_profile') }}\" 
               style=\"display:flex; align-items:center; gap:12px; padding:14px 20px; text-decoration:none; color:#2d3a1e; font-size:0.9rem; transition:background 0.2s;\"
               onmouseover=\"this.style.background='#f5f0e8'\" onmouseout=\"this.style.background='transparent'\">
                <i class=\"fas fa-user-circle\" style=\"color:#4a7c3f; width:16px;\"></i>
                Mon Profil
            </a>

            <a href=\"{{ path('app_logout') }}\" 
               style=\"display:flex; align-items:center; gap:12px; padding:14px 20px; text-decoration:none; color:#991b1b; font-size:0.9rem; transition:background 0.2s; border-top:1px solid #f0ebe0;\"
               onmouseover=\"this.style.background='#fee2e2'\" onmouseout=\"this.style.background='transparent'\">
                <i class=\"fas fa-sign-out-alt\" style=\"color:#991b1b; width:16px;\"></i>
                Se déconnecter
            </a>
        </div>
    </div>
{% else %}
    <a href=\"{{ path('app_login') }}\" class=\"nav-cta nav-links a\">Se connecter</a>
{% endif %}
        
            </div>
        </div>
    {% endblock %}

     

    <!-- BODY -->
    {% block body %}{% endblock %}

    <!-- Footer -->
<div class=\"footer\">
    <div class=\"footer-grid\">

        <!-- Logo + description -->
        <div class=\"footer-brand\">
            <div style=\"display:flex;align-items:center;gap:10px;\">
                <div style=\"width:32px;height:32px;background:var(--green-sage);border-radius:50% 50% 50% 0;transform:rotate(-45deg);display:flex;align-items:center;justify-content:center;flex-shrink:0;\">
                    <div style=\"width:12px;height:12px;background:var(--text-dark);border-radius:50%;transform:rotate(45deg);\"></div>
                </div>
                <span style=\"font-family:'Playfair Display',serif;font-size:1.4rem;color:var(--beige-light);\">
                    NAFSEY<span style=\"color:var(--green-light);\">TI</span>
                </span>
            </div>

            <p>
                Une plateforme dédiée au bien-être psychologique des étudiants,
                enseignants et universités tunisiennes.
            </p>

            <div class=\"footer-socials\">
                <a href=\"#!\" class=\"footer-social\"><i class=\"fab fa-facebook-f\"></i></a>
                <a href=\"#!\" class=\"footer-social\"><i class=\"fab fa-instagram\"></i></a>
                <a href=\"#!\" class=\"footer-social\"><i class=\"fab fa-linkedin-in\"></i></a>
            </div>
        </div>

        <!-- Liens -->
        <div>
            <h4 class=\"footer-heading\">Liens Rapides</h4>
            <ul class=\"footer-links\">
                <li><a href=\"#!\">Accueil</a></li>
                <li><a href=\"#!\">Contenu Psychologique</a></li>
                <li><a href=\"#!\">Tests Psychologiques</a></li>
                <li><a href=\"#!\">Rendez-vous</a></li>
                <li><a href=\"#\">Evenements</a></li>
                <li><a href=\"#\">Suivi Personnel</a></li>
            </ul>
        </div>

        <!-- Disponibilité -->
        <div class=\"footer-hours\">
            <h4 class=\"footer-heading\">Disponibilité</h4>
            <div class=\"hour-row\">
                <span class=\"hour-day\">Lundi – Vendredi</span>
                <span class=\"hour-time\">08h – 18h</span>
            </div>
            <div class=\"hour-row\">
                <span class=\"hour-day\">Samedi</span>
                <span class=\"hour-time\">09h – 13h</span>
            </div>
            <div class=\"hour-row\">
                <span class=\"hour-day\">Support en ligne</span>
                <span class=\"hour-time\">24/7</span>
            </div>
        </div>

        <!-- Contact -->
        <div class=\"footer-contact\">
            <h4 class=\"footer-heading\">Contact</h4>
            <p><i class=\"fas fa-map-marker-alt\"></i> Tunis, Tunisie</p>
            <p><i class=\"fas fa-phone\"></i> +216 70 000 000</p>
            <p><i class=\"fas fa-envelope\"></i> contact@nafseyti.tn</p>
        </div>
    </div>

    <!-- Bottom -->
    <div class=\"footer-bottom\">
        <span>&copy; {{ \"now\"|date(\"Y\") }} NAFSEYTI — Tous droits réservés</span>
        <span>Conçu pour le bien-être universitaire ♥</span>
    </div>
</div>

    <!-- JS -->
    <script src=\"https://code.jquery.com/jquery-3.4.1.min.js\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js\"></script>
    <script src=\"{{ asset('lib/wow/wow.min.js') }}\"></script>
    <script src=\"{{ asset('lib/easing/easing.min.js') }}\"></script>
    <script src=\"{{ asset('lib/waypoints/waypoints.min.js') }}\"></script>
    <script src=\"{{ asset('lib/owlcarousel/owl.carousel.min.js') }}\"></script>
    <script src=\"{{ asset('lib/counterup/counterup.min.js') }}\"></script>
    <script src=\"{{ asset('js/main.js') }}\"></script>

    <script>
        // Spinner
        window.addEventListener('load', function() {
            document.getElementById('spinner').classList.remove('show');
        });

        // Amount buttons
        document.querySelectorAll('.amount-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                document.querySelectorAll('.amount-btn').forEach(b => b.classList.remove('active'));
                btn.classList.add('active');
            });
        });

        // Animate progress bars on scroll
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    const fill = e.target;
                    const target = fill.getAttribute('data-width');
                    fill.style.width = target + '%';
                }
            });
        }, { threshold: 0.3 });
        document.querySelectorAll('.progress-fill').forEach(el => observer.observe(el));
    </script>
      <script>
function toggleProfileDropdown() {
    const dropdown = document.getElementById('profileDropdown');
    dropdown.style.display = dropdown.style.display === 'none' ? 'block' : 'none';
}

document.addEventListener('click', function(e) {
    const wrap = document.getElementById('profileDropdownWrap');
    if (wrap && !wrap.contains(e.target)) {
        document.getElementById('profileDropdown').style.display = 'none';
    }
});
</script>

    {% block javascripts %}{% endblock %}
</body>
</html>
", "base.html.twig", "C:\\Users\\DELL\\Downloads\\psy\\templates\\base.html.twig");
    }
}
