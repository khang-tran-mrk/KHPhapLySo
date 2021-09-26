/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package dao;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;
import java.util.logging.Level;
import java.util.logging.Logger;

import connection.SQLConnection;
import model.User;

/**
 *
 * @author huyng
 */
public class UserDao {

    public List<User> getAllUser() {
        List<User> users = new ArrayList<>();
        Connection conn = SQLConnection.getJDBCConnection();

        String sql = "Select * from USERR";
        try {
            PreparedStatement preparedStatement = conn.prepareStatement(sql);

            ResultSet rs = preparedStatement.executeQuery();
            while (rs.next()) {
                User user = new User();

                user.setId(rs.getInt("ID"));
                user.setName(rs.getString("NAME"));
                user.setPhone(rs.getString("PHONE"));
                user.setUsername(rs.getString("USERNAME"));
                user.setPassword(rs.getString("PASSWORD"));
                user.setAbout(rs.getString("ABOUT"));
                user.setFavourites(rs.getString("FAVOURITES"));
                user.setRole(rs.getString("ROLE"));

                users.add(user);
            }

        } catch (SQLException ex) {
            ex.printStackTrace();
        }

        return users;
    }
    
    public User getUserById(int id) {
        Connection conn = SQLConnection.getJDBCConnection();

        String sql = "Select * from USERR where ID = ?";
        try {
            PreparedStatement preparedStatement = conn.prepareStatement(sql);
            preparedStatement.setInt(1, id);
            ResultSet rs = preparedStatement.executeQuery();
            while (rs.next()) {
                User user = new User();

                user.setId(rs.getInt("ID"));
                user.setName(rs.getString("NAME"));
                user.setPhone(rs.getString("PHONE"));
                user.setUsername(rs.getString("USERNAME"));
                user.setPassword(rs.getString("PASSWORD"));
                user.setAbout(rs.getString("ABOUT"));
                user.setFavourites(rs.getString("FAVOURITES"));
                user.setRole(rs.getString("ROLE"));

                return user;
            }

        } catch (SQLException ex) {
            ex.printStackTrace();
        }

        return null;
    }
    
    

    public void addUser(User user) {
        Connection conn = SQLConnection.getJDBCConnection();
        String sql = "insert into Userr values(?,?,?,?,?,?,?)";
        try {
            PreparedStatement preparedStatement = conn.prepareStatement(sql);
            preparedStatement.setString(1, user.getName());
            preparedStatement.setString(2, user.getPhone());
            preparedStatement.setString(3, user.getUsername());
            preparedStatement.setString(4, user.getPassword());
            preparedStatement.setString(5, user.getAbout());
            preparedStatement.setString(6, user.getRole());
            preparedStatement.setString(7, user.getFavourites());
            
            int rs = preparedStatement.executeUpdate();
            System.out.println("insert: " + rs);
        } catch (SQLException ex) {
            ex.printStackTrace();
        }
    }
    
    public void updateUser(User user){
        Connection conn = SQLConnection.getJDBCConnection();
        String sql = "UPDATE USERR SET NAME=?, PHONE=?, USERNAME=?,PASSWORD=?, ABOUT=?, ROLE=?, FAVOURITES=? WHERE ID=?";
        
        try {
            PreparedStatement preparedStatement = conn.prepareStatement(sql);
            preparedStatement.setString(1, user.getName());
            preparedStatement.setString(2, user.getPhone());
            preparedStatement.setString(3, user.getUsername());
            preparedStatement.setString(4, user.getPassword());
            preparedStatement.setString(5, user.getAbout());
            preparedStatement.setString(6, user.getRole());
            preparedStatement.setString(7, user.getFavourites());
            preparedStatement.setInt(8, user.getId());
            
            int rs = preparedStatement.executeUpdate();
            System.out.println("update:" + rs);
        } catch (SQLException ex) {
            ex.printStackTrace();
        }
    }
    
    public void deleteUser(int id){
        Connection conn = SQLConnection.getJDBCConnection();
        String sql = "delete from USERR where ID =?";
        try {
            PreparedStatement preparedStatement = conn.prepareStatement(sql);
            preparedStatement.setInt(1, id);
            int rs = preparedStatement.executeUpdate();
            System.out.println("delete:" + rs);
        } catch (SQLException ex) {
            ex.printStackTrace();
        }
        
    }
}
