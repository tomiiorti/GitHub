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
        char[] palabraOculta = new char[5];
        char[] entradaArray = new char[5];
        char[] palabraDelDiaArray = new char [5];
        boolean salio = false;
        
        try {
            palabra = new FileReader("C:/Users/tomas/OneDrive/Escritorio/GitHub/Java/src/palabraDelDia/destino.txt");
            BufferedReader buf = new BufferedReader(palabra);
            String linea;
            

            while ((linea = buf.readLine()) != null) {
                listaDePalabras.add(linea);
            }

            palabraDelDia = listaDePalabras.get(random.nextInt(listaDePalabras.size()));
        } catch (IOException e) {
            e.printStackTrace();
        }

        for (int i = 6; i >=1; i--) {
        	for (int k = 0; k < 5; k++) {
                palabraOculta[k] = '_';
            }
        	System.out.println("La palabra era: " + palabraDelDia);
            System.out.println("Ingrese una palabra de 5 letras");
            System.out.print("Tiene " + i + " intentos:");
            String entrada = sc.next();
            
            while (!listaDePalabras.contains(entrada)) {
            	
            	System.out.print("La palabra ingresada no esta en el texto o no tiene 5 letras. \nIngrese nuevamente una palabra: ");
            	entrada = sc.next();	
            }
            if (palabraDelDia != null && palabraDelDia.equals(entrada)) {
            	
                System.out.println("Adivinaste la palabra del dia! \nSos maquina");
                salio = true;
                break; // Sale del bucle si la palabra es correcta
                
            } else {
            	entradaArray = entrada.toCharArray();
            	palabraDelDiaArray = palabraDelDia.toCharArray();
            	for (int j = 0; j < palabraDelDia.length(); j++) {
            		
            		char letraSecreta = palabraDelDia.charAt(j);
            		char letraIngresada = entrada.charAt(j);
            		if (letraSecreta == letraIngresada) {
            			
            			palabraOculta[j] = Character.toUpperCase(letraIngresada);
            			entradaArray[j] = '_';
            			palabraDelDiaArray[j] = '_';
            		}
            	}
            	for (int j = 0 ; j < palabraDelDia.length(); j++) {
            		char letraIngresada = entrada.charAt(j);
                    for (int k = 0; k < 5; k++) {
                        if (palabraDelDiaArray[k] == letraIngresada) {
                            palabraDelDiaArray[k] = '_';
                            entradaArray[j] = '_';
                            palabraOculta[j] = Character.toLowerCase(letraIngresada);
                            break;
                        }
                    }
            	}
                String palabraOcultaStr = new String(palabraOculta);
            	System.out.println("Palabra ingresada :" + entrada);
            	System.out.println("Quedo: " + palabraOcultaStr);
            	System.out.println("_________________________");
            }
        }
        if (salio == false) {
        	System.out.println("Mal ahi mirrey, no se te dio, la palabra era: " + palabraDelDia);
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