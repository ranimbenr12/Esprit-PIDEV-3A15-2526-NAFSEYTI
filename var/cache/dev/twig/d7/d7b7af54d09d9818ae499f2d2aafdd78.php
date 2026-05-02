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

/* back/admin_base.html.twig */
class __TwigTemplate_119db9cc040abf48bb977807caf7eaf1 extends Template
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
            'body' => [$this, 'block_body'],
            'dashboard_active' => [$this, 'block_dashboard_active'],
            'test_active' => [$this, 'block_test_active'],
            'question_active' => [$this, 'block_question_active'],
            'alertes_active' => [$this, 'block_alertes_active'],
            'admin_content' => [$this, 'block_admin_content'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/admin_base.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/admin_base.html.twig"));

        $this->parent = $this->load("back/base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
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

        // line 4
        yield "<div class=\"full_container\">
    <div class=\"inner_container\">

        <!-- Sidebar -->
        <nav id=\"sidebar\">
            <div class=\"sidebar_blog_1\">
                <div class=\"sidebar-header\">
                    <div class=\"logo_section\">
                        <a href=\"";
        // line 12
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_dashboard");
        yield "\">
                            <img class=\"logo_icon img-responsive\"
                                 src=\"";
        // line 14
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
        // line 25
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("back/images/layout_img/user_img.jpg"), "html", null, true);
        yield "\"
                                alt=\"user\"
                                style=\"width:70px; height:70px; border-radius:50%; object-fit:cover; border:3px solid #3c943c; display:block; margin:0 auto 10px auto;\">
                        </div>
                        <div class=\"user_info\" style=\"text-align:center;\">
                            <h6 style=\"color:white; font-size:0.95rem; font-weight:600; margin-bottom:4px;\">
                                ";
        // line 31
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 31, $this->source); })()), "user", [], "any", false, false, false, 31), "firstname", [], "any", false, false, false, 31), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 31, $this->source); })()), "user", [], "any", false, false, false, 31), "lastname", [], "any", false, false, false, 31), "html", null, true);
        yield "
                            </h6>
                            <p style=\"margin:0;\">
                                <span class=\"online_animation\"></span> en_ligne
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class=\"sidebar_blog_2\">
                <h4></h4>
                <ul class=\"list-unstyled components\">
                    <li class=\"";
        // line 44
        yield from $this->unwrap()->yieldBlock('dashboard_active', $context, $blocks);
        yield "\">
                        <a href=\"";
        // line 45
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_dashboard");
        yield "\">
                            <i class=\"fa fa-dashboard yellow_color\"></i>
                            <span>Tableau de bord</span>
                        </a>
                    </li>

                    <li>
                        <a href=\"#\">
                            <i class=\"fa fa-users blue1_color\"></i>
                            <span>Utilisateurs</span>
                        </a>
                    </li>

                    <li>
                        <a href=\"#\">
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

                    <li class=\"";
        // line 72
        yield from $this->unwrap()->yieldBlock('test_active', $context, $blocks);
        yield "\">
                        <a href=\"";
        // line 73
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_test_index");
        yield "\">
                            <i class=\"fa fa-check-square green_color\"></i>
                            <span>Tests</span>
                        </a>
                    </li>

                    <li class=\"";
        // line 79
        yield from $this->unwrap()->yieldBlock('question_active', $context, $blocks);
        yield "\">
                        <a href=\"";
        // line 80
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_question_index");
        yield "\">
                            <i class=\"fa fa-question-circle blue1_color\"></i>
                            <span>Questions</span>
                        </a>
                    </li>

                    <!-- 🔴 NOUVEAU LIEN ALERTES DANS LA SIDEBAR -->
                    <li class=\"";
        // line 87
        yield from $this->unwrap()->yieldBlock('alertes_active', $context, $blocks);
        yield "\">
                        <a href=\"";
        // line 88
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_alertes_index");
        yield "\" style=\"background: #dc3545; color: white; border-radius: 5px;\">
                            <i class=\"fa fa-exclamation-triangle\" style=\"color: white;\"></i>
                            <span>🚨 Alertes critiques</span>
                            ";
        // line 91
        if ((array_key_exists("nb_nouvelles_alertes", $context) && ((isset($context["nb_nouvelles_alertes"]) || array_key_exists("nb_nouvelles_alertes", $context) ? $context["nb_nouvelles_alertes"] : (function () { throw new RuntimeError('Variable "nb_nouvelles_alertes" does not exist.', 91, $this->source); })()) > 0))) {
            // line 92
            yield "                                <span class=\"badge badge-light\" style=\"float: right; background: white; color: #dc3545; border-radius: 50%; padding: 3px 8px;\">
                                    ";
            // line 93
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["nb_nouvelles_alertes"]) || array_key_exists("nb_nouvelles_alertes", $context) ? $context["nb_nouvelles_alertes"] : (function () { throw new RuntimeError('Variable "nb_nouvelles_alertes" does not exist.', 93, $this->source); })()), "html", null, true);
            yield "
                                </span>
                            ";
        }
        // line 96
        yield "                        </a>
                    </li>

                    <li>
                        <a href=\"#\">
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
        // line 127
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_dashboard");
        yield "\" style=\"display: flex; align-items: center; text-decoration: none;\">
                                <img class=\"img-responsive\"
                                     src=\"";
        // line 129
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("back/images/logo/logo1.png"), "html", null, true);
        yield "\"
                                     alt=\"logo\"
                                     style=\"width: 40px; height: 40px; margin-right: 10px;\" />
                                <span style=\"font-size: 20px; font-weight: bold; color: #3c943c;\">
                                    Nafseyti
                                </span>
                            </a>
                        </div>
                        <div class=\"right_topbar\">
                            <div class=\"icon_info\">
                                <!-- 🔴 BOUTON ALERTES DANS LA TOPBAR (en icône) -->
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
        // line 151
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("back/images/layout_img/user_img.jpg"), "html", null, true);
        yield "\" 
                                                 alt=\"#\" />
                                            <span class=\"name_user\">";
        // line 153
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 153, $this->source); })()), "user", [], "any", false, false, false, 153)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, Twig\Extension\CoreExtension::split($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 153, $this->source); })()), "user", [], "any", false, false, false, 153), "email", [], "any", false, false, false, 153), "@"), 0, [], "array", false, false, false, 153), "html", null, true)) : ("Admin"));
        yield "</span>
                                        </a>
                                        <div class=\"dropdown-menu\">
                                            <a class=\"dropdown-item\" href=\"#\">Mon profil</a>
                                            <a class=\"dropdown-item\" href=\"#\">Paramètres</a>
                                            <a class=\"dropdown-item\" href=\"#\">Aide</a>
                                            <a class=\"dropdown-item\" href=\"";
        // line 159
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_logout");
        yield "\">
                                                <span>Déconnexion</span> <i class=\"fa fa-sign-out\"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
