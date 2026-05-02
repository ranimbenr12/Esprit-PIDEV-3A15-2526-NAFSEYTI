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

/* back/events/edit.html.twig */
class __TwigTemplate_e4ec2c3ca266984093968ab744851ef1 extends Template
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
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "back/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/events/edit.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/events/edit.html.twig"));

        $this->parent = $this->load("back/base.html.twig", 1);
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

        yield "Modifier un Événement";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
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

        // line 6
        yield "<style>
    .form-container {
        background: #F5F1E6;
        border-radius: 15px;
        padding: 30px;
        max-width: 700px;
        margin: 0 auto;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    .form-header { text-align: center; margin-bottom: 25px; }
    .form-header h2 { font-size: 24px; font-weight: bold; color: #5c715a; }
    .form-header hr { border-color: #5c715a; }
    .form-group { margin-bottom: 18px; }
    .form-group label { font-weight: bold; color: #5c715a; display: block; margin-bottom: 6px; font-size: 13px; }
    .form-control {
        width: 100%; padding: 10px; border-radius: 8px;
        border: 2px solid #d2e0cf; background: white; transition: border-color .2s;
    }
    .form-control:focus { border-color: #7f9a7d; outline: none; box-shadow: 0 0 5px rgba(127,154,125,.3); }
    .field-valid   { border-color: green !important; }
    .field-warning { border-color: orange !important; }
    .field-error   { border-color: red !important; }
    .field-msg { font-size: 11px; margin-top: 3px; }
    .field-msg.err  { color: red; }
    .field-msg.warn { color: orange; }
    .field-msg.ok   { color: green; }

    .btn-update {
        background: linear-gradient(135deg, #4CAF50, #45a049);
        border: none; color: white; font-weight: bold;
        border-radius: 10px; padding: 13px 35px; font-size: 15px; cursor: pointer; transition: all .3s;
    }
    .btn-update:hover { background: linear-gradient(135deg, #45a049, #3d8b40); transform: scale(1.02); }
    .btn-cancel {
        background: #b22222; border: none; color: white; font-weight: bold;
        border-radius: 10px; padding: 13px 35px; font-size: 15px; cursor: pointer; transition: all .3s;
        text-decoration: none; display: inline-block;
    }
    .btn-cancel:hover { background: #8b1a1a; color: white; }
    .upload-area {
        border: 2px dashed #c4d4c1; border-radius: 15px; padding: 20px;
        text-align: center; background: #f0f5f0; cursor: pointer; transition: all .3s;
    }
    .upload-area:hover { background: #e8f0e8; border-color: #7f9a7d; }
    .image-preview { max-width: 200px; max-height: 130px; margin-top: 10px; border-radius: 8px; }
    .planification-section {
        background: #f0f5f0; border-radius: 15px; padding: 20px;
        margin-top: 10px; border: 1px solid #d2e0cf;
    }
    .planification-section h4 { color: #5c715a; font-weight: bold; margin-bottom: 15px; font-size: 15px; }
</style>

<div class=\"full_container\">
  <div class=\"inner_container\">
    <div id=\"content\">
      <div class=\"midde_cont\">
        <div class=\"container-fluid\">
          <div class=\"form-container\">

            <div class=\"form-header\">
              <h2>✏️ MODIFIER L'ÉVÉNEMENT</h2>
              <hr>
            </div>

            ";
        // line 70
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 70, $this->source); })()), "flashes", ["success"], "method", false, false, false, 70));
        foreach ($context['_seq'] as $context["_key"] => $context["msg"]) {
            // line 71
            yield "              <div class=\"alert alert-success\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["msg"], "html", null, true);
            yield "</div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['msg'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 73
        yield "            ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 73, $this->source); })()), "flashes", ["error"], "method", false, false, false, 73));
        foreach ($context['_seq'] as $context["_key"] => $context["msg"]) {
            // line 74
            yield "              <div class=\"alert alert-danger\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["msg"], "html", null, true);
            yield "</div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['msg'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 76
        yield "
            <form method=\"post\" action=\"";
        // line 77
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_events_update", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["event"]) || array_key_exists("event", $context) ? $context["event"] : (function () { throw new RuntimeError('Variable "event" does not exist.', 77, $this->source); })()), "id", [], "any", false, false, false, 77)]), "html", null, true);
        yield "\"
                  enctype=\"multipart/form-data\" id=\"editForm\" novalidate>

              <!-- TITRE -->
              <div class=\"form-group\">
                <label>📝 TITRE</label>
                <input type=\"text\" name=\"title\" id=\"title\" class=\"form-control field-valid\"
                       value=\"";
        // line 84
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["event"]) || array_key_exists("event", $context) ? $context["event"] : (function () { throw new RuntimeError('Variable "event" does not exist.', 84, $this->source); })()), "title", [], "any", false, false, false, 84), "html", null, true);
        yield "\" required>
                <div class=\"field-msg\" id=\"titleMsg\"></div>
              </div>

              <!-- LIEU -->
              <div class=\"form-group\">
                <label>📍 LIEU</label>
                <input type=\"text\" name=\"location\" id=\"location\" class=\"form-control field-valid\"
                       value=\"";
        // line 92
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["event"]) || array_key_exists("event", $context) ? $context["event"] : (function () { throw new RuntimeError('Variable "event" does not exist.', 92, $this->source); })()), "location", [], "any", false, false, false, 92), "html", null, true);
        yield "\" required>
                <div class=\"field-msg\" id=\"locationMsg\"></div>
              </div>

              <!-- DATE + PARTICIPANTS -->
              <div class=\"row\">
                <div class=\"col-md-6\">
                  <div class=\"form-group\">
                    <label>📅 DATE</label>
                    <input type=\"date\" name=\"eventDate\" id=\"eventDate\" class=\"form-control field-valid\"
                           value=\"";
        // line 102
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["event"]) || array_key_exists("event", $context) ? $context["event"] : (function () { throw new RuntimeError('Variable "event" does not exist.', 102, $this->source); })()), "eventDate", [], "any", false, false, false, 102), "Y-m-d"), "html", null, true);
        yield "\" required>
                    <div class=\"field-msg\" id=\"dateMsg\"></div>
                  </div>
                </div>
                <div class=\"col-md-6\">
                  <div class=\"form-group\">
                    <label>👥 PARTICIPANTS MAX</label>
                    <input type=\"number\" name=\"maxParticipants\" id=\"maxParticipants\" class=\"form-control field-valid\"
                           value=\"";
        // line 110
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["event"]) || array_key_exists("event", $context) ? $context["event"] : (function () { throw new RuntimeError('Variable "event" does not exist.', 110, $this->source); })()), "maxParticipants", [], "any", false, false, false, 110), "html", null, true);
        yield "\" min=\"1\" required>
                    <div class=\"field-msg\" id=\"maxMsg\"></div>
                  </div>
                </div>
              </div>

              <!-- IMAGE URL -->
              <div class=\"form-group\">
                <label>🖼️ URL IMAGE / LIEN</label>
                <input type=\"text\" name=\"link\" id=\"link\" class=\"form-control\"
                       value=\"";
        // line 120
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["event"] ?? null), "link", [], "any", true, true, false, 120) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["event"]) || array_key_exists("event", $context) ? $context["event"] : (function () { throw new RuntimeError('Variable "event" does not exist.', 120, $this->source); })()), "link", [], "any", false, false, false, 120)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["event"]) || array_key_exists("event", $context) ? $context["event"] : (function () { throw new RuntimeError('Variable "event" does not exist.', 120, $this->source); })()), "link", [], "any", false, false, false, 120), "html", null, true)) : (""));
        yield "\">
              </div>

              <!-- UPLOAD -->
              <div class=\"form-group\">
                <div class=\"upload-area\" id=\"uploadArea\">
                  <label style=\"cursor:pointer;\">☁️ Cliquez ici pour changer l'image</label>
                  <input type=\"file\" id=\"imageFile\" name=\"imageFile\" accept=\"image/*\" style=\"display:none;\">
                  ";
        // line 128
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["event"]) || array_key_exists("event", $context) ? $context["event"] : (function () { throw new RuntimeError('Variable "event" does not exist.', 128, $this->source); })()), "link", [], "any", false, false, false, 128)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 129
            yield "                    <img id=\"imagePreview\" class=\"image-preview\" src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["event"]) || array_key_exists("event", $context) ? $context["event"] : (function () { throw new RuntimeError('Variable "event" does not exist.', 129, $this->source); })()), "link", [], "any", false, false, false, 129), "html", null, true);
            yield "\" style=\"display:block;\">
                  ";
        } else {
            // line 131
            yield "                    <img id=\"imagePreview\" class=\"image-preview\" style=\"display:none;\">
                  ";
        }
        // line 133
        yield "                </div>
              </div>

              <!-- PLANIFICATION -->
              <div class=\"planification-section\">
                <h4>📋 PLANIFICATION</h4>
                <div class=\"form-group\">
                  <label>Description :</label>
                  <input type=\"text\" name=\"planDescription\" id=\"planDescription\" class=\"form-control\"
                         value=\"";
        // line 142
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["planification"] ?? null), "description", [], "any", true, true, false, 142) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["planification"]) || array_key_exists("planification", $context) ? $context["planification"] : (function () { throw new RuntimeError('Variable "planification" does not exist.', 142, $this->source); })()), "description", [], "any", false, false, false, 142)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["planification"]) || array_key_exists("planification", $context) ? $context["planification"] : (function () { throw new RuntimeError('Variable "planification" does not exist.', 142, $this->source); })()), "description", [], "any", false, false, false, 142), "html", null, true)) : (""));
        yield "\"
                         placeholder=\"Description de la planification\">
                  <div class=\"field-msg\" id=\"planDescMsg\"></div>
                </div>
                <div class=\"form-group\" style=\"margin-bottom:0;\">
                  <label>Durée :</label>
                  <input type=\"text\" name=\"planDuree\" id=\"planDuree\" class=\"form-control\"
                         value=\"";
        // line 149
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["planification"] ?? null), "duree", [], "any", true, true, false, 149) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["planification"]) || array_key_exists("planification", $context) ? $context["planification"] : (function () { throw new RuntimeError('Variable "planification" does not exist.', 149, $this->source); })()), "duree", [], "any", false, false, false, 149)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["planification"]) || array_key_exists("planification", $context) ? $context["planification"] : (function () { throw new RuntimeError('Variable "planification" does not exist.', 149, $this->source); })()), "duree", [], "any", false, false, false, 149), "html", null, true)) : (""));
        yield "\"
                         placeholder=\"Ex: 2 heures\" style=\"max-width:300px;\">
                  <div class=\"field-msg\" id=\"planDureeMsg\"></div>
                </div>
              </div>

              <!-- BOUTONS -->
              <div class=\"text-center\" style=\"margin: 28px 0 18px;\">
                <button type=\"submit\" class=\"btn-update\">💾 Mettre à jour</button>
                <a href=\"";
        // line 158
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_events_index");
        yield "\" class=\"btn-cancel\" style=\"margin-left:15px;\">✖ Annuler</a>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
