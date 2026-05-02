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

/* back/fiche_pdf.html.twig */
class __TwigTemplate_97ee24ca26ed3066dc73ebacecb29f8f extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/fiche_pdf.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/fiche_pdf.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
<meta charset=\"UTF-8\">
<link href=\"https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Lora:ital,wght@0,500;1,400&display=swap\" rel=\"stylesheet\">
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }

  body {
    font-family: 'Inter', sans-serif;
    background: #fff;
    color: #111;
    font-size: 11px;
    line-height: 1.65;
    width: 210mm;
    min-height: 297mm;
  }

  /* ── TOP BAR ── */
  .top-bar {
    background: #1a3a0a;
    height: 6px;
  }

  /* ── HEADER ── */
  .header {
    padding: 28px 40px 22px;
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    border-bottom: 1px solid #2d5a12;
    background: #2a5010;
  }

  .logo-name {
    font-family: 'Lora', serif;
    font-size: 24px;
    font-weight: 500;
    color: #fff;
    letter-spacing: 2px;
  }
  .logo-name span { color: #a8d878; }
  .logo-sub {
    font-size: 9px;
    color: rgba(255,255,255,0.5);
    letter-spacing: 3px;
    text-transform: uppercase;
    margin-top: 3px;
  }

  .header-right { text-align: right; }
  .doc-label {
    font-size: 8.5px;
    letter-spacing: 2.5px;
    text-transform: uppercase;
    color: rgba(255,255,255,0.55);
    margin-bottom: 4px;
  }
  .doc-id {
    font-family: 'Lora', serif;
    font-size: 20px;
    color: #c8eaaa;
    letter-spacing: 1px;
  }

  /* ── META BAND ── */
  .meta-band {
    background: #f5f0e8;
    border-bottom: 1px solid #ddd3c0;
    display: flex;
  }
  .meta-cell {
    flex: 1;
    padding: 14px 24px;
    border-right: 1px solid #ddd3c0;
  }
  .meta-cell:last-child { border-right: none; }
  .meta-label {
    font-size: 8px;
    text-transform: uppercase;
    letter-spacing: 2.5px;
    color: #aaa;
    margin-bottom: 4px;
  }
  .meta-value {
    font-size: 12px;
    font-weight: 500;
    color: #111;
  }
  .meta-value-small {
    font-size: 10px;
    color: #666;
    font-weight: 400;
  }

  /* ── BODY ── */
  .body {
    padding: 28px 40px;
  }

  /* ── SECTION ── */
  .section {
    margin-bottom: 18px;
  }

  .section-header {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 8px;
    padding-bottom: 7px;
    border-bottom: 1px solid #ebebeb;
  }

  .section-icon {
    width: 26px;
    height: 26px;
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }

  .section-label {
    font-size: 9px;
    font-weight: 600;
    letter-spacing: 2.5px;
    text-transform: uppercase;
    flex: 1;
  }

  .section-sublabel {
    font-size: 8.5px;
    color: #bbb;
    font-style: italic;
    font-family: 'Lora', serif;
  }

  .section-content {
    padding: 12px 14px;
    background: #fafafa;
    border-radius: 6px;
    border-left: 3px solid #ddd;
    font-size: 11px;
    color: #333;
    line-height: 1.8;
    min-height: 44px;
  }
  .section-content.empty {
    color: #bbb;
    font-style: italic;
  }

  /* color coding */
  .icon-symptom  { background: #fef0f0; }
  .label-symptom { color: #b71c1c; }
  .border-symptom { border-left-color: #ef9a9a; background: #fffafA; }

  .icon-diag  { background: #eff5fe; }
  .label-diag { color: #1040a0; }
  .border-diag { border-left-color: #90bdf7; background: #f8fbff; }

  .icon-rx  { background: #f1f9ec; }
  .label-rx { color: #2d5a0f; }
  .border-rx { border-left-color: #a5d67e; background: #f6fbf2; }

  .icon-reco  { background: #fff8ec; }
  .label-reco { color: #b06000; }
  .border-reco { border-left-color: #ffc96b; background: #fffdf6; }

  .icon-notes  { background: #f7f0fd; }
  .label-notes { color: #6a1b9a; }
  .border-notes { border-left-color: #cf93e8; background: #fdf8ff; }

  /* ── TWO COL ── */
  .two-col {
    display: flex;
    gap: 16px;
  }
  .two-col > .section { flex: 1; }

  /* ── DIVIDER ── */
  .section-divider {
    height: 1px;
    background: #ebebeb;
    margin: 6px 0 18px;
  }

  /* ── SIGNATURE ── */
  .sig-area {
    padding: 0 40px 24px;
    border-top: 1px dashed #ddd;
    margin: 0 40px;
    padding-top: 18px;
    display: flex;
    gap: 0;
  }
  .sig-cell {
    flex: 1;
    padding: 0 24px;
    border-right: 1px solid #e5e5e5;
  }
  .sig-cell:first-child { padding-left: 0; }
  .sig-cell:last-child  { border-right: none; padding-right: 0; }
  .sig-lbl {
    font-size: 8px;
    text-transform: uppercase;
    letter-spacing: 2px;
    color: #aaa;
    margin-bottom: 10px;
  }
  .sig-line {
    border-bottom: 1px solid #ddd;
    height: 28px;
    margin-bottom: 5px;
  }
  .sig-hint {
    font-size: 8.5px;
    color: #bbb;
    text-align: center;
  }

  /* ── FOOTER ── */
  .footer {
    margin-top: 28px;
    border-top: 1px solid #e5e5e5;
    background: #f7faf4;
    padding: 12px 40px;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  .footer-left {
    font-size: 8.5px;
    color: #999;
    letter-spacing: 0.3px;
  }
  .footer-chips {
    display: flex;
    gap: 8px;
  }
  .footer-chip {
    font-size: 7.5px;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    padding: 3px 10px;
    border-radius: 20px;
    background: #e5f0db;
    color: #3a6c18;
    border: 1px solid #c8dfb2;
  }
  .footer-right {
    font-size: 8.5px;
    color: #bbb;
  }

  .confidential {
    display: inline-block;
    font-size: 8px;
    letter-spacing: 2.5px;
    text-transform: uppercase;
    border: 1px solid rgba(255,255,255,0.35);
    color: rgba(255,255,255,0.45);
    padding: 4px 12px;
    border-radius: 3px;
    transform: rotate(-2deg);
    margin-left: 12px;
    vertical-align: middle;
  }
</style>
</head>
<body>

<div class=\"top-bar\"></div>

<!-- HEADER -->
<div class=\"header\">
  <div>
    <div class=\"logo-name\">NAFSEY<span>TI</span></div>
    <div class=\"logo-sub\">Bien-être psychologique</div>
  </div>
  <div class=\"header-right\">
    <div class=\"doc-label\">Fiche de consultation médicale</div>
    <div class=\"doc-id\">#FC-";
        // line 285
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::sprintf("%04d", CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 285, $this->source); })()), "id", [], "any", false, false, false, 285)), "html", null, true);
        yield " <span class=\"confidential\">Confidentiel</span></div>
  </div>
</div>

<!-- META BAND -->
<div class=\"meta-band\">
  <div class=\"meta-cell\">
    <div class=\"meta-label\">Médecin traitant</div>
    <div class=\"meta-value\">
      ";
        // line 294
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 294, $this->source); })()), "rendezVous", [], "any", false, false, false, 294) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 294, $this->source); })()), "rendezVous", [], "any", false, false, false, 294), "medecin", [], "any", false, false, false, 294))) {
            // line 295
            yield "        Dr. ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 295, $this->source); })()), "rendezVous", [], "any", false, false, false, 295), "medecin", [], "any", false, false, false, 295), "firstname", [], "any", false, false, false, 295), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 295, $this->source); })()), "rendezVous", [], "any", false, false, false, 295), "medecin", [], "any", false, false, false, 295), "lastname", [], "any", false, false, false, 295), "html", null, true);
            yield "
      ";
        } else {
            // line 296
            yield "—";
        }
        // line 297
        yield "    </div>
  </div>
  <div class=\"meta-cell\">
    <div class=\"meta-label\">Date du rendez-vous</div>
    <div class=\"meta-value\">
      ";
        // line 302
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 302, $this->source); })()), "rendezVous", [], "any", false, false, false, 302)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 302, $this->source); })()), "rendezVous", [], "any", false, false, false, 302), "dateRendezVous", [], "any", false, false, false, 302), "html", null, true);
        } else {
            yield "—";
        }
        // line 303
        yield "    </div>
  </div>
  <div class=\"meta-cell\">
    <div class=\"meta-label\">Horaire</div>
    <div class=\"meta-value\">
      ";
        // line 308
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 308, $this->source); })()), "rendezVous", [], "any", false, false, false, 308)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 309
            yield "        ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 309, $this->source); })()), "rendezVous", [], "any", false, false, false, 309), "heureDebut", [], "any", false, false, false, 309), "H:i"), "html", null, true);
            yield " – ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 309, $this->source); })()), "rendezVous", [], "any", false, false, false, 309), "heureFin", [], "any", false, false, false, 309), "H:i"), "html", null, true);
            yield "
      ";
        } else {
            // line 310
            yield "—";
        }
        // line 311
        yield "    </div>
  </div>
  <div class=\"meta-cell\">
    <div class=\"meta-label\">Créée le</div>
    <div class=\"meta-value\">";
        // line 315
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 315, $this->source); })()), "createdAt", [], "any", false, false, false, 315), "d/m/Y"), "html", null, true);
        yield "</div>
    <div class=\"meta-value-small\">à ";
        // line 316
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 316, $this->source); })()), "createdAt", [], "any", false, false, false, 316), "H:i"), "html", null, true);
        yield "</div>
  </div>
