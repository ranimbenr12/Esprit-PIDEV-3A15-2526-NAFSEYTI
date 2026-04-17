/* ══════════════════════════════════════════════════════
   psy_ia_analyse.js  —  Module analyse patient OpenAI
   À inclure dans psy_dashboard.html.twig avant </body>
   ══════════════════════════════════════════════════════ */

async function lancerAnalyseIA() {
  const nomPatient = document.getElementById('iaPatientInput').value.trim();
  if (!nomPatient) {
    document.getElementById('iaPatientInput').focus();
    return;
  }

  // Ouvrir le modal en mode loading
  const overlay = document.getElementById('iaModalOverlay');
  overlay.classList.add('open');
  document.getElementById('iaLoading').style.display = 'block';
  document.getElementById('iaResult').style.display  = 'none';
  document.getElementById('iaError').style.display   = 'none';
  document.getElementById('iaLoadingName').textContent = nomPatient;
  document.getElementById('iaBtnAnalyse').disabled = true;

  try {
    const res = await fetch('/psy/ia/analyse-patient', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
      body: JSON.stringify({ patient: nomPatient })
    });

    const data = await res.json();

    if (!data.success) throw new Error(data.message || 'Erreur serveur');

    afficherResultatIA(data);

  } catch (err) {
    document.getElementById('iaLoading').style.display = 'none';
    document.getElementById('iaError').style.display   = 'block';
    document.getElementById('iaErrorMsg').textContent  = err.message;
  } finally {
    document.getElementById('iaBtnAnalyse').disabled = false;
  }
}

function afficherResultatIA(data) {
  const { patient, fichesCount, duree, evolution, tendances, synthese, recommandations } = data;

  // Header
  const initiales = patient.split(' ').map(m => m[0]).join('').slice(0,2).toUpperCase();
  document.getElementById('iaResultAvatar').textContent = initiales;
  document.getElementById('iaResultName').textContent   = patient;
  document.getElementById('iaResultMeta').textContent   =
    fichesCount + ' fiche' + (fichesCount > 1 ? 's' : '') + ' analysée' + (fichesCount > 1 ? 's' : '') +
    (duree ? ' · ' + duree : '') + ' · OpenAI GPT-4o';

  // Badge évolution
  const badge = document.getElementById('iaEvoBadge');
  badge.textContent = evolution.label;
  badge.className   = 'ia-evolution-badge ' + (
    evolution.type === 'positive' ? 'evo-positive' :
    evolution.type === 'negative' ? 'evo-negative' : 'evo-stable'
  );

  // KPI
  document.getElementById('iaKpiRow').innerHTML = `
    <div class="ia-kpi"><div class="ia-kpi-val">${fichesCount}</div><div class="ia-kpi-lbl">Fiches analysées</div></div>
    <div class="ia-kpi"><div class="ia-kpi-val" style="color:${evolution.type==='positive'?'#3B6D11':evolution.type==='negative'?'#A32D2D':'#854F0B'}">${evolution.score}</div><div class="ia-kpi-lbl">Score d'évolution</div></div>
    <div class="ia-kpi"><div class="ia-kpi-val">${duree || '—'}</div><div class="ia-kpi-lbl">Durée de suivi</div></div>
  `;

  // Tendances
  const tendancesHtml = (tendances || []).map(t => `
    <div class="ia-tendance-row">
      <span class="ia-tendance-symptome">${escHtml(t.symptome)}</span>
      <span class="ia-t-badge ${t.type==='pos'?'t-pos':t.type==='neg'?'t-neg':'t-neu'}">${escHtml(t.label)}</span>
    </div>
  `).join('');
  document.getElementById('iaTendances').innerHTML = tendancesHtml || '<p style="color:#aaa;font-size:13px">Aucune tendance identifiée.</p>';

  // Synthèse
  document.getElementById('iaSynthese').innerHTML = escHtml(synthese || '').replace(/\n/g, '<br>');

  // Recommandations
  const recoHtml = (recommandations || []).map((r, i) => `
    <div class="ia-reco-item">
      <span class="ia-reco-num">${i+1}</span>
      <span>${escHtml(r)}</span>
    </div>
  `).join('');
  document.getElementById('iaReco').innerHTML = recoHtml || '<p style="color:#aaa;font-size:13px">Aucune recommandation.</p>';

  // Afficher
  document.getElementById('iaLoading').style.display = 'none';
  document.getElementById('iaResult').style.display  = 'block';
}

function fermerModalIA(event, force = false) {
  if (force || (event && event.target === document.getElementById('iaModalOverlay'))) {
    document.getElementById('iaModalOverlay').classList.remove('open');
  }
}

function escHtml(str) {
  if (!str) return '';
  return String(str)
    .replace(/&/g, '&amp;').replace(/</g, '&lt;')
    .replace(/>/g, '&gt;').replace(/"/g, '&quot;');
}

// Fermer avec Échap
document.addEventListener('keydown', e => {
  if (e.key === 'Escape') fermerModalIA(null, true);
});