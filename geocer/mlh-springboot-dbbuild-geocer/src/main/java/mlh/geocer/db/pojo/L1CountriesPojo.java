package mlh.geocer.db.pojo;

import lombok.Data;

@Data
public class L1CountriesPojo {
 private String country_Id;
 private String countryName;
 private String countryCapital;
 private String phonecode;
 private String currency;
 private int noOfStates;
 private int noOfUnionTerritories;
 private String currentLevel;
 private String nextLevel;
}
