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

/* emails/conge_valide.html.twig */
class __TwigTemplate_b8e509aee867088dac81a77f7545c219 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "emails/conge_valide.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "emails/conge_valide.html.twig"));

        // line 2
        yield "<!DOCTYPE html>
<html>
<body style=\"font-family:Arial,sans-serif;background:#f5f5f5;padding:20px\">
  <div style=\"max-width:600px;margin:auto;background:#fff;border-radius:12px;overflow:hidden;box-shadow:0 2px 12px rgba(0,0,0,.1)\">

    <div style=\"background:linear-gradient(135deg,#085918,#10b981);padding:32px;text-align:center\">
      <h1 style=\"color:#fff;margin:0;font-size:24px\">✅ Congé Maladie Validé</h1>
    </div>

    <div style=\"padding:32px\">
      ";
        // line 12
        $context["duree"] = (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["conge"]) || array_key_exists("conge", $context) ? $context["conge"] : (function () { throw new RuntimeError('Variable "conge" does not exist.', 12, $this->source); })()), "dateDebut", [], "any", false, false, false, 12), "diff", [CoreExtension::getAttribute($this->env, $this->source, (isset($context["conge"]) || array_key_exists("conge", $context) ? $context["conge"] : (function () { throw new RuntimeError('Variable "conge" does not exist.', 12, $this->source); })()), "dateFin", [], "any", false, false, false, 12)], "method", false, false, false, 12), "days", [], "any", false, false, false, 12) + 1);
        // line 13
        yield "
      <p>Bonjour <strong>";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["patient"]) || array_key_exists("patient", $context) ? $context["patient"] : (function () { throw new RuntimeError('Variable "patient" does not exist.', 14, $this->source); })()), "firstname", [], "any", false, false, false, 14), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["patient"]) || array_key_exists("patient", $context) ? $context["patient"] : (function () { throw new RuntimeError('Variable "patient" does not exist.', 14, $this->source); })()), "lastname", [], "any", false, false, false, 14), "html", null, true);
        yield "</strong>,</p>
      <p>
        Votre demande de congé maladie a été <strong style=\"color:#10b981\">acceptée</strong>
        par <strong>Dr. ";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["psy"]) || array_key_exists("psy", $context) ? $context["psy"] : (function () { throw new RuntimeError('Variable "psy" does not exist.', 17, $this->source); })()), "firstname", [], "any", false, false, false, 17), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["psy"]) || array_key_exists("psy", $context) ? $context["psy"] : (function () { throw new RuntimeError('Variable "psy" does not exist.', 17, $this->source); })()), "lastname", [], "any", false, false, false, 17), "html", null, true);
        yield "</strong>.
      </p>

      <div style=\"background:#f0fdf4;border:1px solid #bbf7d0;border-radius:8px;padding:16px;margin:20px 0\">
        <p style=\"margin:4px 0\">📅 <strong>Période :</strong> ";
        // line 21
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["conge"]) || array_key_exists("conge", $context) ? $context["conge"] : (function () { throw new RuntimeError('Variable "conge" does not exist.', 21, $this->source); })()), "dateDebut", [], "any", false, false, false, 21), "d/m/Y"), "html", null, true);
        yield " → ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["conge"]) || array_key_exists("conge", $context) ? $context["conge"] : (function () { throw new RuntimeError('Variable "conge" does not exist.', 21, $this->source); })()), "dateFin", [], "any", false, false, false, 21), "d/m/Y"), "html", null, true);
        yield "</p>
        <p style=\"margin:4px 0\">⏳ <strong>Durée :</strong> ";
        // line 22
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["duree"]) || array_key_exists("duree", $context) ? $context["duree"] : (function () { throw new RuntimeError('Variable "duree" does not exist.', 22, $this->source); })()), "html", null, true);
        yield " jour";
        yield ((((isset($context["duree"]) || array_key_exists("duree", $context) ? $context["duree"] : (function () { throw new RuntimeError('Variable "duree" does not exist.', 22, $this->source); })()) > 1)) ? ("s") : (""));
        yield "</p>
      </div>

      <div style=\"text-align:center;margin:32px 0\">
        <a href=\"";
        // line 26
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["certificatUrl"]) || array_key_exists("certificatUrl", $context) ? $context["certificatUrl"] : (function () { throw new RuntimeError('Variable "certificatUrl" does not exist.', 26, $this->source); })()), "html", null, true);
        yield "\"
          style=\"display:inline-block;background:linear-gradient(135deg,#085918,#10b981);color:#fff;
                  padding:14px 32px;border-radius:8px;text-decoration:none;font-size:16px;font-weight:bold\">
          📄 Votre Certificat Médical
        </a>
        <p style=\"color:#888;font-size:12px;margin-top:8px\">
          Cliquez pour télécharger votre certificat d'arrêt de travail (PDF)
        </p>
      </div>

      ";
        // line 36
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["conge"]) || array_key_exists("conge", $context) ? $context["conge"] : (function () { throw new RuntimeError('Variable "conge" does not exist.', 36, $this->source); })()), "reponsePsy", [], "any", false, false, false, 36)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 37
            yield "      <div style=\"background:#f9fafb;border-left:4px solid #085918;padding:12px 16px;margin:16px 0;border-radius:4px\">
        <p style=\"margin:0;color:#444\"><strong>Message du praticien :</strong><br>";
            // line 38
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["conge"]) || array_key_exists("conge", $context) ? $context["conge"] : (function () { throw new RuntimeError('Variable "conge" does not exist.', 38, $this->source); })()), "reponsePsy", [], "any", false, false, false, 38), "html", null, true);
            yield "</p>
      </div>
      ";
        }
        // line 41
        yield "
      <p style=\"color:#666;font-size:13px\">
        L'attestation signée est également disponible en pièce jointe de cet email.
      </p>
    </div>

    <div style=\"background:#f9fafb;padding:16px;text-align:center;font-size:12px;color:#999\">
      PsychoPlatform · Ce message est automatique, merci de ne pas y répondre.
    </div>
  </div>
