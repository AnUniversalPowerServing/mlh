package mlh.geocer.api.repo;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.HashMap;
import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.context.annotation.Bean;
import org.springframework.jdbc.core.BeanPropertyRowMapper;
import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.jdbc.core.RowMapper;
import org.springframework.stereotype.Component;
import org.springframework.stereotype.Repository;

import com.google.gson.Gson;
import com.google.gson.GsonBuilder;

import mlh.geocer.api.pojo.Countries;
import mlh.geocer.api.pojo.States;
import mlh.geocer.api.pojo.Timezones;
import mlh.geocer.core.query.APIQueries;

@Repository
public class CountriesRepository {

	private JdbcTemplate jdbcTemplate;  
	  
	public CountriesRepository(JdbcTemplate jdbcTemplate){
		this.jdbcTemplate = jdbcTemplate;
	}
	
	public List<String> getListOfCountries() {
		String countriesQuery = new APIQueries().getListOfCountries();
		List<String> countries = (List<String>)jdbcTemplate.query(countriesQuery,new RowMapper<String>(){  
		    @Override  
		    public String mapRow(ResultSet rs, int rownumber) throws SQLException {  
		    	return rs.getString("eng_countryName");
		    }
		});
	 return countries;
	}
	
	public String getCountryInformation(String country) {
	  APIQueries queries = new APIQueries();
	  /* Countries Information */
	  String countriesQuery = queries.getCountryInformation(country); 
	  Countries countries = (Countries) jdbcTemplate.queryForObject(countriesQuery,new RowMapper<Countries>(){  
	    @Override  
	    public Countries mapRow(ResultSet rs, int rownumber) throws SQLException {  
	      Countries countries = new Countries();  
	    	   countries.setPhonecode(rs.getString("phonecode"));
	    	   countries.setCurrency(rs.getString("currency"));
	    	   countries.setNoOfStates(rs.getString("noOfStates"));
	    	   countries.setNoOfUnionTerritories(rs.getString("noOfUnionTerritories"));
	      return countries;  
	    }
       });  
	  /* Country Timezone Information */
	  String timezoneQuery = queries.getCountryTimezones(country);
	  List<String> timezonesList = (List<String>) jdbcTemplate.query(timezoneQuery,new RowMapper<String>(){  
  	    @Override  
  	    public String mapRow(ResultSet rs, int rownumber) throws SQLException {  
  	    	return rs.getString("timezone");
  	    }
	  });
	  countries.setTimezones(timezonesList);
	  
	  /* Country State Information */
	  String statesQuery = queries.getListOfStates(country, "STATE");
	  List<String> statesList = (List<String>) jdbcTemplate.query(statesQuery,new RowMapper<String>(){  
	  	    @Override  
	  	    public String mapRow(ResultSet rs, int rownumber) throws SQLException {  
	  	    	return rs.getString("eng_stateName");
	  	    }
		  });
	  countries.setStates(statesList);
	  /* Country Union Territories Information */
	  String unionTerritoriesQuery = queries.getListOfStates(country, "UNION_TERRITORY");
	  List<String> unionTerritoriesList = (List<String>) jdbcTemplate.query(unionTerritoriesQuery,new RowMapper<String>(){  
	  	    @Override  
	  	    public String mapRow(ResultSet rs, int rownumber) throws SQLException { 
	  	    	return rs.getString("eng_stateName");
	  	    }
		  });
	  countries.setUnionTerritories(unionTerritoriesList);
	  
	  /* States Info */
	  HashMap<String, Object> parliamentaryInfo = new HashMap<String,Object>();
	  for(int index=0;index<statesList.size();index++) {
		String stateName =  statesList.get(index);
	    String statesInfoQuery = queries.getParliamentaryConstituency(country,stateName);

	    List<String> statesInfoList = (List<String>) jdbcTemplate.query(statesInfoQuery,new RowMapper<String>(){  
	  	    @Override  
	  	    public String mapRow(ResultSet rs, int rownumber) throws SQLException {  
	  	    	return rs.getString("eng_locationName");
	  	    }
		  });
	    HashMap<String,Object> parliament = new HashMap<String,Object>();
	    parliament.put("noOfconstituencies", statesInfoList.size());
	    parliament.put("constituencies", statesInfoList);
	    parliamentaryInfo.put(stateName,parliament);
	  }
	  countries.setParliamentaryInfo(parliamentaryInfo);
	  System.out.println(parliamentaryInfo);
	 // Gson gson = new GsonBuilder().setPrettyPrinting().create();
	  Gson gson = new Gson();
	  HashMap<String, Countries> hmap = new HashMap<String, Countries>();
	  		hmap.put(country, countries);		
	  return gson.toJson(hmap);	
	}


	
}
