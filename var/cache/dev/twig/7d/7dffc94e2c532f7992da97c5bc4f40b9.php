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

/* back/question/index.html.twig */
class __TwigTemplate_bbe15b5b44b4d79e9ef8410850ba781f extends Template
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
            'question_active' => [$this, 'block_question_active'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/question/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/question/index.html.twig"));

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

        yield "Questions — Nafseyti";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 4
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_question_active(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "question_active"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "question_active"));

        yield "active";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 6
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

        // line 7
        yield "<div class=\"nt\">
    <div class=\"nt-header\">
        <div>
            <div class=\"nt-eyebrow\">Administration</div>
            <h1 class=\"nt-title\">Gestion des <em>Questions</em></h1>
        </div>
        <a href=\"";
        // line 13
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_question_new");
        yield "\" class=\"btn-create\">
            <svg width=\"14\" height=\"14\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2.5\" viewBox=\"0 0 24 24\"><line x1=\"12\" y1=\"5\" x2=\"12\" y2=\"19\"/><line x1=\"5\" y1=\"12\" x2=\"19\" y2=\"12\"/></svg>
            Nouvelle question
        </a>
    </div>

    <div class=\"search-panel\">
        <form id=\"searchForm\" class=\"search-form\">
            <div class=\"search-field\">
                <svg width=\"15\" height=\"15\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\"><circle cx=\"11\" cy=\"11\" r=\"7\"/><line x1=\"21\" y1=\"21\" x2=\"16.65\" y2=\"16.65\"/></svg>
                <input type=\"text\" name=\"search\" id=\"searchInput\" placeholder=\"Rechercher une question...\" value=\"";
        // line 23
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 23, $this->source); })()), "html", null, true);
        yield "\">
            </div>
            <select name=\"type\" id=\"filterType\" class=\"filter-sel\">
                <option value=\"\">Tous les types</option>
                <option value=\"qcm_unique\"   ";
        // line 27
        yield ((((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 27, $this->source); })()) == "qcm_unique")) ? ("selected") : (""));
        yield ">QCM Unique</option>
                <option value=\"qcm_multiple\" ";
        // line 28
        yield ((((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 28, $this->source); })()) == "qcm_multiple")) ? ("selected") : (""));
        yield ">QCM Multiple</option>
                <option value=\"vrai_faux\"    ";
        // line 29
        yield ((((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 29, $this->source); })()) == "vrai_faux")) ? ("selected") : (""));
        yield ">Vrai / Faux</option>
                <option value=\"texte_libre\"  ";
        // line 30
        yield ((((isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 30, $this->source); })()) == "texte_libre")) ? ("selected") : (""));
        yield ">Texte libre</option>
            </select>
            <select name=\"status\" id=\"filterStatus\" class=\"filter-sel\">
                <option value=\"\">Tous les statuts</option>
                <option value=\"actif\"   ";
        // line 34
        yield ((((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 34, $this->source); })()) == "actif")) ? ("selected") : (""));
        yield ">Actif</option>
                <option value=\"inactif\" ";
        // line 35
        yield ((((isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 35, $this->source); })()) == "inactif")) ? ("selected") : (""));
        yield ">Inactif</option>
            </select>
            <button type=\"submit\" class=\"btn-filter\">
                <svg width=\"13\" height=\"13\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2.5\" viewBox=\"0 0 24 24\"><polygon points=\"22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3\"/></svg>
                Filtrer
                <span class=\"ajax-spinner\" id=\"spinner\"></span>
            </button>
            <button type=\"button\" id=\"btnReset\" class=\"btn-reset\"
                    style=\"";
        // line 43
        yield (((((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 43, $this->source); })()) || (isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 43, $this->source); })())) || (isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 43, $this->source); })()))) ? ("") : ("display:none"));
        yield "\">
                <svg width=\"13\" height=\"13\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2.5\" viewBox=\"0 0 24 24\"><line x1=\"18\" y1=\"6\" x2=\"6\" y2=\"18\"/><line x1=\"6\" y1=\"6\" x2=\"18\" y2=\"18\"/></svg>
                Réinitialiser
            </button>
        </form>
    </div>

    <div id=\"tableWrapper\">
        <div class=\"tbl-card\">
            <table>
                <thead>
                    <tr>
                        <th style=\"width:200px\">Test associé</th>
                        <th>Question</th>
                        <th style=\"width:140px\">Type</th>
                        <th style=\"width:80px\">Points</th>
                        <th style=\"width:100px\">Statut</th>
                        <th style=\"width:110px;text-align:center;\">Actions</th>
                    </tr>
                </thead>
                <tbody id=\"tableBody\">
                    ";
        // line 64
        yield from $this->load("back/question/_table_rows.html.twig", 64)->unwrap()->yield($context);
        // line 65
        yield "                </tbody>
            </table>
        </div>

        <div id=\"resultInfo\">
            ";
        // line 70
        if ((((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 70, $this->source); })()) || (isset($context["type"]) || array_key_exists("type", $context) ? $context["type"] : (function () { throw new RuntimeError('Variable "type" does not exist.', 70, $this->source); })())) || (isset($context["status"]) || array_key_exists("status", $context) ? $context["status"] : (function () { throw new RuntimeError('Variable "status" does not exist.', 70, $this->source); })()))) {
            // line 71
            yield "            <div class=\"result-info\">
                <svg width=\"13\" height=\"13\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\"><circle cx=\"12\" cy=\"12\" r=\"9\"/><line x1=\"12\" y1=\"8\" x2=\"12\" y2=\"12\"/><line x1=\"12\" y1=\"16\" x2=\"12.01\" y2=\"16\"/></svg>
                <strong>";
            // line 73
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["questions"]) || array_key_exists("questions", $context) ? $context["questions"] : (function () { throw new RuntimeError('Variable "questions" does not exist.', 73, $this->source); })())), "html", null, true);
            yield "</strong> résultat";
            yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["questions"]) || array_key_exists("questions", $context) ? $context["questions"] : (function () { throw new RuntimeError('Variable "questions" does not exist.', 73, $this->source); })())) > 1)) ? ("s") : (""));
            yield " trouvé";
            yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["questions"]) || array_key_exists("questions", $context) ? $context["questions"] : (function () { throw new RuntimeError('Variable "questions" does not exist.', 73, $this->source); })())) > 1)) ? ("s") : (""));
            yield "
            </div>
            ";
        }
        // line 76
        yield "        </div>
    </div>
