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

/* home/edit_profile.html.twig */
class __TwigTemplate_19d5aaa5fffe3a035b53392a489c9fd8 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/edit_profile.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/edit_profile.html.twig"));

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

        yield "Modifier mon profil — Nafseyti";
        
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
    <div style=\"max-width:580px; margin:0 auto;\">

        ";
        // line 8
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 8, $this->source); })()), "flashes", ["error"], "method", false, false, false, 8));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 9
            yield "            <div style=\"background:#fee2e2; color:#991b1b; padding:12px 16px; border-radius:8px; margin-bottom:20px;\">⚠️ ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 11
        yield "
        <div style=\"background:white; border-radius:16px; box-shadow:0 20px 60px rgba(45,80,22,0.12); padding:48px;\">

            <div style=\"text-align:center; margin-bottom:32px;\">
                <h2 style=\"font-family:'Playfair Display',serif; color:#2d3a1e; font-size:2rem;\">Modifier le profil</h2>
                <p style=\"color:#6B7D5A; font-size:0.95rem;\">Mettez à jour vos informations</p>
            </div>

            <form method=\"post\" action=\"";
        // line 19
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile_edit");
        yield "\" enctype=\"multipart/form-data\">

                <!-- Profile Photo -->
                <div style=\"text-align:center; margin-bottom:32px;\">
                    ";
        // line 23
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 23, $this->source); })()), "profile_photo", [], "any", false, false, false, 23)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 24
            yield "                        <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 24, $this->source); })()), "profile_photo", [], "any", false, false, false, 24)), "html", null, true);
            yield "\" id=\"photoPreview\"
                             style=\"width:100px; height:100px; border-radius:50%; object-fit:cover; border:4px solid #4a7c3f; margin-bottom:12px;\">
                    ";
        } else {
            // line 27
            yield "                        <div id=\"photoPreviewDefault\" style=\"width:100px; height:100px; background:#4a7c3f; border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 12px;\">
                            <i class=\"fas fa-user\" style=\"font-size:2.5rem; color:white;\"></i>
                        </div>
                        <img id=\"photoPreview\" style=\"display:none; width:100px; height:100px; border-radius:50%; object-fit:cover; border:4px solid #4a7c3f; margin-bottom:12px;\">
                    ";
        }
        // line 32
        yield "                    <div>
                        <label for=\"profile_photo\" 
                               style=\"cursor:pointer; background:#f5f0e8; color:#4a7c3f; padding:8px 20px; border-radius:8px; font-size:0.85rem; font-weight:600; border:1px solid #d4c9a8;\">
                            📷 Changer la photo
                        </label>
                        <input type=\"file\" name=\"profile_photo\" id=\"profile_photo\" accept=\"image/*\" style=\"display:none;\">
                    </div>
                </div>

                <!-- Name -->
                <div style=\"display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:20px;\">
                    <div>
                        <label style=\"display:block; font-weight:600; color:#2d3a1e; margin-bottom:8px;\">Prénom</label>
                        <input type=\"text\" name=\"firstname\" value=\"";
        // line 45
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 45, $this->source); })()), "firstname", [], "any", false, false, false, 45), "html", null, true);
        yield "\" required
                               style=\"width:100%; padding:12px 16px; border:1.5px solid #d4c9a8; border-radius:8px; font-size:1rem; outline:none; box-sizing:border-box;\">
                    </div>
                    <div>
                        <label style=\"display:block; font-weight:600; color:#2d3a1e; margin-bottom:8px;\">Nom</label>
                        <input type=\"text\" name=\"lastname\" value=\"";
        // line 50
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 50, $this->source); })()), "lastname", [], "any", false, false, false, 50), "html", null, true);
        yield "\" required
                               style=\"width:100%; padding:12px 16px; border:1.5px solid #d4c9a8; border-radius:8px; font-size:1rem; outline:none; box-sizing:border-box;\">
                    </div>
                </div>

                <!-- Phone -->
                <div style=\"margin-bottom:20px;\">
                    <label style=\"display:block; font-weight:600; color:#2d3a1e; margin-bottom:8px;\">Téléphone</label>
                    <input type=\"text\" name=\"phone_number\" value=\"";
        // line 58
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 58, $this->source); })()), "phone_number", [], "any", false, false, false, 58), "html", null, true);
        yield "\"
                           style=\"width:100%; padding:12px 16px; border:1.5px solid #d4c9a8; border-radius:8px; font-size:1rem; outline:none; box-sizing:border-box;\"
                           placeholder=\"+216 XX XXX XXX\">
                </div>

                <!-- Address -->
                <div style=\"margin-bottom:20px;\">
                    <label style=\"display:block; font-weight:600; color:#2d3a1e; margin-bottom:8px;\">Adresse</label>
                    <input type=\"text\" name=\"address\" value=\"";
        // line 66
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 66, $this->source); })()), "address", [], "any", false, false, false, 66), "html", null, true);
        yield "\"
                           style=\"width:100%; padding:12px 16px; border:1.5px solid #d4c9a8; border-radius:8px; font-size:1rem; outline:none; box-sizing:border-box;\">
                </div>

                <!-- Location -->
                <div style=\"margin-bottom:32px;\">
                    <label style=\"display:block; font-weight:600; color:#2d3a1e; margin-bottom:8px;\">Localisation</label>
                    <input type=\"text\" name=\"location\" value=\"";
        // line 73
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 73, $this->source); })()), "location", [], "any", false, false, false, 73), "html", null, true);
        yield "\"
                           style=\"width:100%; padding:12px 16px; border:1.5px solid #d4c9a8; border-radius:8px; font-size:1rem; outline:none; box-sizing:border-box;\">
                </div>

                <!-- Password section -->
                <div style=\"border-top:1px solid #f0ebe0; padding-top:28px; margin-bottom:28px;\">
                    <h4 style=\"font-family:'Playfair Display',serif; color:#2d3a1e; margin-bottom:20px; font-size:1.1rem;\">🔒 Changer le mot de passe</h4>
                    <p style=\"color:#6B7D5A; font-size:0.85rem; margin-bottom:16px;\">Laissez vide si vous ne souhaitez pas changer votre mot de passe.</p>

                    <div style=\"margin-bottom:16px;\">
                        <label style=\"display:block; font-weight:600; color:#2d3a1e; margin-bottom:8px;\">Mot de passe actuel</label>
                        <div style=\"position:relative;\">
                            <input type=\"password\" name=\"current_password\" id=\"current_password\"
                                   style=\"width:100%; padding:12px 16px; padding-right:48px; border:1.5px solid #d4c9a8; border-radius:8px; font-size:1rem; outline:none; box-sizing:border-box;\"
                                   placeholder=\"••••••••\">
                            <span onclick=\"togglePass('current_password', 'eye1')\" style=\"position:absolute; right:14px; top:50%; transform:translateY(-50%); cursor:pointer; color:#6B7D5A;\">
                                <i class=\"fas fa-eye\" id=\"eye1\"></i>
                            </span>
                        </div>
                    </div>

                    <div style=\"margin-bottom:16px;\">
                        <label style=\"display:block; font-weight:600; color:#2d3a1e; margin-bottom:8px;\">Nouveau mot de passe</label>
                        <div style=\"position:relative;\">
                            <input type=\"password\" name=\"new_password\" id=\"new_password\"
                                   style=\"width:100%; padding:12px 16px; padding-right:48px; border:1.5px solid #d4c9a8; border-radius:8px; font-size:1rem; outline:none; box-sizing:border-box;\"
                                   placeholder=\"••••••••\">
                            <span onclick=\"togglePass('new_password', 'eye2')\" style=\"position:absolute; right:14px; top:50%; transform:translateY(-50%); cursor:pointer; color:#6B7D5A;\">
                                <i class=\"fas fa-eye\" id=\"eye2\"></i>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Submit -->
                <div style=\"display:flex; gap:16px;\">
                    <button type=\"submit\"
                            style=\"flex:1; padding:14px; background:#4a7c3f; color:white; border:none; border-radius:8px; font-size:1rem; font-weight:600; cursor:pointer;\">
                        💾 Enregistrer
                    </button>
                    <a href=\"";
        // line 113
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile");
        yield "\"
                       style=\"flex:1; text-align:center; padding:14px; background:#f5f0e8; color:#2d3a1e; border-radius:8px; text-decoration:none; font-weight:600; font-size:1rem;\">
                        Annuler
                    </a>
                </div>

            </form>
        </div>
    </div>
