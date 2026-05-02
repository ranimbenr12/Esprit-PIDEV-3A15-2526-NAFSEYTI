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

/* back/test/index.html.twig */
class __TwigTemplate_9fa4ccf8b65c12bcb93705b7fc68eec5 extends Template
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
            'test_active' => [$this, 'block_test_active'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'admin_content' => [$this, 'block_admin_content'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "back/admin_base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/test/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/test/index.html.twig"));

        $this->parent = $this->load("back/admin_base.html.twig", 1);
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

        yield "Gestion des Tests";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 4
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_test_active(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "test_active"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "test_active"));

        yield "active";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 6
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

        // line 7
        yield "    ";
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
    <link rel=\"stylesheet\" href=\"";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("styles/tests/index.css"), "html", null, true);
        yield "\">
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 11
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_admin_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_content"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_content"));

        // line 12
        yield "
<div class=\"nt-page\">

    ";
        // line 16
        yield "    <div class=\"nt-header\">
        <div class=\"nt-header-left\">
            <div class=\"nt-eyebrow\">Administration</div>
            <h1 class=\"nt-title\">Tests <em>Psychologiques</em></h1>
        </div>
        <a href=\"";
        // line 21
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_test_new");
        yield "\" class=\"btn-create\">
            <svg width=\"14\" height=\"14\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2.5\" viewBox=\"0 0 24 24\"><line x1=\"12\" y1=\"5\" x2=\"12\" y2=\"19\"/><line x1=\"5\" y1=\"12\" x2=\"19\" y2=\"12\"/></svg>
            Nouveau test
        </a>
    </div>

    ";
        // line 28
        yield "    <div class=\"stat-grid\">
        <div class=\"stat-card total\">
            <div class=\"stat-icon-wrap\">
                <svg width=\"22\" height=\"22\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"1.8\" viewBox=\"0 0 24 24\"><path d=\"M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2\"/><rect x=\"9\" y=\"3\" width=\"6\" height=\"4\" rx=\"2\"/><line x1=\"9\" y1=\"12\" x2=\"15\" y2=\"12\"/><line x1=\"9\" y1=\"16\" x2=\"13\" y2=\"16\"/></svg>
            </div>
            <div>
                <div class=\"stat-num\">";
        // line 34
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalTests"]) || array_key_exists("totalTests", $context) ? $context["totalTests"] : (function () { throw new RuntimeError('Variable "totalTests" does not exist.', 34, $this->source); })()), "html", null, true);
        yield "</div>
                <div class=\"stat-label\">Total des tests</div>
            </div>
        </div>
        <div class=\"stat-card active\">
            <div class=\"stat-icon-wrap\">
                <svg width=\"22\" height=\"22\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"1.8\" viewBox=\"0 0 24 24\"><path d=\"M22 11.08V12a10 10 0 1 1-5.93-9.14\"/><polyline points=\"22 4 12 14.01 9 11.01\"/></svg>
            </div>
            <div>
                <div class=\"stat-num\">";
        // line 43
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["testsActifs"]) || array_key_exists("testsActifs", $context) ? $context["testsActifs"] : (function () { throw new RuntimeError('Variable "testsActifs" does not exist.', 43, $this->source); })()), "html", null, true);
        yield "</div>
                <div class=\"stat-label\">Tests actifs</div>
            </div>
        </div>
        <div class=\"stat-card inactive\">
            <div class=\"stat-icon-wrap\">
                <svg width=\"22\" height=\"22\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"1.8\" viewBox=\"0 0 24 24\"><circle cx=\"12\" cy=\"12\" r=\"10\"/><line x1=\"4.93\" y1=\"4.93\" x2=\"19.07\" y2=\"19.07\"/></svg>
            </div>
            <div>
                <div class=\"stat-num\">";
        // line 52
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["testsInactifs"]) || array_key_exists("testsInactifs", $context) ? $context["testsInactifs"] : (function () { throw new RuntimeError('Variable "testsInactifs" does not exist.', 52, $this->source); })()), "html", null, true);
        yield "</div>
                <div class=\"stat-label\">Tests inactifs</div>
            </div>
        </div>
    </div>

    ";
        // line 59
        yield "    <div class=\"search-panel\">
        <form id=\"searchForm\" class=\"search-form\">
            <div class=\"search-field\">
                <svg width=\"15\" height=\"15\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\"><circle cx=\"11\" cy=\"11\" r=\"7\"/><line x1=\"21\" y1=\"21\" x2=\"16.65\" y2=\"16.65\"/></svg>
                <input type=\"text\" name=\"search\" id=\"searchInput\"
                       placeholder=\"Rechercher par titre ou description...\"
                       value=\"";
        // line 65
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 65, $this->source); })()), "html", null, true);
        yield "\">
            </div>

            <select name=\"status\" id=\"filterStatus\" class=\"filter-sel\">
                <option value=\"\">Tous les statuts</option>
                <option value=\"actif\"   ";
        // line 70
        yield ((((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 70, $this->source); })()) == "actif")) ? ("selected") : (""));
        yield ">Actif</option>
                <option value=\"inactif\" ";
        // line 71
        yield ((((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 71, $this->source); })()) == "inactif")) ? ("selected") : (""));
        yield ">Inactif</option>
            </select>

            <select name=\"categorie\" id=\"filterCategorie\" class=\"filter-sel\">
                <option value=\"\">Toutes les catégories</option>
                <option value=\"personnalite\" ";
        // line 76
        yield ((((isset($context["categorie"]) || array_key_exists("categorie", $context) ? $context["categorie"] : (function () { throw new RuntimeError('Variable "categorie" does not exist.', 76, $this->source); })()) == "personnalite")) ? ("selected") : (""));
        yield ">Personnalité</option>
                <option value=\"intelligence\" ";
        // line 77
        yield ((((isset($context["categorie"]) || array_key_exists("categorie", $context) ? $context["categorie"] : (function () { throw new RuntimeError('Variable "categorie" does not exist.', 77, $this->source); })()) == "intelligence")) ? ("selected") : (""));
        yield ">Intelligence</option>
                <option value=\"competences\"  ";
        // line 78
        yield ((((isset($context["categorie"]) || array_key_exists("categorie", $context) ? $context["categorie"] : (function () { throw new RuntimeError('Variable "categorie" does not exist.', 78, $this->source); })()) == "competences")) ? ("selected") : (""));
        yield ">Compétences</option>
                <option value=\"aptitudes\"    ";
        // line 79
        yield ((((isset($context["categorie"]) || array_key_exists("categorie", $context) ? $context["categorie"] : (function () { throw new RuntimeError('Variable "categorie" does not exist.', 79, $this->source); })()) == "aptitudes")) ? ("selected") : (""));
        yield ">Aptitudes</option>
                <option value=\"comportement\" ";
        // line 80
        yield ((((isset($context["categorie"]) || array_key_exists("categorie", $context) ? $context["categorie"] : (function () { throw new RuntimeError('Variable "categorie" does not exist.', 80, $this->source); })()) == "comportement")) ? ("selected") : (""));
        yield ">Comportement</option>
            </select>

            <button type=\"submit\" class=\"btn-filter\">
                <svg width=\"13\" height=\"13\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2.5\" viewBox=\"0 0 24 24\"><polygon points=\"22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3\"/></svg>
                Filtrer
                <span class=\"ajax-spinner\" id=\"spinner\"></span>
            </button>

            <button type=\"button\" id=\"btnReset\" class=\"btn-reset\"
                    style=\"";
        // line 90
        yield (((((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 90, $this->source); })()) || (isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 90, $this->source); })())) || (isset($context["categorie"]) || array_key_exists("categorie", $context) ? $context["categorie"] : (function () { throw new RuntimeError('Variable "categorie" does not exist.', 90, $this->source); })()))) ? ("") : ("display:none"));
        yield "\">
                <svg width=\"13\" height=\"13\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2.5\" viewBox=\"0 0 24 24\"><line x1=\"18\" y1=\"6\" x2=\"6\" y2=\"18\"/><line x1=\"6\" y1=\"6\" x2=\"18\" y2=\"18\"/></svg>
                Réinitialiser
            </button>
        </form>
    </div>

    ";
        // line 98
        yield "    <div id=\"tableWrapper\">
        <div class=\"tbl-card\">
            <table>
                <thead>
                    <tr>
                        <th style=\"width:60px\">
                            <a href=\"#\" class=\"sort-link ";
        // line 104
        yield ((((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 104, $this->source); })()) == "id")) ? ("active") : (""));
        yield "\"
                               data-sort=\"id\"
                               data-order=\"";
        // line 106
        yield (((((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 106, $this->source); })()) == "id") && ((isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 106, $this->source); })()) == "ASC"))) ? ("DESC") : ("ASC"));
        yield "\">
                                ID <span class=\"sort-icon ";
        // line 107
        yield ((((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 107, $this->source); })()) == "id")) ? ("on") : (""));
        yield "\">";
        yield ((((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 107, $this->source); })()) == "id")) ? (((((isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 107, $this->source); })()) == "ASC")) ? ("▲") : ("▼"))) : ("▲"));
        yield "</span>
                            </a>
                        </th>
                        <th>
                            <a href=\"#\" class=\"sort-link ";
        // line 111
        yield ((((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 111, $this->source); })()) == "titre")) ? ("active") : (""));
        yield "\"
                               data-sort=\"titre\"
                               data-order=\"";
        // line 113
        yield (((((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 113, $this->source); })()) == "titre") && ((isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 113, $this->source); })()) == "ASC"))) ? ("DESC") : ("ASC"));
        yield "\">
                                Titre <span class=\"sort-icon ";
        // line 114
        yield ((((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 114, $this->source); })()) == "titre")) ? ("on") : (""));
        yield "\">";
        yield ((((isset($context["sort"]) || array_key_exists("sort", $context) ? $context["sort"] : (function () { throw new RuntimeError('Variable "sort" does not exist.', 114, $this->source); })()) == "titre")) ? (((((isset($context["order"]) || array_key_exists("order", $context) ? $context["order"] : (function () { throw new RuntimeError('Variable "order" does not exist.', 114, $this->source); })()) == "ASC")) ? ("▲") : ("▼"))) : ("▲"));
        yield "</span>
                            </a>
                        </th>
                        <th>Catégorie</th>
                        <th>Niveau</th>
                        <th>Durée</th>
                        <th>Questions</th>
                        <th>Statut</th>
                        <th style=\"width:120px; text-align:center;\">Actions</th>
                    </tr>
                </thead>
                <tbody id=\"tableBody\">
                    ";
        // line 126
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["tests"]) || array_key_exists("tests", $context) ? $context["tests"] : (function () { throw new RuntimeError('Variable "tests" does not exist.', 126, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["test"]) {
            // line 127
            yield "                    <tr>
                        <td><span class=\"cell-id\">#";
            // line 128
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["test"], "id", [], "any", false, false, false, 128), "html", null, true);
            yield "</span></td>
                        <td class=\"cell-title\">
                            <strong>";
            // line 130
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["test"], "titre", [], "any", false, false, false, 130), "html", null, true);
            yield "</strong>
                            ";
            // line 131
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["test"], "description", [], "any", false, false, false, 131)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 132
                yield "                                <small>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["test"], "description", [], "any", false, false, false, 132), 0, 70), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["test"], "description", [], "any", false, false, false, 132)) > 70)) {
                    yield "…";
                }
                yield "</small>
                            ";
            }
            // line 134
            yield "                        </td>
                        <td><span class=\"badge badge-cat\">";
            // line 135
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["test"], "categorie", [], "any", false, false, false, 135)), "html", null, true);
            yield "</span></td>
                        <td><span class=\"badge badge-niveau\">";
            // line 136
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["test"], "niveau", [], "any", false, false, false, 136)), "html", null, true);
            yield "</span></td>
                        <td style=\"color:var(--ink-soft); font-weight:500;\">
                            ";
            // line 138
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["test"], "duree", [], "any", false, false, false, 138)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((CoreExtension::getAttribute($this->env, $this->source, $context["test"], "duree", [], "any", false, false, false, 138) . " min"), "html", null, true)) : ("—"));
            yield "
                        </td>
                        <td>
                            <span class=\"badge badge-q\">
                                ";
            // line 142
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["test"], "questions", [], "any", false, false, false, 142)), "html", null, true);
            yield "
                                ";
            // line 143
            yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["test"], "questions", [], "any", false, false, false, 143)) > 1)) ? ("questions") : ("question"));
            yield "
                            </span>
                        </td>
                        <td>
                            ";
            // line 147
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["test"], "status", [], "any", false, false, false, 147) == "actif")) {
                // line 148
                yield "                                <span class=\"badge badge-actif\">
                                    <svg width=\"8\" height=\"8\" viewBox=\"0 0 8 8\" fill=\"currentColor\"><circle cx=\"4\" cy=\"4\" r=\"4\"/></svg>
                                    Actif
                                </span>
                            ";
            } else {
                // line 153
                yield "                                <span class=\"badge badge-inact\">
                                    <svg width=\"8\" height=\"8\" viewBox=\"0 0 8 8\" fill=\"currentColor\"><circle cx=\"4\" cy=\"4\" r=\"4\"/></svg>
                                    Inactif
                                </span>
                            ";
            }
            // line 158
            yield "                        </td>
                        <td>
                            <div class=\"actions\" style=\"justify-content:center;\">
                                <a href=\"";
            // line 161
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_test_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["test"], "id", [], "any", false, false, false, 161)]), "html", null, true);
            yield "\" class=\"btn-act view\" title=\"Voir\">
                                    <svg width=\"15\" height=\"15\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\"><path d=\"M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12z\"/><circle cx=\"12\" cy=\"12\" r=\"3\"/></svg>
                                </a>
                                <a href=\"";
            // line 164
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_test_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["test"], "id", [], "any", false, false, false, 164)]), "html", null, true);
            yield "\" class=\"btn-act edit\" title=\"Modifier\">
                                    <svg width=\"15\" height=\"15\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\"><path d=\"M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7\"/><path d=\"M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z\"/></svg>
                                </a>
                                <button type=\"button\" class=\"btn-act del\" title=\"Supprimer\"
                                        onclick=\"deleteTest(";
            // line 168
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["test"], "id", [], "any", false, false, false, 168), "html", null, true);
            yield ", '";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["test"], "titre", [], "any", false, false, false, 168), "js"), "html", null, true);
            yield "')\">
                                    <svg width=\"15\" height=\"15\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\"><polyline points=\"3 6 5 6 21 6\"/><path d=\"M19 6l-1 14H6L5 6\"/><path d=\"M10 11v6M14 11v6\"/><path d=\"M9 6V4h6v2\"/></svg>
                                </button>
                            </div>
                            <form id=\"delete-form-";
            // line 172
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["test"], "id", [], "any", false, false, false, 172), "html", null, true);
            yield "\" method=\"post\"
                                  action=\"";
            // line 173
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_test_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["test"], "id", [], "any", false, false, false, 173)]), "html", null, true);
            yield "\"
                                  style=\"display:none;\">
                                <input type=\"hidden\" name=\"_token\" value=\"";
            // line 175
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["test"], "id", [], "any", false, false, false, 175))), "html", null, true);
            yield "\">
                            </form>
                        </td>
                    </tr>
                    ";
            $context['_iterated'] = true;
        }
        // line 179
        if (!$context['_iterated']) {
            // line 180
            yield "                    <tr>
                        <td colspan=\"8\">
                            <div class=\"empty-state\">
                                <div class=\"empty-circle\">
                                    <svg width=\"30\" height=\"30\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"1.5\" viewBox=\"0 0 24 24\"><path d=\"M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2\"/><rect x=\"9\" y=\"3\" width=\"6\" height=\"4\" rx=\"2\"/></svg>
                                </div>
                                <h4>Aucun test trouvé</h4>
                                <p>Commencez par créer votre premier test psychologique.</p>
                                <a href=\"";
            // line 188
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_test_new");
            yield "\" class=\"btn-create\" style=\"margin:0 auto;\">
                                    <svg width=\"13\" height=\"13\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2.5\" viewBox=\"0 0 24 24\"><line x1=\"12\" y1=\"5\" x2=\"12\" y2=\"19\"/><line x1=\"5\" y1=\"12\" x2=\"19\" y2=\"12\"/></svg>
                                    Créer un test
                                </a>
                            </div>
                        </td>
                    </tr>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['test'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 196
        yield "                </tbody>
            </table>
        </div>

        <div id=\"resultInfo\">
            ";
        // line 201
        if ((((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 201, $this->source); })()) || (isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 201, $this->source); })())) || (isset($context["categorie"]) || array_key_exists("categorie", $context) ? $context["categorie"] : (function () { throw new RuntimeError('Variable "categorie" does not exist.', 201, $this->source); })()))) {
            // line 202
            yield "            <div class=\"result-info\">
                <svg width=\"13\" height=\"13\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\"><circle cx=\"12\" cy=\"12\" r=\"9\"/><line x1=\"12\" y1=\"8\" x2=\"12\" y2=\"12\"/><line x1=\"12\" y1=\"16\" x2=\"12.01\" y2=\"16\"/></svg>
                <strong>";
            // line 204
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["tests"]) || array_key_exists("tests", $context) ? $context["tests"] : (function () { throw new RuntimeError('Variable "tests" does not exist.', 204, $this->source); })())), "html", null, true);
            yield "</strong> résultat";
            yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["tests"]) || array_key_exists("tests", $context) ? $context["tests"] : (function () { throw new RuntimeError('Variable "tests" does not exist.', 204, $this->source); })())) > 1)) ? ("s") : (""));
            yield " trouvé";
            yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["tests"]) || array_key_exists("tests", $context) ? $context["tests"] : (function () { throw new RuntimeError('Variable "tests" does not exist.', 204, $this->source); })())) > 1)) ? ("s") : (""));
            yield "
            </div>
            ";
        }
        // line 207
        yield "        </div>
    </div>

