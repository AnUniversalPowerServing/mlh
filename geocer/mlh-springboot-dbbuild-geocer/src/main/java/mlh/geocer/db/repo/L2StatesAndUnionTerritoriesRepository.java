package mlh.geocer.db.repo;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.LinkedHashMap;

import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.jdbc.core.RowMapper;
import org.springframework.stereotype.Repository;

import com.google.gson.Gson;
import com.google.gson.GsonBuilder;

import mlh.geocer.db.pojo.L2StatesAndUnionTerritoriesPojo;
import mlh.geocer.db.query.DBQueries;
import mlh.geocer.db.query.L2StatesAndUnionTerritoriesQuery;
import mlh.geocer.db.util.FileManager;

@Repository
public class L2StatesAndUnionTerritoriesRepository {

	private JdbcTemplate jdbcTemplate;  
	  
	public L2StatesAndUnionTerritoriesRepository(JdbcTemplate jdbcTemplate){
		this.jdbcTemplate = jdbcTemplate;
	}

	 public void getListOfStates() {
		    
	    	String statesQuery = new L2StatesAndUnionTerritoriesQuery().getListOfStatesAndIds();
	    	LinkedHashMap<String, L2StatesAndUnionTerritoriesPojo> hmap = new LinkedHashMap<String, L2StatesAndUnionTerritoriesPojo>();
			jdbcTemplate.query(statesQuery,new RowMapper<Void>(){  
			    @Override  
			    public Void mapRow(ResultSet rs, int rownumber) throws SQLException {
			    	String state_Id = (String) rs.getString("state_Id");
			    	String stateName = (String) rs.getString("eng_stateName");
			    	String stateCapital = (String) rs.getString("eng_capital");
			    	String countryName = (String) rs.getString("eng_countryName");
			        String statePrevLevel = (String) rs.getString("statePrevLevel");
			    	String stateCurLevel = (String) rs.getString("stateCurLevel");
			    	String stateNextLevel = (String) rs.getString("stateNextLevel");
			    	
			    	L2StatesAndUnionTerritoriesPojo states = new L2StatesAndUnionTerritoriesPojo();
			    	states.setState_Id(state_Id);
			    	states.setStateName(stateName);
			    	states.setStateCapital(stateCapital);
			    	states.setCountryName(countryName);
			    	states.setPreviousLevel(statePrevLevel);
			    	states.setCurrentLevel(stateCurLevel);
			    	states.setNextLevel(stateNextLevel);

			    	hmap.put(stateName, states);
			    	return null;
			    }
			});
			
			Gson gson = new GsonBuilder().setPrettyPrinting().create();
			FileManager fileManager = new FileManager();
			fileManager.jsonFileBuilder("States.json", gson.toJson(hmap));
	    }

}
