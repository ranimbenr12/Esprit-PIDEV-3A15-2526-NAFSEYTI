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

/* front/tests/show.html.twig */
class __TwigTemplate_c1091bdf3f322d19c6a655837cb639af extends Template
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
            'nav_tests_active' => [$this, 'block_nav_tests_active'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front/tests/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front/tests/show.html.twig"));

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

        yield "Passer le test - ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 3, $this->source); })()), "titre", [], "any", false, false, false, 3), "html", null, true);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 4
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_nav_tests_active(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "nav_tests_active"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "nav_tests_active"));

        yield "active";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 6
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

        // line 7
        yield "<section class=\"hero-section\" style=\"min-height: 30vh; padding: 40px 60px;\">
    <div class=\"hero-content\" style=\"text-align: center;\">
        <div class=\"hero-tag\" style=\"justify-content: center;\">Test psychologique</div>
        <h1 class=\"hero-title\" style=\"font-size: clamp(1.8rem, 4vw, 2.5rem);\">
            ";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 11, $this->source); })()), "titre", [], "any", false, false, false, 11), "html", null, true);
        yield "
        </h1>
        <p class=\"hero-subtitle\" style=\"max-width: 700px; margin: 0 auto;\">
            ";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 14, $this->source); })()), "description", [], "any", false, false, false, 14), "html", null, true);
        yield "
        </p>
        <div style=\"display: flex; justify-content: center; gap: 30px; margin-top: 20px;\">
            <span><i class=\"fas fa-clock\"></i> Durée: ";
        // line 17
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 17, $this->source); })()), "duree", [], "any", false, false, false, 17)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 17, $this->source); })()), "duree", [], "any", false, false, false, 17) . " minutes"), "html", null, true)) : ("Non spécifiée"));
        yield "</span>
            <span><i class=\"fas fa-question-circle\"></i> ";
        // line 18
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["questions"]) || array_key_exists("questions", $context) ? $context["questions"] : (function () { throw new RuntimeError('Variable "questions" does not exist.', 18, $this->source); })())), "html", null, true);
        yield " questions</span>
        </div>
    </div>
</section>

<section class=\"donations-section\" style=\"padding-top: 0;\">
    <div class=\"container-custom\">
        <div class=\"donate-grid\" style=\"grid-template-columns: 1fr;\">
            <div class=\"donate-form-side\" style=\"padding: 40px;\">

                ";
        // line 29
        yield "                <div id=\"webcamSection\" style=\"background:white;border-radius:16px;padding:30px;margin-bottom:32px;text-align:center;box-shadow:0 4px 20px rgba(26,61,43,0.08);border:1px solid #e0f0e8;\">
                    <h3 style=\"font-family:'Playfair Display',serif;color:var(--green-deep);margin-bottom:8px;\">
                        📸 Analyse de votre expression
                    </h3>
                    <p style=\"color:#888;font-size:0.9rem;margin-bottom:20px;\">
                        Pour enrichir votre analyse, nous allons détecter votre émotion avant le test.<br>
                        <strong>Aucune photo n'est sauvegardée.</strong>
                    </p>

                    <div id=\"webcamContainer\" style=\"display:none;margin-bottom:20px;\">
                        <video id=\"webcamVideo\" autoplay playsinline style=\"width:280px;height:210px;border-radius:12px;object-fit:cover;border:3px solid var(--green-sage);\"></video>
                        <canvas id=\"webcamCanvas\" style=\"display:none;\"></canvas>
                    </div>

                    <div id=\"emotionResult\" style=\"display:none;margin-bottom:20px;\">
    <div style=\"background:#d8f3dc;border-radius:12px;padding:24px 32px;display:inline-block;animation:popIn .4s ease;\">
        <span id=\"emotionEmoji\" style=\"font-size:3rem;display:block;margin-bottom:8px;\"></span>
        <p style=\"margin:0;color:var(--green-deep);font-weight:700;font-size:1.1rem;\" id=\"emotionLabel\"></p>
        <p style=\"margin:8px 0 0 0;color:#888;font-size:0.8rem;\">Analyse en cours...</p>
    </div>
