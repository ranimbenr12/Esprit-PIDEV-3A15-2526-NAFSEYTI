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

/* back/alertes/detail.html.twig */
class __TwigTemplate_2783d2c66769f8ca7d88fba65a8e8b05 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/alertes/detail.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/alertes/detail.html.twig"));

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

        yield "Alerte #";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["alerte"]) || array_key_exists("alerte", $context) ? $context["alerte"] : (function () { throw new RuntimeError('Variable "alerte" does not exist.', 3, $this->source); })()), "id", [], "any", false, false, false, 3), "html", null, true);
        yield " — Administration";
        
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

    <div class=\"mb-3\">
        <a href=\"";
        // line 9
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_alertes_index");
        yield "\" class=\"btn btn-secondary\">
            <i class=\"fa fa-arrow-left\"></i> Retour aux alertes
        </a>
        
        ";
        // line 13
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["alerte"]) || array_key_exists("alerte", $context) ? $context["alerte"] : (function () { throw new RuntimeError('Variable "alerte" does not exist.', 13, $this->source); })()), "statut", [], "any", false, false, false, 13) != "traite")) {
            // line 14
            yield "        <button onclick=\"window.print()\" class=\"btn btn-info ml-2\">
            <i class=\"fa fa-print\"></i> Imprimer
        </button>
        ";
        }
        // line 18
        yield "    </div>

    <div class=\"card border-danger shadow-sm\">
        <div class=\"card-header bg-danger text-white\">
            <div class=\"d-flex justify-content-between align-items-center\">
                <h4 class=\"mb-0\">
                    <i class=\"fa fa-exclamation-triangle\"></i> Alerte #";
        // line 24
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["alerte"]) || array_key_exists("alerte", $context) ? $context["alerte"] : (function () { throw new RuntimeError('Variable "alerte" does not exist.', 24, $this->source); })()), "id", [], "any", false, false, false, 24), "html", null, true);
        yield "
                </h4>
                <div>
                    ";
        // line 27
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["alerte"]) || array_key_exists("alerte", $context) ? $context["alerte"] : (function () { throw new RuntimeError('Variable "alerte" does not exist.', 27, $this->source); })()), "statut", [], "any", false, false, false, 27) == "nouveau")) {
            // line 28
            yield "                        <span class=\"badge bg-light text-danger\">
                            <i class=\"fa fa-bell\"></i> 🔴 Nouvelle
                        </span>
                    ";
        } elseif ((CoreExtension::getAttribute($this->env, $this->source,         // line 31
(isset($context["alerte"]) || array_key_exists("alerte", $context) ? $context["alerte"] : (function () { throw new RuntimeError('Variable "alerte" does not exist.', 31, $this->source); })()), "statut", [], "any", false, false, false, 31) == "en_cours")) {
            // line 32
            yield "                        <span class=\"badge bg-warning text-dark\">
                            <i class=\"fa fa-spinner fa-spin\"></i> 🟡 En cours
                        </span>
                    ";
        } else {
            // line 36
            yield "                        <span class=\"badge bg-success\">
                            <i class=\"fa fa-check-circle\"></i> ✅ Traitée
                        </span>
                    ";
        }
        // line 40
        yield "                </div>
            </div>
        </div>
        
        <div class=\"card-body\">

            ";
        // line 47
        yield "            <div class=\"card bg-light mb-4\">
                <div class=\"card-body\">
                    <h5 class=\"card-title text-danger\">
                        <i class=\"fa fa-user-circle\"></i> Informations utilisateur
                    </h5>
                    <div class=\"row\">
                        <div class=\"col-md-6\">
                            <small class=\"text-muted\">Nom complet</small>
                            <div class=\"font-weight-bold\">
                                ";
        // line 56
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["alerte"]) || array_key_exists("alerte", $context) ? $context["alerte"] : (function () { throw new RuntimeError('Variable "alerte" does not exist.', 56, $this->source); })()), "utilisateur", [], "any", false, false, false, 56)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 57
            yield "                                    ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["alerte"]) || array_key_exists("alerte", $context) ? $context["alerte"] : (function () { throw new RuntimeError('Variable "alerte" does not exist.', 57, $this->source); })()), "utilisateur", [], "any", false, false, false, 57), "firstname", [], "any", false, false, false, 57), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["alerte"]) || array_key_exists("alerte", $context) ? $context["alerte"] : (function () { throw new RuntimeError('Variable "alerte" does not exist.', 57, $this->source); })()), "utilisateur", [], "any", false, false, false, 57), "lastname", [], "any", false, false, false, 57), "html", null, true);
            yield "
                                ";
        } else {
            // line 59
            yield "                                    <span class=\"text-muted\">Anonyme (non connecté)</span>
                                ";
        }
        // line 61
        yield "                            </div>
                        </div>
                        <div class=\"col-md-6\">
                            <small class=\"text-muted\">Email</small>
                            <div>
                                ";
        // line 66
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["alerte"]) || array_key_exists("alerte", $context) ? $context["alerte"] : (function () { throw new RuntimeError('Variable "alerte" does not exist.', 66, $this->source); })()), "utilisateur", [], "any", false, false, false, 66)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 67
            yield "                                    ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["alerte"]) || array_key_exists("alerte", $context) ? $context["alerte"] : (function () { throw new RuntimeError('Variable "alerte" does not exist.', 67, $this->source); })()), "utilisateur", [], "any", false, false, false, 67), "email", [], "any", false, false, false, 67), "html", null, true);
            yield "
                                ";
        } else {
            // line 69
            yield "                                    <span class=\"text-muted\">Non renseigné</span>
                                ";
        }
        // line 71
        yield "                            </div>
                        </div>
                        <div class=\"col-md-6 mt-2\">
                            <small class=\"text-muted\">Téléphone</small>
                            <div>
                                ";
        // line 76
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["alerte"]) || array_key_exists("alerte", $context) ? $context["alerte"] : (function () { throw new RuntimeError('Variable "alerte" does not exist.', 76, $this->source); })()), "utilisateur", [], "any", false, false, false, 76) && CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["alerte"]) || array_key_exists("alerte", $context) ? $context["alerte"] : (function () { throw new RuntimeError('Variable "alerte" does not exist.', 76, $this->source); })()), "utilisateur", [], "any", false, false, false, 76), "phone_number", [], "any", false, false, false, 76))) {
            // line 77
            yield "                                    ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["alerte"]) || array_key_exists("alerte", $context) ? $context["alerte"] : (function () { throw new RuntimeError('Variable "alerte" does not exist.', 77, $this->source); })()), "utilisateur", [], "any", false, false, false, 77), "phone_number", [], "any", false, false, false, 77), "html", null, true);
            yield "
                                ";
        } else {
            // line 79
            yield "                                    <span class=\"text-muted\">Non renseigné</span>
                                ";
        }
        // line 81
        yield "                            </div>
                        </div>
                        <div class=\"col-md-6 mt-2\">
                            <small class=\"text-muted\">Test passé</small>
                            <div>
                                <span class=\"badge badge-info\">";
        // line 86
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["alerte"]) || array_key_exists("alerte", $context) ? $context["alerte"] : (function () { throw new RuntimeError('Variable "alerte" does not exist.', 86, $this->source); })()), "test", [], "any", false, false, false, 86), "titre", [], "any", false, false, false, 86), "html", null, true);
        yield "</span>
                            </div>
                        </div>
                        <div class=\"col-md-6 mt-2\">
                            <small class=\"text-muted\">Détectée le</small>
                            <div>";
        // line 91
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["alerte"]) || array_key_exists("alerte", $context) ? $context["alerte"] : (function () { throw new RuntimeError('Variable "alerte" does not exist.', 91, $this->source); })()), "createdAt", [], "any", false, false, false, 91), "d/m/Y à H:i"), "html", null, true);
        yield "</div>
                        </div>
                    </div>
                </div>
            </div>

            ";
        // line 98
        yield "            <div class=\"card mb-4\">
                <div class=\"card-header bg-danger text-white\">
                    <h5 class=\"mb-0\"><i class=\"fa fa-comments\"></i> Réponses de l'utilisateur</h5>
                </div>
                <div class=\"card-body\">
                    <div style=\"background: #f8f9fc; padding: 15px; border-radius: 8px; white-space: pre-line; font-size: 0.95rem; max-height: 400px; overflow-y: auto;\">
                        ";
        // line 104
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["alerte"] ?? null), "reponsesResume", [], "any", true, true, false, 104) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["alerte"]) || array_key_exists("alerte", $context) ? $context["alerte"] : (function () { throw new RuntimeError('Variable "alerte" does not exist.', 104, $this->source); })()), "reponsesResume", [], "any", false, false, false, 104)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["alerte"]) || array_key_exists("alerte", $context) ? $context["alerte"] : (function () { throw new RuntimeError('Variable "alerte" does not exist.', 104, $this->source); })()), "reponsesResume", [], "any", false, false, false, 104), "html", null, true)) : ("Non disponible"));
        yield "
                    </div>
                </div>
            </div>

   ";
        // line 110
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["alerte"]) || array_key_exists("alerte", $context) ? $context["alerte"] : (function () { throw new RuntimeError('Variable "alerte" does not exist.', 110, $this->source); })()), "notesAdmin", [], "any", false, false, false, 110)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 111
            yield "<div class=\"card mb-4\">
    <div class=\"card-header bg-light\">
        <h5 class=\"mb-0 text-secondary\">
            <i class=\"fa fa-sticky-note\"></i> Notes précédentes
        </h5>
    </div>
    <div class=\"card-body bg-light\">
        <div style=\"background: white; padding: 15px; border-radius: 8px; border-left: 3px solid #6c757d;\">
            ";
            // line 119
            yield Twig\Extension\CoreExtension::nl2br($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["alerte"]) || array_key_exists("alerte", $context) ? $context["alerte"] : (function () { throw new RuntimeError('Variable "alerte" does not exist.', 119, $this->source); })()), "notesAdmin", [], "any", false, false, false, 119), "html", null, true));
            yield "
        </div>
    </div>
