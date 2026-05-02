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

/* Psychologue/evente/edit.html.twig */
class __TwigTemplate_896c09ca14ac79cfafbfaaf91322f517 extends Template
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
            'navbar' => [$this, 'block_navbar'],
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 2
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Psychologue/evente/edit.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Psychologue/evente/edit.html.twig"));

        $this->parent = $this->load("base.html.twig", 2);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 4
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

        yield "Modifier l'atelier - NAFSEYTI";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 6
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_navbar(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "navbar"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "navbar"));

        // line 7
        yield "<div class=\"navbar-wrap\">
    <div class=\"navbar-inner\">
        <ul class=\"nav-links\">
            <li><a href=\"";
        // line 10
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("psycho_dashboard");
        yield "\">Accueil</a></li>
            <li><a href=\"#\">Contenu Psychologique</a></li>
            <li><a href=\"#\">Tests</a></li>
            <li><a href=\"#\">Rendez-vous</a></li>
            <li><a href=\"";
        // line 14
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("psycho_events_index");
        yield "\" class=\"active\">Evenements</a></li>
            <li><a href=\"#\">Suivi Personnel</a></li>
        </ul>
        <a href=\"#!\" class=\"nav-cta nav-links a\">Se connecter</a>
    </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 22
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

        // line 23
        yield "
