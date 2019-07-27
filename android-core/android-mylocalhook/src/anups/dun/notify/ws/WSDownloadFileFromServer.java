package anups.dun.notify.ws;

import java.io.BufferedInputStream;
import java.io.File;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.InputStream;
import java.io.OutputStream;
import java.net.HttpURLConnection;
import java.net.URL;
import java.net.URLConnection;
import java.text.DecimalFormat;

import android.content.Context;
import android.os.AsyncTask;
import anups.dun.app.AndroidWebScreen;
import anups.dun.constants.BusinessConstants;
import anups.dun.util.AndroidLogger;

public class WSDownloadFileFromServer extends AsyncTask<String, String, String> {
 org.apache.log4j.Logger logger = AndroidLogger.getLogger(WSDownloadFileFromServer.class);
 
 private Context context;
 private int progressBar;
 
 public WSDownloadFileFromServer(Context context){ this.context=context; }
	
 public int getProgressBar(){
  return this.progressBar;
 }
 
 @Override
 protected String doInBackground(String... params) {
  String downloadFromURL = params[0];
  String downloadFromFile = params[1];
  String downloadToPath = params[2];
  try {
         // String root = Environment.getExternalStorageDirectory().toString();
	     String toRootPath = BusinessConstants.PROJECTSTORAGEFOLDER+File.separator+downloadToPath;
          String toRoot = toRootPath+downloadFromFile;
          String fromRoot = downloadFromURL+downloadFromFile;
          URL url = new URL(fromRoot);

          URLConnection urlConn = url.openConnection();

          if (!(urlConn instanceof HttpURLConnection)) {
        	  logger.info("Http URL ");
          }
 			
          HttpURLConnection httpConn = (HttpURLConnection) urlConn;
          httpConn.setAllowUserInteraction(false);
          httpConn.setInstanceFollowRedirects(true);
          httpConn.setRequestMethod("GET");
          httpConn.setDoOutput(true);
          httpConn.connect();
          // getting file length
          float lengthOfFile = httpConn.getContentLength();
          logger.info("fromRoot: "+fromRoot);
          logger.info("toRoot: "+toRoot);
          logger.info("lengthOfFile: "+lengthOfFile);
          
          // input stream to read file - with 8k buffer
          InputStream input = new BufferedInputStream(url.openStream(),8192);
          FileOutputStream output = new FileOutputStream(toRoot, true);
         
          InputStream in = httpConn.getInputStream();
          byte[] buffer = new byte[1024];
          int len1 = 0;
          float progressCount = 0;
          while ((len1 = in.read(buffer)) > 0) {
              output.write(buffer, 0, len1);
              progressCount = progressCount+len1;
              float score = (1-((lengthOfFile-progressCount)/lengthOfFile))*100;
              progressBar = Math.round(score);
          }
          output.close();
          input.close();
  }
  catch(Exception e){ logger.error("Exception: "+e.getMessage()); }
  return null;
 }

 /**
  * After completing background task
  * **/
 @Override
 protected void onPostExecute(String result) {
	 logger.info("Downloaded");
 }

}