</div>

";
        }
        // line 125
        yield "
            ";
        // line 127
        yield "            ";
        if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["alerte"]) || array_key_exists("alerte", $context) ? $context["alerte"] : (function () { throw new RuntimeError('Variable "alerte" does not exist.', 127, $this->source); })()), "statut", [], "any", false, false, false, 127) != "traite")) {
            // line 128
            yield "            <div class=\"card border-danger\">
                <div class=\"card-header bg-danger text-white\">
                    <h5 class=\"mb-0\"><i class=\"fa fa-cogs\"></i> Traitement de l'alerte</h5>
                </div>
                <div class=\"card-body\">
                    <form method=\"POST\" action=\"";
            // line 133
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("admin_alertes_statut", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["alerte"]) || array_key_exists("alerte", $context) ? $context["alerte"] : (function () { throw new RuntimeError('Variable "alerte" does not exist.', 133, $this->source); })()), "id", [], "any", false, false, false, 133)]), "html", null, true);
            yield "\">
                        <div class=\"mb-3\">
                            <label class=\"form-label font-weight-bold\">Statut</label>
                            <select name=\"statut\" class=\"form-control\">
                                <option value=\"nouveau\" ";
            // line 137
            if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["alerte"]) || array_key_exists("alerte", $context) ? $context["alerte"] : (function () { throw new RuntimeError('Variable "alerte" does not exist.', 137, $this->source); })()), "statut", [], "any", false, false, false, 137) == "nouveau")) {
                yield "selected";
            }
            yield ">
                                    🔴 Nouveau - À traiter
                                </option>
                                <option value=\"en_cours\" ";
            // line 140
            if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["alerte"]) || array_key_exists("alerte", $context) ? $context["alerte"] : (function () { throw new RuntimeError('Variable "alerte" does not exist.', 140, $this->source); })()), "statut", [], "any", false, false, false, 140) == "en_cours")) {
                yield "selected";
            }
            yield ">
                                    🟡 En cours - En traitement
                                </option>
                                <option value=\"traite\">✅ Traité - Résolu</option>
                            </select>
                        </div>
                        
                        <div class=\"mb-3\">
                            <label class=\"form-label font-weight-bold\">Notes internes</label>
                            <textarea name=\"notes\" class=\"form-control\" rows=\"5\"
                                      placeholder=\"Ex: Contacté par email, orienté vers un professionnel...\">";
            // line 150
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["alerte"]) || array_key_exists("alerte", $context) ? $context["alerte"] : (function () { throw new RuntimeError('Variable "alerte" does not exist.', 150, $this->source); })()), "notesAdmin", [], "any", false, false, false, 150), "html", null, true);
            yield "</textarea>
                            <small class=\"text-muted\">Ces notes sont privées (visibles uniquement par les admins).</small>
                        </div>
                        
                        <button type=\"submit\" class=\"btn btn-danger\">
                            <i class=\"fa fa-save\"></i> Enregistrer
                        </button>
                    </form>
                </div>
            </div>
            ";
        } else {
            // line 161
            yield "            <div class=\"alert alert-success shadow-sm\">
            ";
            // line 162
            if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["alerte"]) || array_key_exists("alerte", $context) ? $context["alerte"] : (function () { throw new RuntimeError('Variable "alerte" does not exist.', 162, $this->source); })()), "statut", [], "any", false, false, false, 162) == "en_cours")) {
                // line 163
                yield "<div class=\"text-right mt-3\">
    <button type=\"submit\" name=\"statut\" value=\"traite\" class=\"btn btn-success btn-lg\">
        <i class=\"fa fa-check-circle\"></i> ✅ Marquer comme traitée
    </button>
</div>
";
            }
            // line 169
            yield "                <div class=\"d-flex align-items-center\">
                    <div class=\"mr-3\">
                        <i class=\"fa fa-check-circle fa-2x\"></i>
                    </div>
                    <div>
                        <h5 class=\"mb-1\">Alerte traitée</h5>
                        <p class=\"mb-0\">
                            Cette alerte a été traitée le <strong>";
            // line 176
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, (isset($context["alerte"]) || array_key_exists("alerte", $context) ? $context["alerte"] : (function () { throw new RuntimeError('Variable "alerte" does not exist.', 176, $this->source); })()), "traiteLe", [], "any", false, false, false, 176), "d/m/Y à H:i"), "html", null, true);
            yield "</strong> 
                            par <strong>";
            // line 177
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["alerte"]) || array_key_exists("alerte", $context) ? $context["alerte"] : (function () { throw new RuntimeError('Variable "alerte" does not exist.', 177, $this->source); })()), "traitePar", [], "any", false, false, false, 177), "html", null, true);
            yield "</strong>.
                        </p>
                    </div>
                </div>
            </div>
            ";
        }
        // line 183
        yield "
        </div>
    </div>
