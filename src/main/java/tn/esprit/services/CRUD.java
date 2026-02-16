package tn.esprit.services;

import java.sql.SQLException;
import java.util.*;
public interface CRUD <T>{


    void ajouter(T t) throws SQLException;

    void modifier(T t) throws SQLException;

    void supprimer(T t) throws SQLException;

    List<T> afficher() throws SQLException;

}
