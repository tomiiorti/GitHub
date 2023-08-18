package TrabajoPractico1;

public class CursoPresencial extends Curso {
	String ubicacion;
	String nombre; // Nombre identificador del aula, puede ser texto o numero

	public CursoPresencial(Maestro profesor, String materia, String ubicacion, String nombre) {
		super(profesor, materia);
		this.ubicacion = ubicacion;
		this.nombre = nombre;
	}

	public String getUbicacion() {
		return ubicacion;
	}
	public void setUbicacion(String ubicacion) {
		this.ubicacion = ubicacion;
	}

	public String getNombre() {
		return nombre;
	}
	public void setNombre(String nombre) {
		this.nombre = nombre;
	}
	
	public void agregarEstudiante(Alumno estudiante) {
		Alumno[] estudiantes = getEstudiantes();
		for (int i = 0; i < estudiantes.length; i++) {
			if (estudiantes[i] == null) {
				estudiantes[i] = estudiante;
				return;
			}
		}
		System.out.println("ERROR: la clase esta llena.");

	}

	public String toString(int espacios) {
		String tab = "    ".repeat(espacios);
		
		String estudiantes = "";
		int numero = 0;
		Alumno[] estArray = getEstudiantes();
		for (int i = 0; i < estArray.length; i++) {
			if (estArray[i] != null) {
				numero++;
				if (i > 0) {
					estudiantes = estudiantes.concat("    ".repeat(espacios + 1) + "-------------------\n");
				}
				estudiantes = estudiantes.concat("    ".repeat(espacios + 1) + "Alumno " + numero + "\n" +
												 estArray[i].toString(espacios + 1) + "\n");
			}
		}
		return (tab + "Tipo: Presencial\n" + tab + "Materia: " + getMateria() + "\n" + tab + "Nombre: " + nombre + "\n" +
				tab + "Ubicacion: " + ubicacion + "\n" + tab + "Profesor:\n" + getProfesor().toString(espacios + 1) + "\n" +
				tab + "Estudiantes: " + numero + "\n" + estudiantes);
	}

}
