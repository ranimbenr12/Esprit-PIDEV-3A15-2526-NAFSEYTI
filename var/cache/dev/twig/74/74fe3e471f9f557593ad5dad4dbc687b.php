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

/* back/profile.html.twig */
class __TwigTemplate_0a75a9943be59050aeb06a5760a6d5bc extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/profile.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/profile.html.twig"));

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

        yield "Mon Profil — Nafseyti Admin";
        
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
                        <a href=\"";
        // line 14
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_dashboard");
        yield "\">
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
                            ";
        // line 25
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 25, $this->source); })()), "user", [], "any", false, false, false, 25), "profile_photo", [], "any", false, false, false, 25)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 26
            yield "                                <img class=\"img-responsive\"
                                     src=\"";
            // line 27
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 27, $this->source); })()), "user", [], "any", false, false, false, 27), "profile_photo", [], "any", false, false, false, 27)), "html", null, true);
            yield "\"
                                     alt=\"user\"
                                     style=\"width:70px; height:70px; border-radius:50%; object-fit:cover; border:3px solid #3c943c; display:block; margin:0 auto 10px auto;\">
                            ";
        } else {
            // line 31
            yield "                                <div style=\"width:70px; height:70px; background:#3c943c; border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 10px auto;\">
                                    <i class=\"fa fa-user\" style=\"color:white; font-size:1.8rem;\"></i>
                                </div>
                            ";
        }
        // line 35
        yield "                        </div>
                        <div class=\"user_info\" style=\"text-align:center;\">
                            <h6 style=\"color:white; font-size:0.95rem; font-weight:600; margin-bottom:4px;\">
                                ";
        // line 38
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 38, $this->source); })()), "user", [], "any", false, false, false, 38), "firstname", [], "any", false, false, false, 38), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 38, $this->source); })()), "user", [], "any", false, false, false, 38), "lastname", [], "any", false, false, false, 38), "html", null, true);
        yield "
                            </h6>
                            <p style=\"margin:0;\"><span class=\"online_animation\"></span> En ligne</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"sidebar_blog_2\">
                <ul class=\"list-unstyled components\">
                    <li>
                        <a href=\"";
        // line 48
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_dashboard");
        yield "\">
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
                    <li>
                        <a href=\"#\">
                            <i class=\"fa fa-check-square green_color\"></i>
                            <span>Tests</span>
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
                            <a href=\"";
        // line 104
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_dashboard");
        yield "\" style=\"display:flex; align-items:center; text-decoration:none;\">
                                <img class=\"img-responsive\"
                                     src=\"";
        // line 106
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("back/images/logo/logo1.png"), "html", null, true);
        yield "\"
                                     alt=\"logo\"
                                     style=\"width:40px; height:40px; margin-right:10px;\" />
                                <span style=\"font-size:20px; font-weight:bold; color:#3c943c;\">Nafseyti</span>
                            </a>
                        </div>
                        <div class=\"right_topbar\">
                            <div class=\"icon_info\">
                                <ul class=\"user_profile_dd\">
                                    <li>
                                        <a class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                                            ";
        // line 117
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 117, $this->source); })()), "user", [], "any", false, false, false, 117), "profile_photo", [], "any", false, false, false, 117)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 118
            yield "                                                <img class=\"img-responsive rounded-circle\"
                                                     src=\"";
            // line 119
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 119, $this->source); })()), "user", [], "any", false, false, false, 119), "profile_photo", [], "any", false, false, false, 119)), "html", null, true);
            yield "\"
                                                     alt=\"#\"
                                                     style=\"width:35px; height:35px; object-fit:cover;\">
                                            ";
        } else {
            // line 123
            yield "                                                <div style=\"width:35px; height:35px; background:#3c943c; border-radius:50%; display:inline-flex; align-items:center; justify-content:center; vertical-align:middle;\">
                                                    <i class=\"fa fa-user\" style=\"color:white; font-size:1rem;\"></i>
                                                </div>
                                            ";
        }
        // line 127
        yield "                                            <span class=\"name_user\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 127, $this->source); })()), "user", [], "any", false, false, false, 127), "firstname", [], "any", false, false, false, 127), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 127, $this->source); })()), "user", [], "any", false, false, false, 127), "lastname", [], "any", false, false, false, 127), "html", null, true);
        yield "</span>
                                        </a>
                                        <div class=\"dropdown-menu\">
                                            <a class=\"dropdown-item\" href=\"";
        // line 130
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_profile");
        yield "\">
                                                <i class=\"fa fa-user\"></i> Mon Profil
                                            </a>
                                            <div class=\"dropdown-divider\"></div>
                                            <a class=\"dropdown-item\" href=\"";
        // line 134
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

            <!-- Profile Content -->
            <div class=\"midde_cont\">
                <div class=\"container-fluid\">

                    <div class=\"row column_title\">
                        <div class=\"col-md-12\">
                            <div class=\"page_title\">
                                <h2>Mon Profil</h2>
                            </div>
                        </div>
                    </div>

                    ";
        // line 158
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 158, $this->source); })()), "flashes", ["success"], "method", false, false, false, 158));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 159
            yield "                        <div class=\"alert alert-success\">✅ ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 161
        yield "                    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 161, $this->source); })()), "flashes", ["error"], "method", false, false, false, 161));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 162
            yield "                        <div class=\"alert alert-danger\">⚠️ ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 164
        yield "
                    <div class=\"row\">
                        <div class=\"col-md-8 col-md-offset-2\">
                            <div class=\"white_shd full\" style=\"overflow:hidden;\">

                                <!-- Header -->
                                <div style=\"background:linear-gradient(135deg, #2d5016, #3c943c); padding:40px; text-align:center;\">
                                    ";
        // line 171
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 171, $this->source); })()), "profile_photo", [], "any", false, false, false, 171)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 172
            yield "                                        <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 172, $this->source); })()), "profile_photo", [], "any", false, false, false, 172)), "html", null, true);
            yield "\"
                                             style=\"width:100px; height:100px; border-radius:50%; object-fit:cover; border:4px solid rgba(255,255,255,0.4); margin-bottom:16px;\">
                                    ";
        } else {
            // line 175
            yield "                                        <div style=\"width:100px; height:100px; background:rgba(255,255,255,0.2); border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 16px;\">
                                            <i class=\"fa fa-user\" style=\"font-size:3rem; color:white;\"></i>
                                        </div>
                                    ";
        }
        // line 179
        yield "                                    <h3 style=\"color:white; margin-bottom:8px;\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 179, $this->source); })()), "firstname", [], "any", false, false, false, 179), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 179, $this->source); })()), "lastname", [], "any", false, false, false, 179), "html", null, true);
        yield "</h3>
                                    <span style=\"background:rgba(255,255,255,0.2); color:white; padding:4px 16px; border-radius:100px; font-size:0.8rem; text-transform:uppercase; letter-spacing:2px;\">
                                        ";
        // line 181
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 181, $this->source); })()), "role", [], "any", false, false, false, 181), "html", null, true);
        yield "
                                    </span>
                                </div>

                                <!-- Info -->
                                <div style=\"padding:32px;\">
                                    <div class=\"row\">
                                        <div class=\"col-md-6\" style=\"margin-bottom:20px;\">
                                            <div style=\"font-size:0.7rem; text-transform:uppercase; letter-spacing:2px; color:#999; margin-bottom:6px;\">Email</div>
                                            <div style=\"font-size:1rem; color:#333; font-weight:500;\">";
        // line 190
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 190, $this->source); })()), "email", [], "any", false, false, false, 190), "html", null, true);
        yield "</div>
                                        </div>
                                        <div class=\"col-md-6\" style=\"margin-bottom:20px;\">
                                            <div style=\"font-size:0.7rem; text-transform:uppercase; letter-spacing:2px; color:#999; margin-bottom:6px;\">Téléphone</div>
                                            <div style=\"font-size:1rem; color:#333; font-weight:500;\">";
        // line 194
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "phone_number", [], "any", true, true, false, 194) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 194, $this->source); })()), "phone_number", [], "any", false, false, false, 194)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 194, $this->source); })()), "phone_number", [], "any", false, false, false, 194), "html", null, true)) : ("—"));
        yield "</div>
                                        </div>
                                        <div class=\"col-md-6\" style=\"margin-bottom:20px;\">
                                            <div style=\"font-size:0.7rem; text-transform:uppercase; letter-spacing:2px; color:#999; margin-bottom:6px;\">Adresse</div>
                                            <div style=\"font-size:1rem; color:#333; font-weight:500;\">";
        // line 198
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "address", [], "any", true, true, false, 198) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 198, $this->source); })()), "address", [], "any", false, false, false, 198)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 198, $this->source); })()), "address", [], "any", false, false, false, 198), "html", null, true)) : ("—"));
        yield "</div>
                                        </div>
                                        <div class=\"col-md-6\" style=\"margin-bottom:20px;\">
                                            <div style=\"font-size:0.7rem; text-transform:uppercase; letter-spacing:2px; color:#999; margin-bottom:6px;\">Localisation</div>
                                            <div style=\"font-size:1rem; color:#333; font-weight:500;\">";
        // line 202
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "location", [], "any", true, true, false, 202) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 202, $this->source); })()), "location", [], "any", false, false, false, 202)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 202, $this->source); })()), "location", [], "any", false, false, false, 202), "html", null, true)) : ("—"));
        yield "</div>
                                        </div>
                                        <div class=\"col-md-6\" style=\"margin-bottom:20px;\">
                                            <div style=\"font-size:0.7rem; text-transform:uppercase; letter-spacing:2px; color:#999; margin-bottom:6px;\">Statut</div>
                                            <div style=\"font-size:1rem; color:#333; font-weight:500;\">";
        // line 206
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 206, $this->source); })()), "status", [], "any", false, false, false, 206), "html", null, true);
        yield "</div>
                                        </div>
                                        <div class=\"col-md-6\" style=\"margin-bottom:20px;\">
                                            <div style=\"font-size:0.7rem; text-transform:uppercase; letter-spacing:2px; color:#999; margin-bottom:6px;\">Membre depuis</div>
                                            <div style=\"font-size:1rem; color:#333; font-weight:500;\">";
        // line 210
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 210, $this->source); })()), "created_at", [], "any", false, false, false, 210), "d/m/Y"), "html", null, true);
        yield "</div>
                                        </div>
                                    </div>

                                    <!-- Button -->
                                    <div style=\"margin-top:16px;\">
                                        <a href=\"";
        // line 216
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile_edit");
        yield "\"
                                           style=\"display:inline-block; padding:12px 28px; background:#3c943c; color:white; border-radius:8px; text-decoration:none; font-weight:600;\">
                                            ✏️ Modifier le profil
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
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
        return "back/profile.html.twig";
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
        return array (  422 => 216,  413 => 210,  406 => 206,  399 => 202,  392 => 198,  385 => 194,  378 => 190,  366 => 181,  358 => 179,  352 => 175,  345 => 172,  343 => 171,  334 => 164,  325 => 162,  320 => 161,  311 => 159,  307 => 158,  280 => 134,  273 => 130,  264 => 127,  258 => 123,  251 => 119,  248 => 118,  246 => 117,  232 => 106,  227 => 104,  174 => 54,  165 => 48,  150 => 38,  145 => 35,  139 => 31,  132 => 27,  129 => 26,  127 => 25,  115 => 16,  110 => 14,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'back/base.html.twig' %}

