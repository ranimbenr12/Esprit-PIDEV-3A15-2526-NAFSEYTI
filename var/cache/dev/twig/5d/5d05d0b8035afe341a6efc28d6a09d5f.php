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

/* confirmation_participation.html.twig */
class __TwigTemplate_f14237068a72efa5a296a161a1645fe7 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "confirmation_participation.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "confirmation_participation.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Confirmation d'inscription</title>
</head>
<body style=\"margin:0;padding:0;background:#f0ede5;font-family:Arial,sans-serif;\">
<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"background:#f0ede5;padding:30px 0;\">
    <tr>
        <td align=\"center\">
            <table width=\"600\" cellpadding=\"0\" cellspacing=\"0\" style=\"max-width:600px;width:100%;background:#f9f7f4;border-radius:15px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,.1);\">

                <!-- Header -->
                <tr>
                    <td style=\"background:linear-gradient(135deg,#285921,#3d7e33);padding:30px 35px;\">
                        <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">
                            <tr>
                                <td>
                                    <div style=\"font-size:32px;margin-bottom:8px;\">🌿</div>
                                    <h1 style=\"color:white;margin:0;font-size:22px;letter-spacing:1px;\">NAFSEYTI</h1>
                                    <p style=\"color:rgba(255,255,255,.75);margin:4px 0 0;font-size:13px;\">Plateforme de bien-être psychologique</p>
                                </td>
                                <td align=\"right\">
                                    <div style=\"background:rgba(255,255,255,.2);border-radius:50px;padding:10px 20px;display:inline-block;\">
                                        <span style=\"color:white;font-weight:bold;font-size:14px;\">✅ Confirmé</span>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Green accent bar -->
                <tr>
                    <td style=\"height:4px;background:linear-gradient(to right,#8BC34A,#4CAF50,#285921);\"></td>
                </tr>

                <!-- Body -->
                <tr>
                    <td style=\"padding:35px;\">

                        <p style=\"font-size:16px;color:#2c3e50;margin:0 0 8px;\">Bonjour <strong style=\"color:#285921;\">";
        // line 43
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["name"]) || array_key_exists("name", $context) ? $context["name"] : (function () { throw new RuntimeError('Variable "name" does not exist.', 43, $this->source); })()), "html", null, true);
        yield "</strong>,</p>
                        <p style=\"font-size:14px;color:#5a6c5a;margin:0 0 25px;line-height:1.6;\">
                            Nous avons le plaisir de vous confirmer votre inscription à l'événement suivant.
                            Votre participation a bien été enregistrée dans notre système.
                        </p>

                        <!-- Event card -->
                        <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"background:white;border-radius:12px;border-left:5px solid #285921;margin-bottom:25px;overflow:hidden;\">
                            <tr>
                                <td style=\"padding:20px 25px;\">
                                    <p style=\"margin:0 0 15px;font-size:11px;font-weight:bold;color:#8b9a8b;text-transform:uppercase;letter-spacing:1px;\">📌 Détails de l'événement</p>
                                    <p style=\"margin:0 0 10px;font-size:18px;font-weight:bold;color:#285921;\">🎯 ";
        // line 54
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["event_title"]) || array_key_exists("event_title", $context) ? $context["event_title"] : (function () { throw new RuntimeError('Variable "event_title" does not exist.', 54, $this->source); })()), "html", null, true);
        yield "</p>
                                    <table cellpadding=\"0\" cellspacing=\"0\">
                                        <tr>
                                            <td style=\"padding:4px 0;font-size:13px;color:#5a6c5a;\">📅&nbsp;</td>
                                            <td style=\"padding:4px 0;font-size:13px;color:#5a6c5a;\"><strong>Date :</strong> ";
        // line 58
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["event_date"]) || array_key_exists("event_date", $context) ? $context["event_date"] : (function () { throw new RuntimeError('Variable "event_date" does not exist.', 58, $this->source); })()), "html", null, true);
        yield "</td>
                                        </tr>
                                        <tr>
                                            <td style=\"padding:4px 0;font-size:13px;color:#5a6c5a;\">📍&nbsp;</td>
                                            <td style=\"padding:4px 0;font-size:13px;color:#5a6c5a;\"><strong>Lieu :</strong> ";
        // line 62
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["location"]) || array_key_exists("location", $context) ? $context["location"] : (function () { throw new RuntimeError('Variable "location" does not exist.', 62, $this->source); })()), "html", null, true);
        yield "</td>
                                        </tr>
                                        <tr>
                                            <td style=\"padding:4px 0;font-size:13px;color:#5a6c5a;\">🕐&nbsp;</td>
                                            <td style=\"padding:4px 0;font-size:13px;color:#5a6c5a;\"><strong>Inscrit le :</strong> ";
        // line 66
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["participation_date"]) || array_key_exists("participation_date", $context) ? $context["participation_date"] : (function () { throw new RuntimeError('Variable "participation_date" does not exist.', 66, $this->source); })()), "html", null, true);
        yield "</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>

                        <!-- Status badge -->
                        <table cellpadding=\"0\" cellspacing=\"0\" style=\"margin-bottom:25px;\">
                            <tr>
                                <td style=\"background:#e8f5e9;border-radius:25px;padding:10px 20px;\">
                                    <span style=\"color:#285921;font-weight:bold;font-size:14px;\">
                                        ✅ Statut : <span style=\"color:#2E7D32;\">Inscription confirmée</span>
                                    </span>
                                </td>
                            </tr>
                        </table>

                        <p style=\"font-size:13px;color:#5a6c5a;line-height:1.7;margin:0 0 10px;\">
                            Nous vous remercions de votre confiance et sommes ravis de vous accueillir lors de cet événement.
                            Si vous avez des questions, n'hésitez pas à nous contacter.
                        </p>
                        <p style=\"font-size:13px;color:#5a6c5a;margin:0;\">
                            À très bientôt,<br>
                            <strong style=\"color:#285921;\">L'équipe NAFSEYTI</strong>
                        </p>

                    </td>
                </tr>

                <!-- Footer -->
                <tr>
                    <td style=\"background:#f0ede5;padding:20px 35px;border-top:1px solid #e0d9cc;\">
                        <p style=\"margin:0;font-size:11px;color:#8b9a8b;text-align:center;line-height:1.6;\">
                            Cet email a été envoyé automatiquement par la plateforme NAFSEYTI.<br>
                            Merci de ne pas répondre directement à ce message.
                        </p>
                    </td>
                </tr>

                <!-- Bottom accent bar -->
                <tr>
                    <td style=\"height:4px;background:linear-gradient(to right,#285921,#4CAF50,#8BC34A);\"></td>
                </tr>

            </table>
        </td>
    </tr>
