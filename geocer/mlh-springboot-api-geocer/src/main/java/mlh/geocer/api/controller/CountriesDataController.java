package mlh.geocer.api.controller;

import java.util.List;

import javax.servlet.http.HttpServletRequest;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RestController;

import com.google.gson.Gson;

import mlh.geocer.api.config.Database;
import mlh.geocer.api.pojo.Countries;
import mlh.geocer.api.repo.CountriesRepository;

@RestController
@RequestMapping(value="/data/countries")
public class CountriesDataController {
 
  @Autowired
  private Database database;
	
  @RequestMapping(value="/list", method=RequestMethod.POST, produces = { "application/json" })
  public String countriesList(HttpServletRequest request) {
	 JdbcTemplate jdbcTemplate = (JdbcTemplate) database.getDataSource();
	 List<String> countries = new CountriesRepository(jdbcTemplate).getListOfCountries();
     return new Gson().toJson(countries); 
  }
  
  @RequestMapping(value="/info/{country}", method=RequestMethod.GET, produces = { "application/xml" })
  public String countriesInformation(HttpServletRequest request,@PathVariable String country) {
	 JdbcTemplate jdbcTemplate = (JdbcTemplate) database.getDataSource();
	 String countries = new CountriesRepository(jdbcTemplate).getCountryInformation(country);
     return countries; 
  }
  
  
}
