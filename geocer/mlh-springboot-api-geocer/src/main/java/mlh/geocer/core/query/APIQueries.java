package mlh.geocer.core.query;

public class APIQueries {
	
  public String getListOfCountries() {
   String sql = "SELECT eng_countryName FROM countries ORDER BY eng_countryName ASC; ";
   return sql;
  }
  
  public String getCountryTimezones(String country) {
	StringBuilder sql = new StringBuilder();
	 sql.append("SELECT timezones.timezone ");
     sql.append("FROM timezones WHERE timezones.country=(SELECT countries.country_Id ");
     sql.append("FROM countries WHERE countries.eng_countryName='").append(country).append("');");
	return sql.toString();  
  }
  
  public String getCountryInformation(String country) {
	StringBuilder sql = new StringBuilder();
	 sql.append("SELECT countries.phonecode, countries.currency, ");
	 sql.append("(SELECT count(*) FROM states WHERE stateType='STATE') As noOfStates, ");
	 sql.append("(SELECT count(*) FROM states WHERE stateType='UNION_TERRITORY') As noOfUnionTerritories ");
	 sql.append("FROM countries WHERE countries.eng_countryName='").append(country).append("';");
	return sql.toString();   
  }
  
  public String getListOfStates(String country, String stateType) {
	StringBuilder sql = new StringBuilder();
	 sql.append("SELECT eng_stateName FROM states WHERE stateType='").append(stateType).append("';");
    return sql.toString();    
  }
  
  public String getParliamentaryConstituency(String country, String state) {
	StringBuilder sql = new StringBuilder(); 
	 sql.append("SELECT locations.eng_locationName FROM locations, states, countries ");
	 sql.append("WHERE locations.state_Id = states.state_Id AND states.country_Id = countries.country_Id ");
	 sql.append("AND states.eng_stateName='").append(state).append("' AND countries.eng_countryName='").append(country).append("' AND locations.electionType='PARLIAMENT';");
	return sql.toString();     
  }
}
