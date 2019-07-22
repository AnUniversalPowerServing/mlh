package mlh.geocer.core.query;

public class DBQueries {
	
  public String getListOfCountriesAndIds() {
	StringBuilder sb = new StringBuilder();
	sb.append("SELECT country_Id, eng_countryName FROM countries;");
	return sb.toString();
  }
  
  public void getListOfStatesAndIds() {
	  
  }
}
