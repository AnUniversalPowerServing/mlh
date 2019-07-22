package mlh.geocer.db.query;

public class L1CountriesQuery {

  public String getListOfCountriesAndIds() {
    StringBuilder sb = new StringBuilder();
    sb.append("SELECT countries.country_Id, countries.eng_countryName, countries.eng_capital, countries.phonecode, countries.eng_currency, ");
    sb.append("(SELECT count(*) FROM states WHERE stateCurLevel='STATE' AND states.country_Id=countries.country_Id) As noOfStates, ");
	sb.append("(SELECT count(*) FROM states WHERE stateCurLevel='UNION_TERRITORY' AND states.country_Id=countries.country_Id) As noOfUnionTerritories, ");
	sb.append("countries.countryCurLevel, countries.countryNextLevel FROM countries ORDER BY country_Id ASC;");
	return sb.toString();
  }
  
}
