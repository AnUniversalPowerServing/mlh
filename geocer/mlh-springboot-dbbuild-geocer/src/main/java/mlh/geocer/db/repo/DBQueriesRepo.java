package mlh.geocer.db.repo;

import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.HashMap;
import java.util.LinkedHashMap;
import java.util.List;
import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.jdbc.core.RowMapper;
import org.springframework.stereotype.Repository;
import com.google.gson.Gson;
import com.google.gson.GsonBuilder;
import mlh.geocer.db.pojo.L1CountriesPojo;
import mlh.geocer.db.pojo.L2StatesAndUnionTerritoriesPojo;
import mlh.geocer.db.pojo.L3DivisionPojo;
import mlh.geocer.db.query.DBQueries;
import mlh.geocer.db.query.L1CountriesQuery;
import mlh.geocer.db.util.FileManager;

@Repository
public class DBQueriesRepo {
	
	private JdbcTemplate jdbcTemplate;  
	  
	public DBQueriesRepo(JdbcTemplate jdbcTemplate){
		this.jdbcTemplate = jdbcTemplate;
	}
	
	
   
    
}
