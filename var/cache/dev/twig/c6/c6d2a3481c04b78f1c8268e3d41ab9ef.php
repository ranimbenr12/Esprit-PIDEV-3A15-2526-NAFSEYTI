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

/* emails/conge_refuse.html.twig */
class __TwigTemplate_a18a589b624cdb9dbb7f5c05263434f6 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "emails/conge_refuse.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "emails/conge_refuse.html.twig"));

        // line 6
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
<meta charset=\"UTF-8\">
<style>
  body { font-family:'Segoe UI',sans-serif; background:#f5f7fa; margin:0; padding:20px; }
  .card { background:#fff; border-radius:16px; max-width:560px; margin:0 auto; overflow:hidden; box-shadow:0 4px 20px rgba(0,0,0,.08); }
  .header { background:linear-gradient(135deg,#ef4444,#f87171); padding:32px 28px; color:#fff; }
  .header h1 { margin:0; font-size:22px; }
  .body { padding:28px; }
  .info-row { display:flex; justify-content:space-between; padding:10px 0; border-bottom:1px solid #f0f0f0; font-size:14px; }
  .info-row:last-child { border-bottom:none; }
  .label { color:#888; } .value { font-weight:600; }
  .badge-no { background:#fce4ec; color:#ef4444; padding:4px 12px; border-radius:20px; font-size:12px; font-weight:700; }
  .reponse-box { background:#fff5f5; border-left:4px solid #ef4444; border-radius:0 8px 8px 0; padding:12px 16px; margin:16px 0; font-size:14px; }
  .footer { background:#f8f9fa; padding:18px 28px; font-size:12px; color:#aaa; text-align:center; }
</style>
</head>
<body>
<div class=\"card\">
  <div class=\"header\">
    <h1>❌ Demande de congé refusée</h1>
    <p>Votre psychologue n'a pas pu valider votre demande</p>
  </div>
  <div class=\"body\">
    <p>Bonjour <strong>";
        // line 31
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["patient"]) || array_key_exists("patient", $context) ? $context["patient"] : (function () { throw new RuntimeError('Variable "patient" does not exist.', 31, $this->source); })()), "firstname", [], "any", false, false, false, 31), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["patient"]) || array_key_exists("patient", $context) ? $context["patient"] : (function () { throw new RuntimeError('Variable "patient" does not exist.', 31, $this->source); })()), "lastname", [], "any", false, false, false, 31), "html", null, true);
        yield "</strong>,</p>
    <p>Votre demande de congé maladie du ";
        // line 32
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["conge"]) || array_key_exists("conge", $context) ? $context["conge"] : (function () { throw new RuntimeError('Variable "conge" does not exist.', 32, $this->source); })()), "dateDebut", [], "any", false, false, false, 32), "d/m/Y"), "html", null, true);
        yield " au ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["conge"]) || array_key_exists("conge", $context) ? $context["conge"] : (function () { throw new RuntimeError('Variable "conge" does not exist.', 32, $this->source); })()), "dateFin", [], "any", false, false, false, 32), "d/m/Y"), "html", null, true);
        yield " a été <strong>refusée</strong> par <strong>";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["psy"]) || array_key_exists("psy", $context) ? $context["psy"] : (function () { throw new RuntimeError('Variable "psy" does not exist.', 32, $this->source); })()), "firstname", [], "any", false, false, false, 32), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["psy"]) || array_key_exists("psy", $context) ? $context["psy"] : (function () { throw new RuntimeError('Variable "psy" does not exist.', 32, $this->source); })()), "lastname", [], "any", false, false, false, 32), "html", null, true);
        yield "</strong>.</p>
    ";
        // line 33
        if ((($tmp = (isset($context["reponse"]) || array_key_exists("reponse", $context) ? $context["reponse"] : (function () { throw new RuntimeError('Variable "reponse" does not exist.', 33, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 34
            yield "      <div class=\"reponse-box\"><strong>Motif du refus :</strong><br>";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["reponse"]) || array_key_exists("reponse", $context) ? $context["reponse"] : (function () { throw new RuntimeError('Variable "reponse" does not exist.', 34, $this->source); })()), "html", null, true);
            yield "</div>
    ";
        }
        // line 36
        yield "    <p style=\"font-size:14px;color:#555;line-height:1.6\">
      Si vous avez des questions, n'hésitez pas à contacter votre psychologue directement ou à prendre un nouveau rendez-vous.
    </p>
  </div>
  <div class=\"footer\">Plateforme PsychoCare · Cet email est automatique.</div>
</div>
</body>
</html>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "emails/conge_refuse.html.twig";
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
        return array (  99 => 36,  93 => 34,  91 => 33,  81 => 32,  75 => 31,  48 => 6,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# ═══════════════════════════════════════════════════════════════════════
   emails/conge_refuse.html.twig  — Email envoyé au patient si congé refusé
   ═══════════════════════════════════════════════════════════════════════ #}
{#-- SAVE THIS AS A SEPARATE FILE: templates/emails/conge_refuse.html.twig --#}

<!DOCTYPE html>
<html lang=\"fr\">
<head>
<meta charset=\"UTF-8\">
<style>
  body { font-family:'Segoe UI',sans-serif; background:#f5f7fa; margin:0; padding:20px; }
  .card { background:#fff; border-radius:16px; max-width:560px; margin:0 auto; overflow:hidden; box-shadow:0 4px 20px rgba(0,0,0,.08); }
  .header { background:linear-gradient(135deg,#ef4444,#f87171); padding:32px 28px; color:#fff; }
  .header h1 { margin:0; font-size:22px; }
  .body { padding:28px; }
  .info-row { display:flex; justify-content:space-between; padding:10px 0; border-bottom:1px solid #f0f0f0; font-size:14px; }
  .info-row:last-child { border-bottom:none; }
  .label { color:#888; } .value { font-weight:600; }
  .badge-no { background:#fce4ec; color:#ef4444; padding:4px 12px; border-radius:20px; font-size:12px; font-weight:700; }
  .reponse-box { background:#fff5f5; border-left:4px solid #ef4444; border-radius:0 8px 8px 0; padding:12px 16px; margin:16px 0; font-size:14px; }
  .footer { background:#f8f9fa; padding:18px 28px; font-size:12px; color:#aaa; text-align:center; }
</style>
</head>
<body>
<div class=\"card\">
  <div class=\"header\">
    <h1>❌ Demande de congé refusée</h1>
    <p>Votre psychologue n'a pas pu valider votre demande</p>
  </div>
  <div class=\"body\">
    <p>Bonjour <strong>{{ patient.firstname }} {{ patient.lastname }}</strong>,</p>
    <p>Votre demande de congé maladie du {{ conge.dateDebut|date('d/m/Y') }} au {{ conge.dateFin|date('d/m/Y') }} a été <strong>refusée</strong> par <strong>{{ psy.firstname }} {{ psy.lastname }}</strong>.</p>
    {% if reponse %}
      <div class=\"reponse-box\"><strong>Motif du refus :</strong><br>{{ reponse }}</div>
    {% endif %}
    <p style=\"font-size:14px;color:#555;line-height:1.6\">
      Si vous avez des questions, n'hésitez pas à contacter votre psychologue directement ou à prendre un nouveau rendez-vous.
    </p>
  </div>
  <div class=\"footer\">Plateforme PsychoCare · Cet email est automatique.</div>
</div>
</body>
</html>
", "emails/conge_refuse.html.twig", "C:\\Users\\sirine\\psy\\templates\\emails\\conge_refuse.html.twig");
    }
}