</div>

<!-- BODY -->
<div class=\"body\">

  <!-- Problème principal -->
  <div class=\"section\">
    <div class=\"section-header\">
      <div class=\"section-icon icon-symptom\">
        <svg width=\"14\" height=\"14\" viewBox=\"0 0 14 14\" fill=\"none\">
          <circle cx=\"7\" cy=\"7\" r=\"5.5\" stroke=\"#e57373\" stroke-width=\"1.4\"/>
          <path d=\"M7 4.5v3.5M7 9.5v.5\" stroke=\"#e57373\" stroke-width=\"1.4\" stroke-linecap=\"round\"/>
        </svg>
      </div>
      <div class=\"section-label label-symptom\">Problème principal</div>
      <div class=\"section-sublabel\">Motif de consultation</div>
    </div>
    <div class=\"section-content border-symptom ";
        // line 335
        if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 335, $this->source); })()), "problemePrincipal", [], "any", false, false, false, 335)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "empty";
        }
        yield "\">
      ";
        // line 336
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["fiche"] ?? null), "problemePrincipal", [], "any", true, true, false, 336) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 336, $this->source); })()), "problemePrincipal", [], "any", false, false, false, 336)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 336, $this->source); })()), "problemePrincipal", [], "any", false, false, false, 336), "html", null, true)) : ("Non renseigné"));
        yield "
    </div>
  </div>

  <!-- Diagnostic + Traitement -->
  <div class=\"two-col\">
    <div class=\"section\">
      <div class=\"section-header\">
        <div class=\"section-icon icon-diag\" style=\"font-weight:600;color:#1a52c0;font-size:10.5px;letter-spacing:0.5px;\">Dx</div>
        <div class=\"section-label label-diag\">Diagnostic</div>
        <div class=\"section-sublabel\">Évaluation clinique</div>
      </div>
      <div class=\"section-content border-diag ";
        // line 348
        if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 348, $this->source); })()), "diagnostic", [], "any", false, false, false, 348)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "empty";
        }
        yield "\">
        ";
        // line 349
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["fiche"] ?? null), "diagnostic", [], "any", true, true, false, 349) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 349, $this->source); })()), "diagnostic", [], "any", false, false, false, 349)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 349, $this->source); })()), "diagnostic", [], "any", false, false, false, 349), "html", null, true)) : ("Non renseigné"));
        yield "
      </div>
    </div>

    <div class=\"section\">
      <div class=\"section-header\">
        <div class=\"section-icon icon-rx\" style=\"font-weight:600;color:#2d5a0f;font-size:10.5px;letter-spacing:0.5px;\">Rx</div>
        <div class=\"section-label label-rx\">Traitement prescrit</div>
        <div class=\"section-sublabel\">Prescription</div>
      </div>
      <div class=\"section-content border-rx ";
        // line 359
        if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 359, $this->source); })()), "traitement", [], "any", false, false, false, 359)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "empty";
        }
        yield "\">
        ";
        // line 360
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["fiche"] ?? null), "traitement", [], "any", true, true, false, 360) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 360, $this->source); })()), "traitement", [], "any", false, false, false, 360)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 360, $this->source); })()), "traitement", [], "any", false, false, false, 360), "html", null, true)) : ("Non renseigné"));
        yield "
      </div>
    </div>
  </div>

  <!-- Recommandations -->
  <div class=\"section\">
    <div class=\"section-header\">
      <div class=\"section-icon icon-reco\">
        <svg width=\"14\" height=\"14\" viewBox=\"0 0 14 14\" fill=\"none\">
          <path d=\"M2 4h10M2 7h7M2 10h5\" stroke=\"#e6a030\" stroke-width=\"1.4\" stroke-linecap=\"round\"/>
        </svg>
      </div>
      <div class=\"section-label label-reco\">Recommandations</div>
      <div class=\"section-sublabel\">Conseils au patient</div>
    </div>
    <div class=\"section-content border-reco ";
        // line 376
        if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 376, $this->source); })()), "recommandations", [], "any", false, false, false, 376)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "empty";
        }
        yield "\">
      ";
        // line 377
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["fiche"] ?? null), "recommandations", [], "any", true, true, false, 377) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 377, $this->source); })()), "recommandations", [], "any", false, false, false, 377)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 377, $this->source); })()), "recommandations", [], "any", false, false, false, 377), "html", null, true)) : ("Non renseigné"));
        yield "
    </div>
  </div>

  <!-- Notes -->
  <div class=\"section\">
    <div class=\"section-header\">
      <div class=\"section-icon icon-notes\">
        <svg width=\"14\" height=\"14\" viewBox=\"0 0 14 14\" fill=\"none\">
          <rect x=\"2\" y=\"1.5\" width=\"10\" height=\"11\" rx=\"1.5\" stroke=\"#b060e0\" stroke-width=\"1.4\" fill=\"none\"/>
          <path d=\"M4.5 5h5M4.5 7.5h3.5M4.5 10h2.5\" stroke=\"#b060e0\" stroke-width=\"1.2\" stroke-linecap=\"round\"/>
        </svg>
      </div>
      <div class=\"section-label label-notes\">Notes complémentaires</div>
      <div class=\"section-sublabel\">Observations du praticien</div>
    </div>
    <div class=\"section-content border-notes ";
        // line 393
        if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 393, $this->source); })()), "notes", [], "any", false, false, false, 393)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "empty";
        }
        yield "\">
      ";
        // line 394
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["fiche"] ?? null), "notes", [], "any", true, true, false, 394) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 394, $this->source); })()), "notes", [], "any", false, false, false, 394)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 394, $this->source); })()), "notes", [], "any", false, false, false, 394), "html", null, true)) : ("Non renseigné"));
        yield "
    </div>
  </div>

