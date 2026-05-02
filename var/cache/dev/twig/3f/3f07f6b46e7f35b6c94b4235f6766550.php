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

/* home/psy_dashboard.html.twig */
class __TwigTemplate_2df7bcf6dcbd3775ec843b696dfeb3ff extends Template
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
            'stylesheets' => [$this, 'block_stylesheets'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/psy_dashboard.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/psy_dashboard.html.twig"));

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

        yield "NAFSEYTI — Espace Psychologue";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 6
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 7
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
<link rel=\"stylesheet\" href=\"";
        // line 8
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/psy_dashboard.css"), "html", null, true);
        yield "\">
<link rel=\"stylesheet\" href=\"";
        // line 9
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/psy_ia_analyse.css"), "html", null, true);
        yield "\">
<script src=\"";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/psy_ia_analyse.js"), "html", null, true);
        yield "\" defer></script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 13
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

        // line 14
        yield "<div class=\"psy-layout\">

  ";
        // line 17
        yield "  <aside class=\"psy-sidebar\">

    ";
        // line 20
        yield "    <div class=\"sb-hero\">
      <svg class=\"sb-hero-svg\" viewBox=\"0 0 268 200\" xmlns=\"http://www.w3.org/2000/svg\" preserveAspectRatio=\"xMidYMid slice\">
        <!-- Ambient circles -->
        <circle cx=\"230\" cy=\"30\"  r=\"70\" fill=\"rgba(122,158,118,0.10)\"/>
        <circle cx=\"20\"  cy=\"170\" r=\"55\" fill=\"rgba(200,169,110,0.08)\"/>
        <circle cx=\"134\" cy=\"-5\"  r=\"70\" fill=\"rgba(255,255,255,0.03)\"/>
        <!-- Mandala psychologie -->
        <g transform=\"translate(134,88)\" opacity=\"0.65\">
          <ellipse cx=\"0\" cy=\"-38\" rx=\"7\" ry=\"15\" fill=\"none\" stroke=\"rgba(200,220,196,0.55)\" stroke-width=\"1\"   transform=\"rotate(0)\"/>
          <ellipse cx=\"0\" cy=\"-38\" rx=\"7\" ry=\"15\" fill=\"none\" stroke=\"rgba(200,220,196,0.45)\" stroke-width=\"1\"   transform=\"rotate(45)\"/>
          <ellipse cx=\"0\" cy=\"-38\" rx=\"7\" ry=\"15\" fill=\"none\" stroke=\"rgba(200,220,196,0.45)\" stroke-width=\"1\"   transform=\"rotate(90)\"/>
          <ellipse cx=\"0\" cy=\"-38\" rx=\"7\" ry=\"15\" fill=\"none\" stroke=\"rgba(200,220,196,0.35)\" stroke-width=\"1\"   transform=\"rotate(135)\"/>
          <ellipse cx=\"0\" cy=\"-38\" rx=\"7\" ry=\"15\" fill=\"none\" stroke=\"rgba(200,220,196,0.35)\" stroke-width=\"1\"   transform=\"rotate(180)\"/>
          <ellipse cx=\"0\" cy=\"-38\" rx=\"7\" ry=\"15\" fill=\"none\" stroke=\"rgba(200,220,196,0.35)\" stroke-width=\"1\"   transform=\"rotate(225)\"/>
          <ellipse cx=\"0\" cy=\"-38\" rx=\"7\" ry=\"15\" fill=\"none\" stroke=\"rgba(200,220,196,0.30)\" stroke-width=\"1\"   transform=\"rotate(270)\"/>
          <ellipse cx=\"0\" cy=\"-38\" rx=\"7\" ry=\"15\" fill=\"none\" stroke=\"rgba(200,220,196,0.30)\" stroke-width=\"1\"   transform=\"rotate(315)\"/>
          <circle cx=\"0\" cy=\"0\" r=\"16\" fill=\"none\" stroke=\"rgba(200,220,196,0.40)\" stroke-width=\"1\"/>
          <circle cx=\"0\" cy=\"0\" r=\"8\"  fill=\"rgba(200,220,196,0.12)\" stroke=\"rgba(200,220,196,0.50)\" stroke-width=\"0.8\"/>
          <circle cx=\"0\"  cy=\"-26\" r=\"2.2\" fill=\"rgba(200,169,110,0.70)\"/>
          <circle cx=\"26\" cy=\"0\"   r=\"1.8\" fill=\"rgba(200,169,110,0.50)\"/>
          <circle cx=\"-26\" cy=\"0\"  r=\"1.8\" fill=\"rgba(200,169,110,0.50)\"/>
          <circle cx=\"0\"  cy=\"26\"  r=\"2.2\" fill=\"rgba(200,169,110,0.70)\"/>
          <circle cx=\"18\" cy=\"-18\" r=\"1.2\" fill=\"rgba(200,220,196,0.50)\"/>
          <circle cx=\"-18\" cy=\"-18\" r=\"1.2\" fill=\"rgba(200,220,196,0.50)\"/>
          <circle cx=\"18\" cy=\"18\"  r=\"1.2\" fill=\"rgba(200,220,196,0.50)\"/>
          <circle cx=\"-18\" cy=\"18\" r=\"1.2\" fill=\"rgba(200,220,196,0.50)\"/>
        </g>
        <!-- Floating particles -->
        <circle cx=\"40\"  cy=\"35\"  r=\"2\"   fill=\"rgba(200,220,196,0.40)\"/>
        <circle cx=\"210\" cy=\"140\" r=\"1.5\" fill=\"rgba(200,169,110,0.55)\"/>
        <circle cx=\"50\"  cy=\"130\" r=\"1\"   fill=\"rgba(200,220,196,0.30)\"/>
        <circle cx=\"225\" cy=\"55\"  r=\"2.5\" fill=\"rgba(200,220,196,0.20)\"/>
        <circle cx=\"15\"  cy=\"60\"  r=\"1.2\" fill=\"rgba(200,169,110,0.30)\"/>
        <circle cx=\"255\" cy=\"95\"  r=\"1.8\" fill=\"rgba(200,220,196,0.25)\"/>
      </svg>
      <div class=\"sb-profile\">
        <div class=\"sb-avatar-ring\">
          <div class=\"sb-avatar-inner\">
            ";
        // line 58
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 58, $this->source); })()), "user", [], "any", false, false, false, 58)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 58, $this->source); })()), "user", [], "any", false, false, false, 58), "firstname", [], "any", false, false, false, 58)) . Twig\Extension\CoreExtension::first($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 58, $this->source); })()), "user", [], "any", false, false, false, 58), "lastname", [], "any", false, false, false, 58))), "html", null, true)) : ("PS"));
        yield "
            <span class=\"sb-status-dot\"></span>
          </div>
        </div>
        <div class=\"sb-name\">";
        // line 62
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 62, $this->source); })()), "user", [], "any", false, false, false, 62)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 62, $this->source); })()), "user", [], "any", false, false, false, 62), "firstname", [], "any", false, false, false, 62) . " ") . CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 62, $this->source); })()), "user", [], "any", false, false, false, 62), "lastname", [], "any", false, false, false, 62)), "html", null, true)) : ("Docteur"));
        yield "</div>
        <div class=\"sb-spec\">Psychologue Clinicien</div>
      </div>
    </div>

    ";
        // line 68
        yield "    <div class=\"sb-section\">
      <div class=\"sb-section-title\">✦ Citation du jour</div>
      <div class=\"sb-quote-card\">
        <div class=\"sb-quote-text\" id=\"quoteText\">La guérison est un retour à soi-même, pas une fuite de la douleur.</div>
        <div class=\"sb-quote-author\" id=\"quoteAuthor\">Carl Rogers</div>
        <div class=\"sb-quote-nav\" id=\"quoteNav\"></div>
      </div>
    </div>

    ";
        // line 78
        yield "    <div class=\"sb-section\">
      <div class=\"sb-section-title\">◈ État du cabinet</div>
      <div class=\"sb-mood-grid\">
        <div class=\"sb-mood-chip active\" onclick=\"setMood(this)\">
          <span class=\"sb-mood-icon\">🌿</span>
          <span class=\"sb-mood-label\">Serein</span>
        </div>
        <div class=\"sb-mood-chip\" onclick=\"setMood(this)\">
          <span class=\"sb-mood-icon\">⚡</span>
          <span class=\"sb-mood-label\">Actif</span>
        </div>
        <div class=\"sb-mood-chip\" onclick=\"setMood(this)\">
          <span class=\"sb-mood-icon\">🤝</span>
          <span class=\"sb-mood-label\">Écoute</span>
        </div>
        <div class=\"sb-mood-chip\" onclick=\"setMood(this)\">
          <span class=\"sb-mood-icon\">🌙</span>
          <span class=\"sb-mood-label\">Calme</span>
        </div>
      </div>
    </div>

    ";
        // line 101
        yield "    <div class=\"sb-section\">
      <div class=\"sb-section-title\">◎ Prochain rendez-vous</div>
      ";
        // line 103
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["myReservations"]) || array_key_exists("myReservations", $context) ? $context["myReservations"] : (function () { throw new RuntimeError('Variable "myReservations" does not exist.', 103, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 104
            yield "        ";
            $context["nextRes"] = Twig\Extension\CoreExtension::first($this->env->getCharset(), (isset($context["myReservations"]) || array_key_exists("myReservations", $context) ? $context["myReservations"] : (function () { throw new RuntimeError('Variable "myReservations" does not exist.', 104, $this->source); })()));
            // line 105
            yield "        ";
            $context["nextRdv"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["nextRes"]) || array_key_exists("nextRes", $context) ? $context["nextRes"] : (function () { throw new RuntimeError('Variable "nextRes" does not exist.', 105, $this->source); })()), "rendezVous", [], "any", false, false, false, 105);
            // line 106
            yield "        <div class=\"sb-next-rdv\">
          <div class=\"sb-next-tag\">Prochain</div>
          <div class=\"sb-next-time\">";
            // line 108
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["nextRdv"]) || array_key_exists("nextRdv", $context) ? $context["nextRdv"] : (function () { throw new RuntimeError('Variable "nextRdv" does not exist.', 108, $this->source); })()), "heureDebut", [], "any", false, false, false, 108), "H:i"), "html", null, true);
            yield "</div>
          <div class=\"sb-next-name\">";
            // line 109
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["nextRes"]) || array_key_exists("nextRes", $context) ? $context["nextRes"] : (function () { throw new RuntimeError('Variable "nextRes" does not exist.', 109, $this->source); })()), "user", [], "any", false, false, false, 109), "firstname", [], "any", false, false, false, 109), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["nextRes"]) || array_key_exists("nextRes", $context) ? $context["nextRes"] : (function () { throw new RuntimeError('Variable "nextRes" does not exist.', 109, $this->source); })()), "user", [], "any", false, false, false, 109), "lastname", [], "any", false, false, false, 109), "html", null, true);
            yield "</div>
          <div class=\"sb-next-type\">
            <svg width=\"10\" height=\"10\" viewBox=\"0 0 12 12\" fill=\"none\">
              <circle cx=\"6\" cy=\"4\" r=\"3\" stroke=\"#c8dcc4\" stroke-width=\"1.2\"/>
              <path d=\"M2 11c0-2.2 1.8-4 4-4s4 1.8 4 4\" stroke=\"#c8dcc4\" stroke-width=\"1.2\"/>
            </svg>
            ";
            // line 115
            yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["nextRdv"]) || array_key_exists("nextRdv", $context) ? $context["nextRdv"] : (function () { throw new RuntimeError('Variable "nextRdv" does not exist.', 115, $this->source); })()), "typeSeance", [], "any", false, false, false, 115) == "en_ligne")) ? ("En ligne") : ("Présentiel"));
            yield " · ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["nextRdv"]) || array_key_exists("nextRdv", $context) ? $context["nextRdv"] : (function () { throw new RuntimeError('Variable "nextRdv" does not exist.', 115, $this->source); })()), "dateRendezVous", [], "any", false, false, false, 115), "html", null, true);
            yield "
          </div>
        </div>
      ";
        } else {
            // line 119
            yield "        <div class=\"sb-no-rdv\">Aucun rendez-vous à venir</div>
      ";
        }
        // line 121
        yield "    </div>

    ";
        // line 124
        yield "    <div class=\"sb-section\">
      <div class=\"sb-section-title\">❋ Présence & bien-être</div>
      <div class=\"sb-plant-wrap\">
        <svg width=\"150\" height=\"115\" viewBox=\"0 0 150 115\" xmlns=\"http://www.w3.org/2000/svg\">
          <!-- Pot -->
          <path d=\"M55 88 L60 108 Q75 114 90 108 L95 88Z\" fill=\"#8a9e86\" opacity=\"0.55\"/>
          <ellipse cx=\"75\" cy=\"89\" rx=\"20\" ry=\"5\" fill=\"#7a9e76\" opacity=\"0.65\"/>
          <!-- Terre -->
          <ellipse cx=\"75\" cy=\"87\" rx=\"18\" ry=\"4\" fill=\"#4a6741\" opacity=\"0.4\"/>
          <!-- Tige -->
          <path d=\"M75 88 C75 75 73 60 70 46\" stroke=\"#4a6741\" stroke-width=\"2.5\" fill=\"none\" stroke-linecap=\"round\"/>
          <!-- Feuilles gauche -->
          <path d=\"M73 77 C62 68 50 63 47 53 C53 58 63 62 71 70\" fill=\"#4a6741\" opacity=\"0.75\"/>
          <path d=\"M72 62 C59 51 47 43 44 33 C51 40 62 46 70 57\" fill=\"#7a9e76\" opacity=\"0.65\"/>
          <!-- Feuilles droite -->
          <path d=\"M71 72 C81 63 93 58 96 48 C90 53 80 57 72 65\" fill=\"#4a6741\" opacity=\"0.70\"/>
          <path d=\"M70 57 C81 47 92 40 95 30 C89 36 78 42 70 52\" fill=\"#7a9e76\" opacity=\"0.60\"/>
          <!-- Fleur -->
          <circle cx=\"70\" cy=\"46\" r=\"5\"   fill=\"#c8a96e\" opacity=\"0.90\"/>
          <circle cx=\"70\" cy=\"46\" r=\"3\"   fill=\"#f5eedf\"/>
          <circle cx=\"70\" cy=\"46\" r=\"1.5\" fill=\"#c8a96e\"/>
          <!-- Petites feuilles accent -->
          <path d=\"M71 53 C66 48 60 46 58 40 C62 44 67 46 70 51\" fill=\"#7a9e76\" opacity=\"0.50\"/>
          <!-- Petites étincelles -->
          <circle cx=\"50\" cy=\"42\" r=\"1.5\" fill=\"#c8a96e\" opacity=\"0.45\"/>
          <circle cx=\"98\" cy=\"47\" r=\"1\"   fill=\"#c8dcc4\" opacity=\"0.55\"/>
          <circle cx=\"92\" cy=\"33\" r=\"1.5\" fill=\"#c8a96e\" opacity=\"0.40\"/>
          <circle cx=\"47\" cy=\"28\" r=\"1\"   fill=\"#c8dcc4\" opacity=\"0.40\"/>
        </svg>
      </div>
      <div class=\"sb-wellness-list\">
        <div class=\"sb-wellness-item\">
          <div class=\"sb-wellness-label\">Énergie</div>
          <div class=\"sb-wellness-bar-wrap\">
            <div class=\"sb-wellness-fill\" style=\"width:78%;background:linear-gradient(90deg,#4a6741,#7a9e76)\"></div>
          </div>
          <div class=\"sb-wellness-pct\">78%</div>
        </div>
        <div class=\"sb-wellness-item\">
          <div class=\"sb-wellness-label\">Concentration</div>
          <div class=\"sb-wellness-bar-wrap\">
            <div class=\"sb-wellness-fill\" style=\"width:85%;background:linear-gradient(90deg,#c8a96e,#e8c882)\"></div>
          </div>
          <div class=\"sb-wellness-pct\">85%</div>
        </div>
        <div class=\"sb-wellness-item\">
          <div class=\"sb-wellness-label\">Sérénité</div>
          <div class=\"sb-wellness-bar-wrap\">
            <div class=\"sb-wellness-fill\" style=\"width:92%;background:linear-gradient(90deg,#b8a9c9,#c8d0e8)\"></div>
          </div>
          <div class=\"sb-wellness-pct\">92%</div>
        </div>
      </div>
    </div>

    ";
        // line 180
        yield "    <div class=\"sb-section\">
      <div class=\"sb-section-title\">◉ Cette semaine</div>
      <div class=\"sb-mini-stats\">
        <div class=\"sb-mini-stat\">
          <span class=\"sb-mini-stat-icon\">📅</span>
          <div class=\"sb-mini-stat-val\">";
        // line 185
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["mySlots"]) || array_key_exists("mySlots", $context) ? $context["mySlots"] : (function () { throw new RuntimeError('Variable "mySlots" does not exist.', 185, $this->source); })())), "html", null, true);
        yield "</div>
          <div class=\"sb-mini-stat-label\">Créneaux</div>
        </div>
        <div class=\"sb-mini-stat\">
          <span class=\"sb-mini-stat-icon\">👥</span>
          <div class=\"sb-mini-stat-val\">";
        // line 190
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["myReservations"]) || array_key_exists("myReservations", $context) ? $context["myReservations"] : (function () { throw new RuntimeError('Variable "myReservations" does not exist.', 190, $this->source); })())), "html", null, true);
        yield "</div>
          <div class=\"sb-mini-stat-label\">RDV reçus</div>
        </div>
        <div class=\"sb-mini-stat\">
          <span class=\"sb-mini-stat-icon\">📋</span>
          <div class=\"sb-mini-stat-val\">";
        // line 195
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["myFiches"]) || array_key_exists("myFiches", $context) ? $context["myFiches"] : (function () { throw new RuntimeError('Variable "myFiches" does not exist.', 195, $this->source); })())), "html", null, true);
        yield "</div>
          <div class=\"sb-mini-stat-label\">Fiches</div>
        </div>
        <div class=\"sb-mini-stat\">
          <span class=\"sb-mini-stat-icon\">⏳</span>
          <div class=\"sb-mini-stat-val\">";
        // line 200
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["myReservations"]) || array_key_exists("myReservations", $context) ? $context["myReservations"] : (function () { throw new RuntimeError('Variable "myReservations" does not exist.', 200, $this->source); })())), "html", null, true);
        yield "</div>
          <div class=\"sb-mini-stat-label\">En attente</div>
        </div>
      </div>
    </div>

    ";
        // line 207
        yield "    <div class=\"sb-section\">
      <div class=\"sb-section-title\">⊕ Outils rapides</div>
      <div class=\"sb-tools-grid\">
        <div class=\"sb-tool-card\" title=\"Minuterie de méditation\" onclick=\"alert('Minuterie — À intégrer')\">
          <svg class=\"sb-tool-icon\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\">
            <circle cx=\"12\" cy=\"13\" r=\"8\" stroke=\"#4a6741\" stroke-width=\"1.5\"/>
            <path d=\"M12 9v4l3 2\" stroke=\"#4a6741\" stroke-width=\"1.5\" stroke-linecap=\"round\"/>
            <path d=\"M9 2h6M12 2v3\" stroke=\"#4a6741\" stroke-width=\"1.5\" stroke-linecap=\"round\"/>
          </svg>
          <div class=\"sb-tool-name\">Minuterie</div>
          <div class=\"sb-tool-sub\">Méditation</div>
        </div>
        <div class=\"sb-tool-card\" title=\"Exercices de respiration\" onclick=\"alert('Respiration — À intégrer')\">
          <svg class=\"sb-tool-icon\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\">
            <path d=\"M12 3C8 3 5 6 5 10c0 5 7 11 7 11s7-6 7-11c0-4-3-7-7-7z\" stroke=\"#c8a96e\" stroke-width=\"1.5\"/>
            <circle cx=\"12\" cy=\"10\" r=\"2.5\" stroke=\"#c8a96e\" stroke-width=\"1.2\"/>
          </svg>
          <div class=\"sb-tool-name\">Respiration</div>
          <div class=\"sb-tool-sub\">4 – 7 – 8</div>
        </div>
        <div class=\"sb-tool-card\" title=\"Grilles d'évaluation\" onclick=\"alert('Évaluation — À intégrer')\">
          <svg class=\"sb-tool-icon\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\">
            <rect x=\"4\" y=\"4\" width=\"16\" height=\"16\" rx=\"3\" stroke=\"#b8a9c9\" stroke-width=\"1.5\"/>
            <path d=\"M8 12l3 3 5-6\" stroke=\"#b8a9c9\" stroke-width=\"1.5\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>
          </svg>
          <div class=\"sb-tool-name\">Évaluation</div>
          <div class=\"sb-tool-sub\">PHQ-9, GAD</div>
        </div>
        <div class=\"sb-tool-card\" title=\"Notes rapides\" onclick=\"alert('Notes — À intégrer')\">
          <svg class=\"sb-tool-icon\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\">
            <path d=\"M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8l-6-6z\" stroke=\"#7a9e76\" stroke-width=\"1.5\"/>
            <path d=\"M14 2v6h6M8 13h8M8 17h5\" stroke=\"#7a9e76\" stroke-width=\"1.4\" stroke-linecap=\"round\"/>
          </svg>
          <div class=\"sb-tool-name\">Notes</div>
          <div class=\"sb-tool-sub\">Rapides</div>
        </div>
      </div>
    </div>

    ";
        // line 247
        yield "    <div class=\"sb-footer\">
      <svg width=\"30\" height=\"30\" viewBox=\"0 0 30 30\" fill=\"none\">
        <circle cx=\"15\" cy=\"15\" r=\"13.5\" stroke=\"#4a6741\" stroke-width=\"1\"/>
        <path d=\"M15 5C10.6 5 7 8.6 7 13c0 5.5 8 13 8 13s8-7.5 8-13c0-4.4-3.6-8-8-8z\" fill=\"#eef4ed\" stroke=\"#4a6741\" stroke-width=\"1\"/>
        <circle cx=\"15\" cy=\"13\" r=\"3\" fill=\"#4a6741\" opacity=\"0.45\"/>
      </svg>
      <div>
        <div class=\"sb-footer-brand\">NAFSEYTI</div>
        <div class=\"sb-footer-tagline\">Soin · Écoute · Présence</div>
      </div>
    </div>

  </aside>

  ";
        // line 262
        yield "  <div class=\"psy-content-area\">

    ";
        // line 265
        yield "<div class=\"psy-topbar\">
  <div class=\"topbar-left\">
    <div class=\"topbar-title\">
      <h1 id=\"topbarTitle\">Vue d'ensemble</h1>
      <p id=\"topbarSub\">Bonjour, bienvenue dans votre espace</p>
    </div>
  </div>

  <div class=\"topbar-right\">
    <div class=\"notif-wrap\" id=\"notifWrap\">

      ";
        // line 277
        yield "      <button class=\"notif-bell-btn\" onclick=\"toggleNotifPanel()\">
        <i class=\"fas fa-bell\"></i>
        <span class=\"notif-badge\" id=\"notifBadge\"
              style=\"";
        // line 280
        yield (((array_key_exists("notifCount", $context) && ((isset($context["notifCount"]) || array_key_exists("notifCount", $context) ? $context["notifCount"] : (function () { throw new RuntimeError('Variable "notifCount" does not exist.', 280, $this->source); })()) > 0))) ? ("") : ("display:none;"));
        yield "\">
          ";
        // line 281
        yield ((array_key_exists("notifCount", $context)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["notifCount"]) || array_key_exists("notifCount", $context) ? $context["notifCount"] : (function () { throw new RuntimeError('Variable "notifCount" does not exist.', 281, $this->source); })()), "html", null, true)) : (0));
        yield "
        </span>
      </button>

      ";
        // line 286
        yield "      <div class=\"notif-panel\" id=\"notifPanel\" style=\"display:none;\">

        <div class=\"notif-panel-header\">
          <span><i class=\"fas fa-bell\"></i>&nbsp; Notifications</span>
          ";
        // line 290
        if ((array_key_exists("notifCount", $context) && ((isset($context["notifCount"]) || array_key_exists("notifCount", $context) ? $context["notifCount"] : (function () { throw new RuntimeError('Variable "notifCount" does not exist.', 290, $this->source); })()) > 0))) {
            // line 291
            yield "            <button class=\"notif-tout-lire-btn\" onclick=\"toutMarquerLu()\">
              <i class=\"fas fa-check-double\"></i> Tout marquer lu
            </button>
          ";
        }
        // line 295
        yield "        </div>

        <div class=\"notif-list\">
          ";
        // line 298
        if (( !array_key_exists("notifications", $context) || Twig\Extension\CoreExtension::testEmpty((isset($context["notifications"]) || array_key_exists("notifications", $context) ? $context["notifications"] : (function () { throw new RuntimeError('Variable "notifications" does not exist.', 298, $this->source); })())))) {
            // line 299
            yield "            <div class=\"notif-empty\">
              <i class=\"fas fa-check-circle\"></i><br>
              Aucune nouvelle notification
            </div>
          ";
        } else {
            // line 304
            yield "            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["notifications"]) || array_key_exists("notifications", $context) ? $context["notifications"] : (function () { throw new RuntimeError('Variable "notifications" does not exist.', 304, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["notif"]) {
                // line 305
                yield "              <div class=\"notif-item";
                if ((($tmp =  !CoreExtension::getAttribute($this->env, $this->source, $context["notif"], "lu", [], "any", false, false, false, 305)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield " unread";
                }
                yield "\"
                   id=\"notif-";
                // line 306
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["notif"], "id", [], "any", false, false, false, 306), "html", null, true);
                yield "\"
                   onclick=\"marquerLue(";
                // line 307
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["notif"], "id", [], "any", false, false, false, 307), "html", null, true);
                yield ", this)\">

                <div class=\"notif-ico ico-";
                // line 309
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["notif"], "type", [], "any", false, false, false, 309), "html", null, true);
                yield "\">
                  <i class=\"fas fa-";
                // line 310
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["notif"], "type", [], "any", false, false, false, 310) == "rdv")) {
                    yield "calendar-plus
                    ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 311
$context["notif"], "type", [], "any", false, false, false, 311) == "confirme")) {
                    yield "check-circle
                    ";
                } else {
                    // line 312
                    yield "times-circle";
                }
                yield "\"></i>
                </div>

                <div class=\"notif-body\">
                  <div class=\"notif-msg\">";
                // line 316
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["notif"], "message", [], "any", false, false, false, 316), "html", null, true);
                yield "</div>
                  <div class=\"notif-time\">
                    <i class=\"far fa-clock\"></i>
                    ";
                // line 319
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["notif"], "createdAt", [], "any", false, false, false, 319), "d/m/Y à H:i"), "html", null, true);
                yield "
                  </div>
                </div>

              </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['notif'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 325
            yield "          ";
        }
        // line 326
        yield "        </div>

      </div>";
        // line 329
        yield "    </div>";
        // line 330
        yield "  </div>
