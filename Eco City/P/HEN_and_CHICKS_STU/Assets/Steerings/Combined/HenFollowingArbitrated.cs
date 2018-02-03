using UnityEngine;
using System.Collections;

namespace Steerings
{

	// Combine KeepDistance + Linear repulsion
	public class HenFollowingArbitrated : SteeringBehaviour
	{

        /* TODO complete */

        // parameters required by KeepDistanceVersatile
        private static GameObject surrogateTarget = null;
        public GameObject target;
        public float requiredDistance = 40;
        public float angleWrpOrientation = 0;


        // weight of linear repulsion
        public string idTag = "REPULSIVE";
        public float repulsionThreshold = 20.0f;   // at which distance does repulsion start?

        public override SteeringOutput GetSteering () {

			// no KS? get it, it's important
			if (this.ownKS==null) this.ownKS = GetComponent<KinematicState>();

			return HenFollowingArbitrated.GetSteering (this.ownKS, target,
                requiredDistance, angleWrpOrientation, idTag, repulsionThreshold);
        }

		public static SteeringOutput GetSteering (KinematicState ownKS,
            GameObject target, float requiredDistance, float angleWrpOrientation, string idTag, float repulsionThreshold)
        {

            // give priority to linear repulsion
            /* TODO complete */

            SteeringOutput lr = LinearRepulsion.GetSteering(ownKS, idTag, repulsionThreshold);
            SteeringOutput kd = KeepDistanceVersatile.GetSteering(ownKS, target, requiredDistance, angleWrpOrientation);

            if (lr == null)
                return kd;

            return lr;

        }
	}
}
