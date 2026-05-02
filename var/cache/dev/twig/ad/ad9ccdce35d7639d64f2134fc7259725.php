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

/* back/fiches_liste.html.twig */
class __TwigTemplate_255c56b18f4ab99c111c5be3e6677f2c extends Template
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
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "back/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/fiches_liste.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/fiches_liste.html.twig"));

        $this->parent = $this->load("back/base.html.twig", 1);
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

        yield "Liste des Fiches de Consultation";
        
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
        yield "<div class=\"full_container\">
    <div class=\"inner_container\">

        <!-- Sidebar (identique) -->
        <nav id=\"sidebar\">
            <div class=\"sidebar_blog_1\">
                <div class=\"sidebar-header\">
                    <div class=\"logo_section\">
                        <a href=\"#\"><img class=\"logo_icon img-responsive\" src=\"";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("back/images/logo/logo_icon1.png"), "html", null, true);
        yield "\" alt=\"logo\" /></a>
                    </div>
                </div>
                     <div class=\"sidebar_user_info\">
    <div class=\"icon_setting\"></div>
    <div class=\"user_profle_side\">
        <div class=\"user_img\">
           
                <img class=\"img-responsive\"
                  src=\"";
        // line 23
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("back/images/layout_img/user_img.jpg"), "html", null, true);
        yield "\" 
                     alt=\"user\"
                     style=\"width:70px; height:70px; border-radius:50%; object-fit:cover; border:3px solid #3c943c; display:block; margin:0 auto 10px auto;\">
            
        </div>
        <div class=\"user_info\" style=\"text-align:center;\">
            <h6 style=\"color:white; font-size:0.95rem; font-weight:600; margin-bottom:4px;\">
                ";
        // line 30
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 30, $this->source); })()), "user", [], "any", false, false, false, 30), "firstname", [], "any", false, false, false, 30), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 30, $this->source); })()), "user", [], "any", false, false, false, 30), "lastname", [], "any", false, false, false, 30), "html", null, true);
        yield "
            </h6>
            <p style=\"margin:0;\">
                <span class=\"online_animation\"></span> En ligne
            </p>
        </div>
    </div>
</div>
            </div>
            <div class=\"sidebar_blog_2\">
            <h4></h4>
                <ul class=\"list-unstyled components\">
                    <li><a href=\"";
        // line 42
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_tableau");
        yield "\"><i class=\"fa fa-dashboard yellow_color\"></i><span>Tableau de bord</span></a></li>
                    <li><a href=\"#\"><i class=\"fa fa-users blue1_color\"></i><span>Utilisateurs</span></a></li>
                    <li><a href=\"";
        // line 44
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_rendezvous");
        yield "\"><i class=\"fa fa-calendar orange_color\"></i><span>Rendez-vous</span></a></li>
                    <li class=\"active\"><a href=\"";
        // line 45
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_fiches");
        yield "\"><i class=\"fa fa-file-text blue1_color\"></i><span>Fiches consultation</span></a></li>
                    <li><a href=\"#\"><i class=\"fa fa-book purple_color2\"></i><span>Contenu psychologique</span></a></li>
                     <li class=\"active\"><a href=\"";
        // line 47
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_test_index");
        yield "\"><i class=\"fa fa-check-square green_color\"></i><span>Tests</span></a></li>
                    <li><a href=\"#\"><i class=\"fa fa-calendar-check-o red_color\"></i><span>Événements</span></a></li>
                </ul>
            </div>
        </nav>

        <div id=\"content\">
            <!-- Topbar -->
            <div class=\"topbar\">
                <nav class=\"navbar navbar-expand-lg navbar-light\">
                    <div class=\"full\">
                        <button type=\"button\" id=\"sidebarCollapse\" class=\"sidebar_toggle\">
                            <i class=\"fa fa-bars\"></i>
                        </button>
                        <div class=\"logo_section\">
                            <a href=\"";
        // line 62
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_dashboard");
        yield "\" style=\"display:flex; align-items:center; text-decoration:none;\">
                                <img class=\"img-responsive\"
                                     src=\"";
        // line 64
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("back/images/logo/logo1.png"), "html", null, true);
        yield "\"
                                     alt=\"logo\"
                                     style=\"width:40px; height:40px; margin-right:10px;\" />
                                <span style=\"font-size:20px; font-weight:bold; color:#3c943c;\">
                                    Nafseyti
                                </span>
                            </a>
                        </div>
                        <div class=\"right_topbar\">
                            <div class=\"icon_info\">
                                <ul>
                                    <li><a href=\"#\"><i class=\"fa fa-bell-o\"></i><span class=\"badge\">2</span></a></li>
                                    <li><a href=\"#\"><i class=\"fa fa-question-circle\"></i></a></li>
                                    <li><a href=\"#\"><i class=\"fa fa-envelope-o\"></i><span class=\"badge\">3</span></a></li>
                                </ul>
                                <ul class=\"user_profile_dd\">
                                    <li>
                                        <a class=\"dropdown-toggle\" data-toggle=\"dropdown\">
    <img class=\"img-responsive rounded-circle\"
         src=\"";
        // line 83
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("back/images/layout_img/user_img.jpg"), "html", null, true);
        yield "\" 
         alt=\"photo\"
         style=\"width:35px; height:35px; object-fit:cover; border-radius:50%;\">

    <span class=\"name_user\">
        ";
        // line 88
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 88, $this->source); })()), "user", [], "any", false, false, false, 88), "firstname", [], "any", false, false, false, 88), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 88, $this->source); })()), "user", [], "any", false, false, false, 88), "lastname", [], "any", false, false, false, 88), "html", null, true);
        yield "
    </span>
</a>
                                        <div class=\"dropdown-menu\">
    <a class=\"dropdown-item\" href=\"";
        // line 92
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile");
        yield "\">
        <i class=\"fa fa-user\"></i> Mon Profil
    </a>
    <div class=\"dropdown-divider\"></div>
    <a class=\"dropdown-item\" href=\"";
        // line 96
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
        yield "\">
        <span>Se déconnecter</span> <i class=\"fa fa-sign-out\"></i>
    </a>
