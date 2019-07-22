package mlh.geocer.db.test;

import java.io.BufferedReader;
import java.io.IOException;
import java.io.InputStreamReader;
import java.net.MalformedURLException;
import java.net.URL;

public class JSONReader {

  public String readAFile(String fileName) {
	StringBuilder sb = new StringBuilder();
    try {
	  URL url = new URL(fileName);
	  BufferedReader read = new BufferedReader(new InputStreamReader(url.openStream()));
	 
	  for (String i;(i = read.readLine()) != null;) {
          sb.append(i);
	  }
      read.close();
    
    } catch (MalformedURLException e) {
		// TODO Auto-generated catch block
		e.printStackTrace();
	} catch (IOException e) {
		// TODO Auto-generated catch block
		e.printStackTrace();
	}
    return sb.toString();
  }
  
  public static void main(String args[]) {
   String CONFIG_FILE = "http://kalyanaveena.com/other/constitutionOfIndiaConfig.json";
   JSONReader jSONReader = new JSONReader();
   jSONReader.readAFile(CONFIG_FILE);
  }

}