</div>

    ";
        // line 334
        yield "    <div class=\"psy-nav\">
      <div class=\"nav-container\">
        <a class=\"nav-item active\" onclick=\"showSection('overview')\" href=\"#\">
          <i class=\"fas fa-chart-line\"></i>
          <span>Vue d'ensemble</span>
        </a>
        <a class=\"nav-item\" onclick=\"showSection('horaires')\" href=\"#\">
          <i class=\"fas fa-calendar-alt\"></i>
          <span>Mes horaires</span>
        </a>
        <a class=\"nav-item\" onclick=\"showSection('rendez-vous')\" href=\"#\">
          <i class=\"fas fa-calendar-check\"></i>
          <span>Rendez-vous reçus</span>
          <span class=\"nav-badge\" id=\"badgeRdv\">0</span>
        </a>
        <a class=\"nav-item\" onclick=\"showSection('fiches')\" href=\"#\">
          <i class=\"fas fa-file-alt\"></i>
          <span>Fiches consultation</span>
        </a>
        <a class=\"nav-item\" onclick=\"showSection('conges')\" href=\"#\">
          <i class=\"fas fa-file-medical-alt\"></i>
          <span>Congés maladie</span>
          ";
        // line 356
        if (((isset($context["congesEnAttente"]) || array_key_exists("congesEnAttente", $context) ? $context["congesEnAttente"] : (function () { throw new RuntimeError('Variable "congesEnAttente" does not exist.', 356, $this->source); })()) > 0)) {
            // line 357
            yield "            <span class=\"nav-badge\" id=\"badgeConges\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["congesEnAttente"]) || array_key_exists("congesEnAttente", $context) ? $context["congesEnAttente"] : (function () { throw new RuntimeError('Variable "congesEnAttente" does not exist.', 357, $this->source); })()), "html", null, true);
            yield "</span>
          ";
        }
        // line 359
        yield "        </a>
      </div>
    </div>

    ";
        // line 364
        yield "    <main class=\"psy-main\">

      ";
        // line 367
        yield "      <section class=\"psy-section active\" id=\"section-overview\">
        <div class=\"overview-greeting\">
          <h1>Bonjour, <em>";
        // line 369
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 369, $this->source); })()), "user", [], "any", false, false, false, 369)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 369, $this->source); })()), "user", [], "any", false, false, false, 369), "firstname", [], "any", false, false, false, 369), "html", null, true)) : ("Docteur"));
        yield "</em> 👋</h1>
          <p>✨ Voici un résumé de votre activité du jour.</p>
        </div>

        <div class=\"kpi-grid\">
          <div class=\"kpi-card green\">
            <div class=\"kpi-icon green\"><i class=\"fas fa-calendar-week\"></i></div>
            <div class=\"kpi-val\">";
        // line 376
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["mySlots"]) || array_key_exists("mySlots", $context) ? $context["mySlots"] : (function () { throw new RuntimeError('Variable "mySlots" does not exist.', 376, $this->source); })())), "html", null, true);
        yield "</div>
            <div class=\"kpi-label\">Créneaux actifs</div>
          </div>
          <div class=\"kpi-card gold\">
            <div class=\"kpi-icon gold\"><i class=\"fas fa-users\"></i></div>
            <div class=\"kpi-val\">";
        // line 381
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["myReservations"]) || array_key_exists("myReservations", $context) ? $context["myReservations"] : (function () { throw new RuntimeError('Variable "myReservations" does not exist.', 381, $this->source); })())), "html", null, true);
        yield "</div>
            <div class=\"kpi-label\">RDV reçus</div>
          </div>
          <div class=\"kpi-card blue\">
            <div class=\"kpi-icon blue\"><i class=\"fas fa-notes-medical\"></i></div>
            <div class=\"kpi-val\">";
        // line 386
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["myFiches"]) || array_key_exists("myFiches", $context) ? $context["myFiches"] : (function () { throw new RuntimeError('Variable "myFiches" does not exist.', 386, $this->source); })())), "html", null, true);
        yield "</div>
            <div class=\"kpi-label\">Fiches consultation</div>
          </div>
          <div class=\"kpi-card red\">
            <div class=\"kpi-icon red\"><i class=\"fas fa-clock\"></i></div>
            <div class=\"kpi-val\">";
        // line 391
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["myReservations"]) || array_key_exists("myReservations", $context) ? $context["myReservations"] : (function () { throw new RuntimeError('Variable "myReservations" does not exist.', 391, $this->source); })())), "html", null, true);
        yield "</div>
            <div class=\"kpi-label\">En attente</div>
          </div>
        </div>

        <div class=\"overview-grid\">
          <div class=\"widget-card\">
            <div class=\"widget-header\">
              <div class=\"widget-title\">
                <i class=\"fas fa-calendar-alt\"></i>
                Prochains rendez-vous
              </div>
              <a class=\"widget-action\" onclick=\"showSection('rendez-vous')\" href=\"#\">Voir tout →</a>
            </div>
            ";
        // line 405
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["myReservations"]) || array_key_exists("myReservations", $context) ? $context["myReservations"] : (function () { throw new RuntimeError('Variable "myReservations" does not exist.', 405, $this->source); })()))) {
            // line 406
            yield "              <div class=\"empty-state\" style=\"padding:40px;\">
                <i class=\"fas fa-calendar-check empty-state-icon\"></i>
                <p>Aucun rendez-vous reçu pour le moment.</p>
              </div>
            ";
        } else {
            // line 411
            yield "              ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::slice($this->env->getCharset(), (isset($context["myReservations"]) || array_key_exists("myReservations", $context) ? $context["myReservations"] : (function () { throw new RuntimeError('Variable "myReservations" does not exist.', 411, $this->source); })()), 0, 5));
            foreach ($context['_seq'] as $context["_key"] => $context["res"]) {
                // line 412
                yield "                ";
                $context["rdv"] = CoreExtension::getAttribute($this->env, $this->source, $context["res"], "rendezVous", [], "any", false, false, false, 412);
                // line 413
                yield "                <div class=\"appt-row\">
                  <div class=\"appt-time-block\">
                    <div class=\"appt-time\">";
                // line 415
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["rdv"]) || array_key_exists("rdv", $context) ? $context["rdv"] : (function () { throw new RuntimeError('Variable "rdv" does not exist.', 415, $this->source); })()), "heureDebut", [], "any", false, false, false, 415), "H:i"), "html", null, true);
                yield "</div>
                    <div class=\"appt-day\">";
                // line 416
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["rdv"]) || array_key_exists("rdv", $context) ? $context["rdv"] : (function () { throw new RuntimeError('Variable "rdv" does not exist.', 416, $this->source); })()), "dateRendezVous", [], "any", false, false, false, 416), 0, 3), "html", null, true);
                yield "</div>
                  </div>
                  <div class=\"appt-user-avatar\">
                    ";
                // line 419
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["res"], "user", [], "any", false, false, false, 419), "firstname", [], "any", false, false, false, 419), 0, 1), "html", null, true);
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["res"], "user", [], "any", false, false, false, 419), "lastname", [], "any", false, false, false, 419), 0, 1), "html", null, true);
                yield "
                  </div>
                  <div class=\"appt-info\">
                    <div class=\"appt-name\">";
                // line 422
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["res"], "user", [], "any", false, false, false, 422), "firstname", [], "any", false, false, false, 422), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["res"], "user", [], "any", false, false, false, 422), "lastname", [], "any", false, false, false, 422), "html", null, true);
                yield "</div>
                    <div class=\"appt-meta\">
                      <span><i class=\"far fa-calendar\"></i> ";
                // line 424
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["res"], "dateRdv", [], "any", false, false, false, 424)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["res"], "dateRdv", [], "any", false, false, false, 424), "d/m/Y"), "html", null, true)) : ("—"));
                yield "</span>
                      <span>•</span>
                      <span><i class=\"far fa-clock\"></i> ";
                // line 426
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["rdv"]) || array_key_exists("rdv", $context) ? $context["rdv"] : (function () { throw new RuntimeError('Variable "rdv" does not exist.', 426, $this->source); })()), "heureDebut", [], "any", false, false, false, 426), "H:i"), "html", null, true);
                yield " – ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["rdv"]) || array_key_exists("rdv", $context) ? $context["rdv"] : (function () { throw new RuntimeError('Variable "rdv" does not exist.', 426, $this->source); })()), "heureFin", [], "any", false, false, false, 426), "H:i"), "html", null, true);
                yield "</span>
                    </div>
                  </div>
                  <span class=\"appt-type-pill ";
                // line 429
                yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["rdv"]) || array_key_exists("rdv", $context) ? $context["rdv"] : (function () { throw new RuntimeError('Variable "rdv" does not exist.', 429, $this->source); })()), "typeSeance", [], "any", false, false, false, 429) == "en_ligne")) ? ("pill-enligne") : ("pill-presentiel"));
                yield "\">
                    <i class=\"fas fa-";
                // line 430
                yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["rdv"]) || array_key_exists("rdv", $context) ? $context["rdv"] : (function () { throw new RuntimeError('Variable "rdv" does not exist.', 430, $this->source); })()), "typeSeance", [], "any", false, false, false, 430) == "en_ligne")) ? ("video") : ("building"));
                yield "\"></i>
                    ";
                // line 431
                yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["rdv"]) || array_key_exists("rdv", $context) ? $context["rdv"] : (function () { throw new RuntimeError('Variable "rdv" does not exist.', 431, $this->source); })()), "typeSeance", [], "any", false, false, false, 431) == "en_ligne")) ? ("En ligne") : ("Présentiel"));
                yield "
                  </span>
                </div>
              ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['res'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 435
            yield "            ";
        }
        // line 436
        yield "          </div>

          <div class=\"widget-card\">
            <div class=\"widget-header\">
              <div class=\"widget-title\">
                <i class=\"fas fa-chart-simple\"></i>
                Ma semaine
              </div>
              <a class=\"widget-action\" onclick=\"showSection('horaires')\" href=\"#\">Gérer →</a>
            </div>
            <div class=\"mini-schedule\">
              ";
        // line 447
        $context["joursOrdre"] = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"];
        // line 448
        yield "              ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["joursOrdre"]) || array_key_exists("joursOrdre", $context) ? $context["joursOrdre"] : (function () { throw new RuntimeError('Variable "joursOrdre" does not exist.', 448, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["jour"]) {
            // line 449
            yield "                ";
            $context["slotsJour"] = Twig\Extension\CoreExtension::filter($this->env, (isset($context["mySlots"]) || array_key_exists("mySlots", $context) ? $context["mySlots"] : (function () { throw new RuntimeError('Variable "mySlots" does not exist.', 449, $this->source); })()), function ($__s__) use ($context, $macros) { $context["s"] = $__s__; return (CoreExtension::getAttribute($this->env, $this->source, (isset($context["s"]) || array_key_exists("s", $context) ? $context["s"] : (function () { throw new RuntimeError('Variable "s" does not exist.', 449, $this->source); })()), "dateRendezVous", [], "any", false, false, false, 449) == $context["jour"]); });
            // line 450
            yield "                <div class=\"mini-schedule-day\">
                  <div class=\"msd-day\">";
            // line 451
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), $context["jour"], 0, 3), "html", null, true);
            yield "</div>
                  <div class=\"msd-slots\">
                    ";
            // line 453
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["slotsJour"]) || array_key_exists("slotsJour", $context) ? $context["slotsJour"] : (function () { throw new RuntimeError('Variable "slotsJour" does not exist.', 453, $this->source); })())) > 0)) {
                // line 454
                yield "                      ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(Twig\Extension\CoreExtension::slice($this->env->getCharset(), (isset($context["slotsJour"]) || array_key_exists("slotsJour", $context) ? $context["slotsJour"] : (function () { throw new RuntimeError('Variable "slotsJour" does not exist.', 454, $this->source); })()), 0, 3));
                foreach ($context['_seq'] as $context["_key"] => $context["s"]) {
                    // line 455
                    yield "                        <span class=\"msd-slot taken\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["s"], "heureDebut", [], "any", false, false, false, 455), "H:i"), "html", null, true);
                    yield "</span>
                      ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['s'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 457
                yield "                      ";
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["slotsJour"]) || array_key_exists("slotsJour", $context) ? $context["slotsJour"] : (function () { throw new RuntimeError('Variable "slotsJour" does not exist.', 457, $this->source); })())) > 3)) {
                    // line 458
                    yield "                        <span class=\"msd-slot\" style=\"background:var(--sage-ghost);color:var(--sage);\">+";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["slotsJour"]) || array_key_exists("slotsJour", $context) ? $context["slotsJour"] : (function () { throw new RuntimeError('Variable "slotsJour" does not exist.', 458, $this->source); })())) - 3), "html", null, true);
                    yield "</span>
                      ";
                }
                // line 460
                yield "                    ";
            } else {
                // line 461
                yield "                      <span class=\"msd-slot empty\">💤 Repos</span>
                    ";
            }
            // line 463
            yield "                  </div>
                </div>
              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['jour'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 466
        yield "            </div>
          </div>
        </div>
      </section>

      ";
        // line 472
        yield "      <section class=\"psy-section\" id=\"section-horaires\">
        <div class=\"section-header\">
          <div>
            <h2>Mes <em>horaires</em></h2>
            <p><i class=\"fas fa-calendar-week\"></i> Gérez vos créneaux de consultation hebdomadaires</p>
          </div>
          <button class=\"topbar-btn primary\" onclick=\"openModal('modalCreateSlot')\">
            <i class=\"fas fa-plus-circle\"></i> Ajouter un créneau
          </button>
        </div>

        ";
        // line 483
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 483, $this->source); })()), "flashes", ["success"], "method", false, false, false, 483));
        foreach ($context['_seq'] as $context["_key"] => $context["msg"]) {
            // line 484
            yield "          <div class=\"flash-bar success\"><i class=\"fas fa-check-circle\"></i> ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["msg"], "html", null, true);
            yield "</div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['msg'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 486
        yield "        ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 486, $this->source); })()), "flashes", ["error"], "method", false, false, false, 486));
        foreach ($context['_seq'] as $context["_key"] => $context["msg"]) {
            // line 487
            yield "          <div class=\"flash-bar error\"><i class=\"fas fa-exclamation-circle\"></i> ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["msg"], "html", null, true);
            yield "</div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['msg'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 489
        yield "
        ";
        // line 490
        if (Twig\Extension\CoreExtension::testEmpty((isset($context["mySlots"]) || array_key_exists("mySlots", $context) ? $context["mySlots"] : (function () { throw new RuntimeError('Variable "mySlots" does not exist.', 490, $this->source); })()))) {
            // line 491
            yield "          <div class=\"empty-state\">
            <i class=\"fas fa-calendar-plus empty-state-icon\"></i>
            <h3>Aucun créneau défini</h3>
            <p>Ajoutez vos disponibilités pour que les patients puissent réserver.</p>
          </div>
        ";
        } else {
            // line 497
            yield "          <div class=\"horaires-grouped\">
            ";
            // line 498
            $context["joursOrdre"] = ["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche"];
            // line 499
            yield "            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["joursOrdre"]) || array_key_exists("joursOrdre", $context) ? $context["joursOrdre"] : (function () { throw new RuntimeError('Variable "joursOrdre" does not exist.', 499, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["jour"]) {
                // line 500
                yield "              ";
                $context["slotsDuJour"] = Twig\Extension\CoreExtension::sort($this->env, Twig\Extension\CoreExtension::filter($this->env, (isset($context["mySlots"]) || array_key_exists("mySlots", $context) ? $context["mySlots"] : (function () { throw new RuntimeError('Variable "mySlots" does not exist.', 500, $this->source); })()), function ($__s__) use ($context, $macros) { $context["s"] = $__s__; return (CoreExtension::getAttribute($this->env, $this->source, (isset($context["s"]) || array_key_exists("s", $context) ? $context["s"] : (function () { throw new RuntimeError('Variable "s" does not exist.', 500, $this->source); })()), "dateRendezVous", [], "any", false, false, false, 500) == $context["jour"]); }), function ($__a__, $__b__) use ($context, $macros) { $context["a"] = $__a__; $context["b"] = $__b__; return (CoreExtension::getAttribute($this->env, $this->source, (isset($context["a"]) || array_key_exists("a", $context) ? $context["a"] : (function () { throw new RuntimeError('Variable "a" does not exist.', 500, $this->source); })()), "heureDebut", [], "any", false, false, false, 500) <=> CoreExtension::getAttribute($this->env, $this->source, (isset($context["b"]) || array_key_exists("b", $context) ? $context["b"] : (function () { throw new RuntimeError('Variable "b" does not exist.', 500, $this->source); })()), "heureDebut", [], "any", false, false, false, 500)); });
                // line 501
                yield "              ";
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["slotsDuJour"]) || array_key_exists("slotsDuJour", $context) ? $context["slotsDuJour"] : (function () { throw new RuntimeError('Variable "slotsDuJour" does not exist.', 501, $this->source); })())) > 0)) {
                    // line 502
                    yield "                <div class=\"day-card\">
  <div class=\"day-card-header ";
                    // line 503
                    yield ((CoreExtension::inFilter($context["jour"], ["Samedi", "Dimanche"])) ? ("weekend") : ("weekday"));
                    yield "\">
    <div class=\"day-name\">
      <i class=\"fas fa-calendar-alt\"></i>
      ";
                    // line 506
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["jour"], "html", null, true);
                    yield "
    </div>
    <div class=\"day-badge\">
      ";
                    // line 509
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["slotsDuJour"]) || array_key_exists("slotsDuJour", $context) ? $context["slotsDuJour"] : (function () { throw new RuntimeError('Variable "slotsDuJour" does not exist.', 509, $this->source); })())), "html", null, true);
                    yield " créneau";
                    yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["slotsDuJour"]) || array_key_exists("slotsDuJour", $context) ? $context["slotsDuJour"] : (function () { throw new RuntimeError('Variable "slotsDuJour" does not exist.', 509, $this->source); })())) > 1)) ? ("x") : (""));
                    yield "
    </div>
  </div>
  <div class=\"day-card-body\">

    ";
                    // line 515
                    yield "    ";
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable((isset($context["slotsDuJour"]) || array_key_exists("slotsDuJour", $context) ? $context["slotsDuJour"] : (function () { throw new RuntimeError('Variable "slotsDuJour" does not exist.', 515, $this->source); })()));
                    foreach ($context['_seq'] as $context["_key"] => $context["slot"]) {
                        // line 516
                        yield "      ";
                        $context["heure"] = $this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["slot"], "heureDebut", [], "any", false, false, false, 516), "H:i");
                        // line 517
                        yield "      ";
                        if (((isset($context["heure"]) || array_key_exists("heure", $context) ? $context["heure"] : (function () { throw new RuntimeError('Variable "heure" does not exist.', 517, $this->source); })()) < "12:00")) {
                            // line 518
                            yield "        <div class=\"slot-item\">
          <div class=\"slot-time\">
            <i class=\"fas fa-clock\"></i>
            <span>";
                            // line 521
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["slot"], "heureDebut", [], "any", false, false, false, 521), "H:i"), "html", null, true);
                            yield " – ";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["slot"], "heureFin", [], "any", false, false, false, 521), "H:i"), "html", null, true);
                            yield "</span>
          </div>
          <div class=\"slot-type\">
            <span class=\"seance-tag ";
                            // line 524
                            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["slot"], "typeSeance", [], "any", false, false, false, 524) == "en_ligne")) ? ("enligne") : ("presentiel"));
                            yield "\">
              <i class=\"fas fa-";
                            // line 525
                            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["slot"], "typeSeance", [], "any", false, false, false, 525) == "en_ligne")) ? ("video") : ("building"));
                            yield "\"></i>
              ";
                            // line 526
                            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["slot"], "typeSeance", [], "any", false, false, false, 526) == "en_ligne")) ? ("En ligne") : ("Présentiel"));
                            yield "
            </span>
          </div>
          <div class=\"slot-status\">
            <span class=\"statut-tag ";
                            // line 530
                            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["slot"], "statut", [], "any", false, false, false, 530) == "Pas encore pris")) ? ("libre") : ("pris"));
                            yield "\">
              <span class=\"sdot\"></span>
              ";
                            // line 532
                            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["slot"], "statut", [], "any", false, false, false, 532) == "Pas encore pris")) ? ("Disponible") : ("Non Disponible"));
                            yield "
            </span>
          </div>
          <div class=\"slot-actions\">
            <button class=\"act-btn edit\" title=\"Modifier\"
                    onclick=\"openEditSlotModal(";
                            // line 537
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["slot"], "id", [], "any", false, false, false, 537), "html", null, true);
                            yield ", '";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["slot"], "dateRendezVous", [], "any", false, false, false, 537), "html", null, true);
                            yield "', '";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["slot"], "heureDebut", [], "any", false, false, false, 537), "H:i"), "html", null, true);
                            yield "', '";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["slot"], "heureFin", [], "any", false, false, false, 537), "H:i"), "html", null, true);
                            yield "', '";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["slot"], "typeSeance", [], "any", false, false, false, 537), "html", null, true);
                            yield "', '";
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["slot"], "statut", [], "any", false, false, false, 537), "html", null, true);
                            yield "')\">
              <i class=\"fas fa-edit\"></i>
            </button>
            <button class=\"act-btn del\" title=\"Supprimer\"
                    onclick=\"openDeleteSlotModal(";
                            // line 541
                            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["slot"], "id", [], "any", false, false, false, 541), "html", null, true);
                            yield ")\">
              <i class=\"fas fa-trash-alt\"></i>
            </button>
          </div>
        </div>
      ";
                        }
                        // line 547
                        yield "    ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['slot'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 548
                    yield "
    ";
                    // line 550
                    yield "    ";
                    if (($context["jour"] == "Samedi")) {
                        // line 551
                        yield "      <div class=\"pause-slot fin-semaine\">
        <i class=\"fas fa-door-open\"></i>
        <span>Fin de travail — Bon week-end ! 🎉</span>
      </div>

    ";
                        // line 557
                        yield "    ";
                    } else {
                        // line 558
                        yield "      <div class=\"pause-slot\">
        <i class=\"fas fa-mug-hot\"></i>
        <span>Pause déjeuner 12:00 – 14:00</span>
      </div>

      ";
                        // line 563
                        $context['_parent'] = $context;
                        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["slotsDuJour"]) || array_key_exists("slotsDuJour", $context) ? $context["slotsDuJour"] : (function () { throw new RuntimeError('Variable "slotsDuJour" does not exist.', 563, $this->source); })()));
                        foreach ($context['_seq'] as $context["_key"] => $context["slot"]) {
                            // line 564
                            yield "        ";
                            $context["heure"] = $this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["slot"], "heureDebut", [], "any", false, false, false, 564), "H:i");
                            // line 565
                            yield "        ";
                            if (((isset($context["heure"]) || array_key_exists("heure", $context) ? $context["heure"] : (function () { throw new RuntimeError('Variable "heure" does not exist.', 565, $this->source); })()) >= "14:00")) {
                                // line 566
                                yield "          <div class=\"slot-item\">
            <div class=\"slot-time\">
              <i class=\"fas fa-clock\"></i>
              <span>";
                                // line 569
                                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["slot"], "heureDebut", [], "any", false, false, false, 569), "H:i"), "html", null, true);
                                yield " – ";
                                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["slot"], "heureFin", [], "any", false, false, false, 569), "H:i"), "html", null, true);
                                yield "</span>
            </div>
            <div class=\"slot-type\">
              <span class=\"seance-tag ";
                                // line 572
                                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["slot"], "typeSeance", [], "any", false, false, false, 572) == "en_ligne")) ? ("enligne") : ("presentiel"));
                                yield "\">
                <i class=\"fas fa-";
                                // line 573
                                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["slot"], "typeSeance", [], "any", false, false, false, 573) == "en_ligne")) ? ("video") : ("building"));
                                yield "\"></i>
                ";
                                // line 574
                                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["slot"], "typeSeance", [], "any", false, false, false, 574) == "en_ligne")) ? ("En ligne") : ("Présentiel"));
                                yield "
              </span>
            </div>
            <div class=\"slot-status\">
              <span class=\"statut-tag ";
                                // line 578
                                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["slot"], "statut", [], "any", false, false, false, 578) == "Pas encore pris")) ? ("libre") : ("pris"));
                                yield "\">
                <span class=\"sdot\"></span>
                ";
                                // line 580
                                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["slot"], "statut", [], "any", false, false, false, 580) == "Pas encore pris")) ? ("Disponible") : ("Réservé"));
                                yield "
              </span>
            </div>
            <div class=\"slot-actions\">
              <button class=\"act-btn edit\" title=\"Modifier\"
                      onclick=\"openEditSlotModal(";
                                // line 585
                                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["slot"], "id", [], "any", false, false, false, 585), "html", null, true);
                                yield ", '";
                                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["slot"], "dateRendezVous", [], "any", false, false, false, 585), "html", null, true);
                                yield "', '";
                                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["slot"], "heureDebut", [], "any", false, false, false, 585), "H:i"), "html", null, true);
                                yield "', '";
                                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["slot"], "heureFin", [], "any", false, false, false, 585), "H:i"), "html", null, true);
                                yield "', '";
                                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["slot"], "typeSeance", [], "any", false, false, false, 585), "html", null, true);
                                yield "', '";
                                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["slot"], "statut", [], "any", false, false, false, 585), "html", null, true);
                                yield "')\">
                <i class=\"fas fa-edit\"></i>
              </button>
              <button class=\"act-btn del\" title=\"Supprimer\"
                      onclick=\"openDeleteSlotModal(";
                                // line 589
                                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["slot"], "id", [], "any", false, false, false, 589), "html", null, true);
                                yield ")\">
                <i class=\"fas fa-trash-alt\"></i>
              </button>
            </div>
          </div>
        ";
                            }
                            // line 595
                            yield "      ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_key'], $context['slot'], $context['_parent']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 596
                        yield "    ";
                    }
                    // line 597
                    yield "
  </div>
</div>
              ";
                }
                // line 601
                yield "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['jour'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 602
            yield "          </div>
        ";
        }
        // line 604
        yield "      </section>

      ";
        // line 607
        yield "<section class=\"psy-section\" id=\"section-rendez-vous\">
  <div class=\"section-header\">
    <div>
      <h2>Rendez-vous <em>reçus</em></h2>
      <p><i class=\"fas fa-users\"></i> Les patients qui ont réservé un créneau avec vous</p>
    </div>
  </div>

  ";
        // line 615
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["myReservationsPaginated"]) || array_key_exists("myReservationsPaginated", $context) ? $context["myReservationsPaginated"] : (function () { throw new RuntimeError('Variable "myReservationsPaginated" does not exist.', 615, $this->source); })()), "totalItemCount", [], "any", false, false, false, 615) == 0)) {
            // line 616
            yield "    <div class=\"empty-state\">
      <i class=\"fas fa-calendar-times empty-state-icon\"></i>
      <h3>Aucun rendez-vous reçu</h3>
      <p>Vos prochains rendez-vous apparaîtront ici.</p>
    </div>
  ";
        } else {
            // line 622
            yield "    <div class=\"rdv-recu-grid\">
      ";
            // line 623
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["myReservationsPaginated"]) || array_key_exists("myReservationsPaginated", $context) ? $context["myReservationsPaginated"] : (function () { throw new RuntimeError('Variable "myReservationsPaginated" does not exist.', 623, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["res"]) {
                // line 624
                yield "        ";
                $context["rdv"] = CoreExtension::getAttribute($this->env, $this->source, $context["res"], "rendezVous", [], "any", false, false, false, 624);
                // line 625
                yield "        ";
                $context["patient"] = CoreExtension::getAttribute($this->env, $this->source, $context["res"], "user", [], "any", false, false, false, 625);
                // line 626
                yield "        <div class=\"rdv-recu-card\"
             data-resa-id=\"";
                // line 627
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["res"], "id", [], "any", false, false, false, 627), "html", null, true);
                yield "\"
             data-rdv-id=\"";
                // line 628
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["rdv"]) || array_key_exists("rdv", $context) ? $context["rdv"] : (function () { throw new RuntimeError('Variable "rdv" does not exist.', 628, $this->source); })()), "id", [], "any", false, false, false, 628), "html", null, true);
                yield "\"
             data-patient=\"";
                // line 629
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["patient"]) || array_key_exists("patient", $context) ? $context["patient"] : (function () { throw new RuntimeError('Variable "patient" does not exist.', 629, $this->source); })()), "firstname", [], "any", false, false, false, 629), "html_attr");
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["patient"]) || array_key_exists("patient", $context) ? $context["patient"] : (function () { throw new RuntimeError('Variable "patient" does not exist.', 629, $this->source); })()), "lastname", [], "any", false, false, false, 629), "html_attr");
                yield "\">
          <div class=\"rrc-stripe ";
                // line 630
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["res"], "statut", [], "any", false, false, false, 630) == "confirme")) ? ("confirmed") : ((((CoreExtension::getAttribute($this->env, $this->source, $context["res"], "statut", [], "any", false, false, false, 630) == "annule")) ? ("cancelled") : ("pending"))));
                yield "\"></div>
          <div class=\"rrc-body\">
            <div class=\"rrc-top\">
              <div class=\"rrc-avatar\">
                ";
                // line 634
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["patient"]) || array_key_exists("patient", $context) ? $context["patient"] : (function () { throw new RuntimeError('Variable "patient" does not exist.', 634, $this->source); })()), "firstname", [], "any", false, false, false, 634), 0, 1), "html", null, true);
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["patient"]) || array_key_exists("patient", $context) ? $context["patient"] : (function () { throw new RuntimeError('Variable "patient" does not exist.', 634, $this->source); })()), "lastname", [], "any", false, false, false, 634), 0, 1), "html", null, true);
                yield "
              </div>
              <div>
                <div class=\"rrc-name\">";
                // line 637
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["patient"]) || array_key_exists("patient", $context) ? $context["patient"] : (function () { throw new RuntimeError('Variable "patient" does not exist.', 637, $this->source); })()), "firstname", [], "any", false, false, false, 637), "html", null, true);
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["patient"]) || array_key_exists("patient", $context) ? $context["patient"] : (function () { throw new RuntimeError('Variable "patient" does not exist.', 637, $this->source); })()), "lastname", [], "any", false, false, false, 637), "html", null, true);
                yield "</div>
                <div class=\"rrc-sub\"><i class=\"fas fa-envelope\"></i> ";
                // line 638
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["patient"]) || array_key_exists("patient", $context) ? $context["patient"] : (function () { throw new RuntimeError('Variable "patient" does not exist.', 638, $this->source); })()), "email", [], "any", false, false, false, 638), "html", null, true);
                yield "</div>
              </div>
              <span class=\"rrc-status
                ";
                // line 641
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["res"], "statut", [], "any", false, false, false, 641) == "confirme")) {
                    yield "confirme
                ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 642
$context["res"], "statut", [], "any", false, false, false, 642) == "annule")) {
                    yield "annule
                ";
                } else {
                    // line 643
                    yield "attente";
                }
                yield "\">
                <i class=\"fas fa-
                  ";
                // line 645
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["res"], "statut", [], "any", false, false, false, 645) == "confirme")) {
                    yield "check-circle
                  ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 646
$context["res"], "statut", [], "any", false, false, false, 646) == "annule")) {
                    yield "times-circle
                  ";
                } else {
                    // line 647
                    yield "hourglass-half";
                }
                yield "\">
                </i>
                ";
                // line 649
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["res"], "statut", [], "any", false, false, false, 649) == "confirme")) {
                    yield "Confirmé
                ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 650
$context["res"], "statut", [], "any", false, false, false, 650) == "annule")) {
                    yield "Annulé
                ";
                } else {
                    // line 651
                    yield "En attente";
                }
                // line 652
                yield "              </span>
            </div>

            <div class=\"rrc-chips\">
              <div class=\"rrc-chip\">
                <i class=\"fas fa-calendar-alt\"></i>
                ";
                // line 658
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["res"], "dateRdv", [], "any", false, false, false, 658)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["res"], "dateRdv", [], "any", false, false, false, 658), "d/m/Y"), "html", null, true)) : ("—"));
                yield "
              </div>
              <div class=\"rrc-chip\">
                <i class=\"fas fa-tag\"></i>
                ";
                // line 662
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["rdv"]) || array_key_exists("rdv", $context) ? $context["rdv"] : (function () { throw new RuntimeError('Variable "rdv" does not exist.', 662, $this->source); })()), "dateRendezVous", [], "any", false, false, false, 662), "html", null, true);
                yield "
              </div>
              <div class=\"rrc-chip\">
                <i class=\"fas fa-clock\"></i>
                ";
                // line 666
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["rdv"]) || array_key_exists("rdv", $context) ? $context["rdv"] : (function () { throw new RuntimeError('Variable "rdv" does not exist.', 666, $this->source); })()), "heureDebut", [], "any", false, false, false, 666), "H:i"), "html", null, true);
                yield " – ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["rdv"]) || array_key_exists("rdv", $context) ? $context["rdv"] : (function () { throw new RuntimeError('Variable "rdv" does not exist.', 666, $this->source); })()), "heureFin", [], "any", false, false, false, 666), "H:i"), "html", null, true);
                yield "
              </div>
              <div class=\"rrc-chip\">
                <i class=\"fas fa-";
                // line 669
                yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["rdv"]) || array_key_exists("rdv", $context) ? $context["rdv"] : (function () { throw new RuntimeError('Variable "rdv" does not exist.', 669, $this->source); })()), "typeSeance", [], "any", false, false, false, 669) == "en_ligne")) ? ("video") : ("building"));
                yield "\"></i>
                ";
                // line 670
                yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["rdv"]) || array_key_exists("rdv", $context) ? $context["rdv"] : (function () { throw new RuntimeError('Variable "rdv" does not exist.', 670, $this->source); })()), "typeSeance", [], "any", false, false, false, 670) == "en_ligne")) ? ("En ligne") : ("Présentiel"));
                yield "
              </div>
            </div>

            <div class=\"rrc-footer\">
  ";
                // line 675
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["res"], "statut", [], "any", false, false, false, 675) == "confirme")) {
                    // line 676
                    yield "    <button class=\"rrc-btn fiche\"
            data-resa-id=\"";
                    // line 677
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["res"], "id", [], "any", false, false, false, 677), "html", null, true);
                    yield "\"
            data-rdv-id=\"";
                    // line 678
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["rdv"]) || array_key_exists("rdv", $context) ? $context["rdv"] : (function () { throw new RuntimeError('Variable "rdv" does not exist.', 678, $this->source); })()), "id", [], "any", false, false, false, 678), "html", null, true);
                    yield "\"
            data-patient=\"";
                    // line 679
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["patient"]) || array_key_exists("patient", $context) ? $context["patient"] : (function () { throw new RuntimeError('Variable "patient" does not exist.', 679, $this->source); })()), "firstname", [], "any", false, false, false, 679), "html_attr");
                    yield " ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["patient"]) || array_key_exists("patient", $context) ? $context["patient"] : (function () { throw new RuntimeError('Variable "patient" does not exist.', 679, $this->source); })()), "lastname", [], "any", false, false, false, 679), "html_attr");
                    yield "\"
            onclick=\"openCreateFicheModal(this)\">
      <i class=\"fas fa-file-medical\"></i> Créer fiche
    </button>

    ";
                    // line 685
                    yield "    ";
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["res"], "googleEventId", [], "any", false, false, false, 685)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 686
                        yield "  <button type=\"button\" class=\"rrc-btn gcal-btn synced\" disabled>
    <i class=\"fas fa-check-circle\"></i> Synchronisé
  </button>
";
                    } else {
                        // line 690
                        yield "  <button type=\"button\"
      class=\"rrc-btn gcal-btn\"
      data-resa-id=\"";
                        // line 692
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["res"], "id", [], "any", false, false, false, 692), "html", null, true);
                        yield "\"
      onclick=\"return syncGoogleCalendar(event, this, ";
                        // line 693
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["res"], "id", [], "any", false, false, false, 693), "html", null, true);
                        yield ")\">
    <svg class=\"gcal-icon\" viewBox=\"0 0 24 24\" width=\"14\" height=\"14\" fill=\"none\">
      <rect x=\"3\" y=\"4\" width=\"18\" height=\"17\" rx=\"2\" fill=\"#fff\" stroke=\"#dadce0\" stroke-width=\"1.5\"/>
      <rect x=\"3\" y=\"8\" width=\"18\" height=\"2.5\" fill=\"#4285F4\"/>
      <line x1=\"8\" y1=\"4\" x2=\"8\" y2=\"7\" stroke=\"#5f6368\" stroke-width=\"1.5\" stroke-linecap=\"round\"/>
      <line x1=\"16\" y1=\"4\" x2=\"16\" y2=\"7\" stroke=\"#5f6368\" stroke-width=\"1.5\" stroke-linecap=\"round\"/>
      <text x=\"12\" y=\"18\" text-anchor=\"middle\" font-size=\"6\" font-weight=\"700\" fill=\"#1a73e8\">";
                        // line 699
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["rdv"]) || array_key_exists("rdv", $context) ? $context["rdv"] : (function () { throw new RuntimeError('Variable "rdv" does not exist.', 699, $this->source); })()), "dateRendezVous", [], "any", false, false, false, 699), "html", null, true);
                        yield "</text>
    </svg>
    Sync Calendar
  </button>
";
                    }
                    // line 704
                    yield "
  ";
                } elseif ((CoreExtension::getAttribute($this->env, $this->source,                 // line 705
$context["res"], "statut", [], "any", false, false, false, 705) == "annule")) {
                    // line 706
                    yield "    <span class=\"rrc-cancelled-msg\"><i class=\"fas fa-ban\"></i> Rendez-vous annulé</span>
  ";
                } else {
                    // line 708
                    yield "    <button class=\"rrc-btn confirm\"
            onclick=\"updateReservationStatus(";
                    // line 709
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["res"], "id", [], "any", false, false, false, 709), "html", null, true);
                    yield ", 'confirme', this)\">
      <i class=\"fas fa-check\"></i> Confirmer
    </button>
    <button class=\"rrc-btn cancel\"
            onclick=\"updateReservationStatus(";
                    // line 713
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["res"], "id", [], "any", false, false, false, 713), "html", null, true);
                    yield ", 'annule', this)\">
      <i class=\"fas fa-times\"></i> Annuler
    </button>
  ";
                }
                // line 717
                yield "
  <button class=\"rrc-btn outline\">
    <i class=\"fas fa-eye\"></i> Détails
  </button>
