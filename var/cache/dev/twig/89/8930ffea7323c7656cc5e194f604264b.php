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

/* home/events/index.html.twig */
class __TwigTemplate_d08cd446aa31644174c6524d59bbae2b extends Template
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

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/events/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/events/index.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
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

        yield "Événements & Ateliers - NAFSEYTI";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
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

        // line 6
        yield "<style>
    :root {
        --sidebar-bg: #ece6df;
        --green-main: #285921;
        --green-dark: #2e6a28;
        --green-light: #7ec8a3;
        --beige: #c9b99b;
        --sidebar-text: #69685c;
        --page-bg: linear-gradient(to bottom right, #f5f1ed 0%, #e8efe8 50%, #f0ede5 100%);
        --card-bg: #ffffff;
        --radius: 24px;
    }

    * { box-sizing: border-box; }
    body { background: #f5f1ed; font-family: 'DM Sans', sans-serif; }

    /* Hide Google Translate banner but keep functionality */
    .goog-te-banner-frame.skiptranslate {
        display: none !important;
    }
    body {
        top: 0px !important;
    }
    .goog-te-gadget {
        display: none !important;
    }
    .goog-te-gadget-simple {
        display: none !important;
    }
    /* IMPORTANT: Don't hide the translate element - just make it invisible but functional */
    #google_translate_element {
        position: fixed;
        bottom: 0;
        right: 0;
        width: 1px;
        height: 1px;
        opacity: 0;
        pointer-events: none;
        z-index: -1;
    }

    .layout { display: flex; min-height: 100vh; }

    /* ── MAIN ── */
    .main { flex:1; overflow-y:auto; padding:30px; background:var(--page-bg); }

    /* Header */
    .page-header { display:flex; align-items:center; gap:15px; margin-bottom:25px; }
    .header-icon {
        width:40px; height:40px; border-radius:50%;
        background:var(--green-main); display:flex; align-items:center; justify-content:center;
        font-size:22px; color:white;
        box-shadow:0 4px 12px rgba(40,89,33,.3);
    }
    .header-title { font-size:30px; font-weight:bold; color:var(--green-main); margin:0; }
    .header-sub { font-size:14px; color:#5a6c5a; font-style:italic; margin:4px 0 0; }

    /* Search/sort bar */
    .search-bar {
        display:flex; align-items:center; gap:15px; flex-wrap:wrap;
        background:rgba(255,255,255,.95);
        border:1.5px solid rgba(40,89,33,.25);
        border-radius:20px; padding:15px 20px; margin-bottom:30px;
        box-shadow:0 4px 12px rgba(40,89,33,.12);
    }
    .search-input {
        flex:1; min-width:250px; padding:12px 16px;
        border:2px solid rgba(40,89,33,.3); border-radius:15px;
        font-size:14px; background:white; outline:none;
        transition:border-color .2s;
    }
    .search-input:focus { border-color:var(--green-main); }

    .btn-sort, .btn-fav {
        padding:12px 20px; border:none; border-radius:15px;
        font-size:14px; font-weight:bold; cursor:pointer; transition:all .2s;
    }
    .btn-sort { background:var(--green-light); color:#000; }
    .btn-sort:hover { background:#5fb88b; transform:translateY(-2px); }
    .btn-fav { background:var(--beige); color:#000; }
    .btn-fav:hover { background:#b8a888; transform:translateY(-2px); }
    .btn-fav.active { background:var(--green-light); }

    /* Translation Button */
    .btn-translate {
        padding:12px 20px;
        border:none;
        border-radius:15px;
        font-size:14px;
        font-weight:bold;
        cursor:pointer;
        transition:all .2s;
        background: #6c5ce7;
        color: white;
    }
    .btn-translate:hover {
        background: #5b4bc4;
        transform: translateY(-2px);
    }

    .btn-calendar {
        padding: 12px 20px;
        border: none;
        border-radius: 15px;
        font-size: 14px;
        font-weight: bold;
        cursor: pointer;
        transition: all .2s;
        background: var(--green-main);
        color: white;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    .btn-calendar:hover {
        background: var(--green-dark);
        transform: translateY(-2px);
        color: white;
    }

    .event-count {
        margin-left:auto; padding:10px 18px;
        background:rgba(40,89,33,.1); border:1.5px solid rgba(40,89,33,.3);
        border-radius:25px; font-size:13px; font-weight:bold; color:var(--green-main);
    }

    /* Sort dropdown */
    .sort-wrap { position:relative; }
    .sort-menu {
        display:none; position:absolute; top:110%; left:0; z-index:100;
        background:white; border:1px solid rgba(40,89,33,.2);
        border-radius:12px; box-shadow:0 8px 20px rgba(0,0,0,.12);
        min-width:200px; overflow:hidden;
    }
    .sort-menu.open { display:block; }
    .sort-menu a {
        display:block; padding:12px 18px; font-size:13px;
        color:#333; text-decoration:none; transition:background .15s;
    }
    .sort-menu a:hover { background:#f0f5f0; color:var(--green-main); }

    /* Translation Modal Styles */
    .translation-modal-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.85);
        z-index: 10001;
        justify-content: center;
        align-items: center;
    }
    .translation-modal-content {
        background: linear-gradient(145deg, #2a3a2a, #1e2e1e);
        border-radius: 32px;
        max-width: 500px;
        width: 90%;
        max-height: 80vh;
        overflow-y: auto;
        animation: slideUp 0.3s ease-out;
        box-shadow: 0 25px 50px -12px rgba(0,0,0,0.5);
        border: 2px solid rgba(76, 175, 80, 0.4);
    }
    .translation-modal-header {
        background: linear-gradient(135deg, #1a5c1a, #0d3d0d);
        color: white;
        padding: 20px 24px;
        border-radius: 32px 32px 0 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid rgba(76, 175, 80, 0.3);
        position: sticky;
        top: 0;
    }
    .translation-modal-header h3 {
        margin: 0;
        font-size: 1.3rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .translation-close {
        background: rgba(255,255,255,0.15);
        border: none;
        color: white;
        font-size: 24px;
        cursor: pointer;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s;
    }
    .translation-close:hover {
        background: rgba(255,255,255,0.3);
        transform: scale(1.05);
    }
    .translation-options {
        padding: 20px;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .translation-option {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 12px 20px;
        background: rgba(255,255,255,0.1);
        border-radius: 20px;
        cursor: pointer;
        transition: all 0.2s;
        border: 1px solid rgba(255,255,255,0.1);
    }
    .translation-option:hover {
        background: rgba(76, 175, 80, 0.3);
        transform: translateX(5px);
        border-color: rgba(76, 175, 80, 0.5);
    }
    .translation-option.active {
        background: rgba(76, 175, 80, 0.4);
        border-color: #4CAF50;
    }
    .translation-option-icon {
        font-size: 32px;
    }
    .translation-option-info {
        flex: 1;
    }
    .translation-option-title {
        font-size: 16px;
        font-weight: bold;
        color: white;
        margin-bottom: 4px;
    }
    .translation-option-desc {
        font-size: 11px;
        color: #a0c0a0;
    }
    .translation-reset {
        margin: 10px 20px 20px;
        padding: 12px;
        background: rgba(255,255,255,0.15);
        border: none;
        border-radius: 30px;
        color: white;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.2s;
        text-align: center;
    }
    .translation-reset:hover {
        background: rgba(76, 175, 80, 0.4);
    }

    @keyframes slideUp {
        from { transform: translateY(50px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    /* ========== COLOR BLINDNESS FILTERS ========== */
    body.normal-vision { filter: none; }
    body.protanopia { filter: url('#protanopia'); }
    body.deuteranopia { filter: url('#deuteranopia'); }
    body.tritanopia { filter: url('#tritanopia'); }
    body.achromatopsia { filter: grayscale(100%); }
    body.high-contrast { filter: contrast(150%) brightness(110%); }
    body.high-contrast .event-card {
        background: #000 !important;
        color: #fff !important;
        border: 2px solid #fff !important;
    }
    body.high-contrast .event-title,
    body.high-contrast .text,
    body.high-contrast .detail-row .text,
    body.high-contrast .plan-desc {
        color: #fff !important;
    }
    body.high-contrast .btn-participate {
        background: #fff !important;
        color: #000 !important;
    }

    /* ========== EVENT STATUS BADGE STYLES ========== */
    .event-status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
        margin-bottom: 8px;
    }
    .status-upcoming {
        background: rgba(74, 144, 226, 0.15);
        color: #4A90E2;
        border: 1px solid rgba(74, 144, 226, 0.3);
    }
    .status-ongoing {
        background: rgba(76, 175, 80, 0.15);
        color: #4CAF50;
        border: 1px solid rgba(76, 175, 80, 0.3);
        animation: pulse-status 2s infinite;
    }
    .status-completed {
        background: rgba(158, 158, 158, 0.15);
        color: #9E9E9E;
        border: 1px solid rgba(158, 158, 158, 0.3);
    }
    .status-cancelled {
        background: rgba(244, 67, 54, 0.15);
        color: #f44336;
        border: 1px solid rgba(244, 67, 54, 0.3);
    }
    @keyframes pulse-status {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.7; }
    }

    /* ========== AI RECOMMENDATION BADGE ========== */
    .badge-recommended {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        font-size: 9px;
        padding: 3px 10px;
        border-radius: 20px;
        font-weight: 600;
        letter-spacing: 0.3px;
        display: inline-flex;
        align-items: center;
        gap: 4px;
        box-shadow: 0 2px 8px rgba(102, 126, 234, 0.3);
        animation: glow 2s ease-in-out infinite;
    }
    @keyframes glow {
        0%, 100% { box-shadow: 0 2px 8px rgba(102, 126, 234, 0.3); }
        50% { box-shadow: 0 2px 15px rgba(102, 126, 234, 0.6); }
    }

    /* ========== COUNTDOWN TIMER STYLES ========== */
    .countdown-timer {
        background: linear-gradient(135deg, #f0ede5, #e8e0d4);
        border-radius: 40px;
        padding: 8px 15px;
        margin: 10px 0 8px;
        display: inline-flex;
        align-items: center;
        gap: 12px;
        font-size: 13px;
        font-weight: 600;
        color: var(--green-main);
        border: 1px solid rgba(40,89,33,.15);
        width: 100%;
        justify-content: center;
    }
    .countdown-timer span {
        background: white;
        padding: 3px 8px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 700;
        color: var(--green-main);
        min-width: 45px;
        display: inline-block;
        text-align: center;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }
    .countdown-timer .countdown-label {
        background: transparent;
        padding: 0;
        font-size: 11px;
        font-weight: 500;
        color: #8b9a8b;
        min-width: auto;
        box-shadow: none;
    }
    .countdown-timer.urgent {
        background: linear-gradient(135deg, #fff5f0, #ffe8e0);
        border-color: #ff9800;
        animation: pulse-urgent 1s ease-in-out infinite;
    }
    @keyframes pulse-urgent {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.85; background: linear-gradient(135deg, #ffe0d0, #ffd0c0); }
    }

    /* ========== SHARE BUTTON STYLES ========== */
    .btn-share {
        font-size: 18px;
        background: rgba(40,89,33,.08);
        border: none;
        cursor: pointer;
        padding: 6px 10px;
        border-radius: 30px;
        transition: all 0.2s;
        color: #25D366;
    }
    .btn-share:hover {
        background: #25D366;
        color: white;
        transform: scale(1.05);
    }
    .share-dropdown {
        position: relative;
        display: inline-block;
    }
    .share-menu {
        display: none;
        position: absolute;
        bottom: 45px;
        right: 0;
        background: white;
        border-radius: 16px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        min-width: 180px;
        z-index: 1000;
        overflow: hidden;
        border: 1px solid rgba(40,89,33,.15);
    }
    .share-menu a {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 16px;
        text-decoration: none;
        color: #333;
        font-size: 14px;
        transition: background 0.2s;
    }
    .share-menu a:hover {
        background: #f0f5f0;
    }
    .share-menu .wa { color: #25D366; }
    .share-menu .tg { color: #0088cc; }
    .share-menu .fb { color: #1877f2; }
    .share-menu .tw { color: #1da1f2; }
    .share-menu .mail { color: #ea4335; }

    /* ========== CUTE GRID EVENT CARDS ========== */
    #eventsContainer { 
        display: grid; 
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 28px;
    }

    .event-card {
        background: white;
        border-radius: var(--radius);
        overflow: hidden;
        box-shadow: 0 8px 20px rgba(40,89,33,.1);
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        border: 1px solid rgba(40,89,33,.12);
    }
    .event-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 32px -12px rgba(40,89,33,.25);
        border-color: rgba(40,89,33,.3);
    }

    .event-image {
        width: 100%;
        height: 200px;
        overflow: hidden;
        position: relative;
        background: #e8e0d4;
    }
    .event-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }
    .event-card:hover .event-image img {
        transform: scale(1.03);
    }

    .cal-box {
        position: absolute;
        top: 16px;
        left: 16px;
        background: rgba(0,0,0,0.75);
        backdrop-filter: blur(4px);
        border-radius: 14px;
        padding: 6px 12px;
        display: flex;
        flex-direction: column;
        align-items: center;
        min-width: 58px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        border: 1px solid rgba(255,255,255,0.2);
    }
    .cal-month {
        font-size: 10px;
        font-weight: 700;
        color: white;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .cal-day {
        font-size: 22px;
        font-weight: 800;
        color: white;
        line-height: 1.2;
        margin-top: 2px;
    }

    .event-info {
        padding: 20px 18px 22px;
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .event-title-row {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
        margin-bottom: 4px;
    }
    .event-title {
        font-size: 1.35rem;
        font-weight: 700;
        color: var(--green-main);
        margin: 0;
        letter-spacing: -0.2px;
        line-height: 1.3;
    }

    .badge-new {
        font-size: 9px;
        font-weight: 700;
        color: white;
        background: #e67e22;
        border-radius: 30px;
        padding: 3px 10px;
        letter-spacing: 0.3px;
    }
    .badge-plans {
        font-size: 10px;
        font-weight: 600;
        color: white;
        background: var(--beige);
        border-radius: 30px;
        padding: 4px 12px;
    }

    .event-details {
        display: flex;
        flex-direction: column;
        gap: 8px;
        margin: 4px 0;
    }
    .detail-row {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
    }
    .detail-row .icon {
        font-size: 13px;
        width: 22px;
        color: var(--green-main);
    }
    .detail-row .text {
        color: #5a6c5a;
    }
    .detail-row .text.green { color: #2e7d32; font-weight: 600; }
    .detail-row .text.orange { color: #e67e22; font-weight: 600; }
    .detail-row .text.red { color: #c0392b; font-weight: 600; }

    /* ========== STAR RATING STYLES ========== */
    .rating-container {
        margin: 8px 0 4px;
    }
    .stars {
        display: inline-flex;
        gap: 4px;
        direction: ltr;
    }
    .star {
        font-size: 20px;
        cursor: pointer;
        color: #ddd;
        transition: all 0.2s ease;
        background: transparent;
        border: none;
        padding: 0;
    }
    .star:hover,
    .star:hover ~ .star {
        color: #ffc107 !important;
    }
    .star.active {
        color: #ffc107;
    }
    .star-rating-display {
        display: inline-flex;
        gap: 2px;
        margin-left: 8px;
    }
    .rating-average {
        font-size: 12px;
        color: #ffc107;
        margin-left: 8px;
        font-weight: bold;
    }
    .rating-count {
        font-size: 11px;
        color: #8b9a8b;
        margin-left: 5px;
    }
    .rating-text {
        font-size: 11px;
        color: #8b9a8b;
        margin-left: 8px;
    }
    .your-rating {
        font-size: 10px;
        color: #4CAF50;
        margin-left: 8px;
        font-weight: 500;
    }

    .action-row {
        display: flex;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
        margin-top: 8px;
        border-top: 1px solid rgba(40,89,33,.1);
        padding-top: 14px;
    }

    .btn-participate {
        padding: 7px 20px;
        border: none;
        border-radius: 40px;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
        background: var(--green-main);
        color: white;
        flex: 1;
    }
    .btn-participate:hover { 
        background: #3d7e33; 
        transform: translateY(-1px); 
    }
    .btn-participate:disabled { 
        background: #4CAF50; 
        cursor: default; 
        opacity: 0.8;
    }
    .btn-participate.full { 
        background: #b22222; 
        cursor: default; 
    }

    .btn-mic {
        font-size: 18px;
        background: rgba(40,89,33,.08);
        border: none;
        cursor: pointer;
        padding: 6px 10px;
        border-radius: 30px;
        transition: all 0.2s;
        color: var(--green-main);
    }
    .btn-mic:hover { 
        background: rgba(40,89,33,.2); 
        transform: scale(1.05);
    }
    .btn-mic.playing {
        background: #4CAF50;
        color: white;
        animation: pulse 1s infinite;
    }

    .btn-color-blind {
        font-size: 18px;
        background: rgba(40,89,33,.08);
        border: none;
        cursor: pointer;
        padding: 6px 10px;
        border-radius: 30px;
        transition: all 0.2s;
        color: var(--green-main);
    }
    .btn-color-blind:hover { 
        background: rgba(40,89,33,.2); 
        transform: scale(1.05);
    }
    .btn-color-blind.active {
        background: #4CAF50;
        color: white;
    }

    /* Share button styles */
    .btn-share {
        font-size: 18px;
        background: rgba(40,89,33,.08);
        border: none;
        cursor: pointer;
        padding: 6px 10px;
        border-radius: 30px;
        transition: all 0.2s;
        color: #25D366;
    }
    .btn-share:hover {
        background: #25D366;
        color: white;
        transform: scale(1.05);
    }
    .share-wrapper {
        position: relative;
        display: inline-block;
    }
    .share-dropdown {
        display: none;
        position: absolute;
        bottom: 45px;
        right: 0;
        background: white;
        border-radius: 16px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        min-width: 200px;
        z-index: 1000;
        overflow: hidden;
        border: 1px solid rgba(40,89,33,.15);
    }
    .share-dropdown.show {
        display: block;
    }
    .share-dropdown a {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 16px;
        text-decoration: none;
        color: #333;
        font-size: 13px;
        transition: background 0.2s;
        font-weight: 500;
    }
    .share-dropdown a:hover {
        background: #f0f5f0;
    }
    .share-dropdown .wa { color: #25D366; }
    .share-dropdown .tg { color: #0088cc; }
    .share-dropdown .fb { color: #1877f2; }
    .share-dropdown .tw { color: #1da1f2; }
    .share-dropdown .mail { color: #ea4335; }
    .share-dropdown .copy { color: #607d8b; }

    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.1); }
        100% { transform: scale(1); }
    }

    .btn-heart {
        font-size: 20px;
        background: transparent;
        border: none;
        cursor: pointer;
        padding: 4px 8px;
        transition: transform 0.2s;
        color: #d4af7a;
    }
    .btn-heart:hover { 
        transform: scale(1.15); 
        color: #e67e22; 
    }

    .btn-maps {
        font-size: 15px;
        background: rgba(40,89,33,.08);
        border: none;
        cursor: pointer;
        padding: 6px 12px;
        border-radius: 30px;
        transition: all 0.2s;
    }
    .btn-maps:hover { 
        background: rgba(40,89,33,.2); 
    }

    .plan-separator {
        height: 1px;
        background: linear-gradient(to right, transparent, rgba(40,89,33,.15), transparent);
        margin: 8px 0 4px;
    }
    .plan-title-row {
        display: flex;
        align-items: center;
        gap: 6px;
        margin: 4px 0 2px;
    }
    .plan-title {
        font-size: 12px;
        font-weight: 700;
        color: var(--green-main);
        margin: 0;
    }

    .plan-list {
        display: flex;
        flex-direction: column;
        gap: 8px;
        margin-top: 6px;
    }
    .plan-item {
        display: flex;
        align-items: center;
        gap: 12px;
        background: rgba(168,230,207,.08);
        border: 1px solid rgba(40,89,33,.1);
        border-radius: 14px;
        padding: 8px 12px;
    }
    .plan-num {
        min-width: 26px;
        max-width: 26px;
        height: 26px;
        border-radius: 50%;
        background: var(--green-main);
        color: white;
        font-size: 12px;
        font-weight: bold;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .plan-desc { 
        font-size: 11px; 
        color: #4a5b4a; 
        font-weight: 500; 
    }
    .plan-dur { 
        font-size: 9px; 
        color: #7a8c7a; 
        font-weight: 600; 
        margin-top: 2px; 
    }

    /* Color Blindness Modal Styles */
    .colorblind-modal-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.85);
        z-index: 10000;
        justify-content: center;
        align-items: center;
    }
    .colorblind-modal-content {
        background: linear-gradient(145deg, #2a3a2a, #1e2e1e);
        border-radius: 32px;
        max-width: 500px;
        width: 90%;
        animation: slideUp 0.3s ease-out;
        box-shadow: 0 25px 50px -12px rgba(0,0,0,0.5);
        border: 2px solid rgba(76, 175, 80, 0.4);
    }
    .colorblind-modal-header {
        background: linear-gradient(135deg, #1a5c1a, #0d3d0d);
        color: white;
        padding: 20px 24px;
        border-radius: 32px 32px 0 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid rgba(76, 175, 80, 0.3);
    }
    .colorblind-modal-header h3 {
        margin: 0;
        font-size: 1.3rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .colorblind-close {
        background: rgba(255,255,255,0.15);
        border: none;
        color: white;
        font-size: 24px;
        cursor: pointer;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s;
    }
    .colorblind-close:hover {
        background: rgba(255,255,255,0.3);
        transform: scale(1.05);
    }
    .colorblind-options {
        padding: 20px;
        display: flex;
        flex-direction: column;
        gap: 12px;
    }
    .colorblind-option {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 15px 20px;
        background: rgba(255,255,255,0.1);
        border-radius: 20px;
        cursor: pointer;
        transition: all 0.2s;
        border: 1px solid rgba(255,255,255,0.1);
    }
    .colorblind-option:hover {
        background: rgba(76, 175, 80, 0.3);
        transform: translateX(5px);
        border-color: rgba(76, 175, 80, 0.5);
    }
    .colorblind-option.active {
        background: rgba(76, 175, 80, 0.4);
        border-color: #4CAF50;
    }
    .colorblind-option-icon {
        font-size: 32px;
    }
    .colorblind-option-info {
        flex: 1;
    }
    .colorblind-option-title {
        font-size: 16px;
        font-weight: bold;
        color: white;
        margin-bottom: 4px;
    }
    .colorblind-option-desc {
        font-size: 11px;
        color: #a0c0a0;
    }
    .colorblind-reset {
        margin: 10px 20px 20px;
        padding: 12px;
        background: rgba(255,255,255,0.15);
        border: none;
        border-radius: 30px;
        color: white;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.2s;
        text-align: center;
    }
    .colorblind-reset:hover {
        background: rgba(76, 175, 80, 0.4);
    }

    /* Empty state */
    .empty-state {
        text-align: center;
        padding: 60px 30px;
        background: rgba(255,255,255,.95);
        border: 2px solid rgba(40,89,33,.2);
        border-radius: 32px;
        grid-column: 1 / -1;
    }
    .empty-state .icon { font-size: 64px; margin-bottom: 12px; }
    .empty-state h3 { font-size: 22px; font-weight: bold; color: var(--green-main); }

    /* Toast */
    .speech-toast {
        position: fixed;
        bottom: 80px;
        left: 50%;
        transform: translateX(-50%);
        background: var(--green-main);
        color: white;
        padding: 10px 20px;
        border-radius: 40px;
        font-size: 13px;
        z-index: 10000;
        display: none;
        align-items: center;
        gap: 10px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        white-space: nowrap;
    }
    .speech-toast.show {
        display: flex;
        animation: fadeInUp 0.3s ease-out;
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateX(-50%) translateY(20px); }
        to { opacity: 1; transform: translateX(-50%) translateY(0); }
    }
    #toast {
        position: fixed; bottom: 25px; right: 25px; z-index: 9999;
        padding: 12px 24px; border-radius: 40px;
        font-size: 13px; font-weight: 600; color: white;
        background: #285921; box-shadow: 0 4px 15px rgba(0,0,0,.2);
        display: none; animation: fadeInOut .3s ease;
    }
    @keyframes fadeInOut { from{opacity:0;transform:translateY(10px)} to{opacity:1;transform:translateY(0)} }

    /* Responsive */
    @media (max-width: 780px) {
        #eventsContainer { gap: 20px; }
        .event-image { height: 180px; }
        .event-info { padding: 16px; }
        .speech-toast { white-space: normal; text-align: center; width: 90%; }
        .countdown-timer { font-size: 11px; padding: 6px 12px; }
        .countdown-timer span { font-size: 12px; min-width: 38px; }
    }

    /* ========== CREATIVE PAGINATION STYLES ========== */
    .pagination-wrapper {
        margin-top: 50px;
        margin-bottom: 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
        background: rgba(255,255,255,0.5);
        padding: 20px 25px;
        border-radius: 60px;
        backdrop-filter: blur(4px);
    }

    .pagination {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        justify-content: center;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .pagination li {
        display: inline-block;
        perspective: 500px;
    }

    .pagination a {
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 44px;
        height: 44px;
        padding: 0 14px;
        background: white;
        border: 1.5px solid rgba(40, 89, 33, 0.2);
        border-radius: 50%;
        color: var(--green-main);
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }

    .pagination a::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: radial-gradient(circle, rgba(40, 89, 33, 0.15), transparent);
        transform: translate(-50%, -50%);
        transition: width 0.4s, height 0.4s;
        border-radius: 50%;
    }

    .pagination a:hover::before {
        width: 120%;
        height: 120%;
    }

    .pagination a:hover {
        transform: translateY(-3px) scale(1.05);
        background: var(--green-light);
        border-color: var(--green-main);
        color: white;
        box-shadow: 0 6px 16px rgba(40, 89, 33, 0.25);
    }

    .pagination .active a {
        background: linear-gradient(135deg, var(--green-main), var(--green-dark));
        color: white;
        border-color: var(--green-main);
        transform: scale(1.08);
        box-shadow: 0 6px 20px rgba(40, 89, 33, 0.4);
    }

    .pagination .active a::after {
        content: '';
        position: absolute;
        top: -3px;
        left: -3px;
        right: -3px;
        bottom: -3px;
        background: linear-gradient(135deg, #ffd700, #ff9800);
        border-radius: 50%;
        z-index: -1;
        opacity: 0.5;
        animation: pulseGlow 2s infinite;
    }

    @keyframes pulseGlow {
        0%, 100% { opacity: 0.3; transform: scale(1); }
        50% { opacity: 0.8; transform: scale(1.05); }
    }

    .pagination .disabled a {
        opacity: 0.5;
        cursor: not-allowed;
        background: #f5f5f5;
        transform: none;
        pointer-events: none;
    }

    /* Page info */
    .page-info {
        text-align: center;
        background: white;
        padding: 10px 20px;
        border-radius: 40px;
        font-size: 13px;
        color: #8b9a8b;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .page-info strong {
        color: var(--green-main);
        font-weight: 800;
        font-size: 15px;
    }

    /* Items per page selector */
    .per-page-selector {
        display: flex;
        align-items: center;
        gap: 12px;
        background: white;
        padding: 5px 15px 5px 20px;
        border-radius: 40px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .per-page-selector label {
        font-size: 13px;
        color: #5a6c5a;
        font-weight: 500;
    }

    .per-page-selector select {
        padding: 8px 12px;
        border: 1.5px solid rgba(40, 89, 33, 0.3);
        border-radius: 30px;
        background: white;
        font-size: 13px;
        font-weight: 600;
        color: var(--green-main);
        cursor: pointer;
        transition: all 0.2s;
        outline: none;
    }

    .per-page-selector select:hover {
        border-color: var(--green-main);
        background: var(--green-light);
        color: white;
    }

    /* Responsive pagination */
    @media (max-width: 768px) {
        .pagination-wrapper {
            flex-direction: column;
            border-radius: 30px;
            padding: 15px;
        }
        
        .pagination a {
            min-width: 38px;
            height: 38px;
            font-size: 12px;
            padding: 0 10px;
        }
        
        .per-page-selector {
            width: 100%;
            justify-content: center;
        }
        
        .page-info {
            order: 2;
        }
    }

    /* Animation for page change */
    @keyframes pageTransition {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .event-card {
        animation: pageTransition 0.4s ease-out;
    }
</style>

<!-- SVG Filters for Color Blindness Simulation -->
<svg style=\"position: absolute; width: 0; height: 0; visibility: hidden;\">
    <defs>
        <filter id=\"protanopia\" color-interpolation-filters=\"sRGB\">
            <feColorMatrix type=\"matrix\" values=\"
                0.567, 0.433, 0.000, 0, 0
                0.558, 0.442, 0.000, 0, 0
                0.000, 0.242, 0.758, 0, 0
                0, 0, 0, 1, 0\"/>
        </filter>
        <filter id=\"deuteranopia\" color-interpolation-filters=\"sRGB\">
            <feColorMatrix type=\"matrix\" values=\"
                0.625, 0.375, 0.000, 0, 0
                0.700, 0.300, 0.000, 0, 0
                0.000, 0.300, 0.700, 0, 0
                0, 0, 0, 1, 0\"/>
        </filter>
        <filter id=\"tritanopia\" color-interpolation-filters=\"sRGB\">
            <feColorMatrix type=\"matrix\" values=\"
                0.950, 0.050, 0.000, 0, 0
                0.000, 0.433, 0.567, 0, 0
                0.000, 0.475, 0.525, 0, 0
                0, 0, 0, 1, 0\"/>
        </filter>
    </defs>
</svg>

<!-- Google Translate Element (Keep visible but tiny for functionality) -->
<div id=\"google_translate_element\" style=\"position: fixed; bottom: 0; right: 0; width: 1px; height: 1px; opacity: 0; pointer-events: none; z-index: -1;\"></div>

<div class=\"layout\">
    <main class=\"main\">

        <!-- Header -->
        <div class=\"page-header\">
            <div class=\"header-icon\">Ψ</div>
            <div>
                <h1 class=\"header-title\">Événements & Ateliers</h1>
                <p class=\"header-sub\">🌱 Cultivez votre bien-être mental et épanouissement personnel</p>
            </div>
        </div>

        <!-- Search / Sort bar -->
        <div class=\"search-bar\">
            <input type=\"text\" id=\"searchInput\" class=\"search-input\"
                   placeholder=\"🔍  Recherchez votre atelier de bien-être...\">

            <div class=\"sort-wrap\">
                <button class=\"btn-sort\" id=\"sortBtn\" onclick=\"toggleSort()\">✨ Trier par</button>
                <div class=\"sort-menu\" id=\"sortMenu\">
                    <a href=\"#\" onclick=\"sortEvents('title'); return false;\">📚 Par Titre (A → Z)</a>
                    <a href=\"#\" onclick=\"sortEvents('date'); return false;\">📅 Par Date (Récent)</a>
                    <a href=\"#\" onclick=\"sortEvents('plans'); return false;\">🎯 Par Activités</a>
                </div>
            </div>

            <button class=\"btn-fav\" id=\"favBtn\" onclick=\"toggleFav()\">💛 Mes Favoris</button>
            
            <!-- 🌐 TRANSLATION BUTTON -->
            <button class=\"btn-translate\" id=\"translateBtn\" onclick=\"showTranslationModal()\">🌐 Traduire</button>

            <!-- 📅 CALENDAR BUTTON -->
            <a href=\"";
        // line 1302
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("client_events_calendar");
        yield "\" class=\"btn-calendar\">📅 Calendrier</a>

            <span class=\"event-count\" id=\"eventCount\">🎯 ";
        // line 1304
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["events"]) || array_key_exists("events", $context) ? $context["events"] : (function () { throw new RuntimeError('Variable "events" does not exist.', 1304, $this->source); })())), "html", null, true);
        yield " événement";
        yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["events"]) || array_key_exists("events", $context) ? $context["events"] : (function () { throw new RuntimeError('Variable "events" does not exist.', 1304, $this->source); })())) != 1)) ? ("s") : (""));
        yield "</span>
        </div>

        <!-- Events list -->
        <div id=\"eventsContainer\">
            ";
        // line 1309
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["events"]) || array_key_exists("events", $context) ? $context["events"] : (function () { throw new RuntimeError('Variable "events" does not exist.', 1309, $this->source); })()))) {
            // line 1310
            yield "                <div class=\"empty-state\">
                    <div class=\"icon\">🌸</div>
                    <h3>Aucun événement disponible</h3>
                    <p>🌱 Revenez bientôt pour découvrir nos prochains ateliers</p>
                </div>
            ";
        } else {
            // line 1316
            yield "                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["events"]) || array_key_exists("events", $context) ? $context["events"] : (function () { throw new RuntimeError('Variable "events" does not exist.', 1316, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["event"]) {
                // line 1317
                yield "                ";
                $context["ratio"] = (((CoreExtension::getAttribute($this->env, $this->source, $context["event"], "maxParticipants", [], "any", false, false, false, 1317) > 0)) ? ((CoreExtension::getAttribute($this->env, $this->source, $context["event"], "currentParticipants", [], "any", false, false, false, 1317) / CoreExtension::getAttribute($this->env, $this->source, $context["event"], "maxParticipants", [], "any", false, false, false, 1317))) : (0));
                // line 1318
                yield "                ";
                $context["isNew"] = (CoreExtension::getAttribute($this->env, $this->source, $context["event"], "createdAt", [], "any", false, false, false, 1318) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $this->extensions['Twig\Extension\CoreExtension']->convertDate(), "diff", [CoreExtension::getAttribute($this->env, $this->source, $context["event"], "createdAt", [], "any", false, false, false, 1318)], "method", false, false, false, 1318), "days", [], "any", false, false, false, 1318) <= 7));
                // line 1319
                yield "                ";
                $context["isFull"] = (CoreExtension::getAttribute($this->env, $this->source, $context["event"], "currentParticipants", [], "any", false, false, false, 1319) >= CoreExtension::getAttribute($this->env, $this->source, $context["event"], "maxParticipants", [], "any", false, false, false, 1319));
                // line 1320
                yield "                ";
                $context["plansCount"] = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["event"], "planifications", [], "any", false, false, false, 1320));
                // line 1321
                yield "                ";
                $context["avgRating"] = (((CoreExtension::getAttribute($this->env, $this->source, $context["event"], "avgRating", [], "any", true, true, false, 1321) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["event"], "avgRating", [], "any", false, false, false, 1321)))) ? (CoreExtension::getAttribute($this->env, $this->source, $context["event"], "avgRating", [], "any", false, false, false, 1321)) : (0));
                // line 1322
                yield "                ";
                $context["userRating"] = (((CoreExtension::getAttribute($this->env, $this->source, $context["event"], "userRating", [], "any", true, true, false, 1322) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["event"], "userRating", [], "any", false, false, false, 1322)))) ? (CoreExtension::getAttribute($this->env, $this->source, $context["event"], "userRating", [], "any", false, false, false, 1322)) : (0));
                // line 1323
                yield "
                <div class=\"event-card\"
                     data-id=\"";
                // line 1325
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 1325), "html", null, true);
                yield "\"
                     data-title=\"";
                // line 1326
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["event"], "title", [], "any", false, false, false, 1326)), "html", null, true);
                yield "\"
                     data-date=\"";
                // line 1327
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["event"], "eventDate", [], "any", false, false, false, 1327)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "eventDate", [], "any", false, false, false, 1327), "Y-m-d"), "html", null, true)) : (""));
                yield "\"
                     data-plans=\"";
                // line 1328
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["plansCount"]) || array_key_exists("plansCount", $context) ? $context["plansCount"] : (function () { throw new RuntimeError('Variable "plansCount" does not exist.', 1328, $this->source); })()), "html", null, true);
                yield "\">

                    <div class=\"event-image\">
                        ";
                // line 1331
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["event"], "link", [], "any", false, false, false, 1331)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 1332
                    yield "                            <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "link", [], "any", false, false, false, 1332), "html", null, true);
                    yield "\" alt=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "title", [], "any", false, false, false, 1332), "html", null, true);
                    yield "\"
                                 onerror=\"this.src='https://placehold.co/400x200/e8e0d4/5a6c5a?text=Atelier+NAFSEYTI'\">
                        ";
                } else {
                    // line 1335
                    yield "                            <img src=\"https://placehold.co/400x200/e8e0d4/5a6c5a?text=Atelier+Bien-%C3%AAtre\" alt=\"Image par défaut\">
                        ";
                }
                // line 1337
                yield "                        
                        ";
                // line 1338
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["event"], "eventDate", [], "any", false, false, false, 1338)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 1339
                    yield "                        <div class=\"cal-box\">
                            <div class=\"cal-month\">";
                    // line 1340
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), $this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "eventDate", [], "any", false, false, false, 1340), "M")), "html", null, true);
                    yield "</div>
                            <div class=\"cal-day\">";
                    // line 1341
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "eventDate", [], "any", false, false, false, 1341), "d"), "html", null, true);
                    yield "</div>
                        </div>
                        ";
                }
                // line 1344
                yield "                    </div>

                    <div class=\"event-info\">
                        <div class=\"event-title-row\">
                            ";
                // line 1348
                if ((($tmp = (isset($context["isNew"]) || array_key_exists("isNew", $context) ? $context["isNew"] : (function () { throw new RuntimeError('Variable "isNew" does not exist.', 1348, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "<span class=\"badge-new\">NOUVEAU</span>";
                }
                // line 1349
                yield "                            <h2 class=\"event-title\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "title", [], "any", false, false, false, 1349), "html", null, true);
                yield "</h2>
                            ";
                // line 1350
                if (((isset($context["plansCount"]) || array_key_exists("plansCount", $context) ? $context["plansCount"] : (function () { throw new RuntimeError('Variable "plansCount" does not exist.', 1350, $this->source); })()) > 0)) {
                    // line 1351
                    yield "                                <span class=\"badge-plans\">🎯 ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["plansCount"]) || array_key_exists("plansCount", $context) ? $context["plansCount"] : (function () { throw new RuntimeError('Variable "plansCount" does not exist.', 1351, $this->source); })()), "html", null, true);
                    yield "</span>
                            ";
                }
                // line 1353
                yield "                            <!-- ✨ AI RECOMMENDATION BADGE -->
                            ";
                // line 1354
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["event"], "isRecommended", [], "any", false, false, false, 1354)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 1355
                    yield "                                <span class=\"badge-recommended\">
                                    ✨ Recommandé pour vous
                                </span>
                            ";
                }
                // line 1359
                yield "                        </div>

                        <!-- ========== EVENT STATUS BADGE ========== -->
                        <div class=\"event-status-badge status-";
                // line 1362
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["event"], "status", [], "any", true, true, false, 1362) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["event"], "status", [], "any", false, false, false, 1362)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "status", [], "any", false, false, false, 1362), "html", null, true)) : ("upcoming"));
                yield "\">
                            ";
                // line 1363
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["event"], "status", [], "any", false, false, false, 1363) == "ongoing")) {
                    // line 1364
                    yield "                                🟢 En cours
                            ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 1365
$context["event"], "status", [], "any", false, false, false, 1365) == "completed")) {
                    // line 1366
                    yield "                                ✅ Terminé
                            ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 1367
$context["event"], "status", [], "any", false, false, false, 1367) == "cancelled")) {
                    // line 1368
                    yield "                                ❌ Annulé
                            ";
                } else {
                    // line 1370
                    yield "                                📅 À venir
                            ";
                }
                // line 1372
                yield "                        </div>

                        <!-- ========== COUNTDOWN TIMER ========== -->
                        ";
                // line 1375
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["event"], "eventDate", [], "any", false, false, false, 1375)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 1376
                    yield "                            ";
                    if ((CoreExtension::getAttribute($this->env, $this->source, $context["event"], "status", [], "any", false, false, false, 1376) == "ongoing")) {
                        // line 1377
                        yield "                                <div class=\"countdown-timer urgent\">
                                    🟢 Événement en cours ! Rejoignez-nous !
                                </div>
                            ";
                    } elseif ((CoreExtension::getAttribute($this->env, $this->source,                     // line 1380
$context["event"], "status", [], "any", false, false, false, 1380) == "completed")) {
                        // line 1381
                        yield "                                <div class=\"countdown-timer\">
                                    ✅ Événement terminé
                                </div>
                            ";
                    } elseif ((CoreExtension::getAttribute($this->env, $this->source,                     // line 1384
$context["event"], "status", [], "any", false, false, false, 1384) == "cancelled")) {
                        // line 1385
                        yield "                                <div class=\"countdown-timer\">
                                    ❌ Événement annulé
                                </div>
                            ";
                    } else {
                        // line 1389
                        yield "                                ";
                        $context["daysLeft"] = ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["event"], "eventDate", [], "any", false, false, false, 1389), "timestamp", [], "any", false, false, false, 1389) - CoreExtension::getAttribute($this->env, $this->source, $this->extensions['Twig\Extension\CoreExtension']->convertDate(), "timestamp", [], "any", false, false, false, 1389)) / 86400);
                        // line 1390
                        yield "                                <div class=\"countdown-timer ";
                        if (((isset($context["daysLeft"]) || array_key_exists("daysLeft", $context) ? $context["daysLeft"] : (function () { throw new RuntimeError('Variable "daysLeft" does not exist.', 1390, $this->source); })()) <= 3)) {
                            yield "urgent";
                        }
                        yield "\" 
                                     data-event-date=\"";
                        // line 1391
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "eventDate", [], "any", false, false, false, 1391), "Y-m-d H:i:s"), "html", null, true);
                        yield "\">
                                    <span class=\"countdown-label\">⏰</span>
                                    <span class=\"days\">00</span><span class=\"countdown-label\">j</span>
                                    <span class=\"hours\">00</span><span class=\"countdown-label\">h</span>
                                    <span class=\"minutes\">00</span><span class=\"countdown-label\">m</span>
                                    <span class=\"seconds\">00</span><span class=\"countdown-label\">s</span>
                                </div>
                            ";
                    }
                    // line 1399
                    yield "                        ";
                }
                // line 1400
                yield "
                        <div class=\"event-details\">
                            ";
                // line 1402
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["event"], "location", [], "any", false, false, false, 1402)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 1403
                    yield "                            <div class=\"detail-row\">
                                <span class=\"icon\">📍</span>
                                <span class=\"text\">";
                    // line 1405
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "location", [], "any", false, false, false, 1405), "html", null, true);
                    yield "</span>
                            </div>
                            ";
                }
                // line 1408
                yield "
                            ";
                // line 1409
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["event"], "createdAt", [], "any", false, false, false, 1409)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 1410
                    yield "                            <div class=\"detail-row\">
                                <span class=\"icon\">🕐</span>
                                <span class=\"text\" style=\"color:#95a5a6; font-style:italic;\">
                                    ";
                    // line 1413
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "createdAt", [], "any", false, false, false, 1413), "d/m/Y"), "html", null, true);
                    yield "
                                </span>
                            </div>
                            ";
                }
                // line 1417
                yield "
                            <div class=\"detail-row\">
                                <span class=\"icon\">👥</span>
                                <span class=\"text ";
                // line 1420
                if (((isset($context["ratio"]) || array_key_exists("ratio", $context) ? $context["ratio"] : (function () { throw new RuntimeError('Variable "ratio" does not exist.', 1420, $this->source); })()) >= 1)) {
                    yield "red";
                } elseif (((isset($context["ratio"]) || array_key_exists("ratio", $context) ? $context["ratio"] : (function () { throw new RuntimeError('Variable "ratio" does not exist.', 1420, $this->source); })()) >= 0.8)) {
                    yield "orange";
                } else {
                    yield "green";
                }
                yield "\">
                                    ";
                // line 1421
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "currentParticipants", [], "any", false, false, false, 1421), "html", null, true);
                yield " / ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "maxParticipants", [], "any", false, false, false, 1421), "html", null, true);
                yield " participants
                                    ";
                // line 1422
                if ((($tmp = (isset($context["isFull"]) || array_key_exists("isFull", $context) ? $context["isFull"] : (function () { throw new RuntimeError('Variable "isFull" does not exist.', 1422, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield " — Complet";
                } elseif (((isset($context["ratio"]) || array_key_exists("ratio", $context) ? $context["ratio"] : (function () { throw new RuntimeError('Variable "ratio" does not exist.', 1422, $this->source); })()) >= 0.8)) {
                    yield " — Presque complet";
                }
                // line 1423
                yield "                                </span>
                            </div>
                        </div>

                        <!-- ========== 5-STAR RATING SYSTEM ========== -->
                        <div class=\"rating-container\">
                            <div class=\"stars\" data-event-id=\"";
                // line 1429
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 1429), "html", null, true);
                yield "\">
                                ";
                // line 1430
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(range(1, 5));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 1431
                    yield "                                    <button class=\"star ";
                    if (((isset($context["userRating"]) || array_key_exists("userRating", $context) ? $context["userRating"] : (function () { throw new RuntimeError('Variable "userRating" does not exist.', 1431, $this->source); })()) >= $context["i"])) {
                        yield "active";
                    }
                    yield "\" data-value=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["i"], "html", null, true);
                    yield "\" onclick=\"rateEvent(";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 1431), "html", null, true);
                    yield ", ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["i"], "html", null, true);
                    yield ")\">★</button>
                                ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 1433
                yield "                            </div>
                            <span class=\"rating-average\" id=\"rating-avg-";
                // line 1434
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 1434), "html", null, true);
                yield "\">(";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["avgRating"]) || array_key_exists("avgRating", $context) ? $context["avgRating"] : (function () { throw new RuntimeError('Variable "avgRating" does not exist.', 1434, $this->source); })()), "html", null, true);
                yield ")</span>
                            <span class=\"rating-count\" id=\"rating-count-";
                // line 1435
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 1435), "html", null, true);
                yield "\">(";
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["event"], "ratingCount", [], "any", true, true, false, 1435) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["event"], "ratingCount", [], "any", false, false, false, 1435)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "ratingCount", [], "any", false, false, false, 1435), "html", null, true)) : (0));
                yield " avis)</span>
                            ";
                // line 1436
                if (((isset($context["userRating"]) || array_key_exists("userRating", $context) ? $context["userRating"] : (function () { throw new RuntimeError('Variable "userRating" does not exist.', 1436, $this->source); })()) > 0)) {
                    // line 1437
                    yield "                                <span class=\"your-rating\">Votre note: ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["userRating"]) || array_key_exists("userRating", $context) ? $context["userRating"] : (function () { throw new RuntimeError('Variable "userRating" does not exist.', 1437, $this->source); })()), "html", null, true);
                    yield "★</span>
                            ";
                }
                // line 1439
                yield "                        </div>

                        <div class=\"action-row\">
                            ";
                // line 1442
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["event"], "status", [], "any", false, false, false, 1442) == "cancelled")) {
                    // line 1443
                    yield "                                <button class=\"btn-participate full\" disabled>❌ Événement annulé</button>
                            ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 1444
$context["event"], "status", [], "any", false, false, false, 1444) == "completed")) {
                    // line 1445
                    yield "                                <button class=\"btn-participate full\" disabled>✅ Événement terminé</button>
                            ";
                } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source,                 // line 1446
