<?php
namespace App\Service;

/**
 * Analyse un message et retourne sa classification :
 *   - normal   : rien à signaler
 *   - urgent   : recommander un RDV
 *   - critique : alerte immédiate + enregistrement alertes_suicide
 */
class MessageAnalyserService
{
    // Mots déclenchant une alerte CRITIQUE
    private const MOTS_CRITIQUES = [
        'suicide', 'me tuer', 'me suicider', 'mourir', 'veux mourir',
        'envie de mourir', 'fin de vie', 'mettre fin', 'me supprimer',
        'plus envie de vivre', 'tuer', 'me faire du mal', 'automutilation',
        'me blesser', 'overdose', 'sauter', 'me noyer', 'me pendre',
    ];

    // Mots déclenchant une alerte URGENTE
    private const MOTS_URGENTS = [
        'déprimé', 'dépression', 'désespoir', 'désespéré', 'sans espoir',
        'plus la force', 'abandon', 'seul', 'isolé', 'personne ne m\'aime',
        'inutile', 'nul', 'honte', 'crise', 'panique', 'angoisse sévère',
        'cauchemar', 'insomnie', 'plus dormir', 'craquer', 'effondré',
        'violence', 'agressé', 'harcelé', 'harcèlement',
    ];

    /**
     * @return array{niveau: string, mots_detectes: string[]}
     */
    public function analyser(string $message): array
    {
        $msgLower = mb_strtolower($message);
        $motsDetectes = [];

        // Vérifier mots critiques
        foreach (self::MOTS_CRITIQUES as $mot) {
            if (str_contains($msgLower, $mot)) {
                $motsDetectes[] = $mot;
            }
        }
        if (!empty($motsDetectes)) {
            return ['niveau' => 'critique', 'mots_detectes' => $motsDetectes];
        }

        // Vérifier mots urgents
        foreach (self::MOTS_URGENTS as $mot) {
            if (str_contains($msgLower, $mot)) {
                $motsDetectes[] = $mot;
            }
        }
        if (!empty($motsDetectes)) {
            return ['niveau' => 'urgent', 'mots_detectes' => $motsDetectes];
        }

        return ['niveau' => 'normal', 'mots_detectes' => []];
    }
}