</div>
          </div>
        </div>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['res'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 725
            yield "    </div>

    ";
            // line 728
            yield "    ";
            if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["myReservationsPaginated"]) || array_key_exists("myReservationsPaginated", $context) ? $context["myReservationsPaginated"] : (function () { throw new RuntimeError('Variable "myReservationsPaginated" does not exist.', 728, $this->source); })()), "pageCount", [], "any", false, false, false, 728) > 1)) {
                // line 729
                yield "    <div class=\"fiche-pagination\">

      ";
                // line 731
                if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["myReservationsPaginated"]) || array_key_exists("myReservationsPaginated", $context) ? $context["myReservationsPaginated"] : (function () { throw new RuntimeError('Variable "myReservationsPaginated" does not exist.', 731, $this->source); })()), "currentPageNumber", [], "any", false, false, false, 731) > 1)) {
                    // line 732
                    yield "        <a class=\"fiche-page-btn prev-next\" href=\"#\"
           onclick=\"goToRdvPage(";
                    // line 733
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((CoreExtension::getAttribute($this->env, $this->source, (isset($context["myReservationsPaginated"]) || array_key_exists("myReservationsPaginated", $context) ? $context["myReservationsPaginated"] : (function () { throw new RuntimeError('Variable "myReservationsPaginated" does not exist.', 733, $this->source); })()), "currentPageNumber", [], "any", false, false, false, 733) - 1), "html", null, true);
                    yield ")\">
          <i class=\"fas fa-chevron-left\"></i>
        </a>
      ";
                } else {
                    // line 737
                    yield "        <span class=\"fiche-page-btn prev-next disabled\">
          <i class=\"fas fa-chevron-left\"></i>
        </span>
      ";
                }
                // line 741
                yield "
      ";
                // line 742
                $context["cur"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["myReservationsPaginated"]) || array_key_exists("myReservationsPaginated", $context) ? $context["myReservationsPaginated"] : (function () { throw new RuntimeError('Variable "myReservationsPaginated" does not exist.', 742, $this->source); })()), "currentPageNumber", [], "any", false, false, false, 742);
                // line 743
                yield "      ";
                $context["tot"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["myReservationsPaginated"]) || array_key_exists("myReservationsPaginated", $context) ? $context["myReservationsPaginated"] : (function () { throw new RuntimeError('Variable "myReservationsPaginated" does not exist.', 743, $this->source); })()), "pageCount", [], "any", false, false, false, 743);
                // line 744
                yield "      ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(range(1, (isset($context["tot"]) || array_key_exists("tot", $context) ? $context["tot"] : (function () { throw new RuntimeError('Variable "tot" does not exist.', 744, $this->source); })())));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 745
                    yield "        ";
                    if (((($context["i"] == 1) || ($context["i"] == (isset($context["tot"]) || array_key_exists("tot", $context) ? $context["tot"] : (function () { throw new RuntimeError('Variable "tot" does not exist.', 745, $this->source); })()))) || (($context["i"] >= ((isset($context["cur"]) || array_key_exists("cur", $context) ? $context["cur"] : (function () { throw new RuntimeError('Variable "cur" does not exist.', 745, $this->source); })()) - 2)) && ($context["i"] <= ((isset($context["cur"]) || array_key_exists("cur", $context) ? $context["cur"] : (function () { throw new RuntimeError('Variable "cur" does not exist.', 745, $this->source); })()) + 2))))) {
                        // line 746
                        yield "          <a class=\"fiche-page-btn ";
                        yield ((($context["i"] == (isset($context["cur"]) || array_key_exists("cur", $context) ? $context["cur"] : (function () { throw new RuntimeError('Variable "cur" does not exist.', 746, $this->source); })()))) ? ("active") : (""));
                        yield "\"
             href=\"#\" onclick=\"goToRdvPage(";
                        // line 747
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["i"], "html", null, true);
                        yield ")\">
            ";
                        // line 748
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["i"], "html", null, true);
                        yield "
          </a>
        ";
                    } elseif (((                    // line 750
$context["i"] == ((isset($context["cur"]) || array_key_exists("cur", $context) ? $context["cur"] : (function () { throw new RuntimeError('Variable "cur" does not exist.', 750, $this->source); })()) - 3)) || ($context["i"] == ((isset($context["cur"]) || array_key_exists("cur", $context) ? $context["cur"] : (function () { throw new RuntimeError('Variable "cur" does not exist.', 750, $this->source); })()) + 3)))) {
                        // line 751
                        yield "          <span class=\"fiche-page-ellipsis\">…</span>
        ";
                    }
                    // line 753
                    yield "      ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 754
                yield "
      ";
                // line 755
                if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["myReservationsPaginated"]) || array_key_exists("myReservationsPaginated", $context) ? $context["myReservationsPaginated"] : (function () { throw new RuntimeError('Variable "myReservationsPaginated" does not exist.', 755, $this->source); })()), "currentPageNumber", [], "any", false, false, false, 755) < CoreExtension::getAttribute($this->env, $this->source, (isset($context["myReservationsPaginated"]) || array_key_exists("myReservationsPaginated", $context) ? $context["myReservationsPaginated"] : (function () { throw new RuntimeError('Variable "myReservationsPaginated" does not exist.', 755, $this->source); })()), "pageCount", [], "any", false, false, false, 755))) {
                    // line 756
                    yield "        <a class=\"fiche-page-btn prev-next\" href=\"#\"
           onclick=\"goToRdvPage(";
                    // line 757
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((CoreExtension::getAttribute($this->env, $this->source, (isset($context["myReservationsPaginated"]) || array_key_exists("myReservationsPaginated", $context) ? $context["myReservationsPaginated"] : (function () { throw new RuntimeError('Variable "myReservationsPaginated" does not exist.', 757, $this->source); })()), "currentPageNumber", [], "any", false, false, false, 757) + 1), "html", null, true);
                    yield ")\">
          <i class=\"fas fa-chevron-right\"></i>
        </a>
      ";
                } else {
                    // line 761
                    yield "        <span class=\"fiche-page-btn prev-next disabled\">
          <i class=\"fas fa-chevron-right\"></i>
        </span>
      ";
                }
                // line 765
                yield "
      <span class=\"fiche-page-info\">
        Page ";
                // line 767
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["myReservationsPaginated"]) || array_key_exists("myReservationsPaginated", $context) ? $context["myReservationsPaginated"] : (function () { throw new RuntimeError('Variable "myReservationsPaginated" does not exist.', 767, $this->source); })()), "currentPageNumber", [], "any", false, false, false, 767), "html", null, true);
                yield " / ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["myReservationsPaginated"]) || array_key_exists("myReservationsPaginated", $context) ? $context["myReservationsPaginated"] : (function () { throw new RuntimeError('Variable "myReservationsPaginated" does not exist.', 767, $this->source); })()), "pageCount", [], "any", false, false, false, 767), "html", null, true);
                yield "
        &nbsp;·&nbsp;
        ";
                // line 769
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["myReservationsPaginated"]) || array_key_exists("myReservationsPaginated", $context) ? $context["myReservationsPaginated"] : (function () { throw new RuntimeError('Variable "myReservationsPaginated" does not exist.', 769, $this->source); })()), "totalItemCount", [], "any", false, false, false, 769), "html", null, true);
                yield " rendez-vous
      </span>

    </div>
    ";
            }
            // line 774
            yield "
  ";
        }
        // line 776
        yield "</section>

     ";
        // line 779
        yield "    <section class=\"psy-section\" id=\"section-fiches\">

  <div class=\"section-header fiches-header-top\">
    <div>
      <h2>Fiches de <em>consultation</em></h2>
      <p>
        <i class=\"fas fa-notes-medical\"></i>
        Vos notes cliniques et comptes-rendus de séances
      </p>
    </div>

    <div class=\"header-ia-zone\">
      ";
        // line 791
        yield from $this->load("home/psy_ia_analyse.html.twig", 791)->unwrap()->yield($context);
        // line 792
        yield "    </div>
  </div>

  ";
        // line 796
        yield "  <div class=\"search-zone\">
    <div class=\"fiches-search-box\">
      <i class=\"fas fa-search fiches-search-icon\"></i>
      <input
        type=\"text\"
        id=\"ficheSearchInput\"
        class=\"fiches-search-input\"
        placeholder=\"Rechercher par nom du patient…\"
        autocomplete=\"off\"
        value=\"";
        // line 805
        yield ((array_key_exists("search", $context)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 805, $this->source); })()), "html", null, true)) : (""));
        yield "\"
      >

      ";
        // line 808
        if ((array_key_exists("search", $context) && ((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 808, $this->source); })()) != ""))) {
            // line 809
            yield "        <button class=\"fiches-search-clear\" id=\"ficheSearchClear\" onclick=\"clearFicheSearch()\">
          <i class=\"fas fa-times\"></i>
        </button>
      ";
        } else {
            // line 813
            yield "        <button class=\"fiches-search-clear\" id=\"ficheSearchClear\" onclick=\"clearFicheSearch()\" style=\"display:none;\">
          <i class=\"fas fa-times\"></i>
        </button>
      ";
        }
        // line 817
        yield "    </div>

    <div class=\"fiches-search-count\" id=\"ficheSearchCount\">
      ";
        // line 820
        if ((array_key_exists("search", $context) && ((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 820, $this->source); })()) != ""))) {
            // line 821
            yield "        ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["myFiches"]) || array_key_exists("myFiches", $context) ? $context["myFiches"] : (function () { throw new RuntimeError('Variable "myFiches" does not exist.', 821, $this->source); })()), "totalItemCount", [], "any", false, false, false, 821), "html", null, true);
            yield " fiche";
            yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["myFiches"]) || array_key_exists("myFiches", $context) ? $context["myFiches"] : (function () { throw new RuntimeError('Variable "myFiches" does not exist.', 821, $this->source); })()), "totalItemCount", [], "any", false, false, false, 821) > 1)) ? ("s") : (""));
            yield " trouvée";
            yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["myFiches"]) || array_key_exists("myFiches", $context) ? $context["myFiches"] : (function () { throw new RuntimeError('Variable "myFiches" does not exist.', 821, $this->source); })()), "totalItemCount", [], "any", false, false, false, 821) > 1)) ? ("s") : (""));
            yield "
      ";
        }
        // line 823
        yield "    </div>
  </div>
  

  ";
        // line 828
        yield "  ";
        if (((array_key_exists("search", $context) && ((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 828, $this->source); })()) != "")) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["myFiches"]) || array_key_exists("myFiches", $context) ? $context["myFiches"] : (function () { throw new RuntimeError('Variable "myFiches" does not exist.', 828, $this->source); })()), "totalItemCount", [], "any", false, false, false, 828) == 0))) {
            // line 829
            yield "    <div class=\"empty-state\">
      <i class=\"fas fa-search empty-state-icon\"></i>
      <h3>Aucun résultat</h3>
      <p>Aucune fiche ne correspond à <strong>« ";
            // line 832
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 832, $this->source); })()), "html", null, true);
            yield " »</strong>.</p>
      <a href=\"";
            // line 833
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("psy_dashboard", ["section" => "fiches"]);
            yield "\" class=\"fiche-page-btn\" style=\"margin-top:12px; text-decoration:none;\">
        <i class=\"fas fa-times\"></i> Effacer la recherche
      </a>
    </div>

  ";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source,         // line 838
(isset($context["myFiches"]) || array_key_exists("myFiches", $context) ? $context["myFiches"] : (function () { throw new RuntimeError('Variable "myFiches" does not exist.', 838, $this->source); })()), "totalItemCount", [], "any", false, false, false, 838) == 0)) {
            // line 839
            yield "    <div class=\"empty-state\">
      <i class=\"fas fa-file-alt empty-state-icon\"></i>
      <h3>Aucune fiche rédigée</h3>
      <p>Créez vos premières fiches de consultation après confirmation d'un RDV.</p>
    </div>

  ";
        } else {
            // line 846
            yield "    <div class=\"fiches-grid\">
      ";
            // line 847
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["myFiches"]) || array_key_exists("myFiches", $context) ? $context["myFiches"] : (function () { throw new RuntimeError('Variable "myFiches" does not exist.', 847, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["fiche"]) {
                // line 848
                yield "
        ";
                // line 849
                $context["patientName"] = "Patient inconnu";
                // line 850
                yield "        ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable((isset($context["myReservations"]) || array_key_exists("myReservations", $context) ? $context["myReservations"] : (function () { throw new RuntimeError('Variable "myReservations" does not exist.', 850, $this->source); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["reservation"]) {
                    // line 851
                    yield "          ";
                    if (((CoreExtension::getAttribute($this->env, $this->source, $context["reservation"], "rendezVous", [], "any", false, false, false, 851) && CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "rendezVous", [], "any", false, false, false, 851)) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["reservation"], "rendezVous", [], "any", false, false, false, 851), "id", [], "any", false, false, false, 851) == CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "rendezVous", [], "any", false, false, false, 851), "id", [], "any", false, false, false, 851)))) {
                        // line 852
                        yield "            ";
                        $context["patientName"] = ((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["reservation"], "user", [], "any", false, false, false, 852), "firstname", [], "any", false, false, false, 852) . " ") . CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["reservation"], "user", [], "any", false, false, false, 852), "lastname", [], "any", false, false, false, 852));
                        // line 853
                        yield "          ";
                    }
                    // line 854
                    yield "        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['reservation'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 855
                yield "
        <div class=\"fiche-card\" data-patient=\"";
                // line 856
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::lower($this->env->getCharset(), (isset($context["patientName"]) || array_key_exists("patientName", $context) ? $context["patientName"] : (function () { throw new RuntimeError('Variable "patientName" does not exist.', 856, $this->source); })())), "html", null, true);
                yield "\">

          <div class=\"fiche-card-header\">
            <div class=\"fiche-card-id\"><i class=\"fas fa-hashtag\"></i> Fiche #";
                // line 859
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "id", [], "any", false, false, false, 859), "html", null, true);
                yield "</div>
            <div class=\"fiche-card-date\">
              <i class=\"far fa-calendar-alt\"></i>
              ";
                // line 862
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "createdAt", [], "any", false, false, false, 862)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "createdAt", [], "any", false, false, false, 862), "d/m/Y"), "html", null, true)) : ("—"));
                yield "
            </div>
          </div>

          <div class=\"fiche-card-body\">
            <div class=\"fiche-patient-row\">
              <div class=\"fiche-patient-ico\"><i class=\"fas fa-user-circle\"></i></div>
              <div>
                <div class=\"fiche-patient-name\">";
                // line 870
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["patientName"]) || array_key_exists("patientName", $context) ? $context["patientName"] : (function () { throw new RuntimeError('Variable "patientName" does not exist.', 870, $this->source); })()), "html", null, true);
                yield "</div>
                <div class=\"fiche-patient-type\">Consultation</div>
              </div>
            </div>
            <div class=\"fiche-excerpt\">
              ";
                // line 875
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "notes", [], "any", false, false, false, 875), 0, 100), "html", null, true);
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "notes", [], "any", false, false, false, 875)) > 100)) {
                    yield "…";
                }
                // line 876
                yield "            </div>
          </div>

          <div class=\"fiche-card-footer\">
            <button class=\"fiche-act-btn view\"
              onclick='openFicheDrawer({
                id: ";
                // line 882
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "id", [], "any", false, false, false, 882), "html", null, true);
                yield ",
                date: ";
                // line 883
                yield json_encode($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "createdAt", [], "any", false, false, false, 883), "d/m/Y à H:i"));
                yield ",
                patient: ";
                // line 884
                yield json_encode((isset($context["patientName"]) || array_key_exists("patientName", $context) ? $context["patientName"] : (function () { throw new RuntimeError('Variable "patientName" does not exist.', 884, $this->source); })()));
                yield ",
                probleme: ";
                // line 885
                yield json_encode(CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "problemePrincipal", [], "any", false, false, false, 885));
                yield ",
                notes: ";
                // line 886
                yield json_encode(CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "notes", [], "any", false, false, false, 886));
                yield ",
                diagnostic: ";
                // line 887
                yield json_encode(CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "diagnostic", [], "any", false, false, false, 887));
                yield ",
                traitement: ";
                // line 888
                yield json_encode(CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "traitement", [], "any", false, false, false, 888));
                yield ",
                recommandations: ";
                // line 889
                yield json_encode(CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "recommandations", [], "any", false, false, false, 889));
                yield "
              })'>
              <i class=\"fas fa-eye\"></i> Voir
            </button>

            <button class=\"fiche-act-btn edit\"
              onclick=\"openEditFicheModal(
                '";
                // line 896
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "id", [], "any", false, false, false, 896), "html", null, true);
                yield "',
                '";
                // line 897
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "problemePrincipal", [], "any", false, false, false, 897), "js"), "html", null, true);
                yield "',
                '";
                // line 898
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "notes", [], "any", false, false, false, 898), "js"), "html", null, true);
                yield "',
                '";
                // line 899
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "diagnostic", [], "any", false, false, false, 899), "js"), "html", null, true);
                yield "',
                '";
                // line 900
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "traitement", [], "any", false, false, false, 900), "js"), "html", null, true);
                yield "',
                '";
                // line 901
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "recommandations", [], "any", false, false, false, 901), "js"), "html", null, true);
                yield "'
              )\">
              <i class=\"fas fa-edit\"></i> Modifier
            </button>

            <a class=\"fiche-act-btn pdf\"
               href=\"";
                // line 907
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("psy_fiche_pdf", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "id", [], "any", false, false, false, 907)]), "html", null, true);
                yield "\"
               target=\"_blank\">
              <i class=\"fas fa-file-pdf\"></i> PDF
            </a>

            <button class=\"fiche-act-btn del\"
                    onclick=\"openDeleteFicheModal(";
                // line 913
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["fiche"], "id", [], "any", false, false, false, 913), "html", null, true);
                yield ")\">
              <i class=\"fas fa-trash-alt\"></i>
            </button>
          </div>

        </div>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['fiche'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 920
            yield "    </div>

    ";
            // line 923
            yield "    ";
            if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["myFiches"]) || array_key_exists("myFiches", $context) ? $context["myFiches"] : (function () { throw new RuntimeError('Variable "myFiches" does not exist.', 923, $this->source); })()), "pageCount", [], "any", false, false, false, 923) > 1)) {
                // line 924
                yield "    <div class=\"fiche-pagination\">

      ";
                // line 927
                yield "      ";
                if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["myFiches"]) || array_key_exists("myFiches", $context) ? $context["myFiches"] : (function () { throw new RuntimeError('Variable "myFiches" does not exist.', 927, $this->source); })()), "currentPageNumber", [], "any", false, false, false, 927) > 1)) {
                    // line 928
                    yield "        <a class=\"fiche-page-btn prev-next\" href=\"#\"
           onclick=\"goToFichePage(";
                    // line 929
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((CoreExtension::getAttribute($this->env, $this->source, (isset($context["myFiches"]) || array_key_exists("myFiches", $context) ? $context["myFiches"] : (function () { throw new RuntimeError('Variable "myFiches" does not exist.', 929, $this->source); })()), "currentPageNumber", [], "any", false, false, false, 929) - 1), "html", null, true);
                    yield ")\">
          <i class=\"fas fa-chevron-left\"></i>
        </a>
      ";
                } else {
                    // line 933
                    yield "        <span class=\"fiche-page-btn prev-next disabled\">
          <i class=\"fas fa-chevron-left\"></i>
        </span>
      ";
                }
                // line 937
                yield "
      ";
                // line 939
                yield "      ";
                $context["current"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["myFiches"]) || array_key_exists("myFiches", $context) ? $context["myFiches"] : (function () { throw new RuntimeError('Variable "myFiches" does not exist.', 939, $this->source); })()), "currentPageNumber", [], "any", false, false, false, 939);
                // line 940
                yield "      ";
                $context["total"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["myFiches"]) || array_key_exists("myFiches", $context) ? $context["myFiches"] : (function () { throw new RuntimeError('Variable "myFiches" does not exist.', 940, $this->source); })()), "pageCount", [], "any", false, false, false, 940);
                // line 941
                yield "      ";
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(range(1, (isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 941, $this->source); })())));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 942
                    yield "        ";
                    if (((($context["i"] == 1) || ($context["i"] == (isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 942, $this->source); })()))) || (($context["i"] >= ((isset($context["current"]) || array_key_exists("current", $context) ? $context["current"] : (function () { throw new RuntimeError('Variable "current" does not exist.', 942, $this->source); })()) - 2)) && ($context["i"] <= ((isset($context["current"]) || array_key_exists("current", $context) ? $context["current"] : (function () { throw new RuntimeError('Variable "current" does not exist.', 942, $this->source); })()) + 2))))) {
                        // line 943
                        yield "          <a class=\"fiche-page-btn ";
                        yield ((($context["i"] == (isset($context["current"]) || array_key_exists("current", $context) ? $context["current"] : (function () { throw new RuntimeError('Variable "current" does not exist.', 943, $this->source); })()))) ? ("active") : (""));
                        yield "\"
             href=\"#\" onclick=\"goToFichePage(";
                        // line 944
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["i"], "html", null, true);
                        yield ")\">
            ";
                        // line 945
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["i"], "html", null, true);
                        yield "
          </a>
        ";
                    } elseif (((                    // line 947
$context["i"] == ((isset($context["current"]) || array_key_exists("current", $context) ? $context["current"] : (function () { throw new RuntimeError('Variable "current" does not exist.', 947, $this->source); })()) - 3)) || ($context["i"] == ((isset($context["current"]) || array_key_exists("current", $context) ? $context["current"] : (function () { throw new RuntimeError('Variable "current" does not exist.', 947, $this->source); })()) + 3)))) {
                        // line 948
                        yield "          <span class=\"fiche-page-ellipsis\">…</span>
        ";
                    }
                    // line 950
                    yield "      ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 951
                yield "
      ";
                // line 953
                yield "      ";
                if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["myFiches"]) || array_key_exists("myFiches", $context) ? $context["myFiches"] : (function () { throw new RuntimeError('Variable "myFiches" does not exist.', 953, $this->source); })()), "currentPageNumber", [], "any", false, false, false, 953) < CoreExtension::getAttribute($this->env, $this->source, (isset($context["myFiches"]) || array_key_exists("myFiches", $context) ? $context["myFiches"] : (function () { throw new RuntimeError('Variable "myFiches" does not exist.', 953, $this->source); })()), "pageCount", [], "any", false, false, false, 953))) {
                    // line 954
                    yield "        <a class=\"fiche-page-btn prev-next\" href=\"#\"
           onclick=\"goToFichePage(";
                    // line 955
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((CoreExtension::getAttribute($this->env, $this->source, (isset($context["myFiches"]) || array_key_exists("myFiches", $context) ? $context["myFiches"] : (function () { throw new RuntimeError('Variable "myFiches" does not exist.', 955, $this->source); })()), "currentPageNumber", [], "any", false, false, false, 955) + 1), "html", null, true);
                    yield ")\">
          <i class=\"fas fa-chevron-right\"></i>
        </a>
      ";
                } else {
                    // line 959
                    yield "        <span class=\"fiche-page-btn prev-next disabled\">
          <i class=\"fas fa-chevron-right\"></i>
        </span>
      ";
                }
                // line 963
                yield "
      <span class=\"fiche-page-info\">
        Page ";
                // line 965
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["myFiches"]) || array_key_exists("myFiches", $context) ? $context["myFiches"] : (function () { throw new RuntimeError('Variable "myFiches" does not exist.', 965, $this->source); })()), "currentPageNumber", [], "any", false, false, false, 965), "html", null, true);
                yield " / ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["myFiches"]) || array_key_exists("myFiches", $context) ? $context["myFiches"] : (function () { throw new RuntimeError('Variable "myFiches" does not exist.', 965, $this->source); })()), "pageCount", [], "any", false, false, false, 965), "html", null, true);
                yield "
        &nbsp;·&nbsp;
        ";
                // line 967
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["myFiches"]) || array_key_exists("myFiches", $context) ? $context["myFiches"] : (function () { throw new RuntimeError('Variable "myFiches" does not exist.', 967, $this->source); })()), "totalItemCount", [], "any", false, false, false, 967), "html", null, true);
                yield " fiche";
                yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["myFiches"]) || array_key_exists("myFiches", $context) ? $context["myFiches"] : (function () { throw new RuntimeError('Variable "myFiches" does not exist.', 967, $this->source); })()), "totalItemCount", [], "any", false, false, false, 967) > 1)) ? ("s") : (""));
                yield "
        ";
                // line 968
                if ((array_key_exists("search", $context) && ((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 968, $this->source); })()) != ""))) {
                    // line 969
                    yield "          &nbsp;·&nbsp; <em>« ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 969, $this->source); })()), "html", null, true);
                    yield " »</em>
        ";
                }
                // line 971
                yield "      </span>

    </div>
    ";
            }
            // line 975
            yield "
  ";
        }
        // line 977
        yield "</section>
";
        // line 978
        yield from $this->load("home/psy_conge_section.html.twig", 978)->unwrap()->yield($context);
        // line 979
        yield "
    </main>
  </div>";
        // line 982
        yield "</div>";
        // line 983
        yield "
";
        // line 985
        yield "<div class=\"modal-backdrop\" id=\"modalCreateSlot\"
     ";
        // line 986
        if ((array_key_exists("showCreateModal", $context) && (isset($context["showCreateModal"]) || array_key_exists("showCreateModal", $context) ? $context["showCreateModal"] : (function () { throw new RuntimeError('Variable "showCreateModal" does not exist.', 986, $this->source); })()))) {
            yield "style=\"display:flex\"";
        }
        yield ">
  <div class=\"modal-box\">
    <div class=\"modal-hdr\">
      <button class=\"modal-close\" onclick=\"closeModal('modalCreateSlot')\"><i class=\"fas fa-times\"></i></button>
      <div class=\"modal-hdr-title\">Nouveau <em>créneau</em></div>
      <div class=\"modal-hdr-sub\">Définissez votre disponibilité hebdomadaire</div>
    </div>
    <form action=\"";
        // line 993
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("psy_slot_create");
        yield "\" method=\"post\" novalidate>
      <div class=\"modal-body\">

        <div class=\"form-group\">
          <label class=\"form-label\">Jour de la semaine</label>
          <select name=\"dateRendezVous\"
                  class=\"form-control ";
        // line 999
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["fieldErrors"] ?? null), "dateRendezVous", [], "any", true, true, false, 999)) {
            yield "input-error";
        }
        yield "\">
            <option value=\"\">— Choisir —</option>
            ";
        // line 1001
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"]);
        foreach ($context['_seq'] as $context["_key"] => $context["jour"]) {
            // line 1002
            yield "              <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["jour"], "html", null, true);
            yield "\"
                ";
            // line 1003
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["oldInput"] ?? null), "dateRendezVous", [], "any", true, true, false, 1003) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["oldInput"]) || array_key_exists("oldInput", $context) ? $context["oldInput"] : (function () { throw new RuntimeError('Variable "oldInput" does not exist.', 1003, $this->source); })()), "dateRendezVous", [], "any", false, false, false, 1003) == $context["jour"]))) {
                yield "selected";
            }
            yield ">
                ";
            // line 1004
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["jour"], "html", null, true);
            yield "
              </option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['jour'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1007
        yield "          </select>
          ";
        // line 1008
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["fieldErrors"] ?? null), "dateRendezVous", [], "any", true, true, false, 1008)) {
            // line 1009
            yield "            <small class=\"text-danger\"><i class=\"fas fa-exclamation-circle\"></i> ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["fieldErrors"]) || array_key_exists("fieldErrors", $context) ? $context["fieldErrors"] : (function () { throw new RuntimeError('Variable "fieldErrors" does not exist.', 1009, $this->source); })()), "dateRendezVous", [], "any", false, false, false, 1009), "html", null, true);
            yield "</small>
          ";
        }
        // line 1011
        yield "        </div>

        <div class=\"form-row\">
          <div class=\"form-group\">
            <label class=\"form-label\">Heure de début</label>
            <input type=\"time\" name=\"heureDebut\"
                   class=\"form-control ";
        // line 1017
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["fieldErrors"] ?? null), "heureDebut", [], "any", true, true, false, 1017)) {
            yield "input-error";
        }
        yield "\"
                   value=\"";
        // line 1018
        yield ((CoreExtension::getAttribute($this->env, $this->source, ($context["oldInput"] ?? null), "heureDebut", [], "any", true, true, false, 1018)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["oldInput"]) || array_key_exists("oldInput", $context) ? $context["oldInput"] : (function () { throw new RuntimeError('Variable "oldInput" does not exist.', 1018, $this->source); })()), "heureDebut", [], "any", false, false, false, 1018), "html", null, true)) : (""));
        yield "\">
            ";
        // line 1019
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["fieldErrors"] ?? null), "heureDebut", [], "any", true, true, false, 1019)) {
            // line 1020
            yield "              <small class=\"text-danger\"><i class=\"fas fa-exclamation-circle\"></i> ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["fieldErrors"]) || array_key_exists("fieldErrors", $context) ? $context["fieldErrors"] : (function () { throw new RuntimeError('Variable "fieldErrors" does not exist.', 1020, $this->source); })()), "heureDebut", [], "any", false, false, false, 1020), "html", null, true);
            yield "</small>
            ";
        }
        // line 1022
        yield "          </div>
          <div class=\"form-group\">
            <label class=\"form-label\">Heure de fin</label>
            <input type=\"time\" name=\"heureFin\"
                   class=\"form-control ";
        // line 1026
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["fieldErrors"] ?? null), "heureFin", [], "any", true, true, false, 1026)) {
            yield "input-error";
        }
        yield "\"
                   value=\"";
        // line 1027
        yield ((CoreExtension::getAttribute($this->env, $this->source, ($context["oldInput"] ?? null), "heureFin", [], "any", true, true, false, 1027)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["oldInput"]) || array_key_exists("oldInput", $context) ? $context["oldInput"] : (function () { throw new RuntimeError('Variable "oldInput" does not exist.', 1027, $this->source); })()), "heureFin", [], "any", false, false, false, 1027), "html", null, true)) : (""));
        yield "\">
            ";
        // line 1028
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["fieldErrors"] ?? null), "heureFin", [], "any", true, true, false, 1028)) {
            // line 1029
            yield "              <small class=\"text-danger\"><i class=\"fas fa-exclamation-circle\"></i> ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["fieldErrors"]) || array_key_exists("fieldErrors", $context) ? $context["fieldErrors"] : (function () { throw new RuntimeError('Variable "fieldErrors" does not exist.', 1029, $this->source); })()), "heureFin", [], "any", false, false, false, 1029), "html", null, true);
            yield "</small>
            ";
        }
        // line 1031
        yield "          </div>
        </div>

        <div class=\"form-group\">
          <label class=\"form-label\">Type de séance</label>
          <select name=\"typeSeance\"
                  class=\"form-control ";
        // line 1037
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["fieldErrors"] ?? null), "typeSeance", [], "any", true, true, false, 1037)) {
            yield "input-error";
        }
        yield "\">
            <option value=\"Présentiel\"
              ";
        // line 1039
        if (( !CoreExtension::getAttribute($this->env, $this->source, ($context["oldInput"] ?? null), "typeSeance", [], "any", true, true, false, 1039) || (CoreExtension::getAttribute($this->env, $this->source, (isset($context["oldInput"]) || array_key_exists("oldInput", $context) ? $context["oldInput"] : (function () { throw new RuntimeError('Variable "oldInput" does not exist.', 1039, $this->source); })()), "typeSeance", [], "any", false, false, false, 1039) == "Présentiel"))) {
            yield "selected";
        }
        yield ">
              🏢 Présentiel
            </option>
            <option value=\"en_ligne\"
              ";
        // line 1043
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["oldInput"] ?? null), "typeSeance", [], "any", true, true, false, 1043) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["oldInput"]) || array_key_exists("oldInput", $context) ? $context["oldInput"] : (function () { throw new RuntimeError('Variable "oldInput" does not exist.', 1043, $this->source); })()), "typeSeance", [], "any", false, false, false, 1043) == "en_ligne"))) {
            yield "selected";
        }
        yield ">
              💻 En ligne
            </option>
          </select>
          ";
        // line 1047
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["fieldErrors"] ?? null), "typeSeance", [], "any", true, true, false, 1047)) {
            // line 1048
            yield "            <small class=\"text-danger\"><i class=\"fas fa-exclamation-circle\"></i> ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["fieldErrors"]) || array_key_exists("fieldErrors", $context) ? $context["fieldErrors"] : (function () { throw new RuntimeError('Variable "fieldErrors" does not exist.', 1048, $this->source); })()), "typeSeance", [], "any", false, false, false, 1048), "html", null, true);
            yield "</small>
          ";
        }
        // line 1050
        yield "        </div>

        <div class=\"form-group\">
          <label class=\"form-label\">Statut</label>
          <select name=\"statut\" class=\"form-control\">
            <option value=\"Pas encore pris\">✅ Disponible</option>
          </select>
        </div>

      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"modal-btn cancel\" onclick=\"closeModal('modalCreateSlot')\">Annuler</button>
        <button type=\"submit\" class=\"modal-btn submit\"><i class=\"fas fa-save\"></i> Enregistrer</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal Modifier créneau -->
