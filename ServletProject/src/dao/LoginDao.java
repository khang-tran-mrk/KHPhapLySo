package dao;


import java.sql.Connection;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

import connection.MySQLConnection;

public class LoginDao {
	
	public boolean login (String username,String password) {
		//Connection conn = SQLConnection.getJDBCConnection();
		Connection conn = MySQLConnection.getConnection();
		String sql = "select * from sinhvien WHERE name = '" + username 
				+"' AND address = '" + password + "'";
		System.out.println(sql);
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
