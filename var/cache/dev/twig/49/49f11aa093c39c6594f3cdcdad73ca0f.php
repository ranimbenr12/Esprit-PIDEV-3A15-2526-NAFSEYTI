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

/* back/alertes/index.html.twig */
class __TwigTemplate_664afc49f040132670abff033ba82760 extends Template
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
            'admin_content' => [$this, 'block_admin_content'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "back/admin_base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/alertes/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/alertes/index.html.twig"));

        $this->parent = $this->load("back/admin_base.html.twig", 1);
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

        yield "Alertes Critiques — Administration";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
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

        // line 6
        yield "<div class=\"container-fluid px-4\">

    ";
        // line 9
        yield "    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h1 class=\"h3 mb-0\">
            <i class=\"fa fa-exclamation-triangle text-danger\"></i> Alertes Critiques
            ";
        // line 12
        if (((isset($context["nb_nouvelles"]) || array_key_exists("nb_nouvelles", $context) ? $context["nb_nouvelles"] : (function () { throw new RuntimeError('Variable "nb_nouvelles" does not exist.', 12, $this->source); })()) > 0)) {
            // line 13
            yield "                <span class=\"badge bg-danger\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["nb_nouvelles"]) || array_key_exists("nb_nouvelles", $context) ? $context["nb_nouvelles"] : (function () { throw new RuntimeError('Variable "nb_nouvelles" does not exist.', 13, $this->source); })()), "html", null, true);
            yield " nouvelles</span>
            ";
        }
        // line 15
        yield "        </h1>
    </div>

    ";
        // line 19
        yield "    ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 19, $this->source); })()), "flashes", ["success"], "method", false, false, false, 19));
        foreach ($context['_seq'] as $context["_key"] => $context["msg"]) {
            // line 20
            yield "        <div class=\"alert alert-success alert-dismissible fade show shadow-sm\" role=\"alert\">
            <i class=\"fa fa-check-circle\"></i> ";
            // line 21
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["msg"], "html", null, true);
            yield "
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                <span aria-hidden=\"true\">&times;</span>
            </button>
        </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['msg'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 27
        yield "
    ";
        // line 29
        yield "    <div class=\"row mb-4\">
        <div class=\"col-md-4\">
            <div class=\"card border-left-danger shadow-sm\">
                <div class=\"card-body\">
                    <div class=\"row align-items-center\">
                        <div class=\"col-8\">
                            <h6 class=\"text-muted mb-1\">Nouvelles</h6>
                            <h2 class=\"mb-0 text-danger\">";
        // line 36
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["nouvelles"]) || array_key_exists("nouvelles", $context) ? $context["nouvelles"] : (function () { throw new RuntimeError('Variable "nouvelles" does not exist.', 36, $this->source); })())), "html", null, true);
        yield "</h2>
                        </div>
                        <div class=\"col-4 text-right\">
                            <i class=\"fa fa-bell fa-2x text-danger\"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"col-md-4\">
            <div class=\"card border-left-warning shadow-sm\">
                <div class=\"card-body\">
                    <div class=\"row align-items-center\">
                        <div class=\"col-8\">
                            <h6 class=\"text-muted mb-1\">En cours</h6>
                            <h2 class=\"mb-0 text-warning\">";
        // line 51
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["en_cours"]) || array_key_exists("en_cours", $context) ? $context["en_cours"] : (function () { throw new RuntimeError('Variable "en_cours" does not exist.', 51, $this->source); })())), "html", null, true);
        yield "</h2>
                        </div>
                        <div class=\"col-4 text-right\">
                            <i class=\"fa fa-spinner fa-2x text-warning\"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"col-md-4\">
            <div class=\"card border-left-success shadow-sm\">
                <div class=\"card-body\">
                    <div class=\"row align-items-center\">
                        <div class=\"col-8\">
                            <h6 class=\"text-muted mb-1\">Traitées</h6>
                            <h2 class=\"mb-0 text-success\">";
        // line 66
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["traitees"]) || array_key_exists("traitees", $context) ? $context["traitees"] : (function () { throw new RuntimeError('Variable "traitees" does not exist.', 66, $this->source); })())), "html", null, true);
        yield "</h2>
                        </div>
                        <div class=\"col-4 text-right\">
                            <i class=\"fa fa-check-circle fa-2x text-success\"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    ";
        // line 78
        yield "    ";
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["nouvelles"]) || array_key_exists("nouvelles", $context) ? $context["nouvelles"] : (function () { throw new RuntimeError('Variable "nouvelles" does not exist.', 78, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 79
            yield "    <div class=\"card shadow-sm mb-4\">
        <div class=\"card-header bg-danger text-white\">
            <h5 class=\"mb-0\">
                <i class=\"fa fa-bell\"></i> Nouvelles alertes
                <span class=\"badge badge-light ml-2\">";
            // line 83
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["nouvelles"]) || array_key_exists("nouvelles", $context) ? $context["nouvelles"] : (function () { throw new RuntimeError('Variable "nouvelles" does not exist.', 83, $this->source); })())), "html", null, true);
            yield "</span>
            </h5>
        </div>
        <div class=\"card-body\">
            <div class=\"table-responsive\">
                <table class=\"table table-hover table-bordered\">
                    <thead class=\"bg-light\">
                        <tr>
                            <th><i class=\"fa fa-user\"></i> Utilisateur</th>
                            <th><i class=\"fa fa-envelope\"></i> Email</th>
                            <th><i class=\"fa fa-puzzle-piece\"></i> Test</th>
                            <th><i class=\"fa fa-calendar\"></i> Date</th>
                            <th><i class=\"fa fa-cog\"></i> Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
            // line 99
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["nouvelles"]) || array_key_exists("nouvelles", $context) ? $context["nouvelles"] : (function () { throw new RuntimeError('Variable "nouvelles" does not exist.', 99, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["alerte"]) {
                // line 100
                yield "                        <tr class=\"alert-row\">
                            <td>
                                ";
                // line 102
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["alerte"], "utilisateur", [], "any", false, false, false, 102)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 103
                    yield "                                    <strong>";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["alerte"], "utilisateur", [], "any", false, false, false, 103), "firstname", [], "any", false, false, false, 103), "html", null, true);
                    yield " ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["alerte"], "utilisateur", [], "any", false, false, false, 103), "lastname", [], "any", false, false, false, 103), "html", null, true);
                    yield "</strong>
                                    <br><small class=\"text-muted\">ID: ";
                    // line 104
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["alerte"], "utilisateur", [], "any", false, false, false, 104), "id", [], "any", false, false, false, 104), "html", null, true);
                    yield "</small>
                                ";
                } else {
                    // line 106
                    yield "                                    <span class=\"text-muted\">Anonyme</span>
                                    <br><small class=\"text-muted\">Non connecté</small>
                                ";
                }
                // line 109
                yield "                            </td>
                            <td>";
                // line 110
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["alerte"], "utilisateur", [], "any", false, false, false, 110)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["alerte"], "utilisateur", [], "any", false, false, false, 110), "email", [], "any", false, false, false, 110), "html", null, true)) : ("Non renseigné"));
                yield "</td>
                            <td><span class=\"badge badge-info\">";
                // line 111
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["alerte"], "test", [], "any", false, false, false, 111), "titre", [], "any", false, false, false, 111), "html", null, true);
                yield "</span></td>
                            <td>";
                // line 112
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["alerte"], "createdAt", [], "any", false, false, false, 112), "d/m/Y H:i"), "html", null, true);
                yield "</td>
                            <td>
                                <a href=\"";
                // line 114
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_alertes_detail", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["alerte"], "id", [], "any", false, false, false, 114)]), "html", null, true);
                yield "\"
                                   class=\"btn btn-danger btn-sm\">
                                    <i class=\"fa fa-eye\"></i> Traiter
                                </a>
                            </td>
                        </tr>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['alerte'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 121
            yield "                    </tbody>
                </table>
            </div>
        </div>
    </div>
    ";
        }
        // line 127
        yield "
    ";
        // line 129
        yield "    ";
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["en_cours"]) || array_key_exists("en_cours", $context) ? $context["en_cours"] : (function () { throw new RuntimeError('Variable "en_cours" does not exist.', 129, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 130
            yield "    <div class=\"card shadow-sm mb-4\">
        <div class=\"card-header bg-warning\">
            <h5 class=\"mb-0\">
                <i class=\"fa fa-spinner fa-spin\"></i> En cours de traitement
                <span class=\"badge badge-dark ml-2\">";
            // line 134
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["en_cours"]) || array_key_exists("en_cours", $context) ? $context["en_cours"] : (function () { throw new RuntimeError('Variable "en_cours" does not exist.', 134, $this->source); })())), "html", null, true);
            yield "</span>
            </h5>
        </div>
        <div class=\"card-body\">
            <div class=\"table-responsive\">
                <table class=\"table table-hover table-bordered\">
                    <thead class=\"bg-light\">
                        <tr>
                            <th><i class=\"fa fa-user\"></i> Utilisateur</th>
                            <th><i class=\"fa fa-envelope\"></i> Email</th>
                            <th><i class=\"fa fa-puzzle-piece\"></i> Test</th>
                            <th><i class=\"fa fa-calendar\"></i> Date</th>
                            <th><i class=\"fa fa-cog\"></i> Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
            // line 150
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["en_cours"]) || array_key_exists("en_cours", $context) ? $context["en_cours"] : (function () { throw new RuntimeError('Variable "en_cours" does not exist.', 150, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["alerte"]) {
                // line 151
                yield "                        <tr class=\"alert-row\">
                            <td>
                                ";
                // line 153
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["alerte"], "utilisateur", [], "any", false, false, false, 153)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 154
                    yield "                                    ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["alerte"], "utilisateur", [], "any", false, false, false, 154), "firstname", [], "any", false, false, false, 154), "html", null, true);
                    yield " ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["alerte"], "utilisateur", [], "any", false, false, false, 154), "lastname", [], "any", false, false, false, 154), "html", null, true);
                    yield "
                                ";
                } else {
                    // line 156
                    yield "                                    <span class=\"text-muted\">Anonyme</span>
                                ";
                }
                // line 158
                yield "                            </td>
                            <td>";
                // line 159
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["alerte"], "utilisateur", [], "any", false, false, false, 159)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["alerte"], "utilisateur", [], "any", false, false, false, 159), "email", [], "any", false, false, false, 159), "html", null, true)) : ("Non renseigné"));
                yield "</td>
                            <td><span class=\"badge badge-info\">";
                // line 160
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["alerte"], "test", [], "any", false, false, false, 160), "titre", [], "any", false, false, false, 160), "html", null, true);
                yield "</span></td>
                            <td>";
                // line 161
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["alerte"], "createdAt", [], "any", false, false, false, 161), "d/m/Y H:i"), "html", null, true);
                yield "</td>
                            <td>
                                <a href=\"";
                // line 163
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_alertes_detail", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["alerte"], "id", [], "any", false, false, false, 163)]), "html", null, true);
                yield "\"
                                   class=\"btn btn-warning btn-sm\">
                                    <i class=\"fa fa-eye\"></i> Suivre
                                </a>
                            </td>
                        </tr>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['alerte'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 170
            yield "                    </tbody>
                </table>
            </div>
        </div>
    </div>
    ";
        }
        // line 176
        yield "
    ";
        // line 178
        yield "    ";
        if ((($tmp =  !Twig\Extension\CoreExtension::testEmpty((isset($context["traitees"]) || array_key_exists("traitees", $context) ? $context["traitees"] : (function () { throw new RuntimeError('Variable "traitees" does not exist.', 178, $this->source); })()))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 179
            yield "    <div class=\"card shadow-sm mb-4\">
        <div class=\"card-header bg-success text-white\">
            <h5 class=\"mb-0\">
                <i class=\"fa fa-check-circle\"></i> Alertes traitées
                <span class=\"badge badge-light ml-2\">";
            // line 183
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["traitees"]) || array_key_exists("traitees", $context) ? $context["traitees"] : (function () { throw new RuntimeError('Variable "traitees" does not exist.', 183, $this->source); })())), "html", null, true);
            yield "</span>
            </h5>
        </div>
        <div class=\"card-body\">
            <div class=\"table-responsive\">
                <table class=\"table table-hover table-bordered\">
                    <thead class=\"bg-light\">
                        <tr>
                            <th><i class=\"fa fa-user\"></i> Utilisateur</th>
                            <th><i class=\"fa fa-puzzle-piece\"></i> Test</th>
                            <th><i class=\"fa fa-calendar\"></i> Détectée</th>
                            <th><i class=\"fa fa-check\"></i> Traitée</th>
                            <th><i class=\"fa fa-user-md\"></i> Traité par</th>
                            <th><i class=\"fa fa-cog\"></i> Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        ";
            // line 200
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["traitees"]) || array_key_exists("traitees", $context) ? $context["traitees"] : (function () { throw new RuntimeError('Variable "traitees" does not exist.', 200, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["alerte"]) {
                // line 201
                yield "                        <tr>
                            <td>
                                ";
                // line 203
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["alerte"], "utilisateur", [], "any", false, false, false, 203)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 204
                    yield "                                    ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["alerte"], "utilisateur", [], "any", false, false, false, 204), "firstname", [], "any", false, false, false, 204), "html", null, true);
                    yield " ";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["alerte"], "utilisateur", [], "any", false, false, false, 204), "lastname", [], "any", false, false, false, 204), "html", null, true);
                    yield "
                                ";
                } else {
                    // line 206
                    yield "                                    <span class=\"text-muted\">Anonyme</span>
                                ";
                }
                // line 208
                yield "                            </td>
                            <td>";
                // line 209
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["alerte"], "test", [], "any", false, false, false, 209), "titre", [], "any", false, false, false, 209), "html", null, true);
                yield "</td>
                            <td>";
                // line 210
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["alerte"], "createdAt", [], "any", false, false, false, 210), "d/m/Y H:i"), "html", null, true);
                yield "</td>
                            <td>";
                // line 211
                yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["alerte"], "traiteLe", [], "any", false, false, false, 211)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["alerte"], "traiteLe", [], "any", false, false, false, 211), "d/m/Y H:i"), "html", null, true)) : ("-"));
                yield "</td>
                            <td>";
                // line 212
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["alerte"], "traitePar", [], "any", true, true, false, 212) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["alerte"], "traitePar", [], "any", false, false, false, 212)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["alerte"], "traitePar", [], "any", false, false, false, 212), "html", null, true)) : ("Admin"));
                yield "</td>
                            <td>
                                <a href=\"";
                // line 214
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_alertes_detail", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["alerte"], "id", [], "any", false, false, false, 214)]), "html", null, true);
                yield "\"
                                   class=\"btn btn-outline-success btn-sm\">
                                    <i class=\"fa fa-eye\"></i> Voir
                                </a>
                            </td>
                        </tr>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['alerte'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 221
            yield "                    </tbody>
                </table>
            </div>
        </div>
    </div>
    ";
        }
        // line 227
        yield "
    ";
        // line 229
        yield "    ";
        if (((Twig\Extension\CoreExtension::testEmpty((isset($context["nouvelles"]) || array_key_exists("nouvelles", $context) ? $context["nouvelles"] : (function () { throw new RuntimeError('Variable "nouvelles" does not exist.', 229, $this->source); })())) && Twig\Extension\CoreExtension::testEmpty((isset($context["en_cours"]) || array_key_exists("en_cours", $context) ? $context["en_cours"] : (function () { throw new RuntimeError('Variable "en_cours" does not exist.', 229, $this->source); })()))) && Twig\Extension\CoreExtension::testEmpty((isset($context["traitees"]) || array_key_exists("traitees", $context) ? $context["traitees"] : (function () { throw new RuntimeError('Variable "traitees" does not exist.', 229, $this->source); })())))) {
            // line 230
            yield "        <div class=\"card shadow-sm\">
            <div class=\"card-body text-center py-5\">
                <i class=\"fa fa-check-circle fa-4x text-success mb-3\"></i>
                <h4 class=\"text-muted\">Aucune alerte critique</h4>
                <p class=\"text-muted\">Toutes les alertes ont été traitées.</p>
            </div>
        </div>
    ";
        }
        // line 238
        yield "
