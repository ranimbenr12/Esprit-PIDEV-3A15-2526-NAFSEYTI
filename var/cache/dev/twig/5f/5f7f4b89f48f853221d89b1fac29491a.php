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

/* front/tests/_badge_card.html.twig */
class __TwigTemplate_db515db4ec5b6f2bd4f2506036b51595 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front/tests/_badge_card.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front/tests/_badge_card.html.twig"));

        // line 2
        if ((array_key_exists("badge", $context) && (isset($context["badge"]) || array_key_exists("badge", $context) ? $context["badge"] : (function () { throw new RuntimeError('Variable "badge" does not exist.', 2, $this->source); })()))) {
            // line 3
            yield "<div class=\"badge-card\" style=\"text-align: center; padding: 25px; background: linear-gradient(135deg, ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["badge"]) || array_key_exists("badge", $context) ? $context["badge"] : (function () { throw new RuntimeError('Variable "badge" does not exist.', 3, $this->source); })()), "color", [], "any", false, false, false, 3), "html", null, true);
            yield "20 0%, ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["badge"]) || array_key_exists("badge", $context) ? $context["badge"] : (function () { throw new RuntimeError('Variable "badge" does not exist.', 3, $this->source); })()), "color", [], "any", false, false, false, 3), "html", null, true);
            yield "10 100%); border-radius: 20px; margin-bottom: 30px; border: 2px solid ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["badge"]) || array_key_exists("badge", $context) ? $context["badge"] : (function () { throw new RuntimeError('Variable "badge" does not exist.', 3, $this->source); })()), "color", [], "any", false, false, false, 3), "html", null, true);
            yield "40;\">
    <div style=\"font-size: 4.5rem; margin-bottom: 10px; animation: bounce 0.5s ease;\">
        ";
            // line 5
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["badge"]) || array_key_exists("badge", $context) ? $context["badge"] : (function () { throw new RuntimeError('Variable "badge" does not exist.', 5, $this->source); })()), "icon", [], "any", false, false, false, 5), "html", null, true);
            yield "
    </div>
    <h3 style=\"color: ";
            // line 7
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["badge"]) || array_key_exists("badge", $context) ? $context["badge"] : (function () { throw new RuntimeError('Variable "badge" does not exist.', 7, $this->source); })()), "color", [], "any", false, false, false, 7), "html", null, true);
            yield "; margin: 0 0 8px 0; font-family: 'Playfair Display', serif; font-size: 1.5rem;\">
        🎖️ Badge ";
            // line 8
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["badge"]) || array_key_exists("badge", $context) ? $context["badge"] : (function () { throw new RuntimeError('Variable "badge" does not exist.', 8, $this->source); })()), "label", [], "any", false, false, false, 8), "html", null, true);
            yield "
    </h3>
    <p style=\"color: #666; margin: 0 0 15px 0; font-size: 0.95rem;\">
        ";
            // line 11
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["badge"]) || array_key_exists("badge", $context) ? $context["badge"] : (function () { throw new RuntimeError('Variable "badge" does not exist.', 11, $this->source); })()), "description", [], "any", false, false, false, 11), "html", null, true);
            yield "
    </p>
    <div style=\"display: inline-flex; align-items: center; gap: 8px; background: ";
            // line 13
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["badge"]) || array_key_exists("badge", $context) ? $context["badge"] : (function () { throw new RuntimeError('Variable "badge" does not exist.', 13, $this->source); })()), "color", [], "any", false, false, false, 13), "html", null, true);
            yield "; color: white; padding: 8px 20px; border-radius: 25px; font-size: 0.9rem; font-weight: 600;\">
        <span>⭐</span>
        +";
            // line 15
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["badge"]) || array_key_exists("badge", $context) ? $context["badge"] : (function () { throw new RuntimeError('Variable "badge" does not exist.', 15, $this->source); })()), "points_xp", [], "any", false, false, false, 15), "html", null, true);
            yield " XP
    </div>
</div>

<style>
@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}
.badge-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.badge-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}
</style>
";
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
        return "front/tests/_badge_card.html.twig";
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
        return array (  85 => 15,  80 => 13,  75 => 11,  69 => 8,  65 => 7,  60 => 5,  50 => 3,  48 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# templates/front/tests/_badge_card.html.twig #}
{% if badge is defined and badge %}
<div class=\"badge-card\" style=\"text-align: center; padding: 25px; background: linear-gradient(135deg, {{ badge.color }}20 0%, {{ badge.color }}10 100%); border-radius: 20px; margin-bottom: 30px; border: 2px solid {{ badge.color }}40;\">
    <div style=\"font-size: 4.5rem; margin-bottom: 10px; animation: bounce 0.5s ease;\">
        {{ badge.icon }}
    </div>
    <h3 style=\"color: {{ badge.color }}; margin: 0 0 8px 0; font-family: 'Playfair Display', serif; font-size: 1.5rem;\">
        🎖️ Badge {{ badge.label }}
    </h3>
    <p style=\"color: #666; margin: 0 0 15px 0; font-size: 0.95rem;\">
        {{ badge.description }}
    </p>
    <div style=\"display: inline-flex; align-items: center; gap: 8px; background: {{ badge.color }}; color: white; padding: 8px 20px; border-radius: 25px; font-size: 0.9rem; font-weight: 600;\">
        <span>⭐</span>
        +{{ badge.points_xp }} XP
    </div>
</div>

<style>
@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}
.badge-card {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.badge-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}
</style>
{% endif %}", "front/tests/_badge_card.html.twig", "C:\\Users\\sirine\\psy\\templates\\front\\tests\\_badge_card.html.twig");
    }
}
