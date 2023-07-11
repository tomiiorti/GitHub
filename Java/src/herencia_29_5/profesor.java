package herencia_29_5;
//atributo materia sueldo
public class profesor extends persona {
	private int matricula;
	private double sueldo;
	public profesor(int matricula, double sueldo) {
		super("Gaston","Barrionuevo",1991,20898898);
		this.matricula=matricula;
		this.sueldo=sueldo;
	}
	public String get_datos_profe() {
		System.out.println(super.get_datos());
		return("Matricula: " + matricula + " Sueldo: " + sueldo);
	}

}