$context["event"], "hasParticipated", [], "any", false, false, false, 1446)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 1447
                    yield "                                <button class=\"btn-participate\" disabled>✅ Inscrit</button>
                            ";
                } elseif ((($tmp =                 // line 1448
(isset($context["isFull"]) || array_key_exists("isFull", $context) ? $context["isFull"] : (function () { throw new RuntimeError('Variable "isFull" does not exist.', 1448, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 1449
                    yield "                                <button class=\"btn-participate full\" disabled>Complet</button>
                            ";
                } else {
                    // line 1451
                    yield "                                <button class=\"btn-participate\"
                                        onclick=\"participate(";
                    // line 1452
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 1452), "html", null, true);
                    yield ", this)\">
                                    🎯 S'inscrire
                                </button>
                            ";
                }
                // line 1456
                yield "
                            <button class=\"btn-mic\" 
                                    onclick=\"speakEventDetails(";
                // line 1458
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 1458), "html", null, true);
                yield ")\"
                                    title=\"Écouter les détails de l'événement\"
                                    data-event-id=\"";
                // line 1460
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 1460), "html", null, true);
                yield "\">
                                🎤
                            </button>

                            <button class=\"btn-color-blind\" 
                                    onclick=\"showColorBlindOptions()\"
                                    title=\"Options pour daltoniens (amélioration des couleurs)\">
                                🎨
                            </button>

                            <!-- 📤 SHARE BUTTON with dropdown -->
                            <div class=\"share-wrapper\">
                                <button class=\"btn-share\" onclick=\"toggleShareMenu(";
                // line 1472
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 1472), "html", null, true);
                yield ")\" title=\"Partager l'événement\">
                                    📤
                                </button>
                                <div class=\"share-dropdown\" id=\"share-menu-";
                // line 1475
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 1475), "html", null, true);
                yield "\">
                                    <a href=\"#\" onclick=\"shareEvent('";
                // line 1476
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 1476), "html", null, true);
                yield "', 'whatsapp'); return false;\" class=\"wa\">
                                        <span>💚</span> WhatsApp
                                    </a>
                                    <a href=\"#\" onclick=\"shareEvent('";
                // line 1479
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 1479), "html", null, true);
                yield "', 'telegram'); return false;\" class=\"tg\">
                                        <span>✈️</span> Telegram
                                    </a>
                                    <a href=\"#\" onclick=\"shareEvent('";
                // line 1482
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 1482), "html", null, true);
                yield "', 'facebook'); return false;\" class=\"fb\">
                                        <span>📘</span> Facebook
                                    </a>
                                    <a href=\"#\" onclick=\"shareEvent('";
                // line 1485
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 1485), "html", null, true);
                yield "', 'twitter'); return false;\" class=\"tw\">
                                        <span>🐦</span> Twitter/X
                                    </a>
                                    <a href=\"#\" onclick=\"shareEvent('";
                // line 1488
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 1488), "html", null, true);
                yield "', 'email'); return false;\" class=\"mail\">
                                        <span>📧</span> Email
                                    </a>
                                    <a href=\"#\" onclick=\"copyEventLink('";
                // line 1491
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 1491), "html", null, true);
                yield "'); return false;\" class=\"copy\">
                                        <span>📋</span> Copier le lien
                                    </a>
                                </div>
                            </div>

                            ";
                // line 1497
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["event"], "location", [], "any", false, false, false, 1497)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 1498
                    yield "                            <button class=\"btn-maps\"
                                    onclick=\"showQR(";
                    // line 1499
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 1499), "html", null, true);
                    yield ")\"
                                    title=\"Voir localisation\">📍</button>
                            ";
                }
                // line 1502
                yield "
                            <button class=\"btn-heart\"
                                    id=\"heart-";
                // line 1504
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 1504), "html", null, true);
                yield "\"
                                    onclick=\"toggleHeart(";
                // line 1505
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 1505), "html", null, true);
                yield ", this)\">🤍</button>
                        </div>

                        <div style=\"display: none;\" class=\"event-speech-data\" 
                             data-title=\"";
                // line 1509
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "title", [], "any", false, false, false, 1509), "html", null, true);
                yield "\"
                             data-date=\"";
                // line 1510
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["event"], "eventDate", [], "any", false, false, false, 1510)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "eventDate", [], "any", false, false, false, 1510), "d/m/Y"), "html", null, true)) : ("Date non spécifiée"));
                yield "\"
                             data-location=\"";
                // line 1511
                yield ((CoreExtension::getAttribute($this->env, $this->source, $context["event"], "location", [], "any", false, false, false, 1511)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "location", [], "any", false, false, false, 1511), "html", null, true)) : ("Lieu non spécifié"));
                yield "\"
                             data-participants=\"";
                // line 1512
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "currentParticipants", [], "any", false, false, false, 1512), "html", null, true);
                yield "/";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "maxParticipants", [], "any", false, false, false, 1512), "html", null, true);
                yield "\"
                             data-plans-count=\"";
                // line 1513
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["plansCount"]) || array_key_exists("plansCount", $context) ? $context["plansCount"] : (function () { throw new RuntimeError('Variable "plansCount" does not exist.', 1513, $this->source); })()), "html", null, true);
                yield "\"
                             data-plans=\"";
                // line 1514
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "planifications", [], "any", false, false, false, 1514));
                $context['loop'] = [
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                ];
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["plan"]) {
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "description", [], "any", false, false, false, 1514), "html", null, true);
                    yield " (";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "duree", [], "any", false, false, false, 1514), "html", null, true);
                    yield ")";
                    if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 1514)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        yield ", ";
                    }
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['plan'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                yield "\">
                        </div>

                        ";
                // line 1517
                if (((isset($context["plansCount"]) || array_key_exists("plansCount", $context) ? $context["plansCount"] : (function () { throw new RuntimeError('Variable "plansCount" does not exist.', 1517, $this->source); })()) > 0)) {
                    // line 1518
                    yield "                        <div class=\"plan-separator\"></div>
                        <div class=\"plan-title-row\">
                            <span>🌱</span>
                            <h4 class=\"plan-title\">Programme</h4>
                        </div>
                        <div class=\"plan-list\">
                            ";
                    // line 1524
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["event"], "planifications", [], "any", false, false, false, 1524), 0, 2));
                    foreach ($context['_seq'] as $context["i"] => $context["plan"]) {
                        // line 1525
                        yield "                            <div class=\"plan-item\">
                                <div class=\"plan-num\">";
                        // line 1526
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["i"] + 1), "html", null, true);
                        yield "</div>
                                <div>
                                    ";
                        // line 1528
                        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "description", [], "any", false, false, false, 1528)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                            // line 1529
                            yield "                                        <div class=\"plan-desc\">";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "description", [], "any", false, false, false, 1529), 0, 50), "html", null, true);
                            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "description", [], "any", false, false, false, 1529)) > 50)) {
                                yield "...";
                            }
                            yield "</div>
                                    ";
                        }
                        // line 1531
                        yield "                                    ";
                        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "duree", [], "any", false, false, false, 1531)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                            // line 1532
                            yield "                                        <div class=\"plan-dur\">⏰ ";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "duree", [], "any", false, false, false, 1532), "html", null, true);
                            yield "</div>
                                    ";
                        }
                        // line 1534
                        yield "                                </div>
                            </div>
                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['i'], $context['plan'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 1537
                    yield "                            ";
                    if (((isset($context["plansCount"]) || array_key_exists("plansCount", $context) ? $context["plansCount"] : (function () { throw new RuntimeError('Variable "plansCount" does not exist.', 1537, $this->source); })()) > 2)) {
                        // line 1538
                        yield "                            <div style=\"font-size: 10px; color: var(--green-main); text-align: center; margin-top: 4px;\">
                                + ";
                        // line 1539
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((isset($context["plansCount"]) || array_key_exists("plansCount", $context) ? $context["plansCount"] : (function () { throw new RuntimeError('Variable "plansCount" does not exist.', 1539, $this->source); })()) - 2), "html", null, true);
                        yield " autre(s) activité(s)
                            </div>
                            ";
                    }
                    // line 1542
                    yield "                        </div>
                        ";
                }
                // line 1544
                yield "
                    </div>
                </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['event'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 1548
            yield "            ";
        }
        // line 1549
        yield "        </div>

        <!-- ========== CREATIVE PAGINATION ========== -->
        ";
        // line 1552
        if (( !Twig\Extension\CoreExtension::testEmpty((isset($context["events"]) || array_key_exists("events", $context) ? $context["events"] : (function () { throw new RuntimeError('Variable "events" does not exist.', 1552, $this->source); })())) && ((isset($context["totalPages"]) || array_key_exists("totalPages", $context) ? $context["totalPages"] : (function () { throw new RuntimeError('Variable "totalPages" does not exist.', 1552, $this->source); })()) > 1))) {
            // line 1553
            yield "        <div class=\"pagination-wrapper\">
            <div class=\"per-page-selector\">
                <label>📄 Afficher :</label>
                <select id=\"perPageSelect\" onchange=\"changePerPage(this.value)\">
                    <option value=\"6\" ";
            // line 1557
            yield ((((isset($context["currentLimit"]) || array_key_exists("currentLimit", $context) ? $context["currentLimit"] : (function () { throw new RuntimeError('Variable "currentLimit" does not exist.', 1557, $this->source); })()) == 6)) ? ("selected") : (""));
            yield ">6 par page</option>
                    <option value=\"12\" ";
            // line 1558
            yield ((((isset($context["currentLimit"]) || array_key_exists("currentLimit", $context) ? $context["currentLimit"] : (function () { throw new RuntimeError('Variable "currentLimit" does not exist.', 1558, $this->source); })()) == 12)) ? ("selected") : (""));
            yield ">12 par page</option>
                    <option value=\"18\" ";
            // line 1559
            yield ((((isset($context["currentLimit"]) || array_key_exists("currentLimit", $context) ? $context["currentLimit"] : (function () { throw new RuntimeError('Variable "currentLimit" does not exist.', 1559, $this->source); })()) == 18)) ? ("selected") : (""));
            yield ">18 par page</option>
                    <option value=\"24\" ";
            // line 1560
            yield ((((isset($context["currentLimit"]) || array_key_exists("currentLimit", $context) ? $context["currentLimit"] : (function () { throw new RuntimeError('Variable "currentLimit" does not exist.', 1560, $this->source); })()) == 24)) ? ("selected") : (""));
            yield ">24 par page</option>
                    <option value=\"30\" ";
            // line 1561
            yield ((((isset($context["currentLimit"]) || array_key_exists("currentLimit", $context) ? $context["currentLimit"] : (function () { throw new RuntimeError('Variable "currentLimit" does not exist.', 1561, $this->source); })()) == 30)) ? ("selected") : (""));
            yield ">30 par page</option>
                </select>
            </div>
            
            <div class=\"pagination\">
                ";
            // line 1567
            yield "                ";
            if (((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 1567, $this->source); })()) > 1)) {
                // line 1568
                yield "                    <li><a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("client_events_index", ["page" => ((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 1568, $this->source); })()) - 1), "limit" => (isset($context["currentLimit"]) || array_key_exists("currentLimit", $context) ? $context["currentLimit"] : (function () { throw new RuntimeError('Variable "currentLimit" does not exist.', 1568, $this->source); })())]), "html", null, true);
                yield "\">←</a></li>
                ";
            } else {
                // line 1570
                yield "                    <li class=\"disabled\"><a href=\"#\">←</a></li>
                ";
            }
            // line 1572
            yield "                
                ";
            // line 1574
            yield "                ";
            if (((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 1574, $this->source); })()) > 3)) {
                // line 1575
                yield "                    <li><a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("client_events_index", ["page" => 1, "limit" => (isset($context["currentLimit"]) || array_key_exists("currentLimit", $context) ? $context["currentLimit"] : (function () { throw new RuntimeError('Variable "currentLimit" does not exist.', 1575, $this->source); })())]), "html", null, true);
                yield "\">1</a></li>
                    ";
                // line 1576
                if (((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 1576, $this->source); })()) > 4)) {
                    // line 1577
                    yield "                        <li class=\"disabled\"><a href=\"#\">...</a></li>
                    ";
                }
                // line 1579
                yield "                ";
            }
            // line 1580
            yield "                
                ";
            // line 1582
            yield "                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(range(max(1, ((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 1582, $this->source); })()) - 2)), min((isset($context["totalPages"]) || array_key_exists("totalPages", $context) ? $context["totalPages"] : (function () { throw new RuntimeError('Variable "totalPages" does not exist.', 1582, $this->source); })()), ((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 1582, $this->source); })()) + 2))));
            foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                // line 1583
                yield "                    ";
                if (($context["p"] == (isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 1583, $this->source); })()))) {
                    // line 1584
                    yield "                        <li class=\"active\"><a href=\"#\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["p"], "html", null, true);
                    yield "</a></li>
                    ";
                } else {
                    // line 1586
                    yield "                        <li><a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("client_events_index", ["page" => $context["p"], "limit" => (isset($context["currentLimit"]) || array_key_exists("currentLimit", $context) ? $context["currentLimit"] : (function () { throw new RuntimeError('Variable "currentLimit" does not exist.', 1586, $this->source); })())]), "html", null, true);
                    yield "\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["p"], "html", null, true);
                    yield "</a></li>
                    ";
                }
                // line 1588
                yield "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['p'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 1589
            yield "                
                ";
            // line 1591
            yield "                ";
            if (((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 1591, $this->source); })()) < ((isset($context["totalPages"]) || array_key_exists("totalPages", $context) ? $context["totalPages"] : (function () { throw new RuntimeError('Variable "totalPages" does not exist.', 1591, $this->source); })()) - 2))) {
                // line 1592
                yield "                    ";
                if (((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 1592, $this->source); })()) < ((isset($context["totalPages"]) || array_key_exists("totalPages", $context) ? $context["totalPages"] : (function () { throw new RuntimeError('Variable "totalPages" does not exist.', 1592, $this->source); })()) - 3))) {
                    // line 1593
                    yield "                        <li class=\"disabled\"><a href=\"#\">...</a></li>
                    ";
                }
                // line 1595
                yield "                    <li><a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("client_events_index", ["page" => (isset($context["totalPages"]) || array_key_exists("totalPages", $context) ? $context["totalPages"] : (function () { throw new RuntimeError('Variable "totalPages" does not exist.', 1595, $this->source); })()), "limit" => (isset($context["currentLimit"]) || array_key_exists("currentLimit", $context) ? $context["currentLimit"] : (function () { throw new RuntimeError('Variable "currentLimit" does not exist.', 1595, $this->source); })())]), "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalPages"]) || array_key_exists("totalPages", $context) ? $context["totalPages"] : (function () { throw new RuntimeError('Variable "totalPages" does not exist.', 1595, $this->source); })()), "html", null, true);
                yield "</a></li>
                ";
            }
            // line 1597
            yield "                
                ";
            // line 1599
            yield "                ";
            if (((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 1599, $this->source); })()) < (isset($context["totalPages"]) || array_key_exists("totalPages", $context) ? $context["totalPages"] : (function () { throw new RuntimeError('Variable "totalPages" does not exist.', 1599, $this->source); })()))) {
                // line 1600
                yield "                    <li><a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("client_events_index", ["page" => ((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 1600, $this->source); })()) + 1), "limit" => (isset($context["currentLimit"]) || array_key_exists("currentLimit", $context) ? $context["currentLimit"] : (function () { throw new RuntimeError('Variable "currentLimit" does not exist.', 1600, $this->source); })())]), "html", null, true);
                yield "\">→</a></li>
                ";
            } else {
                // line 1602
                yield "                    <li class=\"disabled\"><a href=\"#\">→</a></li>
                ";
            }
            // line 1604
            yield "            </div>
            
            <div class=\"page-info\">
                📖 Page <strong>";
            // line 1607
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 1607, $this->source); })()), "html", null, true);
            yield "</strong> / <strong>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalPages"]) || array_key_exists("totalPages", $context) ? $context["totalPages"] : (function () { throw new RuntimeError('Variable "totalPages" does not exist.', 1607, $this->source); })()), "html", null, true);
            yield "</strong>
                &nbsp;&nbsp;|&nbsp;&nbsp;
                🎯 <strong>";
            // line 1609
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalItems"]) || array_key_exists("totalItems", $context) ? $context["totalItems"] : (function () { throw new RuntimeError('Variable "totalItems" does not exist.', 1609, $this->source); })()), "html", null, true);
            yield "</strong> événement";
            yield ((((isset($context["totalItems"]) || array_key_exists("totalItems", $context) ? $context["totalItems"] : (function () { throw new RuntimeError('Variable "totalItems" does not exist.', 1609, $this->source); })()) > 1)) ? ("s") : (""));
            yield " au total
            </div>
        </div>
        ";
        }
        // line 1613
        yield "
    </main>
