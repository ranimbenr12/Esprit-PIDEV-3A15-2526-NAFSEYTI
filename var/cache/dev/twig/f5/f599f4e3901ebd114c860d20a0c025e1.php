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

/* back/rendezvous_liste.html.twig */
class __TwigTemplate_baf290d484e5d90bbed82878a5b270c1 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/rendezvous_liste.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/rendezvous_liste.html.twig"));

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

        yield "Horaires des Médecins";
        
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

        <!-- Sidebar -->
        <nav id=\"sidebar\">
            <div class=\"sidebar_blog_1\">
                <div class=\"sidebar-header\">
                    <div class=\"logo_section\">
                        <a href=\"#\">
                            <img class=\"logo_icon img-responsive\"
                                 src=\"";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("back/images/logo/logo_icon1.png"), "html", null, true);
        yield "\"
                                 alt=\"logo\" />
                        </a>
                    </div>
                </div>
                <div class=\"sidebar_user_info\">
                    <div class=\"icon_setting\"></div>
                    <div class=\"user_profle_side\">
                        <div class=\"user_img\">
                            <img class=\"img-responsive\"
                                src=\"";
        // line 26
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("back/images/layout_img/user_img.jpg"), "html", null, true);
        yield "\"
                                alt=\"user\"
                                style=\"width:70px; height:70px; border-radius:50%; object-fit:cover; border:3px solid #3c943c; display:block; margin:0 auto 10px auto;\">
                        </div>
                        <div class=\"user_info\" style=\"text-align:center;\">
                            <h6 style=\"color:white; font-size:0.95rem; font-weight:600; margin-bottom:4px;\">
                                ";
        // line 32
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 32, $this->source); })()), "user", [], "any", false, false, false, 32), "firstname", [], "any", false, false, false, 32), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 32, $this->source); })()), "user", [], "any", false, false, false, 32), "lastname", [], "any", false, false, false, 32), "html", null, true);
        yield "
                            </h6>
                            <p style=\"margin:0;\">
                                <span class=\"online_animation\"></span> en_ligne
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"sidebar_blog_2\">
                <h4></h4>
                <ul class=\"list-unstyled components\">
                    <li>
                        <a href=\"";
        // line 45
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_tableau");
        yield "\">
                            <i class=\"fa fa-dashboard yellow_color\"></i>
                            <span>Tableau de bord</span>
                        </a>
                    </li>
                    <li><a href=\"#\"><i class=\"fa fa-users blue1_color\"></i><span>Utilisateurs</span></a></li>
                    <li class=\"active\">
                        <a href=\"";
        // line 52
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_rendezvous");
        yield "\">
                            <i class=\"fa fa-calendar orange_color\"></i>
                            <span>Rendez-vous</span>
                        </a>
                    </li>
                    <li><a href=\"#\"><i class=\"fa fa-book purple_color2\"></i><span>Contenu psychologique</span></a></li>
                    <li class=\"active\"><a href=\"";
        // line 58
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_test_index");
        yield "\"><i class=\"fa fa-check-square green_color\"></i><span>Tests</span></a></li>
                    <li><a href=\"#\"><i class=\"fa fa-calendar-check-o red_color\"></i><span>Événements</span></a></li>
                    <li><a href=\"#\"><i class=\"fa fa-line-chart yellow_color\"></i><span>Suivi personnel</span></a></li>
                </ul>
            </div>
        </nav>

        <!-- Content -->
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
        // line 76
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_dashboard");
        yield "\" style=\"display:flex; align-items:center; text-decoration:none;\">
                                <img class=\"img-responsive\"
                                     src=\"";
        // line 78
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("back/images/logo/logo1.png"), "html", null, true);
        yield "\"
                                     alt=\"logo\"
                                     style=\"width:40px; height:40px; margin-right:10px;\" />
                                <span style=\"font-size:20px; font-weight:bold; color:#3c943c;\">Nafseyti</span>
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
        // line 95
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("back/images/layout_img/user_img.jpg"), "html", null, true);
        yield "\"
                                                 alt=\"photo\"
                                                 style=\"width:35px; height:35px; object-fit:cover; border-radius:50%;\">
                                            <span class=\"name_user\">";
        // line 98
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 98, $this->source); })()), "user", [], "any", false, false, false, 98), "firstname", [], "any", false, false, false, 98), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 98, $this->source); })()), "user", [], "any", false, false, false, 98), "lastname", [], "any", false, false, false, 98), "html", null, true);
        yield "</span>
                                        </a>
                                        <div class=\"dropdown-menu\">
                                            <a class=\"dropdown-item\" href=\"";
        // line 101
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile");
        yield "\">
                                                <i class=\"fa fa-user\"></i> Mon Profil
                                            </a>
                                            <div class=\"dropdown-divider\"></div>
                                            <a class=\"dropdown-item\" href=\"";
        // line 105
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

            <!-- Main Content -->
            <div class=\"midde_cont\">
                <div class=\"container-fluid\">

                    <link href=\"https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@300;400;500&display=swap\" rel=\"stylesheet\">

                    <style>
                        .horaires-wrap {
                            font-family: 'DM Sans', sans-serif;
                            padding: 10px 0 50px;
                        }

                        /* ── Header ── */
                        .horaires-header {
                            display: flex;
                            align-items: flex-end;
                            justify-content: space-between;
                            margin-bottom: 28px;
                        }
                        .page-eyebrow {
                            font-size: 10px;
                            letter-spacing: 2px;
                            text-transform: uppercase;
                            color: #a0a090;
                            margin-bottom: 4px;
                        }
                        .horaires-header h2 {
                            font-family: 'DM Serif Display', serif;
                            font-size: 32px;
                            color: #1a2e1a;
                            margin: 0;
                            line-height: 1.1;
                        }
                        .horaires-header h2 em {
                            color: #3c8c3c;
                            font-style: italic;
                        }

                        /* ── Bouton créer ── */
                        .btn-creer {
                            display: inline-flex;
                            align-items: center;
                            gap: 10px;
                            padding: 13px 24px;
                            border-radius: 50px;
                            font-size: 14px;
                            font-weight: 500;
                            text-decoration: none;
                            cursor: pointer;
                            font-family: 'DM Sans', sans-serif;
                            background: transparent;
                            border: 2px solid #3c8c3c;
                            color: #3c8c3c;
                            transition: 0.25s;
                        }
                        .btn-creer:hover {
                            background: rgba(60,140,60,0.08);
                            color: #2a6a10;
                            border-color: #2a6a10;
                            transform: translateY(-2px);
                            text-decoration: none;
                        }
                        .btn-creer .plus-icon {
                            width: 22px; height: 22px;
                            border: 1px solid #3c8c3c;
                            border-radius: 50%;
                            display: flex; align-items: center; justify-content: center;
                            background: transparent;
                        }

                        /* ── Stats bar ── */
                        .stats-bar {
                            display: flex;
                            gap: 14px;
                            margin-bottom: 24px;
                        }
                        .stat-chip {
                            display: flex;
                            align-items: center;
                            gap: 10px;
                            background: #fffdf8;
                            border: 1px solid #e8e2d8;
                            border-radius: 14px;
                            padding: 12px 18px;
                            flex: 1;
                        }
                        .stat-chip-icon {
                            width: 38px; height: 38px;
                            border-radius: 10px;
                            display: flex; align-items: center; justify-content: center;
                            font-size: 16px;
                            flex-shrink: 0;
                        }
                        .chip-green  { background: #e8f5e2; }
                        .chip-orange { background: #fff0e4; }
                        .chip-blue   { background: #e4f0ff; }
                        .chip-red    { background: #ffe4e4; }
                        .stat-chip-val { font-size: 22px; font-weight: 500; color: #1a2e1a; line-height: 1; }
                        .stat-chip-lbl { font-size: 11px; color: #999; margin-top: 2px; }

                        /* ── Barre recherche ── */
                        .search-row {
                            display: flex;
                            align-items: center;
                            gap: 12px;
                            margin-bottom: 24px;
                        }
                        .search-box {
                            flex: 1;
                            position: relative;
                        }
                        .search-box input {
                            width: 100%;
                            padding: 11px 16px 11px 42px;
                            border: 1px solid #e8e2d8;
                            border-radius: 12px;
                            font-size: 13px;
                            font-family: 'DM Sans', sans-serif;
                            background: #fffdf8;
                            color: #1a2e1a;
                            outline: none;
                            transition: border-color 0.2s;
                        }
                        .search-box input:focus { border-color: #3c8c3c; }
                        .search-icon {
                            position: absolute;
                            left: 14px; top: 50%;
                            transform: translateY(-50%);
                            color: #bbb;
                            font-size: 13px;
                        }
                        .filter-select {
                            padding: 11px 16px;
                            border: 1px solid #e8e2d8;
                            border-radius: 12px;
                            font-size: 13px;
                            font-family: 'DM Sans', sans-serif;
                            background: #fffdf8;
                            color: #555;
                            outline: none;
                            cursor: pointer;
                        }

                        /* ── Grille médecins ── */
                        .doctors-grid {
                            display: grid;
                            grid-template-columns: repeat(auto-fill, minmax(480px, 1fr)); /* plus large */
                            gap: 24px;
                        }

                        /* ── Carte médecin ── */
                        .doc-card {
                            background: #fffdf8;
                            border: 1px solid #e8e2d8;
                            border-radius: 20px;
                            overflow: hidden;
                        }
                        .doc-card-header {
                            background: #1a2e1a;
                            padding: 16px 18px;
                            display: flex;
                            align-items: center;
                            gap: 14px;
                        }
                        .doc-avatar {
                            width: 44px; height: 44px;
                            border-radius: 12px;
                            background: rgba(168,220,120,0.18);
                            display: flex; align-items: center; justify-content: center;
                            font-size: 14px; font-weight: 600;
                            color: #a8dc78;
                            flex-shrink: 0;
                        }
                        .doc-name { font-size: 15px; font-weight: 500; color: #e8f5e0; line-height: 1.2; }
                        .doc-spec { font-size: 11px; color: #7ab860; margin-top: 3px; }

                        /* ── Tableau horaires ── */
                        .schedule-table { width: 100%; border-collapse: collapse; }
                        .schedule-table thead tr { background: #f5f0e8; }
                        .schedule-table thead th {
                            padding: 9px 14px;
                            font-size: 10px; letter-spacing: 1.5px;
                            text-transform: uppercase; color: #999;
                            font-weight: 500; text-align: left;
                            border-bottom: 1px solid #f0ece4;
                        }
                        .schedule-table thead th:last-child { text-align: center; }
                        .schedule-table tbody tr {
                            border-bottom: 1px solid #f0ece4;
                            transition: background 0.15s;
                        }
                        .schedule-table tbody tr:last-child { border-bottom: none; }
                        .schedule-table tbody tr:hover { background: #f9f5ef; }
                        .schedule-table tbody td {
                            padding: 10px 14px;
                            font-size: 12px; color: #3a3a3a;
                            vertical-align: middle;
                        }

                        .day-badge {
                            display: inline-block;
                            font-size: 11px; font-weight: 500;
                            padding: 4px 11px; border-radius: 8px;
                            white-space: nowrap;
                        }
                        .day-work { background: #e8f5e2; color: #2a6a10; }
                        .day-sam  { background: #fff0e4; color: #c05a00; }

                        .slot-pill {
                            display: inline-block;
                            background: #1a2e1a; color: #a8dc78;
                            font-size: 11px; font-weight: 500;
                            padding: 3px 10px; border-radius: 20px;
                            margin: 2px 3px 2px 0; white-space: nowrap;
                        }

                        /* ── Type séance badge ── */
                        .type-badge {
                            display: inline-block;
                            padding: 3px 10px; border-radius: 20px;
                            font-size: 11px; font-weight: 500;
                        }
                        .type-individuel { background: #e4f0ff; color: #0050aa; }
                        .type-groupe     { background: #f0e4ff; color: #6600aa; }
                        .type-en_ligne   { background: #fff0e4; color: #c05a00; }
                        .type-default    { background: #f0f0f0; color: #555; }

                        /* ── Statut badge ── */
                        .statut-badge {
                            display: inline-flex; align-items: center; gap: 5px;
                            padding: 4px 10px; border-radius: 20px;
                            font-size: 11px; font-weight: 500;
                        }
                        .statut-badge .dot { width: 6px; height: 6px; border-radius: 50%; }
                        .statut-Confirmé      { background: #e8f5e2; color: #2a6a10; }
                        .statut-Confirmé .dot      { background: #4caf50; }
                        .statut-En-attente    { background: #fff8e4; color: #a06000; }
                        .statut-En-attente .dot    { background: #ff9800; }
                        .statut-Pas-encore-pris { background: #ffe4e4; color: #aa0000; }
                        .statut-Pas-encore-pris .dot { background: #e53935; }
                        .statut-default       { background: #f0f0f0; color: #555; }
                        .statut-default .dot       { background: #aaa; }

                        /* ── Boutons action ── */
                        .action-btns { display: flex; gap: 7px; justify-content: center; }
                        .btn-act {
                            width: 32px; height: 32px; border-radius: 9px;
                            display: flex; align-items: center; justify-content: center;
                            border: none; cursor: pointer; transition: 0.2s;
                            text-decoration: none; font-size: 12px;
                        }
                        .btn-act-edit { background: #e8f5e2; color: #2a6a10; }
                        .btn-act-edit:hover { background: #2a6a10; color: white; transform: scale(1.1); }
                        .btn-act-del  { background: #ffe4e4; color: #aa0000; }
                        .btn-act-del:hover  { background: #aa0000; color: white; transform: scale(1.1); }

                        /* ── Pied de carte ── */
                        .card-footer-bar {
                            padding: 10px 16px;
                            border-top: 1px solid #f0ece4;
                            background: #f5f0e8;
                            display: flex; align-items: center; justify-content: space-between;
                        }
                        .footer-label { font-size: 11px; color: #aaa; }
                        .footer-val   { font-size: 12px; font-weight: 500; color: #1a2e1a; }

                        /* ── Empty state ── */
                        .empty-state { text-align: center; padding: 60px 20px; grid-column: 1 / -1; }
                        .empty-state p {
                            font-family: 'DM Serif Display', serif;
                            font-size: 18px; color: #bbb; margin-top: 12px;
                        }

                        /* ── Modales ── */
                        .modal-overlay {
                            display: none; position: fixed; inset: 0;
                            background: rgba(0,0,0,0.45); z-index: 9999;
                            align-items: center; justify-content: center;
                        }
                        .modal-overlay.active { display: flex; }
                        .modal-box {
                            background: #fffdf8; border-radius: 20px;
                            padding: 36px 32px; max-width: 380px; width: 90%;
                            text-align: center; box-shadow: 0 20px 60px rgba(0,0,0,0.15);
                        }
                        .modal-icon {
                            width: 60px; height: 60px; background: #ffe4e4;
                            border-radius: 50%; display: flex; align-items: center;
                            justify-content: center; margin: 0 auto 16px;
                            font-size: 24px; color: #aa0000;
                        }
                        .modal-title { font-family: 'DM Serif Display', serif; font-size: 20px; color: #1a2e1a; margin-bottom: 8px; }
                        .modal-sub { font-size: 13px; color: #999; margin-bottom: 24px; }
                        .modal-actions { display: flex; gap: 10px; justify-content: center; }
                        .modal-cancel {
                            padding: 10px 24px; border-radius: 50px;
                            border: 1px solid #e8e2d8; background: #fffdf8;
                            font-size: 13px; font-family: 'DM Sans', sans-serif;
                            cursor: pointer; color: #555; transition: 0.2s;
                        }
                        .modal-cancel:hover { background: #f0ece4; }
                        .modal-confirm {
                            padding: 10px 24px; border-radius: 50px;
                            border: none; background: #aa0000; color: white;
                            font-size: 13px; font-family: 'DM Sans', sans-serif;
                            cursor: pointer; transition: 0.2s;
                        }
                        .modal-confirm:hover { background: #cc0000; }

                        /* ── Modale création/édition ── */
                        .modal-create-overlay {
                            display: none; position: fixed; inset: 0;
                            background: rgba(0,0,0,0.45); z-index: 9999;
                            align-items: center; justify-content: center;
                        }
                        .modal-create-overlay.active { display: flex; }
                        .modal-create-box {
                            background: #fffdf8; border-radius: 20px;
                            padding: 36px 32px; max-width: 520px; width: 95%;
                            box-shadow: 0 20px 60px rgba(0,0,0,0.15);
                        }
                        .modal-create-header {
                            display: flex; align-items: center;
                            justify-content: space-between; margin-bottom: 24px;
                        }
                        .modal-create-title { font-family: 'DM Serif Display', serif; font-size: 22px; color: #1a2e1a; }
                        .modal-close-btn {
                            width: 34px; height: 34px; border-radius: 10px;
                            border: 1px solid #e8e2d8; background: #fffdf8;
                            cursor: pointer; display: flex; align-items: center;
                            justify-content: center; color: #999; font-size: 16px; transition: 0.2s;
                        }
                        .modal-close-btn:hover { background: #ffe4e4; color: #aa0000; border-color: #ffcccc; }
                        .form-group { margin-bottom: 16px; }
                        .form-group label {
                            display: block; font-size: 11px; letter-spacing: 1px;
                            text-transform: uppercase; color: #999; margin-bottom: 6px; font-weight: 500;
                        }
                        .form-group select,
                        .form-group input[type=\"date\"],
                        .form-group input[type=\"time\"] {
                            width: 100%; padding: 11px 14px;
                            border: 1px solid #e8e2d8; border-radius: 12px;
                            font-size: 13px; font-family: 'DM Sans', sans-serif;
                            background: #fffdf8; color: #1a2e1a;
                            outline: none; transition: border-color 0.2s; appearance: auto;
                        }
                        .form-group select:focus,
                        .form-group input:focus { border-color: #3c8c3c; }
                        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
                        .modal-form-actions { display: flex; gap: 10px; justify-content: flex-end; margin-top: 24px; }
                        .btn-form-cancel {
                            padding: 11px 24px; border-radius: 50px;
                            border: 1px solid #e8e2d8; background: #fffdf8;
                            font-size: 13px; font-family: 'DM Sans', sans-serif;
                            cursor: pointer; color: #555; transition: 0.2s;
                        }
                        .btn-form-cancel:hover { background: #f0ece4; }
                        .btn-form-submit {
                            padding: 11px 28px; border-radius: 50px;
                            border: none; background: #1a2e1a; color: #a8dc78;
                            font-size: 13px; font-family: 'DM Sans', sans-serif;
                            cursor: pointer; transition: 0.2s;
                        }
                        .btn-form-submit:hover { background: #2a4e2a; }
                        .form-group ul { list-style: none; padding: 0; margin: 4px 0 0; }
                        .form-group ul li {
                            font-size: 11px; color: #aa0000; background: #ffe4e4;
                            border-radius: 8px; padding: 5px 10px; margin-top: 4px;
                            display: flex; align-items: center; gap: 5px;
                        }
                        .form-group ul li::before { content: \"⚠\"; font-size: 11px; }

                        /* ── Carte cachée par filtre ── */
                        .doc-card.hidden { display: none; }
                        /* ── Séparateur entre jours ── */
                        tr.day-separator td {
                            padding: 0;
                            height: 6px;
                            background: #f5f0e8;
                            border-bottom: 2px solid #e8e2d8;
                        }
                        /* ── Carte scrollable ── */
                        .doc-card-body {
                            max-height: 420px;
                            overflow-y: auto;
                            scrollbar-width: thin;
                            scrollbar-color: #e8e2d8 transparent;
                        }
                        .doc-card-body::-webkit-scrollbar { width: 4px; }
                        .doc-card-body::-webkit-scrollbar-thumb { background: #e8e2d8; border-radius: 4px; }

                        /* ── Ligne pause ── */
                        .pause-row td {
                            background: #f5f0e8;
                            text-align: center;
                            padding: 5px 14px;
                            font-size: 10px;
                            letter-spacing: 1px;
                            text-transform: uppercase;
                            color: #bbb;
                            border-bottom: 1px dashed #e8e2d8;
                        }

                        /* ── Groupe jour : badge aligné verticalement au centre ── */
                        .td-jour-group {
                            vertical-align: top;
                            padding-top: 12px;
                        }

                        /* ── Lignes dans le même groupe sans bordure entre elles ── */
                        tr.same-day-row td {
                            border-top: none !important;
                        }
                        tr.same-day-row td:first-child {
                            visibility: hidden;
                        }

                        /* ── Première ligne d'un groupe ── */
                        tr.first-day-row td {
                            border-top: 2px solid #e8e2d8 !important;
                        }
                        tr.first-day-row:first-child td {
                            border-top: none !important;
                        }
                        .status-note {
    margin-bottom: 22px;
    padding: 12px 16px;
    background: #fffdf8;
    border: 1px solid #e8e2d8;
    border-left: 4px solid #3c8c3c;
    border-radius: 12px;
    font-size: 13px;
    color: #555;
    display: flex;
    gap: 12px;
    align-items: center;
    flex-wrap: wrap;
}

.note-item strong {
    color: #1a2e1a;
}

.note-separator {
    color: #bbb;
}
                    </style>

                    <div class=\"horaires-wrap\">

                        <!-- Header -->
                        <div class=\"horaires-header\">
                            <div>
                                <div class=\"page-eyebrow\">Nafseyti · Administration</div>
                                <h2>Horaires des <em>médecins</em></h2>
                            </div>
                            <button type=\"button\" class=\"btn-creer\" onclick=\"openCreateModal()\">
                                <span class=\"plus-icon\">
                                    <svg width=\"12\" height=\"12\" viewBox=\"0 0 12 12\">
                                        <path d=\"M6 2V10M2 6H10\" stroke=\"#3c8c3c\" stroke-width=\"2\" stroke-linecap=\"round\"/>
                                    </svg>
                                </span>
                                Nouveau rendez-vous
                            </button>
                        </div>

                        <!-- Stats bar -->
                        <div class=\"stats-bar\">
                            <div class=\"stat-chip\">
                                <div class=\"stat-chip-icon chip-green\">
                                    <i class=\"fa fa-calendar\" style=\"color:#2a6a10;\"></i>
                                </div>
                                <div>
                                    <div class=\"stat-chip-val\">";
        // line 591
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["rendezvous"]) || array_key_exists("rendezvous", $context) ? $context["rendezvous"] : (function () { throw new RuntimeError('Variable "rendezvous" does not exist.', 591, $this->source); })())), "html", null, true);
        yield "</div>
                                    <div class=\"stat-chip-lbl\">Total</div>
                                </div>
                            </div>
                         
                            <div class=\"stat-chip\">
                                <div class=\"stat-chip-icon chip-blue\">
                                    <i class=\"fa fa-check-circle\" style=\"color:#0050aa;\"></i>
                                </div>
                                <div>
                                    <div class=\"stat-chip-val\">
                                        ";
        // line 602
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), Twig\Extension\CoreExtension::filter($this->env, (isset($context["rendezvous"]) || array_key_exists("rendezvous", $context) ? $context["rendezvous"] : (function () { throw new RuntimeError('Variable "rendezvous" does not exist.', 602, $this->source); })()), function ($__r__) use ($context, $macros) { $context["r"] = $__r__; return (CoreExtension::getAttribute($this->env, $this->source, (isset($context["r"]) || array_key_exists("r", $context) ? $context["r"] : (function () { throw new RuntimeError('Variable "r" does not exist.', 602, $this->source); })()), "statut", [], "any", false, false, false, 602) == "Confirmé"); })), "html", null, true);
        yield "
                                    </div>
                                    <div class=\"stat-chip-lbl\">Confirmés</div>
                                </div>
                            </div>
                            <div class=\"stat-chip\">
                                <div class=\"stat-chip-icon chip-red\">
                                    <i class=\"fa fa-times-circle\" style=\"color:#aa0000;\"></i>
                                </div>
                                <div>
                                    <div class=\"stat-chip-val\">
                                        ";
        // line 613
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), Twig\Extension\CoreExtension::filter($this->env, (isset($context["rendezvous"]) || array_key_exists("rendezvous", $context) ? $context["rendezvous"] : (function () { throw new RuntimeError('Variable "rendezvous" does not exist.', 613, $this->source); })()), function ($__r__) use ($context, $macros) { $context["r"] = $__r__; return (CoreExtension::getAttribute($this->env, $this->source, (isset($context["r"]) || array_key_exists("r", $context) ? $context["r"] : (function () { throw new RuntimeError('Variable "r" does not exist.', 613, $this->source); })()), "statut", [], "any", false, false, false, 613) == "Pas encore pris"); })), "html", null, true);
        yield "
                                    </div>
                                    <div class=\"stat-chip-lbl\">Pas encore pris</div>
                                </div>
                            </div>
                        </div>
                        <div class=\"status-note\">
                            <span class=\"note-item\">
                                ❌ <strong>Confirmé</strong> = Non disponible
                            </span>
                            <span class=\"note-separator\">|</span>
                            <span class=\"note-item\">
                                ✅ <strong>Pas encore pris</strong> = Disponible
                            </span>
                        </div>

                        <!-- Recherche & Filtre -->
                        <div class=\"search-row\">
                            <div class=\"search-box\">
                                <i class=\"fa fa-search search-icon\"></i>
                                <input type=\"text\"
                                       id=\"searchInput\"
                                       placeholder=\"Rechercher par médecin, jour, statut...\"
                                       oninput=\"filterCards()\" />
                            </div>
                            <select class=\"filter-select\" id=\"statutFilter\" onchange=\"filterCards()\">
                                <option value=\"\">Tous les statuts</option>
                                <option value=\"Confirmé\">Confirmé</option>
                                <option value=\"En attente\">En attente</option>
                                <option value=\"Pas encore pris\">Pas encore pris</option>
                            </select>
                        </div>

                        <!-- Grille médecins -->
                        <div class=\"doctors-grid\" id=\"doctorsGrid\">

                            ";
        // line 649
        $context["rdvParMedecin"] = [];
        // line 650
        yield "                            ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["rendezvous"]) || array_key_exists("rendezvous", $context) ? $context["rendezvous"] : (function () { throw new RuntimeError('Variable "rendezvous" does not exist.', 650, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["rdv"]) {
            // line 651
            yield "                                ";
            $context["medecinKey"] = ("m" . CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "medecin", [], "any", false, false, false, 651), "id", [], "any", false, false, false, 651));
            // line 652
            yield "                                ";
            if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, ($context["rdvParMedecin"] ?? null), (isset($context["medecinKey"]) || array_key_exists("medecinKey", $context) ? $context["medecinKey"] : (function () { throw new RuntimeError('Variable "medecinKey" does not exist.', 652, $this->source); })()), [], "array", true, true, false, 652)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 653
                yield "                                    ";
                $context["rdvParMedecin"] = Twig\Extension\CoreExtension::merge((isset($context["rdvParMedecin"]) || array_key_exists("rdvParMedecin", $context) ? $context["rdvParMedecin"] : (function () { throw new RuntimeError('Variable "rdvParMedecin" does not exist.', 653, $this->source); })()), [ (string)                // line 654
(isset($context["medecinKey"]) || array_key_exists("medecinKey", $context) ? $context["medecinKey"] : (function () { throw new RuntimeError('Variable "medecinKey" does not exist.', 654, $this->source); })()) => ["medecin" => CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "medecin", [], "any", false, false, false, 654), "rdvs" => []]]);
                // line 656
                yield "                                ";
            }
            // line 657
            yield "                                ";
            $context["rdvParMedecin"] = Twig\Extension\CoreExtension::merge((isset($context["rdvParMedecin"]) || array_key_exists("rdvParMedecin", $context) ? $context["rdvParMedecin"] : (function () { throw new RuntimeError('Variable "rdvParMedecin" does not exist.', 657, $this->source); })()), [ (string)            // line 658
(isset($context["medecinKey"]) || array_key_exists("medecinKey", $context) ? $context["medecinKey"] : (function () { throw new RuntimeError('Variable "medecinKey" does not exist.', 658, $this->source); })()) => ["medecin" => CoreExtension::getAttribute($this->env, $this->source,             // line 659
$context["rdv"], "medecin", [], "any", false, false, false, 659), "rdvs" => Twig\Extension\CoreExtension::merge(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source,             // line 660
(isset($context["rdvParMedecin"]) || array_key_exists("rdvParMedecin", $context) ? $context["rdvParMedecin"] : (function () { throw new RuntimeError('Variable "rdvParMedecin" does not exist.', 660, $this->source); })()), (isset($context["medecinKey"]) || array_key_exists("medecinKey", $context) ? $context["medecinKey"] : (function () { throw new RuntimeError('Variable "medecinKey" does not exist.', 660, $this->source); })()), [], "array", false, false, false, 660), "rdvs", [], "any", false, false, false, 660), [$context["rdv"]])]]);
            // line 663
            yield "                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['rdv'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 664
        yield "
                            ";
        // line 665
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["rdvParMedecin"]) || array_key_exists("rdvParMedecin", $context) ? $context["rdvParMedecin"] : (function () { throw new RuntimeError('Variable "rdvParMedecin" does not exist.', 665, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["medecinKey"] => $context["data"]) {
            // line 666
            yield "                                ";
            $context["medecin"] = CoreExtension::getAttribute($this->env, $this->source, $context["data"], "medecin", [], "any", false, false, false, 666);
            // line 667
            yield "                                ";
            $context["rdvs"] = CoreExtension::getAttribute($this->env, $this->source, $context["data"], "rdvs", [], "any", false, false, false, 667);
            // line 668
            yield "
                                ";
            // line 670
            yield "                                ";
            $context["statuts"] = [];
            // line 671
            yield "                                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["rdvs"]) || array_key_exists("rdvs", $context) ? $context["rdvs"] : (function () { throw new RuntimeError('Variable "rdvs" does not exist.', 671, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["rdv"]) {
                // line 672
                yield "                                    ";
                $context["statuts"] = Twig\Extension\CoreExtension::merge((isset($context["statuts"]) || array_key_exists("statuts", $context) ? $context["statuts"] : (function () { throw new RuntimeError('Variable "statuts" does not exist.', 672, $this->source); })()), [CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "statut", [], "any", false, false, false, 672)]);
                // line 673
                yield "                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['rdv'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 674
            yield "
                                <div class=\"doc-card\"
                                     data-medecin=\"";
            // line 676
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 676, $this->source); })()), "firstname", [], "any", false, false, false, 676) . " ") . CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 676, $this->source); })()), "lastname", [], "any", false, false, false, 676))), "html", null, true);
            yield "\"
                                     data-statuts=\"";
            // line 677
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), Twig\Extension\CoreExtension::join((isset($context["statuts"]) || array_key_exists("statuts", $context) ? $context["statuts"] : (function () { throw new RuntimeError('Variable "statuts" does not exist.', 677, $this->source); })()), ",")), "html", null, true);
            yield "\">

                                    ";
            // line 680
            yield "                                    <div class=\"doc-card-header\">
                                        <div class=\"doc-avatar\">
                                            ";
            // line 682
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 682, $this->source); })()), "firstname", [], "any", false, false, false, 682), 0, 1), "html", null, true);
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 682, $this->source); })()), "lastname", [], "any", false, false, false, 682), 0, 1), "html", null, true);
            yield "
                                        </div>
                                        <div>
                                            <div class=\"doc-name\">Dr. ";
            // line 685
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 685, $this->source); })()), "firstname", [], "any", false, false, false, 685), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 685, $this->source); })()), "lastname", [], "any", false, false, false, 685), "html", null, true);
            yield "</div>
                                            <div class=\"doc-spec\">
                                                ";
            // line 687
            if (CoreExtension::inFilter("psychologue", CoreExtension::getAttribute($this->env, $this->source, (isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 687, $this->source); })()), "role", [], "any", false, false, false, 687))) {
                // line 688
                yield "                                                    Psychologue clinicien
                                                ";
            } elseif (CoreExtension::inFilter("coach_vie", CoreExtension::getAttribute($this->env, $this->source,             // line 689
(isset($context["medecin"]) || array_key_exists("medecin", $context) ? $context["medecin"] : (function () { throw new RuntimeError('Variable "medecin" does not exist.', 689, $this->source); })()), "role", [], "any", false, false, false, 689))) {
                // line 690
                yield "                                                    Coach de vie
                                                ";
            } else {
                // line 692
                yield "                                                    Médecin
                                                ";
            }
            // line 694
            yield "                                            </div>
                                        </div>
                                    </div>
                                    ";
            // line 698
            yield "                                    <div class=\"doc-card-body\">
                                    <table class=\"schedule-table\">
                                        <thead>
                                            <tr>
                                                <th>Jour</th>
                                                <th>Créneaux</th>
                                                <th>Type</th>
                                                <th>Statut</th>
                                                <th style=\"text-align:center;\">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            ";
            // line 710
            $context["joursOrdre"] = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche"];
            // line 711
            yield "
                                            ";
            // line 713
            yield "                                            ";
            $context["rdvParJour"] = [];
            // line 714
            yield "                                            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["rdvs"]) || array_key_exists("rdvs", $context) ? $context["rdvs"] : (function () { throw new RuntimeError('Variable "rdvs" does not exist.', 714, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["rdv"]) {
                // line 715
                yield "                                                ";
                $context["jour"] = CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "dateRendezVous", [], "any", false, false, false, 715);
                // line 716
                yield "                                                ";
                if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, ($context["rdvParJour"] ?? null), (isset($context["jour"]) || array_key_exists("jour", $context) ? $context["jour"] : (function () { throw new RuntimeError('Variable "jour" does not exist.', 716, $this->source); })()), [], "array", true, true, false, 716)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 717
                    yield "                                                    ";
                    $context["rdvParJour"] = Twig\Extension\CoreExtension::merge((isset($context["rdvParJour"]) || array_key_exists("rdvParJour", $context) ? $context["rdvParJour"] : (function () { throw new RuntimeError('Variable "rdvParJour" does not exist.', 717, $this->source); })()), [ (string)(isset($context["jour"]) || array_key_exists("jour", $context) ? $context["jour"] : (function () { throw new RuntimeError('Variable "jour" does not exist.', 717, $this->source); })()) => []]);
                    // line 718
                    yield "                                                ";
                }
                // line 719
                yield "                                                ";
                $context["rdvParJour"] = Twig\Extension\CoreExtension::merge((isset($context["rdvParJour"]) || array_key_exists("rdvParJour", $context) ? $context["rdvParJour"] : (function () { throw new RuntimeError('Variable "rdvParJour" does not exist.', 719, $this->source); })()), [ (string)(isset($context["jour"]) || array_key_exists("jour", $context) ? $context["jour"] : (function () { throw new RuntimeError('Variable "jour" does not exist.', 719, $this->source); })()) => Twig\Extension\CoreExtension::merge(CoreExtension::getAttribute($this->env, $this->source, (isset($context["rdvParJour"]) || array_key_exists("rdvParJour", $context) ? $context["rdvParJour"] : (function () { throw new RuntimeError('Variable "rdvParJour" does not exist.', 719, $this->source); })()), (isset($context["jour"]) || array_key_exists("jour", $context) ? $context["jour"] : (function () { throw new RuntimeError('Variable "jour" does not exist.', 719, $this->source); })()), [], "array", false, false, false, 719), [$context["rdv"]])]);
                // line 720
                yield "                                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['rdv'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 721
            yield "
                                            ";
            // line 722
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["joursOrdre"]) || array_key_exists("joursOrdre", $context) ? $context["joursOrdre"] : (function () { throw new RuntimeError('Variable "joursOrdre" does not exist.', 722, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["jourNom"]) {
                // line 723
                yield "                                                ";
                if (CoreExtension::getAttribute($this->env, $this->source, ($context["rdvParJour"] ?? null), $context["jourNom"], [], "array", true, true, false, 723)) {
                    // line 724
                    yield "                                                    ";
                    $context["rdvsJour"] = Twig\Extension\CoreExtension::sort($this->env, CoreExtension::getAttribute($this->env, $this->source, (isset($context["rdvParJour"]) || array_key_exists("rdvParJour", $context) ? $context["rdvParJour"] : (function () { throw new RuntimeError('Variable "rdvParJour" does not exist.', 724, $this->source); })()), $context["jourNom"], [], "array", false, false, false, 724), function ($__a__, $__b__) use ($context, $macros) { $context["a"] = $__a__; $context["b"] = $__b__; return (CoreExtension::getAttribute($this->env, $this->source, (isset($context["a"]) || array_key_exists("a", $context) ? $context["a"] : (function () { throw new RuntimeError('Variable "a" does not exist.', 724, $this->source); })()), "heureDebut", [], "any", false, false, false, 724) <=> CoreExtension::getAttribute($this->env, $this->source, (isset($context["b"]) || array_key_exists("b", $context) ? $context["b"] : (function () { throw new RuntimeError('Variable "b" does not exist.', 724, $this->source); })()), "heureDebut", [], "any", false, false, false, 724)); });
                    // line 725
                    yield "                                                    ";
                    $context["isPauseInserted"] = false;
                    // line 726
                    yield "
                                                    ";
                    // line 727
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable((isset($context["rdvsJour"]) || array_key_exists("rdvsJour", $context) ? $context["rdvsJour"] : (function () { throw new RuntimeError('Variable "rdvsJour" does not exist.', 727, $this->source); })()));
                    foreach ($context['_seq'] as $context["i"] => $context["rdv"]) {
                        // line 728
                        yield "
                                                        ";
                        // line 730
                        yield "                                                        ";
                        if (((((($context["jourNom"] != "Samedi") && ($context["jourNom"] != "Dimanche")) &&  !                        // line 731
(isset($context["isPauseInserted"]) || array_key_exists("isPauseInserted", $context) ? $context["isPauseInserted"] : (function () { throw new RuntimeError('Variable "isPauseInserted" does not exist.', 731, $this->source); })())) && ($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source,                         // line 732
$context["rdv"], "heureDebut", [], "any", false, false, false, 732), "H") >= 14)) && ((                        // line 733
$context["i"] == 0) || ($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["rdvsJour"]) || array_key_exists("rdvsJour", $context) ? $context["rdvsJour"] : (function () { throw new RuntimeError('Variable "rdvsJour" does not exist.', 733, $this->source); })()), ($context["i"] - 1), [], "array", false, false, false, 733), "heureFin", [], "any", false, false, false, 733), "H") <= 12)))) {
                            // line 734
                            yield "                                                            <tr class=\"pause-row\">
                                                                <td colspan=\"5\">☕ Pause — 12:00 · 14:00</td>
                                                            </tr>
                                                            ";
                            // line 737
                            $context["isPauseInserted"] = true;
                            // line 738
                            yield "                                                        ";
                        }
                        // line 739
                        yield "
                                                        <tr class=\"";
                        // line 740
                        yield ((($context["i"] == 0)) ? ("first-day-row") : ("same-day-row"));
                        yield "\">

                                                            ";
                        // line 743
                        yield "                                                            <td class=\"";
                        yield ((($context["i"] == 0)) ? ("td-jour-group") : (""));
                        yield "\">
                                                                ";
                        // line 744
                        if (($context["i"] == 0)) {
                            // line 745
                            yield "                                                                    <span class=\"day-badge ";
                            if ((($context["jourNom"] == "Samedi") || ($context["jourNom"] == "Dimanche"))) {
                                yield "day-sam";
                            } else {
                                yield "day-work";
                            }
                            yield "\">
                                                                        ";
                            // line 746
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["jourNom"], "html", null, true);
                            yield "
                                                                    </span>
                                                                ";
                        }
                        // line 749
                        yield "                                                            </td>

                                                            ";
                        // line 752
                        yield "                                                            <td>
                                                                <span class=\"slot-pill\">
                                                                    ";
                        // line 754
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "heureDebut", [], "any", false, false, false, 754), "H:i"), "html", null, true);
                        yield "–";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "heureFin", [], "any", false, false, false, 754), "H:i"), "html", null, true);
                        yield "
                                                                </span>
                                                            </td>

                                                            ";
                        // line 759
                        yield "                                                            <td>
                                                                ";
                        // line 760
                        if ((CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "typeSeance", [], "any", false, false, false, 760) == "Présentiel")) {
                            // line 761
                            yield "                                                                    <span class=\"type-badge type-individuel\">Présentiel</span>
                                                                ";
                        } elseif ((CoreExtension::getAttribute($this->env, $this->source,                         // line 762
$context["rdv"], "typeSeance", [], "any", false, false, false, 762) == "en_ligne")) {
                            // line 763
                            yield "                                                                    <span class=\"type-badge type-en_ligne\">en_ligne</span>
                                                                ";
                        } else {
                            // line 765
                            yield "                                                                    <span class=\"type-badge type-default\">";
                            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "typeSeance", [], "any", true, true, false, 765) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "typeSeance", [], "any", false, false, false, 765)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "typeSeance", [], "any", false, false, false, 765), "html", null, true)) : ("—"));
                            yield "</span>
                                                                ";
                        }
                        // line 767
                        yield "                                                            </td>

                                                            ";
                        // line 770
                        yield "                                                            <td>
                                                                ";
                        // line 771
                        if ((CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "statut", [], "any", false, false, false, 771) == "Confirmé")) {
                            // line 772
                            yield "                                                                    <span class=\"statut-badge statut-Confirmé\"><span class=\"dot\"></span> Confirmé</span>
                                                                ";
                        } elseif ((CoreExtension::getAttribute($this->env, $this->source,                         // line 773
$context["rdv"], "statut", [], "any", false, false, false, 773) == "En attente")) {
                            // line 774
                            yield "                                                                    <span class=\"statut-badge statut-En-attente\"><span class=\"dot\"></span> En attente</span>
                                                                ";
                        } elseif ((CoreExtension::getAttribute($this->env, $this->source,                         // line 775
$context["rdv"], "statut", [], "any", false, false, false, 775) == "Pas encore pris")) {
                            // line 776
                            yield "                                                                    <span class=\"statut-badge statut-Pas-encore-pris\"><span class=\"dot\"></span> Pas encore pris</span>
                                                                ";
                        } else {
                            // line 778
                            yield "                                                                    <span class=\"statut-badge statut-default\"><span class=\"dot\"></span> ";
                            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "statut", [], "any", true, true, false, 778) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "statut", [], "any", false, false, false, 778)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "statut", [], "any", false, false, false, 778), "html", null, true)) : ("—"));
                            yield "</span>
                                                                ";
                        }
                        // line 780
                        yield "                                                            </td>

                                                            ";
                        // line 783
                        yield "                                                            <td style=\"text-align:center;\">
                                                                <div class=\"action-btns\">
                                                                    <button class=\"btn-act btn-act-edit\" title=\"Modifier\"
                                                                            onclick=\"openEditModal(";
                        // line 786
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "id", [], "any", false, false, false, 786), "html", null, true);
                        yield ")\">
                                                                        <i class=\"fa fa-pencil\"></i>
                                                                    </button>
                                                                    <button class=\"btn-act btn-act-del\" title=\"Supprimer\"
                                                                            onclick=\"openDeleteModal(";
                        // line 790
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "id", [], "any", false, false, false, 790), "html", null, true);
                        yield ")\">
                                                                        <i class=\"fa fa-trash\"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['i'], $context['rdv'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 797
                    yield "
                                                    ";
                    // line 799
                    yield "                                                    <tr class=\"day-separator\"><td colspan=\"5\"></td></tr>
                                                ";
                }
                // line 801
                yield "                                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['jourNom'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 802
            yield "                                        </tbody>
                                    </table>
                                    </div>

                                    ";
            // line 807
            yield "                                    <div class=\"card-footer-bar\">
                                        <span class=\"footer-label\">Total créneaux</span>
                                        <span class=\"footer-val\">";
            // line 809
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["rdvs"]) || array_key_exists("rdvs", $context) ? $context["rdvs"] : (function () { throw new RuntimeError('Variable "rdvs" does not exist.', 809, $this->source); })())), "html", null, true);
            yield " plages</span>
                                    </div>

                                </div>

                            ";
            $context['_iterated'] = true;
        }
        // line 814
        if (!$context['_iterated']) {
            // line 815
            yield "                                <div class=\"empty-state\">
                                    <svg width=\"64\" height=\"64\" viewBox=\"0 0 64 64\" fill=\"none\">
                                        <circle cx=\"32\" cy=\"32\" r=\"30\" fill=\"#f0f0e8\" stroke=\"#ddd\" stroke-width=\"1\"/>
                                        <rect x=\"18\" y=\"20\" width=\"28\" height=\"26\" rx=\"4\" fill=\"#ddd\"/>
                                        <rect x=\"22\" y=\"26\" width=\"20\" height=\"3\" rx=\"1\" fill=\"white\"/>
                                        <rect x=\"22\" y=\"32\" width=\"14\" height=\"3\" rx=\"1\" fill=\"white\"/>
                                        <rect x=\"22\" y=\"38\" width=\"16\" height=\"3\" rx=\"1\" fill=\"white\"/>
                                    </svg>
                                    <p>Aucun rendez-vous trouvé</p>
                                </div>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['medecinKey'], $context['data'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 826
        yield "
                        </div>";
        // line 828
        yield "
                        ";
        // line 830
        yield "                        <div id=\"noResults\" style=\"display:none; text-align:center; padding:60px 20px;\">
                            <svg width=\"64\" height=\"64\" viewBox=\"0 0 64 64\" fill=\"none\">
                                <circle cx=\"32\" cy=\"32\" r=\"30\" fill=\"#f0f0e8\" stroke=\"#ddd\" stroke-width=\"1\"/>
                                <rect x=\"18\" y=\"20\" width=\"28\" height=\"26\" rx=\"4\" fill=\"#ddd\"/>
                                <rect x=\"22\" y=\"26\" width=\"20\" height=\"3\" rx=\"1\" fill=\"white\"/>
                                <rect x=\"22\" y=\"32\" width=\"14\" height=\"3\" rx=\"1\" fill=\"white\"/>
                            </svg>
                            <p style=\"font-family:'DM Serif Display',serif; font-size:18px; color:#bbb; margin-top:12px;\">
                                Aucun médecin trouvé
                            </p>
                        </div>

                    </div>";
        // line 843
        yield "
                    <!-- ── Modal Supprimer ── -->
                    <div class=\"modal-overlay\" id=\"deleteModal\">
                        <div class=\"modal-box\">
                            <div class=\"modal-icon\"><i class=\"fa fa-trash\"></i></div>
                            <div class=\"modal-title\">Supprimer ce rendez-vous ?</div>
                            <div class=\"modal-sub\">Cette action est irréversible. Le rendez-vous sera définitivement supprimé.</div>
                            <div class=\"modal-actions\">
                                <button class=\"modal-cancel\" onclick=\"closeDeleteModal()\">Annuler</button>
                                <form id=\"deleteForm\" method=\"post\" style=\"display:inline;\">
                                    <input type=\"hidden\" name=\"_token\" id=\"deleteToken\">
                                    <button type=\"submit\" class=\"modal-confirm\">Supprimer</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- ── Modal Créer ── -->
                    <div class=\"modal-create-overlay\" id=\"createModal\">
                        <div class=\"modal-create-box\">
                            <div class=\"modal-create-header\">
                                <div class=\"modal-create-title\">Nouveau rendez-vous</div>
                                <button class=\"modal-close-btn\" onclick=\"closeCreateModal()\" type=\"button\">
                                    <i class=\"fa fa-times\"></i>
                                </button>
                            </div>

                            ";
        // line 870
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 870, $this->source); })()), 'form_start', ["action" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_liste_rendezvous"), "method" => "POST", "attr" => ["novalidate" => "novalidate"]]);
        // line 874
        yield "
                                ";
        // line 875
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 875, $this->source); })()), 'errors');
        yield "

                                <div class=\"form-group\">
                                    ";
        // line 878
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 878, $this->source); })()), "medecin", [], "any", false, false, false, 878), 'label', ["label" => "Médecin / Psychologue"]);
        yield "
                                    ";
        // line 879
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 879, $this->source); })()), "medecin", [], "any", false, false, false, 879), 'widget');
        yield "
                                    ";
        // line 880
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 880, $this->source); })()), "medecin", [], "any", false, false, false, 880), 'errors');
        yield "
                                </div>
                                <div class=\"form-group\">
                                    ";
        // line 883
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 883, $this->source); })()), "dateRendezVous", [], "any", false, false, false, 883), 'label', ["label" => "Date"]);
        yield "
                                    ";
        // line 884
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 884, $this->source); })()), "dateRendezVous", [], "any", false, false, false, 884), 'widget');
        yield "
                                    ";
        // line 885
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 885, $this->source); })()), "dateRendezVous", [], "any", false, false, false, 885), 'errors');
        yield "
                                </div>
                                <div class=\"form-row\">
                                    <div class=\"form-group\">
                                        ";
        // line 889
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 889, $this->source); })()), "heureDebut", [], "any", false, false, false, 889), 'label', ["label" => "Heure début"]);
        yield "
                                        ";
        // line 890
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 890, $this->source); })()), "heureDebut", [], "any", false, false, false, 890), 'widget');
        yield "
                                        ";
        // line 891
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 891, $this->source); })()), "heureDebut", [], "any", false, false, false, 891), 'errors');
        yield "
                                    </div>
                                    <div class=\"form-group\">
                                        ";
        // line 894
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 894, $this->source); })()), "heureFin", [], "any", false, false, false, 894), 'label', ["label" => "Heure fin"]);
        yield "
                                        ";
        // line 895
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 895, $this->source); })()), "heureFin", [], "any", false, false, false, 895), 'widget');
        yield "
                                        ";
        // line 896
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 896, $this->source); })()), "heureFin", [], "any", false, false, false, 896), 'errors');
        yield "
                                    </div>
                                </div>
                                <div class=\"form-group\">
                                    ";
        // line 900
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 900, $this->source); })()), "typeSeance", [], "any", false, false, false, 900), 'label', ["label" => "Type de séance"]);
        yield "
                                    ";
        // line 901
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 901, $this->source); })()), "typeSeance", [], "any", false, false, false, 901), 'widget');
        yield "
                                    ";
        // line 902
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 902, $this->source); })()), "typeSeance", [], "any", false, false, false, 902), 'errors');
        yield "
                                </div>
                                <div class=\"form-group\">
                                    ";
        // line 905
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 905, $this->source); })()), "statut", [], "any", false, false, false, 905), 'label', ["label" => "Statut"]);
        yield "
                                    ";
        // line 906
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 906, $this->source); })()), "statut", [], "any", false, false, false, 906), 'widget');
        yield "
                                    ";
        // line 907
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 907, $this->source); })()), "statut", [], "any", false, false, false, 907), 'errors');
        yield "
                                </div>
                                <div class=\"modal-form-actions\">
                                    <button type=\"button\" class=\"btn-form-cancel\" onclick=\"closeCreateModal()\">Annuler</button>
                                    <button type=\"submit\" class=\"btn-form-submit\">
                                        <i class=\"fa fa-check\" style=\"margin-right:6px;\"></i> Enregistrer
                                    </button>
                                </div>
                            ";
        // line 915
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["createForm"]) || array_key_exists("createForm", $context) ? $context["createForm"] : (function () { throw new RuntimeError('Variable "createForm" does not exist.', 915, $this->source); })()), 'form_end');
        yield "
                        </div>
                    </div>

                    <!-- ── Modal Modifier ── -->
                    <div class=\"modal-create-overlay\" id=\"editModal\">
                        <div class=\"modal-create-box\">
                            <div class=\"modal-create-header\">
                                <div class=\"modal-create-title\">Modifier le rendez-vous</div>
                                <button class=\"modal-close-btn\" onclick=\"closeEditModal()\" type=\"button\">
                                    <i class=\"fa fa-times\"></i>
                                </button>
                            </div>

                            ";
        // line 929
        if (array_key_exists("editForm", $context)) {
            // line 930
            yield "                                ";
            yield             $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["editForm"]) || array_key_exists("editForm", $context) ? $context["editForm"] : (function () { throw new RuntimeError('Variable "editForm" does not exist.', 930, $this->source); })()), 'form_start', ["action" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_rendezvous_edit", ["id" =>             // line 931
(isset($context["editRdvId"]) || array_key_exists("editRdvId", $context) ? $context["editRdvId"] : (function () { throw new RuntimeError('Variable "editRdvId" does not exist.', 931, $this->source); })())]), "method" => "POST", "attr" => ["novalidate" => "novalidate"]]);
            // line 934
            yield "
                                    ";
            // line 935
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["editForm"]) || array_key_exists("editForm", $context) ? $context["editForm"] : (function () { throw new RuntimeError('Variable "editForm" does not exist.', 935, $this->source); })()), 'errors');
            yield "

                                    <div class=\"form-group\">
                                        ";
            // line 938
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editForm"]) || array_key_exists("editForm", $context) ? $context["editForm"] : (function () { throw new RuntimeError('Variable "editForm" does not exist.', 938, $this->source); })()), "medecin", [], "any", false, false, false, 938), 'label', ["label" => "Médecin / Psychologue"]);
            yield "
                                        ";
            // line 939
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editForm"]) || array_key_exists("editForm", $context) ? $context["editForm"] : (function () { throw new RuntimeError('Variable "editForm" does not exist.', 939, $this->source); })()), "medecin", [], "any", false, false, false, 939), 'widget');
            yield "
                                        ";
            // line 940
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editForm"]) || array_key_exists("editForm", $context) ? $context["editForm"] : (function () { throw new RuntimeError('Variable "editForm" does not exist.', 940, $this->source); })()), "medecin", [], "any", false, false, false, 940), 'errors');
            yield "
                                    </div>
                                    <div class=\"form-group\">
                                        ";
            // line 943
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editForm"]) || array_key_exists("editForm", $context) ? $context["editForm"] : (function () { throw new RuntimeError('Variable "editForm" does not exist.', 943, $this->source); })()), "dateRendezVous", [], "any", false, false, false, 943), 'label', ["label" => "Date"]);
            yield "
                                        ";
            // line 944
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editForm"]) || array_key_exists("editForm", $context) ? $context["editForm"] : (function () { throw new RuntimeError('Variable "editForm" does not exist.', 944, $this->source); })()), "dateRendezVous", [], "any", false, false, false, 944), 'widget');
            yield "
                                        ";
            // line 945
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editForm"]) || array_key_exists("editForm", $context) ? $context["editForm"] : (function () { throw new RuntimeError('Variable "editForm" does not exist.', 945, $this->source); })()), "dateRendezVous", [], "any", false, false, false, 945), 'errors');
            yield "
                                    </div>
                                    <div class=\"form-row\">
                                        <div class=\"form-group\">
                                            ";
            // line 949
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editForm"]) || array_key_exists("editForm", $context) ? $context["editForm"] : (function () { throw new RuntimeError('Variable "editForm" does not exist.', 949, $this->source); })()), "heureDebut", [], "any", false, false, false, 949), 'label', ["label" => "Heure début"]);
            yield "
                                            ";
            // line 950
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editForm"]) || array_key_exists("editForm", $context) ? $context["editForm"] : (function () { throw new RuntimeError('Variable "editForm" does not exist.', 950, $this->source); })()), "heureDebut", [], "any", false, false, false, 950), 'widget');
            yield "
                                            ";
            // line 951
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editForm"]) || array_key_exists("editForm", $context) ? $context["editForm"] : (function () { throw new RuntimeError('Variable "editForm" does not exist.', 951, $this->source); })()), "heureDebut", [], "any", false, false, false, 951), 'errors');
            yield "
                                        </div>
                                        <div class=\"form-group\">
                                            ";
            // line 954
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editForm"]) || array_key_exists("editForm", $context) ? $context["editForm"] : (function () { throw new RuntimeError('Variable "editForm" does not exist.', 954, $this->source); })()), "heureFin", [], "any", false, false, false, 954), 'label', ["label" => "Heure fin"]);
            yield "
                                            ";
            // line 955
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editForm"]) || array_key_exists("editForm", $context) ? $context["editForm"] : (function () { throw new RuntimeError('Variable "editForm" does not exist.', 955, $this->source); })()), "heureFin", [], "any", false, false, false, 955), 'widget');
            yield "
                                            ";
            // line 956
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editForm"]) || array_key_exists("editForm", $context) ? $context["editForm"] : (function () { throw new RuntimeError('Variable "editForm" does not exist.', 956, $this->source); })()), "heureFin", [], "any", false, false, false, 956), 'errors');
            yield "
                                        </div>
                                    </div>
                                    <div class=\"form-group\">
                                        ";
            // line 960
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editForm"]) || array_key_exists("editForm", $context) ? $context["editForm"] : (function () { throw new RuntimeError('Variable "editForm" does not exist.', 960, $this->source); })()), "typeSeance", [], "any", false, false, false, 960), 'label', ["label" => "Type de séance"]);
            yield "
                                        ";
            // line 961
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editForm"]) || array_key_exists("editForm", $context) ? $context["editForm"] : (function () { throw new RuntimeError('Variable "editForm" does not exist.', 961, $this->source); })()), "typeSeance", [], "any", false, false, false, 961), 'widget');
            yield "
                                        ";
            // line 962
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editForm"]) || array_key_exists("editForm", $context) ? $context["editForm"] : (function () { throw new RuntimeError('Variable "editForm" does not exist.', 962, $this->source); })()), "typeSeance", [], "any", false, false, false, 962), 'errors');
            yield "
                                    </div>
                                    <div class=\"form-group\">
                                        ";
            // line 965
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editForm"]) || array_key_exists("editForm", $context) ? $context["editForm"] : (function () { throw new RuntimeError('Variable "editForm" does not exist.', 965, $this->source); })()), "statut", [], "any", false, false, false, 965), 'label', ["label" => "Statut"]);
            yield "
                                        ";
            // line 966
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editForm"]) || array_key_exists("editForm", $context) ? $context["editForm"] : (function () { throw new RuntimeError('Variable "editForm" does not exist.', 966, $this->source); })()), "statut", [], "any", false, false, false, 966), 'widget');
            yield "
                                        ";
            // line 967
            yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editForm"]) || array_key_exists("editForm", $context) ? $context["editForm"] : (function () { throw new RuntimeError('Variable "editForm" does not exist.', 967, $this->source); })()), "statut", [], "any", false, false, false, 967), 'errors');
            yield "
                                    </div>
                                    <div class=\"modal-form-actions\">
                                        <button type=\"button\" class=\"btn-form-cancel\" onclick=\"closeEditModal()\">Annuler</button>
                                        <button type=\"submit\" class=\"btn-form-submit\">
                                            <i class=\"fa fa-check\" style=\"margin-right:6px;\"></i> Enregistrer
                                        </button>
                                    </div>
                                ";
            // line 975
            yield             $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["editForm"]) || array_key_exists("editForm", $context) ? $context["editForm"] : (function () { throw new RuntimeError('Variable "editForm" does not exist.', 975, $this->source); })()), 'form_end');
            yield "
                            ";
        }
        // line 977
        yield "                        </div>
                    </div>

                    <script>
                        // ── Filtrage des cartes médecins ──
                        function filterCards() {
                            const search = document.getElementById('searchInput').value.toLowerCase().trim();
                            const statut = document.getElementById('statutFilter').value.toLowerCase();
                            const cards  = document.querySelectorAll('.doc-card');
                            let visible  = 0;

                            cards.forEach(function(card) {
                                const nomMedecin = card.getAttribute('data-medecin') || '';
                                const statuts    = card.getAttribute('data-statuts')  || '';

                                const matchSearch = search === '' || nomMedecin.includes(search);
                                const matchStatut = statut === '' || statuts.includes(statut);

                                if (matchSearch && matchStatut) {
                                    card.classList.remove('hidden');
                                    visible++;
                                } else {
                                    card.classList.add('hidden');
                                }
                            });

                            document.getElementById('noResults').style.display = (visible === 0) ? 'block' : 'none';
                        }

                        // ── Delete ──
                        function openDeleteModal(id) {
                            document.getElementById('deleteModal').classList.add('active');
                            document.getElementById('deleteForm').action = '/admin/rendezvous/' + id + '/delete';
                            document.getElementById('deleteToken').value = 'delete' + id;
                        }
                        function closeDeleteModal() {
                            document.getElementById('deleteModal').classList.remove('active');
                        }
                        document.getElementById('deleteModal').addEventListener('click', function(e) {
                            if (e.target === this) closeDeleteModal();
                        });

                        // ── Create ──
                        function openCreateModal() {
                            document.getElementById('createModal').classList.add('active');
                            document.body.style.overflow = 'hidden';
                        }
                        function closeCreateModal() {
                            document.getElementById('createModal').classList.remove('active');
                            document.body.style.overflow = '';
                        }
                        document.getElementById('createModal').addEventListener('click', function(e) {
                            if (e.target === this) closeCreateModal();
                        });

                        // ── Edit ──
                        function openEditModal(id) {
                            window.location.href = '/admin/liste_rendezvous/' + id + '/edit';
                        }
                        function closeEditModal() {
                            document.getElementById('editModal').classList.remove('active');
                            document.body.style.overflow = '';
                        }
                        document.getElementById('editModal').addEventListener('click', function(e) {
                            if (e.target === this) closeEditModal();
                        });

                        // ── Rouvrir si erreurs de validation ──
                        ";
        // line 1045
        if ((array_key_exists("showCreateModal", $context) && (isset($context["showCreateModal"]) || array_key_exists("showCreateModal", $context) ? $context["showCreateModal"] : (function () { throw new RuntimeError('Variable "showCreateModal" does not exist.', 1045, $this->source); })()))) {
            // line 1046
            yield "                            document.addEventListener('DOMContentLoaded', function() { openCreateModal(); });
                        ";
        }
        // line 1048
        yield "
                        ";
        // line 1049
        if ((array_key_exists("showEditModal", $context) && (isset($context["showEditModal"]) || array_key_exists("showEditModal", $context) ? $context["showEditModal"] : (function () { throw new RuntimeError('Variable "showEditModal" does not exist.', 1049, $this->source); })()))) {
            // line 1050
            yield "                            document.addEventListener('DOMContentLoaded', function() {
                                document.getElementById('editModal').classList.add('active');
                                document.body.style.overflow = 'hidden';
                            });
                        ";
        }
        // line 1055
        yield "                    </script>

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
        return "back/rendezvous_liste.html.twig";
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
        return array (  1544 => 1055,  1537 => 1050,  1535 => 1049,  1532 => 1048,  1528 => 1046,  1526 => 1045,  1456 => 977,  1451 => 975,  1440 => 967,  1436 => 966,  1432 => 965,  1426 => 962,  1422 => 961,  1418 => 960,  1411 => 956,  1407 => 955,  1403 => 954,  1397 => 951,  1393 => 950,  1389 => 949,  1382 => 945,  1378 => 944,  1374 => 943,  1368 => 940,  1364 => 939,  1360 => 938,  1354 => 935,  1351 => 934,  1349 => 931,  1347 => 930,  1345 => 929,  1328 => 915,  1317 => 907,  1313 => 906,  1309 => 905,  1303 => 902,  1299 => 901,  1295 => 900,  1288 => 896,  1284 => 895,  1280 => 894,  1274 => 891,  1270 => 890,  1266 => 889,  1259 => 885,  1255 => 884,  1251 => 883,  1245 => 880,  1241 => 879,  1237 => 878,  1231 => 875,  1228 => 874,  1226 => 870,  1197 => 843,  1183 => 830,  1180 => 828,  1177 => 826,  1161 => 815,  1159 => 814,  1149 => 809,  1145 => 807,  1139 => 802,  1133 => 801,  1129 => 799,  1126 => 797,  1113 => 790,  1106 => 786,  1101 => 783,  1097 => 780,  1091 => 778,  1087 => 776,  1085 => 775,  1082 => 774,  1080 => 773,  1077 => 772,  1075 => 771,  1072 => 770,  1068 => 767,  1062 => 765,  1058 => 763,  1056 => 762,  1053 => 761,  1051 => 760,  1048 => 759,  1039 => 754,  1035 => 752,  1031 => 749,  1025 => 746,  1016 => 745,  1014 => 744,  1009 => 743,  1004 => 740,  1001 => 739,  998 => 738,  996 => 737,  991 => 734,  989 => 733,  988 => 732,  987 => 731,  985 => 730,  982 => 728,  978 => 727,  975 => 726,  972 => 725,  969 => 724,  966 => 723,  962 => 722,  959 => 721,  953 => 720,  950 => 719,  947 => 718,  944 => 717,  941 => 716,  938 => 715,  933 => 714,  930 => 713,  927 => 711,  925 => 710,  911 => 698,  906 => 694,  902 => 692,  898 => 690,  896 => 689,  893 => 688,  891 => 687,  884 => 685,  877 => 682,  873 => 680,  868 => 677,  864 => 676,  860 => 674,  854 => 673,  851 => 672,  846 => 671,  843 => 670,  840 => 668,  837 => 667,  834 => 666,  829 => 665,  826 => 664,  820 => 663,  818 => 660,  817 => 659,  816 => 658,  814 => 657,  811 => 656,  809 => 654,  807 => 653,  804 => 652,  801 => 651,  796 => 650,  794 => 649,  755 => 613,  741 => 602,  727 => 591,  238 => 105,  231 => 101,  223 => 98,  217 => 95,  197 => 78,  192 => 76,  171 => 58,  162 => 52,  152 => 45,  134 => 32,  125 => 26,  112 => 16,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'back/base.html.twig' %}

