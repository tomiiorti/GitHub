package herencia_29_5;

public class cargaEstudiantes {

	public static void main(String[] args) {
		estudiante nuevoEstudiante = new estudiante (1, 2023);
		System.out.println(nuevoEstudiante.get_datos_est());
		profesor nuevoProfesor = new profesor (2, 190000);
		System.out.println(nuevoProfesor.get_datos_profe());
		
		

	}

}
