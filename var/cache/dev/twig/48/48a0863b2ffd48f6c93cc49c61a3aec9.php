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

/* Psychologue/evente/index.html.twig */
class __TwigTemplate_0613cefc0e9e8816190120d7580cc597 extends Template
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
            'navbar' => [$this, 'block_navbar'],
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 2
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Psychologue/evente/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Psychologue/evente/index.html.twig"));

        $this->parent = $this->load("base.html.twig", 2);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 4
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

    // line 6
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

        // line 7
        yield "<div class=\"navbar-wrap\">
    <div class=\"navbar-inner\">
        <ul class=\"nav-links\">
            <li><a href=\"";
        // line 10
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("psycho_dashboard");
        yield "\">Accueil</a></li>
            <li><a href=\"#\">Contenu Psychologique</a></li>
            <li><a href=\"#\">Tests</a></li>
            <li><a href=\"#\">Rendez-vous</a></li>
            <li><a href=\"";
        // line 14
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("psycho_events_index");
        yield "\" class=\"active\">Evenements</a></li>
            <li><a href=\"#\">Suivi Personnel</a></li>
        </ul>
        ";
        // line 17
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 17, $this->source); })()), "user", [], "any", false, false, false, 17)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 18
            yield "            <div style=\"position:relative; display:flex; align-items:center;\" id=\"profileDropdownWrap\">
                <div onclick=\"toggleProfileDropdown()\"
                     style=\"display:flex; align-items:center; gap:10px; cursor:pointer; padding:8px 12px; border-radius:8px; transition:background 0.2s;\"
                     onmouseover=\"this.style.background='rgba(0,0,0,0.05)'\"
                     onmouseout=\"this.style.background='transparent'\">
                    <div style=\"width:38px; height:38px; border-radius:50%; background:#4a7c3f; display:flex; align-items:center; justify-content:center; border:2px solid #4a7c3f;\">
                        <i class=\"fas fa-user\" style=\"color:white; font-size:1rem;\"></i>
                    </div>
                    <div style=\"line-height:1.2;\">
                        <div style=\"font-size:0.85rem; font-weight:600; color:#2d3a1e;\">";
            // line 27
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 27, $this->source); })()), "user", [], "any", false, false, false, 27), "firstname", [], "any", false, false, false, 27), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 27, $this->source); })()), "user", [], "any", false, false, false, 27), "lastname", [], "any", false, false, false, 27), "html", null, true);
            yield "</div>
                        <div style=\"font-size:0.7rem; color:#6B7D5A; text-transform:uppercase; letter-spacing:1px;\">";
            // line 28
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 28, $this->source); })()), "user", [], "any", false, false, false, 28), "role", [], "any", false, false, false, 28), "html", null, true);
            yield "</div>
                    </div>
                    <i class=\"fas fa-chevron-down\" style=\"font-size:0.7rem; color:#6B7D5A;\"></i>
                </div>
                <div id=\"profileDropdown\"
                     style=\"display:none; position:absolute; top:calc(100% + 8px); right:0; background:white; border-radius:12px; box-shadow:0 10px 40px rgba(45,80,22,0.15); min-width:200px; overflow:hidden; z-index:9999; border:1px solid #e8e0d0;\">
                    <a href=\"";
            // line 34
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile");
            yield "\"
                       style=\"display:flex; align-items:center; gap:12px; padding:14px 20px; text-decoration:none; color:#2d3a1e; font-size:0.9rem;\"
                       onmouseover=\"this.style.background='#f5f0e8'\" onmouseout=\"this.style.background='transparent'\">
                        <i class=\"fas fa-user-circle\" style=\"color:#4a7c3f;\"></i> Mon Profil
                    </a>
                    <a href=\"";
            // line 39
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
            yield "\"
                       style=\"display:flex; align-items:center; gap:12px; padding:14px 20px; text-decoration:none; color:#991b1b; font-size:0.9rem; border-top:1px solid #f0ebe0;\"
                       onmouseover=\"this.style.background='#fee2e2'\" onmouseout=\"this.style.background='transparent'\">
                        <i class=\"fas fa-sign-out-alt\" style=\"color:#991b1b;\"></i> Se déconnecter
                    </a>
                </div>
            </div>
        ";
        } else {
            // line 47
            yield "            <a href=\"";
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
            yield "\" class=\"nav-cta\">Se connecter</a>
        ";
        }
        // line 49
        yield "    </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 53
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

        // line 54
        yield "
<style>
    :root {
        --primary-green: #285921;
        --primary-green-light: #3d7e33;
        --secondary-beige: #c9b99b;
        --background-light: #f8f5f2;
        --text-dark: #5a6c5a;
        --text-light: #69685c;
        --card-shadow: 0 12px 28px -8px rgba(40, 89, 33, 0.12);
        --card-hover-shadow: 0 20px 32px -12px rgba(40, 89, 33, 0.2);
        --radius-card: 24px;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background: linear-gradient(135deg, #f5f1ed 0%, #e8efe8 50%, #f0ede5 100%);
        font-family: 'Segoe UI', 'Georgia', serif;
        min-height: 100vh;
        transition: all 0.3s ease;
    }

    /* Hide Google Translate banner */
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
    /* Google Translate element hidden but functional */
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

    /* ========== COLOR BLINDNESS FILTERS ========== */
    body.protanopia {
        filter: url('#protanopia');
    }
    body.deuteranopia {
        filter: url('#deuteranopia');
    }
    body.tritanopia {
        filter: url('#tritanopia');
    }
    body.achromatopsia {
        filter: grayscale(100%);
    }
    body.high-contrast {
        filter: contrast(180%) brightness(110%);
    }
    body.high-contrast .event-card,
    body.high-contrast .psychology-header,
    body.high-contrast .search-sort-bar {
        background: #000 !important;
        border: 2px solid #fff !important;
    }
    body.high-contrast .event-title,
    body.high-contrast .detail-row .text,
    body.high-contrast .plan-desc,
    body.high-contrast .plan-title,
    body.high-contrast h1,
    body.high-contrast h3,
    body.high-contrast p {
        color: #fff !important;
    }
    body.high-contrast .btn-participate {
        background: #fff !important;
        color: #000 !important;
    }
    body.high-contrast .progress-bar {
        background: #fff !important;
    }
    body.high-contrast .calendar-box {
        background: #000 !important;
        border: 1px solid #fff !important;
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

    /* ========== COUNTDOWN TIMER STYLES ========== */
    .countdown-timer {
        background: linear-gradient(135deg, #f0ede5, #e8e0d4);
        border-radius: 40px;
        padding: 8px 15px;
        margin: 10px 0 8px;
        display: inline-flex;
        align-items: center;
        gap: 12px;
        font-size: 12px;
        font-weight: 600;
        color: var(--primary-green);
        border: 1px solid rgba(40, 89, 33, 0.15);
        width: 100%;
        justify-content: center;
        font-family: monospace;
    }
    .countdown-timer span {
        background: white;
        padding: 3px 8px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 700;
        color: var(--primary-green);
        min-width: 42px;
        display: inline-block;
        text-align: center;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }
    .countdown-timer .countdown-label {
        background: transparent;
        padding: 0;
        font-size: 10px;
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

    /* Page Container */
    .events-page {
        min-height: 100vh;
        padding: 30px;
    }

    /* Psychology-themed Header */
    .psychology-header {
        background: linear-gradient(135deg, rgba(255,255,255,0.98), rgba(245,241,237,0.98));
        border-radius: 20px;
        padding: 25px 30px;
        margin-bottom: 25px;
        box-shadow: 0 4px 15px rgba(40, 89, 33, 0.1);
        border: 1px solid rgba(40, 89, 33, 0.2);
    }

    .header-icon {
        width: 50px;
        height: 50px;
        background: var(--primary-green);
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        box-shadow: 0 4px 12px rgba(40, 89, 33, 0.3);
    }

    /* Search and Filter Bar */
    .search-sort-bar {
        background: linear-gradient(90deg, rgba(255,255,255,0.95), rgba(245,241,237,0.95));
        border-radius: 20px;
        padding: 18px;
        border: 1.5px solid rgba(40, 89, 33, 0.25);
        margin-bottom: 30px;
        box-shadow: 0 4px 12px rgba(40, 89, 33, 0.1);
    }

    .search-input {
        background: white;
        border: 2px solid rgba(40, 89, 33, 0.3);
        border-radius: 15px;
        padding: 14px 18px;
        width: 100%;
        transition: all 0.3s ease;
    }

    .search-input:focus {
        border-color: var(--primary-green);
        box-shadow: 0 0 0 3px rgba(40, 89, 33, 0.1);
        outline: none;
    }

    .filter-btn {
        padding: 14px 22px;
        border-radius: 15px;
        font-weight: bold;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
    }

    .filter-btn-primary {
        background: #7ec8a3;
        color: #000;
        box-shadow: 0 3px 8px rgba(126, 200, 163, 0.4);
    }

    .filter-btn-primary:hover {
        background: #5fb88b;
        transform: translateY(-2px);
    }

    .filter-btn-secondary {
        background: var(--secondary-beige);
        color: #000;
    }

    .filter-btn-secondary:hover {
        background: #b8a888;
        transform: translateY(-2px);
    }

    /* Translation Button */
    .btn-translate {
        padding: 14px 22px;
        border-radius: 15px;
        font-weight: bold;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        background: #6c5ce7;
        color: white;
    }
    .btn-translate:hover {
        background: #5b4bc4;
        transform: translateY(-2px);
    }

    .event-count-badge {
        background: rgba(40, 89, 33, 0.1);
        border-radius: 25px;
        padding: 10px 18px;
        font-weight: bold;
        border: 1.5px solid rgba(40, 89, 33, 0.3);
        color: var(--primary-green);
    }

    /* ========== CUTE GRID EVENT CARDS (3 per row) ========== */
    #eventsContainer { 
        display: grid; 
        grid-template-columns: repeat(3, 1fr);
        gap: 28px;
    }

    /* Modern card design */
    .event-card {
        background: white;
        border-radius: var(--radius-card);
        overflow: hidden;
        box-shadow: var(--card-shadow);
        transition: all 0.3s ease;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        border: 1px solid rgba(40, 89, 33, 0.1);
    }

    .event-card:hover {
        transform: translateY(-6px);
        box-shadow: var(--card-hover-shadow);
        border-color: rgba(40, 89, 33, 0.25);
    }

    /* Image container */
    .event-image {
        width: 100%;
        height: 180px;
        overflow: hidden;
        position: relative;
        background: linear-gradient(135deg, #e8e0d4, #d4c9b8);
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

    /* Calendar badge overlay */
    .calendar-box {
        position: absolute;
        top: 14px;
        left: 14px;
        background: rgba(0, 0, 0, 0.75);
        backdrop-filter: blur(6px);
        border-radius: 14px;
        padding: 6px 12px;
        display: flex;
        flex-direction: column;
        align-items: center;
        min-width: 62px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .calendar-month {
        font-size: 10px;
        font-weight: 700;
        color: white;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .calendar-day {
        font-size: 22px;
        font-weight: 800;
        color: white;
        line-height: 1.2;
        margin-top: 2px;
    }

    /* Content section */
    .event-info {
        padding: 18px 18px 20px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        flex: 1;
    }

    .event-title-row {
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
        margin-bottom: 4px;
    }

    .event-title {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--primary-green);
        margin: 0;
        letter-spacing: -0.2px;
        line-height: 1.3;
    }

    .badge-new {
        font-size: 8px;
        font-weight: 700;
        color: white;
        background: #e67e22;
        border-radius: 30px;
        padding: 3px 8px;
        letter-spacing: 0.3px;
    }

    .badge-activities {
        font-size: 9px;
        font-weight: 600;
        color: white;
        background: var(--secondary-beige);
        border-radius: 30px;
        padding: 3px 10px;
    }

    /* Details row */
    .event-details {
        display: flex;
        flex-direction: column;
        gap: 6px;
        margin: 4px 0;
    }

    .detail-row {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 12px;
    }

    .detail-row .icon {
        font-size: 12px;
        width: 22px;
        color: var(--primary-green);
    }

    .detail-row .text {
        color: #5a6c5a;
    }

    .detail-row .text.green { color: #2e7d32; font-weight: 600; }
    .detail-row .text.orange { color: #e67e22; font-weight: 600; }
    .detail-row .text.red { color: #c0392b; font-weight: 600; }

    /* Progress bar compact */
    .progress {
        height: 5px;
        background: #e0d9cc;
        border-radius: 10px;
        overflow: hidden;
        margin: 6px 0;
    }

    .progress-bar {
        background: var(--primary-green);
        height: 100%;
        border-radius: 10px;
    }

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
        font-size: 18px;
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
    .rating-average {
        font-size: 11px;
        color: #ffc107;
        margin-left: 6px;
        font-weight: bold;
    }
    .rating-count {
        font-size: 10px;
        color: #8b9a8b;
        margin-left: 5px;
    }
    .rating-text {
        font-size: 11px;
        color: #8b9a8b;
        margin-left: 8px;
    }

    /* Action buttons - compact row */
    .action-row {
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
        margin-top: 8px;
        border-top: 1px solid rgba(40, 89, 33, 0.1);
        padding-top: 12px;
    }

    .btn-participate {
        padding: 6px 16px;
        border: none;
        border-radius: 40px;
        font-size: 11px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
        background: var(--primary-green);
        color: white;
        flex: 1;
    }

    .btn-participate:hover:not(:disabled) { 
        background: #3d7e33; 
        transform: translateY(-1px); 
    }

    .btn-participate:disabled { 
        background: #4CAF50; 
        cursor: default; 
        opacity: 0.8;
    }

    .btn-participate-full { 
        background: #b22222; 
    }

    /* MICROPHONE BUTTON STYLES */
    .btn-mic {
        font-size: 16px;
        background: rgba(40, 89, 33, 0.08);
        border: none;
        cursor: pointer;
        padding: 6px 10px;
        border-radius: 30px;
        transition: all 0.2s;
        color: var(--primary-green);
    }

    .btn-mic:hover {
        background: rgba(40, 89, 33, 0.2);
        transform: scale(1.05);
    }

    .btn-mic.playing {
        background: #4CAF50;
        color: white;
        animation: micPulse 1s ease-in-out infinite;
    }

    /* COLOR BLINDNESS BUTTON STYLES */
    .btn-colorblind {
        font-size: 16px;
        background: rgba(40, 89, 33, 0.08);
        border: none;
        cursor: pointer;
        padding: 6px 10px;
        border-radius: 30px;
        transition: all 0.2s;
        color: var(--primary-green);
    }

    .btn-colorblind:hover {
        background: rgba(40, 89, 33, 0.2);
        transform: scale(1.05);
    }

    .btn-colorblind.active {
        background: #9b59b6;
        color: white;
    }

    @keyframes micPulse {
        0% { transform: scale(1); box-shadow: 0 0 0 0 rgba(76, 175, 80, 0.7); }
        50% { transform: scale(1.1); box-shadow: 0 0 0 8px rgba(76, 175, 80, 0.3); }
        100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(76, 175, 80, 0); }
    }

    .btn-favorite {
        font-size: 18px;
        background: transparent;
        border: none;
        cursor: pointer;
        padding: 4px 6px;
        transition: transform 0.2s;
        color: #d4af7a;
    }

    .btn-favorite:hover { 
        transform: scale(1.15); 
        color: #e67e22; 
    }

    .btn-admin {
        font-size: 11px;
        padding: 5px 10px;
        border-radius: 20px;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: all 0.2s;
    }

    .btn-status {
        background: #4A90E2;
        color: white;
    }
    .btn-status:hover {
        opacity: 0.9;
        transform: scale(1.02);
    }
    .btn-edit {
        background: #2196F3;
        color: white;
    }
    .btn-edit:hover {
        background: #1976D2;
    }
    .btn-delete {
        background: #f44336;
        color: white;
    }
    .btn-delete:hover {
        background: #d32f2f;
    }
    .btn-qr {
        background: var(--primary-green);
        color: white;
    }
    .btn-qr:hover {
        background: #3d7e33;
    }

    /* Planifications preview */
    .plan-preview {
        margin-top: 8px;
        padding: 8px 10px;
        background: rgba(168, 230, 207, 0.12);
        border-radius: 14px;
        border: 1px solid rgba(40, 89, 33, 0.08);
        font-size: 11px;
        color: #5a6c5a;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .plan-preview-icon {
        width: 24px;
        height: 24px;
        background: var(--primary-green);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 11px;
        font-weight: bold;
        flex-shrink: 0;
    }

    .plan-preview-text {
        flex: 1;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    .more-plans {
        font-size: 10px;
        color: var(--primary-green);
        font-weight: 600;
        margin-top: 4px;
        text-align: center;
    }

    /* Translation Modal */
    .translation-modal {
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
        animation: fadeInUp 0.3s ease-out;
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

    /* Color Blindness Modal */
    .colorblind-modal {
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
        animation: fadeInUp 0.3s ease-out;
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
        grid-column: 1 / -1;
        background: linear-gradient(135deg, rgba(255,255,255,0.95), rgba(245,241,237,0.95));
        border-radius: 25px;
        border: 2px solid rgba(40, 89, 33, 0.25);
        padding: 60px;
        text-align: center;
    }

    /* Animations */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .event-card {
        animation: fadeInUp 0.4s ease-out forwards;
    }

    /* Toast notification */
    .speech-toast {
        position: fixed;
        bottom: 80px;
        left: 50%;
        transform: translateX(-50%);
        background: var(--primary-green);
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
        color: var(--primary-green);
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
        background: #7ec8a3;
        border-color: var(--primary-green);
        color: white;
        box-shadow: 0 6px 16px rgba(40, 89, 33, 0.25);
    }

    .pagination .active a {
        background: linear-gradient(135deg, var(--primary-green), #2e6a28);
        color: white;
        border-color: var(--primary-green);
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
        color: var(--primary-green);
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
        color: var(--primary-green);
        cursor: pointer;
        transition: all 0.2s;
        outline: none;
    }

    .per-page-selector select:hover {
        border-color: var(--primary-green);
        background: #7ec8a3;
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

    /* Responsive */
    @media (max-width: 1100px) {
        #eventsContainer { grid-template-columns: repeat(2, 1fr); }
    }

    @media (max-width: 700px) {
        #eventsContainer { grid-template-columns: 1fr; }
        .events-page { padding: 20px; }
        .speech-toast { white-space: normal; text-align: center; width: 90%; }
        .countdown-timer { font-size: 10px; padding: 6px 12px; }
        .countdown-timer span { font-size: 11px; min-width: 35px; }
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

<!-- Google Translate Element -->
<div id=\"google_translate_element\"></div>

<div class=\"events-page\">
    <div class=\"container-fluid\">
        
        <!-- Header -->
        <div class=\"psychology-header\">
            <div class=\"d-flex align-items-center justify-content-between flex-wrap gap-3\">
                <div class=\"d-flex align-items-center gap-3\">
                    <div class=\"header-icon\">Ψ</div>
                    <div>
                        <h1 class=\"display-5 fw-bold\" style=\"color: var(--primary-green);\">Événements & Planifications</h1>
                        <p class=\"text-muted fst-italic\">🌱 Cultivez votre bien-être mental et épanouissement personnel</p>
                    </div>
                </div>
                <div class=\"d-flex gap-2\">
                    <button type=\"button\" class=\"btn btn-primary\" style=\"background: #4A90E2; border-radius: 20px;\" onclick=\"openAIPanel()\">
                        🤖 Assistant IA
                    </button>
                    <div class=\"position-relative\">
                        <button type=\"button\" class=\"btn btn-link position-relative\" id=\"notificationBell\" style=\"font-size: 24px; text-decoration: none;\" data-bs-toggle=\"modal\" data-bs-target=\"#notificationsModal\">
                            🔔
                            <span class=\"position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger\" id=\"notificationBadge\" style=\"display: none;\">0</span>
                        </button>
                    </div>
                    <button type=\"button\" class=\"btn\" style=\"background: #4CAF50; color: white; border-radius: 12px; font-weight: bold;\" data-bs-toggle=\"modal\" data-bs-target=\"#createEventModal\">
                        ➕ Ajouter
                    </button>
                </div>
            </div>
        </div>

        <!-- Search and Filter Bar -->
        <div class=\"search-sort-bar\">
            <div class=\"row align-items-center g-3\">
                <div class=\"col-md-5\">
                    <input type=\"text\" id=\"searchInput\" class=\"search-input\" placeholder=\"🔍 Recherchez votre atelier de bien-être...\">
                </div>
                <div class=\"col-md-auto\">
                    <div class=\"custom-sort-wrap\" style=\"position:relative;\">
                        <button id=\"sortBtn\" class=\"filter-btn filter-btn-primary\" type=\"button\">
                            ✨ Trier par ▾
                        </button>
                        <div id=\"sortMenu\" style=\"display:none;position:absolute;top:calc(100% + 6px);left:0;z-index:9999;background:white;border-radius:12px;box-shadow:0 8px 24px rgba(0,0,0,0.15);padding:6px;min-width:210px;\">
                            <div class=\"sort-item active-sort\" data-sort=\"date\"       style=\"padding:10px 18px;border-radius:8px;cursor:pointer;font-size:13px;\">📅 Par Date (Récent)</div>
                            <div class=\"sort-item\"            data-sort=\"title\"      style=\"padding:10px 18px;border-radius:8px;cursor:pointer;font-size:13px;\">📚 Par Titre (A → Z)</div>
                            <div class=\"sort-item\"            data-sort=\"activities\" style=\"padding:10px 18px;border-radius:8px;cursor:pointer;font-size:13px;\">🎯 Par Activités</div>
                        </div>
                    </div>
                </div>
                <div class=\"col-md-auto\">
                    <button id=\"favoritesBtn\" class=\"filter-btn filter-btn-secondary\">💛 Mes Favoris</button>
                </div>
                <div class=\"col-md-auto\">
                    <!-- 🌐 TRANSLATION BUTTON -->
                    <button class=\"btn-translate\" id=\"translateBtn\" onclick=\"showTranslationModal()\">🌐 Traduire</button>
                </div>
                <div class=\"col-md-auto ms-auto\">
                    <span class=\"event-count-badge\" id=\"eventCount\">🎯 ";
        // line 1322
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalCount"]) || array_key_exists("totalCount", $context) ? $context["totalCount"] : (function () { throw new RuntimeError('Variable "totalCount" does not exist.', 1322, $this->source); })()), "html", null, true);
        yield " événement";
        yield ((((isset($context["totalCount"]) || array_key_exists("totalCount", $context) ? $context["totalCount"] : (function () { throw new RuntimeError('Variable "totalCount" does not exist.', 1322, $this->source); })()) > 1)) ? ("s") : (""));
        yield "</span>
                </div>
            </div>
        </div>

        <!-- Events Container -->
        <div id=\"eventsContainer\">
            ";
        // line 1329
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["events"]) || array_key_exists("events", $context) ? $context["events"] : (function () { throw new RuntimeError('Variable "events" does not exist.', 1329, $this->source); })()))) {
            // line 1330
            yield "                <div class=\"empty-state\">
                    <div style=\"font-size: 72px;\">🌸</div>
                    <h3 class=\"mt-3\" style=\"color: #285921;\">Aucun événement trouvé</h3>
                    <p class=\"text-muted\">🌱 Commencez par créer votre premier événement</p>
                </div>
            ";
        } else {
            // line 1336
            yield "                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["events"]) || array_key_exists("events", $context) ? $context["events"] : (function () { throw new RuntimeError('Variable "events" does not exist.', 1336, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["event"]) {
                // line 1337
                yield "                    ";
                $context["ratio"] = (((CoreExtension::getAttribute($this->env, $this->source, $context["event"], "maxParticipants", [], "any", false, false, false, 1337) > 0)) ? ((CoreExtension::getAttribute($this->env, $this->source, $context["event"], "currentParticipants", [], "any", false, false, false, 1337) / CoreExtension::getAttribute($this->env, $this->source, $context["event"], "maxParticipants", [], "any", false, false, false, 1337))) : (0));
                // line 1338
                yield "                    ";
                $context["isNew"] = (CoreExtension::getAttribute($this->env, $this->source, $context["event"], "createdAt", [], "any", false, false, false, 1338) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $this->extensions['Twig\Extension\CoreExtension']->convertDate(), "diff", [CoreExtension::getAttribute($this->env, $this->source, $context["event"], "createdAt", [], "any", false, false, false, 1338)], "method", false, false, false, 1338), "days", [], "any", false, false, false, 1338) <= 7));
                // line 1339
                yield "                    ";
                $context["isFull"] = (CoreExtension::getAttribute($this->env, $this->source, $context["event"], "currentParticipants", [], "any", false, false, false, 1339) >= CoreExtension::getAttribute($this->env, $this->source, $context["event"], "maxParticipants", [], "any", false, false, false, 1339));
                // line 1340
                yield "                    ";
                $context["plansCount"] = Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["event"], "planifications", [], "any", false, false, false, 1340));
                // line 1341
                yield "                    ";
                $context["avgRating"] = (((CoreExtension::getAttribute($this->env, $this->source, $context["event"], "avgRating", [], "any", true, true, false, 1341) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["event"], "avgRating", [], "any", false, false, false, 1341)))) ? (CoreExtension::getAttribute($this->env, $this->source, $context["event"], "avgRating", [], "any", false, false, false, 1341)) : (0));
                // line 1342
                yield "                    ";
                $context["ratingCount"] = (((CoreExtension::getAttribute($this->env, $this->source, $context["event"], "ratingCount", [], "any", true, true, false, 1342) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["event"], "ratingCount", [], "any", false, false, false, 1342)))) ? (CoreExtension::getAttribute($this->env, $this->source, $context["event"], "ratingCount", [], "any", false, false, false, 1342)) : (0));
                // line 1343
                yield "                    
                    <div class=\"event-card\" 
                         data-event-id=\"";
                // line 1345
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 1345), "html", null, true);
                yield "\"
                         data-title=\"";
                // line 1346
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["event"], "title", [], "any", false, false, false, 1346)), "html", null, true);
                yield "\"
                         data-date=\"";
                // line 1347
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["event"], "eventDate", [], "any", false, false, false, 1347)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "eventDate", [], "any", false, false, false, 1347), "Y-m-d"), "html", null, true)) : ("0000-00-00"));
                yield "\"
                         data-activities=\"";
                // line 1348
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["plansCount"]) || array_key_exists("plansCount", $context) ? $context["plansCount"] : (function () { throw new RuntimeError('Variable "plansCount" does not exist.', 1348, $this->source); })()), "html", null, true);
                yield "\">
                        
                        <!-- Image with calendar overlay -->
                        <div class=\"event-image\">
                            ";
                // line 1352
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["event"], "link", [], "any", false, false, false, 1352)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 1353
                    yield "                                <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "link", [], "any", false, false, false, 1353), "html", null, true);
                    yield "\" alt=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "title", [], "any", false, false, false, 1353), "html", null, true);
                    yield "\" onerror=\"this.src='https://placehold.co/400x180/e8e0d4/5a6c5a?text=Atelier'\">
                            ";
                } else {
                    // line 1355
                    yield "                                <img src=\"https://placehold.co/400x180/e8e0d4/5a6c5a?text=Atelier+Bien-%C3%AAtre\" alt=\"Image par défaut\">
                            ";
                }
                // line 1357
                yield "                            
                            ";
                // line 1358
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["event"], "eventDate", [], "any", false, false, false, 1358)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 1359
                    yield "                            <div class=\"calendar-box\">
                                <div class=\"calendar-month\">";
                    // line 1360
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::upper($this->env->getCharset(), $this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "eventDate", [], "any", false, false, false, 1360), "M")), "html", null, true);
                    yield "</div>
                                <div class=\"calendar-day\">";
                    // line 1361
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "eventDate", [], "any", false, false, false, 1361), "d"), "html", null, true);
                    yield "</div>
                            </div>
                            ";
                }
                // line 1364
                yield "                        </div>
                        
                        <!-- Content -->
                        <div class=\"event-info\">
                            <div class=\"event-title-row\">
                                ";
                // line 1369
                if ((($tmp = (isset($context["isNew"]) || array_key_exists("isNew", $context) ? $context["isNew"] : (function () { throw new RuntimeError('Variable "isNew" does not exist.', 1369, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "<span class=\"badge-new\">NOUVEAU</span>";
                }
                // line 1370
                yield "                                <h3 class=\"event-title\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "title", [], "any", false, false, false, 1370), "html", null, true);
                yield "</h3>
                                ";
                // line 1371
                if (((isset($context["plansCount"]) || array_key_exists("plansCount", $context) ? $context["plansCount"] : (function () { throw new RuntimeError('Variable "plansCount" does not exist.', 1371, $this->source); })()) > 0)) {
                    // line 1372
                    yield "                                    <span class=\"badge-activities\">🎯 ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["plansCount"]) || array_key_exists("plansCount", $context) ? $context["plansCount"] : (function () { throw new RuntimeError('Variable "plansCount" does not exist.', 1372, $this->source); })()), "html", null, true);
                    yield "</span>
                                ";
                }
                // line 1374
                yield "                            </div>

                            <!-- ========== EVENT STATUS BADGE ========== -->
                            <div class=\"event-status-badge status-";
                // line 1377
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["event"], "status", [], "any", true, true, false, 1377) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["event"], "status", [], "any", false, false, false, 1377)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "status", [], "any", false, false, false, 1377), "html", null, true)) : ("upcoming"));
                yield "\">
                                ";
                // line 1378
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["event"], "status", [], "any", false, false, false, 1378) == "ongoing")) {
                    // line 1379
                    yield "                                    🟢 En cours
                                ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 1380
$context["event"], "status", [], "any", false, false, false, 1380) == "completed")) {
                    // line 1381
                    yield "                                    ✅ Terminé
                                ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 1382
$context["event"], "status", [], "any", false, false, false, 1382) == "cancelled")) {
                    // line 1383
                    yield "                                    ❌ Annulé
                                ";
                } else {
                    // line 1385
                    yield "                                    📅 À venir
                                ";
                }
                // line 1387
                yield "                            </div>
                            
                            <!-- ========== COUNTDOWN TIMER ========== -->
                            ";
                // line 1390
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["event"], "eventDate", [], "any", false, false, false, 1390)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 1391
                    yield "                                ";
                    if ((CoreExtension::getAttribute($this->env, $this->source, $context["event"], "status", [], "any", false, false, false, 1391) == "ongoing")) {
                        // line 1392
                        yield "                                    <div class=\"countdown-timer urgent\">
                                        🟢 Événement en cours ! Rejoignez-nous !
                                    </div>
                                ";
                    } elseif ((CoreExtension::getAttribute($this->env, $this->source,                     // line 1395
$context["event"], "status", [], "any", false, false, false, 1395) == "completed")) {
                        // line 1396
                        yield "                                    <div class=\"countdown-timer\">
                                        ✅ Événement terminé
                                    </div>
                                ";
                    } elseif ((CoreExtension::getAttribute($this->env, $this->source,                     // line 1399
$context["event"], "status", [], "any", false, false, false, 1399) == "cancelled")) {
                        // line 1400
                        yield "                                    <div class=\"countdown-timer\">
                                        ❌ Événement annulé
                                    </div>
                                ";
                    } else {
                        // line 1404
                        yield "                                    ";
                        $context["daysLeft"] = ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["event"], "eventDate", [], "any", false, false, false, 1404), "timestamp", [], "any", false, false, false, 1404) - CoreExtension::getAttribute($this->env, $this->source, $this->extensions['Twig\Extension\CoreExtension']->convertDate(), "timestamp", [], "any", false, false, false, 1404)) / 86400);
                        // line 1405
                        yield "                                    <div class=\"countdown-timer ";
                        if (((isset($context["daysLeft"]) || array_key_exists("daysLeft", $context) ? $context["daysLeft"] : (function () { throw new RuntimeError('Variable "daysLeft" does not exist.', 1405, $this->source); })()) <= 3)) {
                            yield "urgent";
                        }
                        yield "\" 
                                         data-event-date=\"";
                        // line 1406
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "eventDate", [], "any", false, false, false, 1406), "Y-m-d H:i:s"), "html", null, true);
                        yield "\">
                                        <span class=\"countdown-label\">⏰</span>
                                        <span class=\"days\">00</span><span class=\"countdown-label\">j</span>
                                        <span class=\"hours\">00</span><span class=\"countdown-label\">h</span>
                                        <span class=\"minutes\">00</span><span class=\"countdown-label\">m</span>
                                        <span class=\"seconds\">00</span><span class=\"countdown-label\">s</span>
                                    </div>
                                ";
                    }
                    // line 1414
                    yield "                            ";
                }
                // line 1415
                yield "                            
                            <div class=\"event-details\">
                                ";
                // line 1417
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["event"], "location", [], "any", false, false, false, 1417)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 1418
                    yield "                                <div class=\"detail-row\">
                                    <span class=\"icon\">📍</span>
                                    <span class=\"text\">";
                    // line 1420
                    yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["event"], "location", [], "any", false, false, false, 1420)) > 35)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["event"], "location", [], "any", false, false, false, 1420), 0, 32) . "..."), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "location", [], "any", false, false, false, 1420), "html", null, true)));
                    yield "</span>
                                </div>
                                ";
                }
                // line 1423
                yield "                                
                                <div class=\"detail-row\">
                                    <span class=\"icon\">👥</span>
                                    <span class=\"text ";
                // line 1426
                if (((isset($context["ratio"]) || array_key_exists("ratio", $context) ? $context["ratio"] : (function () { throw new RuntimeError('Variable "ratio" does not exist.', 1426, $this->source); })()) >= 1)) {
                    yield "red";
                } elseif (((isset($context["ratio"]) || array_key_exists("ratio", $context) ? $context["ratio"] : (function () { throw new RuntimeError('Variable "ratio" does not exist.', 1426, $this->source); })()) >= 0.8)) {
                    yield "orange";
                } else {
                    yield "green";
                }
                yield "\">
                                        ";
                // line 1427
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "currentParticipants", [], "any", false, false, false, 1427), "html", null, true);
                yield " / ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "maxParticipants", [], "any", false, false, false, 1427), "html", null, true);
                yield " participants
                                    </span>
                                </div>
                                
                                <div class=\"progress\">
                                    <div class=\"progress-bar\" style=\"width: ";
                // line 1432
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, $context["event"], "currentParticipants", [], "any", false, false, false, 1432) / CoreExtension::getAttribute($this->env, $this->source, $context["event"], "maxParticipants", [], "any", false, false, false, 1432)) * 100), "html", null, true);
                yield "%\"></div>
                                </div>
                            </div>
                            
                            <!-- ========== 5-STAR RATING SYSTEM ========== -->
                            <div class=\"rating-container\">
                                <div class=\"stars\" data-event-id=\"";
                // line 1438
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 1438), "html", null, true);
                yield "\">
                                    ";
                // line 1439
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(range(1, 5));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 1440
                    yield "                                        <span class=\"star ";
                    if (((isset($context["avgRating"]) || array_key_exists("avgRating", $context) ? $context["avgRating"] : (function () { throw new RuntimeError('Variable "avgRating" does not exist.', 1440, $this->source); })()) >= $context["i"])) {
                        yield "active";
                    }
                    yield "\">★</span>
                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 1442
                yield "                                </div>
                                <span class=\"rating-average\" id=\"rating-avg-";
                // line 1443
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 1443), "html", null, true);
                yield "\">(";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["avgRating"]) || array_key_exists("avgRating", $context) ? $context["avgRating"] : (function () { throw new RuntimeError('Variable "avgRating" does not exist.', 1443, $this->source); })()), "html", null, true);
                yield ")</span>
                                <span class=\"rating-count\" id=\"rating-count-";
                // line 1444
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 1444), "html", null, true);
                yield "\">(";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["ratingCount"]) || array_key_exists("ratingCount", $context) ? $context["ratingCount"] : (function () { throw new RuntimeError('Variable "ratingCount" does not exist.', 1444, $this->source); })()), "html", null, true);
                yield " avis)</span>
                            </div>
                            
                            <!-- Planification preview -->
                            ";
                // line 1448
                if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "planifications", [], "any", false, false, false, 1448))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 1449
                    yield "                            <div class=\"plan-preview\">
                                <div class=\"plan-preview-icon\">🌱</div>
                                <div class=\"plan-preview-text\">
                                    ";
                    // line 1452
                    yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["event"], "planifications", [], "any", false, false, false, 1452), 0, [], "array", false, false, false, 1452), "description", [], "any", false, false, false, 1452)) > 40)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["event"], "planifications", [], "any", false, false, false, 1452), 0, [], "array", false, false, false, 1452), "description", [], "any", false, false, false, 1452), 0, 37) . "..."), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["event"], "planifications", [], "any", false, false, false, 1452), 0, [], "array", false, false, false, 1452), "description", [], "any", false, false, false, 1452), "html", null, true)));
                    yield "
                                </div>
                            </div>
                            ";
                    // line 1455
                    if (((isset($context["plansCount"]) || array_key_exists("plansCount", $context) ? $context["plansCount"] : (function () { throw new RuntimeError('Variable "plansCount" does not exist.', 1455, $this->source); })()) > 1)) {
                        // line 1456
                        yield "                            <div class=\"more-plans\">+ ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((isset($context["plansCount"]) || array_key_exists("plansCount", $context) ? $context["plansCount"] : (function () { throw new RuntimeError('Variable "plansCount" does not exist.', 1456, $this->source); })()) - 1), "html", null, true);
                        yield " autre(s) activité(s)</div>
                            ";
                    }
                    // line 1458
                    yield "                            ";
                }
                // line 1459
                yield "                            
                            <!-- Action buttons -->
                            <div class=\"action-row\">
                                ";
                // line 1462
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["event"], "status", [], "any", false, false, false, 1462) == "cancelled")) {
                    // line 1463
                    yield "                                    <button class=\"btn-participate btn-participate-full\" disabled>❌ Événement annulé</button>
                                ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 1464
$context["event"], "status", [], "any", false, false, false, 1464) == "completed")) {
                    // line 1465
                    yield "                                    <button class=\"btn-participate btn-participate-full\" disabled>✅ Événement terminé</button>
                                ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 1466
$context["event"], "currentParticipants", [], "any", false, false, false, 1466) >= CoreExtension::getAttribute($this->env, $this->source, $context["event"], "maxParticipants", [], "any", false, false, false, 1466))) {
                    // line 1467
                    yield "                                    <button class=\"btn-participate btn-participate-full\" disabled>Complet</button>
                                ";
                } elseif ((($tmp = CoreExtension::getAttribute($this->env, $this->source,                 // line 1468
$context["event"], "hasParticipated", [], "any", false, false, false, 1468)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 1469
                    yield "                                    <button class=\"btn-participate\" disabled>✅ Inscrit</button>
                                ";
                } else {
                    // line 1471
                    yield "                                    <button class=\"btn-participate\" onclick=\"processParticipation(";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 1471), "html", null, true);
                    yield ", this)\">🎯 S'inscrire</button>
                                ";
                }
                // line 1473
                yield "                                
                                <!-- 🎤 MICROPHONE BUTTON -->
                                <button class=\"btn-mic\" 
                                        onclick=\"speakEventDetails(";
                // line 1476
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 1476), "html", null, true);
                yield ")\"
                                        title=\"Écouter les détails de l'événement\"
                                        data-event-id=\"";
                // line 1478
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 1478), "html", null, true);
                yield "\">
                                    🎤
                                </button>
                                
                                <!-- 🎨 COLOR BLINDNESS BUTTON -->
                                <button class=\"btn-colorblind\" 
                                        onclick=\"showColorBlindOptions()\"
                                        title=\"Options pour daltoniens (amélioration des couleurs)\">
                                    🎨
                                </button>
                                
                                <button class=\"btn-favorite\" onclick=\"toggleFavorite(";
                // line 1489
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 1489), "html", null, true);
                yield ")\" id=\"favoriteBtn-";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 1489), "html", null, true);
                yield "\">🤍</button>
                            </div>
                            
                            <!-- Hidden data for speech synthesis -->
                            <div style=\"display: none;\" class=\"event-speech-data\" 
                                 data-title=\"";
                // line 1494
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "title", [], "any", false, false, false, 1494), "html", null, true);
                yield "\"
                                 data-date=\"";
                // line 1495
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["event"], "eventDate", [], "any", false, false, false, 1495)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "eventDate", [], "any", false, false, false, 1495), "d/m/Y"), "html", null, true);
                } else {
                    yield "Date non spécifiée";
                }
                yield "\"
                                 data-location=\"";
                // line 1496
                yield ((CoreExtension::getAttribute($this->env, $this->source, $context["event"], "location", [], "any", false, false, false, 1496)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "location", [], "any", false, false, false, 1496), "html", null, true)) : ("Lieu non spécifié"));
                yield "\"
                                 data-participants=\"";
                // line 1497
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "currentParticipants", [], "any", false, false, false, 1497), "html", null, true);
                yield " participants sur ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "maxParticipants", [], "any", false, false, false, 1497), "html", null, true);
                yield " maximum\"
                                 data-plans-count=\"";
                // line 1498
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["plansCount"]) || array_key_exists("plansCount", $context) ? $context["plansCount"] : (function () { throw new RuntimeError('Variable "plansCount" does not exist.', 1498, $this->source); })()), "html", null, true);
                yield "\"
                                 data-plans=\"";
                // line 1499
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "planifications", [], "any", false, false, false, 1499));
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
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "description", [], "any", false, false, false, 1499), "html", null, true);
                    yield " (";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["plan"], "duree", [], "any", false, false, false, 1499), "html", null, true);
                    yield ")";
                    if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "last", [], "any", false, false, false, 1499)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
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
                            
                            <!-- Admin actions -->
                            <div class=\"d-flex gap-1 justify-content-end mt-1\">
                                ";
                // line 1504
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["event"], "isCreator", [], "any", false, false, false, 1504)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 1505
                    yield "                                    <button class=\"btn-admin btn-status\" 
                                            onclick=\"openStatusModal(";
                    // line 1506
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 1506), "html", null, true);
                    yield ", '";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "title", [], "any", false, false, false, 1506), "js"), "html", null, true);
                    yield "', '";
                    yield (((CoreExtension::getAttribute($this->env, $this->source, $context["event"], "status", [], "any", true, true, false, 1506) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["event"], "status", [], "any", false, false, false, 1506)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "status", [], "any", false, false, false, 1506), "html", null, true)) : ("upcoming"));
                    yield "')\"
                                            style=\"background: ";
                    // line 1507
                    yield (((CoreExtension::getAttribute($this->env, $this->source, $context["event"], "status", [], "any", false, false, false, 1507) == "upcoming")) ? ("#4A90E2") : ((((CoreExtension::getAttribute($this->env, $this->source, $context["event"], "status", [], "any", false, false, false, 1507) == "ongoing")) ? ("#4CAF50") : ((((CoreExtension::getAttribute($this->env, $this->source, $context["event"], "status", [], "any", false, false, false, 1507) == "completed")) ? ("#9E9E9E") : ("#f44336"))))));
                    yield "; color: white;\">
                                        📊 Statut
                                    </button>
                                    <button class=\"btn-admin btn-edit\" onclick=\"openEditModal(";
                    // line 1510
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 1510), "html", null, true);
                    yield ")\">✏️</button>
                                    <button class=\"btn-admin btn-delete\" onclick=\"deleteEvent(";
                    // line 1511
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 1511), "html", null, true);
                    yield ")\">🗑️</button>
                                ";
                }
                // line 1513
                yield "                                <button class=\"btn-admin btn-qr\" onclick=\"openQrModal(";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["event"], "id", [], "any", false, false, false, 1513), "html", null, true);
                yield ")\">📍</button>
                            </div>
                        </div>
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['event'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 1518
            yield "            ";
        }
        // line 1519
        yield "        </div>

        <!-- ========== CREATIVE PAGINATION ========== -->
        ";
        // line 1522
        if (( !Twig\Extension\CoreExtension::testEmpty((isset($context["events"]) || array_key_exists("events", $context) ? $context["events"] : (function () { throw new RuntimeError('Variable "events" does not exist.', 1522, $this->source); })())) && ((isset($context["totalPages"]) || array_key_exists("totalPages", $context) ? $context["totalPages"] : (function () { throw new RuntimeError('Variable "totalPages" does not exist.', 1522, $this->source); })()) > 1))) {
            // line 1523
            yield "        <div class=\"pagination-wrapper\">
            <div class=\"per-page-selector\">
                <label>📄 Afficher :</label>
                <select id=\"perPageSelect\" onchange=\"changePerPage(this.value)\">
                    <option value=\"6\" ";
            // line 1527
            yield ((((isset($context["currentLimit"]) || array_key_exists("currentLimit", $context) ? $context["currentLimit"] : (function () { throw new RuntimeError('Variable "currentLimit" does not exist.', 1527, $this->source); })()) == 6)) ? ("selected") : (""));
            yield ">6 par page</option>
                    <option value=\"12\" ";
            // line 1528
            yield ((((isset($context["currentLimit"]) || array_key_exists("currentLimit", $context) ? $context["currentLimit"] : (function () { throw new RuntimeError('Variable "currentLimit" does not exist.', 1528, $this->source); })()) == 12)) ? ("selected") : (""));
            yield ">12 par page</option>
                    <option value=\"18\" ";
            // line 1529
            yield ((((isset($context["currentLimit"]) || array_key_exists("currentLimit", $context) ? $context["currentLimit"] : (function () { throw new RuntimeError('Variable "currentLimit" does not exist.', 1529, $this->source); })()) == 18)) ? ("selected") : (""));
            yield ">18 par page</option>
                    <option value=\"24\" ";
            // line 1530
            yield ((((isset($context["currentLimit"]) || array_key_exists("currentLimit", $context) ? $context["currentLimit"] : (function () { throw new RuntimeError('Variable "currentLimit" does not exist.', 1530, $this->source); })()) == 24)) ? ("selected") : (""));
            yield ">24 par page</option>
                    <option value=\"30\" ";
            // line 1531
            yield ((((isset($context["currentLimit"]) || array_key_exists("currentLimit", $context) ? $context["currentLimit"] : (function () { throw new RuntimeError('Variable "currentLimit" does not exist.', 1531, $this->source); })()) == 30)) ? ("selected") : (""));
            yield ">30 par page</option>
                </select>
            </div>
            
            <div class=\"pagination\">
                ";
            // line 1537
            yield "                ";
            if (((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 1537, $this->source); })()) > 1)) {
                // line 1538
                yield "                    <li><a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("psycho_events_index", ["page" => ((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 1538, $this->source); })()) - 1), "limit" => (isset($context["currentLimit"]) || array_key_exists("currentLimit", $context) ? $context["currentLimit"] : (function () { throw new RuntimeError('Variable "currentLimit" does not exist.', 1538, $this->source); })())]), "html", null, true);
                yield "\">←</a></li>
                ";
            } else {
                // line 1540
                yield "                    <li class=\"disabled\"><a href=\"#\">←</a></li>
                ";
            }
            // line 1542
            yield "                
                ";
            // line 1544
            yield "                ";
            if (((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 1544, $this->source); })()) > 3)) {
                // line 1545
                yield "                    <li><a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("psycho_events_index", ["page" => 1, "limit" => (isset($context["currentLimit"]) || array_key_exists("currentLimit", $context) ? $context["currentLimit"] : (function () { throw new RuntimeError('Variable "currentLimit" does not exist.', 1545, $this->source); })())]), "html", null, true);
                yield "\">1</a></li>
                    ";
                // line 1546
                if (((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 1546, $this->source); })()) > 4)) {
                    // line 1547
                    yield "                        <li class=\"disabled\"><a href=\"#\">...</a></li>
                    ";
                }
                // line 1549
                yield "                ";
            }
            // line 1550
            yield "                
                ";
            // line 1552
            yield "                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(range(max(1, ((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 1552, $this->source); })()) - 2)), min((isset($context["totalPages"]) || array_key_exists("totalPages", $context) ? $context["totalPages"] : (function () { throw new RuntimeError('Variable "totalPages" does not exist.', 1552, $this->source); })()), ((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 1552, $this->source); })()) + 2))));
            foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
                // line 1553
                yield "                    ";
                if (($context["p"] == (isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 1553, $this->source); })()))) {
                    // line 1554
                    yield "                        <li class=\"active\"><a href=\"#\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["p"], "html", null, true);
                    yield "</a></li>
                    ";
                } else {
                    // line 1556
                    yield "                        <li><a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("psycho_events_index", ["page" => $context["p"], "limit" => (isset($context["currentLimit"]) || array_key_exists("currentLimit", $context) ? $context["currentLimit"] : (function () { throw new RuntimeError('Variable "currentLimit" does not exist.', 1556, $this->source); })())]), "html", null, true);
                    yield "\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["p"], "html", null, true);
                    yield "</a></li>
                    ";
                }
                // line 1558
                yield "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['p'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 1559
            yield "                
                ";
            // line 1561
            yield "                ";
            if (((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 1561, $this->source); })()) < ((isset($context["totalPages"]) || array_key_exists("totalPages", $context) ? $context["totalPages"] : (function () { throw new RuntimeError('Variable "totalPages" does not exist.', 1561, $this->source); })()) - 2))) {
                // line 1562
                yield "                    ";
                if (((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 1562, $this->source); })()) < ((isset($context["totalPages"]) || array_key_exists("totalPages", $context) ? $context["totalPages"] : (function () { throw new RuntimeError('Variable "totalPages" does not exist.', 1562, $this->source); })()) - 3))) {
                    // line 1563
                    yield "                        <li class=\"disabled\"><a href=\"#\">...</a></li>
                    ";
                }
                // line 1565
                yield "                    <li><a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("psycho_events_index", ["page" => (isset($context["totalPages"]) || array_key_exists("totalPages", $context) ? $context["totalPages"] : (function () { throw new RuntimeError('Variable "totalPages" does not exist.', 1565, $this->source); })()), "limit" => (isset($context["currentLimit"]) || array_key_exists("currentLimit", $context) ? $context["currentLimit"] : (function () { throw new RuntimeError('Variable "currentLimit" does not exist.', 1565, $this->source); })())]), "html", null, true);
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalPages"]) || array_key_exists("totalPages", $context) ? $context["totalPages"] : (function () { throw new RuntimeError('Variable "totalPages" does not exist.', 1565, $this->source); })()), "html", null, true);
                yield "</a></li>
                ";
            }
            // line 1567
            yield "                
                ";
            // line 1569
            yield "                ";
            if (((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 1569, $this->source); })()) < (isset($context["totalPages"]) || array_key_exists("totalPages", $context) ? $context["totalPages"] : (function () { throw new RuntimeError('Variable "totalPages" does not exist.', 1569, $this->source); })()))) {
                // line 1570
                yield "                    <li><a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("psycho_events_index", ["page" => ((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 1570, $this->source); })()) + 1), "limit" => (isset($context["currentLimit"]) || array_key_exists("currentLimit", $context) ? $context["currentLimit"] : (function () { throw new RuntimeError('Variable "currentLimit" does not exist.', 1570, $this->source); })())]), "html", null, true);
                yield "\">→</a></li>
                ";
            } else {
                // line 1572
                yield "                    <li class=\"disabled\"><a href=\"#\">→</a></li>
                ";
            }
            // line 1574
            yield "            </div>
            
            <div class=\"page-info\">
                📖 Page <strong>";
            // line 1577
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["currentPage"]) || array_key_exists("currentPage", $context) ? $context["currentPage"] : (function () { throw new RuntimeError('Variable "currentPage" does not exist.', 1577, $this->source); })()), "html", null, true);
            yield "</strong> / <strong>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalPages"]) || array_key_exists("totalPages", $context) ? $context["totalPages"] : (function () { throw new RuntimeError('Variable "totalPages" does not exist.', 1577, $this->source); })()), "html", null, true);
            yield "</strong>
                &nbsp;&nbsp;|&nbsp;&nbsp;
                🎯 <strong>";
            // line 1579
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalItems"]) || array_key_exists("totalItems", $context) ? $context["totalItems"] : (function () { throw new RuntimeError('Variable "totalItems" does not exist.', 1579, $this->source); })()), "html", null, true);
            yield "</strong> événement";
            yield ((((isset($context["totalItems"]) || array_key_exists("totalItems", $context) ? $context["totalItems"] : (function () { throw new RuntimeError('Variable "totalItems" does not exist.', 1579, $this->source); })()) > 1)) ? ("s") : (""));
            yield " au total
            </div>
        </div>
        ";
        }
        // line 1583
        yield "
    </div>
