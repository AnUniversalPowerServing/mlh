package mlh.geocer.db.test;

import java.util.Random;

public class DivisionBuilder {

	private static String ARUNACHALPRADESH_STATEID = "S5869683";
	
	private static String ASSAM_STATEID = "S4533148";
	
	private static String BIHAR_STATEID = "S6489800";
	
	private static String CHATTISGARH_STATEID = "S1292588";
	
	private static String HARYANA_STATEID = "S6449652";
	
	private static String HIMACHALPRADESH_STATEID = "S4138726";
	
	private static String JAMMUANDKASHMIR_STATEID = "S7664387";
	
	private static String JHARKHAND_STATEID = "S1267089";
	
	private static String KARNATAKA_STATEID = "S7156032";
	
	private static String MADHYAPRADESH_STATEID = "S1278754";
	
	private static String MAHARASTHRA_STATEID = "S1344129";
	
	private static String MEGHALAYA_STATEID = "S4778917";
	
	private static String NAGALAND_STATEID = "S9598253";
	
	private static String ODISHA_STATEID = "S9697265";
	
	private static String PUNJAB_STATEID = "S6461859";
	
	private static String RAJASTHAN_STATEID = "S9219292";
	
	private static String UTTARPRADESH_STATEID = "S3002387";
	
	private static String UTTARKHAND_STATEID = "S9526638";
	
	private static String WESTBENGAL_STATEID = "S2275661";
	
	private static String DELHI_STATEID = "S4385850";
	
	public void division_queryBuilder(String state_Id, String divisionName, String hqDistrict) {
      Random rand = new Random(); 
      StringBuilder division_Id = new StringBuilder("DIV");
      for(int i=0;i<5;i++) {
    	  division_Id.append(rand.nextInt(9));
      }
      String headedBy = "DIVI-COMSNR";
      String divisionUpperLevel = "STATES_UNIONTERRITORIES";
      String divisionNextLevel = "DISTRICTS";
      
	  StringBuilder sb = new StringBuilder();
	  sb.append("INSERT INTO divisions(division_Id, state_Id, divisionName, hqDistrict, headedBy, divisionUpperLevel, divisionNextLevel)");
	  sb.append("VALUES ('").append(division_Id).append("','").append(state_Id).append("','").append(divisionName);
	  sb.append("','").append(hqDistrict).append("','").append(headedBy).append("','").append(divisionUpperLevel);
	  sb.append("','").append(divisionNextLevel).append("');");
	  
	  System.out.println(sb.toString());
	}
	
