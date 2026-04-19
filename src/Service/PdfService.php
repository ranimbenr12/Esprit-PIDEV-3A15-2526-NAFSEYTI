<?php

namespace App\Service;

use Nucleos\DompdfBundle\Wrapper\DompdfWrapperInterface;

class PdfService
{
    // ✅ Plus de $projectDir
    // ✅ DompdfWrapperInterface injecté automatiquement par Symfony
    public function __construct(
        private DompdfWrapperInterface $dompdf
    ) {}

    public function genererRapportTest(array $data): string
    {
        $html = $this->genererHtml($data);

        // ✅ Le bundle gère Options, loadHtml, render, output
        // Une seule ligne au lieu de 6
       return $this->dompdf->getPdf($html);
    }

    private function genererHtml(array $data): string
    {
        $test           = $data['test'];
        $percentage     = $data['percentage'];
        $totalScore     = $data['totalScore'];
        $maxScore       = $data['maxScore'];
        $interpretation = $data['interpretation'];
        $gemini         = $data['gemini'] ?? [];
        $reponses       = $data['reponses'] ?? [];
        $date           = date('d/m/Y a H:i');

        $scoreColor = '#1a3d2b';
        if ($percentage >= 80)     $scoreColor = '#2d6a4f';
        elseif ($percentage >= 60) $scoreColor = '#52b788';
        elseif ($percentage >= 40) $scoreColor = '#b7791f';
        else                       $scoreColor = '#c0392b';

        $niveauRisque = $gemini['niveau_risque'] ?? 'normal';
        $risqueBg     = '#d8f3dc';
        $risqueColor  = '#1a3d2b';
        $risqueText   = 'Normal';
        if ($niveauRisque === 'critique') {
            $risqueBg = '#fdf0ee'; $risqueColor = '#c0392b'; $risqueText = 'Attention requise';
        } elseif ($niveauRisque === 'attention') {
            $risqueBg = '#fef9ee'; $risqueColor = '#b7791f'; $risqueText = 'A surveiller';
        }

        $conseilsHtml = '';
        if (!empty($gemini['conseils'])) {
            foreach ($gemini['conseils'] as $i => $conseil) {
                $num = $i + 1;
                $conseilsHtml .= "
                <tr>
                    <td style='padding:10px 14px;border-bottom:1px solid #e8f4ec;font-size:11px;color:#3d5a45;line-height:1.6;'>
                        <span style='color:#52b788;font-weight:bold;margin-right:8px;'>{$num}.</span>
                        {$conseil}
                    </td>
                </tr>";
            }
        }

        $reponsesHtml = '';
        foreach ($reponses as $i => $r) {
            $num      = $i + 1;
            $question = htmlspecialchars($r['question']->getTexte());
            $reponse  = htmlspecialchars($r['reponse']);
            $score    = $r['score'];
            $max      = $r['points_max'];
            $bg       = $i % 2 === 0 ? '#faf6f0' : 'white';
            $reponsesHtml .= "
            <tr style='background:{$bg}'>
                <td style='padding:10px 14px;border-bottom:1px solid #e0d5c5;font-size:11px;color:#3d5a45;font-weight:600;width:40%;'>
                    Q{$num}. {$question}
                </td>
                <td style='padding:10px 14px;border-bottom:1px solid #e0d5c5;font-size:11px;color:#1a2e1f;'>
                    {$reponse}
                </td>
                <td style='padding:10px 14px;border-bottom:1px solid #e0d5c5;font-size:11px;text-align:center;color:{$scoreColor};font-weight:bold;'>
                    {$score}/{$max}
                </td>
            </tr>";
        }

        $analyseGemini = htmlspecialchars($gemini['analyse'] ?? 'Analyse non disponible');
        $testTitre     = htmlspecialchars($test->getTitre());
        $interpTitle   = htmlspecialchars($interpretation['title'] ?? '');
        $interpDesc    = htmlspecialchars($interpretation['description'] ?? '');
        $interpAdvice  = htmlspecialchars($interpretation['advice'] ?? '');
        $barWidth      = min(100, max(0, $percentage));

        $conseilsBlock = !empty($conseilsHtml) ? "
            <div style='border-top:1px solid #e8f4ec;padding-top:14px;margin-top:14px;'>
                <div style='font-size:11px;font-weight:bold;color:#1a3d2b;text-transform:uppercase;letter-spacing:1px;margin-bottom:10px;'>
                    Conseils personnalises
                </div>
                <table style='width:100%;border-collapse:collapse;'>
                    {$conseilsHtml}
                </table>
            </div>" : "";

        $reponsesBlock = !empty($reponsesHtml) ? "
            <div style='margin:20px 40px 0;'>
                <div style='font-size:13px;font-weight:bold;color:#1a3d2b;text-transform:uppercase;letter-spacing:1px;margin-bottom:12px;padding-bottom:6px;border-bottom:2px solid #d8f3dc;'>
                    Detail des reponses
                </div>
                <table style='width:100%;border-collapse:collapse;'>
                    <thead>
                        <tr>
                            <th style='background:#1a3d2b;color:#d8f3dc;padding:10px 14px;font-size:10px;text-transform:uppercase;letter-spacing:0.5px;text-align:left;'>Question</th>
                            <th style='background:#1a3d2b;color:#d8f3dc;padding:10px 14px;font-size:10px;text-transform:uppercase;letter-spacing:0.5px;text-align:left;'>Votre reponse</th>
                            <th style='background:#1a3d2b;color:#d8f3dc;padding:10px 14px;font-size:10px;text-transform:uppercase;letter-spacing:0.5px;text-align:center;width:80px;'>Score</th>
                        </tr>
                    </thead>
                    <tbody>
                        {$reponsesHtml}
                    </tbody>
                </table>
            </div>" : "";

        return "
<!DOCTYPE html>
<html>
<head>
<meta charset='UTF-8'>
<style>
    * { margin:0; padding:0; box-sizing:border-box; }
    body { font-family: DejaVu Sans, sans-serif; background:#faf6f0; color:#1a2e1f; font-size:12px; }
</style>
</head>
<body>

    <!-- HEADER -->
    <div style='background:#1a3d2b;padding:28px 40px;'>
        <table style='width:100%;'>
            <tr>
                <td style='vertical-align:middle;'>
                    <div style='font-size:26px;font-weight:bold;color:#faf6f0;letter-spacing:3px;'>NAFSEYTI</div>
                    <div style='font-size:10px;color:#95d5b2;margin-top:4px;'>Plateforme de bien-etre psychologique</div>
                    <div style='font-size:9px;color:#d8f3dc;margin-top:6px;'>Rapport genere le {$date}</div>
                </td>
                <td style='vertical-align:middle;text-align:right;'>
                    <div style='font-size:16px;font-weight:bold;color:#faf6f0;'>{$testTitre}</div>
                    <div style='font-size:10px;color:#95d5b2;margin-top:4px;'>Rapport d analyse psychologique</div>
                </td>
            </tr>
        </table>
    </div>

    <!-- SCORE -->
    <div style='background:#2d6a4f;margin:24px 40px 0;border-radius:14px;padding:28px;text-align:center;color:white;'>
        <div style='font-size:11px;opacity:0.8;margin-bottom:8px;'>Votre score</div>
        <div style='font-size:52px;font-weight:bold;margin-bottom:6px;color:#faf6f0;'>{$percentage}%</div>
        <div style='font-size:12px;opacity:0.9;margin-bottom:16px;'>{$totalScore} / {$maxScore} points</div>
        <div style='background:rgba(255,255,255,0.25);height:10px;border-radius:100px;overflow:hidden;'>
            <div style='background:#d8f3dc;height:10px;border-radius:100px;width:{$barWidth}%;'></div>
        </div>
    </div>

    <!-- INTERPRETATION -->
    <div style='margin:20px 40px 0;'>
        <div style='font-size:13px;font-weight:bold;color:#1a3d2b;text-transform:uppercase;letter-spacing:1px;margin-bottom:12px;padding-bottom:6px;border-bottom:2px solid #d8f3dc;'>
            Interpretation
        </div>
        <div style='background:#faf6f0;border-left:4px solid #52b788;border-radius:0 10px 10px 0;padding:18px 20px;'>
            <div style='font-size:14px;font-weight:bold;color:#1a3d2b;margin-bottom:8px;'>{$interpTitle}</div>
            <div style='font-size:11px;color:#3d5a45;line-height:1.7;margin-bottom:10px;'>{$interpDesc}</div>
            <div style='background:#d8f3dc;border-radius:8px;padding:10px 14px;font-size:11px;color:#1a3d2b;'>
                <strong>Conseil :</strong> {$interpAdvice}
            </div>
        </div>
    </div>

    <!-- IA ANALYSE -->
    <div style='margin:20px 40px 0;'>
        <div style='font-size:13px;font-weight:bold;color:#1a3d2b;text-transform:uppercase;letter-spacing:1px;margin-bottom:12px;padding-bottom:6px;border-bottom:2px solid #d8f3dc;'>
            Analyse par Intelligence Artificielle
        </div>
        <div style='background:white;border:1px solid #e0f0e8;border-radius:12px;padding:20px;'>
            <table style='width:100%;margin-bottom:14px;'>
                <tr>
                    <td style='vertical-align:middle;'>
                        <span style='font-size:13px;font-weight:bold;color:#1a3d2b;'>Analyse IA</span><br>
                        <span style='font-size:9px;color:#888;'>Powered by OpenRouter AI</span>
                    </td>
                    <td style='text-align:right;vertical-align:middle;'>
                        <span style='display:inline-block;background:{$risqueBg};color:{$risqueColor};padding:4px 12px;border-radius:20px;font-size:10px;font-weight:bold;'>
                            {$risqueText}
                        </span>
                    </td>
                </tr>
            </table>
            <div style='font-size:11px;color:#444;line-height:1.8;margin-bottom:16px;'>{$analyseGemini}</div>
            {$conseilsBlock}
        </div>
    </div>

    {$reponsesBlock}

    <!-- FOOTER -->
    <div style='margin-top:28px;background:#1a3d2b;padding:16px 40px;text-align:center;color:#95d5b2;font-size:10px;'>
        <strong style='color:#d8f3dc;'>NAFSEYTI</strong> — Plateforme de bien-etre psychologique |
        Document confidentiel genere le {$date} |
        <strong style='color:#d8f3dc;'>nafseyti.tn</strong>
    </div>

</body>
</html>";
    }
}