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

/* back/users/edit.html.twig */
class __TwigTemplate_7eb3136316d04c9a35a599401904edcd extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/users/edit.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/users/edit.html.twig"));

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

        yield "Modifier l'utilisateur";
        
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
        yield "\" alt=\"logo\" />
                        </a>
                    </div>
                </div>
                <div class=\"sidebar_user_info\">
    <div class=\"icon_setting\"></div>
    <div class=\"user_profle_side\">
        <div class=\"user_img\">
            ";
        // line 24
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 24, $this->source); })()), "user", [], "any", false, false, false, 24), "profile_photo", [], "any", false, false, false, 24)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 25
            yield "                <img class=\"img-responsive\"
                     src=\"";
            // line 26
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 26, $this->source); })()), "user", [], "any", false, false, false, 26), "profile_photo", [], "any", false, false, false, 26)), "html", null, true);
            yield "\"
                     alt=\"user\"
                     style=\"width:70px; height:70px; border-radius:50%; object-fit:cover; border:3px solid #3c943c; display:block; margin:0 auto 10px auto;\">
            ";
        } else {
            // line 30
            yield "                <div style=\"width:70px; height:70px; background:#3c943c; border-radius:50%; display:flex; align-items:center; justify-content:center; margin:0 auto 10px auto;\">
                    <i class=\"fa fa-user\" style=\"color:white; font-size:1.8rem;\"></i>
                </div>
            ";
        }
        // line 34
        yield "        </div>
        <div class=\"user_info\" style=\"text-align:center;\">
            <h6 style=\"color:white; font-size:0.95rem; font-weight:600; margin-bottom:4px;\">
                ";
        // line 37
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 37, $this->source); })()), "user", [], "any", false, false, false, 37), "firstname", [], "any", false, false, false, 37), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 37, $this->source); })()), "user", [], "any", false, false, false, 37), "lastname", [], "any", false, false, false, 37), "html", null, true);
        yield "
            </h6>
            <p style=\"margin:0;\">
                <span class=\"online_animation\"></span> En ligne
            </p>
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
        <li class=\"active\">
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
                                <img src=\"";
        // line 105
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("back/images/logo/logo1.png"), "html", null, true);
        yield "\" alt=\"logo\" style=\"width:40px; height:40px; margin-right:10px;\" />
                                <span style=\"font-size:20px; font-weight:bold; color:#3c943c;\">Nafseyti</span>
                            </a>
                        </div>
                        <div class=\"right_topbar\">
                            <div class=\"icon_info\">
                                <ul class=\"user_profile_dd\">
                                    <li>
                                        <a class=\"dropdown-toggle\" data-toggle=\"dropdown\">
    ";
        // line 114
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 114, $this->source); })()), "user", [], "any", false, false, false, 114), "profile_photo", [], "any", false, false, false, 114)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 115
            yield "        <img class=\"img-responsive rounded-circle\"
             src=\"";
            // line 116
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 116, $this->source); })()), "user", [], "any", false, false, false, 116), "profile_photo", [], "any", false, false, false, 116)), "html", null, true);
            yield "\"
             alt=\"#\"
             style=\"width:35px; height:35px; object-fit:cover;\">
    ";
        } else {
            // line 120
            yield "        <div style=\"width:35px; height:35px; background:#3c943c; border-radius:50%; display:inline-flex; align-items:center; justify-content:center; vertical-align:middle;\">
            <i class=\"fa fa-user\" style=\"color:white; font-size:1rem;\"></i>
        </div>
    ";
        }
        // line 124
        yield "    <span class=\"name_user\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 124, $this->source); })()), "user", [], "any", false, false, false, 124), "firstname", [], "any", false, false, false, 124), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 124, $this->source); })()), "user", [], "any", false, false, false, 124), "lastname", [], "any", false, false, false, 124), "html", null, true);
        yield "</span>