<script>
// Rafraîchit le compteur après chaque action
document.addEventListener('DOMContentLoaded', function() {
    const countSpan = document.getElementById('alertes-count');
    if (countSpan && window.location.search.includes('refresh')) {
        fetch('";
        // line 175
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_alertes_count");
        yield "')
            .then(r => r.json())
            .then(d => { countSpan.textContent = d.count; });
    }
});
</script>
            <!-- Messages Flash -->
            <div class=\"midde_cont\">
                <div class=\"container-fluid\">
                    ";
        // line 184
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 184, $this->source); })()), "flashes", [], "any", false, false, false, 184));
        foreach ($context['_seq'] as $context["label"] => $context["messages"]) {
            // line 185
            yield "                        ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable($context["messages"]);
            foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                // line 186
                yield "                            <div class=\"alert alert-";
                yield ((($context["label"] == "error")) ? ("danger") : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["label"], "html", null, true)));
                yield " alert-dismissible fade show\" role=\"alert\">
                                ";
                // line 187
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
                yield "
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                    <span aria-hidden=\"true\">&times;</span>
                                </button>
                            </div>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 193
            yield "                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['label'], $context['messages'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 194
        yield "                    
                    ";
        // line 195
        yield from $this->unwrap()->yieldBlock('admin_content', $context, $blocks);
        // line 196
        yield "                </div>
            </div>

        </div>
    </div>
