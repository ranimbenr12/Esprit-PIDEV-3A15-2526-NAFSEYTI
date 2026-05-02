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

/* back/dashboard.html.twig */
class __TwigTemplate_6af01ee61a0f7ac70890a10c29a25a4a extends Template
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
        return "back/base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/dashboard.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/dashboard.html.twig"));

        $this->parent = $this->load("back/base.html.twig", 1);
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

        yield "Dashboard";
        
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
        yield "<div class=\"full_container\">
    <div class=\"inner_container\">

        <!-- Sidebar -->
        <nav id=\"sidebar\">
            <div class=\"sidebar_blog_1\">
                <div class=\"sidebar-header\">
                    <div class=\"logo_section\">
                        <a href=\"#\">
                            <img class=\"logo_icon img-responsive\"
                                 src=\"";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("back/images/logo/logo_icon1.png"), "html", null, true);
        yield "\"
                                 alt=\"logo\" />
                        </a>
                    </div>
                </div>

                         <div class=\"sidebar_user_info\">
    <div class=\"icon_setting\"></div>
    <div class=\"user_profle_side\">
        <div class=\"user_img\">
                <img class=\"img-responsive\"
                   src=\"";
        // line 27
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("back/images/layout_img/user_img.jpg"), "html", null, true);
        yield "\" 
                     alt=\"user\"
                     style=\"width:70px; height:70px; border-radius:50%; object-fit:cover; border:3px solid #3c943c; display:block; margin:0 auto 10px auto;\">
            
        </div>
        <div class=\"user_info\" style=\"text-align:center;\">
            <h6 style=\"color:white; font-size:0.95rem; font-weight:600; margin-bottom:4px;\">
                ";
        // line 34
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 34, $this->source); })()), "user", [], "any", false, false, false, 34), "firstname", [], "any", false, false, false, 34), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 34, $this->source); })()), "user", [], "any", false, false, false, 34), "lastname", [], "any", false, false, false, 34), "html", null, true);
        yield "
            </h6>
            <p style=\"margin:0;\">
                <span class=\"online_animation\"></span> En ligne
            </p>
        </div>
    </div>
</div>

            <div class=\"sidebar_blog_2\">
                <h4></h4>
              <ul class=\"list-unstyled components\">
    <li class=\"active\">
        <a href=\"#\">
            <i class=\"fa fa-dashboard yellow_color\"></i>
            <span>Tableau de bord</span>
        </a>
    </li>

    <li>
        <a href=\"";
        // line 54
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users");
        yield "\">
            <i class=\"fa fa-users blue1_color\"></i>
            <span>Utilisateurs</span>
        </a>
    </li>

    <li>
    <a href=\"";
        // line 61
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_rendezvous");
        yield "\">
        <i class=\"fa fa-calendar orange_color\"></i>
        <span>Rendez-vous</span>
    </a>
    </li>

    <li>
        <a href=\"#\">
            <i class=\"fa fa-book purple_color2\"></i>
            <span>Contenu psychologique</span>
        </a>
    </li>

    <li>
        <a href=\"";
        // line 75
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_test_index");
        yield "\">
            <i class=\"fa fa-check-square green_color\"></i>
            <span>Tests</span>
        </a>
    </li>

    <li>
        <a href=\"";
        // line 82
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_events_index");
        yield "\">
            <i class=\"fa fa-calendar-check-o red_color\"></i>
            <span>Événements</span>
        </a>
    </li>

    <li>
        <a href=\"#\">
            <i class=\"fa fa-line-chart yellow_color\"></i>
            <span>Suivi personnel</span>
        </a>
    </li>
