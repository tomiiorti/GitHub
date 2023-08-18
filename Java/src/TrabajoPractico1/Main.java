package TrabajoPractico1;

import java.util.Scanner;

public class Main {

	public static void main(String[] args) {
		Scanner sc = new Scanner(System.in);
		
		Colegio escuela = new Colegio();
		String opcion;
		boolean encendido = true;
		
		while (encendido) {
			System.out.println("-----------------------------------------------------\n"
							 + "Base de datos de colegio\n"
							 + "Ingresa numero para elegir opcion:\n"
							 + "1- Agregar curso\n"
							 + "2- Agregar estudiante a curso\n"
							 + "3- Mostrar estudiantes de curso\n"
							 + "4- Mostrar calificaciones de estudiante\n"
							 + "5- Mostrar promedios de calificaciones de un curso\n"
							 + "6- Mostrar datos del colegio\n"
							 + "0- Cerrar");
		
			opcion = sc.nextLine();
			switch(opcion) {
				case "1":    // Agregar curso
					Curso curso1;
					System.out.println("Ingresar nombre de materia:");
					String materia = sc.nextLine();
					System.out.println("Ingresar nombre de profesor:");
					String nombreProf = sc.nextLine();
					System.out.println("Ingresar edad de profesor:");
					int edadProf = sc.nextInt();
					sc.nextLine();
					System.out.println("Ingresar salario de profesor (en centavos):");
					int salarioProf = sc.nextInt();
					sc.nextLine();
					Maestro profesor = new Maestro(nombreProf, edadProf, materia, salarioProf);
					String tipoCurso;
					while (true) {
						System.out.println("Ingresa tipo de curso ('P' para presencial, 'V' para virtual):");
						tipoCurso = sc.nextLine();
						if (tipoCurso.equalsIgnoreCase("P")) {
							System.out.println("Ingresar ubicacion de aula:");
							String ubicacionAula = sc.nextLine();
							System.out.println("Ingresar nombre de aula:");
							String nombreAula = sc.nextLine();
							curso1 = new CursoPresencial(profesor, materia, ubicacionAula, nombreAula);
							break;
						}
						else if (tipoCurso.equalsIgnoreCase("V")) {
							System.out.println("Ingresar URL del link:");
							String url = sc.nextLine();
							curso1 = new CursoVirtual(profesor, materia, url);
							break;
						}
					}
					escuela.agregarCurso(curso1);
					System.out.println("Curso '" + materia + "' agregado.");
					break;
				case "2":    // Agregar estudiante a curso
					if (cantidadCursos(escuela) == 0) {    // Si no hay cursos registrados, no se ejecuta
						break;
					}
					
					Curso curso2 = elegirCurso(escuela, sc);
						
					// Ingresar datos de alumnos
					System.out.println("Ingresar nombre de alumno:");
					String nombreAlumno = sc.nextLine();
					System.out.println("Ingresar edad de alumno:");
					int edadAlumno = sc.nextInt();
					sc.nextLine();
					String cursoMateria = curso2.getMateria();
					double[] calificaciones = new double[0];
					double[] nuevasCalificaciones; // Variable temporal para agregar calificaciones al array anterior
					while (true) {
						System.out.println("Ingresa calificacion entre 0,0 y 10,0 (o un numero negativo para terminar de ingresar):");
						double calificacion = sc.nextDouble();
						if ((calificacion >= 0) && (calificacion <= 10)) {
							nuevasCalificaciones = new double[calificaciones.length + 1];
							if (calificaciones.length > 0) {
								for (int i = 0; i < calificaciones.length; i++) {
									nuevasCalificaciones[i] = calificaciones[i];
									}
								}
							nuevasCalificaciones[calificaciones.length] = calificacion;
							calificaciones = nuevasCalificaciones;
							}
						else if (calificacion < 0) {
							sc.nextLine();
							break;
							}
						else {
							sc.nextLine();
							System.out.println("No puede ser mayor de 10.");
							}
						}
					Alumno estudianteNuevo = new Alumno(nombreAlumno, edadAlumno, cursoMateria, calificaciones);
					escuela.agregarEstudianteACurso(curso2, estudianteNuevo);
					System.out.println("Alumno '" + nombreAlumno + "' agregado al curso '" + cursoMateria + "'.");
					break;
				case "3":    // Mostrar estudiantes de curso
					if (cantidadCursos(escuela) == 0) {    // Si no hay cursos registrados, no se ejecuta
						break;
					}
					Curso curso3 = elegirCurso(escuela, sc);
					
					if (cantidadAlumnos(curso3) == 0) {    // Si no hay alumno registrados en este curso, tampoco se ejecuta
						break;
					}
					escuela.mostrarEstudiantesDeCurso(curso3);
					break;
				case "4":    // Mostrar calificaciones de estudiante
					if (cantidadCursos(escuela) == 0) {    // Si no hay cursos registrados, no se ejecuta
						break;
					}
					Curso curso4 = elegirCurso(escuela, sc);
					
					if (cantidadAlumnos(curso4) == 0) {    // Si no hay alumno registrados en este curso, tampoco se ejecuta
						break;
					}
					Alumno estudiante = elegirAlumno(curso4, sc);
					escuela.mostrarCalificacionesDeAlumno(estudiante);
					break;
				case "5":    // Mostrar promedios de calificaciones de un curso
					if (cantidadCursos(escuela) == 0) {    // Si no hay cursos registrados, no se ejecuta
						break;
					}
					Curso curso5 = elegirCurso(escuela, sc);
					
					if (cantidadAlumnos(curso5) == 0) {    // Si no hay alumno registrados en este curso, tampoco se ejecuta
						break;
					}
					escuela.promedioCalificacionesDeCurso(curso5);
					break;
				case "6":    // Mostrar datos del colegio
					System.out.println(escuela);
					break;
				case "0":    // Cerrar
					System.out.println("Cerrando...");
					sc.close();
					encendido = false;
					break;
				default:
					break;
			}
		}
	}
	