function setField(el, msgEl, state, msg) {
    el.classList.remove('field-valid','field-warning','field-error');
    msgEl.className = 'field-msg';
    if (state === 'ok')   { el.classList.add('field-valid');   msgEl.classList.add('ok');   }
    if (state === 'warn') { el.classList.add('field-warning'); msgEl.classList.add('warn'); }
    if (state === 'err')  { el.classList.add('field-error');   msgEl.classList.add('err');  }
    msgEl.textContent = msg || '';
}

function validateTitle() {
    const v = document.getElementById('title').value.trim();
    const el = document.getElementById('title'), msg = document.getElementById('titleMsg');
    if (!v)           { setField(el, msg, 'err',  'Le titre est requis.'); return false; }
    if (v.length < 3) { setField(el, msg, 'warn', 'Minimum 3 caractères.'); return false; }
    setField(el, msg, 'ok', ''); return true;
}
function validateLocation() {
    const v = document.getElementById('location').value.trim();
    const el = document.getElementById('location'), msg = document.getElementById('locationMsg');
    if (!v)           { setField(el, msg, 'err',  'Le lieu est requis.'); return false; }
    if (v.length < 3) { setField(el, msg, 'warn', 'Minimum 3 caractères.'); return false; }
    setField(el, msg, 'ok', ''); return true;
}
function validateDate() {
    const v = document.getElementById('eventDate').value;
    const el = document.getElementById('eventDate'), msg = document.getElementById('dateMsg');
    if (!v) { setField(el, msg, 'err', 'La date est requise.'); return false; }
    setField(el, msg, 'ok', ''); return true;
}
function validateMax() {
    const v = document.getElementById('maxParticipants').value.trim();
    const el = document.getElementById('maxParticipants'), msg = document.getElementById('maxMsg');
    if (!v) { setField(el, msg, 'err', 'Ce champ est requis.'); return false; }
    const n = parseInt(v);
    if (isNaN(n) || n <= 0) { setField(el, msg, 'warn', 'Doit être un nombre positif.'); return false; }
    setField(el, msg, 'ok', ''); return true;
}
function validatePlanification() {
    const desc  = document.getElementById('planDescription').value.trim();
    const duree = document.getElementById('planDuree').value.trim();
    const dEl = document.getElementById('planDescription'), dMsg = document.getElementById('planDescMsg');
    const uEl = document.getElementById('planDuree'),       uMsg = document.getElementById('planDureeMsg');
    if (!desc && !duree) { return true; }
    if (desc && !duree) {
        setField(dEl, dMsg, 'ok', '');
        setField(uEl, uMsg, 'err', 'Durée requise si description renseignée.');
        return false;
    }
    if (!desc && duree) {
        setField(dEl, dMsg, 'err', 'Description requise si durée renseignée.');
        setField(uEl, uMsg, 'ok', '');
        return false;
    }
    if (desc.length < 4) {
        setField(dEl, dMsg, 'warn', 'Minimum 4 caractères.');
        return false;
    }
    setField(dEl, dMsg, 'ok', '');
    setField(uEl, uMsg, 'ok', '');
    return true;
}