</div>

<!-- SIGNATURES -->
<div class=\"sig-area\">
  <div class=\"sig-cell\">
    <div class=\"sig-lbl\">Signature du médecin</div>
    <div class=\"sig-line\"></div>
    <div class=\"sig-hint\">
      ";
        // line 406
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 406, $this->source); })()), "rendezVous", [], "any", false, false, false, 406) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 406, $this->source); })()), "rendezVous", [], "any", false, false, false, 406), "medecin", [], "any", false, false, false, 406))) {
            // line 407
            yield "        Dr. ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 407, $this->source); })()), "rendezVous", [], "any", false, false, false, 407), "medecin", [], "any", false, false, false, 407), "firstname", [], "any", false, false, false, 407), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 407, $this->source); })()), "rendezVous", [], "any", false, false, false, 407), "medecin", [], "any", false, false, false, 407), "lastname", [], "any", false, false, false, 407), "html", null, true);
            yield "
      ";
        }
        // line 409
        yield "    </div>
  </div>
  <div class=\"sig-cell\">
    <div class=\"sig-lbl\">Cachet du service</div>
    <div class=\"sig-line\"></div>
    <div class=\"sig-hint\">NAFSEYTI — Tunisie</div>
  </div>
  <div class=\"sig-cell\">
    <div class=\"sig-lbl\">Prochain rendez-vous</div>
    <div class=\"sig-line\"></div>
    <div class=\"sig-hint\">Date à définir</div>
  </div>