</ul>
            </div>
        </nav>

        <!-- Content -->
        <div id=\"content\">

            <!-- Topbar -->
            <div class=\"topbar\">
                <nav class=\"navbar navbar-expand-lg navbar-light\">
                    <div class=\"full\">
                        <button type=\"button\" id=\"sidebarCollapse\" class=\"sidebar_toggle\">
                            <i class=\"fa fa-bars\"></i>
                        </button>
                        <div class=\"logo_section\">
                            <a href=\"";
        // line 109
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_dashboard");
        yield "\" style=\"display:flex; align-items:center; text-decoration:none;\">
                                <img class=\"img-responsive\"
                                     src=\"";
        // line 111
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("back/images/logo/logo1.png"), "html", null, true);
        yield "\"
                                     alt=\"logo\"
                                     style=\"width:40px; height:40px; margin-right:10px;\" />
                                <span style=\"font-size:20px; font-weight:bold; color:#3c943c;\">
                                    Nafseyti
                                </span>
                            </a>
                        </div>
                        <div class=\"right_topbar\">
                            <div class=\"icon_info\">
                                <ul>
                                    <li><a href=\"#\"><i class=\"fa fa-bell-o\"></i><span class=\"badge\">2</span></a></li>
                                    <li><a href=\"#\"><i class=\"fa fa-question-circle\"></i></a></li>
                                    <li><a href=\"#\"><i class=\"fa fa-envelope-o\"></i><span class=\"badge\">3</span></a></li>
                                </ul>
                                <ul class=\"user_profile_dd\">
                                    <li>
                                        <a class=\"dropdown-toggle\" data-toggle=\"dropdown\">
    <img class=\"img-responsive rounded-circle\"
         src=\"";
        // line 130
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("back/images/layout_img/user_img.jpg"), "html", null, true);
        yield "\" 
         alt=\"photo\"
         style=\"width:35px; height:35px; object-fit:cover; border-radius:50%;\">

    <span class=\"name_user\">
        ";
        // line 135
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 135, $this->source); })()), "user", [], "any", false, false, false, 135), "firstname", [], "any", false, false, false, 135), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 135, $this->source); })()), "user", [], "any", false, false, false, 135), "lastname", [], "any", false, false, false, 135), "html", null, true);
        yield "
    </span>
</a>
                                        <div class=\"dropdown-menu\">
    <a class=\"dropdown-item\" href=\"";
        // line 139
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile");
        yield "\">
        <i class=\"fa fa-user\"></i> Mon Profil
    </a>
    <div class=\"dropdown-divider\"></div>
    <a class=\"dropdown-item\" href=\"";
        // line 143
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
        yield "\">
        <span>Se déconnecter</span> <i class=\"fa fa-sign-out\"></i>
    </a>
</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <!-- Dashboard -->
            <div class=\"midde_cont\">
                <div class=\"container-fluid\">

                    <div class=\"row column_title\">
                        <div class=\"col-md-12\">
                            <div class=\"page_title\">
                                <h2>Tableau de bord</h2>
                            </div>
                        </div>
                    </div>
<style>
.dashboard-card{
    display: flex;
    align-items: center;
    padding: 25px;
    border-radius: 20px;
    color: white;
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    transition: all 0.3s ease;
    min-height: 130px;
    margin-bottom: 20px;
}

.dashboard-card:hover{
    transform: translateY(-8px);
    box-shadow: 0 12px 25px rgba(0,0,0,0.2);
}

.icon-box{
    width: 70px;
    height: 70px;
    background: rgba(255,255,255,0.2);
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-right: 20px;
}

.icon-box i{
    font-size: 30px;
    color: white;
}

.info-box h3{
    margin: 0;
    font-size: 30px;
    font-weight: bold;
}

.info-box p{
    margin: 0;
    font-size: 17px;
}