document.getElementById('title').addEventListener('input', validateTitle);
document.getElementById('location').addEventListener('input', validateLocation);
document.getElementById('eventDate').addEventListener('change', validateDate);
document.getElementById('maxParticipants').addEventListener('input', validateMax);
document.getElementById('planDescription').addEventListener('input', validatePlanification);
document.getElementById('planDuree').addEventListener('input', validatePlanification);

document.getElementById('editForm').addEventListener('submit', function(e) {
    const ok = validateTitle() & validateLocation() & validateDate() & validateMax() & validatePlanification();
    if (!ok) e.preventDefault();
});

// Image upload
document.getElementById('uploadArea').addEventListener('click', function() {
    document.getElementById('imageFile').click();
});
document.getElementById('imageFile').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = function(ev) {
        const preview = document.getElementById('imagePreview');
        preview.src = ev.target.result;
        preview.style.display = 'block';
        document.getElementById('link').value = ev.target.result;
    };
    reader.readAsDataURL(file);
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
        return "back/events/edit.html.twig";
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
        return array (  310 => 158,  298 => 149,  288 => 142,  277 => 133,  273 => 131,  267 => 129,  265 => 128,  254 => 120,  241 => 110,  230 => 102,  217 => 92,  206 => 84,  196 => 77,  193 => 76,  184 => 74,  179 => 73,  170 => 71,  166 => 70,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'back/base.html.twig' %}

