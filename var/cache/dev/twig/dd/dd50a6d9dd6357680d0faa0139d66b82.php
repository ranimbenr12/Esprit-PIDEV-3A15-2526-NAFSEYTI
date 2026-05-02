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

/* back/question/new.html.twig */
class __TwigTemplate_2958acce76c8f9b6e47ebf648010cd0c extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/question/new.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/question/new.html.twig"));

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

        yield "Nouvelle question — Nafseyti";
        
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
        <span>Nouvelle question</span>
    </div>
    <div class=\"nt-header\">
        <div class=\"nt-eyebrow\">Création</div>
        <h1 class=\"nt-title\">Nouvelle <em>question</em></h1>
    </div>

    <div class=\"form-card\">
        <div class=\"form-card-head\">
            <div class=\"icon\">
                <svg width=\"16\" height=\"16\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\"><circle cx=\"12\" cy=\"12\" r=\"9\"/><path d=\"M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3\"/><line x1=\"12\" y1=\"17\" x2=\"12.01\" y2=\"17\"/></svg>
            </div>
            <h3>Contenu de la question</h3>
        </div>

        ";
        // line 28
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 28, $this->source); })()), 'form_start', ["attr" => ["id" => "questionForm", "novalidate" => "novalidate"]]);
        yield "
        <div class=\"form-body\">

            <div class=\"field-group\">
                <label class=\"field-label\">Test associé <span class=\"req\">*</span></label>
                ";
        // line 33
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 33, $this->source); })()), "test", [], "any", false, false, false, 33), 'widget');
        yield "
                ";
        // line 34
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 34, $this->source); })()), "test", [], "any", false, false, false, 34), 'errors');
        yield "
            </div>

            <div class=\"field-group\">
                <label class=\"field-label\">Texte de la question <span class=\"req\">*</span></label>
                ";
        // line 39
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 39, $this->source); })()), "texte", [], "any", false, false, false, 39), 'widget', ["attr" => ["rows" => 3, "placeholder" => "Ex : Comment gérez-vous le stress au travail ?"]]);
        yield "
                ";
        // line 40
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 40, $this->source); })()), "texte", [], "any", false, false, false, 40), 'errors');
        yield "
            </div>

            <div class=\"field-group\">
                <label class=\"field-label\">Type de question <span class=\"req\">*</span></label>
                ";
        // line 45
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 45, $this->source); })()), "typeQuestion", [], "any", false, false, false, 45), 'widget', ["attr" => ["id" => "question_type"]]);
        yield "
                ";
        // line 46
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 46, $this->source); })()), "typeQuestion", [], "any", false, false, false, 46), 'errors');
        yield "
                <div class=\"help-box\" id=\"helpBox\">
                    <svg width=\"15\" height=\"15\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2\" viewBox=\"0 0 24 24\"><circle cx=\"12\" cy=\"12\" r=\"9\"/><line x1=\"12\" y1=\"8\" x2=\"12\" y2=\"12\"/><line x1=\"12\" y1=\"16\" x2=\"12.01\" y2=\"16\"/></svg>
                    <span id=\"helpText\"></span>
                </div>
            </div>

            <div class=\"field-group\" id=\"qcmOptionsGroup\" style=\"display:none;\">
                <label class=\"field-label\">Réponses possibles <span class=\"req\">*</span></label>
                ";
        // line 55
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 55, $this->source); })()), "reponsesPossibles", [], "any", false, false, false, 55), 'widget', ["attr" => ["rows" => 3, "id" => "question_reponses", "placeholder" => "Séparez les options par | — ex : Jamais|Parfois|Souvent|Toujours"]]);
        yield "
                ";
        // line 56
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 56, $this->source); })()), "reponsesPossibles", [], "any", false, false, false, 56), 'errors');
        yield "
                <span class=\"field-hint\">Séparez chaque option par le symbole <strong>|</strong></span>
            </div>

            <div class=\"section-divider\"><span>Paramètres</span></div>

            <div class=\"field-row\">
                <div class=\"field-group\">
                    <label class=\"field-label\">Points</label>
                    ";
        // line 65
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 65, $this->source); })()), "points", [], "any", false, false, false, 65), 'widget');
        yield "
                    ";
        // line 66
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 66, $this->source); })()), "points", [], "any", false, false, false, 66), 'errors');
        yield "
                </div>
                <div class=\"field-group\">
                    <label class=\"field-label\">Ordre d'affichage</label>
                    ";
        // line 70
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 70, $this->source); })()), "ordre", [], "any", false, false, false, 70), 'widget', ["attr" => ["placeholder" => "Auto"]]);
        yield "
                    <span class=\"field-hint\">Laisser vide = ajouté en dernier</span>
                    ";
        // line 72
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 72, $this->source); })()), "ordre", [], "any", false, false, false, 72), 'errors');
        yield "
                </div>
            </div>

            <div class=\"field-row\">
                <div class=\"field-group\">
                    <label class=\"field-label\">Statut</label>
                    ";
        // line 79
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 79, $this->source); })()), "status", [], "any", false, false, false, 79), 'widget');
        yield "
                    ";
        // line 80
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 80, $this->source); })()), "status", [], "any", false, false, false, 80), 'errors');
        yield "
                </div>
                <div class=\"field-group\" style=\"display:flex;align-items:flex-end;padding-bottom:2px;\">
                    <div class=\"checkbox-wrap\">
                        ";
        // line 84
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 84, $this->source); })()), "obligatoire", [], "any", false, false, false, 84), 'widget');
        yield "
                        ";
        // line 85
        yield $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(CoreExtension::getAttribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 85, $this->source); })()), "obligatoire", [], "any", false, false, false, 85), 'label');
        yield "
                    </div>
                </div>
            </div>

        </div>

        <div class=\"form-footer\">
            <button type=\"submit\" class=\"btn-submit\">
                <svg width=\"14\" height=\"14\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2.5\" viewBox=\"0 0 24 24\"><path d=\"M19 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11l5 5v11a2 2 0 0 1-2 2z\"/><polyline points=\"17 21 17 13 7 13 7 21\"/><polyline points=\"7 3 7 8 15 8\"/></svg>
                Créer la question
            </button>
            <a href=\"";
        // line 97
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_question_index");
        yield "\" class=\"btn-cancel\">
                <svg width=\"13\" height=\"13\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2.5\" viewBox=\"0 0 24 24\"><line x1=\"18\" y1=\"6\" x2=\"6\" y2=\"18\"/><line x1=\"6\" y1=\"6\" x2=\"18\" y2=\"18\"/></svg>
                Annuler
            </a>
        </div>
        ";
        // line 102
        yield         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 102, $this->source); })()), 'form_end');
        yield "
    </div>