{% block title %}Horaires des Médecins{% endblock %}

{% block body %}
<div class=\"full_container\">
    <div class=\"inner_container\">

        <!-- Sidebar -->
        <nav id=\"sidebar\">
            <div class=\"sidebar_blog_1\">
                <div class=\"sidebar-header\">
                    <div class=\"logo_section\">
                        <a href=\"#\">
                            <img class=\"logo_icon img-responsive\"
                                 src=\"{{ asset('back/images/logo/logo_icon1.png') }}\"
                                 alt=\"logo\" />
                        </a>
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
                                <span class=\"online_animation\"></span> en_ligne
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"sidebar_blog_2\">
                <h4></h4>
                <ul class=\"list-unstyled components\">
                    <li>
                        <a href=\"{{ path('admin_tableau') }}\">
                            <i class=\"fa fa-dashboard yellow_color\"></i>
                            <span>Tableau de bord</span>
                        </a>
                    </li>
                    <li><a href=\"#\"><i class=\"fa fa-users blue1_color\"></i><span>Utilisateurs</span></a></li>
                    <li class=\"active\">
                        <a href=\"{{ path('admin_rendezvous') }}\">
                            <i class=\"fa fa-calendar orange_color\"></i>
                            <span>Rendez-vous</span>
                        </a>
                    </li>
                    <li><a href=\"#\"><i class=\"fa fa-book purple_color2\"></i><span>Contenu psychologique</span></a></li>
                    <li class=\"active\"><a href=\"{{ path('app_test_index') }}\"><i class=\"fa fa-check-square green_color\"></i><span>Tests</span></a></li>
                    <li><a href=\"#\"><i class=\"fa fa-calendar-check-o red_color\"></i><span>Événements</span></a></li>
                    <li><a href=\"#\"><i class=\"fa fa-line-chart yellow_color\"></i><span>Suivi personnel</span></a></li>
                </ul>
            </div>
        </nav>

        <!-- Content -->
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
                                <span style=\"font-size:20px; font-weight:bold; color:#3c943c;\">Nafseyti</span>
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
                                            <span class=\"name_user\">{{ app.user.firstname }} {{ app.user.lastname }}</span>
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

            <!-- Main Content -->
            <div class=\"midde_cont\">
                <div class=\"container-fluid\">

                    <link href=\"https://fonts.googleapis.com/css2?family=DM+Serif+Display:ital@0;1&family=DM+Sans:wght@300;400;500&display=swap\" rel=\"stylesheet\">

                    <style>
                        .horaires-wrap {
                            font-family: 'DM Sans', sans-serif;
                            padding: 10px 0 50px;
                        }

                        /* ── Header ── */
                        .horaires-header {
                            display: flex;
                            align-items: flex-end;
                            justify-content: space-between;
                            margin-bottom: 28px;
                        }
                        .page-eyebrow {
                            font-size: 10px;
                            letter-spacing: 2px;
                            text-transform: uppercase;
                            color: #a0a090;
                            margin-bottom: 4px;
                        }
                        .horaires-header h2 {
                            font-family: 'DM Serif Display', serif;
                            font-size: 32px;
                            color: #1a2e1a;
                            margin: 0;
                            line-height: 1.1;
                        }
                        .horaires-header h2 em {
                            color: #3c8c3c;
                            font-style: italic;
                        }

                        /* ── Bouton créer ── */
                        .btn-creer {
                            display: inline-flex;
                            align-items: center;
                            gap: 10px;
                            padding: 13px 24px;
                            border-radius: 50px;
                            font-size: 14px;
                            font-weight: 500;
                            text-decoration: none;
                            cursor: pointer;
                            font-family: 'DM Sans', sans-serif;
                            background: transparent;
                            border: 2px solid #3c8c3c;
                            color: #3c8c3c;
                            transition: 0.25s;
                        }
                        .btn-creer:hover {
                            background: rgba(60,140,60,0.08);
                            color: #2a6a10;
                            border-color: #2a6a10;
                            transform: translateY(-2px);
                            text-decoration: none;
                        }
                        .btn-creer .plus-icon {
                            width: 22px; height: 22px;
                            border: 1px solid #3c8c3c;
                            border-radius: 50%;
                            display: flex; align-items: center; justify-content: center;
                            background: transparent;
                        }

                        /* ── Stats bar ── */
                        .stats-bar {
                            display: flex;
                            gap: 14px;
                            margin-bottom: 24px;
                        }
                        .stat-chip {
                            display: flex;
                            align-items: center;
                            gap: 10px;
                            background: #fffdf8;
                            border: 1px solid #e8e2d8;
                            border-radius: 14px;
                            padding: 12px 18px;
                            flex: 1;
                        }
                        .stat-chip-icon {
                            width: 38px; height: 38px;
                            border-radius: 10px;
                            display: flex; align-items: center; justify-content: center;
                            font-size: 16px;
                            flex-shrink: 0;
                        }
                        .chip-green  { background: #e8f5e2; }
                        .chip-orange { background: #fff0e4; }
                        .chip-blue   { background: #e4f0ff; }
                        .chip-red    { background: #ffe4e4; }
                        .stat-chip-val { font-size: 22px; font-weight: 500; color: #1a2e1a; line-height: 1; }
                        .stat-chip-lbl { font-size: 11px; color: #999; margin-top: 2px; }

                        /* ── Barre recherche ── */
                        .search-row {
                            display: flex;
                            align-items: center;
                            gap: 12px;
                            margin-bottom: 24px;
                        }
                        .search-box {
                            flex: 1;
                            position: relative;
                        }
                        .search-box input {
                            width: 100%;
                            padding: 11px 16px 11px 42px;
                            border: 1px solid #e8e2d8;
                            border-radius: 12px;
                            font-size: 13px;
                            font-family: 'DM Sans', sans-serif;
                            background: #fffdf8;
                            color: #1a2e1a;
                            outline: none;
                            transition: border-color 0.2s;
                        }
                        .search-box input:focus { border-color: #3c8c3c; }
                        .search-icon {
                            position: absolute;
                            left: 14px; top: 50%;
                            transform: translateY(-50%);
                            color: #bbb;
                            font-size: 13px;
                        }
                        .filter-select {
                            padding: 11px 16px;
                            border: 1px solid #e8e2d8;
                            border-radius: 12px;
                            font-size: 13px;
                            font-family: 'DM Sans', sans-serif;
                            background: #fffdf8;
                            color: #555;
                            outline: none;
                            cursor: pointer;
                        }

                        /* ── Grille médecins ── */
                        .doctors-grid {
                            display: grid;
                            grid-template-columns: repeat(auto-fill, minmax(480px, 1fr)); /* plus large */
                            gap: 24px;
                        }

                        /* ── Carte médecin ── */
                        .doc-card {
                            background: #fffdf8;
                            border: 1px solid #e8e2d8;
                            border-radius: 20px;
                            overflow: hidden;
                        }
                        .doc-card-header {
                            background: #1a2e1a;
                            padding: 16px 18px;
                            display: flex;
                            align-items: center;
                            gap: 14px;
                        }
                        .doc-avatar {
                            width: 44px; height: 44px;
                            border-radius: 12px;
                            background: rgba(168,220,120,0.18);
                            display: flex; align-items: center; justify-content: center;
                            font-size: 14px; font-weight: 600;
                            color: #a8dc78;
                            flex-shrink: 0;
                        }
                        .doc-name { font-size: 15px; font-weight: 500; color: #e8f5e0; line-height: 1.2; }
                        .doc-spec { font-size: 11px; color: #7ab860; margin-top: 3px; }

                        /* ── Tableau horaires ── */
                        .schedule-table { width: 100%; border-collapse: collapse; }
                        .schedule-table thead tr { background: #f5f0e8; }
                        .schedule-table thead th {
                            padding: 9px 14px;
                            font-size: 10px; letter-spacing: 1.5px;
                            text-transform: uppercase; color: #999;
                            font-weight: 500; text-align: left;
                            border-bottom: 1px solid #f0ece4;
                        }
                        .schedule-table thead th:last-child { text-align: center; }
                        .schedule-table tbody tr {
                            border-bottom: 1px solid #f0ece4;
                            transition: background 0.15s;
                        }
                        .schedule-table tbody tr:last-child { border-bottom: none; }
                        .schedule-table tbody tr:hover { background: #f9f5ef; }
                        .schedule-table tbody td {
                            padding: 10px 14px;
                            font-size: 12px; color: #3a3a3a;
                            vertical-align: middle;
                        }

                        .day-badge {
                            display: inline-block;
                            font-size: 11px; font-weight: 500;
                            padding: 4px 11px; border-radius: 8px;
                            white-space: nowrap;
                        }
                        .day-work { background: #e8f5e2; color: #2a6a10; }
                        .day-sam  { background: #fff0e4; color: #c05a00; }

                        .slot-pill {
                            display: inline-block;
                            background: #1a2e1a; color: #a8dc78;
                            font-size: 11px; font-weight: 500;
                            padding: 3px 10px; border-radius: 20px;
                            margin: 2px 3px 2px 0; white-space: nowrap;
                        }

                        /* ── Type séance badge ── */
                        .type-badge {
                            display: inline-block;
                            padding: 3px 10px; border-radius: 20px;
                            font-size: 11px; font-weight: 500;
                        }
                        .type-individuel { background: #e4f0ff; color: #0050aa; }
                        .type-groupe     { background: #f0e4ff; color: #6600aa; }
                        .type-en_ligne   { background: #fff0e4; color: #c05a00; }
                        .type-default    { background: #f0f0f0; color: #555; }

                        /* ── Statut badge ── */
                        .statut-badge {
                            display: inline-flex; align-items: center; gap: 5px;
                            padding: 4px 10px; border-radius: 20px;
                            font-size: 11px; font-weight: 500;
                        }
                        .statut-badge .dot { width: 6px; height: 6px; border-radius: 50%; }
                        .statut-Confirmé      { background: #e8f5e2; color: #2a6a10; }
                        .statut-Confirmé .dot      { background: #4caf50; }
                        .statut-En-attente    { background: #fff8e4; color: #a06000; }
                        .statut-En-attente .dot    { background: #ff9800; }
                        .statut-Pas-encore-pris { background: #ffe4e4; color: #aa0000; }
                        .statut-Pas-encore-pris .dot { background: #e53935; }
                        .statut-default       { background: #f0f0f0; color: #555; }
                        .statut-default .dot       { background: #aaa; }

                        /* ── Boutons action ── */
                        .action-btns { display: flex; gap: 7px; justify-content: center; }
                        .btn-act {
                            width: 32px; height: 32px; border-radius: 9px;
                            display: flex; align-items: center; justify-content: center;
                            border: none; cursor: pointer; transition: 0.2s;
                            text-decoration: none; font-size: 12px;
                        }
                        .btn-act-edit { background: #e8f5e2; color: #2a6a10; }
                        .btn-act-edit:hover { background: #2a6a10; color: white; transform: scale(1.1); }
                        .btn-act-del  { background: #ffe4e4; color: #aa0000; }
                        .btn-act-del:hover  { background: #aa0000; color: white; transform: scale(1.1); }

                        /* ── Pied de carte ── */
                        .card-footer-bar {
                            padding: 10px 16px;
                            border-top: 1px solid #f0ece4;
                            background: #f5f0e8;
                            display: flex; align-items: center; justify-content: space-between;
                        }
                        .footer-label { font-size: 11px; color: #aaa; }
                        .footer-val   { font-size: 12px; font-weight: 500; color: #1a2e1a; }

                        /* ── Empty state ── */
                        .empty-state { text-align: center; padding: 60px 20px; grid-column: 1 / -1; }
                        .empty-state p {
                            font-family: 'DM Serif Display', serif;
                            font-size: 18px; color: #bbb; margin-top: 12px;
                        }

                        /* ── Modales ── */
                        .modal-overlay {
                            display: none; position: fixed; inset: 0;
                            background: rgba(0,0,0,0.45); z-index: 9999;
                            align-items: center; justify-content: center;
                        }
                        .modal-overlay.active { display: flex; }
                        .modal-box {
                            background: #fffdf8; border-radius: 20px;
                            padding: 36px 32px; max-width: 380px; width: 90%;
                            text-align: center; box-shadow: 0 20px 60px rgba(0,0,0,0.15);
                        }
                        .modal-icon {
                            width: 60px; height: 60px; background: #ffe4e4;
                            border-radius: 50%; display: flex; align-items: center;
                            justify-content: center; margin: 0 auto 16px;
                            font-size: 24px; color: #aa0000;
                        }
                        .modal-title { font-family: 'DM Serif Display', serif; font-size: 20px; color: #1a2e1a; margin-bottom: 8px; }
                        .modal-sub { font-size: 13px; color: #999; margin-bottom: 24px; }
                        .modal-actions { display: flex; gap: 10px; justify-content: center; }
                        .modal-cancel {
                            padding: 10px 24px; border-radius: 50px;
                            border: 1px solid #e8e2d8; background: #fffdf8;
                            font-size: 13px; font-family: 'DM Sans', sans-serif;
                            cursor: pointer; color: #555; transition: 0.2s;
                        }
                        .modal-cancel:hover { background: #f0ece4; }
                        .modal-confirm {
                            padding: 10px 24px; border-radius: 50px;
                            border: none; background: #aa0000; color: white;
                            font-size: 13px; font-family: 'DM Sans', sans-serif;
                            cursor: pointer; transition: 0.2s;
                        }
                        .modal-confirm:hover { background: #cc0000; }

                        /* ── Modale création/édition ── */
                        .modal-create-overlay {
                            display: none; position: fixed; inset: 0;
                            background: rgba(0,0,0,0.45); z-index: 9999;
                            align-items: center; justify-content: center;
                        }
                        .modal-create-overlay.active { display: flex; }
                        .modal-create-box {
                            background: #fffdf8; border-radius: 20px;
                            padding: 36px 32px; max-width: 520px; width: 95%;
                            box-shadow: 0 20px 60px rgba(0,0,0,0.15);
                        }
                        .modal-create-header {
                            display: flex; align-items: center;
                            justify-content: space-between; margin-bottom: 24px;
                        }
                        .modal-create-title { font-family: 'DM Serif Display', serif; font-size: 22px; color: #1a2e1a; }
                        .modal-close-btn {
                            width: 34px; height: 34px; border-radius: 10px;
                            border: 1px solid #e8e2d8; background: #fffdf8;
                            cursor: pointer; display: flex; align-items: center;
                            justify-content: center; color: #999; font-size: 16px; transition: 0.2s;
                        }
                        .modal-close-btn:hover { background: #ffe4e4; color: #aa0000; border-color: #ffcccc; }
                        .form-group { margin-bottom: 16px; }
                        .form-group label {
                            display: block; font-size: 11px; letter-spacing: 1px;
                            text-transform: uppercase; color: #999; margin-bottom: 6px; font-weight: 500;
                        }
                        .form-group select,
                        .form-group input[type=\"date\"],
                        .form-group input[type=\"time\"] {
                            width: 100%; padding: 11px 14px;
                            border: 1px solid #e8e2d8; border-radius: 12px;
                            font-size: 13px; font-family: 'DM Sans', sans-serif;
                            background: #fffdf8; color: #1a2e1a;
                            outline: none; transition: border-color 0.2s; appearance: auto;
                        }
                        .form-group select:focus,
                        .form-group input:focus { border-color: #3c8c3c; }
                        .form-row { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; }
                        .modal-form-actions { display: flex; gap: 10px; justify-content: flex-end; margin-top: 24px; }
                        .btn-form-cancel {
                            padding: 11px 24px; border-radius: 50px;
                            border: 1px solid #e8e2d8; background: #fffdf8;
                            font-size: 13px; font-family: 'DM Sans', sans-serif;
                            cursor: pointer; color: #555; transition: 0.2s;
                        }
                        .btn-form-cancel:hover { background: #f0ece4; }
                        .btn-form-submit {
                            padding: 11px 28px; border-radius: 50px;
                            border: none; background: #1a2e1a; color: #a8dc78;
                            font-size: 13px; font-family: 'DM Sans', sans-serif;
                            cursor: pointer; transition: 0.2s;
                        }
                        .btn-form-submit:hover { background: #2a4e2a; }
                        .form-group ul { list-style: none; padding: 0; margin: 4px 0 0; }
                        .form-group ul li {
                            font-size: 11px; color: #aa0000; background: #ffe4e4;
                            border-radius: 8px; padding: 5px 10px; margin-top: 4px;
                            display: flex; align-items: center; gap: 5px;
                        }
                        .form-group ul li::before { content: \"⚠\"; font-size: 11px; }

                        /* ── Carte cachée par filtre ── */
                        .doc-card.hidden { display: none; }
                        /* ── Séparateur entre jours ── */
                        tr.day-separator td {
                            padding: 0;
                            height: 6px;
                            background: #f5f0e8;
                            border-bottom: 2px solid #e8e2d8;
                        }
                        /* ── Carte scrollable ── */
                        .doc-card-body {
                            max-height: 420px;
                            overflow-y: auto;
                            scrollbar-width: thin;
                            scrollbar-color: #e8e2d8 transparent;
                        }
                        .doc-card-body::-webkit-scrollbar { width: 4px; }
                        .doc-card-body::-webkit-scrollbar-thumb { background: #e8e2d8; border-radius: 4px; }

                        /* ── Ligne pause ── */
                        .pause-row td {
                            background: #f5f0e8;
                            text-align: center;
                            padding: 5px 14px;
                            font-size: 10px;
                            letter-spacing: 1px;
                            text-transform: uppercase;
                            color: #bbb;
                            border-bottom: 1px dashed #e8e2d8;
                        }

                        /* ── Groupe jour : badge aligné verticalement au centre ── */
                        .td-jour-group {
                            vertical-align: top;
                            padding-top: 12px;
                        }

                        /* ── Lignes dans le même groupe sans bordure entre elles ── */
                        tr.same-day-row td {
                            border-top: none !important;
                        }
                        tr.same-day-row td:first-child {
                            visibility: hidden;
                        }

                        /* ── Première ligne d'un groupe ── */
                        tr.first-day-row td {
                            border-top: 2px solid #e8e2d8 !important;
                        }
                        tr.first-day-row:first-child td {
                            border-top: none !important;
                        }
                        .status-note {
    margin-bottom: 22px;
    padding: 12px 16px;
    background: #fffdf8;
    border: 1px solid #e8e2d8;
    border-left: 4px solid #3c8c3c;
    border-radius: 12px;
    font-size: 13px;
    color: #555;
    display: flex;
    gap: 12px;
    align-items: center;
    flex-wrap: wrap;
}

.note-item strong {
    color: #1a2e1a;
}

.note-separator {
    color: #bbb;
}
                    </style>

                    <div class=\"horaires-wrap\">

                        <!-- Header -->
                        <div class=\"horaires-header\">
                            <div>
                                <div class=\"page-eyebrow\">Nafseyti · Administration</div>
                                <h2>Horaires des <em>médecins</em></h2>
                            </div>
                            <button type=\"button\" class=\"btn-creer\" onclick=\"openCreateModal()\">
                                <span class=\"plus-icon\">
                                    <svg width=\"12\" height=\"12\" viewBox=\"0 0 12 12\">
                                        <path d=\"M6 2V10M2 6H10\" stroke=\"#3c8c3c\" stroke-width=\"2\" stroke-linecap=\"round\"/>
                                    </svg>
                                </span>
                                Nouveau rendez-vous
                            </button>
                        </div>

                        <!-- Stats bar -->
                        <div class=\"stats-bar\">
                            <div class=\"stat-chip\">
                                <div class=\"stat-chip-icon chip-green\">
                                    <i class=\"fa fa-calendar\" style=\"color:#2a6a10;\"></i>
                                </div>
                                <div>
                                    <div class=\"stat-chip-val\">{{ rendezvous|length }}</div>
                                    <div class=\"stat-chip-lbl\">Total</div>
                                </div>
                            </div>
                         
                            <div class=\"stat-chip\">
                                <div class=\"stat-chip-icon chip-blue\">
                                    <i class=\"fa fa-check-circle\" style=\"color:#0050aa;\"></i>
                                </div>
                                <div>
                                    <div class=\"stat-chip-val\">
                                        {{ rendezvous|filter(r => r.statut == 'Confirmé')|length }}
                                    </div>
                                    <div class=\"stat-chip-lbl\">Confirmés</div>
                                </div>
                            </div>
                            <div class=\"stat-chip\">
                                <div class=\"stat-chip-icon chip-red\">
                                    <i class=\"fa fa-times-circle\" style=\"color:#aa0000;\"></i>
                                </div>
                                <div>
                                    <div class=\"stat-chip-val\">
                                        {{ rendezvous|filter(r => r.statut == 'Pas encore pris')|length }}
                                    </div>
                                    <div class=\"stat-chip-lbl\">Pas encore pris</div>
                                </div>
                            </div>
                        </div>
                        <div class=\"status-note\">
                            <span class=\"note-item\">
                                ❌ <strong>Confirmé</strong> = Non disponible
                            </span>
                            <span class=\"note-separator\">|</span>
                            <span class=\"note-item\">
                                ✅ <strong>Pas encore pris</strong> = Disponible
                            </span>
                        </div>

                        <!-- Recherche & Filtre -->
                        <div class=\"search-row\">
                            <div class=\"search-box\">
                                <i class=\"fa fa-search search-icon\"></i>
                                <input type=\"text\"
                                       id=\"searchInput\"
                                       placeholder=\"Rechercher par médecin, jour, statut...\"
                                       oninput=\"filterCards()\" />
                            </div>
                            <select class=\"filter-select\" id=\"statutFilter\" onchange=\"filterCards()\">
                                <option value=\"\">Tous les statuts</option>
                                <option value=\"Confirmé\">Confirmé</option>
                                <option value=\"En attente\">En attente</option>
                                <option value=\"Pas encore pris\">Pas encore pris</option>
                            </select>
                        </div>

                        <!-- Grille médecins -->
                        <div class=\"doctors-grid\" id=\"doctorsGrid\">

                            {% set rdvParMedecin = {} %}
                            {% for rdv in rendezvous %}
                                {% set medecinKey = 'm' ~ rdv.medecin.id %}
                                {% if rdvParMedecin[medecinKey] is not defined %}
                                    {% set rdvParMedecin = rdvParMedecin|merge({
                                        (medecinKey): { 'medecin': rdv.medecin, 'rdvs': [] }
                                    }) %}
                                {% endif %}
                                {% set rdvParMedecin = rdvParMedecin|merge({
                                    (medecinKey): {
                                        'medecin': rdv.medecin,
                                        'rdvs': rdvParMedecin[medecinKey].rdvs|merge([rdv])
                                    }
                                }) %}
                            {% endfor %}

                            {% for medecinKey, data in rdvParMedecin %}
                                {% set medecin = data.medecin %}
                                {% set rdvs    = data.rdvs %}

                                {# Construire les data-attributes pour le filtrage JS #}
                                {% set statuts = [] %}
                                {% for rdv in rdvs %}
                                    {% set statuts = statuts|merge([rdv.statut]) %}
                                {% endfor %}

                                <div class=\"doc-card\"
                                     data-medecin=\"{{ (medecin.firstname ~ ' ' ~ medecin.lastname)|lower }}\"
                                     data-statuts=\"{{ statuts|join(',')|lower }}\">

                                    {# En-tête médecin #}
                                    <div class=\"doc-card-header\">
                                        <div class=\"doc-avatar\">
                                            {{ medecin.firstname|slice(0,1) }}{{ medecin.lastname|slice(0,1) }}
                                        </div>
                                        <div>
                                            <div class=\"doc-name\">Dr. {{ medecin.firstname }} {{ medecin.lastname }}</div>
                                            <div class=\"doc-spec\">
                                                {% if 'psychologue' in medecin.role %}
                                                    Psychologue clinicien
                                                {% elseif 'coach_vie' in medecin.role %}
                                                    Coach de vie
                                                {% else %}
                                                    Médecin
                                                {% endif %}
                                            </div>
                                        </div>
                                    </div>
                                    {# Tableau des rendez-vous #}
                                    <div class=\"doc-card-body\">
                                    <table class=\"schedule-table\">
                                        <thead>
                                            <tr>
                                                <th>Jour</th>
                                                <th>Créneaux</th>
                                                <th>Type</th>
                                                <th>Statut</th>
                                                <th style=\"text-align:center;\">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {% set joursOrdre = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche'] %}

                                            {# Grouper et trier par jour #}
                                            {% set rdvParJour = {} %}
                                            {% for rdv in rdvs %}
                                                {% set jour = rdv.dateRendezVous %}
                                                {% if rdvParJour[jour] is not defined %}
                                                    {% set rdvParJour = rdvParJour|merge({ (jour): [] }) %}
                                                {% endif %}
                                                {% set rdvParJour = rdvParJour|merge({ (jour): rdvParJour[jour]|merge([rdv]) }) %}
                                            {% endfor %}

                                            {% for jourNom in joursOrdre %}
                                                {% if rdvParJour[jourNom] is defined %}
                                                    {% set rdvsJour = rdvParJour[jourNom]|sort((a,b) => a.heureDebut <=> b.heureDebut) %}
                                                    {% set isPauseInserted = false %}

                                                    {% for i, rdv in rdvsJour %}

                                                        {# Insérer ligne PAUSE entre 12h et 14h (lundi-vendredi) #}
                                                        {% if jourNom != 'Samedi' and jourNom != 'Dimanche'
                                                            and not isPauseInserted
                                                            and rdv.heureDebut|date('H') >= 14
                                                            and (i == 0 or rdvsJour[i-1].heureFin|date('H') <= 12) %}
                                                            <tr class=\"pause-row\">
                                                                <td colspan=\"5\">☕ Pause — 12:00 · 14:00</td>
                                                            </tr>
                                                            {% set isPauseInserted = true %}
                                                        {% endif %}

                                                        <tr class=\"{{ i == 0 ? 'first-day-row' : 'same-day-row' }}\">

                                                            {# Jour — badge seulement sur la 1ère ligne #}
                                                            <td class=\"{{ i == 0 ? 'td-jour-group' : '' }}\">
                                                                {% if i == 0 %}
                                                                    <span class=\"day-badge {% if jourNom == 'Samedi' or jourNom == 'Dimanche' %}day-sam{% else %}day-work{% endif %}\">
                                                                        {{ jourNom }}
                                                                    </span>
                                                                {% endif %}
                                                            </td>

                                                            {# Créneau #}
                                                            <td>
                                                                <span class=\"slot-pill\">
                                                                    {{ rdv.heureDebut|date('H:i') }}–{{ rdv.heureFin|date('H:i') }}
                                                                </span>
                                                            </td>

                                                            {# Type séance #}
                                                            <td>
                                                                {% if rdv.typeSeance == 'Présentiel' %}
                                                                    <span class=\"type-badge type-individuel\">Présentiel</span>
                                                                {% elseif rdv.typeSeance == 'en_ligne' %}
                                                                    <span class=\"type-badge type-en_ligne\">en_ligne</span>
                                                                {% else %}
                                                                    <span class=\"type-badge type-default\">{{ rdv.typeSeance ?? '—' }}</span>
                                                                {% endif %}
                                                            </td>

                                                            {# Statut #}
                                                            <td>
                                                                {% if rdv.statut == 'Confirmé' %}
                                                                    <span class=\"statut-badge statut-Confirmé\"><span class=\"dot\"></span> Confirmé</span>
                                                                {% elseif rdv.statut == 'En attente' %}
                                                                    <span class=\"statut-badge statut-En-attente\"><span class=\"dot\"></span> En attente</span>
                                                                {% elseif rdv.statut == 'Pas encore pris' %}
                                                                    <span class=\"statut-badge statut-Pas-encore-pris\"><span class=\"dot\"></span> Pas encore pris</span>
                                                                {% else %}
                                                                    <span class=\"statut-badge statut-default\"><span class=\"dot\"></span> {{ rdv.statut ?? '—' }}</span>
                                                                {% endif %}
                                                            </td>

                                                            {# Actions #}
                                                            <td style=\"text-align:center;\">
                                                                <div class=\"action-btns\">
                                                                    <button class=\"btn-act btn-act-edit\" title=\"Modifier\"
                                                                            onclick=\"openEditModal({{ rdv.id }})\">
                                                                        <i class=\"fa fa-pencil\"></i>
                                                                    </button>
                                                                    <button class=\"btn-act btn-act-del\" title=\"Supprimer\"
                                                                            onclick=\"openDeleteModal({{ rdv.id }})\">
                                                                        <i class=\"fa fa-trash\"></i>
                                                                    </button>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    {% endfor %}

                                                    {# Séparateur entre jours #}
                                                    <tr class=\"day-separator\"><td colspan=\"5\"></td></tr>
                                                {% endif %}
                                            {% endfor %}
                                        </tbody>
                                    </table>
                                    </div>

                                    {# Pied de carte #}
                                    <div class=\"card-footer-bar\">
                                        <span class=\"footer-label\">Total créneaux</span>
                                        <span class=\"footer-val\">{{ rdvs|length }} plages</span>
                                    </div>

                                </div>

                            {% else %}
                                <div class=\"empty-state\">
                                    <svg width=\"64\" height=\"64\" viewBox=\"0 0 64 64\" fill=\"none\">
                                        <circle cx=\"32\" cy=\"32\" r=\"30\" fill=\"#f0f0e8\" stroke=\"#ddd\" stroke-width=\"1\"/>
                                        <rect x=\"18\" y=\"20\" width=\"28\" height=\"26\" rx=\"4\" fill=\"#ddd\"/>
                                        <rect x=\"22\" y=\"26\" width=\"20\" height=\"3\" rx=\"1\" fill=\"white\"/>
                                        <rect x=\"22\" y=\"32\" width=\"14\" height=\"3\" rx=\"1\" fill=\"white\"/>
                                        <rect x=\"22\" y=\"38\" width=\"16\" height=\"3\" rx=\"1\" fill=\"white\"/>
                                    </svg>
                                    <p>Aucun rendez-vous trouvé</p>
                                </div>
                            {% endfor %}

                        </div>{# fin doctors-grid #}

                        {# Message aucun résultat après filtrage JS #}
                        <div id=\"noResults\" style=\"display:none; text-align:center; padding:60px 20px;\">
                            <svg width=\"64\" height=\"64\" viewBox=\"0 0 64 64\" fill=\"none\">
                                <circle cx=\"32\" cy=\"32\" r=\"30\" fill=\"#f0f0e8\" stroke=\"#ddd\" stroke-width=\"1\"/>
                                <rect x=\"18\" y=\"20\" width=\"28\" height=\"26\" rx=\"4\" fill=\"#ddd\"/>
                                <rect x=\"22\" y=\"26\" width=\"20\" height=\"3\" rx=\"1\" fill=\"white\"/>
                                <rect x=\"22\" y=\"32\" width=\"14\" height=\"3\" rx=\"1\" fill=\"white\"/>
                            </svg>
                            <p style=\"font-family:'DM Serif Display',serif; font-size:18px; color:#bbb; margin-top:12px;\">
                                Aucun médecin trouvé
                            </p>
                        </div>

                    </div>{# fin horaires-wrap #}

                    <!-- ── Modal Supprimer ── -->
                    <div class=\"modal-overlay\" id=\"deleteModal\">
                        <div class=\"modal-box\">
                            <div class=\"modal-icon\"><i class=\"fa fa-trash\"></i></div>
                            <div class=\"modal-title\">Supprimer ce rendez-vous ?</div>
                            <div class=\"modal-sub\">Cette action est irréversible. Le rendez-vous sera définitivement supprimé.</div>
                            <div class=\"modal-actions\">
                                <button class=\"modal-cancel\" onclick=\"closeDeleteModal()\">Annuler</button>
                                <form id=\"deleteForm\" method=\"post\" style=\"display:inline;\">
                                    <input type=\"hidden\" name=\"_token\" id=\"deleteToken\">
                                    <button type=\"submit\" class=\"modal-confirm\">Supprimer</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- ── Modal Créer ── -->
                    <div class=\"modal-create-overlay\" id=\"createModal\">
                        <div class=\"modal-create-box\">
                            <div class=\"modal-create-header\">
                                <div class=\"modal-create-title\">Nouveau rendez-vous</div>
                                <button class=\"modal-close-btn\" onclick=\"closeCreateModal()\" type=\"button\">
                                    <i class=\"fa fa-times\"></i>
                                </button>
                            </div>

                            {{ form_start(createForm, {
                                'action': path('admin_liste_rendezvous'),
                                'method': 'POST',
                                'attr': {'novalidate': 'novalidate'}
                            }) }}
                                {{ form_errors(createForm) }}

                                <div class=\"form-group\">
                                    {{ form_label(createForm.medecin, 'Médecin / Psychologue') }}
                                    {{ form_widget(createForm.medecin) }}
                                    {{ form_errors(createForm.medecin) }}
                                </div>
                                <div class=\"form-group\">
                                    {{ form_label(createForm.dateRendezVous, 'Date') }}
                                    {{ form_widget(createForm.dateRendezVous) }}
                                    {{ form_errors(createForm.dateRendezVous) }}
                                </div>
                                <div class=\"form-row\">
                                    <div class=\"form-group\">
                                        {{ form_label(createForm.heureDebut, 'Heure début') }}
                                        {{ form_widget(createForm.heureDebut) }}
                                        {{ form_errors(createForm.heureDebut) }}
                                    </div>
                                    <div class=\"form-group\">
                                        {{ form_label(createForm.heureFin, 'Heure fin') }}
                                        {{ form_widget(createForm.heureFin) }}
                                        {{ form_errors(createForm.heureFin) }}
                                    </div>
                                </div>
                                <div class=\"form-group\">
                                    {{ form_label(createForm.typeSeance, 'Type de séance') }}
                                    {{ form_widget(createForm.typeSeance) }}
                                    {{ form_errors(createForm.typeSeance) }}
                                </div>
                                <div class=\"form-group\">
                                    {{ form_label(createForm.statut, 'Statut') }}
                                    {{ form_widget(createForm.statut) }}
                                    {{ form_errors(createForm.statut) }}
                                </div>
                                <div class=\"modal-form-actions\">
                                    <button type=\"button\" class=\"btn-form-cancel\" onclick=\"closeCreateModal()\">Annuler</button>
                                    <button type=\"submit\" class=\"btn-form-submit\">
                                        <i class=\"fa fa-check\" style=\"margin-right:6px;\"></i> Enregistrer
                                    </button>
                                </div>
                            {{ form_end(createForm) }}
                        </div>
                    </div>

                    <!-- ── Modal Modifier ── -->
                    <div class=\"modal-create-overlay\" id=\"editModal\">
                        <div class=\"modal-create-box\">
                            <div class=\"modal-create-header\">
                                <div class=\"modal-create-title\">Modifier le rendez-vous</div>
                                <button class=\"modal-close-btn\" onclick=\"closeEditModal()\" type=\"button\">
                                    <i class=\"fa fa-times\"></i>
                                </button>
                            </div>

                            {% if editForm is defined %}
                                {{ form_start(editForm, {
                                    'action': path('admin_rendezvous_edit', {'id': editRdvId}),
                                    'method': 'POST',
                                    'attr': {'novalidate': 'novalidate'}
                                }) }}
                                    {{ form_errors(editForm) }}

                                    <div class=\"form-group\">
                                        {{ form_label(editForm.medecin, 'Médecin / Psychologue') }}
                                        {{ form_widget(editForm.medecin) }}
                                        {{ form_errors(editForm.medecin) }}
                                    </div>
                                    <div class=\"form-group\">
                                        {{ form_label(editForm.dateRendezVous, 'Date') }}
                                        {{ form_widget(editForm.dateRendezVous) }}
                                        {{ form_errors(editForm.dateRendezVous) }}
                                    </div>
                                    <div class=\"form-row\">
                                        <div class=\"form-group\">
                                            {{ form_label(editForm.heureDebut, 'Heure début') }}
                                            {{ form_widget(editForm.heureDebut) }}
                                            {{ form_errors(editForm.heureDebut) }}
                                        </div>
                                        <div class=\"form-group\">
                                            {{ form_label(editForm.heureFin, 'Heure fin') }}
                                            {{ form_widget(editForm.heureFin) }}
                                            {{ form_errors(editForm.heureFin) }}
                                        </div>
                                    </div>
                                    <div class=\"form-group\">
                                        {{ form_label(editForm.typeSeance, 'Type de séance') }}
                                        {{ form_widget(editForm.typeSeance) }}
                                        {{ form_errors(editForm.typeSeance) }}
                                    </div>
                                    <div class=\"form-group\">
                                        {{ form_label(editForm.statut, 'Statut') }}
                                        {{ form_widget(editForm.statut) }}
                                        {{ form_errors(editForm.statut) }}
                                    </div>
                                    <div class=\"modal-form-actions\">
                                        <button type=\"button\" class=\"btn-form-cancel\" onclick=\"closeEditModal()\">Annuler</button>
                                        <button type=\"submit\" class=\"btn-form-submit\">
                                            <i class=\"fa fa-check\" style=\"margin-right:6px;\"></i> Enregistrer
                                        </button>
                                    </div>
                                {{ form_end(editForm) }}
                            {% endif %}
                        </div>
                    </div>

                    <script>
                        // ── Filtrage des cartes médecins ──
                        function filterCards() {
                            const search = document.getElementById('searchInput').value.toLowerCase().trim();
                            const statut = document.getElementById('statutFilter').value.toLowerCase();
                            const cards  = document.querySelectorAll('.doc-card');
                            let visible  = 0;

                            cards.forEach(function(card) {
                                const nomMedecin = card.getAttribute('data-medecin') || '';
                                const statuts    = card.getAttribute('data-statuts')  || '';

                                const matchSearch = search === '' || nomMedecin.includes(search);
                                const matchStatut = statut === '' || statuts.includes(statut);

                                if (matchSearch && matchStatut) {
                                    card.classList.remove('hidden');
                                    visible++;
                                } else {
                                    card.classList.add('hidden');
                                }
                            });

                            document.getElementById('noResults').style.display = (visible === 0) ? 'block' : 'none';
                        }

                        // ── Delete ──
                        function openDeleteModal(id) {
                            document.getElementById('deleteModal').classList.add('active');
                            document.getElementById('deleteForm').action = '/admin/rendezvous/' + id + '/delete';
                            document.getElementById('deleteToken').value = 'delete' + id;
                        }
                        function closeDeleteModal() {
                            document.getElementById('deleteModal').classList.remove('active');
                        }
                        document.getElementById('deleteModal').addEventListener('click', function(e) {
                            if (e.target === this) closeDeleteModal();
                        });

                        // ── Create ──
                        function openCreateModal() {
                            document.getElementById('createModal').classList.add('active');
                            document.body.style.overflow = 'hidden';
                        }
                        function closeCreateModal() {
                            document.getElementById('createModal').classList.remove('active');
                            document.body.style.overflow = '';
                        }
                        document.getElementById('createModal').addEventListener('click', function(e) {
                            if (e.target === this) closeCreateModal();
                        });

                        // ── Edit ──
                        function openEditModal(id) {
                            window.location.href = '/admin/liste_rendezvous/' + id + '/edit';
                        }
                        function closeEditModal() {
                            document.getElementById('editModal').classList.remove('active');
                            document.body.style.overflow = '';
                        }
                        document.getElementById('editModal').addEventListener('click', function(e) {
                            if (e.target === this) closeEditModal();
                        });

                        // ── Rouvrir si erreurs de validation ──
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
{% endblock %}", "back/rendezvous_liste.html.twig", "C:\\Users\\sirine\\psy\\templates\\back\\rendezvous_liste.html.twig");
    }
}
