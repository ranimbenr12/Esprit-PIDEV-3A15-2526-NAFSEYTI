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

/* back/test/edit.html.twig */
class __TwigTemplate_cb2f590ab54f56e8dbc8faa374f3a5a3 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/test/edit.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/test/edit.html.twig"));

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

        yield "Modifier le test — Nafseyti";
        
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
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("styles/tests/edit.css"), "html", null, true);
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
        yield "<div class=\"nt\">
    <div class=\"nt-breadcrumb\">
        <a href=\"";
        // line 14
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_test_index");
        yield "\">Tests</a>
        <span>/</span>
        <a href=\"";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_test_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 16, $this->source); })()), "id", [], "any", false, false, false, 16)]), "html", null, true);
        yield "\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 16, $this->source); })()), "titre", [], "any", false, false, false, 16), 0, 40), "html", null, true);
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 16, $this->source); })()), "titre", [], "any", false, false, false, 16)) > 40)) {
            yield "…";
        }
        yield "</a>
        <span>/</span>
        <span>Modifier</span>
    </div>
    
    <div class=\"nt-header\">
        <div class=\"nt-eyebrow\">Modification</div>
        <h1 class=\"nt-title\">Modifier le <em>test</em></h1>
    </div>

    <div class=\"form-card\">
        <div class=\"form-card-head\">
            <div class=\"icon\">
                <svg width=\"16\" height=\"16\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\">
                    <path d=\"M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2\"/>
                    <rect x=\"9\" y=\"3\" width=\"6\" height=\"4\" rx=\"2\"/>
                </svg>
            </div>
            <h3>Informations du test</h3>
        </div>

        ";
        // line 37
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 37, $this->source); })()), 'form_start', ["attr" => ["id" => "testForm", "novalidate" => "novalidate"]]);
        yield "
        <div class=\"form-body\">
            <div class=\"info-banner\">
                <svg width=\"15\" height=\"15\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\">
                    <circle cx=\"12\" cy=\"12\" r=\"9\"/>
                    <line x1=\"12\" y1=\"8\" x2=\"12\" y2=\"12\"/>
                    <line x1=\"12\" y1=\"16\" x2=\"12.01\" y2=\"16\"/>
                </svg>
                <div>
                    <strong>Informations</strong>
                    <span>
                        Créé le : ";
        // line 48
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 48, $this->source); })()), "createdAt", [], "any", false, false, false, 48), "d/m/Y à H:i"), "html", null, true);
        yield "<br>
                        Dernière modification : ";
        // line 49
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 49, $this->source); })()), "updatedAt", [], "any", false, false, false, 49), "d/m/Y à H:i"), "html", null, true);
        yield "
                    </span>
                </div>
            </div>

            <div class=\"field-group\">
                <label class=\"field-label\">Titre <span class=\"req\">*</span></label>
                ";
        // line 56
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 56, $this->source); })()), "titre", [], "any", false, false, false, 56), 'widget', ["attr" => ["placeholder" => "Ex : Test de personnalité"]]);
        yield "
                ";
        // line 57
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 57, $this->source); })()), "titre", [], "any", false, false, false, 57), 'errors');
        yield "
            </div>

            <div class=\"field-group\">
                <label class=\"field-label\">Description</label>
                ";
        // line 62
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 62, $this->source); })()), "description", [], "any", false, false, false, 62), 'widget', ["attr" => ["rows" => 4, "placeholder" => "Décrivez l'objectif de ce test…"]]);
        yield "
                ";
        // line 63
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 63, $this->source); })()), "description", [], "any", false, false, false, 63), 'errors');
        yield "
            </div>

            <div class=\"field-row\">
                <div class=\"field-group\">
                    <label class=\"field-label\">Catégorie <span class=\"req\">*</span></label>
                    ";
        // line 69
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 69, $this->source); })()), "categorie", [], "any", false, false, false, 69), 'widget');
        yield "
                    ";
        // line 70
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 70, $this->source); })()), "categorie", [], "any", false, false, false, 70), 'errors');
        yield "
                </div>
                <div class=\"field-group\">
                    <label class=\"field-label\">Niveau <span class=\"req\">*</span></label>
                    ";
        // line 74
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 74, $this->source); })()), "niveau", [], "any", false, false, false, 74), 'widget');
        yield "
                    ";
        // line 75
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 75, $this->source); })()), "niveau", [], "any", false, false, false, 75), 'errors');
        yield "
                </div>
            </div>

            <div class=\"section-divider\">
                <span>Paramètres</span>
            </div>

            <div class=\"field-row\">
                <div class=\"field-group\">
                    <label class=\"field-label\">Durée (minutes)</label>
                    ";
        // line 86
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 86, $this->source); })()), "duree", [], "any", false, false, false, 86), 'widget', ["attr" => ["placeholder" => "30"]]);
        yield "
                    <span class=\"field-hint\">Durée estimée du test en minutes</span>
                    ";
        // line 88
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 88, $this->source); })()), "duree", [], "any", false, false, false, 88), 'errors');
        yield "
                </div>
                <div class=\"field-group\">
                    <label class=\"field-label\">Score maximum</label>
                    ";
        // line 92
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 92, $this->source); })()), "scoreMax", [], "any", false, false, false, 92), 'widget', ["attr" => ["placeholder" => "100"]]);
        yield "
                    ";
        // line 93
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 93, $this->source); })()), "scoreMax", [], "any", false, false, false, 93), 'errors');
        yield "
                </div>
            </div>

            <div class=\"field-group\">
                <label class=\"field-label\">Statut</label>
                ";
        // line 99
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 99, $this->source); })()), "status", [], "any", false, false, false, 99), 'widget');
        yield "
                ";
        // line 100
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 100, $this->source); })()), "status", [], "any", false, false, false, 100), 'errors');
        yield "
            </div>
        </div>

        <div class=\"form-footer\">
            <button type=\"submit\" class=\"btn-submit\">
                <svg width=\"14\" height=\"14\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2.5\" viewBox=\"0 0 24 24\">
                    <path d=\"M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z\"/>
                    <polyline points=\"17 21 17 13 7 13 7 21\"/>
                    <polyline points=\"7 3 7 8 15 8\"/>
                </svg>
                Enregistrer les modifications
            </button>
            <a href=\"";
        // line 113
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_test_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 113, $this->source); })()), "id", [], "any", false, false, false, 113)]), "html", null, true);
        yield "\" class=\"btn-cancel\">
                <svg width=\"13\" height=\"13\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2.5\" viewBox=\"0 0 24 24\">
                    <line x1=\"18\" y1=\"6\" x2=\"6\" y2=\"18\"/>
                    <line x1=\"6\" y1=\"6\" x2=\"18\" y2=\"18\"/>
                </svg>
                Annuler
            </a>
        </div>
        ";
        // line 121
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 121, $this->source); })()), 'form_end');
        yield "
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
        return "back/test/edit.html.twig";
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
        return array (  332 => 121,  321 => 113,  305 => 100,  301 => 99,  292 => 93,  288 => 92,  281 => 88,  276 => 86,  262 => 75,  258 => 74,  251 => 70,  247 => 69,  238 => 63,  234 => 62,  226 => 57,  222 => 56,  212 => 49,  208 => 48,  194 => 37,  165 => 16,  160 => 14,  156 => 12,  143 => 11,  130 => 8,  125 => 7,  112 => 6,  89 => 4,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'back/admin_base.html.twig' %}