</div>

<style>
.border-left-danger { border-left: 4px solid #dc3545; }
.border-left-warning { border-left: 4px solid #ffc107; }
.border-left-success { border-left: 4px solid #28a745; }

.alert-row {
    transition: all 0.2s ease;
}
.alert-row:hover {
    background-color: #f8f9fc;
    transform: translateX(2px);
}

.card {
    border: none;
    border-radius: 10px;
}
.card-header {
    border-radius: 10px 10px 0 0;
}
.table th {
    border-top: none;
    font-weight: 600;
}
.badge-light {
    background-color: rgba(255,255,255,0.25);
    color: white;
}
</style>
";
        // line 271
        yield "
<script>
    // Fonction pour jouer le son d'alerte
    function playAlertSound() {
        const audio = new Audio(\"";
        // line 275
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("sounds/alert.mp3"), "html", null, true);
        yield "\");
        audio.volume = 0.5; // Ajustez le volume (0.0 à 1.0)
        audio.play().catch(error => {
            // Les navigateurs modernes bloquent souvent la lecture automatique.
            console.log(\"Lecture audio automatique bloquée par le navigateur.\", error);
        });
    }

    // Vérifie s'il y a de nouvelles alertes et joue le son
    // La variable 'nouvelles' est passée depuis votre contrôleur
    ";
        // line 285
        if ((array_key_exists("nouvelles", $context) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["nouvelles"]) || array_key_exists("nouvelles", $context) ? $context["nouvelles"] : (function () { throw new RuntimeError('Variable "nouvelles" does not exist.', 285, $this->source); })())) > 0))) {
            // line 286
            yield "        // On ajoute un petit délai pour s'assurer que la page est chargée
        setTimeout(playAlertSound, 500);
    ";
        }
        // line 289
        yield "</script>
