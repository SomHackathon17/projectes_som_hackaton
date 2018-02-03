using UnityEngine;
using System.Collections;

namespace Steerings
{

	public class KeepDistanceVersatile: SteeringBehaviour
	{

		public  GameObject target;
        public float requiredDistance;
        public float requiredAngle;


        private static GameObject surrogateTarget = null;

		public override SteeringOutput GetSteering () {

			// no KS? get it
			if (this.ownKS==null) this.ownKS = GetComponent<KinematicState>();

			return KeepDistanceVersatile.GetSteering (this.ownKS, this.target, this.requiredDistance, this.requiredAngle);
		}

		public static SteeringOutput GetSteering (KinematicState ownKS, GameObject target, float requiredDistance, float requiredAngle) {

            Vector3 directionFromTarget = (ownKS.position - target.transform.position).normalized;
            Vector3 desiredPosition = target.transform.position + directionFromTarget * requiredDistance;
            
            if (KeepDistanceVersatile.surrogateTarget == null)
            {
                surrogateTarget = new GameObject("surrogate target for keep distance");
            }

            Vector3 myDirection = Utils.OrientationToVector(requiredAngle);

            surrogateTarget.transform.position = desiredPosition + myDirection;

            return Seek.GetSteering(ownKS, surrogateTarget);

            //return Arrive.GetSteering(ownKS, surrogateTarget);
			
		}
	}
}
