package trabajopractico2;
import java.io.*;
import java.util.*;

public class abmUsuario {
    
    // Este ArrayList se utiliza para almacenar los usuarios en memoria.
    private ArrayList<usuarios> listaUsuarios = new ArrayList<>();

    // Método para dar de alta un usuario
    public void altaUsuario(String nombre, String usuario, String contra, String rol) {
        usuarios nuevoUsuario = new usuarios(nombre, usuario, contra, rol);
        listaUsuarios.add(nuevoUsuario);
        String usuarioCSV = nombre + ";" + usuario + ";" + contra + ";" + rol + "\n";
        
		try {
			FileWriter fileWriter = new FileWriter("C:/Users/tomas/OneDrive/Escritorio/GitHub/Java/src/trabajopractico2/tablaUsuario.csv", true);
			BufferedWriter bufWriter = new BufferedWriter(fileWriter);
			bufWriter.write(usuarioCSV);
			bufWriter.close();
	        System.out.println("Usuario creado con exito.");
		   
			
		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
    }

    // Método para dar de baja un usuario
    public void bajaUsuario(String usuario) {
        Scanner sc = new Scanner(System.in);

        System.out.print("¿Estás seguro de que deseas eliminar el usuario " + usuario + "? (S/N): ");
        String confirmacion = sc.next();

        if (confirmacion.equalsIgnoreCase("S")) {
            for (usuarios u : listaUsuarios) {
                if (u.getUsuario().equals(usuario)) {
                    listaUsuarios.remove(u);
                    System.out.println("Usuario eliminado con éxito.");
                    return;
                }
            }
            System.out.println("Usuario no encontrado.");
        } else {
        }
    }

    // Método para modificar un usuario
    public void modUsuario(String usuarioExistente, String nuevoUsuario, String nuevoNombre, String nuevaContra, String nuevoRol) {
    	
    	Scanner sc = new Scanner(System.in);

        System.out.print("¿Estás seguro de que deseas modificar el usuario " + usuarioExistente + "? (S/N): ");
        String confirmacion = sc.next();
        
        if (confirmacion.equalsIgnoreCase("S")) {
	        for (usuarios u : listaUsuarios) {
	            if (u.getUsuario().equals(usuarioExistente)) {
	            	u.setUsuario(nuevoUsuario);
	                u.setNombre(nuevoNombre);
	                u.setContra(nuevaContra);
	                u.setRol(nuevoRol);
	                try {
	                    FileWriter fileWriter = new FileWriter("C:/Users/tomas/OneDrive/Escritorio/GitHub/Java/src/trabajopractico2/tablaUsuario.csv");
	                    BufferedWriter bufWriter = new BufferedWriter(fileWriter);

	                    for (usuarios us : listaUsuarios) {
	                        String linea = us.getNombre() + ";" + us.getUsuario() + ";" + us.getContra() + ";" + us.getRol();
	                        bufWriter.write(linea);
	                        bufWriter.newLine();
	                    }

	                    bufWriter.close();
	                    System.out.println("Usuario modificado y cambios guardados en el archivo.");
	                } catch (IOException e) {
	                    e.printStackTrace();
	                }
	                return;
	            }
	        }
	        System.out.println("Usuario no encontrado.");
        } else {
            System.out.println("Operación de eliminación cancelada.");
        }
    }
}

