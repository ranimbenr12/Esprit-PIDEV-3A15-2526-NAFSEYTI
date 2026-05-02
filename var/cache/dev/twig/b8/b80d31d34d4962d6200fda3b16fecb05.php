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

/* front/tests/rate_limit.html.twig */
class __TwigTemplate_ab34cdcd1493d4d91105929d9d0d19ce extends Template
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
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front/tests/rate_limit.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front/tests/rate_limit.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
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

        yield "Limite atteinte — Nafseyti";
        
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
        yield "<section class=\"hero-section\" style=\"min-height:60vh;display:flex;align-items:center;justify-content:center;padding:40px;\">
    <div style=\"text-align:center;max-width:520px;margin:0 auto;\">

        <div style=\"width:90px;height:90px;background:#fdf0ee;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 24px;font-size:2.5rem;\">
            🚦
        </div>

        <h1 style=\"font-family:'Playfair Display',serif;color:var(--green-deep);font-size:2rem;margin-bottom:12px;\">
            Limite atteinte
        </h1>

        <p style=\"color:#888;font-size:1rem;line-height:1.7;margin-bottom:28px;\">
            Vous avez soumis trop de tests en peu de temps.<br>
            Merci de patienter <strong style=\"color:var(--green-deep);\">";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["minutes"]) || array_key_exists("minutes", $context) ? $context["minutes"] : (function () { throw new RuntimeError('Variable "minutes" does not exist.', 19, $this->source); })()), "html", null, true);
        yield " minute";
        yield ((((isset($context["minutes"]) || array_key_exists("minutes", $context) ? $context["minutes"] : (function () { throw new RuntimeError('Variable "minutes" does not exist.', 19, $this->source); })()) > 1)) ? ("s") : (""));
        yield "</strong> avant de réessayer.
        </p>

        ";
        // line 23
        yield "        <div style=\"background:white;border:1px solid #e0f0e8;border-radius:16px;padding:28px;margin-bottom:28px;box-shadow:0 4px 20px rgba(26,61,43,0.08);\">
            <div style=\"font-size:0.85rem;color:#888;margin-bottom:8px;\">Temps restant</div>
            <div id=\"countdown\" style=\"font-family:'Playfair Display',serif;font-size:3rem;font-weight:bold;color:var(--green-deep);\">
                ";
        // line 26
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::sprintf("%02d", (isset($context["minutes"]) || array_key_exists("minutes", $context) ? $context["minutes"] : (function () { throw new RuntimeError('Variable "minutes" does not exist.', 26, $this->source); })())), "html", null, true);
        yield ":00
            </div>
            <div style=\"background:#e0f0e8;height:6px;border-radius:100px;margin-top:16px;overflow:hidden;\">
                <div id=\"countdownBar\" style=\"background:var(--green-sage);height:6px;border-radius:100px;width:100%;transition:width 1s linear;\"></div>
            </div>
        </div>

        ";
        // line 34
        yield "        <div style=\"background:#faf6f0;border-radius:12px;padding:16px 20px;margin-bottom:28px;font-size:0.85rem;color:#888;text-align:left;\">
            <div style=\"display:flex;align-items:center;gap:8px;margin-bottom:8px;\">
                <span style=\"font-size:1rem;\">ℹ️</span>
                <strong style=\"color:var(--green-deep);\">Pourquoi cette limite ?</strong>
            </div>
            <p style=\"margin:0;line-height:1.6;\">
                Pour garantir la qualité des analyses et éviter les abus, nous limitons le nombre de soumissions à <strong> 1 test par heure</strong>. Cela nous permet de vous offrir des analyses Gemini précises et personnalisées.
            </p>
        </div>

        <div style=\"display:flex;gap:12px;justify-content:center;flex-wrap:wrap;\">
            <a href=\"";
        // line 45
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_test_list");
        yield "\"
               style=\"background:var(--green-deep);color:white;padding:12px 24px;border-radius:8px;text-decoration:none;font-weight:600;font-size:0.9rem;\">
                Voir tous les tests
            </a>
            <a href=\"";
        // line 49
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_test_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 49, $this->source); })()), "id", [], "any", false, false, false, 49)]), "html", null, true);
        yield "\"
               style=\"background:transparent;border:1.5px solid #ccc;color:#888;padding:12px 24px;border-radius:8px;text-decoration:none;font-size:0.9rem;\">
                Réessayer quand même
            </a>
        </div>

    </div>
</section>

<script>
const totalSeconds  = ";
        // line 59
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["minutes"]) || array_key_exists("minutes", $context) ? $context["minutes"] : (function () { throw new RuntimeError('Variable "minutes" does not exist.', 59, $this->source); })()), "html", null, true);
        yield " * 60;
let secondsLeft     = totalSeconds;
const countdownEl   = document.getElementById('countdown');
const countdownBar  = document.getElementById('countdownBar');

