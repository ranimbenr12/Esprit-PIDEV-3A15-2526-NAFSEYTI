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

/* home/index.html.twig */
class __TwigTemplate_7e66aacdbebafdbc943777e3df97ef1e extends Template
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
        // line 2
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "home/index.html.twig"));

        $this->parent = $this->load("base.html.twig", 2);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 4
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

        yield "NAFSEYTI — Soutien Psychologique & Bien-être";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 6
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

        // line 7
        yield "
<!-- ═══ HERO ═══ -->
<section class=\"hero-section\">
    <div class=\"hero-bg-pattern\"></div>
    <div class=\"hero-organic-shape\"></div>
    <div class=\"hero-organic-shape-2\"></div>
    <div class=\"hero-content\">
        <div class=\"row-flex\" style=\"gap: 80px;\">
            <div class=\"col-half\">
                <div class=\"hero-tag\">Plateforme de soutien psychologique universitaire</div>
                <h1 class=\"hero-title\">
                    NAFSEYTI, votre espace<br>
                    de <em>bien-être mental</em> académique
                </h1>
                <p class=\"hero-subtitle\">
                   Une plateforme innovante dédiée aux étudiants, enseignants et universités tunisiennes.
                   Soutien immédiat, prévention, accompagnement personnalisé et anonymat garanti.
                </p>
                <div class=\"hero-actions\">
                    <a href=\"#!\" class=\"btn-primary-custom\">Commencer maintenant</a>
                    <a href=\"#!\" class=\"btn-ghost\">Découvrir la plateforme</a>
                </div>
                <div class=\"hero-stats\">
                <div class=\"stat-item\">
                    <div class=\"stat-number\">1000+</div>
                    <div class=\"stat-label\">Étudiants accompagnés</div>
                </div>
                <div class=\"stat-item\">
                    <div class=\"stat-number\">24/7</div>
                    <div class=\"stat-label\">Support disponible</div>
                </div>
                <div class=\"stat-item\">
                    <div class=\"stat-number\">100%</div>
                    <div class=\"stat-label\">Anonymat sécurisé</div>
                </div>
            </div>
            </div>
            <div class=\"col-half\" style=\"position:relative;\">
                <img src=\"img/Anasayfa.jpg\" alt=\"Soutien psychologique\" 
                     style=\"width:100%;border-radius:2px;display:block;object-fit:cover;height:500px;\">
                <!-- Floating card -->
                <div style=\"position:absolute;bottom:-24px;left:-24px;background:var(--beige-cream);padding:24px 28px;border-left:3px solid var(--green-sage);max-width:260px;box-shadow:0 20px 60px rgba(45,80,22,0.2);\">
                    <i class=\"fas fa-brain\" style=\"color:var(--green-sage);font-size:1.4rem;margin-bottom:12px;display:block;\"></i>
                    <p style=\"font-family:'Cormorant Garamond',serif;font-size:1.05rem;color:var(--text-mid);font-style:italic;line-height:1.6;font-weight:300;\">\"La santé mentale est le fondement de tout bien-être.\"</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══ VIDEO BANNER ═══ -->
<div class=\"video-banner\">
    <div class=\"video-inner\">
        <button class=\"play-btn\" data-bs-toggle=\"modal\" data-src=\"https://www.youtube.com/embed/DWRcNpR6Kdc\" data-bs-target=\"#videoModal\">
            <i class=\"fas fa-play\"></i>
        </button>
        <p class=\"video-quote\">
            \"Ensemble, nous pouvons construire un monde où chacun a la chance de s'épanouir pleinement, corps et âme.\"
        </p>
    </div>
</div>

<!-- Video Modal -->
<div class=\"modal fade\" id=\"videoModal\" tabindex=\"-1\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-lg\">
        <div class=\"modal-content\" style=\"border:none;background:var(--text-dark);\">
            <div class=\"modal-header\" style=\"border:none;padding:16px 20px;\">
                <h5 class=\"modal-title\" style=\"color:var(--beige-light);font-family:'Playfair Display',serif;\">Notre Mission en Vidéo</h5>
                <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body p-0\">
                <div class=\"ratio ratio-16x9\">
                    <iframe src=\"\" id=\"video\" allowfullscreen allow=\"autoplay\"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ═══ ABOUT ═══ -->
<section class=\"about-section\">
    <div class=\"container-custom\">
        <div class=\"row-flex\">
            <div class=\"col-half\">
                <div class=\"about-img-wrap\">
                    <img src=\"img/about.jpg\" alt=\"À propos de MindCare\" style=\"border-radius:2px;\">
                    <div class=\"about-img-accent\"></div>
                    <div class=\"about-img-badge\">
                        <span class=\"badge-number\">18</span>
                        <span class=\"badge-label\">Ans d'Engagement</span>
                    </div>
                </div>
            </div>
            <div class=\"col-half\">
              <div class=\"section-eyebrow\">À propos de NAFSEYTI</div>

                <h2 class=\"section-title-new\">
                    Une solution pensée pour <em>l’écosystème universitaire tunisien</em>
                </h2>

                <p class=\"about-text\">
                    NAFSEYTI est la première plateforme complète de soutien psychologique
                    conçue spécifiquement pour les étudiants, les enseignants et les établissements universitaires en Tunisie.
                </p>
                <ul class=\"mission-points\">
                    <li>
                        <div class=\"point-icon\"><i class=\"fas fa-check\"></i></div>
                        <span>Soutien psychologique immédiat et confidentiel pour les étudiants.</span>
                    </li>

                    <li>
                        <div class=\"point-icon\"><i class=\"fas fa-check\"></i></div>
                        <span>Détection précoce et outils pédagogiques pour les enseignants.</span>
                    </li>

                    <li>
                        <div class=\"point-icon\"><i class=\"fas fa-check\"></i></div>
                        <span>Réduction du décrochage universitaire et amélioration du bien-être collectif.</span>
                    </li>
                </ul>
                <div style=\"margin-top:36px;\">
                    <a href=\"#!\" class=\"btn-primary-custom\" style=\"background:var(--green-deep);color:var(--beige-cream);\">Notre Histoire</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══ SERVICES ═══ -->