</div>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 44
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_dashboard_active(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "dashboard_active"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "dashboard_active"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 72
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_test_active(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "test_active"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "test_active"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 79
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_question_active(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "question_active"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "question_active"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 87
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_alertes_active(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "alertes_active"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "alertes_active"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 195
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_admin_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_content"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "admin_content"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "back/admin_base.html.twig";
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
        return array (  469 => 195,  447 => 87,  425 => 79,  403 => 72,  381 => 44,  364 => 196,  362 => 195,  359 => 194,  353 => 193,  341 => 187,  336 => 186,  331 => 185,  327 => 184,  315 => 175,  296 => 159,  287 => 153,  282 => 151,  257 => 129,  252 => 127,  219 => 96,  213 => 93,  210 => 92,  208 => 91,  202 => 88,  198 => 87,  188 => 80,  184 => 79,  175 => 73,  171 => 72,  141 => 45,  137 => 44,  119 => 31,  110 => 25,  96 => 14,  91 => 12,  81 => 4,  68 => 3,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'back/base.html.twig' %}

{% block body %}
<div class=\"full_container\">
    <div class=\"inner_container\">

        <!-- Sidebar -->
        <nav id=\"sidebar\">
            <div class=\"sidebar_blog_1\">
                <div class=\"sidebar-header\">
                    <div class=\"logo_section\">
                        <a href=\"{{ path('app_dashboard') }}\">
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
                                <span class=\"online_animation\"></span> en_ligne
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <div class=\"sidebar_blog_2\">
                <h4></h4>
                <ul class=\"list-unstyled components\">
                    <li class=\"{% block dashboard_active %}{% endblock %}\">
                        <a href=\"{{ path('app_dashboard') }}\">
                            <i class=\"fa fa-dashboard yellow_color\"></i>
                            <span>Tableau de bord</span>
                        </a>
                    </li>

                    <li>
                        <a href=\"#\">
                            <i class=\"fa fa-users blue1_color\"></i>
                            <span>Utilisateurs</span>
                        </a>
                    </li>

                    <li>
                        <a href=\"#\">
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

                    <li class=\"{% block test_active %}{% endblock %}\">
                        <a href=\"{{ path('app_test_index') }}\">
                            <i class=\"fa fa-check-square green_color\"></i>
                            <span>Tests</span>
                        </a>
                    </li>

                    <li class=\"{% block question_active %}{% endblock %}\">
                        <a href=\"{{ path('app_question_index') }}\">
                            <i class=\"fa fa-question-circle blue1_color\"></i>
                            <span>Questions</span>
                        </a>
                    </li>

                    <!-- 🔴 NOUVEAU LIEN ALERTES DANS LA SIDEBAR -->
                    <li class=\"{% block alertes_active %}{% endblock %}\">
                        <a href=\"{{ path('admin_alertes_index') }}\" style=\"background: #dc3545; color: white; border-radius: 5px;\">
                            <i class=\"fa fa-exclamation-triangle\" style=\"color: white;\"></i>
                            <span>🚨 Alertes critiques</span>
                            {% if nb_nouvelles_alertes is defined and nb_nouvelles_alertes > 0 %}
                                <span class=\"badge badge-light\" style=\"float: right; background: white; color: #dc3545; border-radius: 50%; padding: 3px 8px;\">
                                    {{ nb_nouvelles_alertes }}
                                </span>
                            {% endif %}
                        </a>
                    </li>

                    <li>
                        <a href=\"#\">
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
                            <a href=\"{{ path('app_dashboard') }}\" style=\"display: flex; align-items: center; text-decoration: none;\">
                                <img class=\"img-responsive\"
                                     src=\"{{ asset('back/images/logo/logo1.png') }}\"
                                     alt=\"logo\"
                                     style=\"width: 40px; height: 40px; margin-right: 10px;\" />
                                <span style=\"font-size: 20px; font-weight: bold; color: #3c943c;\">
                                    Nafseyti
                                </span>
                            </a>
                        </div>
                        <div class=\"right_topbar\">
                            <div class=\"icon_info\">
                                <!-- 🔴 BOUTON ALERTES DANS LA TOPBAR (en icône) -->
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
                                                 alt=\"#\" />
                                            <span class=\"name_user\">{{ app.user ? app.user.email|split('@')[0] : 'Admin' }}</span>
                                        </a>
                                        <div class=\"dropdown-menu\">
                                            <a class=\"dropdown-item\" href=\"#\">Mon profil</a>
                                            <a class=\"dropdown-item\" href=\"#\">Paramètres</a>
                                            <a class=\"dropdown-item\" href=\"#\">Aide</a>
                                            <a class=\"dropdown-item\" href=\"{{ path('app_logout') }}\">
                                                <span>Déconnexion</span> <i class=\"fa fa-sign-out\"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
<script>
// Rafraîchit le compteur après chaque action
document.addEventListener('DOMContentLoaded', function() {
    const countSpan = document.getElementById('alertes-count');
    if (countSpan && window.location.search.includes('refresh')) {
        fetch('{{ path('admin_alertes_count') }}')
            .then(r => r.json())
            .then(d => { countSpan.textContent = d.count; });
    }
});
</script>
            <!-- Messages Flash -->
            <div class=\"midde_cont\">
                <div class=\"container-fluid\">
                    {% for label, messages in app.flashes %}
                        {% for message in messages %}
                            <div class=\"alert alert-{{ label == 'error' ? 'danger' : label }} alert-dismissible fade show\" role=\"alert\">
                                {{ message }}
                                <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                                    <span aria-hidden=\"true\">&times;</span>
                                </button>
                            </div>
                        {% endfor %}
                    {% endfor %}
                    
                    {% block admin_content %}{% endblock %}
                </div>
            </div>

        </div>
    </div>
</div>
{% endblock %}", "back/admin_base.html.twig", "C:\\Users\\sirine\\psy\\templates\\back\\admin_base.html.twig");
    }
}
