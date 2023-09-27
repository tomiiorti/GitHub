package palabraDelDia;

import java.io.*;
import java.util.*;

public class main {

    public static void main(String[] args) {
    	
    	Scanner sc = new Scanner (System.in);
    	
    	
        FiltrarPalabras nuevo = new FiltrarPalabras();
        nuevo.filtro();
        
        //Leer5Palabras leyendo = new Leer5Palabras();
        //leyendo.leer();
        
        
    	for (int i=0; i<=6; i++) {
    		
    		System.out.println("Ingrese una palabra de 5 letras");
        	String entrada = sc.next();
    		
	        while (entrada.length() != 5) {
	        	
	        	System.out.println("Tiene que ingresar una palabra con 5 letras nada mas");
	        	entrada = sc.next();
	        }
	        
	        
	        
	        FileReader palabras;
			try {
				
				palabras = new FileReader("C:/Users/tomas/OneDrive/Escritorio/GitHub/Java/src/palabraDelDia/destino.txt");
				BufferedReader mibuffer = new BufferedReader(palabras);
		        String linea;
	            while ((linea = mibuffer.readLine()) != null) {
	            	
	                String[] palabrasLinea = linea.split("\\s+");
	                for (String palabra : palabrasLinea) {
	                	
	                    if (palabra.equals(entrada)) {

	                    	System.out.println("Bien echo muchacho");
	                    		                    	
	                    } else {
	                    	System.out.println("Mal echo");
	                    	System.out.println(palabra);
	                    	System.out.println(entrada);
	                    }
	                }
	                
	            }
			} catch (IOException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
    	}
    }
}

class FiltrarPalabras {

    public void filtro() {
        FileReader palabras;
        FileWriter destino = null;

        try {
            palabras = new FileReader("C:/Users/tomas/OneDrive/Escritorio/GitHub/Java/src/palabraDelDia/palabras.txt");

            destino = new FileWriter("C:/Users/tomas/OneDrive/Escritorio/GitHub/Java/src/palabraDelDia/destino.txt");

            BufferedReader mibuffer = new BufferedReader(palabras);

            String linea;

            while ((linea = mibuffer.readLine()) != null) {
                String[] palabrasLinea = linea.split("\\s+");

                for (String palabra : palabrasLinea) {
                    if (palabra.length() == 5) {
                        destino.write(palabra);
                        destino.write("\n");
                    }
                }
                
            }
        } catch (IOException e) {
            e.printStackTrace();
        } finally {
            if (destino != null) {
                try {
                    destino.close();
                } catch (IOException e) {
                    e.printStackTrace();
                }
            }
        }
    }
}

class Leer5Palabras{
	
	public void leer() {
		
		FileReader palabras;
		
		try {
			
			palabras = new FileReader("C:/Users/tomas/OneDrive/Escritorio/GitHub/Java/src/palabraDelDia/destino.txt");
			BufferedReader mibuffer = new BufferedReader(palabras);
      		} catch (FileNotFoundException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
	}
}