</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <div class=\"midde_cont\">
                <div class=\"container-fluid\">
                <link href=\"https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@300;400;500&display=swap\" rel=\"stylesheet\">
                <style>
                    /* ── Variables couleurs indigo/bleu ── */
                    :root {
                        --fc-dark:    #1a1e3a;
                        --fc-mid:     #2a3080;
                        --fc-accent:  #7c8fdc;
                        --fc-light:   #e8eaf6;
                        --fc-bg:      #f8f9fe;
                        --fc-border:  #dde0f0;
                        --fc-text:    #2a2d4a;
                    }
                    .fc-wrap { font-family: 'DM Sans', sans-serif; padding: 10px 0 50px; }

                    .fc-header { display:flex; align-items:center; justify-content:space-between; margin-bottom:28px; }
                    .fc-header-left .page-eyebrow { font-size:10px; letter-spacing:2px; text-transform:uppercase; color:#a0a0b0; margin-bottom:4px; }
                    .fc-header-left h2 { font-family:'DM Serif Display',serif; font-size:32px; color:var(--fc-dark); margin:0; line-height:1.1; }
                    .fc-header-left h2 em { color:var(--fc-mid); font-style:italic; }

                    .btn-creer-fc {
                        display:inline-flex; align-items:center; gap:10px;
                        padding:13px 24px; border-radius:50px; font-size:14px; font-weight:500;
                        cursor:pointer; font-family:'DM Sans',sans-serif;
                        background:transparent; border:2px solid var(--fc-mid); color:var(--fc-mid);
                        transition:0.25s;
                    }
                    .btn-creer-fc:hover { background:rgba(42,48,128,0.08); transform:translateY(-2px); }
                    .btn-creer-fc .plus-icon {
                        width:22px; height:22px; border:1px solid var(--fc-mid); border-radius:50%;
                        display:flex; align-items:center; justify-content:center; background:transparent;
                    }

                    /* Stats */
                    .stats-bar { display:flex; gap:14px; margin-bottom:24px; }
                    .stat-chip { display:flex; align-items:center; gap:10px; background:var(--fc-bg); border:1px solid var(--fc-border); border-radius:14px; padding:12px 18px; flex:1; }
                    .stat-chip-icon { width:38px; height:38px; border-radius:10px; display:flex; align-items:center; justify-content:center; font-size:16px; flex-shrink:0; }
                    .chip-indigo { background:#e8eaf6; } .chip-teal { background:#e0f7fa; } .chip-purple { background:#f3e5f5; }
                    .stat-chip-val { font-size:22px; font-weight:500; color:var(--fc-dark); line-height:1; }
                    .stat-chip-lbl { font-size:11px; color:#999; margin-top:2px; }

                    /* Search */
                    .search-row { display:flex; align-items:center; gap:12px; margin-bottom:20px; }
                    .search-box { flex:1; position:relative; }
                    .search-box input { width:100%; padding:11px 16px 11px 42px; border:1px solid var(--fc-border); border-radius:12px; font-size:13px; font-family:'DM Sans',sans-serif; background:var(--fc-bg); color:var(--fc-dark); outline:none; transition:border-color 0.2s; }
                    .search-box input:focus { border-color:var(--fc-mid); }
                    .search-icon { position:absolute; left:14px; top:50%; transform:translateY(-50%); color:#bbb; font-size:13px; }

                    /* ================= TABLE ================= */
                    .table-card {
                        background: var(--fc-bg);
                        border: 1px solid var(--fc-border);
                        border-radius: 20px;
                        overflow-x: auto;
                        overflow-y: hidden;
                    }

                    .table-card table {
                        width: 100%;
                        min-width: 1400px;
                        border-collapse: collapse;
                        table-layout: fixed;
                    }

                    /* Header */
                    .table-card thead tr {
                        background: var(--fc-dark);
                    }

                    .table-card thead th {
                        padding: 15px 18px;
                        text-align: left;
                        font-size: 10px;
                        letter-spacing: 1.5px;
                        text-transform: uppercase;
                        color: var(--fc-accent);
                        font-weight: 500;
                        white-space: nowrap;
                    }

                    /* Body */
                    .table-card tbody tr {
                        border-bottom: 1px solid var(--fc-border);
                        transition: background 0.2s;
                    }

                    .table-card tbody tr:hover {
                        background: #eef0fb;
                    }

                    .table-card tbody td {
                        padding: 14px 18px;
                        font-size: 13px;
                        color: #3a3a5a;
                        vertical-align: top;
                    }

                    /* Fixed column widths */
                    .table-card th:nth-child(1),
                    .table-card td:nth-child(1) {
                        width: 180px;
                    }

                    .table-card th:nth-child(2),
                    .table-card td:nth-child(2),
                    .table-card th:nth-child(3),
                    .table-card td:nth-child(3),
                    .table-card th:nth-child(4),
                    .table-card td:nth-child(4),
                    .table-card th:nth-child(5),
                    .table-card td:nth-child(5),
                    .table-card th:nth-child(6),
                    .table-card td:nth-child(6) {
                        width: 180px;
                    }

                    .table-card th:nth-child(7),
                    .table-card td:nth-child(7) {
                        width: 150px;
                    }

                    .table-card th:nth-child(8),
                    .table-card td:nth-child(8) {
                        width: 100px;
                        text-align: center;
                    }

                    /* Text cells */
                    .text-truncate-cell {
                        max-height: 90px;
                        overflow-y: auto;
                        overflow-x: hidden;
                        word-break: break-word;
                        white-space: normal;
                        line-height: 1.5;
                        font-size: 12px;
                        color: #666;
                        padding-right: 5px;
                    }

                    /* Scrollbar */
                    .text-truncate-cell::-webkit-scrollbar {
                        width: 5px;
                    }

                    .text-truncate-cell::-webkit-scrollbar-thumb {
                        background: #c8cce5;
                        border-radius: 10px;
                    }
    

                    /* Badges */
                    .date-pill { display:inline-flex; align-items:center; gap:6px; background:var(--fc-light); color:var(--fc-mid); padding:5px 12px; border-radius:20px; font-size:12px; font-weight:500; }
                    .text-truncate-cell {
                        max-width: 250px;
                        max-height: 80px;
                        overflow-y: auto;
                        white-space: normal;
                        word-wrap: break-word;
                        font-size: 12px;
                        color: #666;
                        line-height: 1.5;
                    }
                    /* Action buttons */
                    .action-btns { display:flex; gap:8px; align-items:center; }
                    .btn-edit, .btn-del { width:34px; height:34px; border-radius:10px; display:flex; align-items:center; justify-content:center; border:none; cursor:pointer; transition:0.2s; }
                    .btn-edit { background:#e8eaf6; color:var(--fc-mid); }
                    .btn-edit:hover { background:var(--fc-mid); color:white; transform:scale(1.1); }
                    .btn-del { background:#ffe4e4; color:#aa0000; }
                    .btn-del:hover { background:#aa0000; color:white; transform:scale(1.1); }

                    /* Empty state */
                    .empty-state { text-align:center; padding:60px 20px; }
                    .empty-state p { font-family:'DM Serif Display',serif; font-size:18px; color:#bbb; }

                    /* Pagination */
                    .pagination-row { display:flex; align-items:center; justify-content:space-between; padding:16px 20px; border-top:1px solid var(--fc-border); font-size:12px; color:#999; }
                    .pag-btns { display:flex; gap:6px; }
                    .pag-btn { width:32px; height:32px; border-radius:8px; display:flex; align-items:center; justify-content:center; font-size:12px; border:1px solid var(--fc-border); background:var(--fc-bg); color:#555; cursor:pointer; text-decoration:none; transition:0.2s; }
                    .pag-btn:hover, .pag-btn.active { background:var(--fc-dark); color:var(--fc-accent); border-color:var(--fc-dark); }

                    /* Delete modal */
                    .modal-overlay { display:none; position:fixed; inset:0; background:rgba(0,0,0,0.45); z-index:9999; align-items:center; justify-content:center; }
                    .modal-overlay.active { display:flex; }
                    .modal-box { background:var(--fc-bg); border-radius:20px; padding:36px 32px; max-width:380px; width:90%; text-align:center; box-shadow:0 20px 60px rgba(0,0,0,0.15); }
                    .modal-icon { width:60px; height:60px; background:#ffe4e4; border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 16px; font-size:24px; color:#aa0000; }
                    .modal-title { font-family:'DM Serif Display',serif; font-size:20px; color:var(--fc-dark); margin-bottom:8px; }
                    .modal-sub { font-size:13px; color:#999; margin-bottom:24px; }
                    .modal-actions { display:flex; gap:10px; justify-content:center; }
                    .modal-cancel { padding:10px 24px; border-radius:50px; border:1px solid var(--fc-border); background:var(--fc-bg); font-size:13px; font-family:'DM Sans',sans-serif; cursor:pointer; color:#555; transition:0.2s; }
                    .modal-cancel:hover { background:#f0ece4; }
                    .modal-confirm { padding:10px 24px; border-radius:50px; border:none; background:#aa0000; color:white; font-size:13px; font-family:'DM Sans',sans-serif; cursor:pointer; transition:0.2s; }
                    .modal-confirm:hover { background:#cc0000; }

                    /* Create/Edit modal */
                    .modal-create-overlay { display:none; position:fixed; inset:0; background:rgba(0,0,0,0.45); z-index:9999; align-items:center; justify-content:center; }
                    .modal-create-overlay.active { display:flex; }
                    .modal-create-box { background:var(--fc-bg); border-radius:20px; padding:36px 32px; max-width:580px; width:95%; max-height:90vh; overflow-y:auto; box-shadow:0 20px 60px rgba(0,0,0,0.15); }
                    .modal-create-header { display:flex; align-items:center; justify-content:space-between; margin-bottom:24px; }
                    .modal-create-title { font-family:'DM Serif Display',serif; font-size:22px; color:var(--fc-dark); }
                    .modal-close-btn { width:34px; height:34px; border-radius:10px; border:1px solid var(--fc-border); background:var(--fc-bg); cursor:pointer; display:flex; align-items:center; justify-content:center; color:#999; font-size:16px; transition:0.2s; }
                    .modal-close-btn:hover { background:#ffe4e4; color:#aa0000; }
                    .form-group { margin-bottom:16px; }
                    .form-group label { display:block; font-size:11px; letter-spacing:1px; text-transform:uppercase; color:#999; margin-bottom:6px; font-weight:500; }
                    .form-group select, .form-group textarea, .form-group input { width:100%; padding:11px 14px; border:1px solid var(--fc-border); border-radius:12px; font-size:13px; font-family:'DM Sans',sans-serif; background:var(--fc-bg); color:var(--fc-dark); outline:none; transition:border-color 0.2s; }
                    .form-group select:focus, .form-group textarea:focus, .form-group input:focus { border-color:var(--fc-mid); }
                    .form-group textarea { resize:vertical; }
                    .modal-form-actions { display:flex; gap:10px; justify-content:flex-end; margin-top:24px; }
                    .btn-form-cancel { padding:11px 24px; border-radius:50px; border:1px solid var(--fc-border); background:var(--fc-bg); font-size:13px; font-family:'DM Sans',sans-serif; cursor:pointer; color:#555; transition:0.2s; }
                    .btn-form-cancel:hover { background:#f0ece4; }
                    .btn-form-submit { padding:11px 28px; border-radius:50px; border:none; background:var(--fc-dark); color:var(--fc-accent); font-size:13px; font-family:'DM Sans',sans-serif; cursor:pointer; transition:0.2s; }
                    .btn-form-submit:hover { background:var(--fc-mid); }

                    /* Erreurs */
                    .form-group ul { list-style:none; padding:0; margin:4px 0 0; }
                    .form-group ul li { font-size:11px; color:#aa0000; background:#ffe4e4; border-radius:8px; padding:5px 10px; margin-top:4px; display:flex; align-items:center; gap:5px; }
                    .form-group ul li::before { content:\"⚠\"; font-size:11px; }
                    .btn-pdf {
                        width: 34px; height: 34px; border-radius: 10px;
                        display: flex; align-items: center; justify-content: center;
                        border: none; cursor: pointer; transition: 0.2s;
                        background: #fff3e0; color: #e65100;
                        text-decoration: none;
                    }
                    .btn-pdf:hover {
                        background: #e65100; color: white;
                        transform: scale(1.1);
                        text-decoration: none;
                    }
                </style>

                <div class=\"fc-wrap\">
                    <!-- Header -->
                    <div class=\"fc-header\">
                        <div class=\"fc-header-left\">
                            <div class=\"page-eyebrow\">Nafseyti · Administration</div>
                            <h2>Fiches de <em>Consultation</em></h2>
                        </div>
                        <button type=\"button\" class=\"btn-creer-fc\" onclick=\"openCreateModal()\">
                            <span class=\"plus-icon\">
                                <svg width=\"12\" height=\"12\" viewBox=\"0 0 12 12\">
                                    <path d=\"M6 2V10M2 6H10\" stroke=\"var(--fc-mid)\" stroke-width=\"2\" stroke-linecap=\"round\"/>
                                </svg>
                            </span>
                            Nouvelle fiche
                        </button>
                    </div>

                    <!-- Stats -->
                    <div class=\"stats-bar\">
                        <div class=\"stat-chip\">
                            <div class=\"stat-chip-icon chip-indigo\"><i class=\"fa fa-file-text\" style=\"color:var(--fc-mid);\"></i></div>
                            <div>
                                <div class=\"stat-chip-val\">";
        // line 362
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["fiches"]) || array_key_exists("fiches", $context) ? $context["fiches"] : (function () { throw new RuntimeError('Variable "fiches" does not exist.', 362, $this->source); })())), "html", null, true);
        yield "</div>
                                <div class=\"stat-chip-lbl\">Total fiches</div>
                            </div>
                        </div>
                        <div class=\"stat-chip\">
                            <div class=\"stat-chip-icon chip-teal\"><i class=\"fa fa-stethoscope\" style=\"color:#00838f;\"></i></div>
                            <div>
                                <div class=\"stat-chip-val\">";
        // line 369
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), Twig\Extension\CoreExtension::filter($this->env, (isset($context["fiches"]) || array_key_exists("fiches", $context) ? $context["fiches"] : (function () { throw new RuntimeError('Variable "fiches" does not exist.', 369, $this->source); })()), function ($__f__) use ($context, $macros) { $context["f"] = $__f__; return ( !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["f"]) || array_key_exists("f", $context) ? $context["f"] : (function () { throw new RuntimeError('Variable "f" does not exist.', 369, $this->source); })()), "diagnostic", [], "any", false, false, false, 369)) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["f"]) || array_key_exists("f", $context) ? $context["f"] : (function () { throw new RuntimeError('Variable "f" does not exist.', 369, $this->source); })()), "diagnostic", [], "any", false, false, false, 369) != "")); })), "html", null, true);
        yield "</div>
                                <div class=\"stat-chip-lbl\">Avec diagnostic</div>
                            </div>
                        </div>
                        <div class=\"stat-chip\">
                            <div class=\"stat-chip-icon chip-purple\"><i class=\"fa fa-pills\" style=\"color:#7b1fa2;\"></i></div>
                            <div>
                                <div class=\"stat-chip-val\">";
        // line 376
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), Twig\Extension\CoreExtension::filter($this->env, (isset($context["fiches"]) || array_key_exists("fiches", $context) ? $context["fiches"] : (function () { throw new RuntimeError('Variable "fiches" does not exist.', 376, $this->source); })()), function ($__f__) use ($context, $macros) { $context["f"] = $__f__; return ( !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["f"]) || array_key_exists("f", $context) ? $context["f"] : (function () { throw new RuntimeError('Variable "f" does not exist.', 376, $this->source); })()), "traitement", [], "any", false, false, false, 376)) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["f"]) || array_key_exists("f", $context) ? $context["f"] : (function () { throw new RuntimeError('Variable "f" does not exist.', 376, $this->source); })()), "traitement", [], "any", false, false, false, 376) != "")); })), "html", null, true);
        yield "</div>
                                <div class=\"stat-chip-lbl\">Avec traitement</div>
                            </div>
                        </div>
                    </div>

                    <!-- Search -->
                    <div class=\"search-row\">
                        <div class=\"search-box\">
                            <i class=\"fa fa-search search-icon\"></i>
                            <input type=\"text\" id=\"searchInput\" placeholder=\"Rechercher par médecin, diagnostic, traitement...\" onkeyup=\"filterTable()\" />
                        </div>
                    </div>

                    <!-- Table -->
                            <div class=\"table-card\">
                <div style=\"overflow-x:auto;\">
                        
                        <table id=\"ficheTable\">
                            <thead>
                                <tr>
                                    <th>Rendez-vous</th>
                                    <th>Problème principal</th>
                                    <th>Diagnostic</th>
                                    <th>Traitement</th>
                                    <th>Recommandations</th>
                                    <th>Notes</th>
                                    <th>Date création</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                ";
        // line 408
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["fiches"]) || array_key_exists("fiches", $context) ? $context["fiches"] : (function () { throw new RuntimeError('Variable "fiches" does not exist.', 408, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["fiche"]) {
            // line 409
            yield "                                <tr class=\"fiche-row\">
                                    <td>
                                        ";
            // line 411
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "rendezVous", [], "any", false, false, false, 411)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 412
                yield "                                            <span class=\"date-pill\">
                                                <i class=\"fa fa-calendar\" style=\"font-size:11px;\"></i>
                                                ";
                // line 414
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "rendezVous", [], "any", false, false, false, 414), "dateRendezVous", [], "any", false, false, false, 414), "html", null, true);
                yield "
                                                — Dr. ";
                // line 415
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "rendezVous", [], "any", false, false, false, 415), "medecin", [], "any", false, false, false, 415), "firstname", [], "any", false, false, false, 415), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "rendezVous", [], "any", false, false, false, 415), "medecin", [], "any", false, false, false, 415), "lastname", [], "any", false, false, false, 415), "html", null, true);
                yield "
                                            </span>
                                        ";
            } else {
                // line 418
                yield "                                            <span style=\"color:#bbb;font-size:12px;\">—</span>
                                        ";
            }
            // line 420
            yield "                                    </td>
                                    <td><div class=\"text-truncate-cell\">";
            // line 421
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "problemePrincipal", [], "any", true, true, false, 421) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "problemePrincipal", [], "any", false, false, false, 421)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "problemePrincipal", [], "any", false, false, false, 421), "html", null, true)) : ("—"));
            yield "</div></td>
                                    <td><div class=\"text-truncate-cell\">";
            // line 422
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "diagnostic", [], "any", true, true, false, 422) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "diagnostic", [], "any", false, false, false, 422)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "diagnostic", [], "any", false, false, false, 422), "html", null, true)) : ("—"));
            yield "</div></td>
                                    <td><div class=\"text-truncate-cell\">";
            // line 423
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "traitement", [], "any", true, true, false, 423) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "traitement", [], "any", false, false, false, 423)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "traitement", [], "any", false, false, false, 423), "html", null, true)) : ("—"));
            yield "</div></td>
                                    <td><div class=\"text-truncate-cell\">";
            // line 424
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "recommandations", [], "any", true, true, false, 424) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "recommandations", [], "any", false, false, false, 424)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "recommandations", [], "any", false, false, false, 424), "html", null, true)) : ("—"));
            yield "</div></td>
                                    <td><div class=\"text-truncate-cell\">";
            // line 425
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "notes", [], "any", true, true, false, 425) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "notes", [], "any", false, false, false, 425)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "notes", [], "any", false, false, false, 425), "html", null, true)) : ("—"));
            yield "</div></td>
                                    <td>
                                        <span class=\"date-pill\">
                                            <i class=\"fa fa-clock-o\" style=\"font-size:11px;\"></i>
                                            ";
            // line 429
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "createdAt", [], "any", false, false, false, 429), "d/m/Y H:i"), "html", null, true);
            yield "
                                        </span>
                                    </td>
                                   
                                        <td>
                                            <div class=\"action-btns\">
                                                <button class=\"btn-edit\" title=\"Modifier\" onclick=\"openEditModal(";
            // line 435
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "id", [], "any", false, false, false, 435), "html", null, true);
            yield ")\">
                                                    <i class=\"fa fa-pencil\" style=\"font-size:13px;\"></i>
                                                </button>
                                                <a href=\"";
            // line 438
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_fiche_pdf", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "id", [], "any", false, false, false, 438)]), "html", null, true);
            yield "\"
                                                class=\"btn-pdf\" title=\"Télécharger PDF\" target=\"_blank\">
                                                    <i class=\"fa fa-file-pdf-o\" style=\"font-size:13px;\"></i>
                                                </a>
                                                <button class=\"btn-del\" title=\"Supprimer\" onclick=\"openDeleteModal(";
            // line 442
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "id", [], "any", false, false, false, 442), "html", null, true);
            yield ")\">
                                                    <i class=\"fa fa-trash\" style=\"font-size:13px;\"></i>
                                                </button>
                                            </div>
                                        </td>
                                   
                                </tr>
                                ";
            $context['_iterated'] = true;
        }
        // line 449
        if (!$context['_iterated']) {
            // line 450
            yield "                                <tr>
                                    <td colspan=\"6\">
                                        <div class=\"empty-state\">
                                            <svg width=\"64\" height=\"64\" viewBox=\"0 0 64 64\" fill=\"none\">
                                                <circle cx=\"32\" cy=\"32\" r=\"30\" fill=\"#eef0fb\" stroke=\"#dde0f0\" stroke-width=\"1\"/>
                                                <rect x=\"18\" y=\"16\" width=\"28\" height=\"32\" rx=\"4\" fill=\"#dde0f0\"/>
                                                <rect x=\"22\" y=\"22\" width=\"20\" height=\"3\" rx=\"1\" fill=\"white\"/>
                                                <rect x=\"22\" y=\"28\" width=\"14\" height=\"3\" rx=\"1\" fill=\"white\"/>
                                                <rect x=\"22\" y=\"34\" width=\"16\" height=\"3\" rx=\"1\" fill=\"white\"/>
                                            </svg>
                                            <p>Aucune fiche de consultation</p>
                                        </div>
                                    </td>
                                </tr>
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['fiche'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 465
        yield "                            </tbody>
                        </table>
                        </div>

                        ";
        // line 469
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["fiches"]) || array_key_exists("fiches", $context) ? $context["fiches"] : (function () { throw new RuntimeError('Variable "fiches" does not exist.', 469, $this->source); })())) > 0)) {
            // line 470
            yield "                        <div class=\"pagination-row\">
                            <span id=\"tableCount\">";
            // line 471
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["fiches"]) || array_key_exists("fiches", $context) ? $context["fiches"] : (function () { throw new RuntimeError('Variable "fiches" does not exist.', 471, $this->source); })())), "html", null, true);
            yield " fiches au total</span>
                            <div class=\"pag-btns\">
                                <a href=\"#\" class=\"pag-btn\"><i class=\"fa fa-chevron-left\" style=\"font-size:10px;\"></i></a>
                                <a href=\"#\" class=\"pag-btn active\">1</a>
                                <a href=\"#\" class=\"pag-btn\"><i class=\"fa fa-chevron-right\" style=\"font-size:10px;\"></i></a>
                            </div>
                        </div>
                        ";
        }
        // line 479
        yield "                    </div>
                </div>

                <!-- Delete Modal -->
                <div class=\"modal-overlay\" id=\"deleteModal\">
                    <div class=\"modal-box\">
                        <div class=\"modal-icon\"><i class=\"fa fa-trash\"></i></div>
                        <div class=\"modal-title\">Supprimer cette fiche ?</div>
                        <div class=\"modal-sub\">Cette action est irréversible.</div>
                        <div class=\"modal-actions\">
                            <button class=\"modal-cancel\" onclick=\"closeDeleteModal()\">Annuler</button>
                            <form id=\"deleteForm\" method=\"post\" style=\"display:inline;\">
                                <input type=\"hidden\" name=\"_token\" id=\"deleteToken\">
                                <button type=\"submit\" class=\"modal-confirm\">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Create Modal -->
                <div class=\"modal-create-overlay\" id=\"createModal\">
                    <div class=\"modal-create-box\">
                        <div class=\"modal-create-header\">
                            <div class=\"modal-create-title\">Nouvelle fiche de consultation</div>
                            <button class=\"modal-close-btn\" onclick=\"closeCreateModal()\" type=\"button\"><i class=\"fa fa-times\"></i></button>
                        </div>
                        ";
        // line 505
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 505, $this->source); })()), 'form_start', ["action" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_fiches"), "method" => "POST", "attr" => ["novalidate" => "novalidate"]]);
        yield "
                        ";
        // line 506
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 506, $this->source); })()), 'errors');
        yield "
                            <div class=\"form-group\">
                                ";
        // line 508
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 508, $this->source); })()), "rendezVous", [], "any", false, false, false, 508), 'label');
        yield "
                                ";
        // line 509
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 509, $this->source); })()), "rendezVous", [], "any", false, false, false, 509), 'widget');
        yield "
                                ";
        // line 510
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 510, $this->source); })()), "rendezVous", [], "any", false, false, false, 510), 'errors');
        yield "
                            </div>
                            <div class=\"form-group\">
                                ";
        // line 513
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 513, $this->source); })()), "probleme_principal", [], "any", false, false, false, 513), 'label');
        yield "
                                ";
        // line 514
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 514, $this->source); })()), "probleme_principal", [], "any", false, false, false, 514), 'widget');
        yield "
                                ";
        // line 515
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 515, $this->source); })()), "probleme_principal", [], "any", false, false, false, 515), 'errors');
        yield "
                            </div>
                            <div class=\"form-group\">
                                ";
        // line 518
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 518, $this->source); })()), "diagnostic", [], "any", false, false, false, 518), 'label');
        yield "
                                ";
        // line 519
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 519, $this->source); })()), "diagnostic", [], "any", false, false, false, 519), 'widget');
        yield "
                                ";
        // line 520
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 520, $this->source); })()), "diagnostic", [], "any", false, false, false, 520), 'errors');
        yield "
                            </div>
                            <div class=\"form-group\">
                                ";
        // line 523
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 523, $this->source); })()), "traitement", [], "any", false, false, false, 523), 'label');
        yield "
                                ";
        // line 524
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 524, $this->source); })()), "traitement", [], "any", false, false, false, 524), 'widget');
        yield "
                                ";
        // line 525
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 525, $this->source); })()), "traitement", [], "any", false, false, false, 525), 'errors');
        yield "
                            </div>
                            <div class=\"form-group\">
                                ";
        // line 528
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 528, $this->source); })()), "recommandations", [], "any", false, false, false, 528), 'label');
        yield "
                                ";
        // line 529
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 529, $this->source); })()), "recommandations", [], "any", false, false, false, 529), 'widget');
        yield "
                                ";
        // line 530
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 530, $this->source); })()), "recommandations", [], "any", false, false, false, 530), 'errors');
        yield "
                            </div>
                            <div class=\"form-group\">
                                ";
        // line 533
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 533, $this->source); })()), "notes", [], "any", false, false, false, 533), 'label');
        yield "
                                ";
        // line 534
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 534, $this->source); })()), "notes", [], "any", false, false, false, 534), 'widget');
        yield "
                                ";
        // line 535
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 535, $this->source); })()), "notes", [], "any", false, false, false, 535), 'errors');
        yield "
                            </div>
                            <div class=\"modal-form-actions\">
                                <button type=\"button\" class=\"btn-form-cancel\" onclick=\"closeCreateModal()\">Annuler</button>
                                <button type=\"submit\" class=\"btn-form-submit\"><i class=\"fa fa-check\" style=\"margin-right:6px;\"></i> Enregistrer</button>
                            </div>
                        ";
        // line 541
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 541, $this->source); })()), 'form_end');
        yield "
                    </div>
                </div>

                <!-- Edit Modal -->
                <div class=\"modal-create-overlay\" id=\"editModal\">
                    <div class=\"modal-create-box\">
                        <div class=\"modal-create-header\">
                            <div class=\"modal-create-title\">Modifier la fiche</div>
                            <button class=\"modal-close-btn\" onclick=\"closeEditModal()\" type=\"button\"><i class=\"fa fa-times\"></i></button>
                        </div>
                        ";
        // line 552
        if (array_key_exists("editForm", $context)) {
            // line 553
            yield "                            ";
            yield             $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["editForm"]) || array_key_exists("editForm", $context) ? $context["editForm"] : (function () { throw new RuntimeError('Variable "editForm" does not exist.', 553, $this->source); })()), 'form_start', ["action" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_fiche_edit", ["id" => (isset($context["editFicheId"]) || array_key_exists("editFicheId", $context) ? $context["editFicheId"] : (function () { throw new RuntimeError('Variable "editFicheId" does not exist.', 553, $this->source); })())]), "method" => "POST", "attr" => ["novalidate" => "novalidate"]]);
            yield "
                             ";
            // line 554
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 554, $this->source); })()), 'errors');
            yield "
                                <div class=\"form-group\">
                                    ";
            // line 556
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editForm"]) || array_key_exists("editForm", $context) ? $context["editForm"] : (function () { throw new RuntimeError('Variable "editForm" does not exist.', 556, $this->source); })()), "rendezVous", [], "any", false, false, false, 556), 'label');
            yield "
                                    ";
            // line 557
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editForm"]) || array_key_exists("editForm", $context) ? $context["editForm"] : (function () { throw new RuntimeError('Variable "editForm" does not exist.', 557, $this->source); })()), "rendezVous", [], "any", false, false, false, 557), 'widget');
            yield "
                                    ";
            // line 558
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editForm"]) || array_key_exists("editForm", $context) ? $context["editForm"] : (function () { throw new RuntimeError('Variable "editForm" does not exist.', 558, $this->source); })()), "rendezVous", [], "any", false, false, false, 558), 'errors');
            yield "
                                </div>
                                <div class=\"form-group\">
                                    ";
            // line 561
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editForm"]) || array_key_exists("editForm", $context) ? $context["editForm"] : (function () { throw new RuntimeError('Variable "editForm" does not exist.', 561, $this->source); })()), "probleme_principal", [], "any", false, false, false, 561), 'label');
            yield "
                                    ";
            // line 562
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editForm"]) || array_key_exists("editForm", $context) ? $context["editForm"] : (function () { throw new RuntimeError('Variable "editForm" does not exist.', 562, $this->source); })()), "probleme_principal", [], "any", false, false, false, 562), 'widget');
            yield "
                                    ";
            // line 563
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editForm"]) || array_key_exists("editForm", $context) ? $context["editForm"] : (function () { throw new RuntimeError('Variable "editForm" does not exist.', 563, $this->source); })()), "probleme_principal", [], "any", false, false, false, 563), 'errors');
            yield "
                                </div>
                                <div class=\"form-group\">
                                    ";
            // line 566
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editForm"]) || array_key_exists("editForm", $context) ? $context["editForm"] : (function () { throw new RuntimeError('Variable "editForm" does not exist.', 566, $this->source); })()), "diagnostic", [], "any", false, false, false, 566), 'label');
            yield "
                                    ";
            // line 567
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editForm"]) || array_key_exists("editForm", $context) ? $context["editForm"] : (function () { throw new RuntimeError('Variable "editForm" does not exist.', 567, $this->source); })()), "diagnostic", [], "any", false, false, false, 567), 'widget');
            yield "
                                    ";
            // line 568
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editForm"]) || array_key_exists("editForm", $context) ? $context["editForm"] : (function () { throw new RuntimeError('Variable "editForm" does not exist.', 568, $this->source); })()), "diagnostic", [], "any", false, false, false, 568), 'errors');
            yield "
                                </div>
                                <div class=\"form-group\">
                                    ";
            // line 571
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editForm"]) || array_key_exists("editForm", $context) ? $context["editForm"] : (function () { throw new RuntimeError('Variable "editForm" does not exist.', 571, $this->source); })()), "traitement", [], "any", false, false, false, 571), 'label');
            yield "
                                    ";
            // line 572
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editForm"]) || array_key_exists("editForm", $context) ? $context["editForm"] : (function () { throw new RuntimeError('Variable "editForm" does not exist.', 572, $this->source); })()), "traitement", [], "any", false, false, false, 572), 'widget');
            yield "
                                    ";
            // line 573
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editForm"]) || array_key_exists("editForm", $context) ? $context["editForm"] : (function () { throw new RuntimeError('Variable "editForm" does not exist.', 573, $this->source); })()), "traitement", [], "any", false, false, false, 573), 'errors');
            yield "
                                </div>
                                <div class=\"form-group\">
                                    ";
            // line 576
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editForm"]) || array_key_exists("editForm", $context) ? $context["editForm"] : (function () { throw new RuntimeError('Variable "editForm" does not exist.', 576, $this->source); })()), "recommandations", [], "any", false, false, false, 576), 'label');
            yield "
                                    ";
            // line 577
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editForm"]) || array_key_exists("editForm", $context) ? $context["editForm"] : (function () { throw new RuntimeError('Variable "editForm" does not exist.', 577, $this->source); })()), "recommandations", [], "any", false, false, false, 577), 'widget');
            yield "
                                    ";
            // line 578
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editForm"]) || array_key_exists("editForm", $context) ? $context["editForm"] : (function () { throw new RuntimeError('Variable "editForm" does not exist.', 578, $this->source); })()), "recommandations", [], "any", false, false, false, 578), 'errors');
            yield "
                                </div>
                                <div class=\"form-group\">
                                    ";
            // line 581
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editForm"]) || array_key_exists("editForm", $context) ? $context["editForm"] : (function () { throw new RuntimeError('Variable "editForm" does not exist.', 581, $this->source); })()), "notes", [], "any", false, false, false, 581), 'label');
            yield "
                                    ";
            // line 582
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editForm"]) || array_key_exists("editForm", $context) ? $context["editForm"] : (function () { throw new RuntimeError('Variable "editForm" does not exist.', 582, $this->source); })()), "notes", [], "any", false, false, false, 582), 'widget');
            yield "
                                    ";
            // line 583
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editForm"]) || array_key_exists("editForm", $context) ? $context["editForm"] : (function () { throw new RuntimeError('Variable "editForm" does not exist.', 583, $this->source); })()), "notes", [], "any", false, false, false, 583), 'errors');
            yield "
                                </div>
                                <div class=\"modal-form-actions\">
                                    <button type=\"button\" class=\"btn-form-cancel\" onclick=\"closeEditModal()\">Annuler</button>
                                    <button type=\"submit\" class=\"btn-form-submit\"><i class=\"fa fa-check\" style=\"margin-right:6px;\"></i> Enregistrer</button>
                                </div>
                            ";
            // line 589
            yield             $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["editForm"]) || array_key_exists("editForm", $context) ? $context["editForm"] : (function () { throw new RuntimeError('Variable "editForm" does not exist.', 589, $this->source); })()), 'form_end');
            yield "
                        ";
        }
        // line 591
        yield "                    </div>
                </div>

                <script>
                    function filterTable() {
                        var search = document.getElementById('searchInput').value.toLowerCase();
                        var rows = document.querySelectorAll('.fiche-row');
                        var visible = 0;
                        rows.forEach(function(row) {
                            var text = row.innerText.toLowerCase();
                            if (text.includes(search)) { row.style.display = ''; visible++; }
                            else { row.style.display = 'none'; }
                        });
                        var countEl = document.getElementById('tableCount');
                        if (countEl) countEl.textContent = visible + ' fiches affichées';
                    }

                    function openDeleteModal(id) {
                        document.getElementById('deleteModal').classList.add('active');
                        document.getElementById('deleteForm').action = '/admin/fiches/' + id + '/delete';
                        document.getElementById('deleteToken').value = 'delete-fiche-' + id;
                    }
                    function closeDeleteModal() { document.getElementById('deleteModal').classList.remove('active'); }
                    document.getElementById('deleteModal').addEventListener('click', function(e) { if (e.target === this) closeDeleteModal(); });

                    function openCreateModal() { document.getElementById('createModal').classList.add('active'); document.body.style.overflow = 'hidden'; }
                    function closeCreateModal() { document.getElementById('createModal').classList.remove('active'); document.body.style.overflow = ''; }
                    document.getElementById('createModal').addEventListener('click', function(e) { if (e.target === this) closeCreateModal(); });

                    function openEditModal(id) { window.location.href = '/admin/fiches/' + id + '/edit'; }
                    function closeEditModal() { document.getElementById('editModal').classList.remove('active'); document.body.style.overflow = ''; }
                    document.getElementById('editModal').addEventListener('click', function(e) { if (e.target === this) closeEditModal(); });

                    ";
        // line 624
        if ((array_key_exists("showCreateModal", $context) && (isset($context["showCreateModal"]) || array_key_exists("showCreateModal", $context) ? $context["showCreateModal"] : (function () { throw new RuntimeError('Variable "showCreateModal" does not exist.', 624, $this->source); })()))) {
            // line 625
            yield "                        document.addEventListener('DOMContentLoaded', function() { openCreateModal(); });
                    ";
        }
        // line 627
        yield "                    ";
        if ((array_key_exists("showEditModal", $context) && (isset($context["showEditModal"]) || array_key_exists("showEditModal", $context) ? $context["showEditModal"] : (function () { throw new RuntimeError('Variable "showEditModal" does not exist.', 627, $this->source); })()))) {
            // line 628
            yield "                        document.addEventListener('DOMContentLoaded', function() {
                            document.getElementById('editModal').classList.add('active');
                            document.body.style.overflow = 'hidden';
                        });
                    ";
        }
        // line 633
        yield "                </script>

                </div>
            </div>
        </div>
    </div>