";
        // line 290
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["nouvelles"]) || array_key_exists("nouvelles", $context) ? $context["nouvelles"] : (function () { throw new RuntimeError('Variable "nouvelles" does not exist.', 290, $this->source); })())) > 0)) {
            // line 291
            yield "
<div id=\"alert-float\" style=\"
    position: fixed; bottom: 30px; right: 30px; z-index: 9999;
    display: flex; flex-direction: column; align-items: flex-end; gap: 8px;
\">
    ";
            // line 297
            yield "    <div id=\"alert-bubble\" style=\"
        background: #dc3545; color: white;
        padding: 12px 16px; border-radius: 12px;
        box-shadow: 0 4px 15px rgba(220,53,69,0.5);
        font-size: 0.85rem; font-weight: bold;
        display: none; max-width: 220px; text-align: center;
    \">
        🔴 ";
            // line 304
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["nouvelles"]) || array_key_exists("nouvelles", $context) ? $context["nouvelles"] : (function () { throw new RuntimeError('Variable "nouvelles" does not exist.', 304, $this->source); })())), "html", null, true);
            yield " alerte(s) critique(s)<br>
        <small style=\"font-weight:normal;\">Cliquez sur la cloche pour activer le son</small>
    </div>

    ";
            // line 309
            yield "    <button id=\"btn-alerte\" title=\"Alertes critiques\" style=\"
        width: 58px; height: 58px; border-radius: 50%;
        background: #dc3545; color: white; border: none;
        font-size: 1.5rem; cursor: pointer;
        box-shadow: 0 4px 15px rgba(220,53,69,0.5);
        position: relative;
        animation: ring 1.5s ease infinite;
    \">
        🔔
        <span style=\"
            position: absolute; top: -4px; right: -4px;
            background: white; color: #dc3545;
            border-radius: 50%; width: 22px; height: 22px;
            font-size: 0.7rem; font-weight: bold;
            display: flex; align-items: center; justify-content: center;
            border: 2px solid #dc3545;
        \">";
            // line 325
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["nouvelles"]) || array_key_exists("nouvelles", $context) ? $context["nouvelles"] : (function () { throw new RuntimeError('Variable "nouvelles" does not exist.', 325, $this->source); })())), "html", null, true);
            yield "</span>
    </button>