/* Couleurs */
.users-card{
    background: linear-gradient(135deg, #36d1dc, #5b86e5);
}

.rdv-card{
    background: linear-gradient(135deg, #ff9966, #ff5e62);
}

.content-card{
    background: linear-gradient(135deg, #a18cd1, #fbc2eb);
}

.test-card{
    background: linear-gradient(135deg, #11998e, #38ef7d);
}

.event-card{
    background: linear-gradient(135deg, #fc466b, #3f5efb);
}

.suivi-card{
    background: linear-gradient(135deg, #f7971e, #ffd200);
}
</style>

<div class=\"row\">

    <div class=\"col-md-4\">
        <div class=\"dashboard-card users-card\">
            <div class=\"icon-box\">
                <i class=\"fa fa-users\"></i>
            </div>
            <div class=\"info-box\">
                <h3>1 250</h3>
                <p>Utilisateurs</p>
            </div>
        </div>
    </div>

    <div class=\"col-md-4\">
    <a href=\"";
        // line 252
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_rendezvous");
        yield "\" style=\"text-decoration: none; color: inherit;\">
        <div class=\"dashboard-card rdv-card\">
            <div class=\"icon-box\">
                <i class=\"fa fa-calendar\"></i>
            </div>
            <div class=\"info-box\">
                <h3>320</h3>
                <p>Rendez-vous</p>
            </div>
        </div>
    </a>
</div>

    <div class=\"col-md-4\">
        <div class=\"dashboard-card content-card\">
            <div class=\"icon-box\">
                <i class=\"fa fa-book\"></i>
            </div>
            <div class=\"info-box\">
                <h3>85</h3>
                <p>Contenus</p>
            </div>
        </div>
    </div>

    <div class=\"col-md-4\">
        <div class=\"dashboard-card test-card\">
            <div class=\"icon-box\">
                <i class=\"fa fa-check-square\"></i>
            </div>
            <div class=\"info-box\">
                <h3>145</h3>
                <p>Tests</p>
            </div>
        </div>
    </div>

    <div class=\"col-md-4\">
        <div class=\"dashboard-card event-card\">
            <div class=\"icon-box\">
                <i class=\"fa fa-calendar-check-o\"></i>
            </div>
            <div class=\"info-box\">
                <h3>18</h3>
                <p>Événements</p>
            </div>
        </div>
    </div>

    <div class=\"col-md-4\">
        <div class=\"dashboard-card suivi-card\">
            <div class=\"icon-box\">
                <i class=\"fa fa-line-chart\"></i>
            </div>
            <div class=\"info-box\">
                <h3>540</h3>
                <p>Suivi personnel</p>
            </div>
        </div>
    </div>

</div>
                    <!-- Graph -->
                    <div class=\"row column2 graph margin_bottom_30\">
                        <div class=\"col-lg-12\">
                            <div class=\"white_shd full\">
                                <div class=\"full graph_head\">
                                    <div class=\"heading1 margin_0\">
                                        <h2>Extra Area Chart</h2>
                                    </div>
                                </div>

                                <div class=\"full graph_revenue\">
                                    <canvas height=\"120\" id=\"canvas\"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Section psychologie -->
<style>
.psychology-section{
    margin-top: 30px;
}

.psychology-card{
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 8px 20px rgba(0,0,0,0.12);
    transition: 0.3s;
    margin-bottom: 25px;
}

.psychology-card:hover{
    transform: translateY(-8px);
    box-shadow: 0 12px 25px rgba(0,0,0,0.18);
}

.psychology-card img{
    width: 100%;
    height: 220px;
    object-fit: cover;
}

.psychology-content{
    padding: 20px;
}

.psychology-content h4{
    font-size: 20px;
    font-weight: bold;
    color: #333;
}

.psychology-content p{
    color: #777;
    font-size: 15px;
}
</style>

<div class=\"psychology-section\">
    <div class=\"row\">

        <div class=\"col-md-4\">
            <div class=\"psychology-card\">
                <img src=\"";
        // line 379
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/event-33.jpg"), "html", null, true);
        yield "\" alt=\"meditation\">
                <div class=\"psychology-content\">
                    <h4>Bien-être mental</h4>
                    <p>Suivez l’évolution émotionnelle des utilisateurs et leur équilibre psychologique.</p>
                </div>
            </div>
        </div>

        <div class=\"col-md-4\">
            <div class=\"psychology-card\">
                <img src=\"";
        // line 389
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/event-22.jpg"), "html", null, true);
        yield "\" alt=\"support\">
                <div class=\"psychology-content\">
                    <h4>Accompagnement</h4>
                    <p>Visualisez le suivi personnel et les rendez-vous psychologiques.</p>
                </div>
            </div>
        </div>

        <div class=\"col-md-4\">
            <div class=\"psychology-card\">
                <img src=\"";
        // line 399
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/Anasayfa.jpg"), "html", null, true);
        yield "\" alt=\"motivation\">
                <div class=\"psychology-content\">
                    <h4>Motivation</h4>
                    <p>Encouragez les utilisateurs avec du contenu positif et des tests adaptés.</p>
                </div>
            </div>
        </div>

    </div>
</div>

                <!-- Footer -->
                <div class=\"container-fluid\">
                    <div style=\"
    background: linear-gradient(135deg, #f5f0fb, #bdabb8);
    color: white;
    padding: 20px;
    border-radius: 18px;
    text-align: center;
    font-size: 18px;
    font-weight: 500;
    margin-top: 20px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.12);
\">
    🧠 Prenez soin de votre santé mentale chaque jour 💙  
    🌿 Un esprit apaisé mène à une vie équilibrée ✨  
    😊 Chaque petit progrès compte !
</div>
                </div>
            </div>

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
        return "back/dashboard.html.twig";
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
        return array (  547 => 399,  534 => 389,  521 => 379,  391 => 252,  279 => 143,  272 => 139,  263 => 135,  255 => 130,  233 => 111,  228 => 109,  198 => 82,  188 => 75,  171 => 61,  161 => 54,  136 => 34,  126 => 27,  112 => 16,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'back/base.html.twig' %}

{% block title %}Dashboard{% endblock %}

{% block body %}
<div class=\"full_container\">
    <div class=\"inner_container\">

        <!-- Sidebar -->
        <nav id=\"sidebar\">
            <div class=\"sidebar_blog_1\">
                <div class=\"sidebar-header\">
                    <div class=\"logo_section\">
                        <a href=\"#\">
                            <img class=\"logo_icon img-responsive\"
                                 src=\"{{ asset('back/images/logo/logo_icon1.png') }}\"
                                 alt=\"logo\" />
                        </a>
                    </div>
                </div>

                         <div class=\"sidebar_user_info\">
    <div class=\"icon_setting\"></div>
    <div class=\"user_profle_side\">
        <div class=\"user_img\">
                <img class=\"img-responsive\"
                   src=\"{{ asset('back/images/layout_img/user_img.jpg') }}\" 
                     alt=\"user\"
                     style=\"width:70px; height:70px; border-radius:50%; object-fit:cover; border:3px solid #3c943c; display:block; margin:0 auto 10px auto;\">
            
        </div>
        <div class=\"user_info\" style=\"text-align:center;\">
            <h6 style=\"color:white; font-size:0.95rem; font-weight:600; margin-bottom:4px;\">
                {{ app.user.firstname }} {{ app.user.lastname }}
            </h6>
            <p style=\"margin:0;\">
                <span class=\"online_animation\"></span> En ligne
            </p>
        </div>
    </div>
</div>

            <div class=\"sidebar_blog_2\">
                <h4></h4>
              <ul class=\"list-unstyled components\">
    <li class=\"active\">
        <a href=\"#\">
            <i class=\"fa fa-dashboard yellow_color\"></i>
            <span>Tableau de bord</span>
        </a>
    </li>

    <li>
        <a href=\"{{ path('admin_users') }}\">
            <i class=\"fa fa-users blue1_color\"></i>
            <span>Utilisateurs</span>
        </a>
    </li>

    <li>
    <a href=\"{{ path('admin_rendezvous') }}\">
        <i class=\"fa fa-calendar orange_color\"></i>
        <span>Rendez-vous</span>
    </a>
    </li>

    <li>
        <a href=\"#\">
            <i class=\"fa fa-book purple_color2\"></i>
            <span>Contenu psychologique</span>
        </a>
    </li>

    <li>
        <a href=\"{{ path('app_test_index') }}\">
            <i class=\"fa fa-check-square green_color\"></i>
            <span>Tests</span>
        </a>
    </li>

    <li>
        <a href=\"{{ path('admin_events_index') }}\">
            <i class=\"fa fa-calendar-check-o red_color\"></i>
            <span>Événements</span>
        </a>
    </li>

    <li>
        <a href=\"#\">
            <i class=\"fa fa-line-chart yellow_color\"></i>
            <span>Suivi personnel</span>
        </a>
    </li>
</ul>
            </div>
        </nav>

        <!-- Content -->
        <div id=\"content\">

            <!-- Topbar -->
            <div class=\"topbar\">
                <nav class=\"navbar navbar-expand-lg navbar-light\">
                    <div class=\"full\">
                        <button type=\"button\" id=\"sidebarCollapse\" class=\"sidebar_toggle\">
                            <i class=\"fa fa-bars\"></i>
                        </button>
                        <div class=\"logo_section\">
                            <a href=\"{{ path('admin_dashboard') }}\" style=\"display:flex; align-items:center; text-decoration:none;\">
                                <img class=\"img-responsive\"
                                     src=\"{{ asset('back/images/logo/logo1.png') }}\"
                                     alt=\"logo\"
                                     style=\"width:40px; height:40px; margin-right:10px;\" />
                                <span style=\"font-size:20px; font-weight:bold; color:#3c943c;\">
                                    Nafseyti
                                </span>
                            </a>
                        </div>
                        <div class=\"right_topbar\">
                            <div class=\"icon_info\">
                                <ul>
                                    <li><a href=\"#\"><i class=\"fa fa-bell-o\"></i><span class=\"badge\">2</span></a></li>
                                    <li><a href=\"#\"><i class=\"fa fa-question-circle\"></i></a></li>
                                    <li><a href=\"#\"><i class=\"fa fa-envelope-o\"></i><span class=\"badge\">3</span></a></li>
                                </ul>
                                <ul class=\"user_profile_dd\">
                                    <li>
                                        <a class=\"dropdown-toggle\" data-toggle=\"dropdown\">
    <img class=\"img-responsive rounded-circle\"
         src=\"{{ asset('back/images/layout_img/user_img.jpg') }}\" 
         alt=\"photo\"
         style=\"width:35px; height:35px; object-fit:cover; border-radius:50%;\">

    <span class=\"name_user\">
        {{ app.user.firstname }} {{ app.user.lastname }}
    </span>
</a>
                                        <div class=\"dropdown-menu\">
    <a class=\"dropdown-item\" href=\"{{ path('app_profile') }}\">
        <i class=\"fa fa-user\"></i> Mon Profil
    </a>
    <div class=\"dropdown-divider\"></div>
    <a class=\"dropdown-item\" href=\"{{ path('app_logout') }}\">
        <span>Se déconnecter</span> <i class=\"fa fa-sign-out\"></i>
    </a>
</div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>

            <!-- Dashboard -->
            <div class=\"midde_cont\">
                <div class=\"container-fluid\">

                    <div class=\"row column_title\">
                        <div class=\"col-md-12\">
                            <div class=\"page_title\">
                                <h2>Tableau de bord</h2>
                            </div>
                        </div>
                    </div>
<style>
.dashboard-card{
    display: flex;
    align-items: center;
    padding: 25px;
    border-radius: 20px;
    color: white;
    box-shadow: 0 8px 20px rgba(0,0,0,0.15);
    transition: all 0.3s ease;
    min-height: 130px;
    margin-bottom: 20px;
}

.dashboard-card:hover{
    transform: translateY(-8px);
    box-shadow: 0 12px 25px rgba(0,0,0,0.2);
}

.icon-box{
    width: 70px;
    height: 70px;
    background: rgba(255,255,255,0.2);
    border-radius: 50%;
    display: flex;
    justify-content: center;
    align-items: center;
    margin-right: 20px;
}

.icon-box i{
    font-size: 30px;
    color: white;
}

.info-box h3{
    margin: 0;
    font-size: 30px;
    font-weight: bold;
}

.info-box p{
    margin: 0;
    font-size: 17px;
}

/* Couleurs */
.users-card{
    background: linear-gradient(135deg, #36d1dc, #5b86e5);
}

.rdv-card{
    background: linear-gradient(135deg, #ff9966, #ff5e62);
}

.content-card{
    background: linear-gradient(135deg, #a18cd1, #fbc2eb);
}

.test-card{
    background: linear-gradient(135deg, #11998e, #38ef7d);
}

.event-card{
    background: linear-gradient(135deg, #fc466b, #3f5efb);
}

.suivi-card{
    background: linear-gradient(135deg, #f7971e, #ffd200);
}
</style>

<div class=\"row\">

    <div class=\"col-md-4\">
        <div class=\"dashboard-card users-card\">
            <div class=\"icon-box\">
                <i class=\"fa fa-users\"></i>
            </div>
            <div class=\"info-box\">
                <h3>1 250</h3>
                <p>Utilisateurs</p>
            </div>
        </div>
    </div>

    <div class=\"col-md-4\">
    <a href=\"{{ path('admin_rendezvous') }}\" style=\"text-decoration: none; color: inherit;\">
        <div class=\"dashboard-card rdv-card\">
            <div class=\"icon-box\">
                <i class=\"fa fa-calendar\"></i>
            </div>
            <div class=\"info-box\">
                <h3>320</h3>
                <p>Rendez-vous</p>
            </div>
        </div>
    </a>
</div>

    <div class=\"col-md-4\">
        <div class=\"dashboard-card content-card\">
            <div class=\"icon-box\">
                <i class=\"fa fa-book\"></i>
            </div>
            <div class=\"info-box\">
                <h3>85</h3>
                <p>Contenus</p>
            </div>
        </div>
    </div>

    <div class=\"col-md-4\">
        <div class=\"dashboard-card test-card\">
            <div class=\"icon-box\">
                <i class=\"fa fa-check-square\"></i>
            </div>
            <div class=\"info-box\">
                <h3>145</h3>
                <p>Tests</p>
            </div>
        </div>
    </div>

    <div class=\"col-md-4\">
        <div class=\"dashboard-card event-card\">
            <div class=\"icon-box\">
                <i class=\"fa fa-calendar-check-o\"></i>
            </div>
            <div class=\"info-box\">
                <h3>18</h3>
                <p>Événements</p>
            </div>
        </div>
    </div>

    <div class=\"col-md-4\">
        <div class=\"dashboard-card suivi-card\">
            <div class=\"icon-box\">
                <i class=\"fa fa-line-chart\"></i>
            </div>
            <div class=\"info-box\">
                <h3>540</h3>
                <p>Suivi personnel</p>
            </div>
        </div>
    </div>

</div>
                    <!-- Graph -->
                    <div class=\"row column2 graph margin_bottom_30\">
                        <div class=\"col-lg-12\">
                            <div class=\"white_shd full\">
                                <div class=\"full graph_head\">
                                    <div class=\"heading1 margin_0\">
                                        <h2>Extra Area Chart</h2>
                                    </div>
                                </div>

                                <div class=\"full graph_revenue\">
                                    <canvas height=\"120\" id=\"canvas\"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Section psychologie -->
<style>
.psychology-section{
    margin-top: 30px;
}

.psychology-card{
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 8px 20px rgba(0,0,0,0.12);
    transition: 0.3s;
    margin-bottom: 25px;
}

.psychology-card:hover{
    transform: translateY(-8px);
    box-shadow: 0 12px 25px rgba(0,0,0,0.18);
}

.psychology-card img{
    width: 100%;
    height: 220px;
    object-fit: cover;
}

.psychology-content{
    padding: 20px;
}

.psychology-content h4{
    font-size: 20px;
    font-weight: bold;
    color: #333;
}

.psychology-content p{
    color: #777;
    font-size: 15px;
}
</style>

<div class=\"psychology-section\">
    <div class=\"row\">

        <div class=\"col-md-4\">
            <div class=\"psychology-card\">
                <img src=\"{{ asset('img/event-33.jpg') }}\" alt=\"meditation\">
                <div class=\"psychology-content\">
                    <h4>Bien-être mental</h4>
                    <p>Suivez l’évolution émotionnelle des utilisateurs et leur équilibre psychologique.</p>
                </div>
            </div>
        </div>

        <div class=\"col-md-4\">
            <div class=\"psychology-card\">
                <img src=\"{{ asset('img/event-22.jpg') }}\" alt=\"support\">
                <div class=\"psychology-content\">
                    <h4>Accompagnement</h4>
                    <p>Visualisez le suivi personnel et les rendez-vous psychologiques.</p>
                </div>
            </div>
        </div>

        <div class=\"col-md-4\">
            <div class=\"psychology-card\">
                <img src=\"{{ asset('img/Anasayfa.jpg') }}\" alt=\"motivation\">
                <div class=\"psychology-content\">
                    <h4>Motivation</h4>
                    <p>Encouragez les utilisateurs avec du contenu positif et des tests adaptés.</p>
                </div>
            </div>
        </div>

    </div>
</div>

                <!-- Footer -->
                <div class=\"container-fluid\">
                    <div style=\"
    background: linear-gradient(135deg, #f5f0fb, #bdabb8);
    color: white;
    padding: 20px;
    border-radius: 18px;
    text-align: center;
    font-size: 18px;
    font-weight: 500;
    margin-top: 20px;
    box-shadow: 0 8px 20px rgba(0,0,0,0.12);
\">
    🧠 Prenez soin de votre santé mentale chaque jour 💙  
    🌿 Un esprit apaisé mène à une vie équilibrée ✨  
    😊 Chaque petit progrès compte !
</div>
                </div>
            </div>

        </div>
    </div>
</div>
{% endblock %}", "back/dashboard.html.twig", "C:\\Users\\DELL\\Downloads\\psy\\templates\\back\\dashboard.html.twig");
    }
}
