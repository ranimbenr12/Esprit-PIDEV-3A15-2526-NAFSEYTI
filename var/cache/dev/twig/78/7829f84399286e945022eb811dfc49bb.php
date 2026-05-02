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

/* back/question/edit.html.twig */
class __TwigTemplate_eb713e6d9815290a05a3c03c7b215e1c extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/question/edit.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/question/edit.html.twig"));

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

        yield "Modifier la question #";
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
        <a href=\"";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_question_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 13, $this->source); })()), "id", [], "any", false, false, false, 13)]), "html", null, true);
        yield "\">Question #";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 13, $this->source); })()), "id", [], "any", false, false, false, 13), "html", null, true);
        yield "</a>
        <span>/</span>
        <span>Modifier</span>
    </div>
    <div class=\"nt-header\">
        <div class=\"nt-eyebrow\">Modification</div>
        <h1 class=\"nt-title\">Modifier la <em>question</em></h1>
    </div>

    <div class=\"form-card\">
        <div class=\"form-card-head\">
            <div class=\"icon\">
                <svg width=\"16\" height=\"16\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\"><circle cx=\"12\" cy=\"12\" r=\"9\"/><path d=\"M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3\"/><line x1=\"12\" y1=\"17\" x2=\"12.01\" y2=\"17\"/></svg>
            </div>
            <h3>Contenu de la question</h3>
        </div>

        ";
        // line 30
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 30, $this->source); })()), 'form_start', ["attr" => ["id" => "questionForm", "novalidate" => "novalidate"]]);
        yield "
        <div class=\"form-body\">

            <div class=\"field-group\">
                <label class=\"field-label\">Test associé <span class=\"req\">*</span></label>
                ";
        // line 35
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 35, $this->source); })()), "test", [], "any", false, false, false, 35), 'widget');
        yield "
                ";
        // line 36
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 36, $this->source); })()), "test", [], "any", false, false, false, 36), 'errors');
        yield "
            </div>

            <div class=\"field-group\">
                <label class=\"field-label\">Texte de la question <span class=\"req\">*</span></label>
                ";
        // line 41
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 41, $this->source); })()), "texte", [], "any", false, false, false, 41), 'widget', ["attr" => ["rows" => 3, "placeholder" => "Ex : Comment gérez-vous le stress au travail ?"]]);
        yield "
                ";
        // line 42
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 42, $this->source); })()), "texte", [], "any", false, false, false, 42), 'errors');
        yield "
            </div>

            <div class=\"field-group\">
                <label class=\"field-label\">Type de question <span class=\"req\">*</span></label>
                ";
        // line 47
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 47, $this->source); })()), "typeQuestion", [], "any", false, false, false, 47), 'widget', ["attr" => ["id" => "question_type"]]);
        yield "
                ";
        // line 48
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 48, $this->source); })()), "typeQuestion", [], "any", false, false, false, 48), 'errors');
        yield "
                <div class=\"help-box\" id=\"helpBox\">
                    <svg width=\"15\" height=\"15\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\"><circle cx=\"12\" cy=\"12\" r=\"9\"/><line x1=\"12\" y1=\"8\" x2=\"12\" y2=\"12\"/><line x1=\"12\" y1=\"16\" x2=\"12.01\" y2=\"16\"/></svg>
                    <span id=\"helpText\"></span>
                </div>
            </div>

            <div class=\"field-group\" id=\"qcmOptionsGroup\" style=\"display:none;\">
                <label class=\"field-label\">Réponses possibles <span class=\"req\">*</span></label>
                ";
        // line 57
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 57, $this->source); })()), "reponsesPossibles", [], "any", false, false, false, 57), 'widget', ["attr" => ["rows" => 3, "id" => "question_reponses", "placeholder" => "Séparez les options par | — ex : Jamais|Parfois|Souvent|Toujours"]]);
        yield "
                ";
        // line 58
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 58, $this->source); })()), "reponsesPossibles", [], "any", false, false, false, 58), 'errors');
        yield "
                <span class=\"field-hint\">Séparez chaque option par le symbole <strong>|</strong></span>
            </div>

            <div class=\"section-divider\"><span>Paramètres</span></div>

            <div class=\"field-row\">
                <div class=\"field-group\">
                    <label class=\"field-label\">Points</label>
                    ";
        // line 67
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 67, $this->source); })()), "points", [], "any", false, false, false, 67), 'widget');
        yield "
                    ";
        // line 68
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 68, $this->source); })()), "points", [], "any", false, false, false, 68), 'errors');
        yield "
                </div>
                <div class=\"field-group\">
                    <label class=\"field-label\">Ordre d'affichage</label>
                    ";
        // line 72
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 72, $this->source); })()), "ordre", [], "any", false, false, false, 72), 'widget', ["attr" => ["placeholder" => "Auto"]]);
        yield "
                    <span class=\"field-hint\">Laisser vide = ajouté en dernier</span>
                    ";
        // line 74
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 74, $this->source); })()), "ordre", [], "any", false, false, false, 74), 'errors');
        yield "
                </div>
            </div>

            <div class=\"field-row\">
                <div class=\"field-group\">
                    <label class=\"field-label\">Statut</label>
                    ";
        // line 81
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 81, $this->source); })()), "status", [], "any", false, false, false, 81), 'widget');
        yield "
                    ";
        // line 82
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 82, $this->source); })()), "status", [], "any", false, false, false, 82), 'errors');
        yield "
                </div>
                <div class=\"field-group\" style=\"display:flex;align-items:flex-end;padding-bottom:2px;\">
                    <div class=\"checkbox-wrap\">
                        ";
        // line 86
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 86, $this->source); })()), "obligatoire", [], "any", false, false, false, 86), 'widget');
        yield "
                        ";
        // line 87
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 87, $this->source); })()), "obligatoire", [], "any", false, false, false, 87), 'label');
        yield "
                    </div>
                </div>
            </div>

        </div>

        <div class=\"form-footer\">
            <button type=\"submit\" class=\"btn-submit\">
                <svg width=\"14\" height=\"14\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2.5\" viewBox=\"0 0 24 24\"><path d=\"M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z\"/><polyline points=\"17 21 17 13 7 13 7 21\"/><polyline points=\"7 3 7 8 15 8\"/></svg>
                Enregistrer les modifications
            </button>
            <a href=\"";
        // line 99
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_question_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["question"]) || array_key_exists("question", $context) ? $context["question"] : (function () { throw new RuntimeError('Variable "question" does not exist.', 99, $this->source); })()), "id", [], "any", false, false, false, 99)]), "html", null, true);
        yield "\" class=\"btn-cancel\">
                <svg width=\"13\" height=\"13\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2.5\" viewBox=\"0 0 24 24\"><line x1=\"18\" y1=\"6\" x2=\"6\" y2=\"18\"/><line x1=\"6\" y1=\"6\" x2=\"18\" y2=\"18\"/></svg>
                Annuler
            </a>
        </div>
        ";
        // line 104
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 104, $this->source); })()), 'form_end');
        yield "
    </div>
