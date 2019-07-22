package mlh.geocer.db.repo;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.LinkedHashMap;

import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.jdbc.core.RowMapper;
import org.springframework.stereotype.Repository;

import com.google.gson.Gson;
import com.google.gson.GsonBuilder;

import mlh.geocer.db.pojo.L1CountriesPojo;
import mlh.geocer.db.query.L1CountriesQuery;
import mlh.geocer.db.util.FileManager;

@Repository
public class L1CountriesRepository {
	
	private JdbcTemplate jdbcTemplate;  
	  
	public L1CountriesRepository(JdbcTemplate jdbcTemplate){
		this.jdbcTemplate = jdbcTemplate;
	}
	
	public void getListOfCountries() {
		L1CountriesQuery l1CountriesQuery = new L1CountriesQuery();
		String countriesQuery = l1CountriesQuery.getListOfCountriesAndIds();
		LinkedHashMap<String, L1CountriesPojo> hmap = new LinkedHashMap<String, L1CountriesPojo>();
		jdbcTemplate.query(countriesQuery,new RowMapper<Void>(){  
		    @Override  
		    public Void mapRow(ResultSet rs, int rownumber) throws SQLException {
		    	String country_Id = (String) rs.getString("country_Id");
		    	String countryName = (String) rs.getString("eng_countryName");
		    	String countryCapital = (String) rs.getString("eng_capital");
		    	String phonecode = (String) rs.getString("phonecode");
		    	String currency = (String) rs.getString("eng_currency");
		    	int noOfStates = rs.getInt("noOfStates");
		    	int noOfUnionTerritories = rs.getInt("noOfUnionTerritories");
		    	String currentLevel = (String) rs.getString("countryCurLevel");
		    	String nextLevel = (String) rs.getString("countryNextLevel");

		    	L1CountriesPojo countries = new L1CountriesPojo();
		    	 countries.setCountry_Id(country_Id);
		    	 countries.setCountryName(countryName);
		    	 countries.setCountryCapital(countryCapital);
		    	 countries.setPhonecode(phonecode);
		    	 countries.setCurrency(currency);
		    	 countries.setNoOfStates(noOfStates);
		    	 countries.setNoOfUnionTerritories(noOfUnionTerritories); 
		    	 countries.setCurrentLevel(currentLevel);
		    	 countries.setNextLevel(nextLevel);

		    	hmap.put(countryName, countries);
		    	return null;
		    }
		});
		
		Gson gson = new GsonBuilder().setPrettyPrinting().create();
		FileManager fileManager = new FileManager();
		fileManager.jsonFileBuilder("Countries.json", gson.toJson(hmap));
	}

}