</table>
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
        return "confirmation_participation.html.twig";
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
        return array (  127 => 66,  120 => 62,  113 => 58,  106 => 54,  92 => 43,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"fr\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Confirmation d'inscription</title>
</head>
<body style=\"margin:0;padding:0;background:#f0ede5;font-family:Arial,sans-serif;\">
<table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"background:#f0ede5;padding:30px 0;\">
    <tr>
        <td align=\"center\">
            <table width=\"600\" cellpadding=\"0\" cellspacing=\"0\" style=\"max-width:600px;width:100%;background:#f9f7f4;border-radius:15px;overflow:hidden;box-shadow:0 4px 20px rgba(0,0,0,.1);\">

                <!-- Header -->
                <tr>
                    <td style=\"background:linear-gradient(135deg,#285921,#3d7e33);padding:30px 35px;\">
                        <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\">
                            <tr>
                                <td>
                                    <div style=\"font-size:32px;margin-bottom:8px;\">🌿</div>
                                    <h1 style=\"color:white;margin:0;font-size:22px;letter-spacing:1px;\">NAFSEYTI</h1>
                                    <p style=\"color:rgba(255,255,255,.75);margin:4px 0 0;font-size:13px;\">Plateforme de bien-être psychologique</p>
                                </td>
                                <td align=\"right\">
                                    <div style=\"background:rgba(255,255,255,.2);border-radius:50px;padding:10px 20px;display:inline-block;\">
                                        <span style=\"color:white;font-weight:bold;font-size:14px;\">✅ Confirmé</span>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <!-- Green accent bar -->
                <tr>
                    <td style=\"height:4px;background:linear-gradient(to right,#8BC34A,#4CAF50,#285921);\"></td>
                </tr>

                <!-- Body -->
                <tr>
                    <td style=\"padding:35px;\">

                        <p style=\"font-size:16px;color:#2c3e50;margin:0 0 8px;\">Bonjour <strong style=\"color:#285921;\">{{ name }}</strong>,</p>
                        <p style=\"font-size:14px;color:#5a6c5a;margin:0 0 25px;line-height:1.6;\">
                            Nous avons le plaisir de vous confirmer votre inscription à l'événement suivant.
                            Votre participation a bien été enregistrée dans notre système.
                        </p>

                        <!-- Event card -->
                        <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" style=\"background:white;border-radius:12px;border-left:5px solid #285921;margin-bottom:25px;overflow:hidden;\">
                            <tr>
                                <td style=\"padding:20px 25px;\">
                                    <p style=\"margin:0 0 15px;font-size:11px;font-weight:bold;color:#8b9a8b;text-transform:uppercase;letter-spacing:1px;\">📌 Détails de l'événement</p>
                                    <p style=\"margin:0 0 10px;font-size:18px;font-weight:bold;color:#285921;\">🎯 {{ event_title }}</p>
                                    <table cellpadding=\"0\" cellspacing=\"0\">
                                        <tr>
                                            <td style=\"padding:4px 0;font-size:13px;color:#5a6c5a;\">📅&nbsp;</td>
                                            <td style=\"padding:4px 0;font-size:13px;color:#5a6c5a;\"><strong>Date :</strong> {{ event_date }}</td>
                                        </tr>
                                        <tr>
                                            <td style=\"padding:4px 0;font-size:13px;color:#5a6c5a;\">📍&nbsp;</td>
                                            <td style=\"padding:4px 0;font-size:13px;color:#5a6c5a;\"><strong>Lieu :</strong> {{ location }}</td>
                                        </tr>
                                        <tr>
                                            <td style=\"padding:4px 0;font-size:13px;color:#5a6c5a;\">🕐&nbsp;</td>
                                            <td style=\"padding:4px 0;font-size:13px;color:#5a6c5a;\"><strong>Inscrit le :</strong> {{ participation_date }}</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>

                        <!-- Status badge -->
                        <table cellpadding=\"0\" cellspacing=\"0\" style=\"margin-bottom:25px;\">
                            <tr>
                                <td style=\"background:#e8f5e9;border-radius:25px;padding:10px 20px;\">
                                    <span style=\"color:#285921;font-weight:bold;font-size:14px;\">
                                        ✅ Statut : <span style=\"color:#2E7D32;\">Inscription confirmée</span>
                                    </span>
                                </td>
                            </tr>
                        </table>

                        <p style=\"font-size:13px;color:#5a6c5a;line-height:1.7;margin:0 0 10px;\">
                            Nous vous remercions de votre confiance et sommes ravis de vous accueillir lors de cet événement.
                            Si vous avez des questions, n'hésitez pas à nous contacter.
                        </p>
                        <p style=\"font-size:13px;color:#5a6c5a;margin:0;\">
                            À très bientôt,<br>
                            <strong style=\"color:#285921;\">L'équipe NAFSEYTI</strong>
                        </p>

                    </td>
                </tr>

                <!-- Footer -->
                <tr>
                    <td style=\"background:#f0ede5;padding:20px 35px;border-top:1px solid #e0d9cc;\">
                        <p style=\"margin:0;font-size:11px;color:#8b9a8b;text-align:center;line-height:1.6;\">
                            Cet email a été envoyé automatiquement par la plateforme NAFSEYTI.<br>
                            Merci de ne pas répondre directement à ce message.
                        </p>
                    </td>
                </tr>

                <!-- Bottom accent bar -->
                <tr>
                    <td style=\"height:4px;background:linear-gradient(to right,#285921,#4CAF50,#8BC34A);\"></td>
                </tr>

            </table>
        </td>
    </tr>
</table>
</body>
</html>
", "confirmation_participation.html.twig", "C:\\Users\\sirine\\psy1\\psy\\templates\\confirmation_participation.html.twig");
    }
}
