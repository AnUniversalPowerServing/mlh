package mlh.geocer.db.controller;

import javax.servlet.http.HttpServletRequest;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

import mlh.geocer.db.util.Utility;

@Controller
public class UserInferfaceController {

@Autowired
private Utility utility;

  @RequestMapping(value="/", method=RequestMethod.GET)
  public String login(Model model,HttpServletRequest request) {
   model = utility.modelConfiguration(model, request);
   return "data_world.jsp";
  }
	
  /* JSON Files */
  @RequestMapping(value="/countries", method=RequestMethod.GET)
  public String countries(Model model,HttpServletRequest request) {
	model = utility.modelConfiguration(model, request);
    return "dbJson/Countries.json";
  }
	
	
}
