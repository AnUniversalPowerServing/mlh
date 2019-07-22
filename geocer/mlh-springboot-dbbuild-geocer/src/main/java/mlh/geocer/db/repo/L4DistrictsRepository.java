package mlh.geocer.db.repo;

import java.io.File;
import java.io.FileInputStream;
import java.util.Iterator;

import org.apache.poi.ss.usermodel.Cell;
import org.apache.poi.ss.usermodel.CellType;
import org.apache.poi.ss.usermodel.Row;
import org.apache.poi.ss.usermodel.Sheet;
import org.apache.poi.ss.usermodel.Workbook;
import org.apache.poi.xssf.usermodel.XSSFWorkbook;
import org.springframework.jdbc.core.JdbcTemplate;
import org.springframework.stereotype.Repository;

import mlh.geocer.db.query.L4DistrictsQuery;
import mlh.geocer.db.util.BusinessConstants;

@Repository
public class L4DistrictsRepository {
	
	private JdbcTemplate jdbcTemplate;  
	  
	public L4DistrictsRepository(JdbcTemplate jdbcTemplate){
		this.jdbcTemplate = jdbcTemplate;
	}
	
	
	public void buildDistricts() {
		L4DistrictsQuery l4DistrictsQuery = new L4DistrictsQuery();
		  int dataCount = 1;
	   try {
		 String fileName = BusinessConstants.DBEXCELINPUT +BusinessConstants.DBEXCELINPUT_DISTRICTSMAPPINGFILE;
		 FileInputStream excelFile = new FileInputStream(new File(fileName));
		 Workbook workbook = new XSSFWorkbook(excelFile);
		 int workSheets = workbook.getNumberOfSheets();
		 for(int index=0;index<workSheets;index++) {
		   Sheet datatypeSheet = workbook.getSheetAt(index);
		   int sheetRow=0;
		   for (Iterator<Row> iterator = datatypeSheet.iterator();iterator.hasNext();) {
		     Row currentRow = iterator.next();
		   if(sheetRow>0) {
			     for(Iterator<Cell> cellIterator = currentRow.iterator();cellIterator.hasNext();) {
			       
		           Cell currentCell = cellIterator.next();
		           Cell districtNameCell = currentCell.getRow().getCell(1);
		           Cell headquartersCell =  currentCell.getRow().getCell(2);
		           Cell descCell =  currentCell.getRow().getCell(3);
		           Cell districtPrevLevelCell =   currentCell.getRow().getCell(4);
		           Cell districtNextLevelCell =  currentCell.getRow().getCell(5);
		           Cell stateNameCell =   currentCell.getRow().getCell(6);
		           Cell divisionNameCell =  currentCell.getRow().getCell(7);
		           
		           String district_Id = ""; // Build District Id
		           
		           String districtName = "";
				   if(districtNameCell!=null) { districtName = districtNameCell.toString(); }
				   
		           String headquarters = "";
				   if(headquartersCell!=null){ headquarters = headquartersCell.toString(); }
				   
		           String desc = "";
				   if(descCell!=null){ desc = descCell.toString(); }
				   
		           String districtPrevLevel = "";
				   if(districtPrevLevelCell!=null){ districtPrevLevel = districtPrevLevelCell.toString(); }
				   
		           String districtNextLevel = "";
				   if(districtNextLevelCell!=null){ districtNextLevel = districtNextLevelCell.toString(); }
				   
		           String stateName = "";
				   if(stateNameCell!=null){ stateName = stateNameCell.toString(); }
				   
		           String divisionName = "";
		           if(divisionNameCell!=null){ divisionName = divisionNameCell.toString(); }
				   
		           System.out.println("districtName: "+districtName);
		           System.out.println("headquarters: "+headquarters);
		           System.out.println("desc: "+desc);
		           System.out.println("districtPrevLevel: "+districtPrevLevel);
		           System.out.println("districtNextLevel: "+districtNextLevel);
		           System.out.println("stateName: "+stateName);
		           System.out.println("divisionName: "+divisionName);
		           
		          String districtquery = l4DistrictsQuery.insert_districtData(district_Id, districtName, headquarters, desc, districtPrevLevel, districtNextLevel);
				      
		           if(districtPrevLevel.equalsIgnoreCase("STATE_DIVISION")) { // districtMapDivision
		        	// Bring State Id And Division Id from JSON Files
		        	   
		           } else if(districtPrevLevel.equalsIgnoreCase("STATE")) { // districtMapState
		        	   
		           }
		           
			      }
			     System.out.println(); 
			     dataCount++;
		      }
		   
		     sheetRow++;
		     
		    }
		  }
		}
		catch(Exception e) { e.printStackTrace(); } 
	   System.out.println(dataCount);
	  }
	
	public static void main(String args[]) {
		L4DistrictsRepository l4DistrictsRepository = new L4DistrictsRepository(null);
		l4DistrictsRepository.buildDistricts();
	}
}
