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

/* security/login.html.twig */
class __TwigTemplate_b6b2baf5826cda3adda8781be1ee95db extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/login.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/login.html.twig"));

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

        yield "Se connecter — Nafseyti";
        
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
        yield "<section style=\"min-height:100vh; background:#f5f0e8; display:flex; align-items:center; justify-content:center;\">
    <div style=\"background:white; border-radius:16px; box-shadow:0 20px 60px rgba(45,80,22,0.12); padding:48px; width:100%; max-width:440px;\">
        
        <!-- Logo -->
        <div style=\"text-align:center; margin-bottom:32px;\">
            <h2 style=\"font-family:'Playfair Display',serif; color:#2d3a1e; margin-top:16px; font-size:2rem;\">Nafseyti</h2>
            <p style=\"color:#6B7D5A; font-size:0.95rem;\">Connectez-vous à votre espace</p>
        </div>

        ";
        // line 15
        if ((($tmp = (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 15, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 16
            yield "            <div style=\"background:#fee2e2; color:#991b1b; padding:12px 16px; border-radius:8px; margin-bottom:20px; font-size:0.9rem;\">
                ⚠️ ";
            // line 17
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\TranslationExtension']->trans(CoreExtension::getAttribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 17, $this->source); })()), "messageKey", [], "any", false, false, false, 17), CoreExtension::getAttribute($this->env, $this->source, (isset($context["error"]) || array_key_exists("error", $context) ? $context["error"] : (function () { throw new RuntimeError('Variable "error" does not exist.', 17, $this->source); })()), "messageData", [], "any", false, false, false, 17), "security"), "html", null, true);
            yield "
            </div>
        ";
        }
        // line 20
        yield "
        <form method=\"post\" action=\"";
        // line 21
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
        yield "\">

            <div style=\"margin-bottom:20px;\">
                <label style=\"display:block; font-weight:600; color:#2d3a1e; margin-bottom:8px;\">
                    Email
                </label>
                <input type=\"email\" name=\"email\" value=\"";
        // line 27
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["last_username"]) || array_key_exists("last_username", $context) ? $context["last_username"] : (function () { throw new RuntimeError('Variable "last_username" does not exist.', 27, $this->source); })()), "html", null, true);
        yield "\" required
                       style=\"width:100%; padding:12px 16px; border:1.5px solid #d4c9a8; border-radius:8px; font-size:1rem; outline:none; box-sizing:border-box;\"
                       placeholder=\"votre@email.com\">
            </div>

            <div style=\"margin-bottom:28px;\">
                <label style=\"display:block; font-weight:600; color:#2d3a1e; margin-bottom:8px;\">
                    Mot de passe
                </label>
                <div style=\"position:relative;\">
                    <input type=\"password\" name=\"password\" id=\"password\" required
                           style=\"width:100%; padding:12px 16px; padding-right:48px; border:1.5px solid #d4c9a8; border-radius:8px; font-size:1rem; outline:none; box-sizing:border-box;\"
                           placeholder=\"••••••••\">
                    <span id=\"togglePassword\"
                          style=\"position:absolute; right:14px; top:50%; transform:translateY(-50%); cursor:pointer; color:#6B7D5A; font-size:1rem;\">
                        <i class=\"fas fa-eye\" id=\"eyeIcon\"></i>
                    </span>
                </div>
            </div>

            <input type=\"hidden\" name=\"_csrf_token\" value=\"";
        // line 47
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken("authenticate"), "html", null, true);
        yield "\">

            <button type=\"submit\"
                    style=\"width:100%; padding:14px; background:#4a7c3f; color:white; border:none; border-radius:8px; font-size:1rem; font-weight:600; cursor:pointer; letter-spacing:0.5px;\">
                Se connecter
            </button>
        </form>

        <p style=\"text-align:center; margin-top:24px; color:#6B7D5A; font-size:0.9rem;\">
            Pas encore de compte ? 
            <a href=\"";
        // line 57
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
        yield "\" style=\"color:#4a7c3f; font-weight:600;\">S'inscrire</a>
        </p>
    </div>