</section>

<script>
// Toggle password visibility
function togglePass(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.replace('fa-eye', 'fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.replace('fa-eye-slash', 'fa-eye');
    }
}

// Preview profile photo before upload
document.getElementById('profile_photo').addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('photoPreview');
            const defaultDiv = document.getElementById('photoPreviewDefault');
            if (defaultDiv) defaultDiv.style.display = 'none';
            preview.src = e.target.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(file);
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
        return "home/edit_profile.html.twig";
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
        return array (  249 => 113,  206 => 73,  196 => 66,  185 => 58,  174 => 50,  166 => 45,  151 => 32,  144 => 27,  137 => 24,  135 => 23,  128 => 19,  118 => 11,  109 => 9,  105 => 8,  100 => 5,  87 => 4,  64 => 2,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}
{% block title %}Modifier mon profil — Nafseyti{% endblock %}

{% block body %}
<section style=\"min-height:100vh; background:#f5f0e8; padding:60px 20px;\">
    <div style=\"max-width:580px; margin:0 auto;\">

        {% for message in app.flashes('error') %}
            <div style=\"background:#fee2e2; color:#991b1b; padding:12px 16px; border-radius:8px; margin-bottom:20px;\">⚠️ {{ message }}</div>
        {% endfor %}

        <div style=\"background:white; border-radius:16px; box-shadow:0 20px 60px rgba(45,80,22,0.12); padding:48px;\">

            <div style=\"text-align:center; margin-bottom:32px;\">
                <h2 style=\"font-family:'Playfair Display',serif; color:#2d3a1e; font-size:2rem;\">Modifier le profil</h2>
                <p style=\"color:#6B7D5A; font-size:0.95rem;\">Mettez à jour vos informations</p>
            </div>

            <form method=\"post\" action=\"{{ path('app_profile_edit') }}\" enctype=\"multipart/form-data\">

                <!-- Profile Photo -->
                <div style=\"text-align:center; margin-bottom:32px;\">
                    {% if user.profile_photo %}
                        <img src=\"{{ asset(user.profile_photo) }}\" id=\"photoPreview\"
                             style=\"width:100px; height:100px; border-radius:50%; object-fit:cover; border:4px solid #4a7c3f; margin-bottom:12px;\">
                    {% else %}
                        <div id=\"photoPreviewDefault\" style=\"width:100px; height:100px; background:#4a7c3f; border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 12px;\">
                            <i class=\"fas fa-user\" style=\"font-size:2.5rem; color:white;\"></i>
                        </div>
                        <img id=\"photoPreview\" style=\"display:none; width:100px; height:100px; border-radius:50%; object-fit:cover; border:4px solid #4a7c3f; margin-bottom:12px;\">
                    {% endif %}
                    <div>
                        <label for=\"profile_photo\" 
                               style=\"cursor:pointer; background:#f5f0e8; color:#4a7c3f; padding:8px 20px; border-radius:8px; font-size:0.85rem; font-weight:600; border:1px solid #d4c9a8;\">
                            📷 Changer la photo
                        </label>
                        <input type=\"file\" name=\"profile_photo\" id=\"profile_photo\" accept=\"image/*\" style=\"display:none;\">
                    </div>
                </div>

                <!-- Name -->
                <div style=\"display:grid; grid-template-columns:1fr 1fr; gap:16px; margin-bottom:20px;\">
                    <div>
                        <label style=\"display:block; font-weight:600; color:#2d3a1e; margin-bottom:8px;\">Prénom</label>
                        <input type=\"text\" name=\"firstname\" value=\"{{ user.firstname }}\" required
                               style=\"width:100%; padding:12px 16px; border:1.5px solid #d4c9a8; border-radius:8px; font-size:1rem; outline:none; box-sizing:border-box;\">
                    </div>
                    <div>
                        <label style=\"display:block; font-weight:600; color:#2d3a1e; margin-bottom:8px;\">Nom</label>
                        <input type=\"text\" name=\"lastname\" value=\"{{ user.lastname }}\" required
                               style=\"width:100%; padding:12px 16px; border:1.5px solid #d4c9a8; border-radius:8px; font-size:1rem; outline:none; box-sizing:border-box;\">
                    </div>
                </div>

                <!-- Phone -->
                <div style=\"margin-bottom:20px;\">
                    <label style=\"display:block; font-weight:600; color:#2d3a1e; margin-bottom:8px;\">Téléphone</label>
                    <input type=\"text\" name=\"phone_number\" value=\"{{ user.phone_number }}\"
                           style=\"width:100%; padding:12px 16px; border:1.5px solid #d4c9a8; border-radius:8px; font-size:1rem; outline:none; box-sizing:border-box;\"
                           placeholder=\"+216 XX XXX XXX\">
                </div>

                <!-- Address -->
                <div style=\"margin-bottom:20px;\">
                    <label style=\"display:block; font-weight:600; color:#2d3a1e; margin-bottom:8px;\">Adresse</label>
                    <input type=\"text\" name=\"address\" value=\"{{ user.address }}\"
                           style=\"width:100%; padding:12px 16px; border:1.5px solid #d4c9a8; border-radius:8px; font-size:1rem; outline:none; box-sizing:border-box;\">
                </div>

                <!-- Location -->
                <div style=\"margin-bottom:32px;\">
                    <label style=\"display:block; font-weight:600; color:#2d3a1e; margin-bottom:8px;\">Localisation</label>
                    <input type=\"text\" name=\"location\" value=\"{{ user.location }}\"
                           style=\"width:100%; padding:12px 16px; border:1.5px solid #d4c9a8; border-radius:8px; font-size:1rem; outline:none; box-sizing:border-box;\">
                </div>

                <!-- Password section -->
                <div style=\"border-top:1px solid #f0ebe0; padding-top:28px; margin-bottom:28px;\">
                    <h4 style=\"font-family:'Playfair Display',serif; color:#2d3a1e; margin-bottom:20px; font-size:1.1rem;\">🔒 Changer le mot de passe</h4>
                    <p style=\"color:#6B7D5A; font-size:0.85rem; margin-bottom:16px;\">Laissez vide si vous ne souhaitez pas changer votre mot de passe.</p>

                    <div style=\"margin-bottom:16px;\">
                        <label style=\"display:block; font-weight:600; color:#2d3a1e; margin-bottom:8px;\">Mot de passe actuel</label>
                        <div style=\"position:relative;\">
                            <input type=\"password\" name=\"current_password\" id=\"current_password\"
                                   style=\"width:100%; padding:12px 16px; padding-right:48px; border:1.5px solid #d4c9a8; border-radius:8px; font-size:1rem; outline:none; box-sizing:border-box;\"
                                   placeholder=\"••••••••\">
                            <span onclick=\"togglePass('current_password', 'eye1')\" style=\"position:absolute; right:14px; top:50%; transform:translateY(-50%); cursor:pointer; color:#6B7D5A;\">
                                <i class=\"fas fa-eye\" id=\"eye1\"></i>
                            </span>
                        </div>
                    </div>

                    <div style=\"margin-bottom:16px;\">
                        <label style=\"display:block; font-weight:600; color:#2d3a1e; margin-bottom:8px;\">Nouveau mot de passe</label>
                        <div style=\"position:relative;\">
                            <input type=\"password\" name=\"new_password\" id=\"new_password\"
                                   style=\"width:100%; padding:12px 16px; padding-right:48px; border:1.5px solid #d4c9a8; border-radius:8px; font-size:1rem; outline:none; box-sizing:border-box;\"
                                   placeholder=\"••••••••\">
                            <span onclick=\"togglePass('new_password', 'eye2')\" style=\"position:absolute; right:14px; top:50%; transform:translateY(-50%); cursor:pointer; color:#6B7D5A;\">
                                <i class=\"fas fa-eye\" id=\"eye2\"></i>
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Submit -->
                <div style=\"display:flex; gap:16px;\">
                    <button type=\"submit\"
                            style=\"flex:1; padding:14px; background:#4a7c3f; color:white; border:none; border-radius:8px; font-size:1rem; font-weight:600; cursor:pointer;\">
                        💾 Enregistrer
                    </button>
                    <a href=\"{{ path('app_profile') }}\"
                       style=\"flex:1; text-align:center; padding:14px; background:#f5f0e8; color:#2d3a1e; border-radius:8px; text-decoration:none; font-weight:600; font-size:1rem;\">
                        Annuler
                    </a>
                </div>

            </form>
        </div>
    </div>
</section>

<script>
// Toggle password visibility
function togglePass(inputId, iconId) {
    const input = document.getElementById(inputId);
    const icon = document.getElementById(iconId);
    if (input.type === 'password') {
        input.type = 'text';
        icon.classList.replace('fa-eye', 'fa-eye-slash');
    } else {
        input.type = 'password';
        icon.classList.replace('fa-eye-slash', 'fa-eye');
    }
}

// Preview profile photo before upload
document.getElementById('profile_photo').addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('photoPreview');
            const defaultDiv = document.getElementById('photoPreviewDefault');
            if (defaultDiv) defaultDiv.style.display = 'none';
            preview.src = e.target.result;
            preview.style.display = 'block';
        };
        reader.readAsDataURL(file);
    }
});
</script>
{% endblock %}", "home/edit_profile.html.twig", "C:\\Users\\sirine\\psy\\templates\\home\\edit_profile.html.twig");
    }
}