</div>

                    <div id=\"webcamError\" style=\"display:none;background:#fdf0ee;color:#c0392b;padding:12px;border-radius:8px;margin-bottom:16px;font-size:0.85rem;\">
                        ⚠️ Caméra non disponible — vous pouvez continuer sans analyse du visage.
                    </div>

                    <div style=\"display:flex;gap:12px;justify-content:center;flex-wrap:wrap;\">
                        <button type=\"button\" id=\"btnStartCam\" onclick=\"startWebcam()\"
                                style=\"background:var(--green-deep);color:white;padding:10px 20px;border-radius:8px;border:none;cursor:pointer;font-weight:600;\">
                            📷 Activer la caméra
                        </button>
                        <button type=\"button\" id=\"btnCapture\" onclick=\"capturePhoto()\" style=\"display:none;background:var(--green-sage);color:white;padding:10px 20px;border-radius:8px;border:none;cursor:pointer;font-weight:600;\">
                            ✅ Prendre la photo
                        </button>
                        <button type=\"button\" id=\"btnSkip\" onclick=\"skipWebcam()\"
                                style=\"background:transparent;border:1.5px solid #ccc;color:#888;padding:10px 20px;border-radius:8px;cursor:pointer;\">
                            Passer cette étape
                        </button>
                    </div>
                </div>

                ";
        // line 71
        yield "                <div id=\"testFormSection\" style=\"display:none;\">
                    <form method=\"post\" action=\"";
        // line 72
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_test_submit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 72, $this->source); })()), "id", [], "any", false, false, false, 72)]), "html", null, true);
        yield "\" id=\"testForm\">
                        ";
        // line 73
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["questions"]) || array_key_exists("questions", $context) ? $context["questions"] : (function () { throw new RuntimeError('Variable "questions" does not exist.', 73, $this->source); })()));
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
        foreach ($context['_seq'] as $context["_key"] => $context["question"]) {
            // line 74
            yield "                            <div class=\"question-item\" style=\"margin-bottom: 40px; padding-bottom: 30px; border-bottom: 1px solid var(--beige-mid);\">
                                <div style=\"display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 20px;\">
                                    <h3 style=\"font-family: 'Playfair Display', serif; font-size: 1.2rem; color: var(--text-dark);\">
                                        Question ";
            // line 77
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 77), "html", null, true);
            yield "
                                        ";
            // line 78
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["question"], "obligatoire", [], "any", false, false, false, 78)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 79
                yield "                                            <span style=\"color: #e74c3c; font-size: 0.9rem;\">*</span>
                                        ";
            }
            // line 81
            yield "                                    </h3>
                                    <span style=\"background: var(--green-pale); padding: 4px 12px; border-radius: 20px; font-size: 0.8rem;\">
                                        ";
            // line 83
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["question"], "points", [], "any", false, false, false, 83), "html", null, true);
            yield " point";
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["question"], "points", [], "any", false, false, false, 83) > 1)) ? ("s") : (""));
            yield "
                                    </span>
                                </div>

                                <p style=\"font-size: 1rem; color: var(--text-mid); margin-bottom: 20px; line-height: 1.6;\">
                                    ";
            // line 88
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["question"], "texte", [], "any", false, false, false, 88), "html", null, true);
            yield "
                                </p>

                                ";
            // line 91
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["question"], "typeQuestion", [], "any", false, false, false, 91) == "texte_libre")) {
                // line 92
                yield "                                    <textarea
                                        name=\"reponse_";
                // line 93
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["question"], "id", [], "any", false, false, false, 93), "html", null, true);
                yield "\"
                                        class=\"form-input-custom\"
                                        rows=\"4\"
                                        ";
                // line 96
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["question"], "obligatoire", [], "any", false, false, false, 96)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "required";
                }
                // line 97
                yield "                                        placeholder=\"Saisissez votre réponse ici...\"></textarea>

                                ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 99
