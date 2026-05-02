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

/* back/users/list.html.twig */
class __TwigTemplate_9809321b58db4307ae8a531d97c95eeb extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/users/list.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/users/list.html.twig"));

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

        yield "Gestion des Utilisateurs";
        
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
    <li>
        <a href=\"";
        // line 46
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_dashboard");
        yield "\">
            <i class=\"fa fa-dashboard yellow_color\"></i>
            <span>Tableau de bord</span>
        </a>
    </li>
    <li class=\"active\">
        <a href=\"";
        // line 52
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users");
        yield "\">
            <i class=\"fa fa-users blue1_color\"></i>
            <span>Utilisateurs</span>
        </a>
    </li>
    <li>
          <a href=\"";
        // line 58
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_rendezvous");
        yield "\">
            <i class=\"fa fa-calendar orange_color\"></i>
            <span>Rendez-vous</span>
        </a>
    </li>
    <li>
         <a href=\"";
        // line 64
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_test_index");
        yield "\">
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
        <a href=\"";
        // line 76
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
        // line 102
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_dashboard");
        yield "\" style=\"display:flex; align-items:center; text-decoration:none;\">
                                <img class=\"img-responsive\"
                                     src=\"";
        // line 104
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
    <img class=\"img-responsive rounded-circle\"
         src=\"";
        // line 116
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("back/images/layout_img/user_img.jpg"), "html", null, true);
        yield "\" 
         alt=\"photo\"
         style=\"width:35px; height:35px; object-fit:cover; border-radius:50%;\">

    <span class=\"name_user\">
        ";
        // line 121
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 121, $this->source); })()), "user", [], "any", false, false, false, 121), "firstname", [], "any", false, false, false, 121), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 121, $this->source); })()), "user", [], "any", false, false, false, 121), "lastname", [], "any", false, false, false, 121), "html", null, true);
        yield "
    </span>
