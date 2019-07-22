package mlh.geocer.db.util;

import javax.servlet.http.HttpServletRequest;

import org.springframework.stereotype.Component;
import org.springframework.ui.Model;

@Component
public class Utility {
 
 public Model modelConfiguration(Model model, HttpServletRequest request){
	 
	 StringBuilder urlBuilder = new StringBuilder();
	    urlBuilder.append(request.getScheme()).append("://");
		urlBuilder.append(request.getServerName()).append(":");
		urlBuilder.append(request.getServerPort()).append("/");
		urlBuilder.append(request.getContextPath());
	 model.addAttribute("PROJECT_URL",urlBuilder.toString());
	return model; 
 }
 
}
