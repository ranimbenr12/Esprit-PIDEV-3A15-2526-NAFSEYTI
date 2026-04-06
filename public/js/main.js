(function ($) {
    "use strict";

    // Spinner
    var spinner = function () {
        setTimeout(function () {
            if ($('#spinner').length > 0) {
                $('#spinner').removeClass('show');
            }
        }, 1);
    };
    spinner();


    // Initiate the wowjs
    new WOW().init();


    // Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 90) {
            $('.nav-bar').addClass('fixed-top').css('padding', '0');
        } else {
            $('.nav-bar').removeClass('fixed-top').css('padding', '0px 90px');
        }
    });


    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 300) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Modal Video
    $(document).ready(function () {
        var $videoSrc;
        $('.btn-play').click(function () {
            $videoSrc = $(this).data("src");
        });

        $('#videoModal').on('shown.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
        });

        $('#videoModal').on('hide.bs.modal', function (e) {
            $("#video").attr('src', $videoSrc);
        });
    });


    // Facts counter
    $('[data-toggle="counter-up"]').counterUp({
        delay: 10,
        time: 2000
    });


    // Donation progress
    $('.donation-item .donation-progress').waypoint(function () {
        $('.donation-item .progress .progress-bar').each(function () {
            $(this).css("height", $(this).attr("aria-valuenow") + '%');
        });
    }, {offset: '80%'});


    // Header carousel
    $(".header-carousel").owlCarousel({
        animateOut: 'rotateOutUpRight',
        animateIn: 'rotateInDownLeft',
        items: 1,
        autoplay: true,
        smartSpeed: 1000,
        dots: false,
        loop: true,
        nav: true,
        navText: [
            '<i class="bi bi-chevron-left"></i>',
            '<i class="bi bi-chevron-right"></i>'
        ]
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        items: 1,
        autoplay: true,
        smartSpeed: 1000,
        animateIn: 'fadeIn',
        animateOut: 'fadeOut',
        dots: false,
        loop: true,
        nav: true,
        navText: [
            '<i class="bi bi-chevron-left"></i>',
            '<i class="bi bi-chevron-right"></i>'
        ]
    });


    // ── DELETE EVENT (wired to #deleteModal) ────────────────────────
    var deleteId = null;

    $(document).on('click', '.delete-event', function () {
        deleteId = $(this).data('id');
        var title = $(this).closest('tr').find('td:nth-child(2)').text().trim();
        $('#deleteEventTitle').text('"' + title + '"');
        $('#deleteModal').modal('show');
    });

    $('#confirmDeleteBtn').on('click', function () {
        if (!deleteId) return;

        var row = $('tr[data-event-id="' + deleteId + '"]');
        $('#deleteModal').modal('hide');

        $.ajax({
            url: '/admin/events/' + deleteId + '/delete',
            type: 'POST',
            success: function () {
                row.fadeOut(300, function () { $(this).remove(); });
                var remaining = $('#eventsTableBody tr[data-event-id]').length;
                $('#statsLabel').text('📊 ' + remaining + ' événements');
            },
            error: function (xhr) {
                alert('Erreur suppression (HTTP ' + xhr.status + ')');
            }
        });

        deleteId = null;
    });


    // ── OPEN CREATE MODAL ───────────────────────────────────────────
    $('#addEventBtn').click(function () {
        $('#createForm')[0].reset();
        $('#c_imagePreview').hide();
        $('#c_suggestionBadge').hide();
        $('#c_btnAccept').hide();
        $('#c_btnReject').hide();
        $('#c_planDescription, #c_planDuree').removeClass('field-suggestion field-valid');
        $('.modal-input').removeClass('field-valid field-warning field-error');
        $('.field-msg').text('');
        $('#c_btnCorrectTitle, #c_btnCorrectDesc').prop('disabled', true);
        $('#createFlash').html('');
        $('#createModal').modal('show');
    });


    // ── OPEN EDIT MODAL ─────────────────────────────────────────────
    $(document).on('click', '.edit-event', function () {
        var btn = $(this);
        var id  = btn.data('id');

        $('#e_eventId').val(id);
        $('#e_title').val(btn.data('title'));
        $('#e_location').val(btn.data('location'));
        $('#e_eventDate').val(btn.data('date'));
        $('#e_maxParticipants').val(btn.data('max'));
        $('#e_link').val(btn.data('link') || '');
        $('#e_planDescription').val(btn.data('plan-desc') || '');
        $('#e_planDuree').val(btn.data('plan-duree') || '');

        var link = btn.data('link');
        if (link) {
            $('#e_imagePreview').attr('src', link).show();
        } else {
            $('#e_imagePreview').hide();
        }

        $('#editForm .modal-input').removeClass('field-valid field-warning field-error');
        $('#editForm .field-msg').text('');
        $('#editFlash').html('');
        $('#editLoadingSpinner').hide();
        $('#editForm').attr('action', '/admin/events/' + id + '/edit').show();
        $('#editModal').modal('show');
    });


    // ── AUTO-REOPEN EDIT MODAL ON VALIDATION ERRORS (server-side) ──
    // This block is driven by Twig variables injected inline; kept here
    // as a hook so the pattern is clear. The actual inline script in the
    // Twig template handles the variable interpolation.


    // ── VIEW PLANIFICATIONS ─────────────────────────────────────────
    $(document).on('click', '.view-planif', function () {
        var id = $(this).data('id');
        $.getJSON('/admin/events/planifications/' + id, function (data) {
            if (!data.length) {
                alert('Aucune planification pour cet événement.');
                return;
            }
            var msg = data.map(function (p) {
                return '• ' + p.description + ' (' + p.duree + ')';
            }).join('\n');
            alert('📋 Planifications :\n\n' + msg);
        });
    });


    // ── CLIENT-SIDE SEARCH (instant, mirrors JavaFX FilteredList) ──
    $('#searchInput').on('input', function () {
        var key = $(this).val().toLowerCase().trim();
        var hasResults = false;

        $('#eventsTableBody tr[data-event-id]').each(function () {
            var row   = $(this);
            var title = row.find('td:nth-child(2)').text().toLowerCase();
            var date  = row.find('td:nth-child(3)').text().toLowerCase();
            var lieu  = row.find('td:nth-child(4)').text().toLowerCase();
            var parts = row.find('td:nth-child(7)').text().toLowerCase();

            if (!key || title.includes(key) || lieu.includes(key) || date.includes(key) || parts.includes(key)) {
                row.show();
                hasResults = true;
            } else {
                row.hide();
            }
        });

        $('#noResultsRow').remove();
        if (!hasResults && key) {
            $('#eventsTableBody').append(
                '<tr id="noResultsRow"><td colspan="8" class="text-center" style="color:#888;padding:20px;">Aucun résultat pour "' +
                $('<span>').text(key).html() + '"</td></tr>'
            );
        }
    });


    // ── REFRESH / ANALYSER / AI ASSISTANT ──────────────────────────
    $('#refreshBtn').click(function () { loadEvents(); });
    $('#analyzeBtn').click(function ()  { openAnalyse(); });
    $('#aiAssistantBtn').click(function () { alert('🤖 Assistant IA en développement'); });


    // ── ANALYSER MODAL ──────────────────────────────────────────────
    function openAnalyse() {
        $('#analyseModal').modal('show');
        $('#analyseTextArea').text('Cliquez sur "Générer l\'analyse" pour obtenir une analyse IA de vos événements...');
        loadAnalyseStats();
        startParticles();
    }

    $('#analyseModal').on('hidden.bs.modal', function () { stopParticles(); });

    function loadAnalyseStats() {
        $.getJSON('/admin/events/analytics', function (d) {
            var cards = [
                { icon: '📅', value: d.totalEvents,                               label: 'ÉVÉNEMENTS',          color: '#4A90E2' },
                { icon: '👥', value: d.totalParticipants + '/' + d.totalCapacity, label: 'PARTICIPANTS',         color: '#4CAF50' },
                { icon: '📊', value: d.avgRate + '%',                              label: 'TAUX DE REMPLISSAGE',  color: '#FF9800' }
            ];

            var html = '';
            cards.forEach(function (c) {
                html +=
                    '<div style="flex:1;min-width:160px;text-align:center;padding:20px;border-radius:15px;' +
                    'background:linear-gradient(to bottom,' + c.color + '15,' + c.color + '05);' +
                    'border:1px solid ' + c.color + ';box-shadow:0 0 15px ' + c.color + '40;">' +
                    '<div style="font-size:30px;margin-bottom:6px;">' + c.icon + '</div>' +
                    '<div style="font-size:26px;font-weight:bold;color:' + c.color + ';">' + c.value + '</div>' +
                    '<div style="font-size:11px;color:#b0b0b0;font-weight:bold;letter-spacing:.5px;">' + c.label + '</div>' +
                    '</div>';
            });
            $('#analyseStats').html(html);

            if (d.topEvent) {
                var t     = d.topEvent;
                var ratio = t.max_participants > 0
                    ? Math.round(t.current_participants / t.max_participants * 100)
                    : 0;
                $('#analyseTopEvent').html(
                    '<div style="background:linear-gradient(to right,#FFD70015,#FFA50015);border-radius:15px;padding:18px;' +
                    'border:1px solid #FFD700;box-shadow:0 0 20px #FFD70040;">' +
                    '<div style="display:flex;align-items:center;gap:15px;">' +
                    '<div style="font-size:36px;animation:analysisPulse 1.5s infinite;">🏆</div>' +
                    '<div>' +
                    '<div style="color:#FFD700;font-size:12px;font-weight:bold;letter-spacing:1px;margin-bottom:4px;">🌟 ÉVÉNEMENT PHARE 🌟</div>' +
                    '<div style="color:white;font-size:17px;font-weight:bold;">' + $('<span>').text(t.title).html() + '</div>' +
                    '<div style="color:#b0b0b0;font-size:13px;margin-top:4px;">📍 ' + $('<span>').text(t.location).html() + '</div>' +
                    '<div style="display:flex;align-items:center;gap:10px;margin-top:8px;">' +
                    '<div style="flex:1;height:8px;background:#333;border-radius:10px;overflow:hidden;">' +
                    '<div style="height:100%;width:' + ratio + '%;background:#4CAF50;border-radius:10px;"></div></div>' +
                    '<span style="color:#4CAF50;font-size:12px;font-weight:bold;">' + t.current_participants + '/' + t.max_participants + ' (' + ratio + '%)</span>' +
                    '</div></div></div></div>'
                );
            }
        });
    }

    $('#btnGenerateAnalyse').click(async function () {
        var btn = $(this);
        btn.prop('disabled', true).text('⏳ Génération...');
        $('#analyseTextArea').text('🤖 Gemini AI analyse vos données...');

        try {
            var stats  = await $.getJSON('/admin/events/analytics');
            var prompt =
                'Analyse ces données d\'événements en français:\n' +
                '- Total événements: ' + stats.totalEvents + '\n' +
                '- Total participants: ' + stats.totalParticipants + '/' + stats.totalCapacity + '\n' +
                '- Taux de remplissage moyen: ' + stats.avgRate + '%\n' +
                (stats.topEvent
                    ? '- Événement le plus populaire: "' + stats.topEvent.title + '" (' +
                      stats.topEvent.current_participants + '/' + stats.topEvent.max_participants + ' participants)\n'
                    : '') +
                '\nDonne une analyse concise avec: tendances, points forts, recommandations. Maximum 200 mots.';

            var resp = await $.ajax({
                url: '/admin/events/gemini',
                method: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({ prompt: prompt })
            });
            $('#analyseTextArea').text(resp.text || 'Aucune réponse reçue.');
        } catch (e) {
            $('#analyseTextArea').text('❌ Erreur: ' + (e.responseJSON && e.responseJSON.error ? e.responseJSON.error : 'Connexion impossible'));
        }

        btn.prop('disabled', false).text('✨ Générer l\'analyse');
    });

    $('#btnCopyAnalyse').click(function () {
        var text = $('#analyseTextArea').text();
        navigator.clipboard.writeText(text).then(function () {
            var btn = $('#btnCopyAnalyse');
            btn.text('✅ Copié !');
            setTimeout(function () { btn.text('📋 Copier'); }, 2000);
        });
    });


    // ── PARTICLE EFFECT ─────────────────────────────────────────────
    var particleInterval = null;

    function startParticles() {
        var canvas = document.getElementById('particleCanvas');
        if (!canvas) return;
        var ctx       = canvas.getContext('2d');
        var particles = [];
        canvas.width  = canvas.offsetWidth;
        canvas.height = canvas.offsetHeight;

        function addParticle() {
            particles.push({
                x:       Math.random() * canvas.width,
                y:       canvas.height,
                r:       1 + Math.random() * 2,
                speed:   0.5 + Math.random() * 1,
                opacity: 0.2 + Math.random() * 0.4,
                color:   Math.random() > 0.5 ? '#9C27B0' : '#4A90E2'
            });
        }

        function draw() {
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            particles = particles.filter(function (p) { return p.y > -10; });
            particles.forEach(function (p) {
                p.y       -= p.speed;
                p.opacity -= 0.003;
                ctx.beginPath();
                ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
                ctx.fillStyle   = p.color;
                ctx.globalAlpha = Math.max(0, p.opacity);
                ctx.fill();
            });
            ctx.globalAlpha = 1;
        }

        particleInterval = setInterval(function () {
            if (Math.random() < 0.4) addParticle();
            draw();
        }, 80);
    }

    function stopParticles() {
        if (particleInterval) { clearInterval(particleInterval); particleInterval = null; }
        var canvas = document.getElementById('particleCanvas');
        if (canvas) canvas.getContext('2d').clearRect(0, 0, canvas.width, canvas.height);
    }


    // ── NOTIFICATION BELL ───────────────────────────────────────────
    $.getJSON('/admin/notifications', function (data) {
        if (data.unread > 0) {
            $('#notificationBadge').text(data.unread).show();
        }
    });

    $('#notificationBell').click(function () { openNotifications(); });

    $('#notifModal').on('shown.bs.modal', function () { loadNotifications(); });

    function openNotifications() {
        $('#notifModal').modal('show');
    }

    function loadNotifications() {
        $('#notifLastUpdate').text(
            'Mise à jour: ' + new Date().toLocaleTimeString('fr-FR', { hour: '2-digit', minute: '2-digit' })
        );
        $.getJSON('/admin/notifications', function (data) {
            $('#notifUnreadBadge').text(data.unread);
            if (data.unread > 0) {
                $('#notificationBadge').text(data.unread).show();
            } else {
                $('#notificationBadge').hide();
            }
            renderNotifications(data.notifications);
        });
    }

    function renderNotifications(list) {
        var tbody  = $('#notifTableBody');
        var search = $('#notifSearch').val().toLowerCase();

        var filtered = list.filter(function (n) {
            return !search || n.message.toLowerCase().includes(search);
        });

        tbody.empty();

        if (!filtered.length) {
            tbody.html('<tr><td colspan="4" style="text-align:center;padding:30px;color:#8b9a8b;">Aucune notification trouvée</td></tr>');
            return;
        }

        filtered.forEach(function (n) {
            var isUnread = !n.is_read;
            var date     = new Date(n.created_at);
            var dateStr  = date.toLocaleDateString('fr-FR', { day: '2-digit', month: 'short', year: 'numeric' });
            var timeStr  = date.toLocaleTimeString('fr-FR', { hour: '2-digit', minute: '2-digit' });

            var statusHtml = isUnread
                ? '<span style="color:#285921;font-weight:bold;">🆕 Non lu</span>'
                : '<span style="color:gray;">✅ Lu</span>';

            var row = $('<tr class="notif-row" data-id="' + n.id + '" style="border-bottom:1px solid #f0ede5;' +
                (isUnread ? 'background:#f9fff9;' : '') + '"></tr>');
            row.append('<td style="padding:12px 15px;font-size:13px;color:#2c3e50;font-weight:' +
                (isUnread ? 'bold' : 'normal') + ';">' + $('<span>').text(n.message).html() + '</td>');
            row.append('<td style="padding:12px 15px;font-size:12px;color:#8b9a8b;white-space:nowrap;">' +
                dateStr + '<br>' + timeStr + '</td>');
            row.append('<td style="padding:12px 15px;">' + statusHtml + '</td>');
            row.append(
                '<td style="padding:12px 15px;">' +
                '<button class="view-notif-btn" data-id="' + n.id + '" ' +
                'style="background:#374535;border:none;color:white;font-size:12px;font-weight:bold;padding:7px 14px;border-radius:8px;cursor:pointer;" ' +
                'onmouseover="this.style.background=\'#4CAF50\'" onmouseout="this.style.background=\'#374535\'">👁 Voir détails</button>' +
                '</td>'
            );
            tbody.append(row);
        });
    }

    $('#notifSearch').on('input', function () {
        var search = $(this).val().toLowerCase();
        $('#notifTableBody tr.notif-row').each(function () {
            var msg = $(this).find('td:first').text().toLowerCase();
            $(this).toggle(!search || msg.includes(search));
        });
    });

    $('#notifRefreshBtn').click(function () { loadNotifications(); });

    $('#markAllReadBtn').click(function () {
        $.post('/admin/notifications/mark-all-read', function () { loadNotifications(); });
    });

    $(document).on('click', '.view-notif-btn', function (e) {
        e.stopPropagation();
        var id = $(this).data('id');
        $('#notifDetailBody').html('<div style="text-align:center;padding:40px;color:#8b9a8b;">Chargement...</div>');
        $('#notifDetailModal').modal('show');

        $.getJSON('/admin/notifications/' + id + '/detail', function (d) {
            var date      = new Date(d.participation_date);
            var dateStr   = date.toLocaleDateString('fr-FR', { day: '2-digit', month: 'long', year: 'numeric' });
            var timeStr   = date.toLocaleTimeString('fr-FR', { hour: '2-digit', minute: '2-digit' });
            var ratio     = d.max_participants > 0
                ? Math.round(d.current_participants / d.max_participants * 100)
                : 0;
            var initials     = (d.firstname || '?').charAt(0).toUpperCase() + (d.lastname || '?').charAt(0).toUpperCase();
            var statusColor  = d.participation_status === 'confirmed' ? '#4CAF50' : '#FF9800';
            var statusText   = d.participation_status === 'confirmed' ? 'Confirmée' : 'En attente';

            var html =
                '<div style="background:linear-gradient(to right,#285921,#3d7e33);padding:18px 22px;display:flex;align-items:center;justify-content:space-between;">' +
                '<div style="display:flex;align-items:center;gap:12px;">' +
                '<span style="font-size:26px;">📌</span>' +
                '<div>' +
                '<div style="color:white;font-weight:bold;font-size:17px;">NOUVELLE PARTICIPATION</div>' +
                '<div style="color:rgba(255,255,255,.75);font-size:12px;">' + timeStr + '</div>' +
                '</div></div>' +
                '<button type="button" data-dismiss="modal" style="background:none;border:none;color:white;font-size:22px;cursor:pointer;line-height:1;">&times;</button>' +
                '</div>' +

                '<div style="padding:20px;background:#f9f7f4;">' +

                // Participant
                '<div style="background:white;border-radius:12px;padding:18px;margin-bottom:15px;box-shadow:0 2px 8px rgba(0,0,0,.06);">' +
                '<div style="font-weight:bold;color:#285921;font-size:13px;margin-bottom:12px;text-transform:uppercase;letter-spacing:.5px;">👤 Informations du participant</div>' +
                '<div style="display:flex;gap:15px;align-items:center;">' +
                '<div style="width:60px;height:60px;border-radius:50%;background:#285921;border:2px solid #4CAF50;display:flex;align-items:center;justify-content:center;color:white;font-size:22px;font-weight:bold;flex-shrink:0;">' + initials + '</div>' +
                '<div>' +
                '<div style="font-size:18px;font-weight:bold;color:#285921;">' + $('<span>').text((d.firstname || '') + ' ' + (d.lastname || '')).html() + '</div>' +
                '<div style="background:#e8f0e8;color:#285921;font-size:11px;font-weight:bold;padding:3px 10px;border-radius:20px;display:inline-block;margin:4px 0;">' + $('<span>').text(d.user_role || '').html() + '</div>' +
                '<div style="font-size:13px;color:#5a6c5a;margin-top:4px;">📧 ' + $('<span>').text(d.email || '').html() + '</div>' +
                '<div style="font-size:13px;color:#5a6c5a;">📞 ' + $('<span>').text(d.phone_number || 'Non renseigné').html() + '</div>' +
                '</div></div></div>' +

                // Event
                '<div style="background:white;border-radius:12px;padding:18px;margin-bottom:15px;box-shadow:0 2px 8px rgba(0,0,0,.06);">' +
                '<div style="font-weight:bold;color:#285921;font-size:13px;margin-bottom:12px;text-transform:uppercase;letter-spacing:.5px;">📌 Détails de l\'événement</div>' +
                '<div style="font-size:17px;font-weight:bold;color:#285921;margin-bottom:8px;">🎯 ' + $('<span>').text(d.event_title || '').html() + '</div>' +
                '<div style="font-size:13px;color:#5a6c5a;margin-bottom:4px;">📍 ' + $('<span>').text(d.location || '').html() + '</div>' +
                '<div style="font-size:13px;color:#5a6c5a;margin-bottom:10px;">📅 ' +
                new Date(d.event_date).toLocaleDateString('fr-FR', { day: '2-digit', month: 'long', year: 'numeric' }) + '</div>' +
                '<div style="display:flex;align-items:center;gap:10px;">' +
                '<div style="flex:1;height:10px;background:#e0e0e0;border-radius:10px;overflow:hidden;">' +
                '<div style="height:100%;width:' + ratio + '%;background:#4CAF50;border-radius:10px;"></div></div>' +
                '<span style="font-size:12px;font-weight:bold;color:#285921;">' + d.current_participants + '/' + d.max_participants + ' places</span>' +
                '</div></div>' +

                // Participation info
                '<div style="background:white;border-radius:12px;padding:18px;margin-bottom:15px;box-shadow:0 2px 8px rgba(0,0,0,.06);">' +
                '<div style="font-weight:bold;color:#285921;font-size:13px;margin-bottom:12px;text-transform:uppercase;letter-spacing:.5px;">✅ Informations d\'inscription</div>' +
                '<div style="font-size:13px;color:#5a6c5a;margin-bottom:4px;">📅 ' + dateStr + '</div>' +
                '<div style="font-size:13px;color:#5a6c5a;margin-bottom:10px;">⏰ ' + timeStr + '</div>' +
                '<div style="display:flex;align-items:center;gap:8px;">' +
                '<span style="width:10px;height:10px;border-radius:50%;background:' + statusColor + ';display:inline-block;"></span>' +
                '<span style="font-size:14px;font-weight:bold;color:' + statusColor + ';">' + statusText + '</span>' +
                '</div></div>' +

                // Buttons
                '<div style="display:flex;justify-content:flex-end;gap:12px;">' +
                '<a href="mailto:' + $('<span>').text(d.email || '').html() + '" ' +
                'style="background:linear-gradient(135deg,#2196F3,#1976D2);border:none;color:white;font-weight:bold;padding:10px 25px;border-radius:25px;text-decoration:none;font-size:14px;">📧 Contacter</a>' +
                '<button type="button" data-dismiss="modal" ' +
                'style="background:linear-gradient(135deg,#374535,#2a3328);border:none;color:white;font-weight:bold;padding:10px 25px;border-radius:25px;cursor:pointer;font-size:14px;">Fermer</button>' +
                '</div>' +
                '</div>';

            $('#notifDetailBody').html(html);
            loadNotifications();
        }).fail(function () {
            $('#notifDetailBody').html('<div style="padding:30px;text-align:center;color:red;">Erreur lors du chargement des détails.</div>');
        });
    });


    // ── LOAD EVENTS (AJAX refresh) ──────────────────────────────────
    function loadEvents() {
        var btn = $('#refreshBtn');
        btn.prop('disabled', true).html('🔄 ...');

        $.getJSON('/admin/events/list', function (data) {
            var tbody = $('#eventsTableBody');
            tbody.empty();

            if (!data.length) {
                tbody.append('<tr><td colspan="8" class="text-center">Aucun événement trouvé</td></tr>');
                btn.prop('disabled', false).html('🔄 ACTUALISER');
                return;
            }

            $.each(data, function (i, e) {
                var statusBadge = e.isNew
                    ? '<span class="status-badge-new">NOUVEAU</span>'
                    : '<span class="status-badge-old">ANCIEN</span>';

                var barClass = e.ratio >= 100 ? 'progress-bar-full'
                             : e.ratio >= 80  ? 'progress-bar-warning'
                             : 'progress-bar-success';

                var linkCell = e.link
                    ? '<a href="' + $('<span>').text(e.link).html() + '" target="_blank">Voir</a>'
                    : '-';

                var row = $('<tr data-event-id="' + e.id + '"></tr>');
                row.append('<td>' + e.id + '</td>');
                row.append('<td>' + $('<span>').text(e.title).html() + '</td>');
                row.append('<td>' + e.eventDate + '</td>');
                row.append('<td>' + $('<span>').text(e.location).html() + '</td>');
                row.append('<td>' + linkCell + '</td>');
                row.append('<td>' + statusBadge + '</td>');
                row.append(
                    '<td style="min-width:150px;">' +
                    '<div class="progress-custom"><div class="progress-bar ' + barClass + '" style="width:' + e.ratio + '%"></div></div>' +
                    '<small>' + e.current + '/' + e.maxParticipants + '</small>' +
                    '</td>'
                );
                row.append(
                    '<td>' +
                    '<button class="btn btn-sm btn-warning action-btn edit-event"' +
                    ' data-id="' + e.id + '"' +
                    ' data-title="' + $('<span>').text(e.title).html() + '"' +
                    ' data-location="' + $('<span>').text(e.location).html() + '"' +
                    ' data-date="' + e.eventDateInput + '"' +
                    ' data-max="' + e.maxParticipants + '"' +
                    ' data-link="' + $('<span>').text(e.link).html() + '"' +
                    ' data-plan-desc="' + $('<span>').text(e.planDesc).html() + '"' +
                    ' data-plan-duree="' + $('<span>').text(e.planDuree).html() + '"' +
                    '>✏️</button>' +
                    '<button class="btn btn-sm btn-danger action-btn delete-event" data-id="' + e.id + '">🗑️</button>' +
                    '</td>'
                );
                tbody.append(row);
            });

            $('#searchInput').val('');
            $('#sortSelect').val('');
            btn.prop('disabled', false).html('🔄 ACTUALISER');
        }).fail(function () {
            btn.prop('disabled', false).html('🔄 ACTUALISER');
            alert('Erreur lors du rechargement.');
        });
    }

})(jQuery);