</div>
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
        return "back/fiches_liste.html.twig";
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
        return array (  984 => 633,  977 => 628,  974 => 627,  970 => 625,  968 => 624,  933 => 591,  928 => 589,  919 => 583,  915 => 582,  911 => 581,  905 => 578,  901 => 577,  897 => 576,  891 => 573,  887 => 572,  883 => 571,  877 => 568,  873 => 567,  869 => 566,  863 => 563,  859 => 562,  855 => 561,  849 => 558,  845 => 557,  841 => 556,  836 => 554,  831 => 553,  829 => 552,  815 => 541,  806 => 535,  802 => 534,  798 => 533,  792 => 530,  788 => 529,  784 => 528,  778 => 525,  774 => 524,  770 => 523,  764 => 520,  760 => 519,  756 => 518,  750 => 515,  746 => 514,  742 => 513,  736 => 510,  732 => 509,  728 => 508,  723 => 506,  719 => 505,  691 => 479,  680 => 471,  677 => 470,  675 => 469,  669 => 465,  649 => 450,  647 => 449,  635 => 442,  628 => 438,  622 => 435,  613 => 429,  606 => 425,  602 => 424,  598 => 423,  594 => 422,  590 => 421,  587 => 420,  583 => 418,  575 => 415,  571 => 414,  567 => 412,  565 => 411,  561 => 409,  556 => 408,  521 => 376,  511 => 369,  501 => 362,  232 => 96,  225 => 92,  216 => 88,  208 => 83,  186 => 64,  181 => 62,  163 => 47,  158 => 45,  154 => 44,  149 => 42,  132 => 30,  122 => 23,  110 => 14,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'back/base.html.twig' %}