<section class=\"services-section\">
    <div class=\"container-custom\">
        <div class=\"row-flex\" style=\"align-items:flex-end;margin-bottom:0;\">
            <div class=\"col-half\">
                <div class=\"section-eyebrow\">Ce que nous faisons</div>
                <h2 class=\"section-title-new\">
                    Nos <em>solutions</em><br>
                    pour l’université
                </h2>
            </div>
            <div class=\"col-half\">
                <p style=\"font-family:'Cormorant Garamond',serif;font-size:1.15rem;color:#6B7D5A;line-height:1.8;font-weight:300;\">
                    Nous créons des programmes qui répondent aux besoins urgents tout en favorisant 
                    des solutions durables pour un changement profond et durable.
                </p>
            </div>
        </div>
        <div class=\"services-grid\" style=\"margin-top:48px;\">
            <div class=\"service-card\">
                <div class=\"service-icon\"><i class=\"fas fa-brain\"></i></div>
                <h3 class=\"service-name\">Soutien Psychologique</h3>
                <p class=\"service-desc\">Accompagnement individuel et de groupe pour traverser les épreuves de la vie avec résilience et sérénité.</p>
                <a href=\"#!\" class=\"service-link\">En savoir plus →</a>
            </div>
            <div class=\"service-card\">
                <div class=\"service-icon\"><i class=\"fas fa-heart-pulse\"></i></div>
                <h3 class=\"service-name\">Santé Mentale</h3>
                <p class=\"service-desc\">Prévention, sensibilisation et accès aux soins de santé mentale pour les populations les plus vulnérables.</p>
                <a href=\"#!\" class=\"service-link\">En savoir plus →</a>
            </div>
            <div class=\"service-card\">
                <div class=\"service-icon\"><i class=\"fas fa-hands-holding-child\"></i></div>
                <h3 class=\"service-name\">Aide Sociale</h3>
                <p class=\"service-desc\">Soutien aux enfants et familles en difficulté, pour un filet de sécurité solide et bienveillant.</p>
                <a href=\"#!\" class=\"service-link\">En savoir plus →</a>
            </div>
            <div class=\"service-card\">
                <div class=\"service-icon\"><i class=\"fas fa-seedling\"></i></div>
                <h3 class=\"service-name\">Développement Personnel</h3>
                <p class=\"service-desc\">Ateliers et formations pour cultiver la confiance en soi, la pleine conscience et le bien-être au quotidien.</p>
                <a href=\"#!\" class=\"service-link\">En savoir plus →</a>
            </div>
            <div class=\"service-card\">
                <div class=\"service-icon\"><i class=\"fas fa-graduation-cap\"></i></div>
                <h3 class=\"service-name\">Éducation & Sensibilisation</h3>
                <p class=\"service-desc\">Programmes éducatifs pour briser les tabous autour de la santé mentale dans les écoles et communautés.</p>
                <a href=\"#!\" class=\"service-link\">En savoir plus →</a>
            </div>
            <div class=\"service-card\">
                <div class=\"service-icon\"><i class=\"fas fa-house-heart\"></i></div>
                <h3 class=\"service-name\">Hébergement d'Urgence</h3>
                <p class=\"service-desc\">Solutions d'accueil et d'accompagnement pour les personnes en situation de détresse aiguë.</p>
                <a href=\"#!\" class=\"service-link\">En savoir plus →</a>
            </div>
        </div>
    </div>
</section>

<!-- ═══ FEATURES / STATS ═══ -->
<section class=\"features-section\">
    <div class=\"container-custom\">
        <div class=\"row-flex\">
            <div class=\"col-half\">
                <div class=\"stats-mosaic\">
                    <div class=\"stat-tile\">
                        <i class=\"fas fa-users tile-icon\"></i>
                        <div class=\"tile-number\">500<span class=\"tile-unit\">+</span></div>
                        <div class=\"tile-label\">Membres de l'Équipe</div>
                    </div>
                    <div class=\"stat-tile\">
                        <i class=\"fas fa-award tile-icon\"></i>
                        <div class=\"tile-number\">70</div>
                        <div class=\"tile-label\">Prix Remportés</div>
                    </div>
                    <div class=\"stat-tile\">
                        <i class=\"fas fa-list-check tile-icon\"></i>
                        <div class=\"tile-number\">3K<span class=\"tile-unit\">+</span></div>
                        <div class=\"tile-label\">Projets Réalisés</div>
                    </div>
                    <div class=\"stat-tile\">
                        <i class=\"fas fa-comments tile-icon\"></i>
                        <div class=\"tile-number\">7K<span class=\"tile-unit\">+</span></div>
                        <div class=\"tile-label\">Avis Positifs</div>
                    </div>
                </div>
            </div>
            <div class=\"col-half\">
                <div class=\"section-eyebrow\">Pourquoi NAFSEYTI ?</div>
                <h2 class=\"section-title-new\">
                      Une <em>valeur ajoutée unique</em>
                </h2>
                <p style=\"font-family:'Cormorant Garamond',serif;font-size:1.15rem;color:#6B7D5A;line-height:1.8;font-weight:300;margin-bottom:16px;\">
                    Notre engagement repose sur une approche humaine, scientifique et bienveillante au service de chacun.
                </p>
                <div class=\"features-list\">
                    <div class=\"feature-item\">
                        <span class=\"feature-num\">01</span>
                        <div class=\"feature-content\">
                            <h4>Approche Centrée sur la Personne</h4>
                            <p>Chaque individu est unique. Nos programmes sont personnalisés selon les besoins spécifiques de chaque bénéficiaire.</p>
                        </div>
                    </div>
                    <div class=\"feature-item\">
                        <span class=\"feature-num\">02</span>
                        <div class=\"feature-content\">
                            <h4>Équipe de Professionnels Certifiés</h4>
                            <p>Psychologues, travailleurs sociaux et bénévoles formés travaillent ensemble pour un soutien holistique.</p>
                        </div>
                    </div>
                    <div class=\"feature-item\">
                        <span class=\"feature-num\">03</span>
                        <div class=\"feature-content\">
                            <h4>Transparence & Impact Mesurable</h4>
                            <p>Chaque don est tracé et son impact documenté. Vous savez exactement comment votre générosité aide.</p>
                        </div>
                    </div>
                </div>
                <div style=\"display:flex;gap:16px;margin-top:40px;\">
                    <a href=\"#!\" class=\"btn-primary-custom\" style=\"background:var(--green-deep);color:var(--beige-cream);\">Faire un Don</a>
                    <a href=\"#!\" class=\"btn-primary-custom\" style=\"background:transparent;color:var(--green-deep);border:1px solid var(--beige-mid);\">Nous Rejoindre</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══ NOS CAUSES ═══ -->
