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

/* back/_rendezvous_rows.html.twig */
class __TwigTemplate_4d4dbc6816e166626e1b0edcf00f427a extends Template
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

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/_rendezvous_rows.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/_rendezvous_rows.html.twig"));

        // line 2
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["rendezvous"]) || array_key_exists("rendezvous", $context) ? $context["rendezvous"] : (function () { throw new RuntimeError('Variable "rendezvous" does not exist.', 2, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["rdv"]) {
            // line 3
            yield "<tr class=\"rdv-row\" data-statut=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "statut", [], "any", false, false, false, 3), "html", null, true);
            yield "\">
    <td>
        <div class=\"td-avatar\">
            <div class=\"av-circle av-3\">
                ";
            // line 7
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "medecin", [], "any", false, false, false, 7), "firstname", [], "any", false, false, false, 7), 0, 1), "html", null, true);
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "medecin", [], "any", false, false, false, 7), "lastname", [], "any", false, false, false, 7), 0, 1), "html", null, true);
            yield "
            </div>
            <div>
                <div style=\"font-weight:500;color:#1a2e1a;\">
                    Dr. ";
            // line 11
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "medecin", [], "any", false, false, false, 11), "firstname", [], "any", false, false, false, 11), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "medecin", [], "any", false, false, false, 11), "lastname", [], "any", false, false, false, 11), "html", null, true);
            yield "
                </div>
                <div style=\"font-size:11px;color:#aaa;\">Psychologue</div>
            </div>
        </div>
    </td>
    <td>
        <span class=\"date-pill\">
            <i class=\"fa fa-calendar\" style=\"font-size:11px;\"></i>
            ";
            // line 20
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "dateRendezVous", [], "any", false, false, false, 20), "d/m/Y"), "html", null, true);
            yield "
        </span>
    </td>
    <td>
        <span class=\"time-badge\">
            ";
            // line 25
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "heureDebut", [], "any", false, false, false, 25), "H:i"), "html", null, true);
            yield " – ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "heureFin", [], "any", false, false, false, 25), "H:i"), "html", null, true);
            yield "
        </span>
    </td>
    <td>
       ";
            // line 29
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "typeSeance", [], "any", false, false, false, 29) == "individuel")) {
                // line 30
                yield "            <span class=\"type-badge type-individuel\">Individuel</span>
        ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 31
$context["rdv"], "typeSeance", [], "any", false, false, false, 31) == "groupe")) {
                // line 32
                yield "            <span class=\"type-badge type-groupe\">Groupe</span>
        ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 33
$context["rdv"], "typeSeance", [], "any", false, false, false, 33) == "en_ligne")) {
                // line 34
                yield "            <span class=\"type-badge type-en_ligne\">En ligne</span>
        ";
            } else {
                // line 36
                yield "            <span class=\"type-badge type-default\">";
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "typeSeance", [], "any", true, true, false, 36) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "typeSeance", [], "any", false, false, false, 36)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "typeSeance", [], "any", false, false, false, 36), "html", null, true)) : ("—"));
                yield "</span>
        ";
            }
            // line 38
            yield "    </td>
    <td>
        ";
            // line 40
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "statut", [], "any", false, false, false, 40) == "Confirmé")) {
                // line 41
                yield "            <span class=\"statut-badge statut-Confirmé\"><span class=\"dot\"></span> Confirmé</span>
        ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 42
$context["rdv"], "statut", [], "any", false, false, false, 42) == "En attente")) {
                // line 43
                yield "            <span class=\"statut-badge statut-En-attente\"><span class=\"dot\"></span> En attente</span>
        ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source,             // line 44
$context["rdv"], "statut", [], "any", false, false, false, 44) == "Pas encore pris")) {
                // line 45
                yield "            <span class=\"statut-badge statut-Pas-encore-pris\"><span class=\"dot\"></span> Pas encore pris</span>
        ";
            } else {
                // line 47
                yield "            <span class=\"statut-badge statut-default\"><span class=\"dot\"></span> ";
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "statut", [], "any", true, true, false, 47) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "statut", [], "any", false, false, false, 47)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "statut", [], "any", false, false, false, 47), "html", null, true)) : ("—"));
                yield "</span>
        ";
            }
            // line 49
            yield "    </td>
    <td>
        <div class=\"action-btns\">
            <button class=\"btn-edit\" title=\"Modifier\" onclick=\"openEditModal(";
            // line 52
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "id", [], "any", false, false, false, 52), "html", null, true);
            yield ")\">
                <i class=\"fa fa-pencil\" style=\"font-size:13px;\"></i>
            </button>
            <button class=\"btn-del\" title=\"Supprimer\" onclick=\"openDeleteModal(";
            // line 55
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["rdv"], "id", [], "any", false, false, false, 55), "html", null, true);
            yield ")\">
                <i class=\"fa fa-trash\" style=\"font-size:13px;\"></i>
            </button>
        </div>
    </td>
