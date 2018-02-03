package hackathon.hackathon;

import java.util.Collection;
import java.util.Scanner;

import com.graphhopper.jsprit.analysis.toolbox.GraphStreamViewer;
import com.graphhopper.jsprit.analysis.toolbox.GraphStreamViewer.Label;
import com.graphhopper.jsprit.analysis.toolbox.Plotter;
import com.graphhopper.jsprit.core.algorithm.VehicleRoutingAlgorithm;
import com.graphhopper.jsprit.core.algorithm.box.Jsprit;
import com.graphhopper.jsprit.core.problem.Location;
import com.graphhopper.jsprit.core.problem.VehicleRoutingProblem;
import com.graphhopper.jsprit.core.problem.job.Service;
import com.graphhopper.jsprit.core.problem.solution.VehicleRoutingProblemSolution;
import com.graphhopper.jsprit.core.problem.vehicle.VehicleImpl;
import com.graphhopper.jsprit.core.problem.vehicle.VehicleType;
import com.graphhopper.jsprit.core.problem.vehicle.VehicleTypeImpl;
import com.graphhopper.jsprit.core.reporting.SolutionPrinter;
import com.graphhopper.jsprit.core.util.Solutions;
import com.graphhopper.jsprit.core.problem.vehicle.VehicleImpl.Builder;


public class RunVRP {
	public static void main(String[] args) {
		Scanner in = new Scanner(System.in);
		
		int numPts = in.nextInt();
		double[] lats = new double[numPts];
		double[] lngs = new double[numPts];
		int[] qty = new int[numPts];
		int i = 0;
		
		while (i < numPts && in.hasNextDouble()) {
			lats[i] = in.nextDouble();
			lngs[i] = in.nextDouble();
			qty[i] = in.nextInt();
			i++;
		}
		
		//for (i = 0; i < numPts; i++) {
		//	System.out.print(lats[i] + " ");		
		//	System.out.println(lngs[i]);
		//}
		
		VehicleTypeImpl.Builder vehicleTypeBuilder = VehicleTypeImpl.Builder.newInstance("vehicleType").addCapacityDimension(0, 40);
        VehicleType vehicleType = vehicleTypeBuilder.build();
        
        Builder vehicleBuilder = VehicleImpl.Builder.newInstance("vehicle");
        vehicleBuilder.setStartLocation(Location.newInstance(41.528356, 2.434114)); // set vehicles start/end at tecnocampus
        vehicleBuilder.setType(vehicleType);
        VehicleImpl vehicle = vehicleBuilder.build();
        
        VehicleRoutingProblem.Builder vrpBuilder = VehicleRoutingProblem.Builder.newInstance();
        vrpBuilder.addVehicle(vehicle);
        
        for (i = 0; i < numPts; i++) {
        	Service service = Service.Builder.newInstance(String.valueOf(i)).addSizeDimension(0, qty[i]).setLocation(Location.newInstance(lats[i], lngs[i])).build();
        	vrpBuilder.addJob(service);
        }
        
        VehicleRoutingProblem problem = vrpBuilder.build();

        VehicleRoutingAlgorithm algorithm = Jsprit.createAlgorithm(problem);
        Collection<VehicleRoutingProblemSolution> solutions = algorithm.searchSolutions();
        VehicleRoutingProblemSolution bestSolution = Solutions.bestOf(solutions);

        SolutionPrinter.print(problem, bestSolution, SolutionPrinter.Print.VERBOSE);
        //new Plotter(problem,bestSolution).plot("output/plot.png","simple example");
        //new GraphStreamViewer(problem, bestSolution).labelWith(Label.ID).setRenderDelay(200).display();
	}
}
