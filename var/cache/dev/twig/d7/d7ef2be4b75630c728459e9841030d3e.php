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

/* front/tests/result.html.twig */
class __TwigTemplate_768105ad843936b4fd28a7930cd9a2cd extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front/tests/result.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front/tests/result.html.twig"));

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

        yield "Résultats du test - ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 3, $this->source); })()), "titre", [], "any", false, false, false, 3), "html", null, true);
        
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
        yield "
";
        // line 8
        if ((($tmp = (isset($context["isCritique"]) || array_key_exists("isCritique", $context) ? $context["isCritique"] : (function () { throw new RuntimeError('Variable "isCritique" does not exist.', 8, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 9
            yield "<div id=\"sosOverlay\" style=\"position:fixed;inset:0;background:rgba(0,0,0,0.75);z-index:9999;display:flex;align-items:center;justify-content:center;padding:20px;\">
    <div style=\"background:white;border-radius:20px;padding:40px;max-width:540px;width:100%;text-align:center;box-shadow:0 20px 60px rgba(0,0,0,0.3);animation:popIn .4s ease;overflow-y:auto;max-height:90vh;\">
        
        <div style=\"font-size:3rem;margin-bottom:16px;\">🆘</div>
        <h2 style=\"color:#c0392b;font-family:'Playfair Display',serif;margin-bottom:12px;\">Vous n'êtes pas seul(e)</h2>
        <p style=\"color:#555;line-height:1.7;margin-bottom:24px;\">
            ";
            // line 15
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["gemini"]) || array_key_exists("gemini", $context) ? $context["gemini"] : (function () { throw new RuntimeError('Variable "gemini" does not exist.', 15, $this->source); })()), "message_sos", [], "any", false, false, false, 15)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 16
                yield "                ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["gemini"]) || array_key_exists("gemini", $context) ? $context["gemini"] : (function () { throw new RuntimeError('Variable "gemini" does not exist.', 16, $this->source); })()), "message_sos", [], "any", false, false, false, 16), "html", null, true);
                yield "
            ";
            } else {
                // line 18
                yield "                Vos réponses indiquent que vous traversez une période très difficile. Des professionnels sont disponibles pour vous aider maintenant.
            ";
            }
            // line 20
            yield "        </p>

        <div style=\"display:flex;flex-direction:column;gap:12px;margin-bottom:24px;\">
            <div style=\"background:#fdf0ee;border-radius:12px;padding:16px;display:flex;align-items:center;gap:14px;text-align:left;\">
                <span style=\"font-size:1.8rem;\">📞</span>
                <div>
                    <p style=\"margin:0;font-weight:700;color:#c0392b;font-size:1rem;\">Urgences médicales</p>
                    <p style=\"font-size:1.6rem;font-weight:bold;color:#c0392b;margin:2px 0;\">190</p>
                    <p style=\"margin:0;font-size:0.78rem;color:#888;\">SAMU — Disponible 24h/24</p>
                </div>
                <a href=\"tel:190\" style=\"margin-left:auto;background:#c0392b;color:white;padding:8px 16px;border-radius:8px;text-decoration:none;font-weight:600;font-size:0.85rem;white-space:nowrap;\">Appeler</a>
            </div>

            <div style=\"background:#fdf0ee;border-radius:12px;padding:16px;display:flex;align-items:center;gap:14px;text-align:left;\">
                <span style=\"font-size:1.8rem;\">🚨</span>
                <div>
                    <p style=\"margin:0;font-weight:700;color:#c0392b;font-size:1rem;\">Police secours</p>
                    <p style=\"font-size:1.6rem;font-weight:bold;color:#c0392b;margin:2px 0;\">197</p>
                    <p style=\"margin:0;font-size:0.78rem;color:#888;\">Disponible 24h/24</p>
                </div>
                <a href=\"tel:197\" style=\"margin-left:auto;background:#c0392b;color:white;padding:8px 16px;border-radius:8px;text-decoration:none;font-weight:600;font-size:0.85rem;white-space:nowrap;\">Appeler</a>
            </div>

            <div style=\"background:#fef9ee;border-radius:12px;padding:16px;display:flex;align-items:center;gap:14px;text-align:left;\">
                <span style=\"font-size:1.8rem;\">🧠</span>
                <div>
                    <p style=\"margin:0;font-weight:700;color:#b7791f;font-size:1rem;\">Hôpital Razi — Psychiatrie</p>
                    <p style=\"font-size:1.3rem;font-weight:bold;color:#b7791f;margin:2px 0;\">+216 71 560 600</p>
                    <p style=\"margin:0;font-size:0.78rem;color:#888;\">La Manouba, Tunis</p>
                </div>
                <a href=\"tel:+21671560600\" style=\"margin-left:auto;background:#b7791f;color:white;padding:8px 16px;border-radius:8px;text-decoration:none;font-weight:600;font-size:0.85rem;white-space:nowrap;\">Appeler</a>
            </div>

            <div style=\"background:#fef9ee;border-radius:12px;padding:16px;display:flex;align-items:center;gap:14px;text-align:left;\">
                <span style=\"font-size:1.8rem;\">💚</span>
                <div>
                    <p style=\"margin:0;font-weight:700;color:#b7791f;font-size:1rem;\">Association Jeunesse Sans Frontières</p>
                    <p style=\"font-size:1.3rem;font-weight:bold;color:#b7791f;margin:2px 0;\">+216 71 840 000</p>
                    <p style=\"margin:0;font-size:0.78rem;color:#888;\">Soutien psychologique — Tunis</p>
                </div>
                <a href=\"tel:+21671840000\" style=\"margin-left:auto;background:#b7791f;color:white;padding:8px 16px;border-radius:8px;text-decoration:none;font-weight:600;font-size:0.85rem;white-space:nowrap;\">Appeler</a>
            </div>

            <div style=\"background:#d8f3dc;border-radius:12px;padding:16px;display:flex;align-items:center;gap:14px;text-align:left;\">
                <span style=\"font-size:1.8rem;\">🏥</span>
                <div>
                    <p style=\"margin:0;font-weight:700;color:#1a3d2b;font-size:1rem;\">Centre de santé mentale — MSP</p>
                    <p style=\"font-size:1.3rem;font-weight:bold;color:#1a3d2b;margin:2px 0;\">+216 71 578 500</p>
                    <p style=\"margin:0;font-size:0.78rem;color:#888;\">Ministère de la Santé Publique</p>
                </div>
                <a href=\"tel:+21671578500\" style=\"margin-left:auto;background:#1a3d2b;color:white;padding:8px 16px;border-radius:8px;text-decoration:none;font-weight:600;font-size:0.85rem;white-space:nowrap;\">Appeler</a>
            </div>
        </div>

        <button onclick=\"document.getElementById('sosOverlay').style.display='none'\"
                style=\"background:transparent;border:2px solid #ddd;color:#888;padding:10px 24px;border-radius:8px;cursor:pointer;font-size:0.9rem;\">
            Continuer vers mes résultats
        </button>
    </div>
</div>
";
        }
        // line 81
        yield "
<section class=\"hero-section\" style=\"min-height:auto;padding:60px 60px;\">
    <div class=\"hero-content\" style=\"text-align:center;\">
        <div class=\"hero-tag\" style=\"justify-content:center;\">Vos résultats</div>
        <h1 class=\"hero-title\" style=\"font-size:clamp(1.8rem,4vw,2.5rem);\">";
        // line 85
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 85, $this->source); })()), "titre", [], "any", false, false, false, 85), "html", null, true);
        yield "</h1>
    </div>
