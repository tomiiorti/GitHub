package trabajopractico2;

public class usuarios {

	private String nombre;
	private String usuario;
	private String contra;
	private String  rol; //Rol: Administrador(1) - Usuario(0)
	
	public usuarios(String nombre, String usuario, String contra, String rol) {
		
		this.nombre = nombre;
		this.usuario = usuario;
		this.contra = contra;
		this.rol = rol;
	}

	public String getNombre() {
		return nombre;
	}

	public void setNombre(String nombre) {
		this.nombre = nombre;
	}

	public String getUsuario() {
		return usuario;
	}

	public void setUsuario(String usuario) {
		this.usuario = usuario;
	}

	public String getContra() {
		return contra;
	}

	public void setContra(String contra) {
		this.contra = contra;
	}

	public String getRol() {
		return rol;
	}

	public void setRol(String rol) {
		this.rol = rol;
	}
	
}