</div>

<!-- Translation Modal -->
<div id=\"translationModal\" class=\"translation-modal-overlay\">
    <div class=\"translation-modal-content\">
        <div class=\"translation-modal-header\">
            <h3>
                <span>🌐</span>
                Traduire la page
            </h3>
            <button class=\"translation-close\" onclick=\"closeTranslationModal()\">&times;</button>
        </div>
        <div class=\"translation-options\" id=\"translationOptions\">
            <!-- Languages will be populated by JavaScript -->
        </div>
        <div class=\"translation-reset\" onclick=\"resetTranslation()\">
            🔄 Réinitialiser (Français)
        </div>
    </div>
</div>

<!-- Color Blindness Modal -->
<div id=\"colorblindModal\" class=\"colorblind-modal-overlay\">
    <div class=\"colorblind-modal-content\">
        <div class=\"colorblind-modal-header\">
            <h3>
                <span>🎨</span>
                Options pour Daltoniens
            </h3>
            <button class=\"colorblind-close\" onclick=\"closeColorBlindModal()\">&times;</button>
        </div>
        <div class=\"colorblind-options\">
            <div class=\"colorblind-option\" onclick=\"setColorBlindMode('normal')\" id=\"opt-normal\">
                <div class=\"colorblind-option-icon\">👁️</div>
                <div class=\"colorblind-option-info\">
                    <div class=\"colorblind-option-title\">Vision Normale</div>
                    <div class=\"colorblind-option-desc\">Couleurs standards</div>
                </div>
            </div>
            <div class=\"colorblind-option\" onclick=\"setColorBlindMode('protanopia')\" id=\"opt-protanopia\">
                <div class=\"colorblind-option-icon\">🔴</div>
                <div class=\"colorblind-option-info\">
                    <div class=\"colorblind-option-title\">Protanopie (Daltonien Rouge-Vert)</div>
                    <div class=\"colorblind-option-desc\">Difficulté à distinguer le rouge et le vert</div>
                </div>
            </div>
            <div class=\"colorblind-option\" onclick=\"setColorBlindMode('deuteranopia')\" id=\"opt-deuteranopia\">
                <div class=\"colorblind-option-icon\">🟢</div>
                <div class=\"colorblind-option-info\">
                    <div class=\"colorblind-option-title\">Deutéranopie (Daltonien Vert-Rouge)</div>
                    <div class=\"colorblind-option-desc\">Difficulté à distinguer le vert et le rouge</div>
                </div>
            </div>
            <div class=\"colorblind-option\" onclick=\"setColorBlindMode('tritanopia')\" id=\"opt-tritanopia\">
                <div class=\"colorblind-option-icon\">🔵</div>
                <div class=\"colorblind-option-info\">
                    <div class=\"colorblind-option-title\">Tritanopie (Daltonien Bleu-Jaune)</div>
                    <div class=\"colorblind-option-desc\">Difficulté à distinguer le bleu et le jaune</div>
                </div>
            </div>
            <div class=\"colorblind-option\" onclick=\"setColorBlindMode('achromatopsia')\" id=\"opt-achromatopsia\">
                <div class=\"colorblind-option-icon\">⚫</div>
                <div class=\"colorblind-option-info\">
                    <div class=\"colorblind-option-title\">Achromatopsie (Noir et Blanc)</div>
                    <div class=\"colorblind-option-desc\">Vision totalement en niveaux de gris</div>
                </div>
            </div>
            <div class=\"colorblind-option\" onclick=\"setColorBlindMode('high-contrast')\" id=\"opt-high-contrast\">
                <div class=\"colorblind-option-icon\">🌓</div>
                <div class=\"colorblind-option-info\">
                    <div class=\"colorblind-option-title\">Contraste Élevé</div>
                    <div class=\"colorblind-option-desc\">Pour les personnes ayant une basse vision</div>
                </div>
            </div>
        </div>
        <div class=\"colorblind-reset\" onclick=\"resetColorBlindMode()\">
            🔄 Réinitialiser les paramètres
        </div>
    </div>
