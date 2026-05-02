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

/* back/question/show.html.twig */
class __TwigTemplate_cbaf83f51d5f2971f06b03911c7c387b extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/question/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/question/show.html.twig"));

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

        yield "Question #";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 3, $this->source); })()), "id", [], "any", false, false, false, 3), "html", null, true);
        yield " — Nafseyti";
        
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
        yield "

<div class=\"nt\">
    <div class=\"nt-breadcrumb\">
        <a href=\"";
        // line 11
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_question_index");
        yield "\">Questions</a>
        <span>/</span>
        <span>Question #";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 13, $this->source); })()), "id", [], "any", false, false, false, 13), "html", null, true);
        yield "</span>
    </div>

    <div class=\"nt-header\">
        <div>
            <div class=\"nt-eyebrow\">Détails de la question</div>
            <h1 class=\"nt-title\">";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 19, $this->source); })()), "texte", [], "any", false, false, false, 19), 0, 80), "html", null, true);
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 19, $this->source); })()), "texte", [], "any", false, false, false, 19)) > 80)) {
            yield "…";
        }
        yield "</h1>
        </div>
        <div style=\"display:flex;gap:10px;flex-shrink:0;\">
            <a href=\"";
        // line 22
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_question_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 22, $this->source); })()), "id", [], "any", false, false, false, 22)]), "html", null, true);
        yield "\" class=\"btn-warning-nt\">
                <svg width=\"14\" height=\"14\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\"><path d=\"M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7\"/><path d=\"M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z\"/></svg>
                Modifier
            </a>
            <button type=\"button\" class=\"btn-danger-nt\" onclick=\"deleteQuestion(";
        // line 26
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 26, $this->source); })()), "id", [], "any", false, false, false, 26), "html", null, true);
        yield ")\">
                <svg width=\"14\" height=\"14\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\"><polyline points=\"3 6 5 6 21 6\"/><path d=\"M19 6l-1 14H6L5 6\"/><path d=\"M10 11v6M14 11v6\"/><path d=\"M9 6V4h6v2\"/></svg>
                Supprimer
            </button>
        </div>
    </div>

    <div class=\"nt-card\">
        <div class=\"nt-card-head\">
            <div class=\"icon\">
                <svg width=\"15\" height=\"15\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\"><circle cx=\"12\" cy=\"12\" r=\"9\"/><path d=\"M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3\"/><line x1=\"12\" y1=\"17\" x2=\"12.01\" y2=\"17\"/></svg>
            </div>
            <h3>Fiche question</h3>
        </div>

        <table class=\"info-table\">
            <tr>
                <th>Test associé</th>
                <td>
                    ";
        // line 45
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 45, $this->source); })()), "test", [], "any", false, false, false, 45)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 46
            yield "                        <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_test_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 46, $this->source); })()), "test", [], "any", false, false, false, 46), "id", [], "any", false, false, false, 46)]), "html", null, true);
            yield "\"
                           style=\"color:var(--green-mid);font-weight:600;text-decoration:none;\">
                            ";
            // line 48
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 48, $this->source); })()), "test", [], "any", false, false, false, 48), "titre", [], "any", false, false, false, 48), "html", null, true);
            yield "
                        </a>
                    ";
        } else {
            // line 51
            yield "                        <span style=\"color:var(--ink-soft);\">Non associé</span>
                    ";
        }
        // line 53
        yield "                </td>
            </tr>
            <tr>
                <th>Texte</th>
                <td><div class=\"q-block\">";
        // line 57
        yield Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 57, $this->source); })()), "texte", [], "any", false, false, false, 57), "html", null, true));
        yield "</div></td>
            </tr>
            <tr>
                <th>Type</th>
                <td>
                    ";
        // line 62
        $context["typeLabels"] = ["qcm_unique" => "QCM (Choix unique)", "qcm_multiple" => "QCM (Choix multiple)", "texte_libre" => "Texte libre", "likert" => "Échelle de Likert", "numerique" => "Numérique", "vrai_faux" => "Vrai / Faux"];
        // line 63
        yield "                    <span class=\"badge badge-type\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, ($context["typeLabels"] ?? null), CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 63, $this->source); })()), "typeQuestion", [], "any", false, false, false, 63), [], "array", true, true, false, 63)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["typeLabels"]) || array_key_exists("typeLabels", $context) ? $context["typeLabels"] : (function () { throw new RuntimeError('Variable "typeLabels" does not exist.', 63, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 63, $this->source); })()), "typeQuestion", [], "any", false, false, false, 63), [], "array", false, false, false, 63), CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 63, $this->source); })()), "typeQuestion", [], "any", false, false, false, 63))) : (CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 63, $this->source); })()), "typeQuestion", [], "any", false, false, false, 63))), "html", null, true);
        yield "</span>
                </td>
            </tr>
            <tr>
                <th>Réponses possibles</th>
                <td>
                    ";
        // line 69
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 69, $this->source); })()), "reponsesPossibles", [], "any", false, false, false, 69)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 70
            yield "                        <ul class=\"reponses-list\">
                            ";
            // line 71
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::split($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 71, $this->source); })()), "reponsesPossibles", [], "any", false, false, false, 71), "|"));
            foreach ($context['_seq'] as $context["_key"] => $context["r"]) {
                // line 72
                yield "                                <li>";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::trim($context["r"]), "html", null, true);
                yield "</li>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['r'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 74
            yield "                        </ul>
                    ";
        } else {
            // line 76
            yield "                        <span style=\"color:var(--ink-soft);font-size:.82rem;\">Aucune option (réponse libre ou numérique)</span>
                    ";
        }
        // line 78
        yield "                </td>
            </tr>
            <tr>
                <th>Points</th>
                <td><strong style=\"color:var(--green-deep);\">";
        // line 82
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 82, $this->source); })()), "points", [], "any", false, false, false, 82), "html", null, true);
        yield "</strong></td>
            </tr>
            <tr>
                <th>Ordre</th>
                <td>";
        // line 86
        yield ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 86, $this->source); })()), "ordre", [], "any", false, false, false, 86)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 86, $this->source); })()), "ordre", [], "any", false, false, false, 86), "html", null, true)) : ("—"));
        yield "</td>
            </tr>
            <tr>
                <th>Obligatoire</th>
                <td>
                    ";
        // line 91
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 91, $this->source); })()), "obligatoire", [], "any", false, false, false, 91)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 92
            yield "                        <span class=\"badge badge-oui\">Oui</span>
                    ";
        } else {
            // line 94
            yield "                        <span class=\"badge badge-non\">Non</span>
                    ";
        }
        // line 96
        yield "                </td>
            </tr>
            <tr>
                <th>Statut</th>
                <td>
                    ";
        // line 101
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 101, $this->source); })()), "status", [], "any", false, false, false, 101) == "actif")) {
            // line 102
            yield "                        <span class=\"badge badge-actif\"><svg width=\"7\" height=\"7\" viewBox=\"0 0 8 8\" fill=\"currentColor\"><circle cx=\"4\" cy=\"4\" r=\"4\"/></svg> Actif</span>
                    ";
        } else {
            // line 104
            yield "                        <span class=\"badge badge-inact\"><svg width=\"7\" height=\"7\" viewBox=\"0 0 8 8\" fill=\"currentColor\"><circle cx=\"4\" cy=\"4\" r=\"4\"/></svg> Inactif</span>
                    ";
        }
        // line 106
        yield "                </td>
            </tr>
            <tr>
                <th>Créé le</th>
                <td style=\"color:var(--ink-soft);\">";
        // line 110
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 110, $this->source); })()), "createdAt", [], "any", false, false, false, 110), "d/m/Y à H:i"), "html", null, true);
        yield "</td>
            </tr>
        </table>

        <div class=\"card-actions\">
            <a href=\"";
        // line 115
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_question_index");
        yield "\" class=\"btn-secondary-nt\">
                <svg width=\"13\" height=\"13\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2.5\" viewBox=\"0 0 24 24\"><line x1=\"19\" y1=\"12\" x2=\"5\" y2=\"12\"/><polyline points=\"12 19 5 12 12 5\"/></svg>
                Retour à la liste
            </a>
            ";
        // line 119
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 119, $this->source); })()), "test", [], "any", false, false, false, 119)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 120
            yield "                <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_test_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 120, $this->source); })()), "test", [], "any", false, false, false, 120), "id", [], "any", false, false, false, 120)]), "html", null, true);
            yield "\" class=\"btn-secondary-nt\">
                    <svg width=\"13\" height=\"13\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\"><path d=\"M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2\"/><rect x=\"9\" y=\"3\" width=\"6\" height=\"4\" rx=\"2\"/></svg>
                    Voir le test
                </a>
            ";
        }
        // line 125
        yield "        </div>
    </div>
