package connection;


import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

/**
 *
 * @author huyng
 */
public class SQLConnection {

    public static Connection getJDBCConnection() {
        final String server = "LAPTOP-QF3MIDCU";
        final String user = "sa";
        final String pass = "11111";
        final String database = "BAN_HANG";
        final int port = 1433;
        final String url = "jdbc:sqlserver://localhost:" + port + ";databaseName=" + database + ";user=" + user + ";password=" + pass;

        try {
            Class.forName("com.microsoft.sqlserver.jdbc.SQLServerDriver");
            System.out.println("Connect success!!!");
            return DriverManager.getConnection(url);
        } catch (ClassNotFoundException ex) {
            ex.printStackTrace();
        } catch (SQLException ex) {
            ex.printStackTrace();
        }
        return null;
    }
    
    
}
