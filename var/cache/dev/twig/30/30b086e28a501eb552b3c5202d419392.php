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

/* security/register.html.twig */
class __TwigTemplate_88d9e99c64e1beaa2b62669d9d58ef77 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/register.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "security/register.html.twig"));

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

        yield "S'inscrire — Nafseyti";
        
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
        yield "<section style=\"min-height:100vh; background:#f5f0e8; display:flex; align-items:center; justify-content:center; padding:40px 0;\">
    <div style=\"background:white; border-radius:16px; box-shadow:0 20px 60px rgba(45,80,22,0.12); padding:48px; width:100%; max-width:540px;\">

        <!-- Header -->
        <div style=\"text-align:center; margin-bottom:32px;\">
            <h2 style=\"font-family:'Playfair Display',serif; color:#2d3a1e; font-size:2rem;\">Créer un compte</h2>
            <p style=\"color:#6B7D5A; font-size:0.95rem;\">Rejoignez la plateforme Nafseyti</p>
        </div>

        ";
        // line 15
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 15, $this->source); })()), "session", [], "any", false, false, false, 15), "flashBag", [], "any", false, false, false, 15), "has", ["error"], "method", false, false, false, 15)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 16
            yield "            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 16, $this->source); })()), "flashes", ["error"], "method", false, false, false, 16));
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 17
                yield "                <div style=\"background:#fee2e2; color:#991b1b; padding:12px 16px; border-radius:8px; margin-bottom:20px; font-size:0.9rem;\">
                    ⚠️ ";
                // line 18
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
                yield "
                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 21
            yield "        ";
        }
        // line 22
        yield "
        <form method=\"post\" action=\"";
        // line 23
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_register");
        yield "\">

            <!-- Firstname + Lastname -->
            <div style=\"display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:20px;\">
                <div>
                    <label style=\"display:block; font-weight:600; color:#2d3a1e; margin-bottom:8px;\">Prénom</label>
                    <input type=\"text\" name=\"firstname\" required
                           style=\"width:100%; padding:12px 16px; border:1.5px solid #d4c9a8; border-radius:8px; font-size:1rem; outline:none; box-sizing:border-box;\"
                           placeholder=\"Prénom\">
                </div>
                <div>
                    <label style=\"display:block; font-weight:600; color:#2d3a1e; margin-bottom:8px;\">Nom</label>
                    <input type=\"text\" name=\"lastname\" required
                           style=\"width:100%; padding:12px 16px; border:1.5px solid #d4c9a8; border-radius:8px; font-size:1rem; outline:none; box-sizing:border-box;\"
                           placeholder=\"Nom\">
                </div>
            </div>

            <!-- Email -->
            <div style=\"margin-bottom:20px;\">
                <label style=\"display:block; font-weight:600; color:#2d3a1e; margin-bottom:8px;\">Email</label>
                <input type=\"email\" name=\"email\" required
                       style=\"width:100%; padding:12px 16px; border:1.5px solid #d4c9a8; border-radius:8px; font-size:1rem; outline:none; box-sizing:border-box;\"
                       placeholder=\"votre@email.com\">
            </div>

            <!-- Password -->
            <div style=\"margin-bottom:20px;\">
                <label style=\"display:block; font-weight:600; color:#2d3a1e; margin-bottom:8px;\">Mot de passe</label>
                <div style=\"position:relative;\">
                    <input type=\"password\" name=\"password\" id=\"password\" required
                           style=\"width:100%; padding:12px 16px; padding-right:48px; border:1.5px solid #d4c9a8; border-radius:8px; font-size:1rem; outline:none; box-sizing:border-box;\"
                           placeholder=\"••••••••\">
                    <span id=\"togglePassword\"
                          style=\"position:absolute; right:14px; top:50%; transform:translateY(-50%); cursor:pointer; color:#6B7D5A;\">
                        <i class=\"fas fa-eye\" id=\"eyeIcon\"></i>
                    </span>
                </div>
            </div>

            <!-- Phone -->
            <div style=\"margin-bottom:20px;\">
                <label style=\"display:block; font-weight:600; color:#2d3a1e; margin-bottom:8px;\">Téléphone</label>
                <input type=\"text\" name=\"phone_number\"
                       style=\"width:100%; padding:12px 16px; border:1.5px solid #d4c9a8; border-radius:8px; font-size:1rem; outline:none; box-sizing:border-box;\"
                       placeholder=\"+216 XX XXX XXX\">
            </div>

            <!-- Address -->
            <div style=\"margin-bottom:28px;\">
                <label style=\"display:block; font-weight:600; color:#2d3a1e; margin-bottom:8px;\">Adresse</label>
                <input type=\"text\" name=\"address\"
                       style=\"width:100%; padding:12px 16px; border:1.5px solid #d4c9a8; border-radius:8px; font-size:1rem; outline:none; box-sizing:border-box;\"
                       placeholder=\"Votre adresse\">
            </div>

            <button type=\"submit\"
                    style=\"width:100%; padding:14px; background:#4a7c3f; color:white; border:none; border-radius:8px; font-size:1rem; font-weight:600; cursor:pointer; letter-spacing:0.5px;\">
                Créer mon compte
            </button>
        </form>

        <p style=\"text-align:center; margin-top:24px; color:#6B7D5A; font-size:0.9rem;\">
            Déjà un compte ?
            <a href=\"";
        // line 87
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_login");
        yield "\" style=\"color:#4a7c3f; font-weight:600;\">Se connecter</a>
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
        return "security/register.html.twig";
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
        return array (  203 => 87,  136 => 23,  133 => 22,  130 => 21,  121 => 18,  118 => 17,  113 => 16,  111 => 15,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}S'inscrire — Nafseyti{% endblock %}

