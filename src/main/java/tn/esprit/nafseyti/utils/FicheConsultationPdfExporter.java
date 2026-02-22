package tn.esprit.nafseyti.utils;


import com.itextpdf.text.*;
import com.itextpdf.text.pdf.*;
import com.itextpdf.text.pdf.draw.LineSeparator;

import java.io.FileOutputStream;
import java.time.LocalDate;
import java.time.LocalTime;
import java.time.format.DateTimeFormatter;
import java.util.Locale;

/**
 * Exporteur PDF innovant pour les fiches de consultation - NAFSEYTI
 * Dépendance Maven à ajouter dans pom.xml :
 *
 * <dependency>
 *     <groupId>com.itextpdf</groupId>
 *     <artifactId>itextpdf</artifactId>
 *     <version>5.5.13.3</version>
 * </dependency>
 */

public class FicheConsultationPdfExporter {
    // Palette de couleurs nude/professionnelle
    private static final BaseColor COLOR_DARK_GREEN   = new BaseColor(40, 89, 33);    // #285921
    private static final BaseColor COLOR_LIGHT_GREEN  = new BaseColor(55, 69, 53);    // #374535
    private static final BaseColor COLOR_NUDE_BG      = new BaseColor(250, 248, 246); // #FAF8F6
    private static final BaseColor COLOR_NUDE_HEADER  = new BaseColor(245, 241, 236); // #F5F1EC
    private static final BaseColor COLOR_NUDE_BORDER  = new BaseColor(232, 227, 221); // #E8E3DD
    private static final BaseColor COLOR_BROWN        = new BaseColor(107, 93, 82);   // #6B5D52
    private static final BaseColor COLOR_LIGHT_BROWN  = new BaseColor(184, 144, 109); // #B8906D
    private static final BaseColor COLOR_TEXT_DARK    = new BaseColor(74, 69, 66);    // #4A4542
    private static final BaseColor COLOR_TEXT_LIGHT   = new BaseColor(139, 133, 128); // #8B8580
    private static final BaseColor COLOR_WHITE        = BaseColor.WHITE;

    public static void exporterFiche(
            String outputPath,
            int ficheId,
            String patientPrenom,
            String patientNom,
            String patientEmail,
            String patientPhone,
            LocalDate dateConsultation,
            LocalTime heureConsultation,
            String typeSeance,
            String notes,
            String problemePrincipal,
            String diagnostic,
            String recommandations,
            String traitement,
            String medecinNom
    ) throws Exception {

        Document document = new Document(PageSize.A4, 40, 40, 40, 60);
        PdfWriter writer = PdfWriter.getInstance(document, new FileOutputStream(outputPath));

        // Événement pour header/footer sur chaque page
        writer.setPageEvent(new PdfPageEventHelper() {
            @Override
            public void onEndPage(PdfWriter w, Document doc) {
                drawFooter(w, doc, ficheId, medecinNom);
            }
        });

        document.open();

        // ===== BANDE DÉCORATIVE HAUT =====
        drawTopBanner(writer, document);

        // ===== TITRE ET LOGO =====
        drawHeader(document, ficheId, dateConsultation, heureConsultation);

        document.add(new Paragraph(" "));

        // ===== BLOC PATIENT =====
        drawPatientBlock(document, patientPrenom, patientNom, patientEmail, patientPhone, typeSeance);

        document.add(new Paragraph(" "));

        // ===== SÉPARATEUR =====
        drawSeparator(document);

        document.add(new Paragraph(" "));

        // ===== SECTIONS MÉDICALES =====
        if (notes != null && !notes.isEmpty()) {
            drawSection(document, "📝  Notes de la consultation", notes, COLOR_NUDE_HEADER, COLOR_BROWN);
        }
        if (problemePrincipal != null && !problemePrincipal.isEmpty()) {
            drawSection(document, "⚕️  Problème principal", problemePrincipal, new BaseColor(212, 163, 115, 30), COLOR_LIGHT_BROWN);
        }
        if (diagnostic != null && !diagnostic.isEmpty()) {
            drawSection(document, "🔍  Diagnostic", diagnostic, new BaseColor(184, 144, 109, 25), new BaseColor(184, 144, 109));
        }
        if (recommandations != null && !recommandations.isEmpty()) {
            drawSection(document, "💡  Recommandations", recommandations, new BaseColor(156, 132, 112, 25), new BaseColor(156, 132, 112));
        }
        if (traitement != null && !traitement.isEmpty()) {
            drawSection(document, "💊  Traitement prescrit", traitement, new BaseColor(139, 120, 101, 25), new BaseColor(139, 120, 101));
        }

        document.add(new Paragraph(" "));
        document.add(new Paragraph(" "));

        // ===== SIGNATURE =====
        drawSignature(document, medecinNom);

        document.close();
    }

