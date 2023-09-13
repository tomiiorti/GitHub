package herencia_29_5;

public class persona {
	private String nombre;
	private String apellido;
	private int anio_nac;
	private int dni;
	public persona(String nombre, String apellido, int anio_nac, int dni) {
		this.nombre=nombre;
		this.apellido=apellido;
		this.anio_nac=anio_nac;
		this.dni=dni;
	}
	public String get_datos() {
		return("Nombre: " + nombre +
				" Apellido: " + apellido);
	}
	
	
}

