package TrabajoPractico1;

public class Maestro extends Persona {
	private String materia;
	private int salario;

	public Maestro(String nombre, int edad, String materia, int salario) {
		super(nombre, edad);
		this.materia = materia;
		this.salario = salario;
	}

	public String getMateria() {
		return materia;
	}
	public void setMateria(String materia) {
		this.materia = materia;
	}

	public int getSalario() {
		return salario;
	}
	public void setSalario(int salario) {
		this.salario = salario;
	}
	public String stringSalario() {
		String parteEntera = String.valueOf(Math.round(Math.floor(salario / 100)));
		String d = ("00".concat(String.valueOf(salario % 100)));
		String parteDecimal = d.substring(d.length() - 2);
		return("$" + parteEntera + "." + parteDecimal);
	}
	
	public String toString(int espacios) {
		String tab = "    ".repeat(espacios);
		return (tab + "Nombre: " + getNombre() + "\n" + tab + "Edad: " + getEdad() + "\n" +
				tab + "Materia: " + materia + "\n" + tab + "Salario: " + stringSalario());
	}

}