    // ─────────────────────────────────────────────
    //  Bande verte décorative en haut
    // ─────────────────────────────────────────────
    private static void drawTopBanner(PdfWriter writer, Document doc) {
        PdfContentByte cb = writer.getDirectContent();
        float pageWidth = doc.getPageSize().getWidth();
        float pageHeight = doc.getPageSize().getHeight();

        // Bande principale verte
        cb.setColorFill(COLOR_DARK_GREEN);
        cb.rectangle(0, pageHeight - 15, pageWidth, 15);
        cb.fill();

        // Bande fine nude
        cb.setColorFill(COLOR_NUDE_BORDER);
        cb.rectangle(0, pageHeight - 18, pageWidth, 3);
        cb.fill();
    }

    // ─────────────────────────────────────────────
    //  En-tête : titre + numéro fiche + date
    // ─────────────────────────────────────────────
    private static void drawHeader(Document document, int ficheId,
                                   LocalDate date, LocalTime heure) throws DocumentException {

        PdfPTable table = new PdfPTable(3);
        table.setWidthPercentage(100);
        table.setWidths(new float[]{12, 58, 30});
        table.setSpacingAfter(5);

        // Colonne logo
        PdfPCell logoCell = new PdfPCell();
        logoCell.setBorder(Rectangle.NO_BORDER);
        logoCell.setBackgroundColor(COLOR_NUDE_BG);
        logoCell.setPadding(10);
        logoCell.setVerticalAlignment(Element.ALIGN_MIDDLE);
        try {
            String logoPath = FicheConsultationPdfExporter.class
                    .getResource("/images/logo.png").toExternalForm();
            Image logo = Image.getInstance(logoPath);
            logo.scaleToFit(50, 50);
            logoCell.addElement(logo);
        } catch (Exception e) {
            e.printStackTrace();
        }

        // Colonne titre
        PdfPCell titleCell = new PdfPCell();
        titleCell.setBorder(Rectangle.NO_BORDER);
        titleCell.setBackgroundColor(COLOR_NUDE_BG);
        titleCell.setPadding(12);
        titleCell.setVerticalAlignment(Element.ALIGN_MIDDLE);

        Font titleFont = new Font(Font.FontFamily.HELVETICA, 22, Font.BOLD, COLOR_DARK_GREEN);
        Paragraph title = new Paragraph("NAFSEYTI", titleFont);
        title.setSpacingAfter(3);

        Font subtitleFont = new Font(Font.FontFamily.HELVETICA, 11, Font.NORMAL, COLOR_TEXT_LIGHT);
        Paragraph subtitle = new Paragraph("Fiche de Consultation Psychologique", subtitleFont);

        titleCell.addElement(title);
        titleCell.addElement(subtitle);

        // Colonne badge ID
        PdfPCell badgeCell = new PdfPCell();
        badgeCell.setBorder(Rectangle.NO_BORDER);
        badgeCell.setBackgroundColor(COLOR_DARK_GREEN);
        badgeCell.setPadding(12);
        badgeCell.setHorizontalAlignment(Element.ALIGN_CENTER);
        badgeCell.setVerticalAlignment(Element.ALIGN_MIDDLE);

        Font idFont = new Font(Font.FontFamily.HELVETICA, 18, Font.BOLD, COLOR_WHITE);
        Paragraph idPara = new Paragraph("# " + ficheId, idFont);
        idPara.setAlignment(Element.ALIGN_CENTER);

        DateTimeFormatter df = DateTimeFormatter.ofPattern("dd/MM/yyyy", Locale.FRENCH);
        Font dateFont = new Font(Font.FontFamily.HELVETICA, 10, Font.NORMAL, new BaseColor(200, 230, 200));
        String dateStr = date != null ? df.format(date) : "";
        if (heure != null) dateStr += "  " + heure.toString();
        Paragraph datePara = new Paragraph(dateStr, dateFont);
        datePara.setAlignment(Element.ALIGN_CENTER);

        badgeCell.addElement(idPara);
        badgeCell.addElement(datePara);

        table.addCell(logoCell);
        table.addCell(titleCell);
        table.addCell(badgeCell);
        document.add(table);
    }