<div class=\"modal-backdrop\" id=\"modalEditSlot\" ";
        // line 1069
        if ((array_key_exists("showEditModal", $context) && (isset($context["showEditModal"]) || array_key_exists("showEditModal", $context) ? $context["showEditModal"] : (function () { throw new RuntimeError('Variable "showEditModal" does not exist.', 1069, $this->source); })()))) {
            yield "style=\"display:flex\"";
        }
        yield ">
  <div class=\"modal-box\">
    <div class=\"modal-hdr\">
      <button class=\"modal-close\" onclick=\"closeModal('modalEditSlot')\"><i class=\"fas fa-times\"></i></button>
      <div class=\"modal-hdr-title\">Modifier le <em>créneau</em></div>
      <div class=\"modal-hdr-sub\">Mettez à jour votre disponibilité</div>
    </div>
    <form id=\"editSlotForm\" method=\"post\"
          action=\"";
        // line 1077
        yield ((array_key_exists("editSlot", $context)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("psy_slot_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["editSlot"]) || array_key_exists("editSlot", $context) ? $context["editSlot"] : (function () { throw new RuntimeError('Variable "editSlot" does not exist.', 1077, $this->source); })()), "id", [], "any", false, false, false, 1077)]), "html", null, true)) : ("#"));
        yield "\"
          novalidate>
      <div class=\"modal-body\">

        <div class=\"form-group\">
          <label class=\"form-label\">Jour de la semaine</label>
          <select name=\"dateRendezVous\" id=\"editSlotJour\" class=\"form-control ";
        // line 1083
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["fieldErrorsEdit"] ?? null), "dateRendezVous", [], "any", true, true, false, 1083)) {
            yield "input-error";
        }
        yield "\">
            ";
        // line 1084
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(["Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi"]);
        foreach ($context['_seq'] as $context["_key"] => $context["jour"]) {
            // line 1085
            yield "              <option value=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["jour"], "html", null, true);
            yield "\"
                ";
            // line 1086
            if ((array_key_exists("editSlot", $context) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["editSlot"]) || array_key_exists("editSlot", $context) ? $context["editSlot"] : (function () { throw new RuntimeError('Variable "editSlot" does not exist.', 1086, $this->source); })()), "dateRendezVous", [], "any", false, false, false, 1086) == $context["jour"]))) {
                yield "selected";
            }
            yield ">
                ";
            // line 1087
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["jour"], "html", null, true);
            yield "
              </option>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['jour'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 1090
        yield "          </select>
          ";
        // line 1091
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["fieldErrorsEdit"] ?? null), "dateRendezVous", [], "any", true, true, false, 1091)) {
            // line 1092
            yield "            <small class=\"text-danger\"><i class=\"fas fa-exclamation-circle\"></i> ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["fieldErrorsEdit"]) || array_key_exists("fieldErrorsEdit", $context) ? $context["fieldErrorsEdit"] : (function () { throw new RuntimeError('Variable "fieldErrorsEdit" does not exist.', 1092, $this->source); })()), "dateRendezVous", [], "any", false, false, false, 1092), "html", null, true);
            yield "</small>
          ";
        }
        // line 1094
        yield "        </div>

        <div class=\"form-row\">
          <div class=\"form-group\">
            <label class=\"form-label\">Heure de début</label>
            <input type=\"time\" name=\"heureDebut\" id=\"editSlotDebut\"
                   class=\"form-control ";
        // line 1100
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["fieldErrorsEdit"] ?? null), "heureDebut", [], "any", true, true, false, 1100)) {
            yield "input-error";
        }
        yield "\"
                   value=\"";
        // line 1101
        yield (((array_key_exists("editSlot", $context) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["editSlot"]) || array_key_exists("editSlot", $context) ? $context["editSlot"] : (function () { throw new RuntimeError('Variable "editSlot" does not exist.', 1101, $this->source); })()), "heureDebut", [], "any", false, false, false, 1101))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editSlot"]) || array_key_exists("editSlot", $context) ? $context["editSlot"] : (function () { throw new RuntimeError('Variable "editSlot" does not exist.', 1101, $this->source); })()), "heureDebut", [], "any", false, false, false, 1101), "H:i"), "html", null, true)) : (""));
        yield "\">
            ";
        // line 1102
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["fieldErrorsEdit"] ?? null), "heureDebut", [], "any", true, true, false, 1102)) {
            // line 1103
            yield "              <small class=\"text-danger\"><i class=\"fas fa-exclamation-circle\"></i> ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["fieldErrorsEdit"]) || array_key_exists("fieldErrorsEdit", $context) ? $context["fieldErrorsEdit"] : (function () { throw new RuntimeError('Variable "fieldErrorsEdit" does not exist.', 1103, $this->source); })()), "heureDebut", [], "any", false, false, false, 1103), "html", null, true);
            yield "</small>
            ";
        }
        // line 1105
        yield "          </div>
          <div class=\"form-group\">
            <label class=\"form-label\">Heure de fin</label>
            <input type=\"time\" name=\"heureFin\" id=\"editSlotFin\"
                   class=\"form-control ";
        // line 1109
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["fieldErrorsEdit"] ?? null), "heureFin", [], "any", true, true, false, 1109)) {
            yield "input-error";
        }
        yield "\"
                   value=\"";
        // line 1110
        yield (((array_key_exists("editSlot", $context) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["editSlot"]) || array_key_exists("editSlot", $context) ? $context["editSlot"] : (function () { throw new RuntimeError('Variable "editSlot" does not exist.', 1110, $this->source); })()), "heureFin", [], "any", false, false, false, 1110))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editSlot"]) || array_key_exists("editSlot", $context) ? $context["editSlot"] : (function () { throw new RuntimeError('Variable "editSlot" does not exist.', 1110, $this->source); })()), "heureFin", [], "any", false, false, false, 1110), "H:i"), "html", null, true)) : (""));
        yield "\">
            ";
        // line 1111
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["fieldErrorsEdit"] ?? null), "heureFin", [], "any", true, true, false, 1111)) {
            // line 1112
            yield "              <small class=\"text-danger\"><i class=\"fas fa-exclamation-circle\"></i> ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["fieldErrorsEdit"]) || array_key_exists("fieldErrorsEdit", $context) ? $context["fieldErrorsEdit"] : (function () { throw new RuntimeError('Variable "fieldErrorsEdit" does not exist.', 1112, $this->source); })()), "heureFin", [], "any", false, false, false, 1112), "html", null, true);
            yield "</small>
            ";
        }
        // line 1114
        yield "          </div>
        </div>

        <div class=\"form-group\">
          <label class=\"form-label\">Type de séance</label>
          <select name=\"typeSeance\" id=\"editSlotType\"
                  class=\"form-control ";
        // line 1120
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["fieldErrorsEdit"] ?? null), "typeSeance", [], "any", true, true, false, 1120)) {
            yield "input-error";
        }
        yield "\">
            <option value=\"Présentiel\" ";
        // line 1121
        if ((array_key_exists("editSlot", $context) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["editSlot"]) || array_key_exists("editSlot", $context) ? $context["editSlot"] : (function () { throw new RuntimeError('Variable "editSlot" does not exist.', 1121, $this->source); })()), "typeSeance", [], "any", false, false, false, 1121) == "Présentiel"))) {
            yield "selected";
        }
        yield ">🏢 Présentiel</option>
            <option value=\"en_ligne\"   ";
        // line 1122
        if ((array_key_exists("editSlot", $context) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["editSlot"]) || array_key_exists("editSlot", $context) ? $context["editSlot"] : (function () { throw new RuntimeError('Variable "editSlot" does not exist.', 1122, $this->source); })()), "typeSeance", [], "any", false, false, false, 1122) == "en_ligne"))) {
            yield "selected";
        }
        yield ">💻 En ligne</option>
          </select>
          ";
        // line 1124
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["fieldErrorsEdit"] ?? null), "typeSeance", [], "any", true, true, false, 1124)) {
            // line 1125
            yield "            <small class=\"text-danger\"><i class=\"fas fa-exclamation-circle\"></i> ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["fieldErrorsEdit"]) || array_key_exists("fieldErrorsEdit", $context) ? $context["fieldErrorsEdit"] : (function () { throw new RuntimeError('Variable "fieldErrorsEdit" does not exist.', 1125, $this->source); })()), "typeSeance", [], "any", false, false, false, 1125), "html", null, true);
            yield "</small>
          ";
        }
        // line 1127
        yield "        </div>

        <div class=\"form-group\">
          <label class=\"form-label\">Statut</label>
          <select name=\"statut\" id=\"editSlotStatut\" class=\"form-control\">
            <option value=\"Pas encore pris\" ";
        // line 1132
        if ((array_key_exists("editSlot", $context) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["editSlot"]) || array_key_exists("editSlot", $context) ? $context["editSlot"] : (function () { throw new RuntimeError('Variable "editSlot" does not exist.', 1132, $this->source); })()), "statut", [], "any", false, false, false, 1132) == "Pas encore pris"))) {
            yield "selected";
        }
        yield ">✅ Disponible</option>
            <option value=\"Confirmé\"         ";
        // line 1133
        if ((array_key_exists("editSlot", $context) && (CoreExtension::getAttribute($this->env, $this->source, (isset($context["editSlot"]) || array_key_exists("editSlot", $context) ? $context["editSlot"] : (function () { throw new RuntimeError('Variable "editSlot" does not exist.', 1133, $this->source); })()), "statut", [], "any", false, false, false, 1133) == "Confirmé"))) {
            yield "selected";
        }
        yield ">❌ Non Disponible</option>
          </select>
        </div>

      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"modal-btn cancel\" onclick=\"closeModal('modalEditSlot')\">Annuler</button>
        <button type=\"submit\" class=\"modal-btn submit\"><i class=\"fas fa-save\"></i> Mettre à jour</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal Supprimer créneau -->
<div class=\"modal-backdrop\" id=\"modalDeleteSlot\">
  <div class=\"modal-box modal-box-sm\">
    <div class=\"modal-body\" style=\"text-align:center; padding-top:32px;\">
      <div class=\"del-modal-icon\"><i class=\"fas fa-trash-alt\"></i></div>
      <div class=\"del-modal-title\">Supprimer ce créneau ?</div>
      <div class=\"del-modal-sub\">Cette action est irréversible. Le créneau sera définitivement supprimé.</div>
    </div>
    <div class=\"modal-footer\" style=\"justify-content:center; gap:12px;\">
      <button class=\"modal-btn cancel\" onclick=\"closeModal('modalDeleteSlot')\">Annuler</button>
      <form id=\"deleteSlotForm\" method=\"post\" style=\"display:inline;\">
        <button type=\"submit\" class=\"modal-btn danger\"><i class=\"fas fa-trash-alt\"></i> Supprimer</button>
      </form>
    </div>
  </div>
</div>

<!-- Modal Créer fiche -->
<div class=\"modal-backdrop\" id=\"modalCreateFiche\"
     ";
        // line 1165
        if ((array_key_exists("showCreateFiche", $context) && (isset($context["showCreateFiche"]) || array_key_exists("showCreateFiche", $context) ? $context["showCreateFiche"] : (function () { throw new RuntimeError('Variable "showCreateFiche" does not exist.', 1165, $this->source); })()))) {
            yield "style=\"display:flex\"";
        }
        yield ">
  <div class=\"modal-box\">
    <div class=\"modal-hdr\">
      <button class=\"modal-close\" onclick=\"closeModal('modalCreateFiche')\"><i class=\"fas fa-times\"></i></button>
      <div class=\"modal-hdr-title\">Nouvelle <em>fiche</em></div>
      <div class=\"modal-hdr-sub\">Rédigez votre compte-rendu de consultation</div>
    </div>
    <form action=\"";
        // line 1172
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("psy_fiche_create");
        yield "\" method=\"post\" novalidate>
      <input type=\"hidden\" name=\"reservation_id\" id=\"ficheResaId\"
             value=\"";
        // line 1174
        yield ((CoreExtension::getAttribute($this->env, $this->source, ($context["ficheOldInput"] ?? null), "reservation_id", [], "any", true, true, false, 1174)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["ficheOldInput"]) || array_key_exists("ficheOldInput", $context) ? $context["ficheOldInput"] : (function () { throw new RuntimeError('Variable "ficheOldInput" does not exist.', 1174, $this->source); })()), "reservation_id", [], "any", false, false, false, 1174), "html", null, true)) : (""));
        yield "\">
      <input type=\"hidden\" name=\"rendezVous\" id=\"ficheRdvId\"
             value=\"";
        // line 1176
        yield ((CoreExtension::getAttribute($this->env, $this->source, ($context["ficheOldInput"] ?? null), "rendezVous", [], "any", true, true, false, 1176)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["ficheOldInput"]) || array_key_exists("ficheOldInput", $context) ? $context["ficheOldInput"] : (function () { throw new RuntimeError('Variable "ficheOldInput" does not exist.', 1176, $this->source); })()), "rendezVous", [], "any", false, false, false, 1176), "html", null, true)) : (""));
        yield "\">

      <div class=\"modal-body\">

        <div class=\"form-group\">
          <label class=\"form-label\">Patient</label>
          <input type=\"text\" id=\"fichePatientName\" class=\"form-control\" readonly
                 style=\"background:var(--cream-dark);\"
                 value=\"";
        // line 1184
        yield ((CoreExtension::getAttribute($this->env, $this->source, ($context["ficheOldInput"] ?? null), "patientName", [], "any", true, true, false, 1184)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["ficheOldInput"]) || array_key_exists("ficheOldInput", $context) ? $context["ficheOldInput"] : (function () { throw new RuntimeError('Variable "ficheOldInput" does not exist.', 1184, $this->source); })()), "patientName", [], "any", false, false, false, 1184), "html", null, true)) : (""));
        yield "\">
        </div>

        <div class=\"form-group\">
          <label class=\"form-label\">Problème principal <span class=\"required\">*</span></label>
          <textarea name=\"probleme_principal\"
                    class=\"form-control ";
        // line 1190
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["ficheErrors"] ?? null), "probleme_principal", [], "any", true, true, false, 1190)) {
            yield "input-error";
        }
        yield "\"
                    rows=\"2\"
                    placeholder=\"Ex: Anxiété généralisée, dépression...\">";
        // line 1192
        yield ((CoreExtension::getAttribute($this->env, $this->source, ($context["ficheOldInput"] ?? null), "probleme_principal", [], "any", true, true, false, 1192)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["ficheOldInput"]) || array_key_exists("ficheOldInput", $context) ? $context["ficheOldInput"] : (function () { throw new RuntimeError('Variable "ficheOldInput" does not exist.', 1192, $this->source); })()), "probleme_principal", [], "any", false, false, false, 1192), "html", null, true)) : (""));
        yield "</textarea>
          ";
        // line 1193
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["ficheErrors"] ?? null), "probleme_principal", [], "any", true, true, false, 1193)) {
            // line 1194
            yield "            <small class=\"text-danger\"><i class=\"fas fa-exclamation-circle\"></i> ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["ficheErrors"]) || array_key_exists("ficheErrors", $context) ? $context["ficheErrors"] : (function () { throw new RuntimeError('Variable "ficheErrors" does not exist.', 1194, $this->source); })()), "probleme_principal", [], "any", false, false, false, 1194), "html", null, true);
            yield "</small>
          ";
        }
        // line 1196
        yield "        </div>

        <div class=\"form-group\">
          <label class=\"form-label\">Notes cliniques <span class=\"required\">*</span></label>
          <textarea name=\"notes\"
                    class=\"form-control ";
        // line 1201
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["ficheErrors"] ?? null), "notes", [], "any", true, true, false, 1201)) {
            yield "input-error";
        }
        yield "\"
                    rows=\"4\"
                    placeholder=\"Observations, éléments cliniques importants...\">";
        // line 1203
        yield ((CoreExtension::getAttribute($this->env, $this->source, ($context["ficheOldInput"] ?? null), "notes", [], "any", true, true, false, 1203)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["ficheOldInput"]) || array_key_exists("ficheOldInput", $context) ? $context["ficheOldInput"] : (function () { throw new RuntimeError('Variable "ficheOldInput" does not exist.', 1203, $this->source); })()), "notes", [], "any", false, false, false, 1203), "html", null, true)) : (""));
        yield "</textarea>
          ";
        // line 1204
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["ficheErrors"] ?? null), "notes", [], "any", true, true, false, 1204)) {
            // line 1205
            yield "            <small class=\"text-danger\"><i class=\"fas fa-exclamation-circle\"></i> ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["ficheErrors"]) || array_key_exists("ficheErrors", $context) ? $context["ficheErrors"] : (function () { throw new RuntimeError('Variable "ficheErrors" does not exist.', 1205, $this->source); })()), "notes", [], "any", false, false, false, 1205), "html", null, true);
            yield "</small>
          ";
        }
        // line 1207
        yield "        </div>

        <div class=\"form-group\">
          <label class=\"form-label\">Diagnostic <span class=\"required\">*</span></label>
          <textarea name=\"diagnostic\"
                    class=\"form-control ";
        // line 1212
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["ficheErrors"] ?? null), "diagnostic", [], "any", true, true, false, 1212)) {
            yield "input-error";
        }
        yield "\"
                    rows=\"3\"
                    placeholder=\"Diagnostic établi...\">";
        // line 1214
        yield ((CoreExtension::getAttribute($this->env, $this->source, ($context["ficheOldInput"] ?? null), "diagnostic", [], "any", true, true, false, 1214)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["ficheOldInput"]) || array_key_exists("ficheOldInput", $context) ? $context["ficheOldInput"] : (function () { throw new RuntimeError('Variable "ficheOldInput" does not exist.', 1214, $this->source); })()), "diagnostic", [], "any", false, false, false, 1214), "html", null, true)) : (""));
        yield "</textarea>
          ";
        // line 1215
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["ficheErrors"] ?? null), "diagnostic", [], "any", true, true, false, 1215)) {
            // line 1216
            yield "            <small class=\"text-danger\"><i class=\"fas fa-exclamation-circle\"></i> ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["ficheErrors"]) || array_key_exists("ficheErrors", $context) ? $context["ficheErrors"] : (function () { throw new RuntimeError('Variable "ficheErrors" does not exist.', 1216, $this->source); })()), "diagnostic", [], "any", false, false, false, 1216), "html", null, true);
            yield "</small>
          ";
        }
        // line 1218
        yield "        </div>

        <div class=\"form-group\">
          <label class=\"form-label\">Traitement <span class=\"required\">*</span></label>
          <textarea name=\"traitement\"
                    class=\"form-control ";
        // line 1223
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["ficheErrors"] ?? null), "traitement", [], "any", true, true, false, 1223)) {
            yield "input-error";
        }
        yield "\"
                    rows=\"3\"
                    placeholder=\"Traitement prescrit ou recommandé...\">";
        // line 1225
        yield ((CoreExtension::getAttribute($this->env, $this->source, ($context["ficheOldInput"] ?? null), "traitement", [], "any", true, true, false, 1225)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["ficheOldInput"]) || array_key_exists("ficheOldInput", $context) ? $context["ficheOldInput"] : (function () { throw new RuntimeError('Variable "ficheOldInput" does not exist.', 1225, $this->source); })()), "traitement", [], "any", false, false, false, 1225), "html", null, true)) : (""));
        yield "</textarea>
          ";
        // line 1226
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["ficheErrors"] ?? null), "traitement", [], "any", true, true, false, 1226)) {
            // line 1227
            yield "            <small class=\"text-danger\"><i class=\"fas fa-exclamation-circle\"></i> ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["ficheErrors"]) || array_key_exists("ficheErrors", $context) ? $context["ficheErrors"] : (function () { throw new RuntimeError('Variable "ficheErrors" does not exist.', 1227, $this->source); })()), "traitement", [], "any", false, false, false, 1227), "html", null, true);
            yield "</small>
          ";
        }
        // line 1229
        yield "        </div>

        <div class=\"form-group\">
          <label class=\"form-label\">Recommandations <span class=\"required\">*</span></label>
          <textarea name=\"recommandations\"
                    class=\"form-control ";
        // line 1234
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["ficheErrors"] ?? null), "recommandations", [], "any", true, true, false, 1234)) {
            yield "input-error";
        }
        yield "\"
                    rows=\"3\"
                    placeholder=\"Recommandations au patient...\">";
        // line 1236
        yield ((CoreExtension::getAttribute($this->env, $this->source, ($context["ficheOldInput"] ?? null), "recommandations", [], "any", true, true, false, 1236)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["ficheOldInput"]) || array_key_exists("ficheOldInput", $context) ? $context["ficheOldInput"] : (function () { throw new RuntimeError('Variable "ficheOldInput" does not exist.', 1236, $this->source); })()), "recommandations", [], "any", false, false, false, 1236), "html", null, true)) : (""));
        yield "</textarea>
          ";
        // line 1237
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["ficheErrors"] ?? null), "recommandations", [], "any", true, true, false, 1237)) {
            // line 1238
            yield "            <small class=\"text-danger\"><i class=\"fas fa-exclamation-circle\"></i> ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["ficheErrors"]) || array_key_exists("ficheErrors", $context) ? $context["ficheErrors"] : (function () { throw new RuntimeError('Variable "ficheErrors" does not exist.', 1238, $this->source); })()), "recommandations", [], "any", false, false, false, 1238), "html", null, true);
            yield "</small>
          ";
        }
        // line 1240
        yield "        </div>

      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"modal-btn cancel\" onclick=\"closeModal('modalCreateFiche')\">Annuler</button>
        <button type=\"submit\" class=\"modal-btn submit\"><i class=\"fas fa-save\"></i> Enregistrer</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal Modifier fiche -->
<div class=\"modal-backdrop\" id=\"modalEditFiche\"
     ";
        // line 1253
        if ((array_key_exists("showEditFiche", $context) && (isset($context["showEditFiche"]) || array_key_exists("showEditFiche", $context) ? $context["showEditFiche"] : (function () { throw new RuntimeError('Variable "showEditFiche" does not exist.', 1253, $this->source); })()))) {
            yield "style=\"display:flex\"";
        }
        yield ">
  <div class=\"modal-box\">
    <div class=\"modal-hdr\">
      <button type=\"button\" class=\"modal-close\" onclick=\"closeModal('modalEditFiche')\">
        <i class=\"fas fa-times\"></i>
      </button>
      <div class=\"modal-hdr-title\">Modifier la <em>fiche</em></div>
      <div class=\"modal-hdr-sub\">Mettez à jour les informations</div>
    </div>

    <form id=\"editFicheForm\" method=\"post\"
          action=\"";
        // line 1264
        yield ((array_key_exists("editFiche", $context)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("psy_fiche_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["editFiche"]) || array_key_exists("editFiche", $context) ? $context["editFiche"] : (function () { throw new RuntimeError('Variable "editFiche" does not exist.', 1264, $this->source); })()), "id", [], "any", false, false, false, 1264)]), "html", null, true)) : ("#"));
        yield "\"
          novalidate>
      <div class=\"modal-body\">

        <div class=\"form-group\">
          <label>Problème principal</label>
          <textarea name=\"probleme_principal\" id=\"editProbleme\"
                    class=\"form-control ";
        // line 1271
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["ficheErrorsEdit"] ?? null), "problemePrincipal", [], "any", true, true, false, 1271)) {
            yield "input-error";
        }
        yield "\"
                    rows=\"2\">";
        // line 1272
        yield ((array_key_exists("editFiche", $context)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editFiche"]) || array_key_exists("editFiche", $context) ? $context["editFiche"] : (function () { throw new RuntimeError('Variable "editFiche" does not exist.', 1272, $this->source); })()), "problemePrincipal", [], "any", false, false, false, 1272), "html", null, true)) : (""));
        yield "</textarea>
          ";
        // line 1273
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["ficheErrorsEdit"] ?? null), "problemePrincipal", [], "any", true, true, false, 1273)) {
            // line 1274
            yield "            <small class=\"text-danger\"><i class=\"fas fa-exclamation-circle\"></i> ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["ficheErrorsEdit"]) || array_key_exists("ficheErrorsEdit", $context) ? $context["ficheErrorsEdit"] : (function () { throw new RuntimeError('Variable "ficheErrorsEdit" does not exist.', 1274, $this->source); })()), "problemePrincipal", [], "any", false, false, false, 1274), "html", null, true);
            yield "</small>
          ";
        }
        // line 1276
        yield "        </div>

        <div class=\"form-group\">
          <label>Notes cliniques</label>
          <textarea name=\"notes\" id=\"editNotes\"
                    class=\"form-control ";
        // line 1281
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["ficheErrorsEdit"] ?? null), "notes", [], "any", true, true, false, 1281)) {
            yield "input-error";
        }
        yield "\"
                    rows=\"4\">";
        // line 1282
        yield ((array_key_exists("editFiche", $context)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editFiche"]) || array_key_exists("editFiche", $context) ? $context["editFiche"] : (function () { throw new RuntimeError('Variable "editFiche" does not exist.', 1282, $this->source); })()), "notes", [], "any", false, false, false, 1282), "html", null, true)) : (""));
        yield "</textarea>
          ";
        // line 1283
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["ficheErrorsEdit"] ?? null), "notes", [], "any", true, true, false, 1283)) {
            // line 1284
            yield "            <small class=\"text-danger\"><i class=\"fas fa-exclamation-circle\"></i> ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["ficheErrorsEdit"]) || array_key_exists("ficheErrorsEdit", $context) ? $context["ficheErrorsEdit"] : (function () { throw new RuntimeError('Variable "ficheErrorsEdit" does not exist.', 1284, $this->source); })()), "notes", [], "any", false, false, false, 1284), "html", null, true);
            yield "</small>
          ";
        }
        // line 1286
        yield "        </div>

        <div class=\"form-group\">
          <label>Diagnostic</label>
          <textarea name=\"diagnostic\" id=\"editDiagnostic\"
                    class=\"form-control ";
        // line 1291
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["ficheErrorsEdit"] ?? null), "diagnostic", [], "any", true, true, false, 1291)) {
            yield "input-error";
        }
        yield "\"
                    rows=\"3\">";
        // line 1292
        yield ((array_key_exists("editFiche", $context)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editFiche"]) || array_key_exists("editFiche", $context) ? $context["editFiche"] : (function () { throw new RuntimeError('Variable "editFiche" does not exist.', 1292, $this->source); })()), "diagnostic", [], "any", false, false, false, 1292), "html", null, true)) : (""));
        yield "</textarea>
          ";
        // line 1293
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["ficheErrorsEdit"] ?? null), "diagnostic", [], "any", true, true, false, 1293)) {
            // line 1294
            yield "            <small class=\"text-danger\"><i class=\"fas fa-exclamation-circle\"></i> ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["ficheErrorsEdit"]) || array_key_exists("ficheErrorsEdit", $context) ? $context["ficheErrorsEdit"] : (function () { throw new RuntimeError('Variable "ficheErrorsEdit" does not exist.', 1294, $this->source); })()), "diagnostic", [], "any", false, false, false, 1294), "html", null, true);
            yield "</small>
          ";
        }
        // line 1296
        yield "        </div>

        <div class=\"form-group\">
          <label>Traitement</label>
          <textarea name=\"traitement\" id=\"editTraitement\"
                    class=\"form-control ";
        // line 1301
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["ficheErrorsEdit"] ?? null), "traitement", [], "any", true, true, false, 1301)) {
            yield "input-error";
        }
        yield "\"
                    rows=\"3\">";
        // line 1302
        yield ((array_key_exists("editFiche", $context)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editFiche"]) || array_key_exists("editFiche", $context) ? $context["editFiche"] : (function () { throw new RuntimeError('Variable "editFiche" does not exist.', 1302, $this->source); })()), "traitement", [], "any", false, false, false, 1302), "html", null, true)) : (""));
        yield "</textarea>
          ";
        // line 1303
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["ficheErrorsEdit"] ?? null), "traitement", [], "any", true, true, false, 1303)) {
            // line 1304
            yield "            <small class=\"text-danger\"><i class=\"fas fa-exclamation-circle\"></i> ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["ficheErrorsEdit"]) || array_key_exists("ficheErrorsEdit", $context) ? $context["ficheErrorsEdit"] : (function () { throw new RuntimeError('Variable "ficheErrorsEdit" does not exist.', 1304, $this->source); })()), "traitement", [], "any", false, false, false, 1304), "html", null, true);
            yield "</small>
          ";
        }
        // line 1306
        yield "        </div>

        <div class=\"form-group\">
          <label>Recommandations</label>
          <textarea name=\"recommandations\" id=\"editRecommandations\"
                    class=\"form-control ";
        // line 1311
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["ficheErrorsEdit"] ?? null), "recommandations", [], "any", true, true, false, 1311)) {
            yield "input-error";
        }
        yield "\"
                    rows=\"3\">";
        // line 1312
        yield ((array_key_exists("editFiche", $context)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["editFiche"]) || array_key_exists("editFiche", $context) ? $context["editFiche"] : (function () { throw new RuntimeError('Variable "editFiche" does not exist.', 1312, $this->source); })()), "recommandations", [], "any", false, false, false, 1312), "html", null, true)) : (""));
        yield "</textarea>
          ";
        // line 1313
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["ficheErrorsEdit"] ?? null), "recommandations", [], "any", true, true, false, 1313)) {
            // line 1314
            yield "            <small class=\"text-danger\"><i class=\"fas fa-exclamation-circle\"></i> ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["ficheErrorsEdit"]) || array_key_exists("ficheErrorsEdit", $context) ? $context["ficheErrorsEdit"] : (function () { throw new RuntimeError('Variable "ficheErrorsEdit" does not exist.', 1314, $this->source); })()), "recommandations", [], "any", false, false, false, 1314), "html", null, true);
            yield "</small>
          ";
        }
        // line 1316
        yield "        </div>

      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"modal-btn cancel\" onclick=\"closeModal('modalEditFiche')\">Annuler</button>
        <button type=\"submit\" class=\"modal-btn submit\"><i class=\"fas fa-save\"></i> Mettre à jour</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal Supprimer fiche -->
<div class=\"modal-backdrop\" id=\"modalDeleteFiche\">
  <div class=\"modal-box modal-box-sm\">
    <div class=\"modal-body\" style=\"text-align:center; padding-top:32px;\">
      <div class=\"del-modal-icon\"><i class=\"fas fa-file-times\"></i></div>
      <div class=\"del-modal-title\">Supprimer cette fiche ?</div>
      <div class=\"del-modal-sub\">Le compte-rendu sera définitivement supprimé.</div>
    </div>
    <div class=\"modal-footer\" style=\"justify-content:center; gap:12px;\">
      <button class=\"modal-btn cancel\" onclick=\"closeModal('modalDeleteFiche')\">Annuler</button>
      <form id=\"deleteFicheForm\" method=\"post\" style=\"display:inline;\">
        <button type=\"submit\" class=\"modal-btn danger\"><i class=\"fas fa-trash-alt\"></i> Supprimer</button>
      </form>
    </div>
  </div>
</div>

";
        // line 1345
        yield "<div class=\"fiche-drawer-overlay\" id=\"ficheDrawerOverlay\" onclick=\"closeFicheDrawer()\"></div>
