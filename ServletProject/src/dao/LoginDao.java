package dao;


import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

import connection.SQLConnection;

public class LoginDao {
	
	public boolean login (String username,String password) {
		Connection conn = SQLConnection.getJDBCConnection();
		String sql = "select * from userr WHERE USERNAME = '" + username 
				+"' AND PASSWORD = '" + password + "'";
		
		try {
			Statement statement = conn.createStatement();
			ResultSet rs = statement.executeQuery(sql);
			if(rs.next()) {
				return true;
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		return false;
	}
}
