package error_28_8;
import java.io.*;

public class main {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		int [] vector = new int [5];
		vector[0]= 20;
		vector[1]= 40;
		vector[2]= 60;
		try {
			vector[5] = 100;
		} catch (
			ArrayIndexOutOfBoundsException e) {
			System.out.println("La vaca lola");
		} 
		BufferedReader reader=null;
		try {
			reader = new BufferedReader (new FileReader("arc.txt"));
		} catch(
			IOException e) {
			System.out.println("Error al abrir el archivo " + e.getMessage());
		}
			
		vector[3]= 80;
		vector[4]= 100;
		System.out.println(vector[3]);		
			
	}

}