	public static void main(String args[]) {
		DivisionBuilder testClass = new DivisionBuilder();
		/* Arunachal Pradesh ::: Start */
		testClass.division_queryBuilder(ARUNACHALPRADESH_STATEID,"East Arunachal Pradesh","Namsai");
		testClass.division_queryBuilder(ARUNACHALPRADESH_STATEID,"West Arunachal Pradesh","Lower Subansiri");
		/* Arunachal Pradesh ::: End */
		
		/* Assam ::: Start */
		testClass.division_queryBuilder(ASSAM_STATEID,"Upper Assam Division","Jorhat");
		testClass.division_queryBuilder(ASSAM_STATEID,"Lower Assam Division","Guwahati");
		testClass.division_queryBuilder(ASSAM_STATEID,"North Assam Division","Tezpur");
		testClass.division_queryBuilder(ASSAM_STATEID,"Central Assam Division","Nagaon");
		testClass.division_queryBuilder(ASSAM_STATEID,"Barak Valley","Sichar");
		/* Assam ::: End */
		
		/* Bihar ::: Start */
		testClass.division_queryBuilder(BIHAR_STATEID,"Patna Division","Patna");
		testClass.division_queryBuilder(BIHAR_STATEID,"Tirhut Division","Muzaffarpur");
		testClass.division_queryBuilder(BIHAR_STATEID,"Saran Division","Chhapra");	
		testClass.division_queryBuilder(BIHAR_STATEID,"Darbhanga Division","Darbhanga");
		testClass.division_queryBuilder(BIHAR_STATEID,"Kosi Division","Saharsa");
		testClass.division_queryBuilder(BIHAR_STATEID,"Purnia Division","Purnia");	
		testClass.division_queryBuilder(BIHAR_STATEID,"Bhagalpur Division","Bhagalpur");
		testClass.division_queryBuilder(BIHAR_STATEID,"Munger Division","Munger");
		testClass.division_queryBuilder(BIHAR_STATEID,"Magadh Division","Gaya");
		/* Bihar ::: End */
		
		/* Chattisgarh ::: Start */
		testClass.division_queryBuilder(CHATTISGARH_STATEID,"Surguja Division","Surguja");
		testClass.division_queryBuilder(CHATTISGARH_STATEID,"Bilaspur Division","Bilaspur");
		testClass.division_queryBuilder(CHATTISGARH_STATEID,"Durg Division","Durg");
		testClass.division_queryBuilder(CHATTISGARH_STATEID,"Raipur Division","Raipur");
		testClass.division_queryBuilder(CHATTISGARH_STATEID,"Bastar Division","Bastar");
		/* Chattisgarh ::: End */
		
		/* Haryana ::: Start */
		testClass.division_queryBuilder(HARYANA_STATEID,"Hisar Division","Hisar");
		testClass.division_queryBuilder(HARYANA_STATEID,"Gurgaon Division","Gurugram");
		testClass.division_queryBuilder(HARYANA_STATEID,"Ambala Division","Ambala");
		testClass.division_queryBuilder(HARYANA_STATEID,"Faridabad Division","Faridabad");
		testClass.division_queryBuilder(HARYANA_STATEID,"Rohtak Division","Rohtak");
		testClass.division_queryBuilder(HARYANA_STATEID,"Karnal Division","Karnal");
		/* Haryana ::: End */
		
		/* Himachal Pradesh ::: Start */
		testClass.division_queryBuilder(HIMACHALPRADESH_STATEID,"Kangra Division","Kangra");
		testClass.division_queryBuilder(HIMACHALPRADESH_STATEID,"Mandi Division","Mandi");
		testClass.division_queryBuilder(HIMACHALPRADESH_STATEID,"Shimla Division","Shimla");
		/* Himachal Pradesh ::: End */
		
		/* Jammu And Kashmir ::: Start */
		testClass.division_queryBuilder(JAMMUANDKASHMIR_STATEID,"Jammu Division","Jammu");
		testClass.division_queryBuilder(JAMMUANDKASHMIR_STATEID,"Kashmir Division","Srinagar");
		testClass.division_queryBuilder(JAMMUANDKASHMIR_STATEID,"Ladakh Division","Leh");
		/* Jammu And Kashmir ::: End */
		
				
		/* Jharkhand ::: Start */
		testClass.division_queryBuilder(JHARKHAND_STATEID,"Palamu Division","Palamu");
		testClass.division_queryBuilder(JHARKHAND_STATEID,"North Chotanagpur Division","Hazaribagh");
		testClass.division_queryBuilder(JHARKHAND_STATEID,"South Chotanagpur Division","Ranchi");
		testClass.division_queryBuilder(JHARKHAND_STATEID,"Kolhan Division","West Singhbhum");
		testClass.division_queryBuilder(JHARKHAND_STATEID,"Santhal Pargana Division","Dumka");
		/* Jharkhand ::: End */
		
		/* Karnataka ::: Start */		
		testClass.division_queryBuilder(KARNATAKA_STATEID,"Bangalore Division","Bengaluru");		
		testClass.division_queryBuilder(KARNATAKA_STATEID,"Mysore Division","Mysuru");		
		testClass.division_queryBuilder(KARNATAKA_STATEID,"Belgaum Division","Belagavi");		
		testClass.division_queryBuilder(KARNATAKA_STATEID,"Kalaburagi Division","Kalaburagi");		
		/* Karnataka ::: End */		
		
		/* Madhya Pradesh ::: Start */		
		testClass.division_queryBuilder(MADHYAPRADESH_STATEID,"Bhopal Division","Bhopal");		
		testClass.division_queryBuilder(MADHYAPRADESH_STATEID,"Indore Division","Indore");
		testClass.division_queryBuilder(MADHYAPRADESH_STATEID,"Gwalior Division","Gwalior");
		testClass.division_queryBuilder(MADHYAPRADESH_STATEID,"Jabalpur Division","Jabalpur");
		testClass.division_queryBuilder(MADHYAPRADESH_STATEID,"Rewa Division","Rewa");
		testClass.division_queryBuilder(MADHYAPRADESH_STATEID,"Sagar Division","Sagar");
		testClass.division_queryBuilder(MADHYAPRADESH_STATEID,"Shahdol Division","Shahdol");
		testClass.division_queryBuilder(MADHYAPRADESH_STATEID,"Ujjain Division","Ujjain");
		testClass.division_queryBuilder(MADHYAPRADESH_STATEID,"Chambal Division","Morena");
		testClass.division_queryBuilder(MADHYAPRADESH_STATEID,"Narmadapuram Division","Betul");
		/* Madhya Pradesh ::: End */		
				
		/* Maharasthra ::: Start */
		testClass.division_queryBuilder(MAHARASTHRA_STATEID,"Amravati Division","Amravati");
		testClass.division_queryBuilder(MAHARASTHRA_STATEID,"Aurangabad Division","Aurangabad");
		testClass.division_queryBuilder(MAHARASTHRA_STATEID,"Konkan Division","Thane");
		testClass.division_queryBuilder(MAHARASTHRA_STATEID,"Nagpur Division","Nagpur");
		testClass.division_queryBuilder(MAHARASTHRA_STATEID,"Nashik Division","Nashik");
		testClass.division_queryBuilder(MAHARASTHRA_STATEID,"Pune Division","Pune");
		/* Maharasthra ::: End */
	
		/* Meghalaya ::: Start */
		testClass.division_queryBuilder(MEGHALAYA_STATEID,"Tura","West Garo Hills");
		testClass.division_queryBuilder(MEGHALAYA_STATEID,"Shillong","East Khasi Hills");
		/* Meghalaya ::: End */
				
		/* Nagaland ::: Start */
		testClass.division_queryBuilder(NAGALAND_STATEID,"Nagaland Division","Kohima");
		/* Nagaland ::: End */
			
		/* Odisha ::: Start */
		testClass.division_queryBuilder(ODISHA_STATEID,"Central Odisha","Cuttack");
		testClass.division_queryBuilder(ODISHA_STATEID,"Northern Odisha","Sambalpur");
		testClass.division_queryBuilder(ODISHA_STATEID,"Southern Odisha","Berhampur");
		/* Odisha ::: End */
			
		/* Punjab ::: Start */
		testClass.division_queryBuilder(PUNJAB_STATEID,"Patiala Division","Patiala");
		testClass.division_queryBuilder(PUNJAB_STATEID,"Faridkot Division","Faridkot");
		testClass.division_queryBuilder(PUNJAB_STATEID,"Firozepur Division","Firozepur");
		testClass.division_queryBuilder(PUNJAB_STATEID,"Jalandhar Division","Jalandhar");
		testClass.division_queryBuilder(PUNJAB_STATEID,"RupNagar Division","RupNagar");
		/* Punjab ::: End */

		/* Rajasthan ::: Start */
		testClass.division_queryBuilder(RAJASTHAN_STATEID,"Jaipur Division","Jaipur");
		testClass.division_queryBuilder(RAJASTHAN_STATEID,"Jodhpur Division","Jodhpur");
		testClass.division_queryBuilder(RAJASTHAN_STATEID,"Ajmer Division","Ajmer");
		testClass.division_queryBuilder(RAJASTHAN_STATEID,"Udaipur Division","Udaipur");
		testClass.division_queryBuilder(RAJASTHAN_STATEID,"Bikaner Division","Bikaner");
		testClass.division_queryBuilder(RAJASTHAN_STATEID,"Kota Division","Kota");
		testClass.division_queryBuilder(RAJASTHAN_STATEID,"Bharatpur Division","Bharatpur");
		/* Rajasthan ::: End */
		
		/* Uttar Pradesh ::: Start */
		testClass.division_queryBuilder(UTTARPRADESH_STATEID,"Agra Division","Agra");
		testClass.division_queryBuilder(UTTARPRADESH_STATEID,"Aligarh Division","Aligarh");
		testClass.division_queryBuilder(UTTARPRADESH_STATEID,"Prayagraj Division","Prayagraj");
		testClass.division_queryBuilder(UTTARPRADESH_STATEID,"Azamgarh Division","Azamgarh");
		testClass.division_queryBuilder(UTTARPRADESH_STATEID,"Bareilly Division","Bareilly");
		testClass.division_queryBuilder(UTTARPRADESH_STATEID,"Basti Division","Basti");
		testClass.division_queryBuilder(UTTARPRADESH_STATEID,"Chitrakoot Division","Chitrakoot");
		testClass.division_queryBuilder(UTTARPRADESH_STATEID,"Devipatan Division","Gonda");
		testClass.division_queryBuilder(UTTARPRADESH_STATEID,"Ayodhya Division","Ayodhya");
		testClass.division_queryBuilder(UTTARPRADESH_STATEID,"Gorakhpur Division","Gorakhpur");
		testClass.division_queryBuilder(UTTARPRADESH_STATEID,"Jhansi Division","Jhansi");
		testClass.division_queryBuilder(UTTARPRADESH_STATEID,"Kanpur Division","Kanpur Nagar");
		testClass.division_queryBuilder(UTTARPRADESH_STATEID,"Lucknow Division","Lucknow");
		testClass.division_queryBuilder(UTTARPRADESH_STATEID,"Meerut Division","Meerut");
		testClass.division_queryBuilder(UTTARPRADESH_STATEID,"Mirzapur Division","Mirzapur");
		testClass.division_queryBuilder(UTTARPRADESH_STATEID,"Moradabad Division","Moradabad");
		testClass.division_queryBuilder(UTTARPRADESH_STATEID,"Saharanpur Division","Saharanpur");
		testClass.division_queryBuilder(UTTARPRADESH_STATEID,"Varanasi Division","Varanasi");
		/* Uttar Pradesh ::: End */
			
		/* Uttarkhand ::: Start */
		testClass.division_queryBuilder(UTTARKHAND_STATEID,"Kumaon Division","Nainital");
		testClass.division_queryBuilder(UTTARKHAND_STATEID,"Garhwal Division","Pauri Garhwal");
		/* Uttarkhand ::: End */
				
		/* West Bengal ::: Start */
		testClass.division_queryBuilder(WESTBENGAL_STATEID,"Presidency Division","Kolkata");
		testClass.division_queryBuilder(WESTBENGAL_STATEID,"Medinipur Division","Paschim Medinipur");
		testClass.division_queryBuilder(WESTBENGAL_STATEID,"Malda Division","Malda");
		testClass.division_queryBuilder(WESTBENGAL_STATEID,"Burdwan Division","Hooghly");
		testClass.division_queryBuilder(WESTBENGAL_STATEID,"Jalpaiguri division","Jalpaiguri");
		/* West Bengal ::: End */
				
		/* Delhi ::: Start */
		testClass.division_queryBuilder(DELHI_STATEID,"Delhi Division","Central Delhi");
		/* Delhi ::: End*/
				
		

				
		

				
		

			
				
		

				
				

				
	

				
	

				
		

				
		

			
			
	}
}
