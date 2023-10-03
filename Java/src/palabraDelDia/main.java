package palabraDelDia;

import java.io.*;
import java.util.*;

public class main {

    public static void main(String[] args) {
    	
    	Random random = new Random();
        Scanner sc = new Scanner(System.in);
        FileReader palabra = null;
        String palabraDelDia = null; // Declaración dentro del bloque try
        List<String> listaDePalabras = new ArrayList<>();

        try {
            palabra = new FileReader("C:/Users/tomas/OneDrive/Escritorio/GitHub/Java/src/palabraDelDia/destino.txt");
            BufferedReader buf = new BufferedReader(palabra);
            String linea;
            

            while ((linea = buf.readLine()) != null) {
                listaDePalabras.add(linea);
            }

            palabraDelDia = listaDePalabras.get(random.nextInt(listaDePalabras.size()));

        } catch (FileNotFoundException e) {
            e.printStackTrace();
        } catch (IOException e) {
            e.printStackTrace();
        }

        for (int i = 5; i >=1; i--) {
            System.out.println("Ingrese una palabra de 5 letras");
            System.out.println("Tiene " + i + " intentos");
            String entrada = sc.next();
            
            while (!listaDePalabras.contains(entrada)) {
            	System.out.println("La palabra ingresada no esta en el texto \n Ingrese nuevamente una palabra");
            	entrada = sc.next();	
            }
            /*while (entrada !=  ) {
            	
            	if (listaDePalabras.contains(entrada)) {
                    System.out.println("¡La palabra está en la lista!");
                    break; // Sale del bucle si la palabra es correcta
                } else {
                    System.out.println("Esa palabra no está en la lista. Inténtalo de nuevo.");
                }
            }
            
            if (palabraDelDia != null && palabraDelDia.equals(entrada)) {
                System.out.println("¡Adivinaste la palabra del día!");
                break; // Sale del bucle si la palabra es correcta
            } else {
                System.out.println("Esa no es la palabra del día. Inténtalo de nuevo.");
            }*/
        }
    }
}
	        /*
	      
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
			*/


	        

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