</section>

<script>
    document.getElementById('togglePassword').addEventListener('click', function() {
        const password = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');
        
        if (password.type === 'password') {
            password.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            password.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
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
        return "security/login.html.twig";
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
        return array (  170 => 57,  157 => 47,  134 => 27,  125 => 21,  122 => 20,  116 => 17,  113 => 16,  111 => 15,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Se connecter — Nafseyti{% endblock %}

{% block body %}
<section style=\"min-height:100vh; background:#f5f0e8; display:flex; align-items:center; justify-content:center;\">
    <div style=\"background:white; border-radius:16px; box-shadow:0 20px 60px rgba(45,80,22,0.12); padding:48px; width:100%; max-width:440px;\">
        
        <!-- Logo -->
        <div style=\"text-align:center; margin-bottom:32px;\">
            <h2 style=\"font-family:'Playfair Display',serif; color:#2d3a1e; margin-top:16px; font-size:2rem;\">Nafseyti</h2>
            <p style=\"color:#6B7D5A; font-size:0.95rem;\">Connectez-vous à votre espace</p>
        </div>

        {% if error %}
            <div style=\"background:#fee2e2; color:#991b1b; padding:12px 16px; border-radius:8px; margin-bottom:20px; font-size:0.9rem;\">
                ⚠️ {{ error.messageKey|trans(error.messageData, 'security') }}
            </div>
        {% endif %}

        <form method=\"post\" action=\"{{ path('app_login') }}\">

            <div style=\"margin-bottom:20px;\">
                <label style=\"display:block; font-weight:600; color:#2d3a1e; margin-bottom:8px;\">
                    Email
                </label>
                <input type=\"email\" name=\"email\" value=\"{{ last_username }}\" required
                       style=\"width:100%; padding:12px 16px; border:1.5px solid #d4c9a8; border-radius:8px; font-size:1rem; outline:none; box-sizing:border-box;\"
                       placeholder=\"votre@email.com\">
            </div>

            <div style=\"margin-bottom:28px;\">
                <label style=\"display:block; font-weight:600; color:#2d3a1e; margin-bottom:8px;\">
                    Mot de passe
                </label>
                <div style=\"position:relative;\">
                    <input type=\"password\" name=\"password\" id=\"password\" required
                           style=\"width:100%; padding:12px 16px; padding-right:48px; border:1.5px solid #d4c9a8; border-radius:8px; font-size:1rem; outline:none; box-sizing:border-box;\"
                           placeholder=\"••••••••\">
                    <span id=\"togglePassword\"
                          style=\"position:absolute; right:14px; top:50%; transform:translateY(-50%); cursor:pointer; color:#6B7D5A; font-size:1rem;\">
                        <i class=\"fas fa-eye\" id=\"eyeIcon\"></i>
                    </span>
                </div>
            </div>

            <input type=\"hidden\" name=\"_csrf_token\" value=\"{{ csrf_token('authenticate') }}\">

            <button type=\"submit\"
                    style=\"width:100%; padding:14px; background:#4a7c3f; color:white; border:none; border-radius:8px; font-size:1rem; font-weight:600; cursor:pointer; letter-spacing:0.5px;\">
                Se connecter
            </button>
        </form>

        <p style=\"text-align:center; margin-top:24px; color:#6B7D5A; font-size:0.9rem;\">
            Pas encore de compte ? 
            <a href=\"{{ path('app_register') }}\" style=\"color:#4a7c3f; font-weight:600;\">S'inscrire</a>
        </p>
    </div>
</section>

<script>
    document.getElementById('togglePassword').addEventListener('click', function() {
        const password = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');
        
        if (password.type === 'password') {
            password.type = 'text';
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        } else {
            password.type = 'password';
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        }
    });
</script>

{% endblock %}", "security/login.html.twig", "C:\\Users\\DELL\\Downloads\\psy\\templates\\security\\login.html.twig");
    }
}