</div>

<style>
@keyframes ring {
    0%   { transform: rotate(0deg); }
    10%  { transform: rotate(15deg); }
    20%  { transform: rotate(-15deg); }
    30%  { transform: rotate(10deg); }
    40%  { transform: rotate(-10deg); }
    50%  { transform: rotate(0deg); }
    100% { transform: rotate(0deg); }
}
</style>

<script>
(function() {
    const btn = document.getElementById('btn-alerte');
    const bubble = document.getElementById('alert-bubble');
    let soundPlayed = false;

    // Afficher/cacher la bulle au survol
    btn.addEventListener('mouseenter', function() {
        bubble.style.display = 'block';
    });
    btn.addEventListener('mouseleave', function() {
        bubble.style.display = 'none';
    });

    // Jouer le son au clic
    btn.addEventListener('click', function() {
        if (soundPlayed) return;
        soundPlayed = true;

        // Arrêter l'animation
        btn.style.animation = 'none';
        btn.style.background = '#6c757d';
        btn.title = 'Son joué';

        // 3 bips puis stop
        try {
            const ctx = new (window.AudioContext || window.webkitAudioContext)();
            const bips = [0, 0.55, 1.1];
            bips.forEach(function(t) {
                const osc = ctx.createOscillator();
                const gain = ctx.createGain();
                osc.connect(gain);
                gain.connect(ctx.destination);
                osc.type = 'sine';
                osc.frequency.value = 880;
                gain.gain.setValueAtTime(0.4, ctx.currentTime + t);
                gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + t + 0.45);
                osc.start(ctx.currentTime + t);
                osc.stop(ctx.currentTime + t + 0.45);
            });
        } catch(e) {
            console.warn('Audio non supporté:', e);
        }
    });
})();
</script>

