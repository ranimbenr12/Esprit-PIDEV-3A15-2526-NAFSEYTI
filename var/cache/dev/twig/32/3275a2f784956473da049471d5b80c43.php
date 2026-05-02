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

/* front/tests/list.html.twig */
class __TwigTemplate_df2b1ceab5b1e7772cc282722dd8e379 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front/tests/list.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "front/tests/list.html.twig"));

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

        yield "Tests psychologiques - NAFSEYTI";
        
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
        yield "<section class=\"hero-section\" style=\"min-height: 40vh; padding: 60px 60px;\">
    <div class=\"hero-content\" style=\"text-align: center;\">
        <div class=\"hero-tag\" style=\"justify-content: center;\">Évaluez votre bien-être</div>
        <h1 class=\"hero-title\" style=\"font-size: clamp(2rem, 5vw, 3.5rem);\">
            Tests <em>psychologiques</em>
        </h1>
        <p class=\"hero-subtitle\" style=\"max-width: 700px; margin: 0 auto;\">
            Découvrez nos tests conçus par des professionnels pour mieux comprendre votre état psychologique
            et obtenir des conseils personnalisés.
        </p>
    </div>
</section>

<section class=\"services-section\" style=\"padding-top: 0;\">
    <div class=\"container-custom\">
        <div style=\"display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 2px; background: var(--beige-mid);\">
            
            ";
        // line 23
        $context["img"] = ["img1.jpg", "img2.jpg", "img3.jpg"];
        // line 24
        yield "            
            ";
        // line 25
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["tests"]) || array_key_exists("tests", $context) ? $context["tests"] : (function () { throw new RuntimeError('Variable "tests" does not exist.', 25, $this->source); })()));
        $context['_iterated'] = false;
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
        foreach ($context['_seq'] as $context["_key"] => $context["test"]) {
            // line 26
            yield "                <div class=\"service-card\" style=\"display: flex; flex-direction: column; padding: 0; overflow: hidden;\">
                    
                    ";
            // line 29
            yield "                    <div style=\"height: 220px; overflow: hidden; position: relative;\">
                        <img src=\"";
            // line 30
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(("img/" . CoreExtension::getAttribute($this->env, $this->source, (isset($context["img"]) || array_key_exists("img", $context) ? $context["img"] : (function () { throw new RuntimeError('Variable "img" does not exist.', 30, $this->source); })()), (CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index0", [], "any", false, false, false, 30) % 3), [], "array", false, false, false, 30))), "html", null, true);
            yield "\" 
                             alt=\"";
            // line 31
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["test"], "titre", [], "any", false, false, false, 31), "html", null, true);
            yield "\"
                             style=\"width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s ease; display: block;\">
                        ";
            // line 34
            yield "                        <div style=\"position: absolute; inset: 0; background: linear-gradient(to bottom, transparent 40%, rgba(26,61,43,0.7) 100%);\"></div>
                        ";
            // line 36
            yield "                        <div style=\"position: absolute; top: 16px; left: 16px; background: var(--beige-cream); color: var(--green-deep); font-size: 0.65rem; letter-spacing: 2px; text-transform: uppercase; padding: 5px 14px; border-radius: 100px; font-weight: 600;\">
                            Psychologie
                        </div>
                    </div>

                    ";
            // line 42
            yield "                    <div style=\"padding: 28px; display: flex; flex-direction: column; flex: 1; background: var(--beige-white);\">
                        <div class=\"service-icon\" style=\"margin-bottom: 16px;\">
                            <i class=\"fas fa-brain\"></i>
                        </div>
                        <h3 class=\"service-name\">";
            // line 46
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["test"], "titre", [], "any", false, false, false, 46), "html", null, true);
            yield "</h3>
                        <p class=\"service-desc\">";
            // line 47
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["test"], "description", [], "any", false, false, false, 47), 0, 120), "html", null, true);
            yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["test"], "description", [], "any", false, false, false, 47)) > 120)) ? ("...") : (""));
            yield "</p>
                        
                        <div style=\"margin-top: auto;\">
                            ";
            // line 51
            yield "                            <div style=\"display: flex; justify-content: space-between; margin-bottom: 20px; padding: 12px 0; border-top: 1px solid var(--beige-mid); font-size: 0.8rem; color: var(--green-mid);\">
                                <span><i class=\"fas fa-clock\" style=\"margin-right: 6px;\"></i>";
            // line 52
            yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["test"], "duree", [], "any", false, false, false, 52)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((CoreExtension::getAttribute($this->env, $this->source, $context["test"], "duree", [], "any", false, false, false, 52) . " min"), "html", null, true)) : ("10 min"));
            yield "</span>
                                <span><i class=\"fas fa-question-circle\" style=\"margin-right: 6px;\"></i>";
            // line 53
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["test"], "questions", [], "any", false, false, false, 53)), "html", null, true);
            yield " questions</span>
                            </div>
                            <a href=\"";
            // line 55
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("front_test_show", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["test"], "id", [], "any", false, false, false, 55)]), "html", null, true);
            yield "\" 
                               class=\"donate-btn\" 
                               style=\"width: 100%; text-align: center; display: block; background: var(--green-deep);\">
                                Commencer le test →
                            </a>
                        </div>
                    </div>
                </div>
            ";
            $context['_iterated'] = true;
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        // line 63
        if (!$context['_iterated']) {
            // line 64
            yield "                <div class=\"service-card\" style=\"text-align: center; grid-column: 1/-1;\">
                    <div class=\"service-icon\"><i class=\"fas fa-brain\"></i></div>
                    <p>Aucun test disponible pour le moment.</p>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['test'], $context['_parent'], $context['_iterated'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 69
        yield "        </div>
    </div>
</section>

<style>
    .service-card:hover img {
        transform: scale(1.05);
    }
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
        return "front/tests/list.html.twig";
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
        return array (  230 => 69,  220 => 64,  218 => 63,  197 => 55,  192 => 53,  188 => 52,  185 => 51,  178 => 47,  174 => 46,  168 => 42,  161 => 36,  158 => 34,  153 => 31,  149 => 30,  146 => 29,  142 => 26,  124 => 25,  121 => 24,  119 => 23,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Tests psychologiques - NAFSEYTI{% endblock %}

{% block body %}
<section class=\"hero-section\" style=\"min-height: 40vh; padding: 60px 60px;\">
    <div class=\"hero-content\" style=\"text-align: center;\">
        <div class=\"hero-tag\" style=\"justify-content: center;\">Évaluez votre bien-être</div>
        <h1 class=\"hero-title\" style=\"font-size: clamp(2rem, 5vw, 3.5rem);\">
            Tests <em>psychologiques</em>
        </h1>
        <p class=\"hero-subtitle\" style=\"max-width: 700px; margin: 0 auto;\">
            Découvrez nos tests conçus par des professionnels pour mieux comprendre votre état psychologique
            et obtenir des conseils personnalisés.
        </p>
    </div>
</section>

<section class=\"services-section\" style=\"padding-top: 0;\">
    <div class=\"container-custom\">
        <div style=\"display: grid; grid-template-columns: repeat(auto-fill, minmax(350px, 1fr)); gap: 2px; background: var(--beige-mid);\">
            
            {% set img = ['img1.jpg', 'img2.jpg', 'img3.jpg'] %}
            
            {% for test in tests %}
                <div class=\"service-card\" style=\"display: flex; flex-direction: column; padding: 0; overflow: hidden;\">
                    
                    {# IMAGE EN HAUT #}
                    <div style=\"height: 220px; overflow: hidden; position: relative;\">
                        <img src=\"{{ asset('img/' ~ img[loop.index0 % 3]) }}\" 
                             alt=\"{{ test.titre }}\"
                             style=\"width: 100%; height: 100%; object-fit: cover; transition: transform 0.6s ease; display: block;\">
                        {# OVERLAY VERT AU HOVER #}
                        <div style=\"position: absolute; inset: 0; background: linear-gradient(to bottom, transparent 40%, rgba(26,61,43,0.7) 100%);\"></div>
                        {# BADGE CATEGORIE #}
                        <div style=\"position: absolute; top: 16px; left: 16px; background: var(--beige-cream); color: var(--green-deep); font-size: 0.65rem; letter-spacing: 2px; text-transform: uppercase; padding: 5px 14px; border-radius: 100px; font-weight: 600;\">
                            Psychologie
                        </div>
                    </div>

                    {# CONTENU #}
                    <div style=\"padding: 28px; display: flex; flex-direction: column; flex: 1; background: var(--beige-white);\">
                        <div class=\"service-icon\" style=\"margin-bottom: 16px;\">
                            <i class=\"fas fa-brain\"></i>
                        </div>
                        <h3 class=\"service-name\">{{ test.titre }}</h3>
                        <p class=\"service-desc\">{{ test.description|slice(0, 120) }}{{ test.description|length > 120 ? '...' : '' }}</p>
                        
                        <div style=\"margin-top: auto;\">
                            {# STATS #}
                            <div style=\"display: flex; justify-content: space-between; margin-bottom: 20px; padding: 12px 0; border-top: 1px solid var(--beige-mid); font-size: 0.8rem; color: var(--green-mid);\">
                                <span><i class=\"fas fa-clock\" style=\"margin-right: 6px;\"></i>{{ test.duree ? test.duree ~ ' min' : '10 min' }}</span>
                                <span><i class=\"fas fa-question-circle\" style=\"margin-right: 6px;\"></i>{{ test.questions|length }} questions</span>
                            </div>
                            <a href=\"{{ path('front_test_show', {'id': test.id}) }}\" 
                               class=\"donate-btn\" 
                               style=\"width: 100%; text-align: center; display: block; background: var(--green-deep);\">
                                Commencer le test →
                            </a>
                        </div>
                    </div>
                </div>
            {% else %}
                <div class=\"service-card\" style=\"text-align: center; grid-column: 1/-1;\">
                    <div class=\"service-icon\"><i class=\"fas fa-brain\"></i></div>
                    <p>Aucun test disponible pour le moment.</p>
                </div>
            {% endfor %}
        </div>
    </div>
</section>

<style>
    .service-card:hover img {
        transform: scale(1.05);
    }
</style>

{% endblock %}", "front/tests/list.html.twig", "C:\\Users\\DELL\\Downloads\\psy\\templates\\front\\tests\\list.html.twig");
    }
}
