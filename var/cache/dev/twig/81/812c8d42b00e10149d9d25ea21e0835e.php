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

/* emails/conge_attestation.html.twig */
class __TwigTemplate_7fdd82e81d16092fdd7e76a3875c911c extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "emails/conge_attestation.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "emails/conge_attestation.html.twig"));

        // line 2
        yield "<!DOCTYPE html>
<html>
<head>
<meta charset=\"UTF-8\">
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }
  body { font-family: Arial, sans-serif; font-size: 13px; color: #333; padding: 30px; }

  .cert-paper {
    border: 1.5px solid #10b981;
    border-radius: 12px;
    padding: 28px;
    line-height: 1.7;
  }

  /* En-tête psy */
  .cert-psy-name    { font-size: 16px; font-weight: 700; color: #085918; }
  .cert-psy-title   { font-size: 12px; color: #666; margin-bottom: 6px; }
  .cert-psy-contact { font-size: 11px; color: #555; display: flex; gap: 16px; flex-wrap: wrap; }

  /* Titre bandeau */
  .cert-title-band {
    text-align: center;
    font-size: 13px; font-weight: 700;
    letter-spacing: .5px; color: #085918;
    background: #f0fdf4;
    border: 1px solid #86efac;
    border-radius: 8px;
    padding: 10px;
    margin: 16px 0;
  }

  .cert-intro { color: #555; font-size: 13px; margin-bottom: 6px; }

  .cert-info-row { display: flex; align-items: baseline; gap: 8px; margin: 5px 0; }
  .cert-info-lbl { min-width: 115px; font-size: 11px; color: #888; }
  .cert-info-val { font-size: 13px; font-weight: 700; color: #222; }

  /* Dates */
  .cert-dates-box {
    background: #f0fdf4;
    border: 1.5px solid #86efac;
    border-radius: 10px;
    padding: 14px; text-align: center;
    margin: 16px 0;
  }
  .cert-dates-label {
    font-size: 11px; font-weight: 700;
    color: #166534; letter-spacing: .6px;
    text-transform: uppercase; margin-bottom: 6px;
  }
  .cert-dates-range { font-size: 17px; font-weight: 700; color: #085918; }
  .cert-dates-dur   { font-size: 12px; color: #2e7d32; margin-top: 3px; }

  /* Séparateur section */
  .cert-section-sep {
    font-size: 11px; font-weight: 700;
    text-transform: uppercase; letter-spacing: .6px;
    color: #10b981; margin: 14px 0 6px;
  }

  /* Motif */
  .cert-motif-box {
    background: #f8f9fa;
    border-left: 3px solid #10b981;
    border-radius: 0 8px 8px 0;
    padding: 10px 14px;
    color: #444; font-size: 13px;
  }

  /* Recommandations */
  .cert-reco-list { padding-left: 18px; color: #555; margin: 0; }
  .cert-reco-list li { margin-bottom: 4px; }

  /* Signatures */
  .cert-signatures { display: flex; gap: 20px; margin-top: 28px; align-items: flex-start; }

  .cert-sig-box {
    border: 1px solid #eee;
    border-radius: 8px;
    padding: 12px;
    text-align: center;
    width: 220px;
  }
  .cert-sig-lbl  { font-size: 11px; color: #888; margin-bottom: 8px; }
  .cert-sig-name { font-size: 11px; color: #555; margin-top: 6px; }

  .cert-sig-img {
    width: 100%;
    height: 80px;
    object-fit: contain;
    border-bottom: 1.5px solid #333;
    display: block;
  }
  .cert-sig-empty {
    width: 100%;
    height: 80px;
    border-bottom: 1.5px solid #333;
    display: block;
  }

  /* Cachet */
  .cert-stamp-box {
    border: 1px solid #eee;
    border-radius: 8px;
    padding: 12px;
    text-align: center;
    width: 120px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 8px;
  }
  .cert-stamp {
    width: 70px; height: 70px;
    border-radius: 50%;
    border: 2.5px solid #10b981;
    display: flex; align-items: center; justify-content: center;
    font-size: 11px; font-weight: 700;
    color: #085918; text-align: center; line-height: 1.3;
  }

  .cert-footer-note {
    margin-top: 20px;
    font-size: 12px;
    color: #666;
    border-top: 1px solid #d1fae5;
    padding-top: 12px;
    text-align: center;
  }
</style>
</head>
<body>

";
        // line 137
        $context["duree"] = (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["conge"]) || array_key_exists("conge", $context) ? $context["conge"] : (function () { throw new RuntimeError('Variable "conge" does not exist.', 137, $this->source); })()), "dateDebut", [], "any", false, false, false, 137), "diff", [CoreExtension::getAttribute($this->env, $this->source, (isset($context["conge"]) || array_key_exists("conge", $context) ? $context["conge"] : (function () { throw new RuntimeError('Variable "conge" does not exist.', 137, $this->source); })()), "dateFin", [], "any", false, false, false, 137)], "method", false, false, false, 137), "days", [], "any", false, false, false, 137) + 1);
        // line 138
        yield "
<div class=\"cert-paper\">

  ";
        // line 142
        yield "  <div style=\"margin-bottom:16px; padding-bottom:12px; border-bottom:1px solid #d1fae5;\">
    <div class=\"cert-psy-name\">Dr. ";
        // line 143
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["psy"]) || array_key_exists("psy", $context) ? $context["psy"] : (function () { throw new RuntimeError('Variable "psy" does not exist.', 143, $this->source); })()), "firstname", [], "any", false, false, false, 143), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["psy"]) || array_key_exists("psy", $context) ? $context["psy"] : (function () { throw new RuntimeError('Variable "psy" does not exist.', 143, $this->source); })()), "lastname", [], "any", false, false, false, 143), "html", null, true);
        yield "</div>
    <div class=\"cert-psy-title\">Psychologue clinicien(ne) agréé(e)</div>
    <div class=\"cert-psy-contact\">
      ";
        // line 146
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["psy"] ?? null), "telephone", [], "any", true, true, false, 146) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["psy"]) || array_key_exists("psy", $context) ? $context["psy"] : (function () { throw new RuntimeError('Variable "psy" does not exist.', 146, $this->source); })()), "telephone", [], "any", false, false, false, 146))) {
            // line 147
            yield "        <span>📞 ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["psy"]) || array_key_exists("psy", $context) ? $context["psy"] : (function () { throw new RuntimeError('Variable "psy" does not exist.', 147, $this->source); })()), "telephone", [], "any", false, false, false, 147), "html", null, true);
            yield "</span>
      ";
        }
        // line 149
        yield "      ";
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["psy"] ?? null), "adresse", [], "any", true, true, false, 149) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["psy"]) || array_key_exists("psy", $context) ? $context["psy"] : (function () { throw new RuntimeError('Variable "psy" does not exist.', 149, $this->source); })()), "adresse", [], "any", false, false, false, 149))) {
            // line 150
            yield "        <span>🏠 ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["psy"]) || array_key_exists("psy", $context) ? $context["psy"] : (function () { throw new RuntimeError('Variable "psy" does not exist.', 150, $this->source); })()), "adresse", [], "any", false, false, false, 150), "html", null, true);
            yield "</span>
      ";
        }
        // line 152
        yield "      <span>✉ ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["psy"]) || array_key_exists("psy", $context) ? $context["psy"] : (function () { throw new RuntimeError('Variable "psy" does not exist.', 152, $this->source); })()), "email", [], "any", false, false, false, 152), "html", null, true);
        yield "</span>
    </div>
  </div>

  <div class=\"cert-title-band\">
    CERTIFICAT MÉDICAL D'ARRÊT DE TRAVAIL
  </div>

  <p class=\"cert-intro\">
    Je soussigné(e), <strong>Dr. ";
        // line 161
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["psy"]) || array_key_exists("psy", $context) ? $context["psy"] : (function () { throw new RuntimeError('Variable "psy" does not exist.', 161, $this->source); })()), "firstname", [], "any", false, false, false, 161), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["psy"]) || array_key_exists("psy", $context) ? $context["psy"] : (function () { throw new RuntimeError('Variable "psy" does not exist.', 161, $this->source); })()), "lastname", [], "any", false, false, false, 161), "html", null, true);
        yield "</strong>,
    psychologue clinicien(ne) agréé(e), certifie avoir examiné ce jour :
  </p>

  <div class=\"cert-info-row\">
    <span class=\"cert-info-lbl\">Nom du patient</span>
    <strong class=\"cert-info-val\">";
        // line 167
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["patient"]) || array_key_exists("patient", $context) ? $context["patient"] : (function () { throw new RuntimeError('Variable "patient" does not exist.', 167, $this->source); })()), "firstname", [], "any", false, false, false, 167), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["patient"]) || array_key_exists("patient", $context) ? $context["patient"] : (function () { throw new RuntimeError('Variable "patient" does not exist.', 167, $this->source); })()), "lastname", [], "any", false, false, false, 167), "html", null, true);
        yield "</strong>
  </div>
  <div class=\"cert-info-row\">
    <span class=\"cert-info-lbl\">Adresse e-mail</span>
    <span class=\"cert-info-val\">";
        // line 171
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["patient"]) || array_key_exists("patient", $context) ? $context["patient"] : (function () { throw new RuntimeError('Variable "patient" does not exist.', 171, $this->source); })()), "email", [], "any", false, false, false, 171), "html", null, true);
        yield "</span>
  </div>

  <p class=\"cert-intro\" style=\"margin-top:18px\">
    Après évaluation clinique de son état psychologique et émotionnel,
    il a été constaté que son état de santé nécessite un arrêt temporaire de travail
    pour raisons médicales.
  </p>

  <div class=\"cert-dates-box\">
    <div class=\"cert-dates-label\">PÉRIODE D'ARRÊT PRESCRITE</div>
    <div class=\"cert-dates-range\">
      ";
        // line 183
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["conge"]) || array_key_exists("conge", $context) ? $context["conge"] : (function () { throw new RuntimeError('Variable "conge" does not exist.', 183, $this->source); })()), "dateDebut", [], "any", false, false, false, 183), "d/m/Y"), "html", null, true);
        yield " → ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["conge"]) || array_key_exists("conge", $context) ? $context["conge"] : (function () { throw new RuntimeError('Variable "conge" does not exist.', 183, $this->source); })()), "dateFin", [], "any", false, false, false, 183), "d/m/Y"), "html", null, true);
        yield "
    </div>
    <div class=\"cert-dates-dur\">
      Durée : ";
        // line 186
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["duree"]) || array_key_exists("duree", $context) ? $context["duree"] : (function () { throw new RuntimeError('Variable "duree" does not exist.', 186, $this->source); })()), "html", null, true);
        yield " jour";
        yield ((((isset($context["duree"]) || array_key_exists("duree", $context) ? $context["duree"] : (function () { throw new RuntimeError('Variable "duree" does not exist.', 186, $this->source); })()) > 1)) ? ("s") : (""));
        yield "
    </div>
  </div>

  <div class=\"cert-section-sep\">Motif médical</div>
  <div class=\"cert-motif-box\">";
        // line 191
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["conge"]) || array_key_exists("conge", $context) ? $context["conge"] : (function () { throw new RuntimeError('Variable "conge" does not exist.', 191, $this->source); })()), "motif", [], "any", false, false, false, 191), "html", null, true);
        yield "</div>

  <div class=\"cert-section-sep\" style=\"margin-top:14px\">Recommandations médicales</div>
  <ul class=\"cert-reco-list\">
    <li>Repos complet pendant la durée prescrite</li>
    <li>Éviter toute source de stress professionnel</li>
    <li>Maintien du suivi psychologique régulier</li>
    <li>Réévaluation à la fin de la période d'arrêt</li>
  </ul>

  <p style=\"margin-top:20px; font-size:13px; color:#444;\">
    Ce certificat est délivré à la demande de l'intéressé(e) pour servir et valoir ce que de droit.
  </p>

  ";
        // line 206
        yield "  <div class=\"cert-signatures\">

    <div class=\"cert-sig-box\">
      <div class=\"cert-sig-lbl\">Signature praticien</div>
      ";
        // line 210
        if ((array_key_exists("signaturePsy", $context) && (isset($context["signaturePsy"]) || array_key_exists("signaturePsy", $context) ? $context["signaturePsy"] : (function () { throw new RuntimeError('Variable "signaturePsy" does not exist.', 210, $this->source); })()))) {
            // line 211
            yield "        <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["signaturePsy"]) || array_key_exists("signaturePsy", $context) ? $context["signaturePsy"] : (function () { throw new RuntimeError('Variable "signaturePsy" does not exist.', 211, $this->source); })()), "html", null, true);
            yield "\" class=\"cert-sig-img\" alt=\"Signature\">
      ";
        } else {
            // line 213
            yield "        <span class=\"cert-sig-empty\"></span>
      ";
        }
        // line 215
        yield "      <div class=\"cert-sig-name\">Dr. ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["psy"]) || array_key_exists("psy", $context) ? $context["psy"] : (function () { throw new RuntimeError('Variable "psy" does not exist.', 215, $this->source); })()), "firstname", [], "any", false, false, false, 215), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["psy"]) || array_key_exists("psy", $context) ? $context["psy"] : (function () { throw new RuntimeError('Variable "psy" does not exist.', 215, $this->source); })()), "lastname", [], "any", false, false, false, 215), "html", null, true);
        yield "</div>
    </div>

    <div class=\"cert-stamp-box\">
      <div class=\"cert-stamp\">VALIDÉ</div>
      <div style=\"font-size:11px; color:#888;\">Cachet praticien</div>
    </div>

  </div>

  <div class=\"cert-footer-note\">
    Délivré le ";
        // line 226
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["conge"]) || array_key_exists("conge", $context) ? $context["conge"] : (function () { throw new RuntimeError('Variable "conge" does not exist.', 226, $this->source); })()), "traiteAt", [], "any", false, false, false, 226)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["conge"]) || array_key_exists("conge", $context) ? $context["conge"] : (function () { throw new RuntimeError('Variable "conge" does not exist.', 226, $this->source); })()), "traiteAt", [], "any", false, false, false, 226), "d/m/Y"), "html", null, true)) : ("aujourd'hui"));
        yield "
    par Dr. ";
        // line 227
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["psy"]) || array_key_exists("psy", $context) ? $context["psy"] : (function () { throw new RuntimeError('Variable "psy" does not exist.', 227, $this->source); })()), "firstname", [], "any", false, false, false, 227), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["psy"]) || array_key_exists("psy", $context) ? $context["psy"] : (function () { throw new RuntimeError('Variable "psy" does not exist.', 227, $this->source); })()), "lastname", [], "any", false, false, false, 227), "html", null, true);
        yield "
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
        return "emails/conge_attestation.html.twig";
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
        return array (  342 => 227,  338 => 226,  321 => 215,  317 => 213,  311 => 211,  309 => 210,  303 => 206,  286 => 191,  276 => 186,  268 => 183,  253 => 171,  244 => 167,  233 => 161,  220 => 152,  214 => 150,  211 => 149,  205 => 147,  203 => 146,  195 => 143,  192 => 142,  187 => 138,  185 => 137,  48 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# templates/emails/conge_attestation.html.twig #}
<!DOCTYPE html>
<html>
<head>
<meta charset=\"UTF-8\">
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }
  body { font-family: Arial, sans-serif; font-size: 13px; color: #333; padding: 30px; }

  .cert-paper {
    border: 1.5px solid #10b981;
    border-radius: 12px;
    padding: 28px;
    line-height: 1.7;
  }

  /* En-tête psy */
  .cert-psy-name    { font-size: 16px; font-weight: 700; color: #085918; }
  .cert-psy-title   { font-size: 12px; color: #666; margin-bottom: 6px; }
  .cert-psy-contact { font-size: 11px; color: #555; display: flex; gap: 16px; flex-wrap: wrap; }

  /* Titre bandeau */
  .cert-title-band {
    text-align: center;
    font-size: 13px; font-weight: 700;
    letter-spacing: .5px; color: #085918;
    background: #f0fdf4;
    border: 1px solid #86efac;
    border-radius: 8px;
    padding: 10px;
    margin: 16px 0;
  }

  .cert-intro { color: #555; font-size: 13px; margin-bottom: 6px; }

  .cert-info-row { display: flex; align-items: baseline; gap: 8px; margin: 5px 0; }
  .cert-info-lbl { min-width: 115px; font-size: 11px; color: #888; }
  .cert-info-val { font-size: 13px; font-weight: 700; color: #222; }

  /* Dates */
  .cert-dates-box {
    background: #f0fdf4;
    border: 1.5px solid #86efac;
    border-radius: 10px;
    padding: 14px; text-align: center;
    margin: 16px 0;
  }
  .cert-dates-label {
    font-size: 11px; font-weight: 700;
    color: #166534; letter-spacing: .6px;
    text-transform: uppercase; margin-bottom: 6px;
  }
  .cert-dates-range { font-size: 17px; font-weight: 700; color: #085918; }
  .cert-dates-dur   { font-size: 12px; color: #2e7d32; margin-top: 3px; }

  /* Séparateur section */
  .cert-section-sep {
    font-size: 11px; font-weight: 700;
    text-transform: uppercase; letter-spacing: .6px;
    color: #10b981; margin: 14px 0 6px;
  }

  /* Motif */
  .cert-motif-box {
    background: #f8f9fa;
    border-left: 3px solid #10b981;
    border-radius: 0 8px 8px 0;
    padding: 10px 14px;
    color: #444; font-size: 13px;
  }

  /* Recommandations */
  .cert-reco-list { padding-left: 18px; color: #555; margin: 0; }
  .cert-reco-list li { margin-bottom: 4px; }

  /* Signatures */
  .cert-signatures { display: flex; gap: 20px; margin-top: 28px; align-items: flex-start; }

  .cert-sig-box {
    border: 1px solid #eee;
    border-radius: 8px;
    padding: 12px;
    text-align: center;
    width: 220px;
  }
  .cert-sig-lbl  { font-size: 11px; color: #888; margin-bottom: 8px; }
  .cert-sig-name { font-size: 11px; color: #555; margin-top: 6px; }

  .cert-sig-img {
    width: 100%;
    height: 80px;
    object-fit: contain;
    border-bottom: 1.5px solid #333;
    display: block;
  }
  .cert-sig-empty {
    width: 100%;
    height: 80px;
    border-bottom: 1.5px solid #333;
    display: block;
  }

  /* Cachet */
  .cert-stamp-box {
    border: 1px solid #eee;
    border-radius: 8px;
    padding: 12px;
    text-align: center;
    width: 120px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    gap: 8px;
  }
  .cert-stamp {
    width: 70px; height: 70px;
    border-radius: 50%;
    border: 2.5px solid #10b981;
    display: flex; align-items: center; justify-content: center;
    font-size: 11px; font-weight: 700;
    color: #085918; text-align: center; line-height: 1.3;
  }

  .cert-footer-note {
    margin-top: 20px;
    font-size: 12px;
    color: #666;
    border-top: 1px solid #d1fae5;
    padding-top: 12px;
    text-align: center;
  }
</style>
</head>
<body>

{% set duree = conge.dateDebut.diff(conge.dateFin).days + 1 %}

<div class=\"cert-paper\">

  {# En-tête psy #}
  <div style=\"margin-bottom:16px; padding-bottom:12px; border-bottom:1px solid #d1fae5;\">
    <div class=\"cert-psy-name\">Dr. {{ psy.firstname }} {{ psy.lastname }}</div>
    <div class=\"cert-psy-title\">Psychologue clinicien(ne) agréé(e)</div>
    <div class=\"cert-psy-contact\">
      {% if psy.telephone is defined and psy.telephone %}
        <span>📞 {{ psy.telephone }}</span>
      {% endif %}
      {% if psy.adresse is defined and psy.adresse %}
        <span>🏠 {{ psy.adresse }}</span>
      {% endif %}
      <span>✉ {{ psy.email }}</span>
    </div>
  </div>

  <div class=\"cert-title-band\">
    CERTIFICAT MÉDICAL D'ARRÊT DE TRAVAIL
  </div>

  <p class=\"cert-intro\">
    Je soussigné(e), <strong>Dr. {{ psy.firstname }} {{ psy.lastname }}</strong>,
    psychologue clinicien(ne) agréé(e), certifie avoir examiné ce jour :
  </p>

  <div class=\"cert-info-row\">
    <span class=\"cert-info-lbl\">Nom du patient</span>
    <strong class=\"cert-info-val\">{{ patient.firstname }} {{ patient.lastname }}</strong>
  </div>
  <div class=\"cert-info-row\">
    <span class=\"cert-info-lbl\">Adresse e-mail</span>
    <span class=\"cert-info-val\">{{ patient.email }}</span>
  </div>

  <p class=\"cert-intro\" style=\"margin-top:18px\">
    Après évaluation clinique de son état psychologique et émotionnel,
    il a été constaté que son état de santé nécessite un arrêt temporaire de travail
    pour raisons médicales.
  </p>

  <div class=\"cert-dates-box\">
    <div class=\"cert-dates-label\">PÉRIODE D'ARRÊT PRESCRITE</div>
    <div class=\"cert-dates-range\">
      {{ conge.dateDebut|date('d/m/Y') }} → {{ conge.dateFin|date('d/m/Y') }}
    </div>
    <div class=\"cert-dates-dur\">
      Durée : {{ duree }} jour{{ duree > 1 ? 's' : '' }}
    </div>
  </div>

  <div class=\"cert-section-sep\">Motif médical</div>
  <div class=\"cert-motif-box\">{{ conge.motif }}</div>

  <div class=\"cert-section-sep\" style=\"margin-top:14px\">Recommandations médicales</div>
  <ul class=\"cert-reco-list\">
    <li>Repos complet pendant la durée prescrite</li>
    <li>Éviter toute source de stress professionnel</li>
    <li>Maintien du suivi psychologique régulier</li>
    <li>Réévaluation à la fin de la période d'arrêt</li>
  </ul>

  <p style=\"margin-top:20px; font-size:13px; color:#444;\">
    Ce certificat est délivré à la demande de l'intéressé(e) pour servir et valoir ce que de droit.
  </p>

  {# Signatures #}
  <div class=\"cert-signatures\">

    <div class=\"cert-sig-box\">
      <div class=\"cert-sig-lbl\">Signature praticien</div>
      {% if signaturePsy is defined and signaturePsy %}
        <img src=\"{{ signaturePsy }}\" class=\"cert-sig-img\" alt=\"Signature\">
      {% else %}
        <span class=\"cert-sig-empty\"></span>
      {% endif %}
      <div class=\"cert-sig-name\">Dr. {{ psy.firstname }} {{ psy.lastname }}</div>
    </div>

    <div class=\"cert-stamp-box\">
      <div class=\"cert-stamp\">VALIDÉ</div>
      <div style=\"font-size:11px; color:#888;\">Cachet praticien</div>
    </div>

  </div>

  <div class=\"cert-footer-note\">
    Délivré le {{ conge.traiteAt ? conge.traiteAt|date('d/m/Y') : \"aujourd'hui\" }}
    par Dr. {{ psy.firstname }} {{ psy.lastname }}
</div>

</div>

</body>
</html>", "emails/conge_attestation.html.twig", "C:\\Users\\sirine\\psy\\templates\\emails\\conge_attestation.html.twig");
    }
}