<div class=\"fiche-drawer\" id=\"ficheDrawer\">

  <div class=\"fiche-drawer-header\">
    <div class=\"fiche-drawer-header-left\">
      <div class=\"fiche-drawer-icon\"><i class=\"fas fa-file-medical-alt\"></i></div>
      <div>
        <div class=\"fiche-drawer-title\">Fiche <span id=\"drawerFicheId\"></span></div>
        <div class=\"fiche-drawer-date\"><i class=\"far fa-clock\"></i> <span id=\"drawerDate\"></span></div>
      </div>
    </div>
    <button class=\"fiche-drawer-close\" onclick=\"closeFicheDrawer()\">
      <i class=\"fas fa-times\"></i>
    </button>
  </div>

  <div class=\"fiche-drawer-patient\">
    <div class=\"fiche-drawer-avatar\" id=\"drawerAvatar\"></div>
    <div>
      <div class=\"fiche-drawer-patient-name\" id=\"drawerPatient\"></div>
      <div class=\"fiche-drawer-patient-label\">Patient</div>
    </div>
  </div>

  <div class=\"fiche-drawer-body\">
    <div class=\"fiche-drawer-section\">
      <div class=\"fiche-drawer-section-title\"><i class=\"fas fa-exclamation-circle\"></i> Problème principal</div>
      <div class=\"fiche-drawer-section-content\" id=\"drawerProbleme\"></div>
    </div>
    <div class=\"fiche-drawer-section\">
      <div class=\"fiche-drawer-section-title\"><i class=\"fas fa-notes-medical\"></i> Notes cliniques</div>
      <div class=\"fiche-drawer-section-content\" id=\"drawerNotes\"></div>
    </div>
    <div class=\"fiche-drawer-section\">
      <div class=\"fiche-drawer-section-title\"><i class=\"fas fa-stethoscope\"></i> Diagnostic</div>
      <div class=\"fiche-drawer-section-content\" id=\"drawerDiagnostic\"></div>
    </div>
    <div class=\"fiche-drawer-section\">
      <div class=\"fiche-drawer-section-title\"><i class=\"fas fa-pills\"></i> Traitement</div>
      <div class=\"fiche-drawer-section-content\" id=\"drawerTraitement\"></div>
    </div>
    <div class=\"fiche-drawer-section\">
      <div class=\"fiche-drawer-section-title\"><i class=\"fas fa-clipboard-list\"></i> Recommandations</div>
      <div class=\"fiche-drawer-section-content\" id=\"drawerReco\"></div>
    </div>
  </div>

  <div class=\"fiche-drawer-footer\">
    <a class=\"fiche-drawer-pdf-btn\" id=\"drawerPdfLink\" href=\"#\" target=\"_blank\">
      <svg width=\"14\" height=\"14\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2.5\"><path d=\"M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z\"/><polyline points=\"14 2 14 8 20 8\"/></svg>
      PDF
    </a>

    <div class=\"fiche-trad-group\">
      <button class=\"fiche-trad-btn\" id=\"btnTradAr\" onclick=\"traduireFiche('arabe')\">
        🇸🇦 <span>عربي</span>
      </button>
      <button class=\"fiche-trad-btn\" id=\"btnTradFr\" onclick=\"traduireFiche('français')\">
        🇫🇷 <span>Français</span>
      </button>
      <button class=\"fiche-trad-btn\" id=\"btnTradEn\" onclick=\"traduireFiche('anglais')\">
        🇬🇧 <span>English</span>
      </button>
    </div>

    <button class=\"fiche-drawer-close-btn\" onclick=\"closeFicheDrawer()\">
      <i class=\"fas fa-times\"></i> Fermer
    </button>
  </div>

  ";
        // line 1416
        yield "  <div id=\"ficheTraductionBox\" class=\"fiche-trad-overlay\">
    <div class=\"fiche-trad-overlay-header\">
      <div class=\"fiche-trad-overlay-title\">
        <i class=\"fas fa-language\"></i>
        Traduction
        <span class=\"fiche-trad-lang-badge\" id=\"tradLangue\"></span>
      </div>
      <button class=\"fiche-trad-overlay-close\" onclick=\"closeTradPanel()\">✕</button>
    </div>
    <div class=\"fiche-trad-overlay-body\">
      <div id=\"tradLoader\" style=\"display:none; text-align:center; padding:40px 0; color:var(--color-text-secondary);\">
        <i class=\"fas fa-spinner fa-spin fa-2x\"></i><br><br>Traduction en cours…
      </div>
      <div id=\"tradContenu\" style=\"display:none;\">
        <div class=\"fiche-drawer-section\">
          <div class=\"fiche-drawer-section-title\"><i class=\"fas fa-exclamation-circle\"></i> Problème principal</div>
          <div class=\"fiche-drawer-section-content fiche-trad-val\" id=\"tradProbleme\"></div>
        </div>
        <div class=\"fiche-drawer-section\">
          <div class=\"fiche-drawer-section-title\"><i class=\"fas fa-notes-medical\"></i> Notes cliniques</div>
          <div class=\"fiche-drawer-section-content fiche-trad-val\" id=\"tradNotes\"></div>
        </div>
        <div class=\"fiche-drawer-section\">
          <div class=\"fiche-drawer-section-title\"><i class=\"fas fa-stethoscope\"></i> Diagnostic</div>
          <div class=\"fiche-drawer-section-content fiche-trad-val\" id=\"tradDiagnostic\"></div>
        </div>
        <div class=\"fiche-drawer-section\">
          <div class=\"fiche-drawer-section-title\"><i class=\"fas fa-pills\"></i> Traitement</div>
          <div class=\"fiche-drawer-section-content fiche-trad-val\" id=\"tradTraitement\"></div>
        </div>
        <div class=\"fiche-drawer-section\">
          <div class=\"fiche-drawer-section-title\"><i class=\"fas fa-clipboard-list\"></i> Recommandations</div>
          <div class=\"fiche-drawer-section-content fiche-trad-val\" id=\"tradReco\"></div>
        </div>
      </div>
    </div>
  </div>

</div>";
        // line 1456
        yield "<div class=\"ia-modal-overlay\" id=\"iaModalOverlay\" onclick=\"fermerModalIA(event)\">
  <div class=\"ia-modal\" id=\"iaModal\">

    <button class=\"ia-modal-close\" onclick=\"fermerModalIA(null, true)\">
      <svg width=\"14\" height=\"14\" viewBox=\"0 0 14 14\" fill=\"none\">
        <path d=\"M1 1l12 12M13 1L1 13\" stroke=\"currentColor\" stroke-width=\"1.5\" stroke-linecap=\"round\"/>
      </svg>
    </button>

    ";
        // line 1466
        yield "    <div class=\"ia-loading\" id=\"iaLoading\">
      <div class=\"ia-spinner\"></div>
      <p>Analyse en cours…</p>
      <p class=\"ia-loading-sub\">OpenAI lit les fiches de <span id=\"iaLoadingName\"></span></p>
    </div>

    ";
        // line 1473
        yield "    <div class=\"ia-result\" id=\"iaResult\" style=\"display:none\">

      <div class=\"ia-result-header\">
        <div class=\"ia-result-avatar\" id=\"iaResultAvatar\"></div>
        <div>
          <div class=\"ia-result-name\" id=\"iaResultName\"></div>
          <div class=\"ia-result-meta\" id=\"iaResultMeta\"></div>
        </div>
        <span class=\"ia-evolution-badge\" id=\"iaEvoBadge\"></span>
      </div>

      ";
        // line 1485
        yield "      <div class=\"ia-kpi-row\" id=\"iaKpiRow\"></div>

      ";
        // line 1488
        yield "      <div class=\"ia-section-title\">Évolution par symptôme</div>
      <div class=\"ia-tendances\" id=\"iaTendances\"></div>

      ";
        // line 1492
        yield "      <div class=\"ia-section-title\">Synthèse clinique</div>
      <div class=\"ia-synthese\" id=\"iaSynthese\"></div>

      ";
        // line 1496
        yield "      <div class=\"ia-section-title\">Recommandations</div>
      <div class=\"ia-recommandations\" id=\"iaReco\"></div>

    </div>

    ";
        // line 1502
        yield "    <div class=\"ia-error\" id=\"iaError\" style=\"display:none\">
      <svg width=\"32\" height=\"32\" viewBox=\"0 0 24 24\" fill=\"none\">
        <circle cx=\"12\" cy=\"12\" r=\"10\" stroke=\"currentColor\" stroke-width=\"1.4\"/>
        <path d=\"M12 7v5M12 16v.5\" stroke=\"currentColor\" stroke-width=\"1.6\" stroke-linecap=\"round\"/>
      </svg>
      <p id=\"iaErrorMsg\">Une erreur est survenue.</p>
    </div>

  </div>
</div>

";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 1515
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

        // line 1516
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
<script>
/* ══ Navigation sections ══ */
const sectionTitles = {
  'overview':    { title: \"Vue d'ensemble\",         sub: 'Bonjour, bienvenue dans votre espace' },
  'horaires':    { title: 'Mes horaires',            sub: 'Gérez vos créneaux de disponibilité' },
  'rendez-vous': { title: 'Rendez-vous reçus',       sub: 'Patients ayant réservé un créneau' },
  'fiches':      { title: 'Fiches de consultation',  sub: 'Vos comptes-rendus cliniques' },
  'conges':      { title: 'Congés maladie',          sub: 'Demandes soumises par vos patients' }, // ← ajouter
};

function showSection(name) {
  document.querySelectorAll('.psy-section').forEach(s => s.classList.remove('active'));
  document.querySelectorAll('.nav-item').forEach(n => n.classList.remove('active'));
  const section = document.getElementById('section-' + name);
  if (section) section.classList.add('active');
  document.querySelectorAll('.nav-item').forEach(n => {
    if (n.getAttribute('onclick') && n.getAttribute('onclick').includes(name)) n.classList.add('active');
  });
  const info = sectionTitles[name];
  if (info) {
    document.getElementById('topbarTitle').textContent = info.title;
    document.getElementById('topbarSub').textContent   = info.sub;
  }
  if (name === 'conges') loadCongesPsy(); // ← ajouter
}

/* ══ Modals ══ */
function openModal(id)  { document.getElementById(id).classList.add('open'); document.body.style.overflow = 'hidden'; }
function closeModal(id) { document.getElementById(id).style.display = 'none'; document.body.style.overflow = ''; }

document.querySelectorAll('.modal-backdrop').forEach(m => {
  m.addEventListener('click', e => { if (e.target === m) closeModal(m.id); });
});

function openEditSlotModal(id, jour, debut, fin, type, statut) {
  document.getElementById('editSlotForm').action = '/psy/slot/' + id + '/edit';
  document.getElementById('editSlotJour').value   = jour;
  document.getElementById('editSlotDebut').value  = debut;
  document.getElementById('editSlotFin').value    = fin;
  document.getElementById('editSlotType').value   = type;
  document.getElementById('editSlotStatut').value = statut;
  openModal('modalEditSlot');
}

function openDeleteSlotModal(id) {
  document.getElementById('deleteSlotForm').action = '/psy/slot/' + id + '/delete';
  openModal('modalDeleteSlot');
}

function openCreateFicheModal(btn) {
  const resaId      = btn.dataset.resaId   || '';
  const rdvId       = btn.dataset.rdvId    || '';
  const patientName = btn.dataset.patient  || '';
  document.getElementById('ficheResaId').value      = resaId;
  document.getElementById('ficheRdvId').value       = rdvId;
  document.getElementById('fichePatientName').value = patientName;
  openModal('modalCreateFiche');
}

function openEditFicheModal(id, probleme, notes, diagnostic, traitement, recommandations) {
  document.getElementById('editFicheForm').action = '/psy/fiche/' + id + '/edit';
  document.getElementById('editProbleme').value        = probleme;
  document.getElementById('editNotes').value           = notes;
  document.getElementById('editDiagnostic').value      = diagnostic;
  document.getElementById('editTraitement').value      = traitement;
  document.getElementById('editRecommandations').value = recommandations;
  document.getElementById('modalEditFiche').style.display = 'flex';
}

function openDeleteFicheModal(id) {
  document.getElementById('deleteFicheForm').action = '/psy/fiche/' + id + '/delete';
  openModal('modalDeleteFiche');
}

/* ══ Badge RDV ══ */
document.getElementById('badgeRdv').textContent = '";
        // line 1592
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["myReservations"]) || array_key_exists("myReservations", $context) ? $context["myReservations"] : (function () { throw new RuntimeError('Variable "myReservations" does not exist.', 1592, $this->source); })())), "html", null, true);
        yield "';

/* ══ Sidebar — mood picker ══ */
function setMood(el) {
  document.querySelectorAll('.sb-mood-chip').forEach(c => c.classList.remove('active'));
  el.classList.add('active');
}