</div>

<script>
(function() {
    function initQcm() {
        var form = document.getElementById('questionForm');
        if (!form) { setTimeout(initQcm, 50); return; }

        // Chercher le select de type dans le formulaire — tous les ids possibles
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
        return "back/question/new.html.twig";
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
        return array (  278 => 102,  270 => 97,  255 => 85,  251 => 84,  244 => 80,  240 => 79,  230 => 72,  225 => 70,  218 => 66,  214 => 65,  202 => 56,  198 => 55,  186 => 46,  182 => 45,  174 => 40,  170 => 39,  162 => 34,  158 => 33,  150 => 28,  130 => 11,  124 => 7,  111 => 6,  88 => 4,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'back/admin_base.html.twig' %}

{% block title %}Nouvelle question — Nafseyti{% endblock %}
{% block question_active %}active{% endblock %}

{% block admin_content %}


<div class=\"nt\">
    <div class=\"nt-breadcrumb\">
        <a href=\"{{ path('app_question_index') }}\">Questions</a>
        <span>/</span>
        <span>Nouvelle question</span>
    </div>
    <div class=\"nt-header\">
        <div class=\"nt-eyebrow\">Création</div>
        <h1 class=\"nt-title\">Nouvelle <em>question</em></h1>
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
                Créer la question
            </button>
            <a href=\"{{ path('app_question_index') }}\" class=\"btn-cancel\">
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

        // Chercher le select de type dans le formulaire — tous les ids possibles
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
", "back/question/new.html.twig", "C:\\Users\\sirine\\psy\\templates\\back\\question\\new.html.twig");
    }
}