{% block title %}Mon Profil — Nafseyti Admin{% endblock %}

{% block body %}
<div class=\"full_container\">
    <div class=\"inner_container\">

        <!-- Sidebar -->
        <nav id=\"sidebar\">
            <div class=\"sidebar_blog_1\">
                <div class=\"sidebar-header\">
                    <div class=\"logo_section\">
                        <a href=\"{{ path('admin_dashboard') }}\">
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
                            {% if app.user.profile_photo %}
                                <img class=\"img-responsive\"
                                     src=\"{{ asset(app.user.profile_photo) }}\"
                                     alt=\"user\"
                                     style=\"width:70px; height:70px; border-radius:50%; object-fit:cover; border:3px solid #3c943c; display:block; margin:0 auto 10px auto;\">
                            {% else %}
                                <div style=\"width:70px; height:70px; background:#3c943c; border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 10px auto;\">
                                    <i class=\"fa fa-user\" style=\"color:white; font-size:1.8rem;\"></i>
                                </div>
                            {% endif %}
                        </div>
                        <div class=\"user_info\" style=\"text-align:center;\">
                            <h6 style=\"color:white; font-size:0.95rem; font-weight:600; margin-bottom:4px;\">
                                {{ app.user.firstname }} {{ app.user.lastname }}
                            </h6>
                            <p style=\"margin:0;\"><span class=\"online_animation\"></span> En ligne</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"sidebar_blog_2\">
                <ul class=\"list-unstyled components\">
                    <li>
                        <a href=\"{{ path('admin_dashboard') }}\">
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
                    <li>
                        <a href=\"#\">
                            <i class=\"fa fa-check-square green_color\"></i>
                            <span>Tests</span>
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
                            <a href=\"{{ path('admin_dashboard') }}\" style=\"display:flex; align-items:center; text-decoration:none;\">
                                <img class=\"img-responsive\"
                                     src=\"{{ asset('back/images/logo/logo1.png') }}\"
                                     alt=\"logo\"
                                     style=\"width:40px; height:40px; margin-right:10px;\" />
                                <span style=\"font-size:20px; font-weight:bold; color:#3c943c;\">Nafseyti</span>
                            </a>
                        </div>
                        <div class=\"right_topbar\">
                            <div class=\"icon_info\">
                                <ul class=\"user_profile_dd\">
                                    <li>
                                        <a class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                                            {% if app.user.profile_photo %}
                                                <img class=\"img-responsive rounded-circle\"
                                                     src=\"{{ asset(app.user.profile_photo) }}\"
                                                     alt=\"#\"
                                                     style=\"width:35px; height:35px; object-fit:cover;\">
                                            {% else %}
                                                <div style=\"width:35px; height:35px; background:#3c943c; border-radius:50%; display:inline-flex; align-items:center; justify-content:center; vertical-align:middle;\">
                                                    <i class=\"fa fa-user\" style=\"color:white; font-size:1rem;\"></i>
                                                </div>
                                            {% endif %}
                                            <span class=\"name_user\">{{ app.user.firstname }} {{ app.user.lastname }}</span>
                                        </a>
                                        <div class=\"dropdown-menu\">
                                            <a class=\"dropdown-item\" href=\"{{ path('admin_profile') }}\">
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

            <!-- Profile Content -->
            <div class=\"midde_cont\">
                <div class=\"container-fluid\">

                    <div class=\"row column_title\">
                        <div class=\"col-md-12\">
                            <div class=\"page_title\">
                                <h2>Mon Profil</h2>
                            </div>
                        </div>
                    </div>

                    {% for message in app.flashes('success') %}
                        <div class=\"alert alert-success\">✅ {{ message }}</div>
                    {% endfor %}
                    {% for message in app.flashes('error') %}
                        <div class=\"alert alert-danger\">⚠️ {{ message }}</div>
                    {% endfor %}

                    <div class=\"row\">
                        <div class=\"col-md-8 col-md-offset-2\">
                            <div class=\"white_shd full\" style=\"overflow:hidden;\">

                                <!-- Header -->
                                <div style=\"background:linear-gradient(135deg, #2d5016, #3c943c); padding:40px; text-align:center;\">
                                    {% if user.profile_photo %}
                                        <img src=\"{{ asset(user.profile_photo) }}\"
                                             style=\"width:100px; height:100px; border-radius:50%; object-fit:cover; border:4px solid rgba(255,255,255,0.4); margin-bottom:16px;\">
                                    {% else %}
                                        <div style=\"width:100px; height:100px; background:rgba(255,255,255,0.2); border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 16px;\">
                                            <i class=\"fa fa-user\" style=\"font-size:3rem; color:white;\"></i>
                                        </div>
                                    {% endif %}
                                    <h3 style=\"color:white; margin-bottom:8px;\">{{ user.firstname }} {{ user.lastname }}</h3>
                                    <span style=\"background:rgba(255,255,255,0.2); color:white; padding:4px 16px; border-radius:100px; font-size:0.8rem; text-transform:uppercase; letter-spacing:2px;\">
                                        {{ user.role }}
                                    </span>
                                </div>

                                <!-- Info -->
                                <div style=\"padding:32px;\">
                                    <div class=\"row\">
                                        <div class=\"col-md-6\" style=\"margin-bottom:20px;\">
                                            <div style=\"font-size:0.7rem; text-transform:uppercase; letter-spacing:2px; color:#999; margin-bottom:6px;\">Email</div>
                                            <div style=\"font-size:1rem; color:#333; font-weight:500;\">{{ user.email }}</div>
                                        </div>
                                        <div class=\"col-md-6\" style=\"margin-bottom:20px;\">
                                            <div style=\"font-size:0.7rem; text-transform:uppercase; letter-spacing:2px; color:#999; margin-bottom:6px;\">Téléphone</div>
                                            <div style=\"font-size:1rem; color:#333; font-weight:500;\">{{ user.phone_number ?? '—' }}</div>
                                        </div>
                                        <div class=\"col-md-6\" style=\"margin-bottom:20px;\">
                                            <div style=\"font-size:0.7rem; text-transform:uppercase; letter-spacing:2px; color:#999; margin-bottom:6px;\">Adresse</div>
                                            <div style=\"font-size:1rem; color:#333; font-weight:500;\">{{ user.address ?? '—' }}</div>
                                        </div>
                                        <div class=\"col-md-6\" style=\"margin-bottom:20px;\">
                                            <div style=\"font-size:0.7rem; text-transform:uppercase; letter-spacing:2px; color:#999; margin-bottom:6px;\">Localisation</div>
                                            <div style=\"font-size:1rem; color:#333; font-weight:500;\">{{ user.location ?? '—' }}</div>
                                        </div>
                                        <div class=\"col-md-6\" style=\"margin-bottom:20px;\">
                                            <div style=\"font-size:0.7rem; text-transform:uppercase; letter-spacing:2px; color:#999; margin-bottom:6px;\">Statut</div>
                                            <div style=\"font-size:1rem; color:#333; font-weight:500;\">{{ user.status }}</div>
                                        </div>
                                        <div class=\"col-md-6\" style=\"margin-bottom:20px;\">
                                            <div style=\"font-size:0.7rem; text-transform:uppercase; letter-spacing:2px; color:#999; margin-bottom:6px;\">Membre depuis</div>
                                            <div style=\"font-size:1rem; color:#333; font-weight:500;\">{{ user.created_at|date('d/m/Y') }}</div>
                                        </div>
                                    </div>

                                    <!-- Button -->
                                    <div style=\"margin-top:16px;\">
                                        <a href=\"{{ path('app_profile_edit') }}\"
                                           style=\"display:inline-block; padding:12px 28px; background:#3c943c; color:white; border-radius:8px; text-decoration:none; font-weight:600;\">
                                            ✏️ Modifier le profil
                                        </a>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %}", "back/profile.html.twig", "C:\\Users\\sirine\\psy\\templates\\back\\profile.html.twig");
    }
}
