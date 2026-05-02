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

/* home/profile.html.twig */
class __TwigTemplate_c42cee3ee45bacebaf8361ec5d14b687 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/profile.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/profile.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 2
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

        yield "Mon Profil — Nafseyti";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 4
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

        // line 5
        yield "<section style=\"min-height:100vh; background:#f5f0e8; padding:60px 20px;\">
    <div style=\"max-width:700px; margin:0 auto;\">

        ";
        // line 8
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 8, $this->source); })()), "flashes", ["success"], "method", false, false, false, 8));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 9
            yield "            <div style=\"background:#dcfce7; color:#166534; padding:12px 16px; border-radius:8px; margin-bottom:20px;\">✅ ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        yield "        ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 11, $this->source); })()), "flashes", ["error"], "method", false, false, false, 11));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 12
            yield "            <div style=\"background:#fee2e2; color:#991b1b; padding:12px 16px; border-radius:8px; margin-bottom:20px;\">⚠️ ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 14
        yield "
        <div style=\"background:white; border-radius:16px; box-shadow:0 20px 60px rgba(45,80,22,0.12); overflow:hidden;\">

            <!-- Header -->
            <div style=\"background:linear-gradient(135deg, #2d5016, #4a7c3f); padding:40px; text-align:center;\">
                ";
        // line 19
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 19, $this->source); })()), "profile_photo", [], "any", false, false, false, 19)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 20
            yield "                    <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 20, $this->source); })()), "profile_photo", [], "any", false, false, false, 20)), "html", null, true);
            yield "\" 
                         style=\"width:100px; height:100px; border-radius:50%; object-fit:cover; border:4px solid rgba(255,255,255,0.4); margin-bottom:16px;\">
                ";
        } else {
            // line 23
            yield "                    <div style=\"width:100px; height:100px; background:rgba(255,255,255,0.2); border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 16px;\">
                        <i class=\"fas fa-user\" style=\"font-size:3rem; color:white;\"></i>
                    </div>
                ";
        }
        // line 27
        yield "                <h2 style=\"font-family:'Playfair Display',serif; color:white; font-size:1.8rem; margin-bottom:6px;\">
                    ";
        // line 28
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 28, $this->source); })()), "firstname", [], "any", false, false, false, 28), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 28, $this->source); })()), "lastname", [], "any", false, false, false, 28), "html", null, true);
        yield "
                </h2>
                <span style=\"background:rgba(255,255,255,0.2); color:white; padding:4px 16px; border-radius:100px; font-size:0.8rem; text-transform:uppercase; letter-spacing:2px;\">
                    ";
        // line 31
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 31, $this->source); })()), "role", [], "any", false, false, false, 31), "html", null, true);
        yield "
                </span>
            </div>

            <!-- Info -->
            <div style=\"padding:40px;\">
                <div style=\"display:grid; grid-template-columns:1fr 1fr; gap:24px; margin-bottom:36px;\">
                    <div>
                        <div style=\"font-size:0.7rem; text-transform:uppercase; letter-spacing:2px; color:#6B7D5A; margin-bottom:6px;\">Email</div>
                        <div style=\"font-size:1rem; color:#2d3a1e; font-weight:500;\">";
        // line 40
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 40, $this->source); })()), "email", [], "any", false, false, false, 40), "html", null, true);
        yield "</div>
                    </div>
                    <div>
                        <div style=\"font-size:0.7rem; text-transform:uppercase; letter-spacing:2px; color:#6B7D5A; margin-bottom:6px;\">Téléphone</div>
                        <div style=\"font-size:1rem; color:#2d3a1e; font-weight:500;\">";
        // line 44
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "phone_number", [], "any", true, true, false, 44) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 44, $this->source); })()), "phone_number", [], "any", false, false, false, 44)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 44, $this->source); })()), "phone_number", [], "any", false, false, false, 44), "html", null, true)) : ("—"));
        yield "</div>
                    </div>
                    <div>
                        <div style=\"font-size:0.7rem; text-transform:uppercase; letter-spacing:2px; color:#6B7D5A; margin-bottom:6px;\">Adresse</div>
                        <div style=\"font-size:1rem; color:#2d3a1e; font-weight:500;\">";
        // line 48
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "address", [], "any", true, true, false, 48) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 48, $this->source); })()), "address", [], "any", false, false, false, 48)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 48, $this->source); })()), "address", [], "any", false, false, false, 48), "html", null, true)) : ("—"));
        yield "</div>
                    </div>
                    <div>
                        <div style=\"font-size:0.7rem; text-transform:uppercase; letter-spacing:2px; color:#6B7D5A; margin-bottom:6px;\">Localisation</div>
                        <div style=\"font-size:1rem; color:#2d3a1e; font-weight:500;\">";
        // line 52
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "location", [], "any", true, true, false, 52) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 52, $this->source); })()), "location", [], "any", false, false, false, 52)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 52, $this->source); })()), "location", [], "any", false, false, false, 52), "html", null, true)) : ("—"));
        yield "</div>
                    </div>
                    <div>
                        <div style=\"font-size:0.7rem; text-transform:uppercase; letter-spacing:2px; color:#6B7D5A; margin-bottom:6px;\">Statut</div>
                        <div style=\"font-size:1rem; color:#2d3a1e; font-weight:500;\">";
        // line 56
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 56, $this->source); })()), "status", [], "any", false, false, false, 56), "html", null, true);
        yield "</div>
                    </div>
                    <div>
                        <div style=\"font-size:0.7rem; text-transform:uppercase; letter-spacing:2px; color:#6B7D5A; margin-bottom:6px;\">Membre depuis</div>
                        <div style=\"font-size:1rem; color:#2d3a1e; font-weight:500;\">";
        // line 60
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 60, $this->source); })()), "created_at", [], "any", false, false, false, 60), "d/m/Y"), "html", null, true);
        yield "</div>
                    </div>
                </div>

                <!-- Buttons -->
                <div style=\"display:flex; gap:16px; margin-bottom:16px;\">
                    <a href=\"";
        // line 66
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile_edit");
        yield "\"
                       style=\"flex:1; text-align:center; padding:14px; background:#4a7c3f; color:white; border-radius:8px; text-decoration:none; font-weight:600; font-size:0.95rem;\">
                        ✏️ Modifier le profil
                    </a>
                </div>

                <!-- Delete account -->
                <div style=\"border-top:1px solid #f0ebe0; padding-top:24px; margin-top:8px;\">
                    <h4 style=\"color:#991b1b; font-size:0.9rem; margin-bottom:8px;\">Zone de danger</h4>
                    <p style=\"color:#6B7D5A; font-size:0.85rem; margin-bottom:16px;\">La désactivation de votre compte est irréversible. Vous serez déconnecté immédiatement.</p>
                    <button onclick=\"document.getElementById('deleteModal').style.display='flex'\"
                            style=\"padding:12px 24px; background:#fee2e2; color:#991b1b; border:1px solid #fca5a5; border-radius:8px; font-weight:600; cursor:pointer; font-size:0.9rem;\">
                        🗑️ Désactiver mon compte
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Delete Confirmation Modal -->
<div id=\"deleteModal\" style=\"display:none; position:fixed; inset:0; background:rgba(0,0,0,0.5); z-index:99999; align-items:center; justify-content:center;\">
    <div style=\"background:white; border-radius:16px; padding:40px; max-width:420px; width:90%; text-align:center;\">
        <div style=\"font-size:3rem; margin-bottom:16px;\">⚠️</div>
        <h3 style=\"font-family:'Playfair Display',serif; color:#2d3a1e; margin-bottom:12px;\">Confirmer la désactivation</h3>
        <p style=\"color:#6B7D5A; margin-bottom:28px; font-size:0.95rem;\">Êtes-vous sûr de vouloir désactiver votre compte ? Vous serez déconnecté immédiatement.</p>
        <div style=\"display:flex; gap:12px;\">
            <button onclick=\"document.getElementById('deleteModal').style.display='none'\"
                    style=\"flex:1; padding:12px; background:#f5f0e8; color:#2d3a1e; border:none; border-radius:8px; font-weight:600; cursor:pointer;\">
                Annuler
            </button>
            <a href=\"";
        // line 97
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile_delete");
        yield "\"
               style=\"flex:1; text-align:center; padding:12px; background:#991b1b; color:white; border-radius:8px; text-decoration:none; font-weight:600;\">
                Confirmer
            </a>
        </div>
    </div>
