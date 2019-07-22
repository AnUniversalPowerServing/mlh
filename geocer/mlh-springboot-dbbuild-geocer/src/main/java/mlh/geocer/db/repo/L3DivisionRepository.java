package mlh.geocer.db.repo;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.LinkedHashMap;

import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.jdbc.core.RowMapper;
import org.springframework.stereotype.Repository;

import com.google.gson.Gson;
import com.google.gson.GsonBuilder;

import mlh.geocer.db.pojo.L3DivisionPojo;
import mlh.geocer.db.query.DBQueries;
import mlh.geocer.db.query.L3DivisionQuery;
import mlh.geocer.db.util.FileManager;

@Repository
public class L3DivisionRepository {

	private JdbcTemplate jdbcTemplate;  
	  
	public L3DivisionRepository(JdbcTemplate jdbcTemplate){
		this.jdbcTemplate = jdbcTemplate;
	}

	public void getListOfDivision() {
	      String divisionQuery = new L3DivisionQuery().getListOfDivisionsAndIds();
	      LinkedHashMap<String, L3DivisionPojo> hmap = new LinkedHashMap<String, L3DivisionPojo>();
	      jdbcTemplate.query(divisionQuery,new RowMapper<Void>(){  
			    @Override  
			    public Void mapRow(ResultSet rs, int rownumber) throws SQLException {
			    	String division_Id = (String) rs.getString("division_Id");
			    	String state_Id = (String) rs.getString("state_Id");
			    	String country_Id = (String) rs.getString("country_Id");
			    	String divisionName = (String) rs.getString("divisionName");
			    	String districtHeadQuarters = (String) rs.getString("hqDistrict");
			    	String stateName = (String) rs.getString("eng_stateName");
			    	String countryName = (String) rs.getString("eng_countryName");
			    	String divisionPrevLevel = (String) rs.getString("divisionPrevLevel");
			        String divisionCurLevel = (String) rs.getString("divisionCurLevel");
			    	String divisionNextLevel = (String) rs.getString("divisionNextLevel");
			    	
			    	L3DivisionPojo division = new L3DivisionPojo();
			    	division.setDivision_Id(division_Id);
			    	division.setState_Id(state_Id);
			    	division.setCountry_Id(country_Id);
			    	division.setDivisionName(divisionName);
			    	division.setDistrictHeadQuarters(districtHeadQuarters);
			    	division.setStateName(stateName);
			    	division.setCountryName(countryName);
			    	division.setDivisionPrevLevel(divisionPrevLevel);
			    	division.setDivisionCurLevel(divisionCurLevel);
			    	division.setDivisionNextLevel(divisionNextLevel);
			    	hmap.put(divisionName, division);
			    	return null;
			    }
			});
	        Gson gson = new GsonBuilder().setPrettyPrinting().create();
			FileManager fileManager = new FileManager();
			fileManager.jsonFileBuilder("Division.json", gson.toJson(hmap));
	    }
}
