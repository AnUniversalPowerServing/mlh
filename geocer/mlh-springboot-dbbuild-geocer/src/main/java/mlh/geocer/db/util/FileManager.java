package mlh.geocer.db.util;

import java.io.BufferedReader;
import java.io.File;
import java.io.FileReader;
import java.io.FileWriter;
import java.io.IOException;

public class FileManager {

	public String packageBuilder(String packageName) {
	  StringBuilder packagePath = new StringBuilder(BusinessConstants.JAVA_SOURCE_FOLDER);
	  for(String packageFolder : packageName.split("\\.")) {
		packagePath.append("\\").append(packageFolder);
		File file = new File(packagePath.toString());
		if(!file.exists() && !file.isDirectory()) {
		  file.mkdir();
		}
	  }
	  return packagePath.toString();
	}
	
	public String readDataFromAFile(String fileWithPath) {
		BufferedReader br = null;
		StringBuilder sb = new StringBuilder();
		try {
              br = new BufferedReader(new FileReader(new File(fileWithPath)));
    		  for(String readLine = "";(readLine = br.readLine()) != null;) {
    			sb.append(readLine);
			  }
		} catch(Exception e) {
			e.printStackTrace();
		}
	  return sb.toString();
	}
	
	public void jsonFileBuilder(String fileName, String content) {
	 try {
		FileWriter fileWriter = new FileWriter(BusinessConstants.WEBAPP_PAGES_FOLDER+"\\"+BusinessConstants.DBJSONFOLDER+"\\"+fileName);
		fileWriter.append(content);
		fileWriter.close();
	} catch (IOException e) {
		// TODO Auto-generated catch block
		e.printStackTrace();
	}
	}
	
}