// ── SORT (global — bypasses Bootstrap-select event hijack) ─────────
function doSort(by) {
    if (!by) return;
    var tbody = document.getElementById('eventsTableBody');
    var rows  = Array.from(tbody.querySelectorAll('tr[data-event-id]'));
    if (!rows.length) return;

    rows.sort(function (a, b) {
        if (by === 'title') {
            return a.cells[1].textContent.toLowerCase()
                .localeCompare(b.cells[1].textContent.toLowerCase(), 'fr');
        }
        if (by === 'date') {
            var parse = function (s) {
                var p = s.trim().split('/');
                return p.length === 3 ? p[2] + p[1] + p[0] : '0';
            };
            return parse(a.cells[2].textContent).localeCompare(parse(b.cells[2].textContent));
        }
        if (by === 'participants') {
            var num = function (s) {
                var m = s.match(/(\d+)\s*\//);
                return m ? parseInt(m[1]) : 0;
            };
            return num(b.cells[6].textContent) - num(a.cells[6].textContent);
        }
        return 0;
    });

    rows.forEach(function (row) { tbody.appendChild(row); });
}


// ══════════════════════════════════════════════════════
// VALIDATION HELPERS
// ══════════════════════════════════════════════════════
function setField(el, msgEl, state, msg) {
    el.classList.remove('field-valid', 'field-warning', 'field-error');
    msgEl.className = 'field-msg';
    if (state === 'ok')   { el.classList.add('field-valid');   msgEl.classList.add('ok');   }
    if (state === 'warn') { el.classList.add('field-warning'); msgEl.classList.add('warn'); }
    if (state === 'err')  { el.classList.add('field-error');   msgEl.classList.add('err');  }
    msgEl.textContent = msg || '';
}

function validateField(id, msgId, minLen) {
    var v   = document.getElementById(id).value.trim();
    var el  = document.getElementById(id);
    var msg = document.getElementById(msgId);
    if (!v)              { setField(el, msg, 'err',  'Ce champ est requis.'); return false; }
    if (v.length < minLen) { setField(el, msg, 'warn', 'Minimum ' + minLen + ' caractères.'); return false; }
    setField(el, msg, 'ok', '');
    return true;
}

function validateDate(id, msgId) {
    var v   = document.getElementById(id).value;
    var el  = document.getElementById(id);
    var msg = document.getElementById(msgId);
    if (!v) { setField(el, msg, 'err', 'La date est requise.'); return false; }
    setField(el, msg, 'ok', '');
    return true;
}

function validateMax(id, msgId) {
    var v   = document.getElementById(id).value.trim();
    var el  = document.getElementById(id);
    var msg = document.getElementById(msgId);
    if (!v) { setField(el, msg, 'err', 'Ce champ est requis.'); return false; }
    var n = parseInt(v);
    if (isNaN(n) || n <= 0) { setField(el, msg, 'warn', 'Doit être un nombre positif.'); return false; }
    setField(el, msg, 'ok', '');
    return true;
}

function validatePlanif(descId, descMsgId, dureeId, dureeMsgId) {
    var desc  = document.getElementById(descId).value.trim();
    var duree = document.getElementById(dureeId).value.trim();
    var dEl   = document.getElementById(descId);
    var dMsg  = document.getElementById(descMsgId);
    var uEl   = document.getElementById(dureeId);
    var uMsg  = document.getElementById(dureeMsgId);
    if (!desc && !duree) return true;
    if (desc && !duree)  { setField(dEl, dMsg, 'ok', '');  setField(uEl, uMsg, 'err', 'Durée requise.'); return false; }
    if (!desc && duree)  { setField(dEl, dMsg, 'err', 'Description requise.'); setField(uEl, uMsg, 'ok', ''); return false; }
    if (desc.length < 4) { setField(dEl, dMsg, 'warn', 'Minimum 4 caractères.'); return false; }
    setField(dEl, dMsg, 'ok', '');
    setField(uEl, uMsg, 'ok', '');
    return true;
}


// ══════════════════════════════════════════════════════
// CREATE FORM — live validation + Gemini helpers
// ══════════════════════════════════════════════════════
document.getElementById('c_title').addEventListener('input', function () {
    validateField('c_title', 'c_titleMsg', 3);
    document.getElementById('c_btnCorrectTitle').disabled = !this.value.trim();
});
document.getElementById('c_location').addEventListener('input', function () {
    validateField('c_location', 'c_locationMsg', 3);
});
document.getElementById('c_eventDate').addEventListener('change', function () {
    validateDate('c_eventDate', 'c_dateMsg');
});
document.getElementById('c_maxParticipants').addEventListener('input', function () {
    validateMax('c_maxParticipants', 'c_maxMsg');
});
document.getElementById('c_description').addEventListener('input', function () {
    document.getElementById('c_btnCorrectDesc').disabled = !this.value.trim();
});

document.getElementById('createForm').addEventListener('submit', function (e) {
    var ok = validateField('c_title', 'c_titleMsg', 3)
           & validateField('c_location', 'c_locationMsg', 3)
           & validateDate('c_eventDate', 'c_dateMsg')
           & validateMax('c_maxParticipants', 'c_maxMsg')
           & validatePlanif('c_planDescription', '', 'c_planDuree', '');
    if (!ok) e.preventDefault();
});

// Image upload — create
document.getElementById('c_uploadArea').addEventListener('click', function () {
    document.getElementById('c_imageFile').click();
});
document.getElementById('c_imageFile').addEventListener('change', function (e) {
    var file = e.target.files[0];
    if (!file) return;
    var reader = new FileReader();
    reader.onload = function (ev) {
        var p = document.getElementById('c_imagePreview');
        p.src = ev.target.result;
        p.style.display = 'block';
        document.getElementById('c_link').value = ev.target.result;
    };
    reader.readAsDataURL(file);
});


// ── Gemini proxy call ──────────────────────────────────────────────
async function callGemini(prompt) {
    var resp = await fetch('/admin/events/gemini', {
        method: 'POST',
        headers: { 'Content-Type': 'application/json', 'X-Requested-With': 'XMLHttpRequest' },
        body: JSON.stringify({ prompt: prompt })
    });
    if (!resp.ok) throw new Error('API error');
    var data = await resp.json();
    return data.text || '';
}

function parsePlanification(text) {
    var clean = text.replace(/\*\*/g, '').trim();
    var description = '', duree = '';
    clean.split('\n').forEach(function (line) {
        var lower = line.toLowerCase();
        if (lower.includes('description')) description = line.replace(/description\s*:?\s*/i, '').trim();
        else if (lower.includes('durée') || lower.includes('duree')) duree = line.replace(/dur[eé]e?\s*:?\s*/i, '').trim();
    });
    return (description && duree) ? { description: description, duree: duree } : null;
}

// Generate planification
document.getElementById('c_btnGenerateAll').addEventListener('click', async function () {
    var title = document.getElementById('c_title').value.trim();
    if (!title) { alert('Veuillez saisir un titre d\'abord.'); return; }
    this.disabled = true;
    var sp = document.getElementById('c_spinnerPlan');
    sp.style.display = 'inline-block';
    document.getElementById('c_suggestionBadge').style.display = 'none';

    try {
        var prompt =
            'Pour un événement intitulé \'' + title + '\', génère une activité avec:\n' +
            '- Description courte (max 15 mots)\n' +
            '- Durée (format \'2 heures\')\n\n' +
            'Format EXACT:\nDescription: [description]\nDurée: [durée]';
        var response = await callGemini(prompt);
        var parsed   = parsePlanification(response);
        if (parsed) {
            document.getElementById('c_planDescription').value = parsed.description;
            document.getElementById('c_planDuree').value       = parsed.duree;
            ['c_planDescription', 'c_planDuree'].forEach(function (id) {
                document.getElementById(id).classList.add('field-suggestion');
            });
            document.getElementById('c_suggestionBadge').style.display  = 'inline';
            document.getElementById('c_btnAccept').style.display         = 'inline-block';
            document.getElementById('c_btnReject').style.display         = 'inline-block';
        } else {
            alert('Format de réponse invalide. Réessayez.');
        }
    } catch (e) {
        alert('Erreur de connexion à l\'IA.');
    }

    this.disabled       = false;
    sp.style.display    = 'none';
});

document.getElementById('c_btnAccept').addEventListener('click', function () {
    ['c_planDescription', 'c_planDuree'].forEach(function (id) {
        document.getElementById(id).classList.remove('field-suggestion');
        document.getElementById(id).classList.add('field-valid');
    });
    this.style.display = 'none';
    document.getElementById('c_btnReject').style.display        = 'none';
    document.getElementById('c_suggestionBadge').style.display  = 'none';
});

document.getElementById('c_btnReject').addEventListener('click', function () {
    document.getElementById('c_planDescription').value = '';
    document.getElementById('c_planDuree').value       = '';
    ['c_planDescription', 'c_planDuree'].forEach(function (id) {
        document.getElementById(id).classList.remove('field-suggestion', 'field-valid');
    });
    this.style.display = 'none';
    document.getElementById('c_btnAccept').style.display        = 'none';
    document.getElementById('c_suggestionBadge').style.display  = 'none';
});

// Correct title
document.getElementById('c_btnCorrectTitle').addEventListener('click', async function () {
    var title = document.getElementById('c_title').value.trim();
    if (!title) return;
    this.disabled = true;
    var sp = document.getElementById('c_spinnerTitle');
    sp.style.display = 'inline-block';

    try {
        var corrected = (await callGemini(
            'Corrige ce titre français: "' + title + '". Réponds UNIQUEMENT avec le texte corrigé.'
        )).replace(/^["']|["']$/g, '').trim();

        if (corrected && corrected.toLowerCase() !== title.toLowerCase()) {
            if (confirm('Correction :\n"' + title + '" → "' + corrected + '"\n\nAccepter ?')) {
                document.getElementById('c_title').value = corrected;
                validateField('c_title', 'c_titleMsg', 3);
            }
        } else {
            alert('Le titre semble déjà correct.');
        }
    } catch (e) {
        alert('Erreur de connexion à l\'IA.');
    }

    this.disabled        = false;
    sp.style.display     = 'none';
});

// Correct description
document.getElementById('c_btnCorrectDesc').addEventListener('click', async function () {
    var desc = document.getElementById('c_description').value.trim();
    if (!desc) return;
    this.disabled = true;
    var sp = document.getElementById('c_spinnerDesc');
    sp.style.display = 'inline-block';

    try {
        var corrected = (await callGemini(
            'Corrige les fautes dans cette phrase française: "' + desc + '". Réponds UNIQUEMENT avec la phrase corrigée.'
        )).replace(/^["']|["']$/g, '').trim();

        if (corrected && corrected.toLowerCase() !== desc.toLowerCase()) {
            if (confirm('Correction :\n"' + desc + '"\n→\n"' + corrected + '"\n\nAccepter ?')) {
                document.getElementById('c_description').value = corrected;
            }
        } else {
            alert('La description semble déjà correcte.');
        }
    } catch (e) {
        alert('Erreur de connexion à l\'IA.');
    }

    this.disabled        = false;
    sp.style.display     = 'none';
});


// ══════════════════════════════════════════════════════
// EDIT FORM — live validation
// ══════════════════════════════════════════════════════
function eSetField(el, msgEl, state, msg) {
    el.classList.remove('field-valid', 'field-warning', 'field-error');
    if (msgEl) msgEl.className = 'field-msg';
    if (state === 'ok')   { el.classList.add('field-valid');   if (msgEl) msgEl.classList.add('ok');   }
    if (state === 'warn') { el.classList.add('field-warning'); if (msgEl) msgEl.classList.add('warn'); }
    if (state === 'err')  { el.classList.add('field-error');   if (msgEl) msgEl.classList.add('err');  }
    if (msgEl) msgEl.textContent = msg || '';
}

function eValidateField(id, msgId, minLen) {
    var el  = document.getElementById(id);
    var msg = msgId ? document.getElementById(msgId) : null;
    var v   = el.value.trim();
    if (!v)              { eSetField(el, msg, 'err',  'Ce champ est requis.'); return false; }
    if (v.length < minLen) { eSetField(el, msg, 'warn', 'Minimum ' + minLen + ' caractères.'); return false; }
    eSetField(el, msg, 'ok', '');
    return true;
}

function eValidateDate() {
    var el  = document.getElementById('e_eventDate');
    var msg = document.getElementById('e_dateMsg');
    if (!el.value) { eSetField(el, msg, 'err', 'La date est requise.'); return false; }
    eSetField(el, msg, 'ok', '');
    return true;
}

function eValidateMax() {
    var el  = document.getElementById('e_maxParticipants');
    var msg = document.getElementById('e_maxMsg');
    var v   = el.value.trim();
    if (!v) { eSetField(el, msg, 'err', 'Ce champ est requis.'); return false; }
    var n = parseInt(v);
    if (isNaN(n) || n <= 0) { eSetField(el, msg, 'warn', 'Doit être un nombre positif.'); return false; }
    eSetField(el, msg, 'ok', '');
    return true;
}

function eValidatePlanif() {
    var desc  = document.getElementById('e_planDescription').value.trim();
    var duree = document.getElementById('e_planDuree').value.trim();
    var dEl   = document.getElementById('e_planDescription');
    var dMsg  = document.getElementById('e_planDescMsg');
    var uEl   = document.getElementById('e_planDuree');
    var uMsg  = document.getElementById('e_planDureeMsg');
    if (!desc && !duree) {
        dEl.classList.remove('field-valid', 'field-warning', 'field-error');
        uEl.classList.remove('field-valid', 'field-warning', 'field-error');
        return true;
    }
    if (desc && !duree)  { eSetField(dEl, dMsg, 'ok', '');  eSetField(uEl, uMsg, 'err', 'Durée requise.'); return false; }
    if (!desc && duree)  { eSetField(dEl, dMsg, 'err', 'Description requise.'); eSetField(uEl, uMsg, 'ok', ''); return false; }
    if (desc.length < 4) { eSetField(dEl, dMsg, 'warn', 'Minimum 4 caractères.'); eSetField(uEl, uMsg, 'ok', ''); return false; }
    eSetField(dEl, dMsg, 'ok', '');
    eSetField(uEl, uMsg, 'ok', '');
    return true;
}

// Live listeners — edit form
document.getElementById('e_title').addEventListener('input', function ()          { eValidateField('e_title', 'e_titleMsg', 3); });
document.getElementById('e_location').addEventListener('input', function ()       { eValidateField('e_location', 'e_locationMsg', 3); });
document.getElementById('e_eventDate').addEventListener('change', function ()     { eValidateDate(); });
document.getElementById('e_maxParticipants').addEventListener('input', function (){ eValidateMax(); });
document.getElementById('e_planDescription').addEventListener('input', function (){ eValidatePlanif(); });
document.getElementById('e_planDuree').addEventListener('input', function ()      { eValidatePlanif(); });

// Image upload — edit
document.getElementById('e_uploadArea').addEventListener('click', function () {
    document.getElementById('e_imageFile').click();
});
document.getElementById('e_imageFile').addEventListener('change', function (e) {
    var file = e.target.files[0];
    if (!file) return;
    var reader = new FileReader();
    reader.onload = function (ev) {
        var p = document.getElementById('e_imagePreview');
        p.src = ev.target.result;
        p.style.display = 'block';
        document.getElementById('e_link').value = ev.target.result;
    };
    reader.readAsDataURL(file);
});