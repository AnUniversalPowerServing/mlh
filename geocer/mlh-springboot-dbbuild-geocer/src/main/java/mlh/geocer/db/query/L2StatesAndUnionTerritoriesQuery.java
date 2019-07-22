package mlh.geocer.db.query;

public class L2StatesAndUnionTerritoriesQuery {

	public String getListOfStatesAndIds() {
		StringBuilder sb = new StringBuilder();
		sb.append("SELECT states.state_Id, states.eng_stateName, countries.eng_countryName, states.eng_capital, ");
		sb.append("states.statePrevLevel, states.stateCurLevel, states.stateNextLevel ");
		sb.append("FROM states, countries WHERE states.country_Id = countries.country_Id ");
		sb.append("ORDER BY eng_stateName ASC;");
		return sb.toString();
	  }
}
