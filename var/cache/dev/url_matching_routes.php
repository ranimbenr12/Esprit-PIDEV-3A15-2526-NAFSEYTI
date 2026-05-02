<?php

/**
 * This file has been auto-generated
 * by the Symfony Routing Component.
 */

return [
    false, // $matchHost
    [ // $staticRoutes
        '/fc-load-events' => [[['_route' => 'fc_load_events', '_controller' => 'CalendarBundle\\Controller\\CalendarController::loadAction'], null, null, null, false, false, null]],
        '/_profiler' => [[['_route' => '_profiler_home', '_controller' => 'web_profiler.controller.profiler::homeAction'], null, null, null, true, false, null]],
        '/_profiler/search' => [[['_route' => '_profiler_search', '_controller' => 'web_profiler.controller.profiler::searchAction'], null, null, null, false, false, null]],
        '/_profiler/search_bar' => [[['_route' => '_profiler_search_bar', '_controller' => 'web_profiler.controller.profiler::searchBarAction'], null, null, null, false, false, null]],
        '/_profiler/phpinfo' => [[['_route' => '_profiler_phpinfo', '_controller' => 'web_profiler.controller.profiler::phpinfoAction'], null, null, null, false, false, null]],
        '/_profiler/xdebug' => [[['_route' => '_profiler_xdebug', '_controller' => 'web_profiler.controller.profiler::xdebugAction'], null, null, null, false, false, null]],
        '/_profiler/open' => [[['_route' => '_profiler_open_file', '_controller' => 'web_profiler.controller.profiler::openAction'], null, null, null, false, false, null]],
        '/admin/ai-assistant' => [[['_route' => 'admin_ai_assistant_index', '_controller' => 'App\\Controller\\Admin\\AIAssistantController::index'], null, null, null, true, false, null]],
        '/admin/ai-assistant/generate' => [[['_route' => 'admin_ai_assistant_generate', '_controller' => 'App\\Controller\\Admin\\AIAssistantController::generate'], null, ['POST' => 0], null, false, false, null]],
        '/admin/ai-assistant/history' => [[['_route' => 'admin_ai_assistant_history', '_controller' => 'App\\Controller\\Admin\\AIAssistantController::history'], null, ['GET' => 0], null, false, false, null]],
        '/admin/ai-assistant/save-favorite' => [[['_route' => 'admin_ai_assistant_save_favorite', '_controller' => 'App\\Controller\\Admin\\AIAssistantController::saveFavorite'], null, ['POST' => 0], null, false, false, null]],
        '/admin/ai-assistant/favorites' => [[['_route' => 'admin_ai_assistant_favorites', '_controller' => 'App\\Controller\\Admin\\AIAssistantController::favorites'], null, ['GET' => 0], null, false, false, null]],
        '/admin/ai-assistant/export' => [[['_route' => 'admin_ai_assistant_export', '_controller' => 'App\\Controller\\Admin\\AIAssistantController::export'], null, ['POST' => 0], null, false, false, null]],
        '/admin/events' => [[['_route' => 'admin_events_index', '_controller' => 'App\\Controller\\Admin\\EventController::index'], null, null, null, false, false, null]],
        '/admin/events/create' => [
            [['_route' => 'admin_events_create', '_controller' => 'App\\Controller\\Admin\\EventController::create'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'admin_events_create_save', '_controller' => 'App\\Controller\\Admin\\EventController::createSave'], null, ['POST' => 0], null, false, false, null],
        ],
        '/admin/events/analytics' => [[['_route' => 'admin_events_analytics', '_controller' => 'App\\Controller\\Admin\\EventController::analytics'], null, ['GET' => 0], null, false, false, null]],
        '/admin/events/list' => [[['_route' => 'admin_events_list', '_controller' => 'App\\Controller\\Admin\\EventController::listJson'], null, ['GET' => 0], null, false, false, null]],
        '/admin/events/search' => [[['_route' => 'admin_events_search', '_controller' => 'App\\Controller\\Admin\\EventController::search'], null, ['GET' => 0], null, false, false, null]],
        '/admin/events/gemini' => [[['_route' => 'admin_events_gemini', '_controller' => 'App\\Controller\\Admin\\EventController::geminiProxy'], null, ['POST' => 0], null, false, false, null]],
        '/admin/notifications/page' => [[['_route' => 'admin_notifications_page', '_controller' => 'App\\Controller\\Admin\\NotificationController::page'], null, ['GET' => 0], null, false, false, null]],
        '/admin/notifications' => [[['_route' => 'admin_notifications_list', '_controller' => 'App\\Controller\\Admin\\NotificationController::list'], null, ['GET' => 0], null, false, false, null]],
        '/admin/notifications/mark-all-read' => [[['_route' => 'admin_notifications_mark_all', '_controller' => 'App\\Controller\\Admin\\NotificationController::markAllRead'], null, ['POST' => 0], null, false, false, null]],
        '/admin/tableau' => [[['_route' => 'admin_tableau', '_controller' => 'App\\Controller\\AdminController::tableau'], null, null, null, false, false, null]],
        '/admin/liste_rendezvous' => [[['_route' => 'admin_liste_rendezvous', '_controller' => 'App\\Controller\\AdminController::liste_rendez_vous'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/fiches' => [[['_route' => 'admin_fiches', '_controller' => 'App\\Controller\\AdminController::liste_fiches'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/admin/liste_rendezvous/search' => [[['_route' => 'admin_rendezvous_search', '_controller' => 'App\\Controller\\AdminController::searchRendezVous'], null, ['GET' => 0], null, false, false, null]],
        '/events' => [[['_route' => 'client_events_index', '_controller' => 'App\\Controller\\Client\\EventClientController::index'], null, null, null, false, false, null]],
        '/events/calendar' => [[['_route' => 'client_events_calendar', '_controller' => 'App\\Controller\\Client\\EventClientController::calendar'], null, null, null, false, false, null]],
        '/events/calendar/feed' => [[['_route' => 'client_events_calendar_feed', '_controller' => 'App\\Controller\\Client\\EventClientController::calendarFeed'], null, ['GET' => 0], null, false, false, null]],
        '/conge/soumettre' => [[['_route' => 'conge_soumettre', '_controller' => 'App\\Controller\\CongeController::soumettre'], null, ['POST' => 0], null, false, false, null]],
        '/conge/mes-conges' => [[['_route' => 'conge_mes_conges', '_controller' => 'App\\Controller\\CongeController::mesConges'], null, ['GET' => 0], null, false, false, null]],
        '/conge/psy/liste' => [[['_route' => 'conge_psy_liste', '_controller' => 'App\\Controller\\CongeController::psyListe'], null, ['GET' => 0], null, false, false, null]],
        '/conge/archiver-expires' => [[['_route' => 'conge_archiver_expires', '_controller' => 'App\\Controller\\CongeController::archiverExpires'], null, ['GET' => 0], null, false, false, null]],
        '/admin/rendezvous' => [[['_route' => 'admin_rendezvous', '_controller' => 'App\\Controller\\HomeController::rendezVous'], null, null, null, false, false, null]],
        '/psy' => [[['_route' => 'psy_dashboard', '_controller' => 'App\\Controller\\PsyController::dashboard'], null, ['GET' => 0], null, false, false, null]],
        '/psy/slot/create' => [[['_route' => 'psy_slot_create', '_controller' => 'App\\Controller\\PsyController::createSlot'], null, ['POST' => 0], null, false, false, null]],
        '/psy/fiche/create' => [[['_route' => 'psy_fiche_create', '_controller' => 'App\\Controller\\PsyController::createFiche'], null, ['POST' => 0], null, false, false, null]],
        '/psy/notifications/tout-lire' => [[['_route' => 'psy_notifications_tout_lire', '_controller' => 'App\\Controller\\PsyController::toutMarquerLu'], null, ['POST' => 0], null, false, false, null]],
        '/psy/ia/analyse-patient' => [[['_route' => 'psy_ia_analyse_patient', '_controller' => 'App\\Controller\\PsyController::iaAnalysePatient'], null, ['POST' => 0], null, false, false, null]],
        '/psy/google/connect' => [[['_route' => 'psy_google_connect', '_controller' => 'App\\Controller\\PsyController::googleConnect'], null, ['GET' => 0], null, false, false, null]],
        '/psy/google/callback' => [[['_route' => 'psy_google_callback', '_controller' => 'App\\Controller\\PsyController::googleCallback'], null, ['GET' => 0], null, false, false, null]],
        '/psycho/ai-assistant' => [[['_route' => 'psycho_ai_assistant_index', '_controller' => 'App\\Controller\\Psycho\\AIAssistantController::index'], null, null, null, false, false, null]],
        '/psycho/ai-assistant/generate' => [[['_route' => 'psycho_ai_assistant_generate', '_controller' => 'App\\Controller\\Psycho\\AIAssistantController::generate'], null, ['POST' => 0], null, false, false, null]],
        '/psycho/ai-assistant/history' => [[['_route' => 'psycho_ai_assistant_history', '_controller' => 'App\\Controller\\Psycho\\AIAssistantController::history'], null, ['GET' => 0], null, false, false, null]],
        '/psycho/ai-assistant/save-favorite' => [[['_route' => 'psycho_ai_assistant_save_favorite', '_controller' => 'App\\Controller\\Psycho\\AIAssistantController::saveFavorite'], null, ['POST' => 0], null, false, false, null]],
        '/psycho/ai-assistant/favorites' => [[['_route' => 'psycho_ai_assistant_favorites', '_controller' => 'App\\Controller\\Psycho\\AIAssistantController::favorites'], null, ['GET' => 0], null, false, false, null]],
        '/psycho/ai-assistant/export' => [[['_route' => 'psycho_ai_assistant_export', '_controller' => 'App\\Controller\\Psycho\\AIAssistantController::export'], null, ['POST' => 0], null, false, false, null]],
        '/psycho/evente' => [[['_route' => 'psycho_events_index', '_controller' => 'App\\Controller\\Psycho\\EventPsychoController::index'], null, null, null, false, false, null]],
        '/psycho/evente/create' => [[['_route' => 'psycho_events_create', '_controller' => 'App\\Controller\\Psycho\\EventPsychoController::create'], null, null, null, false, false, null]],
        '/psycho/evente/api/events' => [
            [['_route' => 'psycho_events_api_list', '_controller' => 'App\\Controller\\Psycho\\EventPsychoController::apiList'], null, ['GET' => 0], null, false, false, null],
            [['_route' => 'psycho_events_api_create', '_controller' => 'App\\Controller\\Psycho\\EventPsychoController::apiCreate'], null, ['POST' => 0], null, false, false, null],
        ],
        '/psycho/evente/api/planifications' => [[['_route' => 'psycho_events_api_create_planification', '_controller' => 'App\\Controller\\Psycho\\EventPsychoController::apiCreatePlanification'], null, ['POST' => 0], null, false, false, null]],
        '/psycho/evente/api/correct-text' => [[['_route' => 'psycho_events_correct_text', '_controller' => 'App\\Controller\\Psycho\\EventPsychoController::correctText'], null, ['POST' => 0], null, false, false, null]],
        '/psycho/evente/api/generate-planification' => [[['_route' => 'psycho_events_generate_planification', '_controller' => 'App\\Controller\\Psycho\\EventPsychoController::generatePlanification'], null, ['POST' => 0], null, false, false, null]],
        '/psycho/notifications' => [[['_route' => 'psycho_notifications_page', '_controller' => 'App\\Controller\\Psycho\\NotificationController::page'], null, ['GET' => 0], null, false, false, null]],
        '/psycho/notifications/list' => [[['_route' => 'psycho_notifications_list', '_controller' => 'App\\Controller\\Psycho\\NotificationController::list'], null, ['GET' => 0], null, false, false, null]],
        '/psycho/notifications/mark-all-read' => [[['_route' => 'psycho_notifications_mark_all', '_controller' => 'App\\Controller\\Psycho\\NotificationController::markAllRead'], null, ['POST' => 0], null, false, false, null]],
        '/psycho' => [[['_route' => 'psycho_dashboard', '_controller' => 'App\\Controller\\PsychologueController::index'], null, null, null, false, false, null]],
        '/rendez-vous' => [[['_route' => 'rdv_index', '_controller' => 'App\\Controller\\RendezVousController::index'], null, ['GET' => 0], null, false, false, null]],
        '/rendez-vous/create' => [[['_route' => 'rdv_create', '_controller' => 'App\\Controller\\RendezVousController::create'], null, ['POST' => 0], null, false, false, null]],
        '/rendez-vous/reserve' => [[['_route' => 'rdv_reserve', '_controller' => 'App\\Controller\\RendezVousController::reserve'], null, ['POST' => 0], null, false, false, null]],
        '/rendez-vous/mes-reservations' => [[['_route' => 'rdv_mes_reservations', '_controller' => 'App\\Controller\\RendezVousController::mesReservations'], null, ['GET' => 0], null, false, false, null]],
        '/admin/alertes' => [[['_route' => 'admin_alertes_index', '_controller' => 'App\\Controller\\teste\\AlerteController::index'], null, null, null, false, false, null]],
        '/dashboard' => [[['_route' => 'app_dashboard', '_controller' => 'App\\Controller\\teste\\DashboardController::index'], null, null, null, false, false, null]],
        '/tests' => [[['_route' => 'front_test_list', '_controller' => 'App\\Controller\\teste\\FrontTestController::list'], null, null, null, true, false, null]],
        '/question' => [[['_route' => 'app_question_index', '_controller' => 'App\\Controller\\teste\\QuestionController::index'], null, ['GET' => 0], null, true, false, null]],
        '/question/new' => [[['_route' => 'app_question_new', '_controller' => 'App\\Controller\\teste\\QuestionController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/question/search' => [[['_route' => 'app_question_search_ajax', '_controller' => 'App\\Controller\\teste\\QuestionController::searchAjax'], null, ['GET' => 0], null, false, false, null]],
        '/reponses/score' => [[['_route' => 'app_reponses_score_index', '_controller' => 'App\\Controller\\teste\\ReponsesScoreController::index'], null, ['GET' => 0], null, false, false, null]],
        '/reponses/score/new' => [[['_route' => 'app_reponses_score_new', '_controller' => 'App\\Controller\\teste\\ReponsesScoreController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/test' => [[['_route' => 'app_test_index', '_controller' => 'App\\Controller\\teste\\TestController::index'], null, ['GET' => 0], null, true, false, null]],
        '/test/new' => [[['_route' => 'app_test_new', '_controller' => 'App\\Controller\\teste\\TestController::new'], null, ['GET' => 0, 'POST' => 1], null, false, false, null]],
        '/test/search-ajax' => [[['_route' => 'app_test_search_ajax', '_controller' => 'App\\Controller\\teste\\TestController::searchAjax'], null, ['GET' => 0], null, false, false, null]],
        '/admin' => [[['_route' => 'admin_dashboard', '_controller' => 'App\\Controller\\user\\AdminControllerUser::index'], null, null, null, false, false, null]],
        '/admin/users' => [[['_route' => 'admin_users', '_controller' => 'App\\Controller\\user\\AdminControllerUser::listUsers'], null, null, null, false, false, null]],
        '/' => [[['_route' => 'app_home', '_controller' => 'App\\Controller\\user\\HomeControllerUser::index'], null, null, null, false, false, null]],
        '/profile' => [[['_route' => 'app_profile', '_controller' => 'App\\Controller\\user\\HomeControllerUser::profile'], null, null, null, false, false, null]],
        '/profile/edit' => [[['_route' => 'app_profile_edit', '_controller' => 'App\\Controller\\user\\HomeControllerUser::editProfile'], null, null, null, false, false, null]],
        '/admin/profile' => [[['_route' => 'admin_profile', '_controller' => 'App\\Controller\\user\\HomeControllerUser::adminProfile'], null, null, null, false, false, null]],
        '/profile/delete' => [[['_route' => 'app_profile_delete', '_controller' => 'App\\Controller\\user\\HomeControllerUser::deleteAccount'], null, null, null, false, false, null]],
        '/login' => [[['_route' => 'app_login', '_controller' => 'App\\Controller\\user\\LoginController::login'], null, null, null, false, false, null]],
        '/logout' => [[['_route' => 'app_logout', '_controller' => 'App\\Controller\\user\\LoginController::logout'], null, null, null, false, false, null]],
        '/register' => [[['_route' => 'app_register', '_controller' => 'App\\Controller\\user\\LoginController::register'], null, null, null, false, false, null]],
    ],
    [ // $regexpList
        0 => '{^(?'
                .'|/_(?'
                    .'|error/(\\d+)(?:\\.([^/]++))?(*:38)'
                    .'|wdt/([^/]++)(*:57)'
                    .'|profiler/(?'
                        .'|font/([^/\\.]++)\\.woff2(*:98)'
                        .'|([^/]++)(?'
                            .'|/(?'
                                .'|search/results(*:134)'
                                .'|router(*:148)'
                                .'|exception(?'
                                    .'|(*:168)'
                                    .'|\\.css(*:181)'
                                .')'
                            .')'
                            .'|(*:191)'
                        .')'
                    .')'
                .')'
                .'|/admin/(?'
                    .'|events/(?'
                        .'|([^/]++)/(?'
                            .'|edit(?'
                                .'|(*:241)'
                            .')'
                            .'|json(*:254)'
                            .'|delete(*:268)'
                        .')'
                        .'|planifications/([^/]++)(*:300)'
                        .'|([^/]++)/status(*:323)'
                    .')'
                    .'|notifications/([^/]++)/(?'
                        .'|detail(*:364)'
                        .'|send\\-email(*:383)'
                    .')'
                    .'|liste_rendezvous/([^/]++)/edit(*:422)'
                    .'|rendezvous/([^/]++)/delete(*:456)'
                    .'|fiches/([^/]++)/(?'
                        .'|edit(*:487)'
                        .'|delete(*:501)'
                        .'|pdf(*:512)'
                    .')'
                    .'|alertes/(?'
                        .'|([^/]++)(?'
                            .'|(*:543)'
                            .'|/statut(*:558)'
                        .')'
                        .'|count(*:572)'
                    .')'
                    .'|users/(?'
                        .'|edit/([^/]++)(*:603)'
                        .'|toggle/([^/]++)(*:626)'
                    .')'
                .')'
                .'|/events/([^/]++)/(?'
                    .'|participate(*:667)'
                    .'|rate(*:679)'
                    .'|qrcode(*:693)'
                .')'
                .'|/conge/(?'
                    .'|check\\-eligibilite/([^/]++)(*:739)'
                    .'|([^/]++)/(?'
                        .'|annuler(*:766)'
                        .'|traiter(*:781)'
                        .'|dossier\\-patient(*:805)'
                        .'|certificat/([^/]++)(*:832)'
                    .')'
                .')'
                .'|/psy(?'
                    .'|/(?'
                        .'|slot/([^/]++)/(?'
                            .'|edit(*:874)'
                            .'|delete(*:888)'
                        .')'
                        .'|fiche/([^/]++)/(?'
                            .'|edit(*:919)'
                            .'|delete(*:933)'
                            .'|pdf(*:944)'
                            .'|traduire(*:960)'
                        .')'
                        .'|reservation/([^/]++)/s(?'
                            .'|tatut(*:999)'
                            .'|ync\\-calendar(*:1020)'
                        .')'
                        .'|notification/([^/]++)/lue(*:1055)'
                    .')'
                    .'|cho/(?'
                        .'|evente/(?'
                            .'|edit/([^/]++)(*:1095)'
                            .'|delete/([^/]++)(*:1119)'
                            .'|([^/]++)/(?'
                                .'|rate(*:1144)'
                                .'|participate(*:1164)'
                                .'|status(*:1179)'
                            .')'
                            .'|api/(?'
                                .'|events/([^/]++)(?'
                                    .'|(*:1214)'
                                .')'
                                .'|planifications/(?'
                                    .'|([^/]++)(?'
                                        .'|(*:1253)'
                                    .')'
                                    .'|by\\-event/([^/]++)(*:1281)'
                                .')'
                            .')'
                            .'|check\\-participation/([^/]++)(*:1321)'
                            .'|qrcode/([^/]++)(*:1345)'
                        .')'
                        .'|notifications/([^/]++)/(?'
                            .'|read(*:1385)'
                            .'|detail(*:1400)'
                            .'|send\\-email(*:1420)'
                        .')'
                    .')'
                .')'
                .'|/test(?'
                    .'|s/(?'
                        .'|(\\d+)(*:1450)'
                        .'|(\\d+)/submit(*:1471)'
                        .'|(\\d+)/analyse\\-visage(*:1501)'
                        .'|(\\d+)/pdf(*:1519)'
                    .')'
                    .'|/(?'
                        .'|(\\d+)(*:1538)'
                        .'|(\\d+)/edit(*:1557)'
                        .'|(\\d+)(*:1571)'
                    .')'
                .')'
                .'|/question/(?'
                    .'|test/([^/]++)/new(*:1612)'
                    .'|([^/]++)(?'
                        .'|(*:1632)'
                        .'|/(?'
                            .'|edit(*:1649)'
                            .'|delete(*:1664)'
                        .')'
                    .')'
                .')'
                .'|/reponses/score/([^/]++)(?'
                    .'|(*:1703)'
                    .'|/edit(*:1717)'
                    .'|(*:1726)'
                .')'
            .')/?$}sDu',
    ],
    [ // $dynamicRoutes
        38 => [[['_route' => '_preview_error', '_controller' => 'error_controller::preview', '_format' => 'html'], ['code', '_format'], null, null, false, true, null]],
        57 => [[['_route' => '_wdt', '_controller' => 'web_profiler.controller.profiler::toolbarAction'], ['token'], null, null, false, true, null]],
        98 => [[['_route' => '_profiler_font', '_controller' => 'web_profiler.controller.profiler::fontAction'], ['fontName'], null, null, false, false, null]],
        134 => [[['_route' => '_profiler_search_results', '_controller' => 'web_profiler.controller.profiler::searchResultsAction'], ['token'], null, null, false, false, null]],
        148 => [[['_route' => '_profiler_router', '_controller' => 'web_profiler.controller.router::panelAction'], ['token'], null, null, false, false, null]],
        168 => [[['_route' => '_profiler_exception', '_controller' => 'web_profiler.controller.exception_panel::body'], ['token'], null, null, false, false, null]],
        181 => [[['_route' => '_profiler_exception_css', '_controller' => 'web_profiler.controller.exception_panel::stylesheet'], ['token'], null, null, false, false, null]],
        191 => [[['_route' => '_profiler', '_controller' => 'web_profiler.controller.profiler::panelAction'], ['token'], null, null, false, true, null]],
        241 => [
            [['_route' => 'admin_events_edit', '_controller' => 'App\\Controller\\Admin\\EventController::edit'], ['id'], ['GET' => 0], null, false, false, null],
            [['_route' => 'admin_events_update', '_controller' => 'App\\Controller\\Admin\\EventController::update'], ['id'], ['POST' => 0], null, false, false, null],
        ],
        254 => [[['_route' => 'admin_events_json', '_controller' => 'App\\Controller\\Admin\\EventController::eventJson'], ['id'], ['GET' => 0], null, false, false, null]],
        268 => [[['_route' => 'admin_events_delete', '_controller' => 'App\\Controller\\Admin\\EventController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        300 => [[['_route' => 'admin_events_planifications', '_controller' => 'App\\Controller\\Admin\\EventController::getPlanifications'], ['eventId'], ['GET' => 0], null, false, true, null]],
        323 => [[['_route' => 'admin_events_update_status', '_controller' => 'App\\Controller\\Admin\\EventController::updateStatus'], ['id'], ['POST' => 0], null, false, false, null]],
        364 => [[['_route' => 'admin_notifications_detail', '_controller' => 'App\\Controller\\Admin\\NotificationController::detail'], ['id'], ['GET' => 0], null, false, false, null]],
        383 => [[['_route' => 'admin_notifications_send_email', '_controller' => 'App\\Controller\\Admin\\NotificationController::sendEmail'], ['id'], ['POST' => 0], null, false, false, null]],
        422 => [[['_route' => 'admin_rendezvous_edit', '_controller' => 'App\\Controller\\AdminController::edit_rendez_vous'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        456 => [[['_route' => 'admin_rendezvous_delete', '_controller' => 'App\\Controller\\AdminController::deleteRendezVous'], ['id'], ['POST' => 0], null, false, false, null]],
        487 => [[['_route' => 'admin_fiche_edit', '_controller' => 'App\\Controller\\AdminController::edit_fiche'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        501 => [[['_route' => 'admin_fiche_delete', '_controller' => 'App\\Controller\\AdminController::deleteFiche'], ['id'], ['POST' => 0], null, false, false, null]],
        512 => [[['_route' => 'admin_fiche_pdf', '_controller' => 'App\\Controller\\AdminController::downloadFichePdf'], ['id'], ['GET' => 0], null, false, false, null]],
        543 => [[['_route' => 'admin_alertes_detail', '_controller' => 'App\\Controller\\teste\\AlerteController::detail'], ['id'], null, null, false, true, null]],
        558 => [[['_route' => 'admin_alertes_statut', '_controller' => 'App\\Controller\\teste\\AlerteController::changerStatut'], ['id'], ['POST' => 0], null, false, false, null]],
        572 => [[['_route' => 'admin_alertes_count', '_controller' => 'App\\Controller\\teste\\AlerteController::count'], [], ['GET' => 0], null, false, false, null]],
        603 => [[['_route' => 'admin_user_edit', '_controller' => 'App\\Controller\\user\\AdminControllerUser::editUser'], ['id'], null, null, false, true, null]],
        626 => [[['_route' => 'admin_user_toggle', '_controller' => 'App\\Controller\\user\\AdminControllerUser::toggleStatus'], ['id'], null, null, false, true, null]],
        667 => [[['_route' => 'client_events_participate', '_controller' => 'App\\Controller\\Client\\EventClientController::participate'], ['id'], ['POST' => 0], null, false, false, null]],
        679 => [[['_route' => 'client_events_rate', '_controller' => 'App\\Controller\\Client\\EventClientController::rateEvent'], ['id'], ['POST' => 0], null, false, false, null]],
        693 => [[['_route' => 'client_events_qrcode', '_controller' => 'App\\Controller\\Client\\QRCodeDialogController::qrcode'], ['id'], ['GET' => 0], null, false, false, null]],
        739 => [[['_route' => 'conge_check_eligibilite', '_controller' => 'App\\Controller\\CongeController::checkEligibilite'], ['psyId'], ['GET' => 0], null, false, true, null]],
        766 => [[['_route' => 'conge_annuler', '_controller' => 'App\\Controller\\CongeController::annuler'], ['id'], ['POST' => 0], null, false, false, null]],
        781 => [[['_route' => 'conge_traiter', '_controller' => 'App\\Controller\\CongeController::traiter'], ['id'], ['POST' => 0], null, false, false, null]],
        805 => [[['_route' => 'conge_dossier_patient', '_controller' => 'App\\Controller\\CongeController::dossierPatient'], ['id'], ['GET' => 0], null, false, false, null]],
        832 => [[['_route' => 'conge_telecharger_certificat', '_controller' => 'App\\Controller\\CongeController::telechargerCertificat'], ['id', 'token'], ['GET' => 0], null, false, true, null]],
        874 => [[['_route' => 'psy_slot_edit', '_controller' => 'App\\Controller\\PsyController::editSlot'], ['id'], ['POST' => 0], null, false, false, null]],
        888 => [[['_route' => 'psy_slot_delete', '_controller' => 'App\\Controller\\PsyController::deleteSlot'], ['id'], ['POST' => 0], null, false, false, null]],
        919 => [[['_route' => 'psy_fiche_edit', '_controller' => 'App\\Controller\\PsyController::editFiche'], ['id'], ['POST' => 0], null, false, false, null]],
        933 => [[['_route' => 'psy_fiche_delete', '_controller' => 'App\\Controller\\PsyController::deleteFiche'], ['id'], ['POST' => 0], null, false, false, null]],
        944 => [[['_route' => 'psy_fiche_pdf', '_controller' => 'App\\Controller\\PsyController::fichePdf'], ['id'], ['GET' => 0], null, false, false, null]],
        960 => [[['_route' => 'psy_fiche_traduire', '_controller' => 'App\\Controller\\PsyController::traduireFiche'], ['id'], ['POST' => 0], null, false, false, null]],
        999 => [[['_route' => 'psy_reservation_statut', '_controller' => 'App\\Controller\\PsyController::updateStatut'], ['id'], ['POST' => 0], null, false, false, null]],
        1020 => [[['_route' => 'psy_reservation_sync_calendar', '_controller' => 'App\\Controller\\PsyController::syncToCalendar'], ['id'], ['POST' => 0], null, false, false, null]],
        1055 => [[['_route' => 'psy_notification_lue', '_controller' => 'App\\Controller\\PsyController::marquerLue'], ['id'], ['POST' => 0], null, false, false, null]],
        1095 => [[['_route' => 'psycho_events_edit', '_controller' => 'App\\Controller\\Psycho\\EventPsychoController::edit'], ['id'], null, null, false, true, null]],
        1119 => [[['_route' => 'psycho_events_delete', '_controller' => 'App\\Controller\\Psycho\\EventPsychoController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        1144 => [[['_route' => 'psycho_events_rate', '_controller' => 'App\\Controller\\Psycho\\EventPsychoController::rate'], ['id'], ['POST' => 0], null, false, false, null]],
        1164 => [[['_route' => 'psycho_events_participate', '_controller' => 'App\\Controller\\Psycho\\EventPsychoController::participate'], ['id'], ['POST' => 0], null, false, false, null]],
        1179 => [[['_route' => 'psycho_events_update_status', '_controller' => 'App\\Controller\\Psycho\\EventPsychoController::updateStatus'], ['id'], ['POST' => 0], null, false, false, null]],
        1214 => [
            [['_route' => 'psycho_events_api_get', '_controller' => 'App\\Controller\\Psycho\\EventPsychoController::apiGet'], ['id'], ['GET' => 0], null, false, true, null],
            [['_route' => 'psycho_events_api_update', '_controller' => 'App\\Controller\\Psycho\\EventPsychoController::apiUpdate'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'psycho_events_api_delete', '_controller' => 'App\\Controller\\Psycho\\EventPsychoController::apiDelete'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        1253 => [
            [['_route' => 'psycho_events_api_update_planification', '_controller' => 'App\\Controller\\Psycho\\EventPsychoController::apiUpdatePlanification'], ['id'], ['PUT' => 0], null, false, true, null],
            [['_route' => 'psycho_events_api_delete_planification', '_controller' => 'App\\Controller\\Psycho\\EventPsychoController::apiDeletePlanification'], ['id'], ['DELETE' => 0], null, false, true, null],
        ],
        1281 => [[['_route' => 'psycho_events_api_get_planification_by_event', '_controller' => 'App\\Controller\\Psycho\\EventPsychoController::apiGetPlanificationsByEvent'], ['eventId'], ['GET' => 0], null, false, true, null]],
        1321 => [[['_route' => 'psycho_events_check_participation', '_controller' => 'App\\Controller\\Psycho\\EventPsychoController::checkParticipation'], ['eventId'], ['GET' => 0], null, false, true, null]],
        1345 => [[['_route' => 'psycho_events_qrcode', '_controller' => 'App\\Controller\\Psycho\\QRCodeDialogController::qrcode'], ['id'], ['GET' => 0], null, false, true, null]],
        1385 => [[['_route' => 'psycho_notifications_mark_read', '_controller' => 'App\\Controller\\Psycho\\NotificationController::markRead'], ['id'], ['POST' => 0], null, false, false, null]],
        1400 => [[['_route' => 'psycho_notifications_detail', '_controller' => 'App\\Controller\\Psycho\\NotificationController::detail'], ['id'], ['GET' => 0], null, false, false, null]],
        1420 => [[['_route' => 'psycho_notifications_send_email', '_controller' => 'App\\Controller\\Psycho\\NotificationController::sendEmail'], ['id'], ['POST' => 0], null, false, false, null]],
        1450 => [[['_route' => 'front_test_show', '_controller' => 'App\\Controller\\teste\\FrontTestController::show'], ['id'], null, null, false, true, null]],
        1471 => [[['_route' => 'front_test_submit', '_controller' => 'App\\Controller\\teste\\FrontTestController::submit'], ['id'], ['POST' => 0], null, false, false, null]],
        1501 => [[['_route' => 'front_test_analyse_visage', '_controller' => 'App\\Controller\\teste\\FrontTestController::analyseVisage'], ['id'], ['POST' => 0], null, false, false, null]],
        1519 => [[['_route' => 'front_test_pdf', '_controller' => 'App\\Controller\\teste\\FrontTestController::telechargerPdf'], ['id'], ['GET' => 0], null, false, false, null]],
        1538 => [[['_route' => 'app_test_show', '_controller' => 'App\\Controller\\teste\\TestController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        1557 => [[['_route' => 'app_test_edit', '_controller' => 'App\\Controller\\teste\\TestController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1571 => [[['_route' => 'app_test_delete', '_controller' => 'App\\Controller\\teste\\TestController::delete'], ['id'], ['POST' => 0], null, false, true, null]],
        1612 => [[['_route' => 'app_question_new_with_test', '_controller' => 'App\\Controller\\teste\\QuestionController::newWithTest'], ['testId'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1632 => [[['_route' => 'app_question_show', '_controller' => 'App\\Controller\\teste\\QuestionController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        1649 => [[['_route' => 'app_question_edit', '_controller' => 'App\\Controller\\teste\\QuestionController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1664 => [[['_route' => 'app_question_delete', '_controller' => 'App\\Controller\\teste\\QuestionController::delete'], ['id'], ['POST' => 0], null, false, false, null]],
        1703 => [[['_route' => 'app_reponses_score_show', '_controller' => 'App\\Controller\\teste\\ReponsesScoreController::show'], ['id'], ['GET' => 0], null, false, true, null]],
        1717 => [[['_route' => 'app_reponses_score_edit', '_controller' => 'App\\Controller\\teste\\ReponsesScoreController::edit'], ['id'], ['GET' => 0, 'POST' => 1], null, false, false, null]],
        1726 => [
            [['_route' => 'app_reponses_score_delete', '_controller' => 'App\\Controller\\teste\\ReponsesScoreController::delete'], ['id'], ['POST' => 0], null, false, true, null],
            [null, null, null, null, false, false, 0],
        ],
    ],
    null, // $checkCondition
];
