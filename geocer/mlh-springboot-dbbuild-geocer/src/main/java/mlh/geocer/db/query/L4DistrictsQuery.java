package mlh.geocer.db.query;

public class L4DistrictsQuery {

	public String insert_districtData(String district_Id, String districtName, String headquarters, String desc, 
			String districtPrevLevel, String districtNextLevel) {
	  StringBuilder sb = new StringBuilder();
	  sb.append("INSERT INTO districts(district_Id, districtName, headquarters, desc, districtPrevLevel, districtCurLevel, districtNextLevel)");
	  sb.append("VALUES ('").append(district_Id).append("','").append(districtName).append("','").append(headquarters).append("','");
	  sb.append(desc).append("','").append(districtPrevLevel).append("','DISTRICT','").append(districtNextLevel).append("');");
	  return sb.toString();
	}
	
	public String insert_districtsMapDivision(String divisionMapId, String district_Id, String division_Id) {
	  StringBuilder sb = new StringBuilder();
	  sb.append("INSERT INTO districts_maps_division(divisionMapId, district_Id, division_Id) ");
	  sb.append("VALUES ('").append(divisionMapId).append("','").append(district_Id).append("','").append(division_Id).append("');");
	  return sb.toString();
	}
	
	public String insert_districtsMapState(String stateMapId, String district_Id, String state_Id) {
	  StringBuilder sb = new StringBuilder();
	  sb.append("INSERT INTO districts_map_state(stateMapId, district_Id, state_Id) ");
	  sb.append("VALUES ('").append(stateMapId).append("','").append(district_Id).append("','").append(state_Id).append("');");
	  return sb.toString();
	}
	
	

}