    // ─────────────────────────────────────────────
    //  Bloc patient
    // ─────────────────────────────────────────────
    private static void drawPatientBlock(Document document, String prenom, String nom,
                                         String email, String phone, String typeSeance)
            throws DocumentException {

        PdfPTable table = new PdfPTable(1);
        table.setWidthPercentage(100);

        PdfPCell cell = new PdfPCell();
        cell.setBackgroundColor(COLOR_NUDE_HEADER);
        cell.setBorderColor(COLOR_NUDE_BORDER);
        cell.setBorderWidth(1f);
        cell.setPadding(15);

        // Icône + nom
        Font labelFont = new Font(Font.FontFamily.HELVETICA, 9, Font.BOLD, COLOR_TEXT_LIGHT);
        Font nameFont  = new Font(Font.FontFamily.HELVETICA, 16, Font.BOLD, COLOR_TEXT_DARK);
        Font infoFont  = new Font(Font.FontFamily.HELVETICA, 10, Font.NORMAL, COLOR_BROWN);
        Font badgeFont = new Font(Font.FontFamily.HELVETICA, 9, Font.BOLD, COLOR_WHITE);

        cell.addElement(new Paragraph("PATIENT", labelFont));

        Paragraph namePara = new Paragraph(prenom + " " + nom, nameFont);
        namePara.setSpacingAfter(5);
        cell.addElement(namePara);

        // Email + téléphone sur une ligne
        StringBuilder contact = new StringBuilder();
        if (email != null && !email.isEmpty()) contact.append(email);
        if (phone != null && !phone.isEmpty()) {
            if (contact.length() > 0) contact.append("   •   ");
            contact.append(phone);
        }
        if (contact.length() > 0) {
            cell.addElement(new Paragraph(contact.toString(), infoFont));
        }

        // Badge type séance
        if (typeSeance != null && !typeSeance.isEmpty()) {
            Paragraph typePara = new Paragraph(" " + typeSeance + " ", badgeFont);
            typePara.setSpacingBefore(8);
            cell.addElement(typePara);
        }

        table.addCell(cell);
        document.add(table);
    }

    // ─────────────────────────────────────────────
    //  Séparateur décoratif
    // ─────────────────────────────────────────────
    private static void drawSeparator(Document document) throws DocumentException {
        LineSeparator ls = new LineSeparator(1.5f, 100, COLOR_NUDE_BORDER, Element.ALIGN_CENTER, 0);
        document.add(new Chunk(ls));
    }

