package tn.esprit.projet.view;

import tn.esprit.projet.models.Event;
import tn.esprit.projet.models.Planification;
import tn.esprit.projet.utils.MyBDConnexion;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class PlanificationService implements CRUD<Planification>{

    private Connection cnx ;

    public PlanificationService(){
        cnx = MyBDConnexion.getInstance().getCnx();
    }


        public void insertOne(Planification plan) throws SQLException {
            String req=" INSERT INTO `planification`(`id_planification`, `id_event`, `description`, `duree`)  VALUES (?,?,?,?)";

            PreparedStatement ps = cnx.prepareStatement(req);

            ps.setInt(1,plan.getIdPlanification());
            ps.setInt(2,plan.getIdEvent());
            ps.setString(3,plan.getDescription());
            ps.setString(4,plan.getDuree());

            System.out.println(ps.executeUpdate()); // FIX
        }

        @Override
        public void updateOne(Planification plan) throws SQLException {
            String req="UPDATE `events` SET `id_event`=?,`description`=?,`location`=?,`duree`=? WHERE id_planification =?";


            PreparedStatement ps = cnx.prepareStatement(req);

            ps.setInt(1,plan.getIdEvent());
            ps.setString(2,plan.getDescription());
            ps.setString(3,plan.getDuree());
            ps.setInt(4,plan.getIdPlanification());

            ps.executeUpdate(); // FIX
        }

        @Override
        public void deletOne(Planification plan) throws SQLException{
            String req="DELETE FROM `planification` WHERE id_planification =?";

            PreparedStatement ps = cnx.prepareStatement(req);

            ps.setInt(1,plan.getIdPlanification());
            ps.executeUpdate(); // FIX
        }

        @Override
        public List<Planification> selectAll() throws SQLException{

            List<Planification> plans= new ArrayList<>();

            String req = "SELECT * FROM plans";
            Statement st = cnx.createStatement();
            ResultSet rs= st.executeQuery(req);

            while (rs.next()){
                Planification pl = new Planification();
                pl .setIdPlanification(rs.getInt(1));
                pl .setIdEvent(rs.getInt(2));
                pl .setDescription(rs.getString(3));
                pl .setDuree(rs.getString(4));
                plans.add(pl);
            }

            return plans; // FIX
        }
    }

