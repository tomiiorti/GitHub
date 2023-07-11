package herencia_29_5;

public class estudiante extends persona{
	private int matricula;
	private int anio_ing;
	private double porc_car;
	
	public estudiante(int matricula, int anio_ing) {
		super("Tomas", "Orti", 1999, 41798319);
		this.matricula=matricula;
		this.anio_ing=anio_ing;
		porc_car=0;
	}
	public String get_datos_est(){
		System.out.println(super.get_datos());
		return ("Matricula: " + matricula +	" Año de Ingreso: " + anio_ing);
	}
}