</div>

<!-- Translation Modal -->
<div id=\"translationModal\" class=\"translation-modal\">
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
<div id=\"colorblindModal\" class=\"colorblind-modal\">
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

<!-- Speech Toast Notification -->
<div id=\"speechToast\" class=\"speech-toast\">
    <span>🎤</span>
    <span id=\"speechToastMessage\">Lecture en cours...</span>
</div>

<!-- Create Event Modal -->
<div class=\"modal fade\" id=\"createEventModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-lg modal-dialog-scrollable\">
        <div class=\"modal-content\" style=\"border-radius: 20px;\">
            <div class=\"modal-header\" style=\"background: linear-gradient(135deg, #285921, #3d7e33); color: white; border-radius: 20px 20px 0 0;\">
                <h5 class=\"modal-title\">➕ Créer un nouvel atelier</h5>
                <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body\" style=\"background: #F5F1E6;\">
                <style>
                    .cf-label { font-weight: bold; color: #5c715a; }
                    .cf-input {
                        width: 100%; padding: 10px; border-radius: 5px;
                        border: 1px solid #d2e0cf; transition: all 0.3s ease;
                        background: white;
                    }
                    .cf-input:focus { border-color: #285921; outline: none; box-shadow: 0 0 0 3px rgba(40,89,33,0.1); }
                    .cf-input.cf-valid   { border: 2px solid green; }
                    .cf-input.cf-invalid { border: 2px solid red; }
                    .cf-input.cf-warning { border: 2px solid orange; }
                    .cf-input.cf-suggestion { border: 2px solid #4CAF50; background: #f0f7f0; }
                    .cf-btn-correct {
                        background: #2196F3; color: white; font-weight: bold;
                        padding: 9px 12px; border-radius: 5px; font-size: 12px;
                        border: none; cursor: pointer; white-space: nowrap; width: 100%;
                        transition: all 0.3s;
                    }
                    .cf-btn-correct:hover:not(:disabled) { background: #1976D2; }
                    .cf-btn-correct:disabled { opacity: 0.5; cursor: not-allowed; }
                    .cf-spinner {
                        width: 22px; height: 22px; border: 3px solid #eee;
                        border-top: 3px solid #285921; border-radius: 50%;
                        animation: cf-spin 1s linear infinite; display: inline-block;
                    }
                    @keyframes cf-spin { to { transform: rotate(360deg); } }
                    .cf-plan-section { background: #fcfaf7; padding: 15px; border-radius: 10px; border: 1px solid #d2e0cf; }
                </style>

                <div class=\"row mb-3 align-items-center\">
                    <div class=\"col-md-3\"><label class=\"cf-label\">Titre *</label></div>
                    <div class=\"col-md-7\"><input type=\"text\" id=\"cf-title\" class=\"cf-input\" placeholder=\"Ex: Atelier sur l'égoïsme\"></div>
                    <div class=\"col-md-2\"><button type=\"button\" id=\"cf-btnCorrectTitle\" class=\"cf-btn-correct\" disabled>🔍 Corriger</button></div>
                </div>

                <div class=\"row mb-3\">
                    <div class=\"col-md-3\"></div>
                    <div class=\"col-md-9 d-flex align-items-center gap-2\">
                        <div id=\"cf-loading\" class=\"cf-spinner\" style=\"display:none!important;\"></div>
                        <button type=\"button\" id=\"cf-btnGenerate\" class=\"btn w-100\" style=\"background:#7f9a7d;color:white;font-weight:bold;border-radius:5px;\">✨ Générer la planification</button>
                    </div>
                </div>

                <div class=\"row mb-3 align-items-center\">
                    <div class=\"col-md-3\"><label class=\"cf-label\">Lieu *</label></div>
                    <div class=\"col-md-9\"><input type=\"text\" id=\"cf-location\" class=\"cf-input\" placeholder=\"Ex: Salle de méditation, Paris\"></div>
                </div>

                <div class=\"row mb-3 align-items-center\">
                    <div class=\"col-md-3\"><label class=\"cf-label\">Date *</label></div>
                    <div class=\"col-md-3\">
                        <input type=\"date\" id=\"cf-date\" class=\"cf-input\">
                        <div id=\"cf-dateMsg\" style=\"font-size:12px;color:#c0392b;margin-top:4px;display:none;\"></div>
                    </div>
                    <div class=\"col-md-3\"><label class=\"cf-label\">Participants max *</label></div>
                    <div class=\"col-md-3\"><input type=\"number\" id=\"cf-maxPart\" class=\"cf-input\" value=\"30\" placeholder=\"Ex: 20\"></div>
                </div>

                <div class=\"row mb-3 align-items-center\">
                    <div class=\"col-md-3\"><label class=\"cf-label\">Image URL</label></div>
                    <div class=\"col-md-9\"><input type=\"text\" id=\"cf-link\" class=\"cf-input\" placeholder=\"URL de l'image\"></div>
                </div>

                <div class=\"cf-plan-section mb-3\">
                    <div class=\"d-flex justify-content-between align-items-center mb-3\">
                        <label style=\"font-size:15px;font-weight:bold;color:#5c715a;\">📋 Planification de l'atelier</label>
                        <span id=\"cf-suggestionLabel\" style=\"display:none;color:#4CAF50;font-style:italic;font-weight:bold;\">(Suggestion IA)</span>
                    </div>

                    <div class=\"row mb-3 align-items-center\">
                        <div class=\"col-md-3\"><label class=\"cf-label\">Description</label></div>
                        <div class=\"col-md-7\"><input type=\"text\" id=\"cf-planDesc\" class=\"cf-input\" placeholder=\"Ex: Séance de méditation guidée\"></div>
                        <div class=\"col-md-2\"><button type=\"button\" id=\"cf-btnCorrectDesc\" class=\"cf-btn-correct\" disabled>🔍 Corriger</button></div>
                    </div>

                    <div class=\"row mb-2 align-items-center\">
                        <div class=\"col-md-3\"><label class=\"cf-label\">Durée</label></div>
                        <div class=\"col-md-9\"><input type=\"text\" id=\"cf-planDuree\" class=\"cf-input\" placeholder=\"Ex: 2 heures\"></div>
                    </div>

                    <div class=\"d-flex justify-content-end gap-2 mt-2\">
                        <button type=\"button\" id=\"cf-btnAccept\" class=\"btn btn-success btn-sm\" style=\"display:none;\">✓ Accepter la suggestion</button>
                        <button type=\"button\" id=\"cf-btnReject\" class=\"btn btn-danger btn-sm\" style=\"display:none;\">✗ Rejeter</button>
                    </div>
                </div>

                <div id=\"cf-errorBox\" class=\"alert alert-danger\" style=\"display:none;border-radius:10px;\"></div>

                <div class=\"d-flex gap-3 justify-content-center mt-3\">
                    <button type=\"button\" id=\"cf-btnSave\" class=\"btn\" style=\"background:#7f9a7d;color:white;font-weight:bold;padding:12px 30px;border-radius:8px;\">💾 Sauvegarder</button>
                    <button type=\"button\" class=\"btn\" data-bs-dismiss=\"modal\" style=\"background:#b7c9b5;color:white;font-weight:bold;padding:12px 30px;border-radius:8px;\">✖ Annuler</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Correction Dialog -->
<div id=\"cf-correctionDialog\" style=\"display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.5);z-index:10000;justify-content:center;align-items:center;\">
    <div style=\"background:white;border-radius:15px;padding:25px;max-width:480px;width:90%;\">
        <h5 class=\"mb-3\">Proposition de correction</h5>
        <div class=\"mb-3\">
            <label class=\"fw-bold\">📝 Texte original :</label>
            <div id=\"cf-origText\" class=\"p-2 mt-1\" style=\"background:#fff0f0;border-radius:8px;\"></div>
        </div>
        <div class=\"mb-3\">
            <label class=\"fw-bold\">✅ Texte corrigé :</label>
            <div id=\"cf-corrText\" class=\"p-2 mt-1\" style=\"background:#f0fff0;border-radius:8px;color:#4CAF50;font-weight:bold;\"></div>
        </div>
        <div class=\"d-flex gap-3 justify-content-end\">
            <button id=\"cf-acceptCorr\" class=\"btn btn-success\">✓ Accepter</button>
            <button id=\"cf-rejectCorr\" class=\"btn btn-secondary\">✗ Garder l'original</button>
        </div>
    </div>
</div>

<!-- Edit Event Modal -->
<div class=\"modal fade\" id=\"editEventModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-lg modal-dialog-scrollable\">
        <div class=\"modal-content\" style=\"border-radius: 20px;\">
            <div class=\"modal-header\" style=\"background: linear-gradient(135deg, #2196F3, #1976D2); color: white; border-radius: 20px 20px 0 0;\">
                <h5 class=\"modal-title\">✏️ Modifier l'événement</h5>
                <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body\" style=\"background: #F5F1E6;\">
                <style>
                    .ef-label { font-weight: bold; color: #5c715a; }
                    .ef-input {
                        width: 100%; padding: 10px; border-radius: 5px;
                        border: 1px solid #d2e0cf; transition: all 0.3s ease; background: white;
                    }
                    .ef-input:focus { border-color: #285921; outline: none; box-shadow: 0 0 0 3px rgba(40,89,33,0.1); }
                    .ef-plan-section { background: #fcfaf7; padding: 15px; border-radius: 10px; border: 1px solid #d2e0cf; }
                </style>

                <input type=\"hidden\" id=\"ef-id\">
                <input type=\"hidden\" id=\"ef-planId\">

                <div class=\"row mb-3 align-items-center\">
                    <div class=\"col-md-3\"><label class=\"ef-label\">Titre *</label></div>
                    <div class=\"col-md-9\"><input type=\"text\" id=\"ef-title\" class=\"ef-input\" placeholder=\"Ex: Atelier sur l'égoïsme\"></div>
                </div>

                <div class=\"row mb-3 align-items-center\">
                    <div class=\"col-md-3\"><label class=\"ef-label\">Lieu *</label></div>
                    <div class=\"col-md-9\"><input type=\"text\" id=\"ef-location\" class=\"ef-input\" placeholder=\"Ex: Salle de méditation\"></div>
                </div>

                <div class=\"row mb-3 align-items-center\">
                    <div class=\"col-md-3\"><label class=\"ef-label\">Date *</label></div>
                    <div class=\"col-md-3\"><input type=\"date\" id=\"ef-date\" class=\"ef-input\"></div>
                    <div class=\"col-md-3\"><label class=\"ef-label\">Participants max *</label></div>
                    <div class=\"col-md-3\"><input type=\"number\" id=\"ef-maxPart\" class=\"ef-input\" placeholder=\"Ex: 20\"></div>
                </div>

                <div class=\"row mb-3 align-items-center\">
                    <div class=\"col-md-3\"><label class=\"ef-label\">Image URL</label></div>
                    <div class=\"col-md-9\"><input type=\"text\" id=\"ef-link\" class=\"ef-input\" placeholder=\"URL de l'image\"></div>
                </div>

                <div class=\"ef-plan-section mb-3\">
                    <label style=\"font-size:15px;font-weight:bold;color:#5c715a;\" class=\"mb-3 d-block\">📋 Planification</label>
                    <div class=\"row mb-3 align-items-center\">
                        <div class=\"col-md-3\"><label class=\"ef-label\">Description</label></div>
                        <div class=\"col-md-9\"><input type=\"text\" id=\"ef-planDesc\" class=\"ef-input\" placeholder=\"Ex: Séance de méditation guidée\"></div>
                    </div>
                    <div class=\"row align-items-center\">
                        <div class=\"col-md-3\"><label class=\"ef-label\">Durée</label></div>
                        <div class=\"col-md-9\"><input type=\"text\" id=\"ef-planDuree\" class=\"ef-input\" placeholder=\"Ex: 2 heures\"></div>
                    </div>
                    <p class=\"text-muted mt-2 mb-0\" style=\"font-size:12px;\">💡 Laissez les deux champs vides pour supprimer la planification.</p>
                </div>

                <div id=\"ef-errorBox\" class=\"alert alert-danger\" style=\"display:none;border-radius:10px;\"></div>

                <div class=\"d-flex gap-3 justify-content-center mt-3\">
                    <button type=\"button\" id=\"ef-btnSave\" class=\"btn\" style=\"background:#2196F3;color:white;font-weight:bold;padding:12px 30px;border-radius:8px;\">💾 Mettre à jour</button>
                    <button type=\"button\" class=\"btn\" data-bs-dismiss=\"modal\" style=\"background:#b22222;color:white;font-weight:bold;padding:12px 30px;border-radius:8px;\">✖ Annuler</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Status Management Modal -->
<div class=\"modal fade\" id=\"statusModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-dialog-centered\" style=\"max-width: 450px;\">
        <div class=\"modal-content\" style=\"border-radius: 15px; overflow: hidden;\">
            <div class=\"modal-header\" style=\"background: linear-gradient(135deg, #4A90E2, #357ABD); color: white;\">
                <h5 class=\"modal-title\">📊 Gérer le statut</h5>
                <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body\" style=\"background: #F5F1E6; padding: 25px;\">
                <p id=\"statusEventTitle\" style=\"font-weight: bold; color: #285921; margin-bottom: 20px; text-align: center;\"></p>
                
                <div class=\"status-options\">
                    <div class=\"status-option\" data-status=\"upcoming\" onclick=\"selectStatus('upcoming')\">
                        <div style=\"display: flex; align-items: center; gap: 15px; padding: 12px; border-radius: 10px; cursor: pointer; transition: all 0.3s;\">
                            <div style=\"width: 40px; height: 40px; border-radius: 50%; background: #4A90E2; display: flex; align-items: center; justify-content: center; font-size: 20px;\">📅</div>
                            <div>
                                <div style=\"font-weight: bold;\">À venir</div>
                                <div style=\"font-size: 11px; color: #8b9a8b;\">L'événement est planifié</div>
                            </div>
                        </div>
                    </div>
                    <div class=\"status-option\" data-status=\"ongoing\" onclick=\"selectStatus('ongoing')\">
                        <div style=\"display: flex; align-items: center; gap: 15px; padding: 12px; border-radius: 10px; cursor: pointer; transition: all 0.3s;\">
                            <div style=\"width: 40px; height: 40px; border-radius: 50%; background: #4CAF50; display: flex; align-items: center; justify-content: center; font-size: 20px;\">🟢</div>
                            <div>
                                <div style=\"font-weight: bold;\">En cours</div>
                                <div style=\"font-size: 11px; color: #8b9a8b;\">L'événement se déroule actuellement</div>
                            </div>
                        </div>
                    </div>
                    <div class=\"status-option\" data-status=\"completed\" onclick=\"selectStatus('completed')\">
                        <div style=\"display: flex; align-items: center; gap: 15px; padding: 12px; border-radius: 10px; cursor: pointer; transition: all 0.3s;\">
                            <div style=\"width: 40px; height: 40px; border-radius: 50%; background: #9E9E9E; display: flex; align-items: center; justify-content: center; font-size: 20px;\">✅</div>
                            <div>
                                <div style=\"font-weight: bold;\">Terminé</div>
                                <div style=\"font-size: 11px; color: #8b9a8b;\">L'événement est terminé</div>
                            </div>
                        </div>
                    </div>
                    <div class=\"status-option\" data-status=\"cancelled\" onclick=\"selectStatus('cancelled')\">
                        <div style=\"display: flex; align-items: center; gap: 15px; padding: 12px; border-radius: 10px; cursor: pointer; transition: all 0.3s;\">
                            <div style=\"width: 40px; height: 40px; border-radius: 50%; background: #f44336; display: flex; align-items: center; justify-content: center; font-size: 20px;\">❌</div>
                            <div>
                                <div style=\"font-weight: bold;\">Annulé</div>
                                <div style=\"font-size: 11px; color: #8b9a8b;\">L'événement a été annulé</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div id=\"statusWarning\" style=\"display: none; margin-top: 15px; padding: 10px; background: #fff3cd; border-radius: 8px; font-size: 12px; color: #856404;\">
                    ⚠️ Changer le statut enverra une notification à tous les participants.
                </div>
            </div>
            <div class=\"modal-footer\" style=\"justify-content: center; gap: 15px; padding: 20px;\">
                <button type=\"button\" class=\"btn\" data-bs-dismiss=\"modal\" style=\"background: #e0e0e0; border-radius: 25px; padding: 10px 30px;\">Annuler</button>
                <button type=\"button\" id=\"confirmStatusBtn\" class=\"btn\" style=\"background: linear-gradient(135deg, #4A90E2, #357ABD); color: white; border-radius: 25px; padding: 10px 30px;\">Confirmer</button>
            </div>
        </div>
    </div>
</div>

<style>
.status-option {
    margin-bottom: 8px;
    border: 2px solid transparent;
    border-radius: 10px;
    transition: all 0.3s;
}
.status-option:hover {
    background: rgba(74, 144, 226, 0.1);
    transform: translateX(5px);
}
.status-option.selected {
    border-color: #4A90E2;
    background: rgba(74, 144, 226, 0.15);
}
</style>

<!-- AI Assistant Modal -->
<div class=\"modal fade\" id=\"aiAssistantModal\" tabindex=\"-1\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\" style=\"border-radius: 20px;\">
            <div class=\"modal-header\" style=\"background: linear-gradient(135deg, #4A90E2, #357ABD); color: white; border-radius: 20px 20px 0 0;\">
                <h5 class=\"modal-title\">🤖 Assistant Événementiel</h5>
                <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body\">
                <div id=\"chatMessages\" style=\"height: 400px; overflow-y: auto; border: 1px solid #ddd; border-radius: 10px; padding: 15px; margin-bottom: 15px;\">
                    <div class=\"text-muted text-center\">Posez-moi une question sur les événements !</div>
                </div>
                <div class=\"input-group\">
                    <input type=\"text\" id=\"chatInput\" class=\"form-control\" placeholder=\"Votre question...\" style=\"border-radius: 10px 0 0 10px;\">
                    <button class=\"btn\" id=\"sendChatBtn\" style=\"background: #4A90E2; color: white; border-radius: 0 10px 10px 0;\">Envoyer</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Notifications Modal -->
<div class=\"modal fade\" id=\"notificationsModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-lg modal-dialog-scrollable\">
        <div class=\"modal-content\" style=\"border-radius:20px;overflow:hidden;\">
            <div class=\"modal-header\" style=\"background:linear-gradient(135deg,#285921,#3d7e33);color:white;border:none;\">
                <div class=\"d-flex align-items-center gap-3\">
                    <span style=\"font-size:22px;\">🔔</span>
                    <div>
                        <h5 class=\"modal-title mb-0\">Notifications de participations</h5>
                        <small style=\"opacity:.8;\">Nouvelles inscriptions à vos événements</small>
                    </div>
                    <span id=\"nm-unreadBadge\" class=\"badge rounded-pill\" style=\"background:#4CAF50;font-size:13px;padding:5px 12px;\">0</span>
                </div>
                <button type=\"button\" class=\"btn-close btn-close-white ms-auto\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body p-0\" style=\"background:#f9f7f4;\">
                <div class=\"d-flex align-items-center gap-2 p-3 border-bottom\" style=\"background:white;\">
                    <div style=\"display:flex;align-items:center;background:#f5f5f5;border-radius:20px;padding:6px 14px;flex:1;\">
                        <span style=\"color:#8b9a8b;margin-right:6px;\">🔍</span>
                        <input type=\"text\" id=\"nm-search\" placeholder=\"Rechercher...\" style=\"border:none;outline:none;background:transparent;font-size:13px;width:100%;\">
                    </div>
                    <button id=\"nm-markAll\" class=\"btn btn-sm\" style=\"background:#374535;color:white;border-radius:20px;font-size:12px;white-space:nowrap;\">✅ Tout marquer lu</button>
                    <button id=\"nm-refresh\" class=\"btn btn-sm\" style=\"background:#4CAF50;color:white;border-radius:20px;font-size:12px;\">🔄</button>
                </div>
                <div style=\"overflow-x:auto;\">
                    <table style=\"width:100%;border-collapse:collapse;background:white;\">
                        <thead>
                            <tr style=\"background:#f0ede5;\">
                                <th style=\"padding:10px 15px;text-align:left;font-size:12px;font-weight:bold;color:#285921;border-bottom:2px solid #e0d9cc;\">Message</th>
                                <th style=\"padding:10px 15px;text-align:left;font-size:12px;font-weight:bold;color:#285921;border-bottom:2px solid #e0d9cc;width:130px;\">Date</th>
                                <th style=\"padding:10px 15px;text-align:left;font-size:12px;font-weight:bold;color:#285921;border-bottom:2px solid #e0d9cc;width:100px;\">Statut</th>
                                <th style=\"padding:10px 15px;text-align:left;font-size:12px;font-weight:bold;color:#285921;border-bottom:2px solid #e0d9cc;width:120px;\">Action</th>
                            </tr>
                        </thead>
                        <tbody id=\"nm-tbody\">
                            <tr><td colspan=\"4\" style=\"text-align:center;padding:30px;color:#8b9a8b;\">Chargement...<\\/td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Notification Detail Modal -->
<div class=\"modal fade\" id=\"nm-detailModal\" tabindex=\"-1\" style=\"z-index:10060;\">
    <div class=\"modal-dialog modal-dialog-centered\" style=\"max-width:500px;\">
        <div class=\"modal-content\" style=\"border-radius:15px;overflow:hidden;border:1px solid #d4c9b8;\">
            <div id=\"nm-detailBody\" style=\"background:#f9f7f4;\">
                <div style=\"text-align:center;padding:40px;color:#8b9a8b;\">Chargement...</div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class=\"modal fade\" id=\"deleteConfirmModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-dialog-centered\" style=\"max-width: 420px;\">
        <div class=\"modal-content\" style=\"border-radius: 16px; overflow: hidden;\">
            <div class=\"modal-header\" style=\"background: #f44336; color: white; border: none;\">
                <h5 class=\"modal-title\">🗑️ Confirmer la suppression</h5>
                <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body text-center py-4\">
                <div style=\"font-size: 48px; margin-bottom: 12px;\">⚠️</div>
                <p style=\"font-size: 15px; color: #333;\">Êtes-vous sûr de vouloir supprimer cet événement ?</p>
                <p class=\"text-muted\" style=\"font-size: 13px;\">Cette action est irréversible.</p>
            </div>
            <div class=\"modal-footer justify-content-center border-0 pb-4\">
                <button type=\"button\" class=\"btn\" data-bs-dismiss=\"modal\" style=\"background: #e0e0e0; color: #333; border-radius: 10px; padding: 10px 28px; font-weight: bold;\">Annuler</button>
                <button type=\"button\" id=\"confirmDeleteBtn\" class=\"btn\" style=\"background: #f44336; color: white; border-radius: 10px; padding: 10px 28px; font-weight: bold;\">Supprimer</button>
            </div>
        </div>
    </div>
</div>

<!-- QR Code Modal -->
<div class=\"modal fade\" id=\"qrCodeModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-dialog-centered\" style=\"max-width: 380px;\">
        <div class=\"modal-content\" style=\"border-radius: 20px; overflow: hidden;\">
            <div class=\"modal-header\" style=\"background: linear-gradient(135deg, #285921, #3d7e33); color: white; border: none;\">
                <h5 class=\"modal-title\">📍 QR Code — Localisation</h5>
                <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body text-center py-4\">
                <div id=\"qrLoading\" style=\"font-size: 14px; color: #888; margin-bottom: 12px;\">⏳ Génération du QR code...</div>
                <div id=\"qrContent\" style=\"display:none;\">
                    <h6 id=\"qrTitle\" style=\"color:#285921; font-weight:bold; margin-bottom:4px;\"></h6>
                    <p id=\"qrLocation\" style=\"font-size:13px; color:#69685c; margin-bottom:16px;\"></p>
                    <div id=\"qrImage\" style=\"width:220px; height:220px; border-radius:12px; border:2px solid #e0d9cc; margin:0 auto; background:white; padding:8px;\"></div>
                    <div class=\"mt-3\">
                        <a id=\"qrMapsLink\" href=\"#\" target=\"_blank\" class=\"btn btn-sm\" style=\"background:#285921; color:white; border-radius:20px; padding:8px 20px; text-decoration:none; font-size:13px;\">
                            🗺️ Ouvrir dans Google Maps
                        </a>
                    </div>
                </div>
                <div id=\"qrError\" style=\"display:none; color:#f44336; font-size:13px;\">❌ Impossible de charger le QR code.</div>
            </div>
        </div>
    </div>
</div>

";
        // line 2068
        yield "<div id=\"aiDrawerOverlay\" onclick=\"closeAIPanel()\" style=\"display:none;position:fixed;inset:0;background:rgba(0,0,0,.45);z-index:1040;\"></div>
<div id=\"aiDrawer\" style=\"display:none;position:fixed;top:0;right:0;width:min(680px,100vw);height:100vh;background:#f5f3ed;z-index:1050;box-shadow:-8px 0 30px rgba(0,0,0,.2);overflow-y:auto;flex-direction:column;\">
    <div style=\"padding:20px 24px;background:linear-gradient(135deg,rgba(255,255,255,.98),rgba(245,241,237,.98));border-bottom:1px solid #d2e0cf;display:flex;align-items:center;justify-content:space-between;\">
        <div class=\"d-flex align-items-center gap-3\">
            <div style=\"width:50px;height:50px;background:linear-gradient(135deg,#9cb39b,#7f9a7d);border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:26px;\">🌿</div>
            <div>
                <div style=\"font-weight:bold;font-size:18px;color:#5c715a;\">ASSISTANT BIEN-ÊTRE</div>
                <div style=\"font-size:12px;color:#8a9a87;\">Planification d'événements apaisants</div>
            </div>
        </div>
        <button onclick=\"closeAIPanel()\" style=\"background:#f0f1ec;border:1px solid #d2e0cf;border-radius:50%;width:36px;height:36px;font-size:18px;cursor:pointer;\">✕</button>
    </div>
    <div style=\"padding:20px 24px;\">
        <div style=\"background:rgba(159,185,151,.15);border-radius:14px;padding:12px 16px;margin-bottom:16px;\">
            <span style=\"font-size:13px;font-weight:bold;color:#5c715a;\">🍃 +420 séances planifiées cette semaine</span>
        </div>
        <div style=\"background:#fcfaf7;border-radius:20px;border:1px solid #d2e0cf;padding:16px;margin-bottom:14px;\">
            <div style=\"font-size:12px;font-weight:bold;color:#5c715a;margin-bottom:10px;\">🔍 FILTRES</div>
            <div class=\"row g-2\">
                <div class=\"col-md-4\">
                    <label style=\"font-size:11px;font-weight:bold;color:#7f9a7d;\">TYPE</label>
                    <select class=\"ai-select\" id=\"ai-eventType\" style=\"background:#f0f1ec;border:1px solid #d2e0cf;border-radius:20px;padding:9px 14px;width:100%;\">
                        <option value=\"\">Sélectionner</option>
                        <option value=\"Bien-être et Méditation\">🧘 Bien-être &amp; Méditation</option>
                        <option value=\"Retraite et Nature\">🌿 Retraite &amp; Nature</option>
                        <option value=\"Ateliers et Cercles\">🌸 Ateliers &amp; Cercles</option>
                    </select>
                </div>
                <div class=\"col-md-4\">
                    <label style=\"font-size:11px;font-weight:bold;color:#7f9a7d;\">BUDGET</label>
                    <select class=\"ai-select\" id=\"ai-budget\" style=\"background:#f0f1ec;border:1px solid #d2e0cf;border-radius:20px;padding:9px 14px;width:100%;\">
                        <option value=\"\">Sélectionner</option>
                        <option value=\"Moins de 500 euros\">💰 &lt; 500 €</option>
                        <option value=\"500 à 2000 euros\">💰 500 - 2 000 €</option>
                    </select>
                </div>
                <div class=\"col-md-4\">
                    <label style=\"font-size:11px;font-weight:bold;color:#7f9a7d;\">PARTICIPANTS</label>
                    <select class=\"ai-select\" id=\"ai-audience\" style=\"background:#f0f1ec;border:1px solid #d2e0cf;border-radius:20px;padding:9px 14px;width:100%;\">
                        <option value=\"\">Sélectionner</option>
                        <option value=\"Intime moins de 20\">👥 Intime (&lt;20)</option>
                        <option value=\"Petit 20 à 50\">👥 Petit (20-50)</option>
                    </select>
                </div>
            </div>
        </div>
        <div style=\"background:#fcfaf7;border-radius:20px;border:1px solid #d2e0cf;padding:16px;margin-bottom:14px;\">
            <label style=\"font-weight:bold;font-size:13px;color:#5c715a;\">TYPE D'ACCOMPAGNEMENT</label>
            <select class=\"ai-select\" id=\"ai-helpType\" style=\"background:#f0f1ec;border:1px solid #d2e0cf;border-radius:20px;padding:9px 14px;width:100%;margin-top:8px;\">
                <option value=\"Idées de thèmes\">🎯 Idées de thèmes</option>
                <option value=\"Planification budgétaire\">💰 Budget</option>
                <option value=\"Suggestions d'activités\">✨ Activités</option>
                <option value=\"Plan complet\">📋 Plan complet</option>
            </select>
        </div>
        <div style=\"background:#fcfaf7;border-radius:20px;border:1px solid #d2e0cf;padding:16px;margin-bottom:14px;\">
            <label style=\"font-weight:bold;font-size:13px;color:#5c715a;\">VOTRE INTENTION</label>
            <textarea id=\"ai-description\" class=\"ai-textarea mt-2\" rows=\"3\" placeholder=\"Décrivez votre événement...\" style=\"background:#f0f1ec;border:1px solid #d2e0cf;border-radius:16px;width:100%;padding:10px;\"></textarea>
        </div>
        <div class=\"d-flex justify-content-center gap-3 mb-3\">
            <button class=\"ai-btn-primary\" onclick=\"aiGenerate()\" style=\"background:linear-gradient(135deg,#7f9a7d,#5c715a);color:white;border:none;border-radius:25px;padding:12px 35px;font-weight:bold;\">🌿 GÉNÉRER</button>
            <button class=\"ai-btn-secondary\" onclick=\"aiClear()\" style=\"background:#f0f1ec;color:#5c715a;border:1px solid #d2e0cf;border-radius:25px;padding:12px 25px;\">🍃 Effacer</button>
        </div>
        <div id=\"ai-loadingBar\" style=\"display:none;text-align:center;padding:10px;color:#7f9a7d;\">⏳ Génération en cours...</div>
        <div style=\"background:#fcfaf7;border-radius:20px;border:1px solid #d2e0cf;padding:16px;\">
            <textarea id=\"ai-result\" class=\"ai-result\" readonly rows=\"8\" style=\"background:#f0f1ec;border:1px solid #d2e0cf;border-radius:16px;width:100%;padding:12px;\"></textarea>
            <div class=\"d-flex gap-2 mt-2 justify-content-end\">
                <button class=\"ai-btn-sm\" onclick=\"aiCopy()\" style=\"background:#e2f0e0;color:#5c715a;border:1px solid #d2e0cf;border-radius:20px;padding:6px 14px;\">📋 Copier</button>
                <button class=\"ai-btn-sm\" onclick=\"aiSaveFav()\" style=\"background:#e2f0e0;color:#5c715a;border:1px solid #d2e0cf;border-radius:20px;padding:6px 14px;\">⭐ Favoris</button>
            </div>
        </div>
    </div>
</div>

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 2144
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

        // line 2145
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js\"></script>
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js\"></script>
<script>
    let likedEventIds = new Set();
    let currentUserId = ";
        // line 2150
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 2150, $this->source); })()), "user", [], "any", false, false, false, 2150)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 2150, $this->source); })()), "user", [], "any", false, false, false, 2150), "id", [], "any", false, false, false, 2150), "html", null, true)) : (0));
        yield ";
    let currentSpeechUtterance = null;
    let activeMicButton = null;

    // ========== STATUS MANAGEMENT VARIABLES ==========
    let currentEventId = null;
    let currentSelectedStatus = null;

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

    // ========== OPEN STATUS MODAL ==========
    function openStatusModal(eventId, title, currentStatus) {
        currentEventId = eventId;
        currentSelectedStatus = currentStatus;
        
        document.getElementById('statusEventTitle').textContent = title;
        
        // Reset selection
        document.querySelectorAll('.status-option').forEach(opt => opt.classList.remove('selected'));
        document.querySelector(`.status-option[data-status=\"\${currentStatus}\"]`).classList.add('selected');
        
        // Hide warning initially
        document.getElementById('statusWarning').style.display = 'none';
        
        new bootstrap.Modal(document.getElementById('statusModal')).show();
    }

    // ========== SELECT STATUS ==========
    window.selectStatus = function(status) {
        document.querySelectorAll('.status-option').forEach(opt => opt.classList.remove('selected'));
        document.querySelector(`.status-option[data-status=\"\${status}\"]`).classList.add('selected');
        currentSelectedStatus = status;
        document.getElementById('statusWarning').style.display = 'block';
    };

    // ========== CONFIRM STATUS CHANGE ==========
    document.getElementById('confirmStatusBtn')?.addEventListener('click', async function() {
        if (!currentEventId || !currentSelectedStatus) return;
        
        const btn = this;
        const originalText = btn.textContent;
        btn.disabled = true;
        btn.textContent = '⏳ Mise à jour...';
        
        try {
            const response = await fetch(`/psycho/evente/\${currentEventId}/status`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ status: currentSelectedStatus })
            });
            const data = await response.json();
            
            if (data.success) {
                bootstrap.Modal.getInstance(document.getElementById('statusModal')).hide();
                showNotification('✅ Statut mis à jour avec succès !', 'success');
                setTimeout(() => location.reload(), 1500);
            } else {
                showNotification('❌ Erreur: ' + (data.error || 'Inconnue'), 'error');
            }
        } catch (error) {
            showNotification('❌ Erreur réseau', 'error');
        } finally {
            btn.disabled = false;
            btn.textContent = originalText;
        }
    });

    // ========== TRANSLATION FUNCTIONS ==========
    const languages = [
        { code: 'fr', name: 'Français',    flag: '🇫🇷', native: 'Français' },
        { code: 'en', name: 'English',     flag: '🇬🇧', native: 'English' },
        { code: 'es', name: 'Español',     flag: '🇪🇸', native: 'Español' },
        { code: 'de', name: 'Deutsch',     flag: '🇩🇪', native: 'Deutsch' },
        { code: 'it', name: 'Italiano',    flag: '🇮🇹', native: 'Italiano' },
        { code: 'pt', name: 'Português',   flag: '🇵🇹', native: 'Português' },
        { code: 'nl', name: 'Nederlands',  flag: '🇳🇱', native: 'Nederlands' },
        { code: 'ru', name: 'Русский',     flag: '🇷🇺', native: 'Русский' },
        { code: 'ar', name: 'العربية',     flag: '🇸🇦', native: 'العربية' },
        { code: 'zh', name: '中文',         flag: '🇨🇳', native: '中文' },
        { code: 'ja', name: '日本語',       flag: '🇯🇵', native: '日本語' },
        { code: 'ko', name: '한국어',       flag: '🇰🇷', native: '한국어' },
        { code: 'tr', name: 'Türkçe',      flag: '🇹🇷', native: 'Türkçe' },
        { code: 'el', name: 'Ελληνικά',    flag: '🇬🇷', native: 'Ελληνικά' },
        { code: 'hi', name: 'हिन्दी',      flag: '🇮🇳', native: 'हिन्दी' }
    ];

    // Store original text nodes so we can restore them
    const originalTexts = new Map();
    let currentLang = localStorage.getItem('preferredLanguage') || 'fr';

    // Collect all translatable text nodes (event titles, locations, labels)
    function getTranslatableNodes() {
        const selectors = [
            '.event-title', '.text', '.badge-new', '.more-plans',
            '.plan-preview-text', '.countdown-label', '.header-title',
            '.header-sub', '.search-input', '.event-count-badge'
        ];
        const nodes = [];
        selectors.forEach(function(sel) {
            document.querySelectorAll(sel).forEach(function(el) {
                if (el.childNodes.length === 1 && el.childNodes[0].nodeType === 3) {
                    nodes.push(el);
                }
            });
        });
        return nodes;
    }

    function googleTranslateElementInit() { /* no-op — not using Google Translate */ }

    function showTranslationModal() {
        const modal = document.getElementById('translationModal');
        const optionsContainer = document.getElementById('translationOptions');

        let html = '';
        languages.forEach(function(lang) {
            const activeClass = (currentLang === lang.code) ? 'active' : '';
            html += `<div class=\"translation-option \${activeClass}\" onclick=\"translatePage('\${lang.code}')\" data-lang=\"\${lang.code}\">
                        <div class=\"translation-option-icon\">\${lang.flag}</div>
                        <div class=\"translation-option-info\">
                            <div class=\"translation-option-title\">\${lang.name}</div>
                            <div class=\"translation-option-desc\">\${lang.native}</div>
                        </div>
                     </div>`;
        });
        optionsContainer.innerHTML = html;
        modal.style.display = 'flex';
    }

    function closeTranslationModal() {
        document.getElementById('translationModal').style.display = 'none';
    }

    async function translatePage(langCode) {
        closeTranslationModal();

        if (langCode === 'fr') { resetTranslation(); return; }

        currentLang = langCode;
        localStorage.setItem('preferredLanguage', langCode);

        showNotification('🌐 Traduction en cours...', 'success');

        // Collect nodes and batch-translate unique texts
        const nodes = getTranslatableNodes();
        const uniqueTexts = [];
        nodes.forEach(function(el) {
            const orig = el.getAttribute('data-orig') || el.textContent.trim();
            if (!el.getAttribute('data-orig')) el.setAttribute('data-orig', orig);
            if (orig && !uniqueTexts.includes(orig)) uniqueTexts.push(orig);
        });

        // Translate in small batches via MyMemory (free, no key needed)
        const translated = {};
        for (let i = 0; i < uniqueTexts.length; i += 5) {
            const batch = uniqueTexts.slice(i, i + 5);
            await Promise.all(batch.map(async function(text) {
                try {
                    const url = 'https://api.mymemory.translated.net/get?q='
                        + encodeURIComponent(text)
                        + '&langpair=fr|' + langCode;
                    const res  = await fetch(url);
                    const data = await res.json();
                    if (data.responseStatus === 200) {
                        translated[text] = data.responseData.translatedText;
                    }
                } catch(e) { /* keep original on error */ }
            }));
        }

        // Apply translations
        nodes.forEach(function(el) {
            const orig = el.getAttribute('data-orig') || el.textContent.trim();
            if (translated[orig]) el.textContent = translated[orig];
        });

        showNotification('✅ Page traduite en ' + getLanguageName(langCode), 'success');
    }

    function resetTranslation() {
        currentLang = 'fr';
        localStorage.setItem('preferredLanguage', 'fr');
        // Restore all original texts
        document.querySelectorAll('[data-orig]').forEach(function(el) {
            el.textContent = el.getAttribute('data-orig');
        });
        showNotification('🌐 Page réinitialisée en français', 'success');
        closeTranslationModal();
    }

    function getLanguageName(langCode) {
        const lang = languages.find(l => l.code === langCode);
        return lang ? lang.name : langCode;
    }

    function loadSavedLanguage() {
        const savedLang = localStorage.getItem('preferredLanguage');
        if (savedLang && savedLang !== 'fr') {
            const checkInterval = setInterval(function() {
                const selectFrame = document.querySelector('.goog-te-combo');
                if (selectFrame) {
                    clearInterval(checkInterval);
                    selectFrame.value = savedLang;
                    selectFrame.dispatchEvent(new Event('change'));
                }
            }, 500);
            setTimeout(() => clearInterval(checkInterval), 5000);
        }
    }

    // ========== COLOR BLINDNESS FUNCTIONS ==========
    function showColorBlindOptions() {
        const modal = document.getElementById('colorblindModal');
        modal.style.display = 'flex';
        
        const currentMode = localStorage.getItem('colorBlindMode') || 'normal';
        document.querySelectorAll('.colorblind-option').forEach(opt => opt.classList.remove('active'));
        const activeOpt = document.getElementById('opt-' + currentMode);
        if (activeOpt) activeOpt.classList.add('active');
    }

    function closeColorBlindModal() {
        document.getElementById('colorblindModal').style.display = 'none';
    }

    function setColorBlindMode(mode) {
        const body = document.body;
        body.classList.remove('protanopia', 'deuteranopia', 'tritanopia', 'achromatopsia', 'high-contrast');
        
        if (mode !== 'normal') {
            body.classList.add(mode);
        }
        
        localStorage.setItem('colorBlindMode', mode);
        
        document.querySelectorAll('.colorblind-option').forEach(opt => opt.classList.remove('active'));
        const activeOpt = document.getElementById('opt-' + mode);
        if (activeOpt) activeOpt.classList.add('active');
        
        showNotification('🎨 Mode ' + getModeName(mode) + ' activé', 'success');
    }

    function resetColorBlindMode() {
        const body = document.body;
        body.classList.remove('protanopia', 'deuteranopia', 'tritanopia', 'achromatopsia', 'high-contrast');
        localStorage.setItem('colorBlindMode', 'normal');
        
        document.querySelectorAll('.colorblind-option').forEach(opt => opt.classList.remove('active'));
        document.getElementById('opt-normal').classList.add('active');
        
        showNotification('🎨 Mode réinitialisé à la vision normale', 'success');
        closeColorBlindModal();
    }

    function getModeName(mode) {
        const names = {
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
        const savedMode = localStorage.getItem('colorBlindMode');
        if (savedMode && savedMode !== 'normal') {
            setColorBlindMode(savedMode);
        }
        loadSavedLanguage();
    });

    document.getElementById('colorblindModal')?.addEventListener('click', function(e) {
        if (e.target === this) closeColorBlindModal();
    });
    document.getElementById('translationModal')?.addEventListener('click', function(e) {
        if (e.target === this) closeTranslationModal();
    });

    // ========== SPEECH SYNTHESIS FUNCTION ==========
    function speakEventDetails(eventId) {
        const card = document.querySelector(`.event-card[data-event-id=\"\${eventId}\"]`);
        if (!card) return;
        
        const speechData = card.querySelector('.event-speech-data');
        if (!speechData) return;
        
        const title = speechData.dataset.title || \"Événement sans titre\";
        const date = speechData.dataset.date || \"Date non spécifiée\";
        const location = speechData.dataset.location || \"Lieu non spécifié\";
        const participants = speechData.dataset.participants || \"0 participants\";
        const plansCount = speechData.dataset.plansCount || \"0\";
        const plans = speechData.dataset.plans || \"\";
        
        let textToSpeak = `\${title}. Date : \${date}. Lieu : \${location}. Inscriptions : \${participants}. `;
        if (parseInt(plansCount) > 0) textToSpeak += `Au programme : \${plans}. `;
        textToSpeak += `Rejoignez-nous pour cet atelier bien-être sur NAFSEYTI !`;
        
        if (window.speechSynthesis) window.speechSynthesis.cancel();
        
        if (activeMicButton) activeMicButton.classList.remove('playing');
        
        const micButton = card.querySelector('.btn-mic');
        if (micButton) {
            activeMicButton = micButton;
            micButton.classList.add('playing');
        }
        
        const toast = document.getElementById('speechToast');
        const toastMessage = document.getElementById('speechToastMessage');
        toastMessage.textContent = `🔊 Lecture : \${title.substring(0, 40)}...`;
        toast.classList.add('show');
        
        const utterance = new SpeechSynthesisUtterance(textToSpeak);
        utterance.lang = 'fr-FR';
        utterance.rate = 0.9;
        utterance.pitch = 1.0;
        
        utterance.onend = function() {
            if (activeMicButton) activeMicButton.classList.remove('playing');
            activeMicButton = null;
            toast.classList.remove('show');
        };
        
        utterance.onerror = function() {
            if (activeMicButton) activeMicButton.classList.remove('playing');
            activeMicButton = null;
            toast.classList.remove('show');
            showNotification('❌ La synthèse vocale n\\'est pas disponible', 'error');
        };
        
        window.speechSynthesis.speak(utterance);
        currentSpeechUtterance = utterance;
    }

    if (!window.speechSynthesis) {
        document.querySelectorAll('.btn-mic').forEach(btn => {
            btn.style.opacity = '0.5';
            btn.title = 'Synthèse vocale non disponible';
            btn.disabled = true;
        });
    }

    // ========== NOTIFICATIONS FUNCTIONS ==========
    let nmAllNotifs = [];
    let nmLastUnread = 0;

    function nmPlaySound() {
        try {
            const ctx = new (window.AudioContext || window.webkitAudioContext)();
            const osc = ctx.createOscillator();
            const gain = ctx.createGain();
            osc.connect(gain); gain.connect(ctx.destination);
            osc.frequency.setValueAtTime(880, ctx.currentTime);
            osc.frequency.setValueAtTime(660, ctx.currentTime + 0.1);
            gain.gain.setValueAtTime(0.3, ctx.currentTime);
            gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + 0.4);
            osc.start(ctx.currentTime);
            osc.stop(ctx.currentTime + 0.4);
        } catch(e) {}
    }

    function nmUpdateBadge(unread) {
        const badge = document.getElementById('notificationBadge');
        if (unread > 0) {
            badge.textContent = unread;
            badge.style.display = 'inline-block';
        } else {
            badge.style.display = 'none';
        }
        const modalBadge = document.getElementById('nm-unreadBadge');
        if (modalBadge) modalBadge.textContent = unread + ' non lu' + (unread !== 1 ? 's' : '');
    }

    function nmLoad(silent) {
        fetch('";
        // line 2566
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("psycho_notifications_list");
        yield "')
            .then(r => r.json())
            .then(data => {
                const unread = data.unread || 0;
                if (!silent && unread > nmLastUnread) nmPlaySound();
                nmLastUnread = unread;
                nmAllNotifs = data.notifications || [];
                nmUpdateBadge(unread);
                nmRender(nmAllNotifs);
            }).catch(() => {});
    }

    function nmRender(rows) {
        const search = (document.getElementById('nm-search')?.value || '').toLowerCase();
        const tbody = document.getElementById('nm-tbody');
        if (!tbody) return;
        const filtered = rows.filter(n => !search || n.message.toLowerCase().includes(search));

        if (!filtered.length) {
            tbody.innerHTML = '<tr><td colspan=\"4\" style=\"text-align:center;padding:30px;color:#8b9a8b;\">Aucune notification<\\/td><\\/tr>';
            return;
        }

        tbody.innerHTML = filtered.map(n => {
            const isUnread = !parseInt(n.is_read);
            const d = new Date(n.created_at);
            const dateStr = d.toLocaleDateString('fr-FR', {day:'2-digit', month:'short'});
            const timeStr = d.toLocaleTimeString('fr-FR', {hour:'2-digit', minute:'2-digit'});
            const status = isUnread ? '<span style=\"color:#285921;font-weight:bold;\">🆕 Non lu</span>' : '<span style=\"color:#aaa;\">✅ Lu</span>';
            return `<tr style=\"background:\${isUnread ? '#f0fff4' : 'white'};\">
                <td style=\"padding:10px 15px;font-size:12px;\">\${nmEsc(n.message)}<\\/td>
                <td style=\"padding:10px 15px;font-size:11px;\">\${dateStr}<br>\${timeStr}<\\/td>
                <td style=\"padding:10px 15px;\">\${status}<\\/td>
                <td style=\"padding:10px 15px;\">
                    <button class=\"nm-detail-btn\" data-id=\"\${n.id}\" style=\"background:#374535;border:none;color:white;padding:5px 12px;border-radius:8px;cursor:pointer;\">👤 Voir détails<\\/button>
                <\\/td>
               <\\/tr>`;
        }).join('');
    }

    document.getElementById('nm-search')?.addEventListener('input', () => nmRender(nmAllNotifs));
    document.getElementById('nm-refresh')?.addEventListener('click', () => nmLoad(false));
    document.getElementById('nm-markAll')?.addEventListener('click', () => {
        fetch('";
        // line 2609
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("psycho_notifications_mark_all");
        yield "', {method:'POST'}).then(() => nmLoad(true));
    });

    document.getElementById('nm-tbody')?.addEventListener('click', (e) => {
        const btn = e.target.closest('.nm-detail-btn');
        if (!btn) return;
        const id = btn.dataset.id;

        // Reset body to loading state
        document.getElementById('nm-detailBody').innerHTML =
            '<div style=\"text-align:center;padding:40px;color:#8b9a8b;\">⏳ Chargement...</div>';

        new bootstrap.Modal(document.getElementById('nm-detailModal')).show();

        // Fetch notification detail
        fetch(`/psycho/notifications/\${id}/detail`)
            .then(r => r.json())
            .then(data => {
                if (data.error) throw new Error(data.error);
                const eventDate = data.event_date
                    ? new Date(data.event_date).toLocaleDateString('fr-FR', {day:'2-digit',month:'long',year:'numeric'})
                    : 'N/A';
                const partDate = data.participation_date
                    ? new Date(data.participation_date).toLocaleDateString('fr-FR', {day:'2-digit',month:'long',year:'numeric', hour:'2-digit', minute:'2-digit'})
                    : 'N/A';
                const fullName = [data.firstname, data.lastname].filter(Boolean).join(' ') || 'Inconnu';
                const ratio = data.current_participants && data.max_participants
                    ? Math.round(data.current_participants / data.max_participants * 100) : 0;

                document.getElementById('nm-detailBody').innerHTML = `
                <div style=\"background:linear-gradient(135deg,#285921,#3d7e33);padding:20px 24px;color:white;\">
                    <div style=\"display:flex;align-items:center;justify-content:space-between;\">
                        <h5 style=\"margin:0;font-size:16px;\">📋 Détail de la participation</h5>
                        <button type=\"button\" data-bs-dismiss=\"modal\"
                            style=\"background:rgba(255,255,255,.2);border:none;color:white;border-radius:50%;width:30px;height:30px;font-size:16px;cursor:pointer;line-height:1;\">✕</button>
                    </div>
                </div>
                <div style=\"padding:24px;\">

                    <div style=\"background:white;border-radius:12px;padding:16px;margin-bottom:16px;border:1px solid #e8e0d4;\">
                        <div style=\"font-size:11px;text-transform:uppercase;letter-spacing:1px;color:#8b9a8b;margin-bottom:8px;\">👤 Participant</div>
                        <div style=\"font-size:18px;font-weight:bold;color:#285921;\">\${nmEsc(fullName)}</div>
                        <div style=\"font-size:13px;color:#5a6c5a;margin-top:4px;\">📧 \${nmEsc(data.email || 'N/A')}</div>
                        \${data.phone_number ? `<div style=\"font-size:13px;color:#5a6c5a;margin-top:2px;\">📞 \${nmEsc(data.phone_number)}</div>` : ''}
                        <div style=\"margin-top:8px;\">
                            <span style=\"background:\${data.participation_status === 'confirmed' ? '#e8f5e9' : '#fff3e0'};
                                color:\${data.participation_status === 'confirmed' ? '#2e7d32' : '#e65100'};
                                padding:3px 10px;border-radius:20px;font-size:11px;font-weight:bold;\">
                                \${data.participation_status === 'confirmed' ? '✅ Confirmé' : '⏳ ' + nmEsc(data.participation_status)}
                            </span>
                        </div>
                    </div>

                    <div style=\"background:white;border-radius:12px;padding:16px;margin-bottom:16px;border:1px solid #e8e0d4;\">
                        <div style=\"font-size:11px;text-transform:uppercase;letter-spacing:1px;color:#8b9a8b;margin-bottom:8px;\">🎯 Événement</div>
                        <div style=\"font-size:16px;font-weight:bold;color:#285921;\">\${nmEsc(data.event_title || 'N/A')}</div>
                        <div style=\"font-size:13px;color:#5a6c5a;margin-top:6px;\">📅 \${eventDate}</div>
                        \${data.location ? `<div style=\"font-size:13px;color:#5a6c5a;margin-top:2px;\">📍 \${nmEsc(data.location)}</div>` : ''}
                        <div style=\"margin-top:10px;\">
                            <div style=\"display:flex;justify-content:space-between;font-size:12px;color:#5a6c5a;margin-bottom:4px;\">
                                <span>👥 \${data.current_participants} / \${data.max_participants} participants</span>
                                <span>\${ratio}%</span>
                            </div>
                            <div style=\"background:#e8e0d4;border-radius:4px;height:6px;overflow:hidden;\">
                                <div style=\"background:linear-gradient(90deg,#7ec8a3,#285921);height:100%;width:\${ratio}%;border-radius:4px;\"></div>
                            </div>
                        </div>
                    </div>

                    <div style=\"background:white;border-radius:12px;padding:16px;margin-bottom:20px;border:1px solid #e8e0d4;\">
                        <div style=\"font-size:11px;text-transform:uppercase;letter-spacing:1px;color:#8b9a8b;margin-bottom:8px;\">🕐 Inscription</div>
                        <div style=\"font-size:14px;color:#5a6c5a;\">\${partDate}</div>
                    </div>

                    <div style=\"display:flex;gap:10px;justify-content:center;\">
                        <button onclick=\"nmSendEmail(\${data.participation_id || id}, this)\"
                            style=\"background:#285921;color:white;border:none;border-radius:20px;padding:10px 24px;font-size:13px;font-weight:bold;cursor:pointer;\">
                            📧 Envoyer confirmation
                        </button>
                        <button type=\"button\" data-bs-dismiss=\"modal\"
                            style=\"background:#e0e0e0;color:#333;border:none;border-radius:20px;padding:10px 24px;font-size:13px;font-weight:bold;cursor:pointer;\">
                            Fermer
                        </button>
                    </div>
                </div>`;
            })
            .catch(err => {
                document.getElementById('nm-detailBody').innerHTML =
                    `<div style=\"text-align:center;padding:40px;color:#f44336;\">❌ Impossible de charger le détail.<br><small>\${nmEsc(err.message)}</small></div>`;
            });

        nmLoad(true);
    });

    window.nmSendEmail = function(notifId, btn) {
        btn.disabled = true;
        btn.textContent = '⏳ Envoi...';
        fetch(`/psycho/notifications/\${notifId}/send-email`, {method:'POST'})
            .then(r => r.json())
            .then(data => {
                btn.textContent = data.success ? '✅ Email envoyé !' : '❌ Erreur';
                if (data.success) btn.style.background = '#4CAF50';
                btn.disabled = false;
            }).catch(() => { btn.textContent = '❌ Erreur'; btn.disabled = false; });
    };

    function nmEsc(str) {
        return String(str ?? '').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;');
    }

    document.getElementById('notificationsModal')?.addEventListener('show.bs.modal', () => nmLoad(true));
    document.getElementById('notificationsModal')?.addEventListener('hidden.bs.modal', () => {
        fetch('";
        // line 2721
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("psycho_notifications_mark_all");
        yield "', {method:'POST'}).then(() => {
            nmLastUnread = 0;
            nmUpdateBadge(0);
        });
    });

    nmLoad(true);
    setInterval(() => nmLoad(false), 15000);

    // Load favorites from localStorage
    const savedLikes = localStorage.getItem('likedEvents');
    if (savedLikes) {
        likedEventIds = new Set(JSON.parse(savedLikes));
        likedEventIds.forEach(id => {
            const btn = document.getElementById(`favoriteBtn-\${id}`);
            if (btn) btn.innerHTML = '💛';
        });
    }

    function toggleFavorite(eventId) {
        if (likedEventIds.has(eventId)) {
            likedEventIds.delete(eventId);
            document.getElementById(`favoriteBtn-\${eventId}`).innerHTML = '🤍';
        } else {
            likedEventIds.add(eventId);
            document.getElementById(`favoriteBtn-\${eventId}`).innerHTML = '💛';
        }
        localStorage.setItem('likedEvents', JSON.stringify([...likedEventIds]));
    }

    async function processParticipation(eventId, btnElement) {
        btnElement.disabled = true;
        btnElement.innerHTML = '⏳ Traitement...';
        
        try {
            const response = await fetch(`/psycho/evente/\${eventId}/participate`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ eventId: eventId })
            });
            const data = await response.json();
            
            if (data.success) {
                btnElement.innerHTML = '✅ Inscrit !';
                btnElement.classList.add('btn-participate-registered');
                showNotification('Inscription réussie !', 'success');
                setTimeout(() => location.reload(), 1500);
            } else {
                btnElement.innerHTML = '🎯 S\\'inscrire';
                btnElement.disabled = false;
                showNotification(data.message || 'Erreur', 'error');
            }
        } catch (error) {
            btnElement.innerHTML = '🎯 S\\'inscrire';
            btnElement.disabled = false;
            showNotification('Erreur réseau', 'error');
        }
    }

    let pendingDeleteId = null;

    function deleteEvent(eventId) {
        pendingDeleteId = eventId;
        new bootstrap.Modal(document.getElementById('deleteConfirmModal')).show();
    }

    document.getElementById('confirmDeleteBtn')?.addEventListener('click', async () => {
        if (!pendingDeleteId) return;
        const btn = document.getElementById('confirmDeleteBtn');
        btn.disabled = true;
        btn.textContent = 'Suppression...';

        try {
            const response = await fetch(`/psycho/evente/api/events/\${pendingDeleteId}`, {
                method: 'DELETE',
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            });
            const data = await response.json();
            if (data.success) {
                bootstrap.Modal.getInstance(document.getElementById('deleteConfirmModal')).hide();
                showNotification('Événement supprimé', 'success');
                setTimeout(() => location.reload(), 800);
            } else {
                showNotification('Erreur lors de la suppression', 'error');
            }
        } catch (error) {
            showNotification('Erreur réseau', 'error');
        } finally {
            btn.disabled = false;
            btn.textContent = 'Supprimer';
            pendingDeleteId = null;
        }
    });

    async function openEditModal(eventId) {
        try {
            const evRes = await fetch(`/psycho/evente/api/events/\${eventId}`);
            const event = await evRes.json();
            const planRes = await fetch(`/psycho/evente/api/planifications/by-event/\${eventId}`);
            const plans = await planRes.json();
            const plan = plans.length ? plans[0] : null;

            document.getElementById('ef-id').value = event.id;
            document.getElementById('ef-planId').value = plan ? (plan.id_planification ?? '') : '';
            document.getElementById('ef-title').value = event.title || '';
            document.getElementById('ef-location').value = event.location || '';
            document.getElementById('ef-date').value = event.event_date ? event.event_date.substring(0,10) : '';
            document.getElementById('ef-maxPart').value = event.max_participants || '';
            document.getElementById('ef-link').value = event.link || '';
            document.getElementById('ef-planDesc').value = plan ? plan.description : '';
            document.getElementById('ef-planDuree').value = plan ? plan.duree : '';

            new bootstrap.Modal(document.getElementById('editEventModal')).show();
        } catch (error) {
            showNotification('Erreur de chargement', 'error');
        }
    }

    document.getElementById('ef-btnSave')?.addEventListener('click', async () => {
        const btn = document.getElementById('ef-btnSave');
        btn.disabled = true;
        btn.textContent = '⏳ Mise à jour...';

        const eventId = document.getElementById('ef-id').value;
        const planId = document.getElementById('ef-planId').value;
        const planDesc = document.getElementById('ef-planDesc').value.trim();
        const planDuree = document.getElementById('ef-planDuree').value.trim();

        try {
            const evRes = await fetch(`/psycho/evente/api/events/\${eventId}`, {
                method: 'PUT',
                headers: {'Content-Type':'application/json'},
                body: JSON.stringify({
                    title: document.getElementById('ef-title').value.trim(),
                    location: document.getElementById('ef-location').value.trim(),
                    event_date: document.getElementById('ef-date').value,
                    link: document.getElementById('ef-link').value.trim(),
                    max_participants: parseInt(document.getElementById('ef-maxPart').value)
                })
            });
            const evResult = await evRes.json();
            if (!evResult.success) { showNotification('Erreur lors de la mise à jour', 'error'); return; }

            if (!planDesc && !planDuree) {
                if (planId) await fetch(`/psycho/evente/api/planifications/\${planId}`, { method: 'DELETE' });
            } else if (planDesc && planDuree) {
                if (planId) {
                    await fetch(`/psycho/evente/api/planifications/\${planId}`, {
                        method: 'PUT', headers: {'Content-Type':'application/json'},
                        body: JSON.stringify({ description: planDesc, duree: planDuree })
                    });
                } else {
                    await fetch('/psycho/evente/api/planifications', {
                        method: 'POST', headers: {'Content-Type':'application/json'},
                        body: JSON.stringify({ idEvent: parseInt(eventId), description: planDesc, duree: planDuree })
                    });
                }
            }

            bootstrap.Modal.getInstance(document.getElementById('editEventModal')).hide();
            showNotification('Événement mis à jour !', 'success');
            setTimeout(() => location.reload(), 1000);

        } catch(e) {
            showNotification('Erreur réseau', 'error');
        } finally {
            btn.disabled = false;
            btn.textContent = '💾 Mettre à jour';
        }
    });

    async function openQrModal(eventId) {
        document.getElementById('qrLoading').style.display = 'block';
        document.getElementById('qrContent').style.display = 'none';
        document.getElementById('qrError').style.display = 'none';
        new bootstrap.Modal(document.getElementById('qrCodeModal')).show();

        try {
            const res = await fetch(`/psycho/evente/qrcode/\${eventId}`);
            const data = await res.json();
            if (data.error) throw new Error(data.error);

            document.getElementById('qrTitle').textContent = data.title;
            document.getElementById('qrLocation').textContent = '📍 ' + data.location;
            document.getElementById('qrMapsLink').href = data.mapsUrl;

            // Generate QR code client-side
            const container = document.getElementById('qrImage');
            container.innerHTML = '';
            new QRCode(container, {
                text:         data.mapsUrl,
                width:        200,
                height:       200,
                colorDark:    '#285921',
                colorLight:   '#ffffff',
                correctLevel: QRCode.CorrectLevel.H
            });

            document.getElementById('qrLoading').style.display = 'none';
            document.getElementById('qrContent').style.display = 'block';
        } catch (e) {
            document.getElementById('qrLoading').style.display = 'none';
            document.getElementById('qrError').style.display = 'block';
        }
    }

    function showNotification(message, type) {
        const toast = document.createElement('div');
        toast.textContent = message;
        toast.style.cssText = `position:fixed;bottom:20px;right:20px;background:\${type === 'success' ? '#4CAF50' : '#f44336'};color:white;padding:12px 24px;border-radius:25px;z-index:10000;`;
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    // Search functionality
    document.getElementById('searchInput')?.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const cards = document.querySelectorAll('.event-card');
        cards.forEach(card => {
            const title = card.querySelector('.event-title')?.innerText.toLowerCase() || '';
            card.style.display = title.includes(searchTerm) ? '' : 'none';
        });
    });

    // Sort functionality
    const sortLabels = { title: '📚 Par Titre (A → Z)', date: '📅 Par Date (Récent)', activities: '🎯 Par Activités' };
    const sortBtn = document.getElementById('sortBtn');
    const sortMenu = document.getElementById('sortMenu');

    sortBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        sortMenu.style.display = sortMenu.style.display === 'block' ? 'none' : 'block';
    });

    document.addEventListener('click', () => { sortMenu.style.display = 'none'; });

    sortMenu.addEventListener('click', (e) => {
        const item = e.target.closest('.sort-item');
        if (!item) return;
        const sort = item.getAttribute('data-sort');
        const container = document.getElementById('eventsContainer');
        const cards = [...container.querySelectorAll('.event-card')];
        cards.sort((a, b) => {
            if (sort === 'title') return (a.dataset.title || '').localeCompare(b.dataset.title || '', 'fr');
            if (sort === 'date') return (b.dataset.date || '').localeCompare(a.dataset.date || '');
            if (sort === 'activities') return parseInt(b.dataset.activities || 0) - parseInt(a.dataset.activities || 0);
            return 0;
        });
        cards.forEach(card => container.appendChild(card));
        sortBtn.textContent = sortLabels[sort] + ' ▾';
        sortMenu.querySelectorAll('.sort-item').forEach(el => el.classList.toggle('active-sort', el.getAttribute('data-sort') === sort));
        sortMenu.style.display = 'none';
    });

    document.getElementById('favoritesBtn')?.addEventListener('click', () => {
        const cards = document.querySelectorAll('.event-card');
        let hasFavorites = false;
        cards.forEach(card => {
            const eventId = parseInt(card.getAttribute('data-event-id'));
            if (likedEventIds.has(eventId)) {
                card.style.display = '';
                hasFavorites = true;
            } else {
                card.style.display = 'none';
            }
        });
        if (!hasFavorites) {
            document.getElementById('eventsContainer').innerHTML = `<div class=\"empty-state\"><div style=\"font-size:72px;\">💛</div><h3>Aucun favori</h3></div>`;
        }
    });

    // ========== PAGINATION FUNCTIONS ==========
    function changePerPage(limit) {
        var url = new URL(window.location.href);
        url.searchParams.set('limit', limit);
        url.searchParams.set('page', 1);
        window.location.href = url.toString();
    }

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

    // ==================== CREATE MODAL LOGIC ====================
    const localCorrections = {
        'jalousi':'jalousie','egoisme':'égoïsme','narsicism':'narcissisme',
        'confience':'confiance','etre':'être','pres':'près','tres':'très',
        'deja':'déjà','voila':'voilà','evenement':'événement','atelie':'atelier'
    };
    let cfCorrCallback = null;

    function cfSetState(el, state) {
        el.classList.remove('cf-valid','cf-invalid','cf-warning');
        if (state) el.classList.add('cf-' + state);
    }
    function cfValidateTitle() {
        const v = document.getElementById('cf-title').value.trim();
        if (!v) { cfSetState(document.getElementById('cf-title'), 'invalid'); return false; }
        if (v.length < 3) { cfSetState(document.getElementById('cf-title'), 'warning'); return false; }
        cfSetState(document.getElementById('cf-title'), 'valid'); return true;
    }
    function cfValidateLocation() {
        const v = document.getElementById('cf-location').value.trim();
        if (!v || v.length < 3) { cfSetState(document.getElementById('cf-location'), v ? 'warning' : 'invalid'); return false; }
        cfSetState(document.getElementById('cf-location'), 'valid'); return true;
    }
    function cfValidateDate() {
        const v   = document.getElementById('cf-date').value;
        const el  = document.getElementById('cf-date');
        const msg = document.getElementById('cf-dateMsg');
        if (!v) {
            cfSetState(el, 'invalid');
            if (msg) { msg.textContent = 'La date est obligatoire.'; msg.style.display = 'block'; }
            return false;
        }
        const chosen = new Date(v);
        const today  = new Date(); today.setHours(0, 0, 0, 0);
        if (chosen < today) {
            cfSetState(el, 'invalid');
            if (msg) { msg.textContent = 'La date ne peut pas être dans le passé.'; msg.style.display = 'block'; }
            return false;
        }
        cfSetState(el, 'valid');
        if (msg) { msg.textContent = ''; msg.style.display = 'none'; }
        return true;
    }
    function cfValidateMax() {
        const v = parseInt(document.getElementById('cf-maxPart').value);
        const ok = !isNaN(v) && v > 0;
        cfSetState(document.getElementById('cf-maxPart'), ok ? 'valid' : 'invalid');
        return ok;
    }
    function cfValidatePlan() {
        const desc = document.getElementById('cf-planDesc').value.trim();
        const duree = document.getElementById('cf-planDuree').value.trim();
        if (!desc && !duree) return true;
        if (desc && !duree) { cfSetState(document.getElementById('cf-planDuree'), 'invalid'); return false; }
        if (!desc && duree) { cfSetState(document.getElementById('cf-planDesc'), 'invalid'); return false; }
        if (desc.length < 4) { cfSetState(document.getElementById('cf-planDesc'), 'warning'); return false; }
        return true;
    }
    function cfValidateAll() {
        let ok = true;
        if (!cfValidateTitle()) ok = false;
        if (!cfValidateLocation()) ok = false;
        if (!cfValidateDate()) ok = false;
        if (!cfValidateMax()) ok = false;
        if (!cfValidatePlan()) ok = false;
        return ok;
    }

    document.getElementById('cf-title')?.addEventListener('input', () => {
        cfValidateTitle();
        document.getElementById('cf-btnCorrectTitle').disabled = !document.getElementById('cf-title').value.trim();
    });
    document.getElementById('cf-location')?.addEventListener('input', cfValidateLocation);
    document.getElementById('cf-date')?.addEventListener('change', cfValidateDate);
    document.getElementById('cf-maxPart')?.addEventListener('input', cfValidateMax);
    document.getElementById('cf-planDesc')?.addEventListener('input', () => {
        cfValidatePlan();
        document.getElementById('cf-btnCorrectDesc').disabled = !document.getElementById('cf-planDesc').value.trim();
    });
    document.getElementById('cf-planDuree')?.addEventListener('input', cfValidatePlan);

    document.getElementById('cf-acceptCorr')?.addEventListener('click', () => {
        if (cfCorrCallback) cfCorrCallback(true);
        document.getElementById('cf-correctionDialog').style.display = 'none';
        cfCorrCallback = null;
    });
    document.getElementById('cf-rejectCorr')?.addEventListener('click', () => {
        if (cfCorrCallback) cfCorrCallback(false);
        document.getElementById('cf-correctionDialog').style.display = 'none';
        cfCorrCallback = null;
    });

    function cfShowCorrDialog(original, corrected, callback) {
        cfCorrCallback = callback;
        document.getElementById('cf-origText').textContent = original;
        document.getElementById('cf-corrText').textContent = corrected;
        document.getElementById('cf-correctionDialog').style.display = 'flex';
    }

    async function cfCorrect(fieldId, btnId) {
        const field = document.getElementById(fieldId);
        const btn = document.getElementById(btnId);
        const text = field.value.trim();
        if (!text) return;
        btn.disabled = true;
        document.getElementById('cf-loading').style.removeProperty('display');
        
        const lower = text.toLowerCase();
        if (localCorrections[lower]) {
            let c = localCorrections[lower];
            if (text[0] === text[0].toUpperCase()) c = c[0].toUpperCase() + c.slice(1);
            document.getElementById('cf-loading').style.display = 'none';
            cfShowCorrDialog(text, c, (accepted) => {
                if (accepted) { field.value = c; showNotification('Correction appliquée !', 'success'); }
                btn.disabled = false;
            });
            return;
        }
        
        try {
            const res = await fetch('/psycho/evente/api/correct-text', {
                method: 'POST', headers: {'Content-Type':'application/json'},
                body: JSON.stringify({ text, type: fieldId.includes('title') ? 'title' : 'description' })
            });
            const data = await res.json();
            if (data.success && data.corrected !== text) {
                cfShowCorrDialog(text, data.corrected, (accepted) => {
                    if (accepted) field.value = data.corrected;
                    btn.disabled = false;
                });
            } else {
                showNotification('Le texte semble déjà correct.', 'info');
                btn.disabled = false;
            }
        } catch(e) {
            showNotification('Erreur réseau', 'error');
            btn.disabled = false;
        } finally {
            document.getElementById('cf-loading').style.display = 'none';
        }
    }

    document.getElementById('cf-btnCorrectTitle')?.addEventListener('click', () => cfCorrect('cf-title', 'cf-btnCorrectTitle'));
    document.getElementById('cf-btnCorrectDesc')?.addEventListener('click', () => cfCorrect('cf-planDesc', 'cf-btnCorrectDesc'));

    document.getElementById('cf-btnGenerate')?.addEventListener('click', async () => {
        const title = document.getElementById('cf-title').value.trim();
        if (!title) { showNotification('Veuillez d\\'abord saisir un titre.', 'warning'); return; }
        const btn = document.getElementById('cf-btnGenerate');
        btn.disabled = true;
        document.getElementById('cf-loading').style.removeProperty('display');
        try {
            const res = await fetch('/psycho/evente/api/generate-planification', {
                method: 'POST', headers: {'Content-Type':'application/json'},
                body: JSON.stringify({ title })
            });
            const data = await res.json();
            if (data.success) {
                document.getElementById('cf-planDesc').value = data.description;
                document.getElementById('cf-planDuree').value = data.duree;
                document.getElementById('cf-planDesc').classList.add('cf-suggestion');
                document.getElementById('cf-planDuree').classList.add('cf-suggestion');
                document.getElementById('cf-suggestionLabel').style.display = 'inline';
                document.getElementById('cf-btnAccept').style.display = 'inline-block';
                document.getElementById('cf-btnReject').style.display = 'inline-block';
                showNotification('Planification générée !', 'success');
            }
        } catch(e) { showNotification('Erreur réseau', 'error'); }
        finally {
            btn.disabled = false;
            document.getElementById('cf-loading').style.display = 'none';
        }
    });

    document.getElementById('cf-btnAccept')?.addEventListener('click', () => {
        document.getElementById('cf-planDesc').classList.remove('cf-suggestion');
        document.getElementById('cf-planDuree').classList.remove('cf-suggestion');
        document.getElementById('cf-btnAccept').style.display = 'none';
        document.getElementById('cf-btnReject').style.display = 'none';
        document.getElementById('cf-suggestionLabel').style.display = 'none';
        showNotification('Planification acceptée !', 'success');
    });

    document.getElementById('cf-btnReject')?.addEventListener('click', () => {
        document.getElementById('cf-planDesc').value = '';
        document.getElementById('cf-planDuree').value = '';
        document.getElementById('cf-planDesc').classList.remove('cf-suggestion');
        document.getElementById('cf-planDuree').classList.remove('cf-suggestion');
        document.getElementById('cf-btnAccept').style.display = 'none';
        document.getElementById('cf-btnReject').style.display = 'none';
        document.getElementById('cf-suggestionLabel').style.display = 'none';
        showNotification('Suggestion rejetée.', 'info');
    });

    document.getElementById('cf-btnSave')?.addEventListener('click', async () => {
        document.getElementById('cf-errorBox').style.display = 'none';
        if (!cfValidateAll()) {
            document.getElementById('cf-errorBox').textContent = 'Veuillez corriger les champs en erreur.';
            document.getElementById('cf-errorBox').style.display = 'block';
            return;
        }
        const btn = document.getElementById('cf-btnSave');
        btn.disabled = true;
        btn.textContent = 'Sauvegarde...';
        try {
            const evRes = await fetch('/psycho/evente/api/events', {
                method: 'POST', headers: {'Content-Type':'application/json'},
                body: JSON.stringify({
                    title: document.getElementById('cf-title').value.trim(),
                    location: document.getElementById('cf-location').value.trim(),
                    eventDate: document.getElementById('cf-date').value,
                    link: document.getElementById('cf-link').value.trim(),
                    maxParticipants: parseInt(document.getElementById('cf-maxPart').value),
                    currentParticipants: 0
                })
            });
            const evResult = await evRes.json();
            if (!evResult.success) {
                const errMsg = evResult.error || 'Erreur lors de la création';
                if (errMsg.toLowerCase().includes('date')) {
                    const msg = document.getElementById('cf-dateMsg');
                    const el  = document.getElementById('cf-date');
                    if (msg) { msg.textContent = errMsg; msg.style.display = 'block'; }
                    if (el)  { el.classList.add('cf-invalid'); }
                }
                document.getElementById('cf-errorBox').textContent = errMsg;
                document.getElementById('cf-errorBox').style.display = 'block';
                return;
            }
            const desc = document.getElementById('cf-planDesc').value.trim();
            const duree = document.getElementById('cf-planDuree').value.trim();
            if (desc && duree) {
                await fetch('/psycho/evente/api/planifications', {
                    method: 'POST', headers: {'Content-Type':'application/json'},
                    body: JSON.stringify({ idEvent: evResult.id, description: desc, duree })
                });
            }
            bootstrap.Modal.getInstance(document.getElementById('createEventModal')).hide();
            showNotification('Événement créé avec succès !', 'success');
            setTimeout(() => location.reload(), 1200);
        } catch(e) {
            showNotification('Erreur réseau', 'error');
        } finally {
            btn.disabled = false;
            btn.textContent = 'Sauvegarder';
        }
    });

    document.getElementById('createEventModal')?.addEventListener('hidden.bs.modal', () => {
        ['cf-title','cf-location','cf-date','cf-maxPart','cf-link','cf-planDesc','cf-planDuree'].forEach(id => {
            const el = document.getElementById(id);
            if (el) {
                el.value = id === 'cf-maxPart' ? '30' : '';
                el.classList.remove('cf-valid','cf-invalid','cf-warning','cf-suggestion');
            }
        });
        document.getElementById('cf-btnAccept').style.display = 'none';
        document.getElementById('cf-btnReject').style.display = 'none';
        document.getElementById('cf-suggestionLabel').style.display = 'none';
        document.getElementById('cf-errorBox').style.display = 'none';
        document.getElementById('cf-btnCorrectTitle').disabled = true;
        document.getElementById('cf-btnCorrectDesc').disabled = true;
    });

    // ── AI Drawer Functions ──
    const AI_GENERATE_URL = \"";
        // line 3294
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("psycho_ai_assistant_generate");
        yield "\";
    const AI_HISTORY_URL = \"";
        // line 3295
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("psycho_ai_assistant_history");
        yield "\";
    const AI_SAVE_FAV_URL = \"";
        // line 3296
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("psycho_ai_assistant_save_favorite");
        yield "\";
    const AI_EXPORT_URL = \"";
        // line 3297
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("psycho_ai_assistant_export");
        yield "\";

    function openAIPanel() {
        document.getElementById('aiDrawerOverlay').style.display = 'block';
        const drawer = document.getElementById('aiDrawer');
        drawer.style.display = 'flex';
        drawer.classList.remove('ai-slide-out');
        drawer.classList.add('ai-slide-in');
    }

    function closeAIPanel() {
        const drawer = document.getElementById('aiDrawer');
        drawer.classList.remove('ai-slide-in');
        drawer.classList.add('ai-slide-out');
        setTimeout(() => {
            drawer.style.display = 'none';
            document.getElementById('aiDrawerOverlay').style.display = 'none';
        }, 280);
    }

    function aiUpdateWordCount() {
        const text = document.getElementById('ai-result').value;
        const words = text.trim().split(/\\s+/).filter(w => w.length > 0);
        document.getElementById('ai-wordCount').textContent = words.length + ' mots';
    }

    async function aiGenerate() {
        const desc = document.getElementById('ai-description').value.trim();
        if (!desc) { showNotification('🌿 Veuillez décrire votre événement.', 'error'); document.getElementById('ai-description').focus(); return; }
        document.getElementById('ai-loadingBar').style.display = 'block';
        document.getElementById('ai-result').value = 'Génération en cours...';
        try {
            const res = await fetch(AI_GENERATE_URL, {
                method: 'POST', headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    description: desc,
                    event_type: document.getElementById('ai-eventType').value,
                    budget: document.getElementById('ai-budget').value,
                    audience_size: document.getElementById('ai-audience').value,
                    help_type: document.getElementById('ai-helpType').value
                })
            });
            const data = await res.json();
            document.getElementById('ai-result').value = data.success ? data.result : ('Erreur: ' + (data.error || 'Inconnue'));
        } catch(e) {
            document.getElementById('ai-result').value = 'Erreur réseau: ' + e.message;
        } finally {
            document.getElementById('ai-loadingBar').style.display = 'none';
            aiUpdateWordCount();
        }
    }

    function aiClear() {
        document.getElementById('ai-description').value = '';
        document.getElementById('ai-eventType').value = '';
        document.getElementById('ai-budget').value = '';
        document.getElementById('ai-audience').value = '';
        document.getElementById('ai-helpType').value = 'Idées de thèmes';
        document.getElementById('ai-result').value = '';
        aiUpdateWordCount();
    }

    async function aiCopy() {
        const text = document.getElementById('ai-result').value;
        if (!text) { showNotification('🌿 Rien à copier pour le moment.', 'error'); return; }
        await navigator.clipboard.writeText(text);
        showNotification('Copié !', 'success');
    }

    async function aiSaveFav() {
        const content = document.getElementById('ai-result').value;
        if (!content) { showNotification('🌿 Rien à sauvegarder pour le moment.', 'error'); return; }
        const res = await fetch(AI_SAVE_FAV_URL, { method:'POST', headers:{'Content-Type':'application/json'}, body: JSON.stringify({ content, description: document.getElementById('ai-description').value.substring(0,100) }) });
        const data = await res.json();
        showNotification(data.success ? '⭐ Ajouté aux favoris!' : data.error, data.success ? 'success' : 'error');
    }

    document.getElementById('ai-result')?.addEventListener('input', aiUpdateWordCount);

    // ========== STAR RATING CLICK HANDLER ==========
    document.querySelectorAll('.stars').forEach(function(starsContainer) {
        const eventId = starsContainer.getAttribute('data-event-id');
        const starEls = starsContainer.querySelectorAll('.star');

        starEls.forEach(function(star, index) {
            // Hover effect
            star.addEventListener('mouseenter', function() {
                starEls.forEach(function(s, i) {
                    s.style.color = i <= index ? '#ffc107' : '#ddd';
                });
            });
            star.addEventListener('mouseleave', function() {
                starEls.forEach(function(s) {
                    s.style.color = s.classList.contains('active') ? '#ffc107' : '#ddd';
                });
            });

            // Click to rate
            star.addEventListener('click', async function() {
                const rating = index + 1;

                // Optimistic UI update
                starEls.forEach(function(s, i) {
                    s.classList.toggle('active', i < rating);
                    s.style.color = i < rating ? '#ffc107' : '#ddd';
                });

                try {
                    const res = await fetch(`/psycho/evente/\${eventId}/rate`, {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ rating: rating })
                    });
                    const data = await res.json();
                    if (data.success) {
                        if (data.avgRating !== undefined) {
                            const avgEl = document.getElementById(`rating-avg-\${eventId}`);
                            const cntEl = document.getElementById(`rating-count-\${eventId}`);
                            if (avgEl) avgEl.textContent = '(' + parseFloat(data.avgRating).toFixed(1) + ')';
                            if (cntEl) cntEl.textContent = '(' + data.ratingCount + ' avis)';
                        }
                        showNotification('⭐ Note enregistrée !', 'success');
                    } else {
                        showNotification(data.message || 'Erreur', 'error');
                    }
                } catch(e) {
                    showNotification('Erreur réseau', 'error');
                }
            });
        });
    });
