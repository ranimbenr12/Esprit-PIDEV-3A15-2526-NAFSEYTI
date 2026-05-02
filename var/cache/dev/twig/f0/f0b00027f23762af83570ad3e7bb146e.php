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

/* home/psy_fiche_pdf.html.twig */
class __TwigTemplate_f5fe8f61fb5fec92f8744c781aac06d8 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/psy_fiche_pdf.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/psy_fiche_pdf.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
  <meta charset=\"UTF-8\">
  <title>Fiche #";
        // line 5
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 5, $this->source); })()), "id", [], "any", false, false, false, 5), "html", null, true);
        yield " — Nafseyti</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      font-family: 'DejaVu Sans', sans-serif;
      font-size: 12px;
      color: #1a1a2e;
      background: #fff;
    }

    .top-bar {
      height: 6px;
      background: #055114;
      width: 100%;
    }

    .page {
      padding: 32px 44px 40px;
    }

    .title-band {
      background: #e8f5eb;
      border-left: 5px solid #055114;
      padding: 12px 18px;
      margin-bottom: 22px;
    }

    .title-band h1 {
      font-size: 14px;
      font-weight: bold;
      color: #055114;
    }

    .title-band p {
      font-size: 9.5px;
      color: #999;
      margin-top: 3px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .section {
      margin-bottom: 13px;
      border: 1px solid #d6ead9;
    }

    .section-head {
      width: 100%;
      border-collapse: collapse;
      background: #055114;
    }

    .section-head td {
      padding: 8px 14px;
      vertical-align: middle;
    }

    .section-ico {
      width: 26px;
      font-size: 12px;
      font-weight: bold;
      color: rgba(255,255,255,0.85);
    }

    .section-lbl {
      font-size: 10px;
      font-weight: bold;
      color: #fff;
      text-transform: uppercase;
      letter-spacing: 0.8px;
    }

    .section-content {
      padding: 12px 16px;
      line-height: 1.8;
      color: #333;
      font-size: 12px;
      min-height: 34px;
      background: #fff;
    }

    .section-content.empty {
      color: #bbb;
      font-style: italic;
    }

    .badge {
      background: #055114;
      color: #fff;
      font-size: 11px;
      font-weight: bold;
      padding: 5px 13px;
    }

    .meta {
      font-size: 10px;
      color: #888;
      line-height: 1.9;
      margin-top: 7px;
    }

    .meta strong { color: #555; }

    .app-name {
      font-size: 22px;
      font-weight: bold;
      color: #055114;
      line-height: 1;
    }

    .app-name span { color: #1b9c36; }

    .app-tagline {
      font-size: 9px;
      color: #aaa;
      letter-spacing: 1.2px;
      text-transform: uppercase;
      margin-top: 4px;
    }

    .sig-notice {
      background: #fffbeb;
      border: 1px solid #fde68a;
      border-left: 4px solid #f59e0b;
      padding: 11px 14px;
      font-size: 10.5px;
      color: #78350f;
      line-height: 1.7;
    }

    .sig-label {
      font-size: 10px;
      color: #999;
      margin-bottom: 38px;
    }

    .sig-line {
      border-top: 1.5px solid #055114;
      padding-top: 7px;
      font-size: 11px;
      font-weight: bold;
      color: #055114;
    }

    .sig-sub {
      font-size: 10px;
      color: #aaa;
      margin-top: 2px;
    }

    .footer-brand {
      font-size: 13px;
      font-weight: bold;
      color: #1b9c36;
    }

    .footer-sub {
      font-size: 9px;
      color: #ccc;
      margin-top: 1px;
    }

    .bottom-bar {
      height: 5px;
      background: #055114;
      width: 100%;
      margin-top: 26px;
    }
  </style>
</head>
<body>

<div class=\"top-bar\"></div>

<div class=\"page\">

  ";
        // line 183
        yield "  <table style=\"width:100%; border-collapse:collapse; padding-bottom:18px; margin-bottom:22px; border-bottom:2px solid #d6ead9;\">
    <tr>
      <td style=\"vertical-align:middle; width:55%;\">
        <table style=\"border-collapse:collapse;\">
          <tr>
            <td style=\"vertical-align:middle; padding-right:12px;\">
              ";
        // line 190
        yield "<svg viewBox=\"0 0 50 50\" width=\"46\" height=\"46\" xmlns=\"http://www.w3.org/2000/svg\">
  <circle cx=\"25\" cy=\"25\" r=\"25\" fill=\"#055114\"/>
  <text x=\"25\" y=\"33\" font-family=\"DejaVu Sans\" font-size=\"24\"
        font-weight=\"bold\" fill=\"#ffffff\" text-anchor=\"middle\">&#936;</text>
</svg>
            </td>
            <td style=\"vertical-align:middle;\">
              <div class=\"app-name\">Nafse<span>yti</span></div>
              <div class=\"app-tagline\">Plateforme de santé mentale</div>
            </td>
          </tr>
        </table>
      </td>
      <td style=\"vertical-align:middle; text-align:right; width:45%;\">
        <div class=\"badge\">Fiche #";
        // line 204
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 204, $this->source); })()), "id", [], "any", false, false, false, 204), "html", null, true);
        yield "</div>
        <div class=\"meta\">
          <strong>Créée le :</strong> ";
        // line 206
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 206, $this->source); })()), "createdAt", [], "any", false, false, false, 206)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 206, $this->source); })()), "createdAt", [], "any", false, false, false, 206), "d/m/Y à H:i"), "html", null, true)) : ("—"));
        yield "<br>
          <strong>Exportée le :</strong> ";
        // line 207
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate("now", "d/m/Y à H:i"), "html", null, true);
        yield "
        </div>
      </td>
    </tr>
  </table>

  ";
        // line 214
        yield "  <div class=\"title-band\">
    <h1>Fiche de Consultation Psychologique</h1>
    <p>Document confidentiel — usage médical strictement réservé au professionnel</p>
  </div>

  ";
        // line 220
        yield "  <table style=\"width:100%; border-collapse:collapse; margin-bottom:20px;\">
    <tr>
      <td style=\"width:48%; vertical-align:top; background:#f6fdf7; border:1px solid #d6ead9; border-top:3px solid #055114; padding:12px 15px;\">
        <div style=\"font-size:9px; text-transform:uppercase; letter-spacing:1px; color:#055114; font-weight:bold; margin-bottom:6px;\">
          Psychologue traitant
        </div>
        <div style=\"font-size:14px; font-weight:bold; color:#1a1a2e; margin-bottom:3px;\">
          ";
        // line 227
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["psy"]) || array_key_exists("psy", $context) ? $context["psy"] : (function () { throw new RuntimeError('Variable "psy" does not exist.', 227, $this->source); })()), "firstname", [], "any", false, false, false, 227), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["psy"]) || array_key_exists("psy", $context) ? $context["psy"] : (function () { throw new RuntimeError('Variable "psy" does not exist.', 227, $this->source); })()), "lastname", [], "any", false, false, false, 227), "html", null, true);
        yield "
        </div>
        <div style=\"font-size:11px; color:#777;\">";
        // line 229
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["psy"]) || array_key_exists("psy", $context) ? $context["psy"] : (function () { throw new RuntimeError('Variable "psy" does not exist.', 229, $this->source); })()), "email", [], "any", false, false, false, 229), "html", null, true);
        yield "</div>
      </td>
      <td style=\"width:4%;\"></td>
      <td style=\"width:48%; vertical-align:top; background:#f6fdf7; border:1px solid #d6ead9; border-top:3px solid #1b9c36; padding:12px 15px;\">
        <div style=\"font-size:9px; text-transform:uppercase; letter-spacing:1px; color:#1b9c36; font-weight:bold; margin-bottom:6px;\">
          Rendez-vous associé
        </div>
        ";
        // line 236
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 236, $this->source); })()), "rendezVous", [], "any", false, false, false, 236)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 237
            yield "          <div style=\"font-size:14px; font-weight:bold; color:#1a1a2e; margin-bottom:3px;\">
            ";
            // line 238
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 238, $this->source); })()), "rendezVous", [], "any", false, false, false, 238), "dateRendezVous", [], "any", false, false, false, 238), "html", null, true);
            yield "
          </div>
          <div style=\"font-size:11px; color:#777;\">
            ";
            // line 241
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 241, $this->source); })()), "rendezVous", [], "any", false, false, false, 241), "heureDebut", [], "any", false, false, false, 241)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 241, $this->source); })()), "rendezVous", [], "any", false, false, false, 241), "heureDebut", [], "any", false, false, false, 241), "H:i"), "html", null, true)) : ("—"));
            yield "
            → ";
            // line 242
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 242, $this->source); })()), "rendezVous", [], "any", false, false, false, 242), "heureFin", [], "any", false, false, false, 242)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 242, $this->source); })()), "rendezVous", [], "any", false, false, false, 242), "heureFin", [], "any", false, false, false, 242), "H:i"), "html", null, true)) : ("—"));
            yield "
            &nbsp;·&nbsp;
            ";
            // line 244
            yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 244, $this->source); })()), "rendezVous", [], "any", false, false, false, 244), "typeSeance", [], "any", false, false, false, 244) == "en_ligne")) ? ("En ligne") : ("Présentiel"));
            yield "
          </div>
        ";
        } else {
            // line 247
            yield "          <div style=\"font-size:12px; color:#bbb; font-style:italic;\">Non renseigné</div>
        ";
        }
        // line 249
        yield "      </td>
    </tr>
  </table>

  ";
        // line 254
        yield "  <div class=\"section\">
    <table class=\"section-head\" style=\"width:100%; border-collapse:collapse;\">
      <tr>
        <td class=\"section-ico\">!</td>
        <td class=\"section-lbl\">Problème principal</td>
      </tr>
    </table>
    <div class=\"section-content ";
        // line 261
        if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 261, $this->source); })()), "problemePrincipal", [], "any", false, false, false, 261)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "empty";
        }
        yield "\">
      ";
        // line 262
        yield ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 262, $this->source); })()), "problemePrincipal", [], "any", false, false, false, 262)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 262, $this->source); })()), "problemePrincipal", [], "any", false, false, false, 262), "html", null, true)) : ("Non renseigné"));
        yield "
    </div>
  </div>

  ";
        // line 267
        yield "  <div class=\"section\">
    <table class=\"section-head\" style=\"width:100%; border-collapse:collapse;\">
      <tr>
        <td class=\"section-ico\">#</td>
        <td class=\"section-lbl\">Notes cliniques</td>
      </tr>
    </table>
    <div class=\"section-content ";
        // line 274
        if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 274, $this->source); })()), "notes", [], "any", false, false, false, 274)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "empty";
        }
        yield "\">
      ";
        // line 275
        yield ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 275, $this->source); })()), "notes", [], "any", false, false, false, 275)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 275, $this->source); })()), "notes", [], "any", false, false, false, 275), "html", null, true)) : ("Aucune note"));
        yield "
    </div>
  </div>

  ";
        // line 280
        yield "  <div class=\"section\">
    <table class=\"section-head\" style=\"width:100%; border-collapse:collapse;\">
      <tr>
        <td class=\"section-ico\">Dx</td>
        <td class=\"section-lbl\">Diagnostic</td>
      </tr>
    </table>
    <div class=\"section-content ";
        // line 287
        if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 287, $this->source); })()), "diagnostic", [], "any", false, false, false, 287)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "empty";
        }
        yield "\">
      ";
        // line 288
        yield ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 288, $this->source); })()), "diagnostic", [], "any", false, false, false, 288)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 288, $this->source); })()), "diagnostic", [], "any", false, false, false, 288), "html", null, true)) : ("Non renseigné"));
        yield "
    </div>
  </div>

  ";
        // line 293
        yield "  <div class=\"section\">
    <table class=\"section-head\" style=\"width:100%; border-collapse:collapse;\">
      <tr>
        <td class=\"section-ico\">Rx</td>
        <td class=\"section-lbl\">Traitement prescrit</td>
      </tr>
    </table>
    <div class=\"section-content ";
        // line 300
        if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 300, $this->source); })()), "traitement", [], "any", false, false, false, 300)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "empty";
        }
        yield "\">
      ";
        // line 301
        yield ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 301, $this->source); })()), "traitement", [], "any", false, false, false, 301)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 301, $this->source); })()), "traitement", [], "any", false, false, false, 301), "html", null, true)) : ("Non renseigné"));
        yield "
    </div>
  </div>

  ";
        // line 306
        yield "  <div class=\"section\">
    <table class=\"section-head\" style=\"width:100%; border-collapse:collapse;\">
      <tr>
        <td class=\"section-ico\">*</td>
        <td class=\"section-lbl\">Recommandations</td>
      </tr>
    </table>
    <div class=\"section-content ";
        // line 313
        if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 313, $this->source); })()), "recommandations", [], "any", false, false, false, 313)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            yield "empty";
        }
        yield "\">
      ";
        // line 314
        yield ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 314, $this->source); })()), "recommandations", [], "any", false, false, false, 314)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 314, $this->source); })()), "recommandations", [], "any", false, false, false, 314), "html", null, true)) : ("Aucune recommandation"));
        yield "
    </div>
  </div>

  ";
        // line 319
        yield "  <table style=\"width:100%; border-collapse:collapse; margin-top:28px;\">
    <tr>
      <td style=\"width:56%; vertical-align:bottom; padding-right:20px;\">
        <div class=\"sig-notice\">
          Ce document est généré automatiquement par la plateforme <strong>Nafseyti</strong>.<br>
          Il est strictement confidentiel et ne peut être communiqué<br>
          qu'aux personnes habilitées dans le cadre du suivi médical.
        </div>
      </td>
      <td style=\"width:44%; vertical-align:top; text-align:center;\">
        <div class=\"sig-label\">Signature du psychologue</div>
        <div class=\"sig-line\">";
        // line 330
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["psy"]) || array_key_exists("psy", $context) ? $context["psy"] : (function () { throw new RuntimeError('Variable "psy" does not exist.', 330, $this->source); })()), "firstname", [], "any", false, false, false, 330), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["psy"]) || array_key_exists("psy", $context) ? $context["psy"] : (function () { throw new RuntimeError('Variable "psy" does not exist.', 330, $this->source); })()), "lastname", [], "any", false, false, false, 330), "html", null, true);
        yield "</div>
        <div class=\"sig-sub\">Psychologue certifié — Nafseyti</div>
      </td>
    </tr>
  </table>

  ";
        // line 337
        yield "  <table style=\"width:100%; border-collapse:collapse; margin-top:26px; border-top:1.5px solid #d6ead9;\">
    <tr>
      <td style=\"vertical-align:middle; padding-top:10px;\">
        <div class=\"footer-brand\">Nafseyti</div>
        <div class=\"footer-sub\">Plateforme de santé mentale</div>
      </td>
      <td style=\"vertical-align:middle; text-align:right; font-size:9.5px; color:#bbb; line-height:1.8; padding-top:10px;\">
        Fiche #";
        // line 344
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 344, $this->source); })()), "id", [], "any", false, false, false, 344), "html", null, true);
        yield " &nbsp;|&nbsp;
        ";
        // line 345
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 345, $this->source); })()), "createdAt", [], "any", false, false, false, 345)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["fiche"]) || array_key_exists("fiche", $context) ? $context["fiche"] : (function () { throw new RuntimeError('Variable "fiche" does not exist.', 345, $this->source); })()), "createdAt", [], "any", false, false, false, 345), "d/m/Y"), "html", null, true)) : ("—"));
        yield " &nbsp;|&nbsp;
        Document confidentiel — Ne pas diffuser
      </td>
    </tr>
  </table>

