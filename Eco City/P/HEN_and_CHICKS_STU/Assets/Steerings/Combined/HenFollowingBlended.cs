using UnityEngine;
using System.Collections;

namespace Steerings
{

	// Combine KeepDistance + Linear repulsion
	public class HenFollowingBlended : SteeringBehaviour
	{

        /* TODO complete */

        // parameters required by KeepDistanceVersatile
        private static GameObject surrogateTarget = null;
        public GameObject target;
        public float requiredDistance = 40;
        public float angleWrpOrientation = 0;


        // weight of linear repulsion
        public string idTag = "REPULSIVE";
        public float repulsionThreshold = 20f;   // at which distance does repulsion start?
        public float lrw = 0.3f;

		public override SteeringOutput GetSteering () {

			// no KS? get it, it's important
			if (this.ownKS==null) this.ownKS = GetComponent<KinematicState>();

			return HenFollowingBlended.GetSteering (this.ownKS, target, requiredDistance, angleWrpOrientation, idTag, repulsionThreshold, lrw);
		}

		public static SteeringOutput GetSteering (KinematicState ownKS, 
			GameObject target, float requiredDistance, float angleWrpOrientation, string idTag, float repulsionThreshold, float lrw) {

			// compute both steerings
			SteeringOutput lr = LinearRepulsion.GetSteering(ownKS, idTag, repulsionThreshold);
			SteeringOutput kd = KeepDistanceVersatile.GetSteering (ownKS, target, requiredDistance, angleWrpOrientation);

            /* beware, both steerings can return null */

            if (kd == null && lr == null)
                return null;

            if (kd != null && lr != null)
                kd.linearAcceleration = kd.linearAcceleration * (1 - lrw) + lr.linearAcceleration * lrw;
                //kd.angularAcceleration = kd.angularAcceleration * (1 - lrw) + lr.angularAcceleration * lrw;

            if (kd == null) 
                return lr;

            if (lr == null)
                return kd;

            return kd;

            /* TODO complete */

        }
	}
}