/* ══ Sidebar — citations rotatives ══ */
const quotes = [
  { text: \"La guérison est un retour à soi-même, pas une fuite de la douleur.\", author: \"Carl Rogers\" },
  { text: \"Ce n'est pas ce qui nous arrive qui nous affecte, mais la façon dont nous y répondons.\", author: \"Épictète\" },
  { text: \"Le courage, c'est d'être soi-même face aux autres.\", author: \"André Gide\" },
  { text: \"La bienveillance envers soi est le début de toute transformation.\", author: \"Kristin Neff\" },
  { text: \"Là où il y a une volonté, il y a un chemin.\", author: \"Viktor Frankl\" },
];
let currentQuote = 0;

function buildQuoteNav() {
  const nav = document.getElementById('quoteNav');
  if (!nav) return;
  nav.innerHTML = '';
  quotes.forEach((_, i) => {
    const dot = document.createElement('span');
    dot.className = 'sb-quote-dot' + (i === 0 ? ' active' : '');
    dot.onclick = () => setQuote(i);
    nav.appendChild(dot);
  });
}

function setQuote(idx) {
  currentQuote = idx;
  const q = quotes[idx];
  const textEl   = document.getElementById('quoteText');
  const authorEl = document.getElementById('quoteAuthor');
  if (textEl)   { textEl.style.opacity   = 0; setTimeout(() => { textEl.textContent   = q.text;   textEl.style.opacity   = 1; }, 200); }
  if (authorEl) { authorEl.style.opacity = 0; setTimeout(() => { authorEl.textContent = q.author; authorEl.style.opacity = 1; }, 200); }
  document.querySelectorAll('.sb-quote-dot').forEach((d, i) => d.classList.toggle('active', i === idx));
}

buildQuoteNav();
setInterval(() => setQuote((currentQuote + 1) % quotes.length), 6000);

const style = document.createElement('style');
style.textContent = '#quoteText, #quoteAuthor { transition: opacity .2s ease; }';
document.head.appendChild(style);

function updateReservationStatus(reservationId, statut, btn) {
  const card     = btn.closest('.rdv-recu-card');
  const footer   = card.querySelector('.rrc-footer');
  const stripeEl = card.querySelector('.rrc-stripe');
  const statusEl = card.querySelector('.rrc-status');
  const rdvId       = card.dataset.rdvId;
  const patientName = card.dataset.patient;

  footer.querySelectorAll('button').forEach(b => b.disabled = true);

  fetch(`/psy/reservation/\${reservationId}/statut`, {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ statut })
  })
  .then(async res => {
    const text = await res.text();
    try { return JSON.parse(text); }
    catch (e) { throw new Error('Réponse non-JSON : ' + text.substring(0, 100)); }
  })
  .then(data => {
    if (!data.success) throw new Error(data.message || 'Erreur serveur');

    if (statut === 'confirme') {
  stripeEl.className = 'rrc-stripe confirmed';
  statusEl.className = 'rrc-status confirme';
  statusEl.innerHTML = '<i class=\"fas fa-check-circle\"></i> Confirmé';
  footer.innerHTML = `
    <button class=\"rrc-btn fiche\"
            data-resa-id=\"\${reservationId}\"
            data-rdv-id=\"\${rdvId}\"
            data-patient=\"\${patientName}\"
            onclick=\"openCreateFicheModal(this)\">
      <i class=\"fas fa-file-medical\"></i> Créer fiche
    </button>

    <button type=\"button\"
            class=\"rrc-btn gcal-btn\"
            data-resa-id=\"\${reservationId}\"
            onclick=\"return syncGoogleCalendar(event, this, \${reservationId})\">
      <svg class=\"gcal-icon\" viewBox=\"0 0 24 24\" width=\"14\" height=\"14\" fill=\"none\">
        <rect x=\"3\" y=\"4\" width=\"18\" height=\"17\" rx=\"2\" fill=\"#fff\" stroke=\"#dadce0\" stroke-width=\"1.5\"/>
        <rect x=\"3\" y=\"8\" width=\"18\" height=\"2.5\" fill=\"#4285F4\"/>
        <line x1=\"8\" y1=\"4\" x2=\"8\" y2=\"7\" stroke=\"#5f6368\" stroke-width=\"1.5\" stroke-linecap=\"round\"/>
        <line x1=\"16\" y1=\"4\" x2=\"16\" y2=\"7\" stroke=\"#5f6368\" stroke-width=\"1.5\" stroke-linecap=\"round\"/>
      </svg>
      Sync Calendar
    </button>

    <button class=\"rrc-btn outline\"><i class=\"fas fa-eye\"></i> Détails</button>
  `;
}else {
      stripeEl.className = 'rrc-stripe cancelled';
      statusEl.className = 'rrc-status annule';
      statusEl.innerHTML = '<i class=\"fas fa-times-circle\"></i> Annulé';
      footer.innerHTML = `
        <span class=\"rrc-cancelled-msg\"><i class=\"fas fa-ban\"></i> Rendez-vous annulé</span>
        <button class=\"rrc-btn outline\"><i class=\"fas fa-eye\"></i> Détails</button>
      `;
    }
  })
  .catch(err => {
    console.error('Erreur complète :', err);
    alert('Erreur : ' + err.message);
    footer.querySelectorAll('button').forEach(b => b.disabled = false);
  });
}

document.addEventListener('DOMContentLoaded', function () {
  const params = new URLSearchParams(window.location.search);
  const section = params.get('section');
  if (section) showSection(section);
});

/* ══ Drawer fiche ══ */
let currentFicheId = null;

function openFicheDrawer(data) {
  currentFicheId = data.id;
  const initiales = data.patient.split(' ').map(w => w[0] || '').slice(0, 2).join('');
  document.getElementById('drawerFicheId').textContent    = '#' + data.id;
  document.getElementById('drawerDate').textContent       = data.date;
  document.getElementById('drawerAvatar').textContent     = initiales.toUpperCase();
  document.getElementById('drawerPatient').textContent    = data.patient;
  document.getElementById('drawerProbleme').textContent   = data.probleme    || '—';
  document.getElementById('drawerNotes').textContent      = data.notes       || '—';
  document.getElementById('drawerDiagnostic').textContent = data.diagnostic  || '—';
  document.getElementById('drawerTraitement').textContent = data.traitement  || '—';
  document.getElementById('drawerReco').textContent       = data.recommandations || '—';
  document.getElementById('drawerPdfLink').href           = '/psy/fiche/' + data.id + '/pdf';
  document.getElementById('ficheDrawerOverlay').classList.add('active');
  document.getElementById('ficheDrawer').classList.add('active');
  document.body.style.overflow = 'hidden';
}

function closeFicheDrawer() {
  document.getElementById('ficheDrawerOverlay').classList.remove('active');
  document.getElementById('ficheDrawer').classList.remove('active');
  document.body.style.overflow = '';
}

/* ══ Notifications ══ */
function toggleNotifPanel() {
  const panel = document.getElementById('notifPanel');
  panel.style.display = (panel.style.display === 'none') ? 'block' : 'none';
}

document.addEventListener('click', function(e) {
  const wrap = document.getElementById('notifWrap');
  if (wrap && !wrap.contains(e.target)) {
    document.getElementById('notifPanel').style.display = 'none';
  }
});

function marquerLue(id, el) {
  fetch('/psy/notification/' + id + '/lue', {
    method: 'POST',
    headers: { 'X-Requested-With': 'XMLHttpRequest' }
  })
  .then(r => r.json())
  .then(data => { if (data.success) { el.classList.remove('unread'); _decrementerBadge(); } });
}

function toutMarquerLu() {
  fetch('/psy/notifications/tout-lire', {
    method: 'POST',
    headers: { 'X-Requested-With': 'XMLHttpRequest' }
  })
  .then(r => r.json())
  .then(data => {
    if (data.success) {
      document.querySelectorAll('.notif-item.unread').forEach(el => el.classList.remove('unread'));
      const badge = document.getElementById('notifBadge');
      if (badge) badge.style.display = 'none';
      const btn = document.querySelector('.notif-tout-lire-btn');
      if (btn) btn.remove();
    }
  });
}

function _decrementerBadge() {
  const badge = document.getElementById('notifBadge');
  if (!badge) return;
  let count = parseInt(badge.textContent) - 1;
  if (count <= 0) {
    badge.style.display = 'none';
    const btn = document.querySelector('.notif-tout-lire-btn');
    if (btn) btn.remove();
  } else {
    badge.textContent = count;
  }
}

/* ══ Traduction fiche ══ */
function closeTradPanel() {
  document.getElementById('ficheTraductionBox').classList.remove('open');
  document.querySelectorAll('.fiche-trad-btn').forEach(b => b.classList.remove('active'));
}

function traduireFiche(langue) {
  if (!currentFicheId) return;

  const box     = document.getElementById('ficheTraductionBox');
  const loader  = document.getElementById('tradLoader');
  const contenu = document.getElementById('tradContenu');

  document.querySelectorAll('.fiche-trad-btn').forEach(b => b.classList.remove('active'));
  const map = { arabe: 'btnTradAr', français: 'btnTradFr', anglais: 'btnTradEn' };
  if (map[langue]) document.getElementById(map[langue])?.classList.add('active');

  const labels = { arabe: 'العربية', français: 'Français', anglais: 'English' };
  document.getElementById('tradLangue').textContent = labels[langue] || langue;

  box.classList.add('open');
  loader.style.display = 'block';
  contenu.style.display = 'none';

  const formData = new FormData();
  formData.append('langue', langue);

  fetch(`/psy/fiche/\${currentFicheId}/traduire`, { method: 'POST', body: formData })
  .then(r => r.json())
  .then(data => {
    loader.style.display = 'none';
    if (data.success) {
      const t = data.traduction;
      document.getElementById('tradProbleme').textContent   = t.probleme_principal ?? '—';
      document.getElementById('tradNotes').textContent      = t.notes ?? '—';
      document.getElementById('tradDiagnostic').textContent = t.diagnostic ?? '—';
      document.getElementById('tradTraitement').textContent = t.traitement ?? '—';
      document.getElementById('tradReco').textContent       = t.recommandations ?? '—';
      contenu.style.direction = langue === 'arabe' ? 'rtl' : 'ltr';
      contenu.style.display   = 'block';
    } else {
      contenu.innerHTML     = `<p style=\"color:red;\">Erreur : \${data.message}</p>`;
      contenu.style.display = 'block';
    }
  })
  .catch(() => {
    loader.style.display  = 'none';
    contenu.innerHTML     = '<p style=\"color:red;\">Erreur réseau.</p>';
    contenu.style.display = 'block';
  });
}
/* ══ Recherche fiches — côté serveur ══ */
(function () {
  const input = document.getElementById('ficheSearchInput');
  const clear = document.getElementById('ficheSearchClear');
  if (!input) return;

  // Afficher/masquer le bouton clear en temps réel
  input.addEventListener('input', function () {
    clear.style.display = input.value.trim() ? 'inline-flex' : 'none';
  });

  // Lancer la recherche au Enter
  input.addEventListener('keydown', function (e) {
    if (e.key === 'Enter') {
      e.preventDefault();
      launchSearch(input.value.trim());
    }
  });

  // Lancer la recherche après 500ms sans frappe (debounce)
  let debounceTimer = null;
  input.addEventListener('input', function () {
    clearTimeout(debounceTimer);
    debounceTimer = setTimeout(() => {
      launchSearch(input.value.trim());
    }, 500);
  });
})();

function launchSearch(query) {
  const url = new URL(window.location.href);
  url.searchParams.set('section', 'fiches');
  url.searchParams.set('page', '1');   // reset à page 1 à chaque nouvelle recherche
  if (query) {
    url.searchParams.set('search', query);
  } else {
    url.searchParams.delete('search');
  }
  window.location.href = url.toString();
}

function clearFicheSearch() {
  const url = new URL(window.location.href);
  url.searchParams.delete('search');
  url.searchParams.set('page', '1');
  url.searchParams.set('section', 'fiches');
  window.location.href = url.toString();
}

/* ══ Pagination fiches ══ */
function goToFichePage(page) {
  const url = new URL(window.location.href);
  url.searchParams.set('page', page);
  url.searchParams.set('section', 'fiches');
  // ← Conserver le terme de recherche en changeant de page
  window.location.href = url.toString();
}

function goToRdvPage(page) {
  const url = new URL(window.location.href);
  url.searchParams.set('rdv_page', page);
  url.searchParams.set('section', 'rendez-vous');
  window.location.href = url.toString();
}

// ── Google Calendar Sync ──
async function syncGoogleCalendar(event, btn, resaId) {
  event.preventDefault();
  event.stopPropagation();

  if (btn.classList.contains('syncing') || btn.classList.contains('synced')) {
    return false;
  }

  btn.classList.add('syncing');
  const original = btn.innerHTML;
  btn.innerHTML = '<i class=\"fas fa-spinner fa-spin\"></i> Sync...';

  try {
    const res = await fetch(`/psy/reservation/\${resaId}/sync-calendar`, {
      method: 'POST',
      headers: {
        'X-Requested-With': 'XMLHttpRequest'
      }
    });

    const data = await res.json();

    if (data.need_auth) {
      showGcalToast('info', '🔑 Connexion Google requise...');
      setTimeout(() => {
        window.location.href = '/psy/google/connect';
      }, 1200);

      btn.innerHTML = original;
      btn.classList.remove('syncing');
      return false;
    }

   if (data.success) {
  btn.classList.remove('syncing');
  btn.classList.add('synced');
  btn.innerHTML = '<i class=\"fas fa-check-circle\"></i> Synchronisé';
  showGcalToast('success', '✅ Ajouté à Google Calendar');

  setTimeout(() => {
    window.open(data.event_link, '_blank');
  }, 800);

} else {
  btn.innerHTML = original;
  btn.classList.remove('syncing');
  showGcalToast('error', data.message);
}

  } catch (err) {
    btn.innerHTML = original;
    btn.classList.remove('syncing');
    showGcalToast('error', 'Erreur réseau');
  }

  return false;
}
function showGcalToast(type, message) {
  // Supprimer toast existant
  document.querySelectorAll('.gcal-toast').forEach(t => t.remove());

  const icons = { success: '📅', error: '⚠️', info: 'ℹ️' };
  const toast = document.createElement('div');
  toast.className = `gcal-toast \${type}`;
  toast.innerHTML = `<span>\${icons[type]}</span><span>\${message}</span>`;
  document.body.appendChild(toast);

  setTimeout(() => toast.classList.add('show'), 50);
  setTimeout(() => {
    toast.classList.remove('show');
    setTimeout(() => toast.remove(), 400);
  }, 4000);
}

// Auto-sync quand un RDV est confirmé
const originalUpdateReservationStatus = window.updateReservationStatus;
window.updateReservationStatus = async function(resaId, statut, btn) {
  await originalUpdateReservationStatus?.(resaId, statut, btn);
  
  if (statut === 'confirme') {
    // Attendre que l'UI se mette à jour puis proposer la sync
    setTimeout(() => {
      const card = btn.closest('.rdv-recu-card');
      if (card) {
        showGcalToast('info', '📅 RDV confirmé ! Cliquez sur \"Sync Calendar\" pour ajouter à Google Calendar.');
      }
    }, 800);
  }
};

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
        return "home/psy_dashboard.html.twig";
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
        return array (  2938 => 1592,  2859 => 1516,  2846 => 1515,  2824 => 1502,  2817 => 1496,  2812 => 1492,  2807 => 1488,  2803 => 1485,  2790 => 1473,  2782 => 1466,  2771 => 1456,  2731 => 1416,  2659 => 1345,  2629 => 1316,  2623 => 1314,  2621 => 1313,  2617 => 1312,  2611 => 1311,  2604 => 1306,  2598 => 1304,  2596 => 1303,  2592 => 1302,  2586 => 1301,  2579 => 1296,  2573 => 1294,  2571 => 1293,  2567 => 1292,  2561 => 1291,  2554 => 1286,  2548 => 1284,  2546 => 1283,  2542 => 1282,  2536 => 1281,  2529 => 1276,  2523 => 1274,  2521 => 1273,  2517 => 1272,  2511 => 1271,  2501 => 1264,  2485 => 1253,  2470 => 1240,  2464 => 1238,  2462 => 1237,  2458 => 1236,  2451 => 1234,  2444 => 1229,  2438 => 1227,  2436 => 1226,  2432 => 1225,  2425 => 1223,  2418 => 1218,  2412 => 1216,  2410 => 1215,  2406 => 1214,  2399 => 1212,  2392 => 1207,  2386 => 1205,  2384 => 1204,  2380 => 1203,  2373 => 1201,  2366 => 1196,  2360 => 1194,  2358 => 1193,  2354 => 1192,  2347 => 1190,  2338 => 1184,  2327 => 1176,  2322 => 1174,  2317 => 1172,  2305 => 1165,  2268 => 1133,  2262 => 1132,  2255 => 1127,  2249 => 1125,  2247 => 1124,  2240 => 1122,  2234 => 1121,  2228 => 1120,  2220 => 1114,  2214 => 1112,  2212 => 1111,  2208 => 1110,  2202 => 1109,  2196 => 1105,  2190 => 1103,  2188 => 1102,  2184 => 1101,  2178 => 1100,  2170 => 1094,  2164 => 1092,  2162 => 1091,  2159 => 1090,  2150 => 1087,  2144 => 1086,  2139 => 1085,  2135 => 1084,  2129 => 1083,  2120 => 1077,  2107 => 1069,  2086 => 1050,  2080 => 1048,  2078 => 1047,  2069 => 1043,  2060 => 1039,  2053 => 1037,  2045 => 1031,  2039 => 1029,  2037 => 1028,  2033 => 1027,  2027 => 1026,  2021 => 1022,  2015 => 1020,  2013 => 1019,  2009 => 1018,  2003 => 1017,  1995 => 1011,  1989 => 1009,  1987 => 1008,  1984 => 1007,  1975 => 1004,  1969 => 1003,  1964 => 1002,  1960 => 1001,  1953 => 999,  1944 => 993,  1932 => 986,  1929 => 985,  1926 => 983,  1924 => 982,  1920 => 979,  1918 => 978,  1915 => 977,  1911 => 975,  1905 => 971,  1899 => 969,  1897 => 968,  1891 => 967,  1884 => 965,  1880 => 963,  1874 => 959,  1867 => 955,  1864 => 954,  1861 => 953,  1858 => 951,  1852 => 950,  1848 => 948,  1846 => 947,  1841 => 945,  1837 => 944,  1832 => 943,  1829 => 942,  1824 => 941,  1821 => 940,  1818 => 939,  1815 => 937,  1809 => 933,  1802 => 929,  1799 => 928,  1796 => 927,  1792 => 924,  1789 => 923,  1785 => 920,  1772 => 913,  1763 => 907,  1754 => 901,  1750 => 900,  1746 => 899,  1742 => 898,  1738 => 897,  1734 => 896,  1724 => 889,  1720 => 888,  1716 => 887,  1712 => 886,  1708 => 885,  1704 => 884,  1700 => 883,  1696 => 882,  1688 => 876,  1683 => 875,  1675 => 870,  1664 => 862,  1658 => 859,  1652 => 856,  1649 => 855,  1643 => 854,  1640 => 853,  1637 => 852,  1634 => 851,  1629 => 850,  1627 => 849,  1624 => 848,  1620 => 847,  1617 => 846,  1608 => 839,  1606 => 838,  1598 => 833,  1594 => 832,  1589 => 829,  1586 => 828,  1580 => 823,  1570 => 821,  1568 => 820,  1563 => 817,  1557 => 813,  1551 => 809,  1549 => 808,  1543 => 805,  1532 => 796,  1527 => 792,  1525 => 791,  1511 => 779,  1507 => 776,  1503 => 774,  1495 => 769,  1488 => 767,  1484 => 765,  1478 => 761,  1471 => 757,  1468 => 756,  1466 => 755,  1463 => 754,  1457 => 753,  1453 => 751,  1451 => 750,  1446 => 748,  1442 => 747,  1437 => 746,  1434 => 745,  1429 => 744,  1426 => 743,  1424 => 742,  1421 => 741,  1415 => 737,  1408 => 733,  1405 => 732,  1403 => 731,  1399 => 729,  1396 => 728,  1392 => 725,  1379 => 717,  1372 => 713,  1365 => 709,  1362 => 708,  1358 => 706,  1356 => 705,  1353 => 704,  1345 => 699,  1336 => 693,  1332 => 692,  1328 => 690,  1322 => 686,  1319 => 685,  1309 => 679,  1305 => 678,  1301 => 677,  1298 => 676,  1296 => 675,  1288 => 670,  1284 => 669,  1276 => 666,  1269 => 662,  1262 => 658,  1254 => 652,  1251 => 651,  1246 => 650,  1242 => 649,  1236 => 647,  1231 => 646,  1227 => 645,  1221 => 643,  1216 => 642,  1212 => 641,  1206 => 638,  1200 => 637,  1193 => 634,  1186 => 630,  1180 => 629,  1176 => 628,  1172 => 627,  1169 => 626,  1166 => 625,  1163 => 624,  1159 => 623,  1156 => 622,  1148 => 616,  1146 => 615,  1136 => 607,  1132 => 604,  1128 => 602,  1122 => 601,  1116 => 597,  1113 => 596,  1107 => 595,  1098 => 589,  1081 => 585,  1073 => 580,  1068 => 578,  1061 => 574,  1057 => 573,  1053 => 572,  1045 => 569,  1040 => 566,  1037 => 565,  1034 => 564,  1030 => 563,  1023 => 558,  1020 => 557,  1013 => 551,  1010 => 550,  1007 => 548,  1001 => 547,  992 => 541,  975 => 537,  967 => 532,  962 => 530,  955 => 526,  951 => 525,  947 => 524,  939 => 521,  934 => 518,  931 => 517,  928 => 516,  923 => 515,  913 => 509,  907 => 506,  901 => 503,  898 => 502,  895 => 501,  892 => 500,  887 => 499,  885 => 498,  882 => 497,  874 => 491,  872 => 490,  869 => 489,  860 => 487,  855 => 486,  846 => 484,  842 => 483,  829 => 472,  822 => 466,  814 => 463,  810 => 461,  807 => 460,  801 => 458,  798 => 457,  789 => 455,  784 => 454,  782 => 453,  777 => 451,  774 => 450,  771 => 449,  766 => 448,  764 => 447,  751 => 436,  748 => 435,  738 => 431,  734 => 430,  730 => 429,  722 => 426,  717 => 424,  710 => 422,  703 => 419,  697 => 416,  693 => 415,  689 => 413,  686 => 412,  681 => 411,  674 => 406,  672 => 405,  655 => 391,  647 => 386,  639 => 381,  631 => 376,  621 => 369,  617 => 367,  613 => 364,  607 => 359,  601 => 357,  599 => 356,  575 => 334,  570 => 330,  568 => 329,  564 => 326,  561 => 325,  549 => 319,  543 => 316,  535 => 312,  530 => 311,  526 => 310,  522 => 309,  517 => 307,  513 => 306,  506 => 305,  501 => 304,  494 => 299,  492 => 298,  487 => 295,  481 => 291,  479 => 290,  473 => 286,  466 => 281,  462 => 280,  457 => 277,  444 => 265,  440 => 262,  424 => 247,  383 => 207,  374 => 200,  366 => 195,  358 => 190,  350 => 185,  343 => 180,  286 => 124,  282 => 121,  278 => 119,  269 => 115,  258 => 109,  254 => 108,  250 => 106,  247 => 105,  244 => 104,  242 => 103,  238 => 101,  214 => 78,  203 => 68,  195 => 62,  188 => 58,  148 => 20,  144 => 17,  140 => 14,  127 => 13,  114 => 10,  110 => 9,  106 => 8,  102 => 7,  89 => 6,  66 => 4,  43 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# templates/home/psy_dashboard.html.twig #}
{% extends 'base.html.twig' %}

{% block title %}NAFSEYTI — Espace Psychologue{% endblock %}

{% block stylesheets %}
{{ parent() }}
<link rel=\"stylesheet\" href=\"{{ asset('css/psy_dashboard.css') }}\">
<link rel=\"stylesheet\" href=\"{{ asset('css/psy_ia_analyse.css') }}\">
<script src=\"{{ asset('js/psy_ia_analyse.js') }}\" defer></script>
{% endblock %}

{% block body %}
<div class=\"psy-layout\">

  {# ══════════════════ SIDEBAR ══════════════════ #}
  <aside class=\"psy-sidebar\">

    {# — HERO — #}
    <div class=\"sb-hero\">
      <svg class=\"sb-hero-svg\" viewBox=\"0 0 268 200\" xmlns=\"http://www.w3.org/2000/svg\" preserveAspectRatio=\"xMidYMid slice\">
        <!-- Ambient circles -->
        <circle cx=\"230\" cy=\"30\"  r=\"70\" fill=\"rgba(122,158,118,0.10)\"/>
        <circle cx=\"20\"  cy=\"170\" r=\"55\" fill=\"rgba(200,169,110,0.08)\"/>
        <circle cx=\"134\" cy=\"-5\"  r=\"70\" fill=\"rgba(255,255,255,0.03)\"/>
        <!-- Mandala psychologie -->
        <g transform=\"translate(134,88)\" opacity=\"0.65\">
          <ellipse cx=\"0\" cy=\"-38\" rx=\"7\" ry=\"15\" fill=\"none\" stroke=\"rgba(200,220,196,0.55)\" stroke-width=\"1\"   transform=\"rotate(0)\"/>
          <ellipse cx=\"0\" cy=\"-38\" rx=\"7\" ry=\"15\" fill=\"none\" stroke=\"rgba(200,220,196,0.45)\" stroke-width=\"1\"   transform=\"rotate(45)\"/>
          <ellipse cx=\"0\" cy=\"-38\" rx=\"7\" ry=\"15\" fill=\"none\" stroke=\"rgba(200,220,196,0.45)\" stroke-width=\"1\"   transform=\"rotate(90)\"/>
          <ellipse cx=\"0\" cy=\"-38\" rx=\"7\" ry=\"15\" fill=\"none\" stroke=\"rgba(200,220,196,0.35)\" stroke-width=\"1\"   transform=\"rotate(135)\"/>
          <ellipse cx=\"0\" cy=\"-38\" rx=\"7\" ry=\"15\" fill=\"none\" stroke=\"rgba(200,220,196,0.35)\" stroke-width=\"1\"   transform=\"rotate(180)\"/>
          <ellipse cx=\"0\" cy=\"-38\" rx=\"7\" ry=\"15\" fill=\"none\" stroke=\"rgba(200,220,196,0.35)\" stroke-width=\"1\"   transform=\"rotate(225)\"/>
          <ellipse cx=\"0\" cy=\"-38\" rx=\"7\" ry=\"15\" fill=\"none\" stroke=\"rgba(200,220,196,0.30)\" stroke-width=\"1\"   transform=\"rotate(270)\"/>
          <ellipse cx=\"0\" cy=\"-38\" rx=\"7\" ry=\"15\" fill=\"none\" stroke=\"rgba(200,220,196,0.30)\" stroke-width=\"1\"   transform=\"rotate(315)\"/>
          <circle cx=\"0\" cy=\"0\" r=\"16\" fill=\"none\" stroke=\"rgba(200,220,196,0.40)\" stroke-width=\"1\"/>
          <circle cx=\"0\" cy=\"0\" r=\"8\"  fill=\"rgba(200,220,196,0.12)\" stroke=\"rgba(200,220,196,0.50)\" stroke-width=\"0.8\"/>
          <circle cx=\"0\"  cy=\"-26\" r=\"2.2\" fill=\"rgba(200,169,110,0.70)\"/>
          <circle cx=\"26\" cy=\"0\"   r=\"1.8\" fill=\"rgba(200,169,110,0.50)\"/>
          <circle cx=\"-26\" cy=\"0\"  r=\"1.8\" fill=\"rgba(200,169,110,0.50)\"/>
          <circle cx=\"0\"  cy=\"26\"  r=\"2.2\" fill=\"rgba(200,169,110,0.70)\"/>
          <circle cx=\"18\" cy=\"-18\" r=\"1.2\" fill=\"rgba(200,220,196,0.50)\"/>
          <circle cx=\"-18\" cy=\"-18\" r=\"1.2\" fill=\"rgba(200,220,196,0.50)\"/>
          <circle cx=\"18\" cy=\"18\"  r=\"1.2\" fill=\"rgba(200,220,196,0.50)\"/>
          <circle cx=\"-18\" cy=\"18\" r=\"1.2\" fill=\"rgba(200,220,196,0.50)\"/>
        </g>
        <!-- Floating particles -->
        <circle cx=\"40\"  cy=\"35\"  r=\"2\"   fill=\"rgba(200,220,196,0.40)\"/>
        <circle cx=\"210\" cy=\"140\" r=\"1.5\" fill=\"rgba(200,169,110,0.55)\"/>
        <circle cx=\"50\"  cy=\"130\" r=\"1\"   fill=\"rgba(200,220,196,0.30)\"/>
        <circle cx=\"225\" cy=\"55\"  r=\"2.5\" fill=\"rgba(200,220,196,0.20)\"/>
        <circle cx=\"15\"  cy=\"60\"  r=\"1.2\" fill=\"rgba(200,169,110,0.30)\"/>
        <circle cx=\"255\" cy=\"95\"  r=\"1.8\" fill=\"rgba(200,220,196,0.25)\"/>
      </svg>
      <div class=\"sb-profile\">
        <div class=\"sb-avatar-ring\">
          <div class=\"sb-avatar-inner\">
            {{ app.user ? app.user.firstname|first ~ app.user.lastname|first : 'PS' }}
            <span class=\"sb-status-dot\"></span>
          </div>
        </div>
        <div class=\"sb-name\">{{ app.user ? app.user.firstname ~ ' ' ~ app.user.lastname : 'Docteur' }}</div>
        <div class=\"sb-spec\">Psychologue Clinicien</div>
      </div>
    </div>

    {# — CITATION DU JOUR — #}
    <div class=\"sb-section\">
      <div class=\"sb-section-title\">✦ Citation du jour</div>
      <div class=\"sb-quote-card\">
        <div class=\"sb-quote-text\" id=\"quoteText\">La guérison est un retour à soi-même, pas une fuite de la douleur.</div>
        <div class=\"sb-quote-author\" id=\"quoteAuthor\">Carl Rogers</div>
        <div class=\"sb-quote-nav\" id=\"quoteNav\"></div>
      </div>
    </div>

    {# — ÉTAT DU CABINET — #}
    <div class=\"sb-section\">
      <div class=\"sb-section-title\">◈ État du cabinet</div>
      <div class=\"sb-mood-grid\">
        <div class=\"sb-mood-chip active\" onclick=\"setMood(this)\">
          <span class=\"sb-mood-icon\">🌿</span>
          <span class=\"sb-mood-label\">Serein</span>
        </div>
        <div class=\"sb-mood-chip\" onclick=\"setMood(this)\">
          <span class=\"sb-mood-icon\">⚡</span>
          <span class=\"sb-mood-label\">Actif</span>
        </div>
        <div class=\"sb-mood-chip\" onclick=\"setMood(this)\">
          <span class=\"sb-mood-icon\">🤝</span>
          <span class=\"sb-mood-label\">Écoute</span>
        </div>
        <div class=\"sb-mood-chip\" onclick=\"setMood(this)\">
          <span class=\"sb-mood-icon\">🌙</span>
          <span class=\"sb-mood-label\">Calme</span>
        </div>
      </div>
    </div>

    {# — PROCHAIN RDV — #}
    <div class=\"sb-section\">
      <div class=\"sb-section-title\">◎ Prochain rendez-vous</div>
      {% if myReservations is not empty %}
        {% set nextRes = myReservations|first %}
        {% set nextRdv = nextRes.rendezVous %}
        <div class=\"sb-next-rdv\">
          <div class=\"sb-next-tag\">Prochain</div>
          <div class=\"sb-next-time\">{{ nextRdv.heureDebut|date('H:i') }}</div>
          <div class=\"sb-next-name\">{{ nextRes.user.firstname }} {{ nextRes.user.lastname }}</div>
          <div class=\"sb-next-type\">
            <svg width=\"10\" height=\"10\" viewBox=\"0 0 12 12\" fill=\"none\">
              <circle cx=\"6\" cy=\"4\" r=\"3\" stroke=\"#c8dcc4\" stroke-width=\"1.2\"/>
              <path d=\"M2 11c0-2.2 1.8-4 4-4s4 1.8 4 4\" stroke=\"#c8dcc4\" stroke-width=\"1.2\"/>
            </svg>
            {{ nextRdv.typeSeance == 'en_ligne' ? 'En ligne' : 'Présentiel' }} · {{ nextRdv.dateRendezVous }}
          </div>
        </div>
      {% else %}
        <div class=\"sb-no-rdv\">Aucun rendez-vous à venir</div>
      {% endif %}
    </div>

    {# — PRÉSENCE & BIEN-ÊTRE — #}
    <div class=\"sb-section\">
      <div class=\"sb-section-title\">❋ Présence & bien-être</div>
      <div class=\"sb-plant-wrap\">
        <svg width=\"150\" height=\"115\" viewBox=\"0 0 150 115\" xmlns=\"http://www.w3.org/2000/svg\">
          <!-- Pot -->
          <path d=\"M55 88 L60 108 Q75 114 90 108 L95 88Z\" fill=\"#8a9e86\" opacity=\"0.55\"/>
          <ellipse cx=\"75\" cy=\"89\" rx=\"20\" ry=\"5\" fill=\"#7a9e76\" opacity=\"0.65\"/>
          <!-- Terre -->
          <ellipse cx=\"75\" cy=\"87\" rx=\"18\" ry=\"4\" fill=\"#4a6741\" opacity=\"0.4\"/>
          <!-- Tige -->
          <path d=\"M75 88 C75 75 73 60 70 46\" stroke=\"#4a6741\" stroke-width=\"2.5\" fill=\"none\" stroke-linecap=\"round\"/>
          <!-- Feuilles gauche -->
          <path d=\"M73 77 C62 68 50 63 47 53 C53 58 63 62 71 70\" fill=\"#4a6741\" opacity=\"0.75\"/>
          <path d=\"M72 62 C59 51 47 43 44 33 C51 40 62 46 70 57\" fill=\"#7a9e76\" opacity=\"0.65\"/>
          <!-- Feuilles droite -->
          <path d=\"M71 72 C81 63 93 58 96 48 C90 53 80 57 72 65\" fill=\"#4a6741\" opacity=\"0.70\"/>
          <path d=\"M70 57 C81 47 92 40 95 30 C89 36 78 42 70 52\" fill=\"#7a9e76\" opacity=\"0.60\"/>
          <!-- Fleur -->
          <circle cx=\"70\" cy=\"46\" r=\"5\"   fill=\"#c8a96e\" opacity=\"0.90\"/>
          <circle cx=\"70\" cy=\"46\" r=\"3\"   fill=\"#f5eedf\"/>
          <circle cx=\"70\" cy=\"46\" r=\"1.5\" fill=\"#c8a96e\"/>
          <!-- Petites feuilles accent -->
          <path d=\"M71 53 C66 48 60 46 58 40 C62 44 67 46 70 51\" fill=\"#7a9e76\" opacity=\"0.50\"/>
          <!-- Petites étincelles -->
          <circle cx=\"50\" cy=\"42\" r=\"1.5\" fill=\"#c8a96e\" opacity=\"0.45\"/>
          <circle cx=\"98\" cy=\"47\" r=\"1\"   fill=\"#c8dcc4\" opacity=\"0.55\"/>
          <circle cx=\"92\" cy=\"33\" r=\"1.5\" fill=\"#c8a96e\" opacity=\"0.40\"/>
          <circle cx=\"47\" cy=\"28\" r=\"1\"   fill=\"#c8dcc4\" opacity=\"0.40\"/>
        </svg>
      </div>
      <div class=\"sb-wellness-list\">
        <div class=\"sb-wellness-item\">
          <div class=\"sb-wellness-label\">Énergie</div>
          <div class=\"sb-wellness-bar-wrap\">
            <div class=\"sb-wellness-fill\" style=\"width:78%;background:linear-gradient(90deg,#4a6741,#7a9e76)\"></div>
          </div>
          <div class=\"sb-wellness-pct\">78%</div>
        </div>
        <div class=\"sb-wellness-item\">
          <div class=\"sb-wellness-label\">Concentration</div>
          <div class=\"sb-wellness-bar-wrap\">
            <div class=\"sb-wellness-fill\" style=\"width:85%;background:linear-gradient(90deg,#c8a96e,#e8c882)\"></div>
          </div>
          <div class=\"sb-wellness-pct\">85%</div>
        </div>
        <div class=\"sb-wellness-item\">
          <div class=\"sb-wellness-label\">Sérénité</div>
          <div class=\"sb-wellness-bar-wrap\">
            <div class=\"sb-wellness-fill\" style=\"width:92%;background:linear-gradient(90deg,#b8a9c9,#c8d0e8)\"></div>
          </div>
          <div class=\"sb-wellness-pct\">92%</div>
        </div>
      </div>
    </div>

    {# — STATISTIQUES RAPIDES — #}
    <div class=\"sb-section\">
      <div class=\"sb-section-title\">◉ Cette semaine</div>
      <div class=\"sb-mini-stats\">
        <div class=\"sb-mini-stat\">
          <span class=\"sb-mini-stat-icon\">📅</span>
          <div class=\"sb-mini-stat-val\">{{ mySlots|length }}</div>
          <div class=\"sb-mini-stat-label\">Créneaux</div>
        </div>
        <div class=\"sb-mini-stat\">
          <span class=\"sb-mini-stat-icon\">👥</span>
          <div class=\"sb-mini-stat-val\">{{ myReservations|length }}</div>
          <div class=\"sb-mini-stat-label\">RDV reçus</div>
        </div>
        <div class=\"sb-mini-stat\">
          <span class=\"sb-mini-stat-icon\">📋</span>
          <div class=\"sb-mini-stat-val\">{{ myFiches|length }}</div>
          <div class=\"sb-mini-stat-label\">Fiches</div>
        </div>
        <div class=\"sb-mini-stat\">
          <span class=\"sb-mini-stat-icon\">⏳</span>
          <div class=\"sb-mini-stat-val\">{{ myReservations|length }}</div>
          <div class=\"sb-mini-stat-label\">En attente</div>
        </div>
      </div>
    </div>

    {# — OUTILS THÉRAPEUTIQUES — #}
    <div class=\"sb-section\">
      <div class=\"sb-section-title\">⊕ Outils rapides</div>
      <div class=\"sb-tools-grid\">
        <div class=\"sb-tool-card\" title=\"Minuterie de méditation\" onclick=\"alert('Minuterie — À intégrer')\">
          <svg class=\"sb-tool-icon\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\">
            <circle cx=\"12\" cy=\"13\" r=\"8\" stroke=\"#4a6741\" stroke-width=\"1.5\"/>
            <path d=\"M12 9v4l3 2\" stroke=\"#4a6741\" stroke-width=\"1.5\" stroke-linecap=\"round\"/>
            <path d=\"M9 2h6M12 2v3\" stroke=\"#4a6741\" stroke-width=\"1.5\" stroke-linecap=\"round\"/>
          </svg>
          <div class=\"sb-tool-name\">Minuterie</div>
          <div class=\"sb-tool-sub\">Méditation</div>
        </div>
        <div class=\"sb-tool-card\" title=\"Exercices de respiration\" onclick=\"alert('Respiration — À intégrer')\">
          <svg class=\"sb-tool-icon\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\">
            <path d=\"M12 3C8 3 5 6 5 10c0 5 7 11 7 11s7-6 7-11c0-4-3-7-7-7z\" stroke=\"#c8a96e\" stroke-width=\"1.5\"/>
            <circle cx=\"12\" cy=\"10\" r=\"2.5\" stroke=\"#c8a96e\" stroke-width=\"1.2\"/>
          </svg>
          <div class=\"sb-tool-name\">Respiration</div>
          <div class=\"sb-tool-sub\">4 – 7 – 8</div>
        </div>
        <div class=\"sb-tool-card\" title=\"Grilles d'évaluation\" onclick=\"alert('Évaluation — À intégrer')\">
          <svg class=\"sb-tool-icon\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\">
            <rect x=\"4\" y=\"4\" width=\"16\" height=\"16\" rx=\"3\" stroke=\"#b8a9c9\" stroke-width=\"1.5\"/>
            <path d=\"M8 12l3 3 5-6\" stroke=\"#b8a9c9\" stroke-width=\"1.5\" stroke-linecap=\"round\" stroke-linejoin=\"round\"/>
          </svg>
          <div class=\"sb-tool-name\">Évaluation</div>
          <div class=\"sb-tool-sub\">PHQ-9, GAD</div>
        </div>
        <div class=\"sb-tool-card\" title=\"Notes rapides\" onclick=\"alert('Notes — À intégrer')\">
          <svg class=\"sb-tool-icon\" width=\"24\" height=\"24\" viewBox=\"0 0 24 24\" fill=\"none\">
            <path d=\"M14 2H6a2 2 0 00-2 2v16a2 2 0 002 2h12a2 2 0 002-2V8l-6-6z\" stroke=\"#7a9e76\" stroke-width=\"1.5\"/>
            <path d=\"M14 2v6h6M8 13h8M8 17h5\" stroke=\"#7a9e76\" stroke-width=\"1.4\" stroke-linecap=\"round\"/>
          </svg>
          <div class=\"sb-tool-name\">Notes</div>
          <div class=\"sb-tool-sub\">Rapides</div>
        </div>
      </div>
    </div>

    {# — FOOTER — #}
    <div class=\"sb-footer\">
      <svg width=\"30\" height=\"30\" viewBox=\"0 0 30 30\" fill=\"none\">
        <circle cx=\"15\" cy=\"15\" r=\"13.5\" stroke=\"#4a6741\" stroke-width=\"1\"/>
        <path d=\"M15 5C10.6 5 7 8.6 7 13c0 5.5 8 13 8 13s8-7.5 8-13c0-4.4-3.6-8-8-8z\" fill=\"#eef4ed\" stroke=\"#4a6741\" stroke-width=\"1\"/>
        <circle cx=\"15\" cy=\"13\" r=\"3\" fill=\"#4a6741\" opacity=\"0.45\"/>
      </svg>
      <div>
        <div class=\"sb-footer-brand\">NAFSEYTI</div>
        <div class=\"sb-footer-tagline\">Soin · Écoute · Présence</div>
      </div>
    </div>

  </aside>

  {# ══════════════════ ZONE PRINCIPALE ══════════════════ #}
  <div class=\"psy-content-area\">

    {# ══════════════════ TOPBAR ══════════════════ #}
<div class=\"psy-topbar\">
  <div class=\"topbar-left\">
    <div class=\"topbar-title\">
      <h1 id=\"topbarTitle\">Vue d'ensemble</h1>
      <p id=\"topbarSub\">Bonjour, bienvenue dans votre espace</p>
    </div>
  </div>

  <div class=\"topbar-right\">
    <div class=\"notif-wrap\" id=\"notifWrap\">

      {# ── Cloche ── #}
      <button class=\"notif-bell-btn\" onclick=\"toggleNotifPanel()\">
        <i class=\"fas fa-bell\"></i>
        <span class=\"notif-badge\" id=\"notifBadge\"
              style=\"{{ notifCount is defined and notifCount > 0 ? '' : 'display:none;' }}\">
          {{ notifCount is defined ? notifCount : 0 }}
        </span>
      </button>

      {# ── Panel ── #}
      <div class=\"notif-panel\" id=\"notifPanel\" style=\"display:none;\">

        <div class=\"notif-panel-header\">
          <span><i class=\"fas fa-bell\"></i>&nbsp; Notifications</span>
          {% if notifCount is defined and notifCount > 0 %}
            <button class=\"notif-tout-lire-btn\" onclick=\"toutMarquerLu()\">
              <i class=\"fas fa-check-double\"></i> Tout marquer lu
            </button>
          {% endif %}
        </div>

        <div class=\"notif-list\">
          {% if notifications is not defined or notifications is empty %}
            <div class=\"notif-empty\">
              <i class=\"fas fa-check-circle\"></i><br>
              Aucune nouvelle notification
            </div>
          {% else %}
            {% for notif in notifications %}
              <div class=\"notif-item{% if not notif.lu %} unread{% endif %}\"
                   id=\"notif-{{ notif.id }}\"
                   onclick=\"marquerLue({{ notif.id }}, this)\">

                <div class=\"notif-ico ico-{{ notif.type }}\">
                  <i class=\"fas fa-{% if notif.type == 'rdv' %}calendar-plus
                    {% elseif notif.type == 'confirme' %}check-circle
                    {% else %}times-circle{% endif %}\"></i>
                </div>

                <div class=\"notif-body\">
                  <div class=\"notif-msg\">{{ notif.message }}</div>
                  <div class=\"notif-time\">
                    <i class=\"far fa-clock\"></i>
                    {{ notif.createdAt|date('d/m/Y à H:i') }}
                  </div>
                </div>

              </div>
            {% endfor %}
          {% endif %}
        </div>

      </div>{# /notif-panel #}
    </div>{# /notif-wrap #}
  </div>
</div>

    {# ══════════════════ NAVIGATION HORIZONTALE ══════════════════ #}
    <div class=\"psy-nav\">
      <div class=\"nav-container\">
        <a class=\"nav-item active\" onclick=\"showSection('overview')\" href=\"#\">
          <i class=\"fas fa-chart-line\"></i>
          <span>Vue d'ensemble</span>
        </a>
        <a class=\"nav-item\" onclick=\"showSection('horaires')\" href=\"#\">
          <i class=\"fas fa-calendar-alt\"></i>
          <span>Mes horaires</span>
        </a>
        <a class=\"nav-item\" onclick=\"showSection('rendez-vous')\" href=\"#\">
          <i class=\"fas fa-calendar-check\"></i>
          <span>Rendez-vous reçus</span>
          <span class=\"nav-badge\" id=\"badgeRdv\">0</span>
        </a>
        <a class=\"nav-item\" onclick=\"showSection('fiches')\" href=\"#\">
          <i class=\"fas fa-file-alt\"></i>
          <span>Fiches consultation</span>
        </a>
        <a class=\"nav-item\" onclick=\"showSection('conges')\" href=\"#\">
          <i class=\"fas fa-file-medical-alt\"></i>
          <span>Congés maladie</span>
          {% if congesEnAttente > 0 %}
            <span class=\"nav-badge\" id=\"badgeConges\">{{ congesEnAttente }}</span>
          {% endif %}
        </a>
      </div>
    </div>

    {# ══════════════════ MAIN CONTENT ══════════════════ #}
    <main class=\"psy-main\">

      {# SECTION : OVERVIEW #}
      <section class=\"psy-section active\" id=\"section-overview\">
        <div class=\"overview-greeting\">
          <h1>Bonjour, <em>{{ app.user ? app.user.firstname : 'Docteur' }}</em> 👋</h1>
          <p>✨ Voici un résumé de votre activité du jour.</p>
        </div>

        <div class=\"kpi-grid\">
          <div class=\"kpi-card green\">
            <div class=\"kpi-icon green\"><i class=\"fas fa-calendar-week\"></i></div>
            <div class=\"kpi-val\">{{ mySlots|length }}</div>
            <div class=\"kpi-label\">Créneaux actifs</div>
          </div>
          <div class=\"kpi-card gold\">
            <div class=\"kpi-icon gold\"><i class=\"fas fa-users\"></i></div>
            <div class=\"kpi-val\">{{ myReservations|length }}</div>
            <div class=\"kpi-label\">RDV reçus</div>
          </div>
          <div class=\"kpi-card blue\">
            <div class=\"kpi-icon blue\"><i class=\"fas fa-notes-medical\"></i></div>
            <div class=\"kpi-val\">{{ myFiches|length }}</div>
            <div class=\"kpi-label\">Fiches consultation</div>
          </div>
          <div class=\"kpi-card red\">
            <div class=\"kpi-icon red\"><i class=\"fas fa-clock\"></i></div>
            <div class=\"kpi-val\">{{ myReservations|length }}</div>
            <div class=\"kpi-label\">En attente</div>
          </div>
        </div>

        <div class=\"overview-grid\">
          <div class=\"widget-card\">
            <div class=\"widget-header\">
              <div class=\"widget-title\">
                <i class=\"fas fa-calendar-alt\"></i>
                Prochains rendez-vous
              </div>
              <a class=\"widget-action\" onclick=\"showSection('rendez-vous')\" href=\"#\">Voir tout →</a>
            </div>
            {% if myReservations is empty %}
              <div class=\"empty-state\" style=\"padding:40px;\">
                <i class=\"fas fa-calendar-check empty-state-icon\"></i>
                <p>Aucun rendez-vous reçu pour le moment.</p>
              </div>
            {% else %}
              {% for res in myReservations|slice(0, 5) %}
                {% set rdv = res.rendezVous %}
                <div class=\"appt-row\">
                  <div class=\"appt-time-block\">
                    <div class=\"appt-time\">{{ rdv.heureDebut|date('H:i') }}</div>
                    <div class=\"appt-day\">{{ rdv.dateRendezVous|slice(0,3) }}</div>
                  </div>
                  <div class=\"appt-user-avatar\">
                    {{ res.user.firstname|slice(0,1) }}{{ res.user.lastname|slice(0,1) }}
                  </div>
                  <div class=\"appt-info\">
                    <div class=\"appt-name\">{{ res.user.firstname }} {{ res.user.lastname }}</div>
                    <div class=\"appt-meta\">
                      <span><i class=\"far fa-calendar\"></i> {{ res.dateRdv ? res.dateRdv|date('d/m/Y') : '—' }}</span>
                      <span>•</span>
                      <span><i class=\"far fa-clock\"></i> {{ rdv.heureDebut|date('H:i') }} – {{ rdv.heureFin|date('H:i') }}</span>
                    </div>
                  </div>
                  <span class=\"appt-type-pill {{ rdv.typeSeance == 'en_ligne' ? 'pill-enligne' : 'pill-presentiel' }}\">
                    <i class=\"fas fa-{{ rdv.typeSeance == 'en_ligne' ? 'video' : 'building' }}\"></i>
                    {{ rdv.typeSeance == 'en_ligne' ? 'En ligne' : 'Présentiel' }}
                  </span>
                </div>
              {% endfor %}
            {% endif %}
          </div>

          <div class=\"widget-card\">
            <div class=\"widget-header\">
              <div class=\"widget-title\">
                <i class=\"fas fa-chart-simple\"></i>
                Ma semaine
              </div>
              <a class=\"widget-action\" onclick=\"showSection('horaires')\" href=\"#\">Gérer →</a>
            </div>
            <div class=\"mini-schedule\">
              {% set joursOrdre = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'] %}
              {% for jour in joursOrdre %}
                {% set slotsJour = mySlots|filter(s => s.dateRendezVous == jour) %}
                <div class=\"mini-schedule-day\">
                  <div class=\"msd-day\">{{ jour|slice(0,3) }}</div>
                  <div class=\"msd-slots\">
                    {% if slotsJour|length > 0 %}
                      {% for s in slotsJour|slice(0,3) %}
                        <span class=\"msd-slot taken\">{{ s.heureDebut|date('H:i') }}</span>
                      {% endfor %}
                      {% if slotsJour|length > 3 %}
                        <span class=\"msd-slot\" style=\"background:var(--sage-ghost);color:var(--sage);\">+{{ slotsJour|length - 3 }}</span>
                      {% endif %}
                    {% else %}
                      <span class=\"msd-slot empty\">💤 Repos</span>
                    {% endif %}
                  </div>
                </div>
              {% endfor %}
            </div>
          </div>
        </div>
      </section>

      {# SECTION : HORAIRES #}
      <section class=\"psy-section\" id=\"section-horaires\">
        <div class=\"section-header\">
          <div>
            <h2>Mes <em>horaires</em></h2>
            <p><i class=\"fas fa-calendar-week\"></i> Gérez vos créneaux de consultation hebdomadaires</p>
          </div>
          <button class=\"topbar-btn primary\" onclick=\"openModal('modalCreateSlot')\">
            <i class=\"fas fa-plus-circle\"></i> Ajouter un créneau
          </button>
        </div>

        {% for msg in app.flashes('success') %}
          <div class=\"flash-bar success\"><i class=\"fas fa-check-circle\"></i> {{ msg }}</div>
        {% endfor %}
        {% for msg in app.flashes('error') %}
          <div class=\"flash-bar error\"><i class=\"fas fa-exclamation-circle\"></i> {{ msg }}</div>
        {% endfor %}

        {% if mySlots is empty %}
          <div class=\"empty-state\">
            <i class=\"fas fa-calendar-plus empty-state-icon\"></i>
            <h3>Aucun créneau défini</h3>
            <p>Ajoutez vos disponibilités pour que les patients puissent réserver.</p>
          </div>
        {% else %}
          <div class=\"horaires-grouped\">
            {% set joursOrdre = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche'] %}
            {% for jour in joursOrdre %}
              {% set slotsDuJour = mySlots|filter(s => s.dateRendezVous == jour)|sort((a,b) => a.heureDebut <=> b.heureDebut) %}
              {% if slotsDuJour|length > 0 %}
                <div class=\"day-card\">
  <div class=\"day-card-header {{ jour in ['Samedi','Dimanche'] ? 'weekend' : 'weekday' }}\">
    <div class=\"day-name\">
      <i class=\"fas fa-calendar-alt\"></i>
      {{ jour }}
    </div>
    <div class=\"day-badge\">
      {{ slotsDuJour|length }} créneau{{ slotsDuJour|length > 1 ? 'x' : '' }}
    </div>
  </div>
  <div class=\"day-card-body\">

    {# ── Créneaux du matin (avant 12h) — tous les jours ── #}
    {% for slot in slotsDuJour %}
      {% set heure = slot.heureDebut|date('H:i') %}
      {% if heure < '12:00' %}
        <div class=\"slot-item\">
          <div class=\"slot-time\">
            <i class=\"fas fa-clock\"></i>
            <span>{{ slot.heureDebut|date('H:i') }} – {{ slot.heureFin|date('H:i') }}</span>
          </div>
          <div class=\"slot-type\">
            <span class=\"seance-tag {{ slot.typeSeance == 'en_ligne' ? 'enligne' : 'presentiel' }}\">
              <i class=\"fas fa-{{ slot.typeSeance == 'en_ligne' ? 'video' : 'building' }}\"></i>
              {{ slot.typeSeance == 'en_ligne' ? 'En ligne' : 'Présentiel' }}
            </span>
          </div>
          <div class=\"slot-status\">
            <span class=\"statut-tag {{ slot.statut == 'Pas encore pris' ? 'libre' : 'pris' }}\">
              <span class=\"sdot\"></span>
              {{ slot.statut == 'Pas encore pris' ? 'Disponible' : 'Non Disponible' }}
            </span>
          </div>
          <div class=\"slot-actions\">
            <button class=\"act-btn edit\" title=\"Modifier\"
                    onclick=\"openEditSlotModal({{ slot.id }}, '{{ slot.dateRendezVous }}', '{{ slot.heureDebut|date('H:i') }}', '{{ slot.heureFin|date('H:i') }}', '{{ slot.typeSeance }}', '{{ slot.statut }}')\">
              <i class=\"fas fa-edit\"></i>
            </button>
            <button class=\"act-btn del\" title=\"Supprimer\"
                    onclick=\"openDeleteSlotModal({{ slot.id }})\">
              <i class=\"fas fa-trash-alt\"></i>
            </button>
          </div>
        </div>
      {% endif %}
    {% endfor %}

    {# ── Samedi : fin de journée à 12h ── #}
    {% if jour == 'Samedi' %}
      <div class=\"pause-slot fin-semaine\">
        <i class=\"fas fa-door-open\"></i>
        <span>Fin de travail — Bon week-end ! 🎉</span>
      </div>

    {# ── Autres jours : pause déjeuner + après-midi ── #}
    {% else %}
      <div class=\"pause-slot\">
        <i class=\"fas fa-mug-hot\"></i>
        <span>Pause déjeuner 12:00 – 14:00</span>
      </div>

      {% for slot in slotsDuJour %}
        {% set heure = slot.heureDebut|date('H:i') %}
        {% if heure >= '14:00' %}
          <div class=\"slot-item\">
            <div class=\"slot-time\">
              <i class=\"fas fa-clock\"></i>
              <span>{{ slot.heureDebut|date('H:i') }} – {{ slot.heureFin|date('H:i') }}</span>
            </div>
            <div class=\"slot-type\">
              <span class=\"seance-tag {{ slot.typeSeance == 'en_ligne' ? 'enligne' : 'presentiel' }}\">
                <i class=\"fas fa-{{ slot.typeSeance == 'en_ligne' ? 'video' : 'building' }}\"></i>
                {{ slot.typeSeance == 'en_ligne' ? 'En ligne' : 'Présentiel' }}
              </span>
            </div>
            <div class=\"slot-status\">
              <span class=\"statut-tag {{ slot.statut == 'Pas encore pris' ? 'libre' : 'pris' }}\">
                <span class=\"sdot\"></span>
                {{ slot.statut == 'Pas encore pris' ? 'Disponible' : 'Réservé' }}
              </span>
            </div>
            <div class=\"slot-actions\">
              <button class=\"act-btn edit\" title=\"Modifier\"
                      onclick=\"openEditSlotModal({{ slot.id }}, '{{ slot.dateRendezVous }}', '{{ slot.heureDebut|date('H:i') }}', '{{ slot.heureFin|date('H:i') }}', '{{ slot.typeSeance }}', '{{ slot.statut }}')\">
                <i class=\"fas fa-edit\"></i>
              </button>
              <button class=\"act-btn del\" title=\"Supprimer\"
                      onclick=\"openDeleteSlotModal({{ slot.id }})\">
                <i class=\"fas fa-trash-alt\"></i>
              </button>
            </div>
          </div>
        {% endif %}
      {% endfor %}
    {% endif %}

  </div>
</div>
              {% endif %}
            {% endfor %}
          </div>
        {% endif %}
      </section>

      {# SECTION : RDV REÇUS #}
<section class=\"psy-section\" id=\"section-rendez-vous\">
  <div class=\"section-header\">
    <div>
      <h2>Rendez-vous <em>reçus</em></h2>
      <p><i class=\"fas fa-users\"></i> Les patients qui ont réservé un créneau avec vous</p>
    </div>
  </div>

  {% if myReservationsPaginated.totalItemCount == 0 %}
    <div class=\"empty-state\">
      <i class=\"fas fa-calendar-times empty-state-icon\"></i>
      <h3>Aucun rendez-vous reçu</h3>
      <p>Vos prochains rendez-vous apparaîtront ici.</p>
    </div>
  {% else %}
    <div class=\"rdv-recu-grid\">
      {% for res in myReservationsPaginated %}
        {% set rdv = res.rendezVous %}
        {% set patient = res.user %}
        <div class=\"rdv-recu-card\"
             data-resa-id=\"{{ res.id }}\"
             data-rdv-id=\"{{ rdv.id }}\"
             data-patient=\"{{ patient.firstname|e('html_attr') }} {{ patient.lastname|e('html_attr') }}\">
          <div class=\"rrc-stripe {{ res.statut == 'confirme' ? 'confirmed' : (res.statut == 'annule' ? 'cancelled' : 'pending') }}\"></div>
          <div class=\"rrc-body\">
            <div class=\"rrc-top\">
              <div class=\"rrc-avatar\">
                {{ patient.firstname|slice(0,1) }}{{ patient.lastname|slice(0,1) }}
              </div>
              <div>
                <div class=\"rrc-name\">{{ patient.firstname }} {{ patient.lastname }}</div>
                <div class=\"rrc-sub\"><i class=\"fas fa-envelope\"></i> {{ patient.email }}</div>
              </div>
              <span class=\"rrc-status
                {% if res.statut == 'confirme' %}confirme
                {% elseif res.statut == 'annule' %}annule
                {% else %}attente{% endif %}\">
                <i class=\"fas fa-
                  {% if res.statut == 'confirme' %}check-circle
                  {% elseif res.statut == 'annule' %}times-circle
                  {% else %}hourglass-half{% endif %}\">
                </i>
                {% if res.statut == 'confirme' %}Confirmé
                {% elseif res.statut == 'annule' %}Annulé
                {% else %}En attente{% endif %}
              </span>
            </div>

            <div class=\"rrc-chips\">
              <div class=\"rrc-chip\">
                <i class=\"fas fa-calendar-alt\"></i>
                {{ res.dateRdv ? res.dateRdv|date('d/m/Y') : '—' }}
              </div>
              <div class=\"rrc-chip\">
                <i class=\"fas fa-tag\"></i>
                {{ rdv.dateRendezVous }}
              </div>
              <div class=\"rrc-chip\">
                <i class=\"fas fa-clock\"></i>
                {{ rdv.heureDebut|date('H:i') }} – {{ rdv.heureFin|date('H:i') }}
              </div>
              <div class=\"rrc-chip\">
                <i class=\"fas fa-{{ rdv.typeSeance == 'en_ligne' ? 'video' : 'building' }}\"></i>
                {{ rdv.typeSeance == 'en_ligne' ? 'En ligne' : 'Présentiel' }}
              </div>
            </div>

            <div class=\"rrc-footer\">
  {% if res.statut == 'confirme' %}
    <button class=\"rrc-btn fiche\"
            data-resa-id=\"{{ res.id }}\"
            data-rdv-id=\"{{ rdv.id }}\"
            data-patient=\"{{ patient.firstname|e('html_attr') }} {{ patient.lastname|e('html_attr') }}\"
            onclick=\"openCreateFicheModal(this)\">
      <i class=\"fas fa-file-medical\"></i> Créer fiche
    </button>

    {# ── BOUTON GOOGLE CALENDAR ── #}
    {% if res.googleEventId %}
  <button type=\"button\" class=\"rrc-btn gcal-btn synced\" disabled>
    <i class=\"fas fa-check-circle\"></i> Synchronisé
  </button>
{% else %}
  <button type=\"button\"
      class=\"rrc-btn gcal-btn\"
      data-resa-id=\"{{ res.id }}\"
      onclick=\"return syncGoogleCalendar(event, this, {{ res.id }})\">
    <svg class=\"gcal-icon\" viewBox=\"0 0 24 24\" width=\"14\" height=\"14\" fill=\"none\">
      <rect x=\"3\" y=\"4\" width=\"18\" height=\"17\" rx=\"2\" fill=\"#fff\" stroke=\"#dadce0\" stroke-width=\"1.5\"/>
      <rect x=\"3\" y=\"8\" width=\"18\" height=\"2.5\" fill=\"#4285F4\"/>
      <line x1=\"8\" y1=\"4\" x2=\"8\" y2=\"7\" stroke=\"#5f6368\" stroke-width=\"1.5\" stroke-linecap=\"round\"/>
      <line x1=\"16\" y1=\"4\" x2=\"16\" y2=\"7\" stroke=\"#5f6368\" stroke-width=\"1.5\" stroke-linecap=\"round\"/>
      <text x=\"12\" y=\"18\" text-anchor=\"middle\" font-size=\"6\" font-weight=\"700\" fill=\"#1a73e8\">{{ rdv.dateRendezVous }}</text>
    </svg>
    Sync Calendar
  </button>
{% endif %}

  {% elseif res.statut == 'annule' %}
    <span class=\"rrc-cancelled-msg\"><i class=\"fas fa-ban\"></i> Rendez-vous annulé</span>
  {% else %}
    <button class=\"rrc-btn confirm\"
            onclick=\"updateReservationStatus({{ res.id }}, 'confirme', this)\">
      <i class=\"fas fa-check\"></i> Confirmer
    </button>
    <button class=\"rrc-btn cancel\"
            onclick=\"updateReservationStatus({{ res.id }}, 'annule', this)\">
      <i class=\"fas fa-times\"></i> Annuler
    </button>
  {% endif %}

  <button class=\"rrc-btn outline\">
    <i class=\"fas fa-eye\"></i> Détails
  </button>
</div>
          </div>
        </div>
      {% endfor %}
    </div>

    {# Pagination rendez-vous #}
    {% if myReservationsPaginated.pageCount > 1 %}
    <div class=\"fiche-pagination\">

      {% if myReservationsPaginated.currentPageNumber > 1 %}
        <a class=\"fiche-page-btn prev-next\" href=\"#\"
           onclick=\"goToRdvPage({{ myReservationsPaginated.currentPageNumber - 1 }})\">
          <i class=\"fas fa-chevron-left\"></i>
        </a>
      {% else %}
        <span class=\"fiche-page-btn prev-next disabled\">
          <i class=\"fas fa-chevron-left\"></i>
        </span>
      {% endif %}

      {% set cur = myReservationsPaginated.currentPageNumber %}
      {% set tot = myReservationsPaginated.pageCount %}
      {% for i in 1..tot %}
        {% if i == 1 or i == tot or (i >= cur - 2 and i <= cur + 2) %}
          <a class=\"fiche-page-btn {{ i == cur ? 'active' : '' }}\"
             href=\"#\" onclick=\"goToRdvPage({{ i }})\">
            {{ i }}
          </a>
        {% elseif i == cur - 3 or i == cur + 3 %}
          <span class=\"fiche-page-ellipsis\">…</span>
        {% endif %}
      {% endfor %}

      {% if myReservationsPaginated.currentPageNumber < myReservationsPaginated.pageCount %}
        <a class=\"fiche-page-btn prev-next\" href=\"#\"
           onclick=\"goToRdvPage({{ myReservationsPaginated.currentPageNumber + 1 }})\">
          <i class=\"fas fa-chevron-right\"></i>
        </a>
      {% else %}
        <span class=\"fiche-page-btn prev-next disabled\">
          <i class=\"fas fa-chevron-right\"></i>
        </span>
      {% endif %}

      <span class=\"fiche-page-info\">
        Page {{ myReservationsPaginated.currentPageNumber }} / {{ myReservationsPaginated.pageCount }}
        &nbsp;·&nbsp;
        {{ myReservationsPaginated.totalItemCount }} rendez-vous
      </span>

    </div>
    {% endif %}

  {% endif %}
</section>

     {# SECTION : FICHES #}
    <section class=\"psy-section\" id=\"section-fiches\">

  <div class=\"section-header fiches-header-top\">
    <div>
      <h2>Fiches de <em>consultation</em></h2>
      <p>
        <i class=\"fas fa-notes-medical\"></i>
        Vos notes cliniques et comptes-rendus de séances
      </p>
    </div>

    <div class=\"header-ia-zone\">
      {% include 'home/psy_ia_analyse.html.twig' %}
    </div>
  </div>

  {# Barre de recherche en dessous #}
  <div class=\"search-zone\">
    <div class=\"fiches-search-box\">
      <i class=\"fas fa-search fiches-search-icon\"></i>
      <input
        type=\"text\"
        id=\"ficheSearchInput\"
        class=\"fiches-search-input\"
        placeholder=\"Rechercher par nom du patient…\"
        autocomplete=\"off\"
        value=\"{{ search is defined ? search : '' }}\"
      >

      {% if search is defined and search != '' %}
        <button class=\"fiches-search-clear\" id=\"ficheSearchClear\" onclick=\"clearFicheSearch()\">
          <i class=\"fas fa-times\"></i>
        </button>
      {% else %}
        <button class=\"fiches-search-clear\" id=\"ficheSearchClear\" onclick=\"clearFicheSearch()\" style=\"display:none;\">
          <i class=\"fas fa-times\"></i>
        </button>
      {% endif %}
    </div>

    <div class=\"fiches-search-count\" id=\"ficheSearchCount\">
      {% if search is defined and search != '' %}
        {{ myFiches.totalItemCount }} fiche{{ myFiches.totalItemCount > 1 ? 's' : '' }} trouvée{{ myFiches.totalItemCount > 1 ? 's' : '' }}
      {% endif %}
    </div>
  </div>
  

  {# ── Aucun résultat de recherche ── #}
  {% if search is defined and search != '' and myFiches.totalItemCount == 0 %}
    <div class=\"empty-state\">
      <i class=\"fas fa-search empty-state-icon\"></i>
      <h3>Aucun résultat</h3>
      <p>Aucune fiche ne correspond à <strong>« {{ search }} »</strong>.</p>
      <a href=\"{{ path('psy_dashboard', {section: 'fiches'}) }}\" class=\"fiche-page-btn\" style=\"margin-top:12px; text-decoration:none;\">
        <i class=\"fas fa-times\"></i> Effacer la recherche
      </a>
    </div>

  {% elseif myFiches.totalItemCount == 0 %}
    <div class=\"empty-state\">
      <i class=\"fas fa-file-alt empty-state-icon\"></i>
      <h3>Aucune fiche rédigée</h3>
      <p>Créez vos premières fiches de consultation après confirmation d'un RDV.</p>
    </div>

  {% else %}
    <div class=\"fiches-grid\">
      {% for fiche in myFiches %}

        {% set patientName = 'Patient inconnu' %}
        {% for reservation in myReservations %}
          {% if reservation.rendezVous and fiche.rendezVous and reservation.rendezVous.id == fiche.rendezVous.id %}
            {% set patientName = reservation.user.firstname ~ ' ' ~ reservation.user.lastname %}
          {% endif %}
        {% endfor %}

        <div class=\"fiche-card\" data-patient=\"{{ patientName|lower }}\">

          <div class=\"fiche-card-header\">
            <div class=\"fiche-card-id\"><i class=\"fas fa-hashtag\"></i> Fiche #{{ fiche.id }}</div>
            <div class=\"fiche-card-date\">
              <i class=\"far fa-calendar-alt\"></i>
              {{ fiche.createdAt ? fiche.createdAt|date('d/m/Y') : '—' }}
            </div>
          </div>

          <div class=\"fiche-card-body\">
            <div class=\"fiche-patient-row\">
              <div class=\"fiche-patient-ico\"><i class=\"fas fa-user-circle\"></i></div>
              <div>
                <div class=\"fiche-patient-name\">{{ patientName }}</div>
                <div class=\"fiche-patient-type\">Consultation</div>
              </div>
            </div>
            <div class=\"fiche-excerpt\">
              {{ fiche.notes|slice(0, 100) }}{% if fiche.notes|length > 100 %}…{% endif %}
            </div>
          </div>

          <div class=\"fiche-card-footer\">
            <button class=\"fiche-act-btn view\"
              onclick='openFicheDrawer({
                id: {{ fiche.id }},
                date: {{ fiche.createdAt|date(\"d/m/Y à H:i\")|json_encode|raw }},
                patient: {{ patientName|json_encode|raw }},
                probleme: {{ fiche.problemePrincipal|json_encode|raw }},
                notes: {{ fiche.notes|json_encode|raw }},
                diagnostic: {{ fiche.diagnostic|json_encode|raw }},
                traitement: {{ fiche.traitement|json_encode|raw }},
                recommandations: {{ fiche.recommandations|json_encode|raw }}
              })'>
              <i class=\"fas fa-eye\"></i> Voir
            </button>

            <button class=\"fiche-act-btn edit\"
              onclick=\"openEditFicheModal(
                '{{ fiche.id }}',
                '{{ fiche.problemePrincipal|e('js') }}',
                '{{ fiche.notes|e('js') }}',
                '{{ fiche.diagnostic|e('js') }}',
                '{{ fiche.traitement|e('js') }}',
                '{{ fiche.recommandations|e('js') }}'
              )\">
              <i class=\"fas fa-edit\"></i> Modifier
            </button>

            <a class=\"fiche-act-btn pdf\"
               href=\"{{ path('psy_fiche_pdf', {id: fiche.id}) }}\"
               target=\"_blank\">
              <i class=\"fas fa-file-pdf\"></i> PDF
            </a>

            <button class=\"fiche-act-btn del\"
                    onclick=\"openDeleteFicheModal({{ fiche.id }})\">
              <i class=\"fas fa-trash-alt\"></i>
            </button>
          </div>

        </div>
      {% endfor %}
    </div>

    {# ── Pagination ── #}
    {% if myFiches.pageCount > 1 %}
    <div class=\"fiche-pagination\">

      {# Précédent #}
      {% if myFiches.currentPageNumber > 1 %}
        <a class=\"fiche-page-btn prev-next\" href=\"#\"
           onclick=\"goToFichePage({{ myFiches.currentPageNumber - 1 }})\">
          <i class=\"fas fa-chevron-left\"></i>
        </a>
      {% else %}
        <span class=\"fiche-page-btn prev-next disabled\">
          <i class=\"fas fa-chevron-left\"></i>
        </span>
      {% endif %}

      {# Numéros avec ellipsis #}
      {% set current = myFiches.currentPageNumber %}
      {% set total   = myFiches.pageCount %}
      {% for i in 1..total %}
        {% if i == 1 or i == total or (i >= current - 2 and i <= current + 2) %}
          <a class=\"fiche-page-btn {{ i == current ? 'active' : '' }}\"
             href=\"#\" onclick=\"goToFichePage({{ i }})\">
            {{ i }}
          </a>
        {% elseif i == current - 3 or i == current + 3 %}
          <span class=\"fiche-page-ellipsis\">…</span>
        {% endif %}
      {% endfor %}

      {# Suivant #}
      {% if myFiches.currentPageNumber < myFiches.pageCount %}
        <a class=\"fiche-page-btn prev-next\" href=\"#\"
           onclick=\"goToFichePage({{ myFiches.currentPageNumber + 1 }})\">
          <i class=\"fas fa-chevron-right\"></i>
        </a>
      {% else %}
        <span class=\"fiche-page-btn prev-next disabled\">
          <i class=\"fas fa-chevron-right\"></i>
        </span>
      {% endif %}

      <span class=\"fiche-page-info\">
        Page {{ myFiches.currentPageNumber }} / {{ myFiches.pageCount }}
        &nbsp;·&nbsp;
        {{ myFiches.totalItemCount }} fiche{{ myFiches.totalItemCount > 1 ? 's' : '' }}
        {% if search is defined and search != '' %}
          &nbsp;·&nbsp; <em>« {{ search }} »</em>
        {% endif %}
      </span>

    </div>
    {% endif %}

  {% endif %}
</section>
{% include 'home/psy_conge_section.html.twig' %}

    </main>
  </div>{# fin psy-content-area #}
</div>{# fin psy-layout #}

{# ══════════════════ MODALS ══════════════════ #}
<div class=\"modal-backdrop\" id=\"modalCreateSlot\"
     {% if showCreateModal is defined and showCreateModal %}style=\"display:flex\"{% endif %}>
  <div class=\"modal-box\">
    <div class=\"modal-hdr\">
      <button class=\"modal-close\" onclick=\"closeModal('modalCreateSlot')\"><i class=\"fas fa-times\"></i></button>
      <div class=\"modal-hdr-title\">Nouveau <em>créneau</em></div>
      <div class=\"modal-hdr-sub\">Définissez votre disponibilité hebdomadaire</div>
    </div>
    <form action=\"{{ path('psy_slot_create') }}\" method=\"post\" novalidate>
      <div class=\"modal-body\">

        <div class=\"form-group\">
          <label class=\"form-label\">Jour de la semaine</label>
          <select name=\"dateRendezVous\"
                  class=\"form-control {% if fieldErrors.dateRendezVous is defined %}input-error{% endif %}\">
            <option value=\"\">— Choisir —</option>
            {% for jour in ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'] %}
              <option value=\"{{ jour }}\"
                {% if oldInput.dateRendezVous is defined and oldInput.dateRendezVous == jour %}selected{% endif %}>
                {{ jour }}
              </option>
            {% endfor %}
          </select>
          {% if fieldErrors.dateRendezVous is defined %}
            <small class=\"text-danger\"><i class=\"fas fa-exclamation-circle\"></i> {{ fieldErrors.dateRendezVous }}</small>
          {% endif %}
        </div>

        <div class=\"form-row\">
          <div class=\"form-group\">
            <label class=\"form-label\">Heure de début</label>
            <input type=\"time\" name=\"heureDebut\"
                   class=\"form-control {% if fieldErrors.heureDebut is defined %}input-error{% endif %}\"
                   value=\"{{ oldInput.heureDebut is defined ? oldInput.heureDebut : '' }}\">
            {% if fieldErrors.heureDebut is defined %}
              <small class=\"text-danger\"><i class=\"fas fa-exclamation-circle\"></i> {{ fieldErrors.heureDebut }}</small>
            {% endif %}
          </div>
          <div class=\"form-group\">
            <label class=\"form-label\">Heure de fin</label>
            <input type=\"time\" name=\"heureFin\"
                   class=\"form-control {% if fieldErrors.heureFin is defined %}input-error{% endif %}\"
                   value=\"{{ oldInput.heureFin is defined ? oldInput.heureFin : '' }}\">
            {% if fieldErrors.heureFin is defined %}
              <small class=\"text-danger\"><i class=\"fas fa-exclamation-circle\"></i> {{ fieldErrors.heureFin }}</small>
            {% endif %}
          </div>
        </div>

        <div class=\"form-group\">
          <label class=\"form-label\">Type de séance</label>
          <select name=\"typeSeance\"
                  class=\"form-control {% if fieldErrors.typeSeance is defined %}input-error{% endif %}\">
            <option value=\"Présentiel\"
              {% if oldInput.typeSeance is not defined or oldInput.typeSeance == 'Présentiel' %}selected{% endif %}>
              🏢 Présentiel
            </option>
            <option value=\"en_ligne\"
              {% if oldInput.typeSeance is defined and oldInput.typeSeance == 'en_ligne' %}selected{% endif %}>
              💻 En ligne
            </option>
          </select>
          {% if fieldErrors.typeSeance is defined %}
            <small class=\"text-danger\"><i class=\"fas fa-exclamation-circle\"></i> {{ fieldErrors.typeSeance }}</small>
          {% endif %}
        </div>

        <div class=\"form-group\">
          <label class=\"form-label\">Statut</label>
          <select name=\"statut\" class=\"form-control\">
            <option value=\"Pas encore pris\">✅ Disponible</option>
          </select>
        </div>

      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"modal-btn cancel\" onclick=\"closeModal('modalCreateSlot')\">Annuler</button>
        <button type=\"submit\" class=\"modal-btn submit\"><i class=\"fas fa-save\"></i> Enregistrer</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal Modifier créneau -->
<div class=\"modal-backdrop\" id=\"modalEditSlot\" {% if showEditModal is defined and showEditModal %}style=\"display:flex\"{% endif %}>
  <div class=\"modal-box\">
    <div class=\"modal-hdr\">
      <button class=\"modal-close\" onclick=\"closeModal('modalEditSlot')\"><i class=\"fas fa-times\"></i></button>
      <div class=\"modal-hdr-title\">Modifier le <em>créneau</em></div>
      <div class=\"modal-hdr-sub\">Mettez à jour votre disponibilité</div>
    </div>
    <form id=\"editSlotForm\" method=\"post\"
          action=\"{{ editSlot is defined ? path('psy_slot_edit', {id: editSlot.id}) : '#' }}\"
          novalidate>
      <div class=\"modal-body\">

        <div class=\"form-group\">
          <label class=\"form-label\">Jour de la semaine</label>
          <select name=\"dateRendezVous\" id=\"editSlotJour\" class=\"form-control {% if fieldErrorsEdit.dateRendezVous is defined %}input-error{% endif %}\">
            {% for jour in ['Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi'] %}
              <option value=\"{{ jour }}\"
                {% if editSlot is defined and editSlot.dateRendezVous == jour %}selected{% endif %}>
                {{ jour }}
              </option>
            {% endfor %}
          </select>
          {% if fieldErrorsEdit.dateRendezVous is defined %}
            <small class=\"text-danger\"><i class=\"fas fa-exclamation-circle\"></i> {{ fieldErrorsEdit.dateRendezVous }}</small>
          {% endif %}
        </div>

        <div class=\"form-row\">
          <div class=\"form-group\">
            <label class=\"form-label\">Heure de début</label>
            <input type=\"time\" name=\"heureDebut\" id=\"editSlotDebut\"
                   class=\"form-control {% if fieldErrorsEdit.heureDebut is defined %}input-error{% endif %}\"
                   value=\"{{ editSlot is defined and editSlot.heureDebut ? editSlot.heureDebut|date('H:i') : '' }}\">
            {% if fieldErrorsEdit.heureDebut is defined %}
              <small class=\"text-danger\"><i class=\"fas fa-exclamation-circle\"></i> {{ fieldErrorsEdit.heureDebut }}</small>
            {% endif %}
          </div>
          <div class=\"form-group\">
            <label class=\"form-label\">Heure de fin</label>
            <input type=\"time\" name=\"heureFin\" id=\"editSlotFin\"
                   class=\"form-control {% if fieldErrorsEdit.heureFin is defined %}input-error{% endif %}\"
                   value=\"{{ editSlot is defined and editSlot.heureFin ? editSlot.heureFin|date('H:i') : '' }}\">
            {% if fieldErrorsEdit.heureFin is defined %}
              <small class=\"text-danger\"><i class=\"fas fa-exclamation-circle\"></i> {{ fieldErrorsEdit.heureFin }}</small>
            {% endif %}
          </div>
        </div>

        <div class=\"form-group\">
          <label class=\"form-label\">Type de séance</label>
          <select name=\"typeSeance\" id=\"editSlotType\"
                  class=\"form-control {% if fieldErrorsEdit.typeSeance is defined %}input-error{% endif %}\">
            <option value=\"Présentiel\" {% if editSlot is defined and editSlot.typeSeance == 'Présentiel' %}selected{% endif %}>🏢 Présentiel</option>
            <option value=\"en_ligne\"   {% if editSlot is defined and editSlot.typeSeance == 'en_ligne' %}selected{% endif %}>💻 En ligne</option>
          </select>
          {% if fieldErrorsEdit.typeSeance is defined %}
            <small class=\"text-danger\"><i class=\"fas fa-exclamation-circle\"></i> {{ fieldErrorsEdit.typeSeance }}</small>
          {% endif %}
        </div>

        <div class=\"form-group\">
          <label class=\"form-label\">Statut</label>
          <select name=\"statut\" id=\"editSlotStatut\" class=\"form-control\">
            <option value=\"Pas encore pris\" {% if editSlot is defined and editSlot.statut == 'Pas encore pris' %}selected{% endif %}>✅ Disponible</option>
            <option value=\"Confirmé\"         {% if editSlot is defined and editSlot.statut == 'Confirmé' %}selected{% endif %}>❌ Non Disponible</option>
          </select>
        </div>

      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"modal-btn cancel\" onclick=\"closeModal('modalEditSlot')\">Annuler</button>
        <button type=\"submit\" class=\"modal-btn submit\"><i class=\"fas fa-save\"></i> Mettre à jour</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal Supprimer créneau -->
<div class=\"modal-backdrop\" id=\"modalDeleteSlot\">
  <div class=\"modal-box modal-box-sm\">
    <div class=\"modal-body\" style=\"text-align:center; padding-top:32px;\">
      <div class=\"del-modal-icon\"><i class=\"fas fa-trash-alt\"></i></div>
      <div class=\"del-modal-title\">Supprimer ce créneau ?</div>
      <div class=\"del-modal-sub\">Cette action est irréversible. Le créneau sera définitivement supprimé.</div>
    </div>
    <div class=\"modal-footer\" style=\"justify-content:center; gap:12px;\">
      <button class=\"modal-btn cancel\" onclick=\"closeModal('modalDeleteSlot')\">Annuler</button>
      <form id=\"deleteSlotForm\" method=\"post\" style=\"display:inline;\">
        <button type=\"submit\" class=\"modal-btn danger\"><i class=\"fas fa-trash-alt\"></i> Supprimer</button>
      </form>
    </div>
  </div>
</div>

<!-- Modal Créer fiche -->
<div class=\"modal-backdrop\" id=\"modalCreateFiche\"
     {% if showCreateFiche is defined and showCreateFiche %}style=\"display:flex\"{% endif %}>
  <div class=\"modal-box\">
    <div class=\"modal-hdr\">
      <button class=\"modal-close\" onclick=\"closeModal('modalCreateFiche')\"><i class=\"fas fa-times\"></i></button>
      <div class=\"modal-hdr-title\">Nouvelle <em>fiche</em></div>
      <div class=\"modal-hdr-sub\">Rédigez votre compte-rendu de consultation</div>
    </div>
    <form action=\"{{ path('psy_fiche_create') }}\" method=\"post\" novalidate>
      <input type=\"hidden\" name=\"reservation_id\" id=\"ficheResaId\"
             value=\"{{ ficheOldInput.reservation_id is defined ? ficheOldInput.reservation_id : '' }}\">
      <input type=\"hidden\" name=\"rendezVous\" id=\"ficheRdvId\"
             value=\"{{ ficheOldInput.rendezVous is defined ? ficheOldInput.rendezVous : '' }}\">

      <div class=\"modal-body\">

        <div class=\"form-group\">
          <label class=\"form-label\">Patient</label>
          <input type=\"text\" id=\"fichePatientName\" class=\"form-control\" readonly
                 style=\"background:var(--cream-dark);\"
                 value=\"{{ ficheOldInput.patientName is defined ? ficheOldInput.patientName : '' }}\">
        </div>

        <div class=\"form-group\">
          <label class=\"form-label\">Problème principal <span class=\"required\">*</span></label>
          <textarea name=\"probleme_principal\"
                    class=\"form-control {% if ficheErrors.probleme_principal is defined %}input-error{% endif %}\"
                    rows=\"2\"
                    placeholder=\"Ex: Anxiété généralisée, dépression...\">{{ ficheOldInput.probleme_principal is defined ? ficheOldInput.probleme_principal : '' }}</textarea>
          {% if ficheErrors.probleme_principal is defined %}
            <small class=\"text-danger\"><i class=\"fas fa-exclamation-circle\"></i> {{ ficheErrors.probleme_principal }}</small>
          {% endif %}
        </div>

        <div class=\"form-group\">
          <label class=\"form-label\">Notes cliniques <span class=\"required\">*</span></label>
          <textarea name=\"notes\"
                    class=\"form-control {% if ficheErrors.notes is defined %}input-error{% endif %}\"
                    rows=\"4\"
                    placeholder=\"Observations, éléments cliniques importants...\">{{ ficheOldInput.notes is defined ? ficheOldInput.notes : '' }}</textarea>
          {% if ficheErrors.notes is defined %}
            <small class=\"text-danger\"><i class=\"fas fa-exclamation-circle\"></i> {{ ficheErrors.notes }}</small>
          {% endif %}
        </div>

        <div class=\"form-group\">
          <label class=\"form-label\">Diagnostic <span class=\"required\">*</span></label>
          <textarea name=\"diagnostic\"
                    class=\"form-control {% if ficheErrors.diagnostic is defined %}input-error{% endif %}\"
                    rows=\"3\"
                    placeholder=\"Diagnostic établi...\">{{ ficheOldInput.diagnostic is defined ? ficheOldInput.diagnostic : '' }}</textarea>
          {% if ficheErrors.diagnostic is defined %}
            <small class=\"text-danger\"><i class=\"fas fa-exclamation-circle\"></i> {{ ficheErrors.diagnostic }}</small>
          {% endif %}
        </div>

        <div class=\"form-group\">
          <label class=\"form-label\">Traitement <span class=\"required\">*</span></label>
          <textarea name=\"traitement\"
                    class=\"form-control {% if ficheErrors.traitement is defined %}input-error{% endif %}\"
                    rows=\"3\"
                    placeholder=\"Traitement prescrit ou recommandé...\">{{ ficheOldInput.traitement is defined ? ficheOldInput.traitement : '' }}</textarea>
          {% if ficheErrors.traitement is defined %}
            <small class=\"text-danger\"><i class=\"fas fa-exclamation-circle\"></i> {{ ficheErrors.traitement }}</small>
          {% endif %}
        </div>

        <div class=\"form-group\">
          <label class=\"form-label\">Recommandations <span class=\"required\">*</span></label>
          <textarea name=\"recommandations\"
                    class=\"form-control {% if ficheErrors.recommandations is defined %}input-error{% endif %}\"
                    rows=\"3\"
                    placeholder=\"Recommandations au patient...\">{{ ficheOldInput.recommandations is defined ? ficheOldInput.recommandations : '' }}</textarea>
          {% if ficheErrors.recommandations is defined %}
            <small class=\"text-danger\"><i class=\"fas fa-exclamation-circle\"></i> {{ ficheErrors.recommandations }}</small>
          {% endif %}
        </div>

      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"modal-btn cancel\" onclick=\"closeModal('modalCreateFiche')\">Annuler</button>
        <button type=\"submit\" class=\"modal-btn submit\"><i class=\"fas fa-save\"></i> Enregistrer</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal Modifier fiche -->
<div class=\"modal-backdrop\" id=\"modalEditFiche\"
     {% if showEditFiche is defined and showEditFiche %}style=\"display:flex\"{% endif %}>
  <div class=\"modal-box\">
    <div class=\"modal-hdr\">
      <button type=\"button\" class=\"modal-close\" onclick=\"closeModal('modalEditFiche')\">
        <i class=\"fas fa-times\"></i>
      </button>
      <div class=\"modal-hdr-title\">Modifier la <em>fiche</em></div>
      <div class=\"modal-hdr-sub\">Mettez à jour les informations</div>
    </div>

    <form id=\"editFicheForm\" method=\"post\"
          action=\"{{ editFiche is defined ? path('psy_fiche_edit', {'id': editFiche.id}) : '#' }}\"
          novalidate>
      <div class=\"modal-body\">

        <div class=\"form-group\">
          <label>Problème principal</label>
          <textarea name=\"probleme_principal\" id=\"editProbleme\"
                    class=\"form-control {% if ficheErrorsEdit.problemePrincipal is defined %}input-error{% endif %}\"
                    rows=\"2\">{{ editFiche is defined ? editFiche.problemePrincipal : '' }}</textarea>
          {% if ficheErrorsEdit.problemePrincipal is defined %}
            <small class=\"text-danger\"><i class=\"fas fa-exclamation-circle\"></i> {{ ficheErrorsEdit.problemePrincipal }}</small>
          {% endif %}
        </div>

        <div class=\"form-group\">
          <label>Notes cliniques</label>
          <textarea name=\"notes\" id=\"editNotes\"
                    class=\"form-control {% if ficheErrorsEdit.notes is defined %}input-error{% endif %}\"
                    rows=\"4\">{{ editFiche is defined ? editFiche.notes : '' }}</textarea>
          {% if ficheErrorsEdit.notes is defined %}
            <small class=\"text-danger\"><i class=\"fas fa-exclamation-circle\"></i> {{ ficheErrorsEdit.notes }}</small>
          {% endif %}
        </div>

        <div class=\"form-group\">
          <label>Diagnostic</label>
          <textarea name=\"diagnostic\" id=\"editDiagnostic\"
                    class=\"form-control {% if ficheErrorsEdit.diagnostic is defined %}input-error{% endif %}\"
                    rows=\"3\">{{ editFiche is defined ? editFiche.diagnostic : '' }}</textarea>
          {% if ficheErrorsEdit.diagnostic is defined %}
            <small class=\"text-danger\"><i class=\"fas fa-exclamation-circle\"></i> {{ ficheErrorsEdit.diagnostic }}</small>
          {% endif %}
        </div>

        <div class=\"form-group\">
          <label>Traitement</label>
          <textarea name=\"traitement\" id=\"editTraitement\"
                    class=\"form-control {% if ficheErrorsEdit.traitement is defined %}input-error{% endif %}\"
                    rows=\"3\">{{ editFiche is defined ? editFiche.traitement : '' }}</textarea>
          {% if ficheErrorsEdit.traitement is defined %}
            <small class=\"text-danger\"><i class=\"fas fa-exclamation-circle\"></i> {{ ficheErrorsEdit.traitement }}</small>
          {% endif %}
        </div>

        <div class=\"form-group\">
          <label>Recommandations</label>
          <textarea name=\"recommandations\" id=\"editRecommandations\"
                    class=\"form-control {% if ficheErrorsEdit.recommandations is defined %}input-error{% endif %}\"
                    rows=\"3\">{{ editFiche is defined ? editFiche.recommandations : '' }}</textarea>
          {% if ficheErrorsEdit.recommandations is defined %}
            <small class=\"text-danger\"><i class=\"fas fa-exclamation-circle\"></i> {{ ficheErrorsEdit.recommandations }}</small>
          {% endif %}
        </div>

      </div>
      <div class=\"modal-footer\">
        <button type=\"button\" class=\"modal-btn cancel\" onclick=\"closeModal('modalEditFiche')\">Annuler</button>
        <button type=\"submit\" class=\"modal-btn submit\"><i class=\"fas fa-save\"></i> Mettre à jour</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal Supprimer fiche -->
<div class=\"modal-backdrop\" id=\"modalDeleteFiche\">
  <div class=\"modal-box modal-box-sm\">
    <div class=\"modal-body\" style=\"text-align:center; padding-top:32px;\">
      <div class=\"del-modal-icon\"><i class=\"fas fa-file-times\"></i></div>
      <div class=\"del-modal-title\">Supprimer cette fiche ?</div>
      <div class=\"del-modal-sub\">Le compte-rendu sera définitivement supprimé.</div>
    </div>
    <div class=\"modal-footer\" style=\"justify-content:center; gap:12px;\">
      <button class=\"modal-btn cancel\" onclick=\"closeModal('modalDeleteFiche')\">Annuler</button>
      <form id=\"deleteFicheForm\" method=\"post\" style=\"display:inline;\">
        <button type=\"submit\" class=\"modal-btn danger\"><i class=\"fas fa-trash-alt\"></i> Supprimer</button>
      </form>
    </div>
  </div>
</div>

{# ════ DRAWER FICHE DÉTAIL ════ #}
<div class=\"fiche-drawer-overlay\" id=\"ficheDrawerOverlay\" onclick=\"closeFicheDrawer()\"></div>
<div class=\"fiche-drawer\" id=\"ficheDrawer\">

  <div class=\"fiche-drawer-header\">
    <div class=\"fiche-drawer-header-left\">
      <div class=\"fiche-drawer-icon\"><i class=\"fas fa-file-medical-alt\"></i></div>
      <div>
        <div class=\"fiche-drawer-title\">Fiche <span id=\"drawerFicheId\"></span></div>
        <div class=\"fiche-drawer-date\"><i class=\"far fa-clock\"></i> <span id=\"drawerDate\"></span></div>
      </div>
    </div>
    <button class=\"fiche-drawer-close\" onclick=\"closeFicheDrawer()\">
      <i class=\"fas fa-times\"></i>
    </button>
  </div>

  <div class=\"fiche-drawer-patient\">
    <div class=\"fiche-drawer-avatar\" id=\"drawerAvatar\"></div>
    <div>
      <div class=\"fiche-drawer-patient-name\" id=\"drawerPatient\"></div>
      <div class=\"fiche-drawer-patient-label\">Patient</div>
    </div>
  </div>

  <div class=\"fiche-drawer-body\">
    <div class=\"fiche-drawer-section\">
      <div class=\"fiche-drawer-section-title\"><i class=\"fas fa-exclamation-circle\"></i> Problème principal</div>
      <div class=\"fiche-drawer-section-content\" id=\"drawerProbleme\"></div>
    </div>
    <div class=\"fiche-drawer-section\">
      <div class=\"fiche-drawer-section-title\"><i class=\"fas fa-notes-medical\"></i> Notes cliniques</div>
      <div class=\"fiche-drawer-section-content\" id=\"drawerNotes\"></div>
    </div>
    <div class=\"fiche-drawer-section\">
      <div class=\"fiche-drawer-section-title\"><i class=\"fas fa-stethoscope\"></i> Diagnostic</div>
      <div class=\"fiche-drawer-section-content\" id=\"drawerDiagnostic\"></div>
    </div>
    <div class=\"fiche-drawer-section\">
      <div class=\"fiche-drawer-section-title\"><i class=\"fas fa-pills\"></i> Traitement</div>
      <div class=\"fiche-drawer-section-content\" id=\"drawerTraitement\"></div>
    </div>
    <div class=\"fiche-drawer-section\">
      <div class=\"fiche-drawer-section-title\"><i class=\"fas fa-clipboard-list\"></i> Recommandations</div>
      <div class=\"fiche-drawer-section-content\" id=\"drawerReco\"></div>
    </div>
  </div>

  <div class=\"fiche-drawer-footer\">
    <a class=\"fiche-drawer-pdf-btn\" id=\"drawerPdfLink\" href=\"#\" target=\"_blank\">
      <svg width=\"14\" height=\"14\" viewBox=\"0 0 24 24\" fill=\"none\" stroke=\"currentColor\" stroke-width=\"2.5\"><path d=\"M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z\"/><polyline points=\"14 2 14 8 20 8\"/></svg>
      PDF
    </a>

    <div class=\"fiche-trad-group\">
      <button class=\"fiche-trad-btn\" id=\"btnTradAr\" onclick=\"traduireFiche('arabe')\">
        🇸🇦 <span>عربي</span>
      </button>
      <button class=\"fiche-trad-btn\" id=\"btnTradFr\" onclick=\"traduireFiche('français')\">
        🇫🇷 <span>Français</span>
      </button>
      <button class=\"fiche-trad-btn\" id=\"btnTradEn\" onclick=\"traduireFiche('anglais')\">
        🇬🇧 <span>English</span>
      </button>
    </div>

    <button class=\"fiche-drawer-close-btn\" onclick=\"closeFicheDrawer()\">
      <i class=\"fas fa-times\"></i> Fermer
    </button>
  </div>

  {# Zone traduction #}
  <div id=\"ficheTraductionBox\" class=\"fiche-trad-overlay\">
    <div class=\"fiche-trad-overlay-header\">
      <div class=\"fiche-trad-overlay-title\">
        <i class=\"fas fa-language\"></i>
        Traduction
        <span class=\"fiche-trad-lang-badge\" id=\"tradLangue\"></span>
      </div>
      <button class=\"fiche-trad-overlay-close\" onclick=\"closeTradPanel()\">✕</button>
    </div>
    <div class=\"fiche-trad-overlay-body\">
      <div id=\"tradLoader\" style=\"display:none; text-align:center; padding:40px 0; color:var(--color-text-secondary);\">
        <i class=\"fas fa-spinner fa-spin fa-2x\"></i><br><br>Traduction en cours…
      </div>
      <div id=\"tradContenu\" style=\"display:none;\">
        <div class=\"fiche-drawer-section\">
          <div class=\"fiche-drawer-section-title\"><i class=\"fas fa-exclamation-circle\"></i> Problème principal</div>
          <div class=\"fiche-drawer-section-content fiche-trad-val\" id=\"tradProbleme\"></div>
        </div>
        <div class=\"fiche-drawer-section\">
          <div class=\"fiche-drawer-section-title\"><i class=\"fas fa-notes-medical\"></i> Notes cliniques</div>
          <div class=\"fiche-drawer-section-content fiche-trad-val\" id=\"tradNotes\"></div>
        </div>
        <div class=\"fiche-drawer-section\">
          <div class=\"fiche-drawer-section-title\"><i class=\"fas fa-stethoscope\"></i> Diagnostic</div>
          <div class=\"fiche-drawer-section-content fiche-trad-val\" id=\"tradDiagnostic\"></div>
        </div>
        <div class=\"fiche-drawer-section\">
          <div class=\"fiche-drawer-section-title\"><i class=\"fas fa-pills\"></i> Traitement</div>
          <div class=\"fiche-drawer-section-content fiche-trad-val\" id=\"tradTraitement\"></div>
        </div>
        <div class=\"fiche-drawer-section\">
          <div class=\"fiche-drawer-section-title\"><i class=\"fas fa-clipboard-list\"></i> Recommandations</div>
          <div class=\"fiche-drawer-section-content fiche-trad-val\" id=\"tradReco\"></div>
        </div>
      </div>
    </div>
  </div>

</div>{# fin ficheDrawer #}
{# ── Modal résultat IA ── #}
<div class=\"ia-modal-overlay\" id=\"iaModalOverlay\" onclick=\"fermerModalIA(event)\">
  <div class=\"ia-modal\" id=\"iaModal\">

    <button class=\"ia-modal-close\" onclick=\"fermerModalIA(null, true)\">
      <svg width=\"14\" height=\"14\" viewBox=\"0 0 14 14\" fill=\"none\">
        <path d=\"M1 1l12 12M13 1L1 13\" stroke=\"currentColor\" stroke-width=\"1.5\" stroke-linecap=\"round\"/>
      </svg>
    </button>

    {# Loading state #}
    <div class=\"ia-loading\" id=\"iaLoading\">
      <div class=\"ia-spinner\"></div>
      <p>Analyse en cours…</p>
      <p class=\"ia-loading-sub\">OpenAI lit les fiches de <span id=\"iaLoadingName\"></span></p>
    </div>

    {# Result state #}
    <div class=\"ia-result\" id=\"iaResult\" style=\"display:none\">

      <div class=\"ia-result-header\">
        <div class=\"ia-result-avatar\" id=\"iaResultAvatar\"></div>
        <div>
          <div class=\"ia-result-name\" id=\"iaResultName\"></div>
          <div class=\"ia-result-meta\" id=\"iaResultMeta\"></div>
        </div>
        <span class=\"ia-evolution-badge\" id=\"iaEvoBadge\"></span>
      </div>

      {# KPI row #}
      <div class=\"ia-kpi-row\" id=\"iaKpiRow\"></div>

      {# Tendances #}
      <div class=\"ia-section-title\">Évolution par symptôme</div>
      <div class=\"ia-tendances\" id=\"iaTendances\"></div>

      {# Synthèse IA #}
      <div class=\"ia-section-title\">Synthèse clinique</div>
      <div class=\"ia-synthese\" id=\"iaSynthese\"></div>

      {# Recommandations #}
      <div class=\"ia-section-title\">Recommandations</div>
      <div class=\"ia-recommandations\" id=\"iaReco\"></div>

    </div>

    {# Error state #}
    <div class=\"ia-error\" id=\"iaError\" style=\"display:none\">
      <svg width=\"32\" height=\"32\" viewBox=\"0 0 24 24\" fill=\"none\">
        <circle cx=\"12\" cy=\"12\" r=\"10\" stroke=\"currentColor\" stroke-width=\"1.4\"/>
        <path d=\"M12 7v5M12 16v.5\" stroke=\"currentColor\" stroke-width=\"1.6\" stroke-linecap=\"round\"/>
      </svg>
      <p id=\"iaErrorMsg\">Une erreur est survenue.</p>
    </div>

  </div>
</div>

{% endblock %}

{% block javascripts %}
{{ parent() }}
<script>
/* ══ Navigation sections ══ */
const sectionTitles = {
  'overview':    { title: \"Vue d'ensemble\",         sub: 'Bonjour, bienvenue dans votre espace' },
  'horaires':    { title: 'Mes horaires',            sub: 'Gérez vos créneaux de disponibilité' },
  'rendez-vous': { title: 'Rendez-vous reçus',       sub: 'Patients ayant réservé un créneau' },
  'fiches':      { title: 'Fiches de consultation',  sub: 'Vos comptes-rendus cliniques' },
  'conges':      { title: 'Congés maladie',          sub: 'Demandes soumises par vos patients' }, // ← ajouter
};

function showSection(name) {
  document.querySelectorAll('.psy-section').forEach(s => s.classList.remove('active'));
  document.querySelectorAll('.nav-item').forEach(n => n.classList.remove('active'));
  const section = document.getElementById('section-' + name);
  if (section) section.classList.add('active');
  document.querySelectorAll('.nav-item').forEach(n => {
    if (n.getAttribute('onclick') && n.getAttribute('onclick').includes(name)) n.classList.add('active');
  });
  const info = sectionTitles[name];
  if (info) {
    document.getElementById('topbarTitle').textContent = info.title;
    document.getElementById('topbarSub').textContent   = info.sub;
  }
  if (name === 'conges') loadCongesPsy(); // ← ajouter
}

/* ══ Modals ══ */
function openModal(id)  { document.getElementById(id).classList.add('open'); document.body.style.overflow = 'hidden'; }
function closeModal(id) { document.getElementById(id).style.display = 'none'; document.body.style.overflow = ''; }

document.querySelectorAll('.modal-backdrop').forEach(m => {
  m.addEventListener('click', e => { if (e.target === m) closeModal(m.id); });
});

function openEditSlotModal(id, jour, debut, fin, type, statut) {
  document.getElementById('editSlotForm').action = '/psy/slot/' + id + '/edit';
  document.getElementById('editSlotJour').value   = jour;
  document.getElementById('editSlotDebut').value  = debut;
  document.getElementById('editSlotFin').value    = fin;
  document.getElementById('editSlotType').value   = type;
  document.getElementById('editSlotStatut').value = statut;
  openModal('modalEditSlot');
}

function openDeleteSlotModal(id) {
  document.getElementById('deleteSlotForm').action = '/psy/slot/' + id + '/delete';
  openModal('modalDeleteSlot');
}

function openCreateFicheModal(btn) {
  const resaId      = btn.dataset.resaId   || '';
  const rdvId       = btn.dataset.rdvId    || '';
  const patientName = btn.dataset.patient  || '';
  document.getElementById('ficheResaId').value      = resaId;
  document.getElementById('ficheRdvId').value       = rdvId;
  document.getElementById('fichePatientName').value = patientName;
  openModal('modalCreateFiche');
}

function openEditFicheModal(id, probleme, notes, diagnostic, traitement, recommandations) {
  document.getElementById('editFicheForm').action = '/psy/fiche/' + id + '/edit';
  document.getElementById('editProbleme').value        = probleme;
  document.getElementById('editNotes').value           = notes;
  document.getElementById('editDiagnostic').value      = diagnostic;
  document.getElementById('editTraitement').value      = traitement;
  document.getElementById('editRecommandations').value = recommandations;
  document.getElementById('modalEditFiche').style.display = 'flex';
}

function openDeleteFicheModal(id) {
  document.getElementById('deleteFicheForm').action = '/psy/fiche/' + id + '/delete';
  openModal('modalDeleteFiche');
}

/* ══ Badge RDV ══ */
document.getElementById('badgeRdv').textContent = '{{ myReservations|length }}';

/* ══ Sidebar — mood picker ══ */
function setMood(el) {
  document.querySelectorAll('.sb-mood-chip').forEach(c => c.classList.remove('active'));
  el.classList.add('active');
}

/* ══ Sidebar — citations rotatives ══ */
const quotes = [
  { text: \"La guérison est un retour à soi-même, pas une fuite de la douleur.\", author: \"Carl Rogers\" },
  { text: \"Ce n'est pas ce qui nous arrive qui nous affecte, mais la façon dont nous y répondons.\", author: \"Épictète\" },
  { text: \"Le courage, c'est d'être soi-même face aux autres.\", author: \"André Gide\" },
  { text: \"La bienveillance envers soi est le début de toute transformation.\", author: \"Kristin Neff\" },
  { text: \"Là où il y a une volonté, il y a un chemin.\", author: \"Viktor Frankl\" },
];
let currentQuote = 0;

function buildQuoteNav() {
  const nav = document.getElementById('quoteNav');
  if (!nav) return;
  nav.innerHTML = '';
  quotes.forEach((_, i) => {
    const dot = document.createElement('span');
    dot.className = 'sb-quote-dot' + (i === 0 ? ' active' : '');
    dot.onclick = () => setQuote(i);
    nav.appendChild(dot);
  });
}

function setQuote(idx) {
  currentQuote = idx;
  const q = quotes[idx];
  const textEl   = document.getElementById('quoteText');
  const authorEl = document.getElementById('quoteAuthor');
  if (textEl)   { textEl.style.opacity   = 0; setTimeout(() => { textEl.textContent   = q.text;   textEl.style.opacity   = 1; }, 200); }
  if (authorEl) { authorEl.style.opacity = 0; setTimeout(() => { authorEl.textContent = q.author; authorEl.style.opacity = 1; }, 200); }
  document.querySelectorAll('.sb-quote-dot').forEach((d, i) => d.classList.toggle('active', i === idx));
}

buildQuoteNav();
setInterval(() => setQuote((currentQuote + 1) % quotes.length), 6000);

const style = document.createElement('style');
style.textContent = '#quoteText, #quoteAuthor { transition: opacity .2s ease; }';
document.head.appendChild(style);

function updateReservationStatus(reservationId, statut, btn) {
  const card     = btn.closest('.rdv-recu-card');
  const footer   = card.querySelector('.rrc-footer');
  const stripeEl = card.querySelector('.rrc-stripe');
  const statusEl = card.querySelector('.rrc-status');
  const rdvId       = card.dataset.rdvId;
  const patientName = card.dataset.patient;

  footer.querySelectorAll('button').forEach(b => b.disabled = true);

  fetch(`/psy/reservation/\${reservationId}/statut`, {
    method: 'POST',
    headers: { 'Content-Type': 'application/json' },
    body: JSON.stringify({ statut })
  })
  .then(async res => {
    const text = await res.text();
    try { return JSON.parse(text); }
    catch (e) { throw new Error('Réponse non-JSON : ' + text.substring(0, 100)); }
  })
  .then(data => {
    if (!data.success) throw new Error(data.message || 'Erreur serveur');

    if (statut === 'confirme') {
  stripeEl.className = 'rrc-stripe confirmed';
  statusEl.className = 'rrc-status confirme';
  statusEl.innerHTML = '<i class=\"fas fa-check-circle\"></i> Confirmé';
  footer.innerHTML = `
    <button class=\"rrc-btn fiche\"
            data-resa-id=\"\${reservationId}\"
            data-rdv-id=\"\${rdvId}\"
            data-patient=\"\${patientName}\"
            onclick=\"openCreateFicheModal(this)\">
      <i class=\"fas fa-file-medical\"></i> Créer fiche
    </button>

    <button type=\"button\"
            class=\"rrc-btn gcal-btn\"
            data-resa-id=\"\${reservationId}\"
            onclick=\"return syncGoogleCalendar(event, this, \${reservationId})\">
      <svg class=\"gcal-icon\" viewBox=\"0 0 24 24\" width=\"14\" height=\"14\" fill=\"none\">
        <rect x=\"3\" y=\"4\" width=\"18\" height=\"17\" rx=\"2\" fill=\"#fff\" stroke=\"#dadce0\" stroke-width=\"1.5\"/>
        <rect x=\"3\" y=\"8\" width=\"18\" height=\"2.5\" fill=\"#4285F4\"/>
        <line x1=\"8\" y1=\"4\" x2=\"8\" y2=\"7\" stroke=\"#5f6368\" stroke-width=\"1.5\" stroke-linecap=\"round\"/>
        <line x1=\"16\" y1=\"4\" x2=\"16\" y2=\"7\" stroke=\"#5f6368\" stroke-width=\"1.5\" stroke-linecap=\"round\"/>
      </svg>
      Sync Calendar
    </button>

    <button class=\"rrc-btn outline\"><i class=\"fas fa-eye\"></i> Détails</button>
  `;
}else {
      stripeEl.className = 'rrc-stripe cancelled';
      statusEl.className = 'rrc-status annule';
      statusEl.innerHTML = '<i class=\"fas fa-times-circle\"></i> Annulé';
      footer.innerHTML = `
        <span class=\"rrc-cancelled-msg\"><i class=\"fas fa-ban\"></i> Rendez-vous annulé</span>
        <button class=\"rrc-btn outline\"><i class=\"fas fa-eye\"></i> Détails</button>
      `;
    }
  })
  .catch(err => {
    console.error('Erreur complète :', err);
    alert('Erreur : ' + err.message);
    footer.querySelectorAll('button').forEach(b => b.disabled = false);
  });
}

document.addEventListener('DOMContentLoaded', function () {
  const params = new URLSearchParams(window.location.search);
  const section = params.get('section');
  if (section) showSection(section);
});

/* ══ Drawer fiche ══ */
let currentFicheId = null;

function openFicheDrawer(data) {
  currentFicheId = data.id;
  const initiales = data.patient.split(' ').map(w => w[0] || '').slice(0, 2).join('');
  document.getElementById('drawerFicheId').textContent    = '#' + data.id;
  document.getElementById('drawerDate').textContent       = data.date;
  document.getElementById('drawerAvatar').textContent     = initiales.toUpperCase();
  document.getElementById('drawerPatient').textContent    = data.patient;
  document.getElementById('drawerProbleme').textContent   = data.probleme    || '—';
  document.getElementById('drawerNotes').textContent      = data.notes       || '—';
  document.getElementById('drawerDiagnostic').textContent = data.diagnostic  || '—';
  document.getElementById('drawerTraitement').textContent = data.traitement  || '—';
  document.getElementById('drawerReco').textContent       = data.recommandations || '—';
  document.getElementById('drawerPdfLink').href           = '/psy/fiche/' + data.id + '/pdf';
  document.getElementById('ficheDrawerOverlay').classList.add('active');
  document.getElementById('ficheDrawer').classList.add('active');
  document.body.style.overflow = 'hidden';
}

function closeFicheDrawer() {
  document.getElementById('ficheDrawerOverlay').classList.remove('active');
  document.getElementById('ficheDrawer').classList.remove('active');
  document.body.style.overflow = '';
}

/* ══ Notifications ══ */
function toggleNotifPanel() {
  const panel = document.getElementById('notifPanel');
  panel.style.display = (panel.style.display === 'none') ? 'block' : 'none';
}

document.addEventListener('click', function(e) {
  const wrap = document.getElementById('notifWrap');
  if (wrap && !wrap.contains(e.target)) {
    document.getElementById('notifPanel').style.display = 'none';
  }
});

function marquerLue(id, el) {
  fetch('/psy/notification/' + id + '/lue', {
    method: 'POST',
    headers: { 'X-Requested-With': 'XMLHttpRequest' }
  })
  .then(r => r.json())
  .then(data => { if (data.success) { el.classList.remove('unread'); _decrementerBadge(); } });
}

function toutMarquerLu() {
  fetch('/psy/notifications/tout-lire', {
    method: 'POST',
    headers: { 'X-Requested-With': 'XMLHttpRequest' }
  })
  .then(r => r.json())
  .then(data => {
    if (data.success) {
      document.querySelectorAll('.notif-item.unread').forEach(el => el.classList.remove('unread'));
      const badge = document.getElementById('notifBadge');
      if (badge) badge.style.display = 'none';
      const btn = document.querySelector('.notif-tout-lire-btn');
      if (btn) btn.remove();
    }
  });
}

function _decrementerBadge() {
  const badge = document.getElementById('notifBadge');
  if (!badge) return;
  let count = parseInt(badge.textContent) - 1;
  if (count <= 0) {
    badge.style.display = 'none';
    const btn = document.querySelector('.notif-tout-lire-btn');
    if (btn) btn.remove();
  } else {
    badge.textContent = count;
  }
}

/* ══ Traduction fiche ══ */
function closeTradPanel() {
  document.getElementById('ficheTraductionBox').classList.remove('open');
  document.querySelectorAll('.fiche-trad-btn').forEach(b => b.classList.remove('active'));
}

function traduireFiche(langue) {
  if (!currentFicheId) return;

  const box     = document.getElementById('ficheTraductionBox');
  const loader  = document.getElementById('tradLoader');
  const contenu = document.getElementById('tradContenu');

  document.querySelectorAll('.fiche-trad-btn').forEach(b => b.classList.remove('active'));
  const map = { arabe: 'btnTradAr', français: 'btnTradFr', anglais: 'btnTradEn' };
  if (map[langue]) document.getElementById(map[langue])?.classList.add('active');

  const labels = { arabe: 'العربية', français: 'Français', anglais: 'English' };
  document.getElementById('tradLangue').textContent = labels[langue] || langue;

  box.classList.add('open');
  loader.style.display = 'block';
  contenu.style.display = 'none';

  const formData = new FormData();
  formData.append('langue', langue);

  fetch(`/psy/fiche/\${currentFicheId}/traduire`, { method: 'POST', body: formData })
  .then(r => r.json())
  .then(data => {
    loader.style.display = 'none';
    if (data.success) {
      const t = data.traduction;
      document.getElementById('tradProbleme').textContent   = t.probleme_principal ?? '—';
      document.getElementById('tradNotes').textContent      = t.notes ?? '—';
      document.getElementById('tradDiagnostic').textContent = t.diagnostic ?? '—';
      document.getElementById('tradTraitement').textContent = t.traitement ?? '—';
      document.getElementById('tradReco').textContent       = t.recommandations ?? '—';
      contenu.style.direction = langue === 'arabe' ? 'rtl' : 'ltr';
      contenu.style.display   = 'block';
    } else {
      contenu.innerHTML     = `<p style=\"color:red;\">Erreur : \${data.message}</p>`;
      contenu.style.display = 'block';
    }
  })
  .catch(() => {
    loader.style.display  = 'none';
    contenu.innerHTML     = '<p style=\"color:red;\">Erreur réseau.</p>';
    contenu.style.display = 'block';
  });
}
/* ══ Recherche fiches — côté serveur ══ */
(function () {
  const input = document.getElementById('ficheSearchInput');
  const clear = document.getElementById('ficheSearchClear');
  if (!input) return;

  // Afficher/masquer le bouton clear en temps réel
  input.addEventListener('input', function () {
    clear.style.display = input.value.trim() ? 'inline-flex' : 'none';
  });

  // Lancer la recherche au Enter
  input.addEventListener('keydown', function (e) {
    if (e.key === 'Enter') {
      e.preventDefault();
      launchSearch(input.value.trim());
    }
  });

  // Lancer la recherche après 500ms sans frappe (debounce)
  let debounceTimer = null;
  input.addEventListener('input', function () {
    clearTimeout(debounceTimer);
    debounceTimer = setTimeout(() => {
      launchSearch(input.value.trim());
    }, 500);
  });
})();

function launchSearch(query) {
  const url = new URL(window.location.href);
  url.searchParams.set('section', 'fiches');
  url.searchParams.set('page', '1');   // reset à page 1 à chaque nouvelle recherche
  if (query) {
    url.searchParams.set('search', query);
  } else {
    url.searchParams.delete('search');
  }
  window.location.href = url.toString();
}

function clearFicheSearch() {
  const url = new URL(window.location.href);
  url.searchParams.delete('search');
  url.searchParams.set('page', '1');
  url.searchParams.set('section', 'fiches');
  window.location.href = url.toString();
}

/* ══ Pagination fiches ══ */
function goToFichePage(page) {
  const url = new URL(window.location.href);
  url.searchParams.set('page', page);
  url.searchParams.set('section', 'fiches');
  // ← Conserver le terme de recherche en changeant de page
  window.location.href = url.toString();
}

function goToRdvPage(page) {
  const url = new URL(window.location.href);
  url.searchParams.set('rdv_page', page);
  url.searchParams.set('section', 'rendez-vous');
  window.location.href = url.toString();
}

// ── Google Calendar Sync ──
async function syncGoogleCalendar(event, btn, resaId) {
  event.preventDefault();
  event.stopPropagation();

  if (btn.classList.contains('syncing') || btn.classList.contains('synced')) {
    return false;
  }

  btn.classList.add('syncing');
  const original = btn.innerHTML;
  btn.innerHTML = '<i class=\"fas fa-spinner fa-spin\"></i> Sync...';

  try {
    const res = await fetch(`/psy/reservation/\${resaId}/sync-calendar`, {
      method: 'POST',
      headers: {
        'X-Requested-With': 'XMLHttpRequest'
      }
    });

    const data = await res.json();

    if (data.need_auth) {
      showGcalToast('info', '🔑 Connexion Google requise...');
      setTimeout(() => {
        window.location.href = '/psy/google/connect';
      }, 1200);

      btn.innerHTML = original;
      btn.classList.remove('syncing');
      return false;
    }

   if (data.success) {
  btn.classList.remove('syncing');
  btn.classList.add('synced');
  btn.innerHTML = '<i class=\"fas fa-check-circle\"></i> Synchronisé';
  showGcalToast('success', '✅ Ajouté à Google Calendar');

  setTimeout(() => {
    window.open(data.event_link, '_blank');
  }, 800);

} else {
  btn.innerHTML = original;
  btn.classList.remove('syncing');
  showGcalToast('error', data.message);
}

  } catch (err) {
    btn.innerHTML = original;
    btn.classList.remove('syncing');
    showGcalToast('error', 'Erreur réseau');
  }

  return false;
}
function showGcalToast(type, message) {
  // Supprimer toast existant
  document.querySelectorAll('.gcal-toast').forEach(t => t.remove());

  const icons = { success: '📅', error: '⚠️', info: 'ℹ️' };
  const toast = document.createElement('div');
  toast.className = `gcal-toast \${type}`;
  toast.innerHTML = `<span>\${icons[type]}</span><span>\${message}</span>`;
  document.body.appendChild(toast);

  setTimeout(() => toast.classList.add('show'), 50);
  setTimeout(() => {
    toast.classList.remove('show');
    setTimeout(() => toast.remove(), 400);
  }, 4000);
}

// Auto-sync quand un RDV est confirmé
const originalUpdateReservationStatus = window.updateReservationStatus;
window.updateReservationStatus = async function(resaId, statut, btn) {
  await originalUpdateReservationStatus?.(resaId, statut, btn);
  
  if (statut === 'confirme') {
    // Attendre que l'UI se mette à jour puis proposer la sync
    setTimeout(() => {
      const card = btn.closest('.rdv-recu-card');
      if (card) {
        showGcalToast('info', '📅 RDV confirmé ! Cliquez sur \"Sync Calendar\" pour ajouter à Google Calendar.');
      }
    }, 800);
  }
};

</script>
{% endblock %}
", "home/psy_dashboard.html.twig", "C:\\Users\\sirine\\psy1\\psy\\templates\\home\\psy_dashboard.html.twig");
    }
}