</div>

<form id=\"delete-form-";
        // line 129
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 129, $this->source); })()), "id", [], "any", false, false, false, 129), "html", null, true);
        yield "\" method=\"post\" action=\"";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_question_delete", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 129, $this->source); })()), "id", [], "any", false, false, false, 129)]), "html", null, true);
        yield "\" style=\"display:none;\">
    <input type=\"hidden\" name=\"_token\" value=\"";
        // line 130
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 130, $this->source); })()), "id", [], "any", false, false, false, 130))), "html", null, true);
        yield "\">
</form>

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
        return "back/question/show.html.twig";
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
        return array (  346 => 130,  340 => 129,  334 => 125,  325 => 120,  323 => 119,  316 => 115,  308 => 110,  302 => 106,  298 => 104,  294 => 102,  292 => 101,  285 => 96,  281 => 94,  277 => 92,  275 => 91,  267 => 86,  260 => 82,  254 => 78,  250 => 76,  246 => 74,  237 => 72,  233 => 71,  230 => 70,  228 => 69,  218 => 63,  216 => 62,  208 => 57,  202 => 53,  198 => 51,  192 => 48,  186 => 46,  184 => 45,  162 => 26,  155 => 22,  146 => 19,  137 => 13,  132 => 11,  126 => 7,  113 => 6,  90 => 4,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'back/admin_base.html.twig' %}

