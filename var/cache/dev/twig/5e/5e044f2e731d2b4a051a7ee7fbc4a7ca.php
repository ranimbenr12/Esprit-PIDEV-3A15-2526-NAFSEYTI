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

/* back/test/show.html.twig */
class __TwigTemplate_4363a7490cad29f4dc0f74c562dcfcc2 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/test/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/test/show.html.twig"));

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

        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 3, $this->source); })()), "titre", [], "any", false, false, false, 3), "html", null, true);
        yield " — Nafseyti";
        
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
    public function block_admin_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_content"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_content"));

        // line 7
        yield "<div class=\"nt-page\">

    <div class=\"nt-header\">
        <div class=\"nt-header-left\">
            <div class=\"nt-eyebrow\">Détail du test</div>
            <h1 class=\"nt-title\">";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 12, $this->source); })()), "titre", [], "any", false, false, false, 12), "html", null, true);
        yield "</h1>
        </div>
        <div style=\"display:flex; gap:10px;\">
            <a href=\"";
        // line 15
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_test_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 15, $this->source); })()), "id", [], "any", false, false, false, 15)]), "html", null, true);
        yield "\" class=\"btn-create\">
                <svg width=\"14\" height=\"14\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2.5\" viewBox=\"0 0 24 24\"><path d=\"M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7\"/><path d=\"M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z\"/></svg>
                Modifier
            </a>
            <a href=\"";
        // line 19
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_test_index");
        yield "\" class=\"btn-create\" style=\"background:var(--ink-soft);\">
                <svg width=\"14\" height=\"14\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2.5\" viewBox=\"0 0 24 24\"><line x1=\"19\" y1=\"12\" x2=\"5\" y2=\"12\"/><polyline points=\"12 19 5 12 12 5\"/></svg>
                Retour
            </a>
        </div>
    </div>

    <div class=\"form-card\" style=\"max-width:100%;\">
        <div class=\"form-body\">
            <div class=\"field-row\">
                <div class=\"field-group\">
                    <span class=\"field-label\">Titre</span>
                    <p>";
        // line 31
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 31, $this->source); })()), "titre", [], "any", false, false, false, 31), "html", null, true);
        yield "</p>
                </div>
                <div class=\"field-group\">
                    <span class=\"field-label\">Statut</span>
                    <p>
                        ";
        // line 36
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 36, $this->source); })()), "status", [], "any", false, false, false, 36) == "actif")) {
            // line 37
            yield "                            <span class=\"badge badge-actif\">Actif</span>
                        ";
        } else {
            // line 39
            yield "                            <span class=\"badge badge-inact\">Inactif</span>
                        ";
        }
        // line 41
        yield "                    </p>
                </div>
            </div>

            <div class=\"field-group\">
                <span class=\"field-label\">Description</span>
                <p>";
        // line 47
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["test"] ?? null), "description", [], "any", true, true, false, 47) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 47, $this->source); })()), "description", [], "any", false, false, false, 47)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 47, $this->source); })()), "description", [], "any", false, false, false, 47), "html", null, true)) : ("—"));
        yield "</p>
            </div>

            <div class=\"field-row\">
                <div class=\"field-group\">
                    <span class=\"field-label\">Catégorie</span>
                    <p><span class=\"badge badge-cat\">";
        // line 53
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 53, $this->source); })()), "categorie", [], "any", false, false, false, 53)), "html", null, true);
        yield "</span></p>
                </div>
                <div class=\"field-group\">
                    <span class=\"field-label\">Niveau</span>
                    <p><span class=\"badge badge-niveau\">";
        // line 57
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 57, $this->source); })()), "niveau", [], "any", false, false, false, 57)), "html", null, true);
        yield "</span></p>
                </div>
            </div>

            <div class=\"field-row\">
                <div class=\"field-group\">
                    <span class=\"field-label\">Durée</span>
                    <p>";
        // line 64
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 64, $this->source); })()), "duree", [], "any", false, false, false, 64)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 64, $this->source); })()), "duree", [], "any", false, false, false, 64) . " min"), "html", null, true)) : ("—"));
        yield "</p>
                </div>
                <div class=\"field-group\">
                    <span class=\"field-label\">Score maximum</span>
                    <p>";
        // line 68
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["test"] ?? null), "scoreMax", [], "any", true, true, false, 68) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 68, $this->source); })()), "scoreMax", [], "any", false, false, false, 68)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 68, $this->source); })()), "scoreMax", [], "any", false, false, false, 68), "html", null, true)) : ("—"));
        yield "</p>
                </div>
            </div>

            <div class=\"field-group\">
                <span class=\"field-label\">Questions</span>
                <p><span class=\"badge badge-q\">";
        // line 74
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 74, $this->source); })()), "questions", [], "any", false, false, false, 74)), "html", null, true);
        yield " question";
        yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 74, $this->source); })()), "questions", [], "any", false, false, false, 74)) > 1)) ? ("s") : (""));
        yield "</span></p>
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
        return "back/test/show.html.twig";
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
        return array (  228 => 74,  219 => 68,  212 => 64,  202 => 57,  195 => 53,  186 => 47,  178 => 41,  174 => 39,  170 => 37,  168 => 36,  160 => 31,  145 => 19,  138 => 15,  132 => 12,  125 => 7,  112 => 6,  89 => 4,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'back/admin_base.html.twig' %}

