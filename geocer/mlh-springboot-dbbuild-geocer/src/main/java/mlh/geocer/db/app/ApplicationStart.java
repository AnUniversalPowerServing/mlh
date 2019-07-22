package mlh.geocer.db.app;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.boot.CommandLineRunner;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.annotation.ComponentScan;
import org.springframework.jdbc.core.JdbcTemplate;

import mlh.geocer.db.query.L2StatesAndUnionTerritoriesQuery;
import mlh.geocer.db.repo.DBQueriesRepo;
import mlh.geocer.db.repo.L1CountriesRepository;
import mlh.geocer.db.repo.L2StatesAndUnionTerritoriesRepository;
import mlh.geocer.db.repo.L3DivisionRepository;

@SpringBootApplication
@ComponentScan(basePackages = {"mlh.geocer"})
public class ApplicationStart  implements CommandLineRunner {

 @Autowired
 private JdbcTemplate mysqlJdbcTemplate;
  
  public static void main(String[] args) {
	SpringApplication.run(ApplicationStart.class, args);
  }

  @Override
  public void run(String... args) throws Exception {
	  L1CountriesRepository l1CountriesRepository = new L1CountriesRepository(mysqlJdbcTemplate);
	  L2StatesAndUnionTerritoriesRepository l2StatesAndUnionTerritoriesRepository = new L2StatesAndUnionTerritoriesRepository(mysqlJdbcTemplate);
	  L3DivisionRepository l3DivisionRepository = new L3DivisionRepository(mysqlJdbcTemplate);
	  l1CountriesRepository.getListOfCountries();
	  l2StatesAndUnionTerritoriesRepository.getListOfStates();
	  l3DivisionRepository.getListOfDivision();
  }
  
}
