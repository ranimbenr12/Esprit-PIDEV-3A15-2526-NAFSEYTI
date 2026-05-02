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

/* back/edit_profile.html.twig */
class __TwigTemplate_8abdb6bc135a94ce301b73a98c5b3187 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/edit_profile.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/edit_profile.html.twig"));

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

        yield "Modifier mon profil — Nafseyti Admin";
        
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

            <!-- Edit Profile Content -->
            <div class=\"midde_cont\">
                <div class=\"container-fluid\">

                    <div class=\"row column_title\">
                        <div class=\"col-md-12\">
                            <div class=\"page_title\">
                                <h2>Modifier mon profil</h2>
                            </div>
                        </div>
                    </div>

                    ";
        // line 158
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 158, $this->source); })()), "flashes", ["error"], "method", false, false, false, 158));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 159
            yield "                        <div class=\"alert alert-danger\">⚠️ ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 161
        yield "
                    <div class=\"row\">
                        <div class=\"col-md-8 col-md-offset-2\">
                            <div class=\"white_shd full\" style=\"padding:32px;\">

                                <form method=\"post\" action=\"";
        // line 166
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile_edit");
        yield "\" enctype=\"multipart/form-data\">

                                    <!-- Profile Photo -->
                                    <div style=\"text-align:center; margin-bottom:32px;\">
                                        ";
        // line 170
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 170, $this->source); })()), "profile_photo", [], "any", false, false, false, 170)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 171
            yield "                                            <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 171, $this->source); })()), "profile_photo", [], "any", false, false, false, 171)), "html", null, true);
            yield "\" id=\"photoPreview\"
                                                 style=\"width:100px; height:100px; border-radius:50%; object-fit:cover; border:4px solid #3c943c; margin-bottom:12px;\">
                                        ";
        } else {
            // line 174
            yield "                                            <div id=\"photoPreviewDefault\" style=\"width:100px; height:100px; background:#3c943c; border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 12px;\">
                                                <i class=\"fa fa-user\" style=\"font-size:2.5rem; color:white;\"></i>
                                            </div>
                                            <img id=\"photoPreview\" style=\"display:none; width:100px; height:100px; border-radius:50%; object-fit:cover; border:4px solid #3c943c; margin-bottom:12px;\">
                                        ";
        }
        // line 179
        yield "                                        <div>
                                            <label for=\"profile_photo\"
                                                   style=\"cursor:pointer; background:#f5f5f5; color:#3c943c; padding:8px 20px; border-radius:8px; font-size:0.85rem; font-weight:600; border:1px solid #ddd;\">
                                                📷 Changer la photo
                                            </label>
                                            <input type=\"file\" name=\"profile_photo\" id=\"profile_photo\" accept=\"image/*\" style=\"display:none;\">
                                        </div>
                                    </div>

                                    <!-- Name -->
                                    <div class=\"row\">
                                        <div class=\"col-md-6\">
                                            <div style=\"margin-bottom:20px;\">
                                                <label style=\"display:block; font-weight:600; color:#333; margin-bottom:8px;\">Prénom</label>
                                                <input type=\"text\" name=\"firstname\" value=\"";
        // line 193
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 193, $this->source); })()), "firstname", [], "any", false, false, false, 193), "html", null, true);
        yield "\" required
                                                       style=\"width:100%; padding:10px 14px; border:1px solid #ddd; border-radius:8px; font-size:0.95rem; outline:none; box-sizing:border-box;\">
                                            </div>
                                        </div>
                                        <div class=\"col-md-6\">
                                            <div style=\"margin-bottom:20px;\">
                                                <label style=\"display:block; font-weight:600; color:#333; margin-bottom:8px;\">Nom</label>
                                                <input type=\"text\" name=\"lastname\" value=\"";
        // line 200
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 200, $this->source); })()), "lastname", [], "any", false, false, false, 200), "html", null, true);
        yield "\" required
                                                       style=\"width:100%; padding:10px 14px; border:1px solid #ddd; border-radius:8px; font-size:0.95rem; outline:none; box-sizing:border-box;\">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Phone -->
                                    <div style=\"margin-bottom:20px;\">
                                        <label style=\"display:block; font-weight:600; color:#333; margin-bottom:8px;\">Téléphone</label>
                                        <input type=\"text\" name=\"phone_number\" value=\"";
        // line 209
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 209, $this->source); })()), "phone_number", [], "any", false, false, false, 209), "html", null, true);
        yield "\"
                                               style=\"width:100%; padding:10px 14px; border:1px solid #ddd; border-radius:8px; font-size:0.95rem; outline:none; box-sizing:border-box;\"
                                               placeholder=\"+216 XX XXX XXX\">
                                    </div>

                                    <!-- Address -->
                                    <div style=\"margin-bottom:20px;\">
                                        <label style=\"display:block; font-weight:600; color:#333; margin-bottom:8px;\">Adresse</label>
                                        <input type=\"text\" name=\"address\" value=\"";
        // line 217
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 217, $this->source); })()), "address", [], "any", false, false, false, 217), "html", null, true);
        yield "\"
                                               style=\"width:100%; padding:10px 14px; border:1px solid #ddd; border-radius:8px; font-size:0.95rem; outline:none; box-sizing:border-box;\">
                                    </div>

                                    <!-- Location -->
                                    <div style=\"margin-bottom:28px;\">
                                        <label style=\"display:block; font-weight:600; color:#333; margin-bottom:8px;\">Localisation</label>
                                        <input type=\"text\" name=\"location\" value=\"";
        // line 224
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 224, $this->source); })()), "location", [], "any", false, false, false, 224), "html", null, true);
        yield "\"
                                               style=\"width:100%; padding:10px 14px; border:1px solid #ddd; border-radius:8px; font-size:0.95rem; outline:none; box-sizing:border-box;\">
                                    </div>

                                    <!-- Password section -->
                                    <div style=\"border-top:1px solid #f0f0f0; padding-top:24px; margin-bottom:28px;\">
                                        <h4 style=\"color:#333; margin-bottom:8px; font-size:1rem;\">🔒 Changer le mot de passe</h4>
                                        <p style=\"color:#999; font-size:0.85rem; margin-bottom:16px;\">Laissez vide si vous ne souhaitez pas changer votre mot de passe.</p>

                                        <div style=\"margin-bottom:16px;\">
                                            <label style=\"display:block; font-weight:600; color:#333; margin-bottom:8px;\">Mot de passe actuel</label>
                                            <div style=\"position:relative;\">
                                                <input type=\"password\" name=\"current_password\" id=\"current_password\"
                                                       style=\"width:100%; padding:10px 14px; padding-right:48px; border:1px solid #ddd; border-radius:8px; font-size:0.95rem; outline:none; box-sizing:border-box;\"
                                                       placeholder=\"••••••••\">
                                                <span onclick=\"togglePass('current_password', 'eye1')\"
                                                      style=\"position:absolute; right:14px; top:50%; transform:translateY(-50%); cursor:pointer; color:#999;\">
                                                    <i class=\"fa fa-eye\" id=\"eye1\"></i>
                                                </span>
                                            </div>
                                        </div>

                                        <div style=\"margin-bottom:16px;\">
                                            <label style=\"display:block; font-weight:600; color:#333; margin-bottom:8px;\">Nouveau mot de passe</label>
                                            <div style=\"position:relative;\">
                                                <input type=\"password\" name=\"new_password\" id=\"new_password\"
                                                       style=\"width:100%; padding:10px 14px; padding-right:48px; border:1px solid #ddd; border-radius:8px; font-size:0.95rem; outline:none; box-sizing:border-box;\"
                                                       placeholder=\"••••••••\">
                                                <span onclick=\"togglePass('new_password', 'eye2')\"
                                                      style=\"position:absolute; right:14px; top:50%; transform:translateY(-50%); cursor:pointer; color:#999;\">
                                                    <i class=\"fa fa-eye\" id=\"eye2\"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Submit -->
                                    <div style=\"display:flex; gap:12px;\">
                                        <button type=\"submit\"
                                                style=\"flex:1; padding:12px; background:#3c943c; color:white; border:none; border-radius:8px; font-size:0.95rem; font-weight:600; cursor:pointer;\">
                                            💾 Enregistrer
                                        </button>
                                        <a href=\"";
        // line 266
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_profile");
        yield "\"
                                           style=\"flex:1; text-align:center; padding:12px; background:#f0f0f0; color:#333; border-radius:8px; text-decoration:none; font-weight:600; font-size:0.95rem;\">
                                            Annuler
                                        </a>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
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
        return "back/edit_profile.html.twig";
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
        return array (  454 => 266,  409 => 224,  399 => 217,  388 => 209,  376 => 200,  366 => 193,  350 => 179,  343 => 174,  336 => 171,  334 => 170,  327 => 166,  320 => 161,  311 => 159,  307 => 158,  280 => 134,  273 => 130,  264 => 127,  258 => 123,  251 => 119,  248 => 118,  246 => 117,  232 => 106,  227 => 104,  174 => 54,  165 => 48,  150 => 38,  145 => 35,  139 => 31,  132 => 27,  129 => 26,  127 => 25,  115 => 16,  110 => 14,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'back/base.html.twig' %}