</tr>
";
            $context['_iterated'] = true;
        }
        // line 61
        if (!$context['_iterated']) {
            // line 62
            yield "<tr>
    <td colspan=\"6\">
        <div class=\"empty-state\">
            <p>Aucun rendez-vous trouvé</p>
        </div>
    </td>
</tr>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['rdv'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "back/_rendezvous_rows.html.twig";
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
        return array (  172 => 62,  170 => 61,  159 => 55,  153 => 52,  148 => 49,  142 => 47,  138 => 45,  136 => 44,  133 => 43,  131 => 42,  128 => 41,  126 => 40,  122 => 38,  116 => 36,  112 => 34,  110 => 33,  107 => 32,  105 => 31,  102 => 30,  100 => 29,  91 => 25,  83 => 20,  69 => 11,  61 => 7,  53 => 3,  48 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# templates/back/_rendezvous_rows.html.twig #}
{% for rdv in rendezvous %}
<tr class=\"rdv-row\" data-statut=\"{{ rdv.statut }}\">
    <td>
        <div class=\"td-avatar\">
            <div class=\"av-circle av-3\">
                {{ rdv.medecin.firstname|slice(0,1) }}{{ rdv.medecin.lastname|slice(0,1) }}
            </div>
            <div>
                <div style=\"font-weight:500;color:#1a2e1a;\">
                    Dr. {{ rdv.medecin.firstname }} {{ rdv.medecin.lastname }}
                </div>
                <div style=\"font-size:11px;color:#aaa;\">Psychologue</div>
            </div>
        </div>
    </td>
    <td>
        <span class=\"date-pill\">
            <i class=\"fa fa-calendar\" style=\"font-size:11px;\"></i>
            {{ rdv.dateRendezVous|date('d/m/Y') }}
        </span>
    </td>
    <td>
        <span class=\"time-badge\">
            {{ rdv.heureDebut|date('H:i') }} – {{ rdv.heureFin|date('H:i') }}
        </span>
    </td>
    <td>
       {% if rdv.typeSeance == 'individuel' %}
            <span class=\"type-badge type-individuel\">Individuel</span>
        {% elseif rdv.typeSeance == 'groupe' %}
            <span class=\"type-badge type-groupe\">Groupe</span>
        {% elseif rdv.typeSeance == 'en_ligne' %}
            <span class=\"type-badge type-en_ligne\">En ligne</span>
        {% else %}
            <span class=\"type-badge type-default\">{{ rdv.typeSeance ?? '—' }}</span>
        {% endif %}
    </td>
    <td>
        {% if rdv.statut == 'Confirmé' %}
            <span class=\"statut-badge statut-Confirmé\"><span class=\"dot\"></span> Confirmé</span>
        {% elseif rdv.statut == 'En attente' %}
            <span class=\"statut-badge statut-En-attente\"><span class=\"dot\"></span> En attente</span>
        {% elseif rdv.statut == 'Pas encore pris' %}
            <span class=\"statut-badge statut-Pas-encore-pris\"><span class=\"dot\"></span> Pas encore pris</span>
        {% else %}
            <span class=\"statut-badge statut-default\"><span class=\"dot\"></span> {{ rdv.statut ?? '—' }}</span>
        {% endif %}
    </td>
    <td>
        <div class=\"action-btns\">
            <button class=\"btn-edit\" title=\"Modifier\" onclick=\"openEditModal({{ rdv.id }})\">
                <i class=\"fa fa-pencil\" style=\"font-size:13px;\"></i>
            </button>
            <button class=\"btn-del\" title=\"Supprimer\" onclick=\"openDeleteModal({{ rdv.id }})\">
                <i class=\"fa fa-trash\" style=\"font-size:13px;\"></i>
            </button>
        </div>
    </td>
</tr>
{% else %}
<tr>
    <td colspan=\"6\">
        <div class=\"empty-state\">
            <p>Aucun rendez-vous trouvé</p>
        </div>
    </td>
</tr>
{% endfor %}", "back/_rendezvous_rows.html.twig", "C:\\Users\\sirine\\psy\\templates\\back\\_rendezvous_rows.html.twig");
    }
}