{% block title %}Liste des Fiches de Consultation{% endblock %}

{% block body %}
<div class=\"full_container\">
    <div class=\"inner_container\">

        <!-- Sidebar (identique) -->
        <nav id=\"sidebar\">
            <div class=\"sidebar_blog_1\">
                <div class=\"sidebar-header\">
                    <div class=\"logo_section\">
                        <a href=\"#\"><img class=\"logo_icon img-responsive\" src=\"{{ asset('back/images/logo/logo_icon1.png') }}\" alt=\"logo\" /></a>
                    </div>
                </div>
                     <div class=\"sidebar_user_info\">
    <div class=\"icon_setting\"></div>
    <div class=\"user_profle_side\">
        <div class=\"user_img\">
           
                <img class=\"img-responsive\"
                  src=\"{{ asset('back/images/layout_img/user_img.jpg') }}\" 
                     alt=\"user\"
                     style=\"width:70px; height:70px; border-radius:50%; object-fit:cover; border:3px solid #3c943c; display:block; margin:0 auto 10px auto;\">
            
        </div>
        <div class=\"user_info\" style=\"text-align:center;\">
            <h6 style=\"color:white; font-size:0.95rem; font-weight:600; margin-bottom:4px;\">
                {{ app.user.firstname }} {{ app.user.lastname }}
            </h6>
            <p style=\"margin:0;\">
                <span class=\"online_animation\"></span> En ligne
            </p>
        </div>
    </div>
