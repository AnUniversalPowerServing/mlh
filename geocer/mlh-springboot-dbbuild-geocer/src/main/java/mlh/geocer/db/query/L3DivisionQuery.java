package mlh.geocer.db.query;

public class L3DivisionQuery {

	public String getListOfDivisionsAndIds() {
		StringBuilder sb = new StringBuilder();
		sb.append("SELECT divisions.division_Id, divisions.state_Id, countries.country_Id, divisions.divisionName, divisions.hqDistrict, ");
		sb.append("divisions.divisionPrevLevel, divisions.divisionCurLevel, divisions.divisionNextLevel, ");
		sb.append("states.eng_stateName, countries.eng_countryName ");
		sb.append("FROM divisions, states, countries WHERE ");
		sb.append("countries.country_Id=states.country_Id AND states.state_Id=divisions.state_Id ");
		sb.append("ORDER BY eng_stateName ASC;");
	    return sb.toString();
	}
	
}