</div>
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
        return "home/profile.html.twig";
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
        return array (  255 => 97,  221 => 66,  212 => 60,  205 => 56,  198 => 52,  191 => 48,  184 => 44,  177 => 40,  165 => 31,  157 => 28,  154 => 27,  148 => 23,  141 => 20,  139 => 19,  132 => 14,  123 => 12,  118 => 11,  109 => 9,  105 => 8,  100 => 5,  87 => 4,  64 => 2,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}
{% block title %}Mon Profil — Nafseyti{% endblock %}

{% block body %}
<section style=\"min-height:100vh; background:#f5f0e8; padding:60px 20px;\">
    <div style=\"max-width:700px; margin:0 auto;\">

        {% for message in app.flashes('success') %}
            <div style=\"background:#dcfce7; color:#166534; padding:12px 16px; border-radius:8px; margin-bottom:20px;\">✅ {{ message }}</div>
        {% endfor %}
        {% for message in app.flashes('error') %}
            <div style=\"background:#fee2e2; color:#991b1b; padding:12px 16px; border-radius:8px; margin-bottom:20px;\">⚠️ {{ message }}</div>
        {% endfor %}

        <div style=\"background:white; border-radius:16px; box-shadow:0 20px 60px rgba(45,80,22,0.12); overflow:hidden;\">

            <!-- Header -->
            <div style=\"background:linear-gradient(135deg, #2d5016, #4a7c3f); padding:40px; text-align:center;\">
                {% if user.profile_photo %}
                    <img src=\"{{ asset(user.profile_photo) }}\" 
                         style=\"width:100px; height:100px; border-radius:50%; object-fit:cover; border:4px solid rgba(255,255,255,0.4); margin-bottom:16px;\">
                {% else %}
                    <div style=\"width:100px; height:100px; background:rgba(255,255,255,0.2); border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 16px;\">
                        <i class=\"fas fa-user\" style=\"font-size:3rem; color:white;\"></i>
                    </div>
                {% endif %}
                <h2 style=\"font-family:'Playfair Display',serif; color:white; font-size:1.8rem; margin-bottom:6px;\">
                    {{ user.firstname }} {{ user.lastname }}
                </h2>
                <span style=\"background:rgba(255,255,255,0.2); color:white; padding:4px 16px; border-radius:100px; font-size:0.8rem; text-transform:uppercase; letter-spacing:2px;\">
                    {{ user.role }}
                </span>
            </div>

            <!-- Info -->
            <div style=\"padding:40px;\">
                <div style=\"display:grid; grid-template-columns:1fr 1fr; gap:24px; margin-bottom:36px;\">
                    <div>
                        <div style=\"font-size:0.7rem; text-transform:uppercase; letter-spacing:2px; color:#6B7D5A; margin-bottom:6px;\">Email</div>
                        <div style=\"font-size:1rem; color:#2d3a1e; font-weight:500;\">{{ user.email }}</div>
                    </div>
                    <div>
                        <div style=\"font-size:0.7rem; text-transform:uppercase; letter-spacing:2px; color:#6B7D5A; margin-bottom:6px;\">Téléphone</div>
                        <div style=\"font-size:1rem; color:#2d3a1e; font-weight:500;\">{{ user.phone_number ?? '—' }}</div>
                    </div>
                    <div>
                        <div style=\"font-size:0.7rem; text-transform:uppercase; letter-spacing:2px; color:#6B7D5A; margin-bottom:6px;\">Adresse</div>
                        <div style=\"font-size:1rem; color:#2d3a1e; font-weight:500;\">{{ user.address ?? '—' }}</div>
                    </div>
                    <div>
                        <div style=\"font-size:0.7rem; text-transform:uppercase; letter-spacing:2px; color:#6B7D5A; margin-bottom:6px;\">Localisation</div>
                        <div style=\"font-size:1rem; color:#2d3a1e; font-weight:500;\">{{ user.location ?? '—' }}</div>
                    </div>
                    <div>
                        <div style=\"font-size:0.7rem; text-transform:uppercase; letter-spacing:2px; color:#6B7D5A; margin-bottom:6px;\">Statut</div>
                        <div style=\"font-size:1rem; color:#2d3a1e; font-weight:500;\">{{ user.status }}</div>
                    </div>
                    <div>
                        <div style=\"font-size:0.7rem; text-transform:uppercase; letter-spacing:2px; color:#6B7D5A; margin-bottom:6px;\">Membre depuis</div>
                        <div style=\"font-size:1rem; color:#2d3a1e; font-weight:500;\">{{ user.created_at|date('d/m/Y') }}</div>
                    </div>
                </div>

                <!-- Buttons -->
                <div style=\"display:flex; gap:16px; margin-bottom:16px;\">
                    <a href=\"{{ path('app_profile_edit') }}\"
                       style=\"flex:1; text-align:center; padding:14px; background:#4a7c3f; color:white; border-radius:8px; text-decoration:none; font-weight:600; font-size:0.95rem;\">
                        ✏️ Modifier le profil
                    </a>
                </div>

                <!-- Delete account -->
                <div style=\"border-top:1px solid #f0ebe0; padding-top:24px; margin-top:8px;\">
                    <h4 style=\"color:#991b1b; font-size:0.9rem; margin-bottom:8px;\">Zone de danger</h4>
                    <p style=\"color:#6B7D5A; font-size:0.85rem; margin-bottom:16px;\">La désactivation de votre compte est irréversible. Vous serez déconnecté immédiatement.</p>
                    <button onclick=\"document.getElementById('deleteModal').style.display='flex'\"
                            style=\"padding:12px 24px; background:#fee2e2; color:#991b1b; border:1px solid #fca5a5; border-radius:8px; font-weight:600; cursor:pointer; font-size:0.9rem;\">
                        🗑️ Désactiver mon compte
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Delete Confirmation Modal -->
<div id=\"deleteModal\" style=\"display:none; position:fixed; inset:0; background:rgba(0,0,0,0.5); z-index:99999; align-items:center; justify-content:center;\">
    <div style=\"background:white; border-radius:16px; padding:40px; max-width:420px; width:90%; text-align:center;\">
        <div style=\"font-size:3rem; margin-bottom:16px;\">⚠️</div>
        <h3 style=\"font-family:'Playfair Display',serif; color:#2d3a1e; margin-bottom:12px;\">Confirmer la désactivation</h3>
        <p style=\"color:#6B7D5A; margin-bottom:28px; font-size:0.95rem;\">Êtes-vous sûr de vouloir désactiver votre compte ? Vous serez déconnecté immédiatement.</p>
        <div style=\"display:flex; gap:12px;\">
            <button onclick=\"document.getElementById('deleteModal').style.display='none'\"
                    style=\"flex:1; padding:12px; background:#f5f0e8; color:#2d3a1e; border:none; border-radius:8px; font-weight:600; cursor:pointer;\">
                Annuler
            </button>
            <a href=\"{{ path('app_profile_delete') }}\"
               style=\"flex:1; text-align:center; padding:12px; background:#991b1b; color:white; border-radius:8px; text-decoration:none; font-weight:600;\">
                Confirmer
            </a>
        </div>
    </div>
</div>
{% endblock %}", "home/profile.html.twig", "C:\\Users\\sirine\\psy\\templates\\home\\profile.html.twig");
    }
}
