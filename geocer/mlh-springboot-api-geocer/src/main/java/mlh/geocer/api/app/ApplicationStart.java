package mlh.geocer.api.app;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.boot.CommandLineRunner;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.context.ApplicationContext;
import org.springframework.context.annotation.AnnotationConfigApplicationContext;
import org.springframework.context.annotation.ComponentScan;
import org.springframework.jdbc.core.JdbcTemplate;

import mlh.geocer.api.config.Database;
import mlh.geocer.api.repo.CountriesRepository;
import mlh.geocer.db.repo.DBQueriesRepo;

@SpringBootApplication
@ComponentScan(basePackages = {"anups.dun.mlh.geocer"})
public class ApplicationStart  implements CommandLineRunner {

 @Autowired
 private static JdbcTemplate mysqlJdbcTemplate;
  
  public static void main(String[] args) {
	SpringApplication.run(ApplicationStart.class, args);
	
	DBQueriesRepo dBQueriesRepo = new DBQueriesRepo(mysqlJdbcTemplate);
	dBQueriesRepo.getListOfCountries();
  }

  @Override
  public void run(String... args) throws Exception {
	
  }
  
}
