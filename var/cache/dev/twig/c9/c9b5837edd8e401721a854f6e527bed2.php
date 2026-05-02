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

/* home/events/calendar.html.twig */
class __TwigTemplate_0d1fd6b726a044388c90dc06bf90f9f5 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/events/calendar.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/events/calendar.html.twig"));

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

        yield "Calendrier des Événements - NAFSEYTI";
        
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
        --green-main: #285921;
        --green-dark: #2e6a28;
        --green-light: #7ec8a3;
        --beige: #c9b99b;
        --page-bg: linear-gradient(to bottom right, #f5f1ed 0%, #e8efe8 50%, #f0ede5 100%);
    }

    * { box-sizing: border-box; }
    body { background: #f5f1ed; font-family: 'DM Sans', sans-serif; }

    .cal-layout { min-height: 100vh; padding: 30px; background: var(--page-bg); }

    /* Header */
    .cal-header {
        display: flex; align-items: center; justify-content: space-between;
        flex-wrap: wrap; gap: 15px; margin-bottom: 25px;
    }
    .cal-header-left { display: flex; align-items: center; gap: 15px; }
    .cal-icon {
        width: 44px; height: 44px; border-radius: 50%;
        background: var(--green-main); display: flex; align-items: center;
        justify-content: center; font-size: 22px; color: white;
        box-shadow: 0 4px 12px rgba(40,89,33,.3);
    }
    .cal-title { font-size: 28px; font-weight: bold; color: var(--green-main); margin: 0; }
    .cal-sub   { font-size: 13px; color: #5a6c5a; font-style: italic; margin: 4px 0 0; }

    .btn-back {
        display: inline-flex; align-items: center; gap: 8px;
        padding: 11px 22px; border-radius: 40px; border: none;
        background: var(--green-main); color: white;
        font-size: 14px; font-weight: 600; cursor: pointer;
        text-decoration: none; transition: all .2s;
        box-shadow: 0 4px 12px rgba(40,89,33,.25);
    }
    .btn-back:hover { background: var(--green-dark); transform: translateY(-2px); color: white; }

    /* Legend */
    .cal-legend {
        display: flex; flex-wrap: wrap; gap: 12px;
        background: rgba(255,255,255,.9); border-radius: 20px;
        padding: 12px 20px; margin-bottom: 20px;
        border: 1px solid rgba(40,89,33,.15);
        box-shadow: 0 2px 8px rgba(40,89,33,.08);
    }
    .legend-item { display: flex; align-items: center; gap: 7px; font-size: 13px; color: #5a6c5a; }
    .legend-dot  { width: 12px; height: 12px; border-radius: 50%; flex-shrink: 0; }

    /* Calendar wrapper */
    .cal-wrap {
        background: white; border-radius: 24px;
        padding: 24px; box-shadow: 0 8px 24px rgba(40,89,33,.12);
        border: 1px solid rgba(40,89,33,.15);
    }

    /* FullCalendar overrides */
    .fc .fc-toolbar-title { font-size: 1.3rem; font-weight: 700; color: var(--green-main); }
    .fc .fc-button-primary {
        background: var(--green-main) !important; border-color: var(--green-main) !important;
        border-radius: 20px !important; font-weight: 600 !important;
        padding: 6px 16px !important;
    }
    .fc .fc-button-primary:hover  { background: var(--green-dark) !important; border-color: var(--green-dark) !important; }
    .fc .fc-button-primary:disabled { opacity: .5 !important; }
    .fc .fc-daygrid-day-number { color: var(--green-main); font-weight: 600; }
    .fc .fc-col-header-cell-cushion { color: var(--green-main); font-weight: 700; font-size: 13px; }
    .fc .fc-day-today { background: rgba(40,89,33,.06) !important; }
    .fc-event { border-radius: 8px !important; font-size: 12px !important; font-weight: 600 !important; cursor: pointer !important; }
    .fc-event:hover { opacity: .88; transform: scale(1.02); transition: all .15s; }
    .fc .fc-daygrid-event { padding: 3px 6px !important; }

    /* Tooltip / popup */
    .cal-popup {
        display: none; position: fixed; z-index: 9999;
        background: white; border-radius: 18px;
        box-shadow: 0 12px 32px rgba(0,0,0,.18);
        border: 1px solid rgba(40,89,33,.2);
        padding: 0; min-width: 280px; max-width: 340px;
        overflow: hidden;
    }
    .cal-popup.show { display: block; animation: popIn .2s ease-out; }
    @keyframes popIn {
        from { opacity: 0; transform: scale(.92) translateY(8px); }
        to   { opacity: 1; transform: scale(1)   translateY(0); }
    }
    .popup-header {
        padding: 14px 18px; color: white; font-weight: 700; font-size: 15px;
        display: flex; justify-content: space-between; align-items: flex-start; gap: 10px;
    }
    .popup-close {
        background: rgba(255,255,255,.25); border: none; color: white;
        width: 26px; height: 26px; border-radius: 50%; cursor: pointer;
        font-size: 16px; display: flex; align-items: center; justify-content: center;
        flex-shrink: 0; transition: background .15s;
    }
    .popup-close:hover { background: rgba(255,255,255,.4); }
    .popup-body { padding: 14px 18px; display: flex; flex-direction: column; gap: 8px; }
    .popup-row  { display: flex; align-items: center; gap: 8px; font-size: 13px; color: #4a5b4a; }
    .popup-row .pi { font-size: 15px; width: 20px; }
    .popup-actions { padding: 0 18px 16px; display: flex; gap: 10px; }
    .popup-btn {
        flex: 1; padding: 9px; border-radius: 30px; border: none;
        font-size: 13px; font-weight: 600; cursor: pointer; transition: all .2s;
        text-align: center; text-decoration: none; display: inline-block;
    }
    .popup-btn-primary { background: var(--green-main); color: white; }
    .popup-btn-primary:hover { background: var(--green-dark); color: white; }
    .popup-btn-secondary { background: #f0f5f0; color: var(--green-main); }
    .popup-btn-secondary:hover { background: #e0ede0; }

    @media (max-width: 640px) {
        .cal-layout { padding: 15px; }
        .cal-title { font-size: 20px; }
        .fc .fc-toolbar { flex-direction: column; gap: 10px; }
    }
</style>

<div class=\"cal-layout\">

    <!-- Header -->
    <div class=\"cal-header\">
        <div class=\"cal-header-left\">
            <div class=\"cal-icon\">📅</div>
            <div>
                <h1 class=\"cal-title\">Calendrier des Événements</h1>
                <p class=\"cal-sub\">🌱 Vue mensuelle de tous vos ateliers bien-être</p>
            </div>
        </div>
        <a href=\"";
        // line 136
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("client_events_index");
        yield "\" class=\"btn-back\">← Retour aux événements</a>
    </div>

    <!-- Legend -->
    <div class=\"cal-legend\">
        <div class=\"legend-item\"><div class=\"legend-dot\" style=\"background:#285921;\"></div> À venir</div>
        <div class=\"legend-item\"><div class=\"legend-dot\" style=\"background:#4CAF50;\"></div> En cours</div>
        <div class=\"legend-item\"><div class=\"legend-dot\" style=\"background:#e67e22;\"></div> Complet</div>
        <div class=\"legend-item\"><div class=\"legend-dot\" style=\"background:#9E9E9E;\"></div> Terminé</div>
        <div class=\"legend-item\"><div class=\"legend-dot\" style=\"background:#f44336;\"></div> Annulé</div>
    </div>

    <!-- Calendar -->
    <div class=\"cal-wrap\">
        <div id=\"calendar\"></div>
    </div>

</div>

<!-- Event popup -->
<div class=\"cal-popup\" id=\"calPopup\">
    <div class=\"popup-header\" id=\"popupHeader\">
        <span id=\"popupTitle\">Titre</span>
        <button class=\"popup-close\" onclick=\"closePopup()\">×</button>
    </div>
    <div class=\"popup-body\" id=\"popupBody\"></div>
    <div class=\"popup-actions\">
        <a href=\"#\" class=\"popup-btn popup-btn-primary\" id=\"popupLink\">Voir l'événement</a>
        <button class=\"popup-btn popup-btn-secondary\" onclick=\"closePopup()\">Fermer</button>
    </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 169
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

        // line 170
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
<!-- FullCalendar v6 (CDN — no npm needed) -->
<link  href=\"https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css\" rel=\"stylesheet\">
<script src=\"https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js\"></script>
<script src=\"https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.11/locales/fr.global.min.js\"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {

    const calEl   = document.getElementById('calendar');
    const popup   = document.getElementById('calPopup');
    const FEED    = '";
        // line 180
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("client_events_calendar_feed");
        yield "';

    const calendar = new FullCalendar.Calendar(calEl, {
        locale:          'fr',
        initialView:     'dayGridMonth',
        headerToolbar: {
            left:   'prev,next today',
            center: 'title',
            right:  'dayGridMonth,timeGridWeek,listMonth'
        },
        buttonText: {
            today:     \"Aujourd'hui\",
            month:     'Mois',
            week:      'Semaine',
            list:      'Liste',
        },
        height:          'auto',
        eventSources: [{
            url:    FEED,
            method: 'GET',
            failure: function () {
                showToast('Impossible de charger les événements.', 'error');
            }
        }],
        eventClick: function (info) {
            info.jsEvent.preventDefault();
            showPopup(info.event, info.jsEvent);
        },
        eventMouseEnter: function (info) {
            info.el.style.cursor = 'pointer';
        },
        loading: function (isLoading) {
            calEl.style.opacity = isLoading ? '.6' : '1';
        }
    });

    calendar.render();

    /* ── Popup ── */
    function showPopup(event, jsEvent) {
        const p    = event.extendedProps;
        const date = event.start
            ? event.start.toLocaleDateString('fr-FR', {weekday:'long', day:'2-digit', month:'long', year:'numeric'})
            : 'Date inconnue';

        const statusLabel = {
            upcoming:  '📅 À venir',
            ongoing:   '🟢 En cours',
            completed: '✅ Terminé',
            cancelled: '❌ Annulé',
        }[p.status] || '📅 À venir';

        const spotsText = p.isFull
            ? '<span style=\"color:#e67e22;font-weight:700;\">Complet</span>'
            : `<span style=\"color:#285921;font-weight:600;\">\${p.spots} place\${p.spots > 1 ? 's' : ''} disponible\${p.spots > 1 ? 's' : ''}</span>`;

        document.getElementById('popupHeader').style.background = event.backgroundColor || '#285921';
        document.getElementById('popupTitle').textContent = event.title;
        document.getElementById('popupBody').innerHTML = `
            <div class=\"popup-row\"><span class=\"pi\">📅</span><span>\${date}</span></div>
            \${p.location ? `<div class=\"popup-row\"><span class=\"pi\">📍</span><span>\${escHtml(p.location)}</span></div>` : ''}
            <div class=\"popup-row\"><span class=\"pi\">🏷️</span><span>\${statusLabel}</span></div>
            <div class=\"popup-row\"><span class=\"pi\">👥</span>\${spotsText}</div>
        `;
        document.getElementById('popupLink').href = '/events#event-' + event.id;

        // Position popup near click
        const vw = window.innerWidth, vh = window.innerHeight;
        popup.style.display = 'block';
        const pw = popup.offsetWidth, ph = popup.offsetHeight;
        let x = jsEvent.clientX + 12, y = jsEvent.clientY + 12;
        if (x + pw > vw - 10) x = jsEvent.clientX - pw - 12;
        if (y + ph > vh - 10) y = jsEvent.clientY - ph - 12;
        popup.style.left = Math.max(8, x) + 'px';
        popup.style.top  = Math.max(8, y) + 'px';
        popup.classList.add('show');
    }

    window.closePopup = function () {
        popup.classList.remove('show');
        popup.style.display = 'none';
    };

    document.addEventListener('click', function (e) {
        if (!popup.contains(e.target) && !e.target.closest('.fc-event')) {
            closePopup();
        }
    });

    function escHtml(str) {
        return String(str ?? '').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;');
    }

    function showToast(msg, type) {
        const t = document.createElement('div');
        t.textContent = msg;
        t.style.cssText = `position:fixed;bottom:25px;right:25px;padding:12px 24px;border-radius:40px;
            font-size:13px;font-weight:600;color:white;z-index:9999;
            background:\${type === 'error' ? '#f44336' : '#285921'};
            box-shadow:0 4px 15px rgba(0,0,0,.2);`;
        document.body.appendChild(t);
        setTimeout(() => t.remove(), 3000);
    }
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
        return "home/events/calendar.html.twig";
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
        return array (  302 => 180,  289 => 170,  276 => 169,  233 => 136,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Calendrier des Événements - NAFSEYTI{% endblock %}

{% block body %}
<style>
    :root {
        --green-main: #285921;
        --green-dark: #2e6a28;
        --green-light: #7ec8a3;
        --beige: #c9b99b;
        --page-bg: linear-gradient(to bottom right, #f5f1ed 0%, #e8efe8 50%, #f0ede5 100%);
    }

    * { box-sizing: border-box; }
    body { background: #f5f1ed; font-family: 'DM Sans', sans-serif; }

    .cal-layout { min-height: 100vh; padding: 30px; background: var(--page-bg); }

    /* Header */
    .cal-header {
        display: flex; align-items: center; justify-content: space-between;
        flex-wrap: wrap; gap: 15px; margin-bottom: 25px;
    }
    .cal-header-left { display: flex; align-items: center; gap: 15px; }
    .cal-icon {
        width: 44px; height: 44px; border-radius: 50%;
        background: var(--green-main); display: flex; align-items: center;
        justify-content: center; font-size: 22px; color: white;
        box-shadow: 0 4px 12px rgba(40,89,33,.3);
    }
    .cal-title { font-size: 28px; font-weight: bold; color: var(--green-main); margin: 0; }
    .cal-sub   { font-size: 13px; color: #5a6c5a; font-style: italic; margin: 4px 0 0; }

    .btn-back {
        display: inline-flex; align-items: center; gap: 8px;
        padding: 11px 22px; border-radius: 40px; border: none;
        background: var(--green-main); color: white;
        font-size: 14px; font-weight: 600; cursor: pointer;
        text-decoration: none; transition: all .2s;
        box-shadow: 0 4px 12px rgba(40,89,33,.25);
    }
    .btn-back:hover { background: var(--green-dark); transform: translateY(-2px); color: white; }

    /* Legend */
    .cal-legend {
        display: flex; flex-wrap: wrap; gap: 12px;
        background: rgba(255,255,255,.9); border-radius: 20px;
        padding: 12px 20px; margin-bottom: 20px;
        border: 1px solid rgba(40,89,33,.15);
        box-shadow: 0 2px 8px rgba(40,89,33,.08);
    }
    .legend-item { display: flex; align-items: center; gap: 7px; font-size: 13px; color: #5a6c5a; }
    .legend-dot  { width: 12px; height: 12px; border-radius: 50%; flex-shrink: 0; }

    /* Calendar wrapper */
    .cal-wrap {
        background: white; border-radius: 24px;
        padding: 24px; box-shadow: 0 8px 24px rgba(40,89,33,.12);
        border: 1px solid rgba(40,89,33,.15);
    }

    /* FullCalendar overrides */
    .fc .fc-toolbar-title { font-size: 1.3rem; font-weight: 700; color: var(--green-main); }
    .fc .fc-button-primary {
        background: var(--green-main) !important; border-color: var(--green-main) !important;
        border-radius: 20px !important; font-weight: 600 !important;
        padding: 6px 16px !important;
    }
    .fc .fc-button-primary:hover  { background: var(--green-dark) !important; border-color: var(--green-dark) !important; }
    .fc .fc-button-primary:disabled { opacity: .5 !important; }
    .fc .fc-daygrid-day-number { color: var(--green-main); font-weight: 600; }
    .fc .fc-col-header-cell-cushion { color: var(--green-main); font-weight: 700; font-size: 13px; }
    .fc .fc-day-today { background: rgba(40,89,33,.06) !important; }
    .fc-event { border-radius: 8px !important; font-size: 12px !important; font-weight: 600 !important; cursor: pointer !important; }
    .fc-event:hover { opacity: .88; transform: scale(1.02); transition: all .15s; }
    .fc .fc-daygrid-event { padding: 3px 6px !important; }

    /* Tooltip / popup */
    .cal-popup {
        display: none; position: fixed; z-index: 9999;
        background: white; border-radius: 18px;
        box-shadow: 0 12px 32px rgba(0,0,0,.18);
        border: 1px solid rgba(40,89,33,.2);
        padding: 0; min-width: 280px; max-width: 340px;
        overflow: hidden;
    }
    .cal-popup.show { display: block; animation: popIn .2s ease-out; }
    @keyframes popIn {
        from { opacity: 0; transform: scale(.92) translateY(8px); }
        to   { opacity: 1; transform: scale(1)   translateY(0); }
    }
    .popup-header {
        padding: 14px 18px; color: white; font-weight: 700; font-size: 15px;
        display: flex; justify-content: space-between; align-items: flex-start; gap: 10px;
    }
    .popup-close {
        background: rgba(255,255,255,.25); border: none; color: white;
        width: 26px; height: 26px; border-radius: 50%; cursor: pointer;
        font-size: 16px; display: flex; align-items: center; justify-content: center;
        flex-shrink: 0; transition: background .15s;
    }
    .popup-close:hover { background: rgba(255,255,255,.4); }
    .popup-body { padding: 14px 18px; display: flex; flex-direction: column; gap: 8px; }
    .popup-row  { display: flex; align-items: center; gap: 8px; font-size: 13px; color: #4a5b4a; }
    .popup-row .pi { font-size: 15px; width: 20px; }
    .popup-actions { padding: 0 18px 16px; display: flex; gap: 10px; }
    .popup-btn {
        flex: 1; padding: 9px; border-radius: 30px; border: none;
        font-size: 13px; font-weight: 600; cursor: pointer; transition: all .2s;
        text-align: center; text-decoration: none; display: inline-block;
    }
    .popup-btn-primary { background: var(--green-main); color: white; }
    .popup-btn-primary:hover { background: var(--green-dark); color: white; }
    .popup-btn-secondary { background: #f0f5f0; color: var(--green-main); }
    .popup-btn-secondary:hover { background: #e0ede0; }

    @media (max-width: 640px) {
        .cal-layout { padding: 15px; }
        .cal-title { font-size: 20px; }
        .fc .fc-toolbar { flex-direction: column; gap: 10px; }
    }
</style>

<div class=\"cal-layout\">

    <!-- Header -->
    <div class=\"cal-header\">
        <div class=\"cal-header-left\">
            <div class=\"cal-icon\">📅</div>
            <div>
                <h1 class=\"cal-title\">Calendrier des Événements</h1>
                <p class=\"cal-sub\">🌱 Vue mensuelle de tous vos ateliers bien-être</p>
            </div>
        </div>
        <a href=\"{{ path('client_events_index') }}\" class=\"btn-back\">← Retour aux événements</a>
    </div>

    <!-- Legend -->
    <div class=\"cal-legend\">
        <div class=\"legend-item\"><div class=\"legend-dot\" style=\"background:#285921;\"></div> À venir</div>
        <div class=\"legend-item\"><div class=\"legend-dot\" style=\"background:#4CAF50;\"></div> En cours</div>
        <div class=\"legend-item\"><div class=\"legend-dot\" style=\"background:#e67e22;\"></div> Complet</div>
        <div class=\"legend-item\"><div class=\"legend-dot\" style=\"background:#9E9E9E;\"></div> Terminé</div>
        <div class=\"legend-item\"><div class=\"legend-dot\" style=\"background:#f44336;\"></div> Annulé</div>
    </div>

    <!-- Calendar -->
    <div class=\"cal-wrap\">
        <div id=\"calendar\"></div>
    </div>

</div>

<!-- Event popup -->
<div class=\"cal-popup\" id=\"calPopup\">
    <div class=\"popup-header\" id=\"popupHeader\">
        <span id=\"popupTitle\">Titre</span>
        <button class=\"popup-close\" onclick=\"closePopup()\">×</button>
    </div>
    <div class=\"popup-body\" id=\"popupBody\"></div>
    <div class=\"popup-actions\">
        <a href=\"#\" class=\"popup-btn popup-btn-primary\" id=\"popupLink\">Voir l'événement</a>
        <button class=\"popup-btn popup-btn-secondary\" onclick=\"closePopup()\">Fermer</button>
    </div>
</div>
{% endblock %}

{% block javascripts %}
{{ parent() }}
<!-- FullCalendar v6 (CDN — no npm needed) -->
<link  href=\"https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.css\" rel=\"stylesheet\">
<script src=\"https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js\"></script>
<script src=\"https://cdn.jsdelivr.net/npm/@fullcalendar/core@6.1.11/locales/fr.global.min.js\"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {

    const calEl   = document.getElementById('calendar');
    const popup   = document.getElementById('calPopup');
    const FEED    = '{{ path('client_events_calendar_feed') }}';

    const calendar = new FullCalendar.Calendar(calEl, {
        locale:          'fr',
        initialView:     'dayGridMonth',
        headerToolbar: {
            left:   'prev,next today',
            center: 'title',
            right:  'dayGridMonth,timeGridWeek,listMonth'
        },
        buttonText: {
            today:     \"Aujourd'hui\",
            month:     'Mois',
            week:      'Semaine',
            list:      'Liste',
        },
        height:          'auto',
        eventSources: [{
            url:    FEED,
            method: 'GET',
            failure: function () {
                showToast('Impossible de charger les événements.', 'error');
            }
        }],
        eventClick: function (info) {
            info.jsEvent.preventDefault();
            showPopup(info.event, info.jsEvent);
        },
        eventMouseEnter: function (info) {
            info.el.style.cursor = 'pointer';
        },
        loading: function (isLoading) {
            calEl.style.opacity = isLoading ? '.6' : '1';
        }
    });

    calendar.render();

    /* ── Popup ── */
    function showPopup(event, jsEvent) {
        const p    = event.extendedProps;
        const date = event.start
            ? event.start.toLocaleDateString('fr-FR', {weekday:'long', day:'2-digit', month:'long', year:'numeric'})
            : 'Date inconnue';

        const statusLabel = {
            upcoming:  '📅 À venir',
            ongoing:   '🟢 En cours',
            completed: '✅ Terminé',
            cancelled: '❌ Annulé',
        }[p.status] || '📅 À venir';

        const spotsText = p.isFull
            ? '<span style=\"color:#e67e22;font-weight:700;\">Complet</span>'
            : `<span style=\"color:#285921;font-weight:600;\">\${p.spots} place\${p.spots > 1 ? 's' : ''} disponible\${p.spots > 1 ? 's' : ''}</span>`;

        document.getElementById('popupHeader').style.background = event.backgroundColor || '#285921';
        document.getElementById('popupTitle').textContent = event.title;
        document.getElementById('popupBody').innerHTML = `
            <div class=\"popup-row\"><span class=\"pi\">📅</span><span>\${date}</span></div>
            \${p.location ? `<div class=\"popup-row\"><span class=\"pi\">📍</span><span>\${escHtml(p.location)}</span></div>` : ''}
            <div class=\"popup-row\"><span class=\"pi\">🏷️</span><span>\${statusLabel}</span></div>
            <div class=\"popup-row\"><span class=\"pi\">👥</span>\${spotsText}</div>
        `;
        document.getElementById('popupLink').href = '/events#event-' + event.id;

        // Position popup near click
        const vw = window.innerWidth, vh = window.innerHeight;
        popup.style.display = 'block';
        const pw = popup.offsetWidth, ph = popup.offsetHeight;
        let x = jsEvent.clientX + 12, y = jsEvent.clientY + 12;
        if (x + pw > vw - 10) x = jsEvent.clientX - pw - 12;
        if (y + ph > vh - 10) y = jsEvent.clientY - ph - 12;
        popup.style.left = Math.max(8, x) + 'px';
        popup.style.top  = Math.max(8, y) + 'px';
        popup.classList.add('show');
    }

    window.closePopup = function () {
        popup.classList.remove('show');
        popup.style.display = 'none';
    };

    document.addEventListener('click', function (e) {
        if (!popup.contains(e.target) && !e.target.closest('.fc-event')) {
            closePopup();
        }
    });

    function escHtml(str) {
        return String(str ?? '').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;');
    }

    function showToast(msg, type) {
        const t = document.createElement('div');
        t.textContent = msg;
        t.style.cssText = `position:fixed;bottom:25px;right:25px;padding:12px 24px;border-radius:40px;
            font-size:13px;font-weight:600;color:white;z-index:9999;
            background:\${type === 'error' ? '#f44336' : '#285921'};
            box-shadow:0 4px 15px rgba(0,0,0,.2);`;
        document.body.appendChild(t);
        setTimeout(() => t.remove(), 3000);
    }
});
</script>
{% endblock %}
", "home/events/calendar.html.twig", "C:\\Users\\DELL\\Downloads\\psy\\templates\\home\\events\\calendar.html.twig");
    }
}
