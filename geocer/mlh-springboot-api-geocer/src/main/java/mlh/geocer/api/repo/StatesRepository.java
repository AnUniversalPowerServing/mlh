package mlh.geocer.api.repo;

import java.util.List;

import org.springframework.jdbc.core.BeanPropertyRowMapper;
import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.stereotype.Repository;

import mlh.geocer.api.pojo.States;

@Repository
public class StatesRepository {

	private JdbcTemplate jdbcTemplate;  
	  
	public StatesRepository(JdbcTemplate jdbcTemplate){
		this.jdbcTemplate = jdbcTemplate;
	}
	
	public List<States> getListOfStates(String countryName) {
	 StringBuilder sql = new StringBuilder();
	   sql.append("SELECT * FROM states WHERE country_Id=");
	   sql.append("(SELECT country_Id FROM countries WHERE eng_countryName='").append(countryName).append("') ");	
	   sql.append("ORDER BY eng_stateName ASC");
	 List<States> states = (List<States>)jdbcTemplate.query(sql.toString(), new BeanPropertyRowMapper<States>(States.class));
	 return states;
	}
}