    // ─────────────────────────────────────────────
    //  Section médicale générique
    // ─────────────────────────────────────────────
    private static void drawSection(Document document, String titre, String contenu,
                                    BaseColor bgColor, BaseColor accentColor)
            throws DocumentException {

        PdfPTable table = new PdfPTable(new float[]{3, 97});
        table.setWidthPercentage(100);
        table.setSpacingBefore(8);
        table.setSpacingAfter(4);

        // Barre d'accent gauche
        PdfPCell accentBar = new PdfPCell();
        accentBar.setBackgroundColor(accentColor);
        accentBar.setBorder(Rectangle.NO_BORDER);
        accentBar.setPadding(0);
        table.addCell(accentBar);

        // Contenu
        PdfPCell contentCell = new PdfPCell();
        contentCell.setBackgroundColor(bgColor != null ? bgColor : COLOR_NUDE_BG);
        contentCell.setBorder(Rectangle.NO_BORDER);
        contentCell.setPaddingLeft(14);
        contentCell.setPaddingTop(10);
        contentCell.setPaddingBottom(10);
        contentCell.setPaddingRight(10);

        Font titleFont   = new Font(Font.FontFamily.HELVETICA, 9, Font.BOLD, accentColor);
        Font contentFont = new Font(Font.FontFamily.HELVETICA, 11, Font.NORMAL, COLOR_TEXT_DARK);

        Paragraph titlePara = new Paragraph(titre.toUpperCase(), titleFont);
        titlePara.setSpacingAfter(5);
        contentCell.addElement(titlePara);
        contentCell.addElement(new Paragraph(contenu, contentFont));

        table.addCell(contentCell);
        document.add(table);
    }

    // ─────────────────────────────────────────────
    //  Bloc signature
    // ─────────────────────────────────────────────
    private static void drawSignature(Document document, String medecinNom) throws DocumentException {
        PdfPTable table = new PdfPTable(2);
        table.setWidthPercentage(100);
        table.setWidths(new float[]{60, 40});

        // Colonne gauche : mention légale
        PdfPCell leftCell = new PdfPCell();
        leftCell.setBorder(Rectangle.NO_BORDER);
        Font legalFont = new Font(Font.FontFamily.HELVETICA, 8, Font.ITALIC, COLOR_TEXT_LIGHT);
        leftCell.addElement(new Paragraph(
                "Ce document est confidentiel et réservé à l'usage médical.\n" +
                        "Il ne peut être divulgué sans le consentement du praticien.", legalFont));
        table.addCell(leftCell);

        // Colonne droite : signature
        PdfPCell signCell = new PdfPCell();
        signCell.setBorder(Rectangle.TOP);
        signCell.setBorderColor(COLOR_NUDE_BORDER);
        signCell.setPaddingTop(8);
        signCell.setHorizontalAlignment(Element.ALIGN_CENTER);

        Font signFont = new Font(Font.FontFamily.HELVETICA, 11, Font.BOLD, COLOR_DARK_GREEN);
        Font signSubFont = new Font(Font.FontFamily.HELVETICA, 9, Font.NORMAL, COLOR_TEXT_LIGHT);

        signCell.addElement(new Paragraph(medecinNom != null ? medecinNom : "Dr. Psychologue", signFont));
        signCell.addElement(new Paragraph("Psychologue Clinicien", signSubFont));
        signCell.addElement(new Paragraph("NAFSEYTI Platform", signSubFont));
        table.addCell(signCell);

        document.add(table);
    }

    // ─────────────────────────────────────────────
    //  Footer sur chaque page
    // ─────────────────────────────────────────────
    private static void drawFooter(PdfWriter writer, Document doc, int ficheId, String medecin) {
        try {
            PdfContentByte cb = writer.getDirectContent();
            float pageWidth = doc.getPageSize().getWidth();

            // Bande verte fine en bas
            cb.setColorFill(COLOR_DARK_GREEN);
            cb.rectangle(0, 0, pageWidth, 20);
            cb.fill();

            // Texte footer
            cb.beginText();
            cb.setFontAndSize(BaseFont.createFont(), 7);
            cb.setColorFill(new BaseColor(200, 230, 200));
            cb.showTextAligned(PdfContentByte.ALIGN_LEFT, "NAFSEYTI - Fiche #" + ficheId, 40, 6, 0);
            cb.showTextAligned(PdfContentByte.ALIGN_RIGHT,
                    "Généré le " + DateTimeFormatter.ofPattern("dd/MM/yyyy", Locale.FRENCH).format(LocalDate.now()),
                    pageWidth - 40, 6, 0);
            cb.endText();

        } catch (Exception e) {
            e.printStackTrace();
        }
    }
}
