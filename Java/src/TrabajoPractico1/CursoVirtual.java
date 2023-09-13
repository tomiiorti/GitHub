package TrabajoPractico1;

public class CursoVirtual extends Curso {
	String url; // Link de la clase (URL)

	public CursoVirtual(Maestro profesor, String nombre, String url) {
		super(profesor, nombre);
		this.url = url;
	}
	
	public String getUrl() {
		return url;
	}
	public void setUrl(String url) {
		this.url = url;
	}

	public void agregarEstudiante(Alumno estudiante) {
		Alumno[] estudiantes = getEstudiantes();
		for (int i = 0; i < estudiantes.length; i++) {
			if (estudiantes[i] == null) {
				estudiantes[i] = estudiante;
				return;
			}
		}
		System.out.println("Error: la clase esta llena.");

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
		return (tab + "Tipo: Virtual\n" + tab + "Materia: " + getMateria() + "\n" + tab + "URL: " + url + "\n" +
				tab + "Profesor:\n" + getProfesor().toString(espacios + 1) + "\n" + tab + "Estudiantes: " + numero + "\n" + estudiantes);
	}

}