{% block title %}Modifier mon profil — Nafseyti Admin{% endblock %}

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

            <!-- Edit Profile Content -->
            <div class=\"midde_cont\">
                <div class=\"container-fluid\">

                    <div class=\"row column_title\">
                        <div class=\"col-md-12\">
                            <div class=\"page_title\">
                                <h2>Modifier mon profil</h2>
                            </div>
                        </div>
                    </div>

                    {% for message in app.flashes('error') %}
                        <div class=\"alert alert-danger\">⚠️ {{ message }}</div>
                    {% endfor %}

                    <div class=\"row\">
                        <div class=\"col-md-8 col-md-offset-2\">
                            <div class=\"white_shd full\" style=\"padding:32px;\">

                                <form method=\"post\" action=\"{{ path('app_profile_edit') }}\" enctype=\"multipart/form-data\">

                                    <!-- Profile Photo -->
                                    <div style=\"text-align:center; margin-bottom:32px;\">
                                        {% if user.profile_photo %}
                                            <img src=\"{{ asset(user.profile_photo) }}\" id=\"photoPreview\"
                                                 style=\"width:100px; height:100px; border-radius:50%; object-fit:cover; border:4px solid #3c943c; margin-bottom:12px;\">
                                        {% else %}
                                            <div id=\"photoPreviewDefault\" style=\"width:100px; height:100px; background:#3c943c; border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 12px;\">
                                                <i class=\"fa fa-user\" style=\"font-size:2.5rem; color:white;\"></i>
                                            </div>
                                            <img id=\"photoPreview\" style=\"display:none; width:100px; height:100px; border-radius:50%; object-fit:cover; border:4px solid #3c943c; margin-bottom:12px;\">
                                        {% endif %}
                                        <div>
                                            <label for=\"profile_photo\"
                                                   style=\"cursor:pointer; background:#f5f5f5; color:#3c943c; padding:8px 20px; border-radius:8px; font-size:0.85rem; font-weight:600; border:1px solid #ddd;\">
                                                📷 Changer la photo
                                            </label>
                                            <input type=\"file\" name=\"profile_photo\" id=\"profile_photo\" accept=\"image/*\" style=\"display:none;\">
                                        </div>
                                    </div>

                                    <!-- Name -->
                                    <div class=\"row\">
                                        <div class=\"col-md-6\">
                                            <div style=\"margin-bottom:20px;\">
                                                <label style=\"display:block; font-weight:600; color:#333; margin-bottom:8px;\">Prénom</label>
                                                <input type=\"text\" name=\"firstname\" value=\"{{ user.firstname }}\" required
                                                       style=\"width:100%; padding:10px 14px; border:1px solid #ddd; border-radius:8px; font-size:0.95rem; outline:none; box-sizing:border-box;\">
                                            </div>
                                        </div>
                                        <div class=\"col-md-6\">
                                            <div style=\"margin-bottom:20px;\">
                                                <label style=\"display:block; font-weight:600; color:#333; margin-bottom:8px;\">Nom</label>
                                                <input type=\"text\" name=\"lastname\" value=\"{{ user.lastname }}\" required
                                                       style=\"width:100%; padding:10px 14px; border:1px solid #ddd; border-radius:8px; font-size:0.95rem; outline:none; box-sizing:border-box;\">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Phone -->
                                    <div style=\"margin-bottom:20px;\">
                                        <label style=\"display:block; font-weight:600; color:#333; margin-bottom:8px;\">Téléphone</label>
                                        <input type=\"text\" name=\"phone_number\" value=\"{{ user.phone_number }}\"
                                               style=\"width:100%; padding:10px 14px; border:1px solid #ddd; border-radius:8px; font-size:0.95rem; outline:none; box-sizing:border-box;\"
                                               placeholder=\"+216 XX XXX XXX\">
                                    </div>

                                    <!-- Address -->
                                    <div style=\"margin-bottom:20px;\">
                                        <label style=\"display:block; font-weight:600; color:#333; margin-bottom:8px;\">Adresse</label>
                                        <input type=\"text\" name=\"address\" value=\"{{ user.address }}\"
                                               style=\"width:100%; padding:10px 14px; border:1px solid #ddd; border-radius:8px; font-size:0.95rem; outline:none; box-sizing:border-box;\">
                                    </div>

                                    <!-- Location -->
                                    <div style=\"margin-bottom:28px;\">
                                        <label style=\"display:block; font-weight:600; color:#333; margin-bottom:8px;\">Localisation</label>
                                        <input type=\"text\" name=\"location\" value=\"{{ user.location }}\"
                                               style=\"width:100%; padding:10px 14px; border:1px solid #ddd; border-radius:8px; font-size:0.95rem; outline:none; box-sizing:border-box;\">
                                    </div>

                                    <!-- Password section -->
                                    <div style=\"border-top:1px solid #f0f0f0; padding-top:24px; margin-bottom:28px;\">
                                        <h4 style=\"color:#333; margin-bottom:8px; font-size:1rem;\">🔒 Changer le mot de passe</h4>
                                        <p style=\"color:#999; font-size:0.85rem; margin-bottom:16px;\">Laissez vide si vous ne souhaitez pas changer votre mot de passe.</p>

                                        <div style=\"margin-bottom:16px;\">
                                            <label style=\"display:block; font-weight:600; color:#333; margin-bottom:8px;\">Mot de passe actuel</label>
                                            <div style=\"position:relative;\">
                                                <input type=\"password\" name=\"current_password\" id=\"current_password\"
                                                       style=\"width:100%; padding:10px 14px; padding-right:48px; border:1px solid #ddd; border-radius:8px; font-size:0.95rem; outline:none; box-sizing:border-box;\"
                                                       placeholder=\"••••••••\">
                                                <span onclick=\"togglePass('current_password', 'eye1')\"
                                                      style=\"position:absolute; right:14px; top:50%; transform:translateY(-50%); cursor:pointer; color:#999;\">
                                                    <i class=\"fa fa-eye\" id=\"eye1\"></i>
                                                </span>
                                            </div>
                                        </div>

                                        <div style=\"margin-bottom:16px;\">
                                            <label style=\"display:block; font-weight:600; color:#333; margin-bottom:8px;\">Nouveau mot de passe</label>
                                            <div style=\"position:relative;\">
                                                <input type=\"password\" name=\"new_password\" id=\"new_password\"
                                                       style=\"width:100%; padding:10px 14px; padding-right:48px; border:1px solid #ddd; border-radius:8px; font-size:0.95rem; outline:none; box-sizing:border-box;\"
                                                       placeholder=\"••••••••\">
                                                <span onclick=\"togglePass('new_password', 'eye2')\"
                                                      style=\"position:absolute; right:14px; top:50%; transform:translateY(-50%); cursor:pointer; color:#999;\">
                                                    <i class=\"fa fa-eye\" id=\"eye2\"></i>
                                                </span>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Submit -->
                                    <div style=\"display:flex; gap:12px;\">
                                        <button type=\"submit\"
                                                style=\"flex:1; padding:12px; background:#3c943c; color:white; border:none; border-radius:8px; font-size:0.95rem; font-weight:600; cursor:pointer;\">
                                            💾 Enregistrer
                                        </button>
                                        <a href=\"{{ path('admin_profile') }}\"
                                           style=\"flex:1; text-align:center; padding:12px; background:#f0f0f0; color:#333; border-radius:8px; text-decoration:none; font-weight:600; font-size:0.95rem;\">
                                            Annuler
                                        </a>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script>
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

{% endblock %}", "back/edit_profile.html.twig", "C:\\Users\\sirine\\psy\\templates\\back\\edit_profile.html.twig");
    }
}
