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

/* back/question/_table_rows.html.twig */
class __TwigTemplate_411d2f44f1b8c028c3352669098bf1de extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/question/_table_rows.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/question/_table_rows.html.twig"));

        // line 1
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["questions"]) || array_key_exists("questions", $context) ? $context["questions"] : (function () { throw new RuntimeError('Variable "questions" does not exist.', 1, $this->source); })()))) {
            // line 2
            yield "    <tr><td colspan=\"6\">
        <div class=\"empty-state\">
            <div class=\"empty-circle\">
                <svg width=\"28\" height=\"28\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"1.5\" viewBox=\"0 0 24 24\"><circle cx=\"12\" cy=\"12\" r=\"9\"/><path d=\"M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3\"/><line x1=\"12\" y1=\"17\" x2=\"12.01\" y2=\"17\"/></svg>
            </div>
            <h4>Aucune question trouvée</h4>
            <p>Créez votre première question ou modifiez les filtres.</p>
            <a href=\"";
            // line 9
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_question_new");
            yield "\" class=\"btn-create\" style=\"margin:0 auto;\">Créer une question</a>
        </div>
    </td></tr>
";
        } else {
            // line 13
            yield "    ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["questions"]) || array_key_exists("questions", $context) ? $context["questions"] : (function () { throw new RuntimeError('Variable "questions" does not exist.', 13, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["question"]) {
                // line 14
                yield "    <tr>
        <td>
            ";
                // line 16
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["question"], "test", [], "any", false, false, false, 16)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 17
                    yield "                <a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_test_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["question"], "test", [], "any", false, false, false, 17), "id", [], "any", false, false, false, 17)]), "html", null, true);
                    yield "\" style=\"text-decoration:none;\">
                    <span class=\"badge badge-test\">";
                    // line 18
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["question"], "test", [], "any", false, false, false, 18), "titre", [], "any", false, false, false, 18), 0, 28), "html", null, true);
                    if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["question"], "test", [], "any", false, false, false, 18), "titre", [], "any", false, false, false, 18)) > 28)) {
                        yield "…";
                    }
                    yield "</span>
                </a>
            ";
                } else {
                    // line 21
                    yield "                <span style=\"color:var(--ink-soft);font-size:.8rem;\">—</span>
            ";
                }
                // line 23
                yield "        </td>
        <td class=\"q-text\">
            <strong>";
                // line 25
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["question"], "texte", [], "any", false, false, false, 25), 0, 70), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["question"], "texte", [], "any", false, false, false, 25)) > 70)) {
                    yield "…";
                }
                yield "</strong>
            ";
                // line 26
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["question"], "reponsesPossibles", [], "any", false, false, false, 26)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 27
                    yield "                <small>";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), Twig\Extension\CoreExtension::replace(CoreExtension::getAttribute($this->env, $this->source, $context["question"], "reponsesPossibles", [], "any", false, false, false, 27), ["|" => " · "]), 0, 60), "html", null, true);
                    yield "…</small>
            ";
                }
                // line 29
                yield "        </td>
        <td>
            ";
                // line 31
                $context["typeLabels"] = ["qcm_unique" => "QCM Unique", "qcm_multiple" => "QCM Multiple", "texte_libre" => "Texte libre", "likert" => "Likert", "numerique" => "Numérique", "vrai_faux" => "Vrai / Faux"];
                // line 32
                yield "            <span class=\"badge badge-type\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["typeLabels"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["question"], "typeQuestion", [], "any", false, false, false, 32), [], "array", true, true, false, 32)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["typeLabels"]) || array_key_exists("typeLabels", $context) ? $context["typeLabels"] : (function () { throw new RuntimeError('Variable "typeLabels" does not exist.', 32, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["question"], "typeQuestion", [], "any", false, false, false, 32), [], "array", false, false, false, 32), CoreExtension::getAttribute($this->env, $this->source, $context["question"], "typeQuestion", [], "any", false, false, false, 32))) : (CoreExtension::getAttribute($this->env, $this->source, $context["question"], "typeQuestion", [], "any", false, false, false, 32))), "html", null, true);
                yield "</span>
        </td>
        <td style=\"color:var(--ink-mid);font-weight:600;\">";
                // line 34
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["question"], "points", [], "any", false, false, false, 34), "html", null, true);
                yield "</td>
        <td>
            ";
                // line 36
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["question"], "status", [], "any", false, false, false, 36) == "actif")) {
                    // line 37
                    yield "                <span class=\"badge badge-actif\"><svg width=\"7\" height=\"7\" viewBox=\"0 0 8 8\" fill=\"currentColor\"><circle cx=\"4\" cy=\"4\" r=\"4\"/></svg> Actif</span>
            ";
                } else {
                    // line 39
                    yield "                <span class=\"badge badge-inact\"><svg width=\"7\" height=\"7\" viewBox=\"0 0 8 8\" fill=\"currentColor\"><circle cx=\"4\" cy=\"4\" r=\"4\"/></svg> Inactif</span>
            ";
                }
                // line 41
                yield "        </td>
        <td>
            <div class=\"actions\" style=\"justify-content:center;\">
                <a href=\"";
                // line 44
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_question_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["question"], "id", [], "any", false, false, false, 44)]), "html", null, true);
                yield "\" class=\"btn-act view\" title=\"Voir\">
                    <svg width=\"14\" height=\"14\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\"><path d=\"M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12z\"/><circle cx=\"12\" cy=\"12\" r=\"3\"/></svg>
                </a>
                <a href=\"";
                // line 47
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_question_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["question"], "id", [], "any", false, false, false, 47)]), "html", null, true);
                yield "\" class=\"btn-act edit\" title=\"Modifier\">
                    <svg width=\"14\" height=\"14\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\"><path d=\"M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7\"/><path d=\"M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z\"/></svg>
                </a>
                <button type=\"button\" class=\"btn-act del\" title=\"Supprimer\" onclick=\"deleteQuestion(";
                // line 50
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["question"], "id", [], "any", false, false, false, 50), "html", null, true);
                yield ")\">
                    <svg width=\"14\" height=\"14\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\"><polyline points=\"3 6 5 6 21 6\"/><path d=\"M19 6l-1 14H6L5 6\"/><path d=\"M10 11v6M14 11v6\"/><path d=\"M9 6V4h6v2\"/></svg>
                </button>
            </div>
            <form id=\"delete-form-";
                // line 54
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["question"], "id", [], "any", false, false, false, 54), "html", null, true);
                yield "\" method=\"post\" action=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_question_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["question"], "id", [], "any", false, false, false, 54)]), "html", null, true);
                yield "\" style=\"display:none;\">
                <input type=\"hidden\" name=\"_token\" value=\"";
                // line 55
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, $context["question"], "id", [], "any", false, false, false, 55))), "html", null, true);
                yield "\">
            </form>
        </td>
    </tr>
    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['question'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "back/question/_table_rows.html.twig";
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
        return array (  171 => 55,  165 => 54,  158 => 50,  152 => 47,  146 => 44,  141 => 41,  137 => 39,  133 => 37,  131 => 36,  126 => 34,  120 => 32,  118 => 31,  114 => 29,  108 => 27,  106 => 26,  99 => 25,  95 => 23,  91 => 21,  82 => 18,  77 => 17,  75 => 16,  71 => 14,  66 => 13,  59 => 9,  50 => 2,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% if questions is empty %}
    <tr><td colspan=\"6\">
        <div class=\"empty-state\">
            <div class=\"empty-circle\">
                <svg width=\"28\" height=\"28\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"1.5\" viewBox=\"0 0 24 24\"><circle cx=\"12\" cy=\"12\" r=\"9\"/><path d=\"M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3\"/><line x1=\"12\" y1=\"17\" x2=\"12.01\" y2=\"17\"/></svg>
            </div>
            <h4>Aucune question trouvée</h4>
            <p>Créez votre première question ou modifiez les filtres.</p>
            <a href=\"{{ path('app_question_new') }}\" class=\"btn-create\" style=\"margin:0 auto;\">Créer une question</a>
        </div>
    </td></tr>
{% else %}
    {% for question in questions %}
    <tr>
        <td>
            {% if question.test %}
                <a href=\"{{ path('app_test_show', {'id': question.test.id}) }}\" style=\"text-decoration:none;\">
                    <span class=\"badge badge-test\">{{ question.test.titre|slice(0,28) }}{% if question.test.titre|length > 28 %}…{% endif %}</span>
                </a>
            {% else %}
                <span style=\"color:var(--ink-soft);font-size:.8rem;\">—</span>
            {% endif %}
        </td>
        <td class=\"q-text\">
            <strong>{{ question.texte|slice(0,70) }}{% if question.texte|length > 70 %}…{% endif %}</strong>
            {% if question.reponsesPossibles %}
                <small>{{ question.reponsesPossibles|replace({'|': ' · '})|slice(0,60) }}…</small>
            {% endif %}
        </td>
        <td>
            {% set typeLabels = {'qcm_unique':'QCM Unique','qcm_multiple':'QCM Multiple','texte_libre':'Texte libre','likert':'Likert','numerique':'Numérique','vrai_faux':'Vrai / Faux'} %}
            <span class=\"badge badge-type\">{{ typeLabels[question.typeQuestion]|default(question.typeQuestion) }}</span>
        </td>
        <td style=\"color:var(--ink-mid);font-weight:600;\">{{ question.points }}</td>
        <td>
            {% if question.status == 'actif' %}
                <span class=\"badge badge-actif\"><svg width=\"7\" height=\"7\" viewBox=\"0 0 8 8\" fill=\"currentColor\"><circle cx=\"4\" cy=\"4\" r=\"4\"/></svg> Actif</span>
            {% else %}
                <span class=\"badge badge-inact\"><svg width=\"7\" height=\"7\" viewBox=\"0 0 8 8\" fill=\"currentColor\"><circle cx=\"4\" cy=\"4\" r=\"4\"/></svg> Inactif</span>
            {% endif %}
        </td>
        <td>
            <div class=\"actions\" style=\"justify-content:center;\">
                <a href=\"{{ path('app_question_show', {'id': question.id}) }}\" class=\"btn-act view\" title=\"Voir\">
                    <svg width=\"14\" height=\"14\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\"><path d=\"M1 12s4-7 11-7 11 7 11 7-4 7-11 7S1 12 1 12z\"/><circle cx=\"12\" cy=\"12\" r=\"3\"/></svg>
                </a>
                <a href=\"{{ path('app_question_edit', {'id': question.id}) }}\" class=\"btn-act edit\" title=\"Modifier\">
                    <svg width=\"14\" height=\"14\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\"><path d=\"M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7\"/><path d=\"M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z\"/></svg>
                </a>
                <button type=\"button\" class=\"btn-act del\" title=\"Supprimer\" onclick=\"deleteQuestion({{ question.id }})\">
                    <svg width=\"14\" height=\"14\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\"><polyline points=\"3 6 5 6 21 6\"/><path d=\"M19 6l-1 14H6L5 6\"/><path d=\"M10 11v6M14 11v6\"/><path d=\"M9 6V4h6v2\"/></svg>
                </button>
            </div>
            <form id=\"delete-form-{{ question.id }}\" method=\"post\" action=\"{{ path('app_question_delete', {'id': question.id}) }}\" style=\"display:none;\">
                <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete'~question.id) }}\">
            </form>
        </td>
    </tr>
    {% endfor %}
{% endif %}", "back/question/_table_rows.html.twig", "C:\\Users\\sirine\\psy\\templates\\back\\question\\_table_rows.html.twig");
    }
}