</div>
            </div>
            <div class=\"sidebar_blog_2\">
            <h4></h4>
                <ul class=\"list-unstyled components\">
                    <li><a href=\"{{ path('admin_tableau') }}\"><i class=\"fa fa-dashboard yellow_color\"></i><span>Tableau de bord</span></a></li>
                    <li><a href=\"#\"><i class=\"fa fa-users blue1_color\"></i><span>Utilisateurs</span></a></li>
                    <li><a href=\"{{ path('admin_rendezvous') }}\"><i class=\"fa fa-calendar orange_color\"></i><span>Rendez-vous</span></a></li>
                    <li class=\"active\"><a href=\"{{ path('admin_fiches') }}\"><i class=\"fa fa-file-text blue1_color\"></i><span>Fiches consultation</span></a></li>
                    <li><a href=\"#\"><i class=\"fa fa-book purple_color2\"></i><span>Contenu psychologique</span></a></li>
                     <li class=\"active\"><a href=\"{{ path('app_test_index') }}\"><i class=\"fa fa-check-square green_color\"></i><span>Tests</span></a></li>
                    <li><a href=\"#\"><i class=\"fa fa-calendar-check-o red_color\"></i><span>Événements</span></a></li>
                </ul>
            </div>
        </nav>

        <div id=\"content\">
            <!-- Topbar -->
            <div class=\"topbar\">
                <nav class=\"navbar navbar-expand-lg navbar-light\">
                    <div class=\"full\">
                        <button type=\"button\" id=\"sidebarCollapse\" class=\"sidebar_toggle\">
                            <i class=\"fa fa-bars\"></i>
                        </button>
                        <div class=\"logo_section\">
                            <a href=\"{{ path('admin_dashboard') }}\" style=\"display:flex; align-items:center; text-decoration:none;\">
                                <img class=\"img-responsive\"
                                     src=\"{{ asset('back/images/logo/logo1.png') }}\"
                                     alt=\"logo\"
                                     style=\"width:40px; height:40px; margin-right:10px;\" />
                                <span style=\"font-size:20px; font-weight:bold; color:#3c943c;\">
                                    Nafseyti
                                </span>
                            </a>
                        </div>
                        <div class=\"right_topbar\">
                            <div class=\"icon_info\">
                                <ul>
                                    <li><a href=\"#\"><i class=\"fa fa-bell-o\"></i><span class=\"badge\">2</span></a></li>
                                    <li><a href=\"#\"><i class=\"fa fa-question-circle\"></i></a></li>
                                    <li><a href=\"#\"><i class=\"fa fa-envelope-o\"></i><span class=\"badge\">3</span></a></li>
                                </ul>
                                <ul class=\"user_profile_dd\">
                                    <li>
                                        <a class=\"dropdown-toggle\" data-toggle=\"dropdown\">
    <img class=\"img-responsive rounded-circle\"
         src=\"{{ asset('back/images/layout_img/user_img.jpg') }}\" 
         alt=\"photo\"
         style=\"width:35px; height:35px; object-fit:cover; border-radius:50%;\">

    <span class=\"name_user\">
        {{ app.user.firstname }} {{ app.user.lastname }}
    </span>
