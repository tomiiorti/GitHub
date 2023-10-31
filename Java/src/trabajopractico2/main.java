package trabajopractico2;
import java.io.BufferedReader;
import java.io.FileReader;
import java.io.IOException;
import java.util.ArrayList;
import java.util.List;
import java.util.Scanner;

public class main {
	
	
    public static void main(String[] args) {
        Scanner sc = new Scanner(System.in);
        String user;
        main programa = new main();
        programa.listaUsuarios();
        
        abmUsuario abmuser = new abmUsuario();
        
        
        int op = 1;
        int op2 = 0;

        System.out.println("Bienvenido al sistema de gestion de la biblioteca. Seleccione la opcion que desea:");
        while (op != 0) {
            System.out.println("1- Usuarios\n2- Libros/Revistas\n3- Prestamos y devoluciones\n4- Control de inventario\n5- Generacion de informes\n0- Salir");
            System.out.print("Opcion: ");
            op = sc.nextInt();

            switch (op) {
                case 1:
                    System.out.println("1- Alta de usuario\n2- Baja de usuario\n3- Modificacion de usuario\n0- Volver");
                    System.out.print("Opcion: ");
                    op2 = sc.nextInt();
                    switch (op2) {
                    case 1:
                         System.out.print("Ingrese el nombre: "); // si pongo dos palabras separadas me da un error
                         String nombre = sc.next();
                         System.out.print("Ingrese el usuario: ");
                         String username = sc.next();
                         System.out.print("Ingrese la contraseña: ");
                         String contra = sc.next();
                         System.out.print("Ingrese el rol (Administrador:0 / Usuario:1): ");
                         String rol = sc.next();
                         System.out.println(rol);
                         while (!rol.equals("1") && !rol.equals("0")) {
                        	 System.out.println("Error, solo se puede ingresar '1' o '0' \nTenes que ingresar '0' (en caso de Administrador) o '1' (en caso de Usuario)");
                        	 System.out.print("Ingrese el rol: ");
                              rol = sc.next();
                         }
                         abmuser.altaUsuario(nombre, username, contra, rol);
                         break;
                    	
                    case 2:
                    	
                    	programa.mostrarListaDeUsuarios();
                    	System.out.print("Escriba el usuario a eliminar:");
                    	user = sc.next();
                    	abmuser.bajaUsuario(user);
                    	
                    case 3:
                    	String nNombre ="";
                    	String nUsuario ="";
                    	String nContra ="";
                    	String nRol ="";
                    	programa.mostrarListaDeUsuarios();
                    	System.out.print("Escriba el usuario a modificar:");
                    	user = sc.next();
                    	List<String> usuarios = programa.getListaDeUsers();
                    	
                    	for (String usuario : usuarios) {
                    	    String[] datosUsuario = usuario.split(";");
                    	    String nombreDeUsuario = datosUsuario[1]; // El nombre de usuario se encuentra en la posición 1 en los datos del usuario
                    	    int op3 = 1;
                    	    System.out.println("Intento");
                    	    while (op3 != 0) {
                    	    	System.out.println("Intento");
                    	    	if (user.equals(nombreDeUsuario)) {
                        	        // Aquí puedes realizar las acciones de modificación para el usuario encontrado
                        	    	System.out.println("1- Modificar nombre: " + datosUsuario[0]);
                        	    	System.out.println("2- Modificar usuario: " + datosUsuario[1]);
                        	    	System.out.println("3- Modificar contraseña: " + datosUsuario[2]);
                        	    	System.out.println("4- Modificar rol: " + datosUsuario[3] + " (Administrador(1) - Usuario(0))");
                        	    	System.out.println("0- Volver");
                        	        // Puedes acceder a otros datos del usuario, como contraseña o rol, usando datosUsuario[2] y datosUsuario[3]
                        	    	System.out.print("Opcion: ");
                        	    	op3 = sc.nextInt();
                        	    	switch (op3) {
                                    case 1:
                                        System.out.print("Nombre nuevo: ");
                                        nNombre = sc.nextLine();
                                        break;
                                    case 2:
                                        System.out.print("Usuario nuevo: ");
                                        nUsuario = sc.nextLine();
                                        break;
                                    case 3:
                                        System.out.print("Contraseña nueva: ");
                                        nContra = sc.nextLine();
                                        break;
                                    case 4:
                                        System.out.print("Rol nuevo (Administrador(1) - Usuario(0)): ");
                                        nRol = sc.nextLine();
                                        break;
                                    case 0:
                                        break;
                                    default:
                                        System.out.println("Opcion no valida. Intente de nuevo.");
                                }
                        	    	
                        	    }else {
                        	    	System.out.print("No se ha encontrado ningun registro con ese nombre de usuario");
                        	    	break;
                        	    	
                        	    }
                    	    }
                    	    abmuser.modUsuario(datosUsuario[1], nNombre, nUsuario, nContra, nRol);
                    	}
                    	
                    	
                    case 0:
                    	
                    	
                    }
                    break;
                case 2:
                    System.out.println("1- Alta de libro/revista\n2- Baja de libro/revista\n3- Modificacion de libro/revista\n0- Volver");
                    System.out.print("Opcion: ");
                    op2 = sc.nextInt();
                    switch (op2) {
                    case 1:
                    	
                    	
                    case 2:
                    	
                    	
                    case 3:
                    	
                    	
                    case 0:
                    	
                    	
                    }
                    break;
                case 3:
                    System.out.println("1- Prestamo de libro/revista\n2- Devolución de libro/revista\n0- Volver");
                    System.out.print("Opcion: ");
                    op2 = sc.nextInt();
                    switch (op2) {
                    case 1:
                    	
                    	
                    case 2:
                    	
                    	
                    case 3:
                    	
                    	
                    case 0:
                    	
                    	
                    }
                    break;
                case 4:
                    System.out.println("1- Libros en stock\n2- Libros prestados\nBuscar libro \n0- Volver");
                    System.out.print("Opcion: ");
                    op2 = sc.nextInt();
                    switch (op2) {
                    case 1:
                    	
                    	
                    case 2:
                    	
                    	
                    case 3:
                    	
                    	
                    case 0:
                    	
                    	
                    }
                    break;
                case 5:
                    System.out.println("1- Libros mas prestados\n2- Cantidad de libros en la biblioteca\n3- Cantidad de revistas en la biblioteca\n4- Usuarios con mas libros en posesion\n0- Volver");
                    System.out.print("Opcion: ");
                    op2 = sc.nextInt();
                    switch (op2) {
                    case 1:
                    	
                    	
                    case 2:
                    	
                    	
                    case 3:
                    	
                    	
                    case 0:
                    	
                    	
                    }
                    break;
                case 0:
                    System.out.println("Saliendo del programa. Chao chao!");
                    break;
                default:
                    System.out.println("Opcion no valida. Intente de nuevo.");
            }
        }
    }
    private List<String> listaDeUsers = new ArrayList<>();

    public void listaUsuarios() {
        FileReader user = null;
        try {
            user = new FileReader("C:/Users/tomas/OneDrive/Escritorio/GitHub/Java/src/trabajopractico2/tablaUsuario.csv");
            BufferedReader bufUser = new BufferedReader(user);
            String linea;

            while ((linea = bufUser.readLine()) != null) {
                listaDeUsers.add(linea);
            }
        } catch (IOException e) {
            e.printStackTrace();
        }
    }

    public List<String> getListaDeUsers() {
        return listaDeUsers;
    }

    public void mostrarListaDeUsuarios() {
        List<String> usuarios = getListaDeUsers();

        for (String usuario : usuarios) {
            String[] datosUsuario = usuario.split(";");
            System.out.println("Nombre: " + datosUsuario[0]);
            System.out.println("Usuario: " + datosUsuario[1]);
            System.out.println("Contraseña: " + datosUsuario[2]);
            System.out.println("Rol: " + datosUsuario[3]);
            System.out.println("-----------------------");
        }
    }
}