</div>

<div id=\"toast\"></div>

<!-- QR Code Modal -->
<div id=\"qrModal\" style=\"display:none; position:fixed; inset:0; z-index:9998;
     background:rgba(0,0,0,.5); align-items:center; justify-content:center;\">
  <div style=\"background:#F5F1E6; border-radius:20px; padding:30px; max-width:420px; width:90%;
              box-shadow:0 10px 40px rgba(0,0,0,.3); text-align:center; position:relative;\">

    <button onclick=\"closeQR()\" style=\"position:absolute; top:15px; right:18px;
            background:none; border:none; font-size:22px; cursor:pointer; color:#888;\">✕</button>

    <h3 id=\"qrTitle\" style=\"font-size:20px; font-weight:bold; color:#285921; margin-bottom:6px;\">
        📍 Localisation de l'événement
    </h3>
    <p id=\"qrEventName\" style=\"font-size:16px; font-weight:bold; margin-bottom:4px;\"></p>
    <p id=\"qrLocation\" style=\"font-size:14px; color:#5a6c5a; margin-bottom:18px;\"></p>

    <div id=\"qrSpinner\" style=\"font-size:40px; margin:20px 0;\">⏳</div>
    <div id=\"qrImage\"
         style=\"display:none; width:220px; height:220px; margin:0 auto 15px; border-radius:10px;
                border:2px solid #d2e0cf; background:white; padding:8px;\"></div>

    <input id=\"qrUrl\" type=\"text\" readonly
           style=\"width:100%; padding:10px; border:1px solid #CFCBB3; border-radius:8px;
                  background:white; font-size:12px; margin-bottom:8px; text-align:center;\">

    <p style=\"font-size:12px; color:#8b9a8b; margin-bottom:18px;\">
        Scannez ce code QR pour ouvrir la localisation dans Google Maps
    </p>

    <div style=\"display:flex; gap:12px; justify-content:center;\">
      <button onclick=\"copyQrUrl()\"
              style=\"background:#374535; color:white; border:none; padding:10px 22px;
                     border-radius:8px; cursor:pointer; font-size:14px; font-weight:bold;\">
          📋 Copier le lien
      </button>
      <button onclick=\"closeQR()\"
              style=\"background:#b22222; color:white; border:none; padding:10px 22px;
                     border-radius:8px; cursor:pointer; font-size:14px; font-weight:bold;\">
          Fermer
      </button>
    </div>
  </div>
</div>

";
        // line 1741
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 2332
        yield "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 1741
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

        // line 1742
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js\"></script>
<script>
var likedIds = new Set();
var showingFav = false;
var currentSpeech = null;
var activeMicButton = null;
var translationInterval = null;

// ========== SHARE FUNCTIONS ==========
function toggleShareMenu(eventId) {
    var menu = document.getElementById('share-menu-' + eventId);
    // Close all other share menus
    document.querySelectorAll('.share-dropdown').forEach(function(el) {
        if (el.id !== 'share-menu-' + eventId) {
            el.classList.remove('show');
        }
    });
    menu.classList.toggle('show');
}

// Close share menu when clicking outside
document.addEventListener('click', function(e) {
    if (!e.target.closest('.share-wrapper')) {
        document.querySelectorAll('.share-dropdown').forEach(function(el) {
            el.classList.remove('show');
        });
    }
});

function shareEvent(eventId, platform) {
    var card = document.querySelector('.event-card[data-id=\"' + eventId + '\"]');
    if (!card) return;
    
    var title = card.querySelector('.event-title')?.innerText || 'Événement NAFSEYTI';
    var url = window.location.href.split('?')[0] + '?event=' + eventId;
    var text = \"🌱 \" + title + \" - Rejoignez-moi à cet atelier bien-être sur NAFSEYTI !\";
    
    var shareUrls = {
        whatsapp: 'https://wa.me/?text=' + encodeURIComponent(text + ' ' + url),
        telegram: 'https://t.me/share/url?url=' + encodeURIComponent(url) + '&text=' + encodeURIComponent(text),
        facebook: 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(url),
        twitter: 'https://twitter.com/intent/tweet?text=' + encodeURIComponent(text) + '&url=' + encodeURIComponent(url),
        email: 'mailto:?subject=' + encodeURIComponent('Invitation: ' + title) + '&body=' + encodeURIComponent(text + '\\n\\n' + url)
    };
    
    if (shareUrls[platform]) {
        window.open(shareUrls[platform], '_blank');
        showToast('📤 Ouverture du partage vers ' + platform, '#25D366');
    }
    
    // Close the dropdown
    var menu = document.getElementById('share-menu-' + eventId);
    if (menu) menu.classList.remove('show');
}

function copyEventLink(eventId) {
    var url = window.location.href.split('?')[0] + '?event=' + eventId;
    navigator.clipboard.writeText(url).then(function() {
        showToast('📋 Lien copié dans le presse-papier !', '#4CAF50');
    }).catch(function() {
        showToast('❌ Impossible de copier le lien', '#b22222');
    });
    
    var menu = document.getElementById('share-menu-' + eventId);
    if (menu) menu.classList.remove('show');
}

// ========== COUNTDOWN TIMER FUNCTION ==========
function updateAllCountdowns() {
    document.querySelectorAll('.countdown-timer').forEach(function(el) {
        if (!el.dataset.eventDate) return;
        
        var eventDate = new Date(el.dataset.eventDate).getTime();
        var now = new Date().getTime();
        var diff = eventDate - now;
        
        if (diff < 0) {
            el.innerHTML = \"🎉 Événement en cours !\";
            el.classList.add('urgent');
            return;
        }
        
        var days = Math.floor(diff / (1000 * 60 * 60 * 24));
        var hours = Math.floor((diff % (86400000)) / 3600000);
        var minutes = Math.floor((diff % 3600000) / 60000);
        var seconds = Math.floor((diff % 60000) / 1000);
        
        var daysSpan = el.querySelector('.days');
        var hoursSpan = el.querySelector('.hours');
        var minutesSpan = el.querySelector('.minutes');
        var secondsSpan = el.querySelector('.seconds');
        
        if (daysSpan) daysSpan.textContent = days;
        if (hoursSpan) hoursSpan.textContent = hours.toString().padStart(2, '0');
        if (minutesSpan) minutesSpan.textContent = minutes.toString().padStart(2, '0');
        if (secondsSpan) secondsSpan.textContent = seconds.toString().padStart(2, '0');
        
        if (days < 3 && days >= 0) {
            el.classList.add('urgent');
        } else {
            el.classList.remove('urgent');
        }
    });
}

setInterval(updateAllCountdowns, 1000);
setTimeout(updateAllCountdowns, 100);

// ========== STAR RATING FUNCTIONS ==========
function rateEvent(eventId, rating) {
    fetch('/events/' + eventId + '/rate', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: JSON.stringify({ rating: rating })
    })
    .then(function(response) { return response.json(); })
    .then(function(data) {
        if (data.success) {
            var starsContainer = document.querySelector('.stars[data-event-id=\"' + eventId + '\"]');
            if (starsContainer) {
                var stars = starsContainer.querySelectorAll('.star');
                for (var i = 0; i < stars.length; i++) {
                    if (i < rating) {
                        stars[i].classList.add('active');
                    } else {
                        stars[i].classList.remove('active');
                    }
                }
            }
            
            var avgSpan = document.getElementById('rating-avg-' + eventId);
            if (avgSpan) avgSpan.textContent = '(' + data.averageRating + ')';
            
            var countSpan = document.getElementById('rating-count-' + eventId);
            if (countSpan) countSpan.textContent = '(' + data.ratingCount + ' avis)';
            
            var ratingContainer = starsContainer ? starsContainer.parentNode : null;
            if (ratingContainer) {
                var existingYourRating = ratingContainer.querySelector('.your-rating');
                if (existingYourRating) existingYourRating.remove();
                var yourRatingSpan = document.createElement('span');
                yourRatingSpan.className = 'your-rating';
                yourRatingSpan.textContent = 'Votre note: ' + rating + '★';
                ratingContainer.appendChild(yourRatingSpan);
            }
            
            showToast('⭐ Merci pour votre note de ' + rating + ' étoiles!', '#4CAF50');
        } else {
            showToast('⚠️ ' + (data.message || 'Erreur'), '#b22222');
        }
    })
    .catch(function(error) {
        console.error('Error:', error);
        showToast('❌ Erreur réseau', '#b22222');
    });
}

// ========== TRANSLATION FUNCTIONS ==========
const languages = [
    { code: 'fr', name: 'Français', flag: '🇫🇷', native: 'Français' },
    { code: 'en', name: 'English', flag: '🇬🇧', native: 'English' },
    { code: 'es', name: 'Español', flag: '🇪🇸', native: 'Español' },
    { code: 'de', name: 'Deutsch', flag: '🇩🇪', native: 'Deutsch' },
    { code: 'it', name: 'Italiano', flag: '🇮🇹', native: 'Italiano' },
    { code: 'pt', name: 'Português', flag: '🇵🇹', native: 'Português' },
    { code: 'nl', name: 'Nederlands', flag: '🇳🇱', native: 'Nederlands' },
    { code: 'ru', name: 'Русский', flag: '🇷🇺', native: 'Русский' },
    { code: 'ar', name: 'العربية', flag: '🇸🇦', native: 'العربية' },
    { code: 'zh-CN', name: '中文', flag: '🇨🇳', native: '中文' },
    { code: 'ja', name: '日本語', flag: '🇯🇵', native: '日本語' },
    { code: 'ko', name: '한국어', flag: '🇰🇷', native: '한국어' },
    { code: 'tr', name: 'Türkçe', flag: '🇹🇷', native: 'Türkçe' },
    { code: 'el', name: 'Ελληνικά', flag: '🇬🇷', native: 'Ελληνικά' },
    { code: 'hi', name: 'हिन्दी', flag: '🇮🇳', native: 'हिन्दी' }
];

function googleTranslateElementInit() {
    new google.translate.TranslateElement({
        pageLanguage: 'fr',
        includedLanguages: languages.map(l => l.code).join(','),
        layout: google.translate.TranslateElement.InlineLayout.SIMPLE
    }, 'google_translate_element');
    
    setTimeout(function() {
        var googleWidget = document.querySelector('.goog-te-gadget');
        if (googleWidget) googleWidget.style.display = 'none';
    }, 500);
}

function showTranslationModal() {
    var modal = document.getElementById('translationModal');
    var optionsContainer = document.getElementById('translationOptions');
    var currentLang = localStorage.getItem('preferredLanguage') || 'fr';
    
    var html = '';
    languages.forEach(function(lang) {
        var isActive = (currentLang === lang.code);
        var activeClass = isActive ? 'active' : '';
        html += `
            <div class=\"translation-option \${activeClass}\" onclick=\"translatePage('\${lang.code}')\" data-lang=\"\${lang.code}\">
                <div class=\"translation-option-icon\">\${lang.flag}</div>
                <div class=\"translation-option-info\">
                    <div class=\"translation-option-title\">\${lang.name}</div>
                    <div class=\"translation-option-desc\">\${lang.native}</div>
                </div>
            </div>
        `;
    });
    optionsContainer.innerHTML = html;
    modal.style.display = 'flex';
}

function closeTranslationModal() {
    document.getElementById('translationModal').style.display = 'none';
}

function translatePage(langCode) {
    localStorage.setItem('preferredLanguage', langCode);
    var selectFrame = document.querySelector('.goog-te-combo');
    if (selectFrame) {
        selectFrame.value = langCode;
        selectFrame.dispatchEvent(new Event('change'));
        showToast('🌐 Traduction en cours vers ' + getLanguageName(langCode), '#6c5ce7');
    } else {
        document.cookie = \"googtrans=/fr/\" + langCode + \"; path=/\";
        window.location.reload();
    }
    closeTranslationModal();
}

function getLanguageName(langCode) {
    var lang = languages.find(l => l.code === langCode);
    return lang ? lang.name : langCode;
}

function resetTranslation() {
    var selectFrame = document.querySelector('.goog-te-combo');
    if (selectFrame) {
        selectFrame.value = 'fr';
        selectFrame.dispatchEvent(new Event('change'));
    } else {
        document.cookie = \"googtrans=/fr/fr; path=/\";
        window.location.reload();
    }
    localStorage.setItem('preferredLanguage', 'fr');
    showToast('🌐 Page réinitialisée en français', '#4CAF50');
    closeTranslationModal();
}

function loadSavedLanguage() {
    var savedLang = localStorage.getItem('preferredLanguage');
    if (savedLang && savedLang !== 'fr') {
        var checkInterval = setInterval(function() {
            var selectFrame = document.querySelector('.goog-te-combo');
            if (selectFrame) {
                clearInterval(checkInterval);
                selectFrame.value = savedLang;
                selectFrame.dispatchEvent(new Event('change'));
            }
        }, 500);
        setTimeout(function() { clearInterval(checkInterval); }, 5000);
    }
}

// ========== COLOR BLINDNESS FUNCTIONS ==========
function showColorBlindOptions() {
    var modal = document.getElementById('colorblindModal');
    modal.style.display = 'flex';
    var currentMode = localStorage.getItem('colorBlindMode') || 'normal';
    document.querySelectorAll('.colorblind-option').forEach(function(opt) {
        opt.classList.remove('active');
    });
    var activeOpt = document.getElementById('opt-' + currentMode);
    if (activeOpt) activeOpt.classList.add('active');
}

function closeColorBlindModal() {
    document.getElementById('colorblindModal').style.display = 'none';
}

function setColorBlindMode(mode) {
    var body = document.body;
    body.classList.remove('normal-vision', 'protanopia', 'deuteranopia', 'tritanopia', 'achromatopsia', 'high-contrast');
    if (mode !== 'normal') body.classList.add(mode);
    localStorage.setItem('colorBlindMode', mode);
    showToast('🎨 Mode ' + getModeName(mode) + ' activé', '#4CAF50');
}

function resetColorBlindMode() {
    var body = document.body;
    body.classList.remove('protanopia', 'deuteranopia', 'tritanopia', 'achromatopsia', 'high-contrast');
    localStorage.setItem('colorBlindMode', 'normal');
    showToast('🎨 Mode réinitialisé à la vision normale', '#285921');
    closeColorBlindModal();
}

function getModeName(mode) {
    var names = {
        'normal': 'Vision Normale',
        'protanopia': 'Protanopie',
        'deuteranopia': 'Deutéranopie',
        'tritanopia': 'Tritanopie',
        'achromatopsia': 'Noir et Blanc',
        'high-contrast': 'Contraste Élevé'
    };
    return names[mode] || mode;
}

document.addEventListener('DOMContentLoaded', function() {
    var savedMode = localStorage.getItem('colorBlindMode');
    if (savedMode && savedMode !== 'normal') setColorBlindMode(savedMode);
    loadSavedLanguage();
});

document.getElementById('colorblindModal').addEventListener('click', function(e) {
    if (e.target === this) closeColorBlindModal();
});
document.getElementById('translationModal').addEventListener('click', function(e) {
    if (e.target === this) closeTranslationModal();
});

