package mlh.geocer.api.config;

import org.springframework.beans.factory.annotation.Value;
import org.springframework.context.annotation.Bean;
import org.springframework.context.annotation.Configuration;
import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.jdbc.datasource.DriverManagerDataSource;

@Configuration
public class Database {
	
	@Value("${spring.datasource.driverClassName}")
	private String driver;
	  
	@Value("${spring.datasource.url}")
	private String url;
	  
	@Value("${spring.datasource.username}")
	private String username;
	  
	@Value("${spring.datasource.password}")
	private String password;
	  
	
	@Bean("mysqlJdbcTemplate")
	public JdbcTemplate getDataSource() {
	 JdbcTemplate template = new JdbcTemplate();
     DriverManagerDataSource dataSource = new DriverManagerDataSource();
		 dataSource.setDriverClassName(driver);
		 dataSource.setUrl(url);
		 dataSource.setUsername(username);
		 dataSource.setPassword(password);
	 template.setDataSource(dataSource);
	 return template;
   }
}