{% block body %}
<section style=\"min-height:100vh; background:#f5f0e8; display:flex; align-items:center; justify-content:center; padding:40px 0;\">
    <div style=\"background:white; border-radius:16px; box-shadow:0 20px 60px rgba(45,80,22,0.12); padding:48px; width:100%; max-width:540px;\">

        <!-- Header -->
        <div style=\"text-align:center; margin-bottom:32px;\">
            <h2 style=\"font-family:'Playfair Display',serif; color:#2d3a1e; font-size:2rem;\">Créer un compte</h2>
            <p style=\"color:#6B7D5A; font-size:0.95rem;\">Rejoignez la plateforme Nafseyti</p>
        </div>

        {% if app.session.flashBag.has('error') %}
            {% for message in app.flashes('error') %}
                <div style=\"background:#fee2e2; color:#991b1b; padding:12px 16px; border-radius:8px; margin-bottom:20px; font-size:0.9rem;\">
                    ⚠️ {{ message }}
                </div>
            {% endfor %}
        {% endif %}

        <form method=\"post\" action=\"{{ path('app_register') }}\">

            <!-- Firstname + Lastname -->
            <div style=\"display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:20px;\">
                <div>
                    <label style=\"display:block; font-weight:600; color:#2d3a1e; margin-bottom:8px;\">Prénom</label>
                    <input type=\"text\" name=\"firstname\" required
                           style=\"width:100%; padding:12px 16px; border:1.5px solid #d4c9a8; border-radius:8px; font-size:1rem; outline:none; box-sizing:border-box;\"
                           placeholder=\"Prénom\">
                </div>
                <div>
                    <label style=\"display:block; font-weight:600; color:#2d3a1e; margin-bottom:8px;\">Nom</label>
                    <input type=\"text\" name=\"lastname\" required
                           style=\"width:100%; padding:12px 16px; border:1.5px solid #d4c9a8; border-radius:8px; font-size:1rem; outline:none; box-sizing:border-box;\"
                           placeholder=\"Nom\">
                </div>
            </div>

            <!-- Email -->
            <div style=\"margin-bottom:20px;\">
                <label style=\"display:block; font-weight:600; color:#2d3a1e; margin-bottom:8px;\">Email</label>
                <input type=\"email\" name=\"email\" required
                       style=\"width:100%; padding:12px 16px; border:1.5px solid #d4c9a8; border-radius:8px; font-size:1rem; outline:none; box-sizing:border-box;\"
                       placeholder=\"votre@email.com\">
            </div>

            <!-- Password -->
            <div style=\"margin-bottom:20px;\">
                <label style=\"display:block; font-weight:600; color:#2d3a1e; margin-bottom:8px;\">Mot de passe</label>
                <div style=\"position:relative;\">
                    <input type=\"password\" name=\"password\" id=\"password\" required
                           style=\"width:100%; padding:12px 16px; padding-right:48px; border:1.5px solid #d4c9a8; border-radius:8px; font-size:1rem; outline:none; box-sizing:border-box;\"
                           placeholder=\"••••••••\">
                    <span id=\"togglePassword\"
                          style=\"position:absolute; right:14px; top:50%; transform:translateY(-50%); cursor:pointer; color:#6B7D5A;\">
                        <i class=\"fas fa-eye\" id=\"eyeIcon\"></i>
                    </span>
                </div>
            </div>

            <!-- Phone -->
            <div style=\"margin-bottom:20px;\">
                <label style=\"display:block; font-weight:600; color:#2d3a1e; margin-bottom:8px;\">Téléphone</label>
                <input type=\"text\" name=\"phone_number\"
                       style=\"width:100%; padding:12px 16px; border:1.5px solid #d4c9a8; border-radius:8px; font-size:1rem; outline:none; box-sizing:border-box;\"
                       placeholder=\"+216 XX XXX XXX\">
            </div>

            <!-- Address -->
            <div style=\"margin-bottom:28px;\">
                <label style=\"display:block; font-weight:600; color:#2d3a1e; margin-bottom:8px;\">Adresse</label>
                <input type=\"text\" name=\"address\"
                       style=\"width:100%; padding:12px 16px; border:1.5px solid #d4c9a8; border-radius:8px; font-size:1rem; outline:none; box-sizing:border-box;\"
                       placeholder=\"Votre adresse\">
            </div>

            <button type=\"submit\"
                    style=\"width:100%; padding:14px; background:#4a7c3f; color:white; border:none; border-radius:8px; font-size:1rem; font-weight:600; cursor:pointer; letter-spacing:0.5px;\">
                Créer mon compte
            </button>
        </form>

        <p style=\"text-align:center; margin-top:24px; color:#6B7D5A; font-size:0.9rem;\">
            Déjà un compte ?
            <a href=\"{{ path('app_login') }}\" style=\"color:#4a7c3f; font-weight:600;\">Se connecter</a>
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

{% endblock %}", "security/register.html.twig", "C:\\Users\\sirine\\psy\\templates\\security\\register.html.twig");
    }
}