// ========== SPEECH SYNTHESIS FUNCTION ==========
function speakEventDetails(eventId) {
    var card = document.querySelector('.event-card[data-id=\"' + eventId + '\"]');
    if (!card) return;
    var speechData = card.querySelector('.event-speech-data');
    if (!speechData) return;
    
    var title = speechData.dataset.title || \"Événement sans titre\";
    var date = speechData.dataset.date || \"Date non spécifiée\";
    var location = speechData.dataset.location || \"Lieu non spécifié\";
    var participants = speechData.dataset.participants || \"0 participants\";
    var plansCount = speechData.dataset.plansCount || \"0\";
    var plans = speechData.dataset.plans || \"\";
    
    var textToSpeak = title + \". Date : \" + date + \". Lieu : \" + location + \". Inscriptions : \" + participants + \" participants. \";
    if (parseInt(plansCount) > 0) textToSpeak += \"Au programme : \" + plans + \". \";
    textToSpeak += \"Rejoignez-nous pour cet atelier bien-être !\";
    
    if (window.speechSynthesis) window.speechSynthesis.cancel();
    if (activeMicButton) activeMicButton.classList.remove('playing');
    
    var micButton = card.querySelector('.btn-mic');
    if (micButton) {
        activeMicButton = micButton;
        micButton.classList.add('playing');
    }
    
    var utterance = new SpeechSynthesisUtterance(textToSpeak);
    utterance.lang = 'fr-FR';
    utterance.rate = 0.9;
    utterance.pitch = 1.0;
    utterance.volume = 1;
    
    utterance.onend = function() {
        if (activeMicButton) activeMicButton.classList.remove('playing');
        activeMicButton = null;
    };
    utterance.onerror = function() {
        if (activeMicButton) activeMicButton.classList.remove('playing');
        activeMicButton = null;
        showToast('❌ La synthèse vocale n\\'est pas disponible', '#b22222');
    };
    window.speechSynthesis.speak(utterance);
    currentSpeech = utterance;
    showToast('🔊 Lecture des détails de l\\'événement...', '#285921');
}

// ========== Search ==========
document.getElementById('searchInput').addEventListener('input', function() {
    filterCards(this.value.toLowerCase().trim());
});

function filterCards(q) {
    var cards = document.querySelectorAll('.event-card');
    var visible = 0;
    cards.forEach(function(c) {
        var title = c.dataset.title || '';
        var show = !q || title.includes(q);
        if (showingFav && !likedIds.has(parseInt(c.dataset.id))) show = false;
        c.style.display = show ? '' : 'none';
        if (show) visible++;
    });
    document.getElementById('eventCount').textContent = '🎯 ' + visible + ' événement' + (visible !== 1 ? 's' : '');
}

// ========== Sort ==========
function toggleSort() {
    document.getElementById('sortMenu').classList.toggle('open');
}
document.addEventListener('click', function(e) {
    if (!e.target.closest('.sort-wrap')) {
        document.getElementById('sortMenu').classList.remove('open');
    }
});

function sortEvents(by) {
    document.getElementById('sortMenu').classList.remove('open');
    var container = document.getElementById('eventsContainer');
    var cards = Array.from(container.querySelectorAll('.event-card'));

    cards.sort(function(a, b) {
        if (by === 'title') return (a.dataset.title || '').localeCompare(b.dataset.title || '', 'fr');
        if (by === 'date') return (a.dataset.date || '').localeCompare(b.dataset.date || '');
        if (by === 'plans') return parseInt(b.dataset.plans || 0) - parseInt(a.dataset.plans || 0);
        return 0;
    });

    cards.forEach(function(c) { container.appendChild(c); });
}

// ========== Favourites ==========
function toggleFav() {
    showingFav = !showingFav;
    var btn = document.getElementById('favBtn');
    btn.textContent = showingFav ? '🌟 Tous' : '💛 Mes Favoris';
    btn.classList.toggle('active', showingFav);
    filterCards(document.getElementById('searchInput').value.toLowerCase().trim());
}

function toggleHeart(id, btn) {
    if (likedIds.has(id)) {
        likedIds.delete(id);
        btn.textContent = '🤍';
    } else {
        likedIds.add(id);
        btn.textContent = '💛';
    }
    if (showingFav) filterCards(document.getElementById('searchInput').value.toLowerCase().trim());
}

// ========== Participate ==========
function participate(id, btn) {
    btn.disabled = true;
    btn.textContent = '⏳...';
    btn.style.background = '#b22222';

    fetch('/events/' + id + '/participate', { method: 'POST' })
        .then(function(r) { return r.json(); })
        .then(function(data) {
            if (data.success) {
                btn.textContent = '✅ Inscrit !';
                btn.style.background = '#4CAF50';
                showToast('✅ ' + data.message, '#285921');
                setTimeout(function() { location.reload(); }, 1500);
            } else {
                btn.textContent = '🎯 S\\'inscrire';
                btn.style.background = '#285921';
                btn.disabled = false;
                showToast('⚠️ ' + data.message, '#b22222');
            }
        })
        .catch(function() {
            btn.textContent = '🎯 S\\'inscrire';
            btn.style.background = '#285921';
            btn.disabled = false;
            showToast('❌ Erreur réseau', '#b22222');
        });
}

// ========== QR Code ==========
function showQR(id) {
    var modal = document.getElementById('qrModal');
    modal.style.display = 'flex';
    document.getElementById('qrSpinner').style.display = 'block';
    document.getElementById('qrImage').style.display = 'none';
    document.getElementById('qrUrl').value = '';
    document.getElementById('qrEventName').textContent = '';
    document.getElementById('qrLocation').textContent = '';

    fetch('/events/' + id + '/qrcode')
        .then(function(r) { return r.json(); })
        .then(function(d) {
            document.getElementById('qrEventName').textContent = d.title;
            document.getElementById('qrLocation').textContent  = d.location;
            document.getElementById('qrUrl').value             = d.mapsUrl;

            // Generate QR client-side using qrcode.js
            var container = document.getElementById('qrImage');
            container.innerHTML = '';
            container.style.display = 'block';
            new QRCode(container, {
                text:          d.mapsUrl,
                width:         220,
                height:        220,
                colorDark:     '#285921',
                colorLight:    '#ffffff',
                correctLevel:  QRCode.CorrectLevel.H
            });
            document.getElementById('qrSpinner').style.display = 'none';
        })
        .catch(function() {
            document.getElementById('qrSpinner').textContent = '❌ Erreur de chargement';
        });
}

function closeQR() {
    document.getElementById('qrModal').style.display = 'none';
}

function copyQrUrl() {
    var url = document.getElementById('qrUrl').value;
    navigator.clipboard.writeText(url).then(function() {
        showToast('📋 Lien copié !', '#285921');
    });
}

document.getElementById('qrModal').addEventListener('click', function(e) {
    if (e.target === this) closeQR();
});

function showToast(msg, color) {
    var t = document.getElementById('toast');
    t.textContent = msg;
    t.style.background = color || '#285921';
    t.style.display = 'block';
    setTimeout(function() { t.style.display = 'none'; }, 3000);
}

var savedLikes = localStorage.getItem('likedEvents');
if (savedLikes) {
    likedIds = new Set(JSON.parse(savedLikes));
    likedIds.forEach(function(id) {
        var btn = document.getElementById('heart-' + id);
        if (btn) btn.textContent = '💛';
    });
}

function saveFavoritesToLocalStorage() {
    localStorage.setItem('likedEvents', JSON.stringify([...likedIds]));
}

var originalToggleHeart = toggleHeart;
toggleHeart = function(id, btn) {
    originalToggleHeart(id, btn);
    saveFavoritesToLocalStorage();
};

if (!window.speechSynthesis) {
    document.querySelectorAll('.btn-mic').forEach(function(btn) {
        btn.style.opacity = '0.5';
        btn.title = 'Synthèse vocale non disponible';
    });
}

// ========== PAGINATION FUNCTIONS ==========
function changePerPage(limit) {
    var url = new URL(window.location.href);
    url.searchParams.set('limit', limit);
    url.searchParams.set('page', 1);
    window.location.href = url.toString();
}

// Smooth scroll to top when changing page
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.pagination a').forEach(function(link) {
        link.addEventListener('click', function(e) {
            if (!this.parentElement.classList.contains('disabled') && this.getAttribute('href') !== '#') {
                setTimeout(function() {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                }, 100);
            }
        });
    });
});