</a>
                                        <div class=\"dropdown-menu\">
    <a class=\"dropdown-item\" href=\"";
        // line 125
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_profile");
        yield "\">
        <i class=\"fa fa-user\"></i> Mon Profil
    </a>
    <div class=\"dropdown-divider\"></div>
    <a class=\"dropdown-item\" href=\"";
        // line 129
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
                                <h2>Gestion des Utilisateurs</h2>
                            </div>
                        </div>
                    </div>

                    <!-- Flash messages -->
                    ";
        // line 154
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 154, $this->source); })()), "flashes", ["success"], "method", false, false, false, 154));
        foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
            // line 155
            yield "                        <div class=\"alert alert-success\">✅ ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["message"], "html", null, true);
            yield "</div>
                    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['message'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 157
        yield "
                    <!-- Search & Filters -->
                    <div class=\"row\" style=\"margin-bottom:20px;\">
                        <div class=\"col-md-12\">
                            <div class=\"white_shd full\" style=\"padding:20px;\">
                                <form method=\"get\" action=\"";
        // line 162
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users");
        yield "\" style=\"display:flex; gap:12px; flex-wrap:wrap; align-items:flex-end;\">
                                    
                                    <div style=\"flex:2; min-width:200px;\">
                                        <label style=\"font-size:0.8rem; font-weight:600; color:#555; margin-bottom:4px; display:block;\">Rechercher</label>
                                        <input type=\"text\" name=\"search\" value=\"";
        // line 166
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["search"]) || array_key_exists("search", $context) ? $context["search"] : (function () { throw new RuntimeError('Variable "search" does not exist.', 166, $this->source); })()), "html", null, true);
        yield "\"
                                               placeholder=\"Nom, prénom, email...\"
                                               style=\"width:100%; padding:8px 12px; border:1px solid #ddd; border-radius:6px; font-size:0.9rem;\">
                                    </div>

                                    <div style=\"flex:1; min-width:140px;\">
                                        <label style=\"font-size:0.8rem; font-weight:600; color:#555; margin-bottom:4px; display:block;\">Rôle</label>
                                        <select name=\"role\" style=\"width:100%; padding:8px 12px; border:1px solid #ddd; border-radius:6px; font-size:0.9rem;\">
                                            <option value=\"\">Tous les rôles</option>
                                            <option value=\"etudiant\" ";
        // line 175
        yield ((((isset($context["selectedRole"]) || array_key_exists("selectedRole", $context) ? $context["selectedRole"] : (function () { throw new RuntimeError('Variable "selectedRole" does not exist.', 175, $this->source); })()) == "etudiant")) ? ("selected") : (""));
        yield ">Étudiant</option>
                                            <option value=\"enseignant\" ";
        // line 176
        yield ((((isset($context["selectedRole"]) || array_key_exists("selectedRole", $context) ? $context["selectedRole"] : (function () { throw new RuntimeError('Variable "selectedRole" does not exist.', 176, $this->source); })()) == "enseignant")) ? ("selected") : (""));
        yield ">Enseignant</option>
                                            <option value=\"psychologue\" ";
        // line 177
        yield ((((isset($context["selectedRole"]) || array_key_exists("selectedRole", $context) ? $context["selectedRole"] : (function () { throw new RuntimeError('Variable "selectedRole" does not exist.', 177, $this->source); })()) == "psychologue")) ? ("selected") : (""));
        yield ">Psychologue</option>
                                            <option value=\"coach_vie\" ";
        // line 178
        yield ((((isset($context["selectedRole"]) || array_key_exists("selectedRole", $context) ? $context["selectedRole"] : (function () { throw new RuntimeError('Variable "selectedRole" does not exist.', 178, $this->source); })()) == "coach_vie")) ? ("selected") : (""));
        yield ">Coach de vie</option>
                                            <option value=\"administrateur\" ";
        // line 179
        yield ((((isset($context["selectedRole"]) || array_key_exists("selectedRole", $context) ? $context["selectedRole"] : (function () { throw new RuntimeError('Variable "selectedRole" does not exist.', 179, $this->source); })()) == "administrateur")) ? ("selected") : (""));
        yield ">Administrateur</option>
                                        </select>
                                    </div>

                                    <div style=\"flex:1; min-width:140px;\">
                                        <label style=\"font-size:0.8rem; font-weight:600; color:#555; margin-bottom:4px; display:block;\">Statut</label>
                                        <select name=\"status\" style=\"width:100%; padding:8px 12px; border:1px solid #ddd; border-radius:6px; font-size:0.9rem;\">
                                            <option value=\"\">Tous les statuts</option>
                                            <option value=\"actif\" ";
        // line 187
        yield ((((isset($context["selectedStatus"]) || array_key_exists("selectedStatus", $context) ? $context["selectedStatus"] : (function () { throw new RuntimeError('Variable "selectedStatus" does not exist.', 187, $this->source); })()) == "actif")) ? ("selected") : (""));
        yield ">Actif</option>
                                            <option value=\"inactif\" ";
        // line 188
        yield ((((isset($context["selectedStatus"]) || array_key_exists("selectedStatus", $context) ? $context["selectedStatus"] : (function () { throw new RuntimeError('Variable "selectedStatus" does not exist.', 188, $this->source); })()) == "inactif")) ? ("selected") : (""));
        yield ">Inactif</option>
                                        </select>
                                    </div>

                                    <div style=\"display:flex; gap:8px;\">
                                        <button type=\"submit\"
                                                style=\"padding:8px 20px; background:#3c943c; color:white; border:none; border-radius:6px; cursor:pointer; font-size:0.9rem;\">
                                            🔍 Filtrer
                                        </button>
                                        <a href=\"";
        // line 197
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_users");
        yield "\"
                                           style=\"padding:8px 20px; background:#f0f0f0; color:#555; border-radius:6px; text-decoration:none; font-size:0.9rem;\">
                                            Réinitialiser
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Users Table -->
                    <div class=\"row\">
                        <div class=\"col-md-12\">
                            <div class=\"white_shd full\">
                                <div style=\"padding:16px 20px; border-bottom:1px solid #f0f0f0; display:flex; justify-content:space-between; align-items:center;\">
                                    <h4 style=\"margin:0; font-size:1rem; color:#333;\">
                                        ";
        // line 213
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["users"]) || array_key_exists("users", $context) ? $context["users"] : (function () { throw new RuntimeError('Variable "users" does not exist.', 213, $this->source); })())), "html", null, true);
        yield " utilisateur(s) trouvé(s)
                                    </h4>
                                </div>
                                <div style=\"overflow-x:auto;\">
                                    <table style=\"width:100%; border-collapse:collapse; font-size:0.9rem;\">
                                        <thead>
                                            <tr style=\"background:#f8f9fa; border-bottom:2px solid #e9ecef;\">
                                                <th style=\"padding:12px 16px; text-align:left; color:#555; font-weight:600;\">Photo</th>
                                                <th style=\"padding:12px 16px; text-align:left; color:#555; font-weight:600;\">Nom complet</th>
                                                <th style=\"padding:12px 16px; text-align:left; color:#555; font-weight:600;\">Email</th>
                                                <th style=\"padding:12px 16px; text-align:left; color:#555; font-weight:600;\">Téléphone</th>
                                                <th style=\"padding:12px 16px; text-align:left; color:#555; font-weight:600;\">Rôle</th>
                                                <th style=\"padding:12px 16px; text-align:left; color:#555; font-weight:600;\">Statut</th>
                                                <th style=\"padding:12px 16px; text-align:left; color:#555; font-weight:600;\">Membre depuis</th>
                                                <th style=\"padding:12px 16px; text-align:center; color:#555; font-weight:600;\">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            ";
        // line 231
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["users"]) || array_key_exists("users", $context) ? $context["users"] : (function () { throw new RuntimeError('Variable "users" does not exist.', 231, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
            // line 232
            yield "                                            <tr style=\"border-bottom:1px solid #f0f0f0; transition:background 0.2s;\"
                                                onmouseover=\"this.style.background='#fafafa'\"
                                                onmouseout=\"this.style.background='white'\">

                                                <!-- Photo -->
                                                <td style=\"padding:12px 16px;\">
                                                    ";
            // line 238
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["user"], "profile_photo", [], "any", false, false, false, 238)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 239
                yield "                                                        <img src=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "profile_photo", [], "any", false, false, false, 239)), "html", null, true);
                yield "\"
                                                             style=\"width:40px; height:40px; border-radius:50%; object-fit:cover; border:2px solid #3c943c;\">
                                                    ";
            } else {
                // line 242
                yield "                                                        <div style=\"width:40px; height:40px; background:#3c943c; border-radius:50%; display:flex; align-items:center; justify-content:center;\">
                                                            <i class=\"fa fa-user\" style=\"color:white; font-size:1rem;\"></i>
                                                        </div>
                                                    ";
            }
            // line 246
            yield "                                                </td>

                                                <!-- Name -->
                                                <td style=\"padding:12px 16px; font-weight:500; color:#333;\">
                                                    ";
            // line 250
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "firstname", [], "any", false, false, false, 250), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "lastname", [], "any", false, false, false, 250), "html", null, true);
            yield "
                                                </td>

                                                <!-- Email -->
                                                <td style=\"padding:12px 16px; color:#666;\">";
            // line 254
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "email", [], "any", false, false, false, 254), "html", null, true);
            yield "</td>

                                                <!-- Phone -->
                                                <td style=\"padding:12px 16px; color:#666;\">";
            // line 257
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["user"], "phone_number", [], "any", true, true, false, 257) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["user"], "phone_number", [], "any", false, false, false, 257)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "phone_number", [], "any", false, false, false, 257), "html", null, true)) : ("—"));
            yield "</td>

                                                <!-- Role -->
                                                <td style=\"padding:12px 16px;\">
                                                    ";
            // line 261
            $context["roleColors"] = ["etudiant" => "#3b82f6", "enseignant" => "#8b5cf6", "psychologue" => "#ec4899", "coach_vie" => "#f59e0b", "administrateur" => "#ef4444"];
            // line 268
            yield "                                                    <span style=\"background:";
            yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["roleColors"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["user"], "role", [], "any", false, false, false, 268), [], "array", true, true, false, 268) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["roleColors"]) || array_key_exists("roleColors", $context) ? $context["roleColors"] : (function () { throw new RuntimeError('Variable "roleColors" does not exist.', 268, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["user"], "role", [], "any", false, false, false, 268), [], "array", false, false, false, 268)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["roleColors"]) || array_key_exists("roleColors", $context) ? $context["roleColors"] : (function () { throw new RuntimeError('Variable "roleColors" does not exist.', 268, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["user"], "role", [], "any", false, false, false, 268), [], "array", false, false, false, 268), "html", null, true)) : ("#6b7280"));
            yield "20; color:";
            yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["roleColors"] ?? null), CoreExtension::getAttribute($this->env, $this->source, $context["user"], "role", [], "any", false, false, false, 268), [], "array", true, true, false, 268) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["roleColors"]) || array_key_exists("roleColors", $context) ? $context["roleColors"] : (function () { throw new RuntimeError('Variable "roleColors" does not exist.', 268, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["user"], "role", [], "any", false, false, false, 268), [], "array", false, false, false, 268)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["roleColors"]) || array_key_exists("roleColors", $context) ? $context["roleColors"] : (function () { throw new RuntimeError('Variable "roleColors" does not exist.', 268, $this->source); })()), CoreExtension::getAttribute($this->env, $this->source, $context["user"], "role", [], "any", false, false, false, 268), [], "array", false, false, false, 268), "html", null, true)) : ("#6b7280"));
            yield "; padding:4px 12px; border-radius:100px; font-size:0.78rem; font-weight:600;\">
                                                        ";
            // line 269
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "role", [], "any", false, false, false, 269), "html", null, true);
            yield "
                                                    </span>
                                                </td>

                                                <!-- Status -->
                                                <td style=\"padding:12px 16px;\">
                                                    ";
            // line 275
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["user"], "status", [], "any", false, false, false, 275) == "actif")) {
                // line 276
                yield "                                                        <span style=\"background:#dcfce7; color:#166534; padding:4px 12px; border-radius:100px; font-size:0.78rem; font-weight:600;\">
                                                            ● Actif
                                                        </span>
                                                    ";
            } else {
                // line 280
                yield "                                                        <span style=\"background:#fee2e2; color:#991b1b; padding:4px 12px; border-radius:100px; font-size:0.78rem; font-weight:600;\">
                                                            ● Inactif
                                                        </span>
                                                    ";
            }
            // line 284
            yield "                                                </td>

                                                <!-- Date -->
                                                <td style=\"padding:12px 16px; color:#666;\">
                                                    ";
            // line 288
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "created_at", [], "any", false, false, false, 288), "d/m/Y"), "html", null, true);
            yield "
                                                </td>

                                                <!-- Actions -->
                                                <td style=\"padding:12px 16px; text-align:center;\">
                                                    <div style=\"display:flex; gap:8px; justify-content:center;\">
                                                        <a href=\"";
            // line 294
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_user_edit", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["user"], "id", [], "any", false, false, false, 294)]), "html", null, true);
            yield "\"
                                                           style=\"padding:6px 14px; background:#3c943c; color:white; border-radius:6px; text-decoration:none; font-size:0.8rem; font-weight:600;\">
                                                            ✏️ Modifier
                                                        </a>
                                                        <a href=\"";
            // line 298
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_user_toggle", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["user"], "id", [], "any", false, false, false, 298)]), "html", null, true);
            yield "\"
                                                           onclick=\"return confirm('Confirmer le changement de statut ?')\"
                                                           style=\"padding:6px 14px; background:";
            // line 300
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["user"], "status", [], "any", false, false, false, 300) == "actif")) ? ("#fee2e2") : ("#dcfce7"));
            yield "; color:";
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["user"], "status", [], "any", false, false, false, 300) == "actif")) ? ("#991b1b") : ("#166534"));
            yield "; border-radius:6px; text-decoration:none; font-size:0.8rem; font-weight:600;\">
                                                            ";
            // line 301
            yield (((CoreExtension::getAttribute($this->env, $this->source, $context["user"], "status", [], "any", false, false, false, 301) == "actif")) ? ("🔒 Désactiver") : ("🔓 Activer"));
            yield "
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            ";
            $context['_iterated'] = true;
        }
        // line 306
        if (!$context['_iterated']) {
            // line 307
            yield "                                            <tr>
                                                <td colspan=\"8\" style=\"padding:40px; text-align:center; color:#999;\">
                                                    Aucun utilisateur trouvé.
                                                </td>
                                            </tr>
                                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['user'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 313
        yield "                                        </tbody>
                                    </table>
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
        return "back/users/list.html.twig";
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
        return array (  565 => 313,  554 => 307,  552 => 306,  542 => 301,  536 => 300,  531 => 298,  524 => 294,  515 => 288,  509 => 284,  503 => 280,  497 => 276,  495 => 275,  486 => 269,  479 => 268,  477 => 261,  470 => 257,  464 => 254,  455 => 250,  449 => 246,  443 => 242,  436 => 239,  434 => 238,  426 => 232,  421 => 231,  400 => 213,  381 => 197,  369 => 188,  365 => 187,  354 => 179,  350 => 178,  346 => 177,  342 => 176,  338 => 175,  326 => 166,  319 => 162,  312 => 157,  303 => 155,  299 => 154,  271 => 129,  264 => 125,  255 => 121,  247 => 116,  232 => 104,  227 => 102,  198 => 76,  183 => 64,  174 => 58,  165 => 52,  156 => 46,  139 => 34,  129 => 27,  115 => 16,  110 => 14,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'back/base.html.twig' %}

{% block title %}Gestion des Utilisateurs{% endblock %}

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
          <a href=\"{{ path('admin_rendezvous') }}\">
            <i class=\"fa fa-calendar orange_color\"></i>
            <span>Rendez-vous</span>
        </a>
    </li>
    <li>
         <a href=\"{{ path('app_test_index') }}\">
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
                                <span style=\"font-size:20px; font-weight:bold; color:#3c943c;\">Nafseyti</span>
                            </a>
                        </div>
                        <div class=\"right_topbar\">
                            <div class=\"icon_info\">
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

            <!-- Main Content -->
            <div class=\"midde_cont\">
                <div class=\"container-fluid\">

                    <div class=\"row column_title\">
                        <div class=\"col-md-12\">
                            <div class=\"page_title\">
                                <h2>Gestion des Utilisateurs</h2>
                            </div>
                        </div>
                    </div>

                    <!-- Flash messages -->
                    {% for message in app.flashes('success') %}
                        <div class=\"alert alert-success\">✅ {{ message }}</div>
                    {% endfor %}

                    <!-- Search & Filters -->
                    <div class=\"row\" style=\"margin-bottom:20px;\">
                        <div class=\"col-md-12\">
                            <div class=\"white_shd full\" style=\"padding:20px;\">
                                <form method=\"get\" action=\"{{ path('admin_users') }}\" style=\"display:flex; gap:12px; flex-wrap:wrap; align-items:flex-end;\">
                                    
                                    <div style=\"flex:2; min-width:200px;\">
                                        <label style=\"font-size:0.8rem; font-weight:600; color:#555; margin-bottom:4px; display:block;\">Rechercher</label>
                                        <input type=\"text\" name=\"search\" value=\"{{ search }}\"
                                               placeholder=\"Nom, prénom, email...\"
                                               style=\"width:100%; padding:8px 12px; border:1px solid #ddd; border-radius:6px; font-size:0.9rem;\">
                                    </div>

                                    <div style=\"flex:1; min-width:140px;\">
                                        <label style=\"font-size:0.8rem; font-weight:600; color:#555; margin-bottom:4px; display:block;\">Rôle</label>
                                        <select name=\"role\" style=\"width:100%; padding:8px 12px; border:1px solid #ddd; border-radius:6px; font-size:0.9rem;\">
                                            <option value=\"\">Tous les rôles</option>
                                            <option value=\"etudiant\" {{ selectedRole == 'etudiant' ? 'selected' : '' }}>Étudiant</option>
                                            <option value=\"enseignant\" {{ selectedRole == 'enseignant' ? 'selected' : '' }}>Enseignant</option>
                                            <option value=\"psychologue\" {{ selectedRole == 'psychologue' ? 'selected' : '' }}>Psychologue</option>
                                            <option value=\"coach_vie\" {{ selectedRole == 'coach_vie' ? 'selected' : '' }}>Coach de vie</option>
                                            <option value=\"administrateur\" {{ selectedRole == 'administrateur' ? 'selected' : '' }}>Administrateur</option>
                                        </select>
                                    </div>

                                    <div style=\"flex:1; min-width:140px;\">
                                        <label style=\"font-size:0.8rem; font-weight:600; color:#555; margin-bottom:4px; display:block;\">Statut</label>
                                        <select name=\"status\" style=\"width:100%; padding:8px 12px; border:1px solid #ddd; border-radius:6px; font-size:0.9rem;\">
                                            <option value=\"\">Tous les statuts</option>
                                            <option value=\"actif\" {{ selectedStatus == 'actif' ? 'selected' : '' }}>Actif</option>
                                            <option value=\"inactif\" {{ selectedStatus == 'inactif' ? 'selected' : '' }}>Inactif</option>
                                        </select>
                                    </div>

                                    <div style=\"display:flex; gap:8px;\">
                                        <button type=\"submit\"
                                                style=\"padding:8px 20px; background:#3c943c; color:white; border:none; border-radius:6px; cursor:pointer; font-size:0.9rem;\">
                                            🔍 Filtrer
                                        </button>
                                        <a href=\"{{ path('admin_users') }}\"
                                           style=\"padding:8px 20px; background:#f0f0f0; color:#555; border-radius:6px; text-decoration:none; font-size:0.9rem;\">
                                            Réinitialiser
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- Users Table -->
                    <div class=\"row\">
                        <div class=\"col-md-12\">
                            <div class=\"white_shd full\">
                                <div style=\"padding:16px 20px; border-bottom:1px solid #f0f0f0; display:flex; justify-content:space-between; align-items:center;\">
                                    <h4 style=\"margin:0; font-size:1rem; color:#333;\">
                                        {{ users|length }} utilisateur(s) trouvé(s)
                                    </h4>
                                </div>
                                <div style=\"overflow-x:auto;\">
                                    <table style=\"width:100%; border-collapse:collapse; font-size:0.9rem;\">
                                        <thead>
                                            <tr style=\"background:#f8f9fa; border-bottom:2px solid #e9ecef;\">
                                                <th style=\"padding:12px 16px; text-align:left; color:#555; font-weight:600;\">Photo</th>
                                                <th style=\"padding:12px 16px; text-align:left; color:#555; font-weight:600;\">Nom complet</th>
                                                <th style=\"padding:12px 16px; text-align:left; color:#555; font-weight:600;\">Email</th>
                                                <th style=\"padding:12px 16px; text-align:left; color:#555; font-weight:600;\">Téléphone</th>
                                                <th style=\"padding:12px 16px; text-align:left; color:#555; font-weight:600;\">Rôle</th>
                                                <th style=\"padding:12px 16px; text-align:left; color:#555; font-weight:600;\">Statut</th>
                                                <th style=\"padding:12px 16px; text-align:left; color:#555; font-weight:600;\">Membre depuis</th>
                                                <th style=\"padding:12px 16px; text-align:center; color:#555; font-weight:600;\">Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {% for user in users %}
                                            <tr style=\"border-bottom:1px solid #f0f0f0; transition:background 0.2s;\"
                                                onmouseover=\"this.style.background='#fafafa'\"
                                                onmouseout=\"this.style.background='white'\">

                                                <!-- Photo -->
                                                <td style=\"padding:12px 16px;\">
                                                    {% if user.profile_photo %}
                                                        <img src=\"{{ asset(user.profile_photo) }}\"
                                                             style=\"width:40px; height:40px; border-radius:50%; object-fit:cover; border:2px solid #3c943c;\">
                                                    {% else %}
                                                        <div style=\"width:40px; height:40px; background:#3c943c; border-radius:50%; display:flex; align-items:center; justify-content:center;\">
                                                            <i class=\"fa fa-user\" style=\"color:white; font-size:1rem;\"></i>
                                                        </div>
                                                    {% endif %}
                                                </td>

                                                <!-- Name -->
                                                <td style=\"padding:12px 16px; font-weight:500; color:#333;\">
                                                    {{ user.firstname }} {{ user.lastname }}
                                                </td>

                                                <!-- Email -->
                                                <td style=\"padding:12px 16px; color:#666;\">{{ user.email }}</td>

                                                <!-- Phone -->
                                                <td style=\"padding:12px 16px; color:#666;\">{{ user.phone_number ?? '—' }}</td>

                                                <!-- Role -->
                                                <td style=\"padding:12px 16px;\">
                                                    {% set roleColors = {
                                                        'etudiant': '#3b82f6',
                                                        'enseignant': '#8b5cf6',
                                                        'psychologue': '#ec4899',
                                                        'coach_vie': '#f59e0b',
                                                        'administrateur': '#ef4444'
                                                    } %}
                                                    <span style=\"background:{{ roleColors[user.role] ?? '#6b7280' }}20; color:{{ roleColors[user.role] ?? '#6b7280' }}; padding:4px 12px; border-radius:100px; font-size:0.78rem; font-weight:600;\">
                                                        {{ user.role }}
                                                    </span>
                                                </td>

                                                <!-- Status -->
                                                <td style=\"padding:12px 16px;\">
                                                    {% if user.status == 'actif' %}
                                                        <span style=\"background:#dcfce7; color:#166534; padding:4px 12px; border-radius:100px; font-size:0.78rem; font-weight:600;\">
                                                            ● Actif
                                                        </span>
                                                    {% else %}
                                                        <span style=\"background:#fee2e2; color:#991b1b; padding:4px 12px; border-radius:100px; font-size:0.78rem; font-weight:600;\">
                                                            ● Inactif
                                                        </span>
                                                    {% endif %}
                                                </td>

                                                <!-- Date -->
                                                <td style=\"padding:12px 16px; color:#666;\">
                                                    {{ user.created_at|date('d/m/Y') }}
                                                </td>

                                                <!-- Actions -->
                                                <td style=\"padding:12px 16px; text-align:center;\">
                                                    <div style=\"display:flex; gap:8px; justify-content:center;\">
                                                        <a href=\"{{ path('admin_user_edit', {id: user.id}) }}\"
                                                           style=\"padding:6px 14px; background:#3c943c; color:white; border-radius:6px; text-decoration:none; font-size:0.8rem; font-weight:600;\">
                                                            ✏️ Modifier
                                                        </a>
                                                        <a href=\"{{ path('admin_user_toggle', {id: user.id}) }}\"
                                                           onclick=\"return confirm('Confirmer le changement de statut ?')\"
                                                           style=\"padding:6px 14px; background:{{ user.status == 'actif' ? '#fee2e2' : '#dcfce7' }}; color:{{ user.status == 'actif' ? '#991b1b' : '#166534' }}; border-radius:6px; text-decoration:none; font-size:0.8rem; font-weight:600;\">
                                                            {{ user.status == 'actif' ? '🔒 Désactiver' : '🔓 Activer' }}
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            {% else %}
                                            <tr>
                                                <td colspan=\"8\" style=\"padding:40px; text-align:center; color:#999;\">
                                                    Aucun utilisateur trouvé.
                                                </td>
                                            </tr>
                                            {% endfor %}
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
{% endblock %}", "back/users/list.html.twig", "C:\\Users\\DELL\\Downloads\\psy\\templates\\back\\users\\list.html.twig");
    }
}
