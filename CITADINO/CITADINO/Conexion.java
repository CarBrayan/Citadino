import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class Conexion {
    private static Connection connection = null;

    public static Connection getConnection() {
        try {
            // 1. Cargar el Driver
            Class.forName("com.mysql.cj.jdbc.Driver"); 

            // 2. Definir los parámetros de conexión
            // URL: jdbc:mysql://HOST:PORT/NOMBRE_BD
            String url = "jdbc:mysql://localhost/phpmyadmin/crud"; 
            // Usuario por defecto en XAMPP
            String user = "root"; 
            // Contraseña por defecto en XAMPP (vacía)
            String password = ""; 

            // 3. Establecer la conexión
            connection = DriverManager.getConnection(url, user, password);

            if (connection != null) {
                System.out.println("¡Conexión exitosa a la base de datos!");
            }
        } catch (ClassNotFoundException e) {
            System.out.println("Error: No se encontró el Driver de MySQL.");
            e.printStackTrace();
        } catch (SQLException e) {
            System.out.println("Error de conexión a la BD.");
            e.printStackTrace();
        }
        return connection;
    }

    public static void closeConnection() {
        try {
            if (connection != null) {
                connection.close();
                System.out.println("Conexión cerrada.");
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }
}