</body>
</html>";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "emails/conge_valide.html.twig";
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
        return array (  121 => 41,  115 => 38,  112 => 37,  110 => 36,  97 => 26,  88 => 22,  82 => 21,  73 => 17,  65 => 14,  62 => 13,  60 => 12,  48 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# emails/conge_valide.html.twig #}
<!DOCTYPE html>
<html>
<body style=\"font-family:Arial,sans-serif;background:#f5f5f5;padding:20px\">
  <div style=\"max-width:600px;margin:auto;background:#fff;border-radius:12px;overflow:hidden;box-shadow:0 2px 12px rgba(0,0,0,.1)\">

    <div style=\"background:linear-gradient(135deg,#085918,#10b981);padding:32px;text-align:center\">
      <h1 style=\"color:#fff;margin:0;font-size:24px\">✅ Congé Maladie Validé</h1>
    </div>

    <div style=\"padding:32px\">
      {% set duree = conge.dateDebut.diff(conge.dateFin).days + 1 %}

      <p>Bonjour <strong>{{ patient.firstname }} {{ patient.lastname }}</strong>,</p>
      <p>
        Votre demande de congé maladie a été <strong style=\"color:#10b981\">acceptée</strong>
        par <strong>Dr. {{ psy.firstname }} {{ psy.lastname }}</strong>.
      </p>

      <div style=\"background:#f0fdf4;border:1px solid #bbf7d0;border-radius:8px;padding:16px;margin:20px 0\">
        <p style=\"margin:4px 0\">📅 <strong>Période :</strong> {{ conge.dateDebut|date('d/m/Y') }} → {{ conge.dateFin|date('d/m/Y') }}</p>
        <p style=\"margin:4px 0\">⏳ <strong>Durée :</strong> {{ duree }} jour{{ duree > 1 ? 's' : '' }}</p>
      </div>

      <div style=\"text-align:center;margin:32px 0\">
        <a href=\"{{ certificatUrl }}\"
          style=\"display:inline-block;background:linear-gradient(135deg,#085918,#10b981);color:#fff;
                  padding:14px 32px;border-radius:8px;text-decoration:none;font-size:16px;font-weight:bold\">
          📄 Votre Certificat Médical
        </a>
        <p style=\"color:#888;font-size:12px;margin-top:8px\">
          Cliquez pour télécharger votre certificat d'arrêt de travail (PDF)
        </p>
      </div>

      {% if conge.reponsePsy %}
      <div style=\"background:#f9fafb;border-left:4px solid #085918;padding:12px 16px;margin:16px 0;border-radius:4px\">
        <p style=\"margin:0;color:#444\"><strong>Message du praticien :</strong><br>{{ conge.reponsePsy }}</p>
      </div>
      {% endif %}

      <p style=\"color:#666;font-size:13px\">
        L'attestation signée est également disponible en pièce jointe de cet email.
      </p>
    </div>

    <div style=\"background:#f9fafb;padding:16px;text-align:center;font-size:12px;color:#999\">
      PsychoPlatform · Ce message est automatique, merci de ne pas y répondre.
    </div>
  </div>
</body>
</html>", "emails/conge_valide.html.twig", "C:\\Users\\sirine\\psy\\templates\\emails\\conge_valide.html.twig");
    }
}