<style>
    :root {
        --primary-green: #285921;
        --primary-green-light: #3d7e33;
        --secondary-beige: #c9b99b;
    }

    .edit-container {
        max-width: 800px;
        margin: 2rem auto;
        background: #F5F1E6;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .form-label-custom { font-weight: bold; color: #5c715a; min-width: 120px; }

    .form-control-custom {
        padding: 10px; border-radius: 5px;
        border: 1px solid #d2e0cf;
        transition: all 0.3s ease; width: 100%;
        background: white;
    }
    .form-control-custom:focus { border-color: var(--primary-green); outline: none; box-shadow: 0 0 0 3px rgba(40,89,33,0.1); }
    .form-control-custom.ef-valid   { border: 2px solid green; }
    .form-control-custom.ef-invalid { border: 2px solid red; }
    .form-control-custom.ef-warning { border: 2px solid orange; }

    .btn-save {
        background: #4CAF50; color: white; font-weight: bold;
        padding: 12px 30px; border-radius: 8px; font-size: 14px;
        border: none; cursor: pointer; transition: all 0.3s ease;
    }
    .btn-save:hover { background: #45a049; transform: translateY(-2px); box-shadow: 0 4px 12px rgba(76,175,80,0.4); }

    .btn-cancel-link {
        background: #b22222; color: white; font-weight: bold;
        padding: 12px 30px; border-radius: 8px; font-size: 14px;
        border: none; cursor: pointer; text-decoration: none;
        display: inline-block; transition: all 0.3s ease;
    }
    .btn-cancel-link:hover { background: #8b0000; transform: translateY(-2px); color: white; }

    .plan-section { background: #fcfaf7; padding: 15px; border-radius: 10px; border: 1px solid #d2e0cf; }

    .upload-area {
        border: 2px dashed #c4d4c1; border-radius: 10px; padding: 20px;
        text-align: center; cursor: pointer; transition: all 0.3s ease;
        background: #f0f5f0; min-height: 120px;
        display: flex; flex-direction: column; align-items: center; justify-content: center;
    }
    .upload-area:hover { border-color: var(--primary-green); background: #e8f0e8; }

    hr { background: linear-gradient(90deg, transparent, #5c715a, transparent); height: 1px; border: none; margin: 20px 0; }
</style>

<div class=\"edit-container\">
    <div class=\"text-center mb-4\">
        <h2 style=\"font-size: 24px; font-weight: bold; color: #5c715a;\">✏️ Modifier l'atelier</h2>
        <hr>
    </div>

    ";
        // line 88
        yield "    ";
        $context["plan"] = null;
        // line 89
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["event"]) || array_key_exists("event", $context) ? $context["event"] : (function () { throw new RuntimeError('Variable "event" does not exist.', 89, $this->source); })()), "planifications", [], "any", false, false, false, 89));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 90
            yield "        ";
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, false, 90)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                $context["plan"] = $context["p"];
            }
            // line 91
            yield "    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['p'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 92
        yield "
    ";
        // line 94
        yield "    <div class=\"row mb-3 align-items-center\">
        <div class=\"col-md-3\"><label class=\"form-label-custom\">Titre de l'atelier *</label></div>
        <div class=\"col-md-9\">
            <input type=\"text\" id=\"ef-title\" class=\"form-control-custom\"
                   placeholder=\"Ex: Atelier sur l'égoïsme\"
                   value=\"";
        // line 99
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["event"]) || array_key_exists("event", $context) ? $context["event"] : (function () { throw new RuntimeError('Variable "event" does not exist.', 99, $this->source); })()), "title", [], "any", false, false, false, 99), "html", null, true);
        yield "\">
        </div>
    </div>

    ";
        // line 104
        yield "    <div class=\"row mb-3 align-items-center\">
        <div class=\"col-md-3\"><label class=\"form-label-custom\">Lieu *</label></div>
        <div class=\"col-md-9\">
            <input type=\"text\" id=\"ef-location\" class=\"form-control-custom\"
                   placeholder=\"Ex: Salle de méditation, Paris\"
                   value=\"";
        // line 109
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["event"]) || array_key_exists("event", $context) ? $context["event"] : (function () { throw new RuntimeError('Variable "event" does not exist.', 109, $this->source); })()), "location", [], "any", false, false, false, 109), "html", null, true);
        yield "\">
        </div>
    </div>

    ";
        // line 114
        yield "    <div class=\"row mb-3 align-items-center\">
        <div class=\"col-md-3\"><label class=\"form-label-custom\">Date *</label></div>
        <div class=\"col-md-3\">
            <input type=\"date\" id=\"ef-date\" class=\"form-control-custom\"
                   value=\"";
        // line 118
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["event"]) || array_key_exists("event", $context) ? $context["event"] : (function () { throw new RuntimeError('Variable "event" does not exist.', 118, $this->source); })()), "event_date", [], "any", false, false, false, 118)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["event"]) || array_key_exists("event", $context) ? $context["event"] : (function () { throw new RuntimeError('Variable "event" does not exist.', 118, $this->source); })()), "event_date", [], "any", false, false, false, 118), "Y-m-d"), "html", null, true)) : (""));
        yield "\">
        </div>
        <div class=\"col-md-3\"><label class=\"form-label-custom\">Participants max *</label></div>
        <div class=\"col-md-3\">
            <input type=\"number\" id=\"ef-maxPart\" class=\"form-control-custom\"
                   placeholder=\"Ex: 20\" value=\"";
        // line 123
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["event"]) || array_key_exists("event", $context) ? $context["event"] : (function () { throw new RuntimeError('Variable "event" does not exist.', 123, $this->source); })()), "max_participants", [], "any", false, false, false, 123), "html", null, true);
        yield "\">
        </div>
    </div>

    ";
        // line 128
        yield "    <div class=\"row mb-3 align-items-center\">
        <div class=\"col-md-3\"><label class=\"form-label-custom\">Image URL</label></div>
        <div class=\"col-md-9\">
            <input type=\"text\" id=\"ef-link\" class=\"form-control-custom\"
                   placeholder=\"URL de l'image\" value=\"";
        // line 132
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["event"]) || array_key_exists("event", $context) ? $context["event"] : (function () { throw new RuntimeError('Variable "event" does not exist.', 132, $this->source); })()), "link", [], "any", false, false, false, 132), "html", null, true);
        yield "\">
        </div>
    </div>

    ";
        // line 137
        yield "    <div class=\"row mb-3\">
        <div class=\"col-md-3\"></div>
        <div class=\"col-md-9\">
            <div class=\"upload-area\" onclick=\"document.getElementById('ef-fileInput').click()\">
                <div style=\"font-size:15px;color:#7f9a7d;font-weight:bold;\">☁️ Cliquez pour changer l'image</div>
                <div style=\"font-size:12px;color:#8a9a87;\">(PNG, JPG, JPEG, GIF)</div>
                <img id=\"ef-imagePreview\" alt=\"Aperçu\"
                     src=\"";
        // line 144
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["event"]) || array_key_exists("event", $context) ? $context["event"] : (function () { throw new RuntimeError('Variable "event" does not exist.', 144, $this->source); })()), "link", [], "any", false, false, false, 144), "html", null, true);
        yield "\"
                     style=\"max-height:100px;max-width:220px;margin-top:8px;border-radius:8px;";
        // line 145
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["event"]) || array_key_exists("event", $context) ? $context["event"] : (function () { throw new RuntimeError('Variable "event" does not exist.', 145, $this->source); })()), "link", [], "any", false, false, false, 145)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("") : ("display:none;"));
        yield "\"
                     onerror=\"this.style.display='none'\">
            </div>
            <input type=\"file\" id=\"ef-fileInput\" accept=\"image/png,image/jpeg,image/jpg,image/gif\" style=\"display:none;\">
        </div>
    </div>

    ";
        // line 153
        yield "    <div class=\"plan-section mb-4\">
        <label style=\"font-size:15px;font-weight:bold;color:#5c715a;\" class=\"mb-3 d-block\">📋 Planification de l'atelier</label>

        <div class=\"row mb-3 align-items-center\">
            <div class=\"col-md-3\"><label class=\"form-label-custom\">Description</label></div>
            <div class=\"col-md-9\">
                <input type=\"text\" id=\"ef-planDesc\" class=\"form-control-custom\"
                       placeholder=\"Ex: Séance de méditation guidée\"
                       value=\"";
        // line 161
        yield (((($tmp = (isset($context["plan"]) || array_key_exists("plan", $context) ? $context["plan"] : (function () { throw new RuntimeError('Variable "plan" does not exist.', 161, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["plan"]) || array_key_exists("plan", $context) ? $context["plan"] : (function () { throw new RuntimeError('Variable "plan" does not exist.', 161, $this->source); })()), "description", [], "any", false, false, false, 161), "html", null, true)) : (""));
        yield "\">
            </div>
        </div>

        <div class=\"row align-items-center\">
            <div class=\"col-md-3\"><label class=\"form-label-custom\">Durée</label></div>
            <div class=\"col-md-9\">
                <input type=\"text\" id=\"ef-planDuree\" class=\"form-control-custom\"
                       placeholder=\"Ex: 2 heures\"
                       value=\"";
        // line 170
        yield (((($tmp = (isset($context["plan"]) || array_key_exists("plan", $context) ? $context["plan"] : (function () { throw new RuntimeError('Variable "plan" does not exist.', 170, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["plan"]) || array_key_exists("plan", $context) ? $context["plan"] : (function () { throw new RuntimeError('Variable "plan" does not exist.', 170, $this->source); })()), "duree", [], "any", false, false, false, 170), "html", null, true)) : (""));
        yield "\">
            </div>
        </div>
    </div>

    ";
        // line 176
        yield "    <div id=\"ef-errorBox\" class=\"alert alert-danger\" style=\"display:none;border-radius:10px;\"></div>

    ";
        // line 179
        yield "    <div class=\"d-flex gap-3 justify-content-center mt-4\">
        <button type=\"button\" id=\"ef-btnSave\" class=\"btn-save\">💾 Mettre à jour</button>
        <a href=\"";
        // line 181
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("psycho_events_index");
        yield "\" class=\"btn-cancel-link\">✖ Annuler</a>
    </div>

    <div class=\"text-center mt-4\">
        <p class=\"small text-muted fst-italic\">
            💡 Les champs marqués * sont obligatoires. La planification est optionnelle — laissez les deux champs vides pour la supprimer.
        </p>
    </div>
</div>

";
        // line 192
        yield "<script>
    const EF_EVENT_ID  = ";
        // line 193
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["event"]) || array_key_exists("event", $context) ? $context["event"] : (function () { throw new RuntimeError('Variable "event" does not exist.', 193, $this->source); })()), "id", [], "any", false, false, false, 193), "html", null, true);
        yield ";
    const EF_PLAN_ID   = ";
        // line 194
        yield (((($tmp = (isset($context["plan"]) || array_key_exists("plan", $context) ? $context["plan"] : (function () { throw new RuntimeError('Variable "plan" does not exist.', 194, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["plan"]) || array_key_exists("plan", $context) ? $context["plan"] : (function () { throw new RuntimeError('Variable "plan" does not exist.', 194, $this->source); })()), "id_planification", [], "any", false, false, false, 194), "html", null, true)) : ("null"));
        yield ";
</script>

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 199
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

        // line 200
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js\"></script>
<script>
    // ── Validation helpers ──────────────────────────────────────────────────

    function efSetState(id, state) {
        const el = document.getElementById(id);
        el.classList.remove('ef-valid', 'ef-invalid', 'ef-warning');
        if (state) el.classList.add('ef-' + state);
    }

    function efValidateTitle() {
        const v = document.getElementById('ef-title').value.trim();
        if (!v)           { efSetState('ef-title', 'invalid'); return false; }
        if (v.length < 3) { efSetState('ef-title', 'warning'); return false; }
        efSetState('ef-title', 'valid'); return true;
    }

    function efValidateLocation() {
        const v = document.getElementById('ef-location').value.trim();
        if (!v || v.length < 3) { efSetState('ef-location', v ? 'warning' : 'invalid'); return false; }
        efSetState('ef-location', 'valid'); return true;
    }

    function efValidateDate() {
        const v = document.getElementById('ef-date').value;
        efSetState('ef-date', v ? 'valid' : 'invalid');
        return !!v;
    }

    function efValidateMax() {
        const v = parseInt(document.getElementById('ef-maxPart').value);
        const ok = !isNaN(v) && v > 0;
        efSetState('ef-maxPart', ok ? 'valid' : 'invalid');
        return ok;
    }

    function efValidatePlan() {
        const desc  = document.getElementById('ef-planDesc').value.trim();
        const duree = document.getElementById('ef-planDuree').value.trim();
        // Both empty = valid (will delete existing plan)
        if (!desc && !duree) {
            efSetState('ef-planDesc',  null);
            efSetState('ef-planDuree', null);
            return true;
        }
        // One filled, one empty = invalid
        if (desc && !duree)  { efSetState('ef-planDuree', 'invalid'); efSetState('ef-planDesc', 'valid'); return false; }
        if (!desc && duree)  { efSetState('ef-planDesc', 'invalid');  efSetState('ef-planDuree', 'valid'); return false; }
        // Both filled
        if (desc.length < 4) { efSetState('ef-planDesc', 'warning'); return false; }
        efSetState('ef-planDesc',  'valid');
        efSetState('ef-planDuree', 'valid');
        return true;
    }

    function efValidateAll() {
        let ok = true;
        if (!efValidateTitle())    ok = false;
        if (!efValidateLocation()) ok = false;
        if (!efValidateDate())     ok = false;
        if (!efValidateMax())      ok = false;
        if (!efValidatePlan())     ok = false;
        return ok;
    }

    // Live validation listeners
    document.getElementById('ef-title').addEventListener('input', efValidateTitle);
    document.getElementById('ef-location').addEventListener('input', efValidateLocation);
    document.getElementById('ef-date').addEventListener('change', efValidateDate);
    document.getElementById('ef-maxPart').addEventListener('input', efValidateMax);
    document.getElementById('ef-planDesc').addEventListener('input', efValidatePlan);
    document.getElementById('ef-planDuree').addEventListener('input', efValidatePlan);

    // Image file preview
    document.getElementById('ef-fileInput').addEventListener('change', function() {
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = e => {
                const img = document.getElementById('ef-imagePreview');
                img.src = e.target.result;
                img.style.display = 'block';
                document.getElementById('ef-link').value = '';
            };
            reader.readAsDataURL(this.files[0]);
        }
    });

    // ── Save ───────────────────────────────────────────────────────────────

    document.getElementById('ef-btnSave').addEventListener('click', async () => {
        const errorBox = document.getElementById('ef-errorBox');
        errorBox.style.display = 'none';

        if (!efValidateAll()) {
            errorBox.textContent = 'Veuillez corriger les champs en erreur.';
            errorBox.style.display = 'block';
            return;
        }

        const btn = document.getElementById('ef-btnSave');
        btn.disabled = true;
        btn.textContent = '⏳ Mise à jour...';

        const title    = document.getElementById('ef-title').value.trim();
        const location = document.getElementById('ef-location').value.trim();
        const date     = document.getElementById('ef-date').value;
        const maxPart  = parseInt(document.getElementById('ef-maxPart').value);
        const link     = document.getElementById('ef-link').value.trim();
        const planDesc = document.getElementById('ef-planDesc').value.trim();
        const planDuree= document.getElementById('ef-planDuree').value.trim();

        try {
            // 1. Update event
            const evRes = await fetch(`/psycho/evente/api/events/\${EF_EVENT_ID}`, {
                method: 'PUT',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    title, location,
                    event_date:       date,
                    link,
                    max_participants: maxPart
                })
            });
            const evResult = await evRes.json();
            if (!evResult.success) {
                showEfNotification('Erreur lors de la mise à jour de l\\'événement', 'error');
                return;
            }

            // 2. Handle planification
            if (!planDesc && !planDuree) {
                // Delete existing plan if any
                if (EF_PLAN_ID) {
                    await fetch(`/psycho/evente/api/planifications/\${EF_PLAN_ID}`, { method: 'DELETE' });
                }
            } else if (planDesc && planDuree) {
                if (EF_PLAN_ID) {
                    // Update existing
                    await fetch(`/psycho/evente/api/planifications/\${EF_PLAN_ID}`, {
                        method: 'PUT',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ description: planDesc, duree: planDuree })
                    });
                } else {
                    // Create new
                    await fetch('/psycho/evente/api/planifications', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ idEvent: EF_EVENT_ID, description: planDesc, duree: planDuree })
                    });
                }
            }

            showEfNotification('✅ Événement mis à jour avec succès !', 'success');
            setTimeout(() => { window.location.href = '/psycho/evente'; }, 1200);

        } catch (e) {
            showEfNotification('Erreur réseau', 'error');
        } finally {
            btn.disabled = false;
            btn.textContent = '💾 Mettre à jour';
        }
    });

    function showEfNotification(message, type) {
        const toast = document.createElement('div');
        toast.textContent = message;
        toast.style.cssText = `position:fixed;bottom:20px;right:20px;background:\${type === 'success' ? '#4CAF50' : '#f44336'};color:white;padding:12px 24px;border-radius:25px;z-index:10000;font-weight:bold;`;
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
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
        return "Psychologue/evente/edit.html.twig";
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
        return array (  425 => 200,  412 => 199,  397 => 194,  393 => 193,  390 => 192,  377 => 181,  373 => 179,  369 => 176,  361 => 170,  349 => 161,  339 => 153,  329 => 145,  325 => 144,  316 => 137,  309 => 132,  303 => 128,  296 => 123,  288 => 118,  282 => 114,  275 => 109,  268 => 104,  261 => 99,  254 => 94,  251 => 92,  237 => 91,  232 => 90,  214 => 89,  211 => 88,  145 => 23,  132 => 22,  114 => 14,  107 => 10,  102 => 7,  89 => 6,  66 => 4,  43 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# templates/Psychologue/evente/edit.html.twig #}
{% extends 'base.html.twig' %}

{% block title %}Modifier l'atelier - NAFSEYTI{% endblock %}

{% block navbar %}
<div class=\"navbar-wrap\">
    <div class=\"navbar-inner\">
        <ul class=\"nav-links\">
            <li><a href=\"{{ path('psycho_dashboard') }}\">Accueil</a></li>
            <li><a href=\"#\">Contenu Psychologique</a></li>
            <li><a href=\"#\">Tests</a></li>
            <li><a href=\"#\">Rendez-vous</a></li>
            <li><a href=\"{{ path('psycho_events_index') }}\" class=\"active\">Evenements</a></li>
            <li><a href=\"#\">Suivi Personnel</a></li>
        </ul>
        <a href=\"#!\" class=\"nav-cta nav-links a\">Se connecter</a>
    </div>
</div>
{% endblock %}

{% block body %}

<style>
    :root {
        --primary-green: #285921;
        --primary-green-light: #3d7e33;
        --secondary-beige: #c9b99b;
    }

    .edit-container {
        max-width: 800px;
        margin: 2rem auto;
        background: #F5F1E6;
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }

    .form-label-custom { font-weight: bold; color: #5c715a; min-width: 120px; }

    .form-control-custom {
        padding: 10px; border-radius: 5px;
        border: 1px solid #d2e0cf;
        transition: all 0.3s ease; width: 100%;
        background: white;
    }
    .form-control-custom:focus { border-color: var(--primary-green); outline: none; box-shadow: 0 0 0 3px rgba(40,89,33,0.1); }
    .form-control-custom.ef-valid   { border: 2px solid green; }
    .form-control-custom.ef-invalid { border: 2px solid red; }
    .form-control-custom.ef-warning { border: 2px solid orange; }

    .btn-save {
        background: #4CAF50; color: white; font-weight: bold;
        padding: 12px 30px; border-radius: 8px; font-size: 14px;
        border: none; cursor: pointer; transition: all 0.3s ease;
    }
    .btn-save:hover { background: #45a049; transform: translateY(-2px); box-shadow: 0 4px 12px rgba(76,175,80,0.4); }

    .btn-cancel-link {
        background: #b22222; color: white; font-weight: bold;
        padding: 12px 30px; border-radius: 8px; font-size: 14px;
        border: none; cursor: pointer; text-decoration: none;
        display: inline-block; transition: all 0.3s ease;
    }
    .btn-cancel-link:hover { background: #8b0000; transform: translateY(-2px); color: white; }

    .plan-section { background: #fcfaf7; padding: 15px; border-radius: 10px; border: 1px solid #d2e0cf; }

    .upload-area {
        border: 2px dashed #c4d4c1; border-radius: 10px; padding: 20px;
        text-align: center; cursor: pointer; transition: all 0.3s ease;
        background: #f0f5f0; min-height: 120px;
        display: flex; flex-direction: column; align-items: center; justify-content: center;
    }
    .upload-area:hover { border-color: var(--primary-green); background: #e8f0e8; }

    hr { background: linear-gradient(90deg, transparent, #5c715a, transparent); height: 1px; border: none; margin: 20px 0; }
</style>

<div class=\"edit-container\">
    <div class=\"text-center mb-4\">
        <h2 style=\"font-size: 24px; font-weight: bold; color: #5c715a;\">✏️ Modifier l'atelier</h2>
        <hr>
    </div>

    {# Pass existing planification id if any #}
    {% set plan = null %}
    {% for p in event.planifications %}
        {% if loop.first %}{% set plan = p %}{% endif %}
    {% endfor %}

    {# Title #}
    <div class=\"row mb-3 align-items-center\">
        <div class=\"col-md-3\"><label class=\"form-label-custom\">Titre de l'atelier *</label></div>
        <div class=\"col-md-9\">
            <input type=\"text\" id=\"ef-title\" class=\"form-control-custom\"
                   placeholder=\"Ex: Atelier sur l'égoïsme\"
                   value=\"{{ event.title }}\">
        </div>
    </div>

    {# Location #}
    <div class=\"row mb-3 align-items-center\">
        <div class=\"col-md-3\"><label class=\"form-label-custom\">Lieu *</label></div>
        <div class=\"col-md-9\">
            <input type=\"text\" id=\"ef-location\" class=\"form-control-custom\"
                   placeholder=\"Ex: Salle de méditation, Paris\"
                   value=\"{{ event.location }}\">
        </div>
    </div>

    {# Date + Max participants #}
    <div class=\"row mb-3 align-items-center\">
        <div class=\"col-md-3\"><label class=\"form-label-custom\">Date *</label></div>
        <div class=\"col-md-3\">
            <input type=\"date\" id=\"ef-date\" class=\"form-control-custom\"
                   value=\"{{ event.event_date ? event.event_date|date('Y-m-d') : '' }}\">
        </div>
        <div class=\"col-md-3\"><label class=\"form-label-custom\">Participants max *</label></div>
        <div class=\"col-md-3\">
            <input type=\"number\" id=\"ef-maxPart\" class=\"form-control-custom\"
                   placeholder=\"Ex: 20\" value=\"{{ event.max_participants }}\">
        </div>
    </div>

    {# Image URL #}
    <div class=\"row mb-3 align-items-center\">
        <div class=\"col-md-3\"><label class=\"form-label-custom\">Image URL</label></div>
        <div class=\"col-md-9\">
            <input type=\"text\" id=\"ef-link\" class=\"form-control-custom\"
                   placeholder=\"URL de l'image\" value=\"{{ event.link }}\">
        </div>
    </div>

    {# Image preview #}
    <div class=\"row mb-3\">
        <div class=\"col-md-3\"></div>
        <div class=\"col-md-9\">
            <div class=\"upload-area\" onclick=\"document.getElementById('ef-fileInput').click()\">
                <div style=\"font-size:15px;color:#7f9a7d;font-weight:bold;\">☁️ Cliquez pour changer l'image</div>
                <div style=\"font-size:12px;color:#8a9a87;\">(PNG, JPG, JPEG, GIF)</div>
                <img id=\"ef-imagePreview\" alt=\"Aperçu\"
                     src=\"{{ event.link }}\"
                     style=\"max-height:100px;max-width:220px;margin-top:8px;border-radius:8px;{{ event.link ? '' : 'display:none;' }}\"
                     onerror=\"this.style.display='none'\">
            </div>
            <input type=\"file\" id=\"ef-fileInput\" accept=\"image/png,image/jpeg,image/jpg,image/gif\" style=\"display:none;\">
        </div>
    </div>

    {# Planification section #}
    <div class=\"plan-section mb-4\">
        <label style=\"font-size:15px;font-weight:bold;color:#5c715a;\" class=\"mb-3 d-block\">📋 Planification de l'atelier</label>

        <div class=\"row mb-3 align-items-center\">
            <div class=\"col-md-3\"><label class=\"form-label-custom\">Description</label></div>
            <div class=\"col-md-9\">
                <input type=\"text\" id=\"ef-planDesc\" class=\"form-control-custom\"
                       placeholder=\"Ex: Séance de méditation guidée\"
                       value=\"{{ plan ? plan.description : '' }}\">
            </div>
        </div>

        <div class=\"row align-items-center\">
            <div class=\"col-md-3\"><label class=\"form-label-custom\">Durée</label></div>
            <div class=\"col-md-9\">
                <input type=\"text\" id=\"ef-planDuree\" class=\"form-control-custom\"
                       placeholder=\"Ex: 2 heures\"
                       value=\"{{ plan ? plan.duree : '' }}\">
            </div>
        </div>
    </div>

    {# Error box #}
    <div id=\"ef-errorBox\" class=\"alert alert-danger\" style=\"display:none;border-radius:10px;\"></div>

    {# Actions #}
    <div class=\"d-flex gap-3 justify-content-center mt-4\">
        <button type=\"button\" id=\"ef-btnSave\" class=\"btn-save\">💾 Mettre à jour</button>
        <a href=\"{{ path('psycho_events_index') }}\" class=\"btn-cancel-link\">✖ Annuler</a>
    </div>

    <div class=\"text-center mt-4\">
        <p class=\"small text-muted fst-italic\">
            💡 Les champs marqués * sont obligatoires. La planification est optionnelle — laissez les deux champs vides pour la supprimer.
        </p>
    </div>
</div>

{# Hidden data for JS #}
<script>
    const EF_EVENT_ID  = {{ event.id }};
    const EF_PLAN_ID   = {{ plan ? plan.id_planification : 'null' }};
</script>

{% endblock %}

{% block javascripts %}
{{ parent() }}
<script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js\"></script>
<script>
    // ── Validation helpers ──────────────────────────────────────────────────

    function efSetState(id, state) {
        const el = document.getElementById(id);
        el.classList.remove('ef-valid', 'ef-invalid', 'ef-warning');
        if (state) el.classList.add('ef-' + state);
    }

    function efValidateTitle() {
        const v = document.getElementById('ef-title').value.trim();
        if (!v)           { efSetState('ef-title', 'invalid'); return false; }
        if (v.length < 3) { efSetState('ef-title', 'warning'); return false; }
        efSetState('ef-title', 'valid'); return true;
    }

    function efValidateLocation() {
        const v = document.getElementById('ef-location').value.trim();
        if (!v || v.length < 3) { efSetState('ef-location', v ? 'warning' : 'invalid'); return false; }
        efSetState('ef-location', 'valid'); return true;
    }

    function efValidateDate() {
        const v = document.getElementById('ef-date').value;
        efSetState('ef-date', v ? 'valid' : 'invalid');
        return !!v;
    }

    function efValidateMax() {
        const v = parseInt(document.getElementById('ef-maxPart').value);
        const ok = !isNaN(v) && v > 0;
        efSetState('ef-maxPart', ok ? 'valid' : 'invalid');
        return ok;
    }

    function efValidatePlan() {
        const desc  = document.getElementById('ef-planDesc').value.trim();
        const duree = document.getElementById('ef-planDuree').value.trim();
        // Both empty = valid (will delete existing plan)
        if (!desc && !duree) {
            efSetState('ef-planDesc',  null);
            efSetState('ef-planDuree', null);
            return true;
        }
        // One filled, one empty = invalid
        if (desc && !duree)  { efSetState('ef-planDuree', 'invalid'); efSetState('ef-planDesc', 'valid'); return false; }
        if (!desc && duree)  { efSetState('ef-planDesc', 'invalid');  efSetState('ef-planDuree', 'valid'); return false; }
        // Both filled
        if (desc.length < 4) { efSetState('ef-planDesc', 'warning'); return false; }
        efSetState('ef-planDesc',  'valid');
        efSetState('ef-planDuree', 'valid');
        return true;
    }

    function efValidateAll() {
        let ok = true;
        if (!efValidateTitle())    ok = false;
        if (!efValidateLocation()) ok = false;
        if (!efValidateDate())     ok = false;
        if (!efValidateMax())      ok = false;
        if (!efValidatePlan())     ok = false;
        return ok;
    }

    // Live validation listeners
    document.getElementById('ef-title').addEventListener('input', efValidateTitle);
    document.getElementById('ef-location').addEventListener('input', efValidateLocation);
    document.getElementById('ef-date').addEventListener('change', efValidateDate);
    document.getElementById('ef-maxPart').addEventListener('input', efValidateMax);
    document.getElementById('ef-planDesc').addEventListener('input', efValidatePlan);
    document.getElementById('ef-planDuree').addEventListener('input', efValidatePlan);

    // Image file preview
    document.getElementById('ef-fileInput').addEventListener('change', function() {
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = e => {
                const img = document.getElementById('ef-imagePreview');
                img.src = e.target.result;
                img.style.display = 'block';
                document.getElementById('ef-link').value = '';
            };
            reader.readAsDataURL(this.files[0]);
        }
    });

    // ── Save ───────────────────────────────────────────────────────────────

    document.getElementById('ef-btnSave').addEventListener('click', async () => {
        const errorBox = document.getElementById('ef-errorBox');
        errorBox.style.display = 'none';

        if (!efValidateAll()) {
            errorBox.textContent = 'Veuillez corriger les champs en erreur.';
            errorBox.style.display = 'block';
            return;
        }

        const btn = document.getElementById('ef-btnSave');
        btn.disabled = true;
        btn.textContent = '⏳ Mise à jour...';

        const title    = document.getElementById('ef-title').value.trim();
        const location = document.getElementById('ef-location').value.trim();
        const date     = document.getElementById('ef-date').value;
        const maxPart  = parseInt(document.getElementById('ef-maxPart').value);
        const link     = document.getElementById('ef-link').value.trim();
        const planDesc = document.getElementById('ef-planDesc').value.trim();
        const planDuree= document.getElementById('ef-planDuree').value.trim();

        try {
            // 1. Update event
            const evRes = await fetch(`/psycho/evente/api/events/\${EF_EVENT_ID}`, {
                method: 'PUT',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({
                    title, location,
                    event_date:       date,
                    link,
                    max_participants: maxPart
                })
            });
            const evResult = await evRes.json();
            if (!evResult.success) {
                showEfNotification('Erreur lors de la mise à jour de l\\'événement', 'error');
                return;
            }

            // 2. Handle planification
            if (!planDesc && !planDuree) {
                // Delete existing plan if any
                if (EF_PLAN_ID) {
                    await fetch(`/psycho/evente/api/planifications/\${EF_PLAN_ID}`, { method: 'DELETE' });
                }
            } else if (planDesc && planDuree) {
                if (EF_PLAN_ID) {
                    // Update existing
                    await fetch(`/psycho/evente/api/planifications/\${EF_PLAN_ID}`, {
                        method: 'PUT',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ description: planDesc, duree: planDuree })
                    });
                } else {
                    // Create new
                    await fetch('/psycho/evente/api/planifications', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json' },
                        body: JSON.stringify({ idEvent: EF_EVENT_ID, description: planDesc, duree: planDuree })
                    });
                }
            }

            showEfNotification('✅ Événement mis à jour avec succès !', 'success');
            setTimeout(() => { window.location.href = '/psycho/evente'; }, 1200);

        } catch (e) {
            showEfNotification('Erreur réseau', 'error');
        } finally {
            btn.disabled = false;
            btn.textContent = '💾 Mettre à jour';
        }
    });

    function showEfNotification(message, type) {
        const toast = document.createElement('div');
        toast.textContent = message;
        toast.style.cssText = `position:fixed;bottom:20px;right:20px;background:\${type === 'success' ? '#4CAF50' : '#f44336'};color:white;padding:12px 24px;border-radius:25px;z-index:10000;font-weight:bold;`;
        document.body.appendChild(toast);
        setTimeout(() => toast.remove(), 3000);
    }
</script>
{% endblock %}
", "Psychologue/evente/edit.html.twig", "C:\\Users\\sirine\\psy1\\psy\\templates\\Psychologue\\evente\\edit.html.twig");
    }
}