{% block title %}Modifier le test — Nafseyti{% endblock %}
{% block test_active %}active{% endblock %}

{% block stylesheets %}
    {{ parent() }}
    <link rel=\"stylesheet\" href=\"{{ asset('styles/tests/edit.css') }}\">
{% endblock %}

{% block admin_content %}
<div class=\"nt\">
    <div class=\"nt-breadcrumb\">
        <a href=\"{{ path('app_test_index') }}\">Tests</a>
        <span>/</span>
        <a href=\"{{ path('app_test_show', {'id': test.id}) }}\">{{ test.titre|slice(0,40) }}{% if test.titre|length > 40 %}…{% endif %}</a>
        <span>/</span>
        <span>Modifier</span>
    </div>
    
    <div class=\"nt-header\">
        <div class=\"nt-eyebrow\">Modification</div>
        <h1 class=\"nt-title\">Modifier le <em>test</em></h1>
    </div>

    <div class=\"form-card\">
        <div class=\"form-card-head\">
            <div class=\"icon\">
                <svg width=\"16\" height=\"16\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\">
                    <path d=\"M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2\"/>
                    <rect x=\"9\" y=\"3\" width=\"6\" height=\"4\" rx=\"2\"/>
                </svg>
            </div>
            <h3>Informations du test</h3>
        </div>

        {{ form_start(form, {'attr': {'id': 'testForm', 'novalidate': 'novalidate'}}) }}
        <div class=\"form-body\">
            <div class=\"info-banner\">
                <svg width=\"15\" height=\"15\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\">
                    <circle cx=\"12\" cy=\"12\" r=\"9\"/>
                    <line x1=\"12\" y1=\"8\" x2=\"12\" y2=\"12\"/>
                    <line x1=\"12\" y1=\"16\" x2=\"12.01\" y2=\"16\"/>
                </svg>
                <div>
                    <strong>Informations</strong>
                    <span>
                        Créé le : {{ test.createdAt|date('d/m/Y à H:i') }}<br>
                        Dernière modification : {{ test.updatedAt|date('d/m/Y à H:i') }}
                    </span>
                </div>
            </div>

            <div class=\"field-group\">
                <label class=\"field-label\">Titre <span class=\"req\">*</span></label>
                {{ form_widget(form.titre, {'attr': {'placeholder': 'Ex : Test de personnalité'}}) }}
                {{ form_errors(form.titre) }}
            </div>

            <div class=\"field-group\">
                <label class=\"field-label\">Description</label>
                {{ form_widget(form.description, {'attr': {'rows': 4, 'placeholder': 'Décrivez l\\'objectif de ce test…'}}) }}
                {{ form_errors(form.description) }}
            </div>

            <div class=\"field-row\">
                <div class=\"field-group\">
                    <label class=\"field-label\">Catégorie <span class=\"req\">*</span></label>
                    {{ form_widget(form.categorie) }}
                    {{ form_errors(form.categorie) }}
                </div>
                <div class=\"field-group\">
                    <label class=\"field-label\">Niveau <span class=\"req\">*</span></label>
                    {{ form_widget(form.niveau) }}
                    {{ form_errors(form.niveau) }}
                </div>
            </div>

            <div class=\"section-divider\">
                <span>Paramètres</span>
            </div>

            <div class=\"field-row\">
                <div class=\"field-group\">
                    <label class=\"field-label\">Durée (minutes)</label>
                    {{ form_widget(form.duree, {'attr': {'placeholder': '30'}}) }}
                    <span class=\"field-hint\">Durée estimée du test en minutes</span>
                    {{ form_errors(form.duree) }}
                </div>
                <div class=\"field-group\">
                    <label class=\"field-label\">Score maximum</label>
                    {{ form_widget(form.scoreMax, {'attr': {'placeholder': '100'}}) }}
                    {{ form_errors(form.scoreMax) }}
                </div>
            </div>

            <div class=\"field-group\">
                <label class=\"field-label\">Statut</label>
                {{ form_widget(form.status) }}
                {{ form_errors(form.status) }}
            </div>
        </div>

        <div class=\"form-footer\">
            <button type=\"submit\" class=\"btn-submit\">
                <svg width=\"14\" height=\"14\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2.5\" viewBox=\"0 0 24 24\">
                    <path d=\"M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z\"/>
                    <polyline points=\"17 21 17 13 7 13 7 21\"/>
                    <polyline points=\"7 3 7 8 15 8\"/>
                </svg>
                Enregistrer les modifications
            </button>
            <a href=\"{{ path('app_test_show', {'id': test.id}) }}\" class=\"btn-cancel\">
                <svg width=\"13\" height=\"13\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2.5\" viewBox=\"0 0 24 24\">
                    <line x1=\"18\" y1=\"6\" x2=\"6\" y2=\"18\"/>
                    <line x1=\"6\" y1=\"6\" x2=\"18\" y2=\"18\"/>
                </svg>
                Annuler
            </a>
        </div>
        {{ form_end(form) }}
    </div>
</div>
{% endblock %}", "back/test/edit.html.twig", "C:\\Users\\sirine\\psy\\templates\\back\\test\\edit.html.twig");
    }
}
