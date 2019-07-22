package mlh.geocer.api.pojo;

import java.util.HashMap;
import java.util.List;
import lombok.Data;

@Data
public class Countries {
 private String country_Id;
 private String countryName;
 private String phonecode;	
 private String currency;
 private String noOfStates;
 private String noOfUnionTerritories;
 private List<String> timezones;
 private List<String> states;
 private List<String> unionTerritories;
 private HashMap<String, Object> parliamentaryInfo;
}