	public static int cantidadCursos(Colegio escuela) {
		int cantidad = 0;    // Variable que guarda cantidad de cursos
		for (int i = 0; i < escuela.getCursos().length; i++) {    // Se revisa cada espacio del array donde se guardan los cursos
			if (escuela.getCursos()[i] != null) {
				cantidad++;    // Si el espacio actual tiene un curso, se le suma 1 a la cantidad
			}
		}
		if (cantidad == 0) {
			System.out.println("Se necesita al menos un curso para hacer este proceso."); // Si no hay cursos registrados, reportarlo
		}
		return cantidad;    // Devuelve la cantidad de cursos registrados en la base de datos de la escuela
	}
	
	public static Curso elegirCurso(Colegio escuela, Scanner sc) {
		Curso curso = null;
		Curso[] cursos = escuela.getCursos();
		if (cantidadCursos(escuela) == 1) {    // Si hay un solo curso, se elige automaticamente
			for (int i = 0; i < cursos.length; i++) {
				if (cursos[i] != null) {
					curso = cursos[i];
				}
			}
		}
		else if (cantidadCursos(escuela) > 1) {    // Si hay mas de un solo curso, se elige uno manualmente de una lista
			int idCurso;
			while (true) {
				System.out.println("Ingrese numero correspondiente al curso deseado:");
				for (int i = 0; i < cursos.length; i++) {
					if (cursos[i] == null) {
						continue;
					}
					else {
						System.out.println((i + 1) + " - " + cursos[i].getMateria());    // Se imprime el numero que se tiene que ingresar para cada curso y su materia
					}
				}
				System.out.println("Ingrese numero correspondiente al curso deseado:");
				idCurso = sc.nextInt();
				sc.nextLine();
				if ((idCurso < 1) || (idCurso > cursos.length)) {continue;}
				if (cursos[idCurso - 1] != null) {
					curso = cursos[idCurso - 1];    // Si el numero ingresado es entre 1 y la cantidad de cursos, y el numero ingresado representa un curso existente, se elige el curso correspondiente al numero ingresado
					break;
				}
			}
		}
		System.out.println("Curso '" + curso.getMateria() + "' elegido.");
		return curso;
	}

	public static int cantidadAlumnos(Curso curso) {
		int cantidad = 0;    // Variable que guarda cantidad de alumnos
		for (int i = 0; i < curso.getEstudiantes().length; i++) {    // Se revisa cada espacio del array donde se guardan los alumnos
			if (curso.getEstudiantes()[i] != null) {
				cantidad++;    // Si el espacio actual tiene un alumno, se le suma 1 a la cantidad
			}
		}
		if (cantidad == 0) {
			System.out.println("Se necesita al menos un alumno en este curso para hacer este proceso."); // Si no hay alumnos registrados en este curso, reportarlo
		}
		return cantidad;    // Devuelve la cantidad de alumnos registrados en este curso en la base de datos de la escuela
	}
	
	public static Alumno elegirAlumno(Curso curso, Scanner sc) {
		Alumno estudiante = null;
		Alumno[] estudiantes = curso.getEstudiantes();
		if (cantidadAlumnos(curso) == 1) {    // Si hay un solo alumno en el curso, se elige automaticamente
			for (int i = 0; i < estudiantes.length; i++) {
				if (estudiantes[i] != null) {
					estudiante = estudiantes[i];
				}
			}
		}
		else if (cantidadAlumnos(curso) > 1) {    // Si hay mas de un solo alumno en este curso, se elige uno manualmente de una lista
			int idAlumno;
			while (true) {
				System.out.println("Ingrese numero correspondiente al alumno deseado:");
				for (int i = 0; i < estudiantes.length; i++) {
					if (estudiantes[i] == null) {
						continue;
					}
					else {
						System.out.println((i + 1) + " - " + estudiantes[i].getNombre());    // Se imprime el numero que se tiene que ingresar para cada alumno y su nombre
					}
				}
				System.out.println("Ingrese numero correspondiente al alumno deseado:");
				idAlumno = sc.nextInt();
				sc.nextLine();
				if ((idAlumno < 1) || (idAlumno > estudiantes.length)) {continue;}
				if (estudiantes[idAlumno - 1] != null) {
					estudiante = estudiantes[idAlumno - 1];    // Si el numero ingresado es entre 1 y la cantidad de cursos, y el numero ingresado representa un curso existente, se elige el curso correspondiente al numero ingresado
					break;
				}
			}
		}
		System.out.println("Alumno '" + estudiante.getNombre() + "' elegido.");
		return estudiante;
	}
	
}
