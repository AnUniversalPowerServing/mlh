package mlh.geocer.db.repo;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.List;

import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.jdbc.core.RowMapper;
import org.springframework.stereotype.Repository;

import mlh.geocer.core.query.APIQueries;

@Repository
public class DBQueriesRepo {

	private JdbcTemplate jdbcTemplate;  
	  
	public DBQueriesRepo(JdbcTemplate jdbcTemplate){
		this.jdbcTemplate = jdbcTemplate;
	}
	
	public void getListOfCountries() {
		String countriesQuery = new APIQueries().getListOfCountries();
		List<String> countries = (List<String>)jdbcTemplate.query(countriesQuery,new RowMapper<String>(){  
		    @Override  
		    public String mapRow(ResultSet rs, int rownumber) throws SQLException {  
		    	return rs.getString("eng_countryName");
		    }
		});
	
	}
}