{% block title %}Modifier un Événement{% endblock %}

{% block body %}
<style>
    .form-container {
        background: #F5F1E6;
        border-radius: 15px;
        padding: 30px;
        max-width: 700px;
        margin: 0 auto;
        box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    }
    .form-header { text-align: center; margin-bottom: 25px; }
    .form-header h2 { font-size: 24px; font-weight: bold; color: #5c715a; }
    .form-header hr { border-color: #5c715a; }
    .form-group { margin-bottom: 18px; }
    .form-group label { font-weight: bold; color: #5c715a; display: block; margin-bottom: 6px; font-size: 13px; }
    .form-control {
        width: 100%; padding: 10px; border-radius: 8px;
        border: 2px solid #d2e0cf; background: white; transition: border-color .2s;
    }
    .form-control:focus { border-color: #7f9a7d; outline: none; box-shadow: 0 0 5px rgba(127,154,125,.3); }
    .field-valid   { border-color: green !important; }
    .field-warning { border-color: orange !important; }
    .field-error   { border-color: red !important; }
    .field-msg { font-size: 11px; margin-top: 3px; }
    .field-msg.err  { color: red; }
    .field-msg.warn { color: orange; }
    .field-msg.ok   { color: green; }

    .btn-update {
        background: linear-gradient(135deg, #4CAF50, #45a049);
        border: none; color: white; font-weight: bold;
        border-radius: 10px; padding: 13px 35px; font-size: 15px; cursor: pointer; transition: all .3s;
    }
    .btn-update:hover { background: linear-gradient(135deg, #45a049, #3d8b40); transform: scale(1.02); }
    .btn-cancel {
        background: #b22222; border: none; color: white; font-weight: bold;
        border-radius: 10px; padding: 13px 35px; font-size: 15px; cursor: pointer; transition: all .3s;
        text-decoration: none; display: inline-block;
    }
    .btn-cancel:hover { background: #8b1a1a; color: white; }
    .upload-area {
        border: 2px dashed #c4d4c1; border-radius: 15px; padding: 20px;
        text-align: center; background: #f0f5f0; cursor: pointer; transition: all .3s;
    }
    .upload-area:hover { background: #e8f0e8; border-color: #7f9a7d; }
    .image-preview { max-width: 200px; max-height: 130px; margin-top: 10px; border-radius: 8px; }
    .planification-section {
        background: #f0f5f0; border-radius: 15px; padding: 20px;
        margin-top: 10px; border: 1px solid #d2e0cf;
    }
    .planification-section h4 { color: #5c715a; font-weight: bold; margin-bottom: 15px; font-size: 15px; }
</style>

<div class=\"full_container\">
  <div class=\"inner_container\">
    <div id=\"content\">
      <div class=\"midde_cont\">
        <div class=\"container-fluid\">
          <div class=\"form-container\">

            <div class=\"form-header\">
              <h2>✏️ MODIFIER L'ÉVÉNEMENT</h2>
              <hr>
            </div>

            {% for msg in app.flashes('success') %}
              <div class=\"alert alert-success\">{{ msg }}</div>
            {% endfor %}
            {% for msg in app.flashes('error') %}
              <div class=\"alert alert-danger\">{{ msg }}</div>
            {% endfor %}

            <form method=\"post\" action=\"{{ path('admin_events_update', {'id': event.id}) }}\"
                  enctype=\"multipart/form-data\" id=\"editForm\" novalidate>

              <!-- TITRE -->
              <div class=\"form-group\">
                <label>📝 TITRE</label>
                <input type=\"text\" name=\"title\" id=\"title\" class=\"form-control field-valid\"
                       value=\"{{ event.title }}\" required>
                <div class=\"field-msg\" id=\"titleMsg\"></div>
              </div>

              <!-- LIEU -->
              <div class=\"form-group\">
                <label>📍 LIEU</label>
                <input type=\"text\" name=\"location\" id=\"location\" class=\"form-control field-valid\"
                       value=\"{{ event.location }}\" required>
                <div class=\"field-msg\" id=\"locationMsg\"></div>
              </div>

              <!-- DATE + PARTICIPANTS -->
              <div class=\"row\">
                <div class=\"col-md-6\">
                  <div class=\"form-group\">
                    <label>📅 DATE</label>
                    <input type=\"date\" name=\"eventDate\" id=\"eventDate\" class=\"form-control field-valid\"
                           value=\"{{ event.eventDate|date('Y-m-d') }}\" required>
                    <div class=\"field-msg\" id=\"dateMsg\"></div>
                  </div>
                </div>
                <div class=\"col-md-6\">
                  <div class=\"form-group\">
                    <label>👥 PARTICIPANTS MAX</label>
                    <input type=\"number\" name=\"maxParticipants\" id=\"maxParticipants\" class=\"form-control field-valid\"
                           value=\"{{ event.maxParticipants }}\" min=\"1\" required>
                    <div class=\"field-msg\" id=\"maxMsg\"></div>
                  </div>
                </div>
              </div>

              <!-- IMAGE URL -->
              <div class=\"form-group\">
                <label>🖼️ URL IMAGE / LIEN</label>
                <input type=\"text\" name=\"link\" id=\"link\" class=\"form-control\"
                       value=\"{{ event.link ?? '' }}\">
              </div>

              <!-- UPLOAD -->
              <div class=\"form-group\">
                <div class=\"upload-area\" id=\"uploadArea\">
                  <label style=\"cursor:pointer;\">☁️ Cliquez ici pour changer l'image</label>
                  <input type=\"file\" id=\"imageFile\" name=\"imageFile\" accept=\"image/*\" style=\"display:none;\">
                  {% if event.link %}
                    <img id=\"imagePreview\" class=\"image-preview\" src=\"{{ event.link }}\" style=\"display:block;\">
                  {% else %}
                    <img id=\"imagePreview\" class=\"image-preview\" style=\"display:none;\">
                  {% endif %}
                </div>
              </div>

              <!-- PLANIFICATION -->
              <div class=\"planification-section\">
                <h4>📋 PLANIFICATION</h4>
                <div class=\"form-group\">
                  <label>Description :</label>
                  <input type=\"text\" name=\"planDescription\" id=\"planDescription\" class=\"form-control\"
                         value=\"{{ planification.description ?? '' }}\"
                         placeholder=\"Description de la planification\">
                  <div class=\"field-msg\" id=\"planDescMsg\"></div>
                </div>
                <div class=\"form-group\" style=\"margin-bottom:0;\">
                  <label>Durée :</label>
                  <input type=\"text\" name=\"planDuree\" id=\"planDuree\" class=\"form-control\"
                         value=\"{{ planification.duree ?? '' }}\"
                         placeholder=\"Ex: 2 heures\" style=\"max-width:300px;\">
                  <div class=\"field-msg\" id=\"planDureeMsg\"></div>
                </div>
              </div>

              <!-- BOUTONS -->
              <div class=\"text-center\" style=\"margin: 28px 0 18px;\">
                <button type=\"submit\" class=\"btn-update\">💾 Mettre à jour</button>
                <a href=\"{{ path('admin_events_index') }}\" class=\"btn-cancel\" style=\"margin-left:15px;\">✖ Annuler</a>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
function setField(el, msgEl, state, msg) {
    el.classList.remove('field-valid','field-warning','field-error');
    msgEl.className = 'field-msg';
    if (state === 'ok')   { el.classList.add('field-valid');   msgEl.classList.add('ok');   }
    if (state === 'warn') { el.classList.add('field-warning'); msgEl.classList.add('warn'); }
    if (state === 'err')  { el.classList.add('field-error');   msgEl.classList.add('err');  }
    msgEl.textContent = msg || '';
}

function validateTitle() {
    const v = document.getElementById('title').value.trim();
    const el = document.getElementById('title'), msg = document.getElementById('titleMsg');
    if (!v)           { setField(el, msg, 'err',  'Le titre est requis.'); return false; }
    if (v.length < 3) { setField(el, msg, 'warn', 'Minimum 3 caractères.'); return false; }
    setField(el, msg, 'ok', ''); return true;
}
function validateLocation() {
    const v = document.getElementById('location').value.trim();
    const el = document.getElementById('location'), msg = document.getElementById('locationMsg');
    if (!v)           { setField(el, msg, 'err',  'Le lieu est requis.'); return false; }
    if (v.length < 3) { setField(el, msg, 'warn', 'Minimum 3 caractères.'); return false; }
    setField(el, msg, 'ok', ''); return true;
}
function validateDate() {
    const v = document.getElementById('eventDate').value;
    const el = document.getElementById('eventDate'), msg = document.getElementById('dateMsg');
    if (!v) { setField(el, msg, 'err', 'La date est requise.'); return false; }
    setField(el, msg, 'ok', ''); return true;
}
function validateMax() {
    const v = document.getElementById('maxParticipants').value.trim();
    const el = document.getElementById('maxParticipants'), msg = document.getElementById('maxMsg');
    if (!v) { setField(el, msg, 'err', 'Ce champ est requis.'); return false; }
    const n = parseInt(v);
    if (isNaN(n) || n <= 0) { setField(el, msg, 'warn', 'Doit être un nombre positif.'); return false; }
    setField(el, msg, 'ok', ''); return true;
}
function validatePlanification() {
    const desc  = document.getElementById('planDescription').value.trim();
    const duree = document.getElementById('planDuree').value.trim();
    const dEl = document.getElementById('planDescription'), dMsg = document.getElementById('planDescMsg');
    const uEl = document.getElementById('planDuree'),       uMsg = document.getElementById('planDureeMsg');
    if (!desc && !duree) { return true; }
    if (desc && !duree) {
        setField(dEl, dMsg, 'ok', '');
        setField(uEl, uMsg, 'err', 'Durée requise si description renseignée.');
        return false;
    }
    if (!desc && duree) {
        setField(dEl, dMsg, 'err', 'Description requise si durée renseignée.');
        setField(uEl, uMsg, 'ok', '');
        return false;
    }
    if (desc.length < 4) {
        setField(dEl, dMsg, 'warn', 'Minimum 4 caractères.');
        return false;
    }
    setField(dEl, dMsg, 'ok', '');
    setField(uEl, uMsg, 'ok', '');
    return true;
}

document.getElementById('title').addEventListener('input', validateTitle);
document.getElementById('location').addEventListener('input', validateLocation);
document.getElementById('eventDate').addEventListener('change', validateDate);
document.getElementById('maxParticipants').addEventListener('input', validateMax);
document.getElementById('planDescription').addEventListener('input', validatePlanification);
document.getElementById('planDuree').addEventListener('input', validatePlanification);

document.getElementById('editForm').addEventListener('submit', function(e) {
    const ok = validateTitle() & validateLocation() & validateDate() & validateMax() & validatePlanification();
    if (!ok) e.preventDefault();
});

// Image upload
document.getElementById('uploadArea').addEventListener('click', function() {
    document.getElementById('imageFile').click();
});
document.getElementById('imageFile').addEventListener('change', function(e) {
    const file = e.target.files[0];
    if (!file) return;
    const reader = new FileReader();
    reader.onload = function(ev) {
        const preview = document.getElementById('imagePreview');
        preview.src = ev.target.result;
        preview.style.display = 'block';
        document.getElementById('link').value = ev.target.result;
    };
    reader.readAsDataURL(file);
});
</script>
{% endblock %}
", "back/events/edit.html.twig", "C:\\Users\\sirine\\psy1\\psy\\templates\\back\\events\\edit.html.twig");
    }
}