</div>

<style>
.bg-opacity-10 {
    background-color: rgba(255, 193, 7, 0.1);
}
@media print {
    .btn, .topbar, .sidebar, .right_topbar {
        display: none !important;
    }
    .card {
        break-inside: avoid;
    }
}
</style>
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
        return "back/alertes/detail.html.twig";
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
        return array (  381 => 183,  372 => 177,  368 => 176,  359 => 169,  351 => 163,  349 => 162,  346 => 161,  332 => 150,  317 => 140,  309 => 137,  302 => 133,  295 => 128,  292 => 127,  289 => 125,  280 => 119,  270 => 111,  268 => 110,  260 => 104,  252 => 98,  243 => 91,  235 => 86,  228 => 81,  224 => 79,  218 => 77,  216 => 76,  209 => 71,  205 => 69,  199 => 67,  197 => 66,  190 => 61,  186 => 59,  178 => 57,  176 => 56,  165 => 47,  157 => 40,  151 => 36,  145 => 32,  143 => 31,  138 => 28,  136 => 27,  130 => 24,  122 => 18,  116 => 14,  114 => 13,  107 => 9,  102 => 6,  89 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'back/admin_base.html.twig' %}

{% block title %}Alerte #{{ alerte.id }} — Administration{% endblock %}

{% block admin_content %}
<div class=\"container-fluid px-4\">

    <div class=\"mb-3\">
        <a href=\"{{ path('admin_alertes_index') }}\" class=\"btn btn-secondary\">
            <i class=\"fa fa-arrow-left\"></i> Retour aux alertes
        </a>
        
        {% if alerte.statut != 'traite' %}
        <button onclick=\"window.print()\" class=\"btn btn-info ml-2\">
            <i class=\"fa fa-print\"></i> Imprimer
        </button>
        {% endif %}
    </div>

    <div class=\"card border-danger shadow-sm\">
        <div class=\"card-header bg-danger text-white\">
            <div class=\"d-flex justify-content-between align-items-center\">
                <h4 class=\"mb-0\">
                    <i class=\"fa fa-exclamation-triangle\"></i> Alerte #{{ alerte.id }}
                </h4>
                <div>
                    {% if alerte.statut == 'nouveau' %}
                        <span class=\"badge bg-light text-danger\">
                            <i class=\"fa fa-bell\"></i> 🔴 Nouvelle
                        </span>
                    {% elseif alerte.statut == 'en_cours' %}
                        <span class=\"badge bg-warning text-dark\">
                            <i class=\"fa fa-spinner fa-spin\"></i> 🟡 En cours
                        </span>
                    {% else %}
                        <span class=\"badge bg-success\">
                            <i class=\"fa fa-check-circle\"></i> ✅ Traitée
                        </span>
                    {% endif %}
                </div>
            </div>
        </div>
        
        <div class=\"card-body\">

            {# Informations utilisateur #}
            <div class=\"card bg-light mb-4\">
                <div class=\"card-body\">
                    <h5 class=\"card-title text-danger\">
                        <i class=\"fa fa-user-circle\"></i> Informations utilisateur
                    </h5>
                    <div class=\"row\">
                        <div class=\"col-md-6\">
                            <small class=\"text-muted\">Nom complet</small>
                            <div class=\"font-weight-bold\">
                                {% if alerte.utilisateur %}
                                    {{ alerte.utilisateur.firstname }} {{ alerte.utilisateur.lastname }}
                                {% else %}
                                    <span class=\"text-muted\">Anonyme (non connecté)</span>
                                {% endif %}
                            </div>
                        </div>
                        <div class=\"col-md-6\">
                            <small class=\"text-muted\">Email</small>
                            <div>
                                {% if alerte.utilisateur %}
                                    {{ alerte.utilisateur.email }}
                                {% else %}
                                    <span class=\"text-muted\">Non renseigné</span>
                                {% endif %}
                            </div>
                        </div>
                        <div class=\"col-md-6 mt-2\">
                            <small class=\"text-muted\">Téléphone</small>
                            <div>
                                {% if alerte.utilisateur and alerte.utilisateur.phone_number %}
                                    {{ alerte.utilisateur.phone_number }}
                                {% else %}
                                    <span class=\"text-muted\">Non renseigné</span>
                                {% endif %}
                            </div>
                        </div>
                        <div class=\"col-md-6 mt-2\">
                            <small class=\"text-muted\">Test passé</small>
                            <div>
                                <span class=\"badge badge-info\">{{ alerte.test.titre }}</span>
                            </div>
                        </div>
                        <div class=\"col-md-6 mt-2\">
                            <small class=\"text-muted\">Détectée le</small>
                            <div>{{ alerte.createdAt|date('d/m/Y à H:i') }}</div>
                        </div>
                    </div>
                </div>
            </div>

            {# Résumé des réponses #}
            <div class=\"card mb-4\">
                <div class=\"card-header bg-danger text-white\">
                    <h5 class=\"mb-0\"><i class=\"fa fa-comments\"></i> Réponses de l'utilisateur</h5>
                </div>
                <div class=\"card-body\">
                    <div style=\"background: #f8f9fc; padding: 15px; border-radius: 8px; white-space: pre-line; font-size: 0.95rem; max-height: 400px; overflow-y: auto;\">
                        {{ alerte.reponsesResume ?? 'Non disponible' }}
                    </div>
                </div>
            </div>

   {# Notes admin existantes #}
{% if alerte.notesAdmin %}
<div class=\"card mb-4\">
    <div class=\"card-header bg-light\">
        <h5 class=\"mb-0 text-secondary\">
            <i class=\"fa fa-sticky-note\"></i> Notes précédentes
        </h5>
    </div>
    <div class=\"card-body bg-light\">
        <div style=\"background: white; padding: 15px; border-radius: 8px; border-left: 3px solid #6c757d;\">
            {{ alerte.notesAdmin|nl2br }}
        </div>
    </div>
</div>

{% endif %}

            {# Formulaire de traitement #}
            {% if alerte.statut != 'traite' %}
            <div class=\"card border-danger\">
                <div class=\"card-header bg-danger text-white\">
                    <h5 class=\"mb-0\"><i class=\"fa fa-cogs\"></i> Traitement de l'alerte</h5>
                </div>
                <div class=\"card-body\">
                    <form method=\"POST\" action=\"{{ path('admin_alertes_statut', {id: alerte.id}) }}\">
                        <div class=\"mb-3\">
                            <label class=\"form-label font-weight-bold\">Statut</label>
                            <select name=\"statut\" class=\"form-control\">
                                <option value=\"nouveau\" {% if alerte.statut == 'nouveau' %}selected{% endif %}>
                                    🔴 Nouveau - À traiter
                                </option>
                                <option value=\"en_cours\" {% if alerte.statut == 'en_cours' %}selected{% endif %}>
                                    🟡 En cours - En traitement
                                </option>
                                <option value=\"traite\">✅ Traité - Résolu</option>
                            </select>
                        </div>
                        
                        <div class=\"mb-3\">
                            <label class=\"form-label font-weight-bold\">Notes internes</label>
                            <textarea name=\"notes\" class=\"form-control\" rows=\"5\"
                                      placeholder=\"Ex: Contacté par email, orienté vers un professionnel...\">{{ alerte.notesAdmin }}</textarea>
                            <small class=\"text-muted\">Ces notes sont privées (visibles uniquement par les admins).</small>
                        </div>
                        
                        <button type=\"submit\" class=\"btn btn-danger\">
                            <i class=\"fa fa-save\"></i> Enregistrer
                        </button>
                    </form>
                </div>
            </div>
            {% else %}
            <div class=\"alert alert-success shadow-sm\">
            {% if alerte.statut == 'en_cours' %}
<div class=\"text-right mt-3\">
    <button type=\"submit\" name=\"statut\" value=\"traite\" class=\"btn btn-success btn-lg\">
        <i class=\"fa fa-check-circle\"></i> ✅ Marquer comme traitée
    </button>
</div>
{% endif %}
                <div class=\"d-flex align-items-center\">
                    <div class=\"mr-3\">
                        <i class=\"fa fa-check-circle fa-2x\"></i>
                    </div>
                    <div>
                        <h5 class=\"mb-1\">Alerte traitée</h5>
                        <p class=\"mb-0\">
                            Cette alerte a été traitée le <strong>{{ alerte.traiteLe|date('d/m/Y à H:i') }}</strong> 
                            par <strong>{{ alerte.traitePar }}</strong>.
                        </p>
                    </div>
                </div>
            </div>
            {% endif %}

        </div>
    </div>
</div>

<style>
.bg-opacity-10 {
    background-color: rgba(255, 193, 7, 0.1);
}
@media print {
    .btn, .topbar, .sidebar, .right_topbar {
        display: none !important;
    }
    .card {
        break-inside: avoid;
    }
}
</style>
{% endblock %}", "back/alertes/detail.html.twig", "C:\\Users\\sirine\\psy\\templates\\back\\alertes\\detail.html.twig");
    }
}