</div>

";
        // line 80
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 169
        yield "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 80
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

        // line 81
        yield "<script src=\"https://cdn.jsdelivr.net/npm/sweetalert2@11\"></script>
<script>
function deleteQuestion(id) {
    Swal.fire({
        title: 'Supprimer cette question ?',
        text: 'Cette action est irréversible.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#c0392b',
        cancelButtonColor: '#2d6a4f',
        confirmButtonText: 'Supprimer',
        cancelButtonText: 'Annuler'
    }).then(function(r){ if(r.isConfirmed) document.getElementById('delete-form-'+id).submit(); });
}

const ajaxUrl = '";
        // line 96
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_question_search_ajax");
        yield "';
const searchInput  = document.getElementById('searchInput');
const filterType   = document.getElementById('filterType');
const filterStatus = document.getElementById('filterStatus');
const tableBody    = document.getElementById('tableBody');
const tableWrapper = document.getElementById('tableWrapper');
const resultInfo   = document.getElementById('resultInfo');
const spinner      = document.getElementById('spinner');
const btnReset     = document.getElementById('btnReset');
const searchForm   = document.getElementById('searchForm');

let searchTimeout = null;

function doSearch() {
    var params = new URLSearchParams({
        search: searchInput.value,
        type:   filterType.value,
        status: filterStatus.value,
    });

    var hasFilters = searchInput.value || filterType.value || filterStatus.value;
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

filterType.addEventListener('change', doSearch);
filterStatus.addEventListener('change', doSearch);

searchForm.addEventListener('submit', function(e) {
    e.preventDefault();
    doSearch();
});

btnReset.addEventListener('click', function() {
    searchInput.value  = '';
    filterType.value   = '';
    filterStatus.value = '';
    doSearch();
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
        return "back/question/index.html.twig";
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
        return array (  286 => 96,  269 => 81,  256 => 80,  244 => 169,  242 => 80,  236 => 76,  226 => 73,  222 => 71,  220 => 70,  213 => 65,  211 => 64,  187 => 43,  176 => 35,  172 => 34,  165 => 30,  161 => 29,  157 => 28,  153 => 27,  146 => 23,  133 => 13,  125 => 7,  112 => 6,  89 => 4,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'back/admin_base.html.twig' %}

{% block title %}Questions — Nafseyti{% endblock %}
{% block question_active %}active{% endblock %}

{% block admin_content %}
<div class=\"nt\">
    <div class=\"nt-header\">
        <div>
            <div class=\"nt-eyebrow\">Administration</div>
            <h1 class=\"nt-title\">Gestion des <em>Questions</em></h1>
        </div>
        <a href=\"{{ path('app_question_new') }}\" class=\"btn-create\">
            <svg width=\"14\" height=\"14\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2.5\" viewBox=\"0 0 24 24\"><line x1=\"12\" y1=\"5\" x2=\"12\" y2=\"19\"/><line x1=\"5\" y1=\"12\" x2=\"19\" y2=\"12\"/></svg>
            Nouvelle question
        </a>
    </div>

    <div class=\"search-panel\">
        <form id=\"searchForm\" class=\"search-form\">
            <div class=\"search-field\">
                <svg width=\"15\" height=\"15\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\"><circle cx=\"11\" cy=\"11\" r=\"7\"/><line x1=\"21\" y1=\"21\" x2=\"16.65\" y2=\"16.65\"/></svg>
                <input type=\"text\" name=\"search\" id=\"searchInput\" placeholder=\"Rechercher une question...\" value=\"{{ search }}\">
            </div>
            <select name=\"type\" id=\"filterType\" class=\"filter-sel\">
                <option value=\"\">Tous les types</option>
                <option value=\"qcm_unique\"   {{ type == 'qcm_unique'   ? 'selected' : '' }}>QCM Unique</option>
                <option value=\"qcm_multiple\" {{ type == 'qcm_multiple' ? 'selected' : '' }}>QCM Multiple</option>
                <option value=\"vrai_faux\"    {{ type == 'vrai_faux'    ? 'selected' : '' }}>Vrai / Faux</option>
                <option value=\"texte_libre\"  {{ type == 'texte_libre'  ? 'selected' : '' }}>Texte libre</option>
            </select>
            <select name=\"status\" id=\"filterStatus\" class=\"filter-sel\">
                <option value=\"\">Tous les statuts</option>
                <option value=\"actif\"   {{ status == 'actif'   ? 'selected' : '' }}>Actif</option>
                <option value=\"inactif\" {{ status == 'inactif' ? 'selected' : '' }}>Inactif</option>
            </select>
            <button type=\"submit\" class=\"btn-filter\">
                <svg width=\"13\" height=\"13\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2.5\" viewBox=\"0 0 24 24\"><polygon points=\"22 3 2 3 10 12.46 10 19 14 21 14 12.46 22 3\"/></svg>
                Filtrer
                <span class=\"ajax-spinner\" id=\"spinner\"></span>
            </button>
            <button type=\"button\" id=\"btnReset\" class=\"btn-reset\"
                    style=\"{{ (search or type or status) ? '' : 'display:none' }}\">
                <svg width=\"13\" height=\"13\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2.5\" viewBox=\"0 0 24 24\"><line x1=\"18\" y1=\"6\" x2=\"6\" y2=\"18\"/><line x1=\"6\" y1=\"6\" x2=\"18\" y2=\"18\"/></svg>
                Réinitialiser
            </button>
        </form>
    </div>

    <div id=\"tableWrapper\">
        <div class=\"tbl-card\">
            <table>
                <thead>
                    <tr>
                        <th style=\"width:200px\">Test associé</th>
                        <th>Question</th>
                        <th style=\"width:140px\">Type</th>
                        <th style=\"width:80px\">Points</th>
                        <th style=\"width:100px\">Statut</th>
                        <th style=\"width:110px;text-align:center;\">Actions</th>
                    </tr>
                </thead>
                <tbody id=\"tableBody\">
                    {% include 'back/question/_table_rows.html.twig' %}
                </tbody>
            </table>
        </div>

        <div id=\"resultInfo\">
            {% if search or type or status %}
            <div class=\"result-info\">
                <svg width=\"13\" height=\"13\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\"><circle cx=\"12\" cy=\"12\" r=\"9\"/><line x1=\"12\" y1=\"8\" x2=\"12\" y2=\"12\"/><line x1=\"12\" y1=\"16\" x2=\"12.01\" y2=\"16\"/></svg>
                <strong>{{ questions|length }}</strong> résultat{{ questions|length > 1 ? 's' : '' }} trouvé{{ questions|length > 1 ? 's' : '' }}
            </div>
            {% endif %}
        </div>
    </div>
</div>

{% block javascripts %}
<script src=\"https://cdn.jsdelivr.net/npm/sweetalert2@11\"></script>
<script>
function deleteQuestion(id) {
    Swal.fire({
        title: 'Supprimer cette question ?',
        text: 'Cette action est irréversible.',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#c0392b',
        cancelButtonColor: '#2d6a4f',
        confirmButtonText: 'Supprimer',
        cancelButtonText: 'Annuler'
    }).then(function(r){ if(r.isConfirmed) document.getElementById('delete-form-'+id).submit(); });
}

const ajaxUrl = '{{ path(\"app_question_search_ajax\") }}';
const searchInput  = document.getElementById('searchInput');
const filterType   = document.getElementById('filterType');
const filterStatus = document.getElementById('filterStatus');
const tableBody    = document.getElementById('tableBody');
const tableWrapper = document.getElementById('tableWrapper');
const resultInfo   = document.getElementById('resultInfo');
const spinner      = document.getElementById('spinner');
const btnReset     = document.getElementById('btnReset');
const searchForm   = document.getElementById('searchForm');

let searchTimeout = null;

function doSearch() {
    var params = new URLSearchParams({
        search: searchInput.value,
        type:   filterType.value,
        status: filterStatus.value,
    });

    var hasFilters = searchInput.value || filterType.value || filterStatus.value;
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

filterType.addEventListener('change', doSearch);
filterStatus.addEventListener('change', doSearch);

searchForm.addEventListener('submit', function(e) {
    e.preventDefault();
    doSearch();
});

btnReset.addEventListener('click', function() {
    searchInput.value  = '';
    filterType.value   = '';
    filterStatus.value = '';
    doSearch();
});
</script>
{% endblock %}

{% endblock %}", "back/question/index.html.twig", "C:\\Users\\sirine\\psy\\templates\\back\\question\\index.html.twig");
    }
}