</a>
                                        <div class=\"dropdown-menu\">
    <a class=\"dropdown-item\" href=\"{{ path('app_profile') }}\">
        <i class=\"fa fa-user\"></i> Mon Profil
    </a>
    <div class=\"dropdown-divider\"></div>
    <a class=\"dropdown-item\" href=\"{{ path('app_logout') }}\">
        <span>Se déconnecter</span> <i class=\"fa fa-sign-out\"></i>
    </a>
</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <div class=\"midde_cont\">
                <div class=\"container-fluid\">
                <link href=\"https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@300;400;500&display=swap\" rel=\"stylesheet\">
                <style>
                    /* ── Variables couleurs indigo/bleu ── */
                    :root {
                        --fc-dark:    #1a1e3a;
                        --fc-mid:     #2a3080;
                        --fc-accent:  #7c8fdc;
                        --fc-light:   #e8eaf6;
                        --fc-bg:      #f8f9fe;
                        --fc-border:  #dde0f0;
                        --fc-text:    #2a2d4a;
                    }
                    .fc-wrap { font-family: 'DM Sans', sans-serif; padding: 10px 0 50px; }

                    .fc-header { display:flex; align-items:center; justify-content:space-between; margin-bottom:28px; }
                    .fc-header-left .page-eyebrow { font-size:10px; letter-spacing:2px; text-transform:uppercase; color:#a0a0b0; margin-bottom:4px; }
                    .fc-header-left h2 { font-family:'DM Serif Display',serif; font-size:32px; color:var(--fc-dark); margin:0; line-height:1.1; }
                    .fc-header-left h2 em { color:var(--fc-mid); font-style:italic; }

                    .btn-creer-fc {
                        display:inline-flex; align-items:center; gap:10px;
                        padding:13px 24px; border-radius:50px; font-size:14px; font-weight:500;
                        cursor:pointer; font-family:'DM Sans',sans-serif;
                        background:transparent; border:2px solid var(--fc-mid); color:var(--fc-mid);
                        transition:0.25s;
                    }
                    .btn-creer-fc:hover { background:rgba(42,48,128,0.08); transform:translateY(-2px); }
                    .btn-creer-fc .plus-icon {
                        width:22px; height:22px; border:1px solid var(--fc-mid); border-radius:50%;
                        display:flex; align-items:center; justify-content:center; background:transparent;
                    }

                    /* Stats */
                    .stats-bar { display:flex; gap:14px; margin-bottom:24px; }
                    .stat-chip { display:flex; align-items:center; gap:10px; background:var(--fc-bg); border:1px solid var(--fc-border); border-radius:14px; padding:12px 18px; flex:1; }
                    .stat-chip-icon { width:38px; height:38px; border-radius:10px; display:flex; align-items:center; justify-content:center; font-size:16px; flex-shrink:0; }
                    .chip-indigo { background:#e8eaf6; } .chip-teal { background:#e0f7fa; } .chip-purple { background:#f3e5f5; }
                    .stat-chip-val { font-size:22px; font-weight:500; color:var(--fc-dark); line-height:1; }
                    .stat-chip-lbl { font-size:11px; color:#999; margin-top:2px; }

                    /* Search */
                    .search-row { display:flex; align-items:center; gap:12px; margin-bottom:20px; }
                    .search-box { flex:1; position:relative; }
                    .search-box input { width:100%; padding:11px 16px 11px 42px; border:1px solid var(--fc-border); border-radius:12px; font-size:13px; font-family:'DM Sans',sans-serif; background:var(--fc-bg); color:var(--fc-dark); outline:none; transition:border-color 0.2s; }
                    .search-box input:focus { border-color:var(--fc-mid); }
                    .search-icon { position:absolute; left:14px; top:50%; transform:translateY(-50%); color:#bbb; font-size:13px; }

                    /* ================= TABLE ================= */
                    .table-card {
                        background: var(--fc-bg);
                        border: 1px solid var(--fc-border);
                        border-radius: 20px;
                        overflow-x: auto;
                        overflow-y: hidden;
                    }

                    .table-card table {
                        width: 100%;
                        min-width: 1400px;
                        border-collapse: collapse;
                        table-layout: fixed;
                    }

                    /* Header */
                    .table-card thead tr {
                        background: var(--fc-dark);
                    }

                    .table-card thead th {
                        padding: 15px 18px;
                        text-align: left;
                        font-size: 10px;
                        letter-spacing: 1.5px;
                        text-transform: uppercase;
                        color: var(--fc-accent);
                        font-weight: 500;
                        white-space: nowrap;
                    }

                    /* Body */
                    .table-card tbody tr {
                        border-bottom: 1px solid var(--fc-border);
                        transition: background 0.2s;
                    }

                    .table-card tbody tr:hover {
                        background: #eef0fb;
                    }

                    .table-card tbody td {
                        padding: 14px 18px;
                        font-size: 13px;
                        color: #3a3a5a;
                        vertical-align: top;
                    }

                    /* Fixed column widths */
                    .table-card th:nth-child(1),
                    .table-card td:nth-child(1) {
                        width: 180px;
                    }

                    .table-card th:nth-child(2),
                    .table-card td:nth-child(2),
                    .table-card th:nth-child(3),
                    .table-card td:nth-child(3),
                    .table-card th:nth-child(4),
                    .table-card td:nth-child(4),
                    .table-card th:nth-child(5),
                    .table-card td:nth-child(5),
                    .table-card th:nth-child(6),
                    .table-card td:nth-child(6) {
                        width: 180px;
                    }

                    .table-card th:nth-child(7),
                    .table-card td:nth-child(7) {
                        width: 150px;
                    }

                    .table-card th:nth-child(8),
                    .table-card td:nth-child(8) {
                        width: 100px;
                        text-align: center;
                    }

                    /* Text cells */
                    .text-truncate-cell {
                        max-height: 90px;
                        overflow-y: auto;
                        overflow-x: hidden;
                        word-break: break-word;
                        white-space: normal;
                        line-height: 1.5;
                        font-size: 12px;
                        color: #666;
                        padding-right: 5px;
                    }

                    /* Scrollbar */
                    .text-truncate-cell::-webkit-scrollbar {
                        width: 5px;
                    }

                    .text-truncate-cell::-webkit-scrollbar-thumb {
                        background: #c8cce5;
                        border-radius: 10px;
                    }
    

                    /* Badges */
                    .date-pill { display:inline-flex; align-items:center; gap:6px; background:var(--fc-light); color:var(--fc-mid); padding:5px 12px; border-radius:20px; font-size:12px; font-weight:500; }
                    .text-truncate-cell {
                        max-width: 250px;
                        max-height: 80px;
                        overflow-y: auto;
                        white-space: normal;
                        word-wrap: break-word;
                        font-size: 12px;
                        color: #666;
                        line-height: 1.5;
                    }
                    /* Action buttons */
                    .action-btns { display:flex; gap:8px; align-items:center; }
                    .btn-edit, .btn-del { width:34px; height:34px; border-radius:10px; display:flex; align-items:center; justify-content:center; border:none; cursor:pointer; transition:0.2s; }
                    .btn-edit { background:#e8eaf6; color:var(--fc-mid); }
                    .btn-edit:hover { background:var(--fc-mid); color:white; transform:scale(1.1); }
                    .btn-del { background:#ffe4e4; color:#aa0000; }
                    .btn-del:hover { background:#aa0000; color:white; transform:scale(1.1); }

                    /* Empty state */
                    .empty-state { text-align:center; padding:60px 20px; }
                    .empty-state p { font-family:'DM Serif Display',serif; font-size:18px; color:#bbb; }

                    /* Pagination */
                    .pagination-row { display:flex; align-items:center; justify-content:space-between; padding:16px 20px; border-top:1px solid var(--fc-border); font-size:12px; color:#999; }
                    .pag-btns { display:flex; gap:6px; }
                    .pag-btn { width:32px; height:32px; border-radius:8px; display:flex; align-items:center; justify-content:center; font-size:12px; border:1px solid var(--fc-border); background:var(--fc-bg); color:#555; cursor:pointer; text-decoration:none; transition:0.2s; }
                    .pag-btn:hover, .pag-btn.active { background:var(--fc-dark); color:var(--fc-accent); border-color:var(--fc-dark); }

                    /* Delete modal */
                    .modal-overlay { display:none; position:fixed; inset:0; background:rgba(0,0,0,0.45); z-index:9999; align-items:center; justify-content:center; }
                    .modal-overlay.active { display:flex; }
                    .modal-box { background:var(--fc-bg); border-radius:20px; padding:36px 32px; max-width:380px; width:90%; text-align:center; box-shadow:0 20px 60px rgba(0,0,0,0.15); }
                    .modal-icon { width:60px; height:60px; background:#ffe4e4; border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 16px; font-size:24px; color:#aa0000; }
                    .modal-title { font-family:'DM Serif Display',serif; font-size:20px; color:var(--fc-dark); margin-bottom:8px; }
                    .modal-sub { font-size:13px; color:#999; margin-bottom:24px; }
                    .modal-actions { display:flex; gap:10px; justify-content:center; }
                    .modal-cancel { padding:10px 24px; border-radius:50px; border:1px solid var(--fc-border); background:var(--fc-bg); font-size:13px; font-family:'DM Sans',sans-serif; cursor:pointer; color:#555; transition:0.2s; }
                    .modal-cancel:hover { background:#f0ece4; }
                    .modal-confirm { padding:10px 24px; border-radius:50px; border:none; background:#aa0000; color:white; font-size:13px; font-family:'DM Sans',sans-serif; cursor:pointer; transition:0.2s; }
                    .modal-confirm:hover { background:#cc0000; }

                    /* Create/Edit modal */
                    .modal-create-overlay { display:none; position:fixed; inset:0; background:rgba(0,0,0,0.45); z-index:9999; align-items:center; justify-content:center; }
                    .modal-create-overlay.active { display:flex; }
                    .modal-create-box { background:var(--fc-bg); border-radius:20px; padding:36px 32px; max-width:580px; width:95%; max-height:90vh; overflow-y:auto; box-shadow:0 20px 60px rgba(0,0,0,0.15); }
                    .modal-create-header { display:flex; align-items:center; justify-content:space-between; margin-bottom:24px; }
                    .modal-create-title { font-family:'DM Serif Display',serif; font-size:22px; color:var(--fc-dark); }
                    .modal-close-btn { width:34px; height:34px; border-radius:10px; border:1px solid var(--fc-border); background:var(--fc-bg); cursor:pointer; display:flex; align-items:center; justify-content:center; color:#999; font-size:16px; transition:0.2s; }
                    .modal-close-btn:hover { background:#ffe4e4; color:#aa0000; }
                    .form-group { margin-bottom:16px; }
                    .form-group label { display:block; font-size:11px; letter-spacing:1px; text-transform:uppercase; color:#999; margin-bottom:6px; font-weight:500; }
                    .form-group select, .form-group textarea, .form-group input { width:100%; padding:11px 14px; border:1px solid var(--fc-border); border-radius:12px; font-size:13px; font-family:'DM Sans',sans-serif; background:var(--fc-bg); color:var(--fc-dark); outline:none; transition:border-color 0.2s; }
                    .form-group select:focus, .form-group textarea:focus, .form-group input:focus { border-color:var(--fc-mid); }
                    .form-group textarea { resize:vertical; }
                    .modal-form-actions { display:flex; gap:10px; justify-content:flex-end; margin-top:24px; }
                    .btn-form-cancel { padding:11px 24px; border-radius:50px; border:1px solid var(--fc-border); background:var(--fc-bg); font-size:13px; font-family:'DM Sans',sans-serif; cursor:pointer; color:#555; transition:0.2s; }
                    .btn-form-cancel:hover { background:#f0ece4; }
                    .btn-form-submit { padding:11px 28px; border-radius:50px; border:none; background:var(--fc-dark); color:var(--fc-accent); font-size:13px; font-family:'DM Sans',sans-serif; cursor:pointer; transition:0.2s; }
                    .btn-form-submit:hover { background:var(--fc-mid); }

                    /* Erreurs */
                    .form-group ul { list-style:none; padding:0; margin:4px 0 0; }
                    .form-group ul li { font-size:11px; color:#aa0000; background:#ffe4e4; border-radius:8px; padding:5px 10px; margin-top:4px; display:flex; align-items:center; gap:5px; }
                    .form-group ul li::before { content:\"⚠\"; font-size:11px; }
                    .btn-pdf {
                        width: 34px; height: 34px; border-radius: 10px;
                        display: flex; align-items: center; justify-content: center;
                        border: none; cursor: pointer; transition: 0.2s;
                        background: #fff3e0; color: #e65100;
                        text-decoration: none;
                    }
                    .btn-pdf:hover {
                        background: #e65100; color: white;
                        transform: scale(1.1);
                        text-decoration: none;
                    }
                </style>

                <div class=\"fc-wrap\">
                    <!-- Header -->
                    <div class=\"fc-header\">
                        <div class=\"fc-header-left\">
                            <div class=\"page-eyebrow\">Nafseyti · Administration</div>
                            <h2>Fiches de <em>Consultation</em></h2>
                        </div>
                        <button type=\"button\" class=\"btn-creer-fc\" onclick=\"openCreateModal()\">
                            <span class=\"plus-icon\">
                                <svg width=\"12\" height=\"12\" viewBox=\"0 0 12 12\">
                                    <path d=\"M6 2V10M2 6H10\" stroke=\"var(--fc-mid)\" stroke-width=\"2\" stroke-linecap=\"round\"/>
                                </svg>
                            </span>
                            Nouvelle fiche
                        </button>
                    </div>

                    <!-- Stats -->
                    <div class=\"stats-bar\">
                        <div class=\"stat-chip\">
                            <div class=\"stat-chip-icon chip-indigo\"><i class=\"fa fa-file-text\" style=\"color:var(--fc-mid);\"></i></div>
                            <div>
                                <div class=\"stat-chip-val\">{{ fiches|length }}</div>
                                <div class=\"stat-chip-lbl\">Total fiches</div>
                            </div>
                        </div>
                        <div class=\"stat-chip\">
                            <div class=\"stat-chip-icon chip-teal\"><i class=\"fa fa-stethoscope\" style=\"color:#00838f;\"></i></div>
                            <div>
                                <div class=\"stat-chip-val\">{{ fiches|filter(f => f.diagnostic is not null and f.diagnostic != '')|length }}</div>
                                <div class=\"stat-chip-lbl\">Avec diagnostic</div>
                            </div>
                        </div>
                        <div class=\"stat-chip\">
                            <div class=\"stat-chip-icon chip-purple\"><i class=\"fa fa-pills\" style=\"color:#7b1fa2;\"></i></div>
                            <div>
                                <div class=\"stat-chip-val\">{{ fiches|filter(f => f.traitement is not null and f.traitement != '')|length }}</div>
                                <div class=\"stat-chip-lbl\">Avec traitement</div>
                            </div>
                        </div>
                    </div>

                    <!-- Search -->
                    <div class=\"search-row\">
                        <div class=\"search-box\">
                            <i class=\"fa fa-search search-icon\"></i>
                            <input type=\"text\" id=\"searchInput\" placeholder=\"Rechercher par médecin, diagnostic, traitement...\" onkeyup=\"filterTable()\" />
                        </div>
                    </div>

                    <!-- Table -->
                            <div class=\"table-card\">
                <div style=\"overflow-x:auto;\">
                        
                        <table id=\"ficheTable\">
                            <thead>
                                <tr>
                                    <th>Rendez-vous</th>
                                    <th>Problème principal</th>
                                    <th>Diagnostic</th>
                                    <th>Traitement</th>
                                    <th>Recommandations</th>
                                    <th>Notes</th>
                                    <th>Date création</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                {% for fiche in fiches %}
                                <tr class=\"fiche-row\">
                                    <td>
                                        {% if fiche.rendezVous %}
                                            <span class=\"date-pill\">
                                                <i class=\"fa fa-calendar\" style=\"font-size:11px;\"></i>
                                                {{ fiche.rendezVous.dateRendezVous }}
                                                — Dr. {{ fiche.rendezVous.medecin.firstname }} {{ fiche.rendezVous.medecin.lastname }}
                                            </span>
                                        {% else %}
                                            <span style=\"color:#bbb;font-size:12px;\">—</span>
                                        {% endif %}
                                    </td>
                                    <td><div class=\"text-truncate-cell\">{{ fiche.problemePrincipal ?? '—' }}</div></td>
                                    <td><div class=\"text-truncate-cell\">{{ fiche.diagnostic ?? '—' }}</div></td>
                                    <td><div class=\"text-truncate-cell\">{{ fiche.traitement ?? '—' }}</div></td>
                                    <td><div class=\"text-truncate-cell\">{{ fiche.recommandations ?? '—' }}</div></td>
                                    <td><div class=\"text-truncate-cell\">{{ fiche.notes ?? '—' }}</div></td>
                                    <td>
                                        <span class=\"date-pill\">
                                            <i class=\"fa fa-clock-o\" style=\"font-size:11px;\"></i>
                                            {{ fiche.createdAt|date('d/m/Y H:i') }}
                                        </span>
                                    </td>
                                   
                                        <td>
                                            <div class=\"action-btns\">
                                                <button class=\"btn-edit\" title=\"Modifier\" onclick=\"openEditModal({{ fiche.id }})\">
                                                    <i class=\"fa fa-pencil\" style=\"font-size:13px;\"></i>
                                                </button>
                                                <a href=\"{{ path('admin_fiche_pdf', {'id': fiche.id}) }}\"
                                                class=\"btn-pdf\" title=\"Télécharger PDF\" target=\"_blank\">
                                                    <i class=\"fa fa-file-pdf-o\" style=\"font-size:13px;\"></i>
                                                </a>
                                                <button class=\"btn-del\" title=\"Supprimer\" onclick=\"openDeleteModal({{ fiche.id }})\">
                                                    <i class=\"fa fa-trash\" style=\"font-size:13px;\"></i>
                                                </button>
                                            </div>
                                        </td>
                                   
                                </tr>
                                {% else %}
                                <tr>
                                    <td colspan=\"6\">
                                        <div class=\"empty-state\">
                                            <svg width=\"64\" height=\"64\" viewBox=\"0 0 64 64\" fill=\"none\">
                                                <circle cx=\"32\" cy=\"32\" r=\"30\" fill=\"#eef0fb\" stroke=\"#dde0f0\" stroke-width=\"1\"/>
                                                <rect x=\"18\" y=\"16\" width=\"28\" height=\"32\" rx=\"4\" fill=\"#dde0f0\"/>
                                                <rect x=\"22\" y=\"22\" width=\"20\" height=\"3\" rx=\"1\" fill=\"white\"/>
                                                <rect x=\"22\" y=\"28\" width=\"14\" height=\"3\" rx=\"1\" fill=\"white\"/>
                                                <rect x=\"22\" y=\"34\" width=\"16\" height=\"3\" rx=\"1\" fill=\"white\"/>
                                            </svg>
                                            <p>Aucune fiche de consultation</p>
                                        </div>
                                    </td>
                                </tr>
                                {% endfor %}
                            </tbody>
                        </table>
                        </div>

                        {% if fiches|length > 0 %}
                        <div class=\"pagination-row\">
                            <span id=\"tableCount\">{{ fiches|length }} fiches au total</span>
                            <div class=\"pag-btns\">
                                <a href=\"#\" class=\"pag-btn\"><i class=\"fa fa-chevron-left\" style=\"font-size:10px;\"></i></a>
                                <a href=\"#\" class=\"pag-btn active\">1</a>
                                <a href=\"#\" class=\"pag-btn\"><i class=\"fa fa-chevron-right\" style=\"font-size:10px;\"></i></a>
                            </div>
                        </div>
                        {% endif %}
                    </div>
                </div>

                <!-- Delete Modal -->
                <div class=\"modal-overlay\" id=\"deleteModal\">
                    <div class=\"modal-box\">
                        <div class=\"modal-icon\"><i class=\"fa fa-trash\"></i></div>
                        <div class=\"modal-title\">Supprimer cette fiche ?</div>
                        <div class=\"modal-sub\">Cette action est irréversible.</div>
                        <div class=\"modal-actions\">
                            <button class=\"modal-cancel\" onclick=\"closeDeleteModal()\">Annuler</button>
                            <form id=\"deleteForm\" method=\"post\" style=\"display:inline;\">
                                <input type=\"hidden\" name=\"_token\" id=\"deleteToken\">
                                <button type=\"submit\" class=\"modal-confirm\">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Create Modal -->
                <div class=\"modal-create-overlay\" id=\"createModal\">
                    <div class=\"modal-create-box\">
                        <div class=\"modal-create-header\">
                            <div class=\"modal-create-title\">Nouvelle fiche de consultation</div>
                            <button class=\"modal-close-btn\" onclick=\"closeCreateModal()\" type=\"button\"><i class=\"fa fa-times\"></i></button>
                        </div>
                        {{ form_start(createForm, {'action': path('admin_fiches'), 'method': 'POST','attr': {'novalidate': 'novalidate'}}) }}
                        {{ form_errors(createForm) }}
                            <div class=\"form-group\">
                                {{ form_label(createForm.rendezVous) }}
                                {{ form_widget(createForm.rendezVous) }}
                                {{ form_errors(createForm.rendezVous) }}
                            </div>
                            <div class=\"form-group\">
                                {{ form_label(createForm.probleme_principal) }}
                                {{ form_widget(createForm.probleme_principal) }}
                                {{ form_errors(createForm.probleme_principal) }}
                            </div>
                            <div class=\"form-group\">
                                {{ form_label(createForm.diagnostic) }}
                                {{ form_widget(createForm.diagnostic) }}
                                {{ form_errors(createForm.diagnostic) }}
                            </div>
                            <div class=\"form-group\">
                                {{ form_label(createForm.traitement) }}
                                {{ form_widget(createForm.traitement) }}
                                {{ form_errors(createForm.traitement) }}
                            </div>
                            <div class=\"form-group\">
                                {{ form_label(createForm.recommandations) }}
                                {{ form_widget(createForm.recommandations) }}
                                {{ form_errors(createForm.recommandations) }}
                            </div>
                            <div class=\"form-group\">
                                {{ form_label(createForm.notes) }}
                                {{ form_widget(createForm.notes) }}
                                {{ form_errors(createForm.notes) }}
                            </div>
                            <div class=\"modal-form-actions\">
                                <button type=\"button\" class=\"btn-form-cancel\" onclick=\"closeCreateModal()\">Annuler</button>
                                <button type=\"submit\" class=\"btn-form-submit\"><i class=\"fa fa-check\" style=\"margin-right:6px;\"></i> Enregistrer</button>
                            </div>
                        {{ form_end(createForm) }}
                    </div>
                </div>

                <!-- Edit Modal -->
                <div class=\"modal-create-overlay\" id=\"editModal\">
                    <div class=\"modal-create-box\">
                        <div class=\"modal-create-header\">
                            <div class=\"modal-create-title\">Modifier la fiche</div>
                            <button class=\"modal-close-btn\" onclick=\"closeEditModal()\" type=\"button\"><i class=\"fa fa-times\"></i></button>
                        </div>
                        {% if editForm is defined %}
                            {{ form_start(editForm, {'action': path('admin_fiche_edit', {'id': editFicheId}), 'method': 'POST','attr': {'novalidate': 'novalidate'}}) }}
                             {{ form_errors(createForm) }}
                                <div class=\"form-group\">
                                    {{ form_label(editForm.rendezVous) }}
                                    {{ form_widget(editForm.rendezVous) }}
                                    {{ form_errors(editForm.rendezVous) }}
                                </div>
                                <div class=\"form-group\">
                                    {{ form_label(editForm.probleme_principal) }}
                                    {{ form_widget(editForm.probleme_principal) }}
                                    {{ form_errors(editForm.probleme_principal) }}
                                </div>
                                <div class=\"form-group\">
                                    {{ form_label(editForm.diagnostic) }}
                                    {{ form_widget(editForm.diagnostic) }}
                                    {{ form_errors(editForm.diagnostic) }}
                                </div>
                                <div class=\"form-group\">
                                    {{ form_label(editForm.traitement) }}
                                    {{ form_widget(editForm.traitement) }}
                                    {{ form_errors(editForm.traitement) }}
                                </div>
                                <div class=\"form-group\">
                                    {{ form_label(editForm.recommandations) }}
                                    {{ form_widget(editForm.recommandations) }}
                                    {{ form_errors(editForm.recommandations) }}
                                </div>
                                <div class=\"form-group\">
                                    {{ form_label(editForm.notes) }}
                                    {{ form_widget(editForm.notes) }}
                                    {{ form_errors(editForm.notes) }}
                                </div>
                                <div class=\"modal-form-actions\">
                                    <button type=\"button\" class=\"btn-form-cancel\" onclick=\"closeEditModal()\">Annuler</button>
                                    <button type=\"submit\" class=\"btn-form-submit\"><i class=\"fa fa-check\" style=\"margin-right:6px;\"></i> Enregistrer</button>
                                </div>
                            {{ form_end(editForm) }}
                        {% endif %}
                    </div>
                </div>

                <script>
                    function filterTable() {
                        var search = document.getElementById('searchInput').value.toLowerCase();
                        var rows = document.querySelectorAll('.fiche-row');
                        var visible = 0;
                        rows.forEach(function(row) {
                            var text = row.innerText.toLowerCase();
                            if (text.includes(search)) { row.style.display = ''; visible++; }
                            else { row.style.display = 'none'; }
                        });
                        var countEl = document.getElementById('tableCount');
                        if (countEl) countEl.textContent = visible + ' fiches affichées';
                    }

                    function openDeleteModal(id) {
                        document.getElementById('deleteModal').classList.add('active');
                        document.getElementById('deleteForm').action = '/admin/fiches/' + id + '/delete';
                        document.getElementById('deleteToken').value = 'delete-fiche-' + id;
                    }
                    function closeDeleteModal() { document.getElementById('deleteModal').classList.remove('active'); }
                    document.getElementById('deleteModal').addEventListener('click', function(e) { if (e.target === this) closeDeleteModal(); });

                    function openCreateModal() { document.getElementById('createModal').classList.add('active'); document.body.style.overflow = 'hidden'; }
                    function closeCreateModal() { document.getElementById('createModal').classList.remove('active'); document.body.style.overflow = ''; }
                    document.getElementById('createModal').addEventListener('click', function(e) { if (e.target === this) closeCreateModal(); });

                    function openEditModal(id) { window.location.href = '/admin/fiches/' + id + '/edit'; }
                    function closeEditModal() { document.getElementById('editModal').classList.remove('active'); document.body.style.overflow = ''; }
                    document.getElementById('editModal').addEventListener('click', function(e) { if (e.target === this) closeEditModal(); });

                    {% if showCreateModal is defined and showCreateModal %}
                        document.addEventListener('DOMContentLoaded', function() { openCreateModal(); });
                    {% endif %}
                    {% if showEditModal is defined and showEditModal %}
                        document.addEventListener('DOMContentLoaded', function() {
                            document.getElementById('editModal').classList.add('active');
                            document.body.style.overflow = 'hidden';
                        });
                    {% endif %}
                </script>

                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %}", "back/fiches_liste.html.twig", "C:\\Users\\sirine\\psy\\templates\\back\\fiches_liste.html.twig");
    }
}