// Keyboard navigation for pagination
document.addEventListener('keydown', function(e) {
    var pagination = document.querySelector('.pagination');
    if (!pagination) return;
    
    var nextLink = pagination.querySelector('li:last-child a');
    var prevLink = pagination.querySelector('li:first-child a');
    
    if (e.key === 'ArrowRight' && nextLink && !nextLink.parentElement.classList.contains('disabled')) {
        window.location.href = nextLink.href;
    } else if (e.key === 'ArrowLeft' && prevLink && !prevLink.parentElement.classList.contains('disabled')) {
        window.location.href = prevLink.href;
    }
});
</script>
<script src=\"https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit\"></script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "home/events/index.html.twig";
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
        return array (  2326 => 1742,  2313 => 1741,  2301 => 2332,  2299 => 1741,  2169 => 1613,  2160 => 1609,  2153 => 1607,  2148 => 1604,  2144 => 1602,  2138 => 1600,  2135 => 1599,  2132 => 1597,  2124 => 1595,  2120 => 1593,  2117 => 1592,  2114 => 1591,  2111 => 1589,  2105 => 1588,  2097 => 1586,  2091 => 1584,  2088 => 1583,  2083 => 1582,  2080 => 1580,  2077 => 1579,  2073 => 1577,  2071 => 1576,  2066 => 1575,  2063 => 1574,  2060 => 1572,  2056 => 1570,  2050 => 1568,  2047 => 1567,  2039 => 1561,  2035 => 1560,  2031 => 1559,  2027 => 1558,  2023 => 1557,  2017 => 1553,  2015 => 1552,  2010 => 1549,  2007 => 1548,  1998 => 1544,  1994 => 1542,  1988 => 1539,  1985 => 1538,  1982 => 1537,  1974 => 1534,  1968 => 1532,  1965 => 1531,  1956 => 1529,  1954 => 1528,  1949 => 1526,  1946 => 1525,  1942 => 1524,  1934 => 1518,  1932 => 1517,  1892 => 1514,  1888 => 1513,  1882 => 1512,  1878 => 1511,  1874 => 1510,  1870 => 1509,  1863 => 1505,  1859 => 1504,  1855 => 1502,  1849 => 1499,  1846 => 1498,  1844 => 1497,  1835 => 1491,  1829 => 1488,  1823 => 1485,  1817 => 1482,  1811 => 1479,  1805 => 1476,  1801 => 1475,  1795 => 1472,  1780 => 1460,  1775 => 1458,  1771 => 1456,  1764 => 1452,  1761 => 1451,  1757 => 1449,  1755 => 1448,  1752 => 1447,  1750 => 1446,  1747 => 1445,  1745 => 1444,  1742 => 1443,  1740 => 1442,  1735 => 1439,  1729 => 1437,  1727 => 1436,  1721 => 1435,  1715 => 1434,  1712 => 1433,  1695 => 1431,  1691 => 1430,  1687 => 1429,  1679 => 1423,  1673 => 1422,  1667 => 1421,  1657 => 1420,  1652 => 1417,  1645 => 1413,  1640 => 1410,  1638 => 1409,  1635 => 1408,  1629 => 1405,  1625 => 1403,  1623 => 1402,  1619 => 1400,  1616 => 1399,  1605 => 1391,  1598 => 1390,  1595 => 1389,  1589 => 1385,  1587 => 1384,  1582 => 1381,  1580 => 1380,  1575 => 1377,  1572 => 1376,  1570 => 1375,  1565 => 1372,  1561 => 1370,  1557 => 1368,  1555 => 1367,  1552 => 1366,  1550 => 1365,  1547 => 1364,  1545 => 1363,  1541 => 1362,  1536 => 1359,  1530 => 1355,  1528 => 1354,  1525 => 1353,  1519 => 1351,  1517 => 1350,  1512 => 1349,  1508 => 1348,  1502 => 1344,  1496 => 1341,  1492 => 1340,  1489 => 1339,  1487 => 1338,  1484 => 1337,  1480 => 1335,  1471 => 1332,  1469 => 1331,  1463 => 1328,  1459 => 1327,  1455 => 1326,  1451 => 1325,  1447 => 1323,  1444 => 1322,  1441 => 1321,  1438 => 1320,  1435 => 1319,  1432 => 1318,  1429 => 1317,  1424 => 1316,  1416 => 1310,  1414 => 1309,  1404 => 1304,  1399 => 1302,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Événements & Ateliers - NAFSEYTI{% endblock %}

{% block body %}
<style>
    :root {
        --sidebar-bg: #ece6df;
        --green-main: #285921;
        --green-dark: #2e6a28;
        --green-light: #7ec8a3;
        --beige: #c9b99b;
        --sidebar-text: #69685c;
        --page-bg: linear-gradient(to bottom right, #f5f1ed 0%, #e8efe8 50%, #f0ede5 100%);
        --card-bg: #ffffff;
        --radius: 24px;
    }

    * { box-sizing: border-box; }
    body { background: #f5f1ed; font-family: 'DM Sans', sans-serif; }

    /* Hide Google Translate banner but keep functionality */
    .goog-te-banner-frame.skiptranslate {
        display: none !important;
    }
    body {
        top: 0px !important;
    }
    .goog-te-gadget {
        display: none !important;
    }
    .goog-te-gadget-simple {
        display: none !important;
    }
    /* IMPORTANT: Don't hide the translate element - just make it invisible but functional */
    #google_translate_element {
        position: fixed;
        bottom: 0;
        right: 0;
        width: 1px;
        height: 1px;
        opacity: 0;
        pointer-events: none;
        z-index: -1;
    }

    .layout { display: flex; min-height: 100vh; }

    /* ── MAIN ── */
    .main { flex:1; overflow-y:auto; padding:30px; background:var(--page-bg); }

    /* Header */
    .page-header { display:flex; align-items:center; gap:15px; margin-bottom:25px; }
    .header-icon {
        width:40px; height:40px; border-radius:50%;
        background:var(--green-main); display:flex; align-items:center; justify-content:center;
        font-size:22px; color:white;
        box-shadow:0 4px 12px rgba(40,89,33,.3);
    }
    .header-title { font-size:30px; font-weight:bold; color:var(--green-main); margin:0; }
    .header-sub { font-size:14px; color:#5a6c5a; font-style:italic; margin:4px 0 0; }

    /* Search/sort bar */
    .search-bar {
        display:flex; align-items:center; gap:15px; flex-wrap:wrap;
        background:rgba(255,255,255,.95);
        border:1.5px solid rgba(40,89,33,.25);
        border-radius:20px; padding:15px 20px; margin-bottom:30px;
        box-shadow:0 4px 12px rgba(40,89,33,.12);
    }
    .search-input {
        flex:1; min-width:250px; padding:12px 16px;
        border:2px solid rgba(40,89,33,.3); border-radius:15px;
        font-size:14px; background:white; outline:none;
        transition:border-color .2s;
    }
    .search-input:focus { border-color:var(--green-main); }

    .btn-sort, .btn-fav {
        padding:12px 20px; border:none; border-radius:15px;
        font-size:14px; font-weight:bold; cursor:pointer; transition:all .2s;
    }
    .btn-sort { background:var(--green-light); color:#000; }
    .btn-sort:hover { background:#5fb88b; transform:translateY(-2px); }
    .btn-fav { background:var(--beige); color:#000; }
    .btn-fav:hover { background:#b8a888; transform:translateY(-2px); }
    .btn-fav.active { background:var(--green-light); }

    /* Translation Button */
    .btn-translate {
        padding:12px 20px;
        border:none;
        border-radius:15px;
        font-size:14px;
        font-weight:bold;
        cursor:pointer;
        transition:all .2s;
        background: #6c5ce7;
        color: white;
    }
    .btn-translate:hover {
        background: #5b4bc4;
        transform: translateY(-2px);
    }

    .btn-calendar {
        padding: 12px 20px;
        border: none;
        border-radius: 15px;
        font-size: 14px;
        font-weight: bold;
        cursor: pointer;
        transition: all .2s;
        background: var(--green-main);
        color: white;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
    }
    .btn-calendar:hover {
        background: var(--green-dark);
        transform: translateY(-2px);
        color: white;
    }

    .event-count {
        margin-left:auto; padding:10px 18px;
        background:rgba(40,89,33,.1); border:1.5px solid rgba(40,89,33,.3);
        border-radius:25px; font-size:13px; font-weight:bold; color:var(--green-main);
    }

    /* Sort dropdown */
    .sort-wrap { position:relative; }
    .sort-menu {
        display:none; position:absolute; top:110%; left:0; z-index:100;
        background:white; border:1px solid rgba(40,89,33,.2);
        border-radius:12px; box-shadow:0 8px 20px rgba(0,0,0,.12);
        min-width:200px; overflow:hidden;
    }
    .sort-menu.open { display:block; }
    .sort-menu a {
        display:block; padding:12px 18px; font-size:13px;
        color:#333; text-decoration:none; transition:background .15s;
    }
    .sort-menu a:hover { background:#f0f5f0; color:var(--green-main); }

    /* Translation Modal Styles */
    .translation-modal-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.85);
        z-index: 10001;
        justify-content: center;
        align-items: center;
    }
    .translation-modal-content {
        background: linear-gradient(145deg, #2a3a2a, #1e2e1e);
        border-radius: 32px;
        max-width: 500px;
        width: 90%;
        max-height: 80vh;
        overflow-y: auto;
        animation: slideUp 0.3s ease-out;
        box-shadow: 0 25px 50px -12px rgba(0,0,0,0.5);
        border: 2px solid rgba(76, 175, 80, 0.4);
    }
    .translation-modal-header {
        background: linear-gradient(135deg, #1a5c1a, #0d3d0d);
        color: white;
        padding: 20px 24px;
        border-radius: 32px 32px 0 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid rgba(76, 175, 80, 0.3);
        position: sticky;
        top: 0;
    }
    .translation-modal-header h3 {
        margin: 0;
        font-size: 1.3rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .translation-close {
        background: rgba(255,255,255,0.15);
        border: none;
        color: white;
        font-size: 24px;
        cursor: pointer;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s;
    }
    .translation-close:hover {
        background: rgba(255,255,255,0.3);
        transform: scale(1.05);
    }
    .translation-options {
        padding: 20px;
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    .translation-option {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 12px 20px;
        background: rgba(255,255,255,0.1);
        border-radius: 20px;
        cursor: pointer;
        transition: all 0.2s;
        border: 1px solid rgba(255,255,255,0.1);
    }
    .translation-option:hover {
        background: rgba(76, 175, 80, 0.3);
        transform: translateX(5px);
        border-color: rgba(76, 175, 80, 0.5);
    }
    .translation-option.active {
        background: rgba(76, 175, 80, 0.4);
        border-color: #4CAF50;
    }
    .translation-option-icon {
        font-size: 32px;
    }
    .translation-option-info {
        flex: 1;
    }
    .translation-option-title {
        font-size: 16px;
        font-weight: bold;
        color: white;
        margin-bottom: 4px;
    }
    .translation-option-desc {
        font-size: 11px;
        color: #a0c0a0;
    }
    .translation-reset {
        margin: 10px 20px 20px;
        padding: 12px;
        background: rgba(255,255,255,0.15);
        border: none;
        border-radius: 30px;
        color: white;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.2s;
        text-align: center;
    }
    .translation-reset:hover {
        background: rgba(76, 175, 80, 0.4);
    }

    @keyframes slideUp {
        from { transform: translateY(50px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }

    /* ========== COLOR BLINDNESS FILTERS ========== */
    body.normal-vision { filter: none; }
    body.protanopia { filter: url('#protanopia'); }
    body.deuteranopia { filter: url('#deuteranopia'); }
    body.tritanopia { filter: url('#tritanopia'); }
    body.achromatopsia { filter: grayscale(100%); }
    body.high-contrast { filter: contrast(150%) brightness(110%); }
    body.high-contrast .event-card {
        background: #000 !important;
        color: #fff !important;
        border: 2px solid #fff !important;
    }
    body.high-contrast .event-title,
    body.high-contrast .text,
    body.high-contrast .detail-row .text,
    body.high-contrast .plan-desc {
        color: #fff !important;
    }
    body.high-contrast .btn-participate {
        background: #fff !important;
        color: #000 !important;
    }

    /* ========== EVENT STATUS BADGE STYLES ========== */
    .event-status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 11px;
        font-weight: 600;
        margin-bottom: 8px;
    }
    .status-upcoming {
        background: rgba(74, 144, 226, 0.15);
        color: #4A90E2;
        border: 1px solid rgba(74, 144, 226, 0.3);
    }
    .status-ongoing {
        background: rgba(76, 175, 80, 0.15);
        color: #4CAF50;
        border: 1px solid rgba(76, 175, 80, 0.3);
        animation: pulse-status 2s infinite;
    }
    .status-completed {
        background: rgba(158, 158, 158, 0.15);
        color: #9E9E9E;
        border: 1px solid rgba(158, 158, 158, 0.3);
    }
    .status-cancelled {
        background: rgba(244, 67, 54, 0.15);
        color: #f44336;
        border: 1px solid rgba(244, 67, 54, 0.3);
    }
    @keyframes pulse-status {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.7; }
    }

    /* ========== AI RECOMMENDATION BADGE ========== */
    .badge-recommended {
        background: linear-gradient(135deg, #667eea, #764ba2);
        color: white;
        font-size: 9px;
        padding: 3px 10px;
        border-radius: 20px;
        font-weight: 600;
        letter-spacing: 0.3px;
        display: inline-flex;
        align-items: center;
        gap: 4px;
        box-shadow: 0 2px 8px rgba(102, 126, 234, 0.3);
        animation: glow 2s ease-in-out infinite;
    }
    @keyframes glow {
        0%, 100% { box-shadow: 0 2px 8px rgba(102, 126, 234, 0.3); }
        50% { box-shadow: 0 2px 15px rgba(102, 126, 234, 0.6); }
    }

    /* ========== COUNTDOWN TIMER STYLES ========== */
    .countdown-timer {
        background: linear-gradient(135deg, #f0ede5, #e8e0d4);
        border-radius: 40px;
        padding: 8px 15px;
        margin: 10px 0 8px;
        display: inline-flex;
        align-items: center;
        gap: 12px;
        font-size: 13px;
        font-weight: 600;
        color: var(--green-main);
        border: 1px solid rgba(40,89,33,.15);
        width: 100%;
        justify-content: center;
    }
    .countdown-timer span {
        background: white;
        padding: 3px 8px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 700;
        color: var(--green-main);
        min-width: 45px;
        display: inline-block;
        text-align: center;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }
    .countdown-timer .countdown-label {
        background: transparent;
        padding: 0;
        font-size: 11px;
        font-weight: 500;
        color: #8b9a8b;
        min-width: auto;
        box-shadow: none;
    }
    .countdown-timer.urgent {
        background: linear-gradient(135deg, #fff5f0, #ffe8e0);
        border-color: #ff9800;
        animation: pulse-urgent 1s ease-in-out infinite;
    }
    @keyframes pulse-urgent {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.85; background: linear-gradient(135deg, #ffe0d0, #ffd0c0); }
    }

    /* ========== SHARE BUTTON STYLES ========== */
    .btn-share {
        font-size: 18px;
        background: rgba(40,89,33,.08);
        border: none;
        cursor: pointer;
        padding: 6px 10px;
        border-radius: 30px;
        transition: all 0.2s;
        color: #25D366;
    }
    .btn-share:hover {
        background: #25D366;
        color: white;
        transform: scale(1.05);
    }
    .share-dropdown {
        position: relative;
        display: inline-block;
    }
    .share-menu {
        display: none;
        position: absolute;
        bottom: 45px;
        right: 0;
        background: white;
        border-radius: 16px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        min-width: 180px;
        z-index: 1000;
        overflow: hidden;
        border: 1px solid rgba(40,89,33,.15);
    }
    .share-menu a {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 16px;
        text-decoration: none;
        color: #333;
        font-size: 14px;
        transition: background 0.2s;
    }
    .share-menu a:hover {
        background: #f0f5f0;
    }
    .share-menu .wa { color: #25D366; }
    .share-menu .tg { color: #0088cc; }
    .share-menu .fb { color: #1877f2; }
    .share-menu .tw { color: #1da1f2; }
    .share-menu .mail { color: #ea4335; }

    /* ========== CUTE GRID EVENT CARDS ========== */
    #eventsContainer { 
        display: grid; 
        grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
        gap: 28px;
    }

    .event-card {
        background: white;
        border-radius: var(--radius);
        overflow: hidden;
        box-shadow: 0 8px 20px rgba(40,89,33,.1);
        transition: all 0.3s ease;
        display: flex;
        flex-direction: column;
        border: 1px solid rgba(40,89,33,.12);
    }
    .event-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 18px 32px -12px rgba(40,89,33,.25);
        border-color: rgba(40,89,33,.3);
    }

    .event-image {
        width: 100%;
        height: 200px;
        overflow: hidden;
        position: relative;
        background: #e8e0d4;
    }
    .event-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.4s ease;
    }
    .event-card:hover .event-image img {
        transform: scale(1.03);
    }

    .cal-box {
        position: absolute;
        top: 16px;
        left: 16px;
        background: rgba(0,0,0,0.75);
        backdrop-filter: blur(4px);
        border-radius: 14px;
        padding: 6px 12px;
        display: flex;
        flex-direction: column;
        align-items: center;
        min-width: 58px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        border: 1px solid rgba(255,255,255,0.2);
    }
    .cal-month {
        font-size: 10px;
        font-weight: 700;
        color: white;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .cal-day {
        font-size: 22px;
        font-weight: 800;
        color: white;
        line-height: 1.2;
        margin-top: 2px;
    }

    .event-info {
        padding: 20px 18px 22px;
        display: flex;
        flex-direction: column;
        gap: 12px;
    }

    .event-title-row {
        display: flex;
        align-items: center;
        gap: 10px;
        flex-wrap: wrap;
        margin-bottom: 4px;
    }
    .event-title {
        font-size: 1.35rem;
        font-weight: 700;
        color: var(--green-main);
        margin: 0;
        letter-spacing: -0.2px;
        line-height: 1.3;
    }

    .badge-new {
        font-size: 9px;
        font-weight: 700;
        color: white;
        background: #e67e22;
        border-radius: 30px;
        padding: 3px 10px;
        letter-spacing: 0.3px;
    }
    .badge-plans {
        font-size: 10px;
        font-weight: 600;
        color: white;
        background: var(--beige);
        border-radius: 30px;
        padding: 4px 12px;
    }

    .event-details {
        display: flex;
        flex-direction: column;
        gap: 8px;
        margin: 4px 0;
    }
    .detail-row {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
    }
    .detail-row .icon {
        font-size: 13px;
        width: 22px;
        color: var(--green-main);
    }
    .detail-row .text {
        color: #5a6c5a;
    }
    .detail-row .text.green { color: #2e7d32; font-weight: 600; }
    .detail-row .text.orange { color: #e67e22; font-weight: 600; }
    .detail-row .text.red { color: #c0392b; font-weight: 600; }

    /* ========== STAR RATING STYLES ========== */
    .rating-container {
        margin: 8px 0 4px;
    }
    .stars {
        display: inline-flex;
        gap: 4px;
        direction: ltr;
    }
    .star {
        font-size: 20px;
        cursor: pointer;
        color: #ddd;
        transition: all 0.2s ease;
        background: transparent;
        border: none;
        padding: 0;
    }
    .star:hover,
    .star:hover ~ .star {
        color: #ffc107 !important;
    }
    .star.active {
        color: #ffc107;
    }
    .star-rating-display {
        display: inline-flex;
        gap: 2px;
        margin-left: 8px;
    }
    .rating-average {
        font-size: 12px;
        color: #ffc107;
        margin-left: 8px;
        font-weight: bold;
    }
    .rating-count {
        font-size: 11px;
        color: #8b9a8b;
        margin-left: 5px;
    }
    .rating-text {
        font-size: 11px;
        color: #8b9a8b;
        margin-left: 8px;
    }
    .your-rating {
        font-size: 10px;
        color: #4CAF50;
        margin-left: 8px;
        font-weight: 500;
    }

    .action-row {
        display: flex;
        align-items: center;
        gap: 12px;
        flex-wrap: wrap;
        margin-top: 8px;
        border-top: 1px solid rgba(40,89,33,.1);
        padding-top: 14px;
    }

    .btn-participate {
        padding: 7px 20px;
        border: none;
        border-radius: 40px;
        font-size: 12px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
        background: var(--green-main);
        color: white;
        flex: 1;
    }
    .btn-participate:hover { 
        background: #3d7e33; 
        transform: translateY(-1px); 
    }
    .btn-participate:disabled { 
        background: #4CAF50; 
        cursor: default; 
        opacity: 0.8;
    }
    .btn-participate.full { 
        background: #b22222; 
        cursor: default; 
    }

    .btn-mic {
        font-size: 18px;
        background: rgba(40,89,33,.08);
        border: none;
        cursor: pointer;
        padding: 6px 10px;
        border-radius: 30px;
        transition: all 0.2s;
        color: var(--green-main);
    }
    .btn-mic:hover { 
        background: rgba(40,89,33,.2); 
        transform: scale(1.05);
    }
    .btn-mic.playing {
        background: #4CAF50;
        color: white;
        animation: pulse 1s infinite;
    }

    .btn-color-blind {
        font-size: 18px;
        background: rgba(40,89,33,.08);
        border: none;
        cursor: pointer;
        padding: 6px 10px;
        border-radius: 30px;
        transition: all 0.2s;
        color: var(--green-main);
    }
    .btn-color-blind:hover { 
        background: rgba(40,89,33,.2); 
        transform: scale(1.05);
    }
    .btn-color-blind.active {
        background: #4CAF50;
        color: white;
    }

    /* Share button styles */
    .btn-share {
        font-size: 18px;
        background: rgba(40,89,33,.08);
        border: none;
        cursor: pointer;
        padding: 6px 10px;
        border-radius: 30px;
        transition: all 0.2s;
        color: #25D366;
    }
    .btn-share:hover {
        background: #25D366;
        color: white;
        transform: scale(1.05);
    }
    .share-wrapper {
        position: relative;
        display: inline-block;
    }
    .share-dropdown {
        display: none;
        position: absolute;
        bottom: 45px;
        right: 0;
        background: white;
        border-radius: 16px;
        box-shadow: 0 8px 25px rgba(0,0,0,0.15);
        min-width: 200px;
        z-index: 1000;
        overflow: hidden;
        border: 1px solid rgba(40,89,33,.15);
    }
    .share-dropdown.show {
        display: block;
    }
    .share-dropdown a {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px 16px;
        text-decoration: none;
        color: #333;
        font-size: 13px;
        transition: background 0.2s;
        font-weight: 500;
    }
    .share-dropdown a:hover {
        background: #f0f5f0;
    }
    .share-dropdown .wa { color: #25D366; }
    .share-dropdown .tg { color: #0088cc; }
    .share-dropdown .fb { color: #1877f2; }
    .share-dropdown .tw { color: #1da1f2; }
    .share-dropdown .mail { color: #ea4335; }
    .share-dropdown .copy { color: #607d8b; }

    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.1); }
        100% { transform: scale(1); }
    }

    .btn-heart {
        font-size: 20px;
        background: transparent;
        border: none;
        cursor: pointer;
        padding: 4px 8px;
        transition: transform 0.2s;
        color: #d4af7a;
    }
    .btn-heart:hover { 
        transform: scale(1.15); 
        color: #e67e22; 
    }

    .btn-maps {
        font-size: 15px;
        background: rgba(40,89,33,.08);
        border: none;
        cursor: pointer;
        padding: 6px 12px;
        border-radius: 30px;
        transition: all 0.2s;
    }
    .btn-maps:hover { 
        background: rgba(40,89,33,.2); 
    }

    .plan-separator {
        height: 1px;
        background: linear-gradient(to right, transparent, rgba(40,89,33,.15), transparent);
        margin: 8px 0 4px;
    }
    .plan-title-row {
        display: flex;
        align-items: center;
        gap: 6px;
        margin: 4px 0 2px;
    }
    .plan-title {
        font-size: 12px;
        font-weight: 700;
        color: var(--green-main);
        margin: 0;
    }

    .plan-list {
        display: flex;
        flex-direction: column;
        gap: 8px;
        margin-top: 6px;
    }
    .plan-item {
        display: flex;
        align-items: center;
        gap: 12px;
        background: rgba(168,230,207,.08);
        border: 1px solid rgba(40,89,33,.1);
        border-radius: 14px;
        padding: 8px 12px;
    }
    .plan-num {
        min-width: 26px;
        max-width: 26px;
        height: 26px;
        border-radius: 50%;
        background: var(--green-main);
        color: white;
        font-size: 12px;
        font-weight: bold;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .plan-desc { 
        font-size: 11px; 
        color: #4a5b4a; 
        font-weight: 500; 
    }
    .plan-dur { 
        font-size: 9px; 
        color: #7a8c7a; 
        font-weight: 600; 
        margin-top: 2px; 
    }

    /* Color Blindness Modal Styles */
    .colorblind-modal-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,0.85);
        z-index: 10000;
        justify-content: center;
        align-items: center;
    }
    .colorblind-modal-content {
        background: linear-gradient(145deg, #2a3a2a, #1e2e1e);
        border-radius: 32px;
        max-width: 500px;
        width: 90%;
        animation: slideUp 0.3s ease-out;
        box-shadow: 0 25px 50px -12px rgba(0,0,0,0.5);
        border: 2px solid rgba(76, 175, 80, 0.4);
    }
    .colorblind-modal-header {
        background: linear-gradient(135deg, #1a5c1a, #0d3d0d);
        color: white;
        padding: 20px 24px;
        border-radius: 32px 32px 0 0;
        display: flex;
        justify-content: space-between;
        align-items: center;
        border-bottom: 1px solid rgba(76, 175, 80, 0.3);
    }
    .colorblind-modal-header h3 {
        margin: 0;
        font-size: 1.3rem;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .colorblind-close {
        background: rgba(255,255,255,0.15);
        border: none;
        color: white;
        font-size: 24px;
        cursor: pointer;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s;
    }
    .colorblind-close:hover {
        background: rgba(255,255,255,0.3);
        transform: scale(1.05);
    }
    .colorblind-options {
        padding: 20px;
        display: flex;
        flex-direction: column;
        gap: 12px;
    }
    .colorblind-option {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 15px 20px;
        background: rgba(255,255,255,0.1);
        border-radius: 20px;
        cursor: pointer;
        transition: all 0.2s;
        border: 1px solid rgba(255,255,255,0.1);
    }
    .colorblind-option:hover {
        background: rgba(76, 175, 80, 0.3);
        transform: translateX(5px);
        border-color: rgba(76, 175, 80, 0.5);
    }
    .colorblind-option.active {
        background: rgba(76, 175, 80, 0.4);
        border-color: #4CAF50;
    }
    .colorblind-option-icon {
        font-size: 32px;
    }
    .colorblind-option-info {
        flex: 1;
    }
    .colorblind-option-title {
        font-size: 16px;
        font-weight: bold;
        color: white;
        margin-bottom: 4px;
    }
    .colorblind-option-desc {
        font-size: 11px;
        color: #a0c0a0;
    }
    .colorblind-reset {
        margin: 10px 20px 20px;
        padding: 12px;
        background: rgba(255,255,255,0.15);
        border: none;
        border-radius: 30px;
        color: white;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.2s;
        text-align: center;
    }
    .colorblind-reset:hover {
        background: rgba(76, 175, 80, 0.4);
    }

    /* Empty state */
    .empty-state {
        text-align: center;
        padding: 60px 30px;
        background: rgba(255,255,255,.95);
        border: 2px solid rgba(40,89,33,.2);
        border-radius: 32px;
        grid-column: 1 / -1;
    }
    .empty-state .icon { font-size: 64px; margin-bottom: 12px; }
    .empty-state h3 { font-size: 22px; font-weight: bold; color: var(--green-main); }

    /* Toast */
    .speech-toast {
        position: fixed;
        bottom: 80px;
        left: 50%;
        transform: translateX(-50%);
        background: var(--green-main);
        color: white;
        padding: 10px 20px;
        border-radius: 40px;
        font-size: 13px;
        z-index: 10000;
        display: none;
        align-items: center;
        gap: 10px;
        box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        white-space: nowrap;
    }
    .speech-toast.show {
        display: flex;
        animation: fadeInUp 0.3s ease-out;
    }
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateX(-50%) translateY(20px); }
        to { opacity: 1; transform: translateX(-50%) translateY(0); }
    }
    #toast {
        position: fixed; bottom: 25px; right: 25px; z-index: 9999;
        padding: 12px 24px; border-radius: 40px;
        font-size: 13px; font-weight: 600; color: white;
        background: #285921; box-shadow: 0 4px 15px rgba(0,0,0,.2);
        display: none; animation: fadeInOut .3s ease;
    }
    @keyframes fadeInOut { from{opacity:0;transform:translateY(10px)} to{opacity:1;transform:translateY(0)} }

    /* Responsive */
    @media (max-width: 780px) {
        #eventsContainer { gap: 20px; }
        .event-image { height: 180px; }
        .event-info { padding: 16px; }
        .speech-toast { white-space: normal; text-align: center; width: 90%; }
        .countdown-timer { font-size: 11px; padding: 6px 12px; }
        .countdown-timer span { font-size: 12px; min-width: 38px; }
    }

    /* ========== CREATIVE PAGINATION STYLES ========== */
    .pagination-wrapper {
        margin-top: 50px;
        margin-bottom: 30px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        flex-wrap: wrap;
        gap: 20px;
        background: rgba(255,255,255,0.5);
        padding: 20px 25px;
        border-radius: 60px;
        backdrop-filter: blur(4px);
    }

    .pagination {
        display: flex;
        gap: 10px;
        flex-wrap: wrap;
        justify-content: center;
        list-style: none;
        padding: 0;
        margin: 0;
    }

    .pagination li {
        display: inline-block;
        perspective: 500px;
    }

    .pagination a {
        display: flex;
        align-items: center;
        justify-content: center;
        min-width: 44px;
        height: 44px;
        padding: 0 14px;
        background: white;
        border: 1.5px solid rgba(40, 89, 33, 0.2);
        border-radius: 50%;
        color: var(--green-main);
        font-size: 14px;
        font-weight: 600;
        text-decoration: none;
        transition: all 0.3s cubic-bezier(0.68, -0.55, 0.265, 1.55);
        cursor: pointer;
        position: relative;
        overflow: hidden;
    }

    .pagination a::before {
        content: '';
        position: absolute;
        top: 50%;
        left: 50%;
        width: 0;
        height: 0;
        background: radial-gradient(circle, rgba(40, 89, 33, 0.15), transparent);
        transform: translate(-50%, -50%);
        transition: width 0.4s, height 0.4s;
        border-radius: 50%;
    }

    .pagination a:hover::before {
        width: 120%;
        height: 120%;
    }

    .pagination a:hover {
        transform: translateY(-3px) scale(1.05);
        background: var(--green-light);
        border-color: var(--green-main);
        color: white;
        box-shadow: 0 6px 16px rgba(40, 89, 33, 0.25);
    }

    .pagination .active a {
        background: linear-gradient(135deg, var(--green-main), var(--green-dark));
        color: white;
        border-color: var(--green-main);
        transform: scale(1.08);
        box-shadow: 0 6px 20px rgba(40, 89, 33, 0.4);
    }

    .pagination .active a::after {
        content: '';
        position: absolute;
        top: -3px;
        left: -3px;
        right: -3px;
        bottom: -3px;
        background: linear-gradient(135deg, #ffd700, #ff9800);
        border-radius: 50%;
        z-index: -1;
        opacity: 0.5;
        animation: pulseGlow 2s infinite;
    }

    @keyframes pulseGlow {
        0%, 100% { opacity: 0.3; transform: scale(1); }
        50% { opacity: 0.8; transform: scale(1.05); }
    }

    .pagination .disabled a {
        opacity: 0.5;
        cursor: not-allowed;
        background: #f5f5f5;
        transform: none;
        pointer-events: none;
    }

    /* Page info */
    .page-info {
        text-align: center;
        background: white;
        padding: 10px 20px;
        border-radius: 40px;
        font-size: 13px;
        color: #8b9a8b;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .page-info strong {
        color: var(--green-main);
        font-weight: 800;
        font-size: 15px;
    }

    /* Items per page selector */
    .per-page-selector {
        display: flex;
        align-items: center;
        gap: 12px;
        background: white;
        padding: 5px 15px 5px 20px;
        border-radius: 40px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .per-page-selector label {
        font-size: 13px;
        color: #5a6c5a;
        font-weight: 500;
    }

    .per-page-selector select {
        padding: 8px 12px;
        border: 1.5px solid rgba(40, 89, 33, 0.3);
        border-radius: 30px;
        background: white;
        font-size: 13px;
        font-weight: 600;
        color: var(--green-main);
        cursor: pointer;
        transition: all 0.2s;
        outline: none;
    }

    .per-page-selector select:hover {
        border-color: var(--green-main);
        background: var(--green-light);
        color: white;
    }

    /* Responsive pagination */
    @media (max-width: 768px) {
        .pagination-wrapper {
            flex-direction: column;
            border-radius: 30px;
            padding: 15px;
        }
        
        .pagination a {
            min-width: 38px;
            height: 38px;
            font-size: 12px;
            padding: 0 10px;
        }
        
        .per-page-selector {
            width: 100%;
            justify-content: center;
        }
        
        .page-info {
            order: 2;
        }
    }

    /* Animation for page change */
    @keyframes pageTransition {
        from {
            opacity: 0;
            transform: translateY(20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .event-card {
        animation: pageTransition 0.4s ease-out;
    }
</style>

<!-- SVG Filters for Color Blindness Simulation -->
<svg style=\"position: absolute; width: 0; height: 0; visibility: hidden;\">
    <defs>
        <filter id=\"protanopia\" color-interpolation-filters=\"sRGB\">
            <feColorMatrix type=\"matrix\" values=\"
                0.567, 0.433, 0.000, 0, 0
                0.558, 0.442, 0.000, 0, 0
                0.000, 0.242, 0.758, 0, 0
                0, 0, 0, 1, 0\"/>
        </filter>
        <filter id=\"deuteranopia\" color-interpolation-filters=\"sRGB\">
            <feColorMatrix type=\"matrix\" values=\"
                0.625, 0.375, 0.000, 0, 0
                0.700, 0.300, 0.000, 0, 0
                0.000, 0.300, 0.700, 0, 0
                0, 0, 0, 1, 0\"/>
        </filter>
        <filter id=\"tritanopia\" color-interpolation-filters=\"sRGB\">
            <feColorMatrix type=\"matrix\" values=\"
                0.950, 0.050, 0.000, 0, 0
                0.000, 0.433, 0.567, 0, 0
                0.000, 0.475, 0.525, 0, 0
                0, 0, 0, 1, 0\"/>
        </filter>
    </defs>
</svg>

<!-- Google Translate Element (Keep visible but tiny for functionality) -->
<div id=\"google_translate_element\" style=\"position: fixed; bottom: 0; right: 0; width: 1px; height: 1px; opacity: 0; pointer-events: none; z-index: -1;\"></div>

<div class=\"layout\">
    <main class=\"main\">

        <!-- Header -->
        <div class=\"page-header\">
            <div class=\"header-icon\">Ψ</div>
            <div>
                <h1 class=\"header-title\">Événements & Ateliers</h1>
                <p class=\"header-sub\">🌱 Cultivez votre bien-être mental et épanouissement personnel</p>
            </div>
        </div>

        <!-- Search / Sort bar -->
        <div class=\"search-bar\">
            <input type=\"text\" id=\"searchInput\" class=\"search-input\"
                   placeholder=\"🔍  Recherchez votre atelier de bien-être...\">

            <div class=\"sort-wrap\">
                <button class=\"btn-sort\" id=\"sortBtn\" onclick=\"toggleSort()\">✨ Trier par</button>
                <div class=\"sort-menu\" id=\"sortMenu\">
                    <a href=\"#\" onclick=\"sortEvents('title'); return false;\">📚 Par Titre (A → Z)</a>
                    <a href=\"#\" onclick=\"sortEvents('date'); return false;\">📅 Par Date (Récent)</a>
                    <a href=\"#\" onclick=\"sortEvents('plans'); return false;\">🎯 Par Activités</a>
                </div>
            </div>

            <button class=\"btn-fav\" id=\"favBtn\" onclick=\"toggleFav()\">💛 Mes Favoris</button>
            
            <!-- 🌐 TRANSLATION BUTTON -->
            <button class=\"btn-translate\" id=\"translateBtn\" onclick=\"showTranslationModal()\">🌐 Traduire</button>

            <!-- 📅 CALENDAR BUTTON -->
            <a href=\"{{ path('client_events_calendar') }}\" class=\"btn-calendar\">📅 Calendrier</a>

            <span class=\"event-count\" id=\"eventCount\">🎯 {{ events|length }} événement{{ events|length != 1 ? 's' : '' }}</span>
        </div>

        <!-- Events list -->
        <div id=\"eventsContainer\">
            {% if events is empty %}
                <div class=\"empty-state\">
                    <div class=\"icon\">🌸</div>
                    <h3>Aucun événement disponible</h3>
                    <p>🌱 Revenez bientôt pour découvrir nos prochains ateliers</p>
                </div>
            {% else %}
                {% for event in events %}
                {% set ratio = event.maxParticipants > 0 ? event.currentParticipants / event.maxParticipants : 0 %}
                {% set isNew = event.createdAt and date().diff(event.createdAt).days <= 7 %}
                {% set isFull = event.currentParticipants >= event.maxParticipants %}
                {% set plansCount = event.planifications|length %}
                {% set avgRating = event.avgRating ?? 0 %}
                {% set userRating = event.userRating ?? 0 %}

                <div class=\"event-card\"
                     data-id=\"{{ event.id }}\"
                     data-title=\"{{ event.title|lower }}\"
                     data-date=\"{{ event.eventDate ? event.eventDate|date('Y-m-d') : '' }}\"
                     data-plans=\"{{ plansCount }}\">

                    <div class=\"event-image\">
                        {% if event.link %}
                            <img src=\"{{ event.link }}\" alt=\"{{ event.title }}\"
                                 onerror=\"this.src='https://placehold.co/400x200/e8e0d4/5a6c5a?text=Atelier+NAFSEYTI'\">
                        {% else %}
                            <img src=\"https://placehold.co/400x200/e8e0d4/5a6c5a?text=Atelier+Bien-%C3%AAtre\" alt=\"Image par défaut\">
                        {% endif %}
                        
                        {% if event.eventDate %}
                        <div class=\"cal-box\">
                            <div class=\"cal-month\">{{ event.eventDate|date('M')|upper }}</div>
                            <div class=\"cal-day\">{{ event.eventDate|date('d') }}</div>
                        </div>
                        {% endif %}
                    </div>

                    <div class=\"event-info\">
                        <div class=\"event-title-row\">
                            {% if isNew %}<span class=\"badge-new\">NOUVEAU</span>{% endif %}
                            <h2 class=\"event-title\">{{ event.title }}</h2>
                            {% if plansCount > 0 %}
                                <span class=\"badge-plans\">🎯 {{ plansCount }}</span>
                            {% endif %}
                            <!-- ✨ AI RECOMMENDATION BADGE -->
                            {% if event.isRecommended %}
                                <span class=\"badge-recommended\">
                                    ✨ Recommandé pour vous
                                </span>
                            {% endif %}
                        </div>

                        <!-- ========== EVENT STATUS BADGE ========== -->
                        <div class=\"event-status-badge status-{{ event.status ?? 'upcoming' }}\">
                            {% if event.status == 'ongoing' %}
                                🟢 En cours
                            {% elseif event.status == 'completed' %}
                                ✅ Terminé
                            {% elseif event.status == 'cancelled' %}
                                ❌ Annulé
                            {% else %}
                                📅 À venir
                            {% endif %}
                        </div>

                        <!-- ========== COUNTDOWN TIMER ========== -->
                        {% if event.eventDate %}
                            {% if event.status == 'ongoing' %}
                                <div class=\"countdown-timer urgent\">
                                    🟢 Événement en cours ! Rejoignez-nous !
                                </div>
                            {% elseif event.status == 'completed' %}
                                <div class=\"countdown-timer\">
                                    ✅ Événement terminé
                                </div>
                            {% elseif event.status == 'cancelled' %}
                                <div class=\"countdown-timer\">
                                    ❌ Événement annulé
                                </div>
                            {% else %}
                                {% set daysLeft = (event.eventDate.timestamp - date().timestamp) / 86400 %}
                                <div class=\"countdown-timer {% if daysLeft <= 3 %}urgent{% endif %}\" 
                                     data-event-date=\"{{ event.eventDate|date('Y-m-d H:i:s') }}\">
                                    <span class=\"countdown-label\">⏰</span>
                                    <span class=\"days\">00</span><span class=\"countdown-label\">j</span>
                                    <span class=\"hours\">00</span><span class=\"countdown-label\">h</span>
                                    <span class=\"minutes\">00</span><span class=\"countdown-label\">m</span>
                                    <span class=\"seconds\">00</span><span class=\"countdown-label\">s</span>
                                </div>
                            {% endif %}
                        {% endif %}

                        <div class=\"event-details\">
                            {% if event.location %}
                            <div class=\"detail-row\">
                                <span class=\"icon\">📍</span>
                                <span class=\"text\">{{ event.location }}</span>
                            </div>
                            {% endif %}

                            {% if event.createdAt %}
                            <div class=\"detail-row\">
                                <span class=\"icon\">🕐</span>
                                <span class=\"text\" style=\"color:#95a5a6; font-style:italic;\">
                                    {{ event.createdAt|date('d/m/Y') }}
                                </span>
                            </div>
                            {% endif %}

                            <div class=\"detail-row\">
                                <span class=\"icon\">👥</span>
                                <span class=\"text {% if ratio >= 1 %}red{% elseif ratio >= 0.8 %}orange{% else %}green{% endif %}\">
                                    {{ event.currentParticipants }} / {{ event.maxParticipants }} participants
                                    {% if isFull %} — Complet{% elseif ratio >= 0.8 %} — Presque complet{% endif %}
                                </span>
                            </div>
                        </div>

                        <!-- ========== 5-STAR RATING SYSTEM ========== -->
                        <div class=\"rating-container\">
                            <div class=\"stars\" data-event-id=\"{{ event.id }}\">
                                {% for i in 1..5 %}
                                    <button class=\"star {% if userRating >= i %}active{% endif %}\" data-value=\"{{ i }}\" onclick=\"rateEvent({{ event.id }}, {{ i }})\">★</button>
                                {% endfor %}
                            </div>
                            <span class=\"rating-average\" id=\"rating-avg-{{ event.id }}\">({{ avgRating }})</span>
                            <span class=\"rating-count\" id=\"rating-count-{{ event.id }}\">({{ event.ratingCount ?? 0 }} avis)</span>
                            {% if userRating > 0 %}
                                <span class=\"your-rating\">Votre note: {{ userRating }}★</span>
                            {% endif %}
                        </div>

                        <div class=\"action-row\">
                            {% if event.status == 'cancelled' %}
                                <button class=\"btn-participate full\" disabled>❌ Événement annulé</button>
                            {% elseif event.status == 'completed' %}
                                <button class=\"btn-participate full\" disabled>✅ Événement terminé</button>
                            {% elseif event.hasParticipated %}
                                <button class=\"btn-participate\" disabled>✅ Inscrit</button>
                            {% elseif isFull %}
                                <button class=\"btn-participate full\" disabled>Complet</button>
                            {% else %}
                                <button class=\"btn-participate\"
                                        onclick=\"participate({{ event.id }}, this)\">
                                    🎯 S'inscrire
                                </button>
                            {% endif %}

                            <button class=\"btn-mic\" 
                                    onclick=\"speakEventDetails({{ event.id }})\"
                                    title=\"Écouter les détails de l'événement\"
                                    data-event-id=\"{{ event.id }}\">
                                🎤
                            </button>

                            <button class=\"btn-color-blind\" 
                                    onclick=\"showColorBlindOptions()\"
                                    title=\"Options pour daltoniens (amélioration des couleurs)\">
                                🎨
                            </button>

                            <!-- 📤 SHARE BUTTON with dropdown -->
                            <div class=\"share-wrapper\">
                                <button class=\"btn-share\" onclick=\"toggleShareMenu({{ event.id }})\" title=\"Partager l'événement\">
                                    📤
                                </button>
                                <div class=\"share-dropdown\" id=\"share-menu-{{ event.id }}\">
                                    <a href=\"#\" onclick=\"shareEvent('{{ event.id }}', 'whatsapp'); return false;\" class=\"wa\">
                                        <span>💚</span> WhatsApp
                                    </a>
                                    <a href=\"#\" onclick=\"shareEvent('{{ event.id }}', 'telegram'); return false;\" class=\"tg\">
                                        <span>✈️</span> Telegram
                                    </a>
                                    <a href=\"#\" onclick=\"shareEvent('{{ event.id }}', 'facebook'); return false;\" class=\"fb\">
                                        <span>📘</span> Facebook
                                    </a>
                                    <a href=\"#\" onclick=\"shareEvent('{{ event.id }}', 'twitter'); return false;\" class=\"tw\">
                                        <span>🐦</span> Twitter/X
                                    </a>
                                    <a href=\"#\" onclick=\"shareEvent('{{ event.id }}', 'email'); return false;\" class=\"mail\">
                                        <span>📧</span> Email
                                    </a>
                                    <a href=\"#\" onclick=\"copyEventLink('{{ event.id }}'); return false;\" class=\"copy\">
                                        <span>📋</span> Copier le lien
                                    </a>
                                </div>
                            </div>

                            {% if event.location %}
                            <button class=\"btn-maps\"
                                    onclick=\"showQR({{ event.id }})\"
                                    title=\"Voir localisation\">📍</button>
                            {% endif %}

                            <button class=\"btn-heart\"
                                    id=\"heart-{{ event.id }}\"
                                    onclick=\"toggleHeart({{ event.id }}, this)\">🤍</button>
                        </div>

                        <div style=\"display: none;\" class=\"event-speech-data\" 
                             data-title=\"{{ event.title }}\"
                             data-date=\"{{ event.eventDate ? event.eventDate|date('d/m/Y') : 'Date non spécifiée' }}\"
                             data-location=\"{{ event.location ?: 'Lieu non spécifié' }}\"
                             data-participants=\"{{ event.currentParticipants }}/{{ event.maxParticipants }}\"
                             data-plans-count=\"{{ plansCount }}\"
                             data-plans=\"{% for plan in event.planifications %}{{ plan.description }} ({{ plan.duree }}){% if not loop.last %}, {% endif %}{% endfor %}\">
                        </div>

                        {% if plansCount > 0 %}
                        <div class=\"plan-separator\"></div>
                        <div class=\"plan-title-row\">
                            <span>🌱</span>
                            <h4 class=\"plan-title\">Programme</h4>
                        </div>
                        <div class=\"plan-list\">
                            {% for i, plan in event.planifications|slice(0, 2) %}
                            <div class=\"plan-item\">
                                <div class=\"plan-num\">{{ i + 1 }}</div>
                                <div>
                                    {% if plan.description %}
                                        <div class=\"plan-desc\">{{ plan.description|slice(0, 50) }}{% if plan.description|length > 50 %}...{% endif %}</div>
                                    {% endif %}
                                    {% if plan.duree %}
                                        <div class=\"plan-dur\">⏰ {{ plan.duree }}</div>
                                    {% endif %}
                                </div>
                            </div>
                            {% endfor %}
                            {% if plansCount > 2 %}
                            <div style=\"font-size: 10px; color: var(--green-main); text-align: center; margin-top: 4px;\">
                                + {{ plansCount - 2 }} autre(s) activité(s)
                            </div>
                            {% endif %}
                        </div>
                        {% endif %}

                    </div>
                </div>
                {% endfor %}
            {% endif %}
        </div>

        <!-- ========== CREATIVE PAGINATION ========== -->
        {% if events is not empty and totalPages > 1 %}
        <div class=\"pagination-wrapper\">
            <div class=\"per-page-selector\">
                <label>📄 Afficher :</label>
                <select id=\"perPageSelect\" onchange=\"changePerPage(this.value)\">
                    <option value=\"6\" {{ currentLimit == 6 ? 'selected' : '' }}>6 par page</option>
                    <option value=\"12\" {{ currentLimit == 12 ? 'selected' : '' }}>12 par page</option>
                    <option value=\"18\" {{ currentLimit == 18 ? 'selected' : '' }}>18 par page</option>
                    <option value=\"24\" {{ currentLimit == 24 ? 'selected' : '' }}>24 par page</option>
                    <option value=\"30\" {{ currentLimit == 30 ? 'selected' : '' }}>30 par page</option>
                </select>
            </div>
            
            <div class=\"pagination\">
                {# Previous page link #}
                {% if currentPage > 1 %}
                    <li><a href=\"{{ path('client_events_index', {page: currentPage - 1, limit: currentLimit}) }}\">←</a></li>
                {% else %}
                    <li class=\"disabled\"><a href=\"#\">←</a></li>
                {% endif %}
                
                {# First page #}
                {% if currentPage > 3 %}
                    <li><a href=\"{{ path('client_events_index', {page: 1, limit: currentLimit}) }}\">1</a></li>
                    {% if currentPage > 4 %}
                        <li class=\"disabled\"><a href=\"#\">...</a></li>
                    {% endif %}
                {% endif %}
                
                {# Page numbers around current page #}
                {% for p in range(max(1, currentPage - 2), min(totalPages, currentPage + 2)) %}
                    {% if p == currentPage %}
                        <li class=\"active\"><a href=\"#\">{{ p }}</a></li>
                    {% else %}
                        <li><a href=\"{{ path('client_events_index', {page: p, limit: currentLimit}) }}\">{{ p }}</a></li>
                    {% endif %}
                {% endfor %}
                
                {# Last page #}
                {% if currentPage < totalPages - 2 %}
                    {% if currentPage < totalPages - 3 %}
                        <li class=\"disabled\"><a href=\"#\">...</a></li>
                    {% endif %}
                    <li><a href=\"{{ path('client_events_index', {page: totalPages, limit: currentLimit}) }}\">{{ totalPages }}</a></li>
                {% endif %}
                
                {# Next page link #}
                {% if currentPage < totalPages %}
                    <li><a href=\"{{ path('client_events_index', {page: currentPage + 1, limit: currentLimit}) }}\">→</a></li>
                {% else %}
                    <li class=\"disabled\"><a href=\"#\">→</a></li>
                {% endif %}
            </div>
            
            <div class=\"page-info\">
                📖 Page <strong>{{ currentPage }}</strong> / <strong>{{ totalPages }}</strong>
                &nbsp;&nbsp;|&nbsp;&nbsp;
                🎯 <strong>{{ totalItems }}</strong> événement{{ totalItems > 1 ? 's' : '' }} au total
            </div>
        </div>
        {% endif %}

    </main>
</div>

<!-- Translation Modal -->
<div id=\"translationModal\" class=\"translation-modal-overlay\">
    <div class=\"translation-modal-content\">
        <div class=\"translation-modal-header\">
            <h3>
                <span>🌐</span>
                Traduire la page
            </h3>
            <button class=\"translation-close\" onclick=\"closeTranslationModal()\">&times;</button>
        </div>
        <div class=\"translation-options\" id=\"translationOptions\">
            <!-- Languages will be populated by JavaScript -->
        </div>
        <div class=\"translation-reset\" onclick=\"resetTranslation()\">
            🔄 Réinitialiser (Français)
        </div>
    </div>
</div>

<!-- Color Blindness Modal -->
<div id=\"colorblindModal\" class=\"colorblind-modal-overlay\">
    <div class=\"colorblind-modal-content\">
        <div class=\"colorblind-modal-header\">
            <h3>
                <span>🎨</span>
                Options pour Daltoniens
            </h3>
            <button class=\"colorblind-close\" onclick=\"closeColorBlindModal()\">&times;</button>
        </div>
        <div class=\"colorblind-options\">
            <div class=\"colorblind-option\" onclick=\"setColorBlindMode('normal')\" id=\"opt-normal\">
                <div class=\"colorblind-option-icon\">👁️</div>
                <div class=\"colorblind-option-info\">
                    <div class=\"colorblind-option-title\">Vision Normale</div>
                    <div class=\"colorblind-option-desc\">Couleurs standards</div>
                </div>
            </div>
            <div class=\"colorblind-option\" onclick=\"setColorBlindMode('protanopia')\" id=\"opt-protanopia\">
                <div class=\"colorblind-option-icon\">🔴</div>
                <div class=\"colorblind-option-info\">
                    <div class=\"colorblind-option-title\">Protanopie (Daltonien Rouge-Vert)</div>
                    <div class=\"colorblind-option-desc\">Difficulté à distinguer le rouge et le vert</div>
                </div>
            </div>
            <div class=\"colorblind-option\" onclick=\"setColorBlindMode('deuteranopia')\" id=\"opt-deuteranopia\">
                <div class=\"colorblind-option-icon\">🟢</div>
                <div class=\"colorblind-option-info\">
                    <div class=\"colorblind-option-title\">Deutéranopie (Daltonien Vert-Rouge)</div>
                    <div class=\"colorblind-option-desc\">Difficulté à distinguer le vert et le rouge</div>
                </div>
            </div>
            <div class=\"colorblind-option\" onclick=\"setColorBlindMode('tritanopia')\" id=\"opt-tritanopia\">
                <div class=\"colorblind-option-icon\">🔵</div>
                <div class=\"colorblind-option-info\">
                    <div class=\"colorblind-option-title\">Tritanopie (Daltonien Bleu-Jaune)</div>
                    <div class=\"colorblind-option-desc\">Difficulté à distinguer le bleu et le jaune</div>
                </div>
            </div>
            <div class=\"colorblind-option\" onclick=\"setColorBlindMode('achromatopsia')\" id=\"opt-achromatopsia\">
                <div class=\"colorblind-option-icon\">⚫</div>
                <div class=\"colorblind-option-info\">
                    <div class=\"colorblind-option-title\">Achromatopsie (Noir et Blanc)</div>
                    <div class=\"colorblind-option-desc\">Vision totalement en niveaux de gris</div>
                </div>
            </div>
            <div class=\"colorblind-option\" onclick=\"setColorBlindMode('high-contrast')\" id=\"opt-high-contrast\">
                <div class=\"colorblind-option-icon\">🌓</div>
                <div class=\"colorblind-option-info\">
                    <div class=\"colorblind-option-title\">Contraste Élevé</div>
                    <div class=\"colorblind-option-desc\">Pour les personnes ayant une basse vision</div>
                </div>
            </div>
        </div>
        <div class=\"colorblind-reset\" onclick=\"resetColorBlindMode()\">
            🔄 Réinitialiser les paramètres
        </div>
    </div>
</div>

<div id=\"toast\"></div>

<!-- QR Code Modal -->
<div id=\"qrModal\" style=\"display:none; position:fixed; inset:0; z-index:9998;
     background:rgba(0,0,0,.5); align-items:center; justify-content:center;\">
  <div style=\"background:#F5F1E6; border-radius:20px; padding:30px; max-width:420px; width:90%;
              box-shadow:0 10px 40px rgba(0,0,0,.3); text-align:center; position:relative;\">

    <button onclick=\"closeQR()\" style=\"position:absolute; top:15px; right:18px;
            background:none; border:none; font-size:22px; cursor:pointer; color:#888;\">✕</button>

    <h3 id=\"qrTitle\" style=\"font-size:20px; font-weight:bold; color:#285921; margin-bottom:6px;\">
        📍 Localisation de l'événement
    </h3>
    <p id=\"qrEventName\" style=\"font-size:16px; font-weight:bold; margin-bottom:4px;\"></p>
    <p id=\"qrLocation\" style=\"font-size:14px; color:#5a6c5a; margin-bottom:18px;\"></p>

    <div id=\"qrSpinner\" style=\"font-size:40px; margin:20px 0;\">⏳</div>
    <div id=\"qrImage\"
         style=\"display:none; width:220px; height:220px; margin:0 auto 15px; border-radius:10px;
                border:2px solid #d2e0cf; background:white; padding:8px;\"></div>

    <input id=\"qrUrl\" type=\"text\" readonly
           style=\"width:100%; padding:10px; border:1px solid #CFCBB3; border-radius:8px;
                  background:white; font-size:12px; margin-bottom:8px; text-align:center;\">

    <p style=\"font-size:12px; color:#8b9a8b; margin-bottom:18px;\">
        Scannez ce code QR pour ouvrir la localisation dans Google Maps
    </p>

    <div style=\"display:flex; gap:12px; justify-content:center;\">
      <button onclick=\"copyQrUrl()\"
              style=\"background:#374535; color:white; border:none; padding:10px 22px;
                     border-radius:8px; cursor:pointer; font-size:14px; font-weight:bold;\">
          📋 Copier le lien
      </button>
      <button onclick=\"closeQR()\"
              style=\"background:#b22222; color:white; border:none; padding:10px 22px;
                     border-radius:8px; cursor:pointer; font-size:14px; font-weight:bold;\">
          Fermer
      </button>
    </div>
  </div>
</div>

{% block javascripts %}
{{ parent() }}
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js\"></script>
<script>
var likedIds = new Set();
var showingFav = false;
var currentSpeech = null;
var activeMicButton = null;
var translationInterval = null;

// ========== SHARE FUNCTIONS ==========
function toggleShareMenu(eventId) {
    var menu = document.getElementById('share-menu-' + eventId);
    // Close all other share menus
    document.querySelectorAll('.share-dropdown').forEach(function(el) {
        if (el.id !== 'share-menu-' + eventId) {
            el.classList.remove('show');
        }
    });
    menu.classList.toggle('show');
}

// Close share menu when clicking outside
document.addEventListener('click', function(e) {
    if (!e.target.closest('.share-wrapper')) {
        document.querySelectorAll('.share-dropdown').forEach(function(el) {
            el.classList.remove('show');
        });
    }
});

function shareEvent(eventId, platform) {
    var card = document.querySelector('.event-card[data-id=\"' + eventId + '\"]');
    if (!card) return;
    
    var title = card.querySelector('.event-title')?.innerText || 'Événement NAFSEYTI';
    var url = window.location.href.split('?')[0] + '?event=' + eventId;
    var text = \"🌱 \" + title + \" - Rejoignez-moi à cet atelier bien-être sur NAFSEYTI !\";
    
    var shareUrls = {
        whatsapp: 'https://wa.me/?text=' + encodeURIComponent(text + ' ' + url),
        telegram: 'https://t.me/share/url?url=' + encodeURIComponent(url) + '&text=' + encodeURIComponent(text),
        facebook: 'https://www.facebook.com/sharer/sharer.php?u=' + encodeURIComponent(url),
        twitter: 'https://twitter.com/intent/tweet?text=' + encodeURIComponent(text) + '&url=' + encodeURIComponent(url),
        email: 'mailto:?subject=' + encodeURIComponent('Invitation: ' + title) + '&body=' + encodeURIComponent(text + '\\n\\n' + url)
    };
    
    if (shareUrls[platform]) {
        window.open(shareUrls[platform], '_blank');
        showToast('📤 Ouverture du partage vers ' + platform, '#25D366');
    }
    
    // Close the dropdown
    var menu = document.getElementById('share-menu-' + eventId);
    if (menu) menu.classList.remove('show');
}

function copyEventLink(eventId) {
    var url = window.location.href.split('?')[0] + '?event=' + eventId;
    navigator.clipboard.writeText(url).then(function() {
        showToast('📋 Lien copié dans le presse-papier !', '#4CAF50');
    }).catch(function() {
        showToast('❌ Impossible de copier le lien', '#b22222');
    });
    
    var menu = document.getElementById('share-menu-' + eventId);
    if (menu) menu.classList.remove('show');
}

// ========== COUNTDOWN TIMER FUNCTION ==========
function updateAllCountdowns() {
    document.querySelectorAll('.countdown-timer').forEach(function(el) {
        if (!el.dataset.eventDate) return;
        
        var eventDate = new Date(el.dataset.eventDate).getTime();
        var now = new Date().getTime();
        var diff = eventDate - now;
        
        if (diff < 0) {
            el.innerHTML = \"🎉 Événement en cours !\";
            el.classList.add('urgent');
            return;
        }
        
        var days = Math.floor(diff / (1000 * 60 * 60 * 24));
        var hours = Math.floor((diff % (86400000)) / 3600000);
        var minutes = Math.floor((diff % 3600000) / 60000);
        var seconds = Math.floor((diff % 60000) / 1000);
        
        var daysSpan = el.querySelector('.days');
        var hoursSpan = el.querySelector('.hours');
        var minutesSpan = el.querySelector('.minutes');
        var secondsSpan = el.querySelector('.seconds');
        
        if (daysSpan) daysSpan.textContent = days;
        if (hoursSpan) hoursSpan.textContent = hours.toString().padStart(2, '0');
        if (minutesSpan) minutesSpan.textContent = minutes.toString().padStart(2, '0');
        if (secondsSpan) secondsSpan.textContent = seconds.toString().padStart(2, '0');
        
        if (days < 3 && days >= 0) {
            el.classList.add('urgent');
        } else {
            el.classList.remove('urgent');
        }
    });
}

setInterval(updateAllCountdowns, 1000);
setTimeout(updateAllCountdowns, 100);

// ========== STAR RATING FUNCTIONS ==========
function rateEvent(eventId, rating) {
    fetch('/events/' + eventId + '/rate', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest'
        },
        body: JSON.stringify({ rating: rating })
    })
    .then(function(response) { return response.json(); })
    .then(function(data) {
        if (data.success) {
            var starsContainer = document.querySelector('.stars[data-event-id=\"' + eventId + '\"]');
            if (starsContainer) {
                var stars = starsContainer.querySelectorAll('.star');
                for (var i = 0; i < stars.length; i++) {
                    if (i < rating) {
                        stars[i].classList.add('active');
                    } else {
                        stars[i].classList.remove('active');
                    }
                }
            }
            
            var avgSpan = document.getElementById('rating-avg-' + eventId);
            if (avgSpan) avgSpan.textContent = '(' + data.averageRating + ')';
            
            var countSpan = document.getElementById('rating-count-' + eventId);
            if (countSpan) countSpan.textContent = '(' + data.ratingCount + ' avis)';
            
            var ratingContainer = starsContainer ? starsContainer.parentNode : null;
            if (ratingContainer) {
                var existingYourRating = ratingContainer.querySelector('.your-rating');
                if (existingYourRating) existingYourRating.remove();
                var yourRatingSpan = document.createElement('span');
                yourRatingSpan.className = 'your-rating';
                yourRatingSpan.textContent = 'Votre note: ' + rating + '★';
                ratingContainer.appendChild(yourRatingSpan);
            }
            
            showToast('⭐ Merci pour votre note de ' + rating + ' étoiles!', '#4CAF50');
        } else {
            showToast('⚠️ ' + (data.message || 'Erreur'), '#b22222');
        }
    })
    .catch(function(error) {
        console.error('Error:', error);
        showToast('❌ Erreur réseau', '#b22222');
    });
}

// ========== TRANSLATION FUNCTIONS ==========
const languages = [
    { code: 'fr', name: 'Français', flag: '🇫🇷', native: 'Français' },
    { code: 'en', name: 'English', flag: '🇬🇧', native: 'English' },
    { code: 'es', name: 'Español', flag: '🇪🇸', native: 'Español' },
    { code: 'de', name: 'Deutsch', flag: '🇩🇪', native: 'Deutsch' },
    { code: 'it', name: 'Italiano', flag: '🇮🇹', native: 'Italiano' },
    { code: 'pt', name: 'Português', flag: '🇵🇹', native: 'Português' },
    { code: 'nl', name: 'Nederlands', flag: '🇳🇱', native: 'Nederlands' },
    { code: 'ru', name: 'Русский', flag: '🇷🇺', native: 'Русский' },
    { code: 'ar', name: 'العربية', flag: '🇸🇦', native: 'العربية' },
    { code: 'zh-CN', name: '中文', flag: '🇨🇳', native: '中文' },
    { code: 'ja', name: '日本語', flag: '🇯🇵', native: '日本語' },
    { code: 'ko', name: '한국어', flag: '🇰🇷', native: '한국어' },
    { code: 'tr', name: 'Türkçe', flag: '🇹🇷', native: 'Türkçe' },
    { code: 'el', name: 'Ελληνικά', flag: '🇬🇷', native: 'Ελληνικά' },
    { code: 'hi', name: 'हिन्दी', flag: '🇮🇳', native: 'हिन्दी' }
];

function googleTranslateElementInit() {
    new google.translate.TranslateElement({
        pageLanguage: 'fr',
        includedLanguages: languages.map(l => l.code).join(','),
        layout: google.translate.TranslateElement.InlineLayout.SIMPLE
    }, 'google_translate_element');
    
    setTimeout(function() {
        var googleWidget = document.querySelector('.goog-te-gadget');
        if (googleWidget) googleWidget.style.display = 'none';
    }, 500);
}

function showTranslationModal() {
    var modal = document.getElementById('translationModal');
    var optionsContainer = document.getElementById('translationOptions');
    var currentLang = localStorage.getItem('preferredLanguage') || 'fr';
    
    var html = '';
    languages.forEach(function(lang) {
        var isActive = (currentLang === lang.code);
        var activeClass = isActive ? 'active' : '';
        html += `
            <div class=\"translation-option \${activeClass}\" onclick=\"translatePage('\${lang.code}')\" data-lang=\"\${lang.code}\">
                <div class=\"translation-option-icon\">\${lang.flag}</div>
                <div class=\"translation-option-info\">
                    <div class=\"translation-option-title\">\${lang.name}</div>
                    <div class=\"translation-option-desc\">\${lang.native}</div>
                </div>
            </div>
        `;
    });
    optionsContainer.innerHTML = html;
    modal.style.display = 'flex';
}

function closeTranslationModal() {
    document.getElementById('translationModal').style.display = 'none';
}

function translatePage(langCode) {
    localStorage.setItem('preferredLanguage', langCode);
    var selectFrame = document.querySelector('.goog-te-combo');
    if (selectFrame) {
        selectFrame.value = langCode;
        selectFrame.dispatchEvent(new Event('change'));
        showToast('🌐 Traduction en cours vers ' + getLanguageName(langCode), '#6c5ce7');
    } else {
        document.cookie = \"googtrans=/fr/\" + langCode + \"; path=/\";
        window.location.reload();
    }
    closeTranslationModal();
}

function getLanguageName(langCode) {
    var lang = languages.find(l => l.code === langCode);
    return lang ? lang.name : langCode;
}

function resetTranslation() {
    var selectFrame = document.querySelector('.goog-te-combo');
    if (selectFrame) {
        selectFrame.value = 'fr';
        selectFrame.dispatchEvent(new Event('change'));
    } else {
        document.cookie = \"googtrans=/fr/fr; path=/\";
        window.location.reload();
    }
    localStorage.setItem('preferredLanguage', 'fr');
    showToast('🌐 Page réinitialisée en français', '#4CAF50');
    closeTranslationModal();
}

function loadSavedLanguage() {
    var savedLang = localStorage.getItem('preferredLanguage');
    if (savedLang && savedLang !== 'fr') {
        var checkInterval = setInterval(function() {
            var selectFrame = document.querySelector('.goog-te-combo');
            if (selectFrame) {
                clearInterval(checkInterval);
                selectFrame.value = savedLang;
                selectFrame.dispatchEvent(new Event('change'));
            }
        }, 500);
        setTimeout(function() { clearInterval(checkInterval); }, 5000);
    }
}

// ========== COLOR BLINDNESS FUNCTIONS ==========
function showColorBlindOptions() {
    var modal = document.getElementById('colorblindModal');
    modal.style.display = 'flex';
    var currentMode = localStorage.getItem('colorBlindMode') || 'normal';
    document.querySelectorAll('.colorblind-option').forEach(function(opt) {
        opt.classList.remove('active');
    });
    var activeOpt = document.getElementById('opt-' + currentMode);
    if (activeOpt) activeOpt.classList.add('active');
}

function closeColorBlindModal() {
    document.getElementById('colorblindModal').style.display = 'none';
}

function setColorBlindMode(mode) {
    var body = document.body;
    body.classList.remove('normal-vision', 'protanopia', 'deuteranopia', 'tritanopia', 'achromatopsia', 'high-contrast');
    if (mode !== 'normal') body.classList.add(mode);
    localStorage.setItem('colorBlindMode', mode);
    showToast('🎨 Mode ' + getModeName(mode) + ' activé', '#4CAF50');
}

function resetColorBlindMode() {
    var body = document.body;
    body.classList.remove('protanopia', 'deuteranopia', 'tritanopia', 'achromatopsia', 'high-contrast');
    localStorage.setItem('colorBlindMode', 'normal');
    showToast('🎨 Mode réinitialisé à la vision normale', '#285921');
    closeColorBlindModal();
}

function getModeName(mode) {
    var names = {
        'normal': 'Vision Normale',
        'protanopia': 'Protanopie',
        'deuteranopia': 'Deutéranopie',
        'tritanopia': 'Tritanopie',
        'achromatopsia': 'Noir et Blanc',
        'high-contrast': 'Contraste Élevé'
    };
    return names[mode] || mode;
}

document.addEventListener('DOMContentLoaded', function() {
    var savedMode = localStorage.getItem('colorBlindMode');
    if (savedMode && savedMode !== 'normal') setColorBlindMode(savedMode);
    loadSavedLanguage();
});

document.getElementById('colorblindModal').addEventListener('click', function(e) {
    if (e.target === this) closeColorBlindModal();
});
document.getElementById('translationModal').addEventListener('click', function(e) {
    if (e.target === this) closeTranslationModal();
});

// ========== SPEECH SYNTHESIS FUNCTION ==========
function speakEventDetails(eventId) {
    var card = document.querySelector('.event-card[data-id=\"' + eventId + '\"]');
    if (!card) return;
    var speechData = card.querySelector('.event-speech-data');
    if (!speechData) return;
    
    var title = speechData.dataset.title || \"Événement sans titre\";
    var date = speechData.dataset.date || \"Date non spécifiée\";
    var location = speechData.dataset.location || \"Lieu non spécifié\";
    var participants = speechData.dataset.participants || \"0 participants\";
    var plansCount = speechData.dataset.plansCount || \"0\";
    var plans = speechData.dataset.plans || \"\";
    
    var textToSpeak = title + \". Date : \" + date + \". Lieu : \" + location + \". Inscriptions : \" + participants + \" participants. \";
    if (parseInt(plansCount) > 0) textToSpeak += \"Au programme : \" + plans + \". \";
    textToSpeak += \"Rejoignez-nous pour cet atelier bien-être !\";
    
    if (window.speechSynthesis) window.speechSynthesis.cancel();
    if (activeMicButton) activeMicButton.classList.remove('playing');
    
    var micButton = card.querySelector('.btn-mic');
    if (micButton) {
        activeMicButton = micButton;
        micButton.classList.add('playing');
    }
    
    var utterance = new SpeechSynthesisUtterance(textToSpeak);
    utterance.lang = 'fr-FR';
    utterance.rate = 0.9;
    utterance.pitch = 1.0;
    utterance.volume = 1;
    
    utterance.onend = function() {
        if (activeMicButton) activeMicButton.classList.remove('playing');
        activeMicButton = null;
    };
    utterance.onerror = function() {
        if (activeMicButton) activeMicButton.classList.remove('playing');
        activeMicButton = null;
        showToast('❌ La synthèse vocale n\\'est pas disponible', '#b22222');
    };
    window.speechSynthesis.speak(utterance);
    currentSpeech = utterance;
    showToast('🔊 Lecture des détails de l\\'événement...', '#285921');
}

// ========== Search ==========
document.getElementById('searchInput').addEventListener('input', function() {
    filterCards(this.value.toLowerCase().trim());
});

function filterCards(q) {
    var cards = document.querySelectorAll('.event-card');
    var visible = 0;
    cards.forEach(function(c) {
        var title = c.dataset.title || '';
        var show = !q || title.includes(q);
        if (showingFav && !likedIds.has(parseInt(c.dataset.id))) show = false;
        c.style.display = show ? '' : 'none';
        if (show) visible++;
    });
    document.getElementById('eventCount').textContent = '🎯 ' + visible + ' événement' + (visible !== 1 ? 's' : '');
}

// ========== Sort ==========
function toggleSort() {
    document.getElementById('sortMenu').classList.toggle('open');
}
document.addEventListener('click', function(e) {
    if (!e.target.closest('.sort-wrap')) {
        document.getElementById('sortMenu').classList.remove('open');
    }
});

function sortEvents(by) {
    document.getElementById('sortMenu').classList.remove('open');
    var container = document.getElementById('eventsContainer');
    var cards = Array.from(container.querySelectorAll('.event-card'));

    cards.sort(function(a, b) {
        if (by === 'title') return (a.dataset.title || '').localeCompare(b.dataset.title || '', 'fr');
        if (by === 'date') return (a.dataset.date || '').localeCompare(b.dataset.date || '');
        if (by === 'plans') return parseInt(b.dataset.plans || 0) - parseInt(a.dataset.plans || 0);
        return 0;
    });

    cards.forEach(function(c) { container.appendChild(c); });
}

// ========== Favourites ==========
function toggleFav() {
    showingFav = !showingFav;
    var btn = document.getElementById('favBtn');
    btn.textContent = showingFav ? '🌟 Tous' : '💛 Mes Favoris';
    btn.classList.toggle('active', showingFav);
    filterCards(document.getElementById('searchInput').value.toLowerCase().trim());
}

function toggleHeart(id, btn) {
    if (likedIds.has(id)) {
        likedIds.delete(id);
        btn.textContent = '🤍';
    } else {
        likedIds.add(id);
        btn.textContent = '💛';
    }
    if (showingFav) filterCards(document.getElementById('searchInput').value.toLowerCase().trim());
}

// ========== Participate ==========
function participate(id, btn) {
    btn.disabled = true;
    btn.textContent = '⏳...';
    btn.style.background = '#b22222';

    fetch('/events/' + id + '/participate', { method: 'POST' })
        .then(function(r) { return r.json(); })
        .then(function(data) {
            if (data.success) {
                btn.textContent = '✅ Inscrit !';
                btn.style.background = '#4CAF50';
                showToast('✅ ' + data.message, '#285921');
                setTimeout(function() { location.reload(); }, 1500);
            } else {
                btn.textContent = '🎯 S\\'inscrire';
                btn.style.background = '#285921';
                btn.disabled = false;
                showToast('⚠️ ' + data.message, '#b22222');
            }
        })
        .catch(function() {
            btn.textContent = '🎯 S\\'inscrire';
            btn.style.background = '#285921';
            btn.disabled = false;
            showToast('❌ Erreur réseau', '#b22222');
        });
}

// ========== QR Code ==========
function showQR(id) {
    var modal = document.getElementById('qrModal');
    modal.style.display = 'flex';
    document.getElementById('qrSpinner').style.display = 'block';
    document.getElementById('qrImage').style.display = 'none';
    document.getElementById('qrUrl').value = '';
    document.getElementById('qrEventName').textContent = '';
    document.getElementById('qrLocation').textContent = '';

    fetch('/events/' + id + '/qrcode')
        .then(function(r) { return r.json(); })
        .then(function(d) {
            document.getElementById('qrEventName').textContent = d.title;
            document.getElementById('qrLocation').textContent  = d.location;
            document.getElementById('qrUrl').value             = d.mapsUrl;

            // Generate QR client-side using qrcode.js
            var container = document.getElementById('qrImage');
            container.innerHTML = '';
            container.style.display = 'block';
            new QRCode(container, {
                text:          d.mapsUrl,
                width:         220,
                height:        220,
                colorDark:     '#285921',
                colorLight:    '#ffffff',
                correctLevel:  QRCode.CorrectLevel.H
            });
            document.getElementById('qrSpinner').style.display = 'none';
        })
        .catch(function() {
            document.getElementById('qrSpinner').textContent = '❌ Erreur de chargement';
        });
}

function closeQR() {
    document.getElementById('qrModal').style.display = 'none';
}

function copyQrUrl() {
    var url = document.getElementById('qrUrl').value;
    navigator.clipboard.writeText(url).then(function() {
        showToast('📋 Lien copié !', '#285921');
    });
}

document.getElementById('qrModal').addEventListener('click', function(e) {
    if (e.target === this) closeQR();
});

function showToast(msg, color) {
    var t = document.getElementById('toast');
    t.textContent = msg;
    t.style.background = color || '#285921';
    t.style.display = 'block';
    setTimeout(function() { t.style.display = 'none'; }, 3000);
}

var savedLikes = localStorage.getItem('likedEvents');
if (savedLikes) {
    likedIds = new Set(JSON.parse(savedLikes));
    likedIds.forEach(function(id) {
        var btn = document.getElementById('heart-' + id);
        if (btn) btn.textContent = '💛';
    });
}

function saveFavoritesToLocalStorage() {
    localStorage.setItem('likedEvents', JSON.stringify([...likedIds]));
}

var originalToggleHeart = toggleHeart;
toggleHeart = function(id, btn) {
    originalToggleHeart(id, btn);
    saveFavoritesToLocalStorage();
};

if (!window.speechSynthesis) {
    document.querySelectorAll('.btn-mic').forEach(function(btn) {
        btn.style.opacity = '0.5';
        btn.title = 'Synthèse vocale non disponible';
    });
}

// ========== PAGINATION FUNCTIONS ==========
function changePerPage(limit) {
    var url = new URL(window.location.href);
    url.searchParams.set('limit', limit);
    url.searchParams.set('page', 1);
    window.location.href = url.toString();
}

// Smooth scroll to top when changing page
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.pagination a').forEach(function(link) {
        link.addEventListener('click', function(e) {
            if (!this.parentElement.classList.contains('disabled') && this.getAttribute('href') !== '#') {
                setTimeout(function() {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                }, 100);
            }
        });
    });
});

// Keyboard navigation for pagination
document.addEventListener('keydown', function(e) {
    var pagination = document.querySelector('.pagination');
    if (!pagination) return;
    
    var nextLink = pagination.querySelector('li:last-child a');
    var prevLink = pagination.querySelector('li:first-child a');
    
    if (e.key === 'ArrowRight' && nextLink && !nextLink.parentElement.classList.contains('disabled')) {
        window.location.href = nextLink.href;
    } else if (e.key === 'ArrowLeft' && prevLink && !prevLink.parentElement.classList.contains('disabled')) {
        window.location.href = prevLink.href;
    }
});
</script>
<script src=\"https://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit\"></script>
{% endblock %}

{% endblock %}", "home/events/index.html.twig", "C:\\Users\\DELL\\Downloads\\psy\\templates\\home\\events\\index.html.twig");
    }
}