{% block title %}Question #{{ question.id }} — Nafseyti{% endblock %}
{% block question_active %}active{% endblock %}

{% block admin_content %}


<div class=\"nt\">
    <div class=\"nt-breadcrumb\">
        <a href=\"{{ path('app_question_index') }}\">Questions</a>
        <span>/</span>
        <span>Question #{{ question.id }}</span>
    </div>

    <div class=\"nt-header\">
        <div>
            <div class=\"nt-eyebrow\">Détails de la question</div>
            <h1 class=\"nt-title\">{{ question.texte|slice(0,80) }}{% if question.texte|length > 80 %}…{% endif %}</h1>
        </div>
        <div style=\"display:flex;gap:10px;flex-shrink:0;\">
            <a href=\"{{ path('app_question_edit', {'id': question.id}) }}\" class=\"btn-warning-nt\">
                <svg width=\"14\" height=\"14\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\"><path d=\"M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7\"/><path d=\"M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z\"/></svg>
                Modifier
            </a>
            <button type=\"button\" class=\"btn-danger-nt\" onclick=\"deleteQuestion({{ question.id }})\">
                <svg width=\"14\" height=\"14\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\"><polyline points=\"3 6 5 6 21 6\"/><path d=\"M19 6l-1 14H6L5 6\"/><path d=\"M10 11v6M14 11v6\"/><path d=\"M9 6V4h6v2\"/></svg>
                Supprimer
            </button>
        </div>
    </div>

    <div class=\"nt-card\">
        <div class=\"nt-card-head\">
            <div class=\"icon\">
                <svg width=\"15\" height=\"15\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\"><circle cx=\"12\" cy=\"12\" r=\"9\"/><path d=\"M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3\"/><line x1=\"12\" y1=\"17\" x2=\"12.01\" y2=\"17\"/></svg>
            </div>
            <h3>Fiche question</h3>
        </div>

        <table class=\"info-table\">
            <tr>
                <th>Test associé</th>
                <td>
                    {% if question.test %}
                        <a href=\"{{ path('app_test_show', {'id': question.test.id}) }}\"
                           style=\"color:var(--green-mid);font-weight:600;text-decoration:none;\">
                            {{ question.test.titre }}
                        </a>
                    {% else %}
                        <span style=\"color:var(--ink-soft);\">Non associé</span>
                    {% endif %}
                </td>
            </tr>
            <tr>
                <th>Texte</th>
                <td><div class=\"q-block\">{{ question.texte|nl2br }}</div></td>
            </tr>
            <tr>
                <th>Type</th>
                <td>
                    {% set typeLabels = {'qcm_unique':'QCM (Choix unique)','qcm_multiple':'QCM (Choix multiple)','texte_libre':'Texte libre','likert':'Échelle de Likert','numerique':'Numérique','vrai_faux':'Vrai / Faux'} %}
                    <span class=\"badge badge-type\">{{ typeLabels[question.typeQuestion]|default(question.typeQuestion) }}</span>
                </td>
            </tr>
            <tr>
                <th>Réponses possibles</th>
                <td>
                    {% if question.reponsesPossibles %}
                        <ul class=\"reponses-list\">
                            {% for r in question.reponsesPossibles|split('|') %}
                                <li>{{ r|trim }}</li>
                            {% endfor %}
                        </ul>
                    {% else %}
                        <span style=\"color:var(--ink-soft);font-size:.82rem;\">Aucune option (réponse libre ou numérique)</span>
                    {% endif %}
                </td>
            </tr>
            <tr>
                <th>Points</th>
                <td><strong style=\"color:var(--green-deep);\">{{ question.points }}</strong></td>
            </tr>
            <tr>
                <th>Ordre</th>
                <td>{{ question.ordre ?: '—' }}</td>
            </tr>
            <tr>
                <th>Obligatoire</th>
                <td>
                    {% if question.obligatoire %}
                        <span class=\"badge badge-oui\">Oui</span>
                    {% else %}
                        <span class=\"badge badge-non\">Non</span>
                    {% endif %}
                </td>
            </tr>
            <tr>
                <th>Statut</th>
                <td>
                    {% if question.status == 'actif' %}
                        <span class=\"badge badge-actif\"><svg width=\"7\" height=\"7\" viewBox=\"0 0 8 8\" fill=\"currentColor\"><circle cx=\"4\" cy=\"4\" r=\"4\"/></svg> Actif</span>
                    {% else %}
                        <span class=\"badge badge-inact\"><svg width=\"7\" height=\"7\" viewBox=\"0 0 8 8\" fill=\"currentColor\"><circle cx=\"4\" cy=\"4\" r=\"4\"/></svg> Inactif</span>
                    {% endif %}
                </td>
            </tr>
            <tr>
                <th>Créé le</th>
                <td style=\"color:var(--ink-soft);\">{{ question.createdAt|date('d/m/Y à H:i') }}</td>
            </tr>
        </table>

        <div class=\"card-actions\">
            <a href=\"{{ path('app_question_index') }}\" class=\"btn-secondary-nt\">
                <svg width=\"13\" height=\"13\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2.5\" viewBox=\"0 0 24 24\"><line x1=\"19\" y1=\"12\" x2=\"5\" y2=\"12\"/><polyline points=\"12 19 5 12 12 5\"/></svg>
                Retour à la liste
            </a>
            {% if question.test %}
                <a href=\"{{ path('app_test_show', {'id': question.test.id}) }}\" class=\"btn-secondary-nt\">
                    <svg width=\"13\" height=\"13\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\"><path d=\"M9 5H7a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-2\"/><rect x=\"9\" y=\"3\" width=\"6\" height=\"4\" rx=\"2\"/></svg>
                    Voir le test
                </a>
            {% endif %}
        </div>
    </div>
</div>

<form id=\"delete-form-{{ question.id }}\" method=\"post\" action=\"{{ path('app_question_delete', {'id': question.id}) }}\" style=\"display:none;\">
    <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete'~question.id) }}\">
</form>

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
</script>
{% endblock %}
", "back/question/show.html.twig", "C:\\Users\\sirine\\psy\\templates\\back\\question\\show.html.twig");
    }
}