</div>

<div class=\"bottom-bar\"></div>

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
        return "home/psy_fiche_pdf.html.twig";
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
        return array (  492 => 345,  488 => 344,  479 => 337,  468 => 330,  455 => 319,  448 => 314,  442 => 313,  433 => 306,  426 => 301,  420 => 300,  411 => 293,  404 => 288,  398 => 287,  389 => 280,  382 => 275,  376 => 274,  367 => 267,  360 => 262,  354 => 261,  345 => 254,  339 => 249,  335 => 247,  329 => 244,  324 => 242,  320 => 241,  314 => 238,  311 => 237,  309 => 236,  299 => 229,  292 => 227,  283 => 220,  276 => 214,  267 => 207,  263 => 206,  258 => 204,  242 => 190,  234 => 183,  54 => 5,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
  <meta charset=\"UTF-8\">
  <title>Fiche #{{ fiche.id }} — Nafseyti</title>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      font-family: 'DejaVu Sans', sans-serif;
      font-size: 12px;
      color: #1a1a2e;
      background: #fff;
    }

    .top-bar {
      height: 6px;
      background: #055114;
      width: 100%;
    }

    .page {
      padding: 32px 44px 40px;
    }

    .title-band {
      background: #e8f5eb;
      border-left: 5px solid #055114;
      padding: 12px 18px;
      margin-bottom: 22px;
    }

    .title-band h1 {
      font-size: 14px;
      font-weight: bold;
      color: #055114;
    }

    .title-band p {
      font-size: 9.5px;
      color: #999;
      margin-top: 3px;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }

    .section {
      margin-bottom: 13px;
      border: 1px solid #d6ead9;
    }

    .section-head {
      width: 100%;
      border-collapse: collapse;
      background: #055114;
    }

    .section-head td {
      padding: 8px 14px;
      vertical-align: middle;
    }

    .section-ico {
      width: 26px;
      font-size: 12px;
      font-weight: bold;
      color: rgba(255,255,255,0.85);
    }

    .section-lbl {
      font-size: 10px;
      font-weight: bold;
      color: #fff;
      text-transform: uppercase;
      letter-spacing: 0.8px;
    }

    .section-content {
      padding: 12px 16px;
      line-height: 1.8;
      color: #333;
      font-size: 12px;
      min-height: 34px;
      background: #fff;
    }

    .section-content.empty {
      color: #bbb;
      font-style: italic;
    }

    .badge {
      background: #055114;
      color: #fff;
      font-size: 11px;
      font-weight: bold;
      padding: 5px 13px;
    }

    .meta {
      font-size: 10px;
      color: #888;
      line-height: 1.9;
      margin-top: 7px;
    }

    .meta strong { color: #555; }

    .app-name {
      font-size: 22px;
      font-weight: bold;
      color: #055114;
      line-height: 1;
    }

    .app-name span { color: #1b9c36; }

    .app-tagline {
      font-size: 9px;
      color: #aaa;
      letter-spacing: 1.2px;
      text-transform: uppercase;
      margin-top: 4px;
    }

    .sig-notice {
      background: #fffbeb;
      border: 1px solid #fde68a;
      border-left: 4px solid #f59e0b;
      padding: 11px 14px;
      font-size: 10.5px;
      color: #78350f;
      line-height: 1.7;
    }

    .sig-label {
      font-size: 10px;
      color: #999;
      margin-bottom: 38px;
    }

    .sig-line {
      border-top: 1.5px solid #055114;
      padding-top: 7px;
      font-size: 11px;
      font-weight: bold;
      color: #055114;
    }

    .sig-sub {
      font-size: 10px;
      color: #aaa;
      margin-top: 2px;
    }

    .footer-brand {
      font-size: 13px;
      font-weight: bold;
      color: #1b9c36;
    }

    .footer-sub {
      font-size: 9px;
      color: #ccc;
      margin-top: 1px;
    }

    .bottom-bar {
      height: 5px;
      background: #055114;
      width: 100%;
      margin-top: 26px;
    }
  </style>
</head>
<body>

<div class=\"top-bar\"></div>

<div class=\"page\">

  {# ══ HEADER ══ #}
  <table style=\"width:100%; border-collapse:collapse; padding-bottom:18px; margin-bottom:22px; border-bottom:2px solid #d6ead9;\">
    <tr>
      <td style=\"vertical-align:middle; width:55%;\">
        <table style=\"border-collapse:collapse;\">
          <tr>
            <td style=\"vertical-align:middle; padding-right:12px;\">
              {# ✅ SVG direct, pas de variable #}
<svg viewBox=\"0 0 50 50\" width=\"46\" height=\"46\" xmlns=\"http://www.w3.org/2000/svg\">
  <circle cx=\"25\" cy=\"25\" r=\"25\" fill=\"#055114\"/>
  <text x=\"25\" y=\"33\" font-family=\"DejaVu Sans\" font-size=\"24\"
        font-weight=\"bold\" fill=\"#ffffff\" text-anchor=\"middle\">&#936;</text>
</svg>
            </td>
            <td style=\"vertical-align:middle;\">
              <div class=\"app-name\">Nafse<span>yti</span></div>
              <div class=\"app-tagline\">Plateforme de santé mentale</div>
            </td>
          </tr>
        </table>
      </td>
      <td style=\"vertical-align:middle; text-align:right; width:45%;\">
        <div class=\"badge\">Fiche #{{ fiche.id }}</div>
        <div class=\"meta\">
          <strong>Créée le :</strong> {{ fiche.createdAt ? fiche.createdAt|date('d/m/Y à H:i') : '—' }}<br>
          <strong>Exportée le :</strong> {{ \"now\"|date('d/m/Y à H:i') }}
        </div>
      </td>
    </tr>
  </table>

  {# ══ TITRE ══ #}
  <div class=\"title-band\">
    <h1>Fiche de Consultation Psychologique</h1>
    <p>Document confidentiel — usage médical strictement réservé au professionnel</p>
  </div>

  {# ══ PSYCHOLOGUE / RDV ══ #}
  <table style=\"width:100%; border-collapse:collapse; margin-bottom:20px;\">
    <tr>
      <td style=\"width:48%; vertical-align:top; background:#f6fdf7; border:1px solid #d6ead9; border-top:3px solid #055114; padding:12px 15px;\">
        <div style=\"font-size:9px; text-transform:uppercase; letter-spacing:1px; color:#055114; font-weight:bold; margin-bottom:6px;\">
          Psychologue traitant
        </div>
        <div style=\"font-size:14px; font-weight:bold; color:#1a1a2e; margin-bottom:3px;\">
          {{ psy.firstname }} {{ psy.lastname }}
        </div>
        <div style=\"font-size:11px; color:#777;\">{{ psy.email }}</div>
      </td>
      <td style=\"width:4%;\"></td>
      <td style=\"width:48%; vertical-align:top; background:#f6fdf7; border:1px solid #d6ead9; border-top:3px solid #1b9c36; padding:12px 15px;\">
        <div style=\"font-size:9px; text-transform:uppercase; letter-spacing:1px; color:#1b9c36; font-weight:bold; margin-bottom:6px;\">
          Rendez-vous associé
        </div>
        {% if fiche.rendezVous %}
          <div style=\"font-size:14px; font-weight:bold; color:#1a1a2e; margin-bottom:3px;\">
            {{ fiche.rendezVous.dateRendezVous }}
          </div>
          <div style=\"font-size:11px; color:#777;\">
            {{ fiche.rendezVous.heureDebut ? fiche.rendezVous.heureDebut|date('H:i') : '—' }}
            → {{ fiche.rendezVous.heureFin ? fiche.rendezVous.heureFin|date('H:i') : '—' }}
            &nbsp;·&nbsp;
            {{ fiche.rendezVous.typeSeance == 'en_ligne' ? 'En ligne' : 'Présentiel' }}
          </div>
        {% else %}
          <div style=\"font-size:12px; color:#bbb; font-style:italic;\">Non renseigné</div>
        {% endif %}
      </td>
    </tr>
  </table>

  {# ══ 1. PROBLÈME PRINCIPAL ══ #}
  <div class=\"section\">
    <table class=\"section-head\" style=\"width:100%; border-collapse:collapse;\">
      <tr>
        <td class=\"section-ico\">!</td>
        <td class=\"section-lbl\">Problème principal</td>
      </tr>
    </table>
    <div class=\"section-content {% if not fiche.problemePrincipal %}empty{% endif %}\">
      {{ fiche.problemePrincipal ?: 'Non renseigné' }}
    </div>
  </div>

  {# ══ 2. NOTES CLINIQUES ══ #}
  <div class=\"section\">
    <table class=\"section-head\" style=\"width:100%; border-collapse:collapse;\">
      <tr>
        <td class=\"section-ico\">#</td>
        <td class=\"section-lbl\">Notes cliniques</td>
      </tr>
    </table>
    <div class=\"section-content {% if not fiche.notes %}empty{% endif %}\">
      {{ fiche.notes ?: 'Aucune note' }}
    </div>
  </div>

  {# ══ 3. DIAGNOSTIC ══ #}
  <div class=\"section\">
    <table class=\"section-head\" style=\"width:100%; border-collapse:collapse;\">
      <tr>
        <td class=\"section-ico\">Dx</td>
        <td class=\"section-lbl\">Diagnostic</td>
      </tr>
    </table>
    <div class=\"section-content {% if not fiche.diagnostic %}empty{% endif %}\">
      {{ fiche.diagnostic ?: 'Non renseigné' }}
    </div>
  </div>

  {# ══ 4. TRAITEMENT ══ #}
  <div class=\"section\">
    <table class=\"section-head\" style=\"width:100%; border-collapse:collapse;\">
      <tr>
        <td class=\"section-ico\">Rx</td>
        <td class=\"section-lbl\">Traitement prescrit</td>
      </tr>
    </table>
    <div class=\"section-content {% if not fiche.traitement %}empty{% endif %}\">
      {{ fiche.traitement ?: 'Non renseigné' }}
    </div>
  </div>

  {# ══ 5. RECOMMANDATIONS ══ #}
  <div class=\"section\">
    <table class=\"section-head\" style=\"width:100%; border-collapse:collapse;\">
      <tr>
        <td class=\"section-ico\">*</td>
        <td class=\"section-lbl\">Recommandations</td>
      </tr>
    </table>
    <div class=\"section-content {% if not fiche.recommandations %}empty{% endif %}\">
      {{ fiche.recommandations ?: 'Aucune recommandation' }}
    </div>
  </div>

  {# ══ SIGNATURE ══ #}
  <table style=\"width:100%; border-collapse:collapse; margin-top:28px;\">
    <tr>
      <td style=\"width:56%; vertical-align:bottom; padding-right:20px;\">
        <div class=\"sig-notice\">
          Ce document est généré automatiquement par la plateforme <strong>Nafseyti</strong>.<br>
          Il est strictement confidentiel et ne peut être communiqué<br>
          qu'aux personnes habilitées dans le cadre du suivi médical.
        </div>
      </td>
      <td style=\"width:44%; vertical-align:top; text-align:center;\">
        <div class=\"sig-label\">Signature du psychologue</div>
        <div class=\"sig-line\">{{ psy.firstname }} {{ psy.lastname }}</div>
        <div class=\"sig-sub\">Psychologue certifié — Nafseyti</div>
      </td>
    </tr>
  </table>

  {# ══ FOOTER ══ #}
  <table style=\"width:100%; border-collapse:collapse; margin-top:26px; border-top:1.5px solid #d6ead9;\">
    <tr>
      <td style=\"vertical-align:middle; padding-top:10px;\">
        <div class=\"footer-brand\">Nafseyti</div>
        <div class=\"footer-sub\">Plateforme de santé mentale</div>
      </td>
      <td style=\"vertical-align:middle; text-align:right; font-size:9.5px; color:#bbb; line-height:1.8; padding-top:10px;\">
        Fiche #{{ fiche.id }} &nbsp;|&nbsp;
        {{ fiche.createdAt ? fiche.createdAt|date('d/m/Y') : '—' }} &nbsp;|&nbsp;
        Document confidentiel — Ne pas diffuser
      </td>
    </tr>
  </table>

</div>

<div class=\"bottom-bar\"></div>

</body>
</html>", "home/psy_fiche_pdf.html.twig", "C:\\Users\\sirine\\psy\\templates\\home\\psy_fiche_pdf.html.twig");
    }
}