</section>

<section class=\"donations-section\" style=\"padding-top:0;\">
    <div class=\"container-custom\">
        <div class=\"donate-grid\" style=\"grid-template-columns:1fr;\">
            <div class=\"donate-form-side\" style=\"padding:40px;\">

                ";
        // line 95
        yield "                ";
        if ((array_key_exists("badge", $context) && (isset($context["badge"]) || array_key_exists("badge", $context) ? $context["badge"] : (function () { throw new RuntimeError('Variable "badge" does not exist.', 95, $this->source); })()))) {
            // line 96
            yield "                <div style=\"text-align: center; padding: 25px; background: linear-gradient(135deg, ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["badge"]) || array_key_exists("badge", $context) ? $context["badge"] : (function () { throw new RuntimeError('Variable "badge" does not exist.', 96, $this->source); })()), "color", [], "any", false, false, false, 96), "html", null, true);
            yield "20 0%, ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["badge"]) || array_key_exists("badge", $context) ? $context["badge"] : (function () { throw new RuntimeError('Variable "badge" does not exist.', 96, $this->source); })()), "color", [], "any", false, false, false, 96), "html", null, true);
            yield "10 100%); border-radius: 20px; margin-bottom: 30px; border: 2px solid ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["badge"]) || array_key_exists("badge", $context) ? $context["badge"] : (function () { throw new RuntimeError('Variable "badge" does not exist.', 96, $this->source); })()), "color", [], "any", false, false, false, 96), "html", null, true);
            yield "40;\">
                    <div style=\"font-size: 4.5rem; margin-bottom: 10px; animation: bounce 0.5s ease;\">
                        ";
            // line 98
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["badge"]) || array_key_exists("badge", $context) ? $context["badge"] : (function () { throw new RuntimeError('Variable "badge" does not exist.', 98, $this->source); })()), "icon", [], "any", false, false, false, 98), "html", null, true);
            yield "
                    </div>
                    <h3 style=\"color: ";
            // line 100
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["badge"]) || array_key_exists("badge", $context) ? $context["badge"] : (function () { throw new RuntimeError('Variable "badge" does not exist.', 100, $this->source); })()), "color", [], "any", false, false, false, 100), "html", null, true);
            yield "; margin: 0 0 8px 0; font-family: 'Playfair Display', serif; font-size: 1.5rem;\">
                        🎖️ Badge ";
            // line 101
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["badge"]) || array_key_exists("badge", $context) ? $context["badge"] : (function () { throw new RuntimeError('Variable "badge" does not exist.', 101, $this->source); })()), "label", [], "any", false, false, false, 101), "html", null, true);
            yield "
                    </h3>
                    <p style=\"color: #666; margin: 0 0 15px 0; font-size: 0.95rem;\">
                        ";
            // line 104
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["badge"]) || array_key_exists("badge", $context) ? $context["badge"] : (function () { throw new RuntimeError('Variable "badge" does not exist.', 104, $this->source); })()), "description", [], "any", false, false, false, 104), "html", null, true);
            yield "
                    </p>
                    <div style=\"display: inline-flex; align-items: center; gap: 8px; background: ";
            // line 106
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["badge"]) || array_key_exists("badge", $context) ? $context["badge"] : (function () { throw new RuntimeError('Variable "badge" does not exist.', 106, $this->source); })()), "color", [], "any", false, false, false, 106), "html", null, true);
            yield "; color: white; padding: 8px 20px; border-radius: 25px; font-size: 0.9rem; font-weight: 600;\">
                        <span>⭐</span>
                        +";
            // line 108
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["badge"]) || array_key_exists("badge", $context) ? $context["badge"] : (function () { throw new RuntimeError('Variable "badge" does not exist.', 108, $this->source); })()), "points_xp", [], "any", false, false, false, 108), "html", null, true);
            yield " XP
                    </div>
                </div>
                ";
        }
        // line 112
        yield "
                ";
        // line 114
        yield "                <div style=\"text-align:center;margin-bottom:40px;padding:30px;background:linear-gradient(135deg,var(--green-deep),var(--green-mid));border-radius:16px;color:white;\">
                    <div style=\"font-size:1rem;opacity:0.8;margin-bottom:10px;\">Votre score</div>
                    <div style=\"font-size:4rem;font-weight:bold;font-family:'Playfair Display',serif;\">";
        // line 116
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["percentage"]) || array_key_exists("percentage", $context) ? $context["percentage"] : (function () { throw new RuntimeError('Variable "percentage" does not exist.', 116, $this->source); })()), "html", null, true);
        yield "%</div>
                    <div style=\"font-size:0.9rem;margin-top:10px;\">";
        // line 117
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["totalScore"]) || array_key_exists("totalScore", $context) ? $context["totalScore"] : (function () { throw new RuntimeError('Variable "totalScore" does not exist.', 117, $this->source); })()), "html", null, true);
        yield " / ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["maxScore"]) || array_key_exists("maxScore", $context) ? $context["maxScore"] : (function () { throw new RuntimeError('Variable "maxScore" does not exist.', 117, $this->source); })()), "html", null, true);
        yield " points</div>
                    <div style=\"background:rgba(255,255,255,0.3);border-radius:100px;height:8px;margin-top:20px;overflow:hidden;\">
                        <div style=\"width:";
        // line 119
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["percentage"]) || array_key_exists("percentage", $context) ? $context["percentage"] : (function () { throw new RuntimeError('Variable "percentage" does not exist.', 119, $this->source); })()), "html", null, true);
        yield "%;background:var(--beige-cream);height:100%;border-radius:100px;transition:width 1s ease;\"></div>
                    </div>
                </div>

                ";
        // line 124
        yield "                <div style=\"margin-bottom:32px;padding:30px;background:var(--beige-cream);border-radius:12px;border-left:4px solid var(--green-sage);\">
                    <h3 style=\"font-family:'Playfair Display',serif;color:var(--text-dark);margin-bottom:15px;\">
                        <i class=\"fas ";
        // line 126
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["interpretation"]) || array_key_exists("interpretation", $context) ? $context["interpretation"] : (function () { throw new RuntimeError('Variable "interpretation" does not exist.', 126, $this->source); })()), "icon", [], "any", false, false, false, 126), "html", null, true);
        yield "\"></i> ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["interpretation"]) || array_key_exists("interpretation", $context) ? $context["interpretation"] : (function () { throw new RuntimeError('Variable "interpretation" does not exist.', 126, $this->source); })()), "title", [], "any", false, false, false, 126), "html", null, true);
        yield "
                    </h3>
                    <p style=\"font-size:1rem;line-height:1.8;color:var(--text-mid);\">";
        // line 128
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["interpretation"]) || array_key_exists("interpretation", $context) ? $context["interpretation"] : (function () { throw new RuntimeError('Variable "interpretation" does not exist.', 128, $this->source); })()), "description", [], "any", false, false, false, 128), "html", null, true);
        yield "</p>
                    <div style=\"background:var(--green-pale);border-radius:8px;padding:12px 16px;margin-top:12px;\">
                        <i class=\"fas fa-lightbulb\"></i> <strong>Conseil :</strong> ";
        // line 130
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["interpretation"]) || array_key_exists("interpretation", $context) ? $context["interpretation"] : (function () { throw new RuntimeError('Variable "interpretation" does not exist.', 130, $this->source); })()), "advice", [], "any", false, false, false, 130), "html", null, true);
        yield "
                    </div>
                </div>

                ";
        // line 135
        yield "                ";
        if ((array_key_exists("gemini", $context) && CoreExtension::getAttribute($this->env, $this->source, ($context["gemini"] ?? null), "analyse", [], "any", true, true, false, 135))) {
            // line 136
            yield "                <div style=\"margin-bottom:32px;padding:30px;background:white;border-radius:12px;border:1px solid #e0f0e8;box-shadow:0 4px 20px rgba(26,61,43,0.08);\">
                    <div style=\"display:flex;align-items:center;gap:12px;margin-bottom:20px;\">
                        <div style=\"width:40px;height:40px;background:linear-gradient(135deg,#4285f4,#34a853);border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;\">
                            <span style=\"color:white;font-size:1.2rem;\">✨</span>
                        </div>
                        <div>
                            <h3 style=\"margin:0;font-family:'Playfair Display',serif;color:var(--green-deep);font-size:1.1rem;\">Analyse personnalisée par IA</h3>
                            <span style=\"font-size:0.75rem;color:#888;\">Powered by Google Gemini</span>
                        </div>
                        ";
            // line 145
            if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["gemini"]) || array_key_exists("gemini", $context) ? $context["gemini"] : (function () { throw new RuntimeError('Variable "gemini" does not exist.', 145, $this->source); })()), "niveau_risque", [], "any", false, false, false, 145) == "critique")) {
                // line 146
                yield "                            <span style=\"margin-left:auto;background:#fdf0ee;color:#c0392b;padding:4px 12px;border-radius:20px;font-size:0.75rem;font-weight:600;border:1px solid #f5a99c;\">⚠️ Attention requise</span>
                        ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 147
(isset($context["gemini"]) || array_key_exists("gemini", $context) ? $context["gemini"] : (function () { throw new RuntimeError('Variable "gemini" does not exist.', 147, $this->source); })()), "niveau_risque", [], "any", false, false, false, 147) == "attention")) {
                // line 148
                yield "                            <span style=\"margin-left:auto;background:#fef9ee;color:#b7791f;padding:4px 12px;border-radius:20px;font-size:0.75rem;font-weight:600;border:1px solid #f6d860;\">📊 À surveiller</span>
                        ";
            } else {
                // line 150
                yield "                            <span style=\"margin-left:auto;background:#d8f3dc;color:#1a3d2b;padding:4px 12px;border-radius:20px;font-size:0.75rem;font-weight:600;border:1px solid #95d5b2;\">✅ Normal</span>
                        ";
            }
            // line 152
            yield "                    </div>

                    <p style=\"color:#444;line-height:1.8;margin-bottom:24px;font-size:0.95rem;\">";
            // line 154
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["gemini"]) || array_key_exists("gemini", $context) ? $context["gemini"] : (function () { throw new RuntimeError('Variable "gemini" does not exist.', 154, $this->source); })()), "analyse", [], "any", false, false, false, 154), "html", null, true);
            yield "</p>

                    ";
            // line 156
            if ((CoreExtension::getAttribute($this->env, $this->source, ($context["gemini"] ?? null), "conseils", [], "any", true, true, false, 156) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["gemini"]) || array_key_exists("gemini", $context) ? $context["gemini"] : (function () { throw new RuntimeError('Variable "gemini" does not exist.', 156, $this->source); })()), "conseils", [], "any", false, false, false, 156))) {
                // line 157
                yield "                    <div style=\"border-top:1px solid #e8f4ec;padding-top:20px;\">
                        <h4 style=\"color:var(--green-deep);margin-bottom:14px;font-size:0.9rem;text-transform:uppercase;letter-spacing:1px;\">💡 Conseils personnalisés</h4>
                        <div style=\"display:flex;flex-direction:column;gap:10px;\">
                            ";
                // line 160
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["gemini"]) || array_key_exists("gemini", $context) ? $context["gemini"] : (function () { throw new RuntimeError('Variable "gemini" does not exist.', 160, $this->source); })()), "conseils", [], "any", false, false, false, 160));
                $context['loop'] = [
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                ];
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["conseil"]) {
                    // line 161
                    yield "                            <div style=\"display:flex;align-items:flex-start;gap:10px;background:#f8fdf9;padding:12px 16px;border-radius:8px;\">
                                <span style=\"color:var(--green-sage);font-weight:bold;flex-shrink:0;\">";
                    // line 162
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 162), "html", null, true);
                    yield ".</span>
                                <span style=\"color:#444;font-size:0.9rem;line-height:1.6;\">";
                    // line 163
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["conseil"], "html", null, true);
                    yield "</span>
                            </div>
                            ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['conseil'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 166
                yield "                        </div>
                    </div>
                    ";
            }
            // line 169
            yield "                </div>
                ";
        }
        // line 171
        yield "
                ";
        // line 173
        yield "                ";
        if ((CoreExtension::getAttribute($this->env, $this->source, ($context["gemini"] ?? null), "coherence_visage", [], "any", true, true, false, 173) && CoreExtension::getAttribute($this->env, $this->source, (isset($context["gemini"]) || array_key_exists("gemini", $context) ? $context["gemini"] : (function () { throw new RuntimeError('Variable "gemini" does not exist.', 173, $this->source); })()), "coherence_visage", [], "any", false, false, false, 173))) {
            // line 174
            yield "                <div style=\"margin-top:16px;margin-bottom:20px;padding:12px 16px;background:#f0f9f4;border-radius:8px;border-left:3px solid var(--green-sage);\">
                    <span style=\"font-size:0.85rem;color:var(--green-mid);\">
                        📸 <strong>Analyse du visage :</strong> ";
            // line 176
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["gemini"]) || array_key_exists("gemini", $context) ? $context["gemini"] : (function () { throw new RuntimeError('Variable "gemini" does not exist.', 176, $this->source); })()), "coherence_visage", [], "any", false, false, false, 176), "html", null, true);
            yield "
                    </span>
                </div>
                ";
        }
        // line 180
        yield "
                ";
        // line 182
        yield "                <details style=\"margin-bottom:30px;\">
                    <summary style=\"cursor:pointer;padding:15px;background:var(--beige-light);border-radius:8px;font-weight:500;\">
                        <i class=\"fas fa-list\"></i> Voir le détail de mes réponses
                    </summary>
                    <div style=\"margin-top:20px;\">
                        ";
        // line 187
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["reponses"]) || array_key_exists("reponses", $context) ? $context["reponses"] : (function () { throw new RuntimeError('Variable "reponses" does not exist.', 187, $this->source); })()));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["reponse"]) {
            // line 188
            yield "                        <div style=\"padding:15px;border-bottom:1px solid var(--beige-mid);\">
                            <strong style=\"color:var(--green-deep);\">Question ";
            // line 189
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 189), "html", null, true);
            yield " :</strong>
                            <p style=\"margin:10px 0 5px 0;\">";
            // line 190
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["reponse"], "question", [], "any", false, false, false, 190), "texte", [], "any", false, false, false, 190), "html", null, true);
            yield "</p>
                            <div style=\"background:var(--beige-cream);padding:10px;border-radius:8px;\">
                                <strong>Votre réponse :</strong> ";
            // line 192
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["reponse"], "reponse", [], "any", false, false, false, 192), "html", null, true);
            yield "<br>
                                <strong>Points obtenus :</strong> ";
            // line 193
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["reponse"], "score", [], "any", false, false, false, 193), "html", null, true);
            yield " / ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["reponse"], "points_max", [], "any", false, false, false, 193), "html", null, true);
            yield "
                            </div>
                        </div>
                        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['reponse'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 197
        yield "                    </div>
                </details>

                ";
        // line 201
        yield "                <div style=\"display:flex;justify-content:center;gap:20px;flex-wrap:wrap;\">
                    <a href=\"";
        // line 202
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_test_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 202, $this->source); })()), "id", [], "any", false, false, false, 202)]), "html", null, true);
        yield "\" class=\"btn-ghost\">
                        <i class=\"fas fa-redo\"></i> Refaire le test
                    </a>
                    <a href=\"";
        // line 205
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_test_list");
        yield "\" class=\"btn-primary-custom\">
                        <i class=\"fas fa-list\"></i> Voir tous les tests
                    </a>
                    <a href=\"#\" class=\"btn-primary-custom\" style=\"background:var(--green-sage);\" onclick=\"window.print();\">
                        <i class=\"fas fa-print\"></i> Imprimer
                    </a>
                    <a href=\"";
        // line 211
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_test_pdf", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 211, $this->source); })()), "id", [], "any", false, false, false, 211)]), "html", null, true);
        yield "\"
                       class=\"btn-primary-custom\"
                       style=\"background:#1a3d2b;color:white;padding:12px 24px;border-radius:8px;text-decoration:none;font-weight:600;display:inline-flex;align-items:center;gap:8px;\">
                        <i class=\"fas fa-file-pdf\"></i> Télécharger le rapport PDF
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>

