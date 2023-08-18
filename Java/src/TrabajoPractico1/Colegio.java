package TrabajoPractico1;

import java.util.Arrays;

public class Colegio {
	private Curso[] cursos;
	
	public Colegio() {
		cursos = new Curso[10];
	}
	
	public Curso[] getCursos() {
		return cursos;
	}
	
	private Curso verificarCurso(Curso curso) {
		for (int i = 0; i < cursos.length; i++) {
			if (cursos[i] == curso) {
				return cursos[i];
			}
		}
		return null;
	}
	
	public void agregarCurso(Curso curso) {
		for (int i = 0; i < cursos.length; i++) {
			if (cursos[i] == null) {
				cursos[i] = curso;
				return;
			}
		}
		System.out.println("ERROR: el colegio esta lleno.");
	}
	
	public void agregarEstudianteACurso(Curso curso, Alumno estudiante) {
		Curso cursoActual = verificarCurso(curso); 
		if (cursoActual != null) {
			cursoActual.agregarEstudiante(estudiante);
		}
	}
	
	public void mostrarEstudiantesDeCurso(Curso curso) {
		Curso cursoActual = verificarCurso(curso);
		Alumno[] estudiantes = cursoActual.getEstudiantes();
		for (int i = 0; i < estudiantes.length; i++) {
			if (estudiantes[i] == null) {
				continue;
			}
			else {
				System.out.println("---------------");
				System.out.println("Estudiante " + (i + 1) + "\n" + estudiantes[i].toString(0));
			}
		}
	}
	
	public void mostrarCalificacionesDeAlumno(Alumno estudiante) {
		boolean estudianteExiste = false;
		Alumno[] estudiantes = null;
		for (int i = 0; i < cursos.length; i++) {
			estudiantes = cursos[i].getEstudiantes();
			for (int j = 0; j < estudiantes.length; j++) {
				if (estudiantes[j] == estudiante) {
					System.out.println("Calificaciones: " + Arrays.toString(estudiantes[j].getCalificaciones()));
					estudianteExiste = true;
					break;
				}
			}
			if (estudianteExiste) { break; }
		}
		
		if (estudianteExiste == false) {
			System.out.println("ERROR: Estudiante no atiende este colegio.");
		}
	}
	
	public void promedioCalificacionesDeCurso(Curso curso) {
		Curso cursoActual = verificarCurso(curso);
		Alumno[] estudiantes = cursoActual.getEstudiantes();
		double[] promedios = new double[0];
		
		double[] calificaciones = null;
		double promedio = 0;
		for (int i = 0; i < estudiantes.length; i++) {
			if (estudiantes[i] == null) { continue; }
			calificaciones = estudiantes[i].getCalificaciones();
			for (int j = 0; j < calificaciones.length; j++) {
				promedio += calificaciones[j];
			}
			if (calificaciones.length > 0) {
				promedio /= calificaciones.length;
			}
			promedios = agregarAArray(promedio, promedios);
			
			System.out.println(estudiantes[i].getNombre() + ": " + promedio);
			promedio = 0;
		}
		for (int i = 0; i < promedios.length; i++) {
			promedio += promedios[i];
		}
		promedio /= promedios.length;
		System.out.println("TOTAL: " + promedio);
	}
	
	private double[] agregarAArray(double valor, double[] matriz) {
		double[] nuevaMatriz = new double[matriz.length + 1];
		if (matriz.length > 0) {
			for (int i = 0; i < matriz.length; i++) {
				nuevaMatriz[i] = matriz[i];
			}
		}
		nuevaMatriz[matriz.length] = valor;
		return nuevaMatriz;
	}
	
	public String toString() {
		String cursos = "";
		int numero = 0;
		Curso[] curArray = getCursos();
		for (int i = 0; i < curArray.length; i++) {
			if (curArray[i] != null) {
				numero++;
				if (i > 0) {
					cursos = cursos.concat("    -------------------\n");
				}
				cursos = cursos.concat("    Curso " + numero + "\n" + curArray[i].toString(1) + "\n");
			}
		}
		return ("Colegio\nCursos: " + numero + "\n" + cursos);
	}
}