</a>
                                        <div class=\"dropdown-menu\">
    <a class=\"dropdown-item\" href=\"";
        // line 127
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile");
        yield "\">
        <i class=\"fa fa-user\"></i> Mon Profil
    </a>
    <div class=\"dropdown-divider\"></div>
    <a class=\"dropdown-item\" href=\"";
        // line 131
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

            <!-- Main Content -->
            <div class=\"midde_cont\">
                <div class=\"container-fluid\">

                    <div class=\"row column_title\">
                        <div class=\"col-md-12\">
                            <div class=\"page_title\">
                                <h2>Modifier l'utilisateur</h2>
                            </div>
                        </div>
                    </div>

                    <div class=\"row\">
                        <div class=\"col-md-6 col-md-offset-3\">
                            <div class=\"white_shd full\" style=\"padding:32px;\">

                                <!-- User info header -->
                                <div style=\"display:flex; align-items:center; gap:16px; margin-bottom:28px; padding-bottom:20px; border-bottom:1px solid #f0f0f0;\">
                                    ";
        // line 161
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 161, $this->source); })()), "profile_photo", [], "any", false, false, false, 161)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 162
            yield "                                        <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 162, $this->source); })()), "profile_photo", [], "any", false, false, false, 162)), "html", null, true);
            yield "\"
                                             style=\"width:60px; height:60px; border-radius:50%; object-fit:cover; border:2px solid #3c943c;\">
                                    ";
        } else {
            // line 165
            yield "                                        <div style=\"width:60px; height:60px; background:#3c943c; border-radius:50%; display:flex; align-items:center; justify-content:center;\">
                                            <i class=\"fa fa-user\" style=\"color:white; font-size:1.5rem;\"></i>
                                        </div>
                                    ";
        }
        // line 169
        yield "                                    <div>
                                        <div style=\"font-size:1.1rem; font-weight:600; color:#333;\">";
        // line 170
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 170, $this->source); })()), "firstname", [], "any", false, false, false, 170), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 170, $this->source); })()), "lastname", [], "any", false, false, false, 170), "html", null, true);
        yield "</div>
                                        <div style=\"font-size:0.85rem; color:#666;\">";
        // line 171
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 171, $this->source); })()), "email", [], "any", false, false, false, 171), "html", null, true);
        yield "</div>
                                    </div>
                                </div>

                                <form method=\"post\" action=\"";
        // line 175
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_user_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 175, $this->source); })()), "id", [], "any", false, false, false, 175)]), "html", null, true);
        yield "\">

                                    <div style=\"margin-bottom:20px;\">
                                        <label style=\"display:block; font-weight:600; color:#333; margin-bottom:8px;\">Rôle</label>
                                        <select name=\"role\" style=\"width:100%; padding:10px 14px; border:1px solid #ddd; border-radius:8px; font-size:0.95rem;\">
                                            <option value=\"etudiant\" ";
        // line 180
        yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 180, $this->source); })()), "role", [], "any", false, false, false, 180) == "etudiant")) ? ("selected") : (""));
        yield ">Étudiant</option>
                                            <option value=\"enseignant\" ";
        // line 181
        yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 181, $this->source); })()), "role", [], "any", false, false, false, 181) == "enseignant")) ? ("selected") : (""));
        yield ">Enseignant</option>
                                            <option value=\"psychologue\" ";
        // line 182
        yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 182, $this->source); })()), "role", [], "any", false, false, false, 182) == "psychologue")) ? ("selected") : (""));
        yield ">Psychologue</option>
                                            <option value=\"coach_vie\" ";
        // line 183
        yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 183, $this->source); })()), "role", [], "any", false, false, false, 183) == "coach_vie")) ? ("selected") : (""));
        yield ">Coach de vie</option>
                                            <option value=\"administrateur\" ";
        // line 184
        yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 184, $this->source); })()), "role", [], "any", false, false, false, 184) == "administrateur")) ? ("selected") : (""));
        yield ">Administrateur</option>
                                        </select>
                                    </div>

                                    <div style=\"margin-bottom:28px;\">
                                        <label style=\"display:block; font-weight:600; color:#333; margin-bottom:8px;\">Statut</label>
                                        <select name=\"status\" style=\"width:100%; padding:10px 14px; border:1px solid #ddd; border-radius:8px; font-size:0.95rem;\">
                                            <option value=\"actif\" ";
        // line 191
        yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 191, $this->source); })()), "status", [], "any", false, false, false, 191) == "actif")) ? ("selected") : (""));
        yield ">Actif</option>
                                            <option value=\"inactif\" ";
        // line 192
        yield (((CoreExtension::getAttribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 192, $this->source); })()), "status", [], "any", false, false, false, 192) == "inactif")) ? ("selected") : (""));
        yield ">Inactif</option>
                                        </select>
                                    </div>

                                    <div style=\"display:flex; gap:12px;\">
                                        <button type=\"submit\"
                                                style=\"flex:1; padding:12px; background:#3c943c; color:white; border:none; border-radius:8px; font-size:0.95rem; font-weight:600; cursor:pointer;\">
                                            💾 Enregistrer
                                        </button>
                                        <a href=\"";
        // line 201
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users");
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
        return "back/users/edit.html.twig";
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
        return array (  391 => 201,  379 => 192,  375 => 191,  365 => 184,  361 => 183,  357 => 182,  353 => 181,  349 => 180,  341 => 175,  334 => 171,  328 => 170,  325 => 169,  319 => 165,  312 => 162,  310 => 161,  277 => 131,  270 => 127,  261 => 124,  255 => 120,  248 => 116,  245 => 115,  243 => 114,  231 => 105,  227 => 104,  174 => 54,  165 => 48,  149 => 37,  144 => 34,  138 => 30,  131 => 26,  128 => 25,  126 => 24,  115 => 16,  110 => 14,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'back/base.html.twig' %}

