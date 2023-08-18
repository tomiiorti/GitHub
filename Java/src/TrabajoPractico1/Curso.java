package TrabajoPractico1;

public abstract class Curso { // Materia
	private Maestro profesor;
	private String materia; // Nombre de materia
	private Alumno[] estudiantes;
	
	public Curso(Maestro profesor, String materia) {
		this.profesor = profesor;
		this.materia = materia;
		estudiantes = new Alumno[40];
	}

	public Maestro getProfesor() {
		return profesor;
	}
	public void setProfesor(Maestro profesor) {
		this.profesor = profesor;
	}

	public String getMateria() {
		return materia;
	}
	public void setMateria(String materia) {
		this.materia = materia;
	}

	public Alumno[] getEstudiantes() {
		return estudiantes;
	}
	public void setEstudiantes(Alumno[] estudiantes) {
		this.estudiantes = estudiantes;
	}
	
	public abstract void agregarEstudiante(Alumno estudiante);
	
	public abstract String toString(int espacios);
}
