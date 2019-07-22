package mlh.geocer.db.pojo;

import lombok.Data;

@Data
public class L3DivisionPojo {
 private String division_Id;
 private String state_Id;
 private String country_Id;
 private String divisionName;
 private String districtHeadQuarters;
 private String stateName;
 private String countryName;
 private String divisionPrevLevel;
 private String divisionCurLevel;
 private String divisionNextLevel;
}