{% block title %}Modifier l'utilisateur{% endblock %}

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
                                 src=\"{{ asset('back/images/logo/logo_icon1.png') }}\" alt=\"logo\" />
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
            <p style=\"margin:0;\">
                <span class=\"online_animation\"></span> En ligne
            </p>
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
        <li class=\"active\">
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
                                <img src=\"{{ asset('back/images/logo/logo1.png') }}\" alt=\"logo\" style=\"width:40px; height:40px; margin-right:10px;\" />
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

            <!-- Main Content -->
            <div class=\"midde_cont\">
                <div class=\"container-fluid\">

                    <div class=\"row column_title\">
                        <div class=\"col-md-12\">
                            <div class=\"page_title\">
                                <h2>Modifier l'utilisateur</h2>
                            </div>
                        </div>
                    </div>

                    <div class=\"row\">
                        <div class=\"col-md-6 col-md-offset-3\">
                            <div class=\"white_shd full\" style=\"padding:32px;\">

                                <!-- User info header -->
                                <div style=\"display:flex; align-items:center; gap:16px; margin-bottom:28px; padding-bottom:20px; border-bottom:1px solid #f0f0f0;\">
                                    {% if user.profile_photo %}
                                        <img src=\"{{ asset(user.profile_photo) }}\"
                                             style=\"width:60px; height:60px; border-radius:50%; object-fit:cover; border:2px solid #3c943c;\">
                                    {% else %}
                                        <div style=\"width:60px; height:60px; background:#3c943c; border-radius:50%; display:flex; align-items:center; justify-content:center;\">
                                            <i class=\"fa fa-user\" style=\"color:white; font-size:1.5rem;\"></i>
                                        </div>
                                    {% endif %}
                                    <div>
                                        <div style=\"font-size:1.1rem; font-weight:600; color:#333;\">{{ user.firstname }} {{ user.lastname }}</div>
                                        <div style=\"font-size:0.85rem; color:#666;\">{{ user.email }}</div>
                                    </div>
                                </div>

                                <form method=\"post\" action=\"{{ path('admin_user_edit', {id: user.id}) }}\">

                                    <div style=\"margin-bottom:20px;\">
                                        <label style=\"display:block; font-weight:600; color:#333; margin-bottom:8px;\">Rôle</label>
                                        <select name=\"role\" style=\"width:100%; padding:10px 14px; border:1px solid #ddd; border-radius:8px; font-size:0.95rem;\">
                                            <option value=\"etudiant\" {{ user.role == 'etudiant' ? 'selected' : '' }}>Étudiant</option>
                                            <option value=\"enseignant\" {{ user.role == 'enseignant' ? 'selected' : '' }}>Enseignant</option>
                                            <option value=\"psychologue\" {{ user.role == 'psychologue' ? 'selected' : '' }}>Psychologue</option>
                                            <option value=\"coach_vie\" {{ user.role == 'coach_vie' ? 'selected' : '' }}>Coach de vie</option>
                                            <option value=\"administrateur\" {{ user.role == 'administrateur' ? 'selected' : '' }}>Administrateur</option>
                                        </select>
                                    </div>

                                    <div style=\"margin-bottom:28px;\">
                                        <label style=\"display:block; font-weight:600; color:#333; margin-bottom:8px;\">Statut</label>
                                        <select name=\"status\" style=\"width:100%; padding:10px 14px; border:1px solid #ddd; border-radius:8px; font-size:0.95rem;\">
                                            <option value=\"actif\" {{ user.status == 'actif' ? 'selected' : '' }}>Actif</option>
                                            <option value=\"inactif\" {{ user.status == 'inactif' ? 'selected' : '' }}>Inactif</option>
                                        </select>
                                    </div>

                                    <div style=\"display:flex; gap:12px;\">
                                        <button type=\"submit\"
                                                style=\"flex:1; padding:12px; background:#3c943c; color:white; border:none; border-radius:8px; font-size:0.95rem; font-weight:600; cursor:pointer;\">
                                            💾 Enregistrer
                                        </button>
                                        <a href=\"{{ path('admin_users') }}\"
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
{% endblock %}", "back/users/edit.html.twig", "C:\\Users\\sirine\\psy\\templates\\back\\users\\edit.html.twig");
    }
}