{% block title %}{{ test.titre }} — Nafseyti{% endblock %}
{% block test_active %}active{% endblock %}

{% block admin_content %}
<div class=\"nt-page\">

    <div class=\"nt-header\">
        <div class=\"nt-header-left\">
            <div class=\"nt-eyebrow\">Détail du test</div>
            <h1 class=\"nt-title\">{{ test.titre }}</h1>
        </div>
        <div style=\"display:flex; gap:10px;\">
            <a href=\"{{ path('app_test_edit', {'id': test.id}) }}\" class=\"btn-create\">
                <svg width=\"14\" height=\"14\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2.5\" viewBox=\"0 0 24 24\"><path d=\"M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7\"/><path d=\"M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z\"/></svg>
                Modifier
            </a>
            <a href=\"{{ path('app_test_index') }}\" class=\"btn-create\" style=\"background:var(--ink-soft);\">
                <svg width=\"14\" height=\"14\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2.5\" viewBox=\"0 0 24 24\"><line x1=\"19\" y1=\"12\" x2=\"5\" y2=\"12\"/><polyline points=\"12 19 5 12 12 5\"/></svg>
                Retour
            </a>
        </div>
    </div>

    <div class=\"form-card\" style=\"max-width:100%;\">
        <div class=\"form-body\">
            <div class=\"field-row\">
                <div class=\"field-group\">
                    <span class=\"field-label\">Titre</span>
                    <p>{{ test.titre }}</p>
                </div>
                <div class=\"field-group\">
                    <span class=\"field-label\">Statut</span>
                    <p>
                        {% if test.status == 'actif' %}
                            <span class=\"badge badge-actif\">Actif</span>
                        {% else %}
                            <span class=\"badge badge-inact\">Inactif</span>
                        {% endif %}
                    </p>
                </div>
            </div>

            <div class=\"field-group\">
                <span class=\"field-label\">Description</span>
                <p>{{ test.description ?? '—' }}</p>
            </div>

            <div class=\"field-row\">
                <div class=\"field-group\">
                    <span class=\"field-label\">Catégorie</span>
                    <p><span class=\"badge badge-cat\">{{ test.categorie|capitalize }}</span></p>
                </div>
                <div class=\"field-group\">
                    <span class=\"field-label\">Niveau</span>
                    <p><span class=\"badge badge-niveau\">{{ test.niveau|capitalize }}</span></p>
                </div>
            </div>

            <div class=\"field-row\">
                <div class=\"field-group\">
                    <span class=\"field-label\">Durée</span>
                    <p>{{ test.duree ? test.duree ~ ' min' : '—' }}</p>
                </div>
                <div class=\"field-group\">
                    <span class=\"field-label\">Score maximum</span>
                    <p>{{ test.scoreMax ?? '—' }}</p>
                </div>
            </div>

            <div class=\"field-group\">
                <span class=\"field-label\">Questions</span>
                <p><span class=\"badge badge-q\">{{ test.questions|length }} question{{ test.questions|length > 1 ? 's' : '' }}</span></p>
            </div>
        </div>
    </div>

</div>
{% endblock %}", "back/test/show.html.twig", "C:\\Users\\sirine\\psy\\templates\\back\\test\\show.html.twig");
    }
}