$context["question"], "typeQuestion", [], "any", false, false, false, 99) == "vrai_faux")) {
                // line 100
                yield "                                    <div style=\"display: flex; gap: 30px; flex-wrap: wrap;\">
                                        <label style=\"display: flex; align-items: center; gap: 10px; cursor: pointer;\">
                                            <input type=\"radio\" name=\"reponse_";
                // line 102
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["question"], "id", [], "any", false, false, false, 102), "html", null, true);
                yield "\" value=\"Vrai\"
                                                ";
                // line 103
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["question"], "obligatoire", [], "any", false, false, false, 103)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "required";
                }
                // line 104
                yield "                                                style=\"width: 18px; height: 18px;\">
                                            <span style=\"font-size: 1rem;\">✅ Vrai</span>
                                        </label>
                                        <label style=\"display: flex; align-items: center; gap: 10px; cursor: pointer;\">
                                            <input type=\"radio\" name=\"reponse_";
                // line 108
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["question"], "id", [], "any", false, false, false, 108), "html", null, true);
                yield "\" value=\"Faux\"
                                                ";
                // line 109
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["question"], "obligatoire", [], "any", false, false, false, 109)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "required";
                }
                // line 110
                yield "                                                style=\"width: 18px; height: 18px;\">
                                            <span style=\"font-size: 1rem;\">❌ Faux</span>
                                        </label>
                                    </div>

                                ";
            } elseif (((CoreExtension::getAttribute($this->env, $this->source,             // line 115
$context["question"], "typeQuestion", [], "any", false, false, false, 115) == "qcm_unique") || (CoreExtension::getAttribute($this->env, $this->source, $context["question"], "typeQuestion", [], "any", false, false, false, 115) == "qcm"))) {
                // line 116
                yield "                                    <div style=\"display: flex; flex-direction: column; gap: 12px;\">
                                        ";
                // line 117
                $context["options"] = CoreExtension::getAttribute($this->env, $this->source, $context["question"], "reponsesPossiblesArray", [], "any", false, false, false, 117);
                // line 118
                yield "                                        ";
                if (Twig\Extension\CoreExtension::testEmpty((isset($context["options"]) || array_key_exists("options", $context) ? $context["options"] : (function () { throw new RuntimeError('Variable "options" does not exist.', 118, $this->source); })()))) {
                    // line 119
                    yield "                                            <p style=\"color: orange; font-style: italic;\">Aucune option disponible pour cette question.</p>
                                        ";
                } else {
                    // line 121
                    yield "                                            ";
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable((isset($context["options"]) || array_key_exists("options", $context) ? $context["options"] : (function () { throw new RuntimeError('Variable "options" does not exist.', 121, $this->source); })()));
                    foreach ($context['_seq'] as $context["_key"] => $context["option"]) {
                        // line 122
                        yield "                                                <label style=\"display: flex; align-items: center; gap: 12px; cursor: pointer;\">
                                                    <input type=\"radio\" name=\"reponse_";
                        // line 123
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["question"], "id", [], "any", false, false, false, 123), "html", null, true);
                        yield "\" value=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["option"], "html", null, true);
                        yield "\"
                                                        ";
                        // line 124
                        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["question"], "obligatoire", [], "any", false, false, false, 124)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                            yield "required";
                        }
                        // line 125
                        yield "                                                        style=\"width: 18px; height: 18px;\">
                                                    <span>";
                        // line 126
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["option"], "html", null, true);
                        yield "</span>
                                                </label>
                                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['option'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 129
                    yield "                                        ";
                }
                // line 130
                yield "                                    </div>

                                ";
            } else {
                // line 133
                yield "                                    <input type=\"text\" name=\"reponse_";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["question"], "id", [], "any", false, false, false, 133), "html", null, true);
                yield "\" class=\"form-input-custom\"
                                        ";
                // line 134
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["question"], "obligatoire", [], "any", false, false, false, 134)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "required";
                }
                // line 135
                yield "                                        placeholder=\"Saisissez votre réponse\">
                                ";
            }
            // line 137
            yield "
                                <div class=\"help-message\" style=\"margin-top: 10px; font-size: 0.75rem; color: var(--green-sage);\">
                                    <i class=\"fas fa-info-circle\"></i>
                                    ";
            // line 140
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["question"], "typeQuestion", [], "any", false, false, false, 140) == "texte_libre")) {
                // line 141
                yield "                                        Saisissez votre réponse en texte libre
                                    ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 142
$context["question"], "typeQuestion", [], "any", false, false, false, 142) == "vrai_faux")) {
                // line 143
                yield "                                        Sélectionnez Vrai ou Faux
                                    ";
            } elseif (((CoreExtension::getAttribute($this->env, $this->source,             // line 144
$context["question"], "typeQuestion", [], "any", false, false, false, 144) == "qcm_unique") || (CoreExtension::getAttribute($this->env, $this->source, $context["question"], "typeQuestion", [], "any", false, false, false, 144) == "qcm"))) {
                // line 145
                yield "                                        Sélectionnez une seule option
                                    ";
            } else {
                // line 147
                yield "                                        Saisissez votre réponse
                                    ";
            }
            // line 149
            yield "                                </div>
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
        unset($context['_seq'], $context['_key'], $context['question'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 152
        yield "
                        <div style=\"display: flex; justify-content: space-between; align-items: center; margin-top: 30px;\">
                            <a href=\"";
        // line 154
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_test_list");
        yield "\" class=\"btn-ghost\">
                                <i class=\"fas fa-arrow-left\"></i> Retour
                            </a>
                            <button type=\"submit\" class=\"submit-btn\" style=\"width: auto; padding: 15px 40px;\">
                                <i class=\"fas fa-check\"></i> Valider mes réponses
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>

<style>
.question-item {
    transition: all 0.3s ease;
}
.question-item:hover {
    background: rgba(168, 198, 143, 0.05);
    padding-left: 15px;
    margin-left: -15px;
    padding-right: 15px;
    margin-right: -15px;
    border-radius: 8px;
}
input[type=\"radio\"]:checked, input[type=\"checkbox\"]:checked {
    accent-color: var(--green-mid);
}
.form-input-custom {
    background: white;
    border: 1px solid var(--beige-mid);
    border-radius: 8px;
    padding: 12px 16px;
    width: 100%;
}
.form-input-custom:focus {
    border-color: var(--green-sage);
    outline: none;
    box-shadow: 0 0 0 3px rgba(122, 160, 91, 0.1);
}
</style>

<script>
const analyseVisageUrl = '";
        // line 199
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_test_analyse_visage", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["test"]) || array_key_exists("test", $context) ? $context["test"] : (function () { throw new RuntimeError('Variable "test" does not exist.', 199, $this->source); })()), "id", [], "any", false, false, false, 199)]), "html", null, true);
        yield "';
let stream = null;

async function startWebcam() {
    try {
        stream = await navigator.mediaDevices.getUserMedia({ video: true });
        document.getElementById('webcamVideo').srcObject = stream;
        document.getElementById('webcamContainer').style.display = 'block';
        document.getElementById('btnStartCam').style.display = 'none';
        document.getElementById('btnCapture').style.display = 'inline-block';
    } catch(e) {
        document.getElementById('webcamError').style.display = 'block';
        skipWebcam();
    }
}

async function capturePhoto() {
    const video  = document.getElementById('webcamVideo');
    const canvas = document.getElementById('webcamCanvas');
    canvas.width  = video.videoWidth;
    canvas.height = video.videoHeight;
    canvas.getContext('2d').drawImage(video, 0, 0);

    const base64 = canvas.toDataURL('image/jpeg', 0.8);

    // Arrêter la caméra
    if (stream) stream.getTracks().forEach(t => t.stop());
    document.getElementById('webcamContainer').style.display = 'none';
    document.getElementById('btnCapture').style.display = 'none';

    // Envoyer à Face++
    try {
        const response = await fetch(analyseVisageUrl, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ image: base64 })
        });
        const data = await response.json();

        if (data.success) {
            document.getElementById('emotionEmoji').textContent = data.emoji;
            document.getElementById('emotionLabel').textContent = 'Expression détectée : ' + data.label_fr;
            document.getElementById('emotionResult').style.display = 'block';
        }
    } catch(e) {
        console.log('Analyse visage échouée, on continue');
    }

    // Afficher le formulaire après 1.5s
    setTimeout(showForm, 4000);
}

