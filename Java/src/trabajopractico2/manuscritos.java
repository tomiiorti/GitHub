package trabajopractico2;

public class manuscritos {
	private String nombre;
	private int estado;
	private int nPedido;
	private int codigo;

	public manuscritos(String nombre, int estado, int nPedido) {
		this.nombre = nombre;
		this.estado = estado;
		this.nPedido = nPedido;
		this.nPedido = codigo;
		
	}
	public String getNombre() {
		return nombre;
	}

	public void setNombre(String nombre) {
		this.nombre = nombre;
	}

	public int getEstado() {
		return estado;
	}

	public void setEstado(int estado) {
		this.estado = estado;
	}

	public int getNPedido() {
		return nPedido;
	}

	public void setNPedido(int nPedido) {
		this.nPedido = nPedido;
	}
	public int getCodigo() {
		return codigo;
	}

	public void setCodigo(int codigo) {
		this.codigo = codigo;
	}
}
