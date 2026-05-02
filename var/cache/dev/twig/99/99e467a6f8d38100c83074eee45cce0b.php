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

/* Psychologue/evente/Notification.html.twig */
class __TwigTemplate_d55cfa5817b4400aa5b2ea1dbd6f7ca8 extends Template
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
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Psychologue/evente/Notification.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Psychologue/evente/Notification.html.twig"));

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

        yield "Notifications de participations";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
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

        // line 6
        yield "<div class=\"navbar-wrap\">
    <div class=\"navbar-inner\">
        <ul class=\"nav-links\">
            <li><a href=\"";
        // line 9
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("psycho_dashboard");
        yield "\">Accueil</a></li>
            <li><a href=\"#\">Contenu Psychologique</a></li>
            <li><a href=\"#\">Tests</a></li>
            <li><a href=\"#\">Rendez-vous</a></li>
            <li><a href=\"";
        // line 13
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("psycho_events_index");
        yield "\">Evenements</a></li>
            <li><a href=\"";
        // line 14
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("psycho_notifications_page");
        yield "\" class=\"active\">Notifications</a></li>
        </ul>
        <a href=\"#!\" class=\"nav-cta nav-links a\">Se connecter</a>
    </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 21
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

        // line 22
        yield "<style>
    .notif-page { background: linear-gradient(to bottom right,#f8f5f2,#f0ede5); min-height:100vh; padding:30px; }
    .notif-top-border { height:5px; background:linear-gradient(to right,#285921,#4CAF50,#8BC34A); border-radius:5px; margin-bottom:20px; }
    .notif-bottom-border { height:3px; background:linear-gradient(to right,#8BC34A,#4CAF50,#285921); border-radius:5px; margin-top:15px; }
    .notif-header { display:flex; align-items:center; gap:15px; margin-bottom:20px; }
    .notif-bell-circle { width:50px; height:50px; border-radius:50%; background:linear-gradient(to bottom,#285921,#1e4a18); border:2px solid white; display:flex; align-items:center; justify-content:center; font-size:24px; box-shadow:0 0 10px #28592140; flex-shrink:0; }
    .notif-title { font-size:24px; font-weight:bold; color:#285921; margin:0; }
    .notif-subtitle { font-size:13px; color:#8b9a8b; font-style:italic; margin:0; }
    .notif-unread-badge { width:44px; height:44px; border-radius:50%; background:linear-gradient(to bottom,#4CAF50,#2E7D32); border:2px solid white; display:flex; align-items:center; justify-content:center; font-size:16px; font-weight:bold; color:white; box-shadow:0 0 8px #4CAF5060; margin-left:auto; }
    .notif-toolbar { display:flex; justify-content:space-between; align-items:center; margin-bottom:15px; flex-wrap:wrap; gap:10px; }
    .notif-search { display:flex; align-items:center; background:white; border-radius:25px; padding:6px 15px; box-shadow:0 1px 4px rgba(0,0,0,.1); min-width:260px; }
    .notif-search input { border:none; outline:none; font-size:13px; width:100%; background:transparent; }
    .btn-mark-read { background:linear-gradient(to bottom,#374535,#2a3328); border:none; color:white; font-weight:bold; border-radius:25px; padding:9px 20px; cursor:pointer; font-size:13px; }
    .btn-mark-read:hover { background:linear-gradient(to bottom,#4a5a45,#374535); }
    .btn-refresh-notif { background:linear-gradient(to bottom,#4CAF50,#45a049); border:none; color:white; font-weight:bold; border-radius:25px; padding:9px 20px; cursor:pointer; font-size:13px; }
    .btn-refresh-notif:hover { background:linear-gradient(to bottom,#45a049,#3d8b40); }
    .notif-table-wrap { border-radius:12px; overflow:hidden; box-shadow:0 2px 8px rgba(40,89,33,.15); border:1px solid rgba(40,89,33,.2); }
    .notif-table { width:100%; border-collapse:collapse; background:white; }
    .notif-table thead tr { background:#f0ede5; }
    .notif-table th { padding:12px 15px; text-align:left; font-size:13px; font-weight:bold; color:#285921; border-bottom:2px solid #e0d9cc; }
    .notif-table td { padding:12px 15px; border-bottom:1px solid #f5f0ea; font-size:13px; }
    .notif-table tr:last-child td { border-bottom:none; }
    .notif-table tr.unread { background:#f9fff9; }
    .notif-table tr:hover { background:#f5f5f5; }
    .btn-view-detail { background:#374535; border:none; color:white; font-size:12px; font-weight:bold; padding:7px 14px; border-radius:8px; cursor:pointer; }
    .btn-view-detail:hover { background:#4CAF50; }
    .notif-status-bar { display:flex; align-items:center; gap:8px; margin-top:15px; font-size:12px; color:#8b9a8b; }
    .status-dot { width:8px; height:8px; background:#4CAF50; border-radius:50%; display:inline-block; }
    .detail-section { background:white; border-radius:12px; padding:18px; margin-bottom:15px; box-shadow:0 2px 8px rgba(0,0,0,.06); }
    .detail-section-title { font-weight:bold; color:#285921; font-size:12px; text-transform:uppercase; letter-spacing:.5px; margin-bottom:12px; }
    .avatar-circle { width:60px; height:60px; border-radius:50%; background:#285921; border:2px solid #4CAF50; display:flex; align-items:center; justify-content:center; color:white; font-size:22px; font-weight:bold; flex-shrink:0; }
</style>

<div class=\"notif-page\">
    <div class=\"notif-top-border\"></div>

    <div class=\"notif-header\">
        <div class=\"notif-bell-circle\">🔔</div>
        <div>
            <p class=\"notif-title\">Notifications de participations</p>
            <p class=\"notif-subtitle\">Restez informé des nouvelles inscriptions à vos événements</p>
        </div>
        <div class=\"notif-unread-badge\" id=\"unreadBadge\">";
        // line 64
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["unread"]) || array_key_exists("unread", $context) ? $context["unread"] : (function () { throw new RuntimeError('Variable "unread" does not exist.', 64, $this->source); })()), "html", null, true);
        yield "</div>
    </div>

    <div class=\"notif-toolbar\">
        <div class=\"notif-search\">
            <span style=\"color:#8b9a8b;margin-right:8px;\">🔍</span>
            <input type=\"text\" id=\"notifSearch\" placeholder=\"Rechercher une notification...\">
        </div>
        <div style=\"display:flex;gap:10px;flex-wrap:wrap;\">
            <a href=\"";
        // line 73
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("psycho_events_index");
        yield "\" style=\"background:linear-gradient(to bottom,#374535,#2a3328);border:none;color:white;font-weight:bold;border-radius:25px;padding:9px 20px;font-size:13px;text-decoration:none;display:inline-flex;align-items:center;gap:6px;\">← Retour aux événements</a>
            <button class=\"btn-mark-read\" id=\"markAllReadBtn\">✅ Marquer tout comme lu</button>
            <button class=\"btn-refresh-notif\" id=\"refreshBtn\">🔄 Actualiser</button>
        </div>
    </div>

    <div class=\"notif-table-wrap\">
        <table class=\"notif-table\">
            <thead>
                <tr>
                    <th>Message</th>
                    <th style=\"width:160px;\">Date</th>
                    <th style=\"width:110px;\">Statut</th>
                    <th style=\"width:140px;\">Action</th>
                </tr>
            </thead>
            <tbody id=\"notifTableBody\">
                <tr><td colspan=\"4\" style=\"text-align:center;padding:30px;color:#8b9a8b;\">Chargement...</td></tr>
            </tbody>
        </table>
    </div>

    <div class=\"notif-status-bar\">
        <span class=\"status-dot\"></span>
        <span>Notifications en temps réel</span>
        <span style=\"margin-left:auto;font-size:11px;color:#b0b0b0;font-style:italic;\" id=\"lastUpdate\"></span>
    </div>

    <div class=\"notif-bottom-border\"></div>
</div>

<!-- Detail Modal -->
<div class=\"modal fade\" id=\"detailModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-dialog-centered\" style=\"max-width:520px;\">
        <div class=\"modal-content\" style=\"border-radius:15px;border:1px solid #d4c9b8;overflow:hidden;\">
            <div id=\"detailBody\" style=\"background:#f9f7f4;padding:0;\">
                <div style=\"text-align:center;padding:40px;color:#8b9a8b;\">Chargement...</div>
            </div>
        </div>
    </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 116
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

        // line 117
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
<script>
    const LIST_URL     = '";
        // line 119
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("psycho_notifications_list");
        yield "';
    const MARK_ALL_URL = '";
        // line 120
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("psycho_notifications_mark_all");
        yield "';

    let allNotifications = [];

    function loadNotifications() {
        document.getElementById('lastUpdate').textContent =
            'Mise à jour: ' + new Date().toLocaleTimeString('fr-FR', {hour:'2-digit', minute:'2-digit'});

        fetch(LIST_URL)
            .then(r => r.json())
            .then(data => {
                allNotifications = data.notifications || [];
                document.getElementById('unreadBadge').textContent = data.unread;
                renderTable(allNotifications);
            })
            .catch(() => showToast('Erreur lors du chargement', 'error'));
    }

    function renderTable(rows) {
        const search = document.getElementById('notifSearch').value.toLowerCase();
        const tbody  = document.getElementById('notifTableBody');
        const filtered = rows.filter(n => !search || n.message.toLowerCase().includes(search));

        if (!filtered.length) {
            tbody.innerHTML = '<tr><td colspan=\"4\" style=\"text-align:center;padding:30px;color:#8b9a8b;\">Aucune notification trouvée</td></tr>';
            return;
        }

        tbody.innerHTML = filtered.map(n => {
            const isUnread = !n.is_read;
            const d        = new Date(n.created_at);
            const dateStr  = d.toLocaleDateString('fr-FR', {day:'2-digit', month:'short', year:'numeric'});
            const timeStr  = d.toLocaleTimeString('fr-FR', {hour:'2-digit', minute:'2-digit'});
            const status   = isUnread
                ? '<span style=\"color:#285921;font-weight:bold;\">🆕 Non lu</span>'
                : '<span style=\"color:gray;\">✅ Lu</span>';
            const action   = isUnread
                ? `<button class=\"btn-view-detail\" data-id=\"\${n.id}\">👤 Voir détails</button>`
                : `<button class=\"btn-view-detail\" data-id=\"\${n.id}\" style=\"background:#7f9a7d;\">👁 Voir</button>`;

            return `<tr class=\"notif-row\${isUnread ? ' unread' : ''}\" data-id=\"\${n.id}\">
                <td style=\"font-weight:\${isUnread ? 'bold' : 'normal'};color:#2c3e50;\">\${escHtml(n.message)}</td>
                <td style=\"color:#8b9a8b;white-space:nowrap;\">\${dateStr}<br>\${timeStr}</td>
                <td>\${status}</td>
                <td>\${action}</td>
            </tr>`;
        }).join('');
    }

    // Live search
    document.getElementById('notifSearch').addEventListener('input', () => renderTable(allNotifications));

    // Refresh
    document.getElementById('refreshBtn').addEventListener('click', loadNotifications);

    // Mark all read
    document.getElementById('markAllReadBtn').addEventListener('click', () => {
        fetch(MARK_ALL_URL, {method:'POST'})
            .then(() => { showToast('Toutes les notifications marquées comme lues', 'success'); loadNotifications(); })
            .catch(() => showToast('Erreur', 'error'));
    });

    // View detail
    document.getElementById('notifTableBody').addEventListener('click', (e) => {
        const btn = e.target.closest('.btn-view-detail');
        if (!btn) return;
        const id = btn.dataset.id;

        document.getElementById('detailBody').innerHTML = '<div style=\"text-align:center;padding:40px;color:#8b9a8b;\">Chargement...</div>';
        new bootstrap.Modal(document.getElementById('detailModal')).show();

        fetch(`/psycho/notifications/\${id}/detail`)
            .then(r => r.json())
            .then(d => {
                if (d.error) { document.getElementById('detailBody').innerHTML = '<div style=\"padding:30px;text-align:center;color:red;\">Introuvable.</div>'; return; }

                // ── Orphaned notification (participation was deleted) ──────────
                if (d.participation_status === 'deleted' || d._warning) {
                    const initials = (d.firstname||'?').charAt(0).toUpperCase() + (d.lastname||'?').charAt(0).toUpperCase();
                    document.getElementById('detailBody').innerHTML = `
                    <div style=\"background:linear-gradient(to right,#285921,#3d7e33);padding:18px 22px;display:flex;align-items:center;justify-content:space-between;\">
                        <div style=\"display:flex;align-items:center;gap:12px;\">
                            <span style=\"font-size:26px;\">📌</span>
                            <div>
                                <div style=\"color:white;font-weight:bold;font-size:17px;\">PARTICIPATION</div>
                                <div style=\"color:rgba(255,255,255,.75);font-size:12px;background:rgba(255,255,255,.2);padding:3px 10px;border-radius:20px;display:inline-block;margin-top:4px;\">
                                    \${new Date(d.created_at).toLocaleTimeString('fr-FR', {hour:'2-digit', minute:'2-digit'})}
                                </div>
                            </div>
                        </div>
                        <button type=\"button\" data-bs-dismiss=\"modal\" style=\"background:none;border:none;color:white;font-size:22px;cursor:pointer;\">&times;</button>
                    </div>
                    <div style=\"padding:20px;background:#f9f7f4;\">
                        <div class=\"detail-section\">
                            <div class=\"detail-section-title\">👤 Informations du participant</div>
                            <div style=\"display:flex;gap:15px;align-items:center;\">
                                <div class=\"avatar-circle\">\${initials}</div>
                                <div>
                                    <div style=\"font-size:18px;font-weight:bold;color:#285921;\">\${escHtml(d.firstname + ' ' + d.lastname)}</div>
                                    <span style=\"background:#fff3e0;color:#e65100;font-size:11px;font-weight:bold;padding:3px 10px;border-radius:20px;display:inline-block;margin:4px 0;\">Participation supprimée</span>
                                </div>
                            </div>
                        </div>
                        <div class=\"detail-section\">
                            <div class=\"detail-section-title\">📌 Événement</div>
                            <div style=\"font-size:17px;font-weight:bold;color:#285921;margin-bottom:8px;\">🎯 \${escHtml(d.event_title)}</div>
                            <div style=\"font-size:13px;color:#5a6c5a;\">📅 \${new Date(d.created_at).toLocaleDateString('fr-FR', {day:'2-digit', month:'long', year:'numeric'})}</div>
                        </div>
                        <div style=\"background:#fff3e0;border:1px solid #ffcc80;border-radius:12px;padding:12px 16px;font-size:13px;color:#e65100;margin-bottom:16px;\">
                            ⚠️ La participation a été supprimée. Les coordonnées du participant ne sont plus disponibles.
                        </div>
                        <div style=\"display:flex;justify-content:flex-end;\">
                            <button type=\"button\" data-bs-dismiss=\"modal\" style=\"background:#b7c9b5;border:none;color:white;font-weight:bold;padding:10px 22px;border-radius:25px;cursor:pointer;font-size:14px;\">Fermer</button>
                        </div>
                    </div>`;
                    return;
                }

                const pDate   = new Date(d.participation_date);
                const dateStr = pDate.toLocaleDateString('fr-FR', {day:'2-digit', month:'long', year:'numeric'});
                const timeStr = pDate.toLocaleTimeString('fr-FR', {hour:'2-digit', minute:'2-digit'});
                const eDate   = d.event_date ? new Date(d.event_date).toLocaleDateString('fr-FR', {day:'2-digit', month:'long', year:'numeric'}) : 'N/A';
                const ratio   = d.max_participants > 0 ? Math.round(d.current_participants / d.max_participants * 100) : 0;
                const initials= (d.firstname||'?').charAt(0).toUpperCase() + (d.lastname||'?').charAt(0).toUpperCase();
                const sColor  = d.participation_status === 'confirmed' ? '#4CAF50' : '#FF9800';
                const sText   = d.participation_status === 'confirmed' ? 'Confirmée' : 'En attente';

                document.getElementById('detailBody').innerHTML = `
                <div style=\"background:linear-gradient(to right,#285921,#3d7e33);padding:18px 22px;display:flex;align-items:center;justify-content:space-between;\">
                    <div style=\"display:flex;align-items:center;gap:12px;\">
                        <span style=\"font-size:26px;\">📌</span>
                        <div>
                            <div style=\"color:white;font-weight:bold;font-size:17px;\">NOUVELLE PARTICIPATION</div>
                            <div style=\"color:rgba(255,255,255,.75);font-size:12px;background:rgba(255,255,255,.2);padding:3px 10px;border-radius:20px;display:inline-block;margin-top:4px;\">\${timeStr}</div>
                        </div>
                    </div>
                    <button type=\"button\" data-bs-dismiss=\"modal\" style=\"background:none;border:none;color:white;font-size:22px;cursor:pointer;\">&times;</button>
                </div>
                <div style=\"padding:20px;background:#f9f7f4;\">
                    <div class=\"detail-section\">
                        <div class=\"detail-section-title\">👤 Informations du participant</div>
                        <div style=\"display:flex;gap:15px;align-items:center;\">
                            <div class=\"avatar-circle\">\${initials}</div>
                            <div>
                                <div style=\"font-size:18px;font-weight:bold;color:#285921;\">\${escHtml((d.firstname||'') + ' ' + (d.lastname||''))}</div>
                                <span style=\"background:#e8f0e8;color:#285921;font-size:11px;font-weight:bold;padding:3px 10px;border-radius:20px;display:inline-block;margin:4px 0;\">\${escHtml(d.user_role||'')}</span>
                                <div style=\"font-size:13px;color:#5a6c5a;margin-top:4px;\">📧 \${escHtml(d.email||'')}</div>
                                <div style=\"font-size:13px;color:#5a6c5a;\">📱 \${escHtml(d.phone_number||'Non renseigné')}</div>
                            </div>
                        </div>
                    </div>
                    <div class=\"detail-section\">
                        <div class=\"detail-section-title\">📌 Détails de l'événement</div>
                        <div style=\"font-size:17px;font-weight:bold;color:#285921;margin-bottom:8px;\">🎯 \${escHtml(d.event_title||'')}</div>
                        <div style=\"font-size:13px;color:#5a6c5a;margin-bottom:3px;\">📍 \${escHtml(d.location||'')}</div>
                        <div style=\"font-size:13px;color:#5a6c5a;margin-bottom:10px;\">📅 \${eDate}</div>
                        <div style=\"display:flex;align-items:center;gap:10px;\">
                            <div style=\"flex:1;height:10px;background:#e0e0e0;border-radius:10px;overflow:hidden;\">
                                <div style=\"height:100%;width:\${ratio}%;background:#4CAF50;border-radius:10px;\"></div>
                            </div>
                            <span style=\"font-size:12px;font-weight:bold;color:#285921;\">\${d.current_participants}/\${d.max_participants} places</span>
                        </div>
                    </div>
                    <div class=\"detail-section\">
                        <div class=\"detail-section-title\">✅ Informations d'inscription</div>
                        <div style=\"font-size:13px;color:#5a6c5a;margin-bottom:3px;\">📅 \${dateStr}</div>
                        <div style=\"font-size:13px;color:#5a6c5a;margin-bottom:10px;\">⏰ \${timeStr}</div>
                        <div style=\"display:flex;align-items:center;gap:8px;\">
                            <span style=\"width:10px;height:10px;border-radius:50%;background:\${sColor};display:inline-block;\"></span>
                            <span style=\"font-size:14px;font-weight:bold;color:\${sColor};\">\${sText}</span>
                        </div>
                    </div>
                    <div style=\"display:flex;justify-content:flex-end;gap:12px;flex-wrap:wrap;\">
                        <button onclick=\"sendConfirmEmail(\${d.id}, this)\" style=\"background:linear-gradient(135deg,#2196F3,#1976D2);border:none;color:white;font-weight:bold;padding:10px 22px;border-radius:25px;cursor:pointer;font-size:14px;\">📧 Envoyer email de confirmation</button>
                        <a href=\"mailto:\${escHtml(d.email||'')}?subject=\${encodeURIComponent('Votre inscription - ' + (d.event_title||''))}&body=\${encodeURIComponent('Bonjour ' + (d.firstname||'') + ',\\n\\nNous confirmons votre inscription à l\\'événement : ' + (d.event_title||'') + '\\n\\nCordialement,\\nL\\'équipe NAFSEYTI')}\" style=\"background:linear-gradient(135deg,#374535,#2a3328);color:white;font-weight:bold;padding:10px 22px;border-radius:25px;text-decoration:none;font-size:14px;\">✉️ Écrire un email</a>
                        <button type=\"button\" data-bs-dismiss=\"modal\" style=\"background:#b7c9b5;border:none;color:white;font-weight:bold;padding:10px 22px;border-radius:25px;cursor:pointer;font-size:14px;\">Fermer</button>
                    </div>
                </div>`;

                loadNotifications();
            })
            .catch(() => {
                document.getElementById('detailBody').innerHTML = '<div style=\"padding:30px;text-align:center;color:red;\">Erreur lors du chargement.</div>';
            });
    });

    window.sendConfirmEmail = function(notifId, btn) {
        btn.disabled = true;
        btn.textContent = '⏳ Envoi...';
        fetch(`/psycho/notifications/\${notifId}/send-email`, {method:'POST'})
            .then(r => r.json())
            .then(data => {
                if (data.success) {
                    btn.textContent = '✅ Email envoyé !';
                    btn.style.background = 'linear-gradient(135deg,#4CAF50,#45a049)';
                } else {
                    btn.textContent = '❌ Erreur';
                    btn.disabled = false;
                    showToast('Erreur: ' + (data.error || 'Impossible d\\'envoyer'), 'error');
                }
            })
            .catch(() => { btn.textContent = '❌ Erreur réseau'; btn.disabled = false; });
    };

    function escHtml(str) {
        return String(str ?? '').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;');
    }

    function showToast(msg, type) {
        const t = document.createElement('div');
        t.textContent = msg;
        t.style.cssText = `position:fixed;bottom:24px;right:24px;padding:12px 20px;border-radius:10px;color:white;font-weight:600;font-size:13px;z-index:9999;background:\${type==='success'?'#4CAF50':'#f44336'};box-shadow:0 4px 12px rgba(0,0,0,.2);`;
        document.body.appendChild(t);
        setTimeout(() => t.remove(), 3000);
    }

    loadNotifications();
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
        return "Psychologue/evente/Notification.html.twig";
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
        return array (  279 => 120,  275 => 119,  270 => 117,  257 => 116,  204 => 73,  192 => 64,  148 => 22,  135 => 21,  118 => 14,  114 => 13,  107 => 9,  102 => 6,  89 => 5,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Notifications de participations{% endblock %}

{% block navbar %}
<div class=\"navbar-wrap\">
    <div class=\"navbar-inner\">
        <ul class=\"nav-links\">
            <li><a href=\"{{ path('psycho_dashboard') }}\">Accueil</a></li>
            <li><a href=\"#\">Contenu Psychologique</a></li>
            <li><a href=\"#\">Tests</a></li>
            <li><a href=\"#\">Rendez-vous</a></li>
            <li><a href=\"{{ path('psycho_events_index') }}\">Evenements</a></li>
            <li><a href=\"{{ path('psycho_notifications_page') }}\" class=\"active\">Notifications</a></li>
        </ul>
        <a href=\"#!\" class=\"nav-cta nav-links a\">Se connecter</a>
    </div>
</div>
{% endblock %}

{% block body %}
<style>
    .notif-page { background: linear-gradient(to bottom right,#f8f5f2,#f0ede5); min-height:100vh; padding:30px; }
    .notif-top-border { height:5px; background:linear-gradient(to right,#285921,#4CAF50,#8BC34A); border-radius:5px; margin-bottom:20px; }
    .notif-bottom-border { height:3px; background:linear-gradient(to right,#8BC34A,#4CAF50,#285921); border-radius:5px; margin-top:15px; }
    .notif-header { display:flex; align-items:center; gap:15px; margin-bottom:20px; }
    .notif-bell-circle { width:50px; height:50px; border-radius:50%; background:linear-gradient(to bottom,#285921,#1e4a18); border:2px solid white; display:flex; align-items:center; justify-content:center; font-size:24px; box-shadow:0 0 10px #28592140; flex-shrink:0; }
    .notif-title { font-size:24px; font-weight:bold; color:#285921; margin:0; }
    .notif-subtitle { font-size:13px; color:#8b9a8b; font-style:italic; margin:0; }
    .notif-unread-badge { width:44px; height:44px; border-radius:50%; background:linear-gradient(to bottom,#4CAF50,#2E7D32); border:2px solid white; display:flex; align-items:center; justify-content:center; font-size:16px; font-weight:bold; color:white; box-shadow:0 0 8px #4CAF5060; margin-left:auto; }
    .notif-toolbar { display:flex; justify-content:space-between; align-items:center; margin-bottom:15px; flex-wrap:wrap; gap:10px; }
    .notif-search { display:flex; align-items:center; background:white; border-radius:25px; padding:6px 15px; box-shadow:0 1px 4px rgba(0,0,0,.1); min-width:260px; }
    .notif-search input { border:none; outline:none; font-size:13px; width:100%; background:transparent; }
    .btn-mark-read { background:linear-gradient(to bottom,#374535,#2a3328); border:none; color:white; font-weight:bold; border-radius:25px; padding:9px 20px; cursor:pointer; font-size:13px; }
    .btn-mark-read:hover { background:linear-gradient(to bottom,#4a5a45,#374535); }
    .btn-refresh-notif { background:linear-gradient(to bottom,#4CAF50,#45a049); border:none; color:white; font-weight:bold; border-radius:25px; padding:9px 20px; cursor:pointer; font-size:13px; }
    .btn-refresh-notif:hover { background:linear-gradient(to bottom,#45a049,#3d8b40); }
    .notif-table-wrap { border-radius:12px; overflow:hidden; box-shadow:0 2px 8px rgba(40,89,33,.15); border:1px solid rgba(40,89,33,.2); }
    .notif-table { width:100%; border-collapse:collapse; background:white; }
    .notif-table thead tr { background:#f0ede5; }
    .notif-table th { padding:12px 15px; text-align:left; font-size:13px; font-weight:bold; color:#285921; border-bottom:2px solid #e0d9cc; }
    .notif-table td { padding:12px 15px; border-bottom:1px solid #f5f0ea; font-size:13px; }
    .notif-table tr:last-child td { border-bottom:none; }
    .notif-table tr.unread { background:#f9fff9; }
    .notif-table tr:hover { background:#f5f5f5; }
    .btn-view-detail { background:#374535; border:none; color:white; font-size:12px; font-weight:bold; padding:7px 14px; border-radius:8px; cursor:pointer; }
    .btn-view-detail:hover { background:#4CAF50; }
    .notif-status-bar { display:flex; align-items:center; gap:8px; margin-top:15px; font-size:12px; color:#8b9a8b; }
    .status-dot { width:8px; height:8px; background:#4CAF50; border-radius:50%; display:inline-block; }
    .detail-section { background:white; border-radius:12px; padding:18px; margin-bottom:15px; box-shadow:0 2px 8px rgba(0,0,0,.06); }
    .detail-section-title { font-weight:bold; color:#285921; font-size:12px; text-transform:uppercase; letter-spacing:.5px; margin-bottom:12px; }
    .avatar-circle { width:60px; height:60px; border-radius:50%; background:#285921; border:2px solid #4CAF50; display:flex; align-items:center; justify-content:center; color:white; font-size:22px; font-weight:bold; flex-shrink:0; }
</style>

<div class=\"notif-page\">
    <div class=\"notif-top-border\"></div>

    <div class=\"notif-header\">
        <div class=\"notif-bell-circle\">🔔</div>
        <div>
            <p class=\"notif-title\">Notifications de participations</p>
            <p class=\"notif-subtitle\">Restez informé des nouvelles inscriptions à vos événements</p>
        </div>
        <div class=\"notif-unread-badge\" id=\"unreadBadge\">{{ unread }}</div>
    </div>

    <div class=\"notif-toolbar\">
        <div class=\"notif-search\">
            <span style=\"color:#8b9a8b;margin-right:8px;\">🔍</span>
            <input type=\"text\" id=\"notifSearch\" placeholder=\"Rechercher une notification...\">
        </div>
        <div style=\"display:flex;gap:10px;flex-wrap:wrap;\">
            <a href=\"{{ path('psycho_events_index') }}\" style=\"background:linear-gradient(to bottom,#374535,#2a3328);border:none;color:white;font-weight:bold;border-radius:25px;padding:9px 20px;font-size:13px;text-decoration:none;display:inline-flex;align-items:center;gap:6px;\">← Retour aux événements</a>
            <button class=\"btn-mark-read\" id=\"markAllReadBtn\">✅ Marquer tout comme lu</button>
            <button class=\"btn-refresh-notif\" id=\"refreshBtn\">🔄 Actualiser</button>
        </div>
    </div>

    <div class=\"notif-table-wrap\">
        <table class=\"notif-table\">
            <thead>
                <tr>
                    <th>Message</th>
                    <th style=\"width:160px;\">Date</th>
                    <th style=\"width:110px;\">Statut</th>
                    <th style=\"width:140px;\">Action</th>
                </tr>
            </thead>
            <tbody id=\"notifTableBody\">
                <tr><td colspan=\"4\" style=\"text-align:center;padding:30px;color:#8b9a8b;\">Chargement...</td></tr>
            </tbody>
        </table>
    </div>

    <div class=\"notif-status-bar\">
        <span class=\"status-dot\"></span>
        <span>Notifications en temps réel</span>
        <span style=\"margin-left:auto;font-size:11px;color:#b0b0b0;font-style:italic;\" id=\"lastUpdate\"></span>
    </div>

    <div class=\"notif-bottom-border\"></div>
</div>

<!-- Detail Modal -->
<div class=\"modal fade\" id=\"detailModal\" tabindex=\"-1\">
    <div class=\"modal-dialog modal-dialog-centered\" style=\"max-width:520px;\">
        <div class=\"modal-content\" style=\"border-radius:15px;border:1px solid #d4c9b8;overflow:hidden;\">
            <div id=\"detailBody\" style=\"background:#f9f7f4;padding:0;\">
                <div style=\"text-align:center;padding:40px;color:#8b9a8b;\">Chargement...</div>
            </div>
        </div>
    </div>
</div>
{% endblock %}

{% block javascripts %}
{{ parent() }}
<script>
    const LIST_URL     = '{{ path('psycho_notifications_list') }}';
    const MARK_ALL_URL = '{{ path('psycho_notifications_mark_all') }}';

    let allNotifications = [];

    function loadNotifications() {
        document.getElementById('lastUpdate').textContent =
            'Mise à jour: ' + new Date().toLocaleTimeString('fr-FR', {hour:'2-digit', minute:'2-digit'});

        fetch(LIST_URL)
            .then(r => r.json())
            .then(data => {
                allNotifications = data.notifications || [];
                document.getElementById('unreadBadge').textContent = data.unread;
                renderTable(allNotifications);
            })
            .catch(() => showToast('Erreur lors du chargement', 'error'));
    }

    function renderTable(rows) {
        const search = document.getElementById('notifSearch').value.toLowerCase();
        const tbody  = document.getElementById('notifTableBody');
        const filtered = rows.filter(n => !search || n.message.toLowerCase().includes(search));

        if (!filtered.length) {
            tbody.innerHTML = '<tr><td colspan=\"4\" style=\"text-align:center;padding:30px;color:#8b9a8b;\">Aucune notification trouvée</td></tr>';
            return;
        }

        tbody.innerHTML = filtered.map(n => {
            const isUnread = !n.is_read;
            const d        = new Date(n.created_at);
            const dateStr  = d.toLocaleDateString('fr-FR', {day:'2-digit', month:'short', year:'numeric'});
            const timeStr  = d.toLocaleTimeString('fr-FR', {hour:'2-digit', minute:'2-digit'});
            const status   = isUnread
                ? '<span style=\"color:#285921;font-weight:bold;\">🆕 Non lu</span>'
                : '<span style=\"color:gray;\">✅ Lu</span>';
            const action   = isUnread
                ? `<button class=\"btn-view-detail\" data-id=\"\${n.id}\">👤 Voir détails</button>`
                : `<button class=\"btn-view-detail\" data-id=\"\${n.id}\" style=\"background:#7f9a7d;\">👁 Voir</button>`;

            return `<tr class=\"notif-row\${isUnread ? ' unread' : ''}\" data-id=\"\${n.id}\">
                <td style=\"font-weight:\${isUnread ? 'bold' : 'normal'};color:#2c3e50;\">\${escHtml(n.message)}</td>
                <td style=\"color:#8b9a8b;white-space:nowrap;\">\${dateStr}<br>\${timeStr}</td>
                <td>\${status}</td>
                <td>\${action}</td>
            </tr>`;
        }).join('');
    }

    // Live search
    document.getElementById('notifSearch').addEventListener('input', () => renderTable(allNotifications));

    // Refresh
    document.getElementById('refreshBtn').addEventListener('click', loadNotifications);

    // Mark all read
    document.getElementById('markAllReadBtn').addEventListener('click', () => {
        fetch(MARK_ALL_URL, {method:'POST'})
            .then(() => { showToast('Toutes les notifications marquées comme lues', 'success'); loadNotifications(); })
            .catch(() => showToast('Erreur', 'error'));
    });

    // View detail
    document.getElementById('notifTableBody').addEventListener('click', (e) => {
        const btn = e.target.closest('.btn-view-detail');
        if (!btn) return;
        const id = btn.dataset.id;

        document.getElementById('detailBody').innerHTML = '<div style=\"text-align:center;padding:40px;color:#8b9a8b;\">Chargement...</div>';
        new bootstrap.Modal(document.getElementById('detailModal')).show();

        fetch(`/psycho/notifications/\${id}/detail`)
            .then(r => r.json())
            .then(d => {
                if (d.error) { document.getElementById('detailBody').innerHTML = '<div style=\"padding:30px;text-align:center;color:red;\">Introuvable.</div>'; return; }

                // ── Orphaned notification (participation was deleted) ──────────
                if (d.participation_status === 'deleted' || d._warning) {
                    const initials = (d.firstname||'?').charAt(0).toUpperCase() + (d.lastname||'?').charAt(0).toUpperCase();
                    document.getElementById('detailBody').innerHTML = `
                    <div style=\"background:linear-gradient(to right,#285921,#3d7e33);padding:18px 22px;display:flex;align-items:center;justify-content:space-between;\">
                        <div style=\"display:flex;align-items:center;gap:12px;\">
                            <span style=\"font-size:26px;\">📌</span>
                            <div>
                                <div style=\"color:white;font-weight:bold;font-size:17px;\">PARTICIPATION</div>
                                <div style=\"color:rgba(255,255,255,.75);font-size:12px;background:rgba(255,255,255,.2);padding:3px 10px;border-radius:20px;display:inline-block;margin-top:4px;\">
                                    \${new Date(d.created_at).toLocaleTimeString('fr-FR', {hour:'2-digit', minute:'2-digit'})}
                                </div>
                            </div>
                        </div>
                        <button type=\"button\" data-bs-dismiss=\"modal\" style=\"background:none;border:none;color:white;font-size:22px;cursor:pointer;\">&times;</button>
                    </div>
                    <div style=\"padding:20px;background:#f9f7f4;\">
                        <div class=\"detail-section\">
                            <div class=\"detail-section-title\">👤 Informations du participant</div>
                            <div style=\"display:flex;gap:15px;align-items:center;\">
                                <div class=\"avatar-circle\">\${initials}</div>
                                <div>
                                    <div style=\"font-size:18px;font-weight:bold;color:#285921;\">\${escHtml(d.firstname + ' ' + d.lastname)}</div>
                                    <span style=\"background:#fff3e0;color:#e65100;font-size:11px;font-weight:bold;padding:3px 10px;border-radius:20px;display:inline-block;margin:4px 0;\">Participation supprimée</span>
                                </div>
                            </div>
                        </div>
                        <div class=\"detail-section\">
                            <div class=\"detail-section-title\">📌 Événement</div>
                            <div style=\"font-size:17px;font-weight:bold;color:#285921;margin-bottom:8px;\">🎯 \${escHtml(d.event_title)}</div>
                            <div style=\"font-size:13px;color:#5a6c5a;\">📅 \${new Date(d.created_at).toLocaleDateString('fr-FR', {day:'2-digit', month:'long', year:'numeric'})}</div>
                        </div>
                        <div style=\"background:#fff3e0;border:1px solid #ffcc80;border-radius:12px;padding:12px 16px;font-size:13px;color:#e65100;margin-bottom:16px;\">
                            ⚠️ La participation a été supprimée. Les coordonnées du participant ne sont plus disponibles.
                        </div>
                        <div style=\"display:flex;justify-content:flex-end;\">
                            <button type=\"button\" data-bs-dismiss=\"modal\" style=\"background:#b7c9b5;border:none;color:white;font-weight:bold;padding:10px 22px;border-radius:25px;cursor:pointer;font-size:14px;\">Fermer</button>
                        </div>
                    </div>`;
                    return;
                }

                const pDate   = new Date(d.participation_date);
                const dateStr = pDate.toLocaleDateString('fr-FR', {day:'2-digit', month:'long', year:'numeric'});
                const timeStr = pDate.toLocaleTimeString('fr-FR', {hour:'2-digit', minute:'2-digit'});
                const eDate   = d.event_date ? new Date(d.event_date).toLocaleDateString('fr-FR', {day:'2-digit', month:'long', year:'numeric'}) : 'N/A';
                const ratio   = d.max_participants > 0 ? Math.round(d.current_participants / d.max_participants * 100) : 0;
                const initials= (d.firstname||'?').charAt(0).toUpperCase() + (d.lastname||'?').charAt(0).toUpperCase();
                const sColor  = d.participation_status === 'confirmed' ? '#4CAF50' : '#FF9800';
                const sText   = d.participation_status === 'confirmed' ? 'Confirmée' : 'En attente';

                document.getElementById('detailBody').innerHTML = `
                <div style=\"background:linear-gradient(to right,#285921,#3d7e33);padding:18px 22px;display:flex;align-items:center;justify-content:space-between;\">
                    <div style=\"display:flex;align-items:center;gap:12px;\">
                        <span style=\"font-size:26px;\">📌</span>
                        <div>
                            <div style=\"color:white;font-weight:bold;font-size:17px;\">NOUVELLE PARTICIPATION</div>
                            <div style=\"color:rgba(255,255,255,.75);font-size:12px;background:rgba(255,255,255,.2);padding:3px 10px;border-radius:20px;display:inline-block;margin-top:4px;\">\${timeStr}</div>
                        </div>
                    </div>
                    <button type=\"button\" data-bs-dismiss=\"modal\" style=\"background:none;border:none;color:white;font-size:22px;cursor:pointer;\">&times;</button>
                </div>
                <div style=\"padding:20px;background:#f9f7f4;\">
                    <div class=\"detail-section\">
                        <div class=\"detail-section-title\">👤 Informations du participant</div>
                        <div style=\"display:flex;gap:15px;align-items:center;\">
                            <div class=\"avatar-circle\">\${initials}</div>
                            <div>
                                <div style=\"font-size:18px;font-weight:bold;color:#285921;\">\${escHtml((d.firstname||'') + ' ' + (d.lastname||''))}</div>
                                <span style=\"background:#e8f0e8;color:#285921;font-size:11px;font-weight:bold;padding:3px 10px;border-radius:20px;display:inline-block;margin:4px 0;\">\${escHtml(d.user_role||'')}</span>
                                <div style=\"font-size:13px;color:#5a6c5a;margin-top:4px;\">📧 \${escHtml(d.email||'')}</div>
                                <div style=\"font-size:13px;color:#5a6c5a;\">📱 \${escHtml(d.phone_number||'Non renseigné')}</div>
                            </div>
                        </div>
                    </div>
                    <div class=\"detail-section\">
                        <div class=\"detail-section-title\">📌 Détails de l'événement</div>
                        <div style=\"font-size:17px;font-weight:bold;color:#285921;margin-bottom:8px;\">🎯 \${escHtml(d.event_title||'')}</div>
                        <div style=\"font-size:13px;color:#5a6c5a;margin-bottom:3px;\">📍 \${escHtml(d.location||'')}</div>
                        <div style=\"font-size:13px;color:#5a6c5a;margin-bottom:10px;\">📅 \${eDate}</div>
                        <div style=\"display:flex;align-items:center;gap:10px;\">
                            <div style=\"flex:1;height:10px;background:#e0e0e0;border-radius:10px;overflow:hidden;\">
                                <div style=\"height:100%;width:\${ratio}%;background:#4CAF50;border-radius:10px;\"></div>
                            </div>
                            <span style=\"font-size:12px;font-weight:bold;color:#285921;\">\${d.current_participants}/\${d.max_participants} places</span>
                        </div>
                    </div>
                    <div class=\"detail-section\">
                        <div class=\"detail-section-title\">✅ Informations d'inscription</div>
                        <div style=\"font-size:13px;color:#5a6c5a;margin-bottom:3px;\">📅 \${dateStr}</div>
                        <div style=\"font-size:13px;color:#5a6c5a;margin-bottom:10px;\">⏰ \${timeStr}</div>
                        <div style=\"display:flex;align-items:center;gap:8px;\">
                            <span style=\"width:10px;height:10px;border-radius:50%;background:\${sColor};display:inline-block;\"></span>
                            <span style=\"font-size:14px;font-weight:bold;color:\${sColor};\">\${sText}</span>
                        </div>
                    </div>
                    <div style=\"display:flex;justify-content:flex-end;gap:12px;flex-wrap:wrap;\">
                        <button onclick=\"sendConfirmEmail(\${d.id}, this)\" style=\"background:linear-gradient(135deg,#2196F3,#1976D2);border:none;color:white;font-weight:bold;padding:10px 22px;border-radius:25px;cursor:pointer;font-size:14px;\">📧 Envoyer email de confirmation</button>
                        <a href=\"mailto:\${escHtml(d.email||'')}?subject=\${encodeURIComponent('Votre inscription - ' + (d.event_title||''))}&body=\${encodeURIComponent('Bonjour ' + (d.firstname||'') + ',\\n\\nNous confirmons votre inscription à l\\'événement : ' + (d.event_title||'') + '\\n\\nCordialement,\\nL\\'équipe NAFSEYTI')}\" style=\"background:linear-gradient(135deg,#374535,#2a3328);color:white;font-weight:bold;padding:10px 22px;border-radius:25px;text-decoration:none;font-size:14px;\">✉️ Écrire un email</a>
                        <button type=\"button\" data-bs-dismiss=\"modal\" style=\"background:#b7c9b5;border:none;color:white;font-weight:bold;padding:10px 22px;border-radius:25px;cursor:pointer;font-size:14px;\">Fermer</button>
                    </div>
                </div>`;

                loadNotifications();
            })
            .catch(() => {
                document.getElementById('detailBody').innerHTML = '<div style=\"padding:30px;text-align:center;color:red;\">Erreur lors du chargement.</div>';
            });
    });

    window.sendConfirmEmail = function(notifId, btn) {
        btn.disabled = true;
        btn.textContent = '⏳ Envoi...';
        fetch(`/psycho/notifications/\${notifId}/send-email`, {method:'POST'})
            .then(r => r.json())
            .then(data => {
                if (data.success) {
                    btn.textContent = '✅ Email envoyé !';
                    btn.style.background = 'linear-gradient(135deg,#4CAF50,#45a049)';
                } else {
                    btn.textContent = '❌ Erreur';
                    btn.disabled = false;
                    showToast('Erreur: ' + (data.error || 'Impossible d\\'envoyer'), 'error');
                }
            })
            .catch(() => { btn.textContent = '❌ Erreur réseau'; btn.disabled = false; });
    };

    function escHtml(str) {
        return String(str ?? '').replace(/&/g,'&amp;').replace(/</g,'&lt;').replace(/>/g,'&gt;');
    }

    function showToast(msg, type) {
        const t = document.createElement('div');
        t.textContent = msg;
        t.style.cssText = `position:fixed;bottom:24px;right:24px;padding:12px 20px;border-radius:10px;color:white;font-weight:600;font-size:13px;z-index:9999;background:\${type==='success'?'#4CAF50':'#f44336'};box-shadow:0 4px 12px rgba(0,0,0,.2);`;
        document.body.appendChild(t);
        setTimeout(() => t.remove(), 3000);
    }

    loadNotifications();
</script>
{% endblock %}
", "Psychologue/evente/Notification.html.twig", "C:\\Users\\sirine\\psy1\\psy\\templates\\Psychologue\\evente\\Notification.html.twig");
    }
}