</script>
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
        return "Psychologue/evente/index.html.twig";
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
        return array (  3883 => 3297,  3879 => 3296,  3875 => 3295,  3871 => 3294,  3295 => 2721,  3180 => 2609,  3134 => 2566,  2715 => 2150,  2707 => 2145,  2694 => 2144,  2609 => 2068,  2123 => 1583,  2114 => 1579,  2107 => 1577,  2102 => 1574,  2098 => 1572,  2092 => 1570,  2089 => 1569,  2086 => 1567,  2078 => 1565,  2074 => 1563,  2071 => 1562,  2068 => 1561,  2065 => 1559,  2059 => 1558,  2051 => 1556,  2045 => 1554,  2042 => 1553,  2037 => 1552,  2034 => 1550,  2031 => 1549,  2027 => 1547,  2025 => 1546,  2020 => 1545,  2017 => 1544,  2014 => 1542,  2010 => 1540,  2004 => 1538,  2001 => 1537,  1993 => 1531,  1989 => 1530,  1985 => 1529,  1981 => 1528,  1977 => 1527,  1971 => 1523,  1969 => 1522,  1964 => 1519,  1961 => 1518,  1949 => 1513,  1944 => 1511,  1940 => 1510,  1934 => 1507,  1926 => 1506,  1923 => 1505,  1921 => 1504,  1879 => 1499,  1875 => 1498,  1869 => 1497,  1865 => 1496,  1857 => 1495,  1853 => 1494,  1843 => 1489,  1829 => 1478,  1824 => 1476,  1819 => 1473,  1813 => 1471,  1809 => 1469,  1807 => 1468,  1804 => 1467,  1802 => 1466,  1799 => 1465,  1797 => 1464,  1794 => 1463,  1792 => 1462,  1787 => 1459,  1784 => 1458,  1778 => 1456,  1776 => 1455,  1770 => 1452,  1765 => 1449,  1763 => 1448,  1754 => 1444,  1748 => 1443,  1745 => 1442,  1734 => 1440,  1730 => 1439,  1726 => 1438,  1717 => 1432,  1707 => 1427,  1697 => 1426,  1692 => 1423,  1686 => 1420,  1682 => 1418,  1680 => 1417,  1676 => 1415,  1673 => 1414,  1662 => 1406,  1655 => 1405,  1652 => 1404,  1646 => 1400,  1644 => 1399,  1639 => 1396,  1637 => 1395,  1632 => 1392,  1629 => 1391,  1627 => 1390,  1622 => 1387,  1618 => 1385,  1614 => 1383,  1612 => 1382,  1609 => 1381,  1607 => 1380,  1604 => 1379,  1602 => 1378,  1598 => 1377,  1593 => 1374,  1587 => 1372,  1585 => 1371,  1580 => 1370,  1576 => 1369,  1569 => 1364,  1563 => 1361,  1559 => 1360,  1556 => 1359,  1554 => 1358,  1551 => 1357,  1547 => 1355,  1539 => 1353,  1537 => 1352,  1530 => 1348,  1526 => 1347,  1522 => 1346,  1518 => 1345,  1514 => 1343,  1511 => 1342,  1508 => 1341,  1505 => 1340,  1502 => 1339,  1499 => 1338,  1496 => 1337,  1491 => 1336,  1483 => 1330,  1481 => 1329,  1469 => 1322,  199 => 54,  186 => 53,  173 => 49,  167 => 47,  156 => 39,  148 => 34,  139 => 28,  133 => 27,  122 => 18,  120 => 17,  114 => 14,  107 => 10,  102 => 7,  89 => 6,  66 => 4,  43 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("﻿{# templates/Psychologue/evente/index.html.twig #}
{% extends 'base.html.twig' %}

{% block title %}Événements & Ateliers - NAFSEYTI{% endblock %}

{% block navbar %}
<div class=\"navbar-wrap\">
    <div class=\"navbar-inner\">
        <ul class=\"nav-links\">
            <li><a href=\"{{ path('psycho_dashboard') }}\">Accueil</a></li>
            <li><a href=\"#\">Contenu Psychologique</a></li>
            <li><a href=\"#\">Tests</a></li>
            <li><a href=\"#\">Rendez-vous</a></li>
            <li><a href=\"{{ path('psycho_events_index') }}\" class=\"active\">Evenements</a></li>
            <li><a href=\"#\">Suivi Personnel</a></li>
        </ul>
        {% if app.user %}
            <div style=\"position:relative; display:flex; align-items:center;\" id=\"profileDropdownWrap\">
                <div onclick=\"toggleProfileDropdown()\"
                     style=\"display:flex; align-items:center; gap:10px; cursor:pointer; padding:8px 12px; border-radius:8px; transition:background 0.2s;\"
                     onmouseover=\"this.style.background='rgba(0,0,0,0.05)'\"
                     onmouseout=\"this.style.background='transparent'\">
                    <div style=\"width:38px; height:38px; border-radius:50%; background:#4a7c3f; display:flex; align-items:center; justify-content:center; border:2px solid #4a7c3f;\">
                        <i class=\"fas fa-user\" style=\"color:white; font-size:1rem;\"></i>
                    </div>
                    <div style=\"line-height:1.2;\">
                        <div style=\"font-size:0.85rem; font-weight:600; color:#2d3a1e;\">{{ app.user.firstname }} {{ app.user.lastname }}</div>
                        <div style=\"font-size:0.7rem; color:#6B7D5A; text-transform:uppercase; letter-spacing:1px;\">{{ app.user.role }}</div>
                    </div>
                    <i class=\"fas fa-chevron-down\" style=\"font-size:0.7rem; color:#6B7D5A;\"></i>
                </div>
                <div id=\"profileDropdown\"
                     style=\"display:none; position:absolute; top:calc(100% + 8px); right:0; background:white; border-radius:12px; box-shadow:0 10px 40px rgba(45,80,22,0.15); min-width:200px; overflow:hidden; z-index:9999; border:1px solid #e8e0d0;\">
                    <a href=\"{{ path('app_profile') }}\"
                       style=\"display:flex; align-items:center; gap:12px; padding:14px 20px; text-decoration:none; color:#2d3a1e; font-size:0.9rem;\"
                       onmouseover=\"this.style.background='#f5f0e8'\" onmouseout=\"this.style.background='transparent'\">
                        <i class=\"fas fa-user-circle\" style=\"color:#4a7c3f;\"></i> Mon Profil
                    </a>
                    <a href=\"{{ path('app_logout') }}\"
                       style=\"display:flex; align-items:center; gap:12px; padding:14px 20px; text-decoration:none; color:#991b1b; font-size:0.9rem; border-top:1px solid #f0ebe0;\"
                       onmouseover=\"this.style.background='#fee2e2'\" onmouseout=\"this.style.background='transparent'\">
                        <i class=\"fas fa-sign-out-alt\" style=\"color:#991b1b;\"></i> Se déconnecter
                    </a>
                </div>
            </div>
        {% else %}
            <a href=\"{{ path('app_login') }}\" class=\"nav-cta\">Se connecter</a>
        {% endif %}
    </div>
</div>
{% endblock %}

{% block body %}

<style>
    :root {
        --primary-green: #285921;
        --primary-green-light: #3d7e33;
        --secondary-beige: #c9b99b;
        --background-light: #f8f5f2;
        --text-dark: #5a6c5a;
        --text-light: #69685c;
        --card-shadow: 0 12px 28px -8px rgba(40, 89, 33, 0.12);
        --card-hover-shadow: 0 20px 32px -12px rgba(40, 89, 33, 0.2);
        --radius-card: 24px;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        background: linear-gradient(135deg, #f5f1ed 0%, #e8efe8 50%, #f0ede5 100%);
        font-family: 'Segoe UI', 'Georgia', serif;
        min-height: 100vh;
        transition: all 0.3s ease;
    }

    /* Hide Google Translate banner */
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
    /* Google Translate element hidden but functional */
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

    /* ========== COLOR BLINDNESS FILTERS ========== */
    body.protanopia {
        filter: url('#protanopia');
    }
    body.deuteranopia {
        filter: url('#deuteranopia');
    }
    body.tritanopia {
        filter: url('#tritanopia');
    }
    body.achromatopsia {
        filter: grayscale(100%);
    }
    body.high-contrast {
        filter: contrast(180%) brightness(110%);
    }
    body.high-contrast .event-card,
    body.high-contrast .psychology-header,
    body.high-contrast .search-sort-bar {
        background: #000 !important;
        border: 2px solid #fff !important;
    }
    body.high-contrast .event-title,
    body.high-contrast .detail-row .text,
    body.high-contrast .plan-desc,
    body.high-contrast .plan-title,
    body.high-contrast h1,
    body.high-contrast h3,
    body.high-contrast p {
        color: #fff !important;
    }
    body.high-contrast .btn-participate {
        background: #fff !important;
        color: #000 !important;
    }
    body.high-contrast .progress-bar {
        background: #fff !important;
    }
    body.high-contrast .calendar-box {
        background: #000 !important;
        border: 1px solid #fff !important;
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

    /* ========== COUNTDOWN TIMER STYLES ========== */
    .countdown-timer {
        background: linear-gradient(135deg, #f0ede5, #e8e0d4);
        border-radius: 40px;
        padding: 8px 15px;
        margin: 10px 0 8px;
        display: inline-flex;
        align-items: center;
        gap: 12px;
        font-size: 12px;
        font-weight: 600;
        color: var(--primary-green);
        border: 1px solid rgba(40, 89, 33, 0.15);
        width: 100%;
        justify-content: center;
        font-family: monospace;
    }
    .countdown-timer span {
        background: white;
        padding: 3px 8px;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 700;
        color: var(--primary-green);
        min-width: 42px;
        display: inline-block;
        text-align: center;
        box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }
    .countdown-timer .countdown-label {
        background: transparent;
        padding: 0;
        font-size: 10px;
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

    /* Page Container */
    .events-page {
        min-height: 100vh;
        padding: 30px;
    }

    /* Psychology-themed Header */
    .psychology-header {
        background: linear-gradient(135deg, rgba(255,255,255,0.98), rgba(245,241,237,0.98));
        border-radius: 20px;
        padding: 25px 30px;
        margin-bottom: 25px;
        box-shadow: 0 4px 15px rgba(40, 89, 33, 0.1);
        border: 1px solid rgba(40, 89, 33, 0.2);
    }

    .header-icon {
        width: 50px;
        height: 50px;
        background: var(--primary-green);
        border-radius: 50%;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 28px;
        box-shadow: 0 4px 12px rgba(40, 89, 33, 0.3);
    }

    /* Search and Filter Bar */
    .search-sort-bar {
        background: linear-gradient(90deg, rgba(255,255,255,0.95), rgba(245,241,237,0.95));
        border-radius: 20px;
        padding: 18px;
        border: 1.5px solid rgba(40, 89, 33, 0.25);
        margin-bottom: 30px;
        box-shadow: 0 4px 12px rgba(40, 89, 33, 0.1);
    }

    .search-input {
        background: white;
        border: 2px solid rgba(40, 89, 33, 0.3);
        border-radius: 15px;
        padding: 14px 18px;
        width: 100%;
        transition: all 0.3s ease;
    }

    .search-input:focus {
        border-color: var(--primary-green);
        box-shadow: 0 0 0 3px rgba(40, 89, 33, 0.1);
        outline: none;
    }

    .filter-btn {
        padding: 14px 22px;
        border-radius: 15px;
        font-weight: bold;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
    }

    .filter-btn-primary {
        background: #7ec8a3;
        color: #000;
        box-shadow: 0 3px 8px rgba(126, 200, 163, 0.4);
    }

    .filter-btn-primary:hover {
        background: #5fb88b;
        transform: translateY(-2px);
    }

    .filter-btn-secondary {
        background: var(--secondary-beige);
        color: #000;
    }

    .filter-btn-secondary:hover {
        background: #b8a888;
        transform: translateY(-2px);
    }

    /* Translation Button */
    .btn-translate {
        padding: 14px 22px;
        border-radius: 15px;
        font-weight: bold;
        transition: all 0.3s ease;
        border: none;
        cursor: pointer;
        background: #6c5ce7;
        color: white;
    }
    .btn-translate:hover {
        background: #5b4bc4;
        transform: translateY(-2px);
    }

    .event-count-badge {
        background: rgba(40, 89, 33, 0.1);
        border-radius: 25px;
        padding: 10px 18px;
        font-weight: bold;
        border: 1.5px solid rgba(40, 89, 33, 0.3);
        color: var(--primary-green);
    }

    /* ========== CUTE GRID EVENT CARDS (3 per row) ========== */
    #eventsContainer { 
        display: grid; 
        grid-template-columns: repeat(3, 1fr);
        gap: 28px;
    }

    /* Modern card design */
    .event-card {
        background: white;
        border-radius: var(--radius-card);
        overflow: hidden;
        box-shadow: var(--card-shadow);
        transition: all 0.3s ease;
        cursor: pointer;
        display: flex;
        flex-direction: column;
        border: 1px solid rgba(40, 89, 33, 0.1);
    }

    .event-card:hover {
        transform: translateY(-6px);
        box-shadow: var(--card-hover-shadow);
        border-color: rgba(40, 89, 33, 0.25);
    }

    /* Image container */
    .event-image {
        width: 100%;
        height: 180px;
        overflow: hidden;
        position: relative;
        background: linear-gradient(135deg, #e8e0d4, #d4c9b8);
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

    /* Calendar badge overlay */
    .calendar-box {
        position: absolute;
        top: 14px;
        left: 14px;
        background: rgba(0, 0, 0, 0.75);
        backdrop-filter: blur(6px);
        border-radius: 14px;
        padding: 6px 12px;
        display: flex;
        flex-direction: column;
        align-items: center;
        min-width: 62px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .calendar-month {
        font-size: 10px;
        font-weight: 700;
        color: white;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .calendar-day {
        font-size: 22px;
        font-weight: 800;
        color: white;
        line-height: 1.2;
        margin-top: 2px;
    }

    /* Content section */
    .event-info {
        padding: 18px 18px 20px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        flex: 1;
    }

    .event-title-row {
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
        margin-bottom: 4px;
    }

    .event-title {
        font-size: 1.2rem;
        font-weight: 700;
        color: var(--primary-green);
        margin: 0;
        letter-spacing: -0.2px;
        line-height: 1.3;
    }

    .badge-new {
        font-size: 8px;
        font-weight: 700;
        color: white;
        background: #e67e22;
        border-radius: 30px;
        padding: 3px 8px;
        letter-spacing: 0.3px;
    }

    .badge-activities {
        font-size: 9px;
        font-weight: 600;
        color: white;
        background: var(--secondary-beige);
        border-radius: 30px;
        padding: 3px 10px;
    }

    /* Details row */
    .event-details {
        display: flex;
        flex-direction: column;
        gap: 6px;
        margin: 4px 0;
    }

    .detail-row {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 12px;
    }

    .detail-row .icon {
        font-size: 12px;
        width: 22px;
        color: var(--primary-green);
    }

    .detail-row .text {
        color: #5a6c5a;
    }

    .detail-row .text.green { color: #2e7d32; font-weight: 600; }
    .detail-row .text.orange { color: #e67e22; font-weight: 600; }
    .detail-row .text.red { color: #c0392b; font-weight: 600; }

    /* Progress bar compact */
    .progress {
        height: 5px;
        background: #e0d9cc;
        border-radius: 10px;
        overflow: hidden;
        margin: 6px 0;
    }

    .progress-bar {
        background: var(--primary-green);
        height: 100%;
        border-radius: 10px;
    }

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
        font-size: 18px;
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
    .rating-average {
        font-size: 11px;
        color: #ffc107;
        margin-left: 6px;
        font-weight: bold;
    }
    .rating-count {
        font-size: 10px;
        color: #8b9a8b;
        margin-left: 5px;
    }
    .rating-text {
        font-size: 11px;
        color: #8b9a8b;
        margin-left: 8px;
    }

    /* Action buttons - compact row */
    .action-row {
        display: flex;
        align-items: center;
        gap: 8px;
        flex-wrap: wrap;
        margin-top: 8px;
        border-top: 1px solid rgba(40, 89, 33, 0.1);
        padding-top: 12px;
    }

    .btn-participate {
        padding: 6px 16px;
        border: none;
        border-radius: 40px;
        font-size: 11px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s;
        background: var(--primary-green);
        color: white;
        flex: 1;
    }

    .btn-participate:hover:not(:disabled) { 
        background: #3d7e33; 
        transform: translateY(-1px); 
    }

    .btn-participate:disabled { 
        background: #4CAF50; 
        cursor: default; 
        opacity: 0.8;
    }

    .btn-participate-full { 
        background: #b22222; 
    }

    /* MICROPHONE BUTTON STYLES */
    .btn-mic {
        font-size: 16px;
        background: rgba(40, 89, 33, 0.08);
        border: none;
        cursor: pointer;
        padding: 6px 10px;
        border-radius: 30px;
        transition: all 0.2s;
        color: var(--primary-green);
    }

    .btn-mic:hover {
        background: rgba(40, 89, 33, 0.2);
        transform: scale(1.05);
    }

    .btn-mic.playing {
        background: #4CAF50;
        color: white;
        animation: micPulse 1s ease-in-out infinite;
    }

    /* COLOR BLINDNESS BUTTON STYLES */
    .btn-colorblind {
        font-size: 16px;
        background: rgba(40, 89, 33, 0.08);
        border: none;
        cursor: pointer;
        padding: 6px 10px;
        border-radius: 30px;
        transition: all 0.2s;
        color: var(--primary-green);
    }

    .btn-colorblind:hover {
        background: rgba(40, 89, 33, 0.2);
        transform: scale(1.05);
    }

    .btn-colorblind.active {
        background: #9b59b6;
        color: white;
    }

    @keyframes micPulse {
        0% { transform: scale(1); box-shadow: 0 0 0 0 rgba(76, 175, 80, 0.7); }
        50% { transform: scale(1.1); box-shadow: 0 0 0 8px rgba(76, 175, 80, 0.3); }
        100% { transform: scale(1); box-shadow: 0 0 0 0 rgba(76, 175, 80, 0); }
    }

    .btn-favorite {
        font-size: 18px;
        background: transparent;
        border: none;
        cursor: pointer;
        padding: 4px 6px;
        transition: transform 0.2s;
        color: #d4af7a;
    }

    .btn-favorite:hover { 
        transform: scale(1.15); 
        color: #e67e22; 
    }

    .btn-admin {
        font-size: 11px;
        padding: 5px 10px;
        border-radius: 20px;
        font-weight: 600;
        border: none;
        cursor: pointer;
        transition: all 0.2s;
    }

    .btn-status {
        background: #4A90E2;
        color: white;
    }
    .btn-status:hover {
        opacity: 0.9;
        transform: scale(1.02);
    }
    .btn-edit {
        background: #2196F3;
        color: white;
    }
    .btn-edit:hover {
        background: #1976D2;
    }
    .btn-delete {
        background: #f44336;
        color: white;
    }
    .btn-delete:hover {
        background: #d32f2f;
    }
    .btn-qr {
        background: var(--primary-green);
        color: white;
    }
    .btn-qr:hover {
        background: #3d7e33;
    }

    /* Planifications preview */
    .plan-preview {
        margin-top: 8px;
        padding: 8px 10px;
        background: rgba(168, 230, 207, 0.12);
        border-radius: 14px;
        border: 1px solid rgba(40, 89, 33, 0.08);
        font-size: 11px;
        color: #5a6c5a;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .plan-preview-icon {
        width: 24px;
        height: 24px;
        background: var(--primary-green);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 11px;
        font-weight: bold;
        flex-shrink: 0;
    }

    .plan-preview-text {
        flex: 1;
        overflow: hidden;
        white-space: nowrap;
        text-overflow: ellipsis;
    }

    .more-plans {
        font-size: 10px;
        color: var(--primary-green);
        font-weight: 600;
        margin-top: 4px;
        text-align: center;
    }

    /* Translation Modal */
    .translation-modal {
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
        animation: fadeInUp 0.3s ease-out;
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

    /* Color Blindness Modal */
    .colorblind-modal {
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
        animation: fadeInUp 0.3s ease-out;
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
        grid-column: 1 / -1;
        background: linear-gradient(135deg, rgba(255,255,255,0.95), rgba(245,241,237,0.95));
        border-radius: 25px;
        border: 2px solid rgba(40, 89, 33, 0.25);
        padding: 60px;
        text-align: center;
    }

    /* Animations */
    @keyframes fadeInUp {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .event-card {
        animation: fadeInUp 0.4s ease-out forwards;
    }

    /* Toast notification */
    .speech-toast {
        position: fixed;
        bottom: 80px;
        left: 50%;
        transform: translateX(-50%);
        background: var(--primary-green);
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
        color: var(--primary-green);
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
        background: #7ec8a3;
        border-color: var(--primary-green);
        color: white;
        box-shadow: 0 6px 16px rgba(40, 89, 33, 0.25);
    }

    .pagination .active a {
        background: linear-gradient(135deg, var(--primary-green), #2e6a28);
        color: white;
        border-color: var(--primary-green);
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
        color: var(--primary-green);
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
        color: var(--primary-green);
        cursor: pointer;
        transition: all 0.2s;
        outline: none;
    }

    .per-page-selector select:hover {
        border-color: var(--primary-green);
        background: #7ec8a3;
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

    /* Responsive */
    @media (max-width: 1100px) {
        #eventsContainer { grid-template-columns: repeat(2, 1fr); }
    }

    @media (max-width: 700px) {
        #eventsContainer { grid-template-columns: 1fr; }
        .events-page { padding: 20px; }
        .speech-toast { white-space: normal; text-align: center; width: 90%; }
        .countdown-timer { font-size: 10px; padding: 6px 12px; }
        .countdown-timer span { font-size: 11px; min-width: 35px; }
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

<!-- Google Translate Element -->
<div id=\"google_translate_element\"></div>

<div class=\"events-page\">
    <div class=\"container-fluid\">
        
        <!-- Header -->
        <div class=\"psychology-header\">
            <div class=\"d-flex align-items-center justify-content-between flex-wrap gap-3\">
                <div class=\"d-flex align-items-center gap-3\">
                    <div class=\"header-icon\">Ψ</div>
                    <div>
                        <h1 class=\"display-5 fw-bold\" style=\"color: var(--primary-green);\">Événements & Planifications</h1>
                        <p class=\"text-muted fst-italic\">🌱 Cultivez votre bien-être mental et épanouissement personnel</p>
                    </div>
                </div>
                <div class=\"d-flex gap-2\">
                    <button type=\"button\" class=\"btn btn-primary\" style=\"background: #4A90E2; border-radius: 20px;\" onclick=\"openAIPanel()\">
                        🤖 Assistant IA
                    </button>
                    <div class=\"position-relative\">
                        <button type=\"button\" class=\"btn btn-link position-relative\" id=\"notificationBell\" style=\"font-size: 24px; text-decoration: none;\" data-bs-toggle=\"modal\" data-bs-target=\"#notificationsModal\">
                            🔔
                            <span class=\"position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger\" id=\"notificationBadge\" style=\"display: none;\">0</span>
                        </button>
                    </div>
                    <button type=\"button\" class=\"btn\" style=\"background: #4CAF50; color: white; border-radius: 12px; font-weight: bold;\" data-bs-toggle=\"modal\" data-bs-target=\"#createEventModal\">
                        ➕ Ajouter
                    </button>
                </div>
            </div>
        </div>

        <!-- Search and Filter Bar -->
        <div class=\"search-sort-bar\">
            <div class=\"row align-items-center g-3\">
                <div class=\"col-md-5\">
                    <input type=\"text\" id=\"searchInput\" class=\"search-input\" placeholder=\"🔍 Recherchez votre atelier de bien-être...\">
                </div>
                <div class=\"col-md-auto\">
                    <div class=\"custom-sort-wrap\" style=\"position:relative;\">
                        <button id=\"sortBtn\" class=\"filter-btn filter-btn-primary\" type=\"button\">
                            ✨ Trier par ▾
                        </button>
                        <div id=\"sortMenu\" style=\"display:none;position:absolute;top:calc(100% + 6px);left:0;z-index:9999;background:white;border-radius:12px;box-shadow:0 8px 24px rgba(0,0,0,0.15);padding:6px;min-width:210px;\">
                            <div class=\"sort-item active-sort\" data-sort=\"date\"       style=\"padding:10px 18px;border-radius:8px;cursor:pointer;font-size:13px;\">📅 Par Date (Récent)</div>
                            <div class=\"sort-item\"            data-sort=\"title\"      style=\"padding:10px 18px;border-radius:8px;cursor:pointer;font-size:13px;\">📚 Par Titre (A → Z)</div>
                            <div class=\"sort-item\"            data-sort=\"activities\" style=\"padding:10px 18px;border-radius:8px;cursor:pointer;font-size:13px;\">🎯 Par Activités</div>
                        </div>
                    </div>
                </div>
                <div class=\"col-md-auto\">
                    <button id=\"favoritesBtn\" class=\"filter-btn filter-btn-secondary\">💛 Mes Favoris</button>
                </div>
                <div class=\"col-md-auto\">
                    <!-- 🌐 TRANSLATION BUTTON -->
                    <button class=\"btn-translate\" id=\"translateBtn\" onclick=\"showTranslationModal()\">🌐 Traduire</button>
                </div>
                <div class=\"col-md-auto ms-auto\">
                    <span class=\"event-count-badge\" id=\"eventCount\">🎯 {{ totalCount }} événement{{ totalCount > 1 ? 's' : '' }}</span>
                </div>
            </div>
        </div>

        <!-- Events Container -->
        <div id=\"eventsContainer\">
            {% if events is empty %}
                <div class=\"empty-state\">
                    <div style=\"font-size: 72px;\">🌸</div>
                    <h3 class=\"mt-3\" style=\"color: #285921;\">Aucun événement trouvé</h3>
                    <p class=\"text-muted\">🌱 Commencez par créer votre premier événement</p>
                </div>
            {% else %}
                {% for event in events %}
                    {% set ratio = event.maxParticipants > 0 ? event.currentParticipants / event.maxParticipants : 0 %}
                    {% set isNew = event.createdAt and date().diff(event.createdAt).days <= 7 %}
                    {% set isFull = event.currentParticipants >= event.maxParticipants %}
                    {% set plansCount = event.planifications|length %}
                    {% set avgRating = event.avgRating ?? 0 %}
                    {% set ratingCount = event.ratingCount ?? 0 %}
                    
                    <div class=\"event-card\" 
                         data-event-id=\"{{ event.id }}\"
                         data-title=\"{{ event.title|lower }}\"
                         data-date=\"{{ event.eventDate ? event.eventDate|date('Y-m-d') : '0000-00-00' }}\"
                         data-activities=\"{{ plansCount }}\">
                        
                        <!-- Image with calendar overlay -->
                        <div class=\"event-image\">
                            {% if event.link %}
                                <img src=\"{{ event.link }}\" alt=\"{{ event.title }}\" onerror=\"this.src='https://placehold.co/400x180/e8e0d4/5a6c5a?text=Atelier'\">
                            {% else %}
                                <img src=\"https://placehold.co/400x180/e8e0d4/5a6c5a?text=Atelier+Bien-%C3%AAtre\" alt=\"Image par défaut\">
                            {% endif %}
                            
                            {% if event.eventDate %}
                            <div class=\"calendar-box\">
                                <div class=\"calendar-month\">{{ event.eventDate|date('M')|upper }}</div>
                                <div class=\"calendar-day\">{{ event.eventDate|date('d') }}</div>
                            </div>
                            {% endif %}
                        </div>
                        
                        <!-- Content -->
                        <div class=\"event-info\">
                            <div class=\"event-title-row\">
                                {% if isNew %}<span class=\"badge-new\">NOUVEAU</span>{% endif %}
                                <h3 class=\"event-title\">{{ event.title }}</h3>
                                {% if plansCount > 0 %}
                                    <span class=\"badge-activities\">🎯 {{ plansCount }}</span>
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
                                    <span class=\"text\">{{ event.location|length > 35 ? event.location|slice(0, 32) ~ '...' : event.location }}</span>
                                </div>
                                {% endif %}
                                
                                <div class=\"detail-row\">
                                    <span class=\"icon\">👥</span>
                                    <span class=\"text {% if ratio >= 1 %}red{% elseif ratio >= 0.8 %}orange{% else %}green{% endif %}\">
                                        {{ event.currentParticipants }} / {{ event.maxParticipants }} participants
                                    </span>
                                </div>
                                
                                <div class=\"progress\">
                                    <div class=\"progress-bar\" style=\"width: {{ (event.currentParticipants / event.maxParticipants) * 100 }}%\"></div>
                                </div>
                            </div>
                            
                            <!-- ========== 5-STAR RATING SYSTEM ========== -->
                            <div class=\"rating-container\">
                                <div class=\"stars\" data-event-id=\"{{ event.id }}\">
                                    {% for i in 1..5 %}
                                        <span class=\"star {% if avgRating >= i %}active{% endif %}\">★</span>
                                    {% endfor %}
                                </div>
                                <span class=\"rating-average\" id=\"rating-avg-{{ event.id }}\">({{ avgRating }})</span>
                                <span class=\"rating-count\" id=\"rating-count-{{ event.id }}\">({{ ratingCount }} avis)</span>
                            </div>
                            
                            <!-- Planification preview -->
                            {% if event.planifications is not empty %}
                            <div class=\"plan-preview\">
                                <div class=\"plan-preview-icon\">🌱</div>
                                <div class=\"plan-preview-text\">
                                    {{ event.planifications[0].description|length > 40 ? event.planifications[0].description|slice(0, 37) ~ '...' : event.planifications[0].description }}
                                </div>
                            </div>
                            {% if plansCount > 1 %}
                            <div class=\"more-plans\">+ {{ plansCount - 1 }} autre(s) activité(s)</div>
                            {% endif %}
                            {% endif %}
                            
                            <!-- Action buttons -->
                            <div class=\"action-row\">
                                {% if event.status == 'cancelled' %}
                                    <button class=\"btn-participate btn-participate-full\" disabled>❌ Événement annulé</button>
                                {% elseif event.status == 'completed' %}
                                    <button class=\"btn-participate btn-participate-full\" disabled>✅ Événement terminé</button>
                                {% elseif event.currentParticipants >= event.maxParticipants %}
                                    <button class=\"btn-participate btn-participate-full\" disabled>Complet</button>
                                {% elseif event.hasParticipated %}
                                    <button class=\"btn-participate\" disabled>✅ Inscrit</button>
                                {% else %}
                                    <button class=\"btn-participate\" onclick=\"processParticipation({{ event.id }}, this)\">🎯 S'inscrire</button>
                                {% endif %}
                                
                                <!-- 🎤 MICROPHONE BUTTON -->
                                <button class=\"btn-mic\" 
                                        onclick=\"speakEventDetails({{ event.id }})\"
                                        title=\"Écouter les détails de l'événement\"
                                        data-event-id=\"{{ event.id }}\">
                                    🎤
                                </button>
                                
                                <!-- 🎨 COLOR BLINDNESS BUTTON -->
                                <button class=\"btn-colorblind\" 
                                        onclick=\"showColorBlindOptions()\"
                                        title=\"Options pour daltoniens (amélioration des couleurs)\">
                                    🎨
                                </button>
                                
                                <button class=\"btn-favorite\" onclick=\"toggleFavorite({{ event.id }})\" id=\"favoriteBtn-{{ event.id }}\">🤍</button>
                            </div>
                            
                            <!-- Hidden data for speech synthesis -->
                            <div style=\"display: none;\" class=\"event-speech-data\" 
                                 data-title=\"{{ event.title }}\"
                                 data-date=\"{% if event.eventDate %}{{ event.eventDate|date('d/m/Y') }}{% else %}Date non spécifiée{% endif %}\"
                                 data-location=\"{{ event.location ?: 'Lieu non spécifié' }}\"
                                 data-participants=\"{{ event.currentParticipants }} participants sur {{ event.maxParticipants }} maximum\"
                                 data-plans-count=\"{{ plansCount }}\"
                                 data-plans=\"{% for plan in event.planifications %}{{ plan.description }} ({{ plan.duree }}){% if not loop.last %}, {% endif %}{% endfor %}\">
                            </div>
                            
                            <!-- Admin actions -->
                            <div class=\"d-flex gap-1 justify-content-end mt-1\">
                                {% if event.isCreator %}
                                    <button class=\"btn-admin btn-status\" 
                                            onclick=\"openStatusModal({{ event.id }}, '{{ event.title|e('js') }}', '{{ event.status ?? 'upcoming' }}')\"
                                            style=\"background: {{ event.status == 'upcoming' ? '#4A90E2' : (event.status == 'ongoing' ? '#4CAF50' : (event.status == 'completed' ? '#9E9E9E' : '#f44336')) }}; color: white;\">
                                        📊 Statut
                                    </button>
                                    <button class=\"btn-admin btn-edit\" onclick=\"openEditModal({{ event.id }})\">✏️</button>
                                    <button class=\"btn-admin btn-delete\" onclick=\"deleteEvent({{ event.id }})\">🗑️</button>
                                {% endif %}
                                <button class=\"btn-admin btn-qr\" onclick=\"openQrModal({{ event.id }})\">📍</button>
                            </div>
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
                    <li><a href=\"{{ path('psycho_events_index', {page: currentPage - 1, limit: currentLimit}) }}\">←</a></li>
                {% else %}
                    <li class=\"disabled\"><a href=\"#\">←</a></li>
                {% endif %}
                
                {# First page #}
                {% if currentPage > 3 %}
                    <li><a href=\"{{ path('psycho_events_index', {page: 1, limit: currentLimit}) }}\">1</a></li>
                    {% if currentPage > 4 %}
                        <li class=\"disabled\"><a href=\"#\">...</a></li>
                    {% endif %}
                {% endif %}
                
                {# Page numbers around current page #}
                {% for p in range(max(1, currentPage - 2), min(totalPages, currentPage + 2)) %}
                    {% if p == currentPage %}
                        <li class=\"active\"><a href=\"#\">{{ p }}</a></li>
                    {% else %}
                        <li><a href=\"{{ path('psycho_events_index', {page: p, limit: currentLimit}) }}\">{{ p }}</a></li>
                    {% endif %}
                {% endfor %}
                
                {# Last page #}
                {% if currentPage < totalPages - 2 %}
                    {% if currentPage < totalPages - 3 %}
                        <li class=\"disabled\"><a href=\"#\">...</a></li>
                    {% endif %}
                    <li><a href=\"{{ path('psycho_events_index', {page: totalPages, limit: currentLimit}) }}\">{{ totalPages }}</a></li>
                {% endif %}
                
                {# Next page link #}
                {% if currentPage < totalPages %}
                    <li><a href=\"{{ path('psycho_events_index', {page: currentPage + 1, limit: currentLimit}) }}\">→</a></li>
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

    </div>
</div>

<!-- Translation Modal -->
<div id=\"translationModal\" class=\"translation-modal\">
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
<div id=\"colorblindModal\" class=\"colorblind-modal\">
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

<!-- Speech Toast Notification -->
<div id=\"speechToast\" class=\"speech-toast\">
    <span>🎤</span>
    <span id=\"speechToastMessage\">Lecture en cours...</span>
</div>

<!-- Create Event Modal -->
<div class=\"modal fade\" id=\"createEventModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-lg modal-dialog-scrollable\">
        <div class=\"modal-content\" style=\"border-radius: 20px;\">
            <div class=\"modal-header\" style=\"background: linear-gradient(135deg, #285921, #3d7e33); color: white; border-radius: 20px 20px 0 0;\">
                <h5 class=\"modal-title\">➕ Créer un nouvel atelier</h5>
                <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body\" style=\"background: #F5F1E6;\">
                <style>
                    .cf-label { font-weight: bold; color: #5c715a; }
                    .cf-input {
                        width: 100%; padding: 10px; border-radius: 5px;
                        border: 1px solid #d2e0cf; transition: all 0.3s ease;
                        background: white;
                    }
                    .cf-input:focus { border-color: #285921; outline: none; box-shadow: 0 0 0 3px rgba(40,89,33,0.1); }
                    .cf-input.cf-valid   { border: 2px solid green; }
                    .cf-input.cf-invalid { border: 2px solid red; }
                    .cf-input.cf-warning { border: 2px solid orange; }
                    .cf-input.cf-suggestion { border: 2px solid #4CAF50; background: #f0f7f0; }
                    .cf-btn-correct {
                        background: #2196F3; color: white; font-weight: bold;
                        padding: 9px 12px; border-radius: 5px; font-size: 12px;
                        border: none; cursor: pointer; white-space: nowrap; width: 100%;
                        transition: all 0.3s;
                    }
                    .cf-btn-correct:hover:not(:disabled) { background: #1976D2; }
                    .cf-btn-correct:disabled { opacity: 0.5; cursor: not-allowed; }
                    .cf-spinner {
                        width: 22px; height: 22px; border: 3px solid #eee;
                        border-top: 3px solid #285921; border-radius: 50%;
                        animation: cf-spin 1s linear infinite; display: inline-block;
                    }
                    @keyframes cf-spin { to { transform: rotate(360deg); } }
                    .cf-plan-section { background: #fcfaf7; padding: 15px; border-radius: 10px; border: 1px solid #d2e0cf; }
                </style>

                <div class=\"row mb-3 align-items-center\">
                    <div class=\"col-md-3\"><label class=\"cf-label\">Titre *</label></div>
                    <div class=\"col-md-7\"><input type=\"text\" id=\"cf-title\" class=\"cf-input\" placeholder=\"Ex: Atelier sur l'égoïsme\"></div>
                    <div class=\"col-md-2\"><button type=\"button\" id=\"cf-btnCorrectTitle\" class=\"cf-btn-correct\" disabled>🔍 Corriger</button></div>
                </div>

                <div class=\"row mb-3\">
                    <div class=\"col-md-3\"></div>
                    <div class=\"col-md-9 d-flex align-items-center gap-2\">
                        <div id=\"cf-loading\" class=\"cf-spinner\" style=\"display:none!important;\"></div>
                        <button type=\"button\" id=\"cf-btnGenerate\" class=\"btn w-100\" style=\"background:#7f9a7d;color:white;font-weight:bold;border-radius:5px;\">✨ Générer la planification</button>
                    </div>
                </div>

                <div class=\"row mb-3 align-items-center\">
                    <div class=\"col-md-3\"><label class=\"cf-label\">Lieu *</label></div>
                    <div class=\"col-md-9\"><input type=\"text\" id=\"cf-location\" class=\"cf-input\" placeholder=\"Ex: Salle de méditation, Paris\"></div>
                </div>

                <div class=\"row mb-3 align-items-center\">
                    <div class=\"col-md-3\"><label class=\"cf-label\">Date *</label></div>
                    <div class=\"col-md-3\">
                        <input type=\"date\" id=\"cf-date\" class=\"cf-input\">
                        <div id=\"cf-dateMsg\" style=\"font-size:12px;color:#c0392b;margin-top:4px;display:none;\"></div>
                    </div>
                    <div class=\"col-md-3\"><label class=\"cf-label\">Participants max *</label></div>
                    <div class=\"col-md-3\"><input type=\"number\" id=\"cf-maxPart\" class=\"cf-input\" value=\"30\" placeholder=\"Ex: 20\"></div>
                </div>

                <div class=\"row mb-3 align-items-center\">
                    <div class=\"col-md-3\"><label class=\"cf-label\">Image URL</label></div>
                    <div class=\"col-md-9\"><input type=\"text\" id=\"cf-link\" class=\"cf-input\" placeholder=\"URL de l'image\"></div>
                </div>

                <div class=\"cf-plan-section mb-3\">
                    <div class=\"d-flex justify-content-between align-items-center mb-3\">
                        <label style=\"font-size:15px;font-weight:bold;color:#5c715a;\">📋 Planification de l'atelier</label>
                        <span id=\"cf-suggestionLabel\" style=\"display:none;color:#4CAF50;font-style:italic;font-weight:bold;\">(Suggestion IA)</span>
                    </div>

                    <div class=\"row mb-3 align-items-center\">
                        <div class=\"col-md-3\"><label class=\"cf-label\">Description</label></div>
                        <div class=\"col-md-7\"><input type=\"text\" id=\"cf-planDesc\" class=\"cf-input\" placeholder=\"Ex: Séance de méditation guidée\"></div>
                        <div class=\"col-md-2\"><button type=\"button\" id=\"cf-btnCorrectDesc\" class=\"cf-btn-correct\" disabled>🔍 Corriger</button></div>
                    </div>

                    <div class=\"row mb-2 align-items-center\">
                        <div class=\"col-md-3\"><label class=\"cf-label\">Durée</label></div>
                        <div class=\"col-md-9\"><input type=\"text\" id=\"cf-planDuree\" class=\"cf-input\" placeholder=\"Ex: 2 heures\"></div>
                    </div>

                    <div class=\"d-flex justify-content-end gap-2 mt-2\">
                        <button type=\"button\" id=\"cf-btnAccept\" class=\"btn btn-success btn-sm\" style=\"display:none;\">✓ Accepter la suggestion</button>
                        <button type=\"button\" id=\"cf-btnReject\" class=\"btn btn-danger btn-sm\" style=\"display:none;\">✗ Rejeter</button>
                    </div>
                </div>

                <div id=\"cf-errorBox\" class=\"alert alert-danger\" style=\"display:none;border-radius:10px;\"></div>

                <div class=\"d-flex gap-3 justify-content-center mt-3\">
                    <button type=\"button\" id=\"cf-btnSave\" class=\"btn\" style=\"background:#7f9a7d;color:white;font-weight:bold;padding:12px 30px;border-radius:8px;\">💾 Sauvegarder</button>
                    <button type=\"button\" class=\"btn\" data-bs-dismiss=\"modal\" style=\"background:#b7c9b5;color:white;font-weight:bold;padding:12px 30px;border-radius:8px;\">✖ Annuler</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Correction Dialog -->
<div id=\"cf-correctionDialog\" style=\"display:none;position:fixed;top:0;left:0;width:100%;height:100%;background:rgba(0,0,0,0.5);z-index:10000;justify-content:center;align-items:center;\">
    <div style=\"background:white;border-radius:15px;padding:25px;max-width:480px;width:90%;\">
        <h5 class=\"mb-3\">Proposition de correction</h5>
        <div class=\"mb-3\">
            <label class=\"fw-bold\">📝 Texte original :</label>
            <div id=\"cf-origText\" class=\"p-2 mt-1\" style=\"background:#fff0f0;border-radius:8px;\"></div>
        </div>
        <div class=\"mb-3\">
            <label class=\"fw-bold\">✅ Texte corrigé :</label>
            <div id=\"cf-corrText\" class=\"p-2 mt-1\" style=\"background:#f0fff0;border-radius:8px;color:#4CAF50;font-weight:bold;\"></div>
        </div>
        <div class=\"d-flex gap-3 justify-content-end\">
            <button id=\"cf-acceptCorr\" class=\"btn btn-success\">✓ Accepter</button>
            <button id=\"cf-rejectCorr\" class=\"btn btn-secondary\">✗ Garder l'original</button>
        </div>
    </div>
</div>

<!-- Edit Event Modal -->
<div class=\"modal fade\" id=\"editEventModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-lg modal-dialog-scrollable\">
        <div class=\"modal-content\" style=\"border-radius: 20px;\">
            <div class=\"modal-header\" style=\"background: linear-gradient(135deg, #2196F3, #1976D2); color: white; border-radius: 20px 20px 0 0;\">
                <h5 class=\"modal-title\">✏️ Modifier l'événement</h5>
                <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body\" style=\"background: #F5F1E6;\">
                <style>
                    .ef-label { font-weight: bold; color: #5c715a; }
                    .ef-input {
                        width: 100%; padding: 10px; border-radius: 5px;
                        border: 1px solid #d2e0cf; transition: all 0.3s ease; background: white;
                    }
                    .ef-input:focus { border-color: #285921; outline: none; box-shadow: 0 0 0 3px rgba(40,89,33,0.1); }
                    .ef-plan-section { background: #fcfaf7; padding: 15px; border-radius: 10px; border: 1px solid #d2e0cf; }
                </style>

                <input type=\"hidden\" id=\"ef-id\">
                <input type=\"hidden\" id=\"ef-planId\">

                <div class=\"row mb-3 align-items-center\">
                    <div class=\"col-md-3\"><label class=\"ef-label\">Titre *</label></div>
                    <div class=\"col-md-9\"><input type=\"text\" id=\"ef-title\" class=\"ef-input\" placeholder=\"Ex: Atelier sur l'égoïsme\"></div>
                </div>

                <div class=\"row mb-3 align-items-center\">
                    <div class=\"col-md-3\"><label class=\"ef-label\">Lieu *</label></div>
                    <div class=\"col-md-9\"><input type=\"text\" id=\"ef-location\" class=\"ef-input\" placeholder=\"Ex: Salle de méditation\"></div>
                </div>

                <div class=\"row mb-3 align-items-center\">
                    <div class=\"col-md-3\"><label class=\"ef-label\">Date *</label></div>
                    <div class=\"col-md-3\"><input type=\"date\" id=\"ef-date\" class=\"ef-input\"></div>
                    <div class=\"col-md-3\"><label class=\"ef-label\">Participants max *</label></div>
                    <div class=\"col-md-3\"><input type=\"number\" id=\"ef-maxPart\" class=\"ef-input\" placeholder=\"Ex: 20\"></div>
                </div>

                <div class=\"row mb-3 align-items-center\">
                    <div class=\"col-md-3\"><label class=\"ef-label\">Image URL</label></div>
                    <div class=\"col-md-9\"><input type=\"text\" id=\"ef-link\" class=\"ef-input\" placeholder=\"URL de l'image\"></div>
                </div>

                <div class=\"ef-plan-section mb-3\">
                    <label style=\"font-size:15px;font-weight:bold;color:#5c715a;\" class=\"mb-3 d-block\">📋 Planification</label>
                    <div class=\"row mb-3 align-items-center\">
                        <div class=\"col-md-3\"><label class=\"ef-label\">Description</label></div>
                        <div class=\"col-md-9\"><input type=\"text\" id=\"ef-planDesc\" class=\"ef-input\" placeholder=\"Ex: Séance de méditation guidée\"></div>
                    </div>
                    <div class=\"row align-items-center\">
                        <div class=\"col-md-3\"><label class=\"ef-label\">Durée</label></div>
                        <div class=\"col-md-9\"><input type=\"text\" id=\"ef-planDuree\" class=\"ef-input\" placeholder=\"Ex: 2 heures\"></div>
                    </div>
                    <p class=\"text-muted mt-2 mb-0\" style=\"font-size:12px;\">💡 Laissez les deux champs vides pour supprimer la planification.</p>
                </div>

                <div id=\"ef-errorBox\" class=\"alert alert-danger\" style=\"display:none;border-radius:10px;\"></div>

                <div class=\"d-flex gap-3 justify-content-center mt-3\">
                    <button type=\"button\" id=\"ef-btnSave\" class=\"btn\" style=\"background:#2196F3;color:white;font-weight:bold;padding:12px 30px;border-radius:8px;\">💾 Mettre à jour</button>
                    <button type=\"button\" class=\"btn\" data-bs-dismiss=\"modal\" style=\"background:#b22222;color:white;font-weight:bold;padding:12px 30px;border-radius:8px;\">✖ Annuler</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Status Management Modal -->
<div class=\"modal fade\" id=\"statusModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-dialog-centered\" style=\"max-width: 450px;\">
        <div class=\"modal-content\" style=\"border-radius: 15px; overflow: hidden;\">
            <div class=\"modal-header\" style=\"background: linear-gradient(135deg, #4A90E2, #357ABD); color: white;\">
                <h5 class=\"modal-title\">📊 Gérer le statut</h5>
                <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body\" style=\"background: #F5F1E6; padding: 25px;\">
                <p id=\"statusEventTitle\" style=\"font-weight: bold; color: #285921; margin-bottom: 20px; text-align: center;\"></p>
                
                <div class=\"status-options\">
                    <div class=\"status-option\" data-status=\"upcoming\" onclick=\"selectStatus('upcoming')\">
                        <div style=\"display: flex; align-items: center; gap: 15px; padding: 12px; border-radius: 10px; cursor: pointer; transition: all 0.3s;\">
                            <div style=\"width: 40px; height: 40px; border-radius: 50%; background: #4A90E2; display: flex; align-items: center; justify-content: center; font-size: 20px;\">📅</div>
                            <div>
                                <div style=\"font-weight: bold;\">À venir</div>
                                <div style=\"font-size: 11px; color: #8b9a8b;\">L'événement est planifié</div>
                            </div>
                        </div>
                    </div>
                    <div class=\"status-option\" data-status=\"ongoing\" onclick=\"selectStatus('ongoing')\">
                        <div style=\"display: flex; align-items: center; gap: 15px; padding: 12px; border-radius: 10px; cursor: pointer; transition: all 0.3s;\">
                            <div style=\"width: 40px; height: 40px; border-radius: 50%; background: #4CAF50; display: flex; align-items: center; justify-content: center; font-size: 20px;\">🟢</div>
                            <div>
                                <div style=\"font-weight: bold;\">En cours</div>
                                <div style=\"font-size: 11px; color: #8b9a8b;\">L'événement se déroule actuellement</div>
                            </div>
                        </div>
                    </div>
                    <div class=\"status-option\" data-status=\"completed\" onclick=\"selectStatus('completed')\">
                        <div style=\"display: flex; align-items: center; gap: 15px; padding: 12px; border-radius: 10px; cursor: pointer; transition: all 0.3s;\">
                            <div style=\"width: 40px; height: 40px; border-radius: 50%; background: #9E9E9E; display: flex; align-items: center; justify-content: center; font-size: 20px;\">✅</div>
                            <div>
                                <div style=\"font-weight: bold;\">Terminé</div>
                                <div style=\"font-size: 11px; color: #8b9a8b;\">L'événement est terminé</div>
                            </div>
                        </div>
                    </div>
                    <div class=\"status-option\" data-status=\"cancelled\" onclick=\"selectStatus('cancelled')\">
                        <div style=\"display: flex; align-items: center; gap: 15px; padding: 12px; border-radius: 10px; cursor: pointer; transition: all 0.3s;\">
                            <div style=\"width: 40px; height: 40px; border-radius: 50%; background: #f44336; display: flex; align-items: center; justify-content: center; font-size: 20px;\">❌</div>
                            <div>
                                <div style=\"font-weight: bold;\">Annulé</div>
                                <div style=\"font-size: 11px; color: #8b9a8b;\">L'événement a été annulé</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div id=\"statusWarning\" style=\"display: none; margin-top: 15px; padding: 10px; background: #fff3cd; border-radius: 8px; font-size: 12px; color: #856404;\">
                    ⚠️ Changer le statut enverra une notification à tous les participants.
                </div>
            </div>
            <div class=\"modal-footer\" style=\"justify-content: center; gap: 15px; padding: 20px;\">
                <button type=\"button\" class=\"btn\" data-bs-dismiss=\"modal\" style=\"background: #e0e0e0; border-radius: 25px; padding: 10px 30px;\">Annuler</button>
                <button type=\"button\" id=\"confirmStatusBtn\" class=\"btn\" style=\"background: linear-gradient(135deg, #4A90E2, #357ABD); color: white; border-radius: 25px; padding: 10px 30px;\">Confirmer</button>
            </div>
        </div>
    </div>
</div>

<style>
.status-option {
    margin-bottom: 8px;
    border: 2px solid transparent;
    border-radius: 10px;
    transition: all 0.3s;
}
.status-option:hover {
    background: rgba(74, 144, 226, 0.1);
    transform: translateX(5px);
}
.status-option.selected {
    border-color: #4A90E2;
    background: rgba(74, 144, 226, 0.15);
}
</style>

<!-- AI Assistant Modal -->
<div class=\"modal fade\" id=\"aiAssistantModal\" tabindex=\"-1\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\" style=\"border-radius: 20px;\">
            <div class=\"modal-header\" style=\"background: linear-gradient(135deg, #4A90E2, #357ABD); color: white; border-radius: 20px 20px 0 0;\">
                <h5 class=\"modal-title\">🤖 Assistant Événementiel</h5>
                <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body\">
                <div id=\"chatMessages\" style=\"height: 400px; overflow-y: auto; border: 1px solid #ddd; border-radius: 10px; padding: 15px; margin-bottom: 15px;\">
                    <div class=\"text-muted text-center\">Posez-moi une question sur les événements !</div>
                </div>
                <div class=\"input-group\">
                    <input type=\"text\" id=\"chatInput\" class=\"form-control\" placeholder=\"Votre question...\" style=\"border-radius: 10px 0 0 10px;\">
                    <button class=\"btn\" id=\"sendChatBtn\" style=\"background: #4A90E2; color: white; border-radius: 0 10px 10px 0;\">Envoyer</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Notifications Modal -->
<div class=\"modal fade\" id=\"notificationsModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-lg modal-dialog-scrollable\">
        <div class=\"modal-content\" style=\"border-radius:20px;overflow:hidden;\">
            <div class=\"modal-header\" style=\"background:linear-gradient(135deg,#285921,#3d7e33);color:white;border:none;\">
                <div class=\"d-flex align-items-center gap-3\">
                    <span style=\"font-size:22px;\">🔔</span>
                    <div>
                        <h5 class=\"modal-title mb-0\">Notifications de participations</h5>
                        <small style=\"opacity:.8;\">Nouvelles inscriptions à vos événements</small>
                    </div>
                    <span id=\"nm-unreadBadge\" class=\"badge rounded-pill\" style=\"background:#4CAF50;font-size:13px;padding:5px 12px;\">0</span>
                </div>
                <button type=\"button\" class=\"btn-close btn-close-white ms-auto\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body p-0\" style=\"background:#f9f7f4;\">
                <div class=\"d-flex align-items-center gap-2 p-3 border-bottom\" style=\"background:white;\">
                    <div style=\"display:flex;align-items:center;background:#f5f5f5;border-radius:20px;padding:6px 14px;flex:1;\">
                        <span style=\"color:#8b9a8b;margin-right:6px;\">🔍</span>
                        <input type=\"text\" id=\"nm-search\" placeholder=\"Rechercher...\" style=\"border:none;outline:none;background:transparent;font-size:13px;width:100%;\">
                    </div>
                    <button id=\"nm-markAll\" class=\"btn btn-sm\" style=\"background:#374535;color:white;border-radius:20px;font-size:12px;white-space:nowrap;\">✅ Tout marquer lu</button>
                    <button id=\"nm-refresh\" class=\"btn btn-sm\" style=\"background:#4CAF50;color:white;border-radius:20px;font-size:12px;\">🔄</button>
                </div>
                <div style=\"overflow-x:auto;\">
                    <table style=\"width:100%;border-collapse:collapse;background:white;\">
                        <thead>
                            <tr style=\"background:#f0ede5;\">
                                <th style=\"padding:10px 15px;text-align:left;font-size:12px;font-weight:bold;color:#285921;border-bottom:2px solid #e0d9cc;\">Message</th>
                                <th style=\"padding:10px 15px;text-align:left;font-size:12px;font-weight:bold;color:#285921;border-bottom:2px solid #e0d9cc;width:130px;\">Date</th>
                                <th style=\"padding:10px 15px;text-align:left;font-size:12px;font-weight:bold;color:#285921;border-bottom:2px solid #e0d9cc;width:100px;\">Statut</th>
                                <th style=\"padding:10px 15px;text-align:left;font-size:12px;font-weight:bold;color:#285921;border-bottom:2px solid #e0d9cc;width:120px;\">Action</th>
                            </tr>
                        </thead>
                        <tbody id=\"nm-tbody\">
                            <tr><td colspan=\"4\" style=\"text-align:center;padding:30px;color:#8b9a8b;\">Chargement...<\\/td></tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Notification Detail Modal -->
<div class=\"modal fade\" id=\"nm-detailModal\" tabindex=\"-1\" style=\"z-index:10060;\">
    <div class=\"modal-dialog modal-dialog-centered\" style=\"max-width:500px;\">
        <div class=\"modal-content\" style=\"border-radius:15px;overflow:hidden;border:1px solid #d4c9b8;\">
            <div id=\"nm-detailBody\" style=\"background:#f9f7f4;\">
                <div style=\"text-align:center;padding:40px;color:#8b9a8b;\">Chargement...</div>
            </div>
        </div>
    </div>
</div>

<!-- Delete Confirmation Modal -->
<div class=\"modal fade\" id=\"deleteConfirmModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-dialog-centered\" style=\"max-width: 420px;\">
        <div class=\"modal-content\" style=\"border-radius: 16px; overflow: hidden;\">
            <div class=\"modal-header\" style=\"background: #f44336; color: white; border: none;\">
                <h5 class=\"modal-title\">🗑️ Confirmer la suppression</h5>
                <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body text-center py-4\">
                <div style=\"font-size: 48px; margin-bottom: 12px;\">⚠️</div>
                <p style=\"font-size: 15px; color: #333;\">Êtes-vous sûr de vouloir supprimer cet événement ?</p>
                <p class=\"text-muted\" style=\"font-size: 13px;\">Cette action est irréversible.</p>
            </div>
            <div class=\"modal-footer justify-content-center border-0 pb-4\">
                <button type=\"button\" class=\"btn\" data-bs-dismiss=\"modal\" style=\"background: #e0e0e0; color: #333; border-radius: 10px; padding: 10px 28px; font-weight: bold;\">Annuler</button>
                <button type=\"button\" id=\"confirmDeleteBtn\" class=\"btn\" style=\"background: #f44336; color: white; border-radius: 10px; padding: 10px 28px; font-weight: bold;\">Supprimer</button>
            </div>
        </div>
    </div>
</div>

<!-- QR Code Modal -->
<div class=\"modal fade\" id=\"qrCodeModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-dialog-centered\" style=\"max-width: 380px;\">
        <div class=\"modal-content\" style=\"border-radius: 20px; overflow: hidden;\">
            <div class=\"modal-header\" style=\"background: linear-gradient(135deg, #285921, #3d7e33); color: white; border: none;\">
                <h5 class=\"modal-title\">📍 QR Code — Localisation</h5>
                <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body text-center py-4\">
                <div id=\"qrLoading\" style=\"font-size: 14px; color: #888; margin-bottom: 12px;\">⏳ Génération du QR code...</div>
                <div id=\"qrContent\" style=\"display:none;\">
                    <h6 id=\"qrTitle\" style=\"color:#285921; font-weight:bold; margin-bottom:4px;\"></h6>
                    <p id=\"qrLocation\" style=\"font-size:13px; color:#69685c; margin-bottom:16px;\"></p>
                    <div id=\"qrImage\" style=\"width:220px; height:220px; border-radius:12px; border:2px solid #e0d9cc; margin:0 auto; background:white; padding:8px;\"></div>
                    <div class=\"mt-3\">
                        <a id=\"qrMapsLink\" href=\"#\" target=\"_blank\" class=\"btn btn-sm\" style=\"background:#285921; color:white; border-radius:20px; padding:8px 20px; text-decoration:none; font-size:13px;\">
                            🗺️ Ouvrir dans Google Maps
                        </a>
                    </div>
                </div>
                <div id=\"qrError\" style=\"display:none; color:#f44336; font-size:13px;\">❌ Impossible de charger le QR code.</div>
            </div>
        </div>
    </div>
</div>

{# ── AI Assistant Drawer ── #}
<div id=\"aiDrawerOverlay\" onclick=\"closeAIPanel()\" style=\"display:none;position:fixed;inset:0;background:rgba(0,0,0,.45);z-index:1040;\"></div>
<div id=\"aiDrawer\" style=\"display:none;position:fixed;top:0;right:0;width:min(680px,100vw);height:100vh;background:#f5f3ed;z-index:1050;box-shadow:-8px 0 30px rgba(0,0,0,.2);overflow-y:auto;flex-direction:column;\">
    <div style=\"padding:20px 24px;background:linear-gradient(135deg,rgba(255,255,255,.98),rgba(245,241,237,.98));border-bottom:1px solid #d2e0cf;display:flex;align-items:center;justify-content:space-between;\">
        <div class=\"d-flex align-items-center gap-3\">
            <div style=\"width:50px;height:50px;background:linear-gradient(135deg,#9cb39b,#7f9a7d);border-radius:50%;display:flex;align-items:center;justify-content:center;font-size:26px;\">🌿</div>
            <div>
                <div style=\"font-weight:bold;font-size:18px;color:#5c715a;\">ASSISTANT BIEN-ÊTRE</div>
                <div style=\"font-size:12px;color:#8a9a87;\">Planification d'événements apaisants</div>
            </div>
        </div>
        <button onclick=\"closeAIPanel()\" style=\"background:#f0f1ec;border:1px solid #d2e0cf;border-radius:50%;width:36px;height:36px;font-size:18px;cursor:pointer;\">✕</button>
    </div>
    <div style=\"padding:20px 24px;\">
        <div style=\"background:rgba(159,185,151,.15);border-radius:14px;padding:12px 16px;margin-bottom:16px;\">
            <span style=\"font-size:13px;font-weight:bold;color:#5c715a;\">🍃 +420 séances planifiées cette semaine</span>
        </div>
        <div style=\"background:#fcfaf7;border-radius:20px;border:1px solid #d2e0cf;padding:16px;margin-bottom:14px;\">
            <div style=\"font-size:12px;font-weight:bold;color:#5c715a;margin-bottom:10px;\">🔍 FILTRES</div>
            <div class=\"row g-2\">
                <div class=\"col-md-4\">
                    <label style=\"font-size:11px;font-weight:bold;color:#7f9a7d;\">TYPE</label>
                    <select class=\"ai-select\" id=\"ai-eventType\" style=\"background:#f0f1ec;border:1px solid #d2e0cf;border-radius:20px;padding:9px 14px;width:100%;\">
                        <option value=\"\">Sélectionner</option>
                        <option value=\"Bien-être et Méditation\">🧘 Bien-être &amp; Méditation</option>
                        <option value=\"Retraite et Nature\">🌿 Retraite &amp; Nature</option>
                        <option value=\"Ateliers et Cercles\">🌸 Ateliers &amp; Cercles</option>
                    </select>
                </div>
                <div class=\"col-md-4\">
                    <label style=\"font-size:11px;font-weight:bold;color:#7f9a7d;\">BUDGET</label>
                    <select class=\"ai-select\" id=\"ai-budget\" style=\"background:#f0f1ec;border:1px solid #d2e0cf;border-radius:20px;padding:9px 14px;width:100%;\">
                        <option value=\"\">Sélectionner</option>
                        <option value=\"Moins de 500 euros\">💰 &lt; 500 €</option>
                        <option value=\"500 à 2000 euros\">💰 500 - 2 000 €</option>
                    </select>
                </div>
                <div class=\"col-md-4\">
                    <label style=\"font-size:11px;font-weight:bold;color:#7f9a7d;\">PARTICIPANTS</label>
                    <select class=\"ai-select\" id=\"ai-audience\" style=\"background:#f0f1ec;border:1px solid #d2e0cf;border-radius:20px;padding:9px 14px;width:100%;\">
                        <option value=\"\">Sélectionner</option>
                        <option value=\"Intime moins de 20\">👥 Intime (&lt;20)</option>
                        <option value=\"Petit 20 à 50\">👥 Petit (20-50)</option>
                    </select>
                </div>
            </div>
        </div>
        <div style=\"background:#fcfaf7;border-radius:20px;border:1px solid #d2e0cf;padding:16px;margin-bottom:14px;\">
            <label style=\"font-weight:bold;font-size:13px;color:#5c715a;\">TYPE D'ACCOMPAGNEMENT</label>
            <select class=\"ai-select\" id=\"ai-helpType\" style=\"background:#f0f1ec;border:1px solid #d2e0cf;border-radius:20px;padding:9px 14px;width:100%;margin-top:8px;\">
                <option value=\"Idées de thèmes\">🎯 Idées de thèmes</option>
                <option value=\"Planification budgétaire\">💰 Budget</option>
                <option value=\"Suggestions d'activités\">✨ Activités</option>
                <option value=\"Plan complet\">📋 Plan complet</option>
            </select>
        </div>
        <div style=\"background:#fcfaf7;border-radius:20px;border:1px solid #d2e0cf;padding:16px;margin-bottom:14px;\">
            <label style=\"font-weight:bold;font-size:13px;color:#5c715a;\">VOTRE INTENTION</label>
            <textarea id=\"ai-description\" class=\"ai-textarea mt-2\" rows=\"3\" placeholder=\"Décrivez votre événement...\" style=\"background:#f0f1ec;border:1px solid #d2e0cf;border-radius:16px;width:100%;padding:10px;\"></textarea>
        </div>
        <div class=\"d-flex justify-content-center gap-3 mb-3\">
            <button class=\"ai-btn-primary\" onclick=\"aiGenerate()\" style=\"background:linear-gradient(135deg,#7f9a7d,#5c715a);color:white;border:none;border-radius:25px;padding:12px 35px;font-weight:bold;\">🌿 GÉNÉRER</button>
            <button class=\"ai-btn-secondary\" onclick=\"aiClear()\" style=\"background:#f0f1ec;color:#5c715a;border:1px solid #d2e0cf;border-radius:25px;padding:12px 25px;\">🍃 Effacer</button>
        </div>
        <div id=\"ai-loadingBar\" style=\"display:none;text-align:center;padding:10px;color:#7f9a7d;\">⏳ Génération en cours...</div>
        <div style=\"background:#fcfaf7;border-radius:20px;border:1px solid #d2e0cf;padding:16px;\">
            <textarea id=\"ai-result\" class=\"ai-result\" readonly rows=\"8\" style=\"background:#f0f1ec;border:1px solid #d2e0cf;border-radius:16px;width:100%;padding:12px;\"></textarea>
            <div class=\"d-flex gap-2 mt-2 justify-content-end\">
                <button class=\"ai-btn-sm\" onclick=\"aiCopy()\" style=\"background:#e2f0e0;color:#5c715a;border:1px solid #d2e0cf;border-radius:20px;padding:6px 14px;\">📋 Copier</button>
                <button class=\"ai-btn-sm\" onclick=\"aiSaveFav()\" style=\"background:#e2f0e0;color:#5c715a;border:1px solid #d2e0cf;border-radius:20px;padding:6px 14px;\">⭐ Favoris</button>
            </div>
        </div>
    </div>
</div>

{% endblock %}

{% block javascripts %}
{{ parent() }}
<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js\"></script>
<script src=\"https://cdnjs.cloudflare.com/ajax/libs/qrcodejs/1.0.0/qrcode.min.js\"></script>
<script>
    let likedEventIds = new Set();
    let currentUserId = {{ app.user ? app.user.id : 0 }};
    let currentSpeechUtterance = null;
    let activeMicButton = null;

    // ========== STATUS MANAGEMENT VARIABLES ==========
    let currentEventId = null;
    let currentSelectedStatus = null;

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

    // ========== OPEN STATUS MODAL ==========
    function openStatusModal(eventId, title, currentStatus) {
        currentEventId = eventId;
        currentSelectedStatus = currentStatus;
        
        document.getElementById('statusEventTitle').textContent = title;
        
        // Reset selection
        document.querySelectorAll('.status-option').forEach(opt => opt.classList.remove('selected'));
        document.querySelector(`.status-option[data-status=\"\${currentStatus}\"]`).classList.add('selected');
        
        // Hide warning initially
        document.getElementById('statusWarning').style.display = 'none';
        
        new bootstrap.Modal(document.getElementById('statusModal')).show();
    }

    // ========== SELECT STATUS ==========
    window.selectStatus = function(status) {
        document.querySelectorAll('.status-option').forEach(opt => opt.classList.remove('selected'));
        document.querySelector(`.status-option[data-status=\"\${status}\"]`).classList.add('selected');
        currentSelectedStatus = status;
        document.getElementById('statusWarning').style.display = 'block';
    };

    // ========== CONFIRM STATUS CHANGE ==========
    document.getElementById('confirmStatusBtn')?.addEventListener('click', async function() {
        if (!currentEventId || !currentSelectedStatus) return;
        
        const btn = this;
        const originalText = btn.textContent;
        btn.disabled = true;
        btn.textContent = '⏳ Mise à jour...';
        
        try {
            const response = await fetch(`/psycho/evente/\${currentEventId}/status`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ status: currentSelectedStatus })
            });
            const data = await response.json();
            
            if (data.success) {
                bootstrap.Modal.getInstance(document.getElementById('statusModal')).hide();
                showNotification('✅ Statut mis à jour avec succès !', 'success');
                setTimeout(() => location.reload(), 1500);
            } else {
                showNotification('❌ Erreur: ' + (data.error || 'Inconnue'), 'error');
            }
        } catch (error) {
            showNotification('❌ Erreur réseau', 'error');
        } finally {
            btn.disabled = false;
            btn.textContent = originalText;
        }
    });

    // ========== TRANSLATION FUNCTIONS ==========
    const languages = [
        { code: 'fr', name: 'Français',    flag: '🇫🇷', native: 'Français' },
        { code: 'en', name: 'English',     flag: '🇬🇧', native: 'English' },
        { code: 'es', name: 'Español',     flag: '🇪🇸', native: 'Español' },
        { code: 'de', name: 'Deutsch',     flag: '🇩🇪', native: 'Deutsch' },
        { code: 'it', name: 'Italiano',    flag: '🇮🇹', native: 'Italiano' },
        { code: 'pt', name: 'Português',   flag: '🇵🇹', native: 'Português' },
        { code: 'nl', name: 'Nederlands',  flag: '🇳🇱', native: 'Nederlands' },
        { code: 'ru', name: 'Русский',     flag: '🇷🇺', native: 'Русский' },
        { code: 'ar', name: 'العربية',     flag: '🇸🇦', native: 'العربية' },
        { code: 'zh', name: '中文',         flag: '🇨🇳', native: '中文' },
        { code: 'ja', name: '日本語',       flag: '🇯🇵', native: '日本語' },
        { code: 'ko', name: '한국어',       flag: '🇰🇷', native: '한국어' },
        { code: 'tr', name: 'Türkçe',      flag: '🇹🇷', native: 'Türkçe' },
        { code: 'el', name: 'Ελληνικά',    flag: '🇬🇷', native: 'Ελληνικά' },
        { code: 'hi', name: 'हिन्दी',      flag: '🇮🇳', native: 'हिन्दी' }
    ];

    // Store original text nodes so we can restore them
    const originalTexts = new Map();
    let currentLang = localStorage.getItem('preferredLanguage') || 'fr';

    // Collect all translatable text nodes (event titles, locations, labels)
    function getTranslatableNodes() {
        const selectors = [
            '.event-title', '.text', '.badge-new', '.more-plans',
            '.plan-preview-text', '.countdown-label', '.header-title',
            '.header-sub', '.search-input', '.event-count-badge'
        ];
        const nodes = [];
        selectors.forEach(function(sel) {
            document.querySelectorAll(sel).forEach(function(el) {
                if (el.childNodes.length === 1 && el.childNodes[0].nodeType === 3) {
                    nodes.push(el);
                }
            });
        });
        return nodes;
    }

    function googleTranslateElementInit() { /* no-op — not using Google Translate */ }

    function showTranslationModal() {
        const modal = document.getElementById('translationModal');
        const optionsContainer = document.getElementById('translationOptions');

        let html = '';
        languages.forEach(function(lang) {
            const activeClass = (currentLang === lang.code) ? 'active' : '';
            html += `<div class=\"translation-option \${activeClass}\" onclick=\"translatePage('\${lang.code}')\" data-lang=\"\${lang.code}\">
                        <div class=\"translation-option-icon\">\${lang.flag}</div>
                        <div class=\"translation-option-info\">
                            <div class=\"translation-option-title\">\${lang.name}</div>
                            <div class=\"translation-option-desc\">\${lang.native}</div>
                        </div>
                     </div>`;
        });
        optionsContainer.innerHTML = html;
        modal.style.display = 'flex';
    }

    function closeTranslationModal() {
        document.getElementById('translationModal').style.display = 'none';
    }

    async function translatePage(langCode) {
        closeTranslationModal();

        if (langCode === 'fr') { resetTranslation(); return; }

        currentLang = langCode;
        localStorage.setItem('preferredLanguage', langCode);

        showNotification('🌐 Traduction en cours...', 'success');

        // Collect nodes and batch-translate unique texts
        const nodes = getTranslatableNodes();
        const uniqueTexts = [];
        nodes.forEach(function(el) {
            const orig = el.getAttribute('data-orig') || el.textContent.trim();
            if (!el.getAttribute('data-orig')) el.setAttribute('data-orig', orig);
            if (orig && !uniqueTexts.includes(orig)) uniqueTexts.push(orig);
        });

        // Translate in small batches via MyMemory (free, no key needed)
        const translated = {};
        for (let i = 0; i < uniqueTexts.length; i += 5) {
            const batch = uniqueTexts.slice(i, i + 5);
            await Promise.all(batch.map(async function(text) {
                try {
                    const url = 'https://api.mymemory.translated.net/get?q='
                        + encodeURIComponent(text)
                        + '&langpair=fr|' + langCode;
                    const res  = await fetch(url);
                    const data = await res.json();
                    if (data.responseStatus === 200) {
                        translated[text] = data.responseData.translatedText;
                    }
                } catch(e) { /* keep original on error */ }
            }));
        }

        // Apply translations
        nodes.forEach(function(el) {
            const orig = el.getAttribute('data-orig') || el.textContent.trim();
            if (translated[orig]) el.textContent = translated[orig];
        });

        showNotification('✅ Page traduite en ' + getLanguageName(langCode), 'success');
    }

    function resetTranslation() {
        currentLang = 'fr';
        localStorage.setItem('preferredLanguage', 'fr');
        // Restore all original texts
        document.querySelectorAll('[data-orig]').forEach(function(el) {
            el.textContent = el.getAttribute('data-orig');
        });
        showNotification('🌐 Page réinitialisée en français', 'success');
        closeTranslationModal();
    }

    function getLanguageName(langCode) {
        const lang = languages.find(l => l.code === langCode);
        return lang ? lang.name : langCode;
    }

    function loadSavedLanguage() {
        const savedLang = localStorage.getItem('preferredLanguage');
        if (savedLang && savedLang !== 'fr') {
            const checkInterval = setInterval(function() {
                const selectFrame = document.querySelector('.goog-te-combo');
                if (selectFrame) {
                    clearInterval(checkInterval);
                    selectFrame.value = savedLang;
                    selectFrame.dispatchEvent(new Event('change'));
                }
            }, 500);
            setTimeout(() => clearInterval(checkInterval), 5000);
        }
    }

    // ========== COLOR BLINDNESS FUNCTIONS ==========
    function showColorBlindOptions() {
        const modal = document.getElementById('colorblindModal');
        modal.style.display = 'flex';
        
        const currentMode = localStorage.getItem('colorBlindMode') || 'normal';
        document.querySelectorAll('.colorblind-option').forEach(opt => opt.classList.remove('active'));
        const activeOpt = document.getElementById('opt-' + currentMode);
        if (activeOpt) activeOpt.classList.add('active');
    }

    function closeColorBlindModal() {
        document.getElementById('colorblindModal').style.display = 'none';
    }

    function setColorBlindMode(mode) {
        const body = document.body;
        body.classList.remove('protanopia', 'deuteranopia', 'tritanopia', 'achromatopsia', 'high-contrast');
        
        if (mode !== 'normal') {
            body.classList.add(mode);
        }
        
        localStorage.setItem('colorBlindMode', mode);
        
        document.querySelectorAll('.colorblind-option').forEach(opt => opt.classList.remove('active'));
        const activeOpt = document.getElementById('opt-' + mode);
        if (activeOpt) activeOpt.classList.add('active');
        
        showNotification('🎨 Mode ' + getModeName(mode) + ' activé', 'success');
    }

    function resetColorBlindMode() {
        const body = document.body;
        body.classList.remove('protanopia', 'deuteranopia', 'tritanopia', 'achromatopsia', 'high-contrast');
        localStorage.setItem('colorBlindMode', 'normal');
        
        document.querySelectorAll('.colorblind-option').forEach(opt => opt.classList.remove('active'));
        document.getElementById('opt-normal').classList.add('active');
        
        showNotification('🎨 Mode réinitialisé à la vision normale', 'success');
        closeColorBlindModal();
    }

    function getModeName(mode) {
        const names = {
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
        const savedMode = localStorage.getItem('colorBlindMode');
        if (savedMode && savedMode !== 'normal') {
            setColorBlindMode(savedMode);
        }
        loadSavedLanguage();
    });

    document.getElementById('colorblindModal')?.addEventListener('click', function(e) {
        if (e.target === this) closeColorBlindModal();
    });
    document.getElementById('translationModal')?.addEventListener('click', function(e) {
        if (e.target === this) closeTranslationModal();
    });

    // ========== SPEECH SYNTHESIS FUNCTION ==========
    function speakEventDetails(eventId) {
        const card = document.querySelector(`.event-card[data-event-id=\"\${eventId}\"]`);
        if (!card) return;
        
        const speechData = card.querySelector('.event-speech-data');
        if (!speechData) return;
        
        const title = speechData.dataset.title || \"Événement sans titre\";
        const date = speechData.dataset.date || \"Date non spécifiée\";
        const location = speechData.dataset.location || \"Lieu non spécifié\";
        const participants = speechData.dataset.participants || \"0 participants\";
        const plansCount = speechData.dataset.plansCount || \"0\";
        const plans = speechData.dataset.plans || \"\";
        
        let textToSpeak = `\${title}. Date : \${date}. Lieu : \${location}. Inscriptions : \${participants}. `;
        if (parseInt(plansCount) > 0) textToSpeak += `Au programme : \${plans}. `;
        textToSpeak += `Rejoignez-nous pour cet atelier bien-être sur NAFSEYTI !`;
        
        if (window.speechSynthesis) window.speechSynthesis.cancel();
        
        if (activeMicButton) activeMicButton.classList.remove('playing');
        
        const micButton = card.querySelector('.btn-mic');
        if (micButton) {
            activeMicButton = micButton;
            micButton.classList.add('playing');
        }
        
        const toast = document.getElementById('speechToast');
        const toastMessage = document.getElementById('speechToastMessage');
        toastMessage.textContent = `🔊 Lecture : \${title.substring(0, 40)}...`;
        toast.classList.add('show');
        
        const utterance = new SpeechSynthesisUtterance(textToSpeak);
        utterance.lang = 'fr-FR';
        utterance.rate = 0.9;
        utterance.pitch = 1.0;
        
        utterance.onend = function() {
            if (activeMicButton) activeMicButton.classList.remove('playing');
            activeMicButton = null;
            toast.classList.remove('show');
        };
        
        utterance.onerror = function() {
            if (activeMicButton) activeMicButton.classList.remove('playing');
            activeMicButton = null;
            toast.classList.remove('show');
            showNotification('❌ La synthèse vocale n\\'est pas disponible', 'error');
        };
        
        window.speechSynthesis.speak(utterance);
        currentSpeechUtterance = utterance;
    }

    if (!window.speechSynthesis) {
        document.querySelectorAll('.btn-mic').forEach(btn => {
            btn.style.opacity = '0.5';
            btn.title = 'Synthèse vocale non disponible';
            btn.disabled = true;
        });
    }

    // ========== NOTIFICATIONS FUNCTIONS ==========
    let nmAllNotifs = [];
    let nmLastUnread = 0;

    function nmPlaySound() {
        try {
            const ctx = new (window.AudioContext || window.webkitAudioContext)();
            const osc = ctx.createOscillator();
            const gain = ctx.createGain();
            osc.connect(gain); gain.connect(ctx.destination);
            osc.frequency.setValueAtTime(880, ctx.currentTime);
            osc.frequency.setValueAtTime(660, ctx.currentTime + 0.1);
            gain.gain.setValueAtTime(0.3, ctx.currentTime);
            gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + 0.4);
            osc.start(ctx.currentTime);
            osc.stop(ctx.currentTime + 0.4);
        } catch(e) {}
    }

    function nmUpdateBadge(unread) {
        const badge = document.getElementById('notificationBadge');
        if (unread > 0) {
            badge.textContent = unread;
            badge.style.display = 'inline-block';
        } else {
            badge.style.display = 'none';
        }
        const modalBadge = document.getElementById('nm-unreadBadge');
        if (modalBadge) modalBadge.textContent = unread + ' non lu' + (unread !== 1 ? 's' : '');
    }

    function nmLoad(silent) {
        fetch('{{ path('psycho_notifications_list') }}')
            .then(r => r.json())
            .then(data => {
                const unread = data.unread || 0;
                if (!silent && unread > nmLastUnread) nmPlaySound();
                nmLastUnread = unread;
                nmAllNotifs = data.notifications || [];
                nmUpdateBadge(unread);
                nmRender(nmAllNotifs);
            }).catch(() => {});
    }

    function nmRender(rows) {
        const search = (document.getElementById('nm-search')?.value || '').toLowerCase();
        const tbody = document.getElementById('nm-tbody');
        if (!tbody) return;
        const filtered = rows.filter(n => !search || n.message.toLowerCase().includes(search));

        if (!filtered.length) {
            tbody.innerHTML = '<tr><td colspan=\"4\" style=\"text-align:center;padding:30px;color:#8b9a8b;\">Aucune notification<\\/td><\\/tr>';
            return;
        }

        tbody.innerHTML = filtered.map(n => {
            const isUnread = !parseInt(n.is_read);
            const d = new Date(n.created_at);
            const dateStr = d.toLocaleDateString('fr-FR', {day:'2-digit', month:'short'});
            const timeStr = d.toLocaleTimeString('fr-FR', {hour:'2-digit', minute:'2-digit'});
            const status = isUnread ? '<span style=\"color:#285921;font-weight:bold;\">🆕 Non lu</span>' : '<span style=\"color:#aaa;\">✅ Lu</span>';
            return `<tr style=\"background:\${isUnread ? '#f0fff4' : 'white'};\">
                <td style=\"padding:10px 15px;font-size:12px;\">\${nmEsc(n.message)}<\\/td>
                <td style=\"padding:10px 15px;font-size:11px;\">\${dateStr}<br>\${timeStr}<\\/td>
                <td style=\"padding:10px 15px;\">\${status}<\\/td>
                <td style=\"padding:10px 15px;\">
                    <button class=\"nm-detail-btn\" data-id=\"\${n.id}\" style=\"background:#374535;border:none;color:white;padding:5px 12px;border-radius:8px;cursor:pointer;\">👤 Voir détails<\\/button>
                <\\/td>
               <\\/tr>`;
        }).join('');
    }

    document.getElementById('nm-search')?.addEventListener('input', () => nmRender(nmAllNotifs));
    document.getElementById('nm-refresh')?.addEventListener('click', () => nmLoad(false));
    document.getElementById('nm-markAll')?.addEventListener('click', () => {
        fetch('{{ path('psycho_notifications_mark_all') }}', {method:'POST'}).then(() => nmLoad(true));
    });

    document.getElementById('nm-tbody')?.addEventListener('click', (e) => {
        const btn = e.target.closest('.nm-detail-btn');
        if (!btn) return;
        const id = btn.dataset.id;

        // Reset body to loading state
        document.getElementById('nm-detailBody').innerHTML =
            '<div style=\"text-align:center;padding:40px;color:#8b9a8b;\">⏳ Chargement...</div>';

        new bootstrap.Modal(document.getElementById('nm-detailModal')).show();

        // Fetch notification detail
        fetch(`/psycho/notifications/\${id}/detail`)
            .then(r => r.json())
            .then(data => {
                if (data.error) throw new Error(data.error);
                const eventDate = data.event_date
                    ? new Date(data.event_date).toLocaleDateString('fr-FR', {day:'2-digit',month:'long',year:'numeric'})
                    : 'N/A';
                const partDate = data.participation_date
                    ? new Date(data.participation_date).toLocaleDateString('fr-FR', {day:'2-digit',month:'long',year:'numeric', hour:'2-digit', minute:'2-digit'})
                    : 'N/A';
                const fullName = [data.firstname, data.lastname].filter(Boolean).join(' ') || 'Inconnu';
                const ratio = data.current_participants && data.max_participants
                    ? Math.round(data.current_participants / data.max_participants * 100) : 0;

                document.getElementById('nm-detailBody').innerHTML = `
                <div style=\"background:linear-gradient(135deg,#285921,#3d7e33);padding:20px 24px;color:white;\">
                    <div style=\"display:flex;align-items:center;justify-content:space-between;\">
                        <h5 style=\"margin:0;font-size:16px;\">📋 Détail de la participation</h5>
                        <button type=\"button\" data-bs-dismiss=\"modal\"
                            style=\"background:rgba(255,255,255,.2);border:none;color:white;border-radius:50%;width:30px;height:30px;font-size:16px;cursor:pointer;line-height:1;\">✕</button>
                    </div>
                </div>
                <div style=\"padding:24px;\">

                    <div style=\"background:white;border-radius:12px;padding:16px;margin-bottom:16px;border:1px solid #e8e0d4;\">
                        <div style=\"font-size:11px;text-transform:uppercase;letter-spacing:1px;color:#8b9a8b;margin-bottom:8px;\">👤 Participant</div>
                        <div style=\"font-size:18px;font-weight:bold;color:#285921;\">\${nmEsc(fullName)}</div>
                        <div style=\"font-size:13px;color:#5a6c5a;margin-top:4px;\">📧 \${nmEsc(data.email || 'N/A')}</div>
                        \${data.phone_number ? `<div style=\"font-size:13px;color:#5a6c5a;margin-top:2px;\">📞 \${nmEsc(data.phone_number)}</div>` : ''}
                        <div style=\"margin-top:8px;\">
                            <span style=\"background:\${data.participation_status === 'confirmed' ? '#e8f5e9' : '#fff3e0'};
                                color:\${data.participation_status === 'confirmed' ? '#2e7d32' : '#e65100'};
                                padding:3px 10px;border-radius:20px;font-size:11px;font-weight:bold;\">
                                \${data.participation_status === 'confirmed' ? '✅ Confirmé' : '⏳ ' + nmEsc(data.participation_status)}
                            </span>
                        </div>
                    </div>

                    <div style=\"background:white;border-radius:12px;padding:16px;margin-bottom:16px;border:1px solid #e8e0d4;\">
                        <div style=\"font-size:11px;text-transform:uppercase;letter-spacing:1px;color:#8b9a8b;margin-bottom:8px;\">🎯 Événement</div>
                        <div style=\"font-size:16px;font-weight:bold;color:#285921;\">\${nmEsc(data.event_title || 'N/A')}</div>
                        <div style=\"font-size:13px;color:#5a6c5a;margin-top:6px;\">📅 \${eventDate}</div>
                        \${data.location ? `<div style=\"font-size:13px;color:#5a6c5a;margin-top:2px;\">📍 \${nmEsc(data.location)}</div>` : ''}
                        <div style=\"margin-top:10px;\">
                            <div style=\"display:flex;justify-content:space-between;font-size:12px;color:#5a6c5a;margin-bottom:4px;\">
                                <span>👥 \${data.current_participants} / \${data.max_participants} participants</span>
                                <span>\${ratio}%</span>
                            </div>
                            <div style=\"background:#e8e0d4;border-radius:4px;height:6px;overflow:hidden;\">
                                <div style=\"background:linear-gradient(90deg,#7ec8a3,#285921);height:100%;width:\${ratio}%;border-radius:4px;\"></div>
                            </div>
                        </div>
                    </div>

                    <div style=\"background:white;border-radius:12px;padding:16px;margin-bottom:20px;border:1px solid #e8e0d4;\">
                        <div style=\"font-size:11px;text-transform:uppercase;letter-spacing:1px;color:#8b9a8b;margin-bottom:8px;\">🕐 Inscription</div>
                        <div style=\"font-size:14px;color:#5a6c5a;\">\${partDate}</div>
                    </div>

                    <div style=\"display:flex;gap:10px;justify-content:center;\">
                        <button onclick=\"nmSendEmail(\${data.participation_id || id}, this)\"
                            style=\"background:#285921;color:white;border:none;border-radius:20px;padding:10px 24px;font-size:13px;font-weight:bold;cursor:pointer;\">
                            📧 Envoyer confirmation
                        </button>
                        <button type=\"button\" data-bs-dismiss=\"modal\"
                            style=\"background:#e0e0e0;color:#333;border:none;border-radius:20px;padding:10px 24px;font-size:13px;font-weight:bold;cursor:pointer;\">
                            Fermer
                        </button>
                    </div>
                </div>`;
            })
            .catch(err => {
                document.getElementById('nm-detailBody').innerHTML =
                    `<div style=\"text-align:center;padding:40px;color:#f44336;\">❌ Impossible de charger le détail.<br><small>\${nmEsc(err.message)}</small></div>`;
            });

        nmLoad(true);
    });

    window.nmSendEmail = function(notifId, btn) {
        btn.disabled = true;
        btn.textContent = '⏳ Envoi...';
        fetch(`/psycho/notifications/\${notifId}/send-email`, {method:'POST'})
            .then(r => r.json())
            .then(data => {
                btn.textContent = data.success ? '✅ Email envoyé !' : '❌ Erreur';
                if (data.success) btn.style.background = '#4CAF50';
                btn.disabled = false;
            }).catch(() => { btn.textContent = '❌ Erreur'; btn.disabled = false; });
    };

    function nmEsc(str) {
        return String(str ?? '').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;');
    }

    document.getElementById('notificationsModal')?.addEventListener('show.bs.modal', () => nmLoad(true));
    document.getElementById('notificationsModal')?.addEventListener('hidden.bs.modal', () => {
        fetch('{{ path('psycho_notifications_mark_all') }}', {method:'POST'}).then(() => {
            nmLastUnread = 0;
            nmUpdateBadge(0);
        });
    });

    nmLoad(true);
    setInterval(() => nmLoad(false), 15000);

    // Load favorites from localStorage
    const savedLikes = localStorage.getItem('likedEvents');
    if (savedLikes) {
        likedEventIds = new Set(JSON.parse(savedLikes));
        likedEventIds.forEach(id => {
            const btn = document.getElementById(`favoriteBtn-\${id}`);
            if (btn) btn.innerHTML = '💛';
        });
    }

    function toggleFavorite(eventId) {
        if (likedEventIds.has(eventId)) {
            likedEventIds.delete(eventId);
            document.getElementById(`favoriteBtn-\${eventId}`).innerHTML = '🤍';
        } else {
            likedEventIds.add(eventId);
            document.getElementById(`favoriteBtn-\${eventId}`).innerHTML = '💛';
        }
        localStorage.setItem('likedEvents', JSON.stringify([...likedEventIds]));
    }

    async function processParticipation(eventId, btnElement) {
        btnElement.disabled = true;
        btnElement.innerHTML = '⏳ Traitement...';
        
        try {
            const response = await fetch(`/psycho/evente/\${eventId}/participate`, {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ eventId: eventId })
            });
            const data = await response.json();
            
            if (data.success) {
                btnElement.innerHTML = '✅ Inscrit !';
                btnElement.classList.add('btn-participate-registered');
                showNotification('Inscription réussie !', 'success');
                setTimeout(() => location.reload(), 1500);
            } else {
                btnElement.innerHTML = '🎯 S\\'inscrire';
                btnElement.disabled = false;
                showNotification(data.message || 'Erreur', 'error');
            }
        } catch (error) {
            btnElement.innerHTML = '🎯 S\\'inscrire';
            btnElement.disabled = false;
            showNotification('Erreur réseau', 'error');
        }
    }

    let pendingDeleteId = null;

    function deleteEvent(eventId) {
        pendingDeleteId = eventId;
        new bootstrap.Modal(document.getElementById('deleteConfirmModal')).show();
    }

    document.getElementById('confirmDeleteBtn')?.addEventListener('click', async () => {
        if (!pendingDeleteId) return;
        const btn = document.getElementById('confirmDeleteBtn');
        btn.disabled = true;
        btn.textContent = 'Suppression...';

        try {
            const response = await fetch(`/psycho/evente/api/events/\${pendingDeleteId}`, {
                method: 'DELETE',
                headers: { 'X-Requested-With': 'XMLHttpRequest' }
            });
            const data = await response.json();
            if (data.success) {
                bootstrap.Modal.getInstance(document.getElementById('deleteConfirmModal')).hide();
                showNotification('Événement supprimé', 'success');
                setTimeout(() => location.reload(), 800);
            } else {
                showNotification('Erreur lors de la suppression', 'error');
            }
        } catch (error) {
            showNotification('Erreur réseau', 'error');
        } finally {
            btn.disabled = false;
            btn.textContent = 'Supprimer';
            pendingDeleteId = null;
        }
    });

    async function openEditModal(eventId) {
        try {
            const evRes = await fetch(`/psycho/evente/api/events/\${eventId}`);
            const event = await evRes.json();
            const planRes = await fetch(`/psycho/evente/api/planifications/by-event/\${eventId}`);
            const plans = await planRes.json();
            const plan = plans.length ? plans[0] : null;

            document.getElementById('ef-id').value = event.id;
            document.getElementById('ef-planId').value = plan ? (plan.id_planification ?? '') : '';
            document.getElementById('ef-title').value = event.title || '';
            document.getElementById('ef-location').value = event.location || '';
            document.getElementById('ef-date').value = event.event_date ? event.event_date.substring(0,10) : '';
            document.getElementById('ef-maxPart').value = event.max_participants || '';
            document.getElementById('ef-link').value = event.link || '';
            document.getElementById('ef-planDesc').value = plan ? plan.description : '';
            document.getElementById('ef-planDuree').value = plan ? plan.duree : '';

            new bootstrap.Modal(document.getElementById('editEventModal')).show();
        } catch (error) {
            showNotification('Erreur de chargement', 'error');
        }
    }

    document.getElementById('ef-btnSave')?.addEventListener('click', async () => {
        const btn = document.getElementById('ef-btnSave');
        btn.disabled = true;
        btn.textContent = '⏳ Mise à jour...';

        const eventId = document.getElementById('ef-id').value;
        const planId = document.getElementById('ef-planId').value;
        const planDesc = document.getElementById('ef-planDesc').value.trim();
        const planDuree = document.getElementById('ef-planDuree').value.trim();

        try {
            const evRes = await fetch(`/psycho/evente/api/events/\${eventId}`, {
                method: 'PUT',
                headers: {'Content-Type':'application/json'},
                body: JSON.stringify({
                    title: document.getElementById('ef-title').value.trim(),
                    location: document.getElementById('ef-location').value.trim(),
                    event_date: document.getElementById('ef-date').value,
                    link: document.getElementById('ef-link').value.trim(),
                    max_participants: parseInt(document.getElementById('ef-maxPart').value)
                })
            });
            const evResult = await evRes.json();
            if (!evResult.success) { showNotification('Erreur lors de la mise à jour', 'error'); return; }

            if (!planDesc && !planDuree) {
                if (planId) await fetch(`/psycho/evente/api/planifications/\${planId}`, { method: 'DELETE' });
            } else if (planDesc && planDuree) {
                if (planId) {
                    await fetch(`/psycho/evente/api/planifications/\${planId}`, {
                        method: 'PUT', headers: {'Content-Type':'application/json'},
                        body: JSON.stringify({ description: planDesc, duree: planDuree })
                    });
                } else {
                    await fetch('/psycho/evente/api/planifications', {
                        method: 'POST', headers: {'Content-Type':'application/json'},
                        body: JSON.stringify({ idEvent: parseInt(eventId), description: planDesc, duree: planDuree })
                    });
                }
            }

            bootstrap.Modal.getInstance(document.getElementById('editEventModal')).hide();
            showNotification('Événement mis à jour !', 'success');
            setTimeout(() => location.reload(), 1000);

        } catch(e) {
            showNotification('Erreur réseau', 'error');
        } finally {
            btn.disabled = false;
            btn.textContent = '💾 Mettre à jour';
        }
    });

    async function openQrModal(eventId) {
        document.getElementById('qrLoading').style.display = 'block';
        document.getElementById('qrContent').style.display = 'none';
        document.getElementById('qrError').style.display = 'none';
        new bootstrap.Modal(document.getElementById('qrCodeModal')).show();

        try {
            const res = await fetch(`/psycho/evente/qrcode/\${eventId}`);
            const data = await res.json();
            if (data.error) throw new Error(data.error);

            document.getElementById('qrTitle').textContent = data.title;
            document.getElementById('qrLocation').textContent = '📍 ' + data.location;
            document.getElementById('qrMapsLink').href = data.mapsUrl;

            // Generate QR code client-side
            const container = document.getElementById('qrImage');
            container.innerHTML = '';
            new QRCode(container, {
                text:         data.mapsUrl,
                width:        200,
                height:       200,
                colorDark:    '#285921',
                colorLight:   '#ffffff',
                correctLevel: QRCode.CorrectLevel.H
            });

            document.getElementById('qrLoading').style.display = 'none';
            document.getElementById('qrContent').style.display = 'block';
        } catch (e) {
            document.getElementById('qrLoading').style.display = 'none';
            document.getElementById('qrError').style.display = 'block';
        }
    }

    function showNotification(message, type) {
        const toast = document.createElement('div');
        toast.textContent = message;
        toast.style.cssText = `position:fixed;bottom:20px;right:20px;background:\${type === 'success' ? '#4CAF50' : '#f44336'};color:white;padding:12px 24px;border-radius:25px;z-index:10000;`;
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }

    // Search functionality
    document.getElementById('searchInput')?.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();
        const cards = document.querySelectorAll('.event-card');
        cards.forEach(card => {
            const title = card.querySelector('.event-title')?.innerText.toLowerCase() || '';
            card.style.display = title.includes(searchTerm) ? '' : 'none';
        });
    });

    // Sort functionality
    const sortLabels = { title: '📚 Par Titre (A → Z)', date: '📅 Par Date (Récent)', activities: '🎯 Par Activités' };
    const sortBtn = document.getElementById('sortBtn');
    const sortMenu = document.getElementById('sortMenu');

    sortBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        sortMenu.style.display = sortMenu.style.display === 'block' ? 'none' : 'block';
    });

    document.addEventListener('click', () => { sortMenu.style.display = 'none'; });

    sortMenu.addEventListener('click', (e) => {
        const item = e.target.closest('.sort-item');
        if (!item) return;
        const sort = item.getAttribute('data-sort');
        const container = document.getElementById('eventsContainer');
        const cards = [...container.querySelectorAll('.event-card')];
        cards.sort((a, b) => {
            if (sort === 'title') return (a.dataset.title || '').localeCompare(b.dataset.title || '', 'fr');
            if (sort === 'date') return (b.dataset.date || '').localeCompare(a.dataset.date || '');
            if (sort === 'activities') return parseInt(b.dataset.activities || 0) - parseInt(a.dataset.activities || 0);
            return 0;
        });
        cards.forEach(card => container.appendChild(card));
        sortBtn.textContent = sortLabels[sort] + ' ▾';
        sortMenu.querySelectorAll('.sort-item').forEach(el => el.classList.toggle('active-sort', el.getAttribute('data-sort') === sort));
        sortMenu.style.display = 'none';
    });

    document.getElementById('favoritesBtn')?.addEventListener('click', () => {
        const cards = document.querySelectorAll('.event-card');
        let hasFavorites = false;
        cards.forEach(card => {
            const eventId = parseInt(card.getAttribute('data-event-id'));
            if (likedEventIds.has(eventId)) {
                card.style.display = '';
                hasFavorites = true;
            } else {
                card.style.display = 'none';
            }
        });
        if (!hasFavorites) {
            document.getElementById('eventsContainer').innerHTML = `<div class=\"empty-state\"><div style=\"font-size:72px;\">💛</div><h3>Aucun favori</h3></div>`;
        }
    });

    // ========== PAGINATION FUNCTIONS ==========
    function changePerPage(limit) {
        var url = new URL(window.location.href);
        url.searchParams.set('limit', limit);
        url.searchParams.set('page', 1);
        window.location.href = url.toString();
    }

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

    // ==================== CREATE MODAL LOGIC ====================
    const localCorrections = {
        'jalousi':'jalousie','egoisme':'égoïsme','narsicism':'narcissisme',
        'confience':'confiance','etre':'être','pres':'près','tres':'très',
        'deja':'déjà','voila':'voilà','evenement':'événement','atelie':'atelier'
    };
    let cfCorrCallback = null;

    function cfSetState(el, state) {
        el.classList.remove('cf-valid','cf-invalid','cf-warning');
        if (state) el.classList.add('cf-' + state);
    }
    function cfValidateTitle() {
        const v = document.getElementById('cf-title').value.trim();
        if (!v) { cfSetState(document.getElementById('cf-title'), 'invalid'); return false; }
        if (v.length < 3) { cfSetState(document.getElementById('cf-title'), 'warning'); return false; }
        cfSetState(document.getElementById('cf-title'), 'valid'); return true;
    }
    function cfValidateLocation() {
        const v = document.getElementById('cf-location').value.trim();
        if (!v || v.length < 3) { cfSetState(document.getElementById('cf-location'), v ? 'warning' : 'invalid'); return false; }
        cfSetState(document.getElementById('cf-location'), 'valid'); return true;
    }
    function cfValidateDate() {
        const v   = document.getElementById('cf-date').value;
        const el  = document.getElementById('cf-date');
        const msg = document.getElementById('cf-dateMsg');
        if (!v) {
            cfSetState(el, 'invalid');
            if (msg) { msg.textContent = 'La date est obligatoire.'; msg.style.display = 'block'; }
            return false;
        }
        const chosen = new Date(v);
        const today  = new Date(); today.setHours(0, 0, 0, 0);
        if (chosen < today) {
            cfSetState(el, 'invalid');
            if (msg) { msg.textContent = 'La date ne peut pas être dans le passé.'; msg.style.display = 'block'; }
            return false;
        }
        cfSetState(el, 'valid');
        if (msg) { msg.textContent = ''; msg.style.display = 'none'; }
        return true;
    }
    function cfValidateMax() {
        const v = parseInt(document.getElementById('cf-maxPart').value);
        const ok = !isNaN(v) && v > 0;
        cfSetState(document.getElementById('cf-maxPart'), ok ? 'valid' : 'invalid');
        return ok;
    }
    function cfValidatePlan() {
        const desc = document.getElementById('cf-planDesc').value.trim();
        const duree = document.getElementById('cf-planDuree').value.trim();
        if (!desc && !duree) return true;
        if (desc && !duree) { cfSetState(document.getElementById('cf-planDuree'), 'invalid'); return false; }
        if (!desc && duree) { cfSetState(document.getElementById('cf-planDesc'), 'invalid'); return false; }
        if (desc.length < 4) { cfSetState(document.getElementById('cf-planDesc'), 'warning'); return false; }
        return true;
    }
    function cfValidateAll() {
        let ok = true;
        if (!cfValidateTitle()) ok = false;
        if (!cfValidateLocation()) ok = false;
        if (!cfValidateDate()) ok = false;
        if (!cfValidateMax()) ok = false;
        if (!cfValidatePlan()) ok = false;
        return ok;
    }

    document.getElementById('cf-title')?.addEventListener('input', () => {
        cfValidateTitle();
        document.getElementById('cf-btnCorrectTitle').disabled = !document.getElementById('cf-title').value.trim();
    });
    document.getElementById('cf-location')?.addEventListener('input', cfValidateLocation);
    document.getElementById('cf-date')?.addEventListener('change', cfValidateDate);
    document.getElementById('cf-maxPart')?.addEventListener('input', cfValidateMax);
    document.getElementById('cf-planDesc')?.addEventListener('input', () => {
        cfValidatePlan();
        document.getElementById('cf-btnCorrectDesc').disabled = !document.getElementById('cf-planDesc').value.trim();
    });
    document.getElementById('cf-planDuree')?.addEventListener('input', cfValidatePlan);

    document.getElementById('cf-acceptCorr')?.addEventListener('click', () => {
        if (cfCorrCallback) cfCorrCallback(true);
        document.getElementById('cf-correctionDialog').style.display = 'none';
        cfCorrCallback = null;
    });
    document.getElementById('cf-rejectCorr')?.addEventListener('click', () => {
        if (cfCorrCallback) cfCorrCallback(false);
        document.getElementById('cf-correctionDialog').style.display = 'none';
        cfCorrCallback = null;
    });

    function cfShowCorrDialog(original, corrected, callback) {
        cfCorrCallback = callback;
        document.getElementById('cf-origText').textContent = original;
        document.getElementById('cf-corrText').textContent = corrected;
        document.getElementById('cf-correctionDialog').style.display = 'flex';
    }

    async function cfCorrect(fieldId, btnId) {
        const field = document.getElementById(fieldId);
        const btn = document.getElementById(btnId);
        const text = field.value.trim();
        if (!text) return;
        btn.disabled = true;
        document.getElementById('cf-loading').style.removeProperty('display');
        
        const lower = text.toLowerCase();
        if (localCorrections[lower]) {
            let c = localCorrections[lower];
            if (text[0] === text[0].toUpperCase()) c = c[0].toUpperCase() + c.slice(1);
            document.getElementById('cf-loading').style.display = 'none';
            cfShowCorrDialog(text, c, (accepted) => {
                if (accepted) { field.value = c; showNotification('Correction appliquée !', 'success'); }
                btn.disabled = false;
            });
            return;
        }
        
        try {
            const res = await fetch('/psycho/evente/api/correct-text', {
                method: 'POST', headers: {'Content-Type':'application/json'},
                body: JSON.stringify({ text, type: fieldId.includes('title') ? 'title' : 'description' })
            });
            const data = await res.json();
            if (data.success && data.corrected !== text) {
                cfShowCorrDialog(text, data.corrected, (accepted) => {
                    if (accepted) field.value = data.corrected;
                    btn.disabled = false;
                });
            } else {
                showNotification('Le texte semble déjà correct.', 'info');
                btn.disabled = false;
            }
        } catch(e) {
            showNotification('Erreur réseau', 'error');
            btn.disabled = false;
        } finally {
            document.getElementById('cf-loading').style.display = 'none';
        }
    }

    document.getElementById('cf-btnCorrectTitle')?.addEventListener('click', () => cfCorrect('cf-title', 'cf-btnCorrectTitle'));
    document.getElementById('cf-btnCorrectDesc')?.addEventListener('click', () => cfCorrect('cf-planDesc', 'cf-btnCorrectDesc'));

    document.getElementById('cf-btnGenerate')?.addEventListener('click', async () => {
        const title = document.getElementById('cf-title').value.trim();
        if (!title) { showNotification('Veuillez d\\'abord saisir un titre.', 'warning'); return; }
        const btn = document.getElementById('cf-btnGenerate');
        btn.disabled = true;
        document.getElementById('cf-loading').style.removeProperty('display');
        try {
            const res = await fetch('/psycho/evente/api/generate-planification', {
                method: 'POST', headers: {'Content-Type':'application/json'},
                body: JSON.stringify({ title })
            });
            const data = await res.json();
            if (data.success) {
                document.getElementById('cf-planDesc').value = data.description;
                document.getElementById('cf-planDuree').value = data.duree;
                document.getElementById('cf-planDesc').classList.add('cf-suggestion');
                document.getElementById('cf-planDuree').classList.add('cf-suggestion');
                document.getElementById('cf-suggestionLabel').style.display = 'inline';
                document.getElementById('cf-btnAccept').style.display = 'inline-block';
                document.getElementById('cf-btnReject').style.display = 'inline-block';
                showNotification('Planification générée !', 'success');
            }
        } catch(e) { showNotification('Erreur réseau', 'error'); }
        finally {
            btn.disabled = false;
            document.getElementById('cf-loading').style.display = 'none';
        }
    });

    document.getElementById('cf-btnAccept')?.addEventListener('click', () => {
        document.getElementById('cf-planDesc').classList.remove('cf-suggestion');
        document.getElementById('cf-planDuree').classList.remove('cf-suggestion');
        document.getElementById('cf-btnAccept').style.display = 'none';
        document.getElementById('cf-btnReject').style.display = 'none';
        document.getElementById('cf-suggestionLabel').style.display = 'none';
        showNotification('Planification acceptée !', 'success');
    });

    document.getElementById('cf-btnReject')?.addEventListener('click', () => {
        document.getElementById('cf-planDesc').value = '';
        document.getElementById('cf-planDuree').value = '';
        document.getElementById('cf-planDesc').classList.remove('cf-suggestion');
        document.getElementById('cf-planDuree').classList.remove('cf-suggestion');
        document.getElementById('cf-btnAccept').style.display = 'none';
        document.getElementById('cf-btnReject').style.display = 'none';
        document.getElementById('cf-suggestionLabel').style.display = 'none';
        showNotification('Suggestion rejetée.', 'info');
    });

    document.getElementById('cf-btnSave')?.addEventListener('click', async () => {
        document.getElementById('cf-errorBox').style.display = 'none';
        if (!cfValidateAll()) {
            document.getElementById('cf-errorBox').textContent = 'Veuillez corriger les champs en erreur.';
            document.getElementById('cf-errorBox').style.display = 'block';
            return;
        }
        const btn = document.getElementById('cf-btnSave');
        btn.disabled = true;
        btn.textContent = 'Sauvegarde...';
        try {
            const evRes = await fetch('/psycho/evente/api/events', {
                method: 'POST', headers: {'Content-Type':'application/json'},
                body: JSON.stringify({
                    title: document.getElementById('cf-title').value.trim(),
                    location: document.getElementById('cf-location').value.trim(),
                    eventDate: document.getElementById('cf-date').value,
                    link: document.getElementById('cf-link').value.trim(),
                    maxParticipants: parseInt(document.getElementById('cf-maxPart').value),
                    currentParticipants: 0
                })
            });
            const evResult = await evRes.json();
            if (!evResult.success) {
                const errMsg = evResult.error || 'Erreur lors de la création';
                if (errMsg.toLowerCase().includes('date')) {
                    const msg = document.getElementById('cf-dateMsg');
                    const el  = document.getElementById('cf-date');
                    if (msg) { msg.textContent = errMsg; msg.style.display = 'block'; }
                    if (el)  { el.classList.add('cf-invalid'); }
                }
                document.getElementById('cf-errorBox').textContent = errMsg;
                document.getElementById('cf-errorBox').style.display = 'block';
                return;
            }
            const desc = document.getElementById('cf-planDesc').value.trim();
            const duree = document.getElementById('cf-planDuree').value.trim();
            if (desc && duree) {
                await fetch('/psycho/evente/api/planifications', {
                    method: 'POST', headers: {'Content-Type':'application/json'},
                    body: JSON.stringify({ idEvent: evResult.id, description: desc, duree })
                });
            }
            bootstrap.Modal.getInstance(document.getElementById('createEventModal')).hide();
            showNotification('Événement créé avec succès !', 'success');
            setTimeout(() => location.reload(), 1200);
        } catch(e) {
            showNotification('Erreur réseau', 'error');
        } finally {
            btn.disabled = false;
            btn.textContent = 'Sauvegarder';
        }
    });

    document.getElementById('createEventModal')?.addEventListener('hidden.bs.modal', () => {
        ['cf-title','cf-location','cf-date','cf-maxPart','cf-link','cf-planDesc','cf-planDuree'].forEach(id => {
            const el = document.getElementById(id);
            if (el) {
                el.value = id === 'cf-maxPart' ? '30' : '';
                el.classList.remove('cf-valid','cf-invalid','cf-warning','cf-suggestion');
            }
        });
        document.getElementById('cf-btnAccept').style.display = 'none';
        document.getElementById('cf-btnReject').style.display = 'none';
        document.getElementById('cf-suggestionLabel').style.display = 'none';
        document.getElementById('cf-errorBox').style.display = 'none';
        document.getElementById('cf-btnCorrectTitle').disabled = true;
        document.getElementById('cf-btnCorrectDesc').disabled = true;
    });

    // ── AI Drawer Functions ──
    const AI_GENERATE_URL = \"{{ path('psycho_ai_assistant_generate') }}\";
    const AI_HISTORY_URL = \"{{ path('psycho_ai_assistant_history') }}\";
    const AI_SAVE_FAV_URL = \"{{ path('psycho_ai_assistant_save_favorite') }}\";
    const AI_EXPORT_URL = \"{{ path('psycho_ai_assistant_export') }}\";

    function openAIPanel() {
        document.getElementById('aiDrawerOverlay').style.display = 'block';
        const drawer = document.getElementById('aiDrawer');
        drawer.style.display = 'flex';
        drawer.classList.remove('ai-slide-out');
        drawer.classList.add('ai-slide-in');
    }

    function closeAIPanel() {
        const drawer = document.getElementById('aiDrawer');
        drawer.classList.remove('ai-slide-in');
        drawer.classList.add('ai-slide-out');
        setTimeout(() => {
            drawer.style.display = 'none';
            document.getElementById('aiDrawerOverlay').style.display = 'none';
        }, 280);
    }

    function aiUpdateWordCount() {
        const text = document.getElementById('ai-result').value;
        const words = text.trim().split(/\\s+/).filter(w => w.length > 0);
        document.getElementById('ai-wordCount').textContent = words.length + ' mots';
    }

    async function aiGenerate() {
        const desc = document.getElementById('ai-description').value.trim();
        if (!desc) { showNotification('🌿 Veuillez décrire votre événement.', 'error'); document.getElementById('ai-description').focus(); return; }
        document.getElementById('ai-loadingBar').style.display = 'block';
        document.getElementById('ai-result').value = 'Génération en cours...';
        try {
            const res = await fetch(AI_GENERATE_URL, {
                method: 'POST', headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    description: desc,
                    event_type: document.getElementById('ai-eventType').value,
                    budget: document.getElementById('ai-budget').value,
                    audience_size: document.getElementById('ai-audience').value,
                    help_type: document.getElementById('ai-helpType').value
                })
            });
            const data = await res.json();
            document.getElementById('ai-result').value = data.success ? data.result : ('Erreur: ' + (data.error || 'Inconnue'));
        } catch(e) {
            document.getElementById('ai-result').value = 'Erreur réseau: ' + e.message;
        } finally {
            document.getElementById('ai-loadingBar').style.display = 'none';
            aiUpdateWordCount();
        }
    }

    function aiClear() {
        document.getElementById('ai-description').value = '';
        document.getElementById('ai-eventType').value = '';
        document.getElementById('ai-budget').value = '';
        document.getElementById('ai-audience').value = '';
        document.getElementById('ai-helpType').value = 'Idées de thèmes';
        document.getElementById('ai-result').value = '';
        aiUpdateWordCount();
    }

    async function aiCopy() {
        const text = document.getElementById('ai-result').value;
        if (!text) { showNotification('🌿 Rien à copier pour le moment.', 'error'); return; }
        await navigator.clipboard.writeText(text);
        showNotification('Copié !', 'success');
    }

    async function aiSaveFav() {
        const content = document.getElementById('ai-result').value;
        if (!content) { showNotification('🌿 Rien à sauvegarder pour le moment.', 'error'); return; }
        const res = await fetch(AI_SAVE_FAV_URL, { method:'POST', headers:{'Content-Type':'application/json'}, body: JSON.stringify({ content, description: document.getElementById('ai-description').value.substring(0,100) }) });
        const data = await res.json();
        showNotification(data.success ? '⭐ Ajouté aux favoris!' : data.error, data.success ? 'success' : 'error');
    }

    document.getElementById('ai-result')?.addEventListener('input', aiUpdateWordCount);

    // ========== STAR RATING CLICK HANDLER ==========
    document.querySelectorAll('.stars').forEach(function(starsContainer) {
        const eventId = starsContainer.getAttribute('data-event-id');
        const starEls = starsContainer.querySelectorAll('.star');

        starEls.forEach(function(star, index) {
            // Hover effect
            star.addEventListener('mouseenter', function() {
                starEls.forEach(function(s, i) {
                    s.style.color = i <= index ? '#ffc107' : '#ddd';
                });
            });
            star.addEventListener('mouseleave', function() {
                starEls.forEach(function(s) {
                    s.style.color = s.classList.contains('active') ? '#ffc107' : '#ddd';
                });
            });

            // Click to rate
            star.addEventListener('click', async function() {
                const rating = index + 1;

                // Optimistic UI update
                starEls.forEach(function(s, i) {
                    s.classList.toggle('active', i < rating);
                    s.style.color = i < rating ? '#ffc107' : '#ddd';
                });

                try {
                    const res = await fetch(`/psycho/evente/\${eventId}/rate`, {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ rating: rating })
                    });
                    const data = await res.json();
                    if (data.success) {
                        if (data.avgRating !== undefined) {
                            const avgEl = document.getElementById(`rating-avg-\${eventId}`);
                            const cntEl = document.getElementById(`rating-count-\${eventId}`);
                            if (avgEl) avgEl.textContent = '(' + parseFloat(data.avgRating).toFixed(1) + ')';
                            if (cntEl) cntEl.textContent = '(' + data.ratingCount + ' avis)';
                        }
                        showNotification('⭐ Note enregistrée !', 'success');
                    } else {
                        showNotification(data.message || 'Erreur', 'error');
                    }
                } catch(e) {
                    showNotification('Erreur réseau', 'error');
                }
            });
        });
    });
</script>
{% endblock %}", "Psychologue/evente/index.html.twig", "C:\\Users\\DELL\\Downloads\\psy\\templates\\Psychologue\\evente\\index.html.twig");
    }
}