";
        }
        // line 389
        yield "
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
        return "back/alertes/index.html.twig";
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
        return array (  670 => 389,  603 => 325,  585 => 309,  578 => 304,  569 => 297,  562 => 291,  560 => 290,  557 => 289,  552 => 286,  550 => 285,  537 => 275,  531 => 271,  497 => 238,  487 => 230,  484 => 229,  481 => 227,  473 => 221,  460 => 214,  455 => 212,  451 => 211,  447 => 210,  443 => 209,  440 => 208,  436 => 206,  428 => 204,  426 => 203,  422 => 201,  418 => 200,  398 => 183,  392 => 179,  389 => 178,  386 => 176,  378 => 170,  365 => 163,  360 => 161,  356 => 160,  352 => 159,  349 => 158,  345 => 156,  337 => 154,  335 => 153,  331 => 151,  327 => 150,  308 => 134,  302 => 130,  299 => 129,  296 => 127,  288 => 121,  275 => 114,  270 => 112,  266 => 111,  262 => 110,  259 => 109,  254 => 106,  249 => 104,  242 => 103,  240 => 102,  236 => 100,  232 => 99,  213 => 83,  207 => 79,  204 => 78,  190 => 66,  172 => 51,  154 => 36,  145 => 29,  142 => 27,  130 => 21,  127 => 20,  122 => 19,  117 => 15,  111 => 13,  109 => 12,  104 => 9,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'back/admin_base.html.twig' %}

