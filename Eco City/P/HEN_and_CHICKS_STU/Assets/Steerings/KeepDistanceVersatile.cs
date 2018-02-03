using UnityEngine;
using System.Collections;

namespace Steerings
{

	public class KeepDistanceVersatile : SteeringBehaviour
	{

		private static GameObject surrogateTarget = null;

		public float requiredDistance = 40;
		public float angleWrpOrientation = 0;

		public GameObject target;


		public override  SteeringOutput GetSteering () {

			// no KS? get it
			if (this.ownKS==null) this.ownKS = GetComponent<KinematicState>();

			return KeepDistanceVersatile.GetSteering (this.ownKS, this.target, this.requiredDistance, this.angleWrpOrientation);
		} 

		public static SteeringOutput GetSteering (KinematicState ownKS, GameObject target, 
													float requiredDistance = 40, float angleWrpOrientation = 0) {

			float targetOrientation = target.transform.eulerAngles.z;
			float desiredAngle = targetOrientation + angleWrpOrientation;

			Vector3 desiredDirectionFromTarget = Utils.OrientationToVector (desiredAngle);

			if (KeepDistanceVersatile.surrogateTarget == null) {
				surrogateTarget = new GameObject ("Surrogate for keep distance versatile");
				surrogateTarget.SetActive (false);
			}

			// position me at required distance from target on the desired direction 
			surrogateTarget.transform.position = target.transform.position + desiredDirectionFromTarget * requiredDistance;

			return Seek.GetSteering (ownKS, surrogateTarget);
		}


	}
}