function skipWebcam() {
    if (stream) stream.getTracks().forEach(t => t.stop());
    showForm();
}

function showForm() {
    document.getElementById('webcamSection').style.display = 'none';
    document.getElementById('testFormSection').style.display = 'block';
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

// Validation formulaire
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('testForm');
    if (form) {
        form.addEventListener('submit', function(e) {
            let allValid = true;
            const requiredRadios = form.querySelectorAll('input[type=\"radio\"][required]');
            const radioGroups = new Set();

            requiredRadios.forEach(radio => radioGroups.add(radio.name));

            radioGroups.forEach(groupName => {
                const checked = form.querySelector(`input[name=\"\${groupName}\"]:checked`);
                if (!checked) {
                    allValid = false;
                    const container = form.querySelector(`input[name=\"\${groupName}\"]`).closest('.question-item');
                    if (container) container.style.borderLeft = '3px solid #e74c3c';
                }
            });

            const requiredTexts = form.querySelectorAll('textarea[required]');
            requiredTexts.forEach(field => {
                if (field.value.trim() === '') {
                    allValid = false;
                    field.style.borderColor = '#e74c3c';
                    field.closest('.question-item').style.borderLeft = '3px solid #e74c3c';
                } else {
                    field.style.borderColor = '';
                }
            });

            if (!allValid) {
                e.preventDefault();
                alert('Veuillez répondre à toutes les questions obligatoires.');
            }
        });
    }
});
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
        return "front/tests/show.html.twig";
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
        return array (  474 => 199,  426 => 154,  422 => 152,  406 => 149,  402 => 147,  398 => 145,  396 => 144,  393 => 143,  391 => 142,  388 => 141,  386 => 140,  381 => 137,  377 => 135,  373 => 134,  368 => 133,  363 => 130,  360 => 129,  351 => 126,  348 => 125,  344 => 124,  338 => 123,  335 => 122,  330 => 121,  326 => 119,  323 => 118,  321 => 117,  318 => 116,  316 => 115,  309 => 110,  305 => 109,  301 => 108,  295 => 104,  291 => 103,  287 => 102,  283 => 100,  281 => 99,  277 => 97,  273 => 96,  267 => 93,  264 => 92,  262 => 91,  256 => 88,  246 => 83,  242 => 81,  238 => 79,  236 => 78,  232 => 77,  227 => 74,  210 => 73,  206 => 72,  203 => 71,  160 => 29,  147 => 18,  143 => 17,  137 => 14,  131 => 11,  125 => 7,  112 => 6,  89 => 4,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Passer le test - {{ test.titre }}{% endblock %}
{% block nav_tests_active %}active{% endblock %}

{% block body %}
<section class=\"hero-section\" style=\"min-height: 30vh; padding: 40px 60px;\">
    <div class=\"hero-content\" style=\"text-align: center;\">
        <div class=\"hero-tag\" style=\"justify-content: center;\">Test psychologique</div>
        <h1 class=\"hero-title\" style=\"font-size: clamp(1.8rem, 4vw, 2.5rem);\">
            {{ test.titre }}
        </h1>
        <p class=\"hero-subtitle\" style=\"max-width: 700px; margin: 0 auto;\">
            {{ test.description }}
        </p>
        <div style=\"display: flex; justify-content: center; gap: 30px; margin-top: 20px;\">
            <span><i class=\"fas fa-clock\"></i> Durée: {{ test.duree ? test.duree ~ ' minutes' : 'Non spécifiée' }}</span>
            <span><i class=\"fas fa-question-circle\"></i> {{ questions|length }} questions</span>
        </div>
    </div>
</section>

<section class=\"donations-section\" style=\"padding-top: 0;\">
    <div class=\"container-custom\">
        <div class=\"donate-grid\" style=\"grid-template-columns: 1fr;\">
            <div class=\"donate-form-side\" style=\"padding: 40px;\">

                {# ── WEBCAM ── #}
                <div id=\"webcamSection\" style=\"background:white;border-radius:16px;padding:30px;margin-bottom:32px;text-align:center;box-shadow:0 4px 20px rgba(26,61,43,0.08);border:1px solid #e0f0e8;\">
                    <h3 style=\"font-family:'Playfair Display',serif;color:var(--green-deep);margin-bottom:8px;\">
                        📸 Analyse de votre expression
                    </h3>
                    <p style=\"color:#888;font-size:0.9rem;margin-bottom:20px;\">
                        Pour enrichir votre analyse, nous allons détecter votre émotion avant le test.<br>
                        <strong>Aucune photo n'est sauvegardée.</strong>
                    </p>

                    <div id=\"webcamContainer\" style=\"display:none;margin-bottom:20px;\">
                        <video id=\"webcamVideo\" autoplay playsinline style=\"width:280px;height:210px;border-radius:12px;object-fit:cover;border:3px solid var(--green-sage);\"></video>
                        <canvas id=\"webcamCanvas\" style=\"display:none;\"></canvas>
                    </div>

                    <div id=\"emotionResult\" style=\"display:none;margin-bottom:20px;\">
    <div style=\"background:#d8f3dc;border-radius:12px;padding:24px 32px;display:inline-block;animation:popIn .4s ease;\">
        <span id=\"emotionEmoji\" style=\"font-size:3rem;display:block;margin-bottom:8px;\"></span>
        <p style=\"margin:0;color:var(--green-deep);font-weight:700;font-size:1.1rem;\" id=\"emotionLabel\"></p>
        <p style=\"margin:8px 0 0 0;color:#888;font-size:0.8rem;\">Analyse en cours...</p>
    </div>
</div>

                    <div id=\"webcamError\" style=\"display:none;background:#fdf0ee;color:#c0392b;padding:12px;border-radius:8px;margin-bottom:16px;font-size:0.85rem;\">
                        ⚠️ Caméra non disponible — vous pouvez continuer sans analyse du visage.
                    </div>

                    <div style=\"display:flex;gap:12px;justify-content:center;flex-wrap:wrap;\">
                        <button type=\"button\" id=\"btnStartCam\" onclick=\"startWebcam()\"
                                style=\"background:var(--green-deep);color:white;padding:10px 20px;border-radius:8px;border:none;cursor:pointer;font-weight:600;\">
                            📷 Activer la caméra
                        </button>
                        <button type=\"button\" id=\"btnCapture\" onclick=\"capturePhoto()\" style=\"display:none;background:var(--green-sage);color:white;padding:10px 20px;border-radius:8px;border:none;cursor:pointer;font-weight:600;\">
                            ✅ Prendre la photo
                        </button>
                        <button type=\"button\" id=\"btnSkip\" onclick=\"skipWebcam()\"
                                style=\"background:transparent;border:1.5px solid #ccc;color:#888;padding:10px 20px;border-radius:8px;cursor:pointer;\">
                            Passer cette étape
                        </button>
                    </div>
                </div>

                {# ── FORMULAIRE (caché jusqu'à validation webcam) ── #}
                <div id=\"testFormSection\" style=\"display:none;\">
                    <form method=\"post\" action=\"{{ path('front_test_submit', {'id': test.id}) }}\" id=\"testForm\">
                        {% for question in questions %}
                            <div class=\"question-item\" style=\"margin-bottom: 40px; padding-bottom: 30px; border-bottom: 1px solid var(--beige-mid);\">
                                <div style=\"display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 20px;\">
                                    <h3 style=\"font-family: 'Playfair Display', serif; font-size: 1.2rem; color: var(--text-dark);\">
                                        Question {{ loop.index }}
                                        {% if question.obligatoire %}
                                            <span style=\"color: #e74c3c; font-size: 0.9rem;\">*</span>
                                        {% endif %}
                                    </h3>
                                    <span style=\"background: var(--green-pale); padding: 4px 12px; border-radius: 20px; font-size: 0.8rem;\">
                                        {{ question.points }} point{{ question.points > 1 ? 's' : '' }}
                                    </span>
                                </div>

                                <p style=\"font-size: 1rem; color: var(--text-mid); margin-bottom: 20px; line-height: 1.6;\">
                                    {{ question.texte }}
                                </p>

                                {% if question.typeQuestion == 'texte_libre' %}
                                    <textarea
                                        name=\"reponse_{{ question.id }}\"
                                        class=\"form-input-custom\"
                                        rows=\"4\"
                                        {% if question.obligatoire %}required{% endif %}
                                        placeholder=\"Saisissez votre réponse ici...\"></textarea>

                                {% elseif question.typeQuestion == 'vrai_faux' %}
                                    <div style=\"display: flex; gap: 30px; flex-wrap: wrap;\">
                                        <label style=\"display: flex; align-items: center; gap: 10px; cursor: pointer;\">
                                            <input type=\"radio\" name=\"reponse_{{ question.id }}\" value=\"Vrai\"
                                                {% if question.obligatoire %}required{% endif %}
                                                style=\"width: 18px; height: 18px;\">
                                            <span style=\"font-size: 1rem;\">✅ Vrai</span>
                                        </label>
                                        <label style=\"display: flex; align-items: center; gap: 10px; cursor: pointer;\">
                                            <input type=\"radio\" name=\"reponse_{{ question.id }}\" value=\"Faux\"
                                                {% if question.obligatoire %}required{% endif %}
                                                style=\"width: 18px; height: 18px;\">
                                            <span style=\"font-size: 1rem;\">❌ Faux</span>
                                        </label>
                                    </div>

                                {% elseif question.typeQuestion == 'qcm_unique' or question.typeQuestion == 'qcm' %}
                                    <div style=\"display: flex; flex-direction: column; gap: 12px;\">
                                        {% set options = question.reponsesPossiblesArray %}
                                        {% if options is empty %}
                                            <p style=\"color: orange; font-style: italic;\">Aucune option disponible pour cette question.</p>
                                        {% else %}
                                            {% for option in options %}
                                                <label style=\"display: flex; align-items: center; gap: 12px; cursor: pointer;\">
                                                    <input type=\"radio\" name=\"reponse_{{ question.id }}\" value=\"{{ option }}\"
                                                        {% if question.obligatoire %}required{% endif %}
                                                        style=\"width: 18px; height: 18px;\">
                                                    <span>{{ option }}</span>
                                                </label>
                                            {% endfor %}
                                        {% endif %}
                                    </div>

                                {% else %}
                                    <input type=\"text\" name=\"reponse_{{ question.id }}\" class=\"form-input-custom\"
                                        {% if question.obligatoire %}required{% endif %}
                                        placeholder=\"Saisissez votre réponse\">
                                {% endif %}

                                <div class=\"help-message\" style=\"margin-top: 10px; font-size: 0.75rem; color: var(--green-sage);\">
                                    <i class=\"fas fa-info-circle\"></i>
                                    {% if question.typeQuestion == 'texte_libre' %}
                                        Saisissez votre réponse en texte libre
                                    {% elseif question.typeQuestion == 'vrai_faux' %}
                                        Sélectionnez Vrai ou Faux
                                    {% elseif question.typeQuestion == 'qcm_unique' or question.typeQuestion == 'qcm' %}
                                        Sélectionnez une seule option
                                    {% else %}
                                        Saisissez votre réponse
                                    {% endif %}
                                </div>
                            </div>
                        {% endfor %}

                        <div style=\"display: flex; justify-content: space-between; align-items: center; margin-top: 30px;\">
                            <a href=\"{{ path('front_test_list') }}\" class=\"btn-ghost\">
                                <i class=\"fas fa-arrow-left\"></i> Retour
                            </a>
                            <button type=\"submit\" class=\"submit-btn\" style=\"width: auto; padding: 15px 40px;\">
                                <i class=\"fas fa-check\"></i> Valider mes réponses
                            </button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</section>

<style>
.question-item {
    transition: all 0.3s ease;
}
.question-item:hover {
    background: rgba(168, 198, 143, 0.05);
    padding-left: 15px;
    margin-left: -15px;
    padding-right: 15px;
    margin-right: -15px;
    border-radius: 8px;
}
input[type=\"radio\"]:checked, input[type=\"checkbox\"]:checked {
    accent-color: var(--green-mid);
}
.form-input-custom {
    background: white;
    border: 1px solid var(--beige-mid);
    border-radius: 8px;
    padding: 12px 16px;
    width: 100%;
}
.form-input-custom:focus {
    border-color: var(--green-sage);
    outline: none;
    box-shadow: 0 0 0 3px rgba(122, 160, 91, 0.1);
}
</style>

<script>
const analyseVisageUrl = '{{ path(\"front_test_analyse_visage\", {\"id\": test.id}) }}';
let stream = null;

async function startWebcam() {
    try {
        stream = await navigator.mediaDevices.getUserMedia({ video: true });
        document.getElementById('webcamVideo').srcObject = stream;
        document.getElementById('webcamContainer').style.display = 'block';
        document.getElementById('btnStartCam').style.display = 'none';
        document.getElementById('btnCapture').style.display = 'inline-block';
    } catch(e) {
        document.getElementById('webcamError').style.display = 'block';
        skipWebcam();
    }
}

async function capturePhoto() {
    const video  = document.getElementById('webcamVideo');
    const canvas = document.getElementById('webcamCanvas');
    canvas.width  = video.videoWidth;
    canvas.height = video.videoHeight;
    canvas.getContext('2d').drawImage(video, 0, 0);

    const base64 = canvas.toDataURL('image/jpeg', 0.8);

    // Arrêter la caméra
    if (stream) stream.getTracks().forEach(t => t.stop());
    document.getElementById('webcamContainer').style.display = 'none';
    document.getElementById('btnCapture').style.display = 'none';

    // Envoyer à Face++
    try {
        const response = await fetch(analyseVisageUrl, {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({ image: base64 })
        });
        const data = await response.json();

        if (data.success) {
            document.getElementById('emotionEmoji').textContent = data.emoji;
            document.getElementById('emotionLabel').textContent = 'Expression détectée : ' + data.label_fr;
            document.getElementById('emotionResult').style.display = 'block';
        }
    } catch(e) {
        console.log('Analyse visage échouée, on continue');
    }

    // Afficher le formulaire après 1.5s
    setTimeout(showForm, 4000);
}

function skipWebcam() {
    if (stream) stream.getTracks().forEach(t => t.stop());
    showForm();
}

function showForm() {
    document.getElementById('webcamSection').style.display = 'none';
    document.getElementById('testFormSection').style.display = 'block';
    window.scrollTo({ top: 0, behavior: 'smooth' });
}

// Validation formulaire
document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('testForm');
    if (form) {
        form.addEventListener('submit', function(e) {
            let allValid = true;
            const requiredRadios = form.querySelectorAll('input[type=\"radio\"][required]');
            const radioGroups = new Set();

            requiredRadios.forEach(radio => radioGroups.add(radio.name));

            radioGroups.forEach(groupName => {
                const checked = form.querySelector(`input[name=\"\${groupName}\"]:checked`);
                if (!checked) {
                    allValid = false;
                    const container = form.querySelector(`input[name=\"\${groupName}\"]`).closest('.question-item');
                    if (container) container.style.borderLeft = '3px solid #e74c3c';
                }
            });

            const requiredTexts = form.querySelectorAll('textarea[required]');
            requiredTexts.forEach(field => {
                if (field.value.trim() === '') {
                    allValid = false;
                    field.style.borderColor = '#e74c3c';
                    field.closest('.question-item').style.borderLeft = '3px solid #e74c3c';
                } else {
                    field.style.borderColor = '';
                }
            });

            if (!allValid) {
                e.preventDefault();
                alert('Veuillez répondre à toutes les questions obligatoires.');
            }
        });
    }
});
</script>
{% endblock %}", "front/tests/show.html.twig", "C:\\Users\\sirine\\psy\\templates\\front\\tests\\show.html.twig");
    }
}