const timer = setInterval(function() {
    secondsLeft--;

    if (secondsLeft <= 0) {
        clearInterval(timer);
        countdownEl.textContent = '00:00';
        countdownEl.style.color = '#52b788';
        // Rediriger automatiquement
        window.location.href = '";
        // line 72
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_test_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 72, $this->source); })()), "id", [], "any", false, false, false, 72)]), "html", null, true);
        yield "';
        return;
    }

    const m = Math.floor(secondsLeft / 60);
    const s = secondsLeft % 60;
    countdownEl.textContent = String(m).padStart(2,'0') + ':' + String(s).padStart(2,'0');

    // Barre de progression
    const pct = (secondsLeft / totalSeconds) * 100;
    countdownBar.style.width = pct + '%';

    // Rouge quand moins d'1 minute
    if (secondsLeft <= 60) {
        countdownEl.style.color = '#c0392b';
        countdownBar.style.background = '#c0392b';
    }

}, 1000);
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
        return "front/tests/rate_limit.html.twig";
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
        return array (  187 => 72,  171 => 59,  158 => 49,  151 => 45,  138 => 34,  128 => 26,  123 => 23,  115 => 19,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Limite atteinte — Nafseyti{% endblock %}

{% block body %}
<section class=\"hero-section\" style=\"min-height:60vh;display:flex;align-items:center;justify-content:center;padding:40px;\">
    <div style=\"text-align:center;max-width:520px;margin:0 auto;\">

        <div style=\"width:90px;height:90px;background:#fdf0ee;border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 24px;font-size:2.5rem;\">
            🚦
        </div>

        <h1 style=\"font-family:'Playfair Display',serif;color:var(--green-deep);font-size:2rem;margin-bottom:12px;\">
            Limite atteinte
        </h1>

        <p style=\"color:#888;font-size:1rem;line-height:1.7;margin-bottom:28px;\">
            Vous avez soumis trop de tests en peu de temps.<br>
            Merci de patienter <strong style=\"color:var(--green-deep);\">{{ minutes }} minute{{ minutes > 1 ? 's' : '' }}</strong> avant de réessayer.
        </p>

        {# Compte à rebours #}
        <div style=\"background:white;border:1px solid #e0f0e8;border-radius:16px;padding:28px;margin-bottom:28px;box-shadow:0 4px 20px rgba(26,61,43,0.08);\">
            <div style=\"font-size:0.85rem;color:#888;margin-bottom:8px;\">Temps restant</div>
            <div id=\"countdown\" style=\"font-family:'Playfair Display',serif;font-size:3rem;font-weight:bold;color:var(--green-deep);\">
                {{ '%02d'|format(minutes) }}:00
            </div>
            <div style=\"background:#e0f0e8;height:6px;border-radius:100px;margin-top:16px;overflow:hidden;\">
                <div id=\"countdownBar\" style=\"background:var(--green-sage);height:6px;border-radius:100px;width:100%;transition:width 1s linear;\"></div>
            </div>
        </div>

        {# Info limite #}
        <div style=\"background:#faf6f0;border-radius:12px;padding:16px 20px;margin-bottom:28px;font-size:0.85rem;color:#888;text-align:left;\">
            <div style=\"display:flex;align-items:center;gap:8px;margin-bottom:8px;\">
                <span style=\"font-size:1rem;\">ℹ️</span>
                <strong style=\"color:var(--green-deep);\">Pourquoi cette limite ?</strong>
            </div>
            <p style=\"margin:0;line-height:1.6;\">
                Pour garantir la qualité des analyses et éviter les abus, nous limitons le nombre de soumissions à <strong> 1 test par heure</strong>. Cela nous permet de vous offrir des analyses Gemini précises et personnalisées.
            </p>
        </div>

        <div style=\"display:flex;gap:12px;justify-content:center;flex-wrap:wrap;\">
            <a href=\"{{ path('front_test_list') }}\"
               style=\"background:var(--green-deep);color:white;padding:12px 24px;border-radius:8px;text-decoration:none;font-weight:600;font-size:0.9rem;\">
                Voir tous les tests
            </a>
            <a href=\"{{ path('front_test_show', {'id': test.id}) }}\"
               style=\"background:transparent;border:1.5px solid #ccc;color:#888;padding:12px 24px;border-radius:8px;text-decoration:none;font-size:0.9rem;\">
                Réessayer quand même
            </a>
        </div>

    </div>
</section>

<script>
const totalSeconds  = {{ minutes }} * 60;
let secondsLeft     = totalSeconds;
const countdownEl   = document.getElementById('countdown');
const countdownBar  = document.getElementById('countdownBar');

const timer = setInterval(function() {
    secondsLeft--;

    if (secondsLeft <= 0) {
        clearInterval(timer);
        countdownEl.textContent = '00:00';
        countdownEl.style.color = '#52b788';
        // Rediriger automatiquement
        window.location.href = '{{ path('front_test_show', {'id': test.id}) }}';
        return;
    }

    const m = Math.floor(secondsLeft / 60);
    const s = secondsLeft % 60;
    countdownEl.textContent = String(m).padStart(2,'0') + ':' + String(s).padStart(2,'0');

    // Barre de progression
    const pct = (secondsLeft / totalSeconds) * 100;
    countdownBar.style.width = pct + '%';

    // Rouge quand moins d'1 minute
    if (secondsLeft <= 60) {
        countdownEl.style.color = '#c0392b';
        countdownBar.style.background = '#c0392b';
    }

}, 1000);
</script>
{% endblock %}", "front/tests/rate_limit.html.twig", "C:\\Users\\sirine\\psy\\templates\\front\\tests\\rate_limit.html.twig");
    }
}