{% block title %}Alertes Critiques — Administration{% endblock %}

{% block admin_content %}
<div class=\"container-fluid px-4\">

    {# Header #}
    <div class=\"d-flex justify-content-between align-items-center mb-4\">
        <h1 class=\"h3 mb-0\">
            <i class=\"fa fa-exclamation-triangle text-danger\"></i> Alertes Critiques
            {% if nb_nouvelles > 0 %}
                <span class=\"badge bg-danger\">{{ nb_nouvelles }} nouvelles</span>
            {% endif %}
        </h1>
    </div>

    {# Flash messages #}
    {% for msg in app.flashes('success') %}
        <div class=\"alert alert-success alert-dismissible fade show shadow-sm\" role=\"alert\">
            <i class=\"fa fa-check-circle\"></i> {{ msg }}
            <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
                <span aria-hidden=\"true\">&times;</span>
            </button>
        </div>
    {% endfor %}

    {# Cartes statistiques #}
    <div class=\"row mb-4\">
        <div class=\"col-md-4\">
            <div class=\"card border-left-danger shadow-sm\">
                <div class=\"card-body\">
                    <div class=\"row align-items-center\">
                        <div class=\"col-8\">
                            <h6 class=\"text-muted mb-1\">Nouvelles</h6>
                            <h2 class=\"mb-0 text-danger\">{{ nouvelles|length }}</h2>
                        </div>
                        <div class=\"col-4 text-right\">
                            <i class=\"fa fa-bell fa-2x text-danger\"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"col-md-4\">
            <div class=\"card border-left-warning shadow-sm\">
                <div class=\"card-body\">
                    <div class=\"row align-items-center\">
                        <div class=\"col-8\">
                            <h6 class=\"text-muted mb-1\">En cours</h6>
                            <h2 class=\"mb-0 text-warning\">{{ en_cours|length }}</h2>
                        </div>
                        <div class=\"col-4 text-right\">
                            <i class=\"fa fa-spinner fa-2x text-warning\"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class=\"col-md-4\">
            <div class=\"card border-left-success shadow-sm\">
                <div class=\"card-body\">
                    <div class=\"row align-items-center\">
                        <div class=\"col-8\">
                            <h6 class=\"text-muted mb-1\">Traitées</h6>
                            <h2 class=\"mb-0 text-success\">{{ traitees|length }}</h2>
                        </div>
                        <div class=\"col-4 text-right\">
                            <i class=\"fa fa-check-circle fa-2x text-success\"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {# Nouvelles alertes #}
    {% if nouvelles is not empty %}
    <div class=\"card shadow-sm mb-4\">
        <div class=\"card-header bg-danger text-white\">
            <h5 class=\"mb-0\">
                <i class=\"fa fa-bell\"></i> Nouvelles alertes
                <span class=\"badge badge-light ml-2\">{{ nouvelles|length }}</span>
            </h5>
        </div>
        <div class=\"card-body\">
            <div class=\"table-responsive\">
                <table class=\"table table-hover table-bordered\">
                    <thead class=\"bg-light\">
                        <tr>
                            <th><i class=\"fa fa-user\"></i> Utilisateur</th>
                            <th><i class=\"fa fa-envelope\"></i> Email</th>
                            <th><i class=\"fa fa-puzzle-piece\"></i> Test</th>
                            <th><i class=\"fa fa-calendar\"></i> Date</th>
                            <th><i class=\"fa fa-cog\"></i> Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {% for alerte in nouvelles %}
                        <tr class=\"alert-row\">
                            <td>
                                {% if alerte.utilisateur %}
                                    <strong>{{ alerte.utilisateur.firstname }} {{ alerte.utilisateur.lastname }}</strong>
                                    <br><small class=\"text-muted\">ID: {{ alerte.utilisateur.id }}</small>
                                {% else %}
                                    <span class=\"text-muted\">Anonyme</span>
                                    <br><small class=\"text-muted\">Non connecté</small>
                                {% endif %}
                            </td>
                            <td>{{ alerte.utilisateur ? alerte.utilisateur.email : 'Non renseigné' }}</td>
                            <td><span class=\"badge badge-info\">{{ alerte.test.titre }}</span></td>
                            <td>{{ alerte.createdAt|date('d/m/Y H:i') }}</td>
                            <td>
                                <a href=\"{{ path('admin_alertes_detail', {id: alerte.id}) }}\"
                                   class=\"btn btn-danger btn-sm\">
                                    <i class=\"fa fa-eye\"></i> Traiter
                                </a>
                            </td>
                        </tr>
                        {% endfor %}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {% endif %}

    {# En cours #}
    {% if en_cours is not empty %}
    <div class=\"card shadow-sm mb-4\">
        <div class=\"card-header bg-warning\">
            <h5 class=\"mb-0\">
                <i class=\"fa fa-spinner fa-spin\"></i> En cours de traitement
                <span class=\"badge badge-dark ml-2\">{{ en_cours|length }}</span>
            </h5>
        </div>
        <div class=\"card-body\">
            <div class=\"table-responsive\">
                <table class=\"table table-hover table-bordered\">
                    <thead class=\"bg-light\">
                        <tr>
                            <th><i class=\"fa fa-user\"></i> Utilisateur</th>
                            <th><i class=\"fa fa-envelope\"></i> Email</th>
                            <th><i class=\"fa fa-puzzle-piece\"></i> Test</th>
                            <th><i class=\"fa fa-calendar\"></i> Date</th>
                            <th><i class=\"fa fa-cog\"></i> Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {% for alerte in en_cours %}
                        <tr class=\"alert-row\">
                            <td>
                                {% if alerte.utilisateur %}
                                    {{ alerte.utilisateur.firstname }} {{ alerte.utilisateur.lastname }}
                                {% else %}
                                    <span class=\"text-muted\">Anonyme</span>
                                {% endif %}
                            </td>
                            <td>{{ alerte.utilisateur ? alerte.utilisateur.email : 'Non renseigné' }}</td>
                            <td><span class=\"badge badge-info\">{{ alerte.test.titre }}</span></td>
                            <td>{{ alerte.createdAt|date('d/m/Y H:i') }}</td>
                            <td>
                                <a href=\"{{ path('admin_alertes_detail', {id: alerte.id}) }}\"
                                   class=\"btn btn-warning btn-sm\">
                                    <i class=\"fa fa-eye\"></i> Suivre
                                </a>
                            </td>
                        </tr>
                        {% endfor %}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {% endif %}

    {# Traitées #}
    {% if traitees is not empty %}
    <div class=\"card shadow-sm mb-4\">
        <div class=\"card-header bg-success text-white\">
            <h5 class=\"mb-0\">
                <i class=\"fa fa-check-circle\"></i> Alertes traitées
                <span class=\"badge badge-light ml-2\">{{ traitees|length }}</span>
            </h5>
        </div>
        <div class=\"card-body\">
            <div class=\"table-responsive\">
                <table class=\"table table-hover table-bordered\">
                    <thead class=\"bg-light\">
                        <tr>
                            <th><i class=\"fa fa-user\"></i> Utilisateur</th>
                            <th><i class=\"fa fa-puzzle-piece\"></i> Test</th>
                            <th><i class=\"fa fa-calendar\"></i> Détectée</th>
                            <th><i class=\"fa fa-check\"></i> Traitée</th>
                            <th><i class=\"fa fa-user-md\"></i> Traité par</th>
                            <th><i class=\"fa fa-cog\"></i> Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        {% for alerte in traitees %}
                        <tr>
                            <td>
                                {% if alerte.utilisateur %}
                                    {{ alerte.utilisateur.firstname }} {{ alerte.utilisateur.lastname }}
                                {% else %}
                                    <span class=\"text-muted\">Anonyme</span>
                                {% endif %}
                            </td>
                            <td>{{ alerte.test.titre }}</td>
                            <td>{{ alerte.createdAt|date('d/m/Y H:i') }}</td>
                            <td>{{ alerte.traiteLe ? alerte.traiteLe|date('d/m/Y H:i') : '-' }}</td>
                            <td>{{ alerte.traitePar ?? 'Admin' }}</td>
                            <td>
                                <a href=\"{{ path('admin_alertes_detail', {id: alerte.id}) }}\"
                                   class=\"btn btn-outline-success btn-sm\">
                                    <i class=\"fa fa-eye\"></i> Voir
                                </a>
                            </td>
                        </tr>
                        {% endfor %}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {% endif %}

    {# Message vide #}
    {% if nouvelles is empty and en_cours is empty and traitees is empty %}
        <div class=\"card shadow-sm\">
            <div class=\"card-body text-center py-5\">
                <i class=\"fa fa-check-circle fa-4x text-success mb-3\"></i>
                <h4 class=\"text-muted\">Aucune alerte critique</h4>
                <p class=\"text-muted\">Toutes les alertes ont été traitées.</p>
            </div>
        </div>
    {% endif %}

</div>

<style>
.border-left-danger { border-left: 4px solid #dc3545; }
.border-left-warning { border-left: 4px solid #ffc107; }
.border-left-success { border-left: 4px solid #28a745; }

.alert-row {
    transition: all 0.2s ease;
}
.alert-row:hover {
    background-color: #f8f9fc;
    transform: translateX(2px);
}

.card {
    border: none;
    border-radius: 10px;
}
.card-header {
    border-radius: 10px 10px 0 0;
}
.table th {
    border-top: none;
    font-weight: 600;
}
.badge-light {
    background-color: rgba(255,255,255,0.25);
    color: white;
}
</style>
{# ... le reste de votre template ... #}

<script>
    // Fonction pour jouer le son d'alerte
    function playAlertSound() {
        const audio = new Audio(\"{{ asset('sounds/alert.mp3') }}\");
        audio.volume = 0.5; // Ajustez le volume (0.0 à 1.0)
        audio.play().catch(error => {
            // Les navigateurs modernes bloquent souvent la lecture automatique.
            console.log(\"Lecture audio automatique bloquée par le navigateur.\", error);
        });
    }

    // Vérifie s'il y a de nouvelles alertes et joue le son
    // La variable 'nouvelles' est passée depuis votre contrôleur
    {% if nouvelles is defined and nouvelles|length > 0 %}
        // On ajoute un petit délai pour s'assurer que la page est chargée
        setTimeout(playAlertSound, 500);
    {% endif %}
</script>
{% if nouvelles|length > 0 %}

<div id=\"alert-float\" style=\"
    position: fixed; bottom: 30px; right: 30px; z-index: 9999;
    display: flex; flex-direction: column; align-items: flex-end; gap: 8px;
\">
    {# Bulle de notification #}
    <div id=\"alert-bubble\" style=\"
        background: #dc3545; color: white;
        padding: 12px 16px; border-radius: 12px;
        box-shadow: 0 4px 15px rgba(220,53,69,0.5);
        font-size: 0.85rem; font-weight: bold;
        display: none; max-width: 220px; text-align: center;
    \">
        🔴 {{ nouvelles|length }} alerte(s) critique(s)<br>
        <small style=\"font-weight:normal;\">Cliquez sur la cloche pour activer le son</small>
    </div>

    {# Bouton cloche flottant #}
    <button id=\"btn-alerte\" title=\"Alertes critiques\" style=\"
        width: 58px; height: 58px; border-radius: 50%;
        background: #dc3545; color: white; border: none;
        font-size: 1.5rem; cursor: pointer;
        box-shadow: 0 4px 15px rgba(220,53,69,0.5);
        position: relative;
        animation: ring 1.5s ease infinite;
    \">
        🔔
        <span style=\"
            position: absolute; top: -4px; right: -4px;
            background: white; color: #dc3545;
            border-radius: 50%; width: 22px; height: 22px;
            font-size: 0.7rem; font-weight: bold;
            display: flex; align-items: center; justify-content: center;
            border: 2px solid #dc3545;
        \">{{ nouvelles|length }}</span>
    </button>
</div>

<style>
@keyframes ring {
    0%   { transform: rotate(0deg); }
    10%  { transform: rotate(15deg); }
    20%  { transform: rotate(-15deg); }
    30%  { transform: rotate(10deg); }
    40%  { transform: rotate(-10deg); }
    50%  { transform: rotate(0deg); }
    100% { transform: rotate(0deg); }
}
</style>

<script>
(function() {
    const btn = document.getElementById('btn-alerte');
    const bubble = document.getElementById('alert-bubble');
    let soundPlayed = false;

    // Afficher/cacher la bulle au survol
    btn.addEventListener('mouseenter', function() {
        bubble.style.display = 'block';
    });
    btn.addEventListener('mouseleave', function() {
        bubble.style.display = 'none';
    });

    // Jouer le son au clic
    btn.addEventListener('click', function() {
        if (soundPlayed) return;
        soundPlayed = true;

        // Arrêter l'animation
        btn.style.animation = 'none';
        btn.style.background = '#6c757d';
        btn.title = 'Son joué';

        // 3 bips puis stop
        try {
            const ctx = new (window.AudioContext || window.webkitAudioContext)();
            const bips = [0, 0.55, 1.1];
            bips.forEach(function(t) {
                const osc = ctx.createOscillator();
                const gain = ctx.createGain();
                osc.connect(gain);
                gain.connect(ctx.destination);
                osc.type = 'sine';
                osc.frequency.value = 880;
                gain.gain.setValueAtTime(0.4, ctx.currentTime + t);
                gain.gain.exponentialRampToValueAtTime(0.001, ctx.currentTime + t + 0.45);
                osc.start(ctx.currentTime + t);
                osc.stop(ctx.currentTime + t + 0.45);
            });
        } catch(e) {
            console.warn('Audio non supporté:', e);
        }
    });
})();
</script>

{% endif %}

{% endblock %}", "back/alertes/index.html.twig", "C:\\Users\\sirine\\psy\\templates\\back\\alertes\\index.html.twig");
    }
}