<section class=\"donations-section\">
    <div class=\"container-custom\">
        <div style=\"text-align:center;margin-bottom:0;\">
            <div class=\"section-eyebrow\" style=\"justify-content:center;\">Nos Causes</div>
            <h2 class=\"section-title-new\" style=\"max-width:700px;margin:0 auto;\">
                Nos <em>solutions</em> pour le bien-être universitaire
            </h2>
        </div>

        <div class=\"donation-cards\">

            <div class=\"donation-card\">
                <span class=\"donation-category\">Étudiants</span>
                <img src=\"img/student-support.jpg\" alt=\"Soutien étudiant\" class=\"donation-img\">
                <h3 class=\"donation-title\">Soutien immédiat & anonymat</h3>
                <p class=\"donation-desc\">
                    Un espace sécurisé offrant écoute, prévention,
                    accompagnement psychologique et contenu adapté
                    aux défis universitaires.
                </p>
                <div class=\"progress-wrap\">
                    <div class=\"progress-labels\">
                        <span>Objectif : <strong>Soutien rapide</strong></span>
                        <span>Disponibilité : 24/7</span>
                    </div>
                    <div class=\"progress-bar-wrap\">
                        <div class=\"progress-fill\" data-width=\"90\" style=\"width:0%\"></div>
                    </div>
                    <div class=\"progress-percent\">90% couverture</div>
                </div>
                <a href=\"#!\" class=\"donate-btn\">Découvrir</a>
            </div>

            <div class=\"donation-card\">
                <span class=\"donation-category\">Enseignants</span>
                <img src=\"img/teacher-support.jpg\" alt=\"Support enseignants\" class=\"donation-img\">
                <h3 class=\"donation-title\">Détection précoce</h3>
                <p class=\"donation-desc\">
                    Outils pour repérer les signes de mal-être,
                    ressources pédagogiques et communication facilitée
                    avec les étudiants.
                </p>
                <div class=\"progress-wrap\">
                    <div class=\"progress-labels\">
                        <span>Objectif : <strong>Prévention</strong></span>
                        <span>Performance : élevée</span>
                    </div>
                    <div class=\"progress-bar-wrap\">
                        <div class=\"progress-fill\" data-width=\"95\" style=\"width:0%\"></div>
                    </div>
                    <div class=\"progress-percent\">95% efficacité</div>
                </div>
                <a href=\"#!\" class=\"donate-btn\">Explorer</a>
            </div>

            <div class=\"donation-card\">
                <span class=\"donation-category\">Université</span>
                <img src=\"img/university-support.jpg\" alt=\"Université\" class=\"donation-img\">
                <h3 class=\"donation-title\">Réduction du décrochage</h3>
                <p class=\"donation-desc\">
                    Suivi stratégique, amélioration du bien-être collectif,
                    innovation institutionnelle et données d’aide à la décision.
                </p>
                <div class=\"progress-wrap\">
                    <div class=\"progress-labels\">
                        <span>Objectif : <strong>Réussite</strong></span>
                        <span>Impact : fort</span>
                    </div>
                    <div class=\"progress-bar-wrap\">
                        <div class=\"progress-fill\" data-width=\"85\" style=\"width:0%\"></div>
                    </div>
                    <div class=\"progress-percent\">85% impact positif</div>
                </div>
                <a href=\"#!\" class=\"donate-btn\">Voir plus</a>
            </div>

        </div>
    </div>
</section>

<!-- ═══ CTA BANNER ═══ -->
<section class=\"cta-banner\">
    <div class=\"cta-content\">
        <h2>
            Notre plateforme est toujours ouverte pour <em>vous accompagner</em>
        </h2>

        <p>
            NAFSEYTI accompagne les étudiants, les enseignants et les universités
            en offrant un espace sécurisé, anonyme et accessible pour le bien-être
            psychologique et la réussite académique.
        </p>

        <div style=\"display:flex;gap:16px;justify-content:center;flex-wrap:wrap;\">
            <a href=\"#!\" class=\"btn-primary-custom\">Découvrir la plateforme</a>
            <a href=\"#!\" class=\"btn-ghost\">Prendre rendez-vous</a>
        </div>
    </div>
</section>

<!-- ═══ EVENTS ═══ -->
<section class=\"events-section\">
    <div class=\"container-custom\">
        <div style=\"text-align:center;\">
            <div class=\"section-eyebrow\" style=\"justify-content:center;\">Événements</div>
            <h2 class=\"section-title-new\" style=\"max-width:600px;margin:0 auto;\">
                Rejoignez nos <em>ateliers universitaires</em>
            </h2>
        </div>

        <div class=\"events-grid\">
            <div class=\"event-card\">
                <img src=\"img/event-1.jpg\" alt=\"Atelier gestion du stress\">
                <div class=\"event-body\">
                    <div class=\"event-meta\">
                        <span><i class=\"fas fa-clock\"></i> 10h00 – 12h00</span>
                        <span><i class=\"fas fa-calendar\"></i> 10 Mai</span>
                        <span><i class=\"fas fa-map-marker-alt\"></i> Tunis</span>
                    </div>
                    <a href=\"#!\" class=\"event-name\">Atelier Gestion du Stress</a>
                    <p class=\"event-desc\">
                        Techniques de relaxation et gestion du stress académique
                        pour les étudiants en période d’examen.
                    </p>
                </div>
            </div>

            <div class=\"event-card\">
                <img src=\"img/event-22.jpg\" alt=\"Prévention burn-out\">
                <div class=\"event-body\">
                    <div class=\"event-meta\">
                        <span><i class=\"fas fa-clock\"></i> 14h00 – 16h00</span>
                        <span><i class=\"fas fa-calendar\"></i> 15 Mai</span>
                        <span><i class=\"fas fa-map-marker-alt\"></i> Sfax</span>
                    </div>
                    <a href=\"#!\" class=\"event-name\">Prévention du Burn-out</a>
                    <p class=\"event-desc\">
                        Sensibilisation à la santé mentale et prévention
                        du surmenage chez les étudiants et enseignants.
                    </p>
                </div>
            </div>

            <div class=\"event-card\">
                <img src=\"img/event-33.jpg\" alt=\"Journée bien-être\">
                <div class=\"event-body\">
                    <div class=\"event-meta\">
                        <span><i class=\"fas fa-clock\"></i> 09h00 – 17h00</span>
                        <span><i class=\"fas fa-calendar\"></i> 20 Mai</span>
                        <span><i class=\"fas fa-map-marker-alt\"></i> Sousse</span>
                    </div>
                    <a href=\"#!\" class=\"event-name\">Journée Bien-être Campus</a>
                    <p class=\"event-desc\">
                        Séances de soutien psychologique et activités
                        de bien-être ouvertes à toute l’université.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══ TEAM ═══ -->
