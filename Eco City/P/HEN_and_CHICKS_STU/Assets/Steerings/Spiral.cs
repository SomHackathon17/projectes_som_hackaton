using UnityEngine;
using System.Collections;

namespace Steerings
{

	public class Spiral : SteeringBehaviour
	{

		public  GameObject target;

		private static GameObject surrogateTarget;

		public override SteeringOutput GetSteering () {
			// no KS? get it
			if (this.ownKS==null) this.ownKS = GetComponent<KinematicState>();


			return Spiral.GetSteering (this.ownKS);
		}

		public static SteeringOutput GetSteering (KinematicState ownKS) {

			SteeringOutput result = new SteeringOutput ();
			result.angularAcceleration = ownKS.maxAngularAcceleration;

			float old = ownKS.orientation;
			ownKS.orientation += +1;
			SteeringOutput r2 = GoWhereYouLook.GetSteering (ownKS);
			ownKS.orientation = old;

			result.linearAcceleration = r2.linearAcceleration;

			return result;

			/*
			// get your orientation as a vector
			float orientation = ownKS.orientation;
			orientation = orientation + 100;

			Vector3 direction = Utils.OrientationToVector (orientation);

			if (Spiral.surrogateTarget == null) {
				Spiral.surrogateTarget = new GameObject ();
			}
			surrogateTarget.transform.position = ownKS.position + direction;

			return Seek.GetSteering (ownKS, surrogateTarget);
			*/

		}
	}
}