<style>
@keyframes fadeInUp {
    from { opacity:0; transform:translateY(30px); }
    to   { opacity:1; transform:translateY(0); }
}
@keyframes popIn {
    from { opacity:0; transform:scale(0.8); }
    to   { opacity:1; transform:scale(1); }
}
@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}
.donate-form-side { animation: fadeInUp 0.6s ease-out; }
</style>

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
        return "front/tests/result.html.twig";
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
        return array (  498 => 211,  489 => 205,  483 => 202,  480 => 201,  475 => 197,  455 => 193,  451 => 192,  446 => 190,  442 => 189,  439 => 188,  422 => 187,  415 => 182,  412 => 180,  405 => 176,  401 => 174,  398 => 173,  395 => 171,  391 => 169,  386 => 166,  369 => 163,  365 => 162,  362 => 161,  345 => 160,  340 => 157,  338 => 156,  333 => 154,  329 => 152,  325 => 150,  321 => 148,  319 => 147,  316 => 146,  314 => 145,  303 => 136,  300 => 135,  293 => 130,  288 => 128,  281 => 126,  277 => 124,  270 => 119,  263 => 117,  259 => 116,  255 => 114,  252 => 112,  245 => 108,  240 => 106,  235 => 104,  229 => 101,  225 => 100,  220 => 98,  210 => 96,  207 => 95,  195 => 85,  189 => 81,  126 => 20,  122 => 18,  116 => 16,  114 => 15,  106 => 9,  104 => 8,  101 => 6,  88 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Résultats du test - {{ test.titre }}{% endblock %}

{% block body %}

{# ── POPUP SOS ── #}
{% if isCritique %}
<div id=\"sosOverlay\" style=\"position:fixed;inset:0;background:rgba(0,0,0,0.75);z-index:9999;display:flex;align-items:center;justify-content:center;padding:20px;\">
    <div style=\"background:white;border-radius:20px;padding:40px;max-width:540px;width:100%;text-align:center;box-shadow:0 20px 60px rgba(0,0,0,0.3);animation:popIn .4s ease;overflow-y:auto;max-height:90vh;\">
        
        <div style=\"font-size:3rem;margin-bottom:16px;\">🆘</div>
        <h2 style=\"color:#c0392b;font-family:'Playfair Display',serif;margin-bottom:12px;\">Vous n'êtes pas seul(e)</h2>
        <p style=\"color:#555;line-height:1.7;margin-bottom:24px;\">
            {% if gemini.message_sos %}
                {{ gemini.message_sos }}
            {% else %}
                Vos réponses indiquent que vous traversez une période très difficile. Des professionnels sont disponibles pour vous aider maintenant.
            {% endif %}
        </p>

        <div style=\"display:flex;flex-direction:column;gap:12px;margin-bottom:24px;\">
            <div style=\"background:#fdf0ee;border-radius:12px;padding:16px;display:flex;align-items:center;gap:14px;text-align:left;\">
                <span style=\"font-size:1.8rem;\">📞</span>
                <div>
                    <p style=\"margin:0;font-weight:700;color:#c0392b;font-size:1rem;\">Urgences médicales</p>
                    <p style=\"font-size:1.6rem;font-weight:bold;color:#c0392b;margin:2px 0;\">190</p>
                    <p style=\"margin:0;font-size:0.78rem;color:#888;\">SAMU — Disponible 24h/24</p>
                </div>
                <a href=\"tel:190\" style=\"margin-left:auto;background:#c0392b;color:white;padding:8px 16px;border-radius:8px;text-decoration:none;font-weight:600;font-size:0.85rem;white-space:nowrap;\">Appeler</a>
            </div>

            <div style=\"background:#fdf0ee;border-radius:12px;padding:16px;display:flex;align-items:center;gap:14px;text-align:left;\">
                <span style=\"font-size:1.8rem;\">🚨</span>
                <div>
                    <p style=\"margin:0;font-weight:700;color:#c0392b;font-size:1rem;\">Police secours</p>
                    <p style=\"font-size:1.6rem;font-weight:bold;color:#c0392b;margin:2px 0;\">197</p>
                    <p style=\"margin:0;font-size:0.78rem;color:#888;\">Disponible 24h/24</p>
                </div>
                <a href=\"tel:197\" style=\"margin-left:auto;background:#c0392b;color:white;padding:8px 16px;border-radius:8px;text-decoration:none;font-weight:600;font-size:0.85rem;white-space:nowrap;\">Appeler</a>
            </div>

            <div style=\"background:#fef9ee;border-radius:12px;padding:16px;display:flex;align-items:center;gap:14px;text-align:left;\">
                <span style=\"font-size:1.8rem;\">🧠</span>
                <div>
                    <p style=\"margin:0;font-weight:700;color:#b7791f;font-size:1rem;\">Hôpital Razi — Psychiatrie</p>
                    <p style=\"font-size:1.3rem;font-weight:bold;color:#b7791f;margin:2px 0;\">+216 71 560 600</p>
                    <p style=\"margin:0;font-size:0.78rem;color:#888;\">La Manouba, Tunis</p>
                </div>
                <a href=\"tel:+21671560600\" style=\"margin-left:auto;background:#b7791f;color:white;padding:8px 16px;border-radius:8px;text-decoration:none;font-weight:600;font-size:0.85rem;white-space:nowrap;\">Appeler</a>
            </div>

            <div style=\"background:#fef9ee;border-radius:12px;padding:16px;display:flex;align-items:center;gap:14px;text-align:left;\">
                <span style=\"font-size:1.8rem;\">💚</span>
                <div>
                    <p style=\"margin:0;font-weight:700;color:#b7791f;font-size:1rem;\">Association Jeunesse Sans Frontières</p>
                    <p style=\"font-size:1.3rem;font-weight:bold;color:#b7791f;margin:2px 0;\">+216 71 840 000</p>
                    <p style=\"margin:0;font-size:0.78rem;color:#888;\">Soutien psychologique — Tunis</p>
                </div>
                <a href=\"tel:+21671840000\" style=\"margin-left:auto;background:#b7791f;color:white;padding:8px 16px;border-radius:8px;text-decoration:none;font-weight:600;font-size:0.85rem;white-space:nowrap;\">Appeler</a>
            </div>

            <div style=\"background:#d8f3dc;border-radius:12px;padding:16px;display:flex;align-items:center;gap:14px;text-align:left;\">
                <span style=\"font-size:1.8rem;\">🏥</span>
                <div>
                    <p style=\"margin:0;font-weight:700;color:#1a3d2b;font-size:1rem;\">Centre de santé mentale — MSP</p>
                    <p style=\"font-size:1.3rem;font-weight:bold;color:#1a3d2b;margin:2px 0;\">+216 71 578 500</p>
                    <p style=\"margin:0;font-size:0.78rem;color:#888;\">Ministère de la Santé Publique</p>
                </div>
                <a href=\"tel:+21671578500\" style=\"margin-left:auto;background:#1a3d2b;color:white;padding:8px 16px;border-radius:8px;text-decoration:none;font-weight:600;font-size:0.85rem;white-space:nowrap;\">Appeler</a>
            </div>
        </div>

        <button onclick=\"document.getElementById('sosOverlay').style.display='none'\"
                style=\"background:transparent;border:2px solid #ddd;color:#888;padding:10px 24px;border-radius:8px;cursor:pointer;font-size:0.9rem;\">
            Continuer vers mes résultats
        </button>
    </div>
</div>
{% endif %}

<section class=\"hero-section\" style=\"min-height:auto;padding:60px 60px;\">
    <div class=\"hero-content\" style=\"text-align:center;\">
        <div class=\"hero-tag\" style=\"justify-content:center;\">Vos résultats</div>
        <h1 class=\"hero-title\" style=\"font-size:clamp(1.8rem,4vw,2.5rem);\">{{ test.titre }}</h1>
    </div>
</section>

<section class=\"donations-section\" style=\"padding-top:0;\">
    <div class=\"container-custom\">
        <div class=\"donate-grid\" style=\"grid-template-columns:1fr;\">
            <div class=\"donate-form-side\" style=\"padding:40px;\">

                {# ── BADGE ── #}
                {% if badge is defined and badge %}
                <div style=\"text-align: center; padding: 25px; background: linear-gradient(135deg, {{ badge.color }}20 0%, {{ badge.color }}10 100%); border-radius: 20px; margin-bottom: 30px; border: 2px solid {{ badge.color }}40;\">
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
                {% endif %}

                {# ── SCORE ── #}
                <div style=\"text-align:center;margin-bottom:40px;padding:30px;background:linear-gradient(135deg,var(--green-deep),var(--green-mid));border-radius:16px;color:white;\">
                    <div style=\"font-size:1rem;opacity:0.8;margin-bottom:10px;\">Votre score</div>
                    <div style=\"font-size:4rem;font-weight:bold;font-family:'Playfair Display',serif;\">{{ percentage }}%</div>
                    <div style=\"font-size:0.9rem;margin-top:10px;\">{{ totalScore }} / {{ maxScore }} points</div>
                    <div style=\"background:rgba(255,255,255,0.3);border-radius:100px;height:8px;margin-top:20px;overflow:hidden;\">
                        <div style=\"width:{{ percentage }}%;background:var(--beige-cream);height:100%;border-radius:100px;transition:width 1s ease;\"></div>
                    </div>
                </div>

                {# ── INTERPRÉTATION ── #}
                <div style=\"margin-bottom:32px;padding:30px;background:var(--beige-cream);border-radius:12px;border-left:4px solid var(--green-sage);\">
                    <h3 style=\"font-family:'Playfair Display',serif;color:var(--text-dark);margin-bottom:15px;\">
                        <i class=\"fas {{ interpretation.icon }}\"></i> {{ interpretation.title }}
                    </h3>
                    <p style=\"font-size:1rem;line-height:1.8;color:var(--text-mid);\">{{ interpretation.description }}</p>
                    <div style=\"background:var(--green-pale);border-radius:8px;padding:12px 16px;margin-top:12px;\">
                        <i class=\"fas fa-lightbulb\"></i> <strong>Conseil :</strong> {{ interpretation.advice }}
                    </div>
                </div>

                {# ── ANALYSE GEMINI ── #}
                {% if gemini is defined and gemini.analyse is defined %}
                <div style=\"margin-bottom:32px;padding:30px;background:white;border-radius:12px;border:1px solid #e0f0e8;box-shadow:0 4px 20px rgba(26,61,43,0.08);\">
                    <div style=\"display:flex;align-items:center;gap:12px;margin-bottom:20px;\">
                        <div style=\"width:40px;height:40px;background:linear-gradient(135deg,#4285f4,#34a853);border-radius:10px;display:flex;align-items:center;justify-content:center;flex-shrink:0;\">
                            <span style=\"color:white;font-size:1.2rem;\">✨</span>
                        </div>
                        <div>
                            <h3 style=\"margin:0;font-family:'Playfair Display',serif;color:var(--green-deep);font-size:1.1rem;\">Analyse personnalisée par IA</h3>
                            <span style=\"font-size:0.75rem;color:#888;\">Powered by Google Gemini</span>
                        </div>
                        {% if gemini.niveau_risque == 'critique' %}
                            <span style=\"margin-left:auto;background:#fdf0ee;color:#c0392b;padding:4px 12px;border-radius:20px;font-size:0.75rem;font-weight:600;border:1px solid #f5a99c;\">⚠️ Attention requise</span>
                        {% elseif gemini.niveau_risque == 'attention' %}
                            <span style=\"margin-left:auto;background:#fef9ee;color:#b7791f;padding:4px 12px;border-radius:20px;font-size:0.75rem;font-weight:600;border:1px solid #f6d860;\">📊 À surveiller</span>
                        {% else %}
                            <span style=\"margin-left:auto;background:#d8f3dc;color:#1a3d2b;padding:4px 12px;border-radius:20px;font-size:0.75rem;font-weight:600;border:1px solid #95d5b2;\">✅ Normal</span>
                        {% endif %}
                    </div>

                    <p style=\"color:#444;line-height:1.8;margin-bottom:24px;font-size:0.95rem;\">{{ gemini.analyse }}</p>

                    {% if gemini.conseils is defined and gemini.conseils %}
                    <div style=\"border-top:1px solid #e8f4ec;padding-top:20px;\">
                        <h4 style=\"color:var(--green-deep);margin-bottom:14px;font-size:0.9rem;text-transform:uppercase;letter-spacing:1px;\">💡 Conseils personnalisés</h4>
                        <div style=\"display:flex;flex-direction:column;gap:10px;\">
                            {% for conseil in gemini.conseils %}
                            <div style=\"display:flex;align-items:flex-start;gap:10px;background:#f8fdf9;padding:12px 16px;border-radius:8px;\">
                                <span style=\"color:var(--green-sage);font-weight:bold;flex-shrink:0;\">{{ loop.index }}.</span>
                                <span style=\"color:#444;font-size:0.9rem;line-height:1.6;\">{{ conseil }}</span>
                            </div>
                            {% endfor %}
                        </div>
                    </div>
                    {% endif %}
                </div>
                {% endif %}

                {# ── COHERENCE VISAGE ── #}
                {% if gemini.coherence_visage is defined and gemini.coherence_visage %}
                <div style=\"margin-top:16px;margin-bottom:20px;padding:12px 16px;background:#f0f9f4;border-radius:8px;border-left:3px solid var(--green-sage);\">
                    <span style=\"font-size:0.85rem;color:var(--green-mid);\">
                        📸 <strong>Analyse du visage :</strong> {{ gemini.coherence_visage }}
                    </span>
                </div>
                {% endif %}

                {# ── DÉTAIL RÉPONSES ── #}
                <details style=\"margin-bottom:30px;\">
                    <summary style=\"cursor:pointer;padding:15px;background:var(--beige-light);border-radius:8px;font-weight:500;\">
                        <i class=\"fas fa-list\"></i> Voir le détail de mes réponses
                    </summary>
                    <div style=\"margin-top:20px;\">
                        {% for reponse in reponses %}
                        <div style=\"padding:15px;border-bottom:1px solid var(--beige-mid);\">
                            <strong style=\"color:var(--green-deep);\">Question {{ loop.index }} :</strong>
                            <p style=\"margin:10px 0 5px 0;\">{{ reponse.question.texte }}</p>
                            <div style=\"background:var(--beige-cream);padding:10px;border-radius:8px;\">
                                <strong>Votre réponse :</strong> {{ reponse.reponse }}<br>
                                <strong>Points obtenus :</strong> {{ reponse.score }} / {{ reponse.points_max }}
                            </div>
                        </div>
                        {% endfor %}
                    </div>
                </details>

                {# ── ACTIONS ── #}
                <div style=\"display:flex;justify-content:center;gap:20px;flex-wrap:wrap;\">
                    <a href=\"{{ path('front_test_show', {'id': test.id}) }}\" class=\"btn-ghost\">
                        <i class=\"fas fa-redo\"></i> Refaire le test
                    </a>
                    <a href=\"{{ path('front_test_list') }}\" class=\"btn-primary-custom\">
                        <i class=\"fas fa-list\"></i> Voir tous les tests
                    </a>
                    <a href=\"#\" class=\"btn-primary-custom\" style=\"background:var(--green-sage);\" onclick=\"window.print();\">
                        <i class=\"fas fa-print\"></i> Imprimer
                    </a>
                    <a href=\"{{ path('front_test_pdf', {'id': test.id}) }}\"
                       class=\"btn-primary-custom\"
                       style=\"background:#1a3d2b;color:white;padding:12px 24px;border-radius:8px;text-decoration:none;font-weight:600;display:inline-flex;align-items:center;gap:8px;\">
                        <i class=\"fas fa-file-pdf\"></i> Télécharger le rapport PDF
                    </a>
                </div>

            </div>
        </div>
    </div>
</section>

<style>
@keyframes fadeInUp {
    from { opacity:0; transform:translateY(30px); }
    to   { opacity:1; transform:translateY(0); }
}
@keyframes popIn {
    from { opacity:0; transform:scale(0.8); }
    to   { opacity:1; transform:scale(1); }
}
@keyframes bounce {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}
.donate-form-side { animation: fadeInUp 0.6s ease-out; }
</style>

{% endblock %}", "front/tests/result.html.twig", "C:\\Users\\sirine\\psy\\templates\\front\\tests\\result.html.twig");
    }
}