</div>

<!-- FOOTER -->
<div class=\"footer\">
  <div class=\"footer-left\">NAFSEYTI · Bien-être Psychologique · Tunis, Tunisie · contact@nafseyti.tn</div>
  <div class=\"footer-chips\">
    <div class=\"footer-chip\">Document officiel</div>
    <div class=\"footer-chip\">Usage médical</div>
  </div>
  <div class=\"footer-right\">Généré le ";
        // line 430
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "d/m/Y à H:i"), "html", null, true);
        yield "</div>
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
        return "back/fiche_pdf.html.twig";
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
        return array (  568 => 430,  545 => 409,  537 => 407,  535 => 406,  520 => 394,  514 => 393,  495 => 377,  489 => 376,  470 => 360,  464 => 359,  451 => 349,  445 => 348,  430 => 336,  424 => 335,  402 => 316,  398 => 315,  392 => 311,  389 => 310,  381 => 309,  379 => 308,  372 => 303,  366 => 302,  359 => 297,  356 => 296,  348 => 295,  346 => 294,  334 => 285,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
<meta charset=\"UTF-8\">
<link href=\"https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Lora:ital,wght@0,500;1,400&display=swap\" rel=\"stylesheet\">
<style>
  * { margin: 0; padding: 0; box-sizing: border-box; }

  body {
    font-family: 'Inter', sans-serif;
    background: #fff;
    color: #111;
    font-size: 11px;
    line-height: 1.65;
    width: 210mm;
    min-height: 297mm;
  }

  /* ── TOP BAR ── */
  .top-bar {
    background: #1a3a0a;
    height: 6px;
  }

  /* ── HEADER ── */
  .header {
    padding: 28px 40px 22px;
    display: flex;
    justify-content: space-between;
    align-items: flex-end;
    border-bottom: 1px solid #2d5a12;
    background: #2a5010;
  }

  .logo-name {
    font-family: 'Lora', serif;
    font-size: 24px;
    font-weight: 500;
    color: #fff;
    letter-spacing: 2px;
  }
  .logo-name span { color: #a8d878; }
  .logo-sub {
    font-size: 9px;
    color: rgba(255,255,255,0.5);
    letter-spacing: 3px;
    text-transform: uppercase;
    margin-top: 3px;
  }

  .header-right { text-align: right; }
  .doc-label {
    font-size: 8.5px;
    letter-spacing: 2.5px;
    text-transform: uppercase;
    color: rgba(255,255,255,0.55);
    margin-bottom: 4px;
  }
  .doc-id {
    font-family: 'Lora', serif;
    font-size: 20px;
    color: #c8eaaa;
    letter-spacing: 1px;
  }

  /* ── META BAND ── */
  .meta-band {
    background: #f5f0e8;
    border-bottom: 1px solid #ddd3c0;
    display: flex;
  }
  .meta-cell {
    flex: 1;
    padding: 14px 24px;
    border-right: 1px solid #ddd3c0;
  }
  .meta-cell:last-child { border-right: none; }
  .meta-label {
    font-size: 8px;
    text-transform: uppercase;
    letter-spacing: 2.5px;
    color: #aaa;
    margin-bottom: 4px;
  }
  .meta-value {
    font-size: 12px;
    font-weight: 500;
    color: #111;
  }
  .meta-value-small {
    font-size: 10px;
    color: #666;
    font-weight: 400;
  }

  /* ── BODY ── */
  .body {
    padding: 28px 40px;
  }

  /* ── SECTION ── */
  .section {
    margin-bottom: 18px;
  }

  .section-header {
    display: flex;
    align-items: center;
    gap: 10px;
    margin-bottom: 8px;
    padding-bottom: 7px;
    border-bottom: 1px solid #ebebeb;
  }

  .section-icon {
    width: 26px;
    height: 26px;
    border-radius: 6px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-shrink: 0;
  }

  .section-label {
    font-size: 9px;
    font-weight: 600;
    letter-spacing: 2.5px;
    text-transform: uppercase;
    flex: 1;
  }

  .section-sublabel {
    font-size: 8.5px;
    color: #bbb;
    font-style: italic;
    font-family: 'Lora', serif;
  }

  .section-content {
    padding: 12px 14px;
    background: #fafafa;
    border-radius: 6px;
    border-left: 3px solid #ddd;
    font-size: 11px;
    color: #333;
    line-height: 1.8;
    min-height: 44px;
  }
  .section-content.empty {
    color: #bbb;
    font-style: italic;
  }

  /* color coding */
  .icon-symptom  { background: #fef0f0; }
  .label-symptom { color: #b71c1c; }
  .border-symptom { border-left-color: #ef9a9a; background: #fffafA; }

  .icon-diag  { background: #eff5fe; }
  .label-diag { color: #1040a0; }
  .border-diag { border-left-color: #90bdf7; background: #f8fbff; }

  .icon-rx  { background: #f1f9ec; }
  .label-rx { color: #2d5a0f; }
  .border-rx { border-left-color: #a5d67e; background: #f6fbf2; }

  .icon-reco  { background: #fff8ec; }
  .label-reco { color: #b06000; }
  .border-reco { border-left-color: #ffc96b; background: #fffdf6; }

  .icon-notes  { background: #f7f0fd; }
  .label-notes { color: #6a1b9a; }
  .border-notes { border-left-color: #cf93e8; background: #fdf8ff; }

  /* ── TWO COL ── */
  .two-col {
    display: flex;
    gap: 16px;
  }
  .two-col > .section { flex: 1; }

  /* ── DIVIDER ── */
  .section-divider {
    height: 1px;
    background: #ebebeb;
    margin: 6px 0 18px;
  }

  /* ── SIGNATURE ── */
  .sig-area {
    padding: 0 40px 24px;
    border-top: 1px dashed #ddd;
    margin: 0 40px;
    padding-top: 18px;
    display: flex;
    gap: 0;
  }
  .sig-cell {
    flex: 1;
    padding: 0 24px;
    border-right: 1px solid #e5e5e5;
  }
  .sig-cell:first-child { padding-left: 0; }
  .sig-cell:last-child  { border-right: none; padding-right: 0; }
  .sig-lbl {
    font-size: 8px;
    text-transform: uppercase;
    letter-spacing: 2px;
    color: #aaa;
    margin-bottom: 10px;
  }
  .sig-line {
    border-bottom: 1px solid #ddd;
    height: 28px;
    margin-bottom: 5px;
  }
  .sig-hint {
    font-size: 8.5px;
    color: #bbb;
    text-align: center;
  }

  /* ── FOOTER ── */
  .footer {
    margin-top: 28px;
    border-top: 1px solid #e5e5e5;
    background: #f7faf4;
    padding: 12px 40px;
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  .footer-left {
    font-size: 8.5px;
    color: #999;
    letter-spacing: 0.3px;
  }
  .footer-chips {
    display: flex;
    gap: 8px;
  }
  .footer-chip {
    font-size: 7.5px;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    padding: 3px 10px;
    border-radius: 20px;
    background: #e5f0db;
    color: #3a6c18;
    border: 1px solid #c8dfb2;
  }
  .footer-right {
    font-size: 8.5px;
    color: #bbb;
  }

  .confidential {
    display: inline-block;
    font-size: 8px;
    letter-spacing: 2.5px;
    text-transform: uppercase;
    border: 1px solid rgba(255,255,255,0.35);
    color: rgba(255,255,255,0.45);
    padding: 4px 12px;
    border-radius: 3px;
    transform: rotate(-2deg);
    margin-left: 12px;
    vertical-align: middle;
  }
</style>
</head>
<body>

<div class=\"top-bar\"></div>

<!-- HEADER -->
<div class=\"header\">
  <div>
    <div class=\"logo-name\">NAFSEY<span>TI</span></div>
    <div class=\"logo-sub\">Bien-être psychologique</div>
  </div>
  <div class=\"header-right\">
    <div class=\"doc-label\">Fiche de consultation médicale</div>
    <div class=\"doc-id\">#FC-{{ '%04d'|format(fiche.id) }} <span class=\"confidential\">Confidentiel</span></div>
  </div>
</div>

<!-- META BAND -->
<div class=\"meta-band\">
  <div class=\"meta-cell\">
    <div class=\"meta-label\">Médecin traitant</div>
    <div class=\"meta-value\">
      {% if fiche.rendezVous and fiche.rendezVous.medecin %}
        Dr. {{ fiche.rendezVous.medecin.firstname }} {{ fiche.rendezVous.medecin.lastname }}
      {% else %}—{% endif %}
    </div>
  </div>
  <div class=\"meta-cell\">
    <div class=\"meta-label\">Date du rendez-vous</div>
    <div class=\"meta-value\">
      {% if fiche.rendezVous %}{{ fiche.rendezVous.dateRendezVous}}{% else %}—{% endif %}
    </div>
  </div>
  <div class=\"meta-cell\">
    <div class=\"meta-label\">Horaire</div>
    <div class=\"meta-value\">
      {% if fiche.rendezVous %}
        {{ fiche.rendezVous.heureDebut|date('H:i') }} – {{ fiche.rendezVous.heureFin|date('H:i') }}
      {% else %}—{% endif %}
    </div>
  </div>
  <div class=\"meta-cell\">
    <div class=\"meta-label\">Créée le</div>
    <div class=\"meta-value\">{{ fiche.createdAt|date('d/m/Y') }}</div>
    <div class=\"meta-value-small\">à {{ fiche.createdAt|date('H:i') }}</div>
  </div>
</div>

<!-- BODY -->
<div class=\"body\">

  <!-- Problème principal -->
  <div class=\"section\">
    <div class=\"section-header\">
      <div class=\"section-icon icon-symptom\">
        <svg width=\"14\" height=\"14\" viewBox=\"0 0 14 14\" fill=\"none\">
          <circle cx=\"7\" cy=\"7\" r=\"5.5\" stroke=\"#e57373\" stroke-width=\"1.4\"/>
          <path d=\"M7 4.5v3.5M7 9.5v.5\" stroke=\"#e57373\" stroke-width=\"1.4\" stroke-linecap=\"round\"/>
        </svg>
      </div>
      <div class=\"section-label label-symptom\">Problème principal</div>
      <div class=\"section-sublabel\">Motif de consultation</div>
    </div>
    <div class=\"section-content border-symptom {% if not fiche.problemePrincipal %}empty{% endif %}\">
      {{ fiche.problemePrincipal ?? 'Non renseigné' }}
    </div>
  </div>

  <!-- Diagnostic + Traitement -->
  <div class=\"two-col\">
    <div class=\"section\">
      <div class=\"section-header\">
        <div class=\"section-icon icon-diag\" style=\"font-weight:600;color:#1a52c0;font-size:10.5px;letter-spacing:0.5px;\">Dx</div>
        <div class=\"section-label label-diag\">Diagnostic</div>
        <div class=\"section-sublabel\">Évaluation clinique</div>
      </div>
      <div class=\"section-content border-diag {% if not fiche.diagnostic %}empty{% endif %}\">
        {{ fiche.diagnostic ?? 'Non renseigné' }}
      </div>
    </div>

    <div class=\"section\">
      <div class=\"section-header\">
        <div class=\"section-icon icon-rx\" style=\"font-weight:600;color:#2d5a0f;font-size:10.5px;letter-spacing:0.5px;\">Rx</div>
        <div class=\"section-label label-rx\">Traitement prescrit</div>
        <div class=\"section-sublabel\">Prescription</div>
      </div>
      <div class=\"section-content border-rx {% if not fiche.traitement %}empty{% endif %}\">
        {{ fiche.traitement ?? 'Non renseigné' }}
      </div>
    </div>
  </div>

  <!-- Recommandations -->
  <div class=\"section\">
    <div class=\"section-header\">
      <div class=\"section-icon icon-reco\">
        <svg width=\"14\" height=\"14\" viewBox=\"0 0 14 14\" fill=\"none\">
          <path d=\"M2 4h10M2 7h7M2 10h5\" stroke=\"#e6a030\" stroke-width=\"1.4\" stroke-linecap=\"round\"/>
        </svg>
      </div>
      <div class=\"section-label label-reco\">Recommandations</div>
      <div class=\"section-sublabel\">Conseils au patient</div>
    </div>
    <div class=\"section-content border-reco {% if not fiche.recommandations %}empty{% endif %}\">
      {{ fiche.recommandations ?? 'Non renseigné' }}
    </div>
  </div>

  <!-- Notes -->
  <div class=\"section\">
    <div class=\"section-header\">
      <div class=\"section-icon icon-notes\">
        <svg width=\"14\" height=\"14\" viewBox=\"0 0 14 14\" fill=\"none\">
          <rect x=\"2\" y=\"1.5\" width=\"10\" height=\"11\" rx=\"1.5\" stroke=\"#b060e0\" stroke-width=\"1.4\" fill=\"none\"/>
          <path d=\"M4.5 5h5M4.5 7.5h3.5M4.5 10h2.5\" stroke=\"#b060e0\" stroke-width=\"1.2\" stroke-linecap=\"round\"/>
        </svg>
      </div>
      <div class=\"section-label label-notes\">Notes complémentaires</div>
      <div class=\"section-sublabel\">Observations du praticien</div>
    </div>
    <div class=\"section-content border-notes {% if not fiche.notes %}empty{% endif %}\">
      {{ fiche.notes ?? 'Non renseigné' }}
    </div>
  </div>

</div>

<!-- SIGNATURES -->
<div class=\"sig-area\">
  <div class=\"sig-cell\">
    <div class=\"sig-lbl\">Signature du médecin</div>
    <div class=\"sig-line\"></div>
    <div class=\"sig-hint\">
      {% if fiche.rendezVous and fiche.rendezVous.medecin %}
        Dr. {{ fiche.rendezVous.medecin.firstname }} {{ fiche.rendezVous.medecin.lastname }}
      {% endif %}
    </div>
  </div>
  <div class=\"sig-cell\">
    <div class=\"sig-lbl\">Cachet du service</div>
    <div class=\"sig-line\"></div>
    <div class=\"sig-hint\">NAFSEYTI — Tunisie</div>
  </div>
  <div class=\"sig-cell\">
    <div class=\"sig-lbl\">Prochain rendez-vous</div>
    <div class=\"sig-line\"></div>
    <div class=\"sig-hint\">Date à définir</div>
  </div>
</div>

<!-- FOOTER -->
<div class=\"footer\">
  <div class=\"footer-left\">NAFSEYTI · Bien-être Psychologique · Tunis, Tunisie · contact@nafseyti.tn</div>
  <div class=\"footer-chips\">
    <div class=\"footer-chip\">Document officiel</div>
    <div class=\"footer-chip\">Usage médical</div>
  </div>
  <div class=\"footer-right\">Généré le {{ \"now\"|date('d/m/Y à H:i') }}</div>
</div>

</body>
</html>
", "back/fiche_pdf.html.twig", "C:\\Users\\sirine\\psy\\templates\\back\\fiche_pdf.html.twig");
    }
}
