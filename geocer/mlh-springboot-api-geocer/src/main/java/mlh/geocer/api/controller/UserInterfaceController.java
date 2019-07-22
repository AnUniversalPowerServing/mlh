package mlh.geocer.api.controller;

import javax.servlet.http.HttpServletRequest;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

import mlh.geocer.api.util.Utility;

@Controller
public class UserInterfaceController {

 @Autowired
 private Utility utility;

 @RequestMapping(value="/", method=RequestMethod.GET)
 public String login(Model model,HttpServletRequest request) {
   model = utility.modelConfiguration(model, request);
   return "login";
 }
	
 @RequestMapping(value="geocer", method=RequestMethod.GET)
 public String locations(Model model,HttpServletRequest request) {
   model = utility.modelConfiguration(model, request);
   return "geocer";
 }
 
 @RequestMapping(value="geocer/countries", method=RequestMethod.GET)
 public String countries(Model model,HttpServletRequest request) {
   model = utility.modelConfiguration(model, request);
   return "geocer_countries";
 }
 
 @RequestMapping(value="geocer/states", method=RequestMethod.GET)
 public String states(Model model,HttpServletRequest request) {
   model = utility.modelConfiguration(model, request);
   return "geocer_states";
 }
 
 @RequestMapping(value="geocer/locality", method=RequestMethod.GET)
 public String locality(Model model,HttpServletRequest request) {
   model = utility.modelConfiguration(model, request);
   return "geocer_locality";
 }

}