<section class=\"team-section\">
    <div class=\"container-custom\">
        <div style=\"text-align:center;\">
            <div class=\"section-eyebrow\" style=\"justify-content:center;\">Notre Équipe</div>
            <h2 class=\"section-title-new\" style=\"max-width:600px;margin:0 auto;\">
                Rencontrez les <em>experts</em> derrière NAFSEYTI
            </h2>
        </div>

        <div class=\"team-grid\">
            <div class=\"team-card\">
                <img src=\"img/team-11.jpg\" alt=\"Psychologue clinicienne\">
                <div class=\"team-info\">
                    <div>
                        <div class=\"team-name\">Dr. Sarah Ben Ali</div>
                        <div class=\"team-role\">Psychologue Clinicienne</div>
                    </div>
                    <div class=\"team-socials\">
                        <a href=\"#!\" class=\"team-social-btn\"><i class=\"fab fa-linkedin-in\"></i></a>
                        <a href=\"#!\" class=\"team-social-btn\"><i class=\"fas fa-envelope\"></i></a>
                    </div>
                </div>
            </div>

            <div class=\"team-card\">
                <img src=\"img/team-22.jpg\" alt=\"Expert pédagogique\">
                <div class=\"team-info\">
                    <div>
                        <div class=\"team-name\">Ahmed Khalil</div>
                        <div class=\"team-role\">Expert en Accompagnement Universitaire</div>
                    </div>
                    <div class=\"team-socials\">
                        <a href=\"#!\" class=\"team-social-btn\"><i class=\"fab fa-linkedin-in\"></i></a>
                        <a href=\"#!\" class=\"team-social-btn\"><i class=\"fas fa-envelope\"></i></a>
                    </div>
                </div>
            </div>

            <div class=\"team-card\">
                <img src=\"img/team-33.jpg\" alt=\"Responsable plateforme\">
                <div class=\"team-info\">
                    <div>
                        <div class=\"team-name\">Leila Mansour</div>
                        <div class=\"team-role\">Responsable Support & Suivi Étudiant</div>
                    </div>
                    <div class=\"team-socials\">
                        <a href=\"#!\" class=\"team-social-btn\"><i class=\"fab fa-linkedin-in\"></i></a>
                        <a href=\"#!\" class=\"team-social-btn\"><i class=\"fas fa-envelope\"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══ TESTIMONIALS ═══ -->
<section class=\"testimonials-section\">
    <div class=\"container-custom\">
        <div class=\"row-flex\" style=\"align-items:flex-start;gap:80px;\">
            <div style=\"flex:0 0 300px;\">
                <div class=\"section-eyebrow\">Témoignages</div>
                <h2 class=\"section-title-new\">
                    Ce que disent<br>nos <em>utilisateurs</em>
                </h2>
                <p style=\"font-family:'Cormorant Garamond',serif;font-size:1.1rem;color:#6B7D5A;line-height:1.8;font-weight:300;margin-top:16px;\">
                    Étudiants, enseignants et responsables universitaires partagent leur expérience avec NAFSEYTI.
                </p>
            </div>

            <div style=\"flex:1;\">
                <div class=\"testimonial-cards\" style=\"grid-template-columns:1fr;\">
                    
                    <div class=\"testimonial-card\">
                        <span class=\"quote-mark\">\"</span>
                        <div class=\"stars\">★★★★★</div>
                        <p class=\"testimonial-text\">
                            Grâce à NAFSEYTI, j’ai trouvé un espace sûr pour parler de mon stress académique.
                            Le suivi personnalisé m’a beaucoup aidé pendant la période des examens.
                        </p>
                        <div class=\"testimonial-author\">
                            <img src=\"img/testimonial-1.jpg\" alt=\"Étudiante\" class=\"author-avatar\">
                            <div>
                                <div class=\"author-name\">Amira Ben Salah</div>
                                <div class=\"author-title\">Étudiante en Informatique</div>
                            </div>
                        </div>
                    </div>

                    <div class=\"testimonial-card\">
                        <span class=\"quote-mark\">\"</span>
                        <div class=\"stars\">★★★★★</div>
                        <p class=\"testimonial-text\">
                            La plateforme facilite la détection précoce des étudiants en difficulté
                            et améliore la communication entre enseignants et services d’accompagnement.
                        </p>
                        <div class=\"testimonial-author\">
                            <img src=\"img/testimonial-2.jpg\" alt=\"Enseignant\" class=\"author-avatar\">
                            <div>
                                <div class=\"author-name\">Karim Trabelsi</div>
                                <div class=\"author-title\">Enseignant Universitaire</div>
                            </div>
                        </div>
                    </div>

                    <div class=\"testimonial-card\">
                        <span class=\"quote-mark\">\"</span>
                        <div class=\"stars\">★★★★★</div>
                        <p class=\"testimonial-text\">
                            NAFSEYTI nous aide à mieux comprendre les besoins psychologiques
                            de notre communauté étudiante grâce à des données stratégiques fiables.
                        </p>
                        <div class=\"testimonial-author\">
                            <img src=\"img/testimonial-3.jpg\" alt=\"Université\" class=\"author-avatar\">
                            <div>
                                <div class=\"author-name\">Nadia Chaieb</div>
                                <div class=\"author-title\">Responsable Vie Universitaire</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══ NEWSLETTER ═══ -->
<section class=\"newsletter-section\">
    <h2>Restez <em style=\"font-style:italic;color:var(--green-pale);\">connectés</em> à notre mission</h2>
    <p>Recevez nos actualités, événements et témoignages. Pas de spam, promis.</p>
    <div class=\"newsletter-form\">
        <input type=\"email\" class=\"newsletter-input\" placeholder=\"Votre adresse email\">
        <button class=\"newsletter-btn\">S'abonner</button>
    </div>