</div>

";
        // line 212
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 331
        yield "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 212
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

        // line 213
        yield "<script src=\"https://cdn.jsdelivr.net/npm/sweetalert2@11\"></script>
<script>

function deleteTest(id, titre) {
    Swal.fire({
        title: 'Supprimer ce test ?',
        html: '<span style=\"color:#4a5060\">Le test <strong>' + titre + '</strong> sera définitivement supprimé.</span>',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#c0392b',
        cancelButtonColor: '#2d6a4f',
        confirmButtonText: 'Supprimer',
        cancelButtonText: 'Annuler',
    }).then(function(result) {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
        }
    });
}

const ajaxUrl         = '";
        // line 233
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_test_search_ajax");
        yield "';
const searchInput     = document.getElementById('searchInput');
const filterStatus    = document.getElementById('filterStatus');
const filterCategorie = document.getElementById('filterCategorie');
const tableBody       = document.getElementById('tableBody');
const tableWrapper    = document.getElementById('tableWrapper');
const resultInfo      = document.getElementById('resultInfo');
const spinner         = document.getElementById('spinner');
const btnReset        = document.getElementById('btnReset');
const searchForm      = document.getElementById('searchForm');

let searchTimeout = null;

function doSearch() {
    var params = new URLSearchParams({
        search:    searchInput.value,
        status:    filterStatus.value,
        categorie: filterCategorie.value,
    });

    var hasFilters = searchInput.value || filterStatus.value || filterCategorie.value;
    btnReset.style.display = hasFilters ? 'inline-flex' : 'none';

    spinner.classList.add('visible');
    tableWrapper.classList.add('loading');

    fetch(ajaxUrl + '?' + params.toString(), {
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
    .then(function(res) { return res.json(); })
    .then(function(data) {
        tableBody.innerHTML = data.html;
        if (hasFilters) {
            var n = data.count;
            resultInfo.innerHTML =
                '<div class=\"result-info\">' +
                '<svg width=\"13\" height=\"13\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\"><circle cx=\"12\" cy=\"12\" r=\"9\"/><line x1=\"12\" y1=\"8\" x2=\"12\" y2=\"12\"/><line x1=\"12\" y1=\"16\" x2=\"12.01\" y2=\"16\"/></svg>' +
                '<strong>' + n + '</strong> résultat' + (n > 1 ? 's' : '') + ' trouvé' + (n > 1 ? 's' : '') +
                '</div>';
        } else {
            resultInfo.innerHTML = '';
        }
    })
    .catch(function() {
        resultInfo.innerHTML = '<div class=\"result-info\" style=\"border-color:#f5a99c;background:#fdf0ee;color:#c0392b;\">Erreur lors de la recherche.</div>';
    })
    .finally(function() {
        spinner.classList.remove('visible');
        tableWrapper.classList.remove('loading');
    });
}

searchInput.addEventListener('keyup', function() {
    clearTimeout(searchTimeout);
    searchTimeout = setTimeout(doSearch, 400);
});

filterStatus.addEventListener('change', doSearch);
filterCategorie.addEventListener('change', doSearch);

searchForm.addEventListener('submit', function(e) {
    e.preventDefault();
    doSearch();
});

btnReset.addEventListener('click', function() {
    searchInput.value     = '';
    filterStatus.value    = '';
    filterCategorie.value = '';
    doSearch();
});

document.querySelectorAll('.sort-link').forEach(function(link) {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        var params = new URLSearchParams({
            search:    searchInput.value,
            status:    filterStatus.value,
            categorie: filterCategorie.value,
            sort:      this.dataset.sort,
            order:     this.dataset.order,
        });
        spinner.classList.add('visible');
        tableWrapper.classList.add('loading');
        fetch(ajaxUrl + '?' + params.toString(), {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(function(res) { return res.json(); })
        .then(function(data) { tableBody.innerHTML = data.html; })
        .finally(function() {
            spinner.classList.remove('visible');
            tableWrapper.classList.remove('loading');
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
        return "back/test/index.html.twig";
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
        return array (  562 => 233,  540 => 213,  527 => 212,  515 => 331,  513 => 212,  506 => 207,  496 => 204,  492 => 202,  490 => 201,  483 => 196,  469 => 188,  459 => 180,  457 => 179,  448 => 175,  443 => 173,  439 => 172,  430 => 168,  423 => 164,  417 => 161,  412 => 158,  405 => 153,  398 => 148,  396 => 147,  389 => 143,  385 => 142,  378 => 138,  373 => 136,  369 => 135,  366 => 134,  357 => 132,  355 => 131,  351 => 130,  346 => 128,  343 => 127,  338 => 126,  321 => 114,  317 => 113,  312 => 111,  303 => 107,  299 => 106,  294 => 104,  286 => 98,  276 => 90,  263 => 80,  259 => 79,  255 => 78,  251 => 77,  247 => 76,  239 => 71,  235 => 70,  227 => 65,  219 => 59,  210 => 52,  198 => 43,  186 => 34,  178 => 28,  169 => 21,  162 => 16,  157 => 12,  144 => 11,  131 => 8,  126 => 7,  113 => 6,  90 => 4,  67 => 3,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'back/admin_base.html.twig' %}

{% block title %}Gestion des Tests{% endblock %}
{% block test_active %}active{% endblock %}

{% block stylesheets %}
    {{ parent() }}
    <link rel=\"stylesheet\" href=\"{{ asset('styles/tests/index.css') }}\">
{% endblock %}

{% block admin_content %}

<div class=\"nt-page\">

    {# ── HEADER ── #}
    <div class=\"nt-header\">
        <div class=\"nt-header-left\">
            <div class=\"nt-eyebrow\">Administration</div>
            <h1 class=\"nt-title\">Tests <em>Psychologiques</em></h1>
        </div>
        <a href=\"{{ path('app_test_new') }}\" class=\"btn-create\">
            <svg width=\"14\" height=\"14\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2.5\" viewBox=\"0 0 24 24\"><line x1=\"12\" y1=\"5\" x2=\"12\" y2=\"19\"/><line x1=\"5\" y1=\"12\" x2=\"19\" y2=\"12\"/></svg>
            Nouveau test
        </a>
    </div>

    {# ── STATS ── #}
    <div class=\"stat-grid\">
        <div class=\"stat-card total\">
            <div class=\"stat-icon-wrap\">
                <svg width=\"22\" height=\"22\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"1.8\" viewBox=\"0 0 24 24\"><path d=\"M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2\"/><rect x=\"9\" y=\"3\" width=\"6\" height=\"4\" rx=\"2\"/><line x1=\"9\" y1=\"12\" x2=\"15\" y2=\"12\"/><line x1=\"9\" y1=\"16\" x2=\"13\" y2=\"16\"/></svg>
            </div>
            <div>
                <div class=\"stat-num\">{{ totalTests }}</div>
                <div class=\"stat-label\">Total des tests</div>
            </div>
        </div>
        <div class=\"stat-card active\">
            <div class=\"stat-icon-wrap\">
                <svg width=\"22\" height=\"22\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"1.8\" viewBox=\"0 0 24 24\"><path d=\"M22 11.08V12a10 10 0 1 1-5.93-9.14\"/><polyline points=\"22 4 12 14.01 9 11.01\"/></svg>
            </div>
            <div>
                <div class=\"stat-num\">{{ testsActifs }}</div>
                <div class=\"stat-label\">Tests actifs</div>
            </div>
        </div>
        <div class=\"stat-card inactive\">
            <div class=\"stat-icon-wrap\">
                <svg width=\"22\" height=\"22\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"1.8\" viewBox=\"0 0 24 24\"><circle cx=\"12\" cy=\"12\" r=\"10\"/><line x1=\"4.93\" y1=\"4.93\" x2=\"19.07\" y2=\"19.07\"/></svg>
            </div>
            <div>
                <div class=\"stat-num\">{{ testsInactifs }}</div>
                <div class=\"stat-label\">Tests inactifs</div>
            </div>
        </div>
    </div>

    {# ── SEARCH PANEL ── #}
    <div class=\"search-panel\">
        <form id=\"searchForm\" class=\"search-form\">
            <div class=\"search-field\">
                <svg width=\"15\" height=\"15\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\"><circle cx=\"11\" cy=\"11\" r=\"7\"/><line x1=\"21\" y1=\"21\" x2=\"16.65\" y2=\"16.65\"/></svg>
                <input type=\"text\" name=\"search\" id=\"searchInput\"
                       placeholder=\"Rechercher par titre ou description...\"
                       value=\"{{ search }}\">
            </div>

            <select name=\"status\" id=\"filterStatus\" class=\"filter-sel\">
                <option value=\"\">Tous les statuts</option>
                <option value=\"actif\"   {{ status == 'actif'   ? 'selected' : '' }}>Actif</option>
                <option value=\"inactif\" {{ status == 'inactif' ? 'selected' : '' }}>Inactif</option>
            </select>

            <select name=\"categorie\" id=\"filterCategorie\" class=\"filter-sel\">
                <option value=\"\">Toutes les catégories</option>
                <option value=\"personnalite\" {{ categorie == 'personnalite' ? 'selected' : '' }}>Personnalité</option>
                <option value=\"intelligence\" {{ categorie == 'intelligence' ? 'selected' : '' }}>Intelligence</option>
                <option value=\"competences\"  {{ categorie == 'competences'  ? 'selected' : '' }}>Compétences</option>
                <option value=\"aptitudes\"    {{ categorie == 'aptitudes'    ? 'selected' : '' }}>Aptitudes</option>
                <option value=\"comportement\" {{ categorie == 'comportement' ? 'selected' : '' }}>Comportement</option>
            </select>

            <button type=\"submit\" class=\"btn-filter\">
                <svg width=\"13\" height=\"13\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2.5\" viewBox=\"0 0 24 24\"><polygon points=\"22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3\"/></svg>
                Filtrer
                <span class=\"ajax-spinner\" id=\"spinner\"></span>
            </button>

            <button type=\"button\" id=\"btnReset\" class=\"btn-reset\"
                    style=\"{{ (search or status or categorie) ? '' : 'display:none' }}\">
                <svg width=\"13\" height=\"13\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2.5\" viewBox=\"0 0 24 24\"><line x1=\"18\" y1=\"6\" x2=\"6\" y2=\"18\"/><line x1=\"6\" y1=\"6\" x2=\"18\" y2=\"18\"/></svg>
                Réinitialiser
            </button>
        </form>
    </div>

    {# ── TABLE ── #}
    <div id=\"tableWrapper\">
        <div class=\"tbl-card\">
            <table>
                <thead>
                    <tr>
                        <th style=\"width:60px\">
                            <a href=\"#\" class=\"sort-link {{ sort == 'id' ? 'active' : '' }}\"
                               data-sort=\"id\"
                               data-order=\"{{ sort == 'id' and order == 'ASC' ? 'DESC' : 'ASC' }}\">
                                ID <span class=\"sort-icon {{ sort == 'id' ? 'on' : '' }}\">{{ sort == 'id' ? (order == 'ASC' ? '▲' : '▼') : '▲' }}</span>
                            </a>
                        </th>
                        <th>
                            <a href=\"#\" class=\"sort-link {{ sort == 'titre' ? 'active' : '' }}\"
                               data-sort=\"titre\"
                               data-order=\"{{ sort == 'titre' and order == 'ASC' ? 'DESC' : 'ASC' }}\">
                                Titre <span class=\"sort-icon {{ sort == 'titre' ? 'on' : '' }}\">{{ sort == 'titre' ? (order == 'ASC' ? '▲' : '▼') : '▲' }}</span>
                            </a>
                        </th>
                        <th>Catégorie</th>
                        <th>Niveau</th>
                        <th>Durée</th>
                        <th>Questions</th>
                        <th>Statut</th>
                        <th style=\"width:120px; text-align:center;\">Actions</th>
                    </tr>
                </thead>
                <tbody id=\"tableBody\">
                    {% for test in tests %}
                    <tr>
                        <td><span class=\"cell-id\">#{{ test.id }}</span></td>
                        <td class=\"cell-title\">
                            <strong>{{ test.titre }}</strong>
                            {% if test.description %}
                                <small>{{ test.description|slice(0,70) }}{% if test.description|length > 70 %}…{% endif %}</small>
                            {% endif %}
                        </td>
                        <td><span class=\"badge badge-cat\">{{ test.categorie|capitalize }}</span></td>
                        <td><span class=\"badge badge-niveau\">{{ test.niveau|capitalize }}</span></td>
                        <td style=\"color:var(--ink-soft); font-weight:500;\">
                            {{ test.duree ? test.duree ~ ' min' : '—' }}
                        </td>
                        <td>
                            <span class=\"badge badge-q\">
                                {{ test.questions|length }}
                                {{ test.questions|length > 1 ? 'questions' : 'question' }}
                            </span>
                        </td>
                        <td>
                            {% if test.status == 'actif' %}
                                <span class=\"badge badge-actif\">
                                    <svg width=\"8\" height=\"8\" viewBox=\"0 0 8 8\" fill=\"currentColor\"><circle cx=\"4\" cy=\"4\" r=\"4\"/></svg>
                                    Actif
                                </span>
                            {% else %}
                                <span class=\"badge badge-inact\">
                                    <svg width=\"8\" height=\"8\" viewBox=\"0 0 8 8\" fill=\"currentColor\"><circle cx=\"4\" cy=\"4\" r=\"4\"/></svg>
                                    Inactif
                                </span>
                            {% endif %}
                        </td>
                        <td>
                            <div class=\"actions\" style=\"justify-content:center;\">
                                <a href=\"{{ path('app_test_show', {'id': test.id}) }}\" class=\"btn-act view\" title=\"Voir\">
                                    <svg width=\"15\" height=\"15\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\"><path d=\"M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12z\"/><circle cx=\"12\" cy=\"12\" r=\"3\"/></svg>
                                </a>
                                <a href=\"{{ path('app_test_edit', {'id': test.id}) }}\" class=\"btn-act edit\" title=\"Modifier\">
                                    <svg width=\"15\" height=\"15\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\"><path d=\"M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7\"/><path d=\"M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z\"/></svg>
                                </a>
                                <button type=\"button\" class=\"btn-act del\" title=\"Supprimer\"
                                        onclick=\"deleteTest({{ test.id }}, '{{ test.titre|e('js') }}')\">
                                    <svg width=\"15\" height=\"15\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\"><polyline points=\"3 6 5 6 21 6\"/><path d=\"M19 6l-1 14H6L5 6\"/><path d=\"M10 11v6M14 11v6\"/><path d=\"M9 6V4h6v2\"/></svg>
                                </button>
                            </div>
                            <form id=\"delete-form-{{ test.id }}\" method=\"post\"
                                  action=\"{{ path('app_test_delete', {'id': test.id}) }}\"
                                  style=\"display:none;\">
                                <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete'~test.id) }}\">
                            </form>
                        </td>
                    </tr>
                    {% else %}
                    <tr>
                        <td colspan=\"8\">
                            <div class=\"empty-state\">
                                <div class=\"empty-circle\">
                                    <svg width=\"30\" height=\"30\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"1.5\" viewBox=\"0 0 24 24\"><path d=\"M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2\"/><rect x=\"9\" y=\"3\" width=\"6\" height=\"4\" rx=\"2\"/></svg>
                                </div>
                                <h4>Aucun test trouvé</h4>
                                <p>Commencez par créer votre premier test psychologique.</p>
                                <a href=\"{{ path('app_test_new') }}\" class=\"btn-create\" style=\"margin:0 auto;\">
                                    <svg width=\"13\" height=\"13\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2.5\" viewBox=\"0 0 24 24\"><line x1=\"12\" y1=\"5\" x2=\"12\" y2=\"19\"/><line x1=\"5\" y1=\"12\" x2=\"19\" y2=\"12\"/></svg>
                                    Créer un test
                                </a>
                            </div>
                        </td>
                    </tr>
                    {% endfor %}
                </tbody>
            </table>
        </div>

        <div id=\"resultInfo\">
            {% if search or status or categorie %}
            <div class=\"result-info\">
                <svg width=\"13\" height=\"13\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\"><circle cx=\"12\" cy=\"12\" r=\"9\"/><line x1=\"12\" y1=\"8\" x2=\"12\" y2=\"12\"/><line x1=\"12\" y1=\"16\" x2=\"12.01\" y2=\"16\"/></svg>
                <strong>{{ tests|length }}</strong> résultat{{ tests|length > 1 ? 's' : '' }} trouvé{{ tests|length > 1 ? 's' : '' }}
            </div>
            {% endif %}
        </div>
    </div>

</div>

{% block javascripts %}
<script src=\"https://cdn.jsdelivr.net/npm/sweetalert2@11\"></script>
<script>

function deleteTest(id, titre) {
    Swal.fire({
        title: 'Supprimer ce test ?',
        html: '<span style=\"color:#4a5060\">Le test <strong>' + titre + '</strong> sera définitivement supprimé.</span>',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#c0392b',
        cancelButtonColor: '#2d6a4f',
        confirmButtonText: 'Supprimer',
        cancelButtonText: 'Annuler',
    }).then(function(result) {
        if (result.isConfirmed) {
            document.getElementById('delete-form-' + id).submit();
        }
    });
}

const ajaxUrl         = '{{ path(\"app_test_search_ajax\") }}';
const searchInput     = document.getElementById('searchInput');
const filterStatus    = document.getElementById('filterStatus');
const filterCategorie = document.getElementById('filterCategorie');
const tableBody       = document.getElementById('tableBody');
const tableWrapper    = document.getElementById('tableWrapper');
const resultInfo      = document.getElementById('resultInfo');
const spinner         = document.getElementById('spinner');
const btnReset        = document.getElementById('btnReset');
const searchForm      = document.getElementById('searchForm');

let searchTimeout = null;

function doSearch() {
    var params = new URLSearchParams({
        search:    searchInput.value,
        status:    filterStatus.value,
        categorie: filterCategorie.value,
    });

    var hasFilters = searchInput.value || filterStatus.value || filterCategorie.value;
    btnReset.style.display = hasFilters ? 'inline-flex' : 'none';

    spinner.classList.add('visible');
    tableWrapper.classList.add('loading');

    fetch(ajaxUrl + '?' + params.toString(), {
        headers: { 'X-Requested-With': 'XMLHttpRequest' }
    })
    .then(function(res) { return res.json(); })
    .then(function(data) {
        tableBody.innerHTML = data.html;
        if (hasFilters) {
            var n = data.count;
            resultInfo.innerHTML =
                '<div class=\"result-info\">' +
                '<svg width=\"13\" height=\"13\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\"><circle cx=\"12\" cy=\"12\" r=\"9\"/><line x1=\"12\" y1=\"8\" x2=\"12\" y2=\"12\"/><line x1=\"12\" y1=\"16\" x2=\"12.01\" y2=\"16\"/></svg>' +
                '<strong>' + n + '</strong> résultat' + (n > 1 ? 's' : '') + ' trouvé' + (n > 1 ? 's' : '') +
                '</div>';
        } else {
            resultInfo.innerHTML = '';
        }
    })
    .catch(function() {
        resultInfo.innerHTML = '<div class=\"result-info\" style=\"border-color:#f5a99c;background:#fdf0ee;color:#c0392b;\">Erreur lors de la recherche.</div>';
    })
    .finally(function() {
        spinner.classList.remove('visible');
        tableWrapper.classList.remove('loading');
    });
}

searchInput.addEventListener('keyup', function() {
    clearTimeout(searchTimeout);
    searchTimeout = setTimeout(doSearch, 400);
});

filterStatus.addEventListener('change', doSearch);
filterCategorie.addEventListener('change', doSearch);

searchForm.addEventListener('submit', function(e) {
    e.preventDefault();
    doSearch();
});

btnReset.addEventListener('click', function() {
    searchInput.value     = '';
    filterStatus.value    = '';
    filterCategorie.value = '';
    doSearch();
});

document.querySelectorAll('.sort-link').forEach(function(link) {
    link.addEventListener('click', function(e) {
        e.preventDefault();
        var params = new URLSearchParams({
            search:    searchInput.value,
            status:    filterStatus.value,
            categorie: filterCategorie.value,
            sort:      this.dataset.sort,
            order:     this.dataset.order,
        });
        spinner.classList.add('visible');
        tableWrapper.classList.add('loading');
        fetch(ajaxUrl + '?' + params.toString(), {
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(function(res) { return res.json(); })
        .then(function(data) { tableBody.innerHTML = data.html; })
        .finally(function() {
            spinner.classList.remove('visible');
            tableWrapper.classList.remove('loading');
        });
    });
});

</script>
{% endblock %}

{% endblock %}
", "back/test/index.html.twig", "C:\\Users\\sirine\\psy\\templates\\back\\test\\index.html.twig");
    }
}
