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

/* emails/conge_soumis.html.twig */
class __TwigTemplate_57bd43c2f8b6977bf155053d96e2851f extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "emails/conge_soumis.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "emails/conge_soumis.html.twig"));

        // line 4
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
<meta charset=\"UTF-8\">
<style>
  body { font-family: 'Segoe UI', sans-serif; background: #f5f7fa; margin: 0; padding: 20px; }
  .card { background: #fff; border-radius: 16px; max-width: 560px; margin: 0 auto; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,.08); }
  .header { background: linear-gradient(135deg, #667eea, #764ba2); padding: 32px 28px; color: #fff; }
  .header h1 { margin: 0; font-size: 22px; }
  .header p  { margin: 6px 0 0; opacity: .85; font-size: 14px; }
  .body { padding: 28px; }
  .info-row { display: flex; justify-content: space-between; padding: 10px 0; border-bottom: 1px solid #f0f0f0; font-size: 14px; }
  .info-row:last-child { border-bottom: none; }
  .label { color: #888; }
  .value { font-weight: 600; color: #333; }
  .badge { background: #fff8e1; color: #f59e0b; padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 700; }
  .footer { background: #f8f9fa; padding: 18px 28px; font-size: 12px; color: #aaa; text-align: center; }
</style>
</head>
<body>
<div class=\"card\">
  <div class=\"header\">
    <h1>🏥 Demande de congé maladie soumise</h1>
    <p>Votre demande est en cours d'examen</p>
  </div>
  <div class=\"body\">
    <p>Bonjour <strong>";
        // line 30
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["patient"]) || array_key_exists("patient", $context) ? $context["patient"] : (function () { throw new RuntimeError('Variable "patient" does not exist.', 30, $this->source); })()), "firstname", [], "any", false, false, false, 30), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["patient"]) || array_key_exists("patient", $context) ? $context["patient"] : (function () { throw new RuntimeError('Variable "patient" does not exist.', 30, $this->source); })()), "lastname", [], "any", false, false, false, 30), "html", null, true);
        yield "</strong>,</p>
    <p>Votre demande de congé maladie a bien été transmise à <strong>";
        // line 31
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["psy"]) || array_key_exists("psy", $context) ? $context["psy"] : (function () { throw new RuntimeError('Variable "psy" does not exist.', 31, $this->source); })()), "firstname", [], "any", false, false, false, 31), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["psy"]) || array_key_exists("psy", $context) ? $context["psy"] : (function () { throw new RuntimeError('Variable "psy" does not exist.', 31, $this->source); })()), "lastname", [], "any", false, false, false, 31), "html", null, true);
        yield "</strong>.</p>

    <div class=\"info-row\">
      <span class=\"label\">Date de début</span>
      <span class=\"value\">";
        // line 35
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["conge"]) || array_key_exists("conge", $context) ? $context["conge"] : (function () { throw new RuntimeError('Variable "conge" does not exist.', 35, $this->source); })()), "dateDebut", [], "any", false, false, false, 35), "d/m/Y"), "html", null, true);
        yield "</span>
    </div>
    <div class=\"info-row\">
      <span class=\"label\">Date de fin</span>
      <span class=\"value\">";
        // line 39
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["conge"]) || array_key_exists("conge", $context) ? $context["conge"] : (function () { throw new RuntimeError('Variable "conge" does not exist.', 39, $this->source); })()), "dateFin", [], "any", false, false, false, 39), "d/m/Y"), "html", null, true);
        yield "</span>
    </div>
    <div class=\"info-row\">
      <span class=\"label\">Durée</span>
      <span class=\"value\">";
        // line 43
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["conge"]) || array_key_exists("conge", $context) ? $context["conge"] : (function () { throw new RuntimeError('Variable "conge" does not exist.', 43, $this->source); })()), "dureeJours", [], "any", false, false, false, 43), "html", null, true);
        yield " jour";
        yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["conge"]) || array_key_exists("conge", $context) ? $context["conge"] : (function () { throw new RuntimeError('Variable "conge" does not exist.', 43, $this->source); })()), "dureeJours", [], "any", false, false, false, 43) > 1)) ? ("s") : (""));
        yield "</span>
    </div>
    <div class=\"info-row\">
      <span class=\"label\">Statut</span>
      <span class=\"badge\">En attente</span>
    </div>

    <p style=\"margin-top:20px;font-size:14px;color:#555;line-height:1.6\">
      Vous recevrez un email dès que votre psychologue aura statué sur votre demande.
      Vous pouvez annuler la demande depuis votre espace tant qu'elle n'a pas été traitée.
    </p>
  </div>
  <div class=\"footer\">Plateforme PsychoCare · Cet email est automatique, merci de ne pas y répondre.</div>
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
        return "emails/conge_soumis.html.twig";
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
        return array (  105 => 43,  98 => 39,  91 => 35,  82 => 31,  76 => 30,  48 => 4,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# ═══════════════════════════════════════════════════════════════════════
   emails/conge_soumis.html.twig  — Email envoyé au patient après soumission
   ═══════════════════════════════════════════════════════════════════════ #}
<!DOCTYPE html>
<html lang=\"fr\">
<head>
<meta charset=\"UTF-8\">
<style>
  body { font-family: 'Segoe UI', sans-serif; background: #f5f7fa; margin: 0; padding: 20px; }
  .card { background: #fff; border-radius: 16px; max-width: 560px; margin: 0 auto; overflow: hidden; box-shadow: 0 4px 20px rgba(0,0,0,.08); }
  .header { background: linear-gradient(135deg, #667eea, #764ba2); padding: 32px 28px; color: #fff; }
  .header h1 { margin: 0; font-size: 22px; }
  .header p  { margin: 6px 0 0; opacity: .85; font-size: 14px; }
  .body { padding: 28px; }
  .info-row { display: flex; justify-content: space-between; padding: 10px 0; border-bottom: 1px solid #f0f0f0; font-size: 14px; }
  .info-row:last-child { border-bottom: none; }
  .label { color: #888; }
  .value { font-weight: 600; color: #333; }
  .badge { background: #fff8e1; color: #f59e0b; padding: 4px 12px; border-radius: 20px; font-size: 12px; font-weight: 700; }
  .footer { background: #f8f9fa; padding: 18px 28px; font-size: 12px; color: #aaa; text-align: center; }
</style>
</head>
<body>
<div class=\"card\">
  <div class=\"header\">
    <h1>🏥 Demande de congé maladie soumise</h1>
    <p>Votre demande est en cours d'examen</p>
  </div>
  <div class=\"body\">
    <p>Bonjour <strong>{{ patient.firstname }} {{ patient.lastname }}</strong>,</p>
    <p>Votre demande de congé maladie a bien été transmise à <strong>{{ psy.firstname }} {{ psy.lastname }}</strong>.</p>

    <div class=\"info-row\">
      <span class=\"label\">Date de début</span>
      <span class=\"value\">{{ conge.dateDebut|date('d/m/Y') }}</span>
    </div>
    <div class=\"info-row\">
      <span class=\"label\">Date de fin</span>
      <span class=\"value\">{{ conge.dateFin|date('d/m/Y') }}</span>
    </div>
    <div class=\"info-row\">
      <span class=\"label\">Durée</span>
      <span class=\"value\">{{ conge.dureeJours }} jour{{ conge.dureeJours > 1 ? 's' : '' }}</span>
    </div>
    <div class=\"info-row\">
      <span class=\"label\">Statut</span>
      <span class=\"badge\">En attente</span>
    </div>

    <p style=\"margin-top:20px;font-size:14px;color:#555;line-height:1.6\">
      Vous recevrez un email dès que votre psychologue aura statué sur votre demande.
      Vous pouvez annuler la demande depuis votre espace tant qu'elle n'a pas été traitée.
    </p>
  </div>
  <div class=\"footer\">Plateforme PsychoCare · Cet email est automatique, merci de ne pas y répondre.</div>
</div>
</body>
</html>
", "emails/conge_soumis.html.twig", "C:\\Users\\sirine\\psy\\templates\\emails\\conge_soumis.html.twig");
    }
}