</section>

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
        return "home/index.html.twig";
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
        return array (  100 => 7,  87 => 6,  64 => 4,  41 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{# templates/home/index.html.twig #}
{% extends 'base.html.twig' %}

{% block title %}NAFSEYTI — Soutien Psychologique & Bien-être{% endblock %}

{% block body %}

<!-- ═══ HERO ═══ -->
<section class=\"hero-section\">
    <div class=\"hero-bg-pattern\"></div>
    <div class=\"hero-organic-shape\"></div>
    <div class=\"hero-organic-shape-2\"></div>
    <div class=\"hero-content\">
        <div class=\"row-flex\" style=\"gap: 80px;\">
            <div class=\"col-half\">
                <div class=\"hero-tag\">Plateforme de soutien psychologique universitaire</div>
                <h1 class=\"hero-title\">
                    NAFSEYTI, votre espace<br>
                    de <em>bien-être mental</em> académique
                </h1>
                <p class=\"hero-subtitle\">
                   Une plateforme innovante dédiée aux étudiants, enseignants et universités tunisiennes.
                   Soutien immédiat, prévention, accompagnement personnalisé et anonymat garanti.
                </p>
                <div class=\"hero-actions\">
                    <a href=\"#!\" class=\"btn-primary-custom\">Commencer maintenant</a>
                    <a href=\"#!\" class=\"btn-ghost\">Découvrir la plateforme</a>
                </div>
                <div class=\"hero-stats\">
                <div class=\"stat-item\">
                    <div class=\"stat-number\">1000+</div>
                    <div class=\"stat-label\">Étudiants accompagnés</div>
                </div>
                <div class=\"stat-item\">
                    <div class=\"stat-number\">24/7</div>
                    <div class=\"stat-label\">Support disponible</div>
                </div>
                <div class=\"stat-item\">
                    <div class=\"stat-number\">100%</div>
                    <div class=\"stat-label\">Anonymat sécurisé</div>
                </div>
            </div>
            </div>
            <div class=\"col-half\" style=\"position:relative;\">
                <img src=\"img/Anasayfa.jpg\" alt=\"Soutien psychologique\" 
                     style=\"width:100%;border-radius:2px;display:block;object-fit:cover;height:500px;\">
                <!-- Floating card -->
                <div style=\"position:absolute;bottom:-24px;left:-24px;background:var(--beige-cream);padding:24px 28px;border-left:3px solid var(--green-sage);max-width:260px;box-shadow:0 20px 60px rgba(45,80,22,0.2);\">
                    <i class=\"fas fa-brain\" style=\"color:var(--green-sage);font-size:1.4rem;margin-bottom:12px;display:block;\"></i>
                    <p style=\"font-family:'Cormorant Garamond',serif;font-size:1.05rem;color:var(--text-mid);font-style:italic;line-height:1.6;font-weight:300;\">\"La santé mentale est le fondement de tout bien-être.\"</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══ VIDEO BANNER ═══ -->
<div class=\"video-banner\">
    <div class=\"video-inner\">
        <button class=\"play-btn\" data-bs-toggle=\"modal\" data-src=\"https://www.youtube.com/embed/DWRcNpR6Kdc\" data-bs-target=\"#videoModal\">
            <i class=\"fas fa-play\"></i>
        </button>
        <p class=\"video-quote\">
            \"Ensemble, nous pouvons construire un monde où chacun a la chance de s'épanouir pleinement, corps et âme.\"
        </p>
    </div>
</div>

<!-- Video Modal -->
<div class=\"modal fade\" id=\"videoModal\" tabindex=\"-1\" aria-hidden=\"true\">
    <div class=\"modal-dialog modal-lg\">
        <div class=\"modal-content\" style=\"border:none;background:var(--text-dark);\">
            <div class=\"modal-header\" style=\"border:none;padding:16px 20px;\">
                <h5 class=\"modal-title\" style=\"color:var(--beige-light);font-family:'Playfair Display',serif;\">Notre Mission en Vidéo</h5>
                <button type=\"button\" class=\"btn-close btn-close-white\" data-bs-dismiss=\"modal\"></button>
            </div>
            <div class=\"modal-body p-0\">
                <div class=\"ratio ratio-16x9\">
                    <iframe src=\"\" id=\"video\" allowfullscreen allow=\"autoplay\"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ═══ ABOUT ═══ -->
<section class=\"about-section\">
    <div class=\"container-custom\">
        <div class=\"row-flex\">
            <div class=\"col-half\">
                <div class=\"about-img-wrap\">
                    <img src=\"img/about.jpg\" alt=\"À propos de MindCare\" style=\"border-radius:2px;\">
                    <div class=\"about-img-accent\"></div>
                    <div class=\"about-img-badge\">
                        <span class=\"badge-number\">18</span>
                        <span class=\"badge-label\">Ans d'Engagement</span>
                    </div>
                </div>
            </div>
            <div class=\"col-half\">
              <div class=\"section-eyebrow\">À propos de NAFSEYTI</div>

                <h2 class=\"section-title-new\">
                    Une solution pensée pour <em>l’écosystème universitaire tunisien</em>
                </h2>

                <p class=\"about-text\">
                    NAFSEYTI est la première plateforme complète de soutien psychologique
                    conçue spécifiquement pour les étudiants, les enseignants et les établissements universitaires en Tunisie.
                </p>
                <ul class=\"mission-points\">
                    <li>
                        <div class=\"point-icon\"><i class=\"fas fa-check\"></i></div>
                        <span>Soutien psychologique immédiat et confidentiel pour les étudiants.</span>
                    </li>

                    <li>
                        <div class=\"point-icon\"><i class=\"fas fa-check\"></i></div>
                        <span>Détection précoce et outils pédagogiques pour les enseignants.</span>
                    </li>

                    <li>
                        <div class=\"point-icon\"><i class=\"fas fa-check\"></i></div>
                        <span>Réduction du décrochage universitaire et amélioration du bien-être collectif.</span>
                    </li>
                </ul>
                <div style=\"margin-top:36px;\">
                    <a href=\"#!\" class=\"btn-primary-custom\" style=\"background:var(--green-deep);color:var(--beige-cream);\">Notre Histoire</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══ SERVICES ═══ -->
<section class=\"services-section\">
    <div class=\"container-custom\">
        <div class=\"row-flex\" style=\"align-items:flex-end;margin-bottom:0;\">
            <div class=\"col-half\">
                <div class=\"section-eyebrow\">Ce que nous faisons</div>
                <h2 class=\"section-title-new\">
                    Nos <em>solutions</em><br>
                    pour l’université
                </h2>
            </div>
            <div class=\"col-half\">
                <p style=\"font-family:'Cormorant Garamond',serif;font-size:1.15rem;color:#6B7D5A;line-height:1.8;font-weight:300;\">
                    Nous créons des programmes qui répondent aux besoins urgents tout en favorisant 
                    des solutions durables pour un changement profond et durable.
                </p>
            </div>
        </div>
        <div class=\"services-grid\" style=\"margin-top:48px;\">
            <div class=\"service-card\">
                <div class=\"service-icon\"><i class=\"fas fa-brain\"></i></div>
                <h3 class=\"service-name\">Soutien Psychologique</h3>
                <p class=\"service-desc\">Accompagnement individuel et de groupe pour traverser les épreuves de la vie avec résilience et sérénité.</p>
                <a href=\"#!\" class=\"service-link\">En savoir plus →</a>
            </div>
            <div class=\"service-card\">
                <div class=\"service-icon\"><i class=\"fas fa-heart-pulse\"></i></div>
                <h3 class=\"service-name\">Santé Mentale</h3>
                <p class=\"service-desc\">Prévention, sensibilisation et accès aux soins de santé mentale pour les populations les plus vulnérables.</p>
                <a href=\"#!\" class=\"service-link\">En savoir plus →</a>
            </div>
            <div class=\"service-card\">
                <div class=\"service-icon\"><i class=\"fas fa-hands-holding-child\"></i></div>
                <h3 class=\"service-name\">Aide Sociale</h3>
                <p class=\"service-desc\">Soutien aux enfants et familles en difficulté, pour un filet de sécurité solide et bienveillant.</p>
                <a href=\"#!\" class=\"service-link\">En savoir plus →</a>
            </div>
            <div class=\"service-card\">
                <div class=\"service-icon\"><i class=\"fas fa-seedling\"></i></div>
                <h3 class=\"service-name\">Développement Personnel</h3>
                <p class=\"service-desc\">Ateliers et formations pour cultiver la confiance en soi, la pleine conscience et le bien-être au quotidien.</p>
                <a href=\"#!\" class=\"service-link\">En savoir plus →</a>
            </div>
            <div class=\"service-card\">
                <div class=\"service-icon\"><i class=\"fas fa-graduation-cap\"></i></div>
                <h3 class=\"service-name\">Éducation & Sensibilisation</h3>
                <p class=\"service-desc\">Programmes éducatifs pour briser les tabous autour de la santé mentale dans les écoles et communautés.</p>
                <a href=\"#!\" class=\"service-link\">En savoir plus →</a>
            </div>
            <div class=\"service-card\">
                <div class=\"service-icon\"><i class=\"fas fa-house-heart\"></i></div>
                <h3 class=\"service-name\">Hébergement d'Urgence</h3>
                <p class=\"service-desc\">Solutions d'accueil et d'accompagnement pour les personnes en situation de détresse aiguë.</p>
                <a href=\"#!\" class=\"service-link\">En savoir plus →</a>
            </div>
        </div>
    </div>
</section>

<!-- ═══ FEATURES / STATS ═══ -->
<section class=\"features-section\">
    <div class=\"container-custom\">
        <div class=\"row-flex\">
            <div class=\"col-half\">
                <div class=\"stats-mosaic\">
                    <div class=\"stat-tile\">
                        <i class=\"fas fa-users tile-icon\"></i>
                        <div class=\"tile-number\">500<span class=\"tile-unit\">+</span></div>
                        <div class=\"tile-label\">Membres de l'Équipe</div>
                    </div>
                    <div class=\"stat-tile\">
                        <i class=\"fas fa-award tile-icon\"></i>
                        <div class=\"tile-number\">70</div>
                        <div class=\"tile-label\">Prix Remportés</div>
                    </div>
                    <div class=\"stat-tile\">
                        <i class=\"fas fa-list-check tile-icon\"></i>
                        <div class=\"tile-number\">3K<span class=\"tile-unit\">+</span></div>
                        <div class=\"tile-label\">Projets Réalisés</div>
                    </div>
                    <div class=\"stat-tile\">
                        <i class=\"fas fa-comments tile-icon\"></i>
                        <div class=\"tile-number\">7K<span class=\"tile-unit\">+</span></div>
                        <div class=\"tile-label\">Avis Positifs</div>
                    </div>
                </div>
            </div>
            <div class=\"col-half\">
                <div class=\"section-eyebrow\">Pourquoi NAFSEYTI ?</div>
                <h2 class=\"section-title-new\">
                      Une <em>valeur ajoutée unique</em>
                </h2>
                <p style=\"font-family:'Cormorant Garamond',serif;font-size:1.15rem;color:#6B7D5A;line-height:1.8;font-weight:300;margin-bottom:16px;\">
                    Notre engagement repose sur une approche humaine, scientifique et bienveillante au service de chacun.
                </p>
                <div class=\"features-list\">
                    <div class=\"feature-item\">
                        <span class=\"feature-num\">01</span>
                        <div class=\"feature-content\">
                            <h4>Approche Centrée sur la Personne</h4>
                            <p>Chaque individu est unique. Nos programmes sont personnalisés selon les besoins spécifiques de chaque bénéficiaire.</p>
                        </div>
                    </div>
                    <div class=\"feature-item\">
                        <span class=\"feature-num\">02</span>
                        <div class=\"feature-content\">
                            <h4>Équipe de Professionnels Certifiés</h4>
                            <p>Psychologues, travailleurs sociaux et bénévoles formés travaillent ensemble pour un soutien holistique.</p>
                        </div>
                    </div>
                    <div class=\"feature-item\">
                        <span class=\"feature-num\">03</span>
                        <div class=\"feature-content\">
                            <h4>Transparence & Impact Mesurable</h4>
                            <p>Chaque don est tracé et son impact documenté. Vous savez exactement comment votre générosité aide.</p>
                        </div>
                    </div>
                </div>
                <div style=\"display:flex;gap:16px;margin-top:40px;\">
                    <a href=\"#!\" class=\"btn-primary-custom\" style=\"background:var(--green-deep);color:var(--beige-cream);\">Faire un Don</a>
                    <a href=\"#!\" class=\"btn-primary-custom\" style=\"background:transparent;color:var(--green-deep);border:1px solid var(--beige-mid);\">Nous Rejoindre</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══ NOS CAUSES ═══ -->
<section class=\"donations-section\">
    <div class=\"container-custom\">
        <div style=\"text-align:center;margin-bottom:0;\">
            <div class=\"section-eyebrow\" style=\"justify-content:center;\">Nos Causes</div>
            <h2 class=\"section-title-new\" style=\"max-width:700px;margin:0 auto;\">
                Nos <em>solutions</em> pour le bien-être universitaire
            </h2>
        </div>

        <div class=\"donation-cards\">

            <div class=\"donation-card\">
                <span class=\"donation-category\">Étudiants</span>
                <img src=\"img/student-support.jpg\" alt=\"Soutien étudiant\" class=\"donation-img\">
                <h3 class=\"donation-title\">Soutien immédiat & anonymat</h3>
                <p class=\"donation-desc\">
                    Un espace sécurisé offrant écoute, prévention,
                    accompagnement psychologique et contenu adapté
                    aux défis universitaires.
                </p>
                <div class=\"progress-wrap\">
                    <div class=\"progress-labels\">
                        <span>Objectif : <strong>Soutien rapide</strong></span>
                        <span>Disponibilité : 24/7</span>
                    </div>
                    <div class=\"progress-bar-wrap\">
                        <div class=\"progress-fill\" data-width=\"90\" style=\"width:0%\"></div>
                    </div>
                    <div class=\"progress-percent\">90% couverture</div>
                </div>
                <a href=\"#!\" class=\"donate-btn\">Découvrir</a>
            </div>

            <div class=\"donation-card\">
                <span class=\"donation-category\">Enseignants</span>
                <img src=\"img/teacher-support.jpg\" alt=\"Support enseignants\" class=\"donation-img\">
                <h3 class=\"donation-title\">Détection précoce</h3>
                <p class=\"donation-desc\">
                    Outils pour repérer les signes de mal-être,
                    ressources pédagogiques et communication facilitée
                    avec les étudiants.
                </p>
                <div class=\"progress-wrap\">
                    <div class=\"progress-labels\">
                        <span>Objectif : <strong>Prévention</strong></span>
                        <span>Performance : élevée</span>
                    </div>
                    <div class=\"progress-bar-wrap\">
                        <div class=\"progress-fill\" data-width=\"95\" style=\"width:0%\"></div>
                    </div>
                    <div class=\"progress-percent\">95% efficacité</div>
                </div>
                <a href=\"#!\" class=\"donate-btn\">Explorer</a>
            </div>

            <div class=\"donation-card\">
                <span class=\"donation-category\">Université</span>
                <img src=\"img/university-support.jpg\" alt=\"Université\" class=\"donation-img\">
                <h3 class=\"donation-title\">Réduction du décrochage</h3>
                <p class=\"donation-desc\">
                    Suivi stratégique, amélioration du bien-être collectif,
                    innovation institutionnelle et données d’aide à la décision.
                </p>
                <div class=\"progress-wrap\">
                    <div class=\"progress-labels\">
                        <span>Objectif : <strong>Réussite</strong></span>
                        <span>Impact : fort</span>
                    </div>
                    <div class=\"progress-bar-wrap\">
                        <div class=\"progress-fill\" data-width=\"85\" style=\"width:0%\"></div>
                    </div>
                    <div class=\"progress-percent\">85% impact positif</div>
                </div>
                <a href=\"#!\" class=\"donate-btn\">Voir plus</a>
            </div>

        </div>
    </div>
</section>

<!-- ═══ CTA BANNER ═══ -->
<section class=\"cta-banner\">
    <div class=\"cta-content\">
        <h2>
            Notre plateforme est toujours ouverte pour <em>vous accompagner</em>
        </h2>

        <p>
            NAFSEYTI accompagne les étudiants, les enseignants et les universités
            en offrant un espace sécurisé, anonyme et accessible pour le bien-être
            psychologique et la réussite académique.
        </p>

        <div style=\"display:flex;gap:16px;justify-content:center;flex-wrap:wrap;\">
            <a href=\"#!\" class=\"btn-primary-custom\">Découvrir la plateforme</a>
            <a href=\"#!\" class=\"btn-ghost\">Prendre rendez-vous</a>
        </div>
    </div>
</section>

<!-- ═══ EVENTS ═══ -->
<section class=\"events-section\">
    <div class=\"container-custom\">
        <div style=\"text-align:center;\">
            <div class=\"section-eyebrow\" style=\"justify-content:center;\">Événements</div>
            <h2 class=\"section-title-new\" style=\"max-width:600px;margin:0 auto;\">
                Rejoignez nos <em>ateliers universitaires</em>
            </h2>
        </div>

        <div class=\"events-grid\">
            <div class=\"event-card\">
                <img src=\"img/event-1.jpg\" alt=\"Atelier gestion du stress\">
                <div class=\"event-body\">
                    <div class=\"event-meta\">
                        <span><i class=\"fas fa-clock\"></i> 10h00 – 12h00</span>
                        <span><i class=\"fas fa-calendar\"></i> 10 Mai</span>
                        <span><i class=\"fas fa-map-marker-alt\"></i> Tunis</span>
                    </div>
                    <a href=\"#!\" class=\"event-name\">Atelier Gestion du Stress</a>
                    <p class=\"event-desc\">
                        Techniques de relaxation et gestion du stress académique
                        pour les étudiants en période d’examen.
                    </p>
                </div>
            </div>

            <div class=\"event-card\">
                <img src=\"img/event-22.jpg\" alt=\"Prévention burn-out\">
                <div class=\"event-body\">
                    <div class=\"event-meta\">
                        <span><i class=\"fas fa-clock\"></i> 14h00 – 16h00</span>
                        <span><i class=\"fas fa-calendar\"></i> 15 Mai</span>
                        <span><i class=\"fas fa-map-marker-alt\"></i> Sfax</span>
                    </div>
                    <a href=\"#!\" class=\"event-name\">Prévention du Burn-out</a>
                    <p class=\"event-desc\">
                        Sensibilisation à la santé mentale et prévention
                        du surmenage chez les étudiants et enseignants.
                    </p>
                </div>
            </div>

            <div class=\"event-card\">
                <img src=\"img/event-33.jpg\" alt=\"Journée bien-être\">
                <div class=\"event-body\">
                    <div class=\"event-meta\">
                        <span><i class=\"fas fa-clock\"></i> 09h00 – 17h00</span>
                        <span><i class=\"fas fa-calendar\"></i> 20 Mai</span>
                        <span><i class=\"fas fa-map-marker-alt\"></i> Sousse</span>
                    </div>
                    <a href=\"#!\" class=\"event-name\">Journée Bien-être Campus</a>
                    <p class=\"event-desc\">
                        Séances de soutien psychologique et activités
                        de bien-être ouvertes à toute l’université.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══ TEAM ═══ -->
<section class=\"team-section\">
    <div class=\"container-custom\">
        <div style=\"text-align:center;\">
            <div class=\"section-eyebrow\" style=\"justify-content:center;\">Notre Équipe</div>
            <h2 class=\"section-title-new\" style=\"max-width:600px;margin:0 auto;\">
                Rencontrez les <em>experts</em> derrière NAFSEYTI
            </h2>
        </div>

        <div class=\"team-grid\">
            <div class=\"team-card\">
                <img src=\"img/team-11.jpg\" alt=\"Psychologue clinicienne\">
                <div class=\"team-info\">
                    <div>
                        <div class=\"team-name\">Dr. Sarah Ben Ali</div>
                        <div class=\"team-role\">Psychologue Clinicienne</div>
                    </div>
                    <div class=\"team-socials\">
                        <a href=\"#!\" class=\"team-social-btn\"><i class=\"fab fa-linkedin-in\"></i></a>
                        <a href=\"#!\" class=\"team-social-btn\"><i class=\"fas fa-envelope\"></i></a>
                    </div>
                </div>
            </div>

            <div class=\"team-card\">
                <img src=\"img/team-22.jpg\" alt=\"Expert pédagogique\">
                <div class=\"team-info\">
                    <div>
                        <div class=\"team-name\">Ahmed Khalil</div>
                        <div class=\"team-role\">Expert en Accompagnement Universitaire</div>
                    </div>
                    <div class=\"team-socials\">
                        <a href=\"#!\" class=\"team-social-btn\"><i class=\"fab fa-linkedin-in\"></i></a>
                        <a href=\"#!\" class=\"team-social-btn\"><i class=\"fas fa-envelope\"></i></a>
                    </div>
                </div>
            </div>

            <div class=\"team-card\">
                <img src=\"img/team-33.jpg\" alt=\"Responsable plateforme\">
                <div class=\"team-info\">
                    <div>
                        <div class=\"team-name\">Leila Mansour</div>
                        <div class=\"team-role\">Responsable Support & Suivi Étudiant</div>
                    </div>
                    <div class=\"team-socials\">
                        <a href=\"#!\" class=\"team-social-btn\"><i class=\"fab fa-linkedin-in\"></i></a>
                        <a href=\"#!\" class=\"team-social-btn\"><i class=\"fas fa-envelope\"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══ TESTIMONIALS ═══ -->
<section class=\"testimonials-section\">
    <div class=\"container-custom\">
        <div class=\"row-flex\" style=\"align-items:flex-start;gap:80px;\">
            <div style=\"flex:0 0 300px;\">
                <div class=\"section-eyebrow\">Témoignages</div>
                <h2 class=\"section-title-new\">
                    Ce que disent<br>nos <em>utilisateurs</em>
                </h2>
                <p style=\"font-family:'Cormorant Garamond',serif;font-size:1.1rem;color:#6B7D5A;line-height:1.8;font-weight:300;margin-top:16px;\">
                    Étudiants, enseignants et responsables universitaires partagent leur expérience avec NAFSEYTI.
                </p>
            </div>

            <div style=\"flex:1;\">
                <div class=\"testimonial-cards\" style=\"grid-template-columns:1fr;\">
                    
                    <div class=\"testimonial-card\">
                        <span class=\"quote-mark\">\"</span>
                        <div class=\"stars\">★★★★★</div>
                        <p class=\"testimonial-text\">
                            Grâce à NAFSEYTI, j’ai trouvé un espace sûr pour parler de mon stress académique.
                            Le suivi personnalisé m’a beaucoup aidé pendant la période des examens.
                        </p>
                        <div class=\"testimonial-author\">
                            <img src=\"img/testimonial-1.jpg\" alt=\"Étudiante\" class=\"author-avatar\">
                            <div>
                                <div class=\"author-name\">Amira Ben Salah</div>
                                <div class=\"author-title\">Étudiante en Informatique</div>
                            </div>
                        </div>
                    </div>

                    <div class=\"testimonial-card\">
                        <span class=\"quote-mark\">\"</span>
                        <div class=\"stars\">★★★★★</div>
                        <p class=\"testimonial-text\">
                            La plateforme facilite la détection précoce des étudiants en difficulté
                            et améliore la communication entre enseignants et services d’accompagnement.
                        </p>
                        <div class=\"testimonial-author\">
                            <img src=\"img/testimonial-2.jpg\" alt=\"Enseignant\" class=\"author-avatar\">
                            <div>
                                <div class=\"author-name\">Karim Trabelsi</div>
                                <div class=\"author-title\">Enseignant Universitaire</div>
                            </div>
                        </div>
                    </div>

                    <div class=\"testimonial-card\">
                        <span class=\"quote-mark\">\"</span>
                        <div class=\"stars\">★★★★★</div>
                        <p class=\"testimonial-text\">
                            NAFSEYTI nous aide à mieux comprendre les besoins psychologiques
                            de notre communauté étudiante grâce à des données stratégiques fiables.
                        </p>
                        <div class=\"testimonial-author\">
                            <img src=\"img/testimonial-3.jpg\" alt=\"Université\" class=\"author-avatar\">
                            <div>
                                <div class=\"author-name\">Nadia Chaieb</div>
                                <div class=\"author-title\">Responsable Vie Universitaire</div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- ═══ NEWSLETTER ═══ -->
<section class=\"newsletter-section\">
    <h2>Restez <em style=\"font-style:italic;color:var(--green-pale);\">connectés</em> à notre mission</h2>
    <p>Recevez nos actualités, événements et témoignages. Pas de spam, promis.</p>
    <div class=\"newsletter-form\">
        <input type=\"email\" class=\"newsletter-input\" placeholder=\"Votre adresse email\">
        <button class=\"newsletter-btn\">S'abonner</button>
    </div>
</section>

{% endblock %}
", "home/index.html.twig", "C:\\Users\\DELL\\Downloads\\psy\\templates\\home\\index.html.twig");
    }
}
