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

/* back/events/pdf/export.html.twig */
class __TwigTemplate_370c90d8d025686f5bee6d8e36a06e45 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/events/pdf/export.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "back/events/pdf/export.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <title>Idées Bien-Être</title>
    <style>
        body {
            font-family: DejaVu Sans, Arial, sans-serif;
            font-size: 13px;
            color: #4d604b;
            background: #f5f3ed;
            margin: 0;
            padding: 30px;
        }
        .header {
            background: linear-gradient(135deg, #7f9a7d, #5c715a);
            color: white;
            padding: 20px 30px;
            border-radius: 10px;
            margin-bottom: 25px;
            text-align: center;
        }
        .header h1 {
            margin: 0 0 5px 0;
            font-size: 22px;
            letter-spacing: 1px;
        }
        .header p {
            margin: 0;
            font-size: 12px;
            opacity: 0.85;
        }
        .separator {
            border: none;
            border-top: 2px solid #d2e0cf;
            margin: 20px 0;
        }
        .content {
            background: #fcfaf7;
            border: 1px solid #d2e0cf;
            border-radius: 10px;
            padding: 20px 25px;
            white-space: pre-wrap;
            word-wrap: break-word;
            line-height: 1.7;
        }
        .footer {
            margin-top: 25px;
            text-align: center;
            font-size: 11px;
            color: #8a9a87;
            border-top: 1px solid #d2e0cf;
            padding-top: 12px;
        }
        .badge {
            display: inline-block;
            background: #b7c9b5;
            color: #3d533b;
            border-radius: 20px;
            padding: 4px 14px;
            font-size: 11px;
            font-weight: bold;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class=\"header\">
        <h1>🌿 ASSISTANT BIEN-ÊTRE &amp; ÉVÉNEMENTS</h1>
        <p>Votre espace de sérénité pour des événements apaisants</p>
    </div>

    <div class=\"badge\">🌱 NATURE &amp; PAIX</div>

    <hr class=\"separator\">

    <div class=\"content\">";
        // line 77
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["content"]) || array_key_exists("content", $context) ? $context["content"] : (function () { throw new RuntimeError('Variable "content" does not exist.', 77, $this->source); })()), "html", null, true);
        yield "</div>

    <div class=\"footer\">
        Généré par Assistant Bien-Être &bull; ";
        // line 80
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["date"]) || array_key_exists("date", $context) ? $context["date"] : (function () { throw new RuntimeError('Variable "date" does not exist.', 80, $this->source); })()), "html", null, true);
        yield "
    </div>
</body>
</html>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "back/events/pdf/export.html.twig";
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
        return array (  132 => 80,  126 => 77,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <title>Idées Bien-Être</title>
    <style>
        body {
            font-family: DejaVu Sans, Arial, sans-serif;
            font-size: 13px;
            color: #4d604b;
            background: #f5f3ed;
            margin: 0;
            padding: 30px;
        }
        .header {
            background: linear-gradient(135deg, #7f9a7d, #5c715a);
            color: white;
            padding: 20px 30px;
            border-radius: 10px;
            margin-bottom: 25px;
            text-align: center;
        }
        .header h1 {
            margin: 0 0 5px 0;
            font-size: 22px;
            letter-spacing: 1px;
        }
        .header p {
            margin: 0;
            font-size: 12px;
            opacity: 0.85;
        }
        .separator {
            border: none;
            border-top: 2px solid #d2e0cf;
            margin: 20px 0;
        }
        .content {
            background: #fcfaf7;
            border: 1px solid #d2e0cf;
            border-radius: 10px;
            padding: 20px 25px;
            white-space: pre-wrap;
            word-wrap: break-word;
            line-height: 1.7;
        }
        .footer {
            margin-top: 25px;
            text-align: center;
            font-size: 11px;
            color: #8a9a87;
            border-top: 1px solid #d2e0cf;
            padding-top: 12px;
        }
        .badge {
            display: inline-block;
            background: #b7c9b5;
            color: #3d533b;
            border-radius: 20px;
            padding: 4px 14px;
            font-size: 11px;
            font-weight: bold;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class=\"header\">
        <h1>🌿 ASSISTANT BIEN-ÊTRE &amp; ÉVÉNEMENTS</h1>
        <p>Votre espace de sérénité pour des événements apaisants</p>
    </div>

    <div class=\"badge\">🌱 NATURE &amp; PAIX</div>

    <hr class=\"separator\">

    <div class=\"content\">{{ content }}</div>

    <div class=\"footer\">
        Généré par Assistant Bien-Être &bull; {{ date }}
    </div>
</body>
</html>
", "back/events/pdf/export.html.twig", "C:\\Users\\sirine\\psy1\\psy\\templates\\back\\events\\pdf\\export.html.twig");
    }
}