</div>

<script>
(function() {
    function initQcm() {
        var form = document.getElementById('questionForm');
        if (!form) { setTimeout(initQcm, 50); return; }

        var typeSelect = form.querySelector('select[id=\"question_type\"]')
                      || form.querySelector('select[id\$=\"typeQuestion\"]')
                      || form.querySelector('select[id\$=\"type_question\"]')
                      || form.querySelector('select[name*=\"typeQuestion\"]')
                      || form.querySelector('select[name*=\"type_question\"]');

        var qcmGroup      = document.getElementById('qcmOptionsGroup');
        var reponsesField = form.querySelector('textarea[id\$=\"reponsesPossibles\"]')
                         || form.querySelector('textarea[id\$=\"reponses_possibles\"]')
                         || form.querySelector('textarea[name*=\"reponsesPossibles\"]');

        if (!typeSelect || !qcmGroup) { setTimeout(initQcm, 50); return; }

        console.log('[QCM] OK - select id=' + typeSelect.id + ' valeur=' + typeSelect.value);

        var helps = {
            'qcm_unique':   { text: \"Sélectionnez une seule réponse parmi les options ci-dessous.\", qcm: true },
            'qcm_multiple': { text: \"Plusieurs réponses possibles parmi les options ci-dessous.\", qcm: true },
            'texte_libre':  { text: \"Réponse libre, aucune option à configurer.\", qcm: false },
            'numerique':    { text: \"Valeur numérique, aucune option à configurer.\", qcm: false }
        };

        function update() {
            var v   = typeSelect.value;
            var cfg = helps[v];
            var helpBox  = document.getElementById('helpBox');
            var helpText = document.getElementById('helpText');
            if (cfg) {
                if (helpText) helpText.textContent = cfg.text;
                if (helpBox)  helpBox.classList.add('visible');
                if (cfg.qcm) {
                    qcmGroup.style.display = 'block';
                    if (reponsesField) reponsesField.setAttribute('required', 'required');
                } else {
                    qcmGroup.style.display = 'none';
                    if (reponsesField) reponsesField.removeAttribute('required');
                }
            } else {
                if (helpBox) helpBox.classList.remove('visible');
                qcmGroup.style.display = 'none';
            }
        }

        typeSelect.addEventListener('change', update);
        update();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initQcm);
    } else {
        initQcm();
    }
    window.addEventListener('load', initQcm);
})();
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
        return "back/question/edit.html.twig";
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
        return array (  287 => 104,  279 => 99,  264 => 87,  260 => 86,  253 => 82,  249 => 81,  239 => 74,  234 => 72,  227 => 68,  223 => 67,  211 => 58,  207 => 57,  195 => 48,  191 => 47,  183 => 42,  179 => 41,  171 => 36,  167 => 35,  159 => 30,  137 => 13,  132 => 11,  126 => 7,  113 => 6,  90 => 4,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'back/admin_base.html.twig' %}

{% block title %}Modifier la question #{{ question.id }} — Nafseyti{% endblock %}
{% block question_active %}active{% endblock %}

{% block admin_content %}


<div class=\"nt\">
    <div class=\"nt-breadcrumb\">
        <a href=\"{{ path('app_question_index') }}\">Questions</a>
        <span>/</span>
        <a href=\"{{ path('app_question_show', {'id': question.id}) }}\">Question #{{ question.id }}</a>
        <span>/</span>
        <span>Modifier</span>
    </div>
    <div class=\"nt-header\">
        <div class=\"nt-eyebrow\">Modification</div>
        <h1 class=\"nt-title\">Modifier la <em>question</em></h1>
    </div>

    <div class=\"form-card\">
        <div class=\"form-card-head\">
            <div class=\"icon\">
                <svg width=\"16\" height=\"16\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\"><circle cx=\"12\" cy=\"12\" r=\"9\"/><path d=\"M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3\"/><line x1=\"12\" y1=\"17\" x2=\"12.01\" y2=\"17\"/></svg>
            </div>
            <h3>Contenu de la question</h3>
        </div>

        {{ form_start(form, {'attr': {'id': 'questionForm', 'novalidate': 'novalidate'}}) }}
        <div class=\"form-body\">

            <div class=\"field-group\">
                <label class=\"field-label\">Test associé <span class=\"req\">*</span></label>
                {{ form_widget(form.test) }}
                {{ form_errors(form.test) }}
            </div>

            <div class=\"field-group\">
                <label class=\"field-label\">Texte de la question <span class=\"req\">*</span></label>
                {{ form_widget(form.texte, {'attr': {'rows': 3, 'placeholder': 'Ex : Comment gérez-vous le stress au travail ?'}}) }}
                {{ form_errors(form.texte) }}
            </div>

            <div class=\"field-group\">
                <label class=\"field-label\">Type de question <span class=\"req\">*</span></label>
                {{ form_widget(form.typeQuestion, {'attr': {'id': 'question_type'}}) }}
                {{ form_errors(form.typeQuestion) }}
                <div class=\"help-box\" id=\"helpBox\">
                    <svg width=\"15\" height=\"15\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\"><circle cx=\"12\" cy=\"12\" r=\"9\"/><line x1=\"12\" y1=\"8\" x2=\"12\" y2=\"12\"/><line x1=\"12\" y1=\"16\" x2=\"12.01\" y2=\"16\"/></svg>
                    <span id=\"helpText\"></span>
                </div>
            </div>

            <div class=\"field-group\" id=\"qcmOptionsGroup\" style=\"display:none;\">
                <label class=\"field-label\">Réponses possibles <span class=\"req\">*</span></label>
                {{ form_widget(form.reponsesPossibles, {'attr': {'rows': 3, 'id': 'question_reponses', 'placeholder': 'Séparez les options par | — ex : Jamais|Parfois|Souvent|Toujours'}}) }}
                {{ form_errors(form.reponsesPossibles) }}
                <span class=\"field-hint\">Séparez chaque option par le symbole <strong>|</strong></span>
            </div>

            <div class=\"section-divider\"><span>Paramètres</span></div>

            <div class=\"field-row\">
                <div class=\"field-group\">
                    <label class=\"field-label\">Points</label>
                    {{ form_widget(form.points) }}
                    {{ form_errors(form.points) }}
                </div>
                <div class=\"field-group\">
                    <label class=\"field-label\">Ordre d'affichage</label>
                    {{ form_widget(form.ordre, {'attr': {'placeholder': 'Auto'}}) }}
                    <span class=\"field-hint\">Laisser vide = ajouté en dernier</span>
                    {{ form_errors(form.ordre) }}
                </div>
            </div>

            <div class=\"field-row\">
                <div class=\"field-group\">
                    <label class=\"field-label\">Statut</label>
                    {{ form_widget(form.status) }}
                    {{ form_errors(form.status) }}
                </div>
                <div class=\"field-group\" style=\"display:flex;align-items:flex-end;padding-bottom:2px;\">
                    <div class=\"checkbox-wrap\">
                        {{ form_widget(form.obligatoire) }}
                        {{ form_label(form.obligatoire) }}
                    </div>
                </div>
            </div>

        </div>

        <div class=\"form-footer\">
            <button type=\"submit\" class=\"btn-submit\">
                <svg width=\"14\" height=\"14\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2.5\" viewBox=\"0 0 24 24\"><path d=\"M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z\"/><polyline points=\"17 21 17 13 7 13 7 21\"/><polyline points=\"7 3 7 8 15 8\"/></svg>
                Enregistrer les modifications
            </button>
            <a href=\"{{ path('app_question_show', {'id': question.id}) }}\" class=\"btn-cancel\">
                <svg width=\"13\" height=\"13\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2.5\" viewBox=\"0 0 24 24\"><line x1=\"18\" y1=\"6\" x2=\"6\" y2=\"18\"/><line x1=\"6\" y1=\"6\" x2=\"18\" y2=\"18\"/></svg>
                Annuler
            </a>
        </div>
        {{ form_end(form) }}
    </div>
</div>

<script>
(function() {
    function initQcm() {
        var form = document.getElementById('questionForm');
        if (!form) { setTimeout(initQcm, 50); return; }

        var typeSelect = form.querySelector('select[id=\"question_type\"]')
                      || form.querySelector('select[id\$=\"typeQuestion\"]')
                      || form.querySelector('select[id\$=\"type_question\"]')
                      || form.querySelector('select[name*=\"typeQuestion\"]')
                      || form.querySelector('select[name*=\"type_question\"]');

        var qcmGroup      = document.getElementById('qcmOptionsGroup');
        var reponsesField = form.querySelector('textarea[id\$=\"reponsesPossibles\"]')
                         || form.querySelector('textarea[id\$=\"reponses_possibles\"]')
                         || form.querySelector('textarea[name*=\"reponsesPossibles\"]');

        if (!typeSelect || !qcmGroup) { setTimeout(initQcm, 50); return; }

        console.log('[QCM] OK - select id=' + typeSelect.id + ' valeur=' + typeSelect.value);

        var helps = {
            'qcm_unique':   { text: \"Sélectionnez une seule réponse parmi les options ci-dessous.\", qcm: true },
            'qcm_multiple': { text: \"Plusieurs réponses possibles parmi les options ci-dessous.\", qcm: true },
            'texte_libre':  { text: \"Réponse libre, aucune option à configurer.\", qcm: false },
            'numerique':    { text: \"Valeur numérique, aucune option à configurer.\", qcm: false }
        };

        function update() {
            var v   = typeSelect.value;
            var cfg = helps[v];
            var helpBox  = document.getElementById('helpBox');
            var helpText = document.getElementById('helpText');
            if (cfg) {
                if (helpText) helpText.textContent = cfg.text;
                if (helpBox)  helpBox.classList.add('visible');
                if (cfg.qcm) {
                    qcmGroup.style.display = 'block';
                    if (reponsesField) reponsesField.setAttribute('required', 'required');
                } else {
                    qcmGroup.style.display = 'none';
                    if (reponsesField) reponsesField.removeAttribute('required');
                }
            } else {
                if (helpBox) helpBox.classList.remove('visible');
                qcmGroup.style.display = 'none';
            }
        }

        typeSelect.addEventListener('change', update);
        update();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', initQcm);
    } else {
        initQcm();
    }
    window.addEventListener('load', initQcm);
})();
</script>
{% endblock %}
", "back/question/edit.html.twig", "C:\\Users\\sirine\\psy\\templates\\back\\question\\edit.html.twig");
    }
}
