<?php

namespace App\Service;

use App\Entity\Question;

class ScoringService
{
    /**
     * Calcule le score réel d'une réponse selon le type de question
     */
    public function calculerScore(Question $question, mixed $reponseValue): int
    {
        if (empty($reponseValue)) {
            return 0;
        }

        return match ($question->getTypeQuestion()) {
            'qcm_unique'  => $this->scorerQcmUnique($question, $reponseValue),
            'qcm_multiple'=> $this->scorerQcmMultiple($question, $reponseValue),
            'likert'      => $this->scorerLikert($question, $reponseValue),
            'numerique'   => $this->scorerNumerique($question, $reponseValue),
            'vrai_faux'   => $this->scorerVraiFaux($question, $reponseValue),
            'texte_libre' => 0, // Analysé par Gemini, pas de score numérique
            default       => 0,
        };
    }

    /**
     * Score maximum possible pour une question
     */
    public function getScoreMax(Question $question): int
    {
        $poids = $question->getReponsesAvecPoids();

        if (empty($poids)) {
            return $question->getPoints() ?? 1;
        }

        // Le max est le plus grand poids défini
        return max(array_values($poids));
    }

    /**
     * Calcule le niveau de badge selon le pourcentage
     */
    public function calculerNiveauBadge(int $percentage): array
    {
        return match (true) {
            $percentage >= 90 => [
                'niveau'      => 'diamant',
                'label'       => 'Diamant',
                'icon'        => '💎',
                'color'       => '#00bcd4',
                'description' => 'Performance exceptionnelle',
                'points_xp'   => 500,
            ],
            $percentage >= 75 => [
                'niveau'      => 'or',
                'label'       => 'Or',
                'icon'        => '🥇',
                'color'       => '#ffd700',
                'description' => 'Excellent résultat',
                'points_xp'   => 300,
            ],
            $percentage >= 60 => [
                'niveau'      => 'argent',
                'label'       => 'Argent',
                'icon'        => '🥈',
                'color'       => '#c0c0c0',
                'description' => 'Bon résultat',
                'points_xp'   => 150,
            ],
            $percentage >= 40 => [
                'niveau'      => 'bronze',
                'label'       => 'Bronze',
                'icon'        => '🥉',
                'color'       => '#cd7f32',
                'description' => 'Résultat moyen',
                'points_xp'   => 75,
            ],
            default => [
                'niveau'      => 'debutant',
                'label'       => 'Débutant',
                'icon'        => '🌱',
                'color'       => '#4caf50',
                'description' => 'Continuez vos efforts',
                'points_xp'   => 25,
            ],
        };
    }

    /**
     * Calcule un score détaillé par catégorie de questions
     */
    public function calculerScoresParCategorie(array $reponsesData): array
    {
        $categories = [];

        foreach ($reponsesData as $item) {
            $question = $item['question'];
            $type     = $question->getTypeQuestion();

            if (!isset($categories[$type])) {
                $categories[$type] = [
                    'label'      => $this->getLabelType($type),
                    'score'      => 0,
                    'max'        => 0,
                    'count'      => 0,
                    'percentage' => 0,
                ];
            }

            $categories[$type]['score'] += $item['score'];
            $categories[$type]['max']   += $item['score_max'];
            $categories[$type]['count']++;
        }

        foreach ($categories as &$cat) {
            $cat['percentage'] = $cat['max'] > 0
                ? round(($cat['score'] / $cat['max']) * 100)
                : 0;
        }

        return $categories;
    }

    // ── Scorers privés ────────────────────────────────────────────

    private function scorerQcmUnique(Question $question, string $reponse): int
    {
        $poids = $question->getReponsesAvecPoids();

        if (isset($poids[$reponse])) {
            return $poids[$reponse];
        }

        // Fallback : toutes les réponses valent le même score
        return $question->getPoints() ?? 1;
    }

    private function scorerQcmMultiple(Question $question, mixed $reponses): int
    {
        if (!is_array($reponses)) {
            $reponses = [$reponses];
        }

        $poids = $question->getReponsesAvecPoids();
        $score = 0;

        foreach ($reponses as $rep) {
            $score += $poids[trim($rep)] ?? 0;
        }

        // Ne pas dépasser le max de la question
        return min($score, $question->getPoints() ?? 10);
    }

    private function scorerLikert(Question $question, mixed $reponse): int
    {
        // Likert : la valeur est souvent 1-5 directement
        $valeur = (int) $reponse;

        if ($valeur >= 1 && $valeur <= 5) {
            // Normaliser sur les points max
            $pointsMax = $question->getPoints() ?? 5;
            return (int) round(($valeur / 5) * $pointsMax);
        }

        // Si c'est un label, chercher dans les poids
        $poids = $question->getReponsesAvecPoids();
        return $poids[(string) $reponse] ?? 0;
    }

    private function scorerNumerique(Question $question, mixed $reponse): int
    {
        $valeur    = (float) $reponse;
        $pointsMax = $question->getPoints() ?? 10;

        // Extraire min/max depuis reponses_possibles (format "0:100" ou "min:max")
        $possibles = $question->getReponsesPossibles();
        if ($possibles && str_contains($possibles, ':')) {
            [$min, $max] = explode(':', $possibles);
            $min = (float) $min;
            $max = (float) $max;

            if ($max > $min) {
                $normalized = ($valeur - $min) / ($max - $min);
                return (int) round($normalized * $pointsMax);
            }
        }

        return min((int) $valeur, $pointsMax);
    }

    private function scorerVraiFaux(Question $question, string $reponse): int
    {
        $poids = $question->getReponsesAvecPoids();

        // Si poids définis (Vrai:5|Faux:0), les utiliser
        if (!empty($poids)) {
            return $poids[$reponse] ?? 0;
        }

        // Fallback : Vrai = points max, Faux = 0
        return strtolower($reponse) === 'vrai'
            ? ($question->getPoints() ?? 5)
            : 0;
    }

    private function getLabelType(string $type): string
    {
        return match ($type) {
            'qcm_unique'   => 'Choix unique',
            'qcm_multiple' => 'Choix multiple',
            'likert'       => 'Échelle',
            'numerique'    => 'Numérique',
            'vrai_faux'    => 'Vrai / Faux',
            'texte_libre'  => 'Texte libre',
            default        => $type,
        };
    }
}