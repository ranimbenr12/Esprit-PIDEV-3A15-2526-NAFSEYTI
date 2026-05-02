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

/* back/test/_test_rows.html.twig */
class __TwigTemplate_3218c4dd85f53c139874e079ce9f27c1 extends Template
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

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/test/_test_rows.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/test/_test_rows.html.twig"));

        // line 1
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["tests"]) || array_key_exists("tests", $context) ? $context["tests"] : (function () { throw new RuntimeError('Variable "tests" does not exist.', 1, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["test"]) {
            // line 2
            yield "<tr>
    <td><span class=\"cell-id\">#";
            // line 3
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["test"], "id", [], "any", false, false, false, 3), "html", null, true);
            yield "</span></td>
    <td class=\"cell-title\">
        <strong>";
            // line 5
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["test"], "titre", [], "any", false, false, false, 5), "html", null, true);
            yield "</strong>
        ";
            // line 6
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["test"], "description", [], "any", false, false, false, 6)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 7
                yield "            <small>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["test"], "description", [], "any", false, false, false, 7), 0, 70), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["test"], "description", [], "any", false, false, false, 7)) > 70)) {
                    yield "…";
                }
                yield "</small>
        ";
            }
            // line 9
            yield "    </td>
    <td><span class=\"badge badge-cat\">";
            // line 10
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["test"], "categorie", [], "any", false, false, false, 10)), "html", null, true);
            yield "</span></td>
    <td><span class=\"badge badge-niveau\">";
            // line 11
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::capitalize($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["test"], "niveau", [], "any", false, false, false, 11)), "html", null, true);
            yield "</span></td>
    <td style=\"color:var(--ink-soft); font-weight:500;\">
        ";
            // line 13
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["test"], "duree", [], "any", false, false, false, 13)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((CoreExtension::getAttribute($this->env, $this->source, $context["test"], "duree", [], "any", false, false, false, 13) . " min"), "html", null, true)) : ("—"));
            yield "
    </td>
    <td>
        <span class=\"badge badge-q\">
            ";
            // line 17
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["test"], "questions", [], "any", false, false, false, 17)), "html", null, true);
            yield "
            ";
            // line 18
            yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["test"], "questions", [], "any", false, false, false, 18)) > 1)) ? ("questions") : ("question"));
            yield "
        </span>
    </td>
    <td>
        ";
            // line 22
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["test"], "status", [], "any", false, false, false, 22) == "actif")) {
                // line 23
                yield "            <span class=\"badge badge-actif\">
                <svg width=\"8\" height=\"8\" viewBox=\"0 0 8 8\" fill=\"currentColor\"><circle cx=\"4\" cy=\"4\" r=\"4\"/></svg>
                Actif
            </span>
        ";
            } else {
                // line 28
                yield "            <span class=\"badge badge-inact\">
                <svg width=\"8\" height=\"8\" viewBox=\"0 0 8 8\" fill=\"currentColor\"><circle cx=\"4\" cy=\"4\" r=\"4\"/></svg>
                Inactif
            </span>
        ";
            }
            // line 33
            yield "    </td>
    <td>
        <div class=\"actions\" style=\"justify-content:center;\">
            <a href=\"";
            // line 36
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_test_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["test"], "id", [], "any", false, false, false, 36)]), "html", null, true);
            yield "\" class=\"btn-act view\" title=\"Voir\">
                <svg width=\"15\" height=\"15\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\"><path d=\"M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12z\"/><circle cx=\"12\" cy=\"12\" r=\"3\"/></svg>
            </a>
            <a href=\"";
            // line 39
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_test_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["test"], "id", [], "any", false, false, false, 39)]), "html", null, true);
            yield "\" class=\"btn-act edit\" title=\"Modifier\">
                <svg width=\"15\" height=\"15\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\"><path d=\"M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7\"/><path d=\"M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z\"/></svg>
            </a>
            <button type=\"button\" class=\"btn-act del\" title=\"Supprimer\"
                    onclick=\"deleteTest(";
            // line 43
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["test"], "id", [], "any", false, false, false, 43), "html", null, true);
            yield ", '";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["test"], "titre", [], "any", false, false, false, 43), "js"), "html", null, true);
            yield "')\">
                <svg width=\"15\" height=\"15\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\"><polyline points=\"3 6 5 6 21 6\"/><path d=\"M19 6l-1 14H6L5 6\"/><path d=\"M10 11v6M14 11v6\"/><path d=\"M9 6V4h6v2\"/></svg>
            </button>
        </div>
        <form id=\"delete-form-";
            // line 47
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["test"], "id", [], "any", false, false, false, 47), "html", null, true);
            yield "\" method=\"post\"
              action=\"";
            // line 48
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_test_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["test"], "id", [], "any", false, false, false, 48)]), "html", null, true);
            yield "\"
              style=\"display:none;\">
            <input type=\"hidden\" name=\"_token\" value=\"";
            // line 50
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["test"], "id", [], "any", false, false, false, 50))), "html", null, true);
            yield "\">
        </form>
    </td>
</tr>
";
            $context['_iterated'] = true;
        }
        // line 54
        if (!$context['_iterated']) {
            // line 55
            yield "<tr>
    <td colspan=\"8\">
        <div class=\"empty-state\">
            <div class=\"empty-circle\">
                <svg width=\"30\" height=\"30\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"1.5\" viewBox=\"0 0 24 24\"><path d=\"M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2\"/><rect x=\"9\" y=\"3\" width=\"6\" height=\"4\" rx=\"2\"/></svg>
            </div>
            <h4>Aucun test trouvé</h4>
            <p>Commencez par créer votre premier test psychologique.</p>
            <a href=\"";
            // line 63
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
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "back/test/_test_rows.html.twig";
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
        return array (  179 => 63,  169 => 55,  167 => 54,  158 => 50,  153 => 48,  149 => 47,  140 => 43,  133 => 39,  127 => 36,  122 => 33,  115 => 28,  108 => 23,  106 => 22,  99 => 18,  95 => 17,  88 => 13,  83 => 11,  79 => 10,  76 => 9,  67 => 7,  65 => 6,  61 => 5,  56 => 3,  53 => 2,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% for test in tests %}
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
{% endfor %}", "back/test/_test_rows.html.twig", "C:\\Users\\sirine\\psy\\templates\\back\\test\\_test_rows.html.twig");
